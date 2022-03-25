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
$_view_patient_services_dashboard_list = new _view_patient_services_dashboard_list();

// Run the page
$_view_patient_services_dashboard_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$_view_patient_services_dashboard_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$_view_patient_services_dashboard_list->isExport()) { ?>
<script>
var f_view_patient_services_dashboardlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	f_view_patient_services_dashboardlist = currentForm = new ew.Form("f_view_patient_services_dashboardlist", "list");
	f_view_patient_services_dashboardlist.formKeyCountName = '<?php echo $_view_patient_services_dashboard_list->FormKeyCountName ?>';
	loadjs.done("f_view_patient_services_dashboardlist");
});
var f_view_patient_services_dashboardlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	f_view_patient_services_dashboardlistsrch = currentSearchForm = new ew.Form("f_view_patient_services_dashboardlistsrch");

	// Dynamic selection lists
	// Filters

	f_view_patient_services_dashboardlistsrch.filterList = <?php echo $_view_patient_services_dashboard_list->getFilterList() ?>;
	loadjs.done("f_view_patient_services_dashboardlistsrch");
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
<?php if (!$_view_patient_services_dashboard_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($_view_patient_services_dashboard_list->TotalRecords > 0 && $_view_patient_services_dashboard_list->ExportOptions->visible()) { ?>
<?php $_view_patient_services_dashboard_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->ImportOptions->visible()) { ?>
<?php $_view_patient_services_dashboard_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->SearchOptions->visible()) { ?>
<?php $_view_patient_services_dashboard_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->FilterOptions->visible()) { ?>
<?php $_view_patient_services_dashboard_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$_view_patient_services_dashboard_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$_view_patient_services_dashboard_list->isExport() && !$_view_patient_services_dashboard->CurrentAction) { ?>
<form name="f_view_patient_services_dashboardlistsrch" id="f_view_patient_services_dashboardlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="f_view_patient_services_dashboardlistsrch-search-panel" class="<?php echo $_view_patient_services_dashboard_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="_view_patient_services_dashboard">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $_view_patient_services_dashboard_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($_view_patient_services_dashboard_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($_view_patient_services_dashboard_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $_view_patient_services_dashboard_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($_view_patient_services_dashboard_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($_view_patient_services_dashboard_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($_view_patient_services_dashboard_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($_view_patient_services_dashboard_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $_view_patient_services_dashboard_list->showPageHeader(); ?>
<?php
$_view_patient_services_dashboard_list->showMessage();
?>
<?php if ($_view_patient_services_dashboard_list->TotalRecords > 0 || $_view_patient_services_dashboard->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($_view_patient_services_dashboard_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> _view_patient_services_dashboard">
<?php if (!$_view_patient_services_dashboard_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$_view_patient_services_dashboard_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $_view_patient_services_dashboard_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $_view_patient_services_dashboard_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="f_view_patient_services_dashboardlist" id="f_view_patient_services_dashboardlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="_view_patient_services_dashboard">
<div id="gmp__view_patient_services_dashboard" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($_view_patient_services_dashboard_list->TotalRecords > 0 || $_view_patient_services_dashboard_list->isGridEdit()) { ?>
<table id="tbl__view_patient_services_dashboardlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$_view_patient_services_dashboard->RowType = ROWTYPE_HEADER;

// Render list options
$_view_patient_services_dashboard_list->renderListOptions();

// Render list options (header, left)
$_view_patient_services_dashboard_list->ListOptions->render("header", "left");
?>
<?php if ($_view_patient_services_dashboard_list->id->Visible) { // id ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $_view_patient_services_dashboard_list->id->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_id" class="_view_patient_services_dashboard_id"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $_view_patient_services_dashboard_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->id) ?>', 1);"><div id="elh__view_patient_services_dashboard_id" class="_view_patient_services_dashboard_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->Reception->Visible) { // Reception ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->Reception) == "") { ?>
		<th data-name="Reception" class="<?php echo $_view_patient_services_dashboard_list->Reception->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_Reception" class="_view_patient_services_dashboard_Reception"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->Reception->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Reception" class="<?php echo $_view_patient_services_dashboard_list->Reception->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->Reception) ?>', 1);"><div id="elh__view_patient_services_dashboard_Reception" class="_view_patient_services_dashboard_Reception">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->Reception->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->Reception->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->Reception->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->PatID->Visible) { // PatID ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->PatID) == "") { ?>
		<th data-name="PatID" class="<?php echo $_view_patient_services_dashboard_list->PatID->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_PatID" class="_view_patient_services_dashboard_PatID"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->PatID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatID" class="<?php echo $_view_patient_services_dashboard_list->PatID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->PatID) ?>', 1);"><div id="elh__view_patient_services_dashboard_PatID" class="_view_patient_services_dashboard_PatID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->PatID->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->PatID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->PatID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->mrnno->Visible) { // mrnno ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->mrnno) == "") { ?>
		<th data-name="mrnno" class="<?php echo $_view_patient_services_dashboard_list->mrnno->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_mrnno" class="_view_patient_services_dashboard_mrnno"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->mrnno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnno" class="<?php echo $_view_patient_services_dashboard_list->mrnno->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->mrnno) ?>', 1);"><div id="elh__view_patient_services_dashboard_mrnno" class="_view_patient_services_dashboard_mrnno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->mrnno->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->mrnno->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->mrnno->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->PatientName->Visible) { // PatientName ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $_view_patient_services_dashboard_list->PatientName->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_PatientName" class="_view_patient_services_dashboard_PatientName"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $_view_patient_services_dashboard_list->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->PatientName) ?>', 1);"><div id="elh__view_patient_services_dashboard_PatientName" class="_view_patient_services_dashboard_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->PatientName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->PatientName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->Age->Visible) { // Age ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $_view_patient_services_dashboard_list->Age->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_Age" class="_view_patient_services_dashboard_Age"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $_view_patient_services_dashboard_list->Age->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->Age) ?>', 1);"><div id="elh__view_patient_services_dashboard_Age" class="_view_patient_services_dashboard_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->Age->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->Age->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->Age->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->Gender->Visible) { // Gender ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->Gender) == "") { ?>
		<th data-name="Gender" class="<?php echo $_view_patient_services_dashboard_list->Gender->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_Gender" class="_view_patient_services_dashboard_Gender"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->Gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gender" class="<?php echo $_view_patient_services_dashboard_list->Gender->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->Gender) ?>', 1);"><div id="elh__view_patient_services_dashboard_Gender" class="_view_patient_services_dashboard_Gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->Gender->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->Gender->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->Gender->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->Services->Visible) { // Services ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->Services) == "") { ?>
		<th data-name="Services" class="<?php echo $_view_patient_services_dashboard_list->Services->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_Services" class="_view_patient_services_dashboard_Services"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->Services->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Services" class="<?php echo $_view_patient_services_dashboard_list->Services->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->Services) ?>', 1);"><div id="elh__view_patient_services_dashboard_Services" class="_view_patient_services_dashboard_Services">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->Services->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->Services->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->Services->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->Unit->Visible) { // Unit ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->Unit) == "") { ?>
		<th data-name="Unit" class="<?php echo $_view_patient_services_dashboard_list->Unit->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_Unit" class="_view_patient_services_dashboard_Unit"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->Unit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Unit" class="<?php echo $_view_patient_services_dashboard_list->Unit->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->Unit) ?>', 1);"><div id="elh__view_patient_services_dashboard_Unit" class="_view_patient_services_dashboard_Unit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->Unit->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->Unit->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->Unit->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->amount->Visible) { // amount ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->amount) == "") { ?>
		<th data-name="amount" class="<?php echo $_view_patient_services_dashboard_list->amount->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_amount" class="_view_patient_services_dashboard_amount"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="amount" class="<?php echo $_view_patient_services_dashboard_list->amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->amount) ?>', 1);"><div id="elh__view_patient_services_dashboard_amount" class="_view_patient_services_dashboard_amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->amount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->amount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->Quantity->Visible) { // Quantity ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->Quantity) == "") { ?>
		<th data-name="Quantity" class="<?php echo $_view_patient_services_dashboard_list->Quantity->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_Quantity" class="_view_patient_services_dashboard_Quantity"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->Quantity->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Quantity" class="<?php echo $_view_patient_services_dashboard_list->Quantity->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->Quantity) ?>', 1);"><div id="elh__view_patient_services_dashboard_Quantity" class="_view_patient_services_dashboard_Quantity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->Quantity->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->Quantity->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->Quantity->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->Discount->Visible) { // Discount ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->Discount) == "") { ?>
		<th data-name="Discount" class="<?php echo $_view_patient_services_dashboard_list->Discount->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_Discount" class="_view_patient_services_dashboard_Discount"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->Discount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Discount" class="<?php echo $_view_patient_services_dashboard_list->Discount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->Discount) ?>', 1);"><div id="elh__view_patient_services_dashboard_Discount" class="_view_patient_services_dashboard_Discount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->Discount->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->Discount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->Discount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->SubTotal->Visible) { // SubTotal ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->SubTotal) == "") { ?>
		<th data-name="SubTotal" class="<?php echo $_view_patient_services_dashboard_list->SubTotal->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_SubTotal" class="_view_patient_services_dashboard_SubTotal"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->SubTotal->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SubTotal" class="<?php echo $_view_patient_services_dashboard_list->SubTotal->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->SubTotal) ?>', 1);"><div id="elh__view_patient_services_dashboard_SubTotal" class="_view_patient_services_dashboard_SubTotal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->SubTotal->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->SubTotal->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->SubTotal->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->patient_type->Visible) { // patient_type ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->patient_type) == "") { ?>
		<th data-name="patient_type" class="<?php echo $_view_patient_services_dashboard_list->patient_type->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_patient_type" class="_view_patient_services_dashboard_patient_type"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->patient_type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patient_type" class="<?php echo $_view_patient_services_dashboard_list->patient_type->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->patient_type) ?>', 1);"><div id="elh__view_patient_services_dashboard_patient_type" class="_view_patient_services_dashboard_patient_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->patient_type->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->patient_type->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->patient_type->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->charged_date->Visible) { // charged_date ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->charged_date) == "") { ?>
		<th data-name="charged_date" class="<?php echo $_view_patient_services_dashboard_list->charged_date->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_charged_date" class="_view_patient_services_dashboard_charged_date"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->charged_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="charged_date" class="<?php echo $_view_patient_services_dashboard_list->charged_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->charged_date) ?>', 1);"><div id="elh__view_patient_services_dashboard_charged_date" class="_view_patient_services_dashboard_charged_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->charged_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->charged_date->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->charged_date->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->status->Visible) { // status ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->status) == "") { ?>
		<th data-name="status" class="<?php echo $_view_patient_services_dashboard_list->status->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_status" class="_view_patient_services_dashboard_status"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $_view_patient_services_dashboard_list->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->status) ?>', 1);"><div id="elh__view_patient_services_dashboard_status" class="_view_patient_services_dashboard_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->createdby->Visible) { // createdby ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $_view_patient_services_dashboard_list->createdby->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_createdby" class="_view_patient_services_dashboard_createdby"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $_view_patient_services_dashboard_list->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->createdby) ?>', 1);"><div id="elh__view_patient_services_dashboard_createdby" class="_view_patient_services_dashboard_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->createdby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->createdby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->createdby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->createddatetime->Visible) { // createddatetime ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $_view_patient_services_dashboard_list->createddatetime->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_createddatetime" class="_view_patient_services_dashboard_createddatetime"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $_view_patient_services_dashboard_list->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->createddatetime) ?>', 1);"><div id="elh__view_patient_services_dashboard_createddatetime" class="_view_patient_services_dashboard_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->createddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->createddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->modifiedby->Visible) { // modifiedby ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $_view_patient_services_dashboard_list->modifiedby->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_modifiedby" class="_view_patient_services_dashboard_modifiedby"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $_view_patient_services_dashboard_list->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->modifiedby) ?>', 1);"><div id="elh__view_patient_services_dashboard_modifiedby" class="_view_patient_services_dashboard_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->modifiedby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->modifiedby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->modifiedby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $_view_patient_services_dashboard_list->modifieddatetime->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_modifieddatetime" class="_view_patient_services_dashboard_modifieddatetime"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $_view_patient_services_dashboard_list->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->modifieddatetime) ?>', 1);"><div id="elh__view_patient_services_dashboard_modifieddatetime" class="_view_patient_services_dashboard_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->modifieddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->modifieddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->Aid->Visible) { // Aid ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->Aid) == "") { ?>
		<th data-name="Aid" class="<?php echo $_view_patient_services_dashboard_list->Aid->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_Aid" class="_view_patient_services_dashboard_Aid"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->Aid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Aid" class="<?php echo $_view_patient_services_dashboard_list->Aid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->Aid) ?>', 1);"><div id="elh__view_patient_services_dashboard_Aid" class="_view_patient_services_dashboard_Aid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->Aid->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->Aid->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->Aid->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->Vid->Visible) { // Vid ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->Vid) == "") { ?>
		<th data-name="Vid" class="<?php echo $_view_patient_services_dashboard_list->Vid->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_Vid" class="_view_patient_services_dashboard_Vid"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->Vid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Vid" class="<?php echo $_view_patient_services_dashboard_list->Vid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->Vid) ?>', 1);"><div id="elh__view_patient_services_dashboard_Vid" class="_view_patient_services_dashboard_Vid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->Vid->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->Vid->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->Vid->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->DrID->Visible) { // DrID ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->DrID) == "") { ?>
		<th data-name="DrID" class="<?php echo $_view_patient_services_dashboard_list->DrID->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_DrID" class="_view_patient_services_dashboard_DrID"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->DrID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrID" class="<?php echo $_view_patient_services_dashboard_list->DrID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->DrID) ?>', 1);"><div id="elh__view_patient_services_dashboard_DrID" class="_view_patient_services_dashboard_DrID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->DrID->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->DrID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->DrID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->DrCODE->Visible) { // DrCODE ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->DrCODE) == "") { ?>
		<th data-name="DrCODE" class="<?php echo $_view_patient_services_dashboard_list->DrCODE->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_DrCODE" class="_view_patient_services_dashboard_DrCODE"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->DrCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrCODE" class="<?php echo $_view_patient_services_dashboard_list->DrCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->DrCODE) ?>', 1);"><div id="elh__view_patient_services_dashboard_DrCODE" class="_view_patient_services_dashboard_DrCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->DrCODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->DrCODE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->DrCODE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->DrName->Visible) { // DrName ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->DrName) == "") { ?>
		<th data-name="DrName" class="<?php echo $_view_patient_services_dashboard_list->DrName->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_DrName" class="_view_patient_services_dashboard_DrName"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->DrName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrName" class="<?php echo $_view_patient_services_dashboard_list->DrName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->DrName) ?>', 1);"><div id="elh__view_patient_services_dashboard_DrName" class="_view_patient_services_dashboard_DrName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->DrName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->DrName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->DrName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->Department->Visible) { // Department ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->Department) == "") { ?>
		<th data-name="Department" class="<?php echo $_view_patient_services_dashboard_list->Department->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_Department" class="_view_patient_services_dashboard_Department"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->Department->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Department" class="<?php echo $_view_patient_services_dashboard_list->Department->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->Department) ?>', 1);"><div id="elh__view_patient_services_dashboard_Department" class="_view_patient_services_dashboard_Department">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->Department->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->Department->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->Department->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->DrSharePres->Visible) { // DrSharePres ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->DrSharePres) == "") { ?>
		<th data-name="DrSharePres" class="<?php echo $_view_patient_services_dashboard_list->DrSharePres->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_DrSharePres" class="_view_patient_services_dashboard_DrSharePres"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->DrSharePres->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrSharePres" class="<?php echo $_view_patient_services_dashboard_list->DrSharePres->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->DrSharePres) ?>', 1);"><div id="elh__view_patient_services_dashboard_DrSharePres" class="_view_patient_services_dashboard_DrSharePres">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->DrSharePres->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->DrSharePres->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->DrSharePres->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->HospSharePres->Visible) { // HospSharePres ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->HospSharePres) == "") { ?>
		<th data-name="HospSharePres" class="<?php echo $_view_patient_services_dashboard_list->HospSharePres->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_HospSharePres" class="_view_patient_services_dashboard_HospSharePres"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->HospSharePres->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospSharePres" class="<?php echo $_view_patient_services_dashboard_list->HospSharePres->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->HospSharePres) ?>', 1);"><div id="elh__view_patient_services_dashboard_HospSharePres" class="_view_patient_services_dashboard_HospSharePres">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->HospSharePres->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->HospSharePres->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->HospSharePres->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->DrShareAmount->Visible) { // DrShareAmount ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->DrShareAmount) == "") { ?>
		<th data-name="DrShareAmount" class="<?php echo $_view_patient_services_dashboard_list->DrShareAmount->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_DrShareAmount" class="_view_patient_services_dashboard_DrShareAmount"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->DrShareAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrShareAmount" class="<?php echo $_view_patient_services_dashboard_list->DrShareAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->DrShareAmount) ?>', 1);"><div id="elh__view_patient_services_dashboard_DrShareAmount" class="_view_patient_services_dashboard_DrShareAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->DrShareAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->DrShareAmount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->DrShareAmount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->HospShareAmount->Visible) { // HospShareAmount ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->HospShareAmount) == "") { ?>
		<th data-name="HospShareAmount" class="<?php echo $_view_patient_services_dashboard_list->HospShareAmount->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_HospShareAmount" class="_view_patient_services_dashboard_HospShareAmount"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->HospShareAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospShareAmount" class="<?php echo $_view_patient_services_dashboard_list->HospShareAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->HospShareAmount) ?>', 1);"><div id="elh__view_patient_services_dashboard_HospShareAmount" class="_view_patient_services_dashboard_HospShareAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->HospShareAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->HospShareAmount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->HospShareAmount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->DrShareSettiledAmount->Visible) { // DrShareSettiledAmount ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->DrShareSettiledAmount) == "") { ?>
		<th data-name="DrShareSettiledAmount" class="<?php echo $_view_patient_services_dashboard_list->DrShareSettiledAmount->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_DrShareSettiledAmount" class="_view_patient_services_dashboard_DrShareSettiledAmount"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->DrShareSettiledAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrShareSettiledAmount" class="<?php echo $_view_patient_services_dashboard_list->DrShareSettiledAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->DrShareSettiledAmount) ?>', 1);"><div id="elh__view_patient_services_dashboard_DrShareSettiledAmount" class="_view_patient_services_dashboard_DrShareSettiledAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->DrShareSettiledAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->DrShareSettiledAmount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->DrShareSettiledAmount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->DrShareSettledId->Visible) { // DrShareSettledId ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->DrShareSettledId) == "") { ?>
		<th data-name="DrShareSettledId" class="<?php echo $_view_patient_services_dashboard_list->DrShareSettledId->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_DrShareSettledId" class="_view_patient_services_dashboard_DrShareSettledId"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->DrShareSettledId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrShareSettledId" class="<?php echo $_view_patient_services_dashboard_list->DrShareSettledId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->DrShareSettledId) ?>', 1);"><div id="elh__view_patient_services_dashboard_DrShareSettledId" class="_view_patient_services_dashboard_DrShareSettledId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->DrShareSettledId->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->DrShareSettledId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->DrShareSettledId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->DrShareSettiledStatus->Visible) { // DrShareSettiledStatus ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->DrShareSettiledStatus) == "") { ?>
		<th data-name="DrShareSettiledStatus" class="<?php echo $_view_patient_services_dashboard_list->DrShareSettiledStatus->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_DrShareSettiledStatus" class="_view_patient_services_dashboard_DrShareSettiledStatus"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->DrShareSettiledStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrShareSettiledStatus" class="<?php echo $_view_patient_services_dashboard_list->DrShareSettiledStatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->DrShareSettiledStatus) ?>', 1);"><div id="elh__view_patient_services_dashboard_DrShareSettiledStatus" class="_view_patient_services_dashboard_DrShareSettiledStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->DrShareSettiledStatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->DrShareSettiledStatus->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->DrShareSettiledStatus->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->invoiceId->Visible) { // invoiceId ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->invoiceId) == "") { ?>
		<th data-name="invoiceId" class="<?php echo $_view_patient_services_dashboard_list->invoiceId->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_invoiceId" class="_view_patient_services_dashboard_invoiceId"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->invoiceId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="invoiceId" class="<?php echo $_view_patient_services_dashboard_list->invoiceId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->invoiceId) ?>', 1);"><div id="elh__view_patient_services_dashboard_invoiceId" class="_view_patient_services_dashboard_invoiceId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->invoiceId->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->invoiceId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->invoiceId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->invoiceAmount->Visible) { // invoiceAmount ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->invoiceAmount) == "") { ?>
		<th data-name="invoiceAmount" class="<?php echo $_view_patient_services_dashboard_list->invoiceAmount->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_invoiceAmount" class="_view_patient_services_dashboard_invoiceAmount"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->invoiceAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="invoiceAmount" class="<?php echo $_view_patient_services_dashboard_list->invoiceAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->invoiceAmount) ?>', 1);"><div id="elh__view_patient_services_dashboard_invoiceAmount" class="_view_patient_services_dashboard_invoiceAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->invoiceAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->invoiceAmount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->invoiceAmount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->invoiceStatus->Visible) { // invoiceStatus ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->invoiceStatus) == "") { ?>
		<th data-name="invoiceStatus" class="<?php echo $_view_patient_services_dashboard_list->invoiceStatus->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_invoiceStatus" class="_view_patient_services_dashboard_invoiceStatus"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->invoiceStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="invoiceStatus" class="<?php echo $_view_patient_services_dashboard_list->invoiceStatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->invoiceStatus) ?>', 1);"><div id="elh__view_patient_services_dashboard_invoiceStatus" class="_view_patient_services_dashboard_invoiceStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->invoiceStatus->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->invoiceStatus->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->invoiceStatus->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->modeOfPayment->Visible) { // modeOfPayment ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->modeOfPayment) == "") { ?>
		<th data-name="modeOfPayment" class="<?php echo $_view_patient_services_dashboard_list->modeOfPayment->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_modeOfPayment" class="_view_patient_services_dashboard_modeOfPayment"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->modeOfPayment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modeOfPayment" class="<?php echo $_view_patient_services_dashboard_list->modeOfPayment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->modeOfPayment) ?>', 1);"><div id="elh__view_patient_services_dashboard_modeOfPayment" class="_view_patient_services_dashboard_modeOfPayment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->modeOfPayment->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->modeOfPayment->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->modeOfPayment->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->HospID->Visible) { // HospID ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $_view_patient_services_dashboard_list->HospID->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_HospID" class="_view_patient_services_dashboard_HospID"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $_view_patient_services_dashboard_list->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->HospID) ?>', 1);"><div id="elh__view_patient_services_dashboard_HospID" class="_view_patient_services_dashboard_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->RIDNO->Visible) { // RIDNO ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->RIDNO) == "") { ?>
		<th data-name="RIDNO" class="<?php echo $_view_patient_services_dashboard_list->RIDNO->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_RIDNO" class="_view_patient_services_dashboard_RIDNO"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->RIDNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RIDNO" class="<?php echo $_view_patient_services_dashboard_list->RIDNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->RIDNO) ?>', 1);"><div id="elh__view_patient_services_dashboard_RIDNO" class="_view_patient_services_dashboard_RIDNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->RIDNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->RIDNO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->RIDNO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->TidNo->Visible) { // TidNo ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->TidNo) == "") { ?>
		<th data-name="TidNo" class="<?php echo $_view_patient_services_dashboard_list->TidNo->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_TidNo" class="_view_patient_services_dashboard_TidNo"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->TidNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TidNo" class="<?php echo $_view_patient_services_dashboard_list->TidNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->TidNo) ?>', 1);"><div id="elh__view_patient_services_dashboard_TidNo" class="_view_patient_services_dashboard_TidNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->TidNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->TidNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->TidNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->DiscountCategory->Visible) { // DiscountCategory ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->DiscountCategory) == "") { ?>
		<th data-name="DiscountCategory" class="<?php echo $_view_patient_services_dashboard_list->DiscountCategory->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_DiscountCategory" class="_view_patient_services_dashboard_DiscountCategory"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->DiscountCategory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DiscountCategory" class="<?php echo $_view_patient_services_dashboard_list->DiscountCategory->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->DiscountCategory) ?>', 1);"><div id="elh__view_patient_services_dashboard_DiscountCategory" class="_view_patient_services_dashboard_DiscountCategory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->DiscountCategory->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->DiscountCategory->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->DiscountCategory->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->sid->Visible) { // sid ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->sid) == "") { ?>
		<th data-name="sid" class="<?php echo $_view_patient_services_dashboard_list->sid->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_sid" class="_view_patient_services_dashboard_sid"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->sid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sid" class="<?php echo $_view_patient_services_dashboard_list->sid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->sid) ?>', 1);"><div id="elh__view_patient_services_dashboard_sid" class="_view_patient_services_dashboard_sid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->sid->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->sid->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->sid->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->ItemCode->Visible) { // ItemCode ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->ItemCode) == "") { ?>
		<th data-name="ItemCode" class="<?php echo $_view_patient_services_dashboard_list->ItemCode->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_ItemCode" class="_view_patient_services_dashboard_ItemCode"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->ItemCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ItemCode" class="<?php echo $_view_patient_services_dashboard_list->ItemCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->ItemCode) ?>', 1);"><div id="elh__view_patient_services_dashboard_ItemCode" class="_view_patient_services_dashboard_ItemCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->ItemCode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->ItemCode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->ItemCode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->TestSubCd->Visible) { // TestSubCd ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->TestSubCd) == "") { ?>
		<th data-name="TestSubCd" class="<?php echo $_view_patient_services_dashboard_list->TestSubCd->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_TestSubCd" class="_view_patient_services_dashboard_TestSubCd"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->TestSubCd->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestSubCd" class="<?php echo $_view_patient_services_dashboard_list->TestSubCd->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->TestSubCd) ?>', 1);"><div id="elh__view_patient_services_dashboard_TestSubCd" class="_view_patient_services_dashboard_TestSubCd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->TestSubCd->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->TestSubCd->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->TestSubCd->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->DEptCd->Visible) { // DEptCd ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->DEptCd) == "") { ?>
		<th data-name="DEptCd" class="<?php echo $_view_patient_services_dashboard_list->DEptCd->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_DEptCd" class="_view_patient_services_dashboard_DEptCd"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->DEptCd->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DEptCd" class="<?php echo $_view_patient_services_dashboard_list->DEptCd->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->DEptCd) ?>', 1);"><div id="elh__view_patient_services_dashboard_DEptCd" class="_view_patient_services_dashboard_DEptCd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->DEptCd->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->DEptCd->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->DEptCd->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->ProfCd->Visible) { // ProfCd ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->ProfCd) == "") { ?>
		<th data-name="ProfCd" class="<?php echo $_view_patient_services_dashboard_list->ProfCd->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_ProfCd" class="_view_patient_services_dashboard_ProfCd"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->ProfCd->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProfCd" class="<?php echo $_view_patient_services_dashboard_list->ProfCd->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->ProfCd) ?>', 1);"><div id="elh__view_patient_services_dashboard_ProfCd" class="_view_patient_services_dashboard_ProfCd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->ProfCd->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->ProfCd->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->ProfCd->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->Comments->Visible) { // Comments ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->Comments) == "") { ?>
		<th data-name="Comments" class="<?php echo $_view_patient_services_dashboard_list->Comments->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_Comments" class="_view_patient_services_dashboard_Comments"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->Comments->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Comments" class="<?php echo $_view_patient_services_dashboard_list->Comments->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->Comments) ?>', 1);"><div id="elh__view_patient_services_dashboard_Comments" class="_view_patient_services_dashboard_Comments">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->Comments->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->Comments->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->Comments->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->Method->Visible) { // Method ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->Method) == "") { ?>
		<th data-name="Method" class="<?php echo $_view_patient_services_dashboard_list->Method->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_Method" class="_view_patient_services_dashboard_Method"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->Method->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Method" class="<?php echo $_view_patient_services_dashboard_list->Method->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->Method) ?>', 1);"><div id="elh__view_patient_services_dashboard_Method" class="_view_patient_services_dashboard_Method">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->Method->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->Method->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->Method->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->Specimen->Visible) { // Specimen ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->Specimen) == "") { ?>
		<th data-name="Specimen" class="<?php echo $_view_patient_services_dashboard_list->Specimen->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_Specimen" class="_view_patient_services_dashboard_Specimen"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->Specimen->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Specimen" class="<?php echo $_view_patient_services_dashboard_list->Specimen->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->Specimen) ?>', 1);"><div id="elh__view_patient_services_dashboard_Specimen" class="_view_patient_services_dashboard_Specimen">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->Specimen->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->Specimen->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->Specimen->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->Abnormal->Visible) { // Abnormal ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->Abnormal) == "") { ?>
		<th data-name="Abnormal" class="<?php echo $_view_patient_services_dashboard_list->Abnormal->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_Abnormal" class="_view_patient_services_dashboard_Abnormal"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->Abnormal->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Abnormal" class="<?php echo $_view_patient_services_dashboard_list->Abnormal->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->Abnormal) ?>', 1);"><div id="elh__view_patient_services_dashboard_Abnormal" class="_view_patient_services_dashboard_Abnormal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->Abnormal->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->Abnormal->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->Abnormal->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->TestUnit->Visible) { // TestUnit ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->TestUnit) == "") { ?>
		<th data-name="TestUnit" class="<?php echo $_view_patient_services_dashboard_list->TestUnit->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_TestUnit" class="_view_patient_services_dashboard_TestUnit"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->TestUnit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestUnit" class="<?php echo $_view_patient_services_dashboard_list->TestUnit->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->TestUnit) ?>', 1);"><div id="elh__view_patient_services_dashboard_TestUnit" class="_view_patient_services_dashboard_TestUnit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->TestUnit->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->TestUnit->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->TestUnit->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->LOWHIGH->Visible) { // LOWHIGH ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->LOWHIGH) == "") { ?>
		<th data-name="LOWHIGH" class="<?php echo $_view_patient_services_dashboard_list->LOWHIGH->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_LOWHIGH" class="_view_patient_services_dashboard_LOWHIGH"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->LOWHIGH->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LOWHIGH" class="<?php echo $_view_patient_services_dashboard_list->LOWHIGH->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->LOWHIGH) ?>', 1);"><div id="elh__view_patient_services_dashboard_LOWHIGH" class="_view_patient_services_dashboard_LOWHIGH">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->LOWHIGH->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->LOWHIGH->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->LOWHIGH->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->Branch->Visible) { // Branch ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->Branch) == "") { ?>
		<th data-name="Branch" class="<?php echo $_view_patient_services_dashboard_list->Branch->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_Branch" class="_view_patient_services_dashboard_Branch"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->Branch->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Branch" class="<?php echo $_view_patient_services_dashboard_list->Branch->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->Branch) ?>', 1);"><div id="elh__view_patient_services_dashboard_Branch" class="_view_patient_services_dashboard_Branch">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->Branch->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->Branch->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->Branch->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->Dispatch->Visible) { // Dispatch ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->Dispatch) == "") { ?>
		<th data-name="Dispatch" class="<?php echo $_view_patient_services_dashboard_list->Dispatch->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_Dispatch" class="_view_patient_services_dashboard_Dispatch"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->Dispatch->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Dispatch" class="<?php echo $_view_patient_services_dashboard_list->Dispatch->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->Dispatch) ?>', 1);"><div id="elh__view_patient_services_dashboard_Dispatch" class="_view_patient_services_dashboard_Dispatch">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->Dispatch->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->Dispatch->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->Dispatch->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->Pic1->Visible) { // Pic1 ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->Pic1) == "") { ?>
		<th data-name="Pic1" class="<?php echo $_view_patient_services_dashboard_list->Pic1->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_Pic1" class="_view_patient_services_dashboard_Pic1"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->Pic1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pic1" class="<?php echo $_view_patient_services_dashboard_list->Pic1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->Pic1) ?>', 1);"><div id="elh__view_patient_services_dashboard_Pic1" class="_view_patient_services_dashboard_Pic1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->Pic1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->Pic1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->Pic1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->Pic2->Visible) { // Pic2 ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->Pic2) == "") { ?>
		<th data-name="Pic2" class="<?php echo $_view_patient_services_dashboard_list->Pic2->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_Pic2" class="_view_patient_services_dashboard_Pic2"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->Pic2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pic2" class="<?php echo $_view_patient_services_dashboard_list->Pic2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->Pic2) ?>', 1);"><div id="elh__view_patient_services_dashboard_Pic2" class="_view_patient_services_dashboard_Pic2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->Pic2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->Pic2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->Pic2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->GraphPath->Visible) { // GraphPath ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->GraphPath) == "") { ?>
		<th data-name="GraphPath" class="<?php echo $_view_patient_services_dashboard_list->GraphPath->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_GraphPath" class="_view_patient_services_dashboard_GraphPath"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->GraphPath->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GraphPath" class="<?php echo $_view_patient_services_dashboard_list->GraphPath->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->GraphPath) ?>', 1);"><div id="elh__view_patient_services_dashboard_GraphPath" class="_view_patient_services_dashboard_GraphPath">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->GraphPath->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->GraphPath->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->GraphPath->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->MachineCD->Visible) { // MachineCD ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->MachineCD) == "") { ?>
		<th data-name="MachineCD" class="<?php echo $_view_patient_services_dashboard_list->MachineCD->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_MachineCD" class="_view_patient_services_dashboard_MachineCD"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->MachineCD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MachineCD" class="<?php echo $_view_patient_services_dashboard_list->MachineCD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->MachineCD) ?>', 1);"><div id="elh__view_patient_services_dashboard_MachineCD" class="_view_patient_services_dashboard_MachineCD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->MachineCD->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->MachineCD->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->MachineCD->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->TestCancel->Visible) { // TestCancel ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->TestCancel) == "") { ?>
		<th data-name="TestCancel" class="<?php echo $_view_patient_services_dashboard_list->TestCancel->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_TestCancel" class="_view_patient_services_dashboard_TestCancel"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->TestCancel->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestCancel" class="<?php echo $_view_patient_services_dashboard_list->TestCancel->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->TestCancel) ?>', 1);"><div id="elh__view_patient_services_dashboard_TestCancel" class="_view_patient_services_dashboard_TestCancel">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->TestCancel->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->TestCancel->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->TestCancel->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->OutSource->Visible) { // OutSource ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->OutSource) == "") { ?>
		<th data-name="OutSource" class="<?php echo $_view_patient_services_dashboard_list->OutSource->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_OutSource" class="_view_patient_services_dashboard_OutSource"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->OutSource->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OutSource" class="<?php echo $_view_patient_services_dashboard_list->OutSource->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->OutSource) ?>', 1);"><div id="elh__view_patient_services_dashboard_OutSource" class="_view_patient_services_dashboard_OutSource">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->OutSource->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->OutSource->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->OutSource->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->Printed->Visible) { // Printed ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->Printed) == "") { ?>
		<th data-name="Printed" class="<?php echo $_view_patient_services_dashboard_list->Printed->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_Printed" class="_view_patient_services_dashboard_Printed"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->Printed->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Printed" class="<?php echo $_view_patient_services_dashboard_list->Printed->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->Printed) ?>', 1);"><div id="elh__view_patient_services_dashboard_Printed" class="_view_patient_services_dashboard_Printed">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->Printed->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->Printed->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->Printed->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->PrintBy->Visible) { // PrintBy ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->PrintBy) == "") { ?>
		<th data-name="PrintBy" class="<?php echo $_view_patient_services_dashboard_list->PrintBy->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_PrintBy" class="_view_patient_services_dashboard_PrintBy"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->PrintBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrintBy" class="<?php echo $_view_patient_services_dashboard_list->PrintBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->PrintBy) ?>', 1);"><div id="elh__view_patient_services_dashboard_PrintBy" class="_view_patient_services_dashboard_PrintBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->PrintBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->PrintBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->PrintBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->PrintDate->Visible) { // PrintDate ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->PrintDate) == "") { ?>
		<th data-name="PrintDate" class="<?php echo $_view_patient_services_dashboard_list->PrintDate->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_PrintDate" class="_view_patient_services_dashboard_PrintDate"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->PrintDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrintDate" class="<?php echo $_view_patient_services_dashboard_list->PrintDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->PrintDate) ?>', 1);"><div id="elh__view_patient_services_dashboard_PrintDate" class="_view_patient_services_dashboard_PrintDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->PrintDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->PrintDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->PrintDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->BillingDate->Visible) { // BillingDate ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->BillingDate) == "") { ?>
		<th data-name="BillingDate" class="<?php echo $_view_patient_services_dashboard_list->BillingDate->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_BillingDate" class="_view_patient_services_dashboard_BillingDate"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->BillingDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillingDate" class="<?php echo $_view_patient_services_dashboard_list->BillingDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->BillingDate) ?>', 1);"><div id="elh__view_patient_services_dashboard_BillingDate" class="_view_patient_services_dashboard_BillingDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->BillingDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->BillingDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->BillingDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->BilledBy->Visible) { // BilledBy ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->BilledBy) == "") { ?>
		<th data-name="BilledBy" class="<?php echo $_view_patient_services_dashboard_list->BilledBy->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_BilledBy" class="_view_patient_services_dashboard_BilledBy"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->BilledBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BilledBy" class="<?php echo $_view_patient_services_dashboard_list->BilledBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->BilledBy) ?>', 1);"><div id="elh__view_patient_services_dashboard_BilledBy" class="_view_patient_services_dashboard_BilledBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->BilledBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->BilledBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->BilledBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->Resulted->Visible) { // Resulted ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->Resulted) == "") { ?>
		<th data-name="Resulted" class="<?php echo $_view_patient_services_dashboard_list->Resulted->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_Resulted" class="_view_patient_services_dashboard_Resulted"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->Resulted->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Resulted" class="<?php echo $_view_patient_services_dashboard_list->Resulted->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->Resulted) ?>', 1);"><div id="elh__view_patient_services_dashboard_Resulted" class="_view_patient_services_dashboard_Resulted">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->Resulted->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->Resulted->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->Resulted->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->ResultDate->Visible) { // ResultDate ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->ResultDate) == "") { ?>
		<th data-name="ResultDate" class="<?php echo $_view_patient_services_dashboard_list->ResultDate->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_ResultDate" class="_view_patient_services_dashboard_ResultDate"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->ResultDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ResultDate" class="<?php echo $_view_patient_services_dashboard_list->ResultDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->ResultDate) ?>', 1);"><div id="elh__view_patient_services_dashboard_ResultDate" class="_view_patient_services_dashboard_ResultDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->ResultDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->ResultDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->ResultDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->ResultedBy->Visible) { // ResultedBy ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->ResultedBy) == "") { ?>
		<th data-name="ResultedBy" class="<?php echo $_view_patient_services_dashboard_list->ResultedBy->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_ResultedBy" class="_view_patient_services_dashboard_ResultedBy"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->ResultedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ResultedBy" class="<?php echo $_view_patient_services_dashboard_list->ResultedBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->ResultedBy) ?>', 1);"><div id="elh__view_patient_services_dashboard_ResultedBy" class="_view_patient_services_dashboard_ResultedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->ResultedBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->ResultedBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->ResultedBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->SampleDate->Visible) { // SampleDate ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->SampleDate) == "") { ?>
		<th data-name="SampleDate" class="<?php echo $_view_patient_services_dashboard_list->SampleDate->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_SampleDate" class="_view_patient_services_dashboard_SampleDate"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->SampleDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SampleDate" class="<?php echo $_view_patient_services_dashboard_list->SampleDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->SampleDate) ?>', 1);"><div id="elh__view_patient_services_dashboard_SampleDate" class="_view_patient_services_dashboard_SampleDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->SampleDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->SampleDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->SampleDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->SampleUser->Visible) { // SampleUser ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->SampleUser) == "") { ?>
		<th data-name="SampleUser" class="<?php echo $_view_patient_services_dashboard_list->SampleUser->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_SampleUser" class="_view_patient_services_dashboard_SampleUser"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->SampleUser->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SampleUser" class="<?php echo $_view_patient_services_dashboard_list->SampleUser->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->SampleUser) ?>', 1);"><div id="elh__view_patient_services_dashboard_SampleUser" class="_view_patient_services_dashboard_SampleUser">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->SampleUser->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->SampleUser->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->SampleUser->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->Sampled->Visible) { // Sampled ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->Sampled) == "") { ?>
		<th data-name="Sampled" class="<?php echo $_view_patient_services_dashboard_list->Sampled->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_Sampled" class="_view_patient_services_dashboard_Sampled"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->Sampled->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Sampled" class="<?php echo $_view_patient_services_dashboard_list->Sampled->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->Sampled) ?>', 1);"><div id="elh__view_patient_services_dashboard_Sampled" class="_view_patient_services_dashboard_Sampled">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->Sampled->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->Sampled->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->Sampled->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->ReceivedDate->Visible) { // ReceivedDate ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->ReceivedDate) == "") { ?>
		<th data-name="ReceivedDate" class="<?php echo $_view_patient_services_dashboard_list->ReceivedDate->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_ReceivedDate" class="_view_patient_services_dashboard_ReceivedDate"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->ReceivedDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReceivedDate" class="<?php echo $_view_patient_services_dashboard_list->ReceivedDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->ReceivedDate) ?>', 1);"><div id="elh__view_patient_services_dashboard_ReceivedDate" class="_view_patient_services_dashboard_ReceivedDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->ReceivedDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->ReceivedDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->ReceivedDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->ReceivedUser->Visible) { // ReceivedUser ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->ReceivedUser) == "") { ?>
		<th data-name="ReceivedUser" class="<?php echo $_view_patient_services_dashboard_list->ReceivedUser->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_ReceivedUser" class="_view_patient_services_dashboard_ReceivedUser"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->ReceivedUser->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReceivedUser" class="<?php echo $_view_patient_services_dashboard_list->ReceivedUser->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->ReceivedUser) ?>', 1);"><div id="elh__view_patient_services_dashboard_ReceivedUser" class="_view_patient_services_dashboard_ReceivedUser">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->ReceivedUser->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->ReceivedUser->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->ReceivedUser->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->Recevied->Visible) { // Recevied ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->Recevied) == "") { ?>
		<th data-name="Recevied" class="<?php echo $_view_patient_services_dashboard_list->Recevied->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_Recevied" class="_view_patient_services_dashboard_Recevied"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->Recevied->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Recevied" class="<?php echo $_view_patient_services_dashboard_list->Recevied->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->Recevied) ?>', 1);"><div id="elh__view_patient_services_dashboard_Recevied" class="_view_patient_services_dashboard_Recevied">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->Recevied->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->Recevied->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->Recevied->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->DeptRecvDate->Visible) { // DeptRecvDate ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->DeptRecvDate) == "") { ?>
		<th data-name="DeptRecvDate" class="<?php echo $_view_patient_services_dashboard_list->DeptRecvDate->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_DeptRecvDate" class="_view_patient_services_dashboard_DeptRecvDate"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->DeptRecvDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DeptRecvDate" class="<?php echo $_view_patient_services_dashboard_list->DeptRecvDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->DeptRecvDate) ?>', 1);"><div id="elh__view_patient_services_dashboard_DeptRecvDate" class="_view_patient_services_dashboard_DeptRecvDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->DeptRecvDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->DeptRecvDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->DeptRecvDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->DeptRecvUser->Visible) { // DeptRecvUser ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->DeptRecvUser) == "") { ?>
		<th data-name="DeptRecvUser" class="<?php echo $_view_patient_services_dashboard_list->DeptRecvUser->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_DeptRecvUser" class="_view_patient_services_dashboard_DeptRecvUser"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->DeptRecvUser->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DeptRecvUser" class="<?php echo $_view_patient_services_dashboard_list->DeptRecvUser->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->DeptRecvUser) ?>', 1);"><div id="elh__view_patient_services_dashboard_DeptRecvUser" class="_view_patient_services_dashboard_DeptRecvUser">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->DeptRecvUser->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->DeptRecvUser->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->DeptRecvUser->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->DeptRecived->Visible) { // DeptRecived ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->DeptRecived) == "") { ?>
		<th data-name="DeptRecived" class="<?php echo $_view_patient_services_dashboard_list->DeptRecived->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_DeptRecived" class="_view_patient_services_dashboard_DeptRecived"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->DeptRecived->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DeptRecived" class="<?php echo $_view_patient_services_dashboard_list->DeptRecived->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->DeptRecived) ?>', 1);"><div id="elh__view_patient_services_dashboard_DeptRecived" class="_view_patient_services_dashboard_DeptRecived">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->DeptRecived->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->DeptRecived->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->DeptRecived->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->SAuthDate->Visible) { // SAuthDate ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->SAuthDate) == "") { ?>
		<th data-name="SAuthDate" class="<?php echo $_view_patient_services_dashboard_list->SAuthDate->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_SAuthDate" class="_view_patient_services_dashboard_SAuthDate"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->SAuthDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SAuthDate" class="<?php echo $_view_patient_services_dashboard_list->SAuthDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->SAuthDate) ?>', 1);"><div id="elh__view_patient_services_dashboard_SAuthDate" class="_view_patient_services_dashboard_SAuthDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->SAuthDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->SAuthDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->SAuthDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->SAuthBy->Visible) { // SAuthBy ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->SAuthBy) == "") { ?>
		<th data-name="SAuthBy" class="<?php echo $_view_patient_services_dashboard_list->SAuthBy->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_SAuthBy" class="_view_patient_services_dashboard_SAuthBy"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->SAuthBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SAuthBy" class="<?php echo $_view_patient_services_dashboard_list->SAuthBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->SAuthBy) ?>', 1);"><div id="elh__view_patient_services_dashboard_SAuthBy" class="_view_patient_services_dashboard_SAuthBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->SAuthBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->SAuthBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->SAuthBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->SAuthendicate->Visible) { // SAuthendicate ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->SAuthendicate) == "") { ?>
		<th data-name="SAuthendicate" class="<?php echo $_view_patient_services_dashboard_list->SAuthendicate->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_SAuthendicate" class="_view_patient_services_dashboard_SAuthendicate"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->SAuthendicate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SAuthendicate" class="<?php echo $_view_patient_services_dashboard_list->SAuthendicate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->SAuthendicate) ?>', 1);"><div id="elh__view_patient_services_dashboard_SAuthendicate" class="_view_patient_services_dashboard_SAuthendicate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->SAuthendicate->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->SAuthendicate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->SAuthendicate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->AuthDate->Visible) { // AuthDate ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->AuthDate) == "") { ?>
		<th data-name="AuthDate" class="<?php echo $_view_patient_services_dashboard_list->AuthDate->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_AuthDate" class="_view_patient_services_dashboard_AuthDate"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->AuthDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AuthDate" class="<?php echo $_view_patient_services_dashboard_list->AuthDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->AuthDate) ?>', 1);"><div id="elh__view_patient_services_dashboard_AuthDate" class="_view_patient_services_dashboard_AuthDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->AuthDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->AuthDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->AuthDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->AuthBy->Visible) { // AuthBy ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->AuthBy) == "") { ?>
		<th data-name="AuthBy" class="<?php echo $_view_patient_services_dashboard_list->AuthBy->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_AuthBy" class="_view_patient_services_dashboard_AuthBy"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->AuthBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AuthBy" class="<?php echo $_view_patient_services_dashboard_list->AuthBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->AuthBy) ?>', 1);"><div id="elh__view_patient_services_dashboard_AuthBy" class="_view_patient_services_dashboard_AuthBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->AuthBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->AuthBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->AuthBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->Authencate->Visible) { // Authencate ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->Authencate) == "") { ?>
		<th data-name="Authencate" class="<?php echo $_view_patient_services_dashboard_list->Authencate->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_Authencate" class="_view_patient_services_dashboard_Authencate"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->Authencate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Authencate" class="<?php echo $_view_patient_services_dashboard_list->Authencate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->Authencate) ?>', 1);"><div id="elh__view_patient_services_dashboard_Authencate" class="_view_patient_services_dashboard_Authencate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->Authencate->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->Authencate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->Authencate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->EditDate->Visible) { // EditDate ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->EditDate) == "") { ?>
		<th data-name="EditDate" class="<?php echo $_view_patient_services_dashboard_list->EditDate->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_EditDate" class="_view_patient_services_dashboard_EditDate"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->EditDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EditDate" class="<?php echo $_view_patient_services_dashboard_list->EditDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->EditDate) ?>', 1);"><div id="elh__view_patient_services_dashboard_EditDate" class="_view_patient_services_dashboard_EditDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->EditDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->EditDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->EditDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->EditBy->Visible) { // EditBy ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->EditBy) == "") { ?>
		<th data-name="EditBy" class="<?php echo $_view_patient_services_dashboard_list->EditBy->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_EditBy" class="_view_patient_services_dashboard_EditBy"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->EditBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EditBy" class="<?php echo $_view_patient_services_dashboard_list->EditBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->EditBy) ?>', 1);"><div id="elh__view_patient_services_dashboard_EditBy" class="_view_patient_services_dashboard_EditBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->EditBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->EditBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->EditBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->Editted->Visible) { // Editted ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->Editted) == "") { ?>
		<th data-name="Editted" class="<?php echo $_view_patient_services_dashboard_list->Editted->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_Editted" class="_view_patient_services_dashboard_Editted"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->Editted->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Editted" class="<?php echo $_view_patient_services_dashboard_list->Editted->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->Editted) ?>', 1);"><div id="elh__view_patient_services_dashboard_Editted" class="_view_patient_services_dashboard_Editted">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->Editted->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->Editted->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->Editted->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->PatientId->Visible) { // PatientId ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $_view_patient_services_dashboard_list->PatientId->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_PatientId" class="_view_patient_services_dashboard_PatientId"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $_view_patient_services_dashboard_list->PatientId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->PatientId) ?>', 1);"><div id="elh__view_patient_services_dashboard_PatientId" class="_view_patient_services_dashboard_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->PatientId->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->PatientId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->PatientId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->Mobile->Visible) { // Mobile ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->Mobile) == "") { ?>
		<th data-name="Mobile" class="<?php echo $_view_patient_services_dashboard_list->Mobile->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_Mobile" class="_view_patient_services_dashboard_Mobile"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->Mobile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mobile" class="<?php echo $_view_patient_services_dashboard_list->Mobile->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->Mobile) ?>', 1);"><div id="elh__view_patient_services_dashboard_Mobile" class="_view_patient_services_dashboard_Mobile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->Mobile->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->Mobile->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->Mobile->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->CId->Visible) { // CId ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->CId) == "") { ?>
		<th data-name="CId" class="<?php echo $_view_patient_services_dashboard_list->CId->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_CId" class="_view_patient_services_dashboard_CId"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->CId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CId" class="<?php echo $_view_patient_services_dashboard_list->CId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->CId) ?>', 1);"><div id="elh__view_patient_services_dashboard_CId" class="_view_patient_services_dashboard_CId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->CId->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->CId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->CId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->Order->Visible) { // Order ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->Order) == "") { ?>
		<th data-name="Order" class="<?php echo $_view_patient_services_dashboard_list->Order->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_Order" class="_view_patient_services_dashboard_Order"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->Order->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Order" class="<?php echo $_view_patient_services_dashboard_list->Order->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->Order) ?>', 1);"><div id="elh__view_patient_services_dashboard_Order" class="_view_patient_services_dashboard_Order">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->Order->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->Order->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->Order->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->ResType->Visible) { // ResType ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->ResType) == "") { ?>
		<th data-name="ResType" class="<?php echo $_view_patient_services_dashboard_list->ResType->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_ResType" class="_view_patient_services_dashboard_ResType"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->ResType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ResType" class="<?php echo $_view_patient_services_dashboard_list->ResType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->ResType) ?>', 1);"><div id="elh__view_patient_services_dashboard_ResType" class="_view_patient_services_dashboard_ResType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->ResType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->ResType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->ResType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->Sample->Visible) { // Sample ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->Sample) == "") { ?>
		<th data-name="Sample" class="<?php echo $_view_patient_services_dashboard_list->Sample->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_Sample" class="_view_patient_services_dashboard_Sample"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->Sample->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Sample" class="<?php echo $_view_patient_services_dashboard_list->Sample->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->Sample) ?>', 1);"><div id="elh__view_patient_services_dashboard_Sample" class="_view_patient_services_dashboard_Sample">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->Sample->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->Sample->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->Sample->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->NoD->Visible) { // NoD ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->NoD) == "") { ?>
		<th data-name="NoD" class="<?php echo $_view_patient_services_dashboard_list->NoD->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_NoD" class="_view_patient_services_dashboard_NoD"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->NoD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoD" class="<?php echo $_view_patient_services_dashboard_list->NoD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->NoD) ?>', 1);"><div id="elh__view_patient_services_dashboard_NoD" class="_view_patient_services_dashboard_NoD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->NoD->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->NoD->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->NoD->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->BillOrder->Visible) { // BillOrder ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->BillOrder) == "") { ?>
		<th data-name="BillOrder" class="<?php echo $_view_patient_services_dashboard_list->BillOrder->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_BillOrder" class="_view_patient_services_dashboard_BillOrder"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->BillOrder->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillOrder" class="<?php echo $_view_patient_services_dashboard_list->BillOrder->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->BillOrder) ?>', 1);"><div id="elh__view_patient_services_dashboard_BillOrder" class="_view_patient_services_dashboard_BillOrder">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->BillOrder->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->BillOrder->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->BillOrder->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->Inactive->Visible) { // Inactive ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->Inactive) == "") { ?>
		<th data-name="Inactive" class="<?php echo $_view_patient_services_dashboard_list->Inactive->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_Inactive" class="_view_patient_services_dashboard_Inactive"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->Inactive->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Inactive" class="<?php echo $_view_patient_services_dashboard_list->Inactive->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->Inactive) ?>', 1);"><div id="elh__view_patient_services_dashboard_Inactive" class="_view_patient_services_dashboard_Inactive">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->Inactive->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->Inactive->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->Inactive->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->CollSample->Visible) { // CollSample ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->CollSample) == "") { ?>
		<th data-name="CollSample" class="<?php echo $_view_patient_services_dashboard_list->CollSample->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_CollSample" class="_view_patient_services_dashboard_CollSample"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->CollSample->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CollSample" class="<?php echo $_view_patient_services_dashboard_list->CollSample->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->CollSample) ?>', 1);"><div id="elh__view_patient_services_dashboard_CollSample" class="_view_patient_services_dashboard_CollSample">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->CollSample->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->CollSample->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->CollSample->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->TestType->Visible) { // TestType ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->TestType) == "") { ?>
		<th data-name="TestType" class="<?php echo $_view_patient_services_dashboard_list->TestType->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_TestType" class="_view_patient_services_dashboard_TestType"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->TestType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestType" class="<?php echo $_view_patient_services_dashboard_list->TestType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->TestType) ?>', 1);"><div id="elh__view_patient_services_dashboard_TestType" class="_view_patient_services_dashboard_TestType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->TestType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->TestType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->TestType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->Repeated->Visible) { // Repeated ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->Repeated) == "") { ?>
		<th data-name="Repeated" class="<?php echo $_view_patient_services_dashboard_list->Repeated->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_Repeated" class="_view_patient_services_dashboard_Repeated"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->Repeated->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Repeated" class="<?php echo $_view_patient_services_dashboard_list->Repeated->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->Repeated) ?>', 1);"><div id="elh__view_patient_services_dashboard_Repeated" class="_view_patient_services_dashboard_Repeated">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->Repeated->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->Repeated->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->Repeated->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->RepeatedBy->Visible) { // RepeatedBy ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->RepeatedBy) == "") { ?>
		<th data-name="RepeatedBy" class="<?php echo $_view_patient_services_dashboard_list->RepeatedBy->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_RepeatedBy" class="_view_patient_services_dashboard_RepeatedBy"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->RepeatedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RepeatedBy" class="<?php echo $_view_patient_services_dashboard_list->RepeatedBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->RepeatedBy) ?>', 1);"><div id="elh__view_patient_services_dashboard_RepeatedBy" class="_view_patient_services_dashboard_RepeatedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->RepeatedBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->RepeatedBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->RepeatedBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->RepeatedDate->Visible) { // RepeatedDate ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->RepeatedDate) == "") { ?>
		<th data-name="RepeatedDate" class="<?php echo $_view_patient_services_dashboard_list->RepeatedDate->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_RepeatedDate" class="_view_patient_services_dashboard_RepeatedDate"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->RepeatedDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RepeatedDate" class="<?php echo $_view_patient_services_dashboard_list->RepeatedDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->RepeatedDate) ?>', 1);"><div id="elh__view_patient_services_dashboard_RepeatedDate" class="_view_patient_services_dashboard_RepeatedDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->RepeatedDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->RepeatedDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->RepeatedDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->serviceID->Visible) { // serviceID ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->serviceID) == "") { ?>
		<th data-name="serviceID" class="<?php echo $_view_patient_services_dashboard_list->serviceID->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_serviceID" class="_view_patient_services_dashboard_serviceID"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->serviceID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="serviceID" class="<?php echo $_view_patient_services_dashboard_list->serviceID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->serviceID) ?>', 1);"><div id="elh__view_patient_services_dashboard_serviceID" class="_view_patient_services_dashboard_serviceID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->serviceID->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->serviceID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->serviceID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->Service_Type->Visible) { // Service_Type ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->Service_Type) == "") { ?>
		<th data-name="Service_Type" class="<?php echo $_view_patient_services_dashboard_list->Service_Type->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_Service_Type" class="_view_patient_services_dashboard_Service_Type"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->Service_Type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Service_Type" class="<?php echo $_view_patient_services_dashboard_list->Service_Type->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->Service_Type) ?>', 1);"><div id="elh__view_patient_services_dashboard_Service_Type" class="_view_patient_services_dashboard_Service_Type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->Service_Type->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->Service_Type->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->Service_Type->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->Service_Department->Visible) { // Service_Department ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->Service_Department) == "") { ?>
		<th data-name="Service_Department" class="<?php echo $_view_patient_services_dashboard_list->Service_Department->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_Service_Department" class="_view_patient_services_dashboard_Service_Department"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->Service_Department->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Service_Department" class="<?php echo $_view_patient_services_dashboard_list->Service_Department->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->Service_Department) ?>', 1);"><div id="elh__view_patient_services_dashboard_Service_Department" class="_view_patient_services_dashboard_Service_Department">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->Service_Department->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->Service_Department->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->Service_Department->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->createdDate->Visible) { // createdDate ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->createdDate) == "") { ?>
		<th data-name="createdDate" class="<?php echo $_view_patient_services_dashboard_list->createdDate->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_createdDate" class="_view_patient_services_dashboard_createdDate"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->createdDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdDate" class="<?php echo $_view_patient_services_dashboard_list->createdDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->createdDate) ?>', 1);"><div id="elh__view_patient_services_dashboard_createdDate" class="_view_patient_services_dashboard_createdDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->createdDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->createdDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->createdDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->RequestNo->Visible) { // RequestNo ?>
	<?php if ($_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->RequestNo) == "") { ?>
		<th data-name="RequestNo" class="<?php echo $_view_patient_services_dashboard_list->RequestNo->headerCellClass() ?>"><div id="elh__view_patient_services_dashboard_RequestNo" class="_view_patient_services_dashboard_RequestNo"><div class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->RequestNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RequestNo" class="<?php echo $_view_patient_services_dashboard_list->RequestNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_view_patient_services_dashboard_list->SortUrl($_view_patient_services_dashboard_list->RequestNo) ?>', 1);"><div id="elh__view_patient_services_dashboard_RequestNo" class="_view_patient_services_dashboard_RequestNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_view_patient_services_dashboard_list->RequestNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($_view_patient_services_dashboard_list->RequestNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_view_patient_services_dashboard_list->RequestNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$_view_patient_services_dashboard_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($_view_patient_services_dashboard_list->ExportAll && $_view_patient_services_dashboard_list->isExport()) {
	$_view_patient_services_dashboard_list->StopRecord = $_view_patient_services_dashboard_list->TotalRecords;
} else {

	// Set the last record to display
	if ($_view_patient_services_dashboard_list->TotalRecords > $_view_patient_services_dashboard_list->StartRecord + $_view_patient_services_dashboard_list->DisplayRecords - 1)
		$_view_patient_services_dashboard_list->StopRecord = $_view_patient_services_dashboard_list->StartRecord + $_view_patient_services_dashboard_list->DisplayRecords - 1;
	else
		$_view_patient_services_dashboard_list->StopRecord = $_view_patient_services_dashboard_list->TotalRecords;
}
$_view_patient_services_dashboard_list->RecordCount = $_view_patient_services_dashboard_list->StartRecord - 1;
if ($_view_patient_services_dashboard_list->Recordset && !$_view_patient_services_dashboard_list->Recordset->EOF) {
	$_view_patient_services_dashboard_list->Recordset->moveFirst();
	$selectLimit = $_view_patient_services_dashboard_list->UseSelectLimit;
	if (!$selectLimit && $_view_patient_services_dashboard_list->StartRecord > 1)
		$_view_patient_services_dashboard_list->Recordset->move($_view_patient_services_dashboard_list->StartRecord - 1);
} elseif (!$_view_patient_services_dashboard->AllowAddDeleteRow && $_view_patient_services_dashboard_list->StopRecord == 0) {
	$_view_patient_services_dashboard_list->StopRecord = $_view_patient_services_dashboard->GridAddRowCount;
}

