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
<?php include_once "header.php"; ?>
<?php if (!$ivf_ovum_pick_up_chart_list->isExport()) { ?>
<script>
var fivf_ovum_pick_up_chartlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fivf_ovum_pick_up_chartlist = currentForm = new ew.Form("fivf_ovum_pick_up_chartlist", "list");
	fivf_ovum_pick_up_chartlist.formKeyCountName = '<?php echo $ivf_ovum_pick_up_chart_list->FormKeyCountName ?>';
	loadjs.done("fivf_ovum_pick_up_chartlist");
});
var fivf_ovum_pick_up_chartlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fivf_ovum_pick_up_chartlistsrch = currentSearchForm = new ew.Form("fivf_ovum_pick_up_chartlistsrch");

	// Dynamic selection lists
	// Filters

	fivf_ovum_pick_up_chartlistsrch.filterList = <?php echo $ivf_ovum_pick_up_chart_list->getFilterList() ?>;
	loadjs.done("fivf_ovum_pick_up_chartlistsrch");
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
<?php if (!$ivf_ovum_pick_up_chart_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($ivf_ovum_pick_up_chart_list->TotalRecords > 0 && $ivf_ovum_pick_up_chart_list->ExportOptions->visible()) { ?>
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
<?php if (!$ivf_ovum_pick_up_chart_list->isExport() && !$ivf_ovum_pick_up_chart->CurrentAction) { ?>
<form name="fivf_ovum_pick_up_chartlistsrch" id="fivf_ovum_pick_up_chartlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fivf_ovum_pick_up_chartlistsrch-search-panel" class="<?php echo $ivf_ovum_pick_up_chart_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="ivf_ovum_pick_up_chart">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $ivf_ovum_pick_up_chart_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $ivf_ovum_pick_up_chart_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($ivf_ovum_pick_up_chart_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($ivf_ovum_pick_up_chart_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($ivf_ovum_pick_up_chart_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($ivf_ovum_pick_up_chart_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $ivf_ovum_pick_up_chart_list->showPageHeader(); ?>
<?php
$ivf_ovum_pick_up_chart_list->showMessage();
?>
<?php if ($ivf_ovum_pick_up_chart_list->TotalRecords > 0 || $ivf_ovum_pick_up_chart->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($ivf_ovum_pick_up_chart_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf_ovum_pick_up_chart">
<?php if (!$ivf_ovum_pick_up_chart_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$ivf_ovum_pick_up_chart_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $ivf_ovum_pick_up_chart_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ivf_ovum_pick_up_chart_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fivf_ovum_pick_up_chartlist" id="fivf_ovum_pick_up_chartlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_ovum_pick_up_chart">
<div id="gmp_ivf_ovum_pick_up_chart" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($ivf_ovum_pick_up_chart_list->TotalRecords > 0 || $ivf_ovum_pick_up_chart_list->isGridEdit()) { ?>
<table id="tbl_ivf_ovum_pick_up_chartlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$ivf_ovum_pick_up_chart->RowType = ROWTYPE_HEADER;

// Render list options
$ivf_ovum_pick_up_chart_list->renderListOptions();

// Render list options (header, left)
$ivf_ovum_pick_up_chart_list->ListOptions->render("header", "left");
?>
<?php if ($ivf_ovum_pick_up_chart_list->id->Visible) { // id ?>
	<?php if ($ivf_ovum_pick_up_chart_list->SortUrl($ivf_ovum_pick_up_chart_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $ivf_ovum_pick_up_chart_list->id->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_id" class="ivf_ovum_pick_up_chart_id"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $ivf_ovum_pick_up_chart_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_ovum_pick_up_chart_list->SortUrl($ivf_ovum_pick_up_chart_list->id) ?>', 1);"><div id="elh_ivf_ovum_pick_up_chart_id" class="ivf_ovum_pick_up_chart_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_list->RIDNo->Visible) { // RIDNo ?>
	<?php if ($ivf_ovum_pick_up_chart_list->SortUrl($ivf_ovum_pick_up_chart_list->RIDNo) == "") { ?>
		<th data-name="RIDNo" class="<?php echo $ivf_ovum_pick_up_chart_list->RIDNo->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_RIDNo" class="ivf_ovum_pick_up_chart_RIDNo"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart_list->RIDNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RIDNo" class="<?php echo $ivf_ovum_pick_up_chart_list->RIDNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_ovum_pick_up_chart_list->SortUrl($ivf_ovum_pick_up_chart_list->RIDNo) ?>', 1);"><div id="elh_ivf_ovum_pick_up_chart_RIDNo" class="ivf_ovum_pick_up_chart_RIDNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart_list->RIDNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart_list->RIDNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart_list->RIDNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_list->Name->Visible) { // Name ?>
	<?php if ($ivf_ovum_pick_up_chart_list->SortUrl($ivf_ovum_pick_up_chart_list->Name) == "") { ?>
		<th data-name="Name" class="<?php echo $ivf_ovum_pick_up_chart_list->Name->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_Name" class="ivf_ovum_pick_up_chart_Name"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart_list->Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Name" class="<?php echo $ivf_ovum_pick_up_chart_list->Name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_ovum_pick_up_chart_list->SortUrl($ivf_ovum_pick_up_chart_list->Name) ?>', 1);"><div id="elh_ivf_ovum_pick_up_chart_Name" class="ivf_ovum_pick_up_chart_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart_list->Name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart_list->Name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart_list->Name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_list->ARTCycle->Visible) { // ARTCycle ?>
	<?php if ($ivf_ovum_pick_up_chart_list->SortUrl($ivf_ovum_pick_up_chart_list->ARTCycle) == "") { ?>
		<th data-name="ARTCycle" class="<?php echo $ivf_ovum_pick_up_chart_list->ARTCycle->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_ARTCycle" class="ivf_ovum_pick_up_chart_ARTCycle"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart_list->ARTCycle->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ARTCycle" class="<?php echo $ivf_ovum_pick_up_chart_list->ARTCycle->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_ovum_pick_up_chart_list->SortUrl($ivf_ovum_pick_up_chart_list->ARTCycle) ?>', 1);"><div id="elh_ivf_ovum_pick_up_chart_ARTCycle" class="ivf_ovum_pick_up_chart_ARTCycle">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart_list->ARTCycle->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart_list->ARTCycle->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart_list->ARTCycle->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_list->Consultant->Visible) { // Consultant ?>
	<?php if ($ivf_ovum_pick_up_chart_list->SortUrl($ivf_ovum_pick_up_chart_list->Consultant) == "") { ?>
		<th data-name="Consultant" class="<?php echo $ivf_ovum_pick_up_chart_list->Consultant->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_Consultant" class="ivf_ovum_pick_up_chart_Consultant"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart_list->Consultant->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Consultant" class="<?php echo $ivf_ovum_pick_up_chart_list->Consultant->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_ovum_pick_up_chart_list->SortUrl($ivf_ovum_pick_up_chart_list->Consultant) ?>', 1);"><div id="elh_ivf_ovum_pick_up_chart_Consultant" class="ivf_ovum_pick_up_chart_Consultant">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart_list->Consultant->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart_list->Consultant->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart_list->Consultant->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_list->TotalDoseOfStimulation->Visible) { // TotalDoseOfStimulation ?>
	<?php if ($ivf_ovum_pick_up_chart_list->SortUrl($ivf_ovum_pick_up_chart_list->TotalDoseOfStimulation) == "") { ?>
		<th data-name="TotalDoseOfStimulation" class="<?php echo $ivf_ovum_pick_up_chart_list->TotalDoseOfStimulation->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_TotalDoseOfStimulation" class="ivf_ovum_pick_up_chart_TotalDoseOfStimulation"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart_list->TotalDoseOfStimulation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TotalDoseOfStimulation" class="<?php echo $ivf_ovum_pick_up_chart_list->TotalDoseOfStimulation->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_ovum_pick_up_chart_list->SortUrl($ivf_ovum_pick_up_chart_list->TotalDoseOfStimulation) ?>', 1);"><div id="elh_ivf_ovum_pick_up_chart_TotalDoseOfStimulation" class="ivf_ovum_pick_up_chart_TotalDoseOfStimulation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart_list->TotalDoseOfStimulation->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart_list->TotalDoseOfStimulation->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart_list->TotalDoseOfStimulation->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_list->Protocol->Visible) { // Protocol ?>
	<?php if ($ivf_ovum_pick_up_chart_list->SortUrl($ivf_ovum_pick_up_chart_list->Protocol) == "") { ?>
		<th data-name="Protocol" class="<?php echo $ivf_ovum_pick_up_chart_list->Protocol->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_Protocol" class="ivf_ovum_pick_up_chart_Protocol"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart_list->Protocol->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Protocol" class="<?php echo $ivf_ovum_pick_up_chart_list->Protocol->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_ovum_pick_up_chart_list->SortUrl($ivf_ovum_pick_up_chart_list->Protocol) ?>', 1);"><div id="elh_ivf_ovum_pick_up_chart_Protocol" class="ivf_ovum_pick_up_chart_Protocol">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart_list->Protocol->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart_list->Protocol->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart_list->Protocol->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_list->NumberOfDaysOfStimulation->Visible) { // NumberOfDaysOfStimulation ?>
	<?php if ($ivf_ovum_pick_up_chart_list->SortUrl($ivf_ovum_pick_up_chart_list->NumberOfDaysOfStimulation) == "") { ?>
		<th data-name="NumberOfDaysOfStimulation" class="<?php echo $ivf_ovum_pick_up_chart_list->NumberOfDaysOfStimulation->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation" class="ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart_list->NumberOfDaysOfStimulation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NumberOfDaysOfStimulation" class="<?php echo $ivf_ovum_pick_up_chart_list->NumberOfDaysOfStimulation->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_ovum_pick_up_chart_list->SortUrl($ivf_ovum_pick_up_chart_list->NumberOfDaysOfStimulation) ?>', 1);"><div id="elh_ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation" class="ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart_list->NumberOfDaysOfStimulation->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart_list->NumberOfDaysOfStimulation->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart_list->NumberOfDaysOfStimulation->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_list->TriggerDateTime->Visible) { // TriggerDateTime ?>
	<?php if ($ivf_ovum_pick_up_chart_list->SortUrl($ivf_ovum_pick_up_chart_list->TriggerDateTime) == "") { ?>
		<th data-name="TriggerDateTime" class="<?php echo $ivf_ovum_pick_up_chart_list->TriggerDateTime->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_TriggerDateTime" class="ivf_ovum_pick_up_chart_TriggerDateTime"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart_list->TriggerDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TriggerDateTime" class="<?php echo $ivf_ovum_pick_up_chart_list->TriggerDateTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_ovum_pick_up_chart_list->SortUrl($ivf_ovum_pick_up_chart_list->TriggerDateTime) ?>', 1);"><div id="elh_ivf_ovum_pick_up_chart_TriggerDateTime" class="ivf_ovum_pick_up_chart_TriggerDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart_list->TriggerDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart_list->TriggerDateTime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart_list->TriggerDateTime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_list->OPUDateTime->Visible) { // OPUDateTime ?>
	<?php if ($ivf_ovum_pick_up_chart_list->SortUrl($ivf_ovum_pick_up_chart_list->OPUDateTime) == "") { ?>
		<th data-name="OPUDateTime" class="<?php echo $ivf_ovum_pick_up_chart_list->OPUDateTime->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_OPUDateTime" class="ivf_ovum_pick_up_chart_OPUDateTime"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart_list->OPUDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OPUDateTime" class="<?php echo $ivf_ovum_pick_up_chart_list->OPUDateTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_ovum_pick_up_chart_list->SortUrl($ivf_ovum_pick_up_chart_list->OPUDateTime) ?>', 1);"><div id="elh_ivf_ovum_pick_up_chart_OPUDateTime" class="ivf_ovum_pick_up_chart_OPUDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart_list->OPUDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart_list->OPUDateTime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart_list->OPUDateTime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_list->HoursAfterTrigger->Visible) { // HoursAfterTrigger ?>
	<?php if ($ivf_ovum_pick_up_chart_list->SortUrl($ivf_ovum_pick_up_chart_list->HoursAfterTrigger) == "") { ?>
		<th data-name="HoursAfterTrigger" class="<?php echo $ivf_ovum_pick_up_chart_list->HoursAfterTrigger->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_HoursAfterTrigger" class="ivf_ovum_pick_up_chart_HoursAfterTrigger"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart_list->HoursAfterTrigger->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HoursAfterTrigger" class="<?php echo $ivf_ovum_pick_up_chart_list->HoursAfterTrigger->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_ovum_pick_up_chart_list->SortUrl($ivf_ovum_pick_up_chart_list->HoursAfterTrigger) ?>', 1);"><div id="elh_ivf_ovum_pick_up_chart_HoursAfterTrigger" class="ivf_ovum_pick_up_chart_HoursAfterTrigger">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart_list->HoursAfterTrigger->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart_list->HoursAfterTrigger->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart_list->HoursAfterTrigger->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_list->SerumE2->Visible) { // SerumE2 ?>
	<?php if ($ivf_ovum_pick_up_chart_list->SortUrl($ivf_ovum_pick_up_chart_list->SerumE2) == "") { ?>
		<th data-name="SerumE2" class="<?php echo $ivf_ovum_pick_up_chart_list->SerumE2->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_SerumE2" class="ivf_ovum_pick_up_chart_SerumE2"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart_list->SerumE2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SerumE2" class="<?php echo $ivf_ovum_pick_up_chart_list->SerumE2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_ovum_pick_up_chart_list->SortUrl($ivf_ovum_pick_up_chart_list->SerumE2) ?>', 1);"><div id="elh_ivf_ovum_pick_up_chart_SerumE2" class="ivf_ovum_pick_up_chart_SerumE2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart_list->SerumE2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart_list->SerumE2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart_list->SerumE2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_list->SerumP4->Visible) { // SerumP4 ?>
	<?php if ($ivf_ovum_pick_up_chart_list->SortUrl($ivf_ovum_pick_up_chart_list->SerumP4) == "") { ?>
		<th data-name="SerumP4" class="<?php echo $ivf_ovum_pick_up_chart_list->SerumP4->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_SerumP4" class="ivf_ovum_pick_up_chart_SerumP4"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart_list->SerumP4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SerumP4" class="<?php echo $ivf_ovum_pick_up_chart_list->SerumP4->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_ovum_pick_up_chart_list->SortUrl($ivf_ovum_pick_up_chart_list->SerumP4) ?>', 1);"><div id="elh_ivf_ovum_pick_up_chart_SerumP4" class="ivf_ovum_pick_up_chart_SerumP4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart_list->SerumP4->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart_list->SerumP4->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart_list->SerumP4->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_list->FORT->Visible) { // FORT ?>
	<?php if ($ivf_ovum_pick_up_chart_list->SortUrl($ivf_ovum_pick_up_chart_list->FORT) == "") { ?>
		<th data-name="FORT" class="<?php echo $ivf_ovum_pick_up_chart_list->FORT->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_FORT" class="ivf_ovum_pick_up_chart_FORT"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart_list->FORT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FORT" class="<?php echo $ivf_ovum_pick_up_chart_list->FORT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_ovum_pick_up_chart_list->SortUrl($ivf_ovum_pick_up_chart_list->FORT) ?>', 1);"><div id="elh_ivf_ovum_pick_up_chart_FORT" class="ivf_ovum_pick_up_chart_FORT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart_list->FORT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart_list->FORT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart_list->FORT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_list->ExperctedOocytes->Visible) { // ExperctedOocytes ?>
	<?php if ($ivf_ovum_pick_up_chart_list->SortUrl($ivf_ovum_pick_up_chart_list->ExperctedOocytes) == "") { ?>
		<th data-name="ExperctedOocytes" class="<?php echo $ivf_ovum_pick_up_chart_list->ExperctedOocytes->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_ExperctedOocytes" class="ivf_ovum_pick_up_chart_ExperctedOocytes"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart_list->ExperctedOocytes->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ExperctedOocytes" class="<?php echo $ivf_ovum_pick_up_chart_list->ExperctedOocytes->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_ovum_pick_up_chart_list->SortUrl($ivf_ovum_pick_up_chart_list->ExperctedOocytes) ?>', 1);"><div id="elh_ivf_ovum_pick_up_chart_ExperctedOocytes" class="ivf_ovum_pick_up_chart_ExperctedOocytes">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart_list->ExperctedOocytes->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart_list->ExperctedOocytes->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart_list->ExperctedOocytes->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_list->NoOfOocytesRetrieved->Visible) { // NoOfOocytesRetrieved ?>
	<?php if ($ivf_ovum_pick_up_chart_list->SortUrl($ivf_ovum_pick_up_chart_list->NoOfOocytesRetrieved) == "") { ?>
		<th data-name="NoOfOocytesRetrieved" class="<?php echo $ivf_ovum_pick_up_chart_list->NoOfOocytesRetrieved->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_NoOfOocytesRetrieved" class="ivf_ovum_pick_up_chart_NoOfOocytesRetrieved"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart_list->NoOfOocytesRetrieved->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoOfOocytesRetrieved" class="<?php echo $ivf_ovum_pick_up_chart_list->NoOfOocytesRetrieved->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_ovum_pick_up_chart_list->SortUrl($ivf_ovum_pick_up_chart_list->NoOfOocytesRetrieved) ?>', 1);"><div id="elh_ivf_ovum_pick_up_chart_NoOfOocytesRetrieved" class="ivf_ovum_pick_up_chart_NoOfOocytesRetrieved">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart_list->NoOfOocytesRetrieved->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart_list->NoOfOocytesRetrieved->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart_list->NoOfOocytesRetrieved->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_list->OocytesRetreivalRate->Visible) { // OocytesRetreivalRate ?>
	<?php if ($ivf_ovum_pick_up_chart_list->SortUrl($ivf_ovum_pick_up_chart_list->OocytesRetreivalRate) == "") { ?>
		<th data-name="OocytesRetreivalRate" class="<?php echo $ivf_ovum_pick_up_chart_list->OocytesRetreivalRate->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_OocytesRetreivalRate" class="ivf_ovum_pick_up_chart_OocytesRetreivalRate"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart_list->OocytesRetreivalRate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OocytesRetreivalRate" class="<?php echo $ivf_ovum_pick_up_chart_list->OocytesRetreivalRate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_ovum_pick_up_chart_list->SortUrl($ivf_ovum_pick_up_chart_list->OocytesRetreivalRate) ?>', 1);"><div id="elh_ivf_ovum_pick_up_chart_OocytesRetreivalRate" class="ivf_ovum_pick_up_chart_OocytesRetreivalRate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart_list->OocytesRetreivalRate->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart_list->OocytesRetreivalRate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart_list->OocytesRetreivalRate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_list->Anesthesia->Visible) { // Anesthesia ?>
	<?php if ($ivf_ovum_pick_up_chart_list->SortUrl($ivf_ovum_pick_up_chart_list->Anesthesia) == "") { ?>
		<th data-name="Anesthesia" class="<?php echo $ivf_ovum_pick_up_chart_list->Anesthesia->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_Anesthesia" class="ivf_ovum_pick_up_chart_Anesthesia"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart_list->Anesthesia->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Anesthesia" class="<?php echo $ivf_ovum_pick_up_chart_list->Anesthesia->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_ovum_pick_up_chart_list->SortUrl($ivf_ovum_pick_up_chart_list->Anesthesia) ?>', 1);"><div id="elh_ivf_ovum_pick_up_chart_Anesthesia" class="ivf_ovum_pick_up_chart_Anesthesia">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart_list->Anesthesia->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart_list->Anesthesia->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart_list->Anesthesia->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_list->TrialCannulation->Visible) { // TrialCannulation ?>
	<?php if ($ivf_ovum_pick_up_chart_list->SortUrl($ivf_ovum_pick_up_chart_list->TrialCannulation) == "") { ?>
		<th data-name="TrialCannulation" class="<?php echo $ivf_ovum_pick_up_chart_list->TrialCannulation->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_TrialCannulation" class="ivf_ovum_pick_up_chart_TrialCannulation"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart_list->TrialCannulation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TrialCannulation" class="<?php echo $ivf_ovum_pick_up_chart_list->TrialCannulation->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_ovum_pick_up_chart_list->SortUrl($ivf_ovum_pick_up_chart_list->TrialCannulation) ?>', 1);"><div id="elh_ivf_ovum_pick_up_chart_TrialCannulation" class="ivf_ovum_pick_up_chart_TrialCannulation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart_list->TrialCannulation->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart_list->TrialCannulation->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart_list->TrialCannulation->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_list->UCL->Visible) { // UCL ?>
	<?php if ($ivf_ovum_pick_up_chart_list->SortUrl($ivf_ovum_pick_up_chart_list->UCL) == "") { ?>
		<th data-name="UCL" class="<?php echo $ivf_ovum_pick_up_chart_list->UCL->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_UCL" class="ivf_ovum_pick_up_chart_UCL"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart_list->UCL->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UCL" class="<?php echo $ivf_ovum_pick_up_chart_list->UCL->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_ovum_pick_up_chart_list->SortUrl($ivf_ovum_pick_up_chart_list->UCL) ?>', 1);"><div id="elh_ivf_ovum_pick_up_chart_UCL" class="ivf_ovum_pick_up_chart_UCL">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart_list->UCL->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart_list->UCL->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart_list->UCL->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_list->Angle->Visible) { // Angle ?>
	<?php if ($ivf_ovum_pick_up_chart_list->SortUrl($ivf_ovum_pick_up_chart_list->Angle) == "") { ?>
		<th data-name="Angle" class="<?php echo $ivf_ovum_pick_up_chart_list->Angle->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_Angle" class="ivf_ovum_pick_up_chart_Angle"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart_list->Angle->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Angle" class="<?php echo $ivf_ovum_pick_up_chart_list->Angle->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_ovum_pick_up_chart_list->SortUrl($ivf_ovum_pick_up_chart_list->Angle) ?>', 1);"><div id="elh_ivf_ovum_pick_up_chart_Angle" class="ivf_ovum_pick_up_chart_Angle">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart_list->Angle->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart_list->Angle->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart_list->Angle->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_list->EMS->Visible) { // EMS ?>
	<?php if ($ivf_ovum_pick_up_chart_list->SortUrl($ivf_ovum_pick_up_chart_list->EMS) == "") { ?>
		<th data-name="EMS" class="<?php echo $ivf_ovum_pick_up_chart_list->EMS->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_EMS" class="ivf_ovum_pick_up_chart_EMS"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart_list->EMS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EMS" class="<?php echo $ivf_ovum_pick_up_chart_list->EMS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_ovum_pick_up_chart_list->SortUrl($ivf_ovum_pick_up_chart_list->EMS) ?>', 1);"><div id="elh_ivf_ovum_pick_up_chart_EMS" class="ivf_ovum_pick_up_chart_EMS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart_list->EMS->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart_list->EMS->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart_list->EMS->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_list->Cannulation->Visible) { // Cannulation ?>
	<?php if ($ivf_ovum_pick_up_chart_list->SortUrl($ivf_ovum_pick_up_chart_list->Cannulation) == "") { ?>
		<th data-name="Cannulation" class="<?php echo $ivf_ovum_pick_up_chart_list->Cannulation->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_Cannulation" class="ivf_ovum_pick_up_chart_Cannulation"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart_list->Cannulation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Cannulation" class="<?php echo $ivf_ovum_pick_up_chart_list->Cannulation->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_ovum_pick_up_chart_list->SortUrl($ivf_ovum_pick_up_chart_list->Cannulation) ?>', 1);"><div id="elh_ivf_ovum_pick_up_chart_Cannulation" class="ivf_ovum_pick_up_chart_Cannulation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart_list->Cannulation->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart_list->Cannulation->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart_list->Cannulation->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_list->NoOfOocytesRetrievedd->Visible) { // NoOfOocytesRetrievedd ?>
	<?php if ($ivf_ovum_pick_up_chart_list->SortUrl($ivf_ovum_pick_up_chart_list->NoOfOocytesRetrievedd) == "") { ?>
		<th data-name="NoOfOocytesRetrievedd" class="<?php echo $ivf_ovum_pick_up_chart_list->NoOfOocytesRetrievedd->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd" class="ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart_list->NoOfOocytesRetrievedd->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoOfOocytesRetrievedd" class="<?php echo $ivf_ovum_pick_up_chart_list->NoOfOocytesRetrievedd->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_ovum_pick_up_chart_list->SortUrl($ivf_ovum_pick_up_chart_list->NoOfOocytesRetrievedd) ?>', 1);"><div id="elh_ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd" class="ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart_list->NoOfOocytesRetrievedd->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart_list->NoOfOocytesRetrievedd->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart_list->NoOfOocytesRetrievedd->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_list->PlanT->Visible) { // PlanT ?>
	<?php if ($ivf_ovum_pick_up_chart_list->SortUrl($ivf_ovum_pick_up_chart_list->PlanT) == "") { ?>
		<th data-name="PlanT" class="<?php echo $ivf_ovum_pick_up_chart_list->PlanT->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_PlanT" class="ivf_ovum_pick_up_chart_PlanT"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart_list->PlanT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PlanT" class="<?php echo $ivf_ovum_pick_up_chart_list->PlanT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_ovum_pick_up_chart_list->SortUrl($ivf_ovum_pick_up_chart_list->PlanT) ?>', 1);"><div id="elh_ivf_ovum_pick_up_chart_PlanT" class="ivf_ovum_pick_up_chart_PlanT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart_list->PlanT->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart_list->PlanT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart_list->PlanT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_list->ReviewDate->Visible) { // ReviewDate ?>
	<?php if ($ivf_ovum_pick_up_chart_list->SortUrl($ivf_ovum_pick_up_chart_list->ReviewDate) == "") { ?>
		<th data-name="ReviewDate" class="<?php echo $ivf_ovum_pick_up_chart_list->ReviewDate->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_ReviewDate" class="ivf_ovum_pick_up_chart_ReviewDate"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart_list->ReviewDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReviewDate" class="<?php echo $ivf_ovum_pick_up_chart_list->ReviewDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_ovum_pick_up_chart_list->SortUrl($ivf_ovum_pick_up_chart_list->ReviewDate) ?>', 1);"><div id="elh_ivf_ovum_pick_up_chart_ReviewDate" class="ivf_ovum_pick_up_chart_ReviewDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart_list->ReviewDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart_list->ReviewDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart_list->ReviewDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_list->ReviewDoctor->Visible) { // ReviewDoctor ?>
	<?php if ($ivf_ovum_pick_up_chart_list->SortUrl($ivf_ovum_pick_up_chart_list->ReviewDoctor) == "") { ?>
		<th data-name="ReviewDoctor" class="<?php echo $ivf_ovum_pick_up_chart_list->ReviewDoctor->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_ReviewDoctor" class="ivf_ovum_pick_up_chart_ReviewDoctor"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart_list->ReviewDoctor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReviewDoctor" class="<?php echo $ivf_ovum_pick_up_chart_list->ReviewDoctor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_ovum_pick_up_chart_list->SortUrl($ivf_ovum_pick_up_chart_list->ReviewDoctor) ?>', 1);"><div id="elh_ivf_ovum_pick_up_chart_ReviewDoctor" class="ivf_ovum_pick_up_chart_ReviewDoctor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart_list->ReviewDoctor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart_list->ReviewDoctor->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart_list->ReviewDoctor->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_list->TidNo->Visible) { // TidNo ?>
	<?php if ($ivf_ovum_pick_up_chart_list->SortUrl($ivf_ovum_pick_up_chart_list->TidNo) == "") { ?>
		<th data-name="TidNo" class="<?php echo $ivf_ovum_pick_up_chart_list->TidNo->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_TidNo" class="ivf_ovum_pick_up_chart_TidNo"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart_list->TidNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TidNo" class="<?php echo $ivf_ovum_pick_up_chart_list->TidNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_ovum_pick_up_chart_list->SortUrl($ivf_ovum_pick_up_chart_list->TidNo) ?>', 1);"><div id="elh_ivf_ovum_pick_up_chart_TidNo" class="ivf_ovum_pick_up_chart_TidNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart_list->TidNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart_list->TidNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart_list->TidNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
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
if ($ivf_ovum_pick_up_chart_list->ExportAll && $ivf_ovum_pick_up_chart_list->isExport()) {
	$ivf_ovum_pick_up_chart_list->StopRecord = $ivf_ovum_pick_up_chart_list->TotalRecords;
} else {

	// Set the last record to display
	if ($ivf_ovum_pick_up_chart_list->TotalRecords > $ivf_ovum_pick_up_chart_list->StartRecord + $ivf_ovum_pick_up_chart_list->DisplayRecords - 1)
		$ivf_ovum_pick_up_chart_list->StopRecord = $ivf_ovum_pick_up_chart_list->StartRecord + $ivf_ovum_pick_up_chart_list->DisplayRecords - 1;
	else
		$ivf_ovum_pick_up_chart_list->StopRecord = $ivf_ovum_pick_up_chart_list->TotalRecords;
}
$ivf_ovum_pick_up_chart_list->RecordCount = $ivf_ovum_pick_up_chart_list->StartRecord - 1;
if ($ivf_ovum_pick_up_chart_list->Recordset && !$ivf_ovum_pick_up_chart_list->Recordset->EOF) {
	$ivf_ovum_pick_up_chart_list->Recordset->moveFirst();
	$selectLimit = $ivf_ovum_pick_up_chart_list->UseSelectLimit;
	if (!$selectLimit && $ivf_ovum_pick_up_chart_list->StartRecord > 1)
		$ivf_ovum_pick_up_chart_list->Recordset->move($ivf_ovum_pick_up_chart_list->StartRecord - 1);
} elseif (!$ivf_ovum_pick_up_chart->AllowAddDeleteRow && $ivf_ovum_pick_up_chart_list->StopRecord == 0) {
	$ivf_ovum_pick_up_chart_list->StopRecord = $ivf_ovum_pick_up_chart->GridAddRowCount;
}

// Initialize aggregate
$ivf_ovum_pick_up_chart->RowType = ROWTYPE_AGGREGATEINIT;
$ivf_ovum_pick_up_chart->resetAttributes();
$ivf_ovum_pick_up_chart_list->renderRow();
while ($ivf_ovum_pick_up_chart_list->RecordCount < $ivf_ovum_pick_up_chart_list->StopRecord) {
	$ivf_ovum_pick_up_chart_list->RecordCount++;
	if ($ivf_ovum_pick_up_chart_list->RecordCount >= $ivf_ovum_pick_up_chart_list->StartRecord) {
		$ivf_ovum_pick_up_chart_list->RowCount++;

		// Set up key count
		$ivf_ovum_pick_up_chart_list->KeyCount = $ivf_ovum_pick_up_chart_list->RowIndex;

		// Init row class and style
		$ivf_ovum_pick_up_chart->resetAttributes();
		$ivf_ovum_pick_up_chart->CssClass = "";
		if ($ivf_ovum_pick_up_chart_list->isGridAdd()) {
		} else {
			$ivf_ovum_pick_up_chart_list->loadRowValues($ivf_ovum_pick_up_chart_list->Recordset); // Load row values
		}
		$ivf_ovum_pick_up_chart->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$ivf_ovum_pick_up_chart->RowAttrs->merge(["data-rowindex" => $ivf_ovum_pick_up_chart_list->RowCount, "id" => "r" . $ivf_ovum_pick_up_chart_list->RowCount . "_ivf_ovum_pick_up_chart", "data-rowtype" => $ivf_ovum_pick_up_chart->RowType]);

		// Render row
		$ivf_ovum_pick_up_chart_list->renderRow();

		// Render list options
		$ivf_ovum_pick_up_chart_list->renderListOptions();
?>
	<tr <?php echo $ivf_ovum_pick_up_chart->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_ovum_pick_up_chart_list->ListOptions->render("body", "left", $ivf_ovum_pick_up_chart_list->RowCount);
?>
	<?php if ($ivf_ovum_pick_up_chart_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $ivf_ovum_pick_up_chart_list->id->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_list->RowCount ?>_ivf_ovum_pick_up_chart_id">
<span<?php echo $ivf_ovum_pick_up_chart_list->id->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart_list->RIDNo->Visible) { // RIDNo ?>
		<td data-name="RIDNo" <?php echo $ivf_ovum_pick_up_chart_list->RIDNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_list->RowCount ?>_ivf_ovum_pick_up_chart_RIDNo">
<span<?php echo $ivf_ovum_pick_up_chart_list->RIDNo->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_list->RIDNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart_list->Name->Visible) { // Name ?>
		<td data-name="Name" <?php echo $ivf_ovum_pick_up_chart_list->Name->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_list->RowCount ?>_ivf_ovum_pick_up_chart_Name">
<span<?php echo $ivf_ovum_pick_up_chart_list->Name->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_list->Name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart_list->ARTCycle->Visible) { // ARTCycle ?>
		<td data-name="ARTCycle" <?php echo $ivf_ovum_pick_up_chart_list->ARTCycle->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_list->RowCount ?>_ivf_ovum_pick_up_chart_ARTCycle">
<span<?php echo $ivf_ovum_pick_up_chart_list->ARTCycle->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_list->ARTCycle->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart_list->Consultant->Visible) { // Consultant ?>
		<td data-name="Consultant" <?php echo $ivf_ovum_pick_up_chart_list->Consultant->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_list->RowCount ?>_ivf_ovum_pick_up_chart_Consultant">
<span<?php echo $ivf_ovum_pick_up_chart_list->Consultant->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_list->Consultant->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart_list->TotalDoseOfStimulation->Visible) { // TotalDoseOfStimulation ?>
		<td data-name="TotalDoseOfStimulation" <?php echo $ivf_ovum_pick_up_chart_list->TotalDoseOfStimulation->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_list->RowCount ?>_ivf_ovum_pick_up_chart_TotalDoseOfStimulation">
<span<?php echo $ivf_ovum_pick_up_chart_list->TotalDoseOfStimulation->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_list->TotalDoseOfStimulation->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart_list->Protocol->Visible) { // Protocol ?>
		<td data-name="Protocol" <?php echo $ivf_ovum_pick_up_chart_list->Protocol->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_list->RowCount ?>_ivf_ovum_pick_up_chart_Protocol">
<span<?php echo $ivf_ovum_pick_up_chart_list->Protocol->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_list->Protocol->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart_list->NumberOfDaysOfStimulation->Visible) { // NumberOfDaysOfStimulation ?>
		<td data-name="NumberOfDaysOfStimulation" <?php echo $ivf_ovum_pick_up_chart_list->NumberOfDaysOfStimulation->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_list->RowCount ?>_ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation">
<span<?php echo $ivf_ovum_pick_up_chart_list->NumberOfDaysOfStimulation->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_list->NumberOfDaysOfStimulation->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart_list->TriggerDateTime->Visible) { // TriggerDateTime ?>
		<td data-name="TriggerDateTime" <?php echo $ivf_ovum_pick_up_chart_list->TriggerDateTime->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_list->RowCount ?>_ivf_ovum_pick_up_chart_TriggerDateTime">
<span<?php echo $ivf_ovum_pick_up_chart_list->TriggerDateTime->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_list->TriggerDateTime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart_list->OPUDateTime->Visible) { // OPUDateTime ?>
		<td data-name="OPUDateTime" <?php echo $ivf_ovum_pick_up_chart_list->OPUDateTime->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_list->RowCount ?>_ivf_ovum_pick_up_chart_OPUDateTime">
<span<?php echo $ivf_ovum_pick_up_chart_list->OPUDateTime->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_list->OPUDateTime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart_list->HoursAfterTrigger->Visible) { // HoursAfterTrigger ?>
		<td data-name="HoursAfterTrigger" <?php echo $ivf_ovum_pick_up_chart_list->HoursAfterTrigger->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_list->RowCount ?>_ivf_ovum_pick_up_chart_HoursAfterTrigger">
<span<?php echo $ivf_ovum_pick_up_chart_list->HoursAfterTrigger->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_list->HoursAfterTrigger->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart_list->SerumE2->Visible) { // SerumE2 ?>
		<td data-name="SerumE2" <?php echo $ivf_ovum_pick_up_chart_list->SerumE2->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_list->RowCount ?>_ivf_ovum_pick_up_chart_SerumE2">
<span<?php echo $ivf_ovum_pick_up_chart_list->SerumE2->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_list->SerumE2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart_list->SerumP4->Visible) { // SerumP4 ?>
		<td data-name="SerumP4" <?php echo $ivf_ovum_pick_up_chart_list->SerumP4->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_list->RowCount ?>_ivf_ovum_pick_up_chart_SerumP4">
<span<?php echo $ivf_ovum_pick_up_chart_list->SerumP4->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_list->SerumP4->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart_list->FORT->Visible) { // FORT ?>
		<td data-name="FORT" <?php echo $ivf_ovum_pick_up_chart_list->FORT->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_list->RowCount ?>_ivf_ovum_pick_up_chart_FORT">
<span<?php echo $ivf_ovum_pick_up_chart_list->FORT->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_list->FORT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart_list->ExperctedOocytes->Visible) { // ExperctedOocytes ?>
		<td data-name="ExperctedOocytes" <?php echo $ivf_ovum_pick_up_chart_list->ExperctedOocytes->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_list->RowCount ?>_ivf_ovum_pick_up_chart_ExperctedOocytes">
<span<?php echo $ivf_ovum_pick_up_chart_list->ExperctedOocytes->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_list->ExperctedOocytes->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart_list->NoOfOocytesRetrieved->Visible) { // NoOfOocytesRetrieved ?>
		<td data-name="NoOfOocytesRetrieved" <?php echo $ivf_ovum_pick_up_chart_list->NoOfOocytesRetrieved->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_list->RowCount ?>_ivf_ovum_pick_up_chart_NoOfOocytesRetrieved">
<span<?php echo $ivf_ovum_pick_up_chart_list->NoOfOocytesRetrieved->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_list->NoOfOocytesRetrieved->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart_list->OocytesRetreivalRate->Visible) { // OocytesRetreivalRate ?>
		<td data-name="OocytesRetreivalRate" <?php echo $ivf_ovum_pick_up_chart_list->OocytesRetreivalRate->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_list->RowCount ?>_ivf_ovum_pick_up_chart_OocytesRetreivalRate">
<span<?php echo $ivf_ovum_pick_up_chart_list->OocytesRetreivalRate->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_list->OocytesRetreivalRate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart_list->Anesthesia->Visible) { // Anesthesia ?>
		<td data-name="Anesthesia" <?php echo $ivf_ovum_pick_up_chart_list->Anesthesia->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_list->RowCount ?>_ivf_ovum_pick_up_chart_Anesthesia">
<span<?php echo $ivf_ovum_pick_up_chart_list->Anesthesia->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_list->Anesthesia->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart_list->TrialCannulation->Visible) { // TrialCannulation ?>
		<td data-name="TrialCannulation" <?php echo $ivf_ovum_pick_up_chart_list->TrialCannulation->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_list->RowCount ?>_ivf_ovum_pick_up_chart_TrialCannulation">
<span<?php echo $ivf_ovum_pick_up_chart_list->TrialCannulation->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_list->TrialCannulation->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart_list->UCL->Visible) { // UCL ?>
		<td data-name="UCL" <?php echo $ivf_ovum_pick_up_chart_list->UCL->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_list->RowCount ?>_ivf_ovum_pick_up_chart_UCL">
<span<?php echo $ivf_ovum_pick_up_chart_list->UCL->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_list->UCL->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart_list->Angle->Visible) { // Angle ?>
		<td data-name="Angle" <?php echo $ivf_ovum_pick_up_chart_list->Angle->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_list->RowCount ?>_ivf_ovum_pick_up_chart_Angle">
<span<?php echo $ivf_ovum_pick_up_chart_list->Angle->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_list->Angle->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart_list->EMS->Visible) { // EMS ?>
		<td data-name="EMS" <?php echo $ivf_ovum_pick_up_chart_list->EMS->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_list->RowCount ?>_ivf_ovum_pick_up_chart_EMS">
<span<?php echo $ivf_ovum_pick_up_chart_list->EMS->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_list->EMS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart_list->Cannulation->Visible) { // Cannulation ?>
		<td data-name="Cannulation" <?php echo $ivf_ovum_pick_up_chart_list->Cannulation->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_list->RowCount ?>_ivf_ovum_pick_up_chart_Cannulation">
<span<?php echo $ivf_ovum_pick_up_chart_list->Cannulation->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_list->Cannulation->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart_list->NoOfOocytesRetrievedd->Visible) { // NoOfOocytesRetrievedd ?>
		<td data-name="NoOfOocytesRetrievedd" <?php echo $ivf_ovum_pick_up_chart_list->NoOfOocytesRetrievedd->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_list->RowCount ?>_ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd">
<span<?php echo $ivf_ovum_pick_up_chart_list->NoOfOocytesRetrievedd->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_list->NoOfOocytesRetrievedd->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart_list->PlanT->Visible) { // PlanT ?>
		<td data-name="PlanT" <?php echo $ivf_ovum_pick_up_chart_list->PlanT->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_list->RowCount ?>_ivf_ovum_pick_up_chart_PlanT">
<span<?php echo $ivf_ovum_pick_up_chart_list->PlanT->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_list->PlanT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart_list->ReviewDate->Visible) { // ReviewDate ?>
		<td data-name="ReviewDate" <?php echo $ivf_ovum_pick_up_chart_list->ReviewDate->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_list->RowCount ?>_ivf_ovum_pick_up_chart_ReviewDate">
<span<?php echo $ivf_ovum_pick_up_chart_list->ReviewDate->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_list->ReviewDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart_list->ReviewDoctor->Visible) { // ReviewDoctor ?>
		<td data-name="ReviewDoctor" <?php echo $ivf_ovum_pick_up_chart_list->ReviewDoctor->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_list->RowCount ?>_ivf_ovum_pick_up_chart_ReviewDoctor">
<span<?php echo $ivf_ovum_pick_up_chart_list->ReviewDoctor->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_list->ReviewDoctor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart_list->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo" <?php echo $ivf_ovum_pick_up_chart_list->TidNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_ovum_pick_up_chart_list->RowCount ?>_ivf_ovum_pick_up_chart_TidNo">
<span<?php echo $ivf_ovum_pick_up_chart_list->TidNo->viewAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_list->TidNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_ovum_pick_up_chart_list->ListOptions->render("body", "right", $ivf_ovum_pick_up_chart_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$ivf_ovum_pick_up_chart_list->isGridAdd())
		$ivf_ovum_pick_up_chart_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$ivf_ovum_pick_up_chart->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($ivf_ovum_pick_up_chart_list->Recordset)
	$ivf_ovum_pick_up_chart_list->Recordset->Close();
?>
<?php if (!$ivf_ovum_pick_up_chart_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$ivf_ovum_pick_up_chart_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $ivf_ovum_pick_up_chart_list->Pager->render() ?>
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
<?php if ($ivf_ovum_pick_up_chart_list->TotalRecords == 0 && !$ivf_ovum_pick_up_chart->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $ivf_ovum_pick_up_chart_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$ivf_ovum_pick_up_chart_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$ivf_ovum_pick_up_chart_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$ivf_ovum_pick_up_chart->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_ivf_ovum_pick_up_chart",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$ivf_ovum_pick_up_chart_list->terminate();
?>