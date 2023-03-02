<?php /** @noinspection PhpMissingParamTypeInspection */
/** @noinspection PhpReturnDocTypeMismatchInspection */
/** @noinspection PhpFullyQualifiedNameUsageInspection */
declare(strict_types=1);

namespace App\Controller;

/**
 * Favourites Controller
 *
 * @property \App\Model\Table\FavouritesTable $Favourites
 * @method \App\Model\Entity\Favourite[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FavouritesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Bookmarks'],
            'limit' => 10,
        ];
        $favourites = $this->paginate($this->Favourites);

        $this->set(compact('favourites'));
    }

    /**
     * View method
     *
     * @param string|null $id
     * @return \Cake\Http\Response|null|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException
     */
    public function view($id = null)
    {
        $favourite = $this->Favourites->get($id, [
            'contain' => ['Bookmarks'],
        ]);
        $this->set(compact('favourite'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void
     */
    public function add()
    {
        $favourite = $this->Favourites->newEmptyEntity();
        if ($this->request->is('post')) {
            $favourite = $this->Favourites->patchEntity($favourite, $this->request->getData());
            if ($this->Favourites->save($favourite)) {
                $this->Flash->success(__('The favourite has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The favourite could not be saved. Please, try again.'));
        }
        $bookmarks = $this->Favourites->Bookmarks->find('list', ['limit' => 200]);
        $this->set(compact('favourite', 'bookmarks'));
    }

    /**
     * Edit method
     *
     * @param string|null $id
     * @return \Cake\Http\Response|null|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException
     */
    public function edit($id = null)
    {
        $favourite = $this->Favourites->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $favourite = $this->Favourites->patchEntity($favourite, $this->request->getData());
            if ($this->Favourites->save($favourite)) {
                $this->Flash->success(__('The favourite has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The favourite could not be saved. Please, try again.'));
        }
        $bookmarks = $this->Favourites->Bookmarks->find('list', ['limit' => 200]);
        $this->set(compact('favourite', 'bookmarks'));
    }

    /**
     * Delete method
     *
     * @param string|null $id
     * @return \Cake\Http\Response|null|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $favourite = $this->Favourites->get($id);
        if ($this->Favourites->delete($favourite)) {
            $this->Flash->success(__('The favourite has been deleted.'));
        } else {
            $this->Flash->error(__('The favourite could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
