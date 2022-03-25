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
$view_dashboard_service_details_list = new view_dashboard_service_details_list();

// Run the page
$view_dashboard_service_details_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_dashboard_service_details_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$view_dashboard_service_details_list->isExport()) { ?>
<script>
var fview_dashboard_service_detailslist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fview_dashboard_service_detailslist = currentForm = new ew.Form("fview_dashboard_service_detailslist", "list");
	fview_dashboard_service_detailslist.formKeyCountName = '<?php echo $view_dashboard_service_details_list->FormKeyCountName ?>';
	loadjs.done("fview_dashboard_service_detailslist");
});
var fview_dashboard_service_detailslistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fview_dashboard_service_detailslistsrch = currentSearchForm = new ew.Form("fview_dashboard_service_detailslistsrch");

	// Validate function for search
	fview_dashboard_service_detailslistsrch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_createdDate");
		if (elm && !ew.checkEuroDate(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_dashboard_service_details_list->createdDate->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fview_dashboard_service_detailslistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_dashboard_service_detailslistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	// Filters

	fview_dashboard_service_detailslistsrch.filterList = <?php echo $view_dashboard_service_details_list->getFilterList() ?>;
	loadjs.done("fview_dashboard_service_detailslistsrch");
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
<?php if (!$view_dashboard_service_details_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_dashboard_service_details_list->TotalRecords > 0 && $view_dashboard_service_details_list->ExportOptions->visible()) { ?>
<?php $view_dashboard_service_details_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_dashboard_service_details_list->ImportOptions->visible()) { ?>
<?php $view_dashboard_service_details_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_dashboard_service_details_list->SearchOptions->visible()) { ?>
<?php $view_dashboard_service_details_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_dashboard_service_details_list->FilterOptions->visible()) { ?>
<?php $view_dashboard_service_details_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$view_dashboard_service_details_list->isExport() || Config("EXPORT_MASTER_RECORD") && $view_dashboard_service_details_list->isExport("print")) { ?>
<?php
if ($view_dashboard_service_details_list->DbMasterFilter != "" && $view_dashboard_service_details->getCurrentMasterTable() == "view_dashboard_service_servicetype") {
	if ($view_dashboard_service_details_list->MasterRecordExists) {
		include_once "view_dashboard_service_servicetypemaster.php";
	}
}
?>
<?php } ?>
<?php
$view_dashboard_service_details_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_dashboard_service_details_list->isExport() && !$view_dashboard_service_details->CurrentAction) { ?>
<form name="fview_dashboard_service_detailslistsrch" id="fview_dashboard_service_detailslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fview_dashboard_service_detailslistsrch-search-panel" class="<?php echo $view_dashboard_service_details_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_dashboard_service_details">
	<div class="ew-extended-search">
<?php

// Render search row
$view_dashboard_service_details->RowType = ROWTYPE_SEARCH;
$view_dashboard_service_details->resetAttributes();
$view_dashboard_service_details_list->renderRow();
?>
<?php if ($view_dashboard_service_details_list->Services->Visible) { // Services ?>
	<?php
		$view_dashboard_service_details_list->SearchColumnCount++;
		if (($view_dashboard_service_details_list->SearchColumnCount - 1) % $view_dashboard_service_details_list->SearchFieldsPerRow == 0) {
			$view_dashboard_service_details_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_dashboard_service_details_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_Services" class="ew-cell form-group">
		<label for="x_Services" class="ew-search-caption ew-label"><?php echo $view_dashboard_service_details_list->Services->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Services" id="z_Services" value="LIKE">
</span>
		<span id="el_view_dashboard_service_details_Services" class="ew-search-field">
<input type="text" data-table="view_dashboard_service_details" data-field="x_Services" name="x_Services" id="x_Services" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_list->Services->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_list->Services->EditValue ?>"<?php echo $view_dashboard_service_details_list->Services->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_dashboard_service_details_list->SearchColumnCount % $view_dashboard_service_details_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details_list->createdDate->Visible) { // createdDate ?>
	<?php
		$view_dashboard_service_details_list->SearchColumnCount++;
		if (($view_dashboard_service_details_list->SearchColumnCount - 1) % $view_dashboard_service_details_list->SearchFieldsPerRow == 0) {
			$view_dashboard_service_details_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_dashboard_service_details_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_createdDate" class="ew-cell form-group">
		<label for="x_createdDate" class="ew-search-caption ew-label"><?php echo $view_dashboard_service_details_list->createdDate->caption() ?></label>
		<span class="ew-search-operator">
<select name="z_createdDate" id="z_createdDate" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?php echo $view_dashboard_service_details_list->createdDate->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?php echo $Language->phrase("EQUAL") ?></option>
<option value="<>"<?php echo $view_dashboard_service_details_list->createdDate->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?php echo $Language->phrase("<>") ?></option>
<option value="<"<?php echo $view_dashboard_service_details_list->createdDate->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?php echo $Language->phrase("<") ?></option>
<option value="<="<?php echo $view_dashboard_service_details_list->createdDate->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?php echo $Language->phrase("<=") ?></option>
<option value=">"<?php echo $view_dashboard_service_details_list->createdDate->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?php echo $Language->phrase(">") ?></option>
<option value=">="<?php echo $view_dashboard_service_details_list->createdDate->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?php echo $Language->phrase(">=") ?></option>
<option value="IS NULL"<?php echo $view_dashboard_service_details_list->createdDate->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?php echo $view_dashboard_service_details_list->createdDate->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?php echo $view_dashboard_service_details_list->createdDate->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?php echo $Language->phrase("BETWEEN") ?></option>
</select>
</span>
		<span id="el_view_dashboard_service_details_createdDate" class="ew-search-field">
<input type="text" data-table="view_dashboard_service_details" data-field="x_createdDate" data-format="7" name="x_createdDate" id="x_createdDate" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_list->createdDate->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_list->createdDate->EditValue ?>"<?php echo $view_dashboard_service_details_list->createdDate->editAttributes() ?>>
<?php if (!$view_dashboard_service_details_list->createdDate->ReadOnly && !$view_dashboard_service_details_list->createdDate->Disabled && !isset($view_dashboard_service_details_list->createdDate->EditAttrs["readonly"]) && !isset($view_dashboard_service_details_list->createdDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_dashboard_service_detailslistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_dashboard_service_detailslistsrch", "x_createdDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
		<span class="ew-search-and d-none"><label><?php echo $Language->phrase("AND") ?></label></span>
		<span id="el2_view_dashboard_service_details_createdDate" class="ew-search-field2 d-none">
<input type="text" data-table="view_dashboard_service_details" data-field="x_createdDate" data-format="7" name="y_createdDate" id="y_createdDate" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_list->createdDate->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_list->createdDate->EditValue2 ?>"<?php echo $view_dashboard_service_details_list->createdDate->editAttributes() ?>>
<?php if (!$view_dashboard_service_details_list->createdDate->ReadOnly && !$view_dashboard_service_details_list->createdDate->Disabled && !isset($view_dashboard_service_details_list->createdDate->EditAttrs["readonly"]) && !isset($view_dashboard_service_details_list->createdDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_dashboard_service_detailslistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_dashboard_service_detailslistsrch", "y_createdDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
	</div>
	<?php if ($view_dashboard_service_details_list->SearchColumnCount % $view_dashboard_service_details_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details_list->DrName->Visible) { // DrName ?>
	<?php
		$view_dashboard_service_details_list->SearchColumnCount++;
		if (($view_dashboard_service_details_list->SearchColumnCount - 1) % $view_dashboard_service_details_list->SearchFieldsPerRow == 0) {
			$view_dashboard_service_details_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_dashboard_service_details_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_DrName" class="ew-cell form-group">
		<label for="x_DrName" class="ew-search-caption ew-label"><?php echo $view_dashboard_service_details_list->DrName->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DrName" id="z_DrName" value="LIKE">
</span>
		<span id="el_view_dashboard_service_details_DrName" class="ew-search-field">
<input type="text" data-table="view_dashboard_service_details" data-field="x_DrName" name="x_DrName" id="x_DrName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_list->DrName->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_list->DrName->EditValue ?>"<?php echo $view_dashboard_service_details_list->DrName->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_dashboard_service_details_list->SearchColumnCount % $view_dashboard_service_details_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details_list->DRDepartment->Visible) { // DRDepartment ?>
	<?php
		$view_dashboard_service_details_list->SearchColumnCount++;
		if (($view_dashboard_service_details_list->SearchColumnCount - 1) % $view_dashboard_service_details_list->SearchFieldsPerRow == 0) {
			$view_dashboard_service_details_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_dashboard_service_details_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_DRDepartment" class="ew-cell form-group">
		<label for="x_DRDepartment" class="ew-search-caption ew-label"><?php echo $view_dashboard_service_details_list->DRDepartment->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DRDepartment" id="z_DRDepartment" value="LIKE">
</span>
		<span id="el_view_dashboard_service_details_DRDepartment" class="ew-search-field">
<input type="text" data-table="view_dashboard_service_details" data-field="x_DRDepartment" name="x_DRDepartment" id="x_DRDepartment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_list->DRDepartment->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_list->DRDepartment->EditValue ?>"<?php echo $view_dashboard_service_details_list->DRDepartment->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_dashboard_service_details_list->SearchColumnCount % $view_dashboard_service_details_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details_list->DEPARTMENT->Visible) { // DEPARTMENT ?>
	<?php
		$view_dashboard_service_details_list->SearchColumnCount++;
		if (($view_dashboard_service_details_list->SearchColumnCount - 1) % $view_dashboard_service_details_list->SearchFieldsPerRow == 0) {
			$view_dashboard_service_details_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_dashboard_service_details_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_DEPARTMENT" class="ew-cell form-group">
		<label for="x_DEPARTMENT" class="ew-search-caption ew-label"><?php echo $view_dashboard_service_details_list->DEPARTMENT->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DEPARTMENT" id="z_DEPARTMENT" value="LIKE">
</span>
		<span id="el_view_dashboard_service_details_DEPARTMENT" class="ew-search-field">
<input type="text" data-table="view_dashboard_service_details" data-field="x_DEPARTMENT" name="x_DEPARTMENT" id="x_DEPARTMENT" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_list->DEPARTMENT->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_list->DEPARTMENT->EditValue ?>"<?php echo $view_dashboard_service_details_list->DEPARTMENT->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_dashboard_service_details_list->SearchColumnCount % $view_dashboard_service_details_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($view_dashboard_service_details_list->SearchColumnCount % $view_dashboard_service_details_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $view_dashboard_service_details_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($view_dashboard_service_details_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($view_dashboard_service_details_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_dashboard_service_details_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_dashboard_service_details_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_dashboard_service_details_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_dashboard_service_details_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_dashboard_service_details_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $view_dashboard_service_details_list->showPageHeader(); ?>
<?php
$view_dashboard_service_details_list->showMessage();
?>
<?php if ($view_dashboard_service_details_list->TotalRecords > 0 || $view_dashboard_service_details->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_dashboard_service_details_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_dashboard_service_details">
<?php if (!$view_dashboard_service_details_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_dashboard_service_details_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_dashboard_service_details_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_dashboard_service_details_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_dashboard_service_detailslist" id="fview_dashboard_service_detailslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_dashboard_service_details">
<?php if ($view_dashboard_service_details->getCurrentMasterTable() == "view_dashboard_service_servicetype" && $view_dashboard_service_details->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="view_dashboard_service_servicetype">
<input type="hidden" name="fk_DEPARTMENT" value="<?php echo HtmlEncode($view_dashboard_service_details_list->DEPARTMENT->getSessionValue()) ?>">
<input type="hidden" name="fk_HospID" value="<?php echo HtmlEncode($view_dashboard_service_details_list->HospID->getSessionValue()) ?>">
<input type="hidden" name="fk_createdDate" value="<?php echo HtmlEncode($view_dashboard_service_details_list->createdDate->getSessionValue()) ?>">
<input type="hidden" name="fk_SERVICE_TYPE" value="<?php echo HtmlEncode($view_dashboard_service_details_list->SERVICE_TYPE->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_view_dashboard_service_details" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($view_dashboard_service_details_list->TotalRecords > 0 || $view_dashboard_service_details_list->isGridEdit()) { ?>
<table id="tbl_view_dashboard_service_detailslist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_dashboard_service_details->RowType = ROWTYPE_HEADER;

// Render list options
$view_dashboard_service_details_list->renderListOptions();

// Render list options (header, left)
$view_dashboard_service_details_list->ListOptions->render("header", "left");
?>
<?php if ($view_dashboard_service_details_list->PatientId->Visible) { // PatientId ?>
	<?php if ($view_dashboard_service_details_list->SortUrl($view_dashboard_service_details_list->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $view_dashboard_service_details_list->PatientId->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_PatientId" class="view_dashboard_service_details_PatientId"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_details_list->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $view_dashboard_service_details_list->PatientId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_dashboard_service_details_list->SortUrl($view_dashboard_service_details_list->PatientId) ?>', 1);"><div id="elh_view_dashboard_service_details_PatientId" class="view_dashboard_service_details_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details_list->PatientId->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details_list->PatientId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_service_details_list->PatientId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details_list->PatientName->Visible) { // PatientName ?>
	<?php if ($view_dashboard_service_details_list->SortUrl($view_dashboard_service_details_list->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $view_dashboard_service_details_list->PatientName->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_PatientName" class="view_dashboard_service_details_PatientName"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_details_list->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $view_dashboard_service_details_list->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_dashboard_service_details_list->SortUrl($view_dashboard_service_details_list->PatientName) ?>', 1);"><div id="elh_view_dashboard_service_details_PatientName" class="view_dashboard_service_details_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details_list->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details_list->PatientName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_service_details_list->PatientName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details_list->Services->Visible) { // Services ?>
	<?php if ($view_dashboard_service_details_list->SortUrl($view_dashboard_service_details_list->Services) == "") { ?>
		<th data-name="Services" class="<?php echo $view_dashboard_service_details_list->Services->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_Services" class="view_dashboard_service_details_Services"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_details_list->Services->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Services" class="<?php echo $view_dashboard_service_details_list->Services->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_dashboard_service_details_list->SortUrl($view_dashboard_service_details_list->Services) ?>', 1);"><div id="elh_view_dashboard_service_details_Services" class="view_dashboard_service_details_Services">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details_list->Services->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details_list->Services->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_service_details_list->Services->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details_list->amount->Visible) { // amount ?>
	<?php if ($view_dashboard_service_details_list->SortUrl($view_dashboard_service_details_list->amount) == "") { ?>
		<th data-name="amount" class="<?php echo $view_dashboard_service_details_list->amount->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_amount" class="view_dashboard_service_details_amount"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_details_list->amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="amount" class="<?php echo $view_dashboard_service_details_list->amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_dashboard_service_details_list->SortUrl($view_dashboard_service_details_list->amount) ?>', 1);"><div id="elh_view_dashboard_service_details_amount" class="view_dashboard_service_details_amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details_list->amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details_list->amount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_service_details_list->amount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details_list->SubTotal->Visible) { // SubTotal ?>
	<?php if ($view_dashboard_service_details_list->SortUrl($view_dashboard_service_details_list->SubTotal) == "") { ?>
		<th data-name="SubTotal" class="<?php echo $view_dashboard_service_details_list->SubTotal->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_SubTotal" class="view_dashboard_service_details_SubTotal"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_details_list->SubTotal->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SubTotal" class="<?php echo $view_dashboard_service_details_list->SubTotal->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_dashboard_service_details_list->SortUrl($view_dashboard_service_details_list->SubTotal) ?>', 1);"><div id="elh_view_dashboard_service_details_SubTotal" class="view_dashboard_service_details_SubTotal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details_list->SubTotal->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details_list->SubTotal->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_service_details_list->SubTotal->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details_list->createdby->Visible) { // createdby ?>
	<?php if ($view_dashboard_service_details_list->SortUrl($view_dashboard_service_details_list->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $view_dashboard_service_details_list->createdby->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_createdby" class="view_dashboard_service_details_createdby"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_details_list->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $view_dashboard_service_details_list->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_dashboard_service_details_list->SortUrl($view_dashboard_service_details_list->createdby) ?>', 1);"><div id="elh_view_dashboard_service_details_createdby" class="view_dashboard_service_details_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details_list->createdby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details_list->createdby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_service_details_list->createdby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details_list->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_dashboard_service_details_list->SortUrl($view_dashboard_service_details_list->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_dashboard_service_details_list->createddatetime->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_createddatetime" class="view_dashboard_service_details_createddatetime"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_details_list->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_dashboard_service_details_list->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_dashboard_service_details_list->SortUrl($view_dashboard_service_details_list->createddatetime) ?>', 1);"><div id="elh_view_dashboard_service_details_createddatetime" class="view_dashboard_service_details_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details_list->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details_list->createddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_service_details_list->createddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details_list->createdDate->Visible) { // createdDate ?>
	<?php if ($view_dashboard_service_details_list->SortUrl($view_dashboard_service_details_list->createdDate) == "") { ?>
		<th data-name="createdDate" class="<?php echo $view_dashboard_service_details_list->createdDate->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_createdDate" class="view_dashboard_service_details_createdDate"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_details_list->createdDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdDate" class="<?php echo $view_dashboard_service_details_list->createdDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_dashboard_service_details_list->SortUrl($view_dashboard_service_details_list->createdDate) ?>', 1);"><div id="elh_view_dashboard_service_details_createdDate" class="view_dashboard_service_details_createdDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details_list->createdDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details_list->createdDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_service_details_list->createdDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details_list->DrName->Visible) { // DrName ?>
	<?php if ($view_dashboard_service_details_list->SortUrl($view_dashboard_service_details_list->DrName) == "") { ?>
		<th data-name="DrName" class="<?php echo $view_dashboard_service_details_list->DrName->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_DrName" class="view_dashboard_service_details_DrName"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_details_list->DrName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrName" class="<?php echo $view_dashboard_service_details_list->DrName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_dashboard_service_details_list->SortUrl($view_dashboard_service_details_list->DrName) ?>', 1);"><div id="elh_view_dashboard_service_details_DrName" class="view_dashboard_service_details_DrName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details_list->DrName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details_list->DrName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_service_details_list->DrName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details_list->DRDepartment->Visible) { // DRDepartment ?>
	<?php if ($view_dashboard_service_details_list->SortUrl($view_dashboard_service_details_list->DRDepartment) == "") { ?>
		<th data-name="DRDepartment" class="<?php echo $view_dashboard_service_details_list->DRDepartment->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_DRDepartment" class="view_dashboard_service_details_DRDepartment"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_details_list->DRDepartment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DRDepartment" class="<?php echo $view_dashboard_service_details_list->DRDepartment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_dashboard_service_details_list->SortUrl($view_dashboard_service_details_list->DRDepartment) ?>', 1);"><div id="elh_view_dashboard_service_details_DRDepartment" class="view_dashboard_service_details_DRDepartment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details_list->DRDepartment->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details_list->DRDepartment->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_service_details_list->DRDepartment->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details_list->ItemCode->Visible) { // ItemCode ?>
	<?php if ($view_dashboard_service_details_list->SortUrl($view_dashboard_service_details_list->ItemCode) == "") { ?>
		<th data-name="ItemCode" class="<?php echo $view_dashboard_service_details_list->ItemCode->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_ItemCode" class="view_dashboard_service_details_ItemCode"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_details_list->ItemCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ItemCode" class="<?php echo $view_dashboard_service_details_list->ItemCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_dashboard_service_details_list->SortUrl($view_dashboard_service_details_list->ItemCode) ?>', 1);"><div id="elh_view_dashboard_service_details_ItemCode" class="view_dashboard_service_details_ItemCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details_list->ItemCode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details_list->ItemCode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_service_details_list->ItemCode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details_list->DEptCd->Visible) { // DEptCd ?>
	<?php if ($view_dashboard_service_details_list->SortUrl($view_dashboard_service_details_list->DEptCd) == "") { ?>
		<th data-name="DEptCd" class="<?php echo $view_dashboard_service_details_list->DEptCd->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_DEptCd" class="view_dashboard_service_details_DEptCd"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_details_list->DEptCd->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DEptCd" class="<?php echo $view_dashboard_service_details_list->DEptCd->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_dashboard_service_details_list->SortUrl($view_dashboard_service_details_list->DEptCd) ?>', 1);"><div id="elh_view_dashboard_service_details_DEptCd" class="view_dashboard_service_details_DEptCd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details_list->DEptCd->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details_list->DEptCd->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_service_details_list->DEptCd->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details_list->CODE->Visible) { // CODE ?>
	<?php if ($view_dashboard_service_details_list->SortUrl($view_dashboard_service_details_list->CODE) == "") { ?>
		<th data-name="CODE" class="<?php echo $view_dashboard_service_details_list->CODE->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_CODE" class="view_dashboard_service_details_CODE"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_details_list->CODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CODE" class="<?php echo $view_dashboard_service_details_list->CODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_dashboard_service_details_list->SortUrl($view_dashboard_service_details_list->CODE) ?>', 1);"><div id="elh_view_dashboard_service_details_CODE" class="view_dashboard_service_details_CODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details_list->CODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details_list->CODE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_service_details_list->CODE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details_list->SERVICE->Visible) { // SERVICE ?>
	<?php if ($view_dashboard_service_details_list->SortUrl($view_dashboard_service_details_list->SERVICE) == "") { ?>
		<th data-name="SERVICE" class="<?php echo $view_dashboard_service_details_list->SERVICE->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_SERVICE" class="view_dashboard_service_details_SERVICE"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_details_list->SERVICE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SERVICE" class="<?php echo $view_dashboard_service_details_list->SERVICE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_dashboard_service_details_list->SortUrl($view_dashboard_service_details_list->SERVICE) ?>', 1);"><div id="elh_view_dashboard_service_details_SERVICE" class="view_dashboard_service_details_SERVICE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details_list->SERVICE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details_list->SERVICE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_service_details_list->SERVICE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details_list->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
	<?php if ($view_dashboard_service_details_list->SortUrl($view_dashboard_service_details_list->SERVICE_TYPE) == "") { ?>
		<th data-name="SERVICE_TYPE" class="<?php echo $view_dashboard_service_details_list->SERVICE_TYPE->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_SERVICE_TYPE" class="view_dashboard_service_details_SERVICE_TYPE"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_details_list->SERVICE_TYPE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SERVICE_TYPE" class="<?php echo $view_dashboard_service_details_list->SERVICE_TYPE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_dashboard_service_details_list->SortUrl($view_dashboard_service_details_list->SERVICE_TYPE) ?>', 1);"><div id="elh_view_dashboard_service_details_SERVICE_TYPE" class="view_dashboard_service_details_SERVICE_TYPE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details_list->SERVICE_TYPE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details_list->SERVICE_TYPE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_service_details_list->SERVICE_TYPE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details_list->DEPARTMENT->Visible) { // DEPARTMENT ?>
	<?php if ($view_dashboard_service_details_list->SortUrl($view_dashboard_service_details_list->DEPARTMENT) == "") { ?>
		<th data-name="DEPARTMENT" class="<?php echo $view_dashboard_service_details_list->DEPARTMENT->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_DEPARTMENT" class="view_dashboard_service_details_DEPARTMENT"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_details_list->DEPARTMENT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DEPARTMENT" class="<?php echo $view_dashboard_service_details_list->DEPARTMENT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_dashboard_service_details_list->SortUrl($view_dashboard_service_details_list->DEPARTMENT) ?>', 1);"><div id="elh_view_dashboard_service_details_DEPARTMENT" class="view_dashboard_service_details_DEPARTMENT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details_list->DEPARTMENT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details_list->DEPARTMENT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_service_details_list->DEPARTMENT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details_list->HospID->Visible) { // HospID ?>
	<?php if ($view_dashboard_service_details_list->SortUrl($view_dashboard_service_details_list->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_dashboard_service_details_list->HospID->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_HospID" class="view_dashboard_service_details_HospID"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_details_list->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_dashboard_service_details_list->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_dashboard_service_details_list->SortUrl($view_dashboard_service_details_list->HospID) ?>', 1);"><div id="elh_view_dashboard_service_details_HospID" class="view_dashboard_service_details_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details_list->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details_list->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_service_details_list->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_service_details_list->vid->Visible) { // vid ?>
	<?php if ($view_dashboard_service_details_list->SortUrl($view_dashboard_service_details_list->vid) == "") { ?>
		<th data-name="vid" class="<?php echo $view_dashboard_service_details_list->vid->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_vid" class="view_dashboard_service_details_vid"><div class="ew-table-header-caption"><?php echo $view_dashboard_service_details_list->vid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="vid" class="<?php echo $view_dashboard_service_details_list->vid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_dashboard_service_details_list->SortUrl($view_dashboard_service_details_list->vid) ?>', 1);"><div id="elh_view_dashboard_service_details_vid" class="view_dashboard_service_details_vid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_service_details_list->vid->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_service_details_list->vid->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_service_details_list->vid->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_dashboard_service_details_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_dashboard_service_details_list->ExportAll && $view_dashboard_service_details_list->isExport()) {
	$view_dashboard_service_details_list->StopRecord = $view_dashboard_service_details_list->TotalRecords;
} else {

	// Set the last record to display
	if ($view_dashboard_service_details_list->TotalRecords > $view_dashboard_service_details_list->StartRecord + $view_dashboard_service_details_list->DisplayRecords - 1)
		$view_dashboard_service_details_list->StopRecord = $view_dashboard_service_details_list->StartRecord + $view_dashboard_service_details_list->DisplayRecords - 1;
	else
		$view_dashboard_service_details_list->StopRecord = $view_dashboard_service_details_list->TotalRecords;
}
$view_dashboard_service_details_list->RecordCount = $view_dashboard_service_details_list->StartRecord - 1;
if ($view_dashboard_service_details_list->Recordset && !$view_dashboard_service_details_list->Recordset->EOF) {
	$view_dashboard_service_details_list->Recordset->moveFirst();
	$selectLimit = $view_dashboard_service_details_list->UseSelectLimit;
	if (!$selectLimit && $view_dashboard_service_details_list->StartRecord > 1)
		$view_dashboard_service_details_list->Recordset->move($view_dashboard_service_details_list->StartRecord - 1);
} elseif (!$view_dashboard_service_details->AllowAddDeleteRow && $view_dashboard_service_details_list->StopRecord == 0) {
	$view_dashboard_service_details_list->StopRecord = $view_dashboard_service_details->GridAddRowCount;
}

// Initialize aggregate
$view_dashboard_service_details->RowType = ROWTYPE_AGGREGATEINIT;
$view_dashboard_service_details->resetAttributes();
$view_dashboard_service_details_list->renderRow();
while ($view_dashboard_service_details_list->RecordCount < $view_dashboard_service_details_list->StopRecord) {
	$view_dashboard_service_details_list->RecordCount++;
	if ($view_dashboard_service_details_list->RecordCount >= $view_dashboard_service_details_list->StartRecord) {
		$view_dashboard_service_details_list->RowCount++;

		// Set up key count
		$view_dashboard_service_details_list->KeyCount = $view_dashboard_service_details_list->RowIndex;

		// Init row class and style
		$view_dashboard_service_details->resetAttributes();
		$view_dashboard_service_details->CssClass = "";
		if ($view_dashboard_service_details_list->isGridAdd()) {
		} else {
			$view_dashboard_service_details_list->loadRowValues($view_dashboard_service_details_list->Recordset); // Load row values
		}
		$view_dashboard_service_details->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_dashboard_service_details->RowAttrs->merge(["data-rowindex" => $view_dashboard_service_details_list->RowCount, "id" => "r" . $view_dashboard_service_details_list->RowCount . "_view_dashboard_service_details", "data-rowtype" => $view_dashboard_service_details->RowType]);

		// Render row
		$view_dashboard_service_details_list->renderRow();

		// Render list options
		$view_dashboard_service_details_list->renderListOptions();
?>
	<tr <?php echo $view_dashboard_service_details->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_dashboard_service_details_list->ListOptions->render("body", "left", $view_dashboard_service_details_list->RowCount);
?>
	<?php if ($view_dashboard_service_details_list->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId" <?php echo $view_dashboard_service_details_list->PatientId->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_service_details_list->RowCount ?>_view_dashboard_service_details_PatientId">
<span<?php echo $view_dashboard_service_details_list->PatientId->viewAttributes() ?>><?php echo $view_dashboard_service_details_list->PatientId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_list->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName" <?php echo $view_dashboard_service_details_list->PatientName->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_service_details_list->RowCount ?>_view_dashboard_service_details_PatientName">
<span<?php echo $view_dashboard_service_details_list->PatientName->viewAttributes() ?>><?php echo $view_dashboard_service_details_list->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_list->Services->Visible) { // Services ?>
		<td data-name="Services" <?php echo $view_dashboard_service_details_list->Services->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_service_details_list->RowCount ?>_view_dashboard_service_details_Services">
<span<?php echo $view_dashboard_service_details_list->Services->viewAttributes() ?>><?php echo $view_dashboard_service_details_list->Services->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_list->amount->Visible) { // amount ?>
		<td data-name="amount" <?php echo $view_dashboard_service_details_list->amount->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_service_details_list->RowCount ?>_view_dashboard_service_details_amount">
<span<?php echo $view_dashboard_service_details_list->amount->viewAttributes() ?>><?php echo $view_dashboard_service_details_list->amount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_list->SubTotal->Visible) { // SubTotal ?>
		<td data-name="SubTotal" <?php echo $view_dashboard_service_details_list->SubTotal->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_service_details_list->RowCount ?>_view_dashboard_service_details_SubTotal">
<span<?php echo $view_dashboard_service_details_list->SubTotal->viewAttributes() ?>><?php echo $view_dashboard_service_details_list->SubTotal->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_list->createdby->Visible) { // createdby ?>
		<td data-name="createdby" <?php echo $view_dashboard_service_details_list->createdby->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_service_details_list->RowCount ?>_view_dashboard_service_details_createdby">
<span<?php echo $view_dashboard_service_details_list->createdby->viewAttributes() ?>><?php echo $view_dashboard_service_details_list->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_list->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" <?php echo $view_dashboard_service_details_list->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_service_details_list->RowCount ?>_view_dashboard_service_details_createddatetime">
<span<?php echo $view_dashboard_service_details_list->createddatetime->viewAttributes() ?>><?php echo $view_dashboard_service_details_list->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_list->createdDate->Visible) { // createdDate ?>
		<td data-name="createdDate" <?php echo $view_dashboard_service_details_list->createdDate->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_service_details_list->RowCount ?>_view_dashboard_service_details_createdDate">
<span<?php echo $view_dashboard_service_details_list->createdDate->viewAttributes() ?>><?php echo $view_dashboard_service_details_list->createdDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_list->DrName->Visible) { // DrName ?>
		<td data-name="DrName" <?php echo $view_dashboard_service_details_list->DrName->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_service_details_list->RowCount ?>_view_dashboard_service_details_DrName">
<span<?php echo $view_dashboard_service_details_list->DrName->viewAttributes() ?>><?php echo $view_dashboard_service_details_list->DrName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_list->DRDepartment->Visible) { // DRDepartment ?>
		<td data-name="DRDepartment" <?php echo $view_dashboard_service_details_list->DRDepartment->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_service_details_list->RowCount ?>_view_dashboard_service_details_DRDepartment">
<span<?php echo $view_dashboard_service_details_list->DRDepartment->viewAttributes() ?>><?php echo $view_dashboard_service_details_list->DRDepartment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_list->ItemCode->Visible) { // ItemCode ?>
		<td data-name="ItemCode" <?php echo $view_dashboard_service_details_list->ItemCode->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_service_details_list->RowCount ?>_view_dashboard_service_details_ItemCode">
<span<?php echo $view_dashboard_service_details_list->ItemCode->viewAttributes() ?>><?php echo $view_dashboard_service_details_list->ItemCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_list->DEptCd->Visible) { // DEptCd ?>
		<td data-name="DEptCd" <?php echo $view_dashboard_service_details_list->DEptCd->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_service_details_list->RowCount ?>_view_dashboard_service_details_DEptCd">
<span<?php echo $view_dashboard_service_details_list->DEptCd->viewAttributes() ?>><?php echo $view_dashboard_service_details_list->DEptCd->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_list->CODE->Visible) { // CODE ?>
		<td data-name="CODE" <?php echo $view_dashboard_service_details_list->CODE->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_service_details_list->RowCount ?>_view_dashboard_service_details_CODE">
<span<?php echo $view_dashboard_service_details_list->CODE->viewAttributes() ?>><?php echo $view_dashboard_service_details_list->CODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_list->SERVICE->Visible) { // SERVICE ?>
		<td data-name="SERVICE" <?php echo $view_dashboard_service_details_list->SERVICE->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_service_details_list->RowCount ?>_view_dashboard_service_details_SERVICE">
<span<?php echo $view_dashboard_service_details_list->SERVICE->viewAttributes() ?>><?php echo $view_dashboard_service_details_list->SERVICE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_list->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
		<td data-name="SERVICE_TYPE" <?php echo $view_dashboard_service_details_list->SERVICE_TYPE->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_service_details_list->RowCount ?>_view_dashboard_service_details_SERVICE_TYPE">
<span<?php echo $view_dashboard_service_details_list->SERVICE_TYPE->viewAttributes() ?>><?php echo $view_dashboard_service_details_list->SERVICE_TYPE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_list->DEPARTMENT->Visible) { // DEPARTMENT ?>
		<td data-name="DEPARTMENT" <?php echo $view_dashboard_service_details_list->DEPARTMENT->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_service_details_list->RowCount ?>_view_dashboard_service_details_DEPARTMENT">
<span<?php echo $view_dashboard_service_details_list->DEPARTMENT->viewAttributes() ?>><?php echo $view_dashboard_service_details_list->DEPARTMENT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $view_dashboard_service_details_list->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_service_details_list->RowCount ?>_view_dashboard_service_details_HospID">
<span<?php echo $view_dashboard_service_details_list->HospID->viewAttributes() ?>><?php echo $view_dashboard_service_details_list->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_list->vid->Visible) { // vid ?>
		<td data-name="vid" <?php echo $view_dashboard_service_details_list->vid->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_service_details_list->RowCount ?>_view_dashboard_service_details_vid">
<span<?php echo $view_dashboard_service_details_list->vid->viewAttributes() ?>><?php echo $view_dashboard_service_details_list->vid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_dashboard_service_details_list->ListOptions->render("body", "right", $view_dashboard_service_details_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$view_dashboard_service_details_list->isGridAdd())
		$view_dashboard_service_details_list->Recordset->moveNext();
}
?>
</tbody>
<?php

// Render aggregate row
$view_dashboard_service_details->RowType = ROWTYPE_AGGREGATE;
$view_dashboard_service_details->resetAttributes();
$view_dashboard_service_details_list->renderRow();
?>
<?php if ($view_dashboard_service_details_list->TotalRecords > 0 && !$view_dashboard_service_details_list->isGridAdd() && !$view_dashboard_service_details_list->isGridEdit()) { ?>
<tfoot><!-- Table footer -->
	<tr class="ew-table-footer">
<?php

// Render list options
$view_dashboard_service_details_list->renderListOptions();

// Render list options (footer, left)
$view_dashboard_service_details_list->ListOptions->render("footer", "left");
?>
	<?php if ($view_dashboard_service_details_list->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId" class="<?php echo $view_dashboard_service_details_list->PatientId->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_PatientId" class="view_dashboard_service_details_PatientId">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_list->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName" class="<?php echo $view_dashboard_service_details_list->PatientName->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_PatientName" class="view_dashboard_service_details_PatientName">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_list->Services->Visible) { // Services ?>
		<td data-name="Services" class="<?php echo $view_dashboard_service_details_list->Services->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_Services" class="view_dashboard_service_details_Services">
		<span class="ew-aggregate"><?php echo $Language->phrase("COUNT") ?></span><span class="ew-aggregate-value">
		<?php echo $view_dashboard_service_details_list->Services->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_list->amount->Visible) { // amount ?>
		<td data-name="amount" class="<?php echo $view_dashboard_service_details_list->amount->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_amount" class="view_dashboard_service_details_amount">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_dashboard_service_details_list->amount->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_list->SubTotal->Visible) { // SubTotal ?>
		<td data-name="SubTotal" class="<?php echo $view_dashboard_service_details_list->SubTotal->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_SubTotal" class="view_dashboard_service_details_SubTotal">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_dashboard_service_details_list->SubTotal->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_list->createdby->Visible) { // createdby ?>
		<td data-name="createdby" class="<?php echo $view_dashboard_service_details_list->createdby->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_createdby" class="view_dashboard_service_details_createdby">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_list->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" class="<?php echo $view_dashboard_service_details_list->createddatetime->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_createddatetime" class="view_dashboard_service_details_createddatetime">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_list->createdDate->Visible) { // createdDate ?>
		<td data-name="createdDate" class="<?php echo $view_dashboard_service_details_list->createdDate->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_createdDate" class="view_dashboard_service_details_createdDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_list->DrName->Visible) { // DrName ?>
		<td data-name="DrName" class="<?php echo $view_dashboard_service_details_list->DrName->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_DrName" class="view_dashboard_service_details_DrName">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_list->DRDepartment->Visible) { // DRDepartment ?>
		<td data-name="DRDepartment" class="<?php echo $view_dashboard_service_details_list->DRDepartment->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_DRDepartment" class="view_dashboard_service_details_DRDepartment">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_list->ItemCode->Visible) { // ItemCode ?>
		<td data-name="ItemCode" class="<?php echo $view_dashboard_service_details_list->ItemCode->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_ItemCode" class="view_dashboard_service_details_ItemCode">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_list->DEptCd->Visible) { // DEptCd ?>
		<td data-name="DEptCd" class="<?php echo $view_dashboard_service_details_list->DEptCd->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_DEptCd" class="view_dashboard_service_details_DEptCd">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_list->CODE->Visible) { // CODE ?>
		<td data-name="CODE" class="<?php echo $view_dashboard_service_details_list->CODE->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_CODE" class="view_dashboard_service_details_CODE">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_list->SERVICE->Visible) { // SERVICE ?>
		<td data-name="SERVICE" class="<?php echo $view_dashboard_service_details_list->SERVICE->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_SERVICE" class="view_dashboard_service_details_SERVICE">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_list->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
		<td data-name="SERVICE_TYPE" class="<?php echo $view_dashboard_service_details_list->SERVICE_TYPE->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_SERVICE_TYPE" class="view_dashboard_service_details_SERVICE_TYPE">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_list->DEPARTMENT->Visible) { // DEPARTMENT ?>
		<td data-name="DEPARTMENT" class="<?php echo $view_dashboard_service_details_list->DEPARTMENT->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_DEPARTMENT" class="view_dashboard_service_details_DEPARTMENT">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" class="<?php echo $view_dashboard_service_details_list->HospID->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_HospID" class="view_dashboard_service_details_HospID">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_dashboard_service_details_list->vid->Visible) { // vid ?>
		<td data-name="vid" class="<?php echo $view_dashboard_service_details_list->vid->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_vid" class="view_dashboard_service_details_vid">
		&nbsp;
		</span></td>
	<?php } ?>
<?php

// Render list options (footer, right)
$view_dashboard_service_details_list->ListOptions->render("footer", "right");
?>
	</tr>
</tfoot>
<?php } ?>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$view_dashboard_service_details->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_dashboard_service_details_list->Recordset)
	$view_dashboard_service_details_list->Recordset->Close();
?>
<?php if (!$view_dashboard_service_details_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_dashboard_service_details_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_dashboard_service_details_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_dashboard_service_details_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_dashboard_service_details_list->TotalRecords == 0 && !$view_dashboard_service_details->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_dashboard_service_details_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_dashboard_service_details_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_dashboard_service_details_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$view_dashboard_service_details->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_view_dashboard_service_details",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$view_dashboard_service_details_list->terminate();
?>