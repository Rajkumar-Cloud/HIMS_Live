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
$employee_timeentry_list = new employee_timeentry_list();

// Run the page
$employee_timeentry_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_timeentry_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$employee_timeentry->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var femployee_timeentrylist = currentForm = new ew.Form("femployee_timeentrylist", "list");
femployee_timeentrylist.formKeyCountName = '<?php echo $employee_timeentry_list->FormKeyCountName ?>';

// Form_CustomValidate event
femployee_timeentrylist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_timeentrylist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_timeentrylist.lists["x_status"] = <?php echo $employee_timeentry_list->status->Lookup->toClientList() ?>;
femployee_timeentrylist.lists["x_status"].options = <?php echo JsonEncode($employee_timeentry_list->status->options(FALSE, TRUE)) ?>;

// Form object for search
var femployee_timeentrylistsrch = currentSearchForm = new ew.Form("femployee_timeentrylistsrch");

// Validate function for search
femployee_timeentrylistsrch.validate = function(fobj) {
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
femployee_timeentrylistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_timeentrylistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_timeentrylistsrch.lists["x_status"] = <?php echo $employee_timeentry_list->status->Lookup->toClientList() ?>;
femployee_timeentrylistsrch.lists["x_status"].options = <?php echo JsonEncode($employee_timeentry_list->status->options(FALSE, TRUE)) ?>;

// Filters
femployee_timeentrylistsrch.filterList = <?php echo $employee_timeentry_list->getFilterList() ?>;
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
<?php if (!$employee_timeentry->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($employee_timeentry_list->TotalRecs > 0 && $employee_timeentry_list->ExportOptions->visible()) { ?>
<?php $employee_timeentry_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($employee_timeentry_list->ImportOptions->visible()) { ?>
<?php $employee_timeentry_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($employee_timeentry_list->SearchOptions->visible()) { ?>
<?php $employee_timeentry_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($employee_timeentry_list->FilterOptions->visible()) { ?>
<?php $employee_timeentry_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$employee_timeentry_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$employee_timeentry->isExport() && !$employee_timeentry->CurrentAction) { ?>
<form name="femployee_timeentrylistsrch" id="femployee_timeentrylistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($employee_timeentry_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="femployee_timeentrylistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="employee_timeentry">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$employee_timeentry_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$employee_timeentry->RowType = ROWTYPE_SEARCH;

// Render row
$employee_timeentry->resetAttributes();
$employee_timeentry_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($employee_timeentry->status->Visible) { // status ?>
	<div id="xsc_status" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $employee_timeentry->status->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_status" id="z_status" value="="></span>
		<span class="ew-search-field">
<div id="tp_x_status" class="ew-template"><input type="radio" class="form-check-input" data-table="employee_timeentry" data-field="x_status" data-value-separator="<?php echo $employee_timeentry->status->displayValueSeparatorAttribute() ?>" name="x_status" id="x_status" value="{value}"<?php echo $employee_timeentry->status->editAttributes() ?>></div>
<div id="dsl_x_status" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $employee_timeentry->status->radioButtonListHtml(FALSE, "x_status") ?>
</div></div>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($employee_timeentry_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($employee_timeentry_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $employee_timeentry_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($employee_timeentry_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($employee_timeentry_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($employee_timeentry_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($employee_timeentry_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $employee_timeentry_list->showPageHeader(); ?>
<?php
$employee_timeentry_list->showMessage();
?>
<?php if ($employee_timeentry_list->TotalRecs > 0 || $employee_timeentry->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($employee_timeentry_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> employee_timeentry">
<?php if (!$employee_timeentry->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$employee_timeentry->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($employee_timeentry_list->Pager)) $employee_timeentry_list->Pager = new NumericPager($employee_timeentry_list->StartRec, $employee_timeentry_list->DisplayRecs, $employee_timeentry_list->TotalRecs, $employee_timeentry_list->RecRange, $employee_timeentry_list->AutoHidePager) ?>
<?php if ($employee_timeentry_list->Pager->RecordCount > 0 && $employee_timeentry_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($employee_timeentry_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_timeentry_list->pageUrl() ?>start=<?php echo $employee_timeentry_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($employee_timeentry_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_timeentry_list->pageUrl() ?>start=<?php echo $employee_timeentry_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($employee_timeentry_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $employee_timeentry_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($employee_timeentry_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_timeentry_list->pageUrl() ?>start=<?php echo $employee_timeentry_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($employee_timeentry_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_timeentry_list->pageUrl() ?>start=<?php echo $employee_timeentry_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($employee_timeentry_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $employee_timeentry_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $employee_timeentry_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $employee_timeentry_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($employee_timeentry_list->TotalRecs > 0 && (!$employee_timeentry_list->AutoHidePageSizeSelector || $employee_timeentry_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="employee_timeentry">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($employee_timeentry_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($employee_timeentry_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($employee_timeentry_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($employee_timeentry_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($employee_timeentry_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($employee_timeentry_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($employee_timeentry->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $employee_timeentry_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="femployee_timeentrylist" id="femployee_timeentrylist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_timeentry_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_timeentry_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_timeentry">
<div id="gmp_employee_timeentry" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($employee_timeentry_list->TotalRecs > 0 || $employee_timeentry->isGridEdit()) { ?>
<table id="tbl_employee_timeentrylist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$employee_timeentry_list->RowType = ROWTYPE_HEADER;

// Render list options
$employee_timeentry_list->renderListOptions();

// Render list options (header, left)
$employee_timeentry_list->ListOptions->render("header", "left");
?>
<?php if ($employee_timeentry->id->Visible) { // id ?>
	<?php if ($employee_timeentry->sortUrl($employee_timeentry->id) == "") { ?>
		<th data-name="id" class="<?php echo $employee_timeentry->id->headerCellClass() ?>"><div id="elh_employee_timeentry_id" class="employee_timeentry_id"><div class="ew-table-header-caption"><?php echo $employee_timeentry->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $employee_timeentry->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_timeentry->SortUrl($employee_timeentry->id) ?>',1);"><div id="elh_employee_timeentry_id" class="employee_timeentry_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_timeentry->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_timeentry->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_timeentry->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_timeentry->project->Visible) { // project ?>
	<?php if ($employee_timeentry->sortUrl($employee_timeentry->project) == "") { ?>
		<th data-name="project" class="<?php echo $employee_timeentry->project->headerCellClass() ?>"><div id="elh_employee_timeentry_project" class="employee_timeentry_project"><div class="ew-table-header-caption"><?php echo $employee_timeentry->project->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="project" class="<?php echo $employee_timeentry->project->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_timeentry->SortUrl($employee_timeentry->project) ?>',1);"><div id="elh_employee_timeentry_project" class="employee_timeentry_project">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_timeentry->project->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_timeentry->project->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_timeentry->project->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_timeentry->employee->Visible) { // employee ?>
	<?php if ($employee_timeentry->sortUrl($employee_timeentry->employee) == "") { ?>
		<th data-name="employee" class="<?php echo $employee_timeentry->employee->headerCellClass() ?>"><div id="elh_employee_timeentry_employee" class="employee_timeentry_employee"><div class="ew-table-header-caption"><?php echo $employee_timeentry->employee->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="employee" class="<?php echo $employee_timeentry->employee->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_timeentry->SortUrl($employee_timeentry->employee) ?>',1);"><div id="elh_employee_timeentry_employee" class="employee_timeentry_employee">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_timeentry->employee->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_timeentry->employee->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_timeentry->employee->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_timeentry->timesheet->Visible) { // timesheet ?>
	<?php if ($employee_timeentry->sortUrl($employee_timeentry->timesheet) == "") { ?>
		<th data-name="timesheet" class="<?php echo $employee_timeentry->timesheet->headerCellClass() ?>"><div id="elh_employee_timeentry_timesheet" class="employee_timeentry_timesheet"><div class="ew-table-header-caption"><?php echo $employee_timeentry->timesheet->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="timesheet" class="<?php echo $employee_timeentry->timesheet->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_timeentry->SortUrl($employee_timeentry->timesheet) ?>',1);"><div id="elh_employee_timeentry_timesheet" class="employee_timeentry_timesheet">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_timeentry->timesheet->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_timeentry->timesheet->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_timeentry->timesheet->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_timeentry->created->Visible) { // created ?>
	<?php if ($employee_timeentry->sortUrl($employee_timeentry->created) == "") { ?>
		<th data-name="created" class="<?php echo $employee_timeentry->created->headerCellClass() ?>"><div id="elh_employee_timeentry_created" class="employee_timeentry_created"><div class="ew-table-header-caption"><?php echo $employee_timeentry->created->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="created" class="<?php echo $employee_timeentry->created->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_timeentry->SortUrl($employee_timeentry->created) ?>',1);"><div id="elh_employee_timeentry_created" class="employee_timeentry_created">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_timeentry->created->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_timeentry->created->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_timeentry->created->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_timeentry->date_start->Visible) { // date_start ?>
	<?php if ($employee_timeentry->sortUrl($employee_timeentry->date_start) == "") { ?>
		<th data-name="date_start" class="<?php echo $employee_timeentry->date_start->headerCellClass() ?>"><div id="elh_employee_timeentry_date_start" class="employee_timeentry_date_start"><div class="ew-table-header-caption"><?php echo $employee_timeentry->date_start->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="date_start" class="<?php echo $employee_timeentry->date_start->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_timeentry->SortUrl($employee_timeentry->date_start) ?>',1);"><div id="elh_employee_timeentry_date_start" class="employee_timeentry_date_start">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_timeentry->date_start->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_timeentry->date_start->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_timeentry->date_start->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_timeentry->time_start->Visible) { // time_start ?>
	<?php if ($employee_timeentry->sortUrl($employee_timeentry->time_start) == "") { ?>
		<th data-name="time_start" class="<?php echo $employee_timeentry->time_start->headerCellClass() ?>"><div id="elh_employee_timeentry_time_start" class="employee_timeentry_time_start"><div class="ew-table-header-caption"><?php echo $employee_timeentry->time_start->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="time_start" class="<?php echo $employee_timeentry->time_start->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_timeentry->SortUrl($employee_timeentry->time_start) ?>',1);"><div id="elh_employee_timeentry_time_start" class="employee_timeentry_time_start">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_timeentry->time_start->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee_timeentry->time_start->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_timeentry->time_start->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_timeentry->date_end->Visible) { // date_end ?>
	<?php if ($employee_timeentry->sortUrl($employee_timeentry->date_end) == "") { ?>
		<th data-name="date_end" class="<?php echo $employee_timeentry->date_end->headerCellClass() ?>"><div id="elh_employee_timeentry_date_end" class="employee_timeentry_date_end"><div class="ew-table-header-caption"><?php echo $employee_timeentry->date_end->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="date_end" class="<?php echo $employee_timeentry->date_end->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_timeentry->SortUrl($employee_timeentry->date_end) ?>',1);"><div id="elh_employee_timeentry_date_end" class="employee_timeentry_date_end">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_timeentry->date_end->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_timeentry->date_end->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_timeentry->date_end->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_timeentry->time_end->Visible) { // time_end ?>
	<?php if ($employee_timeentry->sortUrl($employee_timeentry->time_end) == "") { ?>
		<th data-name="time_end" class="<?php echo $employee_timeentry->time_end->headerCellClass() ?>"><div id="elh_employee_timeentry_time_end" class="employee_timeentry_time_end"><div class="ew-table-header-caption"><?php echo $employee_timeentry->time_end->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="time_end" class="<?php echo $employee_timeentry->time_end->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_timeentry->SortUrl($employee_timeentry->time_end) ?>',1);"><div id="elh_employee_timeentry_time_end" class="employee_timeentry_time_end">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_timeentry->time_end->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee_timeentry->time_end->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_timeentry->time_end->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_timeentry->status->Visible) { // status ?>
	<?php if ($employee_timeentry->sortUrl($employee_timeentry->status) == "") { ?>
		<th data-name="status" class="<?php echo $employee_timeentry->status->headerCellClass() ?>"><div id="elh_employee_timeentry_status" class="employee_timeentry_status"><div class="ew-table-header-caption"><?php echo $employee_timeentry->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $employee_timeentry->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_timeentry->SortUrl($employee_timeentry->status) ?>',1);"><div id="elh_employee_timeentry_status" class="employee_timeentry_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_timeentry->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_timeentry->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_timeentry->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$employee_timeentry_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($employee_timeentry->ExportAll && $employee_timeentry->isExport()) {
	$employee_timeentry_list->StopRec = $employee_timeentry_list->TotalRecs;
} else {

	// Set the last record to display
	if ($employee_timeentry_list->TotalRecs > $employee_timeentry_list->StartRec + $employee_timeentry_list->DisplayRecs - 1)
		$employee_timeentry_list->StopRec = $employee_timeentry_list->StartRec + $employee_timeentry_list->DisplayRecs - 1;
	else
		$employee_timeentry_list->StopRec = $employee_timeentry_list->TotalRecs;
}
$employee_timeentry_list->RecCnt = $employee_timeentry_list->StartRec - 1;
if ($employee_timeentry_list->Recordset && !$employee_timeentry_list->Recordset->EOF) {
	$employee_timeentry_list->Recordset->moveFirst();
	$selectLimit = $employee_timeentry_list->UseSelectLimit;
	if (!$selectLimit && $employee_timeentry_list->StartRec > 1)
		$employee_timeentry_list->Recordset->move($employee_timeentry_list->StartRec - 1);
} elseif (!$employee_timeentry->AllowAddDeleteRow && $employee_timeentry_list->StopRec == 0) {
	$employee_timeentry_list->StopRec = $employee_timeentry->GridAddRowCount;
}

// Initialize aggregate
$employee_timeentry->RowType = ROWTYPE_AGGREGATEINIT;
$employee_timeentry->resetAttributes();
$employee_timeentry_list->renderRow();
while ($employee_timeentry_list->RecCnt < $employee_timeentry_list->StopRec) {
	$employee_timeentry_list->RecCnt++;
	if ($employee_timeentry_list->RecCnt >= $employee_timeentry_list->StartRec) {
		$employee_timeentry_list->RowCnt++;

		// Set up key count
		$employee_timeentry_list->KeyCount = $employee_timeentry_list->RowIndex;

		// Init row class and style
		$employee_timeentry->resetAttributes();
		$employee_timeentry->CssClass = "";
		if ($employee_timeentry->isGridAdd()) {
		} else {
			$employee_timeentry_list->loadRowValues($employee_timeentry_list->Recordset); // Load row values
		}
		$employee_timeentry->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$employee_timeentry->RowAttrs = array_merge($employee_timeentry->RowAttrs, array('data-rowindex'=>$employee_timeentry_list->RowCnt, 'id'=>'r' . $employee_timeentry_list->RowCnt . '_employee_timeentry', 'data-rowtype'=>$employee_timeentry->RowType));

		// Render row
		$employee_timeentry_list->renderRow();

		// Render list options
		$employee_timeentry_list->renderListOptions();
?>
	<tr<?php echo $employee_timeentry->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employee_timeentry_list->ListOptions->render("body", "left", $employee_timeentry_list->RowCnt);
?>
	<?php if ($employee_timeentry->id->Visible) { // id ?>
		<td data-name="id"<?php echo $employee_timeentry->id->cellAttributes() ?>>
<span id="el<?php echo $employee_timeentry_list->RowCnt ?>_employee_timeentry_id" class="employee_timeentry_id">
<span<?php echo $employee_timeentry->id->viewAttributes() ?>>
<?php echo $employee_timeentry->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_timeentry->project->Visible) { // project ?>
		<td data-name="project"<?php echo $employee_timeentry->project->cellAttributes() ?>>
<span id="el<?php echo $employee_timeentry_list->RowCnt ?>_employee_timeentry_project" class="employee_timeentry_project">
<span<?php echo $employee_timeentry->project->viewAttributes() ?>>
<?php echo $employee_timeentry->project->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_timeentry->employee->Visible) { // employee ?>
		<td data-name="employee"<?php echo $employee_timeentry->employee->cellAttributes() ?>>
<span id="el<?php echo $employee_timeentry_list->RowCnt ?>_employee_timeentry_employee" class="employee_timeentry_employee">
<span<?php echo $employee_timeentry->employee->viewAttributes() ?>>
<?php echo $employee_timeentry->employee->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_timeentry->timesheet->Visible) { // timesheet ?>
		<td data-name="timesheet"<?php echo $employee_timeentry->timesheet->cellAttributes() ?>>
<span id="el<?php echo $employee_timeentry_list->RowCnt ?>_employee_timeentry_timesheet" class="employee_timeentry_timesheet">
<span<?php echo $employee_timeentry->timesheet->viewAttributes() ?>>
<?php echo $employee_timeentry->timesheet->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_timeentry->created->Visible) { // created ?>
		<td data-name="created"<?php echo $employee_timeentry->created->cellAttributes() ?>>
<span id="el<?php echo $employee_timeentry_list->RowCnt ?>_employee_timeentry_created" class="employee_timeentry_created">
<span<?php echo $employee_timeentry->created->viewAttributes() ?>>
<?php echo $employee_timeentry->created->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_timeentry->date_start->Visible) { // date_start ?>
		<td data-name="date_start"<?php echo $employee_timeentry->date_start->cellAttributes() ?>>
<span id="el<?php echo $employee_timeentry_list->RowCnt ?>_employee_timeentry_date_start" class="employee_timeentry_date_start">
<span<?php echo $employee_timeentry->date_start->viewAttributes() ?>>
<?php echo $employee_timeentry->date_start->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_timeentry->time_start->Visible) { // time_start ?>
		<td data-name="time_start"<?php echo $employee_timeentry->time_start->cellAttributes() ?>>
<span id="el<?php echo $employee_timeentry_list->RowCnt ?>_employee_timeentry_time_start" class="employee_timeentry_time_start">
<span<?php echo $employee_timeentry->time_start->viewAttributes() ?>>
<?php echo $employee_timeentry->time_start->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_timeentry->date_end->Visible) { // date_end ?>
		<td data-name="date_end"<?php echo $employee_timeentry->date_end->cellAttributes() ?>>
<span id="el<?php echo $employee_timeentry_list->RowCnt ?>_employee_timeentry_date_end" class="employee_timeentry_date_end">
<span<?php echo $employee_timeentry->date_end->viewAttributes() ?>>
<?php echo $employee_timeentry->date_end->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_timeentry->time_end->Visible) { // time_end ?>
		<td data-name="time_end"<?php echo $employee_timeentry->time_end->cellAttributes() ?>>
<span id="el<?php echo $employee_timeentry_list->RowCnt ?>_employee_timeentry_time_end" class="employee_timeentry_time_end">
<span<?php echo $employee_timeentry->time_end->viewAttributes() ?>>
<?php echo $employee_timeentry->time_end->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_timeentry->status->Visible) { // status ?>
		<td data-name="status"<?php echo $employee_timeentry->status->cellAttributes() ?>>
<span id="el<?php echo $employee_timeentry_list->RowCnt ?>_employee_timeentry_status" class="employee_timeentry_status">
<span<?php echo $employee_timeentry->status->viewAttributes() ?>>
<?php echo $employee_timeentry->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$employee_timeentry_list->ListOptions->render("body", "right", $employee_timeentry_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$employee_timeentry->isGridAdd())
		$employee_timeentry_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$employee_timeentry->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($employee_timeentry_list->Recordset)
	$employee_timeentry_list->Recordset->Close();
?>
<?php if (!$employee_timeentry->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$employee_timeentry->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($employee_timeentry_list->Pager)) $employee_timeentry_list->Pager = new NumericPager($employee_timeentry_list->StartRec, $employee_timeentry_list->DisplayRecs, $employee_timeentry_list->TotalRecs, $employee_timeentry_list->RecRange, $employee_timeentry_list->AutoHidePager) ?>
<?php if ($employee_timeentry_list->Pager->RecordCount > 0 && $employee_timeentry_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($employee_timeentry_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_timeentry_list->pageUrl() ?>start=<?php echo $employee_timeentry_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($employee_timeentry_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_timeentry_list->pageUrl() ?>start=<?php echo $employee_timeentry_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($employee_timeentry_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $employee_timeentry_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($employee_timeentry_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_timeentry_list->pageUrl() ?>start=<?php echo $employee_timeentry_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($employee_timeentry_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_timeentry_list->pageUrl() ?>start=<?php echo $employee_timeentry_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($employee_timeentry_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $employee_timeentry_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $employee_timeentry_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $employee_timeentry_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($employee_timeentry_list->TotalRecs > 0 && (!$employee_timeentry_list->AutoHidePageSizeSelector || $employee_timeentry_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="employee_timeentry">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($employee_timeentry_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($employee_timeentry_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($employee_timeentry_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($employee_timeentry_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($employee_timeentry_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($employee_timeentry_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($employee_timeentry->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $employee_timeentry_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($employee_timeentry_list->TotalRecs == 0 && !$employee_timeentry->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $employee_timeentry_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$employee_timeentry_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$employee_timeentry->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$employee_timeentry->isExport()) { ?>
<script>
ew.scrollableTable("gmp_employee_timeentry", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$employee_timeentry_list->terminate();
?>