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
$store_intent_issue_edit = new store_intent_issue_edit();

// Run the page
$store_intent_issue_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$store_intent_issue_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fstore_intent_issueedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fstore_intent_issueedit = currentForm = new ew.Form("fstore_intent_issueedit", "edit");

	// Validate form
	fstore_intent_issueedit.validate = function() {
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
			<?php if ($store_intent_issue_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_edit->id->caption(), $store_intent_issue_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_intent_issue_edit->Reception->Required) { ?>
				elm = this.getElements("x" + infix + "_Reception");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_edit->Reception->caption(), $store_intent_issue_edit->Reception->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Reception");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_intent_issue_edit->Reception->errorMessage()) ?>");
			<?php if ($store_intent_issue_edit->PatientId->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_edit->PatientId->caption(), $store_intent_issue_edit->PatientId->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_intent_issue_edit->mrnno->Required) { ?>
				elm = this.getElements("x" + infix + "_mrnno");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_edit->mrnno->caption(), $store_intent_issue_edit->mrnno->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_intent_issue_edit->PatientName->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_edit->PatientName->caption(), $store_intent_issue_edit->PatientName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_intent_issue_edit->Age->Required) { ?>
				elm = this.getElements("x" + infix + "_Age");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_edit->Age->caption(), $store_intent_issue_edit->Age->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_intent_issue_edit->Gender->Required) { ?>
				elm = this.getElements("x" + infix + "_Gender");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_edit->Gender->caption(), $store_intent_issue_edit->Gender->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_intent_issue_edit->profilePic->Required) { ?>
				elm = this.getElements("x" + infix + "_profilePic");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_edit->profilePic->caption(), $store_intent_issue_edit->profilePic->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_intent_issue_edit->Mobile->Required) { ?>
				elm = this.getElements("x" + infix + "_Mobile");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_edit->Mobile->caption(), $store_intent_issue_edit->Mobile->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_intent_issue_edit->IP_OP->Required) { ?>
				elm = this.getElements("x" + infix + "_IP_OP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_edit->IP_OP->caption(), $store_intent_issue_edit->IP_OP->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_intent_issue_edit->Doctor->Required) { ?>
				elm = this.getElements("x" + infix + "_Doctor");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_edit->Doctor->caption(), $store_intent_issue_edit->Doctor->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_intent_issue_edit->voucher_type->Required) { ?>
				elm = this.getElements("x" + infix + "_voucher_type");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_edit->voucher_type->caption(), $store_intent_issue_edit->voucher_type->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_intent_issue_edit->Details->Required) { ?>
				elm = this.getElements("x" + infix + "_Details");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_edit->Details->caption(), $store_intent_issue_edit->Details->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_intent_issue_edit->ModeofPayment->Required) { ?>
				elm = this.getElements("x" + infix + "_ModeofPayment");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_edit->ModeofPayment->caption(), $store_intent_issue_edit->ModeofPayment->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_intent_issue_edit->Amount->Required) { ?>
				elm = this.getElements("x" + infix + "_Amount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_edit->Amount->caption(), $store_intent_issue_edit->Amount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Amount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_intent_issue_edit->Amount->errorMessage()) ?>");
			<?php if ($store_intent_issue_edit->AnyDues->Required) { ?>
				elm = this.getElements("x" + infix + "_AnyDues");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_edit->AnyDues->caption(), $store_intent_issue_edit->AnyDues->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_intent_issue_edit->createdby->Required) { ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_edit->createdby->caption(), $store_intent_issue_edit->createdby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_intent_issue_edit->createddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_edit->createddatetime->caption(), $store_intent_issue_edit->createddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_intent_issue_edit->createddatetime->errorMessage()) ?>");
			<?php if ($store_intent_issue_edit->modifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_edit->modifiedby->caption(), $store_intent_issue_edit->modifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_intent_issue_edit->modifieddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_edit->modifieddatetime->caption(), $store_intent_issue_edit->modifieddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_intent_issue_edit->modifieddatetime->errorMessage()) ?>");
			<?php if ($store_intent_issue_edit->RealizationAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_RealizationAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_edit->RealizationAmount->caption(), $store_intent_issue_edit->RealizationAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RealizationAmount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_intent_issue_edit->RealizationAmount->errorMessage()) ?>");
			<?php if ($store_intent_issue_edit->RealizationStatus->Required) { ?>
				elm = this.getElements("x" + infix + "_RealizationStatus");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_edit->RealizationStatus->caption(), $store_intent_issue_edit->RealizationStatus->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_intent_issue_edit->RealizationRemarks->Required) { ?>
				elm = this.getElements("x" + infix + "_RealizationRemarks");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_edit->RealizationRemarks->caption(), $store_intent_issue_edit->RealizationRemarks->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_intent_issue_edit->RealizationBatchNo->Required) { ?>
				elm = this.getElements("x" + infix + "_RealizationBatchNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_edit->RealizationBatchNo->caption(), $store_intent_issue_edit->RealizationBatchNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_intent_issue_edit->RealizationDate->Required) { ?>
				elm = this.getElements("x" + infix + "_RealizationDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_edit->RealizationDate->caption(), $store_intent_issue_edit->RealizationDate->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_intent_issue_edit->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_edit->HospID->caption(), $store_intent_issue_edit->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_intent_issue_edit->HospID->errorMessage()) ?>");
			<?php if ($store_intent_issue_edit->RIDNO->Required) { ?>
				elm = this.getElements("x" + infix + "_RIDNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_edit->RIDNO->caption(), $store_intent_issue_edit->RIDNO->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RIDNO");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_intent_issue_edit->RIDNO->errorMessage()) ?>");
			<?php if ($store_intent_issue_edit->TidNo->Required) { ?>
				elm = this.getElements("x" + infix + "_TidNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_edit->TidNo->caption(), $store_intent_issue_edit->TidNo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TidNo");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_intent_issue_edit->TidNo->errorMessage()) ?>");
			<?php if ($store_intent_issue_edit->CId->Required) { ?>
				elm = this.getElements("x" + infix + "_CId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_edit->CId->caption(), $store_intent_issue_edit->CId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_CId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_intent_issue_edit->CId->errorMessage()) ?>");
			<?php if ($store_intent_issue_edit->PartnerName->Required) { ?>
				elm = this.getElements("x" + infix + "_PartnerName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_edit->PartnerName->caption(), $store_intent_issue_edit->PartnerName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_intent_issue_edit->PayerType->Required) { ?>
				elm = this.getElements("x" + infix + "_PayerType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_edit->PayerType->caption(), $store_intent_issue_edit->PayerType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_intent_issue_edit->Dob->Required) { ?>
				elm = this.getElements("x" + infix + "_Dob");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_edit->Dob->caption(), $store_intent_issue_edit->Dob->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_intent_issue_edit->Currency->Required) { ?>
				elm = this.getElements("x" + infix + "_Currency");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_edit->Currency->caption(), $store_intent_issue_edit->Currency->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_intent_issue_edit->DiscountRemarks->Required) { ?>
				elm = this.getElements("x" + infix + "_DiscountRemarks");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_edit->DiscountRemarks->caption(), $store_intent_issue_edit->DiscountRemarks->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_intent_issue_edit->Remarks->Required) { ?>
				elm = this.getElements("x" + infix + "_Remarks");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_edit->Remarks->caption(), $store_intent_issue_edit->Remarks->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_intent_issue_edit->PatId->Required) { ?>
				elm = this.getElements("x" + infix + "_PatId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_edit->PatId->caption(), $store_intent_issue_edit->PatId->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PatId");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_intent_issue_edit->PatId->errorMessage()) ?>");
			<?php if ($store_intent_issue_edit->DrDepartment->Required) { ?>
				elm = this.getElements("x" + infix + "_DrDepartment");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_edit->DrDepartment->caption(), $store_intent_issue_edit->DrDepartment->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_intent_issue_edit->RefferedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_RefferedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_edit->RefferedBy->caption(), $store_intent_issue_edit->RefferedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_intent_issue_edit->BillNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_BillNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_edit->BillNumber->caption(), $store_intent_issue_edit->BillNumber->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_intent_issue_edit->CardNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_CardNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_edit->CardNumber->caption(), $store_intent_issue_edit->CardNumber->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_intent_issue_edit->BankName->Required) { ?>
				elm = this.getElements("x" + infix + "_BankName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_edit->BankName->caption(), $store_intent_issue_edit->BankName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_intent_issue_edit->DrID->Required) { ?>
				elm = this.getElements("x" + infix + "_DrID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_edit->DrID->caption(), $store_intent_issue_edit->DrID->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DrID");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_intent_issue_edit->DrID->errorMessage()) ?>");
			<?php if ($store_intent_issue_edit->BillStatus->Required) { ?>
				elm = this.getElements("x" + infix + "_BillStatus");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_edit->BillStatus->caption(), $store_intent_issue_edit->BillStatus->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BillStatus");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_intent_issue_edit->BillStatus->errorMessage()) ?>");
			<?php if ($store_intent_issue_edit->ReportHeader->Required) { ?>
				elm = this.getElements("x" + infix + "_ReportHeader");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_edit->ReportHeader->caption(), $store_intent_issue_edit->ReportHeader->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($store_intent_issue_edit->PharID->Required) { ?>
				elm = this.getElements("x" + infix + "_PharID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue_edit->PharID->caption(), $store_intent_issue_edit->PharID->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PharID");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($store_intent_issue_edit->PharID->errorMessage()) ?>");

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
	fstore_intent_issueedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fstore_intent_issueedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fstore_intent_issueedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $store_intent_issue_edit->showPageHeader(); ?>
<?php
$store_intent_issue_edit->showMessage();
?>
<form name="fstore_intent_issueedit" id="fstore_intent_issueedit" class="<?php echo $store_intent_issue_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="store_intent_issue">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$store_intent_issue_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($store_intent_issue_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_store_intent_issue_id" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue_edit->id->caption() ?><?php echo $store_intent_issue_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div <?php echo $store_intent_issue_edit->id->cellAttributes() ?>>
<span id="el_store_intent_issue_id">
<span<?php echo $store_intent_issue_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($store_intent_issue_edit->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="store_intent_issue" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($store_intent_issue_edit->id->CurrentValue) ?>">
<?php echo $store_intent_issue_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_edit->Reception->Visible) { // Reception ?>
	<div id="r_Reception" class="form-group row">
		<label id="elh_store_intent_issue_Reception" for="x_Reception" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue_edit->Reception->caption() ?><?php echo $store_intent_issue_edit->Reception->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div <?php echo $store_intent_issue_edit->Reception->cellAttributes() ?>>
<span id="el_store_intent_issue_Reception">
<input type="text" data-table="store_intent_issue" data-field="x_Reception" name="x_Reception" id="x_Reception" size="30" placeholder="<?php echo HtmlEncode($store_intent_issue_edit->Reception->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_edit->Reception->EditValue ?>"<?php echo $store_intent_issue_edit->Reception->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_edit->Reception->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_edit->PatientId->Visible) { // PatientId ?>
	<div id="r_PatientId" class="form-group row">
		<label id="elh_store_intent_issue_PatientId" for="x_PatientId" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue_edit->PatientId->caption() ?><?php echo $store_intent_issue_edit->PatientId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div <?php echo $store_intent_issue_edit->PatientId->cellAttributes() ?>>
<span id="el_store_intent_issue_PatientId">
<input type="text" data-table="store_intent_issue" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue_edit->PatientId->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_edit->PatientId->EditValue ?>"<?php echo $store_intent_issue_edit->PatientId->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_edit->PatientId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_edit->mrnno->Visible) { // mrnno ?>
	<div id="r_mrnno" class="form-group row">
		<label id="elh_store_intent_issue_mrnno" for="x_mrnno" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue_edit->mrnno->caption() ?><?php echo $store_intent_issue_edit->mrnno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div <?php echo $store_intent_issue_edit->mrnno->cellAttributes() ?>>
<span id="el_store_intent_issue_mrnno">
<input type="text" data-table="store_intent_issue" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue_edit->mrnno->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_edit->mrnno->EditValue ?>"<?php echo $store_intent_issue_edit->mrnno->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_edit->mrnno->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_edit->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label id="elh_store_intent_issue_PatientName" for="x_PatientName" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue_edit->PatientName->caption() ?><?php echo $store_intent_issue_edit->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div <?php echo $store_intent_issue_edit->PatientName->cellAttributes() ?>>
<span id="el_store_intent_issue_PatientName">
<input type="text" data-table="store_intent_issue" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue_edit->PatientName->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_edit->PatientName->EditValue ?>"<?php echo $store_intent_issue_edit->PatientName->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_edit->PatientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_edit->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label id="elh_store_intent_issue_Age" for="x_Age" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue_edit->Age->caption() ?><?php echo $store_intent_issue_edit->Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div <?php echo $store_intent_issue_edit->Age->cellAttributes() ?>>
<span id="el_store_intent_issue_Age">
<input type="text" data-table="store_intent_issue" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue_edit->Age->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_edit->Age->EditValue ?>"<?php echo $store_intent_issue_edit->Age->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_edit->Age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_edit->Gender->Visible) { // Gender ?>
	<div id="r_Gender" class="form-group row">
		<label id="elh_store_intent_issue_Gender" for="x_Gender" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue_edit->Gender->caption() ?><?php echo $store_intent_issue_edit->Gender->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div <?php echo $store_intent_issue_edit->Gender->cellAttributes() ?>>
<span id="el_store_intent_issue_Gender">
<input type="text" data-table="store_intent_issue" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue_edit->Gender->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_edit->Gender->EditValue ?>"<?php echo $store_intent_issue_edit->Gender->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_edit->Gender->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_edit->profilePic->Visible) { // profilePic ?>
	<div id="r_profilePic" class="form-group row">
		<label id="elh_store_intent_issue_profilePic" for="x_profilePic" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue_edit->profilePic->caption() ?><?php echo $store_intent_issue_edit->profilePic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div <?php echo $store_intent_issue_edit->profilePic->cellAttributes() ?>>
<span id="el_store_intent_issue_profilePic">
<textarea data-table="store_intent_issue" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" cols="35" rows="4" placeholder="<?php echo HtmlEncode($store_intent_issue_edit->profilePic->getPlaceHolder()) ?>"<?php echo $store_intent_issue_edit->profilePic->editAttributes() ?>><?php echo $store_intent_issue_edit->profilePic->EditValue ?></textarea>
</span>
<?php echo $store_intent_issue_edit->profilePic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_edit->Mobile->Visible) { // Mobile ?>
	<div id="r_Mobile" class="form-group row">
		<label id="elh_store_intent_issue_Mobile" for="x_Mobile" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue_edit->Mobile->caption() ?><?php echo $store_intent_issue_edit->Mobile->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div <?php echo $store_intent_issue_edit->Mobile->cellAttributes() ?>>
<span id="el_store_intent_issue_Mobile">
<input type="text" data-table="store_intent_issue" data-field="x_Mobile" name="x_Mobile" id="x_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue_edit->Mobile->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_edit->Mobile->EditValue ?>"<?php echo $store_intent_issue_edit->Mobile->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_edit->Mobile->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_edit->IP_OP->Visible) { // IP_OP ?>
	<div id="r_IP_OP" class="form-group row">
		<label id="elh_store_intent_issue_IP_OP" for="x_IP_OP" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue_edit->IP_OP->caption() ?><?php echo $store_intent_issue_edit->IP_OP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div <?php echo $store_intent_issue_edit->IP_OP->cellAttributes() ?>>
<span id="el_store_intent_issue_IP_OP">
<input type="text" data-table="store_intent_issue" data-field="x_IP_OP" name="x_IP_OP" id="x_IP_OP" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue_edit->IP_OP->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_edit->IP_OP->EditValue ?>"<?php echo $store_intent_issue_edit->IP_OP->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_edit->IP_OP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_edit->Doctor->Visible) { // Doctor ?>
	<div id="r_Doctor" class="form-group row">
		<label id="elh_store_intent_issue_Doctor" for="x_Doctor" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue_edit->Doctor->caption() ?><?php echo $store_intent_issue_edit->Doctor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div <?php echo $store_intent_issue_edit->Doctor->cellAttributes() ?>>
<span id="el_store_intent_issue_Doctor">
<input type="text" data-table="store_intent_issue" data-field="x_Doctor" name="x_Doctor" id="x_Doctor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue_edit->Doctor->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_edit->Doctor->EditValue ?>"<?php echo $store_intent_issue_edit->Doctor->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_edit->Doctor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_edit->voucher_type->Visible) { // voucher_type ?>
	<div id="r_voucher_type" class="form-group row">
		<label id="elh_store_intent_issue_voucher_type" for="x_voucher_type" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue_edit->voucher_type->caption() ?><?php echo $store_intent_issue_edit->voucher_type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div <?php echo $store_intent_issue_edit->voucher_type->cellAttributes() ?>>
<span id="el_store_intent_issue_voucher_type">
<input type="text" data-table="store_intent_issue" data-field="x_voucher_type" name="x_voucher_type" id="x_voucher_type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue_edit->voucher_type->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_edit->voucher_type->EditValue ?>"<?php echo $store_intent_issue_edit->voucher_type->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_edit->voucher_type->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_edit->Details->Visible) { // Details ?>
	<div id="r_Details" class="form-group row">
		<label id="elh_store_intent_issue_Details" for="x_Details" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue_edit->Details->caption() ?><?php echo $store_intent_issue_edit->Details->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div <?php echo $store_intent_issue_edit->Details->cellAttributes() ?>>
<span id="el_store_intent_issue_Details">
<input type="text" data-table="store_intent_issue" data-field="x_Details" name="x_Details" id="x_Details" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue_edit->Details->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_edit->Details->EditValue ?>"<?php echo $store_intent_issue_edit->Details->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_edit->Details->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_edit->ModeofPayment->Visible) { // ModeofPayment ?>
	<div id="r_ModeofPayment" class="form-group row">
		<label id="elh_store_intent_issue_ModeofPayment" for="x_ModeofPayment" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue_edit->ModeofPayment->caption() ?><?php echo $store_intent_issue_edit->ModeofPayment->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div <?php echo $store_intent_issue_edit->ModeofPayment->cellAttributes() ?>>
<span id="el_store_intent_issue_ModeofPayment">
<input type="text" data-table="store_intent_issue" data-field="x_ModeofPayment" name="x_ModeofPayment" id="x_ModeofPayment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue_edit->ModeofPayment->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_edit->ModeofPayment->EditValue ?>"<?php echo $store_intent_issue_edit->ModeofPayment->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_edit->ModeofPayment->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_edit->Amount->Visible) { // Amount ?>
	<div id="r_Amount" class="form-group row">
		<label id="elh_store_intent_issue_Amount" for="x_Amount" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue_edit->Amount->caption() ?><?php echo $store_intent_issue_edit->Amount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div <?php echo $store_intent_issue_edit->Amount->cellAttributes() ?>>
<span id="el_store_intent_issue_Amount">
<input type="text" data-table="store_intent_issue" data-field="x_Amount" name="x_Amount" id="x_Amount" size="30" placeholder="<?php echo HtmlEncode($store_intent_issue_edit->Amount->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_edit->Amount->EditValue ?>"<?php echo $store_intent_issue_edit->Amount->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_edit->Amount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_edit->AnyDues->Visible) { // AnyDues ?>
	<div id="r_AnyDues" class="form-group row">
		<label id="elh_store_intent_issue_AnyDues" for="x_AnyDues" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue_edit->AnyDues->caption() ?><?php echo $store_intent_issue_edit->AnyDues->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div <?php echo $store_intent_issue_edit->AnyDues->cellAttributes() ?>>
<span id="el_store_intent_issue_AnyDues">
<input type="text" data-table="store_intent_issue" data-field="x_AnyDues" name="x_AnyDues" id="x_AnyDues" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue_edit->AnyDues->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_edit->AnyDues->EditValue ?>"<?php echo $store_intent_issue_edit->AnyDues->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_edit->AnyDues->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_edit->createdby->Visible) { // createdby ?>
	<div id="r_createdby" class="form-group row">
		<label id="elh_store_intent_issue_createdby" for="x_createdby" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue_edit->createdby->caption() ?><?php echo $store_intent_issue_edit->createdby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div <?php echo $store_intent_issue_edit->createdby->cellAttributes() ?>>
<span id="el_store_intent_issue_createdby">
<input type="text" data-table="store_intent_issue" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue_edit->createdby->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_edit->createdby->EditValue ?>"<?php echo $store_intent_issue_edit->createdby->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_edit->createdby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_edit->createddatetime->Visible) { // createddatetime ?>
	<div id="r_createddatetime" class="form-group row">
		<label id="elh_store_intent_issue_createddatetime" for="x_createddatetime" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue_edit->createddatetime->caption() ?><?php echo $store_intent_issue_edit->createddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div <?php echo $store_intent_issue_edit->createddatetime->cellAttributes() ?>>
<span id="el_store_intent_issue_createddatetime">
<input type="text" data-table="store_intent_issue" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?php echo HtmlEncode($store_intent_issue_edit->createddatetime->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_edit->createddatetime->EditValue ?>"<?php echo $store_intent_issue_edit->createddatetime->editAttributes() ?>>
<?php if (!$store_intent_issue_edit->createddatetime->ReadOnly && !$store_intent_issue_edit->createddatetime->Disabled && !isset($store_intent_issue_edit->createddatetime->EditAttrs["readonly"]) && !isset($store_intent_issue_edit->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fstore_intent_issueedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fstore_intent_issueedit", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $store_intent_issue_edit->createddatetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_edit->modifiedby->Visible) { // modifiedby ?>
	<div id="r_modifiedby" class="form-group row">
		<label id="elh_store_intent_issue_modifiedby" for="x_modifiedby" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue_edit->modifiedby->caption() ?><?php echo $store_intent_issue_edit->modifiedby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div <?php echo $store_intent_issue_edit->modifiedby->cellAttributes() ?>>
<span id="el_store_intent_issue_modifiedby">
<input type="text" data-table="store_intent_issue" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue_edit->modifiedby->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_edit->modifiedby->EditValue ?>"<?php echo $store_intent_issue_edit->modifiedby->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_edit->modifiedby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_edit->modifieddatetime->Visible) { // modifieddatetime ?>
	<div id="r_modifieddatetime" class="form-group row">
		<label id="elh_store_intent_issue_modifieddatetime" for="x_modifieddatetime" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue_edit->modifieddatetime->caption() ?><?php echo $store_intent_issue_edit->modifieddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div <?php echo $store_intent_issue_edit->modifieddatetime->cellAttributes() ?>>
<span id="el_store_intent_issue_modifieddatetime">
<input type="text" data-table="store_intent_issue" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?php echo HtmlEncode($store_intent_issue_edit->modifieddatetime->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_edit->modifieddatetime->EditValue ?>"<?php echo $store_intent_issue_edit->modifieddatetime->editAttributes() ?>>
<?php if (!$store_intent_issue_edit->modifieddatetime->ReadOnly && !$store_intent_issue_edit->modifieddatetime->Disabled && !isset($store_intent_issue_edit->modifieddatetime->EditAttrs["readonly"]) && !isset($store_intent_issue_edit->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fstore_intent_issueedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fstore_intent_issueedit", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $store_intent_issue_edit->modifieddatetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_edit->RealizationAmount->Visible) { // RealizationAmount ?>
	<div id="r_RealizationAmount" class="form-group row">
		<label id="elh_store_intent_issue_RealizationAmount" for="x_RealizationAmount" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue_edit->RealizationAmount->caption() ?><?php echo $store_intent_issue_edit->RealizationAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div <?php echo $store_intent_issue_edit->RealizationAmount->cellAttributes() ?>>
<span id="el_store_intent_issue_RealizationAmount">
<input type="text" data-table="store_intent_issue" data-field="x_RealizationAmount" name="x_RealizationAmount" id="x_RealizationAmount" size="30" placeholder="<?php echo HtmlEncode($store_intent_issue_edit->RealizationAmount->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_edit->RealizationAmount->EditValue ?>"<?php echo $store_intent_issue_edit->RealizationAmount->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_edit->RealizationAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_edit->RealizationStatus->Visible) { // RealizationStatus ?>
	<div id="r_RealizationStatus" class="form-group row">
		<label id="elh_store_intent_issue_RealizationStatus" for="x_RealizationStatus" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue_edit->RealizationStatus->caption() ?><?php echo $store_intent_issue_edit->RealizationStatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div <?php echo $store_intent_issue_edit->RealizationStatus->cellAttributes() ?>>
<span id="el_store_intent_issue_RealizationStatus">
<input type="text" data-table="store_intent_issue" data-field="x_RealizationStatus" name="x_RealizationStatus" id="x_RealizationStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue_edit->RealizationStatus->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_edit->RealizationStatus->EditValue ?>"<?php echo $store_intent_issue_edit->RealizationStatus->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_edit->RealizationStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_edit->RealizationRemarks->Visible) { // RealizationRemarks ?>
	<div id="r_RealizationRemarks" class="form-group row">
		<label id="elh_store_intent_issue_RealizationRemarks" for="x_RealizationRemarks" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue_edit->RealizationRemarks->caption() ?><?php echo $store_intent_issue_edit->RealizationRemarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div <?php echo $store_intent_issue_edit->RealizationRemarks->cellAttributes() ?>>
<span id="el_store_intent_issue_RealizationRemarks">
<input type="text" data-table="store_intent_issue" data-field="x_RealizationRemarks" name="x_RealizationRemarks" id="x_RealizationRemarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue_edit->RealizationRemarks->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_edit->RealizationRemarks->EditValue ?>"<?php echo $store_intent_issue_edit->RealizationRemarks->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_edit->RealizationRemarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_edit->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
	<div id="r_RealizationBatchNo" class="form-group row">
		<label id="elh_store_intent_issue_RealizationBatchNo" for="x_RealizationBatchNo" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue_edit->RealizationBatchNo->caption() ?><?php echo $store_intent_issue_edit->RealizationBatchNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div <?php echo $store_intent_issue_edit->RealizationBatchNo->cellAttributes() ?>>
<span id="el_store_intent_issue_RealizationBatchNo">
<input type="text" data-table="store_intent_issue" data-field="x_RealizationBatchNo" name="x_RealizationBatchNo" id="x_RealizationBatchNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue_edit->RealizationBatchNo->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_edit->RealizationBatchNo->EditValue ?>"<?php echo $store_intent_issue_edit->RealizationBatchNo->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_edit->RealizationBatchNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_edit->RealizationDate->Visible) { // RealizationDate ?>
	<div id="r_RealizationDate" class="form-group row">
		<label id="elh_store_intent_issue_RealizationDate" for="x_RealizationDate" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue_edit->RealizationDate->caption() ?><?php echo $store_intent_issue_edit->RealizationDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div <?php echo $store_intent_issue_edit->RealizationDate->cellAttributes() ?>>
<span id="el_store_intent_issue_RealizationDate">
<input type="text" data-table="store_intent_issue" data-field="x_RealizationDate" name="x_RealizationDate" id="x_RealizationDate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue_edit->RealizationDate->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_edit->RealizationDate->EditValue ?>"<?php echo $store_intent_issue_edit->RealizationDate->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_edit->RealizationDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_edit->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label id="elh_store_intent_issue_HospID" for="x_HospID" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue_edit->HospID->caption() ?><?php echo $store_intent_issue_edit->HospID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div <?php echo $store_intent_issue_edit->HospID->cellAttributes() ?>>
<span id="el_store_intent_issue_HospID">
<input type="text" data-table="store_intent_issue" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?php echo HtmlEncode($store_intent_issue_edit->HospID->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_edit->HospID->EditValue ?>"<?php echo $store_intent_issue_edit->HospID->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_edit->HospID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_edit->RIDNO->Visible) { // RIDNO ?>
	<div id="r_RIDNO" class="form-group row">
		<label id="elh_store_intent_issue_RIDNO" for="x_RIDNO" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue_edit->RIDNO->caption() ?><?php echo $store_intent_issue_edit->RIDNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div <?php echo $store_intent_issue_edit->RIDNO->cellAttributes() ?>>
<span id="el_store_intent_issue_RIDNO">
<input type="text" data-table="store_intent_issue" data-field="x_RIDNO" name="x_RIDNO" id="x_RIDNO" size="30" placeholder="<?php echo HtmlEncode($store_intent_issue_edit->RIDNO->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_edit->RIDNO->EditValue ?>"<?php echo $store_intent_issue_edit->RIDNO->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_edit->RIDNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_edit->TidNo->Visible) { // TidNo ?>
	<div id="r_TidNo" class="form-group row">
		<label id="elh_store_intent_issue_TidNo" for="x_TidNo" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue_edit->TidNo->caption() ?><?php echo $store_intent_issue_edit->TidNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div <?php echo $store_intent_issue_edit->TidNo->cellAttributes() ?>>
<span id="el_store_intent_issue_TidNo">
<input type="text" data-table="store_intent_issue" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?php echo HtmlEncode($store_intent_issue_edit->TidNo->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_edit->TidNo->EditValue ?>"<?php echo $store_intent_issue_edit->TidNo->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_edit->TidNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_edit->CId->Visible) { // CId ?>
	<div id="r_CId" class="form-group row">
		<label id="elh_store_intent_issue_CId" for="x_CId" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue_edit->CId->caption() ?><?php echo $store_intent_issue_edit->CId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div <?php echo $store_intent_issue_edit->CId->cellAttributes() ?>>
<span id="el_store_intent_issue_CId">
<input type="text" data-table="store_intent_issue" data-field="x_CId" name="x_CId" id="x_CId" size="30" placeholder="<?php echo HtmlEncode($store_intent_issue_edit->CId->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_edit->CId->EditValue ?>"<?php echo $store_intent_issue_edit->CId->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_edit->CId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_edit->PartnerName->Visible) { // PartnerName ?>
	<div id="r_PartnerName" class="form-group row">
		<label id="elh_store_intent_issue_PartnerName" for="x_PartnerName" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue_edit->PartnerName->caption() ?><?php echo $store_intent_issue_edit->PartnerName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div <?php echo $store_intent_issue_edit->PartnerName->cellAttributes() ?>>
<span id="el_store_intent_issue_PartnerName">
<input type="text" data-table="store_intent_issue" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue_edit->PartnerName->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_edit->PartnerName->EditValue ?>"<?php echo $store_intent_issue_edit->PartnerName->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_edit->PartnerName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_edit->PayerType->Visible) { // PayerType ?>
	<div id="r_PayerType" class="form-group row">
		<label id="elh_store_intent_issue_PayerType" for="x_PayerType" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue_edit->PayerType->caption() ?><?php echo $store_intent_issue_edit->PayerType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div <?php echo $store_intent_issue_edit->PayerType->cellAttributes() ?>>
<span id="el_store_intent_issue_PayerType">
<input type="text" data-table="store_intent_issue" data-field="x_PayerType" name="x_PayerType" id="x_PayerType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue_edit->PayerType->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_edit->PayerType->EditValue ?>"<?php echo $store_intent_issue_edit->PayerType->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_edit->PayerType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_edit->Dob->Visible) { // Dob ?>
	<div id="r_Dob" class="form-group row">
		<label id="elh_store_intent_issue_Dob" for="x_Dob" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue_edit->Dob->caption() ?><?php echo $store_intent_issue_edit->Dob->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div <?php echo $store_intent_issue_edit->Dob->cellAttributes() ?>>
<span id="el_store_intent_issue_Dob">
<input type="text" data-table="store_intent_issue" data-field="x_Dob" name="x_Dob" id="x_Dob" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue_edit->Dob->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_edit->Dob->EditValue ?>"<?php echo $store_intent_issue_edit->Dob->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_edit->Dob->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_edit->Currency->Visible) { // Currency ?>
	<div id="r_Currency" class="form-group row">
		<label id="elh_store_intent_issue_Currency" for="x_Currency" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue_edit->Currency->caption() ?><?php echo $store_intent_issue_edit->Currency->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div <?php echo $store_intent_issue_edit->Currency->cellAttributes() ?>>
<span id="el_store_intent_issue_Currency">
<input type="text" data-table="store_intent_issue" data-field="x_Currency" name="x_Currency" id="x_Currency" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue_edit->Currency->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_edit->Currency->EditValue ?>"<?php echo $store_intent_issue_edit->Currency->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_edit->Currency->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_edit->DiscountRemarks->Visible) { // DiscountRemarks ?>
	<div id="r_DiscountRemarks" class="form-group row">
		<label id="elh_store_intent_issue_DiscountRemarks" for="x_DiscountRemarks" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue_edit->DiscountRemarks->caption() ?><?php echo $store_intent_issue_edit->DiscountRemarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div <?php echo $store_intent_issue_edit->DiscountRemarks->cellAttributes() ?>>
<span id="el_store_intent_issue_DiscountRemarks">
<input type="text" data-table="store_intent_issue" data-field="x_DiscountRemarks" name="x_DiscountRemarks" id="x_DiscountRemarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue_edit->DiscountRemarks->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_edit->DiscountRemarks->EditValue ?>"<?php echo $store_intent_issue_edit->DiscountRemarks->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_edit->DiscountRemarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_edit->Remarks->Visible) { // Remarks ?>
	<div id="r_Remarks" class="form-group row">
		<label id="elh_store_intent_issue_Remarks" for="x_Remarks" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue_edit->Remarks->caption() ?><?php echo $store_intent_issue_edit->Remarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div <?php echo $store_intent_issue_edit->Remarks->cellAttributes() ?>>
<span id="el_store_intent_issue_Remarks">
<input type="text" data-table="store_intent_issue" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue_edit->Remarks->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_edit->Remarks->EditValue ?>"<?php echo $store_intent_issue_edit->Remarks->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_edit->Remarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_edit->PatId->Visible) { // PatId ?>
	<div id="r_PatId" class="form-group row">
		<label id="elh_store_intent_issue_PatId" for="x_PatId" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue_edit->PatId->caption() ?><?php echo $store_intent_issue_edit->PatId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div <?php echo $store_intent_issue_edit->PatId->cellAttributes() ?>>
<span id="el_store_intent_issue_PatId">
<input type="text" data-table="store_intent_issue" data-field="x_PatId" name="x_PatId" id="x_PatId" size="30" placeholder="<?php echo HtmlEncode($store_intent_issue_edit->PatId->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_edit->PatId->EditValue ?>"<?php echo $store_intent_issue_edit->PatId->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_edit->PatId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_edit->DrDepartment->Visible) { // DrDepartment ?>
	<div id="r_DrDepartment" class="form-group row">
		<label id="elh_store_intent_issue_DrDepartment" for="x_DrDepartment" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue_edit->DrDepartment->caption() ?><?php echo $store_intent_issue_edit->DrDepartment->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div <?php echo $store_intent_issue_edit->DrDepartment->cellAttributes() ?>>
<span id="el_store_intent_issue_DrDepartment">
<input type="text" data-table="store_intent_issue" data-field="x_DrDepartment" name="x_DrDepartment" id="x_DrDepartment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue_edit->DrDepartment->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_edit->DrDepartment->EditValue ?>"<?php echo $store_intent_issue_edit->DrDepartment->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_edit->DrDepartment->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_edit->RefferedBy->Visible) { // RefferedBy ?>
	<div id="r_RefferedBy" class="form-group row">
		<label id="elh_store_intent_issue_RefferedBy" for="x_RefferedBy" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue_edit->RefferedBy->caption() ?><?php echo $store_intent_issue_edit->RefferedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div <?php echo $store_intent_issue_edit->RefferedBy->cellAttributes() ?>>
<span id="el_store_intent_issue_RefferedBy">
<input type="text" data-table="store_intent_issue" data-field="x_RefferedBy" name="x_RefferedBy" id="x_RefferedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue_edit->RefferedBy->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_edit->RefferedBy->EditValue ?>"<?php echo $store_intent_issue_edit->RefferedBy->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_edit->RefferedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_edit->BillNumber->Visible) { // BillNumber ?>
	<div id="r_BillNumber" class="form-group row">
		<label id="elh_store_intent_issue_BillNumber" for="x_BillNumber" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue_edit->BillNumber->caption() ?><?php echo $store_intent_issue_edit->BillNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div <?php echo $store_intent_issue_edit->BillNumber->cellAttributes() ?>>
<span id="el_store_intent_issue_BillNumber">
<input type="text" data-table="store_intent_issue" data-field="x_BillNumber" name="x_BillNumber" id="x_BillNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue_edit->BillNumber->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_edit->BillNumber->EditValue ?>"<?php echo $store_intent_issue_edit->BillNumber->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_edit->BillNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_edit->CardNumber->Visible) { // CardNumber ?>
	<div id="r_CardNumber" class="form-group row">
		<label id="elh_store_intent_issue_CardNumber" for="x_CardNumber" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue_edit->CardNumber->caption() ?><?php echo $store_intent_issue_edit->CardNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div <?php echo $store_intent_issue_edit->CardNumber->cellAttributes() ?>>
<span id="el_store_intent_issue_CardNumber">
<input type="text" data-table="store_intent_issue" data-field="x_CardNumber" name="x_CardNumber" id="x_CardNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue_edit->CardNumber->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_edit->CardNumber->EditValue ?>"<?php echo $store_intent_issue_edit->CardNumber->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_edit->CardNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_edit->BankName->Visible) { // BankName ?>
	<div id="r_BankName" class="form-group row">
		<label id="elh_store_intent_issue_BankName" for="x_BankName" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue_edit->BankName->caption() ?><?php echo $store_intent_issue_edit->BankName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div <?php echo $store_intent_issue_edit->BankName->cellAttributes() ?>>
<span id="el_store_intent_issue_BankName">
<input type="text" data-table="store_intent_issue" data-field="x_BankName" name="x_BankName" id="x_BankName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue_edit->BankName->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_edit->BankName->EditValue ?>"<?php echo $store_intent_issue_edit->BankName->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_edit->BankName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_edit->DrID->Visible) { // DrID ?>
	<div id="r_DrID" class="form-group row">
		<label id="elh_store_intent_issue_DrID" for="x_DrID" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue_edit->DrID->caption() ?><?php echo $store_intent_issue_edit->DrID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div <?php echo $store_intent_issue_edit->DrID->cellAttributes() ?>>
<span id="el_store_intent_issue_DrID">
<input type="text" data-table="store_intent_issue" data-field="x_DrID" name="x_DrID" id="x_DrID" size="30" placeholder="<?php echo HtmlEncode($store_intent_issue_edit->DrID->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_edit->DrID->EditValue ?>"<?php echo $store_intent_issue_edit->DrID->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_edit->DrID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_edit->BillStatus->Visible) { // BillStatus ?>
	<div id="r_BillStatus" class="form-group row">
		<label id="elh_store_intent_issue_BillStatus" for="x_BillStatus" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue_edit->BillStatus->caption() ?><?php echo $store_intent_issue_edit->BillStatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div <?php echo $store_intent_issue_edit->BillStatus->cellAttributes() ?>>
<span id="el_store_intent_issue_BillStatus">
<input type="text" data-table="store_intent_issue" data-field="x_BillStatus" name="x_BillStatus" id="x_BillStatus" size="30" placeholder="<?php echo HtmlEncode($store_intent_issue_edit->BillStatus->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_edit->BillStatus->EditValue ?>"<?php echo $store_intent_issue_edit->BillStatus->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_edit->BillStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_edit->ReportHeader->Visible) { // ReportHeader ?>
	<div id="r_ReportHeader" class="form-group row">
		<label id="elh_store_intent_issue_ReportHeader" for="x_ReportHeader" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue_edit->ReportHeader->caption() ?><?php echo $store_intent_issue_edit->ReportHeader->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div <?php echo $store_intent_issue_edit->ReportHeader->cellAttributes() ?>>
<span id="el_store_intent_issue_ReportHeader">
<input type="text" data-table="store_intent_issue" data-field="x_ReportHeader" name="x_ReportHeader" id="x_ReportHeader" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue_edit->ReportHeader->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_edit->ReportHeader->EditValue ?>"<?php echo $store_intent_issue_edit->ReportHeader->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_edit->ReportHeader->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue_edit->PharID->Visible) { // PharID ?>
	<div id="r_PharID" class="form-group row">
		<label id="elh_store_intent_issue_PharID" for="x_PharID" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue_edit->PharID->caption() ?><?php echo $store_intent_issue_edit->PharID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div <?php echo $store_intent_issue_edit->PharID->cellAttributes() ?>>
<span id="el_store_intent_issue_PharID">
<input type="text" data-table="store_intent_issue" data-field="x_PharID" name="x_PharID" id="x_PharID" size="30" placeholder="<?php echo HtmlEncode($store_intent_issue_edit->PharID->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue_edit->PharID->EditValue ?>"<?php echo $store_intent_issue_edit->PharID->editAttributes() ?>>
</span>
<?php echo $store_intent_issue_edit->PharID->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$store_intent_issue_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $store_intent_issue_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $store_intent_issue_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$store_intent_issue_edit->showPageFooter();
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
$store_intent_issue_edit->terminate();
?>