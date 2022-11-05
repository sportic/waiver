<?php

namespace Sportic\Waiver\Persons\Actions\Create;

use Sportic\Waiver\Contents\Actions\Behaviours\HasRepository;
use Sportic\Waiver\Contents\Actions\Find\FindWaiverContentByHash;
use Sportic\Waiver\Contents\Actions\Find\FindWaiverContentLastVersion;
use Sportic\Waiver\Templates\Models\WaiverTemplate;
use Sportic\Waiver\Utility\Hashing;

class UpdateOrCreateFromData
{
    use HasRepository;

    protected array $data;

    public static function for($firstName, $lastName, $email, $dob)
    {
        $action = new self();
        $action->data = [
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $email,
            'dob' => $dob,
        ];
        return $action;
    }

    public function save()
    {
        $hash = Hashing::forArray($this->data);

        $recordFound = $this->repository->findByField('hash', $hash);
        if ($recordFound) {
            return $recordFound;
        }
        $data['hash'] = $hash;
        return $this->createRecord($data);
    }
}