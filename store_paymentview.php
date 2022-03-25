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
$store_payment_view = new store_payment_view();

// Run the page
$store_payment_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$store_payment_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$store_payment->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fstore_paymentview = currentForm = new ew.Form("fstore_paymentview", "view");

// Form_CustomValidate event
fstore_paymentview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fstore_paymentview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fstore_paymentview.lists["x_Customername[]"] = <?php echo $store_payment_view->Customername->Lookup->toClientList() ?>;
fstore_paymentview.lists["x_Customername[]"].options = <?php echo JsonEncode($store_payment_view->Customername->lookupOptions()) ?>;
fstore_paymentview.lists["x_pharmacy_pocol"] = <?php echo $store_payment_view->pharmacy_pocol->Lookup->toClientList() ?>;
fstore_paymentview.lists["x_pharmacy_pocol"].options = <?php echo JsonEncode($store_payment_view->pharmacy_pocol->lookupOptions()) ?>;
fstore_paymentview.lists["x_ModeofPayment"] = <?php echo $store_payment_view->ModeofPayment->Lookup->toClientList() ?>;
fstore_paymentview.lists["x_ModeofPayment"].options = <?php echo JsonEncode($store_payment_view->ModeofPayment->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$store_payment->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $store_payment_view->ExportOptions->render("body") ?>
<?php $store_payment_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $store_payment_view->showPageHeader(); ?>
<?php
$store_payment_view->showMessage();
?>
<form name="fstore_paymentview" id="fstore_paymentview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($store_payment_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $store_payment_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="store_payment">
<input type="hidden" name="modal" value="<?php echo (int)$store_payment_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($store_payment->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $store_payment_view->TableLeftColumnClass ?>"><span id="elh_store_payment_id"><?php echo $store_payment->id->caption() ?></span></td>
		<td data-name="id"<?php echo $store_payment->id->cellAttributes() ?>>
<span id="el_store_payment_id">
<span<?php echo $store_payment->id->viewAttributes() ?>>
<?php echo $store_payment->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_payment->PAYNO->Visible) { // PAYNO ?>
	<tr id="r_PAYNO">
		<td class="<?php echo $store_payment_view->TableLeftColumnClass ?>"><span id="elh_store_payment_PAYNO"><?php echo $store_payment->PAYNO->caption() ?></span></td>
		<td data-name="PAYNO"<?php echo $store_payment->PAYNO->cellAttributes() ?>>
<span id="el_store_payment_PAYNO">
<span<?php echo $store_payment->PAYNO->viewAttributes() ?>>
<?php echo $store_payment->PAYNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_payment->DT->Visible) { // DT ?>
	<tr id="r_DT">
		<td class="<?php echo $store_payment_view->TableLeftColumnClass ?>"><span id="elh_store_payment_DT"><?php echo $store_payment->DT->caption() ?></span></td>
		<td data-name="DT"<?php echo $store_payment->DT->cellAttributes() ?>>
<span id="el_store_payment_DT">
<span<?php echo $store_payment->DT->viewAttributes() ?>>
<?php echo $store_payment->DT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_payment->YM->Visible) { // YM ?>
	<tr id="r_YM">
		<td class="<?php echo $store_payment_view->TableLeftColumnClass ?>"><span id="elh_store_payment_YM"><?php echo $store_payment->YM->caption() ?></span></td>
		<td data-name="YM"<?php echo $store_payment->YM->cellAttributes() ?>>
<span id="el_store_payment_YM">
<span<?php echo $store_payment->YM->viewAttributes() ?>>
<?php echo $store_payment->YM->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_payment->PC->Visible) { // PC ?>
	<tr id="r_PC">
		<td class="<?php echo $store_payment_view->TableLeftColumnClass ?>"><span id="elh_store_payment_PC"><?php echo $store_payment->PC->caption() ?></span></td>
		<td data-name="PC"<?php echo $store_payment->PC->cellAttributes() ?>>
<span id="el_store_payment_PC">
<span<?php echo $store_payment->PC->viewAttributes() ?>>
<?php echo $store_payment->PC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_payment->Customercode->Visible) { // Customercode ?>
	<tr id="r_Customercode">
		<td class="<?php echo $store_payment_view->TableLeftColumnClass ?>"><span id="elh_store_payment_Customercode"><?php echo $store_payment->Customercode->caption() ?></span></td>
		<td data-name="Customercode"<?php echo $store_payment->Customercode->cellAttributes() ?>>
<span id="el_store_payment_Customercode">
<span<?php echo $store_payment->Customercode->viewAttributes() ?>>
<?php echo $store_payment->Customercode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_payment->Customername->Visible) { // Customername ?>
	<tr id="r_Customername">
		<td class="<?php echo $store_payment_view->TableLeftColumnClass ?>"><span id="elh_store_payment_Customername"><?php echo $store_payment->Customername->caption() ?></span></td>
		<td data-name="Customername"<?php echo $store_payment->Customername->cellAttributes() ?>>
<span id="el_store_payment_Customername">
<span<?php echo $store_payment->Customername->viewAttributes() ?>>
<?php echo $store_payment->Customername->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_payment->pharmacy_pocol->Visible) { // pharmacy_pocol ?>
	<tr id="r_pharmacy_pocol">
		<td class="<?php echo $store_payment_view->TableLeftColumnClass ?>"><span id="elh_store_payment_pharmacy_pocol"><?php echo $store_payment->pharmacy_pocol->caption() ?></span></td>
		<td data-name="pharmacy_pocol"<?php echo $store_payment->pharmacy_pocol->cellAttributes() ?>>
<span id="el_store_payment_pharmacy_pocol">
<span<?php echo $store_payment->pharmacy_pocol->viewAttributes() ?>>
<?php echo $store_payment->pharmacy_pocol->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_payment->Address1->Visible) { // Address1 ?>
	<tr id="r_Address1">
		<td class="<?php echo $store_payment_view->TableLeftColumnClass ?>"><span id="elh_store_payment_Address1"><?php echo $store_payment->Address1->caption() ?></span></td>
		<td data-name="Address1"<?php echo $store_payment->Address1->cellAttributes() ?>>
<span id="el_store_payment_Address1">
<span<?php echo $store_payment->Address1->viewAttributes() ?>>
<?php echo $store_payment->Address1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_payment->Address2->Visible) { // Address2 ?>
	<tr id="r_Address2">
		<td class="<?php echo $store_payment_view->TableLeftColumnClass ?>"><span id="elh_store_payment_Address2"><?php echo $store_payment->Address2->caption() ?></span></td>
		<td data-name="Address2"<?php echo $store_payment->Address2->cellAttributes() ?>>
<span id="el_store_payment_Address2">
<span<?php echo $store_payment->Address2->viewAttributes() ?>>
<?php echo $store_payment->Address2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_payment->Address3->Visible) { // Address3 ?>
	<tr id="r_Address3">
		<td class="<?php echo $store_payment_view->TableLeftColumnClass ?>"><span id="elh_store_payment_Address3"><?php echo $store_payment->Address3->caption() ?></span></td>
		<td data-name="Address3"<?php echo $store_payment->Address3->cellAttributes() ?>>
<span id="el_store_payment_Address3">
<span<?php echo $store_payment->Address3->viewAttributes() ?>>
<?php echo $store_payment->Address3->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_payment->State->Visible) { // State ?>
	<tr id="r_State">
		<td class="<?php echo $store_payment_view->TableLeftColumnClass ?>"><span id="elh_store_payment_State"><?php echo $store_payment->State->caption() ?></span></td>
		<td data-name="State"<?php echo $store_payment->State->cellAttributes() ?>>
<span id="el_store_payment_State">
<span<?php echo $store_payment->State->viewAttributes() ?>>
<?php echo $store_payment->State->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_payment->Pincode->Visible) { // Pincode ?>
	<tr id="r_Pincode">
		<td class="<?php echo $store_payment_view->TableLeftColumnClass ?>"><span id="elh_store_payment_Pincode"><?php echo $store_payment->Pincode->caption() ?></span></td>
		<td data-name="Pincode"<?php echo $store_payment->Pincode->cellAttributes() ?>>
<span id="el_store_payment_Pincode">
<span<?php echo $store_payment->Pincode->viewAttributes() ?>>
<?php echo $store_payment->Pincode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_payment->Phone->Visible) { // Phone ?>
	<tr id="r_Phone">
		<td class="<?php echo $store_payment_view->TableLeftColumnClass ?>"><span id="elh_store_payment_Phone"><?php echo $store_payment->Phone->caption() ?></span></td>
		<td data-name="Phone"<?php echo $store_payment->Phone->cellAttributes() ?>>
<span id="el_store_payment_Phone">
<span<?php echo $store_payment->Phone->viewAttributes() ?>>
<?php echo $store_payment->Phone->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_payment->Fax->Visible) { // Fax ?>
	<tr id="r_Fax">
		<td class="<?php echo $store_payment_view->TableLeftColumnClass ?>"><span id="elh_store_payment_Fax"><?php echo $store_payment->Fax->caption() ?></span></td>
		<td data-name="Fax"<?php echo $store_payment->Fax->cellAttributes() ?>>
<span id="el_store_payment_Fax">
<span<?php echo $store_payment->Fax->viewAttributes() ?>>
<?php echo $store_payment->Fax->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_payment->EEmail->Visible) { // EEmail ?>
	<tr id="r_EEmail">
		<td class="<?php echo $store_payment_view->TableLeftColumnClass ?>"><span id="elh_store_payment_EEmail"><?php echo $store_payment->EEmail->caption() ?></span></td>
		<td data-name="EEmail"<?php echo $store_payment->EEmail->cellAttributes() ?>>
<span id="el_store_payment_EEmail">
<span<?php echo $store_payment->EEmail->viewAttributes() ?>>
<?php echo $store_payment->EEmail->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_payment->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $store_payment_view->TableLeftColumnClass ?>"><span id="elh_store_payment_HospID"><?php echo $store_payment->HospID->caption() ?></span></td>
		<td data-name="HospID"<?php echo $store_payment->HospID->cellAttributes() ?>>
<span id="el_store_payment_HospID">
<span<?php echo $store_payment->HospID->viewAttributes() ?>>
<?php echo $store_payment->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_payment->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $store_payment_view->TableLeftColumnClass ?>"><span id="elh_store_payment_createdby"><?php echo $store_payment->createdby->caption() ?></span></td>
		<td data-name="createdby"<?php echo $store_payment->createdby->cellAttributes() ?>>
<span id="el_store_payment_createdby">
<span<?php echo $store_payment->createdby->viewAttributes() ?>>
<?php echo $store_payment->createdby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_payment->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $store_payment_view->TableLeftColumnClass ?>"><span id="elh_store_payment_createddatetime"><?php echo $store_payment->createddatetime->caption() ?></span></td>
		<td data-name="createddatetime"<?php echo $store_payment->createddatetime->cellAttributes() ?>>
<span id="el_store_payment_createddatetime">
<span<?php echo $store_payment->createddatetime->viewAttributes() ?>>
<?php echo $store_payment->createddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_payment->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $store_payment_view->TableLeftColumnClass ?>"><span id="elh_store_payment_modifiedby"><?php echo $store_payment->modifiedby->caption() ?></span></td>
		<td data-name="modifiedby"<?php echo $store_payment->modifiedby->cellAttributes() ?>>
<span id="el_store_payment_modifiedby">
<span<?php echo $store_payment->modifiedby->viewAttributes() ?>>
<?php echo $store_payment->modifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_payment->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $store_payment_view->TableLeftColumnClass ?>"><span id="elh_store_payment_modifieddatetime"><?php echo $store_payment->modifieddatetime->caption() ?></span></td>
		<td data-name="modifieddatetime"<?php echo $store_payment->modifieddatetime->cellAttributes() ?>>
<span id="el_store_payment_modifieddatetime">
<span<?php echo $store_payment->modifieddatetime->viewAttributes() ?>>
<?php echo $store_payment->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_payment->PharmacyID->Visible) { // PharmacyID ?>
	<tr id="r_PharmacyID">
		<td class="<?php echo $store_payment_view->TableLeftColumnClass ?>"><span id="elh_store_payment_PharmacyID"><?php echo $store_payment->PharmacyID->caption() ?></span></td>
		<td data-name="PharmacyID"<?php echo $store_payment->PharmacyID->cellAttributes() ?>>
<span id="el_store_payment_PharmacyID">
<span<?php echo $store_payment->PharmacyID->viewAttributes() ?>>
<?php echo $store_payment->PharmacyID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_payment->BillTotalValue->Visible) { // BillTotalValue ?>
	<tr id="r_BillTotalValue">
		<td class="<?php echo $store_payment_view->TableLeftColumnClass ?>"><span id="elh_store_payment_BillTotalValue"><?php echo $store_payment->BillTotalValue->caption() ?></span></td>
		<td data-name="BillTotalValue"<?php echo $store_payment->BillTotalValue->cellAttributes() ?>>
<span id="el_store_payment_BillTotalValue">
<span<?php echo $store_payment->BillTotalValue->viewAttributes() ?>>
<?php echo $store_payment->BillTotalValue->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_payment->GRNTotalValue->Visible) { // GRNTotalValue ?>
	<tr id="r_GRNTotalValue">
		<td class="<?php echo $store_payment_view->TableLeftColumnClass ?>"><span id="elh_store_payment_GRNTotalValue"><?php echo $store_payment->GRNTotalValue->caption() ?></span></td>
		<td data-name="GRNTotalValue"<?php echo $store_payment->GRNTotalValue->cellAttributes() ?>>
<span id="el_store_payment_GRNTotalValue">
<span<?php echo $store_payment->GRNTotalValue->viewAttributes() ?>>
<?php echo $store_payment->GRNTotalValue->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_payment->BillDiscount->Visible) { // BillDiscount ?>
	<tr id="r_BillDiscount">
		<td class="<?php echo $store_payment_view->TableLeftColumnClass ?>"><span id="elh_store_payment_BillDiscount"><?php echo $store_payment->BillDiscount->caption() ?></span></td>
		<td data-name="BillDiscount"<?php echo $store_payment->BillDiscount->cellAttributes() ?>>
<span id="el_store_payment_BillDiscount">
<span<?php echo $store_payment->BillDiscount->viewAttributes() ?>>
<?php echo $store_payment->BillDiscount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_payment->BillUpload->Visible) { // BillUpload ?>
	<tr id="r_BillUpload">
		<td class="<?php echo $store_payment_view->TableLeftColumnClass ?>"><span id="elh_store_payment_BillUpload"><?php echo $store_payment->BillUpload->caption() ?></span></td>
		<td data-name="BillUpload"<?php echo $store_payment->BillUpload->cellAttributes() ?>>
<span id="el_store_payment_BillUpload">
<span<?php echo $store_payment->BillUpload->viewAttributes() ?>>
<?php echo $store_payment->BillUpload->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_payment->TransPort->Visible) { // TransPort ?>
	<tr id="r_TransPort">
		<td class="<?php echo $store_payment_view->TableLeftColumnClass ?>"><span id="elh_store_payment_TransPort"><?php echo $store_payment->TransPort->caption() ?></span></td>
		<td data-name="TransPort"<?php echo $store_payment->TransPort->cellAttributes() ?>>
<span id="el_store_payment_TransPort">
<span<?php echo $store_payment->TransPort->viewAttributes() ?>>
<?php echo $store_payment->TransPort->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_payment->AnyOther->Visible) { // AnyOther ?>
	<tr id="r_AnyOther">
		<td class="<?php echo $store_payment_view->TableLeftColumnClass ?>"><span id="elh_store_payment_AnyOther"><?php echo $store_payment->AnyOther->caption() ?></span></td>
		<td data-name="AnyOther"<?php echo $store_payment->AnyOther->cellAttributes() ?>>
<span id="el_store_payment_AnyOther">
<span<?php echo $store_payment->AnyOther->viewAttributes() ?>>
<?php echo $store_payment->AnyOther->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_payment->voucher_type->Visible) { // voucher_type ?>
	<tr id="r_voucher_type">
		<td class="<?php echo $store_payment_view->TableLeftColumnClass ?>"><span id="elh_store_payment_voucher_type"><?php echo $store_payment->voucher_type->caption() ?></span></td>
		<td data-name="voucher_type"<?php echo $store_payment->voucher_type->cellAttributes() ?>>
<span id="el_store_payment_voucher_type">
<span<?php echo $store_payment->voucher_type->viewAttributes() ?>>
<?php echo $store_payment->voucher_type->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_payment->Details->Visible) { // Details ?>
	<tr id="r_Details">
		<td class="<?php echo $store_payment_view->TableLeftColumnClass ?>"><span id="elh_store_payment_Details"><?php echo $store_payment->Details->caption() ?></span></td>
		<td data-name="Details"<?php echo $store_payment->Details->cellAttributes() ?>>
<span id="el_store_payment_Details">
<span<?php echo $store_payment->Details->viewAttributes() ?>>
<?php echo $store_payment->Details->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_payment->ModeofPayment->Visible) { // ModeofPayment ?>
	<tr id="r_ModeofPayment">
		<td class="<?php echo $store_payment_view->TableLeftColumnClass ?>"><span id="elh_store_payment_ModeofPayment"><?php echo $store_payment->ModeofPayment->caption() ?></span></td>
		<td data-name="ModeofPayment"<?php echo $store_payment->ModeofPayment->cellAttributes() ?>>
<span id="el_store_payment_ModeofPayment">
<span<?php echo $store_payment->ModeofPayment->viewAttributes() ?>>
<?php echo $store_payment->ModeofPayment->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_payment->Amount->Visible) { // Amount ?>
	<tr id="r_Amount">
		<td class="<?php echo $store_payment_view->TableLeftColumnClass ?>"><span id="elh_store_payment_Amount"><?php echo $store_payment->Amount->caption() ?></span></td>
		<td data-name="Amount"<?php echo $store_payment->Amount->cellAttributes() ?>>
<span id="el_store_payment_Amount">
<span<?php echo $store_payment->Amount->viewAttributes() ?>>
<?php echo $store_payment->Amount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_payment->BankName->Visible) { // BankName ?>
	<tr id="r_BankName">
		<td class="<?php echo $store_payment_view->TableLeftColumnClass ?>"><span id="elh_store_payment_BankName"><?php echo $store_payment->BankName->caption() ?></span></td>
		<td data-name="BankName"<?php echo $store_payment->BankName->cellAttributes() ?>>
<span id="el_store_payment_BankName">
<span<?php echo $store_payment->BankName->viewAttributes() ?>>
<?php echo $store_payment->BankName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_payment->AccountNumber->Visible) { // AccountNumber ?>
	<tr id="r_AccountNumber">
		<td class="<?php echo $store_payment_view->TableLeftColumnClass ?>"><span id="elh_store_payment_AccountNumber"><?php echo $store_payment->AccountNumber->caption() ?></span></td>
		<td data-name="AccountNumber"<?php echo $store_payment->AccountNumber->cellAttributes() ?>>
<span id="el_store_payment_AccountNumber">
<span<?php echo $store_payment->AccountNumber->viewAttributes() ?>>
<?php echo $store_payment->AccountNumber->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_payment->chequeNumber->Visible) { // chequeNumber ?>
	<tr id="r_chequeNumber">
		<td class="<?php echo $store_payment_view->TableLeftColumnClass ?>"><span id="elh_store_payment_chequeNumber"><?php echo $store_payment->chequeNumber->caption() ?></span></td>
		<td data-name="chequeNumber"<?php echo $store_payment->chequeNumber->cellAttributes() ?>>
<span id="el_store_payment_chequeNumber">
<span<?php echo $store_payment->chequeNumber->viewAttributes() ?>>
<?php echo $store_payment->chequeNumber->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_payment->Remarks->Visible) { // Remarks ?>
	<tr id="r_Remarks">
		<td class="<?php echo $store_payment_view->TableLeftColumnClass ?>"><span id="elh_store_payment_Remarks"><?php echo $store_payment->Remarks->caption() ?></span></td>
		<td data-name="Remarks"<?php echo $store_payment->Remarks->cellAttributes() ?>>
<span id="el_store_payment_Remarks">
<span<?php echo $store_payment->Remarks->viewAttributes() ?>>
<?php echo $store_payment->Remarks->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_payment->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
	<tr id="r_SeectPaymentMode">
		<td class="<?php echo $store_payment_view->TableLeftColumnClass ?>"><span id="elh_store_payment_SeectPaymentMode"><?php echo $store_payment->SeectPaymentMode->caption() ?></span></td>
		<td data-name="SeectPaymentMode"<?php echo $store_payment->SeectPaymentMode->cellAttributes() ?>>
<span id="el_store_payment_SeectPaymentMode">
<span<?php echo $store_payment->SeectPaymentMode->viewAttributes() ?>>
<?php echo $store_payment->SeectPaymentMode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_payment->PaidAmount->Visible) { // PaidAmount ?>
	<tr id="r_PaidAmount">
		<td class="<?php echo $store_payment_view->TableLeftColumnClass ?>"><span id="elh_store_payment_PaidAmount"><?php echo $store_payment->PaidAmount->caption() ?></span></td>
		<td data-name="PaidAmount"<?php echo $store_payment->PaidAmount->cellAttributes() ?>>
<span id="el_store_payment_PaidAmount">
<span<?php echo $store_payment->PaidAmount->viewAttributes() ?>>
<?php echo $store_payment->PaidAmount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_payment->Currency->Visible) { // Currency ?>
	<tr id="r_Currency">
		<td class="<?php echo $store_payment_view->TableLeftColumnClass ?>"><span id="elh_store_payment_Currency"><?php echo $store_payment->Currency->caption() ?></span></td>
		<td data-name="Currency"<?php echo $store_payment->Currency->cellAttributes() ?>>
<span id="el_store_payment_Currency">
<span<?php echo $store_payment->Currency->viewAttributes() ?>>
<?php echo $store_payment->Currency->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_payment->CardNumber->Visible) { // CardNumber ?>
	<tr id="r_CardNumber">
		<td class="<?php echo $store_payment_view->TableLeftColumnClass ?>"><span id="elh_store_payment_CardNumber"><?php echo $store_payment->CardNumber->caption() ?></span></td>
		<td data-name="CardNumber"<?php echo $store_payment->CardNumber->cellAttributes() ?>>
<span id="el_store_payment_CardNumber">
<span<?php echo $store_payment->CardNumber->viewAttributes() ?>>
<?php echo $store_payment->CardNumber->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_payment->BranchID->Visible) { // BranchID ?>
	<tr id="r_BranchID">
		<td class="<?php echo $store_payment_view->TableLeftColumnClass ?>"><span id="elh_store_payment_BranchID"><?php echo $store_payment->BranchID->caption() ?></span></td>
		<td data-name="BranchID"<?php echo $store_payment->BranchID->cellAttributes() ?>>
<span id="el_store_payment_BranchID">
<span<?php echo $store_payment->BranchID->viewAttributes() ?>>
<?php echo $store_payment->BranchID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_payment->StoreID->Visible) { // StoreID ?>
	<tr id="r_StoreID">
		<td class="<?php echo $store_payment_view->TableLeftColumnClass ?>"><span id="elh_store_payment_StoreID"><?php echo $store_payment->StoreID->caption() ?></span></td>
		<td data-name="StoreID"<?php echo $store_payment->StoreID->cellAttributes() ?>>
<span id="el_store_payment_StoreID">
<span<?php echo $store_payment->StoreID->viewAttributes() ?>>
<?php echo $store_payment->StoreID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php
	if (in_array("store_grn", explode(",", $store_payment->getCurrentDetailTable())) && $store_grn->DetailView) {
?>
<?php if ($store_payment->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("store_grn", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "store_grngrid.php" ?>
<?php } ?>
</form>
<?php
$store_payment_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$store_payment->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$store_payment_view->terminate();
?>