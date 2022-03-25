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
$pharmacy_payment_delete = new pharmacy_payment_delete();

// Run the page
$pharmacy_payment_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_payment_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fpharmacy_paymentdelete = currentForm = new ew.Form("fpharmacy_paymentdelete", "delete");

// Form_CustomValidate event
fpharmacy_paymentdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_paymentdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpharmacy_paymentdelete.lists["x_Customername"] = <?php echo $pharmacy_payment_delete->Customername->Lookup->toClientList() ?>;
fpharmacy_paymentdelete.lists["x_Customername"].options = <?php echo JsonEncode($pharmacy_payment_delete->Customername->lookupOptions()) ?>;
fpharmacy_paymentdelete.lists["x_pharmacy_pocol"] = <?php echo $pharmacy_payment_delete->pharmacy_pocol->Lookup->toClientList() ?>;
fpharmacy_paymentdelete.lists["x_pharmacy_pocol"].options = <?php echo JsonEncode($pharmacy_payment_delete->pharmacy_pocol->lookupOptions()) ?>;
fpharmacy_paymentdelete.lists["x_ModeofPayment"] = <?php echo $pharmacy_payment_delete->ModeofPayment->Lookup->toClientList() ?>;
fpharmacy_paymentdelete.lists["x_ModeofPayment"].options = <?php echo JsonEncode($pharmacy_payment_delete->ModeofPayment->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $pharmacy_payment_delete->showPageHeader(); ?>
<?php
$pharmacy_payment_delete->showMessage();
?>
<form name="fpharmacy_paymentdelete" id="fpharmacy_paymentdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_payment_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_payment_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_payment">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($pharmacy_payment_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($pharmacy_payment->id->Visible) { // id ?>
		<th class="<?php echo $pharmacy_payment->id->headerCellClass() ?>"><span id="elh_pharmacy_payment_id" class="pharmacy_payment_id"><?php echo $pharmacy_payment->id->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_payment->PAYNO->Visible) { // PAYNO ?>
		<th class="<?php echo $pharmacy_payment->PAYNO->headerCellClass() ?>"><span id="elh_pharmacy_payment_PAYNO" class="pharmacy_payment_PAYNO"><?php echo $pharmacy_payment->PAYNO->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_payment->DT->Visible) { // DT ?>
		<th class="<?php echo $pharmacy_payment->DT->headerCellClass() ?>"><span id="elh_pharmacy_payment_DT" class="pharmacy_payment_DT"><?php echo $pharmacy_payment->DT->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_payment->YM->Visible) { // YM ?>
		<th class="<?php echo $pharmacy_payment->YM->headerCellClass() ?>"><span id="elh_pharmacy_payment_YM" class="pharmacy_payment_YM"><?php echo $pharmacy_payment->YM->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_payment->PC->Visible) { // PC ?>
		<th class="<?php echo $pharmacy_payment->PC->headerCellClass() ?>"><span id="elh_pharmacy_payment_PC" class="pharmacy_payment_PC"><?php echo $pharmacy_payment->PC->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_payment->Customercode->Visible) { // Customercode ?>
		<th class="<?php echo $pharmacy_payment->Customercode->headerCellClass() ?>"><span id="elh_pharmacy_payment_Customercode" class="pharmacy_payment_Customercode"><?php echo $pharmacy_payment->Customercode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_payment->Customername->Visible) { // Customername ?>
		<th class="<?php echo $pharmacy_payment->Customername->headerCellClass() ?>"><span id="elh_pharmacy_payment_Customername" class="pharmacy_payment_Customername"><?php echo $pharmacy_payment->Customername->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_payment->pharmacy_pocol->Visible) { // pharmacy_pocol ?>
		<th class="<?php echo $pharmacy_payment->pharmacy_pocol->headerCellClass() ?>"><span id="elh_pharmacy_payment_pharmacy_pocol" class="pharmacy_payment_pharmacy_pocol"><?php echo $pharmacy_payment->pharmacy_pocol->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_payment->State->Visible) { // State ?>
		<th class="<?php echo $pharmacy_payment->State->headerCellClass() ?>"><span id="elh_pharmacy_payment_State" class="pharmacy_payment_State"><?php echo $pharmacy_payment->State->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_payment->Pincode->Visible) { // Pincode ?>
		<th class="<?php echo $pharmacy_payment->Pincode->headerCellClass() ?>"><span id="elh_pharmacy_payment_Pincode" class="pharmacy_payment_Pincode"><?php echo $pharmacy_payment->Pincode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_payment->Phone->Visible) { // Phone ?>
		<th class="<?php echo $pharmacy_payment->Phone->headerCellClass() ?>"><span id="elh_pharmacy_payment_Phone" class="pharmacy_payment_Phone"><?php echo $pharmacy_payment->Phone->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_payment->Fax->Visible) { // Fax ?>
		<th class="<?php echo $pharmacy_payment->Fax->headerCellClass() ?>"><span id="elh_pharmacy_payment_Fax" class="pharmacy_payment_Fax"><?php echo $pharmacy_payment->Fax->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_payment->EEmail->Visible) { // EEmail ?>
		<th class="<?php echo $pharmacy_payment->EEmail->headerCellClass() ?>"><span id="elh_pharmacy_payment_EEmail" class="pharmacy_payment_EEmail"><?php echo $pharmacy_payment->EEmail->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_payment->HospID->Visible) { // HospID ?>
		<th class="<?php echo $pharmacy_payment->HospID->headerCellClass() ?>"><span id="elh_pharmacy_payment_HospID" class="pharmacy_payment_HospID"><?php echo $pharmacy_payment->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_payment->createdby->Visible) { // createdby ?>
		<th class="<?php echo $pharmacy_payment->createdby->headerCellClass() ?>"><span id="elh_pharmacy_payment_createdby" class="pharmacy_payment_createdby"><?php echo $pharmacy_payment->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_payment->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $pharmacy_payment->createddatetime->headerCellClass() ?>"><span id="elh_pharmacy_payment_createddatetime" class="pharmacy_payment_createddatetime"><?php echo $pharmacy_payment->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_payment->modifiedby->Visible) { // modifiedby ?>
		<th class="<?php echo $pharmacy_payment->modifiedby->headerCellClass() ?>"><span id="elh_pharmacy_payment_modifiedby" class="pharmacy_payment_modifiedby"><?php echo $pharmacy_payment->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_payment->modifieddatetime->Visible) { // modifieddatetime ?>
		<th class="<?php echo $pharmacy_payment->modifieddatetime->headerCellClass() ?>"><span id="elh_pharmacy_payment_modifieddatetime" class="pharmacy_payment_modifieddatetime"><?php echo $pharmacy_payment->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_payment->PharmacyID->Visible) { // PharmacyID ?>
		<th class="<?php echo $pharmacy_payment->PharmacyID->headerCellClass() ?>"><span id="elh_pharmacy_payment_PharmacyID" class="pharmacy_payment_PharmacyID"><?php echo $pharmacy_payment->PharmacyID->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_payment->BillTotalValue->Visible) { // BillTotalValue ?>
		<th class="<?php echo $pharmacy_payment->BillTotalValue->headerCellClass() ?>"><span id="elh_pharmacy_payment_BillTotalValue" class="pharmacy_payment_BillTotalValue"><?php echo $pharmacy_payment->BillTotalValue->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_payment->GRNTotalValue->Visible) { // GRNTotalValue ?>
		<th class="<?php echo $pharmacy_payment->GRNTotalValue->headerCellClass() ?>"><span id="elh_pharmacy_payment_GRNTotalValue" class="pharmacy_payment_GRNTotalValue"><?php echo $pharmacy_payment->GRNTotalValue->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_payment->BillDiscount->Visible) { // BillDiscount ?>
		<th class="<?php echo $pharmacy_payment->BillDiscount->headerCellClass() ?>"><span id="elh_pharmacy_payment_BillDiscount" class="pharmacy_payment_BillDiscount"><?php echo $pharmacy_payment->BillDiscount->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_payment->TransPort->Visible) { // TransPort ?>
		<th class="<?php echo $pharmacy_payment->TransPort->headerCellClass() ?>"><span id="elh_pharmacy_payment_TransPort" class="pharmacy_payment_TransPort"><?php echo $pharmacy_payment->TransPort->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_payment->AnyOther->Visible) { // AnyOther ?>
		<th class="<?php echo $pharmacy_payment->AnyOther->headerCellClass() ?>"><span id="elh_pharmacy_payment_AnyOther" class="pharmacy_payment_AnyOther"><?php echo $pharmacy_payment->AnyOther->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_payment->voucher_type->Visible) { // voucher_type ?>
		<th class="<?php echo $pharmacy_payment->voucher_type->headerCellClass() ?>"><span id="elh_pharmacy_payment_voucher_type" class="pharmacy_payment_voucher_type"><?php echo $pharmacy_payment->voucher_type->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_payment->Details->Visible) { // Details ?>
		<th class="<?php echo $pharmacy_payment->Details->headerCellClass() ?>"><span id="elh_pharmacy_payment_Details" class="pharmacy_payment_Details"><?php echo $pharmacy_payment->Details->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_payment->ModeofPayment->Visible) { // ModeofPayment ?>
		<th class="<?php echo $pharmacy_payment->ModeofPayment->headerCellClass() ?>"><span id="elh_pharmacy_payment_ModeofPayment" class="pharmacy_payment_ModeofPayment"><?php echo $pharmacy_payment->ModeofPayment->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_payment->Amount->Visible) { // Amount ?>
		<th class="<?php echo $pharmacy_payment->Amount->headerCellClass() ?>"><span id="elh_pharmacy_payment_Amount" class="pharmacy_payment_Amount"><?php echo $pharmacy_payment->Amount->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_payment->BankName->Visible) { // BankName ?>
		<th class="<?php echo $pharmacy_payment->BankName->headerCellClass() ?>"><span id="elh_pharmacy_payment_BankName" class="pharmacy_payment_BankName"><?php echo $pharmacy_payment->BankName->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_payment->AccountNumber->Visible) { // AccountNumber ?>
		<th class="<?php echo $pharmacy_payment->AccountNumber->headerCellClass() ?>"><span id="elh_pharmacy_payment_AccountNumber" class="pharmacy_payment_AccountNumber"><?php echo $pharmacy_payment->AccountNumber->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_payment->chequeNumber->Visible) { // chequeNumber ?>
		<th class="<?php echo $pharmacy_payment->chequeNumber->headerCellClass() ?>"><span id="elh_pharmacy_payment_chequeNumber" class="pharmacy_payment_chequeNumber"><?php echo $pharmacy_payment->chequeNumber->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_payment->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
		<th class="<?php echo $pharmacy_payment->SeectPaymentMode->headerCellClass() ?>"><span id="elh_pharmacy_payment_SeectPaymentMode" class="pharmacy_payment_SeectPaymentMode"><?php echo $pharmacy_payment->SeectPaymentMode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_payment->PaidAmount->Visible) { // PaidAmount ?>
		<th class="<?php echo $pharmacy_payment->PaidAmount->headerCellClass() ?>"><span id="elh_pharmacy_payment_PaidAmount" class="pharmacy_payment_PaidAmount"><?php echo $pharmacy_payment->PaidAmount->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_payment->Currency->Visible) { // Currency ?>
		<th class="<?php echo $pharmacy_payment->Currency->headerCellClass() ?>"><span id="elh_pharmacy_payment_Currency" class="pharmacy_payment_Currency"><?php echo $pharmacy_payment->Currency->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_payment->CardNumber->Visible) { // CardNumber ?>
		<th class="<?php echo $pharmacy_payment->CardNumber->headerCellClass() ?>"><span id="elh_pharmacy_payment_CardNumber" class="pharmacy_payment_CardNumber"><?php echo $pharmacy_payment->CardNumber->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$pharmacy_payment_delete->RecCnt = 0;
$i = 0;
while (!$pharmacy_payment_delete->Recordset->EOF) {
	$pharmacy_payment_delete->RecCnt++;
	$pharmacy_payment_delete->RowCnt++;

	// Set row properties
	$pharmacy_payment->resetAttributes();
	$pharmacy_payment->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$pharmacy_payment_delete->loadRowValues($pharmacy_payment_delete->Recordset);

	// Render row
	$pharmacy_payment_delete->renderRow();
?>
	<tr<?php echo $pharmacy_payment->rowAttributes() ?>>
<?php if ($pharmacy_payment->id->Visible) { // id ?>
		<td<?php echo $pharmacy_payment->id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_delete->RowCnt ?>_pharmacy_payment_id" class="pharmacy_payment_id">
<span<?php echo $pharmacy_payment->id->viewAttributes() ?>>
<?php echo $pharmacy_payment->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_payment->PAYNO->Visible) { // PAYNO ?>
		<td<?php echo $pharmacy_payment->PAYNO->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_delete->RowCnt ?>_pharmacy_payment_PAYNO" class="pharmacy_payment_PAYNO">
<span<?php echo $pharmacy_payment->PAYNO->viewAttributes() ?>>
<?php echo $pharmacy_payment->PAYNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_payment->DT->Visible) { // DT ?>
		<td<?php echo $pharmacy_payment->DT->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_delete->RowCnt ?>_pharmacy_payment_DT" class="pharmacy_payment_DT">
<span<?php echo $pharmacy_payment->DT->viewAttributes() ?>>
<?php echo $pharmacy_payment->DT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_payment->YM->Visible) { // YM ?>
		<td<?php echo $pharmacy_payment->YM->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_delete->RowCnt ?>_pharmacy_payment_YM" class="pharmacy_payment_YM">
<span<?php echo $pharmacy_payment->YM->viewAttributes() ?>>
<?php echo $pharmacy_payment->YM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_payment->PC->Visible) { // PC ?>
		<td<?php echo $pharmacy_payment->PC->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_delete->RowCnt ?>_pharmacy_payment_PC" class="pharmacy_payment_PC">
<span<?php echo $pharmacy_payment->PC->viewAttributes() ?>>
<?php echo $pharmacy_payment->PC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_payment->Customercode->Visible) { // Customercode ?>
		<td<?php echo $pharmacy_payment->Customercode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_delete->RowCnt ?>_pharmacy_payment_Customercode" class="pharmacy_payment_Customercode">
<span<?php echo $pharmacy_payment->Customercode->viewAttributes() ?>>
<?php echo $pharmacy_payment->Customercode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_payment->Customername->Visible) { // Customername ?>
		<td<?php echo $pharmacy_payment->Customername->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_delete->RowCnt ?>_pharmacy_payment_Customername" class="pharmacy_payment_Customername">
<span<?php echo $pharmacy_payment->Customername->viewAttributes() ?>>
<?php echo $pharmacy_payment->Customername->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_payment->pharmacy_pocol->Visible) { // pharmacy_pocol ?>
		<td<?php echo $pharmacy_payment->pharmacy_pocol->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_delete->RowCnt ?>_pharmacy_payment_pharmacy_pocol" class="pharmacy_payment_pharmacy_pocol">
<span<?php echo $pharmacy_payment->pharmacy_pocol->viewAttributes() ?>>
<?php echo $pharmacy_payment->pharmacy_pocol->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_payment->State->Visible) { // State ?>
		<td<?php echo $pharmacy_payment->State->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_delete->RowCnt ?>_pharmacy_payment_State" class="pharmacy_payment_State">
<span<?php echo $pharmacy_payment->State->viewAttributes() ?>>
<?php echo $pharmacy_payment->State->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_payment->Pincode->Visible) { // Pincode ?>
		<td<?php echo $pharmacy_payment->Pincode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_delete->RowCnt ?>_pharmacy_payment_Pincode" class="pharmacy_payment_Pincode">
<span<?php echo $pharmacy_payment->Pincode->viewAttributes() ?>>
<?php echo $pharmacy_payment->Pincode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_payment->Phone->Visible) { // Phone ?>
		<td<?php echo $pharmacy_payment->Phone->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_delete->RowCnt ?>_pharmacy_payment_Phone" class="pharmacy_payment_Phone">
<span<?php echo $pharmacy_payment->Phone->viewAttributes() ?>>
<?php echo $pharmacy_payment->Phone->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_payment->Fax->Visible) { // Fax ?>
		<td<?php echo $pharmacy_payment->Fax->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_delete->RowCnt ?>_pharmacy_payment_Fax" class="pharmacy_payment_Fax">
<span<?php echo $pharmacy_payment->Fax->viewAttributes() ?>>
<?php echo $pharmacy_payment->Fax->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_payment->EEmail->Visible) { // EEmail ?>
		<td<?php echo $pharmacy_payment->EEmail->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_delete->RowCnt ?>_pharmacy_payment_EEmail" class="pharmacy_payment_EEmail">
<span<?php echo $pharmacy_payment->EEmail->viewAttributes() ?>>
<?php echo $pharmacy_payment->EEmail->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_payment->HospID->Visible) { // HospID ?>
		<td<?php echo $pharmacy_payment->HospID->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_delete->RowCnt ?>_pharmacy_payment_HospID" class="pharmacy_payment_HospID">
<span<?php echo $pharmacy_payment->HospID->viewAttributes() ?>>
<?php echo $pharmacy_payment->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_payment->createdby->Visible) { // createdby ?>
		<td<?php echo $pharmacy_payment->createdby->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_delete->RowCnt ?>_pharmacy_payment_createdby" class="pharmacy_payment_createdby">
<span<?php echo $pharmacy_payment->createdby->viewAttributes() ?>>
<?php echo $pharmacy_payment->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_payment->createddatetime->Visible) { // createddatetime ?>
		<td<?php echo $pharmacy_payment->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_delete->RowCnt ?>_pharmacy_payment_createddatetime" class="pharmacy_payment_createddatetime">
<span<?php echo $pharmacy_payment->createddatetime->viewAttributes() ?>>
<?php echo $pharmacy_payment->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_payment->modifiedby->Visible) { // modifiedby ?>
		<td<?php echo $pharmacy_payment->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_delete->RowCnt ?>_pharmacy_payment_modifiedby" class="pharmacy_payment_modifiedby">
<span<?php echo $pharmacy_payment->modifiedby->viewAttributes() ?>>
<?php echo $pharmacy_payment->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_payment->modifieddatetime->Visible) { // modifieddatetime ?>
		<td<?php echo $pharmacy_payment->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_delete->RowCnt ?>_pharmacy_payment_modifieddatetime" class="pharmacy_payment_modifieddatetime">
<span<?php echo $pharmacy_payment->modifieddatetime->viewAttributes() ?>>
<?php echo $pharmacy_payment->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_payment->PharmacyID->Visible) { // PharmacyID ?>
		<td<?php echo $pharmacy_payment->PharmacyID->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_delete->RowCnt ?>_pharmacy_payment_PharmacyID" class="pharmacy_payment_PharmacyID">
<span<?php echo $pharmacy_payment->PharmacyID->viewAttributes() ?>>
<?php echo $pharmacy_payment->PharmacyID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_payment->BillTotalValue->Visible) { // BillTotalValue ?>
		<td<?php echo $pharmacy_payment->BillTotalValue->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_delete->RowCnt ?>_pharmacy_payment_BillTotalValue" class="pharmacy_payment_BillTotalValue">
<span<?php echo $pharmacy_payment->BillTotalValue->viewAttributes() ?>>
<?php echo $pharmacy_payment->BillTotalValue->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_payment->GRNTotalValue->Visible) { // GRNTotalValue ?>
		<td<?php echo $pharmacy_payment->GRNTotalValue->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_delete->RowCnt ?>_pharmacy_payment_GRNTotalValue" class="pharmacy_payment_GRNTotalValue">
<span<?php echo $pharmacy_payment->GRNTotalValue->viewAttributes() ?>>
<?php echo $pharmacy_payment->GRNTotalValue->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_payment->BillDiscount->Visible) { // BillDiscount ?>
		<td<?php echo $pharmacy_payment->BillDiscount->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_delete->RowCnt ?>_pharmacy_payment_BillDiscount" class="pharmacy_payment_BillDiscount">
<span<?php echo $pharmacy_payment->BillDiscount->viewAttributes() ?>>
<?php echo $pharmacy_payment->BillDiscount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_payment->TransPort->Visible) { // TransPort ?>
		<td<?php echo $pharmacy_payment->TransPort->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_delete->RowCnt ?>_pharmacy_payment_TransPort" class="pharmacy_payment_TransPort">
<span<?php echo $pharmacy_payment->TransPort->viewAttributes() ?>>
<?php echo $pharmacy_payment->TransPort->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_payment->AnyOther->Visible) { // AnyOther ?>
		<td<?php echo $pharmacy_payment->AnyOther->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_delete->RowCnt ?>_pharmacy_payment_AnyOther" class="pharmacy_payment_AnyOther">
<span<?php echo $pharmacy_payment->AnyOther->viewAttributes() ?>>
<?php echo $pharmacy_payment->AnyOther->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_payment->voucher_type->Visible) { // voucher_type ?>
		<td<?php echo $pharmacy_payment->voucher_type->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_delete->RowCnt ?>_pharmacy_payment_voucher_type" class="pharmacy_payment_voucher_type">
<span<?php echo $pharmacy_payment->voucher_type->viewAttributes() ?>>
<?php echo $pharmacy_payment->voucher_type->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_payment->Details->Visible) { // Details ?>
		<td<?php echo $pharmacy_payment->Details->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_delete->RowCnt ?>_pharmacy_payment_Details" class="pharmacy_payment_Details">
<span<?php echo $pharmacy_payment->Details->viewAttributes() ?>>
<?php echo $pharmacy_payment->Details->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_payment->ModeofPayment->Visible) { // ModeofPayment ?>
		<td<?php echo $pharmacy_payment->ModeofPayment->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_delete->RowCnt ?>_pharmacy_payment_ModeofPayment" class="pharmacy_payment_ModeofPayment">
<span<?php echo $pharmacy_payment->ModeofPayment->viewAttributes() ?>>
<?php echo $pharmacy_payment->ModeofPayment->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_payment->Amount->Visible) { // Amount ?>
		<td<?php echo $pharmacy_payment->Amount->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_delete->RowCnt ?>_pharmacy_payment_Amount" class="pharmacy_payment_Amount">
<span<?php echo $pharmacy_payment->Amount->viewAttributes() ?>>
<?php echo $pharmacy_payment->Amount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_payment->BankName->Visible) { // BankName ?>
		<td<?php echo $pharmacy_payment->BankName->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_delete->RowCnt ?>_pharmacy_payment_BankName" class="pharmacy_payment_BankName">
<span<?php echo $pharmacy_payment->BankName->viewAttributes() ?>>
<?php echo $pharmacy_payment->BankName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_payment->AccountNumber->Visible) { // AccountNumber ?>
		<td<?php echo $pharmacy_payment->AccountNumber->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_delete->RowCnt ?>_pharmacy_payment_AccountNumber" class="pharmacy_payment_AccountNumber">
<span<?php echo $pharmacy_payment->AccountNumber->viewAttributes() ?>>
<?php echo $pharmacy_payment->AccountNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_payment->chequeNumber->Visible) { // chequeNumber ?>
		<td<?php echo $pharmacy_payment->chequeNumber->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_delete->RowCnt ?>_pharmacy_payment_chequeNumber" class="pharmacy_payment_chequeNumber">
<span<?php echo $pharmacy_payment->chequeNumber->viewAttributes() ?>>
<?php echo $pharmacy_payment->chequeNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_payment->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
		<td<?php echo $pharmacy_payment->SeectPaymentMode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_delete->RowCnt ?>_pharmacy_payment_SeectPaymentMode" class="pharmacy_payment_SeectPaymentMode">
<span<?php echo $pharmacy_payment->SeectPaymentMode->viewAttributes() ?>>
<?php echo $pharmacy_payment->SeectPaymentMode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_payment->PaidAmount->Visible) { // PaidAmount ?>
		<td<?php echo $pharmacy_payment->PaidAmount->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_delete->RowCnt ?>_pharmacy_payment_PaidAmount" class="pharmacy_payment_PaidAmount">
<span<?php echo $pharmacy_payment->PaidAmount->viewAttributes() ?>>
<?php echo $pharmacy_payment->PaidAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_payment->Currency->Visible) { // Currency ?>
		<td<?php echo $pharmacy_payment->Currency->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_delete->RowCnt ?>_pharmacy_payment_Currency" class="pharmacy_payment_Currency">
<span<?php echo $pharmacy_payment->Currency->viewAttributes() ?>>
<?php echo $pharmacy_payment->Currency->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_payment->CardNumber->Visible) { // CardNumber ?>
		<td<?php echo $pharmacy_payment->CardNumber->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_delete->RowCnt ?>_pharmacy_payment_CardNumber" class="pharmacy_payment_CardNumber">
<span<?php echo $pharmacy_payment->CardNumber->viewAttributes() ?>>
<?php echo $pharmacy_payment->CardNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$pharmacy_payment_delete->Recordset->moveNext();
}
$pharmacy_payment_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pharmacy_payment_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$pharmacy_payment_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$pharmacy_payment_delete->terminate();
?>