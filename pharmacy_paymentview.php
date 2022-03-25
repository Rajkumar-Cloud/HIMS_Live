<?php
namespace PHPMaker2019\HIMS;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start(); 

// Autoload
include_once "autoload.php";
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
<?php include_once "header.php" ?>
<?php if (!$pharmacy_payment->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fpharmacy_paymentview = currentForm = new ew.Form("fpharmacy_paymentview", "view");

// Form_CustomValidate event
fpharmacy_paymentview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_paymentview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpharmacy_paymentview.lists["x_Customername"] = <?php echo $pharmacy_payment_view->Customername->Lookup->toClientList() ?>;
fpharmacy_paymentview.lists["x_Customername"].options = <?php echo JsonEncode($pharmacy_payment_view->Customername->lookupOptions()) ?>;
fpharmacy_paymentview.lists["x_pharmacy_pocol"] = <?php echo $pharmacy_payment_view->pharmacy_pocol->Lookup->toClientList() ?>;
fpharmacy_paymentview.lists["x_pharmacy_pocol"].options = <?php echo JsonEncode($pharmacy_payment_view->pharmacy_pocol->lookupOptions()) ?>;
fpharmacy_paymentview.lists["x_ModeofPayment"] = <?php echo $pharmacy_payment_view->ModeofPayment->Lookup->toClientList() ?>;
fpharmacy_paymentview.lists["x_ModeofPayment"].options = <?php echo JsonEncode($pharmacy_payment_view->ModeofPayment->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$pharmacy_payment->isExport()) { ?>
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
<?php if ($pharmacy_payment_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_payment_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_payment">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_payment_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($pharmacy_payment->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_id"><?php echo $pharmacy_payment->id->caption() ?></span></td>
		<td data-name="id"<?php echo $pharmacy_payment->id->cellAttributes() ?>>
<span id="el_pharmacy_payment_id">
<span<?php echo $pharmacy_payment->id->viewAttributes() ?>>
<?php echo $pharmacy_payment->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment->PAYNO->Visible) { // PAYNO ?>
	<tr id="r_PAYNO">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_PAYNO"><?php echo $pharmacy_payment->PAYNO->caption() ?></span></td>
		<td data-name="PAYNO"<?php echo $pharmacy_payment->PAYNO->cellAttributes() ?>>
<span id="el_pharmacy_payment_PAYNO">
<span<?php echo $pharmacy_payment->PAYNO->viewAttributes() ?>>
<?php echo $pharmacy_payment->PAYNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment->DT->Visible) { // DT ?>
	<tr id="r_DT">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_DT"><?php echo $pharmacy_payment->DT->caption() ?></span></td>
		<td data-name="DT"<?php echo $pharmacy_payment->DT->cellAttributes() ?>>
<span id="el_pharmacy_payment_DT">
<span<?php echo $pharmacy_payment->DT->viewAttributes() ?>>
<?php echo $pharmacy_payment->DT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment->YM->Visible) { // YM ?>
	<tr id="r_YM">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_YM"><?php echo $pharmacy_payment->YM->caption() ?></span></td>
		<td data-name="YM"<?php echo $pharmacy_payment->YM->cellAttributes() ?>>
<span id="el_pharmacy_payment_YM">
<span<?php echo $pharmacy_payment->YM->viewAttributes() ?>>
<?php echo $pharmacy_payment->YM->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment->PC->Visible) { // PC ?>
	<tr id="r_PC">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_PC"><?php echo $pharmacy_payment->PC->caption() ?></span></td>
		<td data-name="PC"<?php echo $pharmacy_payment->PC->cellAttributes() ?>>
<span id="el_pharmacy_payment_PC">
<span<?php echo $pharmacy_payment->PC->viewAttributes() ?>>
<?php echo $pharmacy_payment->PC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment->Customercode->Visible) { // Customercode ?>
	<tr id="r_Customercode">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_Customercode"><?php echo $pharmacy_payment->Customercode->caption() ?></span></td>
		<td data-name="Customercode"<?php echo $pharmacy_payment->Customercode->cellAttributes() ?>>
<span id="el_pharmacy_payment_Customercode">
<span<?php echo $pharmacy_payment->Customercode->viewAttributes() ?>>
<?php echo $pharmacy_payment->Customercode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment->Customername->Visible) { // Customername ?>
	<tr id="r_Customername">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_Customername"><?php echo $pharmacy_payment->Customername->caption() ?></span></td>
		<td data-name="Customername"<?php echo $pharmacy_payment->Customername->cellAttributes() ?>>
<span id="el_pharmacy_payment_Customername">
<span<?php echo $pharmacy_payment->Customername->viewAttributes() ?>>
<?php echo $pharmacy_payment->Customername->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment->pharmacy_pocol->Visible) { // pharmacy_pocol ?>
	<tr id="r_pharmacy_pocol">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_pharmacy_pocol"><?php echo $pharmacy_payment->pharmacy_pocol->caption() ?></span></td>
		<td data-name="pharmacy_pocol"<?php echo $pharmacy_payment->pharmacy_pocol->cellAttributes() ?>>
<span id="el_pharmacy_payment_pharmacy_pocol">
<span<?php echo $pharmacy_payment->pharmacy_pocol->viewAttributes() ?>>
<?php echo $pharmacy_payment->pharmacy_pocol->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment->Address1->Visible) { // Address1 ?>
	<tr id="r_Address1">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_Address1"><?php echo $pharmacy_payment->Address1->caption() ?></span></td>
		<td data-name="Address1"<?php echo $pharmacy_payment->Address1->cellAttributes() ?>>
<span id="el_pharmacy_payment_Address1">
<span<?php echo $pharmacy_payment->Address1->viewAttributes() ?>>
<?php echo $pharmacy_payment->Address1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment->Address2->Visible) { // Address2 ?>
	<tr id="r_Address2">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_Address2"><?php echo $pharmacy_payment->Address2->caption() ?></span></td>
		<td data-name="Address2"<?php echo $pharmacy_payment->Address2->cellAttributes() ?>>
<span id="el_pharmacy_payment_Address2">
<span<?php echo $pharmacy_payment->Address2->viewAttributes() ?>>
<?php echo $pharmacy_payment->Address2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment->Address3->Visible) { // Address3 ?>
	<tr id="r_Address3">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_Address3"><?php echo $pharmacy_payment->Address3->caption() ?></span></td>
		<td data-name="Address3"<?php echo $pharmacy_payment->Address3->cellAttributes() ?>>
<span id="el_pharmacy_payment_Address3">
<span<?php echo $pharmacy_payment->Address3->viewAttributes() ?>>
<?php echo $pharmacy_payment->Address3->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment->State->Visible) { // State ?>
	<tr id="r_State">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_State"><?php echo $pharmacy_payment->State->caption() ?></span></td>
		<td data-name="State"<?php echo $pharmacy_payment->State->cellAttributes() ?>>
<span id="el_pharmacy_payment_State">
<span<?php echo $pharmacy_payment->State->viewAttributes() ?>>
<?php echo $pharmacy_payment->State->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment->Pincode->Visible) { // Pincode ?>
	<tr id="r_Pincode">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_Pincode"><?php echo $pharmacy_payment->Pincode->caption() ?></span></td>
		<td data-name="Pincode"<?php echo $pharmacy_payment->Pincode->cellAttributes() ?>>
<span id="el_pharmacy_payment_Pincode">
<span<?php echo $pharmacy_payment->Pincode->viewAttributes() ?>>
<?php echo $pharmacy_payment->Pincode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment->Phone->Visible) { // Phone ?>
	<tr id="r_Phone">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_Phone"><?php echo $pharmacy_payment->Phone->caption() ?></span></td>
		<td data-name="Phone"<?php echo $pharmacy_payment->Phone->cellAttributes() ?>>
<span id="el_pharmacy_payment_Phone">
<span<?php echo $pharmacy_payment->Phone->viewAttributes() ?>>
<?php echo $pharmacy_payment->Phone->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment->Fax->Visible) { // Fax ?>
	<tr id="r_Fax">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_Fax"><?php echo $pharmacy_payment->Fax->caption() ?></span></td>
		<td data-name="Fax"<?php echo $pharmacy_payment->Fax->cellAttributes() ?>>
<span id="el_pharmacy_payment_Fax">
<span<?php echo $pharmacy_payment->Fax->viewAttributes() ?>>
<?php echo $pharmacy_payment->Fax->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment->EEmail->Visible) { // EEmail ?>
	<tr id="r_EEmail">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_EEmail"><?php echo $pharmacy_payment->EEmail->caption() ?></span></td>
		<td data-name="EEmail"<?php echo $pharmacy_payment->EEmail->cellAttributes() ?>>
<span id="el_pharmacy_payment_EEmail">
<span<?php echo $pharmacy_payment->EEmail->viewAttributes() ?>>
<?php echo $pharmacy_payment->EEmail->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_HospID"><?php echo $pharmacy_payment->HospID->caption() ?></span></td>
		<td data-name="HospID"<?php echo $pharmacy_payment->HospID->cellAttributes() ?>>
<span id="el_pharmacy_payment_HospID">
<span<?php echo $pharmacy_payment->HospID->viewAttributes() ?>>
<?php echo $pharmacy_payment->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_createdby"><?php echo $pharmacy_payment->createdby->caption() ?></span></td>
		<td data-name="createdby"<?php echo $pharmacy_payment->createdby->cellAttributes() ?>>
<span id="el_pharmacy_payment_createdby">
<span<?php echo $pharmacy_payment->createdby->viewAttributes() ?>>
<?php echo $pharmacy_payment->createdby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_createddatetime"><?php echo $pharmacy_payment->createddatetime->caption() ?></span></td>
		<td data-name="createddatetime"<?php echo $pharmacy_payment->createddatetime->cellAttributes() ?>>
<span id="el_pharmacy_payment_createddatetime">
<span<?php echo $pharmacy_payment->createddatetime->viewAttributes() ?>>
<?php echo $pharmacy_payment->createddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_modifiedby"><?php echo $pharmacy_payment->modifiedby->caption() ?></span></td>
		<td data-name="modifiedby"<?php echo $pharmacy_payment->modifiedby->cellAttributes() ?>>
<span id="el_pharmacy_payment_modifiedby">
<span<?php echo $pharmacy_payment->modifiedby->viewAttributes() ?>>
<?php echo $pharmacy_payment->modifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_modifieddatetime"><?php echo $pharmacy_payment->modifieddatetime->caption() ?></span></td>
		<td data-name="modifieddatetime"<?php echo $pharmacy_payment->modifieddatetime->cellAttributes() ?>>
<span id="el_pharmacy_payment_modifieddatetime">
<span<?php echo $pharmacy_payment->modifieddatetime->viewAttributes() ?>>
<?php echo $pharmacy_payment->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment->PharmacyID->Visible) { // PharmacyID ?>
	<tr id="r_PharmacyID">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_PharmacyID"><?php echo $pharmacy_payment->PharmacyID->caption() ?></span></td>
		<td data-name="PharmacyID"<?php echo $pharmacy_payment->PharmacyID->cellAttributes() ?>>
<span id="el_pharmacy_payment_PharmacyID">
<span<?php echo $pharmacy_payment->PharmacyID->viewAttributes() ?>>
<?php echo $pharmacy_payment->PharmacyID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment->BillTotalValue->Visible) { // BillTotalValue ?>
	<tr id="r_BillTotalValue">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_BillTotalValue"><?php echo $pharmacy_payment->BillTotalValue->caption() ?></span></td>
		<td data-name="BillTotalValue"<?php echo $pharmacy_payment->BillTotalValue->cellAttributes() ?>>
<span id="el_pharmacy_payment_BillTotalValue">
<span<?php echo $pharmacy_payment->BillTotalValue->viewAttributes() ?>>
<?php echo $pharmacy_payment->BillTotalValue->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment->GRNTotalValue->Visible) { // GRNTotalValue ?>
	<tr id="r_GRNTotalValue">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_GRNTotalValue"><?php echo $pharmacy_payment->GRNTotalValue->caption() ?></span></td>
		<td data-name="GRNTotalValue"<?php echo $pharmacy_payment->GRNTotalValue->cellAttributes() ?>>
<span id="el_pharmacy_payment_GRNTotalValue">
<span<?php echo $pharmacy_payment->GRNTotalValue->viewAttributes() ?>>
<?php echo $pharmacy_payment->GRNTotalValue->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment->BillDiscount->Visible) { // BillDiscount ?>
	<tr id="r_BillDiscount">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_BillDiscount"><?php echo $pharmacy_payment->BillDiscount->caption() ?></span></td>
		<td data-name="BillDiscount"<?php echo $pharmacy_payment->BillDiscount->cellAttributes() ?>>
<span id="el_pharmacy_payment_BillDiscount">
<span<?php echo $pharmacy_payment->BillDiscount->viewAttributes() ?>>
<?php echo $pharmacy_payment->BillDiscount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment->BillUpload->Visible) { // BillUpload ?>
	<tr id="r_BillUpload">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_BillUpload"><?php echo $pharmacy_payment->BillUpload->caption() ?></span></td>
		<td data-name="BillUpload"<?php echo $pharmacy_payment->BillUpload->cellAttributes() ?>>
<span id="el_pharmacy_payment_BillUpload">
<span<?php echo $pharmacy_payment->BillUpload->viewAttributes() ?>>
<?php echo $pharmacy_payment->BillUpload->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment->TransPort->Visible) { // TransPort ?>
	<tr id="r_TransPort">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_TransPort"><?php echo $pharmacy_payment->TransPort->caption() ?></span></td>
		<td data-name="TransPort"<?php echo $pharmacy_payment->TransPort->cellAttributes() ?>>
<span id="el_pharmacy_payment_TransPort">
<span<?php echo $pharmacy_payment->TransPort->viewAttributes() ?>>
<?php echo $pharmacy_payment->TransPort->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment->AnyOther->Visible) { // AnyOther ?>
	<tr id="r_AnyOther">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_AnyOther"><?php echo $pharmacy_payment->AnyOther->caption() ?></span></td>
		<td data-name="AnyOther"<?php echo $pharmacy_payment->AnyOther->cellAttributes() ?>>
<span id="el_pharmacy_payment_AnyOther">
<span<?php echo $pharmacy_payment->AnyOther->viewAttributes() ?>>
<?php echo $pharmacy_payment->AnyOther->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment->voucher_type->Visible) { // voucher_type ?>
	<tr id="r_voucher_type">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_voucher_type"><?php echo $pharmacy_payment->voucher_type->caption() ?></span></td>
		<td data-name="voucher_type"<?php echo $pharmacy_payment->voucher_type->cellAttributes() ?>>
<span id="el_pharmacy_payment_voucher_type">
<span<?php echo $pharmacy_payment->voucher_type->viewAttributes() ?>>
<?php echo $pharmacy_payment->voucher_type->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment->Details->Visible) { // Details ?>
	<tr id="r_Details">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_Details"><?php echo $pharmacy_payment->Details->caption() ?></span></td>
		<td data-name="Details"<?php echo $pharmacy_payment->Details->cellAttributes() ?>>
<span id="el_pharmacy_payment_Details">
<span<?php echo $pharmacy_payment->Details->viewAttributes() ?>>
<?php echo $pharmacy_payment->Details->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment->ModeofPayment->Visible) { // ModeofPayment ?>
	<tr id="r_ModeofPayment">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_ModeofPayment"><?php echo $pharmacy_payment->ModeofPayment->caption() ?></span></td>
		<td data-name="ModeofPayment"<?php echo $pharmacy_payment->ModeofPayment->cellAttributes() ?>>
<span id="el_pharmacy_payment_ModeofPayment">
<span<?php echo $pharmacy_payment->ModeofPayment->viewAttributes() ?>>
<?php echo $pharmacy_payment->ModeofPayment->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment->Amount->Visible) { // Amount ?>
	<tr id="r_Amount">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_Amount"><?php echo $pharmacy_payment->Amount->caption() ?></span></td>
		<td data-name="Amount"<?php echo $pharmacy_payment->Amount->cellAttributes() ?>>
<span id="el_pharmacy_payment_Amount">
<span<?php echo $pharmacy_payment->Amount->viewAttributes() ?>>
<?php echo $pharmacy_payment->Amount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment->BankName->Visible) { // BankName ?>
	<tr id="r_BankName">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_BankName"><?php echo $pharmacy_payment->BankName->caption() ?></span></td>
		<td data-name="BankName"<?php echo $pharmacy_payment->BankName->cellAttributes() ?>>
<span id="el_pharmacy_payment_BankName">
<span<?php echo $pharmacy_payment->BankName->viewAttributes() ?>>
<?php echo $pharmacy_payment->BankName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment->AccountNumber->Visible) { // AccountNumber ?>
	<tr id="r_AccountNumber">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_AccountNumber"><?php echo $pharmacy_payment->AccountNumber->caption() ?></span></td>
		<td data-name="AccountNumber"<?php echo $pharmacy_payment->AccountNumber->cellAttributes() ?>>
<span id="el_pharmacy_payment_AccountNumber">
<span<?php echo $pharmacy_payment->AccountNumber->viewAttributes() ?>>
<?php echo $pharmacy_payment->AccountNumber->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment->chequeNumber->Visible) { // chequeNumber ?>
	<tr id="r_chequeNumber">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_chequeNumber"><?php echo $pharmacy_payment->chequeNumber->caption() ?></span></td>
		<td data-name="chequeNumber"<?php echo $pharmacy_payment->chequeNumber->cellAttributes() ?>>
<span id="el_pharmacy_payment_chequeNumber">
<span<?php echo $pharmacy_payment->chequeNumber->viewAttributes() ?>>
<?php echo $pharmacy_payment->chequeNumber->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment->Remarks->Visible) { // Remarks ?>
	<tr id="r_Remarks">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_Remarks"><?php echo $pharmacy_payment->Remarks->caption() ?></span></td>
		<td data-name="Remarks"<?php echo $pharmacy_payment->Remarks->cellAttributes() ?>>
<span id="el_pharmacy_payment_Remarks">
<span<?php echo $pharmacy_payment->Remarks->viewAttributes() ?>>
<?php echo $pharmacy_payment->Remarks->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
	<tr id="r_SeectPaymentMode">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_SeectPaymentMode"><?php echo $pharmacy_payment->SeectPaymentMode->caption() ?></span></td>
		<td data-name="SeectPaymentMode"<?php echo $pharmacy_payment->SeectPaymentMode->cellAttributes() ?>>
<span id="el_pharmacy_payment_SeectPaymentMode">
<span<?php echo $pharmacy_payment->SeectPaymentMode->viewAttributes() ?>>
<?php echo $pharmacy_payment->SeectPaymentMode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment->PaidAmount->Visible) { // PaidAmount ?>
	<tr id="r_PaidAmount">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_PaidAmount"><?php echo $pharmacy_payment->PaidAmount->caption() ?></span></td>
		<td data-name="PaidAmount"<?php echo $pharmacy_payment->PaidAmount->cellAttributes() ?>>
<span id="el_pharmacy_payment_PaidAmount">
<span<?php echo $pharmacy_payment->PaidAmount->viewAttributes() ?>>
<?php echo $pharmacy_payment->PaidAmount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment->Currency->Visible) { // Currency ?>
	<tr id="r_Currency">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_Currency"><?php echo $pharmacy_payment->Currency->caption() ?></span></td>
		<td data-name="Currency"<?php echo $pharmacy_payment->Currency->cellAttributes() ?>>
<span id="el_pharmacy_payment_Currency">
<span<?php echo $pharmacy_payment->Currency->viewAttributes() ?>>
<?php echo $pharmacy_payment->Currency->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_payment->CardNumber->Visible) { // CardNumber ?>
	<tr id="r_CardNumber">
		<td class="<?php echo $pharmacy_payment_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_payment_CardNumber"><?php echo $pharmacy_payment->CardNumber->caption() ?></span></td>
		<td data-name="CardNumber"<?php echo $pharmacy_payment->CardNumber->cellAttributes() ?>>
<span id="el_pharmacy_payment_CardNumber">
<span<?php echo $pharmacy_payment->CardNumber->viewAttributes() ?>>
<?php echo $pharmacy_payment->CardNumber->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php
	if (in_array("pharmacy_grn", explode(",", $pharmacy_payment->getCurrentDetailTable())) && $pharmacy_grn->DetailView) {
?>
<?php if ($pharmacy_payment->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("pharmacy_grn", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "pharmacy_grngrid.php" ?>
<?php } ?>
</form>
<?php
$pharmacy_payment_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_payment->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$pharmacy_payment_view->terminate();
?>