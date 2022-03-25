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
$crm_leadsource_list = new crm_leadsource_list();

// Run the page
$crm_leadsource_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$crm_leadsource_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$crm_leadsource->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fcrm_leadsourcelist = currentForm = new ew.Form("fcrm_leadsourcelist", "list");
fcrm_leadsourcelist.formKeyCountName = '<?php echo $crm_leadsource_list->FormKeyCountName ?>';

// Form_CustomValidate event
fcrm_leadsourcelist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fcrm_leadsourcelist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fcrm_leadsourcelistsrch = currentSearchForm = new ew.Form("fcrm_leadsourcelistsrch");

// Filters
fcrm_leadsourcelistsrch.filterList = <?php echo $crm_leadsource_list->getFilterList() ?>;
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
<?php if (!$crm_leadsource->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($crm_leadsource_list->TotalRecs > 0 && $crm_leadsource_list->ExportOptions->visible()) { ?>
<?php $crm_leadsource_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($crm_leadsource_list->ImportOptions->visible()) { ?>
<?php $crm_leadsource_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($crm_leadsource_list->SearchOptions->visible()) { ?>
<?php $crm_leadsource_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($crm_leadsource_list->FilterOptions->visible()) { ?>
<?php $crm_leadsource_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$crm_leadsource_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$crm_leadsource->isExport() && !$crm_leadsource->CurrentAction) { ?>
<form name="fcrm_leadsourcelistsrch" id="fcrm_leadsourcelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($crm_leadsource_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fcrm_leadsourcelistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="crm_leadsource">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($crm_leadsource_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($crm_leadsource_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $crm_leadsource_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($crm_leadsource_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($crm_leadsource_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($crm_leadsource_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($crm_leadsource_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $crm_leadsource_list->showPageHeader(); ?>
<?php
$crm_leadsource_list->showMessage();
?>
<?php if ($crm_leadsource_list->TotalRecs > 0 || $crm_leadsource->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($crm_leadsource_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> crm_leadsource">
<?php if (!$crm_leadsource->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$crm_leadsource->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($crm_leadsource_list->Pager)) $crm_leadsource_list->Pager = new NumericPager($crm_leadsource_list->StartRec, $crm_leadsource_list->DisplayRecs, $crm_leadsource_list->TotalRecs, $crm_leadsource_list->RecRange, $crm_leadsource_list->AutoHidePager) ?>
<?php if ($crm_leadsource_list->Pager->RecordCount > 0 && $crm_leadsource_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($crm_leadsource_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $crm_leadsource_list->pageUrl() ?>start=<?php echo $crm_leadsource_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($crm_leadsource_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $crm_leadsource_list->pageUrl() ?>start=<?php echo $crm_leadsource_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($crm_leadsource_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $crm_leadsource_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($crm_leadsource_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $crm_leadsource_list->pageUrl() ?>start=<?php echo $crm_leadsource_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($crm_leadsource_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $crm_leadsource_list->pageUrl() ?>start=<?php echo $crm_leadsource_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($crm_leadsource_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $crm_leadsource_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $crm_leadsource_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $crm_leadsource_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($crm_leadsource_list->TotalRecs > 0 && (!$crm_leadsource_list->AutoHidePageSizeSelector || $crm_leadsource_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="crm_leadsource">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($crm_leadsource_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($crm_leadsource_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($crm_leadsource_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($crm_leadsource_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($crm_leadsource_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($crm_leadsource_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($crm_leadsource->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $crm_leadsource_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fcrm_leadsourcelist" id="fcrm_leadsourcelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($crm_leadsource_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $crm_leadsource_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="crm_leadsource">
<div id="gmp_crm_leadsource" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($crm_leadsource_list->TotalRecs > 0 || $crm_leadsource->isGridEdit()) { ?>
<table id="tbl_crm_leadsourcelist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$crm_leadsource_list->RowType = ROWTYPE_HEADER;

// Render list options
$crm_leadsource_list->renderListOptions();

// Render list options (header, left)
$crm_leadsource_list->ListOptions->render("header", "left");
?>
<?php if ($crm_leadsource->leadsourceid->Visible) { // leadsourceid ?>
	<?php if ($crm_leadsource->sortUrl($crm_leadsource->leadsourceid) == "") { ?>
		<th data-name="leadsourceid" class="<?php echo $crm_leadsource->leadsourceid->headerCellClass() ?>"><div id="elh_crm_leadsource_leadsourceid" class="crm_leadsource_leadsourceid"><div class="ew-table-header-caption"><?php echo $crm_leadsource->leadsourceid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="leadsourceid" class="<?php echo $crm_leadsource->leadsourceid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leadsource->SortUrl($crm_leadsource->leadsourceid) ?>',1);"><div id="elh_crm_leadsource_leadsourceid" class="crm_leadsource_leadsourceid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leadsource->leadsourceid->caption() ?></span><span class="ew-table-header-sort"><?php if ($crm_leadsource->leadsourceid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leadsource->leadsourceid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_leadsource->leadsource->Visible) { // leadsource ?>
	<?php if ($crm_leadsource->sortUrl($crm_leadsource->leadsource) == "") { ?>
		<th data-name="leadsource" class="<?php echo $crm_leadsource->leadsource->headerCellClass() ?>"><div id="elh_crm_leadsource_leadsource" class="crm_leadsource_leadsource"><div class="ew-table-header-caption"><?php echo $crm_leadsource->leadsource->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="leadsource" class="<?php echo $crm_leadsource->leadsource->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leadsource->SortUrl($crm_leadsource->leadsource) ?>',1);"><div id="elh_crm_leadsource_leadsource" class="crm_leadsource_leadsource">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leadsource->leadsource->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($crm_leadsource->leadsource->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leadsource->leadsource->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_leadsource->presence->Visible) { // presence ?>
	<?php if ($crm_leadsource->sortUrl($crm_leadsource->presence) == "") { ?>
		<th data-name="presence" class="<?php echo $crm_leadsource->presence->headerCellClass() ?>"><div id="elh_crm_leadsource_presence" class="crm_leadsource_presence"><div class="ew-table-header-caption"><?php echo $crm_leadsource->presence->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="presence" class="<?php echo $crm_leadsource->presence->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leadsource->SortUrl($crm_leadsource->presence) ?>',1);"><div id="elh_crm_leadsource_presence" class="crm_leadsource_presence">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leadsource->presence->caption() ?></span><span class="ew-table-header-sort"><?php if ($crm_leadsource->presence->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leadsource->presence->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_leadsource->picklist_valueid->Visible) { // picklist_valueid ?>
	<?php if ($crm_leadsource->sortUrl($crm_leadsource->picklist_valueid) == "") { ?>
		<th data-name="picklist_valueid" class="<?php echo $crm_leadsource->picklist_valueid->headerCellClass() ?>"><div id="elh_crm_leadsource_picklist_valueid" class="crm_leadsource_picklist_valueid"><div class="ew-table-header-caption"><?php echo $crm_leadsource->picklist_valueid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="picklist_valueid" class="<?php echo $crm_leadsource->picklist_valueid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leadsource->SortUrl($crm_leadsource->picklist_valueid) ?>',1);"><div id="elh_crm_leadsource_picklist_valueid" class="crm_leadsource_picklist_valueid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leadsource->picklist_valueid->caption() ?></span><span class="ew-table-header-sort"><?php if ($crm_leadsource->picklist_valueid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leadsource->picklist_valueid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_leadsource->sortorderid->Visible) { // sortorderid ?>
	<?php if ($crm_leadsource->sortUrl($crm_leadsource->sortorderid) == "") { ?>
		<th data-name="sortorderid" class="<?php echo $crm_leadsource->sortorderid->headerCellClass() ?>"><div id="elh_crm_leadsource_sortorderid" class="crm_leadsource_sortorderid"><div class="ew-table-header-caption"><?php echo $crm_leadsource->sortorderid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sortorderid" class="<?php echo $crm_leadsource->sortorderid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leadsource->SortUrl($crm_leadsource->sortorderid) ?>',1);"><div id="elh_crm_leadsource_sortorderid" class="crm_leadsource_sortorderid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leadsource->sortorderid->caption() ?></span><span class="ew-table-header-sort"><?php if ($crm_leadsource->sortorderid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leadsource->sortorderid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$crm_leadsource_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($crm_leadsource->ExportAll && $crm_leadsource->isExport()) {
	$crm_leadsource_list->StopRec = $crm_leadsource_list->TotalRecs;
} else {

	// Set the last record to display
	if ($crm_leadsource_list->TotalRecs > $crm_leadsource_list->StartRec + $crm_leadsource_list->DisplayRecs - 1)
		$crm_leadsource_list->StopRec = $crm_leadsource_list->StartRec + $crm_leadsource_list->DisplayRecs - 1;
	else
		$crm_leadsource_list->StopRec = $crm_leadsource_list->TotalRecs;
}
$crm_leadsource_list->RecCnt = $crm_leadsource_list->StartRec - 1;
if ($crm_leadsource_list->Recordset && !$crm_leadsource_list->Recordset->EOF) {
	$crm_leadsource_list->Recordset->moveFirst();
	$selectLimit = $crm_leadsource_list->UseSelectLimit;
	if (!$selectLimit && $crm_leadsource_list->StartRec > 1)
		$crm_leadsource_list->Recordset->move($crm_leadsource_list->StartRec - 1);
} elseif (!$crm_leadsource->AllowAddDeleteRow && $crm_leadsource_list->StopRec == 0) {
	$crm_leadsource_list->StopRec = $crm_leadsource->GridAddRowCount;
}

// Initialize aggregate
$crm_leadsource->RowType = ROWTYPE_AGGREGATEINIT;
$crm_leadsource->resetAttributes();
$crm_leadsource_list->renderRow();
while ($crm_leadsource_list->RecCnt < $crm_leadsource_list->StopRec) {
	$crm_leadsource_list->RecCnt++;
	if ($crm_leadsource_list->RecCnt >= $crm_leadsource_list->StartRec) {
		$crm_leadsource_list->RowCnt++;

		// Set up key count
		$crm_leadsource_list->KeyCount = $crm_leadsource_list->RowIndex;

		// Init row class and style
		$crm_leadsource->resetAttributes();
		$crm_leadsource->CssClass = "";
		if ($crm_leadsource->isGridAdd()) {
		} else {
			$crm_leadsource_list->loadRowValues($crm_leadsource_list->Recordset); // Load row values
		}
		$crm_leadsource->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$crm_leadsource->RowAttrs = array_merge($crm_leadsource->RowAttrs, array('data-rowindex'=>$crm_leadsource_list->RowCnt, 'id'=>'r' . $crm_leadsource_list->RowCnt . '_crm_leadsource', 'data-rowtype'=>$crm_leadsource->RowType));

		// Render row
		$crm_leadsource_list->renderRow();

		// Render list options
		$crm_leadsource_list->renderListOptions();
?>
	<tr<?php echo $crm_leadsource->rowAttributes() ?>>
<?php

// Render list options (body, left)
$crm_leadsource_list->ListOptions->render("body", "left", $crm_leadsource_list->RowCnt);
?>
	<?php if ($crm_leadsource->leadsourceid->Visible) { // leadsourceid ?>
		<td data-name="leadsourceid"<?php echo $crm_leadsource->leadsourceid->cellAttributes() ?>>
<span id="el<?php echo $crm_leadsource_list->RowCnt ?>_crm_leadsource_leadsourceid" class="crm_leadsource_leadsourceid">
<span<?php echo $crm_leadsource->leadsourceid->viewAttributes() ?>>
<?php echo $crm_leadsource->leadsourceid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_leadsource->leadsource->Visible) { // leadsource ?>
		<td data-name="leadsource"<?php echo $crm_leadsource->leadsource->cellAttributes() ?>>
<span id="el<?php echo $crm_leadsource_list->RowCnt ?>_crm_leadsource_leadsource" class="crm_leadsource_leadsource">
<span<?php echo $crm_leadsource->leadsource->viewAttributes() ?>>
<?php echo $crm_leadsource->leadsource->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_leadsource->presence->Visible) { // presence ?>
		<td data-name="presence"<?php echo $crm_leadsource->presence->cellAttributes() ?>>
<span id="el<?php echo $crm_leadsource_list->RowCnt ?>_crm_leadsource_presence" class="crm_leadsource_presence">
<span<?php echo $crm_leadsource->presence->viewAttributes() ?>>
<?php echo $crm_leadsource->presence->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_leadsource->picklist_valueid->Visible) { // picklist_valueid ?>
		<td data-name="picklist_valueid"<?php echo $crm_leadsource->picklist_valueid->cellAttributes() ?>>
<span id="el<?php echo $crm_leadsource_list->RowCnt ?>_crm_leadsource_picklist_valueid" class="crm_leadsource_picklist_valueid">
<span<?php echo $crm_leadsource->picklist_valueid->viewAttributes() ?>>
<?php echo $crm_leadsource->picklist_valueid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_leadsource->sortorderid->Visible) { // sortorderid ?>
		<td data-name="sortorderid"<?php echo $crm_leadsource->sortorderid->cellAttributes() ?>>
<span id="el<?php echo $crm_leadsource_list->RowCnt ?>_crm_leadsource_sortorderid" class="crm_leadsource_sortorderid">
<span<?php echo $crm_leadsource->sortorderid->viewAttributes() ?>>
<?php echo $crm_leadsource->sortorderid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$crm_leadsource_list->ListOptions->render("body", "right", $crm_leadsource_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$crm_leadsource->isGridAdd())
		$crm_leadsource_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$crm_leadsource->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($crm_leadsource_list->Recordset)
	$crm_leadsource_list->Recordset->Close();
?>
<?php if (!$crm_leadsource->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$crm_leadsource->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($crm_leadsource_list->Pager)) $crm_leadsource_list->Pager = new NumericPager($crm_leadsource_list->StartRec, $crm_leadsource_list->DisplayRecs, $crm_leadsource_list->TotalRecs, $crm_leadsource_list->RecRange, $crm_leadsource_list->AutoHidePager) ?>
<?php if ($crm_leadsource_list->Pager->RecordCount > 0 && $crm_leadsource_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($crm_leadsource_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $crm_leadsource_list->pageUrl() ?>start=<?php echo $crm_leadsource_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($crm_leadsource_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $crm_leadsource_list->pageUrl() ?>start=<?php echo $crm_leadsource_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($crm_leadsource_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $crm_leadsource_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($crm_leadsource_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $crm_leadsource_list->pageUrl() ?>start=<?php echo $crm_leadsource_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($crm_leadsource_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $crm_leadsource_list->pageUrl() ?>start=<?php echo $crm_leadsource_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($crm_leadsource_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $crm_leadsource_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $crm_leadsource_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $crm_leadsource_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($crm_leadsource_list->TotalRecs > 0 && (!$crm_leadsource_list->AutoHidePageSizeSelector || $crm_leadsource_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="crm_leadsource">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($crm_leadsource_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($crm_leadsource_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($crm_leadsource_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($crm_leadsource_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($crm_leadsource_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($crm_leadsource_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($crm_leadsource->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $crm_leadsource_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($crm_leadsource_list->TotalRecs == 0 && !$crm_leadsource->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $crm_leadsource_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$crm_leadsource_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$crm_leadsource->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$crm_leadsource->isExport()) { ?>
<script>
ew.scrollableTable("gmp_crm_leadsource", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$crm_leadsource_list->terminate();
?>