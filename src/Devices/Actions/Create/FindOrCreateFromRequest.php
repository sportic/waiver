<?php


namespace Sportic\Waiver\Devices\Actions\Create;

use Sportic\Waiver\Devices\Actions\Behaviours\HasRepository;
use Sportic\Waiver\Devices\Actions\Find\FindDeviceByHash;
use Sportic\Waiver\Utility\Hashing;
use Symfony\Component\HttpFoundation\Request;

class FindOrCreateFromRequest
{
    use HasRepository;

    protected Request $request;


    public static function for(Request $template)
    {
        $action = new self();
        $action->request = $template;
        return $action;
    }

    public function save()
    {
        $data = $this->generateData();
        $data['hash'] = Hashing::forString($data['user_agent']);

        $recordFound = FindDeviceByHash::with($data['hash'], $this->repository);
        if ($recordFound) {
            return $recordFound;
        }
        return $this->createRecord($data);
    }

    protected function generateData(): array
    {
        return [
            'ip' => $this->request->getClientIp(),
            'user_agent' => $this->request->headers->get('User-Agent'),
        ];
    }
}