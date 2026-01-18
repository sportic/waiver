<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class WaiverTemplatesTableCreate extends AbstractMigration
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
        $table = $this->table('spt_waiver_templates');
        $table
            ->addColumn('parent_id', 'integer',)
            ->addColumn('parent', 'string',)
            ->addColumn('content_last_id', 'integer', ['null' => true, 'signed' => false])
            ->addColumn('status', 'enum', ['values' => ['active'], 'default' => 'active'])
            ->addColumn('updated_at', 'timestamp', [
                'default' => 'CURRENT_TIMESTAMP',
                'update' => 'CURRENT_TIMESTAMP',
            ])
            ->addColumn('created_at', 'timestamp', [
                'default' => 'CURRENT_TIMESTAMP',
            ])
            ->addIndex(['parent_id', 'parent'])
            ->addIndex(['content_last_id'])
            ->addIndex(['status'])
            ->save();


        $table
            ->addForeignKey(
                'content_last_id',
                'spt_waiver_contents',
                'id',
                ['constraint' => 'spt_waiver_templates_content_last_id', 'delete' => 'NO_ACTION', 'update' => 'NO_ACTION']
            )
            ->save();

        $table = $this->table('spt_waiver_contents');
        $table->addForeignKey(
            'template_id',
            'spt_waiver_templates',
            'id',
            ['constraint' => 'spt_waiver_contents_template_id', 'delete' => 'NO_ACTION', 'update' => 'NO_ACTION']
        )
            ->save();
    }
}
