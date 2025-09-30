<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\Http\Response;
use Cake\View\Exception\MissingTemplateException;
use Cake\Mailer\Mailer;
use Cake\ORM\TableRegistry;

/**
 * Static content controller
 *
 * This controller will render views from templates/Pages/
 *
 * @link https://book.cakephp.org/5/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{
    /**
     * Home page
     */
    public function home()
    {
        $this->set('title', 'DataRatiba');
    }

    /**
     * Contact form page
     */
    public function contact()
    {
        $this->set('title', 'Contact Us');
        
        // Load the Enquiries table
        $enquiriesTable = TableRegistry::getTableLocator()->get('Enquiries');
        $enquiry = $enquiriesTable->newEmptyEntity();
        
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            
            // Prepare data for the enquiry entity
            $enquiryData = [
                'name' => $data['name'] ?? '',
                'work_email' => $data['work_email'] ?? '',
                'message' => $this->buildMessageFromForm($data)
            ];
            
            // Patch the entity with data and validate
            $enquiry = $enquiriesTable->patchEntity($enquiry, $enquiryData);
            
            if ($enquiry->getErrors()) {
                $this->set('errors', $enquiry->getErrors());
                $this->set('formData', $data);
                $this->set('enquiry', $enquiry);
            } else {
                // Save to database
                if ($enquiriesTable->save($enquiry)) {
                    try {
                        // Send email to administrator
                        $this->sendNotificationEmail($data, $enquiry->id);
                        
                        $this->Flash->success('Thank you for your inquiry. We will get back to you soon!');
                        return $this->redirect(['action' => 'contact']);
                    } catch (\Exception $e) {
                        // Even if email fails, the enquiry is saved
                        $this->Flash->success('Your inquiry has been recorded. We will get back to you soon!');
                        return $this->redirect(['action' => 'contact']);
                    }
                } else {
                    $this->Flash->error('There was an error saving your inquiry. Please try again.');
                    $this->set('errors', $enquiry->getErrors());
                    $this->set('formData', $data);
                }
            }
        }
        
        $this->set('enquiry', $enquiry);
    }
    
    /**
     * Build message from form data
     */
    private function buildMessageFromForm($data)
    {
        $message = "Contact Form Submission\n\n";
        $message .= "Work Email: " . ($data['work_email'] ?? '') . "\n";
        $message .= "Message: " . ($data['description'] ?? '') . "\n";
        
        return $message;
    }
    
    /**
     * Send notification email
     */
    private function sendNotificationEmail($data, $enquiryId)
    {
        $mailer = new Mailer('default');
        $mailer
            ->setTo(Configure::read('Admin.email'))
            ->setSubject('New Contact Form Submission - DataRatiba (ID: ' . $enquiryId . ')')
            ->setEmailFormat('html')
            ->setViewVars([
                'name' => $data['name'],
                'work_email' => $data['work_email'],
                'description' => $data['description'],
                'enquiry_id' => $enquiryId
            ]);
        
        $mailer->viewBuilder()->setTemplate('contact_form');
        $mailer->deliver();
    }
    /**
     * Displays a view
     *
     * @param string ...$path Path segments.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Http\Exception\ForbiddenException When a directory traversal attempt.
     * @throws \Cake\View\Exception\MissingTemplateException When the view file could not
     *   be found and in debug mode.
     * @throws \Cake\Http\Exception\NotFoundException When the view file could not
     *   be found and not in debug mode.
     * @throws \Cake\View\Exception\MissingTemplateException In debug mode.
     */
    public function display(string ...$path): ?Response
    {
        if (!$path) {
            return $this->redirect('/');
        }
        if (in_array('..', $path, true) || in_array('.', $path, true)) {
            throw new ForbiddenException();
        }
        $page = $subpage = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        $this->set(compact('page', 'subpage'));

        try {
            return $this->render(implode('/', $path));
        } catch (MissingTemplateException $exception) {
            if (Configure::read('debug')) {
                throw $exception;
            }
            throw new NotFoundException();
        }
    }
}
