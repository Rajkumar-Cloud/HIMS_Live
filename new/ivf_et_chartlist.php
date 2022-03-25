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
<?php include_once "header.php"; ?>
<?php if (!$ivf_et_chart_list->isExport()) { ?>
<script>
var fivf_et_chartlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fivf_et_chartlist = currentForm = new ew.Form("fivf_et_chartlist", "list");
	fivf_et_chartlist.formKeyCountName = '<?php echo $ivf_et_chart_list->FormKeyCountName ?>';
	loadjs.done("fivf_et_chartlist");
});
var fivf_et_chartlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fivf_et_chartlistsrch = currentSearchForm = new ew.Form("fivf_et_chartlistsrch");

	// Dynamic selection lists
	// Filters

	fivf_et_chartlistsrch.filterList = <?php echo $ivf_et_chart_list->getFilterList() ?>;
	loadjs.done("fivf_et_chartlistsrch");
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
<?php if (!$ivf_et_chart_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($ivf_et_chart_list->TotalRecords > 0 && $ivf_et_chart_list->ExportOptions->visible()) { ?>
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
<?php if (!$ivf_et_chart_list->isExport() && !$ivf_et_chart->CurrentAction) { ?>
<form name="fivf_et_chartlistsrch" id="fivf_et_chartlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fivf_et_chartlistsrch-search-panel" class="<?php echo $ivf_et_chart_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="ivf_et_chart">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $ivf_et_chart_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($ivf_et_chart_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($ivf_et_chart_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $ivf_et_chart_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($ivf_et_chart_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($ivf_et_chart_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($ivf_et_chart_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($ivf_et_chart_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $ivf_et_chart_list->showPageHeader(); ?>
<?php
$ivf_et_chart_list->showMessage();
?>
<?php if ($ivf_et_chart_list->TotalRecords > 0 || $ivf_et_chart->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($ivf_et_chart_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf_et_chart">
<?php if (!$ivf_et_chart_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$ivf_et_chart_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $ivf_et_chart_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ivf_et_chart_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fivf_et_chartlist" id="fivf_et_chartlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_et_chart">
<div id="gmp_ivf_et_chart" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($ivf_et_chart_list->TotalRecords > 0 || $ivf_et_chart_list->isGridEdit()) { ?>
<table id="tbl_ivf_et_chartlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$ivf_et_chart->RowType = ROWTYPE_HEADER;

// Render list options
$ivf_et_chart_list->renderListOptions();

// Render list options (header, left)
$ivf_et_chart_list->ListOptions->render("header", "left");
?>
<?php if ($ivf_et_chart_list->id->Visible) { // id ?>
	<?php if ($ivf_et_chart_list->SortUrl($ivf_et_chart_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $ivf_et_chart_list->id->headerCellClass() ?>"><div id="elh_ivf_et_chart_id" class="ivf_et_chart_id"><div class="ew-table-header-caption"><?php echo $ivf_et_chart_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $ivf_et_chart_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_et_chart_list->SortUrl($ivf_et_chart_list->id) ?>', 1);"><div id="elh_ivf_et_chart_id" class="ivf_et_chart_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_et_chart_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart_list->RIDNo->Visible) { // RIDNo ?>
	<?php if ($ivf_et_chart_list->SortUrl($ivf_et_chart_list->RIDNo) == "") { ?>
		<th data-name="RIDNo" class="<?php echo $ivf_et_chart_list->RIDNo->headerCellClass() ?>"><div id="elh_ivf_et_chart_RIDNo" class="ivf_et_chart_RIDNo"><div class="ew-table-header-caption"><?php echo $ivf_et_chart_list->RIDNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RIDNo" class="<?php echo $ivf_et_chart_list->RIDNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_et_chart_list->SortUrl($ivf_et_chart_list->RIDNo) ?>', 1);"><div id="elh_ivf_et_chart_RIDNo" class="ivf_et_chart_RIDNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart_list->RIDNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart_list->RIDNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_et_chart_list->RIDNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart_list->Name->Visible) { // Name ?>
	<?php if ($ivf_et_chart_list->SortUrl($ivf_et_chart_list->Name) == "") { ?>
		<th data-name="Name" class="<?php echo $ivf_et_chart_list->Name->headerCellClass() ?>"><div id="elh_ivf_et_chart_Name" class="ivf_et_chart_Name"><div class="ew-table-header-caption"><?php echo $ivf_et_chart_list->Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Name" class="<?php echo $ivf_et_chart_list->Name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_et_chart_list->SortUrl($ivf_et_chart_list->Name) ?>', 1);"><div id="elh_ivf_et_chart_Name" class="ivf_et_chart_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart_list->Name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart_list->Name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_et_chart_list->Name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart_list->ARTCycle->Visible) { // ARTCycle ?>
	<?php if ($ivf_et_chart_list->SortUrl($ivf_et_chart_list->ARTCycle) == "") { ?>
		<th data-name="ARTCycle" class="<?php echo $ivf_et_chart_list->ARTCycle->headerCellClass() ?>"><div id="elh_ivf_et_chart_ARTCycle" class="ivf_et_chart_ARTCycle"><div class="ew-table-header-caption"><?php echo $ivf_et_chart_list->ARTCycle->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ARTCycle" class="<?php echo $ivf_et_chart_list->ARTCycle->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_et_chart_list->SortUrl($ivf_et_chart_list->ARTCycle) ?>', 1);"><div id="elh_ivf_et_chart_ARTCycle" class="ivf_et_chart_ARTCycle">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart_list->ARTCycle->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart_list->ARTCycle->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_et_chart_list->ARTCycle->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart_list->Consultant->Visible) { // Consultant ?>
	<?php if ($ivf_et_chart_list->SortUrl($ivf_et_chart_list->Consultant) == "") { ?>
		<th data-name="Consultant" class="<?php echo $ivf_et_chart_list->Consultant->headerCellClass() ?>"><div id="elh_ivf_et_chart_Consultant" class="ivf_et_chart_Consultant"><div class="ew-table-header-caption"><?php echo $ivf_et_chart_list->Consultant->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Consultant" class="<?php echo $ivf_et_chart_list->Consultant->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_et_chart_list->SortUrl($ivf_et_chart_list->Consultant) ?>', 1);"><div id="elh_ivf_et_chart_Consultant" class="ivf_et_chart_Consultant">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart_list->Consultant->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart_list->Consultant->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_et_chart_list->Consultant->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart_list->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
	<?php if ($ivf_et_chart_list->SortUrl($ivf_et_chart_list->InseminatinTechnique) == "") { ?>
		<th data-name="InseminatinTechnique" class="<?php echo $ivf_et_chart_list->InseminatinTechnique->headerCellClass() ?>"><div id="elh_ivf_et_chart_InseminatinTechnique" class="ivf_et_chart_InseminatinTechnique"><div class="ew-table-header-caption"><?php echo $ivf_et_chart_list->InseminatinTechnique->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="InseminatinTechnique" class="<?php echo $ivf_et_chart_list->InseminatinTechnique->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_et_chart_list->SortUrl($ivf_et_chart_list->InseminatinTechnique) ?>', 1);"><div id="elh_ivf_et_chart_InseminatinTechnique" class="ivf_et_chart_InseminatinTechnique">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart_list->InseminatinTechnique->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart_list->InseminatinTechnique->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_et_chart_list->InseminatinTechnique->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart_list->IndicationForART->Visible) { // IndicationForART ?>
	<?php if ($ivf_et_chart_list->SortUrl($ivf_et_chart_list->IndicationForART) == "") { ?>
		<th data-name="IndicationForART" class="<?php echo $ivf_et_chart_list->IndicationForART->headerCellClass() ?>"><div id="elh_ivf_et_chart_IndicationForART" class="ivf_et_chart_IndicationForART"><div class="ew-table-header-caption"><?php echo $ivf_et_chart_list->IndicationForART->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IndicationForART" class="<?php echo $ivf_et_chart_list->IndicationForART->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_et_chart_list->SortUrl($ivf_et_chart_list->IndicationForART) ?>', 1);"><div id="elh_ivf_et_chart_IndicationForART" class="ivf_et_chart_IndicationForART">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart_list->IndicationForART->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart_list->IndicationForART->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_et_chart_list->IndicationForART->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart_list->PreTreatment->Visible) { // PreTreatment ?>
	<?php if ($ivf_et_chart_list->SortUrl($ivf_et_chart_list->PreTreatment) == "") { ?>
		<th data-name="PreTreatment" class="<?php echo $ivf_et_chart_list->PreTreatment->headerCellClass() ?>"><div id="elh_ivf_et_chart_PreTreatment" class="ivf_et_chart_PreTreatment"><div class="ew-table-header-caption"><?php echo $ivf_et_chart_list->PreTreatment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PreTreatment" class="<?php echo $ivf_et_chart_list->PreTreatment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_et_chart_list->SortUrl($ivf_et_chart_list->PreTreatment) ?>', 1);"><div id="elh_ivf_et_chart_PreTreatment" class="ivf_et_chart_PreTreatment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart_list->PreTreatment->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart_list->PreTreatment->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_et_chart_list->PreTreatment->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart_list->Hysteroscopy->Visible) { // Hysteroscopy ?>
	<?php if ($ivf_et_chart_list->SortUrl($ivf_et_chart_list->Hysteroscopy) == "") { ?>
		<th data-name="Hysteroscopy" class="<?php echo $ivf_et_chart_list->Hysteroscopy->headerCellClass() ?>"><div id="elh_ivf_et_chart_Hysteroscopy" class="ivf_et_chart_Hysteroscopy"><div class="ew-table-header-caption"><?php echo $ivf_et_chart_list->Hysteroscopy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Hysteroscopy" class="<?php echo $ivf_et_chart_list->Hysteroscopy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_et_chart_list->SortUrl($ivf_et_chart_list->Hysteroscopy) ?>', 1);"><div id="elh_ivf_et_chart_Hysteroscopy" class="ivf_et_chart_Hysteroscopy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart_list->Hysteroscopy->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart_list->Hysteroscopy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_et_chart_list->Hysteroscopy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart_list->EndometrialScratching->Visible) { // EndometrialScratching ?>
	<?php if ($ivf_et_chart_list->SortUrl($ivf_et_chart_list->EndometrialScratching) == "") { ?>
		<th data-name="EndometrialScratching" class="<?php echo $ivf_et_chart_list->EndometrialScratching->headerCellClass() ?>"><div id="elh_ivf_et_chart_EndometrialScratching" class="ivf_et_chart_EndometrialScratching"><div class="ew-table-header-caption"><?php echo $ivf_et_chart_list->EndometrialScratching->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EndometrialScratching" class="<?php echo $ivf_et_chart_list->EndometrialScratching->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_et_chart_list->SortUrl($ivf_et_chart_list->EndometrialScratching) ?>', 1);"><div id="elh_ivf_et_chart_EndometrialScratching" class="ivf_et_chart_EndometrialScratching">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart_list->EndometrialScratching->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart_list->EndometrialScratching->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_et_chart_list->EndometrialScratching->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart_list->TrialCannulation->Visible) { // TrialCannulation ?>
	<?php if ($ivf_et_chart_list->SortUrl($ivf_et_chart_list->TrialCannulation) == "") { ?>
		<th data-name="TrialCannulation" class="<?php echo $ivf_et_chart_list->TrialCannulation->headerCellClass() ?>"><div id="elh_ivf_et_chart_TrialCannulation" class="ivf_et_chart_TrialCannulation"><div class="ew-table-header-caption"><?php echo $ivf_et_chart_list->TrialCannulation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TrialCannulation" class="<?php echo $ivf_et_chart_list->TrialCannulation->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_et_chart_list->SortUrl($ivf_et_chart_list->TrialCannulation) ?>', 1);"><div id="elh_ivf_et_chart_TrialCannulation" class="ivf_et_chart_TrialCannulation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart_list->TrialCannulation->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart_list->TrialCannulation->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_et_chart_list->TrialCannulation->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart_list->CYCLETYPE->Visible) { // CYCLETYPE ?>
	<?php if ($ivf_et_chart_list->SortUrl($ivf_et_chart_list->CYCLETYPE) == "") { ?>
		<th data-name="CYCLETYPE" class="<?php echo $ivf_et_chart_list->CYCLETYPE->headerCellClass() ?>"><div id="elh_ivf_et_chart_CYCLETYPE" class="ivf_et_chart_CYCLETYPE"><div class="ew-table-header-caption"><?php echo $ivf_et_chart_list->CYCLETYPE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CYCLETYPE" class="<?php echo $ivf_et_chart_list->CYCLETYPE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_et_chart_list->SortUrl($ivf_et_chart_list->CYCLETYPE) ?>', 1);"><div id="elh_ivf_et_chart_CYCLETYPE" class="ivf_et_chart_CYCLETYPE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart_list->CYCLETYPE->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart_list->CYCLETYPE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_et_chart_list->CYCLETYPE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart_list->HRTCYCLE->Visible) { // HRTCYCLE ?>
	<?php if ($ivf_et_chart_list->SortUrl($ivf_et_chart_list->HRTCYCLE) == "") { ?>
		<th data-name="HRTCYCLE" class="<?php echo $ivf_et_chart_list->HRTCYCLE->headerCellClass() ?>"><div id="elh_ivf_et_chart_HRTCYCLE" class="ivf_et_chart_HRTCYCLE"><div class="ew-table-header-caption"><?php echo $ivf_et_chart_list->HRTCYCLE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HRTCYCLE" class="<?php echo $ivf_et_chart_list->HRTCYCLE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_et_chart_list->SortUrl($ivf_et_chart_list->HRTCYCLE) ?>', 1);"><div id="elh_ivf_et_chart_HRTCYCLE" class="ivf_et_chart_HRTCYCLE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart_list->HRTCYCLE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart_list->HRTCYCLE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_et_chart_list->HRTCYCLE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart_list->OralEstrogenDosage->Visible) { // OralEstrogenDosage ?>
	<?php if ($ivf_et_chart_list->SortUrl($ivf_et_chart_list->OralEstrogenDosage) == "") { ?>
		<th data-name="OralEstrogenDosage" class="<?php echo $ivf_et_chart_list->OralEstrogenDosage->headerCellClass() ?>"><div id="elh_ivf_et_chart_OralEstrogenDosage" class="ivf_et_chart_OralEstrogenDosage"><div class="ew-table-header-caption"><?php echo $ivf_et_chart_list->OralEstrogenDosage->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OralEstrogenDosage" class="<?php echo $ivf_et_chart_list->OralEstrogenDosage->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_et_chart_list->SortUrl($ivf_et_chart_list->OralEstrogenDosage) ?>', 1);"><div id="elh_ivf_et_chart_OralEstrogenDosage" class="ivf_et_chart_OralEstrogenDosage">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart_list->OralEstrogenDosage->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart_list->OralEstrogenDosage->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_et_chart_list->OralEstrogenDosage->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart_list->VaginalEstrogen->Visible) { // VaginalEstrogen ?>
	<?php if ($ivf_et_chart_list->SortUrl($ivf_et_chart_list->VaginalEstrogen) == "") { ?>
		<th data-name="VaginalEstrogen" class="<?php echo $ivf_et_chart_list->VaginalEstrogen->headerCellClass() ?>"><div id="elh_ivf_et_chart_VaginalEstrogen" class="ivf_et_chart_VaginalEstrogen"><div class="ew-table-header-caption"><?php echo $ivf_et_chart_list->VaginalEstrogen->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="VaginalEstrogen" class="<?php echo $ivf_et_chart_list->VaginalEstrogen->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_et_chart_list->SortUrl($ivf_et_chart_list->VaginalEstrogen) ?>', 1);"><div id="elh_ivf_et_chart_VaginalEstrogen" class="ivf_et_chart_VaginalEstrogen">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart_list->VaginalEstrogen->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart_list->VaginalEstrogen->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_et_chart_list->VaginalEstrogen->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart_list->GCSF->Visible) { // GCSF ?>
	<?php if ($ivf_et_chart_list->SortUrl($ivf_et_chart_list->GCSF) == "") { ?>
		<th data-name="GCSF" class="<?php echo $ivf_et_chart_list->GCSF->headerCellClass() ?>"><div id="elh_ivf_et_chart_GCSF" class="ivf_et_chart_GCSF"><div class="ew-table-header-caption"><?php echo $ivf_et_chart_list->GCSF->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GCSF" class="<?php echo $ivf_et_chart_list->GCSF->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_et_chart_list->SortUrl($ivf_et_chart_list->GCSF) ?>', 1);"><div id="elh_ivf_et_chart_GCSF" class="ivf_et_chart_GCSF">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart_list->GCSF->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart_list->GCSF->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_et_chart_list->GCSF->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart_list->ActivatedPRP->Visible) { // ActivatedPRP ?>
	<?php if ($ivf_et_chart_list->SortUrl($ivf_et_chart_list->ActivatedPRP) == "") { ?>
		<th data-name="ActivatedPRP" class="<?php echo $ivf_et_chart_list->ActivatedPRP->headerCellClass() ?>"><div id="elh_ivf_et_chart_ActivatedPRP" class="ivf_et_chart_ActivatedPRP"><div class="ew-table-header-caption"><?php echo $ivf_et_chart_list->ActivatedPRP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ActivatedPRP" class="<?php echo $ivf_et_chart_list->ActivatedPRP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_et_chart_list->SortUrl($ivf_et_chart_list->ActivatedPRP) ?>', 1);"><div id="elh_ivf_et_chart_ActivatedPRP" class="ivf_et_chart_ActivatedPRP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart_list->ActivatedPRP->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart_list->ActivatedPRP->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_et_chart_list->ActivatedPRP->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart_list->ERA->Visible) { // ERA ?>
	<?php if ($ivf_et_chart_list->SortUrl($ivf_et_chart_list->ERA) == "") { ?>
		<th data-name="ERA" class="<?php echo $ivf_et_chart_list->ERA->headerCellClass() ?>"><div id="elh_ivf_et_chart_ERA" class="ivf_et_chart_ERA"><div class="ew-table-header-caption"><?php echo $ivf_et_chart_list->ERA->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ERA" class="<?php echo $ivf_et_chart_list->ERA->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_et_chart_list->SortUrl($ivf_et_chart_list->ERA) ?>', 1);"><div id="elh_ivf_et_chart_ERA" class="ivf_et_chart_ERA">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart_list->ERA->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart_list->ERA->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_et_chart_list->ERA->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart_list->UCLcm->Visible) { // UCLcm ?>
	<?php if ($ivf_et_chart_list->SortUrl($ivf_et_chart_list->UCLcm) == "") { ?>
		<th data-name="UCLcm" class="<?php echo $ivf_et_chart_list->UCLcm->headerCellClass() ?>"><div id="elh_ivf_et_chart_UCLcm" class="ivf_et_chart_UCLcm"><div class="ew-table-header-caption"><?php echo $ivf_et_chart_list->UCLcm->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UCLcm" class="<?php echo $ivf_et_chart_list->UCLcm->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_et_chart_list->SortUrl($ivf_et_chart_list->UCLcm) ?>', 1);"><div id="elh_ivf_et_chart_UCLcm" class="ivf_et_chart_UCLcm">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart_list->UCLcm->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart_list->UCLcm->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_et_chart_list->UCLcm->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart_list->DATEOFSTART->Visible) { // DATEOFSTART ?>
	<?php if ($ivf_et_chart_list->SortUrl($ivf_et_chart_list->DATEOFSTART) == "") { ?>
		<th data-name="DATEOFSTART" class="<?php echo $ivf_et_chart_list->DATEOFSTART->headerCellClass() ?>"><div id="elh_ivf_et_chart_DATEOFSTART" class="ivf_et_chart_DATEOFSTART"><div class="ew-table-header-caption"><?php echo $ivf_et_chart_list->DATEOFSTART->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DATEOFSTART" class="<?php echo $ivf_et_chart_list->DATEOFSTART->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_et_chart_list->SortUrl($ivf_et_chart_list->DATEOFSTART) ?>', 1);"><div id="elh_ivf_et_chart_DATEOFSTART" class="ivf_et_chart_DATEOFSTART">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart_list->DATEOFSTART->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart_list->DATEOFSTART->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_et_chart_list->DATEOFSTART->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart_list->DATEOFEMBRYOTRANSFER->Visible) { // DATEOFEMBRYOTRANSFER ?>
	<?php if ($ivf_et_chart_list->SortUrl($ivf_et_chart_list->DATEOFEMBRYOTRANSFER) == "") { ?>
		<th data-name="DATEOFEMBRYOTRANSFER" class="<?php echo $ivf_et_chart_list->DATEOFEMBRYOTRANSFER->headerCellClass() ?>"><div id="elh_ivf_et_chart_DATEOFEMBRYOTRANSFER" class="ivf_et_chart_DATEOFEMBRYOTRANSFER"><div class="ew-table-header-caption"><?php echo $ivf_et_chart_list->DATEOFEMBRYOTRANSFER->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DATEOFEMBRYOTRANSFER" class="<?php echo $ivf_et_chart_list->DATEOFEMBRYOTRANSFER->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_et_chart_list->SortUrl($ivf_et_chart_list->DATEOFEMBRYOTRANSFER) ?>', 1);"><div id="elh_ivf_et_chart_DATEOFEMBRYOTRANSFER" class="ivf_et_chart_DATEOFEMBRYOTRANSFER">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart_list->DATEOFEMBRYOTRANSFER->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart_list->DATEOFEMBRYOTRANSFER->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_et_chart_list->DATEOFEMBRYOTRANSFER->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart_list->DAYOFEMBRYOTRANSFER->Visible) { // DAYOFEMBRYOTRANSFER ?>
	<?php if ($ivf_et_chart_list->SortUrl($ivf_et_chart_list->DAYOFEMBRYOTRANSFER) == "") { ?>
		<th data-name="DAYOFEMBRYOTRANSFER" class="<?php echo $ivf_et_chart_list->DAYOFEMBRYOTRANSFER->headerCellClass() ?>"><div id="elh_ivf_et_chart_DAYOFEMBRYOTRANSFER" class="ivf_et_chart_DAYOFEMBRYOTRANSFER"><div class="ew-table-header-caption"><?php echo $ivf_et_chart_list->DAYOFEMBRYOTRANSFER->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DAYOFEMBRYOTRANSFER" class="<?php echo $ivf_et_chart_list->DAYOFEMBRYOTRANSFER->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_et_chart_list->SortUrl($ivf_et_chart_list->DAYOFEMBRYOTRANSFER) ?>', 1);"><div id="elh_ivf_et_chart_DAYOFEMBRYOTRANSFER" class="ivf_et_chart_DAYOFEMBRYOTRANSFER">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart_list->DAYOFEMBRYOTRANSFER->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart_list->DAYOFEMBRYOTRANSFER->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_et_chart_list->DAYOFEMBRYOTRANSFER->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart_list->NOOFEMBRYOSTHAWED->Visible) { // NOOFEMBRYOSTHAWED ?>
	<?php if ($ivf_et_chart_list->SortUrl($ivf_et_chart_list->NOOFEMBRYOSTHAWED) == "") { ?>
		<th data-name="NOOFEMBRYOSTHAWED" class="<?php echo $ivf_et_chart_list->NOOFEMBRYOSTHAWED->headerCellClass() ?>"><div id="elh_ivf_et_chart_NOOFEMBRYOSTHAWED" class="ivf_et_chart_NOOFEMBRYOSTHAWED"><div class="ew-table-header-caption"><?php echo $ivf_et_chart_list->NOOFEMBRYOSTHAWED->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NOOFEMBRYOSTHAWED" class="<?php echo $ivf_et_chart_list->NOOFEMBRYOSTHAWED->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_et_chart_list->SortUrl($ivf_et_chart_list->NOOFEMBRYOSTHAWED) ?>', 1);"><div id="elh_ivf_et_chart_NOOFEMBRYOSTHAWED" class="ivf_et_chart_NOOFEMBRYOSTHAWED">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart_list->NOOFEMBRYOSTHAWED->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart_list->NOOFEMBRYOSTHAWED->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_et_chart_list->NOOFEMBRYOSTHAWED->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart_list->NOOFEMBRYOSTRANSFERRED->Visible) { // NOOFEMBRYOSTRANSFERRED ?>
	<?php if ($ivf_et_chart_list->SortUrl($ivf_et_chart_list->NOOFEMBRYOSTRANSFERRED) == "") { ?>
		<th data-name="NOOFEMBRYOSTRANSFERRED" class="<?php echo $ivf_et_chart_list->NOOFEMBRYOSTRANSFERRED->headerCellClass() ?>"><div id="elh_ivf_et_chart_NOOFEMBRYOSTRANSFERRED" class="ivf_et_chart_NOOFEMBRYOSTRANSFERRED"><div class="ew-table-header-caption"><?php echo $ivf_et_chart_list->NOOFEMBRYOSTRANSFERRED->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NOOFEMBRYOSTRANSFERRED" class="<?php echo $ivf_et_chart_list->NOOFEMBRYOSTRANSFERRED->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_et_chart_list->SortUrl($ivf_et_chart_list->NOOFEMBRYOSTRANSFERRED) ?>', 1);"><div id="elh_ivf_et_chart_NOOFEMBRYOSTRANSFERRED" class="ivf_et_chart_NOOFEMBRYOSTRANSFERRED">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart_list->NOOFEMBRYOSTRANSFERRED->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart_list->NOOFEMBRYOSTRANSFERRED->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_et_chart_list->NOOFEMBRYOSTRANSFERRED->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart_list->DAYOFEMBRYOS->Visible) { // DAYOFEMBRYOS ?>
	<?php if ($ivf_et_chart_list->SortUrl($ivf_et_chart_list->DAYOFEMBRYOS) == "") { ?>
		<th data-name="DAYOFEMBRYOS" class="<?php echo $ivf_et_chart_list->DAYOFEMBRYOS->headerCellClass() ?>"><div id="elh_ivf_et_chart_DAYOFEMBRYOS" class="ivf_et_chart_DAYOFEMBRYOS"><div class="ew-table-header-caption"><?php echo $ivf_et_chart_list->DAYOFEMBRYOS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DAYOFEMBRYOS" class="<?php echo $ivf_et_chart_list->DAYOFEMBRYOS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_et_chart_list->SortUrl($ivf_et_chart_list->DAYOFEMBRYOS) ?>', 1);"><div id="elh_ivf_et_chart_DAYOFEMBRYOS" class="ivf_et_chart_DAYOFEMBRYOS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart_list->DAYOFEMBRYOS->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart_list->DAYOFEMBRYOS->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_et_chart_list->DAYOFEMBRYOS->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart_list->CRYOPRESERVEDEMBRYOS->Visible) { // CRYOPRESERVEDEMBRYOS ?>
	<?php if ($ivf_et_chart_list->SortUrl($ivf_et_chart_list->CRYOPRESERVEDEMBRYOS) == "") { ?>
		<th data-name="CRYOPRESERVEDEMBRYOS" class="<?php echo $ivf_et_chart_list->CRYOPRESERVEDEMBRYOS->headerCellClass() ?>"><div id="elh_ivf_et_chart_CRYOPRESERVEDEMBRYOS" class="ivf_et_chart_CRYOPRESERVEDEMBRYOS"><div class="ew-table-header-caption"><?php echo $ivf_et_chart_list->CRYOPRESERVEDEMBRYOS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CRYOPRESERVEDEMBRYOS" class="<?php echo $ivf_et_chart_list->CRYOPRESERVEDEMBRYOS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_et_chart_list->SortUrl($ivf_et_chart_list->CRYOPRESERVEDEMBRYOS) ?>', 1);"><div id="elh_ivf_et_chart_CRYOPRESERVEDEMBRYOS" class="ivf_et_chart_CRYOPRESERVEDEMBRYOS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart_list->CRYOPRESERVEDEMBRYOS->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart_list->CRYOPRESERVEDEMBRYOS->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_et_chart_list->CRYOPRESERVEDEMBRYOS->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart_list->Code1->Visible) { // Code1 ?>
	<?php if ($ivf_et_chart_list->SortUrl($ivf_et_chart_list->Code1) == "") { ?>
		<th data-name="Code1" class="<?php echo $ivf_et_chart_list->Code1->headerCellClass() ?>"><div id="elh_ivf_et_chart_Code1" class="ivf_et_chart_Code1"><div class="ew-table-header-caption"><?php echo $ivf_et_chart_list->Code1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Code1" class="<?php echo $ivf_et_chart_list->Code1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_et_chart_list->SortUrl($ivf_et_chart_list->Code1) ?>', 1);"><div id="elh_ivf_et_chart_Code1" class="ivf_et_chart_Code1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart_list->Code1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart_list->Code1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_et_chart_list->Code1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart_list->Code2->Visible) { // Code2 ?>
	<?php if ($ivf_et_chart_list->SortUrl($ivf_et_chart_list->Code2) == "") { ?>
		<th data-name="Code2" class="<?php echo $ivf_et_chart_list->Code2->headerCellClass() ?>"><div id="elh_ivf_et_chart_Code2" class="ivf_et_chart_Code2"><div class="ew-table-header-caption"><?php echo $ivf_et_chart_list->Code2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Code2" class="<?php echo $ivf_et_chart_list->Code2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_et_chart_list->SortUrl($ivf_et_chart_list->Code2) ?>', 1);"><div id="elh_ivf_et_chart_Code2" class="ivf_et_chart_Code2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart_list->Code2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart_list->Code2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_et_chart_list->Code2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart_list->CellStage1->Visible) { // CellStage1 ?>
	<?php if ($ivf_et_chart_list->SortUrl($ivf_et_chart_list->CellStage1) == "") { ?>
		<th data-name="CellStage1" class="<?php echo $ivf_et_chart_list->CellStage1->headerCellClass() ?>"><div id="elh_ivf_et_chart_CellStage1" class="ivf_et_chart_CellStage1"><div class="ew-table-header-caption"><?php echo $ivf_et_chart_list->CellStage1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CellStage1" class="<?php echo $ivf_et_chart_list->CellStage1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_et_chart_list->SortUrl($ivf_et_chart_list->CellStage1) ?>', 1);"><div id="elh_ivf_et_chart_CellStage1" class="ivf_et_chart_CellStage1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart_list->CellStage1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart_list->CellStage1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_et_chart_list->CellStage1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart_list->CellStage2->Visible) { // CellStage2 ?>
	<?php if ($ivf_et_chart_list->SortUrl($ivf_et_chart_list->CellStage2) == "") { ?>
		<th data-name="CellStage2" class="<?php echo $ivf_et_chart_list->CellStage2->headerCellClass() ?>"><div id="elh_ivf_et_chart_CellStage2" class="ivf_et_chart_CellStage2"><div class="ew-table-header-caption"><?php echo $ivf_et_chart_list->CellStage2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CellStage2" class="<?php echo $ivf_et_chart_list->CellStage2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_et_chart_list->SortUrl($ivf_et_chart_list->CellStage2) ?>', 1);"><div id="elh_ivf_et_chart_CellStage2" class="ivf_et_chart_CellStage2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart_list->CellStage2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart_list->CellStage2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_et_chart_list->CellStage2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart_list->Grade1->Visible) { // Grade1 ?>
	<?php if ($ivf_et_chart_list->SortUrl($ivf_et_chart_list->Grade1) == "") { ?>
		<th data-name="Grade1" class="<?php echo $ivf_et_chart_list->Grade1->headerCellClass() ?>"><div id="elh_ivf_et_chart_Grade1" class="ivf_et_chart_Grade1"><div class="ew-table-header-caption"><?php echo $ivf_et_chart_list->Grade1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Grade1" class="<?php echo $ivf_et_chart_list->Grade1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_et_chart_list->SortUrl($ivf_et_chart_list->Grade1) ?>', 1);"><div id="elh_ivf_et_chart_Grade1" class="ivf_et_chart_Grade1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart_list->Grade1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart_list->Grade1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_et_chart_list->Grade1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart_list->Grade2->Visible) { // Grade2 ?>
	<?php if ($ivf_et_chart_list->SortUrl($ivf_et_chart_list->Grade2) == "") { ?>
		<th data-name="Grade2" class="<?php echo $ivf_et_chart_list->Grade2->headerCellClass() ?>"><div id="elh_ivf_et_chart_Grade2" class="ivf_et_chart_Grade2"><div class="ew-table-header-caption"><?php echo $ivf_et_chart_list->Grade2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Grade2" class="<?php echo $ivf_et_chart_list->Grade2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_et_chart_list->SortUrl($ivf_et_chart_list->Grade2) ?>', 1);"><div id="elh_ivf_et_chart_Grade2" class="ivf_et_chart_Grade2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart_list->Grade2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart_list->Grade2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_et_chart_list->Grade2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart_list->PregnancyTestingWithSerumBetaHcG->Visible) { // PregnancyTestingWithSerumBetaHcG ?>
	<?php if ($ivf_et_chart_list->SortUrl($ivf_et_chart_list->PregnancyTestingWithSerumBetaHcG) == "") { ?>
		<th data-name="PregnancyTestingWithSerumBetaHcG" class="<?php echo $ivf_et_chart_list->PregnancyTestingWithSerumBetaHcG->headerCellClass() ?>"><div id="elh_ivf_et_chart_PregnancyTestingWithSerumBetaHcG" class="ivf_et_chart_PregnancyTestingWithSerumBetaHcG"><div class="ew-table-header-caption"><?php echo $ivf_et_chart_list->PregnancyTestingWithSerumBetaHcG->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PregnancyTestingWithSerumBetaHcG" class="<?php echo $ivf_et_chart_list->PregnancyTestingWithSerumBetaHcG->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_et_chart_list->SortUrl($ivf_et_chart_list->PregnancyTestingWithSerumBetaHcG) ?>', 1);"><div id="elh_ivf_et_chart_PregnancyTestingWithSerumBetaHcG" class="ivf_et_chart_PregnancyTestingWithSerumBetaHcG">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart_list->PregnancyTestingWithSerumBetaHcG->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart_list->PregnancyTestingWithSerumBetaHcG->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_et_chart_list->PregnancyTestingWithSerumBetaHcG->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart_list->ReviewDate->Visible) { // ReviewDate ?>
	<?php if ($ivf_et_chart_list->SortUrl($ivf_et_chart_list->ReviewDate) == "") { ?>
		<th data-name="ReviewDate" class="<?php echo $ivf_et_chart_list->ReviewDate->headerCellClass() ?>"><div id="elh_ivf_et_chart_ReviewDate" class="ivf_et_chart_ReviewDate"><div class="ew-table-header-caption"><?php echo $ivf_et_chart_list->ReviewDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReviewDate" class="<?php echo $ivf_et_chart_list->ReviewDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_et_chart_list->SortUrl($ivf_et_chart_list->ReviewDate) ?>', 1);"><div id="elh_ivf_et_chart_ReviewDate" class="ivf_et_chart_ReviewDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart_list->ReviewDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart_list->ReviewDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_et_chart_list->ReviewDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart_list->ReviewDoctor->Visible) { // ReviewDoctor ?>
	<?php if ($ivf_et_chart_list->SortUrl($ivf_et_chart_list->ReviewDoctor) == "") { ?>
		<th data-name="ReviewDoctor" class="<?php echo $ivf_et_chart_list->ReviewDoctor->headerCellClass() ?>"><div id="elh_ivf_et_chart_ReviewDoctor" class="ivf_et_chart_ReviewDoctor"><div class="ew-table-header-caption"><?php echo $ivf_et_chart_list->ReviewDoctor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReviewDoctor" class="<?php echo $ivf_et_chart_list->ReviewDoctor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_et_chart_list->SortUrl($ivf_et_chart_list->ReviewDoctor) ?>', 1);"><div id="elh_ivf_et_chart_ReviewDoctor" class="ivf_et_chart_ReviewDoctor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart_list->ReviewDoctor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart_list->ReviewDoctor->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_et_chart_list->ReviewDoctor->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_et_chart_list->TidNo->Visible) { // TidNo ?>
	<?php if ($ivf_et_chart_list->SortUrl($ivf_et_chart_list->TidNo) == "") { ?>
		<th data-name="TidNo" class="<?php echo $ivf_et_chart_list->TidNo->headerCellClass() ?>"><div id="elh_ivf_et_chart_TidNo" class="ivf_et_chart_TidNo"><div class="ew-table-header-caption"><?php echo $ivf_et_chart_list->TidNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TidNo" class="<?php echo $ivf_et_chart_list->TidNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_et_chart_list->SortUrl($ivf_et_chart_list->TidNo) ?>', 1);"><div id="elh_ivf_et_chart_TidNo" class="ivf_et_chart_TidNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_et_chart_list->TidNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_et_chart_list->TidNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_et_chart_list->TidNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
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
if ($ivf_et_chart_list->ExportAll && $ivf_et_chart_list->isExport()) {
	$ivf_et_chart_list->StopRecord = $ivf_et_chart_list->TotalRecords;
} else {

	// Set the last record to display
	if ($ivf_et_chart_list->TotalRecords > $ivf_et_chart_list->StartRecord + $ivf_et_chart_list->DisplayRecords - 1)
		$ivf_et_chart_list->StopRecord = $ivf_et_chart_list->StartRecord + $ivf_et_chart_list->DisplayRecords - 1;
	else
		$ivf_et_chart_list->StopRecord = $ivf_et_chart_list->TotalRecords;
}
$ivf_et_chart_list->RecordCount = $ivf_et_chart_list->StartRecord - 1;
if ($ivf_et_chart_list->Recordset && !$ivf_et_chart_list->Recordset->EOF) {
	$ivf_et_chart_list->Recordset->moveFirst();
	$selectLimit = $ivf_et_chart_list->UseSelectLimit;
	if (!$selectLimit && $ivf_et_chart_list->StartRecord > 1)
		$ivf_et_chart_list->Recordset->move($ivf_et_chart_list->StartRecord - 1);
} elseif (!$ivf_et_chart->AllowAddDeleteRow && $ivf_et_chart_list->StopRecord == 0) {
	$ivf_et_chart_list->StopRecord = $ivf_et_chart->GridAddRowCount;
}

// Initialize aggregate
$ivf_et_chart->RowType = ROWTYPE_AGGREGATEINIT;
$ivf_et_chart->resetAttributes();
$ivf_et_chart_list->renderRow();
while ($ivf_et_chart_list->RecordCount < $ivf_et_chart_list->StopRecord) {
	$ivf_et_chart_list->RecordCount++;
	if ($ivf_et_chart_list->RecordCount >= $ivf_et_chart_list->StartRecord) {
		$ivf_et_chart_list->RowCount++;

		// Set up key count
		$ivf_et_chart_list->KeyCount = $ivf_et_chart_list->RowIndex;

		// Init row class and style
		$ivf_et_chart->resetAttributes();
		$ivf_et_chart->CssClass = "";
		if ($ivf_et_chart_list->isGridAdd()) {
		} else {
			$ivf_et_chart_list->loadRowValues($ivf_et_chart_list->Recordset); // Load row values
		}
		$ivf_et_chart->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$ivf_et_chart->RowAttrs->merge(["data-rowindex" => $ivf_et_chart_list->RowCount, "id" => "r" . $ivf_et_chart_list->RowCount . "_ivf_et_chart", "data-rowtype" => $ivf_et_chart->RowType]);

		// Render row
		$ivf_et_chart_list->renderRow();

		// Render list options
		$ivf_et_chart_list->renderListOptions();
?>
	<tr <?php echo $ivf_et_chart->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_et_chart_list->ListOptions->render("body", "left", $ivf_et_chart_list->RowCount);
?>
	<?php if ($ivf_et_chart_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $ivf_et_chart_list->id->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_list->RowCount ?>_ivf_et_chart_id">
<span<?php echo $ivf_et_chart_list->id->viewAttributes() ?>><?php echo $ivf_et_chart_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart_list->RIDNo->Visible) { // RIDNo ?>
		<td data-name="RIDNo" <?php echo $ivf_et_chart_list->RIDNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_list->RowCount ?>_ivf_et_chart_RIDNo">
<span<?php echo $ivf_et_chart_list->RIDNo->viewAttributes() ?>><?php echo $ivf_et_chart_list->RIDNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart_list->Name->Visible) { // Name ?>
		<td data-name="Name" <?php echo $ivf_et_chart_list->Name->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_list->RowCount ?>_ivf_et_chart_Name">
<span<?php echo $ivf_et_chart_list->Name->viewAttributes() ?>><?php echo $ivf_et_chart_list->Name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart_list->ARTCycle->Visible) { // ARTCycle ?>
		<td data-name="ARTCycle" <?php echo $ivf_et_chart_list->ARTCycle->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_list->RowCount ?>_ivf_et_chart_ARTCycle">
<span<?php echo $ivf_et_chart_list->ARTCycle->viewAttributes() ?>><?php echo $ivf_et_chart_list->ARTCycle->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart_list->Consultant->Visible) { // Consultant ?>
		<td data-name="Consultant" <?php echo $ivf_et_chart_list->Consultant->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_list->RowCount ?>_ivf_et_chart_Consultant">
<span<?php echo $ivf_et_chart_list->Consultant->viewAttributes() ?>><?php echo $ivf_et_chart_list->Consultant->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart_list->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
		<td data-name="InseminatinTechnique" <?php echo $ivf_et_chart_list->InseminatinTechnique->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_list->RowCount ?>_ivf_et_chart_InseminatinTechnique">
<span<?php echo $ivf_et_chart_list->InseminatinTechnique->viewAttributes() ?>><?php echo $ivf_et_chart_list->InseminatinTechnique->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart_list->IndicationForART->Visible) { // IndicationForART ?>
		<td data-name="IndicationForART" <?php echo $ivf_et_chart_list->IndicationForART->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_list->RowCount ?>_ivf_et_chart_IndicationForART">
<span<?php echo $ivf_et_chart_list->IndicationForART->viewAttributes() ?>><?php echo $ivf_et_chart_list->IndicationForART->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart_list->PreTreatment->Visible) { // PreTreatment ?>
		<td data-name="PreTreatment" <?php echo $ivf_et_chart_list->PreTreatment->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_list->RowCount ?>_ivf_et_chart_PreTreatment">
<span<?php echo $ivf_et_chart_list->PreTreatment->viewAttributes() ?>><?php echo $ivf_et_chart_list->PreTreatment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart_list->Hysteroscopy->Visible) { // Hysteroscopy ?>
		<td data-name="Hysteroscopy" <?php echo $ivf_et_chart_list->Hysteroscopy->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_list->RowCount ?>_ivf_et_chart_Hysteroscopy">
<span<?php echo $ivf_et_chart_list->Hysteroscopy->viewAttributes() ?>><?php echo $ivf_et_chart_list->Hysteroscopy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart_list->EndometrialScratching->Visible) { // EndometrialScratching ?>
		<td data-name="EndometrialScratching" <?php echo $ivf_et_chart_list->EndometrialScratching->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_list->RowCount ?>_ivf_et_chart_EndometrialScratching">
<span<?php echo $ivf_et_chart_list->EndometrialScratching->viewAttributes() ?>><?php echo $ivf_et_chart_list->EndometrialScratching->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart_list->TrialCannulation->Visible) { // TrialCannulation ?>
		<td data-name="TrialCannulation" <?php echo $ivf_et_chart_list->TrialCannulation->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_list->RowCount ?>_ivf_et_chart_TrialCannulation">
<span<?php echo $ivf_et_chart_list->TrialCannulation->viewAttributes() ?>><?php echo $ivf_et_chart_list->TrialCannulation->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart_list->CYCLETYPE->Visible) { // CYCLETYPE ?>
		<td data-name="CYCLETYPE" <?php echo $ivf_et_chart_list->CYCLETYPE->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_list->RowCount ?>_ivf_et_chart_CYCLETYPE">
<span<?php echo $ivf_et_chart_list->CYCLETYPE->viewAttributes() ?>><?php echo $ivf_et_chart_list->CYCLETYPE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart_list->HRTCYCLE->Visible) { // HRTCYCLE ?>
		<td data-name="HRTCYCLE" <?php echo $ivf_et_chart_list->HRTCYCLE->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_list->RowCount ?>_ivf_et_chart_HRTCYCLE">
<span<?php echo $ivf_et_chart_list->HRTCYCLE->viewAttributes() ?>><?php echo $ivf_et_chart_list->HRTCYCLE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart_list->OralEstrogenDosage->Visible) { // OralEstrogenDosage ?>
		<td data-name="OralEstrogenDosage" <?php echo $ivf_et_chart_list->OralEstrogenDosage->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_list->RowCount ?>_ivf_et_chart_OralEstrogenDosage">
<span<?php echo $ivf_et_chart_list->OralEstrogenDosage->viewAttributes() ?>><?php echo $ivf_et_chart_list->OralEstrogenDosage->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart_list->VaginalEstrogen->Visible) { // VaginalEstrogen ?>
		<td data-name="VaginalEstrogen" <?php echo $ivf_et_chart_list->VaginalEstrogen->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_list->RowCount ?>_ivf_et_chart_VaginalEstrogen">
<span<?php echo $ivf_et_chart_list->VaginalEstrogen->viewAttributes() ?>><?php echo $ivf_et_chart_list->VaginalEstrogen->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart_list->GCSF->Visible) { // GCSF ?>
		<td data-name="GCSF" <?php echo $ivf_et_chart_list->GCSF->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_list->RowCount ?>_ivf_et_chart_GCSF">
<span<?php echo $ivf_et_chart_list->GCSF->viewAttributes() ?>><?php echo $ivf_et_chart_list->GCSF->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart_list->ActivatedPRP->Visible) { // ActivatedPRP ?>
		<td data-name="ActivatedPRP" <?php echo $ivf_et_chart_list->ActivatedPRP->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_list->RowCount ?>_ivf_et_chart_ActivatedPRP">
<span<?php echo $ivf_et_chart_list->ActivatedPRP->viewAttributes() ?>><?php echo $ivf_et_chart_list->ActivatedPRP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart_list->ERA->Visible) { // ERA ?>
		<td data-name="ERA" <?php echo $ivf_et_chart_list->ERA->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_list->RowCount ?>_ivf_et_chart_ERA">
<span<?php echo $ivf_et_chart_list->ERA->viewAttributes() ?>><?php echo $ivf_et_chart_list->ERA->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart_list->UCLcm->Visible) { // UCLcm ?>
		<td data-name="UCLcm" <?php echo $ivf_et_chart_list->UCLcm->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_list->RowCount ?>_ivf_et_chart_UCLcm">
<span<?php echo $ivf_et_chart_list->UCLcm->viewAttributes() ?>><?php echo $ivf_et_chart_list->UCLcm->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart_list->DATEOFSTART->Visible) { // DATEOFSTART ?>
		<td data-name="DATEOFSTART" <?php echo $ivf_et_chart_list->DATEOFSTART->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_list->RowCount ?>_ivf_et_chart_DATEOFSTART">
<span<?php echo $ivf_et_chart_list->DATEOFSTART->viewAttributes() ?>><?php echo $ivf_et_chart_list->DATEOFSTART->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart_list->DATEOFEMBRYOTRANSFER->Visible) { // DATEOFEMBRYOTRANSFER ?>
		<td data-name="DATEOFEMBRYOTRANSFER" <?php echo $ivf_et_chart_list->DATEOFEMBRYOTRANSFER->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_list->RowCount ?>_ivf_et_chart_DATEOFEMBRYOTRANSFER">
<span<?php echo $ivf_et_chart_list->DATEOFEMBRYOTRANSFER->viewAttributes() ?>><?php echo $ivf_et_chart_list->DATEOFEMBRYOTRANSFER->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart_list->DAYOFEMBRYOTRANSFER->Visible) { // DAYOFEMBRYOTRANSFER ?>
		<td data-name="DAYOFEMBRYOTRANSFER" <?php echo $ivf_et_chart_list->DAYOFEMBRYOTRANSFER->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_list->RowCount ?>_ivf_et_chart_DAYOFEMBRYOTRANSFER">
<span<?php echo $ivf_et_chart_list->DAYOFEMBRYOTRANSFER->viewAttributes() ?>><?php echo $ivf_et_chart_list->DAYOFEMBRYOTRANSFER->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart_list->NOOFEMBRYOSTHAWED->Visible) { // NOOFEMBRYOSTHAWED ?>
		<td data-name="NOOFEMBRYOSTHAWED" <?php echo $ivf_et_chart_list->NOOFEMBRYOSTHAWED->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_list->RowCount ?>_ivf_et_chart_NOOFEMBRYOSTHAWED">
<span<?php echo $ivf_et_chart_list->NOOFEMBRYOSTHAWED->viewAttributes() ?>><?php echo $ivf_et_chart_list->NOOFEMBRYOSTHAWED->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart_list->NOOFEMBRYOSTRANSFERRED->Visible) { // NOOFEMBRYOSTRANSFERRED ?>
		<td data-name="NOOFEMBRYOSTRANSFERRED" <?php echo $ivf_et_chart_list->NOOFEMBRYOSTRANSFERRED->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_list->RowCount ?>_ivf_et_chart_NOOFEMBRYOSTRANSFERRED">
<span<?php echo $ivf_et_chart_list->NOOFEMBRYOSTRANSFERRED->viewAttributes() ?>><?php echo $ivf_et_chart_list->NOOFEMBRYOSTRANSFERRED->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart_list->DAYOFEMBRYOS->Visible) { // DAYOFEMBRYOS ?>
		<td data-name="DAYOFEMBRYOS" <?php echo $ivf_et_chart_list->DAYOFEMBRYOS->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_list->RowCount ?>_ivf_et_chart_DAYOFEMBRYOS">
<span<?php echo $ivf_et_chart_list->DAYOFEMBRYOS->viewAttributes() ?>><?php echo $ivf_et_chart_list->DAYOFEMBRYOS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart_list->CRYOPRESERVEDEMBRYOS->Visible) { // CRYOPRESERVEDEMBRYOS ?>
		<td data-name="CRYOPRESERVEDEMBRYOS" <?php echo $ivf_et_chart_list->CRYOPRESERVEDEMBRYOS->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_list->RowCount ?>_ivf_et_chart_CRYOPRESERVEDEMBRYOS">
<span<?php echo $ivf_et_chart_list->CRYOPRESERVEDEMBRYOS->viewAttributes() ?>><?php echo $ivf_et_chart_list->CRYOPRESERVEDEMBRYOS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart_list->Code1->Visible) { // Code1 ?>
		<td data-name="Code1" <?php echo $ivf_et_chart_list->Code1->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_list->RowCount ?>_ivf_et_chart_Code1">
<span<?php echo $ivf_et_chart_list->Code1->viewAttributes() ?>><?php echo $ivf_et_chart_list->Code1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart_list->Code2->Visible) { // Code2 ?>
		<td data-name="Code2" <?php echo $ivf_et_chart_list->Code2->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_list->RowCount ?>_ivf_et_chart_Code2">
<span<?php echo $ivf_et_chart_list->Code2->viewAttributes() ?>><?php echo $ivf_et_chart_list->Code2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart_list->CellStage1->Visible) { // CellStage1 ?>
		<td data-name="CellStage1" <?php echo $ivf_et_chart_list->CellStage1->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_list->RowCount ?>_ivf_et_chart_CellStage1">
<span<?php echo $ivf_et_chart_list->CellStage1->viewAttributes() ?>><?php echo $ivf_et_chart_list->CellStage1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart_list->CellStage2->Visible) { // CellStage2 ?>
		<td data-name="CellStage2" <?php echo $ivf_et_chart_list->CellStage2->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_list->RowCount ?>_ivf_et_chart_CellStage2">
<span<?php echo $ivf_et_chart_list->CellStage2->viewAttributes() ?>><?php echo $ivf_et_chart_list->CellStage2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart_list->Grade1->Visible) { // Grade1 ?>
		<td data-name="Grade1" <?php echo $ivf_et_chart_list->Grade1->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_list->RowCount ?>_ivf_et_chart_Grade1">
<span<?php echo $ivf_et_chart_list->Grade1->viewAttributes() ?>><?php echo $ivf_et_chart_list->Grade1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart_list->Grade2->Visible) { // Grade2 ?>
		<td data-name="Grade2" <?php echo $ivf_et_chart_list->Grade2->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_list->RowCount ?>_ivf_et_chart_Grade2">
<span<?php echo $ivf_et_chart_list->Grade2->viewAttributes() ?>><?php echo $ivf_et_chart_list->Grade2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart_list->PregnancyTestingWithSerumBetaHcG->Visible) { // PregnancyTestingWithSerumBetaHcG ?>
		<td data-name="PregnancyTestingWithSerumBetaHcG" <?php echo $ivf_et_chart_list->PregnancyTestingWithSerumBetaHcG->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_list->RowCount ?>_ivf_et_chart_PregnancyTestingWithSerumBetaHcG">
<span<?php echo $ivf_et_chart_list->PregnancyTestingWithSerumBetaHcG->viewAttributes() ?>><?php echo $ivf_et_chart_list->PregnancyTestingWithSerumBetaHcG->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart_list->ReviewDate->Visible) { // ReviewDate ?>
		<td data-name="ReviewDate" <?php echo $ivf_et_chart_list->ReviewDate->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_list->RowCount ?>_ivf_et_chart_ReviewDate">
<span<?php echo $ivf_et_chart_list->ReviewDate->viewAttributes() ?>><?php echo $ivf_et_chart_list->ReviewDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart_list->ReviewDoctor->Visible) { // ReviewDoctor ?>
		<td data-name="ReviewDoctor" <?php echo $ivf_et_chart_list->ReviewDoctor->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_list->RowCount ?>_ivf_et_chart_ReviewDoctor">
<span<?php echo $ivf_et_chart_list->ReviewDoctor->viewAttributes() ?>><?php echo $ivf_et_chart_list->ReviewDoctor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_et_chart_list->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo" <?php echo $ivf_et_chart_list->TidNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_et_chart_list->RowCount ?>_ivf_et_chart_TidNo">
<span<?php echo $ivf_et_chart_list->TidNo->viewAttributes() ?>><?php echo $ivf_et_chart_list->TidNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_et_chart_list->ListOptions->render("body", "right", $ivf_et_chart_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$ivf_et_chart_list->isGridAdd())
		$ivf_et_chart_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$ivf_et_chart->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($ivf_et_chart_list->Recordset)
	$ivf_et_chart_list->Recordset->Close();
?>
<?php if (!$ivf_et_chart_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$ivf_et_chart_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $ivf_et_chart_list->Pager->render() ?>
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
<?php if ($ivf_et_chart_list->TotalRecords == 0 && !$ivf_et_chart->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $ivf_et_chart_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$ivf_et_chart_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$ivf_et_chart_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$ivf_et_chart->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_ivf_et_chart",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$ivf_et_chart_list->terminate();
?>