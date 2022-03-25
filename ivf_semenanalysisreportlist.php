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
$ivf_semenanalysisreport_list = new ivf_semenanalysisreport_list();

// Run the page
$ivf_semenanalysisreport_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_semenanalysisreport_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$ivf_semenanalysisreport->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fivf_semenanalysisreportlist = currentForm = new ew.Form("fivf_semenanalysisreportlist", "list");
fivf_semenanalysisreportlist.formKeyCountName = '<?php echo $ivf_semenanalysisreport_list->FormKeyCountName ?>';

// Form_CustomValidate event
fivf_semenanalysisreportlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_semenanalysisreportlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fivf_semenanalysisreportlist.lists["x_RequestSample"] = <?php echo $ivf_semenanalysisreport_list->RequestSample->Lookup->toClientList() ?>;
fivf_semenanalysisreportlist.lists["x_RequestSample"].options = <?php echo JsonEncode($ivf_semenanalysisreport_list->RequestSample->options(FALSE, TRUE)) ?>;
fivf_semenanalysisreportlist.lists["x_CollectionType"] = <?php echo $ivf_semenanalysisreport_list->CollectionType->Lookup->toClientList() ?>;
fivf_semenanalysisreportlist.lists["x_CollectionType"].options = <?php echo JsonEncode($ivf_semenanalysisreport_list->CollectionType->options(FALSE, TRUE)) ?>;
fivf_semenanalysisreportlist.lists["x_CollectionMethod"] = <?php echo $ivf_semenanalysisreport_list->CollectionMethod->Lookup->toClientList() ?>;
fivf_semenanalysisreportlist.lists["x_CollectionMethod"].options = <?php echo JsonEncode($ivf_semenanalysisreport_list->CollectionMethod->options(FALSE, TRUE)) ?>;
fivf_semenanalysisreportlist.lists["x_Medicationused"] = <?php echo $ivf_semenanalysisreport_list->Medicationused->Lookup->toClientList() ?>;
fivf_semenanalysisreportlist.lists["x_Medicationused"].options = <?php echo JsonEncode($ivf_semenanalysisreport_list->Medicationused->options(FALSE, TRUE)) ?>;
fivf_semenanalysisreportlist.lists["x_DifficultiesinCollection"] = <?php echo $ivf_semenanalysisreport_list->DifficultiesinCollection->Lookup->toClientList() ?>;
fivf_semenanalysisreportlist.lists["x_DifficultiesinCollection"].options = <?php echo JsonEncode($ivf_semenanalysisreport_list->DifficultiesinCollection->options(FALSE, TRUE)) ?>;
fivf_semenanalysisreportlist.lists["x_Homogenosity"] = <?php echo $ivf_semenanalysisreport_list->Homogenosity->Lookup->toClientList() ?>;
fivf_semenanalysisreportlist.lists["x_Homogenosity"].options = <?php echo JsonEncode($ivf_semenanalysisreport_list->Homogenosity->options(FALSE, TRUE)) ?>;
fivf_semenanalysisreportlist.lists["x_CompleteSample"] = <?php echo $ivf_semenanalysisreport_list->CompleteSample->Lookup->toClientList() ?>;
fivf_semenanalysisreportlist.lists["x_CompleteSample"].options = <?php echo JsonEncode($ivf_semenanalysisreport_list->CompleteSample->options(FALSE, TRUE)) ?>;
fivf_semenanalysisreportlist.lists["x_SemenOrgin"] = <?php echo $ivf_semenanalysisreport_list->SemenOrgin->Lookup->toClientList() ?>;
fivf_semenanalysisreportlist.lists["x_SemenOrgin"].options = <?php echo JsonEncode($ivf_semenanalysisreport_list->SemenOrgin->options(FALSE, TRUE)) ?>;
fivf_semenanalysisreportlist.lists["x_Donor"] = <?php echo $ivf_semenanalysisreport_list->Donor->Lookup->toClientList() ?>;
fivf_semenanalysisreportlist.lists["x_Donor"].options = <?php echo JsonEncode($ivf_semenanalysisreport_list->Donor->lookupOptions()) ?>;
fivf_semenanalysisreportlist.lists["x_SPECIFIC_PROBLEMS"] = <?php echo $ivf_semenanalysisreport_list->SPECIFIC_PROBLEMS->Lookup->toClientList() ?>;
fivf_semenanalysisreportlist.lists["x_SPECIFIC_PROBLEMS"].options = <?php echo JsonEncode($ivf_semenanalysisreport_list->SPECIFIC_PROBLEMS->options(FALSE, TRUE)) ?>;
fivf_semenanalysisreportlist.lists["x_LIQUIFACTION_STORAGE"] = <?php echo $ivf_semenanalysisreport_list->LIQUIFACTION_STORAGE->Lookup->toClientList() ?>;
fivf_semenanalysisreportlist.lists["x_LIQUIFACTION_STORAGE"].options = <?php echo JsonEncode($ivf_semenanalysisreport_list->LIQUIFACTION_STORAGE->options(FALSE, TRUE)) ?>;
fivf_semenanalysisreportlist.lists["x_IUI_PREP_METHOD"] = <?php echo $ivf_semenanalysisreport_list->IUI_PREP_METHOD->Lookup->toClientList() ?>;
fivf_semenanalysisreportlist.lists["x_IUI_PREP_METHOD"].options = <?php echo JsonEncode($ivf_semenanalysisreport_list->IUI_PREP_METHOD->options(FALSE, TRUE)) ?>;
fivf_semenanalysisreportlist.lists["x_TIME_FROM_TRIGGER"] = <?php echo $ivf_semenanalysisreport_list->TIME_FROM_TRIGGER->Lookup->toClientList() ?>;
fivf_semenanalysisreportlist.lists["x_TIME_FROM_TRIGGER"].options = <?php echo JsonEncode($ivf_semenanalysisreport_list->TIME_FROM_TRIGGER->options(FALSE, TRUE)) ?>;
fivf_semenanalysisreportlist.lists["x_COLLECTION_TO_PREPARATION"] = <?php echo $ivf_semenanalysisreport_list->COLLECTION_TO_PREPARATION->Lookup->toClientList() ?>;
fivf_semenanalysisreportlist.lists["x_COLLECTION_TO_PREPARATION"].options = <?php echo JsonEncode($ivf_semenanalysisreport_list->COLLECTION_TO_PREPARATION->options(FALSE, TRUE)) ?>;

// Form object for search
var fivf_semenanalysisreportlistsrch = currentSearchForm = new ew.Form("fivf_semenanalysisreportlistsrch");

