<?php

use Sportic\Waiver\Consents\Models\WaiverConsents;
use Sportic\Waiver\Contents\Models\WaiverContents;
use Sportic\Waiver\Devices\Models\WaiverDevices;
use Sportic\Waiver\Geolocations\Models\WaiverGeolocations;
use Sportic\Waiver\Signers\Models\WaiverSigners;
use Sportic\Waiver\Signatures\Models\WaiverSignatures;
use Sportic\Waiver\Templates\Models\WaiverTemplates;
use Sportic\Waiver\Utility\WaiverModels;
use Sportic\Waiver\Waivers\Models\Waivers;

return [
    'models' => [
        WaiverModels::TEMPLATES => WaiverTemplates::class,
        WaiverModels::CONTENTS => WaiverContents::class,
        WaiverModels::WAIVERS => Waivers::class,
        WaiverModels::CONSENTS => WaiverConsents::class,
        WaiverModels::DEVICES => WaiverDevices::class,
        WaiverModels::GEOLOCATIONS => WaiverGeolocations::class,
        WaiverModels::SIGNERS => WaiverSigners::class,
        WaiverModels::SIGNATURES => WaiverSignatures::class,

    ],
    'tables' => [
        WaiverModels::TEMPLATES => WaiverTemplates::TABLE,
        WaiverModels::CONTENTS => WaiverContents::TABLE,
        WaiverModels::WAIVERS => Waivers::TABLE,
        WaiverModels::CONSENTS => WaiverConsents::TABLE,
        WaiverModels::DEVICES => WaiverDevices::TABLE,
        WaiverModels::GEOLOCATIONS => WaiverGeolocations::TABLE,
        WaiverModels::SIGNERS => WaiverSigners::TABLE,
        WaiverModels::SIGNATURES => WaiverSignatures::TABLE,
    ],
    'database' => [
        'connection' => 'main',
        'migrations' => true,
    ],
];