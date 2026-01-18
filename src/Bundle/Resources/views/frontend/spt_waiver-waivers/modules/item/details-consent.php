<div class="bg-info bg-opacity-25 p-3">
    <table class="table">
        <tr>
            <td>
                <?= $this->waiverTemplateParent->getManager()->getLabel('title.singular') ?>
            </td>
            <td>
                <?= $this->waiverTemplateParent->getName() ?>
            </td>
        </tr>
        <tr>
            <td>
                <?= $this->waiverParent->getManager()->getLabel('title.singular') ?>
            </td>
            <td>
                <?= $this->waiverParent->getName() ?>
            </td>
        </tr>
    </table>
</div>