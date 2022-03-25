<?php

namespace PHPMaker2021\project3;

// Page object
$PharmacyPurchaseRequestView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpharmacy_purchase_requestview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fpharmacy_purchase_requestview = currentForm = new ew.Form("fpharmacy_purchase_requestview", "view");
    loadjs.done("fpharmacy_purchase_requestview");
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
<form name="fpharmacy_purchase_requestview" id="fpharmacy_purchase_requestview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pharmacy_purchase_request">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchase_request_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DT->Visible) { // DT ?>
    <tr id="r_DT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchase_request_DT"><?= $Page->DT->caption() ?></span></td>
        <td data-name="DT" <?= $Page->DT->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_DT">
<span<?= $Page->DT->viewAttributes() ?>>
<?= $Page->DT->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EmployeeName->Visible) { // EmployeeName ?>
    <tr id="r_EmployeeName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchase_request_EmployeeName"><?= $Page->EmployeeName->caption() ?></span></td>
        <td data-name="EmployeeName" <?= $Page->EmployeeName->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_EmployeeName">
<span<?= $Page->EmployeeName->viewAttributes() ?>>
<?= $Page->EmployeeName->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Department->Visible) { // Department ?>
    <tr id="r_Department">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchase_request_Department"><?= $Page->Department->caption() ?></span></td>
        <td data-name="Department" <?= $Page->Department->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_Department">
<span<?= $Page->Department->viewAttributes() ?>>
<?= $Page->Department->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ApprovedStatus->Visible) { // ApprovedStatus ?>
    <tr id="r_ApprovedStatus">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchase_request_ApprovedStatus"><?= $Page->ApprovedStatus->caption() ?></span></td>
        <td data-name="ApprovedStatus" <?= $Page->ApprovedStatus->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_ApprovedStatus">
<span<?= $Page->ApprovedStatus->viewAttributes() ?>>
<?= $Page->ApprovedStatus->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PurchaseStatus->Visible) { // PurchaseStatus ?>
    <tr id="r_PurchaseStatus">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchase_request_PurchaseStatus"><?= $Page->PurchaseStatus->caption() ?></span></td>
        <td data-name="PurchaseStatus" <?= $Page->PurchaseStatus->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_PurchaseStatus">
<span<?= $Page->PurchaseStatus->viewAttributes() ?>>
<?= $Page->PurchaseStatus->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <tr id="r_HospID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchase_request_HospID"><?= $Page->HospID->caption() ?></span></td>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <tr id="r_createdby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchase_request_createdby"><?= $Page->createdby->caption() ?></span></td>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <tr id="r_createddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchase_request_createddatetime"><?= $Page->createddatetime->caption() ?></span></td>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <tr id="r_modifiedby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchase_request_modifiedby"><?= $Page->modifiedby->caption() ?></span></td>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <tr id="r_modifieddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchase_request_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span></td>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
    <tr id="r_BRCODE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchase_request_BRCODE"><?= $Page->BRCODE->caption() ?></span></td>
        <td data-name="BRCODE" <?= $Page->BRCODE->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_BRCODE">
<span<?= $Page->BRCODE->viewAttributes() ?>>
<?= $Page->BRCODE->getViewValue() ?></span>
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
