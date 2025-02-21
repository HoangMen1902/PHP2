<?php

declare(strict_types=1);

use Phinx\Db\Adapter\MysqlAdapter;
use Phinx\Migration\AbstractMigration;

final class OptionValueTable extends AbstractMigration
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
        $table = $this->table('option_values');
        $table->addColumn('product_id', 'integer')
        ->addColumn('option_id', 'integer')
        ->addColumn('value_name', 'string', ['limit' => 255])
        ->addColumn('status', 'integer', ['limit'=> MysqlAdapter::INT_TINY])
        ->addColumn('created_at', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])
        ->addColumn('updated_at', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])
        ->create();
    }
}
