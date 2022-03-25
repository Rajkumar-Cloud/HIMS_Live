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
$pharmacy_combination_list = new pharmacy_combination_list();

// Run the page
$pharmacy_combination_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_combination_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$pharmacy_combination->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fpharmacy_combinationlist = currentForm = new ew.Form("fpharmacy_combinationlist", "list");
fpharmacy_combinationlist.formKeyCountName = '<?php echo $pharmacy_combination_list->FormKeyCountName ?>';

// Form_CustomValidate event
fpharmacy_combinationlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_combinationlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpharmacy_combinationlist.lists["x_GENCODE"] = <?php echo $pharmacy_combination_list->GENCODE->Lookup->toClientList() ?>;
fpharmacy_combinationlist.lists["x_GENCODE"].options = <?php echo JsonEncode($pharmacy_combination_list->GENCODE->lookupOptions()) ?>;
fpharmacy_combinationlist.lists["x_COMBCODE"] = <?php echo $pharmacy_combination_list->COMBCODE->Lookup->toClientList() ?>;
fpharmacy_combinationlist.lists["x_COMBCODE"].options = <?php echo JsonEncode($pharmacy_combination_list->COMBCODE->lookupOptions()) ?>;

// Form object for search
var fpharmacy_combinationlistsrch = currentSearchForm = new ew.Form("fpharmacy_combinationlistsrch");

