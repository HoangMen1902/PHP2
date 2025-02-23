<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class SkuValuesTable extends AbstractMigration
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
        $table = $this->table('sku_values');
        $table->addColumn('sku_id', 'integer', ['signed' => false])
        ->addColumn('option_id', 'integer', ['signed' => false])
        ->addColumn('value_id', 'integer', ['signed' => false])
        ->addColumn('created_at', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])
        ->addColumn('updated_at', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])
        ->addForeignKey('sku_id', 'product_skus', 'id',  ['delete'  => 'CASCADE', 'update' => 'NO_ACTION'])
        ->addForeignKey('option_id', 'options', 'id',  ['delete'  => 'CASCADE', 'update' => 'NO_ACTION'])
        ->addForeignKey('value_id', 'option_values', 'id',  ['delete'  => 'CASCADE', 'update' => 'NO_ACTION'])
        
        ->create();
    }
}
