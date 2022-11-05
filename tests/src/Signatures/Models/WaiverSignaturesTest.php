<?php

namespace Sportic\Waiver\Tests\Signatures\Models;

use Sportic\Waiver\Signatures\Models\Types\DrawnSignature;
use Sportic\Waiver\Signatures\Models\Types\TypedSignature;
use Sportic\Waiver\Signatures\Models\WaiverSignatures;
use Sportic\Waiver\Tests\AbstractTest;

class WaiverSignaturesTest extends AbstractTest
{
    public function test_types()
    {
        $repository = new WaiverSignatures();
        $types = $repository->getTypes();

        self::assertIsArray($types);
        self::assertCount(2, $types);

        self::assertInstanceOf(DrawnSignature::class, $types[DrawnSignature::NAME]);
        self::assertInstanceOf(TypedSignature::class, $types[TypedSignature::NAME]);
    }
}
