<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Enquiries Model
 *
 * @method \App\Model\Entity\Enquiry newEmptyEntity()
 * @method \App\Model\Entity\Enquiry newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Enquiry> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Enquiry get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Enquiry findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Enquiry patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Enquiry> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Enquiry|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Enquiry saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Enquiry>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Enquiry>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Enquiry>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Enquiry> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Enquiry>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Enquiry>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Enquiry>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Enquiry> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EnquiriesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('enquiries');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name', 'Name is required')
            ->minLength('name', 2, 'Name must be at least 2 characters long');

        $validator
            ->email('work_email', false, 'Please enter a valid work email address')
            ->requirePresence('work_email', 'create')
            ->notEmptyString('work_email', 'Work email is required');

        $validator
            ->scalar('message')
            ->requirePresence('message', 'create')
            ->notEmptyString('message', 'Message is required')
            ->minLength('message', 10, 'Message must be at least 10 characters long')
            ->maxLength('message', 5000, 'Message is too long');

        return $validator;
    }
}
