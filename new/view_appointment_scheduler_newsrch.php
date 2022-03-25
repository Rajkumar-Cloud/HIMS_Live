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
$view_appointment_scheduler_new_search = new view_appointment_scheduler_new_search();

// Run the page
$view_appointment_scheduler_new_search->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_appointment_scheduler_new_search->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fview_appointment_scheduler_newsearch, currentPageID;
loadjs.ready("head", function() {

	// Form object for search
	<?php if ($view_appointment_scheduler_new_search->IsModal) { ?>
	fview_appointment_scheduler_newsearch = currentAdvancedSearchForm = new ew.Form("fview_appointment_scheduler_newsearch", "search");
	<?php } else { ?>
	fview_appointment_scheduler_newsearch = currentForm = new ew.Form("fview_appointment_scheduler_newsearch", "search");
	<?php } ?>
	currentPageID = ew.PAGE_ID = "search";

	// Validate function for search
	fview_appointment_scheduler_newsearch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_start_time");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_appointment_scheduler_new_search->start_time->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_start_date");
		if (elm && !ew.checkEuroDate(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_appointment_scheduler_new_search->start_date->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_HospID");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_appointment_scheduler_new_search->HospID->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_Id");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_appointment_scheduler_new_search->Id->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fview_appointment_scheduler_newsearch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_appointment_scheduler_newsearch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fview_appointment_scheduler_newsearch.lists["x_Referal"] = <?php echo $view_appointment_scheduler_new_search->Referal->Lookup->toClientList($view_appointment_scheduler_new_search) ?>;
	fview_appointment_scheduler_newsearch.lists["x_Referal"].options = <?php echo JsonEncode($view_appointment_scheduler_new_search->Referal->lookupOptions()) ?>;
	fview_appointment_scheduler_newsearch.autoSuggests["x_Referal"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fview_appointment_scheduler_newsearch.lists["x_DoctorName"] = <?php echo $view_appointment_scheduler_new_search->DoctorName->Lookup->toClientList($view_appointment_scheduler_new_search) ?>;
	fview_appointment_scheduler_newsearch.lists["x_DoctorName"].options = <?php echo JsonEncode($view_appointment_scheduler_new_search->DoctorName->lookupOptions()) ?>;
	loadjs.done("fview_appointment_scheduler_newsearch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $view_appointment_scheduler_new_search->showPageHeader(); ?>
<?php
$view_appointment_scheduler_new_search->showMessage();
?>
<form name="fview_appointment_scheduler_newsearch" id="fview_appointment_scheduler_newsearch" class="<?php echo $view_appointment_scheduler_new_search->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_appointment_scheduler_new">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?php echo (int)$view_appointment_scheduler_new_search->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($view_appointment_scheduler_new_search->patientID->Visible) { // patientID ?>
	<div id="r_patientID" class="form-group row">
		<label for="x_patientID" class="<?php echo $view_appointment_scheduler_new_search->LeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_patientID"><?php echo $view_appointment_scheduler_new_search->patientID->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_patientID" id="z_patientID" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_appointment_scheduler_new_search->RightColumnClass ?>"><div <?php echo $view_appointment_scheduler_new_search->patientID->cellAttributes() ?>>
			<span id="el_view_appointment_scheduler_new_patientID" class="ew-search-field">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_patientID" name="x_patientID" id="x_patientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new_search->patientID->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new_search->patientID->EditValue ?>"<?php echo $view_appointment_scheduler_new_search->patientID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_new_search->patientName->Visible) { // patientName ?>
	<div id="r_patientName" class="form-group row">
		<label for="x_patientName" class="<?php echo $view_appointment_scheduler_new_search->LeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_patientName"><?php echo $view_appointment_scheduler_new_search->patientName->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_patientName" id="z_patientName" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_appointment_scheduler_new_search->RightColumnClass ?>"><div <?php echo $view_appointment_scheduler_new_search->patientName->cellAttributes() ?>>
			<span id="el_view_appointment_scheduler_new_patientName" class="ew-search-field">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_patientName" name="x_patientName" id="x_patientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new_search->patientName->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new_search->patientName->EditValue ?>"<?php echo $view_appointment_scheduler_new_search->patientName->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_new_search->MobileNumber->Visible) { // MobileNumber ?>
	<div id="r_MobileNumber" class="form-group row">
		<label for="x_MobileNumber" class="<?php echo $view_appointment_scheduler_new_search->LeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_MobileNumber"><?php echo $view_appointment_scheduler_new_search->MobileNumber->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_MobileNumber" id="z_MobileNumber" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_appointment_scheduler_new_search->RightColumnClass ?>"><div <?php echo $view_appointment_scheduler_new_search->MobileNumber->cellAttributes() ?>>
			<span id="el_view_appointment_scheduler_new_MobileNumber" class="ew-search-field">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_MobileNumber" name="x_MobileNumber" id="x_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new_search->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new_search->MobileNumber->EditValue ?>"<?php echo $view_appointment_scheduler_new_search->MobileNumber->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_new_search->start_time->Visible) { // start_time ?>
	<div id="r_start_time" class="form-group row">
		<label for="x_start_time" class="<?php echo $view_appointment_scheduler_new_search->LeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_start_time"><?php echo $view_appointment_scheduler_new_search->start_time->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("<=") ?>
<input type="hidden" name="z_start_time" id="z_start_time" value="<=">
</span>
		</label>
		<div class="<?php echo $view_appointment_scheduler_new_search->RightColumnClass ?>"><div <?php echo $view_appointment_scheduler_new_search->start_time->cellAttributes() ?>>
			<span id="el_view_appointment_scheduler_new_start_time" class="ew-search-field">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_start_time" data-format="3" name="x_start_time" id="x_start_time" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new_search->start_time->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new_search->start_time->EditValue ?>"<?php echo $view_appointment_scheduler_new_search->start_time->editAttributes() ?>>
<?php if (!$view_appointment_scheduler_new_search->start_time->ReadOnly && !$view_appointment_scheduler_new_search->start_time->Disabled && !isset($view_appointment_scheduler_new_search->start_time->EditAttrs["readonly"]) && !isset($view_appointment_scheduler_new_search->start_time->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_appointment_scheduler_newsearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_appointment_scheduler_newsearch", "x_start_time", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
<?php if (!$view_appointment_scheduler_new_search->start_time->ReadOnly && !$view_appointment_scheduler_new_search->start_time->Disabled && !isset($view_appointment_scheduler_new_search->start_time->EditAttrs["readonly"]) && !isset($view_appointment_scheduler_new_search->start_time->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_appointment_scheduler_newsearch", "timepicker"], function() {
	ew.createTimePicker("fview_appointment_scheduler_newsearch", "x_start_time", {"timeFormat":"h:i A","step":15});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_new_search->Purpose->Visible) { // Purpose ?>
	<div id="r_Purpose" class="form-group row">
		<label for="x_Purpose" class="<?php echo $view_appointment_scheduler_new_search->LeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_Purpose"><?php echo $view_appointment_scheduler_new_search->Purpose->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Purpose" id="z_Purpose" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_appointment_scheduler_new_search->RightColumnClass ?>"><div <?php echo $view_appointment_scheduler_new_search->Purpose->cellAttributes() ?>>
			<span id="el_view_appointment_scheduler_new_Purpose" class="ew-search-field">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_Purpose" name="x_Purpose" id="x_Purpose" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new_search->Purpose->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new_search->Purpose->EditValue ?>"<?php echo $view_appointment_scheduler_new_search->Purpose->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_new_search->patienttype->Visible) { // patienttype ?>
	<div id="r_patienttype" class="form-group row">
		<label for="x_patienttype" class="<?php echo $view_appointment_scheduler_new_search->LeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_patienttype"><?php echo $view_appointment_scheduler_new_search->patienttype->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_patienttype" id="z_patienttype" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_appointment_scheduler_new_search->RightColumnClass ?>"><div <?php echo $view_appointment_scheduler_new_search->patienttype->cellAttributes() ?>>
			<span id="el_view_appointment_scheduler_new_patienttype" class="ew-search-field">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_patienttype" name="x_patienttype" id="x_patienttype" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new_search->patienttype->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new_search->patienttype->EditValue ?>"<?php echo $view_appointment_scheduler_new_search->patienttype->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_new_search->Referal->Visible) { // Referal ?>
	<div id="r_Referal" class="form-group row">
		<label class="<?php echo $view_appointment_scheduler_new_search->LeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_Referal"><?php echo $view_appointment_scheduler_new_search->Referal->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Referal" id="z_Referal" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_appointment_scheduler_new_search->RightColumnClass ?>"><div <?php echo $view_appointment_scheduler_new_search->Referal->cellAttributes() ?>>
			<span id="el_view_appointment_scheduler_new_Referal" class="ew-search-field">
<?php
$onchange = $view_appointment_scheduler_new_search->Referal->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$view_appointment_scheduler_new_search->Referal->EditAttrs["onchange"] = "";
?>
<span id="as_x_Referal">
	<input type="text" class="form-control" name="sv_x_Referal" id="sv_x_Referal" value="<?php echo RemoveHtml($view_appointment_scheduler_new_search->Referal->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new_search->Referal->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new_search->Referal->getPlaceHolder()) ?>"<?php echo $view_appointment_scheduler_new_search->Referal->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_appointment_scheduler_new" data-field="x_Referal" data-value-separator="<?php echo $view_appointment_scheduler_new_search->Referal->displayValueSeparatorAttribute() ?>" name="x_Referal" id="x_Referal" value="<?php echo HtmlEncode($view_appointment_scheduler_new_search->Referal->AdvancedSearch->SearchValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fview_appointment_scheduler_newsearch"], function() {
	fview_appointment_scheduler_newsearch.createAutoSuggest({"id":"x_Referal","forceSelect":false});
});
</script>
<?php echo $view_appointment_scheduler_new_search->Referal->Lookup->getParamTag($view_appointment_scheduler_new_search, "p_x_Referal") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_new_search->start_date->Visible) { // start_date ?>
	<div id="r_start_date" class="form-group row">
		<label for="x_start_date" class="<?php echo $view_appointment_scheduler_new_search->LeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_start_date"><?php echo $view_appointment_scheduler_new_search->start_date->caption() ?></span>
		</label>
		<div class="<?php echo $view_appointment_scheduler_new_search->RightColumnClass ?>"><div <?php echo $view_appointment_scheduler_new_search->start_date->cellAttributes() ?>>
		<span class="ew-search-operator">
<select name="z_start_date" id="z_start_date" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?php echo $view_appointment_scheduler_new_search->start_date->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?php echo $Language->phrase("EQUAL") ?></option>
<option value="<>"<?php echo $view_appointment_scheduler_new_search->start_date->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?php echo $Language->phrase("<>") ?></option>
<option value="<"<?php echo $view_appointment_scheduler_new_search->start_date->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?php echo $Language->phrase("<") ?></option>
<option value="<="<?php echo $view_appointment_scheduler_new_search->start_date->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?php echo $Language->phrase("<=") ?></option>
<option value=">"<?php echo $view_appointment_scheduler_new_search->start_date->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?php echo $Language->phrase(">") ?></option>
<option value=">="<?php echo $view_appointment_scheduler_new_search->start_date->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?php echo $Language->phrase(">=") ?></option>
<option value="IS NULL"<?php echo $view_appointment_scheduler_new_search->start_date->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?php echo $view_appointment_scheduler_new_search->start_date->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?php echo $view_appointment_scheduler_new_search->start_date->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?php echo $Language->phrase("BETWEEN") ?></option>
</select>
</span>
			<span id="el_view_appointment_scheduler_new_start_date" class="ew-search-field">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_start_date" data-format="11" name="x_start_date" id="x_start_date" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new_search->start_date->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new_search->start_date->EditValue ?>"<?php echo $view_appointment_scheduler_new_search->start_date->editAttributes() ?>>
<?php if (!$view_appointment_scheduler_new_search->start_date->ReadOnly && !$view_appointment_scheduler_new_search->start_date->Disabled && !isset($view_appointment_scheduler_new_search->start_date->EditAttrs["readonly"]) && !isset($view_appointment_scheduler_new_search->start_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_appointment_scheduler_newsearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_appointment_scheduler_newsearch", "x_start_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
			<span class="ew-search-and d-none"><label><?php echo $Language->phrase("AND") ?></label></span>
			<span id="el2_view_appointment_scheduler_new_start_date" class="ew-search-field2 d-none">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_start_date" data-format="11" name="y_start_date" id="y_start_date" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new_search->start_date->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new_search->start_date->EditValue2 ?>"<?php echo $view_appointment_scheduler_new_search->start_date->editAttributes() ?>>
<?php if (!$view_appointment_scheduler_new_search->start_date->ReadOnly && !$view_appointment_scheduler_new_search->start_date->Disabled && !isset($view_appointment_scheduler_new_search->start_date->EditAttrs["readonly"]) && !isset($view_appointment_scheduler_new_search->start_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_appointment_scheduler_newsearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_appointment_scheduler_newsearch", "y_start_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_new_search->DoctorName->Visible) { // DoctorName ?>
	<div id="r_DoctorName" class="form-group row">
		<label for="x_DoctorName" class="<?php echo $view_appointment_scheduler_new_search->LeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_DoctorName"><?php echo $view_appointment_scheduler_new_search->DoctorName->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DoctorName" id="z_DoctorName" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_appointment_scheduler_new_search->RightColumnClass ?>"><div <?php echo $view_appointment_scheduler_new_search->DoctorName->cellAttributes() ?>>
			<span id="el_view_appointment_scheduler_new_DoctorName" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_appointment_scheduler_new" data-field="x_DoctorName" data-value-separator="<?php echo $view_appointment_scheduler_new_search->DoctorName->displayValueSeparatorAttribute() ?>" id="x_DoctorName" name="x_DoctorName"<?php echo $view_appointment_scheduler_new_search->DoctorName->editAttributes() ?>>
			<?php echo $view_appointment_scheduler_new_search->DoctorName->selectOptionListHtml("x_DoctorName") ?>
		</select>
</div>
<?php echo $view_appointment_scheduler_new_search->DoctorName->Lookup->getParamTag($view_appointment_scheduler_new_search, "p_x_DoctorName") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_new_search->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label for="x_HospID" class="<?php echo $view_appointment_scheduler_new_search->LeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_HospID"><?php echo $view_appointment_scheduler_new_search->HospID->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_HospID" id="z_HospID" value="=">
</span>
		</label>
		<div class="<?php echo $view_appointment_scheduler_new_search->RightColumnClass ?>"><div <?php echo $view_appointment_scheduler_new_search->HospID->cellAttributes() ?>>
			<span id="el_view_appointment_scheduler_new_HospID" class="ew-search-field">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new_search->HospID->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new_search->HospID->EditValue ?>"<?php echo $view_appointment_scheduler_new_search->HospID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_new_search->Id->Visible) { // Id ?>
	<div id="r_Id" class="form-group row">
		<label for="x_Id" class="<?php echo $view_appointment_scheduler_new_search->LeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_Id"><?php echo $view_appointment_scheduler_new_search->Id->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_Id" id="z_Id" value="=">
</span>
		</label>
		<div class="<?php echo $view_appointment_scheduler_new_search->RightColumnClass ?>"><div <?php echo $view_appointment_scheduler_new_search->Id->cellAttributes() ?>>
			<span id="el_view_appointment_scheduler_new_Id" class="ew-search-field">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_Id" name="x_Id" id="x_Id" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new_search->Id->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new_search->Id->EditValue ?>"<?php echo $view_appointment_scheduler_new_search->Id->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_new_search->PatientTypee->Visible) { // PatientTypee ?>
	<div id="r_PatientTypee" class="form-group row">
		<label for="x_PatientTypee" class="<?php echo $view_appointment_scheduler_new_search->LeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_PatientTypee"><?php echo $view_appointment_scheduler_new_search->PatientTypee->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientTypee" id="z_PatientTypee" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_appointment_scheduler_new_search->RightColumnClass ?>"><div <?php echo $view_appointment_scheduler_new_search->PatientTypee->cellAttributes() ?>>
			<span id="el_view_appointment_scheduler_new_PatientTypee" class="ew-search-field">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_PatientTypee" name="x_PatientTypee" id="x_PatientTypee" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new_search->PatientTypee->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new_search->PatientTypee->EditValue ?>"<?php echo $view_appointment_scheduler_new_search->PatientTypee->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_appointment_scheduler_new_search->Notes->Visible) { // Notes ?>
	<div id="r_Notes" class="form-group row">
		<label for="x_Notes" class="<?php echo $view_appointment_scheduler_new_search->LeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_Notes"><?php echo $view_appointment_scheduler_new_search->Notes->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Notes" id="z_Notes" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_appointment_scheduler_new_search->RightColumnClass ?>"><div <?php echo $view_appointment_scheduler_new_search->Notes->cellAttributes() ?>>
			<span id="el_view_appointment_scheduler_new_Notes" class="ew-search-field">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_Notes" name="x_Notes" id="x_Notes" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new_search->Notes->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new_search->Notes->EditValue ?>"<?php echo $view_appointment_scheduler_new_search->Notes->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$view_appointment_scheduler_new_search->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $view_appointment_scheduler_new_search->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("Search") ?></button>
<button class="btn btn-default ew-btn" name="btn-reset" id="btn-reset" type="button" onclick="ew.clearForm(this.form);"><?php echo $Language->phrase("Reset") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$view_appointment_scheduler_new_search->showPageFooter();
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
$view_appointment_scheduler_new_search->terminate();
?>