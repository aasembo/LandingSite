<section class="hero-section">
    <div class="container">
        <div class="row text-center">
            <div class="col-12">
                <h1 class="display-4 fw-bold mb-4">Contact Us</h1>
                <p class="lead">
                    Have questions about our healthcare systems? We're here to help!
                </p>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- Flash Messages -->
                <?= $this->Flash->render() ?>
                
                <div class="card shadow-lg border-0">
                    <div class="card-body p-5">
                        <h3 class="card-title text-center mb-4">
                            <i class="fas fa-envelope text-primary me-2"></i>Send us a Message
                        </h3>
                        
                        <?php if (isset($errors) && !empty($errors)): ?>
                            <div class="alert alert-danger">
                                <strong><i class="fas fa-exclamation-triangle me-2"></i>Please correct the following errors:</strong>
                                <ul class="mb-0 mt-2">
                                    <?php foreach ($errors as $field => $fieldErrors): ?>
                                        <?php if (is_array($fieldErrors)): ?>
                                            <?php foreach ($fieldErrors as $error): ?>
                                                <li><?php echo h($error) ?></li>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <li><?php echo h($fieldErrors) ?></li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                        
                        <?php echo $this->Form->create($enquiry, [
                            'url' => ['controller' => 'Pages', 'action' => 'contact'],
                            'class' => 'needs-validation',
                            'novalidate' => true
                        ]) ?>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <?php echo $this->Form->control('name', [
                                    'type' => 'text',
                                    'label' => ['text' => 'Full Name *', 'class' => 'form-label fw-bold'],
                                    'class' => 'form-control form-control-lg' . (isset($errors['name']) ? ' is-invalid' : ''),
                                    'placeholder' => 'Enter your full name',
                                    'required' => true
                                ]) ?>
                                <?php if (isset($errors['name'])): ?>
                                    <div class="invalid-feedback d-block">
                                        <?php echo is_array($errors['name']) ? implode(', ', $errors['name']) : $errors['name'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-6 mb-3">
                                <?php echo $this->Form->control('work_email', [
                                    'type' => 'email',
                                    'label' => ['text' => 'Work Email *', 'class' => 'form-label fw-bold'],
                                    'class' => 'form-control form-control-lg' . (isset($errors['work_email']) ? ' is-invalid' : ''),
                                    'placeholder' => 'your.work.email@healthcare.com',
                                    'value' => $formData['work_email'] ?? '',
                                    'required' => true
                                ]) ?>
                                <?php if (isset($errors['work_email'])): ?>
                                    <div class="invalid-feedback d-block">
                                        <?php echo is_array($errors['work_email']) ? implode(', ', $errors['work_email']) : $errors['work_email'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <?php echo $this->Form->control('description', [
                                'type' => 'textarea',
                                'label' => ['text' => 'Message/Description *', 'class' => 'form-label fw-bold'],
                                'class' => 'form-control' . (isset($errors['message']) ? ' is-invalid' : ''),
                                'placeholder' => 'Please describe your inquiry, questions about specific systems, or any assistance you need...',
                                'rows' => 5,
                                'value' => $formData['description'] ?? '',
                                'required' => true
                            ]) ?>
                            <?php if (isset($errors['message'])): ?>
                                <div class="invalid-feedback d-block">
                                    <?php echo is_array($errors['message']) ? implode(', ', $errors['message']) : $errors['message'] ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        
                        <div class="text-center">
                            <?php echo $this->Form->button('Send Message', [
                                'type' => 'submit',
                                'class' => 'btn btn-primary btn-lg px-5'
                            ]) ?>
                        </div>
                        
                        <?php echo $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Information -->
<section class="py-5" style="background: #f8f9fa;">
    <div class="container">
        <div class="row text-center">
            <div class="col-12 mb-5">
                <h2 class="display-5 fw-bold mb-3">Get in Touch</h2>
                <p class="lead text-muted">Multiple ways to reach our healthcare systems support team</p>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4 text-center">
                <div class="p-4">
                    <i class="fas fa-envelope fa-3x text-primary mb-3"></i>
                    <h5 class="fw-bold">Email Support</h5>
                    <p class="text-muted">maxwell@handhconsult.com</p>
                    <small class="text-muted">Response within 24 hours</small>
                </div>
            </div>
            <div class="col-lg-4 text-center">
                <div class="p-4">
                    <i class="fas fa-phone fa-3x text-primary mb-3"></i>
                    <h5 class="fw-bold">Phone Support</h5>
                    <p class="text-muted">+1 (512) 964-5351</p>
                    <small class="text-muted">Mon-Fri, 8AM-6PM EST</small>
                </div>
            </div>
            <div class="col-lg-4 text-center">
                <div class="p-4">
                    <i class="fas fa-comments fa-3x text-primary mb-3"></i>
                    <h5 class="fw-bold">Live Chat</h5>
                    <p class="text-muted">Available on all system portals</p>
                    <small class="text-muted">24/7 Technical Support</small>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Quick Links Back to Systems -->
<section class="contact-section">
    <div class="container">
        <div class="row text-center">
            <div class="col-12">
                <h3 class="mb-4">Ready to Access Our Systems?</h3>
                <div class="d-flex flex-wrap justify-content-center gap-3">
                    <a href="https://nurseholding.dataratiba.com/" class="btn btn-primary" target="_blank">
                        <i class="fas fa-user-nurse me-2"></i>Nursing Portal
                    </a>
                    <a href="https://imaging.dataratiba.com/" class="btn btn-primary" target="_blank">
                        <i class="fas fa-x-ray me-2"></i>Imaging System
                    </a>
                    <a href="#" class="btn btn-primary" target="_blank">
                        <i class="fas fa-users-cog me-2"></i>Patient Management
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $this->Html->script('contact-form', ['block' => true]); ?>