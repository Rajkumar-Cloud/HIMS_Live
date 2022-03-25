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
$ivf_agency_list = new ivf_agency_list();

// Run the page
$ivf_agency_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_agency_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$ivf_agency->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fivf_agencylist = currentForm = new ew.Form("fivf_agencylist", "list");
fivf_agencylist.formKeyCountName = '<?php echo $ivf_agency_list->FormKeyCountName ?>';

// Form_CustomValidate event
fivf_agencylist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_agencylist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fivf_agencylistsrch = currentSearchForm = new ew.Form("fivf_agencylistsrch");

// Filters
fivf_agencylistsrch.filterList = <?php echo $ivf_agency_list->getFilterList() ?>;
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
<?php if (!$ivf_agency->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($ivf_agency_list->TotalRecs > 0 && $ivf_agency_list->ExportOptions->visible()) { ?>
<?php $ivf_agency_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_agency_list->ImportOptions->visible()) { ?>
<?php $ivf_agency_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_agency_list->SearchOptions->visible()) { ?>
<?php $ivf_agency_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_agency_list->FilterOptions->visible()) { ?>
<?php $ivf_agency_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$ivf_agency_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$ivf_agency->isExport() && !$ivf_agency->CurrentAction) { ?>
<form name="fivf_agencylistsrch" id="fivf_agencylistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($ivf_agency_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fivf_agencylistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="ivf_agency">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($ivf_agency_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($ivf_agency_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $ivf_agency_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($ivf_agency_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($ivf_agency_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($ivf_agency_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($ivf_agency_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $ivf_agency_list->showPageHeader(); ?>
<?php
$ivf_agency_list->showMessage();
?>
<?php if ($ivf_agency_list->TotalRecs > 0 || $ivf_agency->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($ivf_agency_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf_agency">
<?php if (!$ivf_agency->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$ivf_agency->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($ivf_agency_list->Pager)) $ivf_agency_list->Pager = new NumericPager($ivf_agency_list->StartRec, $ivf_agency_list->DisplayRecs, $ivf_agency_list->TotalRecs, $ivf_agency_list->RecRange, $ivf_agency_list->AutoHidePager) ?>
<?php if ($ivf_agency_list->Pager->RecordCount > 0 && $ivf_agency_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($ivf_agency_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_agency_list->pageUrl() ?>start=<?php echo $ivf_agency_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($ivf_agency_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_agency_list->pageUrl() ?>start=<?php echo $ivf_agency_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($ivf_agency_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $ivf_agency_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($ivf_agency_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_agency_list->pageUrl() ?>start=<?php echo $ivf_agency_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($ivf_agency_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_agency_list->pageUrl() ?>start=<?php echo $ivf_agency_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($ivf_agency_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $ivf_agency_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $ivf_agency_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $ivf_agency_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($ivf_agency_list->TotalRecs > 0 && (!$ivf_agency_list->AutoHidePageSizeSelector || $ivf_agency_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="ivf_agency">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($ivf_agency_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($ivf_agency_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($ivf_agency_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($ivf_agency_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($ivf_agency_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($ivf_agency_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($ivf_agency->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ivf_agency_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fivf_agencylist" id="fivf_agencylist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ivf_agency_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_agency_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_agency">
<div id="gmp_ivf_agency" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($ivf_agency_list->TotalRecs > 0 || $ivf_agency->isGridEdit()) { ?>
<table id="tbl_ivf_agencylist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$ivf_agency_list->RowType = ROWTYPE_HEADER;

// Render list options
$ivf_agency_list->renderListOptions();

// Render list options (header, left)
$ivf_agency_list->ListOptions->render("header", "left");
?>
<?php if ($ivf_agency->id->Visible) { // id ?>
	<?php if ($ivf_agency->sortUrl($ivf_agency->id) == "") { ?>
		<th data-name="id" class="<?php echo $ivf_agency->id->headerCellClass() ?>"><div id="elh_ivf_agency_id" class="ivf_agency_id"><div class="ew-table-header-caption"><?php echo $ivf_agency->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $ivf_agency->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_agency->SortUrl($ivf_agency->id) ?>',1);"><div id="elh_ivf_agency_id" class="ivf_agency_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_agency->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_agency->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_agency->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_agency->Name->Visible) { // Name ?>
	<?php if ($ivf_agency->sortUrl($ivf_agency->Name) == "") { ?>
		<th data-name="Name" class="<?php echo $ivf_agency->Name->headerCellClass() ?>"><div id="elh_ivf_agency_Name" class="ivf_agency_Name"><div class="ew-table-header-caption"><?php echo $ivf_agency->Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Name" class="<?php echo $ivf_agency->Name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_agency->SortUrl($ivf_agency->Name) ?>',1);"><div id="elh_ivf_agency_Name" class="ivf_agency_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_agency->Name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_agency->Name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_agency->Name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_agency->Street->Visible) { // Street ?>
	<?php if ($ivf_agency->sortUrl($ivf_agency->Street) == "") { ?>
		<th data-name="Street" class="<?php echo $ivf_agency->Street->headerCellClass() ?>"><div id="elh_ivf_agency_Street" class="ivf_agency_Street"><div class="ew-table-header-caption"><?php echo $ivf_agency->Street->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Street" class="<?php echo $ivf_agency->Street->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_agency->SortUrl($ivf_agency->Street) ?>',1);"><div id="elh_ivf_agency_Street" class="ivf_agency_Street">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_agency->Street->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_agency->Street->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_agency->Street->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_agency->Town->Visible) { // Town ?>
	<?php if ($ivf_agency->sortUrl($ivf_agency->Town) == "") { ?>
		<th data-name="Town" class="<?php echo $ivf_agency->Town->headerCellClass() ?>"><div id="elh_ivf_agency_Town" class="ivf_agency_Town"><div class="ew-table-header-caption"><?php echo $ivf_agency->Town->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Town" class="<?php echo $ivf_agency->Town->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_agency->SortUrl($ivf_agency->Town) ?>',1);"><div id="elh_ivf_agency_Town" class="ivf_agency_Town">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_agency->Town->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_agency->Town->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_agency->Town->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_agency->State->Visible) { // State ?>
	<?php if ($ivf_agency->sortUrl($ivf_agency->State) == "") { ?>
		<th data-name="State" class="<?php echo $ivf_agency->State->headerCellClass() ?>"><div id="elh_ivf_agency_State" class="ivf_agency_State"><div class="ew-table-header-caption"><?php echo $ivf_agency->State->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="State" class="<?php echo $ivf_agency->State->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_agency->SortUrl($ivf_agency->State) ?>',1);"><div id="elh_ivf_agency_State" class="ivf_agency_State">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_agency->State->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_agency->State->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_agency->State->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_agency->Pin->Visible) { // Pin ?>
	<?php if ($ivf_agency->sortUrl($ivf_agency->Pin) == "") { ?>
		<th data-name="Pin" class="<?php echo $ivf_agency->Pin->headerCellClass() ?>"><div id="elh_ivf_agency_Pin" class="ivf_agency_Pin"><div class="ew-table-header-caption"><?php echo $ivf_agency->Pin->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pin" class="<?php echo $ivf_agency->Pin->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_agency->SortUrl($ivf_agency->Pin) ?>',1);"><div id="elh_ivf_agency_Pin" class="ivf_agency_Pin">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_agency->Pin->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_agency->Pin->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_agency->Pin->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$ivf_agency_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($ivf_agency->ExportAll && $ivf_agency->isExport()) {
	$ivf_agency_list->StopRec = $ivf_agency_list->TotalRecs;
} else {

	// Set the last record to display
	if ($ivf_agency_list->TotalRecs > $ivf_agency_list->StartRec + $ivf_agency_list->DisplayRecs - 1)
		$ivf_agency_list->StopRec = $ivf_agency_list->StartRec + $ivf_agency_list->DisplayRecs - 1;
	else
		$ivf_agency_list->StopRec = $ivf_agency_list->TotalRecs;
}
$ivf_agency_list->RecCnt = $ivf_agency_list->StartRec - 1;
if ($ivf_agency_list->Recordset && !$ivf_agency_list->Recordset->EOF) {
	$ivf_agency_list->Recordset->moveFirst();
	$selectLimit = $ivf_agency_list->UseSelectLimit;
	if (!$selectLimit && $ivf_agency_list->StartRec > 1)
		$ivf_agency_list->Recordset->move($ivf_agency_list->StartRec - 1);
} elseif (!$ivf_agency->AllowAddDeleteRow && $ivf_agency_list->StopRec == 0) {
	$ivf_agency_list->StopRec = $ivf_agency->GridAddRowCount;
}

// Initialize aggregate
$ivf_agency->RowType = ROWTYPE_AGGREGATEINIT;
$ivf_agency->resetAttributes();
$ivf_agency_list->renderRow();
while ($ivf_agency_list->RecCnt < $ivf_agency_list->StopRec) {
	$ivf_agency_list->RecCnt++;
	if ($ivf_agency_list->RecCnt >= $ivf_agency_list->StartRec) {
		$ivf_agency_list->RowCnt++;

		// Set up key count
		$ivf_agency_list->KeyCount = $ivf_agency_list->RowIndex;

		// Init row class and style
		$ivf_agency->resetAttributes();
		$ivf_agency->CssClass = "";
		if ($ivf_agency->isGridAdd()) {
		} else {
			$ivf_agency_list->loadRowValues($ivf_agency_list->Recordset); // Load row values
		}
		$ivf_agency->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$ivf_agency->RowAttrs = array_merge($ivf_agency->RowAttrs, array('data-rowindex'=>$ivf_agency_list->RowCnt, 'id'=>'r' . $ivf_agency_list->RowCnt . '_ivf_agency', 'data-rowtype'=>$ivf_agency->RowType));

		// Render row
		$ivf_agency_list->renderRow();

		// Render list options
		$ivf_agency_list->renderListOptions();
?>
	<tr<?php echo $ivf_agency->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_agency_list->ListOptions->render("body", "left", $ivf_agency_list->RowCnt);
?>
	<?php if ($ivf_agency->id->Visible) { // id ?>
		<td data-name="id"<?php echo $ivf_agency->id->cellAttributes() ?>>
<span id="el<?php echo $ivf_agency_list->RowCnt ?>_ivf_agency_id" class="ivf_agency_id">
<span<?php echo $ivf_agency->id->viewAttributes() ?>>
<?php echo $ivf_agency->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_agency->Name->Visible) { // Name ?>
		<td data-name="Name"<?php echo $ivf_agency->Name->cellAttributes() ?>>
<span id="el<?php echo $ivf_agency_list->RowCnt ?>_ivf_agency_Name" class="ivf_agency_Name">
<span<?php echo $ivf_agency->Name->viewAttributes() ?>>
<?php echo $ivf_agency->Name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_agency->Street->Visible) { // Street ?>
		<td data-name="Street"<?php echo $ivf_agency->Street->cellAttributes() ?>>
<span id="el<?php echo $ivf_agency_list->RowCnt ?>_ivf_agency_Street" class="ivf_agency_Street">
<span<?php echo $ivf_agency->Street->viewAttributes() ?>>
<?php echo $ivf_agency->Street->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_agency->Town->Visible) { // Town ?>
		<td data-name="Town"<?php echo $ivf_agency->Town->cellAttributes() ?>>
<span id="el<?php echo $ivf_agency_list->RowCnt ?>_ivf_agency_Town" class="ivf_agency_Town">
<span<?php echo $ivf_agency->Town->viewAttributes() ?>>
<?php echo $ivf_agency->Town->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_agency->State->Visible) { // State ?>
		<td data-name="State"<?php echo $ivf_agency->State->cellAttributes() ?>>
<span id="el<?php echo $ivf_agency_list->RowCnt ?>_ivf_agency_State" class="ivf_agency_State">
<span<?php echo $ivf_agency->State->viewAttributes() ?>>
<?php echo $ivf_agency->State->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_agency->Pin->Visible) { // Pin ?>
		<td data-name="Pin"<?php echo $ivf_agency->Pin->cellAttributes() ?>>
<span id="el<?php echo $ivf_agency_list->RowCnt ?>_ivf_agency_Pin" class="ivf_agency_Pin">
<span<?php echo $ivf_agency->Pin->viewAttributes() ?>>
<?php echo $ivf_agency->Pin->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_agency_list->ListOptions->render("body", "right", $ivf_agency_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$ivf_agency->isGridAdd())
		$ivf_agency_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$ivf_agency->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($ivf_agency_list->Recordset)
	$ivf_agency_list->Recordset->Close();
?>
<?php if (!$ivf_agency->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$ivf_agency->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($ivf_agency_list->Pager)) $ivf_agency_list->Pager = new NumericPager($ivf_agency_list->StartRec, $ivf_agency_list->DisplayRecs, $ivf_agency_list->TotalRecs, $ivf_agency_list->RecRange, $ivf_agency_list->AutoHidePager) ?>
<?php if ($ivf_agency_list->Pager->RecordCount > 0 && $ivf_agency_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($ivf_agency_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_agency_list->pageUrl() ?>start=<?php echo $ivf_agency_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($ivf_agency_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_agency_list->pageUrl() ?>start=<?php echo $ivf_agency_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($ivf_agency_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $ivf_agency_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($ivf_agency_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_agency_list->pageUrl() ?>start=<?php echo $ivf_agency_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($ivf_agency_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_agency_list->pageUrl() ?>start=<?php echo $ivf_agency_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($ivf_agency_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $ivf_agency_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $ivf_agency_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $ivf_agency_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($ivf_agency_list->TotalRecs > 0 && (!$ivf_agency_list->AutoHidePageSizeSelector || $ivf_agency_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="ivf_agency">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($ivf_agency_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($ivf_agency_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($ivf_agency_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($ivf_agency_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($ivf_agency_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($ivf_agency_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($ivf_agency->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ivf_agency_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($ivf_agency_list->TotalRecs == 0 && !$ivf_agency->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $ivf_agency_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$ivf_agency_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$ivf_agency->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$ivf_agency->isExport()) { ?>
<script>
ew.scrollableTable("gmp_ivf_agency", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$ivf_agency_list->terminate();
?>