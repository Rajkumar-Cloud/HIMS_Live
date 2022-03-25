<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewLabProfileView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_lab_profileview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fview_lab_profileview = currentForm = new ew.Form("fview_lab_profileview", "view");
    loadjs.done("fview_lab_profileview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.view_lab_profile) ew.vars.tables.view_lab_profile = <?= JsonEncode(GetClientVar("tables", "view_lab_profile")) ?>;
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
<form name="fview_lab_profileview" id="fview_lab_profileview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_lab_profile">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($Page->Id->Visible) { // Id ?>
    <tr id="r_Id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_Id"><template id="tpc_view_lab_profile_Id"><?= $Page->Id->caption() ?></template></span></td>
        <td data-name="Id" <?= $Page->Id->cellAttributes() ?>>
<template id="tpx_view_lab_profile_Id"><span id="el_view_lab_profile_Id">
<span<?= $Page->Id->viewAttributes() ?>>
<?= $Page->Id->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CODE->Visible) { // CODE ?>
    <tr id="r_CODE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_CODE"><template id="tpc_view_lab_profile_CODE"><?= $Page->CODE->caption() ?></template></span></td>
        <td data-name="CODE" <?= $Page->CODE->cellAttributes() ?>>
<template id="tpx_view_lab_profile_CODE"><span id="el_view_lab_profile_CODE">
<span<?= $Page->CODE->viewAttributes() ?>>
<?= $Page->CODE->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SERVICE->Visible) { // SERVICE ?>
    <tr id="r_SERVICE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_SERVICE"><template id="tpc_view_lab_profile_SERVICE"><?= $Page->SERVICE->caption() ?></template></span></td>
        <td data-name="SERVICE" <?= $Page->SERVICE->cellAttributes() ?>>
<template id="tpx_view_lab_profile_SERVICE"><span id="el_view_lab_profile_SERVICE">
<span<?= $Page->SERVICE->viewAttributes() ?>>
<?= $Page->SERVICE->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->UNITS->Visible) { // UNITS ?>
    <tr id="r_UNITS">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_UNITS"><template id="tpc_view_lab_profile_UNITS"><?= $Page->UNITS->caption() ?></template></span></td>
        <td data-name="UNITS" <?= $Page->UNITS->cellAttributes() ?>>
<template id="tpx_view_lab_profile_UNITS"><span id="el_view_lab_profile_UNITS">
<span<?= $Page->UNITS->viewAttributes() ?>>
<?= $Page->UNITS->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AMOUNT->Visible) { // AMOUNT ?>
    <tr id="r_AMOUNT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_AMOUNT"><template id="tpc_view_lab_profile_AMOUNT"><?= $Page->AMOUNT->caption() ?></template></span></td>
        <td data-name="AMOUNT" <?= $Page->AMOUNT->cellAttributes() ?>>
<template id="tpx_view_lab_profile_AMOUNT"><span id="el_view_lab_profile_AMOUNT">
<span<?= $Page->AMOUNT->viewAttributes() ?>>
<?= $Page->AMOUNT->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
    <tr id="r_SERVICE_TYPE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_SERVICE_TYPE"><template id="tpc_view_lab_profile_SERVICE_TYPE"><?= $Page->SERVICE_TYPE->caption() ?></template></span></td>
        <td data-name="SERVICE_TYPE" <?= $Page->SERVICE_TYPE->cellAttributes() ?>>
<template id="tpx_view_lab_profile_SERVICE_TYPE"><span id="el_view_lab_profile_SERVICE_TYPE">
<span<?= $Page->SERVICE_TYPE->viewAttributes() ?>>
<?= $Page->SERVICE_TYPE->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DEPARTMENT->Visible) { // DEPARTMENT ?>
    <tr id="r_DEPARTMENT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_DEPARTMENT"><template id="tpc_view_lab_profile_DEPARTMENT"><?= $Page->DEPARTMENT->caption() ?></template></span></td>
        <td data-name="DEPARTMENT" <?= $Page->DEPARTMENT->cellAttributes() ?>>
<template id="tpx_view_lab_profile_DEPARTMENT"><span id="el_view_lab_profile_DEPARTMENT">
<span<?= $Page->DEPARTMENT->viewAttributes() ?>>
<?= $Page->DEPARTMENT->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Created->Visible) { // Created ?>
    <tr id="r_Created">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_Created"><template id="tpc_view_lab_profile_Created"><?= $Page->Created->caption() ?></template></span></td>
        <td data-name="Created" <?= $Page->Created->cellAttributes() ?>>
<template id="tpx_view_lab_profile_Created"><span id="el_view_lab_profile_Created">
<span<?= $Page->Created->viewAttributes() ?>>
<?= $Page->Created->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CreatedDateTime->Visible) { // CreatedDateTime ?>
    <tr id="r_CreatedDateTime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_CreatedDateTime"><template id="tpc_view_lab_profile_CreatedDateTime"><?= $Page->CreatedDateTime->caption() ?></template></span></td>
        <td data-name="CreatedDateTime" <?= $Page->CreatedDateTime->cellAttributes() ?>>
<template id="tpx_view_lab_profile_CreatedDateTime"><span id="el_view_lab_profile_CreatedDateTime">
<span<?= $Page->CreatedDateTime->viewAttributes() ?>>
<?= $Page->CreatedDateTime->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Modified->Visible) { // Modified ?>
    <tr id="r_Modified">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_Modified"><template id="tpc_view_lab_profile_Modified"><?= $Page->Modified->caption() ?></template></span></td>
        <td data-name="Modified" <?= $Page->Modified->cellAttributes() ?>>
<template id="tpx_view_lab_profile_Modified"><span id="el_view_lab_profile_Modified">
<span<?= $Page->Modified->viewAttributes() ?>>
<?= $Page->Modified->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
    <tr id="r_ModifiedDateTime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_ModifiedDateTime"><template id="tpc_view_lab_profile_ModifiedDateTime"><?= $Page->ModifiedDateTime->caption() ?></template></span></td>
        <td data-name="ModifiedDateTime" <?= $Page->ModifiedDateTime->cellAttributes() ?>>
<template id="tpx_view_lab_profile_ModifiedDateTime"><span id="el_view_lab_profile_ModifiedDateTime">
<span<?= $Page->ModifiedDateTime->viewAttributes() ?>>
<?= $Page->ModifiedDateTime->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->mas_services_billingcol->Visible) { // mas_services_billingcol ?>
    <tr id="r_mas_services_billingcol">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_mas_services_billingcol"><template id="tpc_view_lab_profile_mas_services_billingcol"><?= $Page->mas_services_billingcol->caption() ?></template></span></td>
        <td data-name="mas_services_billingcol" <?= $Page->mas_services_billingcol->cellAttributes() ?>>
<template id="tpx_view_lab_profile_mas_services_billingcol"><span id="el_view_lab_profile_mas_services_billingcol">
<span<?= $Page->mas_services_billingcol->viewAttributes() ?>>
<?= $Page->mas_services_billingcol->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DrShareAmount->Visible) { // DrShareAmount ?>
    <tr id="r_DrShareAmount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_DrShareAmount"><template id="tpc_view_lab_profile_DrShareAmount"><?= $Page->DrShareAmount->caption() ?></template></span></td>
        <td data-name="DrShareAmount" <?= $Page->DrShareAmount->cellAttributes() ?>>
<template id="tpx_view_lab_profile_DrShareAmount"><span id="el_view_lab_profile_DrShareAmount">
<span<?= $Page->DrShareAmount->viewAttributes() ?>>
<?= $Page->DrShareAmount->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HospShareAmount->Visible) { // HospShareAmount ?>
    <tr id="r_HospShareAmount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_HospShareAmount"><template id="tpc_view_lab_profile_HospShareAmount"><?= $Page->HospShareAmount->caption() ?></template></span></td>
        <td data-name="HospShareAmount" <?= $Page->HospShareAmount->cellAttributes() ?>>
<template id="tpx_view_lab_profile_HospShareAmount"><span id="el_view_lab_profile_HospShareAmount">
<span<?= $Page->HospShareAmount->viewAttributes() ?>>
<?= $Page->HospShareAmount->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DrSharePer->Visible) { // DrSharePer ?>
    <tr id="r_DrSharePer">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_DrSharePer"><template id="tpc_view_lab_profile_DrSharePer"><?= $Page->DrSharePer->caption() ?></template></span></td>
        <td data-name="DrSharePer" <?= $Page->DrSharePer->cellAttributes() ?>>
<template id="tpx_view_lab_profile_DrSharePer"><span id="el_view_lab_profile_DrSharePer">
<span<?= $Page->DrSharePer->viewAttributes() ?>>
<?= $Page->DrSharePer->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HospSharePer->Visible) { // HospSharePer ?>
    <tr id="r_HospSharePer">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_HospSharePer"><template id="tpc_view_lab_profile_HospSharePer"><?= $Page->HospSharePer->caption() ?></template></span></td>
        <td data-name="HospSharePer" <?= $Page->HospSharePer->cellAttributes() ?>>
<template id="tpx_view_lab_profile_HospSharePer"><span id="el_view_lab_profile_HospSharePer">
<span<?= $Page->HospSharePer->viewAttributes() ?>>
<?= $Page->HospSharePer->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <tr id="r_HospID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_HospID"><template id="tpc_view_lab_profile_HospID"><?= $Page->HospID->caption() ?></template></span></td>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<template id="tpx_view_lab_profile_HospID"><span id="el_view_lab_profile_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TestSubCd->Visible) { // TestSubCd ?>
    <tr id="r_TestSubCd">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_TestSubCd"><template id="tpc_view_lab_profile_TestSubCd"><?= $Page->TestSubCd->caption() ?></template></span></td>
        <td data-name="TestSubCd" <?= $Page->TestSubCd->cellAttributes() ?>>
<template id="tpx_view_lab_profile_TestSubCd"><span id="el_view_lab_profile_TestSubCd">
<span<?= $Page->TestSubCd->viewAttributes() ?>>
<?= $Page->TestSubCd->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Method->Visible) { // Method ?>
    <tr id="r_Method">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_Method"><template id="tpc_view_lab_profile_Method"><?= $Page->Method->caption() ?></template></span></td>
        <td data-name="Method" <?= $Page->Method->cellAttributes() ?>>
<template id="tpx_view_lab_profile_Method"><span id="el_view_lab_profile_Method">
<span<?= $Page->Method->viewAttributes() ?>>
<?= $Page->Method->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Order->Visible) { // Order ?>
    <tr id="r_Order">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_Order"><template id="tpc_view_lab_profile_Order"><?= $Page->Order->caption() ?></template></span></td>
        <td data-name="Order" <?= $Page->Order->cellAttributes() ?>>
<template id="tpx_view_lab_profile_Order"><span id="el_view_lab_profile_Order">
<span<?= $Page->Order->viewAttributes() ?>>
<?= $Page->Order->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Form->Visible) { // Form ?>
    <tr id="r_Form">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_Form"><template id="tpc_view_lab_profile_Form"><?= $Page->Form->caption() ?></template></span></td>
        <td data-name="Form" <?= $Page->Form->cellAttributes() ?>>
<template id="tpx_view_lab_profile_Form"><span id="el_view_lab_profile_Form">
<span<?= $Page->Form->viewAttributes() ?>>
<?= $Page->Form->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ResType->Visible) { // ResType ?>
    <tr id="r_ResType">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_ResType"><template id="tpc_view_lab_profile_ResType"><?= $Page->ResType->caption() ?></template></span></td>
        <td data-name="ResType" <?= $Page->ResType->cellAttributes() ?>>
<template id="tpx_view_lab_profile_ResType"><span id="el_view_lab_profile_ResType">
<span<?= $Page->ResType->viewAttributes() ?>>
<?= $Page->ResType->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->UnitCD->Visible) { // UnitCD ?>
    <tr id="r_UnitCD">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_UnitCD"><template id="tpc_view_lab_profile_UnitCD"><?= $Page->UnitCD->caption() ?></template></span></td>
        <td data-name="UnitCD" <?= $Page->UnitCD->cellAttributes() ?>>
<template id="tpx_view_lab_profile_UnitCD"><span id="el_view_lab_profile_UnitCD">
<span<?= $Page->UnitCD->viewAttributes() ?>>
<?= $Page->UnitCD->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RefValue->Visible) { // RefValue ?>
    <tr id="r_RefValue">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_RefValue"><template id="tpc_view_lab_profile_RefValue"><?= $Page->RefValue->caption() ?></template></span></td>
        <td data-name="RefValue" <?= $Page->RefValue->cellAttributes() ?>>
<template id="tpx_view_lab_profile_RefValue"><span id="el_view_lab_profile_RefValue">
<span<?= $Page->RefValue->viewAttributes() ?>>
<?= $Page->RefValue->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Sample->Visible) { // Sample ?>
    <tr id="r_Sample">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_Sample"><template id="tpc_view_lab_profile_Sample"><?= $Page->Sample->caption() ?></template></span></td>
        <td data-name="Sample" <?= $Page->Sample->cellAttributes() ?>>
<template id="tpx_view_lab_profile_Sample"><span id="el_view_lab_profile_Sample">
<span<?= $Page->Sample->viewAttributes() ?>>
<?= $Page->Sample->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NoD->Visible) { // NoD ?>
    <tr id="r_NoD">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_NoD"><template id="tpc_view_lab_profile_NoD"><?= $Page->NoD->caption() ?></template></span></td>
        <td data-name="NoD" <?= $Page->NoD->cellAttributes() ?>>
<template id="tpx_view_lab_profile_NoD"><span id="el_view_lab_profile_NoD">
<span<?= $Page->NoD->viewAttributes() ?>>
<?= $Page->NoD->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BillOrder->Visible) { // BillOrder ?>
    <tr id="r_BillOrder">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_BillOrder"><template id="tpc_view_lab_profile_BillOrder"><?= $Page->BillOrder->caption() ?></template></span></td>
        <td data-name="BillOrder" <?= $Page->BillOrder->cellAttributes() ?>>
<template id="tpx_view_lab_profile_BillOrder"><span id="el_view_lab_profile_BillOrder">
<span<?= $Page->BillOrder->viewAttributes() ?>>
<?= $Page->BillOrder->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Formula->Visible) { // Formula ?>
    <tr id="r_Formula">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_Formula"><template id="tpc_view_lab_profile_Formula"><?= $Page->Formula->caption() ?></template></span></td>
        <td data-name="Formula" <?= $Page->Formula->cellAttributes() ?>>
<template id="tpx_view_lab_profile_Formula"><span id="el_view_lab_profile_Formula">
<span<?= $Page->Formula->viewAttributes() ?>>
<?= $Page->Formula->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Inactive->Visible) { // Inactive ?>
    <tr id="r_Inactive">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_Inactive"><template id="tpc_view_lab_profile_Inactive"><?= $Page->Inactive->caption() ?></template></span></td>
        <td data-name="Inactive" <?= $Page->Inactive->cellAttributes() ?>>
<template id="tpx_view_lab_profile_Inactive"><span id="el_view_lab_profile_Inactive">
<span<?= $Page->Inactive->viewAttributes() ?>>
<?= $Page->Inactive->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Outsource->Visible) { // Outsource ?>
    <tr id="r_Outsource">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_Outsource"><template id="tpc_view_lab_profile_Outsource"><?= $Page->Outsource->caption() ?></template></span></td>
        <td data-name="Outsource" <?= $Page->Outsource->cellAttributes() ?>>
<template id="tpx_view_lab_profile_Outsource"><span id="el_view_lab_profile_Outsource">
<span<?= $Page->Outsource->viewAttributes() ?>>
<?= $Page->Outsource->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CollSample->Visible) { // CollSample ?>
    <tr id="r_CollSample">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_CollSample"><template id="tpc_view_lab_profile_CollSample"><?= $Page->CollSample->caption() ?></template></span></td>
        <td data-name="CollSample" <?= $Page->CollSample->cellAttributes() ?>>
<template id="tpx_view_lab_profile_CollSample"><span id="el_view_lab_profile_CollSample">
<span<?= $Page->CollSample->viewAttributes() ?>>
<?= $Page->CollSample->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TestType->Visible) { // TestType ?>
    <tr id="r_TestType">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_TestType"><template id="tpc_view_lab_profile_TestType"><?= $Page->TestType->caption() ?></template></span></td>
        <td data-name="TestType" <?= $Page->TestType->cellAttributes() ?>>
<template id="tpx_view_lab_profile_TestType"><span id="el_view_lab_profile_TestType">
<span<?= $Page->TestType->viewAttributes() ?>>
<?= $Page->TestType->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NoHeading->Visible) { // NoHeading ?>
    <tr id="r_NoHeading">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_NoHeading"><template id="tpc_view_lab_profile_NoHeading"><?= $Page->NoHeading->caption() ?></template></span></td>
        <td data-name="NoHeading" <?= $Page->NoHeading->cellAttributes() ?>>
<template id="tpx_view_lab_profile_NoHeading"><span id="el_view_lab_profile_NoHeading">
<span<?= $Page->NoHeading->viewAttributes() ?>>
<?= $Page->NoHeading->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ChemicalCode->Visible) { // ChemicalCode ?>
    <tr id="r_ChemicalCode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_ChemicalCode"><template id="tpc_view_lab_profile_ChemicalCode"><?= $Page->ChemicalCode->caption() ?></template></span></td>
        <td data-name="ChemicalCode" <?= $Page->ChemicalCode->cellAttributes() ?>>
<template id="tpx_view_lab_profile_ChemicalCode"><span id="el_view_lab_profile_ChemicalCode">
<span<?= $Page->ChemicalCode->viewAttributes() ?>>
<?= $Page->ChemicalCode->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ChemicalName->Visible) { // ChemicalName ?>
    <tr id="r_ChemicalName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_ChemicalName"><template id="tpc_view_lab_profile_ChemicalName"><?= $Page->ChemicalName->caption() ?></template></span></td>
        <td data-name="ChemicalName" <?= $Page->ChemicalName->cellAttributes() ?>>
<template id="tpx_view_lab_profile_ChemicalName"><span id="el_view_lab_profile_ChemicalName">
<span<?= $Page->ChemicalName->viewAttributes() ?>>
<?= $Page->ChemicalName->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Utilaization->Visible) { // Utilaization ?>
    <tr id="r_Utilaization">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_Utilaization"><template id="tpc_view_lab_profile_Utilaization"><?= $Page->Utilaization->caption() ?></template></span></td>
        <td data-name="Utilaization" <?= $Page->Utilaization->cellAttributes() ?>>
<template id="tpx_view_lab_profile_Utilaization"><span id="el_view_lab_profile_Utilaization">
<span<?= $Page->Utilaization->viewAttributes() ?>>
<?= $Page->Utilaization->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Interpretation->Visible) { // Interpretation ?>
    <tr id="r_Interpretation">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_lab_profile_Interpretation"><template id="tpc_view_lab_profile_Interpretation"><?= $Page->Interpretation->caption() ?></template></span></td>
        <td data-name="Interpretation" <?= $Page->Interpretation->cellAttributes() ?>>
<template id="tpx_view_lab_profile_Interpretation"><span id="el_view_lab_profile_Interpretation">
<span<?= $Page->Interpretation->viewAttributes() ?>>
<?= $Page->Interpretation->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
</table>
<div id="tpd_view_lab_profileview" class="ew-custom-template"></div>
<template id="tpm_view_lab_profileview">
<div id="ct_ViewLabProfileView"><style>
	.ew-form:not(.ew-list-form):not(.ew-pager-form), table.ew-master-table.ew-vertical {
		width: 100%;
	}
	.content-wrapper {
		background: #f4f6f9;
	}
	.form-control-plaintext {
		display: unset;
		width: unset;
	}
	.widget-user .widget-user-image {
		position: absolute;
		top: 65px;
		left: 90%;
		margin-left: -45px;
	}
	.widget-user .card-footer {
		padding-top: 0px;
	}
	.card-footer {
		padding: .05rem 0.025rem;
		background-color: rgba(17,17,17,0.03);
		border-top: 0 solid #f4f4f4;
	}
	.widget-user .widget-user-username {
	margin-top: 0;
	margin-bottom: 0px;
	font-size: 18px;
	font-weight: 300;
	text-shadow: 0 1px 1px rgba(0,0,0,0.2);
}
.widget-user .widget-user-image {
	position: absolute;
	top: 5px;
	left: 90%;
	margin-left: -45px;
}
.widget-user .widget-user-header {
	padding: 1rem;
	height: 100px;
	border-top-left-radius: .25rem;
	border-top-right-radius: .25rem;
}
.form-control:not(textarea) {
	width: -webkit-fill-available;
}
.ew-row .ew-cell {
	margin-right: unset;
}
</style>
<div class="row">
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Service Details</h3>
			</div>
			<div class="card-body">			
				 <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_lab_profile_CODE"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_CODE"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_lab_profile_SERVICE"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_SERVICE"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_lab_profile_UNITS"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_UNITS"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_lab_profile_AMOUNT"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_AMOUNT"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_lab_profile_SERVICE_TYPE"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_SERVICE_TYPE"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_lab_profile_DEPARTMENT"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_DEPARTMENT"></slot></span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Payment Details</h3>
			</div>
			<div class="card-body">
				<div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_lab_profile_mas_services_billingcol"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_mas_services_billingcol"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_lab_profile_DrShareAmount"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_DrShareAmount"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_lab_profile_HospShareAmount"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_HospShareAmount"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_lab_profile_DrSharePer"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_DrSharePer"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_lab_profile_HospSharePer"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_HospSharePer"></slot></span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>				
	</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Lab Details</h3>
			</div>
			<div class="card-body">
			<div class="row">
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title"></h3>
			</div>
			<div class="card-body">			
				 <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_lab_profile_TestSubCd"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_TestSubCd"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_lab_profile_Method"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_Method"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_lab_profile_Order"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_Order"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_lab_profile_Form"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_Form"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_lab_profile_ResType"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_ResType"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_lab_profile_UnitCD"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_UnitCD"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_lab_profile_Inactive"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_Inactive"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_lab_profile_Outsource"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_Outsource"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_lab_profile_CollSample"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_CollSample"></slot></span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title"></h3>
			</div>
			<div class="card-body">
				<div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_lab_profile_RefValue"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_RefValue"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_lab_profile_Sample"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_Sample"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_lab_profile_NoD"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_NoD"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_lab_profile_BillOrder"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_BillOrder"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_lab_profile_Formula"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_Formula"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_lab_profile_TestType"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_TestType"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_lab_profile_NoHeading"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_NoHeading"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_lab_profile_ChemicalCode"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_ChemicalCode"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_lab_profile_ChemicalName"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_ChemicalName"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_lab_profile_Utilaization"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_Utilaization"></slot></span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>				
	</div>
		</div>
		</div>
	</div>				
</div>
</div>
<div class="row">
<slot class="ew-slot" name="tpc_view_lab_profile_Interpretation"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_lab_profile_Interpretation"></slot>
</div>
</div>
</template>
<?php
    if (in_array("lab_profile_details", explode(",", $Page->getCurrentDetailTable())) && $lab_profile_details->DetailView) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("lab_profile_details", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "LabProfileDetailsGrid.php" ?>
<?php } ?>
</form>
<script class="ew-apply-template">
loadjs.ready(["jsrender", "makerjs"], function() {
    ew.templateData = { rows: <?= JsonEncode($Page->Rows) ?> };
    ew.applyTemplate("tpd_view_lab_profileview", "tpm_view_lab_profileview", "view_lab_profileview", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
    loadjs.done("customtemplate");
});
</script>
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
