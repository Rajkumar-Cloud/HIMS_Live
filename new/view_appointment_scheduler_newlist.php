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
<?php include_once "header.php"; ?>
<?php if (!$view_appointment_scheduler_new_list->isExport()) { ?>
<script>
var fview_appointment_scheduler_newlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fview_appointment_scheduler_newlist = currentForm = new ew.Form("fview_appointment_scheduler_newlist", "list");
	fview_appointment_scheduler_newlist.formKeyCountName = '<?php echo $view_appointment_scheduler_new_list->FormKeyCountName ?>';

	// Validate form
	fview_appointment_scheduler_newlist.validate = function() {
		if (!this.validateRequired)
			return true; // Ignore validation
		var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
		if ($fobj.find("#confirm").val() == "confirm")
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
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler_new_list->patientID->caption(), $view_appointment_scheduler_new_list->patientID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_appointment_scheduler_new_list->patientName->Required) { ?>
				elm = this.getElements("x" + infix + "_patientName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler_new_list->patientName->caption(), $view_appointment_scheduler_new_list->patientName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_appointment_scheduler_new_list->MobileNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_MobileNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler_new_list->MobileNumber->caption(), $view_appointment_scheduler_new_list->MobileNumber->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_appointment_scheduler_new_list->start_time->Required) { ?>
				elm = this.getElements("x" + infix + "_start_time");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler_new_list->start_time->caption(), $view_appointment_scheduler_new_list->start_time->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_start_time");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_appointment_scheduler_new_list->start_time->errorMessage()) ?>");
			<?php if ($view_appointment_scheduler_new_list->Purpose->Required) { ?>
				elm = this.getElements("x" + infix + "_Purpose");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler_new_list->Purpose->caption(), $view_appointment_scheduler_new_list->Purpose->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_appointment_scheduler_new_list->patienttype->Required) { ?>
				elm = this.getElements("x" + infix + "_patienttype");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler_new_list->patienttype->caption(), $view_appointment_scheduler_new_list->patienttype->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_appointment_scheduler_new_list->Referal->Required) { ?>
				elm = this.getElements("x" + infix + "_Referal");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler_new_list->Referal->caption(), $view_appointment_scheduler_new_list->Referal->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_appointment_scheduler_new_list->start_date->Required) { ?>
				elm = this.getElements("x" + infix + "_start_date");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler_new_list->start_date->caption(), $view_appointment_scheduler_new_list->start_date->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_start_date");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_appointment_scheduler_new_list->start_date->errorMessage()) ?>");
			<?php if ($view_appointment_scheduler_new_list->DoctorName->Required) { ?>
				elm = this.getElements("x" + infix + "_DoctorName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler_new_list->DoctorName->caption(), $view_appointment_scheduler_new_list->DoctorName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_appointment_scheduler_new_list->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler_new_list->HospID->caption(), $view_appointment_scheduler_new_list->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($view_appointment_scheduler_new_list->HospID->errorMessage()) ?>");
			<?php if ($view_appointment_scheduler_new_list->Id->Required) { ?>
				elm = this.getElements("x" + infix + "_Id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler_new_list->Id->caption(), $view_appointment_scheduler_new_list->Id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_appointment_scheduler_new_list->PatientTypee->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientTypee");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler_new_list->PatientTypee->caption(), $view_appointment_scheduler_new_list->PatientTypee->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($view_appointment_scheduler_new_list->Notes->Required) { ?>
				elm = this.getElements("x" + infix + "_Notes");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_appointment_scheduler_new_list->Notes->caption(), $view_appointment_scheduler_new_list->Notes->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
		}
		return true;
	}

	// Form_CustomValidate
	fview_appointment_scheduler_newlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_appointment_scheduler_newlist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fview_appointment_scheduler_newlist.lists["x_Referal"] = <?php echo $view_appointment_scheduler_new_list->Referal->Lookup->toClientList($view_appointment_scheduler_new_list) ?>;
	fview_appointment_scheduler_newlist.lists["x_Referal"].options = <?php echo JsonEncode($view_appointment_scheduler_new_list->Referal->lookupOptions()) ?>;
	fview_appointment_scheduler_newlist.autoSuggests["x_Referal"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fview_appointment_scheduler_newlist.lists["x_DoctorName"] = <?php echo $view_appointment_scheduler_new_list->DoctorName->Lookup->toClientList($view_appointment_scheduler_new_list) ?>;
	fview_appointment_scheduler_newlist.lists["x_DoctorName"].options = <?php echo JsonEncode($view_appointment_scheduler_new_list->DoctorName->lookupOptions()) ?>;
	loadjs.done("fview_appointment_scheduler_newlist");
});
var fview_appointment_scheduler_newlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fview_appointment_scheduler_newlistsrch = currentSearchForm = new ew.Form("fview_appointment_scheduler_newlistsrch");

	// Validate function for search
	fview_appointment_scheduler_newlistsrch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_start_date");
		if (elm && !ew.checkEuroDate(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_appointment_scheduler_new_list->start_date->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fview_appointment_scheduler_newlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_appointment_scheduler_newlistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fview_appointment_scheduler_newlistsrch.lists["x_DoctorName"] = <?php echo $view_appointment_scheduler_new_list->DoctorName->Lookup->toClientList($view_appointment_scheduler_new_list) ?>;
	fview_appointment_scheduler_newlistsrch.lists["x_DoctorName"].options = <?php echo JsonEncode($view_appointment_scheduler_new_list->DoctorName->lookupOptions()) ?>;

	// Filters
	fview_appointment_scheduler_newlistsrch.filterList = <?php echo $view_appointment_scheduler_new_list->getFilterList() ?>;
	loadjs.done("fview_appointment_scheduler_newlistsrch");
});
</script>
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
<script>
loadjs.ready("head", function() {
	ew.PREVIEW_PLACEMENT = ew.CSS_FLIP ? "left" : "right";
	ew.PREVIEW_SINGLE_ROW = false;
	ew.PREVIEW_OVERLAY = false;
	loadjs("js/ewpreview.js", "preview");
});
</script>
<script>
ew.ready("head", "js/ewfixedheadertable.js", "fixedheadertable");
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$view_appointment_scheduler_new_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_appointment_scheduler_new_list->TotalRecords > 0 && $view_appointment_scheduler_new_list->ExportOptions->visible()) { ?>
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
<?php if (!$view_appointment_scheduler_new_list->isExport() && !$view_appointment_scheduler_new->CurrentAction) { ?>
<form name="fview_appointment_scheduler_newlistsrch" id="fview_appointment_scheduler_newlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fview_appointment_scheduler_newlistsrch-search-panel" class="<?php echo $view_appointment_scheduler_new_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_appointment_scheduler_new">
	<div class="ew-extended-search">
<?php

// Render search row
$view_appointment_scheduler_new->RowType = ROWTYPE_SEARCH;
$view_appointment_scheduler_new->resetAttributes();
$view_appointment_scheduler_new_list->renderRow();
?>
<?php if ($view_appointment_scheduler_new_list->patientName->Visible) { // patientName ?>
	<?php
		$view_appointment_scheduler_new_list->SearchColumnCount++;
		if (($view_appointment_scheduler_new_list->SearchColumnCount - 1) % $view_appointment_scheduler_new_list->SearchFieldsPerRow == 0) {
			$view_appointment_scheduler_new_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_appointment_scheduler_new_list->SearchRowCount ?>" class="ew-row d-sm-flex d-none">
	<?php
		}
	 ?>
	<div id="xsc_patientName" class="ew-cell form-group">
		<script id="tpsc_view_appointment_scheduler_new_patientName" type="text/html"><label for="x_patientName" class="ew-search-caption ew-label"><?php echo $view_appointment_scheduler_new_list->patientName->caption() ?></label></script>
		<script id="tpz_view_appointment_scheduler_new_patientName" type="text/html"><span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_patientName" id="z_patientName" value="LIKE">
</span></script>
		<script id="tpx_view_appointment_scheduler_new_patientName" type="text/html"><span id="el_view_appointment_scheduler_new_patientName" class="ew-search-field">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_patientName" name="x_patientName" id="x_patientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new_list->patientName->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new_list->patientName->EditValue ?>"<?php echo $view_appointment_scheduler_new_list->patientName->editAttributes() ?>>
</span></script>
		<script id="tpv_view_appointment_scheduler_new_patientName" type="text/html">
		</script>
	</div>
	<?php if ($view_appointment_scheduler_new_list->SearchColumnCount % $view_appointment_scheduler_new_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_appointment_scheduler_new_list->MobileNumber->Visible) { // MobileNumber ?>
	<?php
		$view_appointment_scheduler_new_list->SearchColumnCount++;
		if (($view_appointment_scheduler_new_list->SearchColumnCount - 1) % $view_appointment_scheduler_new_list->SearchFieldsPerRow == 0) {
			$view_appointment_scheduler_new_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_appointment_scheduler_new_list->SearchRowCount ?>" class="ew-row d-sm-flex d-none">
	<?php
		}
	 ?>
	<div id="xsc_MobileNumber" class="ew-cell form-group">
		<script id="tpsc_view_appointment_scheduler_new_MobileNumber" type="text/html"><label for="x_MobileNumber" class="ew-search-caption ew-label"><?php echo $view_appointment_scheduler_new_list->MobileNumber->caption() ?></label></script>
		<script id="tpz_view_appointment_scheduler_new_MobileNumber" type="text/html"><span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_MobileNumber" id="z_MobileNumber" value="LIKE">
</span></script>
		<script id="tpx_view_appointment_scheduler_new_MobileNumber" type="text/html"><span id="el_view_appointment_scheduler_new_MobileNumber" class="ew-search-field">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_MobileNumber" name="x_MobileNumber" id="x_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new_list->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new_list->MobileNumber->EditValue ?>"<?php echo $view_appointment_scheduler_new_list->MobileNumber->editAttributes() ?>>
</span></script>
		<script id="tpv_view_appointment_scheduler_new_MobileNumber" type="text/html">
		</script>
	</div>
	<?php if ($view_appointment_scheduler_new_list->SearchColumnCount % $view_appointment_scheduler_new_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_appointment_scheduler_new_list->start_date->Visible) { // start_date ?>
	<?php
		$view_appointment_scheduler_new_list->SearchColumnCount++;
		if (($view_appointment_scheduler_new_list->SearchColumnCount - 1) % $view_appointment_scheduler_new_list->SearchFieldsPerRow == 0) {
			$view_appointment_scheduler_new_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_appointment_scheduler_new_list->SearchRowCount ?>" class="ew-row d-sm-flex d-none">
	<?php
		}
	 ?>
	<div id="xsc_start_date" class="ew-cell form-group">
		<script id="tpsc_view_appointment_scheduler_new_start_date" type="text/html"><label for="x_start_date" class="ew-search-caption ew-label"><?php echo $view_appointment_scheduler_new_list->start_date->caption() ?></label></script>
		<script id="tpz_view_appointment_scheduler_new_start_date" type="text/html"><span class="ew-search-operator">
<select name="z_start_date" id="z_start_date" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?php echo $view_appointment_scheduler_new_list->start_date->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?php echo $Language->phrase("EQUAL") ?></option>
<option value="<>"<?php echo $view_appointment_scheduler_new_list->start_date->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?php echo $Language->phrase("<>") ?></option>
<option value="<"<?php echo $view_appointment_scheduler_new_list->start_date->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?php echo $Language->phrase("<") ?></option>
<option value="<="<?php echo $view_appointment_scheduler_new_list->start_date->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?php echo $Language->phrase("<=") ?></option>
<option value=">"<?php echo $view_appointment_scheduler_new_list->start_date->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?php echo $Language->phrase(">") ?></option>
<option value=">="<?php echo $view_appointment_scheduler_new_list->start_date->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?php echo $Language->phrase(">=") ?></option>
<option value="IS NULL"<?php echo $view_appointment_scheduler_new_list->start_date->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?php echo $view_appointment_scheduler_new_list->start_date->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?php echo $view_appointment_scheduler_new_list->start_date->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?php echo $Language->phrase("BETWEEN") ?></option>
</select>
</span></script>
		<script id="tpx_view_appointment_scheduler_new_start_date" type="text/html"><span id="el_view_appointment_scheduler_new_start_date" class="ew-search-field">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_start_date" data-format="11" name="x_start_date" id="x_start_date" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new_list->start_date->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new_list->start_date->EditValue ?>"<?php echo $view_appointment_scheduler_new_list->start_date->editAttributes() ?>>
<?php if (!$view_appointment_scheduler_new_list->start_date->ReadOnly && !$view_appointment_scheduler_new_list->start_date->Disabled && !isset($view_appointment_scheduler_new_list->start_date->EditAttrs["readonly"]) && !isset($view_appointment_scheduler_new_list->start_date->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script><script type="text/html" class="view_appointment_scheduler_newextendedsearch_js">
loadjs.ready(["fview_appointment_scheduler_newlistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_appointment_scheduler_newlistsrch", "x_start_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
		<script id="tpv_view_appointment_scheduler_new_start_date" type="text/html">
		<span class="ew-search-and d-none"><label><?php echo $Language->phrase("AND") ?></label></span>
		</script>
		<script id="tpy_view_appointment_scheduler_new_start_date" type="text/html"><span id="el2_view_appointment_scheduler_new_start_date" class="ew-search-field2 d-none">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_start_date" data-format="11" name="y_start_date" id="y_start_date" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new_list->start_date->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new_list->start_date->EditValue2 ?>"<?php echo $view_appointment_scheduler_new_list->start_date->editAttributes() ?>>
<?php if (!$view_appointment_scheduler_new_list->start_date->ReadOnly && !$view_appointment_scheduler_new_list->start_date->Disabled && !isset($view_appointment_scheduler_new_list->start_date->EditAttrs["readonly"]) && !isset($view_appointment_scheduler_new_list->start_date->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script><script type="text/html" class="view_appointment_scheduler_newextendedsearch_js">
loadjs.ready(["fview_appointment_scheduler_newlistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_appointment_scheduler_newlistsrch", "y_start_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
	</div>
	<?php if ($view_appointment_scheduler_new_list->SearchColumnCount % $view_appointment_scheduler_new_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_appointment_scheduler_new_list->DoctorName->Visible) { // DoctorName ?>
	<?php
		$view_appointment_scheduler_new_list->SearchColumnCount++;
		if (($view_appointment_scheduler_new_list->SearchColumnCount - 1) % $view_appointment_scheduler_new_list->SearchFieldsPerRow == 0) {
			$view_appointment_scheduler_new_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_appointment_scheduler_new_list->SearchRowCount ?>" class="ew-row d-sm-flex d-none">
	<?php
		}
	 ?>
	<div id="xsc_DoctorName" class="ew-cell form-group">
		<script id="tpsc_view_appointment_scheduler_new_DoctorName" type="text/html"><label for="x_DoctorName" class="ew-search-caption ew-label"><?php echo $view_appointment_scheduler_new_list->DoctorName->caption() ?></label></script>
		<script id="tpz_view_appointment_scheduler_new_DoctorName" type="text/html"><span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DoctorName" id="z_DoctorName" value="LIKE">
</span></script>
		<script id="tpx_view_appointment_scheduler_new_DoctorName" type="text/html"><span id="el_view_appointment_scheduler_new_DoctorName" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_appointment_scheduler_new" data-field="x_DoctorName" data-value-separator="<?php echo $view_appointment_scheduler_new_list->DoctorName->displayValueSeparatorAttribute() ?>" id="x_DoctorName" name="x_DoctorName"<?php echo $view_appointment_scheduler_new_list->DoctorName->editAttributes() ?>>
			<?php echo $view_appointment_scheduler_new_list->DoctorName->selectOptionListHtml("x_DoctorName") ?>
		</select>
</div>
<?php echo $view_appointment_scheduler_new_list->DoctorName->Lookup->getParamTag($view_appointment_scheduler_new_list, "p_x_DoctorName") ?>
</span></script>
		<script id="tpv_view_appointment_scheduler_new_DoctorName" type="text/html">
		</script>
	</div>
	<?php if ($view_appointment_scheduler_new_list->SearchColumnCount % $view_appointment_scheduler_new_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($view_appointment_scheduler_new_list->SearchColumnCount % $view_appointment_scheduler_new_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="tpsd_view_appointment_scheduler_newlist" class="ew-custom-template-search"></div>
<script id="tpsm_view_appointment_scheduler_newlist" type="text/html">
<div id="view_appointment_scheduler_newlist"><table class="ew-table">
	 <tbody>
		<tr><td><?php echo $view_appointment_scheduler_new_list->patientName->caption() ?>&nbsp;{{include tmpl=~getTemplate("#tpz_view_appointment_scheduler_new_patientName")/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_appointment_scheduler_new_patientName")/}}</td><td><?php echo $view_appointment_scheduler_new_list->MobileNumber->caption() ?>&nbsp;{{include tmpl=~getTemplate("#tpz_view_appointment_scheduler_new_MobileNumber")/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_appointment_scheduler_new_MobileNumber")/}}</td></tr>
			<tr><td><?php echo $view_appointment_scheduler_new_list->DoctorName->caption() ?>&nbsp;{{include tmpl=~getTemplate("#tpz_view_appointment_scheduler_new_DoctorName")/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_appointment_scheduler_new_DoctorName")/}}</td></tr>
		</tbody>
</table>
		<div class="info-box row" style="width:100%;"><span class="info-box-icon bg-info elevation-1"><i class="fas fa-calendar"></i></span>&nbsp;&nbsp;<?php echo $view_appointment_scheduler_new_list->start_date->caption() ?>&nbsp;{{include tmpl=~getTemplate("#tpz_view_appointment_scheduler_new_start_date")/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_appointment_scheduler_new_start_date")/}}&nbsp;{{include tmpl=~getTemplate("#tpv_view_appointment_scheduler_new_start_date")/}}&nbsp;{{include tmpl=~getTemplate("#tpy_view_appointment_scheduler_new_start_date")/}}</div>
</div>
</script>

<div id="xsr_<?php echo $view_appointment_scheduler_new_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($view_appointment_scheduler_new_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($view_appointment_scheduler_new_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_appointment_scheduler_new_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_appointment_scheduler_new_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_appointment_scheduler_new_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_appointment_scheduler_new_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_appointment_scheduler_new_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	ew.applyTemplate("tpsd_view_appointment_scheduler_newlist", "tpsm_view_appointment_scheduler_newlist");
	jQuery("script.view_appointment_scheduler_newextendedsearch_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php } ?>
<?php } ?>
<?php $view_appointment_scheduler_new_list->showPageHeader(); ?>
<?php
$view_appointment_scheduler_new_list->showMessage();
?>
<?php if ($view_appointment_scheduler_new_list->TotalRecords > 0 || $view_appointment_scheduler_new->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_appointment_scheduler_new_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_appointment_scheduler_new">
<?php if (!$view_appointment_scheduler_new_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_appointment_scheduler_new_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_appointment_scheduler_new_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_appointment_scheduler_new_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_appointment_scheduler_newlist" id="fview_appointment_scheduler_newlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_appointment_scheduler_new">
<div id="gmp_view_appointment_scheduler_new" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($view_appointment_scheduler_new_list->TotalRecords > 0 || $view_appointment_scheduler_new_list->isAdd() || $view_appointment_scheduler_new_list->isCopy() || $view_appointment_scheduler_new_list->isGridEdit()) { ?>
<table id="tbl_view_appointment_scheduler_newlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_appointment_scheduler_new->RowType = ROWTYPE_HEADER;

// Render list options
$view_appointment_scheduler_new_list->renderListOptions();

// Render list options (header, left)
$view_appointment_scheduler_new_list->ListOptions->render("header", "left");
?>
<?php if ($view_appointment_scheduler_new_list->patientID->Visible) { // patientID ?>
	<?php if ($view_appointment_scheduler_new_list->SortUrl($view_appointment_scheduler_new_list->patientID) == "") { ?>
		<th data-name="patientID" class="<?php echo $view_appointment_scheduler_new_list->patientID->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_new_patientID" class="view_appointment_scheduler_new_patientID"><div class="ew-table-header-caption"><?php echo $view_appointment_scheduler_new_list->patientID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patientID" class="<?php echo $view_appointment_scheduler_new_list->patientID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_appointment_scheduler_new_list->SortUrl($view_appointment_scheduler_new_list->patientID) ?>', 1);"><div id="elh_view_appointment_scheduler_new_patientID" class="view_appointment_scheduler_new_patientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_appointment_scheduler_new_list->patientID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_appointment_scheduler_new_list->patientID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_appointment_scheduler_new_list->patientID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_appointment_scheduler_new_list->patientName->Visible) { // patientName ?>
	<?php if ($view_appointment_scheduler_new_list->SortUrl($view_appointment_scheduler_new_list->patientName) == "") { ?>
		<th data-name="patientName" class="<?php echo $view_appointment_scheduler_new_list->patientName->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_new_patientName" class="view_appointment_scheduler_new_patientName"><div class="ew-table-header-caption"><?php echo $view_appointment_scheduler_new_list->patientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patientName" class="<?php echo $view_appointment_scheduler_new_list->patientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_appointment_scheduler_new_list->SortUrl($view_appointment_scheduler_new_list->patientName) ?>', 1);"><div id="elh_view_appointment_scheduler_new_patientName" class="view_appointment_scheduler_new_patientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_appointment_scheduler_new_list->patientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_appointment_scheduler_new_list->patientName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_appointment_scheduler_new_list->patientName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_appointment_scheduler_new_list->MobileNumber->Visible) { // MobileNumber ?>
	<?php if ($view_appointment_scheduler_new_list->SortUrl($view_appointment_scheduler_new_list->MobileNumber) == "") { ?>
		<th data-name="MobileNumber" class="<?php echo $view_appointment_scheduler_new_list->MobileNumber->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_new_MobileNumber" class="view_appointment_scheduler_new_MobileNumber"><div class="ew-table-header-caption"><?php echo $view_appointment_scheduler_new_list->MobileNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MobileNumber" class="<?php echo $view_appointment_scheduler_new_list->MobileNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_appointment_scheduler_new_list->SortUrl($view_appointment_scheduler_new_list->MobileNumber) ?>', 1);"><div id="elh_view_appointment_scheduler_new_MobileNumber" class="view_appointment_scheduler_new_MobileNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_appointment_scheduler_new_list->MobileNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_appointment_scheduler_new_list->MobileNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_appointment_scheduler_new_list->MobileNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_appointment_scheduler_new_list->start_time->Visible) { // start_time ?>
	<?php if ($view_appointment_scheduler_new_list->SortUrl($view_appointment_scheduler_new_list->start_time) == "") { ?>
		<th data-name="start_time" class="<?php echo $view_appointment_scheduler_new_list->start_time->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_new_start_time" class="view_appointment_scheduler_new_start_time"><div class="ew-table-header-caption"><?php echo $view_appointment_scheduler_new_list->start_time->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="start_time" class="<?php echo $view_appointment_scheduler_new_list->start_time->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_appointment_scheduler_new_list->SortUrl($view_appointment_scheduler_new_list->start_time) ?>', 1);"><div id="elh_view_appointment_scheduler_new_start_time" class="view_appointment_scheduler_new_start_time">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_appointment_scheduler_new_list->start_time->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_appointment_scheduler_new_list->start_time->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_appointment_scheduler_new_list->start_time->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_appointment_scheduler_new_list->Purpose->Visible) { // Purpose ?>
	<?php if ($view_appointment_scheduler_new_list->SortUrl($view_appointment_scheduler_new_list->Purpose) == "") { ?>
		<th data-name="Purpose" class="<?php echo $view_appointment_scheduler_new_list->Purpose->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_new_Purpose" class="view_appointment_scheduler_new_Purpose"><div class="ew-table-header-caption"><?php echo $view_appointment_scheduler_new_list->Purpose->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Purpose" class="<?php echo $view_appointment_scheduler_new_list->Purpose->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_appointment_scheduler_new_list->SortUrl($view_appointment_scheduler_new_list->Purpose) ?>', 1);"><div id="elh_view_appointment_scheduler_new_Purpose" class="view_appointment_scheduler_new_Purpose">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_appointment_scheduler_new_list->Purpose->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_appointment_scheduler_new_list->Purpose->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_appointment_scheduler_new_list->Purpose->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_appointment_scheduler_new_list->patienttype->Visible) { // patienttype ?>
	<?php if ($view_appointment_scheduler_new_list->SortUrl($view_appointment_scheduler_new_list->patienttype) == "") { ?>
		<th data-name="patienttype" class="<?php echo $view_appointment_scheduler_new_list->patienttype->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_new_patienttype" class="view_appointment_scheduler_new_patienttype"><div class="ew-table-header-caption"><?php echo $view_appointment_scheduler_new_list->patienttype->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patienttype" class="<?php echo $view_appointment_scheduler_new_list->patienttype->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_appointment_scheduler_new_list->SortUrl($view_appointment_scheduler_new_list->patienttype) ?>', 1);"><div id="elh_view_appointment_scheduler_new_patienttype" class="view_appointment_scheduler_new_patienttype">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_appointment_scheduler_new_list->patienttype->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_appointment_scheduler_new_list->patienttype->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_appointment_scheduler_new_list->patienttype->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_appointment_scheduler_new_list->Referal->Visible) { // Referal ?>
	<?php if ($view_appointment_scheduler_new_list->SortUrl($view_appointment_scheduler_new_list->Referal) == "") { ?>
		<th data-name="Referal" class="<?php echo $view_appointment_scheduler_new_list->Referal->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_new_Referal" class="view_appointment_scheduler_new_Referal"><div class="ew-table-header-caption"><?php echo $view_appointment_scheduler_new_list->Referal->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Referal" class="<?php echo $view_appointment_scheduler_new_list->Referal->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_appointment_scheduler_new_list->SortUrl($view_appointment_scheduler_new_list->Referal) ?>', 1);"><div id="elh_view_appointment_scheduler_new_Referal" class="view_appointment_scheduler_new_Referal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_appointment_scheduler_new_list->Referal->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_appointment_scheduler_new_list->Referal->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_appointment_scheduler_new_list->Referal->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_appointment_scheduler_new_list->start_date->Visible) { // start_date ?>
	<?php if ($view_appointment_scheduler_new_list->SortUrl($view_appointment_scheduler_new_list->start_date) == "") { ?>
		<th data-name="start_date" class="<?php echo $view_appointment_scheduler_new_list->start_date->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_new_start_date" class="view_appointment_scheduler_new_start_date"><div class="ew-table-header-caption"><?php echo $view_appointment_scheduler_new_list->start_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="start_date" class="<?php echo $view_appointment_scheduler_new_list->start_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_appointment_scheduler_new_list->SortUrl($view_appointment_scheduler_new_list->start_date) ?>', 1);"><div id="elh_view_appointment_scheduler_new_start_date" class="view_appointment_scheduler_new_start_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_appointment_scheduler_new_list->start_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_appointment_scheduler_new_list->start_date->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_appointment_scheduler_new_list->start_date->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_appointment_scheduler_new_list->DoctorName->Visible) { // DoctorName ?>
	<?php if ($view_appointment_scheduler_new_list->SortUrl($view_appointment_scheduler_new_list->DoctorName) == "") { ?>
		<th data-name="DoctorName" class="<?php echo $view_appointment_scheduler_new_list->DoctorName->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_new_DoctorName" class="view_appointment_scheduler_new_DoctorName"><div class="ew-table-header-caption"><?php echo $view_appointment_scheduler_new_list->DoctorName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DoctorName" class="<?php echo $view_appointment_scheduler_new_list->DoctorName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_appointment_scheduler_new_list->SortUrl($view_appointment_scheduler_new_list->DoctorName) ?>', 1);"><div id="elh_view_appointment_scheduler_new_DoctorName" class="view_appointment_scheduler_new_DoctorName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_appointment_scheduler_new_list->DoctorName->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_appointment_scheduler_new_list->DoctorName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_appointment_scheduler_new_list->DoctorName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_appointment_scheduler_new_list->HospID->Visible) { // HospID ?>
	<?php if ($view_appointment_scheduler_new_list->SortUrl($view_appointment_scheduler_new_list->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_appointment_scheduler_new_list->HospID->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_new_HospID" class="view_appointment_scheduler_new_HospID"><div class="ew-table-header-caption"><?php echo $view_appointment_scheduler_new_list->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_appointment_scheduler_new_list->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_appointment_scheduler_new_list->SortUrl($view_appointment_scheduler_new_list->HospID) ?>', 1);"><div id="elh_view_appointment_scheduler_new_HospID" class="view_appointment_scheduler_new_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_appointment_scheduler_new_list->HospID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_appointment_scheduler_new_list->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_appointment_scheduler_new_list->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_appointment_scheduler_new_list->Id->Visible) { // Id ?>
	<?php if ($view_appointment_scheduler_new_list->SortUrl($view_appointment_scheduler_new_list->Id) == "") { ?>
		<th data-name="Id" class="<?php echo $view_appointment_scheduler_new_list->Id->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_new_Id" class="view_appointment_scheduler_new_Id"><div class="ew-table-header-caption"><?php echo $view_appointment_scheduler_new_list->Id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Id" class="<?php echo $view_appointment_scheduler_new_list->Id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_appointment_scheduler_new_list->SortUrl($view_appointment_scheduler_new_list->Id) ?>', 1);"><div id="elh_view_appointment_scheduler_new_Id" class="view_appointment_scheduler_new_Id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_appointment_scheduler_new_list->Id->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_appointment_scheduler_new_list->Id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_appointment_scheduler_new_list->Id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_appointment_scheduler_new_list->PatientTypee->Visible) { // PatientTypee ?>
	<?php if ($view_appointment_scheduler_new_list->SortUrl($view_appointment_scheduler_new_list->PatientTypee) == "") { ?>
		<th data-name="PatientTypee" class="<?php echo $view_appointment_scheduler_new_list->PatientTypee->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_new_PatientTypee" class="view_appointment_scheduler_new_PatientTypee"><div class="ew-table-header-caption"><?php echo $view_appointment_scheduler_new_list->PatientTypee->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientTypee" class="<?php echo $view_appointment_scheduler_new_list->PatientTypee->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_appointment_scheduler_new_list->SortUrl($view_appointment_scheduler_new_list->PatientTypee) ?>', 1);"><div id="elh_view_appointment_scheduler_new_PatientTypee" class="view_appointment_scheduler_new_PatientTypee">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_appointment_scheduler_new_list->PatientTypee->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_appointment_scheduler_new_list->PatientTypee->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_appointment_scheduler_new_list->PatientTypee->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_appointment_scheduler_new_list->Notes->Visible) { // Notes ?>
	<?php if ($view_appointment_scheduler_new_list->SortUrl($view_appointment_scheduler_new_list->Notes) == "") { ?>
		<th data-name="Notes" class="<?php echo $view_appointment_scheduler_new_list->Notes->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_new_Notes" class="view_appointment_scheduler_new_Notes"><div class="ew-table-header-caption"><?php echo $view_appointment_scheduler_new_list->Notes->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Notes" class="<?php echo $view_appointment_scheduler_new_list->Notes->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_appointment_scheduler_new_list->SortUrl($view_appointment_scheduler_new_list->Notes) ?>', 1);"><div id="elh_view_appointment_scheduler_new_Notes" class="view_appointment_scheduler_new_Notes">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_appointment_scheduler_new_list->Notes->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_appointment_scheduler_new_list->Notes->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_appointment_scheduler_new_list->Notes->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
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
	if ($view_appointment_scheduler_new_list->isAdd() || $view_appointment_scheduler_new_list->isCopy()) {
		$view_appointment_scheduler_new_list->RowIndex = 0;
		$view_appointment_scheduler_new_list->KeyCount = $view_appointment_scheduler_new_list->RowIndex;
		if ($view_appointment_scheduler_new_list->isCopy() && !$view_appointment_scheduler_new_list->loadRow())
			$view_appointment_scheduler_new->CurrentAction = "add";
		if ($view_appointment_scheduler_new_list->isAdd())
			$view_appointment_scheduler_new_list->loadRowValues();
		if ($view_appointment_scheduler_new->EventCancelled) // Insert failed
			$view_appointment_scheduler_new_list->restoreFormValues(); // Restore form values

		// Set row properties
		$view_appointment_scheduler_new->resetAttributes();
		$view_appointment_scheduler_new->RowAttrs->merge(["data-rowindex" => 0, "id" => "r0_view_appointment_scheduler_new", "data-rowtype" => ROWTYPE_ADD]);
		$view_appointment_scheduler_new->RowType = ROWTYPE_ADD;

		// Render row
		$view_appointment_scheduler_new_list->renderRow();

		// Render list options
		$view_appointment_scheduler_new_list->renderListOptions();
		$view_appointment_scheduler_new_list->StartRowCount = 0;
?>
	<tr <?php echo $view_appointment_scheduler_new->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_appointment_scheduler_new_list->ListOptions->render("body", "left", $view_appointment_scheduler_new_list->RowCount);
?>
	<?php if ($view_appointment_scheduler_new_list->patientID->Visible) { // patientID ?>
		<td data-name="patientID">
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCount ?>_view_appointment_scheduler_new_patientID" class="form-group view_appointment_scheduler_new_patientID">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_patientID" name="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_patientID" id="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_patientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new_list->patientID->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new_list->patientID->EditValue ?>"<?php echo $view_appointment_scheduler_new_list->patientID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_appointment_scheduler_new" data-field="x_patientID" name="o<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_patientID" id="o<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_patientID" value="<?php echo HtmlEncode($view_appointment_scheduler_new_list->patientID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler_new_list->patientName->Visible) { // patientName ?>
		<td data-name="patientName">
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCount ?>_view_appointment_scheduler_new_patientName" class="form-group view_appointment_scheduler_new_patientName">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_patientName" name="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_patientName" id="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_patientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new_list->patientName->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new_list->patientName->EditValue ?>"<?php echo $view_appointment_scheduler_new_list->patientName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_appointment_scheduler_new" data-field="x_patientName" name="o<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_patientName" id="o<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_patientName" value="<?php echo HtmlEncode($view_appointment_scheduler_new_list->patientName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler_new_list->MobileNumber->Visible) { // MobileNumber ?>
		<td data-name="MobileNumber">
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCount ?>_view_appointment_scheduler_new_MobileNumber" class="form-group view_appointment_scheduler_new_MobileNumber">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_MobileNumber" name="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_MobileNumber" id="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new_list->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new_list->MobileNumber->EditValue ?>"<?php echo $view_appointment_scheduler_new_list->MobileNumber->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_appointment_scheduler_new" data-field="x_MobileNumber" name="o<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_MobileNumber" id="o<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($view_appointment_scheduler_new_list->MobileNumber->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler_new_list->start_time->Visible) { // start_time ?>
		<td data-name="start_time">
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCount ?>_view_appointment_scheduler_new_start_time" class="form-group view_appointment_scheduler_new_start_time">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_start_time" data-format="3" name="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_start_time" id="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_start_time" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new_list->start_time->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new_list->start_time->EditValue ?>"<?php echo $view_appointment_scheduler_new_list->start_time->editAttributes() ?>>
<?php if (!$view_appointment_scheduler_new_list->start_time->ReadOnly && !$view_appointment_scheduler_new_list->start_time->Disabled && !isset($view_appointment_scheduler_new_list->start_time->EditAttrs["readonly"]) && !isset($view_appointment_scheduler_new_list->start_time->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_appointment_scheduler_newlist", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_appointment_scheduler_newlist", "x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_start_time", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
<?php if (!$view_appointment_scheduler_new_list->start_time->ReadOnly && !$view_appointment_scheduler_new_list->start_time->Disabled && !isset($view_appointment_scheduler_new_list->start_time->EditAttrs["readonly"]) && !isset($view_appointment_scheduler_new_list->start_time->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_appointment_scheduler_newlist", "timepicker"], function() {
	ew.createTimePicker("fview_appointment_scheduler_newlist", "x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_start_time", {"timeFormat":"h:i A","step":15});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_appointment_scheduler_new" data-field="x_start_time" name="o<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_start_time" id="o<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_start_time" value="<?php echo HtmlEncode($view_appointment_scheduler_new_list->start_time->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler_new_list->Purpose->Visible) { // Purpose ?>
		<td data-name="Purpose">
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCount ?>_view_appointment_scheduler_new_Purpose" class="form-group view_appointment_scheduler_new_Purpose">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_Purpose" name="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_Purpose" id="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_Purpose" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new_list->Purpose->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new_list->Purpose->EditValue ?>"<?php echo $view_appointment_scheduler_new_list->Purpose->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_appointment_scheduler_new" data-field="x_Purpose" name="o<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_Purpose" id="o<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_Purpose" value="<?php echo HtmlEncode($view_appointment_scheduler_new_list->Purpose->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler_new_list->patienttype->Visible) { // patienttype ?>
		<td data-name="patienttype">
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCount ?>_view_appointment_scheduler_new_patienttype" class="form-group view_appointment_scheduler_new_patienttype">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_patienttype" name="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_patienttype" id="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_patienttype" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new_list->patienttype->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new_list->patienttype->EditValue ?>"<?php echo $view_appointment_scheduler_new_list->patienttype->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_appointment_scheduler_new" data-field="x_patienttype" name="o<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_patienttype" id="o<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_patienttype" value="<?php echo HtmlEncode($view_appointment_scheduler_new_list->patienttype->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler_new_list->Referal->Visible) { // Referal ?>
		<td data-name="Referal">
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCount ?>_view_appointment_scheduler_new_Referal" class="form-group view_appointment_scheduler_new_Referal">
<?php
$onchange = $view_appointment_scheduler_new_list->Referal->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$view_appointment_scheduler_new_list->Referal->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_Referal">
	<input type="text" class="form-control" name="sv_x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_Referal" id="sv_x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_Referal" value="<?php echo RemoveHtml($view_appointment_scheduler_new_list->Referal->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new_list->Referal->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new_list->Referal->getPlaceHolder()) ?>"<?php echo $view_appointment_scheduler_new_list->Referal->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_appointment_scheduler_new" data-field="x_Referal" data-value-separator="<?php echo $view_appointment_scheduler_new_list->Referal->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_Referal" id="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_Referal" value="<?php echo HtmlEncode($view_appointment_scheduler_new_list->Referal->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fview_appointment_scheduler_newlist"], function() {
	fview_appointment_scheduler_newlist.createAutoSuggest({"id":"x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_Referal","forceSelect":false});
});
</script>
<?php echo $view_appointment_scheduler_new_list->Referal->Lookup->getParamTag($view_appointment_scheduler_new_list, "p_x" . $view_appointment_scheduler_new_list->RowIndex . "_Referal") ?>
</span>
<input type="hidden" data-table="view_appointment_scheduler_new" data-field="x_Referal" name="o<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_Referal" id="o<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_Referal" value="<?php echo HtmlEncode($view_appointment_scheduler_new_list->Referal->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler_new_list->start_date->Visible) { // start_date ?>
		<td data-name="start_date">
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCount ?>_view_appointment_scheduler_new_start_date" class="form-group view_appointment_scheduler_new_start_date">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_start_date" data-format="11" name="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_start_date" id="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_start_date" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new_list->start_date->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new_list->start_date->EditValue ?>"<?php echo $view_appointment_scheduler_new_list->start_date->editAttributes() ?>>
<?php if (!$view_appointment_scheduler_new_list->start_date->ReadOnly && !$view_appointment_scheduler_new_list->start_date->Disabled && !isset($view_appointment_scheduler_new_list->start_date->EditAttrs["readonly"]) && !isset($view_appointment_scheduler_new_list->start_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_appointment_scheduler_newlist", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_appointment_scheduler_newlist", "x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_start_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_appointment_scheduler_new" data-field="x_start_date" name="o<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_start_date" id="o<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_start_date" value="<?php echo HtmlEncode($view_appointment_scheduler_new_list->start_date->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler_new_list->DoctorName->Visible) { // DoctorName ?>
		<td data-name="DoctorName">
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCount ?>_view_appointment_scheduler_new_DoctorName" class="form-group view_appointment_scheduler_new_DoctorName">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_appointment_scheduler_new" data-field="x_DoctorName" data-value-separator="<?php echo $view_appointment_scheduler_new_list->DoctorName->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_DoctorName" name="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_DoctorName"<?php echo $view_appointment_scheduler_new_list->DoctorName->editAttributes() ?>>
			<?php echo $view_appointment_scheduler_new_list->DoctorName->selectOptionListHtml("x{$view_appointment_scheduler_new_list->RowIndex}_DoctorName") ?>
		</select>
</div>
<?php echo $view_appointment_scheduler_new_list->DoctorName->Lookup->getParamTag($view_appointment_scheduler_new_list, "p_x" . $view_appointment_scheduler_new_list->RowIndex . "_DoctorName") ?>
</span>
<input type="hidden" data-table="view_appointment_scheduler_new" data-field="x_DoctorName" name="o<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_DoctorName" id="o<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_DoctorName" value="<?php echo HtmlEncode($view_appointment_scheduler_new_list->DoctorName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler_new_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCount ?>_view_appointment_scheduler_new_HospID" class="form-group view_appointment_scheduler_new_HospID">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_HospID" name="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_HospID" id="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_HospID" size="30" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new_list->HospID->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new_list->HospID->EditValue ?>"<?php echo $view_appointment_scheduler_new_list->HospID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_appointment_scheduler_new" data-field="x_HospID" name="o<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_HospID" id="o<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_HospID" value="<?php echo HtmlEncode($view_appointment_scheduler_new_list->HospID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler_new_list->Id->Visible) { // Id ?>
		<td data-name="Id">
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCount ?>_view_appointment_scheduler_new_Id" class="form-group view_appointment_scheduler_new_Id"></span>
<input type="hidden" data-table="view_appointment_scheduler_new" data-field="x_Id" name="o<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_Id" id="o<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_Id" value="<?php echo HtmlEncode($view_appointment_scheduler_new_list->Id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler_new_list->PatientTypee->Visible) { // PatientTypee ?>
		<td data-name="PatientTypee">
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCount ?>_view_appointment_scheduler_new_PatientTypee" class="form-group view_appointment_scheduler_new_PatientTypee">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_PatientTypee" name="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_PatientTypee" id="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_PatientTypee" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new_list->PatientTypee->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new_list->PatientTypee->EditValue ?>"<?php echo $view_appointment_scheduler_new_list->PatientTypee->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_appointment_scheduler_new" data-field="x_PatientTypee" name="o<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_PatientTypee" id="o<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_PatientTypee" value="<?php echo HtmlEncode($view_appointment_scheduler_new_list->PatientTypee->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler_new_list->Notes->Visible) { // Notes ?>
		<td data-name="Notes">
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCount ?>_view_appointment_scheduler_new_Notes" class="form-group view_appointment_scheduler_new_Notes">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_Notes" name="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_Notes" id="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_Notes" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new_list->Notes->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new_list->Notes->EditValue ?>"<?php echo $view_appointment_scheduler_new_list->Notes->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_appointment_scheduler_new" data-field="x_Notes" name="o<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_Notes" id="o<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_Notes" value="<?php echo HtmlEncode($view_appointment_scheduler_new_list->Notes->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_appointment_scheduler_new_list->ListOptions->render("body", "right", $view_appointment_scheduler_new_list->RowCount);
?>
<script>
loadjs.ready(["fview_appointment_scheduler_newlist", "load"], function() {
	fview_appointment_scheduler_newlist.updateLists(<?php echo $view_appointment_scheduler_new_list->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
<?php
if ($view_appointment_scheduler_new_list->ExportAll && $view_appointment_scheduler_new_list->isExport()) {
	$view_appointment_scheduler_new_list->StopRecord = $view_appointment_scheduler_new_list->TotalRecords;
} else {

	// Set the last record to display
	if ($view_appointment_scheduler_new_list->TotalRecords > $view_appointment_scheduler_new_list->StartRecord + $view_appointment_scheduler_new_list->DisplayRecords - 1)
		$view_appointment_scheduler_new_list->StopRecord = $view_appointment_scheduler_new_list->StartRecord + $view_appointment_scheduler_new_list->DisplayRecords - 1;
	else
		$view_appointment_scheduler_new_list->StopRecord = $view_appointment_scheduler_new_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($view_appointment_scheduler_new->isConfirm() || $view_appointment_scheduler_new_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($view_appointment_scheduler_new_list->FormKeyCountName) && ($view_appointment_scheduler_new_list->isGridAdd() || $view_appointment_scheduler_new_list->isGridEdit() || $view_appointment_scheduler_new->isConfirm())) {
		$view_appointment_scheduler_new_list->KeyCount = $CurrentForm->getValue($view_appointment_scheduler_new_list->FormKeyCountName);
		$view_appointment_scheduler_new_list->StopRecord = $view_appointment_scheduler_new_list->StartRecord + $view_appointment_scheduler_new_list->KeyCount - 1;
	}
}
$view_appointment_scheduler_new_list->RecordCount = $view_appointment_scheduler_new_list->StartRecord - 1;
if ($view_appointment_scheduler_new_list->Recordset && !$view_appointment_scheduler_new_list->Recordset->EOF) {
	$view_appointment_scheduler_new_list->Recordset->moveFirst();
	$selectLimit = $view_appointment_scheduler_new_list->UseSelectLimit;
	if (!$selectLimit && $view_appointment_scheduler_new_list->StartRecord > 1)
		$view_appointment_scheduler_new_list->Recordset->move($view_appointment_scheduler_new_list->StartRecord - 1);
} elseif (!$view_appointment_scheduler_new->AllowAddDeleteRow && $view_appointment_scheduler_new_list->StopRecord == 0) {
	$view_appointment_scheduler_new_list->StopRecord = $view_appointment_scheduler_new->GridAddRowCount;
}

// Initialize aggregate
$view_appointment_scheduler_new->RowType = ROWTYPE_AGGREGATEINIT;
$view_appointment_scheduler_new->resetAttributes();
$view_appointment_scheduler_new_list->renderRow();
$view_appointment_scheduler_new_list->EditRowCount = 0;
if ($view_appointment_scheduler_new_list->isEdit())
	$view_appointment_scheduler_new_list->RowIndex = 1;
while ($view_appointment_scheduler_new_list->RecordCount < $view_appointment_scheduler_new_list->StopRecord) {
	$view_appointment_scheduler_new_list->RecordCount++;
	if ($view_appointment_scheduler_new_list->RecordCount >= $view_appointment_scheduler_new_list->StartRecord) {
		$view_appointment_scheduler_new_list->RowCount++;

		// Set up key count
		$view_appointment_scheduler_new_list->KeyCount = $view_appointment_scheduler_new_list->RowIndex;

		// Init row class and style
		$view_appointment_scheduler_new->resetAttributes();
		$view_appointment_scheduler_new->CssClass = "";
		if ($view_appointment_scheduler_new_list->isGridAdd()) {
			$view_appointment_scheduler_new_list->loadRowValues(); // Load default values
		} else {
			$view_appointment_scheduler_new_list->loadRowValues($view_appointment_scheduler_new_list->Recordset); // Load row values
		}
		$view_appointment_scheduler_new->RowType = ROWTYPE_VIEW; // Render view
		if ($view_appointment_scheduler_new_list->isEdit()) {
			if ($view_appointment_scheduler_new_list->checkInlineEditKey() && $view_appointment_scheduler_new_list->EditRowCount == 0) { // Inline edit
				$view_appointment_scheduler_new->RowType = ROWTYPE_EDIT; // Render edit
			}
		}
		if ($view_appointment_scheduler_new_list->isEdit() && $view_appointment_scheduler_new->RowType == ROWTYPE_EDIT && $view_appointment_scheduler_new->EventCancelled) { // Update failed
			$CurrentForm->Index = 1;
			$view_appointment_scheduler_new_list->restoreFormValues(); // Restore form values
		}
		if ($view_appointment_scheduler_new->RowType == ROWTYPE_EDIT) // Edit row
			$view_appointment_scheduler_new_list->EditRowCount++;

		// Set up row id / data-rowindex
		$view_appointment_scheduler_new->RowAttrs->merge(["data-rowindex" => $view_appointment_scheduler_new_list->RowCount, "id" => "r" . $view_appointment_scheduler_new_list->RowCount . "_view_appointment_scheduler_new", "data-rowtype" => $view_appointment_scheduler_new->RowType]);

		// Render row
		$view_appointment_scheduler_new_list->renderRow();

		// Render list options
		$view_appointment_scheduler_new_list->renderListOptions();
?>
	<tr <?php echo $view_appointment_scheduler_new->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_appointment_scheduler_new_list->ListOptions->render("body", "left", $view_appointment_scheduler_new_list->RowCount);
?>
	<?php if ($view_appointment_scheduler_new_list->patientID->Visible) { // patientID ?>
		<td data-name="patientID" <?php echo $view_appointment_scheduler_new_list->patientID->cellAttributes() ?>>
<?php if ($view_appointment_scheduler_new->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCount ?>_view_appointment_scheduler_new_patientID" class="form-group">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_patientID" name="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_patientID" id="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_patientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new_list->patientID->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new_list->patientID->EditValue ?>"<?php echo $view_appointment_scheduler_new_list->patientID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_appointment_scheduler_new->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCount ?>_view_appointment_scheduler_new_patientID">
<span<?php echo $view_appointment_scheduler_new_list->patientID->viewAttributes() ?>><?php echo $view_appointment_scheduler_new_list->patientID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler_new_list->patientName->Visible) { // patientName ?>
		<td data-name="patientName" <?php echo $view_appointment_scheduler_new_list->patientName->cellAttributes() ?>>
<?php if ($view_appointment_scheduler_new->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCount ?>_view_appointment_scheduler_new_patientName" class="form-group">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_patientName" name="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_patientName" id="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_patientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new_list->patientName->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new_list->patientName->EditValue ?>"<?php echo $view_appointment_scheduler_new_list->patientName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_appointment_scheduler_new->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCount ?>_view_appointment_scheduler_new_patientName">
<span<?php echo $view_appointment_scheduler_new_list->patientName->viewAttributes() ?>><?php echo $view_appointment_scheduler_new_list->patientName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler_new_list->MobileNumber->Visible) { // MobileNumber ?>
		<td data-name="MobileNumber" <?php echo $view_appointment_scheduler_new_list->MobileNumber->cellAttributes() ?>>
<?php if ($view_appointment_scheduler_new->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCount ?>_view_appointment_scheduler_new_MobileNumber" class="form-group">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_MobileNumber" name="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_MobileNumber" id="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new_list->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new_list->MobileNumber->EditValue ?>"<?php echo $view_appointment_scheduler_new_list->MobileNumber->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_appointment_scheduler_new->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCount ?>_view_appointment_scheduler_new_MobileNumber">
<span<?php echo $view_appointment_scheduler_new_list->MobileNumber->viewAttributes() ?>><?php echo $view_appointment_scheduler_new_list->MobileNumber->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler_new_list->start_time->Visible) { // start_time ?>
		<td data-name="start_time" <?php echo $view_appointment_scheduler_new_list->start_time->cellAttributes() ?>>
<?php if ($view_appointment_scheduler_new->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCount ?>_view_appointment_scheduler_new_start_time" class="form-group">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_start_time" data-format="3" name="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_start_time" id="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_start_time" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new_list->start_time->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new_list->start_time->EditValue ?>"<?php echo $view_appointment_scheduler_new_list->start_time->editAttributes() ?>>
<?php if (!$view_appointment_scheduler_new_list->start_time->ReadOnly && !$view_appointment_scheduler_new_list->start_time->Disabled && !isset($view_appointment_scheduler_new_list->start_time->EditAttrs["readonly"]) && !isset($view_appointment_scheduler_new_list->start_time->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_appointment_scheduler_newlist", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_appointment_scheduler_newlist", "x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_start_time", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
<?php if (!$view_appointment_scheduler_new_list->start_time->ReadOnly && !$view_appointment_scheduler_new_list->start_time->Disabled && !isset($view_appointment_scheduler_new_list->start_time->EditAttrs["readonly"]) && !isset($view_appointment_scheduler_new_list->start_time->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_appointment_scheduler_newlist", "timepicker"], function() {
	ew.createTimePicker("fview_appointment_scheduler_newlist", "x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_start_time", {"timeFormat":"h:i A","step":15});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_appointment_scheduler_new->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCount ?>_view_appointment_scheduler_new_start_time">
<span<?php echo $view_appointment_scheduler_new_list->start_time->viewAttributes() ?>><?php echo $view_appointment_scheduler_new_list->start_time->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler_new_list->Purpose->Visible) { // Purpose ?>
		<td data-name="Purpose" <?php echo $view_appointment_scheduler_new_list->Purpose->cellAttributes() ?>>
<?php if ($view_appointment_scheduler_new->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCount ?>_view_appointment_scheduler_new_Purpose" class="form-group">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_Purpose" name="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_Purpose" id="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_Purpose" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new_list->Purpose->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new_list->Purpose->EditValue ?>"<?php echo $view_appointment_scheduler_new_list->Purpose->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_appointment_scheduler_new->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCount ?>_view_appointment_scheduler_new_Purpose">
<span<?php echo $view_appointment_scheduler_new_list->Purpose->viewAttributes() ?>><?php echo $view_appointment_scheduler_new_list->Purpose->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler_new_list->patienttype->Visible) { // patienttype ?>
		<td data-name="patienttype" <?php echo $view_appointment_scheduler_new_list->patienttype->cellAttributes() ?>>
<?php if ($view_appointment_scheduler_new->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCount ?>_view_appointment_scheduler_new_patienttype" class="form-group">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_patienttype" name="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_patienttype" id="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_patienttype" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new_list->patienttype->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new_list->patienttype->EditValue ?>"<?php echo $view_appointment_scheduler_new_list->patienttype->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_appointment_scheduler_new->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCount ?>_view_appointment_scheduler_new_patienttype">
<span<?php echo $view_appointment_scheduler_new_list->patienttype->viewAttributes() ?>><?php echo $view_appointment_scheduler_new_list->patienttype->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler_new_list->Referal->Visible) { // Referal ?>
		<td data-name="Referal" <?php echo $view_appointment_scheduler_new_list->Referal->cellAttributes() ?>>
<?php if ($view_appointment_scheduler_new->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCount ?>_view_appointment_scheduler_new_Referal" class="form-group">
<?php
$onchange = $view_appointment_scheduler_new_list->Referal->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$view_appointment_scheduler_new_list->Referal->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_Referal">
	<input type="text" class="form-control" name="sv_x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_Referal" id="sv_x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_Referal" value="<?php echo RemoveHtml($view_appointment_scheduler_new_list->Referal->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new_list->Referal->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new_list->Referal->getPlaceHolder()) ?>"<?php echo $view_appointment_scheduler_new_list->Referal->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_appointment_scheduler_new" data-field="x_Referal" data-value-separator="<?php echo $view_appointment_scheduler_new_list->Referal->displayValueSeparatorAttribute() ?>" name="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_Referal" id="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_Referal" value="<?php echo HtmlEncode($view_appointment_scheduler_new_list->Referal->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fview_appointment_scheduler_newlist"], function() {
	fview_appointment_scheduler_newlist.createAutoSuggest({"id":"x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_Referal","forceSelect":false});
});
</script>
<?php echo $view_appointment_scheduler_new_list->Referal->Lookup->getParamTag($view_appointment_scheduler_new_list, "p_x" . $view_appointment_scheduler_new_list->RowIndex . "_Referal") ?>
</span>
<?php } ?>
<?php if ($view_appointment_scheduler_new->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCount ?>_view_appointment_scheduler_new_Referal">
<span<?php echo $view_appointment_scheduler_new_list->Referal->viewAttributes() ?>><?php echo $view_appointment_scheduler_new_list->Referal->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler_new_list->start_date->Visible) { // start_date ?>
		<td data-name="start_date" <?php echo $view_appointment_scheduler_new_list->start_date->cellAttributes() ?>>
<?php if ($view_appointment_scheduler_new->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCount ?>_view_appointment_scheduler_new_start_date" class="form-group">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_start_date" data-format="11" name="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_start_date" id="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_start_date" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new_list->start_date->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new_list->start_date->EditValue ?>"<?php echo $view_appointment_scheduler_new_list->start_date->editAttributes() ?>>
<?php if (!$view_appointment_scheduler_new_list->start_date->ReadOnly && !$view_appointment_scheduler_new_list->start_date->Disabled && !isset($view_appointment_scheduler_new_list->start_date->EditAttrs["readonly"]) && !isset($view_appointment_scheduler_new_list->start_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_appointment_scheduler_newlist", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_appointment_scheduler_newlist", "x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_start_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($view_appointment_scheduler_new->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCount ?>_view_appointment_scheduler_new_start_date">
<span<?php echo $view_appointment_scheduler_new_list->start_date->viewAttributes() ?>><?php echo $view_appointment_scheduler_new_list->start_date->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler_new_list->DoctorName->Visible) { // DoctorName ?>
		<td data-name="DoctorName" <?php echo $view_appointment_scheduler_new_list->DoctorName->cellAttributes() ?>>
<?php if ($view_appointment_scheduler_new->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCount ?>_view_appointment_scheduler_new_DoctorName" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_appointment_scheduler_new" data-field="x_DoctorName" data-value-separator="<?php echo $view_appointment_scheduler_new_list->DoctorName->displayValueSeparatorAttribute() ?>" id="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_DoctorName" name="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_DoctorName"<?php echo $view_appointment_scheduler_new_list->DoctorName->editAttributes() ?>>
			<?php echo $view_appointment_scheduler_new_list->DoctorName->selectOptionListHtml("x{$view_appointment_scheduler_new_list->RowIndex}_DoctorName") ?>
		</select>
</div>
<?php echo $view_appointment_scheduler_new_list->DoctorName->Lookup->getParamTag($view_appointment_scheduler_new_list, "p_x" . $view_appointment_scheduler_new_list->RowIndex . "_DoctorName") ?>
</span>
<?php } ?>
<?php if ($view_appointment_scheduler_new->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCount ?>_view_appointment_scheduler_new_DoctorName">
<span<?php echo $view_appointment_scheduler_new_list->DoctorName->viewAttributes() ?>><?php echo $view_appointment_scheduler_new_list->DoctorName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler_new_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $view_appointment_scheduler_new_list->HospID->cellAttributes() ?>>
<?php if ($view_appointment_scheduler_new->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCount ?>_view_appointment_scheduler_new_HospID" class="form-group">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_HospID" name="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_HospID" id="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_HospID" size="30" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new_list->HospID->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new_list->HospID->EditValue ?>"<?php echo $view_appointment_scheduler_new_list->HospID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_appointment_scheduler_new->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCount ?>_view_appointment_scheduler_new_HospID">
<span<?php echo $view_appointment_scheduler_new_list->HospID->viewAttributes() ?>><?php echo $view_appointment_scheduler_new_list->HospID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler_new_list->Id->Visible) { // Id ?>
		<td data-name="Id" <?php echo $view_appointment_scheduler_new_list->Id->cellAttributes() ?>>
<?php if ($view_appointment_scheduler_new->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCount ?>_view_appointment_scheduler_new_Id" class="form-group">
<span<?php echo $view_appointment_scheduler_new_list->Id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($view_appointment_scheduler_new_list->Id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="view_appointment_scheduler_new" data-field="x_Id" name="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_Id" id="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_Id" value="<?php echo HtmlEncode($view_appointment_scheduler_new_list->Id->CurrentValue) ?>">
<?php } ?>
<?php if ($view_appointment_scheduler_new->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCount ?>_view_appointment_scheduler_new_Id">
<span<?php echo $view_appointment_scheduler_new_list->Id->viewAttributes() ?>><?php echo $view_appointment_scheduler_new_list->Id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler_new_list->PatientTypee->Visible) { // PatientTypee ?>
		<td data-name="PatientTypee" <?php echo $view_appointment_scheduler_new_list->PatientTypee->cellAttributes() ?>>
<?php if ($view_appointment_scheduler_new->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCount ?>_view_appointment_scheduler_new_PatientTypee" class="form-group">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_PatientTypee" name="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_PatientTypee" id="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_PatientTypee" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new_list->PatientTypee->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new_list->PatientTypee->EditValue ?>"<?php echo $view_appointment_scheduler_new_list->PatientTypee->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_appointment_scheduler_new->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCount ?>_view_appointment_scheduler_new_PatientTypee">
<span<?php echo $view_appointment_scheduler_new_list->PatientTypee->viewAttributes() ?>><?php echo $view_appointment_scheduler_new_list->PatientTypee->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_appointment_scheduler_new_list->Notes->Visible) { // Notes ?>
		<td data-name="Notes" <?php echo $view_appointment_scheduler_new_list->Notes->cellAttributes() ?>>
<?php if ($view_appointment_scheduler_new->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCount ?>_view_appointment_scheduler_new_Notes" class="form-group">
<input type="text" data-table="view_appointment_scheduler_new" data-field="x_Notes" name="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_Notes" id="x<?php echo $view_appointment_scheduler_new_list->RowIndex ?>_Notes" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_appointment_scheduler_new_list->Notes->getPlaceHolder()) ?>" value="<?php echo $view_appointment_scheduler_new_list->Notes->EditValue ?>"<?php echo $view_appointment_scheduler_new_list->Notes->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($view_appointment_scheduler_new->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $view_appointment_scheduler_new_list->RowCount ?>_view_appointment_scheduler_new_Notes">
<span<?php echo $view_appointment_scheduler_new_list->Notes->viewAttributes() ?>><?php echo $view_appointment_scheduler_new_list->Notes->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_appointment_scheduler_new_list->ListOptions->render("body", "right", $view_appointment_scheduler_new_list->RowCount);
?>
	</tr>
<?php if ($view_appointment_scheduler_new->RowType == ROWTYPE_ADD || $view_appointment_scheduler_new->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fview_appointment_scheduler_newlist", "load"], function() {
	fview_appointment_scheduler_newlist.updateLists(<?php echo $view_appointment_scheduler_new_list->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	if (!$view_appointment_scheduler_new_list->isGridAdd())
		$view_appointment_scheduler_new_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if ($view_appointment_scheduler_new_list->isAdd() || $view_appointment_scheduler_new_list->isCopy()) { ?>
<input type="hidden" name="<?php echo $view_appointment_scheduler_new_list->FormKeyCountName ?>" id="<?php echo $view_appointment_scheduler_new_list->FormKeyCountName ?>" value="<?php echo $view_appointment_scheduler_new_list->KeyCount ?>">
<?php } ?>
<?php if ($view_appointment_scheduler_new_list->isEdit()) { ?>
<input type="hidden" name="<?php echo $view_appointment_scheduler_new_list->FormKeyCountName ?>" id="<?php echo $view_appointment_scheduler_new_list->FormKeyCountName ?>" value="<?php echo $view_appointment_scheduler_new_list->KeyCount ?>">
<?php } ?>
<?php if (!$view_appointment_scheduler_new->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_appointment_scheduler_new_list->Recordset)
	$view_appointment_scheduler_new_list->Recordset->Close();
?>
<?php if (!$view_appointment_scheduler_new_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_appointment_scheduler_new_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_appointment_scheduler_new_list->Pager->render() ?>
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
<?php if ($view_appointment_scheduler_new_list->TotalRecords == 0 && !$view_appointment_scheduler_new->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_appointment_scheduler_new_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_appointment_scheduler_new_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_appointment_scheduler_new_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$view_appointment_scheduler_new->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_view_appointment_scheduler_new",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$view_appointment_scheduler_new_list->terminate();
?>