<?php

use ByTIC\AdminBase\Widgets\Cards\Card;
use ByTIC\Icons\Icons;
use Sportic\Waiver\Utility\WaiverModels;

$card = Card::make()
    ->withTitle(WaiverModels::waivers()->getLabel('title'))
    ->withIcon(Icons::list_ul())
    ->withContent($this->load('/spt_waiver-subjects/modules/lists/group', ['item' => $item], true))
    ->wrapBody(false);
?>
<?= $card ?>