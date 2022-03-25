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
$pres_indicationstable_list = new pres_indicationstable_list();

// Run the page
$pres_indicationstable_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_indicationstable_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$pres_indicationstable_list->isExport()) { ?>
<script>
var fpres_indicationstablelist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fpres_indicationstablelist = currentForm = new ew.Form("fpres_indicationstablelist", "list");
	fpres_indicationstablelist.formKeyCountName = '<?php echo $pres_indicationstable_list->FormKeyCountName ?>';
	loadjs.done("fpres_indicationstablelist");
});
var fpres_indicationstablelistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fpres_indicationstablelistsrch = currentSearchForm = new ew.Form("fpres_indicationstablelistsrch");

	// Dynamic selection lists
	// Filters

	fpres_indicationstablelistsrch.filterList = <?php echo $pres_indicationstable_list->getFilterList() ?>;
	loadjs.done("fpres_indicationstablelistsrch");
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
<?php if (!$pres_indicationstable_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($pres_indicationstable_list->TotalRecords > 0 && $pres_indicationstable_list->ExportOptions->visible()) { ?>
<?php $pres_indicationstable_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($pres_indicationstable_list->ImportOptions->visible()) { ?>
<?php $pres_indicationstable_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($pres_indicationstable_list->SearchOptions->visible()) { ?>
<?php $pres_indicationstable_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($pres_indicationstable_list->FilterOptions->visible()) { ?>
<?php $pres_indicationstable_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$pres_indicationstable_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$pres_indicationstable_list->isExport() && !$pres_indicationstable->CurrentAction) { ?>
<form name="fpres_indicationstablelistsrch" id="fpres_indicationstablelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fpres_indicationstablelistsrch-search-panel" class="<?php echo $pres_indicationstable_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pres_indicationstable">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $pres_indicationstable_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($pres_indicationstable_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($pres_indicationstable_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $pres_indicationstable_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($pres_indicationstable_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($pres_indicationstable_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($pres_indicationstable_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($pres_indicationstable_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $pres_indicationstable_list->showPageHeader(); ?>
<?php
$pres_indicationstable_list->showMessage();
?>
<?php if ($pres_indicationstable_list->TotalRecords > 0 || $pres_indicationstable->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pres_indicationstable_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pres_indicationstable">
<?php if (!$pres_indicationstable_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$pres_indicationstable_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $pres_indicationstable_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pres_indicationstable_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpres_indicationstablelist" id="fpres_indicationstablelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_indicationstable">
<div id="gmp_pres_indicationstable" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($pres_indicationstable_list->TotalRecords > 0 || $pres_indicationstable_list->isGridEdit()) { ?>
<table id="tbl_pres_indicationstablelist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pres_indicationstable->RowType = ROWTYPE_HEADER;

// Render list options
$pres_indicationstable_list->renderListOptions();

// Render list options (header, left)
$pres_indicationstable_list->ListOptions->render("header", "left");
?>
<?php if ($pres_indicationstable_list->Sno->Visible) { // Sno ?>
	<?php if ($pres_indicationstable_list->SortUrl($pres_indicationstable_list->Sno) == "") { ?>
		<th data-name="Sno" class="<?php echo $pres_indicationstable_list->Sno->headerCellClass() ?>"><div id="elh_pres_indicationstable_Sno" class="pres_indicationstable_Sno"><div class="ew-table-header-caption"><?php echo $pres_indicationstable_list->Sno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Sno" class="<?php echo $pres_indicationstable_list->Sno->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_indicationstable_list->SortUrl($pres_indicationstable_list->Sno) ?>', 1);"><div id="elh_pres_indicationstable_Sno" class="pres_indicationstable_Sno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_indicationstable_list->Sno->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_indicationstable_list->Sno->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_indicationstable_list->Sno->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_indicationstable_list->Genericname->Visible) { // Genericname ?>
	<?php if ($pres_indicationstable_list->SortUrl($pres_indicationstable_list->Genericname) == "") { ?>
		<th data-name="Genericname" class="<?php echo $pres_indicationstable_list->Genericname->headerCellClass() ?>"><div id="elh_pres_indicationstable_Genericname" class="pres_indicationstable_Genericname"><div class="ew-table-header-caption"><?php echo $pres_indicationstable_list->Genericname->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Genericname" class="<?php echo $pres_indicationstable_list->Genericname->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_indicationstable_list->SortUrl($pres_indicationstable_list->Genericname) ?>', 1);"><div id="elh_pres_indicationstable_Genericname" class="pres_indicationstable_Genericname">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_indicationstable_list->Genericname->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_indicationstable_list->Genericname->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_indicationstable_list->Genericname->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_indicationstable_list->Indications->Visible) { // Indications ?>
	<?php if ($pres_indicationstable_list->SortUrl($pres_indicationstable_list->Indications) == "") { ?>
		<th data-name="Indications" class="<?php echo $pres_indicationstable_list->Indications->headerCellClass() ?>"><div id="elh_pres_indicationstable_Indications" class="pres_indicationstable_Indications"><div class="ew-table-header-caption"><?php echo $pres_indicationstable_list->Indications->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Indications" class="<?php echo $pres_indicationstable_list->Indications->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_indicationstable_list->SortUrl($pres_indicationstable_list->Indications) ?>', 1);"><div id="elh_pres_indicationstable_Indications" class="pres_indicationstable_Indications">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_indicationstable_list->Indications->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_indicationstable_list->Indications->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_indicationstable_list->Indications->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_indicationstable_list->Category->Visible) { // Category ?>
	<?php if ($pres_indicationstable_list->SortUrl($pres_indicationstable_list->Category) == "") { ?>
		<th data-name="Category" class="<?php echo $pres_indicationstable_list->Category->headerCellClass() ?>"><div id="elh_pres_indicationstable_Category" class="pres_indicationstable_Category"><div class="ew-table-header-caption"><?php echo $pres_indicationstable_list->Category->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Category" class="<?php echo $pres_indicationstable_list->Category->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_indicationstable_list->SortUrl($pres_indicationstable_list->Category) ?>', 1);"><div id="elh_pres_indicationstable_Category" class="pres_indicationstable_Category">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_indicationstable_list->Category->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_indicationstable_list->Category->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_indicationstable_list->Category->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_indicationstable_list->Min_Age->Visible) { // Min_Age ?>
	<?php if ($pres_indicationstable_list->SortUrl($pres_indicationstable_list->Min_Age) == "") { ?>
		<th data-name="Min_Age" class="<?php echo $pres_indicationstable_list->Min_Age->headerCellClass() ?>"><div id="elh_pres_indicationstable_Min_Age" class="pres_indicationstable_Min_Age"><div class="ew-table-header-caption"><?php echo $pres_indicationstable_list->Min_Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Min_Age" class="<?php echo $pres_indicationstable_list->Min_Age->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_indicationstable_list->SortUrl($pres_indicationstable_list->Min_Age) ?>', 1);"><div id="elh_pres_indicationstable_Min_Age" class="pres_indicationstable_Min_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_indicationstable_list->Min_Age->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_indicationstable_list->Min_Age->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_indicationstable_list->Min_Age->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_indicationstable_list->Min_Days->Visible) { // Min_Days ?>
	<?php if ($pres_indicationstable_list->SortUrl($pres_indicationstable_list->Min_Days) == "") { ?>
		<th data-name="Min_Days" class="<?php echo $pres_indicationstable_list->Min_Days->headerCellClass() ?>"><div id="elh_pres_indicationstable_Min_Days" class="pres_indicationstable_Min_Days"><div class="ew-table-header-caption"><?php echo $pres_indicationstable_list->Min_Days->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Min_Days" class="<?php echo $pres_indicationstable_list->Min_Days->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_indicationstable_list->SortUrl($pres_indicationstable_list->Min_Days) ?>', 1);"><div id="elh_pres_indicationstable_Min_Days" class="pres_indicationstable_Min_Days">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_indicationstable_list->Min_Days->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_indicationstable_list->Min_Days->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_indicationstable_list->Min_Days->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_indicationstable_list->Max_Age->Visible) { // Max_Age ?>
	<?php if ($pres_indicationstable_list->SortUrl($pres_indicationstable_list->Max_Age) == "") { ?>
		<th data-name="Max_Age" class="<?php echo $pres_indicationstable_list->Max_Age->headerCellClass() ?>"><div id="elh_pres_indicationstable_Max_Age" class="pres_indicationstable_Max_Age"><div class="ew-table-header-caption"><?php echo $pres_indicationstable_list->Max_Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Max_Age" class="<?php echo $pres_indicationstable_list->Max_Age->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_indicationstable_list->SortUrl($pres_indicationstable_list->Max_Age) ?>', 1);"><div id="elh_pres_indicationstable_Max_Age" class="pres_indicationstable_Max_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_indicationstable_list->Max_Age->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_indicationstable_list->Max_Age->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_indicationstable_list->Max_Age->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_indicationstable_list->Max_Days->Visible) { // Max_Days ?>
	<?php if ($pres_indicationstable_list->SortUrl($pres_indicationstable_list->Max_Days) == "") { ?>
		<th data-name="Max_Days" class="<?php echo $pres_indicationstable_list->Max_Days->headerCellClass() ?>"><div id="elh_pres_indicationstable_Max_Days" class="pres_indicationstable_Max_Days"><div class="ew-table-header-caption"><?php echo $pres_indicationstable_list->Max_Days->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Max_Days" class="<?php echo $pres_indicationstable_list->Max_Days->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_indicationstable_list->SortUrl($pres_indicationstable_list->Max_Days) ?>', 1);"><div id="elh_pres_indicationstable_Max_Days" class="pres_indicationstable_Max_Days">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_indicationstable_list->Max_Days->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_indicationstable_list->Max_Days->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_indicationstable_list->Max_Days->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_indicationstable_list->_Route->Visible) { // Route ?>
	<?php if ($pres_indicationstable_list->SortUrl($pres_indicationstable_list->_Route) == "") { ?>
		<th data-name="_Route" class="<?php echo $pres_indicationstable_list->_Route->headerCellClass() ?>"><div id="elh_pres_indicationstable__Route" class="pres_indicationstable__Route"><div class="ew-table-header-caption"><?php echo $pres_indicationstable_list->_Route->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_Route" class="<?php echo $pres_indicationstable_list->_Route->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_indicationstable_list->SortUrl($pres_indicationstable_list->_Route) ?>', 1);"><div id="elh_pres_indicationstable__Route" class="pres_indicationstable__Route">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_indicationstable_list->_Route->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_indicationstable_list->_Route->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_indicationstable_list->_Route->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_indicationstable_list->Form->Visible) { // Form ?>
	<?php if ($pres_indicationstable_list->SortUrl($pres_indicationstable_list->Form) == "") { ?>
		<th data-name="Form" class="<?php echo $pres_indicationstable_list->Form->headerCellClass() ?>"><div id="elh_pres_indicationstable_Form" class="pres_indicationstable_Form"><div class="ew-table-header-caption"><?php echo $pres_indicationstable_list->Form->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Form" class="<?php echo $pres_indicationstable_list->Form->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_indicationstable_list->SortUrl($pres_indicationstable_list->Form) ?>', 1);"><div id="elh_pres_indicationstable_Form" class="pres_indicationstable_Form">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_indicationstable_list->Form->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_indicationstable_list->Form->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_indicationstable_list->Form->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_indicationstable_list->Min_Dose_Val->Visible) { // Min_Dose_Val ?>
	<?php if ($pres_indicationstable_list->SortUrl($pres_indicationstable_list->Min_Dose_Val) == "") { ?>
		<th data-name="Min_Dose_Val" class="<?php echo $pres_indicationstable_list->Min_Dose_Val->headerCellClass() ?>"><div id="elh_pres_indicationstable_Min_Dose_Val" class="pres_indicationstable_Min_Dose_Val"><div class="ew-table-header-caption"><?php echo $pres_indicationstable_list->Min_Dose_Val->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Min_Dose_Val" class="<?php echo $pres_indicationstable_list->Min_Dose_Val->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_indicationstable_list->SortUrl($pres_indicationstable_list->Min_Dose_Val) ?>', 1);"><div id="elh_pres_indicationstable_Min_Dose_Val" class="pres_indicationstable_Min_Dose_Val">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_indicationstable_list->Min_Dose_Val->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_indicationstable_list->Min_Dose_Val->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_indicationstable_list->Min_Dose_Val->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_indicationstable_list->Min_Dose_Unit->Visible) { // Min_Dose_Unit ?>
	<?php if ($pres_indicationstable_list->SortUrl($pres_indicationstable_list->Min_Dose_Unit) == "") { ?>
		<th data-name="Min_Dose_Unit" class="<?php echo $pres_indicationstable_list->Min_Dose_Unit->headerCellClass() ?>"><div id="elh_pres_indicationstable_Min_Dose_Unit" class="pres_indicationstable_Min_Dose_Unit"><div class="ew-table-header-caption"><?php echo $pres_indicationstable_list->Min_Dose_Unit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Min_Dose_Unit" class="<?php echo $pres_indicationstable_list->Min_Dose_Unit->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_indicationstable_list->SortUrl($pres_indicationstable_list->Min_Dose_Unit) ?>', 1);"><div id="elh_pres_indicationstable_Min_Dose_Unit" class="pres_indicationstable_Min_Dose_Unit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_indicationstable_list->Min_Dose_Unit->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_indicationstable_list->Min_Dose_Unit->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_indicationstable_list->Min_Dose_Unit->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_indicationstable_list->Max_Dose_Val->Visible) { // Max_Dose_Val ?>
	<?php if ($pres_indicationstable_list->SortUrl($pres_indicationstable_list->Max_Dose_Val) == "") { ?>
		<th data-name="Max_Dose_Val" class="<?php echo $pres_indicationstable_list->Max_Dose_Val->headerCellClass() ?>"><div id="elh_pres_indicationstable_Max_Dose_Val" class="pres_indicationstable_Max_Dose_Val"><div class="ew-table-header-caption"><?php echo $pres_indicationstable_list->Max_Dose_Val->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Max_Dose_Val" class="<?php echo $pres_indicationstable_list->Max_Dose_Val->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_indicationstable_list->SortUrl($pres_indicationstable_list->Max_Dose_Val) ?>', 1);"><div id="elh_pres_indicationstable_Max_Dose_Val" class="pres_indicationstable_Max_Dose_Val">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_indicationstable_list->Max_Dose_Val->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_indicationstable_list->Max_Dose_Val->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_indicationstable_list->Max_Dose_Val->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_indicationstable_list->Max_Dose_Unit->Visible) { // Max_Dose_Unit ?>
	<?php if ($pres_indicationstable_list->SortUrl($pres_indicationstable_list->Max_Dose_Unit) == "") { ?>
		<th data-name="Max_Dose_Unit" class="<?php echo $pres_indicationstable_list->Max_Dose_Unit->headerCellClass() ?>"><div id="elh_pres_indicationstable_Max_Dose_Unit" class="pres_indicationstable_Max_Dose_Unit"><div class="ew-table-header-caption"><?php echo $pres_indicationstable_list->Max_Dose_Unit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Max_Dose_Unit" class="<?php echo $pres_indicationstable_list->Max_Dose_Unit->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_indicationstable_list->SortUrl($pres_indicationstable_list->Max_Dose_Unit) ?>', 1);"><div id="elh_pres_indicationstable_Max_Dose_Unit" class="pres_indicationstable_Max_Dose_Unit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_indicationstable_list->Max_Dose_Unit->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_indicationstable_list->Max_Dose_Unit->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_indicationstable_list->Max_Dose_Unit->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_indicationstable_list->Frequency->Visible) { // Frequency ?>
	<?php if ($pres_indicationstable_list->SortUrl($pres_indicationstable_list->Frequency) == "") { ?>
		<th data-name="Frequency" class="<?php echo $pres_indicationstable_list->Frequency->headerCellClass() ?>"><div id="elh_pres_indicationstable_Frequency" class="pres_indicationstable_Frequency"><div class="ew-table-header-caption"><?php echo $pres_indicationstable_list->Frequency->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Frequency" class="<?php echo $pres_indicationstable_list->Frequency->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_indicationstable_list->SortUrl($pres_indicationstable_list->Frequency) ?>', 1);"><div id="elh_pres_indicationstable_Frequency" class="pres_indicationstable_Frequency">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_indicationstable_list->Frequency->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_indicationstable_list->Frequency->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_indicationstable_list->Frequency->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_indicationstable_list->Duration->Visible) { // Duration ?>
	<?php if ($pres_indicationstable_list->SortUrl($pres_indicationstable_list->Duration) == "") { ?>
		<th data-name="Duration" class="<?php echo $pres_indicationstable_list->Duration->headerCellClass() ?>"><div id="elh_pres_indicationstable_Duration" class="pres_indicationstable_Duration"><div class="ew-table-header-caption"><?php echo $pres_indicationstable_list->Duration->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Duration" class="<?php echo $pres_indicationstable_list->Duration->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_indicationstable_list->SortUrl($pres_indicationstable_list->Duration) ?>', 1);"><div id="elh_pres_indicationstable_Duration" class="pres_indicationstable_Duration">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_indicationstable_list->Duration->caption() ?></span><span class="ew-table-header-sort"><?php if ($pres_indicationstable_list->Duration->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_indicationstable_list->Duration->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_indicationstable_list->DWMY->Visible) { // DWMY ?>
	<?php if ($pres_indicationstable_list->SortUrl($pres_indicationstable_list->DWMY) == "") { ?>
		<th data-name="DWMY" class="<?php echo $pres_indicationstable_list->DWMY->headerCellClass() ?>"><div id="elh_pres_indicationstable_DWMY" class="pres_indicationstable_DWMY"><div class="ew-table-header-caption"><?php echo $pres_indicationstable_list->DWMY->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DWMY" class="<?php echo $pres_indicationstable_list->DWMY->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_indicationstable_list->SortUrl($pres_indicationstable_list->DWMY) ?>', 1);"><div id="elh_pres_indicationstable_DWMY" class="pres_indicationstable_DWMY">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_indicationstable_list->DWMY->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_indicationstable_list->DWMY->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_indicationstable_list->DWMY->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_indicationstable_list->Contraindications->Visible) { // Contraindications ?>
	<?php if ($pres_indicationstable_list->SortUrl($pres_indicationstable_list->Contraindications) == "") { ?>
		<th data-name="Contraindications" class="<?php echo $pres_indicationstable_list->Contraindications->headerCellClass() ?>"><div id="elh_pres_indicationstable_Contraindications" class="pres_indicationstable_Contraindications"><div class="ew-table-header-caption"><?php echo $pres_indicationstable_list->Contraindications->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Contraindications" class="<?php echo $pres_indicationstable_list->Contraindications->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_indicationstable_list->SortUrl($pres_indicationstable_list->Contraindications) ?>', 1);"><div id="elh_pres_indicationstable_Contraindications" class="pres_indicationstable_Contraindications">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_indicationstable_list->Contraindications->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_indicationstable_list->Contraindications->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_indicationstable_list->Contraindications->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pres_indicationstable_list->RecStatus->Visible) { // RecStatus ?>
	<?php if ($pres_indicationstable_list->SortUrl($pres_indicationstable_list->RecStatus) == "") { ?>
		<th data-name="RecStatus" class="<?php echo $pres_indicationstable_list->RecStatus->headerCellClass() ?>"><div id="elh_pres_indicationstable_RecStatus" class="pres_indicationstable_RecStatus"><div class="ew-table-header-caption"><?php echo $pres_indicationstable_list->RecStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RecStatus" class="<?php echo $pres_indicationstable_list->RecStatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pres_indicationstable_list->SortUrl($pres_indicationstable_list->RecStatus) ?>', 1);"><div id="elh_pres_indicationstable_RecStatus" class="pres_indicationstable_RecStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pres_indicationstable_list->RecStatus->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pres_indicationstable_list->RecStatus->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pres_indicationstable_list->RecStatus->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pres_indicationstable_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($pres_indicationstable_list->ExportAll && $pres_indicationstable_list->isExport()) {
	$pres_indicationstable_list->StopRecord = $pres_indicationstable_list->TotalRecords;
} else {

	// Set the last record to display
	if ($pres_indicationstable_list->TotalRecords > $pres_indicationstable_list->StartRecord + $pres_indicationstable_list->DisplayRecords - 1)
		$pres_indicationstable_list->StopRecord = $pres_indicationstable_list->StartRecord + $pres_indicationstable_list->DisplayRecords - 1;
	else
		$pres_indicationstable_list->StopRecord = $pres_indicationstable_list->TotalRecords;
}
$pres_indicationstable_list->RecordCount = $pres_indicationstable_list->StartRecord - 1;
if ($pres_indicationstable_list->Recordset && !$pres_indicationstable_list->Recordset->EOF) {
	$pres_indicationstable_list->Recordset->moveFirst();
	$selectLimit = $pres_indicationstable_list->UseSelectLimit;
	if (!$selectLimit && $pres_indicationstable_list->StartRecord > 1)
		$pres_indicationstable_list->Recordset->move($pres_indicationstable_list->StartRecord - 1);
} elseif (!$pres_indicationstable->AllowAddDeleteRow && $pres_indicationstable_list->StopRecord == 0) {
	$pres_indicationstable_list->StopRecord = $pres_indicationstable->GridAddRowCount;
}

// Initialize aggregate
$pres_indicationstable->RowType = ROWTYPE_AGGREGATEINIT;
$pres_indicationstable->resetAttributes();
$pres_indicationstable_list->renderRow();
while ($pres_indicationstable_list->RecordCount < $pres_indicationstable_list->StopRecord) {
	$pres_indicationstable_list->RecordCount++;
	if ($pres_indicationstable_list->RecordCount >= $pres_indicationstable_list->StartRecord) {
		$pres_indicationstable_list->RowCount++;

		// Set up key count
		$pres_indicationstable_list->KeyCount = $pres_indicationstable_list->RowIndex;

		// Init row class and style
		$pres_indicationstable->resetAttributes();
		$pres_indicationstable->CssClass = "";
		if ($pres_indicationstable_list->isGridAdd()) {
		} else {
			$pres_indicationstable_list->loadRowValues($pres_indicationstable_list->Recordset); // Load row values
		}
		$pres_indicationstable->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$pres_indicationstable->RowAttrs->merge(["data-rowindex" => $pres_indicationstable_list->RowCount, "id" => "r" . $pres_indicationstable_list->RowCount . "_pres_indicationstable", "data-rowtype" => $pres_indicationstable->RowType]);

		// Render row
		$pres_indicationstable_list->renderRow();

		// Render list options
		$pres_indicationstable_list->renderListOptions();
?>
	<tr <?php echo $pres_indicationstable->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pres_indicationstable_list->ListOptions->render("body", "left", $pres_indicationstable_list->RowCount);
?>
	<?php if ($pres_indicationstable_list->Sno->Visible) { // Sno ?>
		<td data-name="Sno" <?php echo $pres_indicationstable_list->Sno->cellAttributes() ?>>
<span id="el<?php echo $pres_indicationstable_list->RowCount ?>_pres_indicationstable_Sno">
<span<?php echo $pres_indicationstable_list->Sno->viewAttributes() ?>><?php echo $pres_indicationstable_list->Sno->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_indicationstable_list->Genericname->Visible) { // Genericname ?>
		<td data-name="Genericname" <?php echo $pres_indicationstable_list->Genericname->cellAttributes() ?>>
<span id="el<?php echo $pres_indicationstable_list->RowCount ?>_pres_indicationstable_Genericname">
<span<?php echo $pres_indicationstable_list->Genericname->viewAttributes() ?>><?php echo $pres_indicationstable_list->Genericname->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_indicationstable_list->Indications->Visible) { // Indications ?>
		<td data-name="Indications" <?php echo $pres_indicationstable_list->Indications->cellAttributes() ?>>
<span id="el<?php echo $pres_indicationstable_list->RowCount ?>_pres_indicationstable_Indications">
<span<?php echo $pres_indicationstable_list->Indications->viewAttributes() ?>><?php echo $pres_indicationstable_list->Indications->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_indicationstable_list->Category->Visible) { // Category ?>
		<td data-name="Category" <?php echo $pres_indicationstable_list->Category->cellAttributes() ?>>
<span id="el<?php echo $pres_indicationstable_list->RowCount ?>_pres_indicationstable_Category">
<span<?php echo $pres_indicationstable_list->Category->viewAttributes() ?>><?php echo $pres_indicationstable_list->Category->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_indicationstable_list->Min_Age->Visible) { // Min_Age ?>
		<td data-name="Min_Age" <?php echo $pres_indicationstable_list->Min_Age->cellAttributes() ?>>
<span id="el<?php echo $pres_indicationstable_list->RowCount ?>_pres_indicationstable_Min_Age">
<span<?php echo $pres_indicationstable_list->Min_Age->viewAttributes() ?>><?php echo $pres_indicationstable_list->Min_Age->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_indicationstable_list->Min_Days->Visible) { // Min_Days ?>
		<td data-name="Min_Days" <?php echo $pres_indicationstable_list->Min_Days->cellAttributes() ?>>
<span id="el<?php echo $pres_indicationstable_list->RowCount ?>_pres_indicationstable_Min_Days">
<span<?php echo $pres_indicationstable_list->Min_Days->viewAttributes() ?>><?php echo $pres_indicationstable_list->Min_Days->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_indicationstable_list->Max_Age->Visible) { // Max_Age ?>
		<td data-name="Max_Age" <?php echo $pres_indicationstable_list->Max_Age->cellAttributes() ?>>
<span id="el<?php echo $pres_indicationstable_list->RowCount ?>_pres_indicationstable_Max_Age">
<span<?php echo $pres_indicationstable_list->Max_Age->viewAttributes() ?>><?php echo $pres_indicationstable_list->Max_Age->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_indicationstable_list->Max_Days->Visible) { // Max_Days ?>
		<td data-name="Max_Days" <?php echo $pres_indicationstable_list->Max_Days->cellAttributes() ?>>
<span id="el<?php echo $pres_indicationstable_list->RowCount ?>_pres_indicationstable_Max_Days">
<span<?php echo $pres_indicationstable_list->Max_Days->viewAttributes() ?>><?php echo $pres_indicationstable_list->Max_Days->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_indicationstable_list->_Route->Visible) { // Route ?>
		<td data-name="_Route" <?php echo $pres_indicationstable_list->_Route->cellAttributes() ?>>
<span id="el<?php echo $pres_indicationstable_list->RowCount ?>_pres_indicationstable__Route">
<span<?php echo $pres_indicationstable_list->_Route->viewAttributes() ?>><?php echo $pres_indicationstable_list->_Route->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_indicationstable_list->Form->Visible) { // Form ?>
		<td data-name="Form" <?php echo $pres_indicationstable_list->Form->cellAttributes() ?>>
<span id="el<?php echo $pres_indicationstable_list->RowCount ?>_pres_indicationstable_Form">
<span<?php echo $pres_indicationstable_list->Form->viewAttributes() ?>><?php echo $pres_indicationstable_list->Form->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_indicationstable_list->Min_Dose_Val->Visible) { // Min_Dose_Val ?>
		<td data-name="Min_Dose_Val" <?php echo $pres_indicationstable_list->Min_Dose_Val->cellAttributes() ?>>
<span id="el<?php echo $pres_indicationstable_list->RowCount ?>_pres_indicationstable_Min_Dose_Val">
<span<?php echo $pres_indicationstable_list->Min_Dose_Val->viewAttributes() ?>><?php echo $pres_indicationstable_list->Min_Dose_Val->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_indicationstable_list->Min_Dose_Unit->Visible) { // Min_Dose_Unit ?>
		<td data-name="Min_Dose_Unit" <?php echo $pres_indicationstable_list->Min_Dose_Unit->cellAttributes() ?>>
<span id="el<?php echo $pres_indicationstable_list->RowCount ?>_pres_indicationstable_Min_Dose_Unit">
<span<?php echo $pres_indicationstable_list->Min_Dose_Unit->viewAttributes() ?>><?php echo $pres_indicationstable_list->Min_Dose_Unit->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_indicationstable_list->Max_Dose_Val->Visible) { // Max_Dose_Val ?>
		<td data-name="Max_Dose_Val" <?php echo $pres_indicationstable_list->Max_Dose_Val->cellAttributes() ?>>
<span id="el<?php echo $pres_indicationstable_list->RowCount ?>_pres_indicationstable_Max_Dose_Val">
<span<?php echo $pres_indicationstable_list->Max_Dose_Val->viewAttributes() ?>><?php echo $pres_indicationstable_list->Max_Dose_Val->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_indicationstable_list->Max_Dose_Unit->Visible) { // Max_Dose_Unit ?>
		<td data-name="Max_Dose_Unit" <?php echo $pres_indicationstable_list->Max_Dose_Unit->cellAttributes() ?>>
<span id="el<?php echo $pres_indicationstable_list->RowCount ?>_pres_indicationstable_Max_Dose_Unit">
<span<?php echo $pres_indicationstable_list->Max_Dose_Unit->viewAttributes() ?>><?php echo $pres_indicationstable_list->Max_Dose_Unit->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_indicationstable_list->Frequency->Visible) { // Frequency ?>
		<td data-name="Frequency" <?php echo $pres_indicationstable_list->Frequency->cellAttributes() ?>>
<span id="el<?php echo $pres_indicationstable_list->RowCount ?>_pres_indicationstable_Frequency">
<span<?php echo $pres_indicationstable_list->Frequency->viewAttributes() ?>><?php echo $pres_indicationstable_list->Frequency->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_indicationstable_list->Duration->Visible) { // Duration ?>
		<td data-name="Duration" <?php echo $pres_indicationstable_list->Duration->cellAttributes() ?>>
<span id="el<?php echo $pres_indicationstable_list->RowCount ?>_pres_indicationstable_Duration">
<span<?php echo $pres_indicationstable_list->Duration->viewAttributes() ?>><?php echo $pres_indicationstable_list->Duration->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_indicationstable_list->DWMY->Visible) { // DWMY ?>
		<td data-name="DWMY" <?php echo $pres_indicationstable_list->DWMY->cellAttributes() ?>>
<span id="el<?php echo $pres_indicationstable_list->RowCount ?>_pres_indicationstable_DWMY">
<span<?php echo $pres_indicationstable_list->DWMY->viewAttributes() ?>><?php echo $pres_indicationstable_list->DWMY->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_indicationstable_list->Contraindications->Visible) { // Contraindications ?>
		<td data-name="Contraindications" <?php echo $pres_indicationstable_list->Contraindications->cellAttributes() ?>>
<span id="el<?php echo $pres_indicationstable_list->RowCount ?>_pres_indicationstable_Contraindications">
<span<?php echo $pres_indicationstable_list->Contraindications->viewAttributes() ?>><?php echo $pres_indicationstable_list->Contraindications->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pres_indicationstable_list->RecStatus->Visible) { // RecStatus ?>
		<td data-name="RecStatus" <?php echo $pres_indicationstable_list->RecStatus->cellAttributes() ?>>
<span id="el<?php echo $pres_indicationstable_list->RowCount ?>_pres_indicationstable_RecStatus">
<span<?php echo $pres_indicationstable_list->RecStatus->viewAttributes() ?>><?php echo $pres_indicationstable_list->RecStatus->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pres_indicationstable_list->ListOptions->render("body", "right", $pres_indicationstable_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$pres_indicationstable_list->isGridAdd())
		$pres_indicationstable_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$pres_indicationstable->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pres_indicationstable_list->Recordset)
	$pres_indicationstable_list->Recordset->Close();
?>
<?php if (!$pres_indicationstable_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$pres_indicationstable_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $pres_indicationstable_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pres_indicationstable_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pres_indicationstable_list->TotalRecords == 0 && !$pres_indicationstable->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pres_indicationstable_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$pres_indicationstable_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$pres_indicationstable_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$pres_indicationstable->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_pres_indicationstable",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$pres_indicationstable_list->terminate();
?>