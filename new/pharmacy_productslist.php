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
$pharmacy_products_list = new pharmacy_products_list();

// Run the page
$pharmacy_products_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_products_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$pharmacy_products_list->isExport()) { ?>
<script>
var fpharmacy_productslist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fpharmacy_productslist = currentForm = new ew.Form("fpharmacy_productslist", "list");
	fpharmacy_productslist.formKeyCountName = '<?php echo $pharmacy_products_list->FormKeyCountName ?>';
	loadjs.done("fpharmacy_productslist");
});
var fpharmacy_productslistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fpharmacy_productslistsrch = currentSearchForm = new ew.Form("fpharmacy_productslistsrch");

	// Dynamic selection lists
	// Filters

	fpharmacy_productslistsrch.filterList = <?php echo $pharmacy_products_list->getFilterList() ?>;
	loadjs.done("fpharmacy_productslistsrch");
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
<?php if (!$pharmacy_products_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($pharmacy_products_list->TotalRecords > 0 && $pharmacy_products_list->ExportOptions->visible()) { ?>
<?php $pharmacy_products_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_products_list->ImportOptions->visible()) { ?>
<?php $pharmacy_products_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_products_list->SearchOptions->visible()) { ?>
<?php $pharmacy_products_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_products_list->FilterOptions->visible()) { ?>
<?php $pharmacy_products_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$pharmacy_products_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$pharmacy_products_list->isExport() && !$pharmacy_products->CurrentAction) { ?>
<form name="fpharmacy_productslistsrch" id="fpharmacy_productslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fpharmacy_productslistsrch-search-panel" class="<?php echo $pharmacy_products_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pharmacy_products">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $pharmacy_products_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($pharmacy_products_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($pharmacy_products_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $pharmacy_products_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($pharmacy_products_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_products_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_products_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_products_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $pharmacy_products_list->showPageHeader(); ?>
<?php
$pharmacy_products_list->showMessage();
?>
<?php if ($pharmacy_products_list->TotalRecords > 0 || $pharmacy_products->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pharmacy_products_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pharmacy_products">
<?php if (!$pharmacy_products_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$pharmacy_products_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $pharmacy_products_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_products_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpharmacy_productslist" id="fpharmacy_productslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_products">
<div id="gmp_pharmacy_products" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($pharmacy_products_list->TotalRecords > 0 || $pharmacy_products_list->isGridEdit()) { ?>
<table id="tbl_pharmacy_productslist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pharmacy_products->RowType = ROWTYPE_HEADER;

// Render list options
$pharmacy_products_list->renderListOptions();

// Render list options (header, left)
$pharmacy_products_list->ListOptions->render("header", "left");
?>
<?php if ($pharmacy_products_list->ProductCode->Visible) { // ProductCode ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->ProductCode) == "") { ?>
		<th data-name="ProductCode" class="<?php echo $pharmacy_products_list->ProductCode->headerCellClass() ?>"><div id="elh_pharmacy_products_ProductCode" class="pharmacy_products_ProductCode"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->ProductCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProductCode" class="<?php echo $pharmacy_products_list->ProductCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->ProductCode) ?>', 1);"><div id="elh_pharmacy_products_ProductCode" class="pharmacy_products_ProductCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->ProductCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->ProductCode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->ProductCode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->ProductName->Visible) { // ProductName ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->ProductName) == "") { ?>
		<th data-name="ProductName" class="<?php echo $pharmacy_products_list->ProductName->headerCellClass() ?>"><div id="elh_pharmacy_products_ProductName" class="pharmacy_products_ProductName"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->ProductName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProductName" class="<?php echo $pharmacy_products_list->ProductName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->ProductName) ?>', 1);"><div id="elh_pharmacy_products_ProductName" class="pharmacy_products_ProductName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->ProductName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->ProductName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->ProductName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->DivisionCode->Visible) { // DivisionCode ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->DivisionCode) == "") { ?>
		<th data-name="DivisionCode" class="<?php echo $pharmacy_products_list->DivisionCode->headerCellClass() ?>"><div id="elh_pharmacy_products_DivisionCode" class="pharmacy_products_DivisionCode"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->DivisionCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DivisionCode" class="<?php echo $pharmacy_products_list->DivisionCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->DivisionCode) ?>', 1);"><div id="elh_pharmacy_products_DivisionCode" class="pharmacy_products_DivisionCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->DivisionCode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->DivisionCode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->DivisionCode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->ManufacturerCode->Visible) { // ManufacturerCode ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->ManufacturerCode) == "") { ?>
		<th data-name="ManufacturerCode" class="<?php echo $pharmacy_products_list->ManufacturerCode->headerCellClass() ?>"><div id="elh_pharmacy_products_ManufacturerCode" class="pharmacy_products_ManufacturerCode"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->ManufacturerCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ManufacturerCode" class="<?php echo $pharmacy_products_list->ManufacturerCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->ManufacturerCode) ?>', 1);"><div id="elh_pharmacy_products_ManufacturerCode" class="pharmacy_products_ManufacturerCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->ManufacturerCode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->ManufacturerCode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->ManufacturerCode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->SupplierCode->Visible) { // SupplierCode ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->SupplierCode) == "") { ?>
		<th data-name="SupplierCode" class="<?php echo $pharmacy_products_list->SupplierCode->headerCellClass() ?>"><div id="elh_pharmacy_products_SupplierCode" class="pharmacy_products_SupplierCode"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->SupplierCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SupplierCode" class="<?php echo $pharmacy_products_list->SupplierCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->SupplierCode) ?>', 1);"><div id="elh_pharmacy_products_SupplierCode" class="pharmacy_products_SupplierCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->SupplierCode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->SupplierCode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->SupplierCode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->AlternateSupplierCodes->Visible) { // AlternateSupplierCodes ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->AlternateSupplierCodes) == "") { ?>
		<th data-name="AlternateSupplierCodes" class="<?php echo $pharmacy_products_list->AlternateSupplierCodes->headerCellClass() ?>"><div id="elh_pharmacy_products_AlternateSupplierCodes" class="pharmacy_products_AlternateSupplierCodes"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->AlternateSupplierCodes->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AlternateSupplierCodes" class="<?php echo $pharmacy_products_list->AlternateSupplierCodes->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->AlternateSupplierCodes) ?>', 1);"><div id="elh_pharmacy_products_AlternateSupplierCodes" class="pharmacy_products_AlternateSupplierCodes">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->AlternateSupplierCodes->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->AlternateSupplierCodes->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->AlternateSupplierCodes->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->AlternateProductCode->Visible) { // AlternateProductCode ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->AlternateProductCode) == "") { ?>
		<th data-name="AlternateProductCode" class="<?php echo $pharmacy_products_list->AlternateProductCode->headerCellClass() ?>"><div id="elh_pharmacy_products_AlternateProductCode" class="pharmacy_products_AlternateProductCode"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->AlternateProductCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AlternateProductCode" class="<?php echo $pharmacy_products_list->AlternateProductCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->AlternateProductCode) ?>', 1);"><div id="elh_pharmacy_products_AlternateProductCode" class="pharmacy_products_AlternateProductCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->AlternateProductCode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->AlternateProductCode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->AlternateProductCode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->UniversalProductCode->Visible) { // UniversalProductCode ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->UniversalProductCode) == "") { ?>
		<th data-name="UniversalProductCode" class="<?php echo $pharmacy_products_list->UniversalProductCode->headerCellClass() ?>"><div id="elh_pharmacy_products_UniversalProductCode" class="pharmacy_products_UniversalProductCode"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->UniversalProductCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UniversalProductCode" class="<?php echo $pharmacy_products_list->UniversalProductCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->UniversalProductCode) ?>', 1);"><div id="elh_pharmacy_products_UniversalProductCode" class="pharmacy_products_UniversalProductCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->UniversalProductCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->UniversalProductCode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->UniversalProductCode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->BookProductCode->Visible) { // BookProductCode ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->BookProductCode) == "") { ?>
		<th data-name="BookProductCode" class="<?php echo $pharmacy_products_list->BookProductCode->headerCellClass() ?>"><div id="elh_pharmacy_products_BookProductCode" class="pharmacy_products_BookProductCode"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->BookProductCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BookProductCode" class="<?php echo $pharmacy_products_list->BookProductCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->BookProductCode) ?>', 1);"><div id="elh_pharmacy_products_BookProductCode" class="pharmacy_products_BookProductCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->BookProductCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->BookProductCode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->BookProductCode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->OldCode->Visible) { // OldCode ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->OldCode) == "") { ?>
		<th data-name="OldCode" class="<?php echo $pharmacy_products_list->OldCode->headerCellClass() ?>"><div id="elh_pharmacy_products_OldCode" class="pharmacy_products_OldCode"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->OldCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OldCode" class="<?php echo $pharmacy_products_list->OldCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->OldCode) ?>', 1);"><div id="elh_pharmacy_products_OldCode" class="pharmacy_products_OldCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->OldCode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->OldCode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->OldCode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->ProtectedProducts->Visible) { // ProtectedProducts ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->ProtectedProducts) == "") { ?>
		<th data-name="ProtectedProducts" class="<?php echo $pharmacy_products_list->ProtectedProducts->headerCellClass() ?>"><div id="elh_pharmacy_products_ProtectedProducts" class="pharmacy_products_ProtectedProducts"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->ProtectedProducts->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProtectedProducts" class="<?php echo $pharmacy_products_list->ProtectedProducts->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->ProtectedProducts) ?>', 1);"><div id="elh_pharmacy_products_ProtectedProducts" class="pharmacy_products_ProtectedProducts">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->ProtectedProducts->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->ProtectedProducts->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->ProtectedProducts->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->ProductFullName->Visible) { // ProductFullName ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->ProductFullName) == "") { ?>
		<th data-name="ProductFullName" class="<?php echo $pharmacy_products_list->ProductFullName->headerCellClass() ?>"><div id="elh_pharmacy_products_ProductFullName" class="pharmacy_products_ProductFullName"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->ProductFullName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProductFullName" class="<?php echo $pharmacy_products_list->ProductFullName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->ProductFullName) ?>', 1);"><div id="elh_pharmacy_products_ProductFullName" class="pharmacy_products_ProductFullName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->ProductFullName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->ProductFullName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->ProductFullName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->UnitOfMeasure->Visible) { // UnitOfMeasure ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->UnitOfMeasure) == "") { ?>
		<th data-name="UnitOfMeasure" class="<?php echo $pharmacy_products_list->UnitOfMeasure->headerCellClass() ?>"><div id="elh_pharmacy_products_UnitOfMeasure" class="pharmacy_products_UnitOfMeasure"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->UnitOfMeasure->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UnitOfMeasure" class="<?php echo $pharmacy_products_list->UnitOfMeasure->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->UnitOfMeasure) ?>', 1);"><div id="elh_pharmacy_products_UnitOfMeasure" class="pharmacy_products_UnitOfMeasure">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->UnitOfMeasure->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->UnitOfMeasure->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->UnitOfMeasure->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->UnitDescription->Visible) { // UnitDescription ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->UnitDescription) == "") { ?>
		<th data-name="UnitDescription" class="<?php echo $pharmacy_products_list->UnitDescription->headerCellClass() ?>"><div id="elh_pharmacy_products_UnitDescription" class="pharmacy_products_UnitDescription"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->UnitDescription->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UnitDescription" class="<?php echo $pharmacy_products_list->UnitDescription->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->UnitDescription) ?>', 1);"><div id="elh_pharmacy_products_UnitDescription" class="pharmacy_products_UnitDescription">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->UnitDescription->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->UnitDescription->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->UnitDescription->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->BulkDescription->Visible) { // BulkDescription ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->BulkDescription) == "") { ?>
		<th data-name="BulkDescription" class="<?php echo $pharmacy_products_list->BulkDescription->headerCellClass() ?>"><div id="elh_pharmacy_products_BulkDescription" class="pharmacy_products_BulkDescription"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->BulkDescription->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BulkDescription" class="<?php echo $pharmacy_products_list->BulkDescription->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->BulkDescription) ?>', 1);"><div id="elh_pharmacy_products_BulkDescription" class="pharmacy_products_BulkDescription">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->BulkDescription->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->BulkDescription->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->BulkDescription->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->BarCodeDescription->Visible) { // BarCodeDescription ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->BarCodeDescription) == "") { ?>
		<th data-name="BarCodeDescription" class="<?php echo $pharmacy_products_list->BarCodeDescription->headerCellClass() ?>"><div id="elh_pharmacy_products_BarCodeDescription" class="pharmacy_products_BarCodeDescription"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->BarCodeDescription->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BarCodeDescription" class="<?php echo $pharmacy_products_list->BarCodeDescription->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->BarCodeDescription) ?>', 1);"><div id="elh_pharmacy_products_BarCodeDescription" class="pharmacy_products_BarCodeDescription">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->BarCodeDescription->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->BarCodeDescription->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->BarCodeDescription->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->PackageInformation->Visible) { // PackageInformation ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->PackageInformation) == "") { ?>
		<th data-name="PackageInformation" class="<?php echo $pharmacy_products_list->PackageInformation->headerCellClass() ?>"><div id="elh_pharmacy_products_PackageInformation" class="pharmacy_products_PackageInformation"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->PackageInformation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PackageInformation" class="<?php echo $pharmacy_products_list->PackageInformation->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->PackageInformation) ?>', 1);"><div id="elh_pharmacy_products_PackageInformation" class="pharmacy_products_PackageInformation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->PackageInformation->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->PackageInformation->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->PackageInformation->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->PackageId->Visible) { // PackageId ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->PackageId) == "") { ?>
		<th data-name="PackageId" class="<?php echo $pharmacy_products_list->PackageId->headerCellClass() ?>"><div id="elh_pharmacy_products_PackageId" class="pharmacy_products_PackageId"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->PackageId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PackageId" class="<?php echo $pharmacy_products_list->PackageId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->PackageId) ?>', 1);"><div id="elh_pharmacy_products_PackageId" class="pharmacy_products_PackageId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->PackageId->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->PackageId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->PackageId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->Weight->Visible) { // Weight ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->Weight) == "") { ?>
		<th data-name="Weight" class="<?php echo $pharmacy_products_list->Weight->headerCellClass() ?>"><div id="elh_pharmacy_products_Weight" class="pharmacy_products_Weight"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->Weight->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Weight" class="<?php echo $pharmacy_products_list->Weight->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->Weight) ?>', 1);"><div id="elh_pharmacy_products_Weight" class="pharmacy_products_Weight">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->Weight->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->Weight->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->Weight->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->AllowFractions->Visible) { // AllowFractions ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->AllowFractions) == "") { ?>
		<th data-name="AllowFractions" class="<?php echo $pharmacy_products_list->AllowFractions->headerCellClass() ?>"><div id="elh_pharmacy_products_AllowFractions" class="pharmacy_products_AllowFractions"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->AllowFractions->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AllowFractions" class="<?php echo $pharmacy_products_list->AllowFractions->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->AllowFractions) ?>', 1);"><div id="elh_pharmacy_products_AllowFractions" class="pharmacy_products_AllowFractions">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->AllowFractions->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->AllowFractions->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->AllowFractions->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->MinimumStockLevel->Visible) { // MinimumStockLevel ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->MinimumStockLevel) == "") { ?>
		<th data-name="MinimumStockLevel" class="<?php echo $pharmacy_products_list->MinimumStockLevel->headerCellClass() ?>"><div id="elh_pharmacy_products_MinimumStockLevel" class="pharmacy_products_MinimumStockLevel"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->MinimumStockLevel->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MinimumStockLevel" class="<?php echo $pharmacy_products_list->MinimumStockLevel->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->MinimumStockLevel) ?>', 1);"><div id="elh_pharmacy_products_MinimumStockLevel" class="pharmacy_products_MinimumStockLevel">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->MinimumStockLevel->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->MinimumStockLevel->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->MinimumStockLevel->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->MaximumStockLevel->Visible) { // MaximumStockLevel ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->MaximumStockLevel) == "") { ?>
		<th data-name="MaximumStockLevel" class="<?php echo $pharmacy_products_list->MaximumStockLevel->headerCellClass() ?>"><div id="elh_pharmacy_products_MaximumStockLevel" class="pharmacy_products_MaximumStockLevel"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->MaximumStockLevel->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MaximumStockLevel" class="<?php echo $pharmacy_products_list->MaximumStockLevel->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->MaximumStockLevel) ?>', 1);"><div id="elh_pharmacy_products_MaximumStockLevel" class="pharmacy_products_MaximumStockLevel">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->MaximumStockLevel->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->MaximumStockLevel->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->MaximumStockLevel->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->ReorderLevel->Visible) { // ReorderLevel ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->ReorderLevel) == "") { ?>
		<th data-name="ReorderLevel" class="<?php echo $pharmacy_products_list->ReorderLevel->headerCellClass() ?>"><div id="elh_pharmacy_products_ReorderLevel" class="pharmacy_products_ReorderLevel"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->ReorderLevel->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReorderLevel" class="<?php echo $pharmacy_products_list->ReorderLevel->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->ReorderLevel) ?>', 1);"><div id="elh_pharmacy_products_ReorderLevel" class="pharmacy_products_ReorderLevel">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->ReorderLevel->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->ReorderLevel->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->ReorderLevel->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->MinMaxRatio->Visible) { // MinMaxRatio ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->MinMaxRatio) == "") { ?>
		<th data-name="MinMaxRatio" class="<?php echo $pharmacy_products_list->MinMaxRatio->headerCellClass() ?>"><div id="elh_pharmacy_products_MinMaxRatio" class="pharmacy_products_MinMaxRatio"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->MinMaxRatio->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MinMaxRatio" class="<?php echo $pharmacy_products_list->MinMaxRatio->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->MinMaxRatio) ?>', 1);"><div id="elh_pharmacy_products_MinMaxRatio" class="pharmacy_products_MinMaxRatio">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->MinMaxRatio->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->MinMaxRatio->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->MinMaxRatio->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->AutoMinMaxRatio->Visible) { // AutoMinMaxRatio ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->AutoMinMaxRatio) == "") { ?>
		<th data-name="AutoMinMaxRatio" class="<?php echo $pharmacy_products_list->AutoMinMaxRatio->headerCellClass() ?>"><div id="elh_pharmacy_products_AutoMinMaxRatio" class="pharmacy_products_AutoMinMaxRatio"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->AutoMinMaxRatio->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AutoMinMaxRatio" class="<?php echo $pharmacy_products_list->AutoMinMaxRatio->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->AutoMinMaxRatio) ?>', 1);"><div id="elh_pharmacy_products_AutoMinMaxRatio" class="pharmacy_products_AutoMinMaxRatio">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->AutoMinMaxRatio->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->AutoMinMaxRatio->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->AutoMinMaxRatio->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->ScheduleCode->Visible) { // ScheduleCode ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->ScheduleCode) == "") { ?>
		<th data-name="ScheduleCode" class="<?php echo $pharmacy_products_list->ScheduleCode->headerCellClass() ?>"><div id="elh_pharmacy_products_ScheduleCode" class="pharmacy_products_ScheduleCode"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->ScheduleCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ScheduleCode" class="<?php echo $pharmacy_products_list->ScheduleCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->ScheduleCode) ?>', 1);"><div id="elh_pharmacy_products_ScheduleCode" class="pharmacy_products_ScheduleCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->ScheduleCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->ScheduleCode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->ScheduleCode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->RopRatio->Visible) { // RopRatio ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->RopRatio) == "") { ?>
		<th data-name="RopRatio" class="<?php echo $pharmacy_products_list->RopRatio->headerCellClass() ?>"><div id="elh_pharmacy_products_RopRatio" class="pharmacy_products_RopRatio"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->RopRatio->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RopRatio" class="<?php echo $pharmacy_products_list->RopRatio->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->RopRatio) ?>', 1);"><div id="elh_pharmacy_products_RopRatio" class="pharmacy_products_RopRatio">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->RopRatio->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->RopRatio->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->RopRatio->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->MRP->Visible) { // MRP ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->MRP) == "") { ?>
		<th data-name="MRP" class="<?php echo $pharmacy_products_list->MRP->headerCellClass() ?>"><div id="elh_pharmacy_products_MRP" class="pharmacy_products_MRP"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->MRP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MRP" class="<?php echo $pharmacy_products_list->MRP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->MRP) ?>', 1);"><div id="elh_pharmacy_products_MRP" class="pharmacy_products_MRP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->MRP->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->MRP->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->MRP->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->PurchasePrice->Visible) { // PurchasePrice ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->PurchasePrice) == "") { ?>
		<th data-name="PurchasePrice" class="<?php echo $pharmacy_products_list->PurchasePrice->headerCellClass() ?>"><div id="elh_pharmacy_products_PurchasePrice" class="pharmacy_products_PurchasePrice"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->PurchasePrice->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PurchasePrice" class="<?php echo $pharmacy_products_list->PurchasePrice->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->PurchasePrice) ?>', 1);"><div id="elh_pharmacy_products_PurchasePrice" class="pharmacy_products_PurchasePrice">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->PurchasePrice->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->PurchasePrice->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->PurchasePrice->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->PurchaseUnit->Visible) { // PurchaseUnit ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->PurchaseUnit) == "") { ?>
		<th data-name="PurchaseUnit" class="<?php echo $pharmacy_products_list->PurchaseUnit->headerCellClass() ?>"><div id="elh_pharmacy_products_PurchaseUnit" class="pharmacy_products_PurchaseUnit"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->PurchaseUnit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PurchaseUnit" class="<?php echo $pharmacy_products_list->PurchaseUnit->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->PurchaseUnit) ?>', 1);"><div id="elh_pharmacy_products_PurchaseUnit" class="pharmacy_products_PurchaseUnit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->PurchaseUnit->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->PurchaseUnit->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->PurchaseUnit->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->PurchaseTaxCode->Visible) { // PurchaseTaxCode ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->PurchaseTaxCode) == "") { ?>
		<th data-name="PurchaseTaxCode" class="<?php echo $pharmacy_products_list->PurchaseTaxCode->headerCellClass() ?>"><div id="elh_pharmacy_products_PurchaseTaxCode" class="pharmacy_products_PurchaseTaxCode"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->PurchaseTaxCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PurchaseTaxCode" class="<?php echo $pharmacy_products_list->PurchaseTaxCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->PurchaseTaxCode) ?>', 1);"><div id="elh_pharmacy_products_PurchaseTaxCode" class="pharmacy_products_PurchaseTaxCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->PurchaseTaxCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->PurchaseTaxCode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->PurchaseTaxCode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->AllowDirectInward->Visible) { // AllowDirectInward ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->AllowDirectInward) == "") { ?>
		<th data-name="AllowDirectInward" class="<?php echo $pharmacy_products_list->AllowDirectInward->headerCellClass() ?>"><div id="elh_pharmacy_products_AllowDirectInward" class="pharmacy_products_AllowDirectInward"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->AllowDirectInward->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AllowDirectInward" class="<?php echo $pharmacy_products_list->AllowDirectInward->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->AllowDirectInward) ?>', 1);"><div id="elh_pharmacy_products_AllowDirectInward" class="pharmacy_products_AllowDirectInward">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->AllowDirectInward->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->AllowDirectInward->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->AllowDirectInward->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->SalePrice->Visible) { // SalePrice ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->SalePrice) == "") { ?>
		<th data-name="SalePrice" class="<?php echo $pharmacy_products_list->SalePrice->headerCellClass() ?>"><div id="elh_pharmacy_products_SalePrice" class="pharmacy_products_SalePrice"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->SalePrice->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SalePrice" class="<?php echo $pharmacy_products_list->SalePrice->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->SalePrice) ?>', 1);"><div id="elh_pharmacy_products_SalePrice" class="pharmacy_products_SalePrice">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->SalePrice->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->SalePrice->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->SalePrice->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->SaleUnit->Visible) { // SaleUnit ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->SaleUnit) == "") { ?>
		<th data-name="SaleUnit" class="<?php echo $pharmacy_products_list->SaleUnit->headerCellClass() ?>"><div id="elh_pharmacy_products_SaleUnit" class="pharmacy_products_SaleUnit"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->SaleUnit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SaleUnit" class="<?php echo $pharmacy_products_list->SaleUnit->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->SaleUnit) ?>', 1);"><div id="elh_pharmacy_products_SaleUnit" class="pharmacy_products_SaleUnit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->SaleUnit->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->SaleUnit->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->SaleUnit->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->SalesTaxCode->Visible) { // SalesTaxCode ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->SalesTaxCode) == "") { ?>
		<th data-name="SalesTaxCode" class="<?php echo $pharmacy_products_list->SalesTaxCode->headerCellClass() ?>"><div id="elh_pharmacy_products_SalesTaxCode" class="pharmacy_products_SalesTaxCode"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->SalesTaxCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SalesTaxCode" class="<?php echo $pharmacy_products_list->SalesTaxCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->SalesTaxCode) ?>', 1);"><div id="elh_pharmacy_products_SalesTaxCode" class="pharmacy_products_SalesTaxCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->SalesTaxCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->SalesTaxCode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->SalesTaxCode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->StockReceived->Visible) { // StockReceived ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->StockReceived) == "") { ?>
		<th data-name="StockReceived" class="<?php echo $pharmacy_products_list->StockReceived->headerCellClass() ?>"><div id="elh_pharmacy_products_StockReceived" class="pharmacy_products_StockReceived"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->StockReceived->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StockReceived" class="<?php echo $pharmacy_products_list->StockReceived->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->StockReceived) ?>', 1);"><div id="elh_pharmacy_products_StockReceived" class="pharmacy_products_StockReceived">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->StockReceived->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->StockReceived->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->StockReceived->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->TotalStock->Visible) { // TotalStock ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->TotalStock) == "") { ?>
		<th data-name="TotalStock" class="<?php echo $pharmacy_products_list->TotalStock->headerCellClass() ?>"><div id="elh_pharmacy_products_TotalStock" class="pharmacy_products_TotalStock"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->TotalStock->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TotalStock" class="<?php echo $pharmacy_products_list->TotalStock->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->TotalStock) ?>', 1);"><div id="elh_pharmacy_products_TotalStock" class="pharmacy_products_TotalStock">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->TotalStock->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->TotalStock->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->TotalStock->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->StockType->Visible) { // StockType ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->StockType) == "") { ?>
		<th data-name="StockType" class="<?php echo $pharmacy_products_list->StockType->headerCellClass() ?>"><div id="elh_pharmacy_products_StockType" class="pharmacy_products_StockType"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->StockType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StockType" class="<?php echo $pharmacy_products_list->StockType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->StockType) ?>', 1);"><div id="elh_pharmacy_products_StockType" class="pharmacy_products_StockType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->StockType->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->StockType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->StockType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->StockCheckDate->Visible) { // StockCheckDate ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->StockCheckDate) == "") { ?>
		<th data-name="StockCheckDate" class="<?php echo $pharmacy_products_list->StockCheckDate->headerCellClass() ?>"><div id="elh_pharmacy_products_StockCheckDate" class="pharmacy_products_StockCheckDate"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->StockCheckDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StockCheckDate" class="<?php echo $pharmacy_products_list->StockCheckDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->StockCheckDate) ?>', 1);"><div id="elh_pharmacy_products_StockCheckDate" class="pharmacy_products_StockCheckDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->StockCheckDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->StockCheckDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->StockCheckDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->StockAdjustmentDate->Visible) { // StockAdjustmentDate ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->StockAdjustmentDate) == "") { ?>
		<th data-name="StockAdjustmentDate" class="<?php echo $pharmacy_products_list->StockAdjustmentDate->headerCellClass() ?>"><div id="elh_pharmacy_products_StockAdjustmentDate" class="pharmacy_products_StockAdjustmentDate"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->StockAdjustmentDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StockAdjustmentDate" class="<?php echo $pharmacy_products_list->StockAdjustmentDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->StockAdjustmentDate) ?>', 1);"><div id="elh_pharmacy_products_StockAdjustmentDate" class="pharmacy_products_StockAdjustmentDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->StockAdjustmentDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->StockAdjustmentDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->StockAdjustmentDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->Remarks->Visible) { // Remarks ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->Remarks) == "") { ?>
		<th data-name="Remarks" class="<?php echo $pharmacy_products_list->Remarks->headerCellClass() ?>"><div id="elh_pharmacy_products_Remarks" class="pharmacy_products_Remarks"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->Remarks->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Remarks" class="<?php echo $pharmacy_products_list->Remarks->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->Remarks) ?>', 1);"><div id="elh_pharmacy_products_Remarks" class="pharmacy_products_Remarks">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->Remarks->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->Remarks->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->Remarks->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->CostCentre->Visible) { // CostCentre ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->CostCentre) == "") { ?>
		<th data-name="CostCentre" class="<?php echo $pharmacy_products_list->CostCentre->headerCellClass() ?>"><div id="elh_pharmacy_products_CostCentre" class="pharmacy_products_CostCentre"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->CostCentre->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CostCentre" class="<?php echo $pharmacy_products_list->CostCentre->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->CostCentre) ?>', 1);"><div id="elh_pharmacy_products_CostCentre" class="pharmacy_products_CostCentre">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->CostCentre->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->CostCentre->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->CostCentre->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->ProductType->Visible) { // ProductType ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->ProductType) == "") { ?>
		<th data-name="ProductType" class="<?php echo $pharmacy_products_list->ProductType->headerCellClass() ?>"><div id="elh_pharmacy_products_ProductType" class="pharmacy_products_ProductType"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->ProductType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProductType" class="<?php echo $pharmacy_products_list->ProductType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->ProductType) ?>', 1);"><div id="elh_pharmacy_products_ProductType" class="pharmacy_products_ProductType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->ProductType->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->ProductType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->ProductType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->TaxAmount->Visible) { // TaxAmount ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->TaxAmount) == "") { ?>
		<th data-name="TaxAmount" class="<?php echo $pharmacy_products_list->TaxAmount->headerCellClass() ?>"><div id="elh_pharmacy_products_TaxAmount" class="pharmacy_products_TaxAmount"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->TaxAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TaxAmount" class="<?php echo $pharmacy_products_list->TaxAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->TaxAmount) ?>', 1);"><div id="elh_pharmacy_products_TaxAmount" class="pharmacy_products_TaxAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->TaxAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->TaxAmount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->TaxAmount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->TaxId->Visible) { // TaxId ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->TaxId) == "") { ?>
		<th data-name="TaxId" class="<?php echo $pharmacy_products_list->TaxId->headerCellClass() ?>"><div id="elh_pharmacy_products_TaxId" class="pharmacy_products_TaxId"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->TaxId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TaxId" class="<?php echo $pharmacy_products_list->TaxId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->TaxId) ?>', 1);"><div id="elh_pharmacy_products_TaxId" class="pharmacy_products_TaxId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->TaxId->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->TaxId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->TaxId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->ResaleTaxApplicable->Visible) { // ResaleTaxApplicable ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->ResaleTaxApplicable) == "") { ?>
		<th data-name="ResaleTaxApplicable" class="<?php echo $pharmacy_products_list->ResaleTaxApplicable->headerCellClass() ?>"><div id="elh_pharmacy_products_ResaleTaxApplicable" class="pharmacy_products_ResaleTaxApplicable"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->ResaleTaxApplicable->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ResaleTaxApplicable" class="<?php echo $pharmacy_products_list->ResaleTaxApplicable->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->ResaleTaxApplicable) ?>', 1);"><div id="elh_pharmacy_products_ResaleTaxApplicable" class="pharmacy_products_ResaleTaxApplicable">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->ResaleTaxApplicable->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->ResaleTaxApplicable->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->ResaleTaxApplicable->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->CstOtherTax->Visible) { // CstOtherTax ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->CstOtherTax) == "") { ?>
		<th data-name="CstOtherTax" class="<?php echo $pharmacy_products_list->CstOtherTax->headerCellClass() ?>"><div id="elh_pharmacy_products_CstOtherTax" class="pharmacy_products_CstOtherTax"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->CstOtherTax->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CstOtherTax" class="<?php echo $pharmacy_products_list->CstOtherTax->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->CstOtherTax) ?>', 1);"><div id="elh_pharmacy_products_CstOtherTax" class="pharmacy_products_CstOtherTax">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->CstOtherTax->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->CstOtherTax->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->CstOtherTax->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->TotalTax->Visible) { // TotalTax ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->TotalTax) == "") { ?>
		<th data-name="TotalTax" class="<?php echo $pharmacy_products_list->TotalTax->headerCellClass() ?>"><div id="elh_pharmacy_products_TotalTax" class="pharmacy_products_TotalTax"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->TotalTax->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TotalTax" class="<?php echo $pharmacy_products_list->TotalTax->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->TotalTax) ?>', 1);"><div id="elh_pharmacy_products_TotalTax" class="pharmacy_products_TotalTax">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->TotalTax->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->TotalTax->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->TotalTax->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->ItemCost->Visible) { // ItemCost ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->ItemCost) == "") { ?>
		<th data-name="ItemCost" class="<?php echo $pharmacy_products_list->ItemCost->headerCellClass() ?>"><div id="elh_pharmacy_products_ItemCost" class="pharmacy_products_ItemCost"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->ItemCost->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ItemCost" class="<?php echo $pharmacy_products_list->ItemCost->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->ItemCost) ?>', 1);"><div id="elh_pharmacy_products_ItemCost" class="pharmacy_products_ItemCost">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->ItemCost->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->ItemCost->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->ItemCost->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->ExpiryDate->Visible) { // ExpiryDate ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->ExpiryDate) == "") { ?>
		<th data-name="ExpiryDate" class="<?php echo $pharmacy_products_list->ExpiryDate->headerCellClass() ?>"><div id="elh_pharmacy_products_ExpiryDate" class="pharmacy_products_ExpiryDate"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->ExpiryDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ExpiryDate" class="<?php echo $pharmacy_products_list->ExpiryDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->ExpiryDate) ?>', 1);"><div id="elh_pharmacy_products_ExpiryDate" class="pharmacy_products_ExpiryDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->ExpiryDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->ExpiryDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->ExpiryDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->BatchDescription->Visible) { // BatchDescription ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->BatchDescription) == "") { ?>
		<th data-name="BatchDescription" class="<?php echo $pharmacy_products_list->BatchDescription->headerCellClass() ?>"><div id="elh_pharmacy_products_BatchDescription" class="pharmacy_products_BatchDescription"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->BatchDescription->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BatchDescription" class="<?php echo $pharmacy_products_list->BatchDescription->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->BatchDescription) ?>', 1);"><div id="elh_pharmacy_products_BatchDescription" class="pharmacy_products_BatchDescription">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->BatchDescription->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->BatchDescription->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->BatchDescription->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->FreeScheme->Visible) { // FreeScheme ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->FreeScheme) == "") { ?>
		<th data-name="FreeScheme" class="<?php echo $pharmacy_products_list->FreeScheme->headerCellClass() ?>"><div id="elh_pharmacy_products_FreeScheme" class="pharmacy_products_FreeScheme"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->FreeScheme->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FreeScheme" class="<?php echo $pharmacy_products_list->FreeScheme->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->FreeScheme) ?>', 1);"><div id="elh_pharmacy_products_FreeScheme" class="pharmacy_products_FreeScheme">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->FreeScheme->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->FreeScheme->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->FreeScheme->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->CashDiscountEligibility->Visible) { // CashDiscountEligibility ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->CashDiscountEligibility) == "") { ?>
		<th data-name="CashDiscountEligibility" class="<?php echo $pharmacy_products_list->CashDiscountEligibility->headerCellClass() ?>"><div id="elh_pharmacy_products_CashDiscountEligibility" class="pharmacy_products_CashDiscountEligibility"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->CashDiscountEligibility->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CashDiscountEligibility" class="<?php echo $pharmacy_products_list->CashDiscountEligibility->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->CashDiscountEligibility) ?>', 1);"><div id="elh_pharmacy_products_CashDiscountEligibility" class="pharmacy_products_CashDiscountEligibility">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->CashDiscountEligibility->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->CashDiscountEligibility->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->CashDiscountEligibility->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->DiscountPerAllowInBill->Visible) { // DiscountPerAllowInBill ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->DiscountPerAllowInBill) == "") { ?>
		<th data-name="DiscountPerAllowInBill" class="<?php echo $pharmacy_products_list->DiscountPerAllowInBill->headerCellClass() ?>"><div id="elh_pharmacy_products_DiscountPerAllowInBill" class="pharmacy_products_DiscountPerAllowInBill"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->DiscountPerAllowInBill->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DiscountPerAllowInBill" class="<?php echo $pharmacy_products_list->DiscountPerAllowInBill->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->DiscountPerAllowInBill) ?>', 1);"><div id="elh_pharmacy_products_DiscountPerAllowInBill" class="pharmacy_products_DiscountPerAllowInBill">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->DiscountPerAllowInBill->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->DiscountPerAllowInBill->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->DiscountPerAllowInBill->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->Discount->Visible) { // Discount ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->Discount) == "") { ?>
		<th data-name="Discount" class="<?php echo $pharmacy_products_list->Discount->headerCellClass() ?>"><div id="elh_pharmacy_products_Discount" class="pharmacy_products_Discount"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->Discount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Discount" class="<?php echo $pharmacy_products_list->Discount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->Discount) ?>', 1);"><div id="elh_pharmacy_products_Discount" class="pharmacy_products_Discount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->Discount->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->Discount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->Discount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->TotalAmount->Visible) { // TotalAmount ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->TotalAmount) == "") { ?>
		<th data-name="TotalAmount" class="<?php echo $pharmacy_products_list->TotalAmount->headerCellClass() ?>"><div id="elh_pharmacy_products_TotalAmount" class="pharmacy_products_TotalAmount"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->TotalAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TotalAmount" class="<?php echo $pharmacy_products_list->TotalAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->TotalAmount) ?>', 1);"><div id="elh_pharmacy_products_TotalAmount" class="pharmacy_products_TotalAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->TotalAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->TotalAmount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->TotalAmount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->StandardMargin->Visible) { // StandardMargin ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->StandardMargin) == "") { ?>
		<th data-name="StandardMargin" class="<?php echo $pharmacy_products_list->StandardMargin->headerCellClass() ?>"><div id="elh_pharmacy_products_StandardMargin" class="pharmacy_products_StandardMargin"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->StandardMargin->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StandardMargin" class="<?php echo $pharmacy_products_list->StandardMargin->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->StandardMargin) ?>', 1);"><div id="elh_pharmacy_products_StandardMargin" class="pharmacy_products_StandardMargin">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->StandardMargin->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->StandardMargin->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->StandardMargin->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->Margin->Visible) { // Margin ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->Margin) == "") { ?>
		<th data-name="Margin" class="<?php echo $pharmacy_products_list->Margin->headerCellClass() ?>"><div id="elh_pharmacy_products_Margin" class="pharmacy_products_Margin"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->Margin->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Margin" class="<?php echo $pharmacy_products_list->Margin->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->Margin) ?>', 1);"><div id="elh_pharmacy_products_Margin" class="pharmacy_products_Margin">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->Margin->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->Margin->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->Margin->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->MarginId->Visible) { // MarginId ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->MarginId) == "") { ?>
		<th data-name="MarginId" class="<?php echo $pharmacy_products_list->MarginId->headerCellClass() ?>"><div id="elh_pharmacy_products_MarginId" class="pharmacy_products_MarginId"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->MarginId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MarginId" class="<?php echo $pharmacy_products_list->MarginId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->MarginId) ?>', 1);"><div id="elh_pharmacy_products_MarginId" class="pharmacy_products_MarginId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->MarginId->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->MarginId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->MarginId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->ExpectedMargin->Visible) { // ExpectedMargin ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->ExpectedMargin) == "") { ?>
		<th data-name="ExpectedMargin" class="<?php echo $pharmacy_products_list->ExpectedMargin->headerCellClass() ?>"><div id="elh_pharmacy_products_ExpectedMargin" class="pharmacy_products_ExpectedMargin"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->ExpectedMargin->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ExpectedMargin" class="<?php echo $pharmacy_products_list->ExpectedMargin->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->ExpectedMargin) ?>', 1);"><div id="elh_pharmacy_products_ExpectedMargin" class="pharmacy_products_ExpectedMargin">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->ExpectedMargin->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->ExpectedMargin->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->ExpectedMargin->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->SurchargeBeforeTax->Visible) { // SurchargeBeforeTax ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->SurchargeBeforeTax) == "") { ?>
		<th data-name="SurchargeBeforeTax" class="<?php echo $pharmacy_products_list->SurchargeBeforeTax->headerCellClass() ?>"><div id="elh_pharmacy_products_SurchargeBeforeTax" class="pharmacy_products_SurchargeBeforeTax"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->SurchargeBeforeTax->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SurchargeBeforeTax" class="<?php echo $pharmacy_products_list->SurchargeBeforeTax->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->SurchargeBeforeTax) ?>', 1);"><div id="elh_pharmacy_products_SurchargeBeforeTax" class="pharmacy_products_SurchargeBeforeTax">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->SurchargeBeforeTax->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->SurchargeBeforeTax->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->SurchargeBeforeTax->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->SurchargeAfterTax->Visible) { // SurchargeAfterTax ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->SurchargeAfterTax) == "") { ?>
		<th data-name="SurchargeAfterTax" class="<?php echo $pharmacy_products_list->SurchargeAfterTax->headerCellClass() ?>"><div id="elh_pharmacy_products_SurchargeAfterTax" class="pharmacy_products_SurchargeAfterTax"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->SurchargeAfterTax->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SurchargeAfterTax" class="<?php echo $pharmacy_products_list->SurchargeAfterTax->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->SurchargeAfterTax) ?>', 1);"><div id="elh_pharmacy_products_SurchargeAfterTax" class="pharmacy_products_SurchargeAfterTax">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->SurchargeAfterTax->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->SurchargeAfterTax->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->SurchargeAfterTax->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->TempOrderNo->Visible) { // TempOrderNo ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->TempOrderNo) == "") { ?>
		<th data-name="TempOrderNo" class="<?php echo $pharmacy_products_list->TempOrderNo->headerCellClass() ?>"><div id="elh_pharmacy_products_TempOrderNo" class="pharmacy_products_TempOrderNo"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->TempOrderNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TempOrderNo" class="<?php echo $pharmacy_products_list->TempOrderNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->TempOrderNo) ?>', 1);"><div id="elh_pharmacy_products_TempOrderNo" class="pharmacy_products_TempOrderNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->TempOrderNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->TempOrderNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->TempOrderNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->TempOrderDate->Visible) { // TempOrderDate ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->TempOrderDate) == "") { ?>
		<th data-name="TempOrderDate" class="<?php echo $pharmacy_products_list->TempOrderDate->headerCellClass() ?>"><div id="elh_pharmacy_products_TempOrderDate" class="pharmacy_products_TempOrderDate"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->TempOrderDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TempOrderDate" class="<?php echo $pharmacy_products_list->TempOrderDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->TempOrderDate) ?>', 1);"><div id="elh_pharmacy_products_TempOrderDate" class="pharmacy_products_TempOrderDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->TempOrderDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->TempOrderDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->TempOrderDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->OrderUnit->Visible) { // OrderUnit ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->OrderUnit) == "") { ?>
		<th data-name="OrderUnit" class="<?php echo $pharmacy_products_list->OrderUnit->headerCellClass() ?>"><div id="elh_pharmacy_products_OrderUnit" class="pharmacy_products_OrderUnit"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->OrderUnit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OrderUnit" class="<?php echo $pharmacy_products_list->OrderUnit->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->OrderUnit) ?>', 1);"><div id="elh_pharmacy_products_OrderUnit" class="pharmacy_products_OrderUnit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->OrderUnit->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->OrderUnit->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->OrderUnit->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->OrderQuantity->Visible) { // OrderQuantity ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->OrderQuantity) == "") { ?>
		<th data-name="OrderQuantity" class="<?php echo $pharmacy_products_list->OrderQuantity->headerCellClass() ?>"><div id="elh_pharmacy_products_OrderQuantity" class="pharmacy_products_OrderQuantity"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->OrderQuantity->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OrderQuantity" class="<?php echo $pharmacy_products_list->OrderQuantity->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->OrderQuantity) ?>', 1);"><div id="elh_pharmacy_products_OrderQuantity" class="pharmacy_products_OrderQuantity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->OrderQuantity->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->OrderQuantity->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->OrderQuantity->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->MarkForOrder->Visible) { // MarkForOrder ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->MarkForOrder) == "") { ?>
		<th data-name="MarkForOrder" class="<?php echo $pharmacy_products_list->MarkForOrder->headerCellClass() ?>"><div id="elh_pharmacy_products_MarkForOrder" class="pharmacy_products_MarkForOrder"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->MarkForOrder->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MarkForOrder" class="<?php echo $pharmacy_products_list->MarkForOrder->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->MarkForOrder) ?>', 1);"><div id="elh_pharmacy_products_MarkForOrder" class="pharmacy_products_MarkForOrder">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->MarkForOrder->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->MarkForOrder->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->MarkForOrder->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->OrderAllId->Visible) { // OrderAllId ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->OrderAllId) == "") { ?>
		<th data-name="OrderAllId" class="<?php echo $pharmacy_products_list->OrderAllId->headerCellClass() ?>"><div id="elh_pharmacy_products_OrderAllId" class="pharmacy_products_OrderAllId"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->OrderAllId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OrderAllId" class="<?php echo $pharmacy_products_list->OrderAllId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->OrderAllId) ?>', 1);"><div id="elh_pharmacy_products_OrderAllId" class="pharmacy_products_OrderAllId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->OrderAllId->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->OrderAllId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->OrderAllId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->CalculateOrderQty->Visible) { // CalculateOrderQty ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->CalculateOrderQty) == "") { ?>
		<th data-name="CalculateOrderQty" class="<?php echo $pharmacy_products_list->CalculateOrderQty->headerCellClass() ?>"><div id="elh_pharmacy_products_CalculateOrderQty" class="pharmacy_products_CalculateOrderQty"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->CalculateOrderQty->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CalculateOrderQty" class="<?php echo $pharmacy_products_list->CalculateOrderQty->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->CalculateOrderQty) ?>', 1);"><div id="elh_pharmacy_products_CalculateOrderQty" class="pharmacy_products_CalculateOrderQty">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->CalculateOrderQty->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->CalculateOrderQty->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->CalculateOrderQty->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->SubLocation->Visible) { // SubLocation ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->SubLocation) == "") { ?>
		<th data-name="SubLocation" class="<?php echo $pharmacy_products_list->SubLocation->headerCellClass() ?>"><div id="elh_pharmacy_products_SubLocation" class="pharmacy_products_SubLocation"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->SubLocation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SubLocation" class="<?php echo $pharmacy_products_list->SubLocation->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->SubLocation) ?>', 1);"><div id="elh_pharmacy_products_SubLocation" class="pharmacy_products_SubLocation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->SubLocation->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->SubLocation->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->SubLocation->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->CategoryCode->Visible) { // CategoryCode ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->CategoryCode) == "") { ?>
		<th data-name="CategoryCode" class="<?php echo $pharmacy_products_list->CategoryCode->headerCellClass() ?>"><div id="elh_pharmacy_products_CategoryCode" class="pharmacy_products_CategoryCode"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->CategoryCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CategoryCode" class="<?php echo $pharmacy_products_list->CategoryCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->CategoryCode) ?>', 1);"><div id="elh_pharmacy_products_CategoryCode" class="pharmacy_products_CategoryCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->CategoryCode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->CategoryCode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->CategoryCode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->SubCategory->Visible) { // SubCategory ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->SubCategory) == "") { ?>
		<th data-name="SubCategory" class="<?php echo $pharmacy_products_list->SubCategory->headerCellClass() ?>"><div id="elh_pharmacy_products_SubCategory" class="pharmacy_products_SubCategory"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->SubCategory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SubCategory" class="<?php echo $pharmacy_products_list->SubCategory->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->SubCategory) ?>', 1);"><div id="elh_pharmacy_products_SubCategory" class="pharmacy_products_SubCategory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->SubCategory->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->SubCategory->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->SubCategory->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->FlexCategoryCode->Visible) { // FlexCategoryCode ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->FlexCategoryCode) == "") { ?>
		<th data-name="FlexCategoryCode" class="<?php echo $pharmacy_products_list->FlexCategoryCode->headerCellClass() ?>"><div id="elh_pharmacy_products_FlexCategoryCode" class="pharmacy_products_FlexCategoryCode"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->FlexCategoryCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FlexCategoryCode" class="<?php echo $pharmacy_products_list->FlexCategoryCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->FlexCategoryCode) ?>', 1);"><div id="elh_pharmacy_products_FlexCategoryCode" class="pharmacy_products_FlexCategoryCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->FlexCategoryCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->FlexCategoryCode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->FlexCategoryCode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->ABCSaleQty->Visible) { // ABCSaleQty ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->ABCSaleQty) == "") { ?>
		<th data-name="ABCSaleQty" class="<?php echo $pharmacy_products_list->ABCSaleQty->headerCellClass() ?>"><div id="elh_pharmacy_products_ABCSaleQty" class="pharmacy_products_ABCSaleQty"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->ABCSaleQty->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ABCSaleQty" class="<?php echo $pharmacy_products_list->ABCSaleQty->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->ABCSaleQty) ?>', 1);"><div id="elh_pharmacy_products_ABCSaleQty" class="pharmacy_products_ABCSaleQty">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->ABCSaleQty->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->ABCSaleQty->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->ABCSaleQty->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->ABCSaleValue->Visible) { // ABCSaleValue ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->ABCSaleValue) == "") { ?>
		<th data-name="ABCSaleValue" class="<?php echo $pharmacy_products_list->ABCSaleValue->headerCellClass() ?>"><div id="elh_pharmacy_products_ABCSaleValue" class="pharmacy_products_ABCSaleValue"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->ABCSaleValue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ABCSaleValue" class="<?php echo $pharmacy_products_list->ABCSaleValue->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->ABCSaleValue) ?>', 1);"><div id="elh_pharmacy_products_ABCSaleValue" class="pharmacy_products_ABCSaleValue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->ABCSaleValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->ABCSaleValue->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->ABCSaleValue->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->ConvertionFactor->Visible) { // ConvertionFactor ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->ConvertionFactor) == "") { ?>
		<th data-name="ConvertionFactor" class="<?php echo $pharmacy_products_list->ConvertionFactor->headerCellClass() ?>"><div id="elh_pharmacy_products_ConvertionFactor" class="pharmacy_products_ConvertionFactor"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->ConvertionFactor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ConvertionFactor" class="<?php echo $pharmacy_products_list->ConvertionFactor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->ConvertionFactor) ?>', 1);"><div id="elh_pharmacy_products_ConvertionFactor" class="pharmacy_products_ConvertionFactor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->ConvertionFactor->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->ConvertionFactor->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->ConvertionFactor->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->ConvertionUnitDesc->Visible) { // ConvertionUnitDesc ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->ConvertionUnitDesc) == "") { ?>
		<th data-name="ConvertionUnitDesc" class="<?php echo $pharmacy_products_list->ConvertionUnitDesc->headerCellClass() ?>"><div id="elh_pharmacy_products_ConvertionUnitDesc" class="pharmacy_products_ConvertionUnitDesc"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->ConvertionUnitDesc->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ConvertionUnitDesc" class="<?php echo $pharmacy_products_list->ConvertionUnitDesc->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->ConvertionUnitDesc) ?>', 1);"><div id="elh_pharmacy_products_ConvertionUnitDesc" class="pharmacy_products_ConvertionUnitDesc">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->ConvertionUnitDesc->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->ConvertionUnitDesc->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->ConvertionUnitDesc->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->TransactionId->Visible) { // TransactionId ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->TransactionId) == "") { ?>
		<th data-name="TransactionId" class="<?php echo $pharmacy_products_list->TransactionId->headerCellClass() ?>"><div id="elh_pharmacy_products_TransactionId" class="pharmacy_products_TransactionId"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->TransactionId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TransactionId" class="<?php echo $pharmacy_products_list->TransactionId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->TransactionId) ?>', 1);"><div id="elh_pharmacy_products_TransactionId" class="pharmacy_products_TransactionId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->TransactionId->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->TransactionId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->TransactionId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->SoldProductId->Visible) { // SoldProductId ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->SoldProductId) == "") { ?>
		<th data-name="SoldProductId" class="<?php echo $pharmacy_products_list->SoldProductId->headerCellClass() ?>"><div id="elh_pharmacy_products_SoldProductId" class="pharmacy_products_SoldProductId"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->SoldProductId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SoldProductId" class="<?php echo $pharmacy_products_list->SoldProductId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->SoldProductId) ?>', 1);"><div id="elh_pharmacy_products_SoldProductId" class="pharmacy_products_SoldProductId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->SoldProductId->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->SoldProductId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->SoldProductId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->WantedBookId->Visible) { // WantedBookId ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->WantedBookId) == "") { ?>
		<th data-name="WantedBookId" class="<?php echo $pharmacy_products_list->WantedBookId->headerCellClass() ?>"><div id="elh_pharmacy_products_WantedBookId" class="pharmacy_products_WantedBookId"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->WantedBookId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="WantedBookId" class="<?php echo $pharmacy_products_list->WantedBookId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->WantedBookId) ?>', 1);"><div id="elh_pharmacy_products_WantedBookId" class="pharmacy_products_WantedBookId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->WantedBookId->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->WantedBookId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->WantedBookId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->AllId->Visible) { // AllId ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->AllId) == "") { ?>
		<th data-name="AllId" class="<?php echo $pharmacy_products_list->AllId->headerCellClass() ?>"><div id="elh_pharmacy_products_AllId" class="pharmacy_products_AllId"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->AllId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AllId" class="<?php echo $pharmacy_products_list->AllId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->AllId) ?>', 1);"><div id="elh_pharmacy_products_AllId" class="pharmacy_products_AllId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->AllId->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->AllId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->AllId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->BatchAndExpiryCompulsory->Visible) { // BatchAndExpiryCompulsory ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->BatchAndExpiryCompulsory) == "") { ?>
		<th data-name="BatchAndExpiryCompulsory" class="<?php echo $pharmacy_products_list->BatchAndExpiryCompulsory->headerCellClass() ?>"><div id="elh_pharmacy_products_BatchAndExpiryCompulsory" class="pharmacy_products_BatchAndExpiryCompulsory"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->BatchAndExpiryCompulsory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BatchAndExpiryCompulsory" class="<?php echo $pharmacy_products_list->BatchAndExpiryCompulsory->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->BatchAndExpiryCompulsory) ?>', 1);"><div id="elh_pharmacy_products_BatchAndExpiryCompulsory" class="pharmacy_products_BatchAndExpiryCompulsory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->BatchAndExpiryCompulsory->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->BatchAndExpiryCompulsory->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->BatchAndExpiryCompulsory->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->BatchStockForWantedBook->Visible) { // BatchStockForWantedBook ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->BatchStockForWantedBook) == "") { ?>
		<th data-name="BatchStockForWantedBook" class="<?php echo $pharmacy_products_list->BatchStockForWantedBook->headerCellClass() ?>"><div id="elh_pharmacy_products_BatchStockForWantedBook" class="pharmacy_products_BatchStockForWantedBook"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->BatchStockForWantedBook->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BatchStockForWantedBook" class="<?php echo $pharmacy_products_list->BatchStockForWantedBook->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->BatchStockForWantedBook) ?>', 1);"><div id="elh_pharmacy_products_BatchStockForWantedBook" class="pharmacy_products_BatchStockForWantedBook">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->BatchStockForWantedBook->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->BatchStockForWantedBook->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->BatchStockForWantedBook->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->UnitBasedBilling->Visible) { // UnitBasedBilling ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->UnitBasedBilling) == "") { ?>
		<th data-name="UnitBasedBilling" class="<?php echo $pharmacy_products_list->UnitBasedBilling->headerCellClass() ?>"><div id="elh_pharmacy_products_UnitBasedBilling" class="pharmacy_products_UnitBasedBilling"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->UnitBasedBilling->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UnitBasedBilling" class="<?php echo $pharmacy_products_list->UnitBasedBilling->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->UnitBasedBilling) ?>', 1);"><div id="elh_pharmacy_products_UnitBasedBilling" class="pharmacy_products_UnitBasedBilling">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->UnitBasedBilling->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->UnitBasedBilling->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->UnitBasedBilling->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->DoNotCheckStock->Visible) { // DoNotCheckStock ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->DoNotCheckStock) == "") { ?>
		<th data-name="DoNotCheckStock" class="<?php echo $pharmacy_products_list->DoNotCheckStock->headerCellClass() ?>"><div id="elh_pharmacy_products_DoNotCheckStock" class="pharmacy_products_DoNotCheckStock"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->DoNotCheckStock->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DoNotCheckStock" class="<?php echo $pharmacy_products_list->DoNotCheckStock->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->DoNotCheckStock) ?>', 1);"><div id="elh_pharmacy_products_DoNotCheckStock" class="pharmacy_products_DoNotCheckStock">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->DoNotCheckStock->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->DoNotCheckStock->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->DoNotCheckStock->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->AcceptRate->Visible) { // AcceptRate ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->AcceptRate) == "") { ?>
		<th data-name="AcceptRate" class="<?php echo $pharmacy_products_list->AcceptRate->headerCellClass() ?>"><div id="elh_pharmacy_products_AcceptRate" class="pharmacy_products_AcceptRate"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->AcceptRate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AcceptRate" class="<?php echo $pharmacy_products_list->AcceptRate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->AcceptRate) ?>', 1);"><div id="elh_pharmacy_products_AcceptRate" class="pharmacy_products_AcceptRate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->AcceptRate->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->AcceptRate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->AcceptRate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->PriceLevel->Visible) { // PriceLevel ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->PriceLevel) == "") { ?>
		<th data-name="PriceLevel" class="<?php echo $pharmacy_products_list->PriceLevel->headerCellClass() ?>"><div id="elh_pharmacy_products_PriceLevel" class="pharmacy_products_PriceLevel"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->PriceLevel->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PriceLevel" class="<?php echo $pharmacy_products_list->PriceLevel->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->PriceLevel) ?>', 1);"><div id="elh_pharmacy_products_PriceLevel" class="pharmacy_products_PriceLevel">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->PriceLevel->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->PriceLevel->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->PriceLevel->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->LastQuotePrice->Visible) { // LastQuotePrice ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->LastQuotePrice) == "") { ?>
		<th data-name="LastQuotePrice" class="<?php echo $pharmacy_products_list->LastQuotePrice->headerCellClass() ?>"><div id="elh_pharmacy_products_LastQuotePrice" class="pharmacy_products_LastQuotePrice"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->LastQuotePrice->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LastQuotePrice" class="<?php echo $pharmacy_products_list->LastQuotePrice->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->LastQuotePrice) ?>', 1);"><div id="elh_pharmacy_products_LastQuotePrice" class="pharmacy_products_LastQuotePrice">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->LastQuotePrice->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->LastQuotePrice->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->LastQuotePrice->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->PriceChange->Visible) { // PriceChange ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->PriceChange) == "") { ?>
		<th data-name="PriceChange" class="<?php echo $pharmacy_products_list->PriceChange->headerCellClass() ?>"><div id="elh_pharmacy_products_PriceChange" class="pharmacy_products_PriceChange"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->PriceChange->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PriceChange" class="<?php echo $pharmacy_products_list->PriceChange->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->PriceChange) ?>', 1);"><div id="elh_pharmacy_products_PriceChange" class="pharmacy_products_PriceChange">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->PriceChange->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->PriceChange->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->PriceChange->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->CommodityCode->Visible) { // CommodityCode ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->CommodityCode) == "") { ?>
		<th data-name="CommodityCode" class="<?php echo $pharmacy_products_list->CommodityCode->headerCellClass() ?>"><div id="elh_pharmacy_products_CommodityCode" class="pharmacy_products_CommodityCode"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->CommodityCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CommodityCode" class="<?php echo $pharmacy_products_list->CommodityCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->CommodityCode) ?>', 1);"><div id="elh_pharmacy_products_CommodityCode" class="pharmacy_products_CommodityCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->CommodityCode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->CommodityCode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->CommodityCode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->InstitutePrice->Visible) { // InstitutePrice ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->InstitutePrice) == "") { ?>
		<th data-name="InstitutePrice" class="<?php echo $pharmacy_products_list->InstitutePrice->headerCellClass() ?>"><div id="elh_pharmacy_products_InstitutePrice" class="pharmacy_products_InstitutePrice"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->InstitutePrice->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="InstitutePrice" class="<?php echo $pharmacy_products_list->InstitutePrice->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->InstitutePrice) ?>', 1);"><div id="elh_pharmacy_products_InstitutePrice" class="pharmacy_products_InstitutePrice">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->InstitutePrice->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->InstitutePrice->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->InstitutePrice->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->CtrlOrDCtrlProduct->Visible) { // CtrlOrDCtrlProduct ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->CtrlOrDCtrlProduct) == "") { ?>
		<th data-name="CtrlOrDCtrlProduct" class="<?php echo $pharmacy_products_list->CtrlOrDCtrlProduct->headerCellClass() ?>"><div id="elh_pharmacy_products_CtrlOrDCtrlProduct" class="pharmacy_products_CtrlOrDCtrlProduct"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->CtrlOrDCtrlProduct->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CtrlOrDCtrlProduct" class="<?php echo $pharmacy_products_list->CtrlOrDCtrlProduct->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->CtrlOrDCtrlProduct) ?>', 1);"><div id="elh_pharmacy_products_CtrlOrDCtrlProduct" class="pharmacy_products_CtrlOrDCtrlProduct">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->CtrlOrDCtrlProduct->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->CtrlOrDCtrlProduct->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->CtrlOrDCtrlProduct->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->ImportedDate->Visible) { // ImportedDate ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->ImportedDate) == "") { ?>
		<th data-name="ImportedDate" class="<?php echo $pharmacy_products_list->ImportedDate->headerCellClass() ?>"><div id="elh_pharmacy_products_ImportedDate" class="pharmacy_products_ImportedDate"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->ImportedDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ImportedDate" class="<?php echo $pharmacy_products_list->ImportedDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->ImportedDate) ?>', 1);"><div id="elh_pharmacy_products_ImportedDate" class="pharmacy_products_ImportedDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->ImportedDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->ImportedDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->ImportedDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->IsImported->Visible) { // IsImported ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->IsImported) == "") { ?>
		<th data-name="IsImported" class="<?php echo $pharmacy_products_list->IsImported->headerCellClass() ?>"><div id="elh_pharmacy_products_IsImported" class="pharmacy_products_IsImported"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->IsImported->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IsImported" class="<?php echo $pharmacy_products_list->IsImported->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->IsImported) ?>', 1);"><div id="elh_pharmacy_products_IsImported" class="pharmacy_products_IsImported">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->IsImported->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->IsImported->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->IsImported->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->FileName->Visible) { // FileName ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->FileName) == "") { ?>
		<th data-name="FileName" class="<?php echo $pharmacy_products_list->FileName->headerCellClass() ?>"><div id="elh_pharmacy_products_FileName" class="pharmacy_products_FileName"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->FileName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FileName" class="<?php echo $pharmacy_products_list->FileName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->FileName) ?>', 1);"><div id="elh_pharmacy_products_FileName" class="pharmacy_products_FileName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->FileName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->FileName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->FileName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->GodownNumber->Visible) { // GodownNumber ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->GodownNumber) == "") { ?>
		<th data-name="GodownNumber" class="<?php echo $pharmacy_products_list->GodownNumber->headerCellClass() ?>"><div id="elh_pharmacy_products_GodownNumber" class="pharmacy_products_GodownNumber"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->GodownNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GodownNumber" class="<?php echo $pharmacy_products_list->GodownNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->GodownNumber) ?>', 1);"><div id="elh_pharmacy_products_GodownNumber" class="pharmacy_products_GodownNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->GodownNumber->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->GodownNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->GodownNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->CreationDate->Visible) { // CreationDate ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->CreationDate) == "") { ?>
		<th data-name="CreationDate" class="<?php echo $pharmacy_products_list->CreationDate->headerCellClass() ?>"><div id="elh_pharmacy_products_CreationDate" class="pharmacy_products_CreationDate"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->CreationDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CreationDate" class="<?php echo $pharmacy_products_list->CreationDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->CreationDate) ?>', 1);"><div id="elh_pharmacy_products_CreationDate" class="pharmacy_products_CreationDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->CreationDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->CreationDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->CreationDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->CreatedbyUser->Visible) { // CreatedbyUser ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->CreatedbyUser) == "") { ?>
		<th data-name="CreatedbyUser" class="<?php echo $pharmacy_products_list->CreatedbyUser->headerCellClass() ?>"><div id="elh_pharmacy_products_CreatedbyUser" class="pharmacy_products_CreatedbyUser"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->CreatedbyUser->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CreatedbyUser" class="<?php echo $pharmacy_products_list->CreatedbyUser->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->CreatedbyUser) ?>', 1);"><div id="elh_pharmacy_products_CreatedbyUser" class="pharmacy_products_CreatedbyUser">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->CreatedbyUser->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->CreatedbyUser->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->CreatedbyUser->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->ModifiedDate->Visible) { // ModifiedDate ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->ModifiedDate) == "") { ?>
		<th data-name="ModifiedDate" class="<?php echo $pharmacy_products_list->ModifiedDate->headerCellClass() ?>"><div id="elh_pharmacy_products_ModifiedDate" class="pharmacy_products_ModifiedDate"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->ModifiedDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModifiedDate" class="<?php echo $pharmacy_products_list->ModifiedDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->ModifiedDate) ?>', 1);"><div id="elh_pharmacy_products_ModifiedDate" class="pharmacy_products_ModifiedDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->ModifiedDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->ModifiedDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->ModifiedDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->ModifiedbyUser->Visible) { // ModifiedbyUser ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->ModifiedbyUser) == "") { ?>
		<th data-name="ModifiedbyUser" class="<?php echo $pharmacy_products_list->ModifiedbyUser->headerCellClass() ?>"><div id="elh_pharmacy_products_ModifiedbyUser" class="pharmacy_products_ModifiedbyUser"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->ModifiedbyUser->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModifiedbyUser" class="<?php echo $pharmacy_products_list->ModifiedbyUser->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->ModifiedbyUser) ?>', 1);"><div id="elh_pharmacy_products_ModifiedbyUser" class="pharmacy_products_ModifiedbyUser">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->ModifiedbyUser->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->ModifiedbyUser->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->ModifiedbyUser->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->isActive->Visible) { // isActive ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->isActive) == "") { ?>
		<th data-name="isActive" class="<?php echo $pharmacy_products_list->isActive->headerCellClass() ?>"><div id="elh_pharmacy_products_isActive" class="pharmacy_products_isActive"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->isActive->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="isActive" class="<?php echo $pharmacy_products_list->isActive->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->isActive) ?>', 1);"><div id="elh_pharmacy_products_isActive" class="pharmacy_products_isActive">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->isActive->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->isActive->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->isActive->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->AllowExpiryClaim->Visible) { // AllowExpiryClaim ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->AllowExpiryClaim) == "") { ?>
		<th data-name="AllowExpiryClaim" class="<?php echo $pharmacy_products_list->AllowExpiryClaim->headerCellClass() ?>"><div id="elh_pharmacy_products_AllowExpiryClaim" class="pharmacy_products_AllowExpiryClaim"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->AllowExpiryClaim->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AllowExpiryClaim" class="<?php echo $pharmacy_products_list->AllowExpiryClaim->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->AllowExpiryClaim) ?>', 1);"><div id="elh_pharmacy_products_AllowExpiryClaim" class="pharmacy_products_AllowExpiryClaim">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->AllowExpiryClaim->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->AllowExpiryClaim->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->AllowExpiryClaim->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->BrandCode->Visible) { // BrandCode ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->BrandCode) == "") { ?>
		<th data-name="BrandCode" class="<?php echo $pharmacy_products_list->BrandCode->headerCellClass() ?>"><div id="elh_pharmacy_products_BrandCode" class="pharmacy_products_BrandCode"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->BrandCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BrandCode" class="<?php echo $pharmacy_products_list->BrandCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->BrandCode) ?>', 1);"><div id="elh_pharmacy_products_BrandCode" class="pharmacy_products_BrandCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->BrandCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->BrandCode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->BrandCode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->FreeSchemeBasedon->Visible) { // FreeSchemeBasedon ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->FreeSchemeBasedon) == "") { ?>
		<th data-name="FreeSchemeBasedon" class="<?php echo $pharmacy_products_list->FreeSchemeBasedon->headerCellClass() ?>"><div id="elh_pharmacy_products_FreeSchemeBasedon" class="pharmacy_products_FreeSchemeBasedon"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->FreeSchemeBasedon->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FreeSchemeBasedon" class="<?php echo $pharmacy_products_list->FreeSchemeBasedon->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->FreeSchemeBasedon) ?>', 1);"><div id="elh_pharmacy_products_FreeSchemeBasedon" class="pharmacy_products_FreeSchemeBasedon">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->FreeSchemeBasedon->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->FreeSchemeBasedon->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->FreeSchemeBasedon->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->DoNotCheckCostInBill->Visible) { // DoNotCheckCostInBill ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->DoNotCheckCostInBill) == "") { ?>
		<th data-name="DoNotCheckCostInBill" class="<?php echo $pharmacy_products_list->DoNotCheckCostInBill->headerCellClass() ?>"><div id="elh_pharmacy_products_DoNotCheckCostInBill" class="pharmacy_products_DoNotCheckCostInBill"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->DoNotCheckCostInBill->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DoNotCheckCostInBill" class="<?php echo $pharmacy_products_list->DoNotCheckCostInBill->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->DoNotCheckCostInBill) ?>', 1);"><div id="elh_pharmacy_products_DoNotCheckCostInBill" class="pharmacy_products_DoNotCheckCostInBill">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->DoNotCheckCostInBill->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->DoNotCheckCostInBill->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->DoNotCheckCostInBill->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->ProductGroupCode->Visible) { // ProductGroupCode ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->ProductGroupCode) == "") { ?>
		<th data-name="ProductGroupCode" class="<?php echo $pharmacy_products_list->ProductGroupCode->headerCellClass() ?>"><div id="elh_pharmacy_products_ProductGroupCode" class="pharmacy_products_ProductGroupCode"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->ProductGroupCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProductGroupCode" class="<?php echo $pharmacy_products_list->ProductGroupCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->ProductGroupCode) ?>', 1);"><div id="elh_pharmacy_products_ProductGroupCode" class="pharmacy_products_ProductGroupCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->ProductGroupCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->ProductGroupCode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->ProductGroupCode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->ProductStrengthCode->Visible) { // ProductStrengthCode ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->ProductStrengthCode) == "") { ?>
		<th data-name="ProductStrengthCode" class="<?php echo $pharmacy_products_list->ProductStrengthCode->headerCellClass() ?>"><div id="elh_pharmacy_products_ProductStrengthCode" class="pharmacy_products_ProductStrengthCode"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->ProductStrengthCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProductStrengthCode" class="<?php echo $pharmacy_products_list->ProductStrengthCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->ProductStrengthCode) ?>', 1);"><div id="elh_pharmacy_products_ProductStrengthCode" class="pharmacy_products_ProductStrengthCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->ProductStrengthCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->ProductStrengthCode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->ProductStrengthCode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->PackingCode->Visible) { // PackingCode ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->PackingCode) == "") { ?>
		<th data-name="PackingCode" class="<?php echo $pharmacy_products_list->PackingCode->headerCellClass() ?>"><div id="elh_pharmacy_products_PackingCode" class="pharmacy_products_PackingCode"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->PackingCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PackingCode" class="<?php echo $pharmacy_products_list->PackingCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->PackingCode) ?>', 1);"><div id="elh_pharmacy_products_PackingCode" class="pharmacy_products_PackingCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->PackingCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->PackingCode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->PackingCode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->ComputedMinStock->Visible) { // ComputedMinStock ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->ComputedMinStock) == "") { ?>
		<th data-name="ComputedMinStock" class="<?php echo $pharmacy_products_list->ComputedMinStock->headerCellClass() ?>"><div id="elh_pharmacy_products_ComputedMinStock" class="pharmacy_products_ComputedMinStock"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->ComputedMinStock->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ComputedMinStock" class="<?php echo $pharmacy_products_list->ComputedMinStock->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->ComputedMinStock) ?>', 1);"><div id="elh_pharmacy_products_ComputedMinStock" class="pharmacy_products_ComputedMinStock">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->ComputedMinStock->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->ComputedMinStock->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->ComputedMinStock->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->ComputedMaxStock->Visible) { // ComputedMaxStock ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->ComputedMaxStock) == "") { ?>
		<th data-name="ComputedMaxStock" class="<?php echo $pharmacy_products_list->ComputedMaxStock->headerCellClass() ?>"><div id="elh_pharmacy_products_ComputedMaxStock" class="pharmacy_products_ComputedMaxStock"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->ComputedMaxStock->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ComputedMaxStock" class="<?php echo $pharmacy_products_list->ComputedMaxStock->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->ComputedMaxStock) ?>', 1);"><div id="elh_pharmacy_products_ComputedMaxStock" class="pharmacy_products_ComputedMaxStock">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->ComputedMaxStock->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->ComputedMaxStock->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->ComputedMaxStock->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->ProductRemark->Visible) { // ProductRemark ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->ProductRemark) == "") { ?>
		<th data-name="ProductRemark" class="<?php echo $pharmacy_products_list->ProductRemark->headerCellClass() ?>"><div id="elh_pharmacy_products_ProductRemark" class="pharmacy_products_ProductRemark"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->ProductRemark->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProductRemark" class="<?php echo $pharmacy_products_list->ProductRemark->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->ProductRemark) ?>', 1);"><div id="elh_pharmacy_products_ProductRemark" class="pharmacy_products_ProductRemark">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->ProductRemark->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->ProductRemark->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->ProductRemark->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->ProductDrugCode->Visible) { // ProductDrugCode ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->ProductDrugCode) == "") { ?>
		<th data-name="ProductDrugCode" class="<?php echo $pharmacy_products_list->ProductDrugCode->headerCellClass() ?>"><div id="elh_pharmacy_products_ProductDrugCode" class="pharmacy_products_ProductDrugCode"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->ProductDrugCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProductDrugCode" class="<?php echo $pharmacy_products_list->ProductDrugCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->ProductDrugCode) ?>', 1);"><div id="elh_pharmacy_products_ProductDrugCode" class="pharmacy_products_ProductDrugCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->ProductDrugCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->ProductDrugCode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->ProductDrugCode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->IsMatrixProduct->Visible) { // IsMatrixProduct ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->IsMatrixProduct) == "") { ?>
		<th data-name="IsMatrixProduct" class="<?php echo $pharmacy_products_list->IsMatrixProduct->headerCellClass() ?>"><div id="elh_pharmacy_products_IsMatrixProduct" class="pharmacy_products_IsMatrixProduct"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->IsMatrixProduct->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IsMatrixProduct" class="<?php echo $pharmacy_products_list->IsMatrixProduct->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->IsMatrixProduct) ?>', 1);"><div id="elh_pharmacy_products_IsMatrixProduct" class="pharmacy_products_IsMatrixProduct">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->IsMatrixProduct->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->IsMatrixProduct->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->IsMatrixProduct->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->AttributeCount1->Visible) { // AttributeCount1 ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->AttributeCount1) == "") { ?>
		<th data-name="AttributeCount1" class="<?php echo $pharmacy_products_list->AttributeCount1->headerCellClass() ?>"><div id="elh_pharmacy_products_AttributeCount1" class="pharmacy_products_AttributeCount1"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->AttributeCount1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AttributeCount1" class="<?php echo $pharmacy_products_list->AttributeCount1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->AttributeCount1) ?>', 1);"><div id="elh_pharmacy_products_AttributeCount1" class="pharmacy_products_AttributeCount1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->AttributeCount1->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->AttributeCount1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->AttributeCount1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->AttributeCount2->Visible) { // AttributeCount2 ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->AttributeCount2) == "") { ?>
		<th data-name="AttributeCount2" class="<?php echo $pharmacy_products_list->AttributeCount2->headerCellClass() ?>"><div id="elh_pharmacy_products_AttributeCount2" class="pharmacy_products_AttributeCount2"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->AttributeCount2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AttributeCount2" class="<?php echo $pharmacy_products_list->AttributeCount2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->AttributeCount2) ?>', 1);"><div id="elh_pharmacy_products_AttributeCount2" class="pharmacy_products_AttributeCount2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->AttributeCount2->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->AttributeCount2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->AttributeCount2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->AttributeCount3->Visible) { // AttributeCount3 ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->AttributeCount3) == "") { ?>
		<th data-name="AttributeCount3" class="<?php echo $pharmacy_products_list->AttributeCount3->headerCellClass() ?>"><div id="elh_pharmacy_products_AttributeCount3" class="pharmacy_products_AttributeCount3"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->AttributeCount3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AttributeCount3" class="<?php echo $pharmacy_products_list->AttributeCount3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->AttributeCount3) ?>', 1);"><div id="elh_pharmacy_products_AttributeCount3" class="pharmacy_products_AttributeCount3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->AttributeCount3->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->AttributeCount3->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->AttributeCount3->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->AttributeCount4->Visible) { // AttributeCount4 ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->AttributeCount4) == "") { ?>
		<th data-name="AttributeCount4" class="<?php echo $pharmacy_products_list->AttributeCount4->headerCellClass() ?>"><div id="elh_pharmacy_products_AttributeCount4" class="pharmacy_products_AttributeCount4"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->AttributeCount4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AttributeCount4" class="<?php echo $pharmacy_products_list->AttributeCount4->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->AttributeCount4) ?>', 1);"><div id="elh_pharmacy_products_AttributeCount4" class="pharmacy_products_AttributeCount4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->AttributeCount4->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->AttributeCount4->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->AttributeCount4->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->AttributeCount5->Visible) { // AttributeCount5 ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->AttributeCount5) == "") { ?>
		<th data-name="AttributeCount5" class="<?php echo $pharmacy_products_list->AttributeCount5->headerCellClass() ?>"><div id="elh_pharmacy_products_AttributeCount5" class="pharmacy_products_AttributeCount5"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->AttributeCount5->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AttributeCount5" class="<?php echo $pharmacy_products_list->AttributeCount5->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->AttributeCount5) ?>', 1);"><div id="elh_pharmacy_products_AttributeCount5" class="pharmacy_products_AttributeCount5">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->AttributeCount5->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->AttributeCount5->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->AttributeCount5->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->DefaultDiscountPercentage->Visible) { // DefaultDiscountPercentage ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->DefaultDiscountPercentage) == "") { ?>
		<th data-name="DefaultDiscountPercentage" class="<?php echo $pharmacy_products_list->DefaultDiscountPercentage->headerCellClass() ?>"><div id="elh_pharmacy_products_DefaultDiscountPercentage" class="pharmacy_products_DefaultDiscountPercentage"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->DefaultDiscountPercentage->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DefaultDiscountPercentage" class="<?php echo $pharmacy_products_list->DefaultDiscountPercentage->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->DefaultDiscountPercentage) ?>', 1);"><div id="elh_pharmacy_products_DefaultDiscountPercentage" class="pharmacy_products_DefaultDiscountPercentage">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->DefaultDiscountPercentage->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->DefaultDiscountPercentage->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->DefaultDiscountPercentage->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->DonotPrintBarcode->Visible) { // DonotPrintBarcode ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->DonotPrintBarcode) == "") { ?>
		<th data-name="DonotPrintBarcode" class="<?php echo $pharmacy_products_list->DonotPrintBarcode->headerCellClass() ?>"><div id="elh_pharmacy_products_DonotPrintBarcode" class="pharmacy_products_DonotPrintBarcode"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->DonotPrintBarcode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DonotPrintBarcode" class="<?php echo $pharmacy_products_list->DonotPrintBarcode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->DonotPrintBarcode) ?>', 1);"><div id="elh_pharmacy_products_DonotPrintBarcode" class="pharmacy_products_DonotPrintBarcode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->DonotPrintBarcode->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->DonotPrintBarcode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->DonotPrintBarcode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->ProductLevelDiscount->Visible) { // ProductLevelDiscount ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->ProductLevelDiscount) == "") { ?>
		<th data-name="ProductLevelDiscount" class="<?php echo $pharmacy_products_list->ProductLevelDiscount->headerCellClass() ?>"><div id="elh_pharmacy_products_ProductLevelDiscount" class="pharmacy_products_ProductLevelDiscount"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->ProductLevelDiscount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProductLevelDiscount" class="<?php echo $pharmacy_products_list->ProductLevelDiscount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->ProductLevelDiscount) ?>', 1);"><div id="elh_pharmacy_products_ProductLevelDiscount" class="pharmacy_products_ProductLevelDiscount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->ProductLevelDiscount->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->ProductLevelDiscount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->ProductLevelDiscount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->Markup->Visible) { // Markup ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->Markup) == "") { ?>
		<th data-name="Markup" class="<?php echo $pharmacy_products_list->Markup->headerCellClass() ?>"><div id="elh_pharmacy_products_Markup" class="pharmacy_products_Markup"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->Markup->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Markup" class="<?php echo $pharmacy_products_list->Markup->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->Markup) ?>', 1);"><div id="elh_pharmacy_products_Markup" class="pharmacy_products_Markup">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->Markup->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->Markup->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->Markup->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->MarkDown->Visible) { // MarkDown ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->MarkDown) == "") { ?>
		<th data-name="MarkDown" class="<?php echo $pharmacy_products_list->MarkDown->headerCellClass() ?>"><div id="elh_pharmacy_products_MarkDown" class="pharmacy_products_MarkDown"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->MarkDown->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MarkDown" class="<?php echo $pharmacy_products_list->MarkDown->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->MarkDown) ?>', 1);"><div id="elh_pharmacy_products_MarkDown" class="pharmacy_products_MarkDown">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->MarkDown->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->MarkDown->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->MarkDown->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->ReworkSalePrice->Visible) { // ReworkSalePrice ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->ReworkSalePrice) == "") { ?>
		<th data-name="ReworkSalePrice" class="<?php echo $pharmacy_products_list->ReworkSalePrice->headerCellClass() ?>"><div id="elh_pharmacy_products_ReworkSalePrice" class="pharmacy_products_ReworkSalePrice"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->ReworkSalePrice->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReworkSalePrice" class="<?php echo $pharmacy_products_list->ReworkSalePrice->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->ReworkSalePrice) ?>', 1);"><div id="elh_pharmacy_products_ReworkSalePrice" class="pharmacy_products_ReworkSalePrice">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->ReworkSalePrice->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->ReworkSalePrice->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->ReworkSalePrice->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->MultipleInput->Visible) { // MultipleInput ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->MultipleInput) == "") { ?>
		<th data-name="MultipleInput" class="<?php echo $pharmacy_products_list->MultipleInput->headerCellClass() ?>"><div id="elh_pharmacy_products_MultipleInput" class="pharmacy_products_MultipleInput"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->MultipleInput->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MultipleInput" class="<?php echo $pharmacy_products_list->MultipleInput->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->MultipleInput) ?>', 1);"><div id="elh_pharmacy_products_MultipleInput" class="pharmacy_products_MultipleInput">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->MultipleInput->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->MultipleInput->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->MultipleInput->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->LpPackageInformation->Visible) { // LpPackageInformation ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->LpPackageInformation) == "") { ?>
		<th data-name="LpPackageInformation" class="<?php echo $pharmacy_products_list->LpPackageInformation->headerCellClass() ?>"><div id="elh_pharmacy_products_LpPackageInformation" class="pharmacy_products_LpPackageInformation"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->LpPackageInformation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LpPackageInformation" class="<?php echo $pharmacy_products_list->LpPackageInformation->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->LpPackageInformation) ?>', 1);"><div id="elh_pharmacy_products_LpPackageInformation" class="pharmacy_products_LpPackageInformation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->LpPackageInformation->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->LpPackageInformation->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->LpPackageInformation->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->AllowNegativeStock->Visible) { // AllowNegativeStock ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->AllowNegativeStock) == "") { ?>
		<th data-name="AllowNegativeStock" class="<?php echo $pharmacy_products_list->AllowNegativeStock->headerCellClass() ?>"><div id="elh_pharmacy_products_AllowNegativeStock" class="pharmacy_products_AllowNegativeStock"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->AllowNegativeStock->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AllowNegativeStock" class="<?php echo $pharmacy_products_list->AllowNegativeStock->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->AllowNegativeStock) ?>', 1);"><div id="elh_pharmacy_products_AllowNegativeStock" class="pharmacy_products_AllowNegativeStock">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->AllowNegativeStock->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->AllowNegativeStock->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->AllowNegativeStock->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->OrderDate->Visible) { // OrderDate ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->OrderDate) == "") { ?>
		<th data-name="OrderDate" class="<?php echo $pharmacy_products_list->OrderDate->headerCellClass() ?>"><div id="elh_pharmacy_products_OrderDate" class="pharmacy_products_OrderDate"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->OrderDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OrderDate" class="<?php echo $pharmacy_products_list->OrderDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->OrderDate) ?>', 1);"><div id="elh_pharmacy_products_OrderDate" class="pharmacy_products_OrderDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->OrderDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->OrderDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->OrderDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->OrderTime->Visible) { // OrderTime ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->OrderTime) == "") { ?>
		<th data-name="OrderTime" class="<?php echo $pharmacy_products_list->OrderTime->headerCellClass() ?>"><div id="elh_pharmacy_products_OrderTime" class="pharmacy_products_OrderTime"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->OrderTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OrderTime" class="<?php echo $pharmacy_products_list->OrderTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->OrderTime) ?>', 1);"><div id="elh_pharmacy_products_OrderTime" class="pharmacy_products_OrderTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->OrderTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->OrderTime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->OrderTime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->RateGroupCode->Visible) { // RateGroupCode ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->RateGroupCode) == "") { ?>
		<th data-name="RateGroupCode" class="<?php echo $pharmacy_products_list->RateGroupCode->headerCellClass() ?>"><div id="elh_pharmacy_products_RateGroupCode" class="pharmacy_products_RateGroupCode"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->RateGroupCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RateGroupCode" class="<?php echo $pharmacy_products_list->RateGroupCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->RateGroupCode) ?>', 1);"><div id="elh_pharmacy_products_RateGroupCode" class="pharmacy_products_RateGroupCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->RateGroupCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->RateGroupCode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->RateGroupCode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->ConversionCaseLot->Visible) { // ConversionCaseLot ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->ConversionCaseLot) == "") { ?>
		<th data-name="ConversionCaseLot" class="<?php echo $pharmacy_products_list->ConversionCaseLot->headerCellClass() ?>"><div id="elh_pharmacy_products_ConversionCaseLot" class="pharmacy_products_ConversionCaseLot"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->ConversionCaseLot->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ConversionCaseLot" class="<?php echo $pharmacy_products_list->ConversionCaseLot->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->ConversionCaseLot) ?>', 1);"><div id="elh_pharmacy_products_ConversionCaseLot" class="pharmacy_products_ConversionCaseLot">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->ConversionCaseLot->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->ConversionCaseLot->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->ConversionCaseLot->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->ShippingLot->Visible) { // ShippingLot ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->ShippingLot) == "") { ?>
		<th data-name="ShippingLot" class="<?php echo $pharmacy_products_list->ShippingLot->headerCellClass() ?>"><div id="elh_pharmacy_products_ShippingLot" class="pharmacy_products_ShippingLot"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->ShippingLot->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ShippingLot" class="<?php echo $pharmacy_products_list->ShippingLot->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->ShippingLot) ?>', 1);"><div id="elh_pharmacy_products_ShippingLot" class="pharmacy_products_ShippingLot">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->ShippingLot->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->ShippingLot->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->ShippingLot->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->AllowExpiryReplacement->Visible) { // AllowExpiryReplacement ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->AllowExpiryReplacement) == "") { ?>
		<th data-name="AllowExpiryReplacement" class="<?php echo $pharmacy_products_list->AllowExpiryReplacement->headerCellClass() ?>"><div id="elh_pharmacy_products_AllowExpiryReplacement" class="pharmacy_products_AllowExpiryReplacement"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->AllowExpiryReplacement->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AllowExpiryReplacement" class="<?php echo $pharmacy_products_list->AllowExpiryReplacement->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->AllowExpiryReplacement) ?>', 1);"><div id="elh_pharmacy_products_AllowExpiryReplacement" class="pharmacy_products_AllowExpiryReplacement">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->AllowExpiryReplacement->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->AllowExpiryReplacement->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->AllowExpiryReplacement->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->NoOfMonthExpiryAllowed->Visible) { // NoOfMonthExpiryAllowed ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->NoOfMonthExpiryAllowed) == "") { ?>
		<th data-name="NoOfMonthExpiryAllowed" class="<?php echo $pharmacy_products_list->NoOfMonthExpiryAllowed->headerCellClass() ?>"><div id="elh_pharmacy_products_NoOfMonthExpiryAllowed" class="pharmacy_products_NoOfMonthExpiryAllowed"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->NoOfMonthExpiryAllowed->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoOfMonthExpiryAllowed" class="<?php echo $pharmacy_products_list->NoOfMonthExpiryAllowed->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->NoOfMonthExpiryAllowed) ?>', 1);"><div id="elh_pharmacy_products_NoOfMonthExpiryAllowed" class="pharmacy_products_NoOfMonthExpiryAllowed">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->NoOfMonthExpiryAllowed->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->NoOfMonthExpiryAllowed->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->NoOfMonthExpiryAllowed->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->ProductDiscountEligibility->Visible) { // ProductDiscountEligibility ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->ProductDiscountEligibility) == "") { ?>
		<th data-name="ProductDiscountEligibility" class="<?php echo $pharmacy_products_list->ProductDiscountEligibility->headerCellClass() ?>"><div id="elh_pharmacy_products_ProductDiscountEligibility" class="pharmacy_products_ProductDiscountEligibility"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->ProductDiscountEligibility->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProductDiscountEligibility" class="<?php echo $pharmacy_products_list->ProductDiscountEligibility->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->ProductDiscountEligibility) ?>', 1);"><div id="elh_pharmacy_products_ProductDiscountEligibility" class="pharmacy_products_ProductDiscountEligibility">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->ProductDiscountEligibility->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->ProductDiscountEligibility->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->ProductDiscountEligibility->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->ScheduleTypeCode->Visible) { // ScheduleTypeCode ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->ScheduleTypeCode) == "") { ?>
		<th data-name="ScheduleTypeCode" class="<?php echo $pharmacy_products_list->ScheduleTypeCode->headerCellClass() ?>"><div id="elh_pharmacy_products_ScheduleTypeCode" class="pharmacy_products_ScheduleTypeCode"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->ScheduleTypeCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ScheduleTypeCode" class="<?php echo $pharmacy_products_list->ScheduleTypeCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->ScheduleTypeCode) ?>', 1);"><div id="elh_pharmacy_products_ScheduleTypeCode" class="pharmacy_products_ScheduleTypeCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->ScheduleTypeCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->ScheduleTypeCode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->ScheduleTypeCode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->AIOCDProductCode->Visible) { // AIOCDProductCode ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->AIOCDProductCode) == "") { ?>
		<th data-name="AIOCDProductCode" class="<?php echo $pharmacy_products_list->AIOCDProductCode->headerCellClass() ?>"><div id="elh_pharmacy_products_AIOCDProductCode" class="pharmacy_products_AIOCDProductCode"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->AIOCDProductCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AIOCDProductCode" class="<?php echo $pharmacy_products_list->AIOCDProductCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->AIOCDProductCode) ?>', 1);"><div id="elh_pharmacy_products_AIOCDProductCode" class="pharmacy_products_AIOCDProductCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->AIOCDProductCode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->AIOCDProductCode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->AIOCDProductCode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->FreeQuantity->Visible) { // FreeQuantity ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->FreeQuantity) == "") { ?>
		<th data-name="FreeQuantity" class="<?php echo $pharmacy_products_list->FreeQuantity->headerCellClass() ?>"><div id="elh_pharmacy_products_FreeQuantity" class="pharmacy_products_FreeQuantity"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->FreeQuantity->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FreeQuantity" class="<?php echo $pharmacy_products_list->FreeQuantity->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->FreeQuantity) ?>', 1);"><div id="elh_pharmacy_products_FreeQuantity" class="pharmacy_products_FreeQuantity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->FreeQuantity->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->FreeQuantity->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->FreeQuantity->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->DiscountType->Visible) { // DiscountType ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->DiscountType) == "") { ?>
		<th data-name="DiscountType" class="<?php echo $pharmacy_products_list->DiscountType->headerCellClass() ?>"><div id="elh_pharmacy_products_DiscountType" class="pharmacy_products_DiscountType"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->DiscountType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DiscountType" class="<?php echo $pharmacy_products_list->DiscountType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->DiscountType) ?>', 1);"><div id="elh_pharmacy_products_DiscountType" class="pharmacy_products_DiscountType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->DiscountType->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->DiscountType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->DiscountType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->DiscountValue->Visible) { // DiscountValue ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->DiscountValue) == "") { ?>
		<th data-name="DiscountValue" class="<?php echo $pharmacy_products_list->DiscountValue->headerCellClass() ?>"><div id="elh_pharmacy_products_DiscountValue" class="pharmacy_products_DiscountValue"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->DiscountValue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DiscountValue" class="<?php echo $pharmacy_products_list->DiscountValue->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->DiscountValue) ?>', 1);"><div id="elh_pharmacy_products_DiscountValue" class="pharmacy_products_DiscountValue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->DiscountValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->DiscountValue->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->DiscountValue->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->HasProductOrderAttribute->Visible) { // HasProductOrderAttribute ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->HasProductOrderAttribute) == "") { ?>
		<th data-name="HasProductOrderAttribute" class="<?php echo $pharmacy_products_list->HasProductOrderAttribute->headerCellClass() ?>"><div id="elh_pharmacy_products_HasProductOrderAttribute" class="pharmacy_products_HasProductOrderAttribute"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->HasProductOrderAttribute->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HasProductOrderAttribute" class="<?php echo $pharmacy_products_list->HasProductOrderAttribute->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->HasProductOrderAttribute) ?>', 1);"><div id="elh_pharmacy_products_HasProductOrderAttribute" class="pharmacy_products_HasProductOrderAttribute">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->HasProductOrderAttribute->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->HasProductOrderAttribute->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->HasProductOrderAttribute->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->FirstPODate->Visible) { // FirstPODate ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->FirstPODate) == "") { ?>
		<th data-name="FirstPODate" class="<?php echo $pharmacy_products_list->FirstPODate->headerCellClass() ?>"><div id="elh_pharmacy_products_FirstPODate" class="pharmacy_products_FirstPODate"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->FirstPODate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FirstPODate" class="<?php echo $pharmacy_products_list->FirstPODate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->FirstPODate) ?>', 1);"><div id="elh_pharmacy_products_FirstPODate" class="pharmacy_products_FirstPODate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->FirstPODate->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->FirstPODate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->FirstPODate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->SaleprcieAndMrpCalcPercent->Visible) { // SaleprcieAndMrpCalcPercent ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->SaleprcieAndMrpCalcPercent) == "") { ?>
		<th data-name="SaleprcieAndMrpCalcPercent" class="<?php echo $pharmacy_products_list->SaleprcieAndMrpCalcPercent->headerCellClass() ?>"><div id="elh_pharmacy_products_SaleprcieAndMrpCalcPercent" class="pharmacy_products_SaleprcieAndMrpCalcPercent"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->SaleprcieAndMrpCalcPercent->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SaleprcieAndMrpCalcPercent" class="<?php echo $pharmacy_products_list->SaleprcieAndMrpCalcPercent->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->SaleprcieAndMrpCalcPercent) ?>', 1);"><div id="elh_pharmacy_products_SaleprcieAndMrpCalcPercent" class="pharmacy_products_SaleprcieAndMrpCalcPercent">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->SaleprcieAndMrpCalcPercent->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->SaleprcieAndMrpCalcPercent->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->SaleprcieAndMrpCalcPercent->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->IsGiftVoucherProducts->Visible) { // IsGiftVoucherProducts ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->IsGiftVoucherProducts) == "") { ?>
		<th data-name="IsGiftVoucherProducts" class="<?php echo $pharmacy_products_list->IsGiftVoucherProducts->headerCellClass() ?>"><div id="elh_pharmacy_products_IsGiftVoucherProducts" class="pharmacy_products_IsGiftVoucherProducts"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->IsGiftVoucherProducts->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IsGiftVoucherProducts" class="<?php echo $pharmacy_products_list->IsGiftVoucherProducts->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->IsGiftVoucherProducts) ?>', 1);"><div id="elh_pharmacy_products_IsGiftVoucherProducts" class="pharmacy_products_IsGiftVoucherProducts">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->IsGiftVoucherProducts->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->IsGiftVoucherProducts->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->IsGiftVoucherProducts->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->AcceptRange4SerialNumber->Visible) { // AcceptRange4SerialNumber ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->AcceptRange4SerialNumber) == "") { ?>
		<th data-name="AcceptRange4SerialNumber" class="<?php echo $pharmacy_products_list->AcceptRange4SerialNumber->headerCellClass() ?>"><div id="elh_pharmacy_products_AcceptRange4SerialNumber" class="pharmacy_products_AcceptRange4SerialNumber"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->AcceptRange4SerialNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AcceptRange4SerialNumber" class="<?php echo $pharmacy_products_list->AcceptRange4SerialNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->AcceptRange4SerialNumber) ?>', 1);"><div id="elh_pharmacy_products_AcceptRange4SerialNumber" class="pharmacy_products_AcceptRange4SerialNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->AcceptRange4SerialNumber->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->AcceptRange4SerialNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->AcceptRange4SerialNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->GiftVoucherDenomination->Visible) { // GiftVoucherDenomination ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->GiftVoucherDenomination) == "") { ?>
		<th data-name="GiftVoucherDenomination" class="<?php echo $pharmacy_products_list->GiftVoucherDenomination->headerCellClass() ?>"><div id="elh_pharmacy_products_GiftVoucherDenomination" class="pharmacy_products_GiftVoucherDenomination"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->GiftVoucherDenomination->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GiftVoucherDenomination" class="<?php echo $pharmacy_products_list->GiftVoucherDenomination->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->GiftVoucherDenomination) ?>', 1);"><div id="elh_pharmacy_products_GiftVoucherDenomination" class="pharmacy_products_GiftVoucherDenomination">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->GiftVoucherDenomination->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->GiftVoucherDenomination->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->GiftVoucherDenomination->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->Subclasscode->Visible) { // Subclasscode ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->Subclasscode) == "") { ?>
		<th data-name="Subclasscode" class="<?php echo $pharmacy_products_list->Subclasscode->headerCellClass() ?>"><div id="elh_pharmacy_products_Subclasscode" class="pharmacy_products_Subclasscode"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->Subclasscode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Subclasscode" class="<?php echo $pharmacy_products_list->Subclasscode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->Subclasscode) ?>', 1);"><div id="elh_pharmacy_products_Subclasscode" class="pharmacy_products_Subclasscode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->Subclasscode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->Subclasscode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->Subclasscode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->BarCodeFromWeighingMachine->Visible) { // BarCodeFromWeighingMachine ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->BarCodeFromWeighingMachine) == "") { ?>
		<th data-name="BarCodeFromWeighingMachine" class="<?php echo $pharmacy_products_list->BarCodeFromWeighingMachine->headerCellClass() ?>"><div id="elh_pharmacy_products_BarCodeFromWeighingMachine" class="pharmacy_products_BarCodeFromWeighingMachine"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->BarCodeFromWeighingMachine->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BarCodeFromWeighingMachine" class="<?php echo $pharmacy_products_list->BarCodeFromWeighingMachine->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->BarCodeFromWeighingMachine) ?>', 1);"><div id="elh_pharmacy_products_BarCodeFromWeighingMachine" class="pharmacy_products_BarCodeFromWeighingMachine">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->BarCodeFromWeighingMachine->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->BarCodeFromWeighingMachine->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->BarCodeFromWeighingMachine->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->CheckCostInReturn->Visible) { // CheckCostInReturn ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->CheckCostInReturn) == "") { ?>
		<th data-name="CheckCostInReturn" class="<?php echo $pharmacy_products_list->CheckCostInReturn->headerCellClass() ?>"><div id="elh_pharmacy_products_CheckCostInReturn" class="pharmacy_products_CheckCostInReturn"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->CheckCostInReturn->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CheckCostInReturn" class="<?php echo $pharmacy_products_list->CheckCostInReturn->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->CheckCostInReturn) ?>', 1);"><div id="elh_pharmacy_products_CheckCostInReturn" class="pharmacy_products_CheckCostInReturn">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->CheckCostInReturn->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->CheckCostInReturn->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->CheckCostInReturn->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->FrequentSaleProduct->Visible) { // FrequentSaleProduct ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->FrequentSaleProduct) == "") { ?>
		<th data-name="FrequentSaleProduct" class="<?php echo $pharmacy_products_list->FrequentSaleProduct->headerCellClass() ?>"><div id="elh_pharmacy_products_FrequentSaleProduct" class="pharmacy_products_FrequentSaleProduct"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->FrequentSaleProduct->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FrequentSaleProduct" class="<?php echo $pharmacy_products_list->FrequentSaleProduct->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->FrequentSaleProduct) ?>', 1);"><div id="elh_pharmacy_products_FrequentSaleProduct" class="pharmacy_products_FrequentSaleProduct">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->FrequentSaleProduct->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->FrequentSaleProduct->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->FrequentSaleProduct->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->RateType->Visible) { // RateType ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->RateType) == "") { ?>
		<th data-name="RateType" class="<?php echo $pharmacy_products_list->RateType->headerCellClass() ?>"><div id="elh_pharmacy_products_RateType" class="pharmacy_products_RateType"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->RateType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RateType" class="<?php echo $pharmacy_products_list->RateType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->RateType) ?>', 1);"><div id="elh_pharmacy_products_RateType" class="pharmacy_products_RateType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->RateType->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->RateType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->RateType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->TouchscreenName->Visible) { // TouchscreenName ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->TouchscreenName) == "") { ?>
		<th data-name="TouchscreenName" class="<?php echo $pharmacy_products_list->TouchscreenName->headerCellClass() ?>"><div id="elh_pharmacy_products_TouchscreenName" class="pharmacy_products_TouchscreenName"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->TouchscreenName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TouchscreenName" class="<?php echo $pharmacy_products_list->TouchscreenName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->TouchscreenName) ?>', 1);"><div id="elh_pharmacy_products_TouchscreenName" class="pharmacy_products_TouchscreenName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->TouchscreenName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->TouchscreenName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->TouchscreenName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->FreeType->Visible) { // FreeType ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->FreeType) == "") { ?>
		<th data-name="FreeType" class="<?php echo $pharmacy_products_list->FreeType->headerCellClass() ?>"><div id="elh_pharmacy_products_FreeType" class="pharmacy_products_FreeType"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->FreeType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FreeType" class="<?php echo $pharmacy_products_list->FreeType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->FreeType) ?>', 1);"><div id="elh_pharmacy_products_FreeType" class="pharmacy_products_FreeType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->FreeType->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->FreeType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->FreeType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->LooseQtyasNewBatch->Visible) { // LooseQtyasNewBatch ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->LooseQtyasNewBatch) == "") { ?>
		<th data-name="LooseQtyasNewBatch" class="<?php echo $pharmacy_products_list->LooseQtyasNewBatch->headerCellClass() ?>"><div id="elh_pharmacy_products_LooseQtyasNewBatch" class="pharmacy_products_LooseQtyasNewBatch"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->LooseQtyasNewBatch->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LooseQtyasNewBatch" class="<?php echo $pharmacy_products_list->LooseQtyasNewBatch->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->LooseQtyasNewBatch) ?>', 1);"><div id="elh_pharmacy_products_LooseQtyasNewBatch" class="pharmacy_products_LooseQtyasNewBatch">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->LooseQtyasNewBatch->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->LooseQtyasNewBatch->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->LooseQtyasNewBatch->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->AllowSlabBilling->Visible) { // AllowSlabBilling ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->AllowSlabBilling) == "") { ?>
		<th data-name="AllowSlabBilling" class="<?php echo $pharmacy_products_list->AllowSlabBilling->headerCellClass() ?>"><div id="elh_pharmacy_products_AllowSlabBilling" class="pharmacy_products_AllowSlabBilling"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->AllowSlabBilling->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AllowSlabBilling" class="<?php echo $pharmacy_products_list->AllowSlabBilling->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->AllowSlabBilling) ?>', 1);"><div id="elh_pharmacy_products_AllowSlabBilling" class="pharmacy_products_AllowSlabBilling">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->AllowSlabBilling->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->AllowSlabBilling->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->AllowSlabBilling->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->ProductTypeForProduction->Visible) { // ProductTypeForProduction ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->ProductTypeForProduction) == "") { ?>
		<th data-name="ProductTypeForProduction" class="<?php echo $pharmacy_products_list->ProductTypeForProduction->headerCellClass() ?>"><div id="elh_pharmacy_products_ProductTypeForProduction" class="pharmacy_products_ProductTypeForProduction"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->ProductTypeForProduction->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProductTypeForProduction" class="<?php echo $pharmacy_products_list->ProductTypeForProduction->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->ProductTypeForProduction) ?>', 1);"><div id="elh_pharmacy_products_ProductTypeForProduction" class="pharmacy_products_ProductTypeForProduction">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->ProductTypeForProduction->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->ProductTypeForProduction->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->ProductTypeForProduction->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->RecipeCode->Visible) { // RecipeCode ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->RecipeCode) == "") { ?>
		<th data-name="RecipeCode" class="<?php echo $pharmacy_products_list->RecipeCode->headerCellClass() ?>"><div id="elh_pharmacy_products_RecipeCode" class="pharmacy_products_RecipeCode"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->RecipeCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RecipeCode" class="<?php echo $pharmacy_products_list->RecipeCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->RecipeCode) ?>', 1);"><div id="elh_pharmacy_products_RecipeCode" class="pharmacy_products_RecipeCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->RecipeCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->RecipeCode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->RecipeCode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->DefaultUnitType->Visible) { // DefaultUnitType ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->DefaultUnitType) == "") { ?>
		<th data-name="DefaultUnitType" class="<?php echo $pharmacy_products_list->DefaultUnitType->headerCellClass() ?>"><div id="elh_pharmacy_products_DefaultUnitType" class="pharmacy_products_DefaultUnitType"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->DefaultUnitType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DefaultUnitType" class="<?php echo $pharmacy_products_list->DefaultUnitType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->DefaultUnitType) ?>', 1);"><div id="elh_pharmacy_products_DefaultUnitType" class="pharmacy_products_DefaultUnitType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->DefaultUnitType->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->DefaultUnitType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->DefaultUnitType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->PIstatus->Visible) { // PIstatus ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->PIstatus) == "") { ?>
		<th data-name="PIstatus" class="<?php echo $pharmacy_products_list->PIstatus->headerCellClass() ?>"><div id="elh_pharmacy_products_PIstatus" class="pharmacy_products_PIstatus"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->PIstatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PIstatus" class="<?php echo $pharmacy_products_list->PIstatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->PIstatus) ?>', 1);"><div id="elh_pharmacy_products_PIstatus" class="pharmacy_products_PIstatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->PIstatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->PIstatus->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->PIstatus->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->LastPiConfirmedDate->Visible) { // LastPiConfirmedDate ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->LastPiConfirmedDate) == "") { ?>
		<th data-name="LastPiConfirmedDate" class="<?php echo $pharmacy_products_list->LastPiConfirmedDate->headerCellClass() ?>"><div id="elh_pharmacy_products_LastPiConfirmedDate" class="pharmacy_products_LastPiConfirmedDate"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->LastPiConfirmedDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LastPiConfirmedDate" class="<?php echo $pharmacy_products_list->LastPiConfirmedDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->LastPiConfirmedDate) ?>', 1);"><div id="elh_pharmacy_products_LastPiConfirmedDate" class="pharmacy_products_LastPiConfirmedDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->LastPiConfirmedDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->LastPiConfirmedDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->LastPiConfirmedDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->BarCodeDesign->Visible) { // BarCodeDesign ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->BarCodeDesign) == "") { ?>
		<th data-name="BarCodeDesign" class="<?php echo $pharmacy_products_list->BarCodeDesign->headerCellClass() ?>"><div id="elh_pharmacy_products_BarCodeDesign" class="pharmacy_products_BarCodeDesign"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->BarCodeDesign->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BarCodeDesign" class="<?php echo $pharmacy_products_list->BarCodeDesign->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->BarCodeDesign) ?>', 1);"><div id="elh_pharmacy_products_BarCodeDesign" class="pharmacy_products_BarCodeDesign">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->BarCodeDesign->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->BarCodeDesign->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->BarCodeDesign->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->AcceptRemarksInBill->Visible) { // AcceptRemarksInBill ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->AcceptRemarksInBill) == "") { ?>
		<th data-name="AcceptRemarksInBill" class="<?php echo $pharmacy_products_list->AcceptRemarksInBill->headerCellClass() ?>"><div id="elh_pharmacy_products_AcceptRemarksInBill" class="pharmacy_products_AcceptRemarksInBill"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->AcceptRemarksInBill->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AcceptRemarksInBill" class="<?php echo $pharmacy_products_list->AcceptRemarksInBill->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->AcceptRemarksInBill) ?>', 1);"><div id="elh_pharmacy_products_AcceptRemarksInBill" class="pharmacy_products_AcceptRemarksInBill">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->AcceptRemarksInBill->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->AcceptRemarksInBill->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->AcceptRemarksInBill->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->Classification->Visible) { // Classification ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->Classification) == "") { ?>
		<th data-name="Classification" class="<?php echo $pharmacy_products_list->Classification->headerCellClass() ?>"><div id="elh_pharmacy_products_Classification" class="pharmacy_products_Classification"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->Classification->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Classification" class="<?php echo $pharmacy_products_list->Classification->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->Classification) ?>', 1);"><div id="elh_pharmacy_products_Classification" class="pharmacy_products_Classification">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->Classification->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->Classification->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->Classification->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->TimeSlot->Visible) { // TimeSlot ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->TimeSlot) == "") { ?>
		<th data-name="TimeSlot" class="<?php echo $pharmacy_products_list->TimeSlot->headerCellClass() ?>"><div id="elh_pharmacy_products_TimeSlot" class="pharmacy_products_TimeSlot"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->TimeSlot->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TimeSlot" class="<?php echo $pharmacy_products_list->TimeSlot->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->TimeSlot) ?>', 1);"><div id="elh_pharmacy_products_TimeSlot" class="pharmacy_products_TimeSlot">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->TimeSlot->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->TimeSlot->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->TimeSlot->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->IsBundle->Visible) { // IsBundle ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->IsBundle) == "") { ?>
		<th data-name="IsBundle" class="<?php echo $pharmacy_products_list->IsBundle->headerCellClass() ?>"><div id="elh_pharmacy_products_IsBundle" class="pharmacy_products_IsBundle"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->IsBundle->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IsBundle" class="<?php echo $pharmacy_products_list->IsBundle->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->IsBundle) ?>', 1);"><div id="elh_pharmacy_products_IsBundle" class="pharmacy_products_IsBundle">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->IsBundle->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->IsBundle->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->IsBundle->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->ColorCode->Visible) { // ColorCode ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->ColorCode) == "") { ?>
		<th data-name="ColorCode" class="<?php echo $pharmacy_products_list->ColorCode->headerCellClass() ?>"><div id="elh_pharmacy_products_ColorCode" class="pharmacy_products_ColorCode"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->ColorCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ColorCode" class="<?php echo $pharmacy_products_list->ColorCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->ColorCode) ?>', 1);"><div id="elh_pharmacy_products_ColorCode" class="pharmacy_products_ColorCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->ColorCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->ColorCode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->ColorCode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->GenderCode->Visible) { // GenderCode ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->GenderCode) == "") { ?>
		<th data-name="GenderCode" class="<?php echo $pharmacy_products_list->GenderCode->headerCellClass() ?>"><div id="elh_pharmacy_products_GenderCode" class="pharmacy_products_GenderCode"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->GenderCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GenderCode" class="<?php echo $pharmacy_products_list->GenderCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->GenderCode) ?>', 1);"><div id="elh_pharmacy_products_GenderCode" class="pharmacy_products_GenderCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->GenderCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->GenderCode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->GenderCode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->SizeCode->Visible) { // SizeCode ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->SizeCode) == "") { ?>
		<th data-name="SizeCode" class="<?php echo $pharmacy_products_list->SizeCode->headerCellClass() ?>"><div id="elh_pharmacy_products_SizeCode" class="pharmacy_products_SizeCode"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->SizeCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SizeCode" class="<?php echo $pharmacy_products_list->SizeCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->SizeCode) ?>', 1);"><div id="elh_pharmacy_products_SizeCode" class="pharmacy_products_SizeCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->SizeCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->SizeCode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->SizeCode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->GiftCard->Visible) { // GiftCard ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->GiftCard) == "") { ?>
		<th data-name="GiftCard" class="<?php echo $pharmacy_products_list->GiftCard->headerCellClass() ?>"><div id="elh_pharmacy_products_GiftCard" class="pharmacy_products_GiftCard"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->GiftCard->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GiftCard" class="<?php echo $pharmacy_products_list->GiftCard->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->GiftCard) ?>', 1);"><div id="elh_pharmacy_products_GiftCard" class="pharmacy_products_GiftCard">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->GiftCard->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->GiftCard->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->GiftCard->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->ToonLabel->Visible) { // ToonLabel ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->ToonLabel) == "") { ?>
		<th data-name="ToonLabel" class="<?php echo $pharmacy_products_list->ToonLabel->headerCellClass() ?>"><div id="elh_pharmacy_products_ToonLabel" class="pharmacy_products_ToonLabel"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->ToonLabel->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ToonLabel" class="<?php echo $pharmacy_products_list->ToonLabel->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->ToonLabel) ?>', 1);"><div id="elh_pharmacy_products_ToonLabel" class="pharmacy_products_ToonLabel">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->ToonLabel->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->ToonLabel->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->ToonLabel->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->GarmentType->Visible) { // GarmentType ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->GarmentType) == "") { ?>
		<th data-name="GarmentType" class="<?php echo $pharmacy_products_list->GarmentType->headerCellClass() ?>"><div id="elh_pharmacy_products_GarmentType" class="pharmacy_products_GarmentType"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->GarmentType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GarmentType" class="<?php echo $pharmacy_products_list->GarmentType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->GarmentType) ?>', 1);"><div id="elh_pharmacy_products_GarmentType" class="pharmacy_products_GarmentType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->GarmentType->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->GarmentType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->GarmentType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->AgeGroup->Visible) { // AgeGroup ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->AgeGroup) == "") { ?>
		<th data-name="AgeGroup" class="<?php echo $pharmacy_products_list->AgeGroup->headerCellClass() ?>"><div id="elh_pharmacy_products_AgeGroup" class="pharmacy_products_AgeGroup"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->AgeGroup->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AgeGroup" class="<?php echo $pharmacy_products_list->AgeGroup->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->AgeGroup) ?>', 1);"><div id="elh_pharmacy_products_AgeGroup" class="pharmacy_products_AgeGroup">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->AgeGroup->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->AgeGroup->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->AgeGroup->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->Season->Visible) { // Season ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->Season) == "") { ?>
		<th data-name="Season" class="<?php echo $pharmacy_products_list->Season->headerCellClass() ?>"><div id="elh_pharmacy_products_Season" class="pharmacy_products_Season"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->Season->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Season" class="<?php echo $pharmacy_products_list->Season->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->Season) ?>', 1);"><div id="elh_pharmacy_products_Season" class="pharmacy_products_Season">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->Season->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->Season->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->Season->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->DailyStockEntry->Visible) { // DailyStockEntry ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->DailyStockEntry) == "") { ?>
		<th data-name="DailyStockEntry" class="<?php echo $pharmacy_products_list->DailyStockEntry->headerCellClass() ?>"><div id="elh_pharmacy_products_DailyStockEntry" class="pharmacy_products_DailyStockEntry"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->DailyStockEntry->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DailyStockEntry" class="<?php echo $pharmacy_products_list->DailyStockEntry->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->DailyStockEntry) ?>', 1);"><div id="elh_pharmacy_products_DailyStockEntry" class="pharmacy_products_DailyStockEntry">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->DailyStockEntry->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->DailyStockEntry->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->DailyStockEntry->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->ModifierApplicable->Visible) { // ModifierApplicable ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->ModifierApplicable) == "") { ?>
		<th data-name="ModifierApplicable" class="<?php echo $pharmacy_products_list->ModifierApplicable->headerCellClass() ?>"><div id="elh_pharmacy_products_ModifierApplicable" class="pharmacy_products_ModifierApplicable"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->ModifierApplicable->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModifierApplicable" class="<?php echo $pharmacy_products_list->ModifierApplicable->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->ModifierApplicable) ?>', 1);"><div id="elh_pharmacy_products_ModifierApplicable" class="pharmacy_products_ModifierApplicable">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->ModifierApplicable->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->ModifierApplicable->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->ModifierApplicable->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->ModifierType->Visible) { // ModifierType ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->ModifierType) == "") { ?>
		<th data-name="ModifierType" class="<?php echo $pharmacy_products_list->ModifierType->headerCellClass() ?>"><div id="elh_pharmacy_products_ModifierType" class="pharmacy_products_ModifierType"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->ModifierType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModifierType" class="<?php echo $pharmacy_products_list->ModifierType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->ModifierType) ?>', 1);"><div id="elh_pharmacy_products_ModifierType" class="pharmacy_products_ModifierType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->ModifierType->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->ModifierType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->ModifierType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->AcceptZeroRate->Visible) { // AcceptZeroRate ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->AcceptZeroRate) == "") { ?>
		<th data-name="AcceptZeroRate" class="<?php echo $pharmacy_products_list->AcceptZeroRate->headerCellClass() ?>"><div id="elh_pharmacy_products_AcceptZeroRate" class="pharmacy_products_AcceptZeroRate"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->AcceptZeroRate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AcceptZeroRate" class="<?php echo $pharmacy_products_list->AcceptZeroRate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->AcceptZeroRate) ?>', 1);"><div id="elh_pharmacy_products_AcceptZeroRate" class="pharmacy_products_AcceptZeroRate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->AcceptZeroRate->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->AcceptZeroRate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->AcceptZeroRate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->ExciseDutyCode->Visible) { // ExciseDutyCode ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->ExciseDutyCode) == "") { ?>
		<th data-name="ExciseDutyCode" class="<?php echo $pharmacy_products_list->ExciseDutyCode->headerCellClass() ?>"><div id="elh_pharmacy_products_ExciseDutyCode" class="pharmacy_products_ExciseDutyCode"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->ExciseDutyCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ExciseDutyCode" class="<?php echo $pharmacy_products_list->ExciseDutyCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->ExciseDutyCode) ?>', 1);"><div id="elh_pharmacy_products_ExciseDutyCode" class="pharmacy_products_ExciseDutyCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->ExciseDutyCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->ExciseDutyCode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->ExciseDutyCode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->IndentProductGroupCode->Visible) { // IndentProductGroupCode ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->IndentProductGroupCode) == "") { ?>
		<th data-name="IndentProductGroupCode" class="<?php echo $pharmacy_products_list->IndentProductGroupCode->headerCellClass() ?>"><div id="elh_pharmacy_products_IndentProductGroupCode" class="pharmacy_products_IndentProductGroupCode"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->IndentProductGroupCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IndentProductGroupCode" class="<?php echo $pharmacy_products_list->IndentProductGroupCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->IndentProductGroupCode) ?>', 1);"><div id="elh_pharmacy_products_IndentProductGroupCode" class="pharmacy_products_IndentProductGroupCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->IndentProductGroupCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->IndentProductGroupCode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->IndentProductGroupCode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->IsMultiBatch->Visible) { // IsMultiBatch ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->IsMultiBatch) == "") { ?>
		<th data-name="IsMultiBatch" class="<?php echo $pharmacy_products_list->IsMultiBatch->headerCellClass() ?>"><div id="elh_pharmacy_products_IsMultiBatch" class="pharmacy_products_IsMultiBatch"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->IsMultiBatch->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IsMultiBatch" class="<?php echo $pharmacy_products_list->IsMultiBatch->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->IsMultiBatch) ?>', 1);"><div id="elh_pharmacy_products_IsMultiBatch" class="pharmacy_products_IsMultiBatch">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->IsMultiBatch->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->IsMultiBatch->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->IsMultiBatch->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->IsSingleBatch->Visible) { // IsSingleBatch ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->IsSingleBatch) == "") { ?>
		<th data-name="IsSingleBatch" class="<?php echo $pharmacy_products_list->IsSingleBatch->headerCellClass() ?>"><div id="elh_pharmacy_products_IsSingleBatch" class="pharmacy_products_IsSingleBatch"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->IsSingleBatch->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IsSingleBatch" class="<?php echo $pharmacy_products_list->IsSingleBatch->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->IsSingleBatch) ?>', 1);"><div id="elh_pharmacy_products_IsSingleBatch" class="pharmacy_products_IsSingleBatch">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->IsSingleBatch->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->IsSingleBatch->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->IsSingleBatch->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->MarkUpRate1->Visible) { // MarkUpRate1 ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->MarkUpRate1) == "") { ?>
		<th data-name="MarkUpRate1" class="<?php echo $pharmacy_products_list->MarkUpRate1->headerCellClass() ?>"><div id="elh_pharmacy_products_MarkUpRate1" class="pharmacy_products_MarkUpRate1"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->MarkUpRate1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MarkUpRate1" class="<?php echo $pharmacy_products_list->MarkUpRate1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->MarkUpRate1) ?>', 1);"><div id="elh_pharmacy_products_MarkUpRate1" class="pharmacy_products_MarkUpRate1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->MarkUpRate1->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->MarkUpRate1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->MarkUpRate1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->MarkDownRate1->Visible) { // MarkDownRate1 ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->MarkDownRate1) == "") { ?>
		<th data-name="MarkDownRate1" class="<?php echo $pharmacy_products_list->MarkDownRate1->headerCellClass() ?>"><div id="elh_pharmacy_products_MarkDownRate1" class="pharmacy_products_MarkDownRate1"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->MarkDownRate1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MarkDownRate1" class="<?php echo $pharmacy_products_list->MarkDownRate1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->MarkDownRate1) ?>', 1);"><div id="elh_pharmacy_products_MarkDownRate1" class="pharmacy_products_MarkDownRate1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->MarkDownRate1->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->MarkDownRate1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->MarkDownRate1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->MarkUpRate2->Visible) { // MarkUpRate2 ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->MarkUpRate2) == "") { ?>
		<th data-name="MarkUpRate2" class="<?php echo $pharmacy_products_list->MarkUpRate2->headerCellClass() ?>"><div id="elh_pharmacy_products_MarkUpRate2" class="pharmacy_products_MarkUpRate2"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->MarkUpRate2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MarkUpRate2" class="<?php echo $pharmacy_products_list->MarkUpRate2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->MarkUpRate2) ?>', 1);"><div id="elh_pharmacy_products_MarkUpRate2" class="pharmacy_products_MarkUpRate2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->MarkUpRate2->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->MarkUpRate2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->MarkUpRate2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->MarkDownRate2->Visible) { // MarkDownRate2 ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->MarkDownRate2) == "") { ?>
		<th data-name="MarkDownRate2" class="<?php echo $pharmacy_products_list->MarkDownRate2->headerCellClass() ?>"><div id="elh_pharmacy_products_MarkDownRate2" class="pharmacy_products_MarkDownRate2"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->MarkDownRate2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MarkDownRate2" class="<?php echo $pharmacy_products_list->MarkDownRate2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->MarkDownRate2) ?>', 1);"><div id="elh_pharmacy_products_MarkDownRate2" class="pharmacy_products_MarkDownRate2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->MarkDownRate2->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->MarkDownRate2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->MarkDownRate2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->_Yield->Visible) { // Yield ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->_Yield) == "") { ?>
		<th data-name="_Yield" class="<?php echo $pharmacy_products_list->_Yield->headerCellClass() ?>"><div id="elh_pharmacy_products__Yield" class="pharmacy_products__Yield"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->_Yield->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_Yield" class="<?php echo $pharmacy_products_list->_Yield->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->_Yield) ?>', 1);"><div id="elh_pharmacy_products__Yield" class="pharmacy_products__Yield">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->_Yield->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->_Yield->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->_Yield->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->RefProductCode->Visible) { // RefProductCode ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->RefProductCode) == "") { ?>
		<th data-name="RefProductCode" class="<?php echo $pharmacy_products_list->RefProductCode->headerCellClass() ?>"><div id="elh_pharmacy_products_RefProductCode" class="pharmacy_products_RefProductCode"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->RefProductCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RefProductCode" class="<?php echo $pharmacy_products_list->RefProductCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->RefProductCode) ?>', 1);"><div id="elh_pharmacy_products_RefProductCode" class="pharmacy_products_RefProductCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->RefProductCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->RefProductCode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->RefProductCode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->Volume->Visible) { // Volume ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->Volume) == "") { ?>
		<th data-name="Volume" class="<?php echo $pharmacy_products_list->Volume->headerCellClass() ?>"><div id="elh_pharmacy_products_Volume" class="pharmacy_products_Volume"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->Volume->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Volume" class="<?php echo $pharmacy_products_list->Volume->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->Volume) ?>', 1);"><div id="elh_pharmacy_products_Volume" class="pharmacy_products_Volume">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->Volume->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->Volume->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->Volume->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->MeasurementID->Visible) { // MeasurementID ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->MeasurementID) == "") { ?>
		<th data-name="MeasurementID" class="<?php echo $pharmacy_products_list->MeasurementID->headerCellClass() ?>"><div id="elh_pharmacy_products_MeasurementID" class="pharmacy_products_MeasurementID"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->MeasurementID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MeasurementID" class="<?php echo $pharmacy_products_list->MeasurementID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->MeasurementID) ?>', 1);"><div id="elh_pharmacy_products_MeasurementID" class="pharmacy_products_MeasurementID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->MeasurementID->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->MeasurementID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->MeasurementID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->CountryCode->Visible) { // CountryCode ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->CountryCode) == "") { ?>
		<th data-name="CountryCode" class="<?php echo $pharmacy_products_list->CountryCode->headerCellClass() ?>"><div id="elh_pharmacy_products_CountryCode" class="pharmacy_products_CountryCode"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->CountryCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CountryCode" class="<?php echo $pharmacy_products_list->CountryCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->CountryCode) ?>', 1);"><div id="elh_pharmacy_products_CountryCode" class="pharmacy_products_CountryCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->CountryCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->CountryCode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->CountryCode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->AcceptWMQty->Visible) { // AcceptWMQty ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->AcceptWMQty) == "") { ?>
		<th data-name="AcceptWMQty" class="<?php echo $pharmacy_products_list->AcceptWMQty->headerCellClass() ?>"><div id="elh_pharmacy_products_AcceptWMQty" class="pharmacy_products_AcceptWMQty"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->AcceptWMQty->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AcceptWMQty" class="<?php echo $pharmacy_products_list->AcceptWMQty->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->AcceptWMQty) ?>', 1);"><div id="elh_pharmacy_products_AcceptWMQty" class="pharmacy_products_AcceptWMQty">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->AcceptWMQty->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->AcceptWMQty->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->AcceptWMQty->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->SingleBatchBasedOnRate->Visible) { // SingleBatchBasedOnRate ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->SingleBatchBasedOnRate) == "") { ?>
		<th data-name="SingleBatchBasedOnRate" class="<?php echo $pharmacy_products_list->SingleBatchBasedOnRate->headerCellClass() ?>"><div id="elh_pharmacy_products_SingleBatchBasedOnRate" class="pharmacy_products_SingleBatchBasedOnRate"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->SingleBatchBasedOnRate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SingleBatchBasedOnRate" class="<?php echo $pharmacy_products_list->SingleBatchBasedOnRate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->SingleBatchBasedOnRate) ?>', 1);"><div id="elh_pharmacy_products_SingleBatchBasedOnRate" class="pharmacy_products_SingleBatchBasedOnRate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->SingleBatchBasedOnRate->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->SingleBatchBasedOnRate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->SingleBatchBasedOnRate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->TenderNo->Visible) { // TenderNo ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->TenderNo) == "") { ?>
		<th data-name="TenderNo" class="<?php echo $pharmacy_products_list->TenderNo->headerCellClass() ?>"><div id="elh_pharmacy_products_TenderNo" class="pharmacy_products_TenderNo"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->TenderNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TenderNo" class="<?php echo $pharmacy_products_list->TenderNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->TenderNo) ?>', 1);"><div id="elh_pharmacy_products_TenderNo" class="pharmacy_products_TenderNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->TenderNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->TenderNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->TenderNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->SingleBillMaximumSoldQtyFiled->Visible) { // SingleBillMaximumSoldQtyFiled ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->SingleBillMaximumSoldQtyFiled) == "") { ?>
		<th data-name="SingleBillMaximumSoldQtyFiled" class="<?php echo $pharmacy_products_list->SingleBillMaximumSoldQtyFiled->headerCellClass() ?>"><div id="elh_pharmacy_products_SingleBillMaximumSoldQtyFiled" class="pharmacy_products_SingleBillMaximumSoldQtyFiled"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->SingleBillMaximumSoldQtyFiled->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SingleBillMaximumSoldQtyFiled" class="<?php echo $pharmacy_products_list->SingleBillMaximumSoldQtyFiled->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->SingleBillMaximumSoldQtyFiled) ?>', 1);"><div id="elh_pharmacy_products_SingleBillMaximumSoldQtyFiled" class="pharmacy_products_SingleBillMaximumSoldQtyFiled">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->SingleBillMaximumSoldQtyFiled->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->SingleBillMaximumSoldQtyFiled->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->SingleBillMaximumSoldQtyFiled->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->Strength1->Visible) { // Strength1 ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->Strength1) == "") { ?>
		<th data-name="Strength1" class="<?php echo $pharmacy_products_list->Strength1->headerCellClass() ?>"><div id="elh_pharmacy_products_Strength1" class="pharmacy_products_Strength1"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->Strength1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Strength1" class="<?php echo $pharmacy_products_list->Strength1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->Strength1) ?>', 1);"><div id="elh_pharmacy_products_Strength1" class="pharmacy_products_Strength1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->Strength1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->Strength1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->Strength1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->Strength2->Visible) { // Strength2 ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->Strength2) == "") { ?>
		<th data-name="Strength2" class="<?php echo $pharmacy_products_list->Strength2->headerCellClass() ?>"><div id="elh_pharmacy_products_Strength2" class="pharmacy_products_Strength2"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->Strength2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Strength2" class="<?php echo $pharmacy_products_list->Strength2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->Strength2) ?>', 1);"><div id="elh_pharmacy_products_Strength2" class="pharmacy_products_Strength2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->Strength2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->Strength2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->Strength2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->Strength3->Visible) { // Strength3 ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->Strength3) == "") { ?>
		<th data-name="Strength3" class="<?php echo $pharmacy_products_list->Strength3->headerCellClass() ?>"><div id="elh_pharmacy_products_Strength3" class="pharmacy_products_Strength3"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->Strength3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Strength3" class="<?php echo $pharmacy_products_list->Strength3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->Strength3) ?>', 1);"><div id="elh_pharmacy_products_Strength3" class="pharmacy_products_Strength3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->Strength3->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->Strength3->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->Strength3->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->Strength4->Visible) { // Strength4 ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->Strength4) == "") { ?>
		<th data-name="Strength4" class="<?php echo $pharmacy_products_list->Strength4->headerCellClass() ?>"><div id="elh_pharmacy_products_Strength4" class="pharmacy_products_Strength4"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->Strength4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Strength4" class="<?php echo $pharmacy_products_list->Strength4->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->Strength4) ?>', 1);"><div id="elh_pharmacy_products_Strength4" class="pharmacy_products_Strength4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->Strength4->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->Strength4->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->Strength4->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->Strength5->Visible) { // Strength5 ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->Strength5) == "") { ?>
		<th data-name="Strength5" class="<?php echo $pharmacy_products_list->Strength5->headerCellClass() ?>"><div id="elh_pharmacy_products_Strength5" class="pharmacy_products_Strength5"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->Strength5->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Strength5" class="<?php echo $pharmacy_products_list->Strength5->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->Strength5) ?>', 1);"><div id="elh_pharmacy_products_Strength5" class="pharmacy_products_Strength5">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->Strength5->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->Strength5->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->Strength5->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->IngredientCode1->Visible) { // IngredientCode1 ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->IngredientCode1) == "") { ?>
		<th data-name="IngredientCode1" class="<?php echo $pharmacy_products_list->IngredientCode1->headerCellClass() ?>"><div id="elh_pharmacy_products_IngredientCode1" class="pharmacy_products_IngredientCode1"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->IngredientCode1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IngredientCode1" class="<?php echo $pharmacy_products_list->IngredientCode1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->IngredientCode1) ?>', 1);"><div id="elh_pharmacy_products_IngredientCode1" class="pharmacy_products_IngredientCode1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->IngredientCode1->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->IngredientCode1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->IngredientCode1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->IngredientCode2->Visible) { // IngredientCode2 ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->IngredientCode2) == "") { ?>
		<th data-name="IngredientCode2" class="<?php echo $pharmacy_products_list->IngredientCode2->headerCellClass() ?>"><div id="elh_pharmacy_products_IngredientCode2" class="pharmacy_products_IngredientCode2"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->IngredientCode2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IngredientCode2" class="<?php echo $pharmacy_products_list->IngredientCode2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->IngredientCode2) ?>', 1);"><div id="elh_pharmacy_products_IngredientCode2" class="pharmacy_products_IngredientCode2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->IngredientCode2->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->IngredientCode2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->IngredientCode2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->IngredientCode3->Visible) { // IngredientCode3 ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->IngredientCode3) == "") { ?>
		<th data-name="IngredientCode3" class="<?php echo $pharmacy_products_list->IngredientCode3->headerCellClass() ?>"><div id="elh_pharmacy_products_IngredientCode3" class="pharmacy_products_IngredientCode3"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->IngredientCode3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IngredientCode3" class="<?php echo $pharmacy_products_list->IngredientCode3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->IngredientCode3) ?>', 1);"><div id="elh_pharmacy_products_IngredientCode3" class="pharmacy_products_IngredientCode3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->IngredientCode3->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->IngredientCode3->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->IngredientCode3->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->IngredientCode4->Visible) { // IngredientCode4 ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->IngredientCode4) == "") { ?>
		<th data-name="IngredientCode4" class="<?php echo $pharmacy_products_list->IngredientCode4->headerCellClass() ?>"><div id="elh_pharmacy_products_IngredientCode4" class="pharmacy_products_IngredientCode4"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->IngredientCode4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IngredientCode4" class="<?php echo $pharmacy_products_list->IngredientCode4->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->IngredientCode4) ?>', 1);"><div id="elh_pharmacy_products_IngredientCode4" class="pharmacy_products_IngredientCode4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->IngredientCode4->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->IngredientCode4->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->IngredientCode4->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->IngredientCode5->Visible) { // IngredientCode5 ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->IngredientCode5) == "") { ?>
		<th data-name="IngredientCode5" class="<?php echo $pharmacy_products_list->IngredientCode5->headerCellClass() ?>"><div id="elh_pharmacy_products_IngredientCode5" class="pharmacy_products_IngredientCode5"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->IngredientCode5->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IngredientCode5" class="<?php echo $pharmacy_products_list->IngredientCode5->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->IngredientCode5) ?>', 1);"><div id="elh_pharmacy_products_IngredientCode5" class="pharmacy_products_IngredientCode5">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->IngredientCode5->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->IngredientCode5->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->IngredientCode5->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->OrderType->Visible) { // OrderType ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->OrderType) == "") { ?>
		<th data-name="OrderType" class="<?php echo $pharmacy_products_list->OrderType->headerCellClass() ?>"><div id="elh_pharmacy_products_OrderType" class="pharmacy_products_OrderType"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->OrderType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OrderType" class="<?php echo $pharmacy_products_list->OrderType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->OrderType) ?>', 1);"><div id="elh_pharmacy_products_OrderType" class="pharmacy_products_OrderType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->OrderType->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->OrderType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->OrderType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->StockUOM->Visible) { // StockUOM ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->StockUOM) == "") { ?>
		<th data-name="StockUOM" class="<?php echo $pharmacy_products_list->StockUOM->headerCellClass() ?>"><div id="elh_pharmacy_products_StockUOM" class="pharmacy_products_StockUOM"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->StockUOM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StockUOM" class="<?php echo $pharmacy_products_list->StockUOM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->StockUOM) ?>', 1);"><div id="elh_pharmacy_products_StockUOM" class="pharmacy_products_StockUOM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->StockUOM->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->StockUOM->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->StockUOM->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->PriceUOM->Visible) { // PriceUOM ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->PriceUOM) == "") { ?>
		<th data-name="PriceUOM" class="<?php echo $pharmacy_products_list->PriceUOM->headerCellClass() ?>"><div id="elh_pharmacy_products_PriceUOM" class="pharmacy_products_PriceUOM"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->PriceUOM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PriceUOM" class="<?php echo $pharmacy_products_list->PriceUOM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->PriceUOM) ?>', 1);"><div id="elh_pharmacy_products_PriceUOM" class="pharmacy_products_PriceUOM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->PriceUOM->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->PriceUOM->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->PriceUOM->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->DefaultSaleUOM->Visible) { // DefaultSaleUOM ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->DefaultSaleUOM) == "") { ?>
		<th data-name="DefaultSaleUOM" class="<?php echo $pharmacy_products_list->DefaultSaleUOM->headerCellClass() ?>"><div id="elh_pharmacy_products_DefaultSaleUOM" class="pharmacy_products_DefaultSaleUOM"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->DefaultSaleUOM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DefaultSaleUOM" class="<?php echo $pharmacy_products_list->DefaultSaleUOM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->DefaultSaleUOM) ?>', 1);"><div id="elh_pharmacy_products_DefaultSaleUOM" class="pharmacy_products_DefaultSaleUOM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->DefaultSaleUOM->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->DefaultSaleUOM->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->DefaultSaleUOM->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->DefaultPurchaseUOM->Visible) { // DefaultPurchaseUOM ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->DefaultPurchaseUOM) == "") { ?>
		<th data-name="DefaultPurchaseUOM" class="<?php echo $pharmacy_products_list->DefaultPurchaseUOM->headerCellClass() ?>"><div id="elh_pharmacy_products_DefaultPurchaseUOM" class="pharmacy_products_DefaultPurchaseUOM"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->DefaultPurchaseUOM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DefaultPurchaseUOM" class="<?php echo $pharmacy_products_list->DefaultPurchaseUOM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->DefaultPurchaseUOM) ?>', 1);"><div id="elh_pharmacy_products_DefaultPurchaseUOM" class="pharmacy_products_DefaultPurchaseUOM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->DefaultPurchaseUOM->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->DefaultPurchaseUOM->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->DefaultPurchaseUOM->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->ReportingUOM->Visible) { // ReportingUOM ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->ReportingUOM) == "") { ?>
		<th data-name="ReportingUOM" class="<?php echo $pharmacy_products_list->ReportingUOM->headerCellClass() ?>"><div id="elh_pharmacy_products_ReportingUOM" class="pharmacy_products_ReportingUOM"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->ReportingUOM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReportingUOM" class="<?php echo $pharmacy_products_list->ReportingUOM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->ReportingUOM) ?>', 1);"><div id="elh_pharmacy_products_ReportingUOM" class="pharmacy_products_ReportingUOM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->ReportingUOM->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->ReportingUOM->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->ReportingUOM->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->LastPurchasedUOM->Visible) { // LastPurchasedUOM ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->LastPurchasedUOM) == "") { ?>
		<th data-name="LastPurchasedUOM" class="<?php echo $pharmacy_products_list->LastPurchasedUOM->headerCellClass() ?>"><div id="elh_pharmacy_products_LastPurchasedUOM" class="pharmacy_products_LastPurchasedUOM"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->LastPurchasedUOM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LastPurchasedUOM" class="<?php echo $pharmacy_products_list->LastPurchasedUOM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->LastPurchasedUOM) ?>', 1);"><div id="elh_pharmacy_products_LastPurchasedUOM" class="pharmacy_products_LastPurchasedUOM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->LastPurchasedUOM->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->LastPurchasedUOM->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->LastPurchasedUOM->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->TreatmentCodes->Visible) { // TreatmentCodes ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->TreatmentCodes) == "") { ?>
		<th data-name="TreatmentCodes" class="<?php echo $pharmacy_products_list->TreatmentCodes->headerCellClass() ?>"><div id="elh_pharmacy_products_TreatmentCodes" class="pharmacy_products_TreatmentCodes"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->TreatmentCodes->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TreatmentCodes" class="<?php echo $pharmacy_products_list->TreatmentCodes->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->TreatmentCodes) ?>', 1);"><div id="elh_pharmacy_products_TreatmentCodes" class="pharmacy_products_TreatmentCodes">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->TreatmentCodes->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->TreatmentCodes->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->TreatmentCodes->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->InsuranceType->Visible) { // InsuranceType ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->InsuranceType) == "") { ?>
		<th data-name="InsuranceType" class="<?php echo $pharmacy_products_list->InsuranceType->headerCellClass() ?>"><div id="elh_pharmacy_products_InsuranceType" class="pharmacy_products_InsuranceType"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->InsuranceType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="InsuranceType" class="<?php echo $pharmacy_products_list->InsuranceType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->InsuranceType) ?>', 1);"><div id="elh_pharmacy_products_InsuranceType" class="pharmacy_products_InsuranceType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->InsuranceType->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->InsuranceType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->InsuranceType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->CoverageGroupCodes->Visible) { // CoverageGroupCodes ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->CoverageGroupCodes) == "") { ?>
		<th data-name="CoverageGroupCodes" class="<?php echo $pharmacy_products_list->CoverageGroupCodes->headerCellClass() ?>"><div id="elh_pharmacy_products_CoverageGroupCodes" class="pharmacy_products_CoverageGroupCodes"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->CoverageGroupCodes->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CoverageGroupCodes" class="<?php echo $pharmacy_products_list->CoverageGroupCodes->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->CoverageGroupCodes) ?>', 1);"><div id="elh_pharmacy_products_CoverageGroupCodes" class="pharmacy_products_CoverageGroupCodes">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->CoverageGroupCodes->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->CoverageGroupCodes->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->CoverageGroupCodes->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->MultipleUOM->Visible) { // MultipleUOM ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->MultipleUOM) == "") { ?>
		<th data-name="MultipleUOM" class="<?php echo $pharmacy_products_list->MultipleUOM->headerCellClass() ?>"><div id="elh_pharmacy_products_MultipleUOM" class="pharmacy_products_MultipleUOM"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->MultipleUOM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MultipleUOM" class="<?php echo $pharmacy_products_list->MultipleUOM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->MultipleUOM) ?>', 1);"><div id="elh_pharmacy_products_MultipleUOM" class="pharmacy_products_MultipleUOM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->MultipleUOM->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->MultipleUOM->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->MultipleUOM->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->SalePriceComputation->Visible) { // SalePriceComputation ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->SalePriceComputation) == "") { ?>
		<th data-name="SalePriceComputation" class="<?php echo $pharmacy_products_list->SalePriceComputation->headerCellClass() ?>"><div id="elh_pharmacy_products_SalePriceComputation" class="pharmacy_products_SalePriceComputation"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->SalePriceComputation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SalePriceComputation" class="<?php echo $pharmacy_products_list->SalePriceComputation->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->SalePriceComputation) ?>', 1);"><div id="elh_pharmacy_products_SalePriceComputation" class="pharmacy_products_SalePriceComputation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->SalePriceComputation->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->SalePriceComputation->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->SalePriceComputation->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->StockCorrection->Visible) { // StockCorrection ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->StockCorrection) == "") { ?>
		<th data-name="StockCorrection" class="<?php echo $pharmacy_products_list->StockCorrection->headerCellClass() ?>"><div id="elh_pharmacy_products_StockCorrection" class="pharmacy_products_StockCorrection"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->StockCorrection->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StockCorrection" class="<?php echo $pharmacy_products_list->StockCorrection->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->StockCorrection) ?>', 1);"><div id="elh_pharmacy_products_StockCorrection" class="pharmacy_products_StockCorrection">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->StockCorrection->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->StockCorrection->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->StockCorrection->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->LBTPercentage->Visible) { // LBTPercentage ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->LBTPercentage) == "") { ?>
		<th data-name="LBTPercentage" class="<?php echo $pharmacy_products_list->LBTPercentage->headerCellClass() ?>"><div id="elh_pharmacy_products_LBTPercentage" class="pharmacy_products_LBTPercentage"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->LBTPercentage->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LBTPercentage" class="<?php echo $pharmacy_products_list->LBTPercentage->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->LBTPercentage) ?>', 1);"><div id="elh_pharmacy_products_LBTPercentage" class="pharmacy_products_LBTPercentage">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->LBTPercentage->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->LBTPercentage->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->LBTPercentage->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->SalesCommission->Visible) { // SalesCommission ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->SalesCommission) == "") { ?>
		<th data-name="SalesCommission" class="<?php echo $pharmacy_products_list->SalesCommission->headerCellClass() ?>"><div id="elh_pharmacy_products_SalesCommission" class="pharmacy_products_SalesCommission"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->SalesCommission->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SalesCommission" class="<?php echo $pharmacy_products_list->SalesCommission->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->SalesCommission) ?>', 1);"><div id="elh_pharmacy_products_SalesCommission" class="pharmacy_products_SalesCommission">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->SalesCommission->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->SalesCommission->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->SalesCommission->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->LockedStock->Visible) { // LockedStock ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->LockedStock) == "") { ?>
		<th data-name="LockedStock" class="<?php echo $pharmacy_products_list->LockedStock->headerCellClass() ?>"><div id="elh_pharmacy_products_LockedStock" class="pharmacy_products_LockedStock"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->LockedStock->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LockedStock" class="<?php echo $pharmacy_products_list->LockedStock->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->LockedStock) ?>', 1);"><div id="elh_pharmacy_products_LockedStock" class="pharmacy_products_LockedStock">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->LockedStock->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->LockedStock->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->LockedStock->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->MinMaxUOM->Visible) { // MinMaxUOM ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->MinMaxUOM) == "") { ?>
		<th data-name="MinMaxUOM" class="<?php echo $pharmacy_products_list->MinMaxUOM->headerCellClass() ?>"><div id="elh_pharmacy_products_MinMaxUOM" class="pharmacy_products_MinMaxUOM"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->MinMaxUOM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MinMaxUOM" class="<?php echo $pharmacy_products_list->MinMaxUOM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->MinMaxUOM) ?>', 1);"><div id="elh_pharmacy_products_MinMaxUOM" class="pharmacy_products_MinMaxUOM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->MinMaxUOM->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->MinMaxUOM->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->MinMaxUOM->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->ExpiryMfrDateFormat->Visible) { // ExpiryMfrDateFormat ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->ExpiryMfrDateFormat) == "") { ?>
		<th data-name="ExpiryMfrDateFormat" class="<?php echo $pharmacy_products_list->ExpiryMfrDateFormat->headerCellClass() ?>"><div id="elh_pharmacy_products_ExpiryMfrDateFormat" class="pharmacy_products_ExpiryMfrDateFormat"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->ExpiryMfrDateFormat->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ExpiryMfrDateFormat" class="<?php echo $pharmacy_products_list->ExpiryMfrDateFormat->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->ExpiryMfrDateFormat) ?>', 1);"><div id="elh_pharmacy_products_ExpiryMfrDateFormat" class="pharmacy_products_ExpiryMfrDateFormat">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->ExpiryMfrDateFormat->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->ExpiryMfrDateFormat->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->ExpiryMfrDateFormat->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->ProductLifeTime->Visible) { // ProductLifeTime ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->ProductLifeTime) == "") { ?>
		<th data-name="ProductLifeTime" class="<?php echo $pharmacy_products_list->ProductLifeTime->headerCellClass() ?>"><div id="elh_pharmacy_products_ProductLifeTime" class="pharmacy_products_ProductLifeTime"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->ProductLifeTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProductLifeTime" class="<?php echo $pharmacy_products_list->ProductLifeTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->ProductLifeTime) ?>', 1);"><div id="elh_pharmacy_products_ProductLifeTime" class="pharmacy_products_ProductLifeTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->ProductLifeTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->ProductLifeTime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->ProductLifeTime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->IsCombo->Visible) { // IsCombo ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->IsCombo) == "") { ?>
		<th data-name="IsCombo" class="<?php echo $pharmacy_products_list->IsCombo->headerCellClass() ?>"><div id="elh_pharmacy_products_IsCombo" class="pharmacy_products_IsCombo"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->IsCombo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IsCombo" class="<?php echo $pharmacy_products_list->IsCombo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->IsCombo) ?>', 1);"><div id="elh_pharmacy_products_IsCombo" class="pharmacy_products_IsCombo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->IsCombo->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->IsCombo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->IsCombo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->ComboTypeCode->Visible) { // ComboTypeCode ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->ComboTypeCode) == "") { ?>
		<th data-name="ComboTypeCode" class="<?php echo $pharmacy_products_list->ComboTypeCode->headerCellClass() ?>"><div id="elh_pharmacy_products_ComboTypeCode" class="pharmacy_products_ComboTypeCode"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->ComboTypeCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ComboTypeCode" class="<?php echo $pharmacy_products_list->ComboTypeCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->ComboTypeCode) ?>', 1);"><div id="elh_pharmacy_products_ComboTypeCode" class="pharmacy_products_ComboTypeCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->ComboTypeCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->ComboTypeCode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->ComboTypeCode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->AttributeCount6->Visible) { // AttributeCount6 ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->AttributeCount6) == "") { ?>
		<th data-name="AttributeCount6" class="<?php echo $pharmacy_products_list->AttributeCount6->headerCellClass() ?>"><div id="elh_pharmacy_products_AttributeCount6" class="pharmacy_products_AttributeCount6"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->AttributeCount6->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AttributeCount6" class="<?php echo $pharmacy_products_list->AttributeCount6->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->AttributeCount6) ?>', 1);"><div id="elh_pharmacy_products_AttributeCount6" class="pharmacy_products_AttributeCount6">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->AttributeCount6->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->AttributeCount6->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->AttributeCount6->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->AttributeCount7->Visible) { // AttributeCount7 ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->AttributeCount7) == "") { ?>
		<th data-name="AttributeCount7" class="<?php echo $pharmacy_products_list->AttributeCount7->headerCellClass() ?>"><div id="elh_pharmacy_products_AttributeCount7" class="pharmacy_products_AttributeCount7"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->AttributeCount7->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AttributeCount7" class="<?php echo $pharmacy_products_list->AttributeCount7->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->AttributeCount7) ?>', 1);"><div id="elh_pharmacy_products_AttributeCount7" class="pharmacy_products_AttributeCount7">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->AttributeCount7->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->AttributeCount7->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->AttributeCount7->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->AttributeCount8->Visible) { // AttributeCount8 ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->AttributeCount8) == "") { ?>
		<th data-name="AttributeCount8" class="<?php echo $pharmacy_products_list->AttributeCount8->headerCellClass() ?>"><div id="elh_pharmacy_products_AttributeCount8" class="pharmacy_products_AttributeCount8"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->AttributeCount8->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AttributeCount8" class="<?php echo $pharmacy_products_list->AttributeCount8->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->AttributeCount8) ?>', 1);"><div id="elh_pharmacy_products_AttributeCount8" class="pharmacy_products_AttributeCount8">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->AttributeCount8->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->AttributeCount8->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->AttributeCount8->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->AttributeCount9->Visible) { // AttributeCount9 ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->AttributeCount9) == "") { ?>
		<th data-name="AttributeCount9" class="<?php echo $pharmacy_products_list->AttributeCount9->headerCellClass() ?>"><div id="elh_pharmacy_products_AttributeCount9" class="pharmacy_products_AttributeCount9"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->AttributeCount9->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AttributeCount9" class="<?php echo $pharmacy_products_list->AttributeCount9->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->AttributeCount9) ?>', 1);"><div id="elh_pharmacy_products_AttributeCount9" class="pharmacy_products_AttributeCount9">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->AttributeCount9->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->AttributeCount9->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->AttributeCount9->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->AttributeCount10->Visible) { // AttributeCount10 ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->AttributeCount10) == "") { ?>
		<th data-name="AttributeCount10" class="<?php echo $pharmacy_products_list->AttributeCount10->headerCellClass() ?>"><div id="elh_pharmacy_products_AttributeCount10" class="pharmacy_products_AttributeCount10"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->AttributeCount10->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AttributeCount10" class="<?php echo $pharmacy_products_list->AttributeCount10->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->AttributeCount10) ?>', 1);"><div id="elh_pharmacy_products_AttributeCount10" class="pharmacy_products_AttributeCount10">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->AttributeCount10->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->AttributeCount10->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->AttributeCount10->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->LabourCharge->Visible) { // LabourCharge ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->LabourCharge) == "") { ?>
		<th data-name="LabourCharge" class="<?php echo $pharmacy_products_list->LabourCharge->headerCellClass() ?>"><div id="elh_pharmacy_products_LabourCharge" class="pharmacy_products_LabourCharge"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->LabourCharge->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LabourCharge" class="<?php echo $pharmacy_products_list->LabourCharge->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->LabourCharge) ?>', 1);"><div id="elh_pharmacy_products_LabourCharge" class="pharmacy_products_LabourCharge">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->LabourCharge->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->LabourCharge->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->LabourCharge->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->AffectOtherCharge->Visible) { // AffectOtherCharge ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->AffectOtherCharge) == "") { ?>
		<th data-name="AffectOtherCharge" class="<?php echo $pharmacy_products_list->AffectOtherCharge->headerCellClass() ?>"><div id="elh_pharmacy_products_AffectOtherCharge" class="pharmacy_products_AffectOtherCharge"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->AffectOtherCharge->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AffectOtherCharge" class="<?php echo $pharmacy_products_list->AffectOtherCharge->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->AffectOtherCharge) ?>', 1);"><div id="elh_pharmacy_products_AffectOtherCharge" class="pharmacy_products_AffectOtherCharge">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->AffectOtherCharge->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->AffectOtherCharge->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->AffectOtherCharge->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->DosageInfo->Visible) { // DosageInfo ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->DosageInfo) == "") { ?>
		<th data-name="DosageInfo" class="<?php echo $pharmacy_products_list->DosageInfo->headerCellClass() ?>"><div id="elh_pharmacy_products_DosageInfo" class="pharmacy_products_DosageInfo"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->DosageInfo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DosageInfo" class="<?php echo $pharmacy_products_list->DosageInfo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->DosageInfo) ?>', 1);"><div id="elh_pharmacy_products_DosageInfo" class="pharmacy_products_DosageInfo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->DosageInfo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->DosageInfo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->DosageInfo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->DosageType->Visible) { // DosageType ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->DosageType) == "") { ?>
		<th data-name="DosageType" class="<?php echo $pharmacy_products_list->DosageType->headerCellClass() ?>"><div id="elh_pharmacy_products_DosageType" class="pharmacy_products_DosageType"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->DosageType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DosageType" class="<?php echo $pharmacy_products_list->DosageType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->DosageType) ?>', 1);"><div id="elh_pharmacy_products_DosageType" class="pharmacy_products_DosageType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->DosageType->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->DosageType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->DosageType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->DefaultIndentUOM->Visible) { // DefaultIndentUOM ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->DefaultIndentUOM) == "") { ?>
		<th data-name="DefaultIndentUOM" class="<?php echo $pharmacy_products_list->DefaultIndentUOM->headerCellClass() ?>"><div id="elh_pharmacy_products_DefaultIndentUOM" class="pharmacy_products_DefaultIndentUOM"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->DefaultIndentUOM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DefaultIndentUOM" class="<?php echo $pharmacy_products_list->DefaultIndentUOM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->DefaultIndentUOM) ?>', 1);"><div id="elh_pharmacy_products_DefaultIndentUOM" class="pharmacy_products_DefaultIndentUOM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->DefaultIndentUOM->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->DefaultIndentUOM->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->DefaultIndentUOM->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->PromoTag->Visible) { // PromoTag ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->PromoTag) == "") { ?>
		<th data-name="PromoTag" class="<?php echo $pharmacy_products_list->PromoTag->headerCellClass() ?>"><div id="elh_pharmacy_products_PromoTag" class="pharmacy_products_PromoTag"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->PromoTag->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PromoTag" class="<?php echo $pharmacy_products_list->PromoTag->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->PromoTag) ?>', 1);"><div id="elh_pharmacy_products_PromoTag" class="pharmacy_products_PromoTag">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->PromoTag->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->PromoTag->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->PromoTag->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->BillLevelPromoTag->Visible) { // BillLevelPromoTag ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->BillLevelPromoTag) == "") { ?>
		<th data-name="BillLevelPromoTag" class="<?php echo $pharmacy_products_list->BillLevelPromoTag->headerCellClass() ?>"><div id="elh_pharmacy_products_BillLevelPromoTag" class="pharmacy_products_BillLevelPromoTag"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->BillLevelPromoTag->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillLevelPromoTag" class="<?php echo $pharmacy_products_list->BillLevelPromoTag->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->BillLevelPromoTag) ?>', 1);"><div id="elh_pharmacy_products_BillLevelPromoTag" class="pharmacy_products_BillLevelPromoTag">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->BillLevelPromoTag->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->BillLevelPromoTag->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->BillLevelPromoTag->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->IsMRPProduct->Visible) { // IsMRPProduct ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->IsMRPProduct) == "") { ?>
		<th data-name="IsMRPProduct" class="<?php echo $pharmacy_products_list->IsMRPProduct->headerCellClass() ?>"><div id="elh_pharmacy_products_IsMRPProduct" class="pharmacy_products_IsMRPProduct"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->IsMRPProduct->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IsMRPProduct" class="<?php echo $pharmacy_products_list->IsMRPProduct->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->IsMRPProduct) ?>', 1);"><div id="elh_pharmacy_products_IsMRPProduct" class="pharmacy_products_IsMRPProduct">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->IsMRPProduct->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->IsMRPProduct->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->IsMRPProduct->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->AlternateSaleUOM->Visible) { // AlternateSaleUOM ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->AlternateSaleUOM) == "") { ?>
		<th data-name="AlternateSaleUOM" class="<?php echo $pharmacy_products_list->AlternateSaleUOM->headerCellClass() ?>"><div id="elh_pharmacy_products_AlternateSaleUOM" class="pharmacy_products_AlternateSaleUOM"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->AlternateSaleUOM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AlternateSaleUOM" class="<?php echo $pharmacy_products_list->AlternateSaleUOM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->AlternateSaleUOM) ?>', 1);"><div id="elh_pharmacy_products_AlternateSaleUOM" class="pharmacy_products_AlternateSaleUOM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->AlternateSaleUOM->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->AlternateSaleUOM->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->AlternateSaleUOM->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->FreeUOM->Visible) { // FreeUOM ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->FreeUOM) == "") { ?>
		<th data-name="FreeUOM" class="<?php echo $pharmacy_products_list->FreeUOM->headerCellClass() ?>"><div id="elh_pharmacy_products_FreeUOM" class="pharmacy_products_FreeUOM"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->FreeUOM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FreeUOM" class="<?php echo $pharmacy_products_list->FreeUOM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->FreeUOM) ?>', 1);"><div id="elh_pharmacy_products_FreeUOM" class="pharmacy_products_FreeUOM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->FreeUOM->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->FreeUOM->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->FreeUOM->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->MarketedCode->Visible) { // MarketedCode ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->MarketedCode) == "") { ?>
		<th data-name="MarketedCode" class="<?php echo $pharmacy_products_list->MarketedCode->headerCellClass() ?>"><div id="elh_pharmacy_products_MarketedCode" class="pharmacy_products_MarketedCode"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->MarketedCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MarketedCode" class="<?php echo $pharmacy_products_list->MarketedCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->MarketedCode) ?>', 1);"><div id="elh_pharmacy_products_MarketedCode" class="pharmacy_products_MarketedCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->MarketedCode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->MarketedCode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->MarketedCode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->MinimumSalePrice->Visible) { // MinimumSalePrice ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->MinimumSalePrice) == "") { ?>
		<th data-name="MinimumSalePrice" class="<?php echo $pharmacy_products_list->MinimumSalePrice->headerCellClass() ?>"><div id="elh_pharmacy_products_MinimumSalePrice" class="pharmacy_products_MinimumSalePrice"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->MinimumSalePrice->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MinimumSalePrice" class="<?php echo $pharmacy_products_list->MinimumSalePrice->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->MinimumSalePrice) ?>', 1);"><div id="elh_pharmacy_products_MinimumSalePrice" class="pharmacy_products_MinimumSalePrice">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->MinimumSalePrice->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->MinimumSalePrice->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->MinimumSalePrice->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->PRate1->Visible) { // PRate1 ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->PRate1) == "") { ?>
		<th data-name="PRate1" class="<?php echo $pharmacy_products_list->PRate1->headerCellClass() ?>"><div id="elh_pharmacy_products_PRate1" class="pharmacy_products_PRate1"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->PRate1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRate1" class="<?php echo $pharmacy_products_list->PRate1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->PRate1) ?>', 1);"><div id="elh_pharmacy_products_PRate1" class="pharmacy_products_PRate1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->PRate1->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->PRate1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->PRate1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->PRate2->Visible) { // PRate2 ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->PRate2) == "") { ?>
		<th data-name="PRate2" class="<?php echo $pharmacy_products_list->PRate2->headerCellClass() ?>"><div id="elh_pharmacy_products_PRate2" class="pharmacy_products_PRate2"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->PRate2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRate2" class="<?php echo $pharmacy_products_list->PRate2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->PRate2) ?>', 1);"><div id="elh_pharmacy_products_PRate2" class="pharmacy_products_PRate2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->PRate2->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->PRate2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->PRate2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->LPItemCost->Visible) { // LPItemCost ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->LPItemCost) == "") { ?>
		<th data-name="LPItemCost" class="<?php echo $pharmacy_products_list->LPItemCost->headerCellClass() ?>"><div id="elh_pharmacy_products_LPItemCost" class="pharmacy_products_LPItemCost"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->LPItemCost->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LPItemCost" class="<?php echo $pharmacy_products_list->LPItemCost->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->LPItemCost) ?>', 1);"><div id="elh_pharmacy_products_LPItemCost" class="pharmacy_products_LPItemCost">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->LPItemCost->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->LPItemCost->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->LPItemCost->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->FixedItemCost->Visible) { // FixedItemCost ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->FixedItemCost) == "") { ?>
		<th data-name="FixedItemCost" class="<?php echo $pharmacy_products_list->FixedItemCost->headerCellClass() ?>"><div id="elh_pharmacy_products_FixedItemCost" class="pharmacy_products_FixedItemCost"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->FixedItemCost->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FixedItemCost" class="<?php echo $pharmacy_products_list->FixedItemCost->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->FixedItemCost) ?>', 1);"><div id="elh_pharmacy_products_FixedItemCost" class="pharmacy_products_FixedItemCost">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->FixedItemCost->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->FixedItemCost->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->FixedItemCost->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->HSNId->Visible) { // HSNId ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->HSNId) == "") { ?>
		<th data-name="HSNId" class="<?php echo $pharmacy_products_list->HSNId->headerCellClass() ?>"><div id="elh_pharmacy_products_HSNId" class="pharmacy_products_HSNId"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->HSNId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HSNId" class="<?php echo $pharmacy_products_list->HSNId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->HSNId) ?>', 1);"><div id="elh_pharmacy_products_HSNId" class="pharmacy_products_HSNId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->HSNId->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->HSNId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->HSNId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->TaxInclusive->Visible) { // TaxInclusive ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->TaxInclusive) == "") { ?>
		<th data-name="TaxInclusive" class="<?php echo $pharmacy_products_list->TaxInclusive->headerCellClass() ?>"><div id="elh_pharmacy_products_TaxInclusive" class="pharmacy_products_TaxInclusive"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->TaxInclusive->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TaxInclusive" class="<?php echo $pharmacy_products_list->TaxInclusive->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->TaxInclusive) ?>', 1);"><div id="elh_pharmacy_products_TaxInclusive" class="pharmacy_products_TaxInclusive">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->TaxInclusive->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->TaxInclusive->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->TaxInclusive->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->EligibleforWarranty->Visible) { // EligibleforWarranty ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->EligibleforWarranty) == "") { ?>
		<th data-name="EligibleforWarranty" class="<?php echo $pharmacy_products_list->EligibleforWarranty->headerCellClass() ?>"><div id="elh_pharmacy_products_EligibleforWarranty" class="pharmacy_products_EligibleforWarranty"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->EligibleforWarranty->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EligibleforWarranty" class="<?php echo $pharmacy_products_list->EligibleforWarranty->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->EligibleforWarranty) ?>', 1);"><div id="elh_pharmacy_products_EligibleforWarranty" class="pharmacy_products_EligibleforWarranty">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->EligibleforWarranty->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->EligibleforWarranty->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->EligibleforWarranty->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->NoofMonthsWarranty->Visible) { // NoofMonthsWarranty ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->NoofMonthsWarranty) == "") { ?>
		<th data-name="NoofMonthsWarranty" class="<?php echo $pharmacy_products_list->NoofMonthsWarranty->headerCellClass() ?>"><div id="elh_pharmacy_products_NoofMonthsWarranty" class="pharmacy_products_NoofMonthsWarranty"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->NoofMonthsWarranty->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoofMonthsWarranty" class="<?php echo $pharmacy_products_list->NoofMonthsWarranty->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->NoofMonthsWarranty) ?>', 1);"><div id="elh_pharmacy_products_NoofMonthsWarranty" class="pharmacy_products_NoofMonthsWarranty">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->NoofMonthsWarranty->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->NoofMonthsWarranty->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->NoofMonthsWarranty->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->ComputeTaxonCost->Visible) { // ComputeTaxonCost ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->ComputeTaxonCost) == "") { ?>
		<th data-name="ComputeTaxonCost" class="<?php echo $pharmacy_products_list->ComputeTaxonCost->headerCellClass() ?>"><div id="elh_pharmacy_products_ComputeTaxonCost" class="pharmacy_products_ComputeTaxonCost"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->ComputeTaxonCost->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ComputeTaxonCost" class="<?php echo $pharmacy_products_list->ComputeTaxonCost->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->ComputeTaxonCost) ?>', 1);"><div id="elh_pharmacy_products_ComputeTaxonCost" class="pharmacy_products_ComputeTaxonCost">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->ComputeTaxonCost->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->ComputeTaxonCost->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->ComputeTaxonCost->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->HasEmptyBottleTrack->Visible) { // HasEmptyBottleTrack ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->HasEmptyBottleTrack) == "") { ?>
		<th data-name="HasEmptyBottleTrack" class="<?php echo $pharmacy_products_list->HasEmptyBottleTrack->headerCellClass() ?>"><div id="elh_pharmacy_products_HasEmptyBottleTrack" class="pharmacy_products_HasEmptyBottleTrack"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->HasEmptyBottleTrack->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HasEmptyBottleTrack" class="<?php echo $pharmacy_products_list->HasEmptyBottleTrack->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->HasEmptyBottleTrack) ?>', 1);"><div id="elh_pharmacy_products_HasEmptyBottleTrack" class="pharmacy_products_HasEmptyBottleTrack">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->HasEmptyBottleTrack->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->HasEmptyBottleTrack->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->HasEmptyBottleTrack->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->EmptyBottleReferenceCode->Visible) { // EmptyBottleReferenceCode ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->EmptyBottleReferenceCode) == "") { ?>
		<th data-name="EmptyBottleReferenceCode" class="<?php echo $pharmacy_products_list->EmptyBottleReferenceCode->headerCellClass() ?>"><div id="elh_pharmacy_products_EmptyBottleReferenceCode" class="pharmacy_products_EmptyBottleReferenceCode"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->EmptyBottleReferenceCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EmptyBottleReferenceCode" class="<?php echo $pharmacy_products_list->EmptyBottleReferenceCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->EmptyBottleReferenceCode) ?>', 1);"><div id="elh_pharmacy_products_EmptyBottleReferenceCode" class="pharmacy_products_EmptyBottleReferenceCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->EmptyBottleReferenceCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->EmptyBottleReferenceCode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->EmptyBottleReferenceCode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->AdditionalCESSAmount->Visible) { // AdditionalCESSAmount ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->AdditionalCESSAmount) == "") { ?>
		<th data-name="AdditionalCESSAmount" class="<?php echo $pharmacy_products_list->AdditionalCESSAmount->headerCellClass() ?>"><div id="elh_pharmacy_products_AdditionalCESSAmount" class="pharmacy_products_AdditionalCESSAmount"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->AdditionalCESSAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AdditionalCESSAmount" class="<?php echo $pharmacy_products_list->AdditionalCESSAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->AdditionalCESSAmount) ?>', 1);"><div id="elh_pharmacy_products_AdditionalCESSAmount" class="pharmacy_products_AdditionalCESSAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->AdditionalCESSAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->AdditionalCESSAmount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->AdditionalCESSAmount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products_list->EmptyBottleRate->Visible) { // EmptyBottleRate ?>
	<?php if ($pharmacy_products_list->SortUrl($pharmacy_products_list->EmptyBottleRate) == "") { ?>
		<th data-name="EmptyBottleRate" class="<?php echo $pharmacy_products_list->EmptyBottleRate->headerCellClass() ?>"><div id="elh_pharmacy_products_EmptyBottleRate" class="pharmacy_products_EmptyBottleRate"><div class="ew-table-header-caption"><?php echo $pharmacy_products_list->EmptyBottleRate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EmptyBottleRate" class="<?php echo $pharmacy_products_list->EmptyBottleRate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pharmacy_products_list->SortUrl($pharmacy_products_list->EmptyBottleRate) ?>', 1);"><div id="elh_pharmacy_products_EmptyBottleRate" class="pharmacy_products_EmptyBottleRate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products_list->EmptyBottleRate->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products_list->EmptyBottleRate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pharmacy_products_list->EmptyBottleRate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pharmacy_products_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($pharmacy_products_list->ExportAll && $pharmacy_products_list->isExport()) {
	$pharmacy_products_list->StopRecord = $pharmacy_products_list->TotalRecords;
} else {

	// Set the last record to display
	if ($pharmacy_products_list->TotalRecords > $pharmacy_products_list->StartRecord + $pharmacy_products_list->DisplayRecords - 1)
		$pharmacy_products_list->StopRecord = $pharmacy_products_list->StartRecord + $pharmacy_products_list->DisplayRecords - 1;
	else
		$pharmacy_products_list->StopRecord = $pharmacy_products_list->TotalRecords;
}
$pharmacy_products_list->RecordCount = $pharmacy_products_list->StartRecord - 1;
if ($pharmacy_products_list->Recordset && !$pharmacy_products_list->Recordset->EOF) {
	$pharmacy_products_list->Recordset->moveFirst();
	$selectLimit = $pharmacy_products_list->UseSelectLimit;
	if (!$selectLimit && $pharmacy_products_list->StartRecord > 1)
		$pharmacy_products_list->Recordset->move($pharmacy_products_list->StartRecord - 1);
} elseif (!$pharmacy_products->AllowAddDeleteRow && $pharmacy_products_list->StopRecord == 0) {
	$pharmacy_products_list->StopRecord = $pharmacy_products->GridAddRowCount;
}

