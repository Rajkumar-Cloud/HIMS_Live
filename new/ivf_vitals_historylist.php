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
$ivf_vitals_history_list = new ivf_vitals_history_list();

// Run the page
$ivf_vitals_history_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_vitals_history_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$ivf_vitals_history_list->isExport()) { ?>
<script>
var fivf_vitals_historylist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fivf_vitals_historylist = currentForm = new ew.Form("fivf_vitals_historylist", "list");
	fivf_vitals_historylist.formKeyCountName = '<?php echo $ivf_vitals_history_list->FormKeyCountName ?>';
	loadjs.done("fivf_vitals_historylist");
});
var fivf_vitals_historylistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fivf_vitals_historylistsrch = currentSearchForm = new ew.Form("fivf_vitals_historylistsrch");

	// Dynamic selection lists
	// Filters

	fivf_vitals_historylistsrch.filterList = <?php echo $ivf_vitals_history_list->getFilterList() ?>;
	loadjs.done("fivf_vitals_historylistsrch");
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
<?php if (!$ivf_vitals_history_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($ivf_vitals_history_list->TotalRecords > 0 && $ivf_vitals_history_list->ExportOptions->visible()) { ?>
<?php $ivf_vitals_history_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_vitals_history_list->ImportOptions->visible()) { ?>
<?php $ivf_vitals_history_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_vitals_history_list->SearchOptions->visible()) { ?>
<?php $ivf_vitals_history_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_vitals_history_list->FilterOptions->visible()) { ?>
<?php $ivf_vitals_history_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$ivf_vitals_history_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$ivf_vitals_history_list->isExport() && !$ivf_vitals_history->CurrentAction) { ?>
<form name="fivf_vitals_historylistsrch" id="fivf_vitals_historylistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fivf_vitals_historylistsrch-search-panel" class="<?php echo $ivf_vitals_history_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="ivf_vitals_history">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $ivf_vitals_history_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($ivf_vitals_history_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($ivf_vitals_history_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $ivf_vitals_history_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($ivf_vitals_history_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($ivf_vitals_history_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($ivf_vitals_history_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($ivf_vitals_history_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $ivf_vitals_history_list->showPageHeader(); ?>
<?php
$ivf_vitals_history_list->showMessage();
?>
<?php if ($ivf_vitals_history_list->TotalRecords > 0 || $ivf_vitals_history->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($ivf_vitals_history_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf_vitals_history">
<?php if (!$ivf_vitals_history_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$ivf_vitals_history_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $ivf_vitals_history_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ivf_vitals_history_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fivf_vitals_historylist" id="fivf_vitals_historylist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_vitals_history">
<div id="gmp_ivf_vitals_history" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($ivf_vitals_history_list->TotalRecords > 0 || $ivf_vitals_history_list->isGridEdit()) { ?>
<table id="tbl_ivf_vitals_historylist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$ivf_vitals_history->RowType = ROWTYPE_HEADER;

// Render list options
$ivf_vitals_history_list->renderListOptions();

// Render list options (header, left)
$ivf_vitals_history_list->ListOptions->render("header", "left");
?>
<?php if ($ivf_vitals_history_list->id->Visible) { // id ?>
	<?php if ($ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $ivf_vitals_history_list->id->headerCellClass() ?>"><div id="elh_ivf_vitals_history_id" class="ivf_vitals_history_id"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $ivf_vitals_history_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->id) ?>', 1);"><div id="elh_ivf_vitals_history_id" class="ivf_vitals_history_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitals_history_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history_list->RIDNO->Visible) { // RIDNO ?>
	<?php if ($ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->RIDNO) == "") { ?>
		<th data-name="RIDNO" class="<?php echo $ivf_vitals_history_list->RIDNO->headerCellClass() ?>"><div id="elh_ivf_vitals_history_RIDNO" class="ivf_vitals_history_RIDNO"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->RIDNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RIDNO" class="<?php echo $ivf_vitals_history_list->RIDNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->RIDNO) ?>', 1);"><div id="elh_ivf_vitals_history_RIDNO" class="ivf_vitals_history_RIDNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->RIDNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history_list->RIDNO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitals_history_list->RIDNO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history_list->Name->Visible) { // Name ?>
	<?php if ($ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->Name) == "") { ?>
		<th data-name="Name" class="<?php echo $ivf_vitals_history_list->Name->headerCellClass() ?>"><div id="elh_ivf_vitals_history_Name" class="ivf_vitals_history_Name"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Name" class="<?php echo $ivf_vitals_history_list->Name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->Name) ?>', 1);"><div id="elh_ivf_vitals_history_Name" class="ivf_vitals_history_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->Name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history_list->Name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitals_history_list->Name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history_list->Age->Visible) { // Age ?>
	<?php if ($ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $ivf_vitals_history_list->Age->headerCellClass() ?>"><div id="elh_ivf_vitals_history_Age" class="ivf_vitals_history_Age"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $ivf_vitals_history_list->Age->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->Age) ?>', 1);"><div id="elh_ivf_vitals_history_Age" class="ivf_vitals_history_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->Age->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history_list->Age->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitals_history_list->Age->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history_list->SEX->Visible) { // SEX ?>
	<?php if ($ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->SEX) == "") { ?>
		<th data-name="SEX" class="<?php echo $ivf_vitals_history_list->SEX->headerCellClass() ?>"><div id="elh_ivf_vitals_history_SEX" class="ivf_vitals_history_SEX"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->SEX->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SEX" class="<?php echo $ivf_vitals_history_list->SEX->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->SEX) ?>', 1);"><div id="elh_ivf_vitals_history_SEX" class="ivf_vitals_history_SEX">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->SEX->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history_list->SEX->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitals_history_list->SEX->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history_list->Religion->Visible) { // Religion ?>
	<?php if ($ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->Religion) == "") { ?>
		<th data-name="Religion" class="<?php echo $ivf_vitals_history_list->Religion->headerCellClass() ?>"><div id="elh_ivf_vitals_history_Religion" class="ivf_vitals_history_Religion"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->Religion->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Religion" class="<?php echo $ivf_vitals_history_list->Religion->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->Religion) ?>', 1);"><div id="elh_ivf_vitals_history_Religion" class="ivf_vitals_history_Religion">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->Religion->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history_list->Religion->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitals_history_list->Religion->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history_list->Address->Visible) { // Address ?>
	<?php if ($ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->Address) == "") { ?>
		<th data-name="Address" class="<?php echo $ivf_vitals_history_list->Address->headerCellClass() ?>"><div id="elh_ivf_vitals_history_Address" class="ivf_vitals_history_Address"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->Address->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Address" class="<?php echo $ivf_vitals_history_list->Address->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->Address) ?>', 1);"><div id="elh_ivf_vitals_history_Address" class="ivf_vitals_history_Address">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->Address->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history_list->Address->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitals_history_list->Address->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history_list->IdentificationMark->Visible) { // IdentificationMark ?>
	<?php if ($ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->IdentificationMark) == "") { ?>
		<th data-name="IdentificationMark" class="<?php echo $ivf_vitals_history_list->IdentificationMark->headerCellClass() ?>"><div id="elh_ivf_vitals_history_IdentificationMark" class="ivf_vitals_history_IdentificationMark"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->IdentificationMark->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IdentificationMark" class="<?php echo $ivf_vitals_history_list->IdentificationMark->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->IdentificationMark) ?>', 1);"><div id="elh_ivf_vitals_history_IdentificationMark" class="ivf_vitals_history_IdentificationMark">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->IdentificationMark->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history_list->IdentificationMark->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitals_history_list->IdentificationMark->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history_list->DoublewitnessName1->Visible) { // DoublewitnessName1 ?>
	<?php if ($ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->DoublewitnessName1) == "") { ?>
		<th data-name="DoublewitnessName1" class="<?php echo $ivf_vitals_history_list->DoublewitnessName1->headerCellClass() ?>"><div id="elh_ivf_vitals_history_DoublewitnessName1" class="ivf_vitals_history_DoublewitnessName1"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->DoublewitnessName1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DoublewitnessName1" class="<?php echo $ivf_vitals_history_list->DoublewitnessName1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->DoublewitnessName1) ?>', 1);"><div id="elh_ivf_vitals_history_DoublewitnessName1" class="ivf_vitals_history_DoublewitnessName1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->DoublewitnessName1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history_list->DoublewitnessName1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitals_history_list->DoublewitnessName1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history_list->DoublewitnessName2->Visible) { // DoublewitnessName2 ?>
	<?php if ($ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->DoublewitnessName2) == "") { ?>
		<th data-name="DoublewitnessName2" class="<?php echo $ivf_vitals_history_list->DoublewitnessName2->headerCellClass() ?>"><div id="elh_ivf_vitals_history_DoublewitnessName2" class="ivf_vitals_history_DoublewitnessName2"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->DoublewitnessName2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DoublewitnessName2" class="<?php echo $ivf_vitals_history_list->DoublewitnessName2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->DoublewitnessName2) ?>', 1);"><div id="elh_ivf_vitals_history_DoublewitnessName2" class="ivf_vitals_history_DoublewitnessName2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->DoublewitnessName2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history_list->DoublewitnessName2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitals_history_list->DoublewitnessName2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history_list->Chiefcomplaints->Visible) { // Chiefcomplaints ?>
	<?php if ($ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->Chiefcomplaints) == "") { ?>
		<th data-name="Chiefcomplaints" class="<?php echo $ivf_vitals_history_list->Chiefcomplaints->headerCellClass() ?>"><div id="elh_ivf_vitals_history_Chiefcomplaints" class="ivf_vitals_history_Chiefcomplaints"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->Chiefcomplaints->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Chiefcomplaints" class="<?php echo $ivf_vitals_history_list->Chiefcomplaints->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->Chiefcomplaints) ?>', 1);"><div id="elh_ivf_vitals_history_Chiefcomplaints" class="ivf_vitals_history_Chiefcomplaints">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->Chiefcomplaints->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history_list->Chiefcomplaints->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitals_history_list->Chiefcomplaints->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history_list->MenstrualHistory->Visible) { // MenstrualHistory ?>
	<?php if ($ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->MenstrualHistory) == "") { ?>
		<th data-name="MenstrualHistory" class="<?php echo $ivf_vitals_history_list->MenstrualHistory->headerCellClass() ?>"><div id="elh_ivf_vitals_history_MenstrualHistory" class="ivf_vitals_history_MenstrualHistory"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->MenstrualHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MenstrualHistory" class="<?php echo $ivf_vitals_history_list->MenstrualHistory->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->MenstrualHistory) ?>', 1);"><div id="elh_ivf_vitals_history_MenstrualHistory" class="ivf_vitals_history_MenstrualHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->MenstrualHistory->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history_list->MenstrualHistory->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitals_history_list->MenstrualHistory->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history_list->ObstetricHistory->Visible) { // ObstetricHistory ?>
	<?php if ($ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->ObstetricHistory) == "") { ?>
		<th data-name="ObstetricHistory" class="<?php echo $ivf_vitals_history_list->ObstetricHistory->headerCellClass() ?>"><div id="elh_ivf_vitals_history_ObstetricHistory" class="ivf_vitals_history_ObstetricHistory"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->ObstetricHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ObstetricHistory" class="<?php echo $ivf_vitals_history_list->ObstetricHistory->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->ObstetricHistory) ?>', 1);"><div id="elh_ivf_vitals_history_ObstetricHistory" class="ivf_vitals_history_ObstetricHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->ObstetricHistory->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history_list->ObstetricHistory->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitals_history_list->ObstetricHistory->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history_list->MedicalHistory->Visible) { // MedicalHistory ?>
	<?php if ($ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->MedicalHistory) == "") { ?>
		<th data-name="MedicalHistory" class="<?php echo $ivf_vitals_history_list->MedicalHistory->headerCellClass() ?>"><div id="elh_ivf_vitals_history_MedicalHistory" class="ivf_vitals_history_MedicalHistory"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->MedicalHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MedicalHistory" class="<?php echo $ivf_vitals_history_list->MedicalHistory->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->MedicalHistory) ?>', 1);"><div id="elh_ivf_vitals_history_MedicalHistory" class="ivf_vitals_history_MedicalHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->MedicalHistory->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history_list->MedicalHistory->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitals_history_list->MedicalHistory->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history_list->SurgicalHistory->Visible) { // SurgicalHistory ?>
	<?php if ($ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->SurgicalHistory) == "") { ?>
		<th data-name="SurgicalHistory" class="<?php echo $ivf_vitals_history_list->SurgicalHistory->headerCellClass() ?>"><div id="elh_ivf_vitals_history_SurgicalHistory" class="ivf_vitals_history_SurgicalHistory"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->SurgicalHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SurgicalHistory" class="<?php echo $ivf_vitals_history_list->SurgicalHistory->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->SurgicalHistory) ?>', 1);"><div id="elh_ivf_vitals_history_SurgicalHistory" class="ivf_vitals_history_SurgicalHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->SurgicalHistory->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history_list->SurgicalHistory->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitals_history_list->SurgicalHistory->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history_list->Generalexaminationpallor->Visible) { // Generalexaminationpallor ?>
	<?php if ($ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->Generalexaminationpallor) == "") { ?>
		<th data-name="Generalexaminationpallor" class="<?php echo $ivf_vitals_history_list->Generalexaminationpallor->headerCellClass() ?>"><div id="elh_ivf_vitals_history_Generalexaminationpallor" class="ivf_vitals_history_Generalexaminationpallor"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->Generalexaminationpallor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Generalexaminationpallor" class="<?php echo $ivf_vitals_history_list->Generalexaminationpallor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->Generalexaminationpallor) ?>', 1);"><div id="elh_ivf_vitals_history_Generalexaminationpallor" class="ivf_vitals_history_Generalexaminationpallor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->Generalexaminationpallor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history_list->Generalexaminationpallor->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitals_history_list->Generalexaminationpallor->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history_list->PR->Visible) { // PR ?>
	<?php if ($ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->PR) == "") { ?>
		<th data-name="PR" class="<?php echo $ivf_vitals_history_list->PR->headerCellClass() ?>"><div id="elh_ivf_vitals_history_PR" class="ivf_vitals_history_PR"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->PR->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PR" class="<?php echo $ivf_vitals_history_list->PR->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->PR) ?>', 1);"><div id="elh_ivf_vitals_history_PR" class="ivf_vitals_history_PR">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->PR->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history_list->PR->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitals_history_list->PR->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history_list->CVS->Visible) { // CVS ?>
	<?php if ($ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->CVS) == "") { ?>
		<th data-name="CVS" class="<?php echo $ivf_vitals_history_list->CVS->headerCellClass() ?>"><div id="elh_ivf_vitals_history_CVS" class="ivf_vitals_history_CVS"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->CVS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CVS" class="<?php echo $ivf_vitals_history_list->CVS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->CVS) ?>', 1);"><div id="elh_ivf_vitals_history_CVS" class="ivf_vitals_history_CVS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->CVS->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history_list->CVS->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitals_history_list->CVS->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history_list->PA->Visible) { // PA ?>
	<?php if ($ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->PA) == "") { ?>
		<th data-name="PA" class="<?php echo $ivf_vitals_history_list->PA->headerCellClass() ?>"><div id="elh_ivf_vitals_history_PA" class="ivf_vitals_history_PA"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->PA->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PA" class="<?php echo $ivf_vitals_history_list->PA->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->PA) ?>', 1);"><div id="elh_ivf_vitals_history_PA" class="ivf_vitals_history_PA">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->PA->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history_list->PA->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitals_history_list->PA->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history_list->PROVISIONALDIAGNOSIS->Visible) { // PROVISIONALDIAGNOSIS ?>
	<?php if ($ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->PROVISIONALDIAGNOSIS) == "") { ?>
		<th data-name="PROVISIONALDIAGNOSIS" class="<?php echo $ivf_vitals_history_list->PROVISIONALDIAGNOSIS->headerCellClass() ?>"><div id="elh_ivf_vitals_history_PROVISIONALDIAGNOSIS" class="ivf_vitals_history_PROVISIONALDIAGNOSIS"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->PROVISIONALDIAGNOSIS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PROVISIONALDIAGNOSIS" class="<?php echo $ivf_vitals_history_list->PROVISIONALDIAGNOSIS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->PROVISIONALDIAGNOSIS) ?>', 1);"><div id="elh_ivf_vitals_history_PROVISIONALDIAGNOSIS" class="ivf_vitals_history_PROVISIONALDIAGNOSIS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->PROVISIONALDIAGNOSIS->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history_list->PROVISIONALDIAGNOSIS->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitals_history_list->PROVISIONALDIAGNOSIS->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history_list->Investigations->Visible) { // Investigations ?>
	<?php if ($ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->Investigations) == "") { ?>
		<th data-name="Investigations" class="<?php echo $ivf_vitals_history_list->Investigations->headerCellClass() ?>"><div id="elh_ivf_vitals_history_Investigations" class="ivf_vitals_history_Investigations"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->Investigations->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Investigations" class="<?php echo $ivf_vitals_history_list->Investigations->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->Investigations) ?>', 1);"><div id="elh_ivf_vitals_history_Investigations" class="ivf_vitals_history_Investigations">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->Investigations->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history_list->Investigations->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitals_history_list->Investigations->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history_list->Fheight->Visible) { // Fheight ?>
	<?php if ($ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->Fheight) == "") { ?>
		<th data-name="Fheight" class="<?php echo $ivf_vitals_history_list->Fheight->headerCellClass() ?>"><div id="elh_ivf_vitals_history_Fheight" class="ivf_vitals_history_Fheight"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->Fheight->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Fheight" class="<?php echo $ivf_vitals_history_list->Fheight->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->Fheight) ?>', 1);"><div id="elh_ivf_vitals_history_Fheight" class="ivf_vitals_history_Fheight">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->Fheight->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history_list->Fheight->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitals_history_list->Fheight->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history_list->Fweight->Visible) { // Fweight ?>
	<?php if ($ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->Fweight) == "") { ?>
		<th data-name="Fweight" class="<?php echo $ivf_vitals_history_list->Fweight->headerCellClass() ?>"><div id="elh_ivf_vitals_history_Fweight" class="ivf_vitals_history_Fweight"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->Fweight->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Fweight" class="<?php echo $ivf_vitals_history_list->Fweight->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->Fweight) ?>', 1);"><div id="elh_ivf_vitals_history_Fweight" class="ivf_vitals_history_Fweight">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->Fweight->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history_list->Fweight->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitals_history_list->Fweight->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history_list->FBMI->Visible) { // FBMI ?>
	<?php if ($ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->FBMI) == "") { ?>
		<th data-name="FBMI" class="<?php echo $ivf_vitals_history_list->FBMI->headerCellClass() ?>"><div id="elh_ivf_vitals_history_FBMI" class="ivf_vitals_history_FBMI"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->FBMI->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FBMI" class="<?php echo $ivf_vitals_history_list->FBMI->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->FBMI) ?>', 1);"><div id="elh_ivf_vitals_history_FBMI" class="ivf_vitals_history_FBMI">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->FBMI->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history_list->FBMI->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitals_history_list->FBMI->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history_list->FBloodgroup->Visible) { // FBloodgroup ?>
	<?php if ($ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->FBloodgroup) == "") { ?>
		<th data-name="FBloodgroup" class="<?php echo $ivf_vitals_history_list->FBloodgroup->headerCellClass() ?>"><div id="elh_ivf_vitals_history_FBloodgroup" class="ivf_vitals_history_FBloodgroup"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->FBloodgroup->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FBloodgroup" class="<?php echo $ivf_vitals_history_list->FBloodgroup->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->FBloodgroup) ?>', 1);"><div id="elh_ivf_vitals_history_FBloodgroup" class="ivf_vitals_history_FBloodgroup">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->FBloodgroup->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history_list->FBloodgroup->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitals_history_list->FBloodgroup->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history_list->Mheight->Visible) { // Mheight ?>
	<?php if ($ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->Mheight) == "") { ?>
		<th data-name="Mheight" class="<?php echo $ivf_vitals_history_list->Mheight->headerCellClass() ?>"><div id="elh_ivf_vitals_history_Mheight" class="ivf_vitals_history_Mheight"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->Mheight->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mheight" class="<?php echo $ivf_vitals_history_list->Mheight->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->Mheight) ?>', 1);"><div id="elh_ivf_vitals_history_Mheight" class="ivf_vitals_history_Mheight">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->Mheight->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history_list->Mheight->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitals_history_list->Mheight->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history_list->Mweight->Visible) { // Mweight ?>
	<?php if ($ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->Mweight) == "") { ?>
		<th data-name="Mweight" class="<?php echo $ivf_vitals_history_list->Mweight->headerCellClass() ?>"><div id="elh_ivf_vitals_history_Mweight" class="ivf_vitals_history_Mweight"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->Mweight->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mweight" class="<?php echo $ivf_vitals_history_list->Mweight->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->Mweight) ?>', 1);"><div id="elh_ivf_vitals_history_Mweight" class="ivf_vitals_history_Mweight">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->Mweight->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history_list->Mweight->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitals_history_list->Mweight->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history_list->MBMI->Visible) { // MBMI ?>
	<?php if ($ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->MBMI) == "") { ?>
		<th data-name="MBMI" class="<?php echo $ivf_vitals_history_list->MBMI->headerCellClass() ?>"><div id="elh_ivf_vitals_history_MBMI" class="ivf_vitals_history_MBMI"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->MBMI->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MBMI" class="<?php echo $ivf_vitals_history_list->MBMI->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->MBMI) ?>', 1);"><div id="elh_ivf_vitals_history_MBMI" class="ivf_vitals_history_MBMI">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->MBMI->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history_list->MBMI->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitals_history_list->MBMI->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history_list->MBloodgroup->Visible) { // MBloodgroup ?>
	<?php if ($ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->MBloodgroup) == "") { ?>
		<th data-name="MBloodgroup" class="<?php echo $ivf_vitals_history_list->MBloodgroup->headerCellClass() ?>"><div id="elh_ivf_vitals_history_MBloodgroup" class="ivf_vitals_history_MBloodgroup"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->MBloodgroup->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MBloodgroup" class="<?php echo $ivf_vitals_history_list->MBloodgroup->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->MBloodgroup) ?>', 1);"><div id="elh_ivf_vitals_history_MBloodgroup" class="ivf_vitals_history_MBloodgroup">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->MBloodgroup->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history_list->MBloodgroup->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitals_history_list->MBloodgroup->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history_list->FBuild->Visible) { // FBuild ?>
	<?php if ($ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->FBuild) == "") { ?>
		<th data-name="FBuild" class="<?php echo $ivf_vitals_history_list->FBuild->headerCellClass() ?>"><div id="elh_ivf_vitals_history_FBuild" class="ivf_vitals_history_FBuild"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->FBuild->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FBuild" class="<?php echo $ivf_vitals_history_list->FBuild->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->FBuild) ?>', 1);"><div id="elh_ivf_vitals_history_FBuild" class="ivf_vitals_history_FBuild">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->FBuild->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history_list->FBuild->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitals_history_list->FBuild->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history_list->MBuild->Visible) { // MBuild ?>
	<?php if ($ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->MBuild) == "") { ?>
		<th data-name="MBuild" class="<?php echo $ivf_vitals_history_list->MBuild->headerCellClass() ?>"><div id="elh_ivf_vitals_history_MBuild" class="ivf_vitals_history_MBuild"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->MBuild->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MBuild" class="<?php echo $ivf_vitals_history_list->MBuild->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->MBuild) ?>', 1);"><div id="elh_ivf_vitals_history_MBuild" class="ivf_vitals_history_MBuild">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->MBuild->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history_list->MBuild->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitals_history_list->MBuild->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history_list->FSkinColor->Visible) { // FSkinColor ?>
	<?php if ($ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->FSkinColor) == "") { ?>
		<th data-name="FSkinColor" class="<?php echo $ivf_vitals_history_list->FSkinColor->headerCellClass() ?>"><div id="elh_ivf_vitals_history_FSkinColor" class="ivf_vitals_history_FSkinColor"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->FSkinColor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FSkinColor" class="<?php echo $ivf_vitals_history_list->FSkinColor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->FSkinColor) ?>', 1);"><div id="elh_ivf_vitals_history_FSkinColor" class="ivf_vitals_history_FSkinColor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->FSkinColor->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history_list->FSkinColor->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitals_history_list->FSkinColor->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history_list->MSkinColor->Visible) { // MSkinColor ?>
	<?php if ($ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->MSkinColor) == "") { ?>
		<th data-name="MSkinColor" class="<?php echo $ivf_vitals_history_list->MSkinColor->headerCellClass() ?>"><div id="elh_ivf_vitals_history_MSkinColor" class="ivf_vitals_history_MSkinColor"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->MSkinColor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MSkinColor" class="<?php echo $ivf_vitals_history_list->MSkinColor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->MSkinColor) ?>', 1);"><div id="elh_ivf_vitals_history_MSkinColor" class="ivf_vitals_history_MSkinColor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->MSkinColor->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history_list->MSkinColor->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitals_history_list->MSkinColor->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history_list->FEyesColor->Visible) { // FEyesColor ?>
	<?php if ($ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->FEyesColor) == "") { ?>
		<th data-name="FEyesColor" class="<?php echo $ivf_vitals_history_list->FEyesColor->headerCellClass() ?>"><div id="elh_ivf_vitals_history_FEyesColor" class="ivf_vitals_history_FEyesColor"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->FEyesColor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FEyesColor" class="<?php echo $ivf_vitals_history_list->FEyesColor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->FEyesColor) ?>', 1);"><div id="elh_ivf_vitals_history_FEyesColor" class="ivf_vitals_history_FEyesColor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->FEyesColor->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history_list->FEyesColor->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitals_history_list->FEyesColor->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history_list->MEyesColor->Visible) { // MEyesColor ?>
	<?php if ($ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->MEyesColor) == "") { ?>
		<th data-name="MEyesColor" class="<?php echo $ivf_vitals_history_list->MEyesColor->headerCellClass() ?>"><div id="elh_ivf_vitals_history_MEyesColor" class="ivf_vitals_history_MEyesColor"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->MEyesColor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MEyesColor" class="<?php echo $ivf_vitals_history_list->MEyesColor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->MEyesColor) ?>', 1);"><div id="elh_ivf_vitals_history_MEyesColor" class="ivf_vitals_history_MEyesColor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->MEyesColor->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history_list->MEyesColor->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitals_history_list->MEyesColor->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history_list->FHairColor->Visible) { // FHairColor ?>
	<?php if ($ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->FHairColor) == "") { ?>
		<th data-name="FHairColor" class="<?php echo $ivf_vitals_history_list->FHairColor->headerCellClass() ?>"><div id="elh_ivf_vitals_history_FHairColor" class="ivf_vitals_history_FHairColor"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->FHairColor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FHairColor" class="<?php echo $ivf_vitals_history_list->FHairColor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->FHairColor) ?>', 1);"><div id="elh_ivf_vitals_history_FHairColor" class="ivf_vitals_history_FHairColor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->FHairColor->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history_list->FHairColor->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitals_history_list->FHairColor->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history_list->MhairColor->Visible) { // MhairColor ?>
	<?php if ($ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->MhairColor) == "") { ?>
		<th data-name="MhairColor" class="<?php echo $ivf_vitals_history_list->MhairColor->headerCellClass() ?>"><div id="elh_ivf_vitals_history_MhairColor" class="ivf_vitals_history_MhairColor"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->MhairColor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MhairColor" class="<?php echo $ivf_vitals_history_list->MhairColor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->MhairColor) ?>', 1);"><div id="elh_ivf_vitals_history_MhairColor" class="ivf_vitals_history_MhairColor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->MhairColor->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history_list->MhairColor->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitals_history_list->MhairColor->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history_list->FhairTexture->Visible) { // FhairTexture ?>
	<?php if ($ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->FhairTexture) == "") { ?>
		<th data-name="FhairTexture" class="<?php echo $ivf_vitals_history_list->FhairTexture->headerCellClass() ?>"><div id="elh_ivf_vitals_history_FhairTexture" class="ivf_vitals_history_FhairTexture"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->FhairTexture->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FhairTexture" class="<?php echo $ivf_vitals_history_list->FhairTexture->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->FhairTexture) ?>', 1);"><div id="elh_ivf_vitals_history_FhairTexture" class="ivf_vitals_history_FhairTexture">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->FhairTexture->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history_list->FhairTexture->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitals_history_list->FhairTexture->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history_list->MHairTexture->Visible) { // MHairTexture ?>
	<?php if ($ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->MHairTexture) == "") { ?>
		<th data-name="MHairTexture" class="<?php echo $ivf_vitals_history_list->MHairTexture->headerCellClass() ?>"><div id="elh_ivf_vitals_history_MHairTexture" class="ivf_vitals_history_MHairTexture"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->MHairTexture->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MHairTexture" class="<?php echo $ivf_vitals_history_list->MHairTexture->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->MHairTexture) ?>', 1);"><div id="elh_ivf_vitals_history_MHairTexture" class="ivf_vitals_history_MHairTexture">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->MHairTexture->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history_list->MHairTexture->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitals_history_list->MHairTexture->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history_list->Fothers->Visible) { // Fothers ?>
	<?php if ($ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->Fothers) == "") { ?>
		<th data-name="Fothers" class="<?php echo $ivf_vitals_history_list->Fothers->headerCellClass() ?>"><div id="elh_ivf_vitals_history_Fothers" class="ivf_vitals_history_Fothers"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->Fothers->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Fothers" class="<?php echo $ivf_vitals_history_list->Fothers->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->Fothers) ?>', 1);"><div id="elh_ivf_vitals_history_Fothers" class="ivf_vitals_history_Fothers">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->Fothers->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history_list->Fothers->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitals_history_list->Fothers->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history_list->Mothers->Visible) { // Mothers ?>
	<?php if ($ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->Mothers) == "") { ?>
		<th data-name="Mothers" class="<?php echo $ivf_vitals_history_list->Mothers->headerCellClass() ?>"><div id="elh_ivf_vitals_history_Mothers" class="ivf_vitals_history_Mothers"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->Mothers->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mothers" class="<?php echo $ivf_vitals_history_list->Mothers->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->Mothers) ?>', 1);"><div id="elh_ivf_vitals_history_Mothers" class="ivf_vitals_history_Mothers">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->Mothers->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history_list->Mothers->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitals_history_list->Mothers->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history_list->PGE->Visible) { // PGE ?>
	<?php if ($ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->PGE) == "") { ?>
		<th data-name="PGE" class="<?php echo $ivf_vitals_history_list->PGE->headerCellClass() ?>"><div id="elh_ivf_vitals_history_PGE" class="ivf_vitals_history_PGE"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->PGE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PGE" class="<?php echo $ivf_vitals_history_list->PGE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->PGE) ?>', 1);"><div id="elh_ivf_vitals_history_PGE" class="ivf_vitals_history_PGE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->PGE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history_list->PGE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitals_history_list->PGE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history_list->PPR->Visible) { // PPR ?>
	<?php if ($ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->PPR) == "") { ?>
		<th data-name="PPR" class="<?php echo $ivf_vitals_history_list->PPR->headerCellClass() ?>"><div id="elh_ivf_vitals_history_PPR" class="ivf_vitals_history_PPR"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->PPR->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PPR" class="<?php echo $ivf_vitals_history_list->PPR->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->PPR) ?>', 1);"><div id="elh_ivf_vitals_history_PPR" class="ivf_vitals_history_PPR">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->PPR->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history_list->PPR->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitals_history_list->PPR->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history_list->PBP->Visible) { // PBP ?>
	<?php if ($ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->PBP) == "") { ?>
		<th data-name="PBP" class="<?php echo $ivf_vitals_history_list->PBP->headerCellClass() ?>"><div id="elh_ivf_vitals_history_PBP" class="ivf_vitals_history_PBP"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->PBP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PBP" class="<?php echo $ivf_vitals_history_list->PBP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->PBP) ?>', 1);"><div id="elh_ivf_vitals_history_PBP" class="ivf_vitals_history_PBP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->PBP->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history_list->PBP->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitals_history_list->PBP->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history_list->Breast->Visible) { // Breast ?>
	<?php if ($ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->Breast) == "") { ?>
		<th data-name="Breast" class="<?php echo $ivf_vitals_history_list->Breast->headerCellClass() ?>"><div id="elh_ivf_vitals_history_Breast" class="ivf_vitals_history_Breast"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->Breast->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Breast" class="<?php echo $ivf_vitals_history_list->Breast->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->Breast) ?>', 1);"><div id="elh_ivf_vitals_history_Breast" class="ivf_vitals_history_Breast">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->Breast->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history_list->Breast->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitals_history_list->Breast->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history_list->PPA->Visible) { // PPA ?>
	<?php if ($ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->PPA) == "") { ?>
		<th data-name="PPA" class="<?php echo $ivf_vitals_history_list->PPA->headerCellClass() ?>"><div id="elh_ivf_vitals_history_PPA" class="ivf_vitals_history_PPA"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->PPA->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PPA" class="<?php echo $ivf_vitals_history_list->PPA->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->PPA) ?>', 1);"><div id="elh_ivf_vitals_history_PPA" class="ivf_vitals_history_PPA">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->PPA->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history_list->PPA->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitals_history_list->PPA->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history_list->PPSV->Visible) { // PPSV ?>
	<?php if ($ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->PPSV) == "") { ?>
		<th data-name="PPSV" class="<?php echo $ivf_vitals_history_list->PPSV->headerCellClass() ?>"><div id="elh_ivf_vitals_history_PPSV" class="ivf_vitals_history_PPSV"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->PPSV->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PPSV" class="<?php echo $ivf_vitals_history_list->PPSV->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->PPSV) ?>', 1);"><div id="elh_ivf_vitals_history_PPSV" class="ivf_vitals_history_PPSV">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->PPSV->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history_list->PPSV->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitals_history_list->PPSV->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history_list->PPAPSMEAR->Visible) { // PPAPSMEAR ?>
	<?php if ($ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->PPAPSMEAR) == "") { ?>
		<th data-name="PPAPSMEAR" class="<?php echo $ivf_vitals_history_list->PPAPSMEAR->headerCellClass() ?>"><div id="elh_ivf_vitals_history_PPAPSMEAR" class="ivf_vitals_history_PPAPSMEAR"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->PPAPSMEAR->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PPAPSMEAR" class="<?php echo $ivf_vitals_history_list->PPAPSMEAR->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->PPAPSMEAR) ?>', 1);"><div id="elh_ivf_vitals_history_PPAPSMEAR" class="ivf_vitals_history_PPAPSMEAR">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->PPAPSMEAR->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history_list->PPAPSMEAR->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitals_history_list->PPAPSMEAR->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history_list->PTHYROID->Visible) { // PTHYROID ?>
	<?php if ($ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->PTHYROID) == "") { ?>
		<th data-name="PTHYROID" class="<?php echo $ivf_vitals_history_list->PTHYROID->headerCellClass() ?>"><div id="elh_ivf_vitals_history_PTHYROID" class="ivf_vitals_history_PTHYROID"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->PTHYROID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PTHYROID" class="<?php echo $ivf_vitals_history_list->PTHYROID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->PTHYROID) ?>', 1);"><div id="elh_ivf_vitals_history_PTHYROID" class="ivf_vitals_history_PTHYROID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->PTHYROID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history_list->PTHYROID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitals_history_list->PTHYROID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history_list->MTHYROID->Visible) { // MTHYROID ?>
	<?php if ($ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->MTHYROID) == "") { ?>
		<th data-name="MTHYROID" class="<?php echo $ivf_vitals_history_list->MTHYROID->headerCellClass() ?>"><div id="elh_ivf_vitals_history_MTHYROID" class="ivf_vitals_history_MTHYROID"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->MTHYROID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MTHYROID" class="<?php echo $ivf_vitals_history_list->MTHYROID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->MTHYROID) ?>', 1);"><div id="elh_ivf_vitals_history_MTHYROID" class="ivf_vitals_history_MTHYROID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->MTHYROID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history_list->MTHYROID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitals_history_list->MTHYROID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history_list->SecSexCharacters->Visible) { // SecSexCharacters ?>
	<?php if ($ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->SecSexCharacters) == "") { ?>
		<th data-name="SecSexCharacters" class="<?php echo $ivf_vitals_history_list->SecSexCharacters->headerCellClass() ?>"><div id="elh_ivf_vitals_history_SecSexCharacters" class="ivf_vitals_history_SecSexCharacters"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->SecSexCharacters->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SecSexCharacters" class="<?php echo $ivf_vitals_history_list->SecSexCharacters->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->SecSexCharacters) ?>', 1);"><div id="elh_ivf_vitals_history_SecSexCharacters" class="ivf_vitals_history_SecSexCharacters">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->SecSexCharacters->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history_list->SecSexCharacters->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitals_history_list->SecSexCharacters->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history_list->PenisUM->Visible) { // PenisUM ?>
	<?php if ($ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->PenisUM) == "") { ?>
		<th data-name="PenisUM" class="<?php echo $ivf_vitals_history_list->PenisUM->headerCellClass() ?>"><div id="elh_ivf_vitals_history_PenisUM" class="ivf_vitals_history_PenisUM"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->PenisUM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PenisUM" class="<?php echo $ivf_vitals_history_list->PenisUM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->PenisUM) ?>', 1);"><div id="elh_ivf_vitals_history_PenisUM" class="ivf_vitals_history_PenisUM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->PenisUM->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history_list->PenisUM->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitals_history_list->PenisUM->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history_list->VAS->Visible) { // VAS ?>
	<?php if ($ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->VAS) == "") { ?>
		<th data-name="VAS" class="<?php echo $ivf_vitals_history_list->VAS->headerCellClass() ?>"><div id="elh_ivf_vitals_history_VAS" class="ivf_vitals_history_VAS"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->VAS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="VAS" class="<?php echo $ivf_vitals_history_list->VAS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->VAS) ?>', 1);"><div id="elh_ivf_vitals_history_VAS" class="ivf_vitals_history_VAS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->VAS->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history_list->VAS->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitals_history_list->VAS->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history_list->EPIDIDYMIS->Visible) { // EPIDIDYMIS ?>
	<?php if ($ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->EPIDIDYMIS) == "") { ?>
		<th data-name="EPIDIDYMIS" class="<?php echo $ivf_vitals_history_list->EPIDIDYMIS->headerCellClass() ?>"><div id="elh_ivf_vitals_history_EPIDIDYMIS" class="ivf_vitals_history_EPIDIDYMIS"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->EPIDIDYMIS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EPIDIDYMIS" class="<?php echo $ivf_vitals_history_list->EPIDIDYMIS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->EPIDIDYMIS) ?>', 1);"><div id="elh_ivf_vitals_history_EPIDIDYMIS" class="ivf_vitals_history_EPIDIDYMIS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->EPIDIDYMIS->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history_list->EPIDIDYMIS->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitals_history_list->EPIDIDYMIS->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history_list->Varicocele->Visible) { // Varicocele ?>
	<?php if ($ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->Varicocele) == "") { ?>
		<th data-name="Varicocele" class="<?php echo $ivf_vitals_history_list->Varicocele->headerCellClass() ?>"><div id="elh_ivf_vitals_history_Varicocele" class="ivf_vitals_history_Varicocele"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->Varicocele->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Varicocele" class="<?php echo $ivf_vitals_history_list->Varicocele->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->Varicocele) ?>', 1);"><div id="elh_ivf_vitals_history_Varicocele" class="ivf_vitals_history_Varicocele">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->Varicocele->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history_list->Varicocele->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitals_history_list->Varicocele->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history_list->FamilyHistory->Visible) { // FamilyHistory ?>
	<?php if ($ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->FamilyHistory) == "") { ?>
		<th data-name="FamilyHistory" class="<?php echo $ivf_vitals_history_list->FamilyHistory->headerCellClass() ?>"><div id="elh_ivf_vitals_history_FamilyHistory" class="ivf_vitals_history_FamilyHistory"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->FamilyHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FamilyHistory" class="<?php echo $ivf_vitals_history_list->FamilyHistory->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->FamilyHistory) ?>', 1);"><div id="elh_ivf_vitals_history_FamilyHistory" class="ivf_vitals_history_FamilyHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->FamilyHistory->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history_list->FamilyHistory->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitals_history_list->FamilyHistory->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history_list->Addictions->Visible) { // Addictions ?>
	<?php if ($ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->Addictions) == "") { ?>
		<th data-name="Addictions" class="<?php echo $ivf_vitals_history_list->Addictions->headerCellClass() ?>"><div id="elh_ivf_vitals_history_Addictions" class="ivf_vitals_history_Addictions"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->Addictions->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Addictions" class="<?php echo $ivf_vitals_history_list->Addictions->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->Addictions) ?>', 1);"><div id="elh_ivf_vitals_history_Addictions" class="ivf_vitals_history_Addictions">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->Addictions->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history_list->Addictions->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitals_history_list->Addictions->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history_list->Medical->Visible) { // Medical ?>
	<?php if ($ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->Medical) == "") { ?>
		<th data-name="Medical" class="<?php echo $ivf_vitals_history_list->Medical->headerCellClass() ?>"><div id="elh_ivf_vitals_history_Medical" class="ivf_vitals_history_Medical"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->Medical->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Medical" class="<?php echo $ivf_vitals_history_list->Medical->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->Medical) ?>', 1);"><div id="elh_ivf_vitals_history_Medical" class="ivf_vitals_history_Medical">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->Medical->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history_list->Medical->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitals_history_list->Medical->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history_list->Surgical->Visible) { // Surgical ?>
	<?php if ($ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->Surgical) == "") { ?>
		<th data-name="Surgical" class="<?php echo $ivf_vitals_history_list->Surgical->headerCellClass() ?>"><div id="elh_ivf_vitals_history_Surgical" class="ivf_vitals_history_Surgical"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->Surgical->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Surgical" class="<?php echo $ivf_vitals_history_list->Surgical->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->Surgical) ?>', 1);"><div id="elh_ivf_vitals_history_Surgical" class="ivf_vitals_history_Surgical">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->Surgical->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history_list->Surgical->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitals_history_list->Surgical->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history_list->CoitalHistory->Visible) { // CoitalHistory ?>
	<?php if ($ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->CoitalHistory) == "") { ?>
		<th data-name="CoitalHistory" class="<?php echo $ivf_vitals_history_list->CoitalHistory->headerCellClass() ?>"><div id="elh_ivf_vitals_history_CoitalHistory" class="ivf_vitals_history_CoitalHistory"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->CoitalHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CoitalHistory" class="<?php echo $ivf_vitals_history_list->CoitalHistory->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->CoitalHistory) ?>', 1);"><div id="elh_ivf_vitals_history_CoitalHistory" class="ivf_vitals_history_CoitalHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->CoitalHistory->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history_list->CoitalHistory->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitals_history_list->CoitalHistory->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history_list->MariedFor->Visible) { // MariedFor ?>
	<?php if ($ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->MariedFor) == "") { ?>
		<th data-name="MariedFor" class="<?php echo $ivf_vitals_history_list->MariedFor->headerCellClass() ?>"><div id="elh_ivf_vitals_history_MariedFor" class="ivf_vitals_history_MariedFor"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->MariedFor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MariedFor" class="<?php echo $ivf_vitals_history_list->MariedFor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->MariedFor) ?>', 1);"><div id="elh_ivf_vitals_history_MariedFor" class="ivf_vitals_history_MariedFor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->MariedFor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history_list->MariedFor->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitals_history_list->MariedFor->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history_list->CMNCM->Visible) { // CMNCM ?>
	<?php if ($ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->CMNCM) == "") { ?>
		<th data-name="CMNCM" class="<?php echo $ivf_vitals_history_list->CMNCM->headerCellClass() ?>"><div id="elh_ivf_vitals_history_CMNCM" class="ivf_vitals_history_CMNCM"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->CMNCM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CMNCM" class="<?php echo $ivf_vitals_history_list->CMNCM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->CMNCM) ?>', 1);"><div id="elh_ivf_vitals_history_CMNCM" class="ivf_vitals_history_CMNCM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->CMNCM->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history_list->CMNCM->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitals_history_list->CMNCM->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history_list->TidNo->Visible) { // TidNo ?>
	<?php if ($ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->TidNo) == "") { ?>
		<th data-name="TidNo" class="<?php echo $ivf_vitals_history_list->TidNo->headerCellClass() ?>"><div id="elh_ivf_vitals_history_TidNo" class="ivf_vitals_history_TidNo"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->TidNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TidNo" class="<?php echo $ivf_vitals_history_list->TidNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->TidNo) ?>', 1);"><div id="elh_ivf_vitals_history_TidNo" class="ivf_vitals_history_TidNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->TidNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history_list->TidNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitals_history_list->TidNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitals_history_list->pFamilyHistory->Visible) { // pFamilyHistory ?>
	<?php if ($ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->pFamilyHistory) == "") { ?>
		<th data-name="pFamilyHistory" class="<?php echo $ivf_vitals_history_list->pFamilyHistory->headerCellClass() ?>"><div id="elh_ivf_vitals_history_pFamilyHistory" class="ivf_vitals_history_pFamilyHistory"><div class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->pFamilyHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pFamilyHistory" class="<?php echo $ivf_vitals_history_list->pFamilyHistory->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_vitals_history_list->SortUrl($ivf_vitals_history_list->pFamilyHistory) ?>', 1);"><div id="elh_ivf_vitals_history_pFamilyHistory" class="ivf_vitals_history_pFamilyHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitals_history_list->pFamilyHistory->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitals_history_list->pFamilyHistory->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_vitals_history_list->pFamilyHistory->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$ivf_vitals_history_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($ivf_vitals_history_list->ExportAll && $ivf_vitals_history_list->isExport()) {
	$ivf_vitals_history_list->StopRecord = $ivf_vitals_history_list->TotalRecords;
} else {

	// Set the last record to display
	if ($ivf_vitals_history_list->TotalRecords > $ivf_vitals_history_list->StartRecord + $ivf_vitals_history_list->DisplayRecords - 1)
		$ivf_vitals_history_list->StopRecord = $ivf_vitals_history_list->StartRecord + $ivf_vitals_history_list->DisplayRecords - 1;
	else
		$ivf_vitals_history_list->StopRecord = $ivf_vitals_history_list->TotalRecords;
}
$ivf_vitals_history_list->RecordCount = $ivf_vitals_history_list->StartRecord - 1;
if ($ivf_vitals_history_list->Recordset && !$ivf_vitals_history_list->Recordset->EOF) {
	$ivf_vitals_history_list->Recordset->moveFirst();
	$selectLimit = $ivf_vitals_history_list->UseSelectLimit;
	if (!$selectLimit && $ivf_vitals_history_list->StartRecord > 1)
		$ivf_vitals_history_list->Recordset->move($ivf_vitals_history_list->StartRecord - 1);
} elseif (!$ivf_vitals_history->AllowAddDeleteRow && $ivf_vitals_history_list->StopRecord == 0) {
	$ivf_vitals_history_list->StopRecord = $ivf_vitals_history->GridAddRowCount;
}

