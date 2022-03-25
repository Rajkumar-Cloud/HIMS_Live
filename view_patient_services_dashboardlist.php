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
$view_patient_services_dashboard_list = new view_patient_services_dashboard_list();

// Run the page
$view_patient_services_dashboard_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_patient_services_dashboard_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_patient_services_dashboard->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_patient_services_dashboardlist = currentForm = new ew.Form("fview_patient_services_dashboardlist", "list");
fview_patient_services_dashboardlist.formKeyCountName = '<?php echo $view_patient_services_dashboard_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_patient_services_dashboardlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_patient_services_dashboardlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fview_patient_services_dashboardlistsrch = currentSearchForm = new ew.Form("fview_patient_services_dashboardlistsrch");

// Filters
fview_patient_services_dashboardlistsrch.filterList = <?php echo $view_patient_services_dashboard_list->getFilterList() ?>;
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
<?php if (!$view_patient_services_dashboard->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_patient_services_dashboard_list->TotalRecs > 0 && $view_patient_services_dashboard_list->ExportOptions->visible()) { ?>
<?php $view_patient_services_dashboard_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_patient_services_dashboard_list->ImportOptions->visible()) { ?>
<?php $view_patient_services_dashboard_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_patient_services_dashboard_list->SearchOptions->visible()) { ?>
<?php $view_patient_services_dashboard_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_patient_services_dashboard_list->FilterOptions->visible()) { ?>
<?php $view_patient_services_dashboard_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_patient_services_dashboard_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_patient_services_dashboard->isExport() && !$view_patient_services_dashboard->CurrentAction) { ?>
<form name="fview_patient_services_dashboardlistsrch" id="fview_patient_services_dashboardlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_patient_services_dashboard_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_patient_services_dashboardlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_patient_services_dashboard">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_patient_services_dashboard_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_patient_services_dashboard_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_patient_services_dashboard_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_patient_services_dashboard_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_patient_services_dashboard_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_patient_services_dashboard_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_patient_services_dashboard_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_patient_services_dashboard_list->showPageHeader(); ?>
<?php
$view_patient_services_dashboard_list->showMessage();
?>
<?php if ($view_patient_services_dashboard_list->TotalRecs > 0 || $view_patient_services_dashboard->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_patient_services_dashboard_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_patient_services_dashboard">
<?php if (!$view_patient_services_dashboard->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_patient_services_dashboard->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_patient_services_dashboard_list->Pager)) $view_patient_services_dashboard_list->Pager = new NumericPager($view_patient_services_dashboard_list->StartRec, $view_patient_services_dashboard_list->DisplayRecs, $view_patient_services_dashboard_list->TotalRecs, $view_patient_services_dashboard_list->RecRange, $view_patient_services_dashboard_list->AutoHidePager) ?>
<?php if ($view_patient_services_dashboard_list->Pager->RecordCount > 0 && $view_patient_services_dashboard_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_patient_services_dashboard_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_patient_services_dashboard_list->pageUrl() ?>start=<?php echo $view_patient_services_dashboard_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_patient_services_dashboard_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_patient_services_dashboard_list->pageUrl() ?>start=<?php echo $view_patient_services_dashboard_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_patient_services_dashboard_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_patient_services_dashboard_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_patient_services_dashboard_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_patient_services_dashboard_list->pageUrl() ?>start=<?php echo $view_patient_services_dashboard_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_patient_services_dashboard_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_patient_services_dashboard_list->pageUrl() ?>start=<?php echo $view_patient_services_dashboard_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_patient_services_dashboard_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_patient_services_dashboard_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_patient_services_dashboard_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_patient_services_dashboard_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_patient_services_dashboard_list->TotalRecs > 0 && (!$view_patient_services_dashboard_list->AutoHidePageSizeSelector || $view_patient_services_dashboard_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_patient_services_dashboard">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_patient_services_dashboard_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_patient_services_dashboard_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_patient_services_dashboard_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_patient_services_dashboard_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_patient_services_dashboard_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_patient_services_dashboard_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_patient_services_dashboard->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_patient_services_dashboard_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_patient_services_dashboardlist" id="fview_patient_services_dashboardlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_patient_services_dashboard_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_patient_services_dashboard_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_patient_services_dashboard">
<div id="gmp_view_patient_services_dashboard" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_patient_services_dashboard_list->TotalRecs > 0 || $view_patient_services_dashboard->isGridEdit()) { ?>
<table id="tbl_view_patient_services_dashboardlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_patient_services_dashboard_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_patient_services_dashboard_list->renderListOptions();

// Render list options (header, left)
$view_patient_services_dashboard_list->ListOptions->render("header", "left");
?>
<?php if ($view_patient_services_dashboard->id->Visible) { // id ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_patient_services_dashboard->id->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_id" class="view_patient_services_dashboard_id"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_patient_services_dashboard->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->id) ?>',1);"><div id="elh_view_patient_services_dashboard_id" class="view_patient_services_dashboard_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->Reception->Visible) { // Reception ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->Reception) == "") { ?>
		<th data-name="Reception" class="<?php echo $view_patient_services_dashboard->Reception->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_Reception" class="view_patient_services_dashboard_Reception"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->Reception->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Reception" class="<?php echo $view_patient_services_dashboard->Reception->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->Reception) ?>',1);"><div id="elh_view_patient_services_dashboard_Reception" class="view_patient_services_dashboard_Reception">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->Reception->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->Reception->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->Reception->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->PatID->Visible) { // PatID ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->PatID) == "") { ?>
		<th data-name="PatID" class="<?php echo $view_patient_services_dashboard->PatID->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_PatID" class="view_patient_services_dashboard_PatID"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->PatID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatID" class="<?php echo $view_patient_services_dashboard->PatID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->PatID) ?>',1);"><div id="elh_view_patient_services_dashboard_PatID" class="view_patient_services_dashboard_PatID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->PatID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->PatID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->PatID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->mrnno->Visible) { // mrnno ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->mrnno) == "") { ?>
		<th data-name="mrnno" class="<?php echo $view_patient_services_dashboard->mrnno->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_mrnno" class="view_patient_services_dashboard_mrnno"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->mrnno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnno" class="<?php echo $view_patient_services_dashboard->mrnno->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->mrnno) ?>',1);"><div id="elh_view_patient_services_dashboard_mrnno" class="view_patient_services_dashboard_mrnno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->mrnno->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->mrnno->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->mrnno->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->PatientName->Visible) { // PatientName ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $view_patient_services_dashboard->PatientName->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_PatientName" class="view_patient_services_dashboard_PatientName"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $view_patient_services_dashboard->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->PatientName) ?>',1);"><div id="elh_view_patient_services_dashboard_PatientName" class="view_patient_services_dashboard_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->Age->Visible) { // Age ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $view_patient_services_dashboard->Age->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_Age" class="view_patient_services_dashboard_Age"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $view_patient_services_dashboard->Age->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->Age) ?>',1);"><div id="elh_view_patient_services_dashboard_Age" class="view_patient_services_dashboard_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->Age->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->Age->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->Age->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->Gender->Visible) { // Gender ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->Gender) == "") { ?>
		<th data-name="Gender" class="<?php echo $view_patient_services_dashboard->Gender->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_Gender" class="view_patient_services_dashboard_Gender"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->Gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gender" class="<?php echo $view_patient_services_dashboard->Gender->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->Gender) ?>',1);"><div id="elh_view_patient_services_dashboard_Gender" class="view_patient_services_dashboard_Gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->Gender->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->Gender->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->Gender->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->Services->Visible) { // Services ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->Services) == "") { ?>
		<th data-name="Services" class="<?php echo $view_patient_services_dashboard->Services->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_Services" class="view_patient_services_dashboard_Services"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->Services->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Services" class="<?php echo $view_patient_services_dashboard->Services->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->Services) ?>',1);"><div id="elh_view_patient_services_dashboard_Services" class="view_patient_services_dashboard_Services">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->Services->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->Services->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->Services->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->Unit->Visible) { // Unit ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->Unit) == "") { ?>
		<th data-name="Unit" class="<?php echo $view_patient_services_dashboard->Unit->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_Unit" class="view_patient_services_dashboard_Unit"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->Unit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Unit" class="<?php echo $view_patient_services_dashboard->Unit->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->Unit) ?>',1);"><div id="elh_view_patient_services_dashboard_Unit" class="view_patient_services_dashboard_Unit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->Unit->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->Unit->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->Unit->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->amount->Visible) { // amount ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->amount) == "") { ?>
		<th data-name="amount" class="<?php echo $view_patient_services_dashboard->amount->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_amount" class="view_patient_services_dashboard_amount"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="amount" class="<?php echo $view_patient_services_dashboard->amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->amount) ?>',1);"><div id="elh_view_patient_services_dashboard_amount" class="view_patient_services_dashboard_amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->amount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->amount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->Quantity->Visible) { // Quantity ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->Quantity) == "") { ?>
		<th data-name="Quantity" class="<?php echo $view_patient_services_dashboard->Quantity->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_Quantity" class="view_patient_services_dashboard_Quantity"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->Quantity->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Quantity" class="<?php echo $view_patient_services_dashboard->Quantity->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->Quantity) ?>',1);"><div id="elh_view_patient_services_dashboard_Quantity" class="view_patient_services_dashboard_Quantity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->Quantity->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->Quantity->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->Quantity->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->Discount->Visible) { // Discount ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->Discount) == "") { ?>
		<th data-name="Discount" class="<?php echo $view_patient_services_dashboard->Discount->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_Discount" class="view_patient_services_dashboard_Discount"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->Discount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Discount" class="<?php echo $view_patient_services_dashboard->Discount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->Discount) ?>',1);"><div id="elh_view_patient_services_dashboard_Discount" class="view_patient_services_dashboard_Discount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->Discount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->Discount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->Discount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->SubTotal->Visible) { // SubTotal ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->SubTotal) == "") { ?>
		<th data-name="SubTotal" class="<?php echo $view_patient_services_dashboard->SubTotal->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_SubTotal" class="view_patient_services_dashboard_SubTotal"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->SubTotal->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SubTotal" class="<?php echo $view_patient_services_dashboard->SubTotal->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->SubTotal) ?>',1);"><div id="elh_view_patient_services_dashboard_SubTotal" class="view_patient_services_dashboard_SubTotal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->SubTotal->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->SubTotal->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->SubTotal->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->patient_type->Visible) { // patient_type ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->patient_type) == "") { ?>
		<th data-name="patient_type" class="<?php echo $view_patient_services_dashboard->patient_type->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_patient_type" class="view_patient_services_dashboard_patient_type"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->patient_type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patient_type" class="<?php echo $view_patient_services_dashboard->patient_type->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->patient_type) ?>',1);"><div id="elh_view_patient_services_dashboard_patient_type" class="view_patient_services_dashboard_patient_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->patient_type->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->patient_type->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->patient_type->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->charged_date->Visible) { // charged_date ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->charged_date) == "") { ?>
		<th data-name="charged_date" class="<?php echo $view_patient_services_dashboard->charged_date->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_charged_date" class="view_patient_services_dashboard_charged_date"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->charged_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="charged_date" class="<?php echo $view_patient_services_dashboard->charged_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->charged_date) ?>',1);"><div id="elh_view_patient_services_dashboard_charged_date" class="view_patient_services_dashboard_charged_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->charged_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->charged_date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->charged_date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->status->Visible) { // status ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->status) == "") { ?>
		<th data-name="status" class="<?php echo $view_patient_services_dashboard->status->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_status" class="view_patient_services_dashboard_status"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $view_patient_services_dashboard->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->status) ?>',1);"><div id="elh_view_patient_services_dashboard_status" class="view_patient_services_dashboard_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->createdby->Visible) { // createdby ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $view_patient_services_dashboard->createdby->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_createdby" class="view_patient_services_dashboard_createdby"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $view_patient_services_dashboard->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->createdby) ?>',1);"><div id="elh_view_patient_services_dashboard_createdby" class="view_patient_services_dashboard_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->createdby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_patient_services_dashboard->createddatetime->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_createddatetime" class="view_patient_services_dashboard_createddatetime"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_patient_services_dashboard->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->createddatetime) ?>',1);"><div id="elh_view_patient_services_dashboard_createddatetime" class="view_patient_services_dashboard_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->modifiedby->Visible) { // modifiedby ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $view_patient_services_dashboard->modifiedby->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_modifiedby" class="view_patient_services_dashboard_modifiedby"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $view_patient_services_dashboard->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->modifiedby) ?>',1);"><div id="elh_view_patient_services_dashboard_modifiedby" class="view_patient_services_dashboard_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->modifiedby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_patient_services_dashboard->modifieddatetime->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_modifieddatetime" class="view_patient_services_dashboard_modifieddatetime"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_patient_services_dashboard->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->modifieddatetime) ?>',1);"><div id="elh_view_patient_services_dashboard_modifieddatetime" class="view_patient_services_dashboard_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->Aid->Visible) { // Aid ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->Aid) == "") { ?>
		<th data-name="Aid" class="<?php echo $view_patient_services_dashboard->Aid->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_Aid" class="view_patient_services_dashboard_Aid"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->Aid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Aid" class="<?php echo $view_patient_services_dashboard->Aid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->Aid) ?>',1);"><div id="elh_view_patient_services_dashboard_Aid" class="view_patient_services_dashboard_Aid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->Aid->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->Aid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->Aid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->Vid->Visible) { // Vid ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->Vid) == "") { ?>
		<th data-name="Vid" class="<?php echo $view_patient_services_dashboard->Vid->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_Vid" class="view_patient_services_dashboard_Vid"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->Vid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Vid" class="<?php echo $view_patient_services_dashboard->Vid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->Vid) ?>',1);"><div id="elh_view_patient_services_dashboard_Vid" class="view_patient_services_dashboard_Vid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->Vid->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->Vid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->Vid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->DrID->Visible) { // DrID ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->DrID) == "") { ?>
		<th data-name="DrID" class="<?php echo $view_patient_services_dashboard->DrID->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_DrID" class="view_patient_services_dashboard_DrID"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->DrID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrID" class="<?php echo $view_patient_services_dashboard->DrID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->DrID) ?>',1);"><div id="elh_view_patient_services_dashboard_DrID" class="view_patient_services_dashboard_DrID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->DrID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->DrID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->DrID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->DrCODE->Visible) { // DrCODE ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->DrCODE) == "") { ?>
		<th data-name="DrCODE" class="<?php echo $view_patient_services_dashboard->DrCODE->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_DrCODE" class="view_patient_services_dashboard_DrCODE"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->DrCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrCODE" class="<?php echo $view_patient_services_dashboard->DrCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->DrCODE) ?>',1);"><div id="elh_view_patient_services_dashboard_DrCODE" class="view_patient_services_dashboard_DrCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->DrCODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->DrCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->DrCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->DrName->Visible) { // DrName ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->DrName) == "") { ?>
		<th data-name="DrName" class="<?php echo $view_patient_services_dashboard->DrName->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_DrName" class="view_patient_services_dashboard_DrName"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->DrName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrName" class="<?php echo $view_patient_services_dashboard->DrName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->DrName) ?>',1);"><div id="elh_view_patient_services_dashboard_DrName" class="view_patient_services_dashboard_DrName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->DrName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->DrName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->DrName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->Department->Visible) { // Department ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->Department) == "") { ?>
		<th data-name="Department" class="<?php echo $view_patient_services_dashboard->Department->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_Department" class="view_patient_services_dashboard_Department"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->Department->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Department" class="<?php echo $view_patient_services_dashboard->Department->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->Department) ?>',1);"><div id="elh_view_patient_services_dashboard_Department" class="view_patient_services_dashboard_Department">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->Department->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->Department->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->Department->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->DrSharePres->Visible) { // DrSharePres ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->DrSharePres) == "") { ?>
		<th data-name="DrSharePres" class="<?php echo $view_patient_services_dashboard->DrSharePres->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_DrSharePres" class="view_patient_services_dashboard_DrSharePres"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->DrSharePres->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrSharePres" class="<?php echo $view_patient_services_dashboard->DrSharePres->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->DrSharePres) ?>',1);"><div id="elh_view_patient_services_dashboard_DrSharePres" class="view_patient_services_dashboard_DrSharePres">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->DrSharePres->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->DrSharePres->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->DrSharePres->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->HospSharePres->Visible) { // HospSharePres ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->HospSharePres) == "") { ?>
		<th data-name="HospSharePres" class="<?php echo $view_patient_services_dashboard->HospSharePres->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_HospSharePres" class="view_patient_services_dashboard_HospSharePres"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->HospSharePres->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospSharePres" class="<?php echo $view_patient_services_dashboard->HospSharePres->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->HospSharePres) ?>',1);"><div id="elh_view_patient_services_dashboard_HospSharePres" class="view_patient_services_dashboard_HospSharePres">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->HospSharePres->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->HospSharePres->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->HospSharePres->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->DrShareAmount->Visible) { // DrShareAmount ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->DrShareAmount) == "") { ?>
		<th data-name="DrShareAmount" class="<?php echo $view_patient_services_dashboard->DrShareAmount->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_DrShareAmount" class="view_patient_services_dashboard_DrShareAmount"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->DrShareAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrShareAmount" class="<?php echo $view_patient_services_dashboard->DrShareAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->DrShareAmount) ?>',1);"><div id="elh_view_patient_services_dashboard_DrShareAmount" class="view_patient_services_dashboard_DrShareAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->DrShareAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->DrShareAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->DrShareAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->HospShareAmount->Visible) { // HospShareAmount ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->HospShareAmount) == "") { ?>
		<th data-name="HospShareAmount" class="<?php echo $view_patient_services_dashboard->HospShareAmount->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_HospShareAmount" class="view_patient_services_dashboard_HospShareAmount"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->HospShareAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospShareAmount" class="<?php echo $view_patient_services_dashboard->HospShareAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->HospShareAmount) ?>',1);"><div id="elh_view_patient_services_dashboard_HospShareAmount" class="view_patient_services_dashboard_HospShareAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->HospShareAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->HospShareAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->HospShareAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->DrShareSettiledAmount->Visible) { // DrShareSettiledAmount ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->DrShareSettiledAmount) == "") { ?>
		<th data-name="DrShareSettiledAmount" class="<?php echo $view_patient_services_dashboard->DrShareSettiledAmount->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_DrShareSettiledAmount" class="view_patient_services_dashboard_DrShareSettiledAmount"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->DrShareSettiledAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrShareSettiledAmount" class="<?php echo $view_patient_services_dashboard->DrShareSettiledAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->DrShareSettiledAmount) ?>',1);"><div id="elh_view_patient_services_dashboard_DrShareSettiledAmount" class="view_patient_services_dashboard_DrShareSettiledAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->DrShareSettiledAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->DrShareSettiledAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->DrShareSettiledAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->DrShareSettledId->Visible) { // DrShareSettledId ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->DrShareSettledId) == "") { ?>
		<th data-name="DrShareSettledId" class="<?php echo $view_patient_services_dashboard->DrShareSettledId->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_DrShareSettledId" class="view_patient_services_dashboard_DrShareSettledId"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->DrShareSettledId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrShareSettledId" class="<?php echo $view_patient_services_dashboard->DrShareSettledId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->DrShareSettledId) ?>',1);"><div id="elh_view_patient_services_dashboard_DrShareSettledId" class="view_patient_services_dashboard_DrShareSettledId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->DrShareSettledId->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->DrShareSettledId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->DrShareSettledId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->DrShareSettiledStatus->Visible) { // DrShareSettiledStatus ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->DrShareSettiledStatus) == "") { ?>
		<th data-name="DrShareSettiledStatus" class="<?php echo $view_patient_services_dashboard->DrShareSettiledStatus->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_DrShareSettiledStatus" class="view_patient_services_dashboard_DrShareSettiledStatus"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->DrShareSettiledStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrShareSettiledStatus" class="<?php echo $view_patient_services_dashboard->DrShareSettiledStatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->DrShareSettiledStatus) ?>',1);"><div id="elh_view_patient_services_dashboard_DrShareSettiledStatus" class="view_patient_services_dashboard_DrShareSettiledStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->DrShareSettiledStatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->DrShareSettiledStatus->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->DrShareSettiledStatus->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->invoiceId->Visible) { // invoiceId ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->invoiceId) == "") { ?>
		<th data-name="invoiceId" class="<?php echo $view_patient_services_dashboard->invoiceId->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_invoiceId" class="view_patient_services_dashboard_invoiceId"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->invoiceId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="invoiceId" class="<?php echo $view_patient_services_dashboard->invoiceId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->invoiceId) ?>',1);"><div id="elh_view_patient_services_dashboard_invoiceId" class="view_patient_services_dashboard_invoiceId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->invoiceId->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->invoiceId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->invoiceId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->invoiceAmount->Visible) { // invoiceAmount ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->invoiceAmount) == "") { ?>
		<th data-name="invoiceAmount" class="<?php echo $view_patient_services_dashboard->invoiceAmount->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_invoiceAmount" class="view_patient_services_dashboard_invoiceAmount"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->invoiceAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="invoiceAmount" class="<?php echo $view_patient_services_dashboard->invoiceAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->invoiceAmount) ?>',1);"><div id="elh_view_patient_services_dashboard_invoiceAmount" class="view_patient_services_dashboard_invoiceAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->invoiceAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->invoiceAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->invoiceAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->invoiceStatus->Visible) { // invoiceStatus ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->invoiceStatus) == "") { ?>
		<th data-name="invoiceStatus" class="<?php echo $view_patient_services_dashboard->invoiceStatus->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_invoiceStatus" class="view_patient_services_dashboard_invoiceStatus"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->invoiceStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="invoiceStatus" class="<?php echo $view_patient_services_dashboard->invoiceStatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->invoiceStatus) ?>',1);"><div id="elh_view_patient_services_dashboard_invoiceStatus" class="view_patient_services_dashboard_invoiceStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->invoiceStatus->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->invoiceStatus->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->invoiceStatus->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->modeOfPayment->Visible) { // modeOfPayment ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->modeOfPayment) == "") { ?>
		<th data-name="modeOfPayment" class="<?php echo $view_patient_services_dashboard->modeOfPayment->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_modeOfPayment" class="view_patient_services_dashboard_modeOfPayment"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->modeOfPayment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modeOfPayment" class="<?php echo $view_patient_services_dashboard->modeOfPayment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->modeOfPayment) ?>',1);"><div id="elh_view_patient_services_dashboard_modeOfPayment" class="view_patient_services_dashboard_modeOfPayment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->modeOfPayment->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->modeOfPayment->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->modeOfPayment->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->HospID->Visible) { // HospID ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_patient_services_dashboard->HospID->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_HospID" class="view_patient_services_dashboard_HospID"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_patient_services_dashboard->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->HospID) ?>',1);"><div id="elh_view_patient_services_dashboard_HospID" class="view_patient_services_dashboard_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->RIDNO->Visible) { // RIDNO ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->RIDNO) == "") { ?>
		<th data-name="RIDNO" class="<?php echo $view_patient_services_dashboard->RIDNO->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_RIDNO" class="view_patient_services_dashboard_RIDNO"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->RIDNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RIDNO" class="<?php echo $view_patient_services_dashboard->RIDNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->RIDNO) ?>',1);"><div id="elh_view_patient_services_dashboard_RIDNO" class="view_patient_services_dashboard_RIDNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->RIDNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->RIDNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->RIDNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->TidNo->Visible) { // TidNo ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->TidNo) == "") { ?>
		<th data-name="TidNo" class="<?php echo $view_patient_services_dashboard->TidNo->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_TidNo" class="view_patient_services_dashboard_TidNo"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->TidNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TidNo" class="<?php echo $view_patient_services_dashboard->TidNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->TidNo) ?>',1);"><div id="elh_view_patient_services_dashboard_TidNo" class="view_patient_services_dashboard_TidNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->TidNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->TidNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->TidNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->DiscountCategory->Visible) { // DiscountCategory ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->DiscountCategory) == "") { ?>
		<th data-name="DiscountCategory" class="<?php echo $view_patient_services_dashboard->DiscountCategory->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_DiscountCategory" class="view_patient_services_dashboard_DiscountCategory"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->DiscountCategory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DiscountCategory" class="<?php echo $view_patient_services_dashboard->DiscountCategory->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->DiscountCategory) ?>',1);"><div id="elh_view_patient_services_dashboard_DiscountCategory" class="view_patient_services_dashboard_DiscountCategory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->DiscountCategory->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->DiscountCategory->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->DiscountCategory->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->sid->Visible) { // sid ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->sid) == "") { ?>
		<th data-name="sid" class="<?php echo $view_patient_services_dashboard->sid->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_sid" class="view_patient_services_dashboard_sid"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->sid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sid" class="<?php echo $view_patient_services_dashboard->sid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->sid) ?>',1);"><div id="elh_view_patient_services_dashboard_sid" class="view_patient_services_dashboard_sid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->sid->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->sid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->sid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->ItemCode->Visible) { // ItemCode ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->ItemCode) == "") { ?>
		<th data-name="ItemCode" class="<?php echo $view_patient_services_dashboard->ItemCode->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_ItemCode" class="view_patient_services_dashboard_ItemCode"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->ItemCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ItemCode" class="<?php echo $view_patient_services_dashboard->ItemCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->ItemCode) ?>',1);"><div id="elh_view_patient_services_dashboard_ItemCode" class="view_patient_services_dashboard_ItemCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->ItemCode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->ItemCode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->ItemCode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->TestSubCd->Visible) { // TestSubCd ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->TestSubCd) == "") { ?>
		<th data-name="TestSubCd" class="<?php echo $view_patient_services_dashboard->TestSubCd->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_TestSubCd" class="view_patient_services_dashboard_TestSubCd"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->TestSubCd->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestSubCd" class="<?php echo $view_patient_services_dashboard->TestSubCd->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->TestSubCd) ?>',1);"><div id="elh_view_patient_services_dashboard_TestSubCd" class="view_patient_services_dashboard_TestSubCd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->TestSubCd->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->TestSubCd->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->TestSubCd->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->DEptCd->Visible) { // DEptCd ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->DEptCd) == "") { ?>
		<th data-name="DEptCd" class="<?php echo $view_patient_services_dashboard->DEptCd->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_DEptCd" class="view_patient_services_dashboard_DEptCd"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->DEptCd->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DEptCd" class="<?php echo $view_patient_services_dashboard->DEptCd->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->DEptCd) ?>',1);"><div id="elh_view_patient_services_dashboard_DEptCd" class="view_patient_services_dashboard_DEptCd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->DEptCd->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->DEptCd->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->DEptCd->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->ProfCd->Visible) { // ProfCd ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->ProfCd) == "") { ?>
		<th data-name="ProfCd" class="<?php echo $view_patient_services_dashboard->ProfCd->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_ProfCd" class="view_patient_services_dashboard_ProfCd"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->ProfCd->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProfCd" class="<?php echo $view_patient_services_dashboard->ProfCd->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->ProfCd) ?>',1);"><div id="elh_view_patient_services_dashboard_ProfCd" class="view_patient_services_dashboard_ProfCd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->ProfCd->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->ProfCd->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->ProfCd->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->Comments->Visible) { // Comments ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->Comments) == "") { ?>
		<th data-name="Comments" class="<?php echo $view_patient_services_dashboard->Comments->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_Comments" class="view_patient_services_dashboard_Comments"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->Comments->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Comments" class="<?php echo $view_patient_services_dashboard->Comments->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->Comments) ?>',1);"><div id="elh_view_patient_services_dashboard_Comments" class="view_patient_services_dashboard_Comments">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->Comments->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->Comments->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->Comments->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->Method->Visible) { // Method ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->Method) == "") { ?>
		<th data-name="Method" class="<?php echo $view_patient_services_dashboard->Method->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_Method" class="view_patient_services_dashboard_Method"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->Method->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Method" class="<?php echo $view_patient_services_dashboard->Method->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->Method) ?>',1);"><div id="elh_view_patient_services_dashboard_Method" class="view_patient_services_dashboard_Method">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->Method->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->Method->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->Method->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->Specimen->Visible) { // Specimen ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->Specimen) == "") { ?>
		<th data-name="Specimen" class="<?php echo $view_patient_services_dashboard->Specimen->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_Specimen" class="view_patient_services_dashboard_Specimen"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->Specimen->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Specimen" class="<?php echo $view_patient_services_dashboard->Specimen->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->Specimen) ?>',1);"><div id="elh_view_patient_services_dashboard_Specimen" class="view_patient_services_dashboard_Specimen">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->Specimen->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->Specimen->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->Specimen->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->Abnormal->Visible) { // Abnormal ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->Abnormal) == "") { ?>
		<th data-name="Abnormal" class="<?php echo $view_patient_services_dashboard->Abnormal->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_Abnormal" class="view_patient_services_dashboard_Abnormal"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->Abnormal->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Abnormal" class="<?php echo $view_patient_services_dashboard->Abnormal->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->Abnormal) ?>',1);"><div id="elh_view_patient_services_dashboard_Abnormal" class="view_patient_services_dashboard_Abnormal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->Abnormal->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->Abnormal->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->Abnormal->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->TestUnit->Visible) { // TestUnit ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->TestUnit) == "") { ?>
		<th data-name="TestUnit" class="<?php echo $view_patient_services_dashboard->TestUnit->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_TestUnit" class="view_patient_services_dashboard_TestUnit"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->TestUnit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestUnit" class="<?php echo $view_patient_services_dashboard->TestUnit->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->TestUnit) ?>',1);"><div id="elh_view_patient_services_dashboard_TestUnit" class="view_patient_services_dashboard_TestUnit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->TestUnit->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->TestUnit->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->TestUnit->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->LOWHIGH->Visible) { // LOWHIGH ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->LOWHIGH) == "") { ?>
		<th data-name="LOWHIGH" class="<?php echo $view_patient_services_dashboard->LOWHIGH->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_LOWHIGH" class="view_patient_services_dashboard_LOWHIGH"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->LOWHIGH->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LOWHIGH" class="<?php echo $view_patient_services_dashboard->LOWHIGH->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->LOWHIGH) ?>',1);"><div id="elh_view_patient_services_dashboard_LOWHIGH" class="view_patient_services_dashboard_LOWHIGH">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->LOWHIGH->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->LOWHIGH->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->LOWHIGH->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->Branch->Visible) { // Branch ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->Branch) == "") { ?>
		<th data-name="Branch" class="<?php echo $view_patient_services_dashboard->Branch->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_Branch" class="view_patient_services_dashboard_Branch"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->Branch->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Branch" class="<?php echo $view_patient_services_dashboard->Branch->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->Branch) ?>',1);"><div id="elh_view_patient_services_dashboard_Branch" class="view_patient_services_dashboard_Branch">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->Branch->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->Branch->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->Branch->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->Dispatch->Visible) { // Dispatch ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->Dispatch) == "") { ?>
		<th data-name="Dispatch" class="<?php echo $view_patient_services_dashboard->Dispatch->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_Dispatch" class="view_patient_services_dashboard_Dispatch"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->Dispatch->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Dispatch" class="<?php echo $view_patient_services_dashboard->Dispatch->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->Dispatch) ?>',1);"><div id="elh_view_patient_services_dashboard_Dispatch" class="view_patient_services_dashboard_Dispatch">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->Dispatch->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->Dispatch->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->Dispatch->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->Pic1->Visible) { // Pic1 ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->Pic1) == "") { ?>
		<th data-name="Pic1" class="<?php echo $view_patient_services_dashboard->Pic1->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_Pic1" class="view_patient_services_dashboard_Pic1"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->Pic1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pic1" class="<?php echo $view_patient_services_dashboard->Pic1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->Pic1) ?>',1);"><div id="elh_view_patient_services_dashboard_Pic1" class="view_patient_services_dashboard_Pic1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->Pic1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->Pic1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->Pic1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->Pic2->Visible) { // Pic2 ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->Pic2) == "") { ?>
		<th data-name="Pic2" class="<?php echo $view_patient_services_dashboard->Pic2->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_Pic2" class="view_patient_services_dashboard_Pic2"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->Pic2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pic2" class="<?php echo $view_patient_services_dashboard->Pic2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->Pic2) ?>',1);"><div id="elh_view_patient_services_dashboard_Pic2" class="view_patient_services_dashboard_Pic2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->Pic2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->Pic2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->Pic2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->GraphPath->Visible) { // GraphPath ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->GraphPath) == "") { ?>
		<th data-name="GraphPath" class="<?php echo $view_patient_services_dashboard->GraphPath->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_GraphPath" class="view_patient_services_dashboard_GraphPath"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->GraphPath->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GraphPath" class="<?php echo $view_patient_services_dashboard->GraphPath->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->GraphPath) ?>',1);"><div id="elh_view_patient_services_dashboard_GraphPath" class="view_patient_services_dashboard_GraphPath">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->GraphPath->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->GraphPath->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->GraphPath->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->MachineCD->Visible) { // MachineCD ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->MachineCD) == "") { ?>
		<th data-name="MachineCD" class="<?php echo $view_patient_services_dashboard->MachineCD->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_MachineCD" class="view_patient_services_dashboard_MachineCD"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->MachineCD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MachineCD" class="<?php echo $view_patient_services_dashboard->MachineCD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->MachineCD) ?>',1);"><div id="elh_view_patient_services_dashboard_MachineCD" class="view_patient_services_dashboard_MachineCD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->MachineCD->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->MachineCD->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->MachineCD->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->TestCancel->Visible) { // TestCancel ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->TestCancel) == "") { ?>
		<th data-name="TestCancel" class="<?php echo $view_patient_services_dashboard->TestCancel->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_TestCancel" class="view_patient_services_dashboard_TestCancel"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->TestCancel->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestCancel" class="<?php echo $view_patient_services_dashboard->TestCancel->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->TestCancel) ?>',1);"><div id="elh_view_patient_services_dashboard_TestCancel" class="view_patient_services_dashboard_TestCancel">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->TestCancel->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->TestCancel->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->TestCancel->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->OutSource->Visible) { // OutSource ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->OutSource) == "") { ?>
		<th data-name="OutSource" class="<?php echo $view_patient_services_dashboard->OutSource->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_OutSource" class="view_patient_services_dashboard_OutSource"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->OutSource->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OutSource" class="<?php echo $view_patient_services_dashboard->OutSource->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->OutSource) ?>',1);"><div id="elh_view_patient_services_dashboard_OutSource" class="view_patient_services_dashboard_OutSource">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->OutSource->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->OutSource->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->OutSource->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->Printed->Visible) { // Printed ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->Printed) == "") { ?>
		<th data-name="Printed" class="<?php echo $view_patient_services_dashboard->Printed->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_Printed" class="view_patient_services_dashboard_Printed"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->Printed->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Printed" class="<?php echo $view_patient_services_dashboard->Printed->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->Printed) ?>',1);"><div id="elh_view_patient_services_dashboard_Printed" class="view_patient_services_dashboard_Printed">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->Printed->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->Printed->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->Printed->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->PrintBy->Visible) { // PrintBy ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->PrintBy) == "") { ?>
		<th data-name="PrintBy" class="<?php echo $view_patient_services_dashboard->PrintBy->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_PrintBy" class="view_patient_services_dashboard_PrintBy"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->PrintBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrintBy" class="<?php echo $view_patient_services_dashboard->PrintBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->PrintBy) ?>',1);"><div id="elh_view_patient_services_dashboard_PrintBy" class="view_patient_services_dashboard_PrintBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->PrintBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->PrintBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->PrintBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->PrintDate->Visible) { // PrintDate ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->PrintDate) == "") { ?>
		<th data-name="PrintDate" class="<?php echo $view_patient_services_dashboard->PrintDate->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_PrintDate" class="view_patient_services_dashboard_PrintDate"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->PrintDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrintDate" class="<?php echo $view_patient_services_dashboard->PrintDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->PrintDate) ?>',1);"><div id="elh_view_patient_services_dashboard_PrintDate" class="view_patient_services_dashboard_PrintDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->PrintDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->PrintDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->PrintDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->BillingDate->Visible) { // BillingDate ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->BillingDate) == "") { ?>
		<th data-name="BillingDate" class="<?php echo $view_patient_services_dashboard->BillingDate->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_BillingDate" class="view_patient_services_dashboard_BillingDate"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->BillingDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillingDate" class="<?php echo $view_patient_services_dashboard->BillingDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->BillingDate) ?>',1);"><div id="elh_view_patient_services_dashboard_BillingDate" class="view_patient_services_dashboard_BillingDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->BillingDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->BillingDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->BillingDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->BilledBy->Visible) { // BilledBy ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->BilledBy) == "") { ?>
		<th data-name="BilledBy" class="<?php echo $view_patient_services_dashboard->BilledBy->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_BilledBy" class="view_patient_services_dashboard_BilledBy"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->BilledBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BilledBy" class="<?php echo $view_patient_services_dashboard->BilledBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->BilledBy) ?>',1);"><div id="elh_view_patient_services_dashboard_BilledBy" class="view_patient_services_dashboard_BilledBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->BilledBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->BilledBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->BilledBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->Resulted->Visible) { // Resulted ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->Resulted) == "") { ?>
		<th data-name="Resulted" class="<?php echo $view_patient_services_dashboard->Resulted->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_Resulted" class="view_patient_services_dashboard_Resulted"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->Resulted->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Resulted" class="<?php echo $view_patient_services_dashboard->Resulted->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->Resulted) ?>',1);"><div id="elh_view_patient_services_dashboard_Resulted" class="view_patient_services_dashboard_Resulted">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->Resulted->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->Resulted->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->Resulted->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->ResultDate->Visible) { // ResultDate ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->ResultDate) == "") { ?>
		<th data-name="ResultDate" class="<?php echo $view_patient_services_dashboard->ResultDate->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_ResultDate" class="view_patient_services_dashboard_ResultDate"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->ResultDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ResultDate" class="<?php echo $view_patient_services_dashboard->ResultDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->ResultDate) ?>',1);"><div id="elh_view_patient_services_dashboard_ResultDate" class="view_patient_services_dashboard_ResultDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->ResultDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->ResultDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->ResultDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->ResultedBy->Visible) { // ResultedBy ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->ResultedBy) == "") { ?>
		<th data-name="ResultedBy" class="<?php echo $view_patient_services_dashboard->ResultedBy->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_ResultedBy" class="view_patient_services_dashboard_ResultedBy"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->ResultedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ResultedBy" class="<?php echo $view_patient_services_dashboard->ResultedBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->ResultedBy) ?>',1);"><div id="elh_view_patient_services_dashboard_ResultedBy" class="view_patient_services_dashboard_ResultedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->ResultedBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->ResultedBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->ResultedBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->SampleDate->Visible) { // SampleDate ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->SampleDate) == "") { ?>
		<th data-name="SampleDate" class="<?php echo $view_patient_services_dashboard->SampleDate->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_SampleDate" class="view_patient_services_dashboard_SampleDate"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->SampleDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SampleDate" class="<?php echo $view_patient_services_dashboard->SampleDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->SampleDate) ?>',1);"><div id="elh_view_patient_services_dashboard_SampleDate" class="view_patient_services_dashboard_SampleDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->SampleDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->SampleDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->SampleDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->SampleUser->Visible) { // SampleUser ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->SampleUser) == "") { ?>
		<th data-name="SampleUser" class="<?php echo $view_patient_services_dashboard->SampleUser->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_SampleUser" class="view_patient_services_dashboard_SampleUser"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->SampleUser->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SampleUser" class="<?php echo $view_patient_services_dashboard->SampleUser->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->SampleUser) ?>',1);"><div id="elh_view_patient_services_dashboard_SampleUser" class="view_patient_services_dashboard_SampleUser">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->SampleUser->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->SampleUser->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->SampleUser->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->Sampled->Visible) { // Sampled ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->Sampled) == "") { ?>
		<th data-name="Sampled" class="<?php echo $view_patient_services_dashboard->Sampled->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_Sampled" class="view_patient_services_dashboard_Sampled"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->Sampled->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Sampled" class="<?php echo $view_patient_services_dashboard->Sampled->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->Sampled) ?>',1);"><div id="elh_view_patient_services_dashboard_Sampled" class="view_patient_services_dashboard_Sampled">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->Sampled->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->Sampled->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->Sampled->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->ReceivedDate->Visible) { // ReceivedDate ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->ReceivedDate) == "") { ?>
		<th data-name="ReceivedDate" class="<?php echo $view_patient_services_dashboard->ReceivedDate->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_ReceivedDate" class="view_patient_services_dashboard_ReceivedDate"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->ReceivedDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReceivedDate" class="<?php echo $view_patient_services_dashboard->ReceivedDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->ReceivedDate) ?>',1);"><div id="elh_view_patient_services_dashboard_ReceivedDate" class="view_patient_services_dashboard_ReceivedDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->ReceivedDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->ReceivedDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->ReceivedDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->ReceivedUser->Visible) { // ReceivedUser ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->ReceivedUser) == "") { ?>
		<th data-name="ReceivedUser" class="<?php echo $view_patient_services_dashboard->ReceivedUser->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_ReceivedUser" class="view_patient_services_dashboard_ReceivedUser"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->ReceivedUser->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReceivedUser" class="<?php echo $view_patient_services_dashboard->ReceivedUser->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->ReceivedUser) ?>',1);"><div id="elh_view_patient_services_dashboard_ReceivedUser" class="view_patient_services_dashboard_ReceivedUser">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->ReceivedUser->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->ReceivedUser->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->ReceivedUser->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->Recevied->Visible) { // Recevied ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->Recevied) == "") { ?>
		<th data-name="Recevied" class="<?php echo $view_patient_services_dashboard->Recevied->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_Recevied" class="view_patient_services_dashboard_Recevied"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->Recevied->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Recevied" class="<?php echo $view_patient_services_dashboard->Recevied->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->Recevied) ?>',1);"><div id="elh_view_patient_services_dashboard_Recevied" class="view_patient_services_dashboard_Recevied">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->Recevied->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->Recevied->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->Recevied->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->DeptRecvDate->Visible) { // DeptRecvDate ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->DeptRecvDate) == "") { ?>
		<th data-name="DeptRecvDate" class="<?php echo $view_patient_services_dashboard->DeptRecvDate->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_DeptRecvDate" class="view_patient_services_dashboard_DeptRecvDate"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->DeptRecvDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DeptRecvDate" class="<?php echo $view_patient_services_dashboard->DeptRecvDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->DeptRecvDate) ?>',1);"><div id="elh_view_patient_services_dashboard_DeptRecvDate" class="view_patient_services_dashboard_DeptRecvDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->DeptRecvDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->DeptRecvDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->DeptRecvDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->DeptRecvUser->Visible) { // DeptRecvUser ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->DeptRecvUser) == "") { ?>
		<th data-name="DeptRecvUser" class="<?php echo $view_patient_services_dashboard->DeptRecvUser->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_DeptRecvUser" class="view_patient_services_dashboard_DeptRecvUser"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->DeptRecvUser->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DeptRecvUser" class="<?php echo $view_patient_services_dashboard->DeptRecvUser->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->DeptRecvUser) ?>',1);"><div id="elh_view_patient_services_dashboard_DeptRecvUser" class="view_patient_services_dashboard_DeptRecvUser">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->DeptRecvUser->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->DeptRecvUser->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->DeptRecvUser->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->DeptRecived->Visible) { // DeptRecived ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->DeptRecived) == "") { ?>
		<th data-name="DeptRecived" class="<?php echo $view_patient_services_dashboard->DeptRecived->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_DeptRecived" class="view_patient_services_dashboard_DeptRecived"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->DeptRecived->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DeptRecived" class="<?php echo $view_patient_services_dashboard->DeptRecived->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->DeptRecived) ?>',1);"><div id="elh_view_patient_services_dashboard_DeptRecived" class="view_patient_services_dashboard_DeptRecived">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->DeptRecived->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->DeptRecived->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->DeptRecived->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->SAuthDate->Visible) { // SAuthDate ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->SAuthDate) == "") { ?>
		<th data-name="SAuthDate" class="<?php echo $view_patient_services_dashboard->SAuthDate->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_SAuthDate" class="view_patient_services_dashboard_SAuthDate"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->SAuthDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SAuthDate" class="<?php echo $view_patient_services_dashboard->SAuthDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->SAuthDate) ?>',1);"><div id="elh_view_patient_services_dashboard_SAuthDate" class="view_patient_services_dashboard_SAuthDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->SAuthDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->SAuthDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->SAuthDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->SAuthBy->Visible) { // SAuthBy ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->SAuthBy) == "") { ?>
		<th data-name="SAuthBy" class="<?php echo $view_patient_services_dashboard->SAuthBy->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_SAuthBy" class="view_patient_services_dashboard_SAuthBy"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->SAuthBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SAuthBy" class="<?php echo $view_patient_services_dashboard->SAuthBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->SAuthBy) ?>',1);"><div id="elh_view_patient_services_dashboard_SAuthBy" class="view_patient_services_dashboard_SAuthBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->SAuthBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->SAuthBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->SAuthBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->SAuthendicate->Visible) { // SAuthendicate ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->SAuthendicate) == "") { ?>
		<th data-name="SAuthendicate" class="<?php echo $view_patient_services_dashboard->SAuthendicate->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_SAuthendicate" class="view_patient_services_dashboard_SAuthendicate"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->SAuthendicate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SAuthendicate" class="<?php echo $view_patient_services_dashboard->SAuthendicate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->SAuthendicate) ?>',1);"><div id="elh_view_patient_services_dashboard_SAuthendicate" class="view_patient_services_dashboard_SAuthendicate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->SAuthendicate->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->SAuthendicate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->SAuthendicate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->AuthDate->Visible) { // AuthDate ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->AuthDate) == "") { ?>
		<th data-name="AuthDate" class="<?php echo $view_patient_services_dashboard->AuthDate->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_AuthDate" class="view_patient_services_dashboard_AuthDate"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->AuthDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AuthDate" class="<?php echo $view_patient_services_dashboard->AuthDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->AuthDate) ?>',1);"><div id="elh_view_patient_services_dashboard_AuthDate" class="view_patient_services_dashboard_AuthDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->AuthDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->AuthDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->AuthDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->AuthBy->Visible) { // AuthBy ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->AuthBy) == "") { ?>
		<th data-name="AuthBy" class="<?php echo $view_patient_services_dashboard->AuthBy->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_AuthBy" class="view_patient_services_dashboard_AuthBy"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->AuthBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AuthBy" class="<?php echo $view_patient_services_dashboard->AuthBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->AuthBy) ?>',1);"><div id="elh_view_patient_services_dashboard_AuthBy" class="view_patient_services_dashboard_AuthBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->AuthBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->AuthBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->AuthBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->Authencate->Visible) { // Authencate ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->Authencate) == "") { ?>
		<th data-name="Authencate" class="<?php echo $view_patient_services_dashboard->Authencate->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_Authencate" class="view_patient_services_dashboard_Authencate"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->Authencate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Authencate" class="<?php echo $view_patient_services_dashboard->Authencate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->Authencate) ?>',1);"><div id="elh_view_patient_services_dashboard_Authencate" class="view_patient_services_dashboard_Authencate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->Authencate->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->Authencate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->Authencate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->EditDate->Visible) { // EditDate ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->EditDate) == "") { ?>
		<th data-name="EditDate" class="<?php echo $view_patient_services_dashboard->EditDate->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_EditDate" class="view_patient_services_dashboard_EditDate"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->EditDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EditDate" class="<?php echo $view_patient_services_dashboard->EditDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->EditDate) ?>',1);"><div id="elh_view_patient_services_dashboard_EditDate" class="view_patient_services_dashboard_EditDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->EditDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->EditDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->EditDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->EditBy->Visible) { // EditBy ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->EditBy) == "") { ?>
		<th data-name="EditBy" class="<?php echo $view_patient_services_dashboard->EditBy->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_EditBy" class="view_patient_services_dashboard_EditBy"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->EditBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EditBy" class="<?php echo $view_patient_services_dashboard->EditBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->EditBy) ?>',1);"><div id="elh_view_patient_services_dashboard_EditBy" class="view_patient_services_dashboard_EditBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->EditBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->EditBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->EditBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->Editted->Visible) { // Editted ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->Editted) == "") { ?>
		<th data-name="Editted" class="<?php echo $view_patient_services_dashboard->Editted->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_Editted" class="view_patient_services_dashboard_Editted"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->Editted->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Editted" class="<?php echo $view_patient_services_dashboard->Editted->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->Editted) ?>',1);"><div id="elh_view_patient_services_dashboard_Editted" class="view_patient_services_dashboard_Editted">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->Editted->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->Editted->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->Editted->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->PatientId->Visible) { // PatientId ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $view_patient_services_dashboard->PatientId->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_PatientId" class="view_patient_services_dashboard_PatientId"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $view_patient_services_dashboard->PatientId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->PatientId) ?>',1);"><div id="elh_view_patient_services_dashboard_PatientId" class="view_patient_services_dashboard_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->PatientId->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->PatientId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->PatientId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->Mobile->Visible) { // Mobile ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->Mobile) == "") { ?>
		<th data-name="Mobile" class="<?php echo $view_patient_services_dashboard->Mobile->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_Mobile" class="view_patient_services_dashboard_Mobile"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->Mobile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mobile" class="<?php echo $view_patient_services_dashboard->Mobile->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->Mobile) ?>',1);"><div id="elh_view_patient_services_dashboard_Mobile" class="view_patient_services_dashboard_Mobile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->Mobile->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->Mobile->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->Mobile->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->CId->Visible) { // CId ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->CId) == "") { ?>
		<th data-name="CId" class="<?php echo $view_patient_services_dashboard->CId->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_CId" class="view_patient_services_dashboard_CId"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->CId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CId" class="<?php echo $view_patient_services_dashboard->CId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->CId) ?>',1);"><div id="elh_view_patient_services_dashboard_CId" class="view_patient_services_dashboard_CId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->CId->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->CId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->CId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->Order->Visible) { // Order ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->Order) == "") { ?>
		<th data-name="Order" class="<?php echo $view_patient_services_dashboard->Order->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_Order" class="view_patient_services_dashboard_Order"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->Order->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Order" class="<?php echo $view_patient_services_dashboard->Order->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->Order) ?>',1);"><div id="elh_view_patient_services_dashboard_Order" class="view_patient_services_dashboard_Order">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->Order->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->Order->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->Order->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->ResType->Visible) { // ResType ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->ResType) == "") { ?>
		<th data-name="ResType" class="<?php echo $view_patient_services_dashboard->ResType->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_ResType" class="view_patient_services_dashboard_ResType"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->ResType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ResType" class="<?php echo $view_patient_services_dashboard->ResType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->ResType) ?>',1);"><div id="elh_view_patient_services_dashboard_ResType" class="view_patient_services_dashboard_ResType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->ResType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->ResType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->ResType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->Sample->Visible) { // Sample ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->Sample) == "") { ?>
		<th data-name="Sample" class="<?php echo $view_patient_services_dashboard->Sample->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_Sample" class="view_patient_services_dashboard_Sample"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->Sample->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Sample" class="<?php echo $view_patient_services_dashboard->Sample->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->Sample) ?>',1);"><div id="elh_view_patient_services_dashboard_Sample" class="view_patient_services_dashboard_Sample">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->Sample->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->Sample->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->Sample->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->NoD->Visible) { // NoD ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->NoD) == "") { ?>
		<th data-name="NoD" class="<?php echo $view_patient_services_dashboard->NoD->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_NoD" class="view_patient_services_dashboard_NoD"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->NoD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoD" class="<?php echo $view_patient_services_dashboard->NoD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->NoD) ?>',1);"><div id="elh_view_patient_services_dashboard_NoD" class="view_patient_services_dashboard_NoD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->NoD->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->NoD->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->NoD->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->BillOrder->Visible) { // BillOrder ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->BillOrder) == "") { ?>
		<th data-name="BillOrder" class="<?php echo $view_patient_services_dashboard->BillOrder->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_BillOrder" class="view_patient_services_dashboard_BillOrder"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->BillOrder->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillOrder" class="<?php echo $view_patient_services_dashboard->BillOrder->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->BillOrder) ?>',1);"><div id="elh_view_patient_services_dashboard_BillOrder" class="view_patient_services_dashboard_BillOrder">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->BillOrder->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->BillOrder->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->BillOrder->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->Inactive->Visible) { // Inactive ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->Inactive) == "") { ?>
		<th data-name="Inactive" class="<?php echo $view_patient_services_dashboard->Inactive->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_Inactive" class="view_patient_services_dashboard_Inactive"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->Inactive->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Inactive" class="<?php echo $view_patient_services_dashboard->Inactive->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->Inactive) ?>',1);"><div id="elh_view_patient_services_dashboard_Inactive" class="view_patient_services_dashboard_Inactive">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->Inactive->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->Inactive->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->Inactive->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->CollSample->Visible) { // CollSample ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->CollSample) == "") { ?>
		<th data-name="CollSample" class="<?php echo $view_patient_services_dashboard->CollSample->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_CollSample" class="view_patient_services_dashboard_CollSample"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->CollSample->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CollSample" class="<?php echo $view_patient_services_dashboard->CollSample->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->CollSample) ?>',1);"><div id="elh_view_patient_services_dashboard_CollSample" class="view_patient_services_dashboard_CollSample">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->CollSample->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->CollSample->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->CollSample->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->TestType->Visible) { // TestType ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->TestType) == "") { ?>
		<th data-name="TestType" class="<?php echo $view_patient_services_dashboard->TestType->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_TestType" class="view_patient_services_dashboard_TestType"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->TestType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestType" class="<?php echo $view_patient_services_dashboard->TestType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->TestType) ?>',1);"><div id="elh_view_patient_services_dashboard_TestType" class="view_patient_services_dashboard_TestType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->TestType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->TestType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->TestType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->Repeated->Visible) { // Repeated ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->Repeated) == "") { ?>
		<th data-name="Repeated" class="<?php echo $view_patient_services_dashboard->Repeated->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_Repeated" class="view_patient_services_dashboard_Repeated"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->Repeated->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Repeated" class="<?php echo $view_patient_services_dashboard->Repeated->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->Repeated) ?>',1);"><div id="elh_view_patient_services_dashboard_Repeated" class="view_patient_services_dashboard_Repeated">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->Repeated->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->Repeated->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->Repeated->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->RepeatedBy->Visible) { // RepeatedBy ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->RepeatedBy) == "") { ?>
		<th data-name="RepeatedBy" class="<?php echo $view_patient_services_dashboard->RepeatedBy->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_RepeatedBy" class="view_patient_services_dashboard_RepeatedBy"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->RepeatedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RepeatedBy" class="<?php echo $view_patient_services_dashboard->RepeatedBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->RepeatedBy) ?>',1);"><div id="elh_view_patient_services_dashboard_RepeatedBy" class="view_patient_services_dashboard_RepeatedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->RepeatedBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->RepeatedBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->RepeatedBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->RepeatedDate->Visible) { // RepeatedDate ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->RepeatedDate) == "") { ?>
		<th data-name="RepeatedDate" class="<?php echo $view_patient_services_dashboard->RepeatedDate->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_RepeatedDate" class="view_patient_services_dashboard_RepeatedDate"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->RepeatedDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RepeatedDate" class="<?php echo $view_patient_services_dashboard->RepeatedDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->RepeatedDate) ?>',1);"><div id="elh_view_patient_services_dashboard_RepeatedDate" class="view_patient_services_dashboard_RepeatedDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->RepeatedDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->RepeatedDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->RepeatedDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->serviceID->Visible) { // serviceID ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->serviceID) == "") { ?>
		<th data-name="serviceID" class="<?php echo $view_patient_services_dashboard->serviceID->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_serviceID" class="view_patient_services_dashboard_serviceID"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->serviceID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="serviceID" class="<?php echo $view_patient_services_dashboard->serviceID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->serviceID) ?>',1);"><div id="elh_view_patient_services_dashboard_serviceID" class="view_patient_services_dashboard_serviceID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->serviceID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->serviceID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->serviceID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->Service_Type->Visible) { // Service_Type ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->Service_Type) == "") { ?>
		<th data-name="Service_Type" class="<?php echo $view_patient_services_dashboard->Service_Type->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_Service_Type" class="view_patient_services_dashboard_Service_Type"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->Service_Type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Service_Type" class="<?php echo $view_patient_services_dashboard->Service_Type->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->Service_Type) ?>',1);"><div id="elh_view_patient_services_dashboard_Service_Type" class="view_patient_services_dashboard_Service_Type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->Service_Type->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->Service_Type->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->Service_Type->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->Service_Department->Visible) { // Service_Department ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->Service_Department) == "") { ?>
		<th data-name="Service_Department" class="<?php echo $view_patient_services_dashboard->Service_Department->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_Service_Department" class="view_patient_services_dashboard_Service_Department"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->Service_Department->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Service_Department" class="<?php echo $view_patient_services_dashboard->Service_Department->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->Service_Department) ?>',1);"><div id="elh_view_patient_services_dashboard_Service_Department" class="view_patient_services_dashboard_Service_Department">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->Service_Department->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->Service_Department->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->Service_Department->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->createdDate->Visible) { // createdDate ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->createdDate) == "") { ?>
		<th data-name="createdDate" class="<?php echo $view_patient_services_dashboard->createdDate->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_createdDate" class="view_patient_services_dashboard_createdDate"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->createdDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdDate" class="<?php echo $view_patient_services_dashboard->createdDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->createdDate) ?>',1);"><div id="elh_view_patient_services_dashboard_createdDate" class="view_patient_services_dashboard_createdDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->createdDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->createdDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->createdDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_services_dashboard->RequestNo->Visible) { // RequestNo ?>
	<?php if ($view_patient_services_dashboard->sortUrl($view_patient_services_dashboard->RequestNo) == "") { ?>
		<th data-name="RequestNo" class="<?php echo $view_patient_services_dashboard->RequestNo->headerCellClass() ?>"><div id="elh_view_patient_services_dashboard_RequestNo" class="view_patient_services_dashboard_RequestNo"><div class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->RequestNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RequestNo" class="<?php echo $view_patient_services_dashboard->RequestNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_services_dashboard->SortUrl($view_patient_services_dashboard->RequestNo) ?>',1);"><div id="elh_view_patient_services_dashboard_RequestNo" class="view_patient_services_dashboard_RequestNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_services_dashboard->RequestNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_services_dashboard->RequestNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_services_dashboard->RequestNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_patient_services_dashboard_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_patient_services_dashboard->ExportAll && $view_patient_services_dashboard->isExport()) {
	$view_patient_services_dashboard_list->StopRec = $view_patient_services_dashboard_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_patient_services_dashboard_list->TotalRecs > $view_patient_services_dashboard_list->StartRec + $view_patient_services_dashboard_list->DisplayRecs - 1)
		$view_patient_services_dashboard_list->StopRec = $view_patient_services_dashboard_list->StartRec + $view_patient_services_dashboard_list->DisplayRecs - 1;
	else
		$view_patient_services_dashboard_list->StopRec = $view_patient_services_dashboard_list->TotalRecs;
}
$view_patient_services_dashboard_list->RecCnt = $view_patient_services_dashboard_list->StartRec - 1;
if ($view_patient_services_dashboard_list->Recordset && !$view_patient_services_dashboard_list->Recordset->EOF) {
	$view_patient_services_dashboard_list->Recordset->moveFirst();
	$selectLimit = $view_patient_services_dashboard_list->UseSelectLimit;
	if (!$selectLimit && $view_patient_services_dashboard_list->StartRec > 1)
		$view_patient_services_dashboard_list->Recordset->move($view_patient_services_dashboard_list->StartRec - 1);
} elseif (!$view_patient_services_dashboard->AllowAddDeleteRow && $view_patient_services_dashboard_list->StopRec == 0) {
	$view_patient_services_dashboard_list->StopRec = $view_patient_services_dashboard->GridAddRowCount;
}

