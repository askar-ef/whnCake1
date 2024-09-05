<?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateMotorcycles extends AbstractMigration
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
        $table = $this->table('motorcycles');
        $table->addColumn('model', 'string', ['limit' => 255])
            ->addColumn('year', 'integer')
            ->addColumn('price', 'integer')
            ->addColumn('stock', 'integer')
            ->create();
    }
}
