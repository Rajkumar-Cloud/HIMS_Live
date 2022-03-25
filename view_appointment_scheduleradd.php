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
$view_appointment_scheduler_add = new view_appointment_scheduler_add();

// Run the page
$view_appointment_scheduler_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_appointment_scheduler_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fview_appointment_scheduleradd = currentForm = new ew.Form("fview_appointment_scheduleradd", "add");

// Validate form
fview_appointment_scheduleradd.validate = function() {
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
		<?php if ($view_appointment_scheduler_add->patientID->Required) { ?>
			elm = this.getElements("x" + infix + "_patientID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->patientID->caption(), $view_appointment_scheduler->patientID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_add->patientName->Required) { ?>
			elm = this.getElements("x" + infix + "_patientName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->patientName->caption(), $view_appointment_scheduler->patientName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_add->MobileNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_MobileNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->MobileNumber->caption(), $view_appointment_scheduler->MobileNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_add->Purpose->Required) { ?>
			elm = this.getElements("x" + infix + "_Purpose");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->Purpose->caption(), $view_appointment_scheduler->Purpose->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_add->PatientType->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->PatientType->caption(), $view_appointment_scheduler->PatientType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_add->Referal->Required) { ?>
			elm = this.getElements("x" + infix + "_Referal");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->Referal->caption(), $view_appointment_scheduler->Referal->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_add->start_date->Required) { ?>
			elm = this.getElements("x" + infix + "_start_date");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->start_date->caption(), $view_appointment_scheduler->start_date->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_start_date");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_appointment_scheduler->start_date->errorMessage()) ?>");
		<?php if ($view_appointment_scheduler_add->DoctorName->Required) { ?>
			elm = this.getElements("x" + infix + "_DoctorName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->DoctorName->caption(), $view_appointment_scheduler->DoctorName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_add->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->HospID->caption(), $view_appointment_scheduler->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_add->end_date->Required) { ?>
			elm = this.getElements("x" + infix + "_end_date");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->end_date->caption(), $view_appointment_scheduler->end_date->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_end_date");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_appointment_scheduler->end_date->errorMessage()) ?>");
		<?php if ($view_appointment_scheduler_add->DoctorID->Required) { ?>
			elm = this.getElements("x" + infix + "_DoctorID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->DoctorID->caption(), $view_appointment_scheduler->DoctorID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_add->DoctorCode->Required) { ?>
			elm = this.getElements("x" + infix + "_DoctorCode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->DoctorCode->caption(), $view_appointment_scheduler->DoctorCode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_add->Department->Required) { ?>
			elm = this.getElements("x" + infix + "_Department");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->Department->caption(), $view_appointment_scheduler->Department->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_add->AppointmentStatus->Required) { ?>
			elm = this.getElements("x" + infix + "_AppointmentStatus");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->AppointmentStatus->caption(), $view_appointment_scheduler->AppointmentStatus->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_add->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->status->caption(), $view_appointment_scheduler->status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_add->scheduler_id->Required) { ?>
			elm = this.getElements("x" + infix + "_scheduler_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->scheduler_id->caption(), $view_appointment_scheduler->scheduler_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_add->text->Required) { ?>
			elm = this.getElements("x" + infix + "_text");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->text->caption(), $view_appointment_scheduler->text->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_add->appointment_status->Required) { ?>
			elm = this.getElements("x" + infix + "_appointment_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->appointment_status->caption(), $view_appointment_scheduler->appointment_status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_add->PId->Required) { ?>
			elm = this.getElements("x" + infix + "_PId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->PId->caption(), $view_appointment_scheduler->PId->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PId");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_appointment_scheduler->PId->errorMessage()) ?>");
		<?php if ($view_appointment_scheduler_add->SchEmail->Required) { ?>
			elm = this.getElements("x" + infix + "_SchEmail");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->SchEmail->caption(), $view_appointment_scheduler->SchEmail->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_add->appointment_type->Required) { ?>
			elm = this.getElements("x" + infix + "_appointment_type");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->appointment_type->caption(), $view_appointment_scheduler->appointment_type->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_add->Notified->Required) { ?>
			elm = this.getElements("x" + infix + "_Notified[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->Notified->caption(), $view_appointment_scheduler->Notified->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_add->Notes->Required) { ?>
			elm = this.getElements("x" + infix + "_Notes");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->Notes->caption(), $view_appointment_scheduler->Notes->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_add->paymentType->Required) { ?>
			elm = this.getElements("x" + infix + "_paymentType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->paymentType->caption(), $view_appointment_scheduler->paymentType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_add->WhereDidYouHear->Required) { ?>
			elm = this.getElements("x" + infix + "_WhereDidYouHear[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->WhereDidYouHear->caption(), $view_appointment_scheduler->WhereDidYouHear->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_add->createdBy->Required) { ?>
			elm = this.getElements("x" + infix + "_createdBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->createdBy->caption(), $view_appointment_scheduler->createdBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_add->createdDateTime->Required) { ?>
			elm = this.getElements("x" + infix + "_createdDateTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->createdDateTime->caption(), $view_appointment_scheduler->createdDateTime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_add->PatientTypee->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientTypee");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler->PatientTypee->caption(), $view_appointment_scheduler->PatientTypee->RequiredErrorMessage)) ?>");
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
fview_appointment_scheduleradd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_appointment_scheduleradd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_appointment_scheduleradd.lists["x_patientID"] = <?php echo $view_appointment_scheduler_add->patientID->Lookup->toClientList() ?>;
fview_appointment_scheduleradd.lists["x_patientID"].options = <?php echo JsonEncode($view_appointment_scheduler_add->patientID->lookupOptions()) ?>;
fview_appointment_scheduleradd.lists["x_PatientType"] = <?php echo $view_appointment_scheduler_add->PatientType->Lookup->toClientList() ?>;
fview_appointment_scheduleradd.lists["x_PatientType"].options = <?php echo JsonEncode($view_appointment_scheduler_add->PatientType->options(FALSE, TRUE)) ?>;
fview_appointment_scheduleradd.lists["x_Referal"] = <?php echo $view_appointment_scheduler_add->Referal->Lookup->toClientList() ?>;
fview_appointment_scheduleradd.lists["x_Referal"].options = <?php echo JsonEncode($view_appointment_scheduler_add->Referal->lookupOptions()) ?>;
fview_appointment_scheduleradd.lists["x_DoctorName"] = <?php echo $view_appointment_scheduler_add->DoctorName->Lookup->toClientList() ?>;
fview_appointment_scheduleradd.lists["x_DoctorName"].options = <?php echo JsonEncode($view_appointment_scheduler_add->DoctorName->lookupOptions()) ?>;
fview_appointment_scheduleradd.lists["x_status[]"] = <?php echo $view_appointment_scheduler_add->status->Lookup->toClientList() ?>;
fview_appointment_scheduleradd.lists["x_status[]"].options = <?php echo JsonEncode($view_appointment_scheduler_add->status->options(FALSE, TRUE)) ?>;
fview_appointment_scheduleradd.lists["x_appointment_type"] = <?php echo $view_appointment_scheduler_add->appointment_type->Lookup->toClientList() ?>;
fview_appointment_scheduleradd.lists["x_appointment_type"].options = <?php echo JsonEncode($view_appointment_scheduler_add->appointment_type->options(FALSE, TRUE)) ?>;
fview_appointment_scheduleradd.lists["x_Notified[]"] = <?php echo $view_appointment_scheduler_add->Notified->Lookup->toClientList() ?>;
fview_appointment_scheduleradd.lists["x_Notified[]"].options = <?php echo JsonEncode($view_appointment_scheduler_add->Notified->options(FALSE, TRUE)) ?>;
fview_appointment_scheduleradd.lists["x_WhereDidYouHear[]"] = <?php echo $view_appointment_scheduler_add->WhereDidYouHear->Lookup->toClientList() ?>;
fview_appointment_scheduleradd.lists["x_WhereDidYouHear[]"].options = <?php echo JsonEncode($view_appointment_scheduler_add->WhereDidYouHear->lookupOptions()) ?>;
fview_appointment_scheduleradd.lists["x_PatientTypee"] = <?php echo $view_appointment_scheduler_add->PatientTypee->Lookup->toClientList() ?>;
fview_appointment_scheduleradd.lists["x_PatientTypee"].options = <?php echo JsonEncode($view_appointment_scheduler_add->PatientTypee->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $view_appointment_scheduler_add->showPageHeader(); ?>
<?php
$view_appointment_scheduler_add->showMessage();
?>
<form name="fview_appointment_scheduleradd" id="fview_appointment_scheduleradd" class="<?php echo $view_appointment_scheduler_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_appointment_scheduler_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_appointment_scheduler_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_appointment_scheduler">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$view_appointment_scheduler_add->IsModal ?>">
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($view_appointment_scheduler->patientID->Visible) { // patientID ?>
	<div id="r_patientID" class="form-group row">
		<label id="elh_view_appointment_scheduler_patientID" for="x_patientID" class="<?php echo $view_appointment_scheduler_add->LeftColumnClass ?>"><script id="tpc_view_appointment_scheduler_patientID" class="view_appointment_scheduleradd" type="text/html"><span><?php echo $view_appointment_scheduler->patientID->caption() ?><?php echo ($view_appointment_scheduler->patientID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_appointment_scheduler_add->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler->patientID->cellAttributes() ?>>
<script id="tpx_view_appointment_scheduler_patientID" class="view_appointment_scheduleradd" type="text/html">
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
</script>
<?php echo $view_appointment_scheduler->patientID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler->patientName->Visible) { // patientName ?>
	<div id="r_patientName" class="form-group row">
		<label id="elh_view_appointment_scheduler_patientName" for="x_patientName" class="<?php echo $view_appointment_scheduler_add->LeftColumnClass ?>"><script id="tpc_view_appointment_scheduler_patientName" class="view_appointment_scheduleradd" type="text/html"><span><?php echo $view_appointment_scheduler->patientName->caption() ?><?php echo ($view_appointment_scheduler->patientName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_appointment_scheduler_add->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler->patientName->cellAttributes() ?>>
<script id="tpx_view_appointment_scheduler_patientName" class="view_appointment_scheduleradd" type="text/html">
<span id="el_view_appointment_scheduler_patientName">
<input type="text" data-table="view_appointment_scheduler" data-field="x_patientName" name="x_patientName" id="x_patientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler->patientName->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler->patientName->EditValue ?>"<?php echo $view_appointment_scheduler->patientName->editAttributes() ?>>
</span>
</script>
<?php echo $view_appointment_scheduler->patientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler->MobileNumber->Visible) { // MobileNumber ?>
	<div id="r_MobileNumber" class="form-group row">
		<label id="elh_view_appointment_scheduler_MobileNumber" for="x_MobileNumber" class="<?php echo $view_appointment_scheduler_add->LeftColumnClass ?>"><script id="tpc_view_appointment_scheduler_MobileNumber" class="view_appointment_scheduleradd" type="text/html"><span><?php echo $view_appointment_scheduler->MobileNumber->caption() ?><?php echo ($view_appointment_scheduler->MobileNumber->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_appointment_scheduler_add->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler->MobileNumber->cellAttributes() ?>>
<script id="tpx_view_appointment_scheduler_MobileNumber" class="view_appointment_scheduleradd" type="text/html">
<span id="el_view_appointment_scheduler_MobileNumber">
<input type="text" data-table="view_appointment_scheduler" data-field="x_MobileNumber" name="x_MobileNumber" id="x_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler->MobileNumber->EditValue ?>"<?php echo $view_appointment_scheduler->MobileNumber->editAttributes() ?>>
</span>
</script>
<?php echo $view_appointment_scheduler->MobileNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler->Purpose->Visible) { // Purpose ?>
	<div id="r_Purpose" class="form-group row">
		<label id="elh_view_appointment_scheduler_Purpose" for="x_Purpose" class="<?php echo $view_appointment_scheduler_add->LeftColumnClass ?>"><script id="tpc_view_appointment_scheduler_Purpose" class="view_appointment_scheduleradd" type="text/html"><span><?php echo $view_appointment_scheduler->Purpose->caption() ?><?php echo ($view_appointment_scheduler->Purpose->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_appointment_scheduler_add->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler->Purpose->cellAttributes() ?>>
<script id="tpx_view_appointment_scheduler_Purpose" class="view_appointment_scheduleradd" type="text/html">
<span id="el_view_appointment_scheduler_Purpose">
<input type="text" data-table="view_appointment_scheduler" data-field="x_Purpose" name="x_Purpose" id="x_Purpose" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler->Purpose->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler->Purpose->EditValue ?>"<?php echo $view_appointment_scheduler->Purpose->editAttributes() ?>>
</span>
</script>
<?php echo $view_appointment_scheduler->Purpose->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler->PatientType->Visible) { // PatientType ?>
	<div id="r_PatientType" class="form-group row">
		<label id="elh_view_appointment_scheduler_PatientType" class="<?php echo $view_appointment_scheduler_add->LeftColumnClass ?>"><script id="tpc_view_appointment_scheduler_PatientType" class="view_appointment_scheduleradd" type="text/html"><span><?php echo $view_appointment_scheduler->PatientType->caption() ?><?php echo ($view_appointment_scheduler->PatientType->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_appointment_scheduler_add->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler->PatientType->cellAttributes() ?>>
<script id="tpx_view_appointment_scheduler_PatientType" class="view_appointment_scheduleradd" type="text/html">
<span id="el_view_appointment_scheduler_PatientType">
<?php $view_appointment_scheduler->PatientType->EditAttrs["onclick"] = "ew.updateOptions.call(this); " . @$view_appointment_scheduler->PatientType->EditAttrs["onclick"]; ?>
<div id="tp_x_PatientType" class="ew-template"><input type="radio" class="form-check-input" data-table="view_appointment_scheduler" data-field="x_PatientType" data-value-separator="<?php echo $view_appointment_scheduler->PatientType->displayValueSeparatorAttribute() ?>" name="x_PatientType" id="x_PatientType" value="{value}"<?php echo $view_appointment_scheduler->PatientType->editAttributes() ?>></div>
<div id="dsl_x_PatientType" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_appointment_scheduler->PatientType->radioButtonListHtml(FALSE, "x_PatientType") ?>
</div></div>
</span>
</script>
<?php echo $view_appointment_scheduler->PatientType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler->Referal->Visible) { // Referal ?>
	<div id="r_Referal" class="form-group row">
		<label id="elh_view_appointment_scheduler_Referal" for="x_Referal" class="<?php echo $view_appointment_scheduler_add->LeftColumnClass ?>"><script id="tpc_view_appointment_scheduler_Referal" class="view_appointment_scheduleradd" type="text/html"><span><?php echo $view_appointment_scheduler->Referal->caption() ?><?php echo ($view_appointment_scheduler->Referal->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_appointment_scheduler_add->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler->Referal->cellAttributes() ?>>
<script id="tpx_view_appointment_scheduler_Referal" class="view_appointment_scheduleradd" type="text/html">
<span id="el_view_appointment_scheduler_Referal">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Referal"><?php echo strval($view_appointment_scheduler->Referal->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($view_appointment_scheduler->Referal->ViewValue) : $view_appointment_scheduler->Referal->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_appointment_scheduler->Referal->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($view_appointment_scheduler->Referal->ReadOnly || $view_appointment_scheduler->Referal->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_Referal',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
<?php if (AllowAdd(CurrentProjectID() . "mas_reference_type") && !$view_appointment_scheduler->Referal->ReadOnly) { ?>
<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_Referal" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $view_appointment_scheduler->Referal->caption() ?>" data-title="<?php echo $view_appointment_scheduler->Referal->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_Referal',url:'mas_reference_typeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button>
<?php } ?>
	</div>
</div>
<?php echo $view_appointment_scheduler->Referal->Lookup->getParamTag("p_x_Referal") ?>
<input type="hidden" data-table="view_appointment_scheduler" data-field="x_Referal" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_appointment_scheduler->Referal->displayValueSeparatorAttribute() ?>" name="x_Referal" id="x_Referal" value="<?php echo $view_appointment_scheduler->Referal->CurrentValue ?>"<?php echo $view_appointment_scheduler->Referal->editAttributes() ?>>
</span>
</script>
<?php echo $view_appointment_scheduler->Referal->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler->start_date->Visible) { // start_date ?>
	<div id="r_start_date" class="form-group row">
		<label id="elh_view_appointment_scheduler_start_date" for="x_start_date" class="<?php echo $view_appointment_scheduler_add->LeftColumnClass ?>"><script id="tpc_view_appointment_scheduler_start_date" class="view_appointment_scheduleradd" type="text/html"><span><?php echo $view_appointment_scheduler->start_date->caption() ?><?php echo ($view_appointment_scheduler->start_date->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_appointment_scheduler_add->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler->start_date->cellAttributes() ?>>
<script id="tpx_view_appointment_scheduler_start_date" class="view_appointment_scheduleradd" type="text/html">
<span id="el_view_appointment_scheduler_start_date">
<input type="text" data-table="view_appointment_scheduler" data-field="x_start_date" data-format="11" name="x_start_date" id="x_start_date" placeholder="<?php echo HtmlEncode($view_appointment_scheduler->start_date->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler->start_date->EditValue ?>"<?php echo $view_appointment_scheduler->start_date->editAttributes() ?>>
<?php if (!$view_appointment_scheduler->start_date->ReadOnly && !$view_appointment_scheduler->start_date->Disabled && !isset($view_appointment_scheduler->start_date->EditAttrs["readonly"]) && !isset($view_appointment_scheduler->start_date->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="view_appointment_scheduleradd_js">
ew.createDateTimePicker("fview_appointment_scheduleradd", "x_start_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php echo $view_appointment_scheduler->start_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler->DoctorName->Visible) { // DoctorName ?>
	<div id="r_DoctorName" class="form-group row">
		<label id="elh_view_appointment_scheduler_DoctorName" for="x_DoctorName" class="<?php echo $view_appointment_scheduler_add->LeftColumnClass ?>"><script id="tpc_view_appointment_scheduler_DoctorName" class="view_appointment_scheduleradd" type="text/html"><span><?php echo $view_appointment_scheduler->DoctorName->caption() ?><?php echo ($view_appointment_scheduler->DoctorName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_appointment_scheduler_add->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler->DoctorName->cellAttributes() ?>>
<script id="tpx_view_appointment_scheduler_DoctorName" class="view_appointment_scheduleradd" type="text/html">
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
</script>
<?php echo $view_appointment_scheduler->DoctorName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler->end_date->Visible) { // end_date ?>
	<div id="r_end_date" class="form-group row">
		<label id="elh_view_appointment_scheduler_end_date" for="x_end_date" class="<?php echo $view_appointment_scheduler_add->LeftColumnClass ?>"><script id="tpc_view_appointment_scheduler_end_date" class="view_appointment_scheduleradd" type="text/html"><span><?php echo $view_appointment_scheduler->end_date->caption() ?><?php echo ($view_appointment_scheduler->end_date->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_appointment_scheduler_add->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler->end_date->cellAttributes() ?>>
<script id="tpx_view_appointment_scheduler_end_date" class="view_appointment_scheduleradd" type="text/html">
<span id="el_view_appointment_scheduler_end_date">
<input type="text" data-table="view_appointment_scheduler" data-field="x_end_date" data-format="11" name="x_end_date" id="x_end_date" placeholder="<?php echo HtmlEncode($view_appointment_scheduler->end_date->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler->end_date->EditValue ?>"<?php echo $view_appointment_scheduler->end_date->editAttributes() ?>>
<?php if (!$view_appointment_scheduler->end_date->ReadOnly && !$view_appointment_scheduler->end_date->Disabled && !isset($view_appointment_scheduler->end_date->EditAttrs["readonly"]) && !isset($view_appointment_scheduler->end_date->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="view_appointment_scheduleradd_js">
ew.createDateTimePicker("fview_appointment_scheduleradd", "x_end_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php echo $view_appointment_scheduler->end_date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler->DoctorID->Visible) { // DoctorID ?>
	<div id="r_DoctorID" class="form-group row">
		<label id="elh_view_appointment_scheduler_DoctorID" for="x_DoctorID" class="<?php echo $view_appointment_scheduler_add->LeftColumnClass ?>"><script id="tpc_view_appointment_scheduler_DoctorID" class="view_appointment_scheduleradd" type="text/html"><span><?php echo $view_appointment_scheduler->DoctorID->caption() ?><?php echo ($view_appointment_scheduler->DoctorID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_appointment_scheduler_add->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler->DoctorID->cellAttributes() ?>>
<script id="tpx_view_appointment_scheduler_DoctorID" class="view_appointment_scheduleradd" type="text/html">
<span id="el_view_appointment_scheduler_DoctorID">
<input type="text" data-table="view_appointment_scheduler" data-field="x_DoctorID" name="x_DoctorID" id="x_DoctorID" size="3" maxlength="5" placeholder="<?php echo HtmlEncode($view_appointment_scheduler->DoctorID->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler->DoctorID->EditValue ?>"<?php echo $view_appointment_scheduler->DoctorID->editAttributes() ?>>
</span>
</script>
<?php echo $view_appointment_scheduler->DoctorID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler->DoctorCode->Visible) { // DoctorCode ?>
	<div id="r_DoctorCode" class="form-group row">
		<label id="elh_view_appointment_scheduler_DoctorCode" for="x_DoctorCode" class="<?php echo $view_appointment_scheduler_add->LeftColumnClass ?>"><script id="tpc_view_appointment_scheduler_DoctorCode" class="view_appointment_scheduleradd" type="text/html"><span><?php echo $view_appointment_scheduler->DoctorCode->caption() ?><?php echo ($view_appointment_scheduler->DoctorCode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_appointment_scheduler_add->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler->DoctorCode->cellAttributes() ?>>
<script id="tpx_view_appointment_scheduler_DoctorCode" class="view_appointment_scheduleradd" type="text/html">
<span id="el_view_appointment_scheduler_DoctorCode">
<input type="text" data-table="view_appointment_scheduler" data-field="x_DoctorCode" name="x_DoctorCode" id="x_DoctorCode" size="5" maxlength="7" placeholder="<?php echo HtmlEncode($view_appointment_scheduler->DoctorCode->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler->DoctorCode->EditValue ?>"<?php echo $view_appointment_scheduler->DoctorCode->editAttributes() ?>>
</span>
</script>
<?php echo $view_appointment_scheduler->DoctorCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler->Department->Visible) { // Department ?>
	<div id="r_Department" class="form-group row">
		<label id="elh_view_appointment_scheduler_Department" for="x_Department" class="<?php echo $view_appointment_scheduler_add->LeftColumnClass ?>"><script id="tpc_view_appointment_scheduler_Department" class="view_appointment_scheduleradd" type="text/html"><span><?php echo $view_appointment_scheduler->Department->caption() ?><?php echo ($view_appointment_scheduler->Department->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_appointment_scheduler_add->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler->Department->cellAttributes() ?>>
<script id="tpx_view_appointment_scheduler_Department" class="view_appointment_scheduleradd" type="text/html">
<span id="el_view_appointment_scheduler_Department">
<input type="text" data-table="view_appointment_scheduler" data-field="x_Department" name="x_Department" id="x_Department" size="8" maxlength="15" placeholder="<?php echo HtmlEncode($view_appointment_scheduler->Department->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler->Department->EditValue ?>"<?php echo $view_appointment_scheduler->Department->editAttributes() ?>>
</span>
</script>
<?php echo $view_appointment_scheduler->Department->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler->AppointmentStatus->Visible) { // AppointmentStatus ?>
	<div id="r_AppointmentStatus" class="form-group row">
		<label id="elh_view_appointment_scheduler_AppointmentStatus" for="x_AppointmentStatus" class="<?php echo $view_appointment_scheduler_add->LeftColumnClass ?>"><script id="tpc_view_appointment_scheduler_AppointmentStatus" class="view_appointment_scheduleradd" type="text/html"><span><?php echo $view_appointment_scheduler->AppointmentStatus->caption() ?><?php echo ($view_appointment_scheduler->AppointmentStatus->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_appointment_scheduler_add->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler->AppointmentStatus->cellAttributes() ?>>
<script id="tpx_view_appointment_scheduler_AppointmentStatus" class="view_appointment_scheduleradd" type="text/html">
<span id="el_view_appointment_scheduler_AppointmentStatus">
<input type="text" data-table="view_appointment_scheduler" data-field="x_AppointmentStatus" name="x_AppointmentStatus" id="x_AppointmentStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler->AppointmentStatus->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler->AppointmentStatus->EditValue ?>"<?php echo $view_appointment_scheduler->AppointmentStatus->editAttributes() ?>>
</span>
</script>
<?php echo $view_appointment_scheduler->AppointmentStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_view_appointment_scheduler_status" class="<?php echo $view_appointment_scheduler_add->LeftColumnClass ?>"><script id="tpc_view_appointment_scheduler_status" class="view_appointment_scheduleradd" type="text/html"><span><?php echo $view_appointment_scheduler->status->caption() ?><?php echo ($view_appointment_scheduler->status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_appointment_scheduler_add->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler->status->cellAttributes() ?>>
<script id="tpx_view_appointment_scheduler_status" class="view_appointment_scheduleradd" type="text/html">
<span id="el_view_appointment_scheduler_status">
<div id="tp_x_status" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_appointment_scheduler" data-field="x_status" data-value-separator="<?php echo $view_appointment_scheduler->status->displayValueSeparatorAttribute() ?>" name="x_status[]" id="x_status[]" value="{value}"<?php echo $view_appointment_scheduler->status->editAttributes() ?>></div>
<div id="dsl_x_status" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_appointment_scheduler->status->checkBoxListHtml(FALSE, "x_status[]") ?>
</div></div>
</span>
</script>
<?php echo $view_appointment_scheduler->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler->scheduler_id->Visible) { // scheduler_id ?>
	<div id="r_scheduler_id" class="form-group row">
		<label id="elh_view_appointment_scheduler_scheduler_id" for="x_scheduler_id" class="<?php echo $view_appointment_scheduler_add->LeftColumnClass ?>"><script id="tpc_view_appointment_scheduler_scheduler_id" class="view_appointment_scheduleradd" type="text/html"><span><?php echo $view_appointment_scheduler->scheduler_id->caption() ?><?php echo ($view_appointment_scheduler->scheduler_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_appointment_scheduler_add->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler->scheduler_id->cellAttributes() ?>>
<script id="tpx_view_appointment_scheduler_scheduler_id" class="view_appointment_scheduleradd" type="text/html">
<span id="el_view_appointment_scheduler_scheduler_id">
<input type="text" data-table="view_appointment_scheduler" data-field="x_scheduler_id" name="x_scheduler_id" id="x_scheduler_id" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler->scheduler_id->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler->scheduler_id->EditValue ?>"<?php echo $view_appointment_scheduler->scheduler_id->editAttributes() ?>>
</span>
</script>
<?php echo $view_appointment_scheduler->scheduler_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler->text->Visible) { // text ?>
	<div id="r_text" class="form-group row">
		<label id="elh_view_appointment_scheduler_text" for="x_text" class="<?php echo $view_appointment_scheduler_add->LeftColumnClass ?>"><script id="tpc_view_appointment_scheduler_text" class="view_appointment_scheduleradd" type="text/html"><span><?php echo $view_appointment_scheduler->text->caption() ?><?php echo ($view_appointment_scheduler->text->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_appointment_scheduler_add->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler->text->cellAttributes() ?>>
<script id="tpx_view_appointment_scheduler_text" class="view_appointment_scheduleradd" type="text/html">
<span id="el_view_appointment_scheduler_text">
<input type="text" data-table="view_appointment_scheduler" data-field="x_text" name="x_text" id="x_text" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler->text->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler->text->EditValue ?>"<?php echo $view_appointment_scheduler->text->editAttributes() ?>>
</span>
</script>
<?php echo $view_appointment_scheduler->text->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler->appointment_status->Visible) { // appointment_status ?>
	<div id="r_appointment_status" class="form-group row">
		<label id="elh_view_appointment_scheduler_appointment_status" for="x_appointment_status" class="<?php echo $view_appointment_scheduler_add->LeftColumnClass ?>"><script id="tpc_view_appointment_scheduler_appointment_status" class="view_appointment_scheduleradd" type="text/html"><span><?php echo $view_appointment_scheduler->appointment_status->caption() ?><?php echo ($view_appointment_scheduler->appointment_status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_appointment_scheduler_add->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler->appointment_status->cellAttributes() ?>>
<script id="tpx_view_appointment_scheduler_appointment_status" class="view_appointment_scheduleradd" type="text/html">
<span id="el_view_appointment_scheduler_appointment_status">
<input type="text" data-table="view_appointment_scheduler" data-field="x_appointment_status" name="x_appointment_status" id="x_appointment_status" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler->appointment_status->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler->appointment_status->EditValue ?>"<?php echo $view_appointment_scheduler->appointment_status->editAttributes() ?>>
</span>
</script>
<?php echo $view_appointment_scheduler->appointment_status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler->PId->Visible) { // PId ?>
	<div id="r_PId" class="form-group row">
		<label id="elh_view_appointment_scheduler_PId" for="x_PId" class="<?php echo $view_appointment_scheduler_add->LeftColumnClass ?>"><script id="tpc_view_appointment_scheduler_PId" class="view_appointment_scheduleradd" type="text/html"><span><?php echo $view_appointment_scheduler->PId->caption() ?><?php echo ($view_appointment_scheduler->PId->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_appointment_scheduler_add->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler->PId->cellAttributes() ?>>
<script id="tpx_view_appointment_scheduler_PId" class="view_appointment_scheduleradd" type="text/html">
<span id="el_view_appointment_scheduler_PId">
<input type="text" data-table="view_appointment_scheduler" data-field="x_PId" name="x_PId" id="x_PId" size="30" placeholder="<?php echo HtmlEncode($view_appointment_scheduler->PId->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler->PId->EditValue ?>"<?php echo $view_appointment_scheduler->PId->editAttributes() ?>>
</span>
</script>
<?php echo $view_appointment_scheduler->PId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler->SchEmail->Visible) { // SchEmail ?>
	<div id="r_SchEmail" class="form-group row">
		<label id="elh_view_appointment_scheduler_SchEmail" for="x_SchEmail" class="<?php echo $view_appointment_scheduler_add->LeftColumnClass ?>"><script id="tpc_view_appointment_scheduler_SchEmail" class="view_appointment_scheduleradd" type="text/html"><span><?php echo $view_appointment_scheduler->SchEmail->caption() ?><?php echo ($view_appointment_scheduler->SchEmail->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_appointment_scheduler_add->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler->SchEmail->cellAttributes() ?>>
<script id="tpx_view_appointment_scheduler_SchEmail" class="view_appointment_scheduleradd" type="text/html">
<span id="el_view_appointment_scheduler_SchEmail">
<input type="text" data-table="view_appointment_scheduler" data-field="x_SchEmail" name="x_SchEmail" id="x_SchEmail" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler->SchEmail->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler->SchEmail->EditValue ?>"<?php echo $view_appointment_scheduler->SchEmail->editAttributes() ?>>
</span>
</script>
<?php echo $view_appointment_scheduler->SchEmail->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler->appointment_type->Visible) { // appointment_type ?>
	<div id="r_appointment_type" class="form-group row">
		<label id="elh_view_appointment_scheduler_appointment_type" class="<?php echo $view_appointment_scheduler_add->LeftColumnClass ?>"><script id="tpc_view_appointment_scheduler_appointment_type" class="view_appointment_scheduleradd" type="text/html"><span><?php echo $view_appointment_scheduler->appointment_type->caption() ?><?php echo ($view_appointment_scheduler->appointment_type->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_appointment_scheduler_add->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler->appointment_type->cellAttributes() ?>>
<script id="tpx_view_appointment_scheduler_appointment_type" class="view_appointment_scheduleradd" type="text/html">
<span id="el_view_appointment_scheduler_appointment_type">
<div id="tp_x_appointment_type" class="ew-template"><input type="radio" class="form-check-input" data-table="view_appointment_scheduler" data-field="x_appointment_type" data-value-separator="<?php echo $view_appointment_scheduler->appointment_type->displayValueSeparatorAttribute() ?>" name="x_appointment_type" id="x_appointment_type" value="{value}"<?php echo $view_appointment_scheduler->appointment_type->editAttributes() ?>></div>
<div id="dsl_x_appointment_type" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_appointment_scheduler->appointment_type->radioButtonListHtml(FALSE, "x_appointment_type") ?>
</div></div>
</span>
</script>
<?php echo $view_appointment_scheduler->appointment_type->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler->Notified->Visible) { // Notified ?>
	<div id="r_Notified" class="form-group row">
		<label id="elh_view_appointment_scheduler_Notified" class="<?php echo $view_appointment_scheduler_add->LeftColumnClass ?>"><script id="tpc_view_appointment_scheduler_Notified" class="view_appointment_scheduleradd" type="text/html"><span><?php echo $view_appointment_scheduler->Notified->caption() ?><?php echo ($view_appointment_scheduler->Notified->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_appointment_scheduler_add->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler->Notified->cellAttributes() ?>>
<script id="tpx_view_appointment_scheduler_Notified" class="view_appointment_scheduleradd" type="text/html">
<span id="el_view_appointment_scheduler_Notified">
<div id="tp_x_Notified" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_appointment_scheduler" data-field="x_Notified" data-value-separator="<?php echo $view_appointment_scheduler->Notified->displayValueSeparatorAttribute() ?>" name="x_Notified[]" id="x_Notified[]" value="{value}"<?php echo $view_appointment_scheduler->Notified->editAttributes() ?>></div>
<div id="dsl_x_Notified" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_appointment_scheduler->Notified->checkBoxListHtml(FALSE, "x_Notified[]") ?>
</div></div>
</span>
</script>
<?php echo $view_appointment_scheduler->Notified->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler->Notes->Visible) { // Notes ?>
	<div id="r_Notes" class="form-group row">
		<label id="elh_view_appointment_scheduler_Notes" for="x_Notes" class="<?php echo $view_appointment_scheduler_add->LeftColumnClass ?>"><script id="tpc_view_appointment_scheduler_Notes" class="view_appointment_scheduleradd" type="text/html"><span><?php echo $view_appointment_scheduler->Notes->caption() ?><?php echo ($view_appointment_scheduler->Notes->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_appointment_scheduler_add->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler->Notes->cellAttributes() ?>>
<script id="tpx_view_appointment_scheduler_Notes" class="view_appointment_scheduleradd" type="text/html">
<span id="el_view_appointment_scheduler_Notes">
<input type="text" data-table="view_appointment_scheduler" data-field="x_Notes" name="x_Notes" id="x_Notes" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler->Notes->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler->Notes->EditValue ?>"<?php echo $view_appointment_scheduler->Notes->editAttributes() ?>>
</span>
</script>
<?php echo $view_appointment_scheduler->Notes->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler->paymentType->Visible) { // paymentType ?>
	<div id="r_paymentType" class="form-group row">
		<label id="elh_view_appointment_scheduler_paymentType" for="x_paymentType" class="<?php echo $view_appointment_scheduler_add->LeftColumnClass ?>"><script id="tpc_view_appointment_scheduler_paymentType" class="view_appointment_scheduleradd" type="text/html"><span><?php echo $view_appointment_scheduler->paymentType->caption() ?><?php echo ($view_appointment_scheduler->paymentType->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_appointment_scheduler_add->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler->paymentType->cellAttributes() ?>>
<script id="tpx_view_appointment_scheduler_paymentType" class="view_appointment_scheduleradd" type="text/html">
<span id="el_view_appointment_scheduler_paymentType">
<input type="text" data-table="view_appointment_scheduler" data-field="x_paymentType" name="x_paymentType" id="x_paymentType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler->paymentType->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler->paymentType->EditValue ?>"<?php echo $view_appointment_scheduler->paymentType->editAttributes() ?>>
</span>
</script>
<?php echo $view_appointment_scheduler->paymentType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
	<div id="r_WhereDidYouHear" class="form-group row">
		<label id="elh_view_appointment_scheduler_WhereDidYouHear" class="<?php echo $view_appointment_scheduler_add->LeftColumnClass ?>"><script id="tpc_view_appointment_scheduler_WhereDidYouHear" class="view_appointment_scheduleradd" type="text/html"><span><?php echo $view_appointment_scheduler->WhereDidYouHear->caption() ?><?php echo ($view_appointment_scheduler->WhereDidYouHear->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_appointment_scheduler_add->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler->WhereDidYouHear->cellAttributes() ?>>
<script id="tpx_view_appointment_scheduler_WhereDidYouHear" class="view_appointment_scheduleradd" type="text/html">
<span id="el_view_appointment_scheduler_WhereDidYouHear">
<div id="tp_x_WhereDidYouHear" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_appointment_scheduler" data-field="x_WhereDidYouHear" data-value-separator="<?php echo $view_appointment_scheduler->WhereDidYouHear->displayValueSeparatorAttribute() ?>" name="x_WhereDidYouHear[]" id="x_WhereDidYouHear[]" value="{value}"<?php echo $view_appointment_scheduler->WhereDidYouHear->editAttributes() ?>></div>
<div id="dsl_x_WhereDidYouHear" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_appointment_scheduler->WhereDidYouHear->checkBoxListHtml(FALSE, "x_WhereDidYouHear[]") ?>
</div></div>
<?php echo $view_appointment_scheduler->WhereDidYouHear->Lookup->getParamTag("p_x_WhereDidYouHear") ?>
</span>
</script>
<?php echo $view_appointment_scheduler->WhereDidYouHear->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler->PatientTypee->Visible) { // PatientTypee ?>
	<div id="r_PatientTypee" class="form-group row">
		<label id="elh_view_appointment_scheduler_PatientTypee" for="x_PatientTypee" class="<?php echo $view_appointment_scheduler_add->LeftColumnClass ?>"><script id="tpc_view_appointment_scheduler_PatientTypee" class="view_appointment_scheduleradd" type="text/html"><span><?php echo $view_appointment_scheduler->PatientTypee->caption() ?><?php echo ($view_appointment_scheduler->PatientTypee->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_appointment_scheduler_add->RightColumnClass ?>"><div<?php echo $view_appointment_scheduler->PatientTypee->cellAttributes() ?>>
<script id="tpx_view_appointment_scheduler_PatientTypee" class="view_appointment_scheduleradd" type="text/html">
<span id="el_view_appointment_scheduler_PatientTypee">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_appointment_scheduler" data-field="x_PatientTypee" data-value-separator="<?php echo $view_appointment_scheduler->PatientTypee->displayValueSeparatorAttribute() ?>" id="x_PatientTypee" name="x_PatientTypee"<?php echo $view_appointment_scheduler->PatientTypee->editAttributes() ?>>
		<?php echo $view_appointment_scheduler->PatientTypee->selectOptionListHtml("x_PatientTypee") ?>
	</select>
</div>
<?php echo $view_appointment_scheduler->PatientTypee->Lookup->getParamTag("p_x_PatientTypee") ?>
</span>
</script>
<?php echo $view_appointment_scheduler->PatientTypee->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_view_appointment_scheduleradd" class="ew-custom-template"></div>
<script id="tpm_view_appointment_scheduleradd" type="text/html">
<div id="ct_view_appointment_scheduler_add"><style type="text/css" >
.form-control {
	display: table;
	max-width: none;
}
.form-control:not(textarea) {
	width: -webkit-fill-available;
}
input[type=text]:not([size]):not([name=pageno]):not(.cke_dialog_ui_input_text):not(.form-control-plaintext), input[type=password]:not([size]) {
	min-width: 92%;
}
@media (min-width: 576px)
input[type=text]:not([size]):not([name=pageno]):not(.cke_dialog_ui_input_text):not(.form-control-plaintext), input[type=password]:not([size]) {
	min-width: 92%;
}
.input-group>.form-control.ew-lookup-text {
	width: 80%;
}
@media (min-width: 576px)
.input-group>.form-control.ew-lookup-text {
	width: 80%;
}
.input-group {
	position: relative;
	display: flex;
	flex-wrap: nowrap;
	align-items: stretch;
	width: 80%;
}
</style>
<table class="ew-table" style="width:100%;">
	 <tbody>
		<tr><td class="bg-warning text-warning">{{include tmpl="#tpc_view_appointment_scheduler_start_date"/}}&nbsp;{{include tmpl="#tpx_view_appointment_scheduler_start_date"/}}</td><td class="bg-warning text-warning">{{include tmpl="#tpc_view_appointment_scheduler_end_date"/}}&nbsp;{{include tmpl="#tpx_view_appointment_scheduler_end_date"/}}</td><td>{{include tmpl="#tpc_view_appointment_scheduler_PatientType"/}}&nbsp;{{include tmpl="#tpx_view_appointment_scheduler_PatientType"/}}</td></tr>
	</tbody>
</table>
<table class="ew-table"  style="width:100%;">
	 <tbody>
	 	<tr>
		<td>{{include tmpl="#tpc_view_appointment_scheduler_patientID"/}}&nbsp;{{include tmpl="#tpx_view_appointment_scheduler_patientID"/}}</td><td>{{include tmpl="#tpc_view_appointment_scheduler_patientName"/}}&nbsp;{{include tmpl="#tpx_view_appointment_scheduler_patientName"/}}</td>
		<td>{{include tmpl="#tpc_view_appointment_scheduler_PatientTypee"/}}&nbsp;{{include tmpl="#tpx_view_appointment_scheduler_PatientTypee"/}}</td>
	</tr>
	</tbody>
</table>
<table id="addNewPatient" class="ew-table"  style="width:100%;background-color:#FF33A8;">
	 <tbody>	
		<tr>
			<td  name="addNewPatient">{{include tmpl="#tpx_tittle"/}}</td>
			<td>
			{{include tmpl="#tpx_gendar"/}}
</td>
			<td>
			{{include tmpl="#tpx_Dob"/}}
			</td>
			<td>
			{{include tmpl="#tpx_Age"/}}
			</td>
			<td>
			<a href="patientadd.php?pagetoredirect=appointment_scheduler" id="addNewPatientSer" name="addNewPatientSer" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">More</a>
			</td>
		</tr>
	</tbody>	
</table>
<table class="ew-table"  style="width:100%;">
	 <tbody>
		<tr><td>{{include tmpl="#tpc_view_appointment_scheduler_PId"/}}&nbsp;{{include tmpl="#tpx_view_appointment_scheduler_PId"/}}</td><td>{{include tmpl="#tpc_view_appointment_scheduler_MobileNumber"/}}&nbsp;{{include tmpl="#tpx_view_appointment_scheduler_MobileNumber"/}}</td></tr>
		<tr><td>{{include tmpl="#tpc_view_appointment_scheduler_SchEmail"/}}&nbsp;{{include tmpl="#tpx_view_appointment_scheduler_SchEmail"/}}</td><td>{{include tmpl="#tpc_view_appointment_scheduler_Notes"/}}&nbsp;{{include tmpl="#tpx_view_appointment_scheduler_Notes"/}}</td></tr>
	</tbody>
</table>
<table class="ew-table"  style="width:100%;">
	 <tbody>
		<tr><td class="bg-success text-success">{{include tmpl="#tpc_view_appointment_scheduler_DoctorID"/}}&nbsp;{{include tmpl="#tpx_view_appointment_scheduler_DoctorID"/}}</td><td class="bg-success text-success">{{include tmpl="#tpc_view_appointment_scheduler_DoctorName"/}}&nbsp;{{include tmpl="#tpx_view_appointment_scheduler_DoctorName"/}}</td>
		<td class="bg-success text-success">{{include tmpl="#tpc_view_appointment_scheduler_DoctorCode"/}}&nbsp;{{include tmpl="#tpx_view_appointment_scheduler_DoctorCode"/}}</td><td class="bg-success text-success">{{include tmpl="#tpc_view_appointment_scheduler_Department"/}}&nbsp;{{include tmpl="#tpx_view_appointment_scheduler_Department"/}}</td></tr>
	</tbody>
</table>
<table class="ew-table"  style="width:100%;">
	 <tbody>
		<tr><td class="bg-danger text-danger">{{include tmpl="#tpc_view_appointment_scheduler_Referal"/}}&nbsp;{{include tmpl="#tpx_view_appointment_scheduler_Referal"/}}</td><td class="bg-danger text-danger">{{include tmpl="#tpc_view_appointment_scheduler_Purpose"/}}&nbsp;{{include tmpl="#tpx_view_appointment_scheduler_Purpose"/}}</td></tr>
	</tbody>
</table>
<table class="ew-table"  style="width:100%;">
	 <tbody>	
		<tr>
			<td>{{include tmpl="#tpc_view_appointment_scheduler_WhereDidYouHear"/}}&nbsp;{{include tmpl="#tpx_view_appointment_scheduler_WhereDidYouHear"/}}</td>
		</tr>
		<tr>
			<td>{{include tmpl="#tpc_view_appointment_scheduler_status"/}}&nbsp;{{include tmpl="#tpx_view_appointment_scheduler_status"/}}</td>
		</tr>
	</tbody>
</table>
</div>
</script>
<?php if (!$view_appointment_scheduler_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $view_appointment_scheduler_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $view_appointment_scheduler_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($view_appointment_scheduler->Rows) ?> };
ew.applyTemplate("tpd_view_appointment_scheduleradd", "tpm_view_appointment_scheduleradd", "view_appointment_scheduleradd", "<?php echo $view_appointment_scheduler->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.view_appointment_scheduleradd_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$view_appointment_scheduler_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$view_appointment_scheduler_add->terminate();
?>