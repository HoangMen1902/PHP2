<?php

declare(strict_types=1);

use Phinx\Db\Adapter\MysqlAdapter;
use Phinx\Migration\AbstractMigration;

final class UserTable extends AbstractMigration
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
        $table = $this->table('users');
        $table->addColumn('email', 'string', ['limit' => 320])
            ->addColumn('phone', 'string', ['limit' => 10])
            ->addColumn('password', 'string', ['limit' => 101])
            ->addColumn('firstname', 'string', ['limit' => 50])
            ->addColumn('lastname', 'string', ['limit' => 50])
            ->addColumn('reset_token', 'string', ['limit' => 64])
            ->addColumn('reset_token_expired', 'datetime')

            ->addColumn('role', 'integer', ['limit' => MysqlAdapter::INT_TINY])
            ->addColumn('status', 'integer', ['limit' => MysqlAdapter::INT_TINY])

            ->addColumn('created_at', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('updated_at', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])
            ->create();
    }
}
