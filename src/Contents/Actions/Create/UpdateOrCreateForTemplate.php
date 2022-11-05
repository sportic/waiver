<?php


namespace Sportic\Waiver\Contents\Actions\Create;

use Sportic\Waiver\Contents\Actions\Behaviours\HasRepository;
use Sportic\Waiver\Contents\Actions\Find\FindWaiverContentByHash;
use Sportic\Waiver\Contents\Actions\Find\FindWaiverContentLastVersion;
use Sportic\Waiver\Templates\Models\WaiverTemplate;
use Sportic\Waiver\Utility\Hashing;

class UpdateOrCreateForTemplate
{
    use HasRepository;

    protected WaiverTemplate $template;

    protected string $body;


    public static function for(WaiverTemplate $template, string $body)
    {
        $action = new self();
        $action->template = $template;
        $action->body = trim($body);
        return $action;
    }

    public function save()
    {
        $data = ['body' => $this->body];
        $data['hash'] = Hashing::forString($this->body);
        $data['template_id'] = $this->template->id;

        $recordFound = (new FindWaiverContentByHash($this->repository))($data['hash'], $data['template_id']);
        if ($recordFound) {
            $this->updateTemplateLastContent($recordFound);
            return $recordFound;
        }
        $lastVersion = FindWaiverContentLastVersion::for($this->template)->fetch();
        $data['version'] = $lastVersion ? $lastVersion->getVersion() + 1 : 1;
        $record = $this->createRecord($data);
        $this->updateTemplateLastContent($record);
        return $record;
    }

    protected function updateTemplateLastContent($content): void
    {
        if ($this->template->getContentLastId() == $content->id) {
            return;
        }
        $this->template->setContentLastId($content->id);
        $this->template->saveRecord();
    }
}