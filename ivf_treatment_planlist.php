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
$ivf_treatment_plan_list = new ivf_treatment_plan_list();

// Run the page
$ivf_treatment_plan_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_treatment_plan_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$ivf_treatment_plan->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fivf_treatment_planlist = currentForm = new ew.Form("fivf_treatment_planlist", "list");
fivf_treatment_planlist.formKeyCountName = '<?php echo $ivf_treatment_plan_list->FormKeyCountName ?>';

// Form_CustomValidate event
fivf_treatment_planlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_treatment_planlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fivf_treatment_planlist.lists["x_treatment_status"] = <?php echo $ivf_treatment_plan_list->treatment_status->Lookup->toClientList() ?>;
fivf_treatment_planlist.lists["x_treatment_status"].options = <?php echo JsonEncode($ivf_treatment_plan_list->treatment_status->options(FALSE, TRUE)) ?>;
fivf_treatment_planlist.lists["x_ARTCYCLE"] = <?php echo $ivf_treatment_plan_list->ARTCYCLE->Lookup->toClientList() ?>;
fivf_treatment_planlist.lists["x_ARTCYCLE"].options = <?php echo JsonEncode($ivf_treatment_plan_list->ARTCYCLE->options(FALSE, TRUE)) ?>;
fivf_treatment_planlist.lists["x_Treatment"] = <?php echo $ivf_treatment_plan_list->Treatment->Lookup->toClientList() ?>;
fivf_treatment_planlist.lists["x_Treatment"].options = <?php echo JsonEncode($ivf_treatment_plan_list->Treatment->options(FALSE, TRUE)) ?>;
fivf_treatment_planlist.lists["x_TypeOfCycle"] = <?php echo $ivf_treatment_plan_list->TypeOfCycle->Lookup->toClientList() ?>;
fivf_treatment_planlist.lists["x_TypeOfCycle"].options = <?php echo JsonEncode($ivf_treatment_plan_list->TypeOfCycle->options(FALSE, TRUE)) ?>;
fivf_treatment_planlist.lists["x_SpermOrgin"] = <?php echo $ivf_treatment_plan_list->SpermOrgin->Lookup->toClientList() ?>;
fivf_treatment_planlist.lists["x_SpermOrgin"].options = <?php echo JsonEncode($ivf_treatment_plan_list->SpermOrgin->options(FALSE, TRUE)) ?>;
fivf_treatment_planlist.lists["x_State"] = <?php echo $ivf_treatment_plan_list->State->Lookup->toClientList() ?>;
fivf_treatment_planlist.lists["x_State"].options = <?php echo JsonEncode($ivf_treatment_plan_list->State->options(FALSE, TRUE)) ?>;
fivf_treatment_planlist.lists["x_Origin"] = <?php echo $ivf_treatment_plan_list->Origin->Lookup->toClientList() ?>;
fivf_treatment_planlist.lists["x_Origin"].options = <?php echo JsonEncode($ivf_treatment_plan_list->Origin->options(FALSE, TRUE)) ?>;
fivf_treatment_planlist.lists["x_MACS"] = <?php echo $ivf_treatment_plan_list->MACS->Lookup->toClientList() ?>;
fivf_treatment_planlist.lists["x_MACS"].options = <?php echo JsonEncode($ivf_treatment_plan_list->MACS->options(FALSE, TRUE)) ?>;
fivf_treatment_planlist.lists["x_PgdPlanning"] = <?php echo $ivf_treatment_plan_list->PgdPlanning->Lookup->toClientList() ?>;
fivf_treatment_planlist.lists["x_PgdPlanning"].options = <?php echo JsonEncode($ivf_treatment_plan_list->PgdPlanning->options(FALSE, TRUE)) ?>;
fivf_treatment_planlist.lists["x_MaleIndications"] = <?php echo $ivf_treatment_plan_list->MaleIndications->Lookup->toClientList() ?>;
fivf_treatment_planlist.lists["x_MaleIndications"].options = <?php echo JsonEncode($ivf_treatment_plan_list->MaleIndications->options(FALSE, TRUE)) ?>;
fivf_treatment_planlist.lists["x_FemaleIndications"] = <?php echo $ivf_treatment_plan_list->FemaleIndications->Lookup->toClientList() ?>;
fivf_treatment_planlist.lists["x_FemaleIndications"].options = <?php echo JsonEncode($ivf_treatment_plan_list->FemaleIndications->options(FALSE, TRUE)) ?>;

// Form object for search
var fivf_treatment_planlistsrch = currentSearchForm = new ew.Form("fivf_treatment_planlistsrch");

