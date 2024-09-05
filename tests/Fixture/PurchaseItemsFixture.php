<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PurchaseItemsFixture
 */
class PurchaseItemsFixture extends TestFixture
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
                'purchase_id' => 1,
                'motorcycle_id' => 1,
                'quantity' => 1,
            ],
        ];
        parent::init();
    }
}
