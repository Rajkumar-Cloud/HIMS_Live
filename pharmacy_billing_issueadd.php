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
$pharmacy_billing_issue_add = new pharmacy_billing_issue_add();

// Run the page
$pharmacy_billing_issue_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_billing_issue_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fpharmacy_billing_issueadd = currentForm = new ew.Form("fpharmacy_billing_issueadd", "add");

// Validate form
fpharmacy_billing_issueadd.validate = function() {
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
		<?php if ($pharmacy_billing_issue_add->Reception->Required) { ?>
			elm = this.getElements("x" + infix + "_Reception");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_issue->Reception->caption(), $pharmacy_billing_issue->Reception->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_issue_add->PatientId->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_issue->PatientId->caption(), $pharmacy_billing_issue->PatientId->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_issue_add->mrnno->Required) { ?>
			elm = this.getElements("x" + infix + "_mrnno");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_issue->mrnno->caption(), $pharmacy_billing_issue->mrnno->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_issue_add->PatientName->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_issue->PatientName->caption(), $pharmacy_billing_issue->PatientName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_issue_add->Age->Required) { ?>
			elm = this.getElements("x" + infix + "_Age");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_issue->Age->caption(), $pharmacy_billing_issue->Age->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_issue_add->Gender->Required) { ?>
			elm = this.getElements("x" + infix + "_Gender");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_issue->Gender->caption(), $pharmacy_billing_issue->Gender->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_issue_add->profilePic->Required) { ?>
			elm = this.getElements("x" + infix + "_profilePic");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_issue->profilePic->caption(), $pharmacy_billing_issue->profilePic->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_issue_add->Mobile->Required) { ?>
			elm = this.getElements("x" + infix + "_Mobile");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_issue->Mobile->caption(), $pharmacy_billing_issue->Mobile->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_issue_add->IP_OP->Required) { ?>
			elm = this.getElements("x" + infix + "_IP_OP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_issue->IP_OP->caption(), $pharmacy_billing_issue->IP_OP->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_issue_add->Doctor->Required) { ?>
			elm = this.getElements("x" + infix + "_Doctor");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_issue->Doctor->caption(), $pharmacy_billing_issue->Doctor->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_issue_add->voucher_type->Required) { ?>
			elm = this.getElements("x" + infix + "_voucher_type");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_issue->voucher_type->caption(), $pharmacy_billing_issue->voucher_type->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_issue_add->Details->Required) { ?>
			elm = this.getElements("x" + infix + "_Details");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_issue->Details->caption(), $pharmacy_billing_issue->Details->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_issue_add->ModeofPayment->Required) { ?>
			elm = this.getElements("x" + infix + "_ModeofPayment");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_issue->ModeofPayment->caption(), $pharmacy_billing_issue->ModeofPayment->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_issue_add->Amount->Required) { ?>
			elm = this.getElements("x" + infix + "_Amount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_issue->Amount->caption(), $pharmacy_billing_issue->Amount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Amount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_billing_issue->Amount->errorMessage()) ?>");
		<?php if ($pharmacy_billing_issue_add->AnyDues->Required) { ?>
			elm = this.getElements("x" + infix + "_AnyDues");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_issue->AnyDues->caption(), $pharmacy_billing_issue->AnyDues->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_issue_add->createdby->Required) { ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_issue->createdby->caption(), $pharmacy_billing_issue->createdby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_issue_add->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_issue->createddatetime->caption(), $pharmacy_billing_issue->createddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_issue_add->modifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_issue->modifiedby->caption(), $pharmacy_billing_issue->modifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_issue_add->modifieddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_issue->modifieddatetime->caption(), $pharmacy_billing_issue->modifieddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_issue_add->RealizationAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_RealizationAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_issue->RealizationAmount->caption(), $pharmacy_billing_issue->RealizationAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RealizationAmount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_billing_issue->RealizationAmount->errorMessage()) ?>");
		<?php if ($pharmacy_billing_issue_add->RealizationStatus->Required) { ?>
			elm = this.getElements("x" + infix + "_RealizationStatus");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_issue->RealizationStatus->caption(), $pharmacy_billing_issue->RealizationStatus->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_issue_add->RealizationRemarks->Required) { ?>
			elm = this.getElements("x" + infix + "_RealizationRemarks");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_issue->RealizationRemarks->caption(), $pharmacy_billing_issue->RealizationRemarks->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_issue_add->RealizationBatchNo->Required) { ?>
			elm = this.getElements("x" + infix + "_RealizationBatchNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_issue->RealizationBatchNo->caption(), $pharmacy_billing_issue->RealizationBatchNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_issue_add->RealizationDate->Required) { ?>
			elm = this.getElements("x" + infix + "_RealizationDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_issue->RealizationDate->caption(), $pharmacy_billing_issue->RealizationDate->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_issue_add->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_issue->HospID->caption(), $pharmacy_billing_issue->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_issue_add->RIDNO->Required) { ?>
			elm = this.getElements("x" + infix + "_RIDNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_issue->RIDNO->caption(), $pharmacy_billing_issue->RIDNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_issue_add->TidNo->Required) { ?>
			elm = this.getElements("x" + infix + "_TidNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_issue->TidNo->caption(), $pharmacy_billing_issue->TidNo->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TidNo");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_billing_issue->TidNo->errorMessage()) ?>");
		<?php if ($pharmacy_billing_issue_add->CId->Required) { ?>
			elm = this.getElements("x" + infix + "_CId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_issue->CId->caption(), $pharmacy_billing_issue->CId->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_issue_add->PartnerName->Required) { ?>
			elm = this.getElements("x" + infix + "_PartnerName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_issue->PartnerName->caption(), $pharmacy_billing_issue->PartnerName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_issue_add->PayerType->Required) { ?>
			elm = this.getElements("x" + infix + "_PayerType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_issue->PayerType->caption(), $pharmacy_billing_issue->PayerType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_issue_add->Dob->Required) { ?>
			elm = this.getElements("x" + infix + "_Dob");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_issue->Dob->caption(), $pharmacy_billing_issue->Dob->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_issue_add->Currency->Required) { ?>
			elm = this.getElements("x" + infix + "_Currency");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_issue->Currency->caption(), $pharmacy_billing_issue->Currency->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_issue_add->DiscountRemarks->Required) { ?>
			elm = this.getElements("x" + infix + "_DiscountRemarks");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_issue->DiscountRemarks->caption(), $pharmacy_billing_issue->DiscountRemarks->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_issue_add->Remarks->Required) { ?>
			elm = this.getElements("x" + infix + "_Remarks");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_issue->Remarks->caption(), $pharmacy_billing_issue->Remarks->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_issue_add->PatId->Required) { ?>
			elm = this.getElements("x" + infix + "_PatId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_issue->PatId->caption(), $pharmacy_billing_issue->PatId->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_issue_add->DrDepartment->Required) { ?>
			elm = this.getElements("x" + infix + "_DrDepartment");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_issue->DrDepartment->caption(), $pharmacy_billing_issue->DrDepartment->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_issue_add->RefferedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_RefferedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_issue->RefferedBy->caption(), $pharmacy_billing_issue->RefferedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_issue_add->BillNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_BillNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_issue->BillNumber->caption(), $pharmacy_billing_issue->BillNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_issue_add->CardNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_CardNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_issue->CardNumber->caption(), $pharmacy_billing_issue->CardNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_issue_add->BankName->Required) { ?>
			elm = this.getElements("x" + infix + "_BankName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_issue->BankName->caption(), $pharmacy_billing_issue->BankName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_issue_add->DrID->Required) { ?>
			elm = this.getElements("x" + infix + "_DrID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_issue->DrID->caption(), $pharmacy_billing_issue->DrID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_issue_add->BillStatus->Required) { ?>
			elm = this.getElements("x" + infix + "_BillStatus");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_issue->BillStatus->caption(), $pharmacy_billing_issue->BillStatus->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BillStatus");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_billing_issue->BillStatus->errorMessage()) ?>");
		<?php if ($pharmacy_billing_issue_add->ReportHeader->Required) { ?>
			elm = this.getElements("x" + infix + "_ReportHeader[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_issue->ReportHeader->caption(), $pharmacy_billing_issue->ReportHeader->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_issue_add->PharID->Required) { ?>
			elm = this.getElements("x" + infix + "_PharID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_issue->PharID->caption(), $pharmacy_billing_issue->PharID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PharID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_billing_issue->PharID->errorMessage()) ?>");
		<?php if ($pharmacy_billing_issue_add->UserName->Required) { ?>
			elm = this.getElements("x" + infix + "_UserName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_issue->UserName->caption(), $pharmacy_billing_issue->UserName->RequiredErrorMessage)) ?>");
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
fpharmacy_billing_issueadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_billing_issueadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpharmacy_billing_issueadd.lists["x_Reception"] = <?php echo $pharmacy_billing_issue_add->Reception->Lookup->toClientList() ?>;
fpharmacy_billing_issueadd.lists["x_Reception"].options = <?php echo JsonEncode($pharmacy_billing_issue_add->Reception->lookupOptions()) ?>;
fpharmacy_billing_issueadd.lists["x_ModeofPayment"] = <?php echo $pharmacy_billing_issue_add->ModeofPayment->Lookup->toClientList() ?>;
fpharmacy_billing_issueadd.lists["x_ModeofPayment"].options = <?php echo JsonEncode($pharmacy_billing_issue_add->ModeofPayment->options(FALSE, TRUE)) ?>;
fpharmacy_billing_issueadd.lists["x_RIDNO"] = <?php echo $pharmacy_billing_issue_add->RIDNO->Lookup->toClientList() ?>;
fpharmacy_billing_issueadd.lists["x_RIDNO"].options = <?php echo JsonEncode($pharmacy_billing_issue_add->RIDNO->lookupOptions()) ?>;
fpharmacy_billing_issueadd.lists["x_CId"] = <?php echo $pharmacy_billing_issue_add->CId->Lookup->toClientList() ?>;
fpharmacy_billing_issueadd.lists["x_CId"].options = <?php echo JsonEncode($pharmacy_billing_issue_add->CId->lookupOptions()) ?>;
fpharmacy_billing_issueadd.lists["x_PatId"] = <?php echo $pharmacy_billing_issue_add->PatId->Lookup->toClientList() ?>;
fpharmacy_billing_issueadd.lists["x_PatId"].options = <?php echo JsonEncode($pharmacy_billing_issue_add->PatId->lookupOptions()) ?>;
fpharmacy_billing_issueadd.lists["x_RefferedBy"] = <?php echo $pharmacy_billing_issue_add->RefferedBy->Lookup->toClientList() ?>;
fpharmacy_billing_issueadd.lists["x_RefferedBy"].options = <?php echo JsonEncode($pharmacy_billing_issue_add->RefferedBy->lookupOptions()) ?>;
fpharmacy_billing_issueadd.lists["x_DrID"] = <?php echo $pharmacy_billing_issue_add->DrID->Lookup->toClientList() ?>;
fpharmacy_billing_issueadd.lists["x_DrID"].options = <?php echo JsonEncode($pharmacy_billing_issue_add->DrID->lookupOptions()) ?>;
fpharmacy_billing_issueadd.lists["x_ReportHeader[]"] = <?php echo $pharmacy_billing_issue_add->ReportHeader->Lookup->toClientList() ?>;
fpharmacy_billing_issueadd.lists["x_ReportHeader[]"].options = <?php echo JsonEncode($pharmacy_billing_issue_add->ReportHeader->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $pharmacy_billing_issue_add->showPageHeader(); ?>
<?php
$pharmacy_billing_issue_add->showMessage();
?>
<form name="fpharmacy_billing_issueadd" id="fpharmacy_billing_issueadd" class="<?php echo $pharmacy_billing_issue_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_billing_issue_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_billing_issue_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_billing_issue">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_billing_issue_add->IsModal ?>">
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($pharmacy_billing_issue->Reception->Visible) { // Reception ?>
	<div id="r_Reception" class="form-group row">
		<label id="elh_pharmacy_billing_issue_Reception" for="x_Reception" class="<?php echo $pharmacy_billing_issue_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_issue_Reception" class="pharmacy_billing_issueadd" type="text/html"><span><?php echo $pharmacy_billing_issue->Reception->caption() ?><?php echo ($pharmacy_billing_issue->Reception->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_issue_add->RightColumnClass ?>"><div<?php echo $pharmacy_billing_issue->Reception->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_Reception" class="pharmacy_billing_issueadd" type="text/html">
<span id="el_pharmacy_billing_issue_Reception">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Reception"><?php echo strval($pharmacy_billing_issue->Reception->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_billing_issue->Reception->ViewValue) : $pharmacy_billing_issue->Reception->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_billing_issue->Reception->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_billing_issue->Reception->ReadOnly || $pharmacy_billing_issue->Reception->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_Reception',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_billing_issue->Reception->Lookup->getParamTag("p_x_Reception") ?>
<input type="hidden" data-table="pharmacy_billing_issue" data-field="x_Reception" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_billing_issue->Reception->displayValueSeparatorAttribute() ?>" name="x_Reception" id="x_Reception" value="<?php echo $pharmacy_billing_issue->Reception->CurrentValue ?>"<?php echo $pharmacy_billing_issue->Reception->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_issue->Reception->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_issue->PatientId->Visible) { // PatientId ?>
	<div id="r_PatientId" class="form-group row">
		<label id="elh_pharmacy_billing_issue_PatientId" for="x_PatientId" class="<?php echo $pharmacy_billing_issue_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_issue_PatientId" class="pharmacy_billing_issueadd" type="text/html"><span><?php echo $pharmacy_billing_issue->PatientId->caption() ?><?php echo ($pharmacy_billing_issue->PatientId->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_issue_add->RightColumnClass ?>"><div<?php echo $pharmacy_billing_issue->PatientId->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_PatientId" class="pharmacy_billing_issueadd" type="text/html">
<span id="el_pharmacy_billing_issue_PatientId">
<input type="text" data-table="pharmacy_billing_issue" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_issue->PatientId->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_issue->PatientId->EditValue ?>"<?php echo $pharmacy_billing_issue->PatientId->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_issue->PatientId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_issue->mrnno->Visible) { // mrnno ?>
	<div id="r_mrnno" class="form-group row">
		<label id="elh_pharmacy_billing_issue_mrnno" for="x_mrnno" class="<?php echo $pharmacy_billing_issue_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_issue_mrnno" class="pharmacy_billing_issueadd" type="text/html"><span><?php echo $pharmacy_billing_issue->mrnno->caption() ?><?php echo ($pharmacy_billing_issue->mrnno->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_issue_add->RightColumnClass ?>"><div<?php echo $pharmacy_billing_issue->mrnno->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_mrnno" class="pharmacy_billing_issueadd" type="text/html">
<span id="el_pharmacy_billing_issue_mrnno">
<input type="text" data-table="pharmacy_billing_issue" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_issue->mrnno->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_issue->mrnno->EditValue ?>"<?php echo $pharmacy_billing_issue->mrnno->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_issue->mrnno->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_issue->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label id="elh_pharmacy_billing_issue_PatientName" for="x_PatientName" class="<?php echo $pharmacy_billing_issue_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_issue_PatientName" class="pharmacy_billing_issueadd" type="text/html"><span><?php echo $pharmacy_billing_issue->PatientName->caption() ?><?php echo ($pharmacy_billing_issue->PatientName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_issue_add->RightColumnClass ?>"><div<?php echo $pharmacy_billing_issue->PatientName->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_PatientName" class="pharmacy_billing_issueadd" type="text/html">
<span id="el_pharmacy_billing_issue_PatientName">
<input type="text" data-table="pharmacy_billing_issue" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_issue->PatientName->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_issue->PatientName->EditValue ?>"<?php echo $pharmacy_billing_issue->PatientName->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_issue->PatientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_issue->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label id="elh_pharmacy_billing_issue_Age" for="x_Age" class="<?php echo $pharmacy_billing_issue_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_issue_Age" class="pharmacy_billing_issueadd" type="text/html"><span><?php echo $pharmacy_billing_issue->Age->caption() ?><?php echo ($pharmacy_billing_issue->Age->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_issue_add->RightColumnClass ?>"><div<?php echo $pharmacy_billing_issue->Age->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_Age" class="pharmacy_billing_issueadd" type="text/html">
<span id="el_pharmacy_billing_issue_Age">
<input type="text" data-table="pharmacy_billing_issue" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_issue->Age->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_issue->Age->EditValue ?>"<?php echo $pharmacy_billing_issue->Age->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_issue->Age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_issue->Gender->Visible) { // Gender ?>
	<div id="r_Gender" class="form-group row">
		<label id="elh_pharmacy_billing_issue_Gender" for="x_Gender" class="<?php echo $pharmacy_billing_issue_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_issue_Gender" class="pharmacy_billing_issueadd" type="text/html"><span><?php echo $pharmacy_billing_issue->Gender->caption() ?><?php echo ($pharmacy_billing_issue->Gender->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_issue_add->RightColumnClass ?>"><div<?php echo $pharmacy_billing_issue->Gender->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_Gender" class="pharmacy_billing_issueadd" type="text/html">
<span id="el_pharmacy_billing_issue_Gender">
<input type="text" data-table="pharmacy_billing_issue" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_issue->Gender->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_issue->Gender->EditValue ?>"<?php echo $pharmacy_billing_issue->Gender->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_issue->Gender->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_issue->profilePic->Visible) { // profilePic ?>
	<div id="r_profilePic" class="form-group row">
		<label id="elh_pharmacy_billing_issue_profilePic" for="x_profilePic" class="<?php echo $pharmacy_billing_issue_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_issue_profilePic" class="pharmacy_billing_issueadd" type="text/html"><span><?php echo $pharmacy_billing_issue->profilePic->caption() ?><?php echo ($pharmacy_billing_issue->profilePic->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_issue_add->RightColumnClass ?>"><div<?php echo $pharmacy_billing_issue->profilePic->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_profilePic" class="pharmacy_billing_issueadd" type="text/html">
<span id="el_pharmacy_billing_issue_profilePic">
<textarea data-table="pharmacy_billing_issue" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" cols="35" rows="4" placeholder="<?php echo HtmlEncode($pharmacy_billing_issue->profilePic->getPlaceHolder()) ?>"<?php echo $pharmacy_billing_issue->profilePic->editAttributes() ?>><?php echo $pharmacy_billing_issue->profilePic->EditValue ?></textarea>
</span>
</script>
<?php echo $pharmacy_billing_issue->profilePic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_issue->Mobile->Visible) { // Mobile ?>
	<div id="r_Mobile" class="form-group row">
		<label id="elh_pharmacy_billing_issue_Mobile" for="x_Mobile" class="<?php echo $pharmacy_billing_issue_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_issue_Mobile" class="pharmacy_billing_issueadd" type="text/html"><span><?php echo $pharmacy_billing_issue->Mobile->caption() ?><?php echo ($pharmacy_billing_issue->Mobile->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_issue_add->RightColumnClass ?>"><div<?php echo $pharmacy_billing_issue->Mobile->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_Mobile" class="pharmacy_billing_issueadd" type="text/html">
<span id="el_pharmacy_billing_issue_Mobile">
<input type="text" data-table="pharmacy_billing_issue" data-field="x_Mobile" name="x_Mobile" id="x_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_issue->Mobile->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_issue->Mobile->EditValue ?>"<?php echo $pharmacy_billing_issue->Mobile->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_issue->Mobile->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_issue->IP_OP->Visible) { // IP_OP ?>
	<div id="r_IP_OP" class="form-group row">
		<label id="elh_pharmacy_billing_issue_IP_OP" for="x_IP_OP" class="<?php echo $pharmacy_billing_issue_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_issue_IP_OP" class="pharmacy_billing_issueadd" type="text/html"><span><?php echo $pharmacy_billing_issue->IP_OP->caption() ?><?php echo ($pharmacy_billing_issue->IP_OP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_issue_add->RightColumnClass ?>"><div<?php echo $pharmacy_billing_issue->IP_OP->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_IP_OP" class="pharmacy_billing_issueadd" type="text/html">
<span id="el_pharmacy_billing_issue_IP_OP">
<input type="text" data-table="pharmacy_billing_issue" data-field="x_IP_OP" name="x_IP_OP" id="x_IP_OP" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_issue->IP_OP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_issue->IP_OP->EditValue ?>"<?php echo $pharmacy_billing_issue->IP_OP->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_issue->IP_OP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_issue->Doctor->Visible) { // Doctor ?>
	<div id="r_Doctor" class="form-group row">
		<label id="elh_pharmacy_billing_issue_Doctor" for="x_Doctor" class="<?php echo $pharmacy_billing_issue_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_issue_Doctor" class="pharmacy_billing_issueadd" type="text/html"><span><?php echo $pharmacy_billing_issue->Doctor->caption() ?><?php echo ($pharmacy_billing_issue->Doctor->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_issue_add->RightColumnClass ?>"><div<?php echo $pharmacy_billing_issue->Doctor->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_Doctor" class="pharmacy_billing_issueadd" type="text/html">
<span id="el_pharmacy_billing_issue_Doctor">
<input type="text" data-table="pharmacy_billing_issue" data-field="x_Doctor" name="x_Doctor" id="x_Doctor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_issue->Doctor->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_issue->Doctor->EditValue ?>"<?php echo $pharmacy_billing_issue->Doctor->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_issue->Doctor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_issue->voucher_type->Visible) { // voucher_type ?>
	<div id="r_voucher_type" class="form-group row">
		<label id="elh_pharmacy_billing_issue_voucher_type" for="x_voucher_type" class="<?php echo $pharmacy_billing_issue_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_issue_voucher_type" class="pharmacy_billing_issueadd" type="text/html"><span><?php echo $pharmacy_billing_issue->voucher_type->caption() ?><?php echo ($pharmacy_billing_issue->voucher_type->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_issue_add->RightColumnClass ?>"><div<?php echo $pharmacy_billing_issue->voucher_type->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_voucher_type" class="pharmacy_billing_issueadd" type="text/html">
<span id="el_pharmacy_billing_issue_voucher_type">
<input type="text" data-table="pharmacy_billing_issue" data-field="x_voucher_type" name="x_voucher_type" id="x_voucher_type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_issue->voucher_type->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_issue->voucher_type->EditValue ?>"<?php echo $pharmacy_billing_issue->voucher_type->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_issue->voucher_type->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_issue->Details->Visible) { // Details ?>
	<div id="r_Details" class="form-group row">
		<label id="elh_pharmacy_billing_issue_Details" for="x_Details" class="<?php echo $pharmacy_billing_issue_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_issue_Details" class="pharmacy_billing_issueadd" type="text/html"><span><?php echo $pharmacy_billing_issue->Details->caption() ?><?php echo ($pharmacy_billing_issue->Details->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_issue_add->RightColumnClass ?>"><div<?php echo $pharmacy_billing_issue->Details->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_Details" class="pharmacy_billing_issueadd" type="text/html">
<span id="el_pharmacy_billing_issue_Details">
<input type="text" data-table="pharmacy_billing_issue" data-field="x_Details" name="x_Details" id="x_Details" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_issue->Details->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_issue->Details->EditValue ?>"<?php echo $pharmacy_billing_issue->Details->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_issue->Details->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_issue->ModeofPayment->Visible) { // ModeofPayment ?>
	<div id="r_ModeofPayment" class="form-group row">
		<label id="elh_pharmacy_billing_issue_ModeofPayment" for="x_ModeofPayment" class="<?php echo $pharmacy_billing_issue_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_issue_ModeofPayment" class="pharmacy_billing_issueadd" type="text/html"><span><?php echo $pharmacy_billing_issue->ModeofPayment->caption() ?><?php echo ($pharmacy_billing_issue->ModeofPayment->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_issue_add->RightColumnClass ?>"><div<?php echo $pharmacy_billing_issue->ModeofPayment->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_ModeofPayment" class="pharmacy_billing_issueadd" type="text/html">
<span id="el_pharmacy_billing_issue_ModeofPayment">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy_billing_issue" data-field="x_ModeofPayment" data-value-separator="<?php echo $pharmacy_billing_issue->ModeofPayment->displayValueSeparatorAttribute() ?>" id="x_ModeofPayment" name="x_ModeofPayment"<?php echo $pharmacy_billing_issue->ModeofPayment->editAttributes() ?>>
		<?php echo $pharmacy_billing_issue->ModeofPayment->selectOptionListHtml("x_ModeofPayment") ?>
	</select>
</div>
</span>
</script>
<?php echo $pharmacy_billing_issue->ModeofPayment->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_issue->Amount->Visible) { // Amount ?>
	<div id="r_Amount" class="form-group row">
		<label id="elh_pharmacy_billing_issue_Amount" for="x_Amount" class="<?php echo $pharmacy_billing_issue_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_issue_Amount" class="pharmacy_billing_issueadd" type="text/html"><span><?php echo $pharmacy_billing_issue->Amount->caption() ?><?php echo ($pharmacy_billing_issue->Amount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_issue_add->RightColumnClass ?>"><div<?php echo $pharmacy_billing_issue->Amount->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_Amount" class="pharmacy_billing_issueadd" type="text/html">
<span id="el_pharmacy_billing_issue_Amount">
<input type="text" data-table="pharmacy_billing_issue" data-field="x_Amount" name="x_Amount" id="x_Amount" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_issue->Amount->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_issue->Amount->EditValue ?>"<?php echo $pharmacy_billing_issue->Amount->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_issue->Amount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_issue->AnyDues->Visible) { // AnyDues ?>
	<div id="r_AnyDues" class="form-group row">
		<label id="elh_pharmacy_billing_issue_AnyDues" for="x_AnyDues" class="<?php echo $pharmacy_billing_issue_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_issue_AnyDues" class="pharmacy_billing_issueadd" type="text/html"><span><?php echo $pharmacy_billing_issue->AnyDues->caption() ?><?php echo ($pharmacy_billing_issue->AnyDues->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_issue_add->RightColumnClass ?>"><div<?php echo $pharmacy_billing_issue->AnyDues->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_AnyDues" class="pharmacy_billing_issueadd" type="text/html">
<span id="el_pharmacy_billing_issue_AnyDues">
<input type="text" data-table="pharmacy_billing_issue" data-field="x_AnyDues" name="x_AnyDues" id="x_AnyDues" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_issue->AnyDues->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_issue->AnyDues->EditValue ?>"<?php echo $pharmacy_billing_issue->AnyDues->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_issue->AnyDues->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_issue->RealizationAmount->Visible) { // RealizationAmount ?>
	<div id="r_RealizationAmount" class="form-group row">
		<label id="elh_pharmacy_billing_issue_RealizationAmount" for="x_RealizationAmount" class="<?php echo $pharmacy_billing_issue_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_issue_RealizationAmount" class="pharmacy_billing_issueadd" type="text/html"><span><?php echo $pharmacy_billing_issue->RealizationAmount->caption() ?><?php echo ($pharmacy_billing_issue->RealizationAmount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_issue_add->RightColumnClass ?>"><div<?php echo $pharmacy_billing_issue->RealizationAmount->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_RealizationAmount" class="pharmacy_billing_issueadd" type="text/html">
<span id="el_pharmacy_billing_issue_RealizationAmount">
<input type="text" data-table="pharmacy_billing_issue" data-field="x_RealizationAmount" name="x_RealizationAmount" id="x_RealizationAmount" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_issue->RealizationAmount->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_issue->RealizationAmount->EditValue ?>"<?php echo $pharmacy_billing_issue->RealizationAmount->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_issue->RealizationAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_issue->RealizationStatus->Visible) { // RealizationStatus ?>
	<div id="r_RealizationStatus" class="form-group row">
		<label id="elh_pharmacy_billing_issue_RealizationStatus" for="x_RealizationStatus" class="<?php echo $pharmacy_billing_issue_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_issue_RealizationStatus" class="pharmacy_billing_issueadd" type="text/html"><span><?php echo $pharmacy_billing_issue->RealizationStatus->caption() ?><?php echo ($pharmacy_billing_issue->RealizationStatus->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_issue_add->RightColumnClass ?>"><div<?php echo $pharmacy_billing_issue->RealizationStatus->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_RealizationStatus" class="pharmacy_billing_issueadd" type="text/html">
<span id="el_pharmacy_billing_issue_RealizationStatus">
<input type="text" data-table="pharmacy_billing_issue" data-field="x_RealizationStatus" name="x_RealizationStatus" id="x_RealizationStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_issue->RealizationStatus->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_issue->RealizationStatus->EditValue ?>"<?php echo $pharmacy_billing_issue->RealizationStatus->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_issue->RealizationStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_issue->RealizationRemarks->Visible) { // RealizationRemarks ?>
	<div id="r_RealizationRemarks" class="form-group row">
		<label id="elh_pharmacy_billing_issue_RealizationRemarks" for="x_RealizationRemarks" class="<?php echo $pharmacy_billing_issue_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_issue_RealizationRemarks" class="pharmacy_billing_issueadd" type="text/html"><span><?php echo $pharmacy_billing_issue->RealizationRemarks->caption() ?><?php echo ($pharmacy_billing_issue->RealizationRemarks->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_issue_add->RightColumnClass ?>"><div<?php echo $pharmacy_billing_issue->RealizationRemarks->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_RealizationRemarks" class="pharmacy_billing_issueadd" type="text/html">
<span id="el_pharmacy_billing_issue_RealizationRemarks">
<input type="text" data-table="pharmacy_billing_issue" data-field="x_RealizationRemarks" name="x_RealizationRemarks" id="x_RealizationRemarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_issue->RealizationRemarks->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_issue->RealizationRemarks->EditValue ?>"<?php echo $pharmacy_billing_issue->RealizationRemarks->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_issue->RealizationRemarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_issue->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
	<div id="r_RealizationBatchNo" class="form-group row">
		<label id="elh_pharmacy_billing_issue_RealizationBatchNo" for="x_RealizationBatchNo" class="<?php echo $pharmacy_billing_issue_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_issue_RealizationBatchNo" class="pharmacy_billing_issueadd" type="text/html"><span><?php echo $pharmacy_billing_issue->RealizationBatchNo->caption() ?><?php echo ($pharmacy_billing_issue->RealizationBatchNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_issue_add->RightColumnClass ?>"><div<?php echo $pharmacy_billing_issue->RealizationBatchNo->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_RealizationBatchNo" class="pharmacy_billing_issueadd" type="text/html">
<span id="el_pharmacy_billing_issue_RealizationBatchNo">
<input type="text" data-table="pharmacy_billing_issue" data-field="x_RealizationBatchNo" name="x_RealizationBatchNo" id="x_RealizationBatchNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_issue->RealizationBatchNo->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_issue->RealizationBatchNo->EditValue ?>"<?php echo $pharmacy_billing_issue->RealizationBatchNo->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_issue->RealizationBatchNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_issue->RealizationDate->Visible) { // RealizationDate ?>
	<div id="r_RealizationDate" class="form-group row">
		<label id="elh_pharmacy_billing_issue_RealizationDate" for="x_RealizationDate" class="<?php echo $pharmacy_billing_issue_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_issue_RealizationDate" class="pharmacy_billing_issueadd" type="text/html"><span><?php echo $pharmacy_billing_issue->RealizationDate->caption() ?><?php echo ($pharmacy_billing_issue->RealizationDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_issue_add->RightColumnClass ?>"><div<?php echo $pharmacy_billing_issue->RealizationDate->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_RealizationDate" class="pharmacy_billing_issueadd" type="text/html">
<span id="el_pharmacy_billing_issue_RealizationDate">
<input type="text" data-table="pharmacy_billing_issue" data-field="x_RealizationDate" name="x_RealizationDate" id="x_RealizationDate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_issue->RealizationDate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_issue->RealizationDate->EditValue ?>"<?php echo $pharmacy_billing_issue->RealizationDate->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_issue->RealizationDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_issue->RIDNO->Visible) { // RIDNO ?>
	<div id="r_RIDNO" class="form-group row">
		<label id="elh_pharmacy_billing_issue_RIDNO" for="x_RIDNO" class="<?php echo $pharmacy_billing_issue_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_issue_RIDNO" class="pharmacy_billing_issueadd" type="text/html"><span><?php echo $pharmacy_billing_issue->RIDNO->caption() ?><?php echo ($pharmacy_billing_issue->RIDNO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_issue_add->RightColumnClass ?>"><div<?php echo $pharmacy_billing_issue->RIDNO->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_RIDNO" class="pharmacy_billing_issueadd" type="text/html">
<span id="el_pharmacy_billing_issue_RIDNO">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_RIDNO"><?php echo strval($pharmacy_billing_issue->RIDNO->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_billing_issue->RIDNO->ViewValue) : $pharmacy_billing_issue->RIDNO->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_billing_issue->RIDNO->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_billing_issue->RIDNO->ReadOnly || $pharmacy_billing_issue->RIDNO->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_RIDNO',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_billing_issue->RIDNO->Lookup->getParamTag("p_x_RIDNO") ?>
<input type="hidden" data-table="pharmacy_billing_issue" data-field="x_RIDNO" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_billing_issue->RIDNO->displayValueSeparatorAttribute() ?>" name="x_RIDNO" id="x_RIDNO" value="<?php echo $pharmacy_billing_issue->RIDNO->CurrentValue ?>"<?php echo $pharmacy_billing_issue->RIDNO->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_issue->RIDNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_issue->TidNo->Visible) { // TidNo ?>
	<div id="r_TidNo" class="form-group row">
		<label id="elh_pharmacy_billing_issue_TidNo" for="x_TidNo" class="<?php echo $pharmacy_billing_issue_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_issue_TidNo" class="pharmacy_billing_issueadd" type="text/html"><span><?php echo $pharmacy_billing_issue->TidNo->caption() ?><?php echo ($pharmacy_billing_issue->TidNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_issue_add->RightColumnClass ?>"><div<?php echo $pharmacy_billing_issue->TidNo->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_TidNo" class="pharmacy_billing_issueadd" type="text/html">
<span id="el_pharmacy_billing_issue_TidNo">
<input type="text" data-table="pharmacy_billing_issue" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_issue->TidNo->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_issue->TidNo->EditValue ?>"<?php echo $pharmacy_billing_issue->TidNo->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_issue->TidNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_issue->CId->Visible) { // CId ?>
	<div id="r_CId" class="form-group row">
		<label id="elh_pharmacy_billing_issue_CId" for="x_CId" class="<?php echo $pharmacy_billing_issue_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_issue_CId" class="pharmacy_billing_issueadd" type="text/html"><span><?php echo $pharmacy_billing_issue->CId->caption() ?><?php echo ($pharmacy_billing_issue->CId->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_issue_add->RightColumnClass ?>"><div<?php echo $pharmacy_billing_issue->CId->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_CId" class="pharmacy_billing_issueadd" type="text/html">
<span id="el_pharmacy_billing_issue_CId">
<?php $pharmacy_billing_issue->CId->EditAttrs["onchange"] = "ew.autoFill(this);" . @$pharmacy_billing_issue->CId->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_CId"><?php echo strval($pharmacy_billing_issue->CId->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_billing_issue->CId->ViewValue) : $pharmacy_billing_issue->CId->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_billing_issue->CId->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_billing_issue->CId->ReadOnly || $pharmacy_billing_issue->CId->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_CId',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_billing_issue->CId->Lookup->getParamTag("p_x_CId") ?>
<input type="hidden" data-table="pharmacy_billing_issue" data-field="x_CId" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_billing_issue->CId->displayValueSeparatorAttribute() ?>" name="x_CId" id="x_CId" value="<?php echo $pharmacy_billing_issue->CId->CurrentValue ?>"<?php echo $pharmacy_billing_issue->CId->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_issue->CId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_issue->PartnerName->Visible) { // PartnerName ?>
	<div id="r_PartnerName" class="form-group row">
		<label id="elh_pharmacy_billing_issue_PartnerName" for="x_PartnerName" class="<?php echo $pharmacy_billing_issue_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_issue_PartnerName" class="pharmacy_billing_issueadd" type="text/html"><span><?php echo $pharmacy_billing_issue->PartnerName->caption() ?><?php echo ($pharmacy_billing_issue->PartnerName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_issue_add->RightColumnClass ?>"><div<?php echo $pharmacy_billing_issue->PartnerName->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_PartnerName" class="pharmacy_billing_issueadd" type="text/html">
<span id="el_pharmacy_billing_issue_PartnerName">
<input type="text" data-table="pharmacy_billing_issue" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_issue->PartnerName->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_issue->PartnerName->EditValue ?>"<?php echo $pharmacy_billing_issue->PartnerName->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_issue->PartnerName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_issue->PayerType->Visible) { // PayerType ?>
	<div id="r_PayerType" class="form-group row">
		<label id="elh_pharmacy_billing_issue_PayerType" for="x_PayerType" class="<?php echo $pharmacy_billing_issue_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_issue_PayerType" class="pharmacy_billing_issueadd" type="text/html"><span><?php echo $pharmacy_billing_issue->PayerType->caption() ?><?php echo ($pharmacy_billing_issue->PayerType->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_issue_add->RightColumnClass ?>"><div<?php echo $pharmacy_billing_issue->PayerType->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_PayerType" class="pharmacy_billing_issueadd" type="text/html">
<span id="el_pharmacy_billing_issue_PayerType">
<input type="text" data-table="pharmacy_billing_issue" data-field="x_PayerType" name="x_PayerType" id="x_PayerType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_issue->PayerType->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_issue->PayerType->EditValue ?>"<?php echo $pharmacy_billing_issue->PayerType->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_issue->PayerType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_issue->Dob->Visible) { // Dob ?>
	<div id="r_Dob" class="form-group row">
		<label id="elh_pharmacy_billing_issue_Dob" for="x_Dob" class="<?php echo $pharmacy_billing_issue_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_issue_Dob" class="pharmacy_billing_issueadd" type="text/html"><span><?php echo $pharmacy_billing_issue->Dob->caption() ?><?php echo ($pharmacy_billing_issue->Dob->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_issue_add->RightColumnClass ?>"><div<?php echo $pharmacy_billing_issue->Dob->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_Dob" class="pharmacy_billing_issueadd" type="text/html">
<span id="el_pharmacy_billing_issue_Dob">
<input type="text" data-table="pharmacy_billing_issue" data-field="x_Dob" name="x_Dob" id="x_Dob" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_issue->Dob->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_issue->Dob->EditValue ?>"<?php echo $pharmacy_billing_issue->Dob->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_issue->Dob->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_issue->Currency->Visible) { // Currency ?>
	<div id="r_Currency" class="form-group row">
		<label id="elh_pharmacy_billing_issue_Currency" for="x_Currency" class="<?php echo $pharmacy_billing_issue_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_issue_Currency" class="pharmacy_billing_issueadd" type="text/html"><span><?php echo $pharmacy_billing_issue->Currency->caption() ?><?php echo ($pharmacy_billing_issue->Currency->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_issue_add->RightColumnClass ?>"><div<?php echo $pharmacy_billing_issue->Currency->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_Currency" class="pharmacy_billing_issueadd" type="text/html">
<span id="el_pharmacy_billing_issue_Currency">
<input type="text" data-table="pharmacy_billing_issue" data-field="x_Currency" name="x_Currency" id="x_Currency" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_issue->Currency->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_issue->Currency->EditValue ?>"<?php echo $pharmacy_billing_issue->Currency->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_issue->Currency->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_issue->DiscountRemarks->Visible) { // DiscountRemarks ?>
	<div id="r_DiscountRemarks" class="form-group row">
		<label id="elh_pharmacy_billing_issue_DiscountRemarks" for="x_DiscountRemarks" class="<?php echo $pharmacy_billing_issue_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_issue_DiscountRemarks" class="pharmacy_billing_issueadd" type="text/html"><span><?php echo $pharmacy_billing_issue->DiscountRemarks->caption() ?><?php echo ($pharmacy_billing_issue->DiscountRemarks->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_issue_add->RightColumnClass ?>"><div<?php echo $pharmacy_billing_issue->DiscountRemarks->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_DiscountRemarks" class="pharmacy_billing_issueadd" type="text/html">
<span id="el_pharmacy_billing_issue_DiscountRemarks">
<input type="text" data-table="pharmacy_billing_issue" data-field="x_DiscountRemarks" name="x_DiscountRemarks" id="x_DiscountRemarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_issue->DiscountRemarks->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_issue->DiscountRemarks->EditValue ?>"<?php echo $pharmacy_billing_issue->DiscountRemarks->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_issue->DiscountRemarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_issue->Remarks->Visible) { // Remarks ?>
	<div id="r_Remarks" class="form-group row">
		<label id="elh_pharmacy_billing_issue_Remarks" for="x_Remarks" class="<?php echo $pharmacy_billing_issue_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_issue_Remarks" class="pharmacy_billing_issueadd" type="text/html"><span><?php echo $pharmacy_billing_issue->Remarks->caption() ?><?php echo ($pharmacy_billing_issue->Remarks->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_issue_add->RightColumnClass ?>"><div<?php echo $pharmacy_billing_issue->Remarks->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_Remarks" class="pharmacy_billing_issueadd" type="text/html">
<span id="el_pharmacy_billing_issue_Remarks">
<input type="text" data-table="pharmacy_billing_issue" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_issue->Remarks->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_issue->Remarks->EditValue ?>"<?php echo $pharmacy_billing_issue->Remarks->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_issue->Remarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_issue->PatId->Visible) { // PatId ?>
	<div id="r_PatId" class="form-group row">
		<label id="elh_pharmacy_billing_issue_PatId" for="x_PatId" class="<?php echo $pharmacy_billing_issue_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_issue_PatId" class="pharmacy_billing_issueadd" type="text/html"><span><?php echo $pharmacy_billing_issue->PatId->caption() ?><?php echo ($pharmacy_billing_issue->PatId->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_issue_add->RightColumnClass ?>"><div<?php echo $pharmacy_billing_issue->PatId->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_PatId" class="pharmacy_billing_issueadd" type="text/html">
<span id="el_pharmacy_billing_issue_PatId">
<?php $pharmacy_billing_issue->PatId->EditAttrs["onchange"] = "ew.autoFill(this);" . @$pharmacy_billing_issue->PatId->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_PatId"><?php echo strval($pharmacy_billing_issue->PatId->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_billing_issue->PatId->ViewValue) : $pharmacy_billing_issue->PatId->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_billing_issue->PatId->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_billing_issue->PatId->ReadOnly || $pharmacy_billing_issue->PatId->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_PatId',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_billing_issue->PatId->Lookup->getParamTag("p_x_PatId") ?>
<input type="hidden" data-table="pharmacy_billing_issue" data-field="x_PatId" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_billing_issue->PatId->displayValueSeparatorAttribute() ?>" name="x_PatId" id="x_PatId" value="<?php echo $pharmacy_billing_issue->PatId->CurrentValue ?>"<?php echo $pharmacy_billing_issue->PatId->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_issue->PatId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_issue->DrDepartment->Visible) { // DrDepartment ?>
	<div id="r_DrDepartment" class="form-group row">
		<label id="elh_pharmacy_billing_issue_DrDepartment" for="x_DrDepartment" class="<?php echo $pharmacy_billing_issue_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_issue_DrDepartment" class="pharmacy_billing_issueadd" type="text/html"><span><?php echo $pharmacy_billing_issue->DrDepartment->caption() ?><?php echo ($pharmacy_billing_issue->DrDepartment->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_issue_add->RightColumnClass ?>"><div<?php echo $pharmacy_billing_issue->DrDepartment->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_DrDepartment" class="pharmacy_billing_issueadd" type="text/html">
<span id="el_pharmacy_billing_issue_DrDepartment">
<input type="text" data-table="pharmacy_billing_issue" data-field="x_DrDepartment" name="x_DrDepartment" id="x_DrDepartment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_issue->DrDepartment->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_issue->DrDepartment->EditValue ?>"<?php echo $pharmacy_billing_issue->DrDepartment->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_issue->DrDepartment->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_issue->RefferedBy->Visible) { // RefferedBy ?>
	<div id="r_RefferedBy" class="form-group row">
		<label id="elh_pharmacy_billing_issue_RefferedBy" for="x_RefferedBy" class="<?php echo $pharmacy_billing_issue_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_issue_RefferedBy" class="pharmacy_billing_issueadd" type="text/html"><span><?php echo $pharmacy_billing_issue->RefferedBy->caption() ?><?php echo ($pharmacy_billing_issue->RefferedBy->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_issue_add->RightColumnClass ?>"><div<?php echo $pharmacy_billing_issue->RefferedBy->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_RefferedBy" class="pharmacy_billing_issueadd" type="text/html">
<span id="el_pharmacy_billing_issue_RefferedBy">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_RefferedBy"><?php echo strval($pharmacy_billing_issue->RefferedBy->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_billing_issue->RefferedBy->ViewValue) : $pharmacy_billing_issue->RefferedBy->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_billing_issue->RefferedBy->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_billing_issue->RefferedBy->ReadOnly || $pharmacy_billing_issue->RefferedBy->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_RefferedBy',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
<?php if (AllowAdd(CurrentProjectID() . "mas_reference_type") && !$pharmacy_billing_issue->RefferedBy->ReadOnly) { ?>
<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_RefferedBy" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $pharmacy_billing_issue->RefferedBy->caption() ?>" data-title="<?php echo $pharmacy_billing_issue->RefferedBy->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_RefferedBy',url:'mas_reference_typeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button>
<?php } ?>
	</div>
</div>
<?php echo $pharmacy_billing_issue->RefferedBy->Lookup->getParamTag("p_x_RefferedBy") ?>
<input type="hidden" data-table="pharmacy_billing_issue" data-field="x_RefferedBy" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_billing_issue->RefferedBy->displayValueSeparatorAttribute() ?>" name="x_RefferedBy" id="x_RefferedBy" value="<?php echo $pharmacy_billing_issue->RefferedBy->CurrentValue ?>"<?php echo $pharmacy_billing_issue->RefferedBy->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_issue->RefferedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_issue->BillNumber->Visible) { // BillNumber ?>
	<div id="r_BillNumber" class="form-group row">
		<label id="elh_pharmacy_billing_issue_BillNumber" for="x_BillNumber" class="<?php echo $pharmacy_billing_issue_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_issue_BillNumber" class="pharmacy_billing_issueadd" type="text/html"><span><?php echo $pharmacy_billing_issue->BillNumber->caption() ?><?php echo ($pharmacy_billing_issue->BillNumber->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_issue_add->RightColumnClass ?>"><div<?php echo $pharmacy_billing_issue->BillNumber->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_BillNumber" class="pharmacy_billing_issueadd" type="text/html">
<span id="el_pharmacy_billing_issue_BillNumber">
<input type="text" data-table="pharmacy_billing_issue" data-field="x_BillNumber" name="x_BillNumber" id="x_BillNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_issue->BillNumber->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_issue->BillNumber->EditValue ?>"<?php echo $pharmacy_billing_issue->BillNumber->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_issue->BillNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_issue->CardNumber->Visible) { // CardNumber ?>
	<div id="r_CardNumber" class="form-group row">
		<label id="elh_pharmacy_billing_issue_CardNumber" for="x_CardNumber" class="<?php echo $pharmacy_billing_issue_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_issue_CardNumber" class="pharmacy_billing_issueadd" type="text/html"><span><?php echo $pharmacy_billing_issue->CardNumber->caption() ?><?php echo ($pharmacy_billing_issue->CardNumber->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_issue_add->RightColumnClass ?>"><div<?php echo $pharmacy_billing_issue->CardNumber->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_CardNumber" class="pharmacy_billing_issueadd" type="text/html">
<span id="el_pharmacy_billing_issue_CardNumber">
<input type="text" data-table="pharmacy_billing_issue" data-field="x_CardNumber" name="x_CardNumber" id="x_CardNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_issue->CardNumber->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_issue->CardNumber->EditValue ?>"<?php echo $pharmacy_billing_issue->CardNumber->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_issue->CardNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_issue->BankName->Visible) { // BankName ?>
	<div id="r_BankName" class="form-group row">
		<label id="elh_pharmacy_billing_issue_BankName" for="x_BankName" class="<?php echo $pharmacy_billing_issue_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_issue_BankName" class="pharmacy_billing_issueadd" type="text/html"><span><?php echo $pharmacy_billing_issue->BankName->caption() ?><?php echo ($pharmacy_billing_issue->BankName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_issue_add->RightColumnClass ?>"><div<?php echo $pharmacy_billing_issue->BankName->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_BankName" class="pharmacy_billing_issueadd" type="text/html">
<span id="el_pharmacy_billing_issue_BankName">
<input type="text" data-table="pharmacy_billing_issue" data-field="x_BankName" name="x_BankName" id="x_BankName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_issue->BankName->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_issue->BankName->EditValue ?>"<?php echo $pharmacy_billing_issue->BankName->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_issue->BankName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_issue->DrID->Visible) { // DrID ?>
	<div id="r_DrID" class="form-group row">
		<label id="elh_pharmacy_billing_issue_DrID" for="x_DrID" class="<?php echo $pharmacy_billing_issue_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_issue_DrID" class="pharmacy_billing_issueadd" type="text/html"><span><?php echo $pharmacy_billing_issue->DrID->caption() ?><?php echo ($pharmacy_billing_issue->DrID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_issue_add->RightColumnClass ?>"><div<?php echo $pharmacy_billing_issue->DrID->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_DrID" class="pharmacy_billing_issueadd" type="text/html">
<span id="el_pharmacy_billing_issue_DrID">
<?php $pharmacy_billing_issue->DrID->EditAttrs["onchange"] = "ew.autoFill(this);" . @$pharmacy_billing_issue->DrID->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_DrID"><?php echo strval($pharmacy_billing_issue->DrID->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_billing_issue->DrID->ViewValue) : $pharmacy_billing_issue->DrID->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_billing_issue->DrID->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_billing_issue->DrID->ReadOnly || $pharmacy_billing_issue->DrID->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_DrID',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_billing_issue->DrID->Lookup->getParamTag("p_x_DrID") ?>
<input type="hidden" data-table="pharmacy_billing_issue" data-field="x_DrID" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_billing_issue->DrID->displayValueSeparatorAttribute() ?>" name="x_DrID" id="x_DrID" value="<?php echo $pharmacy_billing_issue->DrID->CurrentValue ?>"<?php echo $pharmacy_billing_issue->DrID->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_issue->DrID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_issue->BillStatus->Visible) { // BillStatus ?>
	<div id="r_BillStatus" class="form-group row">
		<label id="elh_pharmacy_billing_issue_BillStatus" for="x_BillStatus" class="<?php echo $pharmacy_billing_issue_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_issue_BillStatus" class="pharmacy_billing_issueadd" type="text/html"><span><?php echo $pharmacy_billing_issue->BillStatus->caption() ?><?php echo ($pharmacy_billing_issue->BillStatus->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_issue_add->RightColumnClass ?>"><div<?php echo $pharmacy_billing_issue->BillStatus->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_BillStatus" class="pharmacy_billing_issueadd" type="text/html">
<span id="el_pharmacy_billing_issue_BillStatus">
<input type="text" data-table="pharmacy_billing_issue" data-field="x_BillStatus" name="x_BillStatus" id="x_BillStatus" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_issue->BillStatus->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_issue->BillStatus->EditValue ?>"<?php echo $pharmacy_billing_issue->BillStatus->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_issue->BillStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_issue->ReportHeader->Visible) { // ReportHeader ?>
	<div id="r_ReportHeader" class="form-group row">
		<label id="elh_pharmacy_billing_issue_ReportHeader" class="<?php echo $pharmacy_billing_issue_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_issue_ReportHeader" class="pharmacy_billing_issueadd" type="text/html"><span><?php echo $pharmacy_billing_issue->ReportHeader->caption() ?><?php echo ($pharmacy_billing_issue->ReportHeader->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_issue_add->RightColumnClass ?>"><div<?php echo $pharmacy_billing_issue->ReportHeader->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_ReportHeader" class="pharmacy_billing_issueadd" type="text/html">
<span id="el_pharmacy_billing_issue_ReportHeader">
<div id="tp_x_ReportHeader" class="ew-template"><input type="checkbox" class="form-check-input" data-table="pharmacy_billing_issue" data-field="x_ReportHeader" data-value-separator="<?php echo $pharmacy_billing_issue->ReportHeader->displayValueSeparatorAttribute() ?>" name="x_ReportHeader[]" id="x_ReportHeader[]" value="{value}"<?php echo $pharmacy_billing_issue->ReportHeader->editAttributes() ?>></div>
<div id="dsl_x_ReportHeader" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $pharmacy_billing_issue->ReportHeader->checkBoxListHtml(FALSE, "x_ReportHeader[]") ?>
</div></div>
</span>
</script>
<?php echo $pharmacy_billing_issue->ReportHeader->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_issue->PharID->Visible) { // PharID ?>
	<div id="r_PharID" class="form-group row">
		<label id="elh_pharmacy_billing_issue_PharID" for="x_PharID" class="<?php echo $pharmacy_billing_issue_add->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_issue_PharID" class="pharmacy_billing_issueadd" type="text/html"><span><?php echo $pharmacy_billing_issue->PharID->caption() ?><?php echo ($pharmacy_billing_issue->PharID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_issue_add->RightColumnClass ?>"><div<?php echo $pharmacy_billing_issue->PharID->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_PharID" class="pharmacy_billing_issueadd" type="text/html">
<span id="el_pharmacy_billing_issue_PharID">
<input type="text" data-table="pharmacy_billing_issue" data-field="x_PharID" name="x_PharID" id="x_PharID" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_issue->PharID->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_issue->PharID->EditValue ?>"<?php echo $pharmacy_billing_issue->PharID->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_issue->PharID->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_pharmacy_billing_issueadd" class="ew-custom-template"></div>
<script id="tpm_pharmacy_billing_issueadd" type="text/html">
<div id="ct_pharmacy_billing_issue_add"><style>
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
</style>
<div class="row">
	<div class="col-4">
		<h3 class="card-title">{{include tmpl="#tpc_pharmacy_billing_issue_PatId"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_issue_PatId"/}}</h3>
	</div>
		<div class="col-4">
		<h3 class="card-title">{{include tmpl="#tpc_pharmacy_billing_issue_RIDNO"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_issue_RIDNO"/}}</h3>
	</div>
		<div class="col-4">
		<h3 class="card-title">{{include tmpl="#tpc_pharmacy_billing_issue_CId"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_issue_CId"/}}</h3>
	</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#229954">
				<h3 class="card-title">Patient Details</h3>
			</div>
			<div class="card-body">
<table class="ew-table">
	 <tbody>
		<tr>
		<td>{{include tmpl="#tpc_pharmacy_billing_issue_PatientId"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_issue_PatientId"/}}</td>
			<td>{{include tmpl="#tpc_pharmacy_billing_issue_PatientName"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_issue_PatientName"/}}</td>
			<td>{{include tmpl="#tpc_pharmacy_billing_issue_Mobile"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_issue_Mobile"/}}</td>
		</tr>
		<tr>
			<td>{{include tmpl="#tpc_pharmacy_billing_issue_Dob"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_issue_Dob"/}}</td>
		<td>{{include tmpl="#tpc_pharmacy_billing_issue_Age"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_issue_Age"/}}</td>
			<td>{{include tmpl="#tpc_pharmacy_billing_issue_Gender"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_issue_Gender"/}}</td>
		</tr>
		<tr>
			<td>{{include tmpl="#tpc_pharmacy_billing_issue_PartnerName"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_issue_PartnerName"/}}</td>
			<td>{{include tmpl="#tpc_pharmacy_billing_issue_PayerType"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_issue_PayerType"/}}</td>
			<td>{{include tmpl="#tpc_pharmacy_billing_issue_RefferedBy"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_issue_RefferedBy"/}}</td>
			<td></td>
		</tr>
		 <tr>
		 	<td>{{include tmpl="#tpc_pharmacy_billing_issue_DrID"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_issue_DrID"/}}</td>
			<td>{{include tmpl="#tpc_pharmacy_billing_issue_Doctor"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_issue_Doctor"/}}</td>
			<td>{{include tmpl="#tpc_pharmacy_billing_issue_DrDepartment"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_issue_DrDepartment"/}}</td>
		</tr>
	</tbody>
</table>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
{{include tmpl="#tpc_pharmacy_billing_issue_ReportHeader"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_issue_ReportHeader"/}}
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header"  style="background-color:#D68910">
				<h3 class="card-title">Issue Details</h3>
			</div>
			<div class="card-body">
<table class="ew-table">
	 <tbody>
		<tr>
			<td>{{include tmpl="#tpc_pharmacy_billing_issue_ModeofPayment"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_issue_ModeofPayment"/}}</td>
			<td>{{include tmpl="#tpc_pharmacy_billing_issue_Amount"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_issue_Amount"/}}</td>
			<td>{{include tmpl="#tpc_pharmacy_billing_issue_AnyDues"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_issue_AnyDues"/}}</td>
		</tr>
		<tr>
			<td>{{include tmpl="#tpc_pharmacy_billing_issue_DiscountRemarks"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_issue_DiscountRemarks"/}}</td>
			<td>{{include tmpl="#tpc_pharmacy_billing_issue_Remarks"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_issue_Remarks"/}}</td>
			<td></td>
		</tr>
	</tbody>
</table>
			</div>
		</div>
	</div>
</div>
<div id="viewBankName" class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header"  style="background-color:#E706B7">
				<h3 id="viewBankDetails" class="card-title">BankName</h3>
			</div>
			<div class="card-body">
<table class="ew-table">
	 <tbody>
		<tr>
			<td>{{include tmpl="#tpc_pharmacy_billing_issue_CardNumber"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_issue_CardNumber"/}}</td>
			<td>{{include tmpl="#tpc_pharmacy_billing_issue_BankName"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_issue_BankName"/}}</td>
		</tr>
	</tbody>
</table>
			</div>
		</div>
	</div>
</div>
</div>
</script>
<?php
	if (in_array("pharmacy_pharled", explode(",", $pharmacy_billing_issue->getCurrentDetailTable())) && $pharmacy_pharled->DetailAdd) {
?>
<?php if ($pharmacy_billing_issue->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("pharmacy_pharled", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "pharmacy_pharledgrid.php" ?>
<?php } ?>
<?php if (!$pharmacy_billing_issue_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $pharmacy_billing_issue_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pharmacy_billing_issue_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($pharmacy_billing_issue->Rows) ?> };
ew.applyTemplate("tpd_pharmacy_billing_issueadd", "tpm_pharmacy_billing_issueadd", "pharmacy_billing_issueadd", "<?php echo $pharmacy_billing_issue->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.pharmacy_billing_issueadd_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$pharmacy_billing_issue_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");
// Write your table-specific startup script here
// document.write("page loaded");

 document.getElementById("viewBankName").style.display = "none";
$("[data-name='PRC']").hide();
$("[data-name='UR']").hide();
$("[data-name='Product']").hide();
$("[data-name='baid']").hide();
  $("[data-name='isdate']").hide();
  $("[data-name='PCGST']").hide();
  $("[data-name='PSGST']").hide();
  $("[data-name='PUnit']").hide();
  $("[data-name='PurRate']").hide();
  $("[data-name='PurValue']").hide();
  $("[data-name='SCGST']").hide();
  $("[data-name='SSGST']").hide();
  $("[data-name='SUnit']").hide();

function addtotalSum()
{	
	var totSum = 0;
	for (var i = 1; i < 40; i++) {
			try {
				var amount = document.getElementById("x" + i + "_DAMT");
				if (amount.value != '') {
					totSum = parseInt(totSum) + parseInt(amount.value);
				 var SiNo = document.getElementById("x" + i + "_SiNo");
				 SiNo.value = i;
				}
				var RT = document.getElementById("x" + i + "_RT");
				var Product = document.getElementById("sv_x" + i + "_Product").value;
				if (Product != '') {
				 var SiNo = document.getElementById("x" + i + "_SiNo");
				 SiNo.value = i;
				 }
			}
			catch(err) {
			}
	}
		var BillAmount = document.getElementById("x_Amount");
		BillAmount.value = totSum;
}
var HospitalIDDD = '<?php echo HospitalID(); ?>';
var grpButton = '<input type="hidden" id="HospitalIDDD" name="HospitalIDDD" value="'+HospitalIDDD+'">';
		var searchfrm = document.getElementById("tbl_view_patient_servicesgrid");
		var node = document.createElement("div");
		node.innerHTML = grpButton;    
		searchfrm.appendChild(node);
 </script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
 <script>
$("button").click(function(e) { 
	var id = $(this).attr('id');
			var form = this;
		e.preventDefault();
		if (id == 'btn-action') {
			swal({
				title: "Are you want to save?",
				text: "----",
				type: "warning",
				confirmButtonText: "Yes, Save!",
				showCancelButton: true
			})
				.then((result) => {
					if (result.value) {

						//form.submit();
						$("#fpharmacy_billing_issueadd").submit();
					} else if (result.dismiss === 'cancel') {
						swal(
							'Cancelled',
							'----',
							'error'
						)
					}
				})
		}
	});
</script>
<?php include_once "footer.php" ?>
<?php
$pharmacy_billing_issue_add->terminate();
?>