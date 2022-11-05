<?php


namespace Sportic\Waiver\Devices\Actions\Create;

use Nip\Utility\Arr;
use Sportic\Waiver\Devices\Actions\Behaviours\HasRepository;
use Sportic\Waiver\Devices\Actions\Find\FindDeviceByHash;
use Sportic\Waiver\Utility\Hashing;
use Symfony\Component\HttpFoundation\Request;

class FindOrCreateDevice
{
    use HasRepository;

    protected array $data;

    public static function fromData($data): static
    {
        $action = new self();
        $action->data = $data;
        return $action;
    }

    public static function fromRequest(Request $request): static
    {
        return self::fromData([
            'ip' => $request->getClientIp(),
            'user_agent' => $request->headers->get('User-Agent'),
        ]);
    }

    public function save()
    {
        $data = $this->data;
        $data['hash'] = Hashing::forArray(Arr::only($this->data, ['ip', 'user_agent']));

        $recordFound = FindDeviceByHash::with($data['hash'], $this->repository);
        if ($recordFound) {
            return $recordFound;
        }
        return $this->createRecord($data);
    }

}