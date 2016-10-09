<?php
namespace RayMailer\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Layouts Model
 *
 * @property \Cake\ORM\Association\HasMany $Templates
 *
 * @method \RayMailer\Model\Entity\Layout get($primaryKey, $options = [])
 * @method \RayMailer\Model\Entity\Layout newEntity($data = null, array $options = [])
 * @method \RayMailer\Model\Entity\Layout[] newEntities(array $data, array $options = [])
 * @method \RayMailer\Model\Entity\Layout|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \RayMailer\Model\Entity\Layout patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \RayMailer\Model\Entity\Layout[] patchEntities($entities, array $data, array $options = [])
 * @method \RayMailer\Model\Entity\Layout findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class LayoutsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('raymailer_layouts');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Templates', [
            'foreignKey' => 'raymailer_layout_id',
            'className' => 'RayMailer.Templates'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->requirePresence('slug', 'create')
            ->notEmpty('slug');

        $validator
            ->requirePresence('body', 'create')
            ->notEmpty('body');

        $validator
            ->allowEmpty('type');

        $validator
            ->allowEmpty('sender_name');

        $validator
            ->allowEmpty('sender_email');

        $validator
            ->allowEmpty('reply_to');

        $validator
            ->allowEmpty('description');

        $validator
            ->boolean('is_locked')
            ->allowEmpty('is_locked');

        $validator
            ->notEmpty('status')
            ->inList('status', ['Active', 'Inactive', 'Draft']);

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['slug']));

        return $rules;
    }
}