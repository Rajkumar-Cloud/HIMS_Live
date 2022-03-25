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
<?php include_once "header.php"; ?>
<script>
var fpharmacy_paymentdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fpharmacy_paymentdelete = currentForm = new ew.Form("fpharmacy_paymentdelete", "delete");
	loadjs.done("fpharmacy_paymentdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pharmacy_payment_delete->showPageHeader(); ?>
<?php
$pharmacy_payment_delete->showMessage();
?>
<form name="fpharmacy_paymentdelete" id="fpharmacy_paymentdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_payment">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($pharmacy_payment_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($pharmacy_payment_delete->id->Visible) { // id ?>
		<th class="<?php echo $pharmacy_payment_delete->id->headerCellClass() ?>"><span id="elh_pharmacy_payment_id" class="pharmacy_payment_id"><?php echo $pharmacy_payment_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_payment_delete->PAYNO->Visible) { // PAYNO ?>
		<th class="<?php echo $pharmacy_payment_delete->PAYNO->headerCellClass() ?>"><span id="elh_pharmacy_payment_PAYNO" class="pharmacy_payment_PAYNO"><?php echo $pharmacy_payment_delete->PAYNO->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_payment_delete->DT->Visible) { // DT ?>
		<th class="<?php echo $pharmacy_payment_delete->DT->headerCellClass() ?>"><span id="elh_pharmacy_payment_DT" class="pharmacy_payment_DT"><?php echo $pharmacy_payment_delete->DT->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_payment_delete->YM->Visible) { // YM ?>
		<th class="<?php echo $pharmacy_payment_delete->YM->headerCellClass() ?>"><span id="elh_pharmacy_payment_YM" class="pharmacy_payment_YM"><?php echo $pharmacy_payment_delete->YM->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_payment_delete->PC->Visible) { // PC ?>
		<th class="<?php echo $pharmacy_payment_delete->PC->headerCellClass() ?>"><span id="elh_pharmacy_payment_PC" class="pharmacy_payment_PC"><?php echo $pharmacy_payment_delete->PC->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_payment_delete->Customercode->Visible) { // Customercode ?>
		<th class="<?php echo $pharmacy_payment_delete->Customercode->headerCellClass() ?>"><span id="elh_pharmacy_payment_Customercode" class="pharmacy_payment_Customercode"><?php echo $pharmacy_payment_delete->Customercode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_payment_delete->Customername->Visible) { // Customername ?>
		<th class="<?php echo $pharmacy_payment_delete->Customername->headerCellClass() ?>"><span id="elh_pharmacy_payment_Customername" class="pharmacy_payment_Customername"><?php echo $pharmacy_payment_delete->Customername->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_payment_delete->pharmacy_pocol->Visible) { // pharmacy_pocol ?>
		<th class="<?php echo $pharmacy_payment_delete->pharmacy_pocol->headerCellClass() ?>"><span id="elh_pharmacy_payment_pharmacy_pocol" class="pharmacy_payment_pharmacy_pocol"><?php echo $pharmacy_payment_delete->pharmacy_pocol->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_payment_delete->State->Visible) { // State ?>
		<th class="<?php echo $pharmacy_payment_delete->State->headerCellClass() ?>"><span id="elh_pharmacy_payment_State" class="pharmacy_payment_State"><?php echo $pharmacy_payment_delete->State->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_payment_delete->Pincode->Visible) { // Pincode ?>
		<th class="<?php echo $pharmacy_payment_delete->Pincode->headerCellClass() ?>"><span id="elh_pharmacy_payment_Pincode" class="pharmacy_payment_Pincode"><?php echo $pharmacy_payment_delete->Pincode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_payment_delete->Phone->Visible) { // Phone ?>
		<th class="<?php echo $pharmacy_payment_delete->Phone->headerCellClass() ?>"><span id="elh_pharmacy_payment_Phone" class="pharmacy_payment_Phone"><?php echo $pharmacy_payment_delete->Phone->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_payment_delete->Fax->Visible) { // Fax ?>
		<th class="<?php echo $pharmacy_payment_delete->Fax->headerCellClass() ?>"><span id="elh_pharmacy_payment_Fax" class="pharmacy_payment_Fax"><?php echo $pharmacy_payment_delete->Fax->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_payment_delete->EEmail->Visible) { // EEmail ?>
		<th class="<?php echo $pharmacy_payment_delete->EEmail->headerCellClass() ?>"><span id="elh_pharmacy_payment_EEmail" class="pharmacy_payment_EEmail"><?php echo $pharmacy_payment_delete->EEmail->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_payment_delete->HospID->Visible) { // HospID ?>
		<th class="<?php echo $pharmacy_payment_delete->HospID->headerCellClass() ?>"><span id="elh_pharmacy_payment_HospID" class="pharmacy_payment_HospID"><?php echo $pharmacy_payment_delete->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_payment_delete->createdby->Visible) { // createdby ?>
		<th class="<?php echo $pharmacy_payment_delete->createdby->headerCellClass() ?>"><span id="elh_pharmacy_payment_createdby" class="pharmacy_payment_createdby"><?php echo $pharmacy_payment_delete->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_payment_delete->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $pharmacy_payment_delete->createddatetime->headerCellClass() ?>"><span id="elh_pharmacy_payment_createddatetime" class="pharmacy_payment_createddatetime"><?php echo $pharmacy_payment_delete->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_payment_delete->modifiedby->Visible) { // modifiedby ?>
		<th class="<?php echo $pharmacy_payment_delete->modifiedby->headerCellClass() ?>"><span id="elh_pharmacy_payment_modifiedby" class="pharmacy_payment_modifiedby"><?php echo $pharmacy_payment_delete->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_payment_delete->modifieddatetime->Visible) { // modifieddatetime ?>
		<th class="<?php echo $pharmacy_payment_delete->modifieddatetime->headerCellClass() ?>"><span id="elh_pharmacy_payment_modifieddatetime" class="pharmacy_payment_modifieddatetime"><?php echo $pharmacy_payment_delete->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_payment_delete->PharmacyID->Visible) { // PharmacyID ?>
		<th class="<?php echo $pharmacy_payment_delete->PharmacyID->headerCellClass() ?>"><span id="elh_pharmacy_payment_PharmacyID" class="pharmacy_payment_PharmacyID"><?php echo $pharmacy_payment_delete->PharmacyID->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_payment_delete->BillTotalValue->Visible) { // BillTotalValue ?>
		<th class="<?php echo $pharmacy_payment_delete->BillTotalValue->headerCellClass() ?>"><span id="elh_pharmacy_payment_BillTotalValue" class="pharmacy_payment_BillTotalValue"><?php echo $pharmacy_payment_delete->BillTotalValue->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_payment_delete->GRNTotalValue->Visible) { // GRNTotalValue ?>
		<th class="<?php echo $pharmacy_payment_delete->GRNTotalValue->headerCellClass() ?>"><span id="elh_pharmacy_payment_GRNTotalValue" class="pharmacy_payment_GRNTotalValue"><?php echo $pharmacy_payment_delete->GRNTotalValue->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_payment_delete->BillDiscount->Visible) { // BillDiscount ?>
		<th class="<?php echo $pharmacy_payment_delete->BillDiscount->headerCellClass() ?>"><span id="elh_pharmacy_payment_BillDiscount" class="pharmacy_payment_BillDiscount"><?php echo $pharmacy_payment_delete->BillDiscount->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_payment_delete->TransPort->Visible) { // TransPort ?>
		<th class="<?php echo $pharmacy_payment_delete->TransPort->headerCellClass() ?>"><span id="elh_pharmacy_payment_TransPort" class="pharmacy_payment_TransPort"><?php echo $pharmacy_payment_delete->TransPort->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_payment_delete->AnyOther->Visible) { // AnyOther ?>
		<th class="<?php echo $pharmacy_payment_delete->AnyOther->headerCellClass() ?>"><span id="elh_pharmacy_payment_AnyOther" class="pharmacy_payment_AnyOther"><?php echo $pharmacy_payment_delete->AnyOther->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_payment_delete->voucher_type->Visible) { // voucher_type ?>
		<th class="<?php echo $pharmacy_payment_delete->voucher_type->headerCellClass() ?>"><span id="elh_pharmacy_payment_voucher_type" class="pharmacy_payment_voucher_type"><?php echo $pharmacy_payment_delete->voucher_type->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_payment_delete->Details->Visible) { // Details ?>
		<th class="<?php echo $pharmacy_payment_delete->Details->headerCellClass() ?>"><span id="elh_pharmacy_payment_Details" class="pharmacy_payment_Details"><?php echo $pharmacy_payment_delete->Details->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_payment_delete->ModeofPayment->Visible) { // ModeofPayment ?>
		<th class="<?php echo $pharmacy_payment_delete->ModeofPayment->headerCellClass() ?>"><span id="elh_pharmacy_payment_ModeofPayment" class="pharmacy_payment_ModeofPayment"><?php echo $pharmacy_payment_delete->ModeofPayment->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_payment_delete->Amount->Visible) { // Amount ?>
		<th class="<?php echo $pharmacy_payment_delete->Amount->headerCellClass() ?>"><span id="elh_pharmacy_payment_Amount" class="pharmacy_payment_Amount"><?php echo $pharmacy_payment_delete->Amount->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_payment_delete->BankName->Visible) { // BankName ?>
		<th class="<?php echo $pharmacy_payment_delete->BankName->headerCellClass() ?>"><span id="elh_pharmacy_payment_BankName" class="pharmacy_payment_BankName"><?php echo $pharmacy_payment_delete->BankName->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_payment_delete->AccountNumber->Visible) { // AccountNumber ?>
		<th class="<?php echo $pharmacy_payment_delete->AccountNumber->headerCellClass() ?>"><span id="elh_pharmacy_payment_AccountNumber" class="pharmacy_payment_AccountNumber"><?php echo $pharmacy_payment_delete->AccountNumber->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_payment_delete->chequeNumber->Visible) { // chequeNumber ?>
		<th class="<?php echo $pharmacy_payment_delete->chequeNumber->headerCellClass() ?>"><span id="elh_pharmacy_payment_chequeNumber" class="pharmacy_payment_chequeNumber"><?php echo $pharmacy_payment_delete->chequeNumber->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_payment_delete->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
		<th class="<?php echo $pharmacy_payment_delete->SeectPaymentMode->headerCellClass() ?>"><span id="elh_pharmacy_payment_SeectPaymentMode" class="pharmacy_payment_SeectPaymentMode"><?php echo $pharmacy_payment_delete->SeectPaymentMode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_payment_delete->PaidAmount->Visible) { // PaidAmount ?>
		<th class="<?php echo $pharmacy_payment_delete->PaidAmount->headerCellClass() ?>"><span id="elh_pharmacy_payment_PaidAmount" class="pharmacy_payment_PaidAmount"><?php echo $pharmacy_payment_delete->PaidAmount->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_payment_delete->Currency->Visible) { // Currency ?>
		<th class="<?php echo $pharmacy_payment_delete->Currency->headerCellClass() ?>"><span id="elh_pharmacy_payment_Currency" class="pharmacy_payment_Currency"><?php echo $pharmacy_payment_delete->Currency->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_payment_delete->CardNumber->Visible) { // CardNumber ?>
		<th class="<?php echo $pharmacy_payment_delete->CardNumber->headerCellClass() ?>"><span id="elh_pharmacy_payment_CardNumber" class="pharmacy_payment_CardNumber"><?php echo $pharmacy_payment_delete->CardNumber->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$pharmacy_payment_delete->RecordCount = 0;
$i = 0;
while (!$pharmacy_payment_delete->Recordset->EOF) {
	$pharmacy_payment_delete->RecordCount++;
	$pharmacy_payment_delete->RowCount++;

	// Set row properties
	$pharmacy_payment->resetAttributes();
	$pharmacy_payment->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$pharmacy_payment_delete->loadRowValues($pharmacy_payment_delete->Recordset);

	// Render row
	$pharmacy_payment_delete->renderRow();
?>
	<tr <?php echo $pharmacy_payment->rowAttributes() ?>>
<?php if ($pharmacy_payment_delete->id->Visible) { // id ?>
		<td <?php echo $pharmacy_payment_delete->id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_delete->RowCount ?>_pharmacy_payment_id" class="pharmacy_payment_id">
<span<?php echo $pharmacy_payment_delete->id->viewAttributes() ?>><?php echo $pharmacy_payment_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_payment_delete->PAYNO->Visible) { // PAYNO ?>
		<td <?php echo $pharmacy_payment_delete->PAYNO->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_delete->RowCount ?>_pharmacy_payment_PAYNO" class="pharmacy_payment_PAYNO">
<span<?php echo $pharmacy_payment_delete->PAYNO->viewAttributes() ?>><?php echo $pharmacy_payment_delete->PAYNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_payment_delete->DT->Visible) { // DT ?>
		<td <?php echo $pharmacy_payment_delete->DT->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_delete->RowCount ?>_pharmacy_payment_DT" class="pharmacy_payment_DT">
<span<?php echo $pharmacy_payment_delete->DT->viewAttributes() ?>><?php echo $pharmacy_payment_delete->DT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_payment_delete->YM->Visible) { // YM ?>
		<td <?php echo $pharmacy_payment_delete->YM->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_delete->RowCount ?>_pharmacy_payment_YM" class="pharmacy_payment_YM">
<span<?php echo $pharmacy_payment_delete->YM->viewAttributes() ?>><?php echo $pharmacy_payment_delete->YM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_payment_delete->PC->Visible) { // PC ?>
		<td <?php echo $pharmacy_payment_delete->PC->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_delete->RowCount ?>_pharmacy_payment_PC" class="pharmacy_payment_PC">
<span<?php echo $pharmacy_payment_delete->PC->viewAttributes() ?>><?php echo $pharmacy_payment_delete->PC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_payment_delete->Customercode->Visible) { // Customercode ?>
		<td <?php echo $pharmacy_payment_delete->Customercode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_delete->RowCount ?>_pharmacy_payment_Customercode" class="pharmacy_payment_Customercode">
<span<?php echo $pharmacy_payment_delete->Customercode->viewAttributes() ?>><?php echo $pharmacy_payment_delete->Customercode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_payment_delete->Customername->Visible) { // Customername ?>
		<td <?php echo $pharmacy_payment_delete->Customername->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_delete->RowCount ?>_pharmacy_payment_Customername" class="pharmacy_payment_Customername">
<span<?php echo $pharmacy_payment_delete->Customername->viewAttributes() ?>><?php echo $pharmacy_payment_delete->Customername->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_payment_delete->pharmacy_pocol->Visible) { // pharmacy_pocol ?>
		<td <?php echo $pharmacy_payment_delete->pharmacy_pocol->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_delete->RowCount ?>_pharmacy_payment_pharmacy_pocol" class="pharmacy_payment_pharmacy_pocol">
<span<?php echo $pharmacy_payment_delete->pharmacy_pocol->viewAttributes() ?>><?php echo $pharmacy_payment_delete->pharmacy_pocol->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_payment_delete->State->Visible) { // State ?>
		<td <?php echo $pharmacy_payment_delete->State->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_delete->RowCount ?>_pharmacy_payment_State" class="pharmacy_payment_State">
<span<?php echo $pharmacy_payment_delete->State->viewAttributes() ?>><?php echo $pharmacy_payment_delete->State->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_payment_delete->Pincode->Visible) { // Pincode ?>
		<td <?php echo $pharmacy_payment_delete->Pincode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_delete->RowCount ?>_pharmacy_payment_Pincode" class="pharmacy_payment_Pincode">
<span<?php echo $pharmacy_payment_delete->Pincode->viewAttributes() ?>><?php echo $pharmacy_payment_delete->Pincode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_payment_delete->Phone->Visible) { // Phone ?>
		<td <?php echo $pharmacy_payment_delete->Phone->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_delete->RowCount ?>_pharmacy_payment_Phone" class="pharmacy_payment_Phone">
<span<?php echo $pharmacy_payment_delete->Phone->viewAttributes() ?>><?php echo $pharmacy_payment_delete->Phone->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_payment_delete->Fax->Visible) { // Fax ?>
		<td <?php echo $pharmacy_payment_delete->Fax->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_delete->RowCount ?>_pharmacy_payment_Fax" class="pharmacy_payment_Fax">
<span<?php echo $pharmacy_payment_delete->Fax->viewAttributes() ?>><?php echo $pharmacy_payment_delete->Fax->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_payment_delete->EEmail->Visible) { // EEmail ?>
		<td <?php echo $pharmacy_payment_delete->EEmail->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_delete->RowCount ?>_pharmacy_payment_EEmail" class="pharmacy_payment_EEmail">
<span<?php echo $pharmacy_payment_delete->EEmail->viewAttributes() ?>><?php echo $pharmacy_payment_delete->EEmail->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_payment_delete->HospID->Visible) { // HospID ?>
		<td <?php echo $pharmacy_payment_delete->HospID->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_delete->RowCount ?>_pharmacy_payment_HospID" class="pharmacy_payment_HospID">
<span<?php echo $pharmacy_payment_delete->HospID->viewAttributes() ?>><?php echo $pharmacy_payment_delete->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_payment_delete->createdby->Visible) { // createdby ?>
		<td <?php echo $pharmacy_payment_delete->createdby->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_delete->RowCount ?>_pharmacy_payment_createdby" class="pharmacy_payment_createdby">
<span<?php echo $pharmacy_payment_delete->createdby->viewAttributes() ?>><?php echo $pharmacy_payment_delete->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_payment_delete->createddatetime->Visible) { // createddatetime ?>
		<td <?php echo $pharmacy_payment_delete->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_delete->RowCount ?>_pharmacy_payment_createddatetime" class="pharmacy_payment_createddatetime">
<span<?php echo $pharmacy_payment_delete->createddatetime->viewAttributes() ?>><?php echo $pharmacy_payment_delete->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_payment_delete->modifiedby->Visible) { // modifiedby ?>
		<td <?php echo $pharmacy_payment_delete->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_delete->RowCount ?>_pharmacy_payment_modifiedby" class="pharmacy_payment_modifiedby">
<span<?php echo $pharmacy_payment_delete->modifiedby->viewAttributes() ?>><?php echo $pharmacy_payment_delete->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_payment_delete->modifieddatetime->Visible) { // modifieddatetime ?>
		<td <?php echo $pharmacy_payment_delete->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_delete->RowCount ?>_pharmacy_payment_modifieddatetime" class="pharmacy_payment_modifieddatetime">
<span<?php echo $pharmacy_payment_delete->modifieddatetime->viewAttributes() ?>><?php echo $pharmacy_payment_delete->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_payment_delete->PharmacyID->Visible) { // PharmacyID ?>
		<td <?php echo $pharmacy_payment_delete->PharmacyID->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_delete->RowCount ?>_pharmacy_payment_PharmacyID" class="pharmacy_payment_PharmacyID">
<span<?php echo $pharmacy_payment_delete->PharmacyID->viewAttributes() ?>><?php echo $pharmacy_payment_delete->PharmacyID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_payment_delete->BillTotalValue->Visible) { // BillTotalValue ?>
		<td <?php echo $pharmacy_payment_delete->BillTotalValue->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_delete->RowCount ?>_pharmacy_payment_BillTotalValue" class="pharmacy_payment_BillTotalValue">
<span<?php echo $pharmacy_payment_delete->BillTotalValue->viewAttributes() ?>><?php echo $pharmacy_payment_delete->BillTotalValue->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_payment_delete->GRNTotalValue->Visible) { // GRNTotalValue ?>
		<td <?php echo $pharmacy_payment_delete->GRNTotalValue->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_delete->RowCount ?>_pharmacy_payment_GRNTotalValue" class="pharmacy_payment_GRNTotalValue">
<span<?php echo $pharmacy_payment_delete->GRNTotalValue->viewAttributes() ?>><?php echo $pharmacy_payment_delete->GRNTotalValue->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_payment_delete->BillDiscount->Visible) { // BillDiscount ?>
		<td <?php echo $pharmacy_payment_delete->BillDiscount->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_delete->RowCount ?>_pharmacy_payment_BillDiscount" class="pharmacy_payment_BillDiscount">
<span<?php echo $pharmacy_payment_delete->BillDiscount->viewAttributes() ?>><?php echo $pharmacy_payment_delete->BillDiscount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_payment_delete->TransPort->Visible) { // TransPort ?>
		<td <?php echo $pharmacy_payment_delete->TransPort->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_delete->RowCount ?>_pharmacy_payment_TransPort" class="pharmacy_payment_TransPort">
<span<?php echo $pharmacy_payment_delete->TransPort->viewAttributes() ?>><?php echo $pharmacy_payment_delete->TransPort->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_payment_delete->AnyOther->Visible) { // AnyOther ?>
		<td <?php echo $pharmacy_payment_delete->AnyOther->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_delete->RowCount ?>_pharmacy_payment_AnyOther" class="pharmacy_payment_AnyOther">
<span<?php echo $pharmacy_payment_delete->AnyOther->viewAttributes() ?>><?php echo $pharmacy_payment_delete->AnyOther->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_payment_delete->voucher_type->Visible) { // voucher_type ?>
		<td <?php echo $pharmacy_payment_delete->voucher_type->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_delete->RowCount ?>_pharmacy_payment_voucher_type" class="pharmacy_payment_voucher_type">
<span<?php echo $pharmacy_payment_delete->voucher_type->viewAttributes() ?>><?php echo $pharmacy_payment_delete->voucher_type->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_payment_delete->Details->Visible) { // Details ?>
		<td <?php echo $pharmacy_payment_delete->Details->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_delete->RowCount ?>_pharmacy_payment_Details" class="pharmacy_payment_Details">
<span<?php echo $pharmacy_payment_delete->Details->viewAttributes() ?>><?php echo $pharmacy_payment_delete->Details->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_payment_delete->ModeofPayment->Visible) { // ModeofPayment ?>
		<td <?php echo $pharmacy_payment_delete->ModeofPayment->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_delete->RowCount ?>_pharmacy_payment_ModeofPayment" class="pharmacy_payment_ModeofPayment">
<span<?php echo $pharmacy_payment_delete->ModeofPayment->viewAttributes() ?>><?php echo $pharmacy_payment_delete->ModeofPayment->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_payment_delete->Amount->Visible) { // Amount ?>
		<td <?php echo $pharmacy_payment_delete->Amount->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_delete->RowCount ?>_pharmacy_payment_Amount" class="pharmacy_payment_Amount">
<span<?php echo $pharmacy_payment_delete->Amount->viewAttributes() ?>><?php echo $pharmacy_payment_delete->Amount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_payment_delete->BankName->Visible) { // BankName ?>
		<td <?php echo $pharmacy_payment_delete->BankName->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_delete->RowCount ?>_pharmacy_payment_BankName" class="pharmacy_payment_BankName">
<span<?php echo $pharmacy_payment_delete->BankName->viewAttributes() ?>><?php echo $pharmacy_payment_delete->BankName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_payment_delete->AccountNumber->Visible) { // AccountNumber ?>
		<td <?php echo $pharmacy_payment_delete->AccountNumber->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_delete->RowCount ?>_pharmacy_payment_AccountNumber" class="pharmacy_payment_AccountNumber">
<span<?php echo $pharmacy_payment_delete->AccountNumber->viewAttributes() ?>><?php echo $pharmacy_payment_delete->AccountNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_payment_delete->chequeNumber->Visible) { // chequeNumber ?>
		<td <?php echo $pharmacy_payment_delete->chequeNumber->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_delete->RowCount ?>_pharmacy_payment_chequeNumber" class="pharmacy_payment_chequeNumber">
<span<?php echo $pharmacy_payment_delete->chequeNumber->viewAttributes() ?>><?php echo $pharmacy_payment_delete->chequeNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_payment_delete->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
		<td <?php echo $pharmacy_payment_delete->SeectPaymentMode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_delete->RowCount ?>_pharmacy_payment_SeectPaymentMode" class="pharmacy_payment_SeectPaymentMode">
<span<?php echo $pharmacy_payment_delete->SeectPaymentMode->viewAttributes() ?>><?php echo $pharmacy_payment_delete->SeectPaymentMode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_payment_delete->PaidAmount->Visible) { // PaidAmount ?>
		<td <?php echo $pharmacy_payment_delete->PaidAmount->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_delete->RowCount ?>_pharmacy_payment_PaidAmount" class="pharmacy_payment_PaidAmount">
<span<?php echo $pharmacy_payment_delete->PaidAmount->viewAttributes() ?>><?php echo $pharmacy_payment_delete->PaidAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_payment_delete->Currency->Visible) { // Currency ?>
		<td <?php echo $pharmacy_payment_delete->Currency->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_delete->RowCount ?>_pharmacy_payment_Currency" class="pharmacy_payment_Currency">
<span<?php echo $pharmacy_payment_delete->Currency->viewAttributes() ?>><?php echo $pharmacy_payment_delete->Currency->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_payment_delete->CardNumber->Visible) { // CardNumber ?>
		<td <?php echo $pharmacy_payment_delete->CardNumber->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_delete->RowCount ?>_pharmacy_payment_CardNumber" class="pharmacy_payment_CardNumber">
<span<?php echo $pharmacy_payment_delete->CardNumber->viewAttributes() ?>><?php echo $pharmacy_payment_delete->CardNumber->getViewValue() ?></span>
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
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php include_once "footer.php"; ?>
<?php
$pharmacy_payment_delete->terminate();
?>