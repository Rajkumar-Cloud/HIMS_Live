<?php

namespace PHPMaker2021\HIMS;

// Page object
$StorePaymentDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fstore_paymentdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fstore_paymentdelete = currentForm = new ew.Form("fstore_paymentdelete", "delete");
    loadjs.done("fstore_paymentdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.store_payment) ew.vars.tables.store_payment = <?= JsonEncode(GetClientVar("tables", "store_payment")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fstore_paymentdelete" id="fstore_paymentdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="store_payment">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_store_payment_id" class="store_payment_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PAYNO->Visible) { // PAYNO ?>
        <th class="<?= $Page->PAYNO->headerCellClass() ?>"><span id="elh_store_payment_PAYNO" class="store_payment_PAYNO"><?= $Page->PAYNO->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DT->Visible) { // DT ?>
        <th class="<?= $Page->DT->headerCellClass() ?>"><span id="elh_store_payment_DT" class="store_payment_DT"><?= $Page->DT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->YM->Visible) { // YM ?>
        <th class="<?= $Page->YM->headerCellClass() ?>"><span id="elh_store_payment_YM" class="store_payment_YM"><?= $Page->YM->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PC->Visible) { // PC ?>
        <th class="<?= $Page->PC->headerCellClass() ?>"><span id="elh_store_payment_PC" class="store_payment_PC"><?= $Page->PC->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Customercode->Visible) { // Customercode ?>
        <th class="<?= $Page->Customercode->headerCellClass() ?>"><span id="elh_store_payment_Customercode" class="store_payment_Customercode"><?= $Page->Customercode->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Customername->Visible) { // Customername ?>
        <th class="<?= $Page->Customername->headerCellClass() ?>"><span id="elh_store_payment_Customername" class="store_payment_Customername"><?= $Page->Customername->caption() ?></span></th>
<?php } ?>
<?php if ($Page->pharmacy_pocol->Visible) { // pharmacy_pocol ?>
        <th class="<?= $Page->pharmacy_pocol->headerCellClass() ?>"><span id="elh_store_payment_pharmacy_pocol" class="store_payment_pharmacy_pocol"><?= $Page->pharmacy_pocol->caption() ?></span></th>
<?php } ?>
<?php if ($Page->State->Visible) { // State ?>
        <th class="<?= $Page->State->headerCellClass() ?>"><span id="elh_store_payment_State" class="store_payment_State"><?= $Page->State->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Pincode->Visible) { // Pincode ?>
        <th class="<?= $Page->Pincode->headerCellClass() ?>"><span id="elh_store_payment_Pincode" class="store_payment_Pincode"><?= $Page->Pincode->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Phone->Visible) { // Phone ?>
        <th class="<?= $Page->Phone->headerCellClass() ?>"><span id="elh_store_payment_Phone" class="store_payment_Phone"><?= $Page->Phone->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Fax->Visible) { // Fax ?>
        <th class="<?= $Page->Fax->headerCellClass() ?>"><span id="elh_store_payment_Fax" class="store_payment_Fax"><?= $Page->Fax->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EEmail->Visible) { // EEmail ?>
        <th class="<?= $Page->EEmail->headerCellClass() ?>"><span id="elh_store_payment_EEmail" class="store_payment_EEmail"><?= $Page->EEmail->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th class="<?= $Page->HospID->headerCellClass() ?>"><span id="elh_store_payment_HospID" class="store_payment_HospID"><?= $Page->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <th class="<?= $Page->createdby->headerCellClass() ?>"><span id="elh_store_payment_createdby" class="store_payment_createdby"><?= $Page->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th class="<?= $Page->createddatetime->headerCellClass() ?>"><span id="elh_store_payment_createddatetime" class="store_payment_createddatetime"><?= $Page->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <th class="<?= $Page->modifiedby->headerCellClass() ?>"><span id="elh_store_payment_modifiedby" class="store_payment_modifiedby"><?= $Page->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <th class="<?= $Page->modifieddatetime->headerCellClass() ?>"><span id="elh_store_payment_modifieddatetime" class="store_payment_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PharmacyID->Visible) { // PharmacyID ?>
        <th class="<?= $Page->PharmacyID->headerCellClass() ?>"><span id="elh_store_payment_PharmacyID" class="store_payment_PharmacyID"><?= $Page->PharmacyID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BillTotalValue->Visible) { // BillTotalValue ?>
        <th class="<?= $Page->BillTotalValue->headerCellClass() ?>"><span id="elh_store_payment_BillTotalValue" class="store_payment_BillTotalValue"><?= $Page->BillTotalValue->caption() ?></span></th>
<?php } ?>
<?php if ($Page->GRNTotalValue->Visible) { // GRNTotalValue ?>
        <th class="<?= $Page->GRNTotalValue->headerCellClass() ?>"><span id="elh_store_payment_GRNTotalValue" class="store_payment_GRNTotalValue"><?= $Page->GRNTotalValue->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BillDiscount->Visible) { // BillDiscount ?>
        <th class="<?= $Page->BillDiscount->headerCellClass() ?>"><span id="elh_store_payment_BillDiscount" class="store_payment_BillDiscount"><?= $Page->BillDiscount->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TransPort->Visible) { // TransPort ?>
        <th class="<?= $Page->TransPort->headerCellClass() ?>"><span id="elh_store_payment_TransPort" class="store_payment_TransPort"><?= $Page->TransPort->caption() ?></span></th>
<?php } ?>
<?php if ($Page->AnyOther->Visible) { // AnyOther ?>
        <th class="<?= $Page->AnyOther->headerCellClass() ?>"><span id="elh_store_payment_AnyOther" class="store_payment_AnyOther"><?= $Page->AnyOther->caption() ?></span></th>
<?php } ?>
<?php if ($Page->voucher_type->Visible) { // voucher_type ?>
        <th class="<?= $Page->voucher_type->headerCellClass() ?>"><span id="elh_store_payment_voucher_type" class="store_payment_voucher_type"><?= $Page->voucher_type->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Details->Visible) { // Details ?>
        <th class="<?= $Page->Details->headerCellClass() ?>"><span id="elh_store_payment_Details" class="store_payment_Details"><?= $Page->Details->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ModeofPayment->Visible) { // ModeofPayment ?>
        <th class="<?= $Page->ModeofPayment->headerCellClass() ?>"><span id="elh_store_payment_ModeofPayment" class="store_payment_ModeofPayment"><?= $Page->ModeofPayment->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
        <th class="<?= $Page->Amount->headerCellClass() ?>"><span id="elh_store_payment_Amount" class="store_payment_Amount"><?= $Page->Amount->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BankName->Visible) { // BankName ?>
        <th class="<?= $Page->BankName->headerCellClass() ?>"><span id="elh_store_payment_BankName" class="store_payment_BankName"><?= $Page->BankName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->AccountNumber->Visible) { // AccountNumber ?>
        <th class="<?= $Page->AccountNumber->headerCellClass() ?>"><span id="elh_store_payment_AccountNumber" class="store_payment_AccountNumber"><?= $Page->AccountNumber->caption() ?></span></th>
<?php } ?>
<?php if ($Page->chequeNumber->Visible) { // chequeNumber ?>
        <th class="<?= $Page->chequeNumber->headerCellClass() ?>"><span id="elh_store_payment_chequeNumber" class="store_payment_chequeNumber"><?= $Page->chequeNumber->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
        <th class="<?= $Page->SeectPaymentMode->headerCellClass() ?>"><span id="elh_store_payment_SeectPaymentMode" class="store_payment_SeectPaymentMode"><?= $Page->SeectPaymentMode->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PaidAmount->Visible) { // PaidAmount ?>
        <th class="<?= $Page->PaidAmount->headerCellClass() ?>"><span id="elh_store_payment_PaidAmount" class="store_payment_PaidAmount"><?= $Page->PaidAmount->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Currency->Visible) { // Currency ?>
        <th class="<?= $Page->Currency->headerCellClass() ?>"><span id="elh_store_payment_Currency" class="store_payment_Currency"><?= $Page->Currency->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CardNumber->Visible) { // CardNumber ?>
        <th class="<?= $Page->CardNumber->headerCellClass() ?>"><span id="elh_store_payment_CardNumber" class="store_payment_CardNumber"><?= $Page->CardNumber->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BranchID->Visible) { // BranchID ?>
        <th class="<?= $Page->BranchID->headerCellClass() ?>"><span id="elh_store_payment_BranchID" class="store_payment_BranchID"><?= $Page->BranchID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->StoreID->Visible) { // StoreID ?>
        <th class="<?= $Page->StoreID->headerCellClass() ?>"><span id="elh_store_payment_StoreID" class="store_payment_StoreID"><?= $Page->StoreID->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_store_payment_id" class="store_payment_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PAYNO->Visible) { // PAYNO ?>
        <td <?= $Page->PAYNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_payment_PAYNO" class="store_payment_PAYNO">
<span<?= $Page->PAYNO->viewAttributes() ?>>
<?= $Page->PAYNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DT->Visible) { // DT ?>
        <td <?= $Page->DT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_payment_DT" class="store_payment_DT">
<span<?= $Page->DT->viewAttributes() ?>>
<?= $Page->DT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->YM->Visible) { // YM ?>
        <td <?= $Page->YM->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_payment_YM" class="store_payment_YM">
<span<?= $Page->YM->viewAttributes() ?>>
<?= $Page->YM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PC->Visible) { // PC ?>
        <td <?= $Page->PC->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_payment_PC" class="store_payment_PC">
<span<?= $Page->PC->viewAttributes() ?>>
<?= $Page->PC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Customercode->Visible) { // Customercode ?>
        <td <?= $Page->Customercode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_payment_Customercode" class="store_payment_Customercode">
<span<?= $Page->Customercode->viewAttributes() ?>>
<?= $Page->Customercode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Customername->Visible) { // Customername ?>
        <td <?= $Page->Customername->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_payment_Customername" class="store_payment_Customername">
<span<?= $Page->Customername->viewAttributes() ?>>
<?= $Page->Customername->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->pharmacy_pocol->Visible) { // pharmacy_pocol ?>
        <td <?= $Page->pharmacy_pocol->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_payment_pharmacy_pocol" class="store_payment_pharmacy_pocol">
<span<?= $Page->pharmacy_pocol->viewAttributes() ?>>
<?= $Page->pharmacy_pocol->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->State->Visible) { // State ?>
        <td <?= $Page->State->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_payment_State" class="store_payment_State">
<span<?= $Page->State->viewAttributes() ?>>
<?= $Page->State->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Pincode->Visible) { // Pincode ?>
        <td <?= $Page->Pincode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_payment_Pincode" class="store_payment_Pincode">
<span<?= $Page->Pincode->viewAttributes() ?>>
<?= $Page->Pincode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Phone->Visible) { // Phone ?>
        <td <?= $Page->Phone->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_payment_Phone" class="store_payment_Phone">
<span<?= $Page->Phone->viewAttributes() ?>>
<?= $Page->Phone->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Fax->Visible) { // Fax ?>
        <td <?= $Page->Fax->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_payment_Fax" class="store_payment_Fax">
<span<?= $Page->Fax->viewAttributes() ?>>
<?= $Page->Fax->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EEmail->Visible) { // EEmail ?>
        <td <?= $Page->EEmail->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_payment_EEmail" class="store_payment_EEmail">
<span<?= $Page->EEmail->viewAttributes() ?>>
<?= $Page->EEmail->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <td <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_payment_HospID" class="store_payment_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <td <?= $Page->createdby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_payment_createdby" class="store_payment_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_payment_createddatetime" class="store_payment_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_payment_modifiedby" class="store_payment_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_payment_modifieddatetime" class="store_payment_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PharmacyID->Visible) { // PharmacyID ?>
        <td <?= $Page->PharmacyID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_payment_PharmacyID" class="store_payment_PharmacyID">
<span<?= $Page->PharmacyID->viewAttributes() ?>>
<?= $Page->PharmacyID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BillTotalValue->Visible) { // BillTotalValue ?>
        <td <?= $Page->BillTotalValue->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_payment_BillTotalValue" class="store_payment_BillTotalValue">
<span<?= $Page->BillTotalValue->viewAttributes() ?>>
<?= $Page->BillTotalValue->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->GRNTotalValue->Visible) { // GRNTotalValue ?>
        <td <?= $Page->GRNTotalValue->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_payment_GRNTotalValue" class="store_payment_GRNTotalValue">
<span<?= $Page->GRNTotalValue->viewAttributes() ?>>
<?= $Page->GRNTotalValue->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BillDiscount->Visible) { // BillDiscount ?>
        <td <?= $Page->BillDiscount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_payment_BillDiscount" class="store_payment_BillDiscount">
<span<?= $Page->BillDiscount->viewAttributes() ?>>
<?= $Page->BillDiscount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TransPort->Visible) { // TransPort ?>
        <td <?= $Page->TransPort->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_payment_TransPort" class="store_payment_TransPort">
<span<?= $Page->TransPort->viewAttributes() ?>>
<?= $Page->TransPort->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->AnyOther->Visible) { // AnyOther ?>
        <td <?= $Page->AnyOther->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_payment_AnyOther" class="store_payment_AnyOther">
<span<?= $Page->AnyOther->viewAttributes() ?>>
<?= $Page->AnyOther->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->voucher_type->Visible) { // voucher_type ?>
        <td <?= $Page->voucher_type->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_payment_voucher_type" class="store_payment_voucher_type">
<span<?= $Page->voucher_type->viewAttributes() ?>>
<?= $Page->voucher_type->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Details->Visible) { // Details ?>
        <td <?= $Page->Details->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_payment_Details" class="store_payment_Details">
<span<?= $Page->Details->viewAttributes() ?>>
<?= $Page->Details->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ModeofPayment->Visible) { // ModeofPayment ?>
        <td <?= $Page->ModeofPayment->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_payment_ModeofPayment" class="store_payment_ModeofPayment">
<span<?= $Page->ModeofPayment->viewAttributes() ?>>
<?= $Page->ModeofPayment->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
        <td <?= $Page->Amount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_payment_Amount" class="store_payment_Amount">
<span<?= $Page->Amount->viewAttributes() ?>>
<?= $Page->Amount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BankName->Visible) { // BankName ?>
        <td <?= $Page->BankName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_payment_BankName" class="store_payment_BankName">
<span<?= $Page->BankName->viewAttributes() ?>>
<?= $Page->BankName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->AccountNumber->Visible) { // AccountNumber ?>
        <td <?= $Page->AccountNumber->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_payment_AccountNumber" class="store_payment_AccountNumber">
<span<?= $Page->AccountNumber->viewAttributes() ?>>
<?= $Page->AccountNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->chequeNumber->Visible) { // chequeNumber ?>
        <td <?= $Page->chequeNumber->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_payment_chequeNumber" class="store_payment_chequeNumber">
<span<?= $Page->chequeNumber->viewAttributes() ?>>
<?= $Page->chequeNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
        <td <?= $Page->SeectPaymentMode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_payment_SeectPaymentMode" class="store_payment_SeectPaymentMode">
<span<?= $Page->SeectPaymentMode->viewAttributes() ?>>
<?= $Page->SeectPaymentMode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PaidAmount->Visible) { // PaidAmount ?>
        <td <?= $Page->PaidAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_payment_PaidAmount" class="store_payment_PaidAmount">
<span<?= $Page->PaidAmount->viewAttributes() ?>>
<?= $Page->PaidAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Currency->Visible) { // Currency ?>
        <td <?= $Page->Currency->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_payment_Currency" class="store_payment_Currency">
<span<?= $Page->Currency->viewAttributes() ?>>
<?= $Page->Currency->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CardNumber->Visible) { // CardNumber ?>
        <td <?= $Page->CardNumber->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_payment_CardNumber" class="store_payment_CardNumber">
<span<?= $Page->CardNumber->viewAttributes() ?>>
<?= $Page->CardNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BranchID->Visible) { // BranchID ?>
        <td <?= $Page->BranchID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_payment_BranchID" class="store_payment_BranchID">
<span<?= $Page->BranchID->viewAttributes() ?>>
<?= $Page->BranchID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->StoreID->Visible) { // StoreID ?>
        <td <?= $Page->StoreID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_payment_StoreID" class="store_payment_StoreID">
<span<?= $Page->StoreID->viewAttributes() ?>>
<?= $Page->StoreID->getViewValue() ?></span>
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
