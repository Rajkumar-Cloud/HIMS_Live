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
$pharmacy_list = new pharmacy_list();

// Run the page
$pharmacy_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$pharmacy->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fpharmacylist = currentForm = new ew.Form("fpharmacylist", "list");
fpharmacylist.formKeyCountName = '<?php echo $pharmacy_list->FormKeyCountName ?>';

// Form_CustomValidate event
fpharmacylist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacylist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpharmacylist.lists["x_ip_id"] = <?php echo $pharmacy_list->ip_id->Lookup->toClientList() ?>;
fpharmacylist.lists["x_ip_id"].options = <?php echo JsonEncode($pharmacy_list->ip_id->lookupOptions()) ?>;
fpharmacylist.lists["x_status"] = <?php echo $pharmacy_list->status->Lookup->toClientList() ?>;
fpharmacylist.lists["x_status"].options = <?php echo JsonEncode($pharmacy_list->status->lookupOptions()) ?>;

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
<?php if (!$pharmacy->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($pharmacy_list->TotalRecs > 0 && $pharmacy_list->ExportOptions->visible()) { ?>
<?php $pharmacy_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_list->ImportOptions->visible()) { ?>
<?php $pharmacy_list->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$pharmacy_list->renderOtherOptions();
?>
<?php $pharmacy_list->showPageHeader(); ?>
<?php
$pharmacy_list->showMessage();
?>
<?php if ($pharmacy_list->TotalRecs > 0 || $pharmacy->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pharmacy_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pharmacy">
<?php if (!$pharmacy->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$pharmacy->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($pharmacy_list->Pager)) $pharmacy_list->Pager = new NumericPager($pharmacy_list->StartRec, $pharmacy_list->DisplayRecs, $pharmacy_list->TotalRecs, $pharmacy_list->RecRange, $pharmacy_list->AutoHidePager) ?>
<?php if ($pharmacy_list->Pager->RecordCount > 0 && $pharmacy_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($pharmacy_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_list->pageUrl() ?>start=<?php echo $pharmacy_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_list->pageUrl() ?>start=<?php echo $pharmacy_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($pharmacy_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $pharmacy_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_list->pageUrl() ?>start=<?php echo $pharmacy_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_list->pageUrl() ?>start=<?php echo $pharmacy_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($pharmacy_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $pharmacy_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $pharmacy_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $pharmacy_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($pharmacy_list->TotalRecs > 0 && (!$pharmacy_list->AutoHidePageSizeSelector || $pharmacy_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="pharmacy">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($pharmacy_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($pharmacy_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($pharmacy_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($pharmacy_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($pharmacy_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($pharmacy_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($pharmacy->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpharmacylist" id="fpharmacylist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy">
<div id="gmp_pharmacy" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($pharmacy_list->TotalRecs > 0 || $pharmacy->isGridEdit()) { ?>
<table id="tbl_pharmacylist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pharmacy_list->RowType = ROWTYPE_HEADER;

// Render list options
$pharmacy_list->renderListOptions();

// Render list options (header, left)
$pharmacy_list->ListOptions->render("header", "left");
?>
<?php if ($pharmacy->id->Visible) { // id ?>
	<?php if ($pharmacy->sortUrl($pharmacy->id) == "") { ?>
		<th data-name="id" class="<?php echo $pharmacy->id->headerCellClass() ?>"><div id="elh_pharmacy_id" class="pharmacy_id"><div class="ew-table-header-caption"><?php echo $pharmacy->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $pharmacy->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy->SortUrl($pharmacy->id) ?>',1);"><div id="elh_pharmacy_id" class="pharmacy_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy->op_id->Visible) { // op_id ?>
	<?php if ($pharmacy->sortUrl($pharmacy->op_id) == "") { ?>
		<th data-name="op_id" class="<?php echo $pharmacy->op_id->headerCellClass() ?>"><div id="elh_pharmacy_op_id" class="pharmacy_op_id"><div class="ew-table-header-caption"><?php echo $pharmacy->op_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="op_id" class="<?php echo $pharmacy->op_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy->SortUrl($pharmacy->op_id) ?>',1);"><div id="elh_pharmacy_op_id" class="pharmacy_op_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy->op_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy->op_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy->op_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy->ip_id->Visible) { // ip_id ?>
	<?php if ($pharmacy->sortUrl($pharmacy->ip_id) == "") { ?>
		<th data-name="ip_id" class="<?php echo $pharmacy->ip_id->headerCellClass() ?>"><div id="elh_pharmacy_ip_id" class="pharmacy_ip_id"><div class="ew-table-header-caption"><?php echo $pharmacy->ip_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ip_id" class="<?php echo $pharmacy->ip_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy->SortUrl($pharmacy->ip_id) ?>',1);"><div id="elh_pharmacy_ip_id" class="pharmacy_ip_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy->ip_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy->ip_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy->ip_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy->patient_id->Visible) { // patient_id ?>
	<?php if ($pharmacy->sortUrl($pharmacy->patient_id) == "") { ?>
		<th data-name="patient_id" class="<?php echo $pharmacy->patient_id->headerCellClass() ?>"><div id="elh_pharmacy_patient_id" class="pharmacy_patient_id"><div class="ew-table-header-caption"><?php echo $pharmacy->patient_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patient_id" class="<?php echo $pharmacy->patient_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy->SortUrl($pharmacy->patient_id) ?>',1);"><div id="elh_pharmacy_patient_id" class="pharmacy_patient_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy->patient_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy->patient_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy->patient_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy->charged_date->Visible) { // charged_date ?>
	<?php if ($pharmacy->sortUrl($pharmacy->charged_date) == "") { ?>
		<th data-name="charged_date" class="<?php echo $pharmacy->charged_date->headerCellClass() ?>"><div id="elh_pharmacy_charged_date" class="pharmacy_charged_date"><div class="ew-table-header-caption"><?php echo $pharmacy->charged_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="charged_date" class="<?php echo $pharmacy->charged_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy->SortUrl($pharmacy->charged_date) ?>',1);"><div id="elh_pharmacy_charged_date" class="pharmacy_charged_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy->charged_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy->charged_date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy->charged_date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy->status->Visible) { // status ?>
	<?php if ($pharmacy->sortUrl($pharmacy->status) == "") { ?>
		<th data-name="status" class="<?php echo $pharmacy->status->headerCellClass() ?>"><div id="elh_pharmacy_status" class="pharmacy_status"><div class="ew-table-header-caption"><?php echo $pharmacy->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $pharmacy->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy->SortUrl($pharmacy->status) ?>',1);"><div id="elh_pharmacy_status" class="pharmacy_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pharmacy_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($pharmacy->ExportAll && $pharmacy->isExport()) {
	$pharmacy_list->StopRec = $pharmacy_list->TotalRecs;
} else {

	// Set the last record to display
	if ($pharmacy_list->TotalRecs > $pharmacy_list->StartRec + $pharmacy_list->DisplayRecs - 1)
		$pharmacy_list->StopRec = $pharmacy_list->StartRec + $pharmacy_list->DisplayRecs - 1;
	else
		$pharmacy_list->StopRec = $pharmacy_list->TotalRecs;
}
$pharmacy_list->RecCnt = $pharmacy_list->StartRec - 1;
if ($pharmacy_list->Recordset && !$pharmacy_list->Recordset->EOF) {
	$pharmacy_list->Recordset->moveFirst();
	$selectLimit = $pharmacy_list->UseSelectLimit;
	if (!$selectLimit && $pharmacy_list->StartRec > 1)
		$pharmacy_list->Recordset->move($pharmacy_list->StartRec - 1);
} elseif (!$pharmacy->AllowAddDeleteRow && $pharmacy_list->StopRec == 0) {
	$pharmacy_list->StopRec = $pharmacy->GridAddRowCount;
}

// Initialize aggregate
$pharmacy->RowType = ROWTYPE_AGGREGATEINIT;
$pharmacy->resetAttributes();
$pharmacy_list->renderRow();
while ($pharmacy_list->RecCnt < $pharmacy_list->StopRec) {
	$pharmacy_list->RecCnt++;
	if ($pharmacy_list->RecCnt >= $pharmacy_list->StartRec) {
		$pharmacy_list->RowCnt++;

		// Set up key count
		$pharmacy_list->KeyCount = $pharmacy_list->RowIndex;

		// Init row class and style
		$pharmacy->resetAttributes();
		$pharmacy->CssClass = "";
		if ($pharmacy->isGridAdd()) {
		} else {
			$pharmacy_list->loadRowValues($pharmacy_list->Recordset); // Load row values
		}
		$pharmacy->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$pharmacy->RowAttrs = array_merge($pharmacy->RowAttrs, array('data-rowindex'=>$pharmacy_list->RowCnt, 'id'=>'r' . $pharmacy_list->RowCnt . '_pharmacy', 'data-rowtype'=>$pharmacy->RowType));

		// Render row
		$pharmacy_list->renderRow();

		// Render list options
		$pharmacy_list->renderListOptions();
?>
	<tr<?php echo $pharmacy->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_list->ListOptions->render("body", "left", $pharmacy_list->RowCnt);
?>
	<?php if ($pharmacy->id->Visible) { // id ?>
		<td data-name="id"<?php echo $pharmacy->id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_list->RowCnt ?>_pharmacy_id" class="pharmacy_id">
<span<?php echo $pharmacy->id->viewAttributes() ?>>
<?php echo $pharmacy->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy->op_id->Visible) { // op_id ?>
		<td data-name="op_id"<?php echo $pharmacy->op_id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_list->RowCnt ?>_pharmacy_op_id" class="pharmacy_op_id">
<span<?php echo $pharmacy->op_id->viewAttributes() ?>>
<?php echo $pharmacy->op_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy->ip_id->Visible) { // ip_id ?>
		<td data-name="ip_id"<?php echo $pharmacy->ip_id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_list->RowCnt ?>_pharmacy_ip_id" class="pharmacy_ip_id">
<span<?php echo $pharmacy->ip_id->viewAttributes() ?>>
<?php echo $pharmacy->ip_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy->patient_id->Visible) { // patient_id ?>
		<td data-name="patient_id"<?php echo $pharmacy->patient_id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_list->RowCnt ?>_pharmacy_patient_id" class="pharmacy_patient_id">
<span<?php echo $pharmacy->patient_id->viewAttributes() ?>>
<?php echo $pharmacy->patient_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy->charged_date->Visible) { // charged_date ?>
		<td data-name="charged_date"<?php echo $pharmacy->charged_date->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_list->RowCnt ?>_pharmacy_charged_date" class="pharmacy_charged_date">
<span<?php echo $pharmacy->charged_date->viewAttributes() ?>>
<?php echo $pharmacy->charged_date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy->status->Visible) { // status ?>
		<td data-name="status"<?php echo $pharmacy->status->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_list->RowCnt ?>_pharmacy_status" class="pharmacy_status">
<span<?php echo $pharmacy->status->viewAttributes() ?>>
<?php echo $pharmacy->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_list->ListOptions->render("body", "right", $pharmacy_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$pharmacy->isGridAdd())
		$pharmacy_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$pharmacy->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pharmacy_list->Recordset)
	$pharmacy_list->Recordset->Close();
?>
<?php if (!$pharmacy->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$pharmacy->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($pharmacy_list->Pager)) $pharmacy_list->Pager = new NumericPager($pharmacy_list->StartRec, $pharmacy_list->DisplayRecs, $pharmacy_list->TotalRecs, $pharmacy_list->RecRange, $pharmacy_list->AutoHidePager) ?>
<?php if ($pharmacy_list->Pager->RecordCount > 0 && $pharmacy_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($pharmacy_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_list->pageUrl() ?>start=<?php echo $pharmacy_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_list->pageUrl() ?>start=<?php echo $pharmacy_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($pharmacy_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $pharmacy_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_list->pageUrl() ?>start=<?php echo $pharmacy_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_list->pageUrl() ?>start=<?php echo $pharmacy_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($pharmacy_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $pharmacy_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $pharmacy_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $pharmacy_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($pharmacy_list->TotalRecs > 0 && (!$pharmacy_list->AutoHidePageSizeSelector || $pharmacy_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="pharmacy">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($pharmacy_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($pharmacy_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($pharmacy_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($pharmacy_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($pharmacy_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($pharmacy_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($pharmacy->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pharmacy_list->TotalRecs == 0 && !$pharmacy->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pharmacy_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$pharmacy_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$pharmacy->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$pharmacy->isExport()) { ?>
<script>
ew.scrollableTable("gmp_pharmacy", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$pharmacy_list->terminate();
?>