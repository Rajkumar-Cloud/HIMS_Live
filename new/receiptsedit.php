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
$receipts_edit = new receipts_edit();

// Run the page
$receipts_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$receipts_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var freceiptsedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	freceiptsedit = currentForm = new ew.Form("freceiptsedit", "edit");

	// Validate form
	freceiptsedit.validate = function() {
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
			<?php if ($receipts_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts_edit->id->caption(), $receipts_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($receipts_edit->Reception->Required) { ?>
				elm = this.getElements("x" + infix + "_Reception");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts_edit->Reception->caption(), $receipts_edit->Reception->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Reception");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($receipts_edit->Reception->errorMessage()) ?>");
			<?php if ($receipts_edit->Aid->Required) { ?>
				elm = this.getElements("x" + infix + "_Aid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts_edit->Aid->caption(), $receipts_edit->Aid->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Aid");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($receipts_edit->Aid->errorMessage()) ?>");
			<?php if ($receipts_edit->Vid->Required) { ?>
				elm = this.getElements("x" + infix + "_Vid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts_edit->Vid->caption(), $receipts_edit->Vid->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Vid");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($receipts_edit->Vid->errorMessage()) ?>");
			<?php if ($receipts_edit->patient_id->Required) { ?>
				elm = this.getElements("x" + infix + "_patient_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts_edit->patient_id->caption(), $receipts_edit->patient_id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_patient_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($receipts_edit->patient_id->errorMessage()) ?>");
			<?php if ($receipts_edit->mrnno->Required) { ?>
				elm = this.getElements("x" + infix + "_mrnno");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts_edit->mrnno->caption(), $receipts_edit->mrnno->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($receipts_edit->PatientName->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts_edit->PatientName->caption(), $receipts_edit->PatientName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($receipts_edit->amount->Required) { ?>
				elm = this.getElements("x" + infix + "_amount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts_edit->amount->caption(), $receipts_edit->amount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_amount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($receipts_edit->amount->errorMessage()) ?>");
			<?php if ($receipts_edit->Discount->Required) { ?>
				elm = this.getElements("x" + infix + "_Discount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts_edit->Discount->caption(), $receipts_edit->Discount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Discount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($receipts_edit->Discount->errorMessage()) ?>");
			<?php if ($receipts_edit->SubTotal->Required) { ?>
				elm = this.getElements("x" + infix + "_SubTotal");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts_edit->SubTotal->caption(), $receipts_edit->SubTotal->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SubTotal");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($receipts_edit->SubTotal->errorMessage()) ?>");
			<?php if ($receipts_edit->patient_type->Required) { ?>
				elm = this.getElements("x" + infix + "_patient_type");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts_edit->patient_type->caption(), $receipts_edit->patient_type->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_patient_type");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($receipts_edit->patient_type->errorMessage()) ?>");
			<?php if ($receipts_edit->invoiceId->Required) { ?>
				elm = this.getElements("x" + infix + "_invoiceId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts_edit->invoiceId->caption(), $receipts_edit->invoiceId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_invoiceId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($receipts_edit->invoiceId->errorMessage()) ?>");
			<?php if ($receipts_edit->invoiceAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_invoiceAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts_edit->invoiceAmount->caption(), $receipts_edit->invoiceAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_invoiceAmount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($receipts_edit->invoiceAmount->errorMessage()) ?>");
			<?php if ($receipts_edit->invoiceStatus->Required) { ?>
				elm = this.getElements("x" + infix + "_invoiceStatus");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts_edit->invoiceStatus->caption(), $receipts_edit->invoiceStatus->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($receipts_edit->modeOfPayment->Required) { ?>
				elm = this.getElements("x" + infix + "_modeOfPayment");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts_edit->modeOfPayment->caption(), $receipts_edit->modeOfPayment->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($receipts_edit->charged_date->Required) { ?>
				elm = this.getElements("x" + infix + "_charged_date");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts_edit->charged_date->caption(), $receipts_edit->charged_date->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_charged_date");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($receipts_edit->charged_date->errorMessage()) ?>");
			<?php if ($receipts_edit->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts_edit->status->caption(), $receipts_edit->status->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($receipts_edit->status->errorMessage()) ?>");
			<?php if ($receipts_edit->createdby->Required) { ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts_edit->createdby->caption(), $receipts_edit->createdby->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($receipts_edit->createdby->errorMessage()) ?>");
			<?php if ($receipts_edit->createddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts_edit->createddatetime->caption(), $receipts_edit->createddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($receipts_edit->createddatetime->errorMessage()) ?>");
			<?php if ($receipts_edit->modifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts_edit->modifiedby->caption(), $receipts_edit->modifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($receipts_edit->modifiedby->errorMessage()) ?>");
			<?php if ($receipts_edit->modifieddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts_edit->modifieddatetime->caption(), $receipts_edit->modifieddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($receipts_edit->modifieddatetime->errorMessage()) ?>");
			<?php if ($receipts_edit->ChequeCardNo->Required) { ?>
				elm = this.getElements("x" + infix + "_ChequeCardNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts_edit->ChequeCardNo->caption(), $receipts_edit->ChequeCardNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($receipts_edit->CreditBankName->Required) { ?>
				elm = this.getElements("x" + infix + "_CreditBankName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts_edit->CreditBankName->caption(), $receipts_edit->CreditBankName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($receipts_edit->CreditCardHolder->Required) { ?>
				elm = this.getElements("x" + infix + "_CreditCardHolder");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts_edit->CreditCardHolder->caption(), $receipts_edit->CreditCardHolder->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($receipts_edit->CreditCardType->Required) { ?>
				elm = this.getElements("x" + infix + "_CreditCardType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts_edit->CreditCardType->caption(), $receipts_edit->CreditCardType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($receipts_edit->CreditCardMachine->Required) { ?>
				elm = this.getElements("x" + infix + "_CreditCardMachine");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts_edit->CreditCardMachine->caption(), $receipts_edit->CreditCardMachine->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($receipts_edit->CreditCardBatchNo->Required) { ?>
				elm = this.getElements("x" + infix + "_CreditCardBatchNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts_edit->CreditCardBatchNo->caption(), $receipts_edit->CreditCardBatchNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($receipts_edit->CreditCardTax->Required) { ?>
				elm = this.getElements("x" + infix + "_CreditCardTax");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts_edit->CreditCardTax->caption(), $receipts_edit->CreditCardTax->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($receipts_edit->CreditDeductionAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_CreditDeductionAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts_edit->CreditDeductionAmount->caption(), $receipts_edit->CreditDeductionAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($receipts_edit->RealizationAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_RealizationAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts_edit->RealizationAmount->caption(), $receipts_edit->RealizationAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($receipts_edit->RealizationStatus->Required) { ?>
				elm = this.getElements("x" + infix + "_RealizationStatus");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts_edit->RealizationStatus->caption(), $receipts_edit->RealizationStatus->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($receipts_edit->RealizationRemarks->Required) { ?>
				elm = this.getElements("x" + infix + "_RealizationRemarks");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts_edit->RealizationRemarks->caption(), $receipts_edit->RealizationRemarks->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($receipts_edit->RealizationBatchNo->Required) { ?>
				elm = this.getElements("x" + infix + "_RealizationBatchNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts_edit->RealizationBatchNo->caption(), $receipts_edit->RealizationBatchNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($receipts_edit->RealizationDate->Required) { ?>
				elm = this.getElements("x" + infix + "_RealizationDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts_edit->RealizationDate->caption(), $receipts_edit->RealizationDate->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($receipts_edit->BankAccHolderMobileNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_BankAccHolderMobileNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts_edit->BankAccHolderMobileNumber->caption(), $receipts_edit->BankAccHolderMobileNumber->RequiredErrorMessage)) ?>");
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
	freceiptsedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	freceiptsedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("freceiptsedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $receipts_edit->showPageHeader(); ?>
<?php
$receipts_edit->showMessage();
?>
<form name="freceiptsedit" id="freceiptsedit" class="<?php echo $receipts_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="receipts">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$receipts_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($receipts_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_receipts_id" class="<?php echo $receipts_edit->LeftColumnClass ?>"><?php echo $receipts_edit->id->caption() ?><?php echo $receipts_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_edit->RightColumnClass ?>"><div <?php echo $receipts_edit->id->cellAttributes() ?>>
<span id="el_receipts_id">
<span<?php echo $receipts_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($receipts_edit->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="receipts" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($receipts_edit->id->CurrentValue) ?>">
<?php echo $receipts_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts_edit->Reception->Visible) { // Reception ?>
	<div id="r_Reception" class="form-group row">
		<label id="elh_receipts_Reception" for="x_Reception" class="<?php echo $receipts_edit->LeftColumnClass ?>"><?php echo $receipts_edit->Reception->caption() ?><?php echo $receipts_edit->Reception->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_edit->RightColumnClass ?>"><div <?php echo $receipts_edit->Reception->cellAttributes() ?>>
<span id="el_receipts_Reception">
<input type="text" data-table="receipts" data-field="x_Reception" name="x_Reception" id="x_Reception" size="30" placeholder="<?php echo HtmlEncode($receipts_edit->Reception->getPlaceHolder()) ?>" value="<?php echo $receipts_edit->Reception->EditValue ?>"<?php echo $receipts_edit->Reception->editAttributes() ?>>
</span>
<?php echo $receipts_edit->Reception->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts_edit->Aid->Visible) { // Aid ?>
	<div id="r_Aid" class="form-group row">
		<label id="elh_receipts_Aid" for="x_Aid" class="<?php echo $receipts_edit->LeftColumnClass ?>"><?php echo $receipts_edit->Aid->caption() ?><?php echo $receipts_edit->Aid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_edit->RightColumnClass ?>"><div <?php echo $receipts_edit->Aid->cellAttributes() ?>>
<span id="el_receipts_Aid">
<input type="text" data-table="receipts" data-field="x_Aid" name="x_Aid" id="x_Aid" size="30" placeholder="<?php echo HtmlEncode($receipts_edit->Aid->getPlaceHolder()) ?>" value="<?php echo $receipts_edit->Aid->EditValue ?>"<?php echo $receipts_edit->Aid->editAttributes() ?>>
</span>
<?php echo $receipts_edit->Aid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts_edit->Vid->Visible) { // Vid ?>
	<div id="r_Vid" class="form-group row">
		<label id="elh_receipts_Vid" for="x_Vid" class="<?php echo $receipts_edit->LeftColumnClass ?>"><?php echo $receipts_edit->Vid->caption() ?><?php echo $receipts_edit->Vid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_edit->RightColumnClass ?>"><div <?php echo $receipts_edit->Vid->cellAttributes() ?>>
<span id="el_receipts_Vid">
<input type="text" data-table="receipts" data-field="x_Vid" name="x_Vid" id="x_Vid" size="30" placeholder="<?php echo HtmlEncode($receipts_edit->Vid->getPlaceHolder()) ?>" value="<?php echo $receipts_edit->Vid->EditValue ?>"<?php echo $receipts_edit->Vid->editAttributes() ?>>
</span>
<?php echo $receipts_edit->Vid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts_edit->patient_id->Visible) { // patient_id ?>
	<div id="r_patient_id" class="form-group row">
		<label id="elh_receipts_patient_id" for="x_patient_id" class="<?php echo $receipts_edit->LeftColumnClass ?>"><?php echo $receipts_edit->patient_id->caption() ?><?php echo $receipts_edit->patient_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_edit->RightColumnClass ?>"><div <?php echo $receipts_edit->patient_id->cellAttributes() ?>>
<span id="el_receipts_patient_id">
<input type="text" data-table="receipts" data-field="x_patient_id" name="x_patient_id" id="x_patient_id" size="30" placeholder="<?php echo HtmlEncode($receipts_edit->patient_id->getPlaceHolder()) ?>" value="<?php echo $receipts_edit->patient_id->EditValue ?>"<?php echo $receipts_edit->patient_id->editAttributes() ?>>
</span>
<?php echo $receipts_edit->patient_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts_edit->mrnno->Visible) { // mrnno ?>
	<div id="r_mrnno" class="form-group row">
		<label id="elh_receipts_mrnno" for="x_mrnno" class="<?php echo $receipts_edit->LeftColumnClass ?>"><?php echo $receipts_edit->mrnno->caption() ?><?php echo $receipts_edit->mrnno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_edit->RightColumnClass ?>"><div <?php echo $receipts_edit->mrnno->cellAttributes() ?>>
<span id="el_receipts_mrnno">
<input type="text" data-table="receipts" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($receipts_edit->mrnno->getPlaceHolder()) ?>" value="<?php echo $receipts_edit->mrnno->EditValue ?>"<?php echo $receipts_edit->mrnno->editAttributes() ?>>
</span>
<?php echo $receipts_edit->mrnno->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts_edit->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label id="elh_receipts_PatientName" for="x_PatientName" class="<?php echo $receipts_edit->LeftColumnClass ?>"><?php echo $receipts_edit->PatientName->caption() ?><?php echo $receipts_edit->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_edit->RightColumnClass ?>"><div <?php echo $receipts_edit->PatientName->cellAttributes() ?>>
<span id="el_receipts_PatientName">
<input type="text" data-table="receipts" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($receipts_edit->PatientName->getPlaceHolder()) ?>" value="<?php echo $receipts_edit->PatientName->EditValue ?>"<?php echo $receipts_edit->PatientName->editAttributes() ?>>
</span>
<?php echo $receipts_edit->PatientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts_edit->amount->Visible) { // amount ?>
	<div id="r_amount" class="form-group row">
		<label id="elh_receipts_amount" for="x_amount" class="<?php echo $receipts_edit->LeftColumnClass ?>"><?php echo $receipts_edit->amount->caption() ?><?php echo $receipts_edit->amount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_edit->RightColumnClass ?>"><div <?php echo $receipts_edit->amount->cellAttributes() ?>>
<span id="el_receipts_amount">
<input type="text" data-table="receipts" data-field="x_amount" name="x_amount" id="x_amount" size="30" placeholder="<?php echo HtmlEncode($receipts_edit->amount->getPlaceHolder()) ?>" value="<?php echo $receipts_edit->amount->EditValue ?>"<?php echo $receipts_edit->amount->editAttributes() ?>>
</span>
<?php echo $receipts_edit->amount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts_edit->Discount->Visible) { // Discount ?>
	<div id="r_Discount" class="form-group row">
		<label id="elh_receipts_Discount" for="x_Discount" class="<?php echo $receipts_edit->LeftColumnClass ?>"><?php echo $receipts_edit->Discount->caption() ?><?php echo $receipts_edit->Discount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_edit->RightColumnClass ?>"><div <?php echo $receipts_edit->Discount->cellAttributes() ?>>
<span id="el_receipts_Discount">
<input type="text" data-table="receipts" data-field="x_Discount" name="x_Discount" id="x_Discount" size="30" placeholder="<?php echo HtmlEncode($receipts_edit->Discount->getPlaceHolder()) ?>" value="<?php echo $receipts_edit->Discount->EditValue ?>"<?php echo $receipts_edit->Discount->editAttributes() ?>>
</span>
<?php echo $receipts_edit->Discount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts_edit->SubTotal->Visible) { // SubTotal ?>
	<div id="r_SubTotal" class="form-group row">
		<label id="elh_receipts_SubTotal" for="x_SubTotal" class="<?php echo $receipts_edit->LeftColumnClass ?>"><?php echo $receipts_edit->SubTotal->caption() ?><?php echo $receipts_edit->SubTotal->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_edit->RightColumnClass ?>"><div <?php echo $receipts_edit->SubTotal->cellAttributes() ?>>
<span id="el_receipts_SubTotal">
<input type="text" data-table="receipts" data-field="x_SubTotal" name="x_SubTotal" id="x_SubTotal" size="30" placeholder="<?php echo HtmlEncode($receipts_edit->SubTotal->getPlaceHolder()) ?>" value="<?php echo $receipts_edit->SubTotal->EditValue ?>"<?php echo $receipts_edit->SubTotal->editAttributes() ?>>
</span>
<?php echo $receipts_edit->SubTotal->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts_edit->patient_type->Visible) { // patient_type ?>
	<div id="r_patient_type" class="form-group row">
		<label id="elh_receipts_patient_type" for="x_patient_type" class="<?php echo $receipts_edit->LeftColumnClass ?>"><?php echo $receipts_edit->patient_type->caption() ?><?php echo $receipts_edit->patient_type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_edit->RightColumnClass ?>"><div <?php echo $receipts_edit->patient_type->cellAttributes() ?>>
<span id="el_receipts_patient_type">
<input type="text" data-table="receipts" data-field="x_patient_type" name="x_patient_type" id="x_patient_type" size="30" placeholder="<?php echo HtmlEncode($receipts_edit->patient_type->getPlaceHolder()) ?>" value="<?php echo $receipts_edit->patient_type->EditValue ?>"<?php echo $receipts_edit->patient_type->editAttributes() ?>>
</span>
<?php echo $receipts_edit->patient_type->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts_edit->invoiceId->Visible) { // invoiceId ?>
	<div id="r_invoiceId" class="form-group row">
		<label id="elh_receipts_invoiceId" for="x_invoiceId" class="<?php echo $receipts_edit->LeftColumnClass ?>"><?php echo $receipts_edit->invoiceId->caption() ?><?php echo $receipts_edit->invoiceId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_edit->RightColumnClass ?>"><div <?php echo $receipts_edit->invoiceId->cellAttributes() ?>>
<span id="el_receipts_invoiceId">
<input type="text" data-table="receipts" data-field="x_invoiceId" name="x_invoiceId" id="x_invoiceId" size="30" placeholder="<?php echo HtmlEncode($receipts_edit->invoiceId->getPlaceHolder()) ?>" value="<?php echo $receipts_edit->invoiceId->EditValue ?>"<?php echo $receipts_edit->invoiceId->editAttributes() ?>>
</span>
<?php echo $receipts_edit->invoiceId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts_edit->invoiceAmount->Visible) { // invoiceAmount ?>
	<div id="r_invoiceAmount" class="form-group row">
		<label id="elh_receipts_invoiceAmount" for="x_invoiceAmount" class="<?php echo $receipts_edit->LeftColumnClass ?>"><?php echo $receipts_edit->invoiceAmount->caption() ?><?php echo $receipts_edit->invoiceAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_edit->RightColumnClass ?>"><div <?php echo $receipts_edit->invoiceAmount->cellAttributes() ?>>
<span id="el_receipts_invoiceAmount">
<input type="text" data-table="receipts" data-field="x_invoiceAmount" name="x_invoiceAmount" id="x_invoiceAmount" size="30" placeholder="<?php echo HtmlEncode($receipts_edit->invoiceAmount->getPlaceHolder()) ?>" value="<?php echo $receipts_edit->invoiceAmount->EditValue ?>"<?php echo $receipts_edit->invoiceAmount->editAttributes() ?>>
</span>
<?php echo $receipts_edit->invoiceAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts_edit->invoiceStatus->Visible) { // invoiceStatus ?>
	<div id="r_invoiceStatus" class="form-group row">
		<label id="elh_receipts_invoiceStatus" for="x_invoiceStatus" class="<?php echo $receipts_edit->LeftColumnClass ?>"><?php echo $receipts_edit->invoiceStatus->caption() ?><?php echo $receipts_edit->invoiceStatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_edit->RightColumnClass ?>"><div <?php echo $receipts_edit->invoiceStatus->cellAttributes() ?>>
<span id="el_receipts_invoiceStatus">
<input type="text" data-table="receipts" data-field="x_invoiceStatus" name="x_invoiceStatus" id="x_invoiceStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($receipts_edit->invoiceStatus->getPlaceHolder()) ?>" value="<?php echo $receipts_edit->invoiceStatus->EditValue ?>"<?php echo $receipts_edit->invoiceStatus->editAttributes() ?>>
</span>
<?php echo $receipts_edit->invoiceStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts_edit->modeOfPayment->Visible) { // modeOfPayment ?>
	<div id="r_modeOfPayment" class="form-group row">
		<label id="elh_receipts_modeOfPayment" for="x_modeOfPayment" class="<?php echo $receipts_edit->LeftColumnClass ?>"><?php echo $receipts_edit->modeOfPayment->caption() ?><?php echo $receipts_edit->modeOfPayment->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_edit->RightColumnClass ?>"><div <?php echo $receipts_edit->modeOfPayment->cellAttributes() ?>>
<span id="el_receipts_modeOfPayment">
<input type="text" data-table="receipts" data-field="x_modeOfPayment" name="x_modeOfPayment" id="x_modeOfPayment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($receipts_edit->modeOfPayment->getPlaceHolder()) ?>" value="<?php echo $receipts_edit->modeOfPayment->EditValue ?>"<?php echo $receipts_edit->modeOfPayment->editAttributes() ?>>
</span>
<?php echo $receipts_edit->modeOfPayment->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts_edit->charged_date->Visible) { // charged_date ?>
	<div id="r_charged_date" class="form-group row">
		<label id="elh_receipts_charged_date" for="x_charged_date" class="<?php echo $receipts_edit->LeftColumnClass ?>"><?php echo $receipts_edit->charged_date->caption() ?><?php echo $receipts_edit->charged_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_edit->RightColumnClass ?>"><div <?php echo $receipts_edit->charged_date->cellAttributes() ?>>
<span id="el_receipts_charged_date">
<input type="text" data-table="receipts" data-field="x_charged_date" name="x_charged_date" id="x_charged_date" placeholder="<?php echo HtmlEncode($receipts_edit->charged_date->getPlaceHolder()) ?>" value="<?php echo $receipts_edit->charged_date->EditValue ?>"<?php echo $receipts_edit->charged_date->editAttributes() ?>>
<?php if (!$receipts_edit->charged_date->ReadOnly && !$receipts_edit->charged_date->Disabled && !isset($receipts_edit->charged_date->EditAttrs["readonly"]) && !isset($receipts_edit->charged_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["freceiptsedit", "datetimepicker"], function() {
	ew.createDateTimePicker("freceiptsedit", "x_charged_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $receipts_edit->charged_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts_edit->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_receipts_status" for="x_status" class="<?php echo $receipts_edit->LeftColumnClass ?>"><?php echo $receipts_edit->status->caption() ?><?php echo $receipts_edit->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_edit->RightColumnClass ?>"><div <?php echo $receipts_edit->status->cellAttributes() ?>>
<span id="el_receipts_status">
<input type="text" data-table="receipts" data-field="x_status" name="x_status" id="x_status" size="30" placeholder="<?php echo HtmlEncode($receipts_edit->status->getPlaceHolder()) ?>" value="<?php echo $receipts_edit->status->EditValue ?>"<?php echo $receipts_edit->status->editAttributes() ?>>
</span>
<?php echo $receipts_edit->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts_edit->createdby->Visible) { // createdby ?>
	<div id="r_createdby" class="form-group row">
		<label id="elh_receipts_createdby" for="x_createdby" class="<?php echo $receipts_edit->LeftColumnClass ?>"><?php echo $receipts_edit->createdby->caption() ?><?php echo $receipts_edit->createdby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_edit->RightColumnClass ?>"><div <?php echo $receipts_edit->createdby->cellAttributes() ?>>
<span id="el_receipts_createdby">
<input type="text" data-table="receipts" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" placeholder="<?php echo HtmlEncode($receipts_edit->createdby->getPlaceHolder()) ?>" value="<?php echo $receipts_edit->createdby->EditValue ?>"<?php echo $receipts_edit->createdby->editAttributes() ?>>
</span>
<?php echo $receipts_edit->createdby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts_edit->createddatetime->Visible) { // createddatetime ?>
	<div id="r_createddatetime" class="form-group row">
		<label id="elh_receipts_createddatetime" for="x_createddatetime" class="<?php echo $receipts_edit->LeftColumnClass ?>"><?php echo $receipts_edit->createddatetime->caption() ?><?php echo $receipts_edit->createddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_edit->RightColumnClass ?>"><div <?php echo $receipts_edit->createddatetime->cellAttributes() ?>>
<span id="el_receipts_createddatetime">
<input type="text" data-table="receipts" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?php echo HtmlEncode($receipts_edit->createddatetime->getPlaceHolder()) ?>" value="<?php echo $receipts_edit->createddatetime->EditValue ?>"<?php echo $receipts_edit->createddatetime->editAttributes() ?>>
<?php if (!$receipts_edit->createddatetime->ReadOnly && !$receipts_edit->createddatetime->Disabled && !isset($receipts_edit->createddatetime->EditAttrs["readonly"]) && !isset($receipts_edit->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["freceiptsedit", "datetimepicker"], function() {
	ew.createDateTimePicker("freceiptsedit", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $receipts_edit->createddatetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts_edit->modifiedby->Visible) { // modifiedby ?>
	<div id="r_modifiedby" class="form-group row">
		<label id="elh_receipts_modifiedby" for="x_modifiedby" class="<?php echo $receipts_edit->LeftColumnClass ?>"><?php echo $receipts_edit->modifiedby->caption() ?><?php echo $receipts_edit->modifiedby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_edit->RightColumnClass ?>"><div <?php echo $receipts_edit->modifiedby->cellAttributes() ?>>
<span id="el_receipts_modifiedby">
<input type="text" data-table="receipts" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" placeholder="<?php echo HtmlEncode($receipts_edit->modifiedby->getPlaceHolder()) ?>" value="<?php echo $receipts_edit->modifiedby->EditValue ?>"<?php echo $receipts_edit->modifiedby->editAttributes() ?>>
</span>
<?php echo $receipts_edit->modifiedby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts_edit->modifieddatetime->Visible) { // modifieddatetime ?>
	<div id="r_modifieddatetime" class="form-group row">
		<label id="elh_receipts_modifieddatetime" for="x_modifieddatetime" class="<?php echo $receipts_edit->LeftColumnClass ?>"><?php echo $receipts_edit->modifieddatetime->caption() ?><?php echo $receipts_edit->modifieddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_edit->RightColumnClass ?>"><div <?php echo $receipts_edit->modifieddatetime->cellAttributes() ?>>
<span id="el_receipts_modifieddatetime">
<input type="text" data-table="receipts" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?php echo HtmlEncode($receipts_edit->modifieddatetime->getPlaceHolder()) ?>" value="<?php echo $receipts_edit->modifieddatetime->EditValue ?>"<?php echo $receipts_edit->modifieddatetime->editAttributes() ?>>
<?php if (!$receipts_edit->modifieddatetime->ReadOnly && !$receipts_edit->modifieddatetime->Disabled && !isset($receipts_edit->modifieddatetime->EditAttrs["readonly"]) && !isset($receipts_edit->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["freceiptsedit", "datetimepicker"], function() {
	ew.createDateTimePicker("freceiptsedit", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $receipts_edit->modifieddatetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts_edit->ChequeCardNo->Visible) { // ChequeCardNo ?>
	<div id="r_ChequeCardNo" class="form-group row">
		<label id="elh_receipts_ChequeCardNo" for="x_ChequeCardNo" class="<?php echo $receipts_edit->LeftColumnClass ?>"><?php echo $receipts_edit->ChequeCardNo->caption() ?><?php echo $receipts_edit->ChequeCardNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_edit->RightColumnClass ?>"><div <?php echo $receipts_edit->ChequeCardNo->cellAttributes() ?>>
<span id="el_receipts_ChequeCardNo">
<input type="text" data-table="receipts" data-field="x_ChequeCardNo" name="x_ChequeCardNo" id="x_ChequeCardNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($receipts_edit->ChequeCardNo->getPlaceHolder()) ?>" value="<?php echo $receipts_edit->ChequeCardNo->EditValue ?>"<?php echo $receipts_edit->ChequeCardNo->editAttributes() ?>>
</span>
<?php echo $receipts_edit->ChequeCardNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts_edit->CreditBankName->Visible) { // CreditBankName ?>
	<div id="r_CreditBankName" class="form-group row">
		<label id="elh_receipts_CreditBankName" for="x_CreditBankName" class="<?php echo $receipts_edit->LeftColumnClass ?>"><?php echo $receipts_edit->CreditBankName->caption() ?><?php echo $receipts_edit->CreditBankName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_edit->RightColumnClass ?>"><div <?php echo $receipts_edit->CreditBankName->cellAttributes() ?>>
<span id="el_receipts_CreditBankName">
<input type="text" data-table="receipts" data-field="x_CreditBankName" name="x_CreditBankName" id="x_CreditBankName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($receipts_edit->CreditBankName->getPlaceHolder()) ?>" value="<?php echo $receipts_edit->CreditBankName->EditValue ?>"<?php echo $receipts_edit->CreditBankName->editAttributes() ?>>
</span>
<?php echo $receipts_edit->CreditBankName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts_edit->CreditCardHolder->Visible) { // CreditCardHolder ?>
	<div id="r_CreditCardHolder" class="form-group row">
		<label id="elh_receipts_CreditCardHolder" for="x_CreditCardHolder" class="<?php echo $receipts_edit->LeftColumnClass ?>"><?php echo $receipts_edit->CreditCardHolder->caption() ?><?php echo $receipts_edit->CreditCardHolder->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_edit->RightColumnClass ?>"><div <?php echo $receipts_edit->CreditCardHolder->cellAttributes() ?>>
<span id="el_receipts_CreditCardHolder">
<input type="text" data-table="receipts" data-field="x_CreditCardHolder" name="x_CreditCardHolder" id="x_CreditCardHolder" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($receipts_edit->CreditCardHolder->getPlaceHolder()) ?>" value="<?php echo $receipts_edit->CreditCardHolder->EditValue ?>"<?php echo $receipts_edit->CreditCardHolder->editAttributes() ?>>
</span>
<?php echo $receipts_edit->CreditCardHolder->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts_edit->CreditCardType->Visible) { // CreditCardType ?>
	<div id="r_CreditCardType" class="form-group row">
		<label id="elh_receipts_CreditCardType" for="x_CreditCardType" class="<?php echo $receipts_edit->LeftColumnClass ?>"><?php echo $receipts_edit->CreditCardType->caption() ?><?php echo $receipts_edit->CreditCardType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_edit->RightColumnClass ?>"><div <?php echo $receipts_edit->CreditCardType->cellAttributes() ?>>
<span id="el_receipts_CreditCardType">
<input type="text" data-table="receipts" data-field="x_CreditCardType" name="x_CreditCardType" id="x_CreditCardType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($receipts_edit->CreditCardType->getPlaceHolder()) ?>" value="<?php echo $receipts_edit->CreditCardType->EditValue ?>"<?php echo $receipts_edit->CreditCardType->editAttributes() ?>>
</span>
<?php echo $receipts_edit->CreditCardType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts_edit->CreditCardMachine->Visible) { // CreditCardMachine ?>
	<div id="r_CreditCardMachine" class="form-group row">
		<label id="elh_receipts_CreditCardMachine" for="x_CreditCardMachine" class="<?php echo $receipts_edit->LeftColumnClass ?>"><?php echo $receipts_edit->CreditCardMachine->caption() ?><?php echo $receipts_edit->CreditCardMachine->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_edit->RightColumnClass ?>"><div <?php echo $receipts_edit->CreditCardMachine->cellAttributes() ?>>
<span id="el_receipts_CreditCardMachine">
<input type="text" data-table="receipts" data-field="x_CreditCardMachine" name="x_CreditCardMachine" id="x_CreditCardMachine" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($receipts_edit->CreditCardMachine->getPlaceHolder()) ?>" value="<?php echo $receipts_edit->CreditCardMachine->EditValue ?>"<?php echo $receipts_edit->CreditCardMachine->editAttributes() ?>>
</span>
<?php echo $receipts_edit->CreditCardMachine->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts_edit->CreditCardBatchNo->Visible) { // CreditCardBatchNo ?>
	<div id="r_CreditCardBatchNo" class="form-group row">
		<label id="elh_receipts_CreditCardBatchNo" for="x_CreditCardBatchNo" class="<?php echo $receipts_edit->LeftColumnClass ?>"><?php echo $receipts_edit->CreditCardBatchNo->caption() ?><?php echo $receipts_edit->CreditCardBatchNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_edit->RightColumnClass ?>"><div <?php echo $receipts_edit->CreditCardBatchNo->cellAttributes() ?>>
<span id="el_receipts_CreditCardBatchNo">
<input type="text" data-table="receipts" data-field="x_CreditCardBatchNo" name="x_CreditCardBatchNo" id="x_CreditCardBatchNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($receipts_edit->CreditCardBatchNo->getPlaceHolder()) ?>" value="<?php echo $receipts_edit->CreditCardBatchNo->EditValue ?>"<?php echo $receipts_edit->CreditCardBatchNo->editAttributes() ?>>
</span>
<?php echo $receipts_edit->CreditCardBatchNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts_edit->CreditCardTax->Visible) { // CreditCardTax ?>
	<div id="r_CreditCardTax" class="form-group row">
		<label id="elh_receipts_CreditCardTax" for="x_CreditCardTax" class="<?php echo $receipts_edit->LeftColumnClass ?>"><?php echo $receipts_edit->CreditCardTax->caption() ?><?php echo $receipts_edit->CreditCardTax->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_edit->RightColumnClass ?>"><div <?php echo $receipts_edit->CreditCardTax->cellAttributes() ?>>
<span id="el_receipts_CreditCardTax">
<input type="text" data-table="receipts" data-field="x_CreditCardTax" name="x_CreditCardTax" id="x_CreditCardTax" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($receipts_edit->CreditCardTax->getPlaceHolder()) ?>" value="<?php echo $receipts_edit->CreditCardTax->EditValue ?>"<?php echo $receipts_edit->CreditCardTax->editAttributes() ?>>
</span>
<?php echo $receipts_edit->CreditCardTax->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts_edit->CreditDeductionAmount->Visible) { // CreditDeductionAmount ?>
	<div id="r_CreditDeductionAmount" class="form-group row">
		<label id="elh_receipts_CreditDeductionAmount" for="x_CreditDeductionAmount" class="<?php echo $receipts_edit->LeftColumnClass ?>"><?php echo $receipts_edit->CreditDeductionAmount->caption() ?><?php echo $receipts_edit->CreditDeductionAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_edit->RightColumnClass ?>"><div <?php echo $receipts_edit->CreditDeductionAmount->cellAttributes() ?>>
<span id="el_receipts_CreditDeductionAmount">
<input type="text" data-table="receipts" data-field="x_CreditDeductionAmount" name="x_CreditDeductionAmount" id="x_CreditDeductionAmount" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($receipts_edit->CreditDeductionAmount->getPlaceHolder()) ?>" value="<?php echo $receipts_edit->CreditDeductionAmount->EditValue ?>"<?php echo $receipts_edit->CreditDeductionAmount->editAttributes() ?>>
</span>
<?php echo $receipts_edit->CreditDeductionAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts_edit->RealizationAmount->Visible) { // RealizationAmount ?>
	<div id="r_RealizationAmount" class="form-group row">
		<label id="elh_receipts_RealizationAmount" for="x_RealizationAmount" class="<?php echo $receipts_edit->LeftColumnClass ?>"><?php echo $receipts_edit->RealizationAmount->caption() ?><?php echo $receipts_edit->RealizationAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_edit->RightColumnClass ?>"><div <?php echo $receipts_edit->RealizationAmount->cellAttributes() ?>>
<span id="el_receipts_RealizationAmount">
<input type="text" data-table="receipts" data-field="x_RealizationAmount" name="x_RealizationAmount" id="x_RealizationAmount" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($receipts_edit->RealizationAmount->getPlaceHolder()) ?>" value="<?php echo $receipts_edit->RealizationAmount->EditValue ?>"<?php echo $receipts_edit->RealizationAmount->editAttributes() ?>>
</span>
<?php echo $receipts_edit->RealizationAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts_edit->RealizationStatus->Visible) { // RealizationStatus ?>
	<div id="r_RealizationStatus" class="form-group row">
		<label id="elh_receipts_RealizationStatus" for="x_RealizationStatus" class="<?php echo $receipts_edit->LeftColumnClass ?>"><?php echo $receipts_edit->RealizationStatus->caption() ?><?php echo $receipts_edit->RealizationStatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_edit->RightColumnClass ?>"><div <?php echo $receipts_edit->RealizationStatus->cellAttributes() ?>>
<span id="el_receipts_RealizationStatus">
<input type="text" data-table="receipts" data-field="x_RealizationStatus" name="x_RealizationStatus" id="x_RealizationStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($receipts_edit->RealizationStatus->getPlaceHolder()) ?>" value="<?php echo $receipts_edit->RealizationStatus->EditValue ?>"<?php echo $receipts_edit->RealizationStatus->editAttributes() ?>>
</span>
<?php echo $receipts_edit->RealizationStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts_edit->RealizationRemarks->Visible) { // RealizationRemarks ?>
	<div id="r_RealizationRemarks" class="form-group row">
		<label id="elh_receipts_RealizationRemarks" for="x_RealizationRemarks" class="<?php echo $receipts_edit->LeftColumnClass ?>"><?php echo $receipts_edit->RealizationRemarks->caption() ?><?php echo $receipts_edit->RealizationRemarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_edit->RightColumnClass ?>"><div <?php echo $receipts_edit->RealizationRemarks->cellAttributes() ?>>
<span id="el_receipts_RealizationRemarks">
<input type="text" data-table="receipts" data-field="x_RealizationRemarks" name="x_RealizationRemarks" id="x_RealizationRemarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($receipts_edit->RealizationRemarks->getPlaceHolder()) ?>" value="<?php echo $receipts_edit->RealizationRemarks->EditValue ?>"<?php echo $receipts_edit->RealizationRemarks->editAttributes() ?>>
</span>
<?php echo $receipts_edit->RealizationRemarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts_edit->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
	<div id="r_RealizationBatchNo" class="form-group row">
		<label id="elh_receipts_RealizationBatchNo" for="x_RealizationBatchNo" class="<?php echo $receipts_edit->LeftColumnClass ?>"><?php echo $receipts_edit->RealizationBatchNo->caption() ?><?php echo $receipts_edit->RealizationBatchNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_edit->RightColumnClass ?>"><div <?php echo $receipts_edit->RealizationBatchNo->cellAttributes() ?>>
<span id="el_receipts_RealizationBatchNo">
<input type="text" data-table="receipts" data-field="x_RealizationBatchNo" name="x_RealizationBatchNo" id="x_RealizationBatchNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($receipts_edit->RealizationBatchNo->getPlaceHolder()) ?>" value="<?php echo $receipts_edit->RealizationBatchNo->EditValue ?>"<?php echo $receipts_edit->RealizationBatchNo->editAttributes() ?>>
</span>
<?php echo $receipts_edit->RealizationBatchNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts_edit->RealizationDate->Visible) { // RealizationDate ?>
	<div id="r_RealizationDate" class="form-group row">
		<label id="elh_receipts_RealizationDate" for="x_RealizationDate" class="<?php echo $receipts_edit->LeftColumnClass ?>"><?php echo $receipts_edit->RealizationDate->caption() ?><?php echo $receipts_edit->RealizationDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_edit->RightColumnClass ?>"><div <?php echo $receipts_edit->RealizationDate->cellAttributes() ?>>
<span id="el_receipts_RealizationDate">
<input type="text" data-table="receipts" data-field="x_RealizationDate" name="x_RealizationDate" id="x_RealizationDate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($receipts_edit->RealizationDate->getPlaceHolder()) ?>" value="<?php echo $receipts_edit->RealizationDate->EditValue ?>"<?php echo $receipts_edit->RealizationDate->editAttributes() ?>>
</span>
<?php echo $receipts_edit->RealizationDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts_edit->BankAccHolderMobileNumber->Visible) { // BankAccHolderMobileNumber ?>
	<div id="r_BankAccHolderMobileNumber" class="form-group row">
		<label id="elh_receipts_BankAccHolderMobileNumber" for="x_BankAccHolderMobileNumber" class="<?php echo $receipts_edit->LeftColumnClass ?>"><?php echo $receipts_edit->BankAccHolderMobileNumber->caption() ?><?php echo $receipts_edit->BankAccHolderMobileNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_edit->RightColumnClass ?>"><div <?php echo $receipts_edit->BankAccHolderMobileNumber->cellAttributes() ?>>
<span id="el_receipts_BankAccHolderMobileNumber">
<input type="text" data-table="receipts" data-field="x_BankAccHolderMobileNumber" name="x_BankAccHolderMobileNumber" id="x_BankAccHolderMobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($receipts_edit->BankAccHolderMobileNumber->getPlaceHolder()) ?>" value="<?php echo $receipts_edit->BankAccHolderMobileNumber->EditValue ?>"<?php echo $receipts_edit->BankAccHolderMobileNumber->editAttributes() ?>>
</span>
<?php echo $receipts_edit->BankAccHolderMobileNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$receipts_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $receipts_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $receipts_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$receipts_edit->showPageFooter();
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
$receipts_edit->terminate();
?>