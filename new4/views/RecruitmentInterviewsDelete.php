<?php

namespace PHPMaker2021\HIMS;

// Page object
$RecruitmentInterviewsDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var frecruitment_interviewsdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    frecruitment_interviewsdelete = currentForm = new ew.Form("frecruitment_interviewsdelete", "delete");
    loadjs.done("frecruitment_interviewsdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.recruitment_interviews) ew.vars.tables.recruitment_interviews = <?= JsonEncode(GetClientVar("tables", "recruitment_interviews")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="frecruitment_interviewsdelete" id="frecruitment_interviewsdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="recruitment_interviews">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($Page->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?= HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
    <thead>
    <tr class="ew-table-header">
<?php if ($Page->id->Visible) { // id ?>
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_recruitment_interviews_id" class="recruitment_interviews_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->job->Visible) { // job ?>
        <th class="<?= $Page->job->headerCellClass() ?>"><span id="elh_recruitment_interviews_job" class="recruitment_interviews_job"><?= $Page->job->caption() ?></span></th>
<?php } ?>
<?php if ($Page->candidate->Visible) { // candidate ?>
        <th class="<?= $Page->candidate->headerCellClass() ?>"><span id="elh_recruitment_interviews_candidate" class="recruitment_interviews_candidate"><?= $Page->candidate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->level->Visible) { // level ?>
        <th class="<?= $Page->level->headerCellClass() ?>"><span id="elh_recruitment_interviews_level" class="recruitment_interviews_level"><?= $Page->level->caption() ?></span></th>
<?php } ?>
<?php if ($Page->created->Visible) { // created ?>
        <th class="<?= $Page->created->headerCellClass() ?>"><span id="elh_recruitment_interviews_created" class="recruitment_interviews_created"><?= $Page->created->caption() ?></span></th>
<?php } ?>
<?php if ($Page->updated->Visible) { // updated ?>
        <th class="<?= $Page->updated->headerCellClass() ?>"><span id="elh_recruitment_interviews_updated" class="recruitment_interviews_updated"><?= $Page->updated->caption() ?></span></th>
<?php } ?>
<?php if ($Page->scheduled->Visible) { // scheduled ?>
        <th class="<?= $Page->scheduled->headerCellClass() ?>"><span id="elh_recruitment_interviews_scheduled" class="recruitment_interviews_scheduled"><?= $Page->scheduled->caption() ?></span></th>
<?php } ?>
<?php if ($Page->mapId->Visible) { // mapId ?>
        <th class="<?= $Page->mapId->headerCellClass() ?>"><span id="elh_recruitment_interviews_mapId" class="recruitment_interviews_mapId"><?= $Page->mapId->caption() ?></span></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th class="<?= $Page->status->headerCellClass() ?>"><span id="elh_recruitment_interviews_status" class="recruitment_interviews_status"><?= $Page->status->caption() ?></span></th>
<?php } ?>
    </tr>
    </thead>
    <tbody>
<?php
$Page->RecordCount = 0;
$i = 0;
while (!$Page->Recordset->EOF) {
    $Page->RecordCount++;
    $Page->RowCount++;

    // Set row properties
    $Page->resetAttributes();
    $Page->RowType = ROWTYPE_VIEW; // View

    // Get the field contents
    $Page->loadRowValues($Page->Recordset);

    // Render row
    $Page->renderRow();
?>
    <tr <?= $Page->rowAttributes() ?>>
<?php if ($Page->id->Visible) { // id ?>
        <td <?= $Page->id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_interviews_id" class="recruitment_interviews_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->job->Visible) { // job ?>
        <td <?= $Page->job->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_interviews_job" class="recruitment_interviews_job">
<span<?= $Page->job->viewAttributes() ?>>
<?= $Page->job->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->candidate->Visible) { // candidate ?>
        <td <?= $Page->candidate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_interviews_candidate" class="recruitment_interviews_candidate">
<span<?= $Page->candidate->viewAttributes() ?>>
<?= $Page->candidate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->level->Visible) { // level ?>
        <td <?= $Page->level->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_interviews_level" class="recruitment_interviews_level">
<span<?= $Page->level->viewAttributes() ?>>
<?= $Page->level->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->created->Visible) { // created ?>
        <td <?= $Page->created->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_interviews_created" class="recruitment_interviews_created">
<span<?= $Page->created->viewAttributes() ?>>
<?= $Page->created->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->updated->Visible) { // updated ?>
        <td <?= $Page->updated->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_interviews_updated" class="recruitment_interviews_updated">
<span<?= $Page->updated->viewAttributes() ?>>
<?= $Page->updated->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->scheduled->Visible) { // scheduled ?>
        <td <?= $Page->scheduled->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_interviews_scheduled" class="recruitment_interviews_scheduled">
<span<?= $Page->scheduled->viewAttributes() ?>>
<?= $Page->scheduled->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->mapId->Visible) { // mapId ?>
        <td <?= $Page->mapId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_interviews_mapId" class="recruitment_interviews_mapId">
<span<?= $Page->mapId->viewAttributes() ?>>
<?= $Page->mapId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <td <?= $Page->status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_interviews_status" class="recruitment_interviews_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
    </tr>
<?php
    $Page->Recordset->moveNext();
}
$Page->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
