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
$ivf_et_chart_list = new ivf_et_chart_list();

// Run the page
$ivf_et_chart_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_et_chart_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$ivf_et_chart->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fivf_et_chartlist = currentForm = new ew.Form("fivf_et_chartlist", "list");
fivf_et_chartlist.formKeyCountName = '<?php echo $ivf_et_chart_list->FormKeyCountName ?>';

// Form_CustomValidate event
fivf_et_chartlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_et_chartlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fivf_et_chartlist.lists["x_ARTCycle"] = <?php echo $ivf_et_chart_list->ARTCycle->Lookup->toClientList() ?>;
fivf_et_chartlist.lists["x_ARTCycle"].options = <?php echo JsonEncode($ivf_et_chart_list->ARTCycle->options(FALSE, TRUE)) ?>;
fivf_et_chartlist.lists["x_InseminatinTechnique"] = <?php echo $ivf_et_chart_list->InseminatinTechnique->Lookup->toClientList() ?>;
fivf_et_chartlist.lists["x_InseminatinTechnique"].options = <?php echo JsonEncode($ivf_et_chart_list->InseminatinTechnique->options(FALSE, TRUE)) ?>;
fivf_et_chartlist.lists["x_PreTreatment"] = <?php echo $ivf_et_chart_list->PreTreatment->Lookup->toClientList() ?>;
fivf_et_chartlist.lists["x_PreTreatment"].options = <?php echo JsonEncode($ivf_et_chart_list->PreTreatment->options(FALSE, TRUE)) ?>;
fivf_et_chartlist.lists["x_Hysteroscopy"] = <?php echo $ivf_et_chart_list->Hysteroscopy->Lookup->toClientList() ?>;
fivf_et_chartlist.lists["x_Hysteroscopy"].options = <?php echo JsonEncode($ivf_et_chart_list->Hysteroscopy->options(FALSE, TRUE)) ?>;
fivf_et_chartlist.lists["x_EndometrialScratching"] = <?php echo $ivf_et_chart_list->EndometrialScratching->Lookup->toClientList() ?>;
fivf_et_chartlist.lists["x_EndometrialScratching"].options = <?php echo JsonEncode($ivf_et_chart_list->EndometrialScratching->options(FALSE, TRUE)) ?>;
fivf_et_chartlist.lists["x_TrialCannulation"] = <?php echo $ivf_et_chart_list->TrialCannulation->Lookup->toClientList() ?>;
fivf_et_chartlist.lists["x_TrialCannulation"].options = <?php echo JsonEncode($ivf_et_chart_list->TrialCannulation->options(FALSE, TRUE)) ?>;
fivf_et_chartlist.lists["x_CYCLETYPE"] = <?php echo $ivf_et_chart_list->CYCLETYPE->Lookup->toClientList() ?>;
fivf_et_chartlist.lists["x_CYCLETYPE"].options = <?php echo JsonEncode($ivf_et_chart_list->CYCLETYPE->options(FALSE, TRUE)) ?>;
fivf_et_chartlist.lists["x_OralEstrogenDosage"] = <?php echo $ivf_et_chart_list->OralEstrogenDosage->Lookup->toClientList() ?>;
fivf_et_chartlist.lists["x_OralEstrogenDosage"].options = <?php echo JsonEncode($ivf_et_chart_list->OralEstrogenDosage->options(FALSE, TRUE)) ?>;
fivf_et_chartlist.lists["x_GCSF"] = <?php echo $ivf_et_chart_list->GCSF->Lookup->toClientList() ?>;
fivf_et_chartlist.lists["x_GCSF"].options = <?php echo JsonEncode($ivf_et_chart_list->GCSF->options(FALSE, TRUE)) ?>;
fivf_et_chartlist.lists["x_ActivatedPRP"] = <?php echo $ivf_et_chart_list->ActivatedPRP->Lookup->toClientList() ?>;
fivf_et_chartlist.lists["x_ActivatedPRP"].options = <?php echo JsonEncode($ivf_et_chart_list->ActivatedPRP->options(FALSE, TRUE)) ?>;
fivf_et_chartlist.lists["x_ERA"] = <?php echo $ivf_et_chart_list->ERA->Lookup->toClientList() ?>;
fivf_et_chartlist.lists["x_ERA"].options = <?php echo JsonEncode($ivf_et_chart_list->ERA->options(FALSE, TRUE)) ?>;

// Form object for search
var fivf_et_chartlistsrch = currentSearchForm = new ew.Form("fivf_et_chartlistsrch");

