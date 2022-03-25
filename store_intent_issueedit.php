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
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fstore_intent_issueedit = currentForm = new ew.Form("fstore_intent_issueedit", "edit");

// Validate form
fstore_intent_issueedit.validate = function() {
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
		<?php if ($store_intent_issue_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue->id->caption(), $store_intent_issue->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_intent_issue_edit->Reception->Required) { ?>
			elm = this.getElements("x" + infix + "_Reception");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue->Reception->caption(), $store_intent_issue->Reception->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Reception");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_intent_issue->Reception->errorMessage()) ?>");
		<?php if ($store_intent_issue_edit->PatientId->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue->PatientId->caption(), $store_intent_issue->PatientId->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_intent_issue_edit->mrnno->Required) { ?>
			elm = this.getElements("x" + infix + "_mrnno");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue->mrnno->caption(), $store_intent_issue->mrnno->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_intent_issue_edit->PatientName->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue->PatientName->caption(), $store_intent_issue->PatientName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_intent_issue_edit->Age->Required) { ?>
			elm = this.getElements("x" + infix + "_Age");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue->Age->caption(), $store_intent_issue->Age->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_intent_issue_edit->Gender->Required) { ?>
			elm = this.getElements("x" + infix + "_Gender");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue->Gender->caption(), $store_intent_issue->Gender->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_intent_issue_edit->profilePic->Required) { ?>
			elm = this.getElements("x" + infix + "_profilePic");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue->profilePic->caption(), $store_intent_issue->profilePic->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_intent_issue_edit->Mobile->Required) { ?>
			elm = this.getElements("x" + infix + "_Mobile");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue->Mobile->caption(), $store_intent_issue->Mobile->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_intent_issue_edit->IP_OP->Required) { ?>
			elm = this.getElements("x" + infix + "_IP_OP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue->IP_OP->caption(), $store_intent_issue->IP_OP->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_intent_issue_edit->Doctor->Required) { ?>
			elm = this.getElements("x" + infix + "_Doctor");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue->Doctor->caption(), $store_intent_issue->Doctor->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_intent_issue_edit->voucher_type->Required) { ?>
			elm = this.getElements("x" + infix + "_voucher_type");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue->voucher_type->caption(), $store_intent_issue->voucher_type->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_intent_issue_edit->Details->Required) { ?>
			elm = this.getElements("x" + infix + "_Details");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue->Details->caption(), $store_intent_issue->Details->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_intent_issue_edit->ModeofPayment->Required) { ?>
			elm = this.getElements("x" + infix + "_ModeofPayment");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue->ModeofPayment->caption(), $store_intent_issue->ModeofPayment->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_intent_issue_edit->Amount->Required) { ?>
			elm = this.getElements("x" + infix + "_Amount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue->Amount->caption(), $store_intent_issue->Amount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Amount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_intent_issue->Amount->errorMessage()) ?>");
		<?php if ($store_intent_issue_edit->AnyDues->Required) { ?>
			elm = this.getElements("x" + infix + "_AnyDues");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue->AnyDues->caption(), $store_intent_issue->AnyDues->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_intent_issue_edit->createdby->Required) { ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue->createdby->caption(), $store_intent_issue->createdby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_intent_issue_edit->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue->createddatetime->caption(), $store_intent_issue->createddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_intent_issue->createddatetime->errorMessage()) ?>");
		<?php if ($store_intent_issue_edit->modifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue->modifiedby->caption(), $store_intent_issue->modifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_intent_issue_edit->modifieddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue->modifieddatetime->caption(), $store_intent_issue->modifieddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_intent_issue->modifieddatetime->errorMessage()) ?>");
		<?php if ($store_intent_issue_edit->RealizationAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_RealizationAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue->RealizationAmount->caption(), $store_intent_issue->RealizationAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RealizationAmount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_intent_issue->RealizationAmount->errorMessage()) ?>");
		<?php if ($store_intent_issue_edit->RealizationStatus->Required) { ?>
			elm = this.getElements("x" + infix + "_RealizationStatus");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue->RealizationStatus->caption(), $store_intent_issue->RealizationStatus->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_intent_issue_edit->RealizationRemarks->Required) { ?>
			elm = this.getElements("x" + infix + "_RealizationRemarks");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue->RealizationRemarks->caption(), $store_intent_issue->RealizationRemarks->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_intent_issue_edit->RealizationBatchNo->Required) { ?>
			elm = this.getElements("x" + infix + "_RealizationBatchNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue->RealizationBatchNo->caption(), $store_intent_issue->RealizationBatchNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_intent_issue_edit->RealizationDate->Required) { ?>
			elm = this.getElements("x" + infix + "_RealizationDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue->RealizationDate->caption(), $store_intent_issue->RealizationDate->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_intent_issue_edit->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue->HospID->caption(), $store_intent_issue->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_intent_issue->HospID->errorMessage()) ?>");
		<?php if ($store_intent_issue_edit->RIDNO->Required) { ?>
			elm = this.getElements("x" + infix + "_RIDNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue->RIDNO->caption(), $store_intent_issue->RIDNO->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RIDNO");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_intent_issue->RIDNO->errorMessage()) ?>");
		<?php if ($store_intent_issue_edit->TidNo->Required) { ?>
			elm = this.getElements("x" + infix + "_TidNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue->TidNo->caption(), $store_intent_issue->TidNo->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TidNo");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_intent_issue->TidNo->errorMessage()) ?>");
		<?php if ($store_intent_issue_edit->CId->Required) { ?>
			elm = this.getElements("x" + infix + "_CId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue->CId->caption(), $store_intent_issue->CId->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_CId");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_intent_issue->CId->errorMessage()) ?>");
		<?php if ($store_intent_issue_edit->PartnerName->Required) { ?>
			elm = this.getElements("x" + infix + "_PartnerName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue->PartnerName->caption(), $store_intent_issue->PartnerName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_intent_issue_edit->PayerType->Required) { ?>
			elm = this.getElements("x" + infix + "_PayerType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue->PayerType->caption(), $store_intent_issue->PayerType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_intent_issue_edit->Dob->Required) { ?>
			elm = this.getElements("x" + infix + "_Dob");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue->Dob->caption(), $store_intent_issue->Dob->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_intent_issue_edit->Currency->Required) { ?>
			elm = this.getElements("x" + infix + "_Currency");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue->Currency->caption(), $store_intent_issue->Currency->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_intent_issue_edit->DiscountRemarks->Required) { ?>
			elm = this.getElements("x" + infix + "_DiscountRemarks");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue->DiscountRemarks->caption(), $store_intent_issue->DiscountRemarks->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_intent_issue_edit->Remarks->Required) { ?>
			elm = this.getElements("x" + infix + "_Remarks");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue->Remarks->caption(), $store_intent_issue->Remarks->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_intent_issue_edit->PatId->Required) { ?>
			elm = this.getElements("x" + infix + "_PatId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue->PatId->caption(), $store_intent_issue->PatId->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PatId");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_intent_issue->PatId->errorMessage()) ?>");
		<?php if ($store_intent_issue_edit->DrDepartment->Required) { ?>
			elm = this.getElements("x" + infix + "_DrDepartment");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue->DrDepartment->caption(), $store_intent_issue->DrDepartment->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_intent_issue_edit->RefferedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_RefferedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue->RefferedBy->caption(), $store_intent_issue->RefferedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_intent_issue_edit->BillNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_BillNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue->BillNumber->caption(), $store_intent_issue->BillNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_intent_issue_edit->CardNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_CardNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue->CardNumber->caption(), $store_intent_issue->CardNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_intent_issue_edit->BankName->Required) { ?>
			elm = this.getElements("x" + infix + "_BankName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue->BankName->caption(), $store_intent_issue->BankName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_intent_issue_edit->DrID->Required) { ?>
			elm = this.getElements("x" + infix + "_DrID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue->DrID->caption(), $store_intent_issue->DrID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DrID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_intent_issue->DrID->errorMessage()) ?>");
		<?php if ($store_intent_issue_edit->BillStatus->Required) { ?>
			elm = this.getElements("x" + infix + "_BillStatus");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue->BillStatus->caption(), $store_intent_issue->BillStatus->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BillStatus");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_intent_issue->BillStatus->errorMessage()) ?>");
		<?php if ($store_intent_issue_edit->ReportHeader->Required) { ?>
			elm = this.getElements("x" + infix + "_ReportHeader");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue->ReportHeader->caption(), $store_intent_issue->ReportHeader->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_intent_issue_edit->StoreID->Required) { ?>
			elm = this.getElements("x" + infix + "_StoreID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue->StoreID->caption(), $store_intent_issue->StoreID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_StoreID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_intent_issue->StoreID->errorMessage()) ?>");
		<?php if ($store_intent_issue_edit->BranchID->Required) { ?>
			elm = this.getElements("x" + infix + "_BranchID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_intent_issue->BranchID->caption(), $store_intent_issue->BranchID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BranchID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_intent_issue->BranchID->errorMessage()) ?>");

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
fstore_intent_issueedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fstore_intent_issueedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $store_intent_issue_edit->showPageHeader(); ?>
<?php
$store_intent_issue_edit->showMessage();
?>
<form name="fstore_intent_issueedit" id="fstore_intent_issueedit" class="<?php echo $store_intent_issue_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($store_intent_issue_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $store_intent_issue_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="store_intent_issue">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$store_intent_issue_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($store_intent_issue->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_store_intent_issue_id" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue->id->caption() ?><?php echo ($store_intent_issue->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div<?php echo $store_intent_issue->id->cellAttributes() ?>>
<span id="el_store_intent_issue_id">
<span<?php echo $store_intent_issue->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($store_intent_issue->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="store_intent_issue" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($store_intent_issue->id->CurrentValue) ?>">
<?php echo $store_intent_issue->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue->Reception->Visible) { // Reception ?>
	<div id="r_Reception" class="form-group row">
		<label id="elh_store_intent_issue_Reception" for="x_Reception" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue->Reception->caption() ?><?php echo ($store_intent_issue->Reception->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div<?php echo $store_intent_issue->Reception->cellAttributes() ?>>
<span id="el_store_intent_issue_Reception">
<input type="text" data-table="store_intent_issue" data-field="x_Reception" name="x_Reception" id="x_Reception" size="30" placeholder="<?php echo HtmlEncode($store_intent_issue->Reception->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue->Reception->EditValue ?>"<?php echo $store_intent_issue->Reception->editAttributes() ?>>
</span>
<?php echo $store_intent_issue->Reception->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue->PatientId->Visible) { // PatientId ?>
	<div id="r_PatientId" class="form-group row">
		<label id="elh_store_intent_issue_PatientId" for="x_PatientId" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue->PatientId->caption() ?><?php echo ($store_intent_issue->PatientId->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div<?php echo $store_intent_issue->PatientId->cellAttributes() ?>>
<span id="el_store_intent_issue_PatientId">
<input type="text" data-table="store_intent_issue" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue->PatientId->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue->PatientId->EditValue ?>"<?php echo $store_intent_issue->PatientId->editAttributes() ?>>
</span>
<?php echo $store_intent_issue->PatientId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue->mrnno->Visible) { // mrnno ?>
	<div id="r_mrnno" class="form-group row">
		<label id="elh_store_intent_issue_mrnno" for="x_mrnno" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue->mrnno->caption() ?><?php echo ($store_intent_issue->mrnno->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div<?php echo $store_intent_issue->mrnno->cellAttributes() ?>>
<span id="el_store_intent_issue_mrnno">
<input type="text" data-table="store_intent_issue" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue->mrnno->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue->mrnno->EditValue ?>"<?php echo $store_intent_issue->mrnno->editAttributes() ?>>
</span>
<?php echo $store_intent_issue->mrnno->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label id="elh_store_intent_issue_PatientName" for="x_PatientName" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue->PatientName->caption() ?><?php echo ($store_intent_issue->PatientName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div<?php echo $store_intent_issue->PatientName->cellAttributes() ?>>
<span id="el_store_intent_issue_PatientName">
<input type="text" data-table="store_intent_issue" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue->PatientName->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue->PatientName->EditValue ?>"<?php echo $store_intent_issue->PatientName->editAttributes() ?>>
</span>
<?php echo $store_intent_issue->PatientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label id="elh_store_intent_issue_Age" for="x_Age" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue->Age->caption() ?><?php echo ($store_intent_issue->Age->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div<?php echo $store_intent_issue->Age->cellAttributes() ?>>
<span id="el_store_intent_issue_Age">
<input type="text" data-table="store_intent_issue" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue->Age->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue->Age->EditValue ?>"<?php echo $store_intent_issue->Age->editAttributes() ?>>
</span>
<?php echo $store_intent_issue->Age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue->Gender->Visible) { // Gender ?>
	<div id="r_Gender" class="form-group row">
		<label id="elh_store_intent_issue_Gender" for="x_Gender" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue->Gender->caption() ?><?php echo ($store_intent_issue->Gender->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div<?php echo $store_intent_issue->Gender->cellAttributes() ?>>
<span id="el_store_intent_issue_Gender">
<input type="text" data-table="store_intent_issue" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue->Gender->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue->Gender->EditValue ?>"<?php echo $store_intent_issue->Gender->editAttributes() ?>>
</span>
<?php echo $store_intent_issue->Gender->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue->profilePic->Visible) { // profilePic ?>
	<div id="r_profilePic" class="form-group row">
		<label id="elh_store_intent_issue_profilePic" for="x_profilePic" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue->profilePic->caption() ?><?php echo ($store_intent_issue->profilePic->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div<?php echo $store_intent_issue->profilePic->cellAttributes() ?>>
<span id="el_store_intent_issue_profilePic">
<textarea data-table="store_intent_issue" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" cols="35" rows="4" placeholder="<?php echo HtmlEncode($store_intent_issue->profilePic->getPlaceHolder()) ?>"<?php echo $store_intent_issue->profilePic->editAttributes() ?>><?php echo $store_intent_issue->profilePic->EditValue ?></textarea>
</span>
<?php echo $store_intent_issue->profilePic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue->Mobile->Visible) { // Mobile ?>
	<div id="r_Mobile" class="form-group row">
		<label id="elh_store_intent_issue_Mobile" for="x_Mobile" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue->Mobile->caption() ?><?php echo ($store_intent_issue->Mobile->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div<?php echo $store_intent_issue->Mobile->cellAttributes() ?>>
<span id="el_store_intent_issue_Mobile">
<input type="text" data-table="store_intent_issue" data-field="x_Mobile" name="x_Mobile" id="x_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue->Mobile->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue->Mobile->EditValue ?>"<?php echo $store_intent_issue->Mobile->editAttributes() ?>>
</span>
<?php echo $store_intent_issue->Mobile->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue->IP_OP->Visible) { // IP_OP ?>
	<div id="r_IP_OP" class="form-group row">
		<label id="elh_store_intent_issue_IP_OP" for="x_IP_OP" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue->IP_OP->caption() ?><?php echo ($store_intent_issue->IP_OP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div<?php echo $store_intent_issue->IP_OP->cellAttributes() ?>>
<span id="el_store_intent_issue_IP_OP">
<input type="text" data-table="store_intent_issue" data-field="x_IP_OP" name="x_IP_OP" id="x_IP_OP" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue->IP_OP->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue->IP_OP->EditValue ?>"<?php echo $store_intent_issue->IP_OP->editAttributes() ?>>
</span>
<?php echo $store_intent_issue->IP_OP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue->Doctor->Visible) { // Doctor ?>
	<div id="r_Doctor" class="form-group row">
		<label id="elh_store_intent_issue_Doctor" for="x_Doctor" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue->Doctor->caption() ?><?php echo ($store_intent_issue->Doctor->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div<?php echo $store_intent_issue->Doctor->cellAttributes() ?>>
<span id="el_store_intent_issue_Doctor">
<input type="text" data-table="store_intent_issue" data-field="x_Doctor" name="x_Doctor" id="x_Doctor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue->Doctor->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue->Doctor->EditValue ?>"<?php echo $store_intent_issue->Doctor->editAttributes() ?>>
</span>
<?php echo $store_intent_issue->Doctor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue->voucher_type->Visible) { // voucher_type ?>
	<div id="r_voucher_type" class="form-group row">
		<label id="elh_store_intent_issue_voucher_type" for="x_voucher_type" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue->voucher_type->caption() ?><?php echo ($store_intent_issue->voucher_type->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div<?php echo $store_intent_issue->voucher_type->cellAttributes() ?>>
<span id="el_store_intent_issue_voucher_type">
<input type="text" data-table="store_intent_issue" data-field="x_voucher_type" name="x_voucher_type" id="x_voucher_type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue->voucher_type->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue->voucher_type->EditValue ?>"<?php echo $store_intent_issue->voucher_type->editAttributes() ?>>
</span>
<?php echo $store_intent_issue->voucher_type->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue->Details->Visible) { // Details ?>
	<div id="r_Details" class="form-group row">
		<label id="elh_store_intent_issue_Details" for="x_Details" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue->Details->caption() ?><?php echo ($store_intent_issue->Details->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div<?php echo $store_intent_issue->Details->cellAttributes() ?>>
<span id="el_store_intent_issue_Details">
<input type="text" data-table="store_intent_issue" data-field="x_Details" name="x_Details" id="x_Details" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue->Details->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue->Details->EditValue ?>"<?php echo $store_intent_issue->Details->editAttributes() ?>>
</span>
<?php echo $store_intent_issue->Details->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue->ModeofPayment->Visible) { // ModeofPayment ?>
	<div id="r_ModeofPayment" class="form-group row">
		<label id="elh_store_intent_issue_ModeofPayment" for="x_ModeofPayment" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue->ModeofPayment->caption() ?><?php echo ($store_intent_issue->ModeofPayment->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div<?php echo $store_intent_issue->ModeofPayment->cellAttributes() ?>>
<span id="el_store_intent_issue_ModeofPayment">
<input type="text" data-table="store_intent_issue" data-field="x_ModeofPayment" name="x_ModeofPayment" id="x_ModeofPayment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue->ModeofPayment->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue->ModeofPayment->EditValue ?>"<?php echo $store_intent_issue->ModeofPayment->editAttributes() ?>>
</span>
<?php echo $store_intent_issue->ModeofPayment->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue->Amount->Visible) { // Amount ?>
	<div id="r_Amount" class="form-group row">
		<label id="elh_store_intent_issue_Amount" for="x_Amount" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue->Amount->caption() ?><?php echo ($store_intent_issue->Amount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div<?php echo $store_intent_issue->Amount->cellAttributes() ?>>
<span id="el_store_intent_issue_Amount">
<input type="text" data-table="store_intent_issue" data-field="x_Amount" name="x_Amount" id="x_Amount" size="30" placeholder="<?php echo HtmlEncode($store_intent_issue->Amount->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue->Amount->EditValue ?>"<?php echo $store_intent_issue->Amount->editAttributes() ?>>
</span>
<?php echo $store_intent_issue->Amount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue->AnyDues->Visible) { // AnyDues ?>
	<div id="r_AnyDues" class="form-group row">
		<label id="elh_store_intent_issue_AnyDues" for="x_AnyDues" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue->AnyDues->caption() ?><?php echo ($store_intent_issue->AnyDues->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div<?php echo $store_intent_issue->AnyDues->cellAttributes() ?>>
<span id="el_store_intent_issue_AnyDues">
<input type="text" data-table="store_intent_issue" data-field="x_AnyDues" name="x_AnyDues" id="x_AnyDues" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue->AnyDues->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue->AnyDues->EditValue ?>"<?php echo $store_intent_issue->AnyDues->editAttributes() ?>>
</span>
<?php echo $store_intent_issue->AnyDues->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue->createdby->Visible) { // createdby ?>
	<div id="r_createdby" class="form-group row">
		<label id="elh_store_intent_issue_createdby" for="x_createdby" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue->createdby->caption() ?><?php echo ($store_intent_issue->createdby->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div<?php echo $store_intent_issue->createdby->cellAttributes() ?>>
<span id="el_store_intent_issue_createdby">
<input type="text" data-table="store_intent_issue" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue->createdby->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue->createdby->EditValue ?>"<?php echo $store_intent_issue->createdby->editAttributes() ?>>
</span>
<?php echo $store_intent_issue->createdby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue->createddatetime->Visible) { // createddatetime ?>
	<div id="r_createddatetime" class="form-group row">
		<label id="elh_store_intent_issue_createddatetime" for="x_createddatetime" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue->createddatetime->caption() ?><?php echo ($store_intent_issue->createddatetime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div<?php echo $store_intent_issue->createddatetime->cellAttributes() ?>>
<span id="el_store_intent_issue_createddatetime">
<input type="text" data-table="store_intent_issue" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?php echo HtmlEncode($store_intent_issue->createddatetime->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue->createddatetime->EditValue ?>"<?php echo $store_intent_issue->createddatetime->editAttributes() ?>>
<?php if (!$store_intent_issue->createddatetime->ReadOnly && !$store_intent_issue->createddatetime->Disabled && !isset($store_intent_issue->createddatetime->EditAttrs["readonly"]) && !isset($store_intent_issue->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fstore_intent_issueedit", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $store_intent_issue->createddatetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue->modifiedby->Visible) { // modifiedby ?>
	<div id="r_modifiedby" class="form-group row">
		<label id="elh_store_intent_issue_modifiedby" for="x_modifiedby" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue->modifiedby->caption() ?><?php echo ($store_intent_issue->modifiedby->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div<?php echo $store_intent_issue->modifiedby->cellAttributes() ?>>
<span id="el_store_intent_issue_modifiedby">
<input type="text" data-table="store_intent_issue" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue->modifiedby->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue->modifiedby->EditValue ?>"<?php echo $store_intent_issue->modifiedby->editAttributes() ?>>
</span>
<?php echo $store_intent_issue->modifiedby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue->modifieddatetime->Visible) { // modifieddatetime ?>
	<div id="r_modifieddatetime" class="form-group row">
		<label id="elh_store_intent_issue_modifieddatetime" for="x_modifieddatetime" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue->modifieddatetime->caption() ?><?php echo ($store_intent_issue->modifieddatetime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div<?php echo $store_intent_issue->modifieddatetime->cellAttributes() ?>>
<span id="el_store_intent_issue_modifieddatetime">
<input type="text" data-table="store_intent_issue" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?php echo HtmlEncode($store_intent_issue->modifieddatetime->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue->modifieddatetime->EditValue ?>"<?php echo $store_intent_issue->modifieddatetime->editAttributes() ?>>
<?php if (!$store_intent_issue->modifieddatetime->ReadOnly && !$store_intent_issue->modifieddatetime->Disabled && !isset($store_intent_issue->modifieddatetime->EditAttrs["readonly"]) && !isset($store_intent_issue->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fstore_intent_issueedit", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $store_intent_issue->modifieddatetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue->RealizationAmount->Visible) { // RealizationAmount ?>
	<div id="r_RealizationAmount" class="form-group row">
		<label id="elh_store_intent_issue_RealizationAmount" for="x_RealizationAmount" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue->RealizationAmount->caption() ?><?php echo ($store_intent_issue->RealizationAmount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div<?php echo $store_intent_issue->RealizationAmount->cellAttributes() ?>>
<span id="el_store_intent_issue_RealizationAmount">
<input type="text" data-table="store_intent_issue" data-field="x_RealizationAmount" name="x_RealizationAmount" id="x_RealizationAmount" size="30" placeholder="<?php echo HtmlEncode($store_intent_issue->RealizationAmount->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue->RealizationAmount->EditValue ?>"<?php echo $store_intent_issue->RealizationAmount->editAttributes() ?>>
</span>
<?php echo $store_intent_issue->RealizationAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue->RealizationStatus->Visible) { // RealizationStatus ?>
	<div id="r_RealizationStatus" class="form-group row">
		<label id="elh_store_intent_issue_RealizationStatus" for="x_RealizationStatus" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue->RealizationStatus->caption() ?><?php echo ($store_intent_issue->RealizationStatus->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div<?php echo $store_intent_issue->RealizationStatus->cellAttributes() ?>>
<span id="el_store_intent_issue_RealizationStatus">
<input type="text" data-table="store_intent_issue" data-field="x_RealizationStatus" name="x_RealizationStatus" id="x_RealizationStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue->RealizationStatus->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue->RealizationStatus->EditValue ?>"<?php echo $store_intent_issue->RealizationStatus->editAttributes() ?>>
</span>
<?php echo $store_intent_issue->RealizationStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue->RealizationRemarks->Visible) { // RealizationRemarks ?>
	<div id="r_RealizationRemarks" class="form-group row">
		<label id="elh_store_intent_issue_RealizationRemarks" for="x_RealizationRemarks" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue->RealizationRemarks->caption() ?><?php echo ($store_intent_issue->RealizationRemarks->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div<?php echo $store_intent_issue->RealizationRemarks->cellAttributes() ?>>
<span id="el_store_intent_issue_RealizationRemarks">
<input type="text" data-table="store_intent_issue" data-field="x_RealizationRemarks" name="x_RealizationRemarks" id="x_RealizationRemarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue->RealizationRemarks->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue->RealizationRemarks->EditValue ?>"<?php echo $store_intent_issue->RealizationRemarks->editAttributes() ?>>
</span>
<?php echo $store_intent_issue->RealizationRemarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
	<div id="r_RealizationBatchNo" class="form-group row">
		<label id="elh_store_intent_issue_RealizationBatchNo" for="x_RealizationBatchNo" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue->RealizationBatchNo->caption() ?><?php echo ($store_intent_issue->RealizationBatchNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div<?php echo $store_intent_issue->RealizationBatchNo->cellAttributes() ?>>
<span id="el_store_intent_issue_RealizationBatchNo">
<input type="text" data-table="store_intent_issue" data-field="x_RealizationBatchNo" name="x_RealizationBatchNo" id="x_RealizationBatchNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue->RealizationBatchNo->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue->RealizationBatchNo->EditValue ?>"<?php echo $store_intent_issue->RealizationBatchNo->editAttributes() ?>>
</span>
<?php echo $store_intent_issue->RealizationBatchNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue->RealizationDate->Visible) { // RealizationDate ?>
	<div id="r_RealizationDate" class="form-group row">
		<label id="elh_store_intent_issue_RealizationDate" for="x_RealizationDate" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue->RealizationDate->caption() ?><?php echo ($store_intent_issue->RealizationDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div<?php echo $store_intent_issue->RealizationDate->cellAttributes() ?>>
<span id="el_store_intent_issue_RealizationDate">
<input type="text" data-table="store_intent_issue" data-field="x_RealizationDate" name="x_RealizationDate" id="x_RealizationDate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue->RealizationDate->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue->RealizationDate->EditValue ?>"<?php echo $store_intent_issue->RealizationDate->editAttributes() ?>>
</span>
<?php echo $store_intent_issue->RealizationDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label id="elh_store_intent_issue_HospID" for="x_HospID" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue->HospID->caption() ?><?php echo ($store_intent_issue->HospID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div<?php echo $store_intent_issue->HospID->cellAttributes() ?>>
<span id="el_store_intent_issue_HospID">
<input type="text" data-table="store_intent_issue" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?php echo HtmlEncode($store_intent_issue->HospID->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue->HospID->EditValue ?>"<?php echo $store_intent_issue->HospID->editAttributes() ?>>
</span>
<?php echo $store_intent_issue->HospID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue->RIDNO->Visible) { // RIDNO ?>
	<div id="r_RIDNO" class="form-group row">
		<label id="elh_store_intent_issue_RIDNO" for="x_RIDNO" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue->RIDNO->caption() ?><?php echo ($store_intent_issue->RIDNO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div<?php echo $store_intent_issue->RIDNO->cellAttributes() ?>>
<span id="el_store_intent_issue_RIDNO">
<input type="text" data-table="store_intent_issue" data-field="x_RIDNO" name="x_RIDNO" id="x_RIDNO" size="30" placeholder="<?php echo HtmlEncode($store_intent_issue->RIDNO->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue->RIDNO->EditValue ?>"<?php echo $store_intent_issue->RIDNO->editAttributes() ?>>
</span>
<?php echo $store_intent_issue->RIDNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue->TidNo->Visible) { // TidNo ?>
	<div id="r_TidNo" class="form-group row">
		<label id="elh_store_intent_issue_TidNo" for="x_TidNo" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue->TidNo->caption() ?><?php echo ($store_intent_issue->TidNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div<?php echo $store_intent_issue->TidNo->cellAttributes() ?>>
<span id="el_store_intent_issue_TidNo">
<input type="text" data-table="store_intent_issue" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?php echo HtmlEncode($store_intent_issue->TidNo->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue->TidNo->EditValue ?>"<?php echo $store_intent_issue->TidNo->editAttributes() ?>>
</span>
<?php echo $store_intent_issue->TidNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue->CId->Visible) { // CId ?>
	<div id="r_CId" class="form-group row">
		<label id="elh_store_intent_issue_CId" for="x_CId" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue->CId->caption() ?><?php echo ($store_intent_issue->CId->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div<?php echo $store_intent_issue->CId->cellAttributes() ?>>
<span id="el_store_intent_issue_CId">
<input type="text" data-table="store_intent_issue" data-field="x_CId" name="x_CId" id="x_CId" size="30" placeholder="<?php echo HtmlEncode($store_intent_issue->CId->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue->CId->EditValue ?>"<?php echo $store_intent_issue->CId->editAttributes() ?>>
</span>
<?php echo $store_intent_issue->CId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue->PartnerName->Visible) { // PartnerName ?>
	<div id="r_PartnerName" class="form-group row">
		<label id="elh_store_intent_issue_PartnerName" for="x_PartnerName" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue->PartnerName->caption() ?><?php echo ($store_intent_issue->PartnerName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div<?php echo $store_intent_issue->PartnerName->cellAttributes() ?>>
<span id="el_store_intent_issue_PartnerName">
<input type="text" data-table="store_intent_issue" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue->PartnerName->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue->PartnerName->EditValue ?>"<?php echo $store_intent_issue->PartnerName->editAttributes() ?>>
</span>
<?php echo $store_intent_issue->PartnerName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue->PayerType->Visible) { // PayerType ?>
	<div id="r_PayerType" class="form-group row">
		<label id="elh_store_intent_issue_PayerType" for="x_PayerType" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue->PayerType->caption() ?><?php echo ($store_intent_issue->PayerType->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div<?php echo $store_intent_issue->PayerType->cellAttributes() ?>>
<span id="el_store_intent_issue_PayerType">
<input type="text" data-table="store_intent_issue" data-field="x_PayerType" name="x_PayerType" id="x_PayerType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue->PayerType->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue->PayerType->EditValue ?>"<?php echo $store_intent_issue->PayerType->editAttributes() ?>>
</span>
<?php echo $store_intent_issue->PayerType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue->Dob->Visible) { // Dob ?>
	<div id="r_Dob" class="form-group row">
		<label id="elh_store_intent_issue_Dob" for="x_Dob" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue->Dob->caption() ?><?php echo ($store_intent_issue->Dob->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div<?php echo $store_intent_issue->Dob->cellAttributes() ?>>
<span id="el_store_intent_issue_Dob">
<input type="text" data-table="store_intent_issue" data-field="x_Dob" name="x_Dob" id="x_Dob" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue->Dob->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue->Dob->EditValue ?>"<?php echo $store_intent_issue->Dob->editAttributes() ?>>
</span>
<?php echo $store_intent_issue->Dob->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue->Currency->Visible) { // Currency ?>
	<div id="r_Currency" class="form-group row">
		<label id="elh_store_intent_issue_Currency" for="x_Currency" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue->Currency->caption() ?><?php echo ($store_intent_issue->Currency->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div<?php echo $store_intent_issue->Currency->cellAttributes() ?>>
<span id="el_store_intent_issue_Currency">
<input type="text" data-table="store_intent_issue" data-field="x_Currency" name="x_Currency" id="x_Currency" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue->Currency->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue->Currency->EditValue ?>"<?php echo $store_intent_issue->Currency->editAttributes() ?>>
</span>
<?php echo $store_intent_issue->Currency->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue->DiscountRemarks->Visible) { // DiscountRemarks ?>
	<div id="r_DiscountRemarks" class="form-group row">
		<label id="elh_store_intent_issue_DiscountRemarks" for="x_DiscountRemarks" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue->DiscountRemarks->caption() ?><?php echo ($store_intent_issue->DiscountRemarks->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div<?php echo $store_intent_issue->DiscountRemarks->cellAttributes() ?>>
<span id="el_store_intent_issue_DiscountRemarks">
<input type="text" data-table="store_intent_issue" data-field="x_DiscountRemarks" name="x_DiscountRemarks" id="x_DiscountRemarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue->DiscountRemarks->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue->DiscountRemarks->EditValue ?>"<?php echo $store_intent_issue->DiscountRemarks->editAttributes() ?>>
</span>
<?php echo $store_intent_issue->DiscountRemarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue->Remarks->Visible) { // Remarks ?>
	<div id="r_Remarks" class="form-group row">
		<label id="elh_store_intent_issue_Remarks" for="x_Remarks" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue->Remarks->caption() ?><?php echo ($store_intent_issue->Remarks->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div<?php echo $store_intent_issue->Remarks->cellAttributes() ?>>
<span id="el_store_intent_issue_Remarks">
<input type="text" data-table="store_intent_issue" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue->Remarks->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue->Remarks->EditValue ?>"<?php echo $store_intent_issue->Remarks->editAttributes() ?>>
</span>
<?php echo $store_intent_issue->Remarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue->PatId->Visible) { // PatId ?>
	<div id="r_PatId" class="form-group row">
		<label id="elh_store_intent_issue_PatId" for="x_PatId" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue->PatId->caption() ?><?php echo ($store_intent_issue->PatId->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div<?php echo $store_intent_issue->PatId->cellAttributes() ?>>
<span id="el_store_intent_issue_PatId">
<input type="text" data-table="store_intent_issue" data-field="x_PatId" name="x_PatId" id="x_PatId" size="30" placeholder="<?php echo HtmlEncode($store_intent_issue->PatId->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue->PatId->EditValue ?>"<?php echo $store_intent_issue->PatId->editAttributes() ?>>
</span>
<?php echo $store_intent_issue->PatId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue->DrDepartment->Visible) { // DrDepartment ?>
	<div id="r_DrDepartment" class="form-group row">
		<label id="elh_store_intent_issue_DrDepartment" for="x_DrDepartment" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue->DrDepartment->caption() ?><?php echo ($store_intent_issue->DrDepartment->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div<?php echo $store_intent_issue->DrDepartment->cellAttributes() ?>>
<span id="el_store_intent_issue_DrDepartment">
<input type="text" data-table="store_intent_issue" data-field="x_DrDepartment" name="x_DrDepartment" id="x_DrDepartment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue->DrDepartment->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue->DrDepartment->EditValue ?>"<?php echo $store_intent_issue->DrDepartment->editAttributes() ?>>
</span>
<?php echo $store_intent_issue->DrDepartment->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue->RefferedBy->Visible) { // RefferedBy ?>
	<div id="r_RefferedBy" class="form-group row">
		<label id="elh_store_intent_issue_RefferedBy" for="x_RefferedBy" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue->RefferedBy->caption() ?><?php echo ($store_intent_issue->RefferedBy->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div<?php echo $store_intent_issue->RefferedBy->cellAttributes() ?>>
<span id="el_store_intent_issue_RefferedBy">
<input type="text" data-table="store_intent_issue" data-field="x_RefferedBy" name="x_RefferedBy" id="x_RefferedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue->RefferedBy->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue->RefferedBy->EditValue ?>"<?php echo $store_intent_issue->RefferedBy->editAttributes() ?>>
</span>
<?php echo $store_intent_issue->RefferedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue->BillNumber->Visible) { // BillNumber ?>
	<div id="r_BillNumber" class="form-group row">
		<label id="elh_store_intent_issue_BillNumber" for="x_BillNumber" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue->BillNumber->caption() ?><?php echo ($store_intent_issue->BillNumber->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div<?php echo $store_intent_issue->BillNumber->cellAttributes() ?>>
<span id="el_store_intent_issue_BillNumber">
<input type="text" data-table="store_intent_issue" data-field="x_BillNumber" name="x_BillNumber" id="x_BillNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue->BillNumber->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue->BillNumber->EditValue ?>"<?php echo $store_intent_issue->BillNumber->editAttributes() ?>>
</span>
<?php echo $store_intent_issue->BillNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue->CardNumber->Visible) { // CardNumber ?>
	<div id="r_CardNumber" class="form-group row">
		<label id="elh_store_intent_issue_CardNumber" for="x_CardNumber" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue->CardNumber->caption() ?><?php echo ($store_intent_issue->CardNumber->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div<?php echo $store_intent_issue->CardNumber->cellAttributes() ?>>
<span id="el_store_intent_issue_CardNumber">
<input type="text" data-table="store_intent_issue" data-field="x_CardNumber" name="x_CardNumber" id="x_CardNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue->CardNumber->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue->CardNumber->EditValue ?>"<?php echo $store_intent_issue->CardNumber->editAttributes() ?>>
</span>
<?php echo $store_intent_issue->CardNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue->BankName->Visible) { // BankName ?>
	<div id="r_BankName" class="form-group row">
		<label id="elh_store_intent_issue_BankName" for="x_BankName" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue->BankName->caption() ?><?php echo ($store_intent_issue->BankName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div<?php echo $store_intent_issue->BankName->cellAttributes() ?>>
<span id="el_store_intent_issue_BankName">
<input type="text" data-table="store_intent_issue" data-field="x_BankName" name="x_BankName" id="x_BankName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue->BankName->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue->BankName->EditValue ?>"<?php echo $store_intent_issue->BankName->editAttributes() ?>>
</span>
<?php echo $store_intent_issue->BankName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue->DrID->Visible) { // DrID ?>
	<div id="r_DrID" class="form-group row">
		<label id="elh_store_intent_issue_DrID" for="x_DrID" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue->DrID->caption() ?><?php echo ($store_intent_issue->DrID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div<?php echo $store_intent_issue->DrID->cellAttributes() ?>>
<span id="el_store_intent_issue_DrID">
<input type="text" data-table="store_intent_issue" data-field="x_DrID" name="x_DrID" id="x_DrID" size="30" placeholder="<?php echo HtmlEncode($store_intent_issue->DrID->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue->DrID->EditValue ?>"<?php echo $store_intent_issue->DrID->editAttributes() ?>>
</span>
<?php echo $store_intent_issue->DrID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue->BillStatus->Visible) { // BillStatus ?>
	<div id="r_BillStatus" class="form-group row">
		<label id="elh_store_intent_issue_BillStatus" for="x_BillStatus" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue->BillStatus->caption() ?><?php echo ($store_intent_issue->BillStatus->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div<?php echo $store_intent_issue->BillStatus->cellAttributes() ?>>
<span id="el_store_intent_issue_BillStatus">
<input type="text" data-table="store_intent_issue" data-field="x_BillStatus" name="x_BillStatus" id="x_BillStatus" size="30" placeholder="<?php echo HtmlEncode($store_intent_issue->BillStatus->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue->BillStatus->EditValue ?>"<?php echo $store_intent_issue->BillStatus->editAttributes() ?>>
</span>
<?php echo $store_intent_issue->BillStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue->ReportHeader->Visible) { // ReportHeader ?>
	<div id="r_ReportHeader" class="form-group row">
		<label id="elh_store_intent_issue_ReportHeader" for="x_ReportHeader" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue->ReportHeader->caption() ?><?php echo ($store_intent_issue->ReportHeader->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div<?php echo $store_intent_issue->ReportHeader->cellAttributes() ?>>
<span id="el_store_intent_issue_ReportHeader">
<input type="text" data-table="store_intent_issue" data-field="x_ReportHeader" name="x_ReportHeader" id="x_ReportHeader" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_intent_issue->ReportHeader->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue->ReportHeader->EditValue ?>"<?php echo $store_intent_issue->ReportHeader->editAttributes() ?>>
</span>
<?php echo $store_intent_issue->ReportHeader->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue->StoreID->Visible) { // StoreID ?>
	<div id="r_StoreID" class="form-group row">
		<label id="elh_store_intent_issue_StoreID" for="x_StoreID" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue->StoreID->caption() ?><?php echo ($store_intent_issue->StoreID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div<?php echo $store_intent_issue->StoreID->cellAttributes() ?>>
<span id="el_store_intent_issue_StoreID">
<input type="text" data-table="store_intent_issue" data-field="x_StoreID" name="x_StoreID" id="x_StoreID" size="30" placeholder="<?php echo HtmlEncode($store_intent_issue->StoreID->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue->StoreID->EditValue ?>"<?php echo $store_intent_issue->StoreID->editAttributes() ?>>
</span>
<?php echo $store_intent_issue->StoreID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_intent_issue->BranchID->Visible) { // BranchID ?>
	<div id="r_BranchID" class="form-group row">
		<label id="elh_store_intent_issue_BranchID" for="x_BranchID" class="<?php echo $store_intent_issue_edit->LeftColumnClass ?>"><?php echo $store_intent_issue->BranchID->caption() ?><?php echo ($store_intent_issue->BranchID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_intent_issue_edit->RightColumnClass ?>"><div<?php echo $store_intent_issue->BranchID->cellAttributes() ?>>
<span id="el_store_intent_issue_BranchID">
<input type="text" data-table="store_intent_issue" data-field="x_BranchID" name="x_BranchID" id="x_BranchID" size="30" placeholder="<?php echo HtmlEncode($store_intent_issue->BranchID->getPlaceHolder()) ?>" value="<?php echo $store_intent_issue->BranchID->EditValue ?>"<?php echo $store_intent_issue->BranchID->editAttributes() ?>>
</span>
<?php echo $store_intent_issue->BranchID->CustomMsg ?></div></div>
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
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$store_intent_issue_edit->terminate();
?>