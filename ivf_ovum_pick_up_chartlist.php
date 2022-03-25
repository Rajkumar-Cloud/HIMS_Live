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
$ivf_ovum_pick_up_chart_list = new ivf_ovum_pick_up_chart_list();

// Run the page
$ivf_ovum_pick_up_chart_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_ovum_pick_up_chart_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$ivf_ovum_pick_up_chart->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fivf_ovum_pick_up_chartlist = currentForm = new ew.Form("fivf_ovum_pick_up_chartlist", "list");
fivf_ovum_pick_up_chartlist.formKeyCountName = '<?php echo $ivf_ovum_pick_up_chart_list->FormKeyCountName ?>';

// Form_CustomValidate event
fivf_ovum_pick_up_chartlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_ovum_pick_up_chartlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fivf_ovum_pick_up_chartlist.lists["x_Protocol"] = <?php echo $ivf_ovum_pick_up_chart_list->Protocol->Lookup->toClientList() ?>;
fivf_ovum_pick_up_chartlist.lists["x_Protocol"].options = <?php echo JsonEncode($ivf_ovum_pick_up_chart_list->Protocol->options(FALSE, TRUE)) ?>;
fivf_ovum_pick_up_chartlist.lists["x_Cannulation"] = <?php echo $ivf_ovum_pick_up_chart_list->Cannulation->Lookup->toClientList() ?>;
fivf_ovum_pick_up_chartlist.lists["x_Cannulation"].options = <?php echo JsonEncode($ivf_ovum_pick_up_chart_list->Cannulation->options(FALSE, TRUE)) ?>;
fivf_ovum_pick_up_chartlist.lists["x_PlanT"] = <?php echo $ivf_ovum_pick_up_chart_list->PlanT->Lookup->toClientList() ?>;
fivf_ovum_pick_up_chartlist.lists["x_PlanT"].options = <?php echo JsonEncode($ivf_ovum_pick_up_chart_list->PlanT->options(FALSE, TRUE)) ?>;

// Form object for search
var fivf_ovum_pick_up_chartlistsrch = currentSearchForm = new ew.Form("fivf_ovum_pick_up_chartlistsrch");

