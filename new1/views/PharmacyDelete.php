<?php

namespace PHPMaker2021\project3;

// Page object
$PharmacyDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpharmacydelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fpharmacydelete = currentForm = new ew.Form("fpharmacydelete", "delete");
    loadjs.done("fpharmacydelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fpharmacydelete" id="fpharmacydelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pharmacy">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_pharmacy_id" class="pharmacy_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->op_id->Visible) { // op_id ?>
        <th class="<?= $Page->op_id->headerCellClass() ?>"><span id="elh_pharmacy_op_id" class="pharmacy_op_id"><?= $Page->op_id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ip_id->Visible) { // ip_id ?>
        <th class="<?= $Page->ip_id->headerCellClass() ?>"><span id="elh_pharmacy_ip_id" class="pharmacy_ip_id"><?= $Page->ip_id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->patient_id->Visible) { // patient_id ?>
        <th class="<?= $Page->patient_id->headerCellClass() ?>"><span id="elh_pharmacy_patient_id" class="pharmacy_patient_id"><?= $Page->patient_id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->charged_date->Visible) { // charged_date ?>
        <th class="<?= $Page->charged_date->headerCellClass() ?>"><span id="elh_pharmacy_charged_date" class="pharmacy_charged_date"><?= $Page->charged_date->caption() ?></span></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th class="<?= $Page->status->headerCellClass() ?>"><span id="elh_pharmacy_status" class="pharmacy_status"><?= $Page->status->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <th class="<?= $Page->createdby->headerCellClass() ?>"><span id="elh_pharmacy_createdby" class="pharmacy_createdby"><?= $Page->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th class="<?= $Page->createddatetime->headerCellClass() ?>"><span id="elh_pharmacy_createddatetime" class="pharmacy_createddatetime"><?= $Page->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <th class="<?= $Page->modifiedby->headerCellClass() ?>"><span id="elh_pharmacy_modifiedby" class="pharmacy_modifiedby"><?= $Page->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <th class="<?= $Page->modifieddatetime->headerCellClass() ?>"><span id="elh_pharmacy_modifieddatetime" class="pharmacy_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_pharmacy_id" class="pharmacy_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->op_id->Visible) { // op_id ?>
        <td <?= $Page->op_id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_op_id" class="pharmacy_op_id">
<span<?= $Page->op_id->viewAttributes() ?>>
<?= $Page->op_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ip_id->Visible) { // ip_id ?>
        <td <?= $Page->ip_id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_ip_id" class="pharmacy_ip_id">
<span<?= $Page->ip_id->viewAttributes() ?>>
<?= $Page->ip_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->patient_id->Visible) { // patient_id ?>
        <td <?= $Page->patient_id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_patient_id" class="pharmacy_patient_id">
<span<?= $Page->patient_id->viewAttributes() ?>>
<?= $Page->patient_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->charged_date->Visible) { // charged_date ?>
        <td <?= $Page->charged_date->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_charged_date" class="pharmacy_charged_date">
<span<?= $Page->charged_date->viewAttributes() ?>>
<?= $Page->charged_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <td <?= $Page->status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_status" class="pharmacy_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <td <?= $Page->createdby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_createdby" class="pharmacy_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_createddatetime" class="pharmacy_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_modifiedby" class="pharmacy_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_modifieddatetime" class="pharmacy_modifieddatetime">
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
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= GetUrl($Page->getReturnUrl()) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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
