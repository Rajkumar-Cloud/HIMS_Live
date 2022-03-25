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
$view_labreport_print_list = new view_labreport_print_list();

// Run the page
$view_labreport_print_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_labreport_print_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_labreport_print->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_labreport_printlist = currentForm = new ew.Form("fview_labreport_printlist", "list");
fview_labreport_printlist.formKeyCountName = '<?php echo $view_labreport_print_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_labreport_printlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_labreport_printlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fview_labreport_printlistsrch = currentSearchForm = new ew.Form("fview_labreport_printlistsrch");

// Filters
fview_labreport_printlistsrch.filterList = <?php echo $view_labreport_print_list->getFilterList() ?>;
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
<?php if (!$view_labreport_print->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_labreport_print_list->TotalRecs > 0 && $view_labreport_print_list->ExportOptions->visible()) { ?>
<?php $view_labreport_print_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_labreport_print_list->ImportOptions->visible()) { ?>
<?php $view_labreport_print_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_labreport_print_list->SearchOptions->visible()) { ?>
<?php $view_labreport_print_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_labreport_print_list->FilterOptions->visible()) { ?>
<?php $view_labreport_print_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_labreport_print_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_labreport_print->isExport() && !$view_labreport_print->CurrentAction) { ?>
<form name="fview_labreport_printlistsrch" id="fview_labreport_printlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_labreport_print_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_labreport_printlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_labreport_print">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_labreport_print_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_labreport_print_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_labreport_print_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_labreport_print_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_labreport_print_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_labreport_print_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_labreport_print_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_labreport_print_list->showPageHeader(); ?>
<?php
$view_labreport_print_list->showMessage();
?>
<?php if ($view_labreport_print_list->TotalRecs > 0 || $view_labreport_print->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_labreport_print_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_labreport_print">
<?php if (!$view_labreport_print->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_labreport_print->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_labreport_print_list->Pager)) $view_labreport_print_list->Pager = new NumericPager($view_labreport_print_list->StartRec, $view_labreport_print_list->DisplayRecs, $view_labreport_print_list->TotalRecs, $view_labreport_print_list->RecRange, $view_labreport_print_list->AutoHidePager) ?>
<?php if ($view_labreport_print_list->Pager->RecordCount > 0 && $view_labreport_print_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_labreport_print_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_labreport_print_list->pageUrl() ?>start=<?php echo $view_labreport_print_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_labreport_print_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_labreport_print_list->pageUrl() ?>start=<?php echo $view_labreport_print_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_labreport_print_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_labreport_print_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_labreport_print_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_labreport_print_list->pageUrl() ?>start=<?php echo $view_labreport_print_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_labreport_print_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_labreport_print_list->pageUrl() ?>start=<?php echo $view_labreport_print_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_labreport_print_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_labreport_print_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_labreport_print_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_labreport_print_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_labreport_print_list->TotalRecs > 0 && (!$view_labreport_print_list->AutoHidePageSizeSelector || $view_labreport_print_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_labreport_print">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_labreport_print_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_labreport_print_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_labreport_print_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_labreport_print_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_labreport_print_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_labreport_print_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_labreport_print->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_labreport_print_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_labreport_printlist" id="fview_labreport_printlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_labreport_print_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_labreport_print_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_labreport_print">
<div id="gmp_view_labreport_print" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_labreport_print_list->TotalRecs > 0 || $view_labreport_print->isGridEdit()) { ?>
<table id="tbl_view_labreport_printlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_labreport_print_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_labreport_print_list->renderListOptions();

// Render list options (header, left)
$view_labreport_print_list->ListOptions->render("header", "left");
?>
<?php if ($view_labreport_print->id->Visible) { // id ?>
	<?php if ($view_labreport_print->sortUrl($view_labreport_print->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_labreport_print->id->headerCellClass() ?>"><div id="elh_view_labreport_print_id" class="view_labreport_print_id"><div class="ew-table-header-caption"><?php echo $view_labreport_print->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_labreport_print->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_labreport_print->SortUrl($view_labreport_print->id) ?>',1);"><div id="elh_view_labreport_print_id" class="view_labreport_print_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_labreport_print->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->PatID->Visible) { // PatID ?>
	<?php if ($view_labreport_print->sortUrl($view_labreport_print->PatID) == "") { ?>
		<th data-name="PatID" class="<?php echo $view_labreport_print->PatID->headerCellClass() ?>"><div id="elh_view_labreport_print_PatID" class="view_labreport_print_PatID"><div class="ew-table-header-caption"><?php echo $view_labreport_print->PatID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatID" class="<?php echo $view_labreport_print->PatID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_labreport_print->SortUrl($view_labreport_print->PatID) ?>',1);"><div id="elh_view_labreport_print_PatID" class="view_labreport_print_PatID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print->PatID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print->PatID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_labreport_print->PatID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->PatientName->Visible) { // PatientName ?>
	<?php if ($view_labreport_print->sortUrl($view_labreport_print->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $view_labreport_print->PatientName->headerCellClass() ?>"><div id="elh_view_labreport_print_PatientName" class="view_labreport_print_PatientName"><div class="ew-table-header-caption"><?php echo $view_labreport_print->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $view_labreport_print->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_labreport_print->SortUrl($view_labreport_print->PatientName) ?>',1);"><div id="elh_view_labreport_print_PatientName" class="view_labreport_print_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_labreport_print->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->Age->Visible) { // Age ?>
	<?php if ($view_labreport_print->sortUrl($view_labreport_print->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $view_labreport_print->Age->headerCellClass() ?>"><div id="elh_view_labreport_print_Age" class="view_labreport_print_Age"><div class="ew-table-header-caption"><?php echo $view_labreport_print->Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $view_labreport_print->Age->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_labreport_print->SortUrl($view_labreport_print->Age) ?>',1);"><div id="elh_view_labreport_print_Age" class="view_labreport_print_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print->Age->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print->Age->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_labreport_print->Age->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->Gender->Visible) { // Gender ?>
	<?php if ($view_labreport_print->sortUrl($view_labreport_print->Gender) == "") { ?>
		<th data-name="Gender" class="<?php echo $view_labreport_print->Gender->headerCellClass() ?>"><div id="elh_view_labreport_print_Gender" class="view_labreport_print_Gender"><div class="ew-table-header-caption"><?php echo $view_labreport_print->Gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gender" class="<?php echo $view_labreport_print->Gender->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_labreport_print->SortUrl($view_labreport_print->Gender) ?>',1);"><div id="elh_view_labreport_print_Gender" class="view_labreport_print_Gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print->Gender->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print->Gender->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_labreport_print->Gender->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->sid->Visible) { // sid ?>
	<?php if ($view_labreport_print->sortUrl($view_labreport_print->sid) == "") { ?>
		<th data-name="sid" class="<?php echo $view_labreport_print->sid->headerCellClass() ?>"><div id="elh_view_labreport_print_sid" class="view_labreport_print_sid"><div class="ew-table-header-caption"><?php echo $view_labreport_print->sid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sid" class="<?php echo $view_labreport_print->sid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_labreport_print->SortUrl($view_labreport_print->sid) ?>',1);"><div id="elh_view_labreport_print_sid" class="view_labreport_print_sid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print->sid->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print->sid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_labreport_print->sid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->ItemCode->Visible) { // ItemCode ?>
	<?php if ($view_labreport_print->sortUrl($view_labreport_print->ItemCode) == "") { ?>
		<th data-name="ItemCode" class="<?php echo $view_labreport_print->ItemCode->headerCellClass() ?>"><div id="elh_view_labreport_print_ItemCode" class="view_labreport_print_ItemCode"><div class="ew-table-header-caption"><?php echo $view_labreport_print->ItemCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ItemCode" class="<?php echo $view_labreport_print->ItemCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_labreport_print->SortUrl($view_labreport_print->ItemCode) ?>',1);"><div id="elh_view_labreport_print_ItemCode" class="view_labreport_print_ItemCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print->ItemCode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print->ItemCode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_labreport_print->ItemCode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->DEptCd->Visible) { // DEptCd ?>
	<?php if ($view_labreport_print->sortUrl($view_labreport_print->DEptCd) == "") { ?>
		<th data-name="DEptCd" class="<?php echo $view_labreport_print->DEptCd->headerCellClass() ?>"><div id="elh_view_labreport_print_DEptCd" class="view_labreport_print_DEptCd"><div class="ew-table-header-caption"><?php echo $view_labreport_print->DEptCd->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DEptCd" class="<?php echo $view_labreport_print->DEptCd->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_labreport_print->SortUrl($view_labreport_print->DEptCd) ?>',1);"><div id="elh_view_labreport_print_DEptCd" class="view_labreport_print_DEptCd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print->DEptCd->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print->DEptCd->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_labreport_print->DEptCd->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->Resulted->Visible) { // Resulted ?>
	<?php if ($view_labreport_print->sortUrl($view_labreport_print->Resulted) == "") { ?>
		<th data-name="Resulted" class="<?php echo $view_labreport_print->Resulted->headerCellClass() ?>"><div id="elh_view_labreport_print_Resulted" class="view_labreport_print_Resulted"><div class="ew-table-header-caption"><?php echo $view_labreport_print->Resulted->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Resulted" class="<?php echo $view_labreport_print->Resulted->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_labreport_print->SortUrl($view_labreport_print->Resulted) ?>',1);"><div id="elh_view_labreport_print_Resulted" class="view_labreport_print_Resulted">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print->Resulted->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print->Resulted->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_labreport_print->Resulted->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->Services->Visible) { // Services ?>
	<?php if ($view_labreport_print->sortUrl($view_labreport_print->Services) == "") { ?>
		<th data-name="Services" class="<?php echo $view_labreport_print->Services->headerCellClass() ?>"><div id="elh_view_labreport_print_Services" class="view_labreport_print_Services"><div class="ew-table-header-caption"><?php echo $view_labreport_print->Services->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Services" class="<?php echo $view_labreport_print->Services->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_labreport_print->SortUrl($view_labreport_print->Services) ?>',1);"><div id="elh_view_labreport_print_Services" class="view_labreport_print_Services">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print->Services->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print->Services->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_labreport_print->Services->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->Pic1->Visible) { // Pic1 ?>
	<?php if ($view_labreport_print->sortUrl($view_labreport_print->Pic1) == "") { ?>
		<th data-name="Pic1" class="<?php echo $view_labreport_print->Pic1->headerCellClass() ?>"><div id="elh_view_labreport_print_Pic1" class="view_labreport_print_Pic1"><div class="ew-table-header-caption"><?php echo $view_labreport_print->Pic1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pic1" class="<?php echo $view_labreport_print->Pic1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_labreport_print->SortUrl($view_labreport_print->Pic1) ?>',1);"><div id="elh_view_labreport_print_Pic1" class="view_labreport_print_Pic1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print->Pic1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print->Pic1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_labreport_print->Pic1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->Pic2->Visible) { // Pic2 ?>
	<?php if ($view_labreport_print->sortUrl($view_labreport_print->Pic2) == "") { ?>
		<th data-name="Pic2" class="<?php echo $view_labreport_print->Pic2->headerCellClass() ?>"><div id="elh_view_labreport_print_Pic2" class="view_labreport_print_Pic2"><div class="ew-table-header-caption"><?php echo $view_labreport_print->Pic2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pic2" class="<?php echo $view_labreport_print->Pic2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_labreport_print->SortUrl($view_labreport_print->Pic2) ?>',1);"><div id="elh_view_labreport_print_Pic2" class="view_labreport_print_Pic2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print->Pic2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print->Pic2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_labreport_print->Pic2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->TestUnit->Visible) { // TestUnit ?>
	<?php if ($view_labreport_print->sortUrl($view_labreport_print->TestUnit) == "") { ?>
		<th data-name="TestUnit" class="<?php echo $view_labreport_print->TestUnit->headerCellClass() ?>"><div id="elh_view_labreport_print_TestUnit" class="view_labreport_print_TestUnit"><div class="ew-table-header-caption"><?php echo $view_labreport_print->TestUnit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestUnit" class="<?php echo $view_labreport_print->TestUnit->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_labreport_print->SortUrl($view_labreport_print->TestUnit) ?>',1);"><div id="elh_view_labreport_print_TestUnit" class="view_labreport_print_TestUnit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print->TestUnit->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print->TestUnit->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_labreport_print->TestUnit->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->Order->Visible) { // Order ?>
	<?php if ($view_labreport_print->sortUrl($view_labreport_print->Order) == "") { ?>
		<th data-name="Order" class="<?php echo $view_labreport_print->Order->headerCellClass() ?>"><div id="elh_view_labreport_print_Order" class="view_labreport_print_Order"><div class="ew-table-header-caption"><?php echo $view_labreport_print->Order->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Order" class="<?php echo $view_labreport_print->Order->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_labreport_print->SortUrl($view_labreport_print->Order) ?>',1);"><div id="elh_view_labreport_print_Order" class="view_labreport_print_Order">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print->Order->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print->Order->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_labreport_print->Order->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->Repeated->Visible) { // Repeated ?>
	<?php if ($view_labreport_print->sortUrl($view_labreport_print->Repeated) == "") { ?>
		<th data-name="Repeated" class="<?php echo $view_labreport_print->Repeated->headerCellClass() ?>"><div id="elh_view_labreport_print_Repeated" class="view_labreport_print_Repeated"><div class="ew-table-header-caption"><?php echo $view_labreport_print->Repeated->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Repeated" class="<?php echo $view_labreport_print->Repeated->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_labreport_print->SortUrl($view_labreport_print->Repeated) ?>',1);"><div id="elh_view_labreport_print_Repeated" class="view_labreport_print_Repeated">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print->Repeated->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print->Repeated->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_labreport_print->Repeated->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->Vid->Visible) { // Vid ?>
	<?php if ($view_labreport_print->sortUrl($view_labreport_print->Vid) == "") { ?>
		<th data-name="Vid" class="<?php echo $view_labreport_print->Vid->headerCellClass() ?>"><div id="elh_view_labreport_print_Vid" class="view_labreport_print_Vid"><div class="ew-table-header-caption"><?php echo $view_labreport_print->Vid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Vid" class="<?php echo $view_labreport_print->Vid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_labreport_print->SortUrl($view_labreport_print->Vid) ?>',1);"><div id="elh_view_labreport_print_Vid" class="view_labreport_print_Vid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print->Vid->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print->Vid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_labreport_print->Vid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->invoiceId->Visible) { // invoiceId ?>
	<?php if ($view_labreport_print->sortUrl($view_labreport_print->invoiceId) == "") { ?>
		<th data-name="invoiceId" class="<?php echo $view_labreport_print->invoiceId->headerCellClass() ?>"><div id="elh_view_labreport_print_invoiceId" class="view_labreport_print_invoiceId"><div class="ew-table-header-caption"><?php echo $view_labreport_print->invoiceId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="invoiceId" class="<?php echo $view_labreport_print->invoiceId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_labreport_print->SortUrl($view_labreport_print->invoiceId) ?>',1);"><div id="elh_view_labreport_print_invoiceId" class="view_labreport_print_invoiceId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print->invoiceId->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print->invoiceId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_labreport_print->invoiceId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->DrID->Visible) { // DrID ?>
	<?php if ($view_labreport_print->sortUrl($view_labreport_print->DrID) == "") { ?>
		<th data-name="DrID" class="<?php echo $view_labreport_print->DrID->headerCellClass() ?>"><div id="elh_view_labreport_print_DrID" class="view_labreport_print_DrID"><div class="ew-table-header-caption"><?php echo $view_labreport_print->DrID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrID" class="<?php echo $view_labreport_print->DrID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_labreport_print->SortUrl($view_labreport_print->DrID) ?>',1);"><div id="elh_view_labreport_print_DrID" class="view_labreport_print_DrID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print->DrID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print->DrID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_labreport_print->DrID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->DrCODE->Visible) { // DrCODE ?>
	<?php if ($view_labreport_print->sortUrl($view_labreport_print->DrCODE) == "") { ?>
		<th data-name="DrCODE" class="<?php echo $view_labreport_print->DrCODE->headerCellClass() ?>"><div id="elh_view_labreport_print_DrCODE" class="view_labreport_print_DrCODE"><div class="ew-table-header-caption"><?php echo $view_labreport_print->DrCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrCODE" class="<?php echo $view_labreport_print->DrCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_labreport_print->SortUrl($view_labreport_print->DrCODE) ?>',1);"><div id="elh_view_labreport_print_DrCODE" class="view_labreport_print_DrCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print->DrCODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print->DrCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_labreport_print->DrCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->DrName->Visible) { // DrName ?>
	<?php if ($view_labreport_print->sortUrl($view_labreport_print->DrName) == "") { ?>
		<th data-name="DrName" class="<?php echo $view_labreport_print->DrName->headerCellClass() ?>"><div id="elh_view_labreport_print_DrName" class="view_labreport_print_DrName"><div class="ew-table-header-caption"><?php echo $view_labreport_print->DrName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrName" class="<?php echo $view_labreport_print->DrName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_labreport_print->SortUrl($view_labreport_print->DrName) ?>',1);"><div id="elh_view_labreport_print_DrName" class="view_labreport_print_DrName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print->DrName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print->DrName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_labreport_print->DrName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->Department->Visible) { // Department ?>
	<?php if ($view_labreport_print->sortUrl($view_labreport_print->Department) == "") { ?>
		<th data-name="Department" class="<?php echo $view_labreport_print->Department->headerCellClass() ?>"><div id="elh_view_labreport_print_Department" class="view_labreport_print_Department"><div class="ew-table-header-caption"><?php echo $view_labreport_print->Department->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Department" class="<?php echo $view_labreport_print->Department->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_labreport_print->SortUrl($view_labreport_print->Department) ?>',1);"><div id="elh_view_labreport_print_Department" class="view_labreport_print_Department">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print->Department->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print->Department->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_labreport_print->Department->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_labreport_print->sortUrl($view_labreport_print->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_labreport_print->createddatetime->headerCellClass() ?>"><div id="elh_view_labreport_print_createddatetime" class="view_labreport_print_createddatetime"><div class="ew-table-header-caption"><?php echo $view_labreport_print->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_labreport_print->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_labreport_print->SortUrl($view_labreport_print->createddatetime) ?>',1);"><div id="elh_view_labreport_print_createddatetime" class="view_labreport_print_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_labreport_print->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->status->Visible) { // status ?>
	<?php if ($view_labreport_print->sortUrl($view_labreport_print->status) == "") { ?>
		<th data-name="status" class="<?php echo $view_labreport_print->status->headerCellClass() ?>"><div id="elh_view_labreport_print_status" class="view_labreport_print_status"><div class="ew-table-header-caption"><?php echo $view_labreport_print->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $view_labreport_print->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_labreport_print->SortUrl($view_labreport_print->status) ?>',1);"><div id="elh_view_labreport_print_status" class="view_labreport_print_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_labreport_print->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->TestType->Visible) { // TestType ?>
	<?php if ($view_labreport_print->sortUrl($view_labreport_print->TestType) == "") { ?>
		<th data-name="TestType" class="<?php echo $view_labreport_print->TestType->headerCellClass() ?>"><div id="elh_view_labreport_print_TestType" class="view_labreport_print_TestType"><div class="ew-table-header-caption"><?php echo $view_labreport_print->TestType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestType" class="<?php echo $view_labreport_print->TestType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_labreport_print->SortUrl($view_labreport_print->TestType) ?>',1);"><div id="elh_view_labreport_print_TestType" class="view_labreport_print_TestType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print->TestType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print->TestType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_labreport_print->TestType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->ResultDate->Visible) { // ResultDate ?>
	<?php if ($view_labreport_print->sortUrl($view_labreport_print->ResultDate) == "") { ?>
		<th data-name="ResultDate" class="<?php echo $view_labreport_print->ResultDate->headerCellClass() ?>"><div id="elh_view_labreport_print_ResultDate" class="view_labreport_print_ResultDate"><div class="ew-table-header-caption"><?php echo $view_labreport_print->ResultDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ResultDate" class="<?php echo $view_labreport_print->ResultDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_labreport_print->SortUrl($view_labreport_print->ResultDate) ?>',1);"><div id="elh_view_labreport_print_ResultDate" class="view_labreport_print_ResultDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print->ResultDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print->ResultDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_labreport_print->ResultDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->ResultedBy->Visible) { // ResultedBy ?>
	<?php if ($view_labreport_print->sortUrl($view_labreport_print->ResultedBy) == "") { ?>
		<th data-name="ResultedBy" class="<?php echo $view_labreport_print->ResultedBy->headerCellClass() ?>"><div id="elh_view_labreport_print_ResultedBy" class="view_labreport_print_ResultedBy"><div class="ew-table-header-caption"><?php echo $view_labreport_print->ResultedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ResultedBy" class="<?php echo $view_labreport_print->ResultedBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_labreport_print->SortUrl($view_labreport_print->ResultedBy) ?>',1);"><div id="elh_view_labreport_print_ResultedBy" class="view_labreport_print_ResultedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print->ResultedBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print->ResultedBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_labreport_print->ResultedBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->Printed->Visible) { // Printed ?>
	<?php if ($view_labreport_print->sortUrl($view_labreport_print->Printed) == "") { ?>
		<th data-name="Printed" class="<?php echo $view_labreport_print->Printed->headerCellClass() ?>"><div id="elh_view_labreport_print_Printed" class="view_labreport_print_Printed"><div class="ew-table-header-caption"><?php echo $view_labreport_print->Printed->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Printed" class="<?php echo $view_labreport_print->Printed->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_labreport_print->SortUrl($view_labreport_print->Printed) ?>',1);"><div id="elh_view_labreport_print_Printed" class="view_labreport_print_Printed">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print->Printed->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print->Printed->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_labreport_print->Printed->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->PrintBy->Visible) { // PrintBy ?>
	<?php if ($view_labreport_print->sortUrl($view_labreport_print->PrintBy) == "") { ?>
		<th data-name="PrintBy" class="<?php echo $view_labreport_print->PrintBy->headerCellClass() ?>"><div id="elh_view_labreport_print_PrintBy" class="view_labreport_print_PrintBy"><div class="ew-table-header-caption"><?php echo $view_labreport_print->PrintBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrintBy" class="<?php echo $view_labreport_print->PrintBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_labreport_print->SortUrl($view_labreport_print->PrintBy) ?>',1);"><div id="elh_view_labreport_print_PrintBy" class="view_labreport_print_PrintBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print->PrintBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print->PrintBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_labreport_print->PrintBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_labreport_print->PrintDate->Visible) { // PrintDate ?>
	<?php if ($view_labreport_print->sortUrl($view_labreport_print->PrintDate) == "") { ?>
		<th data-name="PrintDate" class="<?php echo $view_labreport_print->PrintDate->headerCellClass() ?>"><div id="elh_view_labreport_print_PrintDate" class="view_labreport_print_PrintDate"><div class="ew-table-header-caption"><?php echo $view_labreport_print->PrintDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrintDate" class="<?php echo $view_labreport_print->PrintDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_labreport_print->SortUrl($view_labreport_print->PrintDate) ?>',1);"><div id="elh_view_labreport_print_PrintDate" class="view_labreport_print_PrintDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_labreport_print->PrintDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_labreport_print->PrintDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_labreport_print->PrintDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_labreport_print_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_labreport_print->ExportAll && $view_labreport_print->isExport()) {
	$view_labreport_print_list->StopRec = $view_labreport_print_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_labreport_print_list->TotalRecs > $view_labreport_print_list->StartRec + $view_labreport_print_list->DisplayRecs - 1)
		$view_labreport_print_list->StopRec = $view_labreport_print_list->StartRec + $view_labreport_print_list->DisplayRecs - 1;
	else
		$view_labreport_print_list->StopRec = $view_labreport_print_list->TotalRecs;
}
$view_labreport_print_list->RecCnt = $view_labreport_print_list->StartRec - 1;
if ($view_labreport_print_list->Recordset && !$view_labreport_print_list->Recordset->EOF) {
	$view_labreport_print_list->Recordset->moveFirst();
	$selectLimit = $view_labreport_print_list->UseSelectLimit;
	if (!$selectLimit && $view_labreport_print_list->StartRec > 1)
		$view_labreport_print_list->Recordset->move($view_labreport_print_list->StartRec - 1);
} elseif (!$view_labreport_print->AllowAddDeleteRow && $view_labreport_print_list->StopRec == 0) {
	$view_labreport_print_list->StopRec = $view_labreport_print->GridAddRowCount;
}

// Initialize aggregate
$view_labreport_print->RowType = ROWTYPE_AGGREGATEINIT;
$view_labreport_print->resetAttributes();
$view_labreport_print_list->renderRow();
while ($view_labreport_print_list->RecCnt < $view_labreport_print_list->StopRec) {
	$view_labreport_print_list->RecCnt++;
	if ($view_labreport_print_list->RecCnt >= $view_labreport_print_list->StartRec) {
		$view_labreport_print_list->RowCnt++;

		// Set up key count
		$view_labreport_print_list->KeyCount = $view_labreport_print_list->RowIndex;

		// Init row class and style
		$view_labreport_print->resetAttributes();
		$view_labreport_print->CssClass = "";
		if ($view_labreport_print->isGridAdd()) {
		} else {
			$view_labreport_print_list->loadRowValues($view_labreport_print_list->Recordset); // Load row values
		}
		$view_labreport_print->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_labreport_print->RowAttrs = array_merge($view_labreport_print->RowAttrs, array('data-rowindex'=>$view_labreport_print_list->RowCnt, 'id'=>'r' . $view_labreport_print_list->RowCnt . '_view_labreport_print', 'data-rowtype'=>$view_labreport_print->RowType));

		// Render row
		$view_labreport_print_list->renderRow();

		// Render list options
		$view_labreport_print_list->renderListOptions();
?>
	<tr<?php echo $view_labreport_print->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_labreport_print_list->ListOptions->render("body", "left", $view_labreport_print_list->RowCnt);
?>
	<?php if ($view_labreport_print->id->Visible) { // id ?>
		<td data-name="id"<?php echo $view_labreport_print->id->cellAttributes() ?>>
<span id="el<?php echo $view_labreport_print_list->RowCnt ?>_view_labreport_print_id" class="view_labreport_print_id">
<span<?php echo $view_labreport_print->id->viewAttributes() ?>>
<?php echo $view_labreport_print->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_labreport_print->PatID->Visible) { // PatID ?>
		<td data-name="PatID"<?php echo $view_labreport_print->PatID->cellAttributes() ?>>
<span id="el<?php echo $view_labreport_print_list->RowCnt ?>_view_labreport_print_PatID" class="view_labreport_print_PatID">
<span<?php echo $view_labreport_print->PatID->viewAttributes() ?>>
<?php echo $view_labreport_print->PatID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_labreport_print->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $view_labreport_print->PatientName->cellAttributes() ?>>
<span id="el<?php echo $view_labreport_print_list->RowCnt ?>_view_labreport_print_PatientName" class="view_labreport_print_PatientName">
<span<?php echo $view_labreport_print->PatientName->viewAttributes() ?>>
<?php echo $view_labreport_print->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_labreport_print->Age->Visible) { // Age ?>
		<td data-name="Age"<?php echo $view_labreport_print->Age->cellAttributes() ?>>
<span id="el<?php echo $view_labreport_print_list->RowCnt ?>_view_labreport_print_Age" class="view_labreport_print_Age">
<span<?php echo $view_labreport_print->Age->viewAttributes() ?>>
<?php echo $view_labreport_print->Age->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_labreport_print->Gender->Visible) { // Gender ?>
		<td data-name="Gender"<?php echo $view_labreport_print->Gender->cellAttributes() ?>>
<span id="el<?php echo $view_labreport_print_list->RowCnt ?>_view_labreport_print_Gender" class="view_labreport_print_Gender">
<span<?php echo $view_labreport_print->Gender->viewAttributes() ?>>
<?php echo $view_labreport_print->Gender->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_labreport_print->sid->Visible) { // sid ?>
		<td data-name="sid"<?php echo $view_labreport_print->sid->cellAttributes() ?>>
<span id="el<?php echo $view_labreport_print_list->RowCnt ?>_view_labreport_print_sid" class="view_labreport_print_sid">
<span<?php echo $view_labreport_print->sid->viewAttributes() ?>>
<?php echo $view_labreport_print->sid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_labreport_print->ItemCode->Visible) { // ItemCode ?>
		<td data-name="ItemCode"<?php echo $view_labreport_print->ItemCode->cellAttributes() ?>>
<span id="el<?php echo $view_labreport_print_list->RowCnt ?>_view_labreport_print_ItemCode" class="view_labreport_print_ItemCode">
<span<?php echo $view_labreport_print->ItemCode->viewAttributes() ?>>
<?php echo $view_labreport_print->ItemCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_labreport_print->DEptCd->Visible) { // DEptCd ?>
		<td data-name="DEptCd"<?php echo $view_labreport_print->DEptCd->cellAttributes() ?>>
<span id="el<?php echo $view_labreport_print_list->RowCnt ?>_view_labreport_print_DEptCd" class="view_labreport_print_DEptCd">
<span<?php echo $view_labreport_print->DEptCd->viewAttributes() ?>>
<?php echo $view_labreport_print->DEptCd->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_labreport_print->Resulted->Visible) { // Resulted ?>
		<td data-name="Resulted"<?php echo $view_labreport_print->Resulted->cellAttributes() ?>>
<span id="el<?php echo $view_labreport_print_list->RowCnt ?>_view_labreport_print_Resulted" class="view_labreport_print_Resulted">
<span<?php echo $view_labreport_print->Resulted->viewAttributes() ?>>
<?php echo $view_labreport_print->Resulted->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_labreport_print->Services->Visible) { // Services ?>
		<td data-name="Services"<?php echo $view_labreport_print->Services->cellAttributes() ?>>
<span id="el<?php echo $view_labreport_print_list->RowCnt ?>_view_labreport_print_Services" class="view_labreport_print_Services">
<span<?php echo $view_labreport_print->Services->viewAttributes() ?>>
<?php echo $view_labreport_print->Services->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_labreport_print->Pic1->Visible) { // Pic1 ?>
		<td data-name="Pic1"<?php echo $view_labreport_print->Pic1->cellAttributes() ?>>
<span id="el<?php echo $view_labreport_print_list->RowCnt ?>_view_labreport_print_Pic1" class="view_labreport_print_Pic1">
<span<?php echo $view_labreport_print->Pic1->viewAttributes() ?>>
<?php echo $view_labreport_print->Pic1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_labreport_print->Pic2->Visible) { // Pic2 ?>
		<td data-name="Pic2"<?php echo $view_labreport_print->Pic2->cellAttributes() ?>>
<span id="el<?php echo $view_labreport_print_list->RowCnt ?>_view_labreport_print_Pic2" class="view_labreport_print_Pic2">
<span<?php echo $view_labreport_print->Pic2->viewAttributes() ?>>
<?php echo $view_labreport_print->Pic2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_labreport_print->TestUnit->Visible) { // TestUnit ?>
		<td data-name="TestUnit"<?php echo $view_labreport_print->TestUnit->cellAttributes() ?>>
<span id="el<?php echo $view_labreport_print_list->RowCnt ?>_view_labreport_print_TestUnit" class="view_labreport_print_TestUnit">
<span<?php echo $view_labreport_print->TestUnit->viewAttributes() ?>>
<?php echo $view_labreport_print->TestUnit->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_labreport_print->Order->Visible) { // Order ?>
		<td data-name="Order"<?php echo $view_labreport_print->Order->cellAttributes() ?>>
<span id="el<?php echo $view_labreport_print_list->RowCnt ?>_view_labreport_print_Order" class="view_labreport_print_Order">
<span<?php echo $view_labreport_print->Order->viewAttributes() ?>>
<?php echo $view_labreport_print->Order->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_labreport_print->Repeated->Visible) { // Repeated ?>
		<td data-name="Repeated"<?php echo $view_labreport_print->Repeated->cellAttributes() ?>>
<span id="el<?php echo $view_labreport_print_list->RowCnt ?>_view_labreport_print_Repeated" class="view_labreport_print_Repeated">
<span<?php echo $view_labreport_print->Repeated->viewAttributes() ?>>
<?php echo $view_labreport_print->Repeated->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_labreport_print->Vid->Visible) { // Vid ?>
		<td data-name="Vid"<?php echo $view_labreport_print->Vid->cellAttributes() ?>>
<span id="el<?php echo $view_labreport_print_list->RowCnt ?>_view_labreport_print_Vid" class="view_labreport_print_Vid">
<span<?php echo $view_labreport_print->Vid->viewAttributes() ?>>
<?php echo $view_labreport_print->Vid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_labreport_print->invoiceId->Visible) { // invoiceId ?>
		<td data-name="invoiceId"<?php echo $view_labreport_print->invoiceId->cellAttributes() ?>>
<span id="el<?php echo $view_labreport_print_list->RowCnt ?>_view_labreport_print_invoiceId" class="view_labreport_print_invoiceId">
<span<?php echo $view_labreport_print->invoiceId->viewAttributes() ?>>
<?php echo $view_labreport_print->invoiceId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_labreport_print->DrID->Visible) { // DrID ?>
		<td data-name="DrID"<?php echo $view_labreport_print->DrID->cellAttributes() ?>>
<span id="el<?php echo $view_labreport_print_list->RowCnt ?>_view_labreport_print_DrID" class="view_labreport_print_DrID">
<span<?php echo $view_labreport_print->DrID->viewAttributes() ?>>
<?php echo $view_labreport_print->DrID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_labreport_print->DrCODE->Visible) { // DrCODE ?>
		<td data-name="DrCODE"<?php echo $view_labreport_print->DrCODE->cellAttributes() ?>>
<span id="el<?php echo $view_labreport_print_list->RowCnt ?>_view_labreport_print_DrCODE" class="view_labreport_print_DrCODE">
<span<?php echo $view_labreport_print->DrCODE->viewAttributes() ?>>
<?php echo $view_labreport_print->DrCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_labreport_print->DrName->Visible) { // DrName ?>
		<td data-name="DrName"<?php echo $view_labreport_print->DrName->cellAttributes() ?>>
<span id="el<?php echo $view_labreport_print_list->RowCnt ?>_view_labreport_print_DrName" class="view_labreport_print_DrName">
<span<?php echo $view_labreport_print->DrName->viewAttributes() ?>>
<?php echo $view_labreport_print->DrName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_labreport_print->Department->Visible) { // Department ?>
		<td data-name="Department"<?php echo $view_labreport_print->Department->cellAttributes() ?>>
<span id="el<?php echo $view_labreport_print_list->RowCnt ?>_view_labreport_print_Department" class="view_labreport_print_Department">
<span<?php echo $view_labreport_print->Department->viewAttributes() ?>>
<?php echo $view_labreport_print->Department->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_labreport_print->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $view_labreport_print->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_labreport_print_list->RowCnt ?>_view_labreport_print_createddatetime" class="view_labreport_print_createddatetime">
<span<?php echo $view_labreport_print->createddatetime->viewAttributes() ?>>
<?php echo $view_labreport_print->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_labreport_print->status->Visible) { // status ?>
		<td data-name="status"<?php echo $view_labreport_print->status->cellAttributes() ?>>
<span id="el<?php echo $view_labreport_print_list->RowCnt ?>_view_labreport_print_status" class="view_labreport_print_status">
<span<?php echo $view_labreport_print->status->viewAttributes() ?>>
<?php echo $view_labreport_print->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_labreport_print->TestType->Visible) { // TestType ?>
		<td data-name="TestType"<?php echo $view_labreport_print->TestType->cellAttributes() ?>>
<span id="el<?php echo $view_labreport_print_list->RowCnt ?>_view_labreport_print_TestType" class="view_labreport_print_TestType">
<span<?php echo $view_labreport_print->TestType->viewAttributes() ?>>
<?php echo $view_labreport_print->TestType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_labreport_print->ResultDate->Visible) { // ResultDate ?>
		<td data-name="ResultDate"<?php echo $view_labreport_print->ResultDate->cellAttributes() ?>>
<span id="el<?php echo $view_labreport_print_list->RowCnt ?>_view_labreport_print_ResultDate" class="view_labreport_print_ResultDate">
<span<?php echo $view_labreport_print->ResultDate->viewAttributes() ?>>
<?php echo $view_labreport_print->ResultDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_labreport_print->ResultedBy->Visible) { // ResultedBy ?>
		<td data-name="ResultedBy"<?php echo $view_labreport_print->ResultedBy->cellAttributes() ?>>
<span id="el<?php echo $view_labreport_print_list->RowCnt ?>_view_labreport_print_ResultedBy" class="view_labreport_print_ResultedBy">
<span<?php echo $view_labreport_print->ResultedBy->viewAttributes() ?>>
<?php echo $view_labreport_print->ResultedBy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_labreport_print->Printed->Visible) { // Printed ?>
		<td data-name="Printed"<?php echo $view_labreport_print->Printed->cellAttributes() ?>>
<span id="el<?php echo $view_labreport_print_list->RowCnt ?>_view_labreport_print_Printed" class="view_labreport_print_Printed">
<span<?php echo $view_labreport_print->Printed->viewAttributes() ?>>
<?php echo $view_labreport_print->Printed->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_labreport_print->PrintBy->Visible) { // PrintBy ?>
		<td data-name="PrintBy"<?php echo $view_labreport_print->PrintBy->cellAttributes() ?>>
<span id="el<?php echo $view_labreport_print_list->RowCnt ?>_view_labreport_print_PrintBy" class="view_labreport_print_PrintBy">
<span<?php echo $view_labreport_print->PrintBy->viewAttributes() ?>>
<?php echo $view_labreport_print->PrintBy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_labreport_print->PrintDate->Visible) { // PrintDate ?>
		<td data-name="PrintDate"<?php echo $view_labreport_print->PrintDate->cellAttributes() ?>>
<span id="el<?php echo $view_labreport_print_list->RowCnt ?>_view_labreport_print_PrintDate" class="view_labreport_print_PrintDate">
<span<?php echo $view_labreport_print->PrintDate->viewAttributes() ?>>
<?php echo $view_labreport_print->PrintDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_labreport_print_list->ListOptions->render("body", "right", $view_labreport_print_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_labreport_print->isGridAdd())
		$view_labreport_print_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_labreport_print->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_labreport_print_list->Recordset)
	$view_labreport_print_list->Recordset->Close();
?>
<?php if (!$view_labreport_print->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_labreport_print->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_labreport_print_list->Pager)) $view_labreport_print_list->Pager = new NumericPager($view_labreport_print_list->StartRec, $view_labreport_print_list->DisplayRecs, $view_labreport_print_list->TotalRecs, $view_labreport_print_list->RecRange, $view_labreport_print_list->AutoHidePager) ?>
<?php if ($view_labreport_print_list->Pager->RecordCount > 0 && $view_labreport_print_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_labreport_print_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_labreport_print_list->pageUrl() ?>start=<?php echo $view_labreport_print_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_labreport_print_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_labreport_print_list->pageUrl() ?>start=<?php echo $view_labreport_print_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_labreport_print_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_labreport_print_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_labreport_print_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_labreport_print_list->pageUrl() ?>start=<?php echo $view_labreport_print_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_labreport_print_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_labreport_print_list->pageUrl() ?>start=<?php echo $view_labreport_print_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_labreport_print_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_labreport_print_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_labreport_print_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_labreport_print_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_labreport_print_list->TotalRecs > 0 && (!$view_labreport_print_list->AutoHidePageSizeSelector || $view_labreport_print_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_labreport_print">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_labreport_print_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_labreport_print_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_labreport_print_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_labreport_print_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_labreport_print_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_labreport_print_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_labreport_print->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_labreport_print_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_labreport_print_list->TotalRecs == 0 && !$view_labreport_print->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_labreport_print_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_labreport_print_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_labreport_print->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_labreport_print->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_labreport_print", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_labreport_print_list->terminate();
?>