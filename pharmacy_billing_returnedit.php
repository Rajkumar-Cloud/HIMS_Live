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
$pharmacy_billing_return_edit = new pharmacy_billing_return_edit();

// Run the page
$pharmacy_billing_return_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_billing_return_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fpharmacy_billing_returnedit = currentForm = new ew.Form("fpharmacy_billing_returnedit", "edit");

// Validate form
fpharmacy_billing_returnedit.validate = function() {
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
		<?php if ($pharmacy_billing_return_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return->id->caption(), $pharmacy_billing_return->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_return_edit->Reception->Required) { ?>
			elm = this.getElements("x" + infix + "_Reception");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return->Reception->caption(), $pharmacy_billing_return->Reception->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_return_edit->PatientId->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return->PatientId->caption(), $pharmacy_billing_return->PatientId->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_return_edit->mrnno->Required) { ?>
			elm = this.getElements("x" + infix + "_mrnno");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return->mrnno->caption(), $pharmacy_billing_return->mrnno->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_return_edit->PatientName->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return->PatientName->caption(), $pharmacy_billing_return->PatientName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_return_edit->Age->Required) { ?>
			elm = this.getElements("x" + infix + "_Age");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return->Age->caption(), $pharmacy_billing_return->Age->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_return_edit->Gender->Required) { ?>
			elm = this.getElements("x" + infix + "_Gender");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return->Gender->caption(), $pharmacy_billing_return->Gender->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_return_edit->profilePic->Required) { ?>
			elm = this.getElements("x" + infix + "_profilePic");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return->profilePic->caption(), $pharmacy_billing_return->profilePic->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_return_edit->Mobile->Required) { ?>
			elm = this.getElements("x" + infix + "_Mobile");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return->Mobile->caption(), $pharmacy_billing_return->Mobile->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_return_edit->IP_OP->Required) { ?>
			elm = this.getElements("x" + infix + "_IP_OP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return->IP_OP->caption(), $pharmacy_billing_return->IP_OP->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_return_edit->Doctor->Required) { ?>
			elm = this.getElements("x" + infix + "_Doctor");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return->Doctor->caption(), $pharmacy_billing_return->Doctor->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_return_edit->voucher_type->Required) { ?>
			elm = this.getElements("x" + infix + "_voucher_type");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return->voucher_type->caption(), $pharmacy_billing_return->voucher_type->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_return_edit->Details->Required) { ?>
			elm = this.getElements("x" + infix + "_Details");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return->Details->caption(), $pharmacy_billing_return->Details->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_return_edit->ModeofPayment->Required) { ?>
			elm = this.getElements("x" + infix + "_ModeofPayment");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return->ModeofPayment->caption(), $pharmacy_billing_return->ModeofPayment->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_return_edit->Amount->Required) { ?>
			elm = this.getElements("x" + infix + "_Amount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return->Amount->caption(), $pharmacy_billing_return->Amount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Amount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_billing_return->Amount->errorMessage()) ?>");
		<?php if ($pharmacy_billing_return_edit->AnyDues->Required) { ?>
			elm = this.getElements("x" + infix + "_AnyDues");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return->AnyDues->caption(), $pharmacy_billing_return->AnyDues->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_return_edit->createdby->Required) { ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return->createdby->caption(), $pharmacy_billing_return->createdby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_return_edit->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return->createddatetime->caption(), $pharmacy_billing_return->createddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_return_edit->modifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return->modifiedby->caption(), $pharmacy_billing_return->modifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_return_edit->modifieddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return->modifieddatetime->caption(), $pharmacy_billing_return->modifieddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_return_edit->RealizationAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_RealizationAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return->RealizationAmount->caption(), $pharmacy_billing_return->RealizationAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RealizationAmount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_billing_return->RealizationAmount->errorMessage()) ?>");
		<?php if ($pharmacy_billing_return_edit->RealizationStatus->Required) { ?>
			elm = this.getElements("x" + infix + "_RealizationStatus");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return->RealizationStatus->caption(), $pharmacy_billing_return->RealizationStatus->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_return_edit->RealizationRemarks->Required) { ?>
			elm = this.getElements("x" + infix + "_RealizationRemarks");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return->RealizationRemarks->caption(), $pharmacy_billing_return->RealizationRemarks->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_return_edit->RealizationBatchNo->Required) { ?>
			elm = this.getElements("x" + infix + "_RealizationBatchNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return->RealizationBatchNo->caption(), $pharmacy_billing_return->RealizationBatchNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_return_edit->RealizationDate->Required) { ?>
			elm = this.getElements("x" + infix + "_RealizationDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return->RealizationDate->caption(), $pharmacy_billing_return->RealizationDate->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_return_edit->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return->HospID->caption(), $pharmacy_billing_return->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_return_edit->RIDNO->Required) { ?>
			elm = this.getElements("x" + infix + "_RIDNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return->RIDNO->caption(), $pharmacy_billing_return->RIDNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_return_edit->TidNo->Required) { ?>
			elm = this.getElements("x" + infix + "_TidNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return->TidNo->caption(), $pharmacy_billing_return->TidNo->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TidNo");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_billing_return->TidNo->errorMessage()) ?>");
		<?php if ($pharmacy_billing_return_edit->CId->Required) { ?>
			elm = this.getElements("x" + infix + "_CId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return->CId->caption(), $pharmacy_billing_return->CId->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_return_edit->PartnerName->Required) { ?>
			elm = this.getElements("x" + infix + "_PartnerName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return->PartnerName->caption(), $pharmacy_billing_return->PartnerName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_return_edit->PayerType->Required) { ?>
			elm = this.getElements("x" + infix + "_PayerType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return->PayerType->caption(), $pharmacy_billing_return->PayerType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_return_edit->Dob->Required) { ?>
			elm = this.getElements("x" + infix + "_Dob");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return->Dob->caption(), $pharmacy_billing_return->Dob->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_return_edit->Currency->Required) { ?>
			elm = this.getElements("x" + infix + "_Currency");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return->Currency->caption(), $pharmacy_billing_return->Currency->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_return_edit->DiscountRemarks->Required) { ?>
			elm = this.getElements("x" + infix + "_DiscountRemarks");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return->DiscountRemarks->caption(), $pharmacy_billing_return->DiscountRemarks->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_return_edit->Remarks->Required) { ?>
			elm = this.getElements("x" + infix + "_Remarks");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return->Remarks->caption(), $pharmacy_billing_return->Remarks->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_return_edit->PatId->Required) { ?>
			elm = this.getElements("x" + infix + "_PatId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return->PatId->caption(), $pharmacy_billing_return->PatId->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_return_edit->DrDepartment->Required) { ?>
			elm = this.getElements("x" + infix + "_DrDepartment");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return->DrDepartment->caption(), $pharmacy_billing_return->DrDepartment->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_return_edit->RefferedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_RefferedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return->RefferedBy->caption(), $pharmacy_billing_return->RefferedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_return_edit->BillNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_BillNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return->BillNumber->caption(), $pharmacy_billing_return->BillNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_return_edit->CardNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_CardNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return->CardNumber->caption(), $pharmacy_billing_return->CardNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_return_edit->BankName->Required) { ?>
			elm = this.getElements("x" + infix + "_BankName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return->BankName->caption(), $pharmacy_billing_return->BankName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_return_edit->DrID->Required) { ?>
			elm = this.getElements("x" + infix + "_DrID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return->DrID->caption(), $pharmacy_billing_return->DrID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_return_edit->BillStatus->Required) { ?>
			elm = this.getElements("x" + infix + "_BillStatus");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return->BillStatus->caption(), $pharmacy_billing_return->BillStatus->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BillStatus");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_billing_return->BillStatus->errorMessage()) ?>");
		<?php if ($pharmacy_billing_return_edit->ReportHeader->Required) { ?>
			elm = this.getElements("x" + infix + "_ReportHeader[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return->ReportHeader->caption(), $pharmacy_billing_return->ReportHeader->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_billing_return_edit->PharID->Required) { ?>
			elm = this.getElements("x" + infix + "_PharID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_billing_return->PharID->caption(), $pharmacy_billing_return->PharID->RequiredErrorMessage)) ?>");
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
fpharmacy_billing_returnedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_billing_returnedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpharmacy_billing_returnedit.lists["x_Reception"] = <?php echo $pharmacy_billing_return_edit->Reception->Lookup->toClientList() ?>;
fpharmacy_billing_returnedit.lists["x_Reception"].options = <?php echo JsonEncode($pharmacy_billing_return_edit->Reception->lookupOptions()) ?>;
fpharmacy_billing_returnedit.lists["x_ModeofPayment"] = <?php echo $pharmacy_billing_return_edit->ModeofPayment->Lookup->toClientList() ?>;
fpharmacy_billing_returnedit.lists["x_ModeofPayment"].options = <?php echo JsonEncode($pharmacy_billing_return_edit->ModeofPayment->lookupOptions()) ?>;
fpharmacy_billing_returnedit.lists["x_RIDNO"] = <?php echo $pharmacy_billing_return_edit->RIDNO->Lookup->toClientList() ?>;
fpharmacy_billing_returnedit.lists["x_RIDNO"].options = <?php echo JsonEncode($pharmacy_billing_return_edit->RIDNO->lookupOptions()) ?>;
fpharmacy_billing_returnedit.lists["x_CId"] = <?php echo $pharmacy_billing_return_edit->CId->Lookup->toClientList() ?>;
fpharmacy_billing_returnedit.lists["x_CId"].options = <?php echo JsonEncode($pharmacy_billing_return_edit->CId->lookupOptions()) ?>;
fpharmacy_billing_returnedit.lists["x_PatId"] = <?php echo $pharmacy_billing_return_edit->PatId->Lookup->toClientList() ?>;
fpharmacy_billing_returnedit.lists["x_PatId"].options = <?php echo JsonEncode($pharmacy_billing_return_edit->PatId->lookupOptions()) ?>;
fpharmacy_billing_returnedit.lists["x_RefferedBy"] = <?php echo $pharmacy_billing_return_edit->RefferedBy->Lookup->toClientList() ?>;
fpharmacy_billing_returnedit.lists["x_RefferedBy"].options = <?php echo JsonEncode($pharmacy_billing_return_edit->RefferedBy->lookupOptions()) ?>;
fpharmacy_billing_returnedit.lists["x_DrID"] = <?php echo $pharmacy_billing_return_edit->DrID->Lookup->toClientList() ?>;
fpharmacy_billing_returnedit.lists["x_DrID"].options = <?php echo JsonEncode($pharmacy_billing_return_edit->DrID->lookupOptions()) ?>;
fpharmacy_billing_returnedit.lists["x_ReportHeader[]"] = <?php echo $pharmacy_billing_return_edit->ReportHeader->Lookup->toClientList() ?>;
fpharmacy_billing_returnedit.lists["x_ReportHeader[]"].options = <?php echo JsonEncode($pharmacy_billing_return_edit->ReportHeader->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $pharmacy_billing_return_edit->showPageHeader(); ?>
<?php
$pharmacy_billing_return_edit->showMessage();
?>
<form name="fpharmacy_billing_returnedit" id="fpharmacy_billing_returnedit" class="<?php echo $pharmacy_billing_return_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_billing_return_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_billing_return_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_billing_return">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_billing_return_edit->IsModal ?>">
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($pharmacy_billing_return->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_pharmacy_billing_return_id" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_id" class="pharmacy_billing_returnedit" type="text/html"><span><?php echo $pharmacy_billing_return->id->caption() ?><?php echo ($pharmacy_billing_return->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_return->id->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_id" class="pharmacy_billing_returnedit" type="text/html">
<span id="el_pharmacy_billing_return_id">
<span<?php echo $pharmacy_billing_return->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_billing_return->id->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($pharmacy_billing_return->id->CurrentValue) ?>">
<?php echo $pharmacy_billing_return->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return->Reception->Visible) { // Reception ?>
	<div id="r_Reception" class="form-group row">
		<label id="elh_pharmacy_billing_return_Reception" for="x_Reception" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_Reception" class="pharmacy_billing_returnedit" type="text/html"><span><?php echo $pharmacy_billing_return->Reception->caption() ?><?php echo ($pharmacy_billing_return->Reception->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_return->Reception->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_Reception" class="pharmacy_billing_returnedit" type="text/html">
<span id="el_pharmacy_billing_return_Reception">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Reception"><?php echo strval($pharmacy_billing_return->Reception->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_billing_return->Reception->ViewValue) : $pharmacy_billing_return->Reception->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_billing_return->Reception->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_billing_return->Reception->ReadOnly || $pharmacy_billing_return->Reception->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_Reception',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_billing_return->Reception->Lookup->getParamTag("p_x_Reception") ?>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_Reception" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_billing_return->Reception->displayValueSeparatorAttribute() ?>" name="x_Reception" id="x_Reception" value="<?php echo $pharmacy_billing_return->Reception->CurrentValue ?>"<?php echo $pharmacy_billing_return->Reception->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_return->Reception->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return->PatientId->Visible) { // PatientId ?>
	<div id="r_PatientId" class="form-group row">
		<label id="elh_pharmacy_billing_return_PatientId" for="x_PatientId" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_PatientId" class="pharmacy_billing_returnedit" type="text/html"><span><?php echo $pharmacy_billing_return->PatientId->caption() ?><?php echo ($pharmacy_billing_return->PatientId->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_return->PatientId->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_PatientId" class="pharmacy_billing_returnedit" type="text/html">
<span id="el_pharmacy_billing_return_PatientId">
<input type="text" data-table="pharmacy_billing_return" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->PatientId->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->PatientId->EditValue ?>"<?php echo $pharmacy_billing_return->PatientId->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_return->PatientId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return->mrnno->Visible) { // mrnno ?>
	<div id="r_mrnno" class="form-group row">
		<label id="elh_pharmacy_billing_return_mrnno" for="x_mrnno" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_mrnno" class="pharmacy_billing_returnedit" type="text/html"><span><?php echo $pharmacy_billing_return->mrnno->caption() ?><?php echo ($pharmacy_billing_return->mrnno->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_return->mrnno->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_mrnno" class="pharmacy_billing_returnedit" type="text/html">
<span id="el_pharmacy_billing_return_mrnno">
<input type="text" data-table="pharmacy_billing_return" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->mrnno->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->mrnno->EditValue ?>"<?php echo $pharmacy_billing_return->mrnno->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_return->mrnno->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label id="elh_pharmacy_billing_return_PatientName" for="x_PatientName" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_PatientName" class="pharmacy_billing_returnedit" type="text/html"><span><?php echo $pharmacy_billing_return->PatientName->caption() ?><?php echo ($pharmacy_billing_return->PatientName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_return->PatientName->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_PatientName" class="pharmacy_billing_returnedit" type="text/html">
<span id="el_pharmacy_billing_return_PatientName">
<input type="text" data-table="pharmacy_billing_return" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->PatientName->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->PatientName->EditValue ?>"<?php echo $pharmacy_billing_return->PatientName->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_return->PatientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label id="elh_pharmacy_billing_return_Age" for="x_Age" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_Age" class="pharmacy_billing_returnedit" type="text/html"><span><?php echo $pharmacy_billing_return->Age->caption() ?><?php echo ($pharmacy_billing_return->Age->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_return->Age->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_Age" class="pharmacy_billing_returnedit" type="text/html">
<span id="el_pharmacy_billing_return_Age">
<input type="text" data-table="pharmacy_billing_return" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->Age->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->Age->EditValue ?>"<?php echo $pharmacy_billing_return->Age->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_return->Age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return->Gender->Visible) { // Gender ?>
	<div id="r_Gender" class="form-group row">
		<label id="elh_pharmacy_billing_return_Gender" for="x_Gender" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_Gender" class="pharmacy_billing_returnedit" type="text/html"><span><?php echo $pharmacy_billing_return->Gender->caption() ?><?php echo ($pharmacy_billing_return->Gender->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_return->Gender->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_Gender" class="pharmacy_billing_returnedit" type="text/html">
<span id="el_pharmacy_billing_return_Gender">
<input type="text" data-table="pharmacy_billing_return" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->Gender->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->Gender->EditValue ?>"<?php echo $pharmacy_billing_return->Gender->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_return->Gender->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return->profilePic->Visible) { // profilePic ?>
	<div id="r_profilePic" class="form-group row">
		<label id="elh_pharmacy_billing_return_profilePic" for="x_profilePic" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_profilePic" class="pharmacy_billing_returnedit" type="text/html"><span><?php echo $pharmacy_billing_return->profilePic->caption() ?><?php echo ($pharmacy_billing_return->profilePic->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_return->profilePic->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_profilePic" class="pharmacy_billing_returnedit" type="text/html">
<span id="el_pharmacy_billing_return_profilePic">
<textarea data-table="pharmacy_billing_return" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" cols="35" rows="4" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->profilePic->getPlaceHolder()) ?>"<?php echo $pharmacy_billing_return->profilePic->editAttributes() ?>><?php echo $pharmacy_billing_return->profilePic->EditValue ?></textarea>
</span>
</script>
<?php echo $pharmacy_billing_return->profilePic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return->Mobile->Visible) { // Mobile ?>
	<div id="r_Mobile" class="form-group row">
		<label id="elh_pharmacy_billing_return_Mobile" for="x_Mobile" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_Mobile" class="pharmacy_billing_returnedit" type="text/html"><span><?php echo $pharmacy_billing_return->Mobile->caption() ?><?php echo ($pharmacy_billing_return->Mobile->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_return->Mobile->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_Mobile" class="pharmacy_billing_returnedit" type="text/html">
<span id="el_pharmacy_billing_return_Mobile">
<input type="text" data-table="pharmacy_billing_return" data-field="x_Mobile" name="x_Mobile" id="x_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->Mobile->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->Mobile->EditValue ?>"<?php echo $pharmacy_billing_return->Mobile->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_return->Mobile->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return->IP_OP->Visible) { // IP_OP ?>
	<div id="r_IP_OP" class="form-group row">
		<label id="elh_pharmacy_billing_return_IP_OP" for="x_IP_OP" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_IP_OP" class="pharmacy_billing_returnedit" type="text/html"><span><?php echo $pharmacy_billing_return->IP_OP->caption() ?><?php echo ($pharmacy_billing_return->IP_OP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_return->IP_OP->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_IP_OP" class="pharmacy_billing_returnedit" type="text/html">
<span id="el_pharmacy_billing_return_IP_OP">
<input type="text" data-table="pharmacy_billing_return" data-field="x_IP_OP" name="x_IP_OP" id="x_IP_OP" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->IP_OP->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->IP_OP->EditValue ?>"<?php echo $pharmacy_billing_return->IP_OP->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_return->IP_OP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return->Doctor->Visible) { // Doctor ?>
	<div id="r_Doctor" class="form-group row">
		<label id="elh_pharmacy_billing_return_Doctor" for="x_Doctor" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_Doctor" class="pharmacy_billing_returnedit" type="text/html"><span><?php echo $pharmacy_billing_return->Doctor->caption() ?><?php echo ($pharmacy_billing_return->Doctor->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_return->Doctor->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_Doctor" class="pharmacy_billing_returnedit" type="text/html">
<span id="el_pharmacy_billing_return_Doctor">
<input type="text" data-table="pharmacy_billing_return" data-field="x_Doctor" name="x_Doctor" id="x_Doctor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->Doctor->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->Doctor->EditValue ?>"<?php echo $pharmacy_billing_return->Doctor->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_return->Doctor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return->voucher_type->Visible) { // voucher_type ?>
	<div id="r_voucher_type" class="form-group row">
		<label id="elh_pharmacy_billing_return_voucher_type" for="x_voucher_type" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_voucher_type" class="pharmacy_billing_returnedit" type="text/html"><span><?php echo $pharmacy_billing_return->voucher_type->caption() ?><?php echo ($pharmacy_billing_return->voucher_type->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_return->voucher_type->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_voucher_type" class="pharmacy_billing_returnedit" type="text/html">
<span id="el_pharmacy_billing_return_voucher_type">
<input type="text" data-table="pharmacy_billing_return" data-field="x_voucher_type" name="x_voucher_type" id="x_voucher_type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->voucher_type->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->voucher_type->EditValue ?>"<?php echo $pharmacy_billing_return->voucher_type->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_return->voucher_type->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return->Details->Visible) { // Details ?>
	<div id="r_Details" class="form-group row">
		<label id="elh_pharmacy_billing_return_Details" for="x_Details" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_Details" class="pharmacy_billing_returnedit" type="text/html"><span><?php echo $pharmacy_billing_return->Details->caption() ?><?php echo ($pharmacy_billing_return->Details->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_return->Details->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_Details" class="pharmacy_billing_returnedit" type="text/html">
<span id="el_pharmacy_billing_return_Details">
<input type="text" data-table="pharmacy_billing_return" data-field="x_Details" name="x_Details" id="x_Details" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->Details->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->Details->EditValue ?>"<?php echo $pharmacy_billing_return->Details->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_return->Details->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return->ModeofPayment->Visible) { // ModeofPayment ?>
	<div id="r_ModeofPayment" class="form-group row">
		<label id="elh_pharmacy_billing_return_ModeofPayment" for="x_ModeofPayment" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_ModeofPayment" class="pharmacy_billing_returnedit" type="text/html"><span><?php echo $pharmacy_billing_return->ModeofPayment->caption() ?><?php echo ($pharmacy_billing_return->ModeofPayment->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_return->ModeofPayment->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_ModeofPayment" class="pharmacy_billing_returnedit" type="text/html">
<span id="el_pharmacy_billing_return_ModeofPayment">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy_billing_return" data-field="x_ModeofPayment" data-value-separator="<?php echo $pharmacy_billing_return->ModeofPayment->displayValueSeparatorAttribute() ?>" id="x_ModeofPayment" name="x_ModeofPayment"<?php echo $pharmacy_billing_return->ModeofPayment->editAttributes() ?>>
		<?php echo $pharmacy_billing_return->ModeofPayment->selectOptionListHtml("x_ModeofPayment") ?>
	</select>
</div>
<?php echo $pharmacy_billing_return->ModeofPayment->Lookup->getParamTag("p_x_ModeofPayment") ?>
</span>
</script>
<?php echo $pharmacy_billing_return->ModeofPayment->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return->Amount->Visible) { // Amount ?>
	<div id="r_Amount" class="form-group row">
		<label id="elh_pharmacy_billing_return_Amount" for="x_Amount" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_Amount" class="pharmacy_billing_returnedit" type="text/html"><span><?php echo $pharmacy_billing_return->Amount->caption() ?><?php echo ($pharmacy_billing_return->Amount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_return->Amount->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_Amount" class="pharmacy_billing_returnedit" type="text/html">
<span id="el_pharmacy_billing_return_Amount">
<input type="text" data-table="pharmacy_billing_return" data-field="x_Amount" name="x_Amount" id="x_Amount" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->Amount->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->Amount->EditValue ?>"<?php echo $pharmacy_billing_return->Amount->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_return->Amount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return->AnyDues->Visible) { // AnyDues ?>
	<div id="r_AnyDues" class="form-group row">
		<label id="elh_pharmacy_billing_return_AnyDues" for="x_AnyDues" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_AnyDues" class="pharmacy_billing_returnedit" type="text/html"><span><?php echo $pharmacy_billing_return->AnyDues->caption() ?><?php echo ($pharmacy_billing_return->AnyDues->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_return->AnyDues->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_AnyDues" class="pharmacy_billing_returnedit" type="text/html">
<span id="el_pharmacy_billing_return_AnyDues">
<input type="text" data-table="pharmacy_billing_return" data-field="x_AnyDues" name="x_AnyDues" id="x_AnyDues" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->AnyDues->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->AnyDues->EditValue ?>"<?php echo $pharmacy_billing_return->AnyDues->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_return->AnyDues->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return->RealizationAmount->Visible) { // RealizationAmount ?>
	<div id="r_RealizationAmount" class="form-group row">
		<label id="elh_pharmacy_billing_return_RealizationAmount" for="x_RealizationAmount" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_RealizationAmount" class="pharmacy_billing_returnedit" type="text/html"><span><?php echo $pharmacy_billing_return->RealizationAmount->caption() ?><?php echo ($pharmacy_billing_return->RealizationAmount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_return->RealizationAmount->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_RealizationAmount" class="pharmacy_billing_returnedit" type="text/html">
<span id="el_pharmacy_billing_return_RealizationAmount">
<input type="text" data-table="pharmacy_billing_return" data-field="x_RealizationAmount" name="x_RealizationAmount" id="x_RealizationAmount" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->RealizationAmount->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->RealizationAmount->EditValue ?>"<?php echo $pharmacy_billing_return->RealizationAmount->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_return->RealizationAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return->RealizationStatus->Visible) { // RealizationStatus ?>
	<div id="r_RealizationStatus" class="form-group row">
		<label id="elh_pharmacy_billing_return_RealizationStatus" for="x_RealizationStatus" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_RealizationStatus" class="pharmacy_billing_returnedit" type="text/html"><span><?php echo $pharmacy_billing_return->RealizationStatus->caption() ?><?php echo ($pharmacy_billing_return->RealizationStatus->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_return->RealizationStatus->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_RealizationStatus" class="pharmacy_billing_returnedit" type="text/html">
<span id="el_pharmacy_billing_return_RealizationStatus">
<input type="text" data-table="pharmacy_billing_return" data-field="x_RealizationStatus" name="x_RealizationStatus" id="x_RealizationStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->RealizationStatus->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->RealizationStatus->EditValue ?>"<?php echo $pharmacy_billing_return->RealizationStatus->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_return->RealizationStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return->RealizationRemarks->Visible) { // RealizationRemarks ?>
	<div id="r_RealizationRemarks" class="form-group row">
		<label id="elh_pharmacy_billing_return_RealizationRemarks" for="x_RealizationRemarks" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_RealizationRemarks" class="pharmacy_billing_returnedit" type="text/html"><span><?php echo $pharmacy_billing_return->RealizationRemarks->caption() ?><?php echo ($pharmacy_billing_return->RealizationRemarks->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_return->RealizationRemarks->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_RealizationRemarks" class="pharmacy_billing_returnedit" type="text/html">
<span id="el_pharmacy_billing_return_RealizationRemarks">
<input type="text" data-table="pharmacy_billing_return" data-field="x_RealizationRemarks" name="x_RealizationRemarks" id="x_RealizationRemarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->RealizationRemarks->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->RealizationRemarks->EditValue ?>"<?php echo $pharmacy_billing_return->RealizationRemarks->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_return->RealizationRemarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
	<div id="r_RealizationBatchNo" class="form-group row">
		<label id="elh_pharmacy_billing_return_RealizationBatchNo" for="x_RealizationBatchNo" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_RealizationBatchNo" class="pharmacy_billing_returnedit" type="text/html"><span><?php echo $pharmacy_billing_return->RealizationBatchNo->caption() ?><?php echo ($pharmacy_billing_return->RealizationBatchNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_return->RealizationBatchNo->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_RealizationBatchNo" class="pharmacy_billing_returnedit" type="text/html">
<span id="el_pharmacy_billing_return_RealizationBatchNo">
<input type="text" data-table="pharmacy_billing_return" data-field="x_RealizationBatchNo" name="x_RealizationBatchNo" id="x_RealizationBatchNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->RealizationBatchNo->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->RealizationBatchNo->EditValue ?>"<?php echo $pharmacy_billing_return->RealizationBatchNo->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_return->RealizationBatchNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return->RealizationDate->Visible) { // RealizationDate ?>
	<div id="r_RealizationDate" class="form-group row">
		<label id="elh_pharmacy_billing_return_RealizationDate" for="x_RealizationDate" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_RealizationDate" class="pharmacy_billing_returnedit" type="text/html"><span><?php echo $pharmacy_billing_return->RealizationDate->caption() ?><?php echo ($pharmacy_billing_return->RealizationDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_return->RealizationDate->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_RealizationDate" class="pharmacy_billing_returnedit" type="text/html">
<span id="el_pharmacy_billing_return_RealizationDate">
<input type="text" data-table="pharmacy_billing_return" data-field="x_RealizationDate" name="x_RealizationDate" id="x_RealizationDate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->RealizationDate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->RealizationDate->EditValue ?>"<?php echo $pharmacy_billing_return->RealizationDate->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_return->RealizationDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return->RIDNO->Visible) { // RIDNO ?>
	<div id="r_RIDNO" class="form-group row">
		<label id="elh_pharmacy_billing_return_RIDNO" for="x_RIDNO" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_RIDNO" class="pharmacy_billing_returnedit" type="text/html"><span><?php echo $pharmacy_billing_return->RIDNO->caption() ?><?php echo ($pharmacy_billing_return->RIDNO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_return->RIDNO->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_RIDNO" class="pharmacy_billing_returnedit" type="text/html">
<span id="el_pharmacy_billing_return_RIDNO">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_RIDNO"><?php echo strval($pharmacy_billing_return->RIDNO->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_billing_return->RIDNO->ViewValue) : $pharmacy_billing_return->RIDNO->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_billing_return->RIDNO->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_billing_return->RIDNO->ReadOnly || $pharmacy_billing_return->RIDNO->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_RIDNO',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_billing_return->RIDNO->Lookup->getParamTag("p_x_RIDNO") ?>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_RIDNO" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_billing_return->RIDNO->displayValueSeparatorAttribute() ?>" name="x_RIDNO" id="x_RIDNO" value="<?php echo $pharmacy_billing_return->RIDNO->CurrentValue ?>"<?php echo $pharmacy_billing_return->RIDNO->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_return->RIDNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return->TidNo->Visible) { // TidNo ?>
	<div id="r_TidNo" class="form-group row">
		<label id="elh_pharmacy_billing_return_TidNo" for="x_TidNo" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_TidNo" class="pharmacy_billing_returnedit" type="text/html"><span><?php echo $pharmacy_billing_return->TidNo->caption() ?><?php echo ($pharmacy_billing_return->TidNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_return->TidNo->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_TidNo" class="pharmacy_billing_returnedit" type="text/html">
<span id="el_pharmacy_billing_return_TidNo">
<input type="text" data-table="pharmacy_billing_return" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->TidNo->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->TidNo->EditValue ?>"<?php echo $pharmacy_billing_return->TidNo->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_return->TidNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return->CId->Visible) { // CId ?>
	<div id="r_CId" class="form-group row">
		<label id="elh_pharmacy_billing_return_CId" for="x_CId" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_CId" class="pharmacy_billing_returnedit" type="text/html"><span><?php echo $pharmacy_billing_return->CId->caption() ?><?php echo ($pharmacy_billing_return->CId->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_return->CId->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_CId" class="pharmacy_billing_returnedit" type="text/html">
<span id="el_pharmacy_billing_return_CId">
<?php $pharmacy_billing_return->CId->EditAttrs["onchange"] = "ew.autoFill(this);" . @$pharmacy_billing_return->CId->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_CId"><?php echo strval($pharmacy_billing_return->CId->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_billing_return->CId->ViewValue) : $pharmacy_billing_return->CId->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_billing_return->CId->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_billing_return->CId->ReadOnly || $pharmacy_billing_return->CId->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_CId',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_billing_return->CId->Lookup->getParamTag("p_x_CId") ?>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_CId" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_billing_return->CId->displayValueSeparatorAttribute() ?>" name="x_CId" id="x_CId" value="<?php echo $pharmacy_billing_return->CId->CurrentValue ?>"<?php echo $pharmacy_billing_return->CId->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_return->CId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return->PartnerName->Visible) { // PartnerName ?>
	<div id="r_PartnerName" class="form-group row">
		<label id="elh_pharmacy_billing_return_PartnerName" for="x_PartnerName" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_PartnerName" class="pharmacy_billing_returnedit" type="text/html"><span><?php echo $pharmacy_billing_return->PartnerName->caption() ?><?php echo ($pharmacy_billing_return->PartnerName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_return->PartnerName->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_PartnerName" class="pharmacy_billing_returnedit" type="text/html">
<span id="el_pharmacy_billing_return_PartnerName">
<input type="text" data-table="pharmacy_billing_return" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->PartnerName->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->PartnerName->EditValue ?>"<?php echo $pharmacy_billing_return->PartnerName->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_return->PartnerName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return->PayerType->Visible) { // PayerType ?>
	<div id="r_PayerType" class="form-group row">
		<label id="elh_pharmacy_billing_return_PayerType" for="x_PayerType" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_PayerType" class="pharmacy_billing_returnedit" type="text/html"><span><?php echo $pharmacy_billing_return->PayerType->caption() ?><?php echo ($pharmacy_billing_return->PayerType->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_return->PayerType->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_PayerType" class="pharmacy_billing_returnedit" type="text/html">
<span id="el_pharmacy_billing_return_PayerType">
<input type="text" data-table="pharmacy_billing_return" data-field="x_PayerType" name="x_PayerType" id="x_PayerType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->PayerType->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->PayerType->EditValue ?>"<?php echo $pharmacy_billing_return->PayerType->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_return->PayerType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return->Dob->Visible) { // Dob ?>
	<div id="r_Dob" class="form-group row">
		<label id="elh_pharmacy_billing_return_Dob" for="x_Dob" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_Dob" class="pharmacy_billing_returnedit" type="text/html"><span><?php echo $pharmacy_billing_return->Dob->caption() ?><?php echo ($pharmacy_billing_return->Dob->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_return->Dob->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_Dob" class="pharmacy_billing_returnedit" type="text/html">
<span id="el_pharmacy_billing_return_Dob">
<input type="text" data-table="pharmacy_billing_return" data-field="x_Dob" name="x_Dob" id="x_Dob" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->Dob->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->Dob->EditValue ?>"<?php echo $pharmacy_billing_return->Dob->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_return->Dob->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return->Currency->Visible) { // Currency ?>
	<div id="r_Currency" class="form-group row">
		<label id="elh_pharmacy_billing_return_Currency" for="x_Currency" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_Currency" class="pharmacy_billing_returnedit" type="text/html"><span><?php echo $pharmacy_billing_return->Currency->caption() ?><?php echo ($pharmacy_billing_return->Currency->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_return->Currency->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_Currency" class="pharmacy_billing_returnedit" type="text/html">
<span id="el_pharmacy_billing_return_Currency">
<input type="text" data-table="pharmacy_billing_return" data-field="x_Currency" name="x_Currency" id="x_Currency" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->Currency->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->Currency->EditValue ?>"<?php echo $pharmacy_billing_return->Currency->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_return->Currency->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return->DiscountRemarks->Visible) { // DiscountRemarks ?>
	<div id="r_DiscountRemarks" class="form-group row">
		<label id="elh_pharmacy_billing_return_DiscountRemarks" for="x_DiscountRemarks" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_DiscountRemarks" class="pharmacy_billing_returnedit" type="text/html"><span><?php echo $pharmacy_billing_return->DiscountRemarks->caption() ?><?php echo ($pharmacy_billing_return->DiscountRemarks->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_return->DiscountRemarks->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_DiscountRemarks" class="pharmacy_billing_returnedit" type="text/html">
<span id="el_pharmacy_billing_return_DiscountRemarks">
<input type="text" data-table="pharmacy_billing_return" data-field="x_DiscountRemarks" name="x_DiscountRemarks" id="x_DiscountRemarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->DiscountRemarks->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->DiscountRemarks->EditValue ?>"<?php echo $pharmacy_billing_return->DiscountRemarks->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_return->DiscountRemarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return->Remarks->Visible) { // Remarks ?>
	<div id="r_Remarks" class="form-group row">
		<label id="elh_pharmacy_billing_return_Remarks" for="x_Remarks" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_Remarks" class="pharmacy_billing_returnedit" type="text/html"><span><?php echo $pharmacy_billing_return->Remarks->caption() ?><?php echo ($pharmacy_billing_return->Remarks->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_return->Remarks->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_Remarks" class="pharmacy_billing_returnedit" type="text/html">
<span id="el_pharmacy_billing_return_Remarks">
<input type="text" data-table="pharmacy_billing_return" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->Remarks->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->Remarks->EditValue ?>"<?php echo $pharmacy_billing_return->Remarks->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_return->Remarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return->PatId->Visible) { // PatId ?>
	<div id="r_PatId" class="form-group row">
		<label id="elh_pharmacy_billing_return_PatId" for="x_PatId" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_PatId" class="pharmacy_billing_returnedit" type="text/html"><span><?php echo $pharmacy_billing_return->PatId->caption() ?><?php echo ($pharmacy_billing_return->PatId->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_return->PatId->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_PatId" class="pharmacy_billing_returnedit" type="text/html">
<span id="el_pharmacy_billing_return_PatId">
<?php $pharmacy_billing_return->PatId->EditAttrs["onchange"] = "ew.autoFill(this);" . @$pharmacy_billing_return->PatId->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_PatId"><?php echo strval($pharmacy_billing_return->PatId->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_billing_return->PatId->ViewValue) : $pharmacy_billing_return->PatId->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_billing_return->PatId->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_billing_return->PatId->ReadOnly || $pharmacy_billing_return->PatId->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_PatId',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_billing_return->PatId->Lookup->getParamTag("p_x_PatId") ?>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_PatId" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_billing_return->PatId->displayValueSeparatorAttribute() ?>" name="x_PatId" id="x_PatId" value="<?php echo $pharmacy_billing_return->PatId->CurrentValue ?>"<?php echo $pharmacy_billing_return->PatId->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_return->PatId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return->DrDepartment->Visible) { // DrDepartment ?>
	<div id="r_DrDepartment" class="form-group row">
		<label id="elh_pharmacy_billing_return_DrDepartment" for="x_DrDepartment" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_DrDepartment" class="pharmacy_billing_returnedit" type="text/html"><span><?php echo $pharmacy_billing_return->DrDepartment->caption() ?><?php echo ($pharmacy_billing_return->DrDepartment->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_return->DrDepartment->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_DrDepartment" class="pharmacy_billing_returnedit" type="text/html">
<span id="el_pharmacy_billing_return_DrDepartment">
<input type="text" data-table="pharmacy_billing_return" data-field="x_DrDepartment" name="x_DrDepartment" id="x_DrDepartment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->DrDepartment->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->DrDepartment->EditValue ?>"<?php echo $pharmacy_billing_return->DrDepartment->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_return->DrDepartment->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return->RefferedBy->Visible) { // RefferedBy ?>
	<div id="r_RefferedBy" class="form-group row">
		<label id="elh_pharmacy_billing_return_RefferedBy" for="x_RefferedBy" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_RefferedBy" class="pharmacy_billing_returnedit" type="text/html"><span><?php echo $pharmacy_billing_return->RefferedBy->caption() ?><?php echo ($pharmacy_billing_return->RefferedBy->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_return->RefferedBy->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_RefferedBy" class="pharmacy_billing_returnedit" type="text/html">
<span id="el_pharmacy_billing_return_RefferedBy">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_RefferedBy"><?php echo strval($pharmacy_billing_return->RefferedBy->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_billing_return->RefferedBy->ViewValue) : $pharmacy_billing_return->RefferedBy->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_billing_return->RefferedBy->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_billing_return->RefferedBy->ReadOnly || $pharmacy_billing_return->RefferedBy->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_RefferedBy',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
<?php if (AllowAdd(CurrentProjectID() . "mas_reference_type") && !$pharmacy_billing_return->RefferedBy->ReadOnly) { ?>
<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_RefferedBy" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $pharmacy_billing_return->RefferedBy->caption() ?>" data-title="<?php echo $pharmacy_billing_return->RefferedBy->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_RefferedBy',url:'mas_reference_typeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button>
<?php } ?>
	</div>
</div>
<?php echo $pharmacy_billing_return->RefferedBy->Lookup->getParamTag("p_x_RefferedBy") ?>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_RefferedBy" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_billing_return->RefferedBy->displayValueSeparatorAttribute() ?>" name="x_RefferedBy" id="x_RefferedBy" value="<?php echo $pharmacy_billing_return->RefferedBy->CurrentValue ?>"<?php echo $pharmacy_billing_return->RefferedBy->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_return->RefferedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return->BillNumber->Visible) { // BillNumber ?>
	<div id="r_BillNumber" class="form-group row">
		<label id="elh_pharmacy_billing_return_BillNumber" for="x_BillNumber" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_BillNumber" class="pharmacy_billing_returnedit" type="text/html"><span><?php echo $pharmacy_billing_return->BillNumber->caption() ?><?php echo ($pharmacy_billing_return->BillNumber->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_return->BillNumber->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_BillNumber" class="pharmacy_billing_returnedit" type="text/html">
<span id="el_pharmacy_billing_return_BillNumber">
<input type="text" data-table="pharmacy_billing_return" data-field="x_BillNumber" name="x_BillNumber" id="x_BillNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->BillNumber->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->BillNumber->EditValue ?>"<?php echo $pharmacy_billing_return->BillNumber->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_return->BillNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return->CardNumber->Visible) { // CardNumber ?>
	<div id="r_CardNumber" class="form-group row">
		<label id="elh_pharmacy_billing_return_CardNumber" for="x_CardNumber" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_CardNumber" class="pharmacy_billing_returnedit" type="text/html"><span><?php echo $pharmacy_billing_return->CardNumber->caption() ?><?php echo ($pharmacy_billing_return->CardNumber->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_return->CardNumber->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_CardNumber" class="pharmacy_billing_returnedit" type="text/html">
<span id="el_pharmacy_billing_return_CardNumber">
<input type="text" data-table="pharmacy_billing_return" data-field="x_CardNumber" name="x_CardNumber" id="x_CardNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->CardNumber->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->CardNumber->EditValue ?>"<?php echo $pharmacy_billing_return->CardNumber->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_return->CardNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return->BankName->Visible) { // BankName ?>
	<div id="r_BankName" class="form-group row">
		<label id="elh_pharmacy_billing_return_BankName" for="x_BankName" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_BankName" class="pharmacy_billing_returnedit" type="text/html"><span><?php echo $pharmacy_billing_return->BankName->caption() ?><?php echo ($pharmacy_billing_return->BankName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_return->BankName->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_BankName" class="pharmacy_billing_returnedit" type="text/html">
<span id="el_pharmacy_billing_return_BankName">
<input type="text" data-table="pharmacy_billing_return" data-field="x_BankName" name="x_BankName" id="x_BankName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->BankName->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->BankName->EditValue ?>"<?php echo $pharmacy_billing_return->BankName->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_return->BankName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return->DrID->Visible) { // DrID ?>
	<div id="r_DrID" class="form-group row">
		<label id="elh_pharmacy_billing_return_DrID" for="x_DrID" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_DrID" class="pharmacy_billing_returnedit" type="text/html"><span><?php echo $pharmacy_billing_return->DrID->caption() ?><?php echo ($pharmacy_billing_return->DrID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_return->DrID->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_DrID" class="pharmacy_billing_returnedit" type="text/html">
<span id="el_pharmacy_billing_return_DrID">
<?php $pharmacy_billing_return->DrID->EditAttrs["onchange"] = "ew.autoFill(this);" . @$pharmacy_billing_return->DrID->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_DrID"><?php echo strval($pharmacy_billing_return->DrID->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pharmacy_billing_return->DrID->ViewValue) : $pharmacy_billing_return->DrID->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_billing_return->DrID->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pharmacy_billing_return->DrID->ReadOnly || $pharmacy_billing_return->DrID->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_DrID',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_billing_return->DrID->Lookup->getParamTag("p_x_DrID") ?>
<input type="hidden" data-table="pharmacy_billing_return" data-field="x_DrID" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_billing_return->DrID->displayValueSeparatorAttribute() ?>" name="x_DrID" id="x_DrID" value="<?php echo $pharmacy_billing_return->DrID->CurrentValue ?>"<?php echo $pharmacy_billing_return->DrID->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_return->DrID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return->BillStatus->Visible) { // BillStatus ?>
	<div id="r_BillStatus" class="form-group row">
		<label id="elh_pharmacy_billing_return_BillStatus" for="x_BillStatus" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_BillStatus" class="pharmacy_billing_returnedit" type="text/html"><span><?php echo $pharmacy_billing_return->BillStatus->caption() ?><?php echo ($pharmacy_billing_return->BillStatus->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_return->BillStatus->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_BillStatus" class="pharmacy_billing_returnedit" type="text/html">
<span id="el_pharmacy_billing_return_BillStatus">
<input type="text" data-table="pharmacy_billing_return" data-field="x_BillStatus" name="x_BillStatus" id="x_BillStatus" size="30" placeholder="<?php echo HtmlEncode($pharmacy_billing_return->BillStatus->getPlaceHolder()) ?>" value="<?php echo $pharmacy_billing_return->BillStatus->EditValue ?>"<?php echo $pharmacy_billing_return->BillStatus->editAttributes() ?>>
</span>
</script>
<?php echo $pharmacy_billing_return->BillStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_billing_return->ReportHeader->Visible) { // ReportHeader ?>
	<div id="r_ReportHeader" class="form-group row">
		<label id="elh_pharmacy_billing_return_ReportHeader" class="<?php echo $pharmacy_billing_return_edit->LeftColumnClass ?>"><script id="tpc_pharmacy_billing_return_ReportHeader" class="pharmacy_billing_returnedit" type="text/html"><span><?php echo $pharmacy_billing_return->ReportHeader->caption() ?><?php echo ($pharmacy_billing_return->ReportHeader->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pharmacy_billing_return_edit->RightColumnClass ?>"><div<?php echo $pharmacy_billing_return->ReportHeader->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_return_ReportHeader" class="pharmacy_billing_returnedit" type="text/html">
<span id="el_pharmacy_billing_return_ReportHeader">
<div id="tp_x_ReportHeader" class="ew-template"><input type="checkbox" class="form-check-input" data-table="pharmacy_billing_return" data-field="x_ReportHeader" data-value-separator="<?php echo $pharmacy_billing_return->ReportHeader->displayValueSeparatorAttribute() ?>" name="x_ReportHeader[]" id="x_ReportHeader[]" value="{value}"<?php echo $pharmacy_billing_return->ReportHeader->editAttributes() ?>></div>
<div id="dsl_x_ReportHeader" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $pharmacy_billing_return->ReportHeader->checkBoxListHtml(FALSE, "x_ReportHeader[]") ?>
</div></div>
</span>
</script>
<?php echo $pharmacy_billing_return->ReportHeader->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_pharmacy_billing_returnedit" class="ew-custom-template"></div>
<script id="tpm_pharmacy_billing_returnedit" type="text/html">
<div id="ct_pharmacy_billing_return_edit"><style>
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
		<h3 class="card-title">{{include tmpl="#tpc_pharmacy_billing_return_PatId"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_return_PatId"/}}</h3>
	</div>
		<div class="col-4">
		<h3 class="card-title">{{include tmpl="#tpc_pharmacy_billing_return_RIDNO"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_return_RIDNO"/}}</h3>
	</div>
		<div class="col-4">
		<h3 class="card-title">{{include tmpl="#tpc_pharmacy_billing_return_CId"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_return_CId"/}}</h3>
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
		<td>{{include tmpl="#tpc_pharmacy_billing_return_PatientId"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_return_PatientId"/}}</td>
			<td>{{include tmpl="#tpc_pharmacy_billing_return_PatientName"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_return_PatientName"/}}</td>
			<td>{{include tmpl="#tpc_pharmacy_billing_return_Mobile"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_return_Mobile"/}}</td>
		</tr>
		<tr>
			<td>{{include tmpl="#tpc_pharmacy_billing_return_Dob"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_return_Dob"/}}</td>
		<td>{{include tmpl="#tpc_pharmacy_billing_return_Age"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_return_Age"/}}</td>
			<td>{{include tmpl="#tpc_pharmacy_billing_return_Gender"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_return_Gender"/}}</td>
		</tr>
		<tr>
			<td>{{include tmpl="#tpc_pharmacy_billing_return_PartnerName"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_return_PartnerName"/}}</td>
			<td>{{include tmpl="#tpc_pharmacy_billing_return_PayerType"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_return_PayerType"/}}</td>
			<td>{{include tmpl="#tpc_pharmacy_billing_return_RefferedBy"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_return_RefferedBy"/}}</td>
			<td></td>
		</tr>
		 <tr>
		 	<td>{{include tmpl="#tpc_pharmacy_billing_return_DrID"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_return_DrID"/}}</td>
			<td>{{include tmpl="#tpc_pharmacy_billing_return_Doctor"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_return_Doctor"/}}</td>
			<td>{{include tmpl="#tpc_pharmacy_billing_return_DrDepartment"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_return_DrDepartment"/}}</td>
		</tr>
	</tbody>
</table>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
{{include tmpl="#tpc_pharmacy_billing_return_ReportHeader"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_return_ReportHeader"/}}
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header"  style="background-color:#D68910">
				<h3 class="card-title">Payment Details</h3>
			</div>
			<div class="card-body">
<table class="ew-table">
	 <tbody>
		<tr>
			<td>{{include tmpl="#tpc_pharmacy_billing_return_ModeofPayment"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_return_ModeofPayment"/}}</td>
			<td>{{include tmpl="#tpc_pharmacy_billing_return_Amount"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_return_Amount"/}}</td>
			<td>{{include tmpl="#tpc_pharmacy_billing_return_AnyDues"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_return_AnyDues"/}}</td>
		</tr>
		<tr>
			<td>{{include tmpl="#tpc_pharmacy_billing_return_DiscountRemarks"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_return_DiscountRemarks"/}}</td>
			<td>{{include tmpl="#tpc_pharmacy_billing_return_Remarks"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_return_Remarks"/}}</td>
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
			<td>{{include tmpl="#tpc_pharmacy_billing_return_CardNumber"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_return_CardNumber"/}}</td>
			<td>{{include tmpl="#tpc_pharmacy_billing_return_BankName"/}}&nbsp;{{include tmpl="#tpx_pharmacy_billing_return_BankName"/}}</td>
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
	if (in_array("view_pharmacy_pharled_return", explode(",", $pharmacy_billing_return->getCurrentDetailTable())) && $view_pharmacy_pharled_return->DetailEdit) {
?>
<?php if ($pharmacy_billing_return->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("view_pharmacy_pharled_return", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "view_pharmacy_pharled_returngrid.php" ?>
<?php } ?>
<?php if (!$pharmacy_billing_return_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $pharmacy_billing_return_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pharmacy_billing_return_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($pharmacy_billing_return->Rows) ?> };
ew.applyTemplate("tpd_pharmacy_billing_returnedit", "tpm_pharmacy_billing_returnedit", "pharmacy_billing_returnedit", "<?php echo $pharmacy_billing_return->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.pharmacy_billing_returnedit_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$pharmacy_billing_return_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$pharmacy_billing_return_edit->terminate();
?>