// Filters
fpharmacy_combinationlistsrch.filterList = <?php echo $pharmacy_combination_list->getFilterList() ?>;
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
<?php if (!$pharmacy_combination->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($pharmacy_combination_list->TotalRecs > 0 && $pharmacy_combination_list->ExportOptions->visible()) { ?>
<?php $pharmacy_combination_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_combination_list->ImportOptions->visible()) { ?>
<?php $pharmacy_combination_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_combination_list->SearchOptions->visible()) { ?>
<?php $pharmacy_combination_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_combination_list->FilterOptions->visible()) { ?>
<?php $pharmacy_combination_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$pharmacy_combination_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$pharmacy_combination->isExport() && !$pharmacy_combination->CurrentAction) { ?>
<form name="fpharmacy_combinationlistsrch" id="fpharmacy_combinationlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($pharmacy_combination_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fpharmacy_combinationlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pharmacy_combination">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($pharmacy_combination_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($pharmacy_combination_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $pharmacy_combination_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($pharmacy_combination_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_combination_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_combination_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_combination_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $pharmacy_combination_list->showPageHeader(); ?>
<?php
$pharmacy_combination_list->showMessage();
?>
<?php if ($pharmacy_combination_list->TotalRecs > 0 || $pharmacy_combination->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pharmacy_combination_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pharmacy_combination">
<?php if (!$pharmacy_combination->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$pharmacy_combination->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($pharmacy_combination_list->Pager)) $pharmacy_combination_list->Pager = new NumericPager($pharmacy_combination_list->StartRec, $pharmacy_combination_list->DisplayRecs, $pharmacy_combination_list->TotalRecs, $pharmacy_combination_list->RecRange, $pharmacy_combination_list->AutoHidePager) ?>
<?php if ($pharmacy_combination_list->Pager->RecordCount > 0 && $pharmacy_combination_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($pharmacy_combination_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_combination_list->pageUrl() ?>start=<?php echo $pharmacy_combination_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_combination_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_combination_list->pageUrl() ?>start=<?php echo $pharmacy_combination_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($pharmacy_combination_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $pharmacy_combination_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_combination_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_combination_list->pageUrl() ?>start=<?php echo $pharmacy_combination_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_combination_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_combination_list->pageUrl() ?>start=<?php echo $pharmacy_combination_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($pharmacy_combination_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $pharmacy_combination_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $pharmacy_combination_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $pharmacy_combination_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($pharmacy_combination_list->TotalRecs > 0 && (!$pharmacy_combination_list->AutoHidePageSizeSelector || $pharmacy_combination_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="pharmacy_combination">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($pharmacy_combination_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($pharmacy_combination_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($pharmacy_combination_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($pharmacy_combination_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($pharmacy_combination_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($pharmacy_combination_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($pharmacy_combination->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_combination_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpharmacy_combinationlist" id="fpharmacy_combinationlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_combination_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_combination_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_combination">
<div id="gmp_pharmacy_combination" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($pharmacy_combination_list->TotalRecs > 0 || $pharmacy_combination->isGridEdit()) { ?>
<table id="tbl_pharmacy_combinationlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pharmacy_combination_list->RowType = ROWTYPE_HEADER;

// Render list options
$pharmacy_combination_list->renderListOptions();

// Render list options (header, left)
$pharmacy_combination_list->ListOptions->render("header", "left");
?>
<?php if ($pharmacy_combination->GENCODE->Visible) { // GENCODE ?>
	<?php if ($pharmacy_combination->sortUrl($pharmacy_combination->GENCODE) == "") { ?>
		<th data-name="GENCODE" class="<?php echo $pharmacy_combination->GENCODE->headerCellClass() ?>"><div id="elh_pharmacy_combination_GENCODE" class="pharmacy_combination_GENCODE"><div class="ew-table-header-caption"><?php echo $pharmacy_combination->GENCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GENCODE" class="<?php echo $pharmacy_combination->GENCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_combination->SortUrl($pharmacy_combination->GENCODE) ?>',1);"><div id="elh_pharmacy_combination_GENCODE" class="pharmacy_combination_GENCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_combination->GENCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_combination->GENCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_combination->GENCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_combination->COMBCODE->Visible) { // COMBCODE ?>
	<?php if ($pharmacy_combination->sortUrl($pharmacy_combination->COMBCODE) == "") { ?>
		<th data-name="COMBCODE" class="<?php echo $pharmacy_combination->COMBCODE->headerCellClass() ?>"><div id="elh_pharmacy_combination_COMBCODE" class="pharmacy_combination_COMBCODE"><div class="ew-table-header-caption"><?php echo $pharmacy_combination->COMBCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="COMBCODE" class="<?php echo $pharmacy_combination->COMBCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_combination->SortUrl($pharmacy_combination->COMBCODE) ?>',1);"><div id="elh_pharmacy_combination_COMBCODE" class="pharmacy_combination_COMBCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_combination->COMBCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_combination->COMBCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_combination->COMBCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_combination->STRENGTH->Visible) { // STRENGTH ?>
	<?php if ($pharmacy_combination->sortUrl($pharmacy_combination->STRENGTH) == "") { ?>
		<th data-name="STRENGTH" class="<?php echo $pharmacy_combination->STRENGTH->headerCellClass() ?>"><div id="elh_pharmacy_combination_STRENGTH" class="pharmacy_combination_STRENGTH"><div class="ew-table-header-caption"><?php echo $pharmacy_combination->STRENGTH->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="STRENGTH" class="<?php echo $pharmacy_combination->STRENGTH->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_combination->SortUrl($pharmacy_combination->STRENGTH) ?>',1);"><div id="elh_pharmacy_combination_STRENGTH" class="pharmacy_combination_STRENGTH">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_combination->STRENGTH->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_combination->STRENGTH->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_combination->STRENGTH->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_combination->SLNO->Visible) { // SLNO ?>
	<?php if ($pharmacy_combination->sortUrl($pharmacy_combination->SLNO) == "") { ?>
		<th data-name="SLNO" class="<?php echo $pharmacy_combination->SLNO->headerCellClass() ?>"><div id="elh_pharmacy_combination_SLNO" class="pharmacy_combination_SLNO"><div class="ew-table-header-caption"><?php echo $pharmacy_combination->SLNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SLNO" class="<?php echo $pharmacy_combination->SLNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_combination->SortUrl($pharmacy_combination->SLNO) ?>',1);"><div id="elh_pharmacy_combination_SLNO" class="pharmacy_combination_SLNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_combination->SLNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_combination->SLNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_combination->SLNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_combination->id->Visible) { // id ?>
	<?php if ($pharmacy_combination->sortUrl($pharmacy_combination->id) == "") { ?>
		<th data-name="id" class="<?php echo $pharmacy_combination->id->headerCellClass() ?>"><div id="elh_pharmacy_combination_id" class="pharmacy_combination_id"><div class="ew-table-header-caption"><?php echo $pharmacy_combination->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $pharmacy_combination->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_combination->SortUrl($pharmacy_combination->id) ?>',1);"><div id="elh_pharmacy_combination_id" class="pharmacy_combination_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_combination->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_combination->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_combination->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pharmacy_combination_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($pharmacy_combination->ExportAll && $pharmacy_combination->isExport()) {
	$pharmacy_combination_list->StopRec = $pharmacy_combination_list->TotalRecs;
} else {

	// Set the last record to display
	if ($pharmacy_combination_list->TotalRecs > $pharmacy_combination_list->StartRec + $pharmacy_combination_list->DisplayRecs - 1)
		$pharmacy_combination_list->StopRec = $pharmacy_combination_list->StartRec + $pharmacy_combination_list->DisplayRecs - 1;
	else
		$pharmacy_combination_list->StopRec = $pharmacy_combination_list->TotalRecs;
}
$pharmacy_combination_list->RecCnt = $pharmacy_combination_list->StartRec - 1;
if ($pharmacy_combination_list->Recordset && !$pharmacy_combination_list->Recordset->EOF) {
	$pharmacy_combination_list->Recordset->moveFirst();
	$selectLimit = $pharmacy_combination_list->UseSelectLimit;
	if (!$selectLimit && $pharmacy_combination_list->StartRec > 1)
		$pharmacy_combination_list->Recordset->move($pharmacy_combination_list->StartRec - 1);
} elseif (!$pharmacy_combination->AllowAddDeleteRow && $pharmacy_combination_list->StopRec == 0) {
	$pharmacy_combination_list->StopRec = $pharmacy_combination->GridAddRowCount;
}

// Initialize aggregate
$pharmacy_combination->RowType = ROWTYPE_AGGREGATEINIT;
$pharmacy_combination->resetAttributes();
$pharmacy_combination_list->renderRow();
while ($pharmacy_combination_list->RecCnt < $pharmacy_combination_list->StopRec) {
	$pharmacy_combination_list->RecCnt++;
	if ($pharmacy_combination_list->RecCnt >= $pharmacy_combination_list->StartRec) {
		$pharmacy_combination_list->RowCnt++;

		// Set up key count
		$pharmacy_combination_list->KeyCount = $pharmacy_combination_list->RowIndex;

		// Init row class and style
		$pharmacy_combination->resetAttributes();
		$pharmacy_combination->CssClass = "";
		if ($pharmacy_combination->isGridAdd()) {
		} else {
			$pharmacy_combination_list->loadRowValues($pharmacy_combination_list->Recordset); // Load row values
		}
		$pharmacy_combination->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$pharmacy_combination->RowAttrs = array_merge($pharmacy_combination->RowAttrs, array('data-rowindex'=>$pharmacy_combination_list->RowCnt, 'id'=>'r' . $pharmacy_combination_list->RowCnt . '_pharmacy_combination', 'data-rowtype'=>$pharmacy_combination->RowType));

		// Render row
		$pharmacy_combination_list->renderRow();

		// Render list options
		$pharmacy_combination_list->renderListOptions();
?>
	<tr<?php echo $pharmacy_combination->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_combination_list->ListOptions->render("body", "left", $pharmacy_combination_list->RowCnt);
?>
	<?php if ($pharmacy_combination->GENCODE->Visible) { // GENCODE ?>
		<td data-name="GENCODE"<?php echo $pharmacy_combination->GENCODE->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_combination_list->RowCnt ?>_pharmacy_combination_GENCODE" class="pharmacy_combination_GENCODE">
<span<?php echo $pharmacy_combination->GENCODE->viewAttributes() ?>>
<?php echo $pharmacy_combination->GENCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_combination->COMBCODE->Visible) { // COMBCODE ?>
		<td data-name="COMBCODE"<?php echo $pharmacy_combination->COMBCODE->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_combination_list->RowCnt ?>_pharmacy_combination_COMBCODE" class="pharmacy_combination_COMBCODE">
<span<?php echo $pharmacy_combination->COMBCODE->viewAttributes() ?>>
<?php echo $pharmacy_combination->COMBCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_combination->STRENGTH->Visible) { // STRENGTH ?>
		<td data-name="STRENGTH"<?php echo $pharmacy_combination->STRENGTH->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_combination_list->RowCnt ?>_pharmacy_combination_STRENGTH" class="pharmacy_combination_STRENGTH">
<span<?php echo $pharmacy_combination->STRENGTH->viewAttributes() ?>>
<?php echo $pharmacy_combination->STRENGTH->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_combination->SLNO->Visible) { // SLNO ?>
		<td data-name="SLNO"<?php echo $pharmacy_combination->SLNO->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_combination_list->RowCnt ?>_pharmacy_combination_SLNO" class="pharmacy_combination_SLNO">
<span<?php echo $pharmacy_combination->SLNO->viewAttributes() ?>>
<?php echo $pharmacy_combination->SLNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_combination->id->Visible) { // id ?>
		<td data-name="id"<?php echo $pharmacy_combination->id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_combination_list->RowCnt ?>_pharmacy_combination_id" class="pharmacy_combination_id">
<span<?php echo $pharmacy_combination->id->viewAttributes() ?>>
<?php echo $pharmacy_combination->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_combination_list->ListOptions->render("body", "right", $pharmacy_combination_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$pharmacy_combination->isGridAdd())
		$pharmacy_combination_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$pharmacy_combination->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pharmacy_combination_list->Recordset)
	$pharmacy_combination_list->Recordset->Close();
?>
<?php if (!$pharmacy_combination->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$pharmacy_combination->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($pharmacy_combination_list->Pager)) $pharmacy_combination_list->Pager = new NumericPager($pharmacy_combination_list->StartRec, $pharmacy_combination_list->DisplayRecs, $pharmacy_combination_list->TotalRecs, $pharmacy_combination_list->RecRange, $pharmacy_combination_list->AutoHidePager) ?>
<?php if ($pharmacy_combination_list->Pager->RecordCount > 0 && $pharmacy_combination_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($pharmacy_combination_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_combination_list->pageUrl() ?>start=<?php echo $pharmacy_combination_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_combination_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_combination_list->pageUrl() ?>start=<?php echo $pharmacy_combination_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($pharmacy_combination_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $pharmacy_combination_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_combination_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_combination_list->pageUrl() ?>start=<?php echo $pharmacy_combination_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_combination_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_combination_list->pageUrl() ?>start=<?php echo $pharmacy_combination_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($pharmacy_combination_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $pharmacy_combination_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $pharmacy_combination_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $pharmacy_combination_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($pharmacy_combination_list->TotalRecs > 0 && (!$pharmacy_combination_list->AutoHidePageSizeSelector || $pharmacy_combination_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="pharmacy_combination">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($pharmacy_combination_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($pharmacy_combination_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($pharmacy_combination_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($pharmacy_combination_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($pharmacy_combination_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($pharmacy_combination_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($pharmacy_combination->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_combination_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pharmacy_combination_list->TotalRecs == 0 && !$pharmacy_combination->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pharmacy_combination_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$pharmacy_combination_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_combination->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$pharmacy_combination->isExport()) { ?>
<script>
ew.scrollableTable("gmp_pharmacy_combination", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$pharmacy_combination_list->terminate();
?>