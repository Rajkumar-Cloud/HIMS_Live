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
$hr_expensespaymentmethods_list = new hr_expensespaymentmethods_list();

// Run the page
$hr_expensespaymentmethods_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_expensespaymentmethods_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$hr_expensespaymentmethods->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fhr_expensespaymentmethodslist = currentForm = new ew.Form("fhr_expensespaymentmethodslist", "list");
fhr_expensespaymentmethodslist.formKeyCountName = '<?php echo $hr_expensespaymentmethods_list->FormKeyCountName ?>';

// Form_CustomValidate event
fhr_expensespaymentmethodslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_expensespaymentmethodslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fhr_expensespaymentmethodslistsrch = currentSearchForm = new ew.Form("fhr_expensespaymentmethodslistsrch");

// Filters
fhr_expensespaymentmethodslistsrch.filterList = <?php echo $hr_expensespaymentmethods_list->getFilterList() ?>;
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
<?php if (!$hr_expensespaymentmethods->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($hr_expensespaymentmethods_list->TotalRecs > 0 && $hr_expensespaymentmethods_list->ExportOptions->visible()) { ?>
<?php $hr_expensespaymentmethods_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($hr_expensespaymentmethods_list->ImportOptions->visible()) { ?>
<?php $hr_expensespaymentmethods_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($hr_expensespaymentmethods_list->SearchOptions->visible()) { ?>
<?php $hr_expensespaymentmethods_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($hr_expensespaymentmethods_list->FilterOptions->visible()) { ?>
<?php $hr_expensespaymentmethods_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$hr_expensespaymentmethods_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$hr_expensespaymentmethods->isExport() && !$hr_expensespaymentmethods->CurrentAction) { ?>
<form name="fhr_expensespaymentmethodslistsrch" id="fhr_expensespaymentmethodslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($hr_expensespaymentmethods_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fhr_expensespaymentmethodslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="hr_expensespaymentmethods">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($hr_expensespaymentmethods_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($hr_expensespaymentmethods_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $hr_expensespaymentmethods_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($hr_expensespaymentmethods_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($hr_expensespaymentmethods_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($hr_expensespaymentmethods_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($hr_expensespaymentmethods_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $hr_expensespaymentmethods_list->showPageHeader(); ?>
<?php
$hr_expensespaymentmethods_list->showMessage();
?>
<?php if ($hr_expensespaymentmethods_list->TotalRecs > 0 || $hr_expensespaymentmethods->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($hr_expensespaymentmethods_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> hr_expensespaymentmethods">
<?php if (!$hr_expensespaymentmethods->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$hr_expensespaymentmethods->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($hr_expensespaymentmethods_list->Pager)) $hr_expensespaymentmethods_list->Pager = new NumericPager($hr_expensespaymentmethods_list->StartRec, $hr_expensespaymentmethods_list->DisplayRecs, $hr_expensespaymentmethods_list->TotalRecs, $hr_expensespaymentmethods_list->RecRange, $hr_expensespaymentmethods_list->AutoHidePager) ?>
<?php if ($hr_expensespaymentmethods_list->Pager->RecordCount > 0 && $hr_expensespaymentmethods_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($hr_expensespaymentmethods_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_expensespaymentmethods_list->pageUrl() ?>start=<?php echo $hr_expensespaymentmethods_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($hr_expensespaymentmethods_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_expensespaymentmethods_list->pageUrl() ?>start=<?php echo $hr_expensespaymentmethods_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($hr_expensespaymentmethods_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $hr_expensespaymentmethods_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($hr_expensespaymentmethods_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_expensespaymentmethods_list->pageUrl() ?>start=<?php echo $hr_expensespaymentmethods_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($hr_expensespaymentmethods_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_expensespaymentmethods_list->pageUrl() ?>start=<?php echo $hr_expensespaymentmethods_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($hr_expensespaymentmethods_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $hr_expensespaymentmethods_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $hr_expensespaymentmethods_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $hr_expensespaymentmethods_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($hr_expensespaymentmethods_list->TotalRecs > 0 && (!$hr_expensespaymentmethods_list->AutoHidePageSizeSelector || $hr_expensespaymentmethods_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="hr_expensespaymentmethods">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($hr_expensespaymentmethods_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($hr_expensespaymentmethods_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($hr_expensespaymentmethods_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($hr_expensespaymentmethods_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($hr_expensespaymentmethods_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($hr_expensespaymentmethods_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($hr_expensespaymentmethods->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $hr_expensespaymentmethods_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fhr_expensespaymentmethodslist" id="fhr_expensespaymentmethodslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_expensespaymentmethods_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_expensespaymentmethods_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_expensespaymentmethods">
<div id="gmp_hr_expensespaymentmethods" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($hr_expensespaymentmethods_list->TotalRecs > 0 || $hr_expensespaymentmethods->isGridEdit()) { ?>
<table id="tbl_hr_expensespaymentmethodslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$hr_expensespaymentmethods_list->RowType = ROWTYPE_HEADER;

// Render list options
$hr_expensespaymentmethods_list->renderListOptions();

// Render list options (header, left)
$hr_expensespaymentmethods_list->ListOptions->render("header", "left");
?>
<?php if ($hr_expensespaymentmethods->id->Visible) { // id ?>
	<?php if ($hr_expensespaymentmethods->sortUrl($hr_expensespaymentmethods->id) == "") { ?>
		<th data-name="id" class="<?php echo $hr_expensespaymentmethods->id->headerCellClass() ?>"><div id="elh_hr_expensespaymentmethods_id" class="hr_expensespaymentmethods_id"><div class="ew-table-header-caption"><?php echo $hr_expensespaymentmethods->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $hr_expensespaymentmethods->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_expensespaymentmethods->SortUrl($hr_expensespaymentmethods->id) ?>',1);"><div id="elh_hr_expensespaymentmethods_id" class="hr_expensespaymentmethods_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_expensespaymentmethods->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_expensespaymentmethods->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_expensespaymentmethods->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_expensespaymentmethods->name->Visible) { // name ?>
	<?php if ($hr_expensespaymentmethods->sortUrl($hr_expensespaymentmethods->name) == "") { ?>
		<th data-name="name" class="<?php echo $hr_expensespaymentmethods->name->headerCellClass() ?>"><div id="elh_hr_expensespaymentmethods_name" class="hr_expensespaymentmethods_name"><div class="ew-table-header-caption"><?php echo $hr_expensespaymentmethods->name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="name" class="<?php echo $hr_expensespaymentmethods->name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_expensespaymentmethods->SortUrl($hr_expensespaymentmethods->name) ?>',1);"><div id="elh_hr_expensespaymentmethods_name" class="hr_expensespaymentmethods_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_expensespaymentmethods->name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hr_expensespaymentmethods->name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_expensespaymentmethods->name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_expensespaymentmethods->created->Visible) { // created ?>
	<?php if ($hr_expensespaymentmethods->sortUrl($hr_expensespaymentmethods->created) == "") { ?>
		<th data-name="created" class="<?php echo $hr_expensespaymentmethods->created->headerCellClass() ?>"><div id="elh_hr_expensespaymentmethods_created" class="hr_expensespaymentmethods_created"><div class="ew-table-header-caption"><?php echo $hr_expensespaymentmethods->created->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="created" class="<?php echo $hr_expensespaymentmethods->created->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_expensespaymentmethods->SortUrl($hr_expensespaymentmethods->created) ?>',1);"><div id="elh_hr_expensespaymentmethods_created" class="hr_expensespaymentmethods_created">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_expensespaymentmethods->created->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_expensespaymentmethods->created->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_expensespaymentmethods->created->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_expensespaymentmethods->updated->Visible) { // updated ?>
	<?php if ($hr_expensespaymentmethods->sortUrl($hr_expensespaymentmethods->updated) == "") { ?>
		<th data-name="updated" class="<?php echo $hr_expensespaymentmethods->updated->headerCellClass() ?>"><div id="elh_hr_expensespaymentmethods_updated" class="hr_expensespaymentmethods_updated"><div class="ew-table-header-caption"><?php echo $hr_expensespaymentmethods->updated->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="updated" class="<?php echo $hr_expensespaymentmethods->updated->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_expensespaymentmethods->SortUrl($hr_expensespaymentmethods->updated) ?>',1);"><div id="elh_hr_expensespaymentmethods_updated" class="hr_expensespaymentmethods_updated">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_expensespaymentmethods->updated->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_expensespaymentmethods->updated->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_expensespaymentmethods->updated->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_expensespaymentmethods->HospID->Visible) { // HospID ?>
	<?php if ($hr_expensespaymentmethods->sortUrl($hr_expensespaymentmethods->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $hr_expensespaymentmethods->HospID->headerCellClass() ?>"><div id="elh_hr_expensespaymentmethods_HospID" class="hr_expensespaymentmethods_HospID"><div class="ew-table-header-caption"><?php echo $hr_expensespaymentmethods->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $hr_expensespaymentmethods->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_expensespaymentmethods->SortUrl($hr_expensespaymentmethods->HospID) ?>',1);"><div id="elh_hr_expensespaymentmethods_HospID" class="hr_expensespaymentmethods_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_expensespaymentmethods->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_expensespaymentmethods->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_expensespaymentmethods->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$hr_expensespaymentmethods_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($hr_expensespaymentmethods->ExportAll && $hr_expensespaymentmethods->isExport()) {
	$hr_expensespaymentmethods_list->StopRec = $hr_expensespaymentmethods_list->TotalRecs;
} else {

	// Set the last record to display
	if ($hr_expensespaymentmethods_list->TotalRecs > $hr_expensespaymentmethods_list->StartRec + $hr_expensespaymentmethods_list->DisplayRecs - 1)
		$hr_expensespaymentmethods_list->StopRec = $hr_expensespaymentmethods_list->StartRec + $hr_expensespaymentmethods_list->DisplayRecs - 1;
	else
		$hr_expensespaymentmethods_list->StopRec = $hr_expensespaymentmethods_list->TotalRecs;
}
$hr_expensespaymentmethods_list->RecCnt = $hr_expensespaymentmethods_list->StartRec - 1;
if ($hr_expensespaymentmethods_list->Recordset && !$hr_expensespaymentmethods_list->Recordset->EOF) {
	$hr_expensespaymentmethods_list->Recordset->moveFirst();
	$selectLimit = $hr_expensespaymentmethods_list->UseSelectLimit;
	if (!$selectLimit && $hr_expensespaymentmethods_list->StartRec > 1)
		$hr_expensespaymentmethods_list->Recordset->move($hr_expensespaymentmethods_list->StartRec - 1);
} elseif (!$hr_expensespaymentmethods->AllowAddDeleteRow && $hr_expensespaymentmethods_list->StopRec == 0) {
	$hr_expensespaymentmethods_list->StopRec = $hr_expensespaymentmethods->GridAddRowCount;
}

// Initialize aggregate
$hr_expensespaymentmethods->RowType = ROWTYPE_AGGREGATEINIT;
$hr_expensespaymentmethods->resetAttributes();
$hr_expensespaymentmethods_list->renderRow();
while ($hr_expensespaymentmethods_list->RecCnt < $hr_expensespaymentmethods_list->StopRec) {
	$hr_expensespaymentmethods_list->RecCnt++;
	if ($hr_expensespaymentmethods_list->RecCnt >= $hr_expensespaymentmethods_list->StartRec) {
		$hr_expensespaymentmethods_list->RowCnt++;

		// Set up key count
		$hr_expensespaymentmethods_list->KeyCount = $hr_expensespaymentmethods_list->RowIndex;

		// Init row class and style
		$hr_expensespaymentmethods->resetAttributes();
		$hr_expensespaymentmethods->CssClass = "";
		if ($hr_expensespaymentmethods->isGridAdd()) {
		} else {
			$hr_expensespaymentmethods_list->loadRowValues($hr_expensespaymentmethods_list->Recordset); // Load row values
		}
		$hr_expensespaymentmethods->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$hr_expensespaymentmethods->RowAttrs = array_merge($hr_expensespaymentmethods->RowAttrs, array('data-rowindex'=>$hr_expensespaymentmethods_list->RowCnt, 'id'=>'r' . $hr_expensespaymentmethods_list->RowCnt . '_hr_expensespaymentmethods', 'data-rowtype'=>$hr_expensespaymentmethods->RowType));

		// Render row
		$hr_expensespaymentmethods_list->renderRow();

		// Render list options
		$hr_expensespaymentmethods_list->renderListOptions();
?>
	<tr<?php echo $hr_expensespaymentmethods->rowAttributes() ?>>
<?php

// Render list options (body, left)
$hr_expensespaymentmethods_list->ListOptions->render("body", "left", $hr_expensespaymentmethods_list->RowCnt);
?>
	<?php if ($hr_expensespaymentmethods->id->Visible) { // id ?>
		<td data-name="id"<?php echo $hr_expensespaymentmethods->id->cellAttributes() ?>>
<span id="el<?php echo $hr_expensespaymentmethods_list->RowCnt ?>_hr_expensespaymentmethods_id" class="hr_expensespaymentmethods_id">
<span<?php echo $hr_expensespaymentmethods->id->viewAttributes() ?>>
<?php echo $hr_expensespaymentmethods->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_expensespaymentmethods->name->Visible) { // name ?>
		<td data-name="name"<?php echo $hr_expensespaymentmethods->name->cellAttributes() ?>>
<span id="el<?php echo $hr_expensespaymentmethods_list->RowCnt ?>_hr_expensespaymentmethods_name" class="hr_expensespaymentmethods_name">
<span<?php echo $hr_expensespaymentmethods->name->viewAttributes() ?>>
<?php echo $hr_expensespaymentmethods->name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_expensespaymentmethods->created->Visible) { // created ?>
		<td data-name="created"<?php echo $hr_expensespaymentmethods->created->cellAttributes() ?>>
<span id="el<?php echo $hr_expensespaymentmethods_list->RowCnt ?>_hr_expensespaymentmethods_created" class="hr_expensespaymentmethods_created">
<span<?php echo $hr_expensespaymentmethods->created->viewAttributes() ?>>
<?php echo $hr_expensespaymentmethods->created->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_expensespaymentmethods->updated->Visible) { // updated ?>
		<td data-name="updated"<?php echo $hr_expensespaymentmethods->updated->cellAttributes() ?>>
<span id="el<?php echo $hr_expensespaymentmethods_list->RowCnt ?>_hr_expensespaymentmethods_updated" class="hr_expensespaymentmethods_updated">
<span<?php echo $hr_expensespaymentmethods->updated->viewAttributes() ?>>
<?php echo $hr_expensespaymentmethods->updated->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_expensespaymentmethods->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $hr_expensespaymentmethods->HospID->cellAttributes() ?>>
<span id="el<?php echo $hr_expensespaymentmethods_list->RowCnt ?>_hr_expensespaymentmethods_HospID" class="hr_expensespaymentmethods_HospID">
<span<?php echo $hr_expensespaymentmethods->HospID->viewAttributes() ?>>
<?php echo $hr_expensespaymentmethods->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$hr_expensespaymentmethods_list->ListOptions->render("body", "right", $hr_expensespaymentmethods_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$hr_expensespaymentmethods->isGridAdd())
		$hr_expensespaymentmethods_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$hr_expensespaymentmethods->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($hr_expensespaymentmethods_list->Recordset)
	$hr_expensespaymentmethods_list->Recordset->Close();
?>
<?php if (!$hr_expensespaymentmethods->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$hr_expensespaymentmethods->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($hr_expensespaymentmethods_list->Pager)) $hr_expensespaymentmethods_list->Pager = new NumericPager($hr_expensespaymentmethods_list->StartRec, $hr_expensespaymentmethods_list->DisplayRecs, $hr_expensespaymentmethods_list->TotalRecs, $hr_expensespaymentmethods_list->RecRange, $hr_expensespaymentmethods_list->AutoHidePager) ?>
<?php if ($hr_expensespaymentmethods_list->Pager->RecordCount > 0 && $hr_expensespaymentmethods_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($hr_expensespaymentmethods_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_expensespaymentmethods_list->pageUrl() ?>start=<?php echo $hr_expensespaymentmethods_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($hr_expensespaymentmethods_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_expensespaymentmethods_list->pageUrl() ?>start=<?php echo $hr_expensespaymentmethods_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($hr_expensespaymentmethods_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $hr_expensespaymentmethods_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($hr_expensespaymentmethods_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_expensespaymentmethods_list->pageUrl() ?>start=<?php echo $hr_expensespaymentmethods_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($hr_expensespaymentmethods_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_expensespaymentmethods_list->pageUrl() ?>start=<?php echo $hr_expensespaymentmethods_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($hr_expensespaymentmethods_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $hr_expensespaymentmethods_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $hr_expensespaymentmethods_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $hr_expensespaymentmethods_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($hr_expensespaymentmethods_list->TotalRecs > 0 && (!$hr_expensespaymentmethods_list->AutoHidePageSizeSelector || $hr_expensespaymentmethods_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="hr_expensespaymentmethods">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($hr_expensespaymentmethods_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($hr_expensespaymentmethods_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($hr_expensespaymentmethods_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($hr_expensespaymentmethods_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($hr_expensespaymentmethods_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($hr_expensespaymentmethods_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($hr_expensespaymentmethods->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $hr_expensespaymentmethods_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($hr_expensespaymentmethods_list->TotalRecs == 0 && !$hr_expensespaymentmethods->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $hr_expensespaymentmethods_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$hr_expensespaymentmethods_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$hr_expensespaymentmethods->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$hr_expensespaymentmethods->isExport()) { ?>
<script>
ew.scrollableTable("gmp_hr_expensespaymentmethods", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$hr_expensespaymentmethods_list->terminate();
?>