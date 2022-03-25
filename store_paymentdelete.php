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
$store_payment_delete = new store_payment_delete();

// Run the page
$store_payment_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$store_payment_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fstore_paymentdelete = currentForm = new ew.Form("fstore_paymentdelete", "delete");

// Form_CustomValidate event
fstore_paymentdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fstore_paymentdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fstore_paymentdelete.lists["x_Customername[]"] = <?php echo $store_payment_delete->Customername->Lookup->toClientList() ?>;
fstore_paymentdelete.lists["x_Customername[]"].options = <?php echo JsonEncode($store_payment_delete->Customername->lookupOptions()) ?>;
fstore_paymentdelete.lists["x_pharmacy_pocol"] = <?php echo $store_payment_delete->pharmacy_pocol->Lookup->toClientList() ?>;
fstore_paymentdelete.lists["x_pharmacy_pocol"].options = <?php echo JsonEncode($store_payment_delete->pharmacy_pocol->lookupOptions()) ?>;
fstore_paymentdelete.lists["x_ModeofPayment"] = <?php echo $store_payment_delete->ModeofPayment->Lookup->toClientList() ?>;
fstore_paymentdelete.lists["x_ModeofPayment"].options = <?php echo JsonEncode($store_payment_delete->ModeofPayment->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $store_payment_delete->showPageHeader(); ?>
<?php
$store_payment_delete->showMessage();
?>
<form name="fstore_paymentdelete" id="fstore_paymentdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($store_payment_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $store_payment_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="store_payment">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($store_payment_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($store_payment->id->Visible) { // id ?>
		<th class="<?php echo $store_payment->id->headerCellClass() ?>"><span id="elh_store_payment_id" class="store_payment_id"><?php echo $store_payment->id->caption() ?></span></th>
<?php } ?>
<?php if ($store_payment->PAYNO->Visible) { // PAYNO ?>
		<th class="<?php echo $store_payment->PAYNO->headerCellClass() ?>"><span id="elh_store_payment_PAYNO" class="store_payment_PAYNO"><?php echo $store_payment->PAYNO->caption() ?></span></th>
<?php } ?>
<?php if ($store_payment->DT->Visible) { // DT ?>
		<th class="<?php echo $store_payment->DT->headerCellClass() ?>"><span id="elh_store_payment_DT" class="store_payment_DT"><?php echo $store_payment->DT->caption() ?></span></th>
<?php } ?>
<?php if ($store_payment->YM->Visible) { // YM ?>
		<th class="<?php echo $store_payment->YM->headerCellClass() ?>"><span id="elh_store_payment_YM" class="store_payment_YM"><?php echo $store_payment->YM->caption() ?></span></th>
<?php } ?>
<?php if ($store_payment->PC->Visible) { // PC ?>
		<th class="<?php echo $store_payment->PC->headerCellClass() ?>"><span id="elh_store_payment_PC" class="store_payment_PC"><?php echo $store_payment->PC->caption() ?></span></th>
<?php } ?>
<?php if ($store_payment->Customercode->Visible) { // Customercode ?>
		<th class="<?php echo $store_payment->Customercode->headerCellClass() ?>"><span id="elh_store_payment_Customercode" class="store_payment_Customercode"><?php echo $store_payment->Customercode->caption() ?></span></th>
<?php } ?>
<?php if ($store_payment->Customername->Visible) { // Customername ?>
		<th class="<?php echo $store_payment->Customername->headerCellClass() ?>"><span id="elh_store_payment_Customername" class="store_payment_Customername"><?php echo $store_payment->Customername->caption() ?></span></th>
<?php } ?>
<?php if ($store_payment->pharmacy_pocol->Visible) { // pharmacy_pocol ?>
		<th class="<?php echo $store_payment->pharmacy_pocol->headerCellClass() ?>"><span id="elh_store_payment_pharmacy_pocol" class="store_payment_pharmacy_pocol"><?php echo $store_payment->pharmacy_pocol->caption() ?></span></th>
<?php } ?>
<?php if ($store_payment->State->Visible) { // State ?>
		<th class="<?php echo $store_payment->State->headerCellClass() ?>"><span id="elh_store_payment_State" class="store_payment_State"><?php echo $store_payment->State->caption() ?></span></th>
<?php } ?>
<?php if ($store_payment->Pincode->Visible) { // Pincode ?>
		<th class="<?php echo $store_payment->Pincode->headerCellClass() ?>"><span id="elh_store_payment_Pincode" class="store_payment_Pincode"><?php echo $store_payment->Pincode->caption() ?></span></th>
<?php } ?>
<?php if ($store_payment->Phone->Visible) { // Phone ?>
		<th class="<?php echo $store_payment->Phone->headerCellClass() ?>"><span id="elh_store_payment_Phone" class="store_payment_Phone"><?php echo $store_payment->Phone->caption() ?></span></th>
<?php } ?>
<?php if ($store_payment->Fax->Visible) { // Fax ?>
		<th class="<?php echo $store_payment->Fax->headerCellClass() ?>"><span id="elh_store_payment_Fax" class="store_payment_Fax"><?php echo $store_payment->Fax->caption() ?></span></th>
<?php } ?>
<?php if ($store_payment->EEmail->Visible) { // EEmail ?>
		<th class="<?php echo $store_payment->EEmail->headerCellClass() ?>"><span id="elh_store_payment_EEmail" class="store_payment_EEmail"><?php echo $store_payment->EEmail->caption() ?></span></th>
<?php } ?>
<?php if ($store_payment->HospID->Visible) { // HospID ?>
		<th class="<?php echo $store_payment->HospID->headerCellClass() ?>"><span id="elh_store_payment_HospID" class="store_payment_HospID"><?php echo $store_payment->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($store_payment->createdby->Visible) { // createdby ?>
		<th class="<?php echo $store_payment->createdby->headerCellClass() ?>"><span id="elh_store_payment_createdby" class="store_payment_createdby"><?php echo $store_payment->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($store_payment->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $store_payment->createddatetime->headerCellClass() ?>"><span id="elh_store_payment_createddatetime" class="store_payment_createddatetime"><?php echo $store_payment->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($store_payment->modifiedby->Visible) { // modifiedby ?>
		<th class="<?php echo $store_payment->modifiedby->headerCellClass() ?>"><span id="elh_store_payment_modifiedby" class="store_payment_modifiedby"><?php echo $store_payment->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($store_payment->modifieddatetime->Visible) { // modifieddatetime ?>
		<th class="<?php echo $store_payment->modifieddatetime->headerCellClass() ?>"><span id="elh_store_payment_modifieddatetime" class="store_payment_modifieddatetime"><?php echo $store_payment->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($store_payment->PharmacyID->Visible) { // PharmacyID ?>
		<th class="<?php echo $store_payment->PharmacyID->headerCellClass() ?>"><span id="elh_store_payment_PharmacyID" class="store_payment_PharmacyID"><?php echo $store_payment->PharmacyID->caption() ?></span></th>
<?php } ?>
<?php if ($store_payment->BillTotalValue->Visible) { // BillTotalValue ?>
		<th class="<?php echo $store_payment->BillTotalValue->headerCellClass() ?>"><span id="elh_store_payment_BillTotalValue" class="store_payment_BillTotalValue"><?php echo $store_payment->BillTotalValue->caption() ?></span></th>
<?php } ?>
<?php if ($store_payment->GRNTotalValue->Visible) { // GRNTotalValue ?>
		<th class="<?php echo $store_payment->GRNTotalValue->headerCellClass() ?>"><span id="elh_store_payment_GRNTotalValue" class="store_payment_GRNTotalValue"><?php echo $store_payment->GRNTotalValue->caption() ?></span></th>
<?php } ?>
<?php if ($store_payment->BillDiscount->Visible) { // BillDiscount ?>
		<th class="<?php echo $store_payment->BillDiscount->headerCellClass() ?>"><span id="elh_store_payment_BillDiscount" class="store_payment_BillDiscount"><?php echo $store_payment->BillDiscount->caption() ?></span></th>
<?php } ?>
<?php if ($store_payment->TransPort->Visible) { // TransPort ?>
		<th class="<?php echo $store_payment->TransPort->headerCellClass() ?>"><span id="elh_store_payment_TransPort" class="store_payment_TransPort"><?php echo $store_payment->TransPort->caption() ?></span></th>
<?php } ?>
<?php if ($store_payment->AnyOther->Visible) { // AnyOther ?>
		<th class="<?php echo $store_payment->AnyOther->headerCellClass() ?>"><span id="elh_store_payment_AnyOther" class="store_payment_AnyOther"><?php echo $store_payment->AnyOther->caption() ?></span></th>
<?php } ?>
<?php if ($store_payment->voucher_type->Visible) { // voucher_type ?>
		<th class="<?php echo $store_payment->voucher_type->headerCellClass() ?>"><span id="elh_store_payment_voucher_type" class="store_payment_voucher_type"><?php echo $store_payment->voucher_type->caption() ?></span></th>
<?php } ?>
<?php if ($store_payment->Details->Visible) { // Details ?>
		<th class="<?php echo $store_payment->Details->headerCellClass() ?>"><span id="elh_store_payment_Details" class="store_payment_Details"><?php echo $store_payment->Details->caption() ?></span></th>
<?php } ?>
<?php if ($store_payment->ModeofPayment->Visible) { // ModeofPayment ?>
		<th class="<?php echo $store_payment->ModeofPayment->headerCellClass() ?>"><span id="elh_store_payment_ModeofPayment" class="store_payment_ModeofPayment"><?php echo $store_payment->ModeofPayment->caption() ?></span></th>
<?php } ?>
<?php if ($store_payment->Amount->Visible) { // Amount ?>
		<th class="<?php echo $store_payment->Amount->headerCellClass() ?>"><span id="elh_store_payment_Amount" class="store_payment_Amount"><?php echo $store_payment->Amount->caption() ?></span></th>
<?php } ?>
<?php if ($store_payment->BankName->Visible) { // BankName ?>
		<th class="<?php echo $store_payment->BankName->headerCellClass() ?>"><span id="elh_store_payment_BankName" class="store_payment_BankName"><?php echo $store_payment->BankName->caption() ?></span></th>
<?php } ?>
<?php if ($store_payment->AccountNumber->Visible) { // AccountNumber ?>
		<th class="<?php echo $store_payment->AccountNumber->headerCellClass() ?>"><span id="elh_store_payment_AccountNumber" class="store_payment_AccountNumber"><?php echo $store_payment->AccountNumber->caption() ?></span></th>
<?php } ?>
<?php if ($store_payment->chequeNumber->Visible) { // chequeNumber ?>
		<th class="<?php echo $store_payment->chequeNumber->headerCellClass() ?>"><span id="elh_store_payment_chequeNumber" class="store_payment_chequeNumber"><?php echo $store_payment->chequeNumber->caption() ?></span></th>
<?php } ?>
<?php if ($store_payment->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
		<th class="<?php echo $store_payment->SeectPaymentMode->headerCellClass() ?>"><span id="elh_store_payment_SeectPaymentMode" class="store_payment_SeectPaymentMode"><?php echo $store_payment->SeectPaymentMode->caption() ?></span></th>
<?php } ?>
<?php if ($store_payment->PaidAmount->Visible) { // PaidAmount ?>
		<th class="<?php echo $store_payment->PaidAmount->headerCellClass() ?>"><span id="elh_store_payment_PaidAmount" class="store_payment_PaidAmount"><?php echo $store_payment->PaidAmount->caption() ?></span></th>
<?php } ?>
<?php if ($store_payment->Currency->Visible) { // Currency ?>
		<th class="<?php echo $store_payment->Currency->headerCellClass() ?>"><span id="elh_store_payment_Currency" class="store_payment_Currency"><?php echo $store_payment->Currency->caption() ?></span></th>
<?php } ?>
<?php if ($store_payment->CardNumber->Visible) { // CardNumber ?>
		<th class="<?php echo $store_payment->CardNumber->headerCellClass() ?>"><span id="elh_store_payment_CardNumber" class="store_payment_CardNumber"><?php echo $store_payment->CardNumber->caption() ?></span></th>
<?php } ?>
<?php if ($store_payment->BranchID->Visible) { // BranchID ?>
		<th class="<?php echo $store_payment->BranchID->headerCellClass() ?>"><span id="elh_store_payment_BranchID" class="store_payment_BranchID"><?php echo $store_payment->BranchID->caption() ?></span></th>
<?php } ?>
<?php if ($store_payment->StoreID->Visible) { // StoreID ?>
		<th class="<?php echo $store_payment->StoreID->headerCellClass() ?>"><span id="elh_store_payment_StoreID" class="store_payment_StoreID"><?php echo $store_payment->StoreID->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$store_payment_delete->RecCnt = 0;
$i = 0;
while (!$store_payment_delete->Recordset->EOF) {
	$store_payment_delete->RecCnt++;
	$store_payment_delete->RowCnt++;

	// Set row properties
	$store_payment->resetAttributes();
	$store_payment->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$store_payment_delete->loadRowValues($store_payment_delete->Recordset);

	// Render row
	$store_payment_delete->renderRow();
?>
	<tr<?php echo $store_payment->rowAttributes() ?>>
<?php if ($store_payment->id->Visible) { // id ?>
		<td<?php echo $store_payment->id->cellAttributes() ?>>
<span id="el<?php echo $store_payment_delete->RowCnt ?>_store_payment_id" class="store_payment_id">
<span<?php echo $store_payment->id->viewAttributes() ?>>
<?php echo $store_payment->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_payment->PAYNO->Visible) { // PAYNO ?>
		<td<?php echo $store_payment->PAYNO->cellAttributes() ?>>
<span id="el<?php echo $store_payment_delete->RowCnt ?>_store_payment_PAYNO" class="store_payment_PAYNO">
<span<?php echo $store_payment->PAYNO->viewAttributes() ?>>
<?php echo $store_payment->PAYNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_payment->DT->Visible) { // DT ?>
		<td<?php echo $store_payment->DT->cellAttributes() ?>>
<span id="el<?php echo $store_payment_delete->RowCnt ?>_store_payment_DT" class="store_payment_DT">
<span<?php echo $store_payment->DT->viewAttributes() ?>>
<?php echo $store_payment->DT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_payment->YM->Visible) { // YM ?>
		<td<?php echo $store_payment->YM->cellAttributes() ?>>
<span id="el<?php echo $store_payment_delete->RowCnt ?>_store_payment_YM" class="store_payment_YM">
<span<?php echo $store_payment->YM->viewAttributes() ?>>
<?php echo $store_payment->YM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_payment->PC->Visible) { // PC ?>
		<td<?php echo $store_payment->PC->cellAttributes() ?>>
<span id="el<?php echo $store_payment_delete->RowCnt ?>_store_payment_PC" class="store_payment_PC">
<span<?php echo $store_payment->PC->viewAttributes() ?>>
<?php echo $store_payment->PC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_payment->Customercode->Visible) { // Customercode ?>
		<td<?php echo $store_payment->Customercode->cellAttributes() ?>>
<span id="el<?php echo $store_payment_delete->RowCnt ?>_store_payment_Customercode" class="store_payment_Customercode">
<span<?php echo $store_payment->Customercode->viewAttributes() ?>>
<?php echo $store_payment->Customercode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_payment->Customername->Visible) { // Customername ?>
		<td<?php echo $store_payment->Customername->cellAttributes() ?>>
<span id="el<?php echo $store_payment_delete->RowCnt ?>_store_payment_Customername" class="store_payment_Customername">
<span<?php echo $store_payment->Customername->viewAttributes() ?>>
<?php echo $store_payment->Customername->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_payment->pharmacy_pocol->Visible) { // pharmacy_pocol ?>
		<td<?php echo $store_payment->pharmacy_pocol->cellAttributes() ?>>
<span id="el<?php echo $store_payment_delete->RowCnt ?>_store_payment_pharmacy_pocol" class="store_payment_pharmacy_pocol">
<span<?php echo $store_payment->pharmacy_pocol->viewAttributes() ?>>
<?php echo $store_payment->pharmacy_pocol->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_payment->State->Visible) { // State ?>
		<td<?php echo $store_payment->State->cellAttributes() ?>>
<span id="el<?php echo $store_payment_delete->RowCnt ?>_store_payment_State" class="store_payment_State">
<span<?php echo $store_payment->State->viewAttributes() ?>>
<?php echo $store_payment->State->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_payment->Pincode->Visible) { // Pincode ?>
		<td<?php echo $store_payment->Pincode->cellAttributes() ?>>
<span id="el<?php echo $store_payment_delete->RowCnt ?>_store_payment_Pincode" class="store_payment_Pincode">
<span<?php echo $store_payment->Pincode->viewAttributes() ?>>
<?php echo $store_payment->Pincode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_payment->Phone->Visible) { // Phone ?>
		<td<?php echo $store_payment->Phone->cellAttributes() ?>>
<span id="el<?php echo $store_payment_delete->RowCnt ?>_store_payment_Phone" class="store_payment_Phone">
<span<?php echo $store_payment->Phone->viewAttributes() ?>>
<?php echo $store_payment->Phone->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_payment->Fax->Visible) { // Fax ?>
		<td<?php echo $store_payment->Fax->cellAttributes() ?>>
<span id="el<?php echo $store_payment_delete->RowCnt ?>_store_payment_Fax" class="store_payment_Fax">
<span<?php echo $store_payment->Fax->viewAttributes() ?>>
<?php echo $store_payment->Fax->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_payment->EEmail->Visible) { // EEmail ?>
		<td<?php echo $store_payment->EEmail->cellAttributes() ?>>
<span id="el<?php echo $store_payment_delete->RowCnt ?>_store_payment_EEmail" class="store_payment_EEmail">
<span<?php echo $store_payment->EEmail->viewAttributes() ?>>
<?php echo $store_payment->EEmail->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_payment->HospID->Visible) { // HospID ?>
		<td<?php echo $store_payment->HospID->cellAttributes() ?>>
<span id="el<?php echo $store_payment_delete->RowCnt ?>_store_payment_HospID" class="store_payment_HospID">
<span<?php echo $store_payment->HospID->viewAttributes() ?>>
<?php echo $store_payment->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_payment->createdby->Visible) { // createdby ?>
		<td<?php echo $store_payment->createdby->cellAttributes() ?>>
<span id="el<?php echo $store_payment_delete->RowCnt ?>_store_payment_createdby" class="store_payment_createdby">
<span<?php echo $store_payment->createdby->viewAttributes() ?>>
<?php echo $store_payment->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_payment->createddatetime->Visible) { // createddatetime ?>
		<td<?php echo $store_payment->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $store_payment_delete->RowCnt ?>_store_payment_createddatetime" class="store_payment_createddatetime">
<span<?php echo $store_payment->createddatetime->viewAttributes() ?>>
<?php echo $store_payment->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_payment->modifiedby->Visible) { // modifiedby ?>
		<td<?php echo $store_payment->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $store_payment_delete->RowCnt ?>_store_payment_modifiedby" class="store_payment_modifiedby">
<span<?php echo $store_payment->modifiedby->viewAttributes() ?>>
<?php echo $store_payment->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_payment->modifieddatetime->Visible) { // modifieddatetime ?>
		<td<?php echo $store_payment->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $store_payment_delete->RowCnt ?>_store_payment_modifieddatetime" class="store_payment_modifieddatetime">
<span<?php echo $store_payment->modifieddatetime->viewAttributes() ?>>
<?php echo $store_payment->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_payment->PharmacyID->Visible) { // PharmacyID ?>
		<td<?php echo $store_payment->PharmacyID->cellAttributes() ?>>
<span id="el<?php echo $store_payment_delete->RowCnt ?>_store_payment_PharmacyID" class="store_payment_PharmacyID">
<span<?php echo $store_payment->PharmacyID->viewAttributes() ?>>
<?php echo $store_payment->PharmacyID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_payment->BillTotalValue->Visible) { // BillTotalValue ?>
		<td<?php echo $store_payment->BillTotalValue->cellAttributes() ?>>
<span id="el<?php echo $store_payment_delete->RowCnt ?>_store_payment_BillTotalValue" class="store_payment_BillTotalValue">
<span<?php echo $store_payment->BillTotalValue->viewAttributes() ?>>
<?php echo $store_payment->BillTotalValue->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_payment->GRNTotalValue->Visible) { // GRNTotalValue ?>
		<td<?php echo $store_payment->GRNTotalValue->cellAttributes() ?>>
<span id="el<?php echo $store_payment_delete->RowCnt ?>_store_payment_GRNTotalValue" class="store_payment_GRNTotalValue">
<span<?php echo $store_payment->GRNTotalValue->viewAttributes() ?>>
<?php echo $store_payment->GRNTotalValue->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_payment->BillDiscount->Visible) { // BillDiscount ?>
		<td<?php echo $store_payment->BillDiscount->cellAttributes() ?>>
<span id="el<?php echo $store_payment_delete->RowCnt ?>_store_payment_BillDiscount" class="store_payment_BillDiscount">
<span<?php echo $store_payment->BillDiscount->viewAttributes() ?>>
<?php echo $store_payment->BillDiscount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_payment->TransPort->Visible) { // TransPort ?>
		<td<?php echo $store_payment->TransPort->cellAttributes() ?>>
<span id="el<?php echo $store_payment_delete->RowCnt ?>_store_payment_TransPort" class="store_payment_TransPort">
<span<?php echo $store_payment->TransPort->viewAttributes() ?>>
<?php echo $store_payment->TransPort->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_payment->AnyOther->Visible) { // AnyOther ?>
		<td<?php echo $store_payment->AnyOther->cellAttributes() ?>>
<span id="el<?php echo $store_payment_delete->RowCnt ?>_store_payment_AnyOther" class="store_payment_AnyOther">
<span<?php echo $store_payment->AnyOther->viewAttributes() ?>>
<?php echo $store_payment->AnyOther->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_payment->voucher_type->Visible) { // voucher_type ?>
		<td<?php echo $store_payment->voucher_type->cellAttributes() ?>>
<span id="el<?php echo $store_payment_delete->RowCnt ?>_store_payment_voucher_type" class="store_payment_voucher_type">
<span<?php echo $store_payment->voucher_type->viewAttributes() ?>>
<?php echo $store_payment->voucher_type->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_payment->Details->Visible) { // Details ?>
		<td<?php echo $store_payment->Details->cellAttributes() ?>>
<span id="el<?php echo $store_payment_delete->RowCnt ?>_store_payment_Details" class="store_payment_Details">
<span<?php echo $store_payment->Details->viewAttributes() ?>>
<?php echo $store_payment->Details->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_payment->ModeofPayment->Visible) { // ModeofPayment ?>
		<td<?php echo $store_payment->ModeofPayment->cellAttributes() ?>>
<span id="el<?php echo $store_payment_delete->RowCnt ?>_store_payment_ModeofPayment" class="store_payment_ModeofPayment">
<span<?php echo $store_payment->ModeofPayment->viewAttributes() ?>>
<?php echo $store_payment->ModeofPayment->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_payment->Amount->Visible) { // Amount ?>
		<td<?php echo $store_payment->Amount->cellAttributes() ?>>
<span id="el<?php echo $store_payment_delete->RowCnt ?>_store_payment_Amount" class="store_payment_Amount">
<span<?php echo $store_payment->Amount->viewAttributes() ?>>
<?php echo $store_payment->Amount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_payment->BankName->Visible) { // BankName ?>
		<td<?php echo $store_payment->BankName->cellAttributes() ?>>
<span id="el<?php echo $store_payment_delete->RowCnt ?>_store_payment_BankName" class="store_payment_BankName">
<span<?php echo $store_payment->BankName->viewAttributes() ?>>
<?php echo $store_payment->BankName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_payment->AccountNumber->Visible) { // AccountNumber ?>
		<td<?php echo $store_payment->AccountNumber->cellAttributes() ?>>
<span id="el<?php echo $store_payment_delete->RowCnt ?>_store_payment_AccountNumber" class="store_payment_AccountNumber">
<span<?php echo $store_payment->AccountNumber->viewAttributes() ?>>
<?php echo $store_payment->AccountNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_payment->chequeNumber->Visible) { // chequeNumber ?>
		<td<?php echo $store_payment->chequeNumber->cellAttributes() ?>>
<span id="el<?php echo $store_payment_delete->RowCnt ?>_store_payment_chequeNumber" class="store_payment_chequeNumber">
<span<?php echo $store_payment->chequeNumber->viewAttributes() ?>>
<?php echo $store_payment->chequeNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_payment->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
		<td<?php echo $store_payment->SeectPaymentMode->cellAttributes() ?>>
<span id="el<?php echo $store_payment_delete->RowCnt ?>_store_payment_SeectPaymentMode" class="store_payment_SeectPaymentMode">
<span<?php echo $store_payment->SeectPaymentMode->viewAttributes() ?>>
<?php echo $store_payment->SeectPaymentMode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_payment->PaidAmount->Visible) { // PaidAmount ?>
		<td<?php echo $store_payment->PaidAmount->cellAttributes() ?>>
<span id="el<?php echo $store_payment_delete->RowCnt ?>_store_payment_PaidAmount" class="store_payment_PaidAmount">
<span<?php echo $store_payment->PaidAmount->viewAttributes() ?>>
<?php echo $store_payment->PaidAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_payment->Currency->Visible) { // Currency ?>
		<td<?php echo $store_payment->Currency->cellAttributes() ?>>
<span id="el<?php echo $store_payment_delete->RowCnt ?>_store_payment_Currency" class="store_payment_Currency">
<span<?php echo $store_payment->Currency->viewAttributes() ?>>
<?php echo $store_payment->Currency->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_payment->CardNumber->Visible) { // CardNumber ?>
		<td<?php echo $store_payment->CardNumber->cellAttributes() ?>>
<span id="el<?php echo $store_payment_delete->RowCnt ?>_store_payment_CardNumber" class="store_payment_CardNumber">
<span<?php echo $store_payment->CardNumber->viewAttributes() ?>>
<?php echo $store_payment->CardNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_payment->BranchID->Visible) { // BranchID ?>
		<td<?php echo $store_payment->BranchID->cellAttributes() ?>>
<span id="el<?php echo $store_payment_delete->RowCnt ?>_store_payment_BranchID" class="store_payment_BranchID">
<span<?php echo $store_payment->BranchID->viewAttributes() ?>>
<?php echo $store_payment->BranchID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_payment->StoreID->Visible) { // StoreID ?>
		<td<?php echo $store_payment->StoreID->cellAttributes() ?>>
<span id="el<?php echo $store_payment_delete->RowCnt ?>_store_payment_StoreID" class="store_payment_StoreID">
<span<?php echo $store_payment->StoreID->viewAttributes() ?>>
<?php echo $store_payment->StoreID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$store_payment_delete->Recordset->moveNext();
}
$store_payment_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $store_payment_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$store_payment_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$store_payment_delete->terminate();
?>