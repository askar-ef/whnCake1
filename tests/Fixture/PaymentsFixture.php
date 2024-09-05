<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PaymentsFixture
 */
class PaymentsFixture extends TestFixture
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
                'transaction_id' => 1,
                'payment_date' => '2024-09-04 13:56:31',
                'amount_paid' => 1,
                'payment_method' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
