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
$mas_reference_type_list = new mas_reference_type_list();

// Run the page
$mas_reference_type_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_reference_type_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$mas_reference_type->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fmas_reference_typelist = currentForm = new ew.Form("fmas_reference_typelist", "list");
fmas_reference_typelist.formKeyCountName = '<?php echo $mas_reference_type_list->FormKeyCountName ?>';

// Form_CustomValidate event
fmas_reference_typelist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fmas_reference_typelist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fmas_reference_typelistsrch = currentSearchForm = new ew.Form("fmas_reference_typelistsrch");

// Filters
fmas_reference_typelistsrch.filterList = <?php echo $mas_reference_type_list->getFilterList() ?>;
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
<?php if (!$mas_reference_type->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($mas_reference_type_list->TotalRecs > 0 && $mas_reference_type_list->ExportOptions->visible()) { ?>
<?php $mas_reference_type_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($mas_reference_type_list->ImportOptions->visible()) { ?>
<?php $mas_reference_type_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($mas_reference_type_list->SearchOptions->visible()) { ?>
<?php $mas_reference_type_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($mas_reference_type_list->FilterOptions->visible()) { ?>
<?php $mas_reference_type_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$mas_reference_type_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$mas_reference_type->isExport() && !$mas_reference_type->CurrentAction) { ?>
<form name="fmas_reference_typelistsrch" id="fmas_reference_typelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($mas_reference_type_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fmas_reference_typelistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="mas_reference_type">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($mas_reference_type_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($mas_reference_type_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $mas_reference_type_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($mas_reference_type_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($mas_reference_type_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($mas_reference_type_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($mas_reference_type_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $mas_reference_type_list->showPageHeader(); ?>
<?php
$mas_reference_type_list->showMessage();
?>
<?php if ($mas_reference_type_list->TotalRecs > 0 || $mas_reference_type->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($mas_reference_type_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> mas_reference_type">
<?php if (!$mas_reference_type->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$mas_reference_type->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($mas_reference_type_list->Pager)) $mas_reference_type_list->Pager = new NumericPager($mas_reference_type_list->StartRec, $mas_reference_type_list->DisplayRecs, $mas_reference_type_list->TotalRecs, $mas_reference_type_list->RecRange, $mas_reference_type_list->AutoHidePager) ?>
<?php if ($mas_reference_type_list->Pager->RecordCount > 0 && $mas_reference_type_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($mas_reference_type_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_reference_type_list->pageUrl() ?>start=<?php echo $mas_reference_type_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($mas_reference_type_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_reference_type_list->pageUrl() ?>start=<?php echo $mas_reference_type_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($mas_reference_type_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $mas_reference_type_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($mas_reference_type_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_reference_type_list->pageUrl() ?>start=<?php echo $mas_reference_type_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($mas_reference_type_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_reference_type_list->pageUrl() ?>start=<?php echo $mas_reference_type_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($mas_reference_type_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $mas_reference_type_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $mas_reference_type_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $mas_reference_type_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($mas_reference_type_list->TotalRecs > 0 && (!$mas_reference_type_list->AutoHidePageSizeSelector || $mas_reference_type_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="mas_reference_type">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($mas_reference_type_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($mas_reference_type_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($mas_reference_type_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($mas_reference_type_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($mas_reference_type_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($mas_reference_type_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($mas_reference_type->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $mas_reference_type_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fmas_reference_typelist" id="fmas_reference_typelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($mas_reference_type_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $mas_reference_type_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_reference_type">
<div id="gmp_mas_reference_type" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($mas_reference_type_list->TotalRecs > 0 || $mas_reference_type->isGridEdit()) { ?>
<table id="tbl_mas_reference_typelist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$mas_reference_type_list->RowType = ROWTYPE_HEADER;

// Render list options
$mas_reference_type_list->renderListOptions();

// Render list options (header, left)
$mas_reference_type_list->ListOptions->render("header", "left");
?>
<?php if ($mas_reference_type->id->Visible) { // id ?>
	<?php if ($mas_reference_type->sortUrl($mas_reference_type->id) == "") { ?>
		<th data-name="id" class="<?php echo $mas_reference_type->id->headerCellClass() ?>"><div id="elh_mas_reference_type_id" class="mas_reference_type_id"><div class="ew-table-header-caption"><?php echo $mas_reference_type->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $mas_reference_type->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_reference_type->SortUrl($mas_reference_type->id) ?>',1);"><div id="elh_mas_reference_type_id" class="mas_reference_type_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_reference_type->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_reference_type->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_reference_type->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_reference_type->reference->Visible) { // reference ?>
	<?php if ($mas_reference_type->sortUrl($mas_reference_type->reference) == "") { ?>
		<th data-name="reference" class="<?php echo $mas_reference_type->reference->headerCellClass() ?>"><div id="elh_mas_reference_type_reference" class="mas_reference_type_reference"><div class="ew-table-header-caption"><?php echo $mas_reference_type->reference->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="reference" class="<?php echo $mas_reference_type->reference->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_reference_type->SortUrl($mas_reference_type->reference) ?>',1);"><div id="elh_mas_reference_type_reference" class="mas_reference_type_reference">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_reference_type->reference->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_reference_type->reference->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_reference_type->reference->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_reference_type->ReferMobileNo->Visible) { // ReferMobileNo ?>
	<?php if ($mas_reference_type->sortUrl($mas_reference_type->ReferMobileNo) == "") { ?>
		<th data-name="ReferMobileNo" class="<?php echo $mas_reference_type->ReferMobileNo->headerCellClass() ?>"><div id="elh_mas_reference_type_ReferMobileNo" class="mas_reference_type_ReferMobileNo"><div class="ew-table-header-caption"><?php echo $mas_reference_type->ReferMobileNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReferMobileNo" class="<?php echo $mas_reference_type->ReferMobileNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_reference_type->SortUrl($mas_reference_type->ReferMobileNo) ?>',1);"><div id="elh_mas_reference_type_ReferMobileNo" class="mas_reference_type_ReferMobileNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_reference_type->ReferMobileNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_reference_type->ReferMobileNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_reference_type->ReferMobileNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_reference_type->ReferClinicname->Visible) { // ReferClinicname ?>
	<?php if ($mas_reference_type->sortUrl($mas_reference_type->ReferClinicname) == "") { ?>
		<th data-name="ReferClinicname" class="<?php echo $mas_reference_type->ReferClinicname->headerCellClass() ?>"><div id="elh_mas_reference_type_ReferClinicname" class="mas_reference_type_ReferClinicname"><div class="ew-table-header-caption"><?php echo $mas_reference_type->ReferClinicname->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReferClinicname" class="<?php echo $mas_reference_type->ReferClinicname->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_reference_type->SortUrl($mas_reference_type->ReferClinicname) ?>',1);"><div id="elh_mas_reference_type_ReferClinicname" class="mas_reference_type_ReferClinicname">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_reference_type->ReferClinicname->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_reference_type->ReferClinicname->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_reference_type->ReferClinicname->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_reference_type->ReferCity->Visible) { // ReferCity ?>
	<?php if ($mas_reference_type->sortUrl($mas_reference_type->ReferCity) == "") { ?>
		<th data-name="ReferCity" class="<?php echo $mas_reference_type->ReferCity->headerCellClass() ?>"><div id="elh_mas_reference_type_ReferCity" class="mas_reference_type_ReferCity"><div class="ew-table-header-caption"><?php echo $mas_reference_type->ReferCity->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReferCity" class="<?php echo $mas_reference_type->ReferCity->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_reference_type->SortUrl($mas_reference_type->ReferCity) ?>',1);"><div id="elh_mas_reference_type_ReferCity" class="mas_reference_type_ReferCity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_reference_type->ReferCity->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_reference_type->ReferCity->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_reference_type->ReferCity->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_reference_type->HospID->Visible) { // HospID ?>
	<?php if ($mas_reference_type->sortUrl($mas_reference_type->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $mas_reference_type->HospID->headerCellClass() ?>"><div id="elh_mas_reference_type_HospID" class="mas_reference_type_HospID"><div class="ew-table-header-caption"><?php echo $mas_reference_type->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $mas_reference_type->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_reference_type->SortUrl($mas_reference_type->HospID) ?>',1);"><div id="elh_mas_reference_type_HospID" class="mas_reference_type_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_reference_type->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($mas_reference_type->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_reference_type->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_reference_type->_email->Visible) { // email ?>
	<?php if ($mas_reference_type->sortUrl($mas_reference_type->_email) == "") { ?>
		<th data-name="_email" class="<?php echo $mas_reference_type->_email->headerCellClass() ?>"><div id="elh_mas_reference_type__email" class="mas_reference_type__email"><div class="ew-table-header-caption"><?php echo $mas_reference_type->_email->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_email" class="<?php echo $mas_reference_type->_email->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_reference_type->SortUrl($mas_reference_type->_email) ?>',1);"><div id="elh_mas_reference_type__email" class="mas_reference_type__email">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_reference_type->_email->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_reference_type->_email->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_reference_type->_email->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($mas_reference_type->whatapp->Visible) { // whatapp ?>
	<?php if ($mas_reference_type->sortUrl($mas_reference_type->whatapp) == "") { ?>
		<th data-name="whatapp" class="<?php echo $mas_reference_type->whatapp->headerCellClass() ?>"><div id="elh_mas_reference_type_whatapp" class="mas_reference_type_whatapp"><div class="ew-table-header-caption"><?php echo $mas_reference_type->whatapp->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="whatapp" class="<?php echo $mas_reference_type->whatapp->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $mas_reference_type->SortUrl($mas_reference_type->whatapp) ?>',1);"><div id="elh_mas_reference_type_whatapp" class="mas_reference_type_whatapp">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $mas_reference_type->whatapp->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($mas_reference_type->whatapp->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($mas_reference_type->whatapp->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$mas_reference_type_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($mas_reference_type->ExportAll && $mas_reference_type->isExport()) {
	$mas_reference_type_list->StopRec = $mas_reference_type_list->TotalRecs;
} else {

	// Set the last record to display
	if ($mas_reference_type_list->TotalRecs > $mas_reference_type_list->StartRec + $mas_reference_type_list->DisplayRecs - 1)
		$mas_reference_type_list->StopRec = $mas_reference_type_list->StartRec + $mas_reference_type_list->DisplayRecs - 1;
	else
		$mas_reference_type_list->StopRec = $mas_reference_type_list->TotalRecs;
}
$mas_reference_type_list->RecCnt = $mas_reference_type_list->StartRec - 1;
if ($mas_reference_type_list->Recordset && !$mas_reference_type_list->Recordset->EOF) {
	$mas_reference_type_list->Recordset->moveFirst();
	$selectLimit = $mas_reference_type_list->UseSelectLimit;
	if (!$selectLimit && $mas_reference_type_list->StartRec > 1)
		$mas_reference_type_list->Recordset->move($mas_reference_type_list->StartRec - 1);
} elseif (!$mas_reference_type->AllowAddDeleteRow && $mas_reference_type_list->StopRec == 0) {
	$mas_reference_type_list->StopRec = $mas_reference_type->GridAddRowCount;
}

// Initialize aggregate
$mas_reference_type->RowType = ROWTYPE_AGGREGATEINIT;
$mas_reference_type->resetAttributes();
$mas_reference_type_list->renderRow();
while ($mas_reference_type_list->RecCnt < $mas_reference_type_list->StopRec) {
	$mas_reference_type_list->RecCnt++;
	if ($mas_reference_type_list->RecCnt >= $mas_reference_type_list->StartRec) {
		$mas_reference_type_list->RowCnt++;

		// Set up key count
		$mas_reference_type_list->KeyCount = $mas_reference_type_list->RowIndex;

		// Init row class and style
		$mas_reference_type->resetAttributes();
		$mas_reference_type->CssClass = "";
		if ($mas_reference_type->isGridAdd()) {
		} else {
			$mas_reference_type_list->loadRowValues($mas_reference_type_list->Recordset); // Load row values
		}
		$mas_reference_type->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$mas_reference_type->RowAttrs = array_merge($mas_reference_type->RowAttrs, array('data-rowindex'=>$mas_reference_type_list->RowCnt, 'id'=>'r' . $mas_reference_type_list->RowCnt . '_mas_reference_type', 'data-rowtype'=>$mas_reference_type->RowType));

		// Render row
		$mas_reference_type_list->renderRow();

		// Render list options
		$mas_reference_type_list->renderListOptions();
?>
	<tr<?php echo $mas_reference_type->rowAttributes() ?>>
<?php

// Render list options (body, left)
$mas_reference_type_list->ListOptions->render("body", "left", $mas_reference_type_list->RowCnt);
?>
	<?php if ($mas_reference_type->id->Visible) { // id ?>
		<td data-name="id"<?php echo $mas_reference_type->id->cellAttributes() ?>>
<span id="el<?php echo $mas_reference_type_list->RowCnt ?>_mas_reference_type_id" class="mas_reference_type_id">
<span<?php echo $mas_reference_type->id->viewAttributes() ?>>
<?php echo $mas_reference_type->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($mas_reference_type->reference->Visible) { // reference ?>
		<td data-name="reference"<?php echo $mas_reference_type->reference->cellAttributes() ?>>
<span id="el<?php echo $mas_reference_type_list->RowCnt ?>_mas_reference_type_reference" class="mas_reference_type_reference">
<span<?php echo $mas_reference_type->reference->viewAttributes() ?>>
<?php echo $mas_reference_type->reference->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($mas_reference_type->ReferMobileNo->Visible) { // ReferMobileNo ?>
		<td data-name="ReferMobileNo"<?php echo $mas_reference_type->ReferMobileNo->cellAttributes() ?>>
<span id="el<?php echo $mas_reference_type_list->RowCnt ?>_mas_reference_type_ReferMobileNo" class="mas_reference_type_ReferMobileNo">
<span<?php echo $mas_reference_type->ReferMobileNo->viewAttributes() ?>>
<?php echo $mas_reference_type->ReferMobileNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($mas_reference_type->ReferClinicname->Visible) { // ReferClinicname ?>
		<td data-name="ReferClinicname"<?php echo $mas_reference_type->ReferClinicname->cellAttributes() ?>>
<span id="el<?php echo $mas_reference_type_list->RowCnt ?>_mas_reference_type_ReferClinicname" class="mas_reference_type_ReferClinicname">
<span<?php echo $mas_reference_type->ReferClinicname->viewAttributes() ?>>
<?php echo $mas_reference_type->ReferClinicname->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($mas_reference_type->ReferCity->Visible) { // ReferCity ?>
		<td data-name="ReferCity"<?php echo $mas_reference_type->ReferCity->cellAttributes() ?>>
<span id="el<?php echo $mas_reference_type_list->RowCnt ?>_mas_reference_type_ReferCity" class="mas_reference_type_ReferCity">
<span<?php echo $mas_reference_type->ReferCity->viewAttributes() ?>>
<?php echo $mas_reference_type->ReferCity->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($mas_reference_type->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $mas_reference_type->HospID->cellAttributes() ?>>
<span id="el<?php echo $mas_reference_type_list->RowCnt ?>_mas_reference_type_HospID" class="mas_reference_type_HospID">
<span<?php echo $mas_reference_type->HospID->viewAttributes() ?>>
<?php echo $mas_reference_type->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($mas_reference_type->_email->Visible) { // email ?>
		<td data-name="_email"<?php echo $mas_reference_type->_email->cellAttributes() ?>>
<span id="el<?php echo $mas_reference_type_list->RowCnt ?>_mas_reference_type__email" class="mas_reference_type__email">
<span<?php echo $mas_reference_type->_email->viewAttributes() ?>>
<?php echo $mas_reference_type->_email->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($mas_reference_type->whatapp->Visible) { // whatapp ?>
		<td data-name="whatapp"<?php echo $mas_reference_type->whatapp->cellAttributes() ?>>
<span id="el<?php echo $mas_reference_type_list->RowCnt ?>_mas_reference_type_whatapp" class="mas_reference_type_whatapp">
<span<?php echo $mas_reference_type->whatapp->viewAttributes() ?>>
<?php echo $mas_reference_type->whatapp->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$mas_reference_type_list->ListOptions->render("body", "right", $mas_reference_type_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$mas_reference_type->isGridAdd())
		$mas_reference_type_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$mas_reference_type->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($mas_reference_type_list->Recordset)
	$mas_reference_type_list->Recordset->Close();
?>
<?php if (!$mas_reference_type->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$mas_reference_type->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($mas_reference_type_list->Pager)) $mas_reference_type_list->Pager = new NumericPager($mas_reference_type_list->StartRec, $mas_reference_type_list->DisplayRecs, $mas_reference_type_list->TotalRecs, $mas_reference_type_list->RecRange, $mas_reference_type_list->AutoHidePager) ?>
<?php if ($mas_reference_type_list->Pager->RecordCount > 0 && $mas_reference_type_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($mas_reference_type_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_reference_type_list->pageUrl() ?>start=<?php echo $mas_reference_type_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($mas_reference_type_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_reference_type_list->pageUrl() ?>start=<?php echo $mas_reference_type_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($mas_reference_type_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $mas_reference_type_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($mas_reference_type_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_reference_type_list->pageUrl() ?>start=<?php echo $mas_reference_type_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($mas_reference_type_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $mas_reference_type_list->pageUrl() ?>start=<?php echo $mas_reference_type_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($mas_reference_type_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $mas_reference_type_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $mas_reference_type_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $mas_reference_type_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($mas_reference_type_list->TotalRecs > 0 && (!$mas_reference_type_list->AutoHidePageSizeSelector || $mas_reference_type_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="mas_reference_type">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($mas_reference_type_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($mas_reference_type_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($mas_reference_type_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($mas_reference_type_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($mas_reference_type_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($mas_reference_type_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($mas_reference_type->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $mas_reference_type_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($mas_reference_type_list->TotalRecs == 0 && !$mas_reference_type->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $mas_reference_type_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$mas_reference_type_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$mas_reference_type->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$mas_reference_type->isExport()) { ?>
<script>
ew.scrollableTable("gmp_mas_reference_type", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$mas_reference_type_list->terminate();
?>