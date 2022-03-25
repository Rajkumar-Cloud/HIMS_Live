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
$ivf_follow_up_tracking_list = new ivf_follow_up_tracking_list();

// Run the page
$ivf_follow_up_tracking_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_follow_up_tracking_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$ivf_follow_up_tracking->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fivf_follow_up_trackinglist = currentForm = new ew.Form("fivf_follow_up_trackinglist", "list");
fivf_follow_up_trackinglist.formKeyCountName = '<?php echo $ivf_follow_up_tracking_list->FormKeyCountName ?>';

// Form_CustomValidate event
fivf_follow_up_trackinglist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_follow_up_trackinglist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fivf_follow_up_trackinglistsrch = currentSearchForm = new ew.Form("fivf_follow_up_trackinglistsrch");

// Filters
fivf_follow_up_trackinglistsrch.filterList = <?php echo $ivf_follow_up_tracking_list->getFilterList() ?>;
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
<?php if (!$ivf_follow_up_tracking->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($ivf_follow_up_tracking_list->TotalRecs > 0 && $ivf_follow_up_tracking_list->ExportOptions->visible()) { ?>
<?php $ivf_follow_up_tracking_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_follow_up_tracking_list->ImportOptions->visible()) { ?>
<?php $ivf_follow_up_tracking_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_follow_up_tracking_list->SearchOptions->visible()) { ?>
<?php $ivf_follow_up_tracking_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_follow_up_tracking_list->FilterOptions->visible()) { ?>
<?php $ivf_follow_up_tracking_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$ivf_follow_up_tracking_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$ivf_follow_up_tracking->isExport() && !$ivf_follow_up_tracking->CurrentAction) { ?>
<form name="fivf_follow_up_trackinglistsrch" id="fivf_follow_up_trackinglistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($ivf_follow_up_tracking_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fivf_follow_up_trackinglistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="ivf_follow_up_tracking">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($ivf_follow_up_tracking_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($ivf_follow_up_tracking_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $ivf_follow_up_tracking_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($ivf_follow_up_tracking_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($ivf_follow_up_tracking_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($ivf_follow_up_tracking_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($ivf_follow_up_tracking_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $ivf_follow_up_tracking_list->showPageHeader(); ?>
<?php
$ivf_follow_up_tracking_list->showMessage();
?>
<?php if ($ivf_follow_up_tracking_list->TotalRecs > 0 || $ivf_follow_up_tracking->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($ivf_follow_up_tracking_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf_follow_up_tracking">
<?php if (!$ivf_follow_up_tracking->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$ivf_follow_up_tracking->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($ivf_follow_up_tracking_list->Pager)) $ivf_follow_up_tracking_list->Pager = new NumericPager($ivf_follow_up_tracking_list->StartRec, $ivf_follow_up_tracking_list->DisplayRecs, $ivf_follow_up_tracking_list->TotalRecs, $ivf_follow_up_tracking_list->RecRange, $ivf_follow_up_tracking_list->AutoHidePager) ?>
<?php if ($ivf_follow_up_tracking_list->Pager->RecordCount > 0 && $ivf_follow_up_tracking_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($ivf_follow_up_tracking_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_follow_up_tracking_list->pageUrl() ?>start=<?php echo $ivf_follow_up_tracking_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($ivf_follow_up_tracking_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_follow_up_tracking_list->pageUrl() ?>start=<?php echo $ivf_follow_up_tracking_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($ivf_follow_up_tracking_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $ivf_follow_up_tracking_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($ivf_follow_up_tracking_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_follow_up_tracking_list->pageUrl() ?>start=<?php echo $ivf_follow_up_tracking_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($ivf_follow_up_tracking_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_follow_up_tracking_list->pageUrl() ?>start=<?php echo $ivf_follow_up_tracking_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($ivf_follow_up_tracking_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $ivf_follow_up_tracking_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $ivf_follow_up_tracking_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $ivf_follow_up_tracking_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($ivf_follow_up_tracking_list->TotalRecs > 0 && (!$ivf_follow_up_tracking_list->AutoHidePageSizeSelector || $ivf_follow_up_tracking_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="ivf_follow_up_tracking">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($ivf_follow_up_tracking_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($ivf_follow_up_tracking_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($ivf_follow_up_tracking_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($ivf_follow_up_tracking_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($ivf_follow_up_tracking_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($ivf_follow_up_tracking_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($ivf_follow_up_tracking->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ivf_follow_up_tracking_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fivf_follow_up_trackinglist" id="fivf_follow_up_trackinglist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ivf_follow_up_tracking_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_follow_up_tracking_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_follow_up_tracking">
<div id="gmp_ivf_follow_up_tracking" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($ivf_follow_up_tracking_list->TotalRecs > 0 || $ivf_follow_up_tracking->isGridEdit()) { ?>
<table id="tbl_ivf_follow_up_trackinglist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$ivf_follow_up_tracking_list->RowType = ROWTYPE_HEADER;

// Render list options
$ivf_follow_up_tracking_list->renderListOptions();

// Render list options (header, left)
$ivf_follow_up_tracking_list->ListOptions->render("header", "left");
?>
<?php if ($ivf_follow_up_tracking->id->Visible) { // id ?>
	<?php if ($ivf_follow_up_tracking->sortUrl($ivf_follow_up_tracking->id) == "") { ?>
		<th data-name="id" class="<?php echo $ivf_follow_up_tracking->id->headerCellClass() ?>"><div id="elh_ivf_follow_up_tracking_id" class="ivf_follow_up_tracking_id"><div class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $ivf_follow_up_tracking->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_follow_up_tracking->SortUrl($ivf_follow_up_tracking->id) ?>',1);"><div id="elh_ivf_follow_up_tracking_id" class="ivf_follow_up_tracking_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_follow_up_tracking->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_follow_up_tracking->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_follow_up_tracking->RIDNO->Visible) { // RIDNO ?>
	<?php if ($ivf_follow_up_tracking->sortUrl($ivf_follow_up_tracking->RIDNO) == "") { ?>
		<th data-name="RIDNO" class="<?php echo $ivf_follow_up_tracking->RIDNO->headerCellClass() ?>"><div id="elh_ivf_follow_up_tracking_RIDNO" class="ivf_follow_up_tracking_RIDNO"><div class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking->RIDNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RIDNO" class="<?php echo $ivf_follow_up_tracking->RIDNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_follow_up_tracking->SortUrl($ivf_follow_up_tracking->RIDNO) ?>',1);"><div id="elh_ivf_follow_up_tracking_RIDNO" class="ivf_follow_up_tracking_RIDNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking->RIDNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_follow_up_tracking->RIDNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_follow_up_tracking->RIDNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_follow_up_tracking->Name->Visible) { // Name ?>
	<?php if ($ivf_follow_up_tracking->sortUrl($ivf_follow_up_tracking->Name) == "") { ?>
		<th data-name="Name" class="<?php echo $ivf_follow_up_tracking->Name->headerCellClass() ?>"><div id="elh_ivf_follow_up_tracking_Name" class="ivf_follow_up_tracking_Name"><div class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking->Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Name" class="<?php echo $ivf_follow_up_tracking->Name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_follow_up_tracking->SortUrl($ivf_follow_up_tracking->Name) ?>',1);"><div id="elh_ivf_follow_up_tracking_Name" class="ivf_follow_up_tracking_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking->Name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_follow_up_tracking->Name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_follow_up_tracking->Name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_follow_up_tracking->Age->Visible) { // Age ?>
	<?php if ($ivf_follow_up_tracking->sortUrl($ivf_follow_up_tracking->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $ivf_follow_up_tracking->Age->headerCellClass() ?>"><div id="elh_ivf_follow_up_tracking_Age" class="ivf_follow_up_tracking_Age"><div class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking->Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $ivf_follow_up_tracking->Age->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_follow_up_tracking->SortUrl($ivf_follow_up_tracking->Age) ?>',1);"><div id="elh_ivf_follow_up_tracking_Age" class="ivf_follow_up_tracking_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking->Age->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_follow_up_tracking->Age->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_follow_up_tracking->Age->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_follow_up_tracking->MReadMore->Visible) { // MReadMore ?>
	<?php if ($ivf_follow_up_tracking->sortUrl($ivf_follow_up_tracking->MReadMore) == "") { ?>
		<th data-name="MReadMore" class="<?php echo $ivf_follow_up_tracking->MReadMore->headerCellClass() ?>"><div id="elh_ivf_follow_up_tracking_MReadMore" class="ivf_follow_up_tracking_MReadMore"><div class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking->MReadMore->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MReadMore" class="<?php echo $ivf_follow_up_tracking->MReadMore->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_follow_up_tracking->SortUrl($ivf_follow_up_tracking->MReadMore) ?>',1);"><div id="elh_ivf_follow_up_tracking_MReadMore" class="ivf_follow_up_tracking_MReadMore">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking->MReadMore->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_follow_up_tracking->MReadMore->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_follow_up_tracking->MReadMore->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_follow_up_tracking->status->Visible) { // status ?>
	<?php if ($ivf_follow_up_tracking->sortUrl($ivf_follow_up_tracking->status) == "") { ?>
		<th data-name="status" class="<?php echo $ivf_follow_up_tracking->status->headerCellClass() ?>"><div id="elh_ivf_follow_up_tracking_status" class="ivf_follow_up_tracking_status"><div class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $ivf_follow_up_tracking->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_follow_up_tracking->SortUrl($ivf_follow_up_tracking->status) ?>',1);"><div id="elh_ivf_follow_up_tracking_status" class="ivf_follow_up_tracking_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_follow_up_tracking->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_follow_up_tracking->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_follow_up_tracking->createdby->Visible) { // createdby ?>
	<?php if ($ivf_follow_up_tracking->sortUrl($ivf_follow_up_tracking->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $ivf_follow_up_tracking->createdby->headerCellClass() ?>"><div id="elh_ivf_follow_up_tracking_createdby" class="ivf_follow_up_tracking_createdby"><div class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $ivf_follow_up_tracking->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_follow_up_tracking->SortUrl($ivf_follow_up_tracking->createdby) ?>',1);"><div id="elh_ivf_follow_up_tracking_createdby" class="ivf_follow_up_tracking_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_follow_up_tracking->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_follow_up_tracking->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_follow_up_tracking->createddatetime->Visible) { // createddatetime ?>
	<?php if ($ivf_follow_up_tracking->sortUrl($ivf_follow_up_tracking->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $ivf_follow_up_tracking->createddatetime->headerCellClass() ?>"><div id="elh_ivf_follow_up_tracking_createddatetime" class="ivf_follow_up_tracking_createddatetime"><div class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $ivf_follow_up_tracking->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_follow_up_tracking->SortUrl($ivf_follow_up_tracking->createddatetime) ?>',1);"><div id="elh_ivf_follow_up_tracking_createddatetime" class="ivf_follow_up_tracking_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_follow_up_tracking->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_follow_up_tracking->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_follow_up_tracking->modifiedby->Visible) { // modifiedby ?>
	<?php if ($ivf_follow_up_tracking->sortUrl($ivf_follow_up_tracking->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $ivf_follow_up_tracking->modifiedby->headerCellClass() ?>"><div id="elh_ivf_follow_up_tracking_modifiedby" class="ivf_follow_up_tracking_modifiedby"><div class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $ivf_follow_up_tracking->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_follow_up_tracking->SortUrl($ivf_follow_up_tracking->modifiedby) ?>',1);"><div id="elh_ivf_follow_up_tracking_modifiedby" class="ivf_follow_up_tracking_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_follow_up_tracking->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_follow_up_tracking->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_follow_up_tracking->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($ivf_follow_up_tracking->sortUrl($ivf_follow_up_tracking->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $ivf_follow_up_tracking->modifieddatetime->headerCellClass() ?>"><div id="elh_ivf_follow_up_tracking_modifieddatetime" class="ivf_follow_up_tracking_modifieddatetime"><div class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $ivf_follow_up_tracking->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_follow_up_tracking->SortUrl($ivf_follow_up_tracking->modifieddatetime) ?>',1);"><div id="elh_ivf_follow_up_tracking_modifieddatetime" class="ivf_follow_up_tracking_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_follow_up_tracking->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_follow_up_tracking->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_follow_up_tracking->TidNo->Visible) { // TidNo ?>
	<?php if ($ivf_follow_up_tracking->sortUrl($ivf_follow_up_tracking->TidNo) == "") { ?>
		<th data-name="TidNo" class="<?php echo $ivf_follow_up_tracking->TidNo->headerCellClass() ?>"><div id="elh_ivf_follow_up_tracking_TidNo" class="ivf_follow_up_tracking_TidNo"><div class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking->TidNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TidNo" class="<?php echo $ivf_follow_up_tracking->TidNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_follow_up_tracking->SortUrl($ivf_follow_up_tracking->TidNo) ?>',1);"><div id="elh_ivf_follow_up_tracking_TidNo" class="ivf_follow_up_tracking_TidNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking->TidNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_follow_up_tracking->TidNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_follow_up_tracking->TidNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_follow_up_tracking->createdUserName->Visible) { // createdUserName ?>
	<?php if ($ivf_follow_up_tracking->sortUrl($ivf_follow_up_tracking->createdUserName) == "") { ?>
		<th data-name="createdUserName" class="<?php echo $ivf_follow_up_tracking->createdUserName->headerCellClass() ?>"><div id="elh_ivf_follow_up_tracking_createdUserName" class="ivf_follow_up_tracking_createdUserName"><div class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking->createdUserName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdUserName" class="<?php echo $ivf_follow_up_tracking->createdUserName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_follow_up_tracking->SortUrl($ivf_follow_up_tracking->createdUserName) ?>',1);"><div id="elh_ivf_follow_up_tracking_createdUserName" class="ivf_follow_up_tracking_createdUserName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking->createdUserName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_follow_up_tracking->createdUserName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_follow_up_tracking->createdUserName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_follow_up_tracking->FollowUpDate->Visible) { // FollowUpDate ?>
	<?php if ($ivf_follow_up_tracking->sortUrl($ivf_follow_up_tracking->FollowUpDate) == "") { ?>
		<th data-name="FollowUpDate" class="<?php echo $ivf_follow_up_tracking->FollowUpDate->headerCellClass() ?>"><div id="elh_ivf_follow_up_tracking_FollowUpDate" class="ivf_follow_up_tracking_FollowUpDate"><div class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking->FollowUpDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FollowUpDate" class="<?php echo $ivf_follow_up_tracking->FollowUpDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_follow_up_tracking->SortUrl($ivf_follow_up_tracking->FollowUpDate) ?>',1);"><div id="elh_ivf_follow_up_tracking_FollowUpDate" class="ivf_follow_up_tracking_FollowUpDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking->FollowUpDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_follow_up_tracking->FollowUpDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_follow_up_tracking->FollowUpDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_follow_up_tracking->NextVistDate->Visible) { // NextVistDate ?>
	<?php if ($ivf_follow_up_tracking->sortUrl($ivf_follow_up_tracking->NextVistDate) == "") { ?>
		<th data-name="NextVistDate" class="<?php echo $ivf_follow_up_tracking->NextVistDate->headerCellClass() ?>"><div id="elh_ivf_follow_up_tracking_NextVistDate" class="ivf_follow_up_tracking_NextVistDate"><div class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking->NextVistDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NextVistDate" class="<?php echo $ivf_follow_up_tracking->NextVistDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_follow_up_tracking->SortUrl($ivf_follow_up_tracking->NextVistDate) ?>',1);"><div id="elh_ivf_follow_up_tracking_NextVistDate" class="ivf_follow_up_tracking_NextVistDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking->NextVistDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_follow_up_tracking->NextVistDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_follow_up_tracking->NextVistDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_follow_up_tracking->HospID->Visible) { // HospID ?>
	<?php if ($ivf_follow_up_tracking->sortUrl($ivf_follow_up_tracking->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $ivf_follow_up_tracking->HospID->headerCellClass() ?>"><div id="elh_ivf_follow_up_tracking_HospID" class="ivf_follow_up_tracking_HospID"><div class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $ivf_follow_up_tracking->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_follow_up_tracking->SortUrl($ivf_follow_up_tracking->HospID) ?>',1);"><div id="elh_ivf_follow_up_tracking_HospID" class="ivf_follow_up_tracking_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_follow_up_tracking->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_follow_up_tracking->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$ivf_follow_up_tracking_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($ivf_follow_up_tracking->ExportAll && $ivf_follow_up_tracking->isExport()) {
	$ivf_follow_up_tracking_list->StopRec = $ivf_follow_up_tracking_list->TotalRecs;
} else {

	// Set the last record to display
	if ($ivf_follow_up_tracking_list->TotalRecs > $ivf_follow_up_tracking_list->StartRec + $ivf_follow_up_tracking_list->DisplayRecs - 1)
		$ivf_follow_up_tracking_list->StopRec = $ivf_follow_up_tracking_list->StartRec + $ivf_follow_up_tracking_list->DisplayRecs - 1;
	else
		$ivf_follow_up_tracking_list->StopRec = $ivf_follow_up_tracking_list->TotalRecs;
}
$ivf_follow_up_tracking_list->RecCnt = $ivf_follow_up_tracking_list->StartRec - 1;
if ($ivf_follow_up_tracking_list->Recordset && !$ivf_follow_up_tracking_list->Recordset->EOF) {
	$ivf_follow_up_tracking_list->Recordset->moveFirst();
	$selectLimit = $ivf_follow_up_tracking_list->UseSelectLimit;
	if (!$selectLimit && $ivf_follow_up_tracking_list->StartRec > 1)
		$ivf_follow_up_tracking_list->Recordset->move($ivf_follow_up_tracking_list->StartRec - 1);
} elseif (!$ivf_follow_up_tracking->AllowAddDeleteRow && $ivf_follow_up_tracking_list->StopRec == 0) {
	$ivf_follow_up_tracking_list->StopRec = $ivf_follow_up_tracking->GridAddRowCount;
}

// Initialize aggregate
$ivf_follow_up_tracking->RowType = ROWTYPE_AGGREGATEINIT;
$ivf_follow_up_tracking->resetAttributes();
$ivf_follow_up_tracking_list->renderRow();
while ($ivf_follow_up_tracking_list->RecCnt < $ivf_follow_up_tracking_list->StopRec) {
	$ivf_follow_up_tracking_list->RecCnt++;
	if ($ivf_follow_up_tracking_list->RecCnt >= $ivf_follow_up_tracking_list->StartRec) {
		$ivf_follow_up_tracking_list->RowCnt++;

		// Set up key count
		$ivf_follow_up_tracking_list->KeyCount = $ivf_follow_up_tracking_list->RowIndex;

		// Init row class and style
		$ivf_follow_up_tracking->resetAttributes();
		$ivf_follow_up_tracking->CssClass = "";
		if ($ivf_follow_up_tracking->isGridAdd()) {
		} else {
			$ivf_follow_up_tracking_list->loadRowValues($ivf_follow_up_tracking_list->Recordset); // Load row values
		}
		$ivf_follow_up_tracking->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$ivf_follow_up_tracking->RowAttrs = array_merge($ivf_follow_up_tracking->RowAttrs, array('data-rowindex'=>$ivf_follow_up_tracking_list->RowCnt, 'id'=>'r' . $ivf_follow_up_tracking_list->RowCnt . '_ivf_follow_up_tracking', 'data-rowtype'=>$ivf_follow_up_tracking->RowType));

		// Render row
		$ivf_follow_up_tracking_list->renderRow();

		// Render list options
		$ivf_follow_up_tracking_list->renderListOptions();
?>
	<tr<?php echo $ivf_follow_up_tracking->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_follow_up_tracking_list->ListOptions->render("body", "left", $ivf_follow_up_tracking_list->RowCnt);
?>
	<?php if ($ivf_follow_up_tracking->id->Visible) { // id ?>
		<td data-name="id"<?php echo $ivf_follow_up_tracking->id->cellAttributes() ?>>
<span id="el<?php echo $ivf_follow_up_tracking_list->RowCnt ?>_ivf_follow_up_tracking_id" class="ivf_follow_up_tracking_id">
<span<?php echo $ivf_follow_up_tracking->id->viewAttributes() ?>>
<?php echo $ivf_follow_up_tracking->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_follow_up_tracking->RIDNO->Visible) { // RIDNO ?>
		<td data-name="RIDNO"<?php echo $ivf_follow_up_tracking->RIDNO->cellAttributes() ?>>
<span id="el<?php echo $ivf_follow_up_tracking_list->RowCnt ?>_ivf_follow_up_tracking_RIDNO" class="ivf_follow_up_tracking_RIDNO">
<span<?php echo $ivf_follow_up_tracking->RIDNO->viewAttributes() ?>>
<?php echo $ivf_follow_up_tracking->RIDNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_follow_up_tracking->Name->Visible) { // Name ?>
		<td data-name="Name"<?php echo $ivf_follow_up_tracking->Name->cellAttributes() ?>>
<span id="el<?php echo $ivf_follow_up_tracking_list->RowCnt ?>_ivf_follow_up_tracking_Name" class="ivf_follow_up_tracking_Name">
<span<?php echo $ivf_follow_up_tracking->Name->viewAttributes() ?>>
<?php echo $ivf_follow_up_tracking->Name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_follow_up_tracking->Age->Visible) { // Age ?>
		<td data-name="Age"<?php echo $ivf_follow_up_tracking->Age->cellAttributes() ?>>
<span id="el<?php echo $ivf_follow_up_tracking_list->RowCnt ?>_ivf_follow_up_tracking_Age" class="ivf_follow_up_tracking_Age">
<span<?php echo $ivf_follow_up_tracking->Age->viewAttributes() ?>>
<?php echo $ivf_follow_up_tracking->Age->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_follow_up_tracking->MReadMore->Visible) { // MReadMore ?>
		<td data-name="MReadMore"<?php echo $ivf_follow_up_tracking->MReadMore->cellAttributes() ?>>
<span id="el<?php echo $ivf_follow_up_tracking_list->RowCnt ?>_ivf_follow_up_tracking_MReadMore" class="ivf_follow_up_tracking_MReadMore">
<span<?php echo $ivf_follow_up_tracking->MReadMore->viewAttributes() ?>>
<?php echo $ivf_follow_up_tracking->MReadMore->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_follow_up_tracking->status->Visible) { // status ?>
		<td data-name="status"<?php echo $ivf_follow_up_tracking->status->cellAttributes() ?>>
<span id="el<?php echo $ivf_follow_up_tracking_list->RowCnt ?>_ivf_follow_up_tracking_status" class="ivf_follow_up_tracking_status">
<span<?php echo $ivf_follow_up_tracking->status->viewAttributes() ?>>
<?php echo $ivf_follow_up_tracking->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_follow_up_tracking->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $ivf_follow_up_tracking->createdby->cellAttributes() ?>>
<span id="el<?php echo $ivf_follow_up_tracking_list->RowCnt ?>_ivf_follow_up_tracking_createdby" class="ivf_follow_up_tracking_createdby">
<span<?php echo $ivf_follow_up_tracking->createdby->viewAttributes() ?>>
<?php echo $ivf_follow_up_tracking->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_follow_up_tracking->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $ivf_follow_up_tracking->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $ivf_follow_up_tracking_list->RowCnt ?>_ivf_follow_up_tracking_createddatetime" class="ivf_follow_up_tracking_createddatetime">
<span<?php echo $ivf_follow_up_tracking->createddatetime->viewAttributes() ?>>
<?php echo $ivf_follow_up_tracking->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_follow_up_tracking->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $ivf_follow_up_tracking->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $ivf_follow_up_tracking_list->RowCnt ?>_ivf_follow_up_tracking_modifiedby" class="ivf_follow_up_tracking_modifiedby">
<span<?php echo $ivf_follow_up_tracking->modifiedby->viewAttributes() ?>>
<?php echo $ivf_follow_up_tracking->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_follow_up_tracking->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $ivf_follow_up_tracking->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $ivf_follow_up_tracking_list->RowCnt ?>_ivf_follow_up_tracking_modifieddatetime" class="ivf_follow_up_tracking_modifieddatetime">
<span<?php echo $ivf_follow_up_tracking->modifieddatetime->viewAttributes() ?>>
<?php echo $ivf_follow_up_tracking->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_follow_up_tracking->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo"<?php echo $ivf_follow_up_tracking->TidNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_follow_up_tracking_list->RowCnt ?>_ivf_follow_up_tracking_TidNo" class="ivf_follow_up_tracking_TidNo">
<span<?php echo $ivf_follow_up_tracking->TidNo->viewAttributes() ?>>
<?php echo $ivf_follow_up_tracking->TidNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_follow_up_tracking->createdUserName->Visible) { // createdUserName ?>
		<td data-name="createdUserName"<?php echo $ivf_follow_up_tracking->createdUserName->cellAttributes() ?>>
<span id="el<?php echo $ivf_follow_up_tracking_list->RowCnt ?>_ivf_follow_up_tracking_createdUserName" class="ivf_follow_up_tracking_createdUserName">
<span<?php echo $ivf_follow_up_tracking->createdUserName->viewAttributes() ?>>
<?php echo $ivf_follow_up_tracking->createdUserName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_follow_up_tracking->FollowUpDate->Visible) { // FollowUpDate ?>
		<td data-name="FollowUpDate"<?php echo $ivf_follow_up_tracking->FollowUpDate->cellAttributes() ?>>
<span id="el<?php echo $ivf_follow_up_tracking_list->RowCnt ?>_ivf_follow_up_tracking_FollowUpDate" class="ivf_follow_up_tracking_FollowUpDate">
<span<?php echo $ivf_follow_up_tracking->FollowUpDate->viewAttributes() ?>>
<?php echo $ivf_follow_up_tracking->FollowUpDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_follow_up_tracking->NextVistDate->Visible) { // NextVistDate ?>
		<td data-name="NextVistDate"<?php echo $ivf_follow_up_tracking->NextVistDate->cellAttributes() ?>>
<span id="el<?php echo $ivf_follow_up_tracking_list->RowCnt ?>_ivf_follow_up_tracking_NextVistDate" class="ivf_follow_up_tracking_NextVistDate">
<span<?php echo $ivf_follow_up_tracking->NextVistDate->viewAttributes() ?>>
<?php echo $ivf_follow_up_tracking->NextVistDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_follow_up_tracking->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $ivf_follow_up_tracking->HospID->cellAttributes() ?>>
<span id="el<?php echo $ivf_follow_up_tracking_list->RowCnt ?>_ivf_follow_up_tracking_HospID" class="ivf_follow_up_tracking_HospID">
<span<?php echo $ivf_follow_up_tracking->HospID->viewAttributes() ?>>
<?php echo $ivf_follow_up_tracking->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_follow_up_tracking_list->ListOptions->render("body", "right", $ivf_follow_up_tracking_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$ivf_follow_up_tracking->isGridAdd())
		$ivf_follow_up_tracking_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$ivf_follow_up_tracking->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($ivf_follow_up_tracking_list->Recordset)
	$ivf_follow_up_tracking_list->Recordset->Close();
?>
<?php if (!$ivf_follow_up_tracking->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$ivf_follow_up_tracking->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($ivf_follow_up_tracking_list->Pager)) $ivf_follow_up_tracking_list->Pager = new NumericPager($ivf_follow_up_tracking_list->StartRec, $ivf_follow_up_tracking_list->DisplayRecs, $ivf_follow_up_tracking_list->TotalRecs, $ivf_follow_up_tracking_list->RecRange, $ivf_follow_up_tracking_list->AutoHidePager) ?>
<?php if ($ivf_follow_up_tracking_list->Pager->RecordCount > 0 && $ivf_follow_up_tracking_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($ivf_follow_up_tracking_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_follow_up_tracking_list->pageUrl() ?>start=<?php echo $ivf_follow_up_tracking_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($ivf_follow_up_tracking_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_follow_up_tracking_list->pageUrl() ?>start=<?php echo $ivf_follow_up_tracking_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($ivf_follow_up_tracking_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $ivf_follow_up_tracking_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($ivf_follow_up_tracking_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_follow_up_tracking_list->pageUrl() ?>start=<?php echo $ivf_follow_up_tracking_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($ivf_follow_up_tracking_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_follow_up_tracking_list->pageUrl() ?>start=<?php echo $ivf_follow_up_tracking_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($ivf_follow_up_tracking_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $ivf_follow_up_tracking_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $ivf_follow_up_tracking_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $ivf_follow_up_tracking_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($ivf_follow_up_tracking_list->TotalRecs > 0 && (!$ivf_follow_up_tracking_list->AutoHidePageSizeSelector || $ivf_follow_up_tracking_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="ivf_follow_up_tracking">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($ivf_follow_up_tracking_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($ivf_follow_up_tracking_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($ivf_follow_up_tracking_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($ivf_follow_up_tracking_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($ivf_follow_up_tracking_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($ivf_follow_up_tracking_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($ivf_follow_up_tracking->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ivf_follow_up_tracking_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($ivf_follow_up_tracking_list->TotalRecs == 0 && !$ivf_follow_up_tracking->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $ivf_follow_up_tracking_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$ivf_follow_up_tracking_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$ivf_follow_up_tracking->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$ivf_follow_up_tracking->isExport()) { ?>
<script>
ew.scrollableTable("gmp_ivf_follow_up_tracking", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$ivf_follow_up_tracking_list->terminate();
?>