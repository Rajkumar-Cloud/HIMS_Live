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
$store_payment_edit = new store_payment_edit();

// Run the page
$store_payment_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$store_payment_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fstore_paymentedit = currentForm = new ew.Form("fstore_paymentedit", "edit");

// Validate form
fstore_paymentedit.validate = function() {
	if (!this.validateRequired)
		return true; // Ignore validation
	var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
	if ($fobj.find("#confirm").val() == "F")
		return true;
	var elm, felm, uelm, addcnt = 0;
	var $k = $fobj.find("#" + this.formKeyCountName); // Get key_count
	var rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1;
	var startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
	var gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
	for (var i = startcnt; i <= rowcnt; i++) {
		var infix = ($k[0]) ? String(i) : "";
		$fobj.data("rowindex", infix);
		<?php if ($store_payment_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->id->caption(), $store_payment->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_payment_edit->PAYNO->Required) { ?>
			elm = this.getElements("x" + infix + "_PAYNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->PAYNO->caption(), $store_payment->PAYNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_payment_edit->DT->Required) { ?>
			elm = this.getElements("x" + infix + "_DT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->DT->caption(), $store_payment->DT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DT");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_payment->DT->errorMessage()) ?>");
		<?php if ($store_payment_edit->YM->Required) { ?>
			elm = this.getElements("x" + infix + "_YM");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->YM->caption(), $store_payment->YM->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_payment_edit->PC->Required) { ?>
			elm = this.getElements("x" + infix + "_PC");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->PC->caption(), $store_payment->PC->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_payment_edit->Customercode->Required) { ?>
			elm = this.getElements("x" + infix + "_Customercode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->Customercode->caption(), $store_payment->Customercode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_payment_edit->Customername->Required) { ?>
			elm = this.getElements("x" + infix + "_Customername[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->Customername->caption(), $store_payment->Customername->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_payment_edit->pharmacy_pocol->Required) { ?>
			elm = this.getElements("x" + infix + "_pharmacy_pocol");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->pharmacy_pocol->caption(), $store_payment->pharmacy_pocol->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_payment_edit->Address1->Required) { ?>
			elm = this.getElements("x" + infix + "_Address1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->Address1->caption(), $store_payment->Address1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_payment_edit->Address2->Required) { ?>
			elm = this.getElements("x" + infix + "_Address2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->Address2->caption(), $store_payment->Address2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_payment_edit->Address3->Required) { ?>
			elm = this.getElements("x" + infix + "_Address3");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->Address3->caption(), $store_payment->Address3->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_payment_edit->State->Required) { ?>
			elm = this.getElements("x" + infix + "_State");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->State->caption(), $store_payment->State->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_payment_edit->Pincode->Required) { ?>
			elm = this.getElements("x" + infix + "_Pincode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->Pincode->caption(), $store_payment->Pincode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_payment_edit->Phone->Required) { ?>
			elm = this.getElements("x" + infix + "_Phone");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->Phone->caption(), $store_payment->Phone->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_payment_edit->Fax->Required) { ?>
			elm = this.getElements("x" + infix + "_Fax");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->Fax->caption(), $store_payment->Fax->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_payment_edit->EEmail->Required) { ?>
			elm = this.getElements("x" + infix + "_EEmail");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->EEmail->caption(), $store_payment->EEmail->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_payment_edit->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->HospID->caption(), $store_payment->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_payment_edit->modifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->modifiedby->caption(), $store_payment->modifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_payment_edit->modifieddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->modifieddatetime->caption(), $store_payment->modifieddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_payment_edit->PharmacyID->Required) { ?>
			elm = this.getElements("x" + infix + "_PharmacyID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->PharmacyID->caption(), $store_payment->PharmacyID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_payment_edit->BillTotalValue->Required) { ?>
			elm = this.getElements("x" + infix + "_BillTotalValue");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->BillTotalValue->caption(), $store_payment->BillTotalValue->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BillTotalValue");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_payment->BillTotalValue->errorMessage()) ?>");
		<?php if ($store_payment_edit->GRNTotalValue->Required) { ?>
			elm = this.getElements("x" + infix + "_GRNTotalValue");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->GRNTotalValue->caption(), $store_payment->GRNTotalValue->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_GRNTotalValue");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_payment->GRNTotalValue->errorMessage()) ?>");
		<?php if ($store_payment_edit->BillDiscount->Required) { ?>
			elm = this.getElements("x" + infix + "_BillDiscount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->BillDiscount->caption(), $store_payment->BillDiscount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BillDiscount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_payment->BillDiscount->errorMessage()) ?>");
		<?php if ($store_payment_edit->BillUpload->Required) { ?>
			elm = this.getElements("x" + infix + "_BillUpload");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->BillUpload->caption(), $store_payment->BillUpload->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_payment_edit->TransPort->Required) { ?>
			elm = this.getElements("x" + infix + "_TransPort");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->TransPort->caption(), $store_payment->TransPort->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TransPort");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_payment->TransPort->errorMessage()) ?>");
		<?php if ($store_payment_edit->AnyOther->Required) { ?>
			elm = this.getElements("x" + infix + "_AnyOther");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->AnyOther->caption(), $store_payment->AnyOther->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_AnyOther");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_payment->AnyOther->errorMessage()) ?>");
		<?php if ($store_payment_edit->voucher_type->Required) { ?>
			elm = this.getElements("x" + infix + "_voucher_type");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->voucher_type->caption(), $store_payment->voucher_type->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_payment_edit->Details->Required) { ?>
			elm = this.getElements("x" + infix + "_Details");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->Details->caption(), $store_payment->Details->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_payment_edit->ModeofPayment->Required) { ?>
			elm = this.getElements("x" + infix + "_ModeofPayment");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->ModeofPayment->caption(), $store_payment->ModeofPayment->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_payment_edit->Amount->Required) { ?>
			elm = this.getElements("x" + infix + "_Amount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->Amount->caption(), $store_payment->Amount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Amount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_payment->Amount->errorMessage()) ?>");
		<?php if ($store_payment_edit->BankName->Required) { ?>
			elm = this.getElements("x" + infix + "_BankName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->BankName->caption(), $store_payment->BankName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_payment_edit->AccountNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_AccountNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->AccountNumber->caption(), $store_payment->AccountNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_payment_edit->chequeNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_chequeNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->chequeNumber->caption(), $store_payment->chequeNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_payment_edit->Remarks->Required) { ?>
			elm = this.getElements("x" + infix + "_Remarks");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->Remarks->caption(), $store_payment->Remarks->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_payment_edit->SeectPaymentMode->Required) { ?>
			elm = this.getElements("x" + infix + "_SeectPaymentMode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->SeectPaymentMode->caption(), $store_payment->SeectPaymentMode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_payment_edit->PaidAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_PaidAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->PaidAmount->caption(), $store_payment->PaidAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_payment_edit->Currency->Required) { ?>
			elm = this.getElements("x" + infix + "_Currency");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->Currency->caption(), $store_payment->Currency->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_payment_edit->CardNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_CardNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->CardNumber->caption(), $store_payment->CardNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_payment_edit->BranchID->Required) { ?>
			elm = this.getElements("x" + infix + "_BranchID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->BranchID->caption(), $store_payment->BranchID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BranchID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_payment->BranchID->errorMessage()) ?>");
		<?php if ($store_payment_edit->StoreID->Required) { ?>
			elm = this.getElements("x" + infix + "_StoreID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->StoreID->caption(), $store_payment->StoreID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_StoreID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_payment->StoreID->errorMessage()) ?>");

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
	}

	// Process detail forms
	var dfs = $fobj.find("input[name='detailpage']").get();
	for (var i = 0; i < dfs.length; i++) {
		var df = dfs[i], val = df.value;
		if (val && ew.forms[val])
			if (!ew.forms[val].validate())
				return false;
	}
	return true;
}

// Form_CustomValidate event
fstore_paymentedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fstore_paymentedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fstore_paymentedit.lists["x_Customername[]"] = <?php echo $store_payment_edit->Customername->Lookup->toClientList() ?>;
fstore_paymentedit.lists["x_Customername[]"].options = <?php echo JsonEncode($store_payment_edit->Customername->lookupOptions()) ?>;
fstore_paymentedit.lists["x_pharmacy_pocol"] = <?php echo $store_payment_edit->pharmacy_pocol->Lookup->toClientList() ?>;
fstore_paymentedit.lists["x_pharmacy_pocol"].options = <?php echo JsonEncode($store_payment_edit->pharmacy_pocol->lookupOptions()) ?>;
fstore_paymentedit.lists["x_ModeofPayment"] = <?php echo $store_payment_edit->ModeofPayment->Lookup->toClientList() ?>;
fstore_paymentedit.lists["x_ModeofPayment"].options = <?php echo JsonEncode($store_payment_edit->ModeofPayment->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $store_payment_edit->showPageHeader(); ?>
<?php
$store_payment_edit->showMessage();
?>
<form name="fstore_paymentedit" id="fstore_paymentedit" class="<?php echo $store_payment_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($store_payment_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $store_payment_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="store_payment">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$store_payment_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($store_payment->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_store_payment_id" class="<?php echo $store_payment_edit->LeftColumnClass ?>"><?php echo $store_payment->id->caption() ?><?php echo ($store_payment->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_payment_edit->RightColumnClass ?>"><div<?php echo $store_payment->id->cellAttributes() ?>>
<span id="el_store_payment_id">
<span<?php echo $store_payment->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($store_payment->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="store_payment" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($store_payment->id->CurrentValue) ?>">
<?php echo $store_payment->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_payment->PAYNO->Visible) { // PAYNO ?>
	<div id="r_PAYNO" class="form-group row">
		<label id="elh_store_payment_PAYNO" for="x_PAYNO" class="<?php echo $store_payment_edit->LeftColumnClass ?>"><?php echo $store_payment->PAYNO->caption() ?><?php echo ($store_payment->PAYNO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_payment_edit->RightColumnClass ?>"><div<?php echo $store_payment->PAYNO->cellAttributes() ?>>
<span id="el_store_payment_PAYNO">
<input type="text" data-table="store_payment" data-field="x_PAYNO" name="x_PAYNO" id="x_PAYNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_payment->PAYNO->getPlaceHolder()) ?>" value="<?php echo $store_payment->PAYNO->EditValue ?>"<?php echo $store_payment->PAYNO->editAttributes() ?>>
</span>
<?php echo $store_payment->PAYNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_payment->DT->Visible) { // DT ?>
	<div id="r_DT" class="form-group row">
		<label id="elh_store_payment_DT" for="x_DT" class="<?php echo $store_payment_edit->LeftColumnClass ?>"><?php echo $store_payment->DT->caption() ?><?php echo ($store_payment->DT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_payment_edit->RightColumnClass ?>"><div<?php echo $store_payment->DT->cellAttributes() ?>>
<span id="el_store_payment_DT">
<input type="text" data-table="store_payment" data-field="x_DT" data-format="7" name="x_DT" id="x_DT" placeholder="<?php echo HtmlEncode($store_payment->DT->getPlaceHolder()) ?>" value="<?php echo $store_payment->DT->EditValue ?>"<?php echo $store_payment->DT->editAttributes() ?>>
<?php if (!$store_payment->DT->ReadOnly && !$store_payment->DT->Disabled && !isset($store_payment->DT->EditAttrs["readonly"]) && !isset($store_payment->DT->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fstore_paymentedit", "x_DT", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php echo $store_payment->DT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_payment->YM->Visible) { // YM ?>
	<div id="r_YM" class="form-group row">
		<label id="elh_store_payment_YM" for="x_YM" class="<?php echo $store_payment_edit->LeftColumnClass ?>"><?php echo $store_payment->YM->caption() ?><?php echo ($store_payment->YM->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_payment_edit->RightColumnClass ?>"><div<?php echo $store_payment->YM->cellAttributes() ?>>
<span id="el_store_payment_YM">
<input type="text" data-table="store_payment" data-field="x_YM" name="x_YM" id="x_YM" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_payment->YM->getPlaceHolder()) ?>" value="<?php echo $store_payment->YM->EditValue ?>"<?php echo $store_payment->YM->editAttributes() ?>>
</span>
<?php echo $store_payment->YM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_payment->PC->Visible) { // PC ?>
	<div id="r_PC" class="form-group row">
		<label id="elh_store_payment_PC" for="x_PC" class="<?php echo $store_payment_edit->LeftColumnClass ?>"><?php echo $store_payment->PC->caption() ?><?php echo ($store_payment->PC->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_payment_edit->RightColumnClass ?>"><div<?php echo $store_payment->PC->cellAttributes() ?>>
<span id="el_store_payment_PC">
<input type="text" data-table="store_payment" data-field="x_PC" name="x_PC" id="x_PC" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_payment->PC->getPlaceHolder()) ?>" value="<?php echo $store_payment->PC->EditValue ?>"<?php echo $store_payment->PC->editAttributes() ?>>
</span>
<?php echo $store_payment->PC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_payment->Customercode->Visible) { // Customercode ?>
	<div id="r_Customercode" class="form-group row">
		<label id="elh_store_payment_Customercode" for="x_Customercode" class="<?php echo $store_payment_edit->LeftColumnClass ?>"><?php echo $store_payment->Customercode->caption() ?><?php echo ($store_payment->Customercode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_payment_edit->RightColumnClass ?>"><div<?php echo $store_payment->Customercode->cellAttributes() ?>>
<span id="el_store_payment_Customercode">
<input type="text" data-table="store_payment" data-field="x_Customercode" name="x_Customercode" id="x_Customercode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_payment->Customercode->getPlaceHolder()) ?>" value="<?php echo $store_payment->Customercode->EditValue ?>"<?php echo $store_payment->Customercode->editAttributes() ?>>
</span>
<?php echo $store_payment->Customercode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_payment->Customername->Visible) { // Customername ?>
	<div id="r_Customername" class="form-group row">
		<label id="elh_store_payment_Customername" for="x_Customername" class="<?php echo $store_payment_edit->LeftColumnClass ?>"><?php echo $store_payment->Customername->caption() ?><?php echo ($store_payment->Customername->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_payment_edit->RightColumnClass ?>"><div<?php echo $store_payment->Customername->cellAttributes() ?>>
<span id="el_store_payment_Customername">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Customername"><?php echo strval($store_payment->Customername->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($store_payment->Customername->ViewValue) : $store_payment->Customername->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($store_payment->Customername->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($store_payment->Customername->ReadOnly || $store_payment->Customername->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_Customername[]',m:1,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $store_payment->Customername->Lookup->getParamTag("p_x_Customername") ?>
<input type="hidden" data-table="store_payment" data-field="x_Customername" data-multiple="1" data-lookup="1" data-value-separator="<?php echo $store_payment->Customername->displayValueSeparatorAttribute() ?>" name="x_Customername[]" id="x_Customername[]" value="<?php echo $store_payment->Customername->CurrentValue ?>"<?php echo $store_payment->Customername->editAttributes() ?>>
</span>
<?php echo $store_payment->Customername->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_payment->pharmacy_pocol->Visible) { // pharmacy_pocol ?>
	<div id="r_pharmacy_pocol" class="form-group row">
		<label id="elh_store_payment_pharmacy_pocol" for="x_pharmacy_pocol" class="<?php echo $store_payment_edit->LeftColumnClass ?>"><?php echo $store_payment->pharmacy_pocol->caption() ?><?php echo ($store_payment->pharmacy_pocol->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_payment_edit->RightColumnClass ?>"><div<?php echo $store_payment->pharmacy_pocol->cellAttributes() ?>>
<span id="el_store_payment_pharmacy_pocol">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="store_payment" data-field="x_pharmacy_pocol" data-value-separator="<?php echo $store_payment->pharmacy_pocol->displayValueSeparatorAttribute() ?>" id="x_pharmacy_pocol" name="x_pharmacy_pocol"<?php echo $store_payment->pharmacy_pocol->editAttributes() ?>>
		<?php echo $store_payment->pharmacy_pocol->selectOptionListHtml("x_pharmacy_pocol") ?>
	</select>
</div>
<?php echo $store_payment->pharmacy_pocol->Lookup->getParamTag("p_x_pharmacy_pocol") ?>
</span>
<?php echo $store_payment->pharmacy_pocol->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_payment->Address1->Visible) { // Address1 ?>
	<div id="r_Address1" class="form-group row">
		<label id="elh_store_payment_Address1" for="x_Address1" class="<?php echo $store_payment_edit->LeftColumnClass ?>"><?php echo $store_payment->Address1->caption() ?><?php echo ($store_payment->Address1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_payment_edit->RightColumnClass ?>"><div<?php echo $store_payment->Address1->cellAttributes() ?>>
<span id="el_store_payment_Address1">
<input type="text" data-table="store_payment" data-field="x_Address1" name="x_Address1" id="x_Address1" placeholder="<?php echo HtmlEncode($store_payment->Address1->getPlaceHolder()) ?>" value="<?php echo $store_payment->Address1->EditValue ?>"<?php echo $store_payment->Address1->editAttributes() ?>>
</span>
<?php echo $store_payment->Address1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_payment->Address2->Visible) { // Address2 ?>
	<div id="r_Address2" class="form-group row">
		<label id="elh_store_payment_Address2" for="x_Address2" class="<?php echo $store_payment_edit->LeftColumnClass ?>"><?php echo $store_payment->Address2->caption() ?><?php echo ($store_payment->Address2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_payment_edit->RightColumnClass ?>"><div<?php echo $store_payment->Address2->cellAttributes() ?>>
<span id="el_store_payment_Address2">
<input type="text" data-table="store_payment" data-field="x_Address2" name="x_Address2" id="x_Address2" placeholder="<?php echo HtmlEncode($store_payment->Address2->getPlaceHolder()) ?>" value="<?php echo $store_payment->Address2->EditValue ?>"<?php echo $store_payment->Address2->editAttributes() ?>>
</span>
<?php echo $store_payment->Address2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_payment->Address3->Visible) { // Address3 ?>
	<div id="r_Address3" class="form-group row">
		<label id="elh_store_payment_Address3" for="x_Address3" class="<?php echo $store_payment_edit->LeftColumnClass ?>"><?php echo $store_payment->Address3->caption() ?><?php echo ($store_payment->Address3->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_payment_edit->RightColumnClass ?>"><div<?php echo $store_payment->Address3->cellAttributes() ?>>
<span id="el_store_payment_Address3">
<input type="text" data-table="store_payment" data-field="x_Address3" name="x_Address3" id="x_Address3" placeholder="<?php echo HtmlEncode($store_payment->Address3->getPlaceHolder()) ?>" value="<?php echo $store_payment->Address3->EditValue ?>"<?php echo $store_payment->Address3->editAttributes() ?>>
</span>
<?php echo $store_payment->Address3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_payment->State->Visible) { // State ?>
	<div id="r_State" class="form-group row">
		<label id="elh_store_payment_State" for="x_State" class="<?php echo $store_payment_edit->LeftColumnClass ?>"><?php echo $store_payment->State->caption() ?><?php echo ($store_payment->State->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_payment_edit->RightColumnClass ?>"><div<?php echo $store_payment->State->cellAttributes() ?>>
<span id="el_store_payment_State">
<input type="text" data-table="store_payment" data-field="x_State" name="x_State" id="x_State" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_payment->State->getPlaceHolder()) ?>" value="<?php echo $store_payment->State->EditValue ?>"<?php echo $store_payment->State->editAttributes() ?>>
</span>
<?php echo $store_payment->State->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_payment->Pincode->Visible) { // Pincode ?>
	<div id="r_Pincode" class="form-group row">
		<label id="elh_store_payment_Pincode" for="x_Pincode" class="<?php echo $store_payment_edit->LeftColumnClass ?>"><?php echo $store_payment->Pincode->caption() ?><?php echo ($store_payment->Pincode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_payment_edit->RightColumnClass ?>"><div<?php echo $store_payment->Pincode->cellAttributes() ?>>
<span id="el_store_payment_Pincode">
<input type="text" data-table="store_payment" data-field="x_Pincode" name="x_Pincode" id="x_Pincode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_payment->Pincode->getPlaceHolder()) ?>" value="<?php echo $store_payment->Pincode->EditValue ?>"<?php echo $store_payment->Pincode->editAttributes() ?>>
</span>
<?php echo $store_payment->Pincode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_payment->Phone->Visible) { // Phone ?>
	<div id="r_Phone" class="form-group row">
		<label id="elh_store_payment_Phone" for="x_Phone" class="<?php echo $store_payment_edit->LeftColumnClass ?>"><?php echo $store_payment->Phone->caption() ?><?php echo ($store_payment->Phone->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_payment_edit->RightColumnClass ?>"><div<?php echo $store_payment->Phone->cellAttributes() ?>>
<span id="el_store_payment_Phone">
<input type="text" data-table="store_payment" data-field="x_Phone" name="x_Phone" id="x_Phone" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_payment->Phone->getPlaceHolder()) ?>" value="<?php echo $store_payment->Phone->EditValue ?>"<?php echo $store_payment->Phone->editAttributes() ?>>
</span>
<?php echo $store_payment->Phone->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_payment->Fax->Visible) { // Fax ?>
	<div id="r_Fax" class="form-group row">
		<label id="elh_store_payment_Fax" for="x_Fax" class="<?php echo $store_payment_edit->LeftColumnClass ?>"><?php echo $store_payment->Fax->caption() ?><?php echo ($store_payment->Fax->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_payment_edit->RightColumnClass ?>"><div<?php echo $store_payment->Fax->cellAttributes() ?>>
<span id="el_store_payment_Fax">
<input type="text" data-table="store_payment" data-field="x_Fax" name="x_Fax" id="x_Fax" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_payment->Fax->getPlaceHolder()) ?>" value="<?php echo $store_payment->Fax->EditValue ?>"<?php echo $store_payment->Fax->editAttributes() ?>>
</span>
<?php echo $store_payment->Fax->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_payment->EEmail->Visible) { // EEmail ?>
	<div id="r_EEmail" class="form-group row">
		<label id="elh_store_payment_EEmail" for="x_EEmail" class="<?php echo $store_payment_edit->LeftColumnClass ?>"><?php echo $store_payment->EEmail->caption() ?><?php echo ($store_payment->EEmail->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_payment_edit->RightColumnClass ?>"><div<?php echo $store_payment->EEmail->cellAttributes() ?>>
<span id="el_store_payment_EEmail">
<input type="text" data-table="store_payment" data-field="x_EEmail" name="x_EEmail" id="x_EEmail" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_payment->EEmail->getPlaceHolder()) ?>" value="<?php echo $store_payment->EEmail->EditValue ?>"<?php echo $store_payment->EEmail->editAttributes() ?>>
</span>
<?php echo $store_payment->EEmail->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_payment->BillTotalValue->Visible) { // BillTotalValue ?>
	<div id="r_BillTotalValue" class="form-group row">
		<label id="elh_store_payment_BillTotalValue" for="x_BillTotalValue" class="<?php echo $store_payment_edit->LeftColumnClass ?>"><?php echo $store_payment->BillTotalValue->caption() ?><?php echo ($store_payment->BillTotalValue->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_payment_edit->RightColumnClass ?>"><div<?php echo $store_payment->BillTotalValue->cellAttributes() ?>>
<span id="el_store_payment_BillTotalValue">
<input type="text" data-table="store_payment" data-field="x_BillTotalValue" name="x_BillTotalValue" id="x_BillTotalValue" size="30" placeholder="<?php echo HtmlEncode($store_payment->BillTotalValue->getPlaceHolder()) ?>" value="<?php echo $store_payment->BillTotalValue->EditValue ?>"<?php echo $store_payment->BillTotalValue->editAttributes() ?>>
</span>
<?php echo $store_payment->BillTotalValue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_payment->GRNTotalValue->Visible) { // GRNTotalValue ?>
	<div id="r_GRNTotalValue" class="form-group row">
		<label id="elh_store_payment_GRNTotalValue" for="x_GRNTotalValue" class="<?php echo $store_payment_edit->LeftColumnClass ?>"><?php echo $store_payment->GRNTotalValue->caption() ?><?php echo ($store_payment->GRNTotalValue->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_payment_edit->RightColumnClass ?>"><div<?php echo $store_payment->GRNTotalValue->cellAttributes() ?>>
<span id="el_store_payment_GRNTotalValue">
<input type="text" data-table="store_payment" data-field="x_GRNTotalValue" name="x_GRNTotalValue" id="x_GRNTotalValue" size="30" placeholder="<?php echo HtmlEncode($store_payment->GRNTotalValue->getPlaceHolder()) ?>" value="<?php echo $store_payment->GRNTotalValue->EditValue ?>"<?php echo $store_payment->GRNTotalValue->editAttributes() ?>>
</span>
<?php echo $store_payment->GRNTotalValue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_payment->BillDiscount->Visible) { // BillDiscount ?>
	<div id="r_BillDiscount" class="form-group row">
		<label id="elh_store_payment_BillDiscount" for="x_BillDiscount" class="<?php echo $store_payment_edit->LeftColumnClass ?>"><?php echo $store_payment->BillDiscount->caption() ?><?php echo ($store_payment->BillDiscount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_payment_edit->RightColumnClass ?>"><div<?php echo $store_payment->BillDiscount->cellAttributes() ?>>
<span id="el_store_payment_BillDiscount">
<input type="text" data-table="store_payment" data-field="x_BillDiscount" name="x_BillDiscount" id="x_BillDiscount" size="30" placeholder="<?php echo HtmlEncode($store_payment->BillDiscount->getPlaceHolder()) ?>" value="<?php echo $store_payment->BillDiscount->EditValue ?>"<?php echo $store_payment->BillDiscount->editAttributes() ?>>
</span>
<?php echo $store_payment->BillDiscount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_payment->BillUpload->Visible) { // BillUpload ?>
	<div id="r_BillUpload" class="form-group row">
		<label id="elh_store_payment_BillUpload" for="x_BillUpload" class="<?php echo $store_payment_edit->LeftColumnClass ?>"><?php echo $store_payment->BillUpload->caption() ?><?php echo ($store_payment->BillUpload->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_payment_edit->RightColumnClass ?>"><div<?php echo $store_payment->BillUpload->cellAttributes() ?>>
<span id="el_store_payment_BillUpload">
<textarea data-table="store_payment" data-field="x_BillUpload" name="x_BillUpload" id="x_BillUpload" cols="35" rows="4" placeholder="<?php echo HtmlEncode($store_payment->BillUpload->getPlaceHolder()) ?>"<?php echo $store_payment->BillUpload->editAttributes() ?>><?php echo $store_payment->BillUpload->EditValue ?></textarea>
</span>
<?php echo $store_payment->BillUpload->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_payment->TransPort->Visible) { // TransPort ?>
	<div id="r_TransPort" class="form-group row">
		<label id="elh_store_payment_TransPort" for="x_TransPort" class="<?php echo $store_payment_edit->LeftColumnClass ?>"><?php echo $store_payment->TransPort->caption() ?><?php echo ($store_payment->TransPort->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_payment_edit->RightColumnClass ?>"><div<?php echo $store_payment->TransPort->cellAttributes() ?>>
<span id="el_store_payment_TransPort">
<input type="text" data-table="store_payment" data-field="x_TransPort" name="x_TransPort" id="x_TransPort" size="30" placeholder="<?php echo HtmlEncode($store_payment->TransPort->getPlaceHolder()) ?>" value="<?php echo $store_payment->TransPort->EditValue ?>"<?php echo $store_payment->TransPort->editAttributes() ?>>
</span>
<?php echo $store_payment->TransPort->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_payment->AnyOther->Visible) { // AnyOther ?>
	<div id="r_AnyOther" class="form-group row">
		<label id="elh_store_payment_AnyOther" for="x_AnyOther" class="<?php echo $store_payment_edit->LeftColumnClass ?>"><?php echo $store_payment->AnyOther->caption() ?><?php echo ($store_payment->AnyOther->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_payment_edit->RightColumnClass ?>"><div<?php echo $store_payment->AnyOther->cellAttributes() ?>>
<span id="el_store_payment_AnyOther">
<input type="text" data-table="store_payment" data-field="x_AnyOther" name="x_AnyOther" id="x_AnyOther" size="30" placeholder="<?php echo HtmlEncode($store_payment->AnyOther->getPlaceHolder()) ?>" value="<?php echo $store_payment->AnyOther->EditValue ?>"<?php echo $store_payment->AnyOther->editAttributes() ?>>
</span>
<?php echo $store_payment->AnyOther->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_payment->voucher_type->Visible) { // voucher_type ?>
	<div id="r_voucher_type" class="form-group row">
		<label id="elh_store_payment_voucher_type" for="x_voucher_type" class="<?php echo $store_payment_edit->LeftColumnClass ?>"><?php echo $store_payment->voucher_type->caption() ?><?php echo ($store_payment->voucher_type->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_payment_edit->RightColumnClass ?>"><div<?php echo $store_payment->voucher_type->cellAttributes() ?>>
<span id="el_store_payment_voucher_type">
<input type="text" data-table="store_payment" data-field="x_voucher_type" name="x_voucher_type" id="x_voucher_type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_payment->voucher_type->getPlaceHolder()) ?>" value="<?php echo $store_payment->voucher_type->EditValue ?>"<?php echo $store_payment->voucher_type->editAttributes() ?>>
</span>
<?php echo $store_payment->voucher_type->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_payment->Details->Visible) { // Details ?>
	<div id="r_Details" class="form-group row">
		<label id="elh_store_payment_Details" for="x_Details" class="<?php echo $store_payment_edit->LeftColumnClass ?>"><?php echo $store_payment->Details->caption() ?><?php echo ($store_payment->Details->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_payment_edit->RightColumnClass ?>"><div<?php echo $store_payment->Details->cellAttributes() ?>>
<span id="el_store_payment_Details">
<input type="text" data-table="store_payment" data-field="x_Details" name="x_Details" id="x_Details" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_payment->Details->getPlaceHolder()) ?>" value="<?php echo $store_payment->Details->EditValue ?>"<?php echo $store_payment->Details->editAttributes() ?>>
</span>
<?php echo $store_payment->Details->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_payment->ModeofPayment->Visible) { // ModeofPayment ?>
	<div id="r_ModeofPayment" class="form-group row">
		<label id="elh_store_payment_ModeofPayment" for="x_ModeofPayment" class="<?php echo $store_payment_edit->LeftColumnClass ?>"><?php echo $store_payment->ModeofPayment->caption() ?><?php echo ($store_payment->ModeofPayment->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_payment_edit->RightColumnClass ?>"><div<?php echo $store_payment->ModeofPayment->cellAttributes() ?>>
<span id="el_store_payment_ModeofPayment">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="store_payment" data-field="x_ModeofPayment" data-value-separator="<?php echo $store_payment->ModeofPayment->displayValueSeparatorAttribute() ?>" id="x_ModeofPayment" name="x_ModeofPayment"<?php echo $store_payment->ModeofPayment->editAttributes() ?>>
		<?php echo $store_payment->ModeofPayment->selectOptionListHtml("x_ModeofPayment") ?>
	</select>
</div>
<?php echo $store_payment->ModeofPayment->Lookup->getParamTag("p_x_ModeofPayment") ?>
</span>
<?php echo $store_payment->ModeofPayment->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_payment->Amount->Visible) { // Amount ?>
	<div id="r_Amount" class="form-group row">
		<label id="elh_store_payment_Amount" for="x_Amount" class="<?php echo $store_payment_edit->LeftColumnClass ?>"><?php echo $store_payment->Amount->caption() ?><?php echo ($store_payment->Amount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_payment_edit->RightColumnClass ?>"><div<?php echo $store_payment->Amount->cellAttributes() ?>>
<span id="el_store_payment_Amount">
<input type="text" data-table="store_payment" data-field="x_Amount" name="x_Amount" id="x_Amount" size="30" placeholder="<?php echo HtmlEncode($store_payment->Amount->getPlaceHolder()) ?>" value="<?php echo $store_payment->Amount->EditValue ?>"<?php echo $store_payment->Amount->editAttributes() ?>>
</span>
<?php echo $store_payment->Amount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_payment->BankName->Visible) { // BankName ?>
	<div id="r_BankName" class="form-group row">
		<label id="elh_store_payment_BankName" for="x_BankName" class="<?php echo $store_payment_edit->LeftColumnClass ?>"><?php echo $store_payment->BankName->caption() ?><?php echo ($store_payment->BankName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_payment_edit->RightColumnClass ?>"><div<?php echo $store_payment->BankName->cellAttributes() ?>>
<span id="el_store_payment_BankName">
<input type="text" data-table="store_payment" data-field="x_BankName" name="x_BankName" id="x_BankName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_payment->BankName->getPlaceHolder()) ?>" value="<?php echo $store_payment->BankName->EditValue ?>"<?php echo $store_payment->BankName->editAttributes() ?>>
</span>
<?php echo $store_payment->BankName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_payment->AccountNumber->Visible) { // AccountNumber ?>
	<div id="r_AccountNumber" class="form-group row">
		<label id="elh_store_payment_AccountNumber" for="x_AccountNumber" class="<?php echo $store_payment_edit->LeftColumnClass ?>"><?php echo $store_payment->AccountNumber->caption() ?><?php echo ($store_payment->AccountNumber->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_payment_edit->RightColumnClass ?>"><div<?php echo $store_payment->AccountNumber->cellAttributes() ?>>
<span id="el_store_payment_AccountNumber">
<input type="text" data-table="store_payment" data-field="x_AccountNumber" name="x_AccountNumber" id="x_AccountNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_payment->AccountNumber->getPlaceHolder()) ?>" value="<?php echo $store_payment->AccountNumber->EditValue ?>"<?php echo $store_payment->AccountNumber->editAttributes() ?>>
</span>
<?php echo $store_payment->AccountNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_payment->chequeNumber->Visible) { // chequeNumber ?>
	<div id="r_chequeNumber" class="form-group row">
		<label id="elh_store_payment_chequeNumber" for="x_chequeNumber" class="<?php echo $store_payment_edit->LeftColumnClass ?>"><?php echo $store_payment->chequeNumber->caption() ?><?php echo ($store_payment->chequeNumber->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_payment_edit->RightColumnClass ?>"><div<?php echo $store_payment->chequeNumber->cellAttributes() ?>>
<span id="el_store_payment_chequeNumber">
<input type="text" data-table="store_payment" data-field="x_chequeNumber" name="x_chequeNumber" id="x_chequeNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_payment->chequeNumber->getPlaceHolder()) ?>" value="<?php echo $store_payment->chequeNumber->EditValue ?>"<?php echo $store_payment->chequeNumber->editAttributes() ?>>
</span>
<?php echo $store_payment->chequeNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_payment->Remarks->Visible) { // Remarks ?>
	<div id="r_Remarks" class="form-group row">
		<label id="elh_store_payment_Remarks" for="x_Remarks" class="<?php echo $store_payment_edit->LeftColumnClass ?>"><?php echo $store_payment->Remarks->caption() ?><?php echo ($store_payment->Remarks->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_payment_edit->RightColumnClass ?>"><div<?php echo $store_payment->Remarks->cellAttributes() ?>>
<span id="el_store_payment_Remarks">
<textarea data-table="store_payment" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" cols="35" rows="4" placeholder="<?php echo HtmlEncode($store_payment->Remarks->getPlaceHolder()) ?>"<?php echo $store_payment->Remarks->editAttributes() ?>><?php echo $store_payment->Remarks->EditValue ?></textarea>
</span>
<?php echo $store_payment->Remarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_payment->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
	<div id="r_SeectPaymentMode" class="form-group row">
		<label id="elh_store_payment_SeectPaymentMode" for="x_SeectPaymentMode" class="<?php echo $store_payment_edit->LeftColumnClass ?>"><?php echo $store_payment->SeectPaymentMode->caption() ?><?php echo ($store_payment->SeectPaymentMode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_payment_edit->RightColumnClass ?>"><div<?php echo $store_payment->SeectPaymentMode->cellAttributes() ?>>
<span id="el_store_payment_SeectPaymentMode">
<input type="text" data-table="store_payment" data-field="x_SeectPaymentMode" name="x_SeectPaymentMode" id="x_SeectPaymentMode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_payment->SeectPaymentMode->getPlaceHolder()) ?>" value="<?php echo $store_payment->SeectPaymentMode->EditValue ?>"<?php echo $store_payment->SeectPaymentMode->editAttributes() ?>>
</span>
<?php echo $store_payment->SeectPaymentMode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_payment->PaidAmount->Visible) { // PaidAmount ?>
	<div id="r_PaidAmount" class="form-group row">
		<label id="elh_store_payment_PaidAmount" for="x_PaidAmount" class="<?php echo $store_payment_edit->LeftColumnClass ?>"><?php echo $store_payment->PaidAmount->caption() ?><?php echo ($store_payment->PaidAmount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_payment_edit->RightColumnClass ?>"><div<?php echo $store_payment->PaidAmount->cellAttributes() ?>>
<span id="el_store_payment_PaidAmount">
<input type="text" data-table="store_payment" data-field="x_PaidAmount" name="x_PaidAmount" id="x_PaidAmount" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_payment->PaidAmount->getPlaceHolder()) ?>" value="<?php echo $store_payment->PaidAmount->EditValue ?>"<?php echo $store_payment->PaidAmount->editAttributes() ?>>
</span>
<?php echo $store_payment->PaidAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_payment->Currency->Visible) { // Currency ?>
	<div id="r_Currency" class="form-group row">
		<label id="elh_store_payment_Currency" for="x_Currency" class="<?php echo $store_payment_edit->LeftColumnClass ?>"><?php echo $store_payment->Currency->caption() ?><?php echo ($store_payment->Currency->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_payment_edit->RightColumnClass ?>"><div<?php echo $store_payment->Currency->cellAttributes() ?>>
<span id="el_store_payment_Currency">
<input type="text" data-table="store_payment" data-field="x_Currency" name="x_Currency" id="x_Currency" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_payment->Currency->getPlaceHolder()) ?>" value="<?php echo $store_payment->Currency->EditValue ?>"<?php echo $store_payment->Currency->editAttributes() ?>>
</span>
<?php echo $store_payment->Currency->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_payment->CardNumber->Visible) { // CardNumber ?>
	<div id="r_CardNumber" class="form-group row">
		<label id="elh_store_payment_CardNumber" for="x_CardNumber" class="<?php echo $store_payment_edit->LeftColumnClass ?>"><?php echo $store_payment->CardNumber->caption() ?><?php echo ($store_payment->CardNumber->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_payment_edit->RightColumnClass ?>"><div<?php echo $store_payment->CardNumber->cellAttributes() ?>>
<span id="el_store_payment_CardNumber">
<input type="text" data-table="store_payment" data-field="x_CardNumber" name="x_CardNumber" id="x_CardNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_payment->CardNumber->getPlaceHolder()) ?>" value="<?php echo $store_payment->CardNumber->EditValue ?>"<?php echo $store_payment->CardNumber->editAttributes() ?>>
</span>
<?php echo $store_payment->CardNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_payment->BranchID->Visible) { // BranchID ?>
	<div id="r_BranchID" class="form-group row">
		<label id="elh_store_payment_BranchID" for="x_BranchID" class="<?php echo $store_payment_edit->LeftColumnClass ?>"><?php echo $store_payment->BranchID->caption() ?><?php echo ($store_payment->BranchID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_payment_edit->RightColumnClass ?>"><div<?php echo $store_payment->BranchID->cellAttributes() ?>>
<span id="el_store_payment_BranchID">
<input type="text" data-table="store_payment" data-field="x_BranchID" name="x_BranchID" id="x_BranchID" size="30" placeholder="<?php echo HtmlEncode($store_payment->BranchID->getPlaceHolder()) ?>" value="<?php echo $store_payment->BranchID->EditValue ?>"<?php echo $store_payment->BranchID->editAttributes() ?>>
</span>
<?php echo $store_payment->BranchID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_payment->StoreID->Visible) { // StoreID ?>
	<div id="r_StoreID" class="form-group row">
		<label id="elh_store_payment_StoreID" for="x_StoreID" class="<?php echo $store_payment_edit->LeftColumnClass ?>"><?php echo $store_payment->StoreID->caption() ?><?php echo ($store_payment->StoreID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_payment_edit->RightColumnClass ?>"><div<?php echo $store_payment->StoreID->cellAttributes() ?>>
<span id="el_store_payment_StoreID">
<input type="text" data-table="store_payment" data-field="x_StoreID" name="x_StoreID" id="x_StoreID" size="30" placeholder="<?php echo HtmlEncode($store_payment->StoreID->getPlaceHolder()) ?>" value="<?php echo $store_payment->StoreID->EditValue ?>"<?php echo $store_payment->StoreID->editAttributes() ?>>
</span>
<?php echo $store_payment->StoreID->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php
	if (in_array("store_grn", explode(",", $store_payment->getCurrentDetailTable())) && $store_grn->DetailEdit) {
?>
<?php if ($store_payment->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("store_grn", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "store_grngrid.php" ?>
<?php } ?>
<?php if (!$store_payment_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $store_payment_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $store_payment_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$store_payment_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$store_payment_edit->terminate();
?>