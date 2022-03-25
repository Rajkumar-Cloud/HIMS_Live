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
$view_next_review_date_list = new view_next_review_date_list();

// Run the page
$view_next_review_date_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_next_review_date_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$view_next_review_date_list->isExport()) { ?>
<script>
var fview_next_review_datelist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fview_next_review_datelist = currentForm = new ew.Form("fview_next_review_datelist", "list");
	fview_next_review_datelist.formKeyCountName = '<?php echo $view_next_review_date_list->FormKeyCountName ?>';
	loadjs.done("fview_next_review_datelist");
});
var fview_next_review_datelistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fview_next_review_datelistsrch = currentSearchForm = new ew.Form("fview_next_review_datelistsrch");

	// Validate function for search
	fview_next_review_datelistsrch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_NextReviewDate");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_next_review_date_list->NextReviewDate->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fview_next_review_datelistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_next_review_datelistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	// Filters

	fview_next_review_datelistsrch.filterList = <?php echo $view_next_review_date_list->getFilterList() ?>;
	loadjs.done("fview_next_review_datelistsrch");
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
<?php if (!$view_next_review_date_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_next_review_date_list->TotalRecords > 0 && $view_next_review_date_list->ExportOptions->visible()) { ?>
<?php $view_next_review_date_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_next_review_date_list->ImportOptions->visible()) { ?>
<?php $view_next_review_date_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_next_review_date_list->SearchOptions->visible()) { ?>
<?php $view_next_review_date_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_next_review_date_list->FilterOptions->visible()) { ?>
<?php $view_next_review_date_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_next_review_date_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_next_review_date_list->isExport() && !$view_next_review_date->CurrentAction) { ?>
<form name="fview_next_review_datelistsrch" id="fview_next_review_datelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fview_next_review_datelistsrch-search-panel" class="<?php echo $view_next_review_date_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_next_review_date">
	<div class="ew-extended-search">
<?php

// Render search row
$view_next_review_date->RowType = ROWTYPE_SEARCH;
$view_next_review_date->resetAttributes();
$view_next_review_date_list->renderRow();
?>
<?php if ($view_next_review_date_list->NextReviewDate->Visible) { // NextReviewDate ?>
	<?php
		$view_next_review_date_list->SearchColumnCount++;
		if (($view_next_review_date_list->SearchColumnCount - 1) % $view_next_review_date_list->SearchFieldsPerRow == 0) {
			$view_next_review_date_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_next_review_date_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_NextReviewDate" class="ew-cell form-group">
		<label for="x_NextReviewDate" class="ew-search-caption ew-label"><?php echo $view_next_review_date_list->NextReviewDate->caption() ?></label>
		<span class="ew-search-operator">
<select name="z_NextReviewDate" id="z_NextReviewDate" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?php echo $view_next_review_date_list->NextReviewDate->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?php echo $Language->phrase("EQUAL") ?></option>
<option value="<>"<?php echo $view_next_review_date_list->NextReviewDate->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?php echo $Language->phrase("<>") ?></option>
<option value="<"<?php echo $view_next_review_date_list->NextReviewDate->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?php echo $Language->phrase("<") ?></option>
<option value="<="<?php echo $view_next_review_date_list->NextReviewDate->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?php echo $Language->phrase("<=") ?></option>
<option value=">"<?php echo $view_next_review_date_list->NextReviewDate->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?php echo $Language->phrase(">") ?></option>
<option value=">="<?php echo $view_next_review_date_list->NextReviewDate->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?php echo $Language->phrase(">=") ?></option>
<option value="IS NULL"<?php echo $view_next_review_date_list->NextReviewDate->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?php echo $view_next_review_date_list->NextReviewDate->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?php echo $view_next_review_date_list->NextReviewDate->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?php echo $Language->phrase("BETWEEN") ?></option>
</select>
</span>
		<span id="el_view_next_review_date_NextReviewDate" class="ew-search-field">
<input type="text" data-table="view_next_review_date" data-field="x_NextReviewDate" name="x_NextReviewDate" id="x_NextReviewDate" placeholder="<?php echo HtmlEncode($view_next_review_date_list->NextReviewDate->getPlaceHolder()) ?>" value="<?php echo $view_next_review_date_list->NextReviewDate->EditValue ?>"<?php echo $view_next_review_date_list->NextReviewDate->editAttributes() ?>>
<?php if (!$view_next_review_date_list->NextReviewDate->ReadOnly && !$view_next_review_date_list->NextReviewDate->Disabled && !isset($view_next_review_date_list->NextReviewDate->EditAttrs["readonly"]) && !isset($view_next_review_date_list->NextReviewDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_next_review_datelistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_next_review_datelistsrch", "x_NextReviewDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		<span class="ew-search-and d-none"><label><?php echo $Language->phrase("AND") ?></label></span>
		<span id="el2_view_next_review_date_NextReviewDate" class="ew-search-field2 d-none">
<input type="text" data-table="view_next_review_date" data-field="x_NextReviewDate" name="y_NextReviewDate" id="y_NextReviewDate" placeholder="<?php echo HtmlEncode($view_next_review_date_list->NextReviewDate->getPlaceHolder()) ?>" value="<?php echo $view_next_review_date_list->NextReviewDate->EditValue2 ?>"<?php echo $view_next_review_date_list->NextReviewDate->editAttributes() ?>>
<?php if (!$view_next_review_date_list->NextReviewDate->ReadOnly && !$view_next_review_date_list->NextReviewDate->Disabled && !isset($view_next_review_date_list->NextReviewDate->EditAttrs["readonly"]) && !isset($view_next_review_date_list->NextReviewDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_next_review_datelistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_next_review_datelistsrch", "y_NextReviewDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
	</div>
	<?php if ($view_next_review_date_list->SearchColumnCount % $view_next_review_date_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($view_next_review_date_list->SearchColumnCount % $view_next_review_date_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $view_next_review_date_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($view_next_review_date_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($view_next_review_date_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_next_review_date_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_next_review_date_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_next_review_date_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_next_review_date_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_next_review_date_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $view_next_review_date_list->showPageHeader(); ?>
<?php
$view_next_review_date_list->showMessage();
?>
<?php if ($view_next_review_date_list->TotalRecords > 0 || $view_next_review_date->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_next_review_date_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_next_review_date">
<?php if (!$view_next_review_date_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_next_review_date_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_next_review_date_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_next_review_date_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_next_review_datelist" id="fview_next_review_datelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_next_review_date">
<div id="gmp_view_next_review_date" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($view_next_review_date_list->TotalRecords > 0 || $view_next_review_date_list->isGridEdit()) { ?>
<table id="tbl_view_next_review_datelist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_next_review_date->RowType = ROWTYPE_HEADER;

// Render list options
$view_next_review_date_list->renderListOptions();

// Render list options (header, left)
$view_next_review_date_list->ListOptions->render("header", "left");
?>
<?php if ($view_next_review_date_list->first_name->Visible) { // first_name ?>
	<?php if ($view_next_review_date_list->SortUrl($view_next_review_date_list->first_name) == "") { ?>
		<th data-name="first_name" class="<?php echo $view_next_review_date_list->first_name->headerCellClass() ?>"><div id="elh_view_next_review_date_first_name" class="view_next_review_date_first_name"><div class="ew-table-header-caption"><?php echo $view_next_review_date_list->first_name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="first_name" class="<?php echo $view_next_review_date_list->first_name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_next_review_date_list->SortUrl($view_next_review_date_list->first_name) ?>', 1);"><div id="elh_view_next_review_date_first_name" class="view_next_review_date_first_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_next_review_date_list->first_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_next_review_date_list->first_name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_next_review_date_list->first_name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_next_review_date_list->PatientID->Visible) { // PatientID ?>
	<?php if ($view_next_review_date_list->SortUrl($view_next_review_date_list->PatientID) == "") { ?>
		<th data-name="PatientID" class="<?php echo $view_next_review_date_list->PatientID->headerCellClass() ?>"><div id="elh_view_next_review_date_PatientID" class="view_next_review_date_PatientID"><div class="ew-table-header-caption"><?php echo $view_next_review_date_list->PatientID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientID" class="<?php echo $view_next_review_date_list->PatientID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_next_review_date_list->SortUrl($view_next_review_date_list->PatientID) ?>', 1);"><div id="elh_view_next_review_date_PatientID" class="view_next_review_date_PatientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_next_review_date_list->PatientID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_next_review_date_list->PatientID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_next_review_date_list->PatientID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_next_review_date_list->mobile_no->Visible) { // mobile_no ?>
	<?php if ($view_next_review_date_list->SortUrl($view_next_review_date_list->mobile_no) == "") { ?>
		<th data-name="mobile_no" class="<?php echo $view_next_review_date_list->mobile_no->headerCellClass() ?>"><div id="elh_view_next_review_date_mobile_no" class="view_next_review_date_mobile_no"><div class="ew-table-header-caption"><?php echo $view_next_review_date_list->mobile_no->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mobile_no" class="<?php echo $view_next_review_date_list->mobile_no->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_next_review_date_list->SortUrl($view_next_review_date_list->mobile_no) ?>', 1);"><div id="elh_view_next_review_date_mobile_no" class="view_next_review_date_mobile_no">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_next_review_date_list->mobile_no->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_next_review_date_list->mobile_no->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_next_review_date_list->mobile_no->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_next_review_date_list->street->Visible) { // street ?>
	<?php if ($view_next_review_date_list->SortUrl($view_next_review_date_list->street) == "") { ?>
		<th data-name="street" class="<?php echo $view_next_review_date_list->street->headerCellClass() ?>"><div id="elh_view_next_review_date_street" class="view_next_review_date_street"><div class="ew-table-header-caption"><?php echo $view_next_review_date_list->street->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="street" class="<?php echo $view_next_review_date_list->street->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_next_review_date_list->SortUrl($view_next_review_date_list->street) ?>', 1);"><div id="elh_view_next_review_date_street" class="view_next_review_date_street">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_next_review_date_list->street->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_next_review_date_list->street->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_next_review_date_list->street->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_next_review_date_list->town->Visible) { // town ?>
	<?php if ($view_next_review_date_list->SortUrl($view_next_review_date_list->town) == "") { ?>
		<th data-name="town" class="<?php echo $view_next_review_date_list->town->headerCellClass() ?>"><div id="elh_view_next_review_date_town" class="view_next_review_date_town"><div class="ew-table-header-caption"><?php echo $view_next_review_date_list->town->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="town" class="<?php echo $view_next_review_date_list->town->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_next_review_date_list->SortUrl($view_next_review_date_list->town) ?>', 1);"><div id="elh_view_next_review_date_town" class="view_next_review_date_town">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_next_review_date_list->town->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_next_review_date_list->town->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_next_review_date_list->town->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_next_review_date_list->NextReviewDate->Visible) { // NextReviewDate ?>
	<?php if ($view_next_review_date_list->SortUrl($view_next_review_date_list->NextReviewDate) == "") { ?>
		<th data-name="NextReviewDate" class="<?php echo $view_next_review_date_list->NextReviewDate->headerCellClass() ?>"><div id="elh_view_next_review_date_NextReviewDate" class="view_next_review_date_NextReviewDate"><div class="ew-table-header-caption"><?php echo $view_next_review_date_list->NextReviewDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NextReviewDate" class="<?php echo $view_next_review_date_list->NextReviewDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_next_review_date_list->SortUrl($view_next_review_date_list->NextReviewDate) ?>', 1);"><div id="elh_view_next_review_date_NextReviewDate" class="view_next_review_date_NextReviewDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_next_review_date_list->NextReviewDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_next_review_date_list->NextReviewDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_next_review_date_list->NextReviewDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_next_review_date_list->createdUserName->Visible) { // createdUserName ?>
	<?php if ($view_next_review_date_list->SortUrl($view_next_review_date_list->createdUserName) == "") { ?>
		<th data-name="createdUserName" class="<?php echo $view_next_review_date_list->createdUserName->headerCellClass() ?>"><div id="elh_view_next_review_date_createdUserName" class="view_next_review_date_createdUserName"><div class="ew-table-header-caption"><?php echo $view_next_review_date_list->createdUserName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdUserName" class="<?php echo $view_next_review_date_list->createdUserName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_next_review_date_list->SortUrl($view_next_review_date_list->createdUserName) ?>', 1);"><div id="elh_view_next_review_date_createdUserName" class="view_next_review_date_createdUserName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_next_review_date_list->createdUserName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_next_review_date_list->createdUserName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_next_review_date_list->createdUserName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_next_review_date_list->HospID->Visible) { // HospID ?>
	<?php if ($view_next_review_date_list->SortUrl($view_next_review_date_list->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_next_review_date_list->HospID->headerCellClass() ?>"><div id="elh_view_next_review_date_HospID" class="view_next_review_date_HospID"><div class="ew-table-header-caption"><?php echo $view_next_review_date_list->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_next_review_date_list->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_next_review_date_list->SortUrl($view_next_review_date_list->HospID) ?>', 1);"><div id="elh_view_next_review_date_HospID" class="view_next_review_date_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_next_review_date_list->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_next_review_date_list->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_next_review_date_list->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_next_review_date_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_next_review_date_list->ExportAll && $view_next_review_date_list->isExport()) {
	$view_next_review_date_list->StopRecord = $view_next_review_date_list->TotalRecords;
} else {

	// Set the last record to display
	if ($view_next_review_date_list->TotalRecords > $view_next_review_date_list->StartRecord + $view_next_review_date_list->DisplayRecords - 1)
		$view_next_review_date_list->StopRecord = $view_next_review_date_list->StartRecord + $view_next_review_date_list->DisplayRecords - 1;
	else
		$view_next_review_date_list->StopRecord = $view_next_review_date_list->TotalRecords;
}
$view_next_review_date_list->RecordCount = $view_next_review_date_list->StartRecord - 1;
if ($view_next_review_date_list->Recordset && !$view_next_review_date_list->Recordset->EOF) {
	$view_next_review_date_list->Recordset->moveFirst();
	$selectLimit = $view_next_review_date_list->UseSelectLimit;
	if (!$selectLimit && $view_next_review_date_list->StartRecord > 1)
		$view_next_review_date_list->Recordset->move($view_next_review_date_list->StartRecord - 1);
} elseif (!$view_next_review_date->AllowAddDeleteRow && $view_next_review_date_list->StopRecord == 0) {
	$view_next_review_date_list->StopRecord = $view_next_review_date->GridAddRowCount;
}

// Initialize aggregate
$view_next_review_date->RowType = ROWTYPE_AGGREGATEINIT;
$view_next_review_date->resetAttributes();
$view_next_review_date_list->renderRow();
while ($view_next_review_date_list->RecordCount < $view_next_review_date_list->StopRecord) {
	$view_next_review_date_list->RecordCount++;
	if ($view_next_review_date_list->RecordCount >= $view_next_review_date_list->StartRecord) {
		$view_next_review_date_list->RowCount++;

		// Set up key count
		$view_next_review_date_list->KeyCount = $view_next_review_date_list->RowIndex;

		// Init row class and style
		$view_next_review_date->resetAttributes();
		$view_next_review_date->CssClass = "";
		if ($view_next_review_date_list->isGridAdd()) {
		} else {
			$view_next_review_date_list->loadRowValues($view_next_review_date_list->Recordset); // Load row values
		}
		$view_next_review_date->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_next_review_date->RowAttrs->merge(["data-rowindex" => $view_next_review_date_list->RowCount, "id" => "r" . $view_next_review_date_list->RowCount . "_view_next_review_date", "data-rowtype" => $view_next_review_date->RowType]);

		// Render row
		$view_next_review_date_list->renderRow();

		// Render list options
		$view_next_review_date_list->renderListOptions();
?>
	<tr <?php echo $view_next_review_date->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_next_review_date_list->ListOptions->render("body", "left", $view_next_review_date_list->RowCount);
?>
	<?php if ($view_next_review_date_list->first_name->Visible) { // first_name ?>
		<td data-name="first_name" <?php echo $view_next_review_date_list->first_name->cellAttributes() ?>>
<span id="el<?php echo $view_next_review_date_list->RowCount ?>_view_next_review_date_first_name">
<span<?php echo $view_next_review_date_list->first_name->viewAttributes() ?>><?php echo $view_next_review_date_list->first_name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_next_review_date_list->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID" <?php echo $view_next_review_date_list->PatientID->cellAttributes() ?>>
<span id="el<?php echo $view_next_review_date_list->RowCount ?>_view_next_review_date_PatientID">
<span<?php echo $view_next_review_date_list->PatientID->viewAttributes() ?>><?php echo $view_next_review_date_list->PatientID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_next_review_date_list->mobile_no->Visible) { // mobile_no ?>
		<td data-name="mobile_no" <?php echo $view_next_review_date_list->mobile_no->cellAttributes() ?>>
<span id="el<?php echo $view_next_review_date_list->RowCount ?>_view_next_review_date_mobile_no">
<span<?php echo $view_next_review_date_list->mobile_no->viewAttributes() ?>><?php echo $view_next_review_date_list->mobile_no->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_next_review_date_list->street->Visible) { // street ?>
		<td data-name="street" <?php echo $view_next_review_date_list->street->cellAttributes() ?>>
<span id="el<?php echo $view_next_review_date_list->RowCount ?>_view_next_review_date_street">
<span<?php echo $view_next_review_date_list->street->viewAttributes() ?>><?php echo $view_next_review_date_list->street->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_next_review_date_list->town->Visible) { // town ?>
		<td data-name="town" <?php echo $view_next_review_date_list->town->cellAttributes() ?>>
<span id="el<?php echo $view_next_review_date_list->RowCount ?>_view_next_review_date_town">
<span<?php echo $view_next_review_date_list->town->viewAttributes() ?>><?php echo $view_next_review_date_list->town->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_next_review_date_list->NextReviewDate->Visible) { // NextReviewDate ?>
		<td data-name="NextReviewDate" <?php echo $view_next_review_date_list->NextReviewDate->cellAttributes() ?>>
<span id="el<?php echo $view_next_review_date_list->RowCount ?>_view_next_review_date_NextReviewDate">
<span<?php echo $view_next_review_date_list->NextReviewDate->viewAttributes() ?>><?php echo $view_next_review_date_list->NextReviewDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_next_review_date_list->createdUserName->Visible) { // createdUserName ?>
		<td data-name="createdUserName" <?php echo $view_next_review_date_list->createdUserName->cellAttributes() ?>>
<span id="el<?php echo $view_next_review_date_list->RowCount ?>_view_next_review_date_createdUserName">
<span<?php echo $view_next_review_date_list->createdUserName->viewAttributes() ?>><?php echo $view_next_review_date_list->createdUserName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_next_review_date_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $view_next_review_date_list->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_next_review_date_list->RowCount ?>_view_next_review_date_HospID">
<span<?php echo $view_next_review_date_list->HospID->viewAttributes() ?>><?php echo $view_next_review_date_list->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_next_review_date_list->ListOptions->render("body", "right", $view_next_review_date_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$view_next_review_date_list->isGridAdd())
		$view_next_review_date_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$view_next_review_date->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_next_review_date_list->Recordset)
	$view_next_review_date_list->Recordset->Close();
?>
<?php if (!$view_next_review_date_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_next_review_date_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_next_review_date_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_next_review_date_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_next_review_date_list->TotalRecords == 0 && !$view_next_review_date->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_next_review_date_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_next_review_date_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_next_review_date_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$view_next_review_date->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_view_next_review_date",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$view_next_review_date_list->terminate();
?>