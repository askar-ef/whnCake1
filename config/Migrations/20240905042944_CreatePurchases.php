<?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class CreatePurchases extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change(): void
    {
        $table = $this->table('purchases');
        $table->addColumn('supplier_id', 'integer')
            ->addColumn('purchase_date', 'datetime')
            ->addColumn('total_amount', 'integer')
            ->create();

        $table->addForeignKey('supplier_id', 'suppliers', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
            ->update();
    }
}
