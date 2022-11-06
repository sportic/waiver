<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class WaiversConsentsTableCreate extends AbstractMigration
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
        $table = $this->table('spt_waiver_consents');
        $table
            ->addColumn('waiver_id', 'integer',)
            ->addColumn('content_id', 'integer',)
            ->addColumn('geolocation_id', 'integer', ['null' => true])
            ->addColumn('device_id', 'integer', ['null' => true])
            ->addColumn('signature_id', 'integer', ['null' => true])
            ->addColumn('signer_id', 'integer', ['null' => true])
            ->addColumn('signer_relation', 'enum', ['values' => ['personal', 'guardian'], 'default' => 'personal'])
            ->addColumn('type', 'enum', ['values' => ['checkbox', 'signed']])
            ->addColumn('given_at', 'timestamp', [
                'default' => 'CURRENT_TIMESTAMP',
            ])
            ->addIndex(['waiver_id'])
            ->addIndex(['content_id'])
            ->addIndex(['geolocation_id'])
            ->addIndex(['device_id'])
            ->addIndex(['signature_id'])
            ->addIndex(['signer_id'])
            ->save();
        $table
            ->addForeignKey(
                'waiver_id',
                'spt_waiver_waivers',
                'id',
                ['constraint' => 'spt_waiver_consents_waiver_id', 'delete' => 'NO_ACTION', 'update' => 'NO_ACTION']
            )
            ->addForeignKey(
                'content_id',
                'spt_waiver_contents',
                'id',
                ['constraint' => 'spt_waiver_consents_content_id', 'delete' => 'NO_ACTION', 'update' => 'NO_ACTION']
            )
            ->save();


    }
}