// Initialize aggregate
$view_patient_services_dashboard->RowType = ROWTYPE_AGGREGATEINIT;
$view_patient_services_dashboard->resetAttributes();
$view_patient_services_dashboard_list->renderRow();
while ($view_patient_services_dashboard_list->RecCnt < $view_patient_services_dashboard_list->StopRec) {
	$view_patient_services_dashboard_list->RecCnt++;
	if ($view_patient_services_dashboard_list->RecCnt >= $view_patient_services_dashboard_list->StartRec) {
		$view_patient_services_dashboard_list->RowCnt++;

		// Set up key count
		$view_patient_services_dashboard_list->KeyCount = $view_patient_services_dashboard_list->RowIndex;

		// Init row class and style
		$view_patient_services_dashboard->resetAttributes();
		$view_patient_services_dashboard->CssClass = "";
		if ($view_patient_services_dashboard->isGridAdd()) {
		} else {
			$view_patient_services_dashboard_list->loadRowValues($view_patient_services_dashboard_list->Recordset); // Load row values
		}
		$view_patient_services_dashboard->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_patient_services_dashboard->RowAttrs = array_merge($view_patient_services_dashboard->RowAttrs, array('data-rowindex'=>$view_patient_services_dashboard_list->RowCnt, 'id'=>'r' . $view_patient_services_dashboard_list->RowCnt . '_view_patient_services_dashboard', 'data-rowtype'=>$view_patient_services_dashboard->RowType));

		// Render row
		$view_patient_services_dashboard_list->renderRow();

		// Render list options
		$view_patient_services_dashboard_list->renderListOptions();
?>
	<tr<?php echo $view_patient_services_dashboard->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_patient_services_dashboard_list->ListOptions->render("body", "left", $view_patient_services_dashboard_list->RowCnt);
?>
	<?php if ($view_patient_services_dashboard->id->Visible) { // id ?>
		<td data-name="id"<?php echo $view_patient_services_dashboard->id->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_id" class="view_patient_services_dashboard_id">
<span<?php echo $view_patient_services_dashboard->id->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->Reception->Visible) { // Reception ?>
		<td data-name="Reception"<?php echo $view_patient_services_dashboard->Reception->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_Reception" class="view_patient_services_dashboard_Reception">
<span<?php echo $view_patient_services_dashboard->Reception->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->Reception->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->PatID->Visible) { // PatID ?>
		<td data-name="PatID"<?php echo $view_patient_services_dashboard->PatID->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_PatID" class="view_patient_services_dashboard_PatID">
<span<?php echo $view_patient_services_dashboard->PatID->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->PatID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno"<?php echo $view_patient_services_dashboard->mrnno->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_mrnno" class="view_patient_services_dashboard_mrnno">
<span<?php echo $view_patient_services_dashboard->mrnno->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->mrnno->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $view_patient_services_dashboard->PatientName->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_PatientName" class="view_patient_services_dashboard_PatientName">
<span<?php echo $view_patient_services_dashboard->PatientName->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->Age->Visible) { // Age ?>
		<td data-name="Age"<?php echo $view_patient_services_dashboard->Age->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_Age" class="view_patient_services_dashboard_Age">
<span<?php echo $view_patient_services_dashboard->Age->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->Age->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->Gender->Visible) { // Gender ?>
		<td data-name="Gender"<?php echo $view_patient_services_dashboard->Gender->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_Gender" class="view_patient_services_dashboard_Gender">
<span<?php echo $view_patient_services_dashboard->Gender->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->Gender->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->Services->Visible) { // Services ?>
		<td data-name="Services"<?php echo $view_patient_services_dashboard->Services->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_Services" class="view_patient_services_dashboard_Services">
<span<?php echo $view_patient_services_dashboard->Services->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->Services->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->Unit->Visible) { // Unit ?>
		<td data-name="Unit"<?php echo $view_patient_services_dashboard->Unit->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_Unit" class="view_patient_services_dashboard_Unit">
<span<?php echo $view_patient_services_dashboard->Unit->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->Unit->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->amount->Visible) { // amount ?>
		<td data-name="amount"<?php echo $view_patient_services_dashboard->amount->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_amount" class="view_patient_services_dashboard_amount">
<span<?php echo $view_patient_services_dashboard->amount->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->amount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity"<?php echo $view_patient_services_dashboard->Quantity->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_Quantity" class="view_patient_services_dashboard_Quantity">
<span<?php echo $view_patient_services_dashboard->Quantity->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->Quantity->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->Discount->Visible) { // Discount ?>
		<td data-name="Discount"<?php echo $view_patient_services_dashboard->Discount->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_Discount" class="view_patient_services_dashboard_Discount">
<span<?php echo $view_patient_services_dashboard->Discount->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->Discount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->SubTotal->Visible) { // SubTotal ?>
		<td data-name="SubTotal"<?php echo $view_patient_services_dashboard->SubTotal->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_SubTotal" class="view_patient_services_dashboard_SubTotal">
<span<?php echo $view_patient_services_dashboard->SubTotal->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->SubTotal->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->patient_type->Visible) { // patient_type ?>
		<td data-name="patient_type"<?php echo $view_patient_services_dashboard->patient_type->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_patient_type" class="view_patient_services_dashboard_patient_type">
<span<?php echo $view_patient_services_dashboard->patient_type->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->patient_type->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->charged_date->Visible) { // charged_date ?>
		<td data-name="charged_date"<?php echo $view_patient_services_dashboard->charged_date->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_charged_date" class="view_patient_services_dashboard_charged_date">
<span<?php echo $view_patient_services_dashboard->charged_date->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->charged_date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->status->Visible) { // status ?>
		<td data-name="status"<?php echo $view_patient_services_dashboard->status->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_status" class="view_patient_services_dashboard_status">
<span<?php echo $view_patient_services_dashboard->status->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $view_patient_services_dashboard->createdby->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_createdby" class="view_patient_services_dashboard_createdby">
<span<?php echo $view_patient_services_dashboard->createdby->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $view_patient_services_dashboard->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_createddatetime" class="view_patient_services_dashboard_createddatetime">
<span<?php echo $view_patient_services_dashboard->createddatetime->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $view_patient_services_dashboard->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_modifiedby" class="view_patient_services_dashboard_modifiedby">
<span<?php echo $view_patient_services_dashboard->modifiedby->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $view_patient_services_dashboard->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_modifieddatetime" class="view_patient_services_dashboard_modifieddatetime">
<span<?php echo $view_patient_services_dashboard->modifieddatetime->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->Aid->Visible) { // Aid ?>
		<td data-name="Aid"<?php echo $view_patient_services_dashboard->Aid->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_Aid" class="view_patient_services_dashboard_Aid">
<span<?php echo $view_patient_services_dashboard->Aid->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->Aid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->Vid->Visible) { // Vid ?>
		<td data-name="Vid"<?php echo $view_patient_services_dashboard->Vid->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_Vid" class="view_patient_services_dashboard_Vid">
<span<?php echo $view_patient_services_dashboard->Vid->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->Vid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->DrID->Visible) { // DrID ?>
		<td data-name="DrID"<?php echo $view_patient_services_dashboard->DrID->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_DrID" class="view_patient_services_dashboard_DrID">
<span<?php echo $view_patient_services_dashboard->DrID->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->DrID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->DrCODE->Visible) { // DrCODE ?>
		<td data-name="DrCODE"<?php echo $view_patient_services_dashboard->DrCODE->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_DrCODE" class="view_patient_services_dashboard_DrCODE">
<span<?php echo $view_patient_services_dashboard->DrCODE->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->DrCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->DrName->Visible) { // DrName ?>
		<td data-name="DrName"<?php echo $view_patient_services_dashboard->DrName->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_DrName" class="view_patient_services_dashboard_DrName">
<span<?php echo $view_patient_services_dashboard->DrName->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->DrName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->Department->Visible) { // Department ?>
		<td data-name="Department"<?php echo $view_patient_services_dashboard->Department->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_Department" class="view_patient_services_dashboard_Department">
<span<?php echo $view_patient_services_dashboard->Department->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->Department->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->DrSharePres->Visible) { // DrSharePres ?>
		<td data-name="DrSharePres"<?php echo $view_patient_services_dashboard->DrSharePres->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_DrSharePres" class="view_patient_services_dashboard_DrSharePres">
<span<?php echo $view_patient_services_dashboard->DrSharePres->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->DrSharePres->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->HospSharePres->Visible) { // HospSharePres ?>
		<td data-name="HospSharePres"<?php echo $view_patient_services_dashboard->HospSharePres->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_HospSharePres" class="view_patient_services_dashboard_HospSharePres">
<span<?php echo $view_patient_services_dashboard->HospSharePres->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->HospSharePres->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->DrShareAmount->Visible) { // DrShareAmount ?>
		<td data-name="DrShareAmount"<?php echo $view_patient_services_dashboard->DrShareAmount->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_DrShareAmount" class="view_patient_services_dashboard_DrShareAmount">
<span<?php echo $view_patient_services_dashboard->DrShareAmount->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->DrShareAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->HospShareAmount->Visible) { // HospShareAmount ?>
		<td data-name="HospShareAmount"<?php echo $view_patient_services_dashboard->HospShareAmount->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_HospShareAmount" class="view_patient_services_dashboard_HospShareAmount">
<span<?php echo $view_patient_services_dashboard->HospShareAmount->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->HospShareAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->DrShareSettiledAmount->Visible) { // DrShareSettiledAmount ?>
		<td data-name="DrShareSettiledAmount"<?php echo $view_patient_services_dashboard->DrShareSettiledAmount->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_DrShareSettiledAmount" class="view_patient_services_dashboard_DrShareSettiledAmount">
<span<?php echo $view_patient_services_dashboard->DrShareSettiledAmount->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->DrShareSettiledAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->DrShareSettledId->Visible) { // DrShareSettledId ?>
		<td data-name="DrShareSettledId"<?php echo $view_patient_services_dashboard->DrShareSettledId->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_DrShareSettledId" class="view_patient_services_dashboard_DrShareSettledId">
<span<?php echo $view_patient_services_dashboard->DrShareSettledId->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->DrShareSettledId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->DrShareSettiledStatus->Visible) { // DrShareSettiledStatus ?>
		<td data-name="DrShareSettiledStatus"<?php echo $view_patient_services_dashboard->DrShareSettiledStatus->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_DrShareSettiledStatus" class="view_patient_services_dashboard_DrShareSettiledStatus">
<span<?php echo $view_patient_services_dashboard->DrShareSettiledStatus->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->DrShareSettiledStatus->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->invoiceId->Visible) { // invoiceId ?>
		<td data-name="invoiceId"<?php echo $view_patient_services_dashboard->invoiceId->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_invoiceId" class="view_patient_services_dashboard_invoiceId">
<span<?php echo $view_patient_services_dashboard->invoiceId->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->invoiceId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->invoiceAmount->Visible) { // invoiceAmount ?>
		<td data-name="invoiceAmount"<?php echo $view_patient_services_dashboard->invoiceAmount->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_invoiceAmount" class="view_patient_services_dashboard_invoiceAmount">
<span<?php echo $view_patient_services_dashboard->invoiceAmount->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->invoiceAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->invoiceStatus->Visible) { // invoiceStatus ?>
		<td data-name="invoiceStatus"<?php echo $view_patient_services_dashboard->invoiceStatus->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_invoiceStatus" class="view_patient_services_dashboard_invoiceStatus">
<span<?php echo $view_patient_services_dashboard->invoiceStatus->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->invoiceStatus->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->modeOfPayment->Visible) { // modeOfPayment ?>
		<td data-name="modeOfPayment"<?php echo $view_patient_services_dashboard->modeOfPayment->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_modeOfPayment" class="view_patient_services_dashboard_modeOfPayment">
<span<?php echo $view_patient_services_dashboard->modeOfPayment->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->modeOfPayment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_patient_services_dashboard->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_HospID" class="view_patient_services_dashboard_HospID">
<span<?php echo $view_patient_services_dashboard->HospID->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->RIDNO->Visible) { // RIDNO ?>
		<td data-name="RIDNO"<?php echo $view_patient_services_dashboard->RIDNO->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_RIDNO" class="view_patient_services_dashboard_RIDNO">
<span<?php echo $view_patient_services_dashboard->RIDNO->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->RIDNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo"<?php echo $view_patient_services_dashboard->TidNo->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_TidNo" class="view_patient_services_dashboard_TidNo">
<span<?php echo $view_patient_services_dashboard->TidNo->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->TidNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->DiscountCategory->Visible) { // DiscountCategory ?>
		<td data-name="DiscountCategory"<?php echo $view_patient_services_dashboard->DiscountCategory->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_DiscountCategory" class="view_patient_services_dashboard_DiscountCategory">
<span<?php echo $view_patient_services_dashboard->DiscountCategory->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->DiscountCategory->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->sid->Visible) { // sid ?>
		<td data-name="sid"<?php echo $view_patient_services_dashboard->sid->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_sid" class="view_patient_services_dashboard_sid">
<span<?php echo $view_patient_services_dashboard->sid->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->sid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->ItemCode->Visible) { // ItemCode ?>
		<td data-name="ItemCode"<?php echo $view_patient_services_dashboard->ItemCode->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_ItemCode" class="view_patient_services_dashboard_ItemCode">
<span<?php echo $view_patient_services_dashboard->ItemCode->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->ItemCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->TestSubCd->Visible) { // TestSubCd ?>
		<td data-name="TestSubCd"<?php echo $view_patient_services_dashboard->TestSubCd->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_TestSubCd" class="view_patient_services_dashboard_TestSubCd">
<span<?php echo $view_patient_services_dashboard->TestSubCd->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->TestSubCd->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->DEptCd->Visible) { // DEptCd ?>
		<td data-name="DEptCd"<?php echo $view_patient_services_dashboard->DEptCd->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_DEptCd" class="view_patient_services_dashboard_DEptCd">
<span<?php echo $view_patient_services_dashboard->DEptCd->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->DEptCd->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->ProfCd->Visible) { // ProfCd ?>
		<td data-name="ProfCd"<?php echo $view_patient_services_dashboard->ProfCd->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_ProfCd" class="view_patient_services_dashboard_ProfCd">
<span<?php echo $view_patient_services_dashboard->ProfCd->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->ProfCd->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->Comments->Visible) { // Comments ?>
		<td data-name="Comments"<?php echo $view_patient_services_dashboard->Comments->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_Comments" class="view_patient_services_dashboard_Comments">
<span<?php echo $view_patient_services_dashboard->Comments->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->Comments->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->Method->Visible) { // Method ?>
		<td data-name="Method"<?php echo $view_patient_services_dashboard->Method->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_Method" class="view_patient_services_dashboard_Method">
<span<?php echo $view_patient_services_dashboard->Method->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->Method->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->Specimen->Visible) { // Specimen ?>
		<td data-name="Specimen"<?php echo $view_patient_services_dashboard->Specimen->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_Specimen" class="view_patient_services_dashboard_Specimen">
<span<?php echo $view_patient_services_dashboard->Specimen->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->Specimen->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->Abnormal->Visible) { // Abnormal ?>
		<td data-name="Abnormal"<?php echo $view_patient_services_dashboard->Abnormal->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_Abnormal" class="view_patient_services_dashboard_Abnormal">
<span<?php echo $view_patient_services_dashboard->Abnormal->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->Abnormal->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->TestUnit->Visible) { // TestUnit ?>
		<td data-name="TestUnit"<?php echo $view_patient_services_dashboard->TestUnit->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_TestUnit" class="view_patient_services_dashboard_TestUnit">
<span<?php echo $view_patient_services_dashboard->TestUnit->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->TestUnit->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->LOWHIGH->Visible) { // LOWHIGH ?>
		<td data-name="LOWHIGH"<?php echo $view_patient_services_dashboard->LOWHIGH->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_LOWHIGH" class="view_patient_services_dashboard_LOWHIGH">
<span<?php echo $view_patient_services_dashboard->LOWHIGH->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->LOWHIGH->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->Branch->Visible) { // Branch ?>
		<td data-name="Branch"<?php echo $view_patient_services_dashboard->Branch->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_Branch" class="view_patient_services_dashboard_Branch">
<span<?php echo $view_patient_services_dashboard->Branch->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->Branch->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->Dispatch->Visible) { // Dispatch ?>
		<td data-name="Dispatch"<?php echo $view_patient_services_dashboard->Dispatch->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_Dispatch" class="view_patient_services_dashboard_Dispatch">
<span<?php echo $view_patient_services_dashboard->Dispatch->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->Dispatch->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->Pic1->Visible) { // Pic1 ?>
		<td data-name="Pic1"<?php echo $view_patient_services_dashboard->Pic1->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_Pic1" class="view_patient_services_dashboard_Pic1">
<span<?php echo $view_patient_services_dashboard->Pic1->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->Pic1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->Pic2->Visible) { // Pic2 ?>
		<td data-name="Pic2"<?php echo $view_patient_services_dashboard->Pic2->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_Pic2" class="view_patient_services_dashboard_Pic2">
<span<?php echo $view_patient_services_dashboard->Pic2->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->Pic2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->GraphPath->Visible) { // GraphPath ?>
		<td data-name="GraphPath"<?php echo $view_patient_services_dashboard->GraphPath->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_GraphPath" class="view_patient_services_dashboard_GraphPath">
<span<?php echo $view_patient_services_dashboard->GraphPath->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->GraphPath->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->MachineCD->Visible) { // MachineCD ?>
		<td data-name="MachineCD"<?php echo $view_patient_services_dashboard->MachineCD->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_MachineCD" class="view_patient_services_dashboard_MachineCD">
<span<?php echo $view_patient_services_dashboard->MachineCD->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->MachineCD->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->TestCancel->Visible) { // TestCancel ?>
		<td data-name="TestCancel"<?php echo $view_patient_services_dashboard->TestCancel->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_TestCancel" class="view_patient_services_dashboard_TestCancel">
<span<?php echo $view_patient_services_dashboard->TestCancel->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->TestCancel->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->OutSource->Visible) { // OutSource ?>
		<td data-name="OutSource"<?php echo $view_patient_services_dashboard->OutSource->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_OutSource" class="view_patient_services_dashboard_OutSource">
<span<?php echo $view_patient_services_dashboard->OutSource->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->OutSource->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->Printed->Visible) { // Printed ?>
		<td data-name="Printed"<?php echo $view_patient_services_dashboard->Printed->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_Printed" class="view_patient_services_dashboard_Printed">
<span<?php echo $view_patient_services_dashboard->Printed->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->Printed->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->PrintBy->Visible) { // PrintBy ?>
		<td data-name="PrintBy"<?php echo $view_patient_services_dashboard->PrintBy->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_PrintBy" class="view_patient_services_dashboard_PrintBy">
<span<?php echo $view_patient_services_dashboard->PrintBy->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->PrintBy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->PrintDate->Visible) { // PrintDate ?>
		<td data-name="PrintDate"<?php echo $view_patient_services_dashboard->PrintDate->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_PrintDate" class="view_patient_services_dashboard_PrintDate">
<span<?php echo $view_patient_services_dashboard->PrintDate->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->PrintDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->BillingDate->Visible) { // BillingDate ?>
		<td data-name="BillingDate"<?php echo $view_patient_services_dashboard->BillingDate->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_BillingDate" class="view_patient_services_dashboard_BillingDate">
<span<?php echo $view_patient_services_dashboard->BillingDate->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->BillingDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->BilledBy->Visible) { // BilledBy ?>
		<td data-name="BilledBy"<?php echo $view_patient_services_dashboard->BilledBy->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_BilledBy" class="view_patient_services_dashboard_BilledBy">
<span<?php echo $view_patient_services_dashboard->BilledBy->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->BilledBy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->Resulted->Visible) { // Resulted ?>
		<td data-name="Resulted"<?php echo $view_patient_services_dashboard->Resulted->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_Resulted" class="view_patient_services_dashboard_Resulted">
<span<?php echo $view_patient_services_dashboard->Resulted->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->Resulted->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->ResultDate->Visible) { // ResultDate ?>
		<td data-name="ResultDate"<?php echo $view_patient_services_dashboard->ResultDate->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_ResultDate" class="view_patient_services_dashboard_ResultDate">
<span<?php echo $view_patient_services_dashboard->ResultDate->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->ResultDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->ResultedBy->Visible) { // ResultedBy ?>
		<td data-name="ResultedBy"<?php echo $view_patient_services_dashboard->ResultedBy->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_ResultedBy" class="view_patient_services_dashboard_ResultedBy">
<span<?php echo $view_patient_services_dashboard->ResultedBy->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->ResultedBy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->SampleDate->Visible) { // SampleDate ?>
		<td data-name="SampleDate"<?php echo $view_patient_services_dashboard->SampleDate->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_SampleDate" class="view_patient_services_dashboard_SampleDate">
<span<?php echo $view_patient_services_dashboard->SampleDate->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->SampleDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->SampleUser->Visible) { // SampleUser ?>
		<td data-name="SampleUser"<?php echo $view_patient_services_dashboard->SampleUser->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_SampleUser" class="view_patient_services_dashboard_SampleUser">
<span<?php echo $view_patient_services_dashboard->SampleUser->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->SampleUser->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->Sampled->Visible) { // Sampled ?>
		<td data-name="Sampled"<?php echo $view_patient_services_dashboard->Sampled->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_Sampled" class="view_patient_services_dashboard_Sampled">
<span<?php echo $view_patient_services_dashboard->Sampled->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->Sampled->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->ReceivedDate->Visible) { // ReceivedDate ?>
		<td data-name="ReceivedDate"<?php echo $view_patient_services_dashboard->ReceivedDate->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_ReceivedDate" class="view_patient_services_dashboard_ReceivedDate">
<span<?php echo $view_patient_services_dashboard->ReceivedDate->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->ReceivedDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->ReceivedUser->Visible) { // ReceivedUser ?>
		<td data-name="ReceivedUser"<?php echo $view_patient_services_dashboard->ReceivedUser->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_ReceivedUser" class="view_patient_services_dashboard_ReceivedUser">
<span<?php echo $view_patient_services_dashboard->ReceivedUser->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->ReceivedUser->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->Recevied->Visible) { // Recevied ?>
		<td data-name="Recevied"<?php echo $view_patient_services_dashboard->Recevied->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_Recevied" class="view_patient_services_dashboard_Recevied">
<span<?php echo $view_patient_services_dashboard->Recevied->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->Recevied->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->DeptRecvDate->Visible) { // DeptRecvDate ?>
		<td data-name="DeptRecvDate"<?php echo $view_patient_services_dashboard->DeptRecvDate->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_DeptRecvDate" class="view_patient_services_dashboard_DeptRecvDate">
<span<?php echo $view_patient_services_dashboard->DeptRecvDate->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->DeptRecvDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->DeptRecvUser->Visible) { // DeptRecvUser ?>
		<td data-name="DeptRecvUser"<?php echo $view_patient_services_dashboard->DeptRecvUser->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_DeptRecvUser" class="view_patient_services_dashboard_DeptRecvUser">
<span<?php echo $view_patient_services_dashboard->DeptRecvUser->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->DeptRecvUser->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->DeptRecived->Visible) { // DeptRecived ?>
		<td data-name="DeptRecived"<?php echo $view_patient_services_dashboard->DeptRecived->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_DeptRecived" class="view_patient_services_dashboard_DeptRecived">
<span<?php echo $view_patient_services_dashboard->DeptRecived->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->DeptRecived->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->SAuthDate->Visible) { // SAuthDate ?>
		<td data-name="SAuthDate"<?php echo $view_patient_services_dashboard->SAuthDate->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_SAuthDate" class="view_patient_services_dashboard_SAuthDate">
<span<?php echo $view_patient_services_dashboard->SAuthDate->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->SAuthDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->SAuthBy->Visible) { // SAuthBy ?>
		<td data-name="SAuthBy"<?php echo $view_patient_services_dashboard->SAuthBy->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_SAuthBy" class="view_patient_services_dashboard_SAuthBy">
<span<?php echo $view_patient_services_dashboard->SAuthBy->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->SAuthBy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->SAuthendicate->Visible) { // SAuthendicate ?>
		<td data-name="SAuthendicate"<?php echo $view_patient_services_dashboard->SAuthendicate->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_SAuthendicate" class="view_patient_services_dashboard_SAuthendicate">
<span<?php echo $view_patient_services_dashboard->SAuthendicate->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->SAuthendicate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->AuthDate->Visible) { // AuthDate ?>
		<td data-name="AuthDate"<?php echo $view_patient_services_dashboard->AuthDate->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_AuthDate" class="view_patient_services_dashboard_AuthDate">
<span<?php echo $view_patient_services_dashboard->AuthDate->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->AuthDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->AuthBy->Visible) { // AuthBy ?>
		<td data-name="AuthBy"<?php echo $view_patient_services_dashboard->AuthBy->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_AuthBy" class="view_patient_services_dashboard_AuthBy">
<span<?php echo $view_patient_services_dashboard->AuthBy->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->AuthBy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->Authencate->Visible) { // Authencate ?>
		<td data-name="Authencate"<?php echo $view_patient_services_dashboard->Authencate->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_Authencate" class="view_patient_services_dashboard_Authencate">
<span<?php echo $view_patient_services_dashboard->Authencate->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->Authencate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->EditDate->Visible) { // EditDate ?>
		<td data-name="EditDate"<?php echo $view_patient_services_dashboard->EditDate->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_EditDate" class="view_patient_services_dashboard_EditDate">
<span<?php echo $view_patient_services_dashboard->EditDate->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->EditDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->EditBy->Visible) { // EditBy ?>
		<td data-name="EditBy"<?php echo $view_patient_services_dashboard->EditBy->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_EditBy" class="view_patient_services_dashboard_EditBy">
<span<?php echo $view_patient_services_dashboard->EditBy->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->EditBy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->Editted->Visible) { // Editted ?>
		<td data-name="Editted"<?php echo $view_patient_services_dashboard->Editted->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_Editted" class="view_patient_services_dashboard_Editted">
<span<?php echo $view_patient_services_dashboard->Editted->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->Editted->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId"<?php echo $view_patient_services_dashboard->PatientId->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_PatientId" class="view_patient_services_dashboard_PatientId">
<span<?php echo $view_patient_services_dashboard->PatientId->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->PatientId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile"<?php echo $view_patient_services_dashboard->Mobile->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_Mobile" class="view_patient_services_dashboard_Mobile">
<span<?php echo $view_patient_services_dashboard->Mobile->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->Mobile->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->CId->Visible) { // CId ?>
		<td data-name="CId"<?php echo $view_patient_services_dashboard->CId->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_CId" class="view_patient_services_dashboard_CId">
<span<?php echo $view_patient_services_dashboard->CId->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->CId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->Order->Visible) { // Order ?>
		<td data-name="Order"<?php echo $view_patient_services_dashboard->Order->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_Order" class="view_patient_services_dashboard_Order">
<span<?php echo $view_patient_services_dashboard->Order->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->Order->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->ResType->Visible) { // ResType ?>
		<td data-name="ResType"<?php echo $view_patient_services_dashboard->ResType->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_ResType" class="view_patient_services_dashboard_ResType">
<span<?php echo $view_patient_services_dashboard->ResType->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->ResType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->Sample->Visible) { // Sample ?>
		<td data-name="Sample"<?php echo $view_patient_services_dashboard->Sample->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_Sample" class="view_patient_services_dashboard_Sample">
<span<?php echo $view_patient_services_dashboard->Sample->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->Sample->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->NoD->Visible) { // NoD ?>
		<td data-name="NoD"<?php echo $view_patient_services_dashboard->NoD->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_NoD" class="view_patient_services_dashboard_NoD">
<span<?php echo $view_patient_services_dashboard->NoD->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->NoD->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->BillOrder->Visible) { // BillOrder ?>
		<td data-name="BillOrder"<?php echo $view_patient_services_dashboard->BillOrder->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_BillOrder" class="view_patient_services_dashboard_BillOrder">
<span<?php echo $view_patient_services_dashboard->BillOrder->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->BillOrder->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->Inactive->Visible) { // Inactive ?>
		<td data-name="Inactive"<?php echo $view_patient_services_dashboard->Inactive->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_Inactive" class="view_patient_services_dashboard_Inactive">
<span<?php echo $view_patient_services_dashboard->Inactive->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->Inactive->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->CollSample->Visible) { // CollSample ?>
		<td data-name="CollSample"<?php echo $view_patient_services_dashboard->CollSample->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_CollSample" class="view_patient_services_dashboard_CollSample">
<span<?php echo $view_patient_services_dashboard->CollSample->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->CollSample->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->TestType->Visible) { // TestType ?>
		<td data-name="TestType"<?php echo $view_patient_services_dashboard->TestType->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_TestType" class="view_patient_services_dashboard_TestType">
<span<?php echo $view_patient_services_dashboard->TestType->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->TestType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->Repeated->Visible) { // Repeated ?>
		<td data-name="Repeated"<?php echo $view_patient_services_dashboard->Repeated->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_Repeated" class="view_patient_services_dashboard_Repeated">
<span<?php echo $view_patient_services_dashboard->Repeated->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->Repeated->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->RepeatedBy->Visible) { // RepeatedBy ?>
		<td data-name="RepeatedBy"<?php echo $view_patient_services_dashboard->RepeatedBy->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_RepeatedBy" class="view_patient_services_dashboard_RepeatedBy">
<span<?php echo $view_patient_services_dashboard->RepeatedBy->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->RepeatedBy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->RepeatedDate->Visible) { // RepeatedDate ?>
		<td data-name="RepeatedDate"<?php echo $view_patient_services_dashboard->RepeatedDate->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_RepeatedDate" class="view_patient_services_dashboard_RepeatedDate">
<span<?php echo $view_patient_services_dashboard->RepeatedDate->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->RepeatedDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->serviceID->Visible) { // serviceID ?>
		<td data-name="serviceID"<?php echo $view_patient_services_dashboard->serviceID->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_serviceID" class="view_patient_services_dashboard_serviceID">
<span<?php echo $view_patient_services_dashboard->serviceID->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->serviceID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->Service_Type->Visible) { // Service_Type ?>
		<td data-name="Service_Type"<?php echo $view_patient_services_dashboard->Service_Type->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_Service_Type" class="view_patient_services_dashboard_Service_Type">
<span<?php echo $view_patient_services_dashboard->Service_Type->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->Service_Type->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->Service_Department->Visible) { // Service_Department ?>
		<td data-name="Service_Department"<?php echo $view_patient_services_dashboard->Service_Department->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_Service_Department" class="view_patient_services_dashboard_Service_Department">
<span<?php echo $view_patient_services_dashboard->Service_Department->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->Service_Department->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->createdDate->Visible) { // createdDate ?>
		<td data-name="createdDate"<?php echo $view_patient_services_dashboard->createdDate->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_createdDate" class="view_patient_services_dashboard_createdDate">
<span<?php echo $view_patient_services_dashboard->createdDate->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->createdDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_services_dashboard->RequestNo->Visible) { // RequestNo ?>
		<td data-name="RequestNo"<?php echo $view_patient_services_dashboard->RequestNo->cellAttributes() ?>>
<span id="el<?php echo $view_patient_services_dashboard_list->RowCnt ?>_view_patient_services_dashboard_RequestNo" class="view_patient_services_dashboard_RequestNo">
<span<?php echo $view_patient_services_dashboard->RequestNo->viewAttributes() ?>>
<?php echo $view_patient_services_dashboard->RequestNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_patient_services_dashboard_list->ListOptions->render("body", "right", $view_patient_services_dashboard_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_patient_services_dashboard->isGridAdd())
		$view_patient_services_dashboard_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_patient_services_dashboard->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_patient_services_dashboard_list->Recordset)
	$view_patient_services_dashboard_list->Recordset->Close();
?>
<?php if (!$view_patient_services_dashboard->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_patient_services_dashboard->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_patient_services_dashboard_list->Pager)) $view_patient_services_dashboard_list->Pager = new NumericPager($view_patient_services_dashboard_list->StartRec, $view_patient_services_dashboard_list->DisplayRecs, $view_patient_services_dashboard_list->TotalRecs, $view_patient_services_dashboard_list->RecRange, $view_patient_services_dashboard_list->AutoHidePager) ?>
<?php if ($view_patient_services_dashboard_list->Pager->RecordCount > 0 && $view_patient_services_dashboard_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_patient_services_dashboard_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_patient_services_dashboard_list->pageUrl() ?>start=<?php echo $view_patient_services_dashboard_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_patient_services_dashboard_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_patient_services_dashboard_list->pageUrl() ?>start=<?php echo $view_patient_services_dashboard_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_patient_services_dashboard_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_patient_services_dashboard_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_patient_services_dashboard_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_patient_services_dashboard_list->pageUrl() ?>start=<?php echo $view_patient_services_dashboard_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_patient_services_dashboard_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_patient_services_dashboard_list->pageUrl() ?>start=<?php echo $view_patient_services_dashboard_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_patient_services_dashboard_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_patient_services_dashboard_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_patient_services_dashboard_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_patient_services_dashboard_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_patient_services_dashboard_list->TotalRecs > 0 && (!$view_patient_services_dashboard_list->AutoHidePageSizeSelector || $view_patient_services_dashboard_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_patient_services_dashboard">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_patient_services_dashboard_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_patient_services_dashboard_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_patient_services_dashboard_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_patient_services_dashboard_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_patient_services_dashboard_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_patient_services_dashboard_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_patient_services_dashboard->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_patient_services_dashboard_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_patient_services_dashboard_list->TotalRecs == 0 && !$view_patient_services_dashboard->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_patient_services_dashboard_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_patient_services_dashboard_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_patient_services_dashboard->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_patient_services_dashboard->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_patient_services_dashboard", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_patient_services_dashboard_list->terminate();
?>