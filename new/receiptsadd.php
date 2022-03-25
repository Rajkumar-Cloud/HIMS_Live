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
$receipts_add = new receipts_add();

// Run the page
$receipts_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$receipts_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var freceiptsadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	freceiptsadd = currentForm = new ew.Form("freceiptsadd", "add");

	// Validate form
	freceiptsadd.validate = function() {
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
			<?php if ($receipts_add->Reception->Required) { ?>
				elm = this.getElements("x" + infix + "_Reception");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts_add->Reception->caption(), $receipts_add->Reception->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Reception");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($receipts_add->Reception->errorMessage()) ?>");
			<?php if ($receipts_add->Aid->Required) { ?>
				elm = this.getElements("x" + infix + "_Aid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts_add->Aid->caption(), $receipts_add->Aid->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Aid");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($receipts_add->Aid->errorMessage()) ?>");
			<?php if ($receipts_add->Vid->Required) { ?>
				elm = this.getElements("x" + infix + "_Vid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts_add->Vid->caption(), $receipts_add->Vid->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Vid");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($receipts_add->Vid->errorMessage()) ?>");
			<?php if ($receipts_add->patient_id->Required) { ?>
				elm = this.getElements("x" + infix + "_patient_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts_add->patient_id->caption(), $receipts_add->patient_id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_patient_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($receipts_add->patient_id->errorMessage()) ?>");
			<?php if ($receipts_add->mrnno->Required) { ?>
				elm = this.getElements("x" + infix + "_mrnno");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts_add->mrnno->caption(), $receipts_add->mrnno->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($receipts_add->PatientName->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts_add->PatientName->caption(), $receipts_add->PatientName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($receipts_add->amount->Required) { ?>
				elm = this.getElements("x" + infix + "_amount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts_add->amount->caption(), $receipts_add->amount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_amount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($receipts_add->amount->errorMessage()) ?>");
			<?php if ($receipts_add->Discount->Required) { ?>
				elm = this.getElements("x" + infix + "_Discount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts_add->Discount->caption(), $receipts_add->Discount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Discount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($receipts_add->Discount->errorMessage()) ?>");
			<?php if ($receipts_add->SubTotal->Required) { ?>
				elm = this.getElements("x" + infix + "_SubTotal");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts_add->SubTotal->caption(), $receipts_add->SubTotal->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SubTotal");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($receipts_add->SubTotal->errorMessage()) ?>");
			<?php if ($receipts_add->patient_type->Required) { ?>
				elm = this.getElements("x" + infix + "_patient_type");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts_add->patient_type->caption(), $receipts_add->patient_type->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_patient_type");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($receipts_add->patient_type->errorMessage()) ?>");
			<?php if ($receipts_add->invoiceId->Required) { ?>
				elm = this.getElements("x" + infix + "_invoiceId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts_add->invoiceId->caption(), $receipts_add->invoiceId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_invoiceId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($receipts_add->invoiceId->errorMessage()) ?>");
			<?php if ($receipts_add->invoiceAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_invoiceAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts_add->invoiceAmount->caption(), $receipts_add->invoiceAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_invoiceAmount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($receipts_add->invoiceAmount->errorMessage()) ?>");
			<?php if ($receipts_add->invoiceStatus->Required) { ?>
				elm = this.getElements("x" + infix + "_invoiceStatus");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts_add->invoiceStatus->caption(), $receipts_add->invoiceStatus->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($receipts_add->modeOfPayment->Required) { ?>
				elm = this.getElements("x" + infix + "_modeOfPayment");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts_add->modeOfPayment->caption(), $receipts_add->modeOfPayment->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($receipts_add->charged_date->Required) { ?>
				elm = this.getElements("x" + infix + "_charged_date");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts_add->charged_date->caption(), $receipts_add->charged_date->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_charged_date");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($receipts_add->charged_date->errorMessage()) ?>");
			<?php if ($receipts_add->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts_add->status->caption(), $receipts_add->status->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($receipts_add->status->errorMessage()) ?>");
			<?php if ($receipts_add->createdby->Required) { ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts_add->createdby->caption(), $receipts_add->createdby->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($receipts_add->createdby->errorMessage()) ?>");
			<?php if ($receipts_add->createddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts_add->createddatetime->caption(), $receipts_add->createddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($receipts_add->createddatetime->errorMessage()) ?>");
			<?php if ($receipts_add->modifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts_add->modifiedby->caption(), $receipts_add->modifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($receipts_add->modifiedby->errorMessage()) ?>");
			<?php if ($receipts_add->modifieddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts_add->modifieddatetime->caption(), $receipts_add->modifieddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($receipts_add->modifieddatetime->errorMessage()) ?>");
			<?php if ($receipts_add->ChequeCardNo->Required) { ?>
				elm = this.getElements("x" + infix + "_ChequeCardNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts_add->ChequeCardNo->caption(), $receipts_add->ChequeCardNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($receipts_add->CreditBankName->Required) { ?>
				elm = this.getElements("x" + infix + "_CreditBankName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts_add->CreditBankName->caption(), $receipts_add->CreditBankName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($receipts_add->CreditCardHolder->Required) { ?>
				elm = this.getElements("x" + infix + "_CreditCardHolder");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts_add->CreditCardHolder->caption(), $receipts_add->CreditCardHolder->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($receipts_add->CreditCardType->Required) { ?>
				elm = this.getElements("x" + infix + "_CreditCardType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts_add->CreditCardType->caption(), $receipts_add->CreditCardType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($receipts_add->CreditCardMachine->Required) { ?>
				elm = this.getElements("x" + infix + "_CreditCardMachine");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts_add->CreditCardMachine->caption(), $receipts_add->CreditCardMachine->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($receipts_add->CreditCardBatchNo->Required) { ?>
				elm = this.getElements("x" + infix + "_CreditCardBatchNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts_add->CreditCardBatchNo->caption(), $receipts_add->CreditCardBatchNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($receipts_add->CreditCardTax->Required) { ?>
				elm = this.getElements("x" + infix + "_CreditCardTax");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts_add->CreditCardTax->caption(), $receipts_add->CreditCardTax->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($receipts_add->CreditDeductionAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_CreditDeductionAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts_add->CreditDeductionAmount->caption(), $receipts_add->CreditDeductionAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($receipts_add->RealizationAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_RealizationAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts_add->RealizationAmount->caption(), $receipts_add->RealizationAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($receipts_add->RealizationStatus->Required) { ?>
				elm = this.getElements("x" + infix + "_RealizationStatus");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts_add->RealizationStatus->caption(), $receipts_add->RealizationStatus->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($receipts_add->RealizationRemarks->Required) { ?>
				elm = this.getElements("x" + infix + "_RealizationRemarks");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts_add->RealizationRemarks->caption(), $receipts_add->RealizationRemarks->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($receipts_add->RealizationBatchNo->Required) { ?>
				elm = this.getElements("x" + infix + "_RealizationBatchNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts_add->RealizationBatchNo->caption(), $receipts_add->RealizationBatchNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($receipts_add->RealizationDate->Required) { ?>
				elm = this.getElements("x" + infix + "_RealizationDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts_add->RealizationDate->caption(), $receipts_add->RealizationDate->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($receipts_add->BankAccHolderMobileNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_BankAccHolderMobileNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts_add->BankAccHolderMobileNumber->caption(), $receipts_add->BankAccHolderMobileNumber->RequiredErrorMessage)) ?>");
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
	freceiptsadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	freceiptsadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("freceiptsadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $receipts_add->showPageHeader(); ?>
<?php
$receipts_add->showMessage();
?>
<form name="freceiptsadd" id="freceiptsadd" class="<?php echo $receipts_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="receipts">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$receipts_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($receipts_add->Reception->Visible) { // Reception ?>
	<div id="r_Reception" class="form-group row">
		<label id="elh_receipts_Reception" for="x_Reception" class="<?php echo $receipts_add->LeftColumnClass ?>"><?php echo $receipts_add->Reception->caption() ?><?php echo $receipts_add->Reception->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_add->RightColumnClass ?>"><div <?php echo $receipts_add->Reception->cellAttributes() ?>>
<span id="el_receipts_Reception">
<input type="text" data-table="receipts" data-field="x_Reception" name="x_Reception" id="x_Reception" size="30" placeholder="<?php echo HtmlEncode($receipts_add->Reception->getPlaceHolder()) ?>" value="<?php echo $receipts_add->Reception->EditValue ?>"<?php echo $receipts_add->Reception->editAttributes() ?>>
</span>
<?php echo $receipts_add->Reception->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts_add->Aid->Visible) { // Aid ?>
	<div id="r_Aid" class="form-group row">
		<label id="elh_receipts_Aid" for="x_Aid" class="<?php echo $receipts_add->LeftColumnClass ?>"><?php echo $receipts_add->Aid->caption() ?><?php echo $receipts_add->Aid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_add->RightColumnClass ?>"><div <?php echo $receipts_add->Aid->cellAttributes() ?>>
<span id="el_receipts_Aid">
<input type="text" data-table="receipts" data-field="x_Aid" name="x_Aid" id="x_Aid" size="30" placeholder="<?php echo HtmlEncode($receipts_add->Aid->getPlaceHolder()) ?>" value="<?php echo $receipts_add->Aid->EditValue ?>"<?php echo $receipts_add->Aid->editAttributes() ?>>
</span>
<?php echo $receipts_add->Aid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts_add->Vid->Visible) { // Vid ?>
	<div id="r_Vid" class="form-group row">
		<label id="elh_receipts_Vid" for="x_Vid" class="<?php echo $receipts_add->LeftColumnClass ?>"><?php echo $receipts_add->Vid->caption() ?><?php echo $receipts_add->Vid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_add->RightColumnClass ?>"><div <?php echo $receipts_add->Vid->cellAttributes() ?>>
<span id="el_receipts_Vid">
<input type="text" data-table="receipts" data-field="x_Vid" name="x_Vid" id="x_Vid" size="30" placeholder="<?php echo HtmlEncode($receipts_add->Vid->getPlaceHolder()) ?>" value="<?php echo $receipts_add->Vid->EditValue ?>"<?php echo $receipts_add->Vid->editAttributes() ?>>
</span>
<?php echo $receipts_add->Vid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts_add->patient_id->Visible) { // patient_id ?>
	<div id="r_patient_id" class="form-group row">
		<label id="elh_receipts_patient_id" for="x_patient_id" class="<?php echo $receipts_add->LeftColumnClass ?>"><?php echo $receipts_add->patient_id->caption() ?><?php echo $receipts_add->patient_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_add->RightColumnClass ?>"><div <?php echo $receipts_add->patient_id->cellAttributes() ?>>
<span id="el_receipts_patient_id">
<input type="text" data-table="receipts" data-field="x_patient_id" name="x_patient_id" id="x_patient_id" size="30" placeholder="<?php echo HtmlEncode($receipts_add->patient_id->getPlaceHolder()) ?>" value="<?php echo $receipts_add->patient_id->EditValue ?>"<?php echo $receipts_add->patient_id->editAttributes() ?>>
</span>
<?php echo $receipts_add->patient_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts_add->mrnno->Visible) { // mrnno ?>
	<div id="r_mrnno" class="form-group row">
		<label id="elh_receipts_mrnno" for="x_mrnno" class="<?php echo $receipts_add->LeftColumnClass ?>"><?php echo $receipts_add->mrnno->caption() ?><?php echo $receipts_add->mrnno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_add->RightColumnClass ?>"><div <?php echo $receipts_add->mrnno->cellAttributes() ?>>
<span id="el_receipts_mrnno">
<input type="text" data-table="receipts" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($receipts_add->mrnno->getPlaceHolder()) ?>" value="<?php echo $receipts_add->mrnno->EditValue ?>"<?php echo $receipts_add->mrnno->editAttributes() ?>>
</span>
<?php echo $receipts_add->mrnno->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts_add->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label id="elh_receipts_PatientName" for="x_PatientName" class="<?php echo $receipts_add->LeftColumnClass ?>"><?php echo $receipts_add->PatientName->caption() ?><?php echo $receipts_add->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_add->RightColumnClass ?>"><div <?php echo $receipts_add->PatientName->cellAttributes() ?>>
<span id="el_receipts_PatientName">
<input type="text" data-table="receipts" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($receipts_add->PatientName->getPlaceHolder()) ?>" value="<?php echo $receipts_add->PatientName->EditValue ?>"<?php echo $receipts_add->PatientName->editAttributes() ?>>
</span>
<?php echo $receipts_add->PatientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts_add->amount->Visible) { // amount ?>
	<div id="r_amount" class="form-group row">
		<label id="elh_receipts_amount" for="x_amount" class="<?php echo $receipts_add->LeftColumnClass ?>"><?php echo $receipts_add->amount->caption() ?><?php echo $receipts_add->amount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_add->RightColumnClass ?>"><div <?php echo $receipts_add->amount->cellAttributes() ?>>
<span id="el_receipts_amount">
<input type="text" data-table="receipts" data-field="x_amount" name="x_amount" id="x_amount" size="30" placeholder="<?php echo HtmlEncode($receipts_add->amount->getPlaceHolder()) ?>" value="<?php echo $receipts_add->amount->EditValue ?>"<?php echo $receipts_add->amount->editAttributes() ?>>
</span>
<?php echo $receipts_add->amount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts_add->Discount->Visible) { // Discount ?>
	<div id="r_Discount" class="form-group row">
		<label id="elh_receipts_Discount" for="x_Discount" class="<?php echo $receipts_add->LeftColumnClass ?>"><?php echo $receipts_add->Discount->caption() ?><?php echo $receipts_add->Discount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_add->RightColumnClass ?>"><div <?php echo $receipts_add->Discount->cellAttributes() ?>>
<span id="el_receipts_Discount">
<input type="text" data-table="receipts" data-field="x_Discount" name="x_Discount" id="x_Discount" size="30" placeholder="<?php echo HtmlEncode($receipts_add->Discount->getPlaceHolder()) ?>" value="<?php echo $receipts_add->Discount->EditValue ?>"<?php echo $receipts_add->Discount->editAttributes() ?>>
</span>
<?php echo $receipts_add->Discount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts_add->SubTotal->Visible) { // SubTotal ?>
	<div id="r_SubTotal" class="form-group row">
		<label id="elh_receipts_SubTotal" for="x_SubTotal" class="<?php echo $receipts_add->LeftColumnClass ?>"><?php echo $receipts_add->SubTotal->caption() ?><?php echo $receipts_add->SubTotal->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_add->RightColumnClass ?>"><div <?php echo $receipts_add->SubTotal->cellAttributes() ?>>
<span id="el_receipts_SubTotal">
<input type="text" data-table="receipts" data-field="x_SubTotal" name="x_SubTotal" id="x_SubTotal" size="30" placeholder="<?php echo HtmlEncode($receipts_add->SubTotal->getPlaceHolder()) ?>" value="<?php echo $receipts_add->SubTotal->EditValue ?>"<?php echo $receipts_add->SubTotal->editAttributes() ?>>
</span>
<?php echo $receipts_add->SubTotal->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts_add->patient_type->Visible) { // patient_type ?>
	<div id="r_patient_type" class="form-group row">
		<label id="elh_receipts_patient_type" for="x_patient_type" class="<?php echo $receipts_add->LeftColumnClass ?>"><?php echo $receipts_add->patient_type->caption() ?><?php echo $receipts_add->patient_type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_add->RightColumnClass ?>"><div <?php echo $receipts_add->patient_type->cellAttributes() ?>>
<span id="el_receipts_patient_type">
<input type="text" data-table="receipts" data-field="x_patient_type" name="x_patient_type" id="x_patient_type" size="30" placeholder="<?php echo HtmlEncode($receipts_add->patient_type->getPlaceHolder()) ?>" value="<?php echo $receipts_add->patient_type->EditValue ?>"<?php echo $receipts_add->patient_type->editAttributes() ?>>
</span>
<?php echo $receipts_add->patient_type->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts_add->invoiceId->Visible) { // invoiceId ?>
	<div id="r_invoiceId" class="form-group row">
		<label id="elh_receipts_invoiceId" for="x_invoiceId" class="<?php echo $receipts_add->LeftColumnClass ?>"><?php echo $receipts_add->invoiceId->caption() ?><?php echo $receipts_add->invoiceId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_add->RightColumnClass ?>"><div <?php echo $receipts_add->invoiceId->cellAttributes() ?>>
<span id="el_receipts_invoiceId">
<input type="text" data-table="receipts" data-field="x_invoiceId" name="x_invoiceId" id="x_invoiceId" size="30" placeholder="<?php echo HtmlEncode($receipts_add->invoiceId->getPlaceHolder()) ?>" value="<?php echo $receipts_add->invoiceId->EditValue ?>"<?php echo $receipts_add->invoiceId->editAttributes() ?>>
</span>
<?php echo $receipts_add->invoiceId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts_add->invoiceAmount->Visible) { // invoiceAmount ?>
	<div id="r_invoiceAmount" class="form-group row">
		<label id="elh_receipts_invoiceAmount" for="x_invoiceAmount" class="<?php echo $receipts_add->LeftColumnClass ?>"><?php echo $receipts_add->invoiceAmount->caption() ?><?php echo $receipts_add->invoiceAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_add->RightColumnClass ?>"><div <?php echo $receipts_add->invoiceAmount->cellAttributes() ?>>
<span id="el_receipts_invoiceAmount">
<input type="text" data-table="receipts" data-field="x_invoiceAmount" name="x_invoiceAmount" id="x_invoiceAmount" size="30" placeholder="<?php echo HtmlEncode($receipts_add->invoiceAmount->getPlaceHolder()) ?>" value="<?php echo $receipts_add->invoiceAmount->EditValue ?>"<?php echo $receipts_add->invoiceAmount->editAttributes() ?>>
</span>
<?php echo $receipts_add->invoiceAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts_add->invoiceStatus->Visible) { // invoiceStatus ?>
	<div id="r_invoiceStatus" class="form-group row">
		<label id="elh_receipts_invoiceStatus" for="x_invoiceStatus" class="<?php echo $receipts_add->LeftColumnClass ?>"><?php echo $receipts_add->invoiceStatus->caption() ?><?php echo $receipts_add->invoiceStatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_add->RightColumnClass ?>"><div <?php echo $receipts_add->invoiceStatus->cellAttributes() ?>>
<span id="el_receipts_invoiceStatus">
<input type="text" data-table="receipts" data-field="x_invoiceStatus" name="x_invoiceStatus" id="x_invoiceStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($receipts_add->invoiceStatus->getPlaceHolder()) ?>" value="<?php echo $receipts_add->invoiceStatus->EditValue ?>"<?php echo $receipts_add->invoiceStatus->editAttributes() ?>>
</span>
<?php echo $receipts_add->invoiceStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts_add->modeOfPayment->Visible) { // modeOfPayment ?>
	<div id="r_modeOfPayment" class="form-group row">
		<label id="elh_receipts_modeOfPayment" for="x_modeOfPayment" class="<?php echo $receipts_add->LeftColumnClass ?>"><?php echo $receipts_add->modeOfPayment->caption() ?><?php echo $receipts_add->modeOfPayment->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_add->RightColumnClass ?>"><div <?php echo $receipts_add->modeOfPayment->cellAttributes() ?>>
<span id="el_receipts_modeOfPayment">
<input type="text" data-table="receipts" data-field="x_modeOfPayment" name="x_modeOfPayment" id="x_modeOfPayment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($receipts_add->modeOfPayment->getPlaceHolder()) ?>" value="<?php echo $receipts_add->modeOfPayment->EditValue ?>"<?php echo $receipts_add->modeOfPayment->editAttributes() ?>>
</span>
<?php echo $receipts_add->modeOfPayment->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts_add->charged_date->Visible) { // charged_date ?>
	<div id="r_charged_date" class="form-group row">
		<label id="elh_receipts_charged_date" for="x_charged_date" class="<?php echo $receipts_add->LeftColumnClass ?>"><?php echo $receipts_add->charged_date->caption() ?><?php echo $receipts_add->charged_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_add->RightColumnClass ?>"><div <?php echo $receipts_add->charged_date->cellAttributes() ?>>
<span id="el_receipts_charged_date">
<input type="text" data-table="receipts" data-field="x_charged_date" name="x_charged_date" id="x_charged_date" placeholder="<?php echo HtmlEncode($receipts_add->charged_date->getPlaceHolder()) ?>" value="<?php echo $receipts_add->charged_date->EditValue ?>"<?php echo $receipts_add->charged_date->editAttributes() ?>>
<?php if (!$receipts_add->charged_date->ReadOnly && !$receipts_add->charged_date->Disabled && !isset($receipts_add->charged_date->EditAttrs["readonly"]) && !isset($receipts_add->charged_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["freceiptsadd", "datetimepicker"], function() {
	ew.createDateTimePicker("freceiptsadd", "x_charged_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $receipts_add->charged_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts_add->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_receipts_status" for="x_status" class="<?php echo $receipts_add->LeftColumnClass ?>"><?php echo $receipts_add->status->caption() ?><?php echo $receipts_add->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_add->RightColumnClass ?>"><div <?php echo $receipts_add->status->cellAttributes() ?>>
<span id="el_receipts_status">
<input type="text" data-table="receipts" data-field="x_status" name="x_status" id="x_status" size="30" placeholder="<?php echo HtmlEncode($receipts_add->status->getPlaceHolder()) ?>" value="<?php echo $receipts_add->status->EditValue ?>"<?php echo $receipts_add->status->editAttributes() ?>>
</span>
<?php echo $receipts_add->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts_add->createdby->Visible) { // createdby ?>
	<div id="r_createdby" class="form-group row">
		<label id="elh_receipts_createdby" for="x_createdby" class="<?php echo $receipts_add->LeftColumnClass ?>"><?php echo $receipts_add->createdby->caption() ?><?php echo $receipts_add->createdby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_add->RightColumnClass ?>"><div <?php echo $receipts_add->createdby->cellAttributes() ?>>
<span id="el_receipts_createdby">
<input type="text" data-table="receipts" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" placeholder="<?php echo HtmlEncode($receipts_add->createdby->getPlaceHolder()) ?>" value="<?php echo $receipts_add->createdby->EditValue ?>"<?php echo $receipts_add->createdby->editAttributes() ?>>
</span>
<?php echo $receipts_add->createdby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts_add->createddatetime->Visible) { // createddatetime ?>
	<div id="r_createddatetime" class="form-group row">
		<label id="elh_receipts_createddatetime" for="x_createddatetime" class="<?php echo $receipts_add->LeftColumnClass ?>"><?php echo $receipts_add->createddatetime->caption() ?><?php echo $receipts_add->createddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_add->RightColumnClass ?>"><div <?php echo $receipts_add->createddatetime->cellAttributes() ?>>
<span id="el_receipts_createddatetime">
<input type="text" data-table="receipts" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?php echo HtmlEncode($receipts_add->createddatetime->getPlaceHolder()) ?>" value="<?php echo $receipts_add->createddatetime->EditValue ?>"<?php echo $receipts_add->createddatetime->editAttributes() ?>>
<?php if (!$receipts_add->createddatetime->ReadOnly && !$receipts_add->createddatetime->Disabled && !isset($receipts_add->createddatetime->EditAttrs["readonly"]) && !isset($receipts_add->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["freceiptsadd", "datetimepicker"], function() {
	ew.createDateTimePicker("freceiptsadd", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $receipts_add->createddatetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts_add->modifiedby->Visible) { // modifiedby ?>
	<div id="r_modifiedby" class="form-group row">
		<label id="elh_receipts_modifiedby" for="x_modifiedby" class="<?php echo $receipts_add->LeftColumnClass ?>"><?php echo $receipts_add->modifiedby->caption() ?><?php echo $receipts_add->modifiedby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_add->RightColumnClass ?>"><div <?php echo $receipts_add->modifiedby->cellAttributes() ?>>
<span id="el_receipts_modifiedby">
<input type="text" data-table="receipts" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" placeholder="<?php echo HtmlEncode($receipts_add->modifiedby->getPlaceHolder()) ?>" value="<?php echo $receipts_add->modifiedby->EditValue ?>"<?php echo $receipts_add->modifiedby->editAttributes() ?>>
</span>
<?php echo $receipts_add->modifiedby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts_add->modifieddatetime->Visible) { // modifieddatetime ?>
	<div id="r_modifieddatetime" class="form-group row">
		<label id="elh_receipts_modifieddatetime" for="x_modifieddatetime" class="<?php echo $receipts_add->LeftColumnClass ?>"><?php echo $receipts_add->modifieddatetime->caption() ?><?php echo $receipts_add->modifieddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_add->RightColumnClass ?>"><div <?php echo $receipts_add->modifieddatetime->cellAttributes() ?>>
<span id="el_receipts_modifieddatetime">
<input type="text" data-table="receipts" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?php echo HtmlEncode($receipts_add->modifieddatetime->getPlaceHolder()) ?>" value="<?php echo $receipts_add->modifieddatetime->EditValue ?>"<?php echo $receipts_add->modifieddatetime->editAttributes() ?>>
<?php if (!$receipts_add->modifieddatetime->ReadOnly && !$receipts_add->modifieddatetime->Disabled && !isset($receipts_add->modifieddatetime->EditAttrs["readonly"]) && !isset($receipts_add->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["freceiptsadd", "datetimepicker"], function() {
	ew.createDateTimePicker("freceiptsadd", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $receipts_add->modifieddatetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts_add->ChequeCardNo->Visible) { // ChequeCardNo ?>
	<div id="r_ChequeCardNo" class="form-group row">
		<label id="elh_receipts_ChequeCardNo" for="x_ChequeCardNo" class="<?php echo $receipts_add->LeftColumnClass ?>"><?php echo $receipts_add->ChequeCardNo->caption() ?><?php echo $receipts_add->ChequeCardNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_add->RightColumnClass ?>"><div <?php echo $receipts_add->ChequeCardNo->cellAttributes() ?>>
<span id="el_receipts_ChequeCardNo">
<input type="text" data-table="receipts" data-field="x_ChequeCardNo" name="x_ChequeCardNo" id="x_ChequeCardNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($receipts_add->ChequeCardNo->getPlaceHolder()) ?>" value="<?php echo $receipts_add->ChequeCardNo->EditValue ?>"<?php echo $receipts_add->ChequeCardNo->editAttributes() ?>>
</span>
<?php echo $receipts_add->ChequeCardNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts_add->CreditBankName->Visible) { // CreditBankName ?>
	<div id="r_CreditBankName" class="form-group row">
		<label id="elh_receipts_CreditBankName" for="x_CreditBankName" class="<?php echo $receipts_add->LeftColumnClass ?>"><?php echo $receipts_add->CreditBankName->caption() ?><?php echo $receipts_add->CreditBankName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_add->RightColumnClass ?>"><div <?php echo $receipts_add->CreditBankName->cellAttributes() ?>>
<span id="el_receipts_CreditBankName">
<input type="text" data-table="receipts" data-field="x_CreditBankName" name="x_CreditBankName" id="x_CreditBankName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($receipts_add->CreditBankName->getPlaceHolder()) ?>" value="<?php echo $receipts_add->CreditBankName->EditValue ?>"<?php echo $receipts_add->CreditBankName->editAttributes() ?>>
</span>
<?php echo $receipts_add->CreditBankName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts_add->CreditCardHolder->Visible) { // CreditCardHolder ?>
	<div id="r_CreditCardHolder" class="form-group row">
		<label id="elh_receipts_CreditCardHolder" for="x_CreditCardHolder" class="<?php echo $receipts_add->LeftColumnClass ?>"><?php echo $receipts_add->CreditCardHolder->caption() ?><?php echo $receipts_add->CreditCardHolder->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_add->RightColumnClass ?>"><div <?php echo $receipts_add->CreditCardHolder->cellAttributes() ?>>
<span id="el_receipts_CreditCardHolder">
<input type="text" data-table="receipts" data-field="x_CreditCardHolder" name="x_CreditCardHolder" id="x_CreditCardHolder" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($receipts_add->CreditCardHolder->getPlaceHolder()) ?>" value="<?php echo $receipts_add->CreditCardHolder->EditValue ?>"<?php echo $receipts_add->CreditCardHolder->editAttributes() ?>>
</span>
<?php echo $receipts_add->CreditCardHolder->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts_add->CreditCardType->Visible) { // CreditCardType ?>
	<div id="r_CreditCardType" class="form-group row">
		<label id="elh_receipts_CreditCardType" for="x_CreditCardType" class="<?php echo $receipts_add->LeftColumnClass ?>"><?php echo $receipts_add->CreditCardType->caption() ?><?php echo $receipts_add->CreditCardType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_add->RightColumnClass ?>"><div <?php echo $receipts_add->CreditCardType->cellAttributes() ?>>
<span id="el_receipts_CreditCardType">
<input type="text" data-table="receipts" data-field="x_CreditCardType" name="x_CreditCardType" id="x_CreditCardType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($receipts_add->CreditCardType->getPlaceHolder()) ?>" value="<?php echo $receipts_add->CreditCardType->EditValue ?>"<?php echo $receipts_add->CreditCardType->editAttributes() ?>>
</span>
<?php echo $receipts_add->CreditCardType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts_add->CreditCardMachine->Visible) { // CreditCardMachine ?>
	<div id="r_CreditCardMachine" class="form-group row">
		<label id="elh_receipts_CreditCardMachine" for="x_CreditCardMachine" class="<?php echo $receipts_add->LeftColumnClass ?>"><?php echo $receipts_add->CreditCardMachine->caption() ?><?php echo $receipts_add->CreditCardMachine->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_add->RightColumnClass ?>"><div <?php echo $receipts_add->CreditCardMachine->cellAttributes() ?>>
<span id="el_receipts_CreditCardMachine">
<input type="text" data-table="receipts" data-field="x_CreditCardMachine" name="x_CreditCardMachine" id="x_CreditCardMachine" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($receipts_add->CreditCardMachine->getPlaceHolder()) ?>" value="<?php echo $receipts_add->CreditCardMachine->EditValue ?>"<?php echo $receipts_add->CreditCardMachine->editAttributes() ?>>
</span>
<?php echo $receipts_add->CreditCardMachine->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts_add->CreditCardBatchNo->Visible) { // CreditCardBatchNo ?>
	<div id="r_CreditCardBatchNo" class="form-group row">
		<label id="elh_receipts_CreditCardBatchNo" for="x_CreditCardBatchNo" class="<?php echo $receipts_add->LeftColumnClass ?>"><?php echo $receipts_add->CreditCardBatchNo->caption() ?><?php echo $receipts_add->CreditCardBatchNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_add->RightColumnClass ?>"><div <?php echo $receipts_add->CreditCardBatchNo->cellAttributes() ?>>
<span id="el_receipts_CreditCardBatchNo">
<input type="text" data-table="receipts" data-field="x_CreditCardBatchNo" name="x_CreditCardBatchNo" id="x_CreditCardBatchNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($receipts_add->CreditCardBatchNo->getPlaceHolder()) ?>" value="<?php echo $receipts_add->CreditCardBatchNo->EditValue ?>"<?php echo $receipts_add->CreditCardBatchNo->editAttributes() ?>>
</span>
<?php echo $receipts_add->CreditCardBatchNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts_add->CreditCardTax->Visible) { // CreditCardTax ?>
	<div id="r_CreditCardTax" class="form-group row">
		<label id="elh_receipts_CreditCardTax" for="x_CreditCardTax" class="<?php echo $receipts_add->LeftColumnClass ?>"><?php echo $receipts_add->CreditCardTax->caption() ?><?php echo $receipts_add->CreditCardTax->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_add->RightColumnClass ?>"><div <?php echo $receipts_add->CreditCardTax->cellAttributes() ?>>
<span id="el_receipts_CreditCardTax">
<input type="text" data-table="receipts" data-field="x_CreditCardTax" name="x_CreditCardTax" id="x_CreditCardTax" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($receipts_add->CreditCardTax->getPlaceHolder()) ?>" value="<?php echo $receipts_add->CreditCardTax->EditValue ?>"<?php echo $receipts_add->CreditCardTax->editAttributes() ?>>
</span>
<?php echo $receipts_add->CreditCardTax->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts_add->CreditDeductionAmount->Visible) { // CreditDeductionAmount ?>
	<div id="r_CreditDeductionAmount" class="form-group row">
		<label id="elh_receipts_CreditDeductionAmount" for="x_CreditDeductionAmount" class="<?php echo $receipts_add->LeftColumnClass ?>"><?php echo $receipts_add->CreditDeductionAmount->caption() ?><?php echo $receipts_add->CreditDeductionAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_add->RightColumnClass ?>"><div <?php echo $receipts_add->CreditDeductionAmount->cellAttributes() ?>>
<span id="el_receipts_CreditDeductionAmount">
<input type="text" data-table="receipts" data-field="x_CreditDeductionAmount" name="x_CreditDeductionAmount" id="x_CreditDeductionAmount" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($receipts_add->CreditDeductionAmount->getPlaceHolder()) ?>" value="<?php echo $receipts_add->CreditDeductionAmount->EditValue ?>"<?php echo $receipts_add->CreditDeductionAmount->editAttributes() ?>>
</span>
<?php echo $receipts_add->CreditDeductionAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts_add->RealizationAmount->Visible) { // RealizationAmount ?>
	<div id="r_RealizationAmount" class="form-group row">
		<label id="elh_receipts_RealizationAmount" for="x_RealizationAmount" class="<?php echo $receipts_add->LeftColumnClass ?>"><?php echo $receipts_add->RealizationAmount->caption() ?><?php echo $receipts_add->RealizationAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_add->RightColumnClass ?>"><div <?php echo $receipts_add->RealizationAmount->cellAttributes() ?>>
<span id="el_receipts_RealizationAmount">
<input type="text" data-table="receipts" data-field="x_RealizationAmount" name="x_RealizationAmount" id="x_RealizationAmount" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($receipts_add->RealizationAmount->getPlaceHolder()) ?>" value="<?php echo $receipts_add->RealizationAmount->EditValue ?>"<?php echo $receipts_add->RealizationAmount->editAttributes() ?>>
</span>
<?php echo $receipts_add->RealizationAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts_add->RealizationStatus->Visible) { // RealizationStatus ?>
	<div id="r_RealizationStatus" class="form-group row">
		<label id="elh_receipts_RealizationStatus" for="x_RealizationStatus" class="<?php echo $receipts_add->LeftColumnClass ?>"><?php echo $receipts_add->RealizationStatus->caption() ?><?php echo $receipts_add->RealizationStatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_add->RightColumnClass ?>"><div <?php echo $receipts_add->RealizationStatus->cellAttributes() ?>>
<span id="el_receipts_RealizationStatus">
<input type="text" data-table="receipts" data-field="x_RealizationStatus" name="x_RealizationStatus" id="x_RealizationStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($receipts_add->RealizationStatus->getPlaceHolder()) ?>" value="<?php echo $receipts_add->RealizationStatus->EditValue ?>"<?php echo $receipts_add->RealizationStatus->editAttributes() ?>>
</span>
<?php echo $receipts_add->RealizationStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts_add->RealizationRemarks->Visible) { // RealizationRemarks ?>
	<div id="r_RealizationRemarks" class="form-group row">
		<label id="elh_receipts_RealizationRemarks" for="x_RealizationRemarks" class="<?php echo $receipts_add->LeftColumnClass ?>"><?php echo $receipts_add->RealizationRemarks->caption() ?><?php echo $receipts_add->RealizationRemarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_add->RightColumnClass ?>"><div <?php echo $receipts_add->RealizationRemarks->cellAttributes() ?>>
<span id="el_receipts_RealizationRemarks">
<input type="text" data-table="receipts" data-field="x_RealizationRemarks" name="x_RealizationRemarks" id="x_RealizationRemarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($receipts_add->RealizationRemarks->getPlaceHolder()) ?>" value="<?php echo $receipts_add->RealizationRemarks->EditValue ?>"<?php echo $receipts_add->RealizationRemarks->editAttributes() ?>>
</span>
<?php echo $receipts_add->RealizationRemarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts_add->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
	<div id="r_RealizationBatchNo" class="form-group row">
		<label id="elh_receipts_RealizationBatchNo" for="x_RealizationBatchNo" class="<?php echo $receipts_add->LeftColumnClass ?>"><?php echo $receipts_add->RealizationBatchNo->caption() ?><?php echo $receipts_add->RealizationBatchNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_add->RightColumnClass ?>"><div <?php echo $receipts_add->RealizationBatchNo->cellAttributes() ?>>
<span id="el_receipts_RealizationBatchNo">
<input type="text" data-table="receipts" data-field="x_RealizationBatchNo" name="x_RealizationBatchNo" id="x_RealizationBatchNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($receipts_add->RealizationBatchNo->getPlaceHolder()) ?>" value="<?php echo $receipts_add->RealizationBatchNo->EditValue ?>"<?php echo $receipts_add->RealizationBatchNo->editAttributes() ?>>
</span>
<?php echo $receipts_add->RealizationBatchNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts_add->RealizationDate->Visible) { // RealizationDate ?>
	<div id="r_RealizationDate" class="form-group row">
		<label id="elh_receipts_RealizationDate" for="x_RealizationDate" class="<?php echo $receipts_add->LeftColumnClass ?>"><?php echo $receipts_add->RealizationDate->caption() ?><?php echo $receipts_add->RealizationDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_add->RightColumnClass ?>"><div <?php echo $receipts_add->RealizationDate->cellAttributes() ?>>
<span id="el_receipts_RealizationDate">
<input type="text" data-table="receipts" data-field="x_RealizationDate" name="x_RealizationDate" id="x_RealizationDate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($receipts_add->RealizationDate->getPlaceHolder()) ?>" value="<?php echo $receipts_add->RealizationDate->EditValue ?>"<?php echo $receipts_add->RealizationDate->editAttributes() ?>>
</span>
<?php echo $receipts_add->RealizationDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts_add->BankAccHolderMobileNumber->Visible) { // BankAccHolderMobileNumber ?>
	<div id="r_BankAccHolderMobileNumber" class="form-group row">
		<label id="elh_receipts_BankAccHolderMobileNumber" for="x_BankAccHolderMobileNumber" class="<?php echo $receipts_add->LeftColumnClass ?>"><?php echo $receipts_add->BankAccHolderMobileNumber->caption() ?><?php echo $receipts_add->BankAccHolderMobileNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_add->RightColumnClass ?>"><div <?php echo $receipts_add->BankAccHolderMobileNumber->cellAttributes() ?>>
<span id="el_receipts_BankAccHolderMobileNumber">
<input type="text" data-table="receipts" data-field="x_BankAccHolderMobileNumber" name="x_BankAccHolderMobileNumber" id="x_BankAccHolderMobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($receipts_add->BankAccHolderMobileNumber->getPlaceHolder()) ?>" value="<?php echo $receipts_add->BankAccHolderMobileNumber->EditValue ?>"<?php echo $receipts_add->BankAccHolderMobileNumber->editAttributes() ?>>
</span>
<?php echo $receipts_add->BankAccHolderMobileNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$receipts_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $receipts_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $receipts_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$receipts_add->showPageFooter();
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
$receipts_add->terminate();
?>