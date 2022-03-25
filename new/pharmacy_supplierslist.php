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
$pharmacy_suppliers_list = new pharmacy_suppliers_list();

// Run the page
$pharmacy_suppliers_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_suppliers_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$pharmacy_suppliers_list->isExport()) { ?>
<script>
var fpharmacy_supplierslist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fpharmacy_supplierslist = currentForm = new ew.Form("fpharmacy_supplierslist", "list");
	fpharmacy_supplierslist.formKeyCountName = '<?php echo $pharmacy_suppliers_list->FormKeyCountName ?>';
	loadjs.done("fpharmacy_supplierslist");
});
var fpharmacy_supplierslistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fpharmacy_supplierslistsrch = currentSearchForm = new ew.Form("fpharmacy_supplierslistsrch");

	// Dynamic selection lists
	// Filters

	fpharmacy_supplierslistsrch.filterList = <?php echo $pharmacy_suppliers_list->getFilterList() ?>;
	loadjs.done("fpharmacy_supplierslistsrch");
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
<?php if (!$pharmacy_suppliers_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($pharmacy_suppliers_list->TotalRecords > 0 && $pharmacy_suppliers_list->ExportOptions->visible()) { ?>
<?php $pharmacy_suppliers_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_suppliers_list->ImportOptions->visible()) { ?>
<?php $pharmacy_suppliers_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_suppliers_list->SearchOptions->visible()) { ?>
<?php $pharmacy_suppliers_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_suppliers_list->FilterOptions->visible()) { ?>
<?php $pharmacy_suppliers_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$pharmacy_suppliers_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$pharmacy_suppliers_list->isExport() && !$pharmacy_suppliers->CurrentAction) { ?>
<form name="fpharmacy_supplierslistsrch" id="fpharmacy_supplierslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fpharmacy_supplierslistsrch-search-panel" class="<?php echo $pharmacy_suppliers_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pharmacy_suppliers">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $pharmacy_suppliers_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($pharmacy_suppliers_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($pharmacy_suppliers_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $pharmacy_suppliers_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($pharmacy_suppliers_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_suppliers_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_suppliers_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_suppliers_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $pharmacy_suppliers_list->showPageHeader(); ?>
<?php
$pharmacy_suppliers_list->showMessage();
?>
<?php if ($pharmacy_suppliers_list->TotalRecords > 0 || $pharmacy_suppliers->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pharmacy_suppliers_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pharmacy_suppliers">
<?php if (!$pharmacy_suppliers_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$pharmacy_suppliers_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $pharmacy_suppliers_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_suppliers_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpharmacy_supplierslist" id="fpharmacy_supplierslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_suppliers">
<div id="gmp_pharmacy_suppliers" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($pharmacy_suppliers_list->TotalRecords > 0 || $pharmacy_suppliers_list->isGridEdit()) { ?>
<table id="tbl_pharmacy_supplierslist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pharmacy_suppliers->RowType = ROWTYPE_HEADER;

// Render list options
$pharmacy_suppliers_list->renderListOptions();

// Render list options (header, left)
$pharmacy_suppliers_list->ListOptions->render("header", "left");
?>
<?php if ($pharmacy_suppliers_list->Suppliercode->Visible) { // Suppliercode ?>
	<?php if ($pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->Suppliercode) == "") { ?>
		<th data-name="Suppliercode" class="<?php echo $pharmacy_suppliers_list->Suppliercode->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_Suppliercode" class="pharmacy_suppliers_Suppliercode"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->Suppliercode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Suppliercode" class="<?php echo $pharmacy_suppliers_list->Suppliercode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->Suppliercode) ?>', 1);"><div id="elh_pharmacy_suppliers_Suppliercode" class="pharmacy_suppliers_Suppliercode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->Suppliercode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers_list->Suppliercode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_suppliers_list->Suppliercode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers_list->Suppliername->Visible) { // Suppliername ?>
	<?php if ($pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->Suppliername) == "") { ?>
		<th data-name="Suppliername" class="<?php echo $pharmacy_suppliers_list->Suppliername->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_Suppliername" class="pharmacy_suppliers_Suppliername"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->Suppliername->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Suppliername" class="<?php echo $pharmacy_suppliers_list->Suppliername->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->Suppliername) ?>', 1);"><div id="elh_pharmacy_suppliers_Suppliername" class="pharmacy_suppliers_Suppliername">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->Suppliername->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers_list->Suppliername->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_suppliers_list->Suppliername->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers_list->Abbreviation->Visible) { // Abbreviation ?>
	<?php if ($pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->Abbreviation) == "") { ?>
		<th data-name="Abbreviation" class="<?php echo $pharmacy_suppliers_list->Abbreviation->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_Abbreviation" class="pharmacy_suppliers_Abbreviation"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->Abbreviation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Abbreviation" class="<?php echo $pharmacy_suppliers_list->Abbreviation->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->Abbreviation) ?>', 1);"><div id="elh_pharmacy_suppliers_Abbreviation" class="pharmacy_suppliers_Abbreviation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->Abbreviation->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers_list->Abbreviation->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_suppliers_list->Abbreviation->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers_list->Creationdate->Visible) { // Creationdate ?>
	<?php if ($pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->Creationdate) == "") { ?>
		<th data-name="Creationdate" class="<?php echo $pharmacy_suppliers_list->Creationdate->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_Creationdate" class="pharmacy_suppliers_Creationdate"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->Creationdate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Creationdate" class="<?php echo $pharmacy_suppliers_list->Creationdate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->Creationdate) ?>', 1);"><div id="elh_pharmacy_suppliers_Creationdate" class="pharmacy_suppliers_Creationdate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->Creationdate->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers_list->Creationdate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_suppliers_list->Creationdate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers_list->Address1->Visible) { // Address1 ?>
	<?php if ($pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->Address1) == "") { ?>
		<th data-name="Address1" class="<?php echo $pharmacy_suppliers_list->Address1->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_Address1" class="pharmacy_suppliers_Address1"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->Address1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Address1" class="<?php echo $pharmacy_suppliers_list->Address1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->Address1) ?>', 1);"><div id="elh_pharmacy_suppliers_Address1" class="pharmacy_suppliers_Address1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->Address1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers_list->Address1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_suppliers_list->Address1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers_list->Address2->Visible) { // Address2 ?>
	<?php if ($pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->Address2) == "") { ?>
		<th data-name="Address2" class="<?php echo $pharmacy_suppliers_list->Address2->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_Address2" class="pharmacy_suppliers_Address2"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->Address2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Address2" class="<?php echo $pharmacy_suppliers_list->Address2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->Address2) ?>', 1);"><div id="elh_pharmacy_suppliers_Address2" class="pharmacy_suppliers_Address2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->Address2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers_list->Address2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_suppliers_list->Address2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers_list->Address3->Visible) { // Address3 ?>
	<?php if ($pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->Address3) == "") { ?>
		<th data-name="Address3" class="<?php echo $pharmacy_suppliers_list->Address3->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_Address3" class="pharmacy_suppliers_Address3"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->Address3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Address3" class="<?php echo $pharmacy_suppliers_list->Address3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->Address3) ?>', 1);"><div id="elh_pharmacy_suppliers_Address3" class="pharmacy_suppliers_Address3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->Address3->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers_list->Address3->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_suppliers_list->Address3->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers_list->Citycode->Visible) { // Citycode ?>
	<?php if ($pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->Citycode) == "") { ?>
		<th data-name="Citycode" class="<?php echo $pharmacy_suppliers_list->Citycode->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_Citycode" class="pharmacy_suppliers_Citycode"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->Citycode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Citycode" class="<?php echo $pharmacy_suppliers_list->Citycode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->Citycode) ?>', 1);"><div id="elh_pharmacy_suppliers_Citycode" class="pharmacy_suppliers_Citycode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->Citycode->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers_list->Citycode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_suppliers_list->Citycode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers_list->State->Visible) { // State ?>
	<?php if ($pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->State) == "") { ?>
		<th data-name="State" class="<?php echo $pharmacy_suppliers_list->State->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_State" class="pharmacy_suppliers_State"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->State->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="State" class="<?php echo $pharmacy_suppliers_list->State->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->State) ?>', 1);"><div id="elh_pharmacy_suppliers_State" class="pharmacy_suppliers_State">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->State->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers_list->State->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_suppliers_list->State->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers_list->Pincode->Visible) { // Pincode ?>
	<?php if ($pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->Pincode) == "") { ?>
		<th data-name="Pincode" class="<?php echo $pharmacy_suppliers_list->Pincode->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_Pincode" class="pharmacy_suppliers_Pincode"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->Pincode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pincode" class="<?php echo $pharmacy_suppliers_list->Pincode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->Pincode) ?>', 1);"><div id="elh_pharmacy_suppliers_Pincode" class="pharmacy_suppliers_Pincode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->Pincode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers_list->Pincode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_suppliers_list->Pincode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers_list->Tngstnumber->Visible) { // Tngstnumber ?>
	<?php if ($pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->Tngstnumber) == "") { ?>
		<th data-name="Tngstnumber" class="<?php echo $pharmacy_suppliers_list->Tngstnumber->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_Tngstnumber" class="pharmacy_suppliers_Tngstnumber"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->Tngstnumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tngstnumber" class="<?php echo $pharmacy_suppliers_list->Tngstnumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->Tngstnumber) ?>', 1);"><div id="elh_pharmacy_suppliers_Tngstnumber" class="pharmacy_suppliers_Tngstnumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->Tngstnumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers_list->Tngstnumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_suppliers_list->Tngstnumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers_list->Phone->Visible) { // Phone ?>
	<?php if ($pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->Phone) == "") { ?>
		<th data-name="Phone" class="<?php echo $pharmacy_suppliers_list->Phone->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_Phone" class="pharmacy_suppliers_Phone"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->Phone->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Phone" class="<?php echo $pharmacy_suppliers_list->Phone->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->Phone) ?>', 1);"><div id="elh_pharmacy_suppliers_Phone" class="pharmacy_suppliers_Phone">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->Phone->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers_list->Phone->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_suppliers_list->Phone->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers_list->Fax->Visible) { // Fax ?>
	<?php if ($pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->Fax) == "") { ?>
		<th data-name="Fax" class="<?php echo $pharmacy_suppliers_list->Fax->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_Fax" class="pharmacy_suppliers_Fax"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->Fax->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Fax" class="<?php echo $pharmacy_suppliers_list->Fax->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->Fax) ?>', 1);"><div id="elh_pharmacy_suppliers_Fax" class="pharmacy_suppliers_Fax">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->Fax->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers_list->Fax->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_suppliers_list->Fax->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers_list->_Email->Visible) { // Email ?>
	<?php if ($pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->_Email) == "") { ?>
		<th data-name="_Email" class="<?php echo $pharmacy_suppliers_list->_Email->headerCellClass() ?>"><div id="elh_pharmacy_suppliers__Email" class="pharmacy_suppliers__Email"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->_Email->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_Email" class="<?php echo $pharmacy_suppliers_list->_Email->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->_Email) ?>', 1);"><div id="elh_pharmacy_suppliers__Email" class="pharmacy_suppliers__Email">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->_Email->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers_list->_Email->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_suppliers_list->_Email->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers_list->Paymentmode->Visible) { // Paymentmode ?>
	<?php if ($pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->Paymentmode) == "") { ?>
		<th data-name="Paymentmode" class="<?php echo $pharmacy_suppliers_list->Paymentmode->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_Paymentmode" class="pharmacy_suppliers_Paymentmode"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->Paymentmode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Paymentmode" class="<?php echo $pharmacy_suppliers_list->Paymentmode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->Paymentmode) ?>', 1);"><div id="elh_pharmacy_suppliers_Paymentmode" class="pharmacy_suppliers_Paymentmode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->Paymentmode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers_list->Paymentmode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_suppliers_list->Paymentmode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers_list->Contactperson1->Visible) { // Contactperson1 ?>
	<?php if ($pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->Contactperson1) == "") { ?>
		<th data-name="Contactperson1" class="<?php echo $pharmacy_suppliers_list->Contactperson1->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_Contactperson1" class="pharmacy_suppliers_Contactperson1"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->Contactperson1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Contactperson1" class="<?php echo $pharmacy_suppliers_list->Contactperson1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->Contactperson1) ?>', 1);"><div id="elh_pharmacy_suppliers_Contactperson1" class="pharmacy_suppliers_Contactperson1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->Contactperson1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers_list->Contactperson1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_suppliers_list->Contactperson1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers_list->CP1Address1->Visible) { // CP1Address1 ?>
	<?php if ($pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->CP1Address1) == "") { ?>
		<th data-name="CP1Address1" class="<?php echo $pharmacy_suppliers_list->CP1Address1->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_CP1Address1" class="pharmacy_suppliers_CP1Address1"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->CP1Address1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CP1Address1" class="<?php echo $pharmacy_suppliers_list->CP1Address1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->CP1Address1) ?>', 1);"><div id="elh_pharmacy_suppliers_CP1Address1" class="pharmacy_suppliers_CP1Address1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->CP1Address1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers_list->CP1Address1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_suppliers_list->CP1Address1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers_list->CP1Address2->Visible) { // CP1Address2 ?>
	<?php if ($pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->CP1Address2) == "") { ?>
		<th data-name="CP1Address2" class="<?php echo $pharmacy_suppliers_list->CP1Address2->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_CP1Address2" class="pharmacy_suppliers_CP1Address2"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->CP1Address2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CP1Address2" class="<?php echo $pharmacy_suppliers_list->CP1Address2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->CP1Address2) ?>', 1);"><div id="elh_pharmacy_suppliers_CP1Address2" class="pharmacy_suppliers_CP1Address2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->CP1Address2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers_list->CP1Address2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_suppliers_list->CP1Address2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers_list->CP1Address3->Visible) { // CP1Address3 ?>
	<?php if ($pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->CP1Address3) == "") { ?>
		<th data-name="CP1Address3" class="<?php echo $pharmacy_suppliers_list->CP1Address3->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_CP1Address3" class="pharmacy_suppliers_CP1Address3"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->CP1Address3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CP1Address3" class="<?php echo $pharmacy_suppliers_list->CP1Address3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->CP1Address3) ?>', 1);"><div id="elh_pharmacy_suppliers_CP1Address3" class="pharmacy_suppliers_CP1Address3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->CP1Address3->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers_list->CP1Address3->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_suppliers_list->CP1Address3->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers_list->CP1Citycode->Visible) { // CP1Citycode ?>
	<?php if ($pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->CP1Citycode) == "") { ?>
		<th data-name="CP1Citycode" class="<?php echo $pharmacy_suppliers_list->CP1Citycode->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_CP1Citycode" class="pharmacy_suppliers_CP1Citycode"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->CP1Citycode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CP1Citycode" class="<?php echo $pharmacy_suppliers_list->CP1Citycode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->CP1Citycode) ?>', 1);"><div id="elh_pharmacy_suppliers_CP1Citycode" class="pharmacy_suppliers_CP1Citycode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->CP1Citycode->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers_list->CP1Citycode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_suppliers_list->CP1Citycode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers_list->CP1State->Visible) { // CP1State ?>
	<?php if ($pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->CP1State) == "") { ?>
		<th data-name="CP1State" class="<?php echo $pharmacy_suppliers_list->CP1State->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_CP1State" class="pharmacy_suppliers_CP1State"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->CP1State->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CP1State" class="<?php echo $pharmacy_suppliers_list->CP1State->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->CP1State) ?>', 1);"><div id="elh_pharmacy_suppliers_CP1State" class="pharmacy_suppliers_CP1State">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->CP1State->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers_list->CP1State->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_suppliers_list->CP1State->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers_list->CP1Pincode->Visible) { // CP1Pincode ?>
	<?php if ($pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->CP1Pincode) == "") { ?>
		<th data-name="CP1Pincode" class="<?php echo $pharmacy_suppliers_list->CP1Pincode->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_CP1Pincode" class="pharmacy_suppliers_CP1Pincode"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->CP1Pincode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CP1Pincode" class="<?php echo $pharmacy_suppliers_list->CP1Pincode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->CP1Pincode) ?>', 1);"><div id="elh_pharmacy_suppliers_CP1Pincode" class="pharmacy_suppliers_CP1Pincode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->CP1Pincode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers_list->CP1Pincode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_suppliers_list->CP1Pincode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers_list->CP1Designation->Visible) { // CP1Designation ?>
	<?php if ($pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->CP1Designation) == "") { ?>
		<th data-name="CP1Designation" class="<?php echo $pharmacy_suppliers_list->CP1Designation->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_CP1Designation" class="pharmacy_suppliers_CP1Designation"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->CP1Designation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CP1Designation" class="<?php echo $pharmacy_suppliers_list->CP1Designation->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->CP1Designation) ?>', 1);"><div id="elh_pharmacy_suppliers_CP1Designation" class="pharmacy_suppliers_CP1Designation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->CP1Designation->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers_list->CP1Designation->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_suppliers_list->CP1Designation->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers_list->CP1Phone->Visible) { // CP1Phone ?>
	<?php if ($pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->CP1Phone) == "") { ?>
		<th data-name="CP1Phone" class="<?php echo $pharmacy_suppliers_list->CP1Phone->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_CP1Phone" class="pharmacy_suppliers_CP1Phone"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->CP1Phone->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CP1Phone" class="<?php echo $pharmacy_suppliers_list->CP1Phone->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->CP1Phone) ?>', 1);"><div id="elh_pharmacy_suppliers_CP1Phone" class="pharmacy_suppliers_CP1Phone">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->CP1Phone->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers_list->CP1Phone->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_suppliers_list->CP1Phone->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers_list->CP1MobileNo->Visible) { // CP1MobileNo ?>
	<?php if ($pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->CP1MobileNo) == "") { ?>
		<th data-name="CP1MobileNo" class="<?php echo $pharmacy_suppliers_list->CP1MobileNo->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_CP1MobileNo" class="pharmacy_suppliers_CP1MobileNo"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->CP1MobileNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CP1MobileNo" class="<?php echo $pharmacy_suppliers_list->CP1MobileNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->CP1MobileNo) ?>', 1);"><div id="elh_pharmacy_suppliers_CP1MobileNo" class="pharmacy_suppliers_CP1MobileNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->CP1MobileNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers_list->CP1MobileNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_suppliers_list->CP1MobileNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers_list->CP1Fax->Visible) { // CP1Fax ?>
	<?php if ($pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->CP1Fax) == "") { ?>
		<th data-name="CP1Fax" class="<?php echo $pharmacy_suppliers_list->CP1Fax->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_CP1Fax" class="pharmacy_suppliers_CP1Fax"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->CP1Fax->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CP1Fax" class="<?php echo $pharmacy_suppliers_list->CP1Fax->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->CP1Fax) ?>', 1);"><div id="elh_pharmacy_suppliers_CP1Fax" class="pharmacy_suppliers_CP1Fax">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->CP1Fax->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers_list->CP1Fax->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_suppliers_list->CP1Fax->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers_list->CP1Email->Visible) { // CP1Email ?>
	<?php if ($pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->CP1Email) == "") { ?>
		<th data-name="CP1Email" class="<?php echo $pharmacy_suppliers_list->CP1Email->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_CP1Email" class="pharmacy_suppliers_CP1Email"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->CP1Email->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CP1Email" class="<?php echo $pharmacy_suppliers_list->CP1Email->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->CP1Email) ?>', 1);"><div id="elh_pharmacy_suppliers_CP1Email" class="pharmacy_suppliers_CP1Email">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->CP1Email->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers_list->CP1Email->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_suppliers_list->CP1Email->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers_list->Contactperson2->Visible) { // Contactperson2 ?>
	<?php if ($pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->Contactperson2) == "") { ?>
		<th data-name="Contactperson2" class="<?php echo $pharmacy_suppliers_list->Contactperson2->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_Contactperson2" class="pharmacy_suppliers_Contactperson2"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->Contactperson2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Contactperson2" class="<?php echo $pharmacy_suppliers_list->Contactperson2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->Contactperson2) ?>', 1);"><div id="elh_pharmacy_suppliers_Contactperson2" class="pharmacy_suppliers_Contactperson2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->Contactperson2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers_list->Contactperson2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_suppliers_list->Contactperson2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers_list->CP2Address1->Visible) { // CP2Address1 ?>
	<?php if ($pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->CP2Address1) == "") { ?>
		<th data-name="CP2Address1" class="<?php echo $pharmacy_suppliers_list->CP2Address1->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_CP2Address1" class="pharmacy_suppliers_CP2Address1"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->CP2Address1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CP2Address1" class="<?php echo $pharmacy_suppliers_list->CP2Address1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->CP2Address1) ?>', 1);"><div id="elh_pharmacy_suppliers_CP2Address1" class="pharmacy_suppliers_CP2Address1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->CP2Address1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers_list->CP2Address1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_suppliers_list->CP2Address1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers_list->CP2Address2->Visible) { // CP2Address2 ?>
	<?php if ($pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->CP2Address2) == "") { ?>
		<th data-name="CP2Address2" class="<?php echo $pharmacy_suppliers_list->CP2Address2->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_CP2Address2" class="pharmacy_suppliers_CP2Address2"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->CP2Address2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CP2Address2" class="<?php echo $pharmacy_suppliers_list->CP2Address2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->CP2Address2) ?>', 1);"><div id="elh_pharmacy_suppliers_CP2Address2" class="pharmacy_suppliers_CP2Address2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->CP2Address2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers_list->CP2Address2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_suppliers_list->CP2Address2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers_list->CP2Address3->Visible) { // CP2Address3 ?>
	<?php if ($pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->CP2Address3) == "") { ?>
		<th data-name="CP2Address3" class="<?php echo $pharmacy_suppliers_list->CP2Address3->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_CP2Address3" class="pharmacy_suppliers_CP2Address3"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->CP2Address3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CP2Address3" class="<?php echo $pharmacy_suppliers_list->CP2Address3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->CP2Address3) ?>', 1);"><div id="elh_pharmacy_suppliers_CP2Address3" class="pharmacy_suppliers_CP2Address3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->CP2Address3->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers_list->CP2Address3->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_suppliers_list->CP2Address3->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers_list->CP2Citycode->Visible) { // CP2Citycode ?>
	<?php if ($pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->CP2Citycode) == "") { ?>
		<th data-name="CP2Citycode" class="<?php echo $pharmacy_suppliers_list->CP2Citycode->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_CP2Citycode" class="pharmacy_suppliers_CP2Citycode"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->CP2Citycode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CP2Citycode" class="<?php echo $pharmacy_suppliers_list->CP2Citycode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->CP2Citycode) ?>', 1);"><div id="elh_pharmacy_suppliers_CP2Citycode" class="pharmacy_suppliers_CP2Citycode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->CP2Citycode->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers_list->CP2Citycode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_suppliers_list->CP2Citycode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers_list->CP2State->Visible) { // CP2State ?>
	<?php if ($pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->CP2State) == "") { ?>
		<th data-name="CP2State" class="<?php echo $pharmacy_suppliers_list->CP2State->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_CP2State" class="pharmacy_suppliers_CP2State"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->CP2State->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CP2State" class="<?php echo $pharmacy_suppliers_list->CP2State->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->CP2State) ?>', 1);"><div id="elh_pharmacy_suppliers_CP2State" class="pharmacy_suppliers_CP2State">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->CP2State->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers_list->CP2State->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_suppliers_list->CP2State->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers_list->CP2Pincode->Visible) { // CP2Pincode ?>
	<?php if ($pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->CP2Pincode) == "") { ?>
		<th data-name="CP2Pincode" class="<?php echo $pharmacy_suppliers_list->CP2Pincode->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_CP2Pincode" class="pharmacy_suppliers_CP2Pincode"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->CP2Pincode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CP2Pincode" class="<?php echo $pharmacy_suppliers_list->CP2Pincode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->CP2Pincode) ?>', 1);"><div id="elh_pharmacy_suppliers_CP2Pincode" class="pharmacy_suppliers_CP2Pincode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->CP2Pincode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers_list->CP2Pincode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_suppliers_list->CP2Pincode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers_list->CP2Designation->Visible) { // CP2Designation ?>
	<?php if ($pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->CP2Designation) == "") { ?>
		<th data-name="CP2Designation" class="<?php echo $pharmacy_suppliers_list->CP2Designation->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_CP2Designation" class="pharmacy_suppliers_CP2Designation"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->CP2Designation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CP2Designation" class="<?php echo $pharmacy_suppliers_list->CP2Designation->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->CP2Designation) ?>', 1);"><div id="elh_pharmacy_suppliers_CP2Designation" class="pharmacy_suppliers_CP2Designation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->CP2Designation->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers_list->CP2Designation->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_suppliers_list->CP2Designation->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers_list->CP2Phone->Visible) { // CP2Phone ?>
	<?php if ($pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->CP2Phone) == "") { ?>
		<th data-name="CP2Phone" class="<?php echo $pharmacy_suppliers_list->CP2Phone->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_CP2Phone" class="pharmacy_suppliers_CP2Phone"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->CP2Phone->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CP2Phone" class="<?php echo $pharmacy_suppliers_list->CP2Phone->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->CP2Phone) ?>', 1);"><div id="elh_pharmacy_suppliers_CP2Phone" class="pharmacy_suppliers_CP2Phone">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->CP2Phone->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers_list->CP2Phone->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_suppliers_list->CP2Phone->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers_list->CP2MobileNo->Visible) { // CP2MobileNo ?>
	<?php if ($pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->CP2MobileNo) == "") { ?>
		<th data-name="CP2MobileNo" class="<?php echo $pharmacy_suppliers_list->CP2MobileNo->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_CP2MobileNo" class="pharmacy_suppliers_CP2MobileNo"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->CP2MobileNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CP2MobileNo" class="<?php echo $pharmacy_suppliers_list->CP2MobileNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->CP2MobileNo) ?>', 1);"><div id="elh_pharmacy_suppliers_CP2MobileNo" class="pharmacy_suppliers_CP2MobileNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->CP2MobileNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers_list->CP2MobileNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_suppliers_list->CP2MobileNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers_list->CP2Fax->Visible) { // CP2Fax ?>
	<?php if ($pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->CP2Fax) == "") { ?>
		<th data-name="CP2Fax" class="<?php echo $pharmacy_suppliers_list->CP2Fax->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_CP2Fax" class="pharmacy_suppliers_CP2Fax"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->CP2Fax->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CP2Fax" class="<?php echo $pharmacy_suppliers_list->CP2Fax->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->CP2Fax) ?>', 1);"><div id="elh_pharmacy_suppliers_CP2Fax" class="pharmacy_suppliers_CP2Fax">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->CP2Fax->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers_list->CP2Fax->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_suppliers_list->CP2Fax->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers_list->CP2Email->Visible) { // CP2Email ?>
	<?php if ($pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->CP2Email) == "") { ?>
		<th data-name="CP2Email" class="<?php echo $pharmacy_suppliers_list->CP2Email->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_CP2Email" class="pharmacy_suppliers_CP2Email"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->CP2Email->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CP2Email" class="<?php echo $pharmacy_suppliers_list->CP2Email->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->CP2Email) ?>', 1);"><div id="elh_pharmacy_suppliers_CP2Email" class="pharmacy_suppliers_CP2Email">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->CP2Email->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers_list->CP2Email->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_suppliers_list->CP2Email->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers_list->Type->Visible) { // Type ?>
	<?php if ($pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->Type) == "") { ?>
		<th data-name="Type" class="<?php echo $pharmacy_suppliers_list->Type->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_Type" class="pharmacy_suppliers_Type"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->Type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Type" class="<?php echo $pharmacy_suppliers_list->Type->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->Type) ?>', 1);"><div id="elh_pharmacy_suppliers_Type" class="pharmacy_suppliers_Type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->Type->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers_list->Type->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_suppliers_list->Type->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers_list->Creditterms->Visible) { // Creditterms ?>
	<?php if ($pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->Creditterms) == "") { ?>
		<th data-name="Creditterms" class="<?php echo $pharmacy_suppliers_list->Creditterms->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_Creditterms" class="pharmacy_suppliers_Creditterms"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->Creditterms->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Creditterms" class="<?php echo $pharmacy_suppliers_list->Creditterms->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->Creditterms) ?>', 1);"><div id="elh_pharmacy_suppliers_Creditterms" class="pharmacy_suppliers_Creditterms">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->Creditterms->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers_list->Creditterms->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_suppliers_list->Creditterms->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers_list->Remarks->Visible) { // Remarks ?>
	<?php if ($pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->Remarks) == "") { ?>
		<th data-name="Remarks" class="<?php echo $pharmacy_suppliers_list->Remarks->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_Remarks" class="pharmacy_suppliers_Remarks"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->Remarks->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Remarks" class="<?php echo $pharmacy_suppliers_list->Remarks->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->Remarks) ?>', 1);"><div id="elh_pharmacy_suppliers_Remarks" class="pharmacy_suppliers_Remarks">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->Remarks->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers_list->Remarks->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_suppliers_list->Remarks->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers_list->Tinnumber->Visible) { // Tinnumber ?>
	<?php if ($pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->Tinnumber) == "") { ?>
		<th data-name="Tinnumber" class="<?php echo $pharmacy_suppliers_list->Tinnumber->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_Tinnumber" class="pharmacy_suppliers_Tinnumber"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->Tinnumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tinnumber" class="<?php echo $pharmacy_suppliers_list->Tinnumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->Tinnumber) ?>', 1);"><div id="elh_pharmacy_suppliers_Tinnumber" class="pharmacy_suppliers_Tinnumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->Tinnumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers_list->Tinnumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_suppliers_list->Tinnumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers_list->Universalsuppliercode->Visible) { // Universalsuppliercode ?>
	<?php if ($pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->Universalsuppliercode) == "") { ?>
		<th data-name="Universalsuppliercode" class="<?php echo $pharmacy_suppliers_list->Universalsuppliercode->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_Universalsuppliercode" class="pharmacy_suppliers_Universalsuppliercode"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->Universalsuppliercode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Universalsuppliercode" class="<?php echo $pharmacy_suppliers_list->Universalsuppliercode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->Universalsuppliercode) ?>', 1);"><div id="elh_pharmacy_suppliers_Universalsuppliercode" class="pharmacy_suppliers_Universalsuppliercode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->Universalsuppliercode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers_list->Universalsuppliercode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_suppliers_list->Universalsuppliercode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers_list->Mobilenumber->Visible) { // Mobilenumber ?>
	<?php if ($pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->Mobilenumber) == "") { ?>
		<th data-name="Mobilenumber" class="<?php echo $pharmacy_suppliers_list->Mobilenumber->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_Mobilenumber" class="pharmacy_suppliers_Mobilenumber"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->Mobilenumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mobilenumber" class="<?php echo $pharmacy_suppliers_list->Mobilenumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->Mobilenumber) ?>', 1);"><div id="elh_pharmacy_suppliers_Mobilenumber" class="pharmacy_suppliers_Mobilenumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->Mobilenumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers_list->Mobilenumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_suppliers_list->Mobilenumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers_list->PANNumber->Visible) { // PANNumber ?>
	<?php if ($pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->PANNumber) == "") { ?>
		<th data-name="PANNumber" class="<?php echo $pharmacy_suppliers_list->PANNumber->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_PANNumber" class="pharmacy_suppliers_PANNumber"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->PANNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PANNumber" class="<?php echo $pharmacy_suppliers_list->PANNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->PANNumber) ?>', 1);"><div id="elh_pharmacy_suppliers_PANNumber" class="pharmacy_suppliers_PANNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->PANNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers_list->PANNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_suppliers_list->PANNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers_list->SalesRepMobileNo->Visible) { // SalesRepMobileNo ?>
	<?php if ($pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->SalesRepMobileNo) == "") { ?>
		<th data-name="SalesRepMobileNo" class="<?php echo $pharmacy_suppliers_list->SalesRepMobileNo->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_SalesRepMobileNo" class="pharmacy_suppliers_SalesRepMobileNo"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->SalesRepMobileNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SalesRepMobileNo" class="<?php echo $pharmacy_suppliers_list->SalesRepMobileNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->SalesRepMobileNo) ?>', 1);"><div id="elh_pharmacy_suppliers_SalesRepMobileNo" class="pharmacy_suppliers_SalesRepMobileNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->SalesRepMobileNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers_list->SalesRepMobileNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_suppliers_list->SalesRepMobileNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers_list->GSTNumber->Visible) { // GSTNumber ?>
	<?php if ($pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->GSTNumber) == "") { ?>
		<th data-name="GSTNumber" class="<?php echo $pharmacy_suppliers_list->GSTNumber->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_GSTNumber" class="pharmacy_suppliers_GSTNumber"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->GSTNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GSTNumber" class="<?php echo $pharmacy_suppliers_list->GSTNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->GSTNumber) ?>', 1);"><div id="elh_pharmacy_suppliers_GSTNumber" class="pharmacy_suppliers_GSTNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->GSTNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers_list->GSTNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_suppliers_list->GSTNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers_list->TANNumber->Visible) { // TANNumber ?>
	<?php if ($pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->TANNumber) == "") { ?>
		<th data-name="TANNumber" class="<?php echo $pharmacy_suppliers_list->TANNumber->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_TANNumber" class="pharmacy_suppliers_TANNumber"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->TANNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TANNumber" class="<?php echo $pharmacy_suppliers_list->TANNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->TANNumber) ?>', 1);"><div id="elh_pharmacy_suppliers_TANNumber" class="pharmacy_suppliers_TANNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->TANNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers_list->TANNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_suppliers_list->TANNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers_list->id->Visible) { // id ?>
	<?php if ($pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $pharmacy_suppliers_list->id->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_id" class="pharmacy_suppliers_id"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $pharmacy_suppliers_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_suppliers_list->SortUrl($pharmacy_suppliers_list->id) ?>', 1);"><div id="elh_pharmacy_suppliers_id" class="pharmacy_suppliers_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_suppliers_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pharmacy_suppliers_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($pharmacy_suppliers_list->ExportAll && $pharmacy_suppliers_list->isExport()) {
	$pharmacy_suppliers_list->StopRecord = $pharmacy_suppliers_list->TotalRecords;
} else {

	// Set the last record to display
	if ($pharmacy_suppliers_list->TotalRecords > $pharmacy_suppliers_list->StartRecord + $pharmacy_suppliers_list->DisplayRecords - 1)
		$pharmacy_suppliers_list->StopRecord = $pharmacy_suppliers_list->StartRecord + $pharmacy_suppliers_list->DisplayRecords - 1;
	else
		$pharmacy_suppliers_list->StopRecord = $pharmacy_suppliers_list->TotalRecords;
}
$pharmacy_suppliers_list->RecordCount = $pharmacy_suppliers_list->StartRecord - 1;
if ($pharmacy_suppliers_list->Recordset && !$pharmacy_suppliers_list->Recordset->EOF) {
	$pharmacy_suppliers_list->Recordset->moveFirst();
	$selectLimit = $pharmacy_suppliers_list->UseSelectLimit;
	if (!$selectLimit && $pharmacy_suppliers_list->StartRecord > 1)
		$pharmacy_suppliers_list->Recordset->move($pharmacy_suppliers_list->StartRecord - 1);
} elseif (!$pharmacy_suppliers->AllowAddDeleteRow && $pharmacy_suppliers_list->StopRecord == 0) {
	$pharmacy_suppliers_list->StopRecord = $pharmacy_suppliers->GridAddRowCount;
}

