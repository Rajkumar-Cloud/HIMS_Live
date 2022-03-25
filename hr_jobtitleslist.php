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
$hr_jobtitles_list = new hr_jobtitles_list();

// Run the page
$hr_jobtitles_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_jobtitles_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$hr_jobtitles->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fhr_jobtitleslist = currentForm = new ew.Form("fhr_jobtitleslist", "list");
fhr_jobtitleslist.formKeyCountName = '<?php echo $hr_jobtitles_list->FormKeyCountName ?>';

// Form_CustomValidate event
fhr_jobtitleslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_jobtitleslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fhr_jobtitleslistsrch = currentSearchForm = new ew.Form("fhr_jobtitleslistsrch");

// Filters
fhr_jobtitleslistsrch.filterList = <?php echo $hr_jobtitles_list->getFilterList() ?>;
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
<?php if (!$hr_jobtitles->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($hr_jobtitles_list->TotalRecs > 0 && $hr_jobtitles_list->ExportOptions->visible()) { ?>
<?php $hr_jobtitles_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($hr_jobtitles_list->ImportOptions->visible()) { ?>
<?php $hr_jobtitles_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($hr_jobtitles_list->SearchOptions->visible()) { ?>
<?php $hr_jobtitles_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($hr_jobtitles_list->FilterOptions->visible()) { ?>
<?php $hr_jobtitles_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$hr_jobtitles_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$hr_jobtitles->isExport() && !$hr_jobtitles->CurrentAction) { ?>
<form name="fhr_jobtitleslistsrch" id="fhr_jobtitleslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($hr_jobtitles_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fhr_jobtitleslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="hr_jobtitles">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($hr_jobtitles_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($hr_jobtitles_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $hr_jobtitles_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($hr_jobtitles_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($hr_jobtitles_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($hr_jobtitles_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($hr_jobtitles_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $hr_jobtitles_list->showPageHeader(); ?>
<?php
$hr_jobtitles_list->showMessage();
?>
<?php if ($hr_jobtitles_list->TotalRecs > 0 || $hr_jobtitles->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($hr_jobtitles_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> hr_jobtitles">
<?php if (!$hr_jobtitles->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$hr_jobtitles->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($hr_jobtitles_list->Pager)) $hr_jobtitles_list->Pager = new NumericPager($hr_jobtitles_list->StartRec, $hr_jobtitles_list->DisplayRecs, $hr_jobtitles_list->TotalRecs, $hr_jobtitles_list->RecRange, $hr_jobtitles_list->AutoHidePager) ?>
<?php if ($hr_jobtitles_list->Pager->RecordCount > 0 && $hr_jobtitles_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($hr_jobtitles_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_jobtitles_list->pageUrl() ?>start=<?php echo $hr_jobtitles_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($hr_jobtitles_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_jobtitles_list->pageUrl() ?>start=<?php echo $hr_jobtitles_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($hr_jobtitles_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $hr_jobtitles_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($hr_jobtitles_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_jobtitles_list->pageUrl() ?>start=<?php echo $hr_jobtitles_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($hr_jobtitles_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_jobtitles_list->pageUrl() ?>start=<?php echo $hr_jobtitles_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($hr_jobtitles_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $hr_jobtitles_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $hr_jobtitles_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $hr_jobtitles_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($hr_jobtitles_list->TotalRecs > 0 && (!$hr_jobtitles_list->AutoHidePageSizeSelector || $hr_jobtitles_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="hr_jobtitles">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($hr_jobtitles_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($hr_jobtitles_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($hr_jobtitles_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($hr_jobtitles_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($hr_jobtitles_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($hr_jobtitles_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($hr_jobtitles->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $hr_jobtitles_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fhr_jobtitleslist" id="fhr_jobtitleslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_jobtitles_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_jobtitles_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_jobtitles">
<div id="gmp_hr_jobtitles" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($hr_jobtitles_list->TotalRecs > 0 || $hr_jobtitles->isGridEdit()) { ?>
<table id="tbl_hr_jobtitleslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$hr_jobtitles_list->RowType = ROWTYPE_HEADER;

// Render list options
$hr_jobtitles_list->renderListOptions();

// Render list options (header, left)
$hr_jobtitles_list->ListOptions->render("header", "left");
?>
<?php if ($hr_jobtitles->id->Visible) { // id ?>
	<?php if ($hr_jobtitles->sortUrl($hr_jobtitles->id) == "") { ?>
		<th data-name="id" class="<?php echo $hr_jobtitles->id->headerCellClass() ?>"><div id="elh_hr_jobtitles_id" class="hr_jobtitles_id"><div class="ew-table-header-caption"><?php echo $hr_jobtitles->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $hr_jobtitles->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_jobtitles->SortUrl($hr_jobtitles->id) ?>',1);"><div id="elh_hr_jobtitles_id" class="hr_jobtitles_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_jobtitles->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_jobtitles->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_jobtitles->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_jobtitles->code->Visible) { // code ?>
	<?php if ($hr_jobtitles->sortUrl($hr_jobtitles->code) == "") { ?>
		<th data-name="code" class="<?php echo $hr_jobtitles->code->headerCellClass() ?>"><div id="elh_hr_jobtitles_code" class="hr_jobtitles_code"><div class="ew-table-header-caption"><?php echo $hr_jobtitles->code->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="code" class="<?php echo $hr_jobtitles->code->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_jobtitles->SortUrl($hr_jobtitles->code) ?>',1);"><div id="elh_hr_jobtitles_code" class="hr_jobtitles_code">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_jobtitles->code->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hr_jobtitles->code->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_jobtitles->code->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_jobtitles->name->Visible) { // name ?>
	<?php if ($hr_jobtitles->sortUrl($hr_jobtitles->name) == "") { ?>
		<th data-name="name" class="<?php echo $hr_jobtitles->name->headerCellClass() ?>"><div id="elh_hr_jobtitles_name" class="hr_jobtitles_name"><div class="ew-table-header-caption"><?php echo $hr_jobtitles->name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="name" class="<?php echo $hr_jobtitles->name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_jobtitles->SortUrl($hr_jobtitles->name) ?>',1);"><div id="elh_hr_jobtitles_name" class="hr_jobtitles_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_jobtitles->name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hr_jobtitles->name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_jobtitles->name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_jobtitles->description->Visible) { // description ?>
	<?php if ($hr_jobtitles->sortUrl($hr_jobtitles->description) == "") { ?>
		<th data-name="description" class="<?php echo $hr_jobtitles->description->headerCellClass() ?>"><div id="elh_hr_jobtitles_description" class="hr_jobtitles_description"><div class="ew-table-header-caption"><?php echo $hr_jobtitles->description->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="description" class="<?php echo $hr_jobtitles->description->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_jobtitles->SortUrl($hr_jobtitles->description) ?>',1);"><div id="elh_hr_jobtitles_description" class="hr_jobtitles_description">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_jobtitles->description->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hr_jobtitles->description->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_jobtitles->description->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_jobtitles->specification->Visible) { // specification ?>
	<?php if ($hr_jobtitles->sortUrl($hr_jobtitles->specification) == "") { ?>
		<th data-name="specification" class="<?php echo $hr_jobtitles->specification->headerCellClass() ?>"><div id="elh_hr_jobtitles_specification" class="hr_jobtitles_specification"><div class="ew-table-header-caption"><?php echo $hr_jobtitles->specification->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="specification" class="<?php echo $hr_jobtitles->specification->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_jobtitles->SortUrl($hr_jobtitles->specification) ?>',1);"><div id="elh_hr_jobtitles_specification" class="hr_jobtitles_specification">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_jobtitles->specification->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hr_jobtitles->specification->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_jobtitles->specification->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hr_jobtitles->HospID->Visible) { // HospID ?>
	<?php if ($hr_jobtitles->sortUrl($hr_jobtitles->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $hr_jobtitles->HospID->headerCellClass() ?>"><div id="elh_hr_jobtitles_HospID" class="hr_jobtitles_HospID"><div class="ew-table-header-caption"><?php echo $hr_jobtitles->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $hr_jobtitles->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hr_jobtitles->SortUrl($hr_jobtitles->HospID) ?>',1);"><div id="elh_hr_jobtitles_HospID" class="hr_jobtitles_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hr_jobtitles->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($hr_jobtitles->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hr_jobtitles->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$hr_jobtitles_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($hr_jobtitles->ExportAll && $hr_jobtitles->isExport()) {
	$hr_jobtitles_list->StopRec = $hr_jobtitles_list->TotalRecs;
} else {

	// Set the last record to display
	if ($hr_jobtitles_list->TotalRecs > $hr_jobtitles_list->StartRec + $hr_jobtitles_list->DisplayRecs - 1)
		$hr_jobtitles_list->StopRec = $hr_jobtitles_list->StartRec + $hr_jobtitles_list->DisplayRecs - 1;
	else
		$hr_jobtitles_list->StopRec = $hr_jobtitles_list->TotalRecs;
}
$hr_jobtitles_list->RecCnt = $hr_jobtitles_list->StartRec - 1;
if ($hr_jobtitles_list->Recordset && !$hr_jobtitles_list->Recordset->EOF) {
	$hr_jobtitles_list->Recordset->moveFirst();
	$selectLimit = $hr_jobtitles_list->UseSelectLimit;
	if (!$selectLimit && $hr_jobtitles_list->StartRec > 1)
		$hr_jobtitles_list->Recordset->move($hr_jobtitles_list->StartRec - 1);
} elseif (!$hr_jobtitles->AllowAddDeleteRow && $hr_jobtitles_list->StopRec == 0) {
	$hr_jobtitles_list->StopRec = $hr_jobtitles->GridAddRowCount;
}

// Initialize aggregate
$hr_jobtitles->RowType = ROWTYPE_AGGREGATEINIT;
$hr_jobtitles->resetAttributes();
$hr_jobtitles_list->renderRow();
while ($hr_jobtitles_list->RecCnt < $hr_jobtitles_list->StopRec) {
	$hr_jobtitles_list->RecCnt++;
	if ($hr_jobtitles_list->RecCnt >= $hr_jobtitles_list->StartRec) {
		$hr_jobtitles_list->RowCnt++;

		// Set up key count
		$hr_jobtitles_list->KeyCount = $hr_jobtitles_list->RowIndex;

		// Init row class and style
		$hr_jobtitles->resetAttributes();
		$hr_jobtitles->CssClass = "";
		if ($hr_jobtitles->isGridAdd()) {
		} else {
			$hr_jobtitles_list->loadRowValues($hr_jobtitles_list->Recordset); // Load row values
		}
		$hr_jobtitles->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$hr_jobtitles->RowAttrs = array_merge($hr_jobtitles->RowAttrs, array('data-rowindex'=>$hr_jobtitles_list->RowCnt, 'id'=>'r' . $hr_jobtitles_list->RowCnt . '_hr_jobtitles', 'data-rowtype'=>$hr_jobtitles->RowType));

		// Render row
		$hr_jobtitles_list->renderRow();

		// Render list options
		$hr_jobtitles_list->renderListOptions();
?>
	<tr<?php echo $hr_jobtitles->rowAttributes() ?>>
<?php

// Render list options (body, left)
$hr_jobtitles_list->ListOptions->render("body", "left", $hr_jobtitles_list->RowCnt);
?>
	<?php if ($hr_jobtitles->id->Visible) { // id ?>
		<td data-name="id"<?php echo $hr_jobtitles->id->cellAttributes() ?>>
<span id="el<?php echo $hr_jobtitles_list->RowCnt ?>_hr_jobtitles_id" class="hr_jobtitles_id">
<span<?php echo $hr_jobtitles->id->viewAttributes() ?>>
<?php echo $hr_jobtitles->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_jobtitles->code->Visible) { // code ?>
		<td data-name="code"<?php echo $hr_jobtitles->code->cellAttributes() ?>>
<span id="el<?php echo $hr_jobtitles_list->RowCnt ?>_hr_jobtitles_code" class="hr_jobtitles_code">
<span<?php echo $hr_jobtitles->code->viewAttributes() ?>>
<?php echo $hr_jobtitles->code->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_jobtitles->name->Visible) { // name ?>
		<td data-name="name"<?php echo $hr_jobtitles->name->cellAttributes() ?>>
<span id="el<?php echo $hr_jobtitles_list->RowCnt ?>_hr_jobtitles_name" class="hr_jobtitles_name">
<span<?php echo $hr_jobtitles->name->viewAttributes() ?>>
<?php echo $hr_jobtitles->name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_jobtitles->description->Visible) { // description ?>
		<td data-name="description"<?php echo $hr_jobtitles->description->cellAttributes() ?>>
<span id="el<?php echo $hr_jobtitles_list->RowCnt ?>_hr_jobtitles_description" class="hr_jobtitles_description">
<span<?php echo $hr_jobtitles->description->viewAttributes() ?>>
<?php echo $hr_jobtitles->description->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_jobtitles->specification->Visible) { // specification ?>
		<td data-name="specification"<?php echo $hr_jobtitles->specification->cellAttributes() ?>>
<span id="el<?php echo $hr_jobtitles_list->RowCnt ?>_hr_jobtitles_specification" class="hr_jobtitles_specification">
<span<?php echo $hr_jobtitles->specification->viewAttributes() ?>>
<?php echo $hr_jobtitles->specification->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hr_jobtitles->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $hr_jobtitles->HospID->cellAttributes() ?>>
<span id="el<?php echo $hr_jobtitles_list->RowCnt ?>_hr_jobtitles_HospID" class="hr_jobtitles_HospID">
<span<?php echo $hr_jobtitles->HospID->viewAttributes() ?>>
<?php echo $hr_jobtitles->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$hr_jobtitles_list->ListOptions->render("body", "right", $hr_jobtitles_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$hr_jobtitles->isGridAdd())
		$hr_jobtitles_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$hr_jobtitles->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($hr_jobtitles_list->Recordset)
	$hr_jobtitles_list->Recordset->Close();
?>
<?php if (!$hr_jobtitles->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$hr_jobtitles->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($hr_jobtitles_list->Pager)) $hr_jobtitles_list->Pager = new NumericPager($hr_jobtitles_list->StartRec, $hr_jobtitles_list->DisplayRecs, $hr_jobtitles_list->TotalRecs, $hr_jobtitles_list->RecRange, $hr_jobtitles_list->AutoHidePager) ?>
<?php if ($hr_jobtitles_list->Pager->RecordCount > 0 && $hr_jobtitles_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($hr_jobtitles_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_jobtitles_list->pageUrl() ?>start=<?php echo $hr_jobtitles_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($hr_jobtitles_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_jobtitles_list->pageUrl() ?>start=<?php echo $hr_jobtitles_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($hr_jobtitles_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $hr_jobtitles_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($hr_jobtitles_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_jobtitles_list->pageUrl() ?>start=<?php echo $hr_jobtitles_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($hr_jobtitles_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hr_jobtitles_list->pageUrl() ?>start=<?php echo $hr_jobtitles_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($hr_jobtitles_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $hr_jobtitles_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $hr_jobtitles_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $hr_jobtitles_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($hr_jobtitles_list->TotalRecs > 0 && (!$hr_jobtitles_list->AutoHidePageSizeSelector || $hr_jobtitles_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="hr_jobtitles">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($hr_jobtitles_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($hr_jobtitles_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($hr_jobtitles_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($hr_jobtitles_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($hr_jobtitles_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($hr_jobtitles_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($hr_jobtitles->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $hr_jobtitles_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($hr_jobtitles_list->TotalRecs == 0 && !$hr_jobtitles->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $hr_jobtitles_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$hr_jobtitles_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$hr_jobtitles->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$hr_jobtitles->isExport()) { ?>
<script>
ew.scrollableTable("gmp_hr_jobtitles", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$hr_jobtitles_list->terminate();
?>