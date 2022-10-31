<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class WaiverContentsTableCreate extends AbstractMigration
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
        $table = $this->table('spt_waiver_contents');
        $table
            ->addColumn('hash', 'string', ['limit' => 15])
            ->addColumn('template_id', 'integer',)
            ->addColumn('body', 'text')
            ->addColumn('version', 'integer', ['limit' => \Phinx\Db\Adapter\MysqlAdapter::INT_TINY, 'default' => 1])
            ->addColumn('created_at', 'timestamp', [
                'default' => 'CURRENT_TIMESTAMP',
            ])
            ->addIndex(['hash','template_id'], ['unique' => true])
            ->addIndex(['template_id'])
            ->addIndex(['created_at'])
            ->save();
    }
}