// Initialize aggregate
$_view_patient_services_dashboard->RowType = ROWTYPE_AGGREGATEINIT;
$_view_patient_services_dashboard->resetAttributes();
$_view_patient_services_dashboard_list->renderRow();
while ($_view_patient_services_dashboard_list->RecordCount < $_view_patient_services_dashboard_list->StopRecord) {
	$_view_patient_services_dashboard_list->RecordCount++;
	if ($_view_patient_services_dashboard_list->RecordCount >= $_view_patient_services_dashboard_list->StartRecord) {
		$_view_patient_services_dashboard_list->RowCount++;

		// Set up key count
		$_view_patient_services_dashboard_list->KeyCount = $_view_patient_services_dashboard_list->RowIndex;

		// Init row class and style
		$_view_patient_services_dashboard->resetAttributes();
		$_view_patient_services_dashboard->CssClass = "";
		if ($_view_patient_services_dashboard_list->isGridAdd()) {
		} else {
			$_view_patient_services_dashboard_list->loadRowValues($_view_patient_services_dashboard_list->Recordset); // Load row values
		}
		$_view_patient_services_dashboard->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$_view_patient_services_dashboard->RowAttrs->merge(["data-rowindex" => $_view_patient_services_dashboard_list->RowCount, "id" => "r" . $_view_patient_services_dashboard_list->RowCount . "__view_patient_services_dashboard", "data-rowtype" => $_view_patient_services_dashboard->RowType]);

		// Render row
		$_view_patient_services_dashboard_list->renderRow();

		// Render list options
		$_view_patient_services_dashboard_list->renderListOptions();
?>
	<tr <?php echo $_view_patient_services_dashboard->rowAttributes() ?>>
<?php

// Render list options (body, left)
$_view_patient_services_dashboard_list->ListOptions->render("body", "left", $_view_patient_services_dashboard_list->RowCount);
?>
	<?php if ($_view_patient_services_dashboard_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $_view_patient_services_dashboard_list->id->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_id">
<span<?php echo $_view_patient_services_dashboard_list->id->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->Reception->Visible) { // Reception ?>
		<td data-name="Reception" <?php echo $_view_patient_services_dashboard_list->Reception->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_Reception">
<span<?php echo $_view_patient_services_dashboard_list->Reception->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->Reception->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->PatID->Visible) { // PatID ?>
		<td data-name="PatID" <?php echo $_view_patient_services_dashboard_list->PatID->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_PatID">
<span<?php echo $_view_patient_services_dashboard_list->PatID->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->PatID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno" <?php echo $_view_patient_services_dashboard_list->mrnno->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_mrnno">
<span<?php echo $_view_patient_services_dashboard_list->mrnno->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->mrnno->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName" <?php echo $_view_patient_services_dashboard_list->PatientName->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_PatientName">
<span<?php echo $_view_patient_services_dashboard_list->PatientName->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->Age->Visible) { // Age ?>
		<td data-name="Age" <?php echo $_view_patient_services_dashboard_list->Age->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_Age">
<span<?php echo $_view_patient_services_dashboard_list->Age->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->Age->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->Gender->Visible) { // Gender ?>
		<td data-name="Gender" <?php echo $_view_patient_services_dashboard_list->Gender->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_Gender">
<span<?php echo $_view_patient_services_dashboard_list->Gender->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->Gender->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->Services->Visible) { // Services ?>
		<td data-name="Services" <?php echo $_view_patient_services_dashboard_list->Services->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_Services">
<span<?php echo $_view_patient_services_dashboard_list->Services->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->Services->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->Unit->Visible) { // Unit ?>
		<td data-name="Unit" <?php echo $_view_patient_services_dashboard_list->Unit->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_Unit">
<span<?php echo $_view_patient_services_dashboard_list->Unit->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->Unit->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->amount->Visible) { // amount ?>
		<td data-name="amount" <?php echo $_view_patient_services_dashboard_list->amount->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_amount">
<span<?php echo $_view_patient_services_dashboard_list->amount->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->amount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity" <?php echo $_view_patient_services_dashboard_list->Quantity->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_Quantity">
<span<?php echo $_view_patient_services_dashboard_list->Quantity->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->Quantity->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->Discount->Visible) { // Discount ?>
		<td data-name="Discount" <?php echo $_view_patient_services_dashboard_list->Discount->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_Discount">
<span<?php echo $_view_patient_services_dashboard_list->Discount->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->Discount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->SubTotal->Visible) { // SubTotal ?>
		<td data-name="SubTotal" <?php echo $_view_patient_services_dashboard_list->SubTotal->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_SubTotal">
<span<?php echo $_view_patient_services_dashboard_list->SubTotal->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->SubTotal->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->patient_type->Visible) { // patient_type ?>
		<td data-name="patient_type" <?php echo $_view_patient_services_dashboard_list->patient_type->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_patient_type">
<span<?php echo $_view_patient_services_dashboard_list->patient_type->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->patient_type->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->charged_date->Visible) { // charged_date ?>
		<td data-name="charged_date" <?php echo $_view_patient_services_dashboard_list->charged_date->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_charged_date">
<span<?php echo $_view_patient_services_dashboard_list->charged_date->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->charged_date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->status->Visible) { // status ?>
		<td data-name="status" <?php echo $_view_patient_services_dashboard_list->status->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_status">
<span<?php echo $_view_patient_services_dashboard_list->status->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->createdby->Visible) { // createdby ?>
		<td data-name="createdby" <?php echo $_view_patient_services_dashboard_list->createdby->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_createdby">
<span<?php echo $_view_patient_services_dashboard_list->createdby->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" <?php echo $_view_patient_services_dashboard_list->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_createddatetime">
<span<?php echo $_view_patient_services_dashboard_list->createddatetime->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby" <?php echo $_view_patient_services_dashboard_list->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_modifiedby">
<span<?php echo $_view_patient_services_dashboard_list->modifiedby->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime" <?php echo $_view_patient_services_dashboard_list->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_modifieddatetime">
<span<?php echo $_view_patient_services_dashboard_list->modifieddatetime->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->Aid->Visible) { // Aid ?>
		<td data-name="Aid" <?php echo $_view_patient_services_dashboard_list->Aid->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_Aid">
<span<?php echo $_view_patient_services_dashboard_list->Aid->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->Aid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->Vid->Visible) { // Vid ?>
		<td data-name="Vid" <?php echo $_view_patient_services_dashboard_list->Vid->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_Vid">
<span<?php echo $_view_patient_services_dashboard_list->Vid->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->Vid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->DrID->Visible) { // DrID ?>
		<td data-name="DrID" <?php echo $_view_patient_services_dashboard_list->DrID->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_DrID">
<span<?php echo $_view_patient_services_dashboard_list->DrID->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->DrID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->DrCODE->Visible) { // DrCODE ?>
		<td data-name="DrCODE" <?php echo $_view_patient_services_dashboard_list->DrCODE->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_DrCODE">
<span<?php echo $_view_patient_services_dashboard_list->DrCODE->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->DrCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->DrName->Visible) { // DrName ?>
		<td data-name="DrName" <?php echo $_view_patient_services_dashboard_list->DrName->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_DrName">
<span<?php echo $_view_patient_services_dashboard_list->DrName->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->DrName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->Department->Visible) { // Department ?>
		<td data-name="Department" <?php echo $_view_patient_services_dashboard_list->Department->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_Department">
<span<?php echo $_view_patient_services_dashboard_list->Department->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->Department->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->DrSharePres->Visible) { // DrSharePres ?>
		<td data-name="DrSharePres" <?php echo $_view_patient_services_dashboard_list->DrSharePres->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_DrSharePres">
<span<?php echo $_view_patient_services_dashboard_list->DrSharePres->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->DrSharePres->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->HospSharePres->Visible) { // HospSharePres ?>
		<td data-name="HospSharePres" <?php echo $_view_patient_services_dashboard_list->HospSharePres->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_HospSharePres">
<span<?php echo $_view_patient_services_dashboard_list->HospSharePres->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->HospSharePres->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->DrShareAmount->Visible) { // DrShareAmount ?>
		<td data-name="DrShareAmount" <?php echo $_view_patient_services_dashboard_list->DrShareAmount->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_DrShareAmount">
<span<?php echo $_view_patient_services_dashboard_list->DrShareAmount->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->DrShareAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->HospShareAmount->Visible) { // HospShareAmount ?>
		<td data-name="HospShareAmount" <?php echo $_view_patient_services_dashboard_list->HospShareAmount->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_HospShareAmount">
<span<?php echo $_view_patient_services_dashboard_list->HospShareAmount->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->HospShareAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->DrShareSettiledAmount->Visible) { // DrShareSettiledAmount ?>
		<td data-name="DrShareSettiledAmount" <?php echo $_view_patient_services_dashboard_list->DrShareSettiledAmount->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_DrShareSettiledAmount">
<span<?php echo $_view_patient_services_dashboard_list->DrShareSettiledAmount->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->DrShareSettiledAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->DrShareSettledId->Visible) { // DrShareSettledId ?>
		<td data-name="DrShareSettledId" <?php echo $_view_patient_services_dashboard_list->DrShareSettledId->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_DrShareSettledId">
<span<?php echo $_view_patient_services_dashboard_list->DrShareSettledId->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->DrShareSettledId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->DrShareSettiledStatus->Visible) { // DrShareSettiledStatus ?>
		<td data-name="DrShareSettiledStatus" <?php echo $_view_patient_services_dashboard_list->DrShareSettiledStatus->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_DrShareSettiledStatus">
<span<?php echo $_view_patient_services_dashboard_list->DrShareSettiledStatus->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->DrShareSettiledStatus->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->invoiceId->Visible) { // invoiceId ?>
		<td data-name="invoiceId" <?php echo $_view_patient_services_dashboard_list->invoiceId->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_invoiceId">
<span<?php echo $_view_patient_services_dashboard_list->invoiceId->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->invoiceId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->invoiceAmount->Visible) { // invoiceAmount ?>
		<td data-name="invoiceAmount" <?php echo $_view_patient_services_dashboard_list->invoiceAmount->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_invoiceAmount">
<span<?php echo $_view_patient_services_dashboard_list->invoiceAmount->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->invoiceAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->invoiceStatus->Visible) { // invoiceStatus ?>
		<td data-name="invoiceStatus" <?php echo $_view_patient_services_dashboard_list->invoiceStatus->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_invoiceStatus">
<span<?php echo $_view_patient_services_dashboard_list->invoiceStatus->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->invoiceStatus->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->modeOfPayment->Visible) { // modeOfPayment ?>
		<td data-name="modeOfPayment" <?php echo $_view_patient_services_dashboard_list->modeOfPayment->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_modeOfPayment">
<span<?php echo $_view_patient_services_dashboard_list->modeOfPayment->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->modeOfPayment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $_view_patient_services_dashboard_list->HospID->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_HospID">
<span<?php echo $_view_patient_services_dashboard_list->HospID->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->RIDNO->Visible) { // RIDNO ?>
		<td data-name="RIDNO" <?php echo $_view_patient_services_dashboard_list->RIDNO->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_RIDNO">
<span<?php echo $_view_patient_services_dashboard_list->RIDNO->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->RIDNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo" <?php echo $_view_patient_services_dashboard_list->TidNo->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_TidNo">
<span<?php echo $_view_patient_services_dashboard_list->TidNo->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->TidNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->DiscountCategory->Visible) { // DiscountCategory ?>
		<td data-name="DiscountCategory" <?php echo $_view_patient_services_dashboard_list->DiscountCategory->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_DiscountCategory">
<span<?php echo $_view_patient_services_dashboard_list->DiscountCategory->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->DiscountCategory->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->sid->Visible) { // sid ?>
		<td data-name="sid" <?php echo $_view_patient_services_dashboard_list->sid->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_sid">
<span<?php echo $_view_patient_services_dashboard_list->sid->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->sid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->ItemCode->Visible) { // ItemCode ?>
		<td data-name="ItemCode" <?php echo $_view_patient_services_dashboard_list->ItemCode->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_ItemCode">
<span<?php echo $_view_patient_services_dashboard_list->ItemCode->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->ItemCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->TestSubCd->Visible) { // TestSubCd ?>
		<td data-name="TestSubCd" <?php echo $_view_patient_services_dashboard_list->TestSubCd->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_TestSubCd">
<span<?php echo $_view_patient_services_dashboard_list->TestSubCd->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->TestSubCd->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->DEptCd->Visible) { // DEptCd ?>
		<td data-name="DEptCd" <?php echo $_view_patient_services_dashboard_list->DEptCd->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_DEptCd">
<span<?php echo $_view_patient_services_dashboard_list->DEptCd->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->DEptCd->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->ProfCd->Visible) { // ProfCd ?>
		<td data-name="ProfCd" <?php echo $_view_patient_services_dashboard_list->ProfCd->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_ProfCd">
<span<?php echo $_view_patient_services_dashboard_list->ProfCd->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->ProfCd->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->Comments->Visible) { // Comments ?>
		<td data-name="Comments" <?php echo $_view_patient_services_dashboard_list->Comments->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_Comments">
<span<?php echo $_view_patient_services_dashboard_list->Comments->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->Comments->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->Method->Visible) { // Method ?>
		<td data-name="Method" <?php echo $_view_patient_services_dashboard_list->Method->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_Method">
<span<?php echo $_view_patient_services_dashboard_list->Method->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->Method->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->Specimen->Visible) { // Specimen ?>
		<td data-name="Specimen" <?php echo $_view_patient_services_dashboard_list->Specimen->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_Specimen">
<span<?php echo $_view_patient_services_dashboard_list->Specimen->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->Specimen->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->Abnormal->Visible) { // Abnormal ?>
		<td data-name="Abnormal" <?php echo $_view_patient_services_dashboard_list->Abnormal->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_Abnormal">
<span<?php echo $_view_patient_services_dashboard_list->Abnormal->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->Abnormal->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->TestUnit->Visible) { // TestUnit ?>
		<td data-name="TestUnit" <?php echo $_view_patient_services_dashboard_list->TestUnit->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_TestUnit">
<span<?php echo $_view_patient_services_dashboard_list->TestUnit->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->TestUnit->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->LOWHIGH->Visible) { // LOWHIGH ?>
		<td data-name="LOWHIGH" <?php echo $_view_patient_services_dashboard_list->LOWHIGH->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_LOWHIGH">
<span<?php echo $_view_patient_services_dashboard_list->LOWHIGH->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->LOWHIGH->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->Branch->Visible) { // Branch ?>
		<td data-name="Branch" <?php echo $_view_patient_services_dashboard_list->Branch->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_Branch">
<span<?php echo $_view_patient_services_dashboard_list->Branch->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->Branch->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->Dispatch->Visible) { // Dispatch ?>
		<td data-name="Dispatch" <?php echo $_view_patient_services_dashboard_list->Dispatch->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_Dispatch">
<span<?php echo $_view_patient_services_dashboard_list->Dispatch->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->Dispatch->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->Pic1->Visible) { // Pic1 ?>
		<td data-name="Pic1" <?php echo $_view_patient_services_dashboard_list->Pic1->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_Pic1">
<span<?php echo $_view_patient_services_dashboard_list->Pic1->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->Pic1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->Pic2->Visible) { // Pic2 ?>
		<td data-name="Pic2" <?php echo $_view_patient_services_dashboard_list->Pic2->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_Pic2">
<span<?php echo $_view_patient_services_dashboard_list->Pic2->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->Pic2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->GraphPath->Visible) { // GraphPath ?>
		<td data-name="GraphPath" <?php echo $_view_patient_services_dashboard_list->GraphPath->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_GraphPath">
<span<?php echo $_view_patient_services_dashboard_list->GraphPath->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->GraphPath->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->MachineCD->Visible) { // MachineCD ?>
		<td data-name="MachineCD" <?php echo $_view_patient_services_dashboard_list->MachineCD->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_MachineCD">
<span<?php echo $_view_patient_services_dashboard_list->MachineCD->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->MachineCD->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->TestCancel->Visible) { // TestCancel ?>
		<td data-name="TestCancel" <?php echo $_view_patient_services_dashboard_list->TestCancel->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_TestCancel">
<span<?php echo $_view_patient_services_dashboard_list->TestCancel->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->TestCancel->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->OutSource->Visible) { // OutSource ?>
		<td data-name="OutSource" <?php echo $_view_patient_services_dashboard_list->OutSource->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_OutSource">
<span<?php echo $_view_patient_services_dashboard_list->OutSource->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->OutSource->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->Printed->Visible) { // Printed ?>
		<td data-name="Printed" <?php echo $_view_patient_services_dashboard_list->Printed->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_Printed">
<span<?php echo $_view_patient_services_dashboard_list->Printed->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->Printed->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->PrintBy->Visible) { // PrintBy ?>
		<td data-name="PrintBy" <?php echo $_view_patient_services_dashboard_list->PrintBy->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_PrintBy">
<span<?php echo $_view_patient_services_dashboard_list->PrintBy->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->PrintBy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->PrintDate->Visible) { // PrintDate ?>
		<td data-name="PrintDate" <?php echo $_view_patient_services_dashboard_list->PrintDate->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_PrintDate">
<span<?php echo $_view_patient_services_dashboard_list->PrintDate->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->PrintDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->BillingDate->Visible) { // BillingDate ?>
		<td data-name="BillingDate" <?php echo $_view_patient_services_dashboard_list->BillingDate->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_BillingDate">
<span<?php echo $_view_patient_services_dashboard_list->BillingDate->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->BillingDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->BilledBy->Visible) { // BilledBy ?>
		<td data-name="BilledBy" <?php echo $_view_patient_services_dashboard_list->BilledBy->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_BilledBy">
<span<?php echo $_view_patient_services_dashboard_list->BilledBy->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->BilledBy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->Resulted->Visible) { // Resulted ?>
		<td data-name="Resulted" <?php echo $_view_patient_services_dashboard_list->Resulted->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_Resulted">
<span<?php echo $_view_patient_services_dashboard_list->Resulted->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->Resulted->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->ResultDate->Visible) { // ResultDate ?>
		<td data-name="ResultDate" <?php echo $_view_patient_services_dashboard_list->ResultDate->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_ResultDate">
<span<?php echo $_view_patient_services_dashboard_list->ResultDate->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->ResultDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->ResultedBy->Visible) { // ResultedBy ?>
		<td data-name="ResultedBy" <?php echo $_view_patient_services_dashboard_list->ResultedBy->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_ResultedBy">
<span<?php echo $_view_patient_services_dashboard_list->ResultedBy->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->ResultedBy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->SampleDate->Visible) { // SampleDate ?>
		<td data-name="SampleDate" <?php echo $_view_patient_services_dashboard_list->SampleDate->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_SampleDate">
<span<?php echo $_view_patient_services_dashboard_list->SampleDate->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->SampleDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->SampleUser->Visible) { // SampleUser ?>
		<td data-name="SampleUser" <?php echo $_view_patient_services_dashboard_list->SampleUser->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_SampleUser">
<span<?php echo $_view_patient_services_dashboard_list->SampleUser->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->SampleUser->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->Sampled->Visible) { // Sampled ?>
		<td data-name="Sampled" <?php echo $_view_patient_services_dashboard_list->Sampled->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_Sampled">
<span<?php echo $_view_patient_services_dashboard_list->Sampled->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->Sampled->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->ReceivedDate->Visible) { // ReceivedDate ?>
		<td data-name="ReceivedDate" <?php echo $_view_patient_services_dashboard_list->ReceivedDate->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_ReceivedDate">
<span<?php echo $_view_patient_services_dashboard_list->ReceivedDate->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->ReceivedDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->ReceivedUser->Visible) { // ReceivedUser ?>
		<td data-name="ReceivedUser" <?php echo $_view_patient_services_dashboard_list->ReceivedUser->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_ReceivedUser">
<span<?php echo $_view_patient_services_dashboard_list->ReceivedUser->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->ReceivedUser->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->Recevied->Visible) { // Recevied ?>
		<td data-name="Recevied" <?php echo $_view_patient_services_dashboard_list->Recevied->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_Recevied">
<span<?php echo $_view_patient_services_dashboard_list->Recevied->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->Recevied->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->DeptRecvDate->Visible) { // DeptRecvDate ?>
		<td data-name="DeptRecvDate" <?php echo $_view_patient_services_dashboard_list->DeptRecvDate->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_DeptRecvDate">
<span<?php echo $_view_patient_services_dashboard_list->DeptRecvDate->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->DeptRecvDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->DeptRecvUser->Visible) { // DeptRecvUser ?>
		<td data-name="DeptRecvUser" <?php echo $_view_patient_services_dashboard_list->DeptRecvUser->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_DeptRecvUser">
<span<?php echo $_view_patient_services_dashboard_list->DeptRecvUser->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->DeptRecvUser->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->DeptRecived->Visible) { // DeptRecived ?>
		<td data-name="DeptRecived" <?php echo $_view_patient_services_dashboard_list->DeptRecived->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_DeptRecived">
<span<?php echo $_view_patient_services_dashboard_list->DeptRecived->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->DeptRecived->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->SAuthDate->Visible) { // SAuthDate ?>
		<td data-name="SAuthDate" <?php echo $_view_patient_services_dashboard_list->SAuthDate->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_SAuthDate">
<span<?php echo $_view_patient_services_dashboard_list->SAuthDate->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->SAuthDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->SAuthBy->Visible) { // SAuthBy ?>
		<td data-name="SAuthBy" <?php echo $_view_patient_services_dashboard_list->SAuthBy->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_SAuthBy">
<span<?php echo $_view_patient_services_dashboard_list->SAuthBy->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->SAuthBy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->SAuthendicate->Visible) { // SAuthendicate ?>
		<td data-name="SAuthendicate" <?php echo $_view_patient_services_dashboard_list->SAuthendicate->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_SAuthendicate">
<span<?php echo $_view_patient_services_dashboard_list->SAuthendicate->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->SAuthendicate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->AuthDate->Visible) { // AuthDate ?>
		<td data-name="AuthDate" <?php echo $_view_patient_services_dashboard_list->AuthDate->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_AuthDate">
<span<?php echo $_view_patient_services_dashboard_list->AuthDate->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->AuthDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->AuthBy->Visible) { // AuthBy ?>
		<td data-name="AuthBy" <?php echo $_view_patient_services_dashboard_list->AuthBy->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_AuthBy">
<span<?php echo $_view_patient_services_dashboard_list->AuthBy->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->AuthBy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->Authencate->Visible) { // Authencate ?>
		<td data-name="Authencate" <?php echo $_view_patient_services_dashboard_list->Authencate->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_Authencate">
<span<?php echo $_view_patient_services_dashboard_list->Authencate->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->Authencate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->EditDate->Visible) { // EditDate ?>
		<td data-name="EditDate" <?php echo $_view_patient_services_dashboard_list->EditDate->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_EditDate">
<span<?php echo $_view_patient_services_dashboard_list->EditDate->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->EditDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->EditBy->Visible) { // EditBy ?>
		<td data-name="EditBy" <?php echo $_view_patient_services_dashboard_list->EditBy->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_EditBy">
<span<?php echo $_view_patient_services_dashboard_list->EditBy->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->EditBy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->Editted->Visible) { // Editted ?>
		<td data-name="Editted" <?php echo $_view_patient_services_dashboard_list->Editted->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_Editted">
<span<?php echo $_view_patient_services_dashboard_list->Editted->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->Editted->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId" <?php echo $_view_patient_services_dashboard_list->PatientId->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_PatientId">
<span<?php echo $_view_patient_services_dashboard_list->PatientId->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->PatientId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile" <?php echo $_view_patient_services_dashboard_list->Mobile->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_Mobile">
<span<?php echo $_view_patient_services_dashboard_list->Mobile->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->Mobile->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->CId->Visible) { // CId ?>
		<td data-name="CId" <?php echo $_view_patient_services_dashboard_list->CId->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_CId">
<span<?php echo $_view_patient_services_dashboard_list->CId->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->CId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->Order->Visible) { // Order ?>
		<td data-name="Order" <?php echo $_view_patient_services_dashboard_list->Order->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_Order">
<span<?php echo $_view_patient_services_dashboard_list->Order->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->Order->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->ResType->Visible) { // ResType ?>
		<td data-name="ResType" <?php echo $_view_patient_services_dashboard_list->ResType->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_ResType">
<span<?php echo $_view_patient_services_dashboard_list->ResType->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->ResType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->Sample->Visible) { // Sample ?>
		<td data-name="Sample" <?php echo $_view_patient_services_dashboard_list->Sample->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_Sample">
<span<?php echo $_view_patient_services_dashboard_list->Sample->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->Sample->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->NoD->Visible) { // NoD ?>
		<td data-name="NoD" <?php echo $_view_patient_services_dashboard_list->NoD->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_NoD">
<span<?php echo $_view_patient_services_dashboard_list->NoD->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->NoD->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->BillOrder->Visible) { // BillOrder ?>
		<td data-name="BillOrder" <?php echo $_view_patient_services_dashboard_list->BillOrder->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_BillOrder">
<span<?php echo $_view_patient_services_dashboard_list->BillOrder->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->BillOrder->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->Inactive->Visible) { // Inactive ?>
		<td data-name="Inactive" <?php echo $_view_patient_services_dashboard_list->Inactive->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_Inactive">
<span<?php echo $_view_patient_services_dashboard_list->Inactive->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->Inactive->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->CollSample->Visible) { // CollSample ?>
		<td data-name="CollSample" <?php echo $_view_patient_services_dashboard_list->CollSample->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_CollSample">
<span<?php echo $_view_patient_services_dashboard_list->CollSample->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->CollSample->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->TestType->Visible) { // TestType ?>
		<td data-name="TestType" <?php echo $_view_patient_services_dashboard_list->TestType->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_TestType">
<span<?php echo $_view_patient_services_dashboard_list->TestType->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->TestType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->Repeated->Visible) { // Repeated ?>
		<td data-name="Repeated" <?php echo $_view_patient_services_dashboard_list->Repeated->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_Repeated">
<span<?php echo $_view_patient_services_dashboard_list->Repeated->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->Repeated->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->RepeatedBy->Visible) { // RepeatedBy ?>
		<td data-name="RepeatedBy" <?php echo $_view_patient_services_dashboard_list->RepeatedBy->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_RepeatedBy">
<span<?php echo $_view_patient_services_dashboard_list->RepeatedBy->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->RepeatedBy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->RepeatedDate->Visible) { // RepeatedDate ?>
		<td data-name="RepeatedDate" <?php echo $_view_patient_services_dashboard_list->RepeatedDate->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_RepeatedDate">
<span<?php echo $_view_patient_services_dashboard_list->RepeatedDate->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->RepeatedDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->serviceID->Visible) { // serviceID ?>
		<td data-name="serviceID" <?php echo $_view_patient_services_dashboard_list->serviceID->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_serviceID">
<span<?php echo $_view_patient_services_dashboard_list->serviceID->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->serviceID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->Service_Type->Visible) { // Service_Type ?>
		<td data-name="Service_Type" <?php echo $_view_patient_services_dashboard_list->Service_Type->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_Service_Type">
<span<?php echo $_view_patient_services_dashboard_list->Service_Type->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->Service_Type->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->Service_Department->Visible) { // Service_Department ?>
		<td data-name="Service_Department" <?php echo $_view_patient_services_dashboard_list->Service_Department->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_Service_Department">
<span<?php echo $_view_patient_services_dashboard_list->Service_Department->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->Service_Department->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->createdDate->Visible) { // createdDate ?>
		<td data-name="createdDate" <?php echo $_view_patient_services_dashboard_list->createdDate->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_createdDate">
<span<?php echo $_view_patient_services_dashboard_list->createdDate->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->createdDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_view_patient_services_dashboard_list->RequestNo->Visible) { // RequestNo ?>
		<td data-name="RequestNo" <?php echo $_view_patient_services_dashboard_list->RequestNo->cellAttributes() ?>>
<span id="el<?php echo $_view_patient_services_dashboard_list->RowCount ?>__view_patient_services_dashboard_RequestNo">
<span<?php echo $_view_patient_services_dashboard_list->RequestNo->viewAttributes() ?>><?php echo $_view_patient_services_dashboard_list->RequestNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$_view_patient_services_dashboard_list->ListOptions->render("body", "right", $_view_patient_services_dashboard_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$_view_patient_services_dashboard_list->isGridAdd())
		$_view_patient_services_dashboard_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$_view_patient_services_dashboard->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($_view_patient_services_dashboard_list->Recordset)
	$_view_patient_services_dashboard_list->Recordset->Close();
?>
<?php if (!$_view_patient_services_dashboard_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$_view_patient_services_dashboard_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $_view_patient_services_dashboard_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $_view_patient_services_dashboard_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($_view_patient_services_dashboard_list->TotalRecords == 0 && !$_view_patient_services_dashboard->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $_view_patient_services_dashboard_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$_view_patient_services_dashboard_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$_view_patient_services_dashboard_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$_view_patient_services_dashboard->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp__view_patient_services_dashboard",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$_view_patient_services_dashboard_list->terminate();
?>