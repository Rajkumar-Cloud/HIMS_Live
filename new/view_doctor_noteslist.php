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
$view_doctor_notes_list = new view_doctor_notes_list();

// Run the page
$view_doctor_notes_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_doctor_notes_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$view_doctor_notes_list->isExport()) { ?>
<script>
var fview_doctor_noteslist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fview_doctor_noteslist = currentForm = new ew.Form("fview_doctor_noteslist", "list");
	fview_doctor_noteslist.formKeyCountName = '<?php echo $view_doctor_notes_list->FormKeyCountName ?>';
	loadjs.done("fview_doctor_noteslist");
});
var fview_doctor_noteslistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fview_doctor_noteslistsrch = currentSearchForm = new ew.Form("fview_doctor_noteslistsrch");

	// Validate function for search
	fview_doctor_noteslistsrch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_Created");
		if (elm && !ew.checkEuroDate(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_doctor_notes_list->Created->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fview_doctor_noteslistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_doctor_noteslistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	// Filters

	fview_doctor_noteslistsrch.filterList = <?php echo $view_doctor_notes_list->getFilterList() ?>;
	loadjs.done("fview_doctor_noteslistsrch");
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
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$view_doctor_notes_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_doctor_notes_list->TotalRecords > 0 && $view_doctor_notes_list->ExportOptions->visible()) { ?>
<?php $view_doctor_notes_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_doctor_notes_list->ImportOptions->visible()) { ?>
<?php $view_doctor_notes_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_doctor_notes_list->SearchOptions->visible()) { ?>
<?php $view_doctor_notes_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_doctor_notes_list->FilterOptions->visible()) { ?>
<?php $view_doctor_notes_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_doctor_notes_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_doctor_notes_list->isExport() && !$view_doctor_notes->CurrentAction) { ?>
<form name="fview_doctor_noteslistsrch" id="fview_doctor_noteslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fview_doctor_noteslistsrch-search-panel" class="<?php echo $view_doctor_notes_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_doctor_notes">
	<div class="ew-extended-search">
<?php

// Render search row
$view_doctor_notes->RowType = ROWTYPE_SEARCH;
$view_doctor_notes->resetAttributes();
$view_doctor_notes_list->renderRow();
?>
<?php if ($view_doctor_notes_list->patientID->Visible) { // patientID ?>
	<?php
		$view_doctor_notes_list->SearchColumnCount++;
		if (($view_doctor_notes_list->SearchColumnCount - 1) % $view_doctor_notes_list->SearchFieldsPerRow == 0) {
			$view_doctor_notes_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_doctor_notes_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_patientID" class="ew-cell form-group">
		<label for="x_patientID" class="ew-search-caption ew-label"><?php echo $view_doctor_notes_list->patientID->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_patientID" id="z_patientID" value="LIKE">
</span>
		<span id="el_view_doctor_notes_patientID" class="ew-search-field">
<input type="text" data-table="view_doctor_notes" data-field="x_patientID" name="x_patientID" id="x_patientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_doctor_notes_list->patientID->getPlaceHolder()) ?>" value="<?php echo $view_doctor_notes_list->patientID->EditValue ?>"<?php echo $view_doctor_notes_list->patientID->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_doctor_notes_list->SearchColumnCount % $view_doctor_notes_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_doctor_notes_list->patientName->Visible) { // patientName ?>
	<?php
		$view_doctor_notes_list->SearchColumnCount++;
		if (($view_doctor_notes_list->SearchColumnCount - 1) % $view_doctor_notes_list->SearchFieldsPerRow == 0) {
			$view_doctor_notes_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_doctor_notes_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_patientName" class="ew-cell form-group">
		<label for="x_patientName" class="ew-search-caption ew-label"><?php echo $view_doctor_notes_list->patientName->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_patientName" id="z_patientName" value="LIKE">
</span>
		<span id="el_view_doctor_notes_patientName" class="ew-search-field">
<input type="text" data-table="view_doctor_notes" data-field="x_patientName" name="x_patientName" id="x_patientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_doctor_notes_list->patientName->getPlaceHolder()) ?>" value="<?php echo $view_doctor_notes_list->patientName->EditValue ?>"<?php echo $view_doctor_notes_list->patientName->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_doctor_notes_list->SearchColumnCount % $view_doctor_notes_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_doctor_notes_list->DoctorName->Visible) { // DoctorName ?>
	<?php
		$view_doctor_notes_list->SearchColumnCount++;
		if (($view_doctor_notes_list->SearchColumnCount - 1) % $view_doctor_notes_list->SearchFieldsPerRow == 0) {
			$view_doctor_notes_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_doctor_notes_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_DoctorName" class="ew-cell form-group">
		<label for="x_DoctorName" class="ew-search-caption ew-label"><?php echo $view_doctor_notes_list->DoctorName->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DoctorName" id="z_DoctorName" value="LIKE">
</span>
		<span id="el_view_doctor_notes_DoctorName" class="ew-search-field">
<input type="text" data-table="view_doctor_notes" data-field="x_DoctorName" name="x_DoctorName" id="x_DoctorName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_doctor_notes_list->DoctorName->getPlaceHolder()) ?>" value="<?php echo $view_doctor_notes_list->DoctorName->EditValue ?>"<?php echo $view_doctor_notes_list->DoctorName->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_doctor_notes_list->SearchColumnCount % $view_doctor_notes_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_doctor_notes_list->Referal->Visible) { // Referal ?>
	<?php
		$view_doctor_notes_list->SearchColumnCount++;
		if (($view_doctor_notes_list->SearchColumnCount - 1) % $view_doctor_notes_list->SearchFieldsPerRow == 0) {
			$view_doctor_notes_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_doctor_notes_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_Referal" class="ew-cell form-group">
		<label for="x_Referal" class="ew-search-caption ew-label"><?php echo $view_doctor_notes_list->Referal->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Referal" id="z_Referal" value="LIKE">
</span>
		<span id="el_view_doctor_notes_Referal" class="ew-search-field">
<input type="text" data-table="view_doctor_notes" data-field="x_Referal" name="x_Referal" id="x_Referal" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_doctor_notes_list->Referal->getPlaceHolder()) ?>" value="<?php echo $view_doctor_notes_list->Referal->EditValue ?>"<?php echo $view_doctor_notes_list->Referal->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_doctor_notes_list->SearchColumnCount % $view_doctor_notes_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_doctor_notes_list->PatientTypee->Visible) { // PatientTypee ?>
	<?php
		$view_doctor_notes_list->SearchColumnCount++;
		if (($view_doctor_notes_list->SearchColumnCount - 1) % $view_doctor_notes_list->SearchFieldsPerRow == 0) {
			$view_doctor_notes_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_doctor_notes_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_PatientTypee" class="ew-cell form-group">
		<label for="x_PatientTypee" class="ew-search-caption ew-label"><?php echo $view_doctor_notes_list->PatientTypee->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientTypee" id="z_PatientTypee" value="LIKE">
</span>
		<span id="el_view_doctor_notes_PatientTypee" class="ew-search-field">
<input type="text" data-table="view_doctor_notes" data-field="x_PatientTypee" name="x_PatientTypee" id="x_PatientTypee" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_doctor_notes_list->PatientTypee->getPlaceHolder()) ?>" value="<?php echo $view_doctor_notes_list->PatientTypee->EditValue ?>"<?php echo $view_doctor_notes_list->PatientTypee->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_doctor_notes_list->SearchColumnCount % $view_doctor_notes_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_doctor_notes_list->Created->Visible) { // Created ?>
	<?php
		$view_doctor_notes_list->SearchColumnCount++;
		if (($view_doctor_notes_list->SearchColumnCount - 1) % $view_doctor_notes_list->SearchFieldsPerRow == 0) {
			$view_doctor_notes_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_doctor_notes_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_Created" class="ew-cell form-group">
		<label for="x_Created" class="ew-search-caption ew-label"><?php echo $view_doctor_notes_list->Created->caption() ?></label>
		<span class="ew-search-operator">
<select name="z_Created" id="z_Created" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?php echo $view_doctor_notes_list->Created->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?php echo $Language->phrase("EQUAL") ?></option>
<option value="<>"<?php echo $view_doctor_notes_list->Created->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?php echo $Language->phrase("<>") ?></option>
<option value="<"<?php echo $view_doctor_notes_list->Created->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?php echo $Language->phrase("<") ?></option>
<option value="<="<?php echo $view_doctor_notes_list->Created->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?php echo $Language->phrase("<=") ?></option>
<option value=">"<?php echo $view_doctor_notes_list->Created->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?php echo $Language->phrase(">") ?></option>
<option value=">="<?php echo $view_doctor_notes_list->Created->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?php echo $Language->phrase(">=") ?></option>
<option value="IS NULL"<?php echo $view_doctor_notes_list->Created->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?php echo $view_doctor_notes_list->Created->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?php echo $view_doctor_notes_list->Created->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?php echo $Language->phrase("BETWEEN") ?></option>
</select>
</span>
		<span id="el_view_doctor_notes_Created" class="ew-search-field">
<input type="text" data-table="view_doctor_notes" data-field="x_Created" data-format="7" name="x_Created" id="x_Created" maxlength="10" placeholder="<?php echo HtmlEncode($view_doctor_notes_list->Created->getPlaceHolder()) ?>" value="<?php echo $view_doctor_notes_list->Created->EditValue ?>"<?php echo $view_doctor_notes_list->Created->editAttributes() ?>>
<?php if (!$view_doctor_notes_list->Created->ReadOnly && !$view_doctor_notes_list->Created->Disabled && !isset($view_doctor_notes_list->Created->EditAttrs["readonly"]) && !isset($view_doctor_notes_list->Created->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_doctor_noteslistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_doctor_noteslistsrch", "x_Created", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
		<span class="ew-search-and d-none"><label><?php echo $Language->phrase("AND") ?></label></span>
		<span id="el2_view_doctor_notes_Created" class="ew-search-field2 d-none">
<input type="text" data-table="view_doctor_notes" data-field="x_Created" data-format="7" name="y_Created" id="y_Created" maxlength="10" placeholder="<?php echo HtmlEncode($view_doctor_notes_list->Created->getPlaceHolder()) ?>" value="<?php echo $view_doctor_notes_list->Created->EditValue2 ?>"<?php echo $view_doctor_notes_list->Created->editAttributes() ?>>
<?php if (!$view_doctor_notes_list->Created->ReadOnly && !$view_doctor_notes_list->Created->Disabled && !isset($view_doctor_notes_list->Created->EditAttrs["readonly"]) && !isset($view_doctor_notes_list->Created->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_doctor_noteslistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_doctor_noteslistsrch", "y_Created", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
	</div>
	<?php if ($view_doctor_notes_list->SearchColumnCount % $view_doctor_notes_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($view_doctor_notes_list->SearchColumnCount % $view_doctor_notes_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $view_doctor_notes_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($view_doctor_notes_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($view_doctor_notes_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_doctor_notes_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_doctor_notes_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_doctor_notes_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_doctor_notes_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_doctor_notes_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $view_doctor_notes_list->showPageHeader(); ?>
<?php
$view_doctor_notes_list->showMessage();
?>
<?php if ($view_doctor_notes_list->TotalRecords > 0 || $view_doctor_notes->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_doctor_notes_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_doctor_notes">
<?php if (!$view_doctor_notes_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_doctor_notes_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_doctor_notes_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_doctor_notes_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_doctor_noteslist" id="fview_doctor_noteslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_doctor_notes">
<div id="gmp_view_doctor_notes" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($view_doctor_notes_list->TotalRecords > 0 || $view_doctor_notes_list->isGridEdit()) { ?>
<table id="tbl_view_doctor_noteslist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_doctor_notes->RowType = ROWTYPE_HEADER;

// Render list options
$view_doctor_notes_list->renderListOptions();

// Render list options (header, left)
$view_doctor_notes_list->ListOptions->render("header", "left");
?>
<?php if ($view_doctor_notes_list->patientID->Visible) { // patientID ?>
	<?php if ($view_doctor_notes_list->SortUrl($view_doctor_notes_list->patientID) == "") { ?>
		<th data-name="patientID" class="<?php echo $view_doctor_notes_list->patientID->headerCellClass() ?>"><div id="elh_view_doctor_notes_patientID" class="view_doctor_notes_patientID"><div class="ew-table-header-caption"><?php echo $view_doctor_notes_list->patientID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patientID" class="<?php echo $view_doctor_notes_list->patientID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_doctor_notes_list->SortUrl($view_doctor_notes_list->patientID) ?>', 1);"><div id="elh_view_doctor_notes_patientID" class="view_doctor_notes_patientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_doctor_notes_list->patientID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_doctor_notes_list->patientID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_doctor_notes_list->patientID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_doctor_notes_list->patientName->Visible) { // patientName ?>
	<?php if ($view_doctor_notes_list->SortUrl($view_doctor_notes_list->patientName) == "") { ?>
		<th data-name="patientName" class="<?php echo $view_doctor_notes_list->patientName->headerCellClass() ?>"><div id="elh_view_doctor_notes_patientName" class="view_doctor_notes_patientName"><div class="ew-table-header-caption"><?php echo $view_doctor_notes_list->patientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patientName" class="<?php echo $view_doctor_notes_list->patientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_doctor_notes_list->SortUrl($view_doctor_notes_list->patientName) ?>', 1);"><div id="elh_view_doctor_notes_patientName" class="view_doctor_notes_patientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_doctor_notes_list->patientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_doctor_notes_list->patientName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_doctor_notes_list->patientName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_doctor_notes_list->DoctorName->Visible) { // DoctorName ?>
	<?php if ($view_doctor_notes_list->SortUrl($view_doctor_notes_list->DoctorName) == "") { ?>
		<th data-name="DoctorName" class="<?php echo $view_doctor_notes_list->DoctorName->headerCellClass() ?>"><div id="elh_view_doctor_notes_DoctorName" class="view_doctor_notes_DoctorName"><div class="ew-table-header-caption"><?php echo $view_doctor_notes_list->DoctorName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DoctorName" class="<?php echo $view_doctor_notes_list->DoctorName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_doctor_notes_list->SortUrl($view_doctor_notes_list->DoctorName) ?>', 1);"><div id="elh_view_doctor_notes_DoctorName" class="view_doctor_notes_DoctorName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_doctor_notes_list->DoctorName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_doctor_notes_list->DoctorName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_doctor_notes_list->DoctorName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_doctor_notes_list->Referal->Visible) { // Referal ?>
	<?php if ($view_doctor_notes_list->SortUrl($view_doctor_notes_list->Referal) == "") { ?>
		<th data-name="Referal" class="<?php echo $view_doctor_notes_list->Referal->headerCellClass() ?>"><div id="elh_view_doctor_notes_Referal" class="view_doctor_notes_Referal"><div class="ew-table-header-caption"><?php echo $view_doctor_notes_list->Referal->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Referal" class="<?php echo $view_doctor_notes_list->Referal->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_doctor_notes_list->SortUrl($view_doctor_notes_list->Referal) ?>', 1);"><div id="elh_view_doctor_notes_Referal" class="view_doctor_notes_Referal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_doctor_notes_list->Referal->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_doctor_notes_list->Referal->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_doctor_notes_list->Referal->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_doctor_notes_list->PatientTypee->Visible) { // PatientTypee ?>
	<?php if ($view_doctor_notes_list->SortUrl($view_doctor_notes_list->PatientTypee) == "") { ?>
		<th data-name="PatientTypee" class="<?php echo $view_doctor_notes_list->PatientTypee->headerCellClass() ?>"><div id="elh_view_doctor_notes_PatientTypee" class="view_doctor_notes_PatientTypee"><div class="ew-table-header-caption"><?php echo $view_doctor_notes_list->PatientTypee->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientTypee" class="<?php echo $view_doctor_notes_list->PatientTypee->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_doctor_notes_list->SortUrl($view_doctor_notes_list->PatientTypee) ?>', 1);"><div id="elh_view_doctor_notes_PatientTypee" class="view_doctor_notes_PatientTypee">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_doctor_notes_list->PatientTypee->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_doctor_notes_list->PatientTypee->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_doctor_notes_list->PatientTypee->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_doctor_notes_list->procedurenotes->Visible) { // procedurenotes ?>
	<?php if ($view_doctor_notes_list->SortUrl($view_doctor_notes_list->procedurenotes) == "") { ?>
		<th data-name="procedurenotes" class="<?php echo $view_doctor_notes_list->procedurenotes->headerCellClass() ?>"><div id="elh_view_doctor_notes_procedurenotes" class="view_doctor_notes_procedurenotes"><div class="ew-table-header-caption"><?php echo $view_doctor_notes_list->procedurenotes->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="procedurenotes" class="<?php echo $view_doctor_notes_list->procedurenotes->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_doctor_notes_list->SortUrl($view_doctor_notes_list->procedurenotes) ?>', 1);"><div id="elh_view_doctor_notes_procedurenotes" class="view_doctor_notes_procedurenotes">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_doctor_notes_list->procedurenotes->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_doctor_notes_list->procedurenotes->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_doctor_notes_list->procedurenotes->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_doctor_notes_list->HospID->Visible) { // HospID ?>
	<?php if ($view_doctor_notes_list->SortUrl($view_doctor_notes_list->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_doctor_notes_list->HospID->headerCellClass() ?>"><div id="elh_view_doctor_notes_HospID" class="view_doctor_notes_HospID"><div class="ew-table-header-caption"><?php echo $view_doctor_notes_list->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_doctor_notes_list->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_doctor_notes_list->SortUrl($view_doctor_notes_list->HospID) ?>', 1);"><div id="elh_view_doctor_notes_HospID" class="view_doctor_notes_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_doctor_notes_list->HospID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_doctor_notes_list->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_doctor_notes_list->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_doctor_notes_list->Created->Visible) { // Created ?>
	<?php if ($view_doctor_notes_list->SortUrl($view_doctor_notes_list->Created) == "") { ?>
		<th data-name="Created" class="<?php echo $view_doctor_notes_list->Created->headerCellClass() ?>" style="white-space: nowrap;"><div id="elh_view_doctor_notes_Created" class="view_doctor_notes_Created"><div class="ew-table-header-caption"><?php echo $view_doctor_notes_list->Created->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Created" class="<?php echo $view_doctor_notes_list->Created->headerCellClass() ?>" style="white-space: nowrap;"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_doctor_notes_list->SortUrl($view_doctor_notes_list->Created) ?>', 1);"><div id="elh_view_doctor_notes_Created" class="view_doctor_notes_Created">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_doctor_notes_list->Created->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_doctor_notes_list->Created->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_doctor_notes_list->Created->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_doctor_notes_list->Started->Visible) { // Started ?>
	<?php if ($view_doctor_notes_list->SortUrl($view_doctor_notes_list->Started) == "") { ?>
		<th data-name="Started" class="<?php echo $view_doctor_notes_list->Started->headerCellClass() ?>"><div id="elh_view_doctor_notes_Started" class="view_doctor_notes_Started"><div class="ew-table-header-caption"><?php echo $view_doctor_notes_list->Started->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Started" class="<?php echo $view_doctor_notes_list->Started->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_doctor_notes_list->SortUrl($view_doctor_notes_list->Started) ?>', 1);"><div id="elh_view_doctor_notes_Started" class="view_doctor_notes_Started">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_doctor_notes_list->Started->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_doctor_notes_list->Started->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_doctor_notes_list->Started->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_doctor_notes_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_doctor_notes_list->ExportAll && $view_doctor_notes_list->isExport()) {
	$view_doctor_notes_list->StopRecord = $view_doctor_notes_list->TotalRecords;
} else {

	// Set the last record to display
	if ($view_doctor_notes_list->TotalRecords > $view_doctor_notes_list->StartRecord + $view_doctor_notes_list->DisplayRecords - 1)
		$view_doctor_notes_list->StopRecord = $view_doctor_notes_list->StartRecord + $view_doctor_notes_list->DisplayRecords - 1;
	else
		$view_doctor_notes_list->StopRecord = $view_doctor_notes_list->TotalRecords;
}
$view_doctor_notes_list->RecordCount = $view_doctor_notes_list->StartRecord - 1;
if ($view_doctor_notes_list->Recordset && !$view_doctor_notes_list->Recordset->EOF) {
	$view_doctor_notes_list->Recordset->moveFirst();
	$selectLimit = $view_doctor_notes_list->UseSelectLimit;
	if (!$selectLimit && $view_doctor_notes_list->StartRecord > 1)
		$view_doctor_notes_list->Recordset->move($view_doctor_notes_list->StartRecord - 1);
} elseif (!$view_doctor_notes->AllowAddDeleteRow && $view_doctor_notes_list->StopRecord == 0) {
	$view_doctor_notes_list->StopRecord = $view_doctor_notes->GridAddRowCount;
}

// Initialize aggregate
$view_doctor_notes->RowType = ROWTYPE_AGGREGATEINIT;
$view_doctor_notes->resetAttributes();
$view_doctor_notes_list->renderRow();
while ($view_doctor_notes_list->RecordCount < $view_doctor_notes_list->StopRecord) {
	$view_doctor_notes_list->RecordCount++;
	if ($view_doctor_notes_list->RecordCount >= $view_doctor_notes_list->StartRecord) {
		$view_doctor_notes_list->RowCount++;

		// Set up key count
		$view_doctor_notes_list->KeyCount = $view_doctor_notes_list->RowIndex;

		// Init row class and style
		$view_doctor_notes->resetAttributes();
		$view_doctor_notes->CssClass = "";
		if ($view_doctor_notes_list->isGridAdd()) {
		} else {
			$view_doctor_notes_list->loadRowValues($view_doctor_notes_list->Recordset); // Load row values
		}
		$view_doctor_notes->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_doctor_notes->RowAttrs->merge(["data-rowindex" => $view_doctor_notes_list->RowCount, "id" => "r" . $view_doctor_notes_list->RowCount . "_view_doctor_notes", "data-rowtype" => $view_doctor_notes->RowType]);

		// Render row
		$view_doctor_notes_list->renderRow();

		// Render list options
		$view_doctor_notes_list->renderListOptions();
?>
	<tr <?php echo $view_doctor_notes->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_doctor_notes_list->ListOptions->render("body", "left", $view_doctor_notes_list->RowCount);
?>
	<?php if ($view_doctor_notes_list->patientID->Visible) { // patientID ?>
		<td data-name="patientID" <?php echo $view_doctor_notes_list->patientID->cellAttributes() ?>>
<span id="el<?php echo $view_doctor_notes_list->RowCount ?>_view_doctor_notes_patientID">
<span<?php echo $view_doctor_notes_list->patientID->viewAttributes() ?>><?php echo $view_doctor_notes_list->patientID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_doctor_notes_list->patientName->Visible) { // patientName ?>
		<td data-name="patientName" <?php echo $view_doctor_notes_list->patientName->cellAttributes() ?>>
<span id="el<?php echo $view_doctor_notes_list->RowCount ?>_view_doctor_notes_patientName">
<span<?php echo $view_doctor_notes_list->patientName->viewAttributes() ?>><?php echo $view_doctor_notes_list->patientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_doctor_notes_list->DoctorName->Visible) { // DoctorName ?>
		<td data-name="DoctorName" <?php echo $view_doctor_notes_list->DoctorName->cellAttributes() ?>>
<span id="el<?php echo $view_doctor_notes_list->RowCount ?>_view_doctor_notes_DoctorName">
<span<?php echo $view_doctor_notes_list->DoctorName->viewAttributes() ?>><?php echo $view_doctor_notes_list->DoctorName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_doctor_notes_list->Referal->Visible) { // Referal ?>
		<td data-name="Referal" <?php echo $view_doctor_notes_list->Referal->cellAttributes() ?>>
<span id="el<?php echo $view_doctor_notes_list->RowCount ?>_view_doctor_notes_Referal">
<span<?php echo $view_doctor_notes_list->Referal->viewAttributes() ?>><?php echo $view_doctor_notes_list->Referal->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_doctor_notes_list->PatientTypee->Visible) { // PatientTypee ?>
		<td data-name="PatientTypee" <?php echo $view_doctor_notes_list->PatientTypee->cellAttributes() ?>>
<span id="el<?php echo $view_doctor_notes_list->RowCount ?>_view_doctor_notes_PatientTypee">
<span<?php echo $view_doctor_notes_list->PatientTypee->viewAttributes() ?>><?php echo $view_doctor_notes_list->PatientTypee->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_doctor_notes_list->procedurenotes->Visible) { // procedurenotes ?>
		<td data-name="procedurenotes" <?php echo $view_doctor_notes_list->procedurenotes->cellAttributes() ?>>
<span id="el<?php echo $view_doctor_notes_list->RowCount ?>_view_doctor_notes_procedurenotes">
<span<?php echo $view_doctor_notes_list->procedurenotes->viewAttributes() ?>><?php echo $view_doctor_notes_list->procedurenotes->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_doctor_notes_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $view_doctor_notes_list->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_doctor_notes_list->RowCount ?>_view_doctor_notes_HospID">
<span<?php echo $view_doctor_notes_list->HospID->viewAttributes() ?>><?php echo $view_doctor_notes_list->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_doctor_notes_list->Created->Visible) { // Created ?>
		<td data-name="Created" <?php echo $view_doctor_notes_list->Created->cellAttributes() ?>>
<span id="el<?php echo $view_doctor_notes_list->RowCount ?>_view_doctor_notes_Created">
<span<?php echo $view_doctor_notes_list->Created->viewAttributes() ?>><?php echo $view_doctor_notes_list->Created->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_doctor_notes_list->Started->Visible) { // Started ?>
		<td data-name="Started" <?php echo $view_doctor_notes_list->Started->cellAttributes() ?>>
<span id="el<?php echo $view_doctor_notes_list->RowCount ?>_view_doctor_notes_Started">
<span<?php echo $view_doctor_notes_list->Started->viewAttributes() ?>><?php echo $view_doctor_notes_list->Started->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_doctor_notes_list->ListOptions->render("body", "right", $view_doctor_notes_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$view_doctor_notes_list->isGridAdd())
		$view_doctor_notes_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$view_doctor_notes->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_doctor_notes_list->Recordset)
	$view_doctor_notes_list->Recordset->Close();
?>
<?php if (!$view_doctor_notes_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_doctor_notes_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_doctor_notes_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_doctor_notes_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_doctor_notes_list->TotalRecords == 0 && !$view_doctor_notes->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_doctor_notes_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_doctor_notes_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_doctor_notes_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$view_doctor_notes_list->terminate();
?>