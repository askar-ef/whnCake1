<?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateSuppliers extends AbstractMigration
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
        $table = $this->table('suppliers');
        $table->addColumn('name', 'string', ['limit' => 255])
            ->addColumn('email', 'string', ['limit' => 255])
            ->addColumn('phone', 'string', ['limit' => 20])
            ->addColumn('address', 'text')
            ->create();
    }
}