// Filters
fivf_treatment_planlistsrch.filterList = <?php echo $ivf_treatment_plan_list->getFilterList() ?>;
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
<?php if (!$ivf_treatment_plan->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($ivf_treatment_plan_list->TotalRecs > 0 && $ivf_treatment_plan_list->ExportOptions->visible()) { ?>
<?php $ivf_treatment_plan_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_treatment_plan_list->ImportOptions->visible()) { ?>
<?php $ivf_treatment_plan_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_treatment_plan_list->SearchOptions->visible()) { ?>
<?php $ivf_treatment_plan_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_treatment_plan_list->FilterOptions->visible()) { ?>
<?php $ivf_treatment_plan_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$ivf_treatment_plan->isExport() || EXPORT_MASTER_RECORD && $ivf_treatment_plan->isExport("print")) { ?>
<?php
if ($ivf_treatment_plan_list->DbMasterFilter <> "" && $ivf_treatment_plan->getCurrentMasterTable() == "ivf") {
	if ($ivf_treatment_plan_list->MasterRecordExists) {
		include_once "ivfmaster.php";
	}
}
?>
<?php
if ($ivf_treatment_plan_list->DbMasterFilter <> "" && $ivf_treatment_plan->getCurrentMasterTable() == "view_donor_ivf") {
	if ($ivf_treatment_plan_list->MasterRecordExists) {
		include_once "view_donor_ivfmaster.php";
	}
}
?>
<?php } ?>
<?php
$ivf_treatment_plan_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$ivf_treatment_plan->isExport() && !$ivf_treatment_plan->CurrentAction) { ?>
<form name="fivf_treatment_planlistsrch" id="fivf_treatment_planlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($ivf_treatment_plan_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fivf_treatment_planlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="ivf_treatment_plan">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($ivf_treatment_plan_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($ivf_treatment_plan_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $ivf_treatment_plan_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($ivf_treatment_plan_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($ivf_treatment_plan_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($ivf_treatment_plan_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($ivf_treatment_plan_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $ivf_treatment_plan_list->showPageHeader(); ?>
<?php
$ivf_treatment_plan_list->showMessage();
?>
<?php if ($ivf_treatment_plan_list->TotalRecs > 0 || $ivf_treatment_plan->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($ivf_treatment_plan_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf_treatment_plan">
<?php if (!$ivf_treatment_plan->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$ivf_treatment_plan->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($ivf_treatment_plan_list->Pager)) $ivf_treatment_plan_list->Pager = new NumericPager($ivf_treatment_plan_list->StartRec, $ivf_treatment_plan_list->DisplayRecs, $ivf_treatment_plan_list->TotalRecs, $ivf_treatment_plan_list->RecRange, $ivf_treatment_plan_list->AutoHidePager) ?>
<?php if ($ivf_treatment_plan_list->Pager->RecordCount > 0 && $ivf_treatment_plan_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($ivf_treatment_plan_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_treatment_plan_list->pageUrl() ?>start=<?php echo $ivf_treatment_plan_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($ivf_treatment_plan_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_treatment_plan_list->pageUrl() ?>start=<?php echo $ivf_treatment_plan_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($ivf_treatment_plan_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $ivf_treatment_plan_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($ivf_treatment_plan_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_treatment_plan_list->pageUrl() ?>start=<?php echo $ivf_treatment_plan_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($ivf_treatment_plan_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_treatment_plan_list->pageUrl() ?>start=<?php echo $ivf_treatment_plan_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($ivf_treatment_plan_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $ivf_treatment_plan_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $ivf_treatment_plan_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $ivf_treatment_plan_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($ivf_treatment_plan_list->TotalRecs > 0 && (!$ivf_treatment_plan_list->AutoHidePageSizeSelector || $ivf_treatment_plan_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="ivf_treatment_plan">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($ivf_treatment_plan_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($ivf_treatment_plan_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($ivf_treatment_plan_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($ivf_treatment_plan_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($ivf_treatment_plan_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($ivf_treatment_plan_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($ivf_treatment_plan->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ivf_treatment_plan_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fivf_treatment_planlist" id="fivf_treatment_planlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ivf_treatment_plan_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_treatment_plan_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_treatment_plan">
<?php if ($ivf_treatment_plan->getCurrentMasterTable() == "ivf" && $ivf_treatment_plan->CurrentAction) { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="ivf">
<input type="hidden" name="fk_id" value="<?php echo $ivf_treatment_plan->RIDNO->getSessionValue() ?>">
<input type="hidden" name="fk_Female" value="<?php echo $ivf_treatment_plan->Name->getSessionValue() ?>">
<?php } ?>
<?php if ($ivf_treatment_plan->getCurrentMasterTable() == "view_donor_ivf" && $ivf_treatment_plan->CurrentAction) { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="view_donor_ivf">
<input type="hidden" name="fk_id" value="<?php echo $ivf_treatment_plan->RIDNO->getSessionValue() ?>">
<input type="hidden" name="fk_Female" value="<?php echo $ivf_treatment_plan->Name->getSessionValue() ?>">
<?php } ?>
<div id="gmp_ivf_treatment_plan" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($ivf_treatment_plan_list->TotalRecs > 0 || $ivf_treatment_plan->isGridEdit()) { ?>
<table id="tbl_ivf_treatment_planlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$ivf_treatment_plan_list->RowType = ROWTYPE_HEADER;

// Render list options
$ivf_treatment_plan_list->renderListOptions();

// Render list options (header, left)
$ivf_treatment_plan_list->ListOptions->render("header", "left");
?>
<?php if ($ivf_treatment_plan->TreatmentStartDate->Visible) { // TreatmentStartDate ?>
	<?php if ($ivf_treatment_plan->sortUrl($ivf_treatment_plan->TreatmentStartDate) == "") { ?>
		<th data-name="TreatmentStartDate" class="<?php echo $ivf_treatment_plan->TreatmentStartDate->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_TreatmentStartDate" class="ivf_treatment_plan_TreatmentStartDate"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan->TreatmentStartDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TreatmentStartDate" class="<?php echo $ivf_treatment_plan->TreatmentStartDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_treatment_plan->SortUrl($ivf_treatment_plan->TreatmentStartDate) ?>',1);"><div id="elh_ivf_treatment_plan_TreatmentStartDate" class="ivf_treatment_plan_TreatmentStartDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan->TreatmentStartDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan->TreatmentStartDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_treatment_plan->TreatmentStartDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan->treatment_status->Visible) { // treatment_status ?>
	<?php if ($ivf_treatment_plan->sortUrl($ivf_treatment_plan->treatment_status) == "") { ?>
		<th data-name="treatment_status" class="<?php echo $ivf_treatment_plan->treatment_status->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_treatment_status" class="ivf_treatment_plan_treatment_status"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan->treatment_status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="treatment_status" class="<?php echo $ivf_treatment_plan->treatment_status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_treatment_plan->SortUrl($ivf_treatment_plan->treatment_status) ?>',1);"><div id="elh_ivf_treatment_plan_treatment_status" class="ivf_treatment_plan_treatment_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan->treatment_status->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan->treatment_status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_treatment_plan->treatment_status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan->ARTCYCLE->Visible) { // ARTCYCLE ?>
	<?php if ($ivf_treatment_plan->sortUrl($ivf_treatment_plan->ARTCYCLE) == "") { ?>
		<th data-name="ARTCYCLE" class="<?php echo $ivf_treatment_plan->ARTCYCLE->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_ARTCYCLE" class="ivf_treatment_plan_ARTCYCLE"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan->ARTCYCLE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ARTCYCLE" class="<?php echo $ivf_treatment_plan->ARTCYCLE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_treatment_plan->SortUrl($ivf_treatment_plan->ARTCYCLE) ?>',1);"><div id="elh_ivf_treatment_plan_ARTCYCLE" class="ivf_treatment_plan_ARTCYCLE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan->ARTCYCLE->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan->ARTCYCLE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_treatment_plan->ARTCYCLE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan->IVFCycleNO->Visible) { // IVFCycleNO ?>
	<?php if ($ivf_treatment_plan->sortUrl($ivf_treatment_plan->IVFCycleNO) == "") { ?>
		<th data-name="IVFCycleNO" class="<?php echo $ivf_treatment_plan->IVFCycleNO->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_IVFCycleNO" class="ivf_treatment_plan_IVFCycleNO"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan->IVFCycleNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IVFCycleNO" class="<?php echo $ivf_treatment_plan->IVFCycleNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_treatment_plan->SortUrl($ivf_treatment_plan->IVFCycleNO) ?>',1);"><div id="elh_ivf_treatment_plan_IVFCycleNO" class="ivf_treatment_plan_IVFCycleNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan->IVFCycleNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan->IVFCycleNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_treatment_plan->IVFCycleNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan->Treatment->Visible) { // Treatment ?>
	<?php if ($ivf_treatment_plan->sortUrl($ivf_treatment_plan->Treatment) == "") { ?>
		<th data-name="Treatment" class="<?php echo $ivf_treatment_plan->Treatment->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_Treatment" class="ivf_treatment_plan_Treatment"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan->Treatment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Treatment" class="<?php echo $ivf_treatment_plan->Treatment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_treatment_plan->SortUrl($ivf_treatment_plan->Treatment) ?>',1);"><div id="elh_ivf_treatment_plan_Treatment" class="ivf_treatment_plan_Treatment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan->Treatment->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan->Treatment->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_treatment_plan->Treatment->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan->TreatmentTec->Visible) { // TreatmentTec ?>
	<?php if ($ivf_treatment_plan->sortUrl($ivf_treatment_plan->TreatmentTec) == "") { ?>
		<th data-name="TreatmentTec" class="<?php echo $ivf_treatment_plan->TreatmentTec->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_TreatmentTec" class="ivf_treatment_plan_TreatmentTec"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan->TreatmentTec->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TreatmentTec" class="<?php echo $ivf_treatment_plan->TreatmentTec->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_treatment_plan->SortUrl($ivf_treatment_plan->TreatmentTec) ?>',1);"><div id="elh_ivf_treatment_plan_TreatmentTec" class="ivf_treatment_plan_TreatmentTec">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan->TreatmentTec->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan->TreatmentTec->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_treatment_plan->TreatmentTec->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan->TypeOfCycle->Visible) { // TypeOfCycle ?>
	<?php if ($ivf_treatment_plan->sortUrl($ivf_treatment_plan->TypeOfCycle) == "") { ?>
		<th data-name="TypeOfCycle" class="<?php echo $ivf_treatment_plan->TypeOfCycle->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_TypeOfCycle" class="ivf_treatment_plan_TypeOfCycle"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan->TypeOfCycle->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TypeOfCycle" class="<?php echo $ivf_treatment_plan->TypeOfCycle->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_treatment_plan->SortUrl($ivf_treatment_plan->TypeOfCycle) ?>',1);"><div id="elh_ivf_treatment_plan_TypeOfCycle" class="ivf_treatment_plan_TypeOfCycle">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan->TypeOfCycle->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan->TypeOfCycle->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_treatment_plan->TypeOfCycle->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan->SpermOrgin->Visible) { // SpermOrgin ?>
	<?php if ($ivf_treatment_plan->sortUrl($ivf_treatment_plan->SpermOrgin) == "") { ?>
		<th data-name="SpermOrgin" class="<?php echo $ivf_treatment_plan->SpermOrgin->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_SpermOrgin" class="ivf_treatment_plan_SpermOrgin"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan->SpermOrgin->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SpermOrgin" class="<?php echo $ivf_treatment_plan->SpermOrgin->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_treatment_plan->SortUrl($ivf_treatment_plan->SpermOrgin) ?>',1);"><div id="elh_ivf_treatment_plan_SpermOrgin" class="ivf_treatment_plan_SpermOrgin">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan->SpermOrgin->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan->SpermOrgin->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_treatment_plan->SpermOrgin->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan->State->Visible) { // State ?>
	<?php if ($ivf_treatment_plan->sortUrl($ivf_treatment_plan->State) == "") { ?>
		<th data-name="State" class="<?php echo $ivf_treatment_plan->State->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_State" class="ivf_treatment_plan_State"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan->State->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="State" class="<?php echo $ivf_treatment_plan->State->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_treatment_plan->SortUrl($ivf_treatment_plan->State) ?>',1);"><div id="elh_ivf_treatment_plan_State" class="ivf_treatment_plan_State">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan->State->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan->State->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_treatment_plan->State->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan->Origin->Visible) { // Origin ?>
	<?php if ($ivf_treatment_plan->sortUrl($ivf_treatment_plan->Origin) == "") { ?>
		<th data-name="Origin" class="<?php echo $ivf_treatment_plan->Origin->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_Origin" class="ivf_treatment_plan_Origin"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan->Origin->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Origin" class="<?php echo $ivf_treatment_plan->Origin->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_treatment_plan->SortUrl($ivf_treatment_plan->Origin) ?>',1);"><div id="elh_ivf_treatment_plan_Origin" class="ivf_treatment_plan_Origin">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan->Origin->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan->Origin->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_treatment_plan->Origin->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan->MACS->Visible) { // MACS ?>
	<?php if ($ivf_treatment_plan->sortUrl($ivf_treatment_plan->MACS) == "") { ?>
		<th data-name="MACS" class="<?php echo $ivf_treatment_plan->MACS->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_MACS" class="ivf_treatment_plan_MACS"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan->MACS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MACS" class="<?php echo $ivf_treatment_plan->MACS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_treatment_plan->SortUrl($ivf_treatment_plan->MACS) ?>',1);"><div id="elh_ivf_treatment_plan_MACS" class="ivf_treatment_plan_MACS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan->MACS->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan->MACS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_treatment_plan->MACS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan->Technique->Visible) { // Technique ?>
	<?php if ($ivf_treatment_plan->sortUrl($ivf_treatment_plan->Technique) == "") { ?>
		<th data-name="Technique" class="<?php echo $ivf_treatment_plan->Technique->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_Technique" class="ivf_treatment_plan_Technique"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan->Technique->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Technique" class="<?php echo $ivf_treatment_plan->Technique->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_treatment_plan->SortUrl($ivf_treatment_plan->Technique) ?>',1);"><div id="elh_ivf_treatment_plan_Technique" class="ivf_treatment_plan_Technique">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan->Technique->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan->Technique->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_treatment_plan->Technique->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan->PgdPlanning->Visible) { // PgdPlanning ?>
	<?php if ($ivf_treatment_plan->sortUrl($ivf_treatment_plan->PgdPlanning) == "") { ?>
		<th data-name="PgdPlanning" class="<?php echo $ivf_treatment_plan->PgdPlanning->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_PgdPlanning" class="ivf_treatment_plan_PgdPlanning"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan->PgdPlanning->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PgdPlanning" class="<?php echo $ivf_treatment_plan->PgdPlanning->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_treatment_plan->SortUrl($ivf_treatment_plan->PgdPlanning) ?>',1);"><div id="elh_ivf_treatment_plan_PgdPlanning" class="ivf_treatment_plan_PgdPlanning">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan->PgdPlanning->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan->PgdPlanning->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_treatment_plan->PgdPlanning->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan->IMSI->Visible) { // IMSI ?>
	<?php if ($ivf_treatment_plan->sortUrl($ivf_treatment_plan->IMSI) == "") { ?>
		<th data-name="IMSI" class="<?php echo $ivf_treatment_plan->IMSI->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_IMSI" class="ivf_treatment_plan_IMSI"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan->IMSI->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IMSI" class="<?php echo $ivf_treatment_plan->IMSI->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_treatment_plan->SortUrl($ivf_treatment_plan->IMSI) ?>',1);"><div id="elh_ivf_treatment_plan_IMSI" class="ivf_treatment_plan_IMSI">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan->IMSI->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan->IMSI->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_treatment_plan->IMSI->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan->SequentialCulture->Visible) { // SequentialCulture ?>
	<?php if ($ivf_treatment_plan->sortUrl($ivf_treatment_plan->SequentialCulture) == "") { ?>
		<th data-name="SequentialCulture" class="<?php echo $ivf_treatment_plan->SequentialCulture->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_SequentialCulture" class="ivf_treatment_plan_SequentialCulture"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan->SequentialCulture->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SequentialCulture" class="<?php echo $ivf_treatment_plan->SequentialCulture->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_treatment_plan->SortUrl($ivf_treatment_plan->SequentialCulture) ?>',1);"><div id="elh_ivf_treatment_plan_SequentialCulture" class="ivf_treatment_plan_SequentialCulture">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan->SequentialCulture->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan->SequentialCulture->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_treatment_plan->SequentialCulture->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan->TimeLapse->Visible) { // TimeLapse ?>
	<?php if ($ivf_treatment_plan->sortUrl($ivf_treatment_plan->TimeLapse) == "") { ?>
		<th data-name="TimeLapse" class="<?php echo $ivf_treatment_plan->TimeLapse->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_TimeLapse" class="ivf_treatment_plan_TimeLapse"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan->TimeLapse->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TimeLapse" class="<?php echo $ivf_treatment_plan->TimeLapse->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_treatment_plan->SortUrl($ivf_treatment_plan->TimeLapse) ?>',1);"><div id="elh_ivf_treatment_plan_TimeLapse" class="ivf_treatment_plan_TimeLapse">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan->TimeLapse->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan->TimeLapse->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_treatment_plan->TimeLapse->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan->AH->Visible) { // AH ?>
	<?php if ($ivf_treatment_plan->sortUrl($ivf_treatment_plan->AH) == "") { ?>
		<th data-name="AH" class="<?php echo $ivf_treatment_plan->AH->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_AH" class="ivf_treatment_plan_AH"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan->AH->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AH" class="<?php echo $ivf_treatment_plan->AH->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_treatment_plan->SortUrl($ivf_treatment_plan->AH) ?>',1);"><div id="elh_ivf_treatment_plan_AH" class="ivf_treatment_plan_AH">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan->AH->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan->AH->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_treatment_plan->AH->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan->Weight->Visible) { // Weight ?>
	<?php if ($ivf_treatment_plan->sortUrl($ivf_treatment_plan->Weight) == "") { ?>
		<th data-name="Weight" class="<?php echo $ivf_treatment_plan->Weight->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_Weight" class="ivf_treatment_plan_Weight"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan->Weight->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Weight" class="<?php echo $ivf_treatment_plan->Weight->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_treatment_plan->SortUrl($ivf_treatment_plan->Weight) ?>',1);"><div id="elh_ivf_treatment_plan_Weight" class="ivf_treatment_plan_Weight">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan->Weight->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan->Weight->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_treatment_plan->Weight->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan->BMI->Visible) { // BMI ?>
	<?php if ($ivf_treatment_plan->sortUrl($ivf_treatment_plan->BMI) == "") { ?>
		<th data-name="BMI" class="<?php echo $ivf_treatment_plan->BMI->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_BMI" class="ivf_treatment_plan_BMI"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan->BMI->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BMI" class="<?php echo $ivf_treatment_plan->BMI->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_treatment_plan->SortUrl($ivf_treatment_plan->BMI) ?>',1);"><div id="elh_ivf_treatment_plan_BMI" class="ivf_treatment_plan_BMI">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan->BMI->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan->BMI->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_treatment_plan->BMI->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan->MaleIndications->Visible) { // MaleIndications ?>
	<?php if ($ivf_treatment_plan->sortUrl($ivf_treatment_plan->MaleIndications) == "") { ?>
		<th data-name="MaleIndications" class="<?php echo $ivf_treatment_plan->MaleIndications->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_MaleIndications" class="ivf_treatment_plan_MaleIndications"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan->MaleIndications->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MaleIndications" class="<?php echo $ivf_treatment_plan->MaleIndications->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_treatment_plan->SortUrl($ivf_treatment_plan->MaleIndications) ?>',1);"><div id="elh_ivf_treatment_plan_MaleIndications" class="ivf_treatment_plan_MaleIndications">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan->MaleIndications->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan->MaleIndications->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_treatment_plan->MaleIndications->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan->FemaleIndications->Visible) { // FemaleIndications ?>
	<?php if ($ivf_treatment_plan->sortUrl($ivf_treatment_plan->FemaleIndications) == "") { ?>
		<th data-name="FemaleIndications" class="<?php echo $ivf_treatment_plan->FemaleIndications->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_FemaleIndications" class="ivf_treatment_plan_FemaleIndications"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan->FemaleIndications->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FemaleIndications" class="<?php echo $ivf_treatment_plan->FemaleIndications->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $ivf_treatment_plan->SortUrl($ivf_treatment_plan->FemaleIndications) ?>',1);"><div id="elh_ivf_treatment_plan_FemaleIndications" class="ivf_treatment_plan_FemaleIndications">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan->FemaleIndications->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan->FemaleIndications->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_treatment_plan->FemaleIndications->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$ivf_treatment_plan_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($ivf_treatment_plan->ExportAll && $ivf_treatment_plan->isExport()) {
	$ivf_treatment_plan_list->StopRec = $ivf_treatment_plan_list->TotalRecs;
} else {

	// Set the last record to display
	if ($ivf_treatment_plan_list->TotalRecs > $ivf_treatment_plan_list->StartRec + $ivf_treatment_plan_list->DisplayRecs - 1)
		$ivf_treatment_plan_list->StopRec = $ivf_treatment_plan_list->StartRec + $ivf_treatment_plan_list->DisplayRecs - 1;
	else
		$ivf_treatment_plan_list->StopRec = $ivf_treatment_plan_list->TotalRecs;
}
$ivf_treatment_plan_list->RecCnt = $ivf_treatment_plan_list->StartRec - 1;
if ($ivf_treatment_plan_list->Recordset && !$ivf_treatment_plan_list->Recordset->EOF) {
	$ivf_treatment_plan_list->Recordset->moveFirst();
	$selectLimit = $ivf_treatment_plan_list->UseSelectLimit;
	if (!$selectLimit && $ivf_treatment_plan_list->StartRec > 1)
		$ivf_treatment_plan_list->Recordset->move($ivf_treatment_plan_list->StartRec - 1);
} elseif (!$ivf_treatment_plan->AllowAddDeleteRow && $ivf_treatment_plan_list->StopRec == 0) {
	$ivf_treatment_plan_list->StopRec = $ivf_treatment_plan->GridAddRowCount;
}

// Initialize aggregate
$ivf_treatment_plan->RowType = ROWTYPE_AGGREGATEINIT;
$ivf_treatment_plan->resetAttributes();
$ivf_treatment_plan_list->renderRow();
while ($ivf_treatment_plan_list->RecCnt < $ivf_treatment_plan_list->StopRec) {
	$ivf_treatment_plan_list->RecCnt++;
	if ($ivf_treatment_plan_list->RecCnt >= $ivf_treatment_plan_list->StartRec) {
		$ivf_treatment_plan_list->RowCnt++;

		// Set up key count
		$ivf_treatment_plan_list->KeyCount = $ivf_treatment_plan_list->RowIndex;

		// Init row class and style
		$ivf_treatment_plan->resetAttributes();
		$ivf_treatment_plan->CssClass = "";
		if ($ivf_treatment_plan->isGridAdd()) {
		} else {
			$ivf_treatment_plan_list->loadRowValues($ivf_treatment_plan_list->Recordset); // Load row values
		}
		$ivf_treatment_plan->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$ivf_treatment_plan->RowAttrs = array_merge($ivf_treatment_plan->RowAttrs, array('data-rowindex'=>$ivf_treatment_plan_list->RowCnt, 'id'=>'r' . $ivf_treatment_plan_list->RowCnt . '_ivf_treatment_plan', 'data-rowtype'=>$ivf_treatment_plan->RowType));

		// Render row
		$ivf_treatment_plan_list->renderRow();

		// Render list options
		$ivf_treatment_plan_list->renderListOptions();
?>
	<tr<?php echo $ivf_treatment_plan->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_treatment_plan_list->ListOptions->render("body", "left", $ivf_treatment_plan_list->RowCnt);
?>
	<?php if ($ivf_treatment_plan->TreatmentStartDate->Visible) { // TreatmentStartDate ?>
		<td data-name="TreatmentStartDate"<?php echo $ivf_treatment_plan->TreatmentStartDate->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_list->RowCnt ?>_ivf_treatment_plan_TreatmentStartDate" class="ivf_treatment_plan_TreatmentStartDate">
<span<?php echo $ivf_treatment_plan->TreatmentStartDate->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->TreatmentStartDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan->treatment_status->Visible) { // treatment_status ?>
		<td data-name="treatment_status"<?php echo $ivf_treatment_plan->treatment_status->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_list->RowCnt ?>_ivf_treatment_plan_treatment_status" class="ivf_treatment_plan_treatment_status">
<span<?php echo $ivf_treatment_plan->treatment_status->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->treatment_status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan->ARTCYCLE->Visible) { // ARTCYCLE ?>
		<td data-name="ARTCYCLE"<?php echo $ivf_treatment_plan->ARTCYCLE->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_list->RowCnt ?>_ivf_treatment_plan_ARTCYCLE" class="ivf_treatment_plan_ARTCYCLE">
<span<?php echo $ivf_treatment_plan->ARTCYCLE->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->ARTCYCLE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan->IVFCycleNO->Visible) { // IVFCycleNO ?>
		<td data-name="IVFCycleNO"<?php echo $ivf_treatment_plan->IVFCycleNO->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_list->RowCnt ?>_ivf_treatment_plan_IVFCycleNO" class="ivf_treatment_plan_IVFCycleNO">
<span<?php echo $ivf_treatment_plan->IVFCycleNO->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->IVFCycleNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan->Treatment->Visible) { // Treatment ?>
		<td data-name="Treatment"<?php echo $ivf_treatment_plan->Treatment->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_list->RowCnt ?>_ivf_treatment_plan_Treatment" class="ivf_treatment_plan_Treatment">
<span<?php echo $ivf_treatment_plan->Treatment->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->Treatment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan->TreatmentTec->Visible) { // TreatmentTec ?>
		<td data-name="TreatmentTec"<?php echo $ivf_treatment_plan->TreatmentTec->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_list->RowCnt ?>_ivf_treatment_plan_TreatmentTec" class="ivf_treatment_plan_TreatmentTec">
<span<?php echo $ivf_treatment_plan->TreatmentTec->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->TreatmentTec->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan->TypeOfCycle->Visible) { // TypeOfCycle ?>
		<td data-name="TypeOfCycle"<?php echo $ivf_treatment_plan->TypeOfCycle->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_list->RowCnt ?>_ivf_treatment_plan_TypeOfCycle" class="ivf_treatment_plan_TypeOfCycle">
<span<?php echo $ivf_treatment_plan->TypeOfCycle->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->TypeOfCycle->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan->SpermOrgin->Visible) { // SpermOrgin ?>
		<td data-name="SpermOrgin"<?php echo $ivf_treatment_plan->SpermOrgin->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_list->RowCnt ?>_ivf_treatment_plan_SpermOrgin" class="ivf_treatment_plan_SpermOrgin">
<span<?php echo $ivf_treatment_plan->SpermOrgin->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->SpermOrgin->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan->State->Visible) { // State ?>
		<td data-name="State"<?php echo $ivf_treatment_plan->State->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_list->RowCnt ?>_ivf_treatment_plan_State" class="ivf_treatment_plan_State">
<span<?php echo $ivf_treatment_plan->State->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->State->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan->Origin->Visible) { // Origin ?>
		<td data-name="Origin"<?php echo $ivf_treatment_plan->Origin->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_list->RowCnt ?>_ivf_treatment_plan_Origin" class="ivf_treatment_plan_Origin">
<span<?php echo $ivf_treatment_plan->Origin->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->Origin->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan->MACS->Visible) { // MACS ?>
		<td data-name="MACS"<?php echo $ivf_treatment_plan->MACS->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_list->RowCnt ?>_ivf_treatment_plan_MACS" class="ivf_treatment_plan_MACS">
<span<?php echo $ivf_treatment_plan->MACS->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->MACS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan->Technique->Visible) { // Technique ?>
		<td data-name="Technique"<?php echo $ivf_treatment_plan->Technique->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_list->RowCnt ?>_ivf_treatment_plan_Technique" class="ivf_treatment_plan_Technique">
<span<?php echo $ivf_treatment_plan->Technique->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->Technique->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan->PgdPlanning->Visible) { // PgdPlanning ?>
		<td data-name="PgdPlanning"<?php echo $ivf_treatment_plan->PgdPlanning->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_list->RowCnt ?>_ivf_treatment_plan_PgdPlanning" class="ivf_treatment_plan_PgdPlanning">
<span<?php echo $ivf_treatment_plan->PgdPlanning->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->PgdPlanning->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan->IMSI->Visible) { // IMSI ?>
		<td data-name="IMSI"<?php echo $ivf_treatment_plan->IMSI->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_list->RowCnt ?>_ivf_treatment_plan_IMSI" class="ivf_treatment_plan_IMSI">
<span<?php echo $ivf_treatment_plan->IMSI->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->IMSI->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan->SequentialCulture->Visible) { // SequentialCulture ?>
		<td data-name="SequentialCulture"<?php echo $ivf_treatment_plan->SequentialCulture->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_list->RowCnt ?>_ivf_treatment_plan_SequentialCulture" class="ivf_treatment_plan_SequentialCulture">
<span<?php echo $ivf_treatment_plan->SequentialCulture->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->SequentialCulture->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan->TimeLapse->Visible) { // TimeLapse ?>
		<td data-name="TimeLapse"<?php echo $ivf_treatment_plan->TimeLapse->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_list->RowCnt ?>_ivf_treatment_plan_TimeLapse" class="ivf_treatment_plan_TimeLapse">
<span<?php echo $ivf_treatment_plan->TimeLapse->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->TimeLapse->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan->AH->Visible) { // AH ?>
		<td data-name="AH"<?php echo $ivf_treatment_plan->AH->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_list->RowCnt ?>_ivf_treatment_plan_AH" class="ivf_treatment_plan_AH">
<span<?php echo $ivf_treatment_plan->AH->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->AH->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan->Weight->Visible) { // Weight ?>
		<td data-name="Weight"<?php echo $ivf_treatment_plan->Weight->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_list->RowCnt ?>_ivf_treatment_plan_Weight" class="ivf_treatment_plan_Weight">
<span<?php echo $ivf_treatment_plan->Weight->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->Weight->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan->BMI->Visible) { // BMI ?>
		<td data-name="BMI"<?php echo $ivf_treatment_plan->BMI->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_list->RowCnt ?>_ivf_treatment_plan_BMI" class="ivf_treatment_plan_BMI">
<span<?php echo $ivf_treatment_plan->BMI->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->BMI->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan->MaleIndications->Visible) { // MaleIndications ?>
		<td data-name="MaleIndications"<?php echo $ivf_treatment_plan->MaleIndications->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_list->RowCnt ?>_ivf_treatment_plan_MaleIndications" class="ivf_treatment_plan_MaleIndications">
<span<?php echo $ivf_treatment_plan->MaleIndications->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->MaleIndications->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan->FemaleIndications->Visible) { // FemaleIndications ?>
		<td data-name="FemaleIndications"<?php echo $ivf_treatment_plan->FemaleIndications->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_list->RowCnt ?>_ivf_treatment_plan_FemaleIndications" class="ivf_treatment_plan_FemaleIndications">
<span<?php echo $ivf_treatment_plan->FemaleIndications->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->FemaleIndications->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_treatment_plan_list->ListOptions->render("body", "right", $ivf_treatment_plan_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$ivf_treatment_plan->isGridAdd())
		$ivf_treatment_plan_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$ivf_treatment_plan->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($ivf_treatment_plan_list->Recordset)
	$ivf_treatment_plan_list->Recordset->Close();
?>
<?php if (!$ivf_treatment_plan->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$ivf_treatment_plan->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($ivf_treatment_plan_list->Pager)) $ivf_treatment_plan_list->Pager = new NumericPager($ivf_treatment_plan_list->StartRec, $ivf_treatment_plan_list->DisplayRecs, $ivf_treatment_plan_list->TotalRecs, $ivf_treatment_plan_list->RecRange, $ivf_treatment_plan_list->AutoHidePager) ?>
<?php if ($ivf_treatment_plan_list->Pager->RecordCount > 0 && $ivf_treatment_plan_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($ivf_treatment_plan_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_treatment_plan_list->pageUrl() ?>start=<?php echo $ivf_treatment_plan_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($ivf_treatment_plan_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_treatment_plan_list->pageUrl() ?>start=<?php echo $ivf_treatment_plan_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($ivf_treatment_plan_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $ivf_treatment_plan_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($ivf_treatment_plan_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_treatment_plan_list->pageUrl() ?>start=<?php echo $ivf_treatment_plan_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($ivf_treatment_plan_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $ivf_treatment_plan_list->pageUrl() ?>start=<?php echo $ivf_treatment_plan_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($ivf_treatment_plan_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $ivf_treatment_plan_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $ivf_treatment_plan_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $ivf_treatment_plan_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($ivf_treatment_plan_list->TotalRecs > 0 && (!$ivf_treatment_plan_list->AutoHidePageSizeSelector || $ivf_treatment_plan_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="ivf_treatment_plan">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($ivf_treatment_plan_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($ivf_treatment_plan_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($ivf_treatment_plan_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($ivf_treatment_plan_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($ivf_treatment_plan_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($ivf_treatment_plan_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($ivf_treatment_plan->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ivf_treatment_plan_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($ivf_treatment_plan_list->TotalRecs == 0 && !$ivf_treatment_plan->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $ivf_treatment_plan_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$ivf_treatment_plan_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$ivf_treatment_plan->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$ivf_treatment_plan->isExport()) { ?>
<script>
ew.scrollableTable("gmp_ivf_treatment_plan", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$ivf_treatment_plan_list->terminate();
?>