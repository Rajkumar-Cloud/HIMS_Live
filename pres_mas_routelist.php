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
$pres_mas_route_list = new pres_mas_route_list();

// Run the page
$pres_mas_route_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_mas_route_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$pres_mas_route->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fpres_mas_routelist = currentForm = new ew.Form("fpres_mas_routelist", "list");
fpres_mas_routelist.formKeyCountName = '<?php echo $pres_mas_route_list->FormKeyCountName ?>';

// Form_CustomValidate event
fpres_mas_routelist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpres_mas_routelist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fpres_mas_routelistsrch = currentSearchForm = new ew.Form("fpres_mas_routelistsrch");

// Filters
fpres_mas_routelistsrch.filterList = <?php echo $pres_mas_route_list->getFilterList() ?>;
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
<?php if (!$pres_mas_route->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($pres_mas_route_list->TotalRecs > 0 && $pres_mas_route_list->ExportOptions->visible()) { ?>
<?php $pres_mas_route_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($pres_mas_route_list->ImportOptions->visible()) { ?>
<?php $pres_mas_route_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($pres_mas_route_list->SearchOptions->visible()) { ?>
<?php $pres_mas_route_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($pres_mas_route_list->FilterOptions->visible()) { ?>
<?php $pres_mas_route_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$pres_mas_route_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$pres_mas_route->isExport() && !$pres_mas_route->CurrentAction) { ?>
<form name="fpres_mas_routelistsrch" id="fpres_mas_routelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($pres_mas_route_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fpres_mas_routelistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pres_mas_route">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($pres_mas_route_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($pres_mas_route_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $pres_mas_route_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($pres_mas_route_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($pres_mas_route_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($pres_mas_route_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($pres_mas_route_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $pres_mas_route_list->showPageHeader(); ?>
<?php
$pres_mas_route_list->showMessage();
?>
<?php if ($pres_mas_route_list->TotalRecs > 0 || $pres_mas_route->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pres_mas_route_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pres_mas_route">
<?php if (!$pres_mas_route->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$pres_mas_route->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($pres_mas_route_list->Pager)) $pres_mas_route_list->Pager = new NumericPager($pres_mas_route_list->StartRec, $pres_mas_route_list->DisplayRecs, $pres_mas_route_list->TotalRecs, $pres_mas_route_list->RecRange, $pres_mas_route_list->AutoHidePager) ?>
<?php if ($pres_mas_route_list->Pager->RecordCount > 0 && $pres_mas_route_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($pres_mas_route_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_mas_route_list->pageUrl() ?>start=<?php echo $pres_mas_route_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($pres_mas_route_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_mas_route_list->pageUrl() ?>start=<?php echo $pres_mas_route_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($pres_mas_route_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $pres_mas_route_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($pres_mas_route_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_mas_route_list->pageUrl() ?>start=<?php echo $pres_mas_route_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($pres_mas_route_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_mas_route_list->pageUrl() ?>start=<?php echo $pres_mas_route_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($pres_mas_route_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $pres_mas_route_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $pres_mas_route_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $pres_mas_route_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($pres_mas_route_list->TotalRecs > 0 && (!$pres_mas_route_list->AutoHidePageSizeSelector || $pres_mas_route_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="pres_mas_route">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($pres_mas_route_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($pres_mas_route_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($pres_mas_route_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($pres_mas_route_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($pres_mas_route_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($pres_mas_route_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($pres_mas_route->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pres_mas_route_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpres_mas_routelist" id="fpres_mas_routelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pres_mas_route_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pres_mas_route_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_mas_route">
<div id="gmp_pres_mas_route" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($pres_mas_route_list->TotalRecs > 0 || $pres_mas_route->isGridEdit()) { ?>
<table id="tbl_pres_mas_routelist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pres_mas_route_list->RowType = ROWTYPE_HEADER;

// Render list options
$pres_mas_route_list->renderListOptions();

// Render list options (header, left)
$pres_mas_route_list->ListOptions->render("header", "left");
?>
<?php if ($pres_mas_route->ID->Visible) { // ID ?>
	<?php if ($pres_mas_route->sortUrl($pres_mas_route->ID) == "") { ?>
		<th data-name="ID" class="<?php echo $pres_mas_route->ID->headerCellClass() ?>"><div id="elh_pres_mas_route_ID" class="pres_mas_route_ID"><div class="ew-table-header-caption"><?php echo $pres_mas_route->ID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ID" class="<?php echo $pres_mas_route->ID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_mas_route->SortUrl($pres_mas_route->ID) ?>',1);"><div id="elh_pres_mas_route_ID" class="pres_mas_route_ID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_mas_route->ID->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_mas_route->ID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_mas_route->ID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_mas_route->_Route->Visible) { // Route ?>
	<?php if ($pres_mas_route->sortUrl($pres_mas_route->_Route) == "") { ?>
		<th data-name="_Route" class="<?php echo $pres_mas_route->_Route->headerCellClass() ?>"><div id="elh_pres_mas_route__Route" class="pres_mas_route__Route"><div class="ew-table-header-caption"><?php echo $pres_mas_route->_Route->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_Route" class="<?php echo $pres_mas_route->_Route->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_mas_route->SortUrl($pres_mas_route->_Route) ?>',1);"><div id="elh_pres_mas_route__Route" class="pres_mas_route__Route">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_mas_route->_Route->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_mas_route->_Route->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_mas_route->_Route->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pres_mas_route_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($pres_mas_route->ExportAll && $pres_mas_route->isExport()) {
	$pres_mas_route_list->StopRec = $pres_mas_route_list->TotalRecs;
} else {

	// Set the last record to display
	if ($pres_mas_route_list->TotalRecs > $pres_mas_route_list->StartRec + $pres_mas_route_list->DisplayRecs - 1)
		$pres_mas_route_list->StopRec = $pres_mas_route_list->StartRec + $pres_mas_route_list->DisplayRecs - 1;
	else
		$pres_mas_route_list->StopRec = $pres_mas_route_list->TotalRecs;
}
$pres_mas_route_list->RecCnt = $pres_mas_route_list->StartRec - 1;
if ($pres_mas_route_list->Recordset && !$pres_mas_route_list->Recordset->EOF) {
	$pres_mas_route_list->Recordset->moveFirst();
	$selectLimit = $pres_mas_route_list->UseSelectLimit;
	if (!$selectLimit && $pres_mas_route_list->StartRec > 1)
		$pres_mas_route_list->Recordset->move($pres_mas_route_list->StartRec - 1);
} elseif (!$pres_mas_route->AllowAddDeleteRow && $pres_mas_route_list->StopRec == 0) {
	$pres_mas_route_list->StopRec = $pres_mas_route->GridAddRowCount;
}

// Initialize aggregate
$pres_mas_route->RowType = ROWTYPE_AGGREGATEINIT;
$pres_mas_route->resetAttributes();
$pres_mas_route_list->renderRow();
while ($pres_mas_route_list->RecCnt < $pres_mas_route_list->StopRec) {
	$pres_mas_route_list->RecCnt++;
	if ($pres_mas_route_list->RecCnt >= $pres_mas_route_list->StartRec) {
		$pres_mas_route_list->RowCnt++;

		// Set up key count
		$pres_mas_route_list->KeyCount = $pres_mas_route_list->RowIndex;

		// Init row class and style
		$pres_mas_route->resetAttributes();
		$pres_mas_route->CssClass = "";
		if ($pres_mas_route->isGridAdd()) {
		} else {
			$pres_mas_route_list->loadRowValues($pres_mas_route_list->Recordset); // Load row values
		}
		$pres_mas_route->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$pres_mas_route->RowAttrs = array_merge($pres_mas_route->RowAttrs, array('data-rowindex'=>$pres_mas_route_list->RowCnt, 'id'=>'r' . $pres_mas_route_list->RowCnt . '_pres_mas_route', 'data-rowtype'=>$pres_mas_route->RowType));

		// Render row
		$pres_mas_route_list->renderRow();

		// Render list options
		$pres_mas_route_list->renderListOptions();
?>
	<tr<?php echo $pres_mas_route->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pres_mas_route_list->ListOptions->render("body", "left", $pres_mas_route_list->RowCnt);
?>
	<?php if ($pres_mas_route->ID->Visible) { // ID ?>
		<td data-name="ID"<?php echo $pres_mas_route->ID->cellAttributes() ?>>
<span id="el<?php echo $pres_mas_route_list->RowCnt ?>_pres_mas_route_ID" class="pres_mas_route_ID">
<span<?php echo $pres_mas_route->ID->viewAttributes() ?>>
<?php echo $pres_mas_route->ID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_mas_route->_Route->Visible) { // Route ?>
		<td data-name="_Route"<?php echo $pres_mas_route->_Route->cellAttributes() ?>>
<span id="el<?php echo $pres_mas_route_list->RowCnt ?>_pres_mas_route__Route" class="pres_mas_route__Route">
<span<?php echo $pres_mas_route->_Route->viewAttributes() ?>>
<?php echo $pres_mas_route->_Route->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pres_mas_route_list->ListOptions->render("body", "right", $pres_mas_route_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$pres_mas_route->isGridAdd())
		$pres_mas_route_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$pres_mas_route->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pres_mas_route_list->Recordset)
	$pres_mas_route_list->Recordset->Close();
?>
<?php if (!$pres_mas_route->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$pres_mas_route->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($pres_mas_route_list->Pager)) $pres_mas_route_list->Pager = new NumericPager($pres_mas_route_list->StartRec, $pres_mas_route_list->DisplayRecs, $pres_mas_route_list->TotalRecs, $pres_mas_route_list->RecRange, $pres_mas_route_list->AutoHidePager) ?>
<?php if ($pres_mas_route_list->Pager->RecordCount > 0 && $pres_mas_route_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($pres_mas_route_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_mas_route_list->pageUrl() ?>start=<?php echo $pres_mas_route_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($pres_mas_route_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_mas_route_list->pageUrl() ?>start=<?php echo $pres_mas_route_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($pres_mas_route_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $pres_mas_route_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($pres_mas_route_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_mas_route_list->pageUrl() ?>start=<?php echo $pres_mas_route_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($pres_mas_route_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_mas_route_list->pageUrl() ?>start=<?php echo $pres_mas_route_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($pres_mas_route_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $pres_mas_route_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $pres_mas_route_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $pres_mas_route_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($pres_mas_route_list->TotalRecs > 0 && (!$pres_mas_route_list->AutoHidePageSizeSelector || $pres_mas_route_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="pres_mas_route">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($pres_mas_route_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($pres_mas_route_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($pres_mas_route_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($pres_mas_route_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($pres_mas_route_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($pres_mas_route_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($pres_mas_route->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pres_mas_route_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pres_mas_route_list->TotalRecs == 0 && !$pres_mas_route->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pres_mas_route_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$pres_mas_route_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$pres_mas_route->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$pres_mas_route->isExport()) { ?>
<script>
ew.scrollableTable("gmp_pres_mas_route", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$pres_mas_route_list->terminate();
?>