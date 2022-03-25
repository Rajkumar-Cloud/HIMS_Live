<?php
namespace PHPMaker2020\HIMS;

// Autoload
include_once "autoload.php";

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	\Delight\Cookie\Session::start(Config("COOKIE_SAMESITE")); // Init session data

// Output buffering
ob_start();
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$pharmacy_payment_view = new pharmacy_payment_view();

// Run the page
$pharmacy_payment_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_payment_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$pharmacy_payment_view->isExport()) { ?>
<script>
var fpharmacy_paymentview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fpharmacy_paymentview = currentForm = new ew.Form("fpharmacy_paymentview", "view");
	loadjs.done("fpharmacy_paymentview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$pharmacy_payment_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $pharmacy_payment_view->ExportOptions->render("body") ?>
<?php $pharmacy_payment_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $pharmacy_payment_view->showPageHeader(); ?>
<?php
$pharmacy_payment_view->showMessage();
?>
<form name="fpharmacy_paymentview" id="fpharmacy_paymentview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_payment">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_payment_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($pharmacy_payment_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_id"><?php echo $pharmacy_payment_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $pharmacy_payment_view->id->cellAttributes() ?>>
<span id="el_pharmacy_payment_id">
<span<?php echo $pharmacy_payment_view->id->viewAttributes() ?>><?php echo $pharmacy_payment_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment_view->PAYNO->Visible) { // PAYNO ?>
	<tr id="r_PAYNO">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_PAYNO"><?php echo $pharmacy_payment_view->PAYNO->caption() ?></span></td>
		<td data-name="PAYNO" <?php echo $pharmacy_payment_view->PAYNO->cellAttributes() ?>>
<span id="el_pharmacy_payment_PAYNO">
<span<?php echo $pharmacy_payment_view->PAYNO->viewAttributes() ?>><?php echo $pharmacy_payment_view->PAYNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment_view->DT->Visible) { // DT ?>
	<tr id="r_DT">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_DT"><?php echo $pharmacy_payment_view->DT->caption() ?></span></td>
		<td data-name="DT" <?php echo $pharmacy_payment_view->DT->cellAttributes() ?>>
<span id="el_pharmacy_payment_DT">
<span<?php echo $pharmacy_payment_view->DT->viewAttributes() ?>><?php echo $pharmacy_payment_view->DT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment_view->YM->Visible) { // YM ?>
	<tr id="r_YM">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_YM"><?php echo $pharmacy_payment_view->YM->caption() ?></span></td>
		<td data-name="YM" <?php echo $pharmacy_payment_view->YM->cellAttributes() ?>>
<span id="el_pharmacy_payment_YM">
<span<?php echo $pharmacy_payment_view->YM->viewAttributes() ?>><?php echo $pharmacy_payment_view->YM->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment_view->PC->Visible) { // PC ?>
	<tr id="r_PC">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_PC"><?php echo $pharmacy_payment_view->PC->caption() ?></span></td>
		<td data-name="PC" <?php echo $pharmacy_payment_view->PC->cellAttributes() ?>>
<span id="el_pharmacy_payment_PC">
<span<?php echo $pharmacy_payment_view->PC->viewAttributes() ?>><?php echo $pharmacy_payment_view->PC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment_view->Customercode->Visible) { // Customercode ?>
	<tr id="r_Customercode">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_Customercode"><?php echo $pharmacy_payment_view->Customercode->caption() ?></span></td>
		<td data-name="Customercode" <?php echo $pharmacy_payment_view->Customercode->cellAttributes() ?>>
<span id="el_pharmacy_payment_Customercode">
<span<?php echo $pharmacy_payment_view->Customercode->viewAttributes() ?>><?php echo $pharmacy_payment_view->Customercode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment_view->Customername->Visible) { // Customername ?>
	<tr id="r_Customername">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_Customername"><?php echo $pharmacy_payment_view->Customername->caption() ?></span></td>
		<td data-name="Customername" <?php echo $pharmacy_payment_view->Customername->cellAttributes() ?>>
<span id="el_pharmacy_payment_Customername">
<span<?php echo $pharmacy_payment_view->Customername->viewAttributes() ?>><?php echo $pharmacy_payment_view->Customername->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment_view->pharmacy_pocol->Visible) { // pharmacy_pocol ?>
	<tr id="r_pharmacy_pocol">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_pharmacy_pocol"><?php echo $pharmacy_payment_view->pharmacy_pocol->caption() ?></span></td>
		<td data-name="pharmacy_pocol" <?php echo $pharmacy_payment_view->pharmacy_pocol->cellAttributes() ?>>
<span id="el_pharmacy_payment_pharmacy_pocol">
<span<?php echo $pharmacy_payment_view->pharmacy_pocol->viewAttributes() ?>><?php echo $pharmacy_payment_view->pharmacy_pocol->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment_view->Address1->Visible) { // Address1 ?>
	<tr id="r_Address1">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_Address1"><?php echo $pharmacy_payment_view->Address1->caption() ?></span></td>
		<td data-name="Address1" <?php echo $pharmacy_payment_view->Address1->cellAttributes() ?>>
<span id="el_pharmacy_payment_Address1">
<span<?php echo $pharmacy_payment_view->Address1->viewAttributes() ?>><?php echo $pharmacy_payment_view->Address1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment_view->Address2->Visible) { // Address2 ?>
	<tr id="r_Address2">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_Address2"><?php echo $pharmacy_payment_view->Address2->caption() ?></span></td>
		<td data-name="Address2" <?php echo $pharmacy_payment_view->Address2->cellAttributes() ?>>
<span id="el_pharmacy_payment_Address2">
<span<?php echo $pharmacy_payment_view->Address2->viewAttributes() ?>><?php echo $pharmacy_payment_view->Address2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment_view->Address3->Visible) { // Address3 ?>
	<tr id="r_Address3">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_Address3"><?php echo $pharmacy_payment_view->Address3->caption() ?></span></td>
		<td data-name="Address3" <?php echo $pharmacy_payment_view->Address3->cellAttributes() ?>>
<span id="el_pharmacy_payment_Address3">
<span<?php echo $pharmacy_payment_view->Address3->viewAttributes() ?>><?php echo $pharmacy_payment_view->Address3->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment_view->State->Visible) { // State ?>
	<tr id="r_State">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_State"><?php echo $pharmacy_payment_view->State->caption() ?></span></td>
		<td data-name="State" <?php echo $pharmacy_payment_view->State->cellAttributes() ?>>
<span id="el_pharmacy_payment_State">
<span<?php echo $pharmacy_payment_view->State->viewAttributes() ?>><?php echo $pharmacy_payment_view->State->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment_view->Pincode->Visible) { // Pincode ?>
	<tr id="r_Pincode">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_Pincode"><?php echo $pharmacy_payment_view->Pincode->caption() ?></span></td>
		<td data-name="Pincode" <?php echo $pharmacy_payment_view->Pincode->cellAttributes() ?>>
<span id="el_pharmacy_payment_Pincode">
<span<?php echo $pharmacy_payment_view->Pincode->viewAttributes() ?>><?php echo $pharmacy_payment_view->Pincode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment_view->Phone->Visible) { // Phone ?>
	<tr id="r_Phone">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_Phone"><?php echo $pharmacy_payment_view->Phone->caption() ?></span></td>
		<td data-name="Phone" <?php echo $pharmacy_payment_view->Phone->cellAttributes() ?>>
<span id="el_pharmacy_payment_Phone">
<span<?php echo $pharmacy_payment_view->Phone->viewAttributes() ?>><?php echo $pharmacy_payment_view->Phone->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment_view->Fax->Visible) { // Fax ?>
	<tr id="r_Fax">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_Fax"><?php echo $pharmacy_payment_view->Fax->caption() ?></span></td>
		<td data-name="Fax" <?php echo $pharmacy_payment_view->Fax->cellAttributes() ?>>
<span id="el_pharmacy_payment_Fax">
<span<?php echo $pharmacy_payment_view->Fax->viewAttributes() ?>><?php echo $pharmacy_payment_view->Fax->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment_view->EEmail->Visible) { // EEmail ?>
	<tr id="r_EEmail">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_EEmail"><?php echo $pharmacy_payment_view->EEmail->caption() ?></span></td>
		<td data-name="EEmail" <?php echo $pharmacy_payment_view->EEmail->cellAttributes() ?>>
<span id="el_pharmacy_payment_EEmail">
<span<?php echo $pharmacy_payment_view->EEmail->viewAttributes() ?>><?php echo $pharmacy_payment_view->EEmail->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment_view->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_HospID"><?php echo $pharmacy_payment_view->HospID->caption() ?></span></td>
		<td data-name="HospID" <?php echo $pharmacy_payment_view->HospID->cellAttributes() ?>>
<span id="el_pharmacy_payment_HospID">
<span<?php echo $pharmacy_payment_view->HospID->viewAttributes() ?>><?php echo $pharmacy_payment_view->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment_view->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_createdby"><?php echo $pharmacy_payment_view->createdby->caption() ?></span></td>
		<td data-name="createdby" <?php echo $pharmacy_payment_view->createdby->cellAttributes() ?>>
<span id="el_pharmacy_payment_createdby">
<span<?php echo $pharmacy_payment_view->createdby->viewAttributes() ?>><?php echo $pharmacy_payment_view->createdby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment_view->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_createddatetime"><?php echo $pharmacy_payment_view->createddatetime->caption() ?></span></td>
		<td data-name="createddatetime" <?php echo $pharmacy_payment_view->createddatetime->cellAttributes() ?>>
<span id="el_pharmacy_payment_createddatetime">
<span<?php echo $pharmacy_payment_view->createddatetime->viewAttributes() ?>><?php echo $pharmacy_payment_view->createddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment_view->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_modifiedby"><?php echo $pharmacy_payment_view->modifiedby->caption() ?></span></td>
		<td data-name="modifiedby" <?php echo $pharmacy_payment_view->modifiedby->cellAttributes() ?>>
<span id="el_pharmacy_payment_modifiedby">
<span<?php echo $pharmacy_payment_view->modifiedby->viewAttributes() ?>><?php echo $pharmacy_payment_view->modifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment_view->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_modifieddatetime"><?php echo $pharmacy_payment_view->modifieddatetime->caption() ?></span></td>
		<td data-name="modifieddatetime" <?php echo $pharmacy_payment_view->modifieddatetime->cellAttributes() ?>>
<span id="el_pharmacy_payment_modifieddatetime">
<span<?php echo $pharmacy_payment_view->modifieddatetime->viewAttributes() ?>><?php echo $pharmacy_payment_view->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment_view->PharmacyID->Visible) { // PharmacyID ?>
	<tr id="r_PharmacyID">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_PharmacyID"><?php echo $pharmacy_payment_view->PharmacyID->caption() ?></span></td>
		<td data-name="PharmacyID" <?php echo $pharmacy_payment_view->PharmacyID->cellAttributes() ?>>
<span id="el_pharmacy_payment_PharmacyID">
<span<?php echo $pharmacy_payment_view->PharmacyID->viewAttributes() ?>><?php echo $pharmacy_payment_view->PharmacyID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment_view->BillTotalValue->Visible) { // BillTotalValue ?>
	<tr id="r_BillTotalValue">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_BillTotalValue"><?php echo $pharmacy_payment_view->BillTotalValue->caption() ?></span></td>
		<td data-name="BillTotalValue" <?php echo $pharmacy_payment_view->BillTotalValue->cellAttributes() ?>>
<span id="el_pharmacy_payment_BillTotalValue">
<span<?php echo $pharmacy_payment_view->BillTotalValue->viewAttributes() ?>><?php echo $pharmacy_payment_view->BillTotalValue->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment_view->GRNTotalValue->Visible) { // GRNTotalValue ?>
	<tr id="r_GRNTotalValue">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_GRNTotalValue"><?php echo $pharmacy_payment_view->GRNTotalValue->caption() ?></span></td>
		<td data-name="GRNTotalValue" <?php echo $pharmacy_payment_view->GRNTotalValue->cellAttributes() ?>>
<span id="el_pharmacy_payment_GRNTotalValue">
<span<?php echo $pharmacy_payment_view->GRNTotalValue->viewAttributes() ?>><?php echo $pharmacy_payment_view->GRNTotalValue->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment_view->BillDiscount->Visible) { // BillDiscount ?>
	<tr id="r_BillDiscount">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_BillDiscount"><?php echo $pharmacy_payment_view->BillDiscount->caption() ?></span></td>
		<td data-name="BillDiscount" <?php echo $pharmacy_payment_view->BillDiscount->cellAttributes() ?>>
<span id="el_pharmacy_payment_BillDiscount">
<span<?php echo $pharmacy_payment_view->BillDiscount->viewAttributes() ?>><?php echo $pharmacy_payment_view->BillDiscount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment_view->BillUpload->Visible) { // BillUpload ?>
	<tr id="r_BillUpload">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_BillUpload"><?php echo $pharmacy_payment_view->BillUpload->caption() ?></span></td>
		<td data-name="BillUpload" <?php echo $pharmacy_payment_view->BillUpload->cellAttributes() ?>>
<span id="el_pharmacy_payment_BillUpload">
<span<?php echo $pharmacy_payment_view->BillUpload->viewAttributes() ?>><?php echo $pharmacy_payment_view->BillUpload->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment_view->TransPort->Visible) { // TransPort ?>
	<tr id="r_TransPort">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_TransPort"><?php echo $pharmacy_payment_view->TransPort->caption() ?></span></td>
		<td data-name="TransPort" <?php echo $pharmacy_payment_view->TransPort->cellAttributes() ?>>
<span id="el_pharmacy_payment_TransPort">
<span<?php echo $pharmacy_payment_view->TransPort->viewAttributes() ?>><?php echo $pharmacy_payment_view->TransPort->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment_view->AnyOther->Visible) { // AnyOther ?>
	<tr id="r_AnyOther">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_AnyOther"><?php echo $pharmacy_payment_view->AnyOther->caption() ?></span></td>
		<td data-name="AnyOther" <?php echo $pharmacy_payment_view->AnyOther->cellAttributes() ?>>
<span id="el_pharmacy_payment_AnyOther">
<span<?php echo $pharmacy_payment_view->AnyOther->viewAttributes() ?>><?php echo $pharmacy_payment_view->AnyOther->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment_view->voucher_type->Visible) { // voucher_type ?>
	<tr id="r_voucher_type">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_voucher_type"><?php echo $pharmacy_payment_view->voucher_type->caption() ?></span></td>
		<td data-name="voucher_type" <?php echo $pharmacy_payment_view->voucher_type->cellAttributes() ?>>
<span id="el_pharmacy_payment_voucher_type">
<span<?php echo $pharmacy_payment_view->voucher_type->viewAttributes() ?>><?php echo $pharmacy_payment_view->voucher_type->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment_view->Details->Visible) { // Details ?>
	<tr id="r_Details">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_Details"><?php echo $pharmacy_payment_view->Details->caption() ?></span></td>
		<td data-name="Details" <?php echo $pharmacy_payment_view->Details->cellAttributes() ?>>
<span id="el_pharmacy_payment_Details">
<span<?php echo $pharmacy_payment_view->Details->viewAttributes() ?>><?php echo $pharmacy_payment_view->Details->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment_view->ModeofPayment->Visible) { // ModeofPayment ?>
	<tr id="r_ModeofPayment">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_ModeofPayment"><?php echo $pharmacy_payment_view->ModeofPayment->caption() ?></span></td>
		<td data-name="ModeofPayment" <?php echo $pharmacy_payment_view->ModeofPayment->cellAttributes() ?>>
<span id="el_pharmacy_payment_ModeofPayment">
<span<?php echo $pharmacy_payment_view->ModeofPayment->viewAttributes() ?>><?php echo $pharmacy_payment_view->ModeofPayment->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment_view->Amount->Visible) { // Amount ?>
	<tr id="r_Amount">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_Amount"><?php echo $pharmacy_payment_view->Amount->caption() ?></span></td>
		<td data-name="Amount" <?php echo $pharmacy_payment_view->Amount->cellAttributes() ?>>
<span id="el_pharmacy_payment_Amount">
<span<?php echo $pharmacy_payment_view->Amount->viewAttributes() ?>><?php echo $pharmacy_payment_view->Amount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment_view->BankName->Visible) { // BankName ?>
	<tr id="r_BankName">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_BankName"><?php echo $pharmacy_payment_view->BankName->caption() ?></span></td>
		<td data-name="BankName" <?php echo $pharmacy_payment_view->BankName->cellAttributes() ?>>
<span id="el_pharmacy_payment_BankName">
<span<?php echo $pharmacy_payment_view->BankName->viewAttributes() ?>><?php echo $pharmacy_payment_view->BankName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment_view->AccountNumber->Visible) { // AccountNumber ?>
	<tr id="r_AccountNumber">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_AccountNumber"><?php echo $pharmacy_payment_view->AccountNumber->caption() ?></span></td>
		<td data-name="AccountNumber" <?php echo $pharmacy_payment_view->AccountNumber->cellAttributes() ?>>
<span id="el_pharmacy_payment_AccountNumber">
<span<?php echo $pharmacy_payment_view->AccountNumber->viewAttributes() ?>><?php echo $pharmacy_payment_view->AccountNumber->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment_view->chequeNumber->Visible) { // chequeNumber ?>
	<tr id="r_chequeNumber">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_chequeNumber"><?php echo $pharmacy_payment_view->chequeNumber->caption() ?></span></td>
		<td data-name="chequeNumber" <?php echo $pharmacy_payment_view->chequeNumber->cellAttributes() ?>>
<span id="el_pharmacy_payment_chequeNumber">
<span<?php echo $pharmacy_payment_view->chequeNumber->viewAttributes() ?>><?php echo $pharmacy_payment_view->chequeNumber->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment_view->Remarks->Visible) { // Remarks ?>
	<tr id="r_Remarks">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_Remarks"><?php echo $pharmacy_payment_view->Remarks->caption() ?></span></td>
		<td data-name="Remarks" <?php echo $pharmacy_payment_view->Remarks->cellAttributes() ?>>
<span id="el_pharmacy_payment_Remarks">
<span<?php echo $pharmacy_payment_view->Remarks->viewAttributes() ?>><?php echo $pharmacy_payment_view->Remarks->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment_view->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
	<tr id="r_SeectPaymentMode">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_SeectPaymentMode"><?php echo $pharmacy_payment_view->SeectPaymentMode->caption() ?></span></td>
		<td data-name="SeectPaymentMode" <?php echo $pharmacy_payment_view->SeectPaymentMode->cellAttributes() ?>>
<span id="el_pharmacy_payment_SeectPaymentMode">
<span<?php echo $pharmacy_payment_view->SeectPaymentMode->viewAttributes() ?>><?php echo $pharmacy_payment_view->SeectPaymentMode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment_view->PaidAmount->Visible) { // PaidAmount ?>
	<tr id="r_PaidAmount">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_PaidAmount"><?php echo $pharmacy_payment_view->PaidAmount->caption() ?></span></td>
		<td data-name="PaidAmount" <?php echo $pharmacy_payment_view->PaidAmount->cellAttributes() ?>>
<span id="el_pharmacy_payment_PaidAmount">
<span<?php echo $pharmacy_payment_view->PaidAmount->viewAttributes() ?>><?php echo $pharmacy_payment_view->PaidAmount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment_view->Currency->Visible) { // Currency ?>
	<tr id="r_Currency">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_Currency"><?php echo $pharmacy_payment_view->Currency->caption() ?></span></td>
		<td data-name="Currency" <?php echo $pharmacy_payment_view->Currency->cellAttributes() ?>>
<span id="el_pharmacy_payment_Currency">
<span<?php echo $pharmacy_payment_view->Currency->viewAttributes() ?>><?php echo $pharmacy_payment_view->Currency->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment_view->CardNumber->Visible) { // CardNumber ?>
	<tr id="r_CardNumber">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_CardNumber"><?php echo $pharmacy_payment_view->CardNumber->caption() ?></span></td>
		<td data-name="CardNumber" <?php echo $pharmacy_payment_view->CardNumber->cellAttributes() ?>>
<span id="el_pharmacy_payment_CardNumber">
<span<?php echo $pharmacy_payment_view->CardNumber->viewAttributes() ?>><?php echo $pharmacy_payment_view->CardNumber->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php
	if (in_array("pharmacy_grn", explode(",", $pharmacy_payment->getCurrentDetailTable())) && $pharmacy_grn->DetailView) {
?>
<?php if ($pharmacy_payment->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("pharmacy_grn", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "pharmacy_grngrid.php" ?>
<?php } ?>
</form>
<?php
$pharmacy_payment_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_payment_view->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$pharmacy_payment_view->terminate();
?>