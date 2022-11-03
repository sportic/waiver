<?php

namespace Sportic\Waiver\Devices\Actions\Find;

use Sportic\Waiver\Contents\Actions\Behaviours\HasRepository;
use Sportic\Waiver\Contents\Models\WaiverContent;
use Sportic\Waiver\Devices\Models\WaiverDevice;

class FindDeviceByHash
{
    use HasRepository;

    public static function with(string $hash, $repository = null): WaiverDevice|null
    {
        $action = new static($repository);
        return $action->repository->findOneByParams([
            'where' => [
                ['hash = ?', $hash],
            ]]);
    }

}