<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\I18n\FrozenTime;

/**
 * Reports Controller
 *
 * @method \App\Model\Entity\Report[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ReportsController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        // Load the required models
        $this->loadModel('Transactions');
        $this->loadModel('Customers');
        $this->loadModel('Motorcycles');
    }

    public function index()
    {
        // Retrieve filter parameters from the request
        $startDate = $this->request->getQuery('start_date');
        $endDate = $this->request->getQuery('end_date');

        // Convert string dates to FrozenTime objects
        $startDate = $startDate ? FrozenTime::parse($startDate) : FrozenTime::now()->subMonth();
        $endDate = $endDate ? FrozenTime::parse($endDate) : FrozenTime::now();

        // Query transactions with related models
        $transactions = $this->Transactions->find()
            ->contain(['Customers', 'Motorcycles'])
            ->where([
                'Transactions.transaction_date >=' => $startDate,
                'Transactions.transaction_date <=' => $endDate,
            ])
            ->all();

        // Set flash message if no transactions are found
        if ($startDate && $endDate && $transactions->isEmpty()) {
            $this->Flash->warning(__('No transactions found for the selected date range.'));
        } else {
            // Display success message with selected date range
            $this->Flash->success(__('Showing transactions from {0} to {1}.', $startDate->format('Y-m-d'), $endDate->format('Y-m-d')));
        }

        // Pass data to the view
        $this->set(compact('transactions', 'startDate', 'endDate'));
    }

    public function view($id = null)
    {
        $report = $this->Reports->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('report'));
    }

    public function add()
    {
        $report = $this->Reports->newEmptyEntity();
        if ($this->request->is('post')) {
            $report = $this->Reports->patchEntity($report, $this->request->getData());
            if ($this->Reports->save($report)) {
                $this->Flash->success(__('The report has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The report could not be saved. Please, try again.'));
        }
        $this->set(compact('report'));
    }

    public function edit($id = null)
    {
        $report = $this->Reports->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $report = $this->Reports->patchEntity($report, $this->request->getData());
            if ($this->Reports->save($report)) {
                $this->Flash->success(__('The report has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The report could not be saved. Please, try again.'));
        }
        $this->set(compact('report'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $report = $this->Reports->get($id);
        if ($this->Reports->delete($report)) {
            $this->Flash->success(__('The report has been deleted.'));
        } else {
            $this->Flash->error(__('The report could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
