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
$pharmacy_master_product_similar_list = new pharmacy_master_product_similar_list();

// Run the page
$pharmacy_master_product_similar_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_master_product_similar_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$pharmacy_master_product_similar->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fpharmacy_master_product_similarlist = currentForm = new ew.Form("fpharmacy_master_product_similarlist", "list");
fpharmacy_master_product_similarlist.formKeyCountName = '<?php echo $pharmacy_master_product_similar_list->FormKeyCountName ?>';

// Form_CustomValidate event
fpharmacy_master_product_similarlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_master_product_similarlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fpharmacy_master_product_similarlistsrch = currentSearchForm = new ew.Form("fpharmacy_master_product_similarlistsrch");

// Filters
fpharmacy_master_product_similarlistsrch.filterList = <?php echo $pharmacy_master_product_similar_list->getFilterList() ?>;
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
<?php if (!$pharmacy_master_product_similar->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($pharmacy_master_product_similar_list->TotalRecs > 0 && $pharmacy_master_product_similar_list->ExportOptions->visible()) { ?>
<?php $pharmacy_master_product_similar_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_master_product_similar_list->ImportOptions->visible()) { ?>
<?php $pharmacy_master_product_similar_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_master_product_similar_list->SearchOptions->visible()) { ?>
<?php $pharmacy_master_product_similar_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_master_product_similar_list->FilterOptions->visible()) { ?>
<?php $pharmacy_master_product_similar_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$pharmacy_master_product_similar_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$pharmacy_master_product_similar->isExport() && !$pharmacy_master_product_similar->CurrentAction) { ?>
<form name="fpharmacy_master_product_similarlistsrch" id="fpharmacy_master_product_similarlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($pharmacy_master_product_similar_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fpharmacy_master_product_similarlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pharmacy_master_product_similar">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($pharmacy_master_product_similar_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($pharmacy_master_product_similar_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $pharmacy_master_product_similar_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($pharmacy_master_product_similar_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_master_product_similar_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_master_product_similar_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_master_product_similar_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $pharmacy_master_product_similar_list->showPageHeader(); ?>
<?php
$pharmacy_master_product_similar_list->showMessage();
?>
<?php if ($pharmacy_master_product_similar_list->TotalRecs > 0 || $pharmacy_master_product_similar->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pharmacy_master_product_similar_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pharmacy_master_product_similar">
<?php if (!$pharmacy_master_product_similar->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$pharmacy_master_product_similar->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($pharmacy_master_product_similar_list->Pager)) $pharmacy_master_product_similar_list->Pager = new NumericPager($pharmacy_master_product_similar_list->StartRec, $pharmacy_master_product_similar_list->DisplayRecs, $pharmacy_master_product_similar_list->TotalRecs, $pharmacy_master_product_similar_list->RecRange, $pharmacy_master_product_similar_list->AutoHidePager) ?>
<?php if ($pharmacy_master_product_similar_list->Pager->RecordCount > 0 && $pharmacy_master_product_similar_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($pharmacy_master_product_similar_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_master_product_similar_list->pageUrl() ?>start=<?php echo $pharmacy_master_product_similar_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_master_product_similar_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_master_product_similar_list->pageUrl() ?>start=<?php echo $pharmacy_master_product_similar_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($pharmacy_master_product_similar_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $pharmacy_master_product_similar_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_master_product_similar_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_master_product_similar_list->pageUrl() ?>start=<?php echo $pharmacy_master_product_similar_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_master_product_similar_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_master_product_similar_list->pageUrl() ?>start=<?php echo $pharmacy_master_product_similar_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($pharmacy_master_product_similar_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $pharmacy_master_product_similar_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $pharmacy_master_product_similar_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $pharmacy_master_product_similar_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($pharmacy_master_product_similar_list->TotalRecs > 0 && (!$pharmacy_master_product_similar_list->AutoHidePageSizeSelector || $pharmacy_master_product_similar_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="pharmacy_master_product_similar">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($pharmacy_master_product_similar_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($pharmacy_master_product_similar_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($pharmacy_master_product_similar_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($pharmacy_master_product_similar_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($pharmacy_master_product_similar_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($pharmacy_master_product_similar_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($pharmacy_master_product_similar->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_master_product_similar_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpharmacy_master_product_similarlist" id="fpharmacy_master_product_similarlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_master_product_similar_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_master_product_similar_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_master_product_similar">
<div id="gmp_pharmacy_master_product_similar" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($pharmacy_master_product_similar_list->TotalRecs > 0 || $pharmacy_master_product_similar->isGridEdit()) { ?>
<table id="tbl_pharmacy_master_product_similarlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pharmacy_master_product_similar_list->RowType = ROWTYPE_HEADER;

// Render list options
$pharmacy_master_product_similar_list->renderListOptions();

// Render list options (header, left)
$pharmacy_master_product_similar_list->ListOptions->render("header", "left");
?>
<?php if ($pharmacy_master_product_similar->PRC->Visible) { // PRC ?>
	<?php if ($pharmacy_master_product_similar->sortUrl($pharmacy_master_product_similar->PRC) == "") { ?>
		<th data-name="PRC" class="<?php echo $pharmacy_master_product_similar->PRC->headerCellClass() ?>"><div id="elh_pharmacy_master_product_similar_PRC" class="pharmacy_master_product_similar_PRC"><div class="ew-table-header-caption"><?php echo $pharmacy_master_product_similar->PRC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRC" class="<?php echo $pharmacy_master_product_similar->PRC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_master_product_similar->SortUrl($pharmacy_master_product_similar->PRC) ?>',1);"><div id="elh_pharmacy_master_product_similar_PRC" class="pharmacy_master_product_similar_PRC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_master_product_similar->PRC->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_master_product_similar->PRC->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_master_product_similar->PRC->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_master_product_similar->MAINPRC->Visible) { // MAINPRC ?>
	<?php if ($pharmacy_master_product_similar->sortUrl($pharmacy_master_product_similar->MAINPRC) == "") { ?>
		<th data-name="MAINPRC" class="<?php echo $pharmacy_master_product_similar->MAINPRC->headerCellClass() ?>"><div id="elh_pharmacy_master_product_similar_MAINPRC" class="pharmacy_master_product_similar_MAINPRC"><div class="ew-table-header-caption"><?php echo $pharmacy_master_product_similar->MAINPRC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MAINPRC" class="<?php echo $pharmacy_master_product_similar->MAINPRC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_master_product_similar->SortUrl($pharmacy_master_product_similar->MAINPRC) ?>',1);"><div id="elh_pharmacy_master_product_similar_MAINPRC" class="pharmacy_master_product_similar_MAINPRC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_master_product_similar->MAINPRC->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_master_product_similar->MAINPRC->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_master_product_similar->MAINPRC->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_master_product_similar->PRTYPE->Visible) { // PRTYPE ?>
	<?php if ($pharmacy_master_product_similar->sortUrl($pharmacy_master_product_similar->PRTYPE) == "") { ?>
		<th data-name="PRTYPE" class="<?php echo $pharmacy_master_product_similar->PRTYPE->headerCellClass() ?>"><div id="elh_pharmacy_master_product_similar_PRTYPE" class="pharmacy_master_product_similar_PRTYPE"><div class="ew-table-header-caption"><?php echo $pharmacy_master_product_similar->PRTYPE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRTYPE" class="<?php echo $pharmacy_master_product_similar->PRTYPE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_master_product_similar->SortUrl($pharmacy_master_product_similar->PRTYPE) ?>',1);"><div id="elh_pharmacy_master_product_similar_PRTYPE" class="pharmacy_master_product_similar_PRTYPE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_master_product_similar->PRTYPE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_master_product_similar->PRTYPE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_master_product_similar->PRTYPE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_master_product_similar->id->Visible) { // id ?>
	<?php if ($pharmacy_master_product_similar->sortUrl($pharmacy_master_product_similar->id) == "") { ?>
		<th data-name="id" class="<?php echo $pharmacy_master_product_similar->id->headerCellClass() ?>"><div id="elh_pharmacy_master_product_similar_id" class="pharmacy_master_product_similar_id"><div class="ew-table-header-caption"><?php echo $pharmacy_master_product_similar->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $pharmacy_master_product_similar->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_master_product_similar->SortUrl($pharmacy_master_product_similar->id) ?>',1);"><div id="elh_pharmacy_master_product_similar_id" class="pharmacy_master_product_similar_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_master_product_similar->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_master_product_similar->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_master_product_similar->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pharmacy_master_product_similar_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($pharmacy_master_product_similar->ExportAll && $pharmacy_master_product_similar->isExport()) {
	$pharmacy_master_product_similar_list->StopRec = $pharmacy_master_product_similar_list->TotalRecs;
} else {

	// Set the last record to display
	if ($pharmacy_master_product_similar_list->TotalRecs > $pharmacy_master_product_similar_list->StartRec + $pharmacy_master_product_similar_list->DisplayRecs - 1)
		$pharmacy_master_product_similar_list->StopRec = $pharmacy_master_product_similar_list->StartRec + $pharmacy_master_product_similar_list->DisplayRecs - 1;
	else
		$pharmacy_master_product_similar_list->StopRec = $pharmacy_master_product_similar_list->TotalRecs;
}
$pharmacy_master_product_similar_list->RecCnt = $pharmacy_master_product_similar_list->StartRec - 1;
if ($pharmacy_master_product_similar_list->Recordset && !$pharmacy_master_product_similar_list->Recordset->EOF) {
	$pharmacy_master_product_similar_list->Recordset->moveFirst();
	$selectLimit = $pharmacy_master_product_similar_list->UseSelectLimit;
	if (!$selectLimit && $pharmacy_master_product_similar_list->StartRec > 1)
		$pharmacy_master_product_similar_list->Recordset->move($pharmacy_master_product_similar_list->StartRec - 1);
} elseif (!$pharmacy_master_product_similar->AllowAddDeleteRow && $pharmacy_master_product_similar_list->StopRec == 0) {
	$pharmacy_master_product_similar_list->StopRec = $pharmacy_master_product_similar->GridAddRowCount;
}

// Initialize aggregate
$pharmacy_master_product_similar->RowType = ROWTYPE_AGGREGATEINIT;
$pharmacy_master_product_similar->resetAttributes();
$pharmacy_master_product_similar_list->renderRow();
while ($pharmacy_master_product_similar_list->RecCnt < $pharmacy_master_product_similar_list->StopRec) {
	$pharmacy_master_product_similar_list->RecCnt++;
	if ($pharmacy_master_product_similar_list->RecCnt >= $pharmacy_master_product_similar_list->StartRec) {
		$pharmacy_master_product_similar_list->RowCnt++;

		// Set up key count
		$pharmacy_master_product_similar_list->KeyCount = $pharmacy_master_product_similar_list->RowIndex;

		// Init row class and style
		$pharmacy_master_product_similar->resetAttributes();
		$pharmacy_master_product_similar->CssClass = "";
		if ($pharmacy_master_product_similar->isGridAdd()) {
		} else {
			$pharmacy_master_product_similar_list->loadRowValues($pharmacy_master_product_similar_list->Recordset); // Load row values
		}
		$pharmacy_master_product_similar->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$pharmacy_master_product_similar->RowAttrs = array_merge($pharmacy_master_product_similar->RowAttrs, array('data-rowindex'=>$pharmacy_master_product_similar_list->RowCnt, 'id'=>'r' . $pharmacy_master_product_similar_list->RowCnt . '_pharmacy_master_product_similar', 'data-rowtype'=>$pharmacy_master_product_similar->RowType));

		// Render row
		$pharmacy_master_product_similar_list->renderRow();

		// Render list options
		$pharmacy_master_product_similar_list->renderListOptions();
?>
	<tr<?php echo $pharmacy_master_product_similar->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_master_product_similar_list->ListOptions->render("body", "left", $pharmacy_master_product_similar_list->RowCnt);
?>
	<?php if ($pharmacy_master_product_similar->PRC->Visible) { // PRC ?>
		<td data-name="PRC"<?php echo $pharmacy_master_product_similar->PRC->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_master_product_similar_list->RowCnt ?>_pharmacy_master_product_similar_PRC" class="pharmacy_master_product_similar_PRC">
<span<?php echo $pharmacy_master_product_similar->PRC->viewAttributes() ?>>
<?php echo $pharmacy_master_product_similar->PRC->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_master_product_similar->MAINPRC->Visible) { // MAINPRC ?>
		<td data-name="MAINPRC"<?php echo $pharmacy_master_product_similar->MAINPRC->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_master_product_similar_list->RowCnt ?>_pharmacy_master_product_similar_MAINPRC" class="pharmacy_master_product_similar_MAINPRC">
<span<?php echo $pharmacy_master_product_similar->MAINPRC->viewAttributes() ?>>
<?php echo $pharmacy_master_product_similar->MAINPRC->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_master_product_similar->PRTYPE->Visible) { // PRTYPE ?>
		<td data-name="PRTYPE"<?php echo $pharmacy_master_product_similar->PRTYPE->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_master_product_similar_list->RowCnt ?>_pharmacy_master_product_similar_PRTYPE" class="pharmacy_master_product_similar_PRTYPE">
<span<?php echo $pharmacy_master_product_similar->PRTYPE->viewAttributes() ?>>
<?php echo $pharmacy_master_product_similar->PRTYPE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_master_product_similar->id->Visible) { // id ?>
		<td data-name="id"<?php echo $pharmacy_master_product_similar->id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_master_product_similar_list->RowCnt ?>_pharmacy_master_product_similar_id" class="pharmacy_master_product_similar_id">
<span<?php echo $pharmacy_master_product_similar->id->viewAttributes() ?>>
<?php echo $pharmacy_master_product_similar->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_master_product_similar_list->ListOptions->render("body", "right", $pharmacy_master_product_similar_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$pharmacy_master_product_similar->isGridAdd())
		$pharmacy_master_product_similar_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$pharmacy_master_product_similar->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pharmacy_master_product_similar_list->Recordset)
	$pharmacy_master_product_similar_list->Recordset->Close();
?>
<?php if (!$pharmacy_master_product_similar->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$pharmacy_master_product_similar->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($pharmacy_master_product_similar_list->Pager)) $pharmacy_master_product_similar_list->Pager = new NumericPager($pharmacy_master_product_similar_list->StartRec, $pharmacy_master_product_similar_list->DisplayRecs, $pharmacy_master_product_similar_list->TotalRecs, $pharmacy_master_product_similar_list->RecRange, $pharmacy_master_product_similar_list->AutoHidePager) ?>
<?php if ($pharmacy_master_product_similar_list->Pager->RecordCount > 0 && $pharmacy_master_product_similar_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($pharmacy_master_product_similar_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_master_product_similar_list->pageUrl() ?>start=<?php echo $pharmacy_master_product_similar_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_master_product_similar_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_master_product_similar_list->pageUrl() ?>start=<?php echo $pharmacy_master_product_similar_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($pharmacy_master_product_similar_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $pharmacy_master_product_similar_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_master_product_similar_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_master_product_similar_list->pageUrl() ?>start=<?php echo $pharmacy_master_product_similar_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_master_product_similar_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_master_product_similar_list->pageUrl() ?>start=<?php echo $pharmacy_master_product_similar_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($pharmacy_master_product_similar_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $pharmacy_master_product_similar_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $pharmacy_master_product_similar_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $pharmacy_master_product_similar_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($pharmacy_master_product_similar_list->TotalRecs > 0 && (!$pharmacy_master_product_similar_list->AutoHidePageSizeSelector || $pharmacy_master_product_similar_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="pharmacy_master_product_similar">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($pharmacy_master_product_similar_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($pharmacy_master_product_similar_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($pharmacy_master_product_similar_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($pharmacy_master_product_similar_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($pharmacy_master_product_similar_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($pharmacy_master_product_similar_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($pharmacy_master_product_similar->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_master_product_similar_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pharmacy_master_product_similar_list->TotalRecs == 0 && !$pharmacy_master_product_similar->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pharmacy_master_product_similar_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$pharmacy_master_product_similar_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_master_product_similar->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$pharmacy_master_product_similar->isExport()) { ?>
<script>
ew.scrollableTable("gmp_pharmacy_master_product_similar", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$pharmacy_master_product_similar_list->terminate();
?>