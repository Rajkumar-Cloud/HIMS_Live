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
$view_procedure_registered_list = new view_procedure_registered_list();

// Run the page
$view_procedure_registered_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_procedure_registered_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$view_procedure_registered_list->isExport()) { ?>
<script>
var fview_procedure_registeredlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fview_procedure_registeredlist = currentForm = new ew.Form("fview_procedure_registeredlist", "list");
	fview_procedure_registeredlist.formKeyCountName = '<?php echo $view_procedure_registered_list->FormKeyCountName ?>';
	loadjs.done("fview_procedure_registeredlist");
});
var fview_procedure_registeredlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fview_procedure_registeredlistsrch = currentSearchForm = new ew.Form("fview_procedure_registeredlistsrch");

	// Validate function for search
	fview_procedure_registeredlistsrch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_ProcedureDateTime");
		if (elm && !ew.checkEuroDate(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_procedure_registered_list->ProcedureDateTime->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fview_procedure_registeredlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_procedure_registeredlistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	// Filters

	fview_procedure_registeredlistsrch.filterList = <?php echo $view_procedure_registered_list->getFilterList() ?>;
	loadjs.done("fview_procedure_registeredlistsrch");
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
<?php if (!$view_procedure_registered_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_procedure_registered_list->TotalRecords > 0 && $view_procedure_registered_list->ExportOptions->visible()) { ?>
<?php $view_procedure_registered_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_procedure_registered_list->ImportOptions->visible()) { ?>
<?php $view_procedure_registered_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_procedure_registered_list->SearchOptions->visible()) { ?>
<?php $view_procedure_registered_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_procedure_registered_list->FilterOptions->visible()) { ?>
<?php $view_procedure_registered_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_procedure_registered_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_procedure_registered_list->isExport() && !$view_procedure_registered->CurrentAction) { ?>
<form name="fview_procedure_registeredlistsrch" id="fview_procedure_registeredlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fview_procedure_registeredlistsrch-search-panel" class="<?php echo $view_procedure_registered_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_procedure_registered">
	<div class="ew-extended-search">
<?php

// Render search row
$view_procedure_registered->RowType = ROWTYPE_SEARCH;
$view_procedure_registered->resetAttributes();
$view_procedure_registered_list->renderRow();
?>
<?php if ($view_procedure_registered_list->ProcedureDateTime->Visible) { // ProcedureDateTime ?>
	<?php
		$view_procedure_registered_list->SearchColumnCount++;
		if (($view_procedure_registered_list->SearchColumnCount - 1) % $view_procedure_registered_list->SearchFieldsPerRow == 0) {
			$view_procedure_registered_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_procedure_registered_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_ProcedureDateTime" class="ew-cell form-group">
		<label for="x_ProcedureDateTime" class="ew-search-caption ew-label"><?php echo $view_procedure_registered_list->ProcedureDateTime->caption() ?></label>
		<span class="ew-search-operator">
<select name="z_ProcedureDateTime" id="z_ProcedureDateTime" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?php echo $view_procedure_registered_list->ProcedureDateTime->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?php echo $Language->phrase("EQUAL") ?></option>
<option value="<>"<?php echo $view_procedure_registered_list->ProcedureDateTime->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?php echo $Language->phrase("<>") ?></option>
<option value="<"<?php echo $view_procedure_registered_list->ProcedureDateTime->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?php echo $Language->phrase("<") ?></option>
<option value="<="<?php echo $view_procedure_registered_list->ProcedureDateTime->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?php echo $Language->phrase("<=") ?></option>
<option value=">"<?php echo $view_procedure_registered_list->ProcedureDateTime->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?php echo $Language->phrase(">") ?></option>
<option value=">="<?php echo $view_procedure_registered_list->ProcedureDateTime->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?php echo $Language->phrase(">=") ?></option>
<option value="IS NULL"<?php echo $view_procedure_registered_list->ProcedureDateTime->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?php echo $view_procedure_registered_list->ProcedureDateTime->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?php echo $view_procedure_registered_list->ProcedureDateTime->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?php echo $Language->phrase("BETWEEN") ?></option>
</select>
</span>
		<span id="el_view_procedure_registered_ProcedureDateTime" class="ew-search-field">
<input type="text" data-table="view_procedure_registered" data-field="x_ProcedureDateTime" data-format="7" name="x_ProcedureDateTime" id="x_ProcedureDateTime" placeholder="<?php echo HtmlEncode($view_procedure_registered_list->ProcedureDateTime->getPlaceHolder()) ?>" value="<?php echo $view_procedure_registered_list->ProcedureDateTime->EditValue ?>"<?php echo $view_procedure_registered_list->ProcedureDateTime->editAttributes() ?>>
<?php if (!$view_procedure_registered_list->ProcedureDateTime->ReadOnly && !$view_procedure_registered_list->ProcedureDateTime->Disabled && !isset($view_procedure_registered_list->ProcedureDateTime->EditAttrs["readonly"]) && !isset($view_procedure_registered_list->ProcedureDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_procedure_registeredlistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_procedure_registeredlistsrch", "x_ProcedureDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
		<span class="ew-search-and d-none"><label><?php echo $Language->phrase("AND") ?></label></span>
		<span id="el2_view_procedure_registered_ProcedureDateTime" class="ew-search-field2 d-none">
<input type="text" data-table="view_procedure_registered" data-field="x_ProcedureDateTime" data-format="7" name="y_ProcedureDateTime" id="y_ProcedureDateTime" placeholder="<?php echo HtmlEncode($view_procedure_registered_list->ProcedureDateTime->getPlaceHolder()) ?>" value="<?php echo $view_procedure_registered_list->ProcedureDateTime->EditValue2 ?>"<?php echo $view_procedure_registered_list->ProcedureDateTime->editAttributes() ?>>
<?php if (!$view_procedure_registered_list->ProcedureDateTime->ReadOnly && !$view_procedure_registered_list->ProcedureDateTime->Disabled && !isset($view_procedure_registered_list->ProcedureDateTime->EditAttrs["readonly"]) && !isset($view_procedure_registered_list->ProcedureDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_procedure_registeredlistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_procedure_registeredlistsrch", "y_ProcedureDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
	</div>
	<?php if ($view_procedure_registered_list->SearchColumnCount % $view_procedure_registered_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($view_procedure_registered_list->SearchColumnCount % $view_procedure_registered_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $view_procedure_registered_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($view_procedure_registered_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($view_procedure_registered_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_procedure_registered_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_procedure_registered_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_procedure_registered_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_procedure_registered_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_procedure_registered_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $view_procedure_registered_list->showPageHeader(); ?>
<?php
$view_procedure_registered_list->showMessage();
?>
<?php if ($view_procedure_registered_list->TotalRecords > 0 || $view_procedure_registered->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_procedure_registered_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_procedure_registered">
<?php if (!$view_procedure_registered_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_procedure_registered_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_procedure_registered_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_procedure_registered_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_procedure_registeredlist" id="fview_procedure_registeredlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_procedure_registered">
<div id="gmp_view_procedure_registered" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($view_procedure_registered_list->TotalRecords > 0 || $view_procedure_registered_list->isGridEdit()) { ?>
<table id="tbl_view_procedure_registeredlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_procedure_registered->RowType = ROWTYPE_HEADER;

// Render list options
$view_procedure_registered_list->renderListOptions();

// Render list options (header, left)
$view_procedure_registered_list->ListOptions->render("header", "left");
?>
<?php if ($view_procedure_registered_list->first_name->Visible) { // first_name ?>
	<?php if ($view_procedure_registered_list->SortUrl($view_procedure_registered_list->first_name) == "") { ?>
		<th data-name="first_name" class="<?php echo $view_procedure_registered_list->first_name->headerCellClass() ?>"><div id="elh_view_procedure_registered_first_name" class="view_procedure_registered_first_name"><div class="ew-table-header-caption"><?php echo $view_procedure_registered_list->first_name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="first_name" class="<?php echo $view_procedure_registered_list->first_name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_procedure_registered_list->SortUrl($view_procedure_registered_list->first_name) ?>', 1);"><div id="elh_view_procedure_registered_first_name" class="view_procedure_registered_first_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_procedure_registered_list->first_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_procedure_registered_list->first_name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_procedure_registered_list->first_name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_procedure_registered_list->PatientID->Visible) { // PatientID ?>
	<?php if ($view_procedure_registered_list->SortUrl($view_procedure_registered_list->PatientID) == "") { ?>
		<th data-name="PatientID" class="<?php echo $view_procedure_registered_list->PatientID->headerCellClass() ?>"><div id="elh_view_procedure_registered_PatientID" class="view_procedure_registered_PatientID"><div class="ew-table-header-caption"><?php echo $view_procedure_registered_list->PatientID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientID" class="<?php echo $view_procedure_registered_list->PatientID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_procedure_registered_list->SortUrl($view_procedure_registered_list->PatientID) ?>', 1);"><div id="elh_view_procedure_registered_PatientID" class="view_procedure_registered_PatientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_procedure_registered_list->PatientID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_procedure_registered_list->PatientID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_procedure_registered_list->PatientID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_procedure_registered_list->mobile_no->Visible) { // mobile_no ?>
	<?php if ($view_procedure_registered_list->SortUrl($view_procedure_registered_list->mobile_no) == "") { ?>
		<th data-name="mobile_no" class="<?php echo $view_procedure_registered_list->mobile_no->headerCellClass() ?>"><div id="elh_view_procedure_registered_mobile_no" class="view_procedure_registered_mobile_no"><div class="ew-table-header-caption"><?php echo $view_procedure_registered_list->mobile_no->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mobile_no" class="<?php echo $view_procedure_registered_list->mobile_no->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_procedure_registered_list->SortUrl($view_procedure_registered_list->mobile_no) ?>', 1);"><div id="elh_view_procedure_registered_mobile_no" class="view_procedure_registered_mobile_no">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_procedure_registered_list->mobile_no->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_procedure_registered_list->mobile_no->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_procedure_registered_list->mobile_no->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_procedure_registered_list->street->Visible) { // street ?>
	<?php if ($view_procedure_registered_list->SortUrl($view_procedure_registered_list->street) == "") { ?>
		<th data-name="street" class="<?php echo $view_procedure_registered_list->street->headerCellClass() ?>"><div id="elh_view_procedure_registered_street" class="view_procedure_registered_street"><div class="ew-table-header-caption"><?php echo $view_procedure_registered_list->street->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="street" class="<?php echo $view_procedure_registered_list->street->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_procedure_registered_list->SortUrl($view_procedure_registered_list->street) ?>', 1);"><div id="elh_view_procedure_registered_street" class="view_procedure_registered_street">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_procedure_registered_list->street->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_procedure_registered_list->street->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_procedure_registered_list->street->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_procedure_registered_list->town->Visible) { // town ?>
	<?php if ($view_procedure_registered_list->SortUrl($view_procedure_registered_list->town) == "") { ?>
		<th data-name="town" class="<?php echo $view_procedure_registered_list->town->headerCellClass() ?>"><div id="elh_view_procedure_registered_town" class="view_procedure_registered_town"><div class="ew-table-header-caption"><?php echo $view_procedure_registered_list->town->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="town" class="<?php echo $view_procedure_registered_list->town->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_procedure_registered_list->SortUrl($view_procedure_registered_list->town) ?>', 1);"><div id="elh_view_procedure_registered_town" class="view_procedure_registered_town">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_procedure_registered_list->town->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_procedure_registered_list->town->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_procedure_registered_list->town->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_procedure_registered_list->ProcedureDateTime->Visible) { // ProcedureDateTime ?>
	<?php if ($view_procedure_registered_list->SortUrl($view_procedure_registered_list->ProcedureDateTime) == "") { ?>
		<th data-name="ProcedureDateTime" class="<?php echo $view_procedure_registered_list->ProcedureDateTime->headerCellClass() ?>"><div id="elh_view_procedure_registered_ProcedureDateTime" class="view_procedure_registered_ProcedureDateTime"><div class="ew-table-header-caption"><?php echo $view_procedure_registered_list->ProcedureDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProcedureDateTime" class="<?php echo $view_procedure_registered_list->ProcedureDateTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_procedure_registered_list->SortUrl($view_procedure_registered_list->ProcedureDateTime) ?>', 1);"><div id="elh_view_procedure_registered_ProcedureDateTime" class="view_procedure_registered_ProcedureDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_procedure_registered_list->ProcedureDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_procedure_registered_list->ProcedureDateTime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_procedure_registered_list->ProcedureDateTime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_procedure_registered_list->Doctor->Visible) { // Doctor ?>
	<?php if ($view_procedure_registered_list->SortUrl($view_procedure_registered_list->Doctor) == "") { ?>
		<th data-name="Doctor" class="<?php echo $view_procedure_registered_list->Doctor->headerCellClass() ?>"><div id="elh_view_procedure_registered_Doctor" class="view_procedure_registered_Doctor"><div class="ew-table-header-caption"><?php echo $view_procedure_registered_list->Doctor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Doctor" class="<?php echo $view_procedure_registered_list->Doctor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_procedure_registered_list->SortUrl($view_procedure_registered_list->Doctor) ?>', 1);"><div id="elh_view_procedure_registered_Doctor" class="view_procedure_registered_Doctor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_procedure_registered_list->Doctor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_procedure_registered_list->Doctor->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_procedure_registered_list->Doctor->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_procedure_registered_list->createdUserName->Visible) { // createdUserName ?>
	<?php if ($view_procedure_registered_list->SortUrl($view_procedure_registered_list->createdUserName) == "") { ?>
		<th data-name="createdUserName" class="<?php echo $view_procedure_registered_list->createdUserName->headerCellClass() ?>"><div id="elh_view_procedure_registered_createdUserName" class="view_procedure_registered_createdUserName"><div class="ew-table-header-caption"><?php echo $view_procedure_registered_list->createdUserName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdUserName" class="<?php echo $view_procedure_registered_list->createdUserName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_procedure_registered_list->SortUrl($view_procedure_registered_list->createdUserName) ?>', 1);"><div id="elh_view_procedure_registered_createdUserName" class="view_procedure_registered_createdUserName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_procedure_registered_list->createdUserName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_procedure_registered_list->createdUserName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_procedure_registered_list->createdUserName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_procedure_registered_list->HospID->Visible) { // HospID ?>
	<?php if ($view_procedure_registered_list->SortUrl($view_procedure_registered_list->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_procedure_registered_list->HospID->headerCellClass() ?>"><div id="elh_view_procedure_registered_HospID" class="view_procedure_registered_HospID"><div class="ew-table-header-caption"><?php echo $view_procedure_registered_list->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_procedure_registered_list->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_procedure_registered_list->SortUrl($view_procedure_registered_list->HospID) ?>', 1);"><div id="elh_view_procedure_registered_HospID" class="view_procedure_registered_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_procedure_registered_list->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_procedure_registered_list->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_procedure_registered_list->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_procedure_registered_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_procedure_registered_list->ExportAll && $view_procedure_registered_list->isExport()) {
	$view_procedure_registered_list->StopRecord = $view_procedure_registered_list->TotalRecords;
} else {

	// Set the last record to display
	if ($view_procedure_registered_list->TotalRecords > $view_procedure_registered_list->StartRecord + $view_procedure_registered_list->DisplayRecords - 1)
		$view_procedure_registered_list->StopRecord = $view_procedure_registered_list->StartRecord + $view_procedure_registered_list->DisplayRecords - 1;
	else
		$view_procedure_registered_list->StopRecord = $view_procedure_registered_list->TotalRecords;
}
$view_procedure_registered_list->RecordCount = $view_procedure_registered_list->StartRecord - 1;
if ($view_procedure_registered_list->Recordset && !$view_procedure_registered_list->Recordset->EOF) {
	$view_procedure_registered_list->Recordset->moveFirst();
	$selectLimit = $view_procedure_registered_list->UseSelectLimit;
	if (!$selectLimit && $view_procedure_registered_list->StartRecord > 1)
		$view_procedure_registered_list->Recordset->move($view_procedure_registered_list->StartRecord - 1);
} elseif (!$view_procedure_registered->AllowAddDeleteRow && $view_procedure_registered_list->StopRecord == 0) {
	$view_procedure_registered_list->StopRecord = $view_procedure_registered->GridAddRowCount;
}

// Initialize aggregate
$view_procedure_registered->RowType = ROWTYPE_AGGREGATEINIT;
$view_procedure_registered->resetAttributes();
$view_procedure_registered_list->renderRow();
while ($view_procedure_registered_list->RecordCount < $view_procedure_registered_list->StopRecord) {
	$view_procedure_registered_list->RecordCount++;
	if ($view_procedure_registered_list->RecordCount >= $view_procedure_registered_list->StartRecord) {
		$view_procedure_registered_list->RowCount++;

		// Set up key count
		$view_procedure_registered_list->KeyCount = $view_procedure_registered_list->RowIndex;

		// Init row class and style
		$view_procedure_registered->resetAttributes();
		$view_procedure_registered->CssClass = "";
		if ($view_procedure_registered_list->isGridAdd()) {
		} else {
			$view_procedure_registered_list->loadRowValues($view_procedure_registered_list->Recordset); // Load row values
		}
		$view_procedure_registered->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_procedure_registered->RowAttrs->merge(["data-rowindex" => $view_procedure_registered_list->RowCount, "id" => "r" . $view_procedure_registered_list->RowCount . "_view_procedure_registered", "data-rowtype" => $view_procedure_registered->RowType]);

		// Render row
		$view_procedure_registered_list->renderRow();

		// Render list options
		$view_procedure_registered_list->renderListOptions();
?>
	<tr <?php echo $view_procedure_registered->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_procedure_registered_list->ListOptions->render("body", "left", $view_procedure_registered_list->RowCount);
?>
	<?php if ($view_procedure_registered_list->first_name->Visible) { // first_name ?>
		<td data-name="first_name" <?php echo $view_procedure_registered_list->first_name->cellAttributes() ?>>
<span id="el<?php echo $view_procedure_registered_list->RowCount ?>_view_procedure_registered_first_name">
<span<?php echo $view_procedure_registered_list->first_name->viewAttributes() ?>><?php echo $view_procedure_registered_list->first_name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_procedure_registered_list->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID" <?php echo $view_procedure_registered_list->PatientID->cellAttributes() ?>>
<span id="el<?php echo $view_procedure_registered_list->RowCount ?>_view_procedure_registered_PatientID">
<span<?php echo $view_procedure_registered_list->PatientID->viewAttributes() ?>><?php echo $view_procedure_registered_list->PatientID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_procedure_registered_list->mobile_no->Visible) { // mobile_no ?>
		<td data-name="mobile_no" <?php echo $view_procedure_registered_list->mobile_no->cellAttributes() ?>>
<span id="el<?php echo $view_procedure_registered_list->RowCount ?>_view_procedure_registered_mobile_no">
<span<?php echo $view_procedure_registered_list->mobile_no->viewAttributes() ?>><?php echo $view_procedure_registered_list->mobile_no->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_procedure_registered_list->street->Visible) { // street ?>
		<td data-name="street" <?php echo $view_procedure_registered_list->street->cellAttributes() ?>>
<span id="el<?php echo $view_procedure_registered_list->RowCount ?>_view_procedure_registered_street">
<span<?php echo $view_procedure_registered_list->street->viewAttributes() ?>><?php echo $view_procedure_registered_list->street->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_procedure_registered_list->town->Visible) { // town ?>
		<td data-name="town" <?php echo $view_procedure_registered_list->town->cellAttributes() ?>>
<span id="el<?php echo $view_procedure_registered_list->RowCount ?>_view_procedure_registered_town">
<span<?php echo $view_procedure_registered_list->town->viewAttributes() ?>><?php echo $view_procedure_registered_list->town->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_procedure_registered_list->ProcedureDateTime->Visible) { // ProcedureDateTime ?>
		<td data-name="ProcedureDateTime" <?php echo $view_procedure_registered_list->ProcedureDateTime->cellAttributes() ?>>
<span id="el<?php echo $view_procedure_registered_list->RowCount ?>_view_procedure_registered_ProcedureDateTime">
<span<?php echo $view_procedure_registered_list->ProcedureDateTime->viewAttributes() ?>><?php echo $view_procedure_registered_list->ProcedureDateTime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_procedure_registered_list->Doctor->Visible) { // Doctor ?>
		<td data-name="Doctor" <?php echo $view_procedure_registered_list->Doctor->cellAttributes() ?>>
<span id="el<?php echo $view_procedure_registered_list->RowCount ?>_view_procedure_registered_Doctor">
<span<?php echo $view_procedure_registered_list->Doctor->viewAttributes() ?>><?php echo $view_procedure_registered_list->Doctor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_procedure_registered_list->createdUserName->Visible) { // createdUserName ?>
		<td data-name="createdUserName" <?php echo $view_procedure_registered_list->createdUserName->cellAttributes() ?>>
<span id="el<?php echo $view_procedure_registered_list->RowCount ?>_view_procedure_registered_createdUserName">
<span<?php echo $view_procedure_registered_list->createdUserName->viewAttributes() ?>><?php echo $view_procedure_registered_list->createdUserName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_procedure_registered_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $view_procedure_registered_list->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_procedure_registered_list->RowCount ?>_view_procedure_registered_HospID">
<span<?php echo $view_procedure_registered_list->HospID->viewAttributes() ?>><?php echo $view_procedure_registered_list->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_procedure_registered_list->ListOptions->render("body", "right", $view_procedure_registered_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$view_procedure_registered_list->isGridAdd())
		$view_procedure_registered_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$view_procedure_registered->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_procedure_registered_list->Recordset)
	$view_procedure_registered_list->Recordset->Close();
?>
<?php if (!$view_procedure_registered_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_procedure_registered_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_procedure_registered_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_procedure_registered_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_procedure_registered_list->TotalRecords == 0 && !$view_procedure_registered->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_procedure_registered_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_procedure_registered_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_procedure_registered_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$view_procedure_registered->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_view_procedure_registered",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$view_procedure_registered_list->terminate();
?>