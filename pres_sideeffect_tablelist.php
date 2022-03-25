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
$pres_sideeffect_table_list = new pres_sideeffect_table_list();

// Run the page
$pres_sideeffect_table_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_sideeffect_table_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$pres_sideeffect_table->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fpres_sideeffect_tablelist = currentForm = new ew.Form("fpres_sideeffect_tablelist", "list");
fpres_sideeffect_tablelist.formKeyCountName = '<?php echo $pres_sideeffect_table_list->FormKeyCountName ?>';

// Form_CustomValidate event
fpres_sideeffect_tablelist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpres_sideeffect_tablelist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fpres_sideeffect_tablelistsrch = currentSearchForm = new ew.Form("fpres_sideeffect_tablelistsrch");

// Filters
fpres_sideeffect_tablelistsrch.filterList = <?php echo $pres_sideeffect_table_list->getFilterList() ?>;
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
<?php if (!$pres_sideeffect_table->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($pres_sideeffect_table_list->TotalRecs > 0 && $pres_sideeffect_table_list->ExportOptions->visible()) { ?>
<?php $pres_sideeffect_table_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($pres_sideeffect_table_list->ImportOptions->visible()) { ?>
<?php $pres_sideeffect_table_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($pres_sideeffect_table_list->SearchOptions->visible()) { ?>
<?php $pres_sideeffect_table_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($pres_sideeffect_table_list->FilterOptions->visible()) { ?>
<?php $pres_sideeffect_table_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$pres_sideeffect_table_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$pres_sideeffect_table->isExport() && !$pres_sideeffect_table->CurrentAction) { ?>
<form name="fpres_sideeffect_tablelistsrch" id="fpres_sideeffect_tablelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($pres_sideeffect_table_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fpres_sideeffect_tablelistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pres_sideeffect_table">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($pres_sideeffect_table_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($pres_sideeffect_table_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $pres_sideeffect_table_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($pres_sideeffect_table_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($pres_sideeffect_table_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($pres_sideeffect_table_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($pres_sideeffect_table_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $pres_sideeffect_table_list->showPageHeader(); ?>
<?php
$pres_sideeffect_table_list->showMessage();
?>
<?php if ($pres_sideeffect_table_list->TotalRecs > 0 || $pres_sideeffect_table->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pres_sideeffect_table_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pres_sideeffect_table">
<?php if (!$pres_sideeffect_table->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$pres_sideeffect_table->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($pres_sideeffect_table_list->Pager)) $pres_sideeffect_table_list->Pager = new NumericPager($pres_sideeffect_table_list->StartRec, $pres_sideeffect_table_list->DisplayRecs, $pres_sideeffect_table_list->TotalRecs, $pres_sideeffect_table_list->RecRange, $pres_sideeffect_table_list->AutoHidePager) ?>
<?php if ($pres_sideeffect_table_list->Pager->RecordCount > 0 && $pres_sideeffect_table_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($pres_sideeffect_table_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_sideeffect_table_list->pageUrl() ?>start=<?php echo $pres_sideeffect_table_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($pres_sideeffect_table_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_sideeffect_table_list->pageUrl() ?>start=<?php echo $pres_sideeffect_table_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($pres_sideeffect_table_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $pres_sideeffect_table_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($pres_sideeffect_table_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_sideeffect_table_list->pageUrl() ?>start=<?php echo $pres_sideeffect_table_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($pres_sideeffect_table_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_sideeffect_table_list->pageUrl() ?>start=<?php echo $pres_sideeffect_table_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($pres_sideeffect_table_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $pres_sideeffect_table_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $pres_sideeffect_table_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $pres_sideeffect_table_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($pres_sideeffect_table_list->TotalRecs > 0 && (!$pres_sideeffect_table_list->AutoHidePageSizeSelector || $pres_sideeffect_table_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="pres_sideeffect_table">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($pres_sideeffect_table_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($pres_sideeffect_table_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($pres_sideeffect_table_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($pres_sideeffect_table_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($pres_sideeffect_table_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($pres_sideeffect_table_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($pres_sideeffect_table->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pres_sideeffect_table_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpres_sideeffect_tablelist" id="fpres_sideeffect_tablelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pres_sideeffect_table_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pres_sideeffect_table_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_sideeffect_table">
<div id="gmp_pres_sideeffect_table" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($pres_sideeffect_table_list->TotalRecs > 0 || $pres_sideeffect_table->isGridEdit()) { ?>
<table id="tbl_pres_sideeffect_tablelist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pres_sideeffect_table_list->RowType = ROWTYPE_HEADER;

// Render list options
$pres_sideeffect_table_list->renderListOptions();

// Render list options (header, left)
$pres_sideeffect_table_list->ListOptions->render("header", "left");
?>
<?php if ($pres_sideeffect_table->id->Visible) { // id ?>
	<?php if ($pres_sideeffect_table->sortUrl($pres_sideeffect_table->id) == "") { ?>
		<th data-name="id" class="<?php echo $pres_sideeffect_table->id->headerCellClass() ?>"><div id="elh_pres_sideeffect_table_id" class="pres_sideeffect_table_id"><div class="ew-table-header-caption"><?php echo $pres_sideeffect_table->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $pres_sideeffect_table->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_sideeffect_table->SortUrl($pres_sideeffect_table->id) ?>',1);"><div id="elh_pres_sideeffect_table_id" class="pres_sideeffect_table_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_sideeffect_table->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_sideeffect_table->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_sideeffect_table->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_sideeffect_table->Genericname->Visible) { // Genericname ?>
	<?php if ($pres_sideeffect_table->sortUrl($pres_sideeffect_table->Genericname) == "") { ?>
		<th data-name="Genericname" class="<?php echo $pres_sideeffect_table->Genericname->headerCellClass() ?>"><div id="elh_pres_sideeffect_table_Genericname" class="pres_sideeffect_table_Genericname"><div class="ew-table-header-caption"><?php echo $pres_sideeffect_table->Genericname->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Genericname" class="<?php echo $pres_sideeffect_table->Genericname->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_sideeffect_table->SortUrl($pres_sideeffect_table->Genericname) ?>',1);"><div id="elh_pres_sideeffect_table_Genericname" class="pres_sideeffect_table_Genericname">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_sideeffect_table->Genericname->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_sideeffect_table->Genericname->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_sideeffect_table->Genericname->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_sideeffect_table->SideEffects->Visible) { // SideEffects ?>
	<?php if ($pres_sideeffect_table->sortUrl($pres_sideeffect_table->SideEffects) == "") { ?>
		<th data-name="SideEffects" class="<?php echo $pres_sideeffect_table->SideEffects->headerCellClass() ?>"><div id="elh_pres_sideeffect_table_SideEffects" class="pres_sideeffect_table_SideEffects"><div class="ew-table-header-caption"><?php echo $pres_sideeffect_table->SideEffects->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SideEffects" class="<?php echo $pres_sideeffect_table->SideEffects->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_sideeffect_table->SortUrl($pres_sideeffect_table->SideEffects) ?>',1);"><div id="elh_pres_sideeffect_table_SideEffects" class="pres_sideeffect_table_SideEffects">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_sideeffect_table->SideEffects->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_sideeffect_table->SideEffects->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_sideeffect_table->SideEffects->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_sideeffect_table->Contraindications->Visible) { // Contraindications ?>
	<?php if ($pres_sideeffect_table->sortUrl($pres_sideeffect_table->Contraindications) == "") { ?>
		<th data-name="Contraindications" class="<?php echo $pres_sideeffect_table->Contraindications->headerCellClass() ?>"><div id="elh_pres_sideeffect_table_Contraindications" class="pres_sideeffect_table_Contraindications"><div class="ew-table-header-caption"><?php echo $pres_sideeffect_table->Contraindications->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Contraindications" class="<?php echo $pres_sideeffect_table->Contraindications->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pres_sideeffect_table->SortUrl($pres_sideeffect_table->Contraindications) ?>',1);"><div id="elh_pres_sideeffect_table_Contraindications" class="pres_sideeffect_table_Contraindications">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_sideeffect_table->Contraindications->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_sideeffect_table->Contraindications->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pres_sideeffect_table->Contraindications->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pres_sideeffect_table_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($pres_sideeffect_table->ExportAll && $pres_sideeffect_table->isExport()) {
	$pres_sideeffect_table_list->StopRec = $pres_sideeffect_table_list->TotalRecs;
} else {

	// Set the last record to display
	if ($pres_sideeffect_table_list->TotalRecs > $pres_sideeffect_table_list->StartRec + $pres_sideeffect_table_list->DisplayRecs - 1)
		$pres_sideeffect_table_list->StopRec = $pres_sideeffect_table_list->StartRec + $pres_sideeffect_table_list->DisplayRecs - 1;
	else
		$pres_sideeffect_table_list->StopRec = $pres_sideeffect_table_list->TotalRecs;
}
$pres_sideeffect_table_list->RecCnt = $pres_sideeffect_table_list->StartRec - 1;
if ($pres_sideeffect_table_list->Recordset && !$pres_sideeffect_table_list->Recordset->EOF) {
	$pres_sideeffect_table_list->Recordset->moveFirst();
	$selectLimit = $pres_sideeffect_table_list->UseSelectLimit;
	if (!$selectLimit && $pres_sideeffect_table_list->StartRec > 1)
		$pres_sideeffect_table_list->Recordset->move($pres_sideeffect_table_list->StartRec - 1);
} elseif (!$pres_sideeffect_table->AllowAddDeleteRow && $pres_sideeffect_table_list->StopRec == 0) {
	$pres_sideeffect_table_list->StopRec = $pres_sideeffect_table->GridAddRowCount;
}

// Initialize aggregate
$pres_sideeffect_table->RowType = ROWTYPE_AGGREGATEINIT;
$pres_sideeffect_table->resetAttributes();
$pres_sideeffect_table_list->renderRow();
while ($pres_sideeffect_table_list->RecCnt < $pres_sideeffect_table_list->StopRec) {
	$pres_sideeffect_table_list->RecCnt++;
	if ($pres_sideeffect_table_list->RecCnt >= $pres_sideeffect_table_list->StartRec) {
		$pres_sideeffect_table_list->RowCnt++;

		// Set up key count
		$pres_sideeffect_table_list->KeyCount = $pres_sideeffect_table_list->RowIndex;

		// Init row class and style
		$pres_sideeffect_table->resetAttributes();
		$pres_sideeffect_table->CssClass = "";
		if ($pres_sideeffect_table->isGridAdd()) {
		} else {
			$pres_sideeffect_table_list->loadRowValues($pres_sideeffect_table_list->Recordset); // Load row values
		}
		$pres_sideeffect_table->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$pres_sideeffect_table->RowAttrs = array_merge($pres_sideeffect_table->RowAttrs, array('data-rowindex'=>$pres_sideeffect_table_list->RowCnt, 'id'=>'r' . $pres_sideeffect_table_list->RowCnt . '_pres_sideeffect_table', 'data-rowtype'=>$pres_sideeffect_table->RowType));

		// Render row
		$pres_sideeffect_table_list->renderRow();

		// Render list options
		$pres_sideeffect_table_list->renderListOptions();
?>
	<tr<?php echo $pres_sideeffect_table->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pres_sideeffect_table_list->ListOptions->render("body", "left", $pres_sideeffect_table_list->RowCnt);
?>
	<?php if ($pres_sideeffect_table->id->Visible) { // id ?>
		<td data-name="id"<?php echo $pres_sideeffect_table->id->cellAttributes() ?>>
<span id="el<?php echo $pres_sideeffect_table_list->RowCnt ?>_pres_sideeffect_table_id" class="pres_sideeffect_table_id">
<span<?php echo $pres_sideeffect_table->id->viewAttributes() ?>>
<?php echo $pres_sideeffect_table->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_sideeffect_table->Genericname->Visible) { // Genericname ?>
		<td data-name="Genericname"<?php echo $pres_sideeffect_table->Genericname->cellAttributes() ?>>
<span id="el<?php echo $pres_sideeffect_table_list->RowCnt ?>_pres_sideeffect_table_Genericname" class="pres_sideeffect_table_Genericname">
<span<?php echo $pres_sideeffect_table->Genericname->viewAttributes() ?>>
<?php echo $pres_sideeffect_table->Genericname->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_sideeffect_table->SideEffects->Visible) { // SideEffects ?>
		<td data-name="SideEffects"<?php echo $pres_sideeffect_table->SideEffects->cellAttributes() ?>>
<span id="el<?php echo $pres_sideeffect_table_list->RowCnt ?>_pres_sideeffect_table_SideEffects" class="pres_sideeffect_table_SideEffects">
<span<?php echo $pres_sideeffect_table->SideEffects->viewAttributes() ?>>
<?php echo $pres_sideeffect_table->SideEffects->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_sideeffect_table->Contraindications->Visible) { // Contraindications ?>
		<td data-name="Contraindications"<?php echo $pres_sideeffect_table->Contraindications->cellAttributes() ?>>
<span id="el<?php echo $pres_sideeffect_table_list->RowCnt ?>_pres_sideeffect_table_Contraindications" class="pres_sideeffect_table_Contraindications">
<span<?php echo $pres_sideeffect_table->Contraindications->viewAttributes() ?>>
<?php echo $pres_sideeffect_table->Contraindications->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pres_sideeffect_table_list->ListOptions->render("body", "right", $pres_sideeffect_table_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$pres_sideeffect_table->isGridAdd())
		$pres_sideeffect_table_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$pres_sideeffect_table->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pres_sideeffect_table_list->Recordset)
	$pres_sideeffect_table_list->Recordset->Close();
?>
<?php if (!$pres_sideeffect_table->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$pres_sideeffect_table->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($pres_sideeffect_table_list->Pager)) $pres_sideeffect_table_list->Pager = new NumericPager($pres_sideeffect_table_list->StartRec, $pres_sideeffect_table_list->DisplayRecs, $pres_sideeffect_table_list->TotalRecs, $pres_sideeffect_table_list->RecRange, $pres_sideeffect_table_list->AutoHidePager) ?>
<?php if ($pres_sideeffect_table_list->Pager->RecordCount > 0 && $pres_sideeffect_table_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($pres_sideeffect_table_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_sideeffect_table_list->pageUrl() ?>start=<?php echo $pres_sideeffect_table_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($pres_sideeffect_table_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_sideeffect_table_list->pageUrl() ?>start=<?php echo $pres_sideeffect_table_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($pres_sideeffect_table_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $pres_sideeffect_table_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($pres_sideeffect_table_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_sideeffect_table_list->pageUrl() ?>start=<?php echo $pres_sideeffect_table_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($pres_sideeffect_table_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pres_sideeffect_table_list->pageUrl() ?>start=<?php echo $pres_sideeffect_table_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($pres_sideeffect_table_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $pres_sideeffect_table_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $pres_sideeffect_table_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $pres_sideeffect_table_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($pres_sideeffect_table_list->TotalRecs > 0 && (!$pres_sideeffect_table_list->AutoHidePageSizeSelector || $pres_sideeffect_table_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="pres_sideeffect_table">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($pres_sideeffect_table_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($pres_sideeffect_table_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($pres_sideeffect_table_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($pres_sideeffect_table_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($pres_sideeffect_table_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($pres_sideeffect_table_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($pres_sideeffect_table->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pres_sideeffect_table_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pres_sideeffect_table_list->TotalRecs == 0 && !$pres_sideeffect_table->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pres_sideeffect_table_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$pres_sideeffect_table_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$pres_sideeffect_table->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$pres_sideeffect_table->isExport()) { ?>
<script>
ew.scrollableTable("gmp_pres_sideeffect_table", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$pres_sideeffect_table_list->terminate();
?>