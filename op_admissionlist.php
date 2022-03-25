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
$op_admission_list = new op_admission_list();

// Run the page
$op_admission_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$op_admission_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$op_admission->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fop_admissionlist = currentForm = new ew.Form("fop_admissionlist", "list");
fop_admissionlist.formKeyCountName = '<?php echo $op_admission_list->FormKeyCountName ?>';

// Form_CustomValidate event
fop_admissionlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fop_admissionlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fop_admissionlist.lists["x_patient_id"] = <?php echo $op_admission_list->patient_id->Lookup->toClientList() ?>;
fop_admissionlist.lists["x_patient_id"].options = <?php echo JsonEncode($op_admission_list->patient_id->lookupOptions()) ?>;
fop_admissionlist.lists["x_physician_id"] = <?php echo $op_admission_list->physician_id->Lookup->toClientList() ?>;
fop_admissionlist.lists["x_physician_id"].options = <?php echo JsonEncode($op_admission_list->physician_id->lookupOptions()) ?>;
fop_admissionlist.lists["x_status"] = <?php echo $op_admission_list->status->Lookup->toClientList() ?>;
fop_admissionlist.lists["x_status"].options = <?php echo JsonEncode($op_admission_list->status->lookupOptions()) ?>;

// Form object for search
</script>
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
<?php if (!$op_admission->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($op_admission_list->TotalRecs > 0 && $op_admission_list->ExportOptions->visible()) { ?>
<?php $op_admission_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($op_admission_list->ImportOptions->visible()) { ?>
<?php $op_admission_list->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$op_admission_list->renderOtherOptions();
?>
<?php $op_admission_list->showPageHeader(); ?>
<?php
$op_admission_list->showMessage();
?>
<?php if ($op_admission_list->TotalRecs > 0 || $op_admission->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($op_admission_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> op_admission">
<?php if (!$op_admission->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$op_admission->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($op_admission_list->Pager)) $op_admission_list->Pager = new NumericPager($op_admission_list->StartRec, $op_admission_list->DisplayRecs, $op_admission_list->TotalRecs, $op_admission_list->RecRange, $op_admission_list->AutoHidePager) ?>
<?php if ($op_admission_list->Pager->RecordCount > 0 && $op_admission_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($op_admission_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $op_admission_list->pageUrl() ?>start=<?php echo $op_admission_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($op_admission_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $op_admission_list->pageUrl() ?>start=<?php echo $op_admission_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($op_admission_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $op_admission_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($op_admission_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $op_admission_list->pageUrl() ?>start=<?php echo $op_admission_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($op_admission_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $op_admission_list->pageUrl() ?>start=<?php echo $op_admission_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($op_admission_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $op_admission_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $op_admission_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $op_admission_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($op_admission_list->TotalRecs > 0 && (!$op_admission_list->AutoHidePageSizeSelector || $op_admission_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="op_admission">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($op_admission_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($op_admission_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($op_admission_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($op_admission_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($op_admission_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($op_admission_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($op_admission->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $op_admission_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fop_admissionlist" id="fop_admissionlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($op_admission_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $op_admission_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="op_admission">
<div id="gmp_op_admission" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($op_admission_list->TotalRecs > 0 || $op_admission->isGridEdit()) { ?>
<table id="tbl_op_admissionlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$op_admission_list->RowType = ROWTYPE_HEADER;

// Render list options
$op_admission_list->renderListOptions();

// Render list options (header, left)
$op_admission_list->ListOptions->render("header", "left");
?>
<?php if ($op_admission->id->Visible) { // id ?>
	<?php if ($op_admission->sortUrl($op_admission->id) == "") { ?>
		<th data-name="id" class="<?php echo $op_admission->id->headerCellClass() ?>"><div id="elh_op_admission_id" class="op_admission_id"><div class="ew-table-header-caption"><?php echo $op_admission->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $op_admission->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $op_admission->SortUrl($op_admission->id) ?>',1);"><div id="elh_op_admission_id" class="op_admission_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $op_admission->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($op_admission->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($op_admission->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($op_admission->patient_id->Visible) { // patient_id ?>
	<?php if ($op_admission->sortUrl($op_admission->patient_id) == "") { ?>
		<th data-name="patient_id" class="<?php echo $op_admission->patient_id->headerCellClass() ?>"><div id="elh_op_admission_patient_id" class="op_admission_patient_id"><div class="ew-table-header-caption"><?php echo $op_admission->patient_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patient_id" class="<?php echo $op_admission->patient_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $op_admission->SortUrl($op_admission->patient_id) ?>',1);"><div id="elh_op_admission_patient_id" class="op_admission_patient_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $op_admission->patient_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($op_admission->patient_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($op_admission->patient_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($op_admission->physician_id->Visible) { // physician_id ?>
	<?php if ($op_admission->sortUrl($op_admission->physician_id) == "") { ?>
		<th data-name="physician_id" class="<?php echo $op_admission->physician_id->headerCellClass() ?>"><div id="elh_op_admission_physician_id" class="op_admission_physician_id"><div class="ew-table-header-caption"><?php echo $op_admission->physician_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="physician_id" class="<?php echo $op_admission->physician_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $op_admission->SortUrl($op_admission->physician_id) ?>',1);"><div id="elh_op_admission_physician_id" class="op_admission_physician_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $op_admission->physician_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($op_admission->physician_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($op_admission->physician_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($op_admission->status->Visible) { // status ?>
	<?php if ($op_admission->sortUrl($op_admission->status) == "") { ?>
		<th data-name="status" class="<?php echo $op_admission->status->headerCellClass() ?>"><div id="elh_op_admission_status" class="op_admission_status"><div class="ew-table-header-caption"><?php echo $op_admission->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $op_admission->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $op_admission->SortUrl($op_admission->status) ?>',1);"><div id="elh_op_admission_status" class="op_admission_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $op_admission->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($op_admission->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($op_admission->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$op_admission_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($op_admission->ExportAll && $op_admission->isExport()) {
	$op_admission_list->StopRec = $op_admission_list->TotalRecs;
} else {

	// Set the last record to display
	if ($op_admission_list->TotalRecs > $op_admission_list->StartRec + $op_admission_list->DisplayRecs - 1)
		$op_admission_list->StopRec = $op_admission_list->StartRec + $op_admission_list->DisplayRecs - 1;
	else
		$op_admission_list->StopRec = $op_admission_list->TotalRecs;
}
$op_admission_list->RecCnt = $op_admission_list->StartRec - 1;
if ($op_admission_list->Recordset && !$op_admission_list->Recordset->EOF) {
	$op_admission_list->Recordset->moveFirst();
	$selectLimit = $op_admission_list->UseSelectLimit;
	if (!$selectLimit && $op_admission_list->StartRec > 1)
		$op_admission_list->Recordset->move($op_admission_list->StartRec - 1);
} elseif (!$op_admission->AllowAddDeleteRow && $op_admission_list->StopRec == 0) {
	$op_admission_list->StopRec = $op_admission->GridAddRowCount;
}

// Initialize aggregate
$op_admission->RowType = ROWTYPE_AGGREGATEINIT;
$op_admission->resetAttributes();
$op_admission_list->renderRow();
while ($op_admission_list->RecCnt < $op_admission_list->StopRec) {
	$op_admission_list->RecCnt++;
	if ($op_admission_list->RecCnt >= $op_admission_list->StartRec) {
		$op_admission_list->RowCnt++;

		// Set up key count
		$op_admission_list->KeyCount = $op_admission_list->RowIndex;

		// Init row class and style
		$op_admission->resetAttributes();
		$op_admission->CssClass = "";
		if ($op_admission->isGridAdd()) {
		} else {
			$op_admission_list->loadRowValues($op_admission_list->Recordset); // Load row values
		}
		$op_admission->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$op_admission->RowAttrs = array_merge($op_admission->RowAttrs, array('data-rowindex'=>$op_admission_list->RowCnt, 'id'=>'r' . $op_admission_list->RowCnt . '_op_admission', 'data-rowtype'=>$op_admission->RowType));

		// Render row
		$op_admission_list->renderRow();

		// Render list options
		$op_admission_list->renderListOptions();
?>
	<tr<?php echo $op_admission->rowAttributes() ?>>
<?php

// Render list options (body, left)
$op_admission_list->ListOptions->render("body", "left", $op_admission_list->RowCnt);
?>
	<?php if ($op_admission->id->Visible) { // id ?>
		<td data-name="id"<?php echo $op_admission->id->cellAttributes() ?>>
<span id="el<?php echo $op_admission_list->RowCnt ?>_op_admission_id" class="op_admission_id">
<span<?php echo $op_admission->id->viewAttributes() ?>>
<?php echo $op_admission->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($op_admission->patient_id->Visible) { // patient_id ?>
		<td data-name="patient_id"<?php echo $op_admission->patient_id->cellAttributes() ?>>
<span id="el<?php echo $op_admission_list->RowCnt ?>_op_admission_patient_id" class="op_admission_patient_id">
<span<?php echo $op_admission->patient_id->viewAttributes() ?>>
<?php echo $op_admission->patient_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($op_admission->physician_id->Visible) { // physician_id ?>
		<td data-name="physician_id"<?php echo $op_admission->physician_id->cellAttributes() ?>>
<span id="el<?php echo $op_admission_list->RowCnt ?>_op_admission_physician_id" class="op_admission_physician_id">
<span<?php echo $op_admission->physician_id->viewAttributes() ?>>
<?php echo $op_admission->physician_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($op_admission->status->Visible) { // status ?>
		<td data-name="status"<?php echo $op_admission->status->cellAttributes() ?>>
<span id="el<?php echo $op_admission_list->RowCnt ?>_op_admission_status" class="op_admission_status">
<span<?php echo $op_admission->status->viewAttributes() ?>>
<?php echo $op_admission->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$op_admission_list->ListOptions->render("body", "right", $op_admission_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$op_admission->isGridAdd())
		$op_admission_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$op_admission->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($op_admission_list->Recordset)
	$op_admission_list->Recordset->Close();
?>
<?php if (!$op_admission->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$op_admission->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($op_admission_list->Pager)) $op_admission_list->Pager = new NumericPager($op_admission_list->StartRec, $op_admission_list->DisplayRecs, $op_admission_list->TotalRecs, $op_admission_list->RecRange, $op_admission_list->AutoHidePager) ?>
<?php if ($op_admission_list->Pager->RecordCount > 0 && $op_admission_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($op_admission_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $op_admission_list->pageUrl() ?>start=<?php echo $op_admission_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($op_admission_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $op_admission_list->pageUrl() ?>start=<?php echo $op_admission_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($op_admission_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $op_admission_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($op_admission_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $op_admission_list->pageUrl() ?>start=<?php echo $op_admission_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($op_admission_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $op_admission_list->pageUrl() ?>start=<?php echo $op_admission_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($op_admission_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $op_admission_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $op_admission_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $op_admission_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($op_admission_list->TotalRecs > 0 && (!$op_admission_list->AutoHidePageSizeSelector || $op_admission_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="op_admission">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($op_admission_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($op_admission_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($op_admission_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($op_admission_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($op_admission_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($op_admission_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($op_admission->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $op_admission_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($op_admission_list->TotalRecs == 0 && !$op_admission->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $op_admission_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$op_admission_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$op_admission->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$op_admission_list->terminate();
?>