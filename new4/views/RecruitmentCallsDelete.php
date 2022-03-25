<?php

namespace PHPMaker2021\HIMS;

// Page object
$RecruitmentCallsDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var frecruitment_callsdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    frecruitment_callsdelete = currentForm = new ew.Form("frecruitment_callsdelete", "delete");
    loadjs.done("frecruitment_callsdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.recruitment_calls) ew.vars.tables.recruitment_calls = <?= JsonEncode(GetClientVar("tables", "recruitment_calls")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="frecruitment_callsdelete" id="frecruitment_callsdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="recruitment_calls">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_recruitment_calls_id" class="recruitment_calls_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->job->Visible) { // job ?>
        <th class="<?= $Page->job->headerCellClass() ?>"><span id="elh_recruitment_calls_job" class="recruitment_calls_job"><?= $Page->job->caption() ?></span></th>
<?php } ?>
<?php if ($Page->candidate->Visible) { // candidate ?>
        <th class="<?= $Page->candidate->headerCellClass() ?>"><span id="elh_recruitment_calls_candidate" class="recruitment_calls_candidate"><?= $Page->candidate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->phone->Visible) { // phone ?>
        <th class="<?= $Page->phone->headerCellClass() ?>"><span id="elh_recruitment_calls_phone" class="recruitment_calls_phone"><?= $Page->phone->caption() ?></span></th>
<?php } ?>
<?php if ($Page->created->Visible) { // created ?>
        <th class="<?= $Page->created->headerCellClass() ?>"><span id="elh_recruitment_calls_created" class="recruitment_calls_created"><?= $Page->created->caption() ?></span></th>
<?php } ?>
<?php if ($Page->updated->Visible) { // updated ?>
        <th class="<?= $Page->updated->headerCellClass() ?>"><span id="elh_recruitment_calls_updated" class="recruitment_calls_updated"><?= $Page->updated->caption() ?></span></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th class="<?= $Page->status->headerCellClass() ?>"><span id="elh_recruitment_calls_status" class="recruitment_calls_status"><?= $Page->status->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_recruitment_calls_id" class="recruitment_calls_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->job->Visible) { // job ?>
        <td <?= $Page->job->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_calls_job" class="recruitment_calls_job">
<span<?= $Page->job->viewAttributes() ?>>
<?= $Page->job->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->candidate->Visible) { // candidate ?>
        <td <?= $Page->candidate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_calls_candidate" class="recruitment_calls_candidate">
<span<?= $Page->candidate->viewAttributes() ?>>
<?= $Page->candidate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->phone->Visible) { // phone ?>
        <td <?= $Page->phone->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_calls_phone" class="recruitment_calls_phone">
<span<?= $Page->phone->viewAttributes() ?>>
<?= $Page->phone->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->created->Visible) { // created ?>
        <td <?= $Page->created->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_calls_created" class="recruitment_calls_created">
<span<?= $Page->created->viewAttributes() ?>>
<?= $Page->created->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->updated->Visible) { // updated ?>
        <td <?= $Page->updated->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_calls_updated" class="recruitment_calls_updated">
<span<?= $Page->updated->viewAttributes() ?>>
<?= $Page->updated->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <td <?= $Page->status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_calls_status" class="recruitment_calls_status">
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
