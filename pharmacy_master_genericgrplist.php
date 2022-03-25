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
$pharmacy_master_genericgrp_list = new pharmacy_master_genericgrp_list();

// Run the page
$pharmacy_master_genericgrp_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_master_genericgrp_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$pharmacy_master_genericgrp->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fpharmacy_master_genericgrplist = currentForm = new ew.Form("fpharmacy_master_genericgrplist", "list");
fpharmacy_master_genericgrplist.formKeyCountName = '<?php echo $pharmacy_master_genericgrp_list->FormKeyCountName ?>';

// Form_CustomValidate event
fpharmacy_master_genericgrplist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_master_genericgrplist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fpharmacy_master_genericgrplistsrch = currentSearchForm = new ew.Form("fpharmacy_master_genericgrplistsrch");

// Filters
fpharmacy_master_genericgrplistsrch.filterList = <?php echo $pharmacy_master_genericgrp_list->getFilterList() ?>;
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
<?php if (!$pharmacy_master_genericgrp->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($pharmacy_master_genericgrp_list->TotalRecs > 0 && $pharmacy_master_genericgrp_list->ExportOptions->visible()) { ?>
<?php $pharmacy_master_genericgrp_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_master_genericgrp_list->ImportOptions->visible()) { ?>
<?php $pharmacy_master_genericgrp_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_master_genericgrp_list->SearchOptions->visible()) { ?>
<?php $pharmacy_master_genericgrp_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_master_genericgrp_list->FilterOptions->visible()) { ?>
<?php $pharmacy_master_genericgrp_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$pharmacy_master_genericgrp_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$pharmacy_master_genericgrp->isExport() && !$pharmacy_master_genericgrp->CurrentAction) { ?>
<form name="fpharmacy_master_genericgrplistsrch" id="fpharmacy_master_genericgrplistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($pharmacy_master_genericgrp_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fpharmacy_master_genericgrplistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pharmacy_master_genericgrp">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($pharmacy_master_genericgrp_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($pharmacy_master_genericgrp_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $pharmacy_master_genericgrp_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($pharmacy_master_genericgrp_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_master_genericgrp_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_master_genericgrp_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_master_genericgrp_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $pharmacy_master_genericgrp_list->showPageHeader(); ?>
<?php
$pharmacy_master_genericgrp_list->showMessage();
?>
<?php if ($pharmacy_master_genericgrp_list->TotalRecs > 0 || $pharmacy_master_genericgrp->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pharmacy_master_genericgrp_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pharmacy_master_genericgrp">
<?php if (!$pharmacy_master_genericgrp->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$pharmacy_master_genericgrp->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($pharmacy_master_genericgrp_list->Pager)) $pharmacy_master_genericgrp_list->Pager = new NumericPager($pharmacy_master_genericgrp_list->StartRec, $pharmacy_master_genericgrp_list->DisplayRecs, $pharmacy_master_genericgrp_list->TotalRecs, $pharmacy_master_genericgrp_list->RecRange, $pharmacy_master_genericgrp_list->AutoHidePager) ?>
<?php if ($pharmacy_master_genericgrp_list->Pager->RecordCount > 0 && $pharmacy_master_genericgrp_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($pharmacy_master_genericgrp_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_master_genericgrp_list->pageUrl() ?>start=<?php echo $pharmacy_master_genericgrp_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_master_genericgrp_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_master_genericgrp_list->pageUrl() ?>start=<?php echo $pharmacy_master_genericgrp_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($pharmacy_master_genericgrp_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $pharmacy_master_genericgrp_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_master_genericgrp_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_master_genericgrp_list->pageUrl() ?>start=<?php echo $pharmacy_master_genericgrp_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_master_genericgrp_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_master_genericgrp_list->pageUrl() ?>start=<?php echo $pharmacy_master_genericgrp_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($pharmacy_master_genericgrp_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $pharmacy_master_genericgrp_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $pharmacy_master_genericgrp_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $pharmacy_master_genericgrp_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($pharmacy_master_genericgrp_list->TotalRecs > 0 && (!$pharmacy_master_genericgrp_list->AutoHidePageSizeSelector || $pharmacy_master_genericgrp_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="pharmacy_master_genericgrp">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($pharmacy_master_genericgrp_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($pharmacy_master_genericgrp_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($pharmacy_master_genericgrp_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($pharmacy_master_genericgrp_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($pharmacy_master_genericgrp_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($pharmacy_master_genericgrp_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($pharmacy_master_genericgrp->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_master_genericgrp_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpharmacy_master_genericgrplist" id="fpharmacy_master_genericgrplist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_master_genericgrp_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_master_genericgrp_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_master_genericgrp">
<div id="gmp_pharmacy_master_genericgrp" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($pharmacy_master_genericgrp_list->TotalRecs > 0 || $pharmacy_master_genericgrp->isGridEdit()) { ?>
<table id="tbl_pharmacy_master_genericgrplist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pharmacy_master_genericgrp_list->RowType = ROWTYPE_HEADER;

// Render list options
$pharmacy_master_genericgrp_list->renderListOptions();

// Render list options (header, left)
$pharmacy_master_genericgrp_list->ListOptions->render("header", "left");
?>
<?php if ($pharmacy_master_genericgrp->GENNAME->Visible) { // GENNAME ?>
	<?php if ($pharmacy_master_genericgrp->sortUrl($pharmacy_master_genericgrp->GENNAME) == "") { ?>
		<th data-name="GENNAME" class="<?php echo $pharmacy_master_genericgrp->GENNAME->headerCellClass() ?>"><div id="elh_pharmacy_master_genericgrp_GENNAME" class="pharmacy_master_genericgrp_GENNAME"><div class="ew-table-header-caption"><?php echo $pharmacy_master_genericgrp->GENNAME->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GENNAME" class="<?php echo $pharmacy_master_genericgrp->GENNAME->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_master_genericgrp->SortUrl($pharmacy_master_genericgrp->GENNAME) ?>',1);"><div id="elh_pharmacy_master_genericgrp_GENNAME" class="pharmacy_master_genericgrp_GENNAME">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_master_genericgrp->GENNAME->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_master_genericgrp->GENNAME->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_master_genericgrp->GENNAME->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_master_genericgrp->CODE->Visible) { // CODE ?>
	<?php if ($pharmacy_master_genericgrp->sortUrl($pharmacy_master_genericgrp->CODE) == "") { ?>
		<th data-name="CODE" class="<?php echo $pharmacy_master_genericgrp->CODE->headerCellClass() ?>"><div id="elh_pharmacy_master_genericgrp_CODE" class="pharmacy_master_genericgrp_CODE"><div class="ew-table-header-caption"><?php echo $pharmacy_master_genericgrp->CODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CODE" class="<?php echo $pharmacy_master_genericgrp->CODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_master_genericgrp->SortUrl($pharmacy_master_genericgrp->CODE) ?>',1);"><div id="elh_pharmacy_master_genericgrp_CODE" class="pharmacy_master_genericgrp_CODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_master_genericgrp->CODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_master_genericgrp->CODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_master_genericgrp->CODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_master_genericgrp->id->Visible) { // id ?>
	<?php if ($pharmacy_master_genericgrp->sortUrl($pharmacy_master_genericgrp->id) == "") { ?>
		<th data-name="id" class="<?php echo $pharmacy_master_genericgrp->id->headerCellClass() ?>"><div id="elh_pharmacy_master_genericgrp_id" class="pharmacy_master_genericgrp_id"><div class="ew-table-header-caption"><?php echo $pharmacy_master_genericgrp->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $pharmacy_master_genericgrp->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_master_genericgrp->SortUrl($pharmacy_master_genericgrp->id) ?>',1);"><div id="elh_pharmacy_master_genericgrp_id" class="pharmacy_master_genericgrp_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_master_genericgrp->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_master_genericgrp->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_master_genericgrp->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pharmacy_master_genericgrp_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($pharmacy_master_genericgrp->ExportAll && $pharmacy_master_genericgrp->isExport()) {
	$pharmacy_master_genericgrp_list->StopRec = $pharmacy_master_genericgrp_list->TotalRecs;
} else {

	// Set the last record to display
	if ($pharmacy_master_genericgrp_list->TotalRecs > $pharmacy_master_genericgrp_list->StartRec + $pharmacy_master_genericgrp_list->DisplayRecs - 1)
		$pharmacy_master_genericgrp_list->StopRec = $pharmacy_master_genericgrp_list->StartRec + $pharmacy_master_genericgrp_list->DisplayRecs - 1;
	else
		$pharmacy_master_genericgrp_list->StopRec = $pharmacy_master_genericgrp_list->TotalRecs;
}
$pharmacy_master_genericgrp_list->RecCnt = $pharmacy_master_genericgrp_list->StartRec - 1;
if ($pharmacy_master_genericgrp_list->Recordset && !$pharmacy_master_genericgrp_list->Recordset->EOF) {
	$pharmacy_master_genericgrp_list->Recordset->moveFirst();
	$selectLimit = $pharmacy_master_genericgrp_list->UseSelectLimit;
	if (!$selectLimit && $pharmacy_master_genericgrp_list->StartRec > 1)
		$pharmacy_master_genericgrp_list->Recordset->move($pharmacy_master_genericgrp_list->StartRec - 1);
} elseif (!$pharmacy_master_genericgrp->AllowAddDeleteRow && $pharmacy_master_genericgrp_list->StopRec == 0) {
	$pharmacy_master_genericgrp_list->StopRec = $pharmacy_master_genericgrp->GridAddRowCount;
}

// Initialize aggregate
$pharmacy_master_genericgrp->RowType = ROWTYPE_AGGREGATEINIT;
$pharmacy_master_genericgrp->resetAttributes();
$pharmacy_master_genericgrp_list->renderRow();
while ($pharmacy_master_genericgrp_list->RecCnt < $pharmacy_master_genericgrp_list->StopRec) {
	$pharmacy_master_genericgrp_list->RecCnt++;
	if ($pharmacy_master_genericgrp_list->RecCnt >= $pharmacy_master_genericgrp_list->StartRec) {
		$pharmacy_master_genericgrp_list->RowCnt++;

		// Set up key count
		$pharmacy_master_genericgrp_list->KeyCount = $pharmacy_master_genericgrp_list->RowIndex;

		// Init row class and style
		$pharmacy_master_genericgrp->resetAttributes();
		$pharmacy_master_genericgrp->CssClass = "";
		if ($pharmacy_master_genericgrp->isGridAdd()) {
		} else {
			$pharmacy_master_genericgrp_list->loadRowValues($pharmacy_master_genericgrp_list->Recordset); // Load row values
		}
		$pharmacy_master_genericgrp->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$pharmacy_master_genericgrp->RowAttrs = array_merge($pharmacy_master_genericgrp->RowAttrs, array('data-rowindex'=>$pharmacy_master_genericgrp_list->RowCnt, 'id'=>'r' . $pharmacy_master_genericgrp_list->RowCnt . '_pharmacy_master_genericgrp', 'data-rowtype'=>$pharmacy_master_genericgrp->RowType));

		// Render row
		$pharmacy_master_genericgrp_list->renderRow();

		// Render list options
		$pharmacy_master_genericgrp_list->renderListOptions();
?>
	<tr<?php echo $pharmacy_master_genericgrp->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_master_genericgrp_list->ListOptions->render("body", "left", $pharmacy_master_genericgrp_list->RowCnt);
?>
	<?php if ($pharmacy_master_genericgrp->GENNAME->Visible) { // GENNAME ?>
		<td data-name="GENNAME"<?php echo $pharmacy_master_genericgrp->GENNAME->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_master_genericgrp_list->RowCnt ?>_pharmacy_master_genericgrp_GENNAME" class="pharmacy_master_genericgrp_GENNAME">
<span<?php echo $pharmacy_master_genericgrp->GENNAME->viewAttributes() ?>>
<?php echo $pharmacy_master_genericgrp->GENNAME->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_master_genericgrp->CODE->Visible) { // CODE ?>
		<td data-name="CODE"<?php echo $pharmacy_master_genericgrp->CODE->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_master_genericgrp_list->RowCnt ?>_pharmacy_master_genericgrp_CODE" class="pharmacy_master_genericgrp_CODE">
<span<?php echo $pharmacy_master_genericgrp->CODE->viewAttributes() ?>>
<?php echo $pharmacy_master_genericgrp->CODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_master_genericgrp->id->Visible) { // id ?>
		<td data-name="id"<?php echo $pharmacy_master_genericgrp->id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_master_genericgrp_list->RowCnt ?>_pharmacy_master_genericgrp_id" class="pharmacy_master_genericgrp_id">
<span<?php echo $pharmacy_master_genericgrp->id->viewAttributes() ?>>
<?php echo $pharmacy_master_genericgrp->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_master_genericgrp_list->ListOptions->render("body", "right", $pharmacy_master_genericgrp_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$pharmacy_master_genericgrp->isGridAdd())
		$pharmacy_master_genericgrp_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$pharmacy_master_genericgrp->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pharmacy_master_genericgrp_list->Recordset)
	$pharmacy_master_genericgrp_list->Recordset->Close();
?>
<?php if (!$pharmacy_master_genericgrp->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$pharmacy_master_genericgrp->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($pharmacy_master_genericgrp_list->Pager)) $pharmacy_master_genericgrp_list->Pager = new NumericPager($pharmacy_master_genericgrp_list->StartRec, $pharmacy_master_genericgrp_list->DisplayRecs, $pharmacy_master_genericgrp_list->TotalRecs, $pharmacy_master_genericgrp_list->RecRange, $pharmacy_master_genericgrp_list->AutoHidePager) ?>
<?php if ($pharmacy_master_genericgrp_list->Pager->RecordCount > 0 && $pharmacy_master_genericgrp_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($pharmacy_master_genericgrp_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_master_genericgrp_list->pageUrl() ?>start=<?php echo $pharmacy_master_genericgrp_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_master_genericgrp_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_master_genericgrp_list->pageUrl() ?>start=<?php echo $pharmacy_master_genericgrp_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($pharmacy_master_genericgrp_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $pharmacy_master_genericgrp_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_master_genericgrp_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_master_genericgrp_list->pageUrl() ?>start=<?php echo $pharmacy_master_genericgrp_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_master_genericgrp_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_master_genericgrp_list->pageUrl() ?>start=<?php echo $pharmacy_master_genericgrp_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($pharmacy_master_genericgrp_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $pharmacy_master_genericgrp_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $pharmacy_master_genericgrp_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $pharmacy_master_genericgrp_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($pharmacy_master_genericgrp_list->TotalRecs > 0 && (!$pharmacy_master_genericgrp_list->AutoHidePageSizeSelector || $pharmacy_master_genericgrp_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="pharmacy_master_genericgrp">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($pharmacy_master_genericgrp_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($pharmacy_master_genericgrp_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($pharmacy_master_genericgrp_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($pharmacy_master_genericgrp_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($pharmacy_master_genericgrp_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($pharmacy_master_genericgrp_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($pharmacy_master_genericgrp->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_master_genericgrp_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pharmacy_master_genericgrp_list->TotalRecs == 0 && !$pharmacy_master_genericgrp->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pharmacy_master_genericgrp_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$pharmacy_master_genericgrp_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_master_genericgrp->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$pharmacy_master_genericgrp->isExport()) { ?>
<script>
ew.scrollableTable("gmp_pharmacy_master_genericgrp", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$pharmacy_master_genericgrp_list->terminate();
?>