<?php

namespace Sportic\Waiver\Tests\Consents\Models;

use Sportic\Waiver\Consents\SignerRelations\CoachSigner;
use Sportic\Waiver\Consents\SignerRelations\GroupLeaderSigner;
use Sportic\Waiver\Consents\SignerRelations\GuardianSigner;
use Sportic\Waiver\Consents\SignerRelations\PersonalSigner;
use Sportic\Waiver\Consents\Models\Types\CheckboxConsent;
use Sportic\Waiver\Consents\Models\Types\SignedConsent;
use Sportic\Waiver\Consents\Models\WaiverConsents;
use PHPUnit\Framework\TestCase;

class WaiverConsentsTest extends TestCase
{
    public function test_types()
    {
        $repository = new WaiverConsents();
        $types = $repository->getTypes();

        self::assertIsArray($types);
        self::assertCount(2, $types);

        self::assertInstanceOf(CheckboxConsent::class, $types[CheckboxConsent::NAME]);
        self::assertInstanceOf(SignedConsent::class, $types[SignedConsent::NAME]);
    }

    public function test_signer_relation()
    {
        $repository = new WaiverConsents();
        $types = $repository->getSignerRelations();

        self::assertIsArray($types);
        self::assertCount(4, $types);

        self::assertInstanceOf(GuardianSigner::class, $types[GuardianSigner::NAME]);
        self::assertInstanceOf(PersonalSigner::class, $types[PersonalSigner::NAME]);
        self::assertInstanceOf(CoachSigner::class, $types[CoachSigner::NAME]);
        self::assertInstanceOf(GroupLeaderSigner::class, $types[GroupLeaderSigner::NAME]);
    }
}
