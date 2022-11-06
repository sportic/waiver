<?php

namespace Sportic\Waiver\Tests\Utility;

use Nip\Records\Locator\ModelLocator;
use Sportic\Waiver\Consents\Models\WaiverConsents;
use Sportic\Waiver\Contents\Models\WaiverContents;
use Sportic\Waiver\Devices\Models\WaiverDevices;
use Sportic\Waiver\Geolocations\Models\WaiverGeolocations;
use Sportic\Waiver\Signers\Models\WaiverSigners;
use Sportic\Waiver\Signatures\Models\WaiverSignatures;
use Sportic\Waiver\Templates\Models\WaiverTemplates;
use Sportic\Waiver\Tests\AbstractTest;
use Sportic\Waiver\Utility\WaiverModels;
use Sportic\Waiver\Waivers\Models\Waivers;

class WaiverModelsTest extends AbstractTest
{
    /**
     * @dataProvider data_repository_factories
     * @param $model
     * @param $class
     * @param $table
     * @return void
     */
    public function test_repository_factories($model, $class, $table)
    {
        $this->loadConfigFromFixture('basic');
        ModelLocator::set($class, new $class());

        $repository = call_user_func(WaiverModels::class . '::' . $model);
        self::assertInstanceOf($class, $repository);
        self::assertSame($table, $repository->getTable());
    }

    public function data_repository_factories()
    {
        return [
            [WaiverModels::TEMPLATES, WaiverTemplates::class, WaiverTemplates::TABLE],
            [WaiverModels::CONTENTS, WaiverContents::class, WaiverContents::TABLE],
            [WaiverModels::WAIVERS, Waivers::class, Waivers::TABLE],
            [WaiverModels::CONSENTS, WaiverConsents::class, WaiverConsents::TABLE],
            [WaiverModels::DEVICES, WaiverDevices::class, WaiverDevices::TABLE],
            [WaiverModels::GEOLOCATIONS, WaiverGeolocations::class, WaiverGeolocations::TABLE],
            [WaiverModels::SIGNERS, WaiverSigners::class, WaiverSigners::TABLE],
            [WaiverModels::SIGNATURES, WaiverSignatures::class, WaiverSignatures::TABLE],
        ];
    }
}
