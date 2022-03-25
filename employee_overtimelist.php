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
$employee_overtime_list = new employee_overtime_list();

// Run the page
$employee_overtime_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_overtime_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$employee_overtime->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var femployee_overtimelist = currentForm = new ew.Form("femployee_overtimelist", "list");
femployee_overtimelist.formKeyCountName = '<?php echo $employee_overtime_list->FormKeyCountName ?>';

// Form_CustomValidate event
femployee_overtimelist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_overtimelist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_overtimelist.lists["x_status"] = <?php echo $employee_overtime_list->status->Lookup->toClientList() ?>;
femployee_overtimelist.lists["x_status"].options = <?php echo JsonEncode($employee_overtime_list->status->options(FALSE, TRUE)) ?>;

// Form object for search
var femployee_overtimelistsrch = currentSearchForm = new ew.Form("femployee_overtimelistsrch");

// Validate function for search
femployee_overtimelistsrch.validate = function(fobj) {
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
femployee_overtimelistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_overtimelistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_overtimelistsrch.lists["x_status"] = <?php echo $employee_overtime_list->status->Lookup->toClientList() ?>;
femployee_overtimelistsrch.lists["x_status"].options = <?php echo JsonEncode($employee_overtime_list->status->options(FALSE, TRUE)) ?>;

// Filters
femployee_overtimelistsrch.filterList = <?php echo $employee_overtime_list->getFilterList() ?>;
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
<?php if (!$employee_overtime->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($employee_overtime_list->TotalRecs > 0 && $employee_overtime_list->ExportOptions->visible()) { ?>
<?php $employee_overtime_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($employee_overtime_list->ImportOptions->visible()) { ?>
<?php $employee_overtime_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($employee_overtime_list->SearchOptions->visible()) { ?>
<?php $employee_overtime_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($employee_overtime_list->FilterOptions->visible()) { ?>
<?php $employee_overtime_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$employee_overtime_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$employee_overtime->isExport() && !$employee_overtime->CurrentAction) { ?>
<form name="femployee_overtimelistsrch" id="femployee_overtimelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($employee_overtime_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="femployee_overtimelistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="employee_overtime">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$employee_overtime_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$employee_overtime->RowType = ROWTYPE_SEARCH;

// Render row
$employee_overtime->resetAttributes();
$employee_overtime_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($employee_overtime->status->Visible) { // status ?>
	<div id="xsc_status" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $employee_overtime->status->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_status" id="z_status" value="="></span>
		<span class="ew-search-field">
<div id="tp_x_status" class="ew-template"><input type="radio" class="form-check-input" data-table="employee_overtime" data-field="x_status" data-value-separator="<?php echo $employee_overtime->status->displayValueSeparatorAttribute() ?>" name="x_status" id="x_status" value="{value}"<?php echo $employee_overtime->status->editAttributes() ?>></div>
<div id="dsl_x_status" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $employee_overtime->status->radioButtonListHtml(FALSE, "x_status") ?>
</div></div>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
	<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $employee_overtime_list->showPageHeader(); ?>
<?php
$employee_overtime_list->showMessage();
?>
<?php if ($employee_overtime_list->TotalRecs > 0 || $employee_overtime->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($employee_overtime_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> employee_overtime">
<?php if (!$employee_overtime->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$employee_overtime->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($employee_overtime_list->Pager)) $employee_overtime_list->Pager = new NumericPager($employee_overtime_list->StartRec, $employee_overtime_list->DisplayRecs, $employee_overtime_list->TotalRecs, $employee_overtime_list->RecRange, $employee_overtime_list->AutoHidePager) ?>
<?php if ($employee_overtime_list->Pager->RecordCount > 0 && $employee_overtime_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($employee_overtime_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_overtime_list->pageUrl() ?>start=<?php echo $employee_overtime_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($employee_overtime_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_overtime_list->pageUrl() ?>start=<?php echo $employee_overtime_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($employee_overtime_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $employee_overtime_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($employee_overtime_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_overtime_list->pageUrl() ?>start=<?php echo $employee_overtime_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($employee_overtime_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_overtime_list->pageUrl() ?>start=<?php echo $employee_overtime_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($employee_overtime_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $employee_overtime_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $employee_overtime_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $employee_overtime_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($employee_overtime_list->TotalRecs > 0 && (!$employee_overtime_list->AutoHidePageSizeSelector || $employee_overtime_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="employee_overtime">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($employee_overtime_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($employee_overtime_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($employee_overtime_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($employee_overtime_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($employee_overtime_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($employee_overtime_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($employee_overtime->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $employee_overtime_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="femployee_overtimelist" id="femployee_overtimelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_overtime_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_overtime_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_overtime">
<div id="gmp_employee_overtime" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($employee_overtime_list->TotalRecs > 0 || $employee_overtime->isGridEdit()) { ?>
<table id="tbl_employee_overtimelist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$employee_overtime_list->RowType = ROWTYPE_HEADER;

// Render list options
$employee_overtime_list->renderListOptions();

// Render list options (header, left)
$employee_overtime_list->ListOptions->render("header", "left");
?>
<?php if ($employee_overtime->id->Visible) { // id ?>
	<?php if ($employee_overtime->sortUrl($employee_overtime->id) == "") { ?>
		<th data-name="id" class="<?php echo $employee_overtime->id->headerCellClass() ?>"><div id="elh_employee_overtime_id" class="employee_overtime_id"><div class="ew-table-header-caption"><?php echo $employee_overtime->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $employee_overtime->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_overtime->SortUrl($employee_overtime->id) ?>',1);"><div id="elh_employee_overtime_id" class="employee_overtime_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_overtime->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_overtime->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_overtime->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_overtime->employee->Visible) { // employee ?>
	<?php if ($employee_overtime->sortUrl($employee_overtime->employee) == "") { ?>
		<th data-name="employee" class="<?php echo $employee_overtime->employee->headerCellClass() ?>"><div id="elh_employee_overtime_employee" class="employee_overtime_employee"><div class="ew-table-header-caption"><?php echo $employee_overtime->employee->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="employee" class="<?php echo $employee_overtime->employee->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_overtime->SortUrl($employee_overtime->employee) ?>',1);"><div id="elh_employee_overtime_employee" class="employee_overtime_employee">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_overtime->employee->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_overtime->employee->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_overtime->employee->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_overtime->start_time->Visible) { // start_time ?>
	<?php if ($employee_overtime->sortUrl($employee_overtime->start_time) == "") { ?>
		<th data-name="start_time" class="<?php echo $employee_overtime->start_time->headerCellClass() ?>"><div id="elh_employee_overtime_start_time" class="employee_overtime_start_time"><div class="ew-table-header-caption"><?php echo $employee_overtime->start_time->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="start_time" class="<?php echo $employee_overtime->start_time->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_overtime->SortUrl($employee_overtime->start_time) ?>',1);"><div id="elh_employee_overtime_start_time" class="employee_overtime_start_time">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_overtime->start_time->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_overtime->start_time->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_overtime->start_time->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_overtime->end_time->Visible) { // end_time ?>
	<?php if ($employee_overtime->sortUrl($employee_overtime->end_time) == "") { ?>
		<th data-name="end_time" class="<?php echo $employee_overtime->end_time->headerCellClass() ?>"><div id="elh_employee_overtime_end_time" class="employee_overtime_end_time"><div class="ew-table-header-caption"><?php echo $employee_overtime->end_time->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="end_time" class="<?php echo $employee_overtime->end_time->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_overtime->SortUrl($employee_overtime->end_time) ?>',1);"><div id="elh_employee_overtime_end_time" class="employee_overtime_end_time">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_overtime->end_time->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_overtime->end_time->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_overtime->end_time->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_overtime->category->Visible) { // category ?>
	<?php if ($employee_overtime->sortUrl($employee_overtime->category) == "") { ?>
		<th data-name="category" class="<?php echo $employee_overtime->category->headerCellClass() ?>"><div id="elh_employee_overtime_category" class="employee_overtime_category"><div class="ew-table-header-caption"><?php echo $employee_overtime->category->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="category" class="<?php echo $employee_overtime->category->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_overtime->SortUrl($employee_overtime->category) ?>',1);"><div id="elh_employee_overtime_category" class="employee_overtime_category">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_overtime->category->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_overtime->category->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_overtime->category->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_overtime->project->Visible) { // project ?>
	<?php if ($employee_overtime->sortUrl($employee_overtime->project) == "") { ?>
		<th data-name="project" class="<?php echo $employee_overtime->project->headerCellClass() ?>"><div id="elh_employee_overtime_project" class="employee_overtime_project"><div class="ew-table-header-caption"><?php echo $employee_overtime->project->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="project" class="<?php echo $employee_overtime->project->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_overtime->SortUrl($employee_overtime->project) ?>',1);"><div id="elh_employee_overtime_project" class="employee_overtime_project">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_overtime->project->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_overtime->project->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_overtime->project->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_overtime->created->Visible) { // created ?>
	<?php if ($employee_overtime->sortUrl($employee_overtime->created) == "") { ?>
		<th data-name="created" class="<?php echo $employee_overtime->created->headerCellClass() ?>"><div id="elh_employee_overtime_created" class="employee_overtime_created"><div class="ew-table-header-caption"><?php echo $employee_overtime->created->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="created" class="<?php echo $employee_overtime->created->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_overtime->SortUrl($employee_overtime->created) ?>',1);"><div id="elh_employee_overtime_created" class="employee_overtime_created">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_overtime->created->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_overtime->created->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_overtime->created->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_overtime->updated->Visible) { // updated ?>
	<?php if ($employee_overtime->sortUrl($employee_overtime->updated) == "") { ?>
		<th data-name="updated" class="<?php echo $employee_overtime->updated->headerCellClass() ?>"><div id="elh_employee_overtime_updated" class="employee_overtime_updated"><div class="ew-table-header-caption"><?php echo $employee_overtime->updated->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="updated" class="<?php echo $employee_overtime->updated->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_overtime->SortUrl($employee_overtime->updated) ?>',1);"><div id="elh_employee_overtime_updated" class="employee_overtime_updated">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_overtime->updated->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_overtime->updated->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_overtime->updated->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_overtime->status->Visible) { // status ?>
	<?php if ($employee_overtime->sortUrl($employee_overtime->status) == "") { ?>
		<th data-name="status" class="<?php echo $employee_overtime->status->headerCellClass() ?>"><div id="elh_employee_overtime_status" class="employee_overtime_status"><div class="ew-table-header-caption"><?php echo $employee_overtime->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $employee_overtime->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_overtime->SortUrl($employee_overtime->status) ?>',1);"><div id="elh_employee_overtime_status" class="employee_overtime_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_overtime->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_overtime->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_overtime->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$employee_overtime_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($employee_overtime->ExportAll && $employee_overtime->isExport()) {
	$employee_overtime_list->StopRec = $employee_overtime_list->TotalRecs;
} else {

	// Set the last record to display
	if ($employee_overtime_list->TotalRecs > $employee_overtime_list->StartRec + $employee_overtime_list->DisplayRecs - 1)
		$employee_overtime_list->StopRec = $employee_overtime_list->StartRec + $employee_overtime_list->DisplayRecs - 1;
	else
		$employee_overtime_list->StopRec = $employee_overtime_list->TotalRecs;
}
$employee_overtime_list->RecCnt = $employee_overtime_list->StartRec - 1;
if ($employee_overtime_list->Recordset && !$employee_overtime_list->Recordset->EOF) {
	$employee_overtime_list->Recordset->moveFirst();
	$selectLimit = $employee_overtime_list->UseSelectLimit;
	if (!$selectLimit && $employee_overtime_list->StartRec > 1)
		$employee_overtime_list->Recordset->move($employee_overtime_list->StartRec - 1);
} elseif (!$employee_overtime->AllowAddDeleteRow && $employee_overtime_list->StopRec == 0) {
	$employee_overtime_list->StopRec = $employee_overtime->GridAddRowCount;
}

// Initialize aggregate
$employee_overtime->RowType = ROWTYPE_AGGREGATEINIT;
$employee_overtime->resetAttributes();
$employee_overtime_list->renderRow();
while ($employee_overtime_list->RecCnt < $employee_overtime_list->StopRec) {
	$employee_overtime_list->RecCnt++;
	if ($employee_overtime_list->RecCnt >= $employee_overtime_list->StartRec) {
		$employee_overtime_list->RowCnt++;

		// Set up key count
		$employee_overtime_list->KeyCount = $employee_overtime_list->RowIndex;

		// Init row class and style
		$employee_overtime->resetAttributes();
		$employee_overtime->CssClass = "";
		if ($employee_overtime->isGridAdd()) {
		} else {
			$employee_overtime_list->loadRowValues($employee_overtime_list->Recordset); // Load row values
		}
		$employee_overtime->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$employee_overtime->RowAttrs = array_merge($employee_overtime->RowAttrs, array('data-rowindex'=>$employee_overtime_list->RowCnt, 'id'=>'r' . $employee_overtime_list->RowCnt . '_employee_overtime', 'data-rowtype'=>$employee_overtime->RowType));

		// Render row
		$employee_overtime_list->renderRow();

		// Render list options
		$employee_overtime_list->renderListOptions();
?>
	<tr<?php echo $employee_overtime->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employee_overtime_list->ListOptions->render("body", "left", $employee_overtime_list->RowCnt);
?>
	<?php if ($employee_overtime->id->Visible) { // id ?>
		<td data-name="id"<?php echo $employee_overtime->id->cellAttributes() ?>>
<span id="el<?php echo $employee_overtime_list->RowCnt ?>_employee_overtime_id" class="employee_overtime_id">
<span<?php echo $employee_overtime->id->viewAttributes() ?>>
<?php echo $employee_overtime->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_overtime->employee->Visible) { // employee ?>
		<td data-name="employee"<?php echo $employee_overtime->employee->cellAttributes() ?>>
<span id="el<?php echo $employee_overtime_list->RowCnt ?>_employee_overtime_employee" class="employee_overtime_employee">
<span<?php echo $employee_overtime->employee->viewAttributes() ?>>
<?php echo $employee_overtime->employee->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_overtime->start_time->Visible) { // start_time ?>
		<td data-name="start_time"<?php echo $employee_overtime->start_time->cellAttributes() ?>>
<span id="el<?php echo $employee_overtime_list->RowCnt ?>_employee_overtime_start_time" class="employee_overtime_start_time">
<span<?php echo $employee_overtime->start_time->viewAttributes() ?>>
<?php echo $employee_overtime->start_time->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_overtime->end_time->Visible) { // end_time ?>
		<td data-name="end_time"<?php echo $employee_overtime->end_time->cellAttributes() ?>>
<span id="el<?php echo $employee_overtime_list->RowCnt ?>_employee_overtime_end_time" class="employee_overtime_end_time">
<span<?php echo $employee_overtime->end_time->viewAttributes() ?>>
<?php echo $employee_overtime->end_time->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_overtime->category->Visible) { // category ?>
		<td data-name="category"<?php echo $employee_overtime->category->cellAttributes() ?>>
<span id="el<?php echo $employee_overtime_list->RowCnt ?>_employee_overtime_category" class="employee_overtime_category">
<span<?php echo $employee_overtime->category->viewAttributes() ?>>
<?php echo $employee_overtime->category->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_overtime->project->Visible) { // project ?>
		<td data-name="project"<?php echo $employee_overtime->project->cellAttributes() ?>>
<span id="el<?php echo $employee_overtime_list->RowCnt ?>_employee_overtime_project" class="employee_overtime_project">
<span<?php echo $employee_overtime->project->viewAttributes() ?>>
<?php echo $employee_overtime->project->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_overtime->created->Visible) { // created ?>
		<td data-name="created"<?php echo $employee_overtime->created->cellAttributes() ?>>
<span id="el<?php echo $employee_overtime_list->RowCnt ?>_employee_overtime_created" class="employee_overtime_created">
<span<?php echo $employee_overtime->created->viewAttributes() ?>>
<?php echo $employee_overtime->created->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_overtime->updated->Visible) { // updated ?>
		<td data-name="updated"<?php echo $employee_overtime->updated->cellAttributes() ?>>
<span id="el<?php echo $employee_overtime_list->RowCnt ?>_employee_overtime_updated" class="employee_overtime_updated">
<span<?php echo $employee_overtime->updated->viewAttributes() ?>>
<?php echo $employee_overtime->updated->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_overtime->status->Visible) { // status ?>
		<td data-name="status"<?php echo $employee_overtime->status->cellAttributes() ?>>
<span id="el<?php echo $employee_overtime_list->RowCnt ?>_employee_overtime_status" class="employee_overtime_status">
<span<?php echo $employee_overtime->status->viewAttributes() ?>>
<?php echo $employee_overtime->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$employee_overtime_list->ListOptions->render("body", "right", $employee_overtime_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$employee_overtime->isGridAdd())
		$employee_overtime_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$employee_overtime->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($employee_overtime_list->Recordset)
	$employee_overtime_list->Recordset->Close();
?>
<?php if (!$employee_overtime->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$employee_overtime->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($employee_overtime_list->Pager)) $employee_overtime_list->Pager = new NumericPager($employee_overtime_list->StartRec, $employee_overtime_list->DisplayRecs, $employee_overtime_list->TotalRecs, $employee_overtime_list->RecRange, $employee_overtime_list->AutoHidePager) ?>
<?php if ($employee_overtime_list->Pager->RecordCount > 0 && $employee_overtime_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($employee_overtime_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_overtime_list->pageUrl() ?>start=<?php echo $employee_overtime_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($employee_overtime_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_overtime_list->pageUrl() ?>start=<?php echo $employee_overtime_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($employee_overtime_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $employee_overtime_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($employee_overtime_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_overtime_list->pageUrl() ?>start=<?php echo $employee_overtime_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($employee_overtime_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_overtime_list->pageUrl() ?>start=<?php echo $employee_overtime_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($employee_overtime_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $employee_overtime_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $employee_overtime_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $employee_overtime_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($employee_overtime_list->TotalRecs > 0 && (!$employee_overtime_list->AutoHidePageSizeSelector || $employee_overtime_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="employee_overtime">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($employee_overtime_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($employee_overtime_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($employee_overtime_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($employee_overtime_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($employee_overtime_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($employee_overtime_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($employee_overtime->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $employee_overtime_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($employee_overtime_list->TotalRecs == 0 && !$employee_overtime->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $employee_overtime_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$employee_overtime_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$employee_overtime->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$employee_overtime->isExport()) { ?>
<script>
ew.scrollableTable("gmp_employee_overtime", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$employee_overtime_list->terminate();
?>