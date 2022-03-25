<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewLabServiceSubView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_lab_service_subview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fview_lab_service_subview = currentForm = new ew.Form("fview_lab_service_subview", "view");
    loadjs.done("fview_lab_service_subview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.view_lab_service_sub) ew.vars.tables.view_lab_service_sub = <?= JsonEncode(GetClientVar("tables", "view_lab_service_sub")) ?>;
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
<form name="fview_lab_service_subview" id="fview_lab_service_subview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_lab_service_sub">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->Id->Visible) { // Id ?>
    <tr id="r_Id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_Id"><?= $Page->Id->caption() ?></span></td>
        <td data-name="Id" <?= $Page->Id->cellAttributes() ?>>
<span id="el_view_lab_service_sub_Id">
<span<?= $Page->Id->viewAttributes() ?>>
<?= $Page->Id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CODE->Visible) { // CODE ?>
    <tr id="r_CODE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_CODE"><?= $Page->CODE->caption() ?></span></td>
        <td data-name="CODE" <?= $Page->CODE->cellAttributes() ?>>
<span id="el_view_lab_service_sub_CODE">
<span<?= $Page->CODE->viewAttributes() ?>>
<?= $Page->CODE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SERVICE->Visible) { // SERVICE ?>
    <tr id="r_SERVICE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_SERVICE"><?= $Page->SERVICE->caption() ?></span></td>
        <td data-name="SERVICE" <?= $Page->SERVICE->cellAttributes() ?>>
<span id="el_view_lab_service_sub_SERVICE">
<span<?= $Page->SERVICE->viewAttributes() ?>>
<?= $Page->SERVICE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->UNITS->Visible) { // UNITS ?>
    <tr id="r_UNITS">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_UNITS"><?= $Page->UNITS->caption() ?></span></td>
        <td data-name="UNITS" <?= $Page->UNITS->cellAttributes() ?>>
<span id="el_view_lab_service_sub_UNITS">
<span<?= $Page->UNITS->viewAttributes() ?>>
<?= $Page->UNITS->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AMOUNT->Visible) { // AMOUNT ?>
    <tr id="r_AMOUNT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_AMOUNT"><?= $Page->AMOUNT->caption() ?></span></td>
        <td data-name="AMOUNT" <?= $Page->AMOUNT->cellAttributes() ?>>
<span id="el_view_lab_service_sub_AMOUNT">
<span<?= $Page->AMOUNT->viewAttributes() ?>>
<?= $Page->AMOUNT->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
    <tr id="r_SERVICE_TYPE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_SERVICE_TYPE"><?= $Page->SERVICE_TYPE->caption() ?></span></td>
        <td data-name="SERVICE_TYPE" <?= $Page->SERVICE_TYPE->cellAttributes() ?>>
<span id="el_view_lab_service_sub_SERVICE_TYPE">
<span<?= $Page->SERVICE_TYPE->viewAttributes() ?>>
<?= $Page->SERVICE_TYPE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DEPARTMENT->Visible) { // DEPARTMENT ?>
    <tr id="r_DEPARTMENT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_DEPARTMENT"><?= $Page->DEPARTMENT->caption() ?></span></td>
        <td data-name="DEPARTMENT" <?= $Page->DEPARTMENT->cellAttributes() ?>>
<span id="el_view_lab_service_sub_DEPARTMENT">
<span<?= $Page->DEPARTMENT->viewAttributes() ?>>
<?= $Page->DEPARTMENT->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Created->Visible) { // Created ?>
    <tr id="r_Created">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_Created"><?= $Page->Created->caption() ?></span></td>
        <td data-name="Created" <?= $Page->Created->cellAttributes() ?>>
<span id="el_view_lab_service_sub_Created">
<span<?= $Page->Created->viewAttributes() ?>>
<?= $Page->Created->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CreatedDateTime->Visible) { // CreatedDateTime ?>
    <tr id="r_CreatedDateTime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_CreatedDateTime"><?= $Page->CreatedDateTime->caption() ?></span></td>
        <td data-name="CreatedDateTime" <?= $Page->CreatedDateTime->cellAttributes() ?>>
<span id="el_view_lab_service_sub_CreatedDateTime">
<span<?= $Page->CreatedDateTime->viewAttributes() ?>>
<?= $Page->CreatedDateTime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Modified->Visible) { // Modified ?>
    <tr id="r_Modified">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_Modified"><?= $Page->Modified->caption() ?></span></td>
        <td data-name="Modified" <?= $Page->Modified->cellAttributes() ?>>
<span id="el_view_lab_service_sub_Modified">
<span<?= $Page->Modified->viewAttributes() ?>>
<?= $Page->Modified->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
    <tr id="r_ModifiedDateTime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_ModifiedDateTime"><?= $Page->ModifiedDateTime->caption() ?></span></td>
        <td data-name="ModifiedDateTime" <?= $Page->ModifiedDateTime->cellAttributes() ?>>
<span id="el_view_lab_service_sub_ModifiedDateTime">
<span<?= $Page->ModifiedDateTime->viewAttributes() ?>>
<?= $Page->ModifiedDateTime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->mas_services_billingcol->Visible) { // mas_services_billingcol ?>
    <tr id="r_mas_services_billingcol">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_mas_services_billingcol"><?= $Page->mas_services_billingcol->caption() ?></span></td>
        <td data-name="mas_services_billingcol" <?= $Page->mas_services_billingcol->cellAttributes() ?>>
<span id="el_view_lab_service_sub_mas_services_billingcol">
<span<?= $Page->mas_services_billingcol->viewAttributes() ?>>
<?= $Page->mas_services_billingcol->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DrShareAmount->Visible) { // DrShareAmount ?>
    <tr id="r_DrShareAmount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_DrShareAmount"><?= $Page->DrShareAmount->caption() ?></span></td>
        <td data-name="DrShareAmount" <?= $Page->DrShareAmount->cellAttributes() ?>>
<span id="el_view_lab_service_sub_DrShareAmount">
<span<?= $Page->DrShareAmount->viewAttributes() ?>>
<?= $Page->DrShareAmount->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HospShareAmount->Visible) { // HospShareAmount ?>
    <tr id="r_HospShareAmount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_HospShareAmount"><?= $Page->HospShareAmount->caption() ?></span></td>
        <td data-name="HospShareAmount" <?= $Page->HospShareAmount->cellAttributes() ?>>
<span id="el_view_lab_service_sub_HospShareAmount">
<span<?= $Page->HospShareAmount->viewAttributes() ?>>
<?= $Page->HospShareAmount->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DrSharePer->Visible) { // DrSharePer ?>
    <tr id="r_DrSharePer">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_DrSharePer"><?= $Page->DrSharePer->caption() ?></span></td>
        <td data-name="DrSharePer" <?= $Page->DrSharePer->cellAttributes() ?>>
<span id="el_view_lab_service_sub_DrSharePer">
<span<?= $Page->DrSharePer->viewAttributes() ?>>
<?= $Page->DrSharePer->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HospSharePer->Visible) { // HospSharePer ?>
    <tr id="r_HospSharePer">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_HospSharePer"><?= $Page->HospSharePer->caption() ?></span></td>
        <td data-name="HospSharePer" <?= $Page->HospSharePer->cellAttributes() ?>>
<span id="el_view_lab_service_sub_HospSharePer">
<span<?= $Page->HospSharePer->viewAttributes() ?>>
<?= $Page->HospSharePer->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <tr id="r_HospID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_HospID"><?= $Page->HospID->caption() ?></span></td>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el_view_lab_service_sub_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TestSubCd->Visible) { // TestSubCd ?>
    <tr id="r_TestSubCd">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_TestSubCd"><?= $Page->TestSubCd->caption() ?></span></td>
        <td data-name="TestSubCd" <?= $Page->TestSubCd->cellAttributes() ?>>
<span id="el_view_lab_service_sub_TestSubCd">
<span<?= $Page->TestSubCd->viewAttributes() ?>>
<?= $Page->TestSubCd->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Method->Visible) { // Method ?>
    <tr id="r_Method">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_Method"><?= $Page->Method->caption() ?></span></td>
        <td data-name="Method" <?= $Page->Method->cellAttributes() ?>>
<span id="el_view_lab_service_sub_Method">
<span<?= $Page->Method->viewAttributes() ?>>
<?= $Page->Method->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Order->Visible) { // Order ?>
    <tr id="r_Order">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_Order"><?= $Page->Order->caption() ?></span></td>
        <td data-name="Order" <?= $Page->Order->cellAttributes() ?>>
<span id="el_view_lab_service_sub_Order">
<span<?= $Page->Order->viewAttributes() ?>>
<?= $Page->Order->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Form->Visible) { // Form ?>
    <tr id="r_Form">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_Form"><?= $Page->Form->caption() ?></span></td>
        <td data-name="Form" <?= $Page->Form->cellAttributes() ?>>
<span id="el_view_lab_service_sub_Form">
<span<?= $Page->Form->viewAttributes() ?>>
<?= $Page->Form->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ResType->Visible) { // ResType ?>
    <tr id="r_ResType">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_ResType"><?= $Page->ResType->caption() ?></span></td>
        <td data-name="ResType" <?= $Page->ResType->cellAttributes() ?>>
<span id="el_view_lab_service_sub_ResType">
<span<?= $Page->ResType->viewAttributes() ?>>
<?= $Page->ResType->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->UnitCD->Visible) { // UnitCD ?>
    <tr id="r_UnitCD">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_UnitCD"><?= $Page->UnitCD->caption() ?></span></td>
        <td data-name="UnitCD" <?= $Page->UnitCD->cellAttributes() ?>>
<span id="el_view_lab_service_sub_UnitCD">
<span<?= $Page->UnitCD->viewAttributes() ?>>
<?= $Page->UnitCD->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RefValue->Visible) { // RefValue ?>
    <tr id="r_RefValue">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_RefValue"><?= $Page->RefValue->caption() ?></span></td>
        <td data-name="RefValue" <?= $Page->RefValue->cellAttributes() ?>>
<span id="el_view_lab_service_sub_RefValue">
<span<?= $Page->RefValue->viewAttributes() ?>>
<?= $Page->RefValue->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Sample->Visible) { // Sample ?>
    <tr id="r_Sample">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_Sample"><?= $Page->Sample->caption() ?></span></td>
        <td data-name="Sample" <?= $Page->Sample->cellAttributes() ?>>
<span id="el_view_lab_service_sub_Sample">
<span<?= $Page->Sample->viewAttributes() ?>>
<?= $Page->Sample->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NoD->Visible) { // NoD ?>
    <tr id="r_NoD">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_NoD"><?= $Page->NoD->caption() ?></span></td>
        <td data-name="NoD" <?= $Page->NoD->cellAttributes() ?>>
<span id="el_view_lab_service_sub_NoD">
<span<?= $Page->NoD->viewAttributes() ?>>
<?= $Page->NoD->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BillOrder->Visible) { // BillOrder ?>
    <tr id="r_BillOrder">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_BillOrder"><?= $Page->BillOrder->caption() ?></span></td>
        <td data-name="BillOrder" <?= $Page->BillOrder->cellAttributes() ?>>
<span id="el_view_lab_service_sub_BillOrder">
<span<?= $Page->BillOrder->viewAttributes() ?>>
<?= $Page->BillOrder->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Formula->Visible) { // Formula ?>
    <tr id="r_Formula">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_Formula"><?= $Page->Formula->caption() ?></span></td>
        <td data-name="Formula" <?= $Page->Formula->cellAttributes() ?>>
<span id="el_view_lab_service_sub_Formula">
<span<?= $Page->Formula->viewAttributes() ?>>
<?= $Page->Formula->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Inactive->Visible) { // Inactive ?>
    <tr id="r_Inactive">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_Inactive"><?= $Page->Inactive->caption() ?></span></td>
        <td data-name="Inactive" <?= $Page->Inactive->cellAttributes() ?>>
<span id="el_view_lab_service_sub_Inactive">
<span<?= $Page->Inactive->viewAttributes() ?>>
<?= $Page->Inactive->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Outsource->Visible) { // Outsource ?>
    <tr id="r_Outsource">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_Outsource"><?= $Page->Outsource->caption() ?></span></td>
        <td data-name="Outsource" <?= $Page->Outsource->cellAttributes() ?>>
<span id="el_view_lab_service_sub_Outsource">
<span<?= $Page->Outsource->viewAttributes() ?>>
<?= $Page->Outsource->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CollSample->Visible) { // CollSample ?>
    <tr id="r_CollSample">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_CollSample"><?= $Page->CollSample->caption() ?></span></td>
        <td data-name="CollSample" <?= $Page->CollSample->cellAttributes() ?>>
<span id="el_view_lab_service_sub_CollSample">
<span<?= $Page->CollSample->viewAttributes() ?>>
<?= $Page->CollSample->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TestType->Visible) { // TestType ?>
    <tr id="r_TestType">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_TestType"><?= $Page->TestType->caption() ?></span></td>
        <td data-name="TestType" <?= $Page->TestType->cellAttributes() ?>>
<span id="el_view_lab_service_sub_TestType">
<span<?= $Page->TestType->viewAttributes() ?>>
<?= $Page->TestType->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NoHeading->Visible) { // NoHeading ?>
    <tr id="r_NoHeading">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_NoHeading"><?= $Page->NoHeading->caption() ?></span></td>
        <td data-name="NoHeading" <?= $Page->NoHeading->cellAttributes() ?>>
<span id="el_view_lab_service_sub_NoHeading">
<span<?= $Page->NoHeading->viewAttributes() ?>>
<?= $Page->NoHeading->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ChemicalCode->Visible) { // ChemicalCode ?>
    <tr id="r_ChemicalCode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_ChemicalCode"><?= $Page->ChemicalCode->caption() ?></span></td>
        <td data-name="ChemicalCode" <?= $Page->ChemicalCode->cellAttributes() ?>>
<span id="el_view_lab_service_sub_ChemicalCode">
<span<?= $Page->ChemicalCode->viewAttributes() ?>>
<?= $Page->ChemicalCode->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ChemicalName->Visible) { // ChemicalName ?>
    <tr id="r_ChemicalName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_ChemicalName"><?= $Page->ChemicalName->caption() ?></span></td>
        <td data-name="ChemicalName" <?= $Page->ChemicalName->cellAttributes() ?>>
<span id="el_view_lab_service_sub_ChemicalName">
<span<?= $Page->ChemicalName->viewAttributes() ?>>
<?= $Page->ChemicalName->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Utilaization->Visible) { // Utilaization ?>
    <tr id="r_Utilaization">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_Utilaization"><?= $Page->Utilaization->caption() ?></span></td>
        <td data-name="Utilaization" <?= $Page->Utilaization->cellAttributes() ?>>
<span id="el_view_lab_service_sub_Utilaization">
<span<?= $Page->Utilaization->viewAttributes() ?>>
<?= $Page->Utilaization->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Interpretation->Visible) { // Interpretation ?>
    <tr id="r_Interpretation">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_service_sub_Interpretation"><?= $Page->Interpretation->caption() ?></span></td>
        <td data-name="Interpretation" <?= $Page->Interpretation->cellAttributes() ?>>
<span id="el_view_lab_service_sub_Interpretation">
<span<?= $Page->Interpretation->viewAttributes() ?>>
<?= $Page->Interpretation->getViewValue() ?></span>
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
