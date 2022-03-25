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
$employee_leavedays_list = new employee_leavedays_list();

// Run the page
$employee_leavedays_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_leavedays_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$employee_leavedays->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var femployee_leavedayslist = currentForm = new ew.Form("femployee_leavedayslist", "list");
femployee_leavedayslist.formKeyCountName = '<?php echo $employee_leavedays_list->FormKeyCountName ?>';

// Form_CustomValidate event
femployee_leavedayslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_leavedayslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_leavedayslist.lists["x_leave_type"] = <?php echo $employee_leavedays_list->leave_type->Lookup->toClientList() ?>;
femployee_leavedayslist.lists["x_leave_type"].options = <?php echo JsonEncode($employee_leavedays_list->leave_type->options(FALSE, TRUE)) ?>;

// Form object for search
var femployee_leavedayslistsrch = currentSearchForm = new ew.Form("femployee_leavedayslistsrch");

// Validate function for search
femployee_leavedayslistsrch.validate = function(fobj) {
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
femployee_leavedayslistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_leavedayslistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_leavedayslistsrch.lists["x_leave_type"] = <?php echo $employee_leavedays_list->leave_type->Lookup->toClientList() ?>;
femployee_leavedayslistsrch.lists["x_leave_type"].options = <?php echo JsonEncode($employee_leavedays_list->leave_type->options(FALSE, TRUE)) ?>;

// Filters
femployee_leavedayslistsrch.filterList = <?php echo $employee_leavedays_list->getFilterList() ?>;
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
<?php if (!$employee_leavedays->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($employee_leavedays_list->TotalRecs > 0 && $employee_leavedays_list->ExportOptions->visible()) { ?>
<?php $employee_leavedays_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($employee_leavedays_list->ImportOptions->visible()) { ?>
<?php $employee_leavedays_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($employee_leavedays_list->SearchOptions->visible()) { ?>
<?php $employee_leavedays_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($employee_leavedays_list->FilterOptions->visible()) { ?>
<?php $employee_leavedays_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$employee_leavedays_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$employee_leavedays->isExport() && !$employee_leavedays->CurrentAction) { ?>
<form name="femployee_leavedayslistsrch" id="femployee_leavedayslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($employee_leavedays_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="femployee_leavedayslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="employee_leavedays">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$employee_leavedays_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$employee_leavedays->RowType = ROWTYPE_SEARCH;

// Render row
$employee_leavedays->resetAttributes();
$employee_leavedays_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($employee_leavedays->leave_type->Visible) { // leave_type ?>
	<div id="xsc_leave_type" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $employee_leavedays->leave_type->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_leave_type" id="z_leave_type" value="="></span>
		<span class="ew-search-field">
<div id="tp_x_leave_type" class="ew-template"><input type="radio" class="form-check-input" data-table="employee_leavedays" data-field="x_leave_type" data-value-separator="<?php echo $employee_leavedays->leave_type->displayValueSeparatorAttribute() ?>" name="x_leave_type" id="x_leave_type" value="{value}"<?php echo $employee_leavedays->leave_type->editAttributes() ?>></div>
<div id="dsl_x_leave_type" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $employee_leavedays->leave_type->radioButtonListHtml(FALSE, "x_leave_type") ?>
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
<?php $employee_leavedays_list->showPageHeader(); ?>
<?php
$employee_leavedays_list->showMessage();
?>
<?php if ($employee_leavedays_list->TotalRecs > 0 || $employee_leavedays->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($employee_leavedays_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> employee_leavedays">
<?php if (!$employee_leavedays->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$employee_leavedays->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($employee_leavedays_list->Pager)) $employee_leavedays_list->Pager = new NumericPager($employee_leavedays_list->StartRec, $employee_leavedays_list->DisplayRecs, $employee_leavedays_list->TotalRecs, $employee_leavedays_list->RecRange, $employee_leavedays_list->AutoHidePager) ?>
<?php if ($employee_leavedays_list->Pager->RecordCount > 0 && $employee_leavedays_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($employee_leavedays_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_leavedays_list->pageUrl() ?>start=<?php echo $employee_leavedays_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($employee_leavedays_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_leavedays_list->pageUrl() ?>start=<?php echo $employee_leavedays_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($employee_leavedays_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $employee_leavedays_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($employee_leavedays_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_leavedays_list->pageUrl() ?>start=<?php echo $employee_leavedays_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($employee_leavedays_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_leavedays_list->pageUrl() ?>start=<?php echo $employee_leavedays_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($employee_leavedays_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $employee_leavedays_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $employee_leavedays_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $employee_leavedays_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($employee_leavedays_list->TotalRecs > 0 && (!$employee_leavedays_list->AutoHidePageSizeSelector || $employee_leavedays_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="employee_leavedays">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($employee_leavedays_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($employee_leavedays_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($employee_leavedays_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($employee_leavedays_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($employee_leavedays_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($employee_leavedays_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($employee_leavedays->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $employee_leavedays_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="femployee_leavedayslist" id="femployee_leavedayslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_leavedays_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_leavedays_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_leavedays">
<div id="gmp_employee_leavedays" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($employee_leavedays_list->TotalRecs > 0 || $employee_leavedays->isGridEdit()) { ?>
<table id="tbl_employee_leavedayslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$employee_leavedays_list->RowType = ROWTYPE_HEADER;

// Render list options
$employee_leavedays_list->renderListOptions();

// Render list options (header, left)
$employee_leavedays_list->ListOptions->render("header", "left");
?>
<?php if ($employee_leavedays->id->Visible) { // id ?>
	<?php if ($employee_leavedays->sortUrl($employee_leavedays->id) == "") { ?>
		<th data-name="id" class="<?php echo $employee_leavedays->id->headerCellClass() ?>"><div id="elh_employee_leavedays_id" class="employee_leavedays_id"><div class="ew-table-header-caption"><?php echo $employee_leavedays->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $employee_leavedays->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_leavedays->SortUrl($employee_leavedays->id) ?>',1);"><div id="elh_employee_leavedays_id" class="employee_leavedays_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_leavedays->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_leavedays->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_leavedays->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_leavedays->employee_leave->Visible) { // employee_leave ?>
	<?php if ($employee_leavedays->sortUrl($employee_leavedays->employee_leave) == "") { ?>
		<th data-name="employee_leave" class="<?php echo $employee_leavedays->employee_leave->headerCellClass() ?>"><div id="elh_employee_leavedays_employee_leave" class="employee_leavedays_employee_leave"><div class="ew-table-header-caption"><?php echo $employee_leavedays->employee_leave->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="employee_leave" class="<?php echo $employee_leavedays->employee_leave->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_leavedays->SortUrl($employee_leavedays->employee_leave) ?>',1);"><div id="elh_employee_leavedays_employee_leave" class="employee_leavedays_employee_leave">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_leavedays->employee_leave->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_leavedays->employee_leave->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_leavedays->employee_leave->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_leavedays->leave_date->Visible) { // leave_date ?>
	<?php if ($employee_leavedays->sortUrl($employee_leavedays->leave_date) == "") { ?>
		<th data-name="leave_date" class="<?php echo $employee_leavedays->leave_date->headerCellClass() ?>"><div id="elh_employee_leavedays_leave_date" class="employee_leavedays_leave_date"><div class="ew-table-header-caption"><?php echo $employee_leavedays->leave_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="leave_date" class="<?php echo $employee_leavedays->leave_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_leavedays->SortUrl($employee_leavedays->leave_date) ?>',1);"><div id="elh_employee_leavedays_leave_date" class="employee_leavedays_leave_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_leavedays->leave_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_leavedays->leave_date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_leavedays->leave_date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_leavedays->leave_type->Visible) { // leave_type ?>
	<?php if ($employee_leavedays->sortUrl($employee_leavedays->leave_type) == "") { ?>
		<th data-name="leave_type" class="<?php echo $employee_leavedays->leave_type->headerCellClass() ?>"><div id="elh_employee_leavedays_leave_type" class="employee_leavedays_leave_type"><div class="ew-table-header-caption"><?php echo $employee_leavedays->leave_type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="leave_type" class="<?php echo $employee_leavedays->leave_type->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_leavedays->SortUrl($employee_leavedays->leave_type) ?>',1);"><div id="elh_employee_leavedays_leave_type" class="employee_leavedays_leave_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_leavedays->leave_type->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_leavedays->leave_type->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_leavedays->leave_type->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$employee_leavedays_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($employee_leavedays->ExportAll && $employee_leavedays->isExport()) {
	$employee_leavedays_list->StopRec = $employee_leavedays_list->TotalRecs;
} else {

	// Set the last record to display
	if ($employee_leavedays_list->TotalRecs > $employee_leavedays_list->StartRec + $employee_leavedays_list->DisplayRecs - 1)
		$employee_leavedays_list->StopRec = $employee_leavedays_list->StartRec + $employee_leavedays_list->DisplayRecs - 1;
	else
		$employee_leavedays_list->StopRec = $employee_leavedays_list->TotalRecs;
}
$employee_leavedays_list->RecCnt = $employee_leavedays_list->StartRec - 1;
if ($employee_leavedays_list->Recordset && !$employee_leavedays_list->Recordset->EOF) {
	$employee_leavedays_list->Recordset->moveFirst();
	$selectLimit = $employee_leavedays_list->UseSelectLimit;
	if (!$selectLimit && $employee_leavedays_list->StartRec > 1)
		$employee_leavedays_list->Recordset->move($employee_leavedays_list->StartRec - 1);
} elseif (!$employee_leavedays->AllowAddDeleteRow && $employee_leavedays_list->StopRec == 0) {
	$employee_leavedays_list->StopRec = $employee_leavedays->GridAddRowCount;
}

// Initialize aggregate
$employee_leavedays->RowType = ROWTYPE_AGGREGATEINIT;
$employee_leavedays->resetAttributes();
$employee_leavedays_list->renderRow();
while ($employee_leavedays_list->RecCnt < $employee_leavedays_list->StopRec) {
	$employee_leavedays_list->RecCnt++;
	if ($employee_leavedays_list->RecCnt >= $employee_leavedays_list->StartRec) {
		$employee_leavedays_list->RowCnt++;

		// Set up key count
		$employee_leavedays_list->KeyCount = $employee_leavedays_list->RowIndex;

		// Init row class and style
		$employee_leavedays->resetAttributes();
		$employee_leavedays->CssClass = "";
		if ($employee_leavedays->isGridAdd()) {
		} else {
			$employee_leavedays_list->loadRowValues($employee_leavedays_list->Recordset); // Load row values
		}
		$employee_leavedays->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$employee_leavedays->RowAttrs = array_merge($employee_leavedays->RowAttrs, array('data-rowindex'=>$employee_leavedays_list->RowCnt, 'id'=>'r' . $employee_leavedays_list->RowCnt . '_employee_leavedays', 'data-rowtype'=>$employee_leavedays->RowType));

		// Render row
		$employee_leavedays_list->renderRow();

		// Render list options
		$employee_leavedays_list->renderListOptions();
?>
	<tr<?php echo $employee_leavedays->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employee_leavedays_list->ListOptions->render("body", "left", $employee_leavedays_list->RowCnt);
?>
	<?php if ($employee_leavedays->id->Visible) { // id ?>
		<td data-name="id"<?php echo $employee_leavedays->id->cellAttributes() ?>>
<span id="el<?php echo $employee_leavedays_list->RowCnt ?>_employee_leavedays_id" class="employee_leavedays_id">
<span<?php echo $employee_leavedays->id->viewAttributes() ?>>
<?php echo $employee_leavedays->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_leavedays->employee_leave->Visible) { // employee_leave ?>
		<td data-name="employee_leave"<?php echo $employee_leavedays->employee_leave->cellAttributes() ?>>
<span id="el<?php echo $employee_leavedays_list->RowCnt ?>_employee_leavedays_employee_leave" class="employee_leavedays_employee_leave">
<span<?php echo $employee_leavedays->employee_leave->viewAttributes() ?>>
<?php echo $employee_leavedays->employee_leave->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_leavedays->leave_date->Visible) { // leave_date ?>
		<td data-name="leave_date"<?php echo $employee_leavedays->leave_date->cellAttributes() ?>>
<span id="el<?php echo $employee_leavedays_list->RowCnt ?>_employee_leavedays_leave_date" class="employee_leavedays_leave_date">
<span<?php echo $employee_leavedays->leave_date->viewAttributes() ?>>
<?php echo $employee_leavedays->leave_date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_leavedays->leave_type->Visible) { // leave_type ?>
		<td data-name="leave_type"<?php echo $employee_leavedays->leave_type->cellAttributes() ?>>
<span id="el<?php echo $employee_leavedays_list->RowCnt ?>_employee_leavedays_leave_type" class="employee_leavedays_leave_type">
<span<?php echo $employee_leavedays->leave_type->viewAttributes() ?>>
<?php echo $employee_leavedays->leave_type->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$employee_leavedays_list->ListOptions->render("body", "right", $employee_leavedays_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$employee_leavedays->isGridAdd())
		$employee_leavedays_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$employee_leavedays->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($employee_leavedays_list->Recordset)
	$employee_leavedays_list->Recordset->Close();
?>
<?php if (!$employee_leavedays->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$employee_leavedays->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($employee_leavedays_list->Pager)) $employee_leavedays_list->Pager = new NumericPager($employee_leavedays_list->StartRec, $employee_leavedays_list->DisplayRecs, $employee_leavedays_list->TotalRecs, $employee_leavedays_list->RecRange, $employee_leavedays_list->AutoHidePager) ?>
<?php if ($employee_leavedays_list->Pager->RecordCount > 0 && $employee_leavedays_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($employee_leavedays_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_leavedays_list->pageUrl() ?>start=<?php echo $employee_leavedays_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($employee_leavedays_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_leavedays_list->pageUrl() ?>start=<?php echo $employee_leavedays_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($employee_leavedays_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $employee_leavedays_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($employee_leavedays_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_leavedays_list->pageUrl() ?>start=<?php echo $employee_leavedays_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($employee_leavedays_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_leavedays_list->pageUrl() ?>start=<?php echo $employee_leavedays_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($employee_leavedays_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $employee_leavedays_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $employee_leavedays_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $employee_leavedays_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($employee_leavedays_list->TotalRecs > 0 && (!$employee_leavedays_list->AutoHidePageSizeSelector || $employee_leavedays_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="employee_leavedays">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($employee_leavedays_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($employee_leavedays_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($employee_leavedays_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($employee_leavedays_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($employee_leavedays_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($employee_leavedays_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($employee_leavedays->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $employee_leavedays_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($employee_leavedays_list->TotalRecs == 0 && !$employee_leavedays->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $employee_leavedays_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$employee_leavedays_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$employee_leavedays->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$employee_leavedays->isExport()) { ?>
<script>
ew.scrollableTable("gmp_employee_leavedays", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$employee_leavedays_list->terminate();
?>