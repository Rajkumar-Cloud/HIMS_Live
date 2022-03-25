<?php

namespace PHPMaker2021\HIMS;

// Page object
$HospitalDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fhospitaldelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fhospitaldelete = currentForm = new ew.Form("fhospitaldelete", "delete");
    loadjs.done("fhospitaldelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.hospital) ew.vars.tables.hospital = <?= JsonEncode(GetClientVar("tables", "hospital")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fhospitaldelete" id="fhospitaldelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="hospital">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_hospital_id" class="hospital_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->hospital->Visible) { // hospital ?>
        <th class="<?= $Page->hospital->headerCellClass() ?>"><span id="elh_hospital_hospital" class="hospital_hospital"><?= $Page->hospital->caption() ?></span></th>
<?php } ?>
<?php if ($Page->street->Visible) { // street ?>
        <th class="<?= $Page->street->headerCellClass() ?>"><span id="elh_hospital_street" class="hospital_street"><?= $Page->street->caption() ?></span></th>
<?php } ?>
<?php if ($Page->area->Visible) { // area ?>
        <th class="<?= $Page->area->headerCellClass() ?>"><span id="elh_hospital_area" class="hospital_area"><?= $Page->area->caption() ?></span></th>
<?php } ?>
<?php if ($Page->town->Visible) { // town ?>
        <th class="<?= $Page->town->headerCellClass() ?>"><span id="elh_hospital_town" class="hospital_town"><?= $Page->town->caption() ?></span></th>
<?php } ?>
<?php if ($Page->province->Visible) { // province ?>
        <th class="<?= $Page->province->headerCellClass() ?>"><span id="elh_hospital_province" class="hospital_province"><?= $Page->province->caption() ?></span></th>
<?php } ?>
<?php if ($Page->postal_code->Visible) { // postal_code ?>
        <th class="<?= $Page->postal_code->headerCellClass() ?>"><span id="elh_hospital_postal_code" class="hospital_postal_code"><?= $Page->postal_code->caption() ?></span></th>
<?php } ?>
<?php if ($Page->phone_no->Visible) { // phone_no ?>
        <th class="<?= $Page->phone_no->headerCellClass() ?>"><span id="elh_hospital_phone_no" class="hospital_phone_no"><?= $Page->phone_no->caption() ?></span></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th class="<?= $Page->status->headerCellClass() ?>"><span id="elh_hospital_status" class="hospital_status"><?= $Page->status->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PreFixCode->Visible) { // PreFixCode ?>
        <th class="<?= $Page->PreFixCode->headerCellClass() ?>"><span id="elh_hospital_PreFixCode" class="hospital_PreFixCode"><?= $Page->PreFixCode->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BillingGST->Visible) { // BillingGST ?>
        <th class="<?= $Page->BillingGST->headerCellClass() ?>"><span id="elh_hospital_BillingGST" class="hospital_BillingGST"><?= $Page->BillingGST->caption() ?></span></th>
<?php } ?>
<?php if ($Page->pharmacyGST->Visible) { // pharmacyGST ?>
        <th class="<?= $Page->pharmacyGST->headerCellClass() ?>"><span id="elh_hospital_pharmacyGST" class="hospital_pharmacyGST"><?= $Page->pharmacyGST->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Country->Visible) { // Country ?>
        <th class="<?= $Page->Country->headerCellClass() ?>"><span id="elh_hospital_Country" class="hospital_Country"><?= $Page->Country->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_hospital_id" class="hospital_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->hospital->Visible) { // hospital ?>
        <td <?= $Page->hospital->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hospital_hospital" class="hospital_hospital">
<span<?= $Page->hospital->viewAttributes() ?>>
<?= $Page->hospital->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->street->Visible) { // street ?>
        <td <?= $Page->street->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hospital_street" class="hospital_street">
<span<?= $Page->street->viewAttributes() ?>>
<?= $Page->street->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->area->Visible) { // area ?>
        <td <?= $Page->area->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hospital_area" class="hospital_area">
<span<?= $Page->area->viewAttributes() ?>>
<?= $Page->area->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->town->Visible) { // town ?>
        <td <?= $Page->town->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hospital_town" class="hospital_town">
<span<?= $Page->town->viewAttributes() ?>>
<?= $Page->town->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->province->Visible) { // province ?>
        <td <?= $Page->province->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hospital_province" class="hospital_province">
<span<?= $Page->province->viewAttributes() ?>>
<?= $Page->province->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->postal_code->Visible) { // postal_code ?>
        <td <?= $Page->postal_code->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hospital_postal_code" class="hospital_postal_code">
<span<?= $Page->postal_code->viewAttributes() ?>>
<?= $Page->postal_code->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->phone_no->Visible) { // phone_no ?>
        <td <?= $Page->phone_no->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hospital_phone_no" class="hospital_phone_no">
<span<?= $Page->phone_no->viewAttributes() ?>>
<?= $Page->phone_no->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <td <?= $Page->status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hospital_status" class="hospital_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PreFixCode->Visible) { // PreFixCode ?>
        <td <?= $Page->PreFixCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hospital_PreFixCode" class="hospital_PreFixCode">
<span<?= $Page->PreFixCode->viewAttributes() ?>>
<?= $Page->PreFixCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BillingGST->Visible) { // BillingGST ?>
        <td <?= $Page->BillingGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hospital_BillingGST" class="hospital_BillingGST">
<span<?= $Page->BillingGST->viewAttributes() ?>>
<?= $Page->BillingGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->pharmacyGST->Visible) { // pharmacyGST ?>
        <td <?= $Page->pharmacyGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hospital_pharmacyGST" class="hospital_pharmacyGST">
<span<?= $Page->pharmacyGST->viewAttributes() ?>>
<?= $Page->pharmacyGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Country->Visible) { // Country ?>
        <td <?= $Page->Country->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hospital_Country" class="hospital_Country">
<span<?= $Page->Country->viewAttributes() ?>>
<?= $Page->Country->getViewValue() ?></span>
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
