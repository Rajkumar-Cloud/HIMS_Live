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
$ivf_outcome_list = new ivf_outcome_list();

// Run the page
$ivf_outcome_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_outcome_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$ivf_outcome->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fivf_outcomelist = currentForm = new ew.Form("fivf_outcomelist", "list");
fivf_outcomelist.formKeyCountName = '<?php echo $ivf_outcome_list->FormKeyCountName ?>';

// Form_CustomValidate event
fivf_outcomelist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_outcomelist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fivf_outcomelist.lists["x_Gestation"] = <?php echo $ivf_outcome_list->Gestation->Lookup->toClientList() ?>;
fivf_outcomelist.lists["x_Gestation"].options = <?php echo JsonEncode($ivf_outcome_list->Gestation->options(FALSE, TRUE)) ?>;
fivf_outcomelist.lists["x_Urine"] = <?php echo $ivf_outcome_list->Urine->Lookup->toClientList() ?>;
fivf_outcomelist.lists["x_Urine"].options = <?php echo JsonEncode($ivf_outcome_list->Urine->options(FALSE, TRUE)) ?>;
fivf_outcomelist.lists["x_Miscarriage"] = <?php echo $ivf_outcome_list->Miscarriage->Lookup->toClientList() ?>;
fivf_outcomelist.lists["x_Miscarriage"].options = <?php echo JsonEncode($ivf_outcome_list->Miscarriage->options(FALSE, TRUE)) ?>;
fivf_outcomelist.lists["x_Induced1"] = <?php echo $ivf_outcome_list->Induced1->Lookup->toClientList() ?>;
fivf_outcomelist.lists["x_Induced1"].options = <?php echo JsonEncode($ivf_outcome_list->Induced1->options(FALSE, TRUE)) ?>;
fivf_outcomelist.lists["x_Type"] = <?php echo $ivf_outcome_list->Type->Lookup->toClientList() ?>;
fivf_outcomelist.lists["x_Type"].options = <?php echo JsonEncode($ivf_outcome_list->Type->options(FALSE, TRUE)) ?>;
fivf_outcomelist.lists["x_FoetalDeath"] = <?php echo $ivf_outcome_list->FoetalDeath->Lookup->toClientList() ?>;
fivf_outcomelist.lists["x_FoetalDeath"].options = <?php echo JsonEncode($ivf_outcome_list->FoetalDeath->options(FALSE, TRUE)) ?>;
fivf_outcomelist.lists["x_FerinatalDeath"] = <?php echo $ivf_outcome_list->FerinatalDeath->Lookup->toClientList() ?>;
fivf_outcomelist.lists["x_FerinatalDeath"].options = <?php echo JsonEncode($ivf_outcome_list->FerinatalDeath->options(FALSE, TRUE)) ?>;
fivf_outcomelist.lists["x_Ectopic"] = <?php echo $ivf_outcome_list->Ectopic->Lookup->toClientList() ?>;
fivf_outcomelist.lists["x_Ectopic"].options = <?php echo JsonEncode($ivf_outcome_list->Ectopic->options(FALSE, TRUE)) ?>;
fivf_outcomelist.lists["x_Extra"] = <?php echo $ivf_outcome_list->Extra->Lookup->toClientList() ?>;
fivf_outcomelist.lists["x_Extra"].options = <?php echo JsonEncode($ivf_outcome_list->Extra->options(FALSE, TRUE)) ?>;

// Form object for search
var fivf_outcomelistsrch = currentSearchForm = new ew.Form("fivf_outcomelistsrch");

