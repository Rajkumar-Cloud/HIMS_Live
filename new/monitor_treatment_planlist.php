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
<?php include_once "header.php"; ?>
<?php if (!$monitor_treatment_plan_list->isExport()) { ?>
<script>
var fmonitor_treatment_planlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fmonitor_treatment_planlist = currentForm = new ew.Form("fmonitor_treatment_planlist", "list");
	fmonitor_treatment_planlist.formKeyCountName = '<?php echo $monitor_treatment_plan_list->FormKeyCountName ?>';
	loadjs.done("fmonitor_treatment_planlist");
});
var fmonitor_treatment_planlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fmonitor_treatment_planlistsrch = currentSearchForm = new ew.Form("fmonitor_treatment_planlistsrch");

	// Dynamic selection lists
	// Filters

	fmonitor_treatment_planlistsrch.filterList = <?php echo $monitor_treatment_plan_list->getFilterList() ?>;
	loadjs.done("fmonitor_treatment_planlistsrch");
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
<?php if (!$monitor_treatment_plan_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($monitor_treatment_plan_list->TotalRecords > 0 && $monitor_treatment_plan_list->ExportOptions->visible()) { ?>
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
<?php if (!$monitor_treatment_plan_list->isExport() && !$monitor_treatment_plan->CurrentAction) { ?>
<form name="fmonitor_treatment_planlistsrch" id="fmonitor_treatment_planlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fmonitor_treatment_planlistsrch-search-panel" class="<?php echo $monitor_treatment_plan_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="monitor_treatment_plan">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $monitor_treatment_plan_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($monitor_treatment_plan_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($monitor_treatment_plan_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $monitor_treatment_plan_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($monitor_treatment_plan_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($monitor_treatment_plan_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($monitor_treatment_plan_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($monitor_treatment_plan_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $monitor_treatment_plan_list->showPageHeader(); ?>
<?php
$monitor_treatment_plan_list->showMessage();
?>
<?php if ($monitor_treatment_plan_list->TotalRecords > 0 || $monitor_treatment_plan->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($monitor_treatment_plan_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> monitor_treatment_plan">
<?php if (!$monitor_treatment_plan_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$monitor_treatment_plan_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $monitor_treatment_plan_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $monitor_treatment_plan_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fmonitor_treatment_planlist" id="fmonitor_treatment_planlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="monitor_treatment_plan">
<div id="gmp_monitor_treatment_plan" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($monitor_treatment_plan_list->TotalRecords > 0 || $monitor_treatment_plan_list->isGridEdit()) { ?>
<table id="tbl_monitor_treatment_planlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$monitor_treatment_plan->RowType = ROWTYPE_HEADER;

// Render list options
$monitor_treatment_plan_list->renderListOptions();

// Render list options (header, left)
$monitor_treatment_plan_list->ListOptions->render("header", "left");
?>
<?php if ($monitor_treatment_plan_list->id->Visible) { // id ?>
	<?php if ($monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $monitor_treatment_plan_list->id->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_id" class="monitor_treatment_plan_id"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $monitor_treatment_plan_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->id) ?>', 1);"><div id="elh_monitor_treatment_plan_id" class="monitor_treatment_plan_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($monitor_treatment_plan_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan_list->PatId->Visible) { // PatId ?>
	<?php if ($monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->PatId) == "") { ?>
		<th data-name="PatId" class="<?php echo $monitor_treatment_plan_list->PatId->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_PatId" class="monitor_treatment_plan_PatId"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->PatId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatId" class="<?php echo $monitor_treatment_plan_list->PatId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->PatId) ?>', 1);"><div id="elh_monitor_treatment_plan_PatId" class="monitor_treatment_plan_PatId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->PatId->caption() ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan_list->PatId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($monitor_treatment_plan_list->PatId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan_list->PatientId->Visible) { // PatientId ?>
	<?php if ($monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $monitor_treatment_plan_list->PatientId->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_PatientId" class="monitor_treatment_plan_PatientId"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $monitor_treatment_plan_list->PatientId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->PatientId) ?>', 1);"><div id="elh_monitor_treatment_plan_PatientId" class="monitor_treatment_plan_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->PatientId->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan_list->PatientId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($monitor_treatment_plan_list->PatientId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan_list->PatientName->Visible) { // PatientName ?>
	<?php if ($monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $monitor_treatment_plan_list->PatientName->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_PatientName" class="monitor_treatment_plan_PatientName"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $monitor_treatment_plan_list->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->PatientName) ?>', 1);"><div id="elh_monitor_treatment_plan_PatientName" class="monitor_treatment_plan_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan_list->PatientName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($monitor_treatment_plan_list->PatientName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan_list->Age->Visible) { // Age ?>
	<?php if ($monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $monitor_treatment_plan_list->Age->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_Age" class="monitor_treatment_plan_Age"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $monitor_treatment_plan_list->Age->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->Age) ?>', 1);"><div id="elh_monitor_treatment_plan_Age" class="monitor_treatment_plan_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->Age->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan_list->Age->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($monitor_treatment_plan_list->Age->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan_list->MobileNo->Visible) { // MobileNo ?>
	<?php if ($monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->MobileNo) == "") { ?>
		<th data-name="MobileNo" class="<?php echo $monitor_treatment_plan_list->MobileNo->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_MobileNo" class="monitor_treatment_plan_MobileNo"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->MobileNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MobileNo" class="<?php echo $monitor_treatment_plan_list->MobileNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->MobileNo) ?>', 1);"><div id="elh_monitor_treatment_plan_MobileNo" class="monitor_treatment_plan_MobileNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->MobileNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan_list->MobileNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($monitor_treatment_plan_list->MobileNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan_list->ConsultantName->Visible) { // ConsultantName ?>
	<?php if ($monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->ConsultantName) == "") { ?>
		<th data-name="ConsultantName" class="<?php echo $monitor_treatment_plan_list->ConsultantName->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_ConsultantName" class="monitor_treatment_plan_ConsultantName"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->ConsultantName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ConsultantName" class="<?php echo $monitor_treatment_plan_list->ConsultantName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->ConsultantName) ?>', 1);"><div id="elh_monitor_treatment_plan_ConsultantName" class="monitor_treatment_plan_ConsultantName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->ConsultantName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan_list->ConsultantName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($monitor_treatment_plan_list->ConsultantName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan_list->RefDrName->Visible) { // RefDrName ?>
	<?php if ($monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->RefDrName) == "") { ?>
		<th data-name="RefDrName" class="<?php echo $monitor_treatment_plan_list->RefDrName->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_RefDrName" class="monitor_treatment_plan_RefDrName"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->RefDrName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RefDrName" class="<?php echo $monitor_treatment_plan_list->RefDrName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->RefDrName) ?>', 1);"><div id="elh_monitor_treatment_plan_RefDrName" class="monitor_treatment_plan_RefDrName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->RefDrName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan_list->RefDrName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($monitor_treatment_plan_list->RefDrName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan_list->RefDrMobileNo->Visible) { // RefDrMobileNo ?>
	<?php if ($monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->RefDrMobileNo) == "") { ?>
		<th data-name="RefDrMobileNo" class="<?php echo $monitor_treatment_plan_list->RefDrMobileNo->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_RefDrMobileNo" class="monitor_treatment_plan_RefDrMobileNo"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->RefDrMobileNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RefDrMobileNo" class="<?php echo $monitor_treatment_plan_list->RefDrMobileNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->RefDrMobileNo) ?>', 1);"><div id="elh_monitor_treatment_plan_RefDrMobileNo" class="monitor_treatment_plan_RefDrMobileNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->RefDrMobileNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan_list->RefDrMobileNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($monitor_treatment_plan_list->RefDrMobileNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan_list->NewVisitDate->Visible) { // NewVisitDate ?>
	<?php if ($monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->NewVisitDate) == "") { ?>
		<th data-name="NewVisitDate" class="<?php echo $monitor_treatment_plan_list->NewVisitDate->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_NewVisitDate" class="monitor_treatment_plan_NewVisitDate"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->NewVisitDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NewVisitDate" class="<?php echo $monitor_treatment_plan_list->NewVisitDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->NewVisitDate) ?>', 1);"><div id="elh_monitor_treatment_plan_NewVisitDate" class="monitor_treatment_plan_NewVisitDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->NewVisitDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan_list->NewVisitDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($monitor_treatment_plan_list->NewVisitDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan_list->NewVisitYesNo->Visible) { // NewVisitYesNo ?>
	<?php if ($monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->NewVisitYesNo) == "") { ?>
		<th data-name="NewVisitYesNo" class="<?php echo $monitor_treatment_plan_list->NewVisitYesNo->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_NewVisitYesNo" class="monitor_treatment_plan_NewVisitYesNo"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->NewVisitYesNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NewVisitYesNo" class="<?php echo $monitor_treatment_plan_list->NewVisitYesNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->NewVisitYesNo) ?>', 1);"><div id="elh_monitor_treatment_plan_NewVisitYesNo" class="monitor_treatment_plan_NewVisitYesNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->NewVisitYesNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan_list->NewVisitYesNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($monitor_treatment_plan_list->NewVisitYesNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan_list->Treatment->Visible) { // Treatment ?>
	<?php if ($monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->Treatment) == "") { ?>
		<th data-name="Treatment" class="<?php echo $monitor_treatment_plan_list->Treatment->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_Treatment" class="monitor_treatment_plan_Treatment"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->Treatment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Treatment" class="<?php echo $monitor_treatment_plan_list->Treatment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->Treatment) ?>', 1);"><div id="elh_monitor_treatment_plan_Treatment" class="monitor_treatment_plan_Treatment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->Treatment->caption() ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan_list->Treatment->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($monitor_treatment_plan_list->Treatment->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan_list->IUIDoneDate1->Visible) { // IUIDoneDate1 ?>
	<?php if ($monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->IUIDoneDate1) == "") { ?>
		<th data-name="IUIDoneDate1" class="<?php echo $monitor_treatment_plan_list->IUIDoneDate1->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_IUIDoneDate1" class="monitor_treatment_plan_IUIDoneDate1"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->IUIDoneDate1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IUIDoneDate1" class="<?php echo $monitor_treatment_plan_list->IUIDoneDate1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->IUIDoneDate1) ?>', 1);"><div id="elh_monitor_treatment_plan_IUIDoneDate1" class="monitor_treatment_plan_IUIDoneDate1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->IUIDoneDate1->caption() ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan_list->IUIDoneDate1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($monitor_treatment_plan_list->IUIDoneDate1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan_list->IUIDoneYesNo1->Visible) { // IUIDoneYesNo1 ?>
	<?php if ($monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->IUIDoneYesNo1) == "") { ?>
		<th data-name="IUIDoneYesNo1" class="<?php echo $monitor_treatment_plan_list->IUIDoneYesNo1->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_IUIDoneYesNo1" class="monitor_treatment_plan_IUIDoneYesNo1"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->IUIDoneYesNo1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IUIDoneYesNo1" class="<?php echo $monitor_treatment_plan_list->IUIDoneYesNo1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->IUIDoneYesNo1) ?>', 1);"><div id="elh_monitor_treatment_plan_IUIDoneYesNo1" class="monitor_treatment_plan_IUIDoneYesNo1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->IUIDoneYesNo1->caption() ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan_list->IUIDoneYesNo1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($monitor_treatment_plan_list->IUIDoneYesNo1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan_list->UPTTestDate1->Visible) { // UPTTestDate1 ?>
	<?php if ($monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->UPTTestDate1) == "") { ?>
		<th data-name="UPTTestDate1" class="<?php echo $monitor_treatment_plan_list->UPTTestDate1->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_UPTTestDate1" class="monitor_treatment_plan_UPTTestDate1"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->UPTTestDate1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UPTTestDate1" class="<?php echo $monitor_treatment_plan_list->UPTTestDate1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->UPTTestDate1) ?>', 1);"><div id="elh_monitor_treatment_plan_UPTTestDate1" class="monitor_treatment_plan_UPTTestDate1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->UPTTestDate1->caption() ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan_list->UPTTestDate1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($monitor_treatment_plan_list->UPTTestDate1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan_list->UPTTestYesNo1->Visible) { // UPTTestYesNo1 ?>
	<?php if ($monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->UPTTestYesNo1) == "") { ?>
		<th data-name="UPTTestYesNo1" class="<?php echo $monitor_treatment_plan_list->UPTTestYesNo1->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_UPTTestYesNo1" class="monitor_treatment_plan_UPTTestYesNo1"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->UPTTestYesNo1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UPTTestYesNo1" class="<?php echo $monitor_treatment_plan_list->UPTTestYesNo1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->UPTTestYesNo1) ?>', 1);"><div id="elh_monitor_treatment_plan_UPTTestYesNo1" class="monitor_treatment_plan_UPTTestYesNo1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->UPTTestYesNo1->caption() ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan_list->UPTTestYesNo1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($monitor_treatment_plan_list->UPTTestYesNo1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan_list->IUIDoneDate2->Visible) { // IUIDoneDate2 ?>
	<?php if ($monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->IUIDoneDate2) == "") { ?>
		<th data-name="IUIDoneDate2" class="<?php echo $monitor_treatment_plan_list->IUIDoneDate2->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_IUIDoneDate2" class="monitor_treatment_plan_IUIDoneDate2"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->IUIDoneDate2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IUIDoneDate2" class="<?php echo $monitor_treatment_plan_list->IUIDoneDate2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->IUIDoneDate2) ?>', 1);"><div id="elh_monitor_treatment_plan_IUIDoneDate2" class="monitor_treatment_plan_IUIDoneDate2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->IUIDoneDate2->caption() ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan_list->IUIDoneDate2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($monitor_treatment_plan_list->IUIDoneDate2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan_list->IUIDoneYesNo2->Visible) { // IUIDoneYesNo2 ?>
	<?php if ($monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->IUIDoneYesNo2) == "") { ?>
		<th data-name="IUIDoneYesNo2" class="<?php echo $monitor_treatment_plan_list->IUIDoneYesNo2->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_IUIDoneYesNo2" class="monitor_treatment_plan_IUIDoneYesNo2"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->IUIDoneYesNo2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IUIDoneYesNo2" class="<?php echo $monitor_treatment_plan_list->IUIDoneYesNo2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->IUIDoneYesNo2) ?>', 1);"><div id="elh_monitor_treatment_plan_IUIDoneYesNo2" class="monitor_treatment_plan_IUIDoneYesNo2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->IUIDoneYesNo2->caption() ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan_list->IUIDoneYesNo2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($monitor_treatment_plan_list->IUIDoneYesNo2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan_list->UPTTestDate2->Visible) { // UPTTestDate2 ?>
	<?php if ($monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->UPTTestDate2) == "") { ?>
		<th data-name="UPTTestDate2" class="<?php echo $monitor_treatment_plan_list->UPTTestDate2->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_UPTTestDate2" class="monitor_treatment_plan_UPTTestDate2"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->UPTTestDate2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UPTTestDate2" class="<?php echo $monitor_treatment_plan_list->UPTTestDate2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->UPTTestDate2) ?>', 1);"><div id="elh_monitor_treatment_plan_UPTTestDate2" class="monitor_treatment_plan_UPTTestDate2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->UPTTestDate2->caption() ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan_list->UPTTestDate2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($monitor_treatment_plan_list->UPTTestDate2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan_list->UPTTestYesNo2->Visible) { // UPTTestYesNo2 ?>
	<?php if ($monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->UPTTestYesNo2) == "") { ?>
		<th data-name="UPTTestYesNo2" class="<?php echo $monitor_treatment_plan_list->UPTTestYesNo2->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_UPTTestYesNo2" class="monitor_treatment_plan_UPTTestYesNo2"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->UPTTestYesNo2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UPTTestYesNo2" class="<?php echo $monitor_treatment_plan_list->UPTTestYesNo2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->UPTTestYesNo2) ?>', 1);"><div id="elh_monitor_treatment_plan_UPTTestYesNo2" class="monitor_treatment_plan_UPTTestYesNo2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->UPTTestYesNo2->caption() ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan_list->UPTTestYesNo2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($monitor_treatment_plan_list->UPTTestYesNo2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan_list->IUIDoneDate3->Visible) { // IUIDoneDate3 ?>
	<?php if ($monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->IUIDoneDate3) == "") { ?>
		<th data-name="IUIDoneDate3" class="<?php echo $monitor_treatment_plan_list->IUIDoneDate3->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_IUIDoneDate3" class="monitor_treatment_plan_IUIDoneDate3"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->IUIDoneDate3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IUIDoneDate3" class="<?php echo $monitor_treatment_plan_list->IUIDoneDate3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->IUIDoneDate3) ?>', 1);"><div id="elh_monitor_treatment_plan_IUIDoneDate3" class="monitor_treatment_plan_IUIDoneDate3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->IUIDoneDate3->caption() ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan_list->IUIDoneDate3->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($monitor_treatment_plan_list->IUIDoneDate3->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan_list->IUIDoneYesNo3->Visible) { // IUIDoneYesNo3 ?>
	<?php if ($monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->IUIDoneYesNo3) == "") { ?>
		<th data-name="IUIDoneYesNo3" class="<?php echo $monitor_treatment_plan_list->IUIDoneYesNo3->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_IUIDoneYesNo3" class="monitor_treatment_plan_IUIDoneYesNo3"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->IUIDoneYesNo3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IUIDoneYesNo3" class="<?php echo $monitor_treatment_plan_list->IUIDoneYesNo3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->IUIDoneYesNo3) ?>', 1);"><div id="elh_monitor_treatment_plan_IUIDoneYesNo3" class="monitor_treatment_plan_IUIDoneYesNo3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->IUIDoneYesNo3->caption() ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan_list->IUIDoneYesNo3->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($monitor_treatment_plan_list->IUIDoneYesNo3->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan_list->UPTTestDate3->Visible) { // UPTTestDate3 ?>
	<?php if ($monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->UPTTestDate3) == "") { ?>
		<th data-name="UPTTestDate3" class="<?php echo $monitor_treatment_plan_list->UPTTestDate3->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_UPTTestDate3" class="monitor_treatment_plan_UPTTestDate3"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->UPTTestDate3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UPTTestDate3" class="<?php echo $monitor_treatment_plan_list->UPTTestDate3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->UPTTestDate3) ?>', 1);"><div id="elh_monitor_treatment_plan_UPTTestDate3" class="monitor_treatment_plan_UPTTestDate3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->UPTTestDate3->caption() ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan_list->UPTTestDate3->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($monitor_treatment_plan_list->UPTTestDate3->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan_list->UPTTestYesNo3->Visible) { // UPTTestYesNo3 ?>
	<?php if ($monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->UPTTestYesNo3) == "") { ?>
		<th data-name="UPTTestYesNo3" class="<?php echo $monitor_treatment_plan_list->UPTTestYesNo3->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_UPTTestYesNo3" class="monitor_treatment_plan_UPTTestYesNo3"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->UPTTestYesNo3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UPTTestYesNo3" class="<?php echo $monitor_treatment_plan_list->UPTTestYesNo3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->UPTTestYesNo3) ?>', 1);"><div id="elh_monitor_treatment_plan_UPTTestYesNo3" class="monitor_treatment_plan_UPTTestYesNo3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->UPTTestYesNo3->caption() ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan_list->UPTTestYesNo3->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($monitor_treatment_plan_list->UPTTestYesNo3->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan_list->IUIDoneDate4->Visible) { // IUIDoneDate4 ?>
	<?php if ($monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->IUIDoneDate4) == "") { ?>
		<th data-name="IUIDoneDate4" class="<?php echo $monitor_treatment_plan_list->IUIDoneDate4->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_IUIDoneDate4" class="monitor_treatment_plan_IUIDoneDate4"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->IUIDoneDate4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IUIDoneDate4" class="<?php echo $monitor_treatment_plan_list->IUIDoneDate4->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->IUIDoneDate4) ?>', 1);"><div id="elh_monitor_treatment_plan_IUIDoneDate4" class="monitor_treatment_plan_IUIDoneDate4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->IUIDoneDate4->caption() ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan_list->IUIDoneDate4->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($monitor_treatment_plan_list->IUIDoneDate4->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan_list->IUIDoneYesNo4->Visible) { // IUIDoneYesNo4 ?>
	<?php if ($monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->IUIDoneYesNo4) == "") { ?>
		<th data-name="IUIDoneYesNo4" class="<?php echo $monitor_treatment_plan_list->IUIDoneYesNo4->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_IUIDoneYesNo4" class="monitor_treatment_plan_IUIDoneYesNo4"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->IUIDoneYesNo4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IUIDoneYesNo4" class="<?php echo $monitor_treatment_plan_list->IUIDoneYesNo4->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->IUIDoneYesNo4) ?>', 1);"><div id="elh_monitor_treatment_plan_IUIDoneYesNo4" class="monitor_treatment_plan_IUIDoneYesNo4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->IUIDoneYesNo4->caption() ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan_list->IUIDoneYesNo4->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($monitor_treatment_plan_list->IUIDoneYesNo4->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan_list->UPTTestDate4->Visible) { // UPTTestDate4 ?>
	<?php if ($monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->UPTTestDate4) == "") { ?>
		<th data-name="UPTTestDate4" class="<?php echo $monitor_treatment_plan_list->UPTTestDate4->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_UPTTestDate4" class="monitor_treatment_plan_UPTTestDate4"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->UPTTestDate4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UPTTestDate4" class="<?php echo $monitor_treatment_plan_list->UPTTestDate4->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->UPTTestDate4) ?>', 1);"><div id="elh_monitor_treatment_plan_UPTTestDate4" class="monitor_treatment_plan_UPTTestDate4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->UPTTestDate4->caption() ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan_list->UPTTestDate4->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($monitor_treatment_plan_list->UPTTestDate4->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan_list->UPTTestYesNo4->Visible) { // UPTTestYesNo4 ?>
	<?php if ($monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->UPTTestYesNo4) == "") { ?>
		<th data-name="UPTTestYesNo4" class="<?php echo $monitor_treatment_plan_list->UPTTestYesNo4->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_UPTTestYesNo4" class="monitor_treatment_plan_UPTTestYesNo4"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->UPTTestYesNo4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UPTTestYesNo4" class="<?php echo $monitor_treatment_plan_list->UPTTestYesNo4->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->UPTTestYesNo4) ?>', 1);"><div id="elh_monitor_treatment_plan_UPTTestYesNo4" class="monitor_treatment_plan_UPTTestYesNo4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->UPTTestYesNo4->caption() ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan_list->UPTTestYesNo4->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($monitor_treatment_plan_list->UPTTestYesNo4->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan_list->IVFStimulationDate->Visible) { // IVFStimulationDate ?>
	<?php if ($monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->IVFStimulationDate) == "") { ?>
		<th data-name="IVFStimulationDate" class="<?php echo $monitor_treatment_plan_list->IVFStimulationDate->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_IVFStimulationDate" class="monitor_treatment_plan_IVFStimulationDate"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->IVFStimulationDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IVFStimulationDate" class="<?php echo $monitor_treatment_plan_list->IVFStimulationDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->IVFStimulationDate) ?>', 1);"><div id="elh_monitor_treatment_plan_IVFStimulationDate" class="monitor_treatment_plan_IVFStimulationDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->IVFStimulationDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan_list->IVFStimulationDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($monitor_treatment_plan_list->IVFStimulationDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan_list->IVFStimulationYesNo->Visible) { // IVFStimulationYesNo ?>
	<?php if ($monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->IVFStimulationYesNo) == "") { ?>
		<th data-name="IVFStimulationYesNo" class="<?php echo $monitor_treatment_plan_list->IVFStimulationYesNo->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_IVFStimulationYesNo" class="monitor_treatment_plan_IVFStimulationYesNo"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->IVFStimulationYesNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IVFStimulationYesNo" class="<?php echo $monitor_treatment_plan_list->IVFStimulationYesNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->IVFStimulationYesNo) ?>', 1);"><div id="elh_monitor_treatment_plan_IVFStimulationYesNo" class="monitor_treatment_plan_IVFStimulationYesNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->IVFStimulationYesNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan_list->IVFStimulationYesNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($monitor_treatment_plan_list->IVFStimulationYesNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan_list->OPUDate->Visible) { // OPUDate ?>
	<?php if ($monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->OPUDate) == "") { ?>
		<th data-name="OPUDate" class="<?php echo $monitor_treatment_plan_list->OPUDate->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_OPUDate" class="monitor_treatment_plan_OPUDate"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->OPUDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OPUDate" class="<?php echo $monitor_treatment_plan_list->OPUDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->OPUDate) ?>', 1);"><div id="elh_monitor_treatment_plan_OPUDate" class="monitor_treatment_plan_OPUDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->OPUDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan_list->OPUDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($monitor_treatment_plan_list->OPUDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan_list->OPUYesNo->Visible) { // OPUYesNo ?>
	<?php if ($monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->OPUYesNo) == "") { ?>
		<th data-name="OPUYesNo" class="<?php echo $monitor_treatment_plan_list->OPUYesNo->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_OPUYesNo" class="monitor_treatment_plan_OPUYesNo"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->OPUYesNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OPUYesNo" class="<?php echo $monitor_treatment_plan_list->OPUYesNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->OPUYesNo) ?>', 1);"><div id="elh_monitor_treatment_plan_OPUYesNo" class="monitor_treatment_plan_OPUYesNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->OPUYesNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan_list->OPUYesNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($monitor_treatment_plan_list->OPUYesNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan_list->ETDate->Visible) { // ETDate ?>
	<?php if ($monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->ETDate) == "") { ?>
		<th data-name="ETDate" class="<?php echo $monitor_treatment_plan_list->ETDate->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_ETDate" class="monitor_treatment_plan_ETDate"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->ETDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ETDate" class="<?php echo $monitor_treatment_plan_list->ETDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->ETDate) ?>', 1);"><div id="elh_monitor_treatment_plan_ETDate" class="monitor_treatment_plan_ETDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->ETDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan_list->ETDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($monitor_treatment_plan_list->ETDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan_list->ETYesNo->Visible) { // ETYesNo ?>
	<?php if ($monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->ETYesNo) == "") { ?>
		<th data-name="ETYesNo" class="<?php echo $monitor_treatment_plan_list->ETYesNo->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_ETYesNo" class="monitor_treatment_plan_ETYesNo"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->ETYesNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ETYesNo" class="<?php echo $monitor_treatment_plan_list->ETYesNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->ETYesNo) ?>', 1);"><div id="elh_monitor_treatment_plan_ETYesNo" class="monitor_treatment_plan_ETYesNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->ETYesNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan_list->ETYesNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($monitor_treatment_plan_list->ETYesNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan_list->BetaHCGDate->Visible) { // BetaHCGDate ?>
	<?php if ($monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->BetaHCGDate) == "") { ?>
		<th data-name="BetaHCGDate" class="<?php echo $monitor_treatment_plan_list->BetaHCGDate->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_BetaHCGDate" class="monitor_treatment_plan_BetaHCGDate"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->BetaHCGDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BetaHCGDate" class="<?php echo $monitor_treatment_plan_list->BetaHCGDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->BetaHCGDate) ?>', 1);"><div id="elh_monitor_treatment_plan_BetaHCGDate" class="monitor_treatment_plan_BetaHCGDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->BetaHCGDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan_list->BetaHCGDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($monitor_treatment_plan_list->BetaHCGDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan_list->BetaHCGYesNo->Visible) { // BetaHCGYesNo ?>
	<?php if ($monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->BetaHCGYesNo) == "") { ?>
		<th data-name="BetaHCGYesNo" class="<?php echo $monitor_treatment_plan_list->BetaHCGYesNo->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_BetaHCGYesNo" class="monitor_treatment_plan_BetaHCGYesNo"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->BetaHCGYesNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BetaHCGYesNo" class="<?php echo $monitor_treatment_plan_list->BetaHCGYesNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->BetaHCGYesNo) ?>', 1);"><div id="elh_monitor_treatment_plan_BetaHCGYesNo" class="monitor_treatment_plan_BetaHCGYesNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->BetaHCGYesNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan_list->BetaHCGYesNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($monitor_treatment_plan_list->BetaHCGYesNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan_list->FETDate->Visible) { // FETDate ?>
	<?php if ($monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->FETDate) == "") { ?>
		<th data-name="FETDate" class="<?php echo $monitor_treatment_plan_list->FETDate->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_FETDate" class="monitor_treatment_plan_FETDate"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->FETDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FETDate" class="<?php echo $monitor_treatment_plan_list->FETDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->FETDate) ?>', 1);"><div id="elh_monitor_treatment_plan_FETDate" class="monitor_treatment_plan_FETDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->FETDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan_list->FETDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($monitor_treatment_plan_list->FETDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan_list->FETYesNo->Visible) { // FETYesNo ?>
	<?php if ($monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->FETYesNo) == "") { ?>
		<th data-name="FETYesNo" class="<?php echo $monitor_treatment_plan_list->FETYesNo->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_FETYesNo" class="monitor_treatment_plan_FETYesNo"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->FETYesNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FETYesNo" class="<?php echo $monitor_treatment_plan_list->FETYesNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->FETYesNo) ?>', 1);"><div id="elh_monitor_treatment_plan_FETYesNo" class="monitor_treatment_plan_FETYesNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->FETYesNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan_list->FETYesNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($monitor_treatment_plan_list->FETYesNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan_list->FBetaHCGDate->Visible) { // FBetaHCGDate ?>
	<?php if ($monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->FBetaHCGDate) == "") { ?>
		<th data-name="FBetaHCGDate" class="<?php echo $monitor_treatment_plan_list->FBetaHCGDate->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_FBetaHCGDate" class="monitor_treatment_plan_FBetaHCGDate"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->FBetaHCGDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FBetaHCGDate" class="<?php echo $monitor_treatment_plan_list->FBetaHCGDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->FBetaHCGDate) ?>', 1);"><div id="elh_monitor_treatment_plan_FBetaHCGDate" class="monitor_treatment_plan_FBetaHCGDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->FBetaHCGDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan_list->FBetaHCGDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($monitor_treatment_plan_list->FBetaHCGDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan_list->FBetaHCGYesNo->Visible) { // FBetaHCGYesNo ?>
	<?php if ($monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->FBetaHCGYesNo) == "") { ?>
		<th data-name="FBetaHCGYesNo" class="<?php echo $monitor_treatment_plan_list->FBetaHCGYesNo->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_FBetaHCGYesNo" class="monitor_treatment_plan_FBetaHCGYesNo"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->FBetaHCGYesNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FBetaHCGYesNo" class="<?php echo $monitor_treatment_plan_list->FBetaHCGYesNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->FBetaHCGYesNo) ?>', 1);"><div id="elh_monitor_treatment_plan_FBetaHCGYesNo" class="monitor_treatment_plan_FBetaHCGYesNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->FBetaHCGYesNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan_list->FBetaHCGYesNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($monitor_treatment_plan_list->FBetaHCGYesNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan_list->createdby->Visible) { // createdby ?>
	<?php if ($monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $monitor_treatment_plan_list->createdby->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_createdby" class="monitor_treatment_plan_createdby"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $monitor_treatment_plan_list->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->createdby) ?>', 1);"><div id="elh_monitor_treatment_plan_createdby" class="monitor_treatment_plan_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->createdby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan_list->createdby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($monitor_treatment_plan_list->createdby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan_list->createddatetime->Visible) { // createddatetime ?>
	<?php if ($monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $monitor_treatment_plan_list->createddatetime->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_createddatetime" class="monitor_treatment_plan_createddatetime"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $monitor_treatment_plan_list->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->createddatetime) ?>', 1);"><div id="elh_monitor_treatment_plan_createddatetime" class="monitor_treatment_plan_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan_list->createddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($monitor_treatment_plan_list->createddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan_list->modifiedby->Visible) { // modifiedby ?>
	<?php if ($monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $monitor_treatment_plan_list->modifiedby->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_modifiedby" class="monitor_treatment_plan_modifiedby"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $monitor_treatment_plan_list->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->modifiedby) ?>', 1);"><div id="elh_monitor_treatment_plan_modifiedby" class="monitor_treatment_plan_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->modifiedby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan_list->modifiedby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($monitor_treatment_plan_list->modifiedby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan_list->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $monitor_treatment_plan_list->modifieddatetime->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_modifieddatetime" class="monitor_treatment_plan_modifieddatetime"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $monitor_treatment_plan_list->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->modifieddatetime) ?>', 1);"><div id="elh_monitor_treatment_plan_modifieddatetime" class="monitor_treatment_plan_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan_list->modifieddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($monitor_treatment_plan_list->modifieddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($monitor_treatment_plan_list->HospID->Visible) { // HospID ?>
	<?php if ($monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $monitor_treatment_plan_list->HospID->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_HospID" class="monitor_treatment_plan_HospID"><div class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $monitor_treatment_plan_list->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $monitor_treatment_plan_list->SortUrl($monitor_treatment_plan_list->HospID) ?>', 1);"><div id="elh_monitor_treatment_plan_HospID" class="monitor_treatment_plan_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $monitor_treatment_plan_list->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($monitor_treatment_plan_list->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($monitor_treatment_plan_list->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
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
if ($monitor_treatment_plan_list->ExportAll && $monitor_treatment_plan_list->isExport()) {
	$monitor_treatment_plan_list->StopRecord = $monitor_treatment_plan_list->TotalRecords;
} else {

	// Set the last record to display
	if ($monitor_treatment_plan_list->TotalRecords > $monitor_treatment_plan_list->StartRecord + $monitor_treatment_plan_list->DisplayRecords - 1)
		$monitor_treatment_plan_list->StopRecord = $monitor_treatment_plan_list->StartRecord + $monitor_treatment_plan_list->DisplayRecords - 1;
	else
		$monitor_treatment_plan_list->StopRecord = $monitor_treatment_plan_list->TotalRecords;
}
$monitor_treatment_plan_list->RecordCount = $monitor_treatment_plan_list->StartRecord - 1;
if ($monitor_treatment_plan_list->Recordset && !$monitor_treatment_plan_list->Recordset->EOF) {
	$monitor_treatment_plan_list->Recordset->moveFirst();
	$selectLimit = $monitor_treatment_plan_list->UseSelectLimit;
	if (!$selectLimit && $monitor_treatment_plan_list->StartRecord > 1)
		$monitor_treatment_plan_list->Recordset->move($monitor_treatment_plan_list->StartRecord - 1);
} elseif (!$monitor_treatment_plan->AllowAddDeleteRow && $monitor_treatment_plan_list->StopRecord == 0) {
	$monitor_treatment_plan_list->StopRecord = $monitor_treatment_plan->GridAddRowCount;
}

// Initialize aggregate
$monitor_treatment_plan->RowType = ROWTYPE_AGGREGATEINIT;
$monitor_treatment_plan->resetAttributes();
$monitor_treatment_plan_list->renderRow();
while ($monitor_treatment_plan_list->RecordCount < $monitor_treatment_plan_list->StopRecord) {
	$monitor_treatment_plan_list->RecordCount++;
	if ($monitor_treatment_plan_list->RecordCount >= $monitor_treatment_plan_list->StartRecord) {
		$monitor_treatment_plan_list->RowCount++;

		// Set up key count
		$monitor_treatment_plan_list->KeyCount = $monitor_treatment_plan_list->RowIndex;

		// Init row class and style
		$monitor_treatment_plan->resetAttributes();
		$monitor_treatment_plan->CssClass = "";
		if ($monitor_treatment_plan_list->isGridAdd()) {
		} else {
			$monitor_treatment_plan_list->loadRowValues($monitor_treatment_plan_list->Recordset); // Load row values
		}
		$monitor_treatment_plan->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$monitor_treatment_plan->RowAttrs->merge(["data-rowindex" => $monitor_treatment_plan_list->RowCount, "id" => "r" . $monitor_treatment_plan_list->RowCount . "_monitor_treatment_plan", "data-rowtype" => $monitor_treatment_plan->RowType]);

		// Render row
		$monitor_treatment_plan_list->renderRow();

		// Render list options
		$monitor_treatment_plan_list->renderListOptions();
?>
	<tr <?php echo $monitor_treatment_plan->rowAttributes() ?>>
<?php

// Render list options (body, left)
$monitor_treatment_plan_list->ListOptions->render("body", "left", $monitor_treatment_plan_list->RowCount);
?>
	<?php if ($monitor_treatment_plan_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $monitor_treatment_plan_list->id->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCount ?>_monitor_treatment_plan_id">
<span<?php echo $monitor_treatment_plan_list->id->viewAttributes() ?>><?php echo $monitor_treatment_plan_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan_list->PatId->Visible) { // PatId ?>
		<td data-name="PatId" <?php echo $monitor_treatment_plan_list->PatId->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCount ?>_monitor_treatment_plan_PatId">
<span<?php echo $monitor_treatment_plan_list->PatId->viewAttributes() ?>><?php echo $monitor_treatment_plan_list->PatId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan_list->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId" <?php echo $monitor_treatment_plan_list->PatientId->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCount ?>_monitor_treatment_plan_PatientId">
<span<?php echo $monitor_treatment_plan_list->PatientId->viewAttributes() ?>><?php echo $monitor_treatment_plan_list->PatientId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan_list->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName" <?php echo $monitor_treatment_plan_list->PatientName->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCount ?>_monitor_treatment_plan_PatientName">
<span<?php echo $monitor_treatment_plan_list->PatientName->viewAttributes() ?>><?php echo $monitor_treatment_plan_list->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan_list->Age->Visible) { // Age ?>
		<td data-name="Age" <?php echo $monitor_treatment_plan_list->Age->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCount ?>_monitor_treatment_plan_Age">
<span<?php echo $monitor_treatment_plan_list->Age->viewAttributes() ?>><?php echo $monitor_treatment_plan_list->Age->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan_list->MobileNo->Visible) { // MobileNo ?>
		<td data-name="MobileNo" <?php echo $monitor_treatment_plan_list->MobileNo->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCount ?>_monitor_treatment_plan_MobileNo">
<span<?php echo $monitor_treatment_plan_list->MobileNo->viewAttributes() ?>><?php echo $monitor_treatment_plan_list->MobileNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan_list->ConsultantName->Visible) { // ConsultantName ?>
		<td data-name="ConsultantName" <?php echo $monitor_treatment_plan_list->ConsultantName->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCount ?>_monitor_treatment_plan_ConsultantName">
<span<?php echo $monitor_treatment_plan_list->ConsultantName->viewAttributes() ?>><?php echo $monitor_treatment_plan_list->ConsultantName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan_list->RefDrName->Visible) { // RefDrName ?>
		<td data-name="RefDrName" <?php echo $monitor_treatment_plan_list->RefDrName->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCount ?>_monitor_treatment_plan_RefDrName">
<span<?php echo $monitor_treatment_plan_list->RefDrName->viewAttributes() ?>><?php echo $monitor_treatment_plan_list->RefDrName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan_list->RefDrMobileNo->Visible) { // RefDrMobileNo ?>
		<td data-name="RefDrMobileNo" <?php echo $monitor_treatment_plan_list->RefDrMobileNo->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCount ?>_monitor_treatment_plan_RefDrMobileNo">
<span<?php echo $monitor_treatment_plan_list->RefDrMobileNo->viewAttributes() ?>><?php echo $monitor_treatment_plan_list->RefDrMobileNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan_list->NewVisitDate->Visible) { // NewVisitDate ?>
		<td data-name="NewVisitDate" <?php echo $monitor_treatment_plan_list->NewVisitDate->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCount ?>_monitor_treatment_plan_NewVisitDate">
<span<?php echo $monitor_treatment_plan_list->NewVisitDate->viewAttributes() ?>><?php echo $monitor_treatment_plan_list->NewVisitDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan_list->NewVisitYesNo->Visible) { // NewVisitYesNo ?>
		<td data-name="NewVisitYesNo" <?php echo $monitor_treatment_plan_list->NewVisitYesNo->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCount ?>_monitor_treatment_plan_NewVisitYesNo">
<span<?php echo $monitor_treatment_plan_list->NewVisitYesNo->viewAttributes() ?>><?php echo $monitor_treatment_plan_list->NewVisitYesNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan_list->Treatment->Visible) { // Treatment ?>
		<td data-name="Treatment" <?php echo $monitor_treatment_plan_list->Treatment->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCount ?>_monitor_treatment_plan_Treatment">
<span<?php echo $monitor_treatment_plan_list->Treatment->viewAttributes() ?>><?php echo $monitor_treatment_plan_list->Treatment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan_list->IUIDoneDate1->Visible) { // IUIDoneDate1 ?>
		<td data-name="IUIDoneDate1" <?php echo $monitor_treatment_plan_list->IUIDoneDate1->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCount ?>_monitor_treatment_plan_IUIDoneDate1">
<span<?php echo $monitor_treatment_plan_list->IUIDoneDate1->viewAttributes() ?>><?php echo $monitor_treatment_plan_list->IUIDoneDate1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan_list->IUIDoneYesNo1->Visible) { // IUIDoneYesNo1 ?>
		<td data-name="IUIDoneYesNo1" <?php echo $monitor_treatment_plan_list->IUIDoneYesNo1->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCount ?>_monitor_treatment_plan_IUIDoneYesNo1">
<span<?php echo $monitor_treatment_plan_list->IUIDoneYesNo1->viewAttributes() ?>><?php echo $monitor_treatment_plan_list->IUIDoneYesNo1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan_list->UPTTestDate1->Visible) { // UPTTestDate1 ?>
		<td data-name="UPTTestDate1" <?php echo $monitor_treatment_plan_list->UPTTestDate1->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCount ?>_monitor_treatment_plan_UPTTestDate1">
<span<?php echo $monitor_treatment_plan_list->UPTTestDate1->viewAttributes() ?>><?php echo $monitor_treatment_plan_list->UPTTestDate1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan_list->UPTTestYesNo1->Visible) { // UPTTestYesNo1 ?>
		<td data-name="UPTTestYesNo1" <?php echo $monitor_treatment_plan_list->UPTTestYesNo1->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCount ?>_monitor_treatment_plan_UPTTestYesNo1">
<span<?php echo $monitor_treatment_plan_list->UPTTestYesNo1->viewAttributes() ?>><?php echo $monitor_treatment_plan_list->UPTTestYesNo1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan_list->IUIDoneDate2->Visible) { // IUIDoneDate2 ?>
		<td data-name="IUIDoneDate2" <?php echo $monitor_treatment_plan_list->IUIDoneDate2->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCount ?>_monitor_treatment_plan_IUIDoneDate2">
<span<?php echo $monitor_treatment_plan_list->IUIDoneDate2->viewAttributes() ?>><?php echo $monitor_treatment_plan_list->IUIDoneDate2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan_list->IUIDoneYesNo2->Visible) { // IUIDoneYesNo2 ?>
		<td data-name="IUIDoneYesNo2" <?php echo $monitor_treatment_plan_list->IUIDoneYesNo2->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCount ?>_monitor_treatment_plan_IUIDoneYesNo2">
<span<?php echo $monitor_treatment_plan_list->IUIDoneYesNo2->viewAttributes() ?>><?php echo $monitor_treatment_plan_list->IUIDoneYesNo2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan_list->UPTTestDate2->Visible) { // UPTTestDate2 ?>
		<td data-name="UPTTestDate2" <?php echo $monitor_treatment_plan_list->UPTTestDate2->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCount ?>_monitor_treatment_plan_UPTTestDate2">
<span<?php echo $monitor_treatment_plan_list->UPTTestDate2->viewAttributes() ?>><?php echo $monitor_treatment_plan_list->UPTTestDate2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan_list->UPTTestYesNo2->Visible) { // UPTTestYesNo2 ?>
		<td data-name="UPTTestYesNo2" <?php echo $monitor_treatment_plan_list->UPTTestYesNo2->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCount ?>_monitor_treatment_plan_UPTTestYesNo2">
<span<?php echo $monitor_treatment_plan_list->UPTTestYesNo2->viewAttributes() ?>><?php echo $monitor_treatment_plan_list->UPTTestYesNo2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan_list->IUIDoneDate3->Visible) { // IUIDoneDate3 ?>
		<td data-name="IUIDoneDate3" <?php echo $monitor_treatment_plan_list->IUIDoneDate3->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCount ?>_monitor_treatment_plan_IUIDoneDate3">
<span<?php echo $monitor_treatment_plan_list->IUIDoneDate3->viewAttributes() ?>><?php echo $monitor_treatment_plan_list->IUIDoneDate3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan_list->IUIDoneYesNo3->Visible) { // IUIDoneYesNo3 ?>
		<td data-name="IUIDoneYesNo3" <?php echo $monitor_treatment_plan_list->IUIDoneYesNo3->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCount ?>_monitor_treatment_plan_IUIDoneYesNo3">
<span<?php echo $monitor_treatment_plan_list->IUIDoneYesNo3->viewAttributes() ?>><?php echo $monitor_treatment_plan_list->IUIDoneYesNo3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan_list->UPTTestDate3->Visible) { // UPTTestDate3 ?>
		<td data-name="UPTTestDate3" <?php echo $monitor_treatment_plan_list->UPTTestDate3->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCount ?>_monitor_treatment_plan_UPTTestDate3">
<span<?php echo $monitor_treatment_plan_list->UPTTestDate3->viewAttributes() ?>><?php echo $monitor_treatment_plan_list->UPTTestDate3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan_list->UPTTestYesNo3->Visible) { // UPTTestYesNo3 ?>
		<td data-name="UPTTestYesNo3" <?php echo $monitor_treatment_plan_list->UPTTestYesNo3->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCount ?>_monitor_treatment_plan_UPTTestYesNo3">
<span<?php echo $monitor_treatment_plan_list->UPTTestYesNo3->viewAttributes() ?>><?php echo $monitor_treatment_plan_list->UPTTestYesNo3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan_list->IUIDoneDate4->Visible) { // IUIDoneDate4 ?>
		<td data-name="IUIDoneDate4" <?php echo $monitor_treatment_plan_list->IUIDoneDate4->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCount ?>_monitor_treatment_plan_IUIDoneDate4">
<span<?php echo $monitor_treatment_plan_list->IUIDoneDate4->viewAttributes() ?>><?php echo $monitor_treatment_plan_list->IUIDoneDate4->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan_list->IUIDoneYesNo4->Visible) { // IUIDoneYesNo4 ?>
		<td data-name="IUIDoneYesNo4" <?php echo $monitor_treatment_plan_list->IUIDoneYesNo4->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCount ?>_monitor_treatment_plan_IUIDoneYesNo4">
<span<?php echo $monitor_treatment_plan_list->IUIDoneYesNo4->viewAttributes() ?>><?php echo $monitor_treatment_plan_list->IUIDoneYesNo4->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan_list->UPTTestDate4->Visible) { // UPTTestDate4 ?>
		<td data-name="UPTTestDate4" <?php echo $monitor_treatment_plan_list->UPTTestDate4->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCount ?>_monitor_treatment_plan_UPTTestDate4">
<span<?php echo $monitor_treatment_plan_list->UPTTestDate4->viewAttributes() ?>><?php echo $monitor_treatment_plan_list->UPTTestDate4->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan_list->UPTTestYesNo4->Visible) { // UPTTestYesNo4 ?>
		<td data-name="UPTTestYesNo4" <?php echo $monitor_treatment_plan_list->UPTTestYesNo4->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCount ?>_monitor_treatment_plan_UPTTestYesNo4">
<span<?php echo $monitor_treatment_plan_list->UPTTestYesNo4->viewAttributes() ?>><?php echo $monitor_treatment_plan_list->UPTTestYesNo4->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan_list->IVFStimulationDate->Visible) { // IVFStimulationDate ?>
		<td data-name="IVFStimulationDate" <?php echo $monitor_treatment_plan_list->IVFStimulationDate->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCount ?>_monitor_treatment_plan_IVFStimulationDate">
<span<?php echo $monitor_treatment_plan_list->IVFStimulationDate->viewAttributes() ?>><?php echo $monitor_treatment_plan_list->IVFStimulationDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan_list->IVFStimulationYesNo->Visible) { // IVFStimulationYesNo ?>
		<td data-name="IVFStimulationYesNo" <?php echo $monitor_treatment_plan_list->IVFStimulationYesNo->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCount ?>_monitor_treatment_plan_IVFStimulationYesNo">
<span<?php echo $monitor_treatment_plan_list->IVFStimulationYesNo->viewAttributes() ?>><?php echo $monitor_treatment_plan_list->IVFStimulationYesNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan_list->OPUDate->Visible) { // OPUDate ?>
		<td data-name="OPUDate" <?php echo $monitor_treatment_plan_list->OPUDate->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCount ?>_monitor_treatment_plan_OPUDate">
<span<?php echo $monitor_treatment_plan_list->OPUDate->viewAttributes() ?>><?php echo $monitor_treatment_plan_list->OPUDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan_list->OPUYesNo->Visible) { // OPUYesNo ?>
		<td data-name="OPUYesNo" <?php echo $monitor_treatment_plan_list->OPUYesNo->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCount ?>_monitor_treatment_plan_OPUYesNo">
<span<?php echo $monitor_treatment_plan_list->OPUYesNo->viewAttributes() ?>><?php echo $monitor_treatment_plan_list->OPUYesNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan_list->ETDate->Visible) { // ETDate ?>
		<td data-name="ETDate" <?php echo $monitor_treatment_plan_list->ETDate->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCount ?>_monitor_treatment_plan_ETDate">
<span<?php echo $monitor_treatment_plan_list->ETDate->viewAttributes() ?>><?php echo $monitor_treatment_plan_list->ETDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan_list->ETYesNo->Visible) { // ETYesNo ?>
		<td data-name="ETYesNo" <?php echo $monitor_treatment_plan_list->ETYesNo->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCount ?>_monitor_treatment_plan_ETYesNo">
<span<?php echo $monitor_treatment_plan_list->ETYesNo->viewAttributes() ?>><?php echo $monitor_treatment_plan_list->ETYesNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan_list->BetaHCGDate->Visible) { // BetaHCGDate ?>
		<td data-name="BetaHCGDate" <?php echo $monitor_treatment_plan_list->BetaHCGDate->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCount ?>_monitor_treatment_plan_BetaHCGDate">
<span<?php echo $monitor_treatment_plan_list->BetaHCGDate->viewAttributes() ?>><?php echo $monitor_treatment_plan_list->BetaHCGDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan_list->BetaHCGYesNo->Visible) { // BetaHCGYesNo ?>
		<td data-name="BetaHCGYesNo" <?php echo $monitor_treatment_plan_list->BetaHCGYesNo->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCount ?>_monitor_treatment_plan_BetaHCGYesNo">
<span<?php echo $monitor_treatment_plan_list->BetaHCGYesNo->viewAttributes() ?>><?php echo $monitor_treatment_plan_list->BetaHCGYesNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan_list->FETDate->Visible) { // FETDate ?>
		<td data-name="FETDate" <?php echo $monitor_treatment_plan_list->FETDate->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCount ?>_monitor_treatment_plan_FETDate">
<span<?php echo $monitor_treatment_plan_list->FETDate->viewAttributes() ?>><?php echo $monitor_treatment_plan_list->FETDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan_list->FETYesNo->Visible) { // FETYesNo ?>
		<td data-name="FETYesNo" <?php echo $monitor_treatment_plan_list->FETYesNo->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCount ?>_monitor_treatment_plan_FETYesNo">
<span<?php echo $monitor_treatment_plan_list->FETYesNo->viewAttributes() ?>><?php echo $monitor_treatment_plan_list->FETYesNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan_list->FBetaHCGDate->Visible) { // FBetaHCGDate ?>
		<td data-name="FBetaHCGDate" <?php echo $monitor_treatment_plan_list->FBetaHCGDate->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCount ?>_monitor_treatment_plan_FBetaHCGDate">
<span<?php echo $monitor_treatment_plan_list->FBetaHCGDate->viewAttributes() ?>><?php echo $monitor_treatment_plan_list->FBetaHCGDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan_list->FBetaHCGYesNo->Visible) { // FBetaHCGYesNo ?>
		<td data-name="FBetaHCGYesNo" <?php echo $monitor_treatment_plan_list->FBetaHCGYesNo->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCount ?>_monitor_treatment_plan_FBetaHCGYesNo">
<span<?php echo $monitor_treatment_plan_list->FBetaHCGYesNo->viewAttributes() ?>><?php echo $monitor_treatment_plan_list->FBetaHCGYesNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan_list->createdby->Visible) { // createdby ?>
		<td data-name="createdby" <?php echo $monitor_treatment_plan_list->createdby->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCount ?>_monitor_treatment_plan_createdby">
<span<?php echo $monitor_treatment_plan_list->createdby->viewAttributes() ?>><?php echo $monitor_treatment_plan_list->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan_list->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" <?php echo $monitor_treatment_plan_list->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCount ?>_monitor_treatment_plan_createddatetime">
<span<?php echo $monitor_treatment_plan_list->createddatetime->viewAttributes() ?>><?php echo $monitor_treatment_plan_list->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan_list->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby" <?php echo $monitor_treatment_plan_list->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCount ?>_monitor_treatment_plan_modifiedby">
<span<?php echo $monitor_treatment_plan_list->modifiedby->viewAttributes() ?>><?php echo $monitor_treatment_plan_list->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan_list->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime" <?php echo $monitor_treatment_plan_list->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCount ?>_monitor_treatment_plan_modifieddatetime">
<span<?php echo $monitor_treatment_plan_list->modifieddatetime->viewAttributes() ?>><?php echo $monitor_treatment_plan_list->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($monitor_treatment_plan_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $monitor_treatment_plan_list->HospID->cellAttributes() ?>>
<span id="el<?php echo $monitor_treatment_plan_list->RowCount ?>_monitor_treatment_plan_HospID">
<span<?php echo $monitor_treatment_plan_list->HospID->viewAttributes() ?>><?php echo $monitor_treatment_plan_list->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$monitor_treatment_plan_list->ListOptions->render("body", "right", $monitor_treatment_plan_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$monitor_treatment_plan_list->isGridAdd())
		$monitor_treatment_plan_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$monitor_treatment_plan->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($monitor_treatment_plan_list->Recordset)
	$monitor_treatment_plan_list->Recordset->Close();
?>
<?php if (!$monitor_treatment_plan_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$monitor_treatment_plan_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $monitor_treatment_plan_list->Pager->render() ?>
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
<?php if ($monitor_treatment_plan_list->TotalRecords == 0 && !$monitor_treatment_plan->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $monitor_treatment_plan_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$monitor_treatment_plan_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$monitor_treatment_plan_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$monitor_treatment_plan->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_monitor_treatment_plan",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$monitor_treatment_plan_list->terminate();
?>