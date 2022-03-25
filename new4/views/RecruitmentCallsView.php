<?php

namespace PHPMaker2021\HIMS;

// Page object
$RecruitmentCallsView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var frecruitment_callsview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    frecruitment_callsview = currentForm = new ew.Form("frecruitment_callsview", "view");
    loadjs.done("frecruitment_callsview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.recruitment_calls) ew.vars.tables.recruitment_calls = <?= JsonEncode(GetClientVar("tables", "recruitment_calls")) ?>;
</script>
<?php if (!$Page->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $Page->ExportOptions->render("body") ?>
<?php $Page->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="frecruitment_callsview" id="frecruitment_callsview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="recruitment_calls">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_calls_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_recruitment_calls_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->job->Visible) { // job ?>
    <tr id="r_job">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_calls_job"><?= $Page->job->caption() ?></span></td>
        <td data-name="job" <?= $Page->job->cellAttributes() ?>>
<span id="el_recruitment_calls_job">
<span<?= $Page->job->viewAttributes() ?>>
<?= $Page->job->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->candidate->Visible) { // candidate ?>
    <tr id="r_candidate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_calls_candidate"><?= $Page->candidate->caption() ?></span></td>
        <td data-name="candidate" <?= $Page->candidate->cellAttributes() ?>>
<span id="el_recruitment_calls_candidate">
<span<?= $Page->candidate->viewAttributes() ?>>
<?= $Page->candidate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->phone->Visible) { // phone ?>
    <tr id="r_phone">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_calls_phone"><?= $Page->phone->caption() ?></span></td>
        <td data-name="phone" <?= $Page->phone->cellAttributes() ?>>
<span id="el_recruitment_calls_phone">
<span<?= $Page->phone->viewAttributes() ?>>
<?= $Page->phone->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->created->Visible) { // created ?>
    <tr id="r_created">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_calls_created"><?= $Page->created->caption() ?></span></td>
        <td data-name="created" <?= $Page->created->cellAttributes() ?>>
<span id="el_recruitment_calls_created">
<span<?= $Page->created->viewAttributes() ?>>
<?= $Page->created->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->updated->Visible) { // updated ?>
    <tr id="r_updated">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_calls_updated"><?= $Page->updated->caption() ?></span></td>
        <td data-name="updated" <?= $Page->updated->cellAttributes() ?>>
<span id="el_recruitment_calls_updated">
<span<?= $Page->updated->viewAttributes() ?>>
<?= $Page->updated->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <tr id="r_status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_calls_status"><?= $Page->status->caption() ?></span></td>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<span id="el_recruitment_calls_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->notes->Visible) { // notes ?>
    <tr id="r_notes">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_calls_notes"><?= $Page->notes->caption() ?></span></td>
        <td data-name="notes" <?= $Page->notes->cellAttributes() ?>>
<span id="el_recruitment_calls_notes">
<span<?= $Page->notes->viewAttributes() ?>>
<?= $Page->notes->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
</table>
</form>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<?php if (!$Page->isExport()) { ?>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>
