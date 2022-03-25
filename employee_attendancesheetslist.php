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
$employee_attendancesheets_list = new employee_attendancesheets_list();

// Run the page
$employee_attendancesheets_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_attendancesheets_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$employee_attendancesheets->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var femployee_attendancesheetslist = currentForm = new ew.Form("femployee_attendancesheetslist", "list");
femployee_attendancesheetslist.formKeyCountName = '<?php echo $employee_attendancesheets_list->FormKeyCountName ?>';

// Form_CustomValidate event
femployee_attendancesheetslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_attendancesheetslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_attendancesheetslist.lists["x_status"] = <?php echo $employee_attendancesheets_list->status->Lookup->toClientList() ?>;
femployee_attendancesheetslist.lists["x_status"].options = <?php echo JsonEncode($employee_attendancesheets_list->status->options(FALSE, TRUE)) ?>;

// Form object for search
var femployee_attendancesheetslistsrch = currentSearchForm = new ew.Form("femployee_attendancesheetslistsrch");

// Validate function for search
femployee_attendancesheetslistsrch.validate = function(fobj) {
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
femployee_attendancesheetslistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_attendancesheetslistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_attendancesheetslistsrch.lists["x_status"] = <?php echo $employee_attendancesheets_list->status->Lookup->toClientList() ?>;
femployee_attendancesheetslistsrch.lists["x_status"].options = <?php echo JsonEncode($employee_attendancesheets_list->status->options(FALSE, TRUE)) ?>;

// Filters
femployee_attendancesheetslistsrch.filterList = <?php echo $employee_attendancesheets_list->getFilterList() ?>;
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
<?php if (!$employee_attendancesheets->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($employee_attendancesheets_list->TotalRecs > 0 && $employee_attendancesheets_list->ExportOptions->visible()) { ?>
<?php $employee_attendancesheets_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($employee_attendancesheets_list->ImportOptions->visible()) { ?>
<?php $employee_attendancesheets_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($employee_attendancesheets_list->SearchOptions->visible()) { ?>
<?php $employee_attendancesheets_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($employee_attendancesheets_list->FilterOptions->visible()) { ?>
<?php $employee_attendancesheets_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$employee_attendancesheets_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$employee_attendancesheets->isExport() && !$employee_attendancesheets->CurrentAction) { ?>
<form name="femployee_attendancesheetslistsrch" id="femployee_attendancesheetslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($employee_attendancesheets_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="femployee_attendancesheetslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="employee_attendancesheets">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$employee_attendancesheets_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$employee_attendancesheets->RowType = ROWTYPE_SEARCH;

// Render row
$employee_attendancesheets->resetAttributes();
$employee_attendancesheets_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($employee_attendancesheets->status->Visible) { // status ?>
	<div id="xsc_status" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $employee_attendancesheets->status->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_status" id="z_status" value="="></span>
		<span class="ew-search-field">
<div id="tp_x_status" class="ew-template"><input type="radio" class="form-check-input" data-table="employee_attendancesheets" data-field="x_status" data-value-separator="<?php echo $employee_attendancesheets->status->displayValueSeparatorAttribute() ?>" name="x_status" id="x_status" value="{value}"<?php echo $employee_attendancesheets->status->editAttributes() ?>></div>
<div id="dsl_x_status" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $employee_attendancesheets->status->radioButtonListHtml(FALSE, "x_status") ?>
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
<?php $employee_attendancesheets_list->showPageHeader(); ?>
<?php
$employee_attendancesheets_list->showMessage();
?>
<?php if ($employee_attendancesheets_list->TotalRecs > 0 || $employee_attendancesheets->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($employee_attendancesheets_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> employee_attendancesheets">
<?php if (!$employee_attendancesheets->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$employee_attendancesheets->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($employee_attendancesheets_list->Pager)) $employee_attendancesheets_list->Pager = new NumericPager($employee_attendancesheets_list->StartRec, $employee_attendancesheets_list->DisplayRecs, $employee_attendancesheets_list->TotalRecs, $employee_attendancesheets_list->RecRange, $employee_attendancesheets_list->AutoHidePager) ?>
<?php if ($employee_attendancesheets_list->Pager->RecordCount > 0 && $employee_attendancesheets_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($employee_attendancesheets_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_attendancesheets_list->pageUrl() ?>start=<?php echo $employee_attendancesheets_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($employee_attendancesheets_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_attendancesheets_list->pageUrl() ?>start=<?php echo $employee_attendancesheets_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($employee_attendancesheets_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $employee_attendancesheets_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($employee_attendancesheets_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_attendancesheets_list->pageUrl() ?>start=<?php echo $employee_attendancesheets_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($employee_attendancesheets_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_attendancesheets_list->pageUrl() ?>start=<?php echo $employee_attendancesheets_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($employee_attendancesheets_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $employee_attendancesheets_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $employee_attendancesheets_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $employee_attendancesheets_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($employee_attendancesheets_list->TotalRecs > 0 && (!$employee_attendancesheets_list->AutoHidePageSizeSelector || $employee_attendancesheets_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="employee_attendancesheets">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($employee_attendancesheets_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($employee_attendancesheets_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($employee_attendancesheets_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($employee_attendancesheets_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($employee_attendancesheets_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($employee_attendancesheets_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($employee_attendancesheets->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $employee_attendancesheets_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="femployee_attendancesheetslist" id="femployee_attendancesheetslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_attendancesheets_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_attendancesheets_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_attendancesheets">
<div id="gmp_employee_attendancesheets" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($employee_attendancesheets_list->TotalRecs > 0 || $employee_attendancesheets->isGridEdit()) { ?>
<table id="tbl_employee_attendancesheetslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$employee_attendancesheets_list->RowType = ROWTYPE_HEADER;

// Render list options
$employee_attendancesheets_list->renderListOptions();

// Render list options (header, left)
$employee_attendancesheets_list->ListOptions->render("header", "left");
?>
<?php if ($employee_attendancesheets->id->Visible) { // id ?>
	<?php if ($employee_attendancesheets->sortUrl($employee_attendancesheets->id) == "") { ?>
		<th data-name="id" class="<?php echo $employee_attendancesheets->id->headerCellClass() ?>"><div id="elh_employee_attendancesheets_id" class="employee_attendancesheets_id"><div class="ew-table-header-caption"><?php echo $employee_attendancesheets->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $employee_attendancesheets->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_attendancesheets->SortUrl($employee_attendancesheets->id) ?>',1);"><div id="elh_employee_attendancesheets_id" class="employee_attendancesheets_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_attendancesheets->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_attendancesheets->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_attendancesheets->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_attendancesheets->employee->Visible) { // employee ?>
	<?php if ($employee_attendancesheets->sortUrl($employee_attendancesheets->employee) == "") { ?>
		<th data-name="employee" class="<?php echo $employee_attendancesheets->employee->headerCellClass() ?>"><div id="elh_employee_attendancesheets_employee" class="employee_attendancesheets_employee"><div class="ew-table-header-caption"><?php echo $employee_attendancesheets->employee->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="employee" class="<?php echo $employee_attendancesheets->employee->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_attendancesheets->SortUrl($employee_attendancesheets->employee) ?>',1);"><div id="elh_employee_attendancesheets_employee" class="employee_attendancesheets_employee">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_attendancesheets->employee->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_attendancesheets->employee->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_attendancesheets->employee->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_attendancesheets->date_start->Visible) { // date_start ?>
	<?php if ($employee_attendancesheets->sortUrl($employee_attendancesheets->date_start) == "") { ?>
		<th data-name="date_start" class="<?php echo $employee_attendancesheets->date_start->headerCellClass() ?>"><div id="elh_employee_attendancesheets_date_start" class="employee_attendancesheets_date_start"><div class="ew-table-header-caption"><?php echo $employee_attendancesheets->date_start->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="date_start" class="<?php echo $employee_attendancesheets->date_start->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_attendancesheets->SortUrl($employee_attendancesheets->date_start) ?>',1);"><div id="elh_employee_attendancesheets_date_start" class="employee_attendancesheets_date_start">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_attendancesheets->date_start->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_attendancesheets->date_start->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_attendancesheets->date_start->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_attendancesheets->date_end->Visible) { // date_end ?>
	<?php if ($employee_attendancesheets->sortUrl($employee_attendancesheets->date_end) == "") { ?>
		<th data-name="date_end" class="<?php echo $employee_attendancesheets->date_end->headerCellClass() ?>"><div id="elh_employee_attendancesheets_date_end" class="employee_attendancesheets_date_end"><div class="ew-table-header-caption"><?php echo $employee_attendancesheets->date_end->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="date_end" class="<?php echo $employee_attendancesheets->date_end->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_attendancesheets->SortUrl($employee_attendancesheets->date_end) ?>',1);"><div id="elh_employee_attendancesheets_date_end" class="employee_attendancesheets_date_end">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_attendancesheets->date_end->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_attendancesheets->date_end->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_attendancesheets->date_end->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_attendancesheets->status->Visible) { // status ?>
	<?php if ($employee_attendancesheets->sortUrl($employee_attendancesheets->status) == "") { ?>
		<th data-name="status" class="<?php echo $employee_attendancesheets->status->headerCellClass() ?>"><div id="elh_employee_attendancesheets_status" class="employee_attendancesheets_status"><div class="ew-table-header-caption"><?php echo $employee_attendancesheets->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $employee_attendancesheets->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_attendancesheets->SortUrl($employee_attendancesheets->status) ?>',1);"><div id="elh_employee_attendancesheets_status" class="employee_attendancesheets_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_attendancesheets->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_attendancesheets->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_attendancesheets->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$employee_attendancesheets_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($employee_attendancesheets->ExportAll && $employee_attendancesheets->isExport()) {
	$employee_attendancesheets_list->StopRec = $employee_attendancesheets_list->TotalRecs;
} else {

	// Set the last record to display
	if ($employee_attendancesheets_list->TotalRecs > $employee_attendancesheets_list->StartRec + $employee_attendancesheets_list->DisplayRecs - 1)
		$employee_attendancesheets_list->StopRec = $employee_attendancesheets_list->StartRec + $employee_attendancesheets_list->DisplayRecs - 1;
	else
		$employee_attendancesheets_list->StopRec = $employee_attendancesheets_list->TotalRecs;
}
$employee_attendancesheets_list->RecCnt = $employee_attendancesheets_list->StartRec - 1;
if ($employee_attendancesheets_list->Recordset && !$employee_attendancesheets_list->Recordset->EOF) {
	$employee_attendancesheets_list->Recordset->moveFirst();
	$selectLimit = $employee_attendancesheets_list->UseSelectLimit;
	if (!$selectLimit && $employee_attendancesheets_list->StartRec > 1)
		$employee_attendancesheets_list->Recordset->move($employee_attendancesheets_list->StartRec - 1);
} elseif (!$employee_attendancesheets->AllowAddDeleteRow && $employee_attendancesheets_list->StopRec == 0) {
	$employee_attendancesheets_list->StopRec = $employee_attendancesheets->GridAddRowCount;
}

// Initialize aggregate
$employee_attendancesheets->RowType = ROWTYPE_AGGREGATEINIT;
$employee_attendancesheets->resetAttributes();
$employee_attendancesheets_list->renderRow();
while ($employee_attendancesheets_list->RecCnt < $employee_attendancesheets_list->StopRec) {
	$employee_attendancesheets_list->RecCnt++;
	if ($employee_attendancesheets_list->RecCnt >= $employee_attendancesheets_list->StartRec) {
		$employee_attendancesheets_list->RowCnt++;

		// Set up key count
		$employee_attendancesheets_list->KeyCount = $employee_attendancesheets_list->RowIndex;

		// Init row class and style
		$employee_attendancesheets->resetAttributes();
		$employee_attendancesheets->CssClass = "";
		if ($employee_attendancesheets->isGridAdd()) {
		} else {
			$employee_attendancesheets_list->loadRowValues($employee_attendancesheets_list->Recordset); // Load row values
		}
		$employee_attendancesheets->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$employee_attendancesheets->RowAttrs = array_merge($employee_attendancesheets->RowAttrs, array('data-rowindex'=>$employee_attendancesheets_list->RowCnt, 'id'=>'r' . $employee_attendancesheets_list->RowCnt . '_employee_attendancesheets', 'data-rowtype'=>$employee_attendancesheets->RowType));

		// Render row
		$employee_attendancesheets_list->renderRow();

		// Render list options
		$employee_attendancesheets_list->renderListOptions();
?>
	<tr<?php echo $employee_attendancesheets->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employee_attendancesheets_list->ListOptions->render("body", "left", $employee_attendancesheets_list->RowCnt);
?>
	<?php if ($employee_attendancesheets->id->Visible) { // id ?>
		<td data-name="id"<?php echo $employee_attendancesheets->id->cellAttributes() ?>>
<span id="el<?php echo $employee_attendancesheets_list->RowCnt ?>_employee_attendancesheets_id" class="employee_attendancesheets_id">
<span<?php echo $employee_attendancesheets->id->viewAttributes() ?>>
<?php echo $employee_attendancesheets->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_attendancesheets->employee->Visible) { // employee ?>
		<td data-name="employee"<?php echo $employee_attendancesheets->employee->cellAttributes() ?>>
<span id="el<?php echo $employee_attendancesheets_list->RowCnt ?>_employee_attendancesheets_employee" class="employee_attendancesheets_employee">
<span<?php echo $employee_attendancesheets->employee->viewAttributes() ?>>
<?php echo $employee_attendancesheets->employee->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_attendancesheets->date_start->Visible) { // date_start ?>
		<td data-name="date_start"<?php echo $employee_attendancesheets->date_start->cellAttributes() ?>>
<span id="el<?php echo $employee_attendancesheets_list->RowCnt ?>_employee_attendancesheets_date_start" class="employee_attendancesheets_date_start">
<span<?php echo $employee_attendancesheets->date_start->viewAttributes() ?>>
<?php echo $employee_attendancesheets->date_start->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_attendancesheets->date_end->Visible) { // date_end ?>
		<td data-name="date_end"<?php echo $employee_attendancesheets->date_end->cellAttributes() ?>>
<span id="el<?php echo $employee_attendancesheets_list->RowCnt ?>_employee_attendancesheets_date_end" class="employee_attendancesheets_date_end">
<span<?php echo $employee_attendancesheets->date_end->viewAttributes() ?>>
<?php echo $employee_attendancesheets->date_end->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_attendancesheets->status->Visible) { // status ?>
		<td data-name="status"<?php echo $employee_attendancesheets->status->cellAttributes() ?>>
<span id="el<?php echo $employee_attendancesheets_list->RowCnt ?>_employee_attendancesheets_status" class="employee_attendancesheets_status">
<span<?php echo $employee_attendancesheets->status->viewAttributes() ?>>
<?php echo $employee_attendancesheets->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$employee_attendancesheets_list->ListOptions->render("body", "right", $employee_attendancesheets_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$employee_attendancesheets->isGridAdd())
		$employee_attendancesheets_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$employee_attendancesheets->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($employee_attendancesheets_list->Recordset)
	$employee_attendancesheets_list->Recordset->Close();
?>
<?php if (!$employee_attendancesheets->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$employee_attendancesheets->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($employee_attendancesheets_list->Pager)) $employee_attendancesheets_list->Pager = new NumericPager($employee_attendancesheets_list->StartRec, $employee_attendancesheets_list->DisplayRecs, $employee_attendancesheets_list->TotalRecs, $employee_attendancesheets_list->RecRange, $employee_attendancesheets_list->AutoHidePager) ?>
<?php if ($employee_attendancesheets_list->Pager->RecordCount > 0 && $employee_attendancesheets_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($employee_attendancesheets_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_attendancesheets_list->pageUrl() ?>start=<?php echo $employee_attendancesheets_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($employee_attendancesheets_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_attendancesheets_list->pageUrl() ?>start=<?php echo $employee_attendancesheets_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($employee_attendancesheets_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $employee_attendancesheets_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($employee_attendancesheets_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_attendancesheets_list->pageUrl() ?>start=<?php echo $employee_attendancesheets_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($employee_attendancesheets_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_attendancesheets_list->pageUrl() ?>start=<?php echo $employee_attendancesheets_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($employee_attendancesheets_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $employee_attendancesheets_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $employee_attendancesheets_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $employee_attendancesheets_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($employee_attendancesheets_list->TotalRecs > 0 && (!$employee_attendancesheets_list->AutoHidePageSizeSelector || $employee_attendancesheets_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="employee_attendancesheets">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($employee_attendancesheets_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($employee_attendancesheets_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($employee_attendancesheets_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($employee_attendancesheets_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($employee_attendancesheets_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($employee_attendancesheets_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($employee_attendancesheets->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $employee_attendancesheets_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($employee_attendancesheets_list->TotalRecs == 0 && !$employee_attendancesheets->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $employee_attendancesheets_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$employee_attendancesheets_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$employee_attendancesheets->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$employee_attendancesheets->isExport()) { ?>
<script>
ew.scrollableTable("gmp_employee_attendancesheets", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$employee_attendancesheets_list->terminate();
?>