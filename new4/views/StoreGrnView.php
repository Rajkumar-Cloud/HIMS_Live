<?php

namespace PHPMaker2021\HIMS;

// Page object
$StoreGrnView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fstore_grnview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fstore_grnview = currentForm = new ew.Form("fstore_grnview", "view");
    loadjs.done("fstore_grnview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Client script
    // Write your client script here, no need to add script tags.

    // Write your table-specific startup script here
    // document.write("page loaded");

    // Write your table-specific startup script here
    // document.write("page loaded");
    </script>
    <style>
    .input-group>.form-control.ew-lookup-text {
    	width: 35em;
    }
    .input-group {
    	position: relative;
    	display: flex;
    	flex-wrap: nowrap;
    	align-items: stretch;
    	width: 100%;
    }
    .ew-grid .ew-table, .ew-grid .ew-grid-middle-panel {
    	border: 0;
    	padding: 0;
    	margin-bottom: 0;
    	overflow-x: scroll;
    }
    </style>
    <script>
    $("[data-name='Quantity']").hide();
    $("[data-name='BillDate']").hide();
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.store_grn) ew.vars.tables.store_grn = <?= JsonEncode(GetClientVar("tables", "store_grn")) ?>;
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
<form name="fstore_grnview" id="fstore_grnview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="store_grn">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_grn_id"><template id="tpc_store_grn_id"><?= $Page->id->caption() ?></template></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<template id="tpx_store_grn_id"><span id="el_store_grn_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GRNNO->Visible) { // GRNNO ?>
    <tr id="r_GRNNO">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_grn_GRNNO"><template id="tpc_store_grn_GRNNO"><?= $Page->GRNNO->caption() ?></template></span></td>
        <td data-name="GRNNO" <?= $Page->GRNNO->cellAttributes() ?>>
