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
$doctors_list = new doctors_list();

// Run the page
$doctors_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$doctors_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$doctors->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fdoctorslist = currentForm = new ew.Form("fdoctorslist", "list");
fdoctorslist.formKeyCountName = '<?php echo $doctors_list->FormKeyCountName ?>';

// Form_CustomValidate event
fdoctorslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fdoctorslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fdoctorslist.lists["x_slot_days[]"] = <?php echo $doctors_list->slot_days->Lookup->toClientList() ?>;
fdoctorslist.lists["x_slot_days[]"].options = <?php echo JsonEncode($doctors_list->slot_days->lookupOptions()) ?>;
fdoctorslist.lists["x_Status"] = <?php echo $doctors_list->Status->Lookup->toClientList() ?>;
fdoctorslist.lists["x_Status"].options = <?php echo JsonEncode($doctors_list->Status->lookupOptions()) ?>;

// Form object for search
var fdoctorslistsrch = currentSearchForm = new ew.Form("fdoctorslistsrch");

// Validate function for search
fdoctorslistsrch.validate = function(fobj) {
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
fdoctorslistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fdoctorslistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

fdoctorslistsrch.filterList = <?php echo $doctors_list->getFilterList() ?>;
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
<?php if (!$doctors->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($doctors_list->TotalRecs > 0 && $doctors_list->ExportOptions->visible()) { ?>
<?php $doctors_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($doctors_list->ImportOptions->visible()) { ?>
<?php $doctors_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($doctors_list->SearchOptions->visible()) { ?>
<?php $doctors_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($doctors_list->FilterOptions->visible()) { ?>
<?php $doctors_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$doctors_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$doctors->isExport() && !$doctors->CurrentAction) { ?>
<form name="fdoctorslistsrch" id="fdoctorslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($doctors_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fdoctorslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="doctors">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$doctors_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$doctors->RowType = ROWTYPE_SEARCH;

// Render row
$doctors->resetAttributes();
$doctors_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($doctors->DEPARTMENT->Visible) { // DEPARTMENT ?>
	<div id="xsc_DEPARTMENT" class="ew-cell form-group">
		<label for="x_DEPARTMENT" class="ew-search-caption ew-label"><?php echo $doctors->DEPARTMENT->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_DEPARTMENT" id="z_DEPARTMENT" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="doctors" data-field="x_DEPARTMENT" name="x_DEPARTMENT" id="x_DEPARTMENT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($doctors->DEPARTMENT->getPlaceHolder()) ?>" value="<?php echo $doctors->DEPARTMENT->EditValue ?>"<?php echo $doctors->DEPARTMENT->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($doctors_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($doctors_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $doctors_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($doctors_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($doctors_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($doctors_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($doctors_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $doctors_list->showPageHeader(); ?>
<?php
$doctors_list->showMessage();
?>
<?php if ($doctors_list->TotalRecs > 0 || $doctors->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($doctors_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> doctors">
<?php if (!$doctors->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$doctors->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($doctors_list->Pager)) $doctors_list->Pager = new NumericPager($doctors_list->StartRec, $doctors_list->DisplayRecs, $doctors_list->TotalRecs, $doctors_list->RecRange, $doctors_list->AutoHidePager) ?>
<?php if ($doctors_list->Pager->RecordCount > 0 && $doctors_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($doctors_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $doctors_list->pageUrl() ?>start=<?php echo $doctors_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($doctors_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $doctors_list->pageUrl() ?>start=<?php echo $doctors_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($doctors_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $doctors_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($doctors_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $doctors_list->pageUrl() ?>start=<?php echo $doctors_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($doctors_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $doctors_list->pageUrl() ?>start=<?php echo $doctors_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($doctors_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $doctors_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $doctors_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $doctors_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($doctors_list->TotalRecs > 0 && (!$doctors_list->AutoHidePageSizeSelector || $doctors_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="doctors">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($doctors_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($doctors_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($doctors_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($doctors_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($doctors_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($doctors_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($doctors->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $doctors_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fdoctorslist" id="fdoctorslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($doctors_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $doctors_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="doctors">
<div id="gmp_doctors" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($doctors_list->TotalRecs > 0 || $doctors->isGridEdit()) { ?>
<table id="tbl_doctorslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$doctors_list->RowType = ROWTYPE_HEADER;

// Render list options
$doctors_list->renderListOptions();

// Render list options (header, left)
$doctors_list->ListOptions->render("header", "left");
?>
<?php if ($doctors->id->Visible) { // id ?>
	<?php if ($doctors->sortUrl($doctors->id) == "") { ?>
		<th data-name="id" class="<?php echo $doctors->id->headerCellClass() ?>"><div id="elh_doctors_id" class="doctors_id"><div class="ew-table-header-caption"><?php echo $doctors->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $doctors->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $doctors->SortUrl($doctors->id) ?>',1);"><div id="elh_doctors_id" class="doctors_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $doctors->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($doctors->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($doctors->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($doctors->CODE->Visible) { // CODE ?>
	<?php if ($doctors->sortUrl($doctors->CODE) == "") { ?>
		<th data-name="CODE" class="<?php echo $doctors->CODE->headerCellClass() ?>"><div id="elh_doctors_CODE" class="doctors_CODE"><div class="ew-table-header-caption"><?php echo $doctors->CODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CODE" class="<?php echo $doctors->CODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $doctors->SortUrl($doctors->CODE) ?>',1);"><div id="elh_doctors_CODE" class="doctors_CODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $doctors->CODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($doctors->CODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($doctors->CODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($doctors->NAME->Visible) { // NAME ?>
	<?php if ($doctors->sortUrl($doctors->NAME) == "") { ?>
		<th data-name="NAME" class="<?php echo $doctors->NAME->headerCellClass() ?>"><div id="elh_doctors_NAME" class="doctors_NAME"><div class="ew-table-header-caption"><?php echo $doctors->NAME->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NAME" class="<?php echo $doctors->NAME->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $doctors->SortUrl($doctors->NAME) ?>',1);"><div id="elh_doctors_NAME" class="doctors_NAME">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $doctors->NAME->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($doctors->NAME->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($doctors->NAME->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($doctors->DEPARTMENT->Visible) { // DEPARTMENT ?>
	<?php if ($doctors->sortUrl($doctors->DEPARTMENT) == "") { ?>
		<th data-name="DEPARTMENT" class="<?php echo $doctors->DEPARTMENT->headerCellClass() ?>"><div id="elh_doctors_DEPARTMENT" class="doctors_DEPARTMENT"><div class="ew-table-header-caption"><?php echo $doctors->DEPARTMENT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DEPARTMENT" class="<?php echo $doctors->DEPARTMENT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $doctors->SortUrl($doctors->DEPARTMENT) ?>',1);"><div id="elh_doctors_DEPARTMENT" class="doctors_DEPARTMENT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $doctors->DEPARTMENT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($doctors->DEPARTMENT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($doctors->DEPARTMENT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($doctors->start_time->Visible) { // start_time ?>
	<?php if ($doctors->sortUrl($doctors->start_time) == "") { ?>
		<th data-name="start_time" class="<?php echo $doctors->start_time->headerCellClass() ?>"><div id="elh_doctors_start_time" class="doctors_start_time"><div class="ew-table-header-caption"><?php echo $doctors->start_time->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="start_time" class="<?php echo $doctors->start_time->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $doctors->SortUrl($doctors->start_time) ?>',1);"><div id="elh_doctors_start_time" class="doctors_start_time">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $doctors->start_time->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($doctors->start_time->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($doctors->start_time->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($doctors->end_time->Visible) { // end_time ?>
	<?php if ($doctors->sortUrl($doctors->end_time) == "") { ?>
		<th data-name="end_time" class="<?php echo $doctors->end_time->headerCellClass() ?>"><div id="elh_doctors_end_time" class="doctors_end_time"><div class="ew-table-header-caption"><?php echo $doctors->end_time->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="end_time" class="<?php echo $doctors->end_time->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $doctors->SortUrl($doctors->end_time) ?>',1);"><div id="elh_doctors_end_time" class="doctors_end_time">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $doctors->end_time->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($doctors->end_time->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($doctors->end_time->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($doctors->start_time1->Visible) { // start_time1 ?>
	<?php if ($doctors->sortUrl($doctors->start_time1) == "") { ?>
		<th data-name="start_time1" class="<?php echo $doctors->start_time1->headerCellClass() ?>"><div id="elh_doctors_start_time1" class="doctors_start_time1"><div class="ew-table-header-caption"><?php echo $doctors->start_time1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="start_time1" class="<?php echo $doctors->start_time1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $doctors->SortUrl($doctors->start_time1) ?>',1);"><div id="elh_doctors_start_time1" class="doctors_start_time1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $doctors->start_time1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($doctors->start_time1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($doctors->start_time1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($doctors->end_time1->Visible) { // end_time1 ?>
	<?php if ($doctors->sortUrl($doctors->end_time1) == "") { ?>
		<th data-name="end_time1" class="<?php echo $doctors->end_time1->headerCellClass() ?>"><div id="elh_doctors_end_time1" class="doctors_end_time1"><div class="ew-table-header-caption"><?php echo $doctors->end_time1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="end_time1" class="<?php echo $doctors->end_time1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $doctors->SortUrl($doctors->end_time1) ?>',1);"><div id="elh_doctors_end_time1" class="doctors_end_time1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $doctors->end_time1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($doctors->end_time1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($doctors->end_time1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($doctors->start_time2->Visible) { // start_time2 ?>
	<?php if ($doctors->sortUrl($doctors->start_time2) == "") { ?>
		<th data-name="start_time2" class="<?php echo $doctors->start_time2->headerCellClass() ?>"><div id="elh_doctors_start_time2" class="doctors_start_time2"><div class="ew-table-header-caption"><?php echo $doctors->start_time2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="start_time2" class="<?php echo $doctors->start_time2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $doctors->SortUrl($doctors->start_time2) ?>',1);"><div id="elh_doctors_start_time2" class="doctors_start_time2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $doctors->start_time2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($doctors->start_time2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($doctors->start_time2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($doctors->end_time2->Visible) { // end_time2 ?>
	<?php if ($doctors->sortUrl($doctors->end_time2) == "") { ?>
		<th data-name="end_time2" class="<?php echo $doctors->end_time2->headerCellClass() ?>"><div id="elh_doctors_end_time2" class="doctors_end_time2"><div class="ew-table-header-caption"><?php echo $doctors->end_time2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="end_time2" class="<?php echo $doctors->end_time2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $doctors->SortUrl($doctors->end_time2) ?>',1);"><div id="elh_doctors_end_time2" class="doctors_end_time2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $doctors->end_time2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($doctors->end_time2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($doctors->end_time2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($doctors->slot_time->Visible) { // slot_time ?>
	<?php if ($doctors->sortUrl($doctors->slot_time) == "") { ?>
		<th data-name="slot_time" class="<?php echo $doctors->slot_time->headerCellClass() ?>"><div id="elh_doctors_slot_time" class="doctors_slot_time"><div class="ew-table-header-caption"><?php echo $doctors->slot_time->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="slot_time" class="<?php echo $doctors->slot_time->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $doctors->SortUrl($doctors->slot_time) ?>',1);"><div id="elh_doctors_slot_time" class="doctors_slot_time">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $doctors->slot_time->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($doctors->slot_time->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($doctors->slot_time->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($doctors->Fees->Visible) { // Fees ?>
	<?php if ($doctors->sortUrl($doctors->Fees) == "") { ?>
		<th data-name="Fees" class="<?php echo $doctors->Fees->headerCellClass() ?>"><div id="elh_doctors_Fees" class="doctors_Fees"><div class="ew-table-header-caption"><?php echo $doctors->Fees->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Fees" class="<?php echo $doctors->Fees->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $doctors->SortUrl($doctors->Fees) ?>',1);"><div id="elh_doctors_Fees" class="doctors_Fees">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $doctors->Fees->caption() ?></span><span class="ew-table-header-sort"><?php if ($doctors->Fees->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($doctors->Fees->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($doctors->slot_days->Visible) { // slot_days ?>
	<?php if ($doctors->sortUrl($doctors->slot_days) == "") { ?>
		<th data-name="slot_days" class="<?php echo $doctors->slot_days->headerCellClass() ?>"><div id="elh_doctors_slot_days" class="doctors_slot_days"><div class="ew-table-header-caption"><?php echo $doctors->slot_days->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="slot_days" class="<?php echo $doctors->slot_days->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $doctors->SortUrl($doctors->slot_days) ?>',1);"><div id="elh_doctors_slot_days" class="doctors_slot_days">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $doctors->slot_days->caption() ?></span><span class="ew-table-header-sort"><?php if ($doctors->slot_days->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($doctors->slot_days->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($doctors->Status->Visible) { // Status ?>
	<?php if ($doctors->sortUrl($doctors->Status) == "") { ?>
		<th data-name="Status" class="<?php echo $doctors->Status->headerCellClass() ?>"><div id="elh_doctors_Status" class="doctors_Status"><div class="ew-table-header-caption"><?php echo $doctors->Status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Status" class="<?php echo $doctors->Status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $doctors->SortUrl($doctors->Status) ?>',1);"><div id="elh_doctors_Status" class="doctors_Status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $doctors->Status->caption() ?></span><span class="ew-table-header-sort"><?php if ($doctors->Status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($doctors->Status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($doctors->scheduler_id->Visible) { // scheduler_id ?>
	<?php if ($doctors->sortUrl($doctors->scheduler_id) == "") { ?>
		<th data-name="scheduler_id" class="<?php echo $doctors->scheduler_id->headerCellClass() ?>"><div id="elh_doctors_scheduler_id" class="doctors_scheduler_id"><div class="ew-table-header-caption"><?php echo $doctors->scheduler_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="scheduler_id" class="<?php echo $doctors->scheduler_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $doctors->SortUrl($doctors->scheduler_id) ?>',1);"><div id="elh_doctors_scheduler_id" class="doctors_scheduler_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $doctors->scheduler_id->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($doctors->scheduler_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($doctors->scheduler_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($doctors->HospID->Visible) { // HospID ?>
	<?php if ($doctors->sortUrl($doctors->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $doctors->HospID->headerCellClass() ?>"><div id="elh_doctors_HospID" class="doctors_HospID"><div class="ew-table-header-caption"><?php echo $doctors->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $doctors->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $doctors->SortUrl($doctors->HospID) ?>',1);"><div id="elh_doctors_HospID" class="doctors_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $doctors->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($doctors->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($doctors->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($doctors->Designation->Visible) { // Designation ?>
	<?php if ($doctors->sortUrl($doctors->Designation) == "") { ?>
		<th data-name="Designation" class="<?php echo $doctors->Designation->headerCellClass() ?>"><div id="elh_doctors_Designation" class="doctors_Designation"><div class="ew-table-header-caption"><?php echo $doctors->Designation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Designation" class="<?php echo $doctors->Designation->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $doctors->SortUrl($doctors->Designation) ?>',1);"><div id="elh_doctors_Designation" class="doctors_Designation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $doctors->Designation->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($doctors->Designation->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($doctors->Designation->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$doctors_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($doctors->ExportAll && $doctors->isExport()) {
	$doctors_list->StopRec = $doctors_list->TotalRecs;
} else {

	// Set the last record to display
	if ($doctors_list->TotalRecs > $doctors_list->StartRec + $doctors_list->DisplayRecs - 1)
		$doctors_list->StopRec = $doctors_list->StartRec + $doctors_list->DisplayRecs - 1;
	else
		$doctors_list->StopRec = $doctors_list->TotalRecs;
}
$doctors_list->RecCnt = $doctors_list->StartRec - 1;
if ($doctors_list->Recordset && !$doctors_list->Recordset->EOF) {
	$doctors_list->Recordset->moveFirst();
	$selectLimit = $doctors_list->UseSelectLimit;
	if (!$selectLimit && $doctors_list->StartRec > 1)
		$doctors_list->Recordset->move($doctors_list->StartRec - 1);
} elseif (!$doctors->AllowAddDeleteRow && $doctors_list->StopRec == 0) {
	$doctors_list->StopRec = $doctors->GridAddRowCount;
}

// Initialize aggregate
$doctors->RowType = ROWTYPE_AGGREGATEINIT;
$doctors->resetAttributes();
$doctors_list->renderRow();
while ($doctors_list->RecCnt < $doctors_list->StopRec) {
	$doctors_list->RecCnt++;
	if ($doctors_list->RecCnt >= $doctors_list->StartRec) {
		$doctors_list->RowCnt++;

		// Set up key count
		$doctors_list->KeyCount = $doctors_list->RowIndex;

		// Init row class and style
		$doctors->resetAttributes();
		$doctors->CssClass = "";
		if ($doctors->isGridAdd()) {
		} else {
			$doctors_list->loadRowValues($doctors_list->Recordset); // Load row values
		}
		$doctors->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$doctors->RowAttrs = array_merge($doctors->RowAttrs, array('data-rowindex'=>$doctors_list->RowCnt, 'id'=>'r' . $doctors_list->RowCnt . '_doctors', 'data-rowtype'=>$doctors->RowType));

		// Render row
		$doctors_list->renderRow();

		// Render list options
		$doctors_list->renderListOptions();
?>
	<tr<?php echo $doctors->rowAttributes() ?>>
<?php

// Render list options (body, left)
$doctors_list->ListOptions->render("body", "left", $doctors_list->RowCnt);
?>
	<?php if ($doctors->id->Visible) { // id ?>
		<td data-name="id"<?php echo $doctors->id->cellAttributes() ?>>
<span id="el<?php echo $doctors_list->RowCnt ?>_doctors_id" class="doctors_id">
<span<?php echo $doctors->id->viewAttributes() ?>>
<?php echo $doctors->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($doctors->CODE->Visible) { // CODE ?>
		<td data-name="CODE"<?php echo $doctors->CODE->cellAttributes() ?>>
<span id="el<?php echo $doctors_list->RowCnt ?>_doctors_CODE" class="doctors_CODE">
<span<?php echo $doctors->CODE->viewAttributes() ?>>
<?php echo $doctors->CODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($doctors->NAME->Visible) { // NAME ?>
		<td data-name="NAME"<?php echo $doctors->NAME->cellAttributes() ?>>
<span id="el<?php echo $doctors_list->RowCnt ?>_doctors_NAME" class="doctors_NAME">
<span<?php echo $doctors->NAME->viewAttributes() ?>>
<?php echo $doctors->NAME->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($doctors->DEPARTMENT->Visible) { // DEPARTMENT ?>
		<td data-name="DEPARTMENT"<?php echo $doctors->DEPARTMENT->cellAttributes() ?>>
<span id="el<?php echo $doctors_list->RowCnt ?>_doctors_DEPARTMENT" class="doctors_DEPARTMENT">
<span<?php echo $doctors->DEPARTMENT->viewAttributes() ?>>
<?php echo $doctors->DEPARTMENT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($doctors->start_time->Visible) { // start_time ?>
		<td data-name="start_time"<?php echo $doctors->start_time->cellAttributes() ?>>
<span id="el<?php echo $doctors_list->RowCnt ?>_doctors_start_time" class="doctors_start_time">
<span<?php echo $doctors->start_time->viewAttributes() ?>>
<?php echo $doctors->start_time->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($doctors->end_time->Visible) { // end_time ?>
		<td data-name="end_time"<?php echo $doctors->end_time->cellAttributes() ?>>
<span id="el<?php echo $doctors_list->RowCnt ?>_doctors_end_time" class="doctors_end_time">
<span<?php echo $doctors->end_time->viewAttributes() ?>>
<?php echo $doctors->end_time->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($doctors->start_time1->Visible) { // start_time1 ?>
		<td data-name="start_time1"<?php echo $doctors->start_time1->cellAttributes() ?>>
<span id="el<?php echo $doctors_list->RowCnt ?>_doctors_start_time1" class="doctors_start_time1">
<span<?php echo $doctors->start_time1->viewAttributes() ?>>
<?php echo $doctors->start_time1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($doctors->end_time1->Visible) { // end_time1 ?>
		<td data-name="end_time1"<?php echo $doctors->end_time1->cellAttributes() ?>>
<span id="el<?php echo $doctors_list->RowCnt ?>_doctors_end_time1" class="doctors_end_time1">
<span<?php echo $doctors->end_time1->viewAttributes() ?>>
<?php echo $doctors->end_time1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($doctors->start_time2->Visible) { // start_time2 ?>
		<td data-name="start_time2"<?php echo $doctors->start_time2->cellAttributes() ?>>
<span id="el<?php echo $doctors_list->RowCnt ?>_doctors_start_time2" class="doctors_start_time2">
<span<?php echo $doctors->start_time2->viewAttributes() ?>>
<?php echo $doctors->start_time2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($doctors->end_time2->Visible) { // end_time2 ?>
		<td data-name="end_time2"<?php echo $doctors->end_time2->cellAttributes() ?>>
<span id="el<?php echo $doctors_list->RowCnt ?>_doctors_end_time2" class="doctors_end_time2">
<span<?php echo $doctors->end_time2->viewAttributes() ?>>
<?php echo $doctors->end_time2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($doctors->slot_time->Visible) { // slot_time ?>
		<td data-name="slot_time"<?php echo $doctors->slot_time->cellAttributes() ?>>
<span id="el<?php echo $doctors_list->RowCnt ?>_doctors_slot_time" class="doctors_slot_time">
<span<?php echo $doctors->slot_time->viewAttributes() ?>>
<?php echo $doctors->slot_time->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($doctors->Fees->Visible) { // Fees ?>
		<td data-name="Fees"<?php echo $doctors->Fees->cellAttributes() ?>>
<span id="el<?php echo $doctors_list->RowCnt ?>_doctors_Fees" class="doctors_Fees">
<span<?php echo $doctors->Fees->viewAttributes() ?>>
<?php echo $doctors->Fees->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($doctors->slot_days->Visible) { // slot_days ?>
		<td data-name="slot_days"<?php echo $doctors->slot_days->cellAttributes() ?>>
<span id="el<?php echo $doctors_list->RowCnt ?>_doctors_slot_days" class="doctors_slot_days">
<span<?php echo $doctors->slot_days->viewAttributes() ?>>
<?php echo $doctors->slot_days->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($doctors->Status->Visible) { // Status ?>
		<td data-name="Status"<?php echo $doctors->Status->cellAttributes() ?>>
<span id="el<?php echo $doctors_list->RowCnt ?>_doctors_Status" class="doctors_Status">
<span<?php echo $doctors->Status->viewAttributes() ?>>
<?php echo $doctors->Status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($doctors->scheduler_id->Visible) { // scheduler_id ?>
		<td data-name="scheduler_id"<?php echo $doctors->scheduler_id->cellAttributes() ?>>
<span id="el<?php echo $doctors_list->RowCnt ?>_doctors_scheduler_id" class="doctors_scheduler_id">
<span<?php echo $doctors->scheduler_id->viewAttributes() ?>>
<?php echo $doctors->scheduler_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($doctors->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $doctors->HospID->cellAttributes() ?>>
<span id="el<?php echo $doctors_list->RowCnt ?>_doctors_HospID" class="doctors_HospID">
<span<?php echo $doctors->HospID->viewAttributes() ?>>
<?php echo $doctors->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($doctors->Designation->Visible) { // Designation ?>
		<td data-name="Designation"<?php echo $doctors->Designation->cellAttributes() ?>>
<span id="el<?php echo $doctors_list->RowCnt ?>_doctors_Designation" class="doctors_Designation">
<span<?php echo $doctors->Designation->viewAttributes() ?>>
<?php echo $doctors->Designation->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$doctors_list->ListOptions->render("body", "right", $doctors_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$doctors->isGridAdd())
		$doctors_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$doctors->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($doctors_list->Recordset)
	$doctors_list->Recordset->Close();
?>
<?php if (!$doctors->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$doctors->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($doctors_list->Pager)) $doctors_list->Pager = new NumericPager($doctors_list->StartRec, $doctors_list->DisplayRecs, $doctors_list->TotalRecs, $doctors_list->RecRange, $doctors_list->AutoHidePager) ?>
<?php if ($doctors_list->Pager->RecordCount > 0 && $doctors_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($doctors_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $doctors_list->pageUrl() ?>start=<?php echo $doctors_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($doctors_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $doctors_list->pageUrl() ?>start=<?php echo $doctors_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($doctors_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $doctors_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($doctors_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $doctors_list->pageUrl() ?>start=<?php echo $doctors_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($doctors_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $doctors_list->pageUrl() ?>start=<?php echo $doctors_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($doctors_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $doctors_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $doctors_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $doctors_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($doctors_list->TotalRecs > 0 && (!$doctors_list->AutoHidePageSizeSelector || $doctors_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="doctors">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($doctors_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($doctors_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($doctors_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($doctors_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($doctors_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($doctors_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($doctors->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $doctors_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($doctors_list->TotalRecs == 0 && !$doctors->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $doctors_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$doctors_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$doctors->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$doctors->isExport()) { ?>
<script>
ew.scrollableTable("gmp_doctors", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$doctors_list->terminate();
?>