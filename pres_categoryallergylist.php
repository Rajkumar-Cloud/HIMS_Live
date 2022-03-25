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
$pres_categoryallergy_list = new pres_categoryallergy_list();

// Run the page
$pres_categoryallergy_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_categoryallergy_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$pres_categoryallergy->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fpres_categoryallergylist = currentForm = new ew.Form("fpres_categoryallergylist", "list");
fpres_categoryallergylist.formKeyCountName = '<?php echo $pres_categoryallergy_list->FormKeyCountName ?>';

// Form_CustomValidate event
fpres_categoryallergylist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpres_categoryallergylist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fpres_categoryallergylistsrch = currentSearchForm = new ew.Form("fpres_categoryallergylistsrch");

// Filters
fpres_categoryallergylistsrch.filterList = <?php echo $pres_categoryallergy_list->getFilterList() ?>;
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
<?php if (!$pres_categoryallergy->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($pres_categoryallergy_list->TotalRecs > 0 && $pres_categoryallergy_list->ExportOptions->visible()) { ?>
<?php $pres_categoryallergy_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($pres_categoryallergy_list->ImportOptions->visible()) { ?>
<?php $pres_categoryallergy_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($pres_categoryallergy_list->SearchOptions->visible()) { ?>
<?php $pres_categoryallergy_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($pres_categoryallergy_list->FilterOptions->visible()) { ?>
<?php $pres_categoryallergy_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$pres_categoryallergy_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$pres_categoryallergy->isExport() && !$pres_categoryallergy->CurrentAction) { ?>
<form name="fpres_categoryallergylistsrch" id="fpres_categoryallergylistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($pres_categoryallergy_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fpres_categoryallergylistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pres_categoryallergy">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($pres_categoryallergy_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($pres_categoryallergy_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $pres_categoryallergy_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($pres_categoryallergy_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($pres_categoryallergy_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($pres_categoryallergy_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($pres_categoryallergy_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $pres_categoryallergy_list->showPageHeader(); ?>
<?php
$pres_categoryallergy_list->showMessage();
?>
<?php if ($pres_categoryallergy_list->TotalRecs > 0 || $pres_categoryallergy->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pres_categoryallergy_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pres_categoryallergy">
<?php if (!$pres_categoryallergy->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$pres_categoryallergy->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($pres_categoryallergy_list->Pager)) $pres_categoryallergy_list->Pager = new NumericPager($pres_categoryallergy_list->StartRec, $pres_categoryallergy_list->DisplayRecs, $pres_categoryallergy_list->TotalRecs, $pres_categoryallergy_list->RecRange, $pres_categoryallergy_list->AutoHidePager) ?>
<?php if ($pres_categoryallergy_list->Pager->RecordCount > 0 && $pres_categoryallergy_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($pres_categoryallergy_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_categoryallergy_list->pageUrl() ?>start=<?php echo $pres_categoryallergy_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($pres_categoryallergy_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_categoryallergy_list->pageUrl() ?>start=<?php echo $pres_categoryallergy_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($pres_categoryallergy_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $pres_categoryallergy_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($pres_categoryallergy_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_categoryallergy_list->pageUrl() ?>start=<?php echo $pres_categoryallergy_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($pres_categoryallergy_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_categoryallergy_list->pageUrl() ?>start=<?php echo $pres_categoryallergy_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($pres_categoryallergy_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $pres_categoryallergy_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $pres_categoryallergy_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $pres_categoryallergy_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($pres_categoryallergy_list->TotalRecs > 0 && (!$pres_categoryallergy_list->AutoHidePageSizeSelector || $pres_categoryallergy_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="pres_categoryallergy">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($pres_categoryallergy_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($pres_categoryallergy_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($pres_categoryallergy_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($pres_categoryallergy_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($pres_categoryallergy_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($pres_categoryallergy_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($pres_categoryallergy->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pres_categoryallergy_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpres_categoryallergylist" id="fpres_categoryallergylist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pres_categoryallergy_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pres_categoryallergy_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_categoryallergy">
<div id="gmp_pres_categoryallergy" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($pres_categoryallergy_list->TotalRecs > 0 || $pres_categoryallergy->isGridEdit()) { ?>
<table id="tbl_pres_categoryallergylist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pres_categoryallergy_list->RowType = ROWTYPE_HEADER;

// Render list options
$pres_categoryallergy_list->renderListOptions();

// Render list options (header, left)
$pres_categoryallergy_list->ListOptions->render("header", "left");
?>
<?php if ($pres_categoryallergy->id->Visible) { // id ?>
	<?php if ($pres_categoryallergy->sortUrl($pres_categoryallergy->id) == "") { ?>
		<th data-name="id" class="<?php echo $pres_categoryallergy->id->headerCellClass() ?>"><div id="elh_pres_categoryallergy_id" class="pres_categoryallergy_id"><div class="ew-table-header-caption"><?php echo $pres_categoryallergy->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $pres_categoryallergy->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_categoryallergy->SortUrl($pres_categoryallergy->id) ?>',1);"><div id="elh_pres_categoryallergy_id" class="pres_categoryallergy_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_categoryallergy->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_categoryallergy->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_categoryallergy->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_categoryallergy->Genericname->Visible) { // Genericname ?>
	<?php if ($pres_categoryallergy->sortUrl($pres_categoryallergy->Genericname) == "") { ?>
		<th data-name="Genericname" class="<?php echo $pres_categoryallergy->Genericname->headerCellClass() ?>"><div id="elh_pres_categoryallergy_Genericname" class="pres_categoryallergy_Genericname"><div class="ew-table-header-caption"><?php echo $pres_categoryallergy->Genericname->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Genericname" class="<?php echo $pres_categoryallergy->Genericname->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_categoryallergy->SortUrl($pres_categoryallergy->Genericname) ?>',1);"><div id="elh_pres_categoryallergy_Genericname" class="pres_categoryallergy_Genericname">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_categoryallergy->Genericname->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_categoryallergy->Genericname->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_categoryallergy->Genericname->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_categoryallergy->CategoryDrug->Visible) { // CategoryDrug ?>
	<?php if ($pres_categoryallergy->sortUrl($pres_categoryallergy->CategoryDrug) == "") { ?>
		<th data-name="CategoryDrug" class="<?php echo $pres_categoryallergy->CategoryDrug->headerCellClass() ?>"><div id="elh_pres_categoryallergy_CategoryDrug" class="pres_categoryallergy_CategoryDrug"><div class="ew-table-header-caption"><?php echo $pres_categoryallergy->CategoryDrug->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CategoryDrug" class="<?php echo $pres_categoryallergy->CategoryDrug->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_categoryallergy->SortUrl($pres_categoryallergy->CategoryDrug) ?>',1);"><div id="elh_pres_categoryallergy_CategoryDrug" class="pres_categoryallergy_CategoryDrug">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_categoryallergy->CategoryDrug->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_categoryallergy->CategoryDrug->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_categoryallergy->CategoryDrug->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pres_categoryallergy_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($pres_categoryallergy->ExportAll && $pres_categoryallergy->isExport()) {
	$pres_categoryallergy_list->StopRec = $pres_categoryallergy_list->TotalRecs;
} else {

	// Set the last record to display
	if ($pres_categoryallergy_list->TotalRecs > $pres_categoryallergy_list->StartRec + $pres_categoryallergy_list->DisplayRecs - 1)
		$pres_categoryallergy_list->StopRec = $pres_categoryallergy_list->StartRec + $pres_categoryallergy_list->DisplayRecs - 1;
	else
		$pres_categoryallergy_list->StopRec = $pres_categoryallergy_list->TotalRecs;
}
$pres_categoryallergy_list->RecCnt = $pres_categoryallergy_list->StartRec - 1;
if ($pres_categoryallergy_list->Recordset && !$pres_categoryallergy_list->Recordset->EOF) {
	$pres_categoryallergy_list->Recordset->moveFirst();
	$selectLimit = $pres_categoryallergy_list->UseSelectLimit;
	if (!$selectLimit && $pres_categoryallergy_list->StartRec > 1)
		$pres_categoryallergy_list->Recordset->move($pres_categoryallergy_list->StartRec - 1);
} elseif (!$pres_categoryallergy->AllowAddDeleteRow && $pres_categoryallergy_list->StopRec == 0) {
	$pres_categoryallergy_list->StopRec = $pres_categoryallergy->GridAddRowCount;
}

// Initialize aggregate
$pres_categoryallergy->RowType = ROWTYPE_AGGREGATEINIT;
$pres_categoryallergy->resetAttributes();
$pres_categoryallergy_list->renderRow();
while ($pres_categoryallergy_list->RecCnt < $pres_categoryallergy_list->StopRec) {
	$pres_categoryallergy_list->RecCnt++;
	if ($pres_categoryallergy_list->RecCnt >= $pres_categoryallergy_list->StartRec) {
		$pres_categoryallergy_list->RowCnt++;

		// Set up key count
		$pres_categoryallergy_list->KeyCount = $pres_categoryallergy_list->RowIndex;

		// Init row class and style
		$pres_categoryallergy->resetAttributes();
		$pres_categoryallergy->CssClass = "";
		if ($pres_categoryallergy->isGridAdd()) {
		} else {
			$pres_categoryallergy_list->loadRowValues($pres_categoryallergy_list->Recordset); // Load row values
		}
		$pres_categoryallergy->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$pres_categoryallergy->RowAttrs = array_merge($pres_categoryallergy->RowAttrs, array('data-rowindex'=>$pres_categoryallergy_list->RowCnt, 'id'=>'r' . $pres_categoryallergy_list->RowCnt . '_pres_categoryallergy', 'data-rowtype'=>$pres_categoryallergy->RowType));

		// Render row
		$pres_categoryallergy_list->renderRow();

		// Render list options
		$pres_categoryallergy_list->renderListOptions();
?>
	<tr<?php echo $pres_categoryallergy->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pres_categoryallergy_list->ListOptions->render("body", "left", $pres_categoryallergy_list->RowCnt);
?>
	<?php if ($pres_categoryallergy->id->Visible) { // id ?>
		<td data-name="id"<?php echo $pres_categoryallergy->id->cellAttributes() ?>>
<span id="el<?php echo $pres_categoryallergy_list->RowCnt ?>_pres_categoryallergy_id" class="pres_categoryallergy_id">
<span<?php echo $pres_categoryallergy->id->viewAttributes() ?>>
<?php echo $pres_categoryallergy->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_categoryallergy->Genericname->Visible) { // Genericname ?>
		<td data-name="Genericname"<?php echo $pres_categoryallergy->Genericname->cellAttributes() ?>>
<span id="el<?php echo $pres_categoryallergy_list->RowCnt ?>_pres_categoryallergy_Genericname" class="pres_categoryallergy_Genericname">
<span<?php echo $pres_categoryallergy->Genericname->viewAttributes() ?>>
<?php echo $pres_categoryallergy->Genericname->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_categoryallergy->CategoryDrug->Visible) { // CategoryDrug ?>
		<td data-name="CategoryDrug"<?php echo $pres_categoryallergy->CategoryDrug->cellAttributes() ?>>
<span id="el<?php echo $pres_categoryallergy_list->RowCnt ?>_pres_categoryallergy_CategoryDrug" class="pres_categoryallergy_CategoryDrug">
<span<?php echo $pres_categoryallergy->CategoryDrug->viewAttributes() ?>>
<?php echo $pres_categoryallergy->CategoryDrug->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pres_categoryallergy_list->ListOptions->render("body", "right", $pres_categoryallergy_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$pres_categoryallergy->isGridAdd())
		$pres_categoryallergy_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$pres_categoryallergy->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pres_categoryallergy_list->Recordset)
	$pres_categoryallergy_list->Recordset->Close();
?>
<?php if (!$pres_categoryallergy->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$pres_categoryallergy->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($pres_categoryallergy_list->Pager)) $pres_categoryallergy_list->Pager = new NumericPager($pres_categoryallergy_list->StartRec, $pres_categoryallergy_list->DisplayRecs, $pres_categoryallergy_list->TotalRecs, $pres_categoryallergy_list->RecRange, $pres_categoryallergy_list->AutoHidePager) ?>
<?php if ($pres_categoryallergy_list->Pager->RecordCount > 0 && $pres_categoryallergy_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($pres_categoryallergy_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_categoryallergy_list->pageUrl() ?>start=<?php echo $pres_categoryallergy_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($pres_categoryallergy_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_categoryallergy_list->pageUrl() ?>start=<?php echo $pres_categoryallergy_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($pres_categoryallergy_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $pres_categoryallergy_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($pres_categoryallergy_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_categoryallergy_list->pageUrl() ?>start=<?php echo $pres_categoryallergy_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($pres_categoryallergy_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_categoryallergy_list->pageUrl() ?>start=<?php echo $pres_categoryallergy_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($pres_categoryallergy_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $pres_categoryallergy_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $pres_categoryallergy_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $pres_categoryallergy_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($pres_categoryallergy_list->TotalRecs > 0 && (!$pres_categoryallergy_list->AutoHidePageSizeSelector || $pres_categoryallergy_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="pres_categoryallergy">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($pres_categoryallergy_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($pres_categoryallergy_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($pres_categoryallergy_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($pres_categoryallergy_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($pres_categoryallergy_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($pres_categoryallergy_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($pres_categoryallergy->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pres_categoryallergy_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pres_categoryallergy_list->TotalRecs == 0 && !$pres_categoryallergy->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pres_categoryallergy_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$pres_categoryallergy_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$pres_categoryallergy->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$pres_categoryallergy->isExport()) { ?>
<script>
ew.scrollableTable("gmp_pres_categoryallergy", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$pres_categoryallergy_list->terminate();
?>