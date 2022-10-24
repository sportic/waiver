<?php

namespace Sportic\Waiver\Contents\Actions\Find;

use Sportic\Waiver\Contents\Actions\Behaviours\HasRepository;
use Sportic\Waiver\Contents\Models\WaiverContent;

class FindWaiverContentByHash
{
    use HasRepository;

    public function __invoke(string $hash, int $template_id): WaiverContent|null
    {
        return $this->repository->findOneByParams([
            'where' => [
                ['hash = ?', $hash],
                ['template_id = ?', $template_id],
            ]]);
    }

}