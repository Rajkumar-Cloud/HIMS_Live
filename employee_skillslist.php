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
$employee_skills_list = new employee_skills_list();

// Run the page
$employee_skills_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_skills_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$employee_skills->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var femployee_skillslist = currentForm = new ew.Form("femployee_skillslist", "list");
femployee_skillslist.formKeyCountName = '<?php echo $employee_skills_list->FormKeyCountName ?>';

// Form_CustomValidate event
femployee_skillslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_skillslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

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
<?php if (!$employee_skills->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($employee_skills_list->TotalRecs > 0 && $employee_skills_list->ExportOptions->visible()) { ?>
<?php $employee_skills_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($employee_skills_list->ImportOptions->visible()) { ?>
<?php $employee_skills_list->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$employee_skills_list->renderOtherOptions();
?>
<?php $employee_skills_list->showPageHeader(); ?>
<?php
$employee_skills_list->showMessage();
?>
<?php if ($employee_skills_list->TotalRecs > 0 || $employee_skills->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($employee_skills_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> employee_skills">
<?php if (!$employee_skills->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$employee_skills->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($employee_skills_list->Pager)) $employee_skills_list->Pager = new NumericPager($employee_skills_list->StartRec, $employee_skills_list->DisplayRecs, $employee_skills_list->TotalRecs, $employee_skills_list->RecRange, $employee_skills_list->AutoHidePager) ?>
<?php if ($employee_skills_list->Pager->RecordCount > 0 && $employee_skills_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($employee_skills_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_skills_list->pageUrl() ?>start=<?php echo $employee_skills_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($employee_skills_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_skills_list->pageUrl() ?>start=<?php echo $employee_skills_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($employee_skills_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $employee_skills_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($employee_skills_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_skills_list->pageUrl() ?>start=<?php echo $employee_skills_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($employee_skills_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_skills_list->pageUrl() ?>start=<?php echo $employee_skills_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($employee_skills_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $employee_skills_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $employee_skills_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $employee_skills_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($employee_skills_list->TotalRecs > 0 && (!$employee_skills_list->AutoHidePageSizeSelector || $employee_skills_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="employee_skills">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($employee_skills_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($employee_skills_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($employee_skills_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($employee_skills_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($employee_skills_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($employee_skills_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($employee_skills->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $employee_skills_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="femployee_skillslist" id="femployee_skillslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_skills_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_skills_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_skills">
<div id="gmp_employee_skills" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($employee_skills_list->TotalRecs > 0 || $employee_skills->isGridEdit()) { ?>
<table id="tbl_employee_skillslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$employee_skills_list->RowType = ROWTYPE_HEADER;

// Render list options
$employee_skills_list->renderListOptions();

// Render list options (header, left)
$employee_skills_list->ListOptions->render("header", "left");
?>
<?php if ($employee_skills->id->Visible) { // id ?>
	<?php if ($employee_skills->sortUrl($employee_skills->id) == "") { ?>
		<th data-name="id" class="<?php echo $employee_skills->id->headerCellClass() ?>"><div id="elh_employee_skills_id" class="employee_skills_id"><div class="ew-table-header-caption"><?php echo $employee_skills->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $employee_skills->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_skills->SortUrl($employee_skills->id) ?>',1);"><div id="elh_employee_skills_id" class="employee_skills_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_skills->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_skills->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_skills->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_skills->skill_id->Visible) { // skill_id ?>
	<?php if ($employee_skills->sortUrl($employee_skills->skill_id) == "") { ?>
		<th data-name="skill_id" class="<?php echo $employee_skills->skill_id->headerCellClass() ?>"><div id="elh_employee_skills_skill_id" class="employee_skills_skill_id"><div class="ew-table-header-caption"><?php echo $employee_skills->skill_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="skill_id" class="<?php echo $employee_skills->skill_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_skills->SortUrl($employee_skills->skill_id) ?>',1);"><div id="elh_employee_skills_skill_id" class="employee_skills_skill_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_skills->skill_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_skills->skill_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_skills->skill_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_skills->employee->Visible) { // employee ?>
	<?php if ($employee_skills->sortUrl($employee_skills->employee) == "") { ?>
		<th data-name="employee" class="<?php echo $employee_skills->employee->headerCellClass() ?>"><div id="elh_employee_skills_employee" class="employee_skills_employee"><div class="ew-table-header-caption"><?php echo $employee_skills->employee->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="employee" class="<?php echo $employee_skills->employee->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $employee_skills->SortUrl($employee_skills->employee) ?>',1);"><div id="elh_employee_skills_employee" class="employee_skills_employee">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_skills->employee->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_skills->employee->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_skills->employee->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$employee_skills_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($employee_skills->ExportAll && $employee_skills->isExport()) {
	$employee_skills_list->StopRec = $employee_skills_list->TotalRecs;
} else {

	// Set the last record to display
	if ($employee_skills_list->TotalRecs > $employee_skills_list->StartRec + $employee_skills_list->DisplayRecs - 1)
		$employee_skills_list->StopRec = $employee_skills_list->StartRec + $employee_skills_list->DisplayRecs - 1;
	else
		$employee_skills_list->StopRec = $employee_skills_list->TotalRecs;
}
$employee_skills_list->RecCnt = $employee_skills_list->StartRec - 1;
if ($employee_skills_list->Recordset && !$employee_skills_list->Recordset->EOF) {
	$employee_skills_list->Recordset->moveFirst();
	$selectLimit = $employee_skills_list->UseSelectLimit;
	if (!$selectLimit && $employee_skills_list->StartRec > 1)
		$employee_skills_list->Recordset->move($employee_skills_list->StartRec - 1);
} elseif (!$employee_skills->AllowAddDeleteRow && $employee_skills_list->StopRec == 0) {
	$employee_skills_list->StopRec = $employee_skills->GridAddRowCount;
}

// Initialize aggregate
$employee_skills->RowType = ROWTYPE_AGGREGATEINIT;
$employee_skills->resetAttributes();
$employee_skills_list->renderRow();
while ($employee_skills_list->RecCnt < $employee_skills_list->StopRec) {
	$employee_skills_list->RecCnt++;
	if ($employee_skills_list->RecCnt >= $employee_skills_list->StartRec) {
		$employee_skills_list->RowCnt++;

		// Set up key count
		$employee_skills_list->KeyCount = $employee_skills_list->RowIndex;

		// Init row class and style
		$employee_skills->resetAttributes();
		$employee_skills->CssClass = "";
		if ($employee_skills->isGridAdd()) {
		} else {
			$employee_skills_list->loadRowValues($employee_skills_list->Recordset); // Load row values
		}
		$employee_skills->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$employee_skills->RowAttrs = array_merge($employee_skills->RowAttrs, array('data-rowindex'=>$employee_skills_list->RowCnt, 'id'=>'r' . $employee_skills_list->RowCnt . '_employee_skills', 'data-rowtype'=>$employee_skills->RowType));

		// Render row
		$employee_skills_list->renderRow();

		// Render list options
		$employee_skills_list->renderListOptions();
?>
	<tr<?php echo $employee_skills->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employee_skills_list->ListOptions->render("body", "left", $employee_skills_list->RowCnt);
?>
	<?php if ($employee_skills->id->Visible) { // id ?>
		<td data-name="id"<?php echo $employee_skills->id->cellAttributes() ?>>
<span id="el<?php echo $employee_skills_list->RowCnt ?>_employee_skills_id" class="employee_skills_id">
<span<?php echo $employee_skills->id->viewAttributes() ?>>
<?php echo $employee_skills->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_skills->skill_id->Visible) { // skill_id ?>
		<td data-name="skill_id"<?php echo $employee_skills->skill_id->cellAttributes() ?>>
<span id="el<?php echo $employee_skills_list->RowCnt ?>_employee_skills_skill_id" class="employee_skills_skill_id">
<span<?php echo $employee_skills->skill_id->viewAttributes() ?>>
<?php echo $employee_skills->skill_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($employee_skills->employee->Visible) { // employee ?>
		<td data-name="employee"<?php echo $employee_skills->employee->cellAttributes() ?>>
<span id="el<?php echo $employee_skills_list->RowCnt ?>_employee_skills_employee" class="employee_skills_employee">
<span<?php echo $employee_skills->employee->viewAttributes() ?>>
<?php echo $employee_skills->employee->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$employee_skills_list->ListOptions->render("body", "right", $employee_skills_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$employee_skills->isGridAdd())
		$employee_skills_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$employee_skills->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($employee_skills_list->Recordset)
	$employee_skills_list->Recordset->Close();
?>
<?php if (!$employee_skills->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$employee_skills->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($employee_skills_list->Pager)) $employee_skills_list->Pager = new NumericPager($employee_skills_list->StartRec, $employee_skills_list->DisplayRecs, $employee_skills_list->TotalRecs, $employee_skills_list->RecRange, $employee_skills_list->AutoHidePager) ?>
<?php if ($employee_skills_list->Pager->RecordCount > 0 && $employee_skills_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($employee_skills_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_skills_list->pageUrl() ?>start=<?php echo $employee_skills_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($employee_skills_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_skills_list->pageUrl() ?>start=<?php echo $employee_skills_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($employee_skills_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $employee_skills_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($employee_skills_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_skills_list->pageUrl() ?>start=<?php echo $employee_skills_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($employee_skills_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $employee_skills_list->pageUrl() ?>start=<?php echo $employee_skills_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($employee_skills_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $employee_skills_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $employee_skills_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $employee_skills_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($employee_skills_list->TotalRecs > 0 && (!$employee_skills_list->AutoHidePageSizeSelector || $employee_skills_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="employee_skills">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($employee_skills_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($employee_skills_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($employee_skills_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($employee_skills_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($employee_skills_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($employee_skills_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($employee_skills->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $employee_skills_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($employee_skills_list->TotalRecs == 0 && !$employee_skills->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $employee_skills_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$employee_skills_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$employee_skills->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$employee_skills->isExport()) { ?>
<script>
ew.scrollableTable("gmp_employee_skills", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$employee_skills_list->terminate();
?>