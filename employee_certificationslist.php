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
$employee_certifications_list = new employee_certifications_list();

// Run the page
$employee_certifications_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_certifications_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$employee_certifications->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var femployee_certificationslist = currentForm = new ew.Form("femployee_certificationslist", "list");
femployee_certificationslist.formKeyCountName = '<?php echo $employee_certifications_list->FormKeyCountName ?>';

// Form_CustomValidate event
femployee_certificationslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_certificationslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

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
<?php if (!$employee_certifications->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($employee_certifications_list->TotalRecs > 0 && $employee_certifications_list->ExportOptions->visible()) { ?>
<?php $employee_certifications_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($employee_certifications_list->ImportOptions->visible()) { ?>
<?php $employee_certifications_list->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$employee_certifications_list->renderOtherOptions();
?>
<?php $employee_certifications_list->showPageHeader(); ?>
<?php
$employee_certifications_list->showMessage();
?>
<?php if ($employee_certifications_list->TotalRecs > 0 || $employee_certifications->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($employee_certifications_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> employee_certifications">
<?php if (!$employee_certifications->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$employee_certifications->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($employee_certifications_list->Pager)) $employee_certifications_list->Pager = new NumericPager($employee_certifications_list->StartRec, $employee_certifications_list->DisplayRecs, $employee_certifications_list->TotalRecs, $employee_certifications_list->RecRange, $employee_certifications_list->AutoHidePager) ?>
<?php if ($employee_certifications_list->Pager->RecordCount > 0 && $employee_certifications_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($employee_certifications_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_certifications_list->pageUrl() ?>start=<?php echo $employee_certifications_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($employee_certifications_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_certifications_list->pageUrl() ?>start=<?php echo $employee_certifications_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($employee_certifications_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $employee_certifications_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($employee_certifications_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_certifications_list->pageUrl() ?>start=<?php echo $employee_certifications_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($employee_certifications_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_certifications_list->pageUrl() ?>start=<?php echo $employee_certifications_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($employee_certifications_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $employee_certifications_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $employee_certifications_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $employee_certifications_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($employee_certifications_list->TotalRecs > 0 && (!$employee_certifications_list->AutoHidePageSizeSelector || $employee_certifications_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="employee_certifications">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($employee_certifications_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($employee_certifications_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($employee_certifications_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($employee_certifications_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($employee_certifications_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($employee_certifications_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($employee_certifications->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $employee_certifications_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="femployee_certificationslist" id="femployee_certificationslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_certifications_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_certifications_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_certifications">
<div id="gmp_employee_certifications" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($employee_certifications_list->TotalRecs > 0 || $employee_certifications->isGridEdit()) { ?>
<table id="tbl_employee_certificationslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$employee_certifications_list->RowType = ROWTYPE_HEADER;

// Render list options
$employee_certifications_list->renderListOptions();

// Render list options (header, left)
$employee_certifications_list->ListOptions->render("header", "left");
?>
<?php if ($employee_certifications->id->Visible) { // id ?>
	<?php if ($employee_certifications->sortUrl($employee_certifications->id) == "") { ?>
		<th data-name="id" class="<?php echo $employee_certifications->id->headerCellClass() ?>"><div id="elh_employee_certifications_id" class="employee_certifications_id"><div class="ew-table-header-caption"><?php echo $employee_certifications->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $employee_certifications->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_certifications->SortUrl($employee_certifications->id) ?>',1);"><div id="elh_employee_certifications_id" class="employee_certifications_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_certifications->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_certifications->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_certifications->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_certifications->certification_id->Visible) { // certification_id ?>
	<?php if ($employee_certifications->sortUrl($employee_certifications->certification_id) == "") { ?>
		<th data-name="certification_id" class="<?php echo $employee_certifications->certification_id->headerCellClass() ?>"><div id="elh_employee_certifications_certification_id" class="employee_certifications_certification_id"><div class="ew-table-header-caption"><?php echo $employee_certifications->certification_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="certification_id" class="<?php echo $employee_certifications->certification_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_certifications->SortUrl($employee_certifications->certification_id) ?>',1);"><div id="elh_employee_certifications_certification_id" class="employee_certifications_certification_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_certifications->certification_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_certifications->certification_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_certifications->certification_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_certifications->employee->Visible) { // employee ?>
	<?php if ($employee_certifications->sortUrl($employee_certifications->employee) == "") { ?>
		<th data-name="employee" class="<?php echo $employee_certifications->employee->headerCellClass() ?>"><div id="elh_employee_certifications_employee" class="employee_certifications_employee"><div class="ew-table-header-caption"><?php echo $employee_certifications->employee->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="employee" class="<?php echo $employee_certifications->employee->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_certifications->SortUrl($employee_certifications->employee) ?>',1);"><div id="elh_employee_certifications_employee" class="employee_certifications_employee">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_certifications->employee->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_certifications->employee->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_certifications->employee->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_certifications->date_start->Visible) { // date_start ?>
	<?php if ($employee_certifications->sortUrl($employee_certifications->date_start) == "") { ?>
		<th data-name="date_start" class="<?php echo $employee_certifications->date_start->headerCellClass() ?>"><div id="elh_employee_certifications_date_start" class="employee_certifications_date_start"><div class="ew-table-header-caption"><?php echo $employee_certifications->date_start->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="date_start" class="<?php echo $employee_certifications->date_start->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_certifications->SortUrl($employee_certifications->date_start) ?>',1);"><div id="elh_employee_certifications_date_start" class="employee_certifications_date_start">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_certifications->date_start->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_certifications->date_start->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_certifications->date_start->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_certifications->date_end->Visible) { // date_end ?>
	<?php if ($employee_certifications->sortUrl($employee_certifications->date_end) == "") { ?>
		<th data-name="date_end" class="<?php echo $employee_certifications->date_end->headerCellClass() ?>"><div id="elh_employee_certifications_date_end" class="employee_certifications_date_end"><div class="ew-table-header-caption"><?php echo $employee_certifications->date_end->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="date_end" class="<?php echo $employee_certifications->date_end->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_certifications->SortUrl($employee_certifications->date_end) ?>',1);"><div id="elh_employee_certifications_date_end" class="employee_certifications_date_end">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_certifications->date_end->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_certifications->date_end->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_certifications->date_end->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$employee_certifications_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($employee_certifications->ExportAll && $employee_certifications->isExport()) {
	$employee_certifications_list->StopRec = $employee_certifications_list->TotalRecs;
} else {

	// Set the last record to display
	if ($employee_certifications_list->TotalRecs > $employee_certifications_list->StartRec + $employee_certifications_list->DisplayRecs - 1)
		$employee_certifications_list->StopRec = $employee_certifications_list->StartRec + $employee_certifications_list->DisplayRecs - 1;
	else
		$employee_certifications_list->StopRec = $employee_certifications_list->TotalRecs;
}
$employee_certifications_list->RecCnt = $employee_certifications_list->StartRec - 1;
if ($employee_certifications_list->Recordset && !$employee_certifications_list->Recordset->EOF) {
	$employee_certifications_list->Recordset->moveFirst();
	$selectLimit = $employee_certifications_list->UseSelectLimit;
	if (!$selectLimit && $employee_certifications_list->StartRec > 1)
		$employee_certifications_list->Recordset->move($employee_certifications_list->StartRec - 1);
} elseif (!$employee_certifications->AllowAddDeleteRow && $employee_certifications_list->StopRec == 0) {
	$employee_certifications_list->StopRec = $employee_certifications->GridAddRowCount;
}

// Initialize aggregate
$employee_certifications->RowType = ROWTYPE_AGGREGATEINIT;
$employee_certifications->resetAttributes();
$employee_certifications_list->renderRow();
while ($employee_certifications_list->RecCnt < $employee_certifications_list->StopRec) {
	$employee_certifications_list->RecCnt++;
	if ($employee_certifications_list->RecCnt >= $employee_certifications_list->StartRec) {
		$employee_certifications_list->RowCnt++;

		// Set up key count
		$employee_certifications_list->KeyCount = $employee_certifications_list->RowIndex;

		// Init row class and style
		$employee_certifications->resetAttributes();
		$employee_certifications->CssClass = "";
		if ($employee_certifications->isGridAdd()) {
		} else {
			$employee_certifications_list->loadRowValues($employee_certifications_list->Recordset); // Load row values
		}
		$employee_certifications->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$employee_certifications->RowAttrs = array_merge($employee_certifications->RowAttrs, array('data-rowindex'=>$employee_certifications_list->RowCnt, 'id'=>'r' . $employee_certifications_list->RowCnt . '_employee_certifications', 'data-rowtype'=>$employee_certifications->RowType));

		// Render row
		$employee_certifications_list->renderRow();

		// Render list options
		$employee_certifications_list->renderListOptions();
?>
	<tr<?php echo $employee_certifications->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employee_certifications_list->ListOptions->render("body", "left", $employee_certifications_list->RowCnt);
?>
	<?php if ($employee_certifications->id->Visible) { // id ?>
		<td data-name="id"<?php echo $employee_certifications->id->cellAttributes() ?>>
<span id="el<?php echo $employee_certifications_list->RowCnt ?>_employee_certifications_id" class="employee_certifications_id">
<span<?php echo $employee_certifications->id->viewAttributes() ?>>
<?php echo $employee_certifications->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_certifications->certification_id->Visible) { // certification_id ?>
		<td data-name="certification_id"<?php echo $employee_certifications->certification_id->cellAttributes() ?>>
<span id="el<?php echo $employee_certifications_list->RowCnt ?>_employee_certifications_certification_id" class="employee_certifications_certification_id">
<span<?php echo $employee_certifications->certification_id->viewAttributes() ?>>
<?php echo $employee_certifications->certification_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_certifications->employee->Visible) { // employee ?>
		<td data-name="employee"<?php echo $employee_certifications->employee->cellAttributes() ?>>
<span id="el<?php echo $employee_certifications_list->RowCnt ?>_employee_certifications_employee" class="employee_certifications_employee">
<span<?php echo $employee_certifications->employee->viewAttributes() ?>>
<?php echo $employee_certifications->employee->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_certifications->date_start->Visible) { // date_start ?>
		<td data-name="date_start"<?php echo $employee_certifications->date_start->cellAttributes() ?>>
<span id="el<?php echo $employee_certifications_list->RowCnt ?>_employee_certifications_date_start" class="employee_certifications_date_start">
<span<?php echo $employee_certifications->date_start->viewAttributes() ?>>
<?php echo $employee_certifications->date_start->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_certifications->date_end->Visible) { // date_end ?>
		<td data-name="date_end"<?php echo $employee_certifications->date_end->cellAttributes() ?>>
<span id="el<?php echo $employee_certifications_list->RowCnt ?>_employee_certifications_date_end" class="employee_certifications_date_end">
<span<?php echo $employee_certifications->date_end->viewAttributes() ?>>
<?php echo $employee_certifications->date_end->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$employee_certifications_list->ListOptions->render("body", "right", $employee_certifications_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$employee_certifications->isGridAdd())
		$employee_certifications_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$employee_certifications->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($employee_certifications_list->Recordset)
	$employee_certifications_list->Recordset->Close();
?>
<?php if (!$employee_certifications->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$employee_certifications->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($employee_certifications_list->Pager)) $employee_certifications_list->Pager = new NumericPager($employee_certifications_list->StartRec, $employee_certifications_list->DisplayRecs, $employee_certifications_list->TotalRecs, $employee_certifications_list->RecRange, $employee_certifications_list->AutoHidePager) ?>
<?php if ($employee_certifications_list->Pager->RecordCount > 0 && $employee_certifications_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($employee_certifications_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_certifications_list->pageUrl() ?>start=<?php echo $employee_certifications_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($employee_certifications_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_certifications_list->pageUrl() ?>start=<?php echo $employee_certifications_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($employee_certifications_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $employee_certifications_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($employee_certifications_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_certifications_list->pageUrl() ?>start=<?php echo $employee_certifications_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($employee_certifications_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_certifications_list->pageUrl() ?>start=<?php echo $employee_certifications_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($employee_certifications_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $employee_certifications_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $employee_certifications_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $employee_certifications_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($employee_certifications_list->TotalRecs > 0 && (!$employee_certifications_list->AutoHidePageSizeSelector || $employee_certifications_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="employee_certifications">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($employee_certifications_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($employee_certifications_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($employee_certifications_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($employee_certifications_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($employee_certifications_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($employee_certifications_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($employee_certifications->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $employee_certifications_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($employee_certifications_list->TotalRecs == 0 && !$employee_certifications->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $employee_certifications_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$employee_certifications_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$employee_certifications->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$employee_certifications->isExport()) { ?>
<script>
ew.scrollableTable("gmp_employee_certifications", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$employee_certifications_list->terminate();
?>