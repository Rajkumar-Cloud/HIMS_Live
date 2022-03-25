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
$hr_leaveperiods_list = new hr_leaveperiods_list();

// Run the page
$hr_leaveperiods_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_leaveperiods_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$hr_leaveperiods->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fhr_leaveperiodslist = currentForm = new ew.Form("fhr_leaveperiodslist", "list");
fhr_leaveperiodslist.formKeyCountName = '<?php echo $hr_leaveperiods_list->FormKeyCountName ?>';

// Form_CustomValidate event
fhr_leaveperiodslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_leaveperiodslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fhr_leaveperiodslist.lists["x_status"] = <?php echo $hr_leaveperiods_list->status->Lookup->toClientList() ?>;
fhr_leaveperiodslist.lists["x_status"].options = <?php echo JsonEncode($hr_leaveperiods_list->status->options(FALSE, TRUE)) ?>;

// Form object for search
var fhr_leaveperiodslistsrch = currentSearchForm = new ew.Form("fhr_leaveperiodslistsrch");

// Validate function for search
fhr_leaveperiodslistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fhr_leaveperiodslistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_leaveperiodslistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fhr_leaveperiodslistsrch.lists["x_status"] = <?php echo $hr_leaveperiods_list->status->Lookup->toClientList() ?>;
fhr_leaveperiodslistsrch.lists["x_status"].options = <?php echo JsonEncode($hr_leaveperiods_list->status->options(FALSE, TRUE)) ?>;

