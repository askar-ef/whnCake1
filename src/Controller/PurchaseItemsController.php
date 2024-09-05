<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * PurchaseItems Controller
 *
 * @property \App\Model\Table\PurchaseItemsTable $PurchaseItems
 * @method \App\Model\Entity\PurchaseItem[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PurchaseItemsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Purchases', 'Motorcycles'],
        ];
        $purchaseItems = $this->paginate($this->PurchaseItems);

        $this->set(compact('purchaseItems'));
    }

    /**
     * View method
     *
     * @param string|null $id Purchase Item id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $purchaseItem = $this->PurchaseItems->get($id, [
            'contain' => ['Purchases', 'Motorcycles'],
        ]);

        $this->set(compact('purchaseItem'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $purchaseItem = $this->PurchaseItems->newEmptyEntity();
        if ($this->request->is('post')) {
            $purchaseItem = $this->PurchaseItems->patchEntity($purchaseItem, $this->request->getData());
            if ($this->PurchaseItems->save($purchaseItem)) {
                $this->Flash->success(__('The purchase item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The purchase item could not be saved. Please, try again.'));
        }
        $purchases = $this->PurchaseItems->Purchases->find('list', ['limit' => 200])->all();
        $motorcycles = $this->PurchaseItems->Motorcycles->find('list', ['limit' => 200])->all();
        $this->set(compact('purchaseItem', 'purchases', 'motorcycles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Purchase Item id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $purchaseItem = $this->PurchaseItems->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $purchaseItem = $this->PurchaseItems->patchEntity($purchaseItem, $this->request->getData());
            if ($this->PurchaseItems->save($purchaseItem)) {
                $this->Flash->success(__('The purchase item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The purchase item could not be saved. Please, try again.'));
        }
        $purchases = $this->PurchaseItems->Purchases->find('list', ['limit' => 200])->all();
        $motorcycles = $this->PurchaseItems->Motorcycles->find('list', ['limit' => 200])->all();
        $this->set(compact('purchaseItem', 'purchases', 'motorcycles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Purchase Item id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $purchaseItem = $this->PurchaseItems->get($id);
        if ($this->PurchaseItems->delete($purchaseItem)) {
            $this->Flash->success(__('The purchase item has been deleted.'));
        } else {
            $this->Flash->error(__('The purchase item could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
