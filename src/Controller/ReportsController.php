<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Reports Controller
 *
 * @property \App\Model\Table\TransactionsTable $Transactions
 * @property \App\Model\Table\CustomersTable $Customers
 * @property \App\Model\Table\MotorcyclesTable $Motorcycles
 * @method \App\Model\Entity\Report[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ReportsController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        // Load the required models
        $this->Transactions = $this->fetchTable('Transactions');
        $this->Customers = $this->fetchTable('Customers');
        $this->Motorcycles = $this->fetchTable('Motorcycles');
    }

    public function index()
    {
        // Retrieve filter parameters from the request
        $startDate = $this->request->getQuery('start_date');
        $endDate = $this->request->getQuery('end_date');

        // Initialize query
        $query = $this->Transactions->find()
            ->contain(['Customers', 'Motorcycles']);

        // Apply filters if dates are provided
        if ($startDate && $endDate) {
            try {
                $startDateObj = new \DateTime($startDate);
                $endDateObj = new \DateTime($endDate);

                // Check if end date is before start date
                if ($endDateObj < $startDateObj) {
                    $this->Flash->error(__('End date cannot be earlier than start date.'));
                    // Set empty transactions to display
                    $transactions = [];
                } else {
                    // Filter transactions by date range
                    $query->where([
                        'Transactions.transaction_date >=' => $startDateObj->format('Y-m-d'),
                        'Transactions.transaction_date <=' => $endDateObj->format('Y-m-d'),
                    ]);

                    $transactions = $this->paginate($query);

                    // Check if no transactions are found within the date range
                    if ($transactions->isEmpty()) {
                        $this->Flash->success(__('Showing transactions from {0} to {1}.', $startDateObj->format('Y-m-d'), $endDateObj->format('Y-m-d')));
                        $this->Flash->warning(__('No transactions found for the selected date range.'));
                    } else {
                        // Display success message with selected date range
                        $this->Flash->success(__('Showing transactions from {0} to {1}.', $startDateObj->format('Y-m-d'), $endDateObj->format('Y-m-d')));
                    }
                }
            } catch (\Exception $e) {
                // Show error message if date is invalid
                $this->Flash->error(__('Invalid date format. Please use YYYY-MM-DD.'));
                $transactions = [];
            }
        } else {
            $transactions = $this->paginate($query);
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
}
