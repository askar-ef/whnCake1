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

        // Set default pagination settings
        $this->paginate = [
            'contain' => ['Transactions'],
        ];

        // Initialize query
        $query = $this->Payments->find();

        // Apply filters if dates are provided
        if ($startDate && $endDate) {
            // Validate date format and convert to DateTime if needed
            try {
                $startDateObj = new \DateTime($startDate);
                $endDateObj = new \DateTime($endDate);

                // Filter payments by date range
                $query->where([
                    'payment_date >=' => $startDateObj->format('Y-m-d'),
                    'payment_date <=' => $endDateObj->format('Y-m-d'),
                ]);

                // Display success message with selected date range
                $this->Flash->success(__('Showing payments from {0} to {1}.', $startDateObj->format('Y-m-d'), $endDateObj->format('Y-m-d')));
            } catch (\Exception $e) {
                // Show error message if date is invalid
                $this->Flash->error(__('Invalid date format. Please use YYYY-MM-DD.'));
            }
        }

        $payments = $this->paginate($query);

        // Check if no payments are found within the date range
        if ($startDate && $endDate && $payments->isEmpty()) {
            $this->Flash->warning(__('No payments found for the selected date range.'));
        }

        $this->set(compact('payments'));
    }
}
