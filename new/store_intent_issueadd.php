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
$store_intent_issue_add = new store_intent_issue_add();

// Run the page
$store_intent_issue_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$store_intent_issue_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fstore_intent_issueadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fstore_intent_issueadd = currentForm = new ew.Form("fstore_intent_issueadd", "add");

	// Validate form
	fstore_intent_issueadd.validate = function() {
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
			<?php if ($store_intent_issue_add->Reception->Required) { ?>
				elm = this.getElements("x" + infix + "_Reception");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_add->Reception->caption(), $store_intent_issue_add->Reception->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Reception");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_intent_issue_add->Reception->errorMessage()) ?>");
			<?php if ($store_intent_issue_add->PatientId->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_add->PatientId->caption(), $store_intent_issue_add->PatientId->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_intent_issue_add->mrnno->Required) { ?>
				elm = this.getElements("x" + infix + "_mrnno");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_add->mrnno->caption(), $store_intent_issue_add->mrnno->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_intent_issue_add->PatientName->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_add->PatientName->caption(), $store_intent_issue_add->PatientName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_intent_issue_add->Age->Required) { ?>
				elm = this.getElements("x" + infix + "_Age");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_add->Age->caption(), $store_intent_issue_add->Age->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_intent_issue_add->Gender->Required) { ?>
				elm = this.getElements("x" + infix + "_Gender");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_add->Gender->caption(), $store_intent_issue_add->Gender->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_intent_issue_add->profilePic->Required) { ?>
				elm = this.getElements("x" + infix + "_profilePic");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_add->profilePic->caption(), $store_intent_issue_add->profilePic->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_intent_issue_add->Mobile->Required) { ?>
				elm = this.getElements("x" + infix + "_Mobile");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_add->Mobile->caption(), $store_intent_issue_add->Mobile->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_intent_issue_add->IP_OP->Required) { ?>
				elm = this.getElements("x" + infix + "_IP_OP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_add->IP_OP->caption(), $store_intent_issue_add->IP_OP->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_intent_issue_add->Doctor->Required) { ?>
				elm = this.getElements("x" + infix + "_Doctor");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_add->Doctor->caption(), $store_intent_issue_add->Doctor->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_intent_issue_add->voucher_type->Required) { ?>
				elm = this.getElements("x" + infix + "_voucher_type");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_add->voucher_type->caption(), $store_intent_issue_add->voucher_type->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_intent_issue_add->Details->Required) { ?>
				elm = this.getElements("x" + infix + "_Details");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_add->Details->caption(), $store_intent_issue_add->Details->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_intent_issue_add->ModeofPayment->Required) { ?>
				elm = this.getElements("x" + infix + "_ModeofPayment");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_add->ModeofPayment->caption(), $store_intent_issue_add->ModeofPayment->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_intent_issue_add->Amount->Required) { ?>
				elm = this.getElements("x" + infix + "_Amount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_add->Amount->caption(), $store_intent_issue_add->Amount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Amount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_intent_issue_add->Amount->errorMessage()) ?>");
			<?php if ($store_intent_issue_add->AnyDues->Required) { ?>
				elm = this.getElements("x" + infix + "_AnyDues");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_add->AnyDues->caption(), $store_intent_issue_add->AnyDues->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_intent_issue_add->createdby->Required) { ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_add->createdby->caption(), $store_intent_issue_add->createdby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_intent_issue_add->createddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_add->createddatetime->caption(), $store_intent_issue_add->createddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_intent_issue_add->createddatetime->errorMessage()) ?>");
			<?php if ($store_intent_issue_add->modifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_add->modifiedby->caption(), $store_intent_issue_add->modifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_intent_issue_add->modifieddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_add->modifieddatetime->caption(), $store_intent_issue_add->modifieddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_intent_issue_add->modifieddatetime->errorMessage()) ?>");
			<?php if ($store_intent_issue_add->RealizationAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_RealizationAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_add->RealizationAmount->caption(), $store_intent_issue_add->RealizationAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RealizationAmount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_intent_issue_add->RealizationAmount->errorMessage()) ?>");
			<?php if ($store_intent_issue_add->RealizationStatus->Required) { ?>
				elm = this.getElements("x" + infix + "_RealizationStatus");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_add->RealizationStatus->caption(), $store_intent_issue_add->RealizationStatus->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_intent_issue_add->RealizationRemarks->Required) { ?>
				elm = this.getElements("x" + infix + "_RealizationRemarks");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_add->RealizationRemarks->caption(), $store_intent_issue_add->RealizationRemarks->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_intent_issue_add->RealizationBatchNo->Required) { ?>
				elm = this.getElements("x" + infix + "_RealizationBatchNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_add->RealizationBatchNo->caption(), $store_intent_issue_add->RealizationBatchNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_intent_issue_add->RealizationDate->Required) { ?>
				elm = this.getElements("x" + infix + "_RealizationDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_add->RealizationDate->caption(), $store_intent_issue_add->RealizationDate->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_intent_issue_add->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_add->HospID->caption(), $store_intent_issue_add->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_intent_issue_add->HospID->errorMessage()) ?>");
			<?php if ($store_intent_issue_add->RIDNO->Required) { ?>
				elm = this.getElements("x" + infix + "_RIDNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_add->RIDNO->caption(), $store_intent_issue_add->RIDNO->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RIDNO");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_intent_issue_add->RIDNO->errorMessage()) ?>");
			<?php if ($store_intent_issue_add->TidNo->Required) { ?>
				elm = this.getElements("x" + infix + "_TidNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_add->TidNo->caption(), $store_intent_issue_add->TidNo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TidNo");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_intent_issue_add->TidNo->errorMessage()) ?>");
			<?php if ($store_intent_issue_add->CId->Required) { ?>
				elm = this.getElements("x" + infix + "_CId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_add->CId->caption(), $store_intent_issue_add->CId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_CId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_intent_issue_add->CId->errorMessage()) ?>");
			<?php if ($store_intent_issue_add->PartnerName->Required) { ?>
				elm = this.getElements("x" + infix + "_PartnerName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_add->PartnerName->caption(), $store_intent_issue_add->PartnerName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_intent_issue_add->PayerType->Required) { ?>
				elm = this.getElements("x" + infix + "_PayerType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_add->PayerType->caption(), $store_intent_issue_add->PayerType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_intent_issue_add->Dob->Required) { ?>
				elm = this.getElements("x" + infix + "_Dob");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_add->Dob->caption(), $store_intent_issue_add->Dob->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_intent_issue_add->Currency->Required) { ?>
				elm = this.getElements("x" + infix + "_Currency");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_add->Currency->caption(), $store_intent_issue_add->Currency->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_intent_issue_add->DiscountRemarks->Required) { ?>
				elm = this.getElements("x" + infix + "_DiscountRemarks");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_add->DiscountRemarks->caption(), $store_intent_issue_add->DiscountRemarks->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_intent_issue_add->Remarks->Required) { ?>
				elm = this.getElements("x" + infix + "_Remarks");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_add->Remarks->caption(), $store_intent_issue_add->Remarks->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_intent_issue_add->PatId->Required) { ?>
				elm = this.getElements("x" + infix + "_PatId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_add->PatId->caption(), $store_intent_issue_add->PatId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PatId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_intent_issue_add->PatId->errorMessage()) ?>");
			<?php if ($store_intent_issue_add->DrDepartment->Required) { ?>
				elm = this.getElements("x" + infix + "_DrDepartment");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_add->DrDepartment->caption(), $store_intent_issue_add->DrDepartment->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_intent_issue_add->RefferedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_RefferedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_add->RefferedBy->caption(), $store_intent_issue_add->RefferedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_intent_issue_add->BillNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_BillNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_add->BillNumber->caption(), $store_intent_issue_add->BillNumber->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_intent_issue_add->CardNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_CardNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_add->CardNumber->caption(), $store_intent_issue_add->CardNumber->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_intent_issue_add->BankName->Required) { ?>
				elm = this.getElements("x" + infix + "_BankName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_add->BankName->caption(), $store_intent_issue_add->BankName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_intent_issue_add->DrID->Required) { ?>
				elm = this.getElements("x" + infix + "_DrID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_add->DrID->caption(), $store_intent_issue_add->DrID->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DrID");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_intent_issue_add->DrID->errorMessage()) ?>");
			<?php if ($store_intent_issue_add->BillStatus->Required) { ?>
				elm = this.getElements("x" + infix + "_BillStatus");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_add->BillStatus->caption(), $store_intent_issue_add->BillStatus->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BillStatus");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_intent_issue_add->BillStatus->errorMessage()) ?>");
			<?php if ($store_intent_issue_add->ReportHeader->Required) { ?>
				elm = this.getElements("x" + infix + "_ReportHeader");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_add->ReportHeader->caption(), $store_intent_issue_add->ReportHeader->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_intent_issue_add->PharID->Required) { ?>
				elm = this.getElements("x" + infix + "_PharID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_add->PharID->caption(), $store_intent_issue_add->PharID->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PharID");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_intent_issue_add->PharID->errorMessage()) ?>");

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
	fstore_intent_issueadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fstore_intent_issueadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fstore_intent_issueadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $store_intent_issue_add->showPageHeader(); ?>
<?php
$store_intent_issue_add->showMessage();
?>
<form name="fstore_intent_issueadd" id="fstore_intent_issueadd" class="<?php echo $store_intent_issue_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="store_intent_issue">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$store_intent_issue_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($store_intent_issue_add->Reception->Visible) { // Reception ?>
	<div id="r_Reception" class="form-group row">
		<label id="elh_store_intent_issue_Reception" for="x_Reception" class="<?php echo $store_intent_issue_add->LeftColumnClass ?>"><?php echo $store_intent_issue_add->Reception->caption() ?><?php echo $store_intent_issue_add->Reception->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_add->RightColumnClass ?>"><div <?php echo $store_intent_issue_add->Reception->cellAttributes() ?>>
<span id="el_store_intent_issue_Reception">
<input type="text" data-table="store_intent_issue" data-field="x_Reception" name="x_Reception" id="x_Reception" size="30" placeholder="<?php echo HtmlEncode($store_intent_issue_add->Reception->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_add->Reception->EditValue ?>"<?php echo $store_intent_issue_add->Reception->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_add->Reception->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_add->PatientId->Visible) { // PatientId ?>
	<div id="r_PatientId" class="form-group row">
		<label id="elh_store_intent_issue_PatientId" for="x_PatientId" class="<?php echo $store_intent_issue_add->LeftColumnClass ?>"><?php echo $store_intent_issue_add->PatientId->caption() ?><?php echo $store_intent_issue_add->PatientId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_add->RightColumnClass ?>"><div <?php echo $store_intent_issue_add->PatientId->cellAttributes() ?>>
<span id="el_store_intent_issue_PatientId">
<input type="text" data-table="store_intent_issue" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue_add->PatientId->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_add->PatientId->EditValue ?>"<?php echo $store_intent_issue_add->PatientId->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_add->PatientId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_add->mrnno->Visible) { // mrnno ?>
	<div id="r_mrnno" class="form-group row">
		<label id="elh_store_intent_issue_mrnno" for="x_mrnno" class="<?php echo $store_intent_issue_add->LeftColumnClass ?>"><?php echo $store_intent_issue_add->mrnno->caption() ?><?php echo $store_intent_issue_add->mrnno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_add->RightColumnClass ?>"><div <?php echo $store_intent_issue_add->mrnno->cellAttributes() ?>>
<span id="el_store_intent_issue_mrnno">
<input type="text" data-table="store_intent_issue" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue_add->mrnno->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_add->mrnno->EditValue ?>"<?php echo $store_intent_issue_add->mrnno->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_add->mrnno->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_add->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label id="elh_store_intent_issue_PatientName" for="x_PatientName" class="<?php echo $store_intent_issue_add->LeftColumnClass ?>"><?php echo $store_intent_issue_add->PatientName->caption() ?><?php echo $store_intent_issue_add->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_add->RightColumnClass ?>"><div <?php echo $store_intent_issue_add->PatientName->cellAttributes() ?>>
<span id="el_store_intent_issue_PatientName">
<input type="text" data-table="store_intent_issue" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue_add->PatientName->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_add->PatientName->EditValue ?>"<?php echo $store_intent_issue_add->PatientName->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_add->PatientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_add->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label id="elh_store_intent_issue_Age" for="x_Age" class="<?php echo $store_intent_issue_add->LeftColumnClass ?>"><?php echo $store_intent_issue_add->Age->caption() ?><?php echo $store_intent_issue_add->Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_add->RightColumnClass ?>"><div <?php echo $store_intent_issue_add->Age->cellAttributes() ?>>
<span id="el_store_intent_issue_Age">
<input type="text" data-table="store_intent_issue" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue_add->Age->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_add->Age->EditValue ?>"<?php echo $store_intent_issue_add->Age->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_add->Age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_add->Gender->Visible) { // Gender ?>
	<div id="r_Gender" class="form-group row">
		<label id="elh_store_intent_issue_Gender" for="x_Gender" class="<?php echo $store_intent_issue_add->LeftColumnClass ?>"><?php echo $store_intent_issue_add->Gender->caption() ?><?php echo $store_intent_issue_add->Gender->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_add->RightColumnClass ?>"><div <?php echo $store_intent_issue_add->Gender->cellAttributes() ?>>
<span id="el_store_intent_issue_Gender">
<input type="text" data-table="store_intent_issue" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue_add->Gender->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_add->Gender->EditValue ?>"<?php echo $store_intent_issue_add->Gender->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_add->Gender->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_add->profilePic->Visible) { // profilePic ?>
	<div id="r_profilePic" class="form-group row">
		<label id="elh_store_intent_issue_profilePic" for="x_profilePic" class="<?php echo $store_intent_issue_add->LeftColumnClass ?>"><?php echo $store_intent_issue_add->profilePic->caption() ?><?php echo $store_intent_issue_add->profilePic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_add->RightColumnClass ?>"><div <?php echo $store_intent_issue_add->profilePic->cellAttributes() ?>>
<span id="el_store_intent_issue_profilePic">
<textarea data-table="store_intent_issue" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" cols="35" rows="4" placeholder="<?php echo HtmlEncode($store_intent_issue_add->profilePic->getPlaceHolder()) ?>"<?php echo $store_intent_issue_add->profilePic->editAttributes() ?>><?php echo $store_intent_issue_add->profilePic->EditValue ?></textarea>
</span>
<?php echo $store_intent_issue_add->profilePic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_add->Mobile->Visible) { // Mobile ?>
	<div id="r_Mobile" class="form-group row">
		<label id="elh_store_intent_issue_Mobile" for="x_Mobile" class="<?php echo $store_intent_issue_add->LeftColumnClass ?>"><?php echo $store_intent_issue_add->Mobile->caption() ?><?php echo $store_intent_issue_add->Mobile->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_add->RightColumnClass ?>"><div <?php echo $store_intent_issue_add->Mobile->cellAttributes() ?>>
<span id="el_store_intent_issue_Mobile">
<input type="text" data-table="store_intent_issue" data-field="x_Mobile" name="x_Mobile" id="x_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue_add->Mobile->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_add->Mobile->EditValue ?>"<?php echo $store_intent_issue_add->Mobile->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_add->Mobile->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_add->IP_OP->Visible) { // IP_OP ?>
	<div id="r_IP_OP" class="form-group row">
		<label id="elh_store_intent_issue_IP_OP" for="x_IP_OP" class="<?php echo $store_intent_issue_add->LeftColumnClass ?>"><?php echo $store_intent_issue_add->IP_OP->caption() ?><?php echo $store_intent_issue_add->IP_OP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_add->RightColumnClass ?>"><div <?php echo $store_intent_issue_add->IP_OP->cellAttributes() ?>>
<span id="el_store_intent_issue_IP_OP">
<input type="text" data-table="store_intent_issue" data-field="x_IP_OP" name="x_IP_OP" id="x_IP_OP" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue_add->IP_OP->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_add->IP_OP->EditValue ?>"<?php echo $store_intent_issue_add->IP_OP->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_add->IP_OP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_add->Doctor->Visible) { // Doctor ?>
	<div id="r_Doctor" class="form-group row">
		<label id="elh_store_intent_issue_Doctor" for="x_Doctor" class="<?php echo $store_intent_issue_add->LeftColumnClass ?>"><?php echo $store_intent_issue_add->Doctor->caption() ?><?php echo $store_intent_issue_add->Doctor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_add->RightColumnClass ?>"><div <?php echo $store_intent_issue_add->Doctor->cellAttributes() ?>>
<span id="el_store_intent_issue_Doctor">
<input type="text" data-table="store_intent_issue" data-field="x_Doctor" name="x_Doctor" id="x_Doctor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue_add->Doctor->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_add->Doctor->EditValue ?>"<?php echo $store_intent_issue_add->Doctor->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_add->Doctor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_add->voucher_type->Visible) { // voucher_type ?>
	<div id="r_voucher_type" class="form-group row">
		<label id="elh_store_intent_issue_voucher_type" for="x_voucher_type" class="<?php echo $store_intent_issue_add->LeftColumnClass ?>"><?php echo $store_intent_issue_add->voucher_type->caption() ?><?php echo $store_intent_issue_add->voucher_type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_add->RightColumnClass ?>"><div <?php echo $store_intent_issue_add->voucher_type->cellAttributes() ?>>
<span id="el_store_intent_issue_voucher_type">
<input type="text" data-table="store_intent_issue" data-field="x_voucher_type" name="x_voucher_type" id="x_voucher_type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue_add->voucher_type->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_add->voucher_type->EditValue ?>"<?php echo $store_intent_issue_add->voucher_type->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_add->voucher_type->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_add->Details->Visible) { // Details ?>
	<div id="r_Details" class="form-group row">
		<label id="elh_store_intent_issue_Details" for="x_Details" class="<?php echo $store_intent_issue_add->LeftColumnClass ?>"><?php echo $store_intent_issue_add->Details->caption() ?><?php echo $store_intent_issue_add->Details->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_add->RightColumnClass ?>"><div <?php echo $store_intent_issue_add->Details->cellAttributes() ?>>
<span id="el_store_intent_issue_Details">
<input type="text" data-table="store_intent_issue" data-field="x_Details" name="x_Details" id="x_Details" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue_add->Details->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_add->Details->EditValue ?>"<?php echo $store_intent_issue_add->Details->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_add->Details->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_add->ModeofPayment->Visible) { // ModeofPayment ?>
	<div id="r_ModeofPayment" class="form-group row">
		<label id="elh_store_intent_issue_ModeofPayment" for="x_ModeofPayment" class="<?php echo $store_intent_issue_add->LeftColumnClass ?>"><?php echo $store_intent_issue_add->ModeofPayment->caption() ?><?php echo $store_intent_issue_add->ModeofPayment->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_add->RightColumnClass ?>"><div <?php echo $store_intent_issue_add->ModeofPayment->cellAttributes() ?>>
<span id="el_store_intent_issue_ModeofPayment">
<input type="text" data-table="store_intent_issue" data-field="x_ModeofPayment" name="x_ModeofPayment" id="x_ModeofPayment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue_add->ModeofPayment->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_add->ModeofPayment->EditValue ?>"<?php echo $store_intent_issue_add->ModeofPayment->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_add->ModeofPayment->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_add->Amount->Visible) { // Amount ?>
	<div id="r_Amount" class="form-group row">
		<label id="elh_store_intent_issue_Amount" for="x_Amount" class="<?php echo $store_intent_issue_add->LeftColumnClass ?>"><?php echo $store_intent_issue_add->Amount->caption() ?><?php echo $store_intent_issue_add->Amount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_add->RightColumnClass ?>"><div <?php echo $store_intent_issue_add->Amount->cellAttributes() ?>>
<span id="el_store_intent_issue_Amount">
<input type="text" data-table="store_intent_issue" data-field="x_Amount" name="x_Amount" id="x_Amount" size="30" placeholder="<?php echo HtmlEncode($store_intent_issue_add->Amount->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_add->Amount->EditValue ?>"<?php echo $store_intent_issue_add->Amount->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_add->Amount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_add->AnyDues->Visible) { // AnyDues ?>
	<div id="r_AnyDues" class="form-group row">
		<label id="elh_store_intent_issue_AnyDues" for="x_AnyDues" class="<?php echo $store_intent_issue_add->LeftColumnClass ?>"><?php echo $store_intent_issue_add->AnyDues->caption() ?><?php echo $store_intent_issue_add->AnyDues->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_add->RightColumnClass ?>"><div <?php echo $store_intent_issue_add->AnyDues->cellAttributes() ?>>
<span id="el_store_intent_issue_AnyDues">
<input type="text" data-table="store_intent_issue" data-field="x_AnyDues" name="x_AnyDues" id="x_AnyDues" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue_add->AnyDues->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_add->AnyDues->EditValue ?>"<?php echo $store_intent_issue_add->AnyDues->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_add->AnyDues->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_add->createdby->Visible) { // createdby ?>
	<div id="r_createdby" class="form-group row">
		<label id="elh_store_intent_issue_createdby" for="x_createdby" class="<?php echo $store_intent_issue_add->LeftColumnClass ?>"><?php echo $store_intent_issue_add->createdby->caption() ?><?php echo $store_intent_issue_add->createdby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_add->RightColumnClass ?>"><div <?php echo $store_intent_issue_add->createdby->cellAttributes() ?>>
<span id="el_store_intent_issue_createdby">
<input type="text" data-table="store_intent_issue" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue_add->createdby->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_add->createdby->EditValue ?>"<?php echo $store_intent_issue_add->createdby->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_add->createdby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_add->createddatetime->Visible) { // createddatetime ?>
	<div id="r_createddatetime" class="form-group row">
		<label id="elh_store_intent_issue_createddatetime" for="x_createddatetime" class="<?php echo $store_intent_issue_add->LeftColumnClass ?>"><?php echo $store_intent_issue_add->createddatetime->caption() ?><?php echo $store_intent_issue_add->createddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_add->RightColumnClass ?>"><div <?php echo $store_intent_issue_add->createddatetime->cellAttributes() ?>>
<span id="el_store_intent_issue_createddatetime">
<input type="text" data-table="store_intent_issue" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?php echo HtmlEncode($store_intent_issue_add->createddatetime->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_add->createddatetime->EditValue ?>"<?php echo $store_intent_issue_add->createddatetime->editAttributes() ?>>
<?php if (!$store_intent_issue_add->createddatetime->ReadOnly && !$store_intent_issue_add->createddatetime->Disabled && !isset($store_intent_issue_add->createddatetime->EditAttrs["readonly"]) && !isset($store_intent_issue_add->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fstore_intent_issueadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fstore_intent_issueadd", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $store_intent_issue_add->createddatetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_add->modifiedby->Visible) { // modifiedby ?>
	<div id="r_modifiedby" class="form-group row">
		<label id="elh_store_intent_issue_modifiedby" for="x_modifiedby" class="<?php echo $store_intent_issue_add->LeftColumnClass ?>"><?php echo $store_intent_issue_add->modifiedby->caption() ?><?php echo $store_intent_issue_add->modifiedby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_add->RightColumnClass ?>"><div <?php echo $store_intent_issue_add->modifiedby->cellAttributes() ?>>
<span id="el_store_intent_issue_modifiedby">
<input type="text" data-table="store_intent_issue" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue_add->modifiedby->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_add->modifiedby->EditValue ?>"<?php echo $store_intent_issue_add->modifiedby->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_add->modifiedby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_add->modifieddatetime->Visible) { // modifieddatetime ?>
	<div id="r_modifieddatetime" class="form-group row">
		<label id="elh_store_intent_issue_modifieddatetime" for="x_modifieddatetime" class="<?php echo $store_intent_issue_add->LeftColumnClass ?>"><?php echo $store_intent_issue_add->modifieddatetime->caption() ?><?php echo $store_intent_issue_add->modifieddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_add->RightColumnClass ?>"><div <?php echo $store_intent_issue_add->modifieddatetime->cellAttributes() ?>>
<span id="el_store_intent_issue_modifieddatetime">
<input type="text" data-table="store_intent_issue" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?php echo HtmlEncode($store_intent_issue_add->modifieddatetime->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_add->modifieddatetime->EditValue ?>"<?php echo $store_intent_issue_add->modifieddatetime->editAttributes() ?>>
<?php if (!$store_intent_issue_add->modifieddatetime->ReadOnly && !$store_intent_issue_add->modifieddatetime->Disabled && !isset($store_intent_issue_add->modifieddatetime->EditAttrs["readonly"]) && !isset($store_intent_issue_add->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fstore_intent_issueadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fstore_intent_issueadd", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $store_intent_issue_add->modifieddatetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_add->RealizationAmount->Visible) { // RealizationAmount ?>
	<div id="r_RealizationAmount" class="form-group row">
		<label id="elh_store_intent_issue_RealizationAmount" for="x_RealizationAmount" class="<?php echo $store_intent_issue_add->LeftColumnClass ?>"><?php echo $store_intent_issue_add->RealizationAmount->caption() ?><?php echo $store_intent_issue_add->RealizationAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_add->RightColumnClass ?>"><div <?php echo $store_intent_issue_add->RealizationAmount->cellAttributes() ?>>
<span id="el_store_intent_issue_RealizationAmount">
<input type="text" data-table="store_intent_issue" data-field="x_RealizationAmount" name="x_RealizationAmount" id="x_RealizationAmount" size="30" placeholder="<?php echo HtmlEncode($store_intent_issue_add->RealizationAmount->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_add->RealizationAmount->EditValue ?>"<?php echo $store_intent_issue_add->RealizationAmount->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_add->RealizationAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_add->RealizationStatus->Visible) { // RealizationStatus ?>
	<div id="r_RealizationStatus" class="form-group row">
		<label id="elh_store_intent_issue_RealizationStatus" for="x_RealizationStatus" class="<?php echo $store_intent_issue_add->LeftColumnClass ?>"><?php echo $store_intent_issue_add->RealizationStatus->caption() ?><?php echo $store_intent_issue_add->RealizationStatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_add->RightColumnClass ?>"><div <?php echo $store_intent_issue_add->RealizationStatus->cellAttributes() ?>>
<span id="el_store_intent_issue_RealizationStatus">
<input type="text" data-table="store_intent_issue" data-field="x_RealizationStatus" name="x_RealizationStatus" id="x_RealizationStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue_add->RealizationStatus->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_add->RealizationStatus->EditValue ?>"<?php echo $store_intent_issue_add->RealizationStatus->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_add->RealizationStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_add->RealizationRemarks->Visible) { // RealizationRemarks ?>
	<div id="r_RealizationRemarks" class="form-group row">
		<label id="elh_store_intent_issue_RealizationRemarks" for="x_RealizationRemarks" class="<?php echo $store_intent_issue_add->LeftColumnClass ?>"><?php echo $store_intent_issue_add->RealizationRemarks->caption() ?><?php echo $store_intent_issue_add->RealizationRemarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_add->RightColumnClass ?>"><div <?php echo $store_intent_issue_add->RealizationRemarks->cellAttributes() ?>>
<span id="el_store_intent_issue_RealizationRemarks">
<input type="text" data-table="store_intent_issue" data-field="x_RealizationRemarks" name="x_RealizationRemarks" id="x_RealizationRemarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue_add->RealizationRemarks->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_add->RealizationRemarks->EditValue ?>"<?php echo $store_intent_issue_add->RealizationRemarks->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_add->RealizationRemarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_add->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
	<div id="r_RealizationBatchNo" class="form-group row">
		<label id="elh_store_intent_issue_RealizationBatchNo" for="x_RealizationBatchNo" class="<?php echo $store_intent_issue_add->LeftColumnClass ?>"><?php echo $store_intent_issue_add->RealizationBatchNo->caption() ?><?php echo $store_intent_issue_add->RealizationBatchNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_add->RightColumnClass ?>"><div <?php echo $store_intent_issue_add->RealizationBatchNo->cellAttributes() ?>>
<span id="el_store_intent_issue_RealizationBatchNo">
<input type="text" data-table="store_intent_issue" data-field="x_RealizationBatchNo" name="x_RealizationBatchNo" id="x_RealizationBatchNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue_add->RealizationBatchNo->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_add->RealizationBatchNo->EditValue ?>"<?php echo $store_intent_issue_add->RealizationBatchNo->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_add->RealizationBatchNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_add->RealizationDate->Visible) { // RealizationDate ?>
	<div id="r_RealizationDate" class="form-group row">
		<label id="elh_store_intent_issue_RealizationDate" for="x_RealizationDate" class="<?php echo $store_intent_issue_add->LeftColumnClass ?>"><?php echo $store_intent_issue_add->RealizationDate->caption() ?><?php echo $store_intent_issue_add->RealizationDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_add->RightColumnClass ?>"><div <?php echo $store_intent_issue_add->RealizationDate->cellAttributes() ?>>
<span id="el_store_intent_issue_RealizationDate">
<input type="text" data-table="store_intent_issue" data-field="x_RealizationDate" name="x_RealizationDate" id="x_RealizationDate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue_add->RealizationDate->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_add->RealizationDate->EditValue ?>"<?php echo $store_intent_issue_add->RealizationDate->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_add->RealizationDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_add->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label id="elh_store_intent_issue_HospID" for="x_HospID" class="<?php echo $store_intent_issue_add->LeftColumnClass ?>"><?php echo $store_intent_issue_add->HospID->caption() ?><?php echo $store_intent_issue_add->HospID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_add->RightColumnClass ?>"><div <?php echo $store_intent_issue_add->HospID->cellAttributes() ?>>
<span id="el_store_intent_issue_HospID">
<input type="text" data-table="store_intent_issue" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?php echo HtmlEncode($store_intent_issue_add->HospID->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_add->HospID->EditValue ?>"<?php echo $store_intent_issue_add->HospID->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_add->HospID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_add->RIDNO->Visible) { // RIDNO ?>
	<div id="r_RIDNO" class="form-group row">
		<label id="elh_store_intent_issue_RIDNO" for="x_RIDNO" class="<?php echo $store_intent_issue_add->LeftColumnClass ?>"><?php echo $store_intent_issue_add->RIDNO->caption() ?><?php echo $store_intent_issue_add->RIDNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_add->RightColumnClass ?>"><div <?php echo $store_intent_issue_add->RIDNO->cellAttributes() ?>>
<span id="el_store_intent_issue_RIDNO">
<input type="text" data-table="store_intent_issue" data-field="x_RIDNO" name="x_RIDNO" id="x_RIDNO" size="30" placeholder="<?php echo HtmlEncode($store_intent_issue_add->RIDNO->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_add->RIDNO->EditValue ?>"<?php echo $store_intent_issue_add->RIDNO->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_add->RIDNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_add->TidNo->Visible) { // TidNo ?>
	<div id="r_TidNo" class="form-group row">
		<label id="elh_store_intent_issue_TidNo" for="x_TidNo" class="<?php echo $store_intent_issue_add->LeftColumnClass ?>"><?php echo $store_intent_issue_add->TidNo->caption() ?><?php echo $store_intent_issue_add->TidNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_add->RightColumnClass ?>"><div <?php echo $store_intent_issue_add->TidNo->cellAttributes() ?>>
<span id="el_store_intent_issue_TidNo">
<input type="text" data-table="store_intent_issue" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?php echo HtmlEncode($store_intent_issue_add->TidNo->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_add->TidNo->EditValue ?>"<?php echo $store_intent_issue_add->TidNo->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_add->TidNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_add->CId->Visible) { // CId ?>
	<div id="r_CId" class="form-group row">
		<label id="elh_store_intent_issue_CId" for="x_CId" class="<?php echo $store_intent_issue_add->LeftColumnClass ?>"><?php echo $store_intent_issue_add->CId->caption() ?><?php echo $store_intent_issue_add->CId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_add->RightColumnClass ?>"><div <?php echo $store_intent_issue_add->CId->cellAttributes() ?>>
<span id="el_store_intent_issue_CId">
<input type="text" data-table="store_intent_issue" data-field="x_CId" name="x_CId" id="x_CId" size="30" placeholder="<?php echo HtmlEncode($store_intent_issue_add->CId->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_add->CId->EditValue ?>"<?php echo $store_intent_issue_add->CId->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_add->CId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_add->PartnerName->Visible) { // PartnerName ?>
	<div id="r_PartnerName" class="form-group row">
		<label id="elh_store_intent_issue_PartnerName" for="x_PartnerName" class="<?php echo $store_intent_issue_add->LeftColumnClass ?>"><?php echo $store_intent_issue_add->PartnerName->caption() ?><?php echo $store_intent_issue_add->PartnerName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_add->RightColumnClass ?>"><div <?php echo $store_intent_issue_add->PartnerName->cellAttributes() ?>>
<span id="el_store_intent_issue_PartnerName">
<input type="text" data-table="store_intent_issue" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue_add->PartnerName->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_add->PartnerName->EditValue ?>"<?php echo $store_intent_issue_add->PartnerName->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_add->PartnerName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_add->PayerType->Visible) { // PayerType ?>
	<div id="r_PayerType" class="form-group row">
		<label id="elh_store_intent_issue_PayerType" for="x_PayerType" class="<?php echo $store_intent_issue_add->LeftColumnClass ?>"><?php echo $store_intent_issue_add->PayerType->caption() ?><?php echo $store_intent_issue_add->PayerType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_add->RightColumnClass ?>"><div <?php echo $store_intent_issue_add->PayerType->cellAttributes() ?>>
<span id="el_store_intent_issue_PayerType">
<input type="text" data-table="store_intent_issue" data-field="x_PayerType" name="x_PayerType" id="x_PayerType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue_add->PayerType->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_add->PayerType->EditValue ?>"<?php echo $store_intent_issue_add->PayerType->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_add->PayerType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_add->Dob->Visible) { // Dob ?>
	<div id="r_Dob" class="form-group row">
		<label id="elh_store_intent_issue_Dob" for="x_Dob" class="<?php echo $store_intent_issue_add->LeftColumnClass ?>"><?php echo $store_intent_issue_add->Dob->caption() ?><?php echo $store_intent_issue_add->Dob->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_add->RightColumnClass ?>"><div <?php echo $store_intent_issue_add->Dob->cellAttributes() ?>>
<span id="el_store_intent_issue_Dob">
<input type="text" data-table="store_intent_issue" data-field="x_Dob" name="x_Dob" id="x_Dob" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue_add->Dob->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_add->Dob->EditValue ?>"<?php echo $store_intent_issue_add->Dob->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_add->Dob->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_add->Currency->Visible) { // Currency ?>
	<div id="r_Currency" class="form-group row">
		<label id="elh_store_intent_issue_Currency" for="x_Currency" class="<?php echo $store_intent_issue_add->LeftColumnClass ?>"><?php echo $store_intent_issue_add->Currency->caption() ?><?php echo $store_intent_issue_add->Currency->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_add->RightColumnClass ?>"><div <?php echo $store_intent_issue_add->Currency->cellAttributes() ?>>
<span id="el_store_intent_issue_Currency">
<input type="text" data-table="store_intent_issue" data-field="x_Currency" name="x_Currency" id="x_Currency" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue_add->Currency->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_add->Currency->EditValue ?>"<?php echo $store_intent_issue_add->Currency->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_add->Currency->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_add->DiscountRemarks->Visible) { // DiscountRemarks ?>
	<div id="r_DiscountRemarks" class="form-group row">
		<label id="elh_store_intent_issue_DiscountRemarks" for="x_DiscountRemarks" class="<?php echo $store_intent_issue_add->LeftColumnClass ?>"><?php echo $store_intent_issue_add->DiscountRemarks->caption() ?><?php echo $store_intent_issue_add->DiscountRemarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_add->RightColumnClass ?>"><div <?php echo $store_intent_issue_add->DiscountRemarks->cellAttributes() ?>>
<span id="el_store_intent_issue_DiscountRemarks">
<input type="text" data-table="store_intent_issue" data-field="x_DiscountRemarks" name="x_DiscountRemarks" id="x_DiscountRemarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue_add->DiscountRemarks->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_add->DiscountRemarks->EditValue ?>"<?php echo $store_intent_issue_add->DiscountRemarks->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_add->DiscountRemarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_add->Remarks->Visible) { // Remarks ?>
	<div id="r_Remarks" class="form-group row">
		<label id="elh_store_intent_issue_Remarks" for="x_Remarks" class="<?php echo $store_intent_issue_add->LeftColumnClass ?>"><?php echo $store_intent_issue_add->Remarks->caption() ?><?php echo $store_intent_issue_add->Remarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_add->RightColumnClass ?>"><div <?php echo $store_intent_issue_add->Remarks->cellAttributes() ?>>
<span id="el_store_intent_issue_Remarks">
<input type="text" data-table="store_intent_issue" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue_add->Remarks->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_add->Remarks->EditValue ?>"<?php echo $store_intent_issue_add->Remarks->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_add->Remarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_add->PatId->Visible) { // PatId ?>
	<div id="r_PatId" class="form-group row">
		<label id="elh_store_intent_issue_PatId" for="x_PatId" class="<?php echo $store_intent_issue_add->LeftColumnClass ?>"><?php echo $store_intent_issue_add->PatId->caption() ?><?php echo $store_intent_issue_add->PatId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_add->RightColumnClass ?>"><div <?php echo $store_intent_issue_add->PatId->cellAttributes() ?>>
<span id="el_store_intent_issue_PatId">
<input type="text" data-table="store_intent_issue" data-field="x_PatId" name="x_PatId" id="x_PatId" size="30" placeholder="<?php echo HtmlEncode($store_intent_issue_add->PatId->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_add->PatId->EditValue ?>"<?php echo $store_intent_issue_add->PatId->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_add->PatId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_add->DrDepartment->Visible) { // DrDepartment ?>
	<div id="r_DrDepartment" class="form-group row">
		<label id="elh_store_intent_issue_DrDepartment" for="x_DrDepartment" class="<?php echo $store_intent_issue_add->LeftColumnClass ?>"><?php echo $store_intent_issue_add->DrDepartment->caption() ?><?php echo $store_intent_issue_add->DrDepartment->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_add->RightColumnClass ?>"><div <?php echo $store_intent_issue_add->DrDepartment->cellAttributes() ?>>
<span id="el_store_intent_issue_DrDepartment">
<input type="text" data-table="store_intent_issue" data-field="x_DrDepartment" name="x_DrDepartment" id="x_DrDepartment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue_add->DrDepartment->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_add->DrDepartment->EditValue ?>"<?php echo $store_intent_issue_add->DrDepartment->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_add->DrDepartment->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_add->RefferedBy->Visible) { // RefferedBy ?>
	<div id="r_RefferedBy" class="form-group row">
		<label id="elh_store_intent_issue_RefferedBy" for="x_RefferedBy" class="<?php echo $store_intent_issue_add->LeftColumnClass ?>"><?php echo $store_intent_issue_add->RefferedBy->caption() ?><?php echo $store_intent_issue_add->RefferedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_add->RightColumnClass ?>"><div <?php echo $store_intent_issue_add->RefferedBy->cellAttributes() ?>>
<span id="el_store_intent_issue_RefferedBy">
<input type="text" data-table="store_intent_issue" data-field="x_RefferedBy" name="x_RefferedBy" id="x_RefferedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue_add->RefferedBy->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_add->RefferedBy->EditValue ?>"<?php echo $store_intent_issue_add->RefferedBy->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_add->RefferedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_add->BillNumber->Visible) { // BillNumber ?>
	<div id="r_BillNumber" class="form-group row">
		<label id="elh_store_intent_issue_BillNumber" for="x_BillNumber" class="<?php echo $store_intent_issue_add->LeftColumnClass ?>"><?php echo $store_intent_issue_add->BillNumber->caption() ?><?php echo $store_intent_issue_add->BillNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_add->RightColumnClass ?>"><div <?php echo $store_intent_issue_add->BillNumber->cellAttributes() ?>>
<span id="el_store_intent_issue_BillNumber">
<input type="text" data-table="store_intent_issue" data-field="x_BillNumber" name="x_BillNumber" id="x_BillNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue_add->BillNumber->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_add->BillNumber->EditValue ?>"<?php echo $store_intent_issue_add->BillNumber->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_add->BillNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_add->CardNumber->Visible) { // CardNumber ?>
	<div id="r_CardNumber" class="form-group row">
		<label id="elh_store_intent_issue_CardNumber" for="x_CardNumber" class="<?php echo $store_intent_issue_add->LeftColumnClass ?>"><?php echo $store_intent_issue_add->CardNumber->caption() ?><?php echo $store_intent_issue_add->CardNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_add->RightColumnClass ?>"><div <?php echo $store_intent_issue_add->CardNumber->cellAttributes() ?>>
<span id="el_store_intent_issue_CardNumber">
<input type="text" data-table="store_intent_issue" data-field="x_CardNumber" name="x_CardNumber" id="x_CardNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue_add->CardNumber->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_add->CardNumber->EditValue ?>"<?php echo $store_intent_issue_add->CardNumber->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_add->CardNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_add->BankName->Visible) { // BankName ?>
	<div id="r_BankName" class="form-group row">
		<label id="elh_store_intent_issue_BankName" for="x_BankName" class="<?php echo $store_intent_issue_add->LeftColumnClass ?>"><?php echo $store_intent_issue_add->BankName->caption() ?><?php echo $store_intent_issue_add->BankName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_add->RightColumnClass ?>"><div <?php echo $store_intent_issue_add->BankName->cellAttributes() ?>>
<span id="el_store_intent_issue_BankName">
<input type="text" data-table="store_intent_issue" data-field="x_BankName" name="x_BankName" id="x_BankName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue_add->BankName->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_add->BankName->EditValue ?>"<?php echo $store_intent_issue_add->BankName->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_add->BankName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_add->DrID->Visible) { // DrID ?>
	<div id="r_DrID" class="form-group row">
		<label id="elh_store_intent_issue_DrID" for="x_DrID" class="<?php echo $store_intent_issue_add->LeftColumnClass ?>"><?php echo $store_intent_issue_add->DrID->caption() ?><?php echo $store_intent_issue_add->DrID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_add->RightColumnClass ?>"><div <?php echo $store_intent_issue_add->DrID->cellAttributes() ?>>
<span id="el_store_intent_issue_DrID">
<input type="text" data-table="store_intent_issue" data-field="x_DrID" name="x_DrID" id="x_DrID" size="30" placeholder="<?php echo HtmlEncode($store_intent_issue_add->DrID->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_add->DrID->EditValue ?>"<?php echo $store_intent_issue_add->DrID->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_add->DrID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_add->BillStatus->Visible) { // BillStatus ?>
	<div id="r_BillStatus" class="form-group row">
		<label id="elh_store_intent_issue_BillStatus" for="x_BillStatus" class="<?php echo $store_intent_issue_add->LeftColumnClass ?>"><?php echo $store_intent_issue_add->BillStatus->caption() ?><?php echo $store_intent_issue_add->BillStatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_add->RightColumnClass ?>"><div <?php echo $store_intent_issue_add->BillStatus->cellAttributes() ?>>
<span id="el_store_intent_issue_BillStatus">
<input type="text" data-table="store_intent_issue" data-field="x_BillStatus" name="x_BillStatus" id="x_BillStatus" size="30" placeholder="<?php echo HtmlEncode($store_intent_issue_add->BillStatus->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_add->BillStatus->EditValue ?>"<?php echo $store_intent_issue_add->BillStatus->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_add->BillStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_add->ReportHeader->Visible) { // ReportHeader ?>
	<div id="r_ReportHeader" class="form-group row">
		<label id="elh_store_intent_issue_ReportHeader" for="x_ReportHeader" class="<?php echo $store_intent_issue_add->LeftColumnClass ?>"><?php echo $store_intent_issue_add->ReportHeader->caption() ?><?php echo $store_intent_issue_add->ReportHeader->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_add->RightColumnClass ?>"><div <?php echo $store_intent_issue_add->ReportHeader->cellAttributes() ?>>
<span id="el_store_intent_issue_ReportHeader">
<input type="text" data-table="store_intent_issue" data-field="x_ReportHeader" name="x_ReportHeader" id="x_ReportHeader" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue_add->ReportHeader->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_add->ReportHeader->EditValue ?>"<?php echo $store_intent_issue_add->ReportHeader->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_add->ReportHeader->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_add->PharID->Visible) { // PharID ?>
	<div id="r_PharID" class="form-group row">
		<label id="elh_store_intent_issue_PharID" for="x_PharID" class="<?php echo $store_intent_issue_add->LeftColumnClass ?>"><?php echo $store_intent_issue_add->PharID->caption() ?><?php echo $store_intent_issue_add->PharID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_add->RightColumnClass ?>"><div <?php echo $store_intent_issue_add->PharID->cellAttributes() ?>>
<span id="el_store_intent_issue_PharID">
<input type="text" data-table="store_intent_issue" data-field="x_PharID" name="x_PharID" id="x_PharID" size="30" placeholder="<?php echo HtmlEncode($store_intent_issue_add->PharID->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_add->PharID->EditValue ?>"<?php echo $store_intent_issue_add->PharID->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_add->PharID->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$store_intent_issue_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $store_intent_issue_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $store_intent_issue_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$store_intent_issue_add->showPageFooter();
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
$store_intent_issue_add->terminate();
?>