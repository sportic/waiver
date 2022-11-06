<?php

use ByTIC\AdminBase\Widgets\Cards\Card;
use ByTIC\Icons\Icons;
use Sportic\Waiver\SubjectGroups\WaiverSubjectGroupInterface;
use Sportic\Waiver\Subjects\WaiverSubjectInterface;
use Sportic\Waiver\Utility\WaiverModels;

/** @var \Nip\Records\Record $item */
if ($item instanceof WaiverSubjectInterface || $item instanceof WaiverSubjectGroupInterface) {
    $waivers = $item->getWaivers();
} else {
    $waivers = [];
}

$card = Card::make()
    ->withTitle(WaiverModels::waivers()->getLabel('title'))
    ->withIcon(Icons::list_ul())
    ->withContent($this->load('/spt_waiver_waivers/modules/lists/subject', ['waivers' => $waivers], true))
    ->wrapBody(false);
?>
<?= $card ?>


