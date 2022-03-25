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
$monitor_treatment_plan_list = new monitor_treatment_plan_list();

// Run the page
$monitor_treatment_plan_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$monitor_treatment_plan_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$monitor_treatment_plan->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fmonitor_treatment_planlist = currentForm = new ew.Form("fmonitor_treatment_planlist", "list");
fmonitor_treatment_planlist.formKeyCountName = '<?php echo $monitor_treatment_plan_list->FormKeyCountName ?>';

// Form_CustomValidate event
fmonitor_treatment_planlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fmonitor_treatment_planlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fmonitor_treatment_planlist.lists["x_PatId"] = <?php echo $monitor_treatment_plan_list->PatId->Lookup->toClientList() ?>;
fmonitor_treatment_planlist.lists["x_PatId"].options = <?php echo JsonEncode($monitor_treatment_plan_list->PatId->lookupOptions()) ?>;
fmonitor_treatment_planlist.lists["x_NewVisitYesNo[]"] = <?php echo $monitor_treatment_plan_list->NewVisitYesNo->Lookup->toClientList() ?>;
fmonitor_treatment_planlist.lists["x_NewVisitYesNo[]"].options = <?php echo JsonEncode($monitor_treatment_plan_list->NewVisitYesNo->options(FALSE, TRUE)) ?>;
fmonitor_treatment_planlist.lists["x_Treatment"] = <?php echo $monitor_treatment_plan_list->Treatment->Lookup->toClientList() ?>;
fmonitor_treatment_planlist.lists["x_Treatment"].options = <?php echo JsonEncode($monitor_treatment_plan_list->Treatment->options(FALSE, TRUE)) ?>;
fmonitor_treatment_planlist.lists["x_IUIDoneYesNo1[]"] = <?php echo $monitor_treatment_plan_list->IUIDoneYesNo1->Lookup->toClientList() ?>;
fmonitor_treatment_planlist.lists["x_IUIDoneYesNo1[]"].options = <?php echo JsonEncode($monitor_treatment_plan_list->IUIDoneYesNo1->options(FALSE, TRUE)) ?>;
fmonitor_treatment_planlist.lists["x_UPTTestYesNo1[]"] = <?php echo $monitor_treatment_plan_list->UPTTestYesNo1->Lookup->toClientList() ?>;
fmonitor_treatment_planlist.lists["x_UPTTestYesNo1[]"].options = <?php echo JsonEncode($monitor_treatment_plan_list->UPTTestYesNo1->options(FALSE, TRUE)) ?>;
fmonitor_treatment_planlist.lists["x_IUIDoneYesNo2[]"] = <?php echo $monitor_treatment_plan_list->IUIDoneYesNo2->Lookup->toClientList() ?>;
fmonitor_treatment_planlist.lists["x_IUIDoneYesNo2[]"].options = <?php echo JsonEncode($monitor_treatment_plan_list->IUIDoneYesNo2->options(FALSE, TRUE)) ?>;
fmonitor_treatment_planlist.lists["x_UPTTestYesNo2[]"] = <?php echo $monitor_treatment_plan_list->UPTTestYesNo2->Lookup->toClientList() ?>;
fmonitor_treatment_planlist.lists["x_UPTTestYesNo2[]"].options = <?php echo JsonEncode($monitor_treatment_plan_list->UPTTestYesNo2->options(FALSE, TRUE)) ?>;
fmonitor_treatment_planlist.lists["x_IUIDoneYesNo3[]"] = <?php echo $monitor_treatment_plan_list->IUIDoneYesNo3->Lookup->toClientList() ?>;
fmonitor_treatment_planlist.lists["x_IUIDoneYesNo3[]"].options = <?php echo JsonEncode($monitor_treatment_plan_list->IUIDoneYesNo3->options(FALSE, TRUE)) ?>;
fmonitor_treatment_planlist.lists["x_UPTTestYesNo3[]"] = <?php echo $monitor_treatment_plan_list->UPTTestYesNo3->Lookup->toClientList() ?>;
fmonitor_treatment_planlist.lists["x_UPTTestYesNo3[]"].options = <?php echo JsonEncode($monitor_treatment_plan_list->UPTTestYesNo3->options(FALSE, TRUE)) ?>;
fmonitor_treatment_planlist.lists["x_IUIDoneYesNo4[]"] = <?php echo $monitor_treatment_plan_list->IUIDoneYesNo4->Lookup->toClientList() ?>;
fmonitor_treatment_planlist.lists["x_IUIDoneYesNo4[]"].options = <?php echo JsonEncode($monitor_treatment_plan_list->IUIDoneYesNo4->options(FALSE, TRUE)) ?>;
fmonitor_treatment_planlist.lists["x_UPTTestYesNo4[]"] = <?php echo $monitor_treatment_plan_list->UPTTestYesNo4->Lookup->toClientList() ?>;
fmonitor_treatment_planlist.lists["x_UPTTestYesNo4[]"].options = <?php echo JsonEncode($monitor_treatment_plan_list->UPTTestYesNo4->options(FALSE, TRUE)) ?>;
fmonitor_treatment_planlist.lists["x_IVFStimulationYesNo[]"] = <?php echo $monitor_treatment_plan_list->IVFStimulationYesNo->Lookup->toClientList() ?>;
fmonitor_treatment_planlist.lists["x_IVFStimulationYesNo[]"].options = <?php echo JsonEncode($monitor_treatment_plan_list->IVFStimulationYesNo->options(FALSE, TRUE)) ?>;
fmonitor_treatment_planlist.lists["x_OPUYesNo[]"] = <?php echo $monitor_treatment_plan_list->OPUYesNo->Lookup->toClientList() ?>;
fmonitor_treatment_planlist.lists["x_OPUYesNo[]"].options = <?php echo JsonEncode($monitor_treatment_plan_list->OPUYesNo->options(FALSE, TRUE)) ?>;
fmonitor_treatment_planlist.lists["x_ETYesNo[]"] = <?php echo $monitor_treatment_plan_list->ETYesNo->Lookup->toClientList() ?>;
fmonitor_treatment_planlist.lists["x_ETYesNo[]"].options = <?php echo JsonEncode($monitor_treatment_plan_list->ETYesNo->options(FALSE, TRUE)) ?>;
fmonitor_treatment_planlist.lists["x_BetaHCGYesNo[]"] = <?php echo $monitor_treatment_plan_list->BetaHCGYesNo->Lookup->toClientList() ?>;
fmonitor_treatment_planlist.lists["x_BetaHCGYesNo[]"].options = <?php echo JsonEncode($monitor_treatment_plan_list->BetaHCGYesNo->options(FALSE, TRUE)) ?>;
fmonitor_treatment_planlist.lists["x_FETYesNo[]"] = <?php echo $monitor_treatment_plan_list->FETYesNo->Lookup->toClientList() ?>;
fmonitor_treatment_planlist.lists["x_FETYesNo[]"].options = <?php echo JsonEncode($monitor_treatment_plan_list->FETYesNo->options(FALSE, TRUE)) ?>;
fmonitor_treatment_planlist.lists["x_FBetaHCGYesNo[]"] = <?php echo $monitor_treatment_plan_list->FBetaHCGYesNo->Lookup->toClientList() ?>;
fmonitor_treatment_planlist.lists["x_FBetaHCGYesNo[]"].options = <?php echo JsonEncode($monitor_treatment_plan_list->FBetaHCGYesNo->options(FALSE, TRUE)) ?>;

// Form object for search
var fmonitor_treatment_planlistsrch = currentSearchForm = new ew.Form("fmonitor_treatment_planlistsrch");

