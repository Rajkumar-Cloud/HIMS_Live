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
$view_follow_up_tracking_list = new view_follow_up_tracking_list();

// Run the page
$view_follow_up_tracking_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_follow_up_tracking_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_follow_up_tracking->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_follow_up_trackinglist = currentForm = new ew.Form("fview_follow_up_trackinglist", "list");
fview_follow_up_trackinglist.formKeyCountName = '<?php echo $view_follow_up_tracking_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_follow_up_trackinglist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_follow_up_trackinglist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fview_follow_up_trackinglistsrch = currentSearchForm = new ew.Form("fview_follow_up_trackinglistsrch");

// Filters
fview_follow_up_trackinglistsrch.filterList = <?php echo $view_follow_up_tracking_list->getFilterList() ?>;
</script>
<script src="phpjs/ewscrolltable.js"></script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$view_follow_up_tracking->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_follow_up_tracking_list->TotalRecs > 0 && $view_follow_up_tracking_list->ExportOptions->visible()) { ?>
<?php $view_follow_up_tracking_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_follow_up_tracking_list->ImportOptions->visible()) { ?>
<?php $view_follow_up_tracking_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_follow_up_tracking_list->SearchOptions->visible()) { ?>
<?php $view_follow_up_tracking_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_follow_up_tracking_list->FilterOptions->visible()) { ?>
<?php $view_follow_up_tracking_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_follow_up_tracking_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_follow_up_tracking->isExport() && !$view_follow_up_tracking->CurrentAction) { ?>
<form name="fview_follow_up_trackinglistsrch" id="fview_follow_up_trackinglistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_follow_up_tracking_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_follow_up_trackinglistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_follow_up_tracking">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_follow_up_tracking_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_follow_up_tracking_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_follow_up_tracking_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_follow_up_tracking_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_follow_up_tracking_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_follow_up_tracking_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_follow_up_tracking_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_follow_up_tracking_list->showPageHeader(); ?>
<?php
$view_follow_up_tracking_list->showMessage();
?>
<?php if ($view_follow_up_tracking_list->TotalRecs > 0 || $view_follow_up_tracking->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_follow_up_tracking_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_follow_up_tracking">
<?php if (!$view_follow_up_tracking->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_follow_up_tracking->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_follow_up_tracking_list->Pager)) $view_follow_up_tracking_list->Pager = new NumericPager($view_follow_up_tracking_list->StartRec, $view_follow_up_tracking_list->DisplayRecs, $view_follow_up_tracking_list->TotalRecs, $view_follow_up_tracking_list->RecRange, $view_follow_up_tracking_list->AutoHidePager) ?>
<?php if ($view_follow_up_tracking_list->Pager->RecordCount > 0 && $view_follow_up_tracking_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_follow_up_tracking_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_follow_up_tracking_list->pageUrl() ?>start=<?php echo $view_follow_up_tracking_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_follow_up_tracking_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_follow_up_tracking_list->pageUrl() ?>start=<?php echo $view_follow_up_tracking_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_follow_up_tracking_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_follow_up_tracking_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_follow_up_tracking_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_follow_up_tracking_list->pageUrl() ?>start=<?php echo $view_follow_up_tracking_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_follow_up_tracking_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_follow_up_tracking_list->pageUrl() ?>start=<?php echo $view_follow_up_tracking_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_follow_up_tracking_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_follow_up_tracking_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_follow_up_tracking_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_follow_up_tracking_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_follow_up_tracking_list->TotalRecs > 0 && (!$view_follow_up_tracking_list->AutoHidePageSizeSelector || $view_follow_up_tracking_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_follow_up_tracking">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_follow_up_tracking_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_follow_up_tracking_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_follow_up_tracking_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_follow_up_tracking_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_follow_up_tracking_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_follow_up_tracking_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_follow_up_tracking->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_follow_up_tracking_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_follow_up_trackinglist" id="fview_follow_up_trackinglist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_follow_up_tracking_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_follow_up_tracking_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_follow_up_tracking">
<div id="gmp_view_follow_up_tracking" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_follow_up_tracking_list->TotalRecs > 0 || $view_follow_up_tracking->isGridEdit()) { ?>
<table id="tbl_view_follow_up_trackinglist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_follow_up_tracking_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_follow_up_tracking_list->renderListOptions();

// Render list options (header, left)
$view_follow_up_tracking_list->ListOptions->render("header", "left");
?>
<?php if ($view_follow_up_tracking->id->Visible) { // id ?>
	<?php if ($view_follow_up_tracking->sortUrl($view_follow_up_tracking->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_follow_up_tracking->id->headerCellClass() ?>"><div id="elh_view_follow_up_tracking_id" class="view_follow_up_tracking_id"><div class="ew-table-header-caption"><?php echo $view_follow_up_tracking->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_follow_up_tracking->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_follow_up_tracking->SortUrl($view_follow_up_tracking->id) ?>',1);"><div id="elh_view_follow_up_tracking_id" class="view_follow_up_tracking_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_follow_up_tracking->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_follow_up_tracking->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_follow_up_tracking->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_follow_up_tracking->Reception->Visible) { // Reception ?>
	<?php if ($view_follow_up_tracking->sortUrl($view_follow_up_tracking->Reception) == "") { ?>
		<th data-name="Reception" class="<?php echo $view_follow_up_tracking->Reception->headerCellClass() ?>"><div id="elh_view_follow_up_tracking_Reception" class="view_follow_up_tracking_Reception"><div class="ew-table-header-caption"><?php echo $view_follow_up_tracking->Reception->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Reception" class="<?php echo $view_follow_up_tracking->Reception->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_follow_up_tracking->SortUrl($view_follow_up_tracking->Reception) ?>',1);"><div id="elh_view_follow_up_tracking_Reception" class="view_follow_up_tracking_Reception">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_follow_up_tracking->Reception->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_follow_up_tracking->Reception->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_follow_up_tracking->Reception->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_follow_up_tracking->PatientId->Visible) { // PatientId ?>
	<?php if ($view_follow_up_tracking->sortUrl($view_follow_up_tracking->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $view_follow_up_tracking->PatientId->headerCellClass() ?>"><div id="elh_view_follow_up_tracking_PatientId" class="view_follow_up_tracking_PatientId"><div class="ew-table-header-caption"><?php echo $view_follow_up_tracking->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $view_follow_up_tracking->PatientId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_follow_up_tracking->SortUrl($view_follow_up_tracking->PatientId) ?>',1);"><div id="elh_view_follow_up_tracking_PatientId" class="view_follow_up_tracking_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_follow_up_tracking->PatientId->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_follow_up_tracking->PatientId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_follow_up_tracking->PatientId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_follow_up_tracking->Age->Visible) { // Age ?>
	<?php if ($view_follow_up_tracking->sortUrl($view_follow_up_tracking->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $view_follow_up_tracking->Age->headerCellClass() ?>"><div id="elh_view_follow_up_tracking_Age" class="view_follow_up_tracking_Age"><div class="ew-table-header-caption"><?php echo $view_follow_up_tracking->Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $view_follow_up_tracking->Age->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_follow_up_tracking->SortUrl($view_follow_up_tracking->Age) ?>',1);"><div id="elh_view_follow_up_tracking_Age" class="view_follow_up_tracking_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_follow_up_tracking->Age->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_follow_up_tracking->Age->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_follow_up_tracking->Age->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_follow_up_tracking->status->Visible) { // status ?>
	<?php if ($view_follow_up_tracking->sortUrl($view_follow_up_tracking->status) == "") { ?>
		<th data-name="status" class="<?php echo $view_follow_up_tracking->status->headerCellClass() ?>"><div id="elh_view_follow_up_tracking_status" class="view_follow_up_tracking_status"><div class="ew-table-header-caption"><?php echo $view_follow_up_tracking->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $view_follow_up_tracking->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_follow_up_tracking->SortUrl($view_follow_up_tracking->status) ?>',1);"><div id="elh_view_follow_up_tracking_status" class="view_follow_up_tracking_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_follow_up_tracking->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_follow_up_tracking->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_follow_up_tracking->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_follow_up_tracking->createdby->Visible) { // createdby ?>
	<?php if ($view_follow_up_tracking->sortUrl($view_follow_up_tracking->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $view_follow_up_tracking->createdby->headerCellClass() ?>"><div id="elh_view_follow_up_tracking_createdby" class="view_follow_up_tracking_createdby"><div class="ew-table-header-caption"><?php echo $view_follow_up_tracking->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $view_follow_up_tracking->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_follow_up_tracking->SortUrl($view_follow_up_tracking->createdby) ?>',1);"><div id="elh_view_follow_up_tracking_createdby" class="view_follow_up_tracking_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_follow_up_tracking->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_follow_up_tracking->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_follow_up_tracking->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_follow_up_tracking->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_follow_up_tracking->sortUrl($view_follow_up_tracking->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_follow_up_tracking->createddatetime->headerCellClass() ?>"><div id="elh_view_follow_up_tracking_createddatetime" class="view_follow_up_tracking_createddatetime"><div class="ew-table-header-caption"><?php echo $view_follow_up_tracking->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_follow_up_tracking->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_follow_up_tracking->SortUrl($view_follow_up_tracking->createddatetime) ?>',1);"><div id="elh_view_follow_up_tracking_createddatetime" class="view_follow_up_tracking_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_follow_up_tracking->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_follow_up_tracking->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_follow_up_tracking->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_follow_up_tracking->modifiedby->Visible) { // modifiedby ?>
	<?php if ($view_follow_up_tracking->sortUrl($view_follow_up_tracking->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $view_follow_up_tracking->modifiedby->headerCellClass() ?>"><div id="elh_view_follow_up_tracking_modifiedby" class="view_follow_up_tracking_modifiedby"><div class="ew-table-header-caption"><?php echo $view_follow_up_tracking->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $view_follow_up_tracking->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_follow_up_tracking->SortUrl($view_follow_up_tracking->modifiedby) ?>',1);"><div id="elh_view_follow_up_tracking_modifiedby" class="view_follow_up_tracking_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_follow_up_tracking->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_follow_up_tracking->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_follow_up_tracking->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_follow_up_tracking->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($view_follow_up_tracking->sortUrl($view_follow_up_tracking->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_follow_up_tracking->modifieddatetime->headerCellClass() ?>"><div id="elh_view_follow_up_tracking_modifieddatetime" class="view_follow_up_tracking_modifieddatetime"><div class="ew-table-header-caption"><?php echo $view_follow_up_tracking->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_follow_up_tracking->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_follow_up_tracking->SortUrl($view_follow_up_tracking->modifieddatetime) ?>',1);"><div id="elh_view_follow_up_tracking_modifieddatetime" class="view_follow_up_tracking_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_follow_up_tracking->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_follow_up_tracking->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_follow_up_tracking->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_follow_up_tracking->createdUserName->Visible) { // createdUserName ?>
	<?php if ($view_follow_up_tracking->sortUrl($view_follow_up_tracking->createdUserName) == "") { ?>
		<th data-name="createdUserName" class="<?php echo $view_follow_up_tracking->createdUserName->headerCellClass() ?>"><div id="elh_view_follow_up_tracking_createdUserName" class="view_follow_up_tracking_createdUserName"><div class="ew-table-header-caption"><?php echo $view_follow_up_tracking->createdUserName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdUserName" class="<?php echo $view_follow_up_tracking->createdUserName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_follow_up_tracking->SortUrl($view_follow_up_tracking->createdUserName) ?>',1);"><div id="elh_view_follow_up_tracking_createdUserName" class="view_follow_up_tracking_createdUserName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_follow_up_tracking->createdUserName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_follow_up_tracking->createdUserName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_follow_up_tracking->createdUserName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_follow_up_tracking_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_follow_up_tracking->ExportAll && $view_follow_up_tracking->isExport()) {
	$view_follow_up_tracking_list->StopRec = $view_follow_up_tracking_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_follow_up_tracking_list->TotalRecs > $view_follow_up_tracking_list->StartRec + $view_follow_up_tracking_list->DisplayRecs - 1)
		$view_follow_up_tracking_list->StopRec = $view_follow_up_tracking_list->StartRec + $view_follow_up_tracking_list->DisplayRecs - 1;
	else
		$view_follow_up_tracking_list->StopRec = $view_follow_up_tracking_list->TotalRecs;
}
$view_follow_up_tracking_list->RecCnt = $view_follow_up_tracking_list->StartRec - 1;
if ($view_follow_up_tracking_list->Recordset && !$view_follow_up_tracking_list->Recordset->EOF) {
	$view_follow_up_tracking_list->Recordset->moveFirst();
	$selectLimit = $view_follow_up_tracking_list->UseSelectLimit;
	if (!$selectLimit && $view_follow_up_tracking_list->StartRec > 1)
		$view_follow_up_tracking_list->Recordset->move($view_follow_up_tracking_list->StartRec - 1);
} elseif (!$view_follow_up_tracking->AllowAddDeleteRow && $view_follow_up_tracking_list->StopRec == 0) {
	$view_follow_up_tracking_list->StopRec = $view_follow_up_tracking->GridAddRowCount;
}

// Initialize aggregate
$view_follow_up_tracking->RowType = ROWTYPE_AGGREGATEINIT;
$view_follow_up_tracking->resetAttributes();
$view_follow_up_tracking_list->renderRow();
while ($view_follow_up_tracking_list->RecCnt < $view_follow_up_tracking_list->StopRec) {
	$view_follow_up_tracking_list->RecCnt++;
	if ($view_follow_up_tracking_list->RecCnt >= $view_follow_up_tracking_list->StartRec) {
		$view_follow_up_tracking_list->RowCnt++;

		// Set up key count
		$view_follow_up_tracking_list->KeyCount = $view_follow_up_tracking_list->RowIndex;

		// Init row class and style
		$view_follow_up_tracking->resetAttributes();
		$view_follow_up_tracking->CssClass = "";
		if ($view_follow_up_tracking->isGridAdd()) {
		} else {
			$view_follow_up_tracking_list->loadRowValues($view_follow_up_tracking_list->Recordset); // Load row values
		}
		$view_follow_up_tracking->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_follow_up_tracking->RowAttrs = array_merge($view_follow_up_tracking->RowAttrs, array('data-rowindex'=>$view_follow_up_tracking_list->RowCnt, 'id'=>'r' . $view_follow_up_tracking_list->RowCnt . '_view_follow_up_tracking', 'data-rowtype'=>$view_follow_up_tracking->RowType));

		// Render row
		$view_follow_up_tracking_list->renderRow();

		// Render list options
		$view_follow_up_tracking_list->renderListOptions();
?>
	<tr<?php echo $view_follow_up_tracking->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_follow_up_tracking_list->ListOptions->render("body", "left", $view_follow_up_tracking_list->RowCnt);
?>
	<?php if ($view_follow_up_tracking->id->Visible) { // id ?>
		<td data-name="id"<?php echo $view_follow_up_tracking->id->cellAttributes() ?>>
<span id="el<?php echo $view_follow_up_tracking_list->RowCnt ?>_view_follow_up_tracking_id" class="view_follow_up_tracking_id">
<span<?php echo $view_follow_up_tracking->id->viewAttributes() ?>>
<?php echo $view_follow_up_tracking->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_follow_up_tracking->Reception->Visible) { // Reception ?>
		<td data-name="Reception"<?php echo $view_follow_up_tracking->Reception->cellAttributes() ?>>
<span id="el<?php echo $view_follow_up_tracking_list->RowCnt ?>_view_follow_up_tracking_Reception" class="view_follow_up_tracking_Reception">
<span<?php echo $view_follow_up_tracking->Reception->viewAttributes() ?>>
<?php echo $view_follow_up_tracking->Reception->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_follow_up_tracking->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId"<?php echo $view_follow_up_tracking->PatientId->cellAttributes() ?>>
<span id="el<?php echo $view_follow_up_tracking_list->RowCnt ?>_view_follow_up_tracking_PatientId" class="view_follow_up_tracking_PatientId">
<span<?php echo $view_follow_up_tracking->PatientId->viewAttributes() ?>>
<?php echo $view_follow_up_tracking->PatientId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_follow_up_tracking->Age->Visible) { // Age ?>
		<td data-name="Age"<?php echo $view_follow_up_tracking->Age->cellAttributes() ?>>
<span id="el<?php echo $view_follow_up_tracking_list->RowCnt ?>_view_follow_up_tracking_Age" class="view_follow_up_tracking_Age">
<span<?php echo $view_follow_up_tracking->Age->viewAttributes() ?>>
<?php echo $view_follow_up_tracking->Age->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_follow_up_tracking->status->Visible) { // status ?>
		<td data-name="status"<?php echo $view_follow_up_tracking->status->cellAttributes() ?>>
<span id="el<?php echo $view_follow_up_tracking_list->RowCnt ?>_view_follow_up_tracking_status" class="view_follow_up_tracking_status">
<span<?php echo $view_follow_up_tracking->status->viewAttributes() ?>>
<?php echo $view_follow_up_tracking->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_follow_up_tracking->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $view_follow_up_tracking->createdby->cellAttributes() ?>>
<span id="el<?php echo $view_follow_up_tracking_list->RowCnt ?>_view_follow_up_tracking_createdby" class="view_follow_up_tracking_createdby">
<span<?php echo $view_follow_up_tracking->createdby->viewAttributes() ?>>
<?php echo $view_follow_up_tracking->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_follow_up_tracking->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $view_follow_up_tracking->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_follow_up_tracking_list->RowCnt ?>_view_follow_up_tracking_createddatetime" class="view_follow_up_tracking_createddatetime">
<span<?php echo $view_follow_up_tracking->createddatetime->viewAttributes() ?>>
<?php echo $view_follow_up_tracking->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_follow_up_tracking->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $view_follow_up_tracking->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $view_follow_up_tracking_list->RowCnt ?>_view_follow_up_tracking_modifiedby" class="view_follow_up_tracking_modifiedby">
<span<?php echo $view_follow_up_tracking->modifiedby->viewAttributes() ?>>
<?php echo $view_follow_up_tracking->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_follow_up_tracking->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $view_follow_up_tracking->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_follow_up_tracking_list->RowCnt ?>_view_follow_up_tracking_modifieddatetime" class="view_follow_up_tracking_modifieddatetime">
<span<?php echo $view_follow_up_tracking->modifieddatetime->viewAttributes() ?>>
<?php echo $view_follow_up_tracking->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_follow_up_tracking->createdUserName->Visible) { // createdUserName ?>
		<td data-name="createdUserName"<?php echo $view_follow_up_tracking->createdUserName->cellAttributes() ?>>
<span id="el<?php echo $view_follow_up_tracking_list->RowCnt ?>_view_follow_up_tracking_createdUserName" class="view_follow_up_tracking_createdUserName">
<span<?php echo $view_follow_up_tracking->createdUserName->viewAttributes() ?>>
<?php echo $view_follow_up_tracking->createdUserName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_follow_up_tracking_list->ListOptions->render("body", "right", $view_follow_up_tracking_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_follow_up_tracking->isGridAdd())
		$view_follow_up_tracking_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_follow_up_tracking->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_follow_up_tracking_list->Recordset)
	$view_follow_up_tracking_list->Recordset->Close();
?>
<?php if (!$view_follow_up_tracking->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_follow_up_tracking->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_follow_up_tracking_list->Pager)) $view_follow_up_tracking_list->Pager = new NumericPager($view_follow_up_tracking_list->StartRec, $view_follow_up_tracking_list->DisplayRecs, $view_follow_up_tracking_list->TotalRecs, $view_follow_up_tracking_list->RecRange, $view_follow_up_tracking_list->AutoHidePager) ?>
<?php if ($view_follow_up_tracking_list->Pager->RecordCount > 0 && $view_follow_up_tracking_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_follow_up_tracking_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_follow_up_tracking_list->pageUrl() ?>start=<?php echo $view_follow_up_tracking_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_follow_up_tracking_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_follow_up_tracking_list->pageUrl() ?>start=<?php echo $view_follow_up_tracking_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_follow_up_tracking_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_follow_up_tracking_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_follow_up_tracking_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_follow_up_tracking_list->pageUrl() ?>start=<?php echo $view_follow_up_tracking_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_follow_up_tracking_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_follow_up_tracking_list->pageUrl() ?>start=<?php echo $view_follow_up_tracking_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_follow_up_tracking_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_follow_up_tracking_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_follow_up_tracking_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_follow_up_tracking_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_follow_up_tracking_list->TotalRecs > 0 && (!$view_follow_up_tracking_list->AutoHidePageSizeSelector || $view_follow_up_tracking_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_follow_up_tracking">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_follow_up_tracking_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_follow_up_tracking_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_follow_up_tracking_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_follow_up_tracking_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_follow_up_tracking_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_follow_up_tracking_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_follow_up_tracking->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_follow_up_tracking_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_follow_up_tracking_list->TotalRecs == 0 && !$view_follow_up_tracking->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_follow_up_tracking_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_follow_up_tracking_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_follow_up_tracking->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_follow_up_tracking->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_follow_up_tracking", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_follow_up_tracking_list->terminate();
?>