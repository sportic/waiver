<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class WaiversConsentsFKs extends AbstractMigration
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
            ->addForeignKey(
                'device_id',
                'spt_waiver_devices',
                'id',
                ['constraint' => 'spt_waiver_consents_device_id', 'delete' => 'NO_ACTION', 'update' => 'NO_ACTION']
            )
            ->addForeignKey(
                'signature_id',
                'spt_waiver_signatures',
                'id',
                ['constraint' => 'spt_waiver_consents_signature_id', 'delete' => 'NO_ACTION', 'update' => 'NO_ACTION']
            )
            ->addForeignKey(
                'signer_id',
                'spt_waiver_signers',
                'id',
                ['constraint' => 'spt_waiver_consents_signer_id', 'delete' => 'NO_ACTION', 'update' => 'NO_ACTION']
            )
            ->save();
    }
}
