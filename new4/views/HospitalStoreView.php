<?php

namespace PHPMaker2021\HIMS;

// Page object
$HospitalStoreView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fhospital_storeview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fhospital_storeview = currentForm = new ew.Form("fhospital_storeview", "view");
    loadjs.done("fhospital_storeview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.hospital_store) ew.vars.tables.hospital_store = <?= JsonEncode(GetClientVar("tables", "hospital_store")) ?>;
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
<form name="fhospital_storeview" id="fhospital_storeview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="hospital_store">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hospital_store_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_hospital_store_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->logo->Visible) { // logo ?>
    <tr id="r_logo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hospital_store_logo"><?= $Page->logo->caption() ?></span></td>
        <td data-name="logo" <?= $Page->logo->cellAttributes() ?>>
<span id="el_hospital_store_logo">
<span>
<?= GetFileViewTag($Page->logo, $Page->logo->getViewValue(), false) ?>
</span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->pharmacy->Visible) { // pharmacy ?>
    <tr id="r_pharmacy">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hospital_store_pharmacy"><?= $Page->pharmacy->caption() ?></span></td>
        <td data-name="pharmacy" <?= $Page->pharmacy->cellAttributes() ?>>
<span id="el_hospital_store_pharmacy">
<span<?= $Page->pharmacy->viewAttributes() ?>>
<?= $Page->pharmacy->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->street->Visible) { // street ?>
    <tr id="r_street">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hospital_store_street"><?= $Page->street->caption() ?></span></td>
        <td data-name="street" <?= $Page->street->cellAttributes() ?>>
<span id="el_hospital_store_street">
<span<?= $Page->street->viewAttributes() ?>>
<?= $Page->street->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->area->Visible) { // area ?>
    <tr id="r_area">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hospital_store_area"><?= $Page->area->caption() ?></span></td>
        <td data-name="area" <?= $Page->area->cellAttributes() ?>>
<span id="el_hospital_store_area">
<span<?= $Page->area->viewAttributes() ?>>
<?= $Page->area->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->town->Visible) { // town ?>
    <tr id="r_town">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hospital_store_town"><?= $Page->town->caption() ?></span></td>
        <td data-name="town" <?= $Page->town->cellAttributes() ?>>
<span id="el_hospital_store_town">
<span<?= $Page->town->viewAttributes() ?>>
<?= $Page->town->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->province->Visible) { // province ?>
    <tr id="r_province">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hospital_store_province"><?= $Page->province->caption() ?></span></td>
        <td data-name="province" <?= $Page->province->cellAttributes() ?>>
<span id="el_hospital_store_province">
<span<?= $Page->province->viewAttributes() ?>>
<?= $Page->province->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->postal_code->Visible) { // postal_code ?>
    <tr id="r_postal_code">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hospital_store_postal_code"><?= $Page->postal_code->caption() ?></span></td>
        <td data-name="postal_code" <?= $Page->postal_code->cellAttributes() ?>>
<span id="el_hospital_store_postal_code">
<span<?= $Page->postal_code->viewAttributes() ?>>
<?= $Page->postal_code->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->phone_no->Visible) { // phone_no ?>
    <tr id="r_phone_no">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hospital_store_phone_no"><?= $Page->phone_no->caption() ?></span></td>
        <td data-name="phone_no" <?= $Page->phone_no->cellAttributes() ?>>
<span id="el_hospital_store_phone_no">
<span<?= $Page->phone_no->viewAttributes() ?>>
<?= $Page->phone_no->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PreFixCode->Visible) { // PreFixCode ?>
    <tr id="r_PreFixCode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hospital_store_PreFixCode"><?= $Page->PreFixCode->caption() ?></span></td>
        <td data-name="PreFixCode" <?= $Page->PreFixCode->cellAttributes() ?>>
<span id="el_hospital_store_PreFixCode">
<span<?= $Page->PreFixCode->viewAttributes() ?>>
<?= $Page->PreFixCode->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <tr id="r_status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hospital_store_status"><?= $Page->status->caption() ?></span></td>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<span id="el_hospital_store_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <tr id="r_createdby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hospital_store_createdby"><?= $Page->createdby->caption() ?></span></td>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<span id="el_hospital_store_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <tr id="r_createddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hospital_store_createddatetime"><?= $Page->createddatetime->caption() ?></span></td>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el_hospital_store_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <tr id="r_modifiedby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hospital_store_modifiedby"><?= $Page->modifiedby->caption() ?></span></td>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el_hospital_store_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <tr id="r_modifieddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hospital_store_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span></td>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el_hospital_store_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->pharmacyGST->Visible) { // pharmacyGST ?>
    <tr id="r_pharmacyGST">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hospital_store_pharmacyGST"><?= $Page->pharmacyGST->caption() ?></span></td>
        <td data-name="pharmacyGST" <?= $Page->pharmacyGST->cellAttributes() ?>>
<span id="el_hospital_store_pharmacyGST">
<span<?= $Page->pharmacyGST->viewAttributes() ?>>
<?= $Page->pharmacyGST->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HospId->Visible) { // HospId ?>
    <tr id="r_HospId">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hospital_store_HospId"><?= $Page->HospId->caption() ?></span></td>
        <td data-name="HospId" <?= $Page->HospId->cellAttributes() ?>>
<span id="el_hospital_store_HospId">
<span<?= $Page->HospId->viewAttributes() ?>>
<?= $Page->HospId->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BranchID->Visible) { // BranchID ?>
    <tr id="r_BranchID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hospital_store_BranchID"><?= $Page->BranchID->caption() ?></span></td>
        <td data-name="BranchID" <?= $Page->BranchID->cellAttributes() ?>>
<span id="el_hospital_store_BranchID">
<span<?= $Page->BranchID->viewAttributes() ?>>
<?= $Page->BranchID->getViewValue() ?></span>
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
