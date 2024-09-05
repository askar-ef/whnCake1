<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TransactionsFixture
 */
class TransactionsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'customer_id' => 1,
                'motorcycle_id' => 1,
                'transaction_date' => '2024-09-04 13:55:57',
                'amount' => 1,
            ],
        ];
        parent::init();
    }
}
