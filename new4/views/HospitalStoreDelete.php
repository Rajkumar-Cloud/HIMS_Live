<?php

namespace PHPMaker2021\HIMS;

// Page object
$HospitalStoreDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fhospital_storedelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fhospital_storedelete = currentForm = new ew.Form("fhospital_storedelete", "delete");
    loadjs.done("fhospital_storedelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.hospital_store) ew.vars.tables.hospital_store = <?= JsonEncode(GetClientVar("tables", "hospital_store")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fhospital_storedelete" id="fhospital_storedelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="hospital_store">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_hospital_store_id" class="hospital_store_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->pharmacy->Visible) { // pharmacy ?>
        <th class="<?= $Page->pharmacy->headerCellClass() ?>"><span id="elh_hospital_store_pharmacy" class="hospital_store_pharmacy"><?= $Page->pharmacy->caption() ?></span></th>
<?php } ?>
<?php if ($Page->street->Visible) { // street ?>
        <th class="<?= $Page->street->headerCellClass() ?>"><span id="elh_hospital_store_street" class="hospital_store_street"><?= $Page->street->caption() ?></span></th>
<?php } ?>
<?php if ($Page->area->Visible) { // area ?>
        <th class="<?= $Page->area->headerCellClass() ?>"><span id="elh_hospital_store_area" class="hospital_store_area"><?= $Page->area->caption() ?></span></th>
<?php } ?>
<?php if ($Page->town->Visible) { // town ?>
        <th class="<?= $Page->town->headerCellClass() ?>"><span id="elh_hospital_store_town" class="hospital_store_town"><?= $Page->town->caption() ?></span></th>
<?php } ?>
<?php if ($Page->province->Visible) { // province ?>
        <th class="<?= $Page->province->headerCellClass() ?>"><span id="elh_hospital_store_province" class="hospital_store_province"><?= $Page->province->caption() ?></span></th>
<?php } ?>
<?php if ($Page->postal_code->Visible) { // postal_code ?>
        <th class="<?= $Page->postal_code->headerCellClass() ?>"><span id="elh_hospital_store_postal_code" class="hospital_store_postal_code"><?= $Page->postal_code->caption() ?></span></th>
<?php } ?>
<?php if ($Page->phone_no->Visible) { // phone_no ?>
        <th class="<?= $Page->phone_no->headerCellClass() ?>"><span id="elh_hospital_store_phone_no" class="hospital_store_phone_no"><?= $Page->phone_no->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PreFixCode->Visible) { // PreFixCode ?>
        <th class="<?= $Page->PreFixCode->headerCellClass() ?>"><span id="elh_hospital_store_PreFixCode" class="hospital_store_PreFixCode"><?= $Page->PreFixCode->caption() ?></span></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th class="<?= $Page->status->headerCellClass() ?>"><span id="elh_hospital_store_status" class="hospital_store_status"><?= $Page->status->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <th class="<?= $Page->createdby->headerCellClass() ?>"><span id="elh_hospital_store_createdby" class="hospital_store_createdby"><?= $Page->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th class="<?= $Page->createddatetime->headerCellClass() ?>"><span id="elh_hospital_store_createddatetime" class="hospital_store_createddatetime"><?= $Page->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <th class="<?= $Page->modifiedby->headerCellClass() ?>"><span id="elh_hospital_store_modifiedby" class="hospital_store_modifiedby"><?= $Page->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <th class="<?= $Page->modifieddatetime->headerCellClass() ?>"><span id="elh_hospital_store_modifieddatetime" class="hospital_store_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->pharmacyGST->Visible) { // pharmacyGST ?>
        <th class="<?= $Page->pharmacyGST->headerCellClass() ?>"><span id="elh_hospital_store_pharmacyGST" class="hospital_store_pharmacyGST"><?= $Page->pharmacyGST->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HospId->Visible) { // HospId ?>
        <th class="<?= $Page->HospId->headerCellClass() ?>"><span id="elh_hospital_store_HospId" class="hospital_store_HospId"><?= $Page->HospId->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BranchID->Visible) { // BranchID ?>
        <th class="<?= $Page->BranchID->headerCellClass() ?>"><span id="elh_hospital_store_BranchID" class="hospital_store_BranchID"><?= $Page->BranchID->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_hospital_store_id" class="hospital_store_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->pharmacy->Visible) { // pharmacy ?>
        <td <?= $Page->pharmacy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hospital_store_pharmacy" class="hospital_store_pharmacy">
<span<?= $Page->pharmacy->viewAttributes() ?>>
<?= $Page->pharmacy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->street->Visible) { // street ?>
        <td <?= $Page->street->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hospital_store_street" class="hospital_store_street">
<span<?= $Page->street->viewAttributes() ?>>
<?= $Page->street->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->area->Visible) { // area ?>
        <td <?= $Page->area->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hospital_store_area" class="hospital_store_area">
<span<?= $Page->area->viewAttributes() ?>>
<?= $Page->area->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->town->Visible) { // town ?>
        <td <?= $Page->town->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hospital_store_town" class="hospital_store_town">
<span<?= $Page->town->viewAttributes() ?>>
<?= $Page->town->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->province->Visible) { // province ?>
        <td <?= $Page->province->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hospital_store_province" class="hospital_store_province">
<span<?= $Page->province->viewAttributes() ?>>
<?= $Page->province->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->postal_code->Visible) { // postal_code ?>
        <td <?= $Page->postal_code->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hospital_store_postal_code" class="hospital_store_postal_code">
<span<?= $Page->postal_code->viewAttributes() ?>>
<?= $Page->postal_code->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->phone_no->Visible) { // phone_no ?>
        <td <?= $Page->phone_no->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hospital_store_phone_no" class="hospital_store_phone_no">
<span<?= $Page->phone_no->viewAttributes() ?>>
<?= $Page->phone_no->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PreFixCode->Visible) { // PreFixCode ?>
        <td <?= $Page->PreFixCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hospital_store_PreFixCode" class="hospital_store_PreFixCode">
<span<?= $Page->PreFixCode->viewAttributes() ?>>
<?= $Page->PreFixCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <td <?= $Page->status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hospital_store_status" class="hospital_store_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <td <?= $Page->createdby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hospital_store_createdby" class="hospital_store_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hospital_store_createddatetime" class="hospital_store_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hospital_store_modifiedby" class="hospital_store_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hospital_store_modifieddatetime" class="hospital_store_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->pharmacyGST->Visible) { // pharmacyGST ?>
        <td <?= $Page->pharmacyGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hospital_store_pharmacyGST" class="hospital_store_pharmacyGST">
<span<?= $Page->pharmacyGST->viewAttributes() ?>>
<?= $Page->pharmacyGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HospId->Visible) { // HospId ?>
        <td <?= $Page->HospId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hospital_store_HospId" class="hospital_store_HospId">
<span<?= $Page->HospId->viewAttributes() ?>>
<?= $Page->HospId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BranchID->Visible) { // BranchID ?>
        <td <?= $Page->BranchID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hospital_store_BranchID" class="hospital_store_BranchID">
<span<?= $Page->BranchID->viewAttributes() ?>>
<?= $Page->BranchID->getViewValue() ?></span>
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
