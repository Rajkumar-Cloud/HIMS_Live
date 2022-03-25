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
$employee_timesheets_list = new employee_timesheets_list();

// Run the page
$employee_timesheets_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_timesheets_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$employee_timesheets->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var femployee_timesheetslist = currentForm = new ew.Form("femployee_timesheetslist", "list");
femployee_timesheetslist.formKeyCountName = '<?php echo $employee_timesheets_list->FormKeyCountName ?>';

// Form_CustomValidate event
femployee_timesheetslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_timesheetslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_timesheetslist.lists["x_status"] = <?php echo $employee_timesheets_list->status->Lookup->toClientList() ?>;
femployee_timesheetslist.lists["x_status"].options = <?php echo JsonEncode($employee_timesheets_list->status->options(FALSE, TRUE)) ?>;

// Form object for search
var femployee_timesheetslistsrch = currentSearchForm = new ew.Form("femployee_timesheetslistsrch");

// Validate function for search
femployee_timesheetslistsrch.validate = function(fobj) {
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
femployee_timesheetslistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_timesheetslistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_timesheetslistsrch.lists["x_status"] = <?php echo $employee_timesheets_list->status->Lookup->toClientList() ?>;
femployee_timesheetslistsrch.lists["x_status"].options = <?php echo JsonEncode($employee_timesheets_list->status->options(FALSE, TRUE)) ?>;

// Filters
femployee_timesheetslistsrch.filterList = <?php echo $employee_timesheets_list->getFilterList() ?>;
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
<?php if (!$employee_timesheets->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($employee_timesheets_list->TotalRecs > 0 && $employee_timesheets_list->ExportOptions->visible()) { ?>
<?php $employee_timesheets_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($employee_timesheets_list->ImportOptions->visible()) { ?>
<?php $employee_timesheets_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($employee_timesheets_list->SearchOptions->visible()) { ?>
<?php $employee_timesheets_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($employee_timesheets_list->FilterOptions->visible()) { ?>
<?php $employee_timesheets_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$employee_timesheets_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$employee_timesheets->isExport() && !$employee_timesheets->CurrentAction) { ?>
<form name="femployee_timesheetslistsrch" id="femployee_timesheetslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($employee_timesheets_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="femployee_timesheetslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="employee_timesheets">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$employee_timesheets_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$employee_timesheets->RowType = ROWTYPE_SEARCH;

// Render row
$employee_timesheets->resetAttributes();
$employee_timesheets_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($employee_timesheets->status->Visible) { // status ?>
	<div id="xsc_status" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $employee_timesheets->status->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_status" id="z_status" value="="></span>
		<span class="ew-search-field">
<div id="tp_x_status" class="ew-template"><input type="radio" class="form-check-input" data-table="employee_timesheets" data-field="x_status" data-value-separator="<?php echo $employee_timesheets->status->displayValueSeparatorAttribute() ?>" name="x_status" id="x_status" value="{value}"<?php echo $employee_timesheets->status->editAttributes() ?>></div>
<div id="dsl_x_status" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $employee_timesheets->status->radioButtonListHtml(FALSE, "x_status") ?>
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
<?php $employee_timesheets_list->showPageHeader(); ?>
<?php
$employee_timesheets_list->showMessage();
?>
<?php if ($employee_timesheets_list->TotalRecs > 0 || $employee_timesheets->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($employee_timesheets_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> employee_timesheets">
<?php if (!$employee_timesheets->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$employee_timesheets->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($employee_timesheets_list->Pager)) $employee_timesheets_list->Pager = new NumericPager($employee_timesheets_list->StartRec, $employee_timesheets_list->DisplayRecs, $employee_timesheets_list->TotalRecs, $employee_timesheets_list->RecRange, $employee_timesheets_list->AutoHidePager) ?>
<?php if ($employee_timesheets_list->Pager->RecordCount > 0 && $employee_timesheets_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($employee_timesheets_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_timesheets_list->pageUrl() ?>start=<?php echo $employee_timesheets_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($employee_timesheets_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_timesheets_list->pageUrl() ?>start=<?php echo $employee_timesheets_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($employee_timesheets_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $employee_timesheets_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($employee_timesheets_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_timesheets_list->pageUrl() ?>start=<?php echo $employee_timesheets_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($employee_timesheets_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_timesheets_list->pageUrl() ?>start=<?php echo $employee_timesheets_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($employee_timesheets_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $employee_timesheets_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $employee_timesheets_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $employee_timesheets_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($employee_timesheets_list->TotalRecs > 0 && (!$employee_timesheets_list->AutoHidePageSizeSelector || $employee_timesheets_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="employee_timesheets">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($employee_timesheets_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($employee_timesheets_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($employee_timesheets_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($employee_timesheets_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($employee_timesheets_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($employee_timesheets_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($employee_timesheets->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $employee_timesheets_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="femployee_timesheetslist" id="femployee_timesheetslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_timesheets_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_timesheets_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_timesheets">
<div id="gmp_employee_timesheets" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($employee_timesheets_list->TotalRecs > 0 || $employee_timesheets->isGridEdit()) { ?>
<table id="tbl_employee_timesheetslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$employee_timesheets_list->RowType = ROWTYPE_HEADER;

// Render list options
$employee_timesheets_list->renderListOptions();

// Render list options (header, left)
$employee_timesheets_list->ListOptions->render("header", "left");
?>
<?php if ($employee_timesheets->id->Visible) { // id ?>
	<?php if ($employee_timesheets->sortUrl($employee_timesheets->id) == "") { ?>
		<th data-name="id" class="<?php echo $employee_timesheets->id->headerCellClass() ?>"><div id="elh_employee_timesheets_id" class="employee_timesheets_id"><div class="ew-table-header-caption"><?php echo $employee_timesheets->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $employee_timesheets->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_timesheets->SortUrl($employee_timesheets->id) ?>',1);"><div id="elh_employee_timesheets_id" class="employee_timesheets_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_timesheets->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_timesheets->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_timesheets->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_timesheets->employee->Visible) { // employee ?>
	<?php if ($employee_timesheets->sortUrl($employee_timesheets->employee) == "") { ?>
		<th data-name="employee" class="<?php echo $employee_timesheets->employee->headerCellClass() ?>"><div id="elh_employee_timesheets_employee" class="employee_timesheets_employee"><div class="ew-table-header-caption"><?php echo $employee_timesheets->employee->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="employee" class="<?php echo $employee_timesheets->employee->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_timesheets->SortUrl($employee_timesheets->employee) ?>',1);"><div id="elh_employee_timesheets_employee" class="employee_timesheets_employee">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_timesheets->employee->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_timesheets->employee->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_timesheets->employee->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_timesheets->date_start->Visible) { // date_start ?>
	<?php if ($employee_timesheets->sortUrl($employee_timesheets->date_start) == "") { ?>
		<th data-name="date_start" class="<?php echo $employee_timesheets->date_start->headerCellClass() ?>"><div id="elh_employee_timesheets_date_start" class="employee_timesheets_date_start"><div class="ew-table-header-caption"><?php echo $employee_timesheets->date_start->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="date_start" class="<?php echo $employee_timesheets->date_start->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_timesheets->SortUrl($employee_timesheets->date_start) ?>',1);"><div id="elh_employee_timesheets_date_start" class="employee_timesheets_date_start">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_timesheets->date_start->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_timesheets->date_start->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_timesheets->date_start->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_timesheets->date_end->Visible) { // date_end ?>
	<?php if ($employee_timesheets->sortUrl($employee_timesheets->date_end) == "") { ?>
		<th data-name="date_end" class="<?php echo $employee_timesheets->date_end->headerCellClass() ?>"><div id="elh_employee_timesheets_date_end" class="employee_timesheets_date_end"><div class="ew-table-header-caption"><?php echo $employee_timesheets->date_end->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="date_end" class="<?php echo $employee_timesheets->date_end->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_timesheets->SortUrl($employee_timesheets->date_end) ?>',1);"><div id="elh_employee_timesheets_date_end" class="employee_timesheets_date_end">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_timesheets->date_end->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_timesheets->date_end->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_timesheets->date_end->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_timesheets->status->Visible) { // status ?>
	<?php if ($employee_timesheets->sortUrl($employee_timesheets->status) == "") { ?>
		<th data-name="status" class="<?php echo $employee_timesheets->status->headerCellClass() ?>"><div id="elh_employee_timesheets_status" class="employee_timesheets_status"><div class="ew-table-header-caption"><?php echo $employee_timesheets->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $employee_timesheets->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_timesheets->SortUrl($employee_timesheets->status) ?>',1);"><div id="elh_employee_timesheets_status" class="employee_timesheets_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_timesheets->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_timesheets->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_timesheets->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$employee_timesheets_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($employee_timesheets->ExportAll && $employee_timesheets->isExport()) {
	$employee_timesheets_list->StopRec = $employee_timesheets_list->TotalRecs;
} else {

	// Set the last record to display
	if ($employee_timesheets_list->TotalRecs > $employee_timesheets_list->StartRec + $employee_timesheets_list->DisplayRecs - 1)
		$employee_timesheets_list->StopRec = $employee_timesheets_list->StartRec + $employee_timesheets_list->DisplayRecs - 1;
	else
		$employee_timesheets_list->StopRec = $employee_timesheets_list->TotalRecs;
}
$employee_timesheets_list->RecCnt = $employee_timesheets_list->StartRec - 1;
if ($employee_timesheets_list->Recordset && !$employee_timesheets_list->Recordset->EOF) {
	$employee_timesheets_list->Recordset->moveFirst();
	$selectLimit = $employee_timesheets_list->UseSelectLimit;
	if (!$selectLimit && $employee_timesheets_list->StartRec > 1)
		$employee_timesheets_list->Recordset->move($employee_timesheets_list->StartRec - 1);
} elseif (!$employee_timesheets->AllowAddDeleteRow && $employee_timesheets_list->StopRec == 0) {
	$employee_timesheets_list->StopRec = $employee_timesheets->GridAddRowCount;
}

// Initialize aggregate
$employee_timesheets->RowType = ROWTYPE_AGGREGATEINIT;
$employee_timesheets->resetAttributes();
$employee_timesheets_list->renderRow();
while ($employee_timesheets_list->RecCnt < $employee_timesheets_list->StopRec) {
	$employee_timesheets_list->RecCnt++;
	if ($employee_timesheets_list->RecCnt >= $employee_timesheets_list->StartRec) {
		$employee_timesheets_list->RowCnt++;

		// Set up key count
		$employee_timesheets_list->KeyCount = $employee_timesheets_list->RowIndex;

		// Init row class and style
		$employee_timesheets->resetAttributes();
		$employee_timesheets->CssClass = "";
		if ($employee_timesheets->isGridAdd()) {
		} else {
			$employee_timesheets_list->loadRowValues($employee_timesheets_list->Recordset); // Load row values
		}
		$employee_timesheets->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$employee_timesheets->RowAttrs = array_merge($employee_timesheets->RowAttrs, array('data-rowindex'=>$employee_timesheets_list->RowCnt, 'id'=>'r' . $employee_timesheets_list->RowCnt . '_employee_timesheets', 'data-rowtype'=>$employee_timesheets->RowType));

		// Render row
		$employee_timesheets_list->renderRow();

		// Render list options
		$employee_timesheets_list->renderListOptions();
?>
	<tr<?php echo $employee_timesheets->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employee_timesheets_list->ListOptions->render("body", "left", $employee_timesheets_list->RowCnt);
?>
	<?php if ($employee_timesheets->id->Visible) { // id ?>
		<td data-name="id"<?php echo $employee_timesheets->id->cellAttributes() ?>>
<span id="el<?php echo $employee_timesheets_list->RowCnt ?>_employee_timesheets_id" class="employee_timesheets_id">
<span<?php echo $employee_timesheets->id->viewAttributes() ?>>
<?php echo $employee_timesheets->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_timesheets->employee->Visible) { // employee ?>
		<td data-name="employee"<?php echo $employee_timesheets->employee->cellAttributes() ?>>
<span id="el<?php echo $employee_timesheets_list->RowCnt ?>_employee_timesheets_employee" class="employee_timesheets_employee">
<span<?php echo $employee_timesheets->employee->viewAttributes() ?>>
<?php echo $employee_timesheets->employee->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_timesheets->date_start->Visible) { // date_start ?>
		<td data-name="date_start"<?php echo $employee_timesheets->date_start->cellAttributes() ?>>
<span id="el<?php echo $employee_timesheets_list->RowCnt ?>_employee_timesheets_date_start" class="employee_timesheets_date_start">
<span<?php echo $employee_timesheets->date_start->viewAttributes() ?>>
<?php echo $employee_timesheets->date_start->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_timesheets->date_end->Visible) { // date_end ?>
		<td data-name="date_end"<?php echo $employee_timesheets->date_end->cellAttributes() ?>>
<span id="el<?php echo $employee_timesheets_list->RowCnt ?>_employee_timesheets_date_end" class="employee_timesheets_date_end">
<span<?php echo $employee_timesheets->date_end->viewAttributes() ?>>
<?php echo $employee_timesheets->date_end->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_timesheets->status->Visible) { // status ?>
		<td data-name="status"<?php echo $employee_timesheets->status->cellAttributes() ?>>
<span id="el<?php echo $employee_timesheets_list->RowCnt ?>_employee_timesheets_status" class="employee_timesheets_status">
<span<?php echo $employee_timesheets->status->viewAttributes() ?>>
<?php echo $employee_timesheets->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$employee_timesheets_list->ListOptions->render("body", "right", $employee_timesheets_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$employee_timesheets->isGridAdd())
		$employee_timesheets_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$employee_timesheets->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($employee_timesheets_list->Recordset)
	$employee_timesheets_list->Recordset->Close();
?>
<?php if (!$employee_timesheets->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$employee_timesheets->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($employee_timesheets_list->Pager)) $employee_timesheets_list->Pager = new NumericPager($employee_timesheets_list->StartRec, $employee_timesheets_list->DisplayRecs, $employee_timesheets_list->TotalRecs, $employee_timesheets_list->RecRange, $employee_timesheets_list->AutoHidePager) ?>
<?php if ($employee_timesheets_list->Pager->RecordCount > 0 && $employee_timesheets_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($employee_timesheets_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_timesheets_list->pageUrl() ?>start=<?php echo $employee_timesheets_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($employee_timesheets_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_timesheets_list->pageUrl() ?>start=<?php echo $employee_timesheets_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($employee_timesheets_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $employee_timesheets_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($employee_timesheets_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_timesheets_list->pageUrl() ?>start=<?php echo $employee_timesheets_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($employee_timesheets_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_timesheets_list->pageUrl() ?>start=<?php echo $employee_timesheets_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($employee_timesheets_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $employee_timesheets_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $employee_timesheets_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $employee_timesheets_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($employee_timesheets_list->TotalRecs > 0 && (!$employee_timesheets_list->AutoHidePageSizeSelector || $employee_timesheets_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="employee_timesheets">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($employee_timesheets_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($employee_timesheets_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($employee_timesheets_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($employee_timesheets_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($employee_timesheets_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($employee_timesheets_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($employee_timesheets->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $employee_timesheets_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($employee_timesheets_list->TotalRecs == 0 && !$employee_timesheets->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $employee_timesheets_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$employee_timesheets_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$employee_timesheets->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$employee_timesheets->isExport()) { ?>
<script>
ew.scrollableTable("gmp_employee_timesheets", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$employee_timesheets_list->terminate();
?>