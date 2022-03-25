<?php

namespace PHPMaker2021\HIMS;

// Page object
$RecruitmentInterviewsView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var frecruitment_interviewsview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    frecruitment_interviewsview = currentForm = new ew.Form("frecruitment_interviewsview", "view");
    loadjs.done("frecruitment_interviewsview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.recruitment_interviews) ew.vars.tables.recruitment_interviews = <?= JsonEncode(GetClientVar("tables", "recruitment_interviews")) ?>;
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
<form name="frecruitment_interviewsview" id="frecruitment_interviewsview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="recruitment_interviews">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_interviews_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_recruitment_interviews_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->job->Visible) { // job ?>
    <tr id="r_job">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_interviews_job"><?= $Page->job->caption() ?></span></td>
        <td data-name="job" <?= $Page->job->cellAttributes() ?>>
<span id="el_recruitment_interviews_job">
<span<?= $Page->job->viewAttributes() ?>>
<?= $Page->job->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->candidate->Visible) { // candidate ?>
    <tr id="r_candidate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_interviews_candidate"><?= $Page->candidate->caption() ?></span></td>
        <td data-name="candidate" <?= $Page->candidate->cellAttributes() ?>>
<span id="el_recruitment_interviews_candidate">
<span<?= $Page->candidate->viewAttributes() ?>>
<?= $Page->candidate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->level->Visible) { // level ?>
    <tr id="r_level">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_interviews_level"><?= $Page->level->caption() ?></span></td>
        <td data-name="level" <?= $Page->level->cellAttributes() ?>>
<span id="el_recruitment_interviews_level">
<span<?= $Page->level->viewAttributes() ?>>
<?= $Page->level->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->created->Visible) { // created ?>
    <tr id="r_created">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_interviews_created"><?= $Page->created->caption() ?></span></td>
        <td data-name="created" <?= $Page->created->cellAttributes() ?>>
<span id="el_recruitment_interviews_created">
<span<?= $Page->created->viewAttributes() ?>>
<?= $Page->created->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->updated->Visible) { // updated ?>
    <tr id="r_updated">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_interviews_updated"><?= $Page->updated->caption() ?></span></td>
        <td data-name="updated" <?= $Page->updated->cellAttributes() ?>>
<span id="el_recruitment_interviews_updated">
<span<?= $Page->updated->viewAttributes() ?>>
<?= $Page->updated->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->scheduled->Visible) { // scheduled ?>
    <tr id="r_scheduled">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_interviews_scheduled"><?= $Page->scheduled->caption() ?></span></td>
        <td data-name="scheduled" <?= $Page->scheduled->cellAttributes() ?>>
<span id="el_recruitment_interviews_scheduled">
<span<?= $Page->scheduled->viewAttributes() ?>>
<?= $Page->scheduled->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->location->Visible) { // location ?>
    <tr id="r_location">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_interviews_location"><?= $Page->location->caption() ?></span></td>
        <td data-name="location" <?= $Page->location->cellAttributes() ?>>
<span id="el_recruitment_interviews_location">
<span<?= $Page->location->viewAttributes() ?>>
<?= $Page->location->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->mapId->Visible) { // mapId ?>
    <tr id="r_mapId">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_interviews_mapId"><?= $Page->mapId->caption() ?></span></td>
        <td data-name="mapId" <?= $Page->mapId->cellAttributes() ?>>
<span id="el_recruitment_interviews_mapId">
<span<?= $Page->mapId->viewAttributes() ?>>
<?= $Page->mapId->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <tr id="r_status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_interviews_status"><?= $Page->status->caption() ?></span></td>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<span id="el_recruitment_interviews_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->notes->Visible) { // notes ?>
    <tr id="r_notes">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_recruitment_interviews_notes"><?= $Page->notes->caption() ?></span></td>
        <td data-name="notes" <?= $Page->notes->cellAttributes() ?>>
<span id="el_recruitment_interviews_notes">
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
