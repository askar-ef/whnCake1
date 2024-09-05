<?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class CreatePurchaseItems extends AbstractMigration
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
        $table = $this->table('purchase_items');
        $table->addColumn('purchase_id', 'integer')
            ->addColumn('motorcycle_id', 'integer')
            ->addColumn('quantity', 'integer')
            ->create();

        $table->addForeignKey('purchase_id', 'purchases', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
            ->addForeignKey('motorcycle_id', 'motorcycles', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
            ->update();
    }
}
