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
$view_pharmacy_pharled_list = new view_pharmacy_pharled_list();

// Run the page
$view_pharmacy_pharled_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacy_pharled_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_pharmacy_pharled->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_pharmacy_pharledlist = currentForm = new ew.Form("fview_pharmacy_pharledlist", "list");
fview_pharmacy_pharledlist.formKeyCountName = '<?php echo $view_pharmacy_pharled_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_pharmacy_pharledlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_pharmacy_pharledlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

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
<?php if (!$view_pharmacy_pharled->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_pharmacy_pharled_list->TotalRecs > 0 && $view_pharmacy_pharled_list->ExportOptions->visible()) { ?>
<?php $view_pharmacy_pharled_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_pharled_list->ImportOptions->visible()) { ?>
<?php $view_pharmacy_pharled_list->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_pharmacy_pharled_list->renderOtherOptions();
?>
<?php $view_pharmacy_pharled_list->showPageHeader(); ?>
<?php
$view_pharmacy_pharled_list->showMessage();
?>
<?php if ($view_pharmacy_pharled_list->TotalRecs > 0 || $view_pharmacy_pharled->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_pharmacy_pharled_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_pharmacy_pharled">
<?php if (!$view_pharmacy_pharled->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_pharmacy_pharled->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_pharmacy_pharled_list->Pager)) $view_pharmacy_pharled_list->Pager = new NumericPager($view_pharmacy_pharled_list->StartRec, $view_pharmacy_pharled_list->DisplayRecs, $view_pharmacy_pharled_list->TotalRecs, $view_pharmacy_pharled_list->RecRange, $view_pharmacy_pharled_list->AutoHidePager) ?>
<?php if ($view_pharmacy_pharled_list->Pager->RecordCount > 0 && $view_pharmacy_pharled_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_pharmacy_pharled_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_pharled_list->pageUrl() ?>start=<?php echo $view_pharmacy_pharled_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_pharled_list->pageUrl() ?>start=<?php echo $view_pharmacy_pharled_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_pharmacy_pharled_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_pharmacy_pharled_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_pharled_list->pageUrl() ?>start=<?php echo $view_pharmacy_pharled_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_pharled_list->pageUrl() ?>start=<?php echo $view_pharmacy_pharled_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_pharmacy_pharled_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_pharmacy_pharled_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_pharmacy_pharled_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_list->TotalRecs > 0 && (!$view_pharmacy_pharled_list->AutoHidePageSizeSelector || $view_pharmacy_pharled_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_pharmacy_pharled">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_pharmacy_pharled_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_pharmacy_pharled_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_pharmacy_pharled_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_pharmacy_pharled_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_pharmacy_pharled_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_pharmacy_pharled_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_pharmacy_pharled->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_pharled_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_pharmacy_pharledlist" id="fview_pharmacy_pharledlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_pharmacy_pharled_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_pharmacy_pharled_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_pharled">
<div id="gmp_view_pharmacy_pharled" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_pharmacy_pharled_list->TotalRecs > 0 || $view_pharmacy_pharled->isGridEdit()) { ?>
<table id="tbl_view_pharmacy_pharledlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_pharmacy_pharled_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_pharmacy_pharled_list->renderListOptions();

// Render list options (header, left)
$view_pharmacy_pharled_list->ListOptions->render("header", "left");
?>
<?php if ($view_pharmacy_pharled->HospID->Visible) { // HospID ?>
	<?php if ($view_pharmacy_pharled->sortUrl($view_pharmacy_pharled->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_pharmacy_pharled->HospID->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_HospID" class="view_pharmacy_pharled_HospID"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_pharmacy_pharled->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_pharled->SortUrl($view_pharmacy_pharled->HospID) ?>',1);"><div id="elh_view_pharmacy_pharled_HospID" class="view_pharmacy_pharled_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled->BRCODE->Visible) { // BRCODE ?>
	<?php if ($view_pharmacy_pharled->sortUrl($view_pharmacy_pharled->BRCODE) == "") { ?>
		<th data-name="BRCODE" class="<?php echo $view_pharmacy_pharled->BRCODE->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_BRCODE" class="view_pharmacy_pharled_BRCODE"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled->BRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BRCODE" class="<?php echo $view_pharmacy_pharled->BRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_pharled->SortUrl($view_pharmacy_pharled->BRCODE) ?>',1);"><div id="elh_view_pharmacy_pharled_BRCODE" class="view_pharmacy_pharled_BRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled->BRCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled->BRCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled->BRCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled->PSGST->Visible) { // PSGST ?>
	<?php if ($view_pharmacy_pharled->sortUrl($view_pharmacy_pharled->PSGST) == "") { ?>
		<th data-name="PSGST" class="<?php echo $view_pharmacy_pharled->PSGST->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_PSGST" class="view_pharmacy_pharled_PSGST"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled->PSGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PSGST" class="<?php echo $view_pharmacy_pharled->PSGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_pharled->SortUrl($view_pharmacy_pharled->PSGST) ?>',1);"><div id="elh_view_pharmacy_pharled_PSGST" class="view_pharmacy_pharled_PSGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled->PSGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled->PSGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled->PSGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled->PCGST->Visible) { // PCGST ?>
	<?php if ($view_pharmacy_pharled->sortUrl($view_pharmacy_pharled->PCGST) == "") { ?>
		<th data-name="PCGST" class="<?php echo $view_pharmacy_pharled->PCGST->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_PCGST" class="view_pharmacy_pharled_PCGST"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled->PCGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PCGST" class="<?php echo $view_pharmacy_pharled->PCGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_pharled->SortUrl($view_pharmacy_pharled->PCGST) ?>',1);"><div id="elh_view_pharmacy_pharled_PCGST" class="view_pharmacy_pharled_PCGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled->PCGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled->PCGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled->PCGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled->SSGST->Visible) { // SSGST ?>
	<?php if ($view_pharmacy_pharled->sortUrl($view_pharmacy_pharled->SSGST) == "") { ?>
		<th data-name="SSGST" class="<?php echo $view_pharmacy_pharled->SSGST->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_SSGST" class="view_pharmacy_pharled_SSGST"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled->SSGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SSGST" class="<?php echo $view_pharmacy_pharled->SSGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_pharled->SortUrl($view_pharmacy_pharled->SSGST) ?>',1);"><div id="elh_view_pharmacy_pharled_SSGST" class="view_pharmacy_pharled_SSGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled->SSGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled->SSGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled->SSGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled->SCGST->Visible) { // SCGST ?>
	<?php if ($view_pharmacy_pharled->sortUrl($view_pharmacy_pharled->SCGST) == "") { ?>
		<th data-name="SCGST" class="<?php echo $view_pharmacy_pharled->SCGST->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_SCGST" class="view_pharmacy_pharled_SCGST"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled->SCGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SCGST" class="<?php echo $view_pharmacy_pharled->SCGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_pharled->SortUrl($view_pharmacy_pharled->SCGST) ?>',1);"><div id="elh_view_pharmacy_pharled_SCGST" class="view_pharmacy_pharled_SCGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled->SCGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled->SCGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled->SCGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled->SalRate->Visible) { // SalRate ?>
	<?php if ($view_pharmacy_pharled->sortUrl($view_pharmacy_pharled->SalRate) == "") { ?>
		<th data-name="SalRate" class="<?php echo $view_pharmacy_pharled->SalRate->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_SalRate" class="view_pharmacy_pharled_SalRate"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled->SalRate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SalRate" class="<?php echo $view_pharmacy_pharled->SalRate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_pharled->SortUrl($view_pharmacy_pharled->SalRate) ?>',1);"><div id="elh_view_pharmacy_pharled_SalRate" class="view_pharmacy_pharled_SalRate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled->SalRate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled->SalRate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled->SalRate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled->PurValue->Visible) { // PurValue ?>
	<?php if ($view_pharmacy_pharled->sortUrl($view_pharmacy_pharled->PurValue) == "") { ?>
		<th data-name="PurValue" class="<?php echo $view_pharmacy_pharled->PurValue->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_PurValue" class="view_pharmacy_pharled_PurValue"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled->PurValue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PurValue" class="<?php echo $view_pharmacy_pharled->PurValue->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_pharled->SortUrl($view_pharmacy_pharled->PurValue) ?>',1);"><div id="elh_view_pharmacy_pharled_PurValue" class="view_pharmacy_pharled_PurValue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled->PurValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled->PurValue->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled->PurValue->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_pharled->PUnit->Visible) { // PUnit ?>
	<?php if ($view_pharmacy_pharled->sortUrl($view_pharmacy_pharled->PUnit) == "") { ?>
		<th data-name="PUnit" class="<?php echo $view_pharmacy_pharled->PUnit->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_PUnit" class="view_pharmacy_pharled_PUnit"><div class="ew-table-header-caption"><?php echo $view_pharmacy_pharled->PUnit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PUnit" class="<?php echo $view_pharmacy_pharled->PUnit->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_pharled->SortUrl($view_pharmacy_pharled->PUnit) ?>',1);"><div id="elh_view_pharmacy_pharled_PUnit" class="view_pharmacy_pharled_PUnit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_pharled->PUnit->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_pharled->PUnit->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_pharled->PUnit->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_pharmacy_pharled_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_pharmacy_pharled->ExportAll && $view_pharmacy_pharled->isExport()) {
	$view_pharmacy_pharled_list->StopRec = $view_pharmacy_pharled_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_pharmacy_pharled_list->TotalRecs > $view_pharmacy_pharled_list->StartRec + $view_pharmacy_pharled_list->DisplayRecs - 1)
		$view_pharmacy_pharled_list->StopRec = $view_pharmacy_pharled_list->StartRec + $view_pharmacy_pharled_list->DisplayRecs - 1;
	else
		$view_pharmacy_pharled_list->StopRec = $view_pharmacy_pharled_list->TotalRecs;
}
$view_pharmacy_pharled_list->RecCnt = $view_pharmacy_pharled_list->StartRec - 1;
if ($view_pharmacy_pharled_list->Recordset && !$view_pharmacy_pharled_list->Recordset->EOF) {
	$view_pharmacy_pharled_list->Recordset->moveFirst();
	$selectLimit = $view_pharmacy_pharled_list->UseSelectLimit;
	if (!$selectLimit && $view_pharmacy_pharled_list->StartRec > 1)
		$view_pharmacy_pharled_list->Recordset->move($view_pharmacy_pharled_list->StartRec - 1);
} elseif (!$view_pharmacy_pharled->AllowAddDeleteRow && $view_pharmacy_pharled_list->StopRec == 0) {
	$view_pharmacy_pharled_list->StopRec = $view_pharmacy_pharled->GridAddRowCount;
}

// Initialize aggregate
$view_pharmacy_pharled->RowType = ROWTYPE_AGGREGATEINIT;
$view_pharmacy_pharled->resetAttributes();
$view_pharmacy_pharled_list->renderRow();
while ($view_pharmacy_pharled_list->RecCnt < $view_pharmacy_pharled_list->StopRec) {
	$view_pharmacy_pharled_list->RecCnt++;
	if ($view_pharmacy_pharled_list->RecCnt >= $view_pharmacy_pharled_list->StartRec) {
		$view_pharmacy_pharled_list->RowCnt++;

		// Set up key count
		$view_pharmacy_pharled_list->KeyCount = $view_pharmacy_pharled_list->RowIndex;

		// Init row class and style
		$view_pharmacy_pharled->resetAttributes();
		$view_pharmacy_pharled->CssClass = "";
		if ($view_pharmacy_pharled->isGridAdd()) {
		} else {
			$view_pharmacy_pharled_list->loadRowValues($view_pharmacy_pharled_list->Recordset); // Load row values
		}
		$view_pharmacy_pharled->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_pharmacy_pharled->RowAttrs = array_merge($view_pharmacy_pharled->RowAttrs, array('data-rowindex'=>$view_pharmacy_pharled_list->RowCnt, 'id'=>'r' . $view_pharmacy_pharled_list->RowCnt . '_view_pharmacy_pharled', 'data-rowtype'=>$view_pharmacy_pharled->RowType));

		// Render row
		$view_pharmacy_pharled_list->renderRow();

		// Render list options
		$view_pharmacy_pharled_list->renderListOptions();
?>
	<tr<?php echo $view_pharmacy_pharled->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_pharmacy_pharled_list->ListOptions->render("body", "left", $view_pharmacy_pharled_list->RowCnt);
?>
	<?php if ($view_pharmacy_pharled->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_pharmacy_pharled->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_pharled_list->RowCnt ?>_view_pharmacy_pharled_HospID" class="view_pharmacy_pharled_HospID">
<span<?php echo $view_pharmacy_pharled->HospID->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE"<?php echo $view_pharmacy_pharled->BRCODE->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_pharled_list->RowCnt ?>_view_pharmacy_pharled_BRCODE" class="view_pharmacy_pharled_BRCODE">
<span<?php echo $view_pharmacy_pharled->BRCODE->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled->BRCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled->PSGST->Visible) { // PSGST ?>
		<td data-name="PSGST"<?php echo $view_pharmacy_pharled->PSGST->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_pharled_list->RowCnt ?>_view_pharmacy_pharled_PSGST" class="view_pharmacy_pharled_PSGST">
<span<?php echo $view_pharmacy_pharled->PSGST->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled->PSGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled->PCGST->Visible) { // PCGST ?>
		<td data-name="PCGST"<?php echo $view_pharmacy_pharled->PCGST->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_pharled_list->RowCnt ?>_view_pharmacy_pharled_PCGST" class="view_pharmacy_pharled_PCGST">
<span<?php echo $view_pharmacy_pharled->PCGST->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled->PCGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled->SSGST->Visible) { // SSGST ?>
		<td data-name="SSGST"<?php echo $view_pharmacy_pharled->SSGST->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_pharled_list->RowCnt ?>_view_pharmacy_pharled_SSGST" class="view_pharmacy_pharled_SSGST">
<span<?php echo $view_pharmacy_pharled->SSGST->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled->SSGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled->SCGST->Visible) { // SCGST ?>
		<td data-name="SCGST"<?php echo $view_pharmacy_pharled->SCGST->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_pharled_list->RowCnt ?>_view_pharmacy_pharled_SCGST" class="view_pharmacy_pharled_SCGST">
<span<?php echo $view_pharmacy_pharled->SCGST->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled->SCGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled->SalRate->Visible) { // SalRate ?>
		<td data-name="SalRate"<?php echo $view_pharmacy_pharled->SalRate->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_pharled_list->RowCnt ?>_view_pharmacy_pharled_SalRate" class="view_pharmacy_pharled_SalRate">
<span<?php echo $view_pharmacy_pharled->SalRate->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled->SalRate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled->PurValue->Visible) { // PurValue ?>
		<td data-name="PurValue"<?php echo $view_pharmacy_pharled->PurValue->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_pharled_list->RowCnt ?>_view_pharmacy_pharled_PurValue" class="view_pharmacy_pharled_PurValue">
<span<?php echo $view_pharmacy_pharled->PurValue->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled->PurValue->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_pharled->PUnit->Visible) { // PUnit ?>
		<td data-name="PUnit"<?php echo $view_pharmacy_pharled->PUnit->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_pharled_list->RowCnt ?>_view_pharmacy_pharled_PUnit" class="view_pharmacy_pharled_PUnit">
<span<?php echo $view_pharmacy_pharled->PUnit->viewAttributes() ?>>
<?php echo $view_pharmacy_pharled->PUnit->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_pharmacy_pharled_list->ListOptions->render("body", "right", $view_pharmacy_pharled_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_pharmacy_pharled->isGridAdd())
		$view_pharmacy_pharled_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_pharmacy_pharled->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_pharmacy_pharled_list->Recordset)
	$view_pharmacy_pharled_list->Recordset->Close();
?>
<?php if (!$view_pharmacy_pharled->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_pharmacy_pharled->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_pharmacy_pharled_list->Pager)) $view_pharmacy_pharled_list->Pager = new NumericPager($view_pharmacy_pharled_list->StartRec, $view_pharmacy_pharled_list->DisplayRecs, $view_pharmacy_pharled_list->TotalRecs, $view_pharmacy_pharled_list->RecRange, $view_pharmacy_pharled_list->AutoHidePager) ?>
<?php if ($view_pharmacy_pharled_list->Pager->RecordCount > 0 && $view_pharmacy_pharled_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_pharmacy_pharled_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_pharled_list->pageUrl() ?>start=<?php echo $view_pharmacy_pharled_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_pharled_list->pageUrl() ?>start=<?php echo $view_pharmacy_pharled_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_pharmacy_pharled_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_pharmacy_pharled_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_pharled_list->pageUrl() ?>start=<?php echo $view_pharmacy_pharled_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_pharled_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_pharled_list->pageUrl() ?>start=<?php echo $view_pharmacy_pharled_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_pharmacy_pharled_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_pharmacy_pharled_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_pharmacy_pharled_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_pharmacy_pharled_list->TotalRecs > 0 && (!$view_pharmacy_pharled_list->AutoHidePageSizeSelector || $view_pharmacy_pharled_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_pharmacy_pharled">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_pharmacy_pharled_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_pharmacy_pharled_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_pharmacy_pharled_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_pharmacy_pharled_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_pharmacy_pharled_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_pharmacy_pharled_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_pharmacy_pharled->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_pharled_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_pharmacy_pharled_list->TotalRecs == 0 && !$view_pharmacy_pharled->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_pharled_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_pharmacy_pharled_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_pharmacy_pharled->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_pharmacy_pharled->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_pharmacy_pharled", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_pharmacy_pharled_list->terminate();
?>