// Initialize aggregate
$pharmacy_suppliers->RowType = ROWTYPE_AGGREGATEINIT;
$pharmacy_suppliers->resetAttributes();
$pharmacy_suppliers_list->renderRow();
while ($pharmacy_suppliers_list->RecordCount < $pharmacy_suppliers_list->StopRecord) {
	$pharmacy_suppliers_list->RecordCount++;
	if ($pharmacy_suppliers_list->RecordCount >= $pharmacy_suppliers_list->StartRecord) {
		$pharmacy_suppliers_list->RowCount++;

		// Set up key count
		$pharmacy_suppliers_list->KeyCount = $pharmacy_suppliers_list->RowIndex;

		// Init row class and style
		$pharmacy_suppliers->resetAttributes();
		$pharmacy_suppliers->CssClass = "";
		if ($pharmacy_suppliers_list->isGridAdd()) {
		} else {
			$pharmacy_suppliers_list->loadRowValues($pharmacy_suppliers_list->Recordset); // Load row values
		}
		$pharmacy_suppliers->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$pharmacy_suppliers->RowAttrs->merge(["data-rowindex" => $pharmacy_suppliers_list->RowCount, "id" => "r" . $pharmacy_suppliers_list->RowCount . "_pharmacy_suppliers", "data-rowtype" => $pharmacy_suppliers->RowType]);

		// Render row
		$pharmacy_suppliers_list->renderRow();

		// Render list options
		$pharmacy_suppliers_list->renderListOptions();
?>
	<tr <?php echo $pharmacy_suppliers->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_suppliers_list->ListOptions->render("body", "left", $pharmacy_suppliers_list->RowCount);
?>
	<?php if ($pharmacy_suppliers_list->Suppliercode->Visible) { // Suppliercode ?>
		<td data-name="Suppliercode" <?php echo $pharmacy_suppliers_list->Suppliercode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCount ?>_pharmacy_suppliers_Suppliercode">
<span<?php echo $pharmacy_suppliers_list->Suppliercode->viewAttributes() ?>><?php echo $pharmacy_suppliers_list->Suppliercode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers_list->Suppliername->Visible) { // Suppliername ?>
		<td data-name="Suppliername" <?php echo $pharmacy_suppliers_list->Suppliername->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCount ?>_pharmacy_suppliers_Suppliername">
<span<?php echo $pharmacy_suppliers_list->Suppliername->viewAttributes() ?>><?php echo $pharmacy_suppliers_list->Suppliername->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers_list->Abbreviation->Visible) { // Abbreviation ?>
		<td data-name="Abbreviation" <?php echo $pharmacy_suppliers_list->Abbreviation->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCount ?>_pharmacy_suppliers_Abbreviation">
<span<?php echo $pharmacy_suppliers_list->Abbreviation->viewAttributes() ?>><?php echo $pharmacy_suppliers_list->Abbreviation->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers_list->Creationdate->Visible) { // Creationdate ?>
		<td data-name="Creationdate" <?php echo $pharmacy_suppliers_list->Creationdate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCount ?>_pharmacy_suppliers_Creationdate">
<span<?php echo $pharmacy_suppliers_list->Creationdate->viewAttributes() ?>><?php echo $pharmacy_suppliers_list->Creationdate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers_list->Address1->Visible) { // Address1 ?>
		<td data-name="Address1" <?php echo $pharmacy_suppliers_list->Address1->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCount ?>_pharmacy_suppliers_Address1">
<span<?php echo $pharmacy_suppliers_list->Address1->viewAttributes() ?>><?php echo $pharmacy_suppliers_list->Address1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers_list->Address2->Visible) { // Address2 ?>
		<td data-name="Address2" <?php echo $pharmacy_suppliers_list->Address2->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCount ?>_pharmacy_suppliers_Address2">
<span<?php echo $pharmacy_suppliers_list->Address2->viewAttributes() ?>><?php echo $pharmacy_suppliers_list->Address2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers_list->Address3->Visible) { // Address3 ?>
		<td data-name="Address3" <?php echo $pharmacy_suppliers_list->Address3->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCount ?>_pharmacy_suppliers_Address3">
<span<?php echo $pharmacy_suppliers_list->Address3->viewAttributes() ?>><?php echo $pharmacy_suppliers_list->Address3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers_list->Citycode->Visible) { // Citycode ?>
		<td data-name="Citycode" <?php echo $pharmacy_suppliers_list->Citycode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCount ?>_pharmacy_suppliers_Citycode">
<span<?php echo $pharmacy_suppliers_list->Citycode->viewAttributes() ?>><?php echo $pharmacy_suppliers_list->Citycode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers_list->State->Visible) { // State ?>
		<td data-name="State" <?php echo $pharmacy_suppliers_list->State->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCount ?>_pharmacy_suppliers_State">
<span<?php echo $pharmacy_suppliers_list->State->viewAttributes() ?>><?php echo $pharmacy_suppliers_list->State->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers_list->Pincode->Visible) { // Pincode ?>
		<td data-name="Pincode" <?php echo $pharmacy_suppliers_list->Pincode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCount ?>_pharmacy_suppliers_Pincode">
<span<?php echo $pharmacy_suppliers_list->Pincode->viewAttributes() ?>><?php echo $pharmacy_suppliers_list->Pincode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers_list->Tngstnumber->Visible) { // Tngstnumber ?>
		<td data-name="Tngstnumber" <?php echo $pharmacy_suppliers_list->Tngstnumber->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCount ?>_pharmacy_suppliers_Tngstnumber">
<span<?php echo $pharmacy_suppliers_list->Tngstnumber->viewAttributes() ?>><?php echo $pharmacy_suppliers_list->Tngstnumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers_list->Phone->Visible) { // Phone ?>
		<td data-name="Phone" <?php echo $pharmacy_suppliers_list->Phone->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCount ?>_pharmacy_suppliers_Phone">
<span<?php echo $pharmacy_suppliers_list->Phone->viewAttributes() ?>><?php echo $pharmacy_suppliers_list->Phone->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers_list->Fax->Visible) { // Fax ?>
		<td data-name="Fax" <?php echo $pharmacy_suppliers_list->Fax->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCount ?>_pharmacy_suppliers_Fax">
<span<?php echo $pharmacy_suppliers_list->Fax->viewAttributes() ?>><?php echo $pharmacy_suppliers_list->Fax->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers_list->_Email->Visible) { // Email ?>
		<td data-name="_Email" <?php echo $pharmacy_suppliers_list->_Email->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCount ?>_pharmacy_suppliers__Email">
<span<?php echo $pharmacy_suppliers_list->_Email->viewAttributes() ?>><?php echo $pharmacy_suppliers_list->_Email->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers_list->Paymentmode->Visible) { // Paymentmode ?>
		<td data-name="Paymentmode" <?php echo $pharmacy_suppliers_list->Paymentmode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCount ?>_pharmacy_suppliers_Paymentmode">
<span<?php echo $pharmacy_suppliers_list->Paymentmode->viewAttributes() ?>><?php echo $pharmacy_suppliers_list->Paymentmode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers_list->Contactperson1->Visible) { // Contactperson1 ?>
		<td data-name="Contactperson1" <?php echo $pharmacy_suppliers_list->Contactperson1->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCount ?>_pharmacy_suppliers_Contactperson1">
<span<?php echo $pharmacy_suppliers_list->Contactperson1->viewAttributes() ?>><?php echo $pharmacy_suppliers_list->Contactperson1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers_list->CP1Address1->Visible) { // CP1Address1 ?>
		<td data-name="CP1Address1" <?php echo $pharmacy_suppliers_list->CP1Address1->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCount ?>_pharmacy_suppliers_CP1Address1">
<span<?php echo $pharmacy_suppliers_list->CP1Address1->viewAttributes() ?>><?php echo $pharmacy_suppliers_list->CP1Address1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers_list->CP1Address2->Visible) { // CP1Address2 ?>
		<td data-name="CP1Address2" <?php echo $pharmacy_suppliers_list->CP1Address2->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCount ?>_pharmacy_suppliers_CP1Address2">
<span<?php echo $pharmacy_suppliers_list->CP1Address2->viewAttributes() ?>><?php echo $pharmacy_suppliers_list->CP1Address2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers_list->CP1Address3->Visible) { // CP1Address3 ?>
		<td data-name="CP1Address3" <?php echo $pharmacy_suppliers_list->CP1Address3->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCount ?>_pharmacy_suppliers_CP1Address3">
<span<?php echo $pharmacy_suppliers_list->CP1Address3->viewAttributes() ?>><?php echo $pharmacy_suppliers_list->CP1Address3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers_list->CP1Citycode->Visible) { // CP1Citycode ?>
		<td data-name="CP1Citycode" <?php echo $pharmacy_suppliers_list->CP1Citycode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCount ?>_pharmacy_suppliers_CP1Citycode">
<span<?php echo $pharmacy_suppliers_list->CP1Citycode->viewAttributes() ?>><?php echo $pharmacy_suppliers_list->CP1Citycode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers_list->CP1State->Visible) { // CP1State ?>
		<td data-name="CP1State" <?php echo $pharmacy_suppliers_list->CP1State->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCount ?>_pharmacy_suppliers_CP1State">
<span<?php echo $pharmacy_suppliers_list->CP1State->viewAttributes() ?>><?php echo $pharmacy_suppliers_list->CP1State->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers_list->CP1Pincode->Visible) { // CP1Pincode ?>
		<td data-name="CP1Pincode" <?php echo $pharmacy_suppliers_list->CP1Pincode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCount ?>_pharmacy_suppliers_CP1Pincode">
<span<?php echo $pharmacy_suppliers_list->CP1Pincode->viewAttributes() ?>><?php echo $pharmacy_suppliers_list->CP1Pincode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers_list->CP1Designation->Visible) { // CP1Designation ?>
		<td data-name="CP1Designation" <?php echo $pharmacy_suppliers_list->CP1Designation->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCount ?>_pharmacy_suppliers_CP1Designation">
<span<?php echo $pharmacy_suppliers_list->CP1Designation->viewAttributes() ?>><?php echo $pharmacy_suppliers_list->CP1Designation->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers_list->CP1Phone->Visible) { // CP1Phone ?>
		<td data-name="CP1Phone" <?php echo $pharmacy_suppliers_list->CP1Phone->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCount ?>_pharmacy_suppliers_CP1Phone">
<span<?php echo $pharmacy_suppliers_list->CP1Phone->viewAttributes() ?>><?php echo $pharmacy_suppliers_list->CP1Phone->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers_list->CP1MobileNo->Visible) { // CP1MobileNo ?>
		<td data-name="CP1MobileNo" <?php echo $pharmacy_suppliers_list->CP1MobileNo->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCount ?>_pharmacy_suppliers_CP1MobileNo">
<span<?php echo $pharmacy_suppliers_list->CP1MobileNo->viewAttributes() ?>><?php echo $pharmacy_suppliers_list->CP1MobileNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers_list->CP1Fax->Visible) { // CP1Fax ?>
		<td data-name="CP1Fax" <?php echo $pharmacy_suppliers_list->CP1Fax->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCount ?>_pharmacy_suppliers_CP1Fax">
<span<?php echo $pharmacy_suppliers_list->CP1Fax->viewAttributes() ?>><?php echo $pharmacy_suppliers_list->CP1Fax->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers_list->CP1Email->Visible) { // CP1Email ?>
		<td data-name="CP1Email" <?php echo $pharmacy_suppliers_list->CP1Email->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCount ?>_pharmacy_suppliers_CP1Email">
<span<?php echo $pharmacy_suppliers_list->CP1Email->viewAttributes() ?>><?php echo $pharmacy_suppliers_list->CP1Email->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers_list->Contactperson2->Visible) { // Contactperson2 ?>
		<td data-name="Contactperson2" <?php echo $pharmacy_suppliers_list->Contactperson2->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCount ?>_pharmacy_suppliers_Contactperson2">
<span<?php echo $pharmacy_suppliers_list->Contactperson2->viewAttributes() ?>><?php echo $pharmacy_suppliers_list->Contactperson2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers_list->CP2Address1->Visible) { // CP2Address1 ?>
		<td data-name="CP2Address1" <?php echo $pharmacy_suppliers_list->CP2Address1->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCount ?>_pharmacy_suppliers_CP2Address1">
<span<?php echo $pharmacy_suppliers_list->CP2Address1->viewAttributes() ?>><?php echo $pharmacy_suppliers_list->CP2Address1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers_list->CP2Address2->Visible) { // CP2Address2 ?>
		<td data-name="CP2Address2" <?php echo $pharmacy_suppliers_list->CP2Address2->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCount ?>_pharmacy_suppliers_CP2Address2">
<span<?php echo $pharmacy_suppliers_list->CP2Address2->viewAttributes() ?>><?php echo $pharmacy_suppliers_list->CP2Address2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers_list->CP2Address3->Visible) { // CP2Address3 ?>
		<td data-name="CP2Address3" <?php echo $pharmacy_suppliers_list->CP2Address3->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCount ?>_pharmacy_suppliers_CP2Address3">
<span<?php echo $pharmacy_suppliers_list->CP2Address3->viewAttributes() ?>><?php echo $pharmacy_suppliers_list->CP2Address3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers_list->CP2Citycode->Visible) { // CP2Citycode ?>
		<td data-name="CP2Citycode" <?php echo $pharmacy_suppliers_list->CP2Citycode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCount ?>_pharmacy_suppliers_CP2Citycode">
<span<?php echo $pharmacy_suppliers_list->CP2Citycode->viewAttributes() ?>><?php echo $pharmacy_suppliers_list->CP2Citycode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers_list->CP2State->Visible) { // CP2State ?>
		<td data-name="CP2State" <?php echo $pharmacy_suppliers_list->CP2State->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCount ?>_pharmacy_suppliers_CP2State">
<span<?php echo $pharmacy_suppliers_list->CP2State->viewAttributes() ?>><?php echo $pharmacy_suppliers_list->CP2State->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers_list->CP2Pincode->Visible) { // CP2Pincode ?>
		<td data-name="CP2Pincode" <?php echo $pharmacy_suppliers_list->CP2Pincode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCount ?>_pharmacy_suppliers_CP2Pincode">
<span<?php echo $pharmacy_suppliers_list->CP2Pincode->viewAttributes() ?>><?php echo $pharmacy_suppliers_list->CP2Pincode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers_list->CP2Designation->Visible) { // CP2Designation ?>
		<td data-name="CP2Designation" <?php echo $pharmacy_suppliers_list->CP2Designation->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCount ?>_pharmacy_suppliers_CP2Designation">
<span<?php echo $pharmacy_suppliers_list->CP2Designation->viewAttributes() ?>><?php echo $pharmacy_suppliers_list->CP2Designation->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers_list->CP2Phone->Visible) { // CP2Phone ?>
		<td data-name="CP2Phone" <?php echo $pharmacy_suppliers_list->CP2Phone->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCount ?>_pharmacy_suppliers_CP2Phone">
<span<?php echo $pharmacy_suppliers_list->CP2Phone->viewAttributes() ?>><?php echo $pharmacy_suppliers_list->CP2Phone->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers_list->CP2MobileNo->Visible) { // CP2MobileNo ?>
		<td data-name="CP2MobileNo" <?php echo $pharmacy_suppliers_list->CP2MobileNo->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCount ?>_pharmacy_suppliers_CP2MobileNo">
<span<?php echo $pharmacy_suppliers_list->CP2MobileNo->viewAttributes() ?>><?php echo $pharmacy_suppliers_list->CP2MobileNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers_list->CP2Fax->Visible) { // CP2Fax ?>
		<td data-name="CP2Fax" <?php echo $pharmacy_suppliers_list->CP2Fax->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCount ?>_pharmacy_suppliers_CP2Fax">
<span<?php echo $pharmacy_suppliers_list->CP2Fax->viewAttributes() ?>><?php echo $pharmacy_suppliers_list->CP2Fax->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers_list->CP2Email->Visible) { // CP2Email ?>
		<td data-name="CP2Email" <?php echo $pharmacy_suppliers_list->CP2Email->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCount ?>_pharmacy_suppliers_CP2Email">
<span<?php echo $pharmacy_suppliers_list->CP2Email->viewAttributes() ?>><?php echo $pharmacy_suppliers_list->CP2Email->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers_list->Type->Visible) { // Type ?>
		<td data-name="Type" <?php echo $pharmacy_suppliers_list->Type->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCount ?>_pharmacy_suppliers_Type">
<span<?php echo $pharmacy_suppliers_list->Type->viewAttributes() ?>><?php echo $pharmacy_suppliers_list->Type->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers_list->Creditterms->Visible) { // Creditterms ?>
		<td data-name="Creditterms" <?php echo $pharmacy_suppliers_list->Creditterms->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCount ?>_pharmacy_suppliers_Creditterms">
<span<?php echo $pharmacy_suppliers_list->Creditterms->viewAttributes() ?>><?php echo $pharmacy_suppliers_list->Creditterms->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers_list->Remarks->Visible) { // Remarks ?>
		<td data-name="Remarks" <?php echo $pharmacy_suppliers_list->Remarks->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCount ?>_pharmacy_suppliers_Remarks">
<span<?php echo $pharmacy_suppliers_list->Remarks->viewAttributes() ?>><?php echo $pharmacy_suppliers_list->Remarks->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers_list->Tinnumber->Visible) { // Tinnumber ?>
		<td data-name="Tinnumber" <?php echo $pharmacy_suppliers_list->Tinnumber->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCount ?>_pharmacy_suppliers_Tinnumber">
<span<?php echo $pharmacy_suppliers_list->Tinnumber->viewAttributes() ?>><?php echo $pharmacy_suppliers_list->Tinnumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers_list->Universalsuppliercode->Visible) { // Universalsuppliercode ?>
		<td data-name="Universalsuppliercode" <?php echo $pharmacy_suppliers_list->Universalsuppliercode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCount ?>_pharmacy_suppliers_Universalsuppliercode">
<span<?php echo $pharmacy_suppliers_list->Universalsuppliercode->viewAttributes() ?>><?php echo $pharmacy_suppliers_list->Universalsuppliercode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers_list->Mobilenumber->Visible) { // Mobilenumber ?>
		<td data-name="Mobilenumber" <?php echo $pharmacy_suppliers_list->Mobilenumber->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCount ?>_pharmacy_suppliers_Mobilenumber">
<span<?php echo $pharmacy_suppliers_list->Mobilenumber->viewAttributes() ?>><?php echo $pharmacy_suppliers_list->Mobilenumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers_list->PANNumber->Visible) { // PANNumber ?>
		<td data-name="PANNumber" <?php echo $pharmacy_suppliers_list->PANNumber->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCount ?>_pharmacy_suppliers_PANNumber">
<span<?php echo $pharmacy_suppliers_list->PANNumber->viewAttributes() ?>><?php echo $pharmacy_suppliers_list->PANNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers_list->SalesRepMobileNo->Visible) { // SalesRepMobileNo ?>
		<td data-name="SalesRepMobileNo" <?php echo $pharmacy_suppliers_list->SalesRepMobileNo->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCount ?>_pharmacy_suppliers_SalesRepMobileNo">
<span<?php echo $pharmacy_suppliers_list->SalesRepMobileNo->viewAttributes() ?>><?php echo $pharmacy_suppliers_list->SalesRepMobileNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers_list->GSTNumber->Visible) { // GSTNumber ?>
		<td data-name="GSTNumber" <?php echo $pharmacy_suppliers_list->GSTNumber->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCount ?>_pharmacy_suppliers_GSTNumber">
<span<?php echo $pharmacy_suppliers_list->GSTNumber->viewAttributes() ?>><?php echo $pharmacy_suppliers_list->GSTNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers_list->TANNumber->Visible) { // TANNumber ?>
		<td data-name="TANNumber" <?php echo $pharmacy_suppliers_list->TANNumber->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCount ?>_pharmacy_suppliers_TANNumber">
<span<?php echo $pharmacy_suppliers_list->TANNumber->viewAttributes() ?>><?php echo $pharmacy_suppliers_list->TANNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $pharmacy_suppliers_list->id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCount ?>_pharmacy_suppliers_id">
<span<?php echo $pharmacy_suppliers_list->id->viewAttributes() ?>><?php echo $pharmacy_suppliers_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_suppliers_list->ListOptions->render("body", "right", $pharmacy_suppliers_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$pharmacy_suppliers_list->isGridAdd())
		$pharmacy_suppliers_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$pharmacy_suppliers->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pharmacy_suppliers_list->Recordset)
	$pharmacy_suppliers_list->Recordset->Close();
?>
<?php if (!$pharmacy_suppliers_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$pharmacy_suppliers_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $pharmacy_suppliers_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_suppliers_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pharmacy_suppliers_list->TotalRecords == 0 && !$pharmacy_suppliers->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pharmacy_suppliers_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$pharmacy_suppliers_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_suppliers_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$pharmacy_suppliers->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_pharmacy_suppliers",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$pharmacy_suppliers_list->terminate();
?>