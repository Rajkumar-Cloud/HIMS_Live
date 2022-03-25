<?php
namespace PHPMaker2020\HIMS;

// Autoload
include_once "autoload.php";

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	\Delight\Cookie\Session::start(Config("COOKIE_SAMESITE")); // Init session data

// Output buffering
ob_start();
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
<?php include_once "header.php"; ?>
<?php if (!$ivf_treatment_plan_list->isExport()) { ?>
<script>
var fivf_treatment_planlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fivf_treatment_planlist = currentForm = new ew.Form("fivf_treatment_planlist", "list");
	fivf_treatment_planlist.formKeyCountName = '<?php echo $ivf_treatment_plan_list->FormKeyCountName ?>';
	loadjs.done("fivf_treatment_planlist");
});
var fivf_treatment_planlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fivf_treatment_planlistsrch = currentSearchForm = new ew.Form("fivf_treatment_planlistsrch");

	// Dynamic selection lists
	// Filters

	fivf_treatment_planlistsrch.filterList = <?php echo $ivf_treatment_plan_list->getFilterList() ?>;
	loadjs.done("fivf_treatment_planlistsrch");
});
</script>
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
<script>
loadjs.ready("head", function() {
	ew.PREVIEW_PLACEMENT = ew.CSS_FLIP ? "left" : "right";
	ew.PREVIEW_SINGLE_ROW = false;
	ew.PREVIEW_OVERLAY = false;
	loadjs("js/ewpreview.js", "preview");
});
</script>
<script>
ew.ready("head", "js/ewfixedheadertable.js", "fixedheadertable");
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$ivf_treatment_plan_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($ivf_treatment_plan_list->TotalRecords > 0 && $ivf_treatment_plan_list->ExportOptions->visible()) { ?>
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
<?php if (!$ivf_treatment_plan_list->isExport() || Config("EXPORT_MASTER_RECORD") && $ivf_treatment_plan_list->isExport("print")) { ?>
<?php
if ($ivf_treatment_plan_list->DbMasterFilter != "" && $ivf_treatment_plan->getCurrentMasterTable() == "ivf") {
	if ($ivf_treatment_plan_list->MasterRecordExists) {
		include_once "ivfmaster.php";
	}
}
?>
<?php
if ($ivf_treatment_plan_list->DbMasterFilter != "" && $ivf_treatment_plan->getCurrentMasterTable() == "view_donor_ivf") {
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
<?php if (!$ivf_treatment_plan_list->isExport() && !$ivf_treatment_plan->CurrentAction) { ?>
<form name="fivf_treatment_planlistsrch" id="fivf_treatment_planlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fivf_treatment_planlistsrch-search-panel" class="<?php echo $ivf_treatment_plan_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="ivf_treatment_plan">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $ivf_treatment_plan_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($ivf_treatment_plan_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($ivf_treatment_plan_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $ivf_treatment_plan_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($ivf_treatment_plan_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($ivf_treatment_plan_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($ivf_treatment_plan_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($ivf_treatment_plan_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $ivf_treatment_plan_list->showPageHeader(); ?>
<?php
$ivf_treatment_plan_list->showMessage();
?>
<?php if ($ivf_treatment_plan_list->TotalRecords > 0 || $ivf_treatment_plan->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($ivf_treatment_plan_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf_treatment_plan">
<?php if (!$ivf_treatment_plan_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$ivf_treatment_plan_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $ivf_treatment_plan_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ivf_treatment_plan_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fivf_treatment_planlist" id="fivf_treatment_planlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_treatment_plan">
<?php if ($ivf_treatment_plan->getCurrentMasterTable() == "ivf" && $ivf_treatment_plan->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="ivf">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($ivf_treatment_plan_list->RIDNO->getSessionValue()) ?>">
<input type="hidden" name="fk_Female" value="<?php echo HtmlEncode($ivf_treatment_plan_list->Name->getSessionValue()) ?>">
<?php } ?>
<?php if ($ivf_treatment_plan->getCurrentMasterTable() == "view_donor_ivf" && $ivf_treatment_plan->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="view_donor_ivf">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($ivf_treatment_plan_list->RIDNO->getSessionValue()) ?>">
<input type="hidden" name="fk_Female" value="<?php echo HtmlEncode($ivf_treatment_plan_list->Name->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_ivf_treatment_plan" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($ivf_treatment_plan_list->TotalRecords > 0 || $ivf_treatment_plan_list->isGridEdit()) { ?>
<table id="tbl_ivf_treatment_planlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$ivf_treatment_plan->RowType = ROWTYPE_HEADER;

// Render list options
$ivf_treatment_plan_list->renderListOptions();

// Render list options (header, left)
$ivf_treatment_plan_list->ListOptions->render("header", "left");
?>
<?php if ($ivf_treatment_plan_list->TreatmentStartDate->Visible) { // TreatmentStartDate ?>
	<?php if ($ivf_treatment_plan_list->SortUrl($ivf_treatment_plan_list->TreatmentStartDate) == "") { ?>
		<th data-name="TreatmentStartDate" class="<?php echo $ivf_treatment_plan_list->TreatmentStartDate->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_TreatmentStartDate" class="ivf_treatment_plan_TreatmentStartDate"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan_list->TreatmentStartDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TreatmentStartDate" class="<?php echo $ivf_treatment_plan_list->TreatmentStartDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_treatment_plan_list->SortUrl($ivf_treatment_plan_list->TreatmentStartDate) ?>', 1);"><div id="elh_ivf_treatment_plan_TreatmentStartDate" class="ivf_treatment_plan_TreatmentStartDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan_list->TreatmentStartDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_list->TreatmentStartDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_treatment_plan_list->TreatmentStartDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan_list->treatment_status->Visible) { // treatment_status ?>
	<?php if ($ivf_treatment_plan_list->SortUrl($ivf_treatment_plan_list->treatment_status) == "") { ?>
		<th data-name="treatment_status" class="<?php echo $ivf_treatment_plan_list->treatment_status->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_treatment_status" class="ivf_treatment_plan_treatment_status"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan_list->treatment_status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="treatment_status" class="<?php echo $ivf_treatment_plan_list->treatment_status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_treatment_plan_list->SortUrl($ivf_treatment_plan_list->treatment_status) ?>', 1);"><div id="elh_ivf_treatment_plan_treatment_status" class="ivf_treatment_plan_treatment_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan_list->treatment_status->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_list->treatment_status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_treatment_plan_list->treatment_status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan_list->ARTCYCLE->Visible) { // ARTCYCLE ?>
	<?php if ($ivf_treatment_plan_list->SortUrl($ivf_treatment_plan_list->ARTCYCLE) == "") { ?>
		<th data-name="ARTCYCLE" class="<?php echo $ivf_treatment_plan_list->ARTCYCLE->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_ARTCYCLE" class="ivf_treatment_plan_ARTCYCLE"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan_list->ARTCYCLE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ARTCYCLE" class="<?php echo $ivf_treatment_plan_list->ARTCYCLE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_treatment_plan_list->SortUrl($ivf_treatment_plan_list->ARTCYCLE) ?>', 1);"><div id="elh_ivf_treatment_plan_ARTCYCLE" class="ivf_treatment_plan_ARTCYCLE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan_list->ARTCYCLE->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_list->ARTCYCLE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_treatment_plan_list->ARTCYCLE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan_list->IVFCycleNO->Visible) { // IVFCycleNO ?>
	<?php if ($ivf_treatment_plan_list->SortUrl($ivf_treatment_plan_list->IVFCycleNO) == "") { ?>
		<th data-name="IVFCycleNO" class="<?php echo $ivf_treatment_plan_list->IVFCycleNO->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_IVFCycleNO" class="ivf_treatment_plan_IVFCycleNO"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan_list->IVFCycleNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IVFCycleNO" class="<?php echo $ivf_treatment_plan_list->IVFCycleNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_treatment_plan_list->SortUrl($ivf_treatment_plan_list->IVFCycleNO) ?>', 1);"><div id="elh_ivf_treatment_plan_IVFCycleNO" class="ivf_treatment_plan_IVFCycleNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan_list->IVFCycleNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_list->IVFCycleNO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_treatment_plan_list->IVFCycleNO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan_list->Treatment->Visible) { // Treatment ?>
	<?php if ($ivf_treatment_plan_list->SortUrl($ivf_treatment_plan_list->Treatment) == "") { ?>
		<th data-name="Treatment" class="<?php echo $ivf_treatment_plan_list->Treatment->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_Treatment" class="ivf_treatment_plan_Treatment"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan_list->Treatment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Treatment" class="<?php echo $ivf_treatment_plan_list->Treatment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_treatment_plan_list->SortUrl($ivf_treatment_plan_list->Treatment) ?>', 1);"><div id="elh_ivf_treatment_plan_Treatment" class="ivf_treatment_plan_Treatment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan_list->Treatment->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_list->Treatment->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_treatment_plan_list->Treatment->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan_list->TreatmentTec->Visible) { // TreatmentTec ?>
	<?php if ($ivf_treatment_plan_list->SortUrl($ivf_treatment_plan_list->TreatmentTec) == "") { ?>
		<th data-name="TreatmentTec" class="<?php echo $ivf_treatment_plan_list->TreatmentTec->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_TreatmentTec" class="ivf_treatment_plan_TreatmentTec"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan_list->TreatmentTec->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TreatmentTec" class="<?php echo $ivf_treatment_plan_list->TreatmentTec->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_treatment_plan_list->SortUrl($ivf_treatment_plan_list->TreatmentTec) ?>', 1);"><div id="elh_ivf_treatment_plan_TreatmentTec" class="ivf_treatment_plan_TreatmentTec">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan_list->TreatmentTec->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_list->TreatmentTec->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_treatment_plan_list->TreatmentTec->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan_list->TypeOfCycle->Visible) { // TypeOfCycle ?>
	<?php if ($ivf_treatment_plan_list->SortUrl($ivf_treatment_plan_list->TypeOfCycle) == "") { ?>
		<th data-name="TypeOfCycle" class="<?php echo $ivf_treatment_plan_list->TypeOfCycle->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_TypeOfCycle" class="ivf_treatment_plan_TypeOfCycle"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan_list->TypeOfCycle->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TypeOfCycle" class="<?php echo $ivf_treatment_plan_list->TypeOfCycle->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_treatment_plan_list->SortUrl($ivf_treatment_plan_list->TypeOfCycle) ?>', 1);"><div id="elh_ivf_treatment_plan_TypeOfCycle" class="ivf_treatment_plan_TypeOfCycle">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan_list->TypeOfCycle->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_list->TypeOfCycle->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_treatment_plan_list->TypeOfCycle->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan_list->SpermOrgin->Visible) { // SpermOrgin ?>
	<?php if ($ivf_treatment_plan_list->SortUrl($ivf_treatment_plan_list->SpermOrgin) == "") { ?>
		<th data-name="SpermOrgin" class="<?php echo $ivf_treatment_plan_list->SpermOrgin->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_SpermOrgin" class="ivf_treatment_plan_SpermOrgin"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan_list->SpermOrgin->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SpermOrgin" class="<?php echo $ivf_treatment_plan_list->SpermOrgin->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_treatment_plan_list->SortUrl($ivf_treatment_plan_list->SpermOrgin) ?>', 1);"><div id="elh_ivf_treatment_plan_SpermOrgin" class="ivf_treatment_plan_SpermOrgin">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan_list->SpermOrgin->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_list->SpermOrgin->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_treatment_plan_list->SpermOrgin->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan_list->State->Visible) { // State ?>
	<?php if ($ivf_treatment_plan_list->SortUrl($ivf_treatment_plan_list->State) == "") { ?>
		<th data-name="State" class="<?php echo $ivf_treatment_plan_list->State->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_State" class="ivf_treatment_plan_State"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan_list->State->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="State" class="<?php echo $ivf_treatment_plan_list->State->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_treatment_plan_list->SortUrl($ivf_treatment_plan_list->State) ?>', 1);"><div id="elh_ivf_treatment_plan_State" class="ivf_treatment_plan_State">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan_list->State->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_list->State->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_treatment_plan_list->State->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan_list->Origin->Visible) { // Origin ?>
	<?php if ($ivf_treatment_plan_list->SortUrl($ivf_treatment_plan_list->Origin) == "") { ?>
		<th data-name="Origin" class="<?php echo $ivf_treatment_plan_list->Origin->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_Origin" class="ivf_treatment_plan_Origin"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan_list->Origin->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Origin" class="<?php echo $ivf_treatment_plan_list->Origin->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_treatment_plan_list->SortUrl($ivf_treatment_plan_list->Origin) ?>', 1);"><div id="elh_ivf_treatment_plan_Origin" class="ivf_treatment_plan_Origin">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan_list->Origin->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_list->Origin->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_treatment_plan_list->Origin->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan_list->MACS->Visible) { // MACS ?>
	<?php if ($ivf_treatment_plan_list->SortUrl($ivf_treatment_plan_list->MACS) == "") { ?>
		<th data-name="MACS" class="<?php echo $ivf_treatment_plan_list->MACS->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_MACS" class="ivf_treatment_plan_MACS"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan_list->MACS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MACS" class="<?php echo $ivf_treatment_plan_list->MACS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_treatment_plan_list->SortUrl($ivf_treatment_plan_list->MACS) ?>', 1);"><div id="elh_ivf_treatment_plan_MACS" class="ivf_treatment_plan_MACS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan_list->MACS->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_list->MACS->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_treatment_plan_list->MACS->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan_list->Technique->Visible) { // Technique ?>
	<?php if ($ivf_treatment_plan_list->SortUrl($ivf_treatment_plan_list->Technique) == "") { ?>
		<th data-name="Technique" class="<?php echo $ivf_treatment_plan_list->Technique->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_Technique" class="ivf_treatment_plan_Technique"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan_list->Technique->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Technique" class="<?php echo $ivf_treatment_plan_list->Technique->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_treatment_plan_list->SortUrl($ivf_treatment_plan_list->Technique) ?>', 1);"><div id="elh_ivf_treatment_plan_Technique" class="ivf_treatment_plan_Technique">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan_list->Technique->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_list->Technique->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_treatment_plan_list->Technique->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan_list->PgdPlanning->Visible) { // PgdPlanning ?>
	<?php if ($ivf_treatment_plan_list->SortUrl($ivf_treatment_plan_list->PgdPlanning) == "") { ?>
		<th data-name="PgdPlanning" class="<?php echo $ivf_treatment_plan_list->PgdPlanning->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_PgdPlanning" class="ivf_treatment_plan_PgdPlanning"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan_list->PgdPlanning->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PgdPlanning" class="<?php echo $ivf_treatment_plan_list->PgdPlanning->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_treatment_plan_list->SortUrl($ivf_treatment_plan_list->PgdPlanning) ?>', 1);"><div id="elh_ivf_treatment_plan_PgdPlanning" class="ivf_treatment_plan_PgdPlanning">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan_list->PgdPlanning->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_list->PgdPlanning->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_treatment_plan_list->PgdPlanning->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan_list->IMSI->Visible) { // IMSI ?>
	<?php if ($ivf_treatment_plan_list->SortUrl($ivf_treatment_plan_list->IMSI) == "") { ?>
		<th data-name="IMSI" class="<?php echo $ivf_treatment_plan_list->IMSI->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_IMSI" class="ivf_treatment_plan_IMSI"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan_list->IMSI->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IMSI" class="<?php echo $ivf_treatment_plan_list->IMSI->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_treatment_plan_list->SortUrl($ivf_treatment_plan_list->IMSI) ?>', 1);"><div id="elh_ivf_treatment_plan_IMSI" class="ivf_treatment_plan_IMSI">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan_list->IMSI->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_list->IMSI->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_treatment_plan_list->IMSI->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan_list->SequentialCulture->Visible) { // SequentialCulture ?>
	<?php if ($ivf_treatment_plan_list->SortUrl($ivf_treatment_plan_list->SequentialCulture) == "") { ?>
		<th data-name="SequentialCulture" class="<?php echo $ivf_treatment_plan_list->SequentialCulture->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_SequentialCulture" class="ivf_treatment_plan_SequentialCulture"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan_list->SequentialCulture->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SequentialCulture" class="<?php echo $ivf_treatment_plan_list->SequentialCulture->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_treatment_plan_list->SortUrl($ivf_treatment_plan_list->SequentialCulture) ?>', 1);"><div id="elh_ivf_treatment_plan_SequentialCulture" class="ivf_treatment_plan_SequentialCulture">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan_list->SequentialCulture->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_list->SequentialCulture->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_treatment_plan_list->SequentialCulture->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan_list->TimeLapse->Visible) { // TimeLapse ?>
	<?php if ($ivf_treatment_plan_list->SortUrl($ivf_treatment_plan_list->TimeLapse) == "") { ?>
		<th data-name="TimeLapse" class="<?php echo $ivf_treatment_plan_list->TimeLapse->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_TimeLapse" class="ivf_treatment_plan_TimeLapse"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan_list->TimeLapse->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TimeLapse" class="<?php echo $ivf_treatment_plan_list->TimeLapse->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_treatment_plan_list->SortUrl($ivf_treatment_plan_list->TimeLapse) ?>', 1);"><div id="elh_ivf_treatment_plan_TimeLapse" class="ivf_treatment_plan_TimeLapse">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan_list->TimeLapse->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_list->TimeLapse->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_treatment_plan_list->TimeLapse->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan_list->AH->Visible) { // AH ?>
	<?php if ($ivf_treatment_plan_list->SortUrl($ivf_treatment_plan_list->AH) == "") { ?>
		<th data-name="AH" class="<?php echo $ivf_treatment_plan_list->AH->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_AH" class="ivf_treatment_plan_AH"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan_list->AH->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AH" class="<?php echo $ivf_treatment_plan_list->AH->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_treatment_plan_list->SortUrl($ivf_treatment_plan_list->AH) ?>', 1);"><div id="elh_ivf_treatment_plan_AH" class="ivf_treatment_plan_AH">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan_list->AH->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_list->AH->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_treatment_plan_list->AH->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan_list->Weight->Visible) { // Weight ?>
	<?php if ($ivf_treatment_plan_list->SortUrl($ivf_treatment_plan_list->Weight) == "") { ?>
		<th data-name="Weight" class="<?php echo $ivf_treatment_plan_list->Weight->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_Weight" class="ivf_treatment_plan_Weight"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan_list->Weight->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Weight" class="<?php echo $ivf_treatment_plan_list->Weight->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_treatment_plan_list->SortUrl($ivf_treatment_plan_list->Weight) ?>', 1);"><div id="elh_ivf_treatment_plan_Weight" class="ivf_treatment_plan_Weight">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan_list->Weight->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_list->Weight->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_treatment_plan_list->Weight->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan_list->BMI->Visible) { // BMI ?>
	<?php if ($ivf_treatment_plan_list->SortUrl($ivf_treatment_plan_list->BMI) == "") { ?>
		<th data-name="BMI" class="<?php echo $ivf_treatment_plan_list->BMI->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_BMI" class="ivf_treatment_plan_BMI"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan_list->BMI->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BMI" class="<?php echo $ivf_treatment_plan_list->BMI->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_treatment_plan_list->SortUrl($ivf_treatment_plan_list->BMI) ?>', 1);"><div id="elh_ivf_treatment_plan_BMI" class="ivf_treatment_plan_BMI">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan_list->BMI->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_list->BMI->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_treatment_plan_list->BMI->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan_list->MaleIndications->Visible) { // MaleIndications ?>
	<?php if ($ivf_treatment_plan_list->SortUrl($ivf_treatment_plan_list->MaleIndications) == "") { ?>
		<th data-name="MaleIndications" class="<?php echo $ivf_treatment_plan_list->MaleIndications->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_MaleIndications" class="ivf_treatment_plan_MaleIndications"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan_list->MaleIndications->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MaleIndications" class="<?php echo $ivf_treatment_plan_list->MaleIndications->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_treatment_plan_list->SortUrl($ivf_treatment_plan_list->MaleIndications) ?>', 1);"><div id="elh_ivf_treatment_plan_MaleIndications" class="ivf_treatment_plan_MaleIndications">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan_list->MaleIndications->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_list->MaleIndications->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_treatment_plan_list->MaleIndications->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan_list->FemaleIndications->Visible) { // FemaleIndications ?>
	<?php if ($ivf_treatment_plan_list->SortUrl($ivf_treatment_plan_list->FemaleIndications) == "") { ?>
		<th data-name="FemaleIndications" class="<?php echo $ivf_treatment_plan_list->FemaleIndications->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_FemaleIndications" class="ivf_treatment_plan_FemaleIndications"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan_list->FemaleIndications->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FemaleIndications" class="<?php echo $ivf_treatment_plan_list->FemaleIndications->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_treatment_plan_list->SortUrl($ivf_treatment_plan_list->FemaleIndications) ?>', 1);"><div id="elh_ivf_treatment_plan_FemaleIndications" class="ivf_treatment_plan_FemaleIndications">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan_list->FemaleIndications->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_list->FemaleIndications->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_treatment_plan_list->FemaleIndications->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
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
if ($ivf_treatment_plan_list->ExportAll && $ivf_treatment_plan_list->isExport()) {
	$ivf_treatment_plan_list->StopRecord = $ivf_treatment_plan_list->TotalRecords;
} else {

	// Set the last record to display
	if ($ivf_treatment_plan_list->TotalRecords > $ivf_treatment_plan_list->StartRecord + $ivf_treatment_plan_list->DisplayRecords - 1)
		$ivf_treatment_plan_list->StopRecord = $ivf_treatment_plan_list->StartRecord + $ivf_treatment_plan_list->DisplayRecords - 1;
	else
		$ivf_treatment_plan_list->StopRecord = $ivf_treatment_plan_list->TotalRecords;
}
$ivf_treatment_plan_list->RecordCount = $ivf_treatment_plan_list->StartRecord - 1;
if ($ivf_treatment_plan_list->Recordset && !$ivf_treatment_plan_list->Recordset->EOF) {
	$ivf_treatment_plan_list->Recordset->moveFirst();
	$selectLimit = $ivf_treatment_plan_list->UseSelectLimit;
	if (!$selectLimit && $ivf_treatment_plan_list->StartRecord > 1)
		$ivf_treatment_plan_list->Recordset->move($ivf_treatment_plan_list->StartRecord - 1);
} elseif (!$ivf_treatment_plan->AllowAddDeleteRow && $ivf_treatment_plan_list->StopRecord == 0) {
	$ivf_treatment_plan_list->StopRecord = $ivf_treatment_plan->GridAddRowCount;
}

// Initialize aggregate
$ivf_treatment_plan->RowType = ROWTYPE_AGGREGATEINIT;
$ivf_treatment_plan->resetAttributes();
$ivf_treatment_plan_list->renderRow();
while ($ivf_treatment_plan_list->RecordCount < $ivf_treatment_plan_list->StopRecord) {
	$ivf_treatment_plan_list->RecordCount++;
	if ($ivf_treatment_plan_list->RecordCount >= $ivf_treatment_plan_list->StartRecord) {
		$ivf_treatment_plan_list->RowCount++;

		// Set up key count
		$ivf_treatment_plan_list->KeyCount = $ivf_treatment_plan_list->RowIndex;

		// Init row class and style
		$ivf_treatment_plan->resetAttributes();
		$ivf_treatment_plan->CssClass = "";
		if ($ivf_treatment_plan_list->isGridAdd()) {
		} else {
			$ivf_treatment_plan_list->loadRowValues($ivf_treatment_plan_list->Recordset); // Load row values
		}
		$ivf_treatment_plan->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$ivf_treatment_plan->RowAttrs->merge(["data-rowindex" => $ivf_treatment_plan_list->RowCount, "id" => "r" . $ivf_treatment_plan_list->RowCount . "_ivf_treatment_plan", "data-rowtype" => $ivf_treatment_plan->RowType]);

		// Render row
		$ivf_treatment_plan_list->renderRow();

		// Render list options
		$ivf_treatment_plan_list->renderListOptions();
?>
	<tr <?php echo $ivf_treatment_plan->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_treatment_plan_list->ListOptions->render("body", "left", $ivf_treatment_plan_list->RowCount);
?>
	<?php if ($ivf_treatment_plan_list->TreatmentStartDate->Visible) { // TreatmentStartDate ?>
		<td data-name="TreatmentStartDate" <?php echo $ivf_treatment_plan_list->TreatmentStartDate->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_list->RowCount ?>_ivf_treatment_plan_TreatmentStartDate">
<span<?php echo $ivf_treatment_plan_list->TreatmentStartDate->viewAttributes() ?>><?php echo $ivf_treatment_plan_list->TreatmentStartDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan_list->treatment_status->Visible) { // treatment_status ?>
		<td data-name="treatment_status" <?php echo $ivf_treatment_plan_list->treatment_status->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_list->RowCount ?>_ivf_treatment_plan_treatment_status">
<span<?php echo $ivf_treatment_plan_list->treatment_status->viewAttributes() ?>><?php echo $ivf_treatment_plan_list->treatment_status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan_list->ARTCYCLE->Visible) { // ARTCYCLE ?>
		<td data-name="ARTCYCLE" <?php echo $ivf_treatment_plan_list->ARTCYCLE->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_list->RowCount ?>_ivf_treatment_plan_ARTCYCLE">
<span<?php echo $ivf_treatment_plan_list->ARTCYCLE->viewAttributes() ?>><?php echo $ivf_treatment_plan_list->ARTCYCLE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan_list->IVFCycleNO->Visible) { // IVFCycleNO ?>
		<td data-name="IVFCycleNO" <?php echo $ivf_treatment_plan_list->IVFCycleNO->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_list->RowCount ?>_ivf_treatment_plan_IVFCycleNO">
<span<?php echo $ivf_treatment_plan_list->IVFCycleNO->viewAttributes() ?>><?php echo $ivf_treatment_plan_list->IVFCycleNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan_list->Treatment->Visible) { // Treatment ?>
		<td data-name="Treatment" <?php echo $ivf_treatment_plan_list->Treatment->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_list->RowCount ?>_ivf_treatment_plan_Treatment">
<span<?php echo $ivf_treatment_plan_list->Treatment->viewAttributes() ?>><?php echo $ivf_treatment_plan_list->Treatment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan_list->TreatmentTec->Visible) { // TreatmentTec ?>
		<td data-name="TreatmentTec" <?php echo $ivf_treatment_plan_list->TreatmentTec->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_list->RowCount ?>_ivf_treatment_plan_TreatmentTec">
<span<?php echo $ivf_treatment_plan_list->TreatmentTec->viewAttributes() ?>><?php echo $ivf_treatment_plan_list->TreatmentTec->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan_list->TypeOfCycle->Visible) { // TypeOfCycle ?>
		<td data-name="TypeOfCycle" <?php echo $ivf_treatment_plan_list->TypeOfCycle->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_list->RowCount ?>_ivf_treatment_plan_TypeOfCycle">
<span<?php echo $ivf_treatment_plan_list->TypeOfCycle->viewAttributes() ?>><?php echo $ivf_treatment_plan_list->TypeOfCycle->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan_list->SpermOrgin->Visible) { // SpermOrgin ?>
		<td data-name="SpermOrgin" <?php echo $ivf_treatment_plan_list->SpermOrgin->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_list->RowCount ?>_ivf_treatment_plan_SpermOrgin">
<span<?php echo $ivf_treatment_plan_list->SpermOrgin->viewAttributes() ?>><?php echo $ivf_treatment_plan_list->SpermOrgin->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan_list->State->Visible) { // State ?>
		<td data-name="State" <?php echo $ivf_treatment_plan_list->State->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_list->RowCount ?>_ivf_treatment_plan_State">
<span<?php echo $ivf_treatment_plan_list->State->viewAttributes() ?>><?php echo $ivf_treatment_plan_list->State->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan_list->Origin->Visible) { // Origin ?>
		<td data-name="Origin" <?php echo $ivf_treatment_plan_list->Origin->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_list->RowCount ?>_ivf_treatment_plan_Origin">
<span<?php echo $ivf_treatment_plan_list->Origin->viewAttributes() ?>><?php echo $ivf_treatment_plan_list->Origin->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan_list->MACS->Visible) { // MACS ?>
		<td data-name="MACS" <?php echo $ivf_treatment_plan_list->MACS->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_list->RowCount ?>_ivf_treatment_plan_MACS">
<span<?php echo $ivf_treatment_plan_list->MACS->viewAttributes() ?>><?php echo $ivf_treatment_plan_list->MACS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan_list->Technique->Visible) { // Technique ?>
		<td data-name="Technique" <?php echo $ivf_treatment_plan_list->Technique->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_list->RowCount ?>_ivf_treatment_plan_Technique">
<span<?php echo $ivf_treatment_plan_list->Technique->viewAttributes() ?>><?php echo $ivf_treatment_plan_list->Technique->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan_list->PgdPlanning->Visible) { // PgdPlanning ?>
		<td data-name="PgdPlanning" <?php echo $ivf_treatment_plan_list->PgdPlanning->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_list->RowCount ?>_ivf_treatment_plan_PgdPlanning">
<span<?php echo $ivf_treatment_plan_list->PgdPlanning->viewAttributes() ?>><?php echo $ivf_treatment_plan_list->PgdPlanning->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan_list->IMSI->Visible) { // IMSI ?>
		<td data-name="IMSI" <?php echo $ivf_treatment_plan_list->IMSI->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_list->RowCount ?>_ivf_treatment_plan_IMSI">
<span<?php echo $ivf_treatment_plan_list->IMSI->viewAttributes() ?>><?php echo $ivf_treatment_plan_list->IMSI->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan_list->SequentialCulture->Visible) { // SequentialCulture ?>
		<td data-name="SequentialCulture" <?php echo $ivf_treatment_plan_list->SequentialCulture->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_list->RowCount ?>_ivf_treatment_plan_SequentialCulture">
<span<?php echo $ivf_treatment_plan_list->SequentialCulture->viewAttributes() ?>><?php echo $ivf_treatment_plan_list->SequentialCulture->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan_list->TimeLapse->Visible) { // TimeLapse ?>
		<td data-name="TimeLapse" <?php echo $ivf_treatment_plan_list->TimeLapse->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_list->RowCount ?>_ivf_treatment_plan_TimeLapse">
<span<?php echo $ivf_treatment_plan_list->TimeLapse->viewAttributes() ?>><?php echo $ivf_treatment_plan_list->TimeLapse->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan_list->AH->Visible) { // AH ?>
		<td data-name="AH" <?php echo $ivf_treatment_plan_list->AH->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_list->RowCount ?>_ivf_treatment_plan_AH">
<span<?php echo $ivf_treatment_plan_list->AH->viewAttributes() ?>><?php echo $ivf_treatment_plan_list->AH->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan_list->Weight->Visible) { // Weight ?>
		<td data-name="Weight" <?php echo $ivf_treatment_plan_list->Weight->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_list->RowCount ?>_ivf_treatment_plan_Weight">
<span<?php echo $ivf_treatment_plan_list->Weight->viewAttributes() ?>><?php echo $ivf_treatment_plan_list->Weight->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan_list->BMI->Visible) { // BMI ?>
		<td data-name="BMI" <?php echo $ivf_treatment_plan_list->BMI->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_list->RowCount ?>_ivf_treatment_plan_BMI">
<span<?php echo $ivf_treatment_plan_list->BMI->viewAttributes() ?>><?php echo $ivf_treatment_plan_list->BMI->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan_list->MaleIndications->Visible) { // MaleIndications ?>
		<td data-name="MaleIndications" <?php echo $ivf_treatment_plan_list->MaleIndications->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_list->RowCount ?>_ivf_treatment_plan_MaleIndications">
<span<?php echo $ivf_treatment_plan_list->MaleIndications->viewAttributes() ?>><?php echo $ivf_treatment_plan_list->MaleIndications->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan_list->FemaleIndications->Visible) { // FemaleIndications ?>
		<td data-name="FemaleIndications" <?php echo $ivf_treatment_plan_list->FemaleIndications->cellAttributes() ?>>
<span id="el<?php echo $ivf_treatment_plan_list->RowCount ?>_ivf_treatment_plan_FemaleIndications">
<span<?php echo $ivf_treatment_plan_list->FemaleIndications->viewAttributes() ?>><?php echo $ivf_treatment_plan_list->FemaleIndications->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_treatment_plan_list->ListOptions->render("body", "right", $ivf_treatment_plan_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$ivf_treatment_plan_list->isGridAdd())
		$ivf_treatment_plan_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$ivf_treatment_plan->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($ivf_treatment_plan_list->Recordset)
	$ivf_treatment_plan_list->Recordset->Close();
?>
<?php if (!$ivf_treatment_plan_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$ivf_treatment_plan_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $ivf_treatment_plan_list->Pager->render() ?>
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
<?php if ($ivf_treatment_plan_list->TotalRecords == 0 && !$ivf_treatment_plan->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $ivf_treatment_plan_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$ivf_treatment_plan_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$ivf_treatment_plan_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$ivf_treatment_plan->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_ivf_treatment_plan",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$ivf_treatment_plan_list->terminate();
?>