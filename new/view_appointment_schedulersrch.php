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
$view_appointment_scheduler_search = new view_appointment_scheduler_search();

// Run the page
$view_appointment_scheduler_search->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_appointment_scheduler_search->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fview_appointment_schedulersearch, currentPageID;
loadjs.ready("head", function() {

	// Form object for search
	<?php if ($view_appointment_scheduler_search->IsModal) { ?>
	fview_appointment_schedulersearch = currentAdvancedSearchForm = new ew.Form("fview_appointment_schedulersearch", "search");
	<?php } else { ?>
	fview_appointment_schedulersearch = currentForm = new ew.Form("fview_appointment_schedulersearch", "search");
	<?php } ?>
	currentPageID = ew.PAGE_ID = "search";

	// Validate function for search
	fview_appointment_schedulersearch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_id");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_appointment_scheduler_search->id->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_start_date");
		if (elm && !ew.checkEuroDate(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_appointment_scheduler_search->start_date->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_HospID");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_appointment_scheduler_search->HospID->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_end_date");
		if (elm && !ew.checkEuroDate(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_appointment_scheduler_search->end_date->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_PId");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_appointment_scheduler_search->PId->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_createdDateTime");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_appointment_scheduler_search->createdDateTime->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fview_appointment_schedulersearch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_appointment_schedulersearch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fview_appointment_schedulersearch.lists["x_patientID"] = <?php echo $view_appointment_scheduler_search->patientID->Lookup->toClientList($view_appointment_scheduler_search) ?>;
	fview_appointment_schedulersearch.lists["x_patientID"].options = <?php echo JsonEncode($view_appointment_scheduler_search->patientID->lookupOptions()) ?>;
	fview_appointment_schedulersearch.lists["x_PatientType"] = <?php echo $view_appointment_scheduler_search->PatientType->Lookup->toClientList($view_appointment_scheduler_search) ?>;
	fview_appointment_schedulersearch.lists["x_PatientType"].options = <?php echo JsonEncode($view_appointment_scheduler_search->PatientType->options(FALSE, TRUE)) ?>;
	fview_appointment_schedulersearch.lists["x_Referal"] = <?php echo $view_appointment_scheduler_search->Referal->Lookup->toClientList($view_appointment_scheduler_search) ?>;
	fview_appointment_schedulersearch.lists["x_Referal"].options = <?php echo JsonEncode($view_appointment_scheduler_search->Referal->lookupOptions()) ?>;
	fview_appointment_schedulersearch.lists["x_DoctorName"] = <?php echo $view_appointment_scheduler_search->DoctorName->Lookup->toClientList($view_appointment_scheduler_search) ?>;
	fview_appointment_schedulersearch.lists["x_DoctorName"].options = <?php echo JsonEncode($view_appointment_scheduler_search->DoctorName->lookupOptions()) ?>;
	fview_appointment_schedulersearch.lists["x_status[]"] = <?php echo $view_appointment_scheduler_search->status->Lookup->toClientList($view_appointment_scheduler_search) ?>;
	fview_appointment_schedulersearch.lists["x_status[]"].options = <?php echo JsonEncode($view_appointment_scheduler_search->status->options(FALSE, TRUE)) ?>;
	fview_appointment_schedulersearch.lists["x_appointment_type"] = <?php echo $view_appointment_scheduler_search->appointment_type->Lookup->toClientList($view_appointment_scheduler_search) ?>;
	fview_appointment_schedulersearch.lists["x_appointment_type"].options = <?php echo JsonEncode($view_appointment_scheduler_search->appointment_type->options(FALSE, TRUE)) ?>;
	fview_appointment_schedulersearch.lists["x_Notified[]"] = <?php echo $view_appointment_scheduler_search->Notified->Lookup->toClientList($view_appointment_scheduler_search) ?>;
	fview_appointment_schedulersearch.lists["x_Notified[]"].options = <?php echo JsonEncode($view_appointment_scheduler_search->Notified->options(FALSE, TRUE)) ?>;
	fview_appointment_schedulersearch.lists["x_WhereDidYouHear[]"] = <?php echo $view_appointment_scheduler_search->WhereDidYouHear->Lookup->toClientList($view_appointment_scheduler_search) ?>;
	fview_appointment_schedulersearch.lists["x_WhereDidYouHear[]"].options = <?php echo JsonEncode($view_appointment_scheduler_search->WhereDidYouHear->lookupOptions()) ?>;
	fview_appointment_schedulersearch.lists["x_PatientTypee"] = <?php echo $view_appointment_scheduler_search->PatientTypee->Lookup->toClientList($view_appointment_scheduler_search) ?>;
	fview_appointment_schedulersearch.lists["x_PatientTypee"].options = <?php echo JsonEncode($view_appointment_scheduler_search->PatientTypee->lookupOptions()) ?>;
	loadjs.done("fview_appointment_schedulersearch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $view_appointment_scheduler_search->showPageHeader(); ?>
<?php
$view_appointment_scheduler_search->showMessage();
?>
<form name="fview_appointment_schedulersearch" id="fview_appointment_schedulersearch" class="<?php echo $view_appointment_scheduler_search->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_appointment_scheduler">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?php echo (int)$view_appointment_scheduler_search->IsModal ?>">
<div class="ew-search-div d-none"><!-- page* -->
<?php if ($view_appointment_scheduler_search->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label for="x_id" class="<?php echo $view_appointment_scheduler_search->LeftColumnClass ?>"><script id="tpsc_view_appointment_scheduler_id" class="view_appointment_schedulersearch" type="text/html"><span id="elh_view_appointment_scheduler_id"><?php echo $view_appointment_scheduler_search->id->caption() ?></span></script>
		<script id="tpz_view_appointment_scheduler_id" class="view_appointment_schedulersearch" type="text/html"><span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_id" id="z_id" value="=">
</span></script>
		</label>
		<div class="<?php echo $view_appointment_scheduler_search->RightColumnClass ?>"><div <?php echo $view_appointment_scheduler_search->id->cellAttributes() ?>>
			<script id="tpx_view_appointment_scheduler_id" class="view_appointment_schedulersearch" type="text/html"><span id="el_view_appointment_scheduler_id" class="ew-search-field">
<input type="text" data-table="view_appointment_scheduler" data-field="x_id" name="x_id" id="x_id" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_search->id->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_search->id->EditValue ?>"<?php echo $view_appointment_scheduler_search->id->editAttributes() ?>>
</span></script>
		<script id="tpv_view_appointment_scheduler_id" class="view_appointment_schedulersearch" type="text/html">
		</script>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_search->patientID->Visible) { // patientID ?>
	<div id="r_patientID" class="form-group row">
		<label for="x_patientID" class="<?php echo $view_appointment_scheduler_search->LeftColumnClass ?>"><script id="tpsc_view_appointment_scheduler_patientID" class="view_appointment_schedulersearch" type="text/html"><span id="elh_view_appointment_scheduler_patientID"><?php echo $view_appointment_scheduler_search->patientID->caption() ?></span></script>
		<script id="tpz_view_appointment_scheduler_patientID" class="view_appointment_schedulersearch" type="text/html"><span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_patientID" id="z_patientID" value="LIKE">
</span></script>
		</label>
		<div class="<?php echo $view_appointment_scheduler_search->RightColumnClass ?>"><div <?php echo $view_appointment_scheduler_search->patientID->cellAttributes() ?>>
			<script id="tpx_view_appointment_scheduler_patientID" class="view_appointment_schedulersearch" type="text/html"><span id="el_view_appointment_scheduler_patientID" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_patientID"><?php echo EmptyValue(strval($view_appointment_scheduler_search->patientID->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $view_appointment_scheduler_search->patientID->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_appointment_scheduler_search->patientID->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($view_appointment_scheduler_search->patientID->ReadOnly || $view_appointment_scheduler_search->patientID->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_patientID',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $view_appointment_scheduler_search->patientID->Lookup->getParamTag($view_appointment_scheduler_search, "p_x_patientID") ?>
<input type="hidden" data-table="view_appointment_scheduler" data-field="x_patientID" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_appointment_scheduler_search->patientID->displayValueSeparatorAttribute() ?>" name="x_patientID" id="x_patientID" value="<?php echo $view_appointment_scheduler_search->patientID->AdvancedSearch->SearchValue ?>"<?php echo $view_appointment_scheduler_search->patientID->editAttributes() ?>>
</span></script>
		<script id="tpv_view_appointment_scheduler_patientID" class="view_appointment_schedulersearch" type="text/html">
		</script>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_search->patientName->Visible) { // patientName ?>
	<div id="r_patientName" class="form-group row">
		<label for="x_patientName" class="<?php echo $view_appointment_scheduler_search->LeftColumnClass ?>"><script id="tpsc_view_appointment_scheduler_patientName" class="view_appointment_schedulersearch" type="text/html"><span id="elh_view_appointment_scheduler_patientName"><?php echo $view_appointment_scheduler_search->patientName->caption() ?></span></script>
		<script id="tpz_view_appointment_scheduler_patientName" class="view_appointment_schedulersearch" type="text/html"><span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_patientName" id="z_patientName" value="LIKE">
</span></script>
		</label>
		<div class="<?php echo $view_appointment_scheduler_search->RightColumnClass ?>"><div <?php echo $view_appointment_scheduler_search->patientName->cellAttributes() ?>>
			<script id="tpx_view_appointment_scheduler_patientName" class="view_appointment_schedulersearch" type="text/html"><span id="el_view_appointment_scheduler_patientName" class="ew-search-field">
<input type="text" data-table="view_appointment_scheduler" data-field="x_patientName" name="x_patientName" id="x_patientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_search->patientName->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_search->patientName->EditValue ?>"<?php echo $view_appointment_scheduler_search->patientName->editAttributes() ?>>
</span></script>
		<script id="tpv_view_appointment_scheduler_patientName" class="view_appointment_schedulersearch" type="text/html">
		</script>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_search->MobileNumber->Visible) { // MobileNumber ?>
	<div id="r_MobileNumber" class="form-group row">
		<label for="x_MobileNumber" class="<?php echo $view_appointment_scheduler_search->LeftColumnClass ?>"><script id="tpsc_view_appointment_scheduler_MobileNumber" class="view_appointment_schedulersearch" type="text/html"><span id="elh_view_appointment_scheduler_MobileNumber"><?php echo $view_appointment_scheduler_search->MobileNumber->caption() ?></span></script>
		<script id="tpz_view_appointment_scheduler_MobileNumber" class="view_appointment_schedulersearch" type="text/html"><span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_MobileNumber" id="z_MobileNumber" value="LIKE">
</span></script>
		</label>
		<div class="<?php echo $view_appointment_scheduler_search->RightColumnClass ?>"><div <?php echo $view_appointment_scheduler_search->MobileNumber->cellAttributes() ?>>
			<script id="tpx_view_appointment_scheduler_MobileNumber" class="view_appointment_schedulersearch" type="text/html"><span id="el_view_appointment_scheduler_MobileNumber" class="ew-search-field">
<input type="text" data-table="view_appointment_scheduler" data-field="x_MobileNumber" name="x_MobileNumber" id="x_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_search->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_search->MobileNumber->EditValue ?>"<?php echo $view_appointment_scheduler_search->MobileNumber->editAttributes() ?>>
</span></script>
		<script id="tpv_view_appointment_scheduler_MobileNumber" class="view_appointment_schedulersearch" type="text/html">
		</script>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_search->Purpose->Visible) { // Purpose ?>
	<div id="r_Purpose" class="form-group row">
		<label for="x_Purpose" class="<?php echo $view_appointment_scheduler_search->LeftColumnClass ?>"><script id="tpsc_view_appointment_scheduler_Purpose" class="view_appointment_schedulersearch" type="text/html"><span id="elh_view_appointment_scheduler_Purpose"><?php echo $view_appointment_scheduler_search->Purpose->caption() ?></span></script>
		<script id="tpz_view_appointment_scheduler_Purpose" class="view_appointment_schedulersearch" type="text/html"><span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Purpose" id="z_Purpose" value="LIKE">
</span></script>
		</label>
		<div class="<?php echo $view_appointment_scheduler_search->RightColumnClass ?>"><div <?php echo $view_appointment_scheduler_search->Purpose->cellAttributes() ?>>
			<script id="tpx_view_appointment_scheduler_Purpose" class="view_appointment_schedulersearch" type="text/html"><span id="el_view_appointment_scheduler_Purpose" class="ew-search-field">
<input type="text" data-table="view_appointment_scheduler" data-field="x_Purpose" name="x_Purpose" id="x_Purpose" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_search->Purpose->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_search->Purpose->EditValue ?>"<?php echo $view_appointment_scheduler_search->Purpose->editAttributes() ?>>
</span></script>
		<script id="tpv_view_appointment_scheduler_Purpose" class="view_appointment_schedulersearch" type="text/html">
		</script>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_search->PatientType->Visible) { // PatientType ?>
	<div id="r_PatientType" class="form-group row">
		<label class="<?php echo $view_appointment_scheduler_search->LeftColumnClass ?>"><script id="tpsc_view_appointment_scheduler_PatientType" class="view_appointment_schedulersearch" type="text/html"><span id="elh_view_appointment_scheduler_PatientType"><?php echo $view_appointment_scheduler_search->PatientType->caption() ?></span></script>
		<script id="tpz_view_appointment_scheduler_PatientType" class="view_appointment_schedulersearch" type="text/html"><span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientType" id="z_PatientType" value="LIKE">
</span></script>
		</label>
		<div class="<?php echo $view_appointment_scheduler_search->RightColumnClass ?>"><div <?php echo $view_appointment_scheduler_search->PatientType->cellAttributes() ?>>
			<script id="tpx_view_appointment_scheduler_PatientType" class="view_appointment_schedulersearch" type="text/html"><span id="el_view_appointment_scheduler_PatientType" class="ew-search-field">
<?php $view_appointment_scheduler_search->PatientType->EditAttrs->prepend("onclick", "ew.updateOptions.call(this);"); ?>
<div id="tp_x_PatientType" class="ew-template"><input type="radio" class="custom-control-input" data-table="view_appointment_scheduler" data-field="x_PatientType" data-value-separator="<?php echo $view_appointment_scheduler_search->PatientType->displayValueSeparatorAttribute() ?>" name="x_PatientType" id="x_PatientType" value="{value}"<?php echo $view_appointment_scheduler_search->PatientType->editAttributes() ?>></div>
<div id="dsl_x_PatientType" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_appointment_scheduler_search->PatientType->radioButtonListHtml(FALSE, "x_PatientType") ?>
</div></div>
</span></script>
		<script id="tpv_view_appointment_scheduler_PatientType" class="view_appointment_schedulersearch" type="text/html">
		</script>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_search->Referal->Visible) { // Referal ?>
	<div id="r_Referal" class="form-group row">
		<label for="x_Referal" class="<?php echo $view_appointment_scheduler_search->LeftColumnClass ?>"><script id="tpsc_view_appointment_scheduler_Referal" class="view_appointment_schedulersearch" type="text/html"><span id="elh_view_appointment_scheduler_Referal"><?php echo $view_appointment_scheduler_search->Referal->caption() ?></span></script>
		<script id="tpz_view_appointment_scheduler_Referal" class="view_appointment_schedulersearch" type="text/html"><span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Referal" id="z_Referal" value="LIKE">
</span></script>
		</label>
		<div class="<?php echo $view_appointment_scheduler_search->RightColumnClass ?>"><div <?php echo $view_appointment_scheduler_search->Referal->cellAttributes() ?>>
			<script id="tpx_view_appointment_scheduler_Referal" class="view_appointment_schedulersearch" type="text/html"><span id="el_view_appointment_scheduler_Referal" class="ew-search-field">
<input type="text" data-table="view_appointment_scheduler" data-field="x_Referal" name="x_Referal" id="x_Referal" size="30" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_search->Referal->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_search->Referal->EditValue ?>"<?php echo $view_appointment_scheduler_search->Referal->editAttributes() ?>>
<?php echo $view_appointment_scheduler_search->Referal->Lookup->getParamTag($view_appointment_scheduler_search, "p_x_Referal") ?>
</span></script>
		<script id="tpv_view_appointment_scheduler_Referal" class="view_appointment_schedulersearch" type="text/html">
		</script>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_search->start_date->Visible) { // start_date ?>
	<div id="r_start_date" class="form-group row">
		<label for="x_start_date" class="<?php echo $view_appointment_scheduler_search->LeftColumnClass ?>"><script id="tpsc_view_appointment_scheduler_start_date" class="view_appointment_schedulersearch" type="text/html"><span id="elh_view_appointment_scheduler_start_date"><?php echo $view_appointment_scheduler_search->start_date->caption() ?></span></script>
		<script id="tpz_view_appointment_scheduler_start_date" class="view_appointment_schedulersearch" type="text/html"><span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_start_date" id="z_start_date" value="=">
</span></script>
		</label>
		<div class="<?php echo $view_appointment_scheduler_search->RightColumnClass ?>"><div <?php echo $view_appointment_scheduler_search->start_date->cellAttributes() ?>>
			<script id="tpx_view_appointment_scheduler_start_date" class="view_appointment_schedulersearch" type="text/html"><span id="el_view_appointment_scheduler_start_date" class="ew-search-field">
<input type="text" data-table="view_appointment_scheduler" data-field="x_start_date" data-format="11" name="x_start_date" id="x_start_date" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_search->start_date->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_search->start_date->EditValue ?>"<?php echo $view_appointment_scheduler_search->start_date->editAttributes() ?>>
<?php if (!$view_appointment_scheduler_search->start_date->ReadOnly && !$view_appointment_scheduler_search->start_date->Disabled && !isset($view_appointment_scheduler_search->start_date->EditAttrs["readonly"]) && !isset($view_appointment_scheduler_search->start_date->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script><script type="text/html" class="view_appointment_schedulersearch_js">
loadjs.ready(["fview_appointment_schedulersearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_appointment_schedulersearch", "x_start_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
		<script id="tpv_view_appointment_scheduler_start_date" class="view_appointment_schedulersearch" type="text/html">
		</script>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_search->DoctorName->Visible) { // DoctorName ?>
	<div id="r_DoctorName" class="form-group row">
		<label for="x_DoctorName" class="<?php echo $view_appointment_scheduler_search->LeftColumnClass ?>"><script id="tpsc_view_appointment_scheduler_DoctorName" class="view_appointment_schedulersearch" type="text/html"><span id="elh_view_appointment_scheduler_DoctorName"><?php echo $view_appointment_scheduler_search->DoctorName->caption() ?></span></script>
		<script id="tpz_view_appointment_scheduler_DoctorName" class="view_appointment_schedulersearch" type="text/html"><span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DoctorName" id="z_DoctorName" value="LIKE">
</span></script>
		</label>
		<div class="<?php echo $view_appointment_scheduler_search->RightColumnClass ?>"><div <?php echo $view_appointment_scheduler_search->DoctorName->cellAttributes() ?>>
			<script id="tpx_view_appointment_scheduler_DoctorName" class="view_appointment_schedulersearch" type="text/html"><span id="el_view_appointment_scheduler_DoctorName" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_DoctorName"><?php echo EmptyValue(strval($view_appointment_scheduler_search->DoctorName->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $view_appointment_scheduler_search->DoctorName->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_appointment_scheduler_search->DoctorName->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($view_appointment_scheduler_search->DoctorName->ReadOnly || $view_appointment_scheduler_search->DoctorName->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_DoctorName',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $view_appointment_scheduler_search->DoctorName->Lookup->getParamTag($view_appointment_scheduler_search, "p_x_DoctorName") ?>
<input type="hidden" data-table="view_appointment_scheduler" data-field="x_DoctorName" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_appointment_scheduler_search->DoctorName->displayValueSeparatorAttribute() ?>" name="x_DoctorName" id="x_DoctorName" value="<?php echo $view_appointment_scheduler_search->DoctorName->AdvancedSearch->SearchValue ?>"<?php echo $view_appointment_scheduler_search->DoctorName->editAttributes() ?>>
</span></script>
		<script id="tpv_view_appointment_scheduler_DoctorName" class="view_appointment_schedulersearch" type="text/html">
		</script>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_search->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label for="x_HospID" class="<?php echo $view_appointment_scheduler_search->LeftColumnClass ?>"><script id="tpsc_view_appointment_scheduler_HospID" class="view_appointment_schedulersearch" type="text/html"><span id="elh_view_appointment_scheduler_HospID"><?php echo $view_appointment_scheduler_search->HospID->caption() ?></span></script>
		<script id="tpz_view_appointment_scheduler_HospID" class="view_appointment_schedulersearch" type="text/html"><span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_HospID" id="z_HospID" value="=">
</span></script>
		</label>
		<div class="<?php echo $view_appointment_scheduler_search->RightColumnClass ?>"><div <?php echo $view_appointment_scheduler_search->HospID->cellAttributes() ?>>
			<script id="tpx_view_appointment_scheduler_HospID" class="view_appointment_schedulersearch" type="text/html"><span id="el_view_appointment_scheduler_HospID" class="ew-search-field">
<input type="text" data-table="view_appointment_scheduler" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_search->HospID->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_search->HospID->EditValue ?>"<?php echo $view_appointment_scheduler_search->HospID->editAttributes() ?>>
</span></script>
		<script id="tpv_view_appointment_scheduler_HospID" class="view_appointment_schedulersearch" type="text/html">
		</script>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_search->end_date->Visible) { // end_date ?>
	<div id="r_end_date" class="form-group row">
		<label for="x_end_date" class="<?php echo $view_appointment_scheduler_search->LeftColumnClass ?>"><script id="tpsc_view_appointment_scheduler_end_date" class="view_appointment_schedulersearch" type="text/html"><span id="elh_view_appointment_scheduler_end_date"><?php echo $view_appointment_scheduler_search->end_date->caption() ?></span></script>
		<script id="tpz_view_appointment_scheduler_end_date" class="view_appointment_schedulersearch" type="text/html"><span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_end_date" id="z_end_date" value="=">
</span></script>
		</label>
		<div class="<?php echo $view_appointment_scheduler_search->RightColumnClass ?>"><div <?php echo $view_appointment_scheduler_search->end_date->cellAttributes() ?>>
			<script id="tpx_view_appointment_scheduler_end_date" class="view_appointment_schedulersearch" type="text/html"><span id="el_view_appointment_scheduler_end_date" class="ew-search-field">
<input type="text" data-table="view_appointment_scheduler" data-field="x_end_date" data-format="11" name="x_end_date" id="x_end_date" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_search->end_date->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_search->end_date->EditValue ?>"<?php echo $view_appointment_scheduler_search->end_date->editAttributes() ?>>
<?php if (!$view_appointment_scheduler_search->end_date->ReadOnly && !$view_appointment_scheduler_search->end_date->Disabled && !isset($view_appointment_scheduler_search->end_date->EditAttrs["readonly"]) && !isset($view_appointment_scheduler_search->end_date->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script><script type="text/html" class="view_appointment_schedulersearch_js">
loadjs.ready(["fview_appointment_schedulersearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_appointment_schedulersearch", "x_end_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
		<script id="tpv_view_appointment_scheduler_end_date" class="view_appointment_schedulersearch" type="text/html">
		</script>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_search->DoctorID->Visible) { // DoctorID ?>
	<div id="r_DoctorID" class="form-group row">
		<label for="x_DoctorID" class="<?php echo $view_appointment_scheduler_search->LeftColumnClass ?>"><script id="tpsc_view_appointment_scheduler_DoctorID" class="view_appointment_schedulersearch" type="text/html"><span id="elh_view_appointment_scheduler_DoctorID"><?php echo $view_appointment_scheduler_search->DoctorID->caption() ?></span></script>
		<script id="tpz_view_appointment_scheduler_DoctorID" class="view_appointment_schedulersearch" type="text/html"><span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DoctorID" id="z_DoctorID" value="LIKE">
</span></script>
		</label>
		<div class="<?php echo $view_appointment_scheduler_search->RightColumnClass ?>"><div <?php echo $view_appointment_scheduler_search->DoctorID->cellAttributes() ?>>
			<script id="tpx_view_appointment_scheduler_DoctorID" class="view_appointment_schedulersearch" type="text/html"><span id="el_view_appointment_scheduler_DoctorID" class="ew-search-field">
<input type="text" data-table="view_appointment_scheduler" data-field="x_DoctorID" name="x_DoctorID" id="x_DoctorID" size="3" maxlength="5" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_search->DoctorID->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_search->DoctorID->EditValue ?>"<?php echo $view_appointment_scheduler_search->DoctorID->editAttributes() ?>>
</span></script>
		<script id="tpv_view_appointment_scheduler_DoctorID" class="view_appointment_schedulersearch" type="text/html">
		</script>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_search->DoctorCode->Visible) { // DoctorCode ?>
	<div id="r_DoctorCode" class="form-group row">
		<label for="x_DoctorCode" class="<?php echo $view_appointment_scheduler_search->LeftColumnClass ?>"><script id="tpsc_view_appointment_scheduler_DoctorCode" class="view_appointment_schedulersearch" type="text/html"><span id="elh_view_appointment_scheduler_DoctorCode"><?php echo $view_appointment_scheduler_search->DoctorCode->caption() ?></span></script>
		<script id="tpz_view_appointment_scheduler_DoctorCode" class="view_appointment_schedulersearch" type="text/html"><span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DoctorCode" id="z_DoctorCode" value="LIKE">
</span></script>
		</label>
		<div class="<?php echo $view_appointment_scheduler_search->RightColumnClass ?>"><div <?php echo $view_appointment_scheduler_search->DoctorCode->cellAttributes() ?>>
			<script id="tpx_view_appointment_scheduler_DoctorCode" class="view_appointment_schedulersearch" type="text/html"><span id="el_view_appointment_scheduler_DoctorCode" class="ew-search-field">
<input type="text" data-table="view_appointment_scheduler" data-field="x_DoctorCode" name="x_DoctorCode" id="x_DoctorCode" size="5" maxlength="7" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_search->DoctorCode->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_search->DoctorCode->EditValue ?>"<?php echo $view_appointment_scheduler_search->DoctorCode->editAttributes() ?>>
</span></script>
		<script id="tpv_view_appointment_scheduler_DoctorCode" class="view_appointment_schedulersearch" type="text/html">
		</script>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_search->Department->Visible) { // Department ?>
	<div id="r_Department" class="form-group row">
		<label for="x_Department" class="<?php echo $view_appointment_scheduler_search->LeftColumnClass ?>"><script id="tpsc_view_appointment_scheduler_Department" class="view_appointment_schedulersearch" type="text/html"><span id="elh_view_appointment_scheduler_Department"><?php echo $view_appointment_scheduler_search->Department->caption() ?></span></script>
		<script id="tpz_view_appointment_scheduler_Department" class="view_appointment_schedulersearch" type="text/html"><span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Department" id="z_Department" value="LIKE">
</span></script>
		</label>
		<div class="<?php echo $view_appointment_scheduler_search->RightColumnClass ?>"><div <?php echo $view_appointment_scheduler_search->Department->cellAttributes() ?>>
			<script id="tpx_view_appointment_scheduler_Department" class="view_appointment_schedulersearch" type="text/html"><span id="el_view_appointment_scheduler_Department" class="ew-search-field">
<input type="text" data-table="view_appointment_scheduler" data-field="x_Department" name="x_Department" id="x_Department" size="8" maxlength="15" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_search->Department->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_search->Department->EditValue ?>"<?php echo $view_appointment_scheduler_search->Department->editAttributes() ?>>
</span></script>
		<script id="tpv_view_appointment_scheduler_Department" class="view_appointment_schedulersearch" type="text/html">
		</script>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_search->AppointmentStatus->Visible) { // AppointmentStatus ?>
	<div id="r_AppointmentStatus" class="form-group row">
		<label for="x_AppointmentStatus" class="<?php echo $view_appointment_scheduler_search->LeftColumnClass ?>"><script id="tpsc_view_appointment_scheduler_AppointmentStatus" class="view_appointment_schedulersearch" type="text/html"><span id="elh_view_appointment_scheduler_AppointmentStatus"><?php echo $view_appointment_scheduler_search->AppointmentStatus->caption() ?></span></script>
		<script id="tpz_view_appointment_scheduler_AppointmentStatus" class="view_appointment_schedulersearch" type="text/html"><span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_AppointmentStatus" id="z_AppointmentStatus" value="LIKE">
</span></script>
		</label>
		<div class="<?php echo $view_appointment_scheduler_search->RightColumnClass ?>"><div <?php echo $view_appointment_scheduler_search->AppointmentStatus->cellAttributes() ?>>
			<script id="tpx_view_appointment_scheduler_AppointmentStatus" class="view_appointment_schedulersearch" type="text/html"><span id="el_view_appointment_scheduler_AppointmentStatus" class="ew-search-field">
<input type="text" data-table="view_appointment_scheduler" data-field="x_AppointmentStatus" name="x_AppointmentStatus" id="x_AppointmentStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_search->AppointmentStatus->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_search->AppointmentStatus->EditValue ?>"<?php echo $view_appointment_scheduler_search->AppointmentStatus->editAttributes() ?>>
</span></script>
		<script id="tpv_view_appointment_scheduler_AppointmentStatus" class="view_appointment_schedulersearch" type="text/html">
		</script>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_search->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label class="<?php echo $view_appointment_scheduler_search->LeftColumnClass ?>"><script id="tpsc_view_appointment_scheduler_status" class="view_appointment_schedulersearch" type="text/html"><span id="elh_view_appointment_scheduler_status"><?php echo $view_appointment_scheduler_search->status->caption() ?></span></script>
		<script id="tpz_view_appointment_scheduler_status" class="view_appointment_schedulersearch" type="text/html"><span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_status" id="z_status" value="LIKE">
</span></script>
		</label>
		<div class="<?php echo $view_appointment_scheduler_search->RightColumnClass ?>"><div <?php echo $view_appointment_scheduler_search->status->cellAttributes() ?>>
			<script id="tpx_view_appointment_scheduler_status" class="view_appointment_schedulersearch" type="text/html"><span id="el_view_appointment_scheduler_status" class="ew-search-field">
<div id="tp_x_status" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="view_appointment_scheduler" data-field="x_status" data-value-separator="<?php echo $view_appointment_scheduler_search->status->displayValueSeparatorAttribute() ?>" name="x_status[]" id="x_status[]" value="{value}"<?php echo $view_appointment_scheduler_search->status->editAttributes() ?>></div>
<div id="dsl_x_status" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_appointment_scheduler_search->status->checkBoxListHtml(FALSE, "x_status[]") ?>
</div></div>
</span></script>
		<script id="tpv_view_appointment_scheduler_status" class="view_appointment_schedulersearch" type="text/html">
		</script>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_search->scheduler_id->Visible) { // scheduler_id ?>
	<div id="r_scheduler_id" class="form-group row">
		<label for="x_scheduler_id" class="<?php echo $view_appointment_scheduler_search->LeftColumnClass ?>"><script id="tpsc_view_appointment_scheduler_scheduler_id" class="view_appointment_schedulersearch" type="text/html"><span id="elh_view_appointment_scheduler_scheduler_id"><?php echo $view_appointment_scheduler_search->scheduler_id->caption() ?></span></script>
		<script id="tpz_view_appointment_scheduler_scheduler_id" class="view_appointment_schedulersearch" type="text/html"><span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_scheduler_id" id="z_scheduler_id" value="LIKE">
</span></script>
		</label>
		<div class="<?php echo $view_appointment_scheduler_search->RightColumnClass ?>"><div <?php echo $view_appointment_scheduler_search->scheduler_id->cellAttributes() ?>>
			<script id="tpx_view_appointment_scheduler_scheduler_id" class="view_appointment_schedulersearch" type="text/html"><span id="el_view_appointment_scheduler_scheduler_id" class="ew-search-field">
<input type="text" data-table="view_appointment_scheduler" data-field="x_scheduler_id" name="x_scheduler_id" id="x_scheduler_id" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_search->scheduler_id->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_search->scheduler_id->EditValue ?>"<?php echo $view_appointment_scheduler_search->scheduler_id->editAttributes() ?>>
</span></script>
		<script id="tpv_view_appointment_scheduler_scheduler_id" class="view_appointment_schedulersearch" type="text/html">
		</script>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_search->text->Visible) { // text ?>
	<div id="r_text" class="form-group row">
		<label for="x_text" class="<?php echo $view_appointment_scheduler_search->LeftColumnClass ?>"><script id="tpsc_view_appointment_scheduler_text" class="view_appointment_schedulersearch" type="text/html"><span id="elh_view_appointment_scheduler_text"><?php echo $view_appointment_scheduler_search->text->caption() ?></span></script>
		<script id="tpz_view_appointment_scheduler_text" class="view_appointment_schedulersearch" type="text/html"><span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_text" id="z_text" value="LIKE">
</span></script>
		</label>
		<div class="<?php echo $view_appointment_scheduler_search->RightColumnClass ?>"><div <?php echo $view_appointment_scheduler_search->text->cellAttributes() ?>>
			<script id="tpx_view_appointment_scheduler_text" class="view_appointment_schedulersearch" type="text/html"><span id="el_view_appointment_scheduler_text" class="ew-search-field">
<input type="text" data-table="view_appointment_scheduler" data-field="x_text" name="x_text" id="x_text" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_search->text->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_search->text->EditValue ?>"<?php echo $view_appointment_scheduler_search->text->editAttributes() ?>>
</span></script>
		<script id="tpv_view_appointment_scheduler_text" class="view_appointment_schedulersearch" type="text/html">
		</script>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_search->appointment_status->Visible) { // appointment_status ?>
	<div id="r_appointment_status" class="form-group row">
		<label for="x_appointment_status" class="<?php echo $view_appointment_scheduler_search->LeftColumnClass ?>"><script id="tpsc_view_appointment_scheduler_appointment_status" class="view_appointment_schedulersearch" type="text/html"><span id="elh_view_appointment_scheduler_appointment_status"><?php echo $view_appointment_scheduler_search->appointment_status->caption() ?></span></script>
		<script id="tpz_view_appointment_scheduler_appointment_status" class="view_appointment_schedulersearch" type="text/html"><span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_appointment_status" id="z_appointment_status" value="LIKE">
</span></script>
		</label>
		<div class="<?php echo $view_appointment_scheduler_search->RightColumnClass ?>"><div <?php echo $view_appointment_scheduler_search->appointment_status->cellAttributes() ?>>
			<script id="tpx_view_appointment_scheduler_appointment_status" class="view_appointment_schedulersearch" type="text/html"><span id="el_view_appointment_scheduler_appointment_status" class="ew-search-field">
<input type="text" data-table="view_appointment_scheduler" data-field="x_appointment_status" name="x_appointment_status" id="x_appointment_status" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_search->appointment_status->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_search->appointment_status->EditValue ?>"<?php echo $view_appointment_scheduler_search->appointment_status->editAttributes() ?>>
</span></script>
		<script id="tpv_view_appointment_scheduler_appointment_status" class="view_appointment_schedulersearch" type="text/html">
		</script>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_search->PId->Visible) { // PId ?>
	<div id="r_PId" class="form-group row">
		<label for="x_PId" class="<?php echo $view_appointment_scheduler_search->LeftColumnClass ?>"><script id="tpsc_view_appointment_scheduler_PId" class="view_appointment_schedulersearch" type="text/html"><span id="elh_view_appointment_scheduler_PId"><?php echo $view_appointment_scheduler_search->PId->caption() ?></span></script>
		<script id="tpz_view_appointment_scheduler_PId" class="view_appointment_schedulersearch" type="text/html"><span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_PId" id="z_PId" value="=">
</span></script>
		</label>
		<div class="<?php echo $view_appointment_scheduler_search->RightColumnClass ?>"><div <?php echo $view_appointment_scheduler_search->PId->cellAttributes() ?>>
			<script id="tpx_view_appointment_scheduler_PId" class="view_appointment_schedulersearch" type="text/html"><span id="el_view_appointment_scheduler_PId" class="ew-search-field">
<input type="text" data-table="view_appointment_scheduler" data-field="x_PId" name="x_PId" id="x_PId" size="30" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_search->PId->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_search->PId->EditValue ?>"<?php echo $view_appointment_scheduler_search->PId->editAttributes() ?>>
</span></script>
		<script id="tpv_view_appointment_scheduler_PId" class="view_appointment_schedulersearch" type="text/html">
		</script>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_search->SchEmail->Visible) { // SchEmail ?>
	<div id="r_SchEmail" class="form-group row">
		<label for="x_SchEmail" class="<?php echo $view_appointment_scheduler_search->LeftColumnClass ?>"><script id="tpsc_view_appointment_scheduler_SchEmail" class="view_appointment_schedulersearch" type="text/html"><span id="elh_view_appointment_scheduler_SchEmail"><?php echo $view_appointment_scheduler_search->SchEmail->caption() ?></span></script>
		<script id="tpz_view_appointment_scheduler_SchEmail" class="view_appointment_schedulersearch" type="text/html"><span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_SchEmail" id="z_SchEmail" value="LIKE">
</span></script>
		</label>
		<div class="<?php echo $view_appointment_scheduler_search->RightColumnClass ?>"><div <?php echo $view_appointment_scheduler_search->SchEmail->cellAttributes() ?>>
			<script id="tpx_view_appointment_scheduler_SchEmail" class="view_appointment_schedulersearch" type="text/html"><span id="el_view_appointment_scheduler_SchEmail" class="ew-search-field">
<input type="text" data-table="view_appointment_scheduler" data-field="x_SchEmail" name="x_SchEmail" id="x_SchEmail" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_search->SchEmail->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_search->SchEmail->EditValue ?>"<?php echo $view_appointment_scheduler_search->SchEmail->editAttributes() ?>>
</span></script>
		<script id="tpv_view_appointment_scheduler_SchEmail" class="view_appointment_schedulersearch" type="text/html">
		</script>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_search->appointment_type->Visible) { // appointment_type ?>
	<div id="r_appointment_type" class="form-group row">
		<label class="<?php echo $view_appointment_scheduler_search->LeftColumnClass ?>"><script id="tpsc_view_appointment_scheduler_appointment_type" class="view_appointment_schedulersearch" type="text/html"><span id="elh_view_appointment_scheduler_appointment_type"><?php echo $view_appointment_scheduler_search->appointment_type->caption() ?></span></script>
		<script id="tpz_view_appointment_scheduler_appointment_type" class="view_appointment_schedulersearch" type="text/html"><span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_appointment_type" id="z_appointment_type" value="LIKE">
</span></script>
		</label>
		<div class="<?php echo $view_appointment_scheduler_search->RightColumnClass ?>"><div <?php echo $view_appointment_scheduler_search->appointment_type->cellAttributes() ?>>
			<script id="tpx_view_appointment_scheduler_appointment_type" class="view_appointment_schedulersearch" type="text/html"><span id="el_view_appointment_scheduler_appointment_type" class="ew-search-field">
<div id="tp_x_appointment_type" class="ew-template"><input type="radio" class="custom-control-input" data-table="view_appointment_scheduler" data-field="x_appointment_type" data-value-separator="<?php echo $view_appointment_scheduler_search->appointment_type->displayValueSeparatorAttribute() ?>" name="x_appointment_type" id="x_appointment_type" value="{value}"<?php echo $view_appointment_scheduler_search->appointment_type->editAttributes() ?>></div>
<div id="dsl_x_appointment_type" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_appointment_scheduler_search->appointment_type->radioButtonListHtml(FALSE, "x_appointment_type") ?>
</div></div>
</span></script>
		<script id="tpv_view_appointment_scheduler_appointment_type" class="view_appointment_schedulersearch" type="text/html">
		</script>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_search->Notified->Visible) { // Notified ?>
	<div id="r_Notified" class="form-group row">
		<label class="<?php echo $view_appointment_scheduler_search->LeftColumnClass ?>"><script id="tpsc_view_appointment_scheduler_Notified" class="view_appointment_schedulersearch" type="text/html"><span id="elh_view_appointment_scheduler_Notified"><?php echo $view_appointment_scheduler_search->Notified->caption() ?></span></script>
		<script id="tpz_view_appointment_scheduler_Notified" class="view_appointment_schedulersearch" type="text/html"><span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Notified" id="z_Notified" value="LIKE">
</span></script>
		</label>
		<div class="<?php echo $view_appointment_scheduler_search->RightColumnClass ?>"><div <?php echo $view_appointment_scheduler_search->Notified->cellAttributes() ?>>
			<script id="tpx_view_appointment_scheduler_Notified" class="view_appointment_schedulersearch" type="text/html"><span id="el_view_appointment_scheduler_Notified" class="ew-search-field">
<div id="tp_x_Notified" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="view_appointment_scheduler" data-field="x_Notified" data-value-separator="<?php echo $view_appointment_scheduler_search->Notified->displayValueSeparatorAttribute() ?>" name="x_Notified[]" id="x_Notified[]" value="{value}"<?php echo $view_appointment_scheduler_search->Notified->editAttributes() ?>></div>
<div id="dsl_x_Notified" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_appointment_scheduler_search->Notified->checkBoxListHtml(FALSE, "x_Notified[]") ?>
</div></div>
</span></script>
		<script id="tpv_view_appointment_scheduler_Notified" class="view_appointment_schedulersearch" type="text/html">
		</script>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_search->Notes->Visible) { // Notes ?>
	<div id="r_Notes" class="form-group row">
		<label for="x_Notes" class="<?php echo $view_appointment_scheduler_search->LeftColumnClass ?>"><script id="tpsc_view_appointment_scheduler_Notes" class="view_appointment_schedulersearch" type="text/html"><span id="elh_view_appointment_scheduler_Notes"><?php echo $view_appointment_scheduler_search->Notes->caption() ?></span></script>
		<script id="tpz_view_appointment_scheduler_Notes" class="view_appointment_schedulersearch" type="text/html"><span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Notes" id="z_Notes" value="LIKE">
</span></script>
		</label>
		<div class="<?php echo $view_appointment_scheduler_search->RightColumnClass ?>"><div <?php echo $view_appointment_scheduler_search->Notes->cellAttributes() ?>>
			<script id="tpx_view_appointment_scheduler_Notes" class="view_appointment_schedulersearch" type="text/html"><span id="el_view_appointment_scheduler_Notes" class="ew-search-field">
<input type="text" data-table="view_appointment_scheduler" data-field="x_Notes" name="x_Notes" id="x_Notes" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_search->Notes->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_search->Notes->EditValue ?>"<?php echo $view_appointment_scheduler_search->Notes->editAttributes() ?>>
</span></script>
		<script id="tpv_view_appointment_scheduler_Notes" class="view_appointment_schedulersearch" type="text/html">
		</script>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_search->paymentType->Visible) { // paymentType ?>
	<div id="r_paymentType" class="form-group row">
		<label for="x_paymentType" class="<?php echo $view_appointment_scheduler_search->LeftColumnClass ?>"><script id="tpsc_view_appointment_scheduler_paymentType" class="view_appointment_schedulersearch" type="text/html"><span id="elh_view_appointment_scheduler_paymentType"><?php echo $view_appointment_scheduler_search->paymentType->caption() ?></span></script>
		<script id="tpz_view_appointment_scheduler_paymentType" class="view_appointment_schedulersearch" type="text/html"><span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_paymentType" id="z_paymentType" value="LIKE">
</span></script>
		</label>
		<div class="<?php echo $view_appointment_scheduler_search->RightColumnClass ?>"><div <?php echo $view_appointment_scheduler_search->paymentType->cellAttributes() ?>>
			<script id="tpx_view_appointment_scheduler_paymentType" class="view_appointment_schedulersearch" type="text/html"><span id="el_view_appointment_scheduler_paymentType" class="ew-search-field">
<input type="text" data-table="view_appointment_scheduler" data-field="x_paymentType" name="x_paymentType" id="x_paymentType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_search->paymentType->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_search->paymentType->EditValue ?>"<?php echo $view_appointment_scheduler_search->paymentType->editAttributes() ?>>
</span></script>
		<script id="tpv_view_appointment_scheduler_paymentType" class="view_appointment_schedulersearch" type="text/html">
		</script>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_search->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
	<div id="r_WhereDidYouHear" class="form-group row">
		<label class="<?php echo $view_appointment_scheduler_search->LeftColumnClass ?>"><script id="tpsc_view_appointment_scheduler_WhereDidYouHear" class="view_appointment_schedulersearch" type="text/html"><span id="elh_view_appointment_scheduler_WhereDidYouHear"><?php echo $view_appointment_scheduler_search->WhereDidYouHear->caption() ?></span></script>
		<script id="tpz_view_appointment_scheduler_WhereDidYouHear" class="view_appointment_schedulersearch" type="text/html"><span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_WhereDidYouHear" id="z_WhereDidYouHear" value="LIKE">
</span></script>
		</label>
		<div class="<?php echo $view_appointment_scheduler_search->RightColumnClass ?>"><div <?php echo $view_appointment_scheduler_search->WhereDidYouHear->cellAttributes() ?>>
			<script id="tpx_view_appointment_scheduler_WhereDidYouHear" class="view_appointment_schedulersearch" type="text/html"><span id="el_view_appointment_scheduler_WhereDidYouHear" class="ew-search-field">
<div id="tp_x_WhereDidYouHear" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="view_appointment_scheduler" data-field="x_WhereDidYouHear" data-value-separator="<?php echo $view_appointment_scheduler_search->WhereDidYouHear->displayValueSeparatorAttribute() ?>" name="x_WhereDidYouHear[]" id="x_WhereDidYouHear[]" value="{value}"<?php echo $view_appointment_scheduler_search->WhereDidYouHear->editAttributes() ?>></div>
<div id="dsl_x_WhereDidYouHear" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_appointment_scheduler_search->WhereDidYouHear->checkBoxListHtml(FALSE, "x_WhereDidYouHear[]") ?>
</div></div>
<?php echo $view_appointment_scheduler_search->WhereDidYouHear->Lookup->getParamTag($view_appointment_scheduler_search, "p_x_WhereDidYouHear") ?>
</span></script>
		<script id="tpv_view_appointment_scheduler_WhereDidYouHear" class="view_appointment_schedulersearch" type="text/html">
		</script>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_search->createdBy->Visible) { // createdBy ?>
	<div id="r_createdBy" class="form-group row">
		<label for="x_createdBy" class="<?php echo $view_appointment_scheduler_search->LeftColumnClass ?>"><script id="tpsc_view_appointment_scheduler_createdBy" class="view_appointment_schedulersearch" type="text/html"><span id="elh_view_appointment_scheduler_createdBy"><?php echo $view_appointment_scheduler_search->createdBy->caption() ?></span></script>
		<script id="tpz_view_appointment_scheduler_createdBy" class="view_appointment_schedulersearch" type="text/html"><span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_createdBy" id="z_createdBy" value="LIKE">
</span></script>
		</label>
		<div class="<?php echo $view_appointment_scheduler_search->RightColumnClass ?>"><div <?php echo $view_appointment_scheduler_search->createdBy->cellAttributes() ?>>
			<script id="tpx_view_appointment_scheduler_createdBy" class="view_appointment_schedulersearch" type="text/html"><span id="el_view_appointment_scheduler_createdBy" class="ew-search-field">
<input type="text" data-table="view_appointment_scheduler" data-field="x_createdBy" name="x_createdBy" id="x_createdBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_search->createdBy->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_search->createdBy->EditValue ?>"<?php echo $view_appointment_scheduler_search->createdBy->editAttributes() ?>>
</span></script>
		<script id="tpv_view_appointment_scheduler_createdBy" class="view_appointment_schedulersearch" type="text/html">
		</script>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_search->createdDateTime->Visible) { // createdDateTime ?>
	<div id="r_createdDateTime" class="form-group row">
		<label for="x_createdDateTime" class="<?php echo $view_appointment_scheduler_search->LeftColumnClass ?>"><script id="tpsc_view_appointment_scheduler_createdDateTime" class="view_appointment_schedulersearch" type="text/html"><span id="elh_view_appointment_scheduler_createdDateTime"><?php echo $view_appointment_scheduler_search->createdDateTime->caption() ?></span></script>
		<script id="tpz_view_appointment_scheduler_createdDateTime" class="view_appointment_schedulersearch" type="text/html"><span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_createdDateTime" id="z_createdDateTime" value="=">
</span></script>
		</label>
		<div class="<?php echo $view_appointment_scheduler_search->RightColumnClass ?>"><div <?php echo $view_appointment_scheduler_search->createdDateTime->cellAttributes() ?>>
			<script id="tpx_view_appointment_scheduler_createdDateTime" class="view_appointment_schedulersearch" type="text/html"><span id="el_view_appointment_scheduler_createdDateTime" class="ew-search-field">
<input type="text" data-table="view_appointment_scheduler" data-field="x_createdDateTime" name="x_createdDateTime" id="x_createdDateTime" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_search->createdDateTime->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_search->createdDateTime->EditValue ?>"<?php echo $view_appointment_scheduler_search->createdDateTime->editAttributes() ?>>
<?php if (!$view_appointment_scheduler_search->createdDateTime->ReadOnly && !$view_appointment_scheduler_search->createdDateTime->Disabled && !isset($view_appointment_scheduler_search->createdDateTime->EditAttrs["readonly"]) && !isset($view_appointment_scheduler_search->createdDateTime->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script><script type="text/html" class="view_appointment_schedulersearch_js">
loadjs.ready(["fview_appointment_schedulersearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_appointment_schedulersearch", "x_createdDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
		<script id="tpv_view_appointment_scheduler_createdDateTime" class="view_appointment_schedulersearch" type="text/html">
		</script>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_search->PatientTypee->Visible) { // PatientTypee ?>
	<div id="r_PatientTypee" class="form-group row">
		<label for="x_PatientTypee" class="<?php echo $view_appointment_scheduler_search->LeftColumnClass ?>"><script id="tpsc_view_appointment_scheduler_PatientTypee" class="view_appointment_schedulersearch" type="text/html"><span id="elh_view_appointment_scheduler_PatientTypee"><?php echo $view_appointment_scheduler_search->PatientTypee->caption() ?></span></script>
		<script id="tpz_view_appointment_scheduler_PatientTypee" class="view_appointment_schedulersearch" type="text/html"><span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientTypee" id="z_PatientTypee" value="LIKE">
</span></script>
		</label>
		<div class="<?php echo $view_appointment_scheduler_search->RightColumnClass ?>"><div <?php echo $view_appointment_scheduler_search->PatientTypee->cellAttributes() ?>>
			<script id="tpx_view_appointment_scheduler_PatientTypee" class="view_appointment_schedulersearch" type="text/html"><span id="el_view_appointment_scheduler_PatientTypee" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_appointment_scheduler" data-field="x_PatientTypee" data-value-separator="<?php echo $view_appointment_scheduler_search->PatientTypee->displayValueSeparatorAttribute() ?>" id="x_PatientTypee" name="x_PatientTypee"<?php echo $view_appointment_scheduler_search->PatientTypee->editAttributes() ?>>
			<?php echo $view_appointment_scheduler_search->PatientTypee->selectOptionListHtml("x_PatientTypee") ?>
		</select>
</div>
<?php echo $view_appointment_scheduler_search->PatientTypee->Lookup->getParamTag($view_appointment_scheduler_search, "p_x_PatientTypee") ?>
</span></script>
		<script id="tpv_view_appointment_scheduler_PatientTypee" class="view_appointment_schedulersearch" type="text/html">
		</script>
		</div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_view_appointment_schedulersearch" class="ew-custom-template"></div>
<script id="tpm_view_appointment_schedulersearch" type="text/html">
<div id="ct_view_appointment_scheduler_search"><table class="ew-table">
	 <tbody>
		<tr><td><?php echo $view_appointment_scheduler_search->patientName->caption() ?>&nbsp;{{include tmpl=~getTemplate("#tpz_view_appointment_scheduler_patientName")/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_appointment_scheduler_patientName")/}}</td><td><?php echo $view_appointment_scheduler_search->MobileNumber->caption() ?>&nbsp;{{include tmpl=~getTemplate("#tpz_view_appointment_scheduler_MobileNumber")/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_appointment_scheduler_MobileNumber")/}}</td></tr>
		<tr><td><?php echo $view_appointment_scheduler_search->start_date->caption() ?>&nbsp;{{include tmpl=~getTemplate("#tpz_view_appointment_scheduler_start_date")/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_appointment_scheduler_start_date")/}}</td></tr>
		<tr><td>{{include tmpl=~getTemplate("#tpx_start_time")/}}</td></tr>
		<tr><td><?php echo $view_appointment_scheduler_search->DoctorName->caption() ?>&nbsp;{{include tmpl=~getTemplate("#tpz_view_appointment_scheduler_DoctorName")/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_appointment_scheduler_DoctorName")/}}</td></tr>
	</tbody>
</table>
</div>
</script>

<?php if (!$view_appointment_scheduler_search->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $view_appointment_scheduler_search->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("Search") ?></button>
<button class="btn btn-default ew-btn" name="btn-reset" id="btn-reset" type="button" onclick="ew.clearForm(this.form);"><?php echo $Language->phrase("Reset") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($view_appointment_scheduler->Rows) ?> };
	ew.applyTemplate("tpd_view_appointment_schedulersearch", "tpm_view_appointment_schedulersearch", "view_appointment_schedulersearch", "<?php echo $view_appointment_scheduler->CustomExport ?>", ew.templateData.rows[0]);
	$("script.view_appointment_schedulersearch_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$view_appointment_scheduler_search->showPageFooter();
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
$view_appointment_scheduler_search->terminate();
?>