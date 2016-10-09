<?php
namespace RayMailer\Controller;

use RayMailer\Controller\AppController;

/**
 * Layouts Controller
 *
 * @property \RayMailer\Model\Table\LayoutsTable $Layouts
 */
class LayoutsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $layouts = $this->paginate($this->Layouts);

        $this->set(compact('layouts'));
        $this->set('_serialize', ['layouts']);
    }

    /**
     * View method
     *
     * @param string|null $id Layout id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $layout = $this->Layouts->get($id, [
            'contain' => ['Templates']
        ]);

        $this->set('layout', $layout);
        $this->set('_serialize', ['layout']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $layout = $this->Layouts->newEntity();
        if ($this->request->is('post')) {
            $layout = $this->Layouts->patchEntity($layout, $this->request->data);
            if ($this->Layouts->save($layout)) {
                $this->Flash->success(__('The layout has been saved.'));

                return $this->redirect(['action' => 'view', $layout->id]);
            } else {
                $this->Flash->error(__('The layout could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('layout'));
        $this->set('_serialize', ['layout']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Layout id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $layout = $this->Layouts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $layout = $this->Layouts->patchEntity($layout, $this->request->data);
            if ($this->Layouts->save($layout)) {
                $this->Flash->success(__('The layout has been saved.'));

                return $this->redirect(['action' => 'view', $layout->id]);
            } else {
                $this->Flash->error(__('The layout could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('layout'));
        $this->set('_serialize', ['layout']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Layout id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $layout = $this->Layouts->get($id);
        if ($this->Layouts->delete($layout)) {
            $this->Flash->success(__('The layout has been deleted.'));
        } else {
            $this->Flash->error(__('The layout could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
