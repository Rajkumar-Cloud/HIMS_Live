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
$pres_mas_timeoftaking_list = new pres_mas_timeoftaking_list();

// Run the page
$pres_mas_timeoftaking_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_mas_timeoftaking_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$pres_mas_timeoftaking->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fpres_mas_timeoftakinglist = currentForm = new ew.Form("fpres_mas_timeoftakinglist", "list");
fpres_mas_timeoftakinglist.formKeyCountName = '<?php echo $pres_mas_timeoftaking_list->FormKeyCountName ?>';

// Form_CustomValidate event
fpres_mas_timeoftakinglist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpres_mas_timeoftakinglist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fpres_mas_timeoftakinglistsrch = currentSearchForm = new ew.Form("fpres_mas_timeoftakinglistsrch");

// Filters
fpres_mas_timeoftakinglistsrch.filterList = <?php echo $pres_mas_timeoftaking_list->getFilterList() ?>;
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
<?php if (!$pres_mas_timeoftaking->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($pres_mas_timeoftaking_list->TotalRecs > 0 && $pres_mas_timeoftaking_list->ExportOptions->visible()) { ?>
<?php $pres_mas_timeoftaking_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($pres_mas_timeoftaking_list->ImportOptions->visible()) { ?>
<?php $pres_mas_timeoftaking_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($pres_mas_timeoftaking_list->SearchOptions->visible()) { ?>
<?php $pres_mas_timeoftaking_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($pres_mas_timeoftaking_list->FilterOptions->visible()) { ?>
<?php $pres_mas_timeoftaking_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$pres_mas_timeoftaking_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$pres_mas_timeoftaking->isExport() && !$pres_mas_timeoftaking->CurrentAction) { ?>
<form name="fpres_mas_timeoftakinglistsrch" id="fpres_mas_timeoftakinglistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($pres_mas_timeoftaking_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fpres_mas_timeoftakinglistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pres_mas_timeoftaking">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($pres_mas_timeoftaking_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($pres_mas_timeoftaking_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $pres_mas_timeoftaking_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($pres_mas_timeoftaking_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($pres_mas_timeoftaking_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($pres_mas_timeoftaking_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($pres_mas_timeoftaking_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $pres_mas_timeoftaking_list->showPageHeader(); ?>
<?php
$pres_mas_timeoftaking_list->showMessage();
?>
<?php if ($pres_mas_timeoftaking_list->TotalRecs > 0 || $pres_mas_timeoftaking->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pres_mas_timeoftaking_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pres_mas_timeoftaking">
<?php if (!$pres_mas_timeoftaking->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$pres_mas_timeoftaking->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($pres_mas_timeoftaking_list->Pager)) $pres_mas_timeoftaking_list->Pager = new NumericPager($pres_mas_timeoftaking_list->StartRec, $pres_mas_timeoftaking_list->DisplayRecs, $pres_mas_timeoftaking_list->TotalRecs, $pres_mas_timeoftaking_list->RecRange, $pres_mas_timeoftaking_list->AutoHidePager) ?>
<?php if ($pres_mas_timeoftaking_list->Pager->RecordCount > 0 && $pres_mas_timeoftaking_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($pres_mas_timeoftaking_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_mas_timeoftaking_list->pageUrl() ?>start=<?php echo $pres_mas_timeoftaking_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($pres_mas_timeoftaking_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_mas_timeoftaking_list->pageUrl() ?>start=<?php echo $pres_mas_timeoftaking_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($pres_mas_timeoftaking_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $pres_mas_timeoftaking_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($pres_mas_timeoftaking_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_mas_timeoftaking_list->pageUrl() ?>start=<?php echo $pres_mas_timeoftaking_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($pres_mas_timeoftaking_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_mas_timeoftaking_list->pageUrl() ?>start=<?php echo $pres_mas_timeoftaking_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($pres_mas_timeoftaking_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $pres_mas_timeoftaking_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $pres_mas_timeoftaking_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $pres_mas_timeoftaking_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($pres_mas_timeoftaking_list->TotalRecs > 0 && (!$pres_mas_timeoftaking_list->AutoHidePageSizeSelector || $pres_mas_timeoftaking_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="pres_mas_timeoftaking">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($pres_mas_timeoftaking_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($pres_mas_timeoftaking_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($pres_mas_timeoftaking_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($pres_mas_timeoftaking_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($pres_mas_timeoftaking_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($pres_mas_timeoftaking_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($pres_mas_timeoftaking->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pres_mas_timeoftaking_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpres_mas_timeoftakinglist" id="fpres_mas_timeoftakinglist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pres_mas_timeoftaking_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pres_mas_timeoftaking_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_mas_timeoftaking">
<div id="gmp_pres_mas_timeoftaking" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($pres_mas_timeoftaking_list->TotalRecs > 0 || $pres_mas_timeoftaking->isGridEdit()) { ?>
<table id="tbl_pres_mas_timeoftakinglist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pres_mas_timeoftaking_list->RowType = ROWTYPE_HEADER;

// Render list options
$pres_mas_timeoftaking_list->renderListOptions();

// Render list options (header, left)
$pres_mas_timeoftaking_list->ListOptions->render("header", "left");
?>
<?php if ($pres_mas_timeoftaking->ID->Visible) { // ID ?>
	<?php if ($pres_mas_timeoftaking->sortUrl($pres_mas_timeoftaking->ID) == "") { ?>
		<th data-name="ID" class="<?php echo $pres_mas_timeoftaking->ID->headerCellClass() ?>"><div id="elh_pres_mas_timeoftaking_ID" class="pres_mas_timeoftaking_ID"><div class="ew-table-header-caption"><?php echo $pres_mas_timeoftaking->ID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ID" class="<?php echo $pres_mas_timeoftaking->ID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_mas_timeoftaking->SortUrl($pres_mas_timeoftaking->ID) ?>',1);"><div id="elh_pres_mas_timeoftaking_ID" class="pres_mas_timeoftaking_ID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_mas_timeoftaking->ID->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_mas_timeoftaking->ID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_mas_timeoftaking->ID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_mas_timeoftaking->Time_Of_Taking->Visible) { // Time Of Taking ?>
	<?php if ($pres_mas_timeoftaking->sortUrl($pres_mas_timeoftaking->Time_Of_Taking) == "") { ?>
		<th data-name="Time_Of_Taking" class="<?php echo $pres_mas_timeoftaking->Time_Of_Taking->headerCellClass() ?>"><div id="elh_pres_mas_timeoftaking_Time_Of_Taking" class="pres_mas_timeoftaking_Time_Of_Taking"><div class="ew-table-header-caption"><?php echo $pres_mas_timeoftaking->Time_Of_Taking->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Time_Of_Taking" class="<?php echo $pres_mas_timeoftaking->Time_Of_Taking->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_mas_timeoftaking->SortUrl($pres_mas_timeoftaking->Time_Of_Taking) ?>',1);"><div id="elh_pres_mas_timeoftaking_Time_Of_Taking" class="pres_mas_timeoftaking_Time_Of_Taking">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_mas_timeoftaking->Time_Of_Taking->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_mas_timeoftaking->Time_Of_Taking->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_mas_timeoftaking->Time_Of_Taking->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pres_mas_timeoftaking_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($pres_mas_timeoftaking->ExportAll && $pres_mas_timeoftaking->isExport()) {
	$pres_mas_timeoftaking_list->StopRec = $pres_mas_timeoftaking_list->TotalRecs;
} else {

	// Set the last record to display
	if ($pres_mas_timeoftaking_list->TotalRecs > $pres_mas_timeoftaking_list->StartRec + $pres_mas_timeoftaking_list->DisplayRecs - 1)
		$pres_mas_timeoftaking_list->StopRec = $pres_mas_timeoftaking_list->StartRec + $pres_mas_timeoftaking_list->DisplayRecs - 1;
	else
		$pres_mas_timeoftaking_list->StopRec = $pres_mas_timeoftaking_list->TotalRecs;
}
$pres_mas_timeoftaking_list->RecCnt = $pres_mas_timeoftaking_list->StartRec - 1;
if ($pres_mas_timeoftaking_list->Recordset && !$pres_mas_timeoftaking_list->Recordset->EOF) {
	$pres_mas_timeoftaking_list->Recordset->moveFirst();
	$selectLimit = $pres_mas_timeoftaking_list->UseSelectLimit;
	if (!$selectLimit && $pres_mas_timeoftaking_list->StartRec > 1)
		$pres_mas_timeoftaking_list->Recordset->move($pres_mas_timeoftaking_list->StartRec - 1);
} elseif (!$pres_mas_timeoftaking->AllowAddDeleteRow && $pres_mas_timeoftaking_list->StopRec == 0) {
	$pres_mas_timeoftaking_list->StopRec = $pres_mas_timeoftaking->GridAddRowCount;
}

// Initialize aggregate
$pres_mas_timeoftaking->RowType = ROWTYPE_AGGREGATEINIT;
$pres_mas_timeoftaking->resetAttributes();
$pres_mas_timeoftaking_list->renderRow();
while ($pres_mas_timeoftaking_list->RecCnt < $pres_mas_timeoftaking_list->StopRec) {
	$pres_mas_timeoftaking_list->RecCnt++;
	if ($pres_mas_timeoftaking_list->RecCnt >= $pres_mas_timeoftaking_list->StartRec) {
		$pres_mas_timeoftaking_list->RowCnt++;

		// Set up key count
		$pres_mas_timeoftaking_list->KeyCount = $pres_mas_timeoftaking_list->RowIndex;

		// Init row class and style
		$pres_mas_timeoftaking->resetAttributes();
		$pres_mas_timeoftaking->CssClass = "";
		if ($pres_mas_timeoftaking->isGridAdd()) {
		} else {
			$pres_mas_timeoftaking_list->loadRowValues($pres_mas_timeoftaking_list->Recordset); // Load row values
		}
		$pres_mas_timeoftaking->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$pres_mas_timeoftaking->RowAttrs = array_merge($pres_mas_timeoftaking->RowAttrs, array('data-rowindex'=>$pres_mas_timeoftaking_list->RowCnt, 'id'=>'r' . $pres_mas_timeoftaking_list->RowCnt . '_pres_mas_timeoftaking', 'data-rowtype'=>$pres_mas_timeoftaking->RowType));

		// Render row
		$pres_mas_timeoftaking_list->renderRow();

		// Render list options
		$pres_mas_timeoftaking_list->renderListOptions();
?>
	<tr<?php echo $pres_mas_timeoftaking->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pres_mas_timeoftaking_list->ListOptions->render("body", "left", $pres_mas_timeoftaking_list->RowCnt);
?>
	<?php if ($pres_mas_timeoftaking->ID->Visible) { // ID ?>
		<td data-name="ID"<?php echo $pres_mas_timeoftaking->ID->cellAttributes() ?>>
<span id="el<?php echo $pres_mas_timeoftaking_list->RowCnt ?>_pres_mas_timeoftaking_ID" class="pres_mas_timeoftaking_ID">
<span<?php echo $pres_mas_timeoftaking->ID->viewAttributes() ?>>
<?php echo $pres_mas_timeoftaking->ID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_mas_timeoftaking->Time_Of_Taking->Visible) { // Time Of Taking ?>
		<td data-name="Time_Of_Taking"<?php echo $pres_mas_timeoftaking->Time_Of_Taking->cellAttributes() ?>>
<span id="el<?php echo $pres_mas_timeoftaking_list->RowCnt ?>_pres_mas_timeoftaking_Time_Of_Taking" class="pres_mas_timeoftaking_Time_Of_Taking">
<span<?php echo $pres_mas_timeoftaking->Time_Of_Taking->viewAttributes() ?>>
<?php echo $pres_mas_timeoftaking->Time_Of_Taking->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pres_mas_timeoftaking_list->ListOptions->render("body", "right", $pres_mas_timeoftaking_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$pres_mas_timeoftaking->isGridAdd())
		$pres_mas_timeoftaking_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$pres_mas_timeoftaking->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pres_mas_timeoftaking_list->Recordset)
	$pres_mas_timeoftaking_list->Recordset->Close();
?>
<?php if (!$pres_mas_timeoftaking->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$pres_mas_timeoftaking->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($pres_mas_timeoftaking_list->Pager)) $pres_mas_timeoftaking_list->Pager = new NumericPager($pres_mas_timeoftaking_list->StartRec, $pres_mas_timeoftaking_list->DisplayRecs, $pres_mas_timeoftaking_list->TotalRecs, $pres_mas_timeoftaking_list->RecRange, $pres_mas_timeoftaking_list->AutoHidePager) ?>
<?php if ($pres_mas_timeoftaking_list->Pager->RecordCount > 0 && $pres_mas_timeoftaking_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($pres_mas_timeoftaking_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_mas_timeoftaking_list->pageUrl() ?>start=<?php echo $pres_mas_timeoftaking_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($pres_mas_timeoftaking_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_mas_timeoftaking_list->pageUrl() ?>start=<?php echo $pres_mas_timeoftaking_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($pres_mas_timeoftaking_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $pres_mas_timeoftaking_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($pres_mas_timeoftaking_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_mas_timeoftaking_list->pageUrl() ?>start=<?php echo $pres_mas_timeoftaking_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($pres_mas_timeoftaking_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_mas_timeoftaking_list->pageUrl() ?>start=<?php echo $pres_mas_timeoftaking_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($pres_mas_timeoftaking_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $pres_mas_timeoftaking_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $pres_mas_timeoftaking_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $pres_mas_timeoftaking_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($pres_mas_timeoftaking_list->TotalRecs > 0 && (!$pres_mas_timeoftaking_list->AutoHidePageSizeSelector || $pres_mas_timeoftaking_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="pres_mas_timeoftaking">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($pres_mas_timeoftaking_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($pres_mas_timeoftaking_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($pres_mas_timeoftaking_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($pres_mas_timeoftaking_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($pres_mas_timeoftaking_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($pres_mas_timeoftaking_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($pres_mas_timeoftaking->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pres_mas_timeoftaking_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pres_mas_timeoftaking_list->TotalRecs == 0 && !$pres_mas_timeoftaking->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pres_mas_timeoftaking_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$pres_mas_timeoftaking_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$pres_mas_timeoftaking->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$pres_mas_timeoftaking->isExport()) { ?>
<script>
ew.scrollableTable("gmp_pres_mas_timeoftaking", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$pres_mas_timeoftaking_list->terminate();
?>