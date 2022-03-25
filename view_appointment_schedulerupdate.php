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
$view_appointment_scheduler_update = new view_appointment_scheduler_update();

// Run the page
$view_appointment_scheduler_update->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_appointment_scheduler_update->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "update";
var fview_appointment_schedulerupdate = currentForm = new ew.Form("fview_appointment_schedulerupdate", "update");

// Validate form
fview_appointment_schedulerupdate.validate = function() {
	if (!this.validateRequired)
		return true; // Ignore validation
	var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
	if ($fobj.find("#confirm").val() == "F")
		return true;
	if (!ew.updateSelected(fobj)) {
		ew.alert(ew.language.phrase("NoFieldSelected"));
		return false;
	}
	var elm, felm, uelm, addcnt = 0;
	var $k = $fobj.find("#" + this.formKeyCountName); // Get key_count
	var rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1;
	var startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
	var gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
	for (var i = startcnt; i <= rowcnt; i++) {
		var infix = ($k[0]) ? String(i) : "";
		$fobj.data("rowindex", infix);
		<?php if ($view_appointment_scheduler_update->patientID->Required) { ?>
			elm = this.getElements("x" + infix + "_patientID");
			uelm = this.getElements("u" + infix + "_patientID");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->patientID->caption(), $view_appointment_scheduler->patientID->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($view_appointment_scheduler_update->patientName->Required) { ?>
			elm = this.getElements("x" + infix + "_patientName");
			uelm = this.getElements("u" + infix + "_patientName");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->patientName->caption(), $view_appointment_scheduler->patientName->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($view_appointment_scheduler_update->MobileNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_MobileNumber");
			uelm = this.getElements("u" + infix + "_MobileNumber");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->MobileNumber->caption(), $view_appointment_scheduler->MobileNumber->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($view_appointment_scheduler_update->Purpose->Required) { ?>
			elm = this.getElements("x" + infix + "_Purpose");
			uelm = this.getElements("u" + infix + "_Purpose");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->Purpose->caption(), $view_appointment_scheduler->Purpose->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($view_appointment_scheduler_update->PatientType->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientType");
			uelm = this.getElements("u" + infix + "_PatientType");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->PatientType->caption(), $view_appointment_scheduler->PatientType->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($view_appointment_scheduler_update->Referal->Required) { ?>
			elm = this.getElements("x" + infix + "_Referal");
			uelm = this.getElements("u" + infix + "_Referal");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->Referal->caption(), $view_appointment_scheduler->Referal->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($view_appointment_scheduler_update->start_date->Required) { ?>
			elm = this.getElements("x" + infix + "_start_date");
			uelm = this.getElements("u" + infix + "_start_date");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->start_date->caption(), $view_appointment_scheduler->start_date->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
			elm = this.getElements("x" + infix + "_start_date");
			uelm = this.getElements("u" + infix + "_start_date");
			if (uelm && uelm.checked && elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_appointment_scheduler->start_date->errorMessage()) ?>");
		<?php if ($view_appointment_scheduler_update->DoctorName->Required) { ?>
			elm = this.getElements("x" + infix + "_DoctorName");
			uelm = this.getElements("u" + infix + "_DoctorName");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->DoctorName->caption(), $view_appointment_scheduler->DoctorName->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($view_appointment_scheduler_update->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			uelm = this.getElements("u" + infix + "_HospID");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->HospID->caption(), $view_appointment_scheduler->HospID->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($view_appointment_scheduler_update->end_date->Required) { ?>
			elm = this.getElements("x" + infix + "_end_date");
			uelm = this.getElements("u" + infix + "_end_date");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->end_date->caption(), $view_appointment_scheduler->end_date->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
			elm = this.getElements("x" + infix + "_end_date");
			uelm = this.getElements("u" + infix + "_end_date");
			if (uelm && uelm.checked && elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_appointment_scheduler->end_date->errorMessage()) ?>");
		<?php if ($view_appointment_scheduler_update->DoctorID->Required) { ?>
			elm = this.getElements("x" + infix + "_DoctorID");
			uelm = this.getElements("u" + infix + "_DoctorID");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->DoctorID->caption(), $view_appointment_scheduler->DoctorID->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($view_appointment_scheduler_update->DoctorCode->Required) { ?>
			elm = this.getElements("x" + infix + "_DoctorCode");
			uelm = this.getElements("u" + infix + "_DoctorCode");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->DoctorCode->caption(), $view_appointment_scheduler->DoctorCode->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($view_appointment_scheduler_update->Department->Required) { ?>
			elm = this.getElements("x" + infix + "_Department");
			uelm = this.getElements("u" + infix + "_Department");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->Department->caption(), $view_appointment_scheduler->Department->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($view_appointment_scheduler_update->AppointmentStatus->Required) { ?>
			elm = this.getElements("x" + infix + "_AppointmentStatus");
			uelm = this.getElements("u" + infix + "_AppointmentStatus");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->AppointmentStatus->caption(), $view_appointment_scheduler->AppointmentStatus->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($view_appointment_scheduler_update->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status[]");
			uelm = this.getElements("u" + infix + "_status");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->status->caption(), $view_appointment_scheduler->status->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($view_appointment_scheduler_update->scheduler_id->Required) { ?>
			elm = this.getElements("x" + infix + "_scheduler_id");
			uelm = this.getElements("u" + infix + "_scheduler_id");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->scheduler_id->caption(), $view_appointment_scheduler->scheduler_id->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($view_appointment_scheduler_update->text->Required) { ?>
			elm = this.getElements("x" + infix + "_text");
			uelm = this.getElements("u" + infix + "_text");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->text->caption(), $view_appointment_scheduler->text->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($view_appointment_scheduler_update->appointment_status->Required) { ?>
			elm = this.getElements("x" + infix + "_appointment_status");
			uelm = this.getElements("u" + infix + "_appointment_status");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->appointment_status->caption(), $view_appointment_scheduler->appointment_status->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($view_appointment_scheduler_update->PId->Required) { ?>
			elm = this.getElements("x" + infix + "_PId");
			uelm = this.getElements("u" + infix + "_PId");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->PId->caption(), $view_appointment_scheduler->PId->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
			elm = this.getElements("x" + infix + "_PId");
			uelm = this.getElements("u" + infix + "_PId");
			if (uelm && uelm.checked && elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_appointment_scheduler->PId->errorMessage()) ?>");
		<?php if ($view_appointment_scheduler_update->SchEmail->Required) { ?>
			elm = this.getElements("x" + infix + "_SchEmail");
			uelm = this.getElements("u" + infix + "_SchEmail");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->SchEmail->caption(), $view_appointment_scheduler->SchEmail->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($view_appointment_scheduler_update->appointment_type->Required) { ?>
			elm = this.getElements("x" + infix + "_appointment_type");
			uelm = this.getElements("u" + infix + "_appointment_type");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->appointment_type->caption(), $view_appointment_scheduler->appointment_type->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($view_appointment_scheduler_update->Notified->Required) { ?>
			elm = this.getElements("x" + infix + "_Notified[]");
			uelm = this.getElements("u" + infix + "_Notified");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->Notified->caption(), $view_appointment_scheduler->Notified->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($view_appointment_scheduler_update->Notes->Required) { ?>
			elm = this.getElements("x" + infix + "_Notes");
			uelm = this.getElements("u" + infix + "_Notes");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->Notes->caption(), $view_appointment_scheduler->Notes->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($view_appointment_scheduler_update->paymentType->Required) { ?>
			elm = this.getElements("x" + infix + "_paymentType");
			uelm = this.getElements("u" + infix + "_paymentType");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->paymentType->caption(), $view_appointment_scheduler->paymentType->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($view_appointment_scheduler_update->WhereDidYouHear->Required) { ?>
			elm = this.getElements("x" + infix + "_WhereDidYouHear[]");
			uelm = this.getElements("u" + infix + "_WhereDidYouHear");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->WhereDidYouHear->caption(), $view_appointment_scheduler->WhereDidYouHear->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($view_appointment_scheduler_update->createdBy->Required) { ?>
			elm = this.getElements("x" + infix + "_createdBy");
			uelm = this.getElements("u" + infix + "_createdBy");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->createdBy->caption(), $view_appointment_scheduler->createdBy->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($view_appointment_scheduler_update->createdDateTime->Required) { ?>
			elm = this.getElements("x" + infix + "_createdDateTime");
			uelm = this.getElements("u" + infix + "_createdDateTime");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->createdDateTime->caption(), $view_appointment_scheduler->createdDateTime->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($view_appointment_scheduler_update->PatientTypee->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientTypee");
			uelm = this.getElements("u" + infix + "_PatientTypee");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->PatientTypee->caption(), $view_appointment_scheduler->PatientTypee->RequiredErrorMessage)) ?>");
			}
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
	}
	return true;
}

// Form_CustomValidate event
fview_appointment_schedulerupdate.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_appointment_schedulerupdate.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_appointment_schedulerupdate.lists["x_patientID"] = <?php echo $view_appointment_scheduler_update->patientID->Lookup->toClientList() ?>;
fview_appointment_schedulerupdate.lists["x_patientID"].options = <?php echo JsonEncode($view_appointment_scheduler_update->patientID->lookupOptions()) ?>;
fview_appointment_schedulerupdate.lists["x_PatientType"] = <?php echo $view_appointment_scheduler_update->PatientType->Lookup->toClientList() ?>;
fview_appointment_schedulerupdate.lists["x_PatientType"].options = <?php echo JsonEncode($view_appointment_scheduler_update->PatientType->options(FALSE, TRUE)) ?>;
fview_appointment_schedulerupdate.lists["x_Referal"] = <?php echo $view_appointment_scheduler_update->Referal->Lookup->toClientList() ?>;
fview_appointment_schedulerupdate.lists["x_Referal"].options = <?php echo JsonEncode($view_appointment_scheduler_update->Referal->lookupOptions()) ?>;
fview_appointment_schedulerupdate.lists["x_DoctorName"] = <?php echo $view_appointment_scheduler_update->DoctorName->Lookup->toClientList() ?>;
fview_appointment_schedulerupdate.lists["x_DoctorName"].options = <?php echo JsonEncode($view_appointment_scheduler_update->DoctorName->lookupOptions()) ?>;
fview_appointment_schedulerupdate.lists["x_status[]"] = <?php echo $view_appointment_scheduler_update->status->Lookup->toClientList() ?>;
fview_appointment_schedulerupdate.lists["x_status[]"].options = <?php echo JsonEncode($view_appointment_scheduler_update->status->options(FALSE, TRUE)) ?>;
fview_appointment_schedulerupdate.lists["x_appointment_type"] = <?php echo $view_appointment_scheduler_update->appointment_type->Lookup->toClientList() ?>;
fview_appointment_schedulerupdate.lists["x_appointment_type"].options = <?php echo JsonEncode($view_appointment_scheduler_update->appointment_type->options(FALSE, TRUE)) ?>;
fview_appointment_schedulerupdate.lists["x_Notified[]"] = <?php echo $view_appointment_scheduler_update->Notified->Lookup->toClientList() ?>;
fview_appointment_schedulerupdate.lists["x_Notified[]"].options = <?php echo JsonEncode($view_appointment_scheduler_update->Notified->options(FALSE, TRUE)) ?>;
fview_appointment_schedulerupdate.lists["x_WhereDidYouHear[]"] = <?php echo $view_appointment_scheduler_update->WhereDidYouHear->Lookup->toClientList() ?>;
fview_appointment_schedulerupdate.lists["x_WhereDidYouHear[]"].options = <?php echo JsonEncode($view_appointment_scheduler_update->WhereDidYouHear->lookupOptions()) ?>;
fview_appointment_schedulerupdate.lists["x_PatientTypee"] = <?php echo $view_appointment_scheduler_update->PatientTypee->Lookup->toClientList() ?>;
fview_appointment_schedulerupdate.lists["x_PatientTypee"].options = <?php echo JsonEncode($view_appointment_scheduler_update->PatientTypee->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $view_appointment_scheduler_update->showPageHeader(); ?>
<?php
$view_appointment_scheduler_update->showMessage();
?>
<form name="fview_appointment_schedulerupdate" id="fview_appointment_schedulerupdate" class="<?php echo $view_appointment_scheduler_update->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_appointment_scheduler_update->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_appointment_scheduler_update->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_appointment_scheduler">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$view_appointment_scheduler_update->IsModal ?>">
<?php foreach ($view_appointment_scheduler_update->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div id="tbl_view_appointment_schedulerupdate" class="ew-update-div"><!-- page -->
	<div class="form-check">
		<input type="checkbox" class="form-check-input" name="u" id="u" onclick="ew.selectAll(this);"><label class="form-check-label" for="u"><?php echo $Language->Phrase("UpdateSelectAll") ?></label>
	</div>
<?php if ($view_appointment_scheduler->patientID->Visible) { // patientID ?>
	<div id="r_patientID" class="form-group row">
		<label for="x_patientID" class="<?php echo $view_appointment_scheduler_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_patientID" id="u_patientID" class="form-check-input ew-multi-select" value="1"<?php echo ($view_appointment_scheduler->patientID->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_patientID"><?php echo $view_appointment_scheduler->patientID->caption() ?></label></div></label>
		<div class="<?php echo $view_appointment_scheduler_update->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler->patientID->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_patientID">
<?php $view_appointment_scheduler->patientID->EditAttrs["onchange"] = "ew.autoFill(this);" . @$view_appointment_scheduler->patientID->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_patientID"><?php echo strval($view_appointment_scheduler->patientID->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($view_appointment_scheduler->patientID->ViewValue) : $view_appointment_scheduler->patientID->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_appointment_scheduler->patientID->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($view_appointment_scheduler->patientID->ReadOnly || $view_appointment_scheduler->patientID->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_patientID',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $view_appointment_scheduler->patientID->Lookup->getParamTag("p_x_patientID") ?>
<input type="hidden" data-table="view_appointment_scheduler" data-field="x_patientID" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_appointment_scheduler->patientID->displayValueSeparatorAttribute() ?>" name="x_patientID" id="x_patientID" value="<?php echo $view_appointment_scheduler->patientID->CurrentValue ?>"<?php echo $view_appointment_scheduler->patientID->editAttributes() ?>>
</span>
<?php echo $view_appointment_scheduler->patientID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler->patientName->Visible) { // patientName ?>
	<div id="r_patientName" class="form-group row">
		<label for="x_patientName" class="<?php echo $view_appointment_scheduler_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_patientName" id="u_patientName" class="form-check-input ew-multi-select" value="1"<?php echo ($view_appointment_scheduler->patientName->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_patientName"><?php echo $view_appointment_scheduler->patientName->caption() ?></label></div></label>
		<div class="<?php echo $view_appointment_scheduler_update->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler->patientName->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_patientName">
<input type="text" data-table="view_appointment_scheduler" data-field="x_patientName" name="x_patientName" id="x_patientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler->patientName->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler->patientName->EditValue ?>"<?php echo $view_appointment_scheduler->patientName->editAttributes() ?>>
</span>
<?php echo $view_appointment_scheduler->patientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler->MobileNumber->Visible) { // MobileNumber ?>
	<div id="r_MobileNumber" class="form-group row">
		<label for="x_MobileNumber" class="<?php echo $view_appointment_scheduler_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_MobileNumber" id="u_MobileNumber" class="form-check-input ew-multi-select" value="1"<?php echo ($view_appointment_scheduler->MobileNumber->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_MobileNumber"><?php echo $view_appointment_scheduler->MobileNumber->caption() ?></label></div></label>
		<div class="<?php echo $view_appointment_scheduler_update->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler->MobileNumber->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_MobileNumber">
<input type="text" data-table="view_appointment_scheduler" data-field="x_MobileNumber" name="x_MobileNumber" id="x_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler->MobileNumber->EditValue ?>"<?php echo $view_appointment_scheduler->MobileNumber->editAttributes() ?>>
</span>
<?php echo $view_appointment_scheduler->MobileNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler->Purpose->Visible) { // Purpose ?>
	<div id="r_Purpose" class="form-group row">
		<label for="x_Purpose" class="<?php echo $view_appointment_scheduler_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Purpose" id="u_Purpose" class="form-check-input ew-multi-select" value="1"<?php echo ($view_appointment_scheduler->Purpose->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Purpose"><?php echo $view_appointment_scheduler->Purpose->caption() ?></label></div></label>
		<div class="<?php echo $view_appointment_scheduler_update->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler->Purpose->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_Purpose">
<input type="text" data-table="view_appointment_scheduler" data-field="x_Purpose" name="x_Purpose" id="x_Purpose" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler->Purpose->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler->Purpose->EditValue ?>"<?php echo $view_appointment_scheduler->Purpose->editAttributes() ?>>
</span>
<?php echo $view_appointment_scheduler->Purpose->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler->PatientType->Visible) { // PatientType ?>
	<div id="r_PatientType" class="form-group row">
		<label class="<?php echo $view_appointment_scheduler_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_PatientType" id="u_PatientType" class="form-check-input ew-multi-select" value="1"<?php echo ($view_appointment_scheduler->PatientType->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_PatientType"><?php echo $view_appointment_scheduler->PatientType->caption() ?></label></div></label>
		<div class="<?php echo $view_appointment_scheduler_update->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler->PatientType->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_PatientType">
<?php $view_appointment_scheduler->PatientType->EditAttrs["onclick"] = "ew.updateOptions.call(this); " . @$view_appointment_scheduler->PatientType->EditAttrs["onclick"]; ?>
<div id="tp_x_PatientType" class="ew-template"><input type="radio" class="form-check-input" data-table="view_appointment_scheduler" data-field="x_PatientType" data-value-separator="<?php echo $view_appointment_scheduler->PatientType->displayValueSeparatorAttribute() ?>" name="x_PatientType" id="x_PatientType" value="{value}"<?php echo $view_appointment_scheduler->PatientType->editAttributes() ?>></div>
<div id="dsl_x_PatientType" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_appointment_scheduler->PatientType->radioButtonListHtml(FALSE, "x_PatientType") ?>
</div></div>
</span>
<?php echo $view_appointment_scheduler->PatientType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler->Referal->Visible) { // Referal ?>
	<div id="r_Referal" class="form-group row">
		<label for="x_Referal" class="<?php echo $view_appointment_scheduler_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Referal" id="u_Referal" class="form-check-input ew-multi-select" value="1"<?php echo ($view_appointment_scheduler->Referal->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Referal"><?php echo $view_appointment_scheduler->Referal->caption() ?></label></div></label>
		<div class="<?php echo $view_appointment_scheduler_update->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler->Referal->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_Referal">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Referal"><?php echo strval($view_appointment_scheduler->Referal->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($view_appointment_scheduler->Referal->ViewValue) : $view_appointment_scheduler->Referal->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_appointment_scheduler->Referal->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($view_appointment_scheduler->Referal->ReadOnly || $view_appointment_scheduler->Referal->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_Referal',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $view_appointment_scheduler->Referal->Lookup->getParamTag("p_x_Referal") ?>
<input type="hidden" data-table="view_appointment_scheduler" data-field="x_Referal" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_appointment_scheduler->Referal->displayValueSeparatorAttribute() ?>" name="x_Referal" id="x_Referal" value="<?php echo $view_appointment_scheduler->Referal->CurrentValue ?>"<?php echo $view_appointment_scheduler->Referal->editAttributes() ?>>
</span>
<?php echo $view_appointment_scheduler->Referal->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler->start_date->Visible) { // start_date ?>
	<div id="r_start_date" class="form-group row">
		<label for="x_start_date" class="<?php echo $view_appointment_scheduler_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_start_date" id="u_start_date" class="form-check-input ew-multi-select" value="1"<?php echo ($view_appointment_scheduler->start_date->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_start_date"><?php echo $view_appointment_scheduler->start_date->caption() ?></label></div></label>
		<div class="<?php echo $view_appointment_scheduler_update->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler->start_date->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_start_date">
<input type="text" data-table="view_appointment_scheduler" data-field="x_start_date" data-format="11" name="x_start_date" id="x_start_date" placeholder="<?php echo HtmlEncode($view_appointment_scheduler->start_date->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler->start_date->EditValue ?>"<?php echo $view_appointment_scheduler->start_date->editAttributes() ?>>
<?php if (!$view_appointment_scheduler->start_date->ReadOnly && !$view_appointment_scheduler->start_date->Disabled && !isset($view_appointment_scheduler->start_date->EditAttrs["readonly"]) && !isset($view_appointment_scheduler->start_date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_appointment_schedulerupdate", "x_start_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
<?php echo $view_appointment_scheduler->start_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler->DoctorName->Visible) { // DoctorName ?>
	<div id="r_DoctorName" class="form-group row">
		<label for="x_DoctorName" class="<?php echo $view_appointment_scheduler_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_DoctorName" id="u_DoctorName" class="form-check-input ew-multi-select" value="1"<?php echo ($view_appointment_scheduler->DoctorName->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_DoctorName"><?php echo $view_appointment_scheduler->DoctorName->caption() ?></label></div></label>
		<div class="<?php echo $view_appointment_scheduler_update->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler->DoctorName->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_DoctorName">
<?php $view_appointment_scheduler->DoctorName->EditAttrs["onchange"] = "ew.autoFill(this);" . @$view_appointment_scheduler->DoctorName->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_DoctorName"><?php echo strval($view_appointment_scheduler->DoctorName->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($view_appointment_scheduler->DoctorName->ViewValue) : $view_appointment_scheduler->DoctorName->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_appointment_scheduler->DoctorName->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($view_appointment_scheduler->DoctorName->ReadOnly || $view_appointment_scheduler->DoctorName->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_DoctorName',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $view_appointment_scheduler->DoctorName->Lookup->getParamTag("p_x_DoctorName") ?>
<input type="hidden" data-table="view_appointment_scheduler" data-field="x_DoctorName" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_appointment_scheduler->DoctorName->displayValueSeparatorAttribute() ?>" name="x_DoctorName" id="x_DoctorName" value="<?php echo $view_appointment_scheduler->DoctorName->CurrentValue ?>"<?php echo $view_appointment_scheduler->DoctorName->editAttributes() ?>>
</span>
<?php echo $view_appointment_scheduler->DoctorName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler->end_date->Visible) { // end_date ?>
	<div id="r_end_date" class="form-group row">
		<label for="x_end_date" class="<?php echo $view_appointment_scheduler_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_end_date" id="u_end_date" class="form-check-input ew-multi-select" value="1"<?php echo ($view_appointment_scheduler->end_date->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_end_date"><?php echo $view_appointment_scheduler->end_date->caption() ?></label></div></label>
		<div class="<?php echo $view_appointment_scheduler_update->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler->end_date->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_end_date">
<input type="text" data-table="view_appointment_scheduler" data-field="x_end_date" data-format="11" name="x_end_date" id="x_end_date" placeholder="<?php echo HtmlEncode($view_appointment_scheduler->end_date->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler->end_date->EditValue ?>"<?php echo $view_appointment_scheduler->end_date->editAttributes() ?>>
<?php if (!$view_appointment_scheduler->end_date->ReadOnly && !$view_appointment_scheduler->end_date->Disabled && !isset($view_appointment_scheduler->end_date->EditAttrs["readonly"]) && !isset($view_appointment_scheduler->end_date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_appointment_schedulerupdate", "x_end_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
<?php echo $view_appointment_scheduler->end_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler->DoctorID->Visible) { // DoctorID ?>
	<div id="r_DoctorID" class="form-group row">
		<label for="x_DoctorID" class="<?php echo $view_appointment_scheduler_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_DoctorID" id="u_DoctorID" class="form-check-input ew-multi-select" value="1"<?php echo ($view_appointment_scheduler->DoctorID->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_DoctorID"><?php echo $view_appointment_scheduler->DoctorID->caption() ?></label></div></label>
		<div class="<?php echo $view_appointment_scheduler_update->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler->DoctorID->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_DoctorID">
<input type="text" data-table="view_appointment_scheduler" data-field="x_DoctorID" name="x_DoctorID" id="x_DoctorID" size="3" maxlength="5" placeholder="<?php echo HtmlEncode($view_appointment_scheduler->DoctorID->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler->DoctorID->EditValue ?>"<?php echo $view_appointment_scheduler->DoctorID->editAttributes() ?>>
</span>
<?php echo $view_appointment_scheduler->DoctorID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler->DoctorCode->Visible) { // DoctorCode ?>
	<div id="r_DoctorCode" class="form-group row">
		<label for="x_DoctorCode" class="<?php echo $view_appointment_scheduler_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_DoctorCode" id="u_DoctorCode" class="form-check-input ew-multi-select" value="1"<?php echo ($view_appointment_scheduler->DoctorCode->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_DoctorCode"><?php echo $view_appointment_scheduler->DoctorCode->caption() ?></label></div></label>
		<div class="<?php echo $view_appointment_scheduler_update->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler->DoctorCode->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_DoctorCode">
<input type="text" data-table="view_appointment_scheduler" data-field="x_DoctorCode" name="x_DoctorCode" id="x_DoctorCode" size="5" maxlength="7" placeholder="<?php echo HtmlEncode($view_appointment_scheduler->DoctorCode->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler->DoctorCode->EditValue ?>"<?php echo $view_appointment_scheduler->DoctorCode->editAttributes() ?>>
</span>
<?php echo $view_appointment_scheduler->DoctorCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler->Department->Visible) { // Department ?>
	<div id="r_Department" class="form-group row">
		<label for="x_Department" class="<?php echo $view_appointment_scheduler_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Department" id="u_Department" class="form-check-input ew-multi-select" value="1"<?php echo ($view_appointment_scheduler->Department->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Department"><?php echo $view_appointment_scheduler->Department->caption() ?></label></div></label>
		<div class="<?php echo $view_appointment_scheduler_update->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler->Department->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_Department">
<input type="text" data-table="view_appointment_scheduler" data-field="x_Department" name="x_Department" id="x_Department" size="8" maxlength="15" placeholder="<?php echo HtmlEncode($view_appointment_scheduler->Department->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler->Department->EditValue ?>"<?php echo $view_appointment_scheduler->Department->editAttributes() ?>>
</span>
<?php echo $view_appointment_scheduler->Department->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler->AppointmentStatus->Visible) { // AppointmentStatus ?>
	<div id="r_AppointmentStatus" class="form-group row">
		<label for="x_AppointmentStatus" class="<?php echo $view_appointment_scheduler_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_AppointmentStatus" id="u_AppointmentStatus" class="form-check-input ew-multi-select" value="1"<?php echo ($view_appointment_scheduler->AppointmentStatus->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_AppointmentStatus"><?php echo $view_appointment_scheduler->AppointmentStatus->caption() ?></label></div></label>
		<div class="<?php echo $view_appointment_scheduler_update->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler->AppointmentStatus->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_AppointmentStatus">
<input type="text" data-table="view_appointment_scheduler" data-field="x_AppointmentStatus" name="x_AppointmentStatus" id="x_AppointmentStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler->AppointmentStatus->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler->AppointmentStatus->EditValue ?>"<?php echo $view_appointment_scheduler->AppointmentStatus->editAttributes() ?>>
</span>
<?php echo $view_appointment_scheduler->AppointmentStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label class="<?php echo $view_appointment_scheduler_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_status" id="u_status" class="form-check-input ew-multi-select" value="1"<?php echo ($view_appointment_scheduler->status->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_status"><?php echo $view_appointment_scheduler->status->caption() ?></label></div></label>
		<div class="<?php echo $view_appointment_scheduler_update->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler->status->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_status">
<div id="tp_x_status" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_appointment_scheduler" data-field="x_status" data-value-separator="<?php echo $view_appointment_scheduler->status->displayValueSeparatorAttribute() ?>" name="x_status[]" id="x_status[]" value="{value}"<?php echo $view_appointment_scheduler->status->editAttributes() ?>></div>
<div id="dsl_x_status" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_appointment_scheduler->status->checkBoxListHtml(FALSE, "x_status[]") ?>
</div></div>
</span>
<?php echo $view_appointment_scheduler->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler->text->Visible) { // text ?>
	<div id="r_text" class="form-group row">
		<label for="x_text" class="<?php echo $view_appointment_scheduler_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_text" id="u_text" class="form-check-input ew-multi-select" value="1"<?php echo ($view_appointment_scheduler->text->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_text"><?php echo $view_appointment_scheduler->text->caption() ?></label></div></label>
		<div class="<?php echo $view_appointment_scheduler_update->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler->text->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_text">
<input type="text" data-table="view_appointment_scheduler" data-field="x_text" name="x_text" id="x_text" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler->text->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler->text->EditValue ?>"<?php echo $view_appointment_scheduler->text->editAttributes() ?>>
</span>
<?php echo $view_appointment_scheduler->text->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler->appointment_status->Visible) { // appointment_status ?>
	<div id="r_appointment_status" class="form-group row">
		<label for="x_appointment_status" class="<?php echo $view_appointment_scheduler_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_appointment_status" id="u_appointment_status" class="form-check-input ew-multi-select" value="1"<?php echo ($view_appointment_scheduler->appointment_status->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_appointment_status"><?php echo $view_appointment_scheduler->appointment_status->caption() ?></label></div></label>
		<div class="<?php echo $view_appointment_scheduler_update->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler->appointment_status->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_appointment_status">
<input type="text" data-table="view_appointment_scheduler" data-field="x_appointment_status" name="x_appointment_status" id="x_appointment_status" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler->appointment_status->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler->appointment_status->EditValue ?>"<?php echo $view_appointment_scheduler->appointment_status->editAttributes() ?>>
</span>
<?php echo $view_appointment_scheduler->appointment_status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler->PId->Visible) { // PId ?>
	<div id="r_PId" class="form-group row">
		<label for="x_PId" class="<?php echo $view_appointment_scheduler_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_PId" id="u_PId" class="form-check-input ew-multi-select" value="1"<?php echo ($view_appointment_scheduler->PId->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_PId"><?php echo $view_appointment_scheduler->PId->caption() ?></label></div></label>
		<div class="<?php echo $view_appointment_scheduler_update->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler->PId->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_PId">
<input type="text" data-table="view_appointment_scheduler" data-field="x_PId" name="x_PId" id="x_PId" size="30" placeholder="<?php echo HtmlEncode($view_appointment_scheduler->PId->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler->PId->EditValue ?>"<?php echo $view_appointment_scheduler->PId->editAttributes() ?>>
</span>
<?php echo $view_appointment_scheduler->PId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler->SchEmail->Visible) { // SchEmail ?>
	<div id="r_SchEmail" class="form-group row">
		<label for="x_SchEmail" class="<?php echo $view_appointment_scheduler_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_SchEmail" id="u_SchEmail" class="form-check-input ew-multi-select" value="1"<?php echo ($view_appointment_scheduler->SchEmail->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_SchEmail"><?php echo $view_appointment_scheduler->SchEmail->caption() ?></label></div></label>
		<div class="<?php echo $view_appointment_scheduler_update->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler->SchEmail->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_SchEmail">
<input type="text" data-table="view_appointment_scheduler" data-field="x_SchEmail" name="x_SchEmail" id="x_SchEmail" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler->SchEmail->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler->SchEmail->EditValue ?>"<?php echo $view_appointment_scheduler->SchEmail->editAttributes() ?>>
</span>
<?php echo $view_appointment_scheduler->SchEmail->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler->appointment_type->Visible) { // appointment_type ?>
	<div id="r_appointment_type" class="form-group row">
		<label class="<?php echo $view_appointment_scheduler_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_appointment_type" id="u_appointment_type" class="form-check-input ew-multi-select" value="1"<?php echo ($view_appointment_scheduler->appointment_type->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_appointment_type"><?php echo $view_appointment_scheduler->appointment_type->caption() ?></label></div></label>
		<div class="<?php echo $view_appointment_scheduler_update->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler->appointment_type->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_appointment_type">
<div id="tp_x_appointment_type" class="ew-template"><input type="radio" class="form-check-input" data-table="view_appointment_scheduler" data-field="x_appointment_type" data-value-separator="<?php echo $view_appointment_scheduler->appointment_type->displayValueSeparatorAttribute() ?>" name="x_appointment_type" id="x_appointment_type" value="{value}"<?php echo $view_appointment_scheduler->appointment_type->editAttributes() ?>></div>
<div id="dsl_x_appointment_type" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_appointment_scheduler->appointment_type->radioButtonListHtml(FALSE, "x_appointment_type") ?>
</div></div>
</span>
<?php echo $view_appointment_scheduler->appointment_type->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler->Notified->Visible) { // Notified ?>
	<div id="r_Notified" class="form-group row">
		<label class="<?php echo $view_appointment_scheduler_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Notified" id="u_Notified" class="form-check-input ew-multi-select" value="1"<?php echo ($view_appointment_scheduler->Notified->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Notified"><?php echo $view_appointment_scheduler->Notified->caption() ?></label></div></label>
		<div class="<?php echo $view_appointment_scheduler_update->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler->Notified->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_Notified">
<div id="tp_x_Notified" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_appointment_scheduler" data-field="x_Notified" data-value-separator="<?php echo $view_appointment_scheduler->Notified->displayValueSeparatorAttribute() ?>" name="x_Notified[]" id="x_Notified[]" value="{value}"<?php echo $view_appointment_scheduler->Notified->editAttributes() ?>></div>
<div id="dsl_x_Notified" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_appointment_scheduler->Notified->checkBoxListHtml(FALSE, "x_Notified[]") ?>
</div></div>
</span>
<?php echo $view_appointment_scheduler->Notified->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler->Notes->Visible) { // Notes ?>
	<div id="r_Notes" class="form-group row">
		<label for="x_Notes" class="<?php echo $view_appointment_scheduler_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Notes" id="u_Notes" class="form-check-input ew-multi-select" value="1"<?php echo ($view_appointment_scheduler->Notes->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Notes"><?php echo $view_appointment_scheduler->Notes->caption() ?></label></div></label>
		<div class="<?php echo $view_appointment_scheduler_update->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler->Notes->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_Notes">
<input type="text" data-table="view_appointment_scheduler" data-field="x_Notes" name="x_Notes" id="x_Notes" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler->Notes->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler->Notes->EditValue ?>"<?php echo $view_appointment_scheduler->Notes->editAttributes() ?>>
</span>
<?php echo $view_appointment_scheduler->Notes->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler->paymentType->Visible) { // paymentType ?>
	<div id="r_paymentType" class="form-group row">
		<label for="x_paymentType" class="<?php echo $view_appointment_scheduler_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_paymentType" id="u_paymentType" class="form-check-input ew-multi-select" value="1"<?php echo ($view_appointment_scheduler->paymentType->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_paymentType"><?php echo $view_appointment_scheduler->paymentType->caption() ?></label></div></label>
		<div class="<?php echo $view_appointment_scheduler_update->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler->paymentType->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_paymentType">
<input type="text" data-table="view_appointment_scheduler" data-field="x_paymentType" name="x_paymentType" id="x_paymentType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler->paymentType->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler->paymentType->EditValue ?>"<?php echo $view_appointment_scheduler->paymentType->editAttributes() ?>>
</span>
<?php echo $view_appointment_scheduler->paymentType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
	<div id="r_WhereDidYouHear" class="form-group row">
		<label class="<?php echo $view_appointment_scheduler_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_WhereDidYouHear" id="u_WhereDidYouHear" class="form-check-input ew-multi-select" value="1"<?php echo ($view_appointment_scheduler->WhereDidYouHear->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_WhereDidYouHear"><?php echo $view_appointment_scheduler->WhereDidYouHear->caption() ?></label></div></label>
		<div class="<?php echo $view_appointment_scheduler_update->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler->WhereDidYouHear->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_WhereDidYouHear">
<div id="tp_x_WhereDidYouHear" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_appointment_scheduler" data-field="x_WhereDidYouHear" data-value-separator="<?php echo $view_appointment_scheduler->WhereDidYouHear->displayValueSeparatorAttribute() ?>" name="x_WhereDidYouHear[]" id="x_WhereDidYouHear[]" value="{value}"<?php echo $view_appointment_scheduler->WhereDidYouHear->editAttributes() ?>></div>
<div id="dsl_x_WhereDidYouHear" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_appointment_scheduler->WhereDidYouHear->checkBoxListHtml(FALSE, "x_WhereDidYouHear[]") ?>
</div></div>
<?php echo $view_appointment_scheduler->WhereDidYouHear->Lookup->getParamTag("p_x_WhereDidYouHear") ?>
</span>
<?php echo $view_appointment_scheduler->WhereDidYouHear->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler->PatientTypee->Visible) { // PatientTypee ?>
	<div id="r_PatientTypee" class="form-group row">
		<label for="x_PatientTypee" class="<?php echo $view_appointment_scheduler_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_PatientTypee" id="u_PatientTypee" class="form-check-input ew-multi-select" value="1"<?php echo ($view_appointment_scheduler->PatientTypee->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_PatientTypee"><?php echo $view_appointment_scheduler->PatientTypee->caption() ?></label></div></label>
		<div class="<?php echo $view_appointment_scheduler_update->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler->PatientTypee->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_PatientTypee">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_appointment_scheduler" data-field="x_PatientTypee" data-value-separator="<?php echo $view_appointment_scheduler->PatientTypee->displayValueSeparatorAttribute() ?>" id="x_PatientTypee" name="x_PatientTypee"<?php echo $view_appointment_scheduler->PatientTypee->editAttributes() ?>>
		<?php echo $view_appointment_scheduler->PatientTypee->selectOptionListHtml("x_PatientTypee") ?>
	</select>
</div>
<?php echo $view_appointment_scheduler->PatientTypee->Lookup->getParamTag("p_x_PatientTypee") ?>
</span>
<?php echo $view_appointment_scheduler->PatientTypee->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page -->
<?php if (!$view_appointment_scheduler_update->IsModal) { ?>
	<div class="form-group row"><!-- buttons .form-group -->
		<div class="<?php echo $view_appointment_scheduler_update->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("UpdateBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $view_appointment_scheduler_update->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
		</div><!-- /buttons offset -->
	</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$view_appointment_scheduler_update->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$view_appointment_scheduler_update->terminate();
?>