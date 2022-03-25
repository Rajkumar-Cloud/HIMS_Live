<?php

namespace PHPMaker2021\HIMS;

// Page object
$PatientEmergencyContactDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpatient_emergency_contactdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fpatient_emergency_contactdelete = currentForm = new ew.Form("fpatient_emergency_contactdelete", "delete");
    loadjs.done("fpatient_emergency_contactdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.patient_emergency_contact) ew.vars.tables.patient_emergency_contact = <?= JsonEncode(GetClientVar("tables", "patient_emergency_contact")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fpatient_emergency_contactdelete" id="fpatient_emergency_contactdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="patient_emergency_contact">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_patient_emergency_contact_id" class="patient_emergency_contact_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->patient_id->Visible) { // patient_id ?>
        <th class="<?= $Page->patient_id->headerCellClass() ?>"><span id="elh_patient_emergency_contact_patient_id" class="patient_emergency_contact_patient_id"><?= $Page->patient_id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->name->Visible) { // name ?>
        <th class="<?= $Page->name->headerCellClass() ?>"><span id="elh_patient_emergency_contact_name" class="patient_emergency_contact_name"><?= $Page->name->caption() ?></span></th>
<?php } ?>
<?php if ($Page->relationship->Visible) { // relationship ?>
        <th class="<?= $Page->relationship->headerCellClass() ?>"><span id="elh_patient_emergency_contact_relationship" class="patient_emergency_contact_relationship"><?= $Page->relationship->caption() ?></span></th>
<?php } ?>
<?php if ($Page->telephone->Visible) { // telephone ?>
        <th class="<?= $Page->telephone->headerCellClass() ?>"><span id="elh_patient_emergency_contact_telephone" class="patient_emergency_contact_telephone"><?= $Page->telephone->caption() ?></span></th>
<?php } ?>
<?php if ($Page->address->Visible) { // address ?>
        <th class="<?= $Page->address->headerCellClass() ?>"><span id="elh_patient_emergency_contact_address" class="patient_emergency_contact_address"><?= $Page->address->caption() ?></span></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th class="<?= $Page->status->headerCellClass() ?>"><span id="elh_patient_emergency_contact_status" class="patient_emergency_contact_status"><?= $Page->status->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_patient_emergency_contact_id" class="patient_emergency_contact_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->patient_id->Visible) { // patient_id ?>
        <td <?= $Page->patient_id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_emergency_contact_patient_id" class="patient_emergency_contact_patient_id">
<span<?= $Page->patient_id->viewAttributes() ?>>
<?= $Page->patient_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->name->Visible) { // name ?>
        <td <?= $Page->name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_emergency_contact_name" class="patient_emergency_contact_name">
<span<?= $Page->name->viewAttributes() ?>>
<?= $Page->name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->relationship->Visible) { // relationship ?>
        <td <?= $Page->relationship->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_emergency_contact_relationship" class="patient_emergency_contact_relationship">
<span<?= $Page->relationship->viewAttributes() ?>>
<?= $Page->relationship->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->telephone->Visible) { // telephone ?>
        <td <?= $Page->telephone->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_emergency_contact_telephone" class="patient_emergency_contact_telephone">
<span<?= $Page->telephone->viewAttributes() ?>>
<?= $Page->telephone->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->address->Visible) { // address ?>
        <td <?= $Page->address->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_emergency_contact_address" class="patient_emergency_contact_address">
<span<?= $Page->address->viewAttributes() ?>>
<?= $Page->address->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <td <?= $Page->status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_emergency_contact_status" class="patient_emergency_contact_status">
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
