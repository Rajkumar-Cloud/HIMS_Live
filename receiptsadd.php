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
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var freceiptsadd = currentForm = new ew.Form("freceiptsadd", "add");

// Validate form
freceiptsadd.validate = function() {
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
		<?php if ($receipts_add->Reception->Required) { ?>
			elm = this.getElements("x" + infix + "_Reception");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts->Reception->caption(), $receipts->Reception->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Reception");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($receipts->Reception->errorMessage()) ?>");
		<?php if ($receipts_add->Aid->Required) { ?>
			elm = this.getElements("x" + infix + "_Aid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts->Aid->caption(), $receipts->Aid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Aid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($receipts->Aid->errorMessage()) ?>");
		<?php if ($receipts_add->Vid->Required) { ?>
			elm = this.getElements("x" + infix + "_Vid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts->Vid->caption(), $receipts->Vid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Vid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($receipts->Vid->errorMessage()) ?>");
		<?php if ($receipts_add->patient_id->Required) { ?>
			elm = this.getElements("x" + infix + "_patient_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts->patient_id->caption(), $receipts->patient_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_patient_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($receipts->patient_id->errorMessage()) ?>");
		<?php if ($receipts_add->mrnno->Required) { ?>
			elm = this.getElements("x" + infix + "_mrnno");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts->mrnno->caption(), $receipts->mrnno->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($receipts_add->PatientName->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts->PatientName->caption(), $receipts->PatientName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($receipts_add->amount->Required) { ?>
			elm = this.getElements("x" + infix + "_amount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts->amount->caption(), $receipts->amount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_amount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($receipts->amount->errorMessage()) ?>");
		<?php if ($receipts_add->Discount->Required) { ?>
			elm = this.getElements("x" + infix + "_Discount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts->Discount->caption(), $receipts->Discount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Discount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($receipts->Discount->errorMessage()) ?>");
		<?php if ($receipts_add->SubTotal->Required) { ?>
			elm = this.getElements("x" + infix + "_SubTotal");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts->SubTotal->caption(), $receipts->SubTotal->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SubTotal");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($receipts->SubTotal->errorMessage()) ?>");
		<?php if ($receipts_add->patient_type->Required) { ?>
			elm = this.getElements("x" + infix + "_patient_type");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts->patient_type->caption(), $receipts->patient_type->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_patient_type");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($receipts->patient_type->errorMessage()) ?>");
		<?php if ($receipts_add->invoiceId->Required) { ?>
			elm = this.getElements("x" + infix + "_invoiceId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts->invoiceId->caption(), $receipts->invoiceId->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_invoiceId");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($receipts->invoiceId->errorMessage()) ?>");
		<?php if ($receipts_add->invoiceAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_invoiceAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts->invoiceAmount->caption(), $receipts->invoiceAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_invoiceAmount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($receipts->invoiceAmount->errorMessage()) ?>");
		<?php if ($receipts_add->invoiceStatus->Required) { ?>
			elm = this.getElements("x" + infix + "_invoiceStatus");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts->invoiceStatus->caption(), $receipts->invoiceStatus->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($receipts_add->modeOfPayment->Required) { ?>
			elm = this.getElements("x" + infix + "_modeOfPayment");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts->modeOfPayment->caption(), $receipts->modeOfPayment->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($receipts_add->charged_date->Required) { ?>
			elm = this.getElements("x" + infix + "_charged_date");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts->charged_date->caption(), $receipts->charged_date->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_charged_date");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($receipts->charged_date->errorMessage()) ?>");
		<?php if ($receipts_add->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts->status->caption(), $receipts->status->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($receipts->status->errorMessage()) ?>");
		<?php if ($receipts_add->createdby->Required) { ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts->createdby->caption(), $receipts->createdby->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($receipts->createdby->errorMessage()) ?>");
		<?php if ($receipts_add->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts->createddatetime->caption(), $receipts->createddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($receipts->createddatetime->errorMessage()) ?>");
		<?php if ($receipts_add->modifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts->modifiedby->caption(), $receipts->modifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($receipts->modifiedby->errorMessage()) ?>");
		<?php if ($receipts_add->modifieddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts->modifieddatetime->caption(), $receipts->modifieddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($receipts->modifieddatetime->errorMessage()) ?>");
		<?php if ($receipts_add->ChequeCardNo->Required) { ?>
			elm = this.getElements("x" + infix + "_ChequeCardNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts->ChequeCardNo->caption(), $receipts->ChequeCardNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($receipts_add->CreditBankName->Required) { ?>
			elm = this.getElements("x" + infix + "_CreditBankName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts->CreditBankName->caption(), $receipts->CreditBankName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($receipts_add->CreditCardHolder->Required) { ?>
			elm = this.getElements("x" + infix + "_CreditCardHolder");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts->CreditCardHolder->caption(), $receipts->CreditCardHolder->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($receipts_add->CreditCardType->Required) { ?>
			elm = this.getElements("x" + infix + "_CreditCardType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts->CreditCardType->caption(), $receipts->CreditCardType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($receipts_add->CreditCardMachine->Required) { ?>
			elm = this.getElements("x" + infix + "_CreditCardMachine");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts->CreditCardMachine->caption(), $receipts->CreditCardMachine->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($receipts_add->CreditCardBatchNo->Required) { ?>
			elm = this.getElements("x" + infix + "_CreditCardBatchNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts->CreditCardBatchNo->caption(), $receipts->CreditCardBatchNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($receipts_add->CreditCardTax->Required) { ?>
			elm = this.getElements("x" + infix + "_CreditCardTax");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts->CreditCardTax->caption(), $receipts->CreditCardTax->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($receipts_add->CreditDeductionAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_CreditDeductionAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts->CreditDeductionAmount->caption(), $receipts->CreditDeductionAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($receipts_add->RealizationAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_RealizationAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts->RealizationAmount->caption(), $receipts->RealizationAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($receipts_add->RealizationStatus->Required) { ?>
			elm = this.getElements("x" + infix + "_RealizationStatus");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts->RealizationStatus->caption(), $receipts->RealizationStatus->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($receipts_add->RealizationRemarks->Required) { ?>
			elm = this.getElements("x" + infix + "_RealizationRemarks");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts->RealizationRemarks->caption(), $receipts->RealizationRemarks->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($receipts_add->RealizationBatchNo->Required) { ?>
			elm = this.getElements("x" + infix + "_RealizationBatchNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts->RealizationBatchNo->caption(), $receipts->RealizationBatchNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($receipts_add->RealizationDate->Required) { ?>
			elm = this.getElements("x" + infix + "_RealizationDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts->RealizationDate->caption(), $receipts->RealizationDate->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($receipts_add->BankAccHolderMobileNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_BankAccHolderMobileNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $receipts->BankAccHolderMobileNumber->caption(), $receipts->BankAccHolderMobileNumber->RequiredErrorMessage)) ?>");
		<?php } ?>

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
freceiptsadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
freceiptsadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $receipts_add->showPageHeader(); ?>
<?php
$receipts_add->showMessage();
?>
<form name="freceiptsadd" id="freceiptsadd" class="<?php echo $receipts_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($receipts_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $receipts_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="receipts">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$receipts_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($receipts->Reception->Visible) { // Reception ?>
	<div id="r_Reception" class="form-group row">
		<label id="elh_receipts_Reception" for="x_Reception" class="<?php echo $receipts_add->LeftColumnClass ?>"><?php echo $receipts->Reception->caption() ?><?php echo ($receipts->Reception->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_add->RightColumnClass ?>"><div<?php echo $receipts->Reception->cellAttributes() ?>>
<span id="el_receipts_Reception">
<input type="text" data-table="receipts" data-field="x_Reception" name="x_Reception" id="x_Reception" size="30" placeholder="<?php echo HtmlEncode($receipts->Reception->getPlaceHolder()) ?>" value="<?php echo $receipts->Reception->EditValue ?>"<?php echo $receipts->Reception->editAttributes() ?>>
</span>
<?php echo $receipts->Reception->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts->Aid->Visible) { // Aid ?>
	<div id="r_Aid" class="form-group row">
		<label id="elh_receipts_Aid" for="x_Aid" class="<?php echo $receipts_add->LeftColumnClass ?>"><?php echo $receipts->Aid->caption() ?><?php echo ($receipts->Aid->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_add->RightColumnClass ?>"><div<?php echo $receipts->Aid->cellAttributes() ?>>
<span id="el_receipts_Aid">
<input type="text" data-table="receipts" data-field="x_Aid" name="x_Aid" id="x_Aid" size="30" placeholder="<?php echo HtmlEncode($receipts->Aid->getPlaceHolder()) ?>" value="<?php echo $receipts->Aid->EditValue ?>"<?php echo $receipts->Aid->editAttributes() ?>>
</span>
<?php echo $receipts->Aid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts->Vid->Visible) { // Vid ?>
	<div id="r_Vid" class="form-group row">
		<label id="elh_receipts_Vid" for="x_Vid" class="<?php echo $receipts_add->LeftColumnClass ?>"><?php echo $receipts->Vid->caption() ?><?php echo ($receipts->Vid->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_add->RightColumnClass ?>"><div<?php echo $receipts->Vid->cellAttributes() ?>>
<span id="el_receipts_Vid">
<input type="text" data-table="receipts" data-field="x_Vid" name="x_Vid" id="x_Vid" size="30" placeholder="<?php echo HtmlEncode($receipts->Vid->getPlaceHolder()) ?>" value="<?php echo $receipts->Vid->EditValue ?>"<?php echo $receipts->Vid->editAttributes() ?>>
</span>
<?php echo $receipts->Vid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts->patient_id->Visible) { // patient_id ?>
	<div id="r_patient_id" class="form-group row">
		<label id="elh_receipts_patient_id" for="x_patient_id" class="<?php echo $receipts_add->LeftColumnClass ?>"><?php echo $receipts->patient_id->caption() ?><?php echo ($receipts->patient_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_add->RightColumnClass ?>"><div<?php echo $receipts->patient_id->cellAttributes() ?>>
<span id="el_receipts_patient_id">
<input type="text" data-table="receipts" data-field="x_patient_id" name="x_patient_id" id="x_patient_id" size="30" placeholder="<?php echo HtmlEncode($receipts->patient_id->getPlaceHolder()) ?>" value="<?php echo $receipts->patient_id->EditValue ?>"<?php echo $receipts->patient_id->editAttributes() ?>>
</span>
<?php echo $receipts->patient_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts->mrnno->Visible) { // mrnno ?>
	<div id="r_mrnno" class="form-group row">
		<label id="elh_receipts_mrnno" for="x_mrnno" class="<?php echo $receipts_add->LeftColumnClass ?>"><?php echo $receipts->mrnno->caption() ?><?php echo ($receipts->mrnno->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_add->RightColumnClass ?>"><div<?php echo $receipts->mrnno->cellAttributes() ?>>
<span id="el_receipts_mrnno">
<input type="text" data-table="receipts" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($receipts->mrnno->getPlaceHolder()) ?>" value="<?php echo $receipts->mrnno->EditValue ?>"<?php echo $receipts->mrnno->editAttributes() ?>>
</span>
<?php echo $receipts->mrnno->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label id="elh_receipts_PatientName" for="x_PatientName" class="<?php echo $receipts_add->LeftColumnClass ?>"><?php echo $receipts->PatientName->caption() ?><?php echo ($receipts->PatientName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_add->RightColumnClass ?>"><div<?php echo $receipts->PatientName->cellAttributes() ?>>
<span id="el_receipts_PatientName">
<input type="text" data-table="receipts" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($receipts->PatientName->getPlaceHolder()) ?>" value="<?php echo $receipts->PatientName->EditValue ?>"<?php echo $receipts->PatientName->editAttributes() ?>>
</span>
<?php echo $receipts->PatientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts->amount->Visible) { // amount ?>
	<div id="r_amount" class="form-group row">
		<label id="elh_receipts_amount" for="x_amount" class="<?php echo $receipts_add->LeftColumnClass ?>"><?php echo $receipts->amount->caption() ?><?php echo ($receipts->amount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_add->RightColumnClass ?>"><div<?php echo $receipts->amount->cellAttributes() ?>>
<span id="el_receipts_amount">
<input type="text" data-table="receipts" data-field="x_amount" name="x_amount" id="x_amount" size="30" placeholder="<?php echo HtmlEncode($receipts->amount->getPlaceHolder()) ?>" value="<?php echo $receipts->amount->EditValue ?>"<?php echo $receipts->amount->editAttributes() ?>>
</span>
<?php echo $receipts->amount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts->Discount->Visible) { // Discount ?>
	<div id="r_Discount" class="form-group row">
		<label id="elh_receipts_Discount" for="x_Discount" class="<?php echo $receipts_add->LeftColumnClass ?>"><?php echo $receipts->Discount->caption() ?><?php echo ($receipts->Discount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_add->RightColumnClass ?>"><div<?php echo $receipts->Discount->cellAttributes() ?>>
<span id="el_receipts_Discount">
<input type="text" data-table="receipts" data-field="x_Discount" name="x_Discount" id="x_Discount" size="30" placeholder="<?php echo HtmlEncode($receipts->Discount->getPlaceHolder()) ?>" value="<?php echo $receipts->Discount->EditValue ?>"<?php echo $receipts->Discount->editAttributes() ?>>
</span>
<?php echo $receipts->Discount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts->SubTotal->Visible) { // SubTotal ?>
	<div id="r_SubTotal" class="form-group row">
		<label id="elh_receipts_SubTotal" for="x_SubTotal" class="<?php echo $receipts_add->LeftColumnClass ?>"><?php echo $receipts->SubTotal->caption() ?><?php echo ($receipts->SubTotal->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_add->RightColumnClass ?>"><div<?php echo $receipts->SubTotal->cellAttributes() ?>>
<span id="el_receipts_SubTotal">
<input type="text" data-table="receipts" data-field="x_SubTotal" name="x_SubTotal" id="x_SubTotal" size="30" placeholder="<?php echo HtmlEncode($receipts->SubTotal->getPlaceHolder()) ?>" value="<?php echo $receipts->SubTotal->EditValue ?>"<?php echo $receipts->SubTotal->editAttributes() ?>>
</span>
<?php echo $receipts->SubTotal->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts->patient_type->Visible) { // patient_type ?>
	<div id="r_patient_type" class="form-group row">
		<label id="elh_receipts_patient_type" for="x_patient_type" class="<?php echo $receipts_add->LeftColumnClass ?>"><?php echo $receipts->patient_type->caption() ?><?php echo ($receipts->patient_type->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_add->RightColumnClass ?>"><div<?php echo $receipts->patient_type->cellAttributes() ?>>
<span id="el_receipts_patient_type">
<input type="text" data-table="receipts" data-field="x_patient_type" name="x_patient_type" id="x_patient_type" size="30" placeholder="<?php echo HtmlEncode($receipts->patient_type->getPlaceHolder()) ?>" value="<?php echo $receipts->patient_type->EditValue ?>"<?php echo $receipts->patient_type->editAttributes() ?>>
</span>
<?php echo $receipts->patient_type->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts->invoiceId->Visible) { // invoiceId ?>
	<div id="r_invoiceId" class="form-group row">
		<label id="elh_receipts_invoiceId" for="x_invoiceId" class="<?php echo $receipts_add->LeftColumnClass ?>"><?php echo $receipts->invoiceId->caption() ?><?php echo ($receipts->invoiceId->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_add->RightColumnClass ?>"><div<?php echo $receipts->invoiceId->cellAttributes() ?>>
<span id="el_receipts_invoiceId">
<input type="text" data-table="receipts" data-field="x_invoiceId" name="x_invoiceId" id="x_invoiceId" size="30" placeholder="<?php echo HtmlEncode($receipts->invoiceId->getPlaceHolder()) ?>" value="<?php echo $receipts->invoiceId->EditValue ?>"<?php echo $receipts->invoiceId->editAttributes() ?>>
</span>
<?php echo $receipts->invoiceId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts->invoiceAmount->Visible) { // invoiceAmount ?>
	<div id="r_invoiceAmount" class="form-group row">
		<label id="elh_receipts_invoiceAmount" for="x_invoiceAmount" class="<?php echo $receipts_add->LeftColumnClass ?>"><?php echo $receipts->invoiceAmount->caption() ?><?php echo ($receipts->invoiceAmount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_add->RightColumnClass ?>"><div<?php echo $receipts->invoiceAmount->cellAttributes() ?>>
<span id="el_receipts_invoiceAmount">
<input type="text" data-table="receipts" data-field="x_invoiceAmount" name="x_invoiceAmount" id="x_invoiceAmount" size="30" placeholder="<?php echo HtmlEncode($receipts->invoiceAmount->getPlaceHolder()) ?>" value="<?php echo $receipts->invoiceAmount->EditValue ?>"<?php echo $receipts->invoiceAmount->editAttributes() ?>>
</span>
<?php echo $receipts->invoiceAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts->invoiceStatus->Visible) { // invoiceStatus ?>
	<div id="r_invoiceStatus" class="form-group row">
		<label id="elh_receipts_invoiceStatus" for="x_invoiceStatus" class="<?php echo $receipts_add->LeftColumnClass ?>"><?php echo $receipts->invoiceStatus->caption() ?><?php echo ($receipts->invoiceStatus->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_add->RightColumnClass ?>"><div<?php echo $receipts->invoiceStatus->cellAttributes() ?>>
<span id="el_receipts_invoiceStatus">
<input type="text" data-table="receipts" data-field="x_invoiceStatus" name="x_invoiceStatus" id="x_invoiceStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($receipts->invoiceStatus->getPlaceHolder()) ?>" value="<?php echo $receipts->invoiceStatus->EditValue ?>"<?php echo $receipts->invoiceStatus->editAttributes() ?>>
</span>
<?php echo $receipts->invoiceStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts->modeOfPayment->Visible) { // modeOfPayment ?>
	<div id="r_modeOfPayment" class="form-group row">
		<label id="elh_receipts_modeOfPayment" for="x_modeOfPayment" class="<?php echo $receipts_add->LeftColumnClass ?>"><?php echo $receipts->modeOfPayment->caption() ?><?php echo ($receipts->modeOfPayment->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_add->RightColumnClass ?>"><div<?php echo $receipts->modeOfPayment->cellAttributes() ?>>
<span id="el_receipts_modeOfPayment">
<input type="text" data-table="receipts" data-field="x_modeOfPayment" name="x_modeOfPayment" id="x_modeOfPayment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($receipts->modeOfPayment->getPlaceHolder()) ?>" value="<?php echo $receipts->modeOfPayment->EditValue ?>"<?php echo $receipts->modeOfPayment->editAttributes() ?>>
</span>
<?php echo $receipts->modeOfPayment->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts->charged_date->Visible) { // charged_date ?>
	<div id="r_charged_date" class="form-group row">
		<label id="elh_receipts_charged_date" for="x_charged_date" class="<?php echo $receipts_add->LeftColumnClass ?>"><?php echo $receipts->charged_date->caption() ?><?php echo ($receipts->charged_date->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_add->RightColumnClass ?>"><div<?php echo $receipts->charged_date->cellAttributes() ?>>
<span id="el_receipts_charged_date">
<input type="text" data-table="receipts" data-field="x_charged_date" name="x_charged_date" id="x_charged_date" placeholder="<?php echo HtmlEncode($receipts->charged_date->getPlaceHolder()) ?>" value="<?php echo $receipts->charged_date->EditValue ?>"<?php echo $receipts->charged_date->editAttributes() ?>>
<?php if (!$receipts->charged_date->ReadOnly && !$receipts->charged_date->Disabled && !isset($receipts->charged_date->EditAttrs["readonly"]) && !isset($receipts->charged_date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("freceiptsadd", "x_charged_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $receipts->charged_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_receipts_status" for="x_status" class="<?php echo $receipts_add->LeftColumnClass ?>"><?php echo $receipts->status->caption() ?><?php echo ($receipts->status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_add->RightColumnClass ?>"><div<?php echo $receipts->status->cellAttributes() ?>>
<span id="el_receipts_status">
<input type="text" data-table="receipts" data-field="x_status" name="x_status" id="x_status" size="30" placeholder="<?php echo HtmlEncode($receipts->status->getPlaceHolder()) ?>" value="<?php echo $receipts->status->EditValue ?>"<?php echo $receipts->status->editAttributes() ?>>
</span>
<?php echo $receipts->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts->createdby->Visible) { // createdby ?>
	<div id="r_createdby" class="form-group row">
		<label id="elh_receipts_createdby" for="x_createdby" class="<?php echo $receipts_add->LeftColumnClass ?>"><?php echo $receipts->createdby->caption() ?><?php echo ($receipts->createdby->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_add->RightColumnClass ?>"><div<?php echo $receipts->createdby->cellAttributes() ?>>
<span id="el_receipts_createdby">
<input type="text" data-table="receipts" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" placeholder="<?php echo HtmlEncode($receipts->createdby->getPlaceHolder()) ?>" value="<?php echo $receipts->createdby->EditValue ?>"<?php echo $receipts->createdby->editAttributes() ?>>
</span>
<?php echo $receipts->createdby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts->createddatetime->Visible) { // createddatetime ?>
	<div id="r_createddatetime" class="form-group row">
		<label id="elh_receipts_createddatetime" for="x_createddatetime" class="<?php echo $receipts_add->LeftColumnClass ?>"><?php echo $receipts->createddatetime->caption() ?><?php echo ($receipts->createddatetime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_add->RightColumnClass ?>"><div<?php echo $receipts->createddatetime->cellAttributes() ?>>
<span id="el_receipts_createddatetime">
<input type="text" data-table="receipts" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?php echo HtmlEncode($receipts->createddatetime->getPlaceHolder()) ?>" value="<?php echo $receipts->createddatetime->EditValue ?>"<?php echo $receipts->createddatetime->editAttributes() ?>>
<?php if (!$receipts->createddatetime->ReadOnly && !$receipts->createddatetime->Disabled && !isset($receipts->createddatetime->EditAttrs["readonly"]) && !isset($receipts->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("freceiptsadd", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $receipts->createddatetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts->modifiedby->Visible) { // modifiedby ?>
	<div id="r_modifiedby" class="form-group row">
		<label id="elh_receipts_modifiedby" for="x_modifiedby" class="<?php echo $receipts_add->LeftColumnClass ?>"><?php echo $receipts->modifiedby->caption() ?><?php echo ($receipts->modifiedby->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_add->RightColumnClass ?>"><div<?php echo $receipts->modifiedby->cellAttributes() ?>>
<span id="el_receipts_modifiedby">
<input type="text" data-table="receipts" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" placeholder="<?php echo HtmlEncode($receipts->modifiedby->getPlaceHolder()) ?>" value="<?php echo $receipts->modifiedby->EditValue ?>"<?php echo $receipts->modifiedby->editAttributes() ?>>
</span>
<?php echo $receipts->modifiedby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts->modifieddatetime->Visible) { // modifieddatetime ?>
	<div id="r_modifieddatetime" class="form-group row">
		<label id="elh_receipts_modifieddatetime" for="x_modifieddatetime" class="<?php echo $receipts_add->LeftColumnClass ?>"><?php echo $receipts->modifieddatetime->caption() ?><?php echo ($receipts->modifieddatetime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_add->RightColumnClass ?>"><div<?php echo $receipts->modifieddatetime->cellAttributes() ?>>
<span id="el_receipts_modifieddatetime">
<input type="text" data-table="receipts" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?php echo HtmlEncode($receipts->modifieddatetime->getPlaceHolder()) ?>" value="<?php echo $receipts->modifieddatetime->EditValue ?>"<?php echo $receipts->modifieddatetime->editAttributes() ?>>
<?php if (!$receipts->modifieddatetime->ReadOnly && !$receipts->modifieddatetime->Disabled && !isset($receipts->modifieddatetime->EditAttrs["readonly"]) && !isset($receipts->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("freceiptsadd", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $receipts->modifieddatetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts->ChequeCardNo->Visible) { // ChequeCardNo ?>
	<div id="r_ChequeCardNo" class="form-group row">
		<label id="elh_receipts_ChequeCardNo" for="x_ChequeCardNo" class="<?php echo $receipts_add->LeftColumnClass ?>"><?php echo $receipts->ChequeCardNo->caption() ?><?php echo ($receipts->ChequeCardNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_add->RightColumnClass ?>"><div<?php echo $receipts->ChequeCardNo->cellAttributes() ?>>
<span id="el_receipts_ChequeCardNo">
<input type="text" data-table="receipts" data-field="x_ChequeCardNo" name="x_ChequeCardNo" id="x_ChequeCardNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($receipts->ChequeCardNo->getPlaceHolder()) ?>" value="<?php echo $receipts->ChequeCardNo->EditValue ?>"<?php echo $receipts->ChequeCardNo->editAttributes() ?>>
</span>
<?php echo $receipts->ChequeCardNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts->CreditBankName->Visible) { // CreditBankName ?>
	<div id="r_CreditBankName" class="form-group row">
		<label id="elh_receipts_CreditBankName" for="x_CreditBankName" class="<?php echo $receipts_add->LeftColumnClass ?>"><?php echo $receipts->CreditBankName->caption() ?><?php echo ($receipts->CreditBankName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_add->RightColumnClass ?>"><div<?php echo $receipts->CreditBankName->cellAttributes() ?>>
<span id="el_receipts_CreditBankName">
<input type="text" data-table="receipts" data-field="x_CreditBankName" name="x_CreditBankName" id="x_CreditBankName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($receipts->CreditBankName->getPlaceHolder()) ?>" value="<?php echo $receipts->CreditBankName->EditValue ?>"<?php echo $receipts->CreditBankName->editAttributes() ?>>
</span>
<?php echo $receipts->CreditBankName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts->CreditCardHolder->Visible) { // CreditCardHolder ?>
	<div id="r_CreditCardHolder" class="form-group row">
		<label id="elh_receipts_CreditCardHolder" for="x_CreditCardHolder" class="<?php echo $receipts_add->LeftColumnClass ?>"><?php echo $receipts->CreditCardHolder->caption() ?><?php echo ($receipts->CreditCardHolder->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_add->RightColumnClass ?>"><div<?php echo $receipts->CreditCardHolder->cellAttributes() ?>>
<span id="el_receipts_CreditCardHolder">
<input type="text" data-table="receipts" data-field="x_CreditCardHolder" name="x_CreditCardHolder" id="x_CreditCardHolder" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($receipts->CreditCardHolder->getPlaceHolder()) ?>" value="<?php echo $receipts->CreditCardHolder->EditValue ?>"<?php echo $receipts->CreditCardHolder->editAttributes() ?>>
</span>
<?php echo $receipts->CreditCardHolder->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts->CreditCardType->Visible) { // CreditCardType ?>
	<div id="r_CreditCardType" class="form-group row">
		<label id="elh_receipts_CreditCardType" for="x_CreditCardType" class="<?php echo $receipts_add->LeftColumnClass ?>"><?php echo $receipts->CreditCardType->caption() ?><?php echo ($receipts->CreditCardType->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_add->RightColumnClass ?>"><div<?php echo $receipts->CreditCardType->cellAttributes() ?>>
<span id="el_receipts_CreditCardType">
<input type="text" data-table="receipts" data-field="x_CreditCardType" name="x_CreditCardType" id="x_CreditCardType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($receipts->CreditCardType->getPlaceHolder()) ?>" value="<?php echo $receipts->CreditCardType->EditValue ?>"<?php echo $receipts->CreditCardType->editAttributes() ?>>
</span>
<?php echo $receipts->CreditCardType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts->CreditCardMachine->Visible) { // CreditCardMachine ?>
	<div id="r_CreditCardMachine" class="form-group row">
		<label id="elh_receipts_CreditCardMachine" for="x_CreditCardMachine" class="<?php echo $receipts_add->LeftColumnClass ?>"><?php echo $receipts->CreditCardMachine->caption() ?><?php echo ($receipts->CreditCardMachine->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_add->RightColumnClass ?>"><div<?php echo $receipts->CreditCardMachine->cellAttributes() ?>>
<span id="el_receipts_CreditCardMachine">
<input type="text" data-table="receipts" data-field="x_CreditCardMachine" name="x_CreditCardMachine" id="x_CreditCardMachine" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($receipts->CreditCardMachine->getPlaceHolder()) ?>" value="<?php echo $receipts->CreditCardMachine->EditValue ?>"<?php echo $receipts->CreditCardMachine->editAttributes() ?>>
</span>
<?php echo $receipts->CreditCardMachine->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts->CreditCardBatchNo->Visible) { // CreditCardBatchNo ?>
	<div id="r_CreditCardBatchNo" class="form-group row">
		<label id="elh_receipts_CreditCardBatchNo" for="x_CreditCardBatchNo" class="<?php echo $receipts_add->LeftColumnClass ?>"><?php echo $receipts->CreditCardBatchNo->caption() ?><?php echo ($receipts->CreditCardBatchNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_add->RightColumnClass ?>"><div<?php echo $receipts->CreditCardBatchNo->cellAttributes() ?>>
<span id="el_receipts_CreditCardBatchNo">
<input type="text" data-table="receipts" data-field="x_CreditCardBatchNo" name="x_CreditCardBatchNo" id="x_CreditCardBatchNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($receipts->CreditCardBatchNo->getPlaceHolder()) ?>" value="<?php echo $receipts->CreditCardBatchNo->EditValue ?>"<?php echo $receipts->CreditCardBatchNo->editAttributes() ?>>
</span>
<?php echo $receipts->CreditCardBatchNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts->CreditCardTax->Visible) { // CreditCardTax ?>
	<div id="r_CreditCardTax" class="form-group row">
		<label id="elh_receipts_CreditCardTax" for="x_CreditCardTax" class="<?php echo $receipts_add->LeftColumnClass ?>"><?php echo $receipts->CreditCardTax->caption() ?><?php echo ($receipts->CreditCardTax->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_add->RightColumnClass ?>"><div<?php echo $receipts->CreditCardTax->cellAttributes() ?>>
<span id="el_receipts_CreditCardTax">
<input type="text" data-table="receipts" data-field="x_CreditCardTax" name="x_CreditCardTax" id="x_CreditCardTax" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($receipts->CreditCardTax->getPlaceHolder()) ?>" value="<?php echo $receipts->CreditCardTax->EditValue ?>"<?php echo $receipts->CreditCardTax->editAttributes() ?>>
</span>
<?php echo $receipts->CreditCardTax->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts->CreditDeductionAmount->Visible) { // CreditDeductionAmount ?>
	<div id="r_CreditDeductionAmount" class="form-group row">
		<label id="elh_receipts_CreditDeductionAmount" for="x_CreditDeductionAmount" class="<?php echo $receipts_add->LeftColumnClass ?>"><?php echo $receipts->CreditDeductionAmount->caption() ?><?php echo ($receipts->CreditDeductionAmount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_add->RightColumnClass ?>"><div<?php echo $receipts->CreditDeductionAmount->cellAttributes() ?>>
<span id="el_receipts_CreditDeductionAmount">
<input type="text" data-table="receipts" data-field="x_CreditDeductionAmount" name="x_CreditDeductionAmount" id="x_CreditDeductionAmount" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($receipts->CreditDeductionAmount->getPlaceHolder()) ?>" value="<?php echo $receipts->CreditDeductionAmount->EditValue ?>"<?php echo $receipts->CreditDeductionAmount->editAttributes() ?>>
</span>
<?php echo $receipts->CreditDeductionAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts->RealizationAmount->Visible) { // RealizationAmount ?>
	<div id="r_RealizationAmount" class="form-group row">
		<label id="elh_receipts_RealizationAmount" for="x_RealizationAmount" class="<?php echo $receipts_add->LeftColumnClass ?>"><?php echo $receipts->RealizationAmount->caption() ?><?php echo ($receipts->RealizationAmount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_add->RightColumnClass ?>"><div<?php echo $receipts->RealizationAmount->cellAttributes() ?>>
<span id="el_receipts_RealizationAmount">
<input type="text" data-table="receipts" data-field="x_RealizationAmount" name="x_RealizationAmount" id="x_RealizationAmount" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($receipts->RealizationAmount->getPlaceHolder()) ?>" value="<?php echo $receipts->RealizationAmount->EditValue ?>"<?php echo $receipts->RealizationAmount->editAttributes() ?>>
</span>
<?php echo $receipts->RealizationAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts->RealizationStatus->Visible) { // RealizationStatus ?>
	<div id="r_RealizationStatus" class="form-group row">
		<label id="elh_receipts_RealizationStatus" for="x_RealizationStatus" class="<?php echo $receipts_add->LeftColumnClass ?>"><?php echo $receipts->RealizationStatus->caption() ?><?php echo ($receipts->RealizationStatus->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_add->RightColumnClass ?>"><div<?php echo $receipts->RealizationStatus->cellAttributes() ?>>
<span id="el_receipts_RealizationStatus">
<input type="text" data-table="receipts" data-field="x_RealizationStatus" name="x_RealizationStatus" id="x_RealizationStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($receipts->RealizationStatus->getPlaceHolder()) ?>" value="<?php echo $receipts->RealizationStatus->EditValue ?>"<?php echo $receipts->RealizationStatus->editAttributes() ?>>
</span>
<?php echo $receipts->RealizationStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts->RealizationRemarks->Visible) { // RealizationRemarks ?>
	<div id="r_RealizationRemarks" class="form-group row">
		<label id="elh_receipts_RealizationRemarks" for="x_RealizationRemarks" class="<?php echo $receipts_add->LeftColumnClass ?>"><?php echo $receipts->RealizationRemarks->caption() ?><?php echo ($receipts->RealizationRemarks->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_add->RightColumnClass ?>"><div<?php echo $receipts->RealizationRemarks->cellAttributes() ?>>
<span id="el_receipts_RealizationRemarks">
<input type="text" data-table="receipts" data-field="x_RealizationRemarks" name="x_RealizationRemarks" id="x_RealizationRemarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($receipts->RealizationRemarks->getPlaceHolder()) ?>" value="<?php echo $receipts->RealizationRemarks->EditValue ?>"<?php echo $receipts->RealizationRemarks->editAttributes() ?>>
</span>
<?php echo $receipts->RealizationRemarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
	<div id="r_RealizationBatchNo" class="form-group row">
		<label id="elh_receipts_RealizationBatchNo" for="x_RealizationBatchNo" class="<?php echo $receipts_add->LeftColumnClass ?>"><?php echo $receipts->RealizationBatchNo->caption() ?><?php echo ($receipts->RealizationBatchNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_add->RightColumnClass ?>"><div<?php echo $receipts->RealizationBatchNo->cellAttributes() ?>>
<span id="el_receipts_RealizationBatchNo">
<input type="text" data-table="receipts" data-field="x_RealizationBatchNo" name="x_RealizationBatchNo" id="x_RealizationBatchNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($receipts->RealizationBatchNo->getPlaceHolder()) ?>" value="<?php echo $receipts->RealizationBatchNo->EditValue ?>"<?php echo $receipts->RealizationBatchNo->editAttributes() ?>>
</span>
<?php echo $receipts->RealizationBatchNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts->RealizationDate->Visible) { // RealizationDate ?>
	<div id="r_RealizationDate" class="form-group row">
		<label id="elh_receipts_RealizationDate" for="x_RealizationDate" class="<?php echo $receipts_add->LeftColumnClass ?>"><?php echo $receipts->RealizationDate->caption() ?><?php echo ($receipts->RealizationDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_add->RightColumnClass ?>"><div<?php echo $receipts->RealizationDate->cellAttributes() ?>>
<span id="el_receipts_RealizationDate">
<input type="text" data-table="receipts" data-field="x_RealizationDate" name="x_RealizationDate" id="x_RealizationDate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($receipts->RealizationDate->getPlaceHolder()) ?>" value="<?php echo $receipts->RealizationDate->EditValue ?>"<?php echo $receipts->RealizationDate->editAttributes() ?>>
</span>
<?php echo $receipts->RealizationDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($receipts->BankAccHolderMobileNumber->Visible) { // BankAccHolderMobileNumber ?>
	<div id="r_BankAccHolderMobileNumber" class="form-group row">
		<label id="elh_receipts_BankAccHolderMobileNumber" for="x_BankAccHolderMobileNumber" class="<?php echo $receipts_add->LeftColumnClass ?>"><?php echo $receipts->BankAccHolderMobileNumber->caption() ?><?php echo ($receipts->BankAccHolderMobileNumber->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $receipts_add->RightColumnClass ?>"><div<?php echo $receipts->BankAccHolderMobileNumber->cellAttributes() ?>>
<span id="el_receipts_BankAccHolderMobileNumber">
<input type="text" data-table="receipts" data-field="x_BankAccHolderMobileNumber" name="x_BankAccHolderMobileNumber" id="x_BankAccHolderMobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($receipts->BankAccHolderMobileNumber->getPlaceHolder()) ?>" value="<?php echo $receipts->BankAccHolderMobileNumber->EditValue ?>"<?php echo $receipts->BankAccHolderMobileNumber->editAttributes() ?>>
</span>
<?php echo $receipts->BankAccHolderMobileNumber->CustomMsg ?></div></div>
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
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$receipts_add->terminate();
?>