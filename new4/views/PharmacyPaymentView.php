<?php

namespace PHPMaker2021\HIMS;

// Page object
$PharmacyPaymentView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpharmacy_paymentview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fpharmacy_paymentview = currentForm = new ew.Form("fpharmacy_paymentview", "view");
    loadjs.done("fpharmacy_paymentview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.pharmacy_payment) ew.vars.tables.pharmacy_payment = <?= JsonEncode(GetClientVar("tables", "pharmacy_payment")) ?>;
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
<form name="fpharmacy_paymentview" id="fpharmacy_paymentview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pharmacy_payment">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_pharmacy_payment_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PAYNO->Visible) { // PAYNO ?>
    <tr id="r_PAYNO">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_PAYNO"><?= $Page->PAYNO->caption() ?></span></td>
        <td data-name="PAYNO" <?= $Page->PAYNO->cellAttributes() ?>>
<span id="el_pharmacy_payment_PAYNO">
<span<?= $Page->PAYNO->viewAttributes() ?>>
<?= $Page->PAYNO->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DT->Visible) { // DT ?>
    <tr id="r_DT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_DT"><?= $Page->DT->caption() ?></span></td>
        <td data-name="DT" <?= $Page->DT->cellAttributes() ?>>
<span id="el_pharmacy_payment_DT">
<span<?= $Page->DT->viewAttributes() ?>>
<?= $Page->DT->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->YM->Visible) { // YM ?>
    <tr id="r_YM">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_YM"><?= $Page->YM->caption() ?></span></td>
        <td data-name="YM" <?= $Page->YM->cellAttributes() ?>>
<span id="el_pharmacy_payment_YM">
<span<?= $Page->YM->viewAttributes() ?>>
<?= $Page->YM->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PC->Visible) { // PC ?>
    <tr id="r_PC">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_PC"><?= $Page->PC->caption() ?></span></td>
        <td data-name="PC" <?= $Page->PC->cellAttributes() ?>>
<span id="el_pharmacy_payment_PC">
<span<?= $Page->PC->viewAttributes() ?>>
<?= $Page->PC->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Customercode->Visible) { // Customercode ?>
    <tr id="r_Customercode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_Customercode"><?= $Page->Customercode->caption() ?></span></td>
        <td data-name="Customercode" <?= $Page->Customercode->cellAttributes() ?>>
<span id="el_pharmacy_payment_Customercode">
<span<?= $Page->Customercode->viewAttributes() ?>>
<?= $Page->Customercode->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Customername->Visible) { // Customername ?>
    <tr id="r_Customername">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_Customername"><?= $Page->Customername->caption() ?></span></td>
        <td data-name="Customername" <?= $Page->Customername->cellAttributes() ?>>
<span id="el_pharmacy_payment_Customername">
<span<?= $Page->Customername->viewAttributes() ?>>
<?= $Page->Customername->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->pharmacy_pocol->Visible) { // pharmacy_pocol ?>
    <tr id="r_pharmacy_pocol">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_pharmacy_pocol"><?= $Page->pharmacy_pocol->caption() ?></span></td>
        <td data-name="pharmacy_pocol" <?= $Page->pharmacy_pocol->cellAttributes() ?>>
<span id="el_pharmacy_payment_pharmacy_pocol">
<span<?= $Page->pharmacy_pocol->viewAttributes() ?>>
<?= $Page->pharmacy_pocol->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Address1->Visible) { // Address1 ?>
    <tr id="r_Address1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_Address1"><?= $Page->Address1->caption() ?></span></td>
        <td data-name="Address1" <?= $Page->Address1->cellAttributes() ?>>
<span id="el_pharmacy_payment_Address1">
<span<?= $Page->Address1->viewAttributes() ?>>
<?= $Page->Address1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Address2->Visible) { // Address2 ?>
    <tr id="r_Address2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_Address2"><?= $Page->Address2->caption() ?></span></td>
        <td data-name="Address2" <?= $Page->Address2->cellAttributes() ?>>
<span id="el_pharmacy_payment_Address2">
<span<?= $Page->Address2->viewAttributes() ?>>
<?= $Page->Address2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Address3->Visible) { // Address3 ?>
    <tr id="r_Address3">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_Address3"><?= $Page->Address3->caption() ?></span></td>
        <td data-name="Address3" <?= $Page->Address3->cellAttributes() ?>>
<span id="el_pharmacy_payment_Address3">
<span<?= $Page->Address3->viewAttributes() ?>>
<?= $Page->Address3->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->State->Visible) { // State ?>
    <tr id="r_State">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_State"><?= $Page->State->caption() ?></span></td>
        <td data-name="State" <?= $Page->State->cellAttributes() ?>>
<span id="el_pharmacy_payment_State">
<span<?= $Page->State->viewAttributes() ?>>
<?= $Page->State->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Pincode->Visible) { // Pincode ?>
    <tr id="r_Pincode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_Pincode"><?= $Page->Pincode->caption() ?></span></td>
        <td data-name="Pincode" <?= $Page->Pincode->cellAttributes() ?>>
<span id="el_pharmacy_payment_Pincode">
<span<?= $Page->Pincode->viewAttributes() ?>>
<?= $Page->Pincode->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Phone->Visible) { // Phone ?>
    <tr id="r_Phone">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_Phone"><?= $Page->Phone->caption() ?></span></td>
        <td data-name="Phone" <?= $Page->Phone->cellAttributes() ?>>
<span id="el_pharmacy_payment_Phone">
<span<?= $Page->Phone->viewAttributes() ?>>
<?= $Page->Phone->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Fax->Visible) { // Fax ?>
    <tr id="r_Fax">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_Fax"><?= $Page->Fax->caption() ?></span></td>
        <td data-name="Fax" <?= $Page->Fax->cellAttributes() ?>>
<span id="el_pharmacy_payment_Fax">
<span<?= $Page->Fax->viewAttributes() ?>>
<?= $Page->Fax->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EEmail->Visible) { // EEmail ?>
    <tr id="r_EEmail">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_EEmail"><?= $Page->EEmail->caption() ?></span></td>
        <td data-name="EEmail" <?= $Page->EEmail->cellAttributes() ?>>
<span id="el_pharmacy_payment_EEmail">
<span<?= $Page->EEmail->viewAttributes() ?>>
<?= $Page->EEmail->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <tr id="r_HospID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_HospID"><?= $Page->HospID->caption() ?></span></td>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el_pharmacy_payment_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <tr id="r_createdby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_createdby"><?= $Page->createdby->caption() ?></span></td>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<span id="el_pharmacy_payment_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <tr id="r_createddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_createddatetime"><?= $Page->createddatetime->caption() ?></span></td>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el_pharmacy_payment_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <tr id="r_modifiedby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_modifiedby"><?= $Page->modifiedby->caption() ?></span></td>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el_pharmacy_payment_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <tr id="r_modifieddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span></td>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el_pharmacy_payment_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PharmacyID->Visible) { // PharmacyID ?>
    <tr id="r_PharmacyID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_PharmacyID"><?= $Page->PharmacyID->caption() ?></span></td>
        <td data-name="PharmacyID" <?= $Page->PharmacyID->cellAttributes() ?>>
<span id="el_pharmacy_payment_PharmacyID">
<span<?= $Page->PharmacyID->viewAttributes() ?>>
<?= $Page->PharmacyID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BillTotalValue->Visible) { // BillTotalValue ?>
    <tr id="r_BillTotalValue">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_BillTotalValue"><?= $Page->BillTotalValue->caption() ?></span></td>
        <td data-name="BillTotalValue" <?= $Page->BillTotalValue->cellAttributes() ?>>
<span id="el_pharmacy_payment_BillTotalValue">
<span<?= $Page->BillTotalValue->viewAttributes() ?>>
<?= $Page->BillTotalValue->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GRNTotalValue->Visible) { // GRNTotalValue ?>
    <tr id="r_GRNTotalValue">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_GRNTotalValue"><?= $Page->GRNTotalValue->caption() ?></span></td>
        <td data-name="GRNTotalValue" <?= $Page->GRNTotalValue->cellAttributes() ?>>
<span id="el_pharmacy_payment_GRNTotalValue">
<span<?= $Page->GRNTotalValue->viewAttributes() ?>>
<?= $Page->GRNTotalValue->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BillDiscount->Visible) { // BillDiscount ?>
    <tr id="r_BillDiscount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_BillDiscount"><?= $Page->BillDiscount->caption() ?></span></td>
        <td data-name="BillDiscount" <?= $Page->BillDiscount->cellAttributes() ?>>
<span id="el_pharmacy_payment_BillDiscount">
<span<?= $Page->BillDiscount->viewAttributes() ?>>
<?= $Page->BillDiscount->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BillUpload->Visible) { // BillUpload ?>
    <tr id="r_BillUpload">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_BillUpload"><?= $Page->BillUpload->caption() ?></span></td>
        <td data-name="BillUpload" <?= $Page->BillUpload->cellAttributes() ?>>
<span id="el_pharmacy_payment_BillUpload">
<span<?= $Page->BillUpload->viewAttributes() ?>>
<?= $Page->BillUpload->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TransPort->Visible) { // TransPort ?>
    <tr id="r_TransPort">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_TransPort"><?= $Page->TransPort->caption() ?></span></td>
        <td data-name="TransPort" <?= $Page->TransPort->cellAttributes() ?>>
<span id="el_pharmacy_payment_TransPort">
<span<?= $Page->TransPort->viewAttributes() ?>>
<?= $Page->TransPort->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AnyOther->Visible) { // AnyOther ?>
    <tr id="r_AnyOther">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_AnyOther"><?= $Page->AnyOther->caption() ?></span></td>
        <td data-name="AnyOther" <?= $Page->AnyOther->cellAttributes() ?>>
<span id="el_pharmacy_payment_AnyOther">
<span<?= $Page->AnyOther->viewAttributes() ?>>
<?= $Page->AnyOther->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->voucher_type->Visible) { // voucher_type ?>
    <tr id="r_voucher_type">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_voucher_type"><?= $Page->voucher_type->caption() ?></span></td>
        <td data-name="voucher_type" <?= $Page->voucher_type->cellAttributes() ?>>
<span id="el_pharmacy_payment_voucher_type">
<span<?= $Page->voucher_type->viewAttributes() ?>>
<?= $Page->voucher_type->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Details->Visible) { // Details ?>
    <tr id="r_Details">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_Details"><?= $Page->Details->caption() ?></span></td>
        <td data-name="Details" <?= $Page->Details->cellAttributes() ?>>
<span id="el_pharmacy_payment_Details">
<span<?= $Page->Details->viewAttributes() ?>>
<?= $Page->Details->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ModeofPayment->Visible) { // ModeofPayment ?>
    <tr id="r_ModeofPayment">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_ModeofPayment"><?= $Page->ModeofPayment->caption() ?></span></td>
        <td data-name="ModeofPayment" <?= $Page->ModeofPayment->cellAttributes() ?>>
<span id="el_pharmacy_payment_ModeofPayment">
<span<?= $Page->ModeofPayment->viewAttributes() ?>>
<?= $Page->ModeofPayment->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
    <tr id="r_Amount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_Amount"><?= $Page->Amount->caption() ?></span></td>
        <td data-name="Amount" <?= $Page->Amount->cellAttributes() ?>>
<span id="el_pharmacy_payment_Amount">
<span<?= $Page->Amount->viewAttributes() ?>>
<?= $Page->Amount->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BankName->Visible) { // BankName ?>
    <tr id="r_BankName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_BankName"><?= $Page->BankName->caption() ?></span></td>
        <td data-name="BankName" <?= $Page->BankName->cellAttributes() ?>>
<span id="el_pharmacy_payment_BankName">
<span<?= $Page->BankName->viewAttributes() ?>>
<?= $Page->BankName->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AccountNumber->Visible) { // AccountNumber ?>
    <tr id="r_AccountNumber">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_AccountNumber"><?= $Page->AccountNumber->caption() ?></span></td>
        <td data-name="AccountNumber" <?= $Page->AccountNumber->cellAttributes() ?>>
<span id="el_pharmacy_payment_AccountNumber">
<span<?= $Page->AccountNumber->viewAttributes() ?>>
<?= $Page->AccountNumber->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->chequeNumber->Visible) { // chequeNumber ?>
    <tr id="r_chequeNumber">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_chequeNumber"><?= $Page->chequeNumber->caption() ?></span></td>
        <td data-name="chequeNumber" <?= $Page->chequeNumber->cellAttributes() ?>>
<span id="el_pharmacy_payment_chequeNumber">
<span<?= $Page->chequeNumber->viewAttributes() ?>>
<?= $Page->chequeNumber->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Remarks->Visible) { // Remarks ?>
    <tr id="r_Remarks">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_Remarks"><?= $Page->Remarks->caption() ?></span></td>
        <td data-name="Remarks" <?= $Page->Remarks->cellAttributes() ?>>
<span id="el_pharmacy_payment_Remarks">
<span<?= $Page->Remarks->viewAttributes() ?>>
<?= $Page->Remarks->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
    <tr id="r_SeectPaymentMode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_SeectPaymentMode"><?= $Page->SeectPaymentMode->caption() ?></span></td>
        <td data-name="SeectPaymentMode" <?= $Page->SeectPaymentMode->cellAttributes() ?>>
<span id="el_pharmacy_payment_SeectPaymentMode">
<span<?= $Page->SeectPaymentMode->viewAttributes() ?>>
<?= $Page->SeectPaymentMode->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PaidAmount->Visible) { // PaidAmount ?>
    <tr id="r_PaidAmount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_PaidAmount"><?= $Page->PaidAmount->caption() ?></span></td>
        <td data-name="PaidAmount" <?= $Page->PaidAmount->cellAttributes() ?>>
<span id="el_pharmacy_payment_PaidAmount">
<span<?= $Page->PaidAmount->viewAttributes() ?>>
<?= $Page->PaidAmount->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Currency->Visible) { // Currency ?>
    <tr id="r_Currency">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_Currency"><?= $Page->Currency->caption() ?></span></td>
        <td data-name="Currency" <?= $Page->Currency->cellAttributes() ?>>
<span id="el_pharmacy_payment_Currency">
<span<?= $Page->Currency->viewAttributes() ?>>
<?= $Page->Currency->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CardNumber->Visible) { // CardNumber ?>
    <tr id="r_CardNumber">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_CardNumber"><?= $Page->CardNumber->caption() ?></span></td>
        <td data-name="CardNumber" <?= $Page->CardNumber->cellAttributes() ?>>
<span id="el_pharmacy_payment_CardNumber">
<span<?= $Page->CardNumber->viewAttributes() ?>>
<?= $Page->CardNumber->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
</table>
<?php
    if (in_array("pharmacy_grn", explode(",", $Page->getCurrentDetailTable())) && $pharmacy_grn->DetailView) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("pharmacy_grn", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "PharmacyGrnGrid.php" ?>
<?php } ?>
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
