<?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class CreatePayments extends AbstractMigration
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
        $table = $this->table('payments');
        $table->addColumn('transaction_id', 'integer')
            ->addColumn('payment_date', 'datetime')
            ->addColumn('amount_paid', 'integer')
            ->addColumn('payment_method', 'enum', ['values' => ['cash', 'credit card', 'bank transfer']])
            ->create();

        $table->addForeignKey('transaction_id', 'transactions', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
            ->update();
    }
}