// Filters
fivf_ovum_pick_up_chartlistsrch.filterList = <?php echo $ivf_ovum_pick_up_chart_list->getFilterList() ?>;
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
<?php if (!$ivf_ovum_pick_up_chart->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($ivf_ovum_pick_up_chart_list->TotalRecs > 0 && $ivf_ovum_pick_up_chart_list->ExportOptions->visible()) { ?>
<?php $ivf_ovum_pick_up_chart_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_list->ImportOptions->visible()) { ?>
<?php $ivf_ovum_pick_up_chart_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_list->SearchOptions->visible()) { ?>
<?php $ivf_ovum_pick_up_chart_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_list->FilterOptions->visible()) { ?>
<?php $ivf_ovum_pick_up_chart_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$ivf_ovum_pick_up_chart_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$ivf_ovum_pick_up_chart->isExport() && !$ivf_ovum_pick_up_chart->CurrentAction) { ?>
<form name="fivf_ovum_pick_up_chartlistsrch" id="fivf_ovum_pick_up_chartlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($ivf_ovum_pick_up_chart_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fivf_ovum_pick_up_chartlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="ivf_ovum_pick_up_chart">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $ivf_ovum_pick_up_chart_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($ivf_ovum_pick_up_chart_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($ivf_ovum_pick_up_chart_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($ivf_ovum_pick_up_chart_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($ivf_ovum_pick_up_chart_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $ivf_ovum_pick_up_chart_list->showPageHeader(); ?>
<?php
$ivf_ovum_pick_up_chart_list->showMessage();
?>
<?php if ($ivf_ovum_pick_up_chart_list->TotalRecs > 0 || $ivf_ovum_pick_up_chart->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($ivf_ovum_pick_up_chart_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf_ovum_pick_up_chart">
<?php if (!$ivf_ovum_pick_up_chart->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$ivf_ovum_pick_up_chart->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($ivf_ovum_pick_up_chart_list->Pager)) $ivf_ovum_pick_up_chart_list->Pager = new NumericPager($ivf_ovum_pick_up_chart_list->StartRec, $ivf_ovum_pick_up_chart_list->DisplayRecs, $ivf_ovum_pick_up_chart_list->TotalRecs, $ivf_ovum_pick_up_chart_list->RecRange, $ivf_ovum_pick_up_chart_list->AutoHidePager) ?>
<?php if ($ivf_ovum_pick_up_chart_list->Pager->RecordCount > 0 && $ivf_ovum_pick_up_chart_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($ivf_ovum_pick_up_chart_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_ovum_pick_up_chart_list->pageUrl() ?>start=<?php echo $ivf_ovum_pick_up_chart_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_ovum_pick_up_chart_list->pageUrl() ?>start=<?php echo $ivf_ovum_pick_up_chart_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($ivf_ovum_pick_up_chart_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $ivf_ovum_pick_up_chart_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_ovum_pick_up_chart_list->pageUrl() ?>start=<?php echo $ivf_ovum_pick_up_chart_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_ovum_pick_up_chart_list->pageUrl() ?>start=<?php echo $ivf_ovum_pick_up_chart_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $ivf_ovum_pick_up_chart_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $ivf_ovum_pick_up_chart_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $ivf_ovum_pick_up_chart_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_list->TotalRecs > 0 && (!$ivf_ovum_pick_up_chart_list->AutoHidePageSizeSelector || $ivf_ovum_pick_up_chart_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="ivf_ovum_pick_up_chart">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($ivf_ovum_pick_up_chart_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($ivf_ovum_pick_up_chart_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($ivf_ovum_pick_up_chart_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($ivf_ovum_pick_up_chart_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($ivf_ovum_pick_up_chart_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($ivf_ovum_pick_up_chart_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($ivf_ovum_pick_up_chart->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ivf_ovum_pick_up_chart_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fivf_ovum_pick_up_chartlist" id="fivf_ovum_pick_up_chartlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ivf_ovum_pick_up_chart_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_ovum_pick_up_chart_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_ovum_pick_up_chart">
<div id="gmp_ivf_ovum_pick_up_chart" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($ivf_ovum_pick_up_chart_list->TotalRecs > 0 || $ivf_ovum_pick_up_chart->isGridEdit()) { ?>
<table id="tbl_ivf_ovum_pick_up_chartlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$ivf_ovum_pick_up_chart_list->RowType = ROWTYPE_HEADER;

// Render list options
$ivf_ovum_pick_up_chart_list->renderListOptions();

// Render list options (header, left)
$ivf_ovum_pick_up_chart_list->ListOptions->render("header", "left");
?>
<?php if ($ivf_ovum_pick_up_chart->id->Visible) { // id ?>
	<?php if ($ivf_ovum_pick_up_chart->sortUrl($ivf_ovum_pick_up_chart->id) == "") { ?>
		<th data-name="id" class="<?php echo $ivf_ovum_pick_up_chart->id->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_id" class="ivf_ovum_pick_up_chart_id"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $ivf_ovum_pick_up_chart->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_ovum_pick_up_chart->SortUrl($ivf_ovum_pick_up_chart->id) ?>',1);"><div id="elh_ivf_ovum_pick_up_chart_id" class="ivf_ovum_pick_up_chart_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->RIDNo->Visible) { // RIDNo ?>
	<?php if ($ivf_ovum_pick_up_chart->sortUrl($ivf_ovum_pick_up_chart->RIDNo) == "") { ?>
		<th data-name="RIDNo" class="<?php echo $ivf_ovum_pick_up_chart->RIDNo->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_RIDNo" class="ivf_ovum_pick_up_chart_RIDNo"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->RIDNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RIDNo" class="<?php echo $ivf_ovum_pick_up_chart->RIDNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_ovum_pick_up_chart->SortUrl($ivf_ovum_pick_up_chart->RIDNo) ?>',1);"><div id="elh_ivf_ovum_pick_up_chart_RIDNo" class="ivf_ovum_pick_up_chart_RIDNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->RIDNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart->RIDNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart->RIDNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->Name->Visible) { // Name ?>
	<?php if ($ivf_ovum_pick_up_chart->sortUrl($ivf_ovum_pick_up_chart->Name) == "") { ?>
		<th data-name="Name" class="<?php echo $ivf_ovum_pick_up_chart->Name->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_Name" class="ivf_ovum_pick_up_chart_Name"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Name" class="<?php echo $ivf_ovum_pick_up_chart->Name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_ovum_pick_up_chart->SortUrl($ivf_ovum_pick_up_chart->Name) ?>',1);"><div id="elh_ivf_ovum_pick_up_chart_Name" class="ivf_ovum_pick_up_chart_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->Name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart->Name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart->Name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->ARTCycle->Visible) { // ARTCycle ?>
	<?php if ($ivf_ovum_pick_up_chart->sortUrl($ivf_ovum_pick_up_chart->ARTCycle) == "") { ?>
		<th data-name="ARTCycle" class="<?php echo $ivf_ovum_pick_up_chart->ARTCycle->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_ARTCycle" class="ivf_ovum_pick_up_chart_ARTCycle"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->ARTCycle->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ARTCycle" class="<?php echo $ivf_ovum_pick_up_chart->ARTCycle->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_ovum_pick_up_chart->SortUrl($ivf_ovum_pick_up_chart->ARTCycle) ?>',1);"><div id="elh_ivf_ovum_pick_up_chart_ARTCycle" class="ivf_ovum_pick_up_chart_ARTCycle">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->ARTCycle->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart->ARTCycle->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart->ARTCycle->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->Consultant->Visible) { // Consultant ?>
	<?php if ($ivf_ovum_pick_up_chart->sortUrl($ivf_ovum_pick_up_chart->Consultant) == "") { ?>
		<th data-name="Consultant" class="<?php echo $ivf_ovum_pick_up_chart->Consultant->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_Consultant" class="ivf_ovum_pick_up_chart_Consultant"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->Consultant->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Consultant" class="<?php echo $ivf_ovum_pick_up_chart->Consultant->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_ovum_pick_up_chart->SortUrl($ivf_ovum_pick_up_chart->Consultant) ?>',1);"><div id="elh_ivf_ovum_pick_up_chart_Consultant" class="ivf_ovum_pick_up_chart_Consultant">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->Consultant->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart->Consultant->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart->Consultant->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->TotalDoseOfStimulation->Visible) { // TotalDoseOfStimulation ?>
	<?php if ($ivf_ovum_pick_up_chart->sortUrl($ivf_ovum_pick_up_chart->TotalDoseOfStimulation) == "") { ?>
		<th data-name="TotalDoseOfStimulation" class="<?php echo $ivf_ovum_pick_up_chart->TotalDoseOfStimulation->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_TotalDoseOfStimulation" class="ivf_ovum_pick_up_chart_TotalDoseOfStimulation"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->TotalDoseOfStimulation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TotalDoseOfStimulation" class="<?php echo $ivf_ovum_pick_up_chart->TotalDoseOfStimulation->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_ovum_pick_up_chart->SortUrl($ivf_ovum_pick_up_chart->TotalDoseOfStimulation) ?>',1);"><div id="elh_ivf_ovum_pick_up_chart_TotalDoseOfStimulation" class="ivf_ovum_pick_up_chart_TotalDoseOfStimulation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->TotalDoseOfStimulation->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart->TotalDoseOfStimulation->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart->TotalDoseOfStimulation->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->Protocol->Visible) { // Protocol ?>
	<?php if ($ivf_ovum_pick_up_chart->sortUrl($ivf_ovum_pick_up_chart->Protocol) == "") { ?>
		<th data-name="Protocol" class="<?php echo $ivf_ovum_pick_up_chart->Protocol->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_Protocol" class="ivf_ovum_pick_up_chart_Protocol"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->Protocol->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Protocol" class="<?php echo $ivf_ovum_pick_up_chart->Protocol->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_ovum_pick_up_chart->SortUrl($ivf_ovum_pick_up_chart->Protocol) ?>',1);"><div id="elh_ivf_ovum_pick_up_chart_Protocol" class="ivf_ovum_pick_up_chart_Protocol">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->Protocol->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart->Protocol->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart->Protocol->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation->Visible) { // NumberOfDaysOfStimulation ?>
	<?php if ($ivf_ovum_pick_up_chart->sortUrl($ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation) == "") { ?>
		<th data-name="NumberOfDaysOfStimulation" class="<?php echo $ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation" class="ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NumberOfDaysOfStimulation" class="<?php echo $ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_ovum_pick_up_chart->SortUrl($ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation) ?>',1);"><div id="elh_ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation" class="ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->TriggerDateTime->Visible) { // TriggerDateTime ?>
	<?php if ($ivf_ovum_pick_up_chart->sortUrl($ivf_ovum_pick_up_chart->TriggerDateTime) == "") { ?>
		<th data-name="TriggerDateTime" class="<?php echo $ivf_ovum_pick_up_chart->TriggerDateTime->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_TriggerDateTime" class="ivf_ovum_pick_up_chart_TriggerDateTime"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->TriggerDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TriggerDateTime" class="<?php echo $ivf_ovum_pick_up_chart->TriggerDateTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_ovum_pick_up_chart->SortUrl($ivf_ovum_pick_up_chart->TriggerDateTime) ?>',1);"><div id="elh_ivf_ovum_pick_up_chart_TriggerDateTime" class="ivf_ovum_pick_up_chart_TriggerDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->TriggerDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart->TriggerDateTime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart->TriggerDateTime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->OPUDateTime->Visible) { // OPUDateTime ?>
	<?php if ($ivf_ovum_pick_up_chart->sortUrl($ivf_ovum_pick_up_chart->OPUDateTime) == "") { ?>
		<th data-name="OPUDateTime" class="<?php echo $ivf_ovum_pick_up_chart->OPUDateTime->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_OPUDateTime" class="ivf_ovum_pick_up_chart_OPUDateTime"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->OPUDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OPUDateTime" class="<?php echo $ivf_ovum_pick_up_chart->OPUDateTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_ovum_pick_up_chart->SortUrl($ivf_ovum_pick_up_chart->OPUDateTime) ?>',1);"><div id="elh_ivf_ovum_pick_up_chart_OPUDateTime" class="ivf_ovum_pick_up_chart_OPUDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->OPUDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart->OPUDateTime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart->OPUDateTime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->HoursAfterTrigger->Visible) { // HoursAfterTrigger ?>
	<?php if ($ivf_ovum_pick_up_chart->sortUrl($ivf_ovum_pick_up_chart->HoursAfterTrigger) == "") { ?>
		<th data-name="HoursAfterTrigger" class="<?php echo $ivf_ovum_pick_up_chart->HoursAfterTrigger->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_HoursAfterTrigger" class="ivf_ovum_pick_up_chart_HoursAfterTrigger"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->HoursAfterTrigger->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HoursAfterTrigger" class="<?php echo $ivf_ovum_pick_up_chart->HoursAfterTrigger->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_ovum_pick_up_chart->SortUrl($ivf_ovum_pick_up_chart->HoursAfterTrigger) ?>',1);"><div id="elh_ivf_ovum_pick_up_chart_HoursAfterTrigger" class="ivf_ovum_pick_up_chart_HoursAfterTrigger">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->HoursAfterTrigger->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart->HoursAfterTrigger->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart->HoursAfterTrigger->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->SerumE2->Visible) { // SerumE2 ?>
	<?php if ($ivf_ovum_pick_up_chart->sortUrl($ivf_ovum_pick_up_chart->SerumE2) == "") { ?>
		<th data-name="SerumE2" class="<?php echo $ivf_ovum_pick_up_chart->SerumE2->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_SerumE2" class="ivf_ovum_pick_up_chart_SerumE2"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->SerumE2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SerumE2" class="<?php echo $ivf_ovum_pick_up_chart->SerumE2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_ovum_pick_up_chart->SortUrl($ivf_ovum_pick_up_chart->SerumE2) ?>',1);"><div id="elh_ivf_ovum_pick_up_chart_SerumE2" class="ivf_ovum_pick_up_chart_SerumE2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->SerumE2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart->SerumE2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart->SerumE2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->SerumP4->Visible) { // SerumP4 ?>
	<?php if ($ivf_ovum_pick_up_chart->sortUrl($ivf_ovum_pick_up_chart->SerumP4) == "") { ?>
		<th data-name="SerumP4" class="<?php echo $ivf_ovum_pick_up_chart->SerumP4->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_SerumP4" class="ivf_ovum_pick_up_chart_SerumP4"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->SerumP4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SerumP4" class="<?php echo $ivf_ovum_pick_up_chart->SerumP4->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_ovum_pick_up_chart->SortUrl($ivf_ovum_pick_up_chart->SerumP4) ?>',1);"><div id="elh_ivf_ovum_pick_up_chart_SerumP4" class="ivf_ovum_pick_up_chart_SerumP4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->SerumP4->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart->SerumP4->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart->SerumP4->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->FORT->Visible) { // FORT ?>
	<?php if ($ivf_ovum_pick_up_chart->sortUrl($ivf_ovum_pick_up_chart->FORT) == "") { ?>
		<th data-name="FORT" class="<?php echo $ivf_ovum_pick_up_chart->FORT->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_FORT" class="ivf_ovum_pick_up_chart_FORT"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->FORT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FORT" class="<?php echo $ivf_ovum_pick_up_chart->FORT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_ovum_pick_up_chart->SortUrl($ivf_ovum_pick_up_chart->FORT) ?>',1);"><div id="elh_ivf_ovum_pick_up_chart_FORT" class="ivf_ovum_pick_up_chart_FORT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->FORT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart->FORT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart->FORT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->ExperctedOocytes->Visible) { // ExperctedOocytes ?>
	<?php if ($ivf_ovum_pick_up_chart->sortUrl($ivf_ovum_pick_up_chart->ExperctedOocytes) == "") { ?>
		<th data-name="ExperctedOocytes" class="<?php echo $ivf_ovum_pick_up_chart->ExperctedOocytes->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_ExperctedOocytes" class="ivf_ovum_pick_up_chart_ExperctedOocytes"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->ExperctedOocytes->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ExperctedOocytes" class="<?php echo $ivf_ovum_pick_up_chart->ExperctedOocytes->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_ovum_pick_up_chart->SortUrl($ivf_ovum_pick_up_chart->ExperctedOocytes) ?>',1);"><div id="elh_ivf_ovum_pick_up_chart_ExperctedOocytes" class="ivf_ovum_pick_up_chart_ExperctedOocytes">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->ExperctedOocytes->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart->ExperctedOocytes->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart->ExperctedOocytes->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->NoOfOocytesRetrieved->Visible) { // NoOfOocytesRetrieved ?>
	<?php if ($ivf_ovum_pick_up_chart->sortUrl($ivf_ovum_pick_up_chart->NoOfOocytesRetrieved) == "") { ?>
		<th data-name="NoOfOocytesRetrieved" class="<?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrieved->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_NoOfOocytesRetrieved" class="ivf_ovum_pick_up_chart_NoOfOocytesRetrieved"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrieved->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoOfOocytesRetrieved" class="<?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrieved->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_ovum_pick_up_chart->SortUrl($ivf_ovum_pick_up_chart->NoOfOocytesRetrieved) ?>',1);"><div id="elh_ivf_ovum_pick_up_chart_NoOfOocytesRetrieved" class="ivf_ovum_pick_up_chart_NoOfOocytesRetrieved">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrieved->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart->NoOfOocytesRetrieved->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart->NoOfOocytesRetrieved->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->OocytesRetreivalRate->Visible) { // OocytesRetreivalRate ?>
	<?php if ($ivf_ovum_pick_up_chart->sortUrl($ivf_ovum_pick_up_chart->OocytesRetreivalRate) == "") { ?>
		<th data-name="OocytesRetreivalRate" class="<?php echo $ivf_ovum_pick_up_chart->OocytesRetreivalRate->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_OocytesRetreivalRate" class="ivf_ovum_pick_up_chart_OocytesRetreivalRate"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->OocytesRetreivalRate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OocytesRetreivalRate" class="<?php echo $ivf_ovum_pick_up_chart->OocytesRetreivalRate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_ovum_pick_up_chart->SortUrl($ivf_ovum_pick_up_chart->OocytesRetreivalRate) ?>',1);"><div id="elh_ivf_ovum_pick_up_chart_OocytesRetreivalRate" class="ivf_ovum_pick_up_chart_OocytesRetreivalRate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->OocytesRetreivalRate->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart->OocytesRetreivalRate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart->OocytesRetreivalRate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->Anesthesia->Visible) { // Anesthesia ?>
	<?php if ($ivf_ovum_pick_up_chart->sortUrl($ivf_ovum_pick_up_chart->Anesthesia) == "") { ?>
		<th data-name="Anesthesia" class="<?php echo $ivf_ovum_pick_up_chart->Anesthesia->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_Anesthesia" class="ivf_ovum_pick_up_chart_Anesthesia"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->Anesthesia->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Anesthesia" class="<?php echo $ivf_ovum_pick_up_chart->Anesthesia->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_ovum_pick_up_chart->SortUrl($ivf_ovum_pick_up_chart->Anesthesia) ?>',1);"><div id="elh_ivf_ovum_pick_up_chart_Anesthesia" class="ivf_ovum_pick_up_chart_Anesthesia">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->Anesthesia->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart->Anesthesia->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart->Anesthesia->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->TrialCannulation->Visible) { // TrialCannulation ?>
	<?php if ($ivf_ovum_pick_up_chart->sortUrl($ivf_ovum_pick_up_chart->TrialCannulation) == "") { ?>
		<th data-name="TrialCannulation" class="<?php echo $ivf_ovum_pick_up_chart->TrialCannulation->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_TrialCannulation" class="ivf_ovum_pick_up_chart_TrialCannulation"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->TrialCannulation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TrialCannulation" class="<?php echo $ivf_ovum_pick_up_chart->TrialCannulation->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_ovum_pick_up_chart->SortUrl($ivf_ovum_pick_up_chart->TrialCannulation) ?>',1);"><div id="elh_ivf_ovum_pick_up_chart_TrialCannulation" class="ivf_ovum_pick_up_chart_TrialCannulation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->TrialCannulation->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart->TrialCannulation->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart->TrialCannulation->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->UCL->Visible) { // UCL ?>
	<?php if ($ivf_ovum_pick_up_chart->sortUrl($ivf_ovum_pick_up_chart->UCL) == "") { ?>
		<th data-name="UCL" class="<?php echo $ivf_ovum_pick_up_chart->UCL->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_UCL" class="ivf_ovum_pick_up_chart_UCL"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->UCL->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UCL" class="<?php echo $ivf_ovum_pick_up_chart->UCL->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_ovum_pick_up_chart->SortUrl($ivf_ovum_pick_up_chart->UCL) ?>',1);"><div id="elh_ivf_ovum_pick_up_chart_UCL" class="ivf_ovum_pick_up_chart_UCL">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->UCL->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart->UCL->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart->UCL->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->Angle->Visible) { // Angle ?>
	<?php if ($ivf_ovum_pick_up_chart->sortUrl($ivf_ovum_pick_up_chart->Angle) == "") { ?>
		<th data-name="Angle" class="<?php echo $ivf_ovum_pick_up_chart->Angle->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_Angle" class="ivf_ovum_pick_up_chart_Angle"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->Angle->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Angle" class="<?php echo $ivf_ovum_pick_up_chart->Angle->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_ovum_pick_up_chart->SortUrl($ivf_ovum_pick_up_chart->Angle) ?>',1);"><div id="elh_ivf_ovum_pick_up_chart_Angle" class="ivf_ovum_pick_up_chart_Angle">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->Angle->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart->Angle->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart->Angle->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->EMS->Visible) { // EMS ?>
	<?php if ($ivf_ovum_pick_up_chart->sortUrl($ivf_ovum_pick_up_chart->EMS) == "") { ?>
		<th data-name="EMS" class="<?php echo $ivf_ovum_pick_up_chart->EMS->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_EMS" class="ivf_ovum_pick_up_chart_EMS"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->EMS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EMS" class="<?php echo $ivf_ovum_pick_up_chart->EMS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_ovum_pick_up_chart->SortUrl($ivf_ovum_pick_up_chart->EMS) ?>',1);"><div id="elh_ivf_ovum_pick_up_chart_EMS" class="ivf_ovum_pick_up_chart_EMS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->EMS->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart->EMS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart->EMS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->Cannulation->Visible) { // Cannulation ?>
	<?php if ($ivf_ovum_pick_up_chart->sortUrl($ivf_ovum_pick_up_chart->Cannulation) == "") { ?>
		<th data-name="Cannulation" class="<?php echo $ivf_ovum_pick_up_chart->Cannulation->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_Cannulation" class="ivf_ovum_pick_up_chart_Cannulation"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->Cannulation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Cannulation" class="<?php echo $ivf_ovum_pick_up_chart->Cannulation->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_ovum_pick_up_chart->SortUrl($ivf_ovum_pick_up_chart->Cannulation) ?>',1);"><div id="elh_ivf_ovum_pick_up_chart_Cannulation" class="ivf_ovum_pick_up_chart_Cannulation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->Cannulation->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart->Cannulation->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart->Cannulation->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd->Visible) { // NoOfOocytesRetrievedd ?>
	<?php if ($ivf_ovum_pick_up_chart->sortUrl($ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd) == "") { ?>
		<th data-name="NoOfOocytesRetrievedd" class="<?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd" class="ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoOfOocytesRetrievedd" class="<?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_ovum_pick_up_chart->SortUrl($ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd) ?>',1);"><div id="elh_ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd" class="ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->PlanT->Visible) { // PlanT ?>
	<?php if ($ivf_ovum_pick_up_chart->sortUrl($ivf_ovum_pick_up_chart->PlanT) == "") { ?>
		<th data-name="PlanT" class="<?php echo $ivf_ovum_pick_up_chart->PlanT->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_PlanT" class="ivf_ovum_pick_up_chart_PlanT"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->PlanT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PlanT" class="<?php echo $ivf_ovum_pick_up_chart->PlanT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_ovum_pick_up_chart->SortUrl($ivf_ovum_pick_up_chart->PlanT) ?>',1);"><div id="elh_ivf_ovum_pick_up_chart_PlanT" class="ivf_ovum_pick_up_chart_PlanT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->PlanT->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart->PlanT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart->PlanT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->ReviewDate->Visible) { // ReviewDate ?>
	<?php if ($ivf_ovum_pick_up_chart->sortUrl($ivf_ovum_pick_up_chart->ReviewDate) == "") { ?>
		<th data-name="ReviewDate" class="<?php echo $ivf_ovum_pick_up_chart->ReviewDate->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_ReviewDate" class="ivf_ovum_pick_up_chart_ReviewDate"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->ReviewDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReviewDate" class="<?php echo $ivf_ovum_pick_up_chart->ReviewDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_ovum_pick_up_chart->SortUrl($ivf_ovum_pick_up_chart->ReviewDate) ?>',1);"><div id="elh_ivf_ovum_pick_up_chart_ReviewDate" class="ivf_ovum_pick_up_chart_ReviewDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->ReviewDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart->ReviewDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart->ReviewDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->ReviewDoctor->Visible) { // ReviewDoctor ?>
	<?php if ($ivf_ovum_pick_up_chart->sortUrl($ivf_ovum_pick_up_chart->ReviewDoctor) == "") { ?>
		<th data-name="ReviewDoctor" class="<?php echo $ivf_ovum_pick_up_chart->ReviewDoctor->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_ReviewDoctor" class="ivf_ovum_pick_up_chart_ReviewDoctor"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->ReviewDoctor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReviewDoctor" class="<?php echo $ivf_ovum_pick_up_chart->ReviewDoctor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_ovum_pick_up_chart->SortUrl($ivf_ovum_pick_up_chart->ReviewDoctor) ?>',1);"><div id="elh_ivf_ovum_pick_up_chart_ReviewDoctor" class="ivf_ovum_pick_up_chart_ReviewDoctor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->ReviewDoctor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart->ReviewDoctor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart->ReviewDoctor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->TidNo->Visible) { // TidNo ?>
	<?php if ($ivf_ovum_pick_up_chart->sortUrl($ivf_ovum_pick_up_chart->TidNo) == "") { ?>
		<th data-name="TidNo" class="<?php echo $ivf_ovum_pick_up_chart->TidNo->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_TidNo" class="ivf_ovum_pick_up_chart_TidNo"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->TidNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TidNo" class="<?php echo $ivf_ovum_pick_up_chart->TidNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_ovum_pick_up_chart->SortUrl($ivf_ovum_pick_up_chart->TidNo) ?>',1);"><div id="elh_ivf_ovum_pick_up_chart_TidNo" class="ivf_ovum_pick_up_chart_TidNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->TidNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart->TidNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart->TidNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$ivf_ovum_pick_up_chart_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($ivf_ovum_pick_up_chart->ExportAll && $ivf_ovum_pick_up_chart->isExport()) {
	$ivf_ovum_pick_up_chart_list->StopRec = $ivf_ovum_pick_up_chart_list->TotalRecs;
} else {

	// Set the last record to display
	if ($ivf_ovum_pick_up_chart_list->TotalRecs > $ivf_ovum_pick_up_chart_list->StartRec + $ivf_ovum_pick_up_chart_list->DisplayRecs - 1)
		$ivf_ovum_pick_up_chart_list->StopRec = $ivf_ovum_pick_up_chart_list->StartRec + $ivf_ovum_pick_up_chart_list->DisplayRecs - 1;
	else
		$ivf_ovum_pick_up_chart_list->StopRec = $ivf_ovum_pick_up_chart_list->TotalRecs;
}
$ivf_ovum_pick_up_chart_list->RecCnt = $ivf_ovum_pick_up_chart_list->StartRec - 1;
if ($ivf_ovum_pick_up_chart_list->Recordset && !$ivf_ovum_pick_up_chart_list->Recordset->EOF) {
	$ivf_ovum_pick_up_chart_list->Recordset->moveFirst();
	$selectLimit = $ivf_ovum_pick_up_chart_list->UseSelectLimit;
	if (!$selectLimit && $ivf_ovum_pick_up_chart_list->StartRec > 1)
		$ivf_ovum_pick_up_chart_list->Recordset->move($ivf_ovum_pick_up_chart_list->StartRec - 1);
} elseif (!$ivf_ovum_pick_up_chart->AllowAddDeleteRow && $ivf_ovum_pick_up_chart_list->StopRec == 0) {
	$ivf_ovum_pick_up_chart_list->StopRec = $ivf_ovum_pick_up_chart->GridAddRowCount;
}

// Initialize aggregate
$ivf_ovum_pick_up_chart->RowType = ROWTYPE_AGGREGATEINIT;
$ivf_ovum_pick_up_chart->resetAttributes();
$ivf_ovum_pick_up_chart_list->renderRow();
while ($ivf_ovum_pick_up_chart_list->RecCnt < $ivf_ovum_pick_up_chart_list->StopRec) {
	$ivf_ovum_pick_up_chart_list->RecCnt++;
	if ($ivf_ovum_pick_up_chart_list->RecCnt >= $ivf_ovum_pick_up_chart_list->StartRec) {
		$ivf_ovum_pick_up_chart_list->RowCnt++;

		// Set up key count
		$ivf_ovum_pick_up_chart_list->KeyCount = $ivf_ovum_pick_up_chart_list->RowIndex;

		// Init row class and style
		$ivf_ovum_pick_up_chart->resetAttributes();
		$ivf_ovum_pick_up_chart->CssClass = "";
		if ($ivf_ovum_pick_up_chart->isGridAdd()) {
		} else {
			$ivf_ovum_pick_up_chart_list->loadRowValues($ivf_ovum_pick_up_chart_list->Recordset); // Load row values
		}
		$ivf_ovum_pick_up_chart->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$ivf_ovum_pick_up_chart->RowAttrs = array_merge($ivf_ovum_pick_up_chart->RowAttrs, array('data-rowindex'=>$ivf_ovum_pick_up_chart_list->RowCnt, 'id'=>'r' . $ivf_ovum_pick_up_chart_list->RowCnt . '_ivf_ovum_pick_up_chart', 'data-rowtype'=>$ivf_ovum_pick_up_chart->RowType));

		// Render row
		$ivf_ovum_pick_up_chart_list->renderRow();

		// Render list options
		$ivf_ovum_pick_up_chart_list->renderListOptions();
?>
	<tr<?php echo $ivf_ovum_pick_up_chart->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_ovum_pick_up_chart_list->ListOptions->render("body", "left", $ivf_ovum_pick_up_chart_list->RowCnt);
?>
	<?php if ($ivf_ovum_pick_up_chart->id->Visible) { // id ?>
		<td data-name="id"<?php echo $ivf_ovum_pick_up_chart->id->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_list->RowCnt ?>_ivf_ovum_pick_up_chart_id" class="ivf_ovum_pick_up_chart_id">
<span<?php echo $ivf_ovum_pick_up_chart->id->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->RIDNo->Visible) { // RIDNo ?>
		<td data-name="RIDNo"<?php echo $ivf_ovum_pick_up_chart->RIDNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_list->RowCnt ?>_ivf_ovum_pick_up_chart_RIDNo" class="ivf_ovum_pick_up_chart_RIDNo">
<span<?php echo $ivf_ovum_pick_up_chart->RIDNo->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->RIDNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->Name->Visible) { // Name ?>
		<td data-name="Name"<?php echo $ivf_ovum_pick_up_chart->Name->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_list->RowCnt ?>_ivf_ovum_pick_up_chart_Name" class="ivf_ovum_pick_up_chart_Name">
<span<?php echo $ivf_ovum_pick_up_chart->Name->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->Name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->ARTCycle->Visible) { // ARTCycle ?>
		<td data-name="ARTCycle"<?php echo $ivf_ovum_pick_up_chart->ARTCycle->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_list->RowCnt ?>_ivf_ovum_pick_up_chart_ARTCycle" class="ivf_ovum_pick_up_chart_ARTCycle">
<span<?php echo $ivf_ovum_pick_up_chart->ARTCycle->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->ARTCycle->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->Consultant->Visible) { // Consultant ?>
		<td data-name="Consultant"<?php echo $ivf_ovum_pick_up_chart->Consultant->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_list->RowCnt ?>_ivf_ovum_pick_up_chart_Consultant" class="ivf_ovum_pick_up_chart_Consultant">
<span<?php echo $ivf_ovum_pick_up_chart->Consultant->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->Consultant->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->TotalDoseOfStimulation->Visible) { // TotalDoseOfStimulation ?>
		<td data-name="TotalDoseOfStimulation"<?php echo $ivf_ovum_pick_up_chart->TotalDoseOfStimulation->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_list->RowCnt ?>_ivf_ovum_pick_up_chart_TotalDoseOfStimulation" class="ivf_ovum_pick_up_chart_TotalDoseOfStimulation">
<span<?php echo $ivf_ovum_pick_up_chart->TotalDoseOfStimulation->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->TotalDoseOfStimulation->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->Protocol->Visible) { // Protocol ?>
		<td data-name="Protocol"<?php echo $ivf_ovum_pick_up_chart->Protocol->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_list->RowCnt ?>_ivf_ovum_pick_up_chart_Protocol" class="ivf_ovum_pick_up_chart_Protocol">
<span<?php echo $ivf_ovum_pick_up_chart->Protocol->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->Protocol->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation->Visible) { // NumberOfDaysOfStimulation ?>
		<td data-name="NumberOfDaysOfStimulation"<?php echo $ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_list->RowCnt ?>_ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation" class="ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation">
<span<?php echo $ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->TriggerDateTime->Visible) { // TriggerDateTime ?>
		<td data-name="TriggerDateTime"<?php echo $ivf_ovum_pick_up_chart->TriggerDateTime->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_list->RowCnt ?>_ivf_ovum_pick_up_chart_TriggerDateTime" class="ivf_ovum_pick_up_chart_TriggerDateTime">
<span<?php echo $ivf_ovum_pick_up_chart->TriggerDateTime->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->TriggerDateTime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->OPUDateTime->Visible) { // OPUDateTime ?>
		<td data-name="OPUDateTime"<?php echo $ivf_ovum_pick_up_chart->OPUDateTime->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_list->RowCnt ?>_ivf_ovum_pick_up_chart_OPUDateTime" class="ivf_ovum_pick_up_chart_OPUDateTime">
<span<?php echo $ivf_ovum_pick_up_chart->OPUDateTime->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->OPUDateTime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->HoursAfterTrigger->Visible) { // HoursAfterTrigger ?>
		<td data-name="HoursAfterTrigger"<?php echo $ivf_ovum_pick_up_chart->HoursAfterTrigger->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_list->RowCnt ?>_ivf_ovum_pick_up_chart_HoursAfterTrigger" class="ivf_ovum_pick_up_chart_HoursAfterTrigger">
<span<?php echo $ivf_ovum_pick_up_chart->HoursAfterTrigger->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->HoursAfterTrigger->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->SerumE2->Visible) { // SerumE2 ?>
		<td data-name="SerumE2"<?php echo $ivf_ovum_pick_up_chart->SerumE2->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_list->RowCnt ?>_ivf_ovum_pick_up_chart_SerumE2" class="ivf_ovum_pick_up_chart_SerumE2">
<span<?php echo $ivf_ovum_pick_up_chart->SerumE2->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->SerumE2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->SerumP4->Visible) { // SerumP4 ?>
		<td data-name="SerumP4"<?php echo $ivf_ovum_pick_up_chart->SerumP4->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_list->RowCnt ?>_ivf_ovum_pick_up_chart_SerumP4" class="ivf_ovum_pick_up_chart_SerumP4">
<span<?php echo $ivf_ovum_pick_up_chart->SerumP4->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->SerumP4->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->FORT->Visible) { // FORT ?>
		<td data-name="FORT"<?php echo $ivf_ovum_pick_up_chart->FORT->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_list->RowCnt ?>_ivf_ovum_pick_up_chart_FORT" class="ivf_ovum_pick_up_chart_FORT">
<span<?php echo $ivf_ovum_pick_up_chart->FORT->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->FORT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->ExperctedOocytes->Visible) { // ExperctedOocytes ?>
		<td data-name="ExperctedOocytes"<?php echo $ivf_ovum_pick_up_chart->ExperctedOocytes->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_list->RowCnt ?>_ivf_ovum_pick_up_chart_ExperctedOocytes" class="ivf_ovum_pick_up_chart_ExperctedOocytes">
<span<?php echo $ivf_ovum_pick_up_chart->ExperctedOocytes->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->ExperctedOocytes->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->NoOfOocytesRetrieved->Visible) { // NoOfOocytesRetrieved ?>
		<td data-name="NoOfOocytesRetrieved"<?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrieved->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_list->RowCnt ?>_ivf_ovum_pick_up_chart_NoOfOocytesRetrieved" class="ivf_ovum_pick_up_chart_NoOfOocytesRetrieved">
<span<?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrieved->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrieved->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->OocytesRetreivalRate->Visible) { // OocytesRetreivalRate ?>
		<td data-name="OocytesRetreivalRate"<?php echo $ivf_ovum_pick_up_chart->OocytesRetreivalRate->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_list->RowCnt ?>_ivf_ovum_pick_up_chart_OocytesRetreivalRate" class="ivf_ovum_pick_up_chart_OocytesRetreivalRate">
<span<?php echo $ivf_ovum_pick_up_chart->OocytesRetreivalRate->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->OocytesRetreivalRate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->Anesthesia->Visible) { // Anesthesia ?>
		<td data-name="Anesthesia"<?php echo $ivf_ovum_pick_up_chart->Anesthesia->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_list->RowCnt ?>_ivf_ovum_pick_up_chart_Anesthesia" class="ivf_ovum_pick_up_chart_Anesthesia">
<span<?php echo $ivf_ovum_pick_up_chart->Anesthesia->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->Anesthesia->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->TrialCannulation->Visible) { // TrialCannulation ?>
		<td data-name="TrialCannulation"<?php echo $ivf_ovum_pick_up_chart->TrialCannulation->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_list->RowCnt ?>_ivf_ovum_pick_up_chart_TrialCannulation" class="ivf_ovum_pick_up_chart_TrialCannulation">
<span<?php echo $ivf_ovum_pick_up_chart->TrialCannulation->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->TrialCannulation->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->UCL->Visible) { // UCL ?>
		<td data-name="UCL"<?php echo $ivf_ovum_pick_up_chart->UCL->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_list->RowCnt ?>_ivf_ovum_pick_up_chart_UCL" class="ivf_ovum_pick_up_chart_UCL">
<span<?php echo $ivf_ovum_pick_up_chart->UCL->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->UCL->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->Angle->Visible) { // Angle ?>
		<td data-name="Angle"<?php echo $ivf_ovum_pick_up_chart->Angle->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_list->RowCnt ?>_ivf_ovum_pick_up_chart_Angle" class="ivf_ovum_pick_up_chart_Angle">
<span<?php echo $ivf_ovum_pick_up_chart->Angle->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->Angle->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->EMS->Visible) { // EMS ?>
		<td data-name="EMS"<?php echo $ivf_ovum_pick_up_chart->EMS->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_list->RowCnt ?>_ivf_ovum_pick_up_chart_EMS" class="ivf_ovum_pick_up_chart_EMS">
<span<?php echo $ivf_ovum_pick_up_chart->EMS->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->EMS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->Cannulation->Visible) { // Cannulation ?>
		<td data-name="Cannulation"<?php echo $ivf_ovum_pick_up_chart->Cannulation->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_list->RowCnt ?>_ivf_ovum_pick_up_chart_Cannulation" class="ivf_ovum_pick_up_chart_Cannulation">
<span<?php echo $ivf_ovum_pick_up_chart->Cannulation->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->Cannulation->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd->Visible) { // NoOfOocytesRetrievedd ?>
		<td data-name="NoOfOocytesRetrievedd"<?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_list->RowCnt ?>_ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd" class="ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd">
<span<?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->PlanT->Visible) { // PlanT ?>
		<td data-name="PlanT"<?php echo $ivf_ovum_pick_up_chart->PlanT->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_list->RowCnt ?>_ivf_ovum_pick_up_chart_PlanT" class="ivf_ovum_pick_up_chart_PlanT">
<span<?php echo $ivf_ovum_pick_up_chart->PlanT->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->PlanT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->ReviewDate->Visible) { // ReviewDate ?>
		<td data-name="ReviewDate"<?php echo $ivf_ovum_pick_up_chart->ReviewDate->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_list->RowCnt ?>_ivf_ovum_pick_up_chart_ReviewDate" class="ivf_ovum_pick_up_chart_ReviewDate">
<span<?php echo $ivf_ovum_pick_up_chart->ReviewDate->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->ReviewDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->ReviewDoctor->Visible) { // ReviewDoctor ?>
		<td data-name="ReviewDoctor"<?php echo $ivf_ovum_pick_up_chart->ReviewDoctor->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_list->RowCnt ?>_ivf_ovum_pick_up_chart_ReviewDoctor" class="ivf_ovum_pick_up_chart_ReviewDoctor">
<span<?php echo $ivf_ovum_pick_up_chart->ReviewDoctor->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->ReviewDoctor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo"<?php echo $ivf_ovum_pick_up_chart->TidNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_list->RowCnt ?>_ivf_ovum_pick_up_chart_TidNo" class="ivf_ovum_pick_up_chart_TidNo">
<span<?php echo $ivf_ovum_pick_up_chart->TidNo->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->TidNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_ovum_pick_up_chart_list->ListOptions->render("body", "right", $ivf_ovum_pick_up_chart_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$ivf_ovum_pick_up_chart->isGridAdd())
		$ivf_ovum_pick_up_chart_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$ivf_ovum_pick_up_chart->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($ivf_ovum_pick_up_chart_list->Recordset)
	$ivf_ovum_pick_up_chart_list->Recordset->Close();
?>
<?php if (!$ivf_ovum_pick_up_chart->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$ivf_ovum_pick_up_chart->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($ivf_ovum_pick_up_chart_list->Pager)) $ivf_ovum_pick_up_chart_list->Pager = new NumericPager($ivf_ovum_pick_up_chart_list->StartRec, $ivf_ovum_pick_up_chart_list->DisplayRecs, $ivf_ovum_pick_up_chart_list->TotalRecs, $ivf_ovum_pick_up_chart_list->RecRange, $ivf_ovum_pick_up_chart_list->AutoHidePager) ?>
<?php if ($ivf_ovum_pick_up_chart_list->Pager->RecordCount > 0 && $ivf_ovum_pick_up_chart_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($ivf_ovum_pick_up_chart_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_ovum_pick_up_chart_list->pageUrl() ?>start=<?php echo $ivf_ovum_pick_up_chart_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_ovum_pick_up_chart_list->pageUrl() ?>start=<?php echo $ivf_ovum_pick_up_chart_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($ivf_ovum_pick_up_chart_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $ivf_ovum_pick_up_chart_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_ovum_pick_up_chart_list->pageUrl() ?>start=<?php echo $ivf_ovum_pick_up_chart_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_ovum_pick_up_chart_list->pageUrl() ?>start=<?php echo $ivf_ovum_pick_up_chart_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $ivf_ovum_pick_up_chart_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $ivf_ovum_pick_up_chart_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $ivf_ovum_pick_up_chart_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_list->TotalRecs > 0 && (!$ivf_ovum_pick_up_chart_list->AutoHidePageSizeSelector || $ivf_ovum_pick_up_chart_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="ivf_ovum_pick_up_chart">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($ivf_ovum_pick_up_chart_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($ivf_ovum_pick_up_chart_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($ivf_ovum_pick_up_chart_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($ivf_ovum_pick_up_chart_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($ivf_ovum_pick_up_chart_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($ivf_ovum_pick_up_chart_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($ivf_ovum_pick_up_chart->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ivf_ovum_pick_up_chart_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_list->TotalRecs == 0 && !$ivf_ovum_pick_up_chart->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $ivf_ovum_pick_up_chart_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$ivf_ovum_pick_up_chart_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$ivf_ovum_pick_up_chart->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$ivf_ovum_pick_up_chart->isExport()) { ?>
<script>
ew.scrollableTable("gmp_ivf_ovum_pick_up_chart", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$ivf_ovum_pick_up_chart_list->terminate();
?>