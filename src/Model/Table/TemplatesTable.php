<?php
namespace RayMailer\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Templates Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Layouts
 *
 * @method \RayMailer\Model\Entity\Template get($primaryKey, $options = [])
 * @method \RayMailer\Model\Entity\Template newEntity($data = null, array $options = [])
 * @method \RayMailer\Model\Entity\Template[] newEntities(array $data, array $options = [])
 * @method \RayMailer\Model\Entity\Template|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \RayMailer\Model\Entity\Template patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \RayMailer\Model\Entity\Template[] patchEntities($entities, array $data, array $options = [])
 * @method \RayMailer\Model\Entity\Template findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TemplatesTable extends Table
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

        $this->table('raymailer_templates');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Layouts', [
            'foreignKey' => 'raymailer_layout_id',
            'className' => 'RayMailer.Layouts'
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
            ->requirePresence('subject', 'create')
            ->notEmpty('subject');

        $validator
            ->requirePresence('body', 'create')
            ->notEmpty('body');

        $validator
            ->allowEmpty('default');

        $validator
            ->allowEmpty('sender_name');

        $validator
            ->allowEmpty('sender_email');

        $validator
            ->allowEmpty('reply_to');

        $validator
            ->boolean('is_locked')
            ->allowEmpty('is_locked');

        $validator
            ->allowEmpty('transport');

        $validator
            ->allowEmpty('notes');

        $validator
            ->allowEmpty('status')
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
        $rules->add($rules->existsIn(['raymailer_layout_id'], 'Layouts'));
        $rules->add($rules->isUnique(['slug']));

        return $rules;
    }
}