// Filters
fhr_leaveperiodslistsrch.filterList = <?php echo $hr_leaveperiods_list->getFilterList() ?>;
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
<?php if (!$hr_leaveperiods->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($hr_leaveperiods_list->TotalRecs > 0 && $hr_leaveperiods_list->ExportOptions->visible()) { ?>
<?php $hr_leaveperiods_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($hr_leaveperiods_list->ImportOptions->visible()) { ?>
<?php $hr_leaveperiods_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($hr_leaveperiods_list->SearchOptions->visible()) { ?>
<?php $hr_leaveperiods_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($hr_leaveperiods_list->FilterOptions->visible()) { ?>
<?php $hr_leaveperiods_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$hr_leaveperiods_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$hr_leaveperiods->isExport() && !$hr_leaveperiods->CurrentAction) { ?>
<form name="fhr_leaveperiodslistsrch" id="fhr_leaveperiodslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($hr_leaveperiods_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fhr_leaveperiodslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="hr_leaveperiods">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$hr_leaveperiods_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$hr_leaveperiods->RowType = ROWTYPE_SEARCH;

// Render row
$hr_leaveperiods->resetAttributes();
$hr_leaveperiods_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($hr_leaveperiods->status->Visible) { // status ?>
	<div id="xsc_status" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $hr_leaveperiods->status->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_status" id="z_status" value="="></span>
		<span class="ew-search-field">
<div id="tp_x_status" class="ew-template"><input type="radio" class="form-check-input" data-table="hr_leaveperiods" data-field="x_status" data-value-separator="<?php echo $hr_leaveperiods->status->displayValueSeparatorAttribute() ?>" name="x_status" id="x_status" value="{value}"<?php echo $hr_leaveperiods->status->editAttributes() ?>></div>
<div id="dsl_x_status" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $hr_leaveperiods->status->radioButtonListHtml(FALSE, "x_status") ?>
</div></div>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($hr_leaveperiods_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($hr_leaveperiods_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $hr_leaveperiods_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($hr_leaveperiods_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($hr_leaveperiods_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($hr_leaveperiods_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($hr_leaveperiods_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $hr_leaveperiods_list->showPageHeader(); ?>
<?php
$hr_leaveperiods_list->showMessage();
?>
<?php if ($hr_leaveperiods_list->TotalRecs > 0 || $hr_leaveperiods->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($hr_leaveperiods_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> hr_leaveperiods">
<?php if (!$hr_leaveperiods->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$hr_leaveperiods->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($hr_leaveperiods_list->Pager)) $hr_leaveperiods_list->Pager = new NumericPager($hr_leaveperiods_list->StartRec, $hr_leaveperiods_list->DisplayRecs, $hr_leaveperiods_list->TotalRecs, $hr_leaveperiods_list->RecRange, $hr_leaveperiods_list->AutoHidePager) ?>
<?php if ($hr_leaveperiods_list->Pager->RecordCount > 0 && $hr_leaveperiods_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($hr_leaveperiods_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_leaveperiods_list->pageUrl() ?>start=<?php echo $hr_leaveperiods_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($hr_leaveperiods_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_leaveperiods_list->pageUrl() ?>start=<?php echo $hr_leaveperiods_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($hr_leaveperiods_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $hr_leaveperiods_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($hr_leaveperiods_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_leaveperiods_list->pageUrl() ?>start=<?php echo $hr_leaveperiods_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($hr_leaveperiods_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_leaveperiods_list->pageUrl() ?>start=<?php echo $hr_leaveperiods_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($hr_leaveperiods_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $hr_leaveperiods_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $hr_leaveperiods_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $hr_leaveperiods_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($hr_leaveperiods_list->TotalRecs > 0 && (!$hr_leaveperiods_list->AutoHidePageSizeSelector || $hr_leaveperiods_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="hr_leaveperiods">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($hr_leaveperiods_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($hr_leaveperiods_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($hr_leaveperiods_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($hr_leaveperiods_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($hr_leaveperiods_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($hr_leaveperiods_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($hr_leaveperiods->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $hr_leaveperiods_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fhr_leaveperiodslist" id="fhr_leaveperiodslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_leaveperiods_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_leaveperiods_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_leaveperiods">
<div id="gmp_hr_leaveperiods" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($hr_leaveperiods_list->TotalRecs > 0 || $hr_leaveperiods->isGridEdit()) { ?>
<table id="tbl_hr_leaveperiodslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$hr_leaveperiods_list->RowType = ROWTYPE_HEADER;

// Render list options
$hr_leaveperiods_list->renderListOptions();

// Render list options (header, left)
$hr_leaveperiods_list->ListOptions->render("header", "left");
?>
<?php if ($hr_leaveperiods->id->Visible) { // id ?>
	<?php if ($hr_leaveperiods->sortUrl($hr_leaveperiods->id) == "") { ?>
		<th data-name="id" class="<?php echo $hr_leaveperiods->id->headerCellClass() ?>"><div id="elh_hr_leaveperiods_id" class="hr_leaveperiods_id"><div class="ew-table-header-caption"><?php echo $hr_leaveperiods->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $hr_leaveperiods->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_leaveperiods->SortUrl($hr_leaveperiods->id) ?>',1);"><div id="elh_hr_leaveperiods_id" class="hr_leaveperiods_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_leaveperiods->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_leaveperiods->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_leaveperiods->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_leaveperiods->name->Visible) { // name ?>
	<?php if ($hr_leaveperiods->sortUrl($hr_leaveperiods->name) == "") { ?>
		<th data-name="name" class="<?php echo $hr_leaveperiods->name->headerCellClass() ?>"><div id="elh_hr_leaveperiods_name" class="hr_leaveperiods_name"><div class="ew-table-header-caption"><?php echo $hr_leaveperiods->name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="name" class="<?php echo $hr_leaveperiods->name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_leaveperiods->SortUrl($hr_leaveperiods->name) ?>',1);"><div id="elh_hr_leaveperiods_name" class="hr_leaveperiods_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_leaveperiods->name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hr_leaveperiods->name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_leaveperiods->name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_leaveperiods->date_start->Visible) { // date_start ?>
	<?php if ($hr_leaveperiods->sortUrl($hr_leaveperiods->date_start) == "") { ?>
		<th data-name="date_start" class="<?php echo $hr_leaveperiods->date_start->headerCellClass() ?>"><div id="elh_hr_leaveperiods_date_start" class="hr_leaveperiods_date_start"><div class="ew-table-header-caption"><?php echo $hr_leaveperiods->date_start->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="date_start" class="<?php echo $hr_leaveperiods->date_start->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_leaveperiods->SortUrl($hr_leaveperiods->date_start) ?>',1);"><div id="elh_hr_leaveperiods_date_start" class="hr_leaveperiods_date_start">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_leaveperiods->date_start->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_leaveperiods->date_start->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_leaveperiods->date_start->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_leaveperiods->date_end->Visible) { // date_end ?>
	<?php if ($hr_leaveperiods->sortUrl($hr_leaveperiods->date_end) == "") { ?>
		<th data-name="date_end" class="<?php echo $hr_leaveperiods->date_end->headerCellClass() ?>"><div id="elh_hr_leaveperiods_date_end" class="hr_leaveperiods_date_end"><div class="ew-table-header-caption"><?php echo $hr_leaveperiods->date_end->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="date_end" class="<?php echo $hr_leaveperiods->date_end->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_leaveperiods->SortUrl($hr_leaveperiods->date_end) ?>',1);"><div id="elh_hr_leaveperiods_date_end" class="hr_leaveperiods_date_end">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_leaveperiods->date_end->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_leaveperiods->date_end->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_leaveperiods->date_end->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_leaveperiods->status->Visible) { // status ?>
	<?php if ($hr_leaveperiods->sortUrl($hr_leaveperiods->status) == "") { ?>
		<th data-name="status" class="<?php echo $hr_leaveperiods->status->headerCellClass() ?>"><div id="elh_hr_leaveperiods_status" class="hr_leaveperiods_status"><div class="ew-table-header-caption"><?php echo $hr_leaveperiods->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $hr_leaveperiods->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_leaveperiods->SortUrl($hr_leaveperiods->status) ?>',1);"><div id="elh_hr_leaveperiods_status" class="hr_leaveperiods_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_leaveperiods->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_leaveperiods->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_leaveperiods->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_leaveperiods->HospID->Visible) { // HospID ?>
	<?php if ($hr_leaveperiods->sortUrl($hr_leaveperiods->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $hr_leaveperiods->HospID->headerCellClass() ?>"><div id="elh_hr_leaveperiods_HospID" class="hr_leaveperiods_HospID"><div class="ew-table-header-caption"><?php echo $hr_leaveperiods->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $hr_leaveperiods->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_leaveperiods->SortUrl($hr_leaveperiods->HospID) ?>',1);"><div id="elh_hr_leaveperiods_HospID" class="hr_leaveperiods_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_leaveperiods->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_leaveperiods->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_leaveperiods->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$hr_leaveperiods_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($hr_leaveperiods->ExportAll && $hr_leaveperiods->isExport()) {
	$hr_leaveperiods_list->StopRec = $hr_leaveperiods_list->TotalRecs;
} else {

	// Set the last record to display
	if ($hr_leaveperiods_list->TotalRecs > $hr_leaveperiods_list->StartRec + $hr_leaveperiods_list->DisplayRecs - 1)
		$hr_leaveperiods_list->StopRec = $hr_leaveperiods_list->StartRec + $hr_leaveperiods_list->DisplayRecs - 1;
	else
		$hr_leaveperiods_list->StopRec = $hr_leaveperiods_list->TotalRecs;
}
$hr_leaveperiods_list->RecCnt = $hr_leaveperiods_list->StartRec - 1;
if ($hr_leaveperiods_list->Recordset && !$hr_leaveperiods_list->Recordset->EOF) {
	$hr_leaveperiods_list->Recordset->moveFirst();
	$selectLimit = $hr_leaveperiods_list->UseSelectLimit;
	if (!$selectLimit && $hr_leaveperiods_list->StartRec > 1)
		$hr_leaveperiods_list->Recordset->move($hr_leaveperiods_list->StartRec - 1);
} elseif (!$hr_leaveperiods->AllowAddDeleteRow && $hr_leaveperiods_list->StopRec == 0) {
	$hr_leaveperiods_list->StopRec = $hr_leaveperiods->GridAddRowCount;
}

// Initialize aggregate
$hr_leaveperiods->RowType = ROWTYPE_AGGREGATEINIT;
$hr_leaveperiods->resetAttributes();
$hr_leaveperiods_list->renderRow();
while ($hr_leaveperiods_list->RecCnt < $hr_leaveperiods_list->StopRec) {
	$hr_leaveperiods_list->RecCnt++;
	if ($hr_leaveperiods_list->RecCnt >= $hr_leaveperiods_list->StartRec) {
		$hr_leaveperiods_list->RowCnt++;

		// Set up key count
		$hr_leaveperiods_list->KeyCount = $hr_leaveperiods_list->RowIndex;

		// Init row class and style
		$hr_leaveperiods->resetAttributes();
		$hr_leaveperiods->CssClass = "";
		if ($hr_leaveperiods->isGridAdd()) {
		} else {
			$hr_leaveperiods_list->loadRowValues($hr_leaveperiods_list->Recordset); // Load row values
		}
		$hr_leaveperiods->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$hr_leaveperiods->RowAttrs = array_merge($hr_leaveperiods->RowAttrs, array('data-rowindex'=>$hr_leaveperiods_list->RowCnt, 'id'=>'r' . $hr_leaveperiods_list->RowCnt . '_hr_leaveperiods', 'data-rowtype'=>$hr_leaveperiods->RowType));

		// Render row
		$hr_leaveperiods_list->renderRow();

		// Render list options
		$hr_leaveperiods_list->renderListOptions();
?>
	<tr<?php echo $hr_leaveperiods->rowAttributes() ?>>
<?php

// Render list options (body, left)
$hr_leaveperiods_list->ListOptions->render("body", "left", $hr_leaveperiods_list->RowCnt);
?>
	<?php if ($hr_leaveperiods->id->Visible) { // id ?>
		<td data-name="id"<?php echo $hr_leaveperiods->id->cellAttributes() ?>>
<span id="el<?php echo $hr_leaveperiods_list->RowCnt ?>_hr_leaveperiods_id" class="hr_leaveperiods_id">
<span<?php echo $hr_leaveperiods->id->viewAttributes() ?>>
<?php echo $hr_leaveperiods->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_leaveperiods->name->Visible) { // name ?>
		<td data-name="name"<?php echo $hr_leaveperiods->name->cellAttributes() ?>>
<span id="el<?php echo $hr_leaveperiods_list->RowCnt ?>_hr_leaveperiods_name" class="hr_leaveperiods_name">
<span<?php echo $hr_leaveperiods->name->viewAttributes() ?>>
<?php echo $hr_leaveperiods->name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_leaveperiods->date_start->Visible) { // date_start ?>
		<td data-name="date_start"<?php echo $hr_leaveperiods->date_start->cellAttributes() ?>>
<span id="el<?php echo $hr_leaveperiods_list->RowCnt ?>_hr_leaveperiods_date_start" class="hr_leaveperiods_date_start">
<span<?php echo $hr_leaveperiods->date_start->viewAttributes() ?>>
<?php echo $hr_leaveperiods->date_start->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_leaveperiods->date_end->Visible) { // date_end ?>
		<td data-name="date_end"<?php echo $hr_leaveperiods->date_end->cellAttributes() ?>>
<span id="el<?php echo $hr_leaveperiods_list->RowCnt ?>_hr_leaveperiods_date_end" class="hr_leaveperiods_date_end">
<span<?php echo $hr_leaveperiods->date_end->viewAttributes() ?>>
<?php echo $hr_leaveperiods->date_end->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_leaveperiods->status->Visible) { // status ?>
		<td data-name="status"<?php echo $hr_leaveperiods->status->cellAttributes() ?>>
<span id="el<?php echo $hr_leaveperiods_list->RowCnt ?>_hr_leaveperiods_status" class="hr_leaveperiods_status">
<span<?php echo $hr_leaveperiods->status->viewAttributes() ?>>
<?php echo $hr_leaveperiods->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_leaveperiods->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $hr_leaveperiods->HospID->cellAttributes() ?>>
<span id="el<?php echo $hr_leaveperiods_list->RowCnt ?>_hr_leaveperiods_HospID" class="hr_leaveperiods_HospID">
<span<?php echo $hr_leaveperiods->HospID->viewAttributes() ?>>
<?php echo $hr_leaveperiods->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$hr_leaveperiods_list->ListOptions->render("body", "right", $hr_leaveperiods_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$hr_leaveperiods->isGridAdd())
		$hr_leaveperiods_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$hr_leaveperiods->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($hr_leaveperiods_list->Recordset)
	$hr_leaveperiods_list->Recordset->Close();
?>
<?php if (!$hr_leaveperiods->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$hr_leaveperiods->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($hr_leaveperiods_list->Pager)) $hr_leaveperiods_list->Pager = new NumericPager($hr_leaveperiods_list->StartRec, $hr_leaveperiods_list->DisplayRecs, $hr_leaveperiods_list->TotalRecs, $hr_leaveperiods_list->RecRange, $hr_leaveperiods_list->AutoHidePager) ?>
<?php if ($hr_leaveperiods_list->Pager->RecordCount > 0 && $hr_leaveperiods_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($hr_leaveperiods_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_leaveperiods_list->pageUrl() ?>start=<?php echo $hr_leaveperiods_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($hr_leaveperiods_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_leaveperiods_list->pageUrl() ?>start=<?php echo $hr_leaveperiods_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($hr_leaveperiods_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $hr_leaveperiods_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($hr_leaveperiods_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_leaveperiods_list->pageUrl() ?>start=<?php echo $hr_leaveperiods_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($hr_leaveperiods_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_leaveperiods_list->pageUrl() ?>start=<?php echo $hr_leaveperiods_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($hr_leaveperiods_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $hr_leaveperiods_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $hr_leaveperiods_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $hr_leaveperiods_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($hr_leaveperiods_list->TotalRecs > 0 && (!$hr_leaveperiods_list->AutoHidePageSizeSelector || $hr_leaveperiods_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="hr_leaveperiods">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($hr_leaveperiods_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($hr_leaveperiods_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($hr_leaveperiods_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($hr_leaveperiods_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($hr_leaveperiods_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($hr_leaveperiods_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($hr_leaveperiods->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $hr_leaveperiods_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($hr_leaveperiods_list->TotalRecs == 0 && !$hr_leaveperiods->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $hr_leaveperiods_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$hr_leaveperiods_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$hr_leaveperiods->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$hr_leaveperiods->isExport()) { ?>
<script>
ew.scrollableTable("gmp_hr_leaveperiods", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$hr_leaveperiods_list->terminate();
?>