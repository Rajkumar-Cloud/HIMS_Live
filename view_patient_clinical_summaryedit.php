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
$view_patient_clinical_summary_edit = new view_patient_clinical_summary_edit();

// Run the page
$view_patient_clinical_summary_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_patient_clinical_summary_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fview_patient_clinical_summaryedit = currentForm = new ew.Form("fview_patient_clinical_summaryedit", "edit");

// Validate form
fview_patient_clinical_summaryedit.validate = function() {
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
		<?php if ($view_patient_clinical_summary_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_clinical_summary->id->caption(), $view_patient_clinical_summary->id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_clinical_summary->id->errorMessage()) ?>");
		<?php if ($view_patient_clinical_summary_edit->PatientID->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_clinical_summary->PatientID->caption(), $view_patient_clinical_summary->PatientID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_clinical_summary_edit->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_clinical_summary->HospID->caption(), $view_patient_clinical_summary->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_clinical_summary_edit->mrnNo->Required) { ?>
			elm = this.getElements("x" + infix + "_mrnNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_clinical_summary->mrnNo->caption(), $view_patient_clinical_summary->mrnNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_clinical_summary_edit->patient_id->Required) { ?>
			elm = this.getElements("x" + infix + "_patient_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_clinical_summary->patient_id->caption(), $view_patient_clinical_summary->patient_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_patient_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_clinical_summary->patient_id->errorMessage()) ?>");
		<?php if ($view_patient_clinical_summary_edit->patient_name->Required) { ?>
			elm = this.getElements("x" + infix + "_patient_name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_clinical_summary->patient_name->caption(), $view_patient_clinical_summary->patient_name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_clinical_summary_edit->profilePic->Required) { ?>
			elm = this.getElements("x" + infix + "_profilePic");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_clinical_summary->profilePic->caption(), $view_patient_clinical_summary->profilePic->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_clinical_summary_edit->gender->Required) { ?>
			elm = this.getElements("x" + infix + "_gender");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_clinical_summary->gender->caption(), $view_patient_clinical_summary->gender->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_clinical_summary_edit->age->Required) { ?>
			elm = this.getElements("x" + infix + "_age");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_clinical_summary->age->caption(), $view_patient_clinical_summary->age->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_clinical_summary_edit->physician_id->Required) { ?>
			elm = this.getElements("x" + infix + "_physician_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_clinical_summary->physician_id->caption(), $view_patient_clinical_summary->physician_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_physician_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_clinical_summary->physician_id->errorMessage()) ?>");
		<?php if ($view_patient_clinical_summary_edit->typeRegsisteration->Required) { ?>
			elm = this.getElements("x" + infix + "_typeRegsisteration");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_clinical_summary->typeRegsisteration->caption(), $view_patient_clinical_summary->typeRegsisteration->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_clinical_summary_edit->PaymentCategory->Required) { ?>
			elm = this.getElements("x" + infix + "_PaymentCategory");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_clinical_summary->PaymentCategory->caption(), $view_patient_clinical_summary->PaymentCategory->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_clinical_summary_edit->admission_consultant_id->Required) { ?>
			elm = this.getElements("x" + infix + "_admission_consultant_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_clinical_summary->admission_consultant_id->caption(), $view_patient_clinical_summary->admission_consultant_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_admission_consultant_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_clinical_summary->admission_consultant_id->errorMessage()) ?>");
		<?php if ($view_patient_clinical_summary_edit->leading_consultant_id->Required) { ?>
			elm = this.getElements("x" + infix + "_leading_consultant_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_clinical_summary->leading_consultant_id->caption(), $view_patient_clinical_summary->leading_consultant_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_leading_consultant_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_clinical_summary->leading_consultant_id->errorMessage()) ?>");
		<?php if ($view_patient_clinical_summary_edit->cause->Required) { ?>
			elm = this.getElements("x" + infix + "_cause");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_clinical_summary->cause->caption(), $view_patient_clinical_summary->cause->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_clinical_summary_edit->admission_date->Required) { ?>
			elm = this.getElements("x" + infix + "_admission_date");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_clinical_summary->admission_date->caption(), $view_patient_clinical_summary->admission_date->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_admission_date");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_clinical_summary->admission_date->errorMessage()) ?>");
		<?php if ($view_patient_clinical_summary_edit->release_date->Required) { ?>
			elm = this.getElements("x" + infix + "_release_date");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_clinical_summary->release_date->caption(), $view_patient_clinical_summary->release_date->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_release_date");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_clinical_summary->release_date->errorMessage()) ?>");
		<?php if ($view_patient_clinical_summary_edit->PaymentStatus->Required) { ?>
			elm = this.getElements("x" + infix + "_PaymentStatus");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_clinical_summary->PaymentStatus->caption(), $view_patient_clinical_summary->PaymentStatus->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PaymentStatus");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_clinical_summary->PaymentStatus->errorMessage()) ?>");
		<?php if ($view_patient_clinical_summary_edit->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_clinical_summary->status->caption(), $view_patient_clinical_summary->status->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_clinical_summary->status->errorMessage()) ?>");
		<?php if ($view_patient_clinical_summary_edit->createdby->Required) { ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_clinical_summary->createdby->caption(), $view_patient_clinical_summary->createdby->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_clinical_summary->createdby->errorMessage()) ?>");
		<?php if ($view_patient_clinical_summary_edit->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_clinical_summary->createddatetime->caption(), $view_patient_clinical_summary->createddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_clinical_summary->createddatetime->errorMessage()) ?>");
		<?php if ($view_patient_clinical_summary_edit->modifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_clinical_summary->modifiedby->caption(), $view_patient_clinical_summary->modifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_clinical_summary->modifiedby->errorMessage()) ?>");
		<?php if ($view_patient_clinical_summary_edit->modifieddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_clinical_summary->modifieddatetime->caption(), $view_patient_clinical_summary->modifieddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_clinical_summary->modifieddatetime->errorMessage()) ?>");
		<?php if ($view_patient_clinical_summary_edit->provisional_diagnosis->Required) { ?>
			elm = this.getElements("x" + infix + "_provisional_diagnosis");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_clinical_summary->provisional_diagnosis->caption(), $view_patient_clinical_summary->provisional_diagnosis->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_clinical_summary_edit->Treatments->Required) { ?>
			elm = this.getElements("x" + infix + "_Treatments");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_clinical_summary->Treatments->caption(), $view_patient_clinical_summary->Treatments->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_clinical_summary_edit->FinalDiagnosis->Required) { ?>
			elm = this.getElements("x" + infix + "_FinalDiagnosis");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_clinical_summary->FinalDiagnosis->caption(), $view_patient_clinical_summary->FinalDiagnosis->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_clinical_summary_edit->courseinhospital->Required) { ?>
			elm = this.getElements("x" + infix + "_courseinhospital");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_clinical_summary->courseinhospital->caption(), $view_patient_clinical_summary->courseinhospital->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_clinical_summary_edit->procedurenotes->Required) { ?>
			elm = this.getElements("x" + infix + "_procedurenotes");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_clinical_summary->procedurenotes->caption(), $view_patient_clinical_summary->procedurenotes->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_clinical_summary_edit->conditionatdischarge->Required) { ?>
			elm = this.getElements("x" + infix + "_conditionatdischarge");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_clinical_summary->conditionatdischarge->caption(), $view_patient_clinical_summary->conditionatdischarge->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_clinical_summary_edit->BP->Required) { ?>
			elm = this.getElements("x" + infix + "_BP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_clinical_summary->BP->caption(), $view_patient_clinical_summary->BP->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_clinical_summary_edit->Pulse->Required) { ?>
			elm = this.getElements("x" + infix + "_Pulse");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_clinical_summary->Pulse->caption(), $view_patient_clinical_summary->Pulse->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_clinical_summary_edit->Resp->Required) { ?>
			elm = this.getElements("x" + infix + "_Resp");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_clinical_summary->Resp->caption(), $view_patient_clinical_summary->Resp->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_clinical_summary_edit->SPO2->Required) { ?>
			elm = this.getElements("x" + infix + "_SPO2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_clinical_summary->SPO2->caption(), $view_patient_clinical_summary->SPO2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_clinical_summary_edit->FollowupAdvice->Required) { ?>
			elm = this.getElements("x" + infix + "_FollowupAdvice");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_clinical_summary->FollowupAdvice->caption(), $view_patient_clinical_summary->FollowupAdvice->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_clinical_summary_edit->NextReviewDate->Required) { ?>
			elm = this.getElements("x" + infix + "_NextReviewDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_clinical_summary->NextReviewDate->caption(), $view_patient_clinical_summary->NextReviewDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_NextReviewDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_patient_clinical_summary->NextReviewDate->errorMessage()) ?>");
		<?php if ($view_patient_clinical_summary_edit->History->Required) { ?>
			elm = this.getElements("x" + infix + "_History");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_clinical_summary->History->caption(), $view_patient_clinical_summary->History->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_patient_clinical_summary_edit->vitals->Required) { ?>
			elm = this.getElements("x" + infix + "_vitals");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_patient_clinical_summary->vitals->caption(), $view_patient_clinical_summary->vitals->RequiredErrorMessage)) ?>");
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
fview_patient_clinical_summaryedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_patient_clinical_summaryedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $view_patient_clinical_summary_edit->showPageHeader(); ?>
<?php
$view_patient_clinical_summary_edit->showMessage();
?>
<form name="fview_patient_clinical_summaryedit" id="fview_patient_clinical_summaryedit" class="<?php echo $view_patient_clinical_summary_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_patient_clinical_summary_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_patient_clinical_summary_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_patient_clinical_summary">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$view_patient_clinical_summary_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($view_patient_clinical_summary->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_view_patient_clinical_summary_id" for="x_id" class="<?php echo $view_patient_clinical_summary_edit->LeftColumnClass ?>"><?php echo $view_patient_clinical_summary->id->caption() ?><?php echo ($view_patient_clinical_summary->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_clinical_summary_edit->RightColumnClass ?>"><div<?php echo $view_patient_clinical_summary->id->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_id">
<span<?php echo $view_patient_clinical_summary->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_patient_clinical_summary->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_patient_clinical_summary" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($view_patient_clinical_summary->id->CurrentValue) ?>">
<?php echo $view_patient_clinical_summary->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_clinical_summary->PatientID->Visible) { // PatientID ?>
	<div id="r_PatientID" class="form-group row">
		<label id="elh_view_patient_clinical_summary_PatientID" for="x_PatientID" class="<?php echo $view_patient_clinical_summary_edit->LeftColumnClass ?>"><?php echo $view_patient_clinical_summary->PatientID->caption() ?><?php echo ($view_patient_clinical_summary->PatientID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_clinical_summary_edit->RightColumnClass ?>"><div<?php echo $view_patient_clinical_summary->PatientID->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_PatientID">
<input type="text" data-table="view_patient_clinical_summary" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_clinical_summary->PatientID->getPlaceHolder()) ?>" value="<?php echo $view_patient_clinical_summary->PatientID->EditValue ?>"<?php echo $view_patient_clinical_summary->PatientID->editAttributes() ?>>
</span>
<?php echo $view_patient_clinical_summary->PatientID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_clinical_summary->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label id="elh_view_patient_clinical_summary_HospID" for="x_HospID" class="<?php echo $view_patient_clinical_summary_edit->LeftColumnClass ?>"><?php echo $view_patient_clinical_summary->HospID->caption() ?><?php echo ($view_patient_clinical_summary->HospID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_clinical_summary_edit->RightColumnClass ?>"><div<?php echo $view_patient_clinical_summary->HospID->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_HospID">
<input type="text" data-table="view_patient_clinical_summary" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_clinical_summary->HospID->getPlaceHolder()) ?>" value="<?php echo $view_patient_clinical_summary->HospID->EditValue ?>"<?php echo $view_patient_clinical_summary->HospID->editAttributes() ?>>
</span>
<?php echo $view_patient_clinical_summary->HospID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_clinical_summary->mrnNo->Visible) { // mrnNo ?>
	<div id="r_mrnNo" class="form-group row">
		<label id="elh_view_patient_clinical_summary_mrnNo" for="x_mrnNo" class="<?php echo $view_patient_clinical_summary_edit->LeftColumnClass ?>"><?php echo $view_patient_clinical_summary->mrnNo->caption() ?><?php echo ($view_patient_clinical_summary->mrnNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_clinical_summary_edit->RightColumnClass ?>"><div<?php echo $view_patient_clinical_summary->mrnNo->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_mrnNo">
<input type="text" data-table="view_patient_clinical_summary" data-field="x_mrnNo" name="x_mrnNo" id="x_mrnNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_clinical_summary->mrnNo->getPlaceHolder()) ?>" value="<?php echo $view_patient_clinical_summary->mrnNo->EditValue ?>"<?php echo $view_patient_clinical_summary->mrnNo->editAttributes() ?>>
</span>
<?php echo $view_patient_clinical_summary->mrnNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_clinical_summary->patient_id->Visible) { // patient_id ?>
	<div id="r_patient_id" class="form-group row">
		<label id="elh_view_patient_clinical_summary_patient_id" for="x_patient_id" class="<?php echo $view_patient_clinical_summary_edit->LeftColumnClass ?>"><?php echo $view_patient_clinical_summary->patient_id->caption() ?><?php echo ($view_patient_clinical_summary->patient_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_clinical_summary_edit->RightColumnClass ?>"><div<?php echo $view_patient_clinical_summary->patient_id->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_patient_id">
<input type="text" data-table="view_patient_clinical_summary" data-field="x_patient_id" name="x_patient_id" id="x_patient_id" size="30" placeholder="<?php echo HtmlEncode($view_patient_clinical_summary->patient_id->getPlaceHolder()) ?>" value="<?php echo $view_patient_clinical_summary->patient_id->EditValue ?>"<?php echo $view_patient_clinical_summary->patient_id->editAttributes() ?>>
</span>
<?php echo $view_patient_clinical_summary->patient_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_clinical_summary->patient_name->Visible) { // patient_name ?>
	<div id="r_patient_name" class="form-group row">
		<label id="elh_view_patient_clinical_summary_patient_name" for="x_patient_name" class="<?php echo $view_patient_clinical_summary_edit->LeftColumnClass ?>"><?php echo $view_patient_clinical_summary->patient_name->caption() ?><?php echo ($view_patient_clinical_summary->patient_name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_clinical_summary_edit->RightColumnClass ?>"><div<?php echo $view_patient_clinical_summary->patient_name->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_patient_name">
<input type="text" data-table="view_patient_clinical_summary" data-field="x_patient_name" name="x_patient_name" id="x_patient_name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_clinical_summary->patient_name->getPlaceHolder()) ?>" value="<?php echo $view_patient_clinical_summary->patient_name->EditValue ?>"<?php echo $view_patient_clinical_summary->patient_name->editAttributes() ?>>
</span>
<?php echo $view_patient_clinical_summary->patient_name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_clinical_summary->profilePic->Visible) { // profilePic ?>
	<div id="r_profilePic" class="form-group row">
		<label id="elh_view_patient_clinical_summary_profilePic" for="x_profilePic" class="<?php echo $view_patient_clinical_summary_edit->LeftColumnClass ?>"><?php echo $view_patient_clinical_summary->profilePic->caption() ?><?php echo ($view_patient_clinical_summary->profilePic->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_clinical_summary_edit->RightColumnClass ?>"><div<?php echo $view_patient_clinical_summary->profilePic->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_profilePic">
<textarea data-table="view_patient_clinical_summary" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_patient_clinical_summary->profilePic->getPlaceHolder()) ?>"<?php echo $view_patient_clinical_summary->profilePic->editAttributes() ?>><?php echo $view_patient_clinical_summary->profilePic->EditValue ?></textarea>
</span>
<?php echo $view_patient_clinical_summary->profilePic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_clinical_summary->gender->Visible) { // gender ?>
	<div id="r_gender" class="form-group row">
		<label id="elh_view_patient_clinical_summary_gender" for="x_gender" class="<?php echo $view_patient_clinical_summary_edit->LeftColumnClass ?>"><?php echo $view_patient_clinical_summary->gender->caption() ?><?php echo ($view_patient_clinical_summary->gender->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_clinical_summary_edit->RightColumnClass ?>"><div<?php echo $view_patient_clinical_summary->gender->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_gender">
<input type="text" data-table="view_patient_clinical_summary" data-field="x_gender" name="x_gender" id="x_gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_clinical_summary->gender->getPlaceHolder()) ?>" value="<?php echo $view_patient_clinical_summary->gender->EditValue ?>"<?php echo $view_patient_clinical_summary->gender->editAttributes() ?>>
</span>
<?php echo $view_patient_clinical_summary->gender->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_clinical_summary->age->Visible) { // age ?>
	<div id="r_age" class="form-group row">
		<label id="elh_view_patient_clinical_summary_age" for="x_age" class="<?php echo $view_patient_clinical_summary_edit->LeftColumnClass ?>"><?php echo $view_patient_clinical_summary->age->caption() ?><?php echo ($view_patient_clinical_summary->age->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_clinical_summary_edit->RightColumnClass ?>"><div<?php echo $view_patient_clinical_summary->age->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_age">
<input type="text" data-table="view_patient_clinical_summary" data-field="x_age" name="x_age" id="x_age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_clinical_summary->age->getPlaceHolder()) ?>" value="<?php echo $view_patient_clinical_summary->age->EditValue ?>"<?php echo $view_patient_clinical_summary->age->editAttributes() ?>>
</span>
<?php echo $view_patient_clinical_summary->age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_clinical_summary->physician_id->Visible) { // physician_id ?>
	<div id="r_physician_id" class="form-group row">
		<label id="elh_view_patient_clinical_summary_physician_id" for="x_physician_id" class="<?php echo $view_patient_clinical_summary_edit->LeftColumnClass ?>"><?php echo $view_patient_clinical_summary->physician_id->caption() ?><?php echo ($view_patient_clinical_summary->physician_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_clinical_summary_edit->RightColumnClass ?>"><div<?php echo $view_patient_clinical_summary->physician_id->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_physician_id">
<input type="text" data-table="view_patient_clinical_summary" data-field="x_physician_id" name="x_physician_id" id="x_physician_id" size="30" placeholder="<?php echo HtmlEncode($view_patient_clinical_summary->physician_id->getPlaceHolder()) ?>" value="<?php echo $view_patient_clinical_summary->physician_id->EditValue ?>"<?php echo $view_patient_clinical_summary->physician_id->editAttributes() ?>>
</span>
<?php echo $view_patient_clinical_summary->physician_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_clinical_summary->typeRegsisteration->Visible) { // typeRegsisteration ?>
	<div id="r_typeRegsisteration" class="form-group row">
		<label id="elh_view_patient_clinical_summary_typeRegsisteration" for="x_typeRegsisteration" class="<?php echo $view_patient_clinical_summary_edit->LeftColumnClass ?>"><?php echo $view_patient_clinical_summary->typeRegsisteration->caption() ?><?php echo ($view_patient_clinical_summary->typeRegsisteration->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_clinical_summary_edit->RightColumnClass ?>"><div<?php echo $view_patient_clinical_summary->typeRegsisteration->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_typeRegsisteration">
<input type="text" data-table="view_patient_clinical_summary" data-field="x_typeRegsisteration" name="x_typeRegsisteration" id="x_typeRegsisteration" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_clinical_summary->typeRegsisteration->getPlaceHolder()) ?>" value="<?php echo $view_patient_clinical_summary->typeRegsisteration->EditValue ?>"<?php echo $view_patient_clinical_summary->typeRegsisteration->editAttributes() ?>>
</span>
<?php echo $view_patient_clinical_summary->typeRegsisteration->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_clinical_summary->PaymentCategory->Visible) { // PaymentCategory ?>
	<div id="r_PaymentCategory" class="form-group row">
		<label id="elh_view_patient_clinical_summary_PaymentCategory" for="x_PaymentCategory" class="<?php echo $view_patient_clinical_summary_edit->LeftColumnClass ?>"><?php echo $view_patient_clinical_summary->PaymentCategory->caption() ?><?php echo ($view_patient_clinical_summary->PaymentCategory->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_clinical_summary_edit->RightColumnClass ?>"><div<?php echo $view_patient_clinical_summary->PaymentCategory->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_PaymentCategory">
<input type="text" data-table="view_patient_clinical_summary" data-field="x_PaymentCategory" name="x_PaymentCategory" id="x_PaymentCategory" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_clinical_summary->PaymentCategory->getPlaceHolder()) ?>" value="<?php echo $view_patient_clinical_summary->PaymentCategory->EditValue ?>"<?php echo $view_patient_clinical_summary->PaymentCategory->editAttributes() ?>>
</span>
<?php echo $view_patient_clinical_summary->PaymentCategory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_clinical_summary->admission_consultant_id->Visible) { // admission_consultant_id ?>
	<div id="r_admission_consultant_id" class="form-group row">
		<label id="elh_view_patient_clinical_summary_admission_consultant_id" for="x_admission_consultant_id" class="<?php echo $view_patient_clinical_summary_edit->LeftColumnClass ?>"><?php echo $view_patient_clinical_summary->admission_consultant_id->caption() ?><?php echo ($view_patient_clinical_summary->admission_consultant_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_clinical_summary_edit->RightColumnClass ?>"><div<?php echo $view_patient_clinical_summary->admission_consultant_id->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_admission_consultant_id">
<input type="text" data-table="view_patient_clinical_summary" data-field="x_admission_consultant_id" name="x_admission_consultant_id" id="x_admission_consultant_id" size="30" placeholder="<?php echo HtmlEncode($view_patient_clinical_summary->admission_consultant_id->getPlaceHolder()) ?>" value="<?php echo $view_patient_clinical_summary->admission_consultant_id->EditValue ?>"<?php echo $view_patient_clinical_summary->admission_consultant_id->editAttributes() ?>>
</span>
<?php echo $view_patient_clinical_summary->admission_consultant_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_clinical_summary->leading_consultant_id->Visible) { // leading_consultant_id ?>
	<div id="r_leading_consultant_id" class="form-group row">
		<label id="elh_view_patient_clinical_summary_leading_consultant_id" for="x_leading_consultant_id" class="<?php echo $view_patient_clinical_summary_edit->LeftColumnClass ?>"><?php echo $view_patient_clinical_summary->leading_consultant_id->caption() ?><?php echo ($view_patient_clinical_summary->leading_consultant_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_clinical_summary_edit->RightColumnClass ?>"><div<?php echo $view_patient_clinical_summary->leading_consultant_id->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_leading_consultant_id">
<input type="text" data-table="view_patient_clinical_summary" data-field="x_leading_consultant_id" name="x_leading_consultant_id" id="x_leading_consultant_id" size="30" placeholder="<?php echo HtmlEncode($view_patient_clinical_summary->leading_consultant_id->getPlaceHolder()) ?>" value="<?php echo $view_patient_clinical_summary->leading_consultant_id->EditValue ?>"<?php echo $view_patient_clinical_summary->leading_consultant_id->editAttributes() ?>>
</span>
<?php echo $view_patient_clinical_summary->leading_consultant_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_clinical_summary->cause->Visible) { // cause ?>
	<div id="r_cause" class="form-group row">
		<label id="elh_view_patient_clinical_summary_cause" for="x_cause" class="<?php echo $view_patient_clinical_summary_edit->LeftColumnClass ?>"><?php echo $view_patient_clinical_summary->cause->caption() ?><?php echo ($view_patient_clinical_summary->cause->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_clinical_summary_edit->RightColumnClass ?>"><div<?php echo $view_patient_clinical_summary->cause->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_cause">
<textarea data-table="view_patient_clinical_summary" data-field="x_cause" name="x_cause" id="x_cause" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_patient_clinical_summary->cause->getPlaceHolder()) ?>"<?php echo $view_patient_clinical_summary->cause->editAttributes() ?>><?php echo $view_patient_clinical_summary->cause->EditValue ?></textarea>
</span>
<?php echo $view_patient_clinical_summary->cause->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_clinical_summary->admission_date->Visible) { // admission_date ?>
	<div id="r_admission_date" class="form-group row">
		<label id="elh_view_patient_clinical_summary_admission_date" for="x_admission_date" class="<?php echo $view_patient_clinical_summary_edit->LeftColumnClass ?>"><?php echo $view_patient_clinical_summary->admission_date->caption() ?><?php echo ($view_patient_clinical_summary->admission_date->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_clinical_summary_edit->RightColumnClass ?>"><div<?php echo $view_patient_clinical_summary->admission_date->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_admission_date">
<input type="text" data-table="view_patient_clinical_summary" data-field="x_admission_date" name="x_admission_date" id="x_admission_date" placeholder="<?php echo HtmlEncode($view_patient_clinical_summary->admission_date->getPlaceHolder()) ?>" value="<?php echo $view_patient_clinical_summary->admission_date->EditValue ?>"<?php echo $view_patient_clinical_summary->admission_date->editAttributes() ?>>
<?php if (!$view_patient_clinical_summary->admission_date->ReadOnly && !$view_patient_clinical_summary->admission_date->Disabled && !isset($view_patient_clinical_summary->admission_date->EditAttrs["readonly"]) && !isset($view_patient_clinical_summary->admission_date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_clinical_summaryedit", "x_admission_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $view_patient_clinical_summary->admission_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_clinical_summary->release_date->Visible) { // release_date ?>
	<div id="r_release_date" class="form-group row">
		<label id="elh_view_patient_clinical_summary_release_date" for="x_release_date" class="<?php echo $view_patient_clinical_summary_edit->LeftColumnClass ?>"><?php echo $view_patient_clinical_summary->release_date->caption() ?><?php echo ($view_patient_clinical_summary->release_date->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_clinical_summary_edit->RightColumnClass ?>"><div<?php echo $view_patient_clinical_summary->release_date->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_release_date">
<input type="text" data-table="view_patient_clinical_summary" data-field="x_release_date" name="x_release_date" id="x_release_date" placeholder="<?php echo HtmlEncode($view_patient_clinical_summary->release_date->getPlaceHolder()) ?>" value="<?php echo $view_patient_clinical_summary->release_date->EditValue ?>"<?php echo $view_patient_clinical_summary->release_date->editAttributes() ?>>
<?php if (!$view_patient_clinical_summary->release_date->ReadOnly && !$view_patient_clinical_summary->release_date->Disabled && !isset($view_patient_clinical_summary->release_date->EditAttrs["readonly"]) && !isset($view_patient_clinical_summary->release_date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_clinical_summaryedit", "x_release_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $view_patient_clinical_summary->release_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_clinical_summary->PaymentStatus->Visible) { // PaymentStatus ?>
	<div id="r_PaymentStatus" class="form-group row">
		<label id="elh_view_patient_clinical_summary_PaymentStatus" for="x_PaymentStatus" class="<?php echo $view_patient_clinical_summary_edit->LeftColumnClass ?>"><?php echo $view_patient_clinical_summary->PaymentStatus->caption() ?><?php echo ($view_patient_clinical_summary->PaymentStatus->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_clinical_summary_edit->RightColumnClass ?>"><div<?php echo $view_patient_clinical_summary->PaymentStatus->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_PaymentStatus">
<input type="text" data-table="view_patient_clinical_summary" data-field="x_PaymentStatus" name="x_PaymentStatus" id="x_PaymentStatus" size="30" placeholder="<?php echo HtmlEncode($view_patient_clinical_summary->PaymentStatus->getPlaceHolder()) ?>" value="<?php echo $view_patient_clinical_summary->PaymentStatus->EditValue ?>"<?php echo $view_patient_clinical_summary->PaymentStatus->editAttributes() ?>>
</span>
<?php echo $view_patient_clinical_summary->PaymentStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_clinical_summary->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_view_patient_clinical_summary_status" for="x_status" class="<?php echo $view_patient_clinical_summary_edit->LeftColumnClass ?>"><?php echo $view_patient_clinical_summary->status->caption() ?><?php echo ($view_patient_clinical_summary->status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_clinical_summary_edit->RightColumnClass ?>"><div<?php echo $view_patient_clinical_summary->status->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_status">
<input type="text" data-table="view_patient_clinical_summary" data-field="x_status" name="x_status" id="x_status" size="30" placeholder="<?php echo HtmlEncode($view_patient_clinical_summary->status->getPlaceHolder()) ?>" value="<?php echo $view_patient_clinical_summary->status->EditValue ?>"<?php echo $view_patient_clinical_summary->status->editAttributes() ?>>
</span>
<?php echo $view_patient_clinical_summary->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_clinical_summary->createdby->Visible) { // createdby ?>
	<div id="r_createdby" class="form-group row">
		<label id="elh_view_patient_clinical_summary_createdby" for="x_createdby" class="<?php echo $view_patient_clinical_summary_edit->LeftColumnClass ?>"><?php echo $view_patient_clinical_summary->createdby->caption() ?><?php echo ($view_patient_clinical_summary->createdby->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_clinical_summary_edit->RightColumnClass ?>"><div<?php echo $view_patient_clinical_summary->createdby->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_createdby">
<input type="text" data-table="view_patient_clinical_summary" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" placeholder="<?php echo HtmlEncode($view_patient_clinical_summary->createdby->getPlaceHolder()) ?>" value="<?php echo $view_patient_clinical_summary->createdby->EditValue ?>"<?php echo $view_patient_clinical_summary->createdby->editAttributes() ?>>
</span>
<?php echo $view_patient_clinical_summary->createdby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_clinical_summary->createddatetime->Visible) { // createddatetime ?>
	<div id="r_createddatetime" class="form-group row">
		<label id="elh_view_patient_clinical_summary_createddatetime" for="x_createddatetime" class="<?php echo $view_patient_clinical_summary_edit->LeftColumnClass ?>"><?php echo $view_patient_clinical_summary->createddatetime->caption() ?><?php echo ($view_patient_clinical_summary->createddatetime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_clinical_summary_edit->RightColumnClass ?>"><div<?php echo $view_patient_clinical_summary->createddatetime->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_createddatetime">
<input type="text" data-table="view_patient_clinical_summary" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?php echo HtmlEncode($view_patient_clinical_summary->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_patient_clinical_summary->createddatetime->EditValue ?>"<?php echo $view_patient_clinical_summary->createddatetime->editAttributes() ?>>
<?php if (!$view_patient_clinical_summary->createddatetime->ReadOnly && !$view_patient_clinical_summary->createddatetime->Disabled && !isset($view_patient_clinical_summary->createddatetime->EditAttrs["readonly"]) && !isset($view_patient_clinical_summary->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_clinical_summaryedit", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $view_patient_clinical_summary->createddatetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_clinical_summary->modifiedby->Visible) { // modifiedby ?>
	<div id="r_modifiedby" class="form-group row">
		<label id="elh_view_patient_clinical_summary_modifiedby" for="x_modifiedby" class="<?php echo $view_patient_clinical_summary_edit->LeftColumnClass ?>"><?php echo $view_patient_clinical_summary->modifiedby->caption() ?><?php echo ($view_patient_clinical_summary->modifiedby->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_clinical_summary_edit->RightColumnClass ?>"><div<?php echo $view_patient_clinical_summary->modifiedby->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_modifiedby">
<input type="text" data-table="view_patient_clinical_summary" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" placeholder="<?php echo HtmlEncode($view_patient_clinical_summary->modifiedby->getPlaceHolder()) ?>" value="<?php echo $view_patient_clinical_summary->modifiedby->EditValue ?>"<?php echo $view_patient_clinical_summary->modifiedby->editAttributes() ?>>
</span>
<?php echo $view_patient_clinical_summary->modifiedby->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_clinical_summary->modifieddatetime->Visible) { // modifieddatetime ?>
	<div id="r_modifieddatetime" class="form-group row">
		<label id="elh_view_patient_clinical_summary_modifieddatetime" for="x_modifieddatetime" class="<?php echo $view_patient_clinical_summary_edit->LeftColumnClass ?>"><?php echo $view_patient_clinical_summary->modifieddatetime->caption() ?><?php echo ($view_patient_clinical_summary->modifieddatetime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_clinical_summary_edit->RightColumnClass ?>"><div<?php echo $view_patient_clinical_summary->modifieddatetime->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_modifieddatetime">
<input type="text" data-table="view_patient_clinical_summary" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?php echo HtmlEncode($view_patient_clinical_summary->modifieddatetime->getPlaceHolder()) ?>" value="<?php echo $view_patient_clinical_summary->modifieddatetime->EditValue ?>"<?php echo $view_patient_clinical_summary->modifieddatetime->editAttributes() ?>>
<?php if (!$view_patient_clinical_summary->modifieddatetime->ReadOnly && !$view_patient_clinical_summary->modifieddatetime->Disabled && !isset($view_patient_clinical_summary->modifieddatetime->EditAttrs["readonly"]) && !isset($view_patient_clinical_summary->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_clinical_summaryedit", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $view_patient_clinical_summary->modifieddatetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_clinical_summary->provisional_diagnosis->Visible) { // provisional_diagnosis ?>
	<div id="r_provisional_diagnosis" class="form-group row">
		<label id="elh_view_patient_clinical_summary_provisional_diagnosis" for="x_provisional_diagnosis" class="<?php echo $view_patient_clinical_summary_edit->LeftColumnClass ?>"><?php echo $view_patient_clinical_summary->provisional_diagnosis->caption() ?><?php echo ($view_patient_clinical_summary->provisional_diagnosis->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_clinical_summary_edit->RightColumnClass ?>"><div<?php echo $view_patient_clinical_summary->provisional_diagnosis->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_provisional_diagnosis">
<textarea data-table="view_patient_clinical_summary" data-field="x_provisional_diagnosis" name="x_provisional_diagnosis" id="x_provisional_diagnosis" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_patient_clinical_summary->provisional_diagnosis->getPlaceHolder()) ?>"<?php echo $view_patient_clinical_summary->provisional_diagnosis->editAttributes() ?>><?php echo $view_patient_clinical_summary->provisional_diagnosis->EditValue ?></textarea>
</span>
<?php echo $view_patient_clinical_summary->provisional_diagnosis->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_clinical_summary->Treatments->Visible) { // Treatments ?>
	<div id="r_Treatments" class="form-group row">
		<label id="elh_view_patient_clinical_summary_Treatments" for="x_Treatments" class="<?php echo $view_patient_clinical_summary_edit->LeftColumnClass ?>"><?php echo $view_patient_clinical_summary->Treatments->caption() ?><?php echo ($view_patient_clinical_summary->Treatments->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_clinical_summary_edit->RightColumnClass ?>"><div<?php echo $view_patient_clinical_summary->Treatments->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_Treatments">
<textarea data-table="view_patient_clinical_summary" data-field="x_Treatments" name="x_Treatments" id="x_Treatments" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_patient_clinical_summary->Treatments->getPlaceHolder()) ?>"<?php echo $view_patient_clinical_summary->Treatments->editAttributes() ?>><?php echo $view_patient_clinical_summary->Treatments->EditValue ?></textarea>
</span>
<?php echo $view_patient_clinical_summary->Treatments->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_clinical_summary->FinalDiagnosis->Visible) { // FinalDiagnosis ?>
	<div id="r_FinalDiagnosis" class="form-group row">
		<label id="elh_view_patient_clinical_summary_FinalDiagnosis" for="x_FinalDiagnosis" class="<?php echo $view_patient_clinical_summary_edit->LeftColumnClass ?>"><?php echo $view_patient_clinical_summary->FinalDiagnosis->caption() ?><?php echo ($view_patient_clinical_summary->FinalDiagnosis->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_clinical_summary_edit->RightColumnClass ?>"><div<?php echo $view_patient_clinical_summary->FinalDiagnosis->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_FinalDiagnosis">
<textarea data-table="view_patient_clinical_summary" data-field="x_FinalDiagnosis" name="x_FinalDiagnosis" id="x_FinalDiagnosis" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_patient_clinical_summary->FinalDiagnosis->getPlaceHolder()) ?>"<?php echo $view_patient_clinical_summary->FinalDiagnosis->editAttributes() ?>><?php echo $view_patient_clinical_summary->FinalDiagnosis->EditValue ?></textarea>
</span>
<?php echo $view_patient_clinical_summary->FinalDiagnosis->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_clinical_summary->courseinhospital->Visible) { // courseinhospital ?>
	<div id="r_courseinhospital" class="form-group row">
		<label id="elh_view_patient_clinical_summary_courseinhospital" for="x_courseinhospital" class="<?php echo $view_patient_clinical_summary_edit->LeftColumnClass ?>"><?php echo $view_patient_clinical_summary->courseinhospital->caption() ?><?php echo ($view_patient_clinical_summary->courseinhospital->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_clinical_summary_edit->RightColumnClass ?>"><div<?php echo $view_patient_clinical_summary->courseinhospital->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_courseinhospital">
<textarea data-table="view_patient_clinical_summary" data-field="x_courseinhospital" name="x_courseinhospital" id="x_courseinhospital" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_patient_clinical_summary->courseinhospital->getPlaceHolder()) ?>"<?php echo $view_patient_clinical_summary->courseinhospital->editAttributes() ?>><?php echo $view_patient_clinical_summary->courseinhospital->EditValue ?></textarea>
</span>
<?php echo $view_patient_clinical_summary->courseinhospital->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_clinical_summary->procedurenotes->Visible) { // procedurenotes ?>
	<div id="r_procedurenotes" class="form-group row">
		<label id="elh_view_patient_clinical_summary_procedurenotes" for="x_procedurenotes" class="<?php echo $view_patient_clinical_summary_edit->LeftColumnClass ?>"><?php echo $view_patient_clinical_summary->procedurenotes->caption() ?><?php echo ($view_patient_clinical_summary->procedurenotes->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_clinical_summary_edit->RightColumnClass ?>"><div<?php echo $view_patient_clinical_summary->procedurenotes->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_procedurenotes">
<textarea data-table="view_patient_clinical_summary" data-field="x_procedurenotes" name="x_procedurenotes" id="x_procedurenotes" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_patient_clinical_summary->procedurenotes->getPlaceHolder()) ?>"<?php echo $view_patient_clinical_summary->procedurenotes->editAttributes() ?>><?php echo $view_patient_clinical_summary->procedurenotes->EditValue ?></textarea>
</span>
<?php echo $view_patient_clinical_summary->procedurenotes->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_clinical_summary->conditionatdischarge->Visible) { // conditionatdischarge ?>
	<div id="r_conditionatdischarge" class="form-group row">
		<label id="elh_view_patient_clinical_summary_conditionatdischarge" for="x_conditionatdischarge" class="<?php echo $view_patient_clinical_summary_edit->LeftColumnClass ?>"><?php echo $view_patient_clinical_summary->conditionatdischarge->caption() ?><?php echo ($view_patient_clinical_summary->conditionatdischarge->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_clinical_summary_edit->RightColumnClass ?>"><div<?php echo $view_patient_clinical_summary->conditionatdischarge->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_conditionatdischarge">
<textarea data-table="view_patient_clinical_summary" data-field="x_conditionatdischarge" name="x_conditionatdischarge" id="x_conditionatdischarge" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_patient_clinical_summary->conditionatdischarge->getPlaceHolder()) ?>"<?php echo $view_patient_clinical_summary->conditionatdischarge->editAttributes() ?>><?php echo $view_patient_clinical_summary->conditionatdischarge->EditValue ?></textarea>
</span>
<?php echo $view_patient_clinical_summary->conditionatdischarge->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_clinical_summary->BP->Visible) { // BP ?>
	<div id="r_BP" class="form-group row">
		<label id="elh_view_patient_clinical_summary_BP" for="x_BP" class="<?php echo $view_patient_clinical_summary_edit->LeftColumnClass ?>"><?php echo $view_patient_clinical_summary->BP->caption() ?><?php echo ($view_patient_clinical_summary->BP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_clinical_summary_edit->RightColumnClass ?>"><div<?php echo $view_patient_clinical_summary->BP->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_BP">
<input type="text" data-table="view_patient_clinical_summary" data-field="x_BP" name="x_BP" id="x_BP" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_clinical_summary->BP->getPlaceHolder()) ?>" value="<?php echo $view_patient_clinical_summary->BP->EditValue ?>"<?php echo $view_patient_clinical_summary->BP->editAttributes() ?>>
</span>
<?php echo $view_patient_clinical_summary->BP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_clinical_summary->Pulse->Visible) { // Pulse ?>
	<div id="r_Pulse" class="form-group row">
		<label id="elh_view_patient_clinical_summary_Pulse" for="x_Pulse" class="<?php echo $view_patient_clinical_summary_edit->LeftColumnClass ?>"><?php echo $view_patient_clinical_summary->Pulse->caption() ?><?php echo ($view_patient_clinical_summary->Pulse->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_clinical_summary_edit->RightColumnClass ?>"><div<?php echo $view_patient_clinical_summary->Pulse->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_Pulse">
<input type="text" data-table="view_patient_clinical_summary" data-field="x_Pulse" name="x_Pulse" id="x_Pulse" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_clinical_summary->Pulse->getPlaceHolder()) ?>" value="<?php echo $view_patient_clinical_summary->Pulse->EditValue ?>"<?php echo $view_patient_clinical_summary->Pulse->editAttributes() ?>>
</span>
<?php echo $view_patient_clinical_summary->Pulse->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_clinical_summary->Resp->Visible) { // Resp ?>
	<div id="r_Resp" class="form-group row">
		<label id="elh_view_patient_clinical_summary_Resp" for="x_Resp" class="<?php echo $view_patient_clinical_summary_edit->LeftColumnClass ?>"><?php echo $view_patient_clinical_summary->Resp->caption() ?><?php echo ($view_patient_clinical_summary->Resp->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_clinical_summary_edit->RightColumnClass ?>"><div<?php echo $view_patient_clinical_summary->Resp->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_Resp">
<input type="text" data-table="view_patient_clinical_summary" data-field="x_Resp" name="x_Resp" id="x_Resp" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_clinical_summary->Resp->getPlaceHolder()) ?>" value="<?php echo $view_patient_clinical_summary->Resp->EditValue ?>"<?php echo $view_patient_clinical_summary->Resp->editAttributes() ?>>
</span>
<?php echo $view_patient_clinical_summary->Resp->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_clinical_summary->SPO2->Visible) { // SPO2 ?>
	<div id="r_SPO2" class="form-group row">
		<label id="elh_view_patient_clinical_summary_SPO2" for="x_SPO2" class="<?php echo $view_patient_clinical_summary_edit->LeftColumnClass ?>"><?php echo $view_patient_clinical_summary->SPO2->caption() ?><?php echo ($view_patient_clinical_summary->SPO2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_clinical_summary_edit->RightColumnClass ?>"><div<?php echo $view_patient_clinical_summary->SPO2->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_SPO2">
<input type="text" data-table="view_patient_clinical_summary" data-field="x_SPO2" name="x_SPO2" id="x_SPO2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_clinical_summary->SPO2->getPlaceHolder()) ?>" value="<?php echo $view_patient_clinical_summary->SPO2->EditValue ?>"<?php echo $view_patient_clinical_summary->SPO2->editAttributes() ?>>
</span>
<?php echo $view_patient_clinical_summary->SPO2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_clinical_summary->FollowupAdvice->Visible) { // FollowupAdvice ?>
	<div id="r_FollowupAdvice" class="form-group row">
		<label id="elh_view_patient_clinical_summary_FollowupAdvice" for="x_FollowupAdvice" class="<?php echo $view_patient_clinical_summary_edit->LeftColumnClass ?>"><?php echo $view_patient_clinical_summary->FollowupAdvice->caption() ?><?php echo ($view_patient_clinical_summary->FollowupAdvice->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_clinical_summary_edit->RightColumnClass ?>"><div<?php echo $view_patient_clinical_summary->FollowupAdvice->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_FollowupAdvice">
<textarea data-table="view_patient_clinical_summary" data-field="x_FollowupAdvice" name="x_FollowupAdvice" id="x_FollowupAdvice" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_patient_clinical_summary->FollowupAdvice->getPlaceHolder()) ?>"<?php echo $view_patient_clinical_summary->FollowupAdvice->editAttributes() ?>><?php echo $view_patient_clinical_summary->FollowupAdvice->EditValue ?></textarea>
</span>
<?php echo $view_patient_clinical_summary->FollowupAdvice->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_clinical_summary->NextReviewDate->Visible) { // NextReviewDate ?>
	<div id="r_NextReviewDate" class="form-group row">
		<label id="elh_view_patient_clinical_summary_NextReviewDate" for="x_NextReviewDate" class="<?php echo $view_patient_clinical_summary_edit->LeftColumnClass ?>"><?php echo $view_patient_clinical_summary->NextReviewDate->caption() ?><?php echo ($view_patient_clinical_summary->NextReviewDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_clinical_summary_edit->RightColumnClass ?>"><div<?php echo $view_patient_clinical_summary->NextReviewDate->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_NextReviewDate">
<input type="text" data-table="view_patient_clinical_summary" data-field="x_NextReviewDate" name="x_NextReviewDate" id="x_NextReviewDate" placeholder="<?php echo HtmlEncode($view_patient_clinical_summary->NextReviewDate->getPlaceHolder()) ?>" value="<?php echo $view_patient_clinical_summary->NextReviewDate->EditValue ?>"<?php echo $view_patient_clinical_summary->NextReviewDate->editAttributes() ?>>
<?php if (!$view_patient_clinical_summary->NextReviewDate->ReadOnly && !$view_patient_clinical_summary->NextReviewDate->Disabled && !isset($view_patient_clinical_summary->NextReviewDate->EditAttrs["readonly"]) && !isset($view_patient_clinical_summary->NextReviewDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_patient_clinical_summaryedit", "x_NextReviewDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $view_patient_clinical_summary->NextReviewDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_clinical_summary->History->Visible) { // History ?>
	<div id="r_History" class="form-group row">
		<label id="elh_view_patient_clinical_summary_History" for="x_History" class="<?php echo $view_patient_clinical_summary_edit->LeftColumnClass ?>"><?php echo $view_patient_clinical_summary->History->caption() ?><?php echo ($view_patient_clinical_summary->History->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_clinical_summary_edit->RightColumnClass ?>"><div<?php echo $view_patient_clinical_summary->History->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_History">
<textarea data-table="view_patient_clinical_summary" data-field="x_History" name="x_History" id="x_History" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_patient_clinical_summary->History->getPlaceHolder()) ?>"<?php echo $view_patient_clinical_summary->History->editAttributes() ?>><?php echo $view_patient_clinical_summary->History->EditValue ?></textarea>
</span>
<?php echo $view_patient_clinical_summary->History->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_patient_clinical_summary->vitals->Visible) { // vitals ?>
	<div id="r_vitals" class="form-group row">
		<label id="elh_view_patient_clinical_summary_vitals" for="x_vitals" class="<?php echo $view_patient_clinical_summary_edit->LeftColumnClass ?>"><?php echo $view_patient_clinical_summary->vitals->caption() ?><?php echo ($view_patient_clinical_summary->vitals->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_patient_clinical_summary_edit->RightColumnClass ?>"><div<?php echo $view_patient_clinical_summary->vitals->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_vitals">
<textarea data-table="view_patient_clinical_summary" data-field="x_vitals" name="x_vitals" id="x_vitals" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_patient_clinical_summary->vitals->getPlaceHolder()) ?>"<?php echo $view_patient_clinical_summary->vitals->editAttributes() ?>><?php echo $view_patient_clinical_summary->vitals->EditValue ?></textarea>
</span>
<?php echo $view_patient_clinical_summary->vitals->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$view_patient_clinical_summary_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $view_patient_clinical_summary_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $view_patient_clinical_summary_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$view_patient_clinical_summary_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$view_patient_clinical_summary_edit->terminate();
?>