// Filters
fmonitor_treatment_planlistsrch.filterList = <?php echo $monitor_treatment_plan_list->getFilterList() ?>;
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
<?php if (!$monitor_treatment_plan->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($monitor_treatment_plan_list->TotalRecs > 0 && $monitor_treatment_plan_list->ExportOptions->visible()) { ?>
<?php $monitor_treatment_plan_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($monitor_treatment_plan_list->ImportOptions->visible()) { ?>
<?php $monitor_treatment_plan_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($monitor_treatment_plan_list->SearchOptions->visible()) { ?>
<?php $monitor_treatment_plan_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($monitor_treatment_plan_list->FilterOptions->visible()) { ?>
<?php $monitor_treatment_plan_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$monitor_treatment_plan_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$monitor_treatment_plan->isExport() && !$monitor_treatment_plan->CurrentAction) { ?>
<form name="fmonitor_treatment_planlistsrch" id="fmonitor_treatment_planlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($monitor_treatment_plan_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fmonitor_treatment_planlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="monitor_treatment_plan">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($monitor_treatment_plan_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($monitor_treatment_plan_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $monitor_treatment_plan_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($monitor_treatment_plan_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($monitor_treatment_plan_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($monitor_treatment_plan_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($monitor_treatment_plan_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $monitor_treatment_plan_list->showPageHeader(); ?>
<?php
$monitor_treatment_plan_list->showMessage();
?>
<?php if ($monitor_treatment_plan_list->TotalRecs > 0 || $monitor_treatment_plan->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($monitor_treatment_plan_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> monitor_treatment_plan">
<?php if (!$monitor_treatment_plan->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$monitor_treatment_plan->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($monitor_treatment_plan_list->Pager)) $monitor_treatment_plan_list->Pager = new NumericPager($monitor_treatment_plan_list->StartRec, $monitor_treatment_plan_list->DisplayRecs, $monitor_treatment_plan_list->TotalRecs, $monitor_treatment_plan_list->RecRange, $monitor_treatment_plan_list->AutoHidePager) ?>
<?php if ($monitor_treatment_plan_list->Pager->RecordCount > 0 && $monitor_treatment_plan_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($monitor_treatment_plan_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $monitor_treatment_plan_list->pageUrl() ?>start=<?php echo $monitor_treatment_plan_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($monitor_treatment_plan_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $monitor_treatment_plan_list->pageUrl() ?>start=<?php echo $monitor_treatment_plan_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($monitor_treatment_plan_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $monitor_treatment_plan_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($monitor_treatment_plan_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $monitor_treatment_plan_list->pageUrl() ?>start=<?php echo $monitor_treatment_plan_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($monitor_treatment_plan_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $monitor_treatment_plan_list->pageUrl() ?>start=<?php echo $monitor_treatment_plan_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($monitor_treatment_plan_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $monitor_treatment_plan_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $monitor_treatment_plan_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $monitor_treatment_plan_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($monitor_treatment_plan_list->TotalRecs > 0 && (!$monitor_treatment_plan_list->AutoHidePageSizeSelector || $monitor_treatment_plan_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="monitor_treatment_plan">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($monitor_treatment_plan_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($monitor_treatment_plan_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($monitor_treatment_plan_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($monitor_treatment_plan_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($monitor_treatment_plan_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($monitor_treatment_plan_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($monitor_treatment_plan->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $monitor_treatment_plan_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fmonitor_treatment_planlist" id="fmonitor_treatment_planlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($monitor_treatment_plan_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $monitor_treatment_plan_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="monitor_treatment_plan">
<div id="gmp_monitor_treatment_plan" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($monitor_treatment_plan_list->TotalRecs > 0 || $monitor_treatment_plan->isGridEdit()) { ?>
<table id="tbl_monitor_treatment_planlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$monitor_treatment_plan_list->RowType = ROWTYPE_HEADER;

// Render list options
$monitor_treatment_plan_list->renderListOptions();

// Render list options (header, left)
$monitor_treatment_plan_list->ListOptions->render("header", "left");
?>
<?php if ($monitor_treatment_plan->id->Visible) { // id ?>
	<?php if ($monitor_treatment_plan->sortUrl($monitor_treatment_plan->id) == "") { ?>
		<th data-name="id" class="<?php echo $monitor_treatment_plan->id->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_id" class="monitor_treatment_plan_id"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $monitor_treatment_plan->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $monitor_treatment_plan->SortUrl($monitor_treatment_plan->id) ?>',1);"><div id="elh_monitor_treatment_plan_id" class="monitor_treatment_plan_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($monitor_treatment_plan->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan->PatId->Visible) { // PatId ?>
	<?php if ($monitor_treatment_plan->sortUrl($monitor_treatment_plan->PatId) == "") { ?>
		<th data-name="PatId" class="<?php echo $monitor_treatment_plan->PatId->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_PatId" class="monitor_treatment_plan_PatId"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan->PatId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatId" class="<?php echo $monitor_treatment_plan->PatId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $monitor_treatment_plan->SortUrl($monitor_treatment_plan->PatId) ?>',1);"><div id="elh_monitor_treatment_plan_PatId" class="monitor_treatment_plan_PatId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan->PatId->caption() ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan->PatId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($monitor_treatment_plan->PatId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan->PatientId->Visible) { // PatientId ?>
	<?php if ($monitor_treatment_plan->sortUrl($monitor_treatment_plan->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $monitor_treatment_plan->PatientId->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_PatientId" class="monitor_treatment_plan_PatientId"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $monitor_treatment_plan->PatientId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $monitor_treatment_plan->SortUrl($monitor_treatment_plan->PatientId) ?>',1);"><div id="elh_monitor_treatment_plan_PatientId" class="monitor_treatment_plan_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan->PatientId->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan->PatientId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($monitor_treatment_plan->PatientId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan->PatientName->Visible) { // PatientName ?>
	<?php if ($monitor_treatment_plan->sortUrl($monitor_treatment_plan->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $monitor_treatment_plan->PatientName->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_PatientName" class="monitor_treatment_plan_PatientName"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $monitor_treatment_plan->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $monitor_treatment_plan->SortUrl($monitor_treatment_plan->PatientName) ?>',1);"><div id="elh_monitor_treatment_plan_PatientName" class="monitor_treatment_plan_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($monitor_treatment_plan->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan->Age->Visible) { // Age ?>
	<?php if ($monitor_treatment_plan->sortUrl($monitor_treatment_plan->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $monitor_treatment_plan->Age->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_Age" class="monitor_treatment_plan_Age"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan->Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $monitor_treatment_plan->Age->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $monitor_treatment_plan->SortUrl($monitor_treatment_plan->Age) ?>',1);"><div id="elh_monitor_treatment_plan_Age" class="monitor_treatment_plan_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan->Age->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan->Age->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($monitor_treatment_plan->Age->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan->MobileNo->Visible) { // MobileNo ?>
	<?php if ($monitor_treatment_plan->sortUrl($monitor_treatment_plan->MobileNo) == "") { ?>
		<th data-name="MobileNo" class="<?php echo $monitor_treatment_plan->MobileNo->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_MobileNo" class="monitor_treatment_plan_MobileNo"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan->MobileNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MobileNo" class="<?php echo $monitor_treatment_plan->MobileNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $monitor_treatment_plan->SortUrl($monitor_treatment_plan->MobileNo) ?>',1);"><div id="elh_monitor_treatment_plan_MobileNo" class="monitor_treatment_plan_MobileNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan->MobileNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan->MobileNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($monitor_treatment_plan->MobileNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan->ConsultantName->Visible) { // ConsultantName ?>
	<?php if ($monitor_treatment_plan->sortUrl($monitor_treatment_plan->ConsultantName) == "") { ?>
		<th data-name="ConsultantName" class="<?php echo $monitor_treatment_plan->ConsultantName->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_ConsultantName" class="monitor_treatment_plan_ConsultantName"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan->ConsultantName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ConsultantName" class="<?php echo $monitor_treatment_plan->ConsultantName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $monitor_treatment_plan->SortUrl($monitor_treatment_plan->ConsultantName) ?>',1);"><div id="elh_monitor_treatment_plan_ConsultantName" class="monitor_treatment_plan_ConsultantName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan->ConsultantName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan->ConsultantName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($monitor_treatment_plan->ConsultantName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan->RefDrName->Visible) { // RefDrName ?>
	<?php if ($monitor_treatment_plan->sortUrl($monitor_treatment_plan->RefDrName) == "") { ?>
		<th data-name="RefDrName" class="<?php echo $monitor_treatment_plan->RefDrName->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_RefDrName" class="monitor_treatment_plan_RefDrName"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan->RefDrName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RefDrName" class="<?php echo $monitor_treatment_plan->RefDrName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $monitor_treatment_plan->SortUrl($monitor_treatment_plan->RefDrName) ?>',1);"><div id="elh_monitor_treatment_plan_RefDrName" class="monitor_treatment_plan_RefDrName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan->RefDrName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan->RefDrName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($monitor_treatment_plan->RefDrName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan->RefDrMobileNo->Visible) { // RefDrMobileNo ?>
	<?php if ($monitor_treatment_plan->sortUrl($monitor_treatment_plan->RefDrMobileNo) == "") { ?>
		<th data-name="RefDrMobileNo" class="<?php echo $monitor_treatment_plan->RefDrMobileNo->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_RefDrMobileNo" class="monitor_treatment_plan_RefDrMobileNo"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan->RefDrMobileNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RefDrMobileNo" class="<?php echo $monitor_treatment_plan->RefDrMobileNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $monitor_treatment_plan->SortUrl($monitor_treatment_plan->RefDrMobileNo) ?>',1);"><div id="elh_monitor_treatment_plan_RefDrMobileNo" class="monitor_treatment_plan_RefDrMobileNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan->RefDrMobileNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan->RefDrMobileNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($monitor_treatment_plan->RefDrMobileNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan->NewVisitDate->Visible) { // NewVisitDate ?>
	<?php if ($monitor_treatment_plan->sortUrl($monitor_treatment_plan->NewVisitDate) == "") { ?>
		<th data-name="NewVisitDate" class="<?php echo $monitor_treatment_plan->NewVisitDate->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_NewVisitDate" class="monitor_treatment_plan_NewVisitDate"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan->NewVisitDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NewVisitDate" class="<?php echo $monitor_treatment_plan->NewVisitDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $monitor_treatment_plan->SortUrl($monitor_treatment_plan->NewVisitDate) ?>',1);"><div id="elh_monitor_treatment_plan_NewVisitDate" class="monitor_treatment_plan_NewVisitDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan->NewVisitDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan->NewVisitDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($monitor_treatment_plan->NewVisitDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan->NewVisitYesNo->Visible) { // NewVisitYesNo ?>
	<?php if ($monitor_treatment_plan->sortUrl($monitor_treatment_plan->NewVisitYesNo) == "") { ?>
		<th data-name="NewVisitYesNo" class="<?php echo $monitor_treatment_plan->NewVisitYesNo->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_NewVisitYesNo" class="monitor_treatment_plan_NewVisitYesNo"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan->NewVisitYesNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NewVisitYesNo" class="<?php echo $monitor_treatment_plan->NewVisitYesNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $monitor_treatment_plan->SortUrl($monitor_treatment_plan->NewVisitYesNo) ?>',1);"><div id="elh_monitor_treatment_plan_NewVisitYesNo" class="monitor_treatment_plan_NewVisitYesNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan->NewVisitYesNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan->NewVisitYesNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($monitor_treatment_plan->NewVisitYesNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan->Treatment->Visible) { // Treatment ?>
	<?php if ($monitor_treatment_plan->sortUrl($monitor_treatment_plan->Treatment) == "") { ?>
		<th data-name="Treatment" class="<?php echo $monitor_treatment_plan->Treatment->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_Treatment" class="monitor_treatment_plan_Treatment"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan->Treatment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Treatment" class="<?php echo $monitor_treatment_plan->Treatment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $monitor_treatment_plan->SortUrl($monitor_treatment_plan->Treatment) ?>',1);"><div id="elh_monitor_treatment_plan_Treatment" class="monitor_treatment_plan_Treatment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan->Treatment->caption() ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan->Treatment->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($monitor_treatment_plan->Treatment->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan->IUIDoneDate1->Visible) { // IUIDoneDate1 ?>
	<?php if ($monitor_treatment_plan->sortUrl($monitor_treatment_plan->IUIDoneDate1) == "") { ?>
		<th data-name="IUIDoneDate1" class="<?php echo $monitor_treatment_plan->IUIDoneDate1->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_IUIDoneDate1" class="monitor_treatment_plan_IUIDoneDate1"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan->IUIDoneDate1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IUIDoneDate1" class="<?php echo $monitor_treatment_plan->IUIDoneDate1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $monitor_treatment_plan->SortUrl($monitor_treatment_plan->IUIDoneDate1) ?>',1);"><div id="elh_monitor_treatment_plan_IUIDoneDate1" class="monitor_treatment_plan_IUIDoneDate1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan->IUIDoneDate1->caption() ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan->IUIDoneDate1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($monitor_treatment_plan->IUIDoneDate1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan->IUIDoneYesNo1->Visible) { // IUIDoneYesNo1 ?>
	<?php if ($monitor_treatment_plan->sortUrl($monitor_treatment_plan->IUIDoneYesNo1) == "") { ?>
		<th data-name="IUIDoneYesNo1" class="<?php echo $monitor_treatment_plan->IUIDoneYesNo1->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_IUIDoneYesNo1" class="monitor_treatment_plan_IUIDoneYesNo1"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan->IUIDoneYesNo1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IUIDoneYesNo1" class="<?php echo $monitor_treatment_plan->IUIDoneYesNo1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $monitor_treatment_plan->SortUrl($monitor_treatment_plan->IUIDoneYesNo1) ?>',1);"><div id="elh_monitor_treatment_plan_IUIDoneYesNo1" class="monitor_treatment_plan_IUIDoneYesNo1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan->IUIDoneYesNo1->caption() ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan->IUIDoneYesNo1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($monitor_treatment_plan->IUIDoneYesNo1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan->UPTTestDate1->Visible) { // UPTTestDate1 ?>
	<?php if ($monitor_treatment_plan->sortUrl($monitor_treatment_plan->UPTTestDate1) == "") { ?>
		<th data-name="UPTTestDate1" class="<?php echo $monitor_treatment_plan->UPTTestDate1->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_UPTTestDate1" class="monitor_treatment_plan_UPTTestDate1"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan->UPTTestDate1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UPTTestDate1" class="<?php echo $monitor_treatment_plan->UPTTestDate1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $monitor_treatment_plan->SortUrl($monitor_treatment_plan->UPTTestDate1) ?>',1);"><div id="elh_monitor_treatment_plan_UPTTestDate1" class="monitor_treatment_plan_UPTTestDate1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan->UPTTestDate1->caption() ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan->UPTTestDate1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($monitor_treatment_plan->UPTTestDate1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan->UPTTestYesNo1->Visible) { // UPTTestYesNo1 ?>
	<?php if ($monitor_treatment_plan->sortUrl($monitor_treatment_plan->UPTTestYesNo1) == "") { ?>
		<th data-name="UPTTestYesNo1" class="<?php echo $monitor_treatment_plan->UPTTestYesNo1->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_UPTTestYesNo1" class="monitor_treatment_plan_UPTTestYesNo1"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan->UPTTestYesNo1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UPTTestYesNo1" class="<?php echo $monitor_treatment_plan->UPTTestYesNo1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $monitor_treatment_plan->SortUrl($monitor_treatment_plan->UPTTestYesNo1) ?>',1);"><div id="elh_monitor_treatment_plan_UPTTestYesNo1" class="monitor_treatment_plan_UPTTestYesNo1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan->UPTTestYesNo1->caption() ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan->UPTTestYesNo1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($monitor_treatment_plan->UPTTestYesNo1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan->IUIDoneDate2->Visible) { // IUIDoneDate2 ?>
	<?php if ($monitor_treatment_plan->sortUrl($monitor_treatment_plan->IUIDoneDate2) == "") { ?>
		<th data-name="IUIDoneDate2" class="<?php echo $monitor_treatment_plan->IUIDoneDate2->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_IUIDoneDate2" class="monitor_treatment_plan_IUIDoneDate2"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan->IUIDoneDate2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IUIDoneDate2" class="<?php echo $monitor_treatment_plan->IUIDoneDate2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $monitor_treatment_plan->SortUrl($monitor_treatment_plan->IUIDoneDate2) ?>',1);"><div id="elh_monitor_treatment_plan_IUIDoneDate2" class="monitor_treatment_plan_IUIDoneDate2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan->IUIDoneDate2->caption() ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan->IUIDoneDate2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($monitor_treatment_plan->IUIDoneDate2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan->IUIDoneYesNo2->Visible) { // IUIDoneYesNo2 ?>
	<?php if ($monitor_treatment_plan->sortUrl($monitor_treatment_plan->IUIDoneYesNo2) == "") { ?>
		<th data-name="IUIDoneYesNo2" class="<?php echo $monitor_treatment_plan->IUIDoneYesNo2->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_IUIDoneYesNo2" class="monitor_treatment_plan_IUIDoneYesNo2"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan->IUIDoneYesNo2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IUIDoneYesNo2" class="<?php echo $monitor_treatment_plan->IUIDoneYesNo2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $monitor_treatment_plan->SortUrl($monitor_treatment_plan->IUIDoneYesNo2) ?>',1);"><div id="elh_monitor_treatment_plan_IUIDoneYesNo2" class="monitor_treatment_plan_IUIDoneYesNo2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan->IUIDoneYesNo2->caption() ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan->IUIDoneYesNo2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($monitor_treatment_plan->IUIDoneYesNo2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan->UPTTestDate2->Visible) { // UPTTestDate2 ?>
	<?php if ($monitor_treatment_plan->sortUrl($monitor_treatment_plan->UPTTestDate2) == "") { ?>
		<th data-name="UPTTestDate2" class="<?php echo $monitor_treatment_plan->UPTTestDate2->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_UPTTestDate2" class="monitor_treatment_plan_UPTTestDate2"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan->UPTTestDate2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UPTTestDate2" class="<?php echo $monitor_treatment_plan->UPTTestDate2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $monitor_treatment_plan->SortUrl($monitor_treatment_plan->UPTTestDate2) ?>',1);"><div id="elh_monitor_treatment_plan_UPTTestDate2" class="monitor_treatment_plan_UPTTestDate2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan->UPTTestDate2->caption() ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan->UPTTestDate2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($monitor_treatment_plan->UPTTestDate2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan->UPTTestYesNo2->Visible) { // UPTTestYesNo2 ?>
	<?php if ($monitor_treatment_plan->sortUrl($monitor_treatment_plan->UPTTestYesNo2) == "") { ?>
		<th data-name="UPTTestYesNo2" class="<?php echo $monitor_treatment_plan->UPTTestYesNo2->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_UPTTestYesNo2" class="monitor_treatment_plan_UPTTestYesNo2"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan->UPTTestYesNo2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UPTTestYesNo2" class="<?php echo $monitor_treatment_plan->UPTTestYesNo2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $monitor_treatment_plan->SortUrl($monitor_treatment_plan->UPTTestYesNo2) ?>',1);"><div id="elh_monitor_treatment_plan_UPTTestYesNo2" class="monitor_treatment_plan_UPTTestYesNo2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan->UPTTestYesNo2->caption() ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan->UPTTestYesNo2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($monitor_treatment_plan->UPTTestYesNo2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan->IUIDoneDate3->Visible) { // IUIDoneDate3 ?>
	<?php if ($monitor_treatment_plan->sortUrl($monitor_treatment_plan->IUIDoneDate3) == "") { ?>
		<th data-name="IUIDoneDate3" class="<?php echo $monitor_treatment_plan->IUIDoneDate3->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_IUIDoneDate3" class="monitor_treatment_plan_IUIDoneDate3"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan->IUIDoneDate3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IUIDoneDate3" class="<?php echo $monitor_treatment_plan->IUIDoneDate3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $monitor_treatment_plan->SortUrl($monitor_treatment_plan->IUIDoneDate3) ?>',1);"><div id="elh_monitor_treatment_plan_IUIDoneDate3" class="monitor_treatment_plan_IUIDoneDate3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan->IUIDoneDate3->caption() ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan->IUIDoneDate3->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($monitor_treatment_plan->IUIDoneDate3->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan->IUIDoneYesNo3->Visible) { // IUIDoneYesNo3 ?>
	<?php if ($monitor_treatment_plan->sortUrl($monitor_treatment_plan->IUIDoneYesNo3) == "") { ?>
		<th data-name="IUIDoneYesNo3" class="<?php echo $monitor_treatment_plan->IUIDoneYesNo3->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_IUIDoneYesNo3" class="monitor_treatment_plan_IUIDoneYesNo3"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan->IUIDoneYesNo3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IUIDoneYesNo3" class="<?php echo $monitor_treatment_plan->IUIDoneYesNo3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $monitor_treatment_plan->SortUrl($monitor_treatment_plan->IUIDoneYesNo3) ?>',1);"><div id="elh_monitor_treatment_plan_IUIDoneYesNo3" class="monitor_treatment_plan_IUIDoneYesNo3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan->IUIDoneYesNo3->caption() ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan->IUIDoneYesNo3->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($monitor_treatment_plan->IUIDoneYesNo3->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan->UPTTestDate3->Visible) { // UPTTestDate3 ?>
	<?php if ($monitor_treatment_plan->sortUrl($monitor_treatment_plan->UPTTestDate3) == "") { ?>
		<th data-name="UPTTestDate3" class="<?php echo $monitor_treatment_plan->UPTTestDate3->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_UPTTestDate3" class="monitor_treatment_plan_UPTTestDate3"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan->UPTTestDate3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UPTTestDate3" class="<?php echo $monitor_treatment_plan->UPTTestDate3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $monitor_treatment_plan->SortUrl($monitor_treatment_plan->UPTTestDate3) ?>',1);"><div id="elh_monitor_treatment_plan_UPTTestDate3" class="monitor_treatment_plan_UPTTestDate3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan->UPTTestDate3->caption() ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan->UPTTestDate3->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($monitor_treatment_plan->UPTTestDate3->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan->UPTTestYesNo3->Visible) { // UPTTestYesNo3 ?>
	<?php if ($monitor_treatment_plan->sortUrl($monitor_treatment_plan->UPTTestYesNo3) == "") { ?>
		<th data-name="UPTTestYesNo3" class="<?php echo $monitor_treatment_plan->UPTTestYesNo3->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_UPTTestYesNo3" class="monitor_treatment_plan_UPTTestYesNo3"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan->UPTTestYesNo3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UPTTestYesNo3" class="<?php echo $monitor_treatment_plan->UPTTestYesNo3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $monitor_treatment_plan->SortUrl($monitor_treatment_plan->UPTTestYesNo3) ?>',1);"><div id="elh_monitor_treatment_plan_UPTTestYesNo3" class="monitor_treatment_plan_UPTTestYesNo3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan->UPTTestYesNo3->caption() ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan->UPTTestYesNo3->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($monitor_treatment_plan->UPTTestYesNo3->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan->IUIDoneDate4->Visible) { // IUIDoneDate4 ?>
	<?php if ($monitor_treatment_plan->sortUrl($monitor_treatment_plan->IUIDoneDate4) == "") { ?>
		<th data-name="IUIDoneDate4" class="<?php echo $monitor_treatment_plan->IUIDoneDate4->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_IUIDoneDate4" class="monitor_treatment_plan_IUIDoneDate4"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan->IUIDoneDate4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IUIDoneDate4" class="<?php echo $monitor_treatment_plan->IUIDoneDate4->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $monitor_treatment_plan->SortUrl($monitor_treatment_plan->IUIDoneDate4) ?>',1);"><div id="elh_monitor_treatment_plan_IUIDoneDate4" class="monitor_treatment_plan_IUIDoneDate4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan->IUIDoneDate4->caption() ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan->IUIDoneDate4->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($monitor_treatment_plan->IUIDoneDate4->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan->IUIDoneYesNo4->Visible) { // IUIDoneYesNo4 ?>
	<?php if ($monitor_treatment_plan->sortUrl($monitor_treatment_plan->IUIDoneYesNo4) == "") { ?>
		<th data-name="IUIDoneYesNo4" class="<?php echo $monitor_treatment_plan->IUIDoneYesNo4->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_IUIDoneYesNo4" class="monitor_treatment_plan_IUIDoneYesNo4"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan->IUIDoneYesNo4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IUIDoneYesNo4" class="<?php echo $monitor_treatment_plan->IUIDoneYesNo4->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $monitor_treatment_plan->SortUrl($monitor_treatment_plan->IUIDoneYesNo4) ?>',1);"><div id="elh_monitor_treatment_plan_IUIDoneYesNo4" class="monitor_treatment_plan_IUIDoneYesNo4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan->IUIDoneYesNo4->caption() ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan->IUIDoneYesNo4->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($monitor_treatment_plan->IUIDoneYesNo4->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan->UPTTestDate4->Visible) { // UPTTestDate4 ?>
	<?php if ($monitor_treatment_plan->sortUrl($monitor_treatment_plan->UPTTestDate4) == "") { ?>
		<th data-name="UPTTestDate4" class="<?php echo $monitor_treatment_plan->UPTTestDate4->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_UPTTestDate4" class="monitor_treatment_plan_UPTTestDate4"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan->UPTTestDate4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UPTTestDate4" class="<?php echo $monitor_treatment_plan->UPTTestDate4->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $monitor_treatment_plan->SortUrl($monitor_treatment_plan->UPTTestDate4) ?>',1);"><div id="elh_monitor_treatment_plan_UPTTestDate4" class="monitor_treatment_plan_UPTTestDate4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan->UPTTestDate4->caption() ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan->UPTTestDate4->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($monitor_treatment_plan->UPTTestDate4->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan->UPTTestYesNo4->Visible) { // UPTTestYesNo4 ?>
	<?php if ($monitor_treatment_plan->sortUrl($monitor_treatment_plan->UPTTestYesNo4) == "") { ?>
		<th data-name="UPTTestYesNo4" class="<?php echo $monitor_treatment_plan->UPTTestYesNo4->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_UPTTestYesNo4" class="monitor_treatment_plan_UPTTestYesNo4"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan->UPTTestYesNo4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UPTTestYesNo4" class="<?php echo $monitor_treatment_plan->UPTTestYesNo4->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $monitor_treatment_plan->SortUrl($monitor_treatment_plan->UPTTestYesNo4) ?>',1);"><div id="elh_monitor_treatment_plan_UPTTestYesNo4" class="monitor_treatment_plan_UPTTestYesNo4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan->UPTTestYesNo4->caption() ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan->UPTTestYesNo4->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($monitor_treatment_plan->UPTTestYesNo4->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan->IVFStimulationDate->Visible) { // IVFStimulationDate ?>
	<?php if ($monitor_treatment_plan->sortUrl($monitor_treatment_plan->IVFStimulationDate) == "") { ?>
		<th data-name="IVFStimulationDate" class="<?php echo $monitor_treatment_plan->IVFStimulationDate->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_IVFStimulationDate" class="monitor_treatment_plan_IVFStimulationDate"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan->IVFStimulationDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IVFStimulationDate" class="<?php echo $monitor_treatment_plan->IVFStimulationDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $monitor_treatment_plan->SortUrl($monitor_treatment_plan->IVFStimulationDate) ?>',1);"><div id="elh_monitor_treatment_plan_IVFStimulationDate" class="monitor_treatment_plan_IVFStimulationDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan->IVFStimulationDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan->IVFStimulationDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($monitor_treatment_plan->IVFStimulationDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan->IVFStimulationYesNo->Visible) { // IVFStimulationYesNo ?>
	<?php if ($monitor_treatment_plan->sortUrl($monitor_treatment_plan->IVFStimulationYesNo) == "") { ?>
		<th data-name="IVFStimulationYesNo" class="<?php echo $monitor_treatment_plan->IVFStimulationYesNo->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_IVFStimulationYesNo" class="monitor_treatment_plan_IVFStimulationYesNo"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan->IVFStimulationYesNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IVFStimulationYesNo" class="<?php echo $monitor_treatment_plan->IVFStimulationYesNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $monitor_treatment_plan->SortUrl($monitor_treatment_plan->IVFStimulationYesNo) ?>',1);"><div id="elh_monitor_treatment_plan_IVFStimulationYesNo" class="monitor_treatment_plan_IVFStimulationYesNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan->IVFStimulationYesNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan->IVFStimulationYesNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($monitor_treatment_plan->IVFStimulationYesNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan->OPUDate->Visible) { // OPUDate ?>
	<?php if ($monitor_treatment_plan->sortUrl($monitor_treatment_plan->OPUDate) == "") { ?>
		<th data-name="OPUDate" class="<?php echo $monitor_treatment_plan->OPUDate->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_OPUDate" class="monitor_treatment_plan_OPUDate"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan->OPUDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OPUDate" class="<?php echo $monitor_treatment_plan->OPUDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $monitor_treatment_plan->SortUrl($monitor_treatment_plan->OPUDate) ?>',1);"><div id="elh_monitor_treatment_plan_OPUDate" class="monitor_treatment_plan_OPUDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan->OPUDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan->OPUDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($monitor_treatment_plan->OPUDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan->OPUYesNo->Visible) { // OPUYesNo ?>
	<?php if ($monitor_treatment_plan->sortUrl($monitor_treatment_plan->OPUYesNo) == "") { ?>
		<th data-name="OPUYesNo" class="<?php echo $monitor_treatment_plan->OPUYesNo->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_OPUYesNo" class="monitor_treatment_plan_OPUYesNo"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan->OPUYesNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OPUYesNo" class="<?php echo $monitor_treatment_plan->OPUYesNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $monitor_treatment_plan->SortUrl($monitor_treatment_plan->OPUYesNo) ?>',1);"><div id="elh_monitor_treatment_plan_OPUYesNo" class="monitor_treatment_plan_OPUYesNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan->OPUYesNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan->OPUYesNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($monitor_treatment_plan->OPUYesNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan->ETDate->Visible) { // ETDate ?>
	<?php if ($monitor_treatment_plan->sortUrl($monitor_treatment_plan->ETDate) == "") { ?>
		<th data-name="ETDate" class="<?php echo $monitor_treatment_plan->ETDate->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_ETDate" class="monitor_treatment_plan_ETDate"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan->ETDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ETDate" class="<?php echo $monitor_treatment_plan->ETDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $monitor_treatment_plan->SortUrl($monitor_treatment_plan->ETDate) ?>',1);"><div id="elh_monitor_treatment_plan_ETDate" class="monitor_treatment_plan_ETDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan->ETDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan->ETDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($monitor_treatment_plan->ETDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan->ETYesNo->Visible) { // ETYesNo ?>
	<?php if ($monitor_treatment_plan->sortUrl($monitor_treatment_plan->ETYesNo) == "") { ?>
		<th data-name="ETYesNo" class="<?php echo $monitor_treatment_plan->ETYesNo->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_ETYesNo" class="monitor_treatment_plan_ETYesNo"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan->ETYesNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ETYesNo" class="<?php echo $monitor_treatment_plan->ETYesNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $monitor_treatment_plan->SortUrl($monitor_treatment_plan->ETYesNo) ?>',1);"><div id="elh_monitor_treatment_plan_ETYesNo" class="monitor_treatment_plan_ETYesNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan->ETYesNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan->ETYesNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($monitor_treatment_plan->ETYesNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan->BetaHCGDate->Visible) { // BetaHCGDate ?>
	<?php if ($monitor_treatment_plan->sortUrl($monitor_treatment_plan->BetaHCGDate) == "") { ?>
		<th data-name="BetaHCGDate" class="<?php echo $monitor_treatment_plan->BetaHCGDate->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_BetaHCGDate" class="monitor_treatment_plan_BetaHCGDate"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan->BetaHCGDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BetaHCGDate" class="<?php echo $monitor_treatment_plan->BetaHCGDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $monitor_treatment_plan->SortUrl($monitor_treatment_plan->BetaHCGDate) ?>',1);"><div id="elh_monitor_treatment_plan_BetaHCGDate" class="monitor_treatment_plan_BetaHCGDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan->BetaHCGDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan->BetaHCGDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($monitor_treatment_plan->BetaHCGDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan->BetaHCGYesNo->Visible) { // BetaHCGYesNo ?>
	<?php if ($monitor_treatment_plan->sortUrl($monitor_treatment_plan->BetaHCGYesNo) == "") { ?>
		<th data-name="BetaHCGYesNo" class="<?php echo $monitor_treatment_plan->BetaHCGYesNo->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_BetaHCGYesNo" class="monitor_treatment_plan_BetaHCGYesNo"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan->BetaHCGYesNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BetaHCGYesNo" class="<?php echo $monitor_treatment_plan->BetaHCGYesNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $monitor_treatment_plan->SortUrl($monitor_treatment_plan->BetaHCGYesNo) ?>',1);"><div id="elh_monitor_treatment_plan_BetaHCGYesNo" class="monitor_treatment_plan_BetaHCGYesNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan->BetaHCGYesNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan->BetaHCGYesNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($monitor_treatment_plan->BetaHCGYesNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan->FETDate->Visible) { // FETDate ?>
	<?php if ($monitor_treatment_plan->sortUrl($monitor_treatment_plan->FETDate) == "") { ?>
		<th data-name="FETDate" class="<?php echo $monitor_treatment_plan->FETDate->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_FETDate" class="monitor_treatment_plan_FETDate"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan->FETDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FETDate" class="<?php echo $monitor_treatment_plan->FETDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $monitor_treatment_plan->SortUrl($monitor_treatment_plan->FETDate) ?>',1);"><div id="elh_monitor_treatment_plan_FETDate" class="monitor_treatment_plan_FETDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan->FETDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan->FETDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($monitor_treatment_plan->FETDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan->FETYesNo->Visible) { // FETYesNo ?>
	<?php if ($monitor_treatment_plan->sortUrl($monitor_treatment_plan->FETYesNo) == "") { ?>
		<th data-name="FETYesNo" class="<?php echo $monitor_treatment_plan->FETYesNo->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_FETYesNo" class="monitor_treatment_plan_FETYesNo"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan->FETYesNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FETYesNo" class="<?php echo $monitor_treatment_plan->FETYesNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $monitor_treatment_plan->SortUrl($monitor_treatment_plan->FETYesNo) ?>',1);"><div id="elh_monitor_treatment_plan_FETYesNo" class="monitor_treatment_plan_FETYesNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan->FETYesNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan->FETYesNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($monitor_treatment_plan->FETYesNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan->FBetaHCGDate->Visible) { // FBetaHCGDate ?>
	<?php if ($monitor_treatment_plan->sortUrl($monitor_treatment_plan->FBetaHCGDate) == "") { ?>
		<th data-name="FBetaHCGDate" class="<?php echo $monitor_treatment_plan->FBetaHCGDate->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_FBetaHCGDate" class="monitor_treatment_plan_FBetaHCGDate"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan->FBetaHCGDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FBetaHCGDate" class="<?php echo $monitor_treatment_plan->FBetaHCGDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $monitor_treatment_plan->SortUrl($monitor_treatment_plan->FBetaHCGDate) ?>',1);"><div id="elh_monitor_treatment_plan_FBetaHCGDate" class="monitor_treatment_plan_FBetaHCGDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan->FBetaHCGDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan->FBetaHCGDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($monitor_treatment_plan->FBetaHCGDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan->FBetaHCGYesNo->Visible) { // FBetaHCGYesNo ?>
	<?php if ($monitor_treatment_plan->sortUrl($monitor_treatment_plan->FBetaHCGYesNo) == "") { ?>
		<th data-name="FBetaHCGYesNo" class="<?php echo $monitor_treatment_plan->FBetaHCGYesNo->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_FBetaHCGYesNo" class="monitor_treatment_plan_FBetaHCGYesNo"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan->FBetaHCGYesNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FBetaHCGYesNo" class="<?php echo $monitor_treatment_plan->FBetaHCGYesNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $monitor_treatment_plan->SortUrl($monitor_treatment_plan->FBetaHCGYesNo) ?>',1);"><div id="elh_monitor_treatment_plan_FBetaHCGYesNo" class="monitor_treatment_plan_FBetaHCGYesNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan->FBetaHCGYesNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan->FBetaHCGYesNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($monitor_treatment_plan->FBetaHCGYesNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan->createdby->Visible) { // createdby ?>
	<?php if ($monitor_treatment_plan->sortUrl($monitor_treatment_plan->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $monitor_treatment_plan->createdby->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_createdby" class="monitor_treatment_plan_createdby"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $monitor_treatment_plan->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $monitor_treatment_plan->SortUrl($monitor_treatment_plan->createdby) ?>',1);"><div id="elh_monitor_treatment_plan_createdby" class="monitor_treatment_plan_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan->createdby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($monitor_treatment_plan->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan->createddatetime->Visible) { // createddatetime ?>
	<?php if ($monitor_treatment_plan->sortUrl($monitor_treatment_plan->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $monitor_treatment_plan->createddatetime->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_createddatetime" class="monitor_treatment_plan_createddatetime"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $monitor_treatment_plan->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $monitor_treatment_plan->SortUrl($monitor_treatment_plan->createddatetime) ?>',1);"><div id="elh_monitor_treatment_plan_createddatetime" class="monitor_treatment_plan_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($monitor_treatment_plan->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan->modifiedby->Visible) { // modifiedby ?>
	<?php if ($monitor_treatment_plan->sortUrl($monitor_treatment_plan->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $monitor_treatment_plan->modifiedby->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_modifiedby" class="monitor_treatment_plan_modifiedby"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $monitor_treatment_plan->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $monitor_treatment_plan->SortUrl($monitor_treatment_plan->modifiedby) ?>',1);"><div id="elh_monitor_treatment_plan_modifiedby" class="monitor_treatment_plan_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan->modifiedby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($monitor_treatment_plan->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($monitor_treatment_plan->sortUrl($monitor_treatment_plan->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $monitor_treatment_plan->modifieddatetime->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_modifieddatetime" class="monitor_treatment_plan_modifieddatetime"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $monitor_treatment_plan->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $monitor_treatment_plan->SortUrl($monitor_treatment_plan->modifieddatetime) ?>',1);"><div id="elh_monitor_treatment_plan_modifieddatetime" class="monitor_treatment_plan_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($monitor_treatment_plan->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan->HospID->Visible) { // HospID ?>
	<?php if ($monitor_treatment_plan->sortUrl($monitor_treatment_plan->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $monitor_treatment_plan->HospID->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_HospID" class="monitor_treatment_plan_HospID"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $monitor_treatment_plan->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $monitor_treatment_plan->SortUrl($monitor_treatment_plan->HospID) ?>',1);"><div id="elh_monitor_treatment_plan_HospID" class="monitor_treatment_plan_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($monitor_treatment_plan->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$monitor_treatment_plan_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($monitor_treatment_plan->ExportAll && $monitor_treatment_plan->isExport()) {
	$monitor_treatment_plan_list->StopRec = $monitor_treatment_plan_list->TotalRecs;
} else {

	// Set the last record to display
	if ($monitor_treatment_plan_list->TotalRecs > $monitor_treatment_plan_list->StartRec + $monitor_treatment_plan_list->DisplayRecs - 1)
		$monitor_treatment_plan_list->StopRec = $monitor_treatment_plan_list->StartRec + $monitor_treatment_plan_list->DisplayRecs - 1;
	else
		$monitor_treatment_plan_list->StopRec = $monitor_treatment_plan_list->TotalRecs;
}
$monitor_treatment_plan_list->RecCnt = $monitor_treatment_plan_list->StartRec - 1;
if ($monitor_treatment_plan_list->Recordset && !$monitor_treatment_plan_list->Recordset->EOF) {
	$monitor_treatment_plan_list->Recordset->moveFirst();
	$selectLimit = $monitor_treatment_plan_list->UseSelectLimit;
	if (!$selectLimit && $monitor_treatment_plan_list->StartRec > 1)
		$monitor_treatment_plan_list->Recordset->move($monitor_treatment_plan_list->StartRec - 1);
} elseif (!$monitor_treatment_plan->AllowAddDeleteRow && $monitor_treatment_plan_list->StopRec == 0) {
	$monitor_treatment_plan_list->StopRec = $monitor_treatment_plan->GridAddRowCount;
}

// Initialize aggregate
$monitor_treatment_plan->RowType = ROWTYPE_AGGREGATEINIT;
$monitor_treatment_plan->resetAttributes();
$monitor_treatment_plan_list->renderRow();
while ($monitor_treatment_plan_list->RecCnt < $monitor_treatment_plan_list->StopRec) {
	$monitor_treatment_plan_list->RecCnt++;
	if ($monitor_treatment_plan_list->RecCnt >= $monitor_treatment_plan_list->StartRec) {
		$monitor_treatment_plan_list->RowCnt++;

		// Set up key count
		$monitor_treatment_plan_list->KeyCount = $monitor_treatment_plan_list->RowIndex;

		// Init row class and style
		$monitor_treatment_plan->resetAttributes();
		$monitor_treatment_plan->CssClass = "";
		if ($monitor_treatment_plan->isGridAdd()) {
		} else {
			$monitor_treatment_plan_list->loadRowValues($monitor_treatment_plan_list->Recordset); // Load row values
		}
		$monitor_treatment_plan->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$monitor_treatment_plan->RowAttrs = array_merge($monitor_treatment_plan->RowAttrs, array('data-rowindex'=>$monitor_treatment_plan_list->RowCnt, 'id'=>'r' . $monitor_treatment_plan_list->RowCnt . '_monitor_treatment_plan', 'data-rowtype'=>$monitor_treatment_plan->RowType));

		// Render row
		$monitor_treatment_plan_list->renderRow();

		// Render list options
		$monitor_treatment_plan_list->renderListOptions();
?>
	<tr<?php echo $monitor_treatment_plan->rowAttributes() ?>>
<?php

// Render list options (body, left)
$monitor_treatment_plan_list->ListOptions->render("body", "left", $monitor_treatment_plan_list->RowCnt);
?>
	<?php if ($monitor_treatment_plan->id->Visible) { // id ?>
		<td data-name="id"<?php echo $monitor_treatment_plan->id->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCnt ?>_monitor_treatment_plan_id" class="monitor_treatment_plan_id">
<span<?php echo $monitor_treatment_plan->id->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan->PatId->Visible) { // PatId ?>
		<td data-name="PatId"<?php echo $monitor_treatment_plan->PatId->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCnt ?>_monitor_treatment_plan_PatId" class="monitor_treatment_plan_PatId">
<span<?php echo $monitor_treatment_plan->PatId->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->PatId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId"<?php echo $monitor_treatment_plan->PatientId->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCnt ?>_monitor_treatment_plan_PatientId" class="monitor_treatment_plan_PatientId">
<span<?php echo $monitor_treatment_plan->PatientId->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->PatientId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $monitor_treatment_plan->PatientName->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCnt ?>_monitor_treatment_plan_PatientName" class="monitor_treatment_plan_PatientName">
<span<?php echo $monitor_treatment_plan->PatientName->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan->Age->Visible) { // Age ?>
		<td data-name="Age"<?php echo $monitor_treatment_plan->Age->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCnt ?>_monitor_treatment_plan_Age" class="monitor_treatment_plan_Age">
<span<?php echo $monitor_treatment_plan->Age->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->Age->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan->MobileNo->Visible) { // MobileNo ?>
		<td data-name="MobileNo"<?php echo $monitor_treatment_plan->MobileNo->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCnt ?>_monitor_treatment_plan_MobileNo" class="monitor_treatment_plan_MobileNo">
<span<?php echo $monitor_treatment_plan->MobileNo->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->MobileNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan->ConsultantName->Visible) { // ConsultantName ?>
		<td data-name="ConsultantName"<?php echo $monitor_treatment_plan->ConsultantName->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCnt ?>_monitor_treatment_plan_ConsultantName" class="monitor_treatment_plan_ConsultantName">
<span<?php echo $monitor_treatment_plan->ConsultantName->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->ConsultantName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan->RefDrName->Visible) { // RefDrName ?>
		<td data-name="RefDrName"<?php echo $monitor_treatment_plan->RefDrName->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCnt ?>_monitor_treatment_plan_RefDrName" class="monitor_treatment_plan_RefDrName">
<span<?php echo $monitor_treatment_plan->RefDrName->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->RefDrName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan->RefDrMobileNo->Visible) { // RefDrMobileNo ?>
		<td data-name="RefDrMobileNo"<?php echo $monitor_treatment_plan->RefDrMobileNo->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCnt ?>_monitor_treatment_plan_RefDrMobileNo" class="monitor_treatment_plan_RefDrMobileNo">
<span<?php echo $monitor_treatment_plan->RefDrMobileNo->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->RefDrMobileNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan->NewVisitDate->Visible) { // NewVisitDate ?>
		<td data-name="NewVisitDate"<?php echo $monitor_treatment_plan->NewVisitDate->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCnt ?>_monitor_treatment_plan_NewVisitDate" class="monitor_treatment_plan_NewVisitDate">
<span<?php echo $monitor_treatment_plan->NewVisitDate->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->NewVisitDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan->NewVisitYesNo->Visible) { // NewVisitYesNo ?>
		<td data-name="NewVisitYesNo"<?php echo $monitor_treatment_plan->NewVisitYesNo->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCnt ?>_monitor_treatment_plan_NewVisitYesNo" class="monitor_treatment_plan_NewVisitYesNo">
<span<?php echo $monitor_treatment_plan->NewVisitYesNo->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->NewVisitYesNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan->Treatment->Visible) { // Treatment ?>
		<td data-name="Treatment"<?php echo $monitor_treatment_plan->Treatment->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCnt ?>_monitor_treatment_plan_Treatment" class="monitor_treatment_plan_Treatment">
<span<?php echo $monitor_treatment_plan->Treatment->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->Treatment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan->IUIDoneDate1->Visible) { // IUIDoneDate1 ?>
		<td data-name="IUIDoneDate1"<?php echo $monitor_treatment_plan->IUIDoneDate1->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCnt ?>_monitor_treatment_plan_IUIDoneDate1" class="monitor_treatment_plan_IUIDoneDate1">
<span<?php echo $monitor_treatment_plan->IUIDoneDate1->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->IUIDoneDate1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan->IUIDoneYesNo1->Visible) { // IUIDoneYesNo1 ?>
		<td data-name="IUIDoneYesNo1"<?php echo $monitor_treatment_plan->IUIDoneYesNo1->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCnt ?>_monitor_treatment_plan_IUIDoneYesNo1" class="monitor_treatment_plan_IUIDoneYesNo1">
<span<?php echo $monitor_treatment_plan->IUIDoneYesNo1->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->IUIDoneYesNo1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan->UPTTestDate1->Visible) { // UPTTestDate1 ?>
		<td data-name="UPTTestDate1"<?php echo $monitor_treatment_plan->UPTTestDate1->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCnt ?>_monitor_treatment_plan_UPTTestDate1" class="monitor_treatment_plan_UPTTestDate1">
<span<?php echo $monitor_treatment_plan->UPTTestDate1->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->UPTTestDate1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan->UPTTestYesNo1->Visible) { // UPTTestYesNo1 ?>
		<td data-name="UPTTestYesNo1"<?php echo $monitor_treatment_plan->UPTTestYesNo1->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCnt ?>_monitor_treatment_plan_UPTTestYesNo1" class="monitor_treatment_plan_UPTTestYesNo1">
<span<?php echo $monitor_treatment_plan->UPTTestYesNo1->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->UPTTestYesNo1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan->IUIDoneDate2->Visible) { // IUIDoneDate2 ?>
		<td data-name="IUIDoneDate2"<?php echo $monitor_treatment_plan->IUIDoneDate2->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCnt ?>_monitor_treatment_plan_IUIDoneDate2" class="monitor_treatment_plan_IUIDoneDate2">
<span<?php echo $monitor_treatment_plan->IUIDoneDate2->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->IUIDoneDate2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan->IUIDoneYesNo2->Visible) { // IUIDoneYesNo2 ?>
		<td data-name="IUIDoneYesNo2"<?php echo $monitor_treatment_plan->IUIDoneYesNo2->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCnt ?>_monitor_treatment_plan_IUIDoneYesNo2" class="monitor_treatment_plan_IUIDoneYesNo2">
<span<?php echo $monitor_treatment_plan->IUIDoneYesNo2->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->IUIDoneYesNo2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan->UPTTestDate2->Visible) { // UPTTestDate2 ?>
		<td data-name="UPTTestDate2"<?php echo $monitor_treatment_plan->UPTTestDate2->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCnt ?>_monitor_treatment_plan_UPTTestDate2" class="monitor_treatment_plan_UPTTestDate2">
<span<?php echo $monitor_treatment_plan->UPTTestDate2->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->UPTTestDate2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan->UPTTestYesNo2->Visible) { // UPTTestYesNo2 ?>
		<td data-name="UPTTestYesNo2"<?php echo $monitor_treatment_plan->UPTTestYesNo2->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCnt ?>_monitor_treatment_plan_UPTTestYesNo2" class="monitor_treatment_plan_UPTTestYesNo2">
<span<?php echo $monitor_treatment_plan->UPTTestYesNo2->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->UPTTestYesNo2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan->IUIDoneDate3->Visible) { // IUIDoneDate3 ?>
		<td data-name="IUIDoneDate3"<?php echo $monitor_treatment_plan->IUIDoneDate3->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCnt ?>_monitor_treatment_plan_IUIDoneDate3" class="monitor_treatment_plan_IUIDoneDate3">
<span<?php echo $monitor_treatment_plan->IUIDoneDate3->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->IUIDoneDate3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan->IUIDoneYesNo3->Visible) { // IUIDoneYesNo3 ?>
		<td data-name="IUIDoneYesNo3"<?php echo $monitor_treatment_plan->IUIDoneYesNo3->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCnt ?>_monitor_treatment_plan_IUIDoneYesNo3" class="monitor_treatment_plan_IUIDoneYesNo3">
<span<?php echo $monitor_treatment_plan->IUIDoneYesNo3->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->IUIDoneYesNo3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan->UPTTestDate3->Visible) { // UPTTestDate3 ?>
		<td data-name="UPTTestDate3"<?php echo $monitor_treatment_plan->UPTTestDate3->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCnt ?>_monitor_treatment_plan_UPTTestDate3" class="monitor_treatment_plan_UPTTestDate3">
<span<?php echo $monitor_treatment_plan->UPTTestDate3->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->UPTTestDate3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan->UPTTestYesNo3->Visible) { // UPTTestYesNo3 ?>
		<td data-name="UPTTestYesNo3"<?php echo $monitor_treatment_plan->UPTTestYesNo3->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCnt ?>_monitor_treatment_plan_UPTTestYesNo3" class="monitor_treatment_plan_UPTTestYesNo3">
<span<?php echo $monitor_treatment_plan->UPTTestYesNo3->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->UPTTestYesNo3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan->IUIDoneDate4->Visible) { // IUIDoneDate4 ?>
		<td data-name="IUIDoneDate4"<?php echo $monitor_treatment_plan->IUIDoneDate4->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCnt ?>_monitor_treatment_plan_IUIDoneDate4" class="monitor_treatment_plan_IUIDoneDate4">
<span<?php echo $monitor_treatment_plan->IUIDoneDate4->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->IUIDoneDate4->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan->IUIDoneYesNo4->Visible) { // IUIDoneYesNo4 ?>
		<td data-name="IUIDoneYesNo4"<?php echo $monitor_treatment_plan->IUIDoneYesNo4->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCnt ?>_monitor_treatment_plan_IUIDoneYesNo4" class="monitor_treatment_plan_IUIDoneYesNo4">
<span<?php echo $monitor_treatment_plan->IUIDoneYesNo4->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->IUIDoneYesNo4->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan->UPTTestDate4->Visible) { // UPTTestDate4 ?>
		<td data-name="UPTTestDate4"<?php echo $monitor_treatment_plan->UPTTestDate4->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCnt ?>_monitor_treatment_plan_UPTTestDate4" class="monitor_treatment_plan_UPTTestDate4">
<span<?php echo $monitor_treatment_plan->UPTTestDate4->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->UPTTestDate4->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan->UPTTestYesNo4->Visible) { // UPTTestYesNo4 ?>
		<td data-name="UPTTestYesNo4"<?php echo $monitor_treatment_plan->UPTTestYesNo4->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCnt ?>_monitor_treatment_plan_UPTTestYesNo4" class="monitor_treatment_plan_UPTTestYesNo4">
<span<?php echo $monitor_treatment_plan->UPTTestYesNo4->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->UPTTestYesNo4->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan->IVFStimulationDate->Visible) { // IVFStimulationDate ?>
		<td data-name="IVFStimulationDate"<?php echo $monitor_treatment_plan->IVFStimulationDate->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCnt ?>_monitor_treatment_plan_IVFStimulationDate" class="monitor_treatment_plan_IVFStimulationDate">
<span<?php echo $monitor_treatment_plan->IVFStimulationDate->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->IVFStimulationDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan->IVFStimulationYesNo->Visible) { // IVFStimulationYesNo ?>
		<td data-name="IVFStimulationYesNo"<?php echo $monitor_treatment_plan->IVFStimulationYesNo->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCnt ?>_monitor_treatment_plan_IVFStimulationYesNo" class="monitor_treatment_plan_IVFStimulationYesNo">
<span<?php echo $monitor_treatment_plan->IVFStimulationYesNo->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->IVFStimulationYesNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan->OPUDate->Visible) { // OPUDate ?>
		<td data-name="OPUDate"<?php echo $monitor_treatment_plan->OPUDate->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCnt ?>_monitor_treatment_plan_OPUDate" class="monitor_treatment_plan_OPUDate">
<span<?php echo $monitor_treatment_plan->OPUDate->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->OPUDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan->OPUYesNo->Visible) { // OPUYesNo ?>
		<td data-name="OPUYesNo"<?php echo $monitor_treatment_plan->OPUYesNo->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCnt ?>_monitor_treatment_plan_OPUYesNo" class="monitor_treatment_plan_OPUYesNo">
<span<?php echo $monitor_treatment_plan->OPUYesNo->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->OPUYesNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan->ETDate->Visible) { // ETDate ?>
		<td data-name="ETDate"<?php echo $monitor_treatment_plan->ETDate->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCnt ?>_monitor_treatment_plan_ETDate" class="monitor_treatment_plan_ETDate">
<span<?php echo $monitor_treatment_plan->ETDate->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->ETDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan->ETYesNo->Visible) { // ETYesNo ?>
		<td data-name="ETYesNo"<?php echo $monitor_treatment_plan->ETYesNo->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCnt ?>_monitor_treatment_plan_ETYesNo" class="monitor_treatment_plan_ETYesNo">
<span<?php echo $monitor_treatment_plan->ETYesNo->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->ETYesNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan->BetaHCGDate->Visible) { // BetaHCGDate ?>
		<td data-name="BetaHCGDate"<?php echo $monitor_treatment_plan->BetaHCGDate->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCnt ?>_monitor_treatment_plan_BetaHCGDate" class="monitor_treatment_plan_BetaHCGDate">
<span<?php echo $monitor_treatment_plan->BetaHCGDate->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->BetaHCGDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan->BetaHCGYesNo->Visible) { // BetaHCGYesNo ?>
		<td data-name="BetaHCGYesNo"<?php echo $monitor_treatment_plan->BetaHCGYesNo->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCnt ?>_monitor_treatment_plan_BetaHCGYesNo" class="monitor_treatment_plan_BetaHCGYesNo">
<span<?php echo $monitor_treatment_plan->BetaHCGYesNo->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->BetaHCGYesNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan->FETDate->Visible) { // FETDate ?>
		<td data-name="FETDate"<?php echo $monitor_treatment_plan->FETDate->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCnt ?>_monitor_treatment_plan_FETDate" class="monitor_treatment_plan_FETDate">
<span<?php echo $monitor_treatment_plan->FETDate->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->FETDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan->FETYesNo->Visible) { // FETYesNo ?>
		<td data-name="FETYesNo"<?php echo $monitor_treatment_plan->FETYesNo->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCnt ?>_monitor_treatment_plan_FETYesNo" class="monitor_treatment_plan_FETYesNo">
<span<?php echo $monitor_treatment_plan->FETYesNo->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->FETYesNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan->FBetaHCGDate->Visible) { // FBetaHCGDate ?>
		<td data-name="FBetaHCGDate"<?php echo $monitor_treatment_plan->FBetaHCGDate->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCnt ?>_monitor_treatment_plan_FBetaHCGDate" class="monitor_treatment_plan_FBetaHCGDate">
<span<?php echo $monitor_treatment_plan->FBetaHCGDate->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->FBetaHCGDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan->FBetaHCGYesNo->Visible) { // FBetaHCGYesNo ?>
		<td data-name="FBetaHCGYesNo"<?php echo $monitor_treatment_plan->FBetaHCGYesNo->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCnt ?>_monitor_treatment_plan_FBetaHCGYesNo" class="monitor_treatment_plan_FBetaHCGYesNo">
<span<?php echo $monitor_treatment_plan->FBetaHCGYesNo->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->FBetaHCGYesNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $monitor_treatment_plan->createdby->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCnt ?>_monitor_treatment_plan_createdby" class="monitor_treatment_plan_createdby">
<span<?php echo $monitor_treatment_plan->createdby->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $monitor_treatment_plan->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCnt ?>_monitor_treatment_plan_createddatetime" class="monitor_treatment_plan_createddatetime">
<span<?php echo $monitor_treatment_plan->createddatetime->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $monitor_treatment_plan->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCnt ?>_monitor_treatment_plan_modifiedby" class="monitor_treatment_plan_modifiedby">
<span<?php echo $monitor_treatment_plan->modifiedby->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $monitor_treatment_plan->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCnt ?>_monitor_treatment_plan_modifieddatetime" class="monitor_treatment_plan_modifieddatetime">
<span<?php echo $monitor_treatment_plan->modifieddatetime->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $monitor_treatment_plan->HospID->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCnt ?>_monitor_treatment_plan_HospID" class="monitor_treatment_plan_HospID">
<span<?php echo $monitor_treatment_plan->HospID->viewAttributes() ?>>
<?php echo $monitor_treatment_plan->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$monitor_treatment_plan_list->ListOptions->render("body", "right", $monitor_treatment_plan_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$monitor_treatment_plan->isGridAdd())
		$monitor_treatment_plan_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$monitor_treatment_plan->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($monitor_treatment_plan_list->Recordset)
	$monitor_treatment_plan_list->Recordset->Close();
?>
<?php if (!$monitor_treatment_plan->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$monitor_treatment_plan->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($monitor_treatment_plan_list->Pager)) $monitor_treatment_plan_list->Pager = new NumericPager($monitor_treatment_plan_list->StartRec, $monitor_treatment_plan_list->DisplayRecs, $monitor_treatment_plan_list->TotalRecs, $monitor_treatment_plan_list->RecRange, $monitor_treatment_plan_list->AutoHidePager) ?>
<?php if ($monitor_treatment_plan_list->Pager->RecordCount > 0 && $monitor_treatment_plan_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($monitor_treatment_plan_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $monitor_treatment_plan_list->pageUrl() ?>start=<?php echo $monitor_treatment_plan_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($monitor_treatment_plan_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $monitor_treatment_plan_list->pageUrl() ?>start=<?php echo $monitor_treatment_plan_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($monitor_treatment_plan_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $monitor_treatment_plan_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($monitor_treatment_plan_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $monitor_treatment_plan_list->pageUrl() ?>start=<?php echo $monitor_treatment_plan_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($monitor_treatment_plan_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $monitor_treatment_plan_list->pageUrl() ?>start=<?php echo $monitor_treatment_plan_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($monitor_treatment_plan_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $monitor_treatment_plan_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $monitor_treatment_plan_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $monitor_treatment_plan_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($monitor_treatment_plan_list->TotalRecs > 0 && (!$monitor_treatment_plan_list->AutoHidePageSizeSelector || $monitor_treatment_plan_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="monitor_treatment_plan">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($monitor_treatment_plan_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($monitor_treatment_plan_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($monitor_treatment_plan_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($monitor_treatment_plan_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($monitor_treatment_plan_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($monitor_treatment_plan_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($monitor_treatment_plan->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $monitor_treatment_plan_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($monitor_treatment_plan_list->TotalRecs == 0 && !$monitor_treatment_plan->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $monitor_treatment_plan_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$monitor_treatment_plan_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$monitor_treatment_plan->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$monitor_treatment_plan->isExport()) { ?>
<script>
ew.scrollableTable("gmp_monitor_treatment_plan", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$monitor_treatment_plan_list->terminate();
?>