<template id="tpx_store_grn_GRNNO"><span id="el_store_grn_GRNNO">
<span<?= $Page->GRNNO->viewAttributes() ?>>
<?= $Page->GRNNO->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DT->Visible) { // DT ?>
    <tr id="r_DT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_grn_DT"><template id="tpc_store_grn_DT"><?= $Page->DT->caption() ?></template></span></td>
        <td data-name="DT" <?= $Page->DT->cellAttributes() ?>>
<template id="tpx_store_grn_DT"><span id="el_store_grn_DT">
<span<?= $Page->DT->viewAttributes() ?>>
<?= $Page->DT->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->YM->Visible) { // YM ?>
    <tr id="r_YM">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_grn_YM"><template id="tpc_store_grn_YM"><?= $Page->YM->caption() ?></template></span></td>
        <td data-name="YM" <?= $Page->YM->cellAttributes() ?>>
<template id="tpx_store_grn_YM"><span id="el_store_grn_YM">
<span<?= $Page->YM->viewAttributes() ?>>
<?= $Page->YM->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PC->Visible) { // PC ?>
    <tr id="r_PC">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_grn_PC"><template id="tpc_store_grn_PC"><?= $Page->PC->caption() ?></template></span></td>
        <td data-name="PC" <?= $Page->PC->cellAttributes() ?>>
<template id="tpx_store_grn_PC"><span id="el_store_grn_PC">
<span<?= $Page->PC->viewAttributes() ?>>
<?= $Page->PC->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Customercode->Visible) { // Customercode ?>
    <tr id="r_Customercode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_grn_Customercode"><template id="tpc_store_grn_Customercode"><?= $Page->Customercode->caption() ?></template></span></td>
        <td data-name="Customercode" <?= $Page->Customercode->cellAttributes() ?>>
<template id="tpx_store_grn_Customercode"><span id="el_store_grn_Customercode">
<span<?= $Page->Customercode->viewAttributes() ?>>
<?= $Page->Customercode->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Customername->Visible) { // Customername ?>
    <tr id="r_Customername">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_grn_Customername"><template id="tpc_store_grn_Customername"><?= $Page->Customername->caption() ?></template></span></td>
        <td data-name="Customername" <?= $Page->Customername->cellAttributes() ?>>
<template id="tpx_store_grn_Customername"><span id="el_store_grn_Customername">
<span<?= $Page->Customername->viewAttributes() ?>>
<?= $Page->Customername->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->pharmacy_pocol->Visible) { // pharmacy_pocol ?>
    <tr id="r_pharmacy_pocol">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_grn_pharmacy_pocol"><template id="tpc_store_grn_pharmacy_pocol"><?= $Page->pharmacy_pocol->caption() ?></template></span></td>
        <td data-name="pharmacy_pocol" <?= $Page->pharmacy_pocol->cellAttributes() ?>>
<template id="tpx_store_grn_pharmacy_pocol"><span id="el_store_grn_pharmacy_pocol">
<span<?= $Page->pharmacy_pocol->viewAttributes() ?>>
<?= $Page->pharmacy_pocol->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Address1->Visible) { // Address1 ?>
    <tr id="r_Address1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_grn_Address1"><template id="tpc_store_grn_Address1"><?= $Page->Address1->caption() ?></template></span></td>
        <td data-name="Address1" <?= $Page->Address1->cellAttributes() ?>>
<template id="tpx_store_grn_Address1"><span id="el_store_grn_Address1">
<span<?= $Page->Address1->viewAttributes() ?>>
<?= $Page->Address1->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Address2->Visible) { // Address2 ?>
    <tr id="r_Address2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_grn_Address2"><template id="tpc_store_grn_Address2"><?= $Page->Address2->caption() ?></template></span></td>
        <td data-name="Address2" <?= $Page->Address2->cellAttributes() ?>>
<template id="tpx_store_grn_Address2"><span id="el_store_grn_Address2">
<span<?= $Page->Address2->viewAttributes() ?>>
<?= $Page->Address2->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Address3->Visible) { // Address3 ?>
    <tr id="r_Address3">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_grn_Address3"><template id="tpc_store_grn_Address3"><?= $Page->Address3->caption() ?></template></span></td>
        <td data-name="Address3" <?= $Page->Address3->cellAttributes() ?>>
<template id="tpx_store_grn_Address3"><span id="el_store_grn_Address3">
<span<?= $Page->Address3->viewAttributes() ?>>
<?= $Page->Address3->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->State->Visible) { // State ?>
    <tr id="r_State">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_grn_State"><template id="tpc_store_grn_State"><?= $Page->State->caption() ?></template></span></td>
        <td data-name="State" <?= $Page->State->cellAttributes() ?>>
<template id="tpx_store_grn_State"><span id="el_store_grn_State">
<span<?= $Page->State->viewAttributes() ?>>
<?= $Page->State->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Pincode->Visible) { // Pincode ?>
    <tr id="r_Pincode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_grn_Pincode"><template id="tpc_store_grn_Pincode"><?= $Page->Pincode->caption() ?></template></span></td>
        <td data-name="Pincode" <?= $Page->Pincode->cellAttributes() ?>>
<template id="tpx_store_grn_Pincode"><span id="el_store_grn_Pincode">
<span<?= $Page->Pincode->viewAttributes() ?>>
<?= $Page->Pincode->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Phone->Visible) { // Phone ?>
    <tr id="r_Phone">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_grn_Phone"><template id="tpc_store_grn_Phone"><?= $Page->Phone->caption() ?></template></span></td>
        <td data-name="Phone" <?= $Page->Phone->cellAttributes() ?>>
<template id="tpx_store_grn_Phone"><span id="el_store_grn_Phone">
<span<?= $Page->Phone->viewAttributes() ?>>
<?= $Page->Phone->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Fax->Visible) { // Fax ?>
    <tr id="r_Fax">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_grn_Fax"><template id="tpc_store_grn_Fax"><?= $Page->Fax->caption() ?></template></span></td>
        <td data-name="Fax" <?= $Page->Fax->cellAttributes() ?>>
<template id="tpx_store_grn_Fax"><span id="el_store_grn_Fax">
<span<?= $Page->Fax->viewAttributes() ?>>
<?= $Page->Fax->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EEmail->Visible) { // EEmail ?>
    <tr id="r_EEmail">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_grn_EEmail"><template id="tpc_store_grn_EEmail"><?= $Page->EEmail->caption() ?></template></span></td>
        <td data-name="EEmail" <?= $Page->EEmail->cellAttributes() ?>>
<template id="tpx_store_grn_EEmail"><span id="el_store_grn_EEmail">
<span<?= $Page->EEmail->viewAttributes() ?>>
<?= $Page->EEmail->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <tr id="r_HospID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_grn_HospID"><template id="tpc_store_grn_HospID"><?= $Page->HospID->caption() ?></template></span></td>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<template id="tpx_store_grn_HospID"><span id="el_store_grn_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <tr id="r_createdby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_grn_createdby"><template id="tpc_store_grn_createdby"><?= $Page->createdby->caption() ?></template></span></td>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<template id="tpx_store_grn_createdby"><span id="el_store_grn_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <tr id="r_createddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_grn_createddatetime"><template id="tpc_store_grn_createddatetime"><?= $Page->createddatetime->caption() ?></template></span></td>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<template id="tpx_store_grn_createddatetime"><span id="el_store_grn_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <tr id="r_modifiedby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_grn_modifiedby"><template id="tpc_store_grn_modifiedby"><?= $Page->modifiedby->caption() ?></template></span></td>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<template id="tpx_store_grn_modifiedby"><span id="el_store_grn_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <tr id="r_modifieddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_grn_modifieddatetime"><template id="tpc_store_grn_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></template></span></td>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<template id="tpx_store_grn_modifieddatetime"><span id="el_store_grn_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BILLNO->Visible) { // BILLNO ?>
    <tr id="r_BILLNO">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_grn_BILLNO"><template id="tpc_store_grn_BILLNO"><?= $Page->BILLNO->caption() ?></template></span></td>
        <td data-name="BILLNO" <?= $Page->BILLNO->cellAttributes() ?>>
<template id="tpx_store_grn_BILLNO"><span id="el_store_grn_BILLNO">
<span<?= $Page->BILLNO->viewAttributes() ?>>
<?= $Page->BILLNO->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BILLDT->Visible) { // BILLDT ?>
    <tr id="r_BILLDT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_grn_BILLDT"><template id="tpc_store_grn_BILLDT"><?= $Page->BILLDT->caption() ?></template></span></td>
        <td data-name="BILLDT" <?= $Page->BILLDT->cellAttributes() ?>>
<template id="tpx_store_grn_BILLDT"><span id="el_store_grn_BILLDT">
<span<?= $Page->BILLDT->viewAttributes() ?>>
<?= $Page->BILLDT->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
    <tr id="r_BRCODE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_grn_BRCODE"><template id="tpc_store_grn_BRCODE"><?= $Page->BRCODE->caption() ?></template></span></td>
        <td data-name="BRCODE" <?= $Page->BRCODE->cellAttributes() ?>>
<template id="tpx_store_grn_BRCODE"><span id="el_store_grn_BRCODE">
<span<?= $Page->BRCODE->viewAttributes() ?>>
<?= $Page->BRCODE->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PharmacyID->Visible) { // PharmacyID ?>
    <tr id="r_PharmacyID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_grn_PharmacyID"><template id="tpc_store_grn_PharmacyID"><?= $Page->PharmacyID->caption() ?></template></span></td>
        <td data-name="PharmacyID" <?= $Page->PharmacyID->cellAttributes() ?>>
<template id="tpx_store_grn_PharmacyID"><span id="el_store_grn_PharmacyID">
<span<?= $Page->PharmacyID->viewAttributes() ?>>
<?= $Page->PharmacyID->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BillTotalValue->Visible) { // BillTotalValue ?>
    <tr id="r_BillTotalValue">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_grn_BillTotalValue"><template id="tpc_store_grn_BillTotalValue"><?= $Page->BillTotalValue->caption() ?></template></span></td>
        <td data-name="BillTotalValue" <?= $Page->BillTotalValue->cellAttributes() ?>>
<template id="tpx_store_grn_BillTotalValue"><span id="el_store_grn_BillTotalValue">
<span<?= $Page->BillTotalValue->viewAttributes() ?>>
<?= $Page->BillTotalValue->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GRNTotalValue->Visible) { // GRNTotalValue ?>
    <tr id="r_GRNTotalValue">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_grn_GRNTotalValue"><template id="tpc_store_grn_GRNTotalValue"><?= $Page->GRNTotalValue->caption() ?></template></span></td>
        <td data-name="GRNTotalValue" <?= $Page->GRNTotalValue->cellAttributes() ?>>
<template id="tpx_store_grn_GRNTotalValue"><span id="el_store_grn_GRNTotalValue">
<span<?= $Page->GRNTotalValue->viewAttributes() ?>>
<?= $Page->GRNTotalValue->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BillDiscount->Visible) { // BillDiscount ?>
    <tr id="r_BillDiscount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_grn_BillDiscount"><template id="tpc_store_grn_BillDiscount"><?= $Page->BillDiscount->caption() ?></template></span></td>
        <td data-name="BillDiscount" <?= $Page->BillDiscount->cellAttributes() ?>>
<template id="tpx_store_grn_BillDiscount"><span id="el_store_grn_BillDiscount">
<span<?= $Page->BillDiscount->viewAttributes() ?>>
<?= $Page->BillDiscount->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BillUpload->Visible) { // BillUpload ?>
    <tr id="r_BillUpload">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_grn_BillUpload"><template id="tpc_store_grn_BillUpload"><?= $Page->BillUpload->caption() ?></template></span></td>
        <td data-name="BillUpload" <?= $Page->BillUpload->cellAttributes() ?>>
<template id="tpx_store_grn_BillUpload"><span id="el_store_grn_BillUpload">
<span>
<?= GetFileViewTag($Page->BillUpload, $Page->BillUpload->getViewValue(), false) ?>
</span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TransPort->Visible) { // TransPort ?>
    <tr id="r_TransPort">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_grn_TransPort"><template id="tpc_store_grn_TransPort"><?= $Page->TransPort->caption() ?></template></span></td>
        <td data-name="TransPort" <?= $Page->TransPort->cellAttributes() ?>>
<template id="tpx_store_grn_TransPort"><span id="el_store_grn_TransPort">
<span<?= $Page->TransPort->viewAttributes() ?>>
<?= $Page->TransPort->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AnyOther->Visible) { // AnyOther ?>
    <tr id="r_AnyOther">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_grn_AnyOther"><template id="tpc_store_grn_AnyOther"><?= $Page->AnyOther->caption() ?></template></span></td>
        <td data-name="AnyOther" <?= $Page->AnyOther->cellAttributes() ?>>
<template id="tpx_store_grn_AnyOther"><span id="el_store_grn_AnyOther">
<span<?= $Page->AnyOther->viewAttributes() ?>>
<?= $Page->AnyOther->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Remarks->Visible) { // Remarks ?>
    <tr id="r_Remarks">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_grn_Remarks"><template id="tpc_store_grn_Remarks"><?= $Page->Remarks->caption() ?></template></span></td>
        <td data-name="Remarks" <?= $Page->Remarks->cellAttributes() ?>>
<template id="tpx_store_grn_Remarks"><span id="el_store_grn_Remarks">
<span<?= $Page->Remarks->viewAttributes() ?>>
<?= $Page->Remarks->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GrnValue->Visible) { // GrnValue ?>
    <tr id="r_GrnValue">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_grn_GrnValue"><template id="tpc_store_grn_GrnValue"><?= $Page->GrnValue->caption() ?></template></span></td>
        <td data-name="GrnValue" <?= $Page->GrnValue->cellAttributes() ?>>
<template id="tpx_store_grn_GrnValue"><span id="el_store_grn_GrnValue">
<span<?= $Page->GrnValue->viewAttributes() ?>>
<?= $Page->GrnValue->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Pid->Visible) { // Pid ?>
    <tr id="r_Pid">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_grn_Pid"><template id="tpc_store_grn_Pid"><?= $Page->Pid->caption() ?></template></span></td>
        <td data-name="Pid" <?= $Page->Pid->cellAttributes() ?>>
<template id="tpx_store_grn_Pid"><span id="el_store_grn_Pid">
<span<?= $Page->Pid->viewAttributes() ?>>
<?= $Page->Pid->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PaymentNo->Visible) { // PaymentNo ?>
    <tr id="r_PaymentNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_grn_PaymentNo"><template id="tpc_store_grn_PaymentNo"><?= $Page->PaymentNo->caption() ?></template></span></td>
        <td data-name="PaymentNo" <?= $Page->PaymentNo->cellAttributes() ?>>
<template id="tpx_store_grn_PaymentNo"><span id="el_store_grn_PaymentNo">
<span<?= $Page->PaymentNo->viewAttributes() ?>>
<?= $Page->PaymentNo->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PaymentStatus->Visible) { // PaymentStatus ?>
    <tr id="r_PaymentStatus">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_grn_PaymentStatus"><template id="tpc_store_grn_PaymentStatus"><?= $Page->PaymentStatus->caption() ?></template></span></td>
        <td data-name="PaymentStatus" <?= $Page->PaymentStatus->cellAttributes() ?>>
<template id="tpx_store_grn_PaymentStatus"><span id="el_store_grn_PaymentStatus">
<span<?= $Page->PaymentStatus->viewAttributes() ?>>
<?= $Page->PaymentStatus->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PaidAmount->Visible) { // PaidAmount ?>
    <tr id="r_PaidAmount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_grn_PaidAmount"><template id="tpc_store_grn_PaidAmount"><?= $Page->PaidAmount->caption() ?></template></span></td>
        <td data-name="PaidAmount" <?= $Page->PaidAmount->cellAttributes() ?>>
<template id="tpx_store_grn_PaidAmount"><span id="el_store_grn_PaidAmount">
<span<?= $Page->PaidAmount->viewAttributes() ?>>
<?= $Page->PaidAmount->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StoreID->Visible) { // StoreID ?>
    <tr id="r_StoreID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_grn_StoreID"><template id="tpc_store_grn_StoreID"><?= $Page->StoreID->caption() ?></template></span></td>
        <td data-name="StoreID" <?= $Page->StoreID->cellAttributes() ?>>
<template id="tpx_store_grn_StoreID"><span id="el_store_grn_StoreID">
<span<?= $Page->StoreID->viewAttributes() ?>>
<?= $Page->StoreID->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
</table>
<div id="tpd_store_grnview" class="ew-custom-template"></div>
<template id="tpm_store_grnview">
<div id="ct_StoreGrnView"><style>
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
	<div class="col-4">
		<h3 class="card-title"><slot class="ew-slot" name="tpc_store_grn_GRNNO"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_GRNNO"></slot></h3>
	</div>
</div>
<div id="divCheckbox" style="display: none;"><slot class="ew-slot" name="tpc_store_grn_pharmacy_pocol"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_pharmacy_pocol"></slot></div>
<div class="row">
	<div class="col-4">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Supplier</h3>
			</div>
			<div class="card-body">
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_store_grn_BRCODE"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_BRCODE"></slot></span>
				  </div>
				 <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_store_grn_PC"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_PC"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_store_grn_DT"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_DT"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_store_grn_YM"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_YM"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_store_grn_Customercode"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_Customercode"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_store_grn_Customername"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_Customername"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_store_grn_BILLDT"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_BILLDT"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_store_grn_BILLNO"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_BILLNO"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_store_grn_BillTotalValue"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_BillTotalValue"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_store_grn_BillUpload"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_BillUpload"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_store_grn_Remarks"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_Remarks"></slot></span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
	<div class="col-8">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Details</h3>
			</div>
			<div class="card-body">
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_store_grn_Address1"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_Address1"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_store_grn_Address2"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_Address2"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_store_grn_Address3"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_Address3"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_store_grn_State"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_State"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_store_grn_Pincode"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_Pincode"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_store_grn_Fax"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_Fax"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_store_grn_Phone"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_Phone"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_store_grn_GRNTotalValue"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_GRNTotalValue"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_store_grn_TransPort"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_TransPort"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_store_grn_AnyOther"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_AnyOther"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_store_grn_BillDiscount"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_BillDiscount"></slot></span>
				  </div>
				  <div hidden class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_store_grn_GrnValue"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_GrnValue"></slot></span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>				
	</div>
</div>
</div>
</template>
<?php
    if (in_array("view_store_grn", explode(",", $Page->getCurrentDetailTable())) && $view_store_grn->DetailView) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("view_store_grn", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "ViewStoreGrnGrid.php" ?>
<?php } ?>
</form>
<script class="ew-apply-template">
loadjs.ready(["jsrender", "makerjs"], function() {
    ew.templateData = { rows: <?= JsonEncode($Page->Rows) ?> };
    ew.applyTemplate("tpd_store_grnview", "tpm_store_grnview", "store_grnview", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
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