// Filters
fivf_semenanalysisreportlistsrch.filterList = <?php echo $ivf_semenanalysisreport_list->getFilterList() ?>;
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
<?php if (!$ivf_semenanalysisreport->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($ivf_semenanalysisreport_list->TotalRecs > 0 && $ivf_semenanalysisreport_list->ExportOptions->visible()) { ?>
<?php $ivf_semenanalysisreport_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->ImportOptions->visible()) { ?>
<?php $ivf_semenanalysisreport_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->SearchOptions->visible()) { ?>
<?php $ivf_semenanalysisreport_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->FilterOptions->visible()) { ?>
<?php $ivf_semenanalysisreport_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$ivf_semenanalysisreport->isExport() || EXPORT_MASTER_RECORD && $ivf_semenanalysisreport->isExport("print")) { ?>
<?php
if ($ivf_semenanalysisreport_list->DbMasterFilter <> "" && $ivf_semenanalysisreport->getCurrentMasterTable() == "view_ivf_treatment") {
	if ($ivf_semenanalysisreport_list->MasterRecordExists) {
		include_once "view_ivf_treatmentmaster.php";
	}
}
?>
<?php
if ($ivf_semenanalysisreport_list->DbMasterFilter <> "" && $ivf_semenanalysisreport->getCurrentMasterTable() == "ivf_treatment_plan") {
	if ($ivf_semenanalysisreport_list->MasterRecordExists) {
		include_once "ivf_treatment_planmaster.php";
	}
}
?>
<?php } ?>
<?php
$ivf_semenanalysisreport_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$ivf_semenanalysisreport->isExport() && !$ivf_semenanalysisreport->CurrentAction) { ?>
<form name="fivf_semenanalysisreportlistsrch" id="fivf_semenanalysisreportlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($ivf_semenanalysisreport_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fivf_semenanalysisreportlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="ivf_semenanalysisreport">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($ivf_semenanalysisreport_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($ivf_semenanalysisreport_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $ivf_semenanalysisreport_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($ivf_semenanalysisreport_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($ivf_semenanalysisreport_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($ivf_semenanalysisreport_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($ivf_semenanalysisreport_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $ivf_semenanalysisreport_list->showPageHeader(); ?>
<?php
$ivf_semenanalysisreport_list->showMessage();
?>
<?php if ($ivf_semenanalysisreport_list->TotalRecs > 0 || $ivf_semenanalysisreport->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($ivf_semenanalysisreport_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf_semenanalysisreport">
<?php if (!$ivf_semenanalysisreport->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$ivf_semenanalysisreport->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($ivf_semenanalysisreport_list->Pager)) $ivf_semenanalysisreport_list->Pager = new NumericPager($ivf_semenanalysisreport_list->StartRec, $ivf_semenanalysisreport_list->DisplayRecs, $ivf_semenanalysisreport_list->TotalRecs, $ivf_semenanalysisreport_list->RecRange, $ivf_semenanalysisreport_list->AutoHidePager) ?>
<?php if ($ivf_semenanalysisreport_list->Pager->RecordCount > 0 && $ivf_semenanalysisreport_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($ivf_semenanalysisreport_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_semenanalysisreport_list->pageUrl() ?>start=<?php echo $ivf_semenanalysisreport_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_semenanalysisreport_list->pageUrl() ?>start=<?php echo $ivf_semenanalysisreport_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($ivf_semenanalysisreport_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $ivf_semenanalysisreport_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_semenanalysisreport_list->pageUrl() ?>start=<?php echo $ivf_semenanalysisreport_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_semenanalysisreport_list->pageUrl() ?>start=<?php echo $ivf_semenanalysisreport_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $ivf_semenanalysisreport_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $ivf_semenanalysisreport_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $ivf_semenanalysisreport_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->TotalRecs > 0 && (!$ivf_semenanalysisreport_list->AutoHidePageSizeSelector || $ivf_semenanalysisreport_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="ivf_semenanalysisreport">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($ivf_semenanalysisreport_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($ivf_semenanalysisreport_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($ivf_semenanalysisreport_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($ivf_semenanalysisreport_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($ivf_semenanalysisreport_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($ivf_semenanalysisreport_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($ivf_semenanalysisreport->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ivf_semenanalysisreport_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fivf_semenanalysisreportlist" id="fivf_semenanalysisreportlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ivf_semenanalysisreport_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_semenanalysisreport_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_semenanalysisreport">
<?php if ($ivf_semenanalysisreport->getCurrentMasterTable() == "view_ivf_treatment" && $ivf_semenanalysisreport->CurrentAction) { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="view_ivf_treatment">
<input type="hidden" name="fk_id" value="<?php echo $ivf_semenanalysisreport->TidNo->getSessionValue() ?>">
<input type="hidden" name="fk_RIDNO" value="<?php echo $ivf_semenanalysisreport->RIDNo->getSessionValue() ?>">
<input type="hidden" name="fk_Name" value="<?php echo $ivf_semenanalysisreport->PatientName->getSessionValue() ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->getCurrentMasterTable() == "ivf_treatment_plan" && $ivf_semenanalysisreport->CurrentAction) { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="ivf_treatment_plan">
<input type="hidden" name="fk_RIDNO" value="<?php echo $ivf_semenanalysisreport->RIDNo->getSessionValue() ?>">
<input type="hidden" name="fk_Name" value="<?php echo $ivf_semenanalysisreport->PatientName->getSessionValue() ?>">
<input type="hidden" name="fk_id" value="<?php echo $ivf_semenanalysisreport->TidNo->getSessionValue() ?>">
<?php } ?>
<div id="gmp_ivf_semenanalysisreport" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($ivf_semenanalysisreport_list->TotalRecs > 0 || $ivf_semenanalysisreport->isGridEdit()) { ?>
<table id="tbl_ivf_semenanalysisreportlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$ivf_semenanalysisreport_list->RowType = ROWTYPE_HEADER;

// Render list options
$ivf_semenanalysisreport_list->renderListOptions();

// Render list options (header, left)
$ivf_semenanalysisreport_list->ListOptions->render("header", "left");
?>
<?php if ($ivf_semenanalysisreport->id->Visible) { // id ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->id) == "") { ?>
		<th data-name="id" class="<?php echo $ivf_semenanalysisreport->id->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_id" class="ivf_semenanalysisreport_id"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $ivf_semenanalysisreport->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->id) ?>',1);"><div id="elh_ivf_semenanalysisreport_id" class="ivf_semenanalysisreport_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RIDNo->Visible) { // RIDNo ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->RIDNo) == "") { ?>
		<th data-name="RIDNo" class="<?php echo $ivf_semenanalysisreport->RIDNo->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_RIDNo" class="ivf_semenanalysisreport_RIDNo"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->RIDNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RIDNo" class="<?php echo $ivf_semenanalysisreport->RIDNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->RIDNo) ?>',1);"><div id="elh_ivf_semenanalysisreport_RIDNo" class="ivf_semenanalysisreport_RIDNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->RIDNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->RIDNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->RIDNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->PatientName->Visible) { // PatientName ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $ivf_semenanalysisreport->PatientName->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_PatientName" class="ivf_semenanalysisreport_PatientName"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $ivf_semenanalysisreport->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->PatientName) ?>',1);"><div id="elh_ivf_semenanalysisreport_PatientName" class="ivf_semenanalysisreport_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->HusbandName->Visible) { // HusbandName ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->HusbandName) == "") { ?>
		<th data-name="HusbandName" class="<?php echo $ivf_semenanalysisreport->HusbandName->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_HusbandName" class="ivf_semenanalysisreport_HusbandName"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->HusbandName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HusbandName" class="<?php echo $ivf_semenanalysisreport->HusbandName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->HusbandName) ?>',1);"><div id="elh_ivf_semenanalysisreport_HusbandName" class="ivf_semenanalysisreport_HusbandName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->HusbandName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->HusbandName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->HusbandName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RequestDr->Visible) { // RequestDr ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->RequestDr) == "") { ?>
		<th data-name="RequestDr" class="<?php echo $ivf_semenanalysisreport->RequestDr->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_RequestDr" class="ivf_semenanalysisreport_RequestDr"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->RequestDr->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RequestDr" class="<?php echo $ivf_semenanalysisreport->RequestDr->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->RequestDr) ?>',1);"><div id="elh_ivf_semenanalysisreport_RequestDr" class="ivf_semenanalysisreport_RequestDr">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->RequestDr->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->RequestDr->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->RequestDr->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->CollectionDate->Visible) { // CollectionDate ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->CollectionDate) == "") { ?>
		<th data-name="CollectionDate" class="<?php echo $ivf_semenanalysisreport->CollectionDate->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_CollectionDate" class="ivf_semenanalysisreport_CollectionDate"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->CollectionDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CollectionDate" class="<?php echo $ivf_semenanalysisreport->CollectionDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->CollectionDate) ?>',1);"><div id="elh_ivf_semenanalysisreport_CollectionDate" class="ivf_semenanalysisreport_CollectionDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->CollectionDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->CollectionDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->CollectionDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->ResultDate->Visible) { // ResultDate ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->ResultDate) == "") { ?>
		<th data-name="ResultDate" class="<?php echo $ivf_semenanalysisreport->ResultDate->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_ResultDate" class="ivf_semenanalysisreport_ResultDate"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->ResultDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ResultDate" class="<?php echo $ivf_semenanalysisreport->ResultDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->ResultDate) ?>',1);"><div id="elh_ivf_semenanalysisreport_ResultDate" class="ivf_semenanalysisreport_ResultDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->ResultDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->ResultDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->ResultDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->RequestSample->Visible) { // RequestSample ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->RequestSample) == "") { ?>
		<th data-name="RequestSample" class="<?php echo $ivf_semenanalysisreport->RequestSample->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_RequestSample" class="ivf_semenanalysisreport_RequestSample"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->RequestSample->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RequestSample" class="<?php echo $ivf_semenanalysisreport->RequestSample->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->RequestSample) ?>',1);"><div id="elh_ivf_semenanalysisreport_RequestSample" class="ivf_semenanalysisreport_RequestSample">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->RequestSample->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->RequestSample->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->RequestSample->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->CollectionType->Visible) { // CollectionType ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->CollectionType) == "") { ?>
		<th data-name="CollectionType" class="<?php echo $ivf_semenanalysisreport->CollectionType->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_CollectionType" class="ivf_semenanalysisreport_CollectionType"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->CollectionType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CollectionType" class="<?php echo $ivf_semenanalysisreport->CollectionType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->CollectionType) ?>',1);"><div id="elh_ivf_semenanalysisreport_CollectionType" class="ivf_semenanalysisreport_CollectionType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->CollectionType->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->CollectionType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->CollectionType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->CollectionMethod->Visible) { // CollectionMethod ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->CollectionMethod) == "") { ?>
		<th data-name="CollectionMethod" class="<?php echo $ivf_semenanalysisreport->CollectionMethod->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_CollectionMethod" class="ivf_semenanalysisreport_CollectionMethod"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->CollectionMethod->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CollectionMethod" class="<?php echo $ivf_semenanalysisreport->CollectionMethod->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->CollectionMethod) ?>',1);"><div id="elh_ivf_semenanalysisreport_CollectionMethod" class="ivf_semenanalysisreport_CollectionMethod">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->CollectionMethod->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->CollectionMethod->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->CollectionMethod->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Medicationused->Visible) { // Medicationused ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Medicationused) == "") { ?>
		<th data-name="Medicationused" class="<?php echo $ivf_semenanalysisreport->Medicationused->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Medicationused" class="ivf_semenanalysisreport_Medicationused"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Medicationused->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Medicationused" class="<?php echo $ivf_semenanalysisreport->Medicationused->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Medicationused) ?>',1);"><div id="elh_ivf_semenanalysisreport_Medicationused" class="ivf_semenanalysisreport_Medicationused">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Medicationused->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Medicationused->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Medicationused->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->DifficultiesinCollection->Visible) { // DifficultiesinCollection ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->DifficultiesinCollection) == "") { ?>
		<th data-name="DifficultiesinCollection" class="<?php echo $ivf_semenanalysisreport->DifficultiesinCollection->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_DifficultiesinCollection" class="ivf_semenanalysisreport_DifficultiesinCollection"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->DifficultiesinCollection->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DifficultiesinCollection" class="<?php echo $ivf_semenanalysisreport->DifficultiesinCollection->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->DifficultiesinCollection) ?>',1);"><div id="elh_ivf_semenanalysisreport_DifficultiesinCollection" class="ivf_semenanalysisreport_DifficultiesinCollection">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->DifficultiesinCollection->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->DifficultiesinCollection->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->DifficultiesinCollection->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->pH->Visible) { // pH ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->pH) == "") { ?>
		<th data-name="pH" class="<?php echo $ivf_semenanalysisreport->pH->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_pH" class="ivf_semenanalysisreport_pH"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->pH->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pH" class="<?php echo $ivf_semenanalysisreport->pH->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->pH) ?>',1);"><div id="elh_ivf_semenanalysisreport_pH" class="ivf_semenanalysisreport_pH">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->pH->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->pH->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->pH->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Timeofcollection->Visible) { // Timeofcollection ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Timeofcollection) == "") { ?>
		<th data-name="Timeofcollection" class="<?php echo $ivf_semenanalysisreport->Timeofcollection->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Timeofcollection" class="ivf_semenanalysisreport_Timeofcollection"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Timeofcollection->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Timeofcollection" class="<?php echo $ivf_semenanalysisreport->Timeofcollection->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Timeofcollection) ?>',1);"><div id="elh_ivf_semenanalysisreport_Timeofcollection" class="ivf_semenanalysisreport_Timeofcollection">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Timeofcollection->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Timeofcollection->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Timeofcollection->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Timeofexamination->Visible) { // Timeofexamination ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Timeofexamination) == "") { ?>
		<th data-name="Timeofexamination" class="<?php echo $ivf_semenanalysisreport->Timeofexamination->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Timeofexamination" class="ivf_semenanalysisreport_Timeofexamination"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Timeofexamination->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Timeofexamination" class="<?php echo $ivf_semenanalysisreport->Timeofexamination->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Timeofexamination) ?>',1);"><div id="elh_ivf_semenanalysisreport_Timeofexamination" class="ivf_semenanalysisreport_Timeofexamination">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Timeofexamination->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Timeofexamination->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Timeofexamination->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Volume->Visible) { // Volume ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Volume) == "") { ?>
		<th data-name="Volume" class="<?php echo $ivf_semenanalysisreport->Volume->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Volume" class="ivf_semenanalysisreport_Volume"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Volume->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Volume" class="<?php echo $ivf_semenanalysisreport->Volume->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Volume) ?>',1);"><div id="elh_ivf_semenanalysisreport_Volume" class="ivf_semenanalysisreport_Volume">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Volume->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Volume->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Volume->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Concentration->Visible) { // Concentration ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Concentration) == "") { ?>
		<th data-name="Concentration" class="<?php echo $ivf_semenanalysisreport->Concentration->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Concentration" class="ivf_semenanalysisreport_Concentration"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Concentration->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Concentration" class="<?php echo $ivf_semenanalysisreport->Concentration->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Concentration) ?>',1);"><div id="elh_ivf_semenanalysisreport_Concentration" class="ivf_semenanalysisreport_Concentration">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Concentration->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Concentration->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Concentration->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Total->Visible) { // Total ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Total) == "") { ?>
		<th data-name="Total" class="<?php echo $ivf_semenanalysisreport->Total->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Total" class="ivf_semenanalysisreport_Total"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Total->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Total" class="<?php echo $ivf_semenanalysisreport->Total->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Total) ?>',1);"><div id="elh_ivf_semenanalysisreport_Total" class="ivf_semenanalysisreport_Total">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Total->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Total->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Total->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->ProgressiveMotility->Visible) { // ProgressiveMotility ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->ProgressiveMotility) == "") { ?>
		<th data-name="ProgressiveMotility" class="<?php echo $ivf_semenanalysisreport->ProgressiveMotility->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_ProgressiveMotility" class="ivf_semenanalysisreport_ProgressiveMotility"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->ProgressiveMotility->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProgressiveMotility" class="<?php echo $ivf_semenanalysisreport->ProgressiveMotility->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->ProgressiveMotility) ?>',1);"><div id="elh_ivf_semenanalysisreport_ProgressiveMotility" class="ivf_semenanalysisreport_ProgressiveMotility">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->ProgressiveMotility->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->ProgressiveMotility->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->ProgressiveMotility->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->NonProgrssiveMotile->Visible) { // NonProgrssiveMotile ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->NonProgrssiveMotile) == "") { ?>
		<th data-name="NonProgrssiveMotile" class="<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_NonProgrssiveMotile" class="ivf_semenanalysisreport_NonProgrssiveMotile"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->NonProgrssiveMotile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NonProgrssiveMotile" class="<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->NonProgrssiveMotile) ?>',1);"><div id="elh_ivf_semenanalysisreport_NonProgrssiveMotile" class="ivf_semenanalysisreport_NonProgrssiveMotile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->NonProgrssiveMotile->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->NonProgrssiveMotile->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->NonProgrssiveMotile->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Immotile->Visible) { // Immotile ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Immotile) == "") { ?>
		<th data-name="Immotile" class="<?php echo $ivf_semenanalysisreport->Immotile->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Immotile" class="ivf_semenanalysisreport_Immotile"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Immotile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Immotile" class="<?php echo $ivf_semenanalysisreport->Immotile->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Immotile) ?>',1);"><div id="elh_ivf_semenanalysisreport_Immotile" class="ivf_semenanalysisreport_Immotile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Immotile->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Immotile->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Immotile->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->TotalProgrssiveMotile->Visible) { // TotalProgrssiveMotile ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->TotalProgrssiveMotile) == "") { ?>
		<th data-name="TotalProgrssiveMotile" class="<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_TotalProgrssiveMotile" class="ivf_semenanalysisreport_TotalProgrssiveMotile"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TotalProgrssiveMotile" class="<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->TotalProgrssiveMotile) ?>',1);"><div id="elh_ivf_semenanalysisreport_TotalProgrssiveMotile" class="ivf_semenanalysisreport_TotalProgrssiveMotile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->TotalProgrssiveMotile->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->TotalProgrssiveMotile->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Appearance->Visible) { // Appearance ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Appearance) == "") { ?>
		<th data-name="Appearance" class="<?php echo $ivf_semenanalysisreport->Appearance->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Appearance" class="ivf_semenanalysisreport_Appearance"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Appearance->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Appearance" class="<?php echo $ivf_semenanalysisreport->Appearance->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Appearance) ?>',1);"><div id="elh_ivf_semenanalysisreport_Appearance" class="ivf_semenanalysisreport_Appearance">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Appearance->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Appearance->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Appearance->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Homogenosity->Visible) { // Homogenosity ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Homogenosity) == "") { ?>
		<th data-name="Homogenosity" class="<?php echo $ivf_semenanalysisreport->Homogenosity->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Homogenosity" class="ivf_semenanalysisreport_Homogenosity"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Homogenosity->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Homogenosity" class="<?php echo $ivf_semenanalysisreport->Homogenosity->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Homogenosity) ?>',1);"><div id="elh_ivf_semenanalysisreport_Homogenosity" class="ivf_semenanalysisreport_Homogenosity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Homogenosity->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Homogenosity->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Homogenosity->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->CompleteSample->Visible) { // CompleteSample ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->CompleteSample) == "") { ?>
		<th data-name="CompleteSample" class="<?php echo $ivf_semenanalysisreport->CompleteSample->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_CompleteSample" class="ivf_semenanalysisreport_CompleteSample"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->CompleteSample->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CompleteSample" class="<?php echo $ivf_semenanalysisreport->CompleteSample->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->CompleteSample) ?>',1);"><div id="elh_ivf_semenanalysisreport_CompleteSample" class="ivf_semenanalysisreport_CompleteSample">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->CompleteSample->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->CompleteSample->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->CompleteSample->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Liquefactiontime->Visible) { // Liquefactiontime ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Liquefactiontime) == "") { ?>
		<th data-name="Liquefactiontime" class="<?php echo $ivf_semenanalysisreport->Liquefactiontime->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Liquefactiontime" class="ivf_semenanalysisreport_Liquefactiontime"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Liquefactiontime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Liquefactiontime" class="<?php echo $ivf_semenanalysisreport->Liquefactiontime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Liquefactiontime) ?>',1);"><div id="elh_ivf_semenanalysisreport_Liquefactiontime" class="ivf_semenanalysisreport_Liquefactiontime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Liquefactiontime->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Liquefactiontime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Liquefactiontime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Normal->Visible) { // Normal ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Normal) == "") { ?>
		<th data-name="Normal" class="<?php echo $ivf_semenanalysisreport->Normal->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Normal" class="ivf_semenanalysisreport_Normal"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Normal->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Normal" class="<?php echo $ivf_semenanalysisreport->Normal->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Normal) ?>',1);"><div id="elh_ivf_semenanalysisreport_Normal" class="ivf_semenanalysisreport_Normal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Normal->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Normal->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Normal->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Abnormal->Visible) { // Abnormal ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Abnormal) == "") { ?>
		<th data-name="Abnormal" class="<?php echo $ivf_semenanalysisreport->Abnormal->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Abnormal" class="ivf_semenanalysisreport_Abnormal"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Abnormal->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Abnormal" class="<?php echo $ivf_semenanalysisreport->Abnormal->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Abnormal) ?>',1);"><div id="elh_ivf_semenanalysisreport_Abnormal" class="ivf_semenanalysisreport_Abnormal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Abnormal->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Abnormal->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Abnormal->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Headdefects->Visible) { // Headdefects ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Headdefects) == "") { ?>
		<th data-name="Headdefects" class="<?php echo $ivf_semenanalysisreport->Headdefects->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Headdefects" class="ivf_semenanalysisreport_Headdefects"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Headdefects->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Headdefects" class="<?php echo $ivf_semenanalysisreport->Headdefects->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Headdefects) ?>',1);"><div id="elh_ivf_semenanalysisreport_Headdefects" class="ivf_semenanalysisreport_Headdefects">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Headdefects->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Headdefects->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Headdefects->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->MidpieceDefects->Visible) { // MidpieceDefects ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->MidpieceDefects) == "") { ?>
		<th data-name="MidpieceDefects" class="<?php echo $ivf_semenanalysisreport->MidpieceDefects->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_MidpieceDefects" class="ivf_semenanalysisreport_MidpieceDefects"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->MidpieceDefects->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MidpieceDefects" class="<?php echo $ivf_semenanalysisreport->MidpieceDefects->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->MidpieceDefects) ?>',1);"><div id="elh_ivf_semenanalysisreport_MidpieceDefects" class="ivf_semenanalysisreport_MidpieceDefects">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->MidpieceDefects->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->MidpieceDefects->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->MidpieceDefects->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->TailDefects->Visible) { // TailDefects ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->TailDefects) == "") { ?>
		<th data-name="TailDefects" class="<?php echo $ivf_semenanalysisreport->TailDefects->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_TailDefects" class="ivf_semenanalysisreport_TailDefects"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->TailDefects->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TailDefects" class="<?php echo $ivf_semenanalysisreport->TailDefects->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->TailDefects) ?>',1);"><div id="elh_ivf_semenanalysisreport_TailDefects" class="ivf_semenanalysisreport_TailDefects">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->TailDefects->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->TailDefects->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->TailDefects->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->NormalProgMotile->Visible) { // NormalProgMotile ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->NormalProgMotile) == "") { ?>
		<th data-name="NormalProgMotile" class="<?php echo $ivf_semenanalysisreport->NormalProgMotile->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_NormalProgMotile" class="ivf_semenanalysisreport_NormalProgMotile"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->NormalProgMotile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NormalProgMotile" class="<?php echo $ivf_semenanalysisreport->NormalProgMotile->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->NormalProgMotile) ?>',1);"><div id="elh_ivf_semenanalysisreport_NormalProgMotile" class="ivf_semenanalysisreport_NormalProgMotile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->NormalProgMotile->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->NormalProgMotile->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->NormalProgMotile->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->ImmatureForms->Visible) { // ImmatureForms ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->ImmatureForms) == "") { ?>
		<th data-name="ImmatureForms" class="<?php echo $ivf_semenanalysisreport->ImmatureForms->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_ImmatureForms" class="ivf_semenanalysisreport_ImmatureForms"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->ImmatureForms->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ImmatureForms" class="<?php echo $ivf_semenanalysisreport->ImmatureForms->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->ImmatureForms) ?>',1);"><div id="elh_ivf_semenanalysisreport_ImmatureForms" class="ivf_semenanalysisreport_ImmatureForms">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->ImmatureForms->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->ImmatureForms->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->ImmatureForms->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Leucocytes->Visible) { // Leucocytes ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Leucocytes) == "") { ?>
		<th data-name="Leucocytes" class="<?php echo $ivf_semenanalysisreport->Leucocytes->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Leucocytes" class="ivf_semenanalysisreport_Leucocytes"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Leucocytes->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Leucocytes" class="<?php echo $ivf_semenanalysisreport->Leucocytes->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Leucocytes) ?>',1);"><div id="elh_ivf_semenanalysisreport_Leucocytes" class="ivf_semenanalysisreport_Leucocytes">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Leucocytes->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Leucocytes->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Leucocytes->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Agglutination->Visible) { // Agglutination ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Agglutination) == "") { ?>
		<th data-name="Agglutination" class="<?php echo $ivf_semenanalysisreport->Agglutination->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Agglutination" class="ivf_semenanalysisreport_Agglutination"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Agglutination->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Agglutination" class="<?php echo $ivf_semenanalysisreport->Agglutination->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Agglutination) ?>',1);"><div id="elh_ivf_semenanalysisreport_Agglutination" class="ivf_semenanalysisreport_Agglutination">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Agglutination->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Agglutination->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Agglutination->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Debris->Visible) { // Debris ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Debris) == "") { ?>
		<th data-name="Debris" class="<?php echo $ivf_semenanalysisreport->Debris->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Debris" class="ivf_semenanalysisreport_Debris"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Debris->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Debris" class="<?php echo $ivf_semenanalysisreport->Debris->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Debris) ?>',1);"><div id="elh_ivf_semenanalysisreport_Debris" class="ivf_semenanalysisreport_Debris">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Debris->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Debris->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Debris->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Diagnosis->Visible) { // Diagnosis ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Diagnosis) == "") { ?>
		<th data-name="Diagnosis" class="<?php echo $ivf_semenanalysisreport->Diagnosis->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Diagnosis" class="ivf_semenanalysisreport_Diagnosis"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Diagnosis->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Diagnosis" class="<?php echo $ivf_semenanalysisreport->Diagnosis->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Diagnosis) ?>',1);"><div id="elh_ivf_semenanalysisreport_Diagnosis" class="ivf_semenanalysisreport_Diagnosis">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Diagnosis->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Diagnosis->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Diagnosis->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Observations->Visible) { // Observations ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Observations) == "") { ?>
		<th data-name="Observations" class="<?php echo $ivf_semenanalysisreport->Observations->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Observations" class="ivf_semenanalysisreport_Observations"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Observations->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Observations" class="<?php echo $ivf_semenanalysisreport->Observations->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Observations) ?>',1);"><div id="elh_ivf_semenanalysisreport_Observations" class="ivf_semenanalysisreport_Observations">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Observations->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Observations->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Observations->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Signature->Visible) { // Signature ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Signature) == "") { ?>
		<th data-name="Signature" class="<?php echo $ivf_semenanalysisreport->Signature->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Signature" class="ivf_semenanalysisreport_Signature"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Signature->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Signature" class="<?php echo $ivf_semenanalysisreport->Signature->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Signature) ?>',1);"><div id="elh_ivf_semenanalysisreport_Signature" class="ivf_semenanalysisreport_Signature">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Signature->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Signature->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Signature->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->SemenOrgin->Visible) { // SemenOrgin ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->SemenOrgin) == "") { ?>
		<th data-name="SemenOrgin" class="<?php echo $ivf_semenanalysisreport->SemenOrgin->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_SemenOrgin" class="ivf_semenanalysisreport_SemenOrgin"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->SemenOrgin->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SemenOrgin" class="<?php echo $ivf_semenanalysisreport->SemenOrgin->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->SemenOrgin) ?>',1);"><div id="elh_ivf_semenanalysisreport_SemenOrgin" class="ivf_semenanalysisreport_SemenOrgin">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->SemenOrgin->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->SemenOrgin->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->SemenOrgin->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Donor->Visible) { // Donor ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Donor) == "") { ?>
		<th data-name="Donor" class="<?php echo $ivf_semenanalysisreport->Donor->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Donor" class="ivf_semenanalysisreport_Donor"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Donor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Donor" class="<?php echo $ivf_semenanalysisreport->Donor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Donor) ?>',1);"><div id="elh_ivf_semenanalysisreport_Donor" class="ivf_semenanalysisreport_Donor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Donor->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Donor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Donor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->DonorBloodgroup->Visible) { // DonorBloodgroup ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->DonorBloodgroup) == "") { ?>
		<th data-name="DonorBloodgroup" class="<?php echo $ivf_semenanalysisreport->DonorBloodgroup->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_DonorBloodgroup" class="ivf_semenanalysisreport_DonorBloodgroup"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->DonorBloodgroup->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DonorBloodgroup" class="<?php echo $ivf_semenanalysisreport->DonorBloodgroup->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->DonorBloodgroup) ?>',1);"><div id="elh_ivf_semenanalysisreport_DonorBloodgroup" class="ivf_semenanalysisreport_DonorBloodgroup">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->DonorBloodgroup->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->DonorBloodgroup->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->DonorBloodgroup->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Tank->Visible) { // Tank ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Tank) == "") { ?>
		<th data-name="Tank" class="<?php echo $ivf_semenanalysisreport->Tank->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Tank" class="ivf_semenanalysisreport_Tank"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Tank->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tank" class="<?php echo $ivf_semenanalysisreport->Tank->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Tank) ?>',1);"><div id="elh_ivf_semenanalysisreport_Tank" class="ivf_semenanalysisreport_Tank">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Tank->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Tank->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Tank->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Location->Visible) { // Location ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Location) == "") { ?>
		<th data-name="Location" class="<?php echo $ivf_semenanalysisreport->Location->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Location" class="ivf_semenanalysisreport_Location"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Location->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Location" class="<?php echo $ivf_semenanalysisreport->Location->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Location) ?>',1);"><div id="elh_ivf_semenanalysisreport_Location" class="ivf_semenanalysisreport_Location">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Location->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Location->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Location->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Volume1->Visible) { // Volume1 ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Volume1) == "") { ?>
		<th data-name="Volume1" class="<?php echo $ivf_semenanalysisreport->Volume1->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Volume1" class="ivf_semenanalysisreport_Volume1"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Volume1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Volume1" class="<?php echo $ivf_semenanalysisreport->Volume1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Volume1) ?>',1);"><div id="elh_ivf_semenanalysisreport_Volume1" class="ivf_semenanalysisreport_Volume1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Volume1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Volume1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Volume1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Concentration1->Visible) { // Concentration1 ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Concentration1) == "") { ?>
		<th data-name="Concentration1" class="<?php echo $ivf_semenanalysisreport->Concentration1->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Concentration1" class="ivf_semenanalysisreport_Concentration1"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Concentration1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Concentration1" class="<?php echo $ivf_semenanalysisreport->Concentration1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Concentration1) ?>',1);"><div id="elh_ivf_semenanalysisreport_Concentration1" class="ivf_semenanalysisreport_Concentration1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Concentration1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Concentration1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Concentration1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Total1->Visible) { // Total1 ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Total1) == "") { ?>
		<th data-name="Total1" class="<?php echo $ivf_semenanalysisreport->Total1->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Total1" class="ivf_semenanalysisreport_Total1"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Total1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Total1" class="<?php echo $ivf_semenanalysisreport->Total1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Total1) ?>',1);"><div id="elh_ivf_semenanalysisreport_Total1" class="ivf_semenanalysisreport_Total1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Total1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Total1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Total1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->ProgressiveMotility1->Visible) { // ProgressiveMotility1 ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->ProgressiveMotility1) == "") { ?>
		<th data-name="ProgressiveMotility1" class="<?php echo $ivf_semenanalysisreport->ProgressiveMotility1->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_ProgressiveMotility1" class="ivf_semenanalysisreport_ProgressiveMotility1"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->ProgressiveMotility1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProgressiveMotility1" class="<?php echo $ivf_semenanalysisreport->ProgressiveMotility1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->ProgressiveMotility1) ?>',1);"><div id="elh_ivf_semenanalysisreport_ProgressiveMotility1" class="ivf_semenanalysisreport_ProgressiveMotility1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->ProgressiveMotility1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->ProgressiveMotility1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->ProgressiveMotility1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->NonProgrssiveMotile1->Visible) { // NonProgrssiveMotile1 ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->NonProgrssiveMotile1) == "") { ?>
		<th data-name="NonProgrssiveMotile1" class="<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile1->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_NonProgrssiveMotile1" class="ivf_semenanalysisreport_NonProgrssiveMotile1"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->NonProgrssiveMotile1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NonProgrssiveMotile1" class="<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->NonProgrssiveMotile1) ?>',1);"><div id="elh_ivf_semenanalysisreport_NonProgrssiveMotile1" class="ivf_semenanalysisreport_NonProgrssiveMotile1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->NonProgrssiveMotile1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->NonProgrssiveMotile1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->NonProgrssiveMotile1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Immotile1->Visible) { // Immotile1 ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Immotile1) == "") { ?>
		<th data-name="Immotile1" class="<?php echo $ivf_semenanalysisreport->Immotile1->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Immotile1" class="ivf_semenanalysisreport_Immotile1"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Immotile1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Immotile1" class="<?php echo $ivf_semenanalysisreport->Immotile1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Immotile1) ?>',1);"><div id="elh_ivf_semenanalysisreport_Immotile1" class="ivf_semenanalysisreport_Immotile1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Immotile1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Immotile1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Immotile1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->TotalProgrssiveMotile1->Visible) { // TotalProgrssiveMotile1 ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->TotalProgrssiveMotile1) == "") { ?>
		<th data-name="TotalProgrssiveMotile1" class="<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile1->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_TotalProgrssiveMotile1" class="ivf_semenanalysisreport_TotalProgrssiveMotile1"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TotalProgrssiveMotile1" class="<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->TotalProgrssiveMotile1) ?>',1);"><div id="elh_ivf_semenanalysisreport_TotalProgrssiveMotile1" class="ivf_semenanalysisreport_TotalProgrssiveMotile1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->TotalProgrssiveMotile1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->TotalProgrssiveMotile1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->TidNo->Visible) { // TidNo ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->TidNo) == "") { ?>
		<th data-name="TidNo" class="<?php echo $ivf_semenanalysisreport->TidNo->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_TidNo" class="ivf_semenanalysisreport_TidNo"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->TidNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TidNo" class="<?php echo $ivf_semenanalysisreport->TidNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->TidNo) ?>',1);"><div id="elh_ivf_semenanalysisreport_TidNo" class="ivf_semenanalysisreport_TidNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->TidNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->TidNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->TidNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Color->Visible) { // Color ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Color) == "") { ?>
		<th data-name="Color" class="<?php echo $ivf_semenanalysisreport->Color->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Color" class="ivf_semenanalysisreport_Color"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Color->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Color" class="<?php echo $ivf_semenanalysisreport->Color->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Color) ?>',1);"><div id="elh_ivf_semenanalysisreport_Color" class="ivf_semenanalysisreport_Color">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Color->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Color->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Color->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->DoneBy->Visible) { // DoneBy ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->DoneBy) == "") { ?>
		<th data-name="DoneBy" class="<?php echo $ivf_semenanalysisreport->DoneBy->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_DoneBy" class="ivf_semenanalysisreport_DoneBy"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->DoneBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DoneBy" class="<?php echo $ivf_semenanalysisreport->DoneBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->DoneBy) ?>',1);"><div id="elh_ivf_semenanalysisreport_DoneBy" class="ivf_semenanalysisreport_DoneBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->DoneBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->DoneBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->DoneBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Method->Visible) { // Method ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Method) == "") { ?>
		<th data-name="Method" class="<?php echo $ivf_semenanalysisreport->Method->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Method" class="ivf_semenanalysisreport_Method"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Method->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Method" class="<?php echo $ivf_semenanalysisreport->Method->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Method) ?>',1);"><div id="elh_ivf_semenanalysisreport_Method" class="ivf_semenanalysisreport_Method">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Method->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Method->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Method->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Abstinence->Visible) { // Abstinence ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Abstinence) == "") { ?>
		<th data-name="Abstinence" class="<?php echo $ivf_semenanalysisreport->Abstinence->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Abstinence" class="ivf_semenanalysisreport_Abstinence"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Abstinence->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Abstinence" class="<?php echo $ivf_semenanalysisreport->Abstinence->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Abstinence) ?>',1);"><div id="elh_ivf_semenanalysisreport_Abstinence" class="ivf_semenanalysisreport_Abstinence">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Abstinence->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Abstinence->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Abstinence->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->ProcessedBy->Visible) { // ProcessedBy ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->ProcessedBy) == "") { ?>
		<th data-name="ProcessedBy" class="<?php echo $ivf_semenanalysisreport->ProcessedBy->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_ProcessedBy" class="ivf_semenanalysisreport_ProcessedBy"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->ProcessedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProcessedBy" class="<?php echo $ivf_semenanalysisreport->ProcessedBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->ProcessedBy) ?>',1);"><div id="elh_ivf_semenanalysisreport_ProcessedBy" class="ivf_semenanalysisreport_ProcessedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->ProcessedBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->ProcessedBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->ProcessedBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->InseminationTime->Visible) { // InseminationTime ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->InseminationTime) == "") { ?>
		<th data-name="InseminationTime" class="<?php echo $ivf_semenanalysisreport->InseminationTime->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_InseminationTime" class="ivf_semenanalysisreport_InseminationTime"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->InseminationTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="InseminationTime" class="<?php echo $ivf_semenanalysisreport->InseminationTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->InseminationTime) ?>',1);"><div id="elh_ivf_semenanalysisreport_InseminationTime" class="ivf_semenanalysisreport_InseminationTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->InseminationTime->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->InseminationTime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->InseminationTime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->InseminationBy->Visible) { // InseminationBy ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->InseminationBy) == "") { ?>
		<th data-name="InseminationBy" class="<?php echo $ivf_semenanalysisreport->InseminationBy->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_InseminationBy" class="ivf_semenanalysisreport_InseminationBy"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->InseminationBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="InseminationBy" class="<?php echo $ivf_semenanalysisreport->InseminationBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->InseminationBy) ?>',1);"><div id="elh_ivf_semenanalysisreport_InseminationBy" class="ivf_semenanalysisreport_InseminationBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->InseminationBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->InseminationBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->InseminationBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Big->Visible) { // Big ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Big) == "") { ?>
		<th data-name="Big" class="<?php echo $ivf_semenanalysisreport->Big->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Big" class="ivf_semenanalysisreport_Big"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Big->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Big" class="<?php echo $ivf_semenanalysisreport->Big->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Big) ?>',1);"><div id="elh_ivf_semenanalysisreport_Big" class="ivf_semenanalysisreport_Big">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Big->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Big->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Big->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Medium->Visible) { // Medium ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Medium) == "") { ?>
		<th data-name="Medium" class="<?php echo $ivf_semenanalysisreport->Medium->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Medium" class="ivf_semenanalysisreport_Medium"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Medium->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Medium" class="<?php echo $ivf_semenanalysisreport->Medium->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Medium) ?>',1);"><div id="elh_ivf_semenanalysisreport_Medium" class="ivf_semenanalysisreport_Medium">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Medium->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Medium->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Medium->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Small->Visible) { // Small ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Small) == "") { ?>
		<th data-name="Small" class="<?php echo $ivf_semenanalysisreport->Small->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Small" class="ivf_semenanalysisreport_Small"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Small->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Small" class="<?php echo $ivf_semenanalysisreport->Small->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Small) ?>',1);"><div id="elh_ivf_semenanalysisreport_Small" class="ivf_semenanalysisreport_Small">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Small->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Small->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Small->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->NoHalo->Visible) { // NoHalo ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->NoHalo) == "") { ?>
		<th data-name="NoHalo" class="<?php echo $ivf_semenanalysisreport->NoHalo->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_NoHalo" class="ivf_semenanalysisreport_NoHalo"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->NoHalo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoHalo" class="<?php echo $ivf_semenanalysisreport->NoHalo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->NoHalo) ?>',1);"><div id="elh_ivf_semenanalysisreport_NoHalo" class="ivf_semenanalysisreport_NoHalo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->NoHalo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->NoHalo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->NoHalo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Fragmented->Visible) { // Fragmented ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Fragmented) == "") { ?>
		<th data-name="Fragmented" class="<?php echo $ivf_semenanalysisreport->Fragmented->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Fragmented" class="ivf_semenanalysisreport_Fragmented"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Fragmented->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Fragmented" class="<?php echo $ivf_semenanalysisreport->Fragmented->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Fragmented) ?>',1);"><div id="elh_ivf_semenanalysisreport_Fragmented" class="ivf_semenanalysisreport_Fragmented">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Fragmented->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Fragmented->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Fragmented->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->NonFragmented->Visible) { // NonFragmented ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->NonFragmented) == "") { ?>
		<th data-name="NonFragmented" class="<?php echo $ivf_semenanalysisreport->NonFragmented->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_NonFragmented" class="ivf_semenanalysisreport_NonFragmented"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->NonFragmented->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NonFragmented" class="<?php echo $ivf_semenanalysisreport->NonFragmented->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->NonFragmented) ?>',1);"><div id="elh_ivf_semenanalysisreport_NonFragmented" class="ivf_semenanalysisreport_NonFragmented">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->NonFragmented->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->NonFragmented->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->NonFragmented->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->DFI->Visible) { // DFI ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->DFI) == "") { ?>
		<th data-name="DFI" class="<?php echo $ivf_semenanalysisreport->DFI->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_DFI" class="ivf_semenanalysisreport_DFI"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->DFI->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DFI" class="<?php echo $ivf_semenanalysisreport->DFI->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->DFI) ?>',1);"><div id="elh_ivf_semenanalysisreport_DFI" class="ivf_semenanalysisreport_DFI">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->DFI->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->DFI->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->DFI->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->IsueBy->Visible) { // IsueBy ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->IsueBy) == "") { ?>
		<th data-name="IsueBy" class="<?php echo $ivf_semenanalysisreport->IsueBy->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_IsueBy" class="ivf_semenanalysisreport_IsueBy"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->IsueBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IsueBy" class="<?php echo $ivf_semenanalysisreport->IsueBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->IsueBy) ?>',1);"><div id="elh_ivf_semenanalysisreport_IsueBy" class="ivf_semenanalysisreport_IsueBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->IsueBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->IsueBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->IsueBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Volume2->Visible) { // Volume2 ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Volume2) == "") { ?>
		<th data-name="Volume2" class="<?php echo $ivf_semenanalysisreport->Volume2->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Volume2" class="ivf_semenanalysisreport_Volume2"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Volume2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Volume2" class="<?php echo $ivf_semenanalysisreport->Volume2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Volume2) ?>',1);"><div id="elh_ivf_semenanalysisreport_Volume2" class="ivf_semenanalysisreport_Volume2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Volume2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Volume2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Volume2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Concentration2->Visible) { // Concentration2 ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Concentration2) == "") { ?>
		<th data-name="Concentration2" class="<?php echo $ivf_semenanalysisreport->Concentration2->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Concentration2" class="ivf_semenanalysisreport_Concentration2"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Concentration2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Concentration2" class="<?php echo $ivf_semenanalysisreport->Concentration2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Concentration2) ?>',1);"><div id="elh_ivf_semenanalysisreport_Concentration2" class="ivf_semenanalysisreport_Concentration2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Concentration2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Concentration2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Concentration2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Total2->Visible) { // Total2 ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Total2) == "") { ?>
		<th data-name="Total2" class="<?php echo $ivf_semenanalysisreport->Total2->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Total2" class="ivf_semenanalysisreport_Total2"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Total2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Total2" class="<?php echo $ivf_semenanalysisreport->Total2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Total2) ?>',1);"><div id="elh_ivf_semenanalysisreport_Total2" class="ivf_semenanalysisreport_Total2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Total2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Total2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Total2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->ProgressiveMotility2->Visible) { // ProgressiveMotility2 ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->ProgressiveMotility2) == "") { ?>
		<th data-name="ProgressiveMotility2" class="<?php echo $ivf_semenanalysisreport->ProgressiveMotility2->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_ProgressiveMotility2" class="ivf_semenanalysisreport_ProgressiveMotility2"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->ProgressiveMotility2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProgressiveMotility2" class="<?php echo $ivf_semenanalysisreport->ProgressiveMotility2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->ProgressiveMotility2) ?>',1);"><div id="elh_ivf_semenanalysisreport_ProgressiveMotility2" class="ivf_semenanalysisreport_ProgressiveMotility2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->ProgressiveMotility2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->ProgressiveMotility2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->ProgressiveMotility2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->NonProgrssiveMotile2->Visible) { // NonProgrssiveMotile2 ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->NonProgrssiveMotile2) == "") { ?>
		<th data-name="NonProgrssiveMotile2" class="<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile2->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_NonProgrssiveMotile2" class="ivf_semenanalysisreport_NonProgrssiveMotile2"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->NonProgrssiveMotile2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NonProgrssiveMotile2" class="<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->NonProgrssiveMotile2) ?>',1);"><div id="elh_ivf_semenanalysisreport_NonProgrssiveMotile2" class="ivf_semenanalysisreport_NonProgrssiveMotile2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->NonProgrssiveMotile2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->NonProgrssiveMotile2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->NonProgrssiveMotile2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->Immotile2->Visible) { // Immotile2 ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->Immotile2) == "") { ?>
		<th data-name="Immotile2" class="<?php echo $ivf_semenanalysisreport->Immotile2->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Immotile2" class="ivf_semenanalysisreport_Immotile2"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Immotile2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Immotile2" class="<?php echo $ivf_semenanalysisreport->Immotile2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->Immotile2) ?>',1);"><div id="elh_ivf_semenanalysisreport_Immotile2" class="ivf_semenanalysisreport_Immotile2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->Immotile2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->Immotile2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->Immotile2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->TotalProgrssiveMotile2->Visible) { // TotalProgrssiveMotile2 ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->TotalProgrssiveMotile2) == "") { ?>
		<th data-name="TotalProgrssiveMotile2" class="<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile2->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_TotalProgrssiveMotile2" class="ivf_semenanalysisreport_TotalProgrssiveMotile2"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TotalProgrssiveMotile2" class="<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->TotalProgrssiveMotile2) ?>',1);"><div id="elh_ivf_semenanalysisreport_TotalProgrssiveMotile2" class="ivf_semenanalysisreport_TotalProgrssiveMotile2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->TotalProgrssiveMotile2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->TotalProgrssiveMotile2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->IssuedBy->Visible) { // IssuedBy ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->IssuedBy) == "") { ?>
		<th data-name="IssuedBy" class="<?php echo $ivf_semenanalysisreport->IssuedBy->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_IssuedBy" class="ivf_semenanalysisreport_IssuedBy"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->IssuedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IssuedBy" class="<?php echo $ivf_semenanalysisreport->IssuedBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->IssuedBy) ?>',1);"><div id="elh_ivf_semenanalysisreport_IssuedBy" class="ivf_semenanalysisreport_IssuedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->IssuedBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->IssuedBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->IssuedBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->IssuedTo->Visible) { // IssuedTo ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->IssuedTo) == "") { ?>
		<th data-name="IssuedTo" class="<?php echo $ivf_semenanalysisreport->IssuedTo->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_IssuedTo" class="ivf_semenanalysisreport_IssuedTo"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->IssuedTo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IssuedTo" class="<?php echo $ivf_semenanalysisreport->IssuedTo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->IssuedTo) ?>',1);"><div id="elh_ivf_semenanalysisreport_IssuedTo" class="ivf_semenanalysisreport_IssuedTo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->IssuedTo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->IssuedTo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->IssuedTo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->PaID->Visible) { // PaID ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->PaID) == "") { ?>
		<th data-name="PaID" class="<?php echo $ivf_semenanalysisreport->PaID->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_PaID" class="ivf_semenanalysisreport_PaID"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->PaID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PaID" class="<?php echo $ivf_semenanalysisreport->PaID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->PaID) ?>',1);"><div id="elh_ivf_semenanalysisreport_PaID" class="ivf_semenanalysisreport_PaID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->PaID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->PaID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->PaID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->PaName->Visible) { // PaName ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->PaName) == "") { ?>
		<th data-name="PaName" class="<?php echo $ivf_semenanalysisreport->PaName->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_PaName" class="ivf_semenanalysisreport_PaName"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->PaName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PaName" class="<?php echo $ivf_semenanalysisreport->PaName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->PaName) ?>',1);"><div id="elh_ivf_semenanalysisreport_PaName" class="ivf_semenanalysisreport_PaName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->PaName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->PaName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->PaName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->PaMobile->Visible) { // PaMobile ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->PaMobile) == "") { ?>
		<th data-name="PaMobile" class="<?php echo $ivf_semenanalysisreport->PaMobile->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_PaMobile" class="ivf_semenanalysisreport_PaMobile"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->PaMobile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PaMobile" class="<?php echo $ivf_semenanalysisreport->PaMobile->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->PaMobile) ?>',1);"><div id="elh_ivf_semenanalysisreport_PaMobile" class="ivf_semenanalysisreport_PaMobile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->PaMobile->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->PaMobile->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->PaMobile->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->PartnerID->Visible) { // PartnerID ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->PartnerID) == "") { ?>
		<th data-name="PartnerID" class="<?php echo $ivf_semenanalysisreport->PartnerID->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_PartnerID" class="ivf_semenanalysisreport_PartnerID"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->PartnerID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerID" class="<?php echo $ivf_semenanalysisreport->PartnerID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->PartnerID) ?>',1);"><div id="elh_ivf_semenanalysisreport_PartnerID" class="ivf_semenanalysisreport_PartnerID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->PartnerID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->PartnerID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->PartnerID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->PartnerName->Visible) { // PartnerName ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->PartnerName) == "") { ?>
		<th data-name="PartnerName" class="<?php echo $ivf_semenanalysisreport->PartnerName->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_PartnerName" class="ivf_semenanalysisreport_PartnerName"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->PartnerName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerName" class="<?php echo $ivf_semenanalysisreport->PartnerName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->PartnerName) ?>',1);"><div id="elh_ivf_semenanalysisreport_PartnerName" class="ivf_semenanalysisreport_PartnerName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->PartnerName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->PartnerName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->PartnerName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->PartnerMobile->Visible) { // PartnerMobile ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->PartnerMobile) == "") { ?>
		<th data-name="PartnerMobile" class="<?php echo $ivf_semenanalysisreport->PartnerMobile->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_PartnerMobile" class="ivf_semenanalysisreport_PartnerMobile"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->PartnerMobile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerMobile" class="<?php echo $ivf_semenanalysisreport->PartnerMobile->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->PartnerMobile) ?>',1);"><div id="elh_ivf_semenanalysisreport_PartnerMobile" class="ivf_semenanalysisreport_PartnerMobile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->PartnerMobile->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->PartnerMobile->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->PartnerMobile->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->PREG_TEST_DATE->Visible) { // PREG_TEST_DATE ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->PREG_TEST_DATE) == "") { ?>
		<th data-name="PREG_TEST_DATE" class="<?php echo $ivf_semenanalysisreport->PREG_TEST_DATE->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_PREG_TEST_DATE" class="ivf_semenanalysisreport_PREG_TEST_DATE"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->PREG_TEST_DATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PREG_TEST_DATE" class="<?php echo $ivf_semenanalysisreport->PREG_TEST_DATE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->PREG_TEST_DATE) ?>',1);"><div id="elh_ivf_semenanalysisreport_PREG_TEST_DATE" class="ivf_semenanalysisreport_PREG_TEST_DATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->PREG_TEST_DATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->PREG_TEST_DATE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->PREG_TEST_DATE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->SPECIFIC_PROBLEMS->Visible) { // SPECIFIC_PROBLEMS ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->SPECIFIC_PROBLEMS) == "") { ?>
		<th data-name="SPECIFIC_PROBLEMS" class="<?php echo $ivf_semenanalysisreport->SPECIFIC_PROBLEMS->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_SPECIFIC_PROBLEMS" class="ivf_semenanalysisreport_SPECIFIC_PROBLEMS"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->SPECIFIC_PROBLEMS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SPECIFIC_PROBLEMS" class="<?php echo $ivf_semenanalysisreport->SPECIFIC_PROBLEMS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->SPECIFIC_PROBLEMS) ?>',1);"><div id="elh_ivf_semenanalysisreport_SPECIFIC_PROBLEMS" class="ivf_semenanalysisreport_SPECIFIC_PROBLEMS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->SPECIFIC_PROBLEMS->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->SPECIFIC_PROBLEMS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->SPECIFIC_PROBLEMS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->IMSC_1->Visible) { // IMSC_1 ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->IMSC_1) == "") { ?>
		<th data-name="IMSC_1" class="<?php echo $ivf_semenanalysisreport->IMSC_1->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_IMSC_1" class="ivf_semenanalysisreport_IMSC_1"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->IMSC_1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IMSC_1" class="<?php echo $ivf_semenanalysisreport->IMSC_1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->IMSC_1) ?>',1);"><div id="elh_ivf_semenanalysisreport_IMSC_1" class="ivf_semenanalysisreport_IMSC_1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->IMSC_1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->IMSC_1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->IMSC_1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->IMSC_2->Visible) { // IMSC_2 ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->IMSC_2) == "") { ?>
		<th data-name="IMSC_2" class="<?php echo $ivf_semenanalysisreport->IMSC_2->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_IMSC_2" class="ivf_semenanalysisreport_IMSC_2"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->IMSC_2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IMSC_2" class="<?php echo $ivf_semenanalysisreport->IMSC_2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->IMSC_2) ?>',1);"><div id="elh_ivf_semenanalysisreport_IMSC_2" class="ivf_semenanalysisreport_IMSC_2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->IMSC_2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->IMSC_2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->IMSC_2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->LIQUIFACTION_STORAGE->Visible) { // LIQUIFACTION_STORAGE ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->LIQUIFACTION_STORAGE) == "") { ?>
		<th data-name="LIQUIFACTION_STORAGE" class="<?php echo $ivf_semenanalysisreport->LIQUIFACTION_STORAGE->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_LIQUIFACTION_STORAGE" class="ivf_semenanalysisreport_LIQUIFACTION_STORAGE"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->LIQUIFACTION_STORAGE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LIQUIFACTION_STORAGE" class="<?php echo $ivf_semenanalysisreport->LIQUIFACTION_STORAGE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->LIQUIFACTION_STORAGE) ?>',1);"><div id="elh_ivf_semenanalysisreport_LIQUIFACTION_STORAGE" class="ivf_semenanalysisreport_LIQUIFACTION_STORAGE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->LIQUIFACTION_STORAGE->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->LIQUIFACTION_STORAGE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->LIQUIFACTION_STORAGE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->IUI_PREP_METHOD->Visible) { // IUI_PREP_METHOD ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->IUI_PREP_METHOD) == "") { ?>
		<th data-name="IUI_PREP_METHOD" class="<?php echo $ivf_semenanalysisreport->IUI_PREP_METHOD->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_IUI_PREP_METHOD" class="ivf_semenanalysisreport_IUI_PREP_METHOD"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->IUI_PREP_METHOD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IUI_PREP_METHOD" class="<?php echo $ivf_semenanalysisreport->IUI_PREP_METHOD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->IUI_PREP_METHOD) ?>',1);"><div id="elh_ivf_semenanalysisreport_IUI_PREP_METHOD" class="ivf_semenanalysisreport_IUI_PREP_METHOD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->IUI_PREP_METHOD->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->IUI_PREP_METHOD->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->IUI_PREP_METHOD->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->TIME_FROM_TRIGGER->Visible) { // TIME_FROM_TRIGGER ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->TIME_FROM_TRIGGER) == "") { ?>
		<th data-name="TIME_FROM_TRIGGER" class="<?php echo $ivf_semenanalysisreport->TIME_FROM_TRIGGER->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_TIME_FROM_TRIGGER" class="ivf_semenanalysisreport_TIME_FROM_TRIGGER"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->TIME_FROM_TRIGGER->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TIME_FROM_TRIGGER" class="<?php echo $ivf_semenanalysisreport->TIME_FROM_TRIGGER->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->TIME_FROM_TRIGGER) ?>',1);"><div id="elh_ivf_semenanalysisreport_TIME_FROM_TRIGGER" class="ivf_semenanalysisreport_TIME_FROM_TRIGGER">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->TIME_FROM_TRIGGER->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->TIME_FROM_TRIGGER->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->TIME_FROM_TRIGGER->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->COLLECTION_TO_PREPARATION->Visible) { // COLLECTION_TO_PREPARATION ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->COLLECTION_TO_PREPARATION) == "") { ?>
		<th data-name="COLLECTION_TO_PREPARATION" class="<?php echo $ivf_semenanalysisreport->COLLECTION_TO_PREPARATION->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_COLLECTION_TO_PREPARATION" class="ivf_semenanalysisreport_COLLECTION_TO_PREPARATION"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->COLLECTION_TO_PREPARATION->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="COLLECTION_TO_PREPARATION" class="<?php echo $ivf_semenanalysisreport->COLLECTION_TO_PREPARATION->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->COLLECTION_TO_PREPARATION) ?>',1);"><div id="elh_ivf_semenanalysisreport_COLLECTION_TO_PREPARATION" class="ivf_semenanalysisreport_COLLECTION_TO_PREPARATION">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->COLLECTION_TO_PREPARATION->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->COLLECTION_TO_PREPARATION->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->COLLECTION_TO_PREPARATION->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport->TIME_FROM_PREP_TO_INSEM->Visible) { // TIME_FROM_PREP_TO_INSEM ?>
	<?php if ($ivf_semenanalysisreport->sortUrl($ivf_semenanalysisreport->TIME_FROM_PREP_TO_INSEM) == "") { ?>
		<th data-name="TIME_FROM_PREP_TO_INSEM" class="<?php echo $ivf_semenanalysisreport->TIME_FROM_PREP_TO_INSEM->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM" class="ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->TIME_FROM_PREP_TO_INSEM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TIME_FROM_PREP_TO_INSEM" class="<?php echo $ivf_semenanalysisreport->TIME_FROM_PREP_TO_INSEM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_semenanalysisreport->SortUrl($ivf_semenanalysisreport->TIME_FROM_PREP_TO_INSEM) ?>',1);"><div id="elh_ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM" class="ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport->TIME_FROM_PREP_TO_INSEM->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport->TIME_FROM_PREP_TO_INSEM->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport->TIME_FROM_PREP_TO_INSEM->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$ivf_semenanalysisreport_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($ivf_semenanalysisreport->ExportAll && $ivf_semenanalysisreport->isExport()) {
	$ivf_semenanalysisreport_list->StopRec = $ivf_semenanalysisreport_list->TotalRecs;
} else {

	// Set the last record to display
	if ($ivf_semenanalysisreport_list->TotalRecs > $ivf_semenanalysisreport_list->StartRec + $ivf_semenanalysisreport_list->DisplayRecs - 1)
		$ivf_semenanalysisreport_list->StopRec = $ivf_semenanalysisreport_list->StartRec + $ivf_semenanalysisreport_list->DisplayRecs - 1;
	else
		$ivf_semenanalysisreport_list->StopRec = $ivf_semenanalysisreport_list->TotalRecs;
}
$ivf_semenanalysisreport_list->RecCnt = $ivf_semenanalysisreport_list->StartRec - 1;
if ($ivf_semenanalysisreport_list->Recordset && !$ivf_semenanalysisreport_list->Recordset->EOF) {
	$ivf_semenanalysisreport_list->Recordset->moveFirst();
	$selectLimit = $ivf_semenanalysisreport_list->UseSelectLimit;
	if (!$selectLimit && $ivf_semenanalysisreport_list->StartRec > 1)
		$ivf_semenanalysisreport_list->Recordset->move($ivf_semenanalysisreport_list->StartRec - 1);
} elseif (!$ivf_semenanalysisreport->AllowAddDeleteRow && $ivf_semenanalysisreport_list->StopRec == 0) {
	$ivf_semenanalysisreport_list->StopRec = $ivf_semenanalysisreport->GridAddRowCount;
}

// Initialize aggregate
$ivf_semenanalysisreport->RowType = ROWTYPE_AGGREGATEINIT;
$ivf_semenanalysisreport->resetAttributes();
$ivf_semenanalysisreport_list->renderRow();
while ($ivf_semenanalysisreport_list->RecCnt < $ivf_semenanalysisreport_list->StopRec) {
	$ivf_semenanalysisreport_list->RecCnt++;
	if ($ivf_semenanalysisreport_list->RecCnt >= $ivf_semenanalysisreport_list->StartRec) {
		$ivf_semenanalysisreport_list->RowCnt++;

		// Set up key count
		$ivf_semenanalysisreport_list->KeyCount = $ivf_semenanalysisreport_list->RowIndex;

		// Init row class and style
		$ivf_semenanalysisreport->resetAttributes();
		$ivf_semenanalysisreport->CssClass = "";
		if ($ivf_semenanalysisreport->isGridAdd()) {
		} else {
			$ivf_semenanalysisreport_list->loadRowValues($ivf_semenanalysisreport_list->Recordset); // Load row values
		}
		$ivf_semenanalysisreport->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$ivf_semenanalysisreport->RowAttrs = array_merge($ivf_semenanalysisreport->RowAttrs, array('data-rowindex'=>$ivf_semenanalysisreport_list->RowCnt, 'id'=>'r' . $ivf_semenanalysisreport_list->RowCnt . '_ivf_semenanalysisreport', 'data-rowtype'=>$ivf_semenanalysisreport->RowType));

		// Render row
		$ivf_semenanalysisreport_list->renderRow();

		// Render list options
		$ivf_semenanalysisreport_list->renderListOptions();
?>
	<tr<?php echo $ivf_semenanalysisreport->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_semenanalysisreport_list->ListOptions->render("body", "left", $ivf_semenanalysisreport_list->RowCnt);
?>
	<?php if ($ivf_semenanalysisreport->id->Visible) { // id ?>
		<td data-name="id"<?php echo $ivf_semenanalysisreport->id->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_id" class="ivf_semenanalysisreport_id">
<span<?php echo $ivf_semenanalysisreport->id->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->RIDNo->Visible) { // RIDNo ?>
		<td data-name="RIDNo"<?php echo $ivf_semenanalysisreport->RIDNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_RIDNo" class="ivf_semenanalysisreport_RIDNo">
<span<?php echo $ivf_semenanalysisreport->RIDNo->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->RIDNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $ivf_semenanalysisreport->PatientName->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_PatientName" class="ivf_semenanalysisreport_PatientName">
<span<?php echo $ivf_semenanalysisreport->PatientName->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->HusbandName->Visible) { // HusbandName ?>
		<td data-name="HusbandName"<?php echo $ivf_semenanalysisreport->HusbandName->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_HusbandName" class="ivf_semenanalysisreport_HusbandName">
<span<?php echo $ivf_semenanalysisreport->HusbandName->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->HusbandName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->RequestDr->Visible) { // RequestDr ?>
		<td data-name="RequestDr"<?php echo $ivf_semenanalysisreport->RequestDr->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_RequestDr" class="ivf_semenanalysisreport_RequestDr">
<span<?php echo $ivf_semenanalysisreport->RequestDr->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->RequestDr->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->CollectionDate->Visible) { // CollectionDate ?>
		<td data-name="CollectionDate"<?php echo $ivf_semenanalysisreport->CollectionDate->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_CollectionDate" class="ivf_semenanalysisreport_CollectionDate">
<span<?php echo $ivf_semenanalysisreport->CollectionDate->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->CollectionDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->ResultDate->Visible) { // ResultDate ?>
		<td data-name="ResultDate"<?php echo $ivf_semenanalysisreport->ResultDate->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_ResultDate" class="ivf_semenanalysisreport_ResultDate">
<span<?php echo $ivf_semenanalysisreport->ResultDate->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->ResultDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->RequestSample->Visible) { // RequestSample ?>
		<td data-name="RequestSample"<?php echo $ivf_semenanalysisreport->RequestSample->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_RequestSample" class="ivf_semenanalysisreport_RequestSample">
<span<?php echo $ivf_semenanalysisreport->RequestSample->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->RequestSample->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->CollectionType->Visible) { // CollectionType ?>
		<td data-name="CollectionType"<?php echo $ivf_semenanalysisreport->CollectionType->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_CollectionType" class="ivf_semenanalysisreport_CollectionType">
<span<?php echo $ivf_semenanalysisreport->CollectionType->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->CollectionType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->CollectionMethod->Visible) { // CollectionMethod ?>
		<td data-name="CollectionMethod"<?php echo $ivf_semenanalysisreport->CollectionMethod->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_CollectionMethod" class="ivf_semenanalysisreport_CollectionMethod">
<span<?php echo $ivf_semenanalysisreport->CollectionMethod->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->CollectionMethod->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Medicationused->Visible) { // Medicationused ?>
		<td data-name="Medicationused"<?php echo $ivf_semenanalysisreport->Medicationused->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_Medicationused" class="ivf_semenanalysisreport_Medicationused">
<span<?php echo $ivf_semenanalysisreport->Medicationused->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Medicationused->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->DifficultiesinCollection->Visible) { // DifficultiesinCollection ?>
		<td data-name="DifficultiesinCollection"<?php echo $ivf_semenanalysisreport->DifficultiesinCollection->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_DifficultiesinCollection" class="ivf_semenanalysisreport_DifficultiesinCollection">
<span<?php echo $ivf_semenanalysisreport->DifficultiesinCollection->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->DifficultiesinCollection->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->pH->Visible) { // pH ?>
		<td data-name="pH"<?php echo $ivf_semenanalysisreport->pH->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_pH" class="ivf_semenanalysisreport_pH">
<span<?php echo $ivf_semenanalysisreport->pH->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->pH->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Timeofcollection->Visible) { // Timeofcollection ?>
		<td data-name="Timeofcollection"<?php echo $ivf_semenanalysisreport->Timeofcollection->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_Timeofcollection" class="ivf_semenanalysisreport_Timeofcollection">
<span<?php echo $ivf_semenanalysisreport->Timeofcollection->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Timeofcollection->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Timeofexamination->Visible) { // Timeofexamination ?>
		<td data-name="Timeofexamination"<?php echo $ivf_semenanalysisreport->Timeofexamination->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_Timeofexamination" class="ivf_semenanalysisreport_Timeofexamination">
<span<?php echo $ivf_semenanalysisreport->Timeofexamination->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Timeofexamination->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Volume->Visible) { // Volume ?>
		<td data-name="Volume"<?php echo $ivf_semenanalysisreport->Volume->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_Volume" class="ivf_semenanalysisreport_Volume">
<span<?php echo $ivf_semenanalysisreport->Volume->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Volume->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Concentration->Visible) { // Concentration ?>
		<td data-name="Concentration"<?php echo $ivf_semenanalysisreport->Concentration->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_Concentration" class="ivf_semenanalysisreport_Concentration">
<span<?php echo $ivf_semenanalysisreport->Concentration->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Concentration->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Total->Visible) { // Total ?>
		<td data-name="Total"<?php echo $ivf_semenanalysisreport->Total->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_Total" class="ivf_semenanalysisreport_Total">
<span<?php echo $ivf_semenanalysisreport->Total->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Total->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->ProgressiveMotility->Visible) { // ProgressiveMotility ?>
		<td data-name="ProgressiveMotility"<?php echo $ivf_semenanalysisreport->ProgressiveMotility->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_ProgressiveMotility" class="ivf_semenanalysisreport_ProgressiveMotility">
<span<?php echo $ivf_semenanalysisreport->ProgressiveMotility->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->ProgressiveMotility->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->NonProgrssiveMotile->Visible) { // NonProgrssiveMotile ?>
		<td data-name="NonProgrssiveMotile"<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_NonProgrssiveMotile" class="ivf_semenanalysisreport_NonProgrssiveMotile">
<span<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Immotile->Visible) { // Immotile ?>
		<td data-name="Immotile"<?php echo $ivf_semenanalysisreport->Immotile->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_Immotile" class="ivf_semenanalysisreport_Immotile">
<span<?php echo $ivf_semenanalysisreport->Immotile->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Immotile->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->TotalProgrssiveMotile->Visible) { // TotalProgrssiveMotile ?>
		<td data-name="TotalProgrssiveMotile"<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_TotalProgrssiveMotile" class="ivf_semenanalysisreport_TotalProgrssiveMotile">
<span<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Appearance->Visible) { // Appearance ?>
		<td data-name="Appearance"<?php echo $ivf_semenanalysisreport->Appearance->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_Appearance" class="ivf_semenanalysisreport_Appearance">
<span<?php echo $ivf_semenanalysisreport->Appearance->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Appearance->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Homogenosity->Visible) { // Homogenosity ?>
		<td data-name="Homogenosity"<?php echo $ivf_semenanalysisreport->Homogenosity->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_Homogenosity" class="ivf_semenanalysisreport_Homogenosity">
<span<?php echo $ivf_semenanalysisreport->Homogenosity->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Homogenosity->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->CompleteSample->Visible) { // CompleteSample ?>
		<td data-name="CompleteSample"<?php echo $ivf_semenanalysisreport->CompleteSample->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_CompleteSample" class="ivf_semenanalysisreport_CompleteSample">
<span<?php echo $ivf_semenanalysisreport->CompleteSample->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->CompleteSample->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Liquefactiontime->Visible) { // Liquefactiontime ?>
		<td data-name="Liquefactiontime"<?php echo $ivf_semenanalysisreport->Liquefactiontime->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_Liquefactiontime" class="ivf_semenanalysisreport_Liquefactiontime">
<span<?php echo $ivf_semenanalysisreport->Liquefactiontime->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Liquefactiontime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Normal->Visible) { // Normal ?>
		<td data-name="Normal"<?php echo $ivf_semenanalysisreport->Normal->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_Normal" class="ivf_semenanalysisreport_Normal">
<span<?php echo $ivf_semenanalysisreport->Normal->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Normal->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Abnormal->Visible) { // Abnormal ?>
		<td data-name="Abnormal"<?php echo $ivf_semenanalysisreport->Abnormal->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_Abnormal" class="ivf_semenanalysisreport_Abnormal">
<span<?php echo $ivf_semenanalysisreport->Abnormal->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Abnormal->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Headdefects->Visible) { // Headdefects ?>
		<td data-name="Headdefects"<?php echo $ivf_semenanalysisreport->Headdefects->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_Headdefects" class="ivf_semenanalysisreport_Headdefects">
<span<?php echo $ivf_semenanalysisreport->Headdefects->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Headdefects->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->MidpieceDefects->Visible) { // MidpieceDefects ?>
		<td data-name="MidpieceDefects"<?php echo $ivf_semenanalysisreport->MidpieceDefects->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_MidpieceDefects" class="ivf_semenanalysisreport_MidpieceDefects">
<span<?php echo $ivf_semenanalysisreport->MidpieceDefects->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->MidpieceDefects->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->TailDefects->Visible) { // TailDefects ?>
		<td data-name="TailDefects"<?php echo $ivf_semenanalysisreport->TailDefects->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_TailDefects" class="ivf_semenanalysisreport_TailDefects">
<span<?php echo $ivf_semenanalysisreport->TailDefects->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->TailDefects->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->NormalProgMotile->Visible) { // NormalProgMotile ?>
		<td data-name="NormalProgMotile"<?php echo $ivf_semenanalysisreport->NormalProgMotile->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_NormalProgMotile" class="ivf_semenanalysisreport_NormalProgMotile">
<span<?php echo $ivf_semenanalysisreport->NormalProgMotile->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->NormalProgMotile->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->ImmatureForms->Visible) { // ImmatureForms ?>
		<td data-name="ImmatureForms"<?php echo $ivf_semenanalysisreport->ImmatureForms->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_ImmatureForms" class="ivf_semenanalysisreport_ImmatureForms">
<span<?php echo $ivf_semenanalysisreport->ImmatureForms->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->ImmatureForms->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Leucocytes->Visible) { // Leucocytes ?>
		<td data-name="Leucocytes"<?php echo $ivf_semenanalysisreport->Leucocytes->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_Leucocytes" class="ivf_semenanalysisreport_Leucocytes">
<span<?php echo $ivf_semenanalysisreport->Leucocytes->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Leucocytes->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Agglutination->Visible) { // Agglutination ?>
		<td data-name="Agglutination"<?php echo $ivf_semenanalysisreport->Agglutination->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_Agglutination" class="ivf_semenanalysisreport_Agglutination">
<span<?php echo $ivf_semenanalysisreport->Agglutination->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Agglutination->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Debris->Visible) { // Debris ?>
		<td data-name="Debris"<?php echo $ivf_semenanalysisreport->Debris->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_Debris" class="ivf_semenanalysisreport_Debris">
<span<?php echo $ivf_semenanalysisreport->Debris->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Debris->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Diagnosis->Visible) { // Diagnosis ?>
		<td data-name="Diagnosis"<?php echo $ivf_semenanalysisreport->Diagnosis->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_Diagnosis" class="ivf_semenanalysisreport_Diagnosis">
<span<?php echo $ivf_semenanalysisreport->Diagnosis->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Diagnosis->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Observations->Visible) { // Observations ?>
		<td data-name="Observations"<?php echo $ivf_semenanalysisreport->Observations->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_Observations" class="ivf_semenanalysisreport_Observations">
<span<?php echo $ivf_semenanalysisreport->Observations->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Observations->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Signature->Visible) { // Signature ?>
		<td data-name="Signature"<?php echo $ivf_semenanalysisreport->Signature->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_Signature" class="ivf_semenanalysisreport_Signature">
<span<?php echo $ivf_semenanalysisreport->Signature->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Signature->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->SemenOrgin->Visible) { // SemenOrgin ?>
		<td data-name="SemenOrgin"<?php echo $ivf_semenanalysisreport->SemenOrgin->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_SemenOrgin" class="ivf_semenanalysisreport_SemenOrgin">
<span<?php echo $ivf_semenanalysisreport->SemenOrgin->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->SemenOrgin->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Donor->Visible) { // Donor ?>
		<td data-name="Donor"<?php echo $ivf_semenanalysisreport->Donor->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_Donor" class="ivf_semenanalysisreport_Donor">
<span<?php echo $ivf_semenanalysisreport->Donor->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Donor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->DonorBloodgroup->Visible) { // DonorBloodgroup ?>
		<td data-name="DonorBloodgroup"<?php echo $ivf_semenanalysisreport->DonorBloodgroup->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_DonorBloodgroup" class="ivf_semenanalysisreport_DonorBloodgroup">
<span<?php echo $ivf_semenanalysisreport->DonorBloodgroup->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->DonorBloodgroup->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Tank->Visible) { // Tank ?>
		<td data-name="Tank"<?php echo $ivf_semenanalysisreport->Tank->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_Tank" class="ivf_semenanalysisreport_Tank">
<span<?php echo $ivf_semenanalysisreport->Tank->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Tank->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Location->Visible) { // Location ?>
		<td data-name="Location"<?php echo $ivf_semenanalysisreport->Location->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_Location" class="ivf_semenanalysisreport_Location">
<span<?php echo $ivf_semenanalysisreport->Location->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Location->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Volume1->Visible) { // Volume1 ?>
		<td data-name="Volume1"<?php echo $ivf_semenanalysisreport->Volume1->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_Volume1" class="ivf_semenanalysisreport_Volume1">
<span<?php echo $ivf_semenanalysisreport->Volume1->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Volume1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Concentration1->Visible) { // Concentration1 ?>
		<td data-name="Concentration1"<?php echo $ivf_semenanalysisreport->Concentration1->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_Concentration1" class="ivf_semenanalysisreport_Concentration1">
<span<?php echo $ivf_semenanalysisreport->Concentration1->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Concentration1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Total1->Visible) { // Total1 ?>
		<td data-name="Total1"<?php echo $ivf_semenanalysisreport->Total1->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_Total1" class="ivf_semenanalysisreport_Total1">
<span<?php echo $ivf_semenanalysisreport->Total1->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Total1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->ProgressiveMotility1->Visible) { // ProgressiveMotility1 ?>
		<td data-name="ProgressiveMotility1"<?php echo $ivf_semenanalysisreport->ProgressiveMotility1->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_ProgressiveMotility1" class="ivf_semenanalysisreport_ProgressiveMotility1">
<span<?php echo $ivf_semenanalysisreport->ProgressiveMotility1->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->ProgressiveMotility1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->NonProgrssiveMotile1->Visible) { // NonProgrssiveMotile1 ?>
		<td data-name="NonProgrssiveMotile1"<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile1->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_NonProgrssiveMotile1" class="ivf_semenanalysisreport_NonProgrssiveMotile1">
<span<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile1->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Immotile1->Visible) { // Immotile1 ?>
		<td data-name="Immotile1"<?php echo $ivf_semenanalysisreport->Immotile1->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_Immotile1" class="ivf_semenanalysisreport_Immotile1">
<span<?php echo $ivf_semenanalysisreport->Immotile1->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Immotile1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->TotalProgrssiveMotile1->Visible) { // TotalProgrssiveMotile1 ?>
		<td data-name="TotalProgrssiveMotile1"<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile1->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_TotalProgrssiveMotile1" class="ivf_semenanalysisreport_TotalProgrssiveMotile1">
<span<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile1->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo"<?php echo $ivf_semenanalysisreport->TidNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_TidNo" class="ivf_semenanalysisreport_TidNo">
<span<?php echo $ivf_semenanalysisreport->TidNo->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->TidNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Color->Visible) { // Color ?>
		<td data-name="Color"<?php echo $ivf_semenanalysisreport->Color->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_Color" class="ivf_semenanalysisreport_Color">
<span<?php echo $ivf_semenanalysisreport->Color->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Color->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->DoneBy->Visible) { // DoneBy ?>
		<td data-name="DoneBy"<?php echo $ivf_semenanalysisreport->DoneBy->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_DoneBy" class="ivf_semenanalysisreport_DoneBy">
<span<?php echo $ivf_semenanalysisreport->DoneBy->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->DoneBy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Method->Visible) { // Method ?>
		<td data-name="Method"<?php echo $ivf_semenanalysisreport->Method->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_Method" class="ivf_semenanalysisreport_Method">
<span<?php echo $ivf_semenanalysisreport->Method->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Method->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Abstinence->Visible) { // Abstinence ?>
		<td data-name="Abstinence"<?php echo $ivf_semenanalysisreport->Abstinence->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_Abstinence" class="ivf_semenanalysisreport_Abstinence">
<span<?php echo $ivf_semenanalysisreport->Abstinence->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Abstinence->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->ProcessedBy->Visible) { // ProcessedBy ?>
		<td data-name="ProcessedBy"<?php echo $ivf_semenanalysisreport->ProcessedBy->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_ProcessedBy" class="ivf_semenanalysisreport_ProcessedBy">
<span<?php echo $ivf_semenanalysisreport->ProcessedBy->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->ProcessedBy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->InseminationTime->Visible) { // InseminationTime ?>
		<td data-name="InseminationTime"<?php echo $ivf_semenanalysisreport->InseminationTime->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_InseminationTime" class="ivf_semenanalysisreport_InseminationTime">
<span<?php echo $ivf_semenanalysisreport->InseminationTime->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->InseminationTime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->InseminationBy->Visible) { // InseminationBy ?>
		<td data-name="InseminationBy"<?php echo $ivf_semenanalysisreport->InseminationBy->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_InseminationBy" class="ivf_semenanalysisreport_InseminationBy">
<span<?php echo $ivf_semenanalysisreport->InseminationBy->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->InseminationBy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Big->Visible) { // Big ?>
		<td data-name="Big"<?php echo $ivf_semenanalysisreport->Big->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_Big" class="ivf_semenanalysisreport_Big">
<span<?php echo $ivf_semenanalysisreport->Big->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Big->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Medium->Visible) { // Medium ?>
		<td data-name="Medium"<?php echo $ivf_semenanalysisreport->Medium->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_Medium" class="ivf_semenanalysisreport_Medium">
<span<?php echo $ivf_semenanalysisreport->Medium->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Medium->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Small->Visible) { // Small ?>
		<td data-name="Small"<?php echo $ivf_semenanalysisreport->Small->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_Small" class="ivf_semenanalysisreport_Small">
<span<?php echo $ivf_semenanalysisreport->Small->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Small->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->NoHalo->Visible) { // NoHalo ?>
		<td data-name="NoHalo"<?php echo $ivf_semenanalysisreport->NoHalo->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_NoHalo" class="ivf_semenanalysisreport_NoHalo">
<span<?php echo $ivf_semenanalysisreport->NoHalo->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->NoHalo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Fragmented->Visible) { // Fragmented ?>
		<td data-name="Fragmented"<?php echo $ivf_semenanalysisreport->Fragmented->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_Fragmented" class="ivf_semenanalysisreport_Fragmented">
<span<?php echo $ivf_semenanalysisreport->Fragmented->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Fragmented->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->NonFragmented->Visible) { // NonFragmented ?>
		<td data-name="NonFragmented"<?php echo $ivf_semenanalysisreport->NonFragmented->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_NonFragmented" class="ivf_semenanalysisreport_NonFragmented">
<span<?php echo $ivf_semenanalysisreport->NonFragmented->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->NonFragmented->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->DFI->Visible) { // DFI ?>
		<td data-name="DFI"<?php echo $ivf_semenanalysisreport->DFI->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_DFI" class="ivf_semenanalysisreport_DFI">
<span<?php echo $ivf_semenanalysisreport->DFI->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->DFI->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->IsueBy->Visible) { // IsueBy ?>
		<td data-name="IsueBy"<?php echo $ivf_semenanalysisreport->IsueBy->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_IsueBy" class="ivf_semenanalysisreport_IsueBy">
<span<?php echo $ivf_semenanalysisreport->IsueBy->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->IsueBy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Volume2->Visible) { // Volume2 ?>
		<td data-name="Volume2"<?php echo $ivf_semenanalysisreport->Volume2->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_Volume2" class="ivf_semenanalysisreport_Volume2">
<span<?php echo $ivf_semenanalysisreport->Volume2->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Volume2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Concentration2->Visible) { // Concentration2 ?>
		<td data-name="Concentration2"<?php echo $ivf_semenanalysisreport->Concentration2->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_Concentration2" class="ivf_semenanalysisreport_Concentration2">
<span<?php echo $ivf_semenanalysisreport->Concentration2->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Concentration2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Total2->Visible) { // Total2 ?>
		<td data-name="Total2"<?php echo $ivf_semenanalysisreport->Total2->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_Total2" class="ivf_semenanalysisreport_Total2">
<span<?php echo $ivf_semenanalysisreport->Total2->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Total2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->ProgressiveMotility2->Visible) { // ProgressiveMotility2 ?>
		<td data-name="ProgressiveMotility2"<?php echo $ivf_semenanalysisreport->ProgressiveMotility2->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_ProgressiveMotility2" class="ivf_semenanalysisreport_ProgressiveMotility2">
<span<?php echo $ivf_semenanalysisreport->ProgressiveMotility2->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->ProgressiveMotility2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->NonProgrssiveMotile2->Visible) { // NonProgrssiveMotile2 ?>
		<td data-name="NonProgrssiveMotile2"<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile2->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_NonProgrssiveMotile2" class="ivf_semenanalysisreport_NonProgrssiveMotile2">
<span<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile2->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->NonProgrssiveMotile2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->Immotile2->Visible) { // Immotile2 ?>
		<td data-name="Immotile2"<?php echo $ivf_semenanalysisreport->Immotile2->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_Immotile2" class="ivf_semenanalysisreport_Immotile2">
<span<?php echo $ivf_semenanalysisreport->Immotile2->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->Immotile2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->TotalProgrssiveMotile2->Visible) { // TotalProgrssiveMotile2 ?>
		<td data-name="TotalProgrssiveMotile2"<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile2->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_TotalProgrssiveMotile2" class="ivf_semenanalysisreport_TotalProgrssiveMotile2">
<span<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile2->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->TotalProgrssiveMotile2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->IssuedBy->Visible) { // IssuedBy ?>
		<td data-name="IssuedBy"<?php echo $ivf_semenanalysisreport->IssuedBy->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_IssuedBy" class="ivf_semenanalysisreport_IssuedBy">
<span<?php echo $ivf_semenanalysisreport->IssuedBy->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->IssuedBy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->IssuedTo->Visible) { // IssuedTo ?>
		<td data-name="IssuedTo"<?php echo $ivf_semenanalysisreport->IssuedTo->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_IssuedTo" class="ivf_semenanalysisreport_IssuedTo">
<span<?php echo $ivf_semenanalysisreport->IssuedTo->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->IssuedTo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->PaID->Visible) { // PaID ?>
		<td data-name="PaID"<?php echo $ivf_semenanalysisreport->PaID->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_PaID" class="ivf_semenanalysisreport_PaID">
<span<?php echo $ivf_semenanalysisreport->PaID->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->PaID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->PaName->Visible) { // PaName ?>
		<td data-name="PaName"<?php echo $ivf_semenanalysisreport->PaName->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_PaName" class="ivf_semenanalysisreport_PaName">
<span<?php echo $ivf_semenanalysisreport->PaName->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->PaName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->PaMobile->Visible) { // PaMobile ?>
		<td data-name="PaMobile"<?php echo $ivf_semenanalysisreport->PaMobile->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_PaMobile" class="ivf_semenanalysisreport_PaMobile">
<span<?php echo $ivf_semenanalysisreport->PaMobile->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->PaMobile->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->PartnerID->Visible) { // PartnerID ?>
		<td data-name="PartnerID"<?php echo $ivf_semenanalysisreport->PartnerID->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_PartnerID" class="ivf_semenanalysisreport_PartnerID">
<span<?php echo $ivf_semenanalysisreport->PartnerID->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->PartnerID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->PartnerName->Visible) { // PartnerName ?>
		<td data-name="PartnerName"<?php echo $ivf_semenanalysisreport->PartnerName->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_PartnerName" class="ivf_semenanalysisreport_PartnerName">
<span<?php echo $ivf_semenanalysisreport->PartnerName->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->PartnerName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->PartnerMobile->Visible) { // PartnerMobile ?>
		<td data-name="PartnerMobile"<?php echo $ivf_semenanalysisreport->PartnerMobile->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_PartnerMobile" class="ivf_semenanalysisreport_PartnerMobile">
<span<?php echo $ivf_semenanalysisreport->PartnerMobile->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->PartnerMobile->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->PREG_TEST_DATE->Visible) { // PREG_TEST_DATE ?>
		<td data-name="PREG_TEST_DATE"<?php echo $ivf_semenanalysisreport->PREG_TEST_DATE->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_PREG_TEST_DATE" class="ivf_semenanalysisreport_PREG_TEST_DATE">
<span<?php echo $ivf_semenanalysisreport->PREG_TEST_DATE->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->PREG_TEST_DATE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->SPECIFIC_PROBLEMS->Visible) { // SPECIFIC_PROBLEMS ?>
		<td data-name="SPECIFIC_PROBLEMS"<?php echo $ivf_semenanalysisreport->SPECIFIC_PROBLEMS->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_SPECIFIC_PROBLEMS" class="ivf_semenanalysisreport_SPECIFIC_PROBLEMS">
<span<?php echo $ivf_semenanalysisreport->SPECIFIC_PROBLEMS->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->SPECIFIC_PROBLEMS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->IMSC_1->Visible) { // IMSC_1 ?>
		<td data-name="IMSC_1"<?php echo $ivf_semenanalysisreport->IMSC_1->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_IMSC_1" class="ivf_semenanalysisreport_IMSC_1">
<span<?php echo $ivf_semenanalysisreport->IMSC_1->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->IMSC_1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->IMSC_2->Visible) { // IMSC_2 ?>
		<td data-name="IMSC_2"<?php echo $ivf_semenanalysisreport->IMSC_2->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_IMSC_2" class="ivf_semenanalysisreport_IMSC_2">
<span<?php echo $ivf_semenanalysisreport->IMSC_2->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->IMSC_2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->LIQUIFACTION_STORAGE->Visible) { // LIQUIFACTION_STORAGE ?>
		<td data-name="LIQUIFACTION_STORAGE"<?php echo $ivf_semenanalysisreport->LIQUIFACTION_STORAGE->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_LIQUIFACTION_STORAGE" class="ivf_semenanalysisreport_LIQUIFACTION_STORAGE">
<span<?php echo $ivf_semenanalysisreport->LIQUIFACTION_STORAGE->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->LIQUIFACTION_STORAGE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->IUI_PREP_METHOD->Visible) { // IUI_PREP_METHOD ?>
		<td data-name="IUI_PREP_METHOD"<?php echo $ivf_semenanalysisreport->IUI_PREP_METHOD->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_IUI_PREP_METHOD" class="ivf_semenanalysisreport_IUI_PREP_METHOD">
<span<?php echo $ivf_semenanalysisreport->IUI_PREP_METHOD->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->IUI_PREP_METHOD->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->TIME_FROM_TRIGGER->Visible) { // TIME_FROM_TRIGGER ?>
		<td data-name="TIME_FROM_TRIGGER"<?php echo $ivf_semenanalysisreport->TIME_FROM_TRIGGER->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_TIME_FROM_TRIGGER" class="ivf_semenanalysisreport_TIME_FROM_TRIGGER">
<span<?php echo $ivf_semenanalysisreport->TIME_FROM_TRIGGER->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->TIME_FROM_TRIGGER->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->COLLECTION_TO_PREPARATION->Visible) { // COLLECTION_TO_PREPARATION ?>
		<td data-name="COLLECTION_TO_PREPARATION"<?php echo $ivf_semenanalysisreport->COLLECTION_TO_PREPARATION->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_COLLECTION_TO_PREPARATION" class="ivf_semenanalysisreport_COLLECTION_TO_PREPARATION">
<span<?php echo $ivf_semenanalysisreport->COLLECTION_TO_PREPARATION->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->COLLECTION_TO_PREPARATION->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport->TIME_FROM_PREP_TO_INSEM->Visible) { // TIME_FROM_PREP_TO_INSEM ?>
		<td data-name="TIME_FROM_PREP_TO_INSEM"<?php echo $ivf_semenanalysisreport->TIME_FROM_PREP_TO_INSEM->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCnt ?>_ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM" class="ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM">
<span<?php echo $ivf_semenanalysisreport->TIME_FROM_PREP_TO_INSEM->viewAttributes() ?>>
<?php echo $ivf_semenanalysisreport->TIME_FROM_PREP_TO_INSEM->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_semenanalysisreport_list->ListOptions->render("body", "right", $ivf_semenanalysisreport_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$ivf_semenanalysisreport->isGridAdd())
		$ivf_semenanalysisreport_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$ivf_semenanalysisreport->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($ivf_semenanalysisreport_list->Recordset)
	$ivf_semenanalysisreport_list->Recordset->Close();
?>
<?php if (!$ivf_semenanalysisreport->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$ivf_semenanalysisreport->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($ivf_semenanalysisreport_list->Pager)) $ivf_semenanalysisreport_list->Pager = new NumericPager($ivf_semenanalysisreport_list->StartRec, $ivf_semenanalysisreport_list->DisplayRecs, $ivf_semenanalysisreport_list->TotalRecs, $ivf_semenanalysisreport_list->RecRange, $ivf_semenanalysisreport_list->AutoHidePager) ?>
<?php if ($ivf_semenanalysisreport_list->Pager->RecordCount > 0 && $ivf_semenanalysisreport_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($ivf_semenanalysisreport_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_semenanalysisreport_list->pageUrl() ?>start=<?php echo $ivf_semenanalysisreport_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_semenanalysisreport_list->pageUrl() ?>start=<?php echo $ivf_semenanalysisreport_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($ivf_semenanalysisreport_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $ivf_semenanalysisreport_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_semenanalysisreport_list->pageUrl() ?>start=<?php echo $ivf_semenanalysisreport_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_semenanalysisreport_list->pageUrl() ?>start=<?php echo $ivf_semenanalysisreport_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $ivf_semenanalysisreport_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $ivf_semenanalysisreport_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $ivf_semenanalysisreport_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->TotalRecs > 0 && (!$ivf_semenanalysisreport_list->AutoHidePageSizeSelector || $ivf_semenanalysisreport_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="ivf_semenanalysisreport">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($ivf_semenanalysisreport_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($ivf_semenanalysisreport_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($ivf_semenanalysisreport_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($ivf_semenanalysisreport_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($ivf_semenanalysisreport_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($ivf_semenanalysisreport_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($ivf_semenanalysisreport->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ivf_semenanalysisreport_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->TotalRecs == 0 && !$ivf_semenanalysisreport->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $ivf_semenanalysisreport_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$ivf_semenanalysisreport_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$ivf_semenanalysisreport->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$ivf_semenanalysisreport->isExport()) { ?>
<script>
ew.scrollableTable("gmp_ivf_semenanalysisreport", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$ivf_semenanalysisreport_list->terminate();
?>