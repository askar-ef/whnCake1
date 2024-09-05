<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Payments Controller
 *
 * @property \App\Model\Table\PaymentsTable $Payments
 * @method \App\Model\Entity\Payment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PaymentsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        // Retrieve filter parameters from the request
        $startDate = $this->request->getQuery('start_date');
        $endDate = $this->request->getQuery('end_date');

        // Debugging output
        $this->log('Start Date: ' . $startDate, 'debug');
        $this->log('End Date: ' . $endDate, 'debug');

        // Set default pagination settings
        $this->paginate = [
            'contain' => ['Transactions'],
        ];

        // Initialize query
        $query = $this->Payments->find();

        // Apply filters if dates are provided and valid
        if ($startDate && $endDate) {
            // Validate date format and convert to DateTime if needed
            try {
                $startDate = new \DateTime($startDate);
                $endDate = new \DateTime($endDate);
                $query->where([
                    'payment_date >=' => $startDate->format('Y-m-d'),
                    'payment_date <=' => $endDate->format('Y-m-d'),
                ]);
            } catch (\Exception $e) {
                $this->Flash->error(__('Invalid date format. Please use YYYY-MM-DD.'));
            }
        }

        $payments = $this->paginate($query);

        // Debugging output
        $this->log('Query SQL: ' . $query->sql(), 'debug');

        $this->set(compact('payments'));
    }


    // Other methods remain unchanged...
}
