<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CheckoutAddresses extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        $table = $this->table('checkout_addresses');
        $table->addColumn('user_id', 'integer', ['null' => false, 'signed' => false])
              ->addColumn('address', 'text', ['limit' => 101])
              ->addColumn('province_name', 'string', ['limit' => 255])
              ->addColumn('district_name', 'string', ['limit' => 255])
              ->addColumn('ward_name', 'string', ['limit' => 255])
              ->addColumn('phone', 'string', ['limit' => 10])
              ->addColumn('created_at', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])
              ->addColumn('updated_at', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])
              ->addForeignKey('user_id', 'users', 'id',  ['delete'  => 'CASCADE', 'update' => 'NO_ACTION'])
              ->create();
    }
}