// Initialize aggregate
$pharmacy_products->RowType = ROWTYPE_AGGREGATEINIT;
$pharmacy_products->resetAttributes();
$pharmacy_products_list->renderRow();
while ($pharmacy_products_list->RecordCount < $pharmacy_products_list->StopRecord) {
	$pharmacy_products_list->RecordCount++;
	if ($pharmacy_products_list->RecordCount >= $pharmacy_products_list->StartRecord) {
		$pharmacy_products_list->RowCount++;

		// Set up key count
		$pharmacy_products_list->KeyCount = $pharmacy_products_list->RowIndex;

		// Init row class and style
		$pharmacy_products->resetAttributes();
		$pharmacy_products->CssClass = "";
		if ($pharmacy_products_list->isGridAdd()) {
		} else {
			$pharmacy_products_list->loadRowValues($pharmacy_products_list->Recordset); // Load row values
		}
		$pharmacy_products->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$pharmacy_products->RowAttrs->merge(["data-rowindex" => $pharmacy_products_list->RowCount, "id" => "r" . $pharmacy_products_list->RowCount . "_pharmacy_products", "data-rowtype" => $pharmacy_products->RowType]);

		// Render row
		$pharmacy_products_list->renderRow();

		// Render list options
		$pharmacy_products_list->renderListOptions();
?>
	<tr <?php echo $pharmacy_products->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_products_list->ListOptions->render("body", "left", $pharmacy_products_list->RowCount);
?>
	<?php if ($pharmacy_products_list->ProductCode->Visible) { // ProductCode ?>
		<td data-name="ProductCode" <?php echo $pharmacy_products_list->ProductCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_ProductCode">
<span<?php echo $pharmacy_products_list->ProductCode->viewAttributes() ?>><?php echo $pharmacy_products_list->ProductCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->ProductName->Visible) { // ProductName ?>
		<td data-name="ProductName" <?php echo $pharmacy_products_list->ProductName->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_ProductName">
<span<?php echo $pharmacy_products_list->ProductName->viewAttributes() ?>><?php echo $pharmacy_products_list->ProductName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->DivisionCode->Visible) { // DivisionCode ?>
		<td data-name="DivisionCode" <?php echo $pharmacy_products_list->DivisionCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_DivisionCode">
<span<?php echo $pharmacy_products_list->DivisionCode->viewAttributes() ?>><?php echo $pharmacy_products_list->DivisionCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->ManufacturerCode->Visible) { // ManufacturerCode ?>
		<td data-name="ManufacturerCode" <?php echo $pharmacy_products_list->ManufacturerCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_ManufacturerCode">
<span<?php echo $pharmacy_products_list->ManufacturerCode->viewAttributes() ?>><?php echo $pharmacy_products_list->ManufacturerCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->SupplierCode->Visible) { // SupplierCode ?>
		<td data-name="SupplierCode" <?php echo $pharmacy_products_list->SupplierCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_SupplierCode">
<span<?php echo $pharmacy_products_list->SupplierCode->viewAttributes() ?>><?php echo $pharmacy_products_list->SupplierCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->AlternateSupplierCodes->Visible) { // AlternateSupplierCodes ?>
		<td data-name="AlternateSupplierCodes" <?php echo $pharmacy_products_list->AlternateSupplierCodes->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_AlternateSupplierCodes">
<span<?php echo $pharmacy_products_list->AlternateSupplierCodes->viewAttributes() ?>><?php echo $pharmacy_products_list->AlternateSupplierCodes->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->AlternateProductCode->Visible) { // AlternateProductCode ?>
		<td data-name="AlternateProductCode" <?php echo $pharmacy_products_list->AlternateProductCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_AlternateProductCode">
<span<?php echo $pharmacy_products_list->AlternateProductCode->viewAttributes() ?>><?php echo $pharmacy_products_list->AlternateProductCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->UniversalProductCode->Visible) { // UniversalProductCode ?>
		<td data-name="UniversalProductCode" <?php echo $pharmacy_products_list->UniversalProductCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_UniversalProductCode">
<span<?php echo $pharmacy_products_list->UniversalProductCode->viewAttributes() ?>><?php echo $pharmacy_products_list->UniversalProductCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->BookProductCode->Visible) { // BookProductCode ?>
		<td data-name="BookProductCode" <?php echo $pharmacy_products_list->BookProductCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_BookProductCode">
<span<?php echo $pharmacy_products_list->BookProductCode->viewAttributes() ?>><?php echo $pharmacy_products_list->BookProductCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->OldCode->Visible) { // OldCode ?>
		<td data-name="OldCode" <?php echo $pharmacy_products_list->OldCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_OldCode">
<span<?php echo $pharmacy_products_list->OldCode->viewAttributes() ?>><?php echo $pharmacy_products_list->OldCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->ProtectedProducts->Visible) { // ProtectedProducts ?>
		<td data-name="ProtectedProducts" <?php echo $pharmacy_products_list->ProtectedProducts->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_ProtectedProducts">
<span<?php echo $pharmacy_products_list->ProtectedProducts->viewAttributes() ?>><?php echo $pharmacy_products_list->ProtectedProducts->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->ProductFullName->Visible) { // ProductFullName ?>
		<td data-name="ProductFullName" <?php echo $pharmacy_products_list->ProductFullName->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_ProductFullName">
<span<?php echo $pharmacy_products_list->ProductFullName->viewAttributes() ?>><?php echo $pharmacy_products_list->ProductFullName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->UnitOfMeasure->Visible) { // UnitOfMeasure ?>
		<td data-name="UnitOfMeasure" <?php echo $pharmacy_products_list->UnitOfMeasure->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_UnitOfMeasure">
<span<?php echo $pharmacy_products_list->UnitOfMeasure->viewAttributes() ?>><?php echo $pharmacy_products_list->UnitOfMeasure->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->UnitDescription->Visible) { // UnitDescription ?>
		<td data-name="UnitDescription" <?php echo $pharmacy_products_list->UnitDescription->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_UnitDescription">
<span<?php echo $pharmacy_products_list->UnitDescription->viewAttributes() ?>><?php echo $pharmacy_products_list->UnitDescription->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->BulkDescription->Visible) { // BulkDescription ?>
		<td data-name="BulkDescription" <?php echo $pharmacy_products_list->BulkDescription->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_BulkDescription">
<span<?php echo $pharmacy_products_list->BulkDescription->viewAttributes() ?>><?php echo $pharmacy_products_list->BulkDescription->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->BarCodeDescription->Visible) { // BarCodeDescription ?>
		<td data-name="BarCodeDescription" <?php echo $pharmacy_products_list->BarCodeDescription->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_BarCodeDescription">
<span<?php echo $pharmacy_products_list->BarCodeDescription->viewAttributes() ?>><?php echo $pharmacy_products_list->BarCodeDescription->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->PackageInformation->Visible) { // PackageInformation ?>
		<td data-name="PackageInformation" <?php echo $pharmacy_products_list->PackageInformation->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_PackageInformation">
<span<?php echo $pharmacy_products_list->PackageInformation->viewAttributes() ?>><?php echo $pharmacy_products_list->PackageInformation->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->PackageId->Visible) { // PackageId ?>
		<td data-name="PackageId" <?php echo $pharmacy_products_list->PackageId->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_PackageId">
<span<?php echo $pharmacy_products_list->PackageId->viewAttributes() ?>><?php echo $pharmacy_products_list->PackageId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->Weight->Visible) { // Weight ?>
		<td data-name="Weight" <?php echo $pharmacy_products_list->Weight->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_Weight">
<span<?php echo $pharmacy_products_list->Weight->viewAttributes() ?>><?php echo $pharmacy_products_list->Weight->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->AllowFractions->Visible) { // AllowFractions ?>
		<td data-name="AllowFractions" <?php echo $pharmacy_products_list->AllowFractions->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_AllowFractions">
<span<?php echo $pharmacy_products_list->AllowFractions->viewAttributes() ?>><?php echo $pharmacy_products_list->AllowFractions->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->MinimumStockLevel->Visible) { // MinimumStockLevel ?>
		<td data-name="MinimumStockLevel" <?php echo $pharmacy_products_list->MinimumStockLevel->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_MinimumStockLevel">
<span<?php echo $pharmacy_products_list->MinimumStockLevel->viewAttributes() ?>><?php echo $pharmacy_products_list->MinimumStockLevel->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->MaximumStockLevel->Visible) { // MaximumStockLevel ?>
		<td data-name="MaximumStockLevel" <?php echo $pharmacy_products_list->MaximumStockLevel->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_MaximumStockLevel">
<span<?php echo $pharmacy_products_list->MaximumStockLevel->viewAttributes() ?>><?php echo $pharmacy_products_list->MaximumStockLevel->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->ReorderLevel->Visible) { // ReorderLevel ?>
		<td data-name="ReorderLevel" <?php echo $pharmacy_products_list->ReorderLevel->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_ReorderLevel">
<span<?php echo $pharmacy_products_list->ReorderLevel->viewAttributes() ?>><?php echo $pharmacy_products_list->ReorderLevel->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->MinMaxRatio->Visible) { // MinMaxRatio ?>
		<td data-name="MinMaxRatio" <?php echo $pharmacy_products_list->MinMaxRatio->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_MinMaxRatio">
<span<?php echo $pharmacy_products_list->MinMaxRatio->viewAttributes() ?>><?php echo $pharmacy_products_list->MinMaxRatio->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->AutoMinMaxRatio->Visible) { // AutoMinMaxRatio ?>
		<td data-name="AutoMinMaxRatio" <?php echo $pharmacy_products_list->AutoMinMaxRatio->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_AutoMinMaxRatio">
<span<?php echo $pharmacy_products_list->AutoMinMaxRatio->viewAttributes() ?>><?php echo $pharmacy_products_list->AutoMinMaxRatio->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->ScheduleCode->Visible) { // ScheduleCode ?>
		<td data-name="ScheduleCode" <?php echo $pharmacy_products_list->ScheduleCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_ScheduleCode">
<span<?php echo $pharmacy_products_list->ScheduleCode->viewAttributes() ?>><?php echo $pharmacy_products_list->ScheduleCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->RopRatio->Visible) { // RopRatio ?>
		<td data-name="RopRatio" <?php echo $pharmacy_products_list->RopRatio->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_RopRatio">
<span<?php echo $pharmacy_products_list->RopRatio->viewAttributes() ?>><?php echo $pharmacy_products_list->RopRatio->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->MRP->Visible) { // MRP ?>
		<td data-name="MRP" <?php echo $pharmacy_products_list->MRP->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_MRP">
<span<?php echo $pharmacy_products_list->MRP->viewAttributes() ?>><?php echo $pharmacy_products_list->MRP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->PurchasePrice->Visible) { // PurchasePrice ?>
		<td data-name="PurchasePrice" <?php echo $pharmacy_products_list->PurchasePrice->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_PurchasePrice">
<span<?php echo $pharmacy_products_list->PurchasePrice->viewAttributes() ?>><?php echo $pharmacy_products_list->PurchasePrice->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->PurchaseUnit->Visible) { // PurchaseUnit ?>
		<td data-name="PurchaseUnit" <?php echo $pharmacy_products_list->PurchaseUnit->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_PurchaseUnit">
<span<?php echo $pharmacy_products_list->PurchaseUnit->viewAttributes() ?>><?php echo $pharmacy_products_list->PurchaseUnit->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->PurchaseTaxCode->Visible) { // PurchaseTaxCode ?>
		<td data-name="PurchaseTaxCode" <?php echo $pharmacy_products_list->PurchaseTaxCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_PurchaseTaxCode">
<span<?php echo $pharmacy_products_list->PurchaseTaxCode->viewAttributes() ?>><?php echo $pharmacy_products_list->PurchaseTaxCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->AllowDirectInward->Visible) { // AllowDirectInward ?>
		<td data-name="AllowDirectInward" <?php echo $pharmacy_products_list->AllowDirectInward->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_AllowDirectInward">
<span<?php echo $pharmacy_products_list->AllowDirectInward->viewAttributes() ?>><?php echo $pharmacy_products_list->AllowDirectInward->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->SalePrice->Visible) { // SalePrice ?>
		<td data-name="SalePrice" <?php echo $pharmacy_products_list->SalePrice->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_SalePrice">
<span<?php echo $pharmacy_products_list->SalePrice->viewAttributes() ?>><?php echo $pharmacy_products_list->SalePrice->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->SaleUnit->Visible) { // SaleUnit ?>
		<td data-name="SaleUnit" <?php echo $pharmacy_products_list->SaleUnit->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_SaleUnit">
<span<?php echo $pharmacy_products_list->SaleUnit->viewAttributes() ?>><?php echo $pharmacy_products_list->SaleUnit->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->SalesTaxCode->Visible) { // SalesTaxCode ?>
		<td data-name="SalesTaxCode" <?php echo $pharmacy_products_list->SalesTaxCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_SalesTaxCode">
<span<?php echo $pharmacy_products_list->SalesTaxCode->viewAttributes() ?>><?php echo $pharmacy_products_list->SalesTaxCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->StockReceived->Visible) { // StockReceived ?>
		<td data-name="StockReceived" <?php echo $pharmacy_products_list->StockReceived->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_StockReceived">
<span<?php echo $pharmacy_products_list->StockReceived->viewAttributes() ?>><?php echo $pharmacy_products_list->StockReceived->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->TotalStock->Visible) { // TotalStock ?>
		<td data-name="TotalStock" <?php echo $pharmacy_products_list->TotalStock->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_TotalStock">
<span<?php echo $pharmacy_products_list->TotalStock->viewAttributes() ?>><?php echo $pharmacy_products_list->TotalStock->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->StockType->Visible) { // StockType ?>
		<td data-name="StockType" <?php echo $pharmacy_products_list->StockType->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_StockType">
<span<?php echo $pharmacy_products_list->StockType->viewAttributes() ?>><?php echo $pharmacy_products_list->StockType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->StockCheckDate->Visible) { // StockCheckDate ?>
		<td data-name="StockCheckDate" <?php echo $pharmacy_products_list->StockCheckDate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_StockCheckDate">
<span<?php echo $pharmacy_products_list->StockCheckDate->viewAttributes() ?>><?php echo $pharmacy_products_list->StockCheckDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->StockAdjustmentDate->Visible) { // StockAdjustmentDate ?>
		<td data-name="StockAdjustmentDate" <?php echo $pharmacy_products_list->StockAdjustmentDate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_StockAdjustmentDate">
<span<?php echo $pharmacy_products_list->StockAdjustmentDate->viewAttributes() ?>><?php echo $pharmacy_products_list->StockAdjustmentDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->Remarks->Visible) { // Remarks ?>
		<td data-name="Remarks" <?php echo $pharmacy_products_list->Remarks->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_Remarks">
<span<?php echo $pharmacy_products_list->Remarks->viewAttributes() ?>><?php echo $pharmacy_products_list->Remarks->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->CostCentre->Visible) { // CostCentre ?>
		<td data-name="CostCentre" <?php echo $pharmacy_products_list->CostCentre->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_CostCentre">
<span<?php echo $pharmacy_products_list->CostCentre->viewAttributes() ?>><?php echo $pharmacy_products_list->CostCentre->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->ProductType->Visible) { // ProductType ?>
		<td data-name="ProductType" <?php echo $pharmacy_products_list->ProductType->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_ProductType">
<span<?php echo $pharmacy_products_list->ProductType->viewAttributes() ?>><?php echo $pharmacy_products_list->ProductType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->TaxAmount->Visible) { // TaxAmount ?>
		<td data-name="TaxAmount" <?php echo $pharmacy_products_list->TaxAmount->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_TaxAmount">
<span<?php echo $pharmacy_products_list->TaxAmount->viewAttributes() ?>><?php echo $pharmacy_products_list->TaxAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->TaxId->Visible) { // TaxId ?>
		<td data-name="TaxId" <?php echo $pharmacy_products_list->TaxId->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_TaxId">
<span<?php echo $pharmacy_products_list->TaxId->viewAttributes() ?>><?php echo $pharmacy_products_list->TaxId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->ResaleTaxApplicable->Visible) { // ResaleTaxApplicable ?>
		<td data-name="ResaleTaxApplicable" <?php echo $pharmacy_products_list->ResaleTaxApplicable->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_ResaleTaxApplicable">
<span<?php echo $pharmacy_products_list->ResaleTaxApplicable->viewAttributes() ?>><?php echo $pharmacy_products_list->ResaleTaxApplicable->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->CstOtherTax->Visible) { // CstOtherTax ?>
		<td data-name="CstOtherTax" <?php echo $pharmacy_products_list->CstOtherTax->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_CstOtherTax">
<span<?php echo $pharmacy_products_list->CstOtherTax->viewAttributes() ?>><?php echo $pharmacy_products_list->CstOtherTax->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->TotalTax->Visible) { // TotalTax ?>
		<td data-name="TotalTax" <?php echo $pharmacy_products_list->TotalTax->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_TotalTax">
<span<?php echo $pharmacy_products_list->TotalTax->viewAttributes() ?>><?php echo $pharmacy_products_list->TotalTax->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->ItemCost->Visible) { // ItemCost ?>
		<td data-name="ItemCost" <?php echo $pharmacy_products_list->ItemCost->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_ItemCost">
<span<?php echo $pharmacy_products_list->ItemCost->viewAttributes() ?>><?php echo $pharmacy_products_list->ItemCost->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->ExpiryDate->Visible) { // ExpiryDate ?>
		<td data-name="ExpiryDate" <?php echo $pharmacy_products_list->ExpiryDate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_ExpiryDate">
<span<?php echo $pharmacy_products_list->ExpiryDate->viewAttributes() ?>><?php echo $pharmacy_products_list->ExpiryDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->BatchDescription->Visible) { // BatchDescription ?>
		<td data-name="BatchDescription" <?php echo $pharmacy_products_list->BatchDescription->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_BatchDescription">
<span<?php echo $pharmacy_products_list->BatchDescription->viewAttributes() ?>><?php echo $pharmacy_products_list->BatchDescription->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->FreeScheme->Visible) { // FreeScheme ?>
		<td data-name="FreeScheme" <?php echo $pharmacy_products_list->FreeScheme->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_FreeScheme">
<span<?php echo $pharmacy_products_list->FreeScheme->viewAttributes() ?>><?php echo $pharmacy_products_list->FreeScheme->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->CashDiscountEligibility->Visible) { // CashDiscountEligibility ?>
		<td data-name="CashDiscountEligibility" <?php echo $pharmacy_products_list->CashDiscountEligibility->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_CashDiscountEligibility">
<span<?php echo $pharmacy_products_list->CashDiscountEligibility->viewAttributes() ?>><?php echo $pharmacy_products_list->CashDiscountEligibility->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->DiscountPerAllowInBill->Visible) { // DiscountPerAllowInBill ?>
		<td data-name="DiscountPerAllowInBill" <?php echo $pharmacy_products_list->DiscountPerAllowInBill->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_DiscountPerAllowInBill">
<span<?php echo $pharmacy_products_list->DiscountPerAllowInBill->viewAttributes() ?>><?php echo $pharmacy_products_list->DiscountPerAllowInBill->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->Discount->Visible) { // Discount ?>
		<td data-name="Discount" <?php echo $pharmacy_products_list->Discount->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_Discount">
<span<?php echo $pharmacy_products_list->Discount->viewAttributes() ?>><?php echo $pharmacy_products_list->Discount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->TotalAmount->Visible) { // TotalAmount ?>
		<td data-name="TotalAmount" <?php echo $pharmacy_products_list->TotalAmount->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_TotalAmount">
<span<?php echo $pharmacy_products_list->TotalAmount->viewAttributes() ?>><?php echo $pharmacy_products_list->TotalAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->StandardMargin->Visible) { // StandardMargin ?>
		<td data-name="StandardMargin" <?php echo $pharmacy_products_list->StandardMargin->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_StandardMargin">
<span<?php echo $pharmacy_products_list->StandardMargin->viewAttributes() ?>><?php echo $pharmacy_products_list->StandardMargin->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->Margin->Visible) { // Margin ?>
		<td data-name="Margin" <?php echo $pharmacy_products_list->Margin->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_Margin">
<span<?php echo $pharmacy_products_list->Margin->viewAttributes() ?>><?php echo $pharmacy_products_list->Margin->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->MarginId->Visible) { // MarginId ?>
		<td data-name="MarginId" <?php echo $pharmacy_products_list->MarginId->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_MarginId">
<span<?php echo $pharmacy_products_list->MarginId->viewAttributes() ?>><?php echo $pharmacy_products_list->MarginId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->ExpectedMargin->Visible) { // ExpectedMargin ?>
		<td data-name="ExpectedMargin" <?php echo $pharmacy_products_list->ExpectedMargin->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_ExpectedMargin">
<span<?php echo $pharmacy_products_list->ExpectedMargin->viewAttributes() ?>><?php echo $pharmacy_products_list->ExpectedMargin->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->SurchargeBeforeTax->Visible) { // SurchargeBeforeTax ?>
		<td data-name="SurchargeBeforeTax" <?php echo $pharmacy_products_list->SurchargeBeforeTax->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_SurchargeBeforeTax">
<span<?php echo $pharmacy_products_list->SurchargeBeforeTax->viewAttributes() ?>><?php echo $pharmacy_products_list->SurchargeBeforeTax->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->SurchargeAfterTax->Visible) { // SurchargeAfterTax ?>
		<td data-name="SurchargeAfterTax" <?php echo $pharmacy_products_list->SurchargeAfterTax->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_SurchargeAfterTax">
<span<?php echo $pharmacy_products_list->SurchargeAfterTax->viewAttributes() ?>><?php echo $pharmacy_products_list->SurchargeAfterTax->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->TempOrderNo->Visible) { // TempOrderNo ?>
		<td data-name="TempOrderNo" <?php echo $pharmacy_products_list->TempOrderNo->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_TempOrderNo">
<span<?php echo $pharmacy_products_list->TempOrderNo->viewAttributes() ?>><?php echo $pharmacy_products_list->TempOrderNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->TempOrderDate->Visible) { // TempOrderDate ?>
		<td data-name="TempOrderDate" <?php echo $pharmacy_products_list->TempOrderDate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_TempOrderDate">
<span<?php echo $pharmacy_products_list->TempOrderDate->viewAttributes() ?>><?php echo $pharmacy_products_list->TempOrderDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->OrderUnit->Visible) { // OrderUnit ?>
		<td data-name="OrderUnit" <?php echo $pharmacy_products_list->OrderUnit->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_OrderUnit">
<span<?php echo $pharmacy_products_list->OrderUnit->viewAttributes() ?>><?php echo $pharmacy_products_list->OrderUnit->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->OrderQuantity->Visible) { // OrderQuantity ?>
		<td data-name="OrderQuantity" <?php echo $pharmacy_products_list->OrderQuantity->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_OrderQuantity">
<span<?php echo $pharmacy_products_list->OrderQuantity->viewAttributes() ?>><?php echo $pharmacy_products_list->OrderQuantity->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->MarkForOrder->Visible) { // MarkForOrder ?>
		<td data-name="MarkForOrder" <?php echo $pharmacy_products_list->MarkForOrder->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_MarkForOrder">
<span<?php echo $pharmacy_products_list->MarkForOrder->viewAttributes() ?>><?php echo $pharmacy_products_list->MarkForOrder->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->OrderAllId->Visible) { // OrderAllId ?>
		<td data-name="OrderAllId" <?php echo $pharmacy_products_list->OrderAllId->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_OrderAllId">
<span<?php echo $pharmacy_products_list->OrderAllId->viewAttributes() ?>><?php echo $pharmacy_products_list->OrderAllId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->CalculateOrderQty->Visible) { // CalculateOrderQty ?>
		<td data-name="CalculateOrderQty" <?php echo $pharmacy_products_list->CalculateOrderQty->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_CalculateOrderQty">
<span<?php echo $pharmacy_products_list->CalculateOrderQty->viewAttributes() ?>><?php echo $pharmacy_products_list->CalculateOrderQty->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->SubLocation->Visible) { // SubLocation ?>
		<td data-name="SubLocation" <?php echo $pharmacy_products_list->SubLocation->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_SubLocation">
<span<?php echo $pharmacy_products_list->SubLocation->viewAttributes() ?>><?php echo $pharmacy_products_list->SubLocation->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->CategoryCode->Visible) { // CategoryCode ?>
		<td data-name="CategoryCode" <?php echo $pharmacy_products_list->CategoryCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_CategoryCode">
<span<?php echo $pharmacy_products_list->CategoryCode->viewAttributes() ?>><?php echo $pharmacy_products_list->CategoryCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->SubCategory->Visible) { // SubCategory ?>
		<td data-name="SubCategory" <?php echo $pharmacy_products_list->SubCategory->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_SubCategory">
<span<?php echo $pharmacy_products_list->SubCategory->viewAttributes() ?>><?php echo $pharmacy_products_list->SubCategory->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->FlexCategoryCode->Visible) { // FlexCategoryCode ?>
		<td data-name="FlexCategoryCode" <?php echo $pharmacy_products_list->FlexCategoryCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_FlexCategoryCode">
<span<?php echo $pharmacy_products_list->FlexCategoryCode->viewAttributes() ?>><?php echo $pharmacy_products_list->FlexCategoryCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->ABCSaleQty->Visible) { // ABCSaleQty ?>
		<td data-name="ABCSaleQty" <?php echo $pharmacy_products_list->ABCSaleQty->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_ABCSaleQty">
<span<?php echo $pharmacy_products_list->ABCSaleQty->viewAttributes() ?>><?php echo $pharmacy_products_list->ABCSaleQty->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->ABCSaleValue->Visible) { // ABCSaleValue ?>
		<td data-name="ABCSaleValue" <?php echo $pharmacy_products_list->ABCSaleValue->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_ABCSaleValue">
<span<?php echo $pharmacy_products_list->ABCSaleValue->viewAttributes() ?>><?php echo $pharmacy_products_list->ABCSaleValue->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->ConvertionFactor->Visible) { // ConvertionFactor ?>
		<td data-name="ConvertionFactor" <?php echo $pharmacy_products_list->ConvertionFactor->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_ConvertionFactor">
<span<?php echo $pharmacy_products_list->ConvertionFactor->viewAttributes() ?>><?php echo $pharmacy_products_list->ConvertionFactor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->ConvertionUnitDesc->Visible) { // ConvertionUnitDesc ?>
		<td data-name="ConvertionUnitDesc" <?php echo $pharmacy_products_list->ConvertionUnitDesc->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_ConvertionUnitDesc">
<span<?php echo $pharmacy_products_list->ConvertionUnitDesc->viewAttributes() ?>><?php echo $pharmacy_products_list->ConvertionUnitDesc->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->TransactionId->Visible) { // TransactionId ?>
		<td data-name="TransactionId" <?php echo $pharmacy_products_list->TransactionId->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_TransactionId">
<span<?php echo $pharmacy_products_list->TransactionId->viewAttributes() ?>><?php echo $pharmacy_products_list->TransactionId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->SoldProductId->Visible) { // SoldProductId ?>
		<td data-name="SoldProductId" <?php echo $pharmacy_products_list->SoldProductId->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_SoldProductId">
<span<?php echo $pharmacy_products_list->SoldProductId->viewAttributes() ?>><?php echo $pharmacy_products_list->SoldProductId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->WantedBookId->Visible) { // WantedBookId ?>
		<td data-name="WantedBookId" <?php echo $pharmacy_products_list->WantedBookId->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_WantedBookId">
<span<?php echo $pharmacy_products_list->WantedBookId->viewAttributes() ?>><?php echo $pharmacy_products_list->WantedBookId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->AllId->Visible) { // AllId ?>
		<td data-name="AllId" <?php echo $pharmacy_products_list->AllId->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_AllId">
<span<?php echo $pharmacy_products_list->AllId->viewAttributes() ?>><?php echo $pharmacy_products_list->AllId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->BatchAndExpiryCompulsory->Visible) { // BatchAndExpiryCompulsory ?>
		<td data-name="BatchAndExpiryCompulsory" <?php echo $pharmacy_products_list->BatchAndExpiryCompulsory->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_BatchAndExpiryCompulsory">
<span<?php echo $pharmacy_products_list->BatchAndExpiryCompulsory->viewAttributes() ?>><?php echo $pharmacy_products_list->BatchAndExpiryCompulsory->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->BatchStockForWantedBook->Visible) { // BatchStockForWantedBook ?>
		<td data-name="BatchStockForWantedBook" <?php echo $pharmacy_products_list->BatchStockForWantedBook->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_BatchStockForWantedBook">
<span<?php echo $pharmacy_products_list->BatchStockForWantedBook->viewAttributes() ?>><?php echo $pharmacy_products_list->BatchStockForWantedBook->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->UnitBasedBilling->Visible) { // UnitBasedBilling ?>
		<td data-name="UnitBasedBilling" <?php echo $pharmacy_products_list->UnitBasedBilling->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_UnitBasedBilling">
<span<?php echo $pharmacy_products_list->UnitBasedBilling->viewAttributes() ?>><?php echo $pharmacy_products_list->UnitBasedBilling->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->DoNotCheckStock->Visible) { // DoNotCheckStock ?>
		<td data-name="DoNotCheckStock" <?php echo $pharmacy_products_list->DoNotCheckStock->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_DoNotCheckStock">
<span<?php echo $pharmacy_products_list->DoNotCheckStock->viewAttributes() ?>><?php echo $pharmacy_products_list->DoNotCheckStock->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->AcceptRate->Visible) { // AcceptRate ?>
		<td data-name="AcceptRate" <?php echo $pharmacy_products_list->AcceptRate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_AcceptRate">
<span<?php echo $pharmacy_products_list->AcceptRate->viewAttributes() ?>><?php echo $pharmacy_products_list->AcceptRate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->PriceLevel->Visible) { // PriceLevel ?>
		<td data-name="PriceLevel" <?php echo $pharmacy_products_list->PriceLevel->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_PriceLevel">
<span<?php echo $pharmacy_products_list->PriceLevel->viewAttributes() ?>><?php echo $pharmacy_products_list->PriceLevel->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->LastQuotePrice->Visible) { // LastQuotePrice ?>
		<td data-name="LastQuotePrice" <?php echo $pharmacy_products_list->LastQuotePrice->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_LastQuotePrice">
<span<?php echo $pharmacy_products_list->LastQuotePrice->viewAttributes() ?>><?php echo $pharmacy_products_list->LastQuotePrice->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->PriceChange->Visible) { // PriceChange ?>
		<td data-name="PriceChange" <?php echo $pharmacy_products_list->PriceChange->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_PriceChange">
<span<?php echo $pharmacy_products_list->PriceChange->viewAttributes() ?>><?php echo $pharmacy_products_list->PriceChange->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->CommodityCode->Visible) { // CommodityCode ?>
		<td data-name="CommodityCode" <?php echo $pharmacy_products_list->CommodityCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_CommodityCode">
<span<?php echo $pharmacy_products_list->CommodityCode->viewAttributes() ?>><?php echo $pharmacy_products_list->CommodityCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->InstitutePrice->Visible) { // InstitutePrice ?>
		<td data-name="InstitutePrice" <?php echo $pharmacy_products_list->InstitutePrice->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_InstitutePrice">
<span<?php echo $pharmacy_products_list->InstitutePrice->viewAttributes() ?>><?php echo $pharmacy_products_list->InstitutePrice->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->CtrlOrDCtrlProduct->Visible) { // CtrlOrDCtrlProduct ?>
		<td data-name="CtrlOrDCtrlProduct" <?php echo $pharmacy_products_list->CtrlOrDCtrlProduct->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_CtrlOrDCtrlProduct">
<span<?php echo $pharmacy_products_list->CtrlOrDCtrlProduct->viewAttributes() ?>><?php echo $pharmacy_products_list->CtrlOrDCtrlProduct->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->ImportedDate->Visible) { // ImportedDate ?>
		<td data-name="ImportedDate" <?php echo $pharmacy_products_list->ImportedDate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_ImportedDate">
<span<?php echo $pharmacy_products_list->ImportedDate->viewAttributes() ?>><?php echo $pharmacy_products_list->ImportedDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->IsImported->Visible) { // IsImported ?>
		<td data-name="IsImported" <?php echo $pharmacy_products_list->IsImported->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_IsImported">
<span<?php echo $pharmacy_products_list->IsImported->viewAttributes() ?>><?php echo $pharmacy_products_list->IsImported->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->FileName->Visible) { // FileName ?>
		<td data-name="FileName" <?php echo $pharmacy_products_list->FileName->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_FileName">
<span<?php echo $pharmacy_products_list->FileName->viewAttributes() ?>><?php echo $pharmacy_products_list->FileName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->GodownNumber->Visible) { // GodownNumber ?>
		<td data-name="GodownNumber" <?php echo $pharmacy_products_list->GodownNumber->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_GodownNumber">
<span<?php echo $pharmacy_products_list->GodownNumber->viewAttributes() ?>><?php echo $pharmacy_products_list->GodownNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->CreationDate->Visible) { // CreationDate ?>
		<td data-name="CreationDate" <?php echo $pharmacy_products_list->CreationDate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_CreationDate">
<span<?php echo $pharmacy_products_list->CreationDate->viewAttributes() ?>><?php echo $pharmacy_products_list->CreationDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->CreatedbyUser->Visible) { // CreatedbyUser ?>
		<td data-name="CreatedbyUser" <?php echo $pharmacy_products_list->CreatedbyUser->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_CreatedbyUser">
<span<?php echo $pharmacy_products_list->CreatedbyUser->viewAttributes() ?>><?php echo $pharmacy_products_list->CreatedbyUser->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->ModifiedDate->Visible) { // ModifiedDate ?>
		<td data-name="ModifiedDate" <?php echo $pharmacy_products_list->ModifiedDate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_ModifiedDate">
<span<?php echo $pharmacy_products_list->ModifiedDate->viewAttributes() ?>><?php echo $pharmacy_products_list->ModifiedDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->ModifiedbyUser->Visible) { // ModifiedbyUser ?>
		<td data-name="ModifiedbyUser" <?php echo $pharmacy_products_list->ModifiedbyUser->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_ModifiedbyUser">
<span<?php echo $pharmacy_products_list->ModifiedbyUser->viewAttributes() ?>><?php echo $pharmacy_products_list->ModifiedbyUser->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->isActive->Visible) { // isActive ?>
		<td data-name="isActive" <?php echo $pharmacy_products_list->isActive->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_isActive">
<span<?php echo $pharmacy_products_list->isActive->viewAttributes() ?>><?php echo $pharmacy_products_list->isActive->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->AllowExpiryClaim->Visible) { // AllowExpiryClaim ?>
		<td data-name="AllowExpiryClaim" <?php echo $pharmacy_products_list->AllowExpiryClaim->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_AllowExpiryClaim">
<span<?php echo $pharmacy_products_list->AllowExpiryClaim->viewAttributes() ?>><?php echo $pharmacy_products_list->AllowExpiryClaim->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->BrandCode->Visible) { // BrandCode ?>
		<td data-name="BrandCode" <?php echo $pharmacy_products_list->BrandCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_BrandCode">
<span<?php echo $pharmacy_products_list->BrandCode->viewAttributes() ?>><?php echo $pharmacy_products_list->BrandCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->FreeSchemeBasedon->Visible) { // FreeSchemeBasedon ?>
		<td data-name="FreeSchemeBasedon" <?php echo $pharmacy_products_list->FreeSchemeBasedon->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_FreeSchemeBasedon">
<span<?php echo $pharmacy_products_list->FreeSchemeBasedon->viewAttributes() ?>><?php echo $pharmacy_products_list->FreeSchemeBasedon->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->DoNotCheckCostInBill->Visible) { // DoNotCheckCostInBill ?>
		<td data-name="DoNotCheckCostInBill" <?php echo $pharmacy_products_list->DoNotCheckCostInBill->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_DoNotCheckCostInBill">
<span<?php echo $pharmacy_products_list->DoNotCheckCostInBill->viewAttributes() ?>><?php echo $pharmacy_products_list->DoNotCheckCostInBill->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->ProductGroupCode->Visible) { // ProductGroupCode ?>
		<td data-name="ProductGroupCode" <?php echo $pharmacy_products_list->ProductGroupCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_ProductGroupCode">
<span<?php echo $pharmacy_products_list->ProductGroupCode->viewAttributes() ?>><?php echo $pharmacy_products_list->ProductGroupCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->ProductStrengthCode->Visible) { // ProductStrengthCode ?>
		<td data-name="ProductStrengthCode" <?php echo $pharmacy_products_list->ProductStrengthCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_ProductStrengthCode">
<span<?php echo $pharmacy_products_list->ProductStrengthCode->viewAttributes() ?>><?php echo $pharmacy_products_list->ProductStrengthCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->PackingCode->Visible) { // PackingCode ?>
		<td data-name="PackingCode" <?php echo $pharmacy_products_list->PackingCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_PackingCode">
<span<?php echo $pharmacy_products_list->PackingCode->viewAttributes() ?>><?php echo $pharmacy_products_list->PackingCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->ComputedMinStock->Visible) { // ComputedMinStock ?>
		<td data-name="ComputedMinStock" <?php echo $pharmacy_products_list->ComputedMinStock->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_ComputedMinStock">
<span<?php echo $pharmacy_products_list->ComputedMinStock->viewAttributes() ?>><?php echo $pharmacy_products_list->ComputedMinStock->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->ComputedMaxStock->Visible) { // ComputedMaxStock ?>
		<td data-name="ComputedMaxStock" <?php echo $pharmacy_products_list->ComputedMaxStock->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_ComputedMaxStock">
<span<?php echo $pharmacy_products_list->ComputedMaxStock->viewAttributes() ?>><?php echo $pharmacy_products_list->ComputedMaxStock->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->ProductRemark->Visible) { // ProductRemark ?>
		<td data-name="ProductRemark" <?php echo $pharmacy_products_list->ProductRemark->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_ProductRemark">
<span<?php echo $pharmacy_products_list->ProductRemark->viewAttributes() ?>><?php echo $pharmacy_products_list->ProductRemark->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->ProductDrugCode->Visible) { // ProductDrugCode ?>
		<td data-name="ProductDrugCode" <?php echo $pharmacy_products_list->ProductDrugCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_ProductDrugCode">
<span<?php echo $pharmacy_products_list->ProductDrugCode->viewAttributes() ?>><?php echo $pharmacy_products_list->ProductDrugCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->IsMatrixProduct->Visible) { // IsMatrixProduct ?>
		<td data-name="IsMatrixProduct" <?php echo $pharmacy_products_list->IsMatrixProduct->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_IsMatrixProduct">
<span<?php echo $pharmacy_products_list->IsMatrixProduct->viewAttributes() ?>><?php echo $pharmacy_products_list->IsMatrixProduct->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->AttributeCount1->Visible) { // AttributeCount1 ?>
		<td data-name="AttributeCount1" <?php echo $pharmacy_products_list->AttributeCount1->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_AttributeCount1">
<span<?php echo $pharmacy_products_list->AttributeCount1->viewAttributes() ?>><?php echo $pharmacy_products_list->AttributeCount1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->AttributeCount2->Visible) { // AttributeCount2 ?>
		<td data-name="AttributeCount2" <?php echo $pharmacy_products_list->AttributeCount2->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_AttributeCount2">
<span<?php echo $pharmacy_products_list->AttributeCount2->viewAttributes() ?>><?php echo $pharmacy_products_list->AttributeCount2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->AttributeCount3->Visible) { // AttributeCount3 ?>
		<td data-name="AttributeCount3" <?php echo $pharmacy_products_list->AttributeCount3->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_AttributeCount3">
<span<?php echo $pharmacy_products_list->AttributeCount3->viewAttributes() ?>><?php echo $pharmacy_products_list->AttributeCount3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->AttributeCount4->Visible) { // AttributeCount4 ?>
		<td data-name="AttributeCount4" <?php echo $pharmacy_products_list->AttributeCount4->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_AttributeCount4">
<span<?php echo $pharmacy_products_list->AttributeCount4->viewAttributes() ?>><?php echo $pharmacy_products_list->AttributeCount4->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->AttributeCount5->Visible) { // AttributeCount5 ?>
		<td data-name="AttributeCount5" <?php echo $pharmacy_products_list->AttributeCount5->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_AttributeCount5">
<span<?php echo $pharmacy_products_list->AttributeCount5->viewAttributes() ?>><?php echo $pharmacy_products_list->AttributeCount5->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->DefaultDiscountPercentage->Visible) { // DefaultDiscountPercentage ?>
		<td data-name="DefaultDiscountPercentage" <?php echo $pharmacy_products_list->DefaultDiscountPercentage->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_DefaultDiscountPercentage">
<span<?php echo $pharmacy_products_list->DefaultDiscountPercentage->viewAttributes() ?>><?php echo $pharmacy_products_list->DefaultDiscountPercentage->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->DonotPrintBarcode->Visible) { // DonotPrintBarcode ?>
		<td data-name="DonotPrintBarcode" <?php echo $pharmacy_products_list->DonotPrintBarcode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_DonotPrintBarcode">
<span<?php echo $pharmacy_products_list->DonotPrintBarcode->viewAttributes() ?>><?php echo $pharmacy_products_list->DonotPrintBarcode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->ProductLevelDiscount->Visible) { // ProductLevelDiscount ?>
		<td data-name="ProductLevelDiscount" <?php echo $pharmacy_products_list->ProductLevelDiscount->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_ProductLevelDiscount">
<span<?php echo $pharmacy_products_list->ProductLevelDiscount->viewAttributes() ?>><?php echo $pharmacy_products_list->ProductLevelDiscount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->Markup->Visible) { // Markup ?>
		<td data-name="Markup" <?php echo $pharmacy_products_list->Markup->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_Markup">
<span<?php echo $pharmacy_products_list->Markup->viewAttributes() ?>><?php echo $pharmacy_products_list->Markup->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->MarkDown->Visible) { // MarkDown ?>
		<td data-name="MarkDown" <?php echo $pharmacy_products_list->MarkDown->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_MarkDown">
<span<?php echo $pharmacy_products_list->MarkDown->viewAttributes() ?>><?php echo $pharmacy_products_list->MarkDown->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->ReworkSalePrice->Visible) { // ReworkSalePrice ?>
		<td data-name="ReworkSalePrice" <?php echo $pharmacy_products_list->ReworkSalePrice->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_ReworkSalePrice">
<span<?php echo $pharmacy_products_list->ReworkSalePrice->viewAttributes() ?>><?php echo $pharmacy_products_list->ReworkSalePrice->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->MultipleInput->Visible) { // MultipleInput ?>
		<td data-name="MultipleInput" <?php echo $pharmacy_products_list->MultipleInput->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_MultipleInput">
<span<?php echo $pharmacy_products_list->MultipleInput->viewAttributes() ?>><?php echo $pharmacy_products_list->MultipleInput->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->LpPackageInformation->Visible) { // LpPackageInformation ?>
		<td data-name="LpPackageInformation" <?php echo $pharmacy_products_list->LpPackageInformation->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_LpPackageInformation">
<span<?php echo $pharmacy_products_list->LpPackageInformation->viewAttributes() ?>><?php echo $pharmacy_products_list->LpPackageInformation->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->AllowNegativeStock->Visible) { // AllowNegativeStock ?>
		<td data-name="AllowNegativeStock" <?php echo $pharmacy_products_list->AllowNegativeStock->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_AllowNegativeStock">
<span<?php echo $pharmacy_products_list->AllowNegativeStock->viewAttributes() ?>><?php echo $pharmacy_products_list->AllowNegativeStock->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->OrderDate->Visible) { // OrderDate ?>
		<td data-name="OrderDate" <?php echo $pharmacy_products_list->OrderDate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_OrderDate">
<span<?php echo $pharmacy_products_list->OrderDate->viewAttributes() ?>><?php echo $pharmacy_products_list->OrderDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->OrderTime->Visible) { // OrderTime ?>
		<td data-name="OrderTime" <?php echo $pharmacy_products_list->OrderTime->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_OrderTime">
<span<?php echo $pharmacy_products_list->OrderTime->viewAttributes() ?>><?php echo $pharmacy_products_list->OrderTime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->RateGroupCode->Visible) { // RateGroupCode ?>
		<td data-name="RateGroupCode" <?php echo $pharmacy_products_list->RateGroupCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_RateGroupCode">
<span<?php echo $pharmacy_products_list->RateGroupCode->viewAttributes() ?>><?php echo $pharmacy_products_list->RateGroupCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->ConversionCaseLot->Visible) { // ConversionCaseLot ?>
		<td data-name="ConversionCaseLot" <?php echo $pharmacy_products_list->ConversionCaseLot->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_ConversionCaseLot">
<span<?php echo $pharmacy_products_list->ConversionCaseLot->viewAttributes() ?>><?php echo $pharmacy_products_list->ConversionCaseLot->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->ShippingLot->Visible) { // ShippingLot ?>
		<td data-name="ShippingLot" <?php echo $pharmacy_products_list->ShippingLot->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_ShippingLot">
<span<?php echo $pharmacy_products_list->ShippingLot->viewAttributes() ?>><?php echo $pharmacy_products_list->ShippingLot->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->AllowExpiryReplacement->Visible) { // AllowExpiryReplacement ?>
		<td data-name="AllowExpiryReplacement" <?php echo $pharmacy_products_list->AllowExpiryReplacement->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_AllowExpiryReplacement">
<span<?php echo $pharmacy_products_list->AllowExpiryReplacement->viewAttributes() ?>><?php echo $pharmacy_products_list->AllowExpiryReplacement->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->NoOfMonthExpiryAllowed->Visible) { // NoOfMonthExpiryAllowed ?>
		<td data-name="NoOfMonthExpiryAllowed" <?php echo $pharmacy_products_list->NoOfMonthExpiryAllowed->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_NoOfMonthExpiryAllowed">
<span<?php echo $pharmacy_products_list->NoOfMonthExpiryAllowed->viewAttributes() ?>><?php echo $pharmacy_products_list->NoOfMonthExpiryAllowed->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->ProductDiscountEligibility->Visible) { // ProductDiscountEligibility ?>
		<td data-name="ProductDiscountEligibility" <?php echo $pharmacy_products_list->ProductDiscountEligibility->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_ProductDiscountEligibility">
<span<?php echo $pharmacy_products_list->ProductDiscountEligibility->viewAttributes() ?>><?php echo $pharmacy_products_list->ProductDiscountEligibility->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->ScheduleTypeCode->Visible) { // ScheduleTypeCode ?>
		<td data-name="ScheduleTypeCode" <?php echo $pharmacy_products_list->ScheduleTypeCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_ScheduleTypeCode">
<span<?php echo $pharmacy_products_list->ScheduleTypeCode->viewAttributes() ?>><?php echo $pharmacy_products_list->ScheduleTypeCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->AIOCDProductCode->Visible) { // AIOCDProductCode ?>
		<td data-name="AIOCDProductCode" <?php echo $pharmacy_products_list->AIOCDProductCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_AIOCDProductCode">
<span<?php echo $pharmacy_products_list->AIOCDProductCode->viewAttributes() ?>><?php echo $pharmacy_products_list->AIOCDProductCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->FreeQuantity->Visible) { // FreeQuantity ?>
		<td data-name="FreeQuantity" <?php echo $pharmacy_products_list->FreeQuantity->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_FreeQuantity">
<span<?php echo $pharmacy_products_list->FreeQuantity->viewAttributes() ?>><?php echo $pharmacy_products_list->FreeQuantity->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->DiscountType->Visible) { // DiscountType ?>
		<td data-name="DiscountType" <?php echo $pharmacy_products_list->DiscountType->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_DiscountType">
<span<?php echo $pharmacy_products_list->DiscountType->viewAttributes() ?>><?php echo $pharmacy_products_list->DiscountType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->DiscountValue->Visible) { // DiscountValue ?>
		<td data-name="DiscountValue" <?php echo $pharmacy_products_list->DiscountValue->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_DiscountValue">
<span<?php echo $pharmacy_products_list->DiscountValue->viewAttributes() ?>><?php echo $pharmacy_products_list->DiscountValue->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->HasProductOrderAttribute->Visible) { // HasProductOrderAttribute ?>
		<td data-name="HasProductOrderAttribute" <?php echo $pharmacy_products_list->HasProductOrderAttribute->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_HasProductOrderAttribute">
<span<?php echo $pharmacy_products_list->HasProductOrderAttribute->viewAttributes() ?>><?php echo $pharmacy_products_list->HasProductOrderAttribute->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->FirstPODate->Visible) { // FirstPODate ?>
		<td data-name="FirstPODate" <?php echo $pharmacy_products_list->FirstPODate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_FirstPODate">
<span<?php echo $pharmacy_products_list->FirstPODate->viewAttributes() ?>><?php echo $pharmacy_products_list->FirstPODate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->SaleprcieAndMrpCalcPercent->Visible) { // SaleprcieAndMrpCalcPercent ?>
		<td data-name="SaleprcieAndMrpCalcPercent" <?php echo $pharmacy_products_list->SaleprcieAndMrpCalcPercent->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_SaleprcieAndMrpCalcPercent">
<span<?php echo $pharmacy_products_list->SaleprcieAndMrpCalcPercent->viewAttributes() ?>><?php echo $pharmacy_products_list->SaleprcieAndMrpCalcPercent->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->IsGiftVoucherProducts->Visible) { // IsGiftVoucherProducts ?>
		<td data-name="IsGiftVoucherProducts" <?php echo $pharmacy_products_list->IsGiftVoucherProducts->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_IsGiftVoucherProducts">
<span<?php echo $pharmacy_products_list->IsGiftVoucherProducts->viewAttributes() ?>><?php echo $pharmacy_products_list->IsGiftVoucherProducts->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->AcceptRange4SerialNumber->Visible) { // AcceptRange4SerialNumber ?>
		<td data-name="AcceptRange4SerialNumber" <?php echo $pharmacy_products_list->AcceptRange4SerialNumber->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_AcceptRange4SerialNumber">
<span<?php echo $pharmacy_products_list->AcceptRange4SerialNumber->viewAttributes() ?>><?php echo $pharmacy_products_list->AcceptRange4SerialNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->GiftVoucherDenomination->Visible) { // GiftVoucherDenomination ?>
		<td data-name="GiftVoucherDenomination" <?php echo $pharmacy_products_list->GiftVoucherDenomination->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_GiftVoucherDenomination">
<span<?php echo $pharmacy_products_list->GiftVoucherDenomination->viewAttributes() ?>><?php echo $pharmacy_products_list->GiftVoucherDenomination->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->Subclasscode->Visible) { // Subclasscode ?>
		<td data-name="Subclasscode" <?php echo $pharmacy_products_list->Subclasscode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_Subclasscode">
<span<?php echo $pharmacy_products_list->Subclasscode->viewAttributes() ?>><?php echo $pharmacy_products_list->Subclasscode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->BarCodeFromWeighingMachine->Visible) { // BarCodeFromWeighingMachine ?>
		<td data-name="BarCodeFromWeighingMachine" <?php echo $pharmacy_products_list->BarCodeFromWeighingMachine->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_BarCodeFromWeighingMachine">
<span<?php echo $pharmacy_products_list->BarCodeFromWeighingMachine->viewAttributes() ?>><?php echo $pharmacy_products_list->BarCodeFromWeighingMachine->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->CheckCostInReturn->Visible) { // CheckCostInReturn ?>
		<td data-name="CheckCostInReturn" <?php echo $pharmacy_products_list->CheckCostInReturn->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_CheckCostInReturn">
<span<?php echo $pharmacy_products_list->CheckCostInReturn->viewAttributes() ?>><?php echo $pharmacy_products_list->CheckCostInReturn->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->FrequentSaleProduct->Visible) { // FrequentSaleProduct ?>
		<td data-name="FrequentSaleProduct" <?php echo $pharmacy_products_list->FrequentSaleProduct->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_FrequentSaleProduct">
<span<?php echo $pharmacy_products_list->FrequentSaleProduct->viewAttributes() ?>><?php echo $pharmacy_products_list->FrequentSaleProduct->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->RateType->Visible) { // RateType ?>
		<td data-name="RateType" <?php echo $pharmacy_products_list->RateType->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_RateType">
<span<?php echo $pharmacy_products_list->RateType->viewAttributes() ?>><?php echo $pharmacy_products_list->RateType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->TouchscreenName->Visible) { // TouchscreenName ?>
		<td data-name="TouchscreenName" <?php echo $pharmacy_products_list->TouchscreenName->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_TouchscreenName">
<span<?php echo $pharmacy_products_list->TouchscreenName->viewAttributes() ?>><?php echo $pharmacy_products_list->TouchscreenName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->FreeType->Visible) { // FreeType ?>
		<td data-name="FreeType" <?php echo $pharmacy_products_list->FreeType->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_FreeType">
<span<?php echo $pharmacy_products_list->FreeType->viewAttributes() ?>><?php echo $pharmacy_products_list->FreeType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->LooseQtyasNewBatch->Visible) { // LooseQtyasNewBatch ?>
		<td data-name="LooseQtyasNewBatch" <?php echo $pharmacy_products_list->LooseQtyasNewBatch->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_LooseQtyasNewBatch">
<span<?php echo $pharmacy_products_list->LooseQtyasNewBatch->viewAttributes() ?>><?php echo $pharmacy_products_list->LooseQtyasNewBatch->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->AllowSlabBilling->Visible) { // AllowSlabBilling ?>
		<td data-name="AllowSlabBilling" <?php echo $pharmacy_products_list->AllowSlabBilling->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_AllowSlabBilling">
<span<?php echo $pharmacy_products_list->AllowSlabBilling->viewAttributes() ?>><?php echo $pharmacy_products_list->AllowSlabBilling->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->ProductTypeForProduction->Visible) { // ProductTypeForProduction ?>
		<td data-name="ProductTypeForProduction" <?php echo $pharmacy_products_list->ProductTypeForProduction->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_ProductTypeForProduction">
<span<?php echo $pharmacy_products_list->ProductTypeForProduction->viewAttributes() ?>><?php echo $pharmacy_products_list->ProductTypeForProduction->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->RecipeCode->Visible) { // RecipeCode ?>
		<td data-name="RecipeCode" <?php echo $pharmacy_products_list->RecipeCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_RecipeCode">
<span<?php echo $pharmacy_products_list->RecipeCode->viewAttributes() ?>><?php echo $pharmacy_products_list->RecipeCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->DefaultUnitType->Visible) { // DefaultUnitType ?>
		<td data-name="DefaultUnitType" <?php echo $pharmacy_products_list->DefaultUnitType->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_DefaultUnitType">
<span<?php echo $pharmacy_products_list->DefaultUnitType->viewAttributes() ?>><?php echo $pharmacy_products_list->DefaultUnitType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->PIstatus->Visible) { // PIstatus ?>
		<td data-name="PIstatus" <?php echo $pharmacy_products_list->PIstatus->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_PIstatus">
<span<?php echo $pharmacy_products_list->PIstatus->viewAttributes() ?>><?php echo $pharmacy_products_list->PIstatus->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->LastPiConfirmedDate->Visible) { // LastPiConfirmedDate ?>
		<td data-name="LastPiConfirmedDate" <?php echo $pharmacy_products_list->LastPiConfirmedDate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_LastPiConfirmedDate">
<span<?php echo $pharmacy_products_list->LastPiConfirmedDate->viewAttributes() ?>><?php echo $pharmacy_products_list->LastPiConfirmedDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->BarCodeDesign->Visible) { // BarCodeDesign ?>
		<td data-name="BarCodeDesign" <?php echo $pharmacy_products_list->BarCodeDesign->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_BarCodeDesign">
<span<?php echo $pharmacy_products_list->BarCodeDesign->viewAttributes() ?>><?php echo $pharmacy_products_list->BarCodeDesign->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->AcceptRemarksInBill->Visible) { // AcceptRemarksInBill ?>
		<td data-name="AcceptRemarksInBill" <?php echo $pharmacy_products_list->AcceptRemarksInBill->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_AcceptRemarksInBill">
<span<?php echo $pharmacy_products_list->AcceptRemarksInBill->viewAttributes() ?>><?php echo $pharmacy_products_list->AcceptRemarksInBill->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->Classification->Visible) { // Classification ?>
		<td data-name="Classification" <?php echo $pharmacy_products_list->Classification->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_Classification">
<span<?php echo $pharmacy_products_list->Classification->viewAttributes() ?>><?php echo $pharmacy_products_list->Classification->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->TimeSlot->Visible) { // TimeSlot ?>
		<td data-name="TimeSlot" <?php echo $pharmacy_products_list->TimeSlot->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_TimeSlot">
<span<?php echo $pharmacy_products_list->TimeSlot->viewAttributes() ?>><?php echo $pharmacy_products_list->TimeSlot->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->IsBundle->Visible) { // IsBundle ?>
		<td data-name="IsBundle" <?php echo $pharmacy_products_list->IsBundle->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_IsBundle">
<span<?php echo $pharmacy_products_list->IsBundle->viewAttributes() ?>><?php echo $pharmacy_products_list->IsBundle->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->ColorCode->Visible) { // ColorCode ?>
		<td data-name="ColorCode" <?php echo $pharmacy_products_list->ColorCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_ColorCode">
<span<?php echo $pharmacy_products_list->ColorCode->viewAttributes() ?>><?php echo $pharmacy_products_list->ColorCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->GenderCode->Visible) { // GenderCode ?>
		<td data-name="GenderCode" <?php echo $pharmacy_products_list->GenderCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_GenderCode">
<span<?php echo $pharmacy_products_list->GenderCode->viewAttributes() ?>><?php echo $pharmacy_products_list->GenderCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->SizeCode->Visible) { // SizeCode ?>
		<td data-name="SizeCode" <?php echo $pharmacy_products_list->SizeCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_SizeCode">
<span<?php echo $pharmacy_products_list->SizeCode->viewAttributes() ?>><?php echo $pharmacy_products_list->SizeCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->GiftCard->Visible) { // GiftCard ?>
		<td data-name="GiftCard" <?php echo $pharmacy_products_list->GiftCard->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_GiftCard">
<span<?php echo $pharmacy_products_list->GiftCard->viewAttributes() ?>><?php echo $pharmacy_products_list->GiftCard->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->ToonLabel->Visible) { // ToonLabel ?>
		<td data-name="ToonLabel" <?php echo $pharmacy_products_list->ToonLabel->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_ToonLabel">
<span<?php echo $pharmacy_products_list->ToonLabel->viewAttributes() ?>><?php echo $pharmacy_products_list->ToonLabel->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->GarmentType->Visible) { // GarmentType ?>
		<td data-name="GarmentType" <?php echo $pharmacy_products_list->GarmentType->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_GarmentType">
<span<?php echo $pharmacy_products_list->GarmentType->viewAttributes() ?>><?php echo $pharmacy_products_list->GarmentType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->AgeGroup->Visible) { // AgeGroup ?>
		<td data-name="AgeGroup" <?php echo $pharmacy_products_list->AgeGroup->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_AgeGroup">
<span<?php echo $pharmacy_products_list->AgeGroup->viewAttributes() ?>><?php echo $pharmacy_products_list->AgeGroup->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->Season->Visible) { // Season ?>
		<td data-name="Season" <?php echo $pharmacy_products_list->Season->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_Season">
<span<?php echo $pharmacy_products_list->Season->viewAttributes() ?>><?php echo $pharmacy_products_list->Season->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->DailyStockEntry->Visible) { // DailyStockEntry ?>
		<td data-name="DailyStockEntry" <?php echo $pharmacy_products_list->DailyStockEntry->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_DailyStockEntry">
<span<?php echo $pharmacy_products_list->DailyStockEntry->viewAttributes() ?>><?php echo $pharmacy_products_list->DailyStockEntry->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->ModifierApplicable->Visible) { // ModifierApplicable ?>
		<td data-name="ModifierApplicable" <?php echo $pharmacy_products_list->ModifierApplicable->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_ModifierApplicable">
<span<?php echo $pharmacy_products_list->ModifierApplicable->viewAttributes() ?>><?php echo $pharmacy_products_list->ModifierApplicable->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->ModifierType->Visible) { // ModifierType ?>
		<td data-name="ModifierType" <?php echo $pharmacy_products_list->ModifierType->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_ModifierType">
<span<?php echo $pharmacy_products_list->ModifierType->viewAttributes() ?>><?php echo $pharmacy_products_list->ModifierType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->AcceptZeroRate->Visible) { // AcceptZeroRate ?>
		<td data-name="AcceptZeroRate" <?php echo $pharmacy_products_list->AcceptZeroRate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_AcceptZeroRate">
<span<?php echo $pharmacy_products_list->AcceptZeroRate->viewAttributes() ?>><?php echo $pharmacy_products_list->AcceptZeroRate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->ExciseDutyCode->Visible) { // ExciseDutyCode ?>
		<td data-name="ExciseDutyCode" <?php echo $pharmacy_products_list->ExciseDutyCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_ExciseDutyCode">
<span<?php echo $pharmacy_products_list->ExciseDutyCode->viewAttributes() ?>><?php echo $pharmacy_products_list->ExciseDutyCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->IndentProductGroupCode->Visible) { // IndentProductGroupCode ?>
		<td data-name="IndentProductGroupCode" <?php echo $pharmacy_products_list->IndentProductGroupCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_IndentProductGroupCode">
<span<?php echo $pharmacy_products_list->IndentProductGroupCode->viewAttributes() ?>><?php echo $pharmacy_products_list->IndentProductGroupCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->IsMultiBatch->Visible) { // IsMultiBatch ?>
		<td data-name="IsMultiBatch" <?php echo $pharmacy_products_list->IsMultiBatch->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_IsMultiBatch">
<span<?php echo $pharmacy_products_list->IsMultiBatch->viewAttributes() ?>><?php echo $pharmacy_products_list->IsMultiBatch->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->IsSingleBatch->Visible) { // IsSingleBatch ?>
		<td data-name="IsSingleBatch" <?php echo $pharmacy_products_list->IsSingleBatch->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_IsSingleBatch">
<span<?php echo $pharmacy_products_list->IsSingleBatch->viewAttributes() ?>><?php echo $pharmacy_products_list->IsSingleBatch->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->MarkUpRate1->Visible) { // MarkUpRate1 ?>
		<td data-name="MarkUpRate1" <?php echo $pharmacy_products_list->MarkUpRate1->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_MarkUpRate1">
<span<?php echo $pharmacy_products_list->MarkUpRate1->viewAttributes() ?>><?php echo $pharmacy_products_list->MarkUpRate1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->MarkDownRate1->Visible) { // MarkDownRate1 ?>
		<td data-name="MarkDownRate1" <?php echo $pharmacy_products_list->MarkDownRate1->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_MarkDownRate1">
<span<?php echo $pharmacy_products_list->MarkDownRate1->viewAttributes() ?>><?php echo $pharmacy_products_list->MarkDownRate1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->MarkUpRate2->Visible) { // MarkUpRate2 ?>
		<td data-name="MarkUpRate2" <?php echo $pharmacy_products_list->MarkUpRate2->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_MarkUpRate2">
<span<?php echo $pharmacy_products_list->MarkUpRate2->viewAttributes() ?>><?php echo $pharmacy_products_list->MarkUpRate2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->MarkDownRate2->Visible) { // MarkDownRate2 ?>
		<td data-name="MarkDownRate2" <?php echo $pharmacy_products_list->MarkDownRate2->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_MarkDownRate2">
<span<?php echo $pharmacy_products_list->MarkDownRate2->viewAttributes() ?>><?php echo $pharmacy_products_list->MarkDownRate2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->_Yield->Visible) { // Yield ?>
		<td data-name="_Yield" <?php echo $pharmacy_products_list->_Yield->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products__Yield">
<span<?php echo $pharmacy_products_list->_Yield->viewAttributes() ?>><?php echo $pharmacy_products_list->_Yield->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->RefProductCode->Visible) { // RefProductCode ?>
		<td data-name="RefProductCode" <?php echo $pharmacy_products_list->RefProductCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_RefProductCode">
<span<?php echo $pharmacy_products_list->RefProductCode->viewAttributes() ?>><?php echo $pharmacy_products_list->RefProductCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->Volume->Visible) { // Volume ?>
		<td data-name="Volume" <?php echo $pharmacy_products_list->Volume->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_Volume">
<span<?php echo $pharmacy_products_list->Volume->viewAttributes() ?>><?php echo $pharmacy_products_list->Volume->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->MeasurementID->Visible) { // MeasurementID ?>
		<td data-name="MeasurementID" <?php echo $pharmacy_products_list->MeasurementID->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_MeasurementID">
<span<?php echo $pharmacy_products_list->MeasurementID->viewAttributes() ?>><?php echo $pharmacy_products_list->MeasurementID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->CountryCode->Visible) { // CountryCode ?>
		<td data-name="CountryCode" <?php echo $pharmacy_products_list->CountryCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_CountryCode">
<span<?php echo $pharmacy_products_list->CountryCode->viewAttributes() ?>><?php echo $pharmacy_products_list->CountryCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->AcceptWMQty->Visible) { // AcceptWMQty ?>
		<td data-name="AcceptWMQty" <?php echo $pharmacy_products_list->AcceptWMQty->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_AcceptWMQty">
<span<?php echo $pharmacy_products_list->AcceptWMQty->viewAttributes() ?>><?php echo $pharmacy_products_list->AcceptWMQty->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->SingleBatchBasedOnRate->Visible) { // SingleBatchBasedOnRate ?>
		<td data-name="SingleBatchBasedOnRate" <?php echo $pharmacy_products_list->SingleBatchBasedOnRate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_SingleBatchBasedOnRate">
<span<?php echo $pharmacy_products_list->SingleBatchBasedOnRate->viewAttributes() ?>><?php echo $pharmacy_products_list->SingleBatchBasedOnRate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->TenderNo->Visible) { // TenderNo ?>
		<td data-name="TenderNo" <?php echo $pharmacy_products_list->TenderNo->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_TenderNo">
<span<?php echo $pharmacy_products_list->TenderNo->viewAttributes() ?>><?php echo $pharmacy_products_list->TenderNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->SingleBillMaximumSoldQtyFiled->Visible) { // SingleBillMaximumSoldQtyFiled ?>
		<td data-name="SingleBillMaximumSoldQtyFiled" <?php echo $pharmacy_products_list->SingleBillMaximumSoldQtyFiled->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_SingleBillMaximumSoldQtyFiled">
<span<?php echo $pharmacy_products_list->SingleBillMaximumSoldQtyFiled->viewAttributes() ?>><?php echo $pharmacy_products_list->SingleBillMaximumSoldQtyFiled->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->Strength1->Visible) { // Strength1 ?>
		<td data-name="Strength1" <?php echo $pharmacy_products_list->Strength1->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_Strength1">
<span<?php echo $pharmacy_products_list->Strength1->viewAttributes() ?>><?php echo $pharmacy_products_list->Strength1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->Strength2->Visible) { // Strength2 ?>
		<td data-name="Strength2" <?php echo $pharmacy_products_list->Strength2->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_Strength2">
<span<?php echo $pharmacy_products_list->Strength2->viewAttributes() ?>><?php echo $pharmacy_products_list->Strength2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->Strength3->Visible) { // Strength3 ?>
		<td data-name="Strength3" <?php echo $pharmacy_products_list->Strength3->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_Strength3">
<span<?php echo $pharmacy_products_list->Strength3->viewAttributes() ?>><?php echo $pharmacy_products_list->Strength3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->Strength4->Visible) { // Strength4 ?>
		<td data-name="Strength4" <?php echo $pharmacy_products_list->Strength4->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_Strength4">
<span<?php echo $pharmacy_products_list->Strength4->viewAttributes() ?>><?php echo $pharmacy_products_list->Strength4->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->Strength5->Visible) { // Strength5 ?>
		<td data-name="Strength5" <?php echo $pharmacy_products_list->Strength5->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_Strength5">
<span<?php echo $pharmacy_products_list->Strength5->viewAttributes() ?>><?php echo $pharmacy_products_list->Strength5->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->IngredientCode1->Visible) { // IngredientCode1 ?>
		<td data-name="IngredientCode1" <?php echo $pharmacy_products_list->IngredientCode1->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_IngredientCode1">
<span<?php echo $pharmacy_products_list->IngredientCode1->viewAttributes() ?>><?php echo $pharmacy_products_list->IngredientCode1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->IngredientCode2->Visible) { // IngredientCode2 ?>
		<td data-name="IngredientCode2" <?php echo $pharmacy_products_list->IngredientCode2->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_IngredientCode2">
<span<?php echo $pharmacy_products_list->IngredientCode2->viewAttributes() ?>><?php echo $pharmacy_products_list->IngredientCode2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->IngredientCode3->Visible) { // IngredientCode3 ?>
		<td data-name="IngredientCode3" <?php echo $pharmacy_products_list->IngredientCode3->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_IngredientCode3">
<span<?php echo $pharmacy_products_list->IngredientCode3->viewAttributes() ?>><?php echo $pharmacy_products_list->IngredientCode3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->IngredientCode4->Visible) { // IngredientCode4 ?>
		<td data-name="IngredientCode4" <?php echo $pharmacy_products_list->IngredientCode4->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_IngredientCode4">
<span<?php echo $pharmacy_products_list->IngredientCode4->viewAttributes() ?>><?php echo $pharmacy_products_list->IngredientCode4->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->IngredientCode5->Visible) { // IngredientCode5 ?>
		<td data-name="IngredientCode5" <?php echo $pharmacy_products_list->IngredientCode5->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_IngredientCode5">
<span<?php echo $pharmacy_products_list->IngredientCode5->viewAttributes() ?>><?php echo $pharmacy_products_list->IngredientCode5->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->OrderType->Visible) { // OrderType ?>
		<td data-name="OrderType" <?php echo $pharmacy_products_list->OrderType->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_OrderType">
<span<?php echo $pharmacy_products_list->OrderType->viewAttributes() ?>><?php echo $pharmacy_products_list->OrderType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->StockUOM->Visible) { // StockUOM ?>
		<td data-name="StockUOM" <?php echo $pharmacy_products_list->StockUOM->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_StockUOM">
<span<?php echo $pharmacy_products_list->StockUOM->viewAttributes() ?>><?php echo $pharmacy_products_list->StockUOM->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->PriceUOM->Visible) { // PriceUOM ?>
		<td data-name="PriceUOM" <?php echo $pharmacy_products_list->PriceUOM->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_PriceUOM">
<span<?php echo $pharmacy_products_list->PriceUOM->viewAttributes() ?>><?php echo $pharmacy_products_list->PriceUOM->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->DefaultSaleUOM->Visible) { // DefaultSaleUOM ?>
		<td data-name="DefaultSaleUOM" <?php echo $pharmacy_products_list->DefaultSaleUOM->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_DefaultSaleUOM">
<span<?php echo $pharmacy_products_list->DefaultSaleUOM->viewAttributes() ?>><?php echo $pharmacy_products_list->DefaultSaleUOM->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->DefaultPurchaseUOM->Visible) { // DefaultPurchaseUOM ?>
		<td data-name="DefaultPurchaseUOM" <?php echo $pharmacy_products_list->DefaultPurchaseUOM->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_DefaultPurchaseUOM">
<span<?php echo $pharmacy_products_list->DefaultPurchaseUOM->viewAttributes() ?>><?php echo $pharmacy_products_list->DefaultPurchaseUOM->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->ReportingUOM->Visible) { // ReportingUOM ?>
		<td data-name="ReportingUOM" <?php echo $pharmacy_products_list->ReportingUOM->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_ReportingUOM">
<span<?php echo $pharmacy_products_list->ReportingUOM->viewAttributes() ?>><?php echo $pharmacy_products_list->ReportingUOM->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->LastPurchasedUOM->Visible) { // LastPurchasedUOM ?>
		<td data-name="LastPurchasedUOM" <?php echo $pharmacy_products_list->LastPurchasedUOM->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_LastPurchasedUOM">
<span<?php echo $pharmacy_products_list->LastPurchasedUOM->viewAttributes() ?>><?php echo $pharmacy_products_list->LastPurchasedUOM->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->TreatmentCodes->Visible) { // TreatmentCodes ?>
		<td data-name="TreatmentCodes" <?php echo $pharmacy_products_list->TreatmentCodes->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_TreatmentCodes">
<span<?php echo $pharmacy_products_list->TreatmentCodes->viewAttributes() ?>><?php echo $pharmacy_products_list->TreatmentCodes->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->InsuranceType->Visible) { // InsuranceType ?>
		<td data-name="InsuranceType" <?php echo $pharmacy_products_list->InsuranceType->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_InsuranceType">
<span<?php echo $pharmacy_products_list->InsuranceType->viewAttributes() ?>><?php echo $pharmacy_products_list->InsuranceType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->CoverageGroupCodes->Visible) { // CoverageGroupCodes ?>
		<td data-name="CoverageGroupCodes" <?php echo $pharmacy_products_list->CoverageGroupCodes->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_CoverageGroupCodes">
<span<?php echo $pharmacy_products_list->CoverageGroupCodes->viewAttributes() ?>><?php echo $pharmacy_products_list->CoverageGroupCodes->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->MultipleUOM->Visible) { // MultipleUOM ?>
		<td data-name="MultipleUOM" <?php echo $pharmacy_products_list->MultipleUOM->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_MultipleUOM">
<span<?php echo $pharmacy_products_list->MultipleUOM->viewAttributes() ?>><?php echo $pharmacy_products_list->MultipleUOM->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->SalePriceComputation->Visible) { // SalePriceComputation ?>
		<td data-name="SalePriceComputation" <?php echo $pharmacy_products_list->SalePriceComputation->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_SalePriceComputation">
<span<?php echo $pharmacy_products_list->SalePriceComputation->viewAttributes() ?>><?php echo $pharmacy_products_list->SalePriceComputation->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->StockCorrection->Visible) { // StockCorrection ?>
		<td data-name="StockCorrection" <?php echo $pharmacy_products_list->StockCorrection->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_StockCorrection">
<span<?php echo $pharmacy_products_list->StockCorrection->viewAttributes() ?>><?php echo $pharmacy_products_list->StockCorrection->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->LBTPercentage->Visible) { // LBTPercentage ?>
		<td data-name="LBTPercentage" <?php echo $pharmacy_products_list->LBTPercentage->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_LBTPercentage">
<span<?php echo $pharmacy_products_list->LBTPercentage->viewAttributes() ?>><?php echo $pharmacy_products_list->LBTPercentage->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->SalesCommission->Visible) { // SalesCommission ?>
		<td data-name="SalesCommission" <?php echo $pharmacy_products_list->SalesCommission->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_SalesCommission">
<span<?php echo $pharmacy_products_list->SalesCommission->viewAttributes() ?>><?php echo $pharmacy_products_list->SalesCommission->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->LockedStock->Visible) { // LockedStock ?>
		<td data-name="LockedStock" <?php echo $pharmacy_products_list->LockedStock->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_LockedStock">
<span<?php echo $pharmacy_products_list->LockedStock->viewAttributes() ?>><?php echo $pharmacy_products_list->LockedStock->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->MinMaxUOM->Visible) { // MinMaxUOM ?>
		<td data-name="MinMaxUOM" <?php echo $pharmacy_products_list->MinMaxUOM->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_MinMaxUOM">
<span<?php echo $pharmacy_products_list->MinMaxUOM->viewAttributes() ?>><?php echo $pharmacy_products_list->MinMaxUOM->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->ExpiryMfrDateFormat->Visible) { // ExpiryMfrDateFormat ?>
		<td data-name="ExpiryMfrDateFormat" <?php echo $pharmacy_products_list->ExpiryMfrDateFormat->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_ExpiryMfrDateFormat">
<span<?php echo $pharmacy_products_list->ExpiryMfrDateFormat->viewAttributes() ?>><?php echo $pharmacy_products_list->ExpiryMfrDateFormat->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->ProductLifeTime->Visible) { // ProductLifeTime ?>
		<td data-name="ProductLifeTime" <?php echo $pharmacy_products_list->ProductLifeTime->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_ProductLifeTime">
<span<?php echo $pharmacy_products_list->ProductLifeTime->viewAttributes() ?>><?php echo $pharmacy_products_list->ProductLifeTime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->IsCombo->Visible) { // IsCombo ?>
		<td data-name="IsCombo" <?php echo $pharmacy_products_list->IsCombo->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_IsCombo">
<span<?php echo $pharmacy_products_list->IsCombo->viewAttributes() ?>><?php echo $pharmacy_products_list->IsCombo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->ComboTypeCode->Visible) { // ComboTypeCode ?>
		<td data-name="ComboTypeCode" <?php echo $pharmacy_products_list->ComboTypeCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_ComboTypeCode">
<span<?php echo $pharmacy_products_list->ComboTypeCode->viewAttributes() ?>><?php echo $pharmacy_products_list->ComboTypeCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->AttributeCount6->Visible) { // AttributeCount6 ?>
		<td data-name="AttributeCount6" <?php echo $pharmacy_products_list->AttributeCount6->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_AttributeCount6">
<span<?php echo $pharmacy_products_list->AttributeCount6->viewAttributes() ?>><?php echo $pharmacy_products_list->AttributeCount6->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->AttributeCount7->Visible) { // AttributeCount7 ?>
		<td data-name="AttributeCount7" <?php echo $pharmacy_products_list->AttributeCount7->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_AttributeCount7">
<span<?php echo $pharmacy_products_list->AttributeCount7->viewAttributes() ?>><?php echo $pharmacy_products_list->AttributeCount7->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->AttributeCount8->Visible) { // AttributeCount8 ?>
		<td data-name="AttributeCount8" <?php echo $pharmacy_products_list->AttributeCount8->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_AttributeCount8">
<span<?php echo $pharmacy_products_list->AttributeCount8->viewAttributes() ?>><?php echo $pharmacy_products_list->AttributeCount8->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->AttributeCount9->Visible) { // AttributeCount9 ?>
		<td data-name="AttributeCount9" <?php echo $pharmacy_products_list->AttributeCount9->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_AttributeCount9">
<span<?php echo $pharmacy_products_list->AttributeCount9->viewAttributes() ?>><?php echo $pharmacy_products_list->AttributeCount9->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->AttributeCount10->Visible) { // AttributeCount10 ?>
		<td data-name="AttributeCount10" <?php echo $pharmacy_products_list->AttributeCount10->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_AttributeCount10">
<span<?php echo $pharmacy_products_list->AttributeCount10->viewAttributes() ?>><?php echo $pharmacy_products_list->AttributeCount10->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->LabourCharge->Visible) { // LabourCharge ?>
		<td data-name="LabourCharge" <?php echo $pharmacy_products_list->LabourCharge->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_LabourCharge">
<span<?php echo $pharmacy_products_list->LabourCharge->viewAttributes() ?>><?php echo $pharmacy_products_list->LabourCharge->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->AffectOtherCharge->Visible) { // AffectOtherCharge ?>
		<td data-name="AffectOtherCharge" <?php echo $pharmacy_products_list->AffectOtherCharge->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_AffectOtherCharge">
<span<?php echo $pharmacy_products_list->AffectOtherCharge->viewAttributes() ?>><?php echo $pharmacy_products_list->AffectOtherCharge->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->DosageInfo->Visible) { // DosageInfo ?>
		<td data-name="DosageInfo" <?php echo $pharmacy_products_list->DosageInfo->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_DosageInfo">
<span<?php echo $pharmacy_products_list->DosageInfo->viewAttributes() ?>><?php echo $pharmacy_products_list->DosageInfo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->DosageType->Visible) { // DosageType ?>
		<td data-name="DosageType" <?php echo $pharmacy_products_list->DosageType->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_DosageType">
<span<?php echo $pharmacy_products_list->DosageType->viewAttributes() ?>><?php echo $pharmacy_products_list->DosageType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->DefaultIndentUOM->Visible) { // DefaultIndentUOM ?>
		<td data-name="DefaultIndentUOM" <?php echo $pharmacy_products_list->DefaultIndentUOM->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_DefaultIndentUOM">
<span<?php echo $pharmacy_products_list->DefaultIndentUOM->viewAttributes() ?>><?php echo $pharmacy_products_list->DefaultIndentUOM->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->PromoTag->Visible) { // PromoTag ?>
		<td data-name="PromoTag" <?php echo $pharmacy_products_list->PromoTag->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_PromoTag">
<span<?php echo $pharmacy_products_list->PromoTag->viewAttributes() ?>><?php echo $pharmacy_products_list->PromoTag->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->BillLevelPromoTag->Visible) { // BillLevelPromoTag ?>
		<td data-name="BillLevelPromoTag" <?php echo $pharmacy_products_list->BillLevelPromoTag->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_BillLevelPromoTag">
<span<?php echo $pharmacy_products_list->BillLevelPromoTag->viewAttributes() ?>><?php echo $pharmacy_products_list->BillLevelPromoTag->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->IsMRPProduct->Visible) { // IsMRPProduct ?>
		<td data-name="IsMRPProduct" <?php echo $pharmacy_products_list->IsMRPProduct->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_IsMRPProduct">
<span<?php echo $pharmacy_products_list->IsMRPProduct->viewAttributes() ?>><?php echo $pharmacy_products_list->IsMRPProduct->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->AlternateSaleUOM->Visible) { // AlternateSaleUOM ?>
		<td data-name="AlternateSaleUOM" <?php echo $pharmacy_products_list->AlternateSaleUOM->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_AlternateSaleUOM">
<span<?php echo $pharmacy_products_list->AlternateSaleUOM->viewAttributes() ?>><?php echo $pharmacy_products_list->AlternateSaleUOM->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->FreeUOM->Visible) { // FreeUOM ?>
		<td data-name="FreeUOM" <?php echo $pharmacy_products_list->FreeUOM->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_FreeUOM">
<span<?php echo $pharmacy_products_list->FreeUOM->viewAttributes() ?>><?php echo $pharmacy_products_list->FreeUOM->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->MarketedCode->Visible) { // MarketedCode ?>
		<td data-name="MarketedCode" <?php echo $pharmacy_products_list->MarketedCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_MarketedCode">
<span<?php echo $pharmacy_products_list->MarketedCode->viewAttributes() ?>><?php echo $pharmacy_products_list->MarketedCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->MinimumSalePrice->Visible) { // MinimumSalePrice ?>
		<td data-name="MinimumSalePrice" <?php echo $pharmacy_products_list->MinimumSalePrice->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_MinimumSalePrice">
<span<?php echo $pharmacy_products_list->MinimumSalePrice->viewAttributes() ?>><?php echo $pharmacy_products_list->MinimumSalePrice->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->PRate1->Visible) { // PRate1 ?>
		<td data-name="PRate1" <?php echo $pharmacy_products_list->PRate1->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_PRate1">
<span<?php echo $pharmacy_products_list->PRate1->viewAttributes() ?>><?php echo $pharmacy_products_list->PRate1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->PRate2->Visible) { // PRate2 ?>
		<td data-name="PRate2" <?php echo $pharmacy_products_list->PRate2->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_PRate2">
<span<?php echo $pharmacy_products_list->PRate2->viewAttributes() ?>><?php echo $pharmacy_products_list->PRate2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->LPItemCost->Visible) { // LPItemCost ?>
		<td data-name="LPItemCost" <?php echo $pharmacy_products_list->LPItemCost->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_LPItemCost">
<span<?php echo $pharmacy_products_list->LPItemCost->viewAttributes() ?>><?php echo $pharmacy_products_list->LPItemCost->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->FixedItemCost->Visible) { // FixedItemCost ?>
		<td data-name="FixedItemCost" <?php echo $pharmacy_products_list->FixedItemCost->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_FixedItemCost">
<span<?php echo $pharmacy_products_list->FixedItemCost->viewAttributes() ?>><?php echo $pharmacy_products_list->FixedItemCost->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->HSNId->Visible) { // HSNId ?>
		<td data-name="HSNId" <?php echo $pharmacy_products_list->HSNId->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_HSNId">
<span<?php echo $pharmacy_products_list->HSNId->viewAttributes() ?>><?php echo $pharmacy_products_list->HSNId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->TaxInclusive->Visible) { // TaxInclusive ?>
		<td data-name="TaxInclusive" <?php echo $pharmacy_products_list->TaxInclusive->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_TaxInclusive">
<span<?php echo $pharmacy_products_list->TaxInclusive->viewAttributes() ?>><?php echo $pharmacy_products_list->TaxInclusive->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->EligibleforWarranty->Visible) { // EligibleforWarranty ?>
		<td data-name="EligibleforWarranty" <?php echo $pharmacy_products_list->EligibleforWarranty->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_EligibleforWarranty">
<span<?php echo $pharmacy_products_list->EligibleforWarranty->viewAttributes() ?>><?php echo $pharmacy_products_list->EligibleforWarranty->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->NoofMonthsWarranty->Visible) { // NoofMonthsWarranty ?>
		<td data-name="NoofMonthsWarranty" <?php echo $pharmacy_products_list->NoofMonthsWarranty->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_NoofMonthsWarranty">
<span<?php echo $pharmacy_products_list->NoofMonthsWarranty->viewAttributes() ?>><?php echo $pharmacy_products_list->NoofMonthsWarranty->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->ComputeTaxonCost->Visible) { // ComputeTaxonCost ?>
		<td data-name="ComputeTaxonCost" <?php echo $pharmacy_products_list->ComputeTaxonCost->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_ComputeTaxonCost">
<span<?php echo $pharmacy_products_list->ComputeTaxonCost->viewAttributes() ?>><?php echo $pharmacy_products_list->ComputeTaxonCost->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->HasEmptyBottleTrack->Visible) { // HasEmptyBottleTrack ?>
		<td data-name="HasEmptyBottleTrack" <?php echo $pharmacy_products_list->HasEmptyBottleTrack->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_HasEmptyBottleTrack">
<span<?php echo $pharmacy_products_list->HasEmptyBottleTrack->viewAttributes() ?>><?php echo $pharmacy_products_list->HasEmptyBottleTrack->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->EmptyBottleReferenceCode->Visible) { // EmptyBottleReferenceCode ?>
		<td data-name="EmptyBottleReferenceCode" <?php echo $pharmacy_products_list->EmptyBottleReferenceCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_EmptyBottleReferenceCode">
<span<?php echo $pharmacy_products_list->EmptyBottleReferenceCode->viewAttributes() ?>><?php echo $pharmacy_products_list->EmptyBottleReferenceCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->AdditionalCESSAmount->Visible) { // AdditionalCESSAmount ?>
		<td data-name="AdditionalCESSAmount" <?php echo $pharmacy_products_list->AdditionalCESSAmount->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_AdditionalCESSAmount">
<span<?php echo $pharmacy_products_list->AdditionalCESSAmount->viewAttributes() ?>><?php echo $pharmacy_products_list->AdditionalCESSAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products_list->EmptyBottleRate->Visible) { // EmptyBottleRate ?>
		<td data-name="EmptyBottleRate" <?php echo $pharmacy_products_list->EmptyBottleRate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCount ?>_pharmacy_products_EmptyBottleRate">
<span<?php echo $pharmacy_products_list->EmptyBottleRate->viewAttributes() ?>><?php echo $pharmacy_products_list->EmptyBottleRate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_products_list->ListOptions->render("body", "right", $pharmacy_products_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$pharmacy_products_list->isGridAdd())
		$pharmacy_products_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$pharmacy_products->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pharmacy_products_list->Recordset)
	$pharmacy_products_list->Recordset->Close();
?>
<?php if (!$pharmacy_products_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$pharmacy_products_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $pharmacy_products_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_products_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pharmacy_products_list->TotalRecords == 0 && !$pharmacy_products->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pharmacy_products_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$pharmacy_products_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_products_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$pharmacy_products->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_pharmacy_products",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$pharmacy_products_list->terminate();
?>