<?php


namespace Sportic\Waiver\Contents\Actions\Create;

use Sportic\Waiver\Contents\Actions\Behaviours\HasRepository;
use Sportic\Waiver\Contents\Actions\Find\FindWaiverContentByHash;
use Sportic\Waiver\Contents\Actions\Find\FindWaiverContentLastVersion;
use Sportic\Waiver\Templates\Models\WaiverTemplate;
use Sportic\Waiver\Utility\Hashing;
use Sportic\Waiver\Utility\WaiverModels;

class UpdateOrCreateForTemplate
{
    use HasRepository;

    public function __invoke(WaiverTemplate|WaiverModels $template, string $body)
    {
        $data = ['body' => $body];
        $data['hash'] = Hashing::forString($body);
        $data['template_id'] = $template->id;

        $recordFound = (new FindWaiverContentByHash($this->repository))($data['hash'], $data['template_id']);
        if ($recordFound) {
            return $recordFound;
        }
        $lastVersion = (new FindWaiverContentLastVersion($this->repository))(123, 123);
        $data['version'] = $lastVersion ? $lastVersion->getVersion() + 1 : 1;
        return $this->createRecord($data);
    }

}