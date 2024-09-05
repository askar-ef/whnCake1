<?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateTransactions extends AbstractMigration
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
        $table = $this->table('transactions');
        $table->addColumn('customer_id', 'integer')
            ->addColumn('motorcycle_id', 'integer')
            ->addColumn('transaction_date', 'datetime')
            ->addColumn('amount', 'integer')
            ->create();

        $table->addForeignKey('customer_id', 'customers', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
            ->addForeignKey('motorcycle_id', 'motorcycles', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
            ->update();
    }
}
