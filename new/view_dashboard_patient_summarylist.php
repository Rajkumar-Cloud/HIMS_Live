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
$view_dashboard_patient_summary_list = new view_dashboard_patient_summary_list();

// Run the page
$view_dashboard_patient_summary_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_dashboard_patient_summary_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$view_dashboard_patient_summary_list->isExport()) { ?>
<script>
var fview_dashboard_patient_summarylist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fview_dashboard_patient_summarylist = currentForm = new ew.Form("fview_dashboard_patient_summarylist", "list");
	fview_dashboard_patient_summarylist.formKeyCountName = '<?php echo $view_dashboard_patient_summary_list->FormKeyCountName ?>';
	loadjs.done("fview_dashboard_patient_summarylist");
});
var fview_dashboard_patient_summarylistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fview_dashboard_patient_summarylistsrch = currentSearchForm = new ew.Form("fview_dashboard_patient_summarylistsrch");

	// Validate function for search
	fview_dashboard_patient_summarylistsrch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_createdDate");
		if (elm && !ew.checkEuroDate(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_dashboard_patient_summary_list->createdDate->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fview_dashboard_patient_summarylistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_dashboard_patient_summarylistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	// Filters

	fview_dashboard_patient_summarylistsrch.filterList = <?php echo $view_dashboard_patient_summary_list->getFilterList() ?>;
	loadjs.done("fview_dashboard_patient_summarylistsrch");
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
<?php if (!$view_dashboard_patient_summary_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_dashboard_patient_summary_list->TotalRecords > 0 && $view_dashboard_patient_summary_list->ExportOptions->visible()) { ?>
<?php $view_dashboard_patient_summary_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_dashboard_patient_summary_list->ImportOptions->visible()) { ?>
<?php $view_dashboard_patient_summary_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_dashboard_patient_summary_list->SearchOptions->visible()) { ?>
<?php $view_dashboard_patient_summary_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_dashboard_patient_summary_list->FilterOptions->visible()) { ?>
<?php $view_dashboard_patient_summary_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_dashboard_patient_summary_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_dashboard_patient_summary_list->isExport() && !$view_dashboard_patient_summary->CurrentAction) { ?>
<form name="fview_dashboard_patient_summarylistsrch" id="fview_dashboard_patient_summarylistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fview_dashboard_patient_summarylistsrch-search-panel" class="<?php echo $view_dashboard_patient_summary_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_dashboard_patient_summary">
	<div class="ew-extended-search">
<?php

// Render search row
$view_dashboard_patient_summary->RowType = ROWTYPE_SEARCH;
$view_dashboard_patient_summary->resetAttributes();
$view_dashboard_patient_summary_list->renderRow();
?>
<?php if ($view_dashboard_patient_summary_list->createdDate->Visible) { // createdDate ?>
	<?php
		$view_dashboard_patient_summary_list->SearchColumnCount++;
		if (($view_dashboard_patient_summary_list->SearchColumnCount - 1) % $view_dashboard_patient_summary_list->SearchFieldsPerRow == 0) {
			$view_dashboard_patient_summary_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_dashboard_patient_summary_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_createdDate" class="ew-cell form-group">
		<label for="x_createdDate" class="ew-search-caption ew-label"><?php echo $view_dashboard_patient_summary_list->createdDate->caption() ?></label>
		<span class="ew-search-operator">
<select name="z_createdDate" id="z_createdDate" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?php echo $view_dashboard_patient_summary_list->createdDate->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?php echo $Language->phrase("EQUAL") ?></option>
<option value="<>"<?php echo $view_dashboard_patient_summary_list->createdDate->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?php echo $Language->phrase("<>") ?></option>
<option value="<"<?php echo $view_dashboard_patient_summary_list->createdDate->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?php echo $Language->phrase("<") ?></option>
<option value="<="<?php echo $view_dashboard_patient_summary_list->createdDate->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?php echo $Language->phrase("<=") ?></option>
<option value=">"<?php echo $view_dashboard_patient_summary_list->createdDate->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?php echo $Language->phrase(">") ?></option>
<option value=">="<?php echo $view_dashboard_patient_summary_list->createdDate->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?php echo $Language->phrase(">=") ?></option>
<option value="IS NULL"<?php echo $view_dashboard_patient_summary_list->createdDate->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?php echo $view_dashboard_patient_summary_list->createdDate->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?php echo $view_dashboard_patient_summary_list->createdDate->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?php echo $Language->phrase("BETWEEN") ?></option>
</select>
</span>
		<span id="el_view_dashboard_patient_summary_createdDate" class="ew-search-field">
<input type="text" data-table="view_dashboard_patient_summary" data-field="x_createdDate" data-format="7" name="x_createdDate" id="x_createdDate" placeholder="<?php echo HtmlEncode($view_dashboard_patient_summary_list->createdDate->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_patient_summary_list->createdDate->EditValue ?>"<?php echo $view_dashboard_patient_summary_list->createdDate->editAttributes() ?>>
<?php if (!$view_dashboard_patient_summary_list->createdDate->ReadOnly && !$view_dashboard_patient_summary_list->createdDate->Disabled && !isset($view_dashboard_patient_summary_list->createdDate->EditAttrs["readonly"]) && !isset($view_dashboard_patient_summary_list->createdDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_dashboard_patient_summarylistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_dashboard_patient_summarylistsrch", "x_createdDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
		<span class="ew-search-and d-none"><label><?php echo $Language->phrase("AND") ?></label></span>
		<span id="el2_view_dashboard_patient_summary_createdDate" class="ew-search-field2 d-none">
<input type="text" data-table="view_dashboard_patient_summary" data-field="x_createdDate" data-format="7" name="y_createdDate" id="y_createdDate" placeholder="<?php echo HtmlEncode($view_dashboard_patient_summary_list->createdDate->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_patient_summary_list->createdDate->EditValue2 ?>"<?php echo $view_dashboard_patient_summary_list->createdDate->editAttributes() ?>>
<?php if (!$view_dashboard_patient_summary_list->createdDate->ReadOnly && !$view_dashboard_patient_summary_list->createdDate->Disabled && !isset($view_dashboard_patient_summary_list->createdDate->EditAttrs["readonly"]) && !isset($view_dashboard_patient_summary_list->createdDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_dashboard_patient_summarylistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_dashboard_patient_summarylistsrch", "y_createdDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
	</div>
	<?php if ($view_dashboard_patient_summary_list->SearchColumnCount % $view_dashboard_patient_summary_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($view_dashboard_patient_summary_list->SearchColumnCount % $view_dashboard_patient_summary_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $view_dashboard_patient_summary_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($view_dashboard_patient_summary_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($view_dashboard_patient_summary_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_dashboard_patient_summary_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_dashboard_patient_summary_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_dashboard_patient_summary_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_dashboard_patient_summary_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_dashboard_patient_summary_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $view_dashboard_patient_summary_list->showPageHeader(); ?>
<?php
$view_dashboard_patient_summary_list->showMessage();
?>
<?php if ($view_dashboard_patient_summary_list->TotalRecords > 0 || $view_dashboard_patient_summary->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_dashboard_patient_summary_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_dashboard_patient_summary">
<?php if (!$view_dashboard_patient_summary_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_dashboard_patient_summary_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_dashboard_patient_summary_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_dashboard_patient_summary_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_dashboard_patient_summarylist" id="fview_dashboard_patient_summarylist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_dashboard_patient_summary">
<div id="gmp_view_dashboard_patient_summary" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($view_dashboard_patient_summary_list->TotalRecords > 0 || $view_dashboard_patient_summary_list->isGridEdit()) { ?>
<table id="tbl_view_dashboard_patient_summarylist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_dashboard_patient_summary->RowType = ROWTYPE_HEADER;

// Render list options
$view_dashboard_patient_summary_list->renderListOptions();

// Render list options (header, left)
$view_dashboard_patient_summary_list->ListOptions->render("header", "left");
?>
<?php if ($view_dashboard_patient_summary_list->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
	<?php if ($view_dashboard_patient_summary_list->SortUrl($view_dashboard_patient_summary_list->WhereDidYouHear) == "") { ?>
		<th data-name="WhereDidYouHear" class="<?php echo $view_dashboard_patient_summary_list->WhereDidYouHear->headerCellClass() ?>"><div id="elh_view_dashboard_patient_summary_WhereDidYouHear" class="view_dashboard_patient_summary_WhereDidYouHear"><div class="ew-table-header-caption"><?php echo $view_dashboard_patient_summary_list->WhereDidYouHear->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="WhereDidYouHear" class="<?php echo $view_dashboard_patient_summary_list->WhereDidYouHear->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_dashboard_patient_summary_list->SortUrl($view_dashboard_patient_summary_list->WhereDidYouHear) ?>', 1);"><div id="elh_view_dashboard_patient_summary_WhereDidYouHear" class="view_dashboard_patient_summary_WhereDidYouHear">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_patient_summary_list->WhereDidYouHear->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_patient_summary_list->WhereDidYouHear->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_patient_summary_list->WhereDidYouHear->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_patient_summary_list->count28WhereDidYouHear29->Visible) { // count(WhereDidYouHear) ?>
	<?php if ($view_dashboard_patient_summary_list->SortUrl($view_dashboard_patient_summary_list->count28WhereDidYouHear29) == "") { ?>
		<th data-name="count28WhereDidYouHear29" class="<?php echo $view_dashboard_patient_summary_list->count28WhereDidYouHear29->headerCellClass() ?>"><div id="elh_view_dashboard_patient_summary_count28WhereDidYouHear29" class="view_dashboard_patient_summary_count28WhereDidYouHear29"><div class="ew-table-header-caption"><?php echo $view_dashboard_patient_summary_list->count28WhereDidYouHear29->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="count28WhereDidYouHear29" class="<?php echo $view_dashboard_patient_summary_list->count28WhereDidYouHear29->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_dashboard_patient_summary_list->SortUrl($view_dashboard_patient_summary_list->count28WhereDidYouHear29) ?>', 1);"><div id="elh_view_dashboard_patient_summary_count28WhereDidYouHear29" class="view_dashboard_patient_summary_count28WhereDidYouHear29">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_patient_summary_list->count28WhereDidYouHear29->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_patient_summary_list->count28WhereDidYouHear29->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_patient_summary_list->count28WhereDidYouHear29->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_patient_summary_list->HospID->Visible) { // HospID ?>
	<?php if ($view_dashboard_patient_summary_list->SortUrl($view_dashboard_patient_summary_list->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_dashboard_patient_summary_list->HospID->headerCellClass() ?>"><div id="elh_view_dashboard_patient_summary_HospID" class="view_dashboard_patient_summary_HospID"><div class="ew-table-header-caption"><?php echo $view_dashboard_patient_summary_list->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_dashboard_patient_summary_list->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_dashboard_patient_summary_list->SortUrl($view_dashboard_patient_summary_list->HospID) ?>', 1);"><div id="elh_view_dashboard_patient_summary_HospID" class="view_dashboard_patient_summary_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_patient_summary_list->HospID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_patient_summary_list->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_patient_summary_list->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_patient_summary_list->createdDate->Visible) { // createdDate ?>
	<?php if ($view_dashboard_patient_summary_list->SortUrl($view_dashboard_patient_summary_list->createdDate) == "") { ?>
		<th data-name="createdDate" class="<?php echo $view_dashboard_patient_summary_list->createdDate->headerCellClass() ?>"><div id="elh_view_dashboard_patient_summary_createdDate" class="view_dashboard_patient_summary_createdDate"><div class="ew-table-header-caption"><?php echo $view_dashboard_patient_summary_list->createdDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdDate" class="<?php echo $view_dashboard_patient_summary_list->createdDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_dashboard_patient_summary_list->SortUrl($view_dashboard_patient_summary_list->createdDate) ?>', 1);"><div id="elh_view_dashboard_patient_summary_createdDate" class="view_dashboard_patient_summary_createdDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_patient_summary_list->createdDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_patient_summary_list->createdDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_patient_summary_list->createdDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_dashboard_patient_summary_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_dashboard_patient_summary_list->ExportAll && $view_dashboard_patient_summary_list->isExport()) {
	$view_dashboard_patient_summary_list->StopRecord = $view_dashboard_patient_summary_list->TotalRecords;
} else {

	// Set the last record to display
	if ($view_dashboard_patient_summary_list->TotalRecords > $view_dashboard_patient_summary_list->StartRecord + $view_dashboard_patient_summary_list->DisplayRecords - 1)
		$view_dashboard_patient_summary_list->StopRecord = $view_dashboard_patient_summary_list->StartRecord + $view_dashboard_patient_summary_list->DisplayRecords - 1;
	else
		$view_dashboard_patient_summary_list->StopRecord = $view_dashboard_patient_summary_list->TotalRecords;
}
$view_dashboard_patient_summary_list->RecordCount = $view_dashboard_patient_summary_list->StartRecord - 1;
if ($view_dashboard_patient_summary_list->Recordset && !$view_dashboard_patient_summary_list->Recordset->EOF) {
	$view_dashboard_patient_summary_list->Recordset->moveFirst();
	$selectLimit = $view_dashboard_patient_summary_list->UseSelectLimit;
	if (!$selectLimit && $view_dashboard_patient_summary_list->StartRecord > 1)
		$view_dashboard_patient_summary_list->Recordset->move($view_dashboard_patient_summary_list->StartRecord - 1);
} elseif (!$view_dashboard_patient_summary->AllowAddDeleteRow && $view_dashboard_patient_summary_list->StopRecord == 0) {
	$view_dashboard_patient_summary_list->StopRecord = $view_dashboard_patient_summary->GridAddRowCount;
}

// Initialize aggregate
$view_dashboard_patient_summary->RowType = ROWTYPE_AGGREGATEINIT;
$view_dashboard_patient_summary->resetAttributes();
$view_dashboard_patient_summary_list->renderRow();
while ($view_dashboard_patient_summary_list->RecordCount < $view_dashboard_patient_summary_list->StopRecord) {
	$view_dashboard_patient_summary_list->RecordCount++;
	if ($view_dashboard_patient_summary_list->RecordCount >= $view_dashboard_patient_summary_list->StartRecord) {
		$view_dashboard_patient_summary_list->RowCount++;

		// Set up key count
		$view_dashboard_patient_summary_list->KeyCount = $view_dashboard_patient_summary_list->RowIndex;

		// Init row class and style
		$view_dashboard_patient_summary->resetAttributes();
		$view_dashboard_patient_summary->CssClass = "";
		if ($view_dashboard_patient_summary_list->isGridAdd()) {
		} else {
			$view_dashboard_patient_summary_list->loadRowValues($view_dashboard_patient_summary_list->Recordset); // Load row values
		}
		$view_dashboard_patient_summary->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_dashboard_patient_summary->RowAttrs->merge(["data-rowindex" => $view_dashboard_patient_summary_list->RowCount, "id" => "r" . $view_dashboard_patient_summary_list->RowCount . "_view_dashboard_patient_summary", "data-rowtype" => $view_dashboard_patient_summary->RowType]);

		// Render row
		$view_dashboard_patient_summary_list->renderRow();

		// Render list options
		$view_dashboard_patient_summary_list->renderListOptions();
?>
	<tr <?php echo $view_dashboard_patient_summary->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_dashboard_patient_summary_list->ListOptions->render("body", "left", $view_dashboard_patient_summary_list->RowCount);
?>
	<?php if ($view_dashboard_patient_summary_list->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
		<td data-name="WhereDidYouHear" <?php echo $view_dashboard_patient_summary_list->WhereDidYouHear->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_patient_summary_list->RowCount ?>_view_dashboard_patient_summary_WhereDidYouHear">
<span<?php echo $view_dashboard_patient_summary_list->WhereDidYouHear->viewAttributes() ?>><?php echo $view_dashboard_patient_summary_list->WhereDidYouHear->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_patient_summary_list->count28WhereDidYouHear29->Visible) { // count(WhereDidYouHear) ?>
		<td data-name="count28WhereDidYouHear29" <?php echo $view_dashboard_patient_summary_list->count28WhereDidYouHear29->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_patient_summary_list->RowCount ?>_view_dashboard_patient_summary_count28WhereDidYouHear29">
<span<?php echo $view_dashboard_patient_summary_list->count28WhereDidYouHear29->viewAttributes() ?>><?php echo $view_dashboard_patient_summary_list->count28WhereDidYouHear29->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_patient_summary_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $view_dashboard_patient_summary_list->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_patient_summary_list->RowCount ?>_view_dashboard_patient_summary_HospID">
<span<?php echo $view_dashboard_patient_summary_list->HospID->viewAttributes() ?>><?php echo $view_dashboard_patient_summary_list->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_dashboard_patient_summary_list->createdDate->Visible) { // createdDate ?>
		<td data-name="createdDate" <?php echo $view_dashboard_patient_summary_list->createdDate->cellAttributes() ?>>
<span id="el<?php echo $view_dashboard_patient_summary_list->RowCount ?>_view_dashboard_patient_summary_createdDate">
<span<?php echo $view_dashboard_patient_summary_list->createdDate->viewAttributes() ?>><?php echo $view_dashboard_patient_summary_list->createdDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_dashboard_patient_summary_list->ListOptions->render("body", "right", $view_dashboard_patient_summary_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$view_dashboard_patient_summary_list->isGridAdd())
		$view_dashboard_patient_summary_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$view_dashboard_patient_summary->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_dashboard_patient_summary_list->Recordset)
	$view_dashboard_patient_summary_list->Recordset->Close();
?>
<?php if (!$view_dashboard_patient_summary_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_dashboard_patient_summary_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_dashboard_patient_summary_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_dashboard_patient_summary_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_dashboard_patient_summary_list->TotalRecords == 0 && !$view_dashboard_patient_summary->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_dashboard_patient_summary_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_dashboard_patient_summary_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_dashboard_patient_summary_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$view_dashboard_patient_summary->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_view_dashboard_patient_summary",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$view_dashboard_patient_summary_list->terminate();
?>