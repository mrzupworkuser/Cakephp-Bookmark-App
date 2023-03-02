<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Bookmarks Model
 *
 * @property \App\Model\Table\CategoriesTable&\Cake\ORM\Association\BelongsTo $Categories
 *
 * @method \App\Model\Entity\Bookmark newEmptyEntity()
 * @method \App\Model\Entity\Bookmark newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Bookmark[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Bookmark get($primaryKey, $options = [])
 * @method \App\Model\Entity\Bookmark findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Bookmark patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Bookmark[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Bookmark|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Bookmark saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Bookmark[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Bookmark[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Bookmark[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Bookmark[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 * @method find()
 */
class BookmarksTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('bookmarks');
        $this->setDisplayField('bookmarks_id');
        $this->setPrimaryKey('bookmarks_id');

        $this->belongsTo('Categories', [
            'foreignKey' => 'categories_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('bookmarks_id')
            ->allowEmptyString('bookmarks_id', null, 'create');

        $validator
            ->scalar('bookmarks_hash')
            ->maxLength('bookmarks_hash', 255)
            ->requirePresence('bookmarks_hash', 'create')
            ->notEmptyString('bookmarks_hash');

        $validator
            ->scalar('bookmarks_name')
            ->maxLength('bookmarks_name', 255)
            ->requirePresence('bookmarks_name', 'create')
            ->notEmptyString('bookmarks_name');

        $validator
            ->scalar('bookmarks_url')
            ->requirePresence('bookmarks_url', 'create')
            ->notEmptyString('bookmarks_url')
            ->add('bookmarks_url', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->boolean('bookmarks_type')
            ->requirePresence('bookmarks_type', 'create')
            ->notEmptyString('bookmarks_type');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['bookmarks_url']), ['errorField' => 'bookmarks_url']);
        $rules->add($rules->existsIn(['categories_id'], 'Categories'), ['errorField' => 'categories_id']);

        return $rules;
    }
}