// Initialize aggregate
$ivf_vitals_history->RowType = ROWTYPE_AGGREGATEINIT;
$ivf_vitals_history->resetAttributes();
$ivf_vitals_history_list->renderRow();
while ($ivf_vitals_history_list->RecordCount < $ivf_vitals_history_list->StopRecord) {
	$ivf_vitals_history_list->RecordCount++;
	if ($ivf_vitals_history_list->RecordCount >= $ivf_vitals_history_list->StartRecord) {
		$ivf_vitals_history_list->RowCount++;

		// Set up key count
		$ivf_vitals_history_list->KeyCount = $ivf_vitals_history_list->RowIndex;

		// Init row class and style
		$ivf_vitals_history->resetAttributes();
		$ivf_vitals_history->CssClass = "";
		if ($ivf_vitals_history_list->isGridAdd()) {
		} else {
			$ivf_vitals_history_list->loadRowValues($ivf_vitals_history_list->Recordset); // Load row values
		}
		$ivf_vitals_history->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$ivf_vitals_history->RowAttrs->merge(["data-rowindex" => $ivf_vitals_history_list->RowCount, "id" => "r" . $ivf_vitals_history_list->RowCount . "_ivf_vitals_history", "data-rowtype" => $ivf_vitals_history->RowType]);

		// Render row
		$ivf_vitals_history_list->renderRow();

		// Render list options
		$ivf_vitals_history_list->renderListOptions();
?>
	<tr <?php echo $ivf_vitals_history->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_vitals_history_list->ListOptions->render("body", "left", $ivf_vitals_history_list->RowCount);
?>
	<?php if ($ivf_vitals_history_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $ivf_vitals_history_list->id->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_list->RowCount ?>_ivf_vitals_history_id">
<span<?php echo $ivf_vitals_history_list->id->viewAttributes() ?>><?php echo $ivf_vitals_history_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history_list->RIDNO->Visible) { // RIDNO ?>
		<td data-name="RIDNO" <?php echo $ivf_vitals_history_list->RIDNO->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_list->RowCount ?>_ivf_vitals_history_RIDNO">
<span<?php echo $ivf_vitals_history_list->RIDNO->viewAttributes() ?>><?php echo $ivf_vitals_history_list->RIDNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history_list->Name->Visible) { // Name ?>
		<td data-name="Name" <?php echo $ivf_vitals_history_list->Name->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_list->RowCount ?>_ivf_vitals_history_Name">
<span<?php echo $ivf_vitals_history_list->Name->viewAttributes() ?>><?php echo $ivf_vitals_history_list->Name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history_list->Age->Visible) { // Age ?>
		<td data-name="Age" <?php echo $ivf_vitals_history_list->Age->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_list->RowCount ?>_ivf_vitals_history_Age">
<span<?php echo $ivf_vitals_history_list->Age->viewAttributes() ?>><?php echo $ivf_vitals_history_list->Age->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history_list->SEX->Visible) { // SEX ?>
		<td data-name="SEX" <?php echo $ivf_vitals_history_list->SEX->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_list->RowCount ?>_ivf_vitals_history_SEX">
<span<?php echo $ivf_vitals_history_list->SEX->viewAttributes() ?>><?php echo $ivf_vitals_history_list->SEX->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history_list->Religion->Visible) { // Religion ?>
		<td data-name="Religion" <?php echo $ivf_vitals_history_list->Religion->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_list->RowCount ?>_ivf_vitals_history_Religion">
<span<?php echo $ivf_vitals_history_list->Religion->viewAttributes() ?>><?php echo $ivf_vitals_history_list->Religion->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history_list->Address->Visible) { // Address ?>
		<td data-name="Address" <?php echo $ivf_vitals_history_list->Address->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_list->RowCount ?>_ivf_vitals_history_Address">
<span<?php echo $ivf_vitals_history_list->Address->viewAttributes() ?>><?php echo $ivf_vitals_history_list->Address->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history_list->IdentificationMark->Visible) { // IdentificationMark ?>
		<td data-name="IdentificationMark" <?php echo $ivf_vitals_history_list->IdentificationMark->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_list->RowCount ?>_ivf_vitals_history_IdentificationMark">
<span<?php echo $ivf_vitals_history_list->IdentificationMark->viewAttributes() ?>><?php echo $ivf_vitals_history_list->IdentificationMark->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history_list->DoublewitnessName1->Visible) { // DoublewitnessName1 ?>
		<td data-name="DoublewitnessName1" <?php echo $ivf_vitals_history_list->DoublewitnessName1->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_list->RowCount ?>_ivf_vitals_history_DoublewitnessName1">
<span<?php echo $ivf_vitals_history_list->DoublewitnessName1->viewAttributes() ?>><?php echo $ivf_vitals_history_list->DoublewitnessName1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history_list->DoublewitnessName2->Visible) { // DoublewitnessName2 ?>
		<td data-name="DoublewitnessName2" <?php echo $ivf_vitals_history_list->DoublewitnessName2->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_list->RowCount ?>_ivf_vitals_history_DoublewitnessName2">
<span<?php echo $ivf_vitals_history_list->DoublewitnessName2->viewAttributes() ?>><?php echo $ivf_vitals_history_list->DoublewitnessName2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history_list->Chiefcomplaints->Visible) { // Chiefcomplaints ?>
		<td data-name="Chiefcomplaints" <?php echo $ivf_vitals_history_list->Chiefcomplaints->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_list->RowCount ?>_ivf_vitals_history_Chiefcomplaints">
<span<?php echo $ivf_vitals_history_list->Chiefcomplaints->viewAttributes() ?>><?php echo $ivf_vitals_history_list->Chiefcomplaints->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history_list->MenstrualHistory->Visible) { // MenstrualHistory ?>
		<td data-name="MenstrualHistory" <?php echo $ivf_vitals_history_list->MenstrualHistory->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_list->RowCount ?>_ivf_vitals_history_MenstrualHistory">
<span<?php echo $ivf_vitals_history_list->MenstrualHistory->viewAttributes() ?>><?php echo $ivf_vitals_history_list->MenstrualHistory->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history_list->ObstetricHistory->Visible) { // ObstetricHistory ?>
		<td data-name="ObstetricHistory" <?php echo $ivf_vitals_history_list->ObstetricHistory->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_list->RowCount ?>_ivf_vitals_history_ObstetricHistory">
<span<?php echo $ivf_vitals_history_list->ObstetricHistory->viewAttributes() ?>><?php echo $ivf_vitals_history_list->ObstetricHistory->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history_list->MedicalHistory->Visible) { // MedicalHistory ?>
		<td data-name="MedicalHistory" <?php echo $ivf_vitals_history_list->MedicalHistory->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_list->RowCount ?>_ivf_vitals_history_MedicalHistory">
<span<?php echo $ivf_vitals_history_list->MedicalHistory->viewAttributes() ?>><?php echo $ivf_vitals_history_list->MedicalHistory->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history_list->SurgicalHistory->Visible) { // SurgicalHistory ?>
		<td data-name="SurgicalHistory" <?php echo $ivf_vitals_history_list->SurgicalHistory->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_list->RowCount ?>_ivf_vitals_history_SurgicalHistory">
<span<?php echo $ivf_vitals_history_list->SurgicalHistory->viewAttributes() ?>><?php echo $ivf_vitals_history_list->SurgicalHistory->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history_list->Generalexaminationpallor->Visible) { // Generalexaminationpallor ?>
		<td data-name="Generalexaminationpallor" <?php echo $ivf_vitals_history_list->Generalexaminationpallor->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_list->RowCount ?>_ivf_vitals_history_Generalexaminationpallor">
<span<?php echo $ivf_vitals_history_list->Generalexaminationpallor->viewAttributes() ?>><?php echo $ivf_vitals_history_list->Generalexaminationpallor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history_list->PR->Visible) { // PR ?>
		<td data-name="PR" <?php echo $ivf_vitals_history_list->PR->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_list->RowCount ?>_ivf_vitals_history_PR">
<span<?php echo $ivf_vitals_history_list->PR->viewAttributes() ?>><?php echo $ivf_vitals_history_list->PR->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history_list->CVS->Visible) { // CVS ?>
		<td data-name="CVS" <?php echo $ivf_vitals_history_list->CVS->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_list->RowCount ?>_ivf_vitals_history_CVS">
<span<?php echo $ivf_vitals_history_list->CVS->viewAttributes() ?>><?php echo $ivf_vitals_history_list->CVS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history_list->PA->Visible) { // PA ?>
		<td data-name="PA" <?php echo $ivf_vitals_history_list->PA->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_list->RowCount ?>_ivf_vitals_history_PA">
<span<?php echo $ivf_vitals_history_list->PA->viewAttributes() ?>><?php echo $ivf_vitals_history_list->PA->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history_list->PROVISIONALDIAGNOSIS->Visible) { // PROVISIONALDIAGNOSIS ?>
		<td data-name="PROVISIONALDIAGNOSIS" <?php echo $ivf_vitals_history_list->PROVISIONALDIAGNOSIS->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_list->RowCount ?>_ivf_vitals_history_PROVISIONALDIAGNOSIS">
<span<?php echo $ivf_vitals_history_list->PROVISIONALDIAGNOSIS->viewAttributes() ?>><?php echo $ivf_vitals_history_list->PROVISIONALDIAGNOSIS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history_list->Investigations->Visible) { // Investigations ?>
		<td data-name="Investigations" <?php echo $ivf_vitals_history_list->Investigations->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_list->RowCount ?>_ivf_vitals_history_Investigations">
<span<?php echo $ivf_vitals_history_list->Investigations->viewAttributes() ?>><?php echo $ivf_vitals_history_list->Investigations->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history_list->Fheight->Visible) { // Fheight ?>
		<td data-name="Fheight" <?php echo $ivf_vitals_history_list->Fheight->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_list->RowCount ?>_ivf_vitals_history_Fheight">
<span<?php echo $ivf_vitals_history_list->Fheight->viewAttributes() ?>><?php echo $ivf_vitals_history_list->Fheight->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history_list->Fweight->Visible) { // Fweight ?>
		<td data-name="Fweight" <?php echo $ivf_vitals_history_list->Fweight->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_list->RowCount ?>_ivf_vitals_history_Fweight">
<span<?php echo $ivf_vitals_history_list->Fweight->viewAttributes() ?>><?php echo $ivf_vitals_history_list->Fweight->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history_list->FBMI->Visible) { // FBMI ?>
		<td data-name="FBMI" <?php echo $ivf_vitals_history_list->FBMI->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_list->RowCount ?>_ivf_vitals_history_FBMI">
<span<?php echo $ivf_vitals_history_list->FBMI->viewAttributes() ?>><?php echo $ivf_vitals_history_list->FBMI->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history_list->FBloodgroup->Visible) { // FBloodgroup ?>
		<td data-name="FBloodgroup" <?php echo $ivf_vitals_history_list->FBloodgroup->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_list->RowCount ?>_ivf_vitals_history_FBloodgroup">
<span<?php echo $ivf_vitals_history_list->FBloodgroup->viewAttributes() ?>><?php echo $ivf_vitals_history_list->FBloodgroup->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history_list->Mheight->Visible) { // Mheight ?>
		<td data-name="Mheight" <?php echo $ivf_vitals_history_list->Mheight->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_list->RowCount ?>_ivf_vitals_history_Mheight">
<span<?php echo $ivf_vitals_history_list->Mheight->viewAttributes() ?>><?php echo $ivf_vitals_history_list->Mheight->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history_list->Mweight->Visible) { // Mweight ?>
		<td data-name="Mweight" <?php echo $ivf_vitals_history_list->Mweight->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_list->RowCount ?>_ivf_vitals_history_Mweight">
<span<?php echo $ivf_vitals_history_list->Mweight->viewAttributes() ?>><?php echo $ivf_vitals_history_list->Mweight->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history_list->MBMI->Visible) { // MBMI ?>
		<td data-name="MBMI" <?php echo $ivf_vitals_history_list->MBMI->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_list->RowCount ?>_ivf_vitals_history_MBMI">
<span<?php echo $ivf_vitals_history_list->MBMI->viewAttributes() ?>><?php echo $ivf_vitals_history_list->MBMI->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history_list->MBloodgroup->Visible) { // MBloodgroup ?>
		<td data-name="MBloodgroup" <?php echo $ivf_vitals_history_list->MBloodgroup->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_list->RowCount ?>_ivf_vitals_history_MBloodgroup">
<span<?php echo $ivf_vitals_history_list->MBloodgroup->viewAttributes() ?>><?php echo $ivf_vitals_history_list->MBloodgroup->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history_list->FBuild->Visible) { // FBuild ?>
		<td data-name="FBuild" <?php echo $ivf_vitals_history_list->FBuild->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_list->RowCount ?>_ivf_vitals_history_FBuild">
<span<?php echo $ivf_vitals_history_list->FBuild->viewAttributes() ?>><?php echo $ivf_vitals_history_list->FBuild->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history_list->MBuild->Visible) { // MBuild ?>
		<td data-name="MBuild" <?php echo $ivf_vitals_history_list->MBuild->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_list->RowCount ?>_ivf_vitals_history_MBuild">
<span<?php echo $ivf_vitals_history_list->MBuild->viewAttributes() ?>><?php echo $ivf_vitals_history_list->MBuild->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history_list->FSkinColor->Visible) { // FSkinColor ?>
		<td data-name="FSkinColor" <?php echo $ivf_vitals_history_list->FSkinColor->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_list->RowCount ?>_ivf_vitals_history_FSkinColor">
<span<?php echo $ivf_vitals_history_list->FSkinColor->viewAttributes() ?>><?php echo $ivf_vitals_history_list->FSkinColor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history_list->MSkinColor->Visible) { // MSkinColor ?>
		<td data-name="MSkinColor" <?php echo $ivf_vitals_history_list->MSkinColor->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_list->RowCount ?>_ivf_vitals_history_MSkinColor">
<span<?php echo $ivf_vitals_history_list->MSkinColor->viewAttributes() ?>><?php echo $ivf_vitals_history_list->MSkinColor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history_list->FEyesColor->Visible) { // FEyesColor ?>
		<td data-name="FEyesColor" <?php echo $ivf_vitals_history_list->FEyesColor->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_list->RowCount ?>_ivf_vitals_history_FEyesColor">
<span<?php echo $ivf_vitals_history_list->FEyesColor->viewAttributes() ?>><?php echo $ivf_vitals_history_list->FEyesColor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history_list->MEyesColor->Visible) { // MEyesColor ?>
		<td data-name="MEyesColor" <?php echo $ivf_vitals_history_list->MEyesColor->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_list->RowCount ?>_ivf_vitals_history_MEyesColor">
<span<?php echo $ivf_vitals_history_list->MEyesColor->viewAttributes() ?>><?php echo $ivf_vitals_history_list->MEyesColor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history_list->FHairColor->Visible) { // FHairColor ?>
		<td data-name="FHairColor" <?php echo $ivf_vitals_history_list->FHairColor->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_list->RowCount ?>_ivf_vitals_history_FHairColor">
<span<?php echo $ivf_vitals_history_list->FHairColor->viewAttributes() ?>><?php echo $ivf_vitals_history_list->FHairColor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history_list->MhairColor->Visible) { // MhairColor ?>
		<td data-name="MhairColor" <?php echo $ivf_vitals_history_list->MhairColor->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_list->RowCount ?>_ivf_vitals_history_MhairColor">
<span<?php echo $ivf_vitals_history_list->MhairColor->viewAttributes() ?>><?php echo $ivf_vitals_history_list->MhairColor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history_list->FhairTexture->Visible) { // FhairTexture ?>
		<td data-name="FhairTexture" <?php echo $ivf_vitals_history_list->FhairTexture->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_list->RowCount ?>_ivf_vitals_history_FhairTexture">
<span<?php echo $ivf_vitals_history_list->FhairTexture->viewAttributes() ?>><?php echo $ivf_vitals_history_list->FhairTexture->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history_list->MHairTexture->Visible) { // MHairTexture ?>
		<td data-name="MHairTexture" <?php echo $ivf_vitals_history_list->MHairTexture->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_list->RowCount ?>_ivf_vitals_history_MHairTexture">
<span<?php echo $ivf_vitals_history_list->MHairTexture->viewAttributes() ?>><?php echo $ivf_vitals_history_list->MHairTexture->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history_list->Fothers->Visible) { // Fothers ?>
		<td data-name="Fothers" <?php echo $ivf_vitals_history_list->Fothers->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_list->RowCount ?>_ivf_vitals_history_Fothers">
<span<?php echo $ivf_vitals_history_list->Fothers->viewAttributes() ?>><?php echo $ivf_vitals_history_list->Fothers->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history_list->Mothers->Visible) { // Mothers ?>
		<td data-name="Mothers" <?php echo $ivf_vitals_history_list->Mothers->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_list->RowCount ?>_ivf_vitals_history_Mothers">
<span<?php echo $ivf_vitals_history_list->Mothers->viewAttributes() ?>><?php echo $ivf_vitals_history_list->Mothers->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history_list->PGE->Visible) { // PGE ?>
		<td data-name="PGE" <?php echo $ivf_vitals_history_list->PGE->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_list->RowCount ?>_ivf_vitals_history_PGE">
<span<?php echo $ivf_vitals_history_list->PGE->viewAttributes() ?>><?php echo $ivf_vitals_history_list->PGE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history_list->PPR->Visible) { // PPR ?>
		<td data-name="PPR" <?php echo $ivf_vitals_history_list->PPR->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_list->RowCount ?>_ivf_vitals_history_PPR">
<span<?php echo $ivf_vitals_history_list->PPR->viewAttributes() ?>><?php echo $ivf_vitals_history_list->PPR->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history_list->PBP->Visible) { // PBP ?>
		<td data-name="PBP" <?php echo $ivf_vitals_history_list->PBP->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_list->RowCount ?>_ivf_vitals_history_PBP">
<span<?php echo $ivf_vitals_history_list->PBP->viewAttributes() ?>><?php echo $ivf_vitals_history_list->PBP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history_list->Breast->Visible) { // Breast ?>
		<td data-name="Breast" <?php echo $ivf_vitals_history_list->Breast->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_list->RowCount ?>_ivf_vitals_history_Breast">
<span<?php echo $ivf_vitals_history_list->Breast->viewAttributes() ?>><?php echo $ivf_vitals_history_list->Breast->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history_list->PPA->Visible) { // PPA ?>
		<td data-name="PPA" <?php echo $ivf_vitals_history_list->PPA->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_list->RowCount ?>_ivf_vitals_history_PPA">
<span<?php echo $ivf_vitals_history_list->PPA->viewAttributes() ?>><?php echo $ivf_vitals_history_list->PPA->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history_list->PPSV->Visible) { // PPSV ?>
		<td data-name="PPSV" <?php echo $ivf_vitals_history_list->PPSV->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_list->RowCount ?>_ivf_vitals_history_PPSV">
<span<?php echo $ivf_vitals_history_list->PPSV->viewAttributes() ?>><?php echo $ivf_vitals_history_list->PPSV->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history_list->PPAPSMEAR->Visible) { // PPAPSMEAR ?>
		<td data-name="PPAPSMEAR" <?php echo $ivf_vitals_history_list->PPAPSMEAR->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_list->RowCount ?>_ivf_vitals_history_PPAPSMEAR">
<span<?php echo $ivf_vitals_history_list->PPAPSMEAR->viewAttributes() ?>><?php echo $ivf_vitals_history_list->PPAPSMEAR->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history_list->PTHYROID->Visible) { // PTHYROID ?>
		<td data-name="PTHYROID" <?php echo $ivf_vitals_history_list->PTHYROID->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_list->RowCount ?>_ivf_vitals_history_PTHYROID">
<span<?php echo $ivf_vitals_history_list->PTHYROID->viewAttributes() ?>><?php echo $ivf_vitals_history_list->PTHYROID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history_list->MTHYROID->Visible) { // MTHYROID ?>
		<td data-name="MTHYROID" <?php echo $ivf_vitals_history_list->MTHYROID->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_list->RowCount ?>_ivf_vitals_history_MTHYROID">
<span<?php echo $ivf_vitals_history_list->MTHYROID->viewAttributes() ?>><?php echo $ivf_vitals_history_list->MTHYROID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history_list->SecSexCharacters->Visible) { // SecSexCharacters ?>
		<td data-name="SecSexCharacters" <?php echo $ivf_vitals_history_list->SecSexCharacters->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_list->RowCount ?>_ivf_vitals_history_SecSexCharacters">
<span<?php echo $ivf_vitals_history_list->SecSexCharacters->viewAttributes() ?>><?php echo $ivf_vitals_history_list->SecSexCharacters->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history_list->PenisUM->Visible) { // PenisUM ?>
		<td data-name="PenisUM" <?php echo $ivf_vitals_history_list->PenisUM->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_list->RowCount ?>_ivf_vitals_history_PenisUM">
<span<?php echo $ivf_vitals_history_list->PenisUM->viewAttributes() ?>><?php echo $ivf_vitals_history_list->PenisUM->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history_list->VAS->Visible) { // VAS ?>
		<td data-name="VAS" <?php echo $ivf_vitals_history_list->VAS->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_list->RowCount ?>_ivf_vitals_history_VAS">
<span<?php echo $ivf_vitals_history_list->VAS->viewAttributes() ?>><?php echo $ivf_vitals_history_list->VAS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history_list->EPIDIDYMIS->Visible) { // EPIDIDYMIS ?>
		<td data-name="EPIDIDYMIS" <?php echo $ivf_vitals_history_list->EPIDIDYMIS->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_list->RowCount ?>_ivf_vitals_history_EPIDIDYMIS">
<span<?php echo $ivf_vitals_history_list->EPIDIDYMIS->viewAttributes() ?>><?php echo $ivf_vitals_history_list->EPIDIDYMIS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history_list->Varicocele->Visible) { // Varicocele ?>
		<td data-name="Varicocele" <?php echo $ivf_vitals_history_list->Varicocele->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_list->RowCount ?>_ivf_vitals_history_Varicocele">
<span<?php echo $ivf_vitals_history_list->Varicocele->viewAttributes() ?>><?php echo $ivf_vitals_history_list->Varicocele->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history_list->FamilyHistory->Visible) { // FamilyHistory ?>
		<td data-name="FamilyHistory" <?php echo $ivf_vitals_history_list->FamilyHistory->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_list->RowCount ?>_ivf_vitals_history_FamilyHistory">
<span<?php echo $ivf_vitals_history_list->FamilyHistory->viewAttributes() ?>><?php echo $ivf_vitals_history_list->FamilyHistory->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history_list->Addictions->Visible) { // Addictions ?>
		<td data-name="Addictions" <?php echo $ivf_vitals_history_list->Addictions->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_list->RowCount ?>_ivf_vitals_history_Addictions">
<span<?php echo $ivf_vitals_history_list->Addictions->viewAttributes() ?>><?php echo $ivf_vitals_history_list->Addictions->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history_list->Medical->Visible) { // Medical ?>
		<td data-name="Medical" <?php echo $ivf_vitals_history_list->Medical->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_list->RowCount ?>_ivf_vitals_history_Medical">
<span<?php echo $ivf_vitals_history_list->Medical->viewAttributes() ?>><?php echo $ivf_vitals_history_list->Medical->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history_list->Surgical->Visible) { // Surgical ?>
		<td data-name="Surgical" <?php echo $ivf_vitals_history_list->Surgical->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_list->RowCount ?>_ivf_vitals_history_Surgical">
<span<?php echo $ivf_vitals_history_list->Surgical->viewAttributes() ?>><?php echo $ivf_vitals_history_list->Surgical->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history_list->CoitalHistory->Visible) { // CoitalHistory ?>
		<td data-name="CoitalHistory" <?php echo $ivf_vitals_history_list->CoitalHistory->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_list->RowCount ?>_ivf_vitals_history_CoitalHistory">
<span<?php echo $ivf_vitals_history_list->CoitalHistory->viewAttributes() ?>><?php echo $ivf_vitals_history_list->CoitalHistory->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history_list->MariedFor->Visible) { // MariedFor ?>
		<td data-name="MariedFor" <?php echo $ivf_vitals_history_list->MariedFor->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_list->RowCount ?>_ivf_vitals_history_MariedFor">
<span<?php echo $ivf_vitals_history_list->MariedFor->viewAttributes() ?>><?php echo $ivf_vitals_history_list->MariedFor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history_list->CMNCM->Visible) { // CMNCM ?>
		<td data-name="CMNCM" <?php echo $ivf_vitals_history_list->CMNCM->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_list->RowCount ?>_ivf_vitals_history_CMNCM">
<span<?php echo $ivf_vitals_history_list->CMNCM->viewAttributes() ?>><?php echo $ivf_vitals_history_list->CMNCM->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history_list->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo" <?php echo $ivf_vitals_history_list->TidNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_list->RowCount ?>_ivf_vitals_history_TidNo">
<span<?php echo $ivf_vitals_history_list->TidNo->viewAttributes() ?>><?php echo $ivf_vitals_history_list->TidNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_vitals_history_list->pFamilyHistory->Visible) { // pFamilyHistory ?>
		<td data-name="pFamilyHistory" <?php echo $ivf_vitals_history_list->pFamilyHistory->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_list->RowCount ?>_ivf_vitals_history_pFamilyHistory">
<span<?php echo $ivf_vitals_history_list->pFamilyHistory->viewAttributes() ?>><?php echo $ivf_vitals_history_list->pFamilyHistory->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_vitals_history_list->ListOptions->render("body", "right", $ivf_vitals_history_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$ivf_vitals_history_list->isGridAdd())
		$ivf_vitals_history_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$ivf_vitals_history->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($ivf_vitals_history_list->Recordset)
	$ivf_vitals_history_list->Recordset->Close();
?>
<?php if (!$ivf_vitals_history_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$ivf_vitals_history_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $ivf_vitals_history_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ivf_vitals_history_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($ivf_vitals_history_list->TotalRecords == 0 && !$ivf_vitals_history->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $ivf_vitals_history_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$ivf_vitals_history_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$ivf_vitals_history_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$ivf_vitals_history->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_ivf_vitals_history",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$ivf_vitals_history_list->terminate();
?>