// Filters
fivf_et_chartlistsrch.filterList = <?php echo $ivf_et_chart_list->getFilterList() ?>;
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
<?php if (!$ivf_et_chart->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($ivf_et_chart_list->TotalRecs > 0 && $ivf_et_chart_list->ExportOptions->visible()) { ?>
<?php $ivf_et_chart_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_et_chart_list->ImportOptions->visible()) { ?>
<?php $ivf_et_chart_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_et_chart_list->SearchOptions->visible()) { ?>
<?php $ivf_et_chart_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_et_chart_list->FilterOptions->visible()) { ?>
<?php $ivf_et_chart_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$ivf_et_chart_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$ivf_et_chart->isExport() && !$ivf_et_chart->CurrentAction) { ?>
<form name="fivf_et_chartlistsrch" id="fivf_et_chartlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($ivf_et_chart_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fivf_et_chartlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="ivf_et_chart">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($ivf_et_chart_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($ivf_et_chart_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $ivf_et_chart_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($ivf_et_chart_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($ivf_et_chart_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($ivf_et_chart_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($ivf_et_chart_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $ivf_et_chart_list->showPageHeader(); ?>
<?php
$ivf_et_chart_list->showMessage();
?>
<?php if ($ivf_et_chart_list->TotalRecs > 0 || $ivf_et_chart->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($ivf_et_chart_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf_et_chart">
<?php if (!$ivf_et_chart->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$ivf_et_chart->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($ivf_et_chart_list->Pager)) $ivf_et_chart_list->Pager = new NumericPager($ivf_et_chart_list->StartRec, $ivf_et_chart_list->DisplayRecs, $ivf_et_chart_list->TotalRecs, $ivf_et_chart_list->RecRange, $ivf_et_chart_list->AutoHidePager) ?>
<?php if ($ivf_et_chart_list->Pager->RecordCount > 0 && $ivf_et_chart_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($ivf_et_chart_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_et_chart_list->pageUrl() ?>start=<?php echo $ivf_et_chart_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($ivf_et_chart_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_et_chart_list->pageUrl() ?>start=<?php echo $ivf_et_chart_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($ivf_et_chart_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $ivf_et_chart_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($ivf_et_chart_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_et_chart_list->pageUrl() ?>start=<?php echo $ivf_et_chart_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($ivf_et_chart_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_et_chart_list->pageUrl() ?>start=<?php echo $ivf_et_chart_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($ivf_et_chart_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $ivf_et_chart_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $ivf_et_chart_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $ivf_et_chart_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($ivf_et_chart_list->TotalRecs > 0 && (!$ivf_et_chart_list->AutoHidePageSizeSelector || $ivf_et_chart_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="ivf_et_chart">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($ivf_et_chart_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($ivf_et_chart_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($ivf_et_chart_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($ivf_et_chart_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($ivf_et_chart_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($ivf_et_chart_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($ivf_et_chart->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ivf_et_chart_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fivf_et_chartlist" id="fivf_et_chartlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ivf_et_chart_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_et_chart_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_et_chart">
<div id="gmp_ivf_et_chart" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($ivf_et_chart_list->TotalRecs > 0 || $ivf_et_chart->isGridEdit()) { ?>
<table id="tbl_ivf_et_chartlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$ivf_et_chart_list->RowType = ROWTYPE_HEADER;

// Render list options
$ivf_et_chart_list->renderListOptions();

// Render list options (header, left)
$ivf_et_chart_list->ListOptions->render("header", "left");
?>
<?php if ($ivf_et_chart->id->Visible) { // id ?>
	<?php if ($ivf_et_chart->sortUrl($ivf_et_chart->id) == "") { ?>
		<th data-name="id" class="<?php echo $ivf_et_chart->id->headerCellClass() ?>"><div id="elh_ivf_et_chart_id" class="ivf_et_chart_id"><div class="ew-table-header-caption"><?php echo $ivf_et_chart->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $ivf_et_chart->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_et_chart->SortUrl($ivf_et_chart->id) ?>',1);"><div id="elh_ivf_et_chart_id" class="ivf_et_chart_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_et_chart->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->RIDNo->Visible) { // RIDNo ?>
	<?php if ($ivf_et_chart->sortUrl($ivf_et_chart->RIDNo) == "") { ?>
		<th data-name="RIDNo" class="<?php echo $ivf_et_chart->RIDNo->headerCellClass() ?>"><div id="elh_ivf_et_chart_RIDNo" class="ivf_et_chart_RIDNo"><div class="ew-table-header-caption"><?php echo $ivf_et_chart->RIDNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RIDNo" class="<?php echo $ivf_et_chart->RIDNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_et_chart->SortUrl($ivf_et_chart->RIDNo) ?>',1);"><div id="elh_ivf_et_chart_RIDNo" class="ivf_et_chart_RIDNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart->RIDNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart->RIDNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_et_chart->RIDNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->Name->Visible) { // Name ?>
	<?php if ($ivf_et_chart->sortUrl($ivf_et_chart->Name) == "") { ?>
		<th data-name="Name" class="<?php echo $ivf_et_chart->Name->headerCellClass() ?>"><div id="elh_ivf_et_chart_Name" class="ivf_et_chart_Name"><div class="ew-table-header-caption"><?php echo $ivf_et_chart->Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Name" class="<?php echo $ivf_et_chart->Name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_et_chart->SortUrl($ivf_et_chart->Name) ?>',1);"><div id="elh_ivf_et_chart_Name" class="ivf_et_chart_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart->Name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart->Name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_et_chart->Name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->ARTCycle->Visible) { // ARTCycle ?>
	<?php if ($ivf_et_chart->sortUrl($ivf_et_chart->ARTCycle) == "") { ?>
		<th data-name="ARTCycle" class="<?php echo $ivf_et_chart->ARTCycle->headerCellClass() ?>"><div id="elh_ivf_et_chart_ARTCycle" class="ivf_et_chart_ARTCycle"><div class="ew-table-header-caption"><?php echo $ivf_et_chart->ARTCycle->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ARTCycle" class="<?php echo $ivf_et_chart->ARTCycle->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_et_chart->SortUrl($ivf_et_chart->ARTCycle) ?>',1);"><div id="elh_ivf_et_chart_ARTCycle" class="ivf_et_chart_ARTCycle">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart->ARTCycle->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart->ARTCycle->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_et_chart->ARTCycle->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->Consultant->Visible) { // Consultant ?>
	<?php if ($ivf_et_chart->sortUrl($ivf_et_chart->Consultant) == "") { ?>
		<th data-name="Consultant" class="<?php echo $ivf_et_chart->Consultant->headerCellClass() ?>"><div id="elh_ivf_et_chart_Consultant" class="ivf_et_chart_Consultant"><div class="ew-table-header-caption"><?php echo $ivf_et_chart->Consultant->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Consultant" class="<?php echo $ivf_et_chart->Consultant->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_et_chart->SortUrl($ivf_et_chart->Consultant) ?>',1);"><div id="elh_ivf_et_chart_Consultant" class="ivf_et_chart_Consultant">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart->Consultant->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart->Consultant->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_et_chart->Consultant->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
	<?php if ($ivf_et_chart->sortUrl($ivf_et_chart->InseminatinTechnique) == "") { ?>
		<th data-name="InseminatinTechnique" class="<?php echo $ivf_et_chart->InseminatinTechnique->headerCellClass() ?>"><div id="elh_ivf_et_chart_InseminatinTechnique" class="ivf_et_chart_InseminatinTechnique"><div class="ew-table-header-caption"><?php echo $ivf_et_chart->InseminatinTechnique->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="InseminatinTechnique" class="<?php echo $ivf_et_chart->InseminatinTechnique->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_et_chart->SortUrl($ivf_et_chart->InseminatinTechnique) ?>',1);"><div id="elh_ivf_et_chart_InseminatinTechnique" class="ivf_et_chart_InseminatinTechnique">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart->InseminatinTechnique->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart->InseminatinTechnique->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_et_chart->InseminatinTechnique->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->IndicationForART->Visible) { // IndicationForART ?>
	<?php if ($ivf_et_chart->sortUrl($ivf_et_chart->IndicationForART) == "") { ?>
		<th data-name="IndicationForART" class="<?php echo $ivf_et_chart->IndicationForART->headerCellClass() ?>"><div id="elh_ivf_et_chart_IndicationForART" class="ivf_et_chart_IndicationForART"><div class="ew-table-header-caption"><?php echo $ivf_et_chart->IndicationForART->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IndicationForART" class="<?php echo $ivf_et_chart->IndicationForART->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_et_chart->SortUrl($ivf_et_chart->IndicationForART) ?>',1);"><div id="elh_ivf_et_chart_IndicationForART" class="ivf_et_chart_IndicationForART">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart->IndicationForART->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart->IndicationForART->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_et_chart->IndicationForART->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->PreTreatment->Visible) { // PreTreatment ?>
	<?php if ($ivf_et_chart->sortUrl($ivf_et_chart->PreTreatment) == "") { ?>
		<th data-name="PreTreatment" class="<?php echo $ivf_et_chart->PreTreatment->headerCellClass() ?>"><div id="elh_ivf_et_chart_PreTreatment" class="ivf_et_chart_PreTreatment"><div class="ew-table-header-caption"><?php echo $ivf_et_chart->PreTreatment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PreTreatment" class="<?php echo $ivf_et_chart->PreTreatment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_et_chart->SortUrl($ivf_et_chart->PreTreatment) ?>',1);"><div id="elh_ivf_et_chart_PreTreatment" class="ivf_et_chart_PreTreatment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart->PreTreatment->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart->PreTreatment->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_et_chart->PreTreatment->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->Hysteroscopy->Visible) { // Hysteroscopy ?>
	<?php if ($ivf_et_chart->sortUrl($ivf_et_chart->Hysteroscopy) == "") { ?>
		<th data-name="Hysteroscopy" class="<?php echo $ivf_et_chart->Hysteroscopy->headerCellClass() ?>"><div id="elh_ivf_et_chart_Hysteroscopy" class="ivf_et_chart_Hysteroscopy"><div class="ew-table-header-caption"><?php echo $ivf_et_chart->Hysteroscopy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Hysteroscopy" class="<?php echo $ivf_et_chart->Hysteroscopy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_et_chart->SortUrl($ivf_et_chart->Hysteroscopy) ?>',1);"><div id="elh_ivf_et_chart_Hysteroscopy" class="ivf_et_chart_Hysteroscopy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart->Hysteroscopy->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart->Hysteroscopy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_et_chart->Hysteroscopy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->EndometrialScratching->Visible) { // EndometrialScratching ?>
	<?php if ($ivf_et_chart->sortUrl($ivf_et_chart->EndometrialScratching) == "") { ?>
		<th data-name="EndometrialScratching" class="<?php echo $ivf_et_chart->EndometrialScratching->headerCellClass() ?>"><div id="elh_ivf_et_chart_EndometrialScratching" class="ivf_et_chart_EndometrialScratching"><div class="ew-table-header-caption"><?php echo $ivf_et_chart->EndometrialScratching->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EndometrialScratching" class="<?php echo $ivf_et_chart->EndometrialScratching->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_et_chart->SortUrl($ivf_et_chart->EndometrialScratching) ?>',1);"><div id="elh_ivf_et_chart_EndometrialScratching" class="ivf_et_chart_EndometrialScratching">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart->EndometrialScratching->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart->EndometrialScratching->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_et_chart->EndometrialScratching->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->TrialCannulation->Visible) { // TrialCannulation ?>
	<?php if ($ivf_et_chart->sortUrl($ivf_et_chart->TrialCannulation) == "") { ?>
		<th data-name="TrialCannulation" class="<?php echo $ivf_et_chart->TrialCannulation->headerCellClass() ?>"><div id="elh_ivf_et_chart_TrialCannulation" class="ivf_et_chart_TrialCannulation"><div class="ew-table-header-caption"><?php echo $ivf_et_chart->TrialCannulation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TrialCannulation" class="<?php echo $ivf_et_chart->TrialCannulation->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_et_chart->SortUrl($ivf_et_chart->TrialCannulation) ?>',1);"><div id="elh_ivf_et_chart_TrialCannulation" class="ivf_et_chart_TrialCannulation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart->TrialCannulation->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart->TrialCannulation->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_et_chart->TrialCannulation->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->CYCLETYPE->Visible) { // CYCLETYPE ?>
	<?php if ($ivf_et_chart->sortUrl($ivf_et_chart->CYCLETYPE) == "") { ?>
		<th data-name="CYCLETYPE" class="<?php echo $ivf_et_chart->CYCLETYPE->headerCellClass() ?>"><div id="elh_ivf_et_chart_CYCLETYPE" class="ivf_et_chart_CYCLETYPE"><div class="ew-table-header-caption"><?php echo $ivf_et_chart->CYCLETYPE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CYCLETYPE" class="<?php echo $ivf_et_chart->CYCLETYPE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_et_chart->SortUrl($ivf_et_chart->CYCLETYPE) ?>',1);"><div id="elh_ivf_et_chart_CYCLETYPE" class="ivf_et_chart_CYCLETYPE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart->CYCLETYPE->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart->CYCLETYPE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_et_chart->CYCLETYPE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->HRTCYCLE->Visible) { // HRTCYCLE ?>
	<?php if ($ivf_et_chart->sortUrl($ivf_et_chart->HRTCYCLE) == "") { ?>
		<th data-name="HRTCYCLE" class="<?php echo $ivf_et_chart->HRTCYCLE->headerCellClass() ?>"><div id="elh_ivf_et_chart_HRTCYCLE" class="ivf_et_chart_HRTCYCLE"><div class="ew-table-header-caption"><?php echo $ivf_et_chart->HRTCYCLE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HRTCYCLE" class="<?php echo $ivf_et_chart->HRTCYCLE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_et_chart->SortUrl($ivf_et_chart->HRTCYCLE) ?>',1);"><div id="elh_ivf_et_chart_HRTCYCLE" class="ivf_et_chart_HRTCYCLE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart->HRTCYCLE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart->HRTCYCLE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_et_chart->HRTCYCLE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->OralEstrogenDosage->Visible) { // OralEstrogenDosage ?>
	<?php if ($ivf_et_chart->sortUrl($ivf_et_chart->OralEstrogenDosage) == "") { ?>
		<th data-name="OralEstrogenDosage" class="<?php echo $ivf_et_chart->OralEstrogenDosage->headerCellClass() ?>"><div id="elh_ivf_et_chart_OralEstrogenDosage" class="ivf_et_chart_OralEstrogenDosage"><div class="ew-table-header-caption"><?php echo $ivf_et_chart->OralEstrogenDosage->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OralEstrogenDosage" class="<?php echo $ivf_et_chart->OralEstrogenDosage->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_et_chart->SortUrl($ivf_et_chart->OralEstrogenDosage) ?>',1);"><div id="elh_ivf_et_chart_OralEstrogenDosage" class="ivf_et_chart_OralEstrogenDosage">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart->OralEstrogenDosage->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart->OralEstrogenDosage->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_et_chart->OralEstrogenDosage->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->VaginalEstrogen->Visible) { // VaginalEstrogen ?>
	<?php if ($ivf_et_chart->sortUrl($ivf_et_chart->VaginalEstrogen) == "") { ?>
		<th data-name="VaginalEstrogen" class="<?php echo $ivf_et_chart->VaginalEstrogen->headerCellClass() ?>"><div id="elh_ivf_et_chart_VaginalEstrogen" class="ivf_et_chart_VaginalEstrogen"><div class="ew-table-header-caption"><?php echo $ivf_et_chart->VaginalEstrogen->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="VaginalEstrogen" class="<?php echo $ivf_et_chart->VaginalEstrogen->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_et_chart->SortUrl($ivf_et_chart->VaginalEstrogen) ?>',1);"><div id="elh_ivf_et_chart_VaginalEstrogen" class="ivf_et_chart_VaginalEstrogen">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart->VaginalEstrogen->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart->VaginalEstrogen->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_et_chart->VaginalEstrogen->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->GCSF->Visible) { // GCSF ?>
	<?php if ($ivf_et_chart->sortUrl($ivf_et_chart->GCSF) == "") { ?>
		<th data-name="GCSF" class="<?php echo $ivf_et_chart->GCSF->headerCellClass() ?>"><div id="elh_ivf_et_chart_GCSF" class="ivf_et_chart_GCSF"><div class="ew-table-header-caption"><?php echo $ivf_et_chart->GCSF->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GCSF" class="<?php echo $ivf_et_chart->GCSF->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_et_chart->SortUrl($ivf_et_chart->GCSF) ?>',1);"><div id="elh_ivf_et_chart_GCSF" class="ivf_et_chart_GCSF">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart->GCSF->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart->GCSF->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_et_chart->GCSF->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->ActivatedPRP->Visible) { // ActivatedPRP ?>
	<?php if ($ivf_et_chart->sortUrl($ivf_et_chart->ActivatedPRP) == "") { ?>
		<th data-name="ActivatedPRP" class="<?php echo $ivf_et_chart->ActivatedPRP->headerCellClass() ?>"><div id="elh_ivf_et_chart_ActivatedPRP" class="ivf_et_chart_ActivatedPRP"><div class="ew-table-header-caption"><?php echo $ivf_et_chart->ActivatedPRP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ActivatedPRP" class="<?php echo $ivf_et_chart->ActivatedPRP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_et_chart->SortUrl($ivf_et_chart->ActivatedPRP) ?>',1);"><div id="elh_ivf_et_chart_ActivatedPRP" class="ivf_et_chart_ActivatedPRP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart->ActivatedPRP->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart->ActivatedPRP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_et_chart->ActivatedPRP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->ERA->Visible) { // ERA ?>
	<?php if ($ivf_et_chart->sortUrl($ivf_et_chart->ERA) == "") { ?>
		<th data-name="ERA" class="<?php echo $ivf_et_chart->ERA->headerCellClass() ?>"><div id="elh_ivf_et_chart_ERA" class="ivf_et_chart_ERA"><div class="ew-table-header-caption"><?php echo $ivf_et_chart->ERA->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ERA" class="<?php echo $ivf_et_chart->ERA->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_et_chart->SortUrl($ivf_et_chart->ERA) ?>',1);"><div id="elh_ivf_et_chart_ERA" class="ivf_et_chart_ERA">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart->ERA->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart->ERA->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_et_chart->ERA->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->UCLcm->Visible) { // UCLcm ?>
	<?php if ($ivf_et_chart->sortUrl($ivf_et_chart->UCLcm) == "") { ?>
		<th data-name="UCLcm" class="<?php echo $ivf_et_chart->UCLcm->headerCellClass() ?>"><div id="elh_ivf_et_chart_UCLcm" class="ivf_et_chart_UCLcm"><div class="ew-table-header-caption"><?php echo $ivf_et_chart->UCLcm->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UCLcm" class="<?php echo $ivf_et_chart->UCLcm->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_et_chart->SortUrl($ivf_et_chart->UCLcm) ?>',1);"><div id="elh_ivf_et_chart_UCLcm" class="ivf_et_chart_UCLcm">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart->UCLcm->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart->UCLcm->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_et_chart->UCLcm->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->DATEOFSTART->Visible) { // DATEOFSTART ?>
	<?php if ($ivf_et_chart->sortUrl($ivf_et_chart->DATEOFSTART) == "") { ?>
		<th data-name="DATEOFSTART" class="<?php echo $ivf_et_chart->DATEOFSTART->headerCellClass() ?>"><div id="elh_ivf_et_chart_DATEOFSTART" class="ivf_et_chart_DATEOFSTART"><div class="ew-table-header-caption"><?php echo $ivf_et_chart->DATEOFSTART->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DATEOFSTART" class="<?php echo $ivf_et_chart->DATEOFSTART->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_et_chart->SortUrl($ivf_et_chart->DATEOFSTART) ?>',1);"><div id="elh_ivf_et_chart_DATEOFSTART" class="ivf_et_chart_DATEOFSTART">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart->DATEOFSTART->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart->DATEOFSTART->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_et_chart->DATEOFSTART->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->DATEOFEMBRYOTRANSFER->Visible) { // DATEOFEMBRYOTRANSFER ?>
	<?php if ($ivf_et_chart->sortUrl($ivf_et_chart->DATEOFEMBRYOTRANSFER) == "") { ?>
		<th data-name="DATEOFEMBRYOTRANSFER" class="<?php echo $ivf_et_chart->DATEOFEMBRYOTRANSFER->headerCellClass() ?>"><div id="elh_ivf_et_chart_DATEOFEMBRYOTRANSFER" class="ivf_et_chart_DATEOFEMBRYOTRANSFER"><div class="ew-table-header-caption"><?php echo $ivf_et_chart->DATEOFEMBRYOTRANSFER->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DATEOFEMBRYOTRANSFER" class="<?php echo $ivf_et_chart->DATEOFEMBRYOTRANSFER->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_et_chart->SortUrl($ivf_et_chart->DATEOFEMBRYOTRANSFER) ?>',1);"><div id="elh_ivf_et_chart_DATEOFEMBRYOTRANSFER" class="ivf_et_chart_DATEOFEMBRYOTRANSFER">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart->DATEOFEMBRYOTRANSFER->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart->DATEOFEMBRYOTRANSFER->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_et_chart->DATEOFEMBRYOTRANSFER->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->DAYOFEMBRYOTRANSFER->Visible) { // DAYOFEMBRYOTRANSFER ?>
	<?php if ($ivf_et_chart->sortUrl($ivf_et_chart->DAYOFEMBRYOTRANSFER) == "") { ?>
		<th data-name="DAYOFEMBRYOTRANSFER" class="<?php echo $ivf_et_chart->DAYOFEMBRYOTRANSFER->headerCellClass() ?>"><div id="elh_ivf_et_chart_DAYOFEMBRYOTRANSFER" class="ivf_et_chart_DAYOFEMBRYOTRANSFER"><div class="ew-table-header-caption"><?php echo $ivf_et_chart->DAYOFEMBRYOTRANSFER->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DAYOFEMBRYOTRANSFER" class="<?php echo $ivf_et_chart->DAYOFEMBRYOTRANSFER->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_et_chart->SortUrl($ivf_et_chart->DAYOFEMBRYOTRANSFER) ?>',1);"><div id="elh_ivf_et_chart_DAYOFEMBRYOTRANSFER" class="ivf_et_chart_DAYOFEMBRYOTRANSFER">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart->DAYOFEMBRYOTRANSFER->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart->DAYOFEMBRYOTRANSFER->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_et_chart->DAYOFEMBRYOTRANSFER->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->NOOFEMBRYOSTHAWED->Visible) { // NOOFEMBRYOSTHAWED ?>
	<?php if ($ivf_et_chart->sortUrl($ivf_et_chart->NOOFEMBRYOSTHAWED) == "") { ?>
		<th data-name="NOOFEMBRYOSTHAWED" class="<?php echo $ivf_et_chart->NOOFEMBRYOSTHAWED->headerCellClass() ?>"><div id="elh_ivf_et_chart_NOOFEMBRYOSTHAWED" class="ivf_et_chart_NOOFEMBRYOSTHAWED"><div class="ew-table-header-caption"><?php echo $ivf_et_chart->NOOFEMBRYOSTHAWED->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NOOFEMBRYOSTHAWED" class="<?php echo $ivf_et_chart->NOOFEMBRYOSTHAWED->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_et_chart->SortUrl($ivf_et_chart->NOOFEMBRYOSTHAWED) ?>',1);"><div id="elh_ivf_et_chart_NOOFEMBRYOSTHAWED" class="ivf_et_chart_NOOFEMBRYOSTHAWED">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart->NOOFEMBRYOSTHAWED->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart->NOOFEMBRYOSTHAWED->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_et_chart->NOOFEMBRYOSTHAWED->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->NOOFEMBRYOSTRANSFERRED->Visible) { // NOOFEMBRYOSTRANSFERRED ?>
	<?php if ($ivf_et_chart->sortUrl($ivf_et_chart->NOOFEMBRYOSTRANSFERRED) == "") { ?>
		<th data-name="NOOFEMBRYOSTRANSFERRED" class="<?php echo $ivf_et_chart->NOOFEMBRYOSTRANSFERRED->headerCellClass() ?>"><div id="elh_ivf_et_chart_NOOFEMBRYOSTRANSFERRED" class="ivf_et_chart_NOOFEMBRYOSTRANSFERRED"><div class="ew-table-header-caption"><?php echo $ivf_et_chart->NOOFEMBRYOSTRANSFERRED->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NOOFEMBRYOSTRANSFERRED" class="<?php echo $ivf_et_chart->NOOFEMBRYOSTRANSFERRED->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_et_chart->SortUrl($ivf_et_chart->NOOFEMBRYOSTRANSFERRED) ?>',1);"><div id="elh_ivf_et_chart_NOOFEMBRYOSTRANSFERRED" class="ivf_et_chart_NOOFEMBRYOSTRANSFERRED">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart->NOOFEMBRYOSTRANSFERRED->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart->NOOFEMBRYOSTRANSFERRED->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_et_chart->NOOFEMBRYOSTRANSFERRED->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->DAYOFEMBRYOS->Visible) { // DAYOFEMBRYOS ?>
	<?php if ($ivf_et_chart->sortUrl($ivf_et_chart->DAYOFEMBRYOS) == "") { ?>
		<th data-name="DAYOFEMBRYOS" class="<?php echo $ivf_et_chart->DAYOFEMBRYOS->headerCellClass() ?>"><div id="elh_ivf_et_chart_DAYOFEMBRYOS" class="ivf_et_chart_DAYOFEMBRYOS"><div class="ew-table-header-caption"><?php echo $ivf_et_chart->DAYOFEMBRYOS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DAYOFEMBRYOS" class="<?php echo $ivf_et_chart->DAYOFEMBRYOS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_et_chart->SortUrl($ivf_et_chart->DAYOFEMBRYOS) ?>',1);"><div id="elh_ivf_et_chart_DAYOFEMBRYOS" class="ivf_et_chart_DAYOFEMBRYOS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart->DAYOFEMBRYOS->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart->DAYOFEMBRYOS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_et_chart->DAYOFEMBRYOS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->CRYOPRESERVEDEMBRYOS->Visible) { // CRYOPRESERVEDEMBRYOS ?>
	<?php if ($ivf_et_chart->sortUrl($ivf_et_chart->CRYOPRESERVEDEMBRYOS) == "") { ?>
		<th data-name="CRYOPRESERVEDEMBRYOS" class="<?php echo $ivf_et_chart->CRYOPRESERVEDEMBRYOS->headerCellClass() ?>"><div id="elh_ivf_et_chart_CRYOPRESERVEDEMBRYOS" class="ivf_et_chart_CRYOPRESERVEDEMBRYOS"><div class="ew-table-header-caption"><?php echo $ivf_et_chart->CRYOPRESERVEDEMBRYOS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CRYOPRESERVEDEMBRYOS" class="<?php echo $ivf_et_chart->CRYOPRESERVEDEMBRYOS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_et_chart->SortUrl($ivf_et_chart->CRYOPRESERVEDEMBRYOS) ?>',1);"><div id="elh_ivf_et_chart_CRYOPRESERVEDEMBRYOS" class="ivf_et_chart_CRYOPRESERVEDEMBRYOS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart->CRYOPRESERVEDEMBRYOS->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart->CRYOPRESERVEDEMBRYOS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_et_chart->CRYOPRESERVEDEMBRYOS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->Code1->Visible) { // Code1 ?>
	<?php if ($ivf_et_chart->sortUrl($ivf_et_chart->Code1) == "") { ?>
		<th data-name="Code1" class="<?php echo $ivf_et_chart->Code1->headerCellClass() ?>"><div id="elh_ivf_et_chart_Code1" class="ivf_et_chart_Code1"><div class="ew-table-header-caption"><?php echo $ivf_et_chart->Code1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Code1" class="<?php echo $ivf_et_chart->Code1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_et_chart->SortUrl($ivf_et_chart->Code1) ?>',1);"><div id="elh_ivf_et_chart_Code1" class="ivf_et_chart_Code1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart->Code1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart->Code1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_et_chart->Code1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->Code2->Visible) { // Code2 ?>
	<?php if ($ivf_et_chart->sortUrl($ivf_et_chart->Code2) == "") { ?>
		<th data-name="Code2" class="<?php echo $ivf_et_chart->Code2->headerCellClass() ?>"><div id="elh_ivf_et_chart_Code2" class="ivf_et_chart_Code2"><div class="ew-table-header-caption"><?php echo $ivf_et_chart->Code2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Code2" class="<?php echo $ivf_et_chart->Code2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_et_chart->SortUrl($ivf_et_chart->Code2) ?>',1);"><div id="elh_ivf_et_chart_Code2" class="ivf_et_chart_Code2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart->Code2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart->Code2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_et_chart->Code2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->CellStage1->Visible) { // CellStage1 ?>
	<?php if ($ivf_et_chart->sortUrl($ivf_et_chart->CellStage1) == "") { ?>
		<th data-name="CellStage1" class="<?php echo $ivf_et_chart->CellStage1->headerCellClass() ?>"><div id="elh_ivf_et_chart_CellStage1" class="ivf_et_chart_CellStage1"><div class="ew-table-header-caption"><?php echo $ivf_et_chart->CellStage1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CellStage1" class="<?php echo $ivf_et_chart->CellStage1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_et_chart->SortUrl($ivf_et_chart->CellStage1) ?>',1);"><div id="elh_ivf_et_chart_CellStage1" class="ivf_et_chart_CellStage1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart->CellStage1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart->CellStage1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_et_chart->CellStage1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->CellStage2->Visible) { // CellStage2 ?>
	<?php if ($ivf_et_chart->sortUrl($ivf_et_chart->CellStage2) == "") { ?>
		<th data-name="CellStage2" class="<?php echo $ivf_et_chart->CellStage2->headerCellClass() ?>"><div id="elh_ivf_et_chart_CellStage2" class="ivf_et_chart_CellStage2"><div class="ew-table-header-caption"><?php echo $ivf_et_chart->CellStage2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CellStage2" class="<?php echo $ivf_et_chart->CellStage2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_et_chart->SortUrl($ivf_et_chart->CellStage2) ?>',1);"><div id="elh_ivf_et_chart_CellStage2" class="ivf_et_chart_CellStage2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart->CellStage2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart->CellStage2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_et_chart->CellStage2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->Grade1->Visible) { // Grade1 ?>
	<?php if ($ivf_et_chart->sortUrl($ivf_et_chart->Grade1) == "") { ?>
		<th data-name="Grade1" class="<?php echo $ivf_et_chart->Grade1->headerCellClass() ?>"><div id="elh_ivf_et_chart_Grade1" class="ivf_et_chart_Grade1"><div class="ew-table-header-caption"><?php echo $ivf_et_chart->Grade1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Grade1" class="<?php echo $ivf_et_chart->Grade1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_et_chart->SortUrl($ivf_et_chart->Grade1) ?>',1);"><div id="elh_ivf_et_chart_Grade1" class="ivf_et_chart_Grade1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart->Grade1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart->Grade1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_et_chart->Grade1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->Grade2->Visible) { // Grade2 ?>
	<?php if ($ivf_et_chart->sortUrl($ivf_et_chart->Grade2) == "") { ?>
		<th data-name="Grade2" class="<?php echo $ivf_et_chart->Grade2->headerCellClass() ?>"><div id="elh_ivf_et_chart_Grade2" class="ivf_et_chart_Grade2"><div class="ew-table-header-caption"><?php echo $ivf_et_chart->Grade2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Grade2" class="<?php echo $ivf_et_chart->Grade2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_et_chart->SortUrl($ivf_et_chart->Grade2) ?>',1);"><div id="elh_ivf_et_chart_Grade2" class="ivf_et_chart_Grade2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart->Grade2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart->Grade2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_et_chart->Grade2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->PregnancyTestingWithSerumBetaHcG->Visible) { // PregnancyTestingWithSerumBetaHcG ?>
	<?php if ($ivf_et_chart->sortUrl($ivf_et_chart->PregnancyTestingWithSerumBetaHcG) == "") { ?>
		<th data-name="PregnancyTestingWithSerumBetaHcG" class="<?php echo $ivf_et_chart->PregnancyTestingWithSerumBetaHcG->headerCellClass() ?>"><div id="elh_ivf_et_chart_PregnancyTestingWithSerumBetaHcG" class="ivf_et_chart_PregnancyTestingWithSerumBetaHcG"><div class="ew-table-header-caption"><?php echo $ivf_et_chart->PregnancyTestingWithSerumBetaHcG->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PregnancyTestingWithSerumBetaHcG" class="<?php echo $ivf_et_chart->PregnancyTestingWithSerumBetaHcG->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_et_chart->SortUrl($ivf_et_chart->PregnancyTestingWithSerumBetaHcG) ?>',1);"><div id="elh_ivf_et_chart_PregnancyTestingWithSerumBetaHcG" class="ivf_et_chart_PregnancyTestingWithSerumBetaHcG">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart->PregnancyTestingWithSerumBetaHcG->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart->PregnancyTestingWithSerumBetaHcG->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_et_chart->PregnancyTestingWithSerumBetaHcG->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->ReviewDate->Visible) { // ReviewDate ?>
	<?php if ($ivf_et_chart->sortUrl($ivf_et_chart->ReviewDate) == "") { ?>
		<th data-name="ReviewDate" class="<?php echo $ivf_et_chart->ReviewDate->headerCellClass() ?>"><div id="elh_ivf_et_chart_ReviewDate" class="ivf_et_chart_ReviewDate"><div class="ew-table-header-caption"><?php echo $ivf_et_chart->ReviewDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReviewDate" class="<?php echo $ivf_et_chart->ReviewDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_et_chart->SortUrl($ivf_et_chart->ReviewDate) ?>',1);"><div id="elh_ivf_et_chart_ReviewDate" class="ivf_et_chart_ReviewDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart->ReviewDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart->ReviewDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_et_chart->ReviewDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->ReviewDoctor->Visible) { // ReviewDoctor ?>
	<?php if ($ivf_et_chart->sortUrl($ivf_et_chart->ReviewDoctor) == "") { ?>
		<th data-name="ReviewDoctor" class="<?php echo $ivf_et_chart->ReviewDoctor->headerCellClass() ?>"><div id="elh_ivf_et_chart_ReviewDoctor" class="ivf_et_chart_ReviewDoctor"><div class="ew-table-header-caption"><?php echo $ivf_et_chart->ReviewDoctor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReviewDoctor" class="<?php echo $ivf_et_chart->ReviewDoctor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_et_chart->SortUrl($ivf_et_chart->ReviewDoctor) ?>',1);"><div id="elh_ivf_et_chart_ReviewDoctor" class="ivf_et_chart_ReviewDoctor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart->ReviewDoctor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart->ReviewDoctor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_et_chart->ReviewDoctor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart->TidNo->Visible) { // TidNo ?>
	<?php if ($ivf_et_chart->sortUrl($ivf_et_chart->TidNo) == "") { ?>
		<th data-name="TidNo" class="<?php echo $ivf_et_chart->TidNo->headerCellClass() ?>"><div id="elh_ivf_et_chart_TidNo" class="ivf_et_chart_TidNo"><div class="ew-table-header-caption"><?php echo $ivf_et_chart->TidNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TidNo" class="<?php echo $ivf_et_chart->TidNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_et_chart->SortUrl($ivf_et_chart->TidNo) ?>',1);"><div id="elh_ivf_et_chart_TidNo" class="ivf_et_chart_TidNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart->TidNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart->TidNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_et_chart->TidNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$ivf_et_chart_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($ivf_et_chart->ExportAll && $ivf_et_chart->isExport()) {
	$ivf_et_chart_list->StopRec = $ivf_et_chart_list->TotalRecs;
} else {

	// Set the last record to display
	if ($ivf_et_chart_list->TotalRecs > $ivf_et_chart_list->StartRec + $ivf_et_chart_list->DisplayRecs - 1)
		$ivf_et_chart_list->StopRec = $ivf_et_chart_list->StartRec + $ivf_et_chart_list->DisplayRecs - 1;
	else
		$ivf_et_chart_list->StopRec = $ivf_et_chart_list->TotalRecs;
}
$ivf_et_chart_list->RecCnt = $ivf_et_chart_list->StartRec - 1;
if ($ivf_et_chart_list->Recordset && !$ivf_et_chart_list->Recordset->EOF) {
	$ivf_et_chart_list->Recordset->moveFirst();
	$selectLimit = $ivf_et_chart_list->UseSelectLimit;
	if (!$selectLimit && $ivf_et_chart_list->StartRec > 1)
		$ivf_et_chart_list->Recordset->move($ivf_et_chart_list->StartRec - 1);
} elseif (!$ivf_et_chart->AllowAddDeleteRow && $ivf_et_chart_list->StopRec == 0) {
	$ivf_et_chart_list->StopRec = $ivf_et_chart->GridAddRowCount;
}

// Initialize aggregate
$ivf_et_chart->RowType = ROWTYPE_AGGREGATEINIT;
$ivf_et_chart->resetAttributes();
$ivf_et_chart_list->renderRow();
while ($ivf_et_chart_list->RecCnt < $ivf_et_chart_list->StopRec) {
	$ivf_et_chart_list->RecCnt++;
	if ($ivf_et_chart_list->RecCnt >= $ivf_et_chart_list->StartRec) {
		$ivf_et_chart_list->RowCnt++;

		// Set up key count
		$ivf_et_chart_list->KeyCount = $ivf_et_chart_list->RowIndex;

		// Init row class and style
		$ivf_et_chart->resetAttributes();
		$ivf_et_chart->CssClass = "";
		if ($ivf_et_chart->isGridAdd()) {
		} else {
			$ivf_et_chart_list->loadRowValues($ivf_et_chart_list->Recordset); // Load row values
		}
		$ivf_et_chart->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$ivf_et_chart->RowAttrs = array_merge($ivf_et_chart->RowAttrs, array('data-rowindex'=>$ivf_et_chart_list->RowCnt, 'id'=>'r' . $ivf_et_chart_list->RowCnt . '_ivf_et_chart', 'data-rowtype'=>$ivf_et_chart->RowType));

		// Render row
		$ivf_et_chart_list->renderRow();

		// Render list options
		$ivf_et_chart_list->renderListOptions();
?>
	<tr<?php echo $ivf_et_chart->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_et_chart_list->ListOptions->render("body", "left", $ivf_et_chart_list->RowCnt);
?>
	<?php if ($ivf_et_chart->id->Visible) { // id ?>
		<td data-name="id"<?php echo $ivf_et_chart->id->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_list->RowCnt ?>_ivf_et_chart_id" class="ivf_et_chart_id">
<span<?php echo $ivf_et_chart->id->viewAttributes() ?>>
<?php echo $ivf_et_chart->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->RIDNo->Visible) { // RIDNo ?>
		<td data-name="RIDNo"<?php echo $ivf_et_chart->RIDNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_list->RowCnt ?>_ivf_et_chart_RIDNo" class="ivf_et_chart_RIDNo">
<span<?php echo $ivf_et_chart->RIDNo->viewAttributes() ?>>
<?php echo $ivf_et_chart->RIDNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->Name->Visible) { // Name ?>
		<td data-name="Name"<?php echo $ivf_et_chart->Name->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_list->RowCnt ?>_ivf_et_chart_Name" class="ivf_et_chart_Name">
<span<?php echo $ivf_et_chart->Name->viewAttributes() ?>>
<?php echo $ivf_et_chart->Name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->ARTCycle->Visible) { // ARTCycle ?>
		<td data-name="ARTCycle"<?php echo $ivf_et_chart->ARTCycle->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_list->RowCnt ?>_ivf_et_chart_ARTCycle" class="ivf_et_chart_ARTCycle">
<span<?php echo $ivf_et_chart->ARTCycle->viewAttributes() ?>>
<?php echo $ivf_et_chart->ARTCycle->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->Consultant->Visible) { // Consultant ?>
		<td data-name="Consultant"<?php echo $ivf_et_chart->Consultant->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_list->RowCnt ?>_ivf_et_chart_Consultant" class="ivf_et_chart_Consultant">
<span<?php echo $ivf_et_chart->Consultant->viewAttributes() ?>>
<?php echo $ivf_et_chart->Consultant->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
		<td data-name="InseminatinTechnique"<?php echo $ivf_et_chart->InseminatinTechnique->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_list->RowCnt ?>_ivf_et_chart_InseminatinTechnique" class="ivf_et_chart_InseminatinTechnique">
<span<?php echo $ivf_et_chart->InseminatinTechnique->viewAttributes() ?>>
<?php echo $ivf_et_chart->InseminatinTechnique->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->IndicationForART->Visible) { // IndicationForART ?>
		<td data-name="IndicationForART"<?php echo $ivf_et_chart->IndicationForART->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_list->RowCnt ?>_ivf_et_chart_IndicationForART" class="ivf_et_chart_IndicationForART">
<span<?php echo $ivf_et_chart->IndicationForART->viewAttributes() ?>>
<?php echo $ivf_et_chart->IndicationForART->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->PreTreatment->Visible) { // PreTreatment ?>
		<td data-name="PreTreatment"<?php echo $ivf_et_chart->PreTreatment->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_list->RowCnt ?>_ivf_et_chart_PreTreatment" class="ivf_et_chart_PreTreatment">
<span<?php echo $ivf_et_chart->PreTreatment->viewAttributes() ?>>
<?php echo $ivf_et_chart->PreTreatment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->Hysteroscopy->Visible) { // Hysteroscopy ?>
		<td data-name="Hysteroscopy"<?php echo $ivf_et_chart->Hysteroscopy->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_list->RowCnt ?>_ivf_et_chart_Hysteroscopy" class="ivf_et_chart_Hysteroscopy">
<span<?php echo $ivf_et_chart->Hysteroscopy->viewAttributes() ?>>
<?php echo $ivf_et_chart->Hysteroscopy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->EndometrialScratching->Visible) { // EndometrialScratching ?>
		<td data-name="EndometrialScratching"<?php echo $ivf_et_chart->EndometrialScratching->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_list->RowCnt ?>_ivf_et_chart_EndometrialScratching" class="ivf_et_chart_EndometrialScratching">
<span<?php echo $ivf_et_chart->EndometrialScratching->viewAttributes() ?>>
<?php echo $ivf_et_chart->EndometrialScratching->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->TrialCannulation->Visible) { // TrialCannulation ?>
		<td data-name="TrialCannulation"<?php echo $ivf_et_chart->TrialCannulation->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_list->RowCnt ?>_ivf_et_chart_TrialCannulation" class="ivf_et_chart_TrialCannulation">
<span<?php echo $ivf_et_chart->TrialCannulation->viewAttributes() ?>>
<?php echo $ivf_et_chart->TrialCannulation->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->CYCLETYPE->Visible) { // CYCLETYPE ?>
		<td data-name="CYCLETYPE"<?php echo $ivf_et_chart->CYCLETYPE->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_list->RowCnt ?>_ivf_et_chart_CYCLETYPE" class="ivf_et_chart_CYCLETYPE">
<span<?php echo $ivf_et_chart->CYCLETYPE->viewAttributes() ?>>
<?php echo $ivf_et_chart->CYCLETYPE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->HRTCYCLE->Visible) { // HRTCYCLE ?>
		<td data-name="HRTCYCLE"<?php echo $ivf_et_chart->HRTCYCLE->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_list->RowCnt ?>_ivf_et_chart_HRTCYCLE" class="ivf_et_chart_HRTCYCLE">
<span<?php echo $ivf_et_chart->HRTCYCLE->viewAttributes() ?>>
<?php echo $ivf_et_chart->HRTCYCLE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->OralEstrogenDosage->Visible) { // OralEstrogenDosage ?>
		<td data-name="OralEstrogenDosage"<?php echo $ivf_et_chart->OralEstrogenDosage->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_list->RowCnt ?>_ivf_et_chart_OralEstrogenDosage" class="ivf_et_chart_OralEstrogenDosage">
<span<?php echo $ivf_et_chart->OralEstrogenDosage->viewAttributes() ?>>
<?php echo $ivf_et_chart->OralEstrogenDosage->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->VaginalEstrogen->Visible) { // VaginalEstrogen ?>
		<td data-name="VaginalEstrogen"<?php echo $ivf_et_chart->VaginalEstrogen->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_list->RowCnt ?>_ivf_et_chart_VaginalEstrogen" class="ivf_et_chart_VaginalEstrogen">
<span<?php echo $ivf_et_chart->VaginalEstrogen->viewAttributes() ?>>
<?php echo $ivf_et_chart->VaginalEstrogen->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->GCSF->Visible) { // GCSF ?>
		<td data-name="GCSF"<?php echo $ivf_et_chart->GCSF->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_list->RowCnt ?>_ivf_et_chart_GCSF" class="ivf_et_chart_GCSF">
<span<?php echo $ivf_et_chart->GCSF->viewAttributes() ?>>
<?php echo $ivf_et_chart->GCSF->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->ActivatedPRP->Visible) { // ActivatedPRP ?>
		<td data-name="ActivatedPRP"<?php echo $ivf_et_chart->ActivatedPRP->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_list->RowCnt ?>_ivf_et_chart_ActivatedPRP" class="ivf_et_chart_ActivatedPRP">
<span<?php echo $ivf_et_chart->ActivatedPRP->viewAttributes() ?>>
<?php echo $ivf_et_chart->ActivatedPRP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->ERA->Visible) { // ERA ?>
		<td data-name="ERA"<?php echo $ivf_et_chart->ERA->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_list->RowCnt ?>_ivf_et_chart_ERA" class="ivf_et_chart_ERA">
<span<?php echo $ivf_et_chart->ERA->viewAttributes() ?>>
<?php echo $ivf_et_chart->ERA->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->UCLcm->Visible) { // UCLcm ?>
		<td data-name="UCLcm"<?php echo $ivf_et_chart->UCLcm->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_list->RowCnt ?>_ivf_et_chart_UCLcm" class="ivf_et_chart_UCLcm">
<span<?php echo $ivf_et_chart->UCLcm->viewAttributes() ?>>
<?php echo $ivf_et_chart->UCLcm->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->DATEOFSTART->Visible) { // DATEOFSTART ?>
		<td data-name="DATEOFSTART"<?php echo $ivf_et_chart->DATEOFSTART->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_list->RowCnt ?>_ivf_et_chart_DATEOFSTART" class="ivf_et_chart_DATEOFSTART">
<span<?php echo $ivf_et_chart->DATEOFSTART->viewAttributes() ?>>
<?php echo $ivf_et_chart->DATEOFSTART->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->DATEOFEMBRYOTRANSFER->Visible) { // DATEOFEMBRYOTRANSFER ?>
		<td data-name="DATEOFEMBRYOTRANSFER"<?php echo $ivf_et_chart->DATEOFEMBRYOTRANSFER->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_list->RowCnt ?>_ivf_et_chart_DATEOFEMBRYOTRANSFER" class="ivf_et_chart_DATEOFEMBRYOTRANSFER">
<span<?php echo $ivf_et_chart->DATEOFEMBRYOTRANSFER->viewAttributes() ?>>
<?php echo $ivf_et_chart->DATEOFEMBRYOTRANSFER->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->DAYOFEMBRYOTRANSFER->Visible) { // DAYOFEMBRYOTRANSFER ?>
		<td data-name="DAYOFEMBRYOTRANSFER"<?php echo $ivf_et_chart->DAYOFEMBRYOTRANSFER->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_list->RowCnt ?>_ivf_et_chart_DAYOFEMBRYOTRANSFER" class="ivf_et_chart_DAYOFEMBRYOTRANSFER">
<span<?php echo $ivf_et_chart->DAYOFEMBRYOTRANSFER->viewAttributes() ?>>
<?php echo $ivf_et_chart->DAYOFEMBRYOTRANSFER->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->NOOFEMBRYOSTHAWED->Visible) { // NOOFEMBRYOSTHAWED ?>
		<td data-name="NOOFEMBRYOSTHAWED"<?php echo $ivf_et_chart->NOOFEMBRYOSTHAWED->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_list->RowCnt ?>_ivf_et_chart_NOOFEMBRYOSTHAWED" class="ivf_et_chart_NOOFEMBRYOSTHAWED">
<span<?php echo $ivf_et_chart->NOOFEMBRYOSTHAWED->viewAttributes() ?>>
<?php echo $ivf_et_chart->NOOFEMBRYOSTHAWED->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->NOOFEMBRYOSTRANSFERRED->Visible) { // NOOFEMBRYOSTRANSFERRED ?>
		<td data-name="NOOFEMBRYOSTRANSFERRED"<?php echo $ivf_et_chart->NOOFEMBRYOSTRANSFERRED->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_list->RowCnt ?>_ivf_et_chart_NOOFEMBRYOSTRANSFERRED" class="ivf_et_chart_NOOFEMBRYOSTRANSFERRED">
<span<?php echo $ivf_et_chart->NOOFEMBRYOSTRANSFERRED->viewAttributes() ?>>
<?php echo $ivf_et_chart->NOOFEMBRYOSTRANSFERRED->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->DAYOFEMBRYOS->Visible) { // DAYOFEMBRYOS ?>
		<td data-name="DAYOFEMBRYOS"<?php echo $ivf_et_chart->DAYOFEMBRYOS->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_list->RowCnt ?>_ivf_et_chart_DAYOFEMBRYOS" class="ivf_et_chart_DAYOFEMBRYOS">
<span<?php echo $ivf_et_chart->DAYOFEMBRYOS->viewAttributes() ?>>
<?php echo $ivf_et_chart->DAYOFEMBRYOS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->CRYOPRESERVEDEMBRYOS->Visible) { // CRYOPRESERVEDEMBRYOS ?>
		<td data-name="CRYOPRESERVEDEMBRYOS"<?php echo $ivf_et_chart->CRYOPRESERVEDEMBRYOS->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_list->RowCnt ?>_ivf_et_chart_CRYOPRESERVEDEMBRYOS" class="ivf_et_chart_CRYOPRESERVEDEMBRYOS">
<span<?php echo $ivf_et_chart->CRYOPRESERVEDEMBRYOS->viewAttributes() ?>>
<?php echo $ivf_et_chart->CRYOPRESERVEDEMBRYOS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->Code1->Visible) { // Code1 ?>
		<td data-name="Code1"<?php echo $ivf_et_chart->Code1->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_list->RowCnt ?>_ivf_et_chart_Code1" class="ivf_et_chart_Code1">
<span<?php echo $ivf_et_chart->Code1->viewAttributes() ?>>
<?php echo $ivf_et_chart->Code1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->Code2->Visible) { // Code2 ?>
		<td data-name="Code2"<?php echo $ivf_et_chart->Code2->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_list->RowCnt ?>_ivf_et_chart_Code2" class="ivf_et_chart_Code2">
<span<?php echo $ivf_et_chart->Code2->viewAttributes() ?>>
<?php echo $ivf_et_chart->Code2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->CellStage1->Visible) { // CellStage1 ?>
		<td data-name="CellStage1"<?php echo $ivf_et_chart->CellStage1->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_list->RowCnt ?>_ivf_et_chart_CellStage1" class="ivf_et_chart_CellStage1">
<span<?php echo $ivf_et_chart->CellStage1->viewAttributes() ?>>
<?php echo $ivf_et_chart->CellStage1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->CellStage2->Visible) { // CellStage2 ?>
		<td data-name="CellStage2"<?php echo $ivf_et_chart->CellStage2->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_list->RowCnt ?>_ivf_et_chart_CellStage2" class="ivf_et_chart_CellStage2">
<span<?php echo $ivf_et_chart->CellStage2->viewAttributes() ?>>
<?php echo $ivf_et_chart->CellStage2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->Grade1->Visible) { // Grade1 ?>
		<td data-name="Grade1"<?php echo $ivf_et_chart->Grade1->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_list->RowCnt ?>_ivf_et_chart_Grade1" class="ivf_et_chart_Grade1">
<span<?php echo $ivf_et_chart->Grade1->viewAttributes() ?>>
<?php echo $ivf_et_chart->Grade1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->Grade2->Visible) { // Grade2 ?>
		<td data-name="Grade2"<?php echo $ivf_et_chart->Grade2->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_list->RowCnt ?>_ivf_et_chart_Grade2" class="ivf_et_chart_Grade2">
<span<?php echo $ivf_et_chart->Grade2->viewAttributes() ?>>
<?php echo $ivf_et_chart->Grade2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->PregnancyTestingWithSerumBetaHcG->Visible) { // PregnancyTestingWithSerumBetaHcG ?>
		<td data-name="PregnancyTestingWithSerumBetaHcG"<?php echo $ivf_et_chart->PregnancyTestingWithSerumBetaHcG->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_list->RowCnt ?>_ivf_et_chart_PregnancyTestingWithSerumBetaHcG" class="ivf_et_chart_PregnancyTestingWithSerumBetaHcG">
<span<?php echo $ivf_et_chart->PregnancyTestingWithSerumBetaHcG->viewAttributes() ?>>
<?php echo $ivf_et_chart->PregnancyTestingWithSerumBetaHcG->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->ReviewDate->Visible) { // ReviewDate ?>
		<td data-name="ReviewDate"<?php echo $ivf_et_chart->ReviewDate->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_list->RowCnt ?>_ivf_et_chart_ReviewDate" class="ivf_et_chart_ReviewDate">
<span<?php echo $ivf_et_chart->ReviewDate->viewAttributes() ?>>
<?php echo $ivf_et_chart->ReviewDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->ReviewDoctor->Visible) { // ReviewDoctor ?>
		<td data-name="ReviewDoctor"<?php echo $ivf_et_chart->ReviewDoctor->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_list->RowCnt ?>_ivf_et_chart_ReviewDoctor" class="ivf_et_chart_ReviewDoctor">
<span<?php echo $ivf_et_chart->ReviewDoctor->viewAttributes() ?>>
<?php echo $ivf_et_chart->ReviewDoctor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo"<?php echo $ivf_et_chart->TidNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_list->RowCnt ?>_ivf_et_chart_TidNo" class="ivf_et_chart_TidNo">
<span<?php echo $ivf_et_chart->TidNo->viewAttributes() ?>>
<?php echo $ivf_et_chart->TidNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_et_chart_list->ListOptions->render("body", "right", $ivf_et_chart_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$ivf_et_chart->isGridAdd())
		$ivf_et_chart_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$ivf_et_chart->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($ivf_et_chart_list->Recordset)
	$ivf_et_chart_list->Recordset->Close();
?>
<?php if (!$ivf_et_chart->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$ivf_et_chart->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($ivf_et_chart_list->Pager)) $ivf_et_chart_list->Pager = new NumericPager($ivf_et_chart_list->StartRec, $ivf_et_chart_list->DisplayRecs, $ivf_et_chart_list->TotalRecs, $ivf_et_chart_list->RecRange, $ivf_et_chart_list->AutoHidePager) ?>
<?php if ($ivf_et_chart_list->Pager->RecordCount > 0 && $ivf_et_chart_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($ivf_et_chart_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_et_chart_list->pageUrl() ?>start=<?php echo $ivf_et_chart_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($ivf_et_chart_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_et_chart_list->pageUrl() ?>start=<?php echo $ivf_et_chart_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($ivf_et_chart_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $ivf_et_chart_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($ivf_et_chart_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_et_chart_list->pageUrl() ?>start=<?php echo $ivf_et_chart_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($ivf_et_chart_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_et_chart_list->pageUrl() ?>start=<?php echo $ivf_et_chart_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($ivf_et_chart_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $ivf_et_chart_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $ivf_et_chart_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $ivf_et_chart_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($ivf_et_chart_list->TotalRecs > 0 && (!$ivf_et_chart_list->AutoHidePageSizeSelector || $ivf_et_chart_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="ivf_et_chart">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($ivf_et_chart_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($ivf_et_chart_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($ivf_et_chart_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($ivf_et_chart_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($ivf_et_chart_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($ivf_et_chart_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($ivf_et_chart->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ivf_et_chart_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($ivf_et_chart_list->TotalRecs == 0 && !$ivf_et_chart->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $ivf_et_chart_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$ivf_et_chart_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$ivf_et_chart->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$ivf_et_chart->isExport()) { ?>
<script>
ew.scrollableTable("gmp_ivf_et_chart", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$ivf_et_chart_list->terminate();
?>