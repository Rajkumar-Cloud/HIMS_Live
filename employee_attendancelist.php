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
$employee_attendance_list = new employee_attendance_list();

// Run the page
$employee_attendance_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_attendance_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$employee_attendance->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var femployee_attendancelist = currentForm = new ew.Form("femployee_attendancelist", "list");
femployee_attendancelist.formKeyCountName = '<?php echo $employee_attendance_list->FormKeyCountName ?>';

// Form_CustomValidate event
femployee_attendancelist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_attendancelist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

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
<?php if (!$employee_attendance->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($employee_attendance_list->TotalRecs > 0 && $employee_attendance_list->ExportOptions->visible()) { ?>
<?php $employee_attendance_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($employee_attendance_list->ImportOptions->visible()) { ?>
<?php $employee_attendance_list->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$employee_attendance_list->renderOtherOptions();
?>
<?php $employee_attendance_list->showPageHeader(); ?>
<?php
$employee_attendance_list->showMessage();
?>
<?php if ($employee_attendance_list->TotalRecs > 0 || $employee_attendance->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($employee_attendance_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> employee_attendance">
<?php if (!$employee_attendance->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$employee_attendance->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($employee_attendance_list->Pager)) $employee_attendance_list->Pager = new NumericPager($employee_attendance_list->StartRec, $employee_attendance_list->DisplayRecs, $employee_attendance_list->TotalRecs, $employee_attendance_list->RecRange, $employee_attendance_list->AutoHidePager) ?>
<?php if ($employee_attendance_list->Pager->RecordCount > 0 && $employee_attendance_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($employee_attendance_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_attendance_list->pageUrl() ?>start=<?php echo $employee_attendance_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($employee_attendance_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_attendance_list->pageUrl() ?>start=<?php echo $employee_attendance_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($employee_attendance_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $employee_attendance_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($employee_attendance_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_attendance_list->pageUrl() ?>start=<?php echo $employee_attendance_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($employee_attendance_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_attendance_list->pageUrl() ?>start=<?php echo $employee_attendance_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($employee_attendance_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $employee_attendance_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $employee_attendance_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $employee_attendance_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($employee_attendance_list->TotalRecs > 0 && (!$employee_attendance_list->AutoHidePageSizeSelector || $employee_attendance_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="employee_attendance">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($employee_attendance_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($employee_attendance_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($employee_attendance_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($employee_attendance_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($employee_attendance_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($employee_attendance_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($employee_attendance->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $employee_attendance_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="femployee_attendancelist" id="femployee_attendancelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_attendance_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_attendance_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_attendance">
<div id="gmp_employee_attendance" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($employee_attendance_list->TotalRecs > 0 || $employee_attendance->isGridEdit()) { ?>
<table id="tbl_employee_attendancelist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$employee_attendance_list->RowType = ROWTYPE_HEADER;

// Render list options
$employee_attendance_list->renderListOptions();

// Render list options (header, left)
$employee_attendance_list->ListOptions->render("header", "left");
?>
<?php if ($employee_attendance->id->Visible) { // id ?>
	<?php if ($employee_attendance->sortUrl($employee_attendance->id) == "") { ?>
		<th data-name="id" class="<?php echo $employee_attendance->id->headerCellClass() ?>"><div id="elh_employee_attendance_id" class="employee_attendance_id"><div class="ew-table-header-caption"><?php echo $employee_attendance->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $employee_attendance->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_attendance->SortUrl($employee_attendance->id) ?>',1);"><div id="elh_employee_attendance_id" class="employee_attendance_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_attendance->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_attendance->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_attendance->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_attendance->employee->Visible) { // employee ?>
	<?php if ($employee_attendance->sortUrl($employee_attendance->employee) == "") { ?>
		<th data-name="employee" class="<?php echo $employee_attendance->employee->headerCellClass() ?>"><div id="elh_employee_attendance_employee" class="employee_attendance_employee"><div class="ew-table-header-caption"><?php echo $employee_attendance->employee->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="employee" class="<?php echo $employee_attendance->employee->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_attendance->SortUrl($employee_attendance->employee) ?>',1);"><div id="elh_employee_attendance_employee" class="employee_attendance_employee">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_attendance->employee->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_attendance->employee->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_attendance->employee->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_attendance->in_time->Visible) { // in_time ?>
	<?php if ($employee_attendance->sortUrl($employee_attendance->in_time) == "") { ?>
		<th data-name="in_time" class="<?php echo $employee_attendance->in_time->headerCellClass() ?>"><div id="elh_employee_attendance_in_time" class="employee_attendance_in_time"><div class="ew-table-header-caption"><?php echo $employee_attendance->in_time->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="in_time" class="<?php echo $employee_attendance->in_time->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_attendance->SortUrl($employee_attendance->in_time) ?>',1);"><div id="elh_employee_attendance_in_time" class="employee_attendance_in_time">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_attendance->in_time->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_attendance->in_time->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_attendance->in_time->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_attendance->out_time->Visible) { // out_time ?>
	<?php if ($employee_attendance->sortUrl($employee_attendance->out_time) == "") { ?>
		<th data-name="out_time" class="<?php echo $employee_attendance->out_time->headerCellClass() ?>"><div id="elh_employee_attendance_out_time" class="employee_attendance_out_time"><div class="ew-table-header-caption"><?php echo $employee_attendance->out_time->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="out_time" class="<?php echo $employee_attendance->out_time->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_attendance->SortUrl($employee_attendance->out_time) ?>',1);"><div id="elh_employee_attendance_out_time" class="employee_attendance_out_time">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_attendance->out_time->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_attendance->out_time->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_attendance->out_time->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$employee_attendance_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($employee_attendance->ExportAll && $employee_attendance->isExport()) {
	$employee_attendance_list->StopRec = $employee_attendance_list->TotalRecs;
} else {

	// Set the last record to display
	if ($employee_attendance_list->TotalRecs > $employee_attendance_list->StartRec + $employee_attendance_list->DisplayRecs - 1)
		$employee_attendance_list->StopRec = $employee_attendance_list->StartRec + $employee_attendance_list->DisplayRecs - 1;
	else
		$employee_attendance_list->StopRec = $employee_attendance_list->TotalRecs;
}
$employee_attendance_list->RecCnt = $employee_attendance_list->StartRec - 1;
if ($employee_attendance_list->Recordset && !$employee_attendance_list->Recordset->EOF) {
	$employee_attendance_list->Recordset->moveFirst();
	$selectLimit = $employee_attendance_list->UseSelectLimit;
	if (!$selectLimit && $employee_attendance_list->StartRec > 1)
		$employee_attendance_list->Recordset->move($employee_attendance_list->StartRec - 1);
} elseif (!$employee_attendance->AllowAddDeleteRow && $employee_attendance_list->StopRec == 0) {
	$employee_attendance_list->StopRec = $employee_attendance->GridAddRowCount;
}

// Initialize aggregate
$employee_attendance->RowType = ROWTYPE_AGGREGATEINIT;
$employee_attendance->resetAttributes();
$employee_attendance_list->renderRow();
while ($employee_attendance_list->RecCnt < $employee_attendance_list->StopRec) {
	$employee_attendance_list->RecCnt++;
	if ($employee_attendance_list->RecCnt >= $employee_attendance_list->StartRec) {
		$employee_attendance_list->RowCnt++;

		// Set up key count
		$employee_attendance_list->KeyCount = $employee_attendance_list->RowIndex;

		// Init row class and style
		$employee_attendance->resetAttributes();
		$employee_attendance->CssClass = "";
		if ($employee_attendance->isGridAdd()) {
		} else {
			$employee_attendance_list->loadRowValues($employee_attendance_list->Recordset); // Load row values
		}
		$employee_attendance->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$employee_attendance->RowAttrs = array_merge($employee_attendance->RowAttrs, array('data-rowindex'=>$employee_attendance_list->RowCnt, 'id'=>'r' . $employee_attendance_list->RowCnt . '_employee_attendance', 'data-rowtype'=>$employee_attendance->RowType));

		// Render row
		$employee_attendance_list->renderRow();

		// Render list options
		$employee_attendance_list->renderListOptions();
?>
	<tr<?php echo $employee_attendance->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employee_attendance_list->ListOptions->render("body", "left", $employee_attendance_list->RowCnt);
?>
	<?php if ($employee_attendance->id->Visible) { // id ?>
		<td data-name="id"<?php echo $employee_attendance->id->cellAttributes() ?>>
<span id="el<?php echo $employee_attendance_list->RowCnt ?>_employee_attendance_id" class="employee_attendance_id">
<span<?php echo $employee_attendance->id->viewAttributes() ?>>
<?php echo $employee_attendance->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_attendance->employee->Visible) { // employee ?>
		<td data-name="employee"<?php echo $employee_attendance->employee->cellAttributes() ?>>
<span id="el<?php echo $employee_attendance_list->RowCnt ?>_employee_attendance_employee" class="employee_attendance_employee">
<span<?php echo $employee_attendance->employee->viewAttributes() ?>>
<?php echo $employee_attendance->employee->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_attendance->in_time->Visible) { // in_time ?>
		<td data-name="in_time"<?php echo $employee_attendance->in_time->cellAttributes() ?>>
<span id="el<?php echo $employee_attendance_list->RowCnt ?>_employee_attendance_in_time" class="employee_attendance_in_time">
<span<?php echo $employee_attendance->in_time->viewAttributes() ?>>
<?php echo $employee_attendance->in_time->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_attendance->out_time->Visible) { // out_time ?>
		<td data-name="out_time"<?php echo $employee_attendance->out_time->cellAttributes() ?>>
<span id="el<?php echo $employee_attendance_list->RowCnt ?>_employee_attendance_out_time" class="employee_attendance_out_time">
<span<?php echo $employee_attendance->out_time->viewAttributes() ?>>
<?php echo $employee_attendance->out_time->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$employee_attendance_list->ListOptions->render("body", "right", $employee_attendance_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$employee_attendance->isGridAdd())
		$employee_attendance_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$employee_attendance->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($employee_attendance_list->Recordset)
	$employee_attendance_list->Recordset->Close();
?>
<?php if (!$employee_attendance->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$employee_attendance->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($employee_attendance_list->Pager)) $employee_attendance_list->Pager = new NumericPager($employee_attendance_list->StartRec, $employee_attendance_list->DisplayRecs, $employee_attendance_list->TotalRecs, $employee_attendance_list->RecRange, $employee_attendance_list->AutoHidePager) ?>
<?php if ($employee_attendance_list->Pager->RecordCount > 0 && $employee_attendance_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($employee_attendance_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_attendance_list->pageUrl() ?>start=<?php echo $employee_attendance_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($employee_attendance_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_attendance_list->pageUrl() ?>start=<?php echo $employee_attendance_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($employee_attendance_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $employee_attendance_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($employee_attendance_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_attendance_list->pageUrl() ?>start=<?php echo $employee_attendance_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($employee_attendance_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_attendance_list->pageUrl() ?>start=<?php echo $employee_attendance_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($employee_attendance_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $employee_attendance_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $employee_attendance_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $employee_attendance_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($employee_attendance_list->TotalRecs > 0 && (!$employee_attendance_list->AutoHidePageSizeSelector || $employee_attendance_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="employee_attendance">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($employee_attendance_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($employee_attendance_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($employee_attendance_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($employee_attendance_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($employee_attendance_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($employee_attendance_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($employee_attendance->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $employee_attendance_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($employee_attendance_list->TotalRecs == 0 && !$employee_attendance->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $employee_attendance_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$employee_attendance_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$employee_attendance->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$employee_attendance->isExport()) { ?>
<script>
ew.scrollableTable("gmp_employee_attendance", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$employee_attendance_list->terminate();
?>