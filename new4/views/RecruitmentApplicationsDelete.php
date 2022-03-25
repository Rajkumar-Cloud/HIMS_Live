<?php

namespace PHPMaker2021\HIMS;

// Page object
$RecruitmentApplicationsDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var frecruitment_applicationsdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    frecruitment_applicationsdelete = currentForm = new ew.Form("frecruitment_applicationsdelete", "delete");
    loadjs.done("frecruitment_applicationsdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.recruitment_applications) ew.vars.tables.recruitment_applications = <?= JsonEncode(GetClientVar("tables", "recruitment_applications")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="frecruitment_applicationsdelete" id="frecruitment_applicationsdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="recruitment_applications">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_recruitment_applications_id" class="recruitment_applications_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->job->Visible) { // job ?>
        <th class="<?= $Page->job->headerCellClass() ?>"><span id="elh_recruitment_applications_job" class="recruitment_applications_job"><?= $Page->job->caption() ?></span></th>
<?php } ?>
<?php if ($Page->candidate->Visible) { // candidate ?>
        <th class="<?= $Page->candidate->headerCellClass() ?>"><span id="elh_recruitment_applications_candidate" class="recruitment_applications_candidate"><?= $Page->candidate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->created->Visible) { // created ?>
        <th class="<?= $Page->created->headerCellClass() ?>"><span id="elh_recruitment_applications_created" class="recruitment_applications_created"><?= $Page->created->caption() ?></span></th>
<?php } ?>
<?php if ($Page->referredByEmail->Visible) { // referredByEmail ?>
        <th class="<?= $Page->referredByEmail->headerCellClass() ?>"><span id="elh_recruitment_applications_referredByEmail" class="recruitment_applications_referredByEmail"><?= $Page->referredByEmail->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_recruitment_applications_id" class="recruitment_applications_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->job->Visible) { // job ?>
        <td <?= $Page->job->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_applications_job" class="recruitment_applications_job">
<span<?= $Page->job->viewAttributes() ?>>
<?= $Page->job->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->candidate->Visible) { // candidate ?>
        <td <?= $Page->candidate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_applications_candidate" class="recruitment_applications_candidate">
<span<?= $Page->candidate->viewAttributes() ?>>
<?= $Page->candidate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->created->Visible) { // created ?>
        <td <?= $Page->created->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_applications_created" class="recruitment_applications_created">
<span<?= $Page->created->viewAttributes() ?>>
<?= $Page->created->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->referredByEmail->Visible) { // referredByEmail ?>
        <td <?= $Page->referredByEmail->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_recruitment_applications_referredByEmail" class="recruitment_applications_referredByEmail">
<span<?= $Page->referredByEmail->viewAttributes() ?>>
<?= $Page->referredByEmail->getViewValue() ?></span>
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
