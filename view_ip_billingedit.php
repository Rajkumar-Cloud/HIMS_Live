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
$view_ip_billing_edit = new view_ip_billing_edit();

// Run the page
$view_ip_billing_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_ip_billing_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fview_ip_billingedit = currentForm = new ew.Form("fview_ip_billingedit", "edit");

// Validate form
fview_ip_billingedit.validate = function() {
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
		<?php if ($view_ip_billing_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing->id->caption(), $view_ip_billing->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_billing_edit->PatientID->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing->PatientID->caption(), $view_ip_billing->PatientID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_billing_edit->patient_name->Required) { ?>
			elm = this.getElements("x" + infix + "_patient_name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing->patient_name->caption(), $view_ip_billing->patient_name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_billing_edit->mrnNo->Required) { ?>
			elm = this.getElements("x" + infix + "_mrnNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing->mrnNo->caption(), $view_ip_billing->mrnNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_billing_edit->mobileno->Required) { ?>
			elm = this.getElements("x" + infix + "_mobileno");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing->mobileno->caption(), $view_ip_billing->mobileno->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_billing_edit->profilePic->Required) { ?>
			elm = this.getElements("x" + infix + "_profilePic");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing->profilePic->caption(), $view_ip_billing->profilePic->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_billing_edit->gender->Required) { ?>
			elm = this.getElements("x" + infix + "_gender");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing->gender->caption(), $view_ip_billing->gender->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_billing_edit->age->Required) { ?>
			elm = this.getElements("x" + infix + "_age");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing->age->caption(), $view_ip_billing->age->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_billing_edit->physician_id->Required) { ?>
			elm = this.getElements("x" + infix + "_physician_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing->physician_id->caption(), $view_ip_billing->physician_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_billing_edit->typeRegsisteration->Required) { ?>
			elm = this.getElements("x" + infix + "_typeRegsisteration");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing->typeRegsisteration->caption(), $view_ip_billing->typeRegsisteration->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_billing_edit->PaymentCategory->Required) { ?>
			elm = this.getElements("x" + infix + "_PaymentCategory");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing->PaymentCategory->caption(), $view_ip_billing->PaymentCategory->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_billing_edit->admission_consultant_id->Required) { ?>
			elm = this.getElements("x" + infix + "_admission_consultant_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing->admission_consultant_id->caption(), $view_ip_billing->admission_consultant_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_billing_edit->leading_consultant_id->Required) { ?>
			elm = this.getElements("x" + infix + "_leading_consultant_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing->leading_consultant_id->caption(), $view_ip_billing->leading_consultant_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_billing_edit->cause->Required) { ?>
			elm = this.getElements("x" + infix + "_cause");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing->cause->caption(), $view_ip_billing->cause->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_billing_edit->admission_date->Required) { ?>
			elm = this.getElements("x" + infix + "_admission_date");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing->admission_date->caption(), $view_ip_billing->admission_date->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_billing_edit->release_date->Required) { ?>
			elm = this.getElements("x" + infix + "_release_date");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing->release_date->caption(), $view_ip_billing->release_date->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_release_date");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_ip_billing->release_date->errorMessage()) ?>");
		<?php if ($view_ip_billing_edit->PaymentStatus->Required) { ?>
			elm = this.getElements("x" + infix + "_PaymentStatus");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing->PaymentStatus->caption(), $view_ip_billing->PaymentStatus->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_billing_edit->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing->status->caption(), $view_ip_billing->status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_billing_edit->createdby->Required) { ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing->createdby->caption(), $view_ip_billing->createdby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_billing_edit->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing->createddatetime->caption(), $view_ip_billing->createddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_billing_edit->modifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing->modifiedby->caption(), $view_ip_billing->modifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_billing_edit->modifieddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing->modifieddatetime->caption(), $view_ip_billing->modifieddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_billing_edit->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing->HospID->caption(), $view_ip_billing->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_billing_edit->ReferedByDr->Required) { ?>
			elm = this.getElements("x" + infix + "_ReferedByDr");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing->ReferedByDr->caption(), $view_ip_billing->ReferedByDr->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_billing_edit->ReferClinicname->Required) { ?>
			elm = this.getElements("x" + infix + "_ReferClinicname");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing->ReferClinicname->caption(), $view_ip_billing->ReferClinicname->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_billing_edit->ReferCity->Required) { ?>
			elm = this.getElements("x" + infix + "_ReferCity");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing->ReferCity->caption(), $view_ip_billing->ReferCity->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_billing_edit->ReferMobileNo->Required) { ?>
			elm = this.getElements("x" + infix + "_ReferMobileNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing->ReferMobileNo->caption(), $view_ip_billing->ReferMobileNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_billing_edit->ReferA4TreatingConsultant->Required) { ?>
			elm = this.getElements("x" + infix + "_ReferA4TreatingConsultant");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing->ReferA4TreatingConsultant->caption(), $view_ip_billing->ReferA4TreatingConsultant->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_billing_edit->PurposreReferredfor->Required) { ?>
			elm = this.getElements("x" + infix + "_PurposreReferredfor");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing->PurposreReferredfor->caption(), $view_ip_billing->PurposreReferredfor->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_billing_edit->patient_id->Required) { ?>
			elm = this.getElements("x" + infix + "_patient_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing->patient_id->caption(), $view_ip_billing->patient_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_billing_edit->BillClosing->Required) { ?>
			elm = this.getElements("x" + infix + "_BillClosing");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing->BillClosing->caption(), $view_ip_billing->BillClosing->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_billing_edit->BillClosingDate->Required) { ?>
			elm = this.getElements("x" + infix + "_BillClosingDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing->BillClosingDate->caption(), $view_ip_billing->BillClosingDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BillClosingDate");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_ip_billing->BillClosingDate->errorMessage()) ?>");
		<?php if ($view_ip_billing_edit->BillNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_BillNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing->BillNumber->caption(), $view_ip_billing->BillNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_billing_edit->ClosingAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_ClosingAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing->ClosingAmount->caption(), $view_ip_billing->ClosingAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_billing_edit->ClosingType->Required) { ?>
			elm = this.getElements("x" + infix + "_ClosingType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing->ClosingType->caption(), $view_ip_billing->ClosingType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_billing_edit->BillAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_BillAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing->BillAmount->caption(), $view_ip_billing->BillAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_billing_edit->billclosedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_billclosedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing->billclosedBy->caption(), $view_ip_billing->billclosedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_billing_edit->bllcloseByDate->Required) { ?>
			elm = this.getElements("x" + infix + "_bllcloseByDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing->bllcloseByDate->caption(), $view_ip_billing->bllcloseByDate->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ip_billing_edit->ReportHeader->Required) { ?>
			elm = this.getElements("x" + infix + "_ReportHeader[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ip_billing->ReportHeader->caption(), $view_ip_billing->ReportHeader->RequiredErrorMessage)) ?>");
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
fview_ip_billingedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_ip_billingedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_ip_billingedit.lists["x_BillClosing"] = <?php echo $view_ip_billing_edit->BillClosing->Lookup->toClientList() ?>;
fview_ip_billingedit.lists["x_BillClosing"].options = <?php echo JsonEncode($view_ip_billing_edit->BillClosing->options(FALSE, TRUE)) ?>;
fview_ip_billingedit.lists["x_ReportHeader[]"] = <?php echo $view_ip_billing_edit->ReportHeader->Lookup->toClientList() ?>;
fview_ip_billingedit.lists["x_ReportHeader[]"].options = <?php echo JsonEncode($view_ip_billing_edit->ReportHeader->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $view_ip_billing_edit->showPageHeader(); ?>
<?php
$view_ip_billing_edit->showMessage();
?>
<form name="fview_ip_billingedit" id="fview_ip_billingedit" class="<?php echo $view_ip_billing_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_ip_billing_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_ip_billing_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_ip_billing">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$view_ip_billing_edit->IsModal ?>">
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($view_ip_billing->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_view_ip_billing_id" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_id" class="view_ip_billingedit" type="text/html"><span><?php echo $view_ip_billing->id->caption() ?><?php echo ($view_ip_billing->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div<?php echo $view_ip_billing->id->cellAttributes() ?>>
<script id="tpx_view_ip_billing_id" class="view_ip_billingedit" type="text/html">
<span id="el_view_ip_billing_id">
<span<?php echo $view_ip_billing->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_billing->id->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_ip_billing" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($view_ip_billing->id->CurrentValue) ?>">
<?php echo $view_ip_billing->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_billing->PatientID->Visible) { // PatientID ?>
	<div id="r_PatientID" class="form-group row">
		<label id="elh_view_ip_billing_PatientID" for="x_PatientID" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_PatientID" class="view_ip_billingedit" type="text/html"><span><?php echo $view_ip_billing->PatientID->caption() ?><?php echo ($view_ip_billing->PatientID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div<?php echo $view_ip_billing->PatientID->cellAttributes() ?>>
<script id="tpx_view_ip_billing_PatientID" class="view_ip_billingedit" type="text/html">
<span id="el_view_ip_billing_PatientID">
<span<?php echo $view_ip_billing->PatientID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_billing->PatientID->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_ip_billing" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" value="<?php echo HtmlEncode($view_ip_billing->PatientID->CurrentValue) ?>">
<?php echo $view_ip_billing->PatientID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_billing->patient_name->Visible) { // patient_name ?>
	<div id="r_patient_name" class="form-group row">
		<label id="elh_view_ip_billing_patient_name" for="x_patient_name" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_patient_name" class="view_ip_billingedit" type="text/html"><span><?php echo $view_ip_billing->patient_name->caption() ?><?php echo ($view_ip_billing->patient_name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div<?php echo $view_ip_billing->patient_name->cellAttributes() ?>>
<script id="tpx_view_ip_billing_patient_name" class="view_ip_billingedit" type="text/html">
<span id="el_view_ip_billing_patient_name">
<span<?php echo $view_ip_billing->patient_name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_billing->patient_name->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_ip_billing" data-field="x_patient_name" name="x_patient_name" id="x_patient_name" value="<?php echo HtmlEncode($view_ip_billing->patient_name->CurrentValue) ?>">
<?php echo $view_ip_billing->patient_name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_billing->mrnNo->Visible) { // mrnNo ?>
	<div id="r_mrnNo" class="form-group row">
		<label id="elh_view_ip_billing_mrnNo" for="x_mrnNo" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_mrnNo" class="view_ip_billingedit" type="text/html"><span><?php echo $view_ip_billing->mrnNo->caption() ?><?php echo ($view_ip_billing->mrnNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div<?php echo $view_ip_billing->mrnNo->cellAttributes() ?>>
<script id="tpx_view_ip_billing_mrnNo" class="view_ip_billingedit" type="text/html">
<span id="el_view_ip_billing_mrnNo">
<span<?php echo $view_ip_billing->mrnNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_billing->mrnNo->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_ip_billing" data-field="x_mrnNo" name="x_mrnNo" id="x_mrnNo" value="<?php echo HtmlEncode($view_ip_billing->mrnNo->CurrentValue) ?>">
<?php echo $view_ip_billing->mrnNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_billing->mobileno->Visible) { // mobileno ?>
	<div id="r_mobileno" class="form-group row">
		<label id="elh_view_ip_billing_mobileno" for="x_mobileno" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_mobileno" class="view_ip_billingedit" type="text/html"><span><?php echo $view_ip_billing->mobileno->caption() ?><?php echo ($view_ip_billing->mobileno->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div<?php echo $view_ip_billing->mobileno->cellAttributes() ?>>
<script id="tpx_view_ip_billing_mobileno" class="view_ip_billingedit" type="text/html">
<span id="el_view_ip_billing_mobileno">
<span<?php echo $view_ip_billing->mobileno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_billing->mobileno->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_ip_billing" data-field="x_mobileno" name="x_mobileno" id="x_mobileno" value="<?php echo HtmlEncode($view_ip_billing->mobileno->CurrentValue) ?>">
<?php echo $view_ip_billing->mobileno->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_billing->profilePic->Visible) { // profilePic ?>
	<div id="r_profilePic" class="form-group row">
		<label id="elh_view_ip_billing_profilePic" for="x_profilePic" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_profilePic" class="view_ip_billingedit" type="text/html"><span><?php echo $view_ip_billing->profilePic->caption() ?><?php echo ($view_ip_billing->profilePic->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div<?php echo $view_ip_billing->profilePic->cellAttributes() ?>>
<script id="tpx_view_ip_billing_profilePic" class="view_ip_billingedit" type="text/html">
<span id="el_view_ip_billing_profilePic">
<span<?php echo $view_ip_billing->profilePic->viewAttributes() ?>>
<?php echo $view_ip_billing->profilePic->EditValue ?></span>
</span>
</script>
<input type="hidden" data-table="view_ip_billing" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" value="<?php echo HtmlEncode($view_ip_billing->profilePic->CurrentValue) ?>">
<?php echo $view_ip_billing->profilePic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_billing->gender->Visible) { // gender ?>
	<div id="r_gender" class="form-group row">
		<label id="elh_view_ip_billing_gender" for="x_gender" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_gender" class="view_ip_billingedit" type="text/html"><span><?php echo $view_ip_billing->gender->caption() ?><?php echo ($view_ip_billing->gender->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div<?php echo $view_ip_billing->gender->cellAttributes() ?>>
<script id="tpx_view_ip_billing_gender" class="view_ip_billingedit" type="text/html">
<span id="el_view_ip_billing_gender">
<span<?php echo $view_ip_billing->gender->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_billing->gender->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_ip_billing" data-field="x_gender" name="x_gender" id="x_gender" value="<?php echo HtmlEncode($view_ip_billing->gender->CurrentValue) ?>">
<?php echo $view_ip_billing->gender->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_billing->age->Visible) { // age ?>
	<div id="r_age" class="form-group row">
		<label id="elh_view_ip_billing_age" for="x_age" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_age" class="view_ip_billingedit" type="text/html"><span><?php echo $view_ip_billing->age->caption() ?><?php echo ($view_ip_billing->age->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div<?php echo $view_ip_billing->age->cellAttributes() ?>>
<script id="tpx_view_ip_billing_age" class="view_ip_billingedit" type="text/html">
<span id="el_view_ip_billing_age">
<span<?php echo $view_ip_billing->age->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_billing->age->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_ip_billing" data-field="x_age" name="x_age" id="x_age" value="<?php echo HtmlEncode($view_ip_billing->age->CurrentValue) ?>">
<?php echo $view_ip_billing->age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_billing->physician_id->Visible) { // physician_id ?>
	<div id="r_physician_id" class="form-group row">
		<label id="elh_view_ip_billing_physician_id" for="x_physician_id" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_physician_id" class="view_ip_billingedit" type="text/html"><span><?php echo $view_ip_billing->physician_id->caption() ?><?php echo ($view_ip_billing->physician_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div<?php echo $view_ip_billing->physician_id->cellAttributes() ?>>
<script id="tpx_view_ip_billing_physician_id" class="view_ip_billingedit" type="text/html">
<span id="el_view_ip_billing_physician_id">
<span<?php echo $view_ip_billing->physician_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_billing->physician_id->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_ip_billing" data-field="x_physician_id" name="x_physician_id" id="x_physician_id" value="<?php echo HtmlEncode($view_ip_billing->physician_id->CurrentValue) ?>">
<?php echo $view_ip_billing->physician_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_billing->typeRegsisteration->Visible) { // typeRegsisteration ?>
	<div id="r_typeRegsisteration" class="form-group row">
		<label id="elh_view_ip_billing_typeRegsisteration" for="x_typeRegsisteration" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_typeRegsisteration" class="view_ip_billingedit" type="text/html"><span><?php echo $view_ip_billing->typeRegsisteration->caption() ?><?php echo ($view_ip_billing->typeRegsisteration->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div<?php echo $view_ip_billing->typeRegsisteration->cellAttributes() ?>>
<script id="tpx_view_ip_billing_typeRegsisteration" class="view_ip_billingedit" type="text/html">
<span id="el_view_ip_billing_typeRegsisteration">
<span<?php echo $view_ip_billing->typeRegsisteration->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_billing->typeRegsisteration->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_ip_billing" data-field="x_typeRegsisteration" name="x_typeRegsisteration" id="x_typeRegsisteration" value="<?php echo HtmlEncode($view_ip_billing->typeRegsisteration->CurrentValue) ?>">
<?php echo $view_ip_billing->typeRegsisteration->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_billing->PaymentCategory->Visible) { // PaymentCategory ?>
	<div id="r_PaymentCategory" class="form-group row">
		<label id="elh_view_ip_billing_PaymentCategory" for="x_PaymentCategory" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_PaymentCategory" class="view_ip_billingedit" type="text/html"><span><?php echo $view_ip_billing->PaymentCategory->caption() ?><?php echo ($view_ip_billing->PaymentCategory->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div<?php echo $view_ip_billing->PaymentCategory->cellAttributes() ?>>
<script id="tpx_view_ip_billing_PaymentCategory" class="view_ip_billingedit" type="text/html">
<span id="el_view_ip_billing_PaymentCategory">
<span<?php echo $view_ip_billing->PaymentCategory->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_billing->PaymentCategory->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_ip_billing" data-field="x_PaymentCategory" name="x_PaymentCategory" id="x_PaymentCategory" value="<?php echo HtmlEncode($view_ip_billing->PaymentCategory->CurrentValue) ?>">
<?php echo $view_ip_billing->PaymentCategory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_billing->admission_consultant_id->Visible) { // admission_consultant_id ?>
	<div id="r_admission_consultant_id" class="form-group row">
		<label id="elh_view_ip_billing_admission_consultant_id" for="x_admission_consultant_id" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_admission_consultant_id" class="view_ip_billingedit" type="text/html"><span><?php echo $view_ip_billing->admission_consultant_id->caption() ?><?php echo ($view_ip_billing->admission_consultant_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div<?php echo $view_ip_billing->admission_consultant_id->cellAttributes() ?>>
<script id="tpx_view_ip_billing_admission_consultant_id" class="view_ip_billingedit" type="text/html">
<span id="el_view_ip_billing_admission_consultant_id">
<span<?php echo $view_ip_billing->admission_consultant_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_billing->admission_consultant_id->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_ip_billing" data-field="x_admission_consultant_id" name="x_admission_consultant_id" id="x_admission_consultant_id" value="<?php echo HtmlEncode($view_ip_billing->admission_consultant_id->CurrentValue) ?>">
<?php echo $view_ip_billing->admission_consultant_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_billing->leading_consultant_id->Visible) { // leading_consultant_id ?>
	<div id="r_leading_consultant_id" class="form-group row">
		<label id="elh_view_ip_billing_leading_consultant_id" for="x_leading_consultant_id" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_leading_consultant_id" class="view_ip_billingedit" type="text/html"><span><?php echo $view_ip_billing->leading_consultant_id->caption() ?><?php echo ($view_ip_billing->leading_consultant_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div<?php echo $view_ip_billing->leading_consultant_id->cellAttributes() ?>>
<script id="tpx_view_ip_billing_leading_consultant_id" class="view_ip_billingedit" type="text/html">
<span id="el_view_ip_billing_leading_consultant_id">
<span<?php echo $view_ip_billing->leading_consultant_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_billing->leading_consultant_id->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_ip_billing" data-field="x_leading_consultant_id" name="x_leading_consultant_id" id="x_leading_consultant_id" value="<?php echo HtmlEncode($view_ip_billing->leading_consultant_id->CurrentValue) ?>">
<?php echo $view_ip_billing->leading_consultant_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_billing->cause->Visible) { // cause ?>
	<div id="r_cause" class="form-group row">
		<label id="elh_view_ip_billing_cause" for="x_cause" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_cause" class="view_ip_billingedit" type="text/html"><span><?php echo $view_ip_billing->cause->caption() ?><?php echo ($view_ip_billing->cause->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div<?php echo $view_ip_billing->cause->cellAttributes() ?>>
<script id="tpx_view_ip_billing_cause" class="view_ip_billingedit" type="text/html">
<span id="el_view_ip_billing_cause">
<span<?php echo $view_ip_billing->cause->viewAttributes() ?>>
<?php echo $view_ip_billing->cause->EditValue ?></span>
</span>
</script>
<input type="hidden" data-table="view_ip_billing" data-field="x_cause" name="x_cause" id="x_cause" value="<?php echo HtmlEncode($view_ip_billing->cause->CurrentValue) ?>">
<?php echo $view_ip_billing->cause->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_billing->admission_date->Visible) { // admission_date ?>
	<div id="r_admission_date" class="form-group row">
		<label id="elh_view_ip_billing_admission_date" for="x_admission_date" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_admission_date" class="view_ip_billingedit" type="text/html"><span><?php echo $view_ip_billing->admission_date->caption() ?><?php echo ($view_ip_billing->admission_date->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div<?php echo $view_ip_billing->admission_date->cellAttributes() ?>>
<script id="tpx_view_ip_billing_admission_date" class="view_ip_billingedit" type="text/html">
<span id="el_view_ip_billing_admission_date">
<span<?php echo $view_ip_billing->admission_date->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_billing->admission_date->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_ip_billing" data-field="x_admission_date" name="x_admission_date" id="x_admission_date" value="<?php echo HtmlEncode($view_ip_billing->admission_date->CurrentValue) ?>">
<script type="text/html" class="view_ip_billingedit_js">
ew.createDateTimePicker("fview_ip_billingedit", "x_admission_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php echo $view_ip_billing->admission_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_billing->release_date->Visible) { // release_date ?>
	<div id="r_release_date" class="form-group row">
		<label id="elh_view_ip_billing_release_date" for="x_release_date" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_release_date" class="view_ip_billingedit" type="text/html"><span><?php echo $view_ip_billing->release_date->caption() ?><?php echo ($view_ip_billing->release_date->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div<?php echo $view_ip_billing->release_date->cellAttributes() ?>>
<script id="tpx_view_ip_billing_release_date" class="view_ip_billingedit" type="text/html">
<span id="el_view_ip_billing_release_date">
<input type="text" data-table="view_ip_billing" data-field="x_release_date" data-format="7" name="x_release_date" id="x_release_date" placeholder="<?php echo HtmlEncode($view_ip_billing->release_date->getPlaceHolder()) ?>" value="<?php echo $view_ip_billing->release_date->EditValue ?>"<?php echo $view_ip_billing->release_date->editAttributes() ?>>
<?php if (!$view_ip_billing->release_date->ReadOnly && !$view_ip_billing->release_date->Disabled && !isset($view_ip_billing->release_date->EditAttrs["readonly"]) && !isset($view_ip_billing->release_date->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="view_ip_billingedit_js">
ew.createDateTimePicker("fview_ip_billingedit", "x_release_date", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php echo $view_ip_billing->release_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_billing->PaymentStatus->Visible) { // PaymentStatus ?>
	<div id="r_PaymentStatus" class="form-group row">
		<label id="elh_view_ip_billing_PaymentStatus" for="x_PaymentStatus" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_PaymentStatus" class="view_ip_billingedit" type="text/html"><span><?php echo $view_ip_billing->PaymentStatus->caption() ?><?php echo ($view_ip_billing->PaymentStatus->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div<?php echo $view_ip_billing->PaymentStatus->cellAttributes() ?>>
<script id="tpx_view_ip_billing_PaymentStatus" class="view_ip_billingedit" type="text/html">
<span id="el_view_ip_billing_PaymentStatus">
<span<?php echo $view_ip_billing->PaymentStatus->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_billing->PaymentStatus->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_ip_billing" data-field="x_PaymentStatus" name="x_PaymentStatus" id="x_PaymentStatus" value="<?php echo HtmlEncode($view_ip_billing->PaymentStatus->CurrentValue) ?>">
<?php echo $view_ip_billing->PaymentStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_billing->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_view_ip_billing_status" for="x_status" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_status" class="view_ip_billingedit" type="text/html"><span><?php echo $view_ip_billing->status->caption() ?><?php echo ($view_ip_billing->status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div<?php echo $view_ip_billing->status->cellAttributes() ?>>
<script id="tpx_view_ip_billing_status" class="view_ip_billingedit" type="text/html">
<span id="el_view_ip_billing_status">
<span<?php echo $view_ip_billing->status->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_billing->status->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_ip_billing" data-field="x_status" name="x_status" id="x_status" value="<?php echo HtmlEncode($view_ip_billing->status->CurrentValue) ?>">
<?php echo $view_ip_billing->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_billing->createdby->Visible) { // createdby ?>
	<div id="r_createdby" class="form-group row">
		<label id="elh_view_ip_billing_createdby" for="x_createdby" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_createdby" class="view_ip_billingedit" type="text/html"><span><?php echo $view_ip_billing->createdby->caption() ?><?php echo ($view_ip_billing->createdby->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div<?php echo $view_ip_billing->createdby->cellAttributes() ?>>
<script id="tpx_view_ip_billing_createdby" class="view_ip_billingedit" type="text/html">
<span id="el_view_ip_billing_createdby">
<span<?php echo $view_ip_billing->createdby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_billing->createdby->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_ip_billing" data-field="x_createdby" name="x_createdby" id="x_createdby" value="<?php echo HtmlEncode($view_ip_billing->createdby->CurrentValue) ?>">
<?php echo $view_ip_billing->createdby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_billing->createddatetime->Visible) { // createddatetime ?>
	<div id="r_createddatetime" class="form-group row">
		<label id="elh_view_ip_billing_createddatetime" for="x_createddatetime" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_createddatetime" class="view_ip_billingedit" type="text/html"><span><?php echo $view_ip_billing->createddatetime->caption() ?><?php echo ($view_ip_billing->createddatetime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div<?php echo $view_ip_billing->createddatetime->cellAttributes() ?>>
<script id="tpx_view_ip_billing_createddatetime" class="view_ip_billingedit" type="text/html">
<span id="el_view_ip_billing_createddatetime">
<span<?php echo $view_ip_billing->createddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_billing->createddatetime->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_ip_billing" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" value="<?php echo HtmlEncode($view_ip_billing->createddatetime->CurrentValue) ?>">
<script type="text/html" class="view_ip_billingedit_js">
ew.createDateTimePicker("fview_ip_billingedit", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php echo $view_ip_billing->createddatetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_billing->modifiedby->Visible) { // modifiedby ?>
	<div id="r_modifiedby" class="form-group row">
		<label id="elh_view_ip_billing_modifiedby" for="x_modifiedby" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_modifiedby" class="view_ip_billingedit" type="text/html"><span><?php echo $view_ip_billing->modifiedby->caption() ?><?php echo ($view_ip_billing->modifiedby->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div<?php echo $view_ip_billing->modifiedby->cellAttributes() ?>>
<script id="tpx_view_ip_billing_modifiedby" class="view_ip_billingedit" type="text/html">
<span id="el_view_ip_billing_modifiedby">
<span<?php echo $view_ip_billing->modifiedby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_billing->modifiedby->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_ip_billing" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" value="<?php echo HtmlEncode($view_ip_billing->modifiedby->CurrentValue) ?>">
<?php echo $view_ip_billing->modifiedby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_billing->modifieddatetime->Visible) { // modifieddatetime ?>
	<div id="r_modifieddatetime" class="form-group row">
		<label id="elh_view_ip_billing_modifieddatetime" for="x_modifieddatetime" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_modifieddatetime" class="view_ip_billingedit" type="text/html"><span><?php echo $view_ip_billing->modifieddatetime->caption() ?><?php echo ($view_ip_billing->modifieddatetime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div<?php echo $view_ip_billing->modifieddatetime->cellAttributes() ?>>
<script id="tpx_view_ip_billing_modifieddatetime" class="view_ip_billingedit" type="text/html">
<span id="el_view_ip_billing_modifieddatetime">
<span<?php echo $view_ip_billing->modifieddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_billing->modifieddatetime->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_ip_billing" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" value="<?php echo HtmlEncode($view_ip_billing->modifieddatetime->CurrentValue) ?>">
<script type="text/html" class="view_ip_billingedit_js">
ew.createDateTimePicker("fview_ip_billingedit", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php echo $view_ip_billing->modifieddatetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_billing->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label id="elh_view_ip_billing_HospID" for="x_HospID" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_HospID" class="view_ip_billingedit" type="text/html"><span><?php echo $view_ip_billing->HospID->caption() ?><?php echo ($view_ip_billing->HospID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div<?php echo $view_ip_billing->HospID->cellAttributes() ?>>
<script id="tpx_view_ip_billing_HospID" class="view_ip_billingedit" type="text/html">
<span id="el_view_ip_billing_HospID">
<span<?php echo $view_ip_billing->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_billing->HospID->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_ip_billing" data-field="x_HospID" name="x_HospID" id="x_HospID" value="<?php echo HtmlEncode($view_ip_billing->HospID->CurrentValue) ?>">
<?php echo $view_ip_billing->HospID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_billing->ReferedByDr->Visible) { // ReferedByDr ?>
	<div id="r_ReferedByDr" class="form-group row">
		<label id="elh_view_ip_billing_ReferedByDr" for="x_ReferedByDr" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_ReferedByDr" class="view_ip_billingedit" type="text/html"><span><?php echo $view_ip_billing->ReferedByDr->caption() ?><?php echo ($view_ip_billing->ReferedByDr->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div<?php echo $view_ip_billing->ReferedByDr->cellAttributes() ?>>
<script id="tpx_view_ip_billing_ReferedByDr" class="view_ip_billingedit" type="text/html">
<span id="el_view_ip_billing_ReferedByDr">
<span<?php echo $view_ip_billing->ReferedByDr->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_billing->ReferedByDr->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_ip_billing" data-field="x_ReferedByDr" name="x_ReferedByDr" id="x_ReferedByDr" value="<?php echo HtmlEncode($view_ip_billing->ReferedByDr->CurrentValue) ?>">
<?php echo $view_ip_billing->ReferedByDr->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_billing->ReferClinicname->Visible) { // ReferClinicname ?>
	<div id="r_ReferClinicname" class="form-group row">
		<label id="elh_view_ip_billing_ReferClinicname" for="x_ReferClinicname" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_ReferClinicname" class="view_ip_billingedit" type="text/html"><span><?php echo $view_ip_billing->ReferClinicname->caption() ?><?php echo ($view_ip_billing->ReferClinicname->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div<?php echo $view_ip_billing->ReferClinicname->cellAttributes() ?>>
<script id="tpx_view_ip_billing_ReferClinicname" class="view_ip_billingedit" type="text/html">
<span id="el_view_ip_billing_ReferClinicname">
<span<?php echo $view_ip_billing->ReferClinicname->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_billing->ReferClinicname->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_ip_billing" data-field="x_ReferClinicname" name="x_ReferClinicname" id="x_ReferClinicname" value="<?php echo HtmlEncode($view_ip_billing->ReferClinicname->CurrentValue) ?>">
<?php echo $view_ip_billing->ReferClinicname->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_billing->ReferCity->Visible) { // ReferCity ?>
	<div id="r_ReferCity" class="form-group row">
		<label id="elh_view_ip_billing_ReferCity" for="x_ReferCity" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_ReferCity" class="view_ip_billingedit" type="text/html"><span><?php echo $view_ip_billing->ReferCity->caption() ?><?php echo ($view_ip_billing->ReferCity->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div<?php echo $view_ip_billing->ReferCity->cellAttributes() ?>>
<script id="tpx_view_ip_billing_ReferCity" class="view_ip_billingedit" type="text/html">
<span id="el_view_ip_billing_ReferCity">
<span<?php echo $view_ip_billing->ReferCity->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_billing->ReferCity->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_ip_billing" data-field="x_ReferCity" name="x_ReferCity" id="x_ReferCity" value="<?php echo HtmlEncode($view_ip_billing->ReferCity->CurrentValue) ?>">
<?php echo $view_ip_billing->ReferCity->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_billing->ReferMobileNo->Visible) { // ReferMobileNo ?>
	<div id="r_ReferMobileNo" class="form-group row">
		<label id="elh_view_ip_billing_ReferMobileNo" for="x_ReferMobileNo" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_ReferMobileNo" class="view_ip_billingedit" type="text/html"><span><?php echo $view_ip_billing->ReferMobileNo->caption() ?><?php echo ($view_ip_billing->ReferMobileNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div<?php echo $view_ip_billing->ReferMobileNo->cellAttributes() ?>>
<script id="tpx_view_ip_billing_ReferMobileNo" class="view_ip_billingedit" type="text/html">
<span id="el_view_ip_billing_ReferMobileNo">
<span<?php echo $view_ip_billing->ReferMobileNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_billing->ReferMobileNo->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_ip_billing" data-field="x_ReferMobileNo" name="x_ReferMobileNo" id="x_ReferMobileNo" value="<?php echo HtmlEncode($view_ip_billing->ReferMobileNo->CurrentValue) ?>">
<?php echo $view_ip_billing->ReferMobileNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_billing->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
	<div id="r_ReferA4TreatingConsultant" class="form-group row">
		<label id="elh_view_ip_billing_ReferA4TreatingConsultant" for="x_ReferA4TreatingConsultant" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_ReferA4TreatingConsultant" class="view_ip_billingedit" type="text/html"><span><?php echo $view_ip_billing->ReferA4TreatingConsultant->caption() ?><?php echo ($view_ip_billing->ReferA4TreatingConsultant->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div<?php echo $view_ip_billing->ReferA4TreatingConsultant->cellAttributes() ?>>
<script id="tpx_view_ip_billing_ReferA4TreatingConsultant" class="view_ip_billingedit" type="text/html">
<span id="el_view_ip_billing_ReferA4TreatingConsultant">
<span<?php echo $view_ip_billing->ReferA4TreatingConsultant->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_billing->ReferA4TreatingConsultant->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_ip_billing" data-field="x_ReferA4TreatingConsultant" name="x_ReferA4TreatingConsultant" id="x_ReferA4TreatingConsultant" value="<?php echo HtmlEncode($view_ip_billing->ReferA4TreatingConsultant->CurrentValue) ?>">
<?php echo $view_ip_billing->ReferA4TreatingConsultant->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_billing->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
	<div id="r_PurposreReferredfor" class="form-group row">
		<label id="elh_view_ip_billing_PurposreReferredfor" for="x_PurposreReferredfor" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_PurposreReferredfor" class="view_ip_billingedit" type="text/html"><span><?php echo $view_ip_billing->PurposreReferredfor->caption() ?><?php echo ($view_ip_billing->PurposreReferredfor->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div<?php echo $view_ip_billing->PurposreReferredfor->cellAttributes() ?>>
<script id="tpx_view_ip_billing_PurposreReferredfor" class="view_ip_billingedit" type="text/html">
<span id="el_view_ip_billing_PurposreReferredfor">
<span<?php echo $view_ip_billing->PurposreReferredfor->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_billing->PurposreReferredfor->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_ip_billing" data-field="x_PurposreReferredfor" name="x_PurposreReferredfor" id="x_PurposreReferredfor" value="<?php echo HtmlEncode($view_ip_billing->PurposreReferredfor->CurrentValue) ?>">
<?php echo $view_ip_billing->PurposreReferredfor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_billing->patient_id->Visible) { // patient_id ?>
	<div id="r_patient_id" class="form-group row">
		<label id="elh_view_ip_billing_patient_id" for="x_patient_id" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_patient_id" class="view_ip_billingedit" type="text/html"><span><?php echo $view_ip_billing->patient_id->caption() ?><?php echo ($view_ip_billing->patient_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div<?php echo $view_ip_billing->patient_id->cellAttributes() ?>>
<script id="tpx_view_ip_billing_patient_id" class="view_ip_billingedit" type="text/html">
<span id="el_view_ip_billing_patient_id">
<span<?php echo $view_ip_billing->patient_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_ip_billing->patient_id->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="view_ip_billing" data-field="x_patient_id" name="x_patient_id" id="x_patient_id" value="<?php echo HtmlEncode($view_ip_billing->patient_id->CurrentValue) ?>">
<?php echo $view_ip_billing->patient_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_billing->BillClosing->Visible) { // BillClosing ?>
	<div id="r_BillClosing" class="form-group row">
		<label id="elh_view_ip_billing_BillClosing" for="x_BillClosing" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_BillClosing" class="view_ip_billingedit" type="text/html"><span><?php echo $view_ip_billing->BillClosing->caption() ?><?php echo ($view_ip_billing->BillClosing->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div<?php echo $view_ip_billing->BillClosing->cellAttributes() ?>>
<script id="tpx_view_ip_billing_BillClosing" class="view_ip_billingedit" type="text/html">
<span id="el_view_ip_billing_BillClosing">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_ip_billing" data-field="x_BillClosing" data-value-separator="<?php echo $view_ip_billing->BillClosing->displayValueSeparatorAttribute() ?>" id="x_BillClosing" name="x_BillClosing"<?php echo $view_ip_billing->BillClosing->editAttributes() ?>>
		<?php echo $view_ip_billing->BillClosing->selectOptionListHtml("x_BillClosing") ?>
	</select>
</div>
</span>
</script>
<?php echo $view_ip_billing->BillClosing->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_billing->BillClosingDate->Visible) { // BillClosingDate ?>
	<div id="r_BillClosingDate" class="form-group row">
		<label id="elh_view_ip_billing_BillClosingDate" for="x_BillClosingDate" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_BillClosingDate" class="view_ip_billingedit" type="text/html"><span><?php echo $view_ip_billing->BillClosingDate->caption() ?><?php echo ($view_ip_billing->BillClosingDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div<?php echo $view_ip_billing->BillClosingDate->cellAttributes() ?>>
<script id="tpx_view_ip_billing_BillClosingDate" class="view_ip_billingedit" type="text/html">
<span id="el_view_ip_billing_BillClosingDate">
<input type="text" data-table="view_ip_billing" data-field="x_BillClosingDate" data-format="7" name="x_BillClosingDate" id="x_BillClosingDate" placeholder="<?php echo HtmlEncode($view_ip_billing->BillClosingDate->getPlaceHolder()) ?>" value="<?php echo $view_ip_billing->BillClosingDate->EditValue ?>"<?php echo $view_ip_billing->BillClosingDate->editAttributes() ?>>
<?php if (!$view_ip_billing->BillClosingDate->ReadOnly && !$view_ip_billing->BillClosingDate->Disabled && !isset($view_ip_billing->BillClosingDate->EditAttrs["readonly"]) && !isset($view_ip_billing->BillClosingDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="view_ip_billingedit_js">
ew.createDateTimePicker("fview_ip_billingedit", "x_BillClosingDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php echo $view_ip_billing->BillClosingDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_billing->BillNumber->Visible) { // BillNumber ?>
	<div id="r_BillNumber" class="form-group row">
		<label id="elh_view_ip_billing_BillNumber" for="x_BillNumber" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_BillNumber" class="view_ip_billingedit" type="text/html"><span><?php echo $view_ip_billing->BillNumber->caption() ?><?php echo ($view_ip_billing->BillNumber->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div<?php echo $view_ip_billing->BillNumber->cellAttributes() ?>>
<script id="tpx_view_ip_billing_BillNumber" class="view_ip_billingedit" type="text/html">
<span id="el_view_ip_billing_BillNumber">
<input type="text" data-table="view_ip_billing" data-field="x_BillNumber" name="x_BillNumber" id="x_BillNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_billing->BillNumber->getPlaceHolder()) ?>" value="<?php echo $view_ip_billing->BillNumber->EditValue ?>"<?php echo $view_ip_billing->BillNumber->editAttributes() ?>>
</span>
</script>
<?php echo $view_ip_billing->BillNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_billing->ClosingAmount->Visible) { // ClosingAmount ?>
	<div id="r_ClosingAmount" class="form-group row">
		<label id="elh_view_ip_billing_ClosingAmount" for="x_ClosingAmount" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_ClosingAmount" class="view_ip_billingedit" type="text/html"><span><?php echo $view_ip_billing->ClosingAmount->caption() ?><?php echo ($view_ip_billing->ClosingAmount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div<?php echo $view_ip_billing->ClosingAmount->cellAttributes() ?>>
<script id="tpx_view_ip_billing_ClosingAmount" class="view_ip_billingedit" type="text/html">
<span id="el_view_ip_billing_ClosingAmount">
<input type="text" data-table="view_ip_billing" data-field="x_ClosingAmount" name="x_ClosingAmount" id="x_ClosingAmount" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_billing->ClosingAmount->getPlaceHolder()) ?>" value="<?php echo $view_ip_billing->ClosingAmount->EditValue ?>"<?php echo $view_ip_billing->ClosingAmount->editAttributes() ?>>
</span>
</script>
<?php echo $view_ip_billing->ClosingAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_billing->ClosingType->Visible) { // ClosingType ?>
	<div id="r_ClosingType" class="form-group row">
		<label id="elh_view_ip_billing_ClosingType" for="x_ClosingType" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_ClosingType" class="view_ip_billingedit" type="text/html"><span><?php echo $view_ip_billing->ClosingType->caption() ?><?php echo ($view_ip_billing->ClosingType->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div<?php echo $view_ip_billing->ClosingType->cellAttributes() ?>>
<script id="tpx_view_ip_billing_ClosingType" class="view_ip_billingedit" type="text/html">
<span id="el_view_ip_billing_ClosingType">
<input type="text" data-table="view_ip_billing" data-field="x_ClosingType" name="x_ClosingType" id="x_ClosingType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_billing->ClosingType->getPlaceHolder()) ?>" value="<?php echo $view_ip_billing->ClosingType->EditValue ?>"<?php echo $view_ip_billing->ClosingType->editAttributes() ?>>
</span>
</script>
<?php echo $view_ip_billing->ClosingType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_billing->BillAmount->Visible) { // BillAmount ?>
	<div id="r_BillAmount" class="form-group row">
		<label id="elh_view_ip_billing_BillAmount" for="x_BillAmount" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_BillAmount" class="view_ip_billingedit" type="text/html"><span><?php echo $view_ip_billing->BillAmount->caption() ?><?php echo ($view_ip_billing->BillAmount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div<?php echo $view_ip_billing->BillAmount->cellAttributes() ?>>
<script id="tpx_view_ip_billing_BillAmount" class="view_ip_billingedit" type="text/html">
<span id="el_view_ip_billing_BillAmount">
<input type="text" data-table="view_ip_billing" data-field="x_BillAmount" name="x_BillAmount" id="x_BillAmount" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_billing->BillAmount->getPlaceHolder()) ?>" value="<?php echo $view_ip_billing->BillAmount->EditValue ?>"<?php echo $view_ip_billing->BillAmount->editAttributes() ?>>
</span>
</script>
<?php echo $view_ip_billing->BillAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ip_billing->ReportHeader->Visible) { // ReportHeader ?>
	<div id="r_ReportHeader" class="form-group row">
		<label id="elh_view_ip_billing_ReportHeader" class="<?php echo $view_ip_billing_edit->LeftColumnClass ?>"><script id="tpc_view_ip_billing_ReportHeader" class="view_ip_billingedit" type="text/html"><span><?php echo $view_ip_billing->ReportHeader->caption() ?><?php echo ($view_ip_billing->ReportHeader->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_ip_billing_edit->RightColumnClass ?>"><div<?php echo $view_ip_billing->ReportHeader->cellAttributes() ?>>
<script id="tpx_view_ip_billing_ReportHeader" class="view_ip_billingedit" type="text/html">
<span id="el_view_ip_billing_ReportHeader">
<div id="tp_x_ReportHeader" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_ip_billing" data-field="x_ReportHeader" data-value-separator="<?php echo $view_ip_billing->ReportHeader->displayValueSeparatorAttribute() ?>" name="x_ReportHeader[]" id="x_ReportHeader[]" value="{value}"<?php echo $view_ip_billing->ReportHeader->editAttributes() ?>></div>
<div id="dsl_x_ReportHeader" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_ip_billing->ReportHeader->checkBoxListHtml(FALSE, "x_ReportHeader[]") ?>
</div></div>
</span>
</script>
<?php echo $view_ip_billing->ReportHeader->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_view_ip_billingedit" class="ew-custom-template"></div>
<script id="tpm_view_ip_billingedit" type="text/html">
<div id="ct_view_ip_billing_edit"><style>
.ew-form:not(.ew-list-form):not(.ew-pager-form), table.ew-master-table.ew-vertical {
	width: 90%;
}
	.ew-form:not(.ew-list-form):not(.ew-pager-form), table.ew-master-table.ew-vertical {
		width: 90%;
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
.alignleft {
	float: left;
}
.alignright {
	float: right;
}
</style>
<?php

function convertToIndianCurrency($number) {
	$no = round($number);
	$decimal = round($number - ($no = floor($number)), 2) * 100;    
	$digits_length = strlen($no);    
	$i = 0;
	$str = array();
	$words = array(
		0 => '',
		1 => 'One',
		2 => 'Two',
		3 => 'Three',
		4 => 'Four',
		5 => 'Five',
		6 => 'Six',
		7 => 'Seven',
		8 => 'Eight',
		9 => 'Nine',
		10 => 'Ten',
		11 => 'Eleven',
		12 => 'Twelve',
		13 => 'Thirteen',
		14 => 'Fourteen',
		15 => 'Fifteen',
		16 => 'Sixteen',
		17 => 'Seventeen',
		18 => 'Eighteen',
		19 => 'Nineteen',
		20 => 'Twenty',
		30 => 'Thirty',
		40 => 'Forty',
		50 => 'Fifty',
		60 => 'Sixty',
		70 => 'Seventy',
		80 => 'Eighty',
		90 => 'Ninety');
	$digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
	while ($i < $digits_length) {
		$divider = ($i == 2) ? 10 : 100;
		$number = floor($no % $divider);
		$no = floor($no / $divider);
		$i += $divider == 10 ? 1 : 2;
		if ($number) {
			$plural = (($counter = count($str)) && $number > 9) ? 's' : null;            
			$str [] = ($number < 21) ? $words[$number] . ' ' . $digits[$counter] . $plural : $words[floor($number / 10) * 10] . ' ' . $words[$number % 10] . ' ' . $digits[$counter] . $plural;
		} else {
			$str [] = null;
		}  
	}
	$Rupees = implode(' ', array_reverse($str));
	$paise = ($decimal) ? "And Paise " . ($words[$decimal - $decimal%10]) ." " .($words[$decimal%10])  : '';
	return ($Rupees ? 'Rupees ' . $Rupees : '') . $paise . " Only";
}
	$invoiceId = $Page->id->CurrentValue;
	$dbhelper = &DbHelper();
	$sql = "SELECT * FROM ganeshkumar_bjhims.ip_admission where id='".$invoiceId."'; ";
	$results1 = $dbhelper->ExecuteRows($sql);
	$physician_id = $results1[0]["physician_id"];
	$BillNumber =  $results1[0]["BillNumber"];
	$sql = "SELECT * FROM ganeshkumar_bjhims.doctors where id='".$physician_id."'; ";
	$results1A = $dbhelper->ExecuteRows($sql);
	$Doctor = $results1A[0]["NAME"];
	$patient_id = $results1[0]["PatientID"];
	$PatId = $results1[0]["patient_id"];
	$HospID = $results1[0]["HospID"];
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$PatId."' ;";
$rs = $dbhelper->LoadRecordset($sql);
while (!$rs->EOF) {
	 $row = &$rs->fields;
	 $Patid =  $row["id"];
	 $PatientID =  $row["PatientID"];
	 $PatientName =  $row["first_name"];
	 $gender =  $row["gender"];
	 $dob =  $row["dob"];
	 $Age =  $row["Age"];
	 if($dob != null)
	 {
	 	$Age = $Age;
	 }
	 $mobile_no =  $row["mobile_no"];
	 $IdentificationMark =  $row["IdentificationMark"];
	 $Religion =  $row["Religion"];
	 $street =  $row["street"];
	 $town =  $row["town"];
	 $province =  $row["province"];
	 $country =  $row["country"];
	 $postal_code =  $row["postal_code"];
	 $PEmail =  $row["PEmail"];
	if( $street != '')
	{
		$address .= $street;
	}
	if( $town != '')
	{
		$address .= ', '.$town;
	}
	if( $province != '')
	{
		$address .= ', '.$province;
	}
	if( $country != '')
	{
		$address .= ', '.$country;
	}
	 if( $postal_code != '')
	{
		$address .= ', '.$postal_code;
	}
	 $rs->MoveNext();
 }
$aa = "ewbarcode.php?data=".$Page->id->CurrentValue."&encode=EAN-13&height=40&color=%23000000";
 $sql = "SELECT * FROM ganeshkumar_bjhims.hospital where id='".$HospID."' ;";
$results2 = $dbhelper->ExecuteRows($sql);
if($results2[0]["BillingGST"] != "")
{
$HospGST = "GST No:". $results2[0]["BillingGST"];
}
if($Page->ReportHeader->CurrentValue=="Yes")
{
$id =  $results2[0]["id"];
 $logo = $results2[0]["logo"];
 $hospital = $results2[0]["hospital"];
 $street = $results2[0]["street"];
 $area = $results2[0]["area"];
 $town = $results2[0]["town"];
 $province = $results2[0]["province"];
 $postal_code = $results2[0]["postal_code"];
 $phone_no = $results2[0]["phone_no"];
 $PreFixCode = $results2[0]["PreFixCode"];
 $status = $results2[0]["status"];
$createdby =  $results2[0]["createdby"];
$createddatetime =  $results2[0]["createddatetime"];
$modifiedby =  $results2[0]["modifiedby"];
$modifieddatetime =  $results2[0]["modifieddatetime"];
$BillingGST =  $results2[0]["BillingGST"];
$pharmacyGST =  $results2[0]["pharmacyGST"];
$hospaddress = '';
if( $street != '')
{
	$hospaddress .= $street;
}
if( $area != '')
{
	$hospaddress .= ', '.$area;
}
if( $town != '')
{
	$hospaddress .= ', '.$town;
}
if( $province != '')
{
	$hospaddress .= ', '.$province;
}
if( $country != '')
{
	$hospaddress .= ', '.$country;
}
if( $postal_code != '')
{
	$hospaddress .= ', '.$postal_code . '.';
	}
$hospphone_no = '';
if( $phone_no != '')
{
	$hospphone_no .= '		<tr>
			<td  style="width:50px;"></td>
			<td align="center">Ph: '.$phone_no.' .</td>
			<td  style="width:50px;"></td>
		</tr>';
}
$heeddeer = '<font size="4" style="font-weight: bold;">
<table width="100%">
	 <tbody>
		<tr>
			<td  style="width:50px;"></td>
			<td><h2 align="center">'.$hospital.'</h2></td>
			<td  style="width:50px;"></td>
		</tr>
		<tr>
			<td  style="width:50px;"></td>
			<td align="center">'.$hospaddress.'</td>
			<td  style="width:50px;"></td>
		</tr>
		'.$hospphone_no.'
	</tbody>
</table>
';
echo $heeddeer;
}
 ?>
<table width="100%">
	 <tbody>
		<tr>
<td></td>
<td>
<?php
		if($Page->ReportHeader->CurrentValue=="Yes")
		{
			echo '<h5 align="center"><u>PATIENT BILL OF SUPPLY</u></h5>';
		}else{
			echo '<h2 align="center">PATIENT BILL OF SUPPLY</h2>';
		}
?>
</td>
<td  style="float: right;"><?php echo $HospGST; ?></td>
</tr>
	</tbody>
</table>
<font size="4" style="font-weight: bold;">
<table width="100%">
	 <tbody>
		<tr><td  style="float:left;">Patient Id: <?php echo $PatientID; ?> </td><td  style="float: right;">Bill No: <?php echo $BillNumber; ?></td></tr>
		<tr><td  style="float:left;">Patient Name: <?php echo $PatientName; ?></td><td  style="float: right;">Bill Date:<?php echo date("d-m-Y", strtotime($Page->createddatetime->CurrentValue)); ?></td></tr>
		<tr><td  style="float:left;"> Age: <?php echo $Age; ?> </td><td  style="float: right;">Consultant: <?php echo $Doctor; ?></td></tr>
		<tr><td  style="float:left;width:50%;">Gender: <?php echo $gender; ?> </td><td  style="float: right;"><img src='<?php echo $aa; ?>' alt style="border: 0;"></td></tr>
		<tr><td  style="float:left;width:50%;">Address: <?php echo $address; ?> </td><td  style="float: right;"></td></tr>
	</tbody>
</table>
	</font>
<?php
$GRTotal = 0;
$dbhelper = &DbHelper();
$sqlA = "SELECT Service_Department FROM ganeshkumar_bjhims.patient_services where Reception='".$invoiceId."' group by Service_Department;";
$rsA = $dbhelper->LoadRecordset($sqlA);
while (!$rsA->EOF) {
	$rowA = &$rsA->fields;
 $hhh = '<font size="4" > <b>'.$rowA["Service_Department"].'</b>
<table class="table table-striped ew-table ew-export-table" width="100%">
<tr>
<td align="center" style="width:50%"><b>Description</b></td>
<td align="center"><b>Unit Price</b></td>
<td align="center"><b>Quantity</b></td>
<td align="center"><b align="right">Price</b></td>
</tr>';
			$invoiceId = $Page->id->CurrentValue;
						 $patient_id = $Page->PatientId->CurrentValue;
					 $Reception = $Page->Reception->CurrentValue;
$fromdt = date('Y-m-d', strtotime('-1 months'));
$todate = date('Y-m-d', strtotime('+2 months'));
$Drid = $_GET['Drid'];
$SSTotal = 0;
$sql = "SELECT * FROM ganeshkumar_bjhims.patient_services where Reception='".$invoiceId."' and  Service_Department='".$rowA["Service_Department"]."';";
$rs = $dbhelper->LoadRecordset($sql);
while (!$rs->EOF) {
	$row = &$rs->fields;
				$Services =  $row["Services"];
				$ItemCode =  $row["ItemCode"];
				$Qty = $row["Quantity"];
				$Rate =  $row["amount"];
				$SubTotal =  $row["SubTotal"];

				//$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td>'.$Qty.'</td><td>'.$Rate.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
			//	$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td align="right">'.$SubTotal.'</td></tr>  ';

$hhh .= '<tr><td>'.$Services.'</td><td align="right">'.$Rate.'</td><td align="center">'.$Qty.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
$SSTotal = $SSTotal + $SubTotal;
	$rs->MoveNext();
}
$hhh .= '<tr><td></td><td></td><td align="right">Sub Total</td><td align="right">'.number_format($SSTotal,2).'</td></tr>  ';
$hhh .= '</table> </font><br>';
	  echo $hhh;
	  $GRTotal = $GRTotal + $SSTotal;
	  	$rsA->MoveNext();
}

//==============================
//$GRTotal = 0;

$dbhelper = &DbHelper();
$sqlA = "SELECT BRCODE,BRNAME FROM ganeshkumar_bjhims.pharmacy_pharled where Reception='".$invoiceId."' group by BRCODE,BRNAME;";
$rsA = $dbhelper->LoadRecordset($sqlA);
while (!$rsA->EOF) {
	$rowA = &$rsA->fields;
 $hhh = '<font size="4" > <b>'.$rowA["BRNAME"].'</b>
<table class="table table-striped ew-table ew-export-table" width="100%">
<tr>
<td align="center" style="width:50%"><b>Description</b></td>
<td align="center"><b>Mfg</b></td>
<td align="center"><b>Exp</b></td>
<td align="center"><b>Batch</b></td>
<td align="center"><b>Unit Price</b></td>
<td align="center"><b>Quantity</b></td>
<td align="center"><b align="right">Price</b></td>
</tr>';
			$invoiceId = $Page->id->CurrentValue;
						 $patient_id = $Page->PatientId->CurrentValue;
					 $Reception = $Page->Reception->CurrentValue;
$fromdt = date('Y-m-d', strtotime('-1 months'));
$todate = date('Y-m-d', strtotime('+2 months'));
$Drid = $_GET['Drid'];
$SSTotal = 0;
$sql = "SELECT * FROM ganeshkumar_bjhims.pharmacy_pharled where Reception='".$invoiceId."' and  BRCODE='".$rowA["BRCODE"]."';";
$rs = $dbhelper->LoadRecordset($sql);
while (!$rs->EOF) {
	$row = &$rs->fields;
				$Services =  $row["Product"];
				$ItemCode =  $row["PRC"];
				$Mfg =  $row["Mfg"];

				//$EXPDT =  $row["EXPDT"];
				$EXPDT =  date("d-m-Y", strtotime($row["EXPDT"]));
				$BATCHNO =  $row["BATCHNO"];
				$Qty = number_format($row["IQ"]);
				$Rate =  $row["RT"];
				$SubTotal =  $row["DAMT"];

				//$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td>'.$Qty.'</td><td>'.$Rate.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
			//	$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td align="right">'.$SubTotal.'</td></tr>  ';

$hhh .= '<tr><td>'.$Services.'</td><td>'.$Mfg.'</td><td>'.$EXPDT.'</td><td>'.$BATCHNO.'</td><td align="right">'.$Rate.'</td><td align="center">'.$Qty.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
$SSTotal = $SSTotal + $SubTotal;
	$rs->MoveNext();
}
$hhh .= '<tr><td></td><td></td><td></td><td></td><td></td><td align="right">Sub Total</td><td align="right">'.number_format($SSTotal,2).'</td></tr>  ';
$hhh .= '</table> </font><br>';
	  echo $hhh;
	  $GRTotal = $GRTotal + $SSTotal;
	  	$rsA->MoveNext();
}
 $hhh = '<font size="4" > <b>Advance</b>
<table class="table table-striped ew-table ew-export-table" width="100%">
<tr>
<td align="center" style="width:50%"><b>Advance No</b></td>
<td align="center"><b>Date </b></td>
<td align="center"><b>Mode Of Payment</b></td>
<td align="center"><b align="right">Amount</b></td>
</tr>';
			$invoiceId = $Page->id->CurrentValue;
						 $patient_id = $Page->PatientId->CurrentValue;
					 $Reception = $Page->Reception->CurrentValue;
$fromdt = date('Y-m-d', strtotime('-1 months'));
$todate = date('Y-m-d', strtotime('+2 months'));
$Drid = $_GET['Drid'];
$SASTotal = 0;
$sql = "SELECT * FROM ganeshkumar_bjhims.billing_other_voucher where Reception='".$invoiceId."' ;";
$rs = $dbhelper->LoadRecordset($sql);
while (!$rs->EOF) {
	$row = &$rs->fields;
				$Services =  $row["AdvanceNo"];
				$ItemCode =  date("d-m-Y", strtotime( $row["Date"]));
				$Qty = 1; //$row["Services"];
				$Rate =  $row["ModeofPayment"];
				$SubTotal =  $row["Amount"];

				//$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td>'.$Qty.'</td><td>'.$Rate.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
			//	$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td align="right">'.$SubTotal.'</td></tr>  ';

				$hhh .= '<tr><td>'.$Services.'</td><td align="right">'.$ItemCode.'</td><td align="center">'.$Rate.'</td><td align="right">'.number_format($row["Amount"],2).'</td></tr>  ';
$SASTotal = $SASTotal + $SubTotal;
	$rs->MoveNext();
}
$hhh .= '<tr><td></td><td></td><td align="right">Sub Total</td><td align="right">'.number_format($SASTotal,2).'</td></tr>  ';
$hhh .= '</table> </font><br>';
	  echo $hhh;
 $hhh = '<font size="4" > <b>Refund</b>
<table class="table table-striped ew-table ew-export-table" width="100%">
<tr>
<td align="center" style="width:50%"><b>Refund No</b></td>
<td align="center"><b>Date </b></td>
<td align="center"><b>Mode Of Payment</b></td>
<td align="center"><b align="right">Amount</b></td>
</tr>';
			$invoiceId = $Page->id->CurrentValue;
						 $patient_id = $Page->PatientId->CurrentValue;
					 $Reception = $Page->Reception->CurrentValue;
$fromdt = date('Y-m-d', strtotime('-1 months'));
$todate = date('Y-m-d', strtotime('+2 months'));
$Drid = $_GET['Drid'];
$SrSTotal = 0;
$sql = "SELECT * FROM ganeshkumar_bjhims.billing_refund_voucher where Reception='".$invoiceId."' ;";
$rs = $dbhelper->LoadRecordset($sql);
while (!$rs->EOF) {
	$row = &$rs->fields;
				$Services =  $row["AdvanceNo"];
				$ItemCode =  date("d-m-Y", strtotime( $row["Date"]));
				$Qty = 1; //$row["Services"];
				$Rate =  $row["ModeofPayment"];
				$SubTotal =  number_format($row["Amount"],2);

				//$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td>'.$Qty.'</td><td>'.$Rate.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
			//	$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td align="right">'.$SubTotal.'</td></tr>  ';

				$hhh .= '<tr><td>'.$Services.'</td><td align="right">'.$ItemCode.'</td><td align="center">'.$Rate.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
$SrSTotal = $SrSTotal + $SubTotal;
	$rs->MoveNext();
}
$hhh .= '<tr><td></td><td></td><td align="right">Sub Total</td><td align="right">'.number_format($SrSTotal,2).'</td></tr>  ';
$hhh .= '</table> </font><br>';
if($SSTotal != '')
{
	  echo $hhh;
}
 $hhh = '<font size="4" > 
<table class="table table-striped ew-table ew-export-table" width="100%">
<tr>
<td align="left" style="width:50%"><b>Total Bill Amount</b></td>
<td align="right"><b align="right">'.number_format($GRTotal,2).'</b></td>
</tr>';
 $hhh .= '
<tr>
<td align="left" style="width:50%"><b>Total Advance Amount</b></td>
<td align="right"><b align="right">'.number_format($SASTotal,2).'</b></td>
</tr>';
if($SSTotal != '')
{
 $hhh .= '
<tr>
<td align="left" style="width:50%"><b>Total Refund Amount</b></td>
<td align="right"><b align="right">'.number_format($SrSTotal,2).'</b></td>
</tr>';
	   $BALTotal = ($GRTotal - $SASTotal)+$SrSTotal;
	$hhh .= '<tr><td align="left">(Total Bill Amount - Total Advance Amount) + Total Refund Amount </td><td align="right">'.number_format($BALTotal,2).'</td></tr>  ';
}else
{
 $BALTotal = $GRTotal - $SASTotal;
$hhh .= '<tr><td align="left">Total Bill Amount - Total Advance Amount </td><td align="right">'.number_format($BALTotal,2).'</td></tr>  ';
}
$hhh .= '</table> </font><br>';
 echo $hhh;
 if($BALTotal > 100)
 {
 	echo '</br><b>Balance amount to be paid : '.$BALTotal.' <b></br>';
 	$AccountClosingType = 'Paid';
 }
 if($BALTotal < 0)
 {
 	echo '</br><b>Balance amount to be Refund : '.$BALTotal.' <b></br>';
 	$AccountClosingType = 'Refund';
 }
 if($BALTotal >= 0 && $BALTotal <= 100)
 {
	 echo '</br><b>Bill Tallied <b> </br>';
 }
	  $tt = "ewbarcode.php?data=".$Page->BillNumber->CurrentValue."&encode=QRCODE&height=60&color=%23000000";
	  echo '<b>Grand Total :   '. number_format($GRTotal,2).' </b></br>';
	  echo '<b>Grand Total in words  :   '. convertToIndianCurrency($GRTotal).' </b></br>';
?>
<br><br>
<table class="ew-table">
	 <tbody>
		<tr><td>{{include tmpl="#tpc_view_ip_billing_release_date"/}}&nbsp;{{include tmpl="#tpx_view_ip_billing_release_date"/}}</td><td>{{include tmpl="#tpc_view_ip_billing_BillClosing"/}}&nbsp;{{include tmpl="#tpx_view_ip_billing_BillClosing"/}}</td><td>{{include tmpl="#tpc_view_ip_billing_BillClosingDate"/}}&nbsp;{{include tmpl="#tpx_view_ip_billing_BillClosingDate"/}}</td></tr>
		<tr><td>{{include tmpl="#tpc_view_ip_billing_BillAmount"/}}&nbsp;{{include tmpl="#tpx_view_ip_billing_BillAmount"/}}</td><td>{{include tmpl="#tpc_view_ip_billing_ClosingAmount"/}}&nbsp;{{include tmpl="#tpx_view_ip_billing_ClosingAmount"/}}</td><td>{{include tmpl="#tpc_view_ip_billing_ClosingType"/}}&nbsp;{{include tmpl="#tpx_view_ip_billing_ClosingType"/}}</td></tr>
		<tr><td>{{include tmpl="#tpc_view_ip_billing_BillNumber"/}}&nbsp;{{include tmpl="#tpx_view_ip_billing_BillNumber"/}}</td><td>{{include tmpl="#tpc_view_ip_billing_ReportHeader"/}}&nbsp;{{include tmpl="#tpx_view_ip_billing_ReportHeader"/}}</td><td></td></tr>
	</tbody>
</table>
<br>
<font size="4" >
<img src='<?php echo $tt; ?>' alt style="border: 0;">
<p align="right">Signature<p>
	  </font>
</div>
</script>
<?php if (!$view_ip_billing_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $view_ip_billing_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $view_ip_billing_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($view_ip_billing->Rows) ?> };
ew.applyTemplate("tpd_view_ip_billingedit", "tpm_view_ip_billingedit", "view_ip_billingedit", "<?php echo $view_ip_billing->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.view_ip_billingedit_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$view_ip_billing_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

document.getElementById('x_BillNumber').readOnly = true;
document.getElementById('x_ClosingAmount').value = '<?php echo number_format($BALTotal,2); ?>';
document.getElementById('x_ClosingType').value = '<?php echo $AccountClosingType; ?>';
document.getElementById('x_ClosingAmount').readOnly = true;
document.getElementById('x_ClosingType').readOnly = true;
document.getElementById('x_BillAmount').readOnly = true;
document.getElementById('x_BillAmount').value = '<?php echo number_format($GRTotal,2); ?>';
</script>
<?php include_once "footer.php" ?>
<?php
$view_ip_billing_edit->terminate();
?>