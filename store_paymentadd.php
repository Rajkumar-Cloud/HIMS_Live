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
$store_payment_add = new store_payment_add();

// Run the page
$store_payment_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$store_payment_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fstore_paymentadd = currentForm = new ew.Form("fstore_paymentadd", "add");

// Validate form
fstore_paymentadd.validate = function() {
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
		<?php if ($store_payment_add->PAYNO->Required) { ?>
			elm = this.getElements("x" + infix + "_PAYNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->PAYNO->caption(), $store_payment->PAYNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_payment_add->DT->Required) { ?>
			elm = this.getElements("x" + infix + "_DT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->DT->caption(), $store_payment->DT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DT");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_payment->DT->errorMessage()) ?>");
		<?php if ($store_payment_add->YM->Required) { ?>
			elm = this.getElements("x" + infix + "_YM");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->YM->caption(), $store_payment->YM->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_payment_add->PC->Required) { ?>
			elm = this.getElements("x" + infix + "_PC");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->PC->caption(), $store_payment->PC->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_payment_add->Customercode->Required) { ?>
			elm = this.getElements("x" + infix + "_Customercode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->Customercode->caption(), $store_payment->Customercode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_payment_add->Customername->Required) { ?>
			elm = this.getElements("x" + infix + "_Customername[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->Customername->caption(), $store_payment->Customername->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_payment_add->pharmacy_pocol->Required) { ?>
			elm = this.getElements("x" + infix + "_pharmacy_pocol");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->pharmacy_pocol->caption(), $store_payment->pharmacy_pocol->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_payment_add->Address1->Required) { ?>
			elm = this.getElements("x" + infix + "_Address1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->Address1->caption(), $store_payment->Address1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_payment_add->Address2->Required) { ?>
			elm = this.getElements("x" + infix + "_Address2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->Address2->caption(), $store_payment->Address2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_payment_add->Address3->Required) { ?>
			elm = this.getElements("x" + infix + "_Address3");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->Address3->caption(), $store_payment->Address3->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_payment_add->State->Required) { ?>
			elm = this.getElements("x" + infix + "_State");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->State->caption(), $store_payment->State->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_payment_add->Pincode->Required) { ?>
			elm = this.getElements("x" + infix + "_Pincode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->Pincode->caption(), $store_payment->Pincode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_payment_add->Phone->Required) { ?>
			elm = this.getElements("x" + infix + "_Phone");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->Phone->caption(), $store_payment->Phone->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_payment_add->Fax->Required) { ?>
			elm = this.getElements("x" + infix + "_Fax");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->Fax->caption(), $store_payment->Fax->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_payment_add->EEmail->Required) { ?>
			elm = this.getElements("x" + infix + "_EEmail");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->EEmail->caption(), $store_payment->EEmail->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_payment_add->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->HospID->caption(), $store_payment->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_payment_add->createdby->Required) { ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->createdby->caption(), $store_payment->createdby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_payment_add->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->createddatetime->caption(), $store_payment->createddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_payment_add->PharmacyID->Required) { ?>
			elm = this.getElements("x" + infix + "_PharmacyID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->PharmacyID->caption(), $store_payment->PharmacyID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_payment_add->BillTotalValue->Required) { ?>
			elm = this.getElements("x" + infix + "_BillTotalValue");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->BillTotalValue->caption(), $store_payment->BillTotalValue->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BillTotalValue");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_payment->BillTotalValue->errorMessage()) ?>");
		<?php if ($store_payment_add->GRNTotalValue->Required) { ?>
			elm = this.getElements("x" + infix + "_GRNTotalValue");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->GRNTotalValue->caption(), $store_payment->GRNTotalValue->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_GRNTotalValue");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_payment->GRNTotalValue->errorMessage()) ?>");
		<?php if ($store_payment_add->BillDiscount->Required) { ?>
			elm = this.getElements("x" + infix + "_BillDiscount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->BillDiscount->caption(), $store_payment->BillDiscount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BillDiscount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_payment->BillDiscount->errorMessage()) ?>");
		<?php if ($store_payment_add->BillUpload->Required) { ?>
			elm = this.getElements("x" + infix + "_BillUpload");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->BillUpload->caption(), $store_payment->BillUpload->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_payment_add->TransPort->Required) { ?>
			elm = this.getElements("x" + infix + "_TransPort");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->TransPort->caption(), $store_payment->TransPort->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TransPort");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_payment->TransPort->errorMessage()) ?>");
		<?php if ($store_payment_add->AnyOther->Required) { ?>
			elm = this.getElements("x" + infix + "_AnyOther");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->AnyOther->caption(), $store_payment->AnyOther->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_AnyOther");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_payment->AnyOther->errorMessage()) ?>");
		<?php if ($store_payment_add->voucher_type->Required) { ?>
			elm = this.getElements("x" + infix + "_voucher_type");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->voucher_type->caption(), $store_payment->voucher_type->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_payment_add->Details->Required) { ?>
			elm = this.getElements("x" + infix + "_Details");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->Details->caption(), $store_payment->Details->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_payment_add->ModeofPayment->Required) { ?>
			elm = this.getElements("x" + infix + "_ModeofPayment");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->ModeofPayment->caption(), $store_payment->ModeofPayment->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_payment_add->Amount->Required) { ?>
			elm = this.getElements("x" + infix + "_Amount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->Amount->caption(), $store_payment->Amount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Amount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_payment->Amount->errorMessage()) ?>");
		<?php if ($store_payment_add->BankName->Required) { ?>
			elm = this.getElements("x" + infix + "_BankName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->BankName->caption(), $store_payment->BankName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_payment_add->AccountNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_AccountNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->AccountNumber->caption(), $store_payment->AccountNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_payment_add->chequeNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_chequeNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->chequeNumber->caption(), $store_payment->chequeNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_payment_add->Remarks->Required) { ?>
			elm = this.getElements("x" + infix + "_Remarks");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->Remarks->caption(), $store_payment->Remarks->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_payment_add->SeectPaymentMode->Required) { ?>
			elm = this.getElements("x" + infix + "_SeectPaymentMode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->SeectPaymentMode->caption(), $store_payment->SeectPaymentMode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_payment_add->PaidAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_PaidAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->PaidAmount->caption(), $store_payment->PaidAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_payment_add->Currency->Required) { ?>
			elm = this.getElements("x" + infix + "_Currency");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->Currency->caption(), $store_payment->Currency->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_payment_add->CardNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_CardNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->CardNumber->caption(), $store_payment->CardNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_payment_add->BranchID->Required) { ?>
			elm = this.getElements("x" + infix + "_BranchID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_payment->BranchID->caption(), $store_payment->BranchID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BranchID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_payment->BranchID->errorMessage()) ?>");
		<?php if ($store_payment_add->StoreID->Required) { ?>
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
fstore_paymentadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fstore_paymentadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fstore_paymentadd.lists["x_Customername[]"] = <?php echo $store_payment_add->Customername->Lookup->toClientList() ?>;
fstore_paymentadd.lists["x_Customername[]"].options = <?php echo JsonEncode($store_payment_add->Customername->lookupOptions()) ?>;
fstore_paymentadd.lists["x_pharmacy_pocol"] = <?php echo $store_payment_add->pharmacy_pocol->Lookup->toClientList() ?>;
fstore_paymentadd.lists["x_pharmacy_pocol"].options = <?php echo JsonEncode($store_payment_add->pharmacy_pocol->lookupOptions()) ?>;
fstore_paymentadd.lists["x_ModeofPayment"] = <?php echo $store_payment_add->ModeofPayment->Lookup->toClientList() ?>;
fstore_paymentadd.lists["x_ModeofPayment"].options = <?php echo JsonEncode($store_payment_add->ModeofPayment->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $store_payment_add->showPageHeader(); ?>
<?php
$store_payment_add->showMessage();
?>
<form name="fstore_paymentadd" id="fstore_paymentadd" class="<?php echo $store_payment_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($store_payment_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $store_payment_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="store_payment">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$store_payment_add->IsModal ?>">
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($store_payment->PAYNO->Visible) { // PAYNO ?>
	<div id="r_PAYNO" class="form-group row">
		<label id="elh_store_payment_PAYNO" for="x_PAYNO" class="<?php echo $store_payment_add->LeftColumnClass ?>"><script id="tpc_store_payment_PAYNO" class="store_paymentadd" type="text/html"><span><?php echo $store_payment->PAYNO->caption() ?><?php echo ($store_payment->PAYNO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_payment_add->RightColumnClass ?>"><div<?php echo $store_payment->PAYNO->cellAttributes() ?>>
<script id="tpx_store_payment_PAYNO" class="store_paymentadd" type="text/html">
<span id="el_store_payment_PAYNO">
<input type="text" data-table="store_payment" data-field="x_PAYNO" name="x_PAYNO" id="x_PAYNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_payment->PAYNO->getPlaceHolder()) ?>" value="<?php echo $store_payment->PAYNO->EditValue ?>"<?php echo $store_payment->PAYNO->editAttributes() ?>>
</span>
</script>
<?php echo $store_payment->PAYNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_payment->DT->Visible) { // DT ?>
	<div id="r_DT" class="form-group row">
		<label id="elh_store_payment_DT" for="x_DT" class="<?php echo $store_payment_add->LeftColumnClass ?>"><script id="tpc_store_payment_DT" class="store_paymentadd" type="text/html"><span><?php echo $store_payment->DT->caption() ?><?php echo ($store_payment->DT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_payment_add->RightColumnClass ?>"><div<?php echo $store_payment->DT->cellAttributes() ?>>
<script id="tpx_store_payment_DT" class="store_paymentadd" type="text/html">
<span id="el_store_payment_DT">
<input type="text" data-table="store_payment" data-field="x_DT" data-format="7" name="x_DT" id="x_DT" placeholder="<?php echo HtmlEncode($store_payment->DT->getPlaceHolder()) ?>" value="<?php echo $store_payment->DT->EditValue ?>"<?php echo $store_payment->DT->editAttributes() ?>>
<?php if (!$store_payment->DT->ReadOnly && !$store_payment->DT->Disabled && !isset($store_payment->DT->EditAttrs["readonly"]) && !isset($store_payment->DT->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="store_paymentadd_js">
ew.createDateTimePicker("fstore_paymentadd", "x_DT", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php echo $store_payment->DT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_payment->YM->Visible) { // YM ?>
	<div id="r_YM" class="form-group row">
		<label id="elh_store_payment_YM" for="x_YM" class="<?php echo $store_payment_add->LeftColumnClass ?>"><script id="tpc_store_payment_YM" class="store_paymentadd" type="text/html"><span><?php echo $store_payment->YM->caption() ?><?php echo ($store_payment->YM->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_payment_add->RightColumnClass ?>"><div<?php echo $store_payment->YM->cellAttributes() ?>>
<script id="tpx_store_payment_YM" class="store_paymentadd" type="text/html">
<span id="el_store_payment_YM">
<input type="text" data-table="store_payment" data-field="x_YM" name="x_YM" id="x_YM" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_payment->YM->getPlaceHolder()) ?>" value="<?php echo $store_payment->YM->EditValue ?>"<?php echo $store_payment->YM->editAttributes() ?>>
</span>
</script>
<?php echo $store_payment->YM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_payment->PC->Visible) { // PC ?>
	<div id="r_PC" class="form-group row">
		<label id="elh_store_payment_PC" for="x_PC" class="<?php echo $store_payment_add->LeftColumnClass ?>"><script id="tpc_store_payment_PC" class="store_paymentadd" type="text/html"><span><?php echo $store_payment->PC->caption() ?><?php echo ($store_payment->PC->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_payment_add->RightColumnClass ?>"><div<?php echo $store_payment->PC->cellAttributes() ?>>
<script id="tpx_store_payment_PC" class="store_paymentadd" type="text/html">
<span id="el_store_payment_PC">
<input type="text" data-table="store_payment" data-field="x_PC" name="x_PC" id="x_PC" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_payment->PC->getPlaceHolder()) ?>" value="<?php echo $store_payment->PC->EditValue ?>"<?php echo $store_payment->PC->editAttributes() ?>>
</span>
</script>
<?php echo $store_payment->PC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_payment->Customercode->Visible) { // Customercode ?>
	<div id="r_Customercode" class="form-group row">
		<label id="elh_store_payment_Customercode" for="x_Customercode" class="<?php echo $store_payment_add->LeftColumnClass ?>"><script id="tpc_store_payment_Customercode" class="store_paymentadd" type="text/html"><span><?php echo $store_payment->Customercode->caption() ?><?php echo ($store_payment->Customercode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_payment_add->RightColumnClass ?>"><div<?php echo $store_payment->Customercode->cellAttributes() ?>>
<script id="tpx_store_payment_Customercode" class="store_paymentadd" type="text/html">
<span id="el_store_payment_Customercode">
<input type="text" data-table="store_payment" data-field="x_Customercode" name="x_Customercode" id="x_Customercode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_payment->Customercode->getPlaceHolder()) ?>" value="<?php echo $store_payment->Customercode->EditValue ?>"<?php echo $store_payment->Customercode->editAttributes() ?>>
</span>
</script>
<?php echo $store_payment->Customercode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_payment->Customername->Visible) { // Customername ?>
	<div id="r_Customername" class="form-group row">
		<label id="elh_store_payment_Customername" for="x_Customername" class="<?php echo $store_payment_add->LeftColumnClass ?>"><script id="tpc_store_payment_Customername" class="store_paymentadd" type="text/html"><span><?php echo $store_payment->Customername->caption() ?><?php echo ($store_payment->Customername->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_payment_add->RightColumnClass ?>"><div<?php echo $store_payment->Customername->cellAttributes() ?>>
<script id="tpx_store_payment_Customername" class="store_paymentadd" type="text/html">
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
</script>
<?php echo $store_payment->Customername->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_payment->pharmacy_pocol->Visible) { // pharmacy_pocol ?>
	<div id="r_pharmacy_pocol" class="form-group row">
		<label id="elh_store_payment_pharmacy_pocol" for="x_pharmacy_pocol" class="<?php echo $store_payment_add->LeftColumnClass ?>"><script id="tpc_store_payment_pharmacy_pocol" class="store_paymentadd" type="text/html"><span><?php echo $store_payment->pharmacy_pocol->caption() ?><?php echo ($store_payment->pharmacy_pocol->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_payment_add->RightColumnClass ?>"><div<?php echo $store_payment->pharmacy_pocol->cellAttributes() ?>>
<script id="tpx_store_payment_pharmacy_pocol" class="store_paymentadd" type="text/html">
<span id="el_store_payment_pharmacy_pocol">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="store_payment" data-field="x_pharmacy_pocol" data-value-separator="<?php echo $store_payment->pharmacy_pocol->displayValueSeparatorAttribute() ?>" id="x_pharmacy_pocol" name="x_pharmacy_pocol"<?php echo $store_payment->pharmacy_pocol->editAttributes() ?>>
		<?php echo $store_payment->pharmacy_pocol->selectOptionListHtml("x_pharmacy_pocol") ?>
	</select>
</div>
<?php echo $store_payment->pharmacy_pocol->Lookup->getParamTag("p_x_pharmacy_pocol") ?>
</span>
</script>
<?php echo $store_payment->pharmacy_pocol->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_payment->Address1->Visible) { // Address1 ?>
	<div id="r_Address1" class="form-group row">
		<label id="elh_store_payment_Address1" for="x_Address1" class="<?php echo $store_payment_add->LeftColumnClass ?>"><script id="tpc_store_payment_Address1" class="store_paymentadd" type="text/html"><span><?php echo $store_payment->Address1->caption() ?><?php echo ($store_payment->Address1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_payment_add->RightColumnClass ?>"><div<?php echo $store_payment->Address1->cellAttributes() ?>>
<script id="tpx_store_payment_Address1" class="store_paymentadd" type="text/html">
<span id="el_store_payment_Address1">
<input type="text" data-table="store_payment" data-field="x_Address1" name="x_Address1" id="x_Address1" placeholder="<?php echo HtmlEncode($store_payment->Address1->getPlaceHolder()) ?>" value="<?php echo $store_payment->Address1->EditValue ?>"<?php echo $store_payment->Address1->editAttributes() ?>>
</span>
</script>
<?php echo $store_payment->Address1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_payment->Address2->Visible) { // Address2 ?>
	<div id="r_Address2" class="form-group row">
		<label id="elh_store_payment_Address2" for="x_Address2" class="<?php echo $store_payment_add->LeftColumnClass ?>"><script id="tpc_store_payment_Address2" class="store_paymentadd" type="text/html"><span><?php echo $store_payment->Address2->caption() ?><?php echo ($store_payment->Address2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_payment_add->RightColumnClass ?>"><div<?php echo $store_payment->Address2->cellAttributes() ?>>
<script id="tpx_store_payment_Address2" class="store_paymentadd" type="text/html">
<span id="el_store_payment_Address2">
<input type="text" data-table="store_payment" data-field="x_Address2" name="x_Address2" id="x_Address2" placeholder="<?php echo HtmlEncode($store_payment->Address2->getPlaceHolder()) ?>" value="<?php echo $store_payment->Address2->EditValue ?>"<?php echo $store_payment->Address2->editAttributes() ?>>
</span>
</script>
<?php echo $store_payment->Address2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_payment->Address3->Visible) { // Address3 ?>
	<div id="r_Address3" class="form-group row">
		<label id="elh_store_payment_Address3" for="x_Address3" class="<?php echo $store_payment_add->LeftColumnClass ?>"><script id="tpc_store_payment_Address3" class="store_paymentadd" type="text/html"><span><?php echo $store_payment->Address3->caption() ?><?php echo ($store_payment->Address3->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_payment_add->RightColumnClass ?>"><div<?php echo $store_payment->Address3->cellAttributes() ?>>
<script id="tpx_store_payment_Address3" class="store_paymentadd" type="text/html">
<span id="el_store_payment_Address3">
<input type="text" data-table="store_payment" data-field="x_Address3" name="x_Address3" id="x_Address3" placeholder="<?php echo HtmlEncode($store_payment->Address3->getPlaceHolder()) ?>" value="<?php echo $store_payment->Address3->EditValue ?>"<?php echo $store_payment->Address3->editAttributes() ?>>
</span>
</script>
<?php echo $store_payment->Address3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_payment->State->Visible) { // State ?>
	<div id="r_State" class="form-group row">
		<label id="elh_store_payment_State" for="x_State" class="<?php echo $store_payment_add->LeftColumnClass ?>"><script id="tpc_store_payment_State" class="store_paymentadd" type="text/html"><span><?php echo $store_payment->State->caption() ?><?php echo ($store_payment->State->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_payment_add->RightColumnClass ?>"><div<?php echo $store_payment->State->cellAttributes() ?>>
<script id="tpx_store_payment_State" class="store_paymentadd" type="text/html">
<span id="el_store_payment_State">
<input type="text" data-table="store_payment" data-field="x_State" name="x_State" id="x_State" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_payment->State->getPlaceHolder()) ?>" value="<?php echo $store_payment->State->EditValue ?>"<?php echo $store_payment->State->editAttributes() ?>>
</span>
</script>
<?php echo $store_payment->State->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_payment->Pincode->Visible) { // Pincode ?>
	<div id="r_Pincode" class="form-group row">
		<label id="elh_store_payment_Pincode" for="x_Pincode" class="<?php echo $store_payment_add->LeftColumnClass ?>"><script id="tpc_store_payment_Pincode" class="store_paymentadd" type="text/html"><span><?php echo $store_payment->Pincode->caption() ?><?php echo ($store_payment->Pincode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_payment_add->RightColumnClass ?>"><div<?php echo $store_payment->Pincode->cellAttributes() ?>>
<script id="tpx_store_payment_Pincode" class="store_paymentadd" type="text/html">
<span id="el_store_payment_Pincode">
<input type="text" data-table="store_payment" data-field="x_Pincode" name="x_Pincode" id="x_Pincode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_payment->Pincode->getPlaceHolder()) ?>" value="<?php echo $store_payment->Pincode->EditValue ?>"<?php echo $store_payment->Pincode->editAttributes() ?>>
</span>
</script>
<?php echo $store_payment->Pincode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_payment->Phone->Visible) { // Phone ?>
	<div id="r_Phone" class="form-group row">
		<label id="elh_store_payment_Phone" for="x_Phone" class="<?php echo $store_payment_add->LeftColumnClass ?>"><script id="tpc_store_payment_Phone" class="store_paymentadd" type="text/html"><span><?php echo $store_payment->Phone->caption() ?><?php echo ($store_payment->Phone->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_payment_add->RightColumnClass ?>"><div<?php echo $store_payment->Phone->cellAttributes() ?>>
<script id="tpx_store_payment_Phone" class="store_paymentadd" type="text/html">
<span id="el_store_payment_Phone">
<input type="text" data-table="store_payment" data-field="x_Phone" name="x_Phone" id="x_Phone" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_payment->Phone->getPlaceHolder()) ?>" value="<?php echo $store_payment->Phone->EditValue ?>"<?php echo $store_payment->Phone->editAttributes() ?>>
</span>
</script>
<?php echo $store_payment->Phone->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_payment->Fax->Visible) { // Fax ?>
	<div id="r_Fax" class="form-group row">
		<label id="elh_store_payment_Fax" for="x_Fax" class="<?php echo $store_payment_add->LeftColumnClass ?>"><script id="tpc_store_payment_Fax" class="store_paymentadd" type="text/html"><span><?php echo $store_payment->Fax->caption() ?><?php echo ($store_payment->Fax->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_payment_add->RightColumnClass ?>"><div<?php echo $store_payment->Fax->cellAttributes() ?>>
<script id="tpx_store_payment_Fax" class="store_paymentadd" type="text/html">
<span id="el_store_payment_Fax">
<input type="text" data-table="store_payment" data-field="x_Fax" name="x_Fax" id="x_Fax" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_payment->Fax->getPlaceHolder()) ?>" value="<?php echo $store_payment->Fax->EditValue ?>"<?php echo $store_payment->Fax->editAttributes() ?>>
</span>
</script>
<?php echo $store_payment->Fax->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_payment->EEmail->Visible) { // EEmail ?>
	<div id="r_EEmail" class="form-group row">
		<label id="elh_store_payment_EEmail" for="x_EEmail" class="<?php echo $store_payment_add->LeftColumnClass ?>"><script id="tpc_store_payment_EEmail" class="store_paymentadd" type="text/html"><span><?php echo $store_payment->EEmail->caption() ?><?php echo ($store_payment->EEmail->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_payment_add->RightColumnClass ?>"><div<?php echo $store_payment->EEmail->cellAttributes() ?>>
<script id="tpx_store_payment_EEmail" class="store_paymentadd" type="text/html">
<span id="el_store_payment_EEmail">
<input type="text" data-table="store_payment" data-field="x_EEmail" name="x_EEmail" id="x_EEmail" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_payment->EEmail->getPlaceHolder()) ?>" value="<?php echo $store_payment->EEmail->EditValue ?>"<?php echo $store_payment->EEmail->editAttributes() ?>>
</span>
</script>
<?php echo $store_payment->EEmail->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_payment->BillTotalValue->Visible) { // BillTotalValue ?>
	<div id="r_BillTotalValue" class="form-group row">
		<label id="elh_store_payment_BillTotalValue" for="x_BillTotalValue" class="<?php echo $store_payment_add->LeftColumnClass ?>"><script id="tpc_store_payment_BillTotalValue" class="store_paymentadd" type="text/html"><span><?php echo $store_payment->BillTotalValue->caption() ?><?php echo ($store_payment->BillTotalValue->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_payment_add->RightColumnClass ?>"><div<?php echo $store_payment->BillTotalValue->cellAttributes() ?>>
<script id="tpx_store_payment_BillTotalValue" class="store_paymentadd" type="text/html">
<span id="el_store_payment_BillTotalValue">
<input type="text" data-table="store_payment" data-field="x_BillTotalValue" name="x_BillTotalValue" id="x_BillTotalValue" size="30" placeholder="<?php echo HtmlEncode($store_payment->BillTotalValue->getPlaceHolder()) ?>" value="<?php echo $store_payment->BillTotalValue->EditValue ?>"<?php echo $store_payment->BillTotalValue->editAttributes() ?>>
</span>
</script>
<?php echo $store_payment->BillTotalValue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_payment->GRNTotalValue->Visible) { // GRNTotalValue ?>
	<div id="r_GRNTotalValue" class="form-group row">
		<label id="elh_store_payment_GRNTotalValue" for="x_GRNTotalValue" class="<?php echo $store_payment_add->LeftColumnClass ?>"><script id="tpc_store_payment_GRNTotalValue" class="store_paymentadd" type="text/html"><span><?php echo $store_payment->GRNTotalValue->caption() ?><?php echo ($store_payment->GRNTotalValue->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_payment_add->RightColumnClass ?>"><div<?php echo $store_payment->GRNTotalValue->cellAttributes() ?>>
<script id="tpx_store_payment_GRNTotalValue" class="store_paymentadd" type="text/html">
<span id="el_store_payment_GRNTotalValue">
<input type="text" data-table="store_payment" data-field="x_GRNTotalValue" name="x_GRNTotalValue" id="x_GRNTotalValue" size="30" placeholder="<?php echo HtmlEncode($store_payment->GRNTotalValue->getPlaceHolder()) ?>" value="<?php echo $store_payment->GRNTotalValue->EditValue ?>"<?php echo $store_payment->GRNTotalValue->editAttributes() ?>>
</span>
</script>
<?php echo $store_payment->GRNTotalValue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_payment->BillDiscount->Visible) { // BillDiscount ?>
	<div id="r_BillDiscount" class="form-group row">
		<label id="elh_store_payment_BillDiscount" for="x_BillDiscount" class="<?php echo $store_payment_add->LeftColumnClass ?>"><script id="tpc_store_payment_BillDiscount" class="store_paymentadd" type="text/html"><span><?php echo $store_payment->BillDiscount->caption() ?><?php echo ($store_payment->BillDiscount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_payment_add->RightColumnClass ?>"><div<?php echo $store_payment->BillDiscount->cellAttributes() ?>>
<script id="tpx_store_payment_BillDiscount" class="store_paymentadd" type="text/html">
<span id="el_store_payment_BillDiscount">
<input type="text" data-table="store_payment" data-field="x_BillDiscount" name="x_BillDiscount" id="x_BillDiscount" size="30" placeholder="<?php echo HtmlEncode($store_payment->BillDiscount->getPlaceHolder()) ?>" value="<?php echo $store_payment->BillDiscount->EditValue ?>"<?php echo $store_payment->BillDiscount->editAttributes() ?>>
</span>
</script>
<?php echo $store_payment->BillDiscount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_payment->BillUpload->Visible) { // BillUpload ?>
	<div id="r_BillUpload" class="form-group row">
		<label id="elh_store_payment_BillUpload" for="x_BillUpload" class="<?php echo $store_payment_add->LeftColumnClass ?>"><script id="tpc_store_payment_BillUpload" class="store_paymentadd" type="text/html"><span><?php echo $store_payment->BillUpload->caption() ?><?php echo ($store_payment->BillUpload->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_payment_add->RightColumnClass ?>"><div<?php echo $store_payment->BillUpload->cellAttributes() ?>>
<script id="tpx_store_payment_BillUpload" class="store_paymentadd" type="text/html">
<span id="el_store_payment_BillUpload">
<textarea data-table="store_payment" data-field="x_BillUpload" name="x_BillUpload" id="x_BillUpload" cols="35" rows="4" placeholder="<?php echo HtmlEncode($store_payment->BillUpload->getPlaceHolder()) ?>"<?php echo $store_payment->BillUpload->editAttributes() ?>><?php echo $store_payment->BillUpload->EditValue ?></textarea>
</span>
</script>
<?php echo $store_payment->BillUpload->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_payment->TransPort->Visible) { // TransPort ?>
	<div id="r_TransPort" class="form-group row">
		<label id="elh_store_payment_TransPort" for="x_TransPort" class="<?php echo $store_payment_add->LeftColumnClass ?>"><script id="tpc_store_payment_TransPort" class="store_paymentadd" type="text/html"><span><?php echo $store_payment->TransPort->caption() ?><?php echo ($store_payment->TransPort->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_payment_add->RightColumnClass ?>"><div<?php echo $store_payment->TransPort->cellAttributes() ?>>
<script id="tpx_store_payment_TransPort" class="store_paymentadd" type="text/html">
<span id="el_store_payment_TransPort">
<input type="text" data-table="store_payment" data-field="x_TransPort" name="x_TransPort" id="x_TransPort" size="30" placeholder="<?php echo HtmlEncode($store_payment->TransPort->getPlaceHolder()) ?>" value="<?php echo $store_payment->TransPort->EditValue ?>"<?php echo $store_payment->TransPort->editAttributes() ?>>
</span>
</script>
<?php echo $store_payment->TransPort->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_payment->AnyOther->Visible) { // AnyOther ?>
	<div id="r_AnyOther" class="form-group row">
		<label id="elh_store_payment_AnyOther" for="x_AnyOther" class="<?php echo $store_payment_add->LeftColumnClass ?>"><script id="tpc_store_payment_AnyOther" class="store_paymentadd" type="text/html"><span><?php echo $store_payment->AnyOther->caption() ?><?php echo ($store_payment->AnyOther->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_payment_add->RightColumnClass ?>"><div<?php echo $store_payment->AnyOther->cellAttributes() ?>>
<script id="tpx_store_payment_AnyOther" class="store_paymentadd" type="text/html">
<span id="el_store_payment_AnyOther">
<input type="text" data-table="store_payment" data-field="x_AnyOther" name="x_AnyOther" id="x_AnyOther" size="30" placeholder="<?php echo HtmlEncode($store_payment->AnyOther->getPlaceHolder()) ?>" value="<?php echo $store_payment->AnyOther->EditValue ?>"<?php echo $store_payment->AnyOther->editAttributes() ?>>
</span>
</script>
<?php echo $store_payment->AnyOther->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_payment->voucher_type->Visible) { // voucher_type ?>
	<div id="r_voucher_type" class="form-group row">
		<label id="elh_store_payment_voucher_type" for="x_voucher_type" class="<?php echo $store_payment_add->LeftColumnClass ?>"><script id="tpc_store_payment_voucher_type" class="store_paymentadd" type="text/html"><span><?php echo $store_payment->voucher_type->caption() ?><?php echo ($store_payment->voucher_type->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_payment_add->RightColumnClass ?>"><div<?php echo $store_payment->voucher_type->cellAttributes() ?>>
<script id="tpx_store_payment_voucher_type" class="store_paymentadd" type="text/html">
<span id="el_store_payment_voucher_type">
<input type="text" data-table="store_payment" data-field="x_voucher_type" name="x_voucher_type" id="x_voucher_type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_payment->voucher_type->getPlaceHolder()) ?>" value="<?php echo $store_payment->voucher_type->EditValue ?>"<?php echo $store_payment->voucher_type->editAttributes() ?>>
</span>
</script>
<?php echo $store_payment->voucher_type->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_payment->Details->Visible) { // Details ?>
	<div id="r_Details" class="form-group row">
		<label id="elh_store_payment_Details" for="x_Details" class="<?php echo $store_payment_add->LeftColumnClass ?>"><script id="tpc_store_payment_Details" class="store_paymentadd" type="text/html"><span><?php echo $store_payment->Details->caption() ?><?php echo ($store_payment->Details->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_payment_add->RightColumnClass ?>"><div<?php echo $store_payment->Details->cellAttributes() ?>>
<script id="tpx_store_payment_Details" class="store_paymentadd" type="text/html">
<span id="el_store_payment_Details">
<input type="text" data-table="store_payment" data-field="x_Details" name="x_Details" id="x_Details" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_payment->Details->getPlaceHolder()) ?>" value="<?php echo $store_payment->Details->EditValue ?>"<?php echo $store_payment->Details->editAttributes() ?>>
</span>
</script>
<?php echo $store_payment->Details->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_payment->ModeofPayment->Visible) { // ModeofPayment ?>
	<div id="r_ModeofPayment" class="form-group row">
		<label id="elh_store_payment_ModeofPayment" for="x_ModeofPayment" class="<?php echo $store_payment_add->LeftColumnClass ?>"><script id="tpc_store_payment_ModeofPayment" class="store_paymentadd" type="text/html"><span><?php echo $store_payment->ModeofPayment->caption() ?><?php echo ($store_payment->ModeofPayment->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_payment_add->RightColumnClass ?>"><div<?php echo $store_payment->ModeofPayment->cellAttributes() ?>>
<script id="tpx_store_payment_ModeofPayment" class="store_paymentadd" type="text/html">
<span id="el_store_payment_ModeofPayment">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="store_payment" data-field="x_ModeofPayment" data-value-separator="<?php echo $store_payment->ModeofPayment->displayValueSeparatorAttribute() ?>" id="x_ModeofPayment" name="x_ModeofPayment"<?php echo $store_payment->ModeofPayment->editAttributes() ?>>
		<?php echo $store_payment->ModeofPayment->selectOptionListHtml("x_ModeofPayment") ?>
	</select>
</div>
<?php echo $store_payment->ModeofPayment->Lookup->getParamTag("p_x_ModeofPayment") ?>
</span>
</script>
<?php echo $store_payment->ModeofPayment->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_payment->Amount->Visible) { // Amount ?>
	<div id="r_Amount" class="form-group row">
		<label id="elh_store_payment_Amount" for="x_Amount" class="<?php echo $store_payment_add->LeftColumnClass ?>"><script id="tpc_store_payment_Amount" class="store_paymentadd" type="text/html"><span><?php echo $store_payment->Amount->caption() ?><?php echo ($store_payment->Amount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_payment_add->RightColumnClass ?>"><div<?php echo $store_payment->Amount->cellAttributes() ?>>
<script id="tpx_store_payment_Amount" class="store_paymentadd" type="text/html">
<span id="el_store_payment_Amount">
<input type="text" data-table="store_payment" data-field="x_Amount" name="x_Amount" id="x_Amount" size="30" placeholder="<?php echo HtmlEncode($store_payment->Amount->getPlaceHolder()) ?>" value="<?php echo $store_payment->Amount->EditValue ?>"<?php echo $store_payment->Amount->editAttributes() ?>>
</span>
</script>
<?php echo $store_payment->Amount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_payment->BankName->Visible) { // BankName ?>
	<div id="r_BankName" class="form-group row">
		<label id="elh_store_payment_BankName" for="x_BankName" class="<?php echo $store_payment_add->LeftColumnClass ?>"><script id="tpc_store_payment_BankName" class="store_paymentadd" type="text/html"><span><?php echo $store_payment->BankName->caption() ?><?php echo ($store_payment->BankName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_payment_add->RightColumnClass ?>"><div<?php echo $store_payment->BankName->cellAttributes() ?>>
<script id="tpx_store_payment_BankName" class="store_paymentadd" type="text/html">
<span id="el_store_payment_BankName">
<input type="text" data-table="store_payment" data-field="x_BankName" name="x_BankName" id="x_BankName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_payment->BankName->getPlaceHolder()) ?>" value="<?php echo $store_payment->BankName->EditValue ?>"<?php echo $store_payment->BankName->editAttributes() ?>>
</span>
</script>
<?php echo $store_payment->BankName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_payment->AccountNumber->Visible) { // AccountNumber ?>
	<div id="r_AccountNumber" class="form-group row">
		<label id="elh_store_payment_AccountNumber" for="x_AccountNumber" class="<?php echo $store_payment_add->LeftColumnClass ?>"><script id="tpc_store_payment_AccountNumber" class="store_paymentadd" type="text/html"><span><?php echo $store_payment->AccountNumber->caption() ?><?php echo ($store_payment->AccountNumber->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_payment_add->RightColumnClass ?>"><div<?php echo $store_payment->AccountNumber->cellAttributes() ?>>
<script id="tpx_store_payment_AccountNumber" class="store_paymentadd" type="text/html">
<span id="el_store_payment_AccountNumber">
<input type="text" data-table="store_payment" data-field="x_AccountNumber" name="x_AccountNumber" id="x_AccountNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_payment->AccountNumber->getPlaceHolder()) ?>" value="<?php echo $store_payment->AccountNumber->EditValue ?>"<?php echo $store_payment->AccountNumber->editAttributes() ?>>
</span>
</script>
<?php echo $store_payment->AccountNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_payment->chequeNumber->Visible) { // chequeNumber ?>
	<div id="r_chequeNumber" class="form-group row">
		<label id="elh_store_payment_chequeNumber" for="x_chequeNumber" class="<?php echo $store_payment_add->LeftColumnClass ?>"><script id="tpc_store_payment_chequeNumber" class="store_paymentadd" type="text/html"><span><?php echo $store_payment->chequeNumber->caption() ?><?php echo ($store_payment->chequeNumber->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_payment_add->RightColumnClass ?>"><div<?php echo $store_payment->chequeNumber->cellAttributes() ?>>
<script id="tpx_store_payment_chequeNumber" class="store_paymentadd" type="text/html">
<span id="el_store_payment_chequeNumber">
<input type="text" data-table="store_payment" data-field="x_chequeNumber" name="x_chequeNumber" id="x_chequeNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_payment->chequeNumber->getPlaceHolder()) ?>" value="<?php echo $store_payment->chequeNumber->EditValue ?>"<?php echo $store_payment->chequeNumber->editAttributes() ?>>
</span>
</script>
<?php echo $store_payment->chequeNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_payment->Remarks->Visible) { // Remarks ?>
	<div id="r_Remarks" class="form-group row">
		<label id="elh_store_payment_Remarks" for="x_Remarks" class="<?php echo $store_payment_add->LeftColumnClass ?>"><script id="tpc_store_payment_Remarks" class="store_paymentadd" type="text/html"><span><?php echo $store_payment->Remarks->caption() ?><?php echo ($store_payment->Remarks->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_payment_add->RightColumnClass ?>"><div<?php echo $store_payment->Remarks->cellAttributes() ?>>
<script id="tpx_store_payment_Remarks" class="store_paymentadd" type="text/html">
<span id="el_store_payment_Remarks">
<textarea data-table="store_payment" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" cols="35" rows="4" placeholder="<?php echo HtmlEncode($store_payment->Remarks->getPlaceHolder()) ?>"<?php echo $store_payment->Remarks->editAttributes() ?>><?php echo $store_payment->Remarks->EditValue ?></textarea>
</span>
</script>
<?php echo $store_payment->Remarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_payment->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
	<div id="r_SeectPaymentMode" class="form-group row">
		<label id="elh_store_payment_SeectPaymentMode" for="x_SeectPaymentMode" class="<?php echo $store_payment_add->LeftColumnClass ?>"><script id="tpc_store_payment_SeectPaymentMode" class="store_paymentadd" type="text/html"><span><?php echo $store_payment->SeectPaymentMode->caption() ?><?php echo ($store_payment->SeectPaymentMode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_payment_add->RightColumnClass ?>"><div<?php echo $store_payment->SeectPaymentMode->cellAttributes() ?>>
<script id="tpx_store_payment_SeectPaymentMode" class="store_paymentadd" type="text/html">
<span id="el_store_payment_SeectPaymentMode">
<input type="text" data-table="store_payment" data-field="x_SeectPaymentMode" name="x_SeectPaymentMode" id="x_SeectPaymentMode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_payment->SeectPaymentMode->getPlaceHolder()) ?>" value="<?php echo $store_payment->SeectPaymentMode->EditValue ?>"<?php echo $store_payment->SeectPaymentMode->editAttributes() ?>>
</span>
</script>
<?php echo $store_payment->SeectPaymentMode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_payment->PaidAmount->Visible) { // PaidAmount ?>
	<div id="r_PaidAmount" class="form-group row">
		<label id="elh_store_payment_PaidAmount" for="x_PaidAmount" class="<?php echo $store_payment_add->LeftColumnClass ?>"><script id="tpc_store_payment_PaidAmount" class="store_paymentadd" type="text/html"><span><?php echo $store_payment->PaidAmount->caption() ?><?php echo ($store_payment->PaidAmount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_payment_add->RightColumnClass ?>"><div<?php echo $store_payment->PaidAmount->cellAttributes() ?>>
<script id="tpx_store_payment_PaidAmount" class="store_paymentadd" type="text/html">
<span id="el_store_payment_PaidAmount">
<input type="text" data-table="store_payment" data-field="x_PaidAmount" name="x_PaidAmount" id="x_PaidAmount" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_payment->PaidAmount->getPlaceHolder()) ?>" value="<?php echo $store_payment->PaidAmount->EditValue ?>"<?php echo $store_payment->PaidAmount->editAttributes() ?>>
</span>
</script>
<?php echo $store_payment->PaidAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_payment->Currency->Visible) { // Currency ?>
	<div id="r_Currency" class="form-group row">
		<label id="elh_store_payment_Currency" for="x_Currency" class="<?php echo $store_payment_add->LeftColumnClass ?>"><script id="tpc_store_payment_Currency" class="store_paymentadd" type="text/html"><span><?php echo $store_payment->Currency->caption() ?><?php echo ($store_payment->Currency->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_payment_add->RightColumnClass ?>"><div<?php echo $store_payment->Currency->cellAttributes() ?>>
<script id="tpx_store_payment_Currency" class="store_paymentadd" type="text/html">
<span id="el_store_payment_Currency">
<input type="text" data-table="store_payment" data-field="x_Currency" name="x_Currency" id="x_Currency" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_payment->Currency->getPlaceHolder()) ?>" value="<?php echo $store_payment->Currency->EditValue ?>"<?php echo $store_payment->Currency->editAttributes() ?>>
</span>
</script>
<?php echo $store_payment->Currency->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_payment->CardNumber->Visible) { // CardNumber ?>
	<div id="r_CardNumber" class="form-group row">
		<label id="elh_store_payment_CardNumber" for="x_CardNumber" class="<?php echo $store_payment_add->LeftColumnClass ?>"><script id="tpc_store_payment_CardNumber" class="store_paymentadd" type="text/html"><span><?php echo $store_payment->CardNumber->caption() ?><?php echo ($store_payment->CardNumber->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_payment_add->RightColumnClass ?>"><div<?php echo $store_payment->CardNumber->cellAttributes() ?>>
<script id="tpx_store_payment_CardNumber" class="store_paymentadd" type="text/html">
<span id="el_store_payment_CardNumber">
<input type="text" data-table="store_payment" data-field="x_CardNumber" name="x_CardNumber" id="x_CardNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_payment->CardNumber->getPlaceHolder()) ?>" value="<?php echo $store_payment->CardNumber->EditValue ?>"<?php echo $store_payment->CardNumber->editAttributes() ?>>
</span>
</script>
<?php echo $store_payment->CardNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_payment->BranchID->Visible) { // BranchID ?>
	<div id="r_BranchID" class="form-group row">
		<label id="elh_store_payment_BranchID" for="x_BranchID" class="<?php echo $store_payment_add->LeftColumnClass ?>"><script id="tpc_store_payment_BranchID" class="store_paymentadd" type="text/html"><span><?php echo $store_payment->BranchID->caption() ?><?php echo ($store_payment->BranchID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_payment_add->RightColumnClass ?>"><div<?php echo $store_payment->BranchID->cellAttributes() ?>>
<script id="tpx_store_payment_BranchID" class="store_paymentadd" type="text/html">
<span id="el_store_payment_BranchID">
<input type="text" data-table="store_payment" data-field="x_BranchID" name="x_BranchID" id="x_BranchID" size="30" placeholder="<?php echo HtmlEncode($store_payment->BranchID->getPlaceHolder()) ?>" value="<?php echo $store_payment->BranchID->EditValue ?>"<?php echo $store_payment->BranchID->editAttributes() ?>>
</span>
</script>
<?php echo $store_payment->BranchID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_payment->StoreID->Visible) { // StoreID ?>
	<div id="r_StoreID" class="form-group row">
		<label id="elh_store_payment_StoreID" for="x_StoreID" class="<?php echo $store_payment_add->LeftColumnClass ?>"><script id="tpc_store_payment_StoreID" class="store_paymentadd" type="text/html"><span><?php echo $store_payment->StoreID->caption() ?><?php echo ($store_payment->StoreID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_payment_add->RightColumnClass ?>"><div<?php echo $store_payment->StoreID->cellAttributes() ?>>
<script id="tpx_store_payment_StoreID" class="store_paymentadd" type="text/html">
<span id="el_store_payment_StoreID">
<input type="text" data-table="store_payment" data-field="x_StoreID" name="x_StoreID" id="x_StoreID" size="30" placeholder="<?php echo HtmlEncode($store_payment->StoreID->getPlaceHolder()) ?>" value="<?php echo $store_payment->StoreID->EditValue ?>"<?php echo $store_payment->StoreID->editAttributes() ?>>
</span>
</script>
<?php echo $store_payment->StoreID->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_store_paymentadd" class="ew-custom-template"></div>
<script id="tpm_store_paymentadd" type="text/html">
<div id="ct_store_payment_add"><style>
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
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}
#customers tr:nth-child(even){background-color: #f2f2f2;}
#customers tr:hover {background-color: #ddd;}
#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
<input type="hidden" id="HospitalIDDD" name="HospitalIDDD" value="<?php echo HospitalID(); ?>">
<div class="row">
	<div class="col-4">
		<h3 class="card-title">{{include tmpl="#tpc_store_payment_PAYNO"/}}&nbsp;{{include tmpl="#tpx_store_payment_PAYNO"/}}</h3>
	</div>
</div>
<div class="row">
	<div class="col-4">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Supplier</h3>
			</div>
			<div class="card-body">
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_payment_pharmacy_pocol"/}}&nbsp;{{include tmpl="#tpx_store_payment_pharmacy_pocol"/}}</span>
				  </div>
				 <div hidden class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_payment_PC"/}}&nbsp;{{include tmpl="#tpx_store_payment_PC"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_payment_DT"/}}&nbsp;{{include tmpl="#tpx_store_payment_DT"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_payment_YM"/}}&nbsp;{{include tmpl="#tpx_store_payment_YM"/}}</span>
				  </div>
				  <div hidden class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_payment_Customercode"/}}&nbsp;{{include tmpl="#tpx_store_payment_Customercode"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_payment_Customername"/}}&nbsp;{{include tmpl="#tpx_store_payment_Customername"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_payment_Remarks"/}}&nbsp;{{include tmpl="#tpx_store_payment_Remarks"/}}</span>
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
					<span class="ew-cell">{{include tmpl="#tpc_store_payment_Address1"/}}&nbsp;{{include tmpl="#tpx_store_payment_Address1"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_payment_Address2"/}}&nbsp;{{include tmpl="#tpx_store_payment_Address2"/}}</span>
				  </div>
				  <div hidden class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_payment_Address3"/}}&nbsp;{{include tmpl="#tpx_store_payment_Address3"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_payment_State"/}}&nbsp;{{include tmpl="#tpx_store_payment_State"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_payment_Pincode"/}}&nbsp;{{include tmpl="#tpx_store_payment_Pincode"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_payment_Fax"/}}&nbsp;{{include tmpl="#tpx_store_payment_Fax"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_payment_Phone"/}}&nbsp;{{include tmpl="#tpx_store_payment_Phone"/}}</span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>				
	</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Payment</h3>
			</div>
			<div class="card-body">
<table class="table table-striped ew-table ew-export-table" align="left" border="0" cellpadding="1" cellspacing="1" style="width:100%">
	<tbody>
		<tr>
			<td style="width:40%">{{include tmpl="#tpc_store_payment_ModeofPayment"/}}&nbsp;{{include tmpl="#tpx_store_payment_ModeofPayment"/}}</td>
			<td>{{include tmpl="#tpc_store_payment_Amount"/}}&nbsp;{{include tmpl="#tpx_store_payment_Amount"/}}</td>
			<td></td>
		</tr>
		<tr>
			<td style="width:40%">{{include tmpl="#tpc_store_payment_BankName"/}}&nbsp;{{include tmpl="#tpx_store_payment_BankName"/}}</td>
			<td>{{include tmpl="#tpc_store_payment_AccountNumber"/}}&nbsp;{{include tmpl="#tpx_store_payment_AccountNumber"/}}</td>
			<td>{{include tmpl="#tpc_store_payment_chequeNumber"/}}&nbsp;{{include tmpl="#tpx_store_payment_chequeNumber"/}}</td>
		</tr>
		<tr>
			<td style="width:40%">{{include tmpl="#tpc_store_payment_Remarks"/}}&nbsp;{{include tmpl="#tpx_store_payment_Remarks"/}}</td>
			<td></td>
				<td></td>
		</tr>
	</tbody>
</table>
			</div>
		</div>				
	</div>
</div>
<div id="loadGrnItems"> </div>
</div>
</script>
<?php
	if (in_array("store_grn", explode(",", $store_payment->getCurrentDetailTable())) && $store_grn->DetailAdd) {
?>
<?php if ($store_payment->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("store_grn", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "store_grngrid.php" ?>
<?php } ?>
<?php if (!$store_payment_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $store_payment_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $store_payment_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($store_payment->Rows) ?> };
ew.applyTemplate("tpd_store_paymentadd", "tpm_store_paymentadd", "store_paymentadd", "<?php echo $store_payment->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.store_paymentadd_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$store_payment_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");
function calulateselectedAmount()
{
		var Totttlcnt = document.getElementById("Totttlcnt").value;
		var TotalBill = 0;
		for (var i = 0; i < Totttlcnt; i++) {
			var checkbox = document.getElementById('select' + i);  
			if (checkbox.checked == true)
			{
				var PaidAmount = document.getElementById('PaidAmount' + i).value;
				TotalBill = parseInt(TotalBill) + parseInt(PaidAmount);

				//alert("hhh   --  " + i);
			}    
			document.getElementById("totalAMTtoPay").innerText = TotalBill.toFixed(2);
			document.getElementById("x_Amount").value = TotalBill.toFixed(2);	
		}
}
</script>
<?php include_once "footer.php" ?>
<?php
$store_payment_add->terminate();
?>