// Filters
fivf_outcomelistsrch.filterList = <?php echo $ivf_outcome_list->getFilterList() ?>;
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
<?php if (!$ivf_outcome->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($ivf_outcome_list->TotalRecs > 0 && $ivf_outcome_list->ExportOptions->visible()) { ?>
<?php $ivf_outcome_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_outcome_list->ImportOptions->visible()) { ?>
<?php $ivf_outcome_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_outcome_list->SearchOptions->visible()) { ?>
<?php $ivf_outcome_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_outcome_list->FilterOptions->visible()) { ?>
<?php $ivf_outcome_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$ivf_outcome->isExport() || EXPORT_MASTER_RECORD && $ivf_outcome->isExport("print")) { ?>
<?php
if ($ivf_outcome_list->DbMasterFilter <> "" && $ivf_outcome->getCurrentMasterTable() == "ivf_treatment_plan") {
	if ($ivf_outcome_list->MasterRecordExists) {
		include_once "ivf_treatment_planmaster.php";
	}
}
?>
<?php } ?>
<?php
$ivf_outcome_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$ivf_outcome->isExport() && !$ivf_outcome->CurrentAction) { ?>
<form name="fivf_outcomelistsrch" id="fivf_outcomelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($ivf_outcome_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fivf_outcomelistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="ivf_outcome">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($ivf_outcome_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($ivf_outcome_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $ivf_outcome_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($ivf_outcome_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($ivf_outcome_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($ivf_outcome_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($ivf_outcome_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $ivf_outcome_list->showPageHeader(); ?>
<?php
$ivf_outcome_list->showMessage();
?>
<?php if ($ivf_outcome_list->TotalRecs > 0 || $ivf_outcome->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($ivf_outcome_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf_outcome">
<?php if (!$ivf_outcome->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$ivf_outcome->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($ivf_outcome_list->Pager)) $ivf_outcome_list->Pager = new NumericPager($ivf_outcome_list->StartRec, $ivf_outcome_list->DisplayRecs, $ivf_outcome_list->TotalRecs, $ivf_outcome_list->RecRange, $ivf_outcome_list->AutoHidePager) ?>
<?php if ($ivf_outcome_list->Pager->RecordCount > 0 && $ivf_outcome_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($ivf_outcome_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_outcome_list->pageUrl() ?>start=<?php echo $ivf_outcome_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($ivf_outcome_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_outcome_list->pageUrl() ?>start=<?php echo $ivf_outcome_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($ivf_outcome_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $ivf_outcome_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($ivf_outcome_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_outcome_list->pageUrl() ?>start=<?php echo $ivf_outcome_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($ivf_outcome_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_outcome_list->pageUrl() ?>start=<?php echo $ivf_outcome_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($ivf_outcome_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $ivf_outcome_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $ivf_outcome_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $ivf_outcome_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($ivf_outcome_list->TotalRecs > 0 && (!$ivf_outcome_list->AutoHidePageSizeSelector || $ivf_outcome_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="ivf_outcome">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($ivf_outcome_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($ivf_outcome_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($ivf_outcome_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($ivf_outcome_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($ivf_outcome_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($ivf_outcome_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($ivf_outcome->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ivf_outcome_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fivf_outcomelist" id="fivf_outcomelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ivf_outcome_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_outcome_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_outcome">
<?php if ($ivf_outcome->getCurrentMasterTable() == "ivf_treatment_plan" && $ivf_outcome->CurrentAction) { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="ivf_treatment_plan">
<input type="hidden" name="fk_RIDNO" value="<?php echo $ivf_outcome->RIDNO->getSessionValue() ?>">
<input type="hidden" name="fk_Name" value="<?php echo $ivf_outcome->Name->getSessionValue() ?>">
<input type="hidden" name="fk_id" value="<?php echo $ivf_outcome->TidNo->getSessionValue() ?>">
<?php } ?>
<div id="gmp_ivf_outcome" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($ivf_outcome_list->TotalRecs > 0 || $ivf_outcome->isGridEdit()) { ?>
<table id="tbl_ivf_outcomelist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$ivf_outcome_list->RowType = ROWTYPE_HEADER;

// Render list options
$ivf_outcome_list->renderListOptions();

// Render list options (header, left)
$ivf_outcome_list->ListOptions->render("header", "left");
?>
<?php if ($ivf_outcome->id->Visible) { // id ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->id) == "") { ?>
		<th data-name="id" class="<?php echo $ivf_outcome->id->headerCellClass() ?>"><div id="elh_ivf_outcome_id" class="ivf_outcome_id"><div class="ew-table-header-caption"><?php echo $ivf_outcome->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $ivf_outcome->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_outcome->SortUrl($ivf_outcome->id) ?>',1);"><div id="elh_ivf_outcome_id" class="ivf_outcome_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->RIDNO->Visible) { // RIDNO ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->RIDNO) == "") { ?>
		<th data-name="RIDNO" class="<?php echo $ivf_outcome->RIDNO->headerCellClass() ?>"><div id="elh_ivf_outcome_RIDNO" class="ivf_outcome_RIDNO"><div class="ew-table-header-caption"><?php echo $ivf_outcome->RIDNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RIDNO" class="<?php echo $ivf_outcome->RIDNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_outcome->SortUrl($ivf_outcome->RIDNO) ?>',1);"><div id="elh_ivf_outcome_RIDNO" class="ivf_outcome_RIDNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->RIDNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->RIDNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->RIDNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->Name->Visible) { // Name ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->Name) == "") { ?>
		<th data-name="Name" class="<?php echo $ivf_outcome->Name->headerCellClass() ?>"><div id="elh_ivf_outcome_Name" class="ivf_outcome_Name"><div class="ew-table-header-caption"><?php echo $ivf_outcome->Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Name" class="<?php echo $ivf_outcome->Name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_outcome->SortUrl($ivf_outcome->Name) ?>',1);"><div id="elh_ivf_outcome_Name" class="ivf_outcome_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->Name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->Name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->Name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->Age->Visible) { // Age ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $ivf_outcome->Age->headerCellClass() ?>"><div id="elh_ivf_outcome_Age" class="ivf_outcome_Age"><div class="ew-table-header-caption"><?php echo $ivf_outcome->Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $ivf_outcome->Age->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_outcome->SortUrl($ivf_outcome->Age) ?>',1);"><div id="elh_ivf_outcome_Age" class="ivf_outcome_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->Age->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->Age->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->Age->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->treatment_status->Visible) { // treatment_status ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->treatment_status) == "") { ?>
		<th data-name="treatment_status" class="<?php echo $ivf_outcome->treatment_status->headerCellClass() ?>"><div id="elh_ivf_outcome_treatment_status" class="ivf_outcome_treatment_status"><div class="ew-table-header-caption"><?php echo $ivf_outcome->treatment_status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="treatment_status" class="<?php echo $ivf_outcome->treatment_status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_outcome->SortUrl($ivf_outcome->treatment_status) ?>',1);"><div id="elh_ivf_outcome_treatment_status" class="ivf_outcome_treatment_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->treatment_status->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->treatment_status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->treatment_status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->ARTCYCLE->Visible) { // ARTCYCLE ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->ARTCYCLE) == "") { ?>
		<th data-name="ARTCYCLE" class="<?php echo $ivf_outcome->ARTCYCLE->headerCellClass() ?>"><div id="elh_ivf_outcome_ARTCYCLE" class="ivf_outcome_ARTCYCLE"><div class="ew-table-header-caption"><?php echo $ivf_outcome->ARTCYCLE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ARTCYCLE" class="<?php echo $ivf_outcome->ARTCYCLE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_outcome->SortUrl($ivf_outcome->ARTCYCLE) ?>',1);"><div id="elh_ivf_outcome_ARTCYCLE" class="ivf_outcome_ARTCYCLE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->ARTCYCLE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->ARTCYCLE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->ARTCYCLE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->RESULT->Visible) { // RESULT ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->RESULT) == "") { ?>
		<th data-name="RESULT" class="<?php echo $ivf_outcome->RESULT->headerCellClass() ?>"><div id="elh_ivf_outcome_RESULT" class="ivf_outcome_RESULT"><div class="ew-table-header-caption"><?php echo $ivf_outcome->RESULT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RESULT" class="<?php echo $ivf_outcome->RESULT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_outcome->SortUrl($ivf_outcome->RESULT) ?>',1);"><div id="elh_ivf_outcome_RESULT" class="ivf_outcome_RESULT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->RESULT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->RESULT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->RESULT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->status->Visible) { // status ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->status) == "") { ?>
		<th data-name="status" class="<?php echo $ivf_outcome->status->headerCellClass() ?>"><div id="elh_ivf_outcome_status" class="ivf_outcome_status"><div class="ew-table-header-caption"><?php echo $ivf_outcome->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $ivf_outcome->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_outcome->SortUrl($ivf_outcome->status) ?>',1);"><div id="elh_ivf_outcome_status" class="ivf_outcome_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->createdby->Visible) { // createdby ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $ivf_outcome->createdby->headerCellClass() ?>"><div id="elh_ivf_outcome_createdby" class="ivf_outcome_createdby"><div class="ew-table-header-caption"><?php echo $ivf_outcome->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $ivf_outcome->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_outcome->SortUrl($ivf_outcome->createdby) ?>',1);"><div id="elh_ivf_outcome_createdby" class="ivf_outcome_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->createddatetime->Visible) { // createddatetime ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $ivf_outcome->createddatetime->headerCellClass() ?>"><div id="elh_ivf_outcome_createddatetime" class="ivf_outcome_createddatetime"><div class="ew-table-header-caption"><?php echo $ivf_outcome->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $ivf_outcome->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_outcome->SortUrl($ivf_outcome->createddatetime) ?>',1);"><div id="elh_ivf_outcome_createddatetime" class="ivf_outcome_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->modifiedby->Visible) { // modifiedby ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $ivf_outcome->modifiedby->headerCellClass() ?>"><div id="elh_ivf_outcome_modifiedby" class="ivf_outcome_modifiedby"><div class="ew-table-header-caption"><?php echo $ivf_outcome->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $ivf_outcome->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_outcome->SortUrl($ivf_outcome->modifiedby) ?>',1);"><div id="elh_ivf_outcome_modifiedby" class="ivf_outcome_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $ivf_outcome->modifieddatetime->headerCellClass() ?>"><div id="elh_ivf_outcome_modifieddatetime" class="ivf_outcome_modifieddatetime"><div class="ew-table-header-caption"><?php echo $ivf_outcome->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $ivf_outcome->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_outcome->SortUrl($ivf_outcome->modifieddatetime) ?>',1);"><div id="elh_ivf_outcome_modifieddatetime" class="ivf_outcome_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->outcomeDate->Visible) { // outcomeDate ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->outcomeDate) == "") { ?>
		<th data-name="outcomeDate" class="<?php echo $ivf_outcome->outcomeDate->headerCellClass() ?>"><div id="elh_ivf_outcome_outcomeDate" class="ivf_outcome_outcomeDate"><div class="ew-table-header-caption"><?php echo $ivf_outcome->outcomeDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="outcomeDate" class="<?php echo $ivf_outcome->outcomeDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_outcome->SortUrl($ivf_outcome->outcomeDate) ?>',1);"><div id="elh_ivf_outcome_outcomeDate" class="ivf_outcome_outcomeDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->outcomeDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->outcomeDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->outcomeDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->outcomeDay->Visible) { // outcomeDay ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->outcomeDay) == "") { ?>
		<th data-name="outcomeDay" class="<?php echo $ivf_outcome->outcomeDay->headerCellClass() ?>"><div id="elh_ivf_outcome_outcomeDay" class="ivf_outcome_outcomeDay"><div class="ew-table-header-caption"><?php echo $ivf_outcome->outcomeDay->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="outcomeDay" class="<?php echo $ivf_outcome->outcomeDay->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_outcome->SortUrl($ivf_outcome->outcomeDay) ?>',1);"><div id="elh_ivf_outcome_outcomeDay" class="ivf_outcome_outcomeDay">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->outcomeDay->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->outcomeDay->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->outcomeDay->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->OPResult->Visible) { // OPResult ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->OPResult) == "") { ?>
		<th data-name="OPResult" class="<?php echo $ivf_outcome->OPResult->headerCellClass() ?>"><div id="elh_ivf_outcome_OPResult" class="ivf_outcome_OPResult"><div class="ew-table-header-caption"><?php echo $ivf_outcome->OPResult->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OPResult" class="<?php echo $ivf_outcome->OPResult->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_outcome->SortUrl($ivf_outcome->OPResult) ?>',1);"><div id="elh_ivf_outcome_OPResult" class="ivf_outcome_OPResult">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->OPResult->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->OPResult->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->OPResult->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->Gestation->Visible) { // Gestation ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->Gestation) == "") { ?>
		<th data-name="Gestation" class="<?php echo $ivf_outcome->Gestation->headerCellClass() ?>"><div id="elh_ivf_outcome_Gestation" class="ivf_outcome_Gestation"><div class="ew-table-header-caption"><?php echo $ivf_outcome->Gestation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gestation" class="<?php echo $ivf_outcome->Gestation->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_outcome->SortUrl($ivf_outcome->Gestation) ?>',1);"><div id="elh_ivf_outcome_Gestation" class="ivf_outcome_Gestation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->Gestation->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->Gestation->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->Gestation->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->TransferdEmbryos->Visible) { // TransferdEmbryos ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->TransferdEmbryos) == "") { ?>
		<th data-name="TransferdEmbryos" class="<?php echo $ivf_outcome->TransferdEmbryos->headerCellClass() ?>"><div id="elh_ivf_outcome_TransferdEmbryos" class="ivf_outcome_TransferdEmbryos"><div class="ew-table-header-caption"><?php echo $ivf_outcome->TransferdEmbryos->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TransferdEmbryos" class="<?php echo $ivf_outcome->TransferdEmbryos->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_outcome->SortUrl($ivf_outcome->TransferdEmbryos) ?>',1);"><div id="elh_ivf_outcome_TransferdEmbryos" class="ivf_outcome_TransferdEmbryos">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->TransferdEmbryos->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->TransferdEmbryos->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->TransferdEmbryos->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->InitalOfSacs->Visible) { // InitalOfSacs ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->InitalOfSacs) == "") { ?>
		<th data-name="InitalOfSacs" class="<?php echo $ivf_outcome->InitalOfSacs->headerCellClass() ?>"><div id="elh_ivf_outcome_InitalOfSacs" class="ivf_outcome_InitalOfSacs"><div class="ew-table-header-caption"><?php echo $ivf_outcome->InitalOfSacs->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="InitalOfSacs" class="<?php echo $ivf_outcome->InitalOfSacs->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_outcome->SortUrl($ivf_outcome->InitalOfSacs) ?>',1);"><div id="elh_ivf_outcome_InitalOfSacs" class="ivf_outcome_InitalOfSacs">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->InitalOfSacs->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->InitalOfSacs->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->InitalOfSacs->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->ImplimentationRate->Visible) { // ImplimentationRate ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->ImplimentationRate) == "") { ?>
		<th data-name="ImplimentationRate" class="<?php echo $ivf_outcome->ImplimentationRate->headerCellClass() ?>"><div id="elh_ivf_outcome_ImplimentationRate" class="ivf_outcome_ImplimentationRate"><div class="ew-table-header-caption"><?php echo $ivf_outcome->ImplimentationRate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ImplimentationRate" class="<?php echo $ivf_outcome->ImplimentationRate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_outcome->SortUrl($ivf_outcome->ImplimentationRate) ?>',1);"><div id="elh_ivf_outcome_ImplimentationRate" class="ivf_outcome_ImplimentationRate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->ImplimentationRate->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->ImplimentationRate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->ImplimentationRate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->EmbryoNo->Visible) { // EmbryoNo ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->EmbryoNo) == "") { ?>
		<th data-name="EmbryoNo" class="<?php echo $ivf_outcome->EmbryoNo->headerCellClass() ?>"><div id="elh_ivf_outcome_EmbryoNo" class="ivf_outcome_EmbryoNo"><div class="ew-table-header-caption"><?php echo $ivf_outcome->EmbryoNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EmbryoNo" class="<?php echo $ivf_outcome->EmbryoNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_outcome->SortUrl($ivf_outcome->EmbryoNo) ?>',1);"><div id="elh_ivf_outcome_EmbryoNo" class="ivf_outcome_EmbryoNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->EmbryoNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->EmbryoNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->EmbryoNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->ExtrauterineSac->Visible) { // ExtrauterineSac ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->ExtrauterineSac) == "") { ?>
		<th data-name="ExtrauterineSac" class="<?php echo $ivf_outcome->ExtrauterineSac->headerCellClass() ?>"><div id="elh_ivf_outcome_ExtrauterineSac" class="ivf_outcome_ExtrauterineSac"><div class="ew-table-header-caption"><?php echo $ivf_outcome->ExtrauterineSac->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ExtrauterineSac" class="<?php echo $ivf_outcome->ExtrauterineSac->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_outcome->SortUrl($ivf_outcome->ExtrauterineSac) ?>',1);"><div id="elh_ivf_outcome_ExtrauterineSac" class="ivf_outcome_ExtrauterineSac">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->ExtrauterineSac->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->ExtrauterineSac->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->ExtrauterineSac->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->PregnancyMonozygotic->Visible) { // PregnancyMonozygotic ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->PregnancyMonozygotic) == "") { ?>
		<th data-name="PregnancyMonozygotic" class="<?php echo $ivf_outcome->PregnancyMonozygotic->headerCellClass() ?>"><div id="elh_ivf_outcome_PregnancyMonozygotic" class="ivf_outcome_PregnancyMonozygotic"><div class="ew-table-header-caption"><?php echo $ivf_outcome->PregnancyMonozygotic->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PregnancyMonozygotic" class="<?php echo $ivf_outcome->PregnancyMonozygotic->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_outcome->SortUrl($ivf_outcome->PregnancyMonozygotic) ?>',1);"><div id="elh_ivf_outcome_PregnancyMonozygotic" class="ivf_outcome_PregnancyMonozygotic">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->PregnancyMonozygotic->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->PregnancyMonozygotic->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->PregnancyMonozygotic->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->TypeGestation->Visible) { // TypeGestation ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->TypeGestation) == "") { ?>
		<th data-name="TypeGestation" class="<?php echo $ivf_outcome->TypeGestation->headerCellClass() ?>"><div id="elh_ivf_outcome_TypeGestation" class="ivf_outcome_TypeGestation"><div class="ew-table-header-caption"><?php echo $ivf_outcome->TypeGestation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TypeGestation" class="<?php echo $ivf_outcome->TypeGestation->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_outcome->SortUrl($ivf_outcome->TypeGestation) ?>',1);"><div id="elh_ivf_outcome_TypeGestation" class="ivf_outcome_TypeGestation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->TypeGestation->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->TypeGestation->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->TypeGestation->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->Urine->Visible) { // Urine ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->Urine) == "") { ?>
		<th data-name="Urine" class="<?php echo $ivf_outcome->Urine->headerCellClass() ?>"><div id="elh_ivf_outcome_Urine" class="ivf_outcome_Urine"><div class="ew-table-header-caption"><?php echo $ivf_outcome->Urine->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Urine" class="<?php echo $ivf_outcome->Urine->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_outcome->SortUrl($ivf_outcome->Urine) ?>',1);"><div id="elh_ivf_outcome_Urine" class="ivf_outcome_Urine">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->Urine->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->Urine->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->Urine->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->PTdate->Visible) { // PTdate ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->PTdate) == "") { ?>
		<th data-name="PTdate" class="<?php echo $ivf_outcome->PTdate->headerCellClass() ?>"><div id="elh_ivf_outcome_PTdate" class="ivf_outcome_PTdate"><div class="ew-table-header-caption"><?php echo $ivf_outcome->PTdate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PTdate" class="<?php echo $ivf_outcome->PTdate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_outcome->SortUrl($ivf_outcome->PTdate) ?>',1);"><div id="elh_ivf_outcome_PTdate" class="ivf_outcome_PTdate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->PTdate->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->PTdate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->PTdate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->Reduced->Visible) { // Reduced ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->Reduced) == "") { ?>
		<th data-name="Reduced" class="<?php echo $ivf_outcome->Reduced->headerCellClass() ?>"><div id="elh_ivf_outcome_Reduced" class="ivf_outcome_Reduced"><div class="ew-table-header-caption"><?php echo $ivf_outcome->Reduced->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Reduced" class="<?php echo $ivf_outcome->Reduced->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_outcome->SortUrl($ivf_outcome->Reduced) ?>',1);"><div id="elh_ivf_outcome_Reduced" class="ivf_outcome_Reduced">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->Reduced->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->Reduced->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->Reduced->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->INduced->Visible) { // INduced ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->INduced) == "") { ?>
		<th data-name="INduced" class="<?php echo $ivf_outcome->INduced->headerCellClass() ?>"><div id="elh_ivf_outcome_INduced" class="ivf_outcome_INduced"><div class="ew-table-header-caption"><?php echo $ivf_outcome->INduced->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="INduced" class="<?php echo $ivf_outcome->INduced->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_outcome->SortUrl($ivf_outcome->INduced) ?>',1);"><div id="elh_ivf_outcome_INduced" class="ivf_outcome_INduced">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->INduced->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->INduced->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->INduced->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->INducedDate->Visible) { // INducedDate ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->INducedDate) == "") { ?>
		<th data-name="INducedDate" class="<?php echo $ivf_outcome->INducedDate->headerCellClass() ?>"><div id="elh_ivf_outcome_INducedDate" class="ivf_outcome_INducedDate"><div class="ew-table-header-caption"><?php echo $ivf_outcome->INducedDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="INducedDate" class="<?php echo $ivf_outcome->INducedDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_outcome->SortUrl($ivf_outcome->INducedDate) ?>',1);"><div id="elh_ivf_outcome_INducedDate" class="ivf_outcome_INducedDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->INducedDate->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->INducedDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->INducedDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->Miscarriage->Visible) { // Miscarriage ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->Miscarriage) == "") { ?>
		<th data-name="Miscarriage" class="<?php echo $ivf_outcome->Miscarriage->headerCellClass() ?>"><div id="elh_ivf_outcome_Miscarriage" class="ivf_outcome_Miscarriage"><div class="ew-table-header-caption"><?php echo $ivf_outcome->Miscarriage->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Miscarriage" class="<?php echo $ivf_outcome->Miscarriage->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_outcome->SortUrl($ivf_outcome->Miscarriage) ?>',1);"><div id="elh_ivf_outcome_Miscarriage" class="ivf_outcome_Miscarriage">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->Miscarriage->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->Miscarriage->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->Miscarriage->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->Induced1->Visible) { // Induced1 ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->Induced1) == "") { ?>
		<th data-name="Induced1" class="<?php echo $ivf_outcome->Induced1->headerCellClass() ?>"><div id="elh_ivf_outcome_Induced1" class="ivf_outcome_Induced1"><div class="ew-table-header-caption"><?php echo $ivf_outcome->Induced1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Induced1" class="<?php echo $ivf_outcome->Induced1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_outcome->SortUrl($ivf_outcome->Induced1) ?>',1);"><div id="elh_ivf_outcome_Induced1" class="ivf_outcome_Induced1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->Induced1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->Induced1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->Induced1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->Type->Visible) { // Type ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->Type) == "") { ?>
		<th data-name="Type" class="<?php echo $ivf_outcome->Type->headerCellClass() ?>"><div id="elh_ivf_outcome_Type" class="ivf_outcome_Type"><div class="ew-table-header-caption"><?php echo $ivf_outcome->Type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Type" class="<?php echo $ivf_outcome->Type->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_outcome->SortUrl($ivf_outcome->Type) ?>',1);"><div id="elh_ivf_outcome_Type" class="ivf_outcome_Type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->Type->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->Type->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->Type->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->IfClinical->Visible) { // IfClinical ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->IfClinical) == "") { ?>
		<th data-name="IfClinical" class="<?php echo $ivf_outcome->IfClinical->headerCellClass() ?>"><div id="elh_ivf_outcome_IfClinical" class="ivf_outcome_IfClinical"><div class="ew-table-header-caption"><?php echo $ivf_outcome->IfClinical->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IfClinical" class="<?php echo $ivf_outcome->IfClinical->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_outcome->SortUrl($ivf_outcome->IfClinical) ?>',1);"><div id="elh_ivf_outcome_IfClinical" class="ivf_outcome_IfClinical">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->IfClinical->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->IfClinical->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->IfClinical->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->GADate->Visible) { // GADate ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->GADate) == "") { ?>
		<th data-name="GADate" class="<?php echo $ivf_outcome->GADate->headerCellClass() ?>"><div id="elh_ivf_outcome_GADate" class="ivf_outcome_GADate"><div class="ew-table-header-caption"><?php echo $ivf_outcome->GADate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GADate" class="<?php echo $ivf_outcome->GADate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_outcome->SortUrl($ivf_outcome->GADate) ?>',1);"><div id="elh_ivf_outcome_GADate" class="ivf_outcome_GADate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->GADate->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->GADate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->GADate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->GA->Visible) { // GA ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->GA) == "") { ?>
		<th data-name="GA" class="<?php echo $ivf_outcome->GA->headerCellClass() ?>"><div id="elh_ivf_outcome_GA" class="ivf_outcome_GA"><div class="ew-table-header-caption"><?php echo $ivf_outcome->GA->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GA" class="<?php echo $ivf_outcome->GA->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_outcome->SortUrl($ivf_outcome->GA) ?>',1);"><div id="elh_ivf_outcome_GA" class="ivf_outcome_GA">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->GA->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->GA->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->GA->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->FoetalDeath->Visible) { // FoetalDeath ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->FoetalDeath) == "") { ?>
		<th data-name="FoetalDeath" class="<?php echo $ivf_outcome->FoetalDeath->headerCellClass() ?>"><div id="elh_ivf_outcome_FoetalDeath" class="ivf_outcome_FoetalDeath"><div class="ew-table-header-caption"><?php echo $ivf_outcome->FoetalDeath->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FoetalDeath" class="<?php echo $ivf_outcome->FoetalDeath->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_outcome->SortUrl($ivf_outcome->FoetalDeath) ?>',1);"><div id="elh_ivf_outcome_FoetalDeath" class="ivf_outcome_FoetalDeath">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->FoetalDeath->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->FoetalDeath->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->FoetalDeath->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->FerinatalDeath->Visible) { // FerinatalDeath ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->FerinatalDeath) == "") { ?>
		<th data-name="FerinatalDeath" class="<?php echo $ivf_outcome->FerinatalDeath->headerCellClass() ?>"><div id="elh_ivf_outcome_FerinatalDeath" class="ivf_outcome_FerinatalDeath"><div class="ew-table-header-caption"><?php echo $ivf_outcome->FerinatalDeath->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FerinatalDeath" class="<?php echo $ivf_outcome->FerinatalDeath->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_outcome->SortUrl($ivf_outcome->FerinatalDeath) ?>',1);"><div id="elh_ivf_outcome_FerinatalDeath" class="ivf_outcome_FerinatalDeath">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->FerinatalDeath->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->FerinatalDeath->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->FerinatalDeath->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->TidNo->Visible) { // TidNo ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->TidNo) == "") { ?>
		<th data-name="TidNo" class="<?php echo $ivf_outcome->TidNo->headerCellClass() ?>"><div id="elh_ivf_outcome_TidNo" class="ivf_outcome_TidNo"><div class="ew-table-header-caption"><?php echo $ivf_outcome->TidNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TidNo" class="<?php echo $ivf_outcome->TidNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_outcome->SortUrl($ivf_outcome->TidNo) ?>',1);"><div id="elh_ivf_outcome_TidNo" class="ivf_outcome_TidNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->TidNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->TidNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->TidNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->Ectopic->Visible) { // Ectopic ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->Ectopic) == "") { ?>
		<th data-name="Ectopic" class="<?php echo $ivf_outcome->Ectopic->headerCellClass() ?>"><div id="elh_ivf_outcome_Ectopic" class="ivf_outcome_Ectopic"><div class="ew-table-header-caption"><?php echo $ivf_outcome->Ectopic->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Ectopic" class="<?php echo $ivf_outcome->Ectopic->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_outcome->SortUrl($ivf_outcome->Ectopic) ?>',1);"><div id="elh_ivf_outcome_Ectopic" class="ivf_outcome_Ectopic">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->Ectopic->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->Ectopic->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->Ectopic->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->Extra->Visible) { // Extra ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->Extra) == "") { ?>
		<th data-name="Extra" class="<?php echo $ivf_outcome->Extra->headerCellClass() ?>"><div id="elh_ivf_outcome_Extra" class="ivf_outcome_Extra"><div class="ew-table-header-caption"><?php echo $ivf_outcome->Extra->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Extra" class="<?php echo $ivf_outcome->Extra->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_outcome->SortUrl($ivf_outcome->Extra) ?>',1);"><div id="elh_ivf_outcome_Extra" class="ivf_outcome_Extra">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->Extra->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->Extra->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->Extra->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->Implantation->Visible) { // Implantation ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->Implantation) == "") { ?>
		<th data-name="Implantation" class="<?php echo $ivf_outcome->Implantation->headerCellClass() ?>"><div id="elh_ivf_outcome_Implantation" class="ivf_outcome_Implantation"><div class="ew-table-header-caption"><?php echo $ivf_outcome->Implantation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Implantation" class="<?php echo $ivf_outcome->Implantation->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_outcome->SortUrl($ivf_outcome->Implantation) ?>',1);"><div id="elh_ivf_outcome_Implantation" class="ivf_outcome_Implantation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->Implantation->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->Implantation->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->Implantation->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome->DeliveryDate->Visible) { // DeliveryDate ?>
	<?php if ($ivf_outcome->sortUrl($ivf_outcome->DeliveryDate) == "") { ?>
		<th data-name="DeliveryDate" class="<?php echo $ivf_outcome->DeliveryDate->headerCellClass() ?>"><div id="elh_ivf_outcome_DeliveryDate" class="ivf_outcome_DeliveryDate"><div class="ew-table-header-caption"><?php echo $ivf_outcome->DeliveryDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DeliveryDate" class="<?php echo $ivf_outcome->DeliveryDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_outcome->SortUrl($ivf_outcome->DeliveryDate) ?>',1);"><div id="elh_ivf_outcome_DeliveryDate" class="ivf_outcome_DeliveryDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome->DeliveryDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome->DeliveryDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_outcome->DeliveryDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$ivf_outcome_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($ivf_outcome->ExportAll && $ivf_outcome->isExport()) {
	$ivf_outcome_list->StopRec = $ivf_outcome_list->TotalRecs;
} else {

	// Set the last record to display
	if ($ivf_outcome_list->TotalRecs > $ivf_outcome_list->StartRec + $ivf_outcome_list->DisplayRecs - 1)
		$ivf_outcome_list->StopRec = $ivf_outcome_list->StartRec + $ivf_outcome_list->DisplayRecs - 1;
	else
		$ivf_outcome_list->StopRec = $ivf_outcome_list->TotalRecs;
}
$ivf_outcome_list->RecCnt = $ivf_outcome_list->StartRec - 1;
if ($ivf_outcome_list->Recordset && !$ivf_outcome_list->Recordset->EOF) {
	$ivf_outcome_list->Recordset->moveFirst();
	$selectLimit = $ivf_outcome_list->UseSelectLimit;
	if (!$selectLimit && $ivf_outcome_list->StartRec > 1)
		$ivf_outcome_list->Recordset->move($ivf_outcome_list->StartRec - 1);
} elseif (!$ivf_outcome->AllowAddDeleteRow && $ivf_outcome_list->StopRec == 0) {
	$ivf_outcome_list->StopRec = $ivf_outcome->GridAddRowCount;
}

// Initialize aggregate
$ivf_outcome->RowType = ROWTYPE_AGGREGATEINIT;
$ivf_outcome->resetAttributes();
$ivf_outcome_list->renderRow();
while ($ivf_outcome_list->RecCnt < $ivf_outcome_list->StopRec) {
	$ivf_outcome_list->RecCnt++;
	if ($ivf_outcome_list->RecCnt >= $ivf_outcome_list->StartRec) {
		$ivf_outcome_list->RowCnt++;

		// Set up key count
		$ivf_outcome_list->KeyCount = $ivf_outcome_list->RowIndex;

		// Init row class and style
		$ivf_outcome->resetAttributes();
		$ivf_outcome->CssClass = "";
		if ($ivf_outcome->isGridAdd()) {
		} else {
			$ivf_outcome_list->loadRowValues($ivf_outcome_list->Recordset); // Load row values
		}
		$ivf_outcome->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$ivf_outcome->RowAttrs = array_merge($ivf_outcome->RowAttrs, array('data-rowindex'=>$ivf_outcome_list->RowCnt, 'id'=>'r' . $ivf_outcome_list->RowCnt . '_ivf_outcome', 'data-rowtype'=>$ivf_outcome->RowType));

		// Render row
		$ivf_outcome_list->renderRow();

		// Render list options
		$ivf_outcome_list->renderListOptions();
?>
	<tr<?php echo $ivf_outcome->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_outcome_list->ListOptions->render("body", "left", $ivf_outcome_list->RowCnt);
?>
	<?php if ($ivf_outcome->id->Visible) { // id ?>
		<td data-name="id"<?php echo $ivf_outcome->id->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCnt ?>_ivf_outcome_id" class="ivf_outcome_id">
<span<?php echo $ivf_outcome->id->viewAttributes() ?>>
<?php echo $ivf_outcome->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->RIDNO->Visible) { // RIDNO ?>
		<td data-name="RIDNO"<?php echo $ivf_outcome->RIDNO->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCnt ?>_ivf_outcome_RIDNO" class="ivf_outcome_RIDNO">
<span<?php echo $ivf_outcome->RIDNO->viewAttributes() ?>>
<?php echo $ivf_outcome->RIDNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->Name->Visible) { // Name ?>
		<td data-name="Name"<?php echo $ivf_outcome->Name->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCnt ?>_ivf_outcome_Name" class="ivf_outcome_Name">
<span<?php echo $ivf_outcome->Name->viewAttributes() ?>>
<?php echo $ivf_outcome->Name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->Age->Visible) { // Age ?>
		<td data-name="Age"<?php echo $ivf_outcome->Age->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCnt ?>_ivf_outcome_Age" class="ivf_outcome_Age">
<span<?php echo $ivf_outcome->Age->viewAttributes() ?>>
<?php echo $ivf_outcome->Age->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->treatment_status->Visible) { // treatment_status ?>
		<td data-name="treatment_status"<?php echo $ivf_outcome->treatment_status->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCnt ?>_ivf_outcome_treatment_status" class="ivf_outcome_treatment_status">
<span<?php echo $ivf_outcome->treatment_status->viewAttributes() ?>>
<?php echo $ivf_outcome->treatment_status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->ARTCYCLE->Visible) { // ARTCYCLE ?>
		<td data-name="ARTCYCLE"<?php echo $ivf_outcome->ARTCYCLE->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCnt ?>_ivf_outcome_ARTCYCLE" class="ivf_outcome_ARTCYCLE">
<span<?php echo $ivf_outcome->ARTCYCLE->viewAttributes() ?>>
<?php echo $ivf_outcome->ARTCYCLE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->RESULT->Visible) { // RESULT ?>
		<td data-name="RESULT"<?php echo $ivf_outcome->RESULT->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCnt ?>_ivf_outcome_RESULT" class="ivf_outcome_RESULT">
<span<?php echo $ivf_outcome->RESULT->viewAttributes() ?>>
<?php echo $ivf_outcome->RESULT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->status->Visible) { // status ?>
		<td data-name="status"<?php echo $ivf_outcome->status->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCnt ?>_ivf_outcome_status" class="ivf_outcome_status">
<span<?php echo $ivf_outcome->status->viewAttributes() ?>>
<?php echo $ivf_outcome->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $ivf_outcome->createdby->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCnt ?>_ivf_outcome_createdby" class="ivf_outcome_createdby">
<span<?php echo $ivf_outcome->createdby->viewAttributes() ?>>
<?php echo $ivf_outcome->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $ivf_outcome->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCnt ?>_ivf_outcome_createddatetime" class="ivf_outcome_createddatetime">
<span<?php echo $ivf_outcome->createddatetime->viewAttributes() ?>>
<?php echo $ivf_outcome->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $ivf_outcome->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCnt ?>_ivf_outcome_modifiedby" class="ivf_outcome_modifiedby">
<span<?php echo $ivf_outcome->modifiedby->viewAttributes() ?>>
<?php echo $ivf_outcome->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $ivf_outcome->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCnt ?>_ivf_outcome_modifieddatetime" class="ivf_outcome_modifieddatetime">
<span<?php echo $ivf_outcome->modifieddatetime->viewAttributes() ?>>
<?php echo $ivf_outcome->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->outcomeDate->Visible) { // outcomeDate ?>
		<td data-name="outcomeDate"<?php echo $ivf_outcome->outcomeDate->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCnt ?>_ivf_outcome_outcomeDate" class="ivf_outcome_outcomeDate">
<span<?php echo $ivf_outcome->outcomeDate->viewAttributes() ?>>
<?php echo $ivf_outcome->outcomeDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->outcomeDay->Visible) { // outcomeDay ?>
		<td data-name="outcomeDay"<?php echo $ivf_outcome->outcomeDay->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCnt ?>_ivf_outcome_outcomeDay" class="ivf_outcome_outcomeDay">
<span<?php echo $ivf_outcome->outcomeDay->viewAttributes() ?>>
<?php echo $ivf_outcome->outcomeDay->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->OPResult->Visible) { // OPResult ?>
		<td data-name="OPResult"<?php echo $ivf_outcome->OPResult->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCnt ?>_ivf_outcome_OPResult" class="ivf_outcome_OPResult">
<span<?php echo $ivf_outcome->OPResult->viewAttributes() ?>>
<?php echo $ivf_outcome->OPResult->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->Gestation->Visible) { // Gestation ?>
		<td data-name="Gestation"<?php echo $ivf_outcome->Gestation->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCnt ?>_ivf_outcome_Gestation" class="ivf_outcome_Gestation">
<span<?php echo $ivf_outcome->Gestation->viewAttributes() ?>>
<?php echo $ivf_outcome->Gestation->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->TransferdEmbryos->Visible) { // TransferdEmbryos ?>
		<td data-name="TransferdEmbryos"<?php echo $ivf_outcome->TransferdEmbryos->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCnt ?>_ivf_outcome_TransferdEmbryos" class="ivf_outcome_TransferdEmbryos">
<span<?php echo $ivf_outcome->TransferdEmbryos->viewAttributes() ?>>
<?php echo $ivf_outcome->TransferdEmbryos->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->InitalOfSacs->Visible) { // InitalOfSacs ?>
		<td data-name="InitalOfSacs"<?php echo $ivf_outcome->InitalOfSacs->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCnt ?>_ivf_outcome_InitalOfSacs" class="ivf_outcome_InitalOfSacs">
<span<?php echo $ivf_outcome->InitalOfSacs->viewAttributes() ?>>
<?php echo $ivf_outcome->InitalOfSacs->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->ImplimentationRate->Visible) { // ImplimentationRate ?>
		<td data-name="ImplimentationRate"<?php echo $ivf_outcome->ImplimentationRate->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCnt ?>_ivf_outcome_ImplimentationRate" class="ivf_outcome_ImplimentationRate">
<span<?php echo $ivf_outcome->ImplimentationRate->viewAttributes() ?>>
<?php echo $ivf_outcome->ImplimentationRate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->EmbryoNo->Visible) { // EmbryoNo ?>
		<td data-name="EmbryoNo"<?php echo $ivf_outcome->EmbryoNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCnt ?>_ivf_outcome_EmbryoNo" class="ivf_outcome_EmbryoNo">
<span<?php echo $ivf_outcome->EmbryoNo->viewAttributes() ?>>
<?php echo $ivf_outcome->EmbryoNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->ExtrauterineSac->Visible) { // ExtrauterineSac ?>
		<td data-name="ExtrauterineSac"<?php echo $ivf_outcome->ExtrauterineSac->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCnt ?>_ivf_outcome_ExtrauterineSac" class="ivf_outcome_ExtrauterineSac">
<span<?php echo $ivf_outcome->ExtrauterineSac->viewAttributes() ?>>
<?php echo $ivf_outcome->ExtrauterineSac->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->PregnancyMonozygotic->Visible) { // PregnancyMonozygotic ?>
		<td data-name="PregnancyMonozygotic"<?php echo $ivf_outcome->PregnancyMonozygotic->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCnt ?>_ivf_outcome_PregnancyMonozygotic" class="ivf_outcome_PregnancyMonozygotic">
<span<?php echo $ivf_outcome->PregnancyMonozygotic->viewAttributes() ?>>
<?php echo $ivf_outcome->PregnancyMonozygotic->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->TypeGestation->Visible) { // TypeGestation ?>
		<td data-name="TypeGestation"<?php echo $ivf_outcome->TypeGestation->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCnt ?>_ivf_outcome_TypeGestation" class="ivf_outcome_TypeGestation">
<span<?php echo $ivf_outcome->TypeGestation->viewAttributes() ?>>
<?php echo $ivf_outcome->TypeGestation->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->Urine->Visible) { // Urine ?>
		<td data-name="Urine"<?php echo $ivf_outcome->Urine->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCnt ?>_ivf_outcome_Urine" class="ivf_outcome_Urine">
<span<?php echo $ivf_outcome->Urine->viewAttributes() ?>>
<?php echo $ivf_outcome->Urine->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->PTdate->Visible) { // PTdate ?>
		<td data-name="PTdate"<?php echo $ivf_outcome->PTdate->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCnt ?>_ivf_outcome_PTdate" class="ivf_outcome_PTdate">
<span<?php echo $ivf_outcome->PTdate->viewAttributes() ?>>
<?php echo $ivf_outcome->PTdate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->Reduced->Visible) { // Reduced ?>
		<td data-name="Reduced"<?php echo $ivf_outcome->Reduced->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCnt ?>_ivf_outcome_Reduced" class="ivf_outcome_Reduced">
<span<?php echo $ivf_outcome->Reduced->viewAttributes() ?>>
<?php echo $ivf_outcome->Reduced->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->INduced->Visible) { // INduced ?>
		<td data-name="INduced"<?php echo $ivf_outcome->INduced->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCnt ?>_ivf_outcome_INduced" class="ivf_outcome_INduced">
<span<?php echo $ivf_outcome->INduced->viewAttributes() ?>>
<?php echo $ivf_outcome->INduced->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->INducedDate->Visible) { // INducedDate ?>
		<td data-name="INducedDate"<?php echo $ivf_outcome->INducedDate->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCnt ?>_ivf_outcome_INducedDate" class="ivf_outcome_INducedDate">
<span<?php echo $ivf_outcome->INducedDate->viewAttributes() ?>>
<?php echo $ivf_outcome->INducedDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->Miscarriage->Visible) { // Miscarriage ?>
		<td data-name="Miscarriage"<?php echo $ivf_outcome->Miscarriage->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCnt ?>_ivf_outcome_Miscarriage" class="ivf_outcome_Miscarriage">
<span<?php echo $ivf_outcome->Miscarriage->viewAttributes() ?>>
<?php echo $ivf_outcome->Miscarriage->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->Induced1->Visible) { // Induced1 ?>
		<td data-name="Induced1"<?php echo $ivf_outcome->Induced1->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCnt ?>_ivf_outcome_Induced1" class="ivf_outcome_Induced1">
<span<?php echo $ivf_outcome->Induced1->viewAttributes() ?>>
<?php echo $ivf_outcome->Induced1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->Type->Visible) { // Type ?>
		<td data-name="Type"<?php echo $ivf_outcome->Type->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCnt ?>_ivf_outcome_Type" class="ivf_outcome_Type">
<span<?php echo $ivf_outcome->Type->viewAttributes() ?>>
<?php echo $ivf_outcome->Type->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->IfClinical->Visible) { // IfClinical ?>
		<td data-name="IfClinical"<?php echo $ivf_outcome->IfClinical->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCnt ?>_ivf_outcome_IfClinical" class="ivf_outcome_IfClinical">
<span<?php echo $ivf_outcome->IfClinical->viewAttributes() ?>>
<?php echo $ivf_outcome->IfClinical->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->GADate->Visible) { // GADate ?>
		<td data-name="GADate"<?php echo $ivf_outcome->GADate->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCnt ?>_ivf_outcome_GADate" class="ivf_outcome_GADate">
<span<?php echo $ivf_outcome->GADate->viewAttributes() ?>>
<?php echo $ivf_outcome->GADate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->GA->Visible) { // GA ?>
		<td data-name="GA"<?php echo $ivf_outcome->GA->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCnt ?>_ivf_outcome_GA" class="ivf_outcome_GA">
<span<?php echo $ivf_outcome->GA->viewAttributes() ?>>
<?php echo $ivf_outcome->GA->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->FoetalDeath->Visible) { // FoetalDeath ?>
		<td data-name="FoetalDeath"<?php echo $ivf_outcome->FoetalDeath->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCnt ?>_ivf_outcome_FoetalDeath" class="ivf_outcome_FoetalDeath">
<span<?php echo $ivf_outcome->FoetalDeath->viewAttributes() ?>>
<?php echo $ivf_outcome->FoetalDeath->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->FerinatalDeath->Visible) { // FerinatalDeath ?>
		<td data-name="FerinatalDeath"<?php echo $ivf_outcome->FerinatalDeath->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCnt ?>_ivf_outcome_FerinatalDeath" class="ivf_outcome_FerinatalDeath">
<span<?php echo $ivf_outcome->FerinatalDeath->viewAttributes() ?>>
<?php echo $ivf_outcome->FerinatalDeath->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo"<?php echo $ivf_outcome->TidNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCnt ?>_ivf_outcome_TidNo" class="ivf_outcome_TidNo">
<span<?php echo $ivf_outcome->TidNo->viewAttributes() ?>>
<?php echo $ivf_outcome->TidNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->Ectopic->Visible) { // Ectopic ?>
		<td data-name="Ectopic"<?php echo $ivf_outcome->Ectopic->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCnt ?>_ivf_outcome_Ectopic" class="ivf_outcome_Ectopic">
<span<?php echo $ivf_outcome->Ectopic->viewAttributes() ?>>
<?php echo $ivf_outcome->Ectopic->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->Extra->Visible) { // Extra ?>
		<td data-name="Extra"<?php echo $ivf_outcome->Extra->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCnt ?>_ivf_outcome_Extra" class="ivf_outcome_Extra">
<span<?php echo $ivf_outcome->Extra->viewAttributes() ?>>
<?php echo $ivf_outcome->Extra->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->Implantation->Visible) { // Implantation ?>
		<td data-name="Implantation"<?php echo $ivf_outcome->Implantation->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCnt ?>_ivf_outcome_Implantation" class="ivf_outcome_Implantation">
<span<?php echo $ivf_outcome->Implantation->viewAttributes() ?>>
<?php echo $ivf_outcome->Implantation->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome->DeliveryDate->Visible) { // DeliveryDate ?>
		<td data-name="DeliveryDate"<?php echo $ivf_outcome->DeliveryDate->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCnt ?>_ivf_outcome_DeliveryDate" class="ivf_outcome_DeliveryDate">
<span<?php echo $ivf_outcome->DeliveryDate->viewAttributes() ?>>
<?php echo $ivf_outcome->DeliveryDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_outcome_list->ListOptions->render("body", "right", $ivf_outcome_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$ivf_outcome->isGridAdd())
		$ivf_outcome_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$ivf_outcome->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($ivf_outcome_list->Recordset)
	$ivf_outcome_list->Recordset->Close();
?>
<?php if (!$ivf_outcome->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$ivf_outcome->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($ivf_outcome_list->Pager)) $ivf_outcome_list->Pager = new NumericPager($ivf_outcome_list->StartRec, $ivf_outcome_list->DisplayRecs, $ivf_outcome_list->TotalRecs, $ivf_outcome_list->RecRange, $ivf_outcome_list->AutoHidePager) ?>
<?php if ($ivf_outcome_list->Pager->RecordCount > 0 && $ivf_outcome_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($ivf_outcome_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_outcome_list->pageUrl() ?>start=<?php echo $ivf_outcome_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($ivf_outcome_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_outcome_list->pageUrl() ?>start=<?php echo $ivf_outcome_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($ivf_outcome_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $ivf_outcome_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($ivf_outcome_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_outcome_list->pageUrl() ?>start=<?php echo $ivf_outcome_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($ivf_outcome_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_outcome_list->pageUrl() ?>start=<?php echo $ivf_outcome_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($ivf_outcome_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $ivf_outcome_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $ivf_outcome_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $ivf_outcome_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($ivf_outcome_list->TotalRecs > 0 && (!$ivf_outcome_list->AutoHidePageSizeSelector || $ivf_outcome_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="ivf_outcome">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($ivf_outcome_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($ivf_outcome_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($ivf_outcome_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($ivf_outcome_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($ivf_outcome_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($ivf_outcome_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($ivf_outcome->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ivf_outcome_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($ivf_outcome_list->TotalRecs == 0 && !$ivf_outcome->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $ivf_outcome_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$ivf_outcome_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$ivf_outcome->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$ivf_outcome->isExport()) { ?>
<script>
ew.scrollableTable("gmp_ivf_outcome", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$ivf_outcome_list->terminate();
?>