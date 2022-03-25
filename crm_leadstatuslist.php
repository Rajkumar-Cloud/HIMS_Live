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
$crm_leadstatus_list = new crm_leadstatus_list();

// Run the page
$crm_leadstatus_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$crm_leadstatus_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$crm_leadstatus->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fcrm_leadstatuslist = currentForm = new ew.Form("fcrm_leadstatuslist", "list");
fcrm_leadstatuslist.formKeyCountName = '<?php echo $crm_leadstatus_list->FormKeyCountName ?>';

// Form_CustomValidate event
fcrm_leadstatuslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fcrm_leadstatuslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fcrm_leadstatuslistsrch = currentSearchForm = new ew.Form("fcrm_leadstatuslistsrch");

// Filters
fcrm_leadstatuslistsrch.filterList = <?php echo $crm_leadstatus_list->getFilterList() ?>;
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
<?php if (!$crm_leadstatus->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($crm_leadstatus_list->TotalRecs > 0 && $crm_leadstatus_list->ExportOptions->visible()) { ?>
<?php $crm_leadstatus_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($crm_leadstatus_list->ImportOptions->visible()) { ?>
<?php $crm_leadstatus_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($crm_leadstatus_list->SearchOptions->visible()) { ?>
<?php $crm_leadstatus_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($crm_leadstatus_list->FilterOptions->visible()) { ?>
<?php $crm_leadstatus_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$crm_leadstatus_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$crm_leadstatus->isExport() && !$crm_leadstatus->CurrentAction) { ?>
<form name="fcrm_leadstatuslistsrch" id="fcrm_leadstatuslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($crm_leadstatus_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fcrm_leadstatuslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="crm_leadstatus">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($crm_leadstatus_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($crm_leadstatus_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $crm_leadstatus_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($crm_leadstatus_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($crm_leadstatus_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($crm_leadstatus_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($crm_leadstatus_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $crm_leadstatus_list->showPageHeader(); ?>
<?php
$crm_leadstatus_list->showMessage();
?>
<?php if ($crm_leadstatus_list->TotalRecs > 0 || $crm_leadstatus->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($crm_leadstatus_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> crm_leadstatus">
<?php if (!$crm_leadstatus->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$crm_leadstatus->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($crm_leadstatus_list->Pager)) $crm_leadstatus_list->Pager = new NumericPager($crm_leadstatus_list->StartRec, $crm_leadstatus_list->DisplayRecs, $crm_leadstatus_list->TotalRecs, $crm_leadstatus_list->RecRange, $crm_leadstatus_list->AutoHidePager) ?>
<?php if ($crm_leadstatus_list->Pager->RecordCount > 0 && $crm_leadstatus_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($crm_leadstatus_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $crm_leadstatus_list->pageUrl() ?>start=<?php echo $crm_leadstatus_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($crm_leadstatus_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $crm_leadstatus_list->pageUrl() ?>start=<?php echo $crm_leadstatus_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($crm_leadstatus_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $crm_leadstatus_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($crm_leadstatus_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $crm_leadstatus_list->pageUrl() ?>start=<?php echo $crm_leadstatus_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($crm_leadstatus_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $crm_leadstatus_list->pageUrl() ?>start=<?php echo $crm_leadstatus_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($crm_leadstatus_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $crm_leadstatus_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $crm_leadstatus_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $crm_leadstatus_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($crm_leadstatus_list->TotalRecs > 0 && (!$crm_leadstatus_list->AutoHidePageSizeSelector || $crm_leadstatus_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="crm_leadstatus">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($crm_leadstatus_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($crm_leadstatus_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($crm_leadstatus_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($crm_leadstatus_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($crm_leadstatus_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($crm_leadstatus_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($crm_leadstatus->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $crm_leadstatus_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fcrm_leadstatuslist" id="fcrm_leadstatuslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($crm_leadstatus_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $crm_leadstatus_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="crm_leadstatus">
<div id="gmp_crm_leadstatus" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($crm_leadstatus_list->TotalRecs > 0 || $crm_leadstatus->isGridEdit()) { ?>
<table id="tbl_crm_leadstatuslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$crm_leadstatus_list->RowType = ROWTYPE_HEADER;

// Render list options
$crm_leadstatus_list->renderListOptions();

// Render list options (header, left)
$crm_leadstatus_list->ListOptions->render("header", "left");
?>
<?php if ($crm_leadstatus->leadstatusid->Visible) { // leadstatusid ?>
	<?php if ($crm_leadstatus->sortUrl($crm_leadstatus->leadstatusid) == "") { ?>
		<th data-name="leadstatusid" class="<?php echo $crm_leadstatus->leadstatusid->headerCellClass() ?>"><div id="elh_crm_leadstatus_leadstatusid" class="crm_leadstatus_leadstatusid"><div class="ew-table-header-caption"><?php echo $crm_leadstatus->leadstatusid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="leadstatusid" class="<?php echo $crm_leadstatus->leadstatusid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leadstatus->SortUrl($crm_leadstatus->leadstatusid) ?>',1);"><div id="elh_crm_leadstatus_leadstatusid" class="crm_leadstatus_leadstatusid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leadstatus->leadstatusid->caption() ?></span><span class="ew-table-header-sort"><?php if ($crm_leadstatus->leadstatusid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leadstatus->leadstatusid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_leadstatus->leadstatus->Visible) { // leadstatus ?>
	<?php if ($crm_leadstatus->sortUrl($crm_leadstatus->leadstatus) == "") { ?>
		<th data-name="leadstatus" class="<?php echo $crm_leadstatus->leadstatus->headerCellClass() ?>"><div id="elh_crm_leadstatus_leadstatus" class="crm_leadstatus_leadstatus"><div class="ew-table-header-caption"><?php echo $crm_leadstatus->leadstatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="leadstatus" class="<?php echo $crm_leadstatus->leadstatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leadstatus->SortUrl($crm_leadstatus->leadstatus) ?>',1);"><div id="elh_crm_leadstatus_leadstatus" class="crm_leadstatus_leadstatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leadstatus->leadstatus->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($crm_leadstatus->leadstatus->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leadstatus->leadstatus->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_leadstatus->presence->Visible) { // presence ?>
	<?php if ($crm_leadstatus->sortUrl($crm_leadstatus->presence) == "") { ?>
		<th data-name="presence" class="<?php echo $crm_leadstatus->presence->headerCellClass() ?>"><div id="elh_crm_leadstatus_presence" class="crm_leadstatus_presence"><div class="ew-table-header-caption"><?php echo $crm_leadstatus->presence->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="presence" class="<?php echo $crm_leadstatus->presence->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leadstatus->SortUrl($crm_leadstatus->presence) ?>',1);"><div id="elh_crm_leadstatus_presence" class="crm_leadstatus_presence">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leadstatus->presence->caption() ?></span><span class="ew-table-header-sort"><?php if ($crm_leadstatus->presence->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leadstatus->presence->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_leadstatus->picklist_valueid->Visible) { // picklist_valueid ?>
	<?php if ($crm_leadstatus->sortUrl($crm_leadstatus->picklist_valueid) == "") { ?>
		<th data-name="picklist_valueid" class="<?php echo $crm_leadstatus->picklist_valueid->headerCellClass() ?>"><div id="elh_crm_leadstatus_picklist_valueid" class="crm_leadstatus_picklist_valueid"><div class="ew-table-header-caption"><?php echo $crm_leadstatus->picklist_valueid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="picklist_valueid" class="<?php echo $crm_leadstatus->picklist_valueid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leadstatus->SortUrl($crm_leadstatus->picklist_valueid) ?>',1);"><div id="elh_crm_leadstatus_picklist_valueid" class="crm_leadstatus_picklist_valueid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leadstatus->picklist_valueid->caption() ?></span><span class="ew-table-header-sort"><?php if ($crm_leadstatus->picklist_valueid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leadstatus->picklist_valueid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_leadstatus->sortorderid->Visible) { // sortorderid ?>
	<?php if ($crm_leadstatus->sortUrl($crm_leadstatus->sortorderid) == "") { ?>
		<th data-name="sortorderid" class="<?php echo $crm_leadstatus->sortorderid->headerCellClass() ?>"><div id="elh_crm_leadstatus_sortorderid" class="crm_leadstatus_sortorderid"><div class="ew-table-header-caption"><?php echo $crm_leadstatus->sortorderid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sortorderid" class="<?php echo $crm_leadstatus->sortorderid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leadstatus->SortUrl($crm_leadstatus->sortorderid) ?>',1);"><div id="elh_crm_leadstatus_sortorderid" class="crm_leadstatus_sortorderid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leadstatus->sortorderid->caption() ?></span><span class="ew-table-header-sort"><?php if ($crm_leadstatus->sortorderid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leadstatus->sortorderid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($crm_leadstatus->color->Visible) { // color ?>
	<?php if ($crm_leadstatus->sortUrl($crm_leadstatus->color) == "") { ?>
		<th data-name="color" class="<?php echo $crm_leadstatus->color->headerCellClass() ?>"><div id="elh_crm_leadstatus_color" class="crm_leadstatus_color"><div class="ew-table-header-caption"><?php echo $crm_leadstatus->color->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="color" class="<?php echo $crm_leadstatus->color->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $crm_leadstatus->SortUrl($crm_leadstatus->color) ?>',1);"><div id="elh_crm_leadstatus_color" class="crm_leadstatus_color">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $crm_leadstatus->color->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($crm_leadstatus->color->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($crm_leadstatus->color->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$crm_leadstatus_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($crm_leadstatus->ExportAll && $crm_leadstatus->isExport()) {
	$crm_leadstatus_list->StopRec = $crm_leadstatus_list->TotalRecs;
} else {

	// Set the last record to display
	if ($crm_leadstatus_list->TotalRecs > $crm_leadstatus_list->StartRec + $crm_leadstatus_list->DisplayRecs - 1)
		$crm_leadstatus_list->StopRec = $crm_leadstatus_list->StartRec + $crm_leadstatus_list->DisplayRecs - 1;
	else
		$crm_leadstatus_list->StopRec = $crm_leadstatus_list->TotalRecs;
}
$crm_leadstatus_list->RecCnt = $crm_leadstatus_list->StartRec - 1;
if ($crm_leadstatus_list->Recordset && !$crm_leadstatus_list->Recordset->EOF) {
	$crm_leadstatus_list->Recordset->moveFirst();
	$selectLimit = $crm_leadstatus_list->UseSelectLimit;
	if (!$selectLimit && $crm_leadstatus_list->StartRec > 1)
		$crm_leadstatus_list->Recordset->move($crm_leadstatus_list->StartRec - 1);
} elseif (!$crm_leadstatus->AllowAddDeleteRow && $crm_leadstatus_list->StopRec == 0) {
	$crm_leadstatus_list->StopRec = $crm_leadstatus->GridAddRowCount;
}

// Initialize aggregate
$crm_leadstatus->RowType = ROWTYPE_AGGREGATEINIT;
$crm_leadstatus->resetAttributes();
$crm_leadstatus_list->renderRow();
while ($crm_leadstatus_list->RecCnt < $crm_leadstatus_list->StopRec) {
	$crm_leadstatus_list->RecCnt++;
	if ($crm_leadstatus_list->RecCnt >= $crm_leadstatus_list->StartRec) {
		$crm_leadstatus_list->RowCnt++;

		// Set up key count
		$crm_leadstatus_list->KeyCount = $crm_leadstatus_list->RowIndex;

		// Init row class and style
		$crm_leadstatus->resetAttributes();
		$crm_leadstatus->CssClass = "";
		if ($crm_leadstatus->isGridAdd()) {
		} else {
			$crm_leadstatus_list->loadRowValues($crm_leadstatus_list->Recordset); // Load row values
		}
		$crm_leadstatus->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$crm_leadstatus->RowAttrs = array_merge($crm_leadstatus->RowAttrs, array('data-rowindex'=>$crm_leadstatus_list->RowCnt, 'id'=>'r' . $crm_leadstatus_list->RowCnt . '_crm_leadstatus', 'data-rowtype'=>$crm_leadstatus->RowType));

		// Render row
		$crm_leadstatus_list->renderRow();

		// Render list options
		$crm_leadstatus_list->renderListOptions();
?>
	<tr<?php echo $crm_leadstatus->rowAttributes() ?>>
<?php

// Render list options (body, left)
$crm_leadstatus_list->ListOptions->render("body", "left", $crm_leadstatus_list->RowCnt);
?>
	<?php if ($crm_leadstatus->leadstatusid->Visible) { // leadstatusid ?>
		<td data-name="leadstatusid"<?php echo $crm_leadstatus->leadstatusid->cellAttributes() ?>>
<span id="el<?php echo $crm_leadstatus_list->RowCnt ?>_crm_leadstatus_leadstatusid" class="crm_leadstatus_leadstatusid">
<span<?php echo $crm_leadstatus->leadstatusid->viewAttributes() ?>>
<?php echo $crm_leadstatus->leadstatusid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_leadstatus->leadstatus->Visible) { // leadstatus ?>
		<td data-name="leadstatus"<?php echo $crm_leadstatus->leadstatus->cellAttributes() ?>>
<span id="el<?php echo $crm_leadstatus_list->RowCnt ?>_crm_leadstatus_leadstatus" class="crm_leadstatus_leadstatus">
<span<?php echo $crm_leadstatus->leadstatus->viewAttributes() ?>>
<?php echo $crm_leadstatus->leadstatus->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_leadstatus->presence->Visible) { // presence ?>
		<td data-name="presence"<?php echo $crm_leadstatus->presence->cellAttributes() ?>>
<span id="el<?php echo $crm_leadstatus_list->RowCnt ?>_crm_leadstatus_presence" class="crm_leadstatus_presence">
<span<?php echo $crm_leadstatus->presence->viewAttributes() ?>>
<?php echo $crm_leadstatus->presence->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_leadstatus->picklist_valueid->Visible) { // picklist_valueid ?>
		<td data-name="picklist_valueid"<?php echo $crm_leadstatus->picklist_valueid->cellAttributes() ?>>
<span id="el<?php echo $crm_leadstatus_list->RowCnt ?>_crm_leadstatus_picklist_valueid" class="crm_leadstatus_picklist_valueid">
<span<?php echo $crm_leadstatus->picklist_valueid->viewAttributes() ?>>
<?php echo $crm_leadstatus->picklist_valueid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_leadstatus->sortorderid->Visible) { // sortorderid ?>
		<td data-name="sortorderid"<?php echo $crm_leadstatus->sortorderid->cellAttributes() ?>>
<span id="el<?php echo $crm_leadstatus_list->RowCnt ?>_crm_leadstatus_sortorderid" class="crm_leadstatus_sortorderid">
<span<?php echo $crm_leadstatus->sortorderid->viewAttributes() ?>>
<?php echo $crm_leadstatus->sortorderid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($crm_leadstatus->color->Visible) { // color ?>
		<td data-name="color"<?php echo $crm_leadstatus->color->cellAttributes() ?>>
<span id="el<?php echo $crm_leadstatus_list->RowCnt ?>_crm_leadstatus_color" class="crm_leadstatus_color">
<span<?php echo $crm_leadstatus->color->viewAttributes() ?>>
<?php echo $crm_leadstatus->color->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$crm_leadstatus_list->ListOptions->render("body", "right", $crm_leadstatus_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$crm_leadstatus->isGridAdd())
		$crm_leadstatus_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$crm_leadstatus->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($crm_leadstatus_list->Recordset)
	$crm_leadstatus_list->Recordset->Close();
?>
<?php if (!$crm_leadstatus->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$crm_leadstatus->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($crm_leadstatus_list->Pager)) $crm_leadstatus_list->Pager = new NumericPager($crm_leadstatus_list->StartRec, $crm_leadstatus_list->DisplayRecs, $crm_leadstatus_list->TotalRecs, $crm_leadstatus_list->RecRange, $crm_leadstatus_list->AutoHidePager) ?>
<?php if ($crm_leadstatus_list->Pager->RecordCount > 0 && $crm_leadstatus_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($crm_leadstatus_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $crm_leadstatus_list->pageUrl() ?>start=<?php echo $crm_leadstatus_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($crm_leadstatus_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $crm_leadstatus_list->pageUrl() ?>start=<?php echo $crm_leadstatus_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($crm_leadstatus_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $crm_leadstatus_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($crm_leadstatus_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $crm_leadstatus_list->pageUrl() ?>start=<?php echo $crm_leadstatus_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($crm_leadstatus_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $crm_leadstatus_list->pageUrl() ?>start=<?php echo $crm_leadstatus_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($crm_leadstatus_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $crm_leadstatus_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $crm_leadstatus_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $crm_leadstatus_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($crm_leadstatus_list->TotalRecs > 0 && (!$crm_leadstatus_list->AutoHidePageSizeSelector || $crm_leadstatus_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="crm_leadstatus">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($crm_leadstatus_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($crm_leadstatus_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($crm_leadstatus_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($crm_leadstatus_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($crm_leadstatus_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($crm_leadstatus_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($crm_leadstatus->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $crm_leadstatus_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($crm_leadstatus_list->TotalRecs == 0 && !$crm_leadstatus->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $crm_leadstatus_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$crm_leadstatus_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$crm_leadstatus->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$crm_leadstatus->isExport()) { ?>
<script>
ew.scrollableTable("gmp_crm_leadstatus", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$crm_leadstatus_list->terminate();
?>