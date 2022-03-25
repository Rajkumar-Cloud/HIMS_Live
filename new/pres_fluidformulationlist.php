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
$pres_fluidformulation_list = new pres_fluidformulation_list();

// Run the page
$pres_fluidformulation_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_fluidformulation_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$pres_fluidformulation_list->isExport()) { ?>
<script>
var fpres_fluidformulationlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fpres_fluidformulationlist = currentForm = new ew.Form("fpres_fluidformulationlist", "list");
	fpres_fluidformulationlist.formKeyCountName = '<?php echo $pres_fluidformulation_list->FormKeyCountName ?>';
	loadjs.done("fpres_fluidformulationlist");
});
var fpres_fluidformulationlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fpres_fluidformulationlistsrch = currentSearchForm = new ew.Form("fpres_fluidformulationlistsrch");

	// Dynamic selection lists
	// Filters

	fpres_fluidformulationlistsrch.filterList = <?php echo $pres_fluidformulation_list->getFilterList() ?>;
	loadjs.done("fpres_fluidformulationlistsrch");
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
<?php if (!$pres_fluidformulation_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($pres_fluidformulation_list->TotalRecords > 0 && $pres_fluidformulation_list->ExportOptions->visible()) { ?>
<?php $pres_fluidformulation_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($pres_fluidformulation_list->ImportOptions->visible()) { ?>
<?php $pres_fluidformulation_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($pres_fluidformulation_list->SearchOptions->visible()) { ?>
<?php $pres_fluidformulation_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($pres_fluidformulation_list->FilterOptions->visible()) { ?>
<?php $pres_fluidformulation_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$pres_fluidformulation_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$pres_fluidformulation_list->isExport() && !$pres_fluidformulation->CurrentAction) { ?>
<form name="fpres_fluidformulationlistsrch" id="fpres_fluidformulationlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fpres_fluidformulationlistsrch-search-panel" class="<?php echo $pres_fluidformulation_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pres_fluidformulation">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $pres_fluidformulation_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($pres_fluidformulation_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($pres_fluidformulation_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $pres_fluidformulation_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($pres_fluidformulation_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($pres_fluidformulation_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($pres_fluidformulation_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($pres_fluidformulation_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $pres_fluidformulation_list->showPageHeader(); ?>
<?php
$pres_fluidformulation_list->showMessage();
?>
<?php if ($pres_fluidformulation_list->TotalRecords > 0 || $pres_fluidformulation->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pres_fluidformulation_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pres_fluidformulation">
<?php if (!$pres_fluidformulation_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$pres_fluidformulation_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $pres_fluidformulation_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pres_fluidformulation_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpres_fluidformulationlist" id="fpres_fluidformulationlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_fluidformulation">
<div id="gmp_pres_fluidformulation" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($pres_fluidformulation_list->TotalRecords > 0 || $pres_fluidformulation_list->isGridEdit()) { ?>
<table id="tbl_pres_fluidformulationlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pres_fluidformulation->RowType = ROWTYPE_HEADER;

// Render list options
$pres_fluidformulation_list->renderListOptions();

// Render list options (header, left)
$pres_fluidformulation_list->ListOptions->render("header", "left");
?>
<?php if ($pres_fluidformulation_list->id->Visible) { // id ?>
	<?php if ($pres_fluidformulation_list->SortUrl($pres_fluidformulation_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $pres_fluidformulation_list->id->headerCellClass() ?>"><div id="elh_pres_fluidformulation_id" class="pres_fluidformulation_id"><div class="ew-table-header-caption"><?php echo $pres_fluidformulation_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $pres_fluidformulation_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_fluidformulation_list->SortUrl($pres_fluidformulation_list->id) ?>', 1);"><div id="elh_pres_fluidformulation_id" class="pres_fluidformulation_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_fluidformulation_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_fluidformulation_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_fluidformulation_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_fluidformulation_list->Tradename->Visible) { // Tradename ?>
	<?php if ($pres_fluidformulation_list->SortUrl($pres_fluidformulation_list->Tradename) == "") { ?>
		<th data-name="Tradename" class="<?php echo $pres_fluidformulation_list->Tradename->headerCellClass() ?>"><div id="elh_pres_fluidformulation_Tradename" class="pres_fluidformulation_Tradename"><div class="ew-table-header-caption"><?php echo $pres_fluidformulation_list->Tradename->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tradename" class="<?php echo $pres_fluidformulation_list->Tradename->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_fluidformulation_list->SortUrl($pres_fluidformulation_list->Tradename) ?>', 1);"><div id="elh_pres_fluidformulation_Tradename" class="pres_fluidformulation_Tradename">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_fluidformulation_list->Tradename->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_fluidformulation_list->Tradename->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_fluidformulation_list->Tradename->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_fluidformulation_list->Itemcode->Visible) { // Itemcode ?>
	<?php if ($pres_fluidformulation_list->SortUrl($pres_fluidformulation_list->Itemcode) == "") { ?>
		<th data-name="Itemcode" class="<?php echo $pres_fluidformulation_list->Itemcode->headerCellClass() ?>"><div id="elh_pres_fluidformulation_Itemcode" class="pres_fluidformulation_Itemcode"><div class="ew-table-header-caption"><?php echo $pres_fluidformulation_list->Itemcode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Itemcode" class="<?php echo $pres_fluidformulation_list->Itemcode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_fluidformulation_list->SortUrl($pres_fluidformulation_list->Itemcode) ?>', 1);"><div id="elh_pres_fluidformulation_Itemcode" class="pres_fluidformulation_Itemcode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_fluidformulation_list->Itemcode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_fluidformulation_list->Itemcode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_fluidformulation_list->Itemcode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_fluidformulation_list->Genericname->Visible) { // Genericname ?>
	<?php if ($pres_fluidformulation_list->SortUrl($pres_fluidformulation_list->Genericname) == "") { ?>
		<th data-name="Genericname" class="<?php echo $pres_fluidformulation_list->Genericname->headerCellClass() ?>"><div id="elh_pres_fluidformulation_Genericname" class="pres_fluidformulation_Genericname"><div class="ew-table-header-caption"><?php echo $pres_fluidformulation_list->Genericname->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Genericname" class="<?php echo $pres_fluidformulation_list->Genericname->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_fluidformulation_list->SortUrl($pres_fluidformulation_list->Genericname) ?>', 1);"><div id="elh_pres_fluidformulation_Genericname" class="pres_fluidformulation_Genericname">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_fluidformulation_list->Genericname->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_fluidformulation_list->Genericname->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_fluidformulation_list->Genericname->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_fluidformulation_list->Volume->Visible) { // Volume ?>
	<?php if ($pres_fluidformulation_list->SortUrl($pres_fluidformulation_list->Volume) == "") { ?>
		<th data-name="Volume" class="<?php echo $pres_fluidformulation_list->Volume->headerCellClass() ?>"><div id="elh_pres_fluidformulation_Volume" class="pres_fluidformulation_Volume"><div class="ew-table-header-caption"><?php echo $pres_fluidformulation_list->Volume->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Volume" class="<?php echo $pres_fluidformulation_list->Volume->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_fluidformulation_list->SortUrl($pres_fluidformulation_list->Volume) ?>', 1);"><div id="elh_pres_fluidformulation_Volume" class="pres_fluidformulation_Volume">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_fluidformulation_list->Volume->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_fluidformulation_list->Volume->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_fluidformulation_list->Volume->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_fluidformulation_list->VolumeUnit->Visible) { // VolumeUnit ?>
	<?php if ($pres_fluidformulation_list->SortUrl($pres_fluidformulation_list->VolumeUnit) == "") { ?>
		<th data-name="VolumeUnit" class="<?php echo $pres_fluidformulation_list->VolumeUnit->headerCellClass() ?>"><div id="elh_pres_fluidformulation_VolumeUnit" class="pres_fluidformulation_VolumeUnit"><div class="ew-table-header-caption"><?php echo $pres_fluidformulation_list->VolumeUnit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="VolumeUnit" class="<?php echo $pres_fluidformulation_list->VolumeUnit->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_fluidformulation_list->SortUrl($pres_fluidformulation_list->VolumeUnit) ?>', 1);"><div id="elh_pres_fluidformulation_VolumeUnit" class="pres_fluidformulation_VolumeUnit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_fluidformulation_list->VolumeUnit->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_fluidformulation_list->VolumeUnit->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_fluidformulation_list->VolumeUnit->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_fluidformulation_list->Strength->Visible) { // Strength ?>
	<?php if ($pres_fluidformulation_list->SortUrl($pres_fluidformulation_list->Strength) == "") { ?>
		<th data-name="Strength" class="<?php echo $pres_fluidformulation_list->Strength->headerCellClass() ?>"><div id="elh_pres_fluidformulation_Strength" class="pres_fluidformulation_Strength"><div class="ew-table-header-caption"><?php echo $pres_fluidformulation_list->Strength->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Strength" class="<?php echo $pres_fluidformulation_list->Strength->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_fluidformulation_list->SortUrl($pres_fluidformulation_list->Strength) ?>', 1);"><div id="elh_pres_fluidformulation_Strength" class="pres_fluidformulation_Strength">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_fluidformulation_list->Strength->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_fluidformulation_list->Strength->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_fluidformulation_list->Strength->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_fluidformulation_list->StrengthUnit->Visible) { // StrengthUnit ?>
	<?php if ($pres_fluidformulation_list->SortUrl($pres_fluidformulation_list->StrengthUnit) == "") { ?>
		<th data-name="StrengthUnit" class="<?php echo $pres_fluidformulation_list->StrengthUnit->headerCellClass() ?>"><div id="elh_pres_fluidformulation_StrengthUnit" class="pres_fluidformulation_StrengthUnit"><div class="ew-table-header-caption"><?php echo $pres_fluidformulation_list->StrengthUnit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StrengthUnit" class="<?php echo $pres_fluidformulation_list->StrengthUnit->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_fluidformulation_list->SortUrl($pres_fluidformulation_list->StrengthUnit) ?>', 1);"><div id="elh_pres_fluidformulation_StrengthUnit" class="pres_fluidformulation_StrengthUnit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_fluidformulation_list->StrengthUnit->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_fluidformulation_list->StrengthUnit->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_fluidformulation_list->StrengthUnit->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_fluidformulation_list->_Route->Visible) { // Route ?>
	<?php if ($pres_fluidformulation_list->SortUrl($pres_fluidformulation_list->_Route) == "") { ?>
		<th data-name="_Route" class="<?php echo $pres_fluidformulation_list->_Route->headerCellClass() ?>"><div id="elh_pres_fluidformulation__Route" class="pres_fluidformulation__Route"><div class="ew-table-header-caption"><?php echo $pres_fluidformulation_list->_Route->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_Route" class="<?php echo $pres_fluidformulation_list->_Route->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_fluidformulation_list->SortUrl($pres_fluidformulation_list->_Route) ?>', 1);"><div id="elh_pres_fluidformulation__Route" class="pres_fluidformulation__Route">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_fluidformulation_list->_Route->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_fluidformulation_list->_Route->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_fluidformulation_list->_Route->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_fluidformulation_list->Forms->Visible) { // Forms ?>
	<?php if ($pres_fluidformulation_list->SortUrl($pres_fluidformulation_list->Forms) == "") { ?>
		<th data-name="Forms" class="<?php echo $pres_fluidformulation_list->Forms->headerCellClass() ?>"><div id="elh_pres_fluidformulation_Forms" class="pres_fluidformulation_Forms"><div class="ew-table-header-caption"><?php echo $pres_fluidformulation_list->Forms->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Forms" class="<?php echo $pres_fluidformulation_list->Forms->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_fluidformulation_list->SortUrl($pres_fluidformulation_list->Forms) ?>', 1);"><div id="elh_pres_fluidformulation_Forms" class="pres_fluidformulation_Forms">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_fluidformulation_list->Forms->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_fluidformulation_list->Forms->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_fluidformulation_list->Forms->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pres_fluidformulation_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($pres_fluidformulation_list->ExportAll && $pres_fluidformulation_list->isExport()) {
	$pres_fluidformulation_list->StopRecord = $pres_fluidformulation_list->TotalRecords;
} else {

	// Set the last record to display
	if ($pres_fluidformulation_list->TotalRecords > $pres_fluidformulation_list->StartRecord + $pres_fluidformulation_list->DisplayRecords - 1)
		$pres_fluidformulation_list->StopRecord = $pres_fluidformulation_list->StartRecord + $pres_fluidformulation_list->DisplayRecords - 1;
	else
		$pres_fluidformulation_list->StopRecord = $pres_fluidformulation_list->TotalRecords;
}
$pres_fluidformulation_list->RecordCount = $pres_fluidformulation_list->StartRecord - 1;
if ($pres_fluidformulation_list->Recordset && !$pres_fluidformulation_list->Recordset->EOF) {
	$pres_fluidformulation_list->Recordset->moveFirst();
	$selectLimit = $pres_fluidformulation_list->UseSelectLimit;
	if (!$selectLimit && $pres_fluidformulation_list->StartRecord > 1)
		$pres_fluidformulation_list->Recordset->move($pres_fluidformulation_list->StartRecord - 1);
} elseif (!$pres_fluidformulation->AllowAddDeleteRow && $pres_fluidformulation_list->StopRecord == 0) {
	$pres_fluidformulation_list->StopRecord = $pres_fluidformulation->GridAddRowCount;
}

// Initialize aggregate
$pres_fluidformulation->RowType = ROWTYPE_AGGREGATEINIT;
$pres_fluidformulation->resetAttributes();
$pres_fluidformulation_list->renderRow();
while ($pres_fluidformulation_list->RecordCount < $pres_fluidformulation_list->StopRecord) {
	$pres_fluidformulation_list->RecordCount++;
	if ($pres_fluidformulation_list->RecordCount >= $pres_fluidformulation_list->StartRecord) {
		$pres_fluidformulation_list->RowCount++;

		// Set up key count
		$pres_fluidformulation_list->KeyCount = $pres_fluidformulation_list->RowIndex;

		// Init row class and style
		$pres_fluidformulation->resetAttributes();
		$pres_fluidformulation->CssClass = "";
		if ($pres_fluidformulation_list->isGridAdd()) {
		} else {
			$pres_fluidformulation_list->loadRowValues($pres_fluidformulation_list->Recordset); // Load row values
		}
		$pres_fluidformulation->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$pres_fluidformulation->RowAttrs->merge(["data-rowindex" => $pres_fluidformulation_list->RowCount, "id" => "r" . $pres_fluidformulation_list->RowCount . "_pres_fluidformulation", "data-rowtype" => $pres_fluidformulation->RowType]);

		// Render row
		$pres_fluidformulation_list->renderRow();

		// Render list options
		$pres_fluidformulation_list->renderListOptions();
?>
	<tr <?php echo $pres_fluidformulation->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pres_fluidformulation_list->ListOptions->render("body", "left", $pres_fluidformulation_list->RowCount);
?>
	<?php if ($pres_fluidformulation_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $pres_fluidformulation_list->id->cellAttributes() ?>>
<span id="el<?php echo $pres_fluidformulation_list->RowCount ?>_pres_fluidformulation_id">
<span<?php echo $pres_fluidformulation_list->id->viewAttributes() ?>><?php echo $pres_fluidformulation_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_fluidformulation_list->Tradename->Visible) { // Tradename ?>
		<td data-name="Tradename" <?php echo $pres_fluidformulation_list->Tradename->cellAttributes() ?>>
<span id="el<?php echo $pres_fluidformulation_list->RowCount ?>_pres_fluidformulation_Tradename">
<span<?php echo $pres_fluidformulation_list->Tradename->viewAttributes() ?>><?php echo $pres_fluidformulation_list->Tradename->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_fluidformulation_list->Itemcode->Visible) { // Itemcode ?>
		<td data-name="Itemcode" <?php echo $pres_fluidformulation_list->Itemcode->cellAttributes() ?>>
<span id="el<?php echo $pres_fluidformulation_list->RowCount ?>_pres_fluidformulation_Itemcode">
<span<?php echo $pres_fluidformulation_list->Itemcode->viewAttributes() ?>><?php echo $pres_fluidformulation_list->Itemcode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_fluidformulation_list->Genericname->Visible) { // Genericname ?>
		<td data-name="Genericname" <?php echo $pres_fluidformulation_list->Genericname->cellAttributes() ?>>
<span id="el<?php echo $pres_fluidformulation_list->RowCount ?>_pres_fluidformulation_Genericname">
<span<?php echo $pres_fluidformulation_list->Genericname->viewAttributes() ?>><?php echo $pres_fluidformulation_list->Genericname->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_fluidformulation_list->Volume->Visible) { // Volume ?>
		<td data-name="Volume" <?php echo $pres_fluidformulation_list->Volume->cellAttributes() ?>>
<span id="el<?php echo $pres_fluidformulation_list->RowCount ?>_pres_fluidformulation_Volume">
<span<?php echo $pres_fluidformulation_list->Volume->viewAttributes() ?>><?php echo $pres_fluidformulation_list->Volume->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_fluidformulation_list->VolumeUnit->Visible) { // VolumeUnit ?>
		<td data-name="VolumeUnit" <?php echo $pres_fluidformulation_list->VolumeUnit->cellAttributes() ?>>
<span id="el<?php echo $pres_fluidformulation_list->RowCount ?>_pres_fluidformulation_VolumeUnit">
<span<?php echo $pres_fluidformulation_list->VolumeUnit->viewAttributes() ?>><?php echo $pres_fluidformulation_list->VolumeUnit->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_fluidformulation_list->Strength->Visible) { // Strength ?>
		<td data-name="Strength" <?php echo $pres_fluidformulation_list->Strength->cellAttributes() ?>>
<span id="el<?php echo $pres_fluidformulation_list->RowCount ?>_pres_fluidformulation_Strength">
<span<?php echo $pres_fluidformulation_list->Strength->viewAttributes() ?>><?php echo $pres_fluidformulation_list->Strength->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_fluidformulation_list->StrengthUnit->Visible) { // StrengthUnit ?>
		<td data-name="StrengthUnit" <?php echo $pres_fluidformulation_list->StrengthUnit->cellAttributes() ?>>
<span id="el<?php echo $pres_fluidformulation_list->RowCount ?>_pres_fluidformulation_StrengthUnit">
<span<?php echo $pres_fluidformulation_list->StrengthUnit->viewAttributes() ?>><?php echo $pres_fluidformulation_list->StrengthUnit->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_fluidformulation_list->_Route->Visible) { // Route ?>
		<td data-name="_Route" <?php echo $pres_fluidformulation_list->_Route->cellAttributes() ?>>
<span id="el<?php echo $pres_fluidformulation_list->RowCount ?>_pres_fluidformulation__Route">
<span<?php echo $pres_fluidformulation_list->_Route->viewAttributes() ?>><?php echo $pres_fluidformulation_list->_Route->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_fluidformulation_list->Forms->Visible) { // Forms ?>
		<td data-name="Forms" <?php echo $pres_fluidformulation_list->Forms->cellAttributes() ?>>
<span id="el<?php echo $pres_fluidformulation_list->RowCount ?>_pres_fluidformulation_Forms">
<span<?php echo $pres_fluidformulation_list->Forms->viewAttributes() ?>><?php echo $pres_fluidformulation_list->Forms->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pres_fluidformulation_list->ListOptions->render("body", "right", $pres_fluidformulation_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$pres_fluidformulation_list->isGridAdd())
		$pres_fluidformulation_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$pres_fluidformulation->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pres_fluidformulation_list->Recordset)
	$pres_fluidformulation_list->Recordset->Close();
?>
<?php if (!$pres_fluidformulation_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$pres_fluidformulation_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $pres_fluidformulation_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pres_fluidformulation_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pres_fluidformulation_list->TotalRecords == 0 && !$pres_fluidformulation->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pres_fluidformulation_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$pres_fluidformulation_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$pres_fluidformulation_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$pres_fluidformulation->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_pres_fluidformulation",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$pres_fluidformulation_list->terminate();
?>