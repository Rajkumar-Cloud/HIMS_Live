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
$lab_profile_master_list = new lab_profile_master_list();

// Run the page
$lab_profile_master_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_profile_master_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$lab_profile_master->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var flab_profile_masterlist = currentForm = new ew.Form("flab_profile_masterlist", "list");
flab_profile_masterlist.formKeyCountName = '<?php echo $lab_profile_master_list->FormKeyCountName ?>';

// Form_CustomValidate event
flab_profile_masterlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
flab_profile_masterlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var flab_profile_masterlistsrch = currentSearchForm = new ew.Form("flab_profile_masterlistsrch");

// Filters
flab_profile_masterlistsrch.filterList = <?php echo $lab_profile_master_list->getFilterList() ?>;
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
<?php if (!$lab_profile_master->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($lab_profile_master_list->TotalRecs > 0 && $lab_profile_master_list->ExportOptions->visible()) { ?>
<?php $lab_profile_master_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($lab_profile_master_list->ImportOptions->visible()) { ?>
<?php $lab_profile_master_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($lab_profile_master_list->SearchOptions->visible()) { ?>
<?php $lab_profile_master_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($lab_profile_master_list->FilterOptions->visible()) { ?>
<?php $lab_profile_master_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$lab_profile_master_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$lab_profile_master->isExport() && !$lab_profile_master->CurrentAction) { ?>
<form name="flab_profile_masterlistsrch" id="flab_profile_masterlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($lab_profile_master_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="flab_profile_masterlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="lab_profile_master">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($lab_profile_master_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($lab_profile_master_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $lab_profile_master_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($lab_profile_master_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($lab_profile_master_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($lab_profile_master_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($lab_profile_master_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $lab_profile_master_list->showPageHeader(); ?>
<?php
$lab_profile_master_list->showMessage();
?>
<?php if ($lab_profile_master_list->TotalRecs > 0 || $lab_profile_master->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($lab_profile_master_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> lab_profile_master">
<?php if (!$lab_profile_master->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$lab_profile_master->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($lab_profile_master_list->Pager)) $lab_profile_master_list->Pager = new NumericPager($lab_profile_master_list->StartRec, $lab_profile_master_list->DisplayRecs, $lab_profile_master_list->TotalRecs, $lab_profile_master_list->RecRange, $lab_profile_master_list->AutoHidePager) ?>
<?php if ($lab_profile_master_list->Pager->RecordCount > 0 && $lab_profile_master_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($lab_profile_master_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_profile_master_list->pageUrl() ?>start=<?php echo $lab_profile_master_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($lab_profile_master_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_profile_master_list->pageUrl() ?>start=<?php echo $lab_profile_master_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($lab_profile_master_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $lab_profile_master_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($lab_profile_master_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_profile_master_list->pageUrl() ?>start=<?php echo $lab_profile_master_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($lab_profile_master_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_profile_master_list->pageUrl() ?>start=<?php echo $lab_profile_master_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($lab_profile_master_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $lab_profile_master_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $lab_profile_master_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $lab_profile_master_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($lab_profile_master_list->TotalRecs > 0 && (!$lab_profile_master_list->AutoHidePageSizeSelector || $lab_profile_master_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="lab_profile_master">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($lab_profile_master_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($lab_profile_master_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($lab_profile_master_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($lab_profile_master_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($lab_profile_master_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($lab_profile_master_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($lab_profile_master->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $lab_profile_master_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="flab_profile_masterlist" id="flab_profile_masterlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($lab_profile_master_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $lab_profile_master_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_profile_master">
<div id="gmp_lab_profile_master" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($lab_profile_master_list->TotalRecs > 0 || $lab_profile_master->isGridEdit()) { ?>
<table id="tbl_lab_profile_masterlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$lab_profile_master_list->RowType = ROWTYPE_HEADER;

// Render list options
$lab_profile_master_list->renderListOptions();

// Render list options (header, left)
$lab_profile_master_list->ListOptions->render("header", "left");
?>
<?php if ($lab_profile_master->id->Visible) { // id ?>
	<?php if ($lab_profile_master->sortUrl($lab_profile_master->id) == "") { ?>
		<th data-name="id" class="<?php echo $lab_profile_master->id->headerCellClass() ?>"><div id="elh_lab_profile_master_id" class="lab_profile_master_id"><div class="ew-table-header-caption"><?php echo $lab_profile_master->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $lab_profile_master->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_profile_master->SortUrl($lab_profile_master->id) ?>',1);"><div id="elh_lab_profile_master_id" class="lab_profile_master_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_master->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_master->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_profile_master->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_master->ProfileCode->Visible) { // ProfileCode ?>
	<?php if ($lab_profile_master->sortUrl($lab_profile_master->ProfileCode) == "") { ?>
		<th data-name="ProfileCode" class="<?php echo $lab_profile_master->ProfileCode->headerCellClass() ?>"><div id="elh_lab_profile_master_ProfileCode" class="lab_profile_master_ProfileCode"><div class="ew-table-header-caption"><?php echo $lab_profile_master->ProfileCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProfileCode" class="<?php echo $lab_profile_master->ProfileCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_profile_master->SortUrl($lab_profile_master->ProfileCode) ?>',1);"><div id="elh_lab_profile_master_ProfileCode" class="lab_profile_master_ProfileCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_master->ProfileCode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_master->ProfileCode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_profile_master->ProfileCode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_master->ProfileName->Visible) { // ProfileName ?>
	<?php if ($lab_profile_master->sortUrl($lab_profile_master->ProfileName) == "") { ?>
		<th data-name="ProfileName" class="<?php echo $lab_profile_master->ProfileName->headerCellClass() ?>"><div id="elh_lab_profile_master_ProfileName" class="lab_profile_master_ProfileName"><div class="ew-table-header-caption"><?php echo $lab_profile_master->ProfileName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProfileName" class="<?php echo $lab_profile_master->ProfileName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_profile_master->SortUrl($lab_profile_master->ProfileName) ?>',1);"><div id="elh_lab_profile_master_ProfileName" class="lab_profile_master_ProfileName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_master->ProfileName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_master->ProfileName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_profile_master->ProfileName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_master->ProfileAmount->Visible) { // ProfileAmount ?>
	<?php if ($lab_profile_master->sortUrl($lab_profile_master->ProfileAmount) == "") { ?>
		<th data-name="ProfileAmount" class="<?php echo $lab_profile_master->ProfileAmount->headerCellClass() ?>"><div id="elh_lab_profile_master_ProfileAmount" class="lab_profile_master_ProfileAmount"><div class="ew-table-header-caption"><?php echo $lab_profile_master->ProfileAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProfileAmount" class="<?php echo $lab_profile_master->ProfileAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_profile_master->SortUrl($lab_profile_master->ProfileAmount) ?>',1);"><div id="elh_lab_profile_master_ProfileAmount" class="lab_profile_master_ProfileAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_master->ProfileAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_master->ProfileAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_profile_master->ProfileAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_master->ProfileSpecialAmount->Visible) { // ProfileSpecialAmount ?>
	<?php if ($lab_profile_master->sortUrl($lab_profile_master->ProfileSpecialAmount) == "") { ?>
		<th data-name="ProfileSpecialAmount" class="<?php echo $lab_profile_master->ProfileSpecialAmount->headerCellClass() ?>"><div id="elh_lab_profile_master_ProfileSpecialAmount" class="lab_profile_master_ProfileSpecialAmount"><div class="ew-table-header-caption"><?php echo $lab_profile_master->ProfileSpecialAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProfileSpecialAmount" class="<?php echo $lab_profile_master->ProfileSpecialAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_profile_master->SortUrl($lab_profile_master->ProfileSpecialAmount) ?>',1);"><div id="elh_lab_profile_master_ProfileSpecialAmount" class="lab_profile_master_ProfileSpecialAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_master->ProfileSpecialAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_master->ProfileSpecialAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_profile_master->ProfileSpecialAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_master->ProfileMasterInactive->Visible) { // ProfileMasterInactive ?>
	<?php if ($lab_profile_master->sortUrl($lab_profile_master->ProfileMasterInactive) == "") { ?>
		<th data-name="ProfileMasterInactive" class="<?php echo $lab_profile_master->ProfileMasterInactive->headerCellClass() ?>"><div id="elh_lab_profile_master_ProfileMasterInactive" class="lab_profile_master_ProfileMasterInactive"><div class="ew-table-header-caption"><?php echo $lab_profile_master->ProfileMasterInactive->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProfileMasterInactive" class="<?php echo $lab_profile_master->ProfileMasterInactive->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_profile_master->SortUrl($lab_profile_master->ProfileMasterInactive) ?>',1);"><div id="elh_lab_profile_master_ProfileMasterInactive" class="lab_profile_master_ProfileMasterInactive">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_master->ProfileMasterInactive->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_master->ProfileMasterInactive->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_profile_master->ProfileMasterInactive->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_master->ReagentAmt->Visible) { // ReagentAmt ?>
	<?php if ($lab_profile_master->sortUrl($lab_profile_master->ReagentAmt) == "") { ?>
		<th data-name="ReagentAmt" class="<?php echo $lab_profile_master->ReagentAmt->headerCellClass() ?>"><div id="elh_lab_profile_master_ReagentAmt" class="lab_profile_master_ReagentAmt"><div class="ew-table-header-caption"><?php echo $lab_profile_master->ReagentAmt->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReagentAmt" class="<?php echo $lab_profile_master->ReagentAmt->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_profile_master->SortUrl($lab_profile_master->ReagentAmt) ?>',1);"><div id="elh_lab_profile_master_ReagentAmt" class="lab_profile_master_ReagentAmt">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_master->ReagentAmt->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_master->ReagentAmt->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_profile_master->ReagentAmt->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_master->LabAmt->Visible) { // LabAmt ?>
	<?php if ($lab_profile_master->sortUrl($lab_profile_master->LabAmt) == "") { ?>
		<th data-name="LabAmt" class="<?php echo $lab_profile_master->LabAmt->headerCellClass() ?>"><div id="elh_lab_profile_master_LabAmt" class="lab_profile_master_LabAmt"><div class="ew-table-header-caption"><?php echo $lab_profile_master->LabAmt->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LabAmt" class="<?php echo $lab_profile_master->LabAmt->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_profile_master->SortUrl($lab_profile_master->LabAmt) ?>',1);"><div id="elh_lab_profile_master_LabAmt" class="lab_profile_master_LabAmt">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_master->LabAmt->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_master->LabAmt->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_profile_master->LabAmt->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_master->RefAmt->Visible) { // RefAmt ?>
	<?php if ($lab_profile_master->sortUrl($lab_profile_master->RefAmt) == "") { ?>
		<th data-name="RefAmt" class="<?php echo $lab_profile_master->RefAmt->headerCellClass() ?>"><div id="elh_lab_profile_master_RefAmt" class="lab_profile_master_RefAmt"><div class="ew-table-header-caption"><?php echo $lab_profile_master->RefAmt->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RefAmt" class="<?php echo $lab_profile_master->RefAmt->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_profile_master->SortUrl($lab_profile_master->RefAmt) ?>',1);"><div id="elh_lab_profile_master_RefAmt" class="lab_profile_master_RefAmt">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_master->RefAmt->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_master->RefAmt->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_profile_master->RefAmt->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_master->MainDeptCD->Visible) { // MainDeptCD ?>
	<?php if ($lab_profile_master->sortUrl($lab_profile_master->MainDeptCD) == "") { ?>
		<th data-name="MainDeptCD" class="<?php echo $lab_profile_master->MainDeptCD->headerCellClass() ?>"><div id="elh_lab_profile_master_MainDeptCD" class="lab_profile_master_MainDeptCD"><div class="ew-table-header-caption"><?php echo $lab_profile_master->MainDeptCD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MainDeptCD" class="<?php echo $lab_profile_master->MainDeptCD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_profile_master->SortUrl($lab_profile_master->MainDeptCD) ?>',1);"><div id="elh_lab_profile_master_MainDeptCD" class="lab_profile_master_MainDeptCD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_master->MainDeptCD->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_master->MainDeptCD->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_profile_master->MainDeptCD->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_master->Individual->Visible) { // Individual ?>
	<?php if ($lab_profile_master->sortUrl($lab_profile_master->Individual) == "") { ?>
		<th data-name="Individual" class="<?php echo $lab_profile_master->Individual->headerCellClass() ?>"><div id="elh_lab_profile_master_Individual" class="lab_profile_master_Individual"><div class="ew-table-header-caption"><?php echo $lab_profile_master->Individual->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Individual" class="<?php echo $lab_profile_master->Individual->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_profile_master->SortUrl($lab_profile_master->Individual) ?>',1);"><div id="elh_lab_profile_master_Individual" class="lab_profile_master_Individual">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_master->Individual->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_master->Individual->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_profile_master->Individual->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_master->ShortName->Visible) { // ShortName ?>
	<?php if ($lab_profile_master->sortUrl($lab_profile_master->ShortName) == "") { ?>
		<th data-name="ShortName" class="<?php echo $lab_profile_master->ShortName->headerCellClass() ?>"><div id="elh_lab_profile_master_ShortName" class="lab_profile_master_ShortName"><div class="ew-table-header-caption"><?php echo $lab_profile_master->ShortName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ShortName" class="<?php echo $lab_profile_master->ShortName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_profile_master->SortUrl($lab_profile_master->ShortName) ?>',1);"><div id="elh_lab_profile_master_ShortName" class="lab_profile_master_ShortName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_master->ShortName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_master->ShortName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_profile_master->ShortName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_master->PrevAmt->Visible) { // PrevAmt ?>
	<?php if ($lab_profile_master->sortUrl($lab_profile_master->PrevAmt) == "") { ?>
		<th data-name="PrevAmt" class="<?php echo $lab_profile_master->PrevAmt->headerCellClass() ?>"><div id="elh_lab_profile_master_PrevAmt" class="lab_profile_master_PrevAmt"><div class="ew-table-header-caption"><?php echo $lab_profile_master->PrevAmt->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrevAmt" class="<?php echo $lab_profile_master->PrevAmt->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_profile_master->SortUrl($lab_profile_master->PrevAmt) ?>',1);"><div id="elh_lab_profile_master_PrevAmt" class="lab_profile_master_PrevAmt">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_master->PrevAmt->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_master->PrevAmt->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_profile_master->PrevAmt->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_master->BillName->Visible) { // BillName ?>
	<?php if ($lab_profile_master->sortUrl($lab_profile_master->BillName) == "") { ?>
		<th data-name="BillName" class="<?php echo $lab_profile_master->BillName->headerCellClass() ?>"><div id="elh_lab_profile_master_BillName" class="lab_profile_master_BillName"><div class="ew-table-header-caption"><?php echo $lab_profile_master->BillName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillName" class="<?php echo $lab_profile_master->BillName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_profile_master->SortUrl($lab_profile_master->BillName) ?>',1);"><div id="elh_lab_profile_master_BillName" class="lab_profile_master_BillName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_master->BillName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_master->BillName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_profile_master->BillName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_master->ActualAmt->Visible) { // ActualAmt ?>
	<?php if ($lab_profile_master->sortUrl($lab_profile_master->ActualAmt) == "") { ?>
		<th data-name="ActualAmt" class="<?php echo $lab_profile_master->ActualAmt->headerCellClass() ?>"><div id="elh_lab_profile_master_ActualAmt" class="lab_profile_master_ActualAmt"><div class="ew-table-header-caption"><?php echo $lab_profile_master->ActualAmt->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ActualAmt" class="<?php echo $lab_profile_master->ActualAmt->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_profile_master->SortUrl($lab_profile_master->ActualAmt) ?>',1);"><div id="elh_lab_profile_master_ActualAmt" class="lab_profile_master_ActualAmt">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_master->ActualAmt->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_master->ActualAmt->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_profile_master->ActualAmt->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_master->NoHeading->Visible) { // NoHeading ?>
	<?php if ($lab_profile_master->sortUrl($lab_profile_master->NoHeading) == "") { ?>
		<th data-name="NoHeading" class="<?php echo $lab_profile_master->NoHeading->headerCellClass() ?>"><div id="elh_lab_profile_master_NoHeading" class="lab_profile_master_NoHeading"><div class="ew-table-header-caption"><?php echo $lab_profile_master->NoHeading->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoHeading" class="<?php echo $lab_profile_master->NoHeading->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_profile_master->SortUrl($lab_profile_master->NoHeading) ?>',1);"><div id="elh_lab_profile_master_NoHeading" class="lab_profile_master_NoHeading">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_master->NoHeading->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_master->NoHeading->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_profile_master->NoHeading->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_master->EditDate->Visible) { // EditDate ?>
	<?php if ($lab_profile_master->sortUrl($lab_profile_master->EditDate) == "") { ?>
		<th data-name="EditDate" class="<?php echo $lab_profile_master->EditDate->headerCellClass() ?>"><div id="elh_lab_profile_master_EditDate" class="lab_profile_master_EditDate"><div class="ew-table-header-caption"><?php echo $lab_profile_master->EditDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EditDate" class="<?php echo $lab_profile_master->EditDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_profile_master->SortUrl($lab_profile_master->EditDate) ?>',1);"><div id="elh_lab_profile_master_EditDate" class="lab_profile_master_EditDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_master->EditDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_master->EditDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_profile_master->EditDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_master->EditUser->Visible) { // EditUser ?>
	<?php if ($lab_profile_master->sortUrl($lab_profile_master->EditUser) == "") { ?>
		<th data-name="EditUser" class="<?php echo $lab_profile_master->EditUser->headerCellClass() ?>"><div id="elh_lab_profile_master_EditUser" class="lab_profile_master_EditUser"><div class="ew-table-header-caption"><?php echo $lab_profile_master->EditUser->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EditUser" class="<?php echo $lab_profile_master->EditUser->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_profile_master->SortUrl($lab_profile_master->EditUser) ?>',1);"><div id="elh_lab_profile_master_EditUser" class="lab_profile_master_EditUser">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_master->EditUser->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_master->EditUser->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_profile_master->EditUser->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_master->HISCD->Visible) { // HISCD ?>
	<?php if ($lab_profile_master->sortUrl($lab_profile_master->HISCD) == "") { ?>
		<th data-name="HISCD" class="<?php echo $lab_profile_master->HISCD->headerCellClass() ?>"><div id="elh_lab_profile_master_HISCD" class="lab_profile_master_HISCD"><div class="ew-table-header-caption"><?php echo $lab_profile_master->HISCD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HISCD" class="<?php echo $lab_profile_master->HISCD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_profile_master->SortUrl($lab_profile_master->HISCD) ?>',1);"><div id="elh_lab_profile_master_HISCD" class="lab_profile_master_HISCD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_master->HISCD->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_master->HISCD->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_profile_master->HISCD->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_master->PriceList->Visible) { // PriceList ?>
	<?php if ($lab_profile_master->sortUrl($lab_profile_master->PriceList) == "") { ?>
		<th data-name="PriceList" class="<?php echo $lab_profile_master->PriceList->headerCellClass() ?>"><div id="elh_lab_profile_master_PriceList" class="lab_profile_master_PriceList"><div class="ew-table-header-caption"><?php echo $lab_profile_master->PriceList->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PriceList" class="<?php echo $lab_profile_master->PriceList->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_profile_master->SortUrl($lab_profile_master->PriceList) ?>',1);"><div id="elh_lab_profile_master_PriceList" class="lab_profile_master_PriceList">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_master->PriceList->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_master->PriceList->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_profile_master->PriceList->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_master->IPAmt->Visible) { // IPAmt ?>
	<?php if ($lab_profile_master->sortUrl($lab_profile_master->IPAmt) == "") { ?>
		<th data-name="IPAmt" class="<?php echo $lab_profile_master->IPAmt->headerCellClass() ?>"><div id="elh_lab_profile_master_IPAmt" class="lab_profile_master_IPAmt"><div class="ew-table-header-caption"><?php echo $lab_profile_master->IPAmt->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IPAmt" class="<?php echo $lab_profile_master->IPAmt->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_profile_master->SortUrl($lab_profile_master->IPAmt) ?>',1);"><div id="elh_lab_profile_master_IPAmt" class="lab_profile_master_IPAmt">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_master->IPAmt->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_master->IPAmt->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_profile_master->IPAmt->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_master->IInsAmt->Visible) { // IInsAmt ?>
	<?php if ($lab_profile_master->sortUrl($lab_profile_master->IInsAmt) == "") { ?>
		<th data-name="IInsAmt" class="<?php echo $lab_profile_master->IInsAmt->headerCellClass() ?>"><div id="elh_lab_profile_master_IInsAmt" class="lab_profile_master_IInsAmt"><div class="ew-table-header-caption"><?php echo $lab_profile_master->IInsAmt->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IInsAmt" class="<?php echo $lab_profile_master->IInsAmt->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_profile_master->SortUrl($lab_profile_master->IInsAmt) ?>',1);"><div id="elh_lab_profile_master_IInsAmt" class="lab_profile_master_IInsAmt">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_master->IInsAmt->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_master->IInsAmt->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_profile_master->IInsAmt->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_master->ManualCD->Visible) { // ManualCD ?>
	<?php if ($lab_profile_master->sortUrl($lab_profile_master->ManualCD) == "") { ?>
		<th data-name="ManualCD" class="<?php echo $lab_profile_master->ManualCD->headerCellClass() ?>"><div id="elh_lab_profile_master_ManualCD" class="lab_profile_master_ManualCD"><div class="ew-table-header-caption"><?php echo $lab_profile_master->ManualCD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ManualCD" class="<?php echo $lab_profile_master->ManualCD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_profile_master->SortUrl($lab_profile_master->ManualCD) ?>',1);"><div id="elh_lab_profile_master_ManualCD" class="lab_profile_master_ManualCD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_master->ManualCD->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_master->ManualCD->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_profile_master->ManualCD->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_master->Free->Visible) { // Free ?>
	<?php if ($lab_profile_master->sortUrl($lab_profile_master->Free) == "") { ?>
		<th data-name="Free" class="<?php echo $lab_profile_master->Free->headerCellClass() ?>"><div id="elh_lab_profile_master_Free" class="lab_profile_master_Free"><div class="ew-table-header-caption"><?php echo $lab_profile_master->Free->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Free" class="<?php echo $lab_profile_master->Free->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_profile_master->SortUrl($lab_profile_master->Free) ?>',1);"><div id="elh_lab_profile_master_Free" class="lab_profile_master_Free">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_master->Free->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_master->Free->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_profile_master->Free->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_master->IIpAmt->Visible) { // IIpAmt ?>
	<?php if ($lab_profile_master->sortUrl($lab_profile_master->IIpAmt) == "") { ?>
		<th data-name="IIpAmt" class="<?php echo $lab_profile_master->IIpAmt->headerCellClass() ?>"><div id="elh_lab_profile_master_IIpAmt" class="lab_profile_master_IIpAmt"><div class="ew-table-header-caption"><?php echo $lab_profile_master->IIpAmt->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IIpAmt" class="<?php echo $lab_profile_master->IIpAmt->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_profile_master->SortUrl($lab_profile_master->IIpAmt) ?>',1);"><div id="elh_lab_profile_master_IIpAmt" class="lab_profile_master_IIpAmt">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_master->IIpAmt->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_master->IIpAmt->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_profile_master->IIpAmt->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_master->InsAmt->Visible) { // InsAmt ?>
	<?php if ($lab_profile_master->sortUrl($lab_profile_master->InsAmt) == "") { ?>
		<th data-name="InsAmt" class="<?php echo $lab_profile_master->InsAmt->headerCellClass() ?>"><div id="elh_lab_profile_master_InsAmt" class="lab_profile_master_InsAmt"><div class="ew-table-header-caption"><?php echo $lab_profile_master->InsAmt->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="InsAmt" class="<?php echo $lab_profile_master->InsAmt->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_profile_master->SortUrl($lab_profile_master->InsAmt) ?>',1);"><div id="elh_lab_profile_master_InsAmt" class="lab_profile_master_InsAmt">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_master->InsAmt->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_master->InsAmt->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_profile_master->InsAmt->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_master->OutSource->Visible) { // OutSource ?>
	<?php if ($lab_profile_master->sortUrl($lab_profile_master->OutSource) == "") { ?>
		<th data-name="OutSource" class="<?php echo $lab_profile_master->OutSource->headerCellClass() ?>"><div id="elh_lab_profile_master_OutSource" class="lab_profile_master_OutSource"><div class="ew-table-header-caption"><?php echo $lab_profile_master->OutSource->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OutSource" class="<?php echo $lab_profile_master->OutSource->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_profile_master->SortUrl($lab_profile_master->OutSource) ?>',1);"><div id="elh_lab_profile_master_OutSource" class="lab_profile_master_OutSource">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_master->OutSource->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_master->OutSource->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_profile_master->OutSource->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$lab_profile_master_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($lab_profile_master->ExportAll && $lab_profile_master->isExport()) {
	$lab_profile_master_list->StopRec = $lab_profile_master_list->TotalRecs;
} else {

	// Set the last record to display
	if ($lab_profile_master_list->TotalRecs > $lab_profile_master_list->StartRec + $lab_profile_master_list->DisplayRecs - 1)
		$lab_profile_master_list->StopRec = $lab_profile_master_list->StartRec + $lab_profile_master_list->DisplayRecs - 1;
	else
		$lab_profile_master_list->StopRec = $lab_profile_master_list->TotalRecs;
}
$lab_profile_master_list->RecCnt = $lab_profile_master_list->StartRec - 1;
if ($lab_profile_master_list->Recordset && !$lab_profile_master_list->Recordset->EOF) {
	$lab_profile_master_list->Recordset->moveFirst();
	$selectLimit = $lab_profile_master_list->UseSelectLimit;
	if (!$selectLimit && $lab_profile_master_list->StartRec > 1)
		$lab_profile_master_list->Recordset->move($lab_profile_master_list->StartRec - 1);
} elseif (!$lab_profile_master->AllowAddDeleteRow && $lab_profile_master_list->StopRec == 0) {
	$lab_profile_master_list->StopRec = $lab_profile_master->GridAddRowCount;
}

// Initialize aggregate
$lab_profile_master->RowType = ROWTYPE_AGGREGATEINIT;
$lab_profile_master->resetAttributes();
$lab_profile_master_list->renderRow();
while ($lab_profile_master_list->RecCnt < $lab_profile_master_list->StopRec) {
	$lab_profile_master_list->RecCnt++;
	if ($lab_profile_master_list->RecCnt >= $lab_profile_master_list->StartRec) {
		$lab_profile_master_list->RowCnt++;

		// Set up key count
		$lab_profile_master_list->KeyCount = $lab_profile_master_list->RowIndex;

		// Init row class and style
		$lab_profile_master->resetAttributes();
		$lab_profile_master->CssClass = "";
		if ($lab_profile_master->isGridAdd()) {
		} else {
			$lab_profile_master_list->loadRowValues($lab_profile_master_list->Recordset); // Load row values
		}
		$lab_profile_master->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$lab_profile_master->RowAttrs = array_merge($lab_profile_master->RowAttrs, array('data-rowindex'=>$lab_profile_master_list->RowCnt, 'id'=>'r' . $lab_profile_master_list->RowCnt . '_lab_profile_master', 'data-rowtype'=>$lab_profile_master->RowType));

		// Render row
		$lab_profile_master_list->renderRow();

		// Render list options
		$lab_profile_master_list->renderListOptions();
?>
	<tr<?php echo $lab_profile_master->rowAttributes() ?>>
<?php

// Render list options (body, left)
$lab_profile_master_list->ListOptions->render("body", "left", $lab_profile_master_list->RowCnt);
?>
	<?php if ($lab_profile_master->id->Visible) { // id ?>
		<td data-name="id"<?php echo $lab_profile_master->id->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_list->RowCnt ?>_lab_profile_master_id" class="lab_profile_master_id">
<span<?php echo $lab_profile_master->id->viewAttributes() ?>>
<?php echo $lab_profile_master->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_profile_master->ProfileCode->Visible) { // ProfileCode ?>
		<td data-name="ProfileCode"<?php echo $lab_profile_master->ProfileCode->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_list->RowCnt ?>_lab_profile_master_ProfileCode" class="lab_profile_master_ProfileCode">
<span<?php echo $lab_profile_master->ProfileCode->viewAttributes() ?>>
<?php echo $lab_profile_master->ProfileCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_profile_master->ProfileName->Visible) { // ProfileName ?>
		<td data-name="ProfileName"<?php echo $lab_profile_master->ProfileName->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_list->RowCnt ?>_lab_profile_master_ProfileName" class="lab_profile_master_ProfileName">
<span<?php echo $lab_profile_master->ProfileName->viewAttributes() ?>>
<?php echo $lab_profile_master->ProfileName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_profile_master->ProfileAmount->Visible) { // ProfileAmount ?>
		<td data-name="ProfileAmount"<?php echo $lab_profile_master->ProfileAmount->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_list->RowCnt ?>_lab_profile_master_ProfileAmount" class="lab_profile_master_ProfileAmount">
<span<?php echo $lab_profile_master->ProfileAmount->viewAttributes() ?>>
<?php echo $lab_profile_master->ProfileAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_profile_master->ProfileSpecialAmount->Visible) { // ProfileSpecialAmount ?>
		<td data-name="ProfileSpecialAmount"<?php echo $lab_profile_master->ProfileSpecialAmount->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_list->RowCnt ?>_lab_profile_master_ProfileSpecialAmount" class="lab_profile_master_ProfileSpecialAmount">
<span<?php echo $lab_profile_master->ProfileSpecialAmount->viewAttributes() ?>>
<?php echo $lab_profile_master->ProfileSpecialAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_profile_master->ProfileMasterInactive->Visible) { // ProfileMasterInactive ?>
		<td data-name="ProfileMasterInactive"<?php echo $lab_profile_master->ProfileMasterInactive->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_list->RowCnt ?>_lab_profile_master_ProfileMasterInactive" class="lab_profile_master_ProfileMasterInactive">
<span<?php echo $lab_profile_master->ProfileMasterInactive->viewAttributes() ?>>
<?php echo $lab_profile_master->ProfileMasterInactive->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_profile_master->ReagentAmt->Visible) { // ReagentAmt ?>
		<td data-name="ReagentAmt"<?php echo $lab_profile_master->ReagentAmt->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_list->RowCnt ?>_lab_profile_master_ReagentAmt" class="lab_profile_master_ReagentAmt">
<span<?php echo $lab_profile_master->ReagentAmt->viewAttributes() ?>>
<?php echo $lab_profile_master->ReagentAmt->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_profile_master->LabAmt->Visible) { // LabAmt ?>
		<td data-name="LabAmt"<?php echo $lab_profile_master->LabAmt->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_list->RowCnt ?>_lab_profile_master_LabAmt" class="lab_profile_master_LabAmt">
<span<?php echo $lab_profile_master->LabAmt->viewAttributes() ?>>
<?php echo $lab_profile_master->LabAmt->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_profile_master->RefAmt->Visible) { // RefAmt ?>
		<td data-name="RefAmt"<?php echo $lab_profile_master->RefAmt->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_list->RowCnt ?>_lab_profile_master_RefAmt" class="lab_profile_master_RefAmt">
<span<?php echo $lab_profile_master->RefAmt->viewAttributes() ?>>
<?php echo $lab_profile_master->RefAmt->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_profile_master->MainDeptCD->Visible) { // MainDeptCD ?>
		<td data-name="MainDeptCD"<?php echo $lab_profile_master->MainDeptCD->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_list->RowCnt ?>_lab_profile_master_MainDeptCD" class="lab_profile_master_MainDeptCD">
<span<?php echo $lab_profile_master->MainDeptCD->viewAttributes() ?>>
<?php echo $lab_profile_master->MainDeptCD->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_profile_master->Individual->Visible) { // Individual ?>
		<td data-name="Individual"<?php echo $lab_profile_master->Individual->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_list->RowCnt ?>_lab_profile_master_Individual" class="lab_profile_master_Individual">
<span<?php echo $lab_profile_master->Individual->viewAttributes() ?>>
<?php echo $lab_profile_master->Individual->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_profile_master->ShortName->Visible) { // ShortName ?>
		<td data-name="ShortName"<?php echo $lab_profile_master->ShortName->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_list->RowCnt ?>_lab_profile_master_ShortName" class="lab_profile_master_ShortName">
<span<?php echo $lab_profile_master->ShortName->viewAttributes() ?>>
<?php echo $lab_profile_master->ShortName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_profile_master->PrevAmt->Visible) { // PrevAmt ?>
		<td data-name="PrevAmt"<?php echo $lab_profile_master->PrevAmt->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_list->RowCnt ?>_lab_profile_master_PrevAmt" class="lab_profile_master_PrevAmt">
<span<?php echo $lab_profile_master->PrevAmt->viewAttributes() ?>>
<?php echo $lab_profile_master->PrevAmt->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_profile_master->BillName->Visible) { // BillName ?>
		<td data-name="BillName"<?php echo $lab_profile_master->BillName->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_list->RowCnt ?>_lab_profile_master_BillName" class="lab_profile_master_BillName">
<span<?php echo $lab_profile_master->BillName->viewAttributes() ?>>
<?php echo $lab_profile_master->BillName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_profile_master->ActualAmt->Visible) { // ActualAmt ?>
		<td data-name="ActualAmt"<?php echo $lab_profile_master->ActualAmt->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_list->RowCnt ?>_lab_profile_master_ActualAmt" class="lab_profile_master_ActualAmt">
<span<?php echo $lab_profile_master->ActualAmt->viewAttributes() ?>>
<?php echo $lab_profile_master->ActualAmt->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_profile_master->NoHeading->Visible) { // NoHeading ?>
		<td data-name="NoHeading"<?php echo $lab_profile_master->NoHeading->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_list->RowCnt ?>_lab_profile_master_NoHeading" class="lab_profile_master_NoHeading">
<span<?php echo $lab_profile_master->NoHeading->viewAttributes() ?>>
<?php echo $lab_profile_master->NoHeading->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_profile_master->EditDate->Visible) { // EditDate ?>
		<td data-name="EditDate"<?php echo $lab_profile_master->EditDate->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_list->RowCnt ?>_lab_profile_master_EditDate" class="lab_profile_master_EditDate">
<span<?php echo $lab_profile_master->EditDate->viewAttributes() ?>>
<?php echo $lab_profile_master->EditDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_profile_master->EditUser->Visible) { // EditUser ?>
		<td data-name="EditUser"<?php echo $lab_profile_master->EditUser->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_list->RowCnt ?>_lab_profile_master_EditUser" class="lab_profile_master_EditUser">
<span<?php echo $lab_profile_master->EditUser->viewAttributes() ?>>
<?php echo $lab_profile_master->EditUser->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_profile_master->HISCD->Visible) { // HISCD ?>
		<td data-name="HISCD"<?php echo $lab_profile_master->HISCD->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_list->RowCnt ?>_lab_profile_master_HISCD" class="lab_profile_master_HISCD">
<span<?php echo $lab_profile_master->HISCD->viewAttributes() ?>>
<?php echo $lab_profile_master->HISCD->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_profile_master->PriceList->Visible) { // PriceList ?>
		<td data-name="PriceList"<?php echo $lab_profile_master->PriceList->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_list->RowCnt ?>_lab_profile_master_PriceList" class="lab_profile_master_PriceList">
<span<?php echo $lab_profile_master->PriceList->viewAttributes() ?>>
<?php echo $lab_profile_master->PriceList->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_profile_master->IPAmt->Visible) { // IPAmt ?>
		<td data-name="IPAmt"<?php echo $lab_profile_master->IPAmt->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_list->RowCnt ?>_lab_profile_master_IPAmt" class="lab_profile_master_IPAmt">
<span<?php echo $lab_profile_master->IPAmt->viewAttributes() ?>>
<?php echo $lab_profile_master->IPAmt->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_profile_master->IInsAmt->Visible) { // IInsAmt ?>
		<td data-name="IInsAmt"<?php echo $lab_profile_master->IInsAmt->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_list->RowCnt ?>_lab_profile_master_IInsAmt" class="lab_profile_master_IInsAmt">
<span<?php echo $lab_profile_master->IInsAmt->viewAttributes() ?>>
<?php echo $lab_profile_master->IInsAmt->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_profile_master->ManualCD->Visible) { // ManualCD ?>
		<td data-name="ManualCD"<?php echo $lab_profile_master->ManualCD->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_list->RowCnt ?>_lab_profile_master_ManualCD" class="lab_profile_master_ManualCD">
<span<?php echo $lab_profile_master->ManualCD->viewAttributes() ?>>
<?php echo $lab_profile_master->ManualCD->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_profile_master->Free->Visible) { // Free ?>
		<td data-name="Free"<?php echo $lab_profile_master->Free->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_list->RowCnt ?>_lab_profile_master_Free" class="lab_profile_master_Free">
<span<?php echo $lab_profile_master->Free->viewAttributes() ?>>
<?php echo $lab_profile_master->Free->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_profile_master->IIpAmt->Visible) { // IIpAmt ?>
		<td data-name="IIpAmt"<?php echo $lab_profile_master->IIpAmt->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_list->RowCnt ?>_lab_profile_master_IIpAmt" class="lab_profile_master_IIpAmt">
<span<?php echo $lab_profile_master->IIpAmt->viewAttributes() ?>>
<?php echo $lab_profile_master->IIpAmt->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_profile_master->InsAmt->Visible) { // InsAmt ?>
		<td data-name="InsAmt"<?php echo $lab_profile_master->InsAmt->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_list->RowCnt ?>_lab_profile_master_InsAmt" class="lab_profile_master_InsAmt">
<span<?php echo $lab_profile_master->InsAmt->viewAttributes() ?>>
<?php echo $lab_profile_master->InsAmt->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_profile_master->OutSource->Visible) { // OutSource ?>
		<td data-name="OutSource"<?php echo $lab_profile_master->OutSource->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_list->RowCnt ?>_lab_profile_master_OutSource" class="lab_profile_master_OutSource">
<span<?php echo $lab_profile_master->OutSource->viewAttributes() ?>>
<?php echo $lab_profile_master->OutSource->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$lab_profile_master_list->ListOptions->render("body", "right", $lab_profile_master_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$lab_profile_master->isGridAdd())
		$lab_profile_master_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$lab_profile_master->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($lab_profile_master_list->Recordset)
	$lab_profile_master_list->Recordset->Close();
?>
<?php if (!$lab_profile_master->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$lab_profile_master->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($lab_profile_master_list->Pager)) $lab_profile_master_list->Pager = new NumericPager($lab_profile_master_list->StartRec, $lab_profile_master_list->DisplayRecs, $lab_profile_master_list->TotalRecs, $lab_profile_master_list->RecRange, $lab_profile_master_list->AutoHidePager) ?>
<?php if ($lab_profile_master_list->Pager->RecordCount > 0 && $lab_profile_master_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($lab_profile_master_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_profile_master_list->pageUrl() ?>start=<?php echo $lab_profile_master_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($lab_profile_master_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_profile_master_list->pageUrl() ?>start=<?php echo $lab_profile_master_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($lab_profile_master_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $lab_profile_master_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($lab_profile_master_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_profile_master_list->pageUrl() ?>start=<?php echo $lab_profile_master_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($lab_profile_master_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_profile_master_list->pageUrl() ?>start=<?php echo $lab_profile_master_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($lab_profile_master_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $lab_profile_master_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $lab_profile_master_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $lab_profile_master_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($lab_profile_master_list->TotalRecs > 0 && (!$lab_profile_master_list->AutoHidePageSizeSelector || $lab_profile_master_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="lab_profile_master">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($lab_profile_master_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($lab_profile_master_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($lab_profile_master_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($lab_profile_master_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($lab_profile_master_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($lab_profile_master_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($lab_profile_master->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $lab_profile_master_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($lab_profile_master_list->TotalRecs == 0 && !$lab_profile_master->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $lab_profile_master_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$lab_profile_master_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$lab_profile_master->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$lab_profile_master->isExport()) { ?>
<script>
ew.scrollableTable("gmp_lab_profile_master", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$lab_profile_master_list->terminate();
?>