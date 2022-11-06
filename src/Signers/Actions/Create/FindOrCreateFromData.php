<?php

namespace Sportic\Waiver\Signers\Actions\Create;

use Sportic\Waiver\Signers\Actions\Behaviours\HasRepository;
use Sportic\Waiver\Utility\Hashing;

class FindOrCreateFromData
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
        $data = $this->data;
        $data['hash'] = Hashing::forArray($this->data);

        $recordFound = $this->repository->findOneByParams([
            'where' => [
                ['hash = ?', $data['hash']],
            ],
        ]);
        if ($recordFound) {
            return $recordFound;
        }
        return $this->createRecord($data);
    }
}