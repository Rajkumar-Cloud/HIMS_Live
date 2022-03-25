<?php

namespace PHPMaker2021\project3;

// Page object
$HospitalView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fhospitalview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fhospitalview = currentForm = new ew.Form("fhospitalview", "view");
    loadjs.done("fhospitalview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
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
<form name="fhospitalview" id="fhospitalview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="hospital">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hospital_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_hospital_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->logo->Visible) { // logo ?>
    <tr id="r_logo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hospital_logo"><?= $Page->logo->caption() ?></span></td>
        <td data-name="logo" <?= $Page->logo->cellAttributes() ?>>
<span id="el_hospital_logo">
<span<?= $Page->logo->viewAttributes() ?>>
<?= $Page->logo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->hospital->Visible) { // hospital ?>
    <tr id="r_hospital">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hospital_hospital"><?= $Page->hospital->caption() ?></span></td>
        <td data-name="hospital" <?= $Page->hospital->cellAttributes() ?>>
<span id="el_hospital_hospital">
<span<?= $Page->hospital->viewAttributes() ?>>
<?= $Page->hospital->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->street->Visible) { // street ?>
    <tr id="r_street">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hospital_street"><?= $Page->street->caption() ?></span></td>
        <td data-name="street" <?= $Page->street->cellAttributes() ?>>
<span id="el_hospital_street">
<span<?= $Page->street->viewAttributes() ?>>
<?= $Page->street->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->area->Visible) { // area ?>
    <tr id="r_area">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hospital_area"><?= $Page->area->caption() ?></span></td>
        <td data-name="area" <?= $Page->area->cellAttributes() ?>>
<span id="el_hospital_area">
<span<?= $Page->area->viewAttributes() ?>>
<?= $Page->area->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->town->Visible) { // town ?>
    <tr id="r_town">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hospital_town"><?= $Page->town->caption() ?></span></td>
        <td data-name="town" <?= $Page->town->cellAttributes() ?>>
<span id="el_hospital_town">
<span<?= $Page->town->viewAttributes() ?>>
<?= $Page->town->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->province->Visible) { // province ?>
    <tr id="r_province">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hospital_province"><?= $Page->province->caption() ?></span></td>
        <td data-name="province" <?= $Page->province->cellAttributes() ?>>
<span id="el_hospital_province">
<span<?= $Page->province->viewAttributes() ?>>
<?= $Page->province->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->postal_code->Visible) { // postal_code ?>
    <tr id="r_postal_code">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hospital_postal_code"><?= $Page->postal_code->caption() ?></span></td>
        <td data-name="postal_code" <?= $Page->postal_code->cellAttributes() ?>>
<span id="el_hospital_postal_code">
<span<?= $Page->postal_code->viewAttributes() ?>>
<?= $Page->postal_code->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->phone_no->Visible) { // phone_no ?>
    <tr id="r_phone_no">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hospital_phone_no"><?= $Page->phone_no->caption() ?></span></td>
        <td data-name="phone_no" <?= $Page->phone_no->cellAttributes() ?>>
<span id="el_hospital_phone_no">
<span<?= $Page->phone_no->viewAttributes() ?>>
<?= $Page->phone_no->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PreFixCode->Visible) { // PreFixCode ?>
    <tr id="r_PreFixCode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hospital_PreFixCode"><?= $Page->PreFixCode->caption() ?></span></td>
        <td data-name="PreFixCode" <?= $Page->PreFixCode->cellAttributes() ?>>
<span id="el_hospital_PreFixCode">
<span<?= $Page->PreFixCode->viewAttributes() ?>>
<?= $Page->PreFixCode->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <tr id="r_status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hospital_status"><?= $Page->status->caption() ?></span></td>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<span id="el_hospital_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <tr id="r_createdby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hospital_createdby"><?= $Page->createdby->caption() ?></span></td>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<span id="el_hospital_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <tr id="r_createddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hospital_createddatetime"><?= $Page->createddatetime->caption() ?></span></td>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el_hospital_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <tr id="r_modifiedby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hospital_modifiedby"><?= $Page->modifiedby->caption() ?></span></td>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el_hospital_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <tr id="r_modifieddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hospital_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span></td>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el_hospital_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BillingGST->Visible) { // BillingGST ?>
    <tr id="r_BillingGST">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hospital_BillingGST"><?= $Page->BillingGST->caption() ?></span></td>
        <td data-name="BillingGST" <?= $Page->BillingGST->cellAttributes() ?>>
<span id="el_hospital_BillingGST">
<span<?= $Page->BillingGST->viewAttributes() ?>>
<?= $Page->BillingGST->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->pharmacyGST->Visible) { // pharmacyGST ?>
    <tr id="r_pharmacyGST">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hospital_pharmacyGST"><?= $Page->pharmacyGST->caption() ?></span></td>
        <td data-name="pharmacyGST" <?= $Page->pharmacyGST->cellAttributes() ?>>
<span id="el_hospital_pharmacyGST">
<span<?= $Page->pharmacyGST->viewAttributes() ?>>
<?= $Page->pharmacyGST->getViewValue() ?></span>
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
