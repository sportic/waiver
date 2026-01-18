<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class WaiversTableCreate extends AbstractMigration
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
        $table = $this->table('spt_waiver_waivers');
        $table
            ->addColumn('template_id', 'integer',['signed' => false,])
            ->addColumn('parent_id', 'integer',)
            ->addColumn('parent', 'string',)
            ->addColumn('content_id', 'integer',['signed' => false,])
            ->addColumn('updated_at', 'timestamp', [
                'default' => 'CURRENT_TIMESTAMP',
                'update' => 'CURRENT_TIMESTAMP',
            ])
            ->addColumn('created_at', 'timestamp', [
                'default' => 'CURRENT_TIMESTAMP',
            ])
            ->addIndex(['template_id'])
            ->addIndex(['parent_id', 'parent'])
            ->addIndex(['content_id'])
            ->save();
        $table
            ->addForeignKey(
                'template_id',
                'spt_waiver_templates',
                'id',
                ['constraint' => 'spt_waiver_template_id', 'delete' => 'NO_ACTION', 'update' => 'NO_ACTION']
            )
            ->addForeignKey(
                'content_id',
                'spt_waiver_contents',
                'id',
                ['constraint' => 'spt_waiver_content_id', 'delete' => 'NO_ACTION', 'update' => 'NO_ACTION']
            )
            ->save();


    }
}
