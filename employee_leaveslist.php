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
$employee_leaves_list = new employee_leaves_list();

// Run the page
$employee_leaves_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_leaves_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$employee_leaves->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var femployee_leaveslist = currentForm = new ew.Form("femployee_leaveslist", "list");
femployee_leaveslist.formKeyCountName = '<?php echo $employee_leaves_list->FormKeyCountName ?>';

// Form_CustomValidate event
femployee_leaveslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_leaveslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_leaveslist.lists["x_status"] = <?php echo $employee_leaves_list->status->Lookup->toClientList() ?>;
femployee_leaveslist.lists["x_status"].options = <?php echo JsonEncode($employee_leaves_list->status->options(FALSE, TRUE)) ?>;

// Form object for search
var femployee_leaveslistsrch = currentSearchForm = new ew.Form("femployee_leaveslistsrch");

// Validate function for search
femployee_leaveslistsrch.validate = function(fobj) {
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
femployee_leaveslistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_leaveslistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_leaveslistsrch.lists["x_status"] = <?php echo $employee_leaves_list->status->Lookup->toClientList() ?>;
femployee_leaveslistsrch.lists["x_status"].options = <?php echo JsonEncode($employee_leaves_list->status->options(FALSE, TRUE)) ?>;

// Filters
femployee_leaveslistsrch.filterList = <?php echo $employee_leaves_list->getFilterList() ?>;
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
<?php if (!$employee_leaves->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($employee_leaves_list->TotalRecs > 0 && $employee_leaves_list->ExportOptions->visible()) { ?>
<?php $employee_leaves_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($employee_leaves_list->ImportOptions->visible()) { ?>
<?php $employee_leaves_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($employee_leaves_list->SearchOptions->visible()) { ?>
<?php $employee_leaves_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($employee_leaves_list->FilterOptions->visible()) { ?>
<?php $employee_leaves_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$employee_leaves_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$employee_leaves->isExport() && !$employee_leaves->CurrentAction) { ?>
<form name="femployee_leaveslistsrch" id="femployee_leaveslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($employee_leaves_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="femployee_leaveslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="employee_leaves">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$employee_leaves_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$employee_leaves->RowType = ROWTYPE_SEARCH;

// Render row
$employee_leaves->resetAttributes();
$employee_leaves_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($employee_leaves->status->Visible) { // status ?>
	<div id="xsc_status" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $employee_leaves->status->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_status" id="z_status" value="="></span>
		<span class="ew-search-field">
<div id="tp_x_status" class="ew-template"><input type="radio" class="form-check-input" data-table="employee_leaves" data-field="x_status" data-value-separator="<?php echo $employee_leaves->status->displayValueSeparatorAttribute() ?>" name="x_status" id="x_status" value="{value}"<?php echo $employee_leaves->status->editAttributes() ?>></div>
<div id="dsl_x_status" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $employee_leaves->status->radioButtonListHtml(FALSE, "x_status") ?>
</div></div>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($employee_leaves_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($employee_leaves_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $employee_leaves_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($employee_leaves_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($employee_leaves_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($employee_leaves_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($employee_leaves_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $employee_leaves_list->showPageHeader(); ?>
<?php
$employee_leaves_list->showMessage();
?>
<?php if ($employee_leaves_list->TotalRecs > 0 || $employee_leaves->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($employee_leaves_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> employee_leaves">
<?php if (!$employee_leaves->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$employee_leaves->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($employee_leaves_list->Pager)) $employee_leaves_list->Pager = new NumericPager($employee_leaves_list->StartRec, $employee_leaves_list->DisplayRecs, $employee_leaves_list->TotalRecs, $employee_leaves_list->RecRange, $employee_leaves_list->AutoHidePager) ?>
<?php if ($employee_leaves_list->Pager->RecordCount > 0 && $employee_leaves_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($employee_leaves_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_leaves_list->pageUrl() ?>start=<?php echo $employee_leaves_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($employee_leaves_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_leaves_list->pageUrl() ?>start=<?php echo $employee_leaves_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($employee_leaves_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $employee_leaves_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($employee_leaves_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_leaves_list->pageUrl() ?>start=<?php echo $employee_leaves_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($employee_leaves_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_leaves_list->pageUrl() ?>start=<?php echo $employee_leaves_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($employee_leaves_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $employee_leaves_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $employee_leaves_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $employee_leaves_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($employee_leaves_list->TotalRecs > 0 && (!$employee_leaves_list->AutoHidePageSizeSelector || $employee_leaves_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="employee_leaves">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($employee_leaves_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($employee_leaves_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($employee_leaves_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($employee_leaves_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($employee_leaves_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($employee_leaves_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($employee_leaves->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $employee_leaves_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="femployee_leaveslist" id="femployee_leaveslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_leaves_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_leaves_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_leaves">
<div id="gmp_employee_leaves" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($employee_leaves_list->TotalRecs > 0 || $employee_leaves->isGridEdit()) { ?>
<table id="tbl_employee_leaveslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$employee_leaves_list->RowType = ROWTYPE_HEADER;

// Render list options
$employee_leaves_list->renderListOptions();

// Render list options (header, left)
$employee_leaves_list->ListOptions->render("header", "left");
?>
<?php if ($employee_leaves->id->Visible) { // id ?>
	<?php if ($employee_leaves->sortUrl($employee_leaves->id) == "") { ?>
		<th data-name="id" class="<?php echo $employee_leaves->id->headerCellClass() ?>"><div id="elh_employee_leaves_id" class="employee_leaves_id"><div class="ew-table-header-caption"><?php echo $employee_leaves->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $employee_leaves->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_leaves->SortUrl($employee_leaves->id) ?>',1);"><div id="elh_employee_leaves_id" class="employee_leaves_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_leaves->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_leaves->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_leaves->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_leaves->employee->Visible) { // employee ?>
	<?php if ($employee_leaves->sortUrl($employee_leaves->employee) == "") { ?>
		<th data-name="employee" class="<?php echo $employee_leaves->employee->headerCellClass() ?>"><div id="elh_employee_leaves_employee" class="employee_leaves_employee"><div class="ew-table-header-caption"><?php echo $employee_leaves->employee->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="employee" class="<?php echo $employee_leaves->employee->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_leaves->SortUrl($employee_leaves->employee) ?>',1);"><div id="elh_employee_leaves_employee" class="employee_leaves_employee">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_leaves->employee->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_leaves->employee->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_leaves->employee->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_leaves->leave_type->Visible) { // leave_type ?>
	<?php if ($employee_leaves->sortUrl($employee_leaves->leave_type) == "") { ?>
		<th data-name="leave_type" class="<?php echo $employee_leaves->leave_type->headerCellClass() ?>"><div id="elh_employee_leaves_leave_type" class="employee_leaves_leave_type"><div class="ew-table-header-caption"><?php echo $employee_leaves->leave_type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="leave_type" class="<?php echo $employee_leaves->leave_type->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_leaves->SortUrl($employee_leaves->leave_type) ?>',1);"><div id="elh_employee_leaves_leave_type" class="employee_leaves_leave_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_leaves->leave_type->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_leaves->leave_type->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_leaves->leave_type->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_leaves->leave_period->Visible) { // leave_period ?>
	<?php if ($employee_leaves->sortUrl($employee_leaves->leave_period) == "") { ?>
		<th data-name="leave_period" class="<?php echo $employee_leaves->leave_period->headerCellClass() ?>"><div id="elh_employee_leaves_leave_period" class="employee_leaves_leave_period"><div class="ew-table-header-caption"><?php echo $employee_leaves->leave_period->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="leave_period" class="<?php echo $employee_leaves->leave_period->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_leaves->SortUrl($employee_leaves->leave_period) ?>',1);"><div id="elh_employee_leaves_leave_period" class="employee_leaves_leave_period">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_leaves->leave_period->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_leaves->leave_period->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_leaves->leave_period->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_leaves->date_start->Visible) { // date_start ?>
	<?php if ($employee_leaves->sortUrl($employee_leaves->date_start) == "") { ?>
		<th data-name="date_start" class="<?php echo $employee_leaves->date_start->headerCellClass() ?>"><div id="elh_employee_leaves_date_start" class="employee_leaves_date_start"><div class="ew-table-header-caption"><?php echo $employee_leaves->date_start->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="date_start" class="<?php echo $employee_leaves->date_start->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_leaves->SortUrl($employee_leaves->date_start) ?>',1);"><div id="elh_employee_leaves_date_start" class="employee_leaves_date_start">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_leaves->date_start->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_leaves->date_start->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_leaves->date_start->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_leaves->date_end->Visible) { // date_end ?>
	<?php if ($employee_leaves->sortUrl($employee_leaves->date_end) == "") { ?>
		<th data-name="date_end" class="<?php echo $employee_leaves->date_end->headerCellClass() ?>"><div id="elh_employee_leaves_date_end" class="employee_leaves_date_end"><div class="ew-table-header-caption"><?php echo $employee_leaves->date_end->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="date_end" class="<?php echo $employee_leaves->date_end->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_leaves->SortUrl($employee_leaves->date_end) ?>',1);"><div id="elh_employee_leaves_date_end" class="employee_leaves_date_end">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_leaves->date_end->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_leaves->date_end->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_leaves->date_end->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_leaves->status->Visible) { // status ?>
	<?php if ($employee_leaves->sortUrl($employee_leaves->status) == "") { ?>
		<th data-name="status" class="<?php echo $employee_leaves->status->headerCellClass() ?>"><div id="elh_employee_leaves_status" class="employee_leaves_status"><div class="ew-table-header-caption"><?php echo $employee_leaves->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $employee_leaves->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_leaves->SortUrl($employee_leaves->status) ?>',1);"><div id="elh_employee_leaves_status" class="employee_leaves_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_leaves->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_leaves->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_leaves->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_leaves->attachment->Visible) { // attachment ?>
	<?php if ($employee_leaves->sortUrl($employee_leaves->attachment) == "") { ?>
		<th data-name="attachment" class="<?php echo $employee_leaves->attachment->headerCellClass() ?>"><div id="elh_employee_leaves_attachment" class="employee_leaves_attachment"><div class="ew-table-header-caption"><?php echo $employee_leaves->attachment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="attachment" class="<?php echo $employee_leaves->attachment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_leaves->SortUrl($employee_leaves->attachment) ?>',1);"><div id="elh_employee_leaves_attachment" class="employee_leaves_attachment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_leaves->attachment->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($employee_leaves->attachment->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_leaves->attachment->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$employee_leaves_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($employee_leaves->ExportAll && $employee_leaves->isExport()) {
	$employee_leaves_list->StopRec = $employee_leaves_list->TotalRecs;
} else {

	// Set the last record to display
	if ($employee_leaves_list->TotalRecs > $employee_leaves_list->StartRec + $employee_leaves_list->DisplayRecs - 1)
		$employee_leaves_list->StopRec = $employee_leaves_list->StartRec + $employee_leaves_list->DisplayRecs - 1;
	else
		$employee_leaves_list->StopRec = $employee_leaves_list->TotalRecs;
}
$employee_leaves_list->RecCnt = $employee_leaves_list->StartRec - 1;
if ($employee_leaves_list->Recordset && !$employee_leaves_list->Recordset->EOF) {
	$employee_leaves_list->Recordset->moveFirst();
	$selectLimit = $employee_leaves_list->UseSelectLimit;
	if (!$selectLimit && $employee_leaves_list->StartRec > 1)
		$employee_leaves_list->Recordset->move($employee_leaves_list->StartRec - 1);
} elseif (!$employee_leaves->AllowAddDeleteRow && $employee_leaves_list->StopRec == 0) {
	$employee_leaves_list->StopRec = $employee_leaves->GridAddRowCount;
}

// Initialize aggregate
$employee_leaves->RowType = ROWTYPE_AGGREGATEINIT;
$employee_leaves->resetAttributes();
$employee_leaves_list->renderRow();
while ($employee_leaves_list->RecCnt < $employee_leaves_list->StopRec) {
	$employee_leaves_list->RecCnt++;
	if ($employee_leaves_list->RecCnt >= $employee_leaves_list->StartRec) {
		$employee_leaves_list->RowCnt++;

		// Set up key count
		$employee_leaves_list->KeyCount = $employee_leaves_list->RowIndex;

		// Init row class and style
		$employee_leaves->resetAttributes();
		$employee_leaves->CssClass = "";
		if ($employee_leaves->isGridAdd()) {
		} else {
			$employee_leaves_list->loadRowValues($employee_leaves_list->Recordset); // Load row values
		}
		$employee_leaves->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$employee_leaves->RowAttrs = array_merge($employee_leaves->RowAttrs, array('data-rowindex'=>$employee_leaves_list->RowCnt, 'id'=>'r' . $employee_leaves_list->RowCnt . '_employee_leaves', 'data-rowtype'=>$employee_leaves->RowType));

		// Render row
		$employee_leaves_list->renderRow();

		// Render list options
		$employee_leaves_list->renderListOptions();
?>
	<tr<?php echo $employee_leaves->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employee_leaves_list->ListOptions->render("body", "left", $employee_leaves_list->RowCnt);
?>
	<?php if ($employee_leaves->id->Visible) { // id ?>
		<td data-name="id"<?php echo $employee_leaves->id->cellAttributes() ?>>
<span id="el<?php echo $employee_leaves_list->RowCnt ?>_employee_leaves_id" class="employee_leaves_id">
<span<?php echo $employee_leaves->id->viewAttributes() ?>>
<?php echo $employee_leaves->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_leaves->employee->Visible) { // employee ?>
		<td data-name="employee"<?php echo $employee_leaves->employee->cellAttributes() ?>>
<span id="el<?php echo $employee_leaves_list->RowCnt ?>_employee_leaves_employee" class="employee_leaves_employee">
<span<?php echo $employee_leaves->employee->viewAttributes() ?>>
<?php echo $employee_leaves->employee->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_leaves->leave_type->Visible) { // leave_type ?>
		<td data-name="leave_type"<?php echo $employee_leaves->leave_type->cellAttributes() ?>>
<span id="el<?php echo $employee_leaves_list->RowCnt ?>_employee_leaves_leave_type" class="employee_leaves_leave_type">
<span<?php echo $employee_leaves->leave_type->viewAttributes() ?>>
<?php echo $employee_leaves->leave_type->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_leaves->leave_period->Visible) { // leave_period ?>
		<td data-name="leave_period"<?php echo $employee_leaves->leave_period->cellAttributes() ?>>
<span id="el<?php echo $employee_leaves_list->RowCnt ?>_employee_leaves_leave_period" class="employee_leaves_leave_period">
<span<?php echo $employee_leaves->leave_period->viewAttributes() ?>>
<?php echo $employee_leaves->leave_period->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_leaves->date_start->Visible) { // date_start ?>
		<td data-name="date_start"<?php echo $employee_leaves->date_start->cellAttributes() ?>>
<span id="el<?php echo $employee_leaves_list->RowCnt ?>_employee_leaves_date_start" class="employee_leaves_date_start">
<span<?php echo $employee_leaves->date_start->viewAttributes() ?>>
<?php echo $employee_leaves->date_start->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_leaves->date_end->Visible) { // date_end ?>
		<td data-name="date_end"<?php echo $employee_leaves->date_end->cellAttributes() ?>>
<span id="el<?php echo $employee_leaves_list->RowCnt ?>_employee_leaves_date_end" class="employee_leaves_date_end">
<span<?php echo $employee_leaves->date_end->viewAttributes() ?>>
<?php echo $employee_leaves->date_end->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_leaves->status->Visible) { // status ?>
		<td data-name="status"<?php echo $employee_leaves->status->cellAttributes() ?>>
<span id="el<?php echo $employee_leaves_list->RowCnt ?>_employee_leaves_status" class="employee_leaves_status">
<span<?php echo $employee_leaves->status->viewAttributes() ?>>
<?php echo $employee_leaves->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_leaves->attachment->Visible) { // attachment ?>
		<td data-name="attachment"<?php echo $employee_leaves->attachment->cellAttributes() ?>>
<span id="el<?php echo $employee_leaves_list->RowCnt ?>_employee_leaves_attachment" class="employee_leaves_attachment">
<span<?php echo $employee_leaves->attachment->viewAttributes() ?>>
<?php echo $employee_leaves->attachment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$employee_leaves_list->ListOptions->render("body", "right", $employee_leaves_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$employee_leaves->isGridAdd())
		$employee_leaves_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$employee_leaves->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($employee_leaves_list->Recordset)
	$employee_leaves_list->Recordset->Close();
?>
<?php if (!$employee_leaves->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$employee_leaves->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($employee_leaves_list->Pager)) $employee_leaves_list->Pager = new NumericPager($employee_leaves_list->StartRec, $employee_leaves_list->DisplayRecs, $employee_leaves_list->TotalRecs, $employee_leaves_list->RecRange, $employee_leaves_list->AutoHidePager) ?>
<?php if ($employee_leaves_list->Pager->RecordCount > 0 && $employee_leaves_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($employee_leaves_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_leaves_list->pageUrl() ?>start=<?php echo $employee_leaves_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($employee_leaves_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_leaves_list->pageUrl() ?>start=<?php echo $employee_leaves_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($employee_leaves_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $employee_leaves_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($employee_leaves_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_leaves_list->pageUrl() ?>start=<?php echo $employee_leaves_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($employee_leaves_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_leaves_list->pageUrl() ?>start=<?php echo $employee_leaves_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($employee_leaves_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $employee_leaves_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $employee_leaves_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $employee_leaves_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($employee_leaves_list->TotalRecs > 0 && (!$employee_leaves_list->AutoHidePageSizeSelector || $employee_leaves_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="employee_leaves">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($employee_leaves_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($employee_leaves_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($employee_leaves_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($employee_leaves_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($employee_leaves_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($employee_leaves_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($employee_leaves->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $employee_leaves_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($employee_leaves_list->TotalRecs == 0 && !$employee_leaves->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $employee_leaves_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$employee_leaves_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$employee_leaves->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$employee_leaves->isExport()) { ?>
<script>
ew.scrollableTable("gmp_employee_leaves", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$employee_leaves_list->terminate();
?>