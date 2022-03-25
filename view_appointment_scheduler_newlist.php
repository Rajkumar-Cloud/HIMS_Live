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
$view_appointment_scheduler_new_list = new view_appointment_scheduler_new_list();

// Run the page
$view_appointment_scheduler_new_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_appointment_scheduler_new_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_appointment_scheduler_new->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_appointment_scheduler_newlist = currentForm = new ew.Form("fview_appointment_scheduler_newlist", "list");
fview_appointment_scheduler_newlist.formKeyCountName = '<?php echo $view_appointment_scheduler_new_list->FormKeyCountName ?>';

// Validate form
fview_appointment_scheduler_newlist.validate = function() {
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
		<?php if ($view_appointment_scheduler_new_list->patientID->Required) { ?>
			elm = this.getElements("x" + infix + "_patientID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler_new->patientID->caption(), $view_appointment_scheduler_new->patientID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_new_list->patientName->Required) { ?>
			elm = this.getElements("x" + infix + "_patientName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler_new->patientName->caption(), $view_appointment_scheduler_new->patientName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_new_list->MobileNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_MobileNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler_new->MobileNumber->caption(), $view_appointment_scheduler_new->MobileNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_new_list->start_time->Required) { ?>
			elm = this.getElements("x" + infix + "_start_time");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler_new->start_time->caption(), $view_appointment_scheduler_new->start_time->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_start_time");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_appointment_scheduler_new->start_time->errorMessage()) ?>");
		<?php if ($view_appointment_scheduler_new_list->Purpose->Required) { ?>
			elm = this.getElements("x" + infix + "_Purpose");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler_new->Purpose->caption(), $view_appointment_scheduler_new->Purpose->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_new_list->patienttype->Required) { ?>
			elm = this.getElements("x" + infix + "_patienttype");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler_new->patienttype->caption(), $view_appointment_scheduler_new->patienttype->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_new_list->Referal->Required) { ?>
			elm = this.getElements("x" + infix + "_Referal");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler_new->Referal->caption(), $view_appointment_scheduler_new->Referal->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_new_list->start_date->Required) { ?>
			elm = this.getElements("x" + infix + "_start_date");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler_new->start_date->caption(), $view_appointment_scheduler_new->start_date->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_start_date");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_appointment_scheduler_new->start_date->errorMessage()) ?>");
		<?php if ($view_appointment_scheduler_new_list->DoctorName->Required) { ?>
			elm = this.getElements("x" + infix + "_DoctorName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler_new->DoctorName->caption(), $view_appointment_scheduler_new->DoctorName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_new_list->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler_new->HospID->caption(), $view_appointment_scheduler_new->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_appointment_scheduler_new->HospID->errorMessage()) ?>");
		<?php if ($view_appointment_scheduler_new_list->Id->Required) { ?>
			elm = this.getElements("x" + infix + "_Id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler_new->Id->caption(), $view_appointment_scheduler_new->Id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_new_list->PatientTypee->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientTypee");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler_new->PatientTypee->caption(), $view_appointment_scheduler_new->PatientTypee->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_appointment_scheduler_new_list->Notes->Required) { ?>
			elm = this.getElements("x" + infix + "_Notes");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler_new->Notes->caption(), $view_appointment_scheduler_new->Notes->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
	}
	return true;
}

// Form_CustomValidate event
fview_appointment_scheduler_newlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_appointment_scheduler_newlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_appointment_scheduler_newlist.lists["x_Referal"] = <?php echo $view_appointment_scheduler_new_list->Referal->Lookup->toClientList() ?>;
fview_appointment_scheduler_newlist.lists["x_Referal"].options = <?php echo JsonEncode($view_appointment_scheduler_new_list->Referal->lookupOptions()) ?>;
fview_appointment_scheduler_newlist.autoSuggests["x_Referal"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fview_appointment_scheduler_newlist.lists["x_DoctorName"] = <?php echo $view_appointment_scheduler_new_list->DoctorName->Lookup->toClientList() ?>;
fview_appointment_scheduler_newlist.lists["x_DoctorName"].options = <?php echo JsonEncode($view_appointment_scheduler_new_list->DoctorName->lookupOptions()) ?>;

// Form object for search
var fview_appointment_scheduler_newlistsrch = currentSearchForm = new ew.Form("fview_appointment_scheduler_newlistsrch");

// Validate function for search
fview_appointment_scheduler_newlistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_start_date");
	if (elm && !ew.checkEuroDate(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_appointment_scheduler_new->start_date->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fview_appointment_scheduler_newlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_appointment_scheduler_newlistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_appointment_scheduler_newlistsrch.lists["x_DoctorName"] = <?php echo $view_appointment_scheduler_new_list->DoctorName->Lookup->toClientList() ?>;
fview_appointment_scheduler_newlistsrch.lists["x_DoctorName"].options = <?php echo JsonEncode($view_appointment_scheduler_new_list->DoctorName->lookupOptions()) ?>;

// Filters
fview_appointment_scheduler_newlistsrch.filterList = <?php echo $view_appointment_scheduler_new_list->getFilterList() ?>;
</script>
<script src="phpjs/ewscrolltable.js"></script>
<style type="text/css">
.ew-table-preview-row { /* main table preview row color */
	background-color: #FFFFFF; /* preview row color */
}
.ew-table-preview-row .ew-grid {
	display: table;
}
</style>
<div id="ew-preview" class="d-none"><!-- preview -->
	<div class="ew-nav-tabs"><!-- .ew-nav-tabs -->
		<ul class="nav nav-tabs"></ul>
		<div class="tab-content"><!-- .tab-content -->
			<div class="tab-pane fade active show"></div>
		</div><!-- /.tab-content -->
	</div><!-- /.ew-nav-tabs -->
</div><!-- /preview -->
<script src="phpjs/ewpreview.js"></script>
<script>
ew.PREVIEW_PLACEMENT = ew.CSS_FLIP ? "left" : "right";
ew.PREVIEW_SINGLE_ROW = false;
ew.PREVIEW_OVERLAY = false;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$view_appointment_scheduler_new->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_appointment_scheduler_new_list->TotalRecs > 0 && $view_appointment_scheduler_new_list->ExportOptions->visible()) { ?>
<?php $view_appointment_scheduler_new_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_appointment_scheduler_new_list->ImportOptions->visible()) { ?>
<?php $view_appointment_scheduler_new_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_appointment_scheduler_new_list->SearchOptions->visible()) { ?>
<?php $view_appointment_scheduler_new_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_appointment_scheduler_new_list->FilterOptions->visible()) { ?>
<?php $view_appointment_scheduler_new_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_appointment_scheduler_new_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_appointment_scheduler_new->isExport() && !$view_appointment_scheduler_new->CurrentAction) { ?>
<form name="fview_appointment_scheduler_newlistsrch" id="fview_appointment_scheduler_newlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_appointment_scheduler_new_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_appointment_scheduler_newlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_appointment_scheduler_new">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$view_appointment_scheduler_new_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$view_appointment_scheduler_new->RowType = ROWTYPE_SEARCH;

// Render row
$view_appointment_scheduler_new->resetAttributes();
$view_appointment_scheduler_new_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex d-none">
<?php if ($view_appointment_scheduler_new->patientName->Visible) { // patientName ?>
	<div id="xsc_patientName" class="ew-cell form-group">
		<script id="tpsc_view_appointment_scheduler_new_patientName" class="view_appointment_scheduler_newextendedsearch" type="text/html"><label for="x_patientName" class="ew-search-caption ew-label"><?php echo $view_appointment_scheduler_new->patientName->caption() ?></label></script>
		<script id="tpz_view_appointment_scheduler_new_patientName" class="view_appointment_scheduler_newextendedsearch" type="text/html"><span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_patientName" id="z_patientName" value="LIKE"></span></script>
		<script id="tpx_view_appointment_scheduler_new_patientName" class="view_appointment_scheduler_newextendedsearch" type="text/html"><span class="ew-search-field">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_patientName" name="x_patientName" id="x_patientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new->patientName->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new->patientName->EditValue ?>"<?php echo $view_appointment_scheduler_new->patientName->editAttributes() ?>>
</span></script>
		<script id="tpv_view_appointment_scheduler_new_patientName" class="view_appointment_scheduler_newextendedsearch" type="text/html">
		</script>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex d-none">
<?php if ($view_appointment_scheduler_new->MobileNumber->Visible) { // MobileNumber ?>
	<div id="xsc_MobileNumber" class="ew-cell form-group">
		<script id="tpsc_view_appointment_scheduler_new_MobileNumber" class="view_appointment_scheduler_newextendedsearch" type="text/html"><label for="x_MobileNumber" class="ew-search-caption ew-label"><?php echo $view_appointment_scheduler_new->MobileNumber->caption() ?></label></script>
		<script id="tpz_view_appointment_scheduler_new_MobileNumber" class="view_appointment_scheduler_newextendedsearch" type="text/html"><span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_MobileNumber" id="z_MobileNumber" value="LIKE"></span></script>
		<script id="tpx_view_appointment_scheduler_new_MobileNumber" class="view_appointment_scheduler_newextendedsearch" type="text/html"><span class="ew-search-field">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_MobileNumber" name="x_MobileNumber" id="x_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new->MobileNumber->EditValue ?>"<?php echo $view_appointment_scheduler_new->MobileNumber->editAttributes() ?>>
</span></script>
		<script id="tpv_view_appointment_scheduler_new_MobileNumber" class="view_appointment_scheduler_newextendedsearch" type="text/html">
		</script>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex d-none">
<?php if ($view_appointment_scheduler_new->start_date->Visible) { // start_date ?>
	<div id="xsc_start_date" class="ew-cell form-group">
		<script id="tpsc_view_appointment_scheduler_new_start_date" class="view_appointment_scheduler_newextendedsearch" type="text/html"><label for="x_start_date" class="ew-search-caption ew-label"><?php echo $view_appointment_scheduler_new->start_date->caption() ?></label></script>
		<script id="tpz_view_appointment_scheduler_new_start_date" class="view_appointment_scheduler_newextendedsearch" type="text/html"><span class="ew-search-operator"><select name="z_start_date" id="z_start_date" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($view_appointment_scheduler_new->start_date->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($view_appointment_scheduler_new->start_date->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($view_appointment_scheduler_new->start_date->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($view_appointment_scheduler_new->start_date->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($view_appointment_scheduler_new->start_date->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($view_appointment_scheduler_new->start_date->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($view_appointment_scheduler_new->start_date->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($view_appointment_scheduler_new->start_date->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($view_appointment_scheduler_new->start_date->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span></script>
		<script id="tpx_view_appointment_scheduler_new_start_date" class="view_appointment_scheduler_newextendedsearch" type="text/html"><span class="ew-search-field">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_start_date" data-format="11" name="x_start_date" id="x_start_date" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new->start_date->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new->start_date->EditValue ?>"<?php echo $view_appointment_scheduler_new->start_date->editAttributes() ?>>
<?php if (!$view_appointment_scheduler_new->start_date->ReadOnly && !$view_appointment_scheduler_new->start_date->Disabled && !isset($view_appointment_scheduler_new->start_date->EditAttrs["readonly"]) && !isset($view_appointment_scheduler_new->start_date->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script><script type="text/html" class="view_appointment_scheduler_newextendedsearch_js">
ew.createDateTimePicker("fview_appointment_scheduler_newlistsrch", "x_start_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
		<script id="tpv_view_appointment_scheduler_new_start_date" class="view_appointment_scheduler_newextendedsearch" type="text/html">
		<span class="ew-search-cond btw1_start_date style="d-none""><label><?php echo $Language->Phrase("AND") ?></label></span>
		</script>
		<script id="tpy_view_appointment_scheduler_new_start_date" class="view_appointment_scheduler_newextendedsearch" type="text/html"><span class="ew-search-field btw1_start_date style="d-none"">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_start_date" data-format="11" name="y_start_date" id="y_start_date" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new->start_date->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new->start_date->EditValue2 ?>"<?php echo $view_appointment_scheduler_new->start_date->editAttributes() ?>>
<?php if (!$view_appointment_scheduler_new->start_date->ReadOnly && !$view_appointment_scheduler_new->start_date->Disabled && !isset($view_appointment_scheduler_new->start_date->EditAttrs["readonly"]) && !isset($view_appointment_scheduler_new->start_date->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script><script type="text/html" class="view_appointment_scheduler_newextendedsearch_js">
ew.createDateTimePicker("fview_appointment_scheduler_newlistsrch", "y_start_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
	</div>
<?php } ?>
</div>
<div id="xsr_4" class="ew-row d-sm-flex d-none">
<?php if ($view_appointment_scheduler_new->DoctorName->Visible) { // DoctorName ?>
	<div id="xsc_DoctorName" class="ew-cell form-group">
		<script id="tpsc_view_appointment_scheduler_new_DoctorName" class="view_appointment_scheduler_newextendedsearch" type="text/html"><label for="x_DoctorName" class="ew-search-caption ew-label"><?php echo $view_appointment_scheduler_new->DoctorName->caption() ?></label></script>
		<script id="tpz_view_appointment_scheduler_new_DoctorName" class="view_appointment_scheduler_newextendedsearch" type="text/html"><span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_DoctorName" id="z_DoctorName" value="LIKE"></span></script>
		<script id="tpx_view_appointment_scheduler_new_DoctorName" class="view_appointment_scheduler_newextendedsearch" type="text/html"><span class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_appointment_scheduler_new" data-field="x_DoctorName" data-value-separator="<?php echo $view_appointment_scheduler_new->DoctorName->displayValueSeparatorAttribute() ?>" id="x_DoctorName" name="x_DoctorName"<?php echo $view_appointment_scheduler_new->DoctorName->editAttributes() ?>>
		<?php echo $view_appointment_scheduler_new->DoctorName->selectOptionListHtml("x_DoctorName") ?>
	</select>
</div>
<?php echo $view_appointment_scheduler_new->DoctorName->Lookup->getParamTag("p_x_DoctorName") ?>
</span></script>
		<script id="tpv_view_appointment_scheduler_new_DoctorName" class="view_appointment_scheduler_newextendedsearch" type="text/html">
		</script>
	</div>
<?php } ?>
</div>
<div id="tpsd_view_appointment_scheduler_newlist" class="ew-custom-template-search"></div>
<script id="tpsm_view_appointment_scheduler_newlist" type="text/html">
<table class="ew-table">
	 <tbody>
		<tr><td><?php echo $view_appointment_scheduler_new->patientName->caption() ?>&nbsp;{{include tmpl="#tpz_view_appointment_scheduler_new_patientName"/}}&nbsp;{{include tmpl="#tpx_view_appointment_scheduler_new_patientName"/}}</td><td><?php echo $view_appointment_scheduler_new->MobileNumber->caption() ?>&nbsp;{{include tmpl="#tpz_view_appointment_scheduler_new_MobileNumber"/}}&nbsp;{{include tmpl="#tpx_view_appointment_scheduler_new_MobileNumber"/}}</td></tr>
			<tr><td><?php echo $view_appointment_scheduler_new->DoctorName->caption() ?>&nbsp;{{include tmpl="#tpz_view_appointment_scheduler_new_DoctorName"/}}&nbsp;{{include tmpl="#tpx_view_appointment_scheduler_new_DoctorName"/}}</td></tr>
		</tbody>
</table>
		<div class="info-box row" style="width:100%;"><span class="info-box-icon bg-info elevation-1"><i class="fas fa-calendar"></i></span>&nbsp;&nbsp;<?php echo $view_appointment_scheduler_new->start_date->caption() ?>&nbsp;{{include tmpl="#tpz_view_appointment_scheduler_new_start_date"/}}&nbsp;{{include tmpl="#tpx_view_appointment_scheduler_new_start_date"/}}&nbsp;{{include tmpl="#tpv_view_appointment_scheduler_new_start_date"/}}&nbsp;{{include tmpl="#tpy_view_appointment_scheduler_new_start_date"/}}</div>
</script>
<div id="xsr_5" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_appointment_scheduler_new_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_appointment_scheduler_new_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_appointment_scheduler_new_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_appointment_scheduler_new_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_appointment_scheduler_new_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_appointment_scheduler_new_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_appointment_scheduler_new_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<script>
ew.applyTemplate("tpsd_view_appointment_scheduler_newlist", "tpsm_view_appointment_scheduler_newlist");
jQuery("script.view_appointment_scheduler_newextendedsearch_js").each(function(){ew.addScript(this.text);});
</script>
<?php } ?>
<?php } ?>
<?php $view_appointment_scheduler_new_list->showPageHeader(); ?>
<?php
$view_appointment_scheduler_new_list->showMessage();
?>
<?php if ($view_appointment_scheduler_new_list->TotalRecs > 0 || $view_appointment_scheduler_new->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_appointment_scheduler_new_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_appointment_scheduler_new">
<?php if (!$view_appointment_scheduler_new->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_appointment_scheduler_new->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_appointment_scheduler_new_list->Pager)) $view_appointment_scheduler_new_list->Pager = new NumericPager($view_appointment_scheduler_new_list->StartRec, $view_appointment_scheduler_new_list->DisplayRecs, $view_appointment_scheduler_new_list->TotalRecs, $view_appointment_scheduler_new_list->RecRange, $view_appointment_scheduler_new_list->AutoHidePager) ?>
<?php if ($view_appointment_scheduler_new_list->Pager->RecordCount > 0 && $view_appointment_scheduler_new_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_appointment_scheduler_new_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_appointment_scheduler_new_list->pageUrl() ?>start=<?php echo $view_appointment_scheduler_new_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_appointment_scheduler_new_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_appointment_scheduler_new_list->pageUrl() ?>start=<?php echo $view_appointment_scheduler_new_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_appointment_scheduler_new_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_appointment_scheduler_new_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_appointment_scheduler_new_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_appointment_scheduler_new_list->pageUrl() ?>start=<?php echo $view_appointment_scheduler_new_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_appointment_scheduler_new_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_appointment_scheduler_new_list->pageUrl() ?>start=<?php echo $view_appointment_scheduler_new_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_appointment_scheduler_new_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_appointment_scheduler_new_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_appointment_scheduler_new_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_appointment_scheduler_new_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_appointment_scheduler_new_list->TotalRecs > 0 && (!$view_appointment_scheduler_new_list->AutoHidePageSizeSelector || $view_appointment_scheduler_new_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_appointment_scheduler_new">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_appointment_scheduler_new_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_appointment_scheduler_new_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_appointment_scheduler_new_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_appointment_scheduler_new_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_appointment_scheduler_new_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_appointment_scheduler_new_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_appointment_scheduler_new->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_appointment_scheduler_new_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_appointment_scheduler_newlist" id="fview_appointment_scheduler_newlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_appointment_scheduler_new_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_appointment_scheduler_new_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_appointment_scheduler_new">
<div id="gmp_view_appointment_scheduler_new" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_appointment_scheduler_new_list->TotalRecs > 0 || $view_appointment_scheduler_new->isAdd() || $view_appointment_scheduler_new->isCopy() || $view_appointment_scheduler_new->isGridEdit()) { ?>
<table id="tbl_view_appointment_scheduler_newlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_appointment_scheduler_new_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_appointment_scheduler_new_list->renderListOptions();

// Render list options (header, left)
$view_appointment_scheduler_new_list->ListOptions->render("header", "left");
?>
<?php if ($view_appointment_scheduler_new->patientID->Visible) { // patientID ?>
	<?php if ($view_appointment_scheduler_new->sortUrl($view_appointment_scheduler_new->patientID) == "") { ?>
		<th data-name="patientID" class="<?php echo $view_appointment_scheduler_new->patientID->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_new_patientID" class="view_appointment_scheduler_new_patientID"><div class="ew-table-header-caption"><?php echo $view_appointment_scheduler_new->patientID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patientID" class="<?php echo $view_appointment_scheduler_new->patientID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_appointment_scheduler_new->SortUrl($view_appointment_scheduler_new->patientID) ?>',1);"><div id="elh_view_appointment_scheduler_new_patientID" class="view_appointment_scheduler_new_patientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_appointment_scheduler_new->patientID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_appointment_scheduler_new->patientID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_appointment_scheduler_new->patientID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_appointment_scheduler_new->patientName->Visible) { // patientName ?>
	<?php if ($view_appointment_scheduler_new->sortUrl($view_appointment_scheduler_new->patientName) == "") { ?>
		<th data-name="patientName" class="<?php echo $view_appointment_scheduler_new->patientName->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_new_patientName" class="view_appointment_scheduler_new_patientName"><div class="ew-table-header-caption"><?php echo $view_appointment_scheduler_new->patientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patientName" class="<?php echo $view_appointment_scheduler_new->patientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_appointment_scheduler_new->SortUrl($view_appointment_scheduler_new->patientName) ?>',1);"><div id="elh_view_appointment_scheduler_new_patientName" class="view_appointment_scheduler_new_patientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_appointment_scheduler_new->patientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_appointment_scheduler_new->patientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_appointment_scheduler_new->patientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_appointment_scheduler_new->MobileNumber->Visible) { // MobileNumber ?>
	<?php if ($view_appointment_scheduler_new->sortUrl($view_appointment_scheduler_new->MobileNumber) == "") { ?>
		<th data-name="MobileNumber" class="<?php echo $view_appointment_scheduler_new->MobileNumber->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_new_MobileNumber" class="view_appointment_scheduler_new_MobileNumber"><div class="ew-table-header-caption"><?php echo $view_appointment_scheduler_new->MobileNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MobileNumber" class="<?php echo $view_appointment_scheduler_new->MobileNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_appointment_scheduler_new->SortUrl($view_appointment_scheduler_new->MobileNumber) ?>',1);"><div id="elh_view_appointment_scheduler_new_MobileNumber" class="view_appointment_scheduler_new_MobileNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_appointment_scheduler_new->MobileNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_appointment_scheduler_new->MobileNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_appointment_scheduler_new->MobileNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_appointment_scheduler_new->start_time->Visible) { // start_time ?>
	<?php if ($view_appointment_scheduler_new->sortUrl($view_appointment_scheduler_new->start_time) == "") { ?>
		<th data-name="start_time" class="<?php echo $view_appointment_scheduler_new->start_time->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_new_start_time" class="view_appointment_scheduler_new_start_time"><div class="ew-table-header-caption"><?php echo $view_appointment_scheduler_new->start_time->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="start_time" class="<?php echo $view_appointment_scheduler_new->start_time->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_appointment_scheduler_new->SortUrl($view_appointment_scheduler_new->start_time) ?>',1);"><div id="elh_view_appointment_scheduler_new_start_time" class="view_appointment_scheduler_new_start_time">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_appointment_scheduler_new->start_time->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_appointment_scheduler_new->start_time->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_appointment_scheduler_new->start_time->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_appointment_scheduler_new->Purpose->Visible) { // Purpose ?>
	<?php if ($view_appointment_scheduler_new->sortUrl($view_appointment_scheduler_new->Purpose) == "") { ?>
		<th data-name="Purpose" class="<?php echo $view_appointment_scheduler_new->Purpose->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_new_Purpose" class="view_appointment_scheduler_new_Purpose"><div class="ew-table-header-caption"><?php echo $view_appointment_scheduler_new->Purpose->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Purpose" class="<?php echo $view_appointment_scheduler_new->Purpose->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_appointment_scheduler_new->SortUrl($view_appointment_scheduler_new->Purpose) ?>',1);"><div id="elh_view_appointment_scheduler_new_Purpose" class="view_appointment_scheduler_new_Purpose">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_appointment_scheduler_new->Purpose->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_appointment_scheduler_new->Purpose->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_appointment_scheduler_new->Purpose->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_appointment_scheduler_new->patienttype->Visible) { // patienttype ?>
	<?php if ($view_appointment_scheduler_new->sortUrl($view_appointment_scheduler_new->patienttype) == "") { ?>
		<th data-name="patienttype" class="<?php echo $view_appointment_scheduler_new->patienttype->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_new_patienttype" class="view_appointment_scheduler_new_patienttype"><div class="ew-table-header-caption"><?php echo $view_appointment_scheduler_new->patienttype->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patienttype" class="<?php echo $view_appointment_scheduler_new->patienttype->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_appointment_scheduler_new->SortUrl($view_appointment_scheduler_new->patienttype) ?>',1);"><div id="elh_view_appointment_scheduler_new_patienttype" class="view_appointment_scheduler_new_patienttype">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_appointment_scheduler_new->patienttype->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_appointment_scheduler_new->patienttype->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_appointment_scheduler_new->patienttype->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_appointment_scheduler_new->Referal->Visible) { // Referal ?>
	<?php if ($view_appointment_scheduler_new->sortUrl($view_appointment_scheduler_new->Referal) == "") { ?>
		<th data-name="Referal" class="<?php echo $view_appointment_scheduler_new->Referal->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_new_Referal" class="view_appointment_scheduler_new_Referal"><div class="ew-table-header-caption"><?php echo $view_appointment_scheduler_new->Referal->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Referal" class="<?php echo $view_appointment_scheduler_new->Referal->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_appointment_scheduler_new->SortUrl($view_appointment_scheduler_new->Referal) ?>',1);"><div id="elh_view_appointment_scheduler_new_Referal" class="view_appointment_scheduler_new_Referal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_appointment_scheduler_new->Referal->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_appointment_scheduler_new->Referal->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_appointment_scheduler_new->Referal->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_appointment_scheduler_new->start_date->Visible) { // start_date ?>
	<?php if ($view_appointment_scheduler_new->sortUrl($view_appointment_scheduler_new->start_date) == "") { ?>
		<th data-name="start_date" class="<?php echo $view_appointment_scheduler_new->start_date->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_new_start_date" class="view_appointment_scheduler_new_start_date"><div class="ew-table-header-caption"><?php echo $view_appointment_scheduler_new->start_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="start_date" class="<?php echo $view_appointment_scheduler_new->start_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_appointment_scheduler_new->SortUrl($view_appointment_scheduler_new->start_date) ?>',1);"><div id="elh_view_appointment_scheduler_new_start_date" class="view_appointment_scheduler_new_start_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_appointment_scheduler_new->start_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_appointment_scheduler_new->start_date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_appointment_scheduler_new->start_date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_appointment_scheduler_new->DoctorName->Visible) { // DoctorName ?>
	<?php if ($view_appointment_scheduler_new->sortUrl($view_appointment_scheduler_new->DoctorName) == "") { ?>
		<th data-name="DoctorName" class="<?php echo $view_appointment_scheduler_new->DoctorName->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_new_DoctorName" class="view_appointment_scheduler_new_DoctorName"><div class="ew-table-header-caption"><?php echo $view_appointment_scheduler_new->DoctorName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DoctorName" class="<?php echo $view_appointment_scheduler_new->DoctorName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_appointment_scheduler_new->SortUrl($view_appointment_scheduler_new->DoctorName) ?>',1);"><div id="elh_view_appointment_scheduler_new_DoctorName" class="view_appointment_scheduler_new_DoctorName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_appointment_scheduler_new->DoctorName->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_appointment_scheduler_new->DoctorName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_appointment_scheduler_new->DoctorName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_appointment_scheduler_new->HospID->Visible) { // HospID ?>
	<?php if ($view_appointment_scheduler_new->sortUrl($view_appointment_scheduler_new->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_appointment_scheduler_new->HospID->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_new_HospID" class="view_appointment_scheduler_new_HospID"><div class="ew-table-header-caption"><?php echo $view_appointment_scheduler_new->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_appointment_scheduler_new->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_appointment_scheduler_new->SortUrl($view_appointment_scheduler_new->HospID) ?>',1);"><div id="elh_view_appointment_scheduler_new_HospID" class="view_appointment_scheduler_new_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_appointment_scheduler_new->HospID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_appointment_scheduler_new->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_appointment_scheduler_new->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_appointment_scheduler_new->Id->Visible) { // Id ?>
	<?php if ($view_appointment_scheduler_new->sortUrl($view_appointment_scheduler_new->Id) == "") { ?>
		<th data-name="Id" class="<?php echo $view_appointment_scheduler_new->Id->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_new_Id" class="view_appointment_scheduler_new_Id"><div class="ew-table-header-caption"><?php echo $view_appointment_scheduler_new->Id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Id" class="<?php echo $view_appointment_scheduler_new->Id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_appointment_scheduler_new->SortUrl($view_appointment_scheduler_new->Id) ?>',1);"><div id="elh_view_appointment_scheduler_new_Id" class="view_appointment_scheduler_new_Id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_appointment_scheduler_new->Id->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_appointment_scheduler_new->Id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_appointment_scheduler_new->Id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_appointment_scheduler_new->PatientTypee->Visible) { // PatientTypee ?>
	<?php if ($view_appointment_scheduler_new->sortUrl($view_appointment_scheduler_new->PatientTypee) == "") { ?>
		<th data-name="PatientTypee" class="<?php echo $view_appointment_scheduler_new->PatientTypee->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_new_PatientTypee" class="view_appointment_scheduler_new_PatientTypee"><div class="ew-table-header-caption"><?php echo $view_appointment_scheduler_new->PatientTypee->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientTypee" class="<?php echo $view_appointment_scheduler_new->PatientTypee->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_appointment_scheduler_new->SortUrl($view_appointment_scheduler_new->PatientTypee) ?>',1);"><div id="elh_view_appointment_scheduler_new_PatientTypee" class="view_appointment_scheduler_new_PatientTypee">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_appointment_scheduler_new->PatientTypee->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_appointment_scheduler_new->PatientTypee->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_appointment_scheduler_new->PatientTypee->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_appointment_scheduler_new->Notes->Visible) { // Notes ?>
	<?php if ($view_appointment_scheduler_new->sortUrl($view_appointment_scheduler_new->Notes) == "") { ?>
		<th data-name="Notes" class="<?php echo $view_appointment_scheduler_new->Notes->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_new_Notes" class="view_appointment_scheduler_new_Notes"><div class="ew-table-header-caption"><?php echo $view_appointment_scheduler_new->Notes->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Notes" class="<?php echo $view_appointment_scheduler_new->Notes->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_appointment_scheduler_new->SortUrl($view_appointment_scheduler_new->Notes) ?>',1);"><div id="elh_view_appointment_scheduler_new_Notes" class="view_appointment_scheduler_new_Notes">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_appointment_scheduler_new->Notes->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_appointment_scheduler_new->Notes->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_appointment_scheduler_new->Notes->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_appointment_scheduler_new_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
	if ($view_appointment_scheduler_new->isAdd() || $view_appointment_scheduler_new->isCopy()) {
		$view_appointment_scheduler_new_list->RowIndex = 0;
		$view_appointment_scheduler_new_list->KeyCount = $view_appointment_scheduler_new_list->RowIndex;
		if ($view_appointment_scheduler_new->isCopy() && !$view_appointment_scheduler_new_list->loadRow())
			$view_appointment_scheduler_new->CurrentAction = "add";
		if ($view_appointment_scheduler_new->isAdd())
			$view_appointment_scheduler_new_list->loadRowValues();
		if ($view_appointment_scheduler_new->EventCancelled) // Insert failed
			$view_appointment_scheduler_new_list->restoreFormValues(); // Restore form values

		// Set row properties
		$view_appointment_scheduler_new->resetAttributes();
		$view_appointment_scheduler_new->RowAttrs = array_merge($view_appointment_scheduler_new->RowAttrs, array('data-rowindex'=>0, 'id'=>'r0_view_appointment_scheduler_new', 'data-rowtype'=>ROWTYPE_ADD));
		$view_appointment_scheduler_new->RowType = ROWTYPE_ADD;

		// Render row
		$view_appointment_scheduler_new_list->renderRow();

		// Render list options
		$view_appointment_scheduler_new_list->renderListOptions();
		$view_appointment_scheduler_new_list->StartRowCnt = 0;
?>
	<tr<?php echo $view_appointment_scheduler_new->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_appointment_scheduler_new_list->ListOptions->render("body", "left", $view_appointment_scheduler_new_list->RowCnt);
?>
	<?php if ($view_appointment_scheduler_new->patientID->Visible) { // patientID ?>
		<td data-name="patientID">
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCnt ?>_view_appointment_scheduler_new_patientID" class="form-group view_appointment_scheduler_new_patientID">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_patientID" name="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_patientID" id="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_patientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new->patientID->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new->patientID->EditValue ?>"<?php echo $view_appointment_scheduler_new->patientID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_appointment_scheduler_new" data-field="x_patientID" name="o<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_patientID" id="o<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_patientID" value="<?php echo HtmlEncode($view_appointment_scheduler_new->patientID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler_new->patientName->Visible) { // patientName ?>
		<td data-name="patientName">
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCnt ?>_view_appointment_scheduler_new_patientName" class="form-group view_appointment_scheduler_new_patientName">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_patientName" name="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_patientName" id="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_patientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new->patientName->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new->patientName->EditValue ?>"<?php echo $view_appointment_scheduler_new->patientName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_appointment_scheduler_new" data-field="x_patientName" name="o<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_patientName" id="o<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_patientName" value="<?php echo HtmlEncode($view_appointment_scheduler_new->patientName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler_new->MobileNumber->Visible) { // MobileNumber ?>
		<td data-name="MobileNumber">
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCnt ?>_view_appointment_scheduler_new_MobileNumber" class="form-group view_appointment_scheduler_new_MobileNumber">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_MobileNumber" name="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_MobileNumber" id="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new->MobileNumber->EditValue ?>"<?php echo $view_appointment_scheduler_new->MobileNumber->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_appointment_scheduler_new" data-field="x_MobileNumber" name="o<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_MobileNumber" id="o<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($view_appointment_scheduler_new->MobileNumber->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler_new->start_time->Visible) { // start_time ?>
		<td data-name="start_time">
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCnt ?>_view_appointment_scheduler_new_start_time" class="form-group view_appointment_scheduler_new_start_time">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_start_time" data-format="3" name="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_start_time" id="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_start_time" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new->start_time->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new->start_time->EditValue ?>"<?php echo $view_appointment_scheduler_new->start_time->editAttributes() ?>>
<?php if (!$view_appointment_scheduler_new->start_time->ReadOnly && !$view_appointment_scheduler_new->start_time->Disabled && !isset($view_appointment_scheduler_new->start_time->EditAttrs["readonly"]) && !isset($view_appointment_scheduler_new->start_time->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_appointment_scheduler_newlist", "x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_start_time", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
<?php if (!$view_appointment_scheduler_new->start_time->ReadOnly && !$view_appointment_scheduler_new->start_time->Disabled && !isset($view_appointment_scheduler_new->start_time->EditAttrs["readonly"]) && !isset($view_appointment_scheduler_new->start_time->EditAttrs["disabled"])) { ?>
<script>ew.createTimePicker("fview_appointment_scheduler_newlist", "x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_start_time", {"timeFormat":"h:i A","step":15});</script><?php } ?>
</span>
<input type="hidden" data-table="view_appointment_scheduler_new" data-field="x_start_time" name="o<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_start_time" id="o<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_start_time" value="<?php echo HtmlEncode($view_appointment_scheduler_new->start_time->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler_new->Purpose->Visible) { // Purpose ?>
		<td data-name="Purpose">
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCnt ?>_view_appointment_scheduler_new_Purpose" class="form-group view_appointment_scheduler_new_Purpose">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_Purpose" name="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_Purpose" id="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_Purpose" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new->Purpose->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new->Purpose->EditValue ?>"<?php echo $view_appointment_scheduler_new->Purpose->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_appointment_scheduler_new" data-field="x_Purpose" name="o<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_Purpose" id="o<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_Purpose" value="<?php echo HtmlEncode($view_appointment_scheduler_new->Purpose->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler_new->patienttype->Visible) { // patienttype ?>
		<td data-name="patienttype">
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCnt ?>_view_appointment_scheduler_new_patienttype" class="form-group view_appointment_scheduler_new_patienttype">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_patienttype" name="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_patienttype" id="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_patienttype" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new->patienttype->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new->patienttype->EditValue ?>"<?php echo $view_appointment_scheduler_new->patienttype->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_appointment_scheduler_new" data-field="x_patienttype" name="o<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_patienttype" id="o<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_patienttype" value="<?php echo HtmlEncode($view_appointment_scheduler_new->patienttype->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler_new->Referal->Visible) { // Referal ?>
		<td data-name="Referal">
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCnt ?>_view_appointment_scheduler_new_Referal" class="form-group view_appointment_scheduler_new_Referal">
<?php
$wrkonchange = "" . trim(@$view_appointment_scheduler_new->Referal->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_appointment_scheduler_new->Referal->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_Referal" class="text-nowrap" style="z-index: <?php echo (9000 - $view_appointment_scheduler_new_list->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_Referal" id="sv_x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_Referal" value="<?php echo RemoveHtml($view_appointment_scheduler_new->Referal->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new->Referal->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new->Referal->getPlaceHolder()) ?>"<?php echo $view_appointment_scheduler_new->Referal->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_appointment_scheduler_new" data-field="x_Referal" data-value-separator="<?php echo $view_appointment_scheduler_new->Referal->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_Referal" id="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_Referal" value="<?php echo HtmlEncode($view_appointment_scheduler_new->Referal->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_appointment_scheduler_newlist.createAutoSuggest({"id":"x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_Referal","forceSelect":false});
</script>
<?php echo $view_appointment_scheduler_new->Referal->Lookup->getParamTag("p_x" . $view_appointment_scheduler_new_list->RowIndex . "_Referal") ?>
</span>
<input type="hidden" data-table="view_appointment_scheduler_new" data-field="x_Referal" name="o<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_Referal" id="o<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_Referal" value="<?php echo HtmlEncode($view_appointment_scheduler_new->Referal->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler_new->start_date->Visible) { // start_date ?>
		<td data-name="start_date">
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCnt ?>_view_appointment_scheduler_new_start_date" class="form-group view_appointment_scheduler_new_start_date">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_start_date" data-format="11" name="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_start_date" id="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_start_date" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new->start_date->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new->start_date->EditValue ?>"<?php echo $view_appointment_scheduler_new->start_date->editAttributes() ?>>
<?php if (!$view_appointment_scheduler_new->start_date->ReadOnly && !$view_appointment_scheduler_new->start_date->Disabled && !isset($view_appointment_scheduler_new->start_date->EditAttrs["readonly"]) && !isset($view_appointment_scheduler_new->start_date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_appointment_scheduler_newlist", "x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_start_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_appointment_scheduler_new" data-field="x_start_date" name="o<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_start_date" id="o<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_start_date" value="<?php echo HtmlEncode($view_appointment_scheduler_new->start_date->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler_new->DoctorName->Visible) { // DoctorName ?>
		<td data-name="DoctorName">
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCnt ?>_view_appointment_scheduler_new_DoctorName" class="form-group view_appointment_scheduler_new_DoctorName">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_appointment_scheduler_new" data-field="x_DoctorName" data-value-separator="<?php echo $view_appointment_scheduler_new->DoctorName->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_DoctorName" name="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_DoctorName"<?php echo $view_appointment_scheduler_new->DoctorName->editAttributes() ?>>
		<?php echo $view_appointment_scheduler_new->DoctorName->selectOptionListHtml("x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_DoctorName") ?>
	</select>
</div>
<?php echo $view_appointment_scheduler_new->DoctorName->Lookup->getParamTag("p_x" . $view_appointment_scheduler_new_list->RowIndex . "_DoctorName") ?>
</span>
<input type="hidden" data-table="view_appointment_scheduler_new" data-field="x_DoctorName" name="o<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_DoctorName" id="o<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_DoctorName" value="<?php echo HtmlEncode($view_appointment_scheduler_new->DoctorName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler_new->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCnt ?>_view_appointment_scheduler_new_HospID" class="form-group view_appointment_scheduler_new_HospID">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_HospID" name="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_HospID" id="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_HospID" size="30" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new->HospID->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new->HospID->EditValue ?>"<?php echo $view_appointment_scheduler_new->HospID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_appointment_scheduler_new" data-field="x_HospID" name="o<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_HospID" id="o<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_appointment_scheduler_new->HospID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler_new->Id->Visible) { // Id ?>
		<td data-name="Id">
<input type="hidden" data-table="view_appointment_scheduler_new" data-field="x_Id" name="o<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_Id" id="o<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_Id" value="<?php echo HtmlEncode($view_appointment_scheduler_new->Id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler_new->PatientTypee->Visible) { // PatientTypee ?>
		<td data-name="PatientTypee">
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCnt ?>_view_appointment_scheduler_new_PatientTypee" class="form-group view_appointment_scheduler_new_PatientTypee">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_PatientTypee" name="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_PatientTypee" id="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_PatientTypee" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new->PatientTypee->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new->PatientTypee->EditValue ?>"<?php echo $view_appointment_scheduler_new->PatientTypee->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_appointment_scheduler_new" data-field="x_PatientTypee" name="o<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_PatientTypee" id="o<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_PatientTypee" value="<?php echo HtmlEncode($view_appointment_scheduler_new->PatientTypee->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler_new->Notes->Visible) { // Notes ?>
		<td data-name="Notes">
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCnt ?>_view_appointment_scheduler_new_Notes" class="form-group view_appointment_scheduler_new_Notes">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_Notes" name="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_Notes" id="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_Notes" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new->Notes->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new->Notes->EditValue ?>"<?php echo $view_appointment_scheduler_new->Notes->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_appointment_scheduler_new" data-field="x_Notes" name="o<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_Notes" id="o<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_Notes" value="<?php echo HtmlEncode($view_appointment_scheduler_new->Notes->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_appointment_scheduler_new_list->ListOptions->render("body", "right", $view_appointment_scheduler_new_list->RowCnt);
?>
<script>
fview_appointment_scheduler_newlist.updateLists(<?php echo $view_appointment_scheduler_new_list->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
<?php
if ($view_appointment_scheduler_new->ExportAll && $view_appointment_scheduler_new->isExport()) {
	$view_appointment_scheduler_new_list->StopRec = $view_appointment_scheduler_new_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_appointment_scheduler_new_list->TotalRecs > $view_appointment_scheduler_new_list->StartRec + $view_appointment_scheduler_new_list->DisplayRecs - 1)
		$view_appointment_scheduler_new_list->StopRec = $view_appointment_scheduler_new_list->StartRec + $view_appointment_scheduler_new_list->DisplayRecs - 1;
	else
		$view_appointment_scheduler_new_list->StopRec = $view_appointment_scheduler_new_list->TotalRecs;
}

// Restore number of post back records
if ($CurrentForm && $view_appointment_scheduler_new_list->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($view_appointment_scheduler_new_list->FormKeyCountName) && ($view_appointment_scheduler_new->isGridAdd() || $view_appointment_scheduler_new->isGridEdit() || $view_appointment_scheduler_new->isConfirm())) {
		$view_appointment_scheduler_new_list->KeyCount = $CurrentForm->getValue($view_appointment_scheduler_new_list->FormKeyCountName);
		$view_appointment_scheduler_new_list->StopRec = $view_appointment_scheduler_new_list->StartRec + $view_appointment_scheduler_new_list->KeyCount - 1;
	}
}
$view_appointment_scheduler_new_list->RecCnt = $view_appointment_scheduler_new_list->StartRec - 1;
if ($view_appointment_scheduler_new_list->Recordset && !$view_appointment_scheduler_new_list->Recordset->EOF) {
	$view_appointment_scheduler_new_list->Recordset->moveFirst();
	$selectLimit = $view_appointment_scheduler_new_list->UseSelectLimit;
	if (!$selectLimit && $view_appointment_scheduler_new_list->StartRec > 1)
		$view_appointment_scheduler_new_list->Recordset->move($view_appointment_scheduler_new_list->StartRec - 1);
} elseif (!$view_appointment_scheduler_new->AllowAddDeleteRow && $view_appointment_scheduler_new_list->StopRec == 0) {
	$view_appointment_scheduler_new_list->StopRec = $view_appointment_scheduler_new->GridAddRowCount;
}

// Initialize aggregate
$view_appointment_scheduler_new->RowType = ROWTYPE_AGGREGATEINIT;
$view_appointment_scheduler_new->resetAttributes();
$view_appointment_scheduler_new_list->renderRow();
$view_appointment_scheduler_new_list->EditRowCnt = 0;
if ($view_appointment_scheduler_new->isEdit())
	$view_appointment_scheduler_new_list->RowIndex = 1;
while ($view_appointment_scheduler_new_list->RecCnt < $view_appointment_scheduler_new_list->StopRec) {
	$view_appointment_scheduler_new_list->RecCnt++;
	if ($view_appointment_scheduler_new_list->RecCnt >= $view_appointment_scheduler_new_list->StartRec) {
		$view_appointment_scheduler_new_list->RowCnt++;

		// Set up key count
		$view_appointment_scheduler_new_list->KeyCount = $view_appointment_scheduler_new_list->RowIndex;

		// Init row class and style
		$view_appointment_scheduler_new->resetAttributes();
		$view_appointment_scheduler_new->CssClass = "";
		if ($view_appointment_scheduler_new->isGridAdd()) {
			$view_appointment_scheduler_new_list->loadRowValues(); // Load default values
		} else {
			$view_appointment_scheduler_new_list->loadRowValues($view_appointment_scheduler_new_list->Recordset); // Load row values
		}
		$view_appointment_scheduler_new->RowType = ROWTYPE_VIEW; // Render view
		if ($view_appointment_scheduler_new->isEdit()) {
			if ($view_appointment_scheduler_new_list->checkInlineEditKey() && $view_appointment_scheduler_new_list->EditRowCnt == 0) { // Inline edit
				$view_appointment_scheduler_new->RowType = ROWTYPE_EDIT; // Render edit
			}
		}
		if ($view_appointment_scheduler_new->isEdit() && $view_appointment_scheduler_new->RowType == ROWTYPE_EDIT && $view_appointment_scheduler_new->EventCancelled) { // Update failed
			$CurrentForm->Index = 1;
			$view_appointment_scheduler_new_list->restoreFormValues(); // Restore form values
		}
		if ($view_appointment_scheduler_new->RowType == ROWTYPE_EDIT) // Edit row
			$view_appointment_scheduler_new_list->EditRowCnt++;

		// Set up row id / data-rowindex
		$view_appointment_scheduler_new->RowAttrs = array_merge($view_appointment_scheduler_new->RowAttrs, array('data-rowindex'=>$view_appointment_scheduler_new_list->RowCnt, 'id'=>'r' . $view_appointment_scheduler_new_list->RowCnt . '_view_appointment_scheduler_new', 'data-rowtype'=>$view_appointment_scheduler_new->RowType));

		// Render row
		$view_appointment_scheduler_new_list->renderRow();

		// Render list options
		$view_appointment_scheduler_new_list->renderListOptions();
?>
	<tr<?php echo $view_appointment_scheduler_new->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_appointment_scheduler_new_list->ListOptions->render("body", "left", $view_appointment_scheduler_new_list->RowCnt);
?>
	<?php if ($view_appointment_scheduler_new->patientID->Visible) { // patientID ?>
		<td data-name="patientID"<?php echo $view_appointment_scheduler_new->patientID->cellAttributes() ?>>
<?php if ($view_appointment_scheduler_new->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCnt ?>_view_appointment_scheduler_new_patientID" class="form-group view_appointment_scheduler_new_patientID">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_patientID" name="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_patientID" id="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_patientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new->patientID->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new->patientID->EditValue ?>"<?php echo $view_appointment_scheduler_new->patientID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_appointment_scheduler_new->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCnt ?>_view_appointment_scheduler_new_patientID" class="view_appointment_scheduler_new_patientID">
<span<?php echo $view_appointment_scheduler_new->patientID->viewAttributes() ?>>
<?php echo $view_appointment_scheduler_new->patientID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler_new->patientName->Visible) { // patientName ?>
		<td data-name="patientName"<?php echo $view_appointment_scheduler_new->patientName->cellAttributes() ?>>
<?php if ($view_appointment_scheduler_new->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCnt ?>_view_appointment_scheduler_new_patientName" class="form-group view_appointment_scheduler_new_patientName">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_patientName" name="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_patientName" id="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_patientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new->patientName->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new->patientName->EditValue ?>"<?php echo $view_appointment_scheduler_new->patientName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_appointment_scheduler_new->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCnt ?>_view_appointment_scheduler_new_patientName" class="view_appointment_scheduler_new_patientName">
<span<?php echo $view_appointment_scheduler_new->patientName->viewAttributes() ?>>
<?php echo $view_appointment_scheduler_new->patientName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler_new->MobileNumber->Visible) { // MobileNumber ?>
		<td data-name="MobileNumber"<?php echo $view_appointment_scheduler_new->MobileNumber->cellAttributes() ?>>
<?php if ($view_appointment_scheduler_new->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCnt ?>_view_appointment_scheduler_new_MobileNumber" class="form-group view_appointment_scheduler_new_MobileNumber">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_MobileNumber" name="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_MobileNumber" id="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new->MobileNumber->EditValue ?>"<?php echo $view_appointment_scheduler_new->MobileNumber->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_appointment_scheduler_new->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCnt ?>_view_appointment_scheduler_new_MobileNumber" class="view_appointment_scheduler_new_MobileNumber">
<span<?php echo $view_appointment_scheduler_new->MobileNumber->viewAttributes() ?>>
<?php echo $view_appointment_scheduler_new->MobileNumber->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler_new->start_time->Visible) { // start_time ?>
		<td data-name="start_time"<?php echo $view_appointment_scheduler_new->start_time->cellAttributes() ?>>
<?php if ($view_appointment_scheduler_new->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCnt ?>_view_appointment_scheduler_new_start_time" class="form-group view_appointment_scheduler_new_start_time">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_start_time" data-format="3" name="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_start_time" id="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_start_time" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new->start_time->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new->start_time->EditValue ?>"<?php echo $view_appointment_scheduler_new->start_time->editAttributes() ?>>
<?php if (!$view_appointment_scheduler_new->start_time->ReadOnly && !$view_appointment_scheduler_new->start_time->Disabled && !isset($view_appointment_scheduler_new->start_time->EditAttrs["readonly"]) && !isset($view_appointment_scheduler_new->start_time->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_appointment_scheduler_newlist", "x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_start_time", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
<?php if (!$view_appointment_scheduler_new->start_time->ReadOnly && !$view_appointment_scheduler_new->start_time->Disabled && !isset($view_appointment_scheduler_new->start_time->EditAttrs["readonly"]) && !isset($view_appointment_scheduler_new->start_time->EditAttrs["disabled"])) { ?>
<script>ew.createTimePicker("fview_appointment_scheduler_newlist", "x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_start_time", {"timeFormat":"h:i A","step":15});</script><?php } ?>
</span>
<?php } ?>
<?php if ($view_appointment_scheduler_new->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCnt ?>_view_appointment_scheduler_new_start_time" class="view_appointment_scheduler_new_start_time">
<span<?php echo $view_appointment_scheduler_new->start_time->viewAttributes() ?>>
<?php echo $view_appointment_scheduler_new->start_time->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler_new->Purpose->Visible) { // Purpose ?>
		<td data-name="Purpose"<?php echo $view_appointment_scheduler_new->Purpose->cellAttributes() ?>>
<?php if ($view_appointment_scheduler_new->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCnt ?>_view_appointment_scheduler_new_Purpose" class="form-group view_appointment_scheduler_new_Purpose">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_Purpose" name="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_Purpose" id="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_Purpose" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new->Purpose->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new->Purpose->EditValue ?>"<?php echo $view_appointment_scheduler_new->Purpose->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_appointment_scheduler_new->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCnt ?>_view_appointment_scheduler_new_Purpose" class="view_appointment_scheduler_new_Purpose">
<span<?php echo $view_appointment_scheduler_new->Purpose->viewAttributes() ?>>
<?php echo $view_appointment_scheduler_new->Purpose->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler_new->patienttype->Visible) { // patienttype ?>
		<td data-name="patienttype"<?php echo $view_appointment_scheduler_new->patienttype->cellAttributes() ?>>
<?php if ($view_appointment_scheduler_new->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCnt ?>_view_appointment_scheduler_new_patienttype" class="form-group view_appointment_scheduler_new_patienttype">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_patienttype" name="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_patienttype" id="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_patienttype" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new->patienttype->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new->patienttype->EditValue ?>"<?php echo $view_appointment_scheduler_new->patienttype->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_appointment_scheduler_new->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCnt ?>_view_appointment_scheduler_new_patienttype" class="view_appointment_scheduler_new_patienttype">
<span<?php echo $view_appointment_scheduler_new->patienttype->viewAttributes() ?>>
<?php echo $view_appointment_scheduler_new->patienttype->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler_new->Referal->Visible) { // Referal ?>
		<td data-name="Referal"<?php echo $view_appointment_scheduler_new->Referal->cellAttributes() ?>>
<?php if ($view_appointment_scheduler_new->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCnt ?>_view_appointment_scheduler_new_Referal" class="form-group view_appointment_scheduler_new_Referal">
<?php
$wrkonchange = "" . trim(@$view_appointment_scheduler_new->Referal->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_appointment_scheduler_new->Referal->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_Referal" class="text-nowrap" style="z-index: <?php echo (9000 - $view_appointment_scheduler_new_list->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_Referal" id="sv_x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_Referal" value="<?php echo RemoveHtml($view_appointment_scheduler_new->Referal->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new->Referal->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new->Referal->getPlaceHolder()) ?>"<?php echo $view_appointment_scheduler_new->Referal->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_appointment_scheduler_new" data-field="x_Referal" data-value-separator="<?php echo $view_appointment_scheduler_new->Referal->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_Referal" id="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_Referal" value="<?php echo HtmlEncode($view_appointment_scheduler_new->Referal->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_appointment_scheduler_newlist.createAutoSuggest({"id":"x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_Referal","forceSelect":false});
</script>
<?php echo $view_appointment_scheduler_new->Referal->Lookup->getParamTag("p_x" . $view_appointment_scheduler_new_list->RowIndex . "_Referal") ?>
</span>
<?php } ?>
<?php if ($view_appointment_scheduler_new->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCnt ?>_view_appointment_scheduler_new_Referal" class="view_appointment_scheduler_new_Referal">
<span<?php echo $view_appointment_scheduler_new->Referal->viewAttributes() ?>>
<?php echo $view_appointment_scheduler_new->Referal->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler_new->start_date->Visible) { // start_date ?>
		<td data-name="start_date"<?php echo $view_appointment_scheduler_new->start_date->cellAttributes() ?>>
<?php if ($view_appointment_scheduler_new->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCnt ?>_view_appointment_scheduler_new_start_date" class="form-group view_appointment_scheduler_new_start_date">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_start_date" data-format="11" name="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_start_date" id="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_start_date" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new->start_date->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new->start_date->EditValue ?>"<?php echo $view_appointment_scheduler_new->start_date->editAttributes() ?>>
<?php if (!$view_appointment_scheduler_new->start_date->ReadOnly && !$view_appointment_scheduler_new->start_date->Disabled && !isset($view_appointment_scheduler_new->start_date->EditAttrs["readonly"]) && !isset($view_appointment_scheduler_new->start_date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_appointment_scheduler_newlist", "x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_start_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_appointment_scheduler_new->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCnt ?>_view_appointment_scheduler_new_start_date" class="view_appointment_scheduler_new_start_date">
<span<?php echo $view_appointment_scheduler_new->start_date->viewAttributes() ?>>
<?php echo $view_appointment_scheduler_new->start_date->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler_new->DoctorName->Visible) { // DoctorName ?>
		<td data-name="DoctorName"<?php echo $view_appointment_scheduler_new->DoctorName->cellAttributes() ?>>
<?php if ($view_appointment_scheduler_new->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCnt ?>_view_appointment_scheduler_new_DoctorName" class="form-group view_appointment_scheduler_new_DoctorName">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_appointment_scheduler_new" data-field="x_DoctorName" data-value-separator="<?php echo $view_appointment_scheduler_new->DoctorName->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_DoctorName" name="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_DoctorName"<?php echo $view_appointment_scheduler_new->DoctorName->editAttributes() ?>>
		<?php echo $view_appointment_scheduler_new->DoctorName->selectOptionListHtml("x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_DoctorName") ?>
	</select>
</div>
<?php echo $view_appointment_scheduler_new->DoctorName->Lookup->getParamTag("p_x" . $view_appointment_scheduler_new_list->RowIndex . "_DoctorName") ?>
</span>
<?php } ?>
<?php if ($view_appointment_scheduler_new->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCnt ?>_view_appointment_scheduler_new_DoctorName" class="view_appointment_scheduler_new_DoctorName">
<span<?php echo $view_appointment_scheduler_new->DoctorName->viewAttributes() ?>>
<?php echo $view_appointment_scheduler_new->DoctorName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler_new->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_appointment_scheduler_new->HospID->cellAttributes() ?>>
<?php if ($view_appointment_scheduler_new->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCnt ?>_view_appointment_scheduler_new_HospID" class="form-group view_appointment_scheduler_new_HospID">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_HospID" name="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_HospID" id="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_HospID" size="30" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new->HospID->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new->HospID->EditValue ?>"<?php echo $view_appointment_scheduler_new->HospID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_appointment_scheduler_new->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCnt ?>_view_appointment_scheduler_new_HospID" class="view_appointment_scheduler_new_HospID">
<span<?php echo $view_appointment_scheduler_new->HospID->viewAttributes() ?>>
<?php echo $view_appointment_scheduler_new->HospID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler_new->Id->Visible) { // Id ?>
		<td data-name="Id"<?php echo $view_appointment_scheduler_new->Id->cellAttributes() ?>>
<?php if ($view_appointment_scheduler_new->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCnt ?>_view_appointment_scheduler_new_Id" class="form-group view_appointment_scheduler_new_Id">
<span<?php echo $view_appointment_scheduler_new->Id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_appointment_scheduler_new->Id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_appointment_scheduler_new" data-field="x_Id" name="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_Id" id="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_Id" value="<?php echo HtmlEncode($view_appointment_scheduler_new->Id->CurrentValue) ?>">
<?php } ?>
<?php if ($view_appointment_scheduler_new->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCnt ?>_view_appointment_scheduler_new_Id" class="view_appointment_scheduler_new_Id">
<span<?php echo $view_appointment_scheduler_new->Id->viewAttributes() ?>>
<?php echo $view_appointment_scheduler_new->Id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler_new->PatientTypee->Visible) { // PatientTypee ?>
		<td data-name="PatientTypee"<?php echo $view_appointment_scheduler_new->PatientTypee->cellAttributes() ?>>
<?php if ($view_appointment_scheduler_new->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCnt ?>_view_appointment_scheduler_new_PatientTypee" class="form-group view_appointment_scheduler_new_PatientTypee">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_PatientTypee" name="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_PatientTypee" id="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_PatientTypee" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new->PatientTypee->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new->PatientTypee->EditValue ?>"<?php echo $view_appointment_scheduler_new->PatientTypee->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_appointment_scheduler_new->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCnt ?>_view_appointment_scheduler_new_PatientTypee" class="view_appointment_scheduler_new_PatientTypee">
<span<?php echo $view_appointment_scheduler_new->PatientTypee->viewAttributes() ?>>
<?php echo $view_appointment_scheduler_new->PatientTypee->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler_new->Notes->Visible) { // Notes ?>
		<td data-name="Notes"<?php echo $view_appointment_scheduler_new->Notes->cellAttributes() ?>>
<?php if ($view_appointment_scheduler_new->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCnt ?>_view_appointment_scheduler_new_Notes" class="form-group view_appointment_scheduler_new_Notes">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_Notes" name="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_Notes" id="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_Notes" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new->Notes->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new->Notes->EditValue ?>"<?php echo $view_appointment_scheduler_new->Notes->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_appointment_scheduler_new->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCnt ?>_view_appointment_scheduler_new_Notes" class="view_appointment_scheduler_new_Notes">
<span<?php echo $view_appointment_scheduler_new->Notes->viewAttributes() ?>>
<?php echo $view_appointment_scheduler_new->Notes->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_appointment_scheduler_new_list->ListOptions->render("body", "right", $view_appointment_scheduler_new_list->RowCnt);
?>
	</tr>
<?php if ($view_appointment_scheduler_new->RowType == ROWTYPE_ADD || $view_appointment_scheduler_new->RowType == ROWTYPE_EDIT) { ?>
<script>
fview_appointment_scheduler_newlist.updateLists(<?php echo $view_appointment_scheduler_new_list->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	if (!$view_appointment_scheduler_new->isGridAdd())
		$view_appointment_scheduler_new_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if ($view_appointment_scheduler_new->isAdd() || $view_appointment_scheduler_new->isCopy()) { ?>
<input type="hidden" name="<?php echo $view_appointment_scheduler_new_list->FormKeyCountName ?>" id="<?php echo $view_appointment_scheduler_new_list->FormKeyCountName ?>" value="<?php echo $view_appointment_scheduler_new_list->KeyCount ?>">
<?php } ?>
<?php if ($view_appointment_scheduler_new->isEdit()) { ?>
<input type="hidden" name="<?php echo $view_appointment_scheduler_new_list->FormKeyCountName ?>" id="<?php echo $view_appointment_scheduler_new_list->FormKeyCountName ?>" value="<?php echo $view_appointment_scheduler_new_list->KeyCount ?>">
<?php } ?>
<?php if (!$view_appointment_scheduler_new->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_appointment_scheduler_new_list->Recordset)
	$view_appointment_scheduler_new_list->Recordset->Close();
?>
<?php if (!$view_appointment_scheduler_new->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_appointment_scheduler_new->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_appointment_scheduler_new_list->Pager)) $view_appointment_scheduler_new_list->Pager = new NumericPager($view_appointment_scheduler_new_list->StartRec, $view_appointment_scheduler_new_list->DisplayRecs, $view_appointment_scheduler_new_list->TotalRecs, $view_appointment_scheduler_new_list->RecRange, $view_appointment_scheduler_new_list->AutoHidePager) ?>
<?php if ($view_appointment_scheduler_new_list->Pager->RecordCount > 0 && $view_appointment_scheduler_new_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_appointment_scheduler_new_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_appointment_scheduler_new_list->pageUrl() ?>start=<?php echo $view_appointment_scheduler_new_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_appointment_scheduler_new_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_appointment_scheduler_new_list->pageUrl() ?>start=<?php echo $view_appointment_scheduler_new_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_appointment_scheduler_new_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_appointment_scheduler_new_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_appointment_scheduler_new_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_appointment_scheduler_new_list->pageUrl() ?>start=<?php echo $view_appointment_scheduler_new_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_appointment_scheduler_new_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_appointment_scheduler_new_list->pageUrl() ?>start=<?php echo $view_appointment_scheduler_new_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_appointment_scheduler_new_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_appointment_scheduler_new_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_appointment_scheduler_new_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_appointment_scheduler_new_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_appointment_scheduler_new_list->TotalRecs > 0 && (!$view_appointment_scheduler_new_list->AutoHidePageSizeSelector || $view_appointment_scheduler_new_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_appointment_scheduler_new">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_appointment_scheduler_new_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_appointment_scheduler_new_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_appointment_scheduler_new_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_appointment_scheduler_new_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_appointment_scheduler_new_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_appointment_scheduler_new_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_appointment_scheduler_new->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_appointment_scheduler_new_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_appointment_scheduler_new_list->TotalRecs == 0 && !$view_appointment_scheduler_new->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_appointment_scheduler_new_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_appointment_scheduler_new_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_appointment_scheduler_new->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_appointment_scheduler_new->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_appointment_scheduler_new", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_appointment_scheduler_new_list->terminate();
?>