<?php

namespace Sportic\Waiver\Utility;

use ByTIC\PackageBase\Utility\ModelFinder;
use Sportic\Waiver\Consents\Models\WaiverConsents;
use Sportic\Waiver\Contents\Models\WaiverContents;
use Nip\Records\RecordManager;
use Sportic\Waiver\Devices\Models\WaiverDevices;
use Sportic\Waiver\Geolocations\Models\WaiverGeolocations;
use Sportic\Waiver\Persons\Models\WaiverPersons;
use Sportic\Waiver\Signatures\Models\WaiverSignatures;
use Sportic\Waiver\Templates\Models\WaiverTemplates;
use Sportic\Waiver\Waivers\Models\Waivers;
use Sportic\Waiver\WaiverServiceProvider;

/**
 * Class WaiverModels
 * @package Sportic\Waiver\Utility
 */
class WaiverModels extends ModelFinder
{
    public const TEMPLATES = 'templates';
    public const CONTENTS = 'contents';
    public const WAIVERS = 'waivers';
    public const CONSENTS = 'consents';
    public const DEVICES = 'devices';
    public const GEOLOCATIONS = 'geolocations';
    public const PERSONS = 'persons';
    public const SIGNATURES = 'signatures';

    /**
     * @return WaiverTemplates|RecordManager
     */
    public static function templates()
    {
        return static::getModels(self::TEMPLATES, WaiverTemplates::class);
    }

    /**
     * @return WaiverContents|RecordManager
     */
    public static function contents()
    {
        return static::getModels(self::CONTENTS, WaiverContents::class);
    }

    /**
     * @return Waivers
     */
    public static function waivers()
    {
        return static::getModels(self::WAIVERS, Waivers::class);
    }
    /**
     * @return WaiverConsents|RecordManager
     */
    public static function consents()
    {
        return static::getModels(self::CONSENTS, WaiverConsents::class);
    }
    /**
     * @return WaiverDevices
     */
    public static function devices()
    {
        return static::getModels(self::DEVICES, WaiverDevices::class);
    }

    /**
     * @return WaiverGeolocations
     */
    public static function geolocations()
    {
        return static::getModels(self::GEOLOCATIONS, WaiverGeolocations::class);
    }

    /**
     * @return WaiverPersons
     */
    public static function persons()
    {
        return static::getModels(self::PERSONS, WaiverPersons::class);
    }

    /**
     * @return WaiverSignatures
     */
    public static function signatures()
    {
        return static::getModels(self::SIGNATURES, WaiverSignatures::class);
    }

    protected static function packageName(): string
    {
        return WaiverServiceProvider::NAME;
    }
}
