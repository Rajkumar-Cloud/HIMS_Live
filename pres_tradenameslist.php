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
$pres_tradenames_list = new pres_tradenames_list();

// Run the page
$pres_tradenames_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_tradenames_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$pres_tradenames->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fpres_tradenameslist = currentForm = new ew.Form("fpres_tradenameslist", "list");
fpres_tradenameslist.formKeyCountName = '<?php echo $pres_tradenames_list->FormKeyCountName ?>';

// Form_CustomValidate event
fpres_tradenameslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpres_tradenameslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fpres_tradenameslistsrch = currentSearchForm = new ew.Form("fpres_tradenameslistsrch");

// Filters
fpres_tradenameslistsrch.filterList = <?php echo $pres_tradenames_list->getFilterList() ?>;
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
<?php if (!$pres_tradenames->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($pres_tradenames_list->TotalRecs > 0 && $pres_tradenames_list->ExportOptions->visible()) { ?>
<?php $pres_tradenames_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($pres_tradenames_list->ImportOptions->visible()) { ?>
<?php $pres_tradenames_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($pres_tradenames_list->SearchOptions->visible()) { ?>
<?php $pres_tradenames_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($pres_tradenames_list->FilterOptions->visible()) { ?>
<?php $pres_tradenames_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$pres_tradenames_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$pres_tradenames->isExport() && !$pres_tradenames->CurrentAction) { ?>
<form name="fpres_tradenameslistsrch" id="fpres_tradenameslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($pres_tradenames_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fpres_tradenameslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pres_tradenames">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($pres_tradenames_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($pres_tradenames_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $pres_tradenames_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($pres_tradenames_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($pres_tradenames_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($pres_tradenames_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($pres_tradenames_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $pres_tradenames_list->showPageHeader(); ?>
<?php
$pres_tradenames_list->showMessage();
?>
<?php if ($pres_tradenames_list->TotalRecs > 0 || $pres_tradenames->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pres_tradenames_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pres_tradenames">
<?php if (!$pres_tradenames->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$pres_tradenames->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($pres_tradenames_list->Pager)) $pres_tradenames_list->Pager = new NumericPager($pres_tradenames_list->StartRec, $pres_tradenames_list->DisplayRecs, $pres_tradenames_list->TotalRecs, $pres_tradenames_list->RecRange, $pres_tradenames_list->AutoHidePager) ?>
<?php if ($pres_tradenames_list->Pager->RecordCount > 0 && $pres_tradenames_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($pres_tradenames_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_tradenames_list->pageUrl() ?>start=<?php echo $pres_tradenames_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($pres_tradenames_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_tradenames_list->pageUrl() ?>start=<?php echo $pres_tradenames_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($pres_tradenames_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $pres_tradenames_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($pres_tradenames_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_tradenames_list->pageUrl() ?>start=<?php echo $pres_tradenames_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($pres_tradenames_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_tradenames_list->pageUrl() ?>start=<?php echo $pres_tradenames_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($pres_tradenames_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $pres_tradenames_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $pres_tradenames_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $pres_tradenames_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($pres_tradenames_list->TotalRecs > 0 && (!$pres_tradenames_list->AutoHidePageSizeSelector || $pres_tradenames_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="pres_tradenames">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($pres_tradenames_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($pres_tradenames_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($pres_tradenames_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($pres_tradenames_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($pres_tradenames_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($pres_tradenames_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($pres_tradenames->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pres_tradenames_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpres_tradenameslist" id="fpres_tradenameslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pres_tradenames_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pres_tradenames_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_tradenames">
<div id="gmp_pres_tradenames" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($pres_tradenames_list->TotalRecs > 0 || $pres_tradenames->isGridEdit()) { ?>
<table id="tbl_pres_tradenameslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pres_tradenames_list->RowType = ROWTYPE_HEADER;

// Render list options
$pres_tradenames_list->renderListOptions();

// Render list options (header, left)
$pres_tradenames_list->ListOptions->render("header", "left");
?>
<?php if ($pres_tradenames->id->Visible) { // id ?>
	<?php if ($pres_tradenames->sortUrl($pres_tradenames->id) == "") { ?>
		<th data-name="id" class="<?php echo $pres_tradenames->id->headerCellClass() ?>"><div id="elh_pres_tradenames_id" class="pres_tradenames_id"><div class="ew-table-header-caption"><?php echo $pres_tradenames->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $pres_tradenames->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_tradenames->SortUrl($pres_tradenames->id) ?>',1);"><div id="elh_pres_tradenames_id" class="pres_tradenames_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_tradenames->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_tradenames->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_tradenames->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_tradenames->PR_CODE->Visible) { // PR_CODE ?>
	<?php if ($pres_tradenames->sortUrl($pres_tradenames->PR_CODE) == "") { ?>
		<th data-name="PR_CODE" class="<?php echo $pres_tradenames->PR_CODE->headerCellClass() ?>"><div id="elh_pres_tradenames_PR_CODE" class="pres_tradenames_PR_CODE"><div class="ew-table-header-caption"><?php echo $pres_tradenames->PR_CODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PR_CODE" class="<?php echo $pres_tradenames->PR_CODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_tradenames->SortUrl($pres_tradenames->PR_CODE) ?>',1);"><div id="elh_pres_tradenames_PR_CODE" class="pres_tradenames_PR_CODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_tradenames->PR_CODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_tradenames->PR_CODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_tradenames->PR_CODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_tradenames->CONTAINER_TYPE->Visible) { // CONTAINER_TYPE ?>
	<?php if ($pres_tradenames->sortUrl($pres_tradenames->CONTAINER_TYPE) == "") { ?>
		<th data-name="CONTAINER_TYPE" class="<?php echo $pres_tradenames->CONTAINER_TYPE->headerCellClass() ?>"><div id="elh_pres_tradenames_CONTAINER_TYPE" class="pres_tradenames_CONTAINER_TYPE"><div class="ew-table-header-caption"><?php echo $pres_tradenames->CONTAINER_TYPE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CONTAINER_TYPE" class="<?php echo $pres_tradenames->CONTAINER_TYPE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_tradenames->SortUrl($pres_tradenames->CONTAINER_TYPE) ?>',1);"><div id="elh_pres_tradenames_CONTAINER_TYPE" class="pres_tradenames_CONTAINER_TYPE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_tradenames->CONTAINER_TYPE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_tradenames->CONTAINER_TYPE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_tradenames->CONTAINER_TYPE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_tradenames->STRENGTH->Visible) { // STRENGTH ?>
	<?php if ($pres_tradenames->sortUrl($pres_tradenames->STRENGTH) == "") { ?>
		<th data-name="STRENGTH" class="<?php echo $pres_tradenames->STRENGTH->headerCellClass() ?>"><div id="elh_pres_tradenames_STRENGTH" class="pres_tradenames_STRENGTH"><div class="ew-table-header-caption"><?php echo $pres_tradenames->STRENGTH->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="STRENGTH" class="<?php echo $pres_tradenames->STRENGTH->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_tradenames->SortUrl($pres_tradenames->STRENGTH) ?>',1);"><div id="elh_pres_tradenames_STRENGTH" class="pres_tradenames_STRENGTH">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_tradenames->STRENGTH->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_tradenames->STRENGTH->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_tradenames->STRENGTH->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pres_tradenames_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($pres_tradenames->ExportAll && $pres_tradenames->isExport()) {
	$pres_tradenames_list->StopRec = $pres_tradenames_list->TotalRecs;
} else {

	// Set the last record to display
	if ($pres_tradenames_list->TotalRecs > $pres_tradenames_list->StartRec + $pres_tradenames_list->DisplayRecs - 1)
		$pres_tradenames_list->StopRec = $pres_tradenames_list->StartRec + $pres_tradenames_list->DisplayRecs - 1;
	else
		$pres_tradenames_list->StopRec = $pres_tradenames_list->TotalRecs;
}
$pres_tradenames_list->RecCnt = $pres_tradenames_list->StartRec - 1;
if ($pres_tradenames_list->Recordset && !$pres_tradenames_list->Recordset->EOF) {
	$pres_tradenames_list->Recordset->moveFirst();
	$selectLimit = $pres_tradenames_list->UseSelectLimit;
	if (!$selectLimit && $pres_tradenames_list->StartRec > 1)
		$pres_tradenames_list->Recordset->move($pres_tradenames_list->StartRec - 1);
} elseif (!$pres_tradenames->AllowAddDeleteRow && $pres_tradenames_list->StopRec == 0) {
	$pres_tradenames_list->StopRec = $pres_tradenames->GridAddRowCount;
}

// Initialize aggregate
$pres_tradenames->RowType = ROWTYPE_AGGREGATEINIT;
$pres_tradenames->resetAttributes();
$pres_tradenames_list->renderRow();
while ($pres_tradenames_list->RecCnt < $pres_tradenames_list->StopRec) {
	$pres_tradenames_list->RecCnt++;
	if ($pres_tradenames_list->RecCnt >= $pres_tradenames_list->StartRec) {
		$pres_tradenames_list->RowCnt++;

		// Set up key count
		$pres_tradenames_list->KeyCount = $pres_tradenames_list->RowIndex;

		// Init row class and style
		$pres_tradenames->resetAttributes();
		$pres_tradenames->CssClass = "";
		if ($pres_tradenames->isGridAdd()) {
		} else {
			$pres_tradenames_list->loadRowValues($pres_tradenames_list->Recordset); // Load row values
		}
		$pres_tradenames->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$pres_tradenames->RowAttrs = array_merge($pres_tradenames->RowAttrs, array('data-rowindex'=>$pres_tradenames_list->RowCnt, 'id'=>'r' . $pres_tradenames_list->RowCnt . '_pres_tradenames', 'data-rowtype'=>$pres_tradenames->RowType));

		// Render row
		$pres_tradenames_list->renderRow();

		// Render list options
		$pres_tradenames_list->renderListOptions();
?>
	<tr<?php echo $pres_tradenames->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pres_tradenames_list->ListOptions->render("body", "left", $pres_tradenames_list->RowCnt);
?>
	<?php if ($pres_tradenames->id->Visible) { // id ?>
		<td data-name="id"<?php echo $pres_tradenames->id->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_list->RowCnt ?>_pres_tradenames_id" class="pres_tradenames_id">
<span<?php echo $pres_tradenames->id->viewAttributes() ?>>
<?php echo $pres_tradenames->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_tradenames->PR_CODE->Visible) { // PR_CODE ?>
		<td data-name="PR_CODE"<?php echo $pres_tradenames->PR_CODE->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_list->RowCnt ?>_pres_tradenames_PR_CODE" class="pres_tradenames_PR_CODE">
<span<?php echo $pres_tradenames->PR_CODE->viewAttributes() ?>>
<?php echo $pres_tradenames->PR_CODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_tradenames->CONTAINER_TYPE->Visible) { // CONTAINER_TYPE ?>
		<td data-name="CONTAINER_TYPE"<?php echo $pres_tradenames->CONTAINER_TYPE->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_list->RowCnt ?>_pres_tradenames_CONTAINER_TYPE" class="pres_tradenames_CONTAINER_TYPE">
<span<?php echo $pres_tradenames->CONTAINER_TYPE->viewAttributes() ?>>
<?php echo $pres_tradenames->CONTAINER_TYPE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_tradenames->STRENGTH->Visible) { // STRENGTH ?>
		<td data-name="STRENGTH"<?php echo $pres_tradenames->STRENGTH->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_list->RowCnt ?>_pres_tradenames_STRENGTH" class="pres_tradenames_STRENGTH">
<span<?php echo $pres_tradenames->STRENGTH->viewAttributes() ?>>
<?php echo $pres_tradenames->STRENGTH->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pres_tradenames_list->ListOptions->render("body", "right", $pres_tradenames_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$pres_tradenames->isGridAdd())
		$pres_tradenames_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$pres_tradenames->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pres_tradenames_list->Recordset)
	$pres_tradenames_list->Recordset->Close();
?>
<?php if (!$pres_tradenames->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$pres_tradenames->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($pres_tradenames_list->Pager)) $pres_tradenames_list->Pager = new NumericPager($pres_tradenames_list->StartRec, $pres_tradenames_list->DisplayRecs, $pres_tradenames_list->TotalRecs, $pres_tradenames_list->RecRange, $pres_tradenames_list->AutoHidePager) ?>
<?php if ($pres_tradenames_list->Pager->RecordCount > 0 && $pres_tradenames_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($pres_tradenames_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_tradenames_list->pageUrl() ?>start=<?php echo $pres_tradenames_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($pres_tradenames_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_tradenames_list->pageUrl() ?>start=<?php echo $pres_tradenames_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($pres_tradenames_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $pres_tradenames_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($pres_tradenames_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_tradenames_list->pageUrl() ?>start=<?php echo $pres_tradenames_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($pres_tradenames_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_tradenames_list->pageUrl() ?>start=<?php echo $pres_tradenames_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($pres_tradenames_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $pres_tradenames_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $pres_tradenames_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $pres_tradenames_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($pres_tradenames_list->TotalRecs > 0 && (!$pres_tradenames_list->AutoHidePageSizeSelector || $pres_tradenames_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="pres_tradenames">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($pres_tradenames_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($pres_tradenames_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($pres_tradenames_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($pres_tradenames_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($pres_tradenames_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($pres_tradenames_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($pres_tradenames->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pres_tradenames_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pres_tradenames_list->TotalRecs == 0 && !$pres_tradenames->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pres_tradenames_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$pres_tradenames_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$pres_tradenames->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$pres_tradenames->isExport()) { ?>
<script>
ew.scrollableTable("gmp_pres_tradenames", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$pres_tradenames_list->terminate();
?>