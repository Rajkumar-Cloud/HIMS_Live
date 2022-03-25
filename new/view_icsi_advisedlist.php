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
$view_icsi_advised_list = new view_icsi_advised_list();

// Run the page
$view_icsi_advised_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_icsi_advised_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$view_icsi_advised_list->isExport()) { ?>
<script>
var fview_icsi_advisedlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fview_icsi_advisedlist = currentForm = new ew.Form("fview_icsi_advisedlist", "list");
	fview_icsi_advisedlist.formKeyCountName = '<?php echo $view_icsi_advised_list->FormKeyCountName ?>';
	loadjs.done("fview_icsi_advisedlist");
});
var fview_icsi_advisedlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fview_icsi_advisedlistsrch = currentSearchForm = new ew.Form("fview_icsi_advisedlistsrch");

	// Validate function for search
	fview_icsi_advisedlistsrch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_ICSIDate");
		if (elm && !ew.checkEuroDate(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_icsi_advised_list->ICSIDate->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fview_icsi_advisedlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_icsi_advisedlistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	// Filters

	fview_icsi_advisedlistsrch.filterList = <?php echo $view_icsi_advised_list->getFilterList() ?>;
	loadjs.done("fview_icsi_advisedlistsrch");
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
<?php if (!$view_icsi_advised_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_icsi_advised_list->TotalRecords > 0 && $view_icsi_advised_list->ExportOptions->visible()) { ?>
<?php $view_icsi_advised_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_icsi_advised_list->ImportOptions->visible()) { ?>
<?php $view_icsi_advised_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_icsi_advised_list->SearchOptions->visible()) { ?>
<?php $view_icsi_advised_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_icsi_advised_list->FilterOptions->visible()) { ?>
<?php $view_icsi_advised_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_icsi_advised_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_icsi_advised_list->isExport() && !$view_icsi_advised->CurrentAction) { ?>
<form name="fview_icsi_advisedlistsrch" id="fview_icsi_advisedlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fview_icsi_advisedlistsrch-search-panel" class="<?php echo $view_icsi_advised_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_icsi_advised">
	<div class="ew-extended-search">
<?php

// Render search row
$view_icsi_advised->RowType = ROWTYPE_SEARCH;
$view_icsi_advised->resetAttributes();
$view_icsi_advised_list->renderRow();
?>
<?php if ($view_icsi_advised_list->ICSIDate->Visible) { // ICSIDate ?>
	<?php
		$view_icsi_advised_list->SearchColumnCount++;
		if (($view_icsi_advised_list->SearchColumnCount - 1) % $view_icsi_advised_list->SearchFieldsPerRow == 0) {
			$view_icsi_advised_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_icsi_advised_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_ICSIDate" class="ew-cell form-group">
		<label for="x_ICSIDate" class="ew-search-caption ew-label"><?php echo $view_icsi_advised_list->ICSIDate->caption() ?></label>
		<span class="ew-search-operator">
<select name="z_ICSIDate" id="z_ICSIDate" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?php echo $view_icsi_advised_list->ICSIDate->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?php echo $Language->phrase("EQUAL") ?></option>
<option value="<>"<?php echo $view_icsi_advised_list->ICSIDate->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?php echo $Language->phrase("<>") ?></option>
<option value="<"<?php echo $view_icsi_advised_list->ICSIDate->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?php echo $Language->phrase("<") ?></option>
<option value="<="<?php echo $view_icsi_advised_list->ICSIDate->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?php echo $Language->phrase("<=") ?></option>
<option value=">"<?php echo $view_icsi_advised_list->ICSIDate->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?php echo $Language->phrase(">") ?></option>
<option value=">="<?php echo $view_icsi_advised_list->ICSIDate->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?php echo $Language->phrase(">=") ?></option>
<option value="IS NULL"<?php echo $view_icsi_advised_list->ICSIDate->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?php echo $view_icsi_advised_list->ICSIDate->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?php echo $view_icsi_advised_list->ICSIDate->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?php echo $Language->phrase("BETWEEN") ?></option>
</select>
</span>
		<span id="el_view_icsi_advised_ICSIDate" class="ew-search-field">
<input type="text" data-table="view_icsi_advised" data-field="x_ICSIDate" data-format="7" name="x_ICSIDate" id="x_ICSIDate" placeholder="<?php echo HtmlEncode($view_icsi_advised_list->ICSIDate->getPlaceHolder()) ?>" value="<?php echo $view_icsi_advised_list->ICSIDate->EditValue ?>"<?php echo $view_icsi_advised_list->ICSIDate->editAttributes() ?>>
<?php if (!$view_icsi_advised_list->ICSIDate->ReadOnly && !$view_icsi_advised_list->ICSIDate->Disabled && !isset($view_icsi_advised_list->ICSIDate->EditAttrs["readonly"]) && !isset($view_icsi_advised_list->ICSIDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_icsi_advisedlistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_icsi_advisedlistsrch", "x_ICSIDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
		<span class="ew-search-and d-none"><label><?php echo $Language->phrase("AND") ?></label></span>
		<span id="el2_view_icsi_advised_ICSIDate" class="ew-search-field2 d-none">
<input type="text" data-table="view_icsi_advised" data-field="x_ICSIDate" data-format="7" name="y_ICSIDate" id="y_ICSIDate" placeholder="<?php echo HtmlEncode($view_icsi_advised_list->ICSIDate->getPlaceHolder()) ?>" value="<?php echo $view_icsi_advised_list->ICSIDate->EditValue2 ?>"<?php echo $view_icsi_advised_list->ICSIDate->editAttributes() ?>>
<?php if (!$view_icsi_advised_list->ICSIDate->ReadOnly && !$view_icsi_advised_list->ICSIDate->Disabled && !isset($view_icsi_advised_list->ICSIDate->EditAttrs["readonly"]) && !isset($view_icsi_advised_list->ICSIDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_icsi_advisedlistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_icsi_advisedlistsrch", "y_ICSIDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
	</div>
	<?php if ($view_icsi_advised_list->SearchColumnCount % $view_icsi_advised_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($view_icsi_advised_list->SearchColumnCount % $view_icsi_advised_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $view_icsi_advised_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($view_icsi_advised_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($view_icsi_advised_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_icsi_advised_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_icsi_advised_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_icsi_advised_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_icsi_advised_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_icsi_advised_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $view_icsi_advised_list->showPageHeader(); ?>
<?php
$view_icsi_advised_list->showMessage();
?>
<?php if ($view_icsi_advised_list->TotalRecords > 0 || $view_icsi_advised->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_icsi_advised_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_icsi_advised">
<?php if (!$view_icsi_advised_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_icsi_advised_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_icsi_advised_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_icsi_advised_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_icsi_advisedlist" id="fview_icsi_advisedlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_icsi_advised">
<div id="gmp_view_icsi_advised" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($view_icsi_advised_list->TotalRecords > 0 || $view_icsi_advised_list->isGridEdit()) { ?>
<table id="tbl_view_icsi_advisedlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_icsi_advised->RowType = ROWTYPE_HEADER;

// Render list options
$view_icsi_advised_list->renderListOptions();

// Render list options (header, left)
$view_icsi_advised_list->ListOptions->render("header", "left");
?>
<?php if ($view_icsi_advised_list->first_name->Visible) { // first_name ?>
	<?php if ($view_icsi_advised_list->SortUrl($view_icsi_advised_list->first_name) == "") { ?>
		<th data-name="first_name" class="<?php echo $view_icsi_advised_list->first_name->headerCellClass() ?>"><div id="elh_view_icsi_advised_first_name" class="view_icsi_advised_first_name"><div class="ew-table-header-caption"><?php echo $view_icsi_advised_list->first_name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="first_name" class="<?php echo $view_icsi_advised_list->first_name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_icsi_advised_list->SortUrl($view_icsi_advised_list->first_name) ?>', 1);"><div id="elh_view_icsi_advised_first_name" class="view_icsi_advised_first_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_icsi_advised_list->first_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_icsi_advised_list->first_name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_icsi_advised_list->first_name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_icsi_advised_list->PatientID->Visible) { // PatientID ?>
	<?php if ($view_icsi_advised_list->SortUrl($view_icsi_advised_list->PatientID) == "") { ?>
		<th data-name="PatientID" class="<?php echo $view_icsi_advised_list->PatientID->headerCellClass() ?>"><div id="elh_view_icsi_advised_PatientID" class="view_icsi_advised_PatientID"><div class="ew-table-header-caption"><?php echo $view_icsi_advised_list->PatientID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientID" class="<?php echo $view_icsi_advised_list->PatientID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_icsi_advised_list->SortUrl($view_icsi_advised_list->PatientID) ?>', 1);"><div id="elh_view_icsi_advised_PatientID" class="view_icsi_advised_PatientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_icsi_advised_list->PatientID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_icsi_advised_list->PatientID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_icsi_advised_list->PatientID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_icsi_advised_list->mobile_no->Visible) { // mobile_no ?>
	<?php if ($view_icsi_advised_list->SortUrl($view_icsi_advised_list->mobile_no) == "") { ?>
		<th data-name="mobile_no" class="<?php echo $view_icsi_advised_list->mobile_no->headerCellClass() ?>"><div id="elh_view_icsi_advised_mobile_no" class="view_icsi_advised_mobile_no"><div class="ew-table-header-caption"><?php echo $view_icsi_advised_list->mobile_no->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mobile_no" class="<?php echo $view_icsi_advised_list->mobile_no->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_icsi_advised_list->SortUrl($view_icsi_advised_list->mobile_no) ?>', 1);"><div id="elh_view_icsi_advised_mobile_no" class="view_icsi_advised_mobile_no">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_icsi_advised_list->mobile_no->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_icsi_advised_list->mobile_no->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_icsi_advised_list->mobile_no->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_icsi_advised_list->street->Visible) { // street ?>
	<?php if ($view_icsi_advised_list->SortUrl($view_icsi_advised_list->street) == "") { ?>
		<th data-name="street" class="<?php echo $view_icsi_advised_list->street->headerCellClass() ?>"><div id="elh_view_icsi_advised_street" class="view_icsi_advised_street"><div class="ew-table-header-caption"><?php echo $view_icsi_advised_list->street->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="street" class="<?php echo $view_icsi_advised_list->street->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_icsi_advised_list->SortUrl($view_icsi_advised_list->street) ?>', 1);"><div id="elh_view_icsi_advised_street" class="view_icsi_advised_street">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_icsi_advised_list->street->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_icsi_advised_list->street->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_icsi_advised_list->street->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_icsi_advised_list->town->Visible) { // town ?>
	<?php if ($view_icsi_advised_list->SortUrl($view_icsi_advised_list->town) == "") { ?>
		<th data-name="town" class="<?php echo $view_icsi_advised_list->town->headerCellClass() ?>"><div id="elh_view_icsi_advised_town" class="view_icsi_advised_town"><div class="ew-table-header-caption"><?php echo $view_icsi_advised_list->town->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="town" class="<?php echo $view_icsi_advised_list->town->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_icsi_advised_list->SortUrl($view_icsi_advised_list->town) ?>', 1);"><div id="elh_view_icsi_advised_town" class="view_icsi_advised_town">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_icsi_advised_list->town->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_icsi_advised_list->town->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_icsi_advised_list->town->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_icsi_advised_list->ICSIAdvised->Visible) { // ICSIAdvised ?>
	<?php if ($view_icsi_advised_list->SortUrl($view_icsi_advised_list->ICSIAdvised) == "") { ?>
		<th data-name="ICSIAdvised" class="<?php echo $view_icsi_advised_list->ICSIAdvised->headerCellClass() ?>"><div id="elh_view_icsi_advised_ICSIAdvised" class="view_icsi_advised_ICSIAdvised"><div class="ew-table-header-caption"><?php echo $view_icsi_advised_list->ICSIAdvised->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ICSIAdvised" class="<?php echo $view_icsi_advised_list->ICSIAdvised->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_icsi_advised_list->SortUrl($view_icsi_advised_list->ICSIAdvised) ?>', 1);"><div id="elh_view_icsi_advised_ICSIAdvised" class="view_icsi_advised_ICSIAdvised">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_icsi_advised_list->ICSIAdvised->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_icsi_advised_list->ICSIAdvised->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_icsi_advised_list->ICSIAdvised->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_icsi_advised_list->ICSIDate->Visible) { // ICSIDate ?>
	<?php if ($view_icsi_advised_list->SortUrl($view_icsi_advised_list->ICSIDate) == "") { ?>
		<th data-name="ICSIDate" class="<?php echo $view_icsi_advised_list->ICSIDate->headerCellClass() ?>"><div id="elh_view_icsi_advised_ICSIDate" class="view_icsi_advised_ICSIDate"><div class="ew-table-header-caption"><?php echo $view_icsi_advised_list->ICSIDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ICSIDate" class="<?php echo $view_icsi_advised_list->ICSIDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_icsi_advised_list->SortUrl($view_icsi_advised_list->ICSIDate) ?>', 1);"><div id="elh_view_icsi_advised_ICSIDate" class="view_icsi_advised_ICSIDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_icsi_advised_list->ICSIDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_icsi_advised_list->ICSIDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_icsi_advised_list->ICSIDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_icsi_advised_list->createdUserName->Visible) { // createdUserName ?>
	<?php if ($view_icsi_advised_list->SortUrl($view_icsi_advised_list->createdUserName) == "") { ?>
		<th data-name="createdUserName" class="<?php echo $view_icsi_advised_list->createdUserName->headerCellClass() ?>"><div id="elh_view_icsi_advised_createdUserName" class="view_icsi_advised_createdUserName"><div class="ew-table-header-caption"><?php echo $view_icsi_advised_list->createdUserName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdUserName" class="<?php echo $view_icsi_advised_list->createdUserName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_icsi_advised_list->SortUrl($view_icsi_advised_list->createdUserName) ?>', 1);"><div id="elh_view_icsi_advised_createdUserName" class="view_icsi_advised_createdUserName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_icsi_advised_list->createdUserName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_icsi_advised_list->createdUserName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_icsi_advised_list->createdUserName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_icsi_advised_list->HospID->Visible) { // HospID ?>
	<?php if ($view_icsi_advised_list->SortUrl($view_icsi_advised_list->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_icsi_advised_list->HospID->headerCellClass() ?>"><div id="elh_view_icsi_advised_HospID" class="view_icsi_advised_HospID"><div class="ew-table-header-caption"><?php echo $view_icsi_advised_list->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_icsi_advised_list->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_icsi_advised_list->SortUrl($view_icsi_advised_list->HospID) ?>', 1);"><div id="elh_view_icsi_advised_HospID" class="view_icsi_advised_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_icsi_advised_list->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_icsi_advised_list->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_icsi_advised_list->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_icsi_advised_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_icsi_advised_list->ExportAll && $view_icsi_advised_list->isExport()) {
	$view_icsi_advised_list->StopRecord = $view_icsi_advised_list->TotalRecords;
} else {

	// Set the last record to display
	if ($view_icsi_advised_list->TotalRecords > $view_icsi_advised_list->StartRecord + $view_icsi_advised_list->DisplayRecords - 1)
		$view_icsi_advised_list->StopRecord = $view_icsi_advised_list->StartRecord + $view_icsi_advised_list->DisplayRecords - 1;
	else
		$view_icsi_advised_list->StopRecord = $view_icsi_advised_list->TotalRecords;
}
$view_icsi_advised_list->RecordCount = $view_icsi_advised_list->StartRecord - 1;
if ($view_icsi_advised_list->Recordset && !$view_icsi_advised_list->Recordset->EOF) {
	$view_icsi_advised_list->Recordset->moveFirst();
	$selectLimit = $view_icsi_advised_list->UseSelectLimit;
	if (!$selectLimit && $view_icsi_advised_list->StartRecord > 1)
		$view_icsi_advised_list->Recordset->move($view_icsi_advised_list->StartRecord - 1);
} elseif (!$view_icsi_advised->AllowAddDeleteRow && $view_icsi_advised_list->StopRecord == 0) {
	$view_icsi_advised_list->StopRecord = $view_icsi_advised->GridAddRowCount;
}

// Initialize aggregate
$view_icsi_advised->RowType = ROWTYPE_AGGREGATEINIT;
$view_icsi_advised->resetAttributes();
$view_icsi_advised_list->renderRow();
while ($view_icsi_advised_list->RecordCount < $view_icsi_advised_list->StopRecord) {
	$view_icsi_advised_list->RecordCount++;
	if ($view_icsi_advised_list->RecordCount >= $view_icsi_advised_list->StartRecord) {
		$view_icsi_advised_list->RowCount++;

		// Set up key count
		$view_icsi_advised_list->KeyCount = $view_icsi_advised_list->RowIndex;

		// Init row class and style
		$view_icsi_advised->resetAttributes();
		$view_icsi_advised->CssClass = "";
		if ($view_icsi_advised_list->isGridAdd()) {
		} else {
			$view_icsi_advised_list->loadRowValues($view_icsi_advised_list->Recordset); // Load row values
		}
		$view_icsi_advised->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_icsi_advised->RowAttrs->merge(["data-rowindex" => $view_icsi_advised_list->RowCount, "id" => "r" . $view_icsi_advised_list->RowCount . "_view_icsi_advised", "data-rowtype" => $view_icsi_advised->RowType]);

		// Render row
		$view_icsi_advised_list->renderRow();

		// Render list options
		$view_icsi_advised_list->renderListOptions();
?>
	<tr <?php echo $view_icsi_advised->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_icsi_advised_list->ListOptions->render("body", "left", $view_icsi_advised_list->RowCount);
?>
	<?php if ($view_icsi_advised_list->first_name->Visible) { // first_name ?>
		<td data-name="first_name" <?php echo $view_icsi_advised_list->first_name->cellAttributes() ?>>
<span id="el<?php echo $view_icsi_advised_list->RowCount ?>_view_icsi_advised_first_name">
<span<?php echo $view_icsi_advised_list->first_name->viewAttributes() ?>><?php echo $view_icsi_advised_list->first_name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_icsi_advised_list->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID" <?php echo $view_icsi_advised_list->PatientID->cellAttributes() ?>>
<span id="el<?php echo $view_icsi_advised_list->RowCount ?>_view_icsi_advised_PatientID">
<span<?php echo $view_icsi_advised_list->PatientID->viewAttributes() ?>><?php echo $view_icsi_advised_list->PatientID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_icsi_advised_list->mobile_no->Visible) { // mobile_no ?>
		<td data-name="mobile_no" <?php echo $view_icsi_advised_list->mobile_no->cellAttributes() ?>>
<span id="el<?php echo $view_icsi_advised_list->RowCount ?>_view_icsi_advised_mobile_no">
<span<?php echo $view_icsi_advised_list->mobile_no->viewAttributes() ?>><?php echo $view_icsi_advised_list->mobile_no->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_icsi_advised_list->street->Visible) { // street ?>
		<td data-name="street" <?php echo $view_icsi_advised_list->street->cellAttributes() ?>>
<span id="el<?php echo $view_icsi_advised_list->RowCount ?>_view_icsi_advised_street">
<span<?php echo $view_icsi_advised_list->street->viewAttributes() ?>><?php echo $view_icsi_advised_list->street->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_icsi_advised_list->town->Visible) { // town ?>
		<td data-name="town" <?php echo $view_icsi_advised_list->town->cellAttributes() ?>>
<span id="el<?php echo $view_icsi_advised_list->RowCount ?>_view_icsi_advised_town">
<span<?php echo $view_icsi_advised_list->town->viewAttributes() ?>><?php echo $view_icsi_advised_list->town->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_icsi_advised_list->ICSIAdvised->Visible) { // ICSIAdvised ?>
		<td data-name="ICSIAdvised" <?php echo $view_icsi_advised_list->ICSIAdvised->cellAttributes() ?>>
<span id="el<?php echo $view_icsi_advised_list->RowCount ?>_view_icsi_advised_ICSIAdvised">
<span<?php echo $view_icsi_advised_list->ICSIAdvised->viewAttributes() ?>><?php echo $view_icsi_advised_list->ICSIAdvised->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_icsi_advised_list->ICSIDate->Visible) { // ICSIDate ?>
		<td data-name="ICSIDate" <?php echo $view_icsi_advised_list->ICSIDate->cellAttributes() ?>>
<span id="el<?php echo $view_icsi_advised_list->RowCount ?>_view_icsi_advised_ICSIDate">
<span<?php echo $view_icsi_advised_list->ICSIDate->viewAttributes() ?>><?php echo $view_icsi_advised_list->ICSIDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_icsi_advised_list->createdUserName->Visible) { // createdUserName ?>
		<td data-name="createdUserName" <?php echo $view_icsi_advised_list->createdUserName->cellAttributes() ?>>
<span id="el<?php echo $view_icsi_advised_list->RowCount ?>_view_icsi_advised_createdUserName">
<span<?php echo $view_icsi_advised_list->createdUserName->viewAttributes() ?>><?php echo $view_icsi_advised_list->createdUserName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_icsi_advised_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $view_icsi_advised_list->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_icsi_advised_list->RowCount ?>_view_icsi_advised_HospID">
<span<?php echo $view_icsi_advised_list->HospID->viewAttributes() ?>><?php echo $view_icsi_advised_list->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_icsi_advised_list->ListOptions->render("body", "right", $view_icsi_advised_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$view_icsi_advised_list->isGridAdd())
		$view_icsi_advised_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$view_icsi_advised->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_icsi_advised_list->Recordset)
	$view_icsi_advised_list->Recordset->Close();
?>
<?php if (!$view_icsi_advised_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_icsi_advised_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_icsi_advised_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_icsi_advised_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_icsi_advised_list->TotalRecords == 0 && !$view_icsi_advised->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_icsi_advised_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_icsi_advised_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_icsi_advised_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$view_icsi_advised->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_view_icsi_advised",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$view_icsi_advised_list->terminate();
?>