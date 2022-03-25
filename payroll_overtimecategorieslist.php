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
$payroll_overtimecategories_list = new payroll_overtimecategories_list();

// Run the page
$payroll_overtimecategories_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$payroll_overtimecategories_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$payroll_overtimecategories->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fpayroll_overtimecategorieslist = currentForm = new ew.Form("fpayroll_overtimecategorieslist", "list");
fpayroll_overtimecategorieslist.formKeyCountName = '<?php echo $payroll_overtimecategories_list->FormKeyCountName ?>';

// Form_CustomValidate event
fpayroll_overtimecategorieslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpayroll_overtimecategorieslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

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
<?php if (!$payroll_overtimecategories->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($payroll_overtimecategories_list->TotalRecs > 0 && $payroll_overtimecategories_list->ExportOptions->visible()) { ?>
<?php $payroll_overtimecategories_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($payroll_overtimecategories_list->ImportOptions->visible()) { ?>
<?php $payroll_overtimecategories_list->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$payroll_overtimecategories_list->renderOtherOptions();
?>
<?php $payroll_overtimecategories_list->showPageHeader(); ?>
<?php
$payroll_overtimecategories_list->showMessage();
?>
<?php if ($payroll_overtimecategories_list->TotalRecs > 0 || $payroll_overtimecategories->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($payroll_overtimecategories_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> payroll_overtimecategories">
<?php if (!$payroll_overtimecategories->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$payroll_overtimecategories->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($payroll_overtimecategories_list->Pager)) $payroll_overtimecategories_list->Pager = new NumericPager($payroll_overtimecategories_list->StartRec, $payroll_overtimecategories_list->DisplayRecs, $payroll_overtimecategories_list->TotalRecs, $payroll_overtimecategories_list->RecRange, $payroll_overtimecategories_list->AutoHidePager) ?>
<?php if ($payroll_overtimecategories_list->Pager->RecordCount > 0 && $payroll_overtimecategories_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($payroll_overtimecategories_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $payroll_overtimecategories_list->pageUrl() ?>start=<?php echo $payroll_overtimecategories_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($payroll_overtimecategories_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $payroll_overtimecategories_list->pageUrl() ?>start=<?php echo $payroll_overtimecategories_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($payroll_overtimecategories_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $payroll_overtimecategories_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($payroll_overtimecategories_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $payroll_overtimecategories_list->pageUrl() ?>start=<?php echo $payroll_overtimecategories_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($payroll_overtimecategories_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $payroll_overtimecategories_list->pageUrl() ?>start=<?php echo $payroll_overtimecategories_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($payroll_overtimecategories_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $payroll_overtimecategories_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $payroll_overtimecategories_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $payroll_overtimecategories_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($payroll_overtimecategories_list->TotalRecs > 0 && (!$payroll_overtimecategories_list->AutoHidePageSizeSelector || $payroll_overtimecategories_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="payroll_overtimecategories">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($payroll_overtimecategories_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($payroll_overtimecategories_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($payroll_overtimecategories_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($payroll_overtimecategories_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($payroll_overtimecategories_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($payroll_overtimecategories_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($payroll_overtimecategories->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $payroll_overtimecategories_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpayroll_overtimecategorieslist" id="fpayroll_overtimecategorieslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($payroll_overtimecategories_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $payroll_overtimecategories_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="payroll_overtimecategories">
<div id="gmp_payroll_overtimecategories" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($payroll_overtimecategories_list->TotalRecs > 0 || $payroll_overtimecategories->isGridEdit()) { ?>
<table id="tbl_payroll_overtimecategorieslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$payroll_overtimecategories_list->RowType = ROWTYPE_HEADER;

// Render list options
$payroll_overtimecategories_list->renderListOptions();

// Render list options (header, left)
$payroll_overtimecategories_list->ListOptions->render("header", "left");
?>
<?php if ($payroll_overtimecategories->id->Visible) { // id ?>
	<?php if ($payroll_overtimecategories->sortUrl($payroll_overtimecategories->id) == "") { ?>
		<th data-name="id" class="<?php echo $payroll_overtimecategories->id->headerCellClass() ?>"><div id="elh_payroll_overtimecategories_id" class="payroll_overtimecategories_id"><div class="ew-table-header-caption"><?php echo $payroll_overtimecategories->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $payroll_overtimecategories->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $payroll_overtimecategories->SortUrl($payroll_overtimecategories->id) ?>',1);"><div id="elh_payroll_overtimecategories_id" class="payroll_overtimecategories_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $payroll_overtimecategories->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($payroll_overtimecategories->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($payroll_overtimecategories->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($payroll_overtimecategories->created->Visible) { // created ?>
	<?php if ($payroll_overtimecategories->sortUrl($payroll_overtimecategories->created) == "") { ?>
		<th data-name="created" class="<?php echo $payroll_overtimecategories->created->headerCellClass() ?>"><div id="elh_payroll_overtimecategories_created" class="payroll_overtimecategories_created"><div class="ew-table-header-caption"><?php echo $payroll_overtimecategories->created->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="created" class="<?php echo $payroll_overtimecategories->created->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $payroll_overtimecategories->SortUrl($payroll_overtimecategories->created) ?>',1);"><div id="elh_payroll_overtimecategories_created" class="payroll_overtimecategories_created">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $payroll_overtimecategories->created->caption() ?></span><span class="ew-table-header-sort"><?php if ($payroll_overtimecategories->created->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($payroll_overtimecategories->created->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($payroll_overtimecategories->updated->Visible) { // updated ?>
	<?php if ($payroll_overtimecategories->sortUrl($payroll_overtimecategories->updated) == "") { ?>
		<th data-name="updated" class="<?php echo $payroll_overtimecategories->updated->headerCellClass() ?>"><div id="elh_payroll_overtimecategories_updated" class="payroll_overtimecategories_updated"><div class="ew-table-header-caption"><?php echo $payroll_overtimecategories->updated->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="updated" class="<?php echo $payroll_overtimecategories->updated->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $payroll_overtimecategories->SortUrl($payroll_overtimecategories->updated) ?>',1);"><div id="elh_payroll_overtimecategories_updated" class="payroll_overtimecategories_updated">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $payroll_overtimecategories->updated->caption() ?></span><span class="ew-table-header-sort"><?php if ($payroll_overtimecategories->updated->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($payroll_overtimecategories->updated->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$payroll_overtimecategories_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($payroll_overtimecategories->ExportAll && $payroll_overtimecategories->isExport()) {
	$payroll_overtimecategories_list->StopRec = $payroll_overtimecategories_list->TotalRecs;
} else {

	// Set the last record to display
	if ($payroll_overtimecategories_list->TotalRecs > $payroll_overtimecategories_list->StartRec + $payroll_overtimecategories_list->DisplayRecs - 1)
		$payroll_overtimecategories_list->StopRec = $payroll_overtimecategories_list->StartRec + $payroll_overtimecategories_list->DisplayRecs - 1;
	else
		$payroll_overtimecategories_list->StopRec = $payroll_overtimecategories_list->TotalRecs;
}
$payroll_overtimecategories_list->RecCnt = $payroll_overtimecategories_list->StartRec - 1;
if ($payroll_overtimecategories_list->Recordset && !$payroll_overtimecategories_list->Recordset->EOF) {
	$payroll_overtimecategories_list->Recordset->moveFirst();
	$selectLimit = $payroll_overtimecategories_list->UseSelectLimit;
	if (!$selectLimit && $payroll_overtimecategories_list->StartRec > 1)
		$payroll_overtimecategories_list->Recordset->move($payroll_overtimecategories_list->StartRec - 1);
} elseif (!$payroll_overtimecategories->AllowAddDeleteRow && $payroll_overtimecategories_list->StopRec == 0) {
	$payroll_overtimecategories_list->StopRec = $payroll_overtimecategories->GridAddRowCount;
}

// Initialize aggregate
$payroll_overtimecategories->RowType = ROWTYPE_AGGREGATEINIT;
$payroll_overtimecategories->resetAttributes();
$payroll_overtimecategories_list->renderRow();
while ($payroll_overtimecategories_list->RecCnt < $payroll_overtimecategories_list->StopRec) {
	$payroll_overtimecategories_list->RecCnt++;
	if ($payroll_overtimecategories_list->RecCnt >= $payroll_overtimecategories_list->StartRec) {
		$payroll_overtimecategories_list->RowCnt++;

		// Set up key count
		$payroll_overtimecategories_list->KeyCount = $payroll_overtimecategories_list->RowIndex;

		// Init row class and style
		$payroll_overtimecategories->resetAttributes();
		$payroll_overtimecategories->CssClass = "";
		if ($payroll_overtimecategories->isGridAdd()) {
		} else {
			$payroll_overtimecategories_list->loadRowValues($payroll_overtimecategories_list->Recordset); // Load row values
		}
		$payroll_overtimecategories->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$payroll_overtimecategories->RowAttrs = array_merge($payroll_overtimecategories->RowAttrs, array('data-rowindex'=>$payroll_overtimecategories_list->RowCnt, 'id'=>'r' . $payroll_overtimecategories_list->RowCnt . '_payroll_overtimecategories', 'data-rowtype'=>$payroll_overtimecategories->RowType));

		// Render row
		$payroll_overtimecategories_list->renderRow();

		// Render list options
		$payroll_overtimecategories_list->renderListOptions();
?>
	<tr<?php echo $payroll_overtimecategories->rowAttributes() ?>>
<?php

// Render list options (body, left)
$payroll_overtimecategories_list->ListOptions->render("body", "left", $payroll_overtimecategories_list->RowCnt);
?>
	<?php if ($payroll_overtimecategories->id->Visible) { // id ?>
		<td data-name="id"<?php echo $payroll_overtimecategories->id->cellAttributes() ?>>
<span id="el<?php echo $payroll_overtimecategories_list->RowCnt ?>_payroll_overtimecategories_id" class="payroll_overtimecategories_id">
<span<?php echo $payroll_overtimecategories->id->viewAttributes() ?>>
<?php echo $payroll_overtimecategories->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($payroll_overtimecategories->created->Visible) { // created ?>
		<td data-name="created"<?php echo $payroll_overtimecategories->created->cellAttributes() ?>>
<span id="el<?php echo $payroll_overtimecategories_list->RowCnt ?>_payroll_overtimecategories_created" class="payroll_overtimecategories_created">
<span<?php echo $payroll_overtimecategories->created->viewAttributes() ?>>
<?php echo $payroll_overtimecategories->created->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($payroll_overtimecategories->updated->Visible) { // updated ?>
		<td data-name="updated"<?php echo $payroll_overtimecategories->updated->cellAttributes() ?>>
<span id="el<?php echo $payroll_overtimecategories_list->RowCnt ?>_payroll_overtimecategories_updated" class="payroll_overtimecategories_updated">
<span<?php echo $payroll_overtimecategories->updated->viewAttributes() ?>>
<?php echo $payroll_overtimecategories->updated->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$payroll_overtimecategories_list->ListOptions->render("body", "right", $payroll_overtimecategories_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$payroll_overtimecategories->isGridAdd())
		$payroll_overtimecategories_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$payroll_overtimecategories->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($payroll_overtimecategories_list->Recordset)
	$payroll_overtimecategories_list->Recordset->Close();
?>
<?php if (!$payroll_overtimecategories->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$payroll_overtimecategories->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($payroll_overtimecategories_list->Pager)) $payroll_overtimecategories_list->Pager = new NumericPager($payroll_overtimecategories_list->StartRec, $payroll_overtimecategories_list->DisplayRecs, $payroll_overtimecategories_list->TotalRecs, $payroll_overtimecategories_list->RecRange, $payroll_overtimecategories_list->AutoHidePager) ?>
<?php if ($payroll_overtimecategories_list->Pager->RecordCount > 0 && $payroll_overtimecategories_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($payroll_overtimecategories_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $payroll_overtimecategories_list->pageUrl() ?>start=<?php echo $payroll_overtimecategories_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($payroll_overtimecategories_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $payroll_overtimecategories_list->pageUrl() ?>start=<?php echo $payroll_overtimecategories_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($payroll_overtimecategories_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $payroll_overtimecategories_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($payroll_overtimecategories_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $payroll_overtimecategories_list->pageUrl() ?>start=<?php echo $payroll_overtimecategories_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($payroll_overtimecategories_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $payroll_overtimecategories_list->pageUrl() ?>start=<?php echo $payroll_overtimecategories_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($payroll_overtimecategories_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $payroll_overtimecategories_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $payroll_overtimecategories_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $payroll_overtimecategories_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($payroll_overtimecategories_list->TotalRecs > 0 && (!$payroll_overtimecategories_list->AutoHidePageSizeSelector || $payroll_overtimecategories_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="payroll_overtimecategories">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($payroll_overtimecategories_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($payroll_overtimecategories_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($payroll_overtimecategories_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($payroll_overtimecategories_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($payroll_overtimecategories_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($payroll_overtimecategories_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($payroll_overtimecategories->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $payroll_overtimecategories_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($payroll_overtimecategories_list->TotalRecs == 0 && !$payroll_overtimecategories->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $payroll_overtimecategories_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$payroll_overtimecategories_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$payroll_overtimecategories->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$payroll_overtimecategories->isExport()) { ?>
<script>
ew.scrollableTable("gmp_payroll_overtimecategories", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$payroll_overtimecategories_list->terminate();
?>