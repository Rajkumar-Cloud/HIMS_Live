<?php

namespace PHPMaker2021\HIMS;

// Page object
$MasEmployeeRoleJobDescriptionDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fmas_employee_role_job_descriptiondelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fmas_employee_role_job_descriptiondelete = currentForm = new ew.Form("fmas_employee_role_job_descriptiondelete", "delete");
    loadjs.done("fmas_employee_role_job_descriptiondelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.mas_employee_role_job_description) ew.vars.tables.mas_employee_role_job_description = <?= JsonEncode(GetClientVar("tables", "mas_employee_role_job_description")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fmas_employee_role_job_descriptiondelete" id="fmas_employee_role_job_descriptiondelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="mas_employee_role_job_description">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_mas_employee_role_job_description_id" class="mas_employee_role_job_description_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->role->Visible) { // role ?>
        <th class="<?= $Page->role->headerCellClass() ?>"><span id="elh_mas_employee_role_job_description_role" class="mas_employee_role_job_description_role"><?= $Page->role->caption() ?></span></th>
<?php } ?>
<?php if ($Page->job_description->Visible) { // job_description ?>
        <th class="<?= $Page->job_description->headerCellClass() ?>"><span id="elh_mas_employee_role_job_description_job_description" class="mas_employee_role_job_description_job_description"><?= $Page->job_description->caption() ?></span></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th class="<?= $Page->status->headerCellClass() ?>"><span id="elh_mas_employee_role_job_description_status" class="mas_employee_role_job_description_status"><?= $Page->status->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <th class="<?= $Page->createdby->headerCellClass() ?>"><span id="elh_mas_employee_role_job_description_createdby" class="mas_employee_role_job_description_createdby"><?= $Page->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th class="<?= $Page->createddatetime->headerCellClass() ?>"><span id="elh_mas_employee_role_job_description_createddatetime" class="mas_employee_role_job_description_createddatetime"><?= $Page->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <th class="<?= $Page->modifiedby->headerCellClass() ?>"><span id="elh_mas_employee_role_job_description_modifiedby" class="mas_employee_role_job_description_modifiedby"><?= $Page->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <th class="<?= $Page->modifieddatetime->headerCellClass() ?>"><span id="elh_mas_employee_role_job_description_modifieddatetime" class="mas_employee_role_job_description_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_mas_employee_role_job_description_id" class="mas_employee_role_job_description_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->role->Visible) { // role ?>
        <td <?= $Page->role->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_mas_employee_role_job_description_role" class="mas_employee_role_job_description_role">
<span<?= $Page->role->viewAttributes() ?>>
<?= $Page->role->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->job_description->Visible) { // job_description ?>
        <td <?= $Page->job_description->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_mas_employee_role_job_description_job_description" class="mas_employee_role_job_description_job_description">
<span<?= $Page->job_description->viewAttributes() ?>>
<?= $Page->job_description->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <td <?= $Page->status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_mas_employee_role_job_description_status" class="mas_employee_role_job_description_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <td <?= $Page->createdby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_mas_employee_role_job_description_createdby" class="mas_employee_role_job_description_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_mas_employee_role_job_description_createddatetime" class="mas_employee_role_job_description_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_mas_employee_role_job_description_modifiedby" class="mas_employee_role_job_description_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_mas_employee_role_job_description_modifieddatetime" class="mas_employee_role_job_description_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
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
