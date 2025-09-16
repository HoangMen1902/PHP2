<?php

declare(strict_types=1);

use Phinx\Db\Adapter\MysqlAdapter;
use Phinx\Migration\AbstractMigration;

final class ProductTable extends AbstractMigration
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
        $table = $this->table('products');
        $table->addColumn('name', 'string', ['limit' => 255])
        ->addColumn('short_description', 'text')
        ->addColumn('description', 'text')
        ->addColumn('total_quantity', 'integer')
        ->addColumn('thumbnail', 'text')
        ->addColumn('status', 'integer', ['limit'=> MysqlAdapter::INT_TINY])
        ->addColumn('brand_id', 'integer', ['signed' => false])
        ->addColumn('category_id', 'integer', ['signed' => false])
        ->addColumn('created_at', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])
        ->addColumn('updated_at', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])
        ->addForeignKey('brand_id', 'brands', 'id',  ['delete'  => 'CASCADE', 'update' => 'NO_ACTION'])
        ->addForeignKey('category_id', 'categories', 'id',  ['delete'  => 'CASCADE', 'update' => 'NO_ACTION'])

        ->create();
    }
}
