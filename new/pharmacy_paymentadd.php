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
$pharmacy_payment_add = new pharmacy_payment_add();

// Run the page
$pharmacy_payment_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_payment_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpharmacy_paymentadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fpharmacy_paymentadd = currentForm = new ew.Form("fpharmacy_paymentadd", "add");

	// Validate form
	fpharmacy_paymentadd.validate = function() {
		if (!this.validateRequired)
			return true; // Ignore validation
		var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
		if ($fobj.find("#confirm").val() == "confirm")
			return true;
		var elm, felm, uelm, addcnt = 0;
		var $k = $fobj.find("#" + this.formKeyCountName); // Get key_count
		var rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1;
		var startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
		var gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
		for (var i = startcnt; i <= rowcnt; i++) {
			var infix = ($k[0]) ? String(i) : "";
			$fobj.data("rowindex", infix);
			<?php if ($pharmacy_payment_add->PAYNO->Required) { ?>
				elm = this.getElements("x" + infix + "_PAYNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_payment_add->PAYNO->caption(), $pharmacy_payment_add->PAYNO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_payment_add->DT->Required) { ?>
				elm = this.getElements("x" + infix + "_DT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_payment_add->DT->caption(), $pharmacy_payment_add->DT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DT");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_payment_add->DT->errorMessage()) ?>");
			<?php if ($pharmacy_payment_add->YM->Required) { ?>
				elm = this.getElements("x" + infix + "_YM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_payment_add->YM->caption(), $pharmacy_payment_add->YM->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_payment_add->PC->Required) { ?>
				elm = this.getElements("x" + infix + "_PC");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_payment_add->PC->caption(), $pharmacy_payment_add->PC->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_payment_add->Customercode->Required) { ?>
				elm = this.getElements("x" + infix + "_Customercode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_payment_add->Customercode->caption(), $pharmacy_payment_add->Customercode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_payment_add->Customername->Required) { ?>
				elm = this.getElements("x" + infix + "_Customername");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_payment_add->Customername->caption(), $pharmacy_payment_add->Customername->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_payment_add->pharmacy_pocol->Required) { ?>
				elm = this.getElements("x" + infix + "_pharmacy_pocol");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_payment_add->pharmacy_pocol->caption(), $pharmacy_payment_add->pharmacy_pocol->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_payment_add->Address1->Required) { ?>
				elm = this.getElements("x" + infix + "_Address1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_payment_add->Address1->caption(), $pharmacy_payment_add->Address1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_payment_add->Address2->Required) { ?>
				elm = this.getElements("x" + infix + "_Address2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_payment_add->Address2->caption(), $pharmacy_payment_add->Address2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_payment_add->Address3->Required) { ?>
				elm = this.getElements("x" + infix + "_Address3");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_payment_add->Address3->caption(), $pharmacy_payment_add->Address3->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_payment_add->State->Required) { ?>
				elm = this.getElements("x" + infix + "_State");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_payment_add->State->caption(), $pharmacy_payment_add->State->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_payment_add->Pincode->Required) { ?>
				elm = this.getElements("x" + infix + "_Pincode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_payment_add->Pincode->caption(), $pharmacy_payment_add->Pincode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_payment_add->Phone->Required) { ?>
				elm = this.getElements("x" + infix + "_Phone");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_payment_add->Phone->caption(), $pharmacy_payment_add->Phone->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_payment_add->Fax->Required) { ?>
				elm = this.getElements("x" + infix + "_Fax");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_payment_add->Fax->caption(), $pharmacy_payment_add->Fax->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_payment_add->EEmail->Required) { ?>
				elm = this.getElements("x" + infix + "_EEmail");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_payment_add->EEmail->caption(), $pharmacy_payment_add->EEmail->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_payment_add->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_payment_add->HospID->caption(), $pharmacy_payment_add->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_payment_add->createdby->Required) { ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_payment_add->createdby->caption(), $pharmacy_payment_add->createdby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_payment_add->createddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_payment_add->createddatetime->caption(), $pharmacy_payment_add->createddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_payment_add->PharmacyID->Required) { ?>
				elm = this.getElements("x" + infix + "_PharmacyID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_payment_add->PharmacyID->caption(), $pharmacy_payment_add->PharmacyID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_payment_add->BillTotalValue->Required) { ?>
				elm = this.getElements("x" + infix + "_BillTotalValue");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_payment_add->BillTotalValue->caption(), $pharmacy_payment_add->BillTotalValue->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BillTotalValue");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_payment_add->BillTotalValue->errorMessage()) ?>");
			<?php if ($pharmacy_payment_add->GRNTotalValue->Required) { ?>
				elm = this.getElements("x" + infix + "_GRNTotalValue");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_payment_add->GRNTotalValue->caption(), $pharmacy_payment_add->GRNTotalValue->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_GRNTotalValue");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_payment_add->GRNTotalValue->errorMessage()) ?>");
			<?php if ($pharmacy_payment_add->BillDiscount->Required) { ?>
				elm = this.getElements("x" + infix + "_BillDiscount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_payment_add->BillDiscount->caption(), $pharmacy_payment_add->BillDiscount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BillDiscount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_payment_add->BillDiscount->errorMessage()) ?>");
			<?php if ($pharmacy_payment_add->BillUpload->Required) { ?>
				elm = this.getElements("x" + infix + "_BillUpload");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_payment_add->BillUpload->caption(), $pharmacy_payment_add->BillUpload->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_payment_add->TransPort->Required) { ?>
				elm = this.getElements("x" + infix + "_TransPort");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_payment_add->TransPort->caption(), $pharmacy_payment_add->TransPort->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TransPort");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_payment_add->TransPort->errorMessage()) ?>");
			<?php if ($pharmacy_payment_add->AnyOther->Required) { ?>
				elm = this.getElements("x" + infix + "_AnyOther");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_payment_add->AnyOther->caption(), $pharmacy_payment_add->AnyOther->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AnyOther");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_payment_add->AnyOther->errorMessage()) ?>");
			<?php if ($pharmacy_payment_add->voucher_type->Required) { ?>
				elm = this.getElements("x" + infix + "_voucher_type");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_payment_add->voucher_type->caption(), $pharmacy_payment_add->voucher_type->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_payment_add->Details->Required) { ?>
				elm = this.getElements("x" + infix + "_Details");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_payment_add->Details->caption(), $pharmacy_payment_add->Details->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_payment_add->ModeofPayment->Required) { ?>
				elm = this.getElements("x" + infix + "_ModeofPayment");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_payment_add->ModeofPayment->caption(), $pharmacy_payment_add->ModeofPayment->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_payment_add->Amount->Required) { ?>
				elm = this.getElements("x" + infix + "_Amount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_payment_add->Amount->caption(), $pharmacy_payment_add->Amount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Amount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_payment_add->Amount->errorMessage()) ?>");
			<?php if ($pharmacy_payment_add->BankName->Required) { ?>
				elm = this.getElements("x" + infix + "_BankName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_payment_add->BankName->caption(), $pharmacy_payment_add->BankName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_payment_add->AccountNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_AccountNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_payment_add->AccountNumber->caption(), $pharmacy_payment_add->AccountNumber->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_payment_add->chequeNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_chequeNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_payment_add->chequeNumber->caption(), $pharmacy_payment_add->chequeNumber->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_payment_add->Remarks->Required) { ?>
				elm = this.getElements("x" + infix + "_Remarks");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_payment_add->Remarks->caption(), $pharmacy_payment_add->Remarks->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_payment_add->SeectPaymentMode->Required) { ?>
				elm = this.getElements("x" + infix + "_SeectPaymentMode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_payment_add->SeectPaymentMode->caption(), $pharmacy_payment_add->SeectPaymentMode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_payment_add->PaidAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_PaidAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_payment_add->PaidAmount->caption(), $pharmacy_payment_add->PaidAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_payment_add->Currency->Required) { ?>
				elm = this.getElements("x" + infix + "_Currency");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_payment_add->Currency->caption(), $pharmacy_payment_add->Currency->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_payment_add->CardNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_CardNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_payment_add->CardNumber->caption(), $pharmacy_payment_add->CardNumber->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
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

	// Form_CustomValidate
	fpharmacy_paymentadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpharmacy_paymentadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpharmacy_paymentadd.lists["x_Customername"] = <?php echo $pharmacy_payment_add->Customername->Lookup->toClientList($pharmacy_payment_add) ?>;
	fpharmacy_paymentadd.lists["x_Customername"].options = <?php echo JsonEncode($pharmacy_payment_add->Customername->lookupOptions()) ?>;
	fpharmacy_paymentadd.lists["x_pharmacy_pocol"] = <?php echo $pharmacy_payment_add->pharmacy_pocol->Lookup->toClientList($pharmacy_payment_add) ?>;
	fpharmacy_paymentadd.lists["x_pharmacy_pocol"].options = <?php echo JsonEncode($pharmacy_payment_add->pharmacy_pocol->lookupOptions()) ?>;
	fpharmacy_paymentadd.lists["x_ModeofPayment"] = <?php echo $pharmacy_payment_add->ModeofPayment->Lookup->toClientList($pharmacy_payment_add) ?>;
	fpharmacy_paymentadd.lists["x_ModeofPayment"].options = <?php echo JsonEncode($pharmacy_payment_add->ModeofPayment->lookupOptions()) ?>;
	loadjs.done("fpharmacy_paymentadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pharmacy_payment_add->showPageHeader(); ?>
<?php
$pharmacy_payment_add->showMessage();
?>
<form name="fpharmacy_paymentadd" id="fpharmacy_paymentadd" class="<?php echo $pharmacy_payment_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_payment">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_payment_add->IsModal ?>">
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($pharmacy_payment_add->PAYNO->Visible) { // PAYNO ?>
	<div id="r_PAYNO" class="form-group row">
		<label id="elh_pharmacy_payment_PAYNO" for="x_PAYNO" class="<?php echo $pharmacy_payment_add->LeftColumnClass ?>"><script id="tpc_pharmacy_payment_PAYNO" type="text/html"><?php echo $pharmacy_payment_add->PAYNO->caption() ?><?php echo $pharmacy_payment_add->PAYNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_payment_add->RightColumnClass ?>"><div <?php echo $pharmacy_payment_add->PAYNO->cellAttributes() ?>>
<script id="tpx_pharmacy_payment_PAYNO" type="text/html"><span id="el_pharmacy_payment_PAYNO">
<input type="text" data-table="pharmacy_payment" data-field="x_PAYNO" name="x_PAYNO" id="x_PAYNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_payment_add->PAYNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_payment_add->PAYNO->EditValue ?>"<?php echo $pharmacy_payment_add->PAYNO->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_payment_add->PAYNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_payment_add->DT->Visible) { // DT ?>
	<div id="r_DT" class="form-group row">
		<label id="elh_pharmacy_payment_DT" for="x_DT" class="<?php echo $pharmacy_payment_add->LeftColumnClass ?>"><script id="tpc_pharmacy_payment_DT" type="text/html"><?php echo $pharmacy_payment_add->DT->caption() ?><?php echo $pharmacy_payment_add->DT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_payment_add->RightColumnClass ?>"><div <?php echo $pharmacy_payment_add->DT->cellAttributes() ?>>
<script id="tpx_pharmacy_payment_DT" type="text/html"><span id="el_pharmacy_payment_DT">
<input type="text" data-table="pharmacy_payment" data-field="x_DT" data-format="7" name="x_DT" id="x_DT" placeholder="<?php echo HtmlEncode($pharmacy_payment_add->DT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_payment_add->DT->EditValue ?>"<?php echo $pharmacy_payment_add->DT->editAttributes() ?>>
<?php if (!$pharmacy_payment_add->DT->ReadOnly && !$pharmacy_payment_add->DT->Disabled && !isset($pharmacy_payment_add->DT->EditAttrs["readonly"]) && !isset($pharmacy_payment_add->DT->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="pharmacy_paymentadd_js">
loadjs.ready(["fpharmacy_paymentadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_paymentadd", "x_DT", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $pharmacy_payment_add->DT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_payment_add->YM->Visible) { // YM ?>
	<div id="r_YM" class="form-group row">
		<label id="elh_pharmacy_payment_YM" for="x_YM" class="<?php echo $pharmacy_payment_add->LeftColumnClass ?>"><script id="tpc_pharmacy_payment_YM" type="text/html"><?php echo $pharmacy_payment_add->YM->caption() ?><?php echo $pharmacy_payment_add->YM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_payment_add->RightColumnClass ?>"><div <?php echo $pharmacy_payment_add->YM->cellAttributes() ?>>
<script id="tpx_pharmacy_payment_YM" type="text/html"><span id="el_pharmacy_payment_YM">
<input type="text" data-table="pharmacy_payment" data-field="x_YM" name="x_YM" id="x_YM" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_payment_add->YM->getPlaceHolder()) ?>" value="<?php echo $pharmacy_payment_add->YM->EditValue ?>"<?php echo $pharmacy_payment_add->YM->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_payment_add->YM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_payment_add->PC->Visible) { // PC ?>
	<div id="r_PC" class="form-group row">
		<label id="elh_pharmacy_payment_PC" for="x_PC" class="<?php echo $pharmacy_payment_add->LeftColumnClass ?>"><script id="tpc_pharmacy_payment_PC" type="text/html"><?php echo $pharmacy_payment_add->PC->caption() ?><?php echo $pharmacy_payment_add->PC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_payment_add->RightColumnClass ?>"><div <?php echo $pharmacy_payment_add->PC->cellAttributes() ?>>
<script id="tpx_pharmacy_payment_PC" type="text/html"><span id="el_pharmacy_payment_PC">
<input type="text" data-table="pharmacy_payment" data-field="x_PC" name="x_PC" id="x_PC" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_payment_add->PC->getPlaceHolder()) ?>" value="<?php echo $pharmacy_payment_add->PC->EditValue ?>"<?php echo $pharmacy_payment_add->PC->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_payment_add->PC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_payment_add->Customercode->Visible) { // Customercode ?>
	<div id="r_Customercode" class="form-group row">
		<label id="elh_pharmacy_payment_Customercode" for="x_Customercode" class="<?php echo $pharmacy_payment_add->LeftColumnClass ?>"><script id="tpc_pharmacy_payment_Customercode" type="text/html"><?php echo $pharmacy_payment_add->Customercode->caption() ?><?php echo $pharmacy_payment_add->Customercode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_payment_add->RightColumnClass ?>"><div <?php echo $pharmacy_payment_add->Customercode->cellAttributes() ?>>
<script id="tpx_pharmacy_payment_Customercode" type="text/html"><span id="el_pharmacy_payment_Customercode">
<input type="text" data-table="pharmacy_payment" data-field="x_Customercode" name="x_Customercode" id="x_Customercode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_payment_add->Customercode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_payment_add->Customercode->EditValue ?>"<?php echo $pharmacy_payment_add->Customercode->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_payment_add->Customercode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_payment_add->Customername->Visible) { // Customername ?>
	<div id="r_Customername" class="form-group row">
		<label id="elh_pharmacy_payment_Customername" for="x_Customername" class="<?php echo $pharmacy_payment_add->LeftColumnClass ?>"><script id="tpc_pharmacy_payment_Customername" type="text/html"><?php echo $pharmacy_payment_add->Customername->caption() ?><?php echo $pharmacy_payment_add->Customername->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_payment_add->RightColumnClass ?>"><div <?php echo $pharmacy_payment_add->Customername->cellAttributes() ?>>
<script id="tpx_pharmacy_payment_Customername" type="text/html"><span id="el_pharmacy_payment_Customername">
<?php $pharmacy_payment_add->Customername->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Customername"><?php echo EmptyValue(strval($pharmacy_payment_add->Customername->ViewValue)) ? $Language->phrase("PleaseSelect") : $pharmacy_payment_add->Customername->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_payment_add->Customername->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($pharmacy_payment_add->Customername->ReadOnly || $pharmacy_payment_add->Customername->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Customername',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_payment_add->Customername->Lookup->getParamTag($pharmacy_payment_add, "p_x_Customername") ?>
<input type="hidden" data-table="pharmacy_payment" data-field="x_Customername" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_payment_add->Customername->displayValueSeparatorAttribute() ?>" name="x_Customername" id="x_Customername" value="<?php echo $pharmacy_payment_add->Customername->CurrentValue ?>"<?php echo $pharmacy_payment_add->Customername->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_payment_add->Customername->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_payment_add->pharmacy_pocol->Visible) { // pharmacy_pocol ?>
	<div id="r_pharmacy_pocol" class="form-group row">
		<label id="elh_pharmacy_payment_pharmacy_pocol" for="x_pharmacy_pocol" class="<?php echo $pharmacy_payment_add->LeftColumnClass ?>"><script id="tpc_pharmacy_payment_pharmacy_pocol" type="text/html"><?php echo $pharmacy_payment_add->pharmacy_pocol->caption() ?><?php echo $pharmacy_payment_add->pharmacy_pocol->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_payment_add->RightColumnClass ?>"><div <?php echo $pharmacy_payment_add->pharmacy_pocol->cellAttributes() ?>>
<script id="tpx_pharmacy_payment_pharmacy_pocol" type="text/html"><span id="el_pharmacy_payment_pharmacy_pocol">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy_payment" data-field="x_pharmacy_pocol" data-value-separator="<?php echo $pharmacy_payment_add->pharmacy_pocol->displayValueSeparatorAttribute() ?>" id="x_pharmacy_pocol" name="x_pharmacy_pocol"<?php echo $pharmacy_payment_add->pharmacy_pocol->editAttributes() ?>>
			<?php echo $pharmacy_payment_add->pharmacy_pocol->selectOptionListHtml("x_pharmacy_pocol") ?>
		</select>
</div>
<?php echo $pharmacy_payment_add->pharmacy_pocol->Lookup->getParamTag($pharmacy_payment_add, "p_x_pharmacy_pocol") ?>
</span></script>
<?php echo $pharmacy_payment_add->pharmacy_pocol->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_payment_add->Address1->Visible) { // Address1 ?>
	<div id="r_Address1" class="form-group row">
		<label id="elh_pharmacy_payment_Address1" for="x_Address1" class="<?php echo $pharmacy_payment_add->LeftColumnClass ?>"><script id="tpc_pharmacy_payment_Address1" type="text/html"><?php echo $pharmacy_payment_add->Address1->caption() ?><?php echo $pharmacy_payment_add->Address1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_payment_add->RightColumnClass ?>"><div <?php echo $pharmacy_payment_add->Address1->cellAttributes() ?>>
<script id="tpx_pharmacy_payment_Address1" type="text/html"><span id="el_pharmacy_payment_Address1">
<input type="text" data-table="pharmacy_payment" data-field="x_Address1" name="x_Address1" id="x_Address1" placeholder="<?php echo HtmlEncode($pharmacy_payment_add->Address1->getPlaceHolder()) ?>" value="<?php echo $pharmacy_payment_add->Address1->EditValue ?>"<?php echo $pharmacy_payment_add->Address1->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_payment_add->Address1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_payment_add->Address2->Visible) { // Address2 ?>
	<div id="r_Address2" class="form-group row">
		<label id="elh_pharmacy_payment_Address2" for="x_Address2" class="<?php echo $pharmacy_payment_add->LeftColumnClass ?>"><script id="tpc_pharmacy_payment_Address2" type="text/html"><?php echo $pharmacy_payment_add->Address2->caption() ?><?php echo $pharmacy_payment_add->Address2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_payment_add->RightColumnClass ?>"><div <?php echo $pharmacy_payment_add->Address2->cellAttributes() ?>>
<script id="tpx_pharmacy_payment_Address2" type="text/html"><span id="el_pharmacy_payment_Address2">
<input type="text" data-table="pharmacy_payment" data-field="x_Address2" name="x_Address2" id="x_Address2" placeholder="<?php echo HtmlEncode($pharmacy_payment_add->Address2->getPlaceHolder()) ?>" value="<?php echo $pharmacy_payment_add->Address2->EditValue ?>"<?php echo $pharmacy_payment_add->Address2->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_payment_add->Address2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_payment_add->Address3->Visible) { // Address3 ?>
	<div id="r_Address3" class="form-group row">
		<label id="elh_pharmacy_payment_Address3" for="x_Address3" class="<?php echo $pharmacy_payment_add->LeftColumnClass ?>"><script id="tpc_pharmacy_payment_Address3" type="text/html"><?php echo $pharmacy_payment_add->Address3->caption() ?><?php echo $pharmacy_payment_add->Address3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_payment_add->RightColumnClass ?>"><div <?php echo $pharmacy_payment_add->Address3->cellAttributes() ?>>
<script id="tpx_pharmacy_payment_Address3" type="text/html"><span id="el_pharmacy_payment_Address3">
<input type="text" data-table="pharmacy_payment" data-field="x_Address3" name="x_Address3" id="x_Address3" placeholder="<?php echo HtmlEncode($pharmacy_payment_add->Address3->getPlaceHolder()) ?>" value="<?php echo $pharmacy_payment_add->Address3->EditValue ?>"<?php echo $pharmacy_payment_add->Address3->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_payment_add->Address3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_payment_add->State->Visible) { // State ?>
	<div id="r_State" class="form-group row">
		<label id="elh_pharmacy_payment_State" for="x_State" class="<?php echo $pharmacy_payment_add->LeftColumnClass ?>"><script id="tpc_pharmacy_payment_State" type="text/html"><?php echo $pharmacy_payment_add->State->caption() ?><?php echo $pharmacy_payment_add->State->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_payment_add->RightColumnClass ?>"><div <?php echo $pharmacy_payment_add->State->cellAttributes() ?>>
<script id="tpx_pharmacy_payment_State" type="text/html"><span id="el_pharmacy_payment_State">
<input type="text" data-table="pharmacy_payment" data-field="x_State" name="x_State" id="x_State" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_payment_add->State->getPlaceHolder()) ?>" value="<?php echo $pharmacy_payment_add->State->EditValue ?>"<?php echo $pharmacy_payment_add->State->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_payment_add->State->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_payment_add->Pincode->Visible) { // Pincode ?>
	<div id="r_Pincode" class="form-group row">
		<label id="elh_pharmacy_payment_Pincode" for="x_Pincode" class="<?php echo $pharmacy_payment_add->LeftColumnClass ?>"><script id="tpc_pharmacy_payment_Pincode" type="text/html"><?php echo $pharmacy_payment_add->Pincode->caption() ?><?php echo $pharmacy_payment_add->Pincode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_payment_add->RightColumnClass ?>"><div <?php echo $pharmacy_payment_add->Pincode->cellAttributes() ?>>
<script id="tpx_pharmacy_payment_Pincode" type="text/html"><span id="el_pharmacy_payment_Pincode">
<input type="text" data-table="pharmacy_payment" data-field="x_Pincode" name="x_Pincode" id="x_Pincode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_payment_add->Pincode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_payment_add->Pincode->EditValue ?>"<?php echo $pharmacy_payment_add->Pincode->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_payment_add->Pincode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_payment_add->Phone->Visible) { // Phone ?>
	<div id="r_Phone" class="form-group row">
		<label id="elh_pharmacy_payment_Phone" for="x_Phone" class="<?php echo $pharmacy_payment_add->LeftColumnClass ?>"><script id="tpc_pharmacy_payment_Phone" type="text/html"><?php echo $pharmacy_payment_add->Phone->caption() ?><?php echo $pharmacy_payment_add->Phone->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_payment_add->RightColumnClass ?>"><div <?php echo $pharmacy_payment_add->Phone->cellAttributes() ?>>
<script id="tpx_pharmacy_payment_Phone" type="text/html"><span id="el_pharmacy_payment_Phone">
<input type="text" data-table="pharmacy_payment" data-field="x_Phone" name="x_Phone" id="x_Phone" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_payment_add->Phone->getPlaceHolder()) ?>" value="<?php echo $pharmacy_payment_add->Phone->EditValue ?>"<?php echo $pharmacy_payment_add->Phone->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_payment_add->Phone->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_payment_add->Fax->Visible) { // Fax ?>
	<div id="r_Fax" class="form-group row">
		<label id="elh_pharmacy_payment_Fax" for="x_Fax" class="<?php echo $pharmacy_payment_add->LeftColumnClass ?>"><script id="tpc_pharmacy_payment_Fax" type="text/html"><?php echo $pharmacy_payment_add->Fax->caption() ?><?php echo $pharmacy_payment_add->Fax->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_payment_add->RightColumnClass ?>"><div <?php echo $pharmacy_payment_add->Fax->cellAttributes() ?>>
<script id="tpx_pharmacy_payment_Fax" type="text/html"><span id="el_pharmacy_payment_Fax">
<input type="text" data-table="pharmacy_payment" data-field="x_Fax" name="x_Fax" id="x_Fax" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_payment_add->Fax->getPlaceHolder()) ?>" value="<?php echo $pharmacy_payment_add->Fax->EditValue ?>"<?php echo $pharmacy_payment_add->Fax->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_payment_add->Fax->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_payment_add->EEmail->Visible) { // EEmail ?>
	<div id="r_EEmail" class="form-group row">
		<label id="elh_pharmacy_payment_EEmail" for="x_EEmail" class="<?php echo $pharmacy_payment_add->LeftColumnClass ?>"><script id="tpc_pharmacy_payment_EEmail" type="text/html"><?php echo $pharmacy_payment_add->EEmail->caption() ?><?php echo $pharmacy_payment_add->EEmail->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_payment_add->RightColumnClass ?>"><div <?php echo $pharmacy_payment_add->EEmail->cellAttributes() ?>>
<script id="tpx_pharmacy_payment_EEmail" type="text/html"><span id="el_pharmacy_payment_EEmail">
<input type="text" data-table="pharmacy_payment" data-field="x_EEmail" name="x_EEmail" id="x_EEmail" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_payment_add->EEmail->getPlaceHolder()) ?>" value="<?php echo $pharmacy_payment_add->EEmail->EditValue ?>"<?php echo $pharmacy_payment_add->EEmail->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_payment_add->EEmail->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_payment_add->BillTotalValue->Visible) { // BillTotalValue ?>
	<div id="r_BillTotalValue" class="form-group row">
		<label id="elh_pharmacy_payment_BillTotalValue" for="x_BillTotalValue" class="<?php echo $pharmacy_payment_add->LeftColumnClass ?>"><script id="tpc_pharmacy_payment_BillTotalValue" type="text/html"><?php echo $pharmacy_payment_add->BillTotalValue->caption() ?><?php echo $pharmacy_payment_add->BillTotalValue->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_payment_add->RightColumnClass ?>"><div <?php echo $pharmacy_payment_add->BillTotalValue->cellAttributes() ?>>
<script id="tpx_pharmacy_payment_BillTotalValue" type="text/html"><span id="el_pharmacy_payment_BillTotalValue">
<input type="text" data-table="pharmacy_payment" data-field="x_BillTotalValue" name="x_BillTotalValue" id="x_BillTotalValue" size="30" placeholder="<?php echo HtmlEncode($pharmacy_payment_add->BillTotalValue->getPlaceHolder()) ?>" value="<?php echo $pharmacy_payment_add->BillTotalValue->EditValue ?>"<?php echo $pharmacy_payment_add->BillTotalValue->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_payment_add->BillTotalValue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_payment_add->GRNTotalValue->Visible) { // GRNTotalValue ?>
	<div id="r_GRNTotalValue" class="form-group row">
		<label id="elh_pharmacy_payment_GRNTotalValue" for="x_GRNTotalValue" class="<?php echo $pharmacy_payment_add->LeftColumnClass ?>"><script id="tpc_pharmacy_payment_GRNTotalValue" type="text/html"><?php echo $pharmacy_payment_add->GRNTotalValue->caption() ?><?php echo $pharmacy_payment_add->GRNTotalValue->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_payment_add->RightColumnClass ?>"><div <?php echo $pharmacy_payment_add->GRNTotalValue->cellAttributes() ?>>
<script id="tpx_pharmacy_payment_GRNTotalValue" type="text/html"><span id="el_pharmacy_payment_GRNTotalValue">
<input type="text" data-table="pharmacy_payment" data-field="x_GRNTotalValue" name="x_GRNTotalValue" id="x_GRNTotalValue" size="30" placeholder="<?php echo HtmlEncode($pharmacy_payment_add->GRNTotalValue->getPlaceHolder()) ?>" value="<?php echo $pharmacy_payment_add->GRNTotalValue->EditValue ?>"<?php echo $pharmacy_payment_add->GRNTotalValue->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_payment_add->GRNTotalValue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_payment_add->BillDiscount->Visible) { // BillDiscount ?>
	<div id="r_BillDiscount" class="form-group row">
		<label id="elh_pharmacy_payment_BillDiscount" for="x_BillDiscount" class="<?php echo $pharmacy_payment_add->LeftColumnClass ?>"><script id="tpc_pharmacy_payment_BillDiscount" type="text/html"><?php echo $pharmacy_payment_add->BillDiscount->caption() ?><?php echo $pharmacy_payment_add->BillDiscount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_payment_add->RightColumnClass ?>"><div <?php echo $pharmacy_payment_add->BillDiscount->cellAttributes() ?>>
<script id="tpx_pharmacy_payment_BillDiscount" type="text/html"><span id="el_pharmacy_payment_BillDiscount">
<input type="text" data-table="pharmacy_payment" data-field="x_BillDiscount" name="x_BillDiscount" id="x_BillDiscount" size="30" placeholder="<?php echo HtmlEncode($pharmacy_payment_add->BillDiscount->getPlaceHolder()) ?>" value="<?php echo $pharmacy_payment_add->BillDiscount->EditValue ?>"<?php echo $pharmacy_payment_add->BillDiscount->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_payment_add->BillDiscount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_payment_add->BillUpload->Visible) { // BillUpload ?>
	<div id="r_BillUpload" class="form-group row">
		<label id="elh_pharmacy_payment_BillUpload" for="x_BillUpload" class="<?php echo $pharmacy_payment_add->LeftColumnClass ?>"><script id="tpc_pharmacy_payment_BillUpload" type="text/html"><?php echo $pharmacy_payment_add->BillUpload->caption() ?><?php echo $pharmacy_payment_add->BillUpload->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_payment_add->RightColumnClass ?>"><div <?php echo $pharmacy_payment_add->BillUpload->cellAttributes() ?>>
<script id="tpx_pharmacy_payment_BillUpload" type="text/html"><span id="el_pharmacy_payment_BillUpload">
<textarea data-table="pharmacy_payment" data-field="x_BillUpload" name="x_BillUpload" id="x_BillUpload" cols="35" rows="4" placeholder="<?php echo HtmlEncode($pharmacy_payment_add->BillUpload->getPlaceHolder()) ?>"<?php echo $pharmacy_payment_add->BillUpload->editAttributes() ?>><?php echo $pharmacy_payment_add->BillUpload->EditValue ?></textarea>
</span></script>
<?php echo $pharmacy_payment_add->BillUpload->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_payment_add->TransPort->Visible) { // TransPort ?>
	<div id="r_TransPort" class="form-group row">
		<label id="elh_pharmacy_payment_TransPort" for="x_TransPort" class="<?php echo $pharmacy_payment_add->LeftColumnClass ?>"><script id="tpc_pharmacy_payment_TransPort" type="text/html"><?php echo $pharmacy_payment_add->TransPort->caption() ?><?php echo $pharmacy_payment_add->TransPort->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_payment_add->RightColumnClass ?>"><div <?php echo $pharmacy_payment_add->TransPort->cellAttributes() ?>>
<script id="tpx_pharmacy_payment_TransPort" type="text/html"><span id="el_pharmacy_payment_TransPort">
<input type="text" data-table="pharmacy_payment" data-field="x_TransPort" name="x_TransPort" id="x_TransPort" size="30" placeholder="<?php echo HtmlEncode($pharmacy_payment_add->TransPort->getPlaceHolder()) ?>" value="<?php echo $pharmacy_payment_add->TransPort->EditValue ?>"<?php echo $pharmacy_payment_add->TransPort->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_payment_add->TransPort->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_payment_add->AnyOther->Visible) { // AnyOther ?>
	<div id="r_AnyOther" class="form-group row">
		<label id="elh_pharmacy_payment_AnyOther" for="x_AnyOther" class="<?php echo $pharmacy_payment_add->LeftColumnClass ?>"><script id="tpc_pharmacy_payment_AnyOther" type="text/html"><?php echo $pharmacy_payment_add->AnyOther->caption() ?><?php echo $pharmacy_payment_add->AnyOther->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_payment_add->RightColumnClass ?>"><div <?php echo $pharmacy_payment_add->AnyOther->cellAttributes() ?>>
<script id="tpx_pharmacy_payment_AnyOther" type="text/html"><span id="el_pharmacy_payment_AnyOther">
<input type="text" data-table="pharmacy_payment" data-field="x_AnyOther" name="x_AnyOther" id="x_AnyOther" size="30" placeholder="<?php echo HtmlEncode($pharmacy_payment_add->AnyOther->getPlaceHolder()) ?>" value="<?php echo $pharmacy_payment_add->AnyOther->EditValue ?>"<?php echo $pharmacy_payment_add->AnyOther->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_payment_add->AnyOther->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_payment_add->voucher_type->Visible) { // voucher_type ?>
	<div id="r_voucher_type" class="form-group row">
		<label id="elh_pharmacy_payment_voucher_type" for="x_voucher_type" class="<?php echo $pharmacy_payment_add->LeftColumnClass ?>"><script id="tpc_pharmacy_payment_voucher_type" type="text/html"><?php echo $pharmacy_payment_add->voucher_type->caption() ?><?php echo $pharmacy_payment_add->voucher_type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_payment_add->RightColumnClass ?>"><div <?php echo $pharmacy_payment_add->voucher_type->cellAttributes() ?>>
<script id="tpx_pharmacy_payment_voucher_type" type="text/html"><span id="el_pharmacy_payment_voucher_type">
<input type="text" data-table="pharmacy_payment" data-field="x_voucher_type" name="x_voucher_type" id="x_voucher_type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_payment_add->voucher_type->getPlaceHolder()) ?>" value="<?php echo $pharmacy_payment_add->voucher_type->EditValue ?>"<?php echo $pharmacy_payment_add->voucher_type->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_payment_add->voucher_type->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_payment_add->Details->Visible) { // Details ?>
	<div id="r_Details" class="form-group row">
		<label id="elh_pharmacy_payment_Details" for="x_Details" class="<?php echo $pharmacy_payment_add->LeftColumnClass ?>"><script id="tpc_pharmacy_payment_Details" type="text/html"><?php echo $pharmacy_payment_add->Details->caption() ?><?php echo $pharmacy_payment_add->Details->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_payment_add->RightColumnClass ?>"><div <?php echo $pharmacy_payment_add->Details->cellAttributes() ?>>
<script id="tpx_pharmacy_payment_Details" type="text/html"><span id="el_pharmacy_payment_Details">
<input type="text" data-table="pharmacy_payment" data-field="x_Details" name="x_Details" id="x_Details" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_payment_add->Details->getPlaceHolder()) ?>" value="<?php echo $pharmacy_payment_add->Details->EditValue ?>"<?php echo $pharmacy_payment_add->Details->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_payment_add->Details->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_payment_add->ModeofPayment->Visible) { // ModeofPayment ?>
	<div id="r_ModeofPayment" class="form-group row">
		<label id="elh_pharmacy_payment_ModeofPayment" for="x_ModeofPayment" class="<?php echo $pharmacy_payment_add->LeftColumnClass ?>"><script id="tpc_pharmacy_payment_ModeofPayment" type="text/html"><?php echo $pharmacy_payment_add->ModeofPayment->caption() ?><?php echo $pharmacy_payment_add->ModeofPayment->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_payment_add->RightColumnClass ?>"><div <?php echo $pharmacy_payment_add->ModeofPayment->cellAttributes() ?>>
<script id="tpx_pharmacy_payment_ModeofPayment" type="text/html"><span id="el_pharmacy_payment_ModeofPayment">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy_payment" data-field="x_ModeofPayment" data-value-separator="<?php echo $pharmacy_payment_add->ModeofPayment->displayValueSeparatorAttribute() ?>" id="x_ModeofPayment" name="x_ModeofPayment"<?php echo $pharmacy_payment_add->ModeofPayment->editAttributes() ?>>
			<?php echo $pharmacy_payment_add->ModeofPayment->selectOptionListHtml("x_ModeofPayment") ?>
		</select>
</div>
<?php echo $pharmacy_payment_add->ModeofPayment->Lookup->getParamTag($pharmacy_payment_add, "p_x_ModeofPayment") ?>
</span></script>
<?php echo $pharmacy_payment_add->ModeofPayment->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_payment_add->Amount->Visible) { // Amount ?>
	<div id="r_Amount" class="form-group row">
		<label id="elh_pharmacy_payment_Amount" for="x_Amount" class="<?php echo $pharmacy_payment_add->LeftColumnClass ?>"><script id="tpc_pharmacy_payment_Amount" type="text/html"><?php echo $pharmacy_payment_add->Amount->caption() ?><?php echo $pharmacy_payment_add->Amount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_payment_add->RightColumnClass ?>"><div <?php echo $pharmacy_payment_add->Amount->cellAttributes() ?>>
<script id="tpx_pharmacy_payment_Amount" type="text/html"><span id="el_pharmacy_payment_Amount">
<input type="text" data-table="pharmacy_payment" data-field="x_Amount" name="x_Amount" id="x_Amount" size="30" placeholder="<?php echo HtmlEncode($pharmacy_payment_add->Amount->getPlaceHolder()) ?>" value="<?php echo $pharmacy_payment_add->Amount->EditValue ?>"<?php echo $pharmacy_payment_add->Amount->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_payment_add->Amount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_payment_add->BankName->Visible) { // BankName ?>
	<div id="r_BankName" class="form-group row">
		<label id="elh_pharmacy_payment_BankName" for="x_BankName" class="<?php echo $pharmacy_payment_add->LeftColumnClass ?>"><script id="tpc_pharmacy_payment_BankName" type="text/html"><?php echo $pharmacy_payment_add->BankName->caption() ?><?php echo $pharmacy_payment_add->BankName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_payment_add->RightColumnClass ?>"><div <?php echo $pharmacy_payment_add->BankName->cellAttributes() ?>>
<script id="tpx_pharmacy_payment_BankName" type="text/html"><span id="el_pharmacy_payment_BankName">
<input type="text" data-table="pharmacy_payment" data-field="x_BankName" name="x_BankName" id="x_BankName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_payment_add->BankName->getPlaceHolder()) ?>" value="<?php echo $pharmacy_payment_add->BankName->EditValue ?>"<?php echo $pharmacy_payment_add->BankName->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_payment_add->BankName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_payment_add->AccountNumber->Visible) { // AccountNumber ?>
	<div id="r_AccountNumber" class="form-group row">
		<label id="elh_pharmacy_payment_AccountNumber" for="x_AccountNumber" class="<?php echo $pharmacy_payment_add->LeftColumnClass ?>"><script id="tpc_pharmacy_payment_AccountNumber" type="text/html"><?php echo $pharmacy_payment_add->AccountNumber->caption() ?><?php echo $pharmacy_payment_add->AccountNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_payment_add->RightColumnClass ?>"><div <?php echo $pharmacy_payment_add->AccountNumber->cellAttributes() ?>>
<script id="tpx_pharmacy_payment_AccountNumber" type="text/html"><span id="el_pharmacy_payment_AccountNumber">
<input type="text" data-table="pharmacy_payment" data-field="x_AccountNumber" name="x_AccountNumber" id="x_AccountNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_payment_add->AccountNumber->getPlaceHolder()) ?>" value="<?php echo $pharmacy_payment_add->AccountNumber->EditValue ?>"<?php echo $pharmacy_payment_add->AccountNumber->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_payment_add->AccountNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_payment_add->chequeNumber->Visible) { // chequeNumber ?>
	<div id="r_chequeNumber" class="form-group row">
		<label id="elh_pharmacy_payment_chequeNumber" for="x_chequeNumber" class="<?php echo $pharmacy_payment_add->LeftColumnClass ?>"><script id="tpc_pharmacy_payment_chequeNumber" type="text/html"><?php echo $pharmacy_payment_add->chequeNumber->caption() ?><?php echo $pharmacy_payment_add->chequeNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_payment_add->RightColumnClass ?>"><div <?php echo $pharmacy_payment_add->chequeNumber->cellAttributes() ?>>
<script id="tpx_pharmacy_payment_chequeNumber" type="text/html"><span id="el_pharmacy_payment_chequeNumber">
<input type="text" data-table="pharmacy_payment" data-field="x_chequeNumber" name="x_chequeNumber" id="x_chequeNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_payment_add->chequeNumber->getPlaceHolder()) ?>" value="<?php echo $pharmacy_payment_add->chequeNumber->EditValue ?>"<?php echo $pharmacy_payment_add->chequeNumber->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_payment_add->chequeNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_payment_add->Remarks->Visible) { // Remarks ?>
	<div id="r_Remarks" class="form-group row">
		<label id="elh_pharmacy_payment_Remarks" for="x_Remarks" class="<?php echo $pharmacy_payment_add->LeftColumnClass ?>"><script id="tpc_pharmacy_payment_Remarks" type="text/html"><?php echo $pharmacy_payment_add->Remarks->caption() ?><?php echo $pharmacy_payment_add->Remarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_payment_add->RightColumnClass ?>"><div <?php echo $pharmacy_payment_add->Remarks->cellAttributes() ?>>
<script id="tpx_pharmacy_payment_Remarks" type="text/html"><span id="el_pharmacy_payment_Remarks">
<textarea data-table="pharmacy_payment" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" cols="35" rows="4" placeholder="<?php echo HtmlEncode($pharmacy_payment_add->Remarks->getPlaceHolder()) ?>"<?php echo $pharmacy_payment_add->Remarks->editAttributes() ?>><?php echo $pharmacy_payment_add->Remarks->EditValue ?></textarea>
</span></script>
<?php echo $pharmacy_payment_add->Remarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_payment_add->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
	<div id="r_SeectPaymentMode" class="form-group row">
		<label id="elh_pharmacy_payment_SeectPaymentMode" for="x_SeectPaymentMode" class="<?php echo $pharmacy_payment_add->LeftColumnClass ?>"><script id="tpc_pharmacy_payment_SeectPaymentMode" type="text/html"><?php echo $pharmacy_payment_add->SeectPaymentMode->caption() ?><?php echo $pharmacy_payment_add->SeectPaymentMode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_payment_add->RightColumnClass ?>"><div <?php echo $pharmacy_payment_add->SeectPaymentMode->cellAttributes() ?>>
<script id="tpx_pharmacy_payment_SeectPaymentMode" type="text/html"><span id="el_pharmacy_payment_SeectPaymentMode">
<input type="text" data-table="pharmacy_payment" data-field="x_SeectPaymentMode" name="x_SeectPaymentMode" id="x_SeectPaymentMode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_payment_add->SeectPaymentMode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_payment_add->SeectPaymentMode->EditValue ?>"<?php echo $pharmacy_payment_add->SeectPaymentMode->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_payment_add->SeectPaymentMode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_payment_add->PaidAmount->Visible) { // PaidAmount ?>
	<div id="r_PaidAmount" class="form-group row">
		<label id="elh_pharmacy_payment_PaidAmount" for="x_PaidAmount" class="<?php echo $pharmacy_payment_add->LeftColumnClass ?>"><script id="tpc_pharmacy_payment_PaidAmount" type="text/html"><?php echo $pharmacy_payment_add->PaidAmount->caption() ?><?php echo $pharmacy_payment_add->PaidAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_payment_add->RightColumnClass ?>"><div <?php echo $pharmacy_payment_add->PaidAmount->cellAttributes() ?>>
<script id="tpx_pharmacy_payment_PaidAmount" type="text/html"><span id="el_pharmacy_payment_PaidAmount">
<input type="text" data-table="pharmacy_payment" data-field="x_PaidAmount" name="x_PaidAmount" id="x_PaidAmount" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_payment_add->PaidAmount->getPlaceHolder()) ?>" value="<?php echo $pharmacy_payment_add->PaidAmount->EditValue ?>"<?php echo $pharmacy_payment_add->PaidAmount->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_payment_add->PaidAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_payment_add->Currency->Visible) { // Currency ?>
	<div id="r_Currency" class="form-group row">
		<label id="elh_pharmacy_payment_Currency" for="x_Currency" class="<?php echo $pharmacy_payment_add->LeftColumnClass ?>"><script id="tpc_pharmacy_payment_Currency" type="text/html"><?php echo $pharmacy_payment_add->Currency->caption() ?><?php echo $pharmacy_payment_add->Currency->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_payment_add->RightColumnClass ?>"><div <?php echo $pharmacy_payment_add->Currency->cellAttributes() ?>>
<script id="tpx_pharmacy_payment_Currency" type="text/html"><span id="el_pharmacy_payment_Currency">
<input type="text" data-table="pharmacy_payment" data-field="x_Currency" name="x_Currency" id="x_Currency" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_payment_add->Currency->getPlaceHolder()) ?>" value="<?php echo $pharmacy_payment_add->Currency->EditValue ?>"<?php echo $pharmacy_payment_add->Currency->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_payment_add->Currency->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_payment_add->CardNumber->Visible) { // CardNumber ?>
	<div id="r_CardNumber" class="form-group row">
		<label id="elh_pharmacy_payment_CardNumber" for="x_CardNumber" class="<?php echo $pharmacy_payment_add->LeftColumnClass ?>"><script id="tpc_pharmacy_payment_CardNumber" type="text/html"><?php echo $pharmacy_payment_add->CardNumber->caption() ?><?php echo $pharmacy_payment_add->CardNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_payment_add->RightColumnClass ?>"><div <?php echo $pharmacy_payment_add->CardNumber->cellAttributes() ?>>
<script id="tpx_pharmacy_payment_CardNumber" type="text/html"><span id="el_pharmacy_payment_CardNumber">
<input type="text" data-table="pharmacy_payment" data-field="x_CardNumber" name="x_CardNumber" id="x_CardNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_payment_add->CardNumber->getPlaceHolder()) ?>" value="<?php echo $pharmacy_payment_add->CardNumber->EditValue ?>"<?php echo $pharmacy_payment_add->CardNumber->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_payment_add->CardNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_pharmacy_paymentadd" class="ew-custom-template"></div>
<script id="tpm_pharmacy_paymentadd" type="text/html">
<div id="ct_pharmacy_payment_add"><style>
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
		<h3 class="card-title">{{include tmpl="#tpc_pharmacy_payment_PAYNO"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_payment_PAYNO")/}}</h3>
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
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_payment_pharmacy_pocol"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_payment_pharmacy_pocol")/}}</span>
				  </div>
				 <div hidden class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_payment_PC"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_payment_PC")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_payment_DT"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_payment_DT")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_payment_YM"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_payment_YM")/}}</span>
				  </div>
				  <div hidden class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_payment_Customercode"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_payment_Customercode")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_payment_Customername"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_payment_Customername")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_payment_Remarks"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_payment_Remarks")/}}</span>
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
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_payment_Address1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_payment_Address1")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_payment_Address2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_payment_Address2")/}}</span>
				  </div>
				  <div hidden class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_payment_Address3"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_payment_Address3")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_payment_State"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_payment_State")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_payment_Pincode"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_payment_Pincode")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_payment_Fax"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_payment_Fax")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_payment_Phone"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_payment_Phone")/}}</span>
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
			<td style="width:40%">{{include tmpl="#tpc_pharmacy_payment_ModeofPayment"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_payment_ModeofPayment")/}}</td>
			<td>{{include tmpl="#tpc_pharmacy_payment_Amount"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_payment_Amount")/}}</td>
			<td></td>
		</tr>
		<tr>
			<td style="width:40%">{{include tmpl="#tpc_pharmacy_payment_BankName"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_payment_BankName")/}}</td>
			<td>{{include tmpl="#tpc_pharmacy_payment_AccountNumber"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_payment_AccountNumber")/}}</td>
			<td>{{include tmpl="#tpc_pharmacy_payment_chequeNumber"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_payment_chequeNumber")/}}</td>
		</tr>
		<tr>
			<td style="width:40%">{{include tmpl="#tpc_pharmacy_payment_Remarks"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_payment_Remarks")/}}</td>
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
	if (in_array("pharmacy_grn", explode(",", $pharmacy_payment->getCurrentDetailTable())) && $pharmacy_grn->DetailAdd) {
?>
<?php if ($pharmacy_payment->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("pharmacy_grn", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "pharmacy_grngrid.php" ?>
<?php } ?>
<?php if (!$pharmacy_payment_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $pharmacy_payment_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pharmacy_payment_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($pharmacy_payment->Rows) ?> };
	ew.applyTemplate("tpd_pharmacy_paymentadd", "tpm_pharmacy_paymentadd", "pharmacy_paymentadd", "<?php echo $pharmacy_payment->CustomExport ?>", ew.templateData.rows[0]);
	$("script.pharmacy_paymentadd_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$pharmacy_payment_add->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	function calulateselectedAmount(){for(var e=document.getElementById("Totttlcnt").value,t=0,n=0;n<e;n++){if(1==document.getElementById("select"+n).checked){var d=document.getElementById("PaidAmount"+n).value;t=parseInt(t)+parseInt(d)}document.getElementById("totalAMTtoPay").innerText=t.toFixed(2),document.getElementById("x_Amount").value=t.toFixed(2)}}
});
</script>
<?php include_once "footer.php"; ?>
<?php
$pharmacy_payment_add->terminate();
?>