<?php
namespace PHPMaker2019\HIMS;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start(); 

// Autoload
include_once "autoload.php";
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
<?php include_once "header.php" ?>
<?php if (!$pharmacy_products->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fpharmacy_productslist = currentForm = new ew.Form("fpharmacy_productslist", "list");
fpharmacy_productslist.formKeyCountName = '<?php echo $pharmacy_products_list->FormKeyCountName ?>';

// Form_CustomValidate event
fpharmacy_productslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_productslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fpharmacy_productslistsrch = currentSearchForm = new ew.Form("fpharmacy_productslistsrch");

// Filters
fpharmacy_productslistsrch.filterList = <?php echo $pharmacy_products_list->getFilterList() ?>;
</script>
<script src="phpjs/ewscrolltable.js"></script>
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
<script src="phpjs/ewpreview.js"></script>
<script>
ew.PREVIEW_PLACEMENT = ew.CSS_FLIP ? "left" : "right";
ew.PREVIEW_SINGLE_ROW = false;
ew.PREVIEW_OVERLAY = false;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$pharmacy_products->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($pharmacy_products_list->TotalRecs > 0 && $pharmacy_products_list->ExportOptions->visible()) { ?>
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
<?php if (!$pharmacy_products->isExport() && !$pharmacy_products->CurrentAction) { ?>
<form name="fpharmacy_productslistsrch" id="fpharmacy_productslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($pharmacy_products_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fpharmacy_productslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pharmacy_products">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($pharmacy_products_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($pharmacy_products_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $pharmacy_products_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($pharmacy_products_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_products_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_products_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_products_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $pharmacy_products_list->showPageHeader(); ?>
<?php
$pharmacy_products_list->showMessage();
?>
<?php if ($pharmacy_products_list->TotalRecs > 0 || $pharmacy_products->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pharmacy_products_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pharmacy_products">
<?php if (!$pharmacy_products->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$pharmacy_products->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($pharmacy_products_list->Pager)) $pharmacy_products_list->Pager = new NumericPager($pharmacy_products_list->StartRec, $pharmacy_products_list->DisplayRecs, $pharmacy_products_list->TotalRecs, $pharmacy_products_list->RecRange, $pharmacy_products_list->AutoHidePager) ?>
<?php if ($pharmacy_products_list->Pager->RecordCount > 0 && $pharmacy_products_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($pharmacy_products_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_products_list->pageUrl() ?>start=<?php echo $pharmacy_products_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_products_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_products_list->pageUrl() ?>start=<?php echo $pharmacy_products_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($pharmacy_products_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $pharmacy_products_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_products_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_products_list->pageUrl() ?>start=<?php echo $pharmacy_products_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_products_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_products_list->pageUrl() ?>start=<?php echo $pharmacy_products_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($pharmacy_products_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $pharmacy_products_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $pharmacy_products_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $pharmacy_products_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($pharmacy_products_list->TotalRecs > 0 && (!$pharmacy_products_list->AutoHidePageSizeSelector || $pharmacy_products_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="pharmacy_products">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($pharmacy_products_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($pharmacy_products_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($pharmacy_products_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($pharmacy_products_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($pharmacy_products_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($pharmacy_products_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($pharmacy_products->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_products_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpharmacy_productslist" id="fpharmacy_productslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_products_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_products_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_products">
<div id="gmp_pharmacy_products" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($pharmacy_products_list->TotalRecs > 0 || $pharmacy_products->isGridEdit()) { ?>
<table id="tbl_pharmacy_productslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pharmacy_products_list->RowType = ROWTYPE_HEADER;

// Render list options
$pharmacy_products_list->renderListOptions();

// Render list options (header, left)
$pharmacy_products_list->ListOptions->render("header", "left");
?>
<?php if ($pharmacy_products->ProductCode->Visible) { // ProductCode ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->ProductCode) == "") { ?>
		<th data-name="ProductCode" class="<?php echo $pharmacy_products->ProductCode->headerCellClass() ?>"><div id="elh_pharmacy_products_ProductCode" class="pharmacy_products_ProductCode"><div class="ew-table-header-caption"><?php echo $pharmacy_products->ProductCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProductCode" class="<?php echo $pharmacy_products->ProductCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->ProductCode) ?>',1);"><div id="elh_pharmacy_products_ProductCode" class="pharmacy_products_ProductCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->ProductCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->ProductCode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->ProductCode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->ProductName->Visible) { // ProductName ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->ProductName) == "") { ?>
		<th data-name="ProductName" class="<?php echo $pharmacy_products->ProductName->headerCellClass() ?>"><div id="elh_pharmacy_products_ProductName" class="pharmacy_products_ProductName"><div class="ew-table-header-caption"><?php echo $pharmacy_products->ProductName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProductName" class="<?php echo $pharmacy_products->ProductName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->ProductName) ?>',1);"><div id="elh_pharmacy_products_ProductName" class="pharmacy_products_ProductName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->ProductName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->ProductName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->ProductName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->DivisionCode->Visible) { // DivisionCode ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->DivisionCode) == "") { ?>
		<th data-name="DivisionCode" class="<?php echo $pharmacy_products->DivisionCode->headerCellClass() ?>"><div id="elh_pharmacy_products_DivisionCode" class="pharmacy_products_DivisionCode"><div class="ew-table-header-caption"><?php echo $pharmacy_products->DivisionCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DivisionCode" class="<?php echo $pharmacy_products->DivisionCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->DivisionCode) ?>',1);"><div id="elh_pharmacy_products_DivisionCode" class="pharmacy_products_DivisionCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->DivisionCode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->DivisionCode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->DivisionCode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->ManufacturerCode->Visible) { // ManufacturerCode ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->ManufacturerCode) == "") { ?>
		<th data-name="ManufacturerCode" class="<?php echo $pharmacy_products->ManufacturerCode->headerCellClass() ?>"><div id="elh_pharmacy_products_ManufacturerCode" class="pharmacy_products_ManufacturerCode"><div class="ew-table-header-caption"><?php echo $pharmacy_products->ManufacturerCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ManufacturerCode" class="<?php echo $pharmacy_products->ManufacturerCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->ManufacturerCode) ?>',1);"><div id="elh_pharmacy_products_ManufacturerCode" class="pharmacy_products_ManufacturerCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->ManufacturerCode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->ManufacturerCode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->ManufacturerCode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->SupplierCode->Visible) { // SupplierCode ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->SupplierCode) == "") { ?>
		<th data-name="SupplierCode" class="<?php echo $pharmacy_products->SupplierCode->headerCellClass() ?>"><div id="elh_pharmacy_products_SupplierCode" class="pharmacy_products_SupplierCode"><div class="ew-table-header-caption"><?php echo $pharmacy_products->SupplierCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SupplierCode" class="<?php echo $pharmacy_products->SupplierCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->SupplierCode) ?>',1);"><div id="elh_pharmacy_products_SupplierCode" class="pharmacy_products_SupplierCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->SupplierCode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->SupplierCode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->SupplierCode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->AlternateSupplierCodes->Visible) { // AlternateSupplierCodes ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->AlternateSupplierCodes) == "") { ?>
		<th data-name="AlternateSupplierCodes" class="<?php echo $pharmacy_products->AlternateSupplierCodes->headerCellClass() ?>"><div id="elh_pharmacy_products_AlternateSupplierCodes" class="pharmacy_products_AlternateSupplierCodes"><div class="ew-table-header-caption"><?php echo $pharmacy_products->AlternateSupplierCodes->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AlternateSupplierCodes" class="<?php echo $pharmacy_products->AlternateSupplierCodes->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->AlternateSupplierCodes) ?>',1);"><div id="elh_pharmacy_products_AlternateSupplierCodes" class="pharmacy_products_AlternateSupplierCodes">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->AlternateSupplierCodes->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->AlternateSupplierCodes->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->AlternateSupplierCodes->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->AlternateProductCode->Visible) { // AlternateProductCode ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->AlternateProductCode) == "") { ?>
		<th data-name="AlternateProductCode" class="<?php echo $pharmacy_products->AlternateProductCode->headerCellClass() ?>"><div id="elh_pharmacy_products_AlternateProductCode" class="pharmacy_products_AlternateProductCode"><div class="ew-table-header-caption"><?php echo $pharmacy_products->AlternateProductCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AlternateProductCode" class="<?php echo $pharmacy_products->AlternateProductCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->AlternateProductCode) ?>',1);"><div id="elh_pharmacy_products_AlternateProductCode" class="pharmacy_products_AlternateProductCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->AlternateProductCode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->AlternateProductCode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->AlternateProductCode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->UniversalProductCode->Visible) { // UniversalProductCode ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->UniversalProductCode) == "") { ?>
		<th data-name="UniversalProductCode" class="<?php echo $pharmacy_products->UniversalProductCode->headerCellClass() ?>"><div id="elh_pharmacy_products_UniversalProductCode" class="pharmacy_products_UniversalProductCode"><div class="ew-table-header-caption"><?php echo $pharmacy_products->UniversalProductCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UniversalProductCode" class="<?php echo $pharmacy_products->UniversalProductCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->UniversalProductCode) ?>',1);"><div id="elh_pharmacy_products_UniversalProductCode" class="pharmacy_products_UniversalProductCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->UniversalProductCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->UniversalProductCode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->UniversalProductCode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->BookProductCode->Visible) { // BookProductCode ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->BookProductCode) == "") { ?>
		<th data-name="BookProductCode" class="<?php echo $pharmacy_products->BookProductCode->headerCellClass() ?>"><div id="elh_pharmacy_products_BookProductCode" class="pharmacy_products_BookProductCode"><div class="ew-table-header-caption"><?php echo $pharmacy_products->BookProductCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BookProductCode" class="<?php echo $pharmacy_products->BookProductCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->BookProductCode) ?>',1);"><div id="elh_pharmacy_products_BookProductCode" class="pharmacy_products_BookProductCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->BookProductCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->BookProductCode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->BookProductCode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->OldCode->Visible) { // OldCode ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->OldCode) == "") { ?>
		<th data-name="OldCode" class="<?php echo $pharmacy_products->OldCode->headerCellClass() ?>"><div id="elh_pharmacy_products_OldCode" class="pharmacy_products_OldCode"><div class="ew-table-header-caption"><?php echo $pharmacy_products->OldCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OldCode" class="<?php echo $pharmacy_products->OldCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->OldCode) ?>',1);"><div id="elh_pharmacy_products_OldCode" class="pharmacy_products_OldCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->OldCode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->OldCode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->OldCode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->ProtectedProducts->Visible) { // ProtectedProducts ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->ProtectedProducts) == "") { ?>
		<th data-name="ProtectedProducts" class="<?php echo $pharmacy_products->ProtectedProducts->headerCellClass() ?>"><div id="elh_pharmacy_products_ProtectedProducts" class="pharmacy_products_ProtectedProducts"><div class="ew-table-header-caption"><?php echo $pharmacy_products->ProtectedProducts->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProtectedProducts" class="<?php echo $pharmacy_products->ProtectedProducts->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->ProtectedProducts) ?>',1);"><div id="elh_pharmacy_products_ProtectedProducts" class="pharmacy_products_ProtectedProducts">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->ProtectedProducts->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->ProtectedProducts->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->ProtectedProducts->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->ProductFullName->Visible) { // ProductFullName ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->ProductFullName) == "") { ?>
		<th data-name="ProductFullName" class="<?php echo $pharmacy_products->ProductFullName->headerCellClass() ?>"><div id="elh_pharmacy_products_ProductFullName" class="pharmacy_products_ProductFullName"><div class="ew-table-header-caption"><?php echo $pharmacy_products->ProductFullName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProductFullName" class="<?php echo $pharmacy_products->ProductFullName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->ProductFullName) ?>',1);"><div id="elh_pharmacy_products_ProductFullName" class="pharmacy_products_ProductFullName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->ProductFullName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->ProductFullName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->ProductFullName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->UnitOfMeasure->Visible) { // UnitOfMeasure ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->UnitOfMeasure) == "") { ?>
		<th data-name="UnitOfMeasure" class="<?php echo $pharmacy_products->UnitOfMeasure->headerCellClass() ?>"><div id="elh_pharmacy_products_UnitOfMeasure" class="pharmacy_products_UnitOfMeasure"><div class="ew-table-header-caption"><?php echo $pharmacy_products->UnitOfMeasure->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UnitOfMeasure" class="<?php echo $pharmacy_products->UnitOfMeasure->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->UnitOfMeasure) ?>',1);"><div id="elh_pharmacy_products_UnitOfMeasure" class="pharmacy_products_UnitOfMeasure">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->UnitOfMeasure->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->UnitOfMeasure->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->UnitOfMeasure->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->UnitDescription->Visible) { // UnitDescription ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->UnitDescription) == "") { ?>
		<th data-name="UnitDescription" class="<?php echo $pharmacy_products->UnitDescription->headerCellClass() ?>"><div id="elh_pharmacy_products_UnitDescription" class="pharmacy_products_UnitDescription"><div class="ew-table-header-caption"><?php echo $pharmacy_products->UnitDescription->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UnitDescription" class="<?php echo $pharmacy_products->UnitDescription->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->UnitDescription) ?>',1);"><div id="elh_pharmacy_products_UnitDescription" class="pharmacy_products_UnitDescription">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->UnitDescription->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->UnitDescription->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->UnitDescription->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->BulkDescription->Visible) { // BulkDescription ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->BulkDescription) == "") { ?>
		<th data-name="BulkDescription" class="<?php echo $pharmacy_products->BulkDescription->headerCellClass() ?>"><div id="elh_pharmacy_products_BulkDescription" class="pharmacy_products_BulkDescription"><div class="ew-table-header-caption"><?php echo $pharmacy_products->BulkDescription->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BulkDescription" class="<?php echo $pharmacy_products->BulkDescription->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->BulkDescription) ?>',1);"><div id="elh_pharmacy_products_BulkDescription" class="pharmacy_products_BulkDescription">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->BulkDescription->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->BulkDescription->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->BulkDescription->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->BarCodeDescription->Visible) { // BarCodeDescription ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->BarCodeDescription) == "") { ?>
		<th data-name="BarCodeDescription" class="<?php echo $pharmacy_products->BarCodeDescription->headerCellClass() ?>"><div id="elh_pharmacy_products_BarCodeDescription" class="pharmacy_products_BarCodeDescription"><div class="ew-table-header-caption"><?php echo $pharmacy_products->BarCodeDescription->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BarCodeDescription" class="<?php echo $pharmacy_products->BarCodeDescription->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->BarCodeDescription) ?>',1);"><div id="elh_pharmacy_products_BarCodeDescription" class="pharmacy_products_BarCodeDescription">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->BarCodeDescription->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->BarCodeDescription->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->BarCodeDescription->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->PackageInformation->Visible) { // PackageInformation ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->PackageInformation) == "") { ?>
		<th data-name="PackageInformation" class="<?php echo $pharmacy_products->PackageInformation->headerCellClass() ?>"><div id="elh_pharmacy_products_PackageInformation" class="pharmacy_products_PackageInformation"><div class="ew-table-header-caption"><?php echo $pharmacy_products->PackageInformation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PackageInformation" class="<?php echo $pharmacy_products->PackageInformation->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->PackageInformation) ?>',1);"><div id="elh_pharmacy_products_PackageInformation" class="pharmacy_products_PackageInformation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->PackageInformation->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->PackageInformation->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->PackageInformation->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->PackageId->Visible) { // PackageId ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->PackageId) == "") { ?>
		<th data-name="PackageId" class="<?php echo $pharmacy_products->PackageId->headerCellClass() ?>"><div id="elh_pharmacy_products_PackageId" class="pharmacy_products_PackageId"><div class="ew-table-header-caption"><?php echo $pharmacy_products->PackageId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PackageId" class="<?php echo $pharmacy_products->PackageId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->PackageId) ?>',1);"><div id="elh_pharmacy_products_PackageId" class="pharmacy_products_PackageId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->PackageId->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->PackageId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->PackageId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->Weight->Visible) { // Weight ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->Weight) == "") { ?>
		<th data-name="Weight" class="<?php echo $pharmacy_products->Weight->headerCellClass() ?>"><div id="elh_pharmacy_products_Weight" class="pharmacy_products_Weight"><div class="ew-table-header-caption"><?php echo $pharmacy_products->Weight->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Weight" class="<?php echo $pharmacy_products->Weight->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->Weight) ?>',1);"><div id="elh_pharmacy_products_Weight" class="pharmacy_products_Weight">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->Weight->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->Weight->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->Weight->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->AllowFractions->Visible) { // AllowFractions ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->AllowFractions) == "") { ?>
		<th data-name="AllowFractions" class="<?php echo $pharmacy_products->AllowFractions->headerCellClass() ?>"><div id="elh_pharmacy_products_AllowFractions" class="pharmacy_products_AllowFractions"><div class="ew-table-header-caption"><?php echo $pharmacy_products->AllowFractions->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AllowFractions" class="<?php echo $pharmacy_products->AllowFractions->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->AllowFractions) ?>',1);"><div id="elh_pharmacy_products_AllowFractions" class="pharmacy_products_AllowFractions">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->AllowFractions->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->AllowFractions->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->AllowFractions->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->MinimumStockLevel->Visible) { // MinimumStockLevel ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->MinimumStockLevel) == "") { ?>
		<th data-name="MinimumStockLevel" class="<?php echo $pharmacy_products->MinimumStockLevel->headerCellClass() ?>"><div id="elh_pharmacy_products_MinimumStockLevel" class="pharmacy_products_MinimumStockLevel"><div class="ew-table-header-caption"><?php echo $pharmacy_products->MinimumStockLevel->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MinimumStockLevel" class="<?php echo $pharmacy_products->MinimumStockLevel->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->MinimumStockLevel) ?>',1);"><div id="elh_pharmacy_products_MinimumStockLevel" class="pharmacy_products_MinimumStockLevel">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->MinimumStockLevel->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->MinimumStockLevel->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->MinimumStockLevel->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->MaximumStockLevel->Visible) { // MaximumStockLevel ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->MaximumStockLevel) == "") { ?>
		<th data-name="MaximumStockLevel" class="<?php echo $pharmacy_products->MaximumStockLevel->headerCellClass() ?>"><div id="elh_pharmacy_products_MaximumStockLevel" class="pharmacy_products_MaximumStockLevel"><div class="ew-table-header-caption"><?php echo $pharmacy_products->MaximumStockLevel->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MaximumStockLevel" class="<?php echo $pharmacy_products->MaximumStockLevel->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->MaximumStockLevel) ?>',1);"><div id="elh_pharmacy_products_MaximumStockLevel" class="pharmacy_products_MaximumStockLevel">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->MaximumStockLevel->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->MaximumStockLevel->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->MaximumStockLevel->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->ReorderLevel->Visible) { // ReorderLevel ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->ReorderLevel) == "") { ?>
		<th data-name="ReorderLevel" class="<?php echo $pharmacy_products->ReorderLevel->headerCellClass() ?>"><div id="elh_pharmacy_products_ReorderLevel" class="pharmacy_products_ReorderLevel"><div class="ew-table-header-caption"><?php echo $pharmacy_products->ReorderLevel->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReorderLevel" class="<?php echo $pharmacy_products->ReorderLevel->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->ReorderLevel) ?>',1);"><div id="elh_pharmacy_products_ReorderLevel" class="pharmacy_products_ReorderLevel">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->ReorderLevel->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->ReorderLevel->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->ReorderLevel->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->MinMaxRatio->Visible) { // MinMaxRatio ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->MinMaxRatio) == "") { ?>
		<th data-name="MinMaxRatio" class="<?php echo $pharmacy_products->MinMaxRatio->headerCellClass() ?>"><div id="elh_pharmacy_products_MinMaxRatio" class="pharmacy_products_MinMaxRatio"><div class="ew-table-header-caption"><?php echo $pharmacy_products->MinMaxRatio->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MinMaxRatio" class="<?php echo $pharmacy_products->MinMaxRatio->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->MinMaxRatio) ?>',1);"><div id="elh_pharmacy_products_MinMaxRatio" class="pharmacy_products_MinMaxRatio">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->MinMaxRatio->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->MinMaxRatio->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->MinMaxRatio->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->AutoMinMaxRatio->Visible) { // AutoMinMaxRatio ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->AutoMinMaxRatio) == "") { ?>
		<th data-name="AutoMinMaxRatio" class="<?php echo $pharmacy_products->AutoMinMaxRatio->headerCellClass() ?>"><div id="elh_pharmacy_products_AutoMinMaxRatio" class="pharmacy_products_AutoMinMaxRatio"><div class="ew-table-header-caption"><?php echo $pharmacy_products->AutoMinMaxRatio->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AutoMinMaxRatio" class="<?php echo $pharmacy_products->AutoMinMaxRatio->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->AutoMinMaxRatio) ?>',1);"><div id="elh_pharmacy_products_AutoMinMaxRatio" class="pharmacy_products_AutoMinMaxRatio">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->AutoMinMaxRatio->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->AutoMinMaxRatio->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->AutoMinMaxRatio->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->ScheduleCode->Visible) { // ScheduleCode ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->ScheduleCode) == "") { ?>
		<th data-name="ScheduleCode" class="<?php echo $pharmacy_products->ScheduleCode->headerCellClass() ?>"><div id="elh_pharmacy_products_ScheduleCode" class="pharmacy_products_ScheduleCode"><div class="ew-table-header-caption"><?php echo $pharmacy_products->ScheduleCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ScheduleCode" class="<?php echo $pharmacy_products->ScheduleCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->ScheduleCode) ?>',1);"><div id="elh_pharmacy_products_ScheduleCode" class="pharmacy_products_ScheduleCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->ScheduleCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->ScheduleCode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->ScheduleCode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->RopRatio->Visible) { // RopRatio ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->RopRatio) == "") { ?>
		<th data-name="RopRatio" class="<?php echo $pharmacy_products->RopRatio->headerCellClass() ?>"><div id="elh_pharmacy_products_RopRatio" class="pharmacy_products_RopRatio"><div class="ew-table-header-caption"><?php echo $pharmacy_products->RopRatio->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RopRatio" class="<?php echo $pharmacy_products->RopRatio->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->RopRatio) ?>',1);"><div id="elh_pharmacy_products_RopRatio" class="pharmacy_products_RopRatio">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->RopRatio->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->RopRatio->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->RopRatio->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->MRP->Visible) { // MRP ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->MRP) == "") { ?>
		<th data-name="MRP" class="<?php echo $pharmacy_products->MRP->headerCellClass() ?>"><div id="elh_pharmacy_products_MRP" class="pharmacy_products_MRP"><div class="ew-table-header-caption"><?php echo $pharmacy_products->MRP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MRP" class="<?php echo $pharmacy_products->MRP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->MRP) ?>',1);"><div id="elh_pharmacy_products_MRP" class="pharmacy_products_MRP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->MRP->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->MRP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->MRP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->PurchasePrice->Visible) { // PurchasePrice ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->PurchasePrice) == "") { ?>
		<th data-name="PurchasePrice" class="<?php echo $pharmacy_products->PurchasePrice->headerCellClass() ?>"><div id="elh_pharmacy_products_PurchasePrice" class="pharmacy_products_PurchasePrice"><div class="ew-table-header-caption"><?php echo $pharmacy_products->PurchasePrice->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PurchasePrice" class="<?php echo $pharmacy_products->PurchasePrice->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->PurchasePrice) ?>',1);"><div id="elh_pharmacy_products_PurchasePrice" class="pharmacy_products_PurchasePrice">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->PurchasePrice->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->PurchasePrice->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->PurchasePrice->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->PurchaseUnit->Visible) { // PurchaseUnit ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->PurchaseUnit) == "") { ?>
		<th data-name="PurchaseUnit" class="<?php echo $pharmacy_products->PurchaseUnit->headerCellClass() ?>"><div id="elh_pharmacy_products_PurchaseUnit" class="pharmacy_products_PurchaseUnit"><div class="ew-table-header-caption"><?php echo $pharmacy_products->PurchaseUnit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PurchaseUnit" class="<?php echo $pharmacy_products->PurchaseUnit->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->PurchaseUnit) ?>',1);"><div id="elh_pharmacy_products_PurchaseUnit" class="pharmacy_products_PurchaseUnit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->PurchaseUnit->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->PurchaseUnit->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->PurchaseUnit->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->PurchaseTaxCode->Visible) { // PurchaseTaxCode ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->PurchaseTaxCode) == "") { ?>
		<th data-name="PurchaseTaxCode" class="<?php echo $pharmacy_products->PurchaseTaxCode->headerCellClass() ?>"><div id="elh_pharmacy_products_PurchaseTaxCode" class="pharmacy_products_PurchaseTaxCode"><div class="ew-table-header-caption"><?php echo $pharmacy_products->PurchaseTaxCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PurchaseTaxCode" class="<?php echo $pharmacy_products->PurchaseTaxCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->PurchaseTaxCode) ?>',1);"><div id="elh_pharmacy_products_PurchaseTaxCode" class="pharmacy_products_PurchaseTaxCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->PurchaseTaxCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->PurchaseTaxCode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->PurchaseTaxCode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->AllowDirectInward->Visible) { // AllowDirectInward ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->AllowDirectInward) == "") { ?>
		<th data-name="AllowDirectInward" class="<?php echo $pharmacy_products->AllowDirectInward->headerCellClass() ?>"><div id="elh_pharmacy_products_AllowDirectInward" class="pharmacy_products_AllowDirectInward"><div class="ew-table-header-caption"><?php echo $pharmacy_products->AllowDirectInward->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AllowDirectInward" class="<?php echo $pharmacy_products->AllowDirectInward->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->AllowDirectInward) ?>',1);"><div id="elh_pharmacy_products_AllowDirectInward" class="pharmacy_products_AllowDirectInward">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->AllowDirectInward->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->AllowDirectInward->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->AllowDirectInward->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->SalePrice->Visible) { // SalePrice ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->SalePrice) == "") { ?>
		<th data-name="SalePrice" class="<?php echo $pharmacy_products->SalePrice->headerCellClass() ?>"><div id="elh_pharmacy_products_SalePrice" class="pharmacy_products_SalePrice"><div class="ew-table-header-caption"><?php echo $pharmacy_products->SalePrice->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SalePrice" class="<?php echo $pharmacy_products->SalePrice->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->SalePrice) ?>',1);"><div id="elh_pharmacy_products_SalePrice" class="pharmacy_products_SalePrice">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->SalePrice->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->SalePrice->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->SalePrice->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->SaleUnit->Visible) { // SaleUnit ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->SaleUnit) == "") { ?>
		<th data-name="SaleUnit" class="<?php echo $pharmacy_products->SaleUnit->headerCellClass() ?>"><div id="elh_pharmacy_products_SaleUnit" class="pharmacy_products_SaleUnit"><div class="ew-table-header-caption"><?php echo $pharmacy_products->SaleUnit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SaleUnit" class="<?php echo $pharmacy_products->SaleUnit->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->SaleUnit) ?>',1);"><div id="elh_pharmacy_products_SaleUnit" class="pharmacy_products_SaleUnit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->SaleUnit->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->SaleUnit->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->SaleUnit->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->SalesTaxCode->Visible) { // SalesTaxCode ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->SalesTaxCode) == "") { ?>
		<th data-name="SalesTaxCode" class="<?php echo $pharmacy_products->SalesTaxCode->headerCellClass() ?>"><div id="elh_pharmacy_products_SalesTaxCode" class="pharmacy_products_SalesTaxCode"><div class="ew-table-header-caption"><?php echo $pharmacy_products->SalesTaxCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SalesTaxCode" class="<?php echo $pharmacy_products->SalesTaxCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->SalesTaxCode) ?>',1);"><div id="elh_pharmacy_products_SalesTaxCode" class="pharmacy_products_SalesTaxCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->SalesTaxCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->SalesTaxCode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->SalesTaxCode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->StockReceived->Visible) { // StockReceived ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->StockReceived) == "") { ?>
		<th data-name="StockReceived" class="<?php echo $pharmacy_products->StockReceived->headerCellClass() ?>"><div id="elh_pharmacy_products_StockReceived" class="pharmacy_products_StockReceived"><div class="ew-table-header-caption"><?php echo $pharmacy_products->StockReceived->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StockReceived" class="<?php echo $pharmacy_products->StockReceived->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->StockReceived) ?>',1);"><div id="elh_pharmacy_products_StockReceived" class="pharmacy_products_StockReceived">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->StockReceived->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->StockReceived->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->StockReceived->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->TotalStock->Visible) { // TotalStock ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->TotalStock) == "") { ?>
		<th data-name="TotalStock" class="<?php echo $pharmacy_products->TotalStock->headerCellClass() ?>"><div id="elh_pharmacy_products_TotalStock" class="pharmacy_products_TotalStock"><div class="ew-table-header-caption"><?php echo $pharmacy_products->TotalStock->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TotalStock" class="<?php echo $pharmacy_products->TotalStock->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->TotalStock) ?>',1);"><div id="elh_pharmacy_products_TotalStock" class="pharmacy_products_TotalStock">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->TotalStock->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->TotalStock->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->TotalStock->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->StockType->Visible) { // StockType ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->StockType) == "") { ?>
		<th data-name="StockType" class="<?php echo $pharmacy_products->StockType->headerCellClass() ?>"><div id="elh_pharmacy_products_StockType" class="pharmacy_products_StockType"><div class="ew-table-header-caption"><?php echo $pharmacy_products->StockType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StockType" class="<?php echo $pharmacy_products->StockType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->StockType) ?>',1);"><div id="elh_pharmacy_products_StockType" class="pharmacy_products_StockType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->StockType->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->StockType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->StockType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->StockCheckDate->Visible) { // StockCheckDate ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->StockCheckDate) == "") { ?>
		<th data-name="StockCheckDate" class="<?php echo $pharmacy_products->StockCheckDate->headerCellClass() ?>"><div id="elh_pharmacy_products_StockCheckDate" class="pharmacy_products_StockCheckDate"><div class="ew-table-header-caption"><?php echo $pharmacy_products->StockCheckDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StockCheckDate" class="<?php echo $pharmacy_products->StockCheckDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->StockCheckDate) ?>',1);"><div id="elh_pharmacy_products_StockCheckDate" class="pharmacy_products_StockCheckDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->StockCheckDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->StockCheckDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->StockCheckDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->StockAdjustmentDate->Visible) { // StockAdjustmentDate ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->StockAdjustmentDate) == "") { ?>
		<th data-name="StockAdjustmentDate" class="<?php echo $pharmacy_products->StockAdjustmentDate->headerCellClass() ?>"><div id="elh_pharmacy_products_StockAdjustmentDate" class="pharmacy_products_StockAdjustmentDate"><div class="ew-table-header-caption"><?php echo $pharmacy_products->StockAdjustmentDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StockAdjustmentDate" class="<?php echo $pharmacy_products->StockAdjustmentDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->StockAdjustmentDate) ?>',1);"><div id="elh_pharmacy_products_StockAdjustmentDate" class="pharmacy_products_StockAdjustmentDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->StockAdjustmentDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->StockAdjustmentDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->StockAdjustmentDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->Remarks->Visible) { // Remarks ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->Remarks) == "") { ?>
		<th data-name="Remarks" class="<?php echo $pharmacy_products->Remarks->headerCellClass() ?>"><div id="elh_pharmacy_products_Remarks" class="pharmacy_products_Remarks"><div class="ew-table-header-caption"><?php echo $pharmacy_products->Remarks->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Remarks" class="<?php echo $pharmacy_products->Remarks->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->Remarks) ?>',1);"><div id="elh_pharmacy_products_Remarks" class="pharmacy_products_Remarks">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->Remarks->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->Remarks->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->Remarks->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->CostCentre->Visible) { // CostCentre ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->CostCentre) == "") { ?>
		<th data-name="CostCentre" class="<?php echo $pharmacy_products->CostCentre->headerCellClass() ?>"><div id="elh_pharmacy_products_CostCentre" class="pharmacy_products_CostCentre"><div class="ew-table-header-caption"><?php echo $pharmacy_products->CostCentre->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CostCentre" class="<?php echo $pharmacy_products->CostCentre->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->CostCentre) ?>',1);"><div id="elh_pharmacy_products_CostCentre" class="pharmacy_products_CostCentre">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->CostCentre->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->CostCentre->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->CostCentre->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->ProductType->Visible) { // ProductType ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->ProductType) == "") { ?>
		<th data-name="ProductType" class="<?php echo $pharmacy_products->ProductType->headerCellClass() ?>"><div id="elh_pharmacy_products_ProductType" class="pharmacy_products_ProductType"><div class="ew-table-header-caption"><?php echo $pharmacy_products->ProductType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProductType" class="<?php echo $pharmacy_products->ProductType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->ProductType) ?>',1);"><div id="elh_pharmacy_products_ProductType" class="pharmacy_products_ProductType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->ProductType->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->ProductType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->ProductType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->TaxAmount->Visible) { // TaxAmount ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->TaxAmount) == "") { ?>
		<th data-name="TaxAmount" class="<?php echo $pharmacy_products->TaxAmount->headerCellClass() ?>"><div id="elh_pharmacy_products_TaxAmount" class="pharmacy_products_TaxAmount"><div class="ew-table-header-caption"><?php echo $pharmacy_products->TaxAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TaxAmount" class="<?php echo $pharmacy_products->TaxAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->TaxAmount) ?>',1);"><div id="elh_pharmacy_products_TaxAmount" class="pharmacy_products_TaxAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->TaxAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->TaxAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->TaxAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->TaxId->Visible) { // TaxId ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->TaxId) == "") { ?>
		<th data-name="TaxId" class="<?php echo $pharmacy_products->TaxId->headerCellClass() ?>"><div id="elh_pharmacy_products_TaxId" class="pharmacy_products_TaxId"><div class="ew-table-header-caption"><?php echo $pharmacy_products->TaxId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TaxId" class="<?php echo $pharmacy_products->TaxId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->TaxId) ?>',1);"><div id="elh_pharmacy_products_TaxId" class="pharmacy_products_TaxId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->TaxId->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->TaxId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->TaxId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->ResaleTaxApplicable->Visible) { // ResaleTaxApplicable ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->ResaleTaxApplicable) == "") { ?>
		<th data-name="ResaleTaxApplicable" class="<?php echo $pharmacy_products->ResaleTaxApplicable->headerCellClass() ?>"><div id="elh_pharmacy_products_ResaleTaxApplicable" class="pharmacy_products_ResaleTaxApplicable"><div class="ew-table-header-caption"><?php echo $pharmacy_products->ResaleTaxApplicable->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ResaleTaxApplicable" class="<?php echo $pharmacy_products->ResaleTaxApplicable->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->ResaleTaxApplicable) ?>',1);"><div id="elh_pharmacy_products_ResaleTaxApplicable" class="pharmacy_products_ResaleTaxApplicable">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->ResaleTaxApplicable->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->ResaleTaxApplicable->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->ResaleTaxApplicable->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->CstOtherTax->Visible) { // CstOtherTax ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->CstOtherTax) == "") { ?>
		<th data-name="CstOtherTax" class="<?php echo $pharmacy_products->CstOtherTax->headerCellClass() ?>"><div id="elh_pharmacy_products_CstOtherTax" class="pharmacy_products_CstOtherTax"><div class="ew-table-header-caption"><?php echo $pharmacy_products->CstOtherTax->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CstOtherTax" class="<?php echo $pharmacy_products->CstOtherTax->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->CstOtherTax) ?>',1);"><div id="elh_pharmacy_products_CstOtherTax" class="pharmacy_products_CstOtherTax">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->CstOtherTax->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->CstOtherTax->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->CstOtherTax->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->TotalTax->Visible) { // TotalTax ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->TotalTax) == "") { ?>
		<th data-name="TotalTax" class="<?php echo $pharmacy_products->TotalTax->headerCellClass() ?>"><div id="elh_pharmacy_products_TotalTax" class="pharmacy_products_TotalTax"><div class="ew-table-header-caption"><?php echo $pharmacy_products->TotalTax->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TotalTax" class="<?php echo $pharmacy_products->TotalTax->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->TotalTax) ?>',1);"><div id="elh_pharmacy_products_TotalTax" class="pharmacy_products_TotalTax">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->TotalTax->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->TotalTax->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->TotalTax->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->ItemCost->Visible) { // ItemCost ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->ItemCost) == "") { ?>
		<th data-name="ItemCost" class="<?php echo $pharmacy_products->ItemCost->headerCellClass() ?>"><div id="elh_pharmacy_products_ItemCost" class="pharmacy_products_ItemCost"><div class="ew-table-header-caption"><?php echo $pharmacy_products->ItemCost->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ItemCost" class="<?php echo $pharmacy_products->ItemCost->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->ItemCost) ?>',1);"><div id="elh_pharmacy_products_ItemCost" class="pharmacy_products_ItemCost">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->ItemCost->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->ItemCost->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->ItemCost->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->ExpiryDate->Visible) { // ExpiryDate ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->ExpiryDate) == "") { ?>
		<th data-name="ExpiryDate" class="<?php echo $pharmacy_products->ExpiryDate->headerCellClass() ?>"><div id="elh_pharmacy_products_ExpiryDate" class="pharmacy_products_ExpiryDate"><div class="ew-table-header-caption"><?php echo $pharmacy_products->ExpiryDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ExpiryDate" class="<?php echo $pharmacy_products->ExpiryDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->ExpiryDate) ?>',1);"><div id="elh_pharmacy_products_ExpiryDate" class="pharmacy_products_ExpiryDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->ExpiryDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->ExpiryDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->ExpiryDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->BatchDescription->Visible) { // BatchDescription ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->BatchDescription) == "") { ?>
		<th data-name="BatchDescription" class="<?php echo $pharmacy_products->BatchDescription->headerCellClass() ?>"><div id="elh_pharmacy_products_BatchDescription" class="pharmacy_products_BatchDescription"><div class="ew-table-header-caption"><?php echo $pharmacy_products->BatchDescription->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BatchDescription" class="<?php echo $pharmacy_products->BatchDescription->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->BatchDescription) ?>',1);"><div id="elh_pharmacy_products_BatchDescription" class="pharmacy_products_BatchDescription">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->BatchDescription->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->BatchDescription->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->BatchDescription->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->FreeScheme->Visible) { // FreeScheme ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->FreeScheme) == "") { ?>
		<th data-name="FreeScheme" class="<?php echo $pharmacy_products->FreeScheme->headerCellClass() ?>"><div id="elh_pharmacy_products_FreeScheme" class="pharmacy_products_FreeScheme"><div class="ew-table-header-caption"><?php echo $pharmacy_products->FreeScheme->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FreeScheme" class="<?php echo $pharmacy_products->FreeScheme->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->FreeScheme) ?>',1);"><div id="elh_pharmacy_products_FreeScheme" class="pharmacy_products_FreeScheme">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->FreeScheme->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->FreeScheme->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->FreeScheme->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->CashDiscountEligibility->Visible) { // CashDiscountEligibility ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->CashDiscountEligibility) == "") { ?>
		<th data-name="CashDiscountEligibility" class="<?php echo $pharmacy_products->CashDiscountEligibility->headerCellClass() ?>"><div id="elh_pharmacy_products_CashDiscountEligibility" class="pharmacy_products_CashDiscountEligibility"><div class="ew-table-header-caption"><?php echo $pharmacy_products->CashDiscountEligibility->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CashDiscountEligibility" class="<?php echo $pharmacy_products->CashDiscountEligibility->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->CashDiscountEligibility) ?>',1);"><div id="elh_pharmacy_products_CashDiscountEligibility" class="pharmacy_products_CashDiscountEligibility">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->CashDiscountEligibility->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->CashDiscountEligibility->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->CashDiscountEligibility->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->DiscountPerAllowInBill->Visible) { // DiscountPerAllowInBill ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->DiscountPerAllowInBill) == "") { ?>
		<th data-name="DiscountPerAllowInBill" class="<?php echo $pharmacy_products->DiscountPerAllowInBill->headerCellClass() ?>"><div id="elh_pharmacy_products_DiscountPerAllowInBill" class="pharmacy_products_DiscountPerAllowInBill"><div class="ew-table-header-caption"><?php echo $pharmacy_products->DiscountPerAllowInBill->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DiscountPerAllowInBill" class="<?php echo $pharmacy_products->DiscountPerAllowInBill->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->DiscountPerAllowInBill) ?>',1);"><div id="elh_pharmacy_products_DiscountPerAllowInBill" class="pharmacy_products_DiscountPerAllowInBill">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->DiscountPerAllowInBill->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->DiscountPerAllowInBill->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->DiscountPerAllowInBill->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->Discount->Visible) { // Discount ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->Discount) == "") { ?>
		<th data-name="Discount" class="<?php echo $pharmacy_products->Discount->headerCellClass() ?>"><div id="elh_pharmacy_products_Discount" class="pharmacy_products_Discount"><div class="ew-table-header-caption"><?php echo $pharmacy_products->Discount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Discount" class="<?php echo $pharmacy_products->Discount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->Discount) ?>',1);"><div id="elh_pharmacy_products_Discount" class="pharmacy_products_Discount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->Discount->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->Discount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->Discount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->TotalAmount->Visible) { // TotalAmount ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->TotalAmount) == "") { ?>
		<th data-name="TotalAmount" class="<?php echo $pharmacy_products->TotalAmount->headerCellClass() ?>"><div id="elh_pharmacy_products_TotalAmount" class="pharmacy_products_TotalAmount"><div class="ew-table-header-caption"><?php echo $pharmacy_products->TotalAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TotalAmount" class="<?php echo $pharmacy_products->TotalAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->TotalAmount) ?>',1);"><div id="elh_pharmacy_products_TotalAmount" class="pharmacy_products_TotalAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->TotalAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->TotalAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->TotalAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->StandardMargin->Visible) { // StandardMargin ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->StandardMargin) == "") { ?>
		<th data-name="StandardMargin" class="<?php echo $pharmacy_products->StandardMargin->headerCellClass() ?>"><div id="elh_pharmacy_products_StandardMargin" class="pharmacy_products_StandardMargin"><div class="ew-table-header-caption"><?php echo $pharmacy_products->StandardMargin->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StandardMargin" class="<?php echo $pharmacy_products->StandardMargin->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->StandardMargin) ?>',1);"><div id="elh_pharmacy_products_StandardMargin" class="pharmacy_products_StandardMargin">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->StandardMargin->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->StandardMargin->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->StandardMargin->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->Margin->Visible) { // Margin ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->Margin) == "") { ?>
		<th data-name="Margin" class="<?php echo $pharmacy_products->Margin->headerCellClass() ?>"><div id="elh_pharmacy_products_Margin" class="pharmacy_products_Margin"><div class="ew-table-header-caption"><?php echo $pharmacy_products->Margin->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Margin" class="<?php echo $pharmacy_products->Margin->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->Margin) ?>',1);"><div id="elh_pharmacy_products_Margin" class="pharmacy_products_Margin">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->Margin->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->Margin->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->Margin->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->MarginId->Visible) { // MarginId ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->MarginId) == "") { ?>
		<th data-name="MarginId" class="<?php echo $pharmacy_products->MarginId->headerCellClass() ?>"><div id="elh_pharmacy_products_MarginId" class="pharmacy_products_MarginId"><div class="ew-table-header-caption"><?php echo $pharmacy_products->MarginId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MarginId" class="<?php echo $pharmacy_products->MarginId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->MarginId) ?>',1);"><div id="elh_pharmacy_products_MarginId" class="pharmacy_products_MarginId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->MarginId->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->MarginId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->MarginId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->ExpectedMargin->Visible) { // ExpectedMargin ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->ExpectedMargin) == "") { ?>
		<th data-name="ExpectedMargin" class="<?php echo $pharmacy_products->ExpectedMargin->headerCellClass() ?>"><div id="elh_pharmacy_products_ExpectedMargin" class="pharmacy_products_ExpectedMargin"><div class="ew-table-header-caption"><?php echo $pharmacy_products->ExpectedMargin->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ExpectedMargin" class="<?php echo $pharmacy_products->ExpectedMargin->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->ExpectedMargin) ?>',1);"><div id="elh_pharmacy_products_ExpectedMargin" class="pharmacy_products_ExpectedMargin">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->ExpectedMargin->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->ExpectedMargin->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->ExpectedMargin->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->SurchargeBeforeTax->Visible) { // SurchargeBeforeTax ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->SurchargeBeforeTax) == "") { ?>
		<th data-name="SurchargeBeforeTax" class="<?php echo $pharmacy_products->SurchargeBeforeTax->headerCellClass() ?>"><div id="elh_pharmacy_products_SurchargeBeforeTax" class="pharmacy_products_SurchargeBeforeTax"><div class="ew-table-header-caption"><?php echo $pharmacy_products->SurchargeBeforeTax->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SurchargeBeforeTax" class="<?php echo $pharmacy_products->SurchargeBeforeTax->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->SurchargeBeforeTax) ?>',1);"><div id="elh_pharmacy_products_SurchargeBeforeTax" class="pharmacy_products_SurchargeBeforeTax">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->SurchargeBeforeTax->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->SurchargeBeforeTax->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->SurchargeBeforeTax->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->SurchargeAfterTax->Visible) { // SurchargeAfterTax ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->SurchargeAfterTax) == "") { ?>
		<th data-name="SurchargeAfterTax" class="<?php echo $pharmacy_products->SurchargeAfterTax->headerCellClass() ?>"><div id="elh_pharmacy_products_SurchargeAfterTax" class="pharmacy_products_SurchargeAfterTax"><div class="ew-table-header-caption"><?php echo $pharmacy_products->SurchargeAfterTax->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SurchargeAfterTax" class="<?php echo $pharmacy_products->SurchargeAfterTax->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->SurchargeAfterTax) ?>',1);"><div id="elh_pharmacy_products_SurchargeAfterTax" class="pharmacy_products_SurchargeAfterTax">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->SurchargeAfterTax->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->SurchargeAfterTax->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->SurchargeAfterTax->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->TempOrderNo->Visible) { // TempOrderNo ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->TempOrderNo) == "") { ?>
		<th data-name="TempOrderNo" class="<?php echo $pharmacy_products->TempOrderNo->headerCellClass() ?>"><div id="elh_pharmacy_products_TempOrderNo" class="pharmacy_products_TempOrderNo"><div class="ew-table-header-caption"><?php echo $pharmacy_products->TempOrderNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TempOrderNo" class="<?php echo $pharmacy_products->TempOrderNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->TempOrderNo) ?>',1);"><div id="elh_pharmacy_products_TempOrderNo" class="pharmacy_products_TempOrderNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->TempOrderNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->TempOrderNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->TempOrderNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->TempOrderDate->Visible) { // TempOrderDate ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->TempOrderDate) == "") { ?>
		<th data-name="TempOrderDate" class="<?php echo $pharmacy_products->TempOrderDate->headerCellClass() ?>"><div id="elh_pharmacy_products_TempOrderDate" class="pharmacy_products_TempOrderDate"><div class="ew-table-header-caption"><?php echo $pharmacy_products->TempOrderDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TempOrderDate" class="<?php echo $pharmacy_products->TempOrderDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->TempOrderDate) ?>',1);"><div id="elh_pharmacy_products_TempOrderDate" class="pharmacy_products_TempOrderDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->TempOrderDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->TempOrderDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->TempOrderDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->OrderUnit->Visible) { // OrderUnit ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->OrderUnit) == "") { ?>
		<th data-name="OrderUnit" class="<?php echo $pharmacy_products->OrderUnit->headerCellClass() ?>"><div id="elh_pharmacy_products_OrderUnit" class="pharmacy_products_OrderUnit"><div class="ew-table-header-caption"><?php echo $pharmacy_products->OrderUnit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OrderUnit" class="<?php echo $pharmacy_products->OrderUnit->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->OrderUnit) ?>',1);"><div id="elh_pharmacy_products_OrderUnit" class="pharmacy_products_OrderUnit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->OrderUnit->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->OrderUnit->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->OrderUnit->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->OrderQuantity->Visible) { // OrderQuantity ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->OrderQuantity) == "") { ?>
		<th data-name="OrderQuantity" class="<?php echo $pharmacy_products->OrderQuantity->headerCellClass() ?>"><div id="elh_pharmacy_products_OrderQuantity" class="pharmacy_products_OrderQuantity"><div class="ew-table-header-caption"><?php echo $pharmacy_products->OrderQuantity->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OrderQuantity" class="<?php echo $pharmacy_products->OrderQuantity->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->OrderQuantity) ?>',1);"><div id="elh_pharmacy_products_OrderQuantity" class="pharmacy_products_OrderQuantity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->OrderQuantity->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->OrderQuantity->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->OrderQuantity->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->MarkForOrder->Visible) { // MarkForOrder ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->MarkForOrder) == "") { ?>
		<th data-name="MarkForOrder" class="<?php echo $pharmacy_products->MarkForOrder->headerCellClass() ?>"><div id="elh_pharmacy_products_MarkForOrder" class="pharmacy_products_MarkForOrder"><div class="ew-table-header-caption"><?php echo $pharmacy_products->MarkForOrder->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MarkForOrder" class="<?php echo $pharmacy_products->MarkForOrder->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->MarkForOrder) ?>',1);"><div id="elh_pharmacy_products_MarkForOrder" class="pharmacy_products_MarkForOrder">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->MarkForOrder->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->MarkForOrder->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->MarkForOrder->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->OrderAllId->Visible) { // OrderAllId ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->OrderAllId) == "") { ?>
		<th data-name="OrderAllId" class="<?php echo $pharmacy_products->OrderAllId->headerCellClass() ?>"><div id="elh_pharmacy_products_OrderAllId" class="pharmacy_products_OrderAllId"><div class="ew-table-header-caption"><?php echo $pharmacy_products->OrderAllId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OrderAllId" class="<?php echo $pharmacy_products->OrderAllId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->OrderAllId) ?>',1);"><div id="elh_pharmacy_products_OrderAllId" class="pharmacy_products_OrderAllId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->OrderAllId->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->OrderAllId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->OrderAllId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->CalculateOrderQty->Visible) { // CalculateOrderQty ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->CalculateOrderQty) == "") { ?>
		<th data-name="CalculateOrderQty" class="<?php echo $pharmacy_products->CalculateOrderQty->headerCellClass() ?>"><div id="elh_pharmacy_products_CalculateOrderQty" class="pharmacy_products_CalculateOrderQty"><div class="ew-table-header-caption"><?php echo $pharmacy_products->CalculateOrderQty->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CalculateOrderQty" class="<?php echo $pharmacy_products->CalculateOrderQty->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->CalculateOrderQty) ?>',1);"><div id="elh_pharmacy_products_CalculateOrderQty" class="pharmacy_products_CalculateOrderQty">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->CalculateOrderQty->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->CalculateOrderQty->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->CalculateOrderQty->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->SubLocation->Visible) { // SubLocation ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->SubLocation) == "") { ?>
		<th data-name="SubLocation" class="<?php echo $pharmacy_products->SubLocation->headerCellClass() ?>"><div id="elh_pharmacy_products_SubLocation" class="pharmacy_products_SubLocation"><div class="ew-table-header-caption"><?php echo $pharmacy_products->SubLocation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SubLocation" class="<?php echo $pharmacy_products->SubLocation->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->SubLocation) ?>',1);"><div id="elh_pharmacy_products_SubLocation" class="pharmacy_products_SubLocation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->SubLocation->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->SubLocation->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->SubLocation->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->CategoryCode->Visible) { // CategoryCode ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->CategoryCode) == "") { ?>
		<th data-name="CategoryCode" class="<?php echo $pharmacy_products->CategoryCode->headerCellClass() ?>"><div id="elh_pharmacy_products_CategoryCode" class="pharmacy_products_CategoryCode"><div class="ew-table-header-caption"><?php echo $pharmacy_products->CategoryCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CategoryCode" class="<?php echo $pharmacy_products->CategoryCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->CategoryCode) ?>',1);"><div id="elh_pharmacy_products_CategoryCode" class="pharmacy_products_CategoryCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->CategoryCode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->CategoryCode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->CategoryCode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->SubCategory->Visible) { // SubCategory ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->SubCategory) == "") { ?>
		<th data-name="SubCategory" class="<?php echo $pharmacy_products->SubCategory->headerCellClass() ?>"><div id="elh_pharmacy_products_SubCategory" class="pharmacy_products_SubCategory"><div class="ew-table-header-caption"><?php echo $pharmacy_products->SubCategory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SubCategory" class="<?php echo $pharmacy_products->SubCategory->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->SubCategory) ?>',1);"><div id="elh_pharmacy_products_SubCategory" class="pharmacy_products_SubCategory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->SubCategory->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->SubCategory->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->SubCategory->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->FlexCategoryCode->Visible) { // FlexCategoryCode ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->FlexCategoryCode) == "") { ?>
		<th data-name="FlexCategoryCode" class="<?php echo $pharmacy_products->FlexCategoryCode->headerCellClass() ?>"><div id="elh_pharmacy_products_FlexCategoryCode" class="pharmacy_products_FlexCategoryCode"><div class="ew-table-header-caption"><?php echo $pharmacy_products->FlexCategoryCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FlexCategoryCode" class="<?php echo $pharmacy_products->FlexCategoryCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->FlexCategoryCode) ?>',1);"><div id="elh_pharmacy_products_FlexCategoryCode" class="pharmacy_products_FlexCategoryCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->FlexCategoryCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->FlexCategoryCode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->FlexCategoryCode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->ABCSaleQty->Visible) { // ABCSaleQty ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->ABCSaleQty) == "") { ?>
		<th data-name="ABCSaleQty" class="<?php echo $pharmacy_products->ABCSaleQty->headerCellClass() ?>"><div id="elh_pharmacy_products_ABCSaleQty" class="pharmacy_products_ABCSaleQty"><div class="ew-table-header-caption"><?php echo $pharmacy_products->ABCSaleQty->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ABCSaleQty" class="<?php echo $pharmacy_products->ABCSaleQty->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->ABCSaleQty) ?>',1);"><div id="elh_pharmacy_products_ABCSaleQty" class="pharmacy_products_ABCSaleQty">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->ABCSaleQty->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->ABCSaleQty->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->ABCSaleQty->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->ABCSaleValue->Visible) { // ABCSaleValue ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->ABCSaleValue) == "") { ?>
		<th data-name="ABCSaleValue" class="<?php echo $pharmacy_products->ABCSaleValue->headerCellClass() ?>"><div id="elh_pharmacy_products_ABCSaleValue" class="pharmacy_products_ABCSaleValue"><div class="ew-table-header-caption"><?php echo $pharmacy_products->ABCSaleValue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ABCSaleValue" class="<?php echo $pharmacy_products->ABCSaleValue->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->ABCSaleValue) ?>',1);"><div id="elh_pharmacy_products_ABCSaleValue" class="pharmacy_products_ABCSaleValue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->ABCSaleValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->ABCSaleValue->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->ABCSaleValue->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->ConvertionFactor->Visible) { // ConvertionFactor ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->ConvertionFactor) == "") { ?>
		<th data-name="ConvertionFactor" class="<?php echo $pharmacy_products->ConvertionFactor->headerCellClass() ?>"><div id="elh_pharmacy_products_ConvertionFactor" class="pharmacy_products_ConvertionFactor"><div class="ew-table-header-caption"><?php echo $pharmacy_products->ConvertionFactor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ConvertionFactor" class="<?php echo $pharmacy_products->ConvertionFactor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->ConvertionFactor) ?>',1);"><div id="elh_pharmacy_products_ConvertionFactor" class="pharmacy_products_ConvertionFactor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->ConvertionFactor->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->ConvertionFactor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->ConvertionFactor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->ConvertionUnitDesc->Visible) { // ConvertionUnitDesc ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->ConvertionUnitDesc) == "") { ?>
		<th data-name="ConvertionUnitDesc" class="<?php echo $pharmacy_products->ConvertionUnitDesc->headerCellClass() ?>"><div id="elh_pharmacy_products_ConvertionUnitDesc" class="pharmacy_products_ConvertionUnitDesc"><div class="ew-table-header-caption"><?php echo $pharmacy_products->ConvertionUnitDesc->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ConvertionUnitDesc" class="<?php echo $pharmacy_products->ConvertionUnitDesc->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->ConvertionUnitDesc) ?>',1);"><div id="elh_pharmacy_products_ConvertionUnitDesc" class="pharmacy_products_ConvertionUnitDesc">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->ConvertionUnitDesc->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->ConvertionUnitDesc->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->ConvertionUnitDesc->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->TransactionId->Visible) { // TransactionId ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->TransactionId) == "") { ?>
		<th data-name="TransactionId" class="<?php echo $pharmacy_products->TransactionId->headerCellClass() ?>"><div id="elh_pharmacy_products_TransactionId" class="pharmacy_products_TransactionId"><div class="ew-table-header-caption"><?php echo $pharmacy_products->TransactionId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TransactionId" class="<?php echo $pharmacy_products->TransactionId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->TransactionId) ?>',1);"><div id="elh_pharmacy_products_TransactionId" class="pharmacy_products_TransactionId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->TransactionId->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->TransactionId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->TransactionId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->SoldProductId->Visible) { // SoldProductId ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->SoldProductId) == "") { ?>
		<th data-name="SoldProductId" class="<?php echo $pharmacy_products->SoldProductId->headerCellClass() ?>"><div id="elh_pharmacy_products_SoldProductId" class="pharmacy_products_SoldProductId"><div class="ew-table-header-caption"><?php echo $pharmacy_products->SoldProductId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SoldProductId" class="<?php echo $pharmacy_products->SoldProductId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->SoldProductId) ?>',1);"><div id="elh_pharmacy_products_SoldProductId" class="pharmacy_products_SoldProductId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->SoldProductId->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->SoldProductId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->SoldProductId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->WantedBookId->Visible) { // WantedBookId ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->WantedBookId) == "") { ?>
		<th data-name="WantedBookId" class="<?php echo $pharmacy_products->WantedBookId->headerCellClass() ?>"><div id="elh_pharmacy_products_WantedBookId" class="pharmacy_products_WantedBookId"><div class="ew-table-header-caption"><?php echo $pharmacy_products->WantedBookId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="WantedBookId" class="<?php echo $pharmacy_products->WantedBookId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->WantedBookId) ?>',1);"><div id="elh_pharmacy_products_WantedBookId" class="pharmacy_products_WantedBookId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->WantedBookId->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->WantedBookId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->WantedBookId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->AllId->Visible) { // AllId ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->AllId) == "") { ?>
		<th data-name="AllId" class="<?php echo $pharmacy_products->AllId->headerCellClass() ?>"><div id="elh_pharmacy_products_AllId" class="pharmacy_products_AllId"><div class="ew-table-header-caption"><?php echo $pharmacy_products->AllId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AllId" class="<?php echo $pharmacy_products->AllId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->AllId) ?>',1);"><div id="elh_pharmacy_products_AllId" class="pharmacy_products_AllId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->AllId->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->AllId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->AllId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->BatchAndExpiryCompulsory->Visible) { // BatchAndExpiryCompulsory ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->BatchAndExpiryCompulsory) == "") { ?>
		<th data-name="BatchAndExpiryCompulsory" class="<?php echo $pharmacy_products->BatchAndExpiryCompulsory->headerCellClass() ?>"><div id="elh_pharmacy_products_BatchAndExpiryCompulsory" class="pharmacy_products_BatchAndExpiryCompulsory"><div class="ew-table-header-caption"><?php echo $pharmacy_products->BatchAndExpiryCompulsory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BatchAndExpiryCompulsory" class="<?php echo $pharmacy_products->BatchAndExpiryCompulsory->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->BatchAndExpiryCompulsory) ?>',1);"><div id="elh_pharmacy_products_BatchAndExpiryCompulsory" class="pharmacy_products_BatchAndExpiryCompulsory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->BatchAndExpiryCompulsory->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->BatchAndExpiryCompulsory->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->BatchAndExpiryCompulsory->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->BatchStockForWantedBook->Visible) { // BatchStockForWantedBook ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->BatchStockForWantedBook) == "") { ?>
		<th data-name="BatchStockForWantedBook" class="<?php echo $pharmacy_products->BatchStockForWantedBook->headerCellClass() ?>"><div id="elh_pharmacy_products_BatchStockForWantedBook" class="pharmacy_products_BatchStockForWantedBook"><div class="ew-table-header-caption"><?php echo $pharmacy_products->BatchStockForWantedBook->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BatchStockForWantedBook" class="<?php echo $pharmacy_products->BatchStockForWantedBook->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->BatchStockForWantedBook) ?>',1);"><div id="elh_pharmacy_products_BatchStockForWantedBook" class="pharmacy_products_BatchStockForWantedBook">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->BatchStockForWantedBook->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->BatchStockForWantedBook->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->BatchStockForWantedBook->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->UnitBasedBilling->Visible) { // UnitBasedBilling ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->UnitBasedBilling) == "") { ?>
		<th data-name="UnitBasedBilling" class="<?php echo $pharmacy_products->UnitBasedBilling->headerCellClass() ?>"><div id="elh_pharmacy_products_UnitBasedBilling" class="pharmacy_products_UnitBasedBilling"><div class="ew-table-header-caption"><?php echo $pharmacy_products->UnitBasedBilling->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UnitBasedBilling" class="<?php echo $pharmacy_products->UnitBasedBilling->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->UnitBasedBilling) ?>',1);"><div id="elh_pharmacy_products_UnitBasedBilling" class="pharmacy_products_UnitBasedBilling">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->UnitBasedBilling->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->UnitBasedBilling->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->UnitBasedBilling->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->DoNotCheckStock->Visible) { // DoNotCheckStock ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->DoNotCheckStock) == "") { ?>
		<th data-name="DoNotCheckStock" class="<?php echo $pharmacy_products->DoNotCheckStock->headerCellClass() ?>"><div id="elh_pharmacy_products_DoNotCheckStock" class="pharmacy_products_DoNotCheckStock"><div class="ew-table-header-caption"><?php echo $pharmacy_products->DoNotCheckStock->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DoNotCheckStock" class="<?php echo $pharmacy_products->DoNotCheckStock->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->DoNotCheckStock) ?>',1);"><div id="elh_pharmacy_products_DoNotCheckStock" class="pharmacy_products_DoNotCheckStock">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->DoNotCheckStock->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->DoNotCheckStock->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->DoNotCheckStock->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->AcceptRate->Visible) { // AcceptRate ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->AcceptRate) == "") { ?>
		<th data-name="AcceptRate" class="<?php echo $pharmacy_products->AcceptRate->headerCellClass() ?>"><div id="elh_pharmacy_products_AcceptRate" class="pharmacy_products_AcceptRate"><div class="ew-table-header-caption"><?php echo $pharmacy_products->AcceptRate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AcceptRate" class="<?php echo $pharmacy_products->AcceptRate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->AcceptRate) ?>',1);"><div id="elh_pharmacy_products_AcceptRate" class="pharmacy_products_AcceptRate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->AcceptRate->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->AcceptRate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->AcceptRate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->PriceLevel->Visible) { // PriceLevel ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->PriceLevel) == "") { ?>
		<th data-name="PriceLevel" class="<?php echo $pharmacy_products->PriceLevel->headerCellClass() ?>"><div id="elh_pharmacy_products_PriceLevel" class="pharmacy_products_PriceLevel"><div class="ew-table-header-caption"><?php echo $pharmacy_products->PriceLevel->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PriceLevel" class="<?php echo $pharmacy_products->PriceLevel->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->PriceLevel) ?>',1);"><div id="elh_pharmacy_products_PriceLevel" class="pharmacy_products_PriceLevel">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->PriceLevel->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->PriceLevel->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->PriceLevel->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->LastQuotePrice->Visible) { // LastQuotePrice ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->LastQuotePrice) == "") { ?>
		<th data-name="LastQuotePrice" class="<?php echo $pharmacy_products->LastQuotePrice->headerCellClass() ?>"><div id="elh_pharmacy_products_LastQuotePrice" class="pharmacy_products_LastQuotePrice"><div class="ew-table-header-caption"><?php echo $pharmacy_products->LastQuotePrice->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LastQuotePrice" class="<?php echo $pharmacy_products->LastQuotePrice->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->LastQuotePrice) ?>',1);"><div id="elh_pharmacy_products_LastQuotePrice" class="pharmacy_products_LastQuotePrice">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->LastQuotePrice->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->LastQuotePrice->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->LastQuotePrice->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->PriceChange->Visible) { // PriceChange ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->PriceChange) == "") { ?>
		<th data-name="PriceChange" class="<?php echo $pharmacy_products->PriceChange->headerCellClass() ?>"><div id="elh_pharmacy_products_PriceChange" class="pharmacy_products_PriceChange"><div class="ew-table-header-caption"><?php echo $pharmacy_products->PriceChange->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PriceChange" class="<?php echo $pharmacy_products->PriceChange->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->PriceChange) ?>',1);"><div id="elh_pharmacy_products_PriceChange" class="pharmacy_products_PriceChange">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->PriceChange->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->PriceChange->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->PriceChange->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->CommodityCode->Visible) { // CommodityCode ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->CommodityCode) == "") { ?>
		<th data-name="CommodityCode" class="<?php echo $pharmacy_products->CommodityCode->headerCellClass() ?>"><div id="elh_pharmacy_products_CommodityCode" class="pharmacy_products_CommodityCode"><div class="ew-table-header-caption"><?php echo $pharmacy_products->CommodityCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CommodityCode" class="<?php echo $pharmacy_products->CommodityCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->CommodityCode) ?>',1);"><div id="elh_pharmacy_products_CommodityCode" class="pharmacy_products_CommodityCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->CommodityCode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->CommodityCode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->CommodityCode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->InstitutePrice->Visible) { // InstitutePrice ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->InstitutePrice) == "") { ?>
		<th data-name="InstitutePrice" class="<?php echo $pharmacy_products->InstitutePrice->headerCellClass() ?>"><div id="elh_pharmacy_products_InstitutePrice" class="pharmacy_products_InstitutePrice"><div class="ew-table-header-caption"><?php echo $pharmacy_products->InstitutePrice->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="InstitutePrice" class="<?php echo $pharmacy_products->InstitutePrice->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->InstitutePrice) ?>',1);"><div id="elh_pharmacy_products_InstitutePrice" class="pharmacy_products_InstitutePrice">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->InstitutePrice->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->InstitutePrice->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->InstitutePrice->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->CtrlOrDCtrlProduct->Visible) { // CtrlOrDCtrlProduct ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->CtrlOrDCtrlProduct) == "") { ?>
		<th data-name="CtrlOrDCtrlProduct" class="<?php echo $pharmacy_products->CtrlOrDCtrlProduct->headerCellClass() ?>"><div id="elh_pharmacy_products_CtrlOrDCtrlProduct" class="pharmacy_products_CtrlOrDCtrlProduct"><div class="ew-table-header-caption"><?php echo $pharmacy_products->CtrlOrDCtrlProduct->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CtrlOrDCtrlProduct" class="<?php echo $pharmacy_products->CtrlOrDCtrlProduct->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->CtrlOrDCtrlProduct) ?>',1);"><div id="elh_pharmacy_products_CtrlOrDCtrlProduct" class="pharmacy_products_CtrlOrDCtrlProduct">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->CtrlOrDCtrlProduct->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->CtrlOrDCtrlProduct->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->CtrlOrDCtrlProduct->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->ImportedDate->Visible) { // ImportedDate ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->ImportedDate) == "") { ?>
		<th data-name="ImportedDate" class="<?php echo $pharmacy_products->ImportedDate->headerCellClass() ?>"><div id="elh_pharmacy_products_ImportedDate" class="pharmacy_products_ImportedDate"><div class="ew-table-header-caption"><?php echo $pharmacy_products->ImportedDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ImportedDate" class="<?php echo $pharmacy_products->ImportedDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->ImportedDate) ?>',1);"><div id="elh_pharmacy_products_ImportedDate" class="pharmacy_products_ImportedDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->ImportedDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->ImportedDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->ImportedDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->IsImported->Visible) { // IsImported ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->IsImported) == "") { ?>
		<th data-name="IsImported" class="<?php echo $pharmacy_products->IsImported->headerCellClass() ?>"><div id="elh_pharmacy_products_IsImported" class="pharmacy_products_IsImported"><div class="ew-table-header-caption"><?php echo $pharmacy_products->IsImported->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IsImported" class="<?php echo $pharmacy_products->IsImported->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->IsImported) ?>',1);"><div id="elh_pharmacy_products_IsImported" class="pharmacy_products_IsImported">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->IsImported->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->IsImported->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->IsImported->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->FileName->Visible) { // FileName ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->FileName) == "") { ?>
		<th data-name="FileName" class="<?php echo $pharmacy_products->FileName->headerCellClass() ?>"><div id="elh_pharmacy_products_FileName" class="pharmacy_products_FileName"><div class="ew-table-header-caption"><?php echo $pharmacy_products->FileName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FileName" class="<?php echo $pharmacy_products->FileName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->FileName) ?>',1);"><div id="elh_pharmacy_products_FileName" class="pharmacy_products_FileName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->FileName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->FileName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->FileName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->GodownNumber->Visible) { // GodownNumber ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->GodownNumber) == "") { ?>
		<th data-name="GodownNumber" class="<?php echo $pharmacy_products->GodownNumber->headerCellClass() ?>"><div id="elh_pharmacy_products_GodownNumber" class="pharmacy_products_GodownNumber"><div class="ew-table-header-caption"><?php echo $pharmacy_products->GodownNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GodownNumber" class="<?php echo $pharmacy_products->GodownNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->GodownNumber) ?>',1);"><div id="elh_pharmacy_products_GodownNumber" class="pharmacy_products_GodownNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->GodownNumber->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->GodownNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->GodownNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->CreationDate->Visible) { // CreationDate ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->CreationDate) == "") { ?>
		<th data-name="CreationDate" class="<?php echo $pharmacy_products->CreationDate->headerCellClass() ?>"><div id="elh_pharmacy_products_CreationDate" class="pharmacy_products_CreationDate"><div class="ew-table-header-caption"><?php echo $pharmacy_products->CreationDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CreationDate" class="<?php echo $pharmacy_products->CreationDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->CreationDate) ?>',1);"><div id="elh_pharmacy_products_CreationDate" class="pharmacy_products_CreationDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->CreationDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->CreationDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->CreationDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->CreatedbyUser->Visible) { // CreatedbyUser ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->CreatedbyUser) == "") { ?>
		<th data-name="CreatedbyUser" class="<?php echo $pharmacy_products->CreatedbyUser->headerCellClass() ?>"><div id="elh_pharmacy_products_CreatedbyUser" class="pharmacy_products_CreatedbyUser"><div class="ew-table-header-caption"><?php echo $pharmacy_products->CreatedbyUser->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CreatedbyUser" class="<?php echo $pharmacy_products->CreatedbyUser->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->CreatedbyUser) ?>',1);"><div id="elh_pharmacy_products_CreatedbyUser" class="pharmacy_products_CreatedbyUser">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->CreatedbyUser->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->CreatedbyUser->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->CreatedbyUser->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->ModifiedDate->Visible) { // ModifiedDate ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->ModifiedDate) == "") { ?>
		<th data-name="ModifiedDate" class="<?php echo $pharmacy_products->ModifiedDate->headerCellClass() ?>"><div id="elh_pharmacy_products_ModifiedDate" class="pharmacy_products_ModifiedDate"><div class="ew-table-header-caption"><?php echo $pharmacy_products->ModifiedDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModifiedDate" class="<?php echo $pharmacy_products->ModifiedDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->ModifiedDate) ?>',1);"><div id="elh_pharmacy_products_ModifiedDate" class="pharmacy_products_ModifiedDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->ModifiedDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->ModifiedDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->ModifiedDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->ModifiedbyUser->Visible) { // ModifiedbyUser ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->ModifiedbyUser) == "") { ?>
		<th data-name="ModifiedbyUser" class="<?php echo $pharmacy_products->ModifiedbyUser->headerCellClass() ?>"><div id="elh_pharmacy_products_ModifiedbyUser" class="pharmacy_products_ModifiedbyUser"><div class="ew-table-header-caption"><?php echo $pharmacy_products->ModifiedbyUser->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModifiedbyUser" class="<?php echo $pharmacy_products->ModifiedbyUser->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->ModifiedbyUser) ?>',1);"><div id="elh_pharmacy_products_ModifiedbyUser" class="pharmacy_products_ModifiedbyUser">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->ModifiedbyUser->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->ModifiedbyUser->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->ModifiedbyUser->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->isActive->Visible) { // isActive ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->isActive) == "") { ?>
		<th data-name="isActive" class="<?php echo $pharmacy_products->isActive->headerCellClass() ?>"><div id="elh_pharmacy_products_isActive" class="pharmacy_products_isActive"><div class="ew-table-header-caption"><?php echo $pharmacy_products->isActive->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="isActive" class="<?php echo $pharmacy_products->isActive->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->isActive) ?>',1);"><div id="elh_pharmacy_products_isActive" class="pharmacy_products_isActive">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->isActive->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->isActive->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->isActive->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->AllowExpiryClaim->Visible) { // AllowExpiryClaim ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->AllowExpiryClaim) == "") { ?>
		<th data-name="AllowExpiryClaim" class="<?php echo $pharmacy_products->AllowExpiryClaim->headerCellClass() ?>"><div id="elh_pharmacy_products_AllowExpiryClaim" class="pharmacy_products_AllowExpiryClaim"><div class="ew-table-header-caption"><?php echo $pharmacy_products->AllowExpiryClaim->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AllowExpiryClaim" class="<?php echo $pharmacy_products->AllowExpiryClaim->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->AllowExpiryClaim) ?>',1);"><div id="elh_pharmacy_products_AllowExpiryClaim" class="pharmacy_products_AllowExpiryClaim">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->AllowExpiryClaim->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->AllowExpiryClaim->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->AllowExpiryClaim->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->BrandCode->Visible) { // BrandCode ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->BrandCode) == "") { ?>
		<th data-name="BrandCode" class="<?php echo $pharmacy_products->BrandCode->headerCellClass() ?>"><div id="elh_pharmacy_products_BrandCode" class="pharmacy_products_BrandCode"><div class="ew-table-header-caption"><?php echo $pharmacy_products->BrandCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BrandCode" class="<?php echo $pharmacy_products->BrandCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->BrandCode) ?>',1);"><div id="elh_pharmacy_products_BrandCode" class="pharmacy_products_BrandCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->BrandCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->BrandCode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->BrandCode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->FreeSchemeBasedon->Visible) { // FreeSchemeBasedon ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->FreeSchemeBasedon) == "") { ?>
		<th data-name="FreeSchemeBasedon" class="<?php echo $pharmacy_products->FreeSchemeBasedon->headerCellClass() ?>"><div id="elh_pharmacy_products_FreeSchemeBasedon" class="pharmacy_products_FreeSchemeBasedon"><div class="ew-table-header-caption"><?php echo $pharmacy_products->FreeSchemeBasedon->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FreeSchemeBasedon" class="<?php echo $pharmacy_products->FreeSchemeBasedon->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->FreeSchemeBasedon) ?>',1);"><div id="elh_pharmacy_products_FreeSchemeBasedon" class="pharmacy_products_FreeSchemeBasedon">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->FreeSchemeBasedon->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->FreeSchemeBasedon->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->FreeSchemeBasedon->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->DoNotCheckCostInBill->Visible) { // DoNotCheckCostInBill ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->DoNotCheckCostInBill) == "") { ?>
		<th data-name="DoNotCheckCostInBill" class="<?php echo $pharmacy_products->DoNotCheckCostInBill->headerCellClass() ?>"><div id="elh_pharmacy_products_DoNotCheckCostInBill" class="pharmacy_products_DoNotCheckCostInBill"><div class="ew-table-header-caption"><?php echo $pharmacy_products->DoNotCheckCostInBill->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DoNotCheckCostInBill" class="<?php echo $pharmacy_products->DoNotCheckCostInBill->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->DoNotCheckCostInBill) ?>',1);"><div id="elh_pharmacy_products_DoNotCheckCostInBill" class="pharmacy_products_DoNotCheckCostInBill">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->DoNotCheckCostInBill->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->DoNotCheckCostInBill->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->DoNotCheckCostInBill->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->ProductGroupCode->Visible) { // ProductGroupCode ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->ProductGroupCode) == "") { ?>
		<th data-name="ProductGroupCode" class="<?php echo $pharmacy_products->ProductGroupCode->headerCellClass() ?>"><div id="elh_pharmacy_products_ProductGroupCode" class="pharmacy_products_ProductGroupCode"><div class="ew-table-header-caption"><?php echo $pharmacy_products->ProductGroupCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProductGroupCode" class="<?php echo $pharmacy_products->ProductGroupCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->ProductGroupCode) ?>',1);"><div id="elh_pharmacy_products_ProductGroupCode" class="pharmacy_products_ProductGroupCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->ProductGroupCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->ProductGroupCode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->ProductGroupCode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->ProductStrengthCode->Visible) { // ProductStrengthCode ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->ProductStrengthCode) == "") { ?>
		<th data-name="ProductStrengthCode" class="<?php echo $pharmacy_products->ProductStrengthCode->headerCellClass() ?>"><div id="elh_pharmacy_products_ProductStrengthCode" class="pharmacy_products_ProductStrengthCode"><div class="ew-table-header-caption"><?php echo $pharmacy_products->ProductStrengthCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProductStrengthCode" class="<?php echo $pharmacy_products->ProductStrengthCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->ProductStrengthCode) ?>',1);"><div id="elh_pharmacy_products_ProductStrengthCode" class="pharmacy_products_ProductStrengthCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->ProductStrengthCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->ProductStrengthCode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->ProductStrengthCode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->PackingCode->Visible) { // PackingCode ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->PackingCode) == "") { ?>
		<th data-name="PackingCode" class="<?php echo $pharmacy_products->PackingCode->headerCellClass() ?>"><div id="elh_pharmacy_products_PackingCode" class="pharmacy_products_PackingCode"><div class="ew-table-header-caption"><?php echo $pharmacy_products->PackingCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PackingCode" class="<?php echo $pharmacy_products->PackingCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->PackingCode) ?>',1);"><div id="elh_pharmacy_products_PackingCode" class="pharmacy_products_PackingCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->PackingCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->PackingCode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->PackingCode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->ComputedMinStock->Visible) { // ComputedMinStock ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->ComputedMinStock) == "") { ?>
		<th data-name="ComputedMinStock" class="<?php echo $pharmacy_products->ComputedMinStock->headerCellClass() ?>"><div id="elh_pharmacy_products_ComputedMinStock" class="pharmacy_products_ComputedMinStock"><div class="ew-table-header-caption"><?php echo $pharmacy_products->ComputedMinStock->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ComputedMinStock" class="<?php echo $pharmacy_products->ComputedMinStock->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->ComputedMinStock) ?>',1);"><div id="elh_pharmacy_products_ComputedMinStock" class="pharmacy_products_ComputedMinStock">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->ComputedMinStock->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->ComputedMinStock->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->ComputedMinStock->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->ComputedMaxStock->Visible) { // ComputedMaxStock ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->ComputedMaxStock) == "") { ?>
		<th data-name="ComputedMaxStock" class="<?php echo $pharmacy_products->ComputedMaxStock->headerCellClass() ?>"><div id="elh_pharmacy_products_ComputedMaxStock" class="pharmacy_products_ComputedMaxStock"><div class="ew-table-header-caption"><?php echo $pharmacy_products->ComputedMaxStock->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ComputedMaxStock" class="<?php echo $pharmacy_products->ComputedMaxStock->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->ComputedMaxStock) ?>',1);"><div id="elh_pharmacy_products_ComputedMaxStock" class="pharmacy_products_ComputedMaxStock">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->ComputedMaxStock->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->ComputedMaxStock->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->ComputedMaxStock->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->ProductRemark->Visible) { // ProductRemark ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->ProductRemark) == "") { ?>
		<th data-name="ProductRemark" class="<?php echo $pharmacy_products->ProductRemark->headerCellClass() ?>"><div id="elh_pharmacy_products_ProductRemark" class="pharmacy_products_ProductRemark"><div class="ew-table-header-caption"><?php echo $pharmacy_products->ProductRemark->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProductRemark" class="<?php echo $pharmacy_products->ProductRemark->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->ProductRemark) ?>',1);"><div id="elh_pharmacy_products_ProductRemark" class="pharmacy_products_ProductRemark">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->ProductRemark->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->ProductRemark->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->ProductRemark->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->ProductDrugCode->Visible) { // ProductDrugCode ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->ProductDrugCode) == "") { ?>
		<th data-name="ProductDrugCode" class="<?php echo $pharmacy_products->ProductDrugCode->headerCellClass() ?>"><div id="elh_pharmacy_products_ProductDrugCode" class="pharmacy_products_ProductDrugCode"><div class="ew-table-header-caption"><?php echo $pharmacy_products->ProductDrugCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProductDrugCode" class="<?php echo $pharmacy_products->ProductDrugCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->ProductDrugCode) ?>',1);"><div id="elh_pharmacy_products_ProductDrugCode" class="pharmacy_products_ProductDrugCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->ProductDrugCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->ProductDrugCode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->ProductDrugCode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->IsMatrixProduct->Visible) { // IsMatrixProduct ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->IsMatrixProduct) == "") { ?>
		<th data-name="IsMatrixProduct" class="<?php echo $pharmacy_products->IsMatrixProduct->headerCellClass() ?>"><div id="elh_pharmacy_products_IsMatrixProduct" class="pharmacy_products_IsMatrixProduct"><div class="ew-table-header-caption"><?php echo $pharmacy_products->IsMatrixProduct->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IsMatrixProduct" class="<?php echo $pharmacy_products->IsMatrixProduct->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->IsMatrixProduct) ?>',1);"><div id="elh_pharmacy_products_IsMatrixProduct" class="pharmacy_products_IsMatrixProduct">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->IsMatrixProduct->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->IsMatrixProduct->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->IsMatrixProduct->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->AttributeCount1->Visible) { // AttributeCount1 ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->AttributeCount1) == "") { ?>
		<th data-name="AttributeCount1" class="<?php echo $pharmacy_products->AttributeCount1->headerCellClass() ?>"><div id="elh_pharmacy_products_AttributeCount1" class="pharmacy_products_AttributeCount1"><div class="ew-table-header-caption"><?php echo $pharmacy_products->AttributeCount1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AttributeCount1" class="<?php echo $pharmacy_products->AttributeCount1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->AttributeCount1) ?>',1);"><div id="elh_pharmacy_products_AttributeCount1" class="pharmacy_products_AttributeCount1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->AttributeCount1->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->AttributeCount1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->AttributeCount1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->AttributeCount2->Visible) { // AttributeCount2 ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->AttributeCount2) == "") { ?>
		<th data-name="AttributeCount2" class="<?php echo $pharmacy_products->AttributeCount2->headerCellClass() ?>"><div id="elh_pharmacy_products_AttributeCount2" class="pharmacy_products_AttributeCount2"><div class="ew-table-header-caption"><?php echo $pharmacy_products->AttributeCount2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AttributeCount2" class="<?php echo $pharmacy_products->AttributeCount2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->AttributeCount2) ?>',1);"><div id="elh_pharmacy_products_AttributeCount2" class="pharmacy_products_AttributeCount2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->AttributeCount2->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->AttributeCount2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->AttributeCount2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->AttributeCount3->Visible) { // AttributeCount3 ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->AttributeCount3) == "") { ?>
		<th data-name="AttributeCount3" class="<?php echo $pharmacy_products->AttributeCount3->headerCellClass() ?>"><div id="elh_pharmacy_products_AttributeCount3" class="pharmacy_products_AttributeCount3"><div class="ew-table-header-caption"><?php echo $pharmacy_products->AttributeCount3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AttributeCount3" class="<?php echo $pharmacy_products->AttributeCount3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->AttributeCount3) ?>',1);"><div id="elh_pharmacy_products_AttributeCount3" class="pharmacy_products_AttributeCount3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->AttributeCount3->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->AttributeCount3->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->AttributeCount3->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->AttributeCount4->Visible) { // AttributeCount4 ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->AttributeCount4) == "") { ?>
		<th data-name="AttributeCount4" class="<?php echo $pharmacy_products->AttributeCount4->headerCellClass() ?>"><div id="elh_pharmacy_products_AttributeCount4" class="pharmacy_products_AttributeCount4"><div class="ew-table-header-caption"><?php echo $pharmacy_products->AttributeCount4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AttributeCount4" class="<?php echo $pharmacy_products->AttributeCount4->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->AttributeCount4) ?>',1);"><div id="elh_pharmacy_products_AttributeCount4" class="pharmacy_products_AttributeCount4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->AttributeCount4->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->AttributeCount4->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->AttributeCount4->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->AttributeCount5->Visible) { // AttributeCount5 ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->AttributeCount5) == "") { ?>
		<th data-name="AttributeCount5" class="<?php echo $pharmacy_products->AttributeCount5->headerCellClass() ?>"><div id="elh_pharmacy_products_AttributeCount5" class="pharmacy_products_AttributeCount5"><div class="ew-table-header-caption"><?php echo $pharmacy_products->AttributeCount5->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AttributeCount5" class="<?php echo $pharmacy_products->AttributeCount5->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->AttributeCount5) ?>',1);"><div id="elh_pharmacy_products_AttributeCount5" class="pharmacy_products_AttributeCount5">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->AttributeCount5->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->AttributeCount5->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->AttributeCount5->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->DefaultDiscountPercentage->Visible) { // DefaultDiscountPercentage ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->DefaultDiscountPercentage) == "") { ?>
		<th data-name="DefaultDiscountPercentage" class="<?php echo $pharmacy_products->DefaultDiscountPercentage->headerCellClass() ?>"><div id="elh_pharmacy_products_DefaultDiscountPercentage" class="pharmacy_products_DefaultDiscountPercentage"><div class="ew-table-header-caption"><?php echo $pharmacy_products->DefaultDiscountPercentage->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DefaultDiscountPercentage" class="<?php echo $pharmacy_products->DefaultDiscountPercentage->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->DefaultDiscountPercentage) ?>',1);"><div id="elh_pharmacy_products_DefaultDiscountPercentage" class="pharmacy_products_DefaultDiscountPercentage">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->DefaultDiscountPercentage->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->DefaultDiscountPercentage->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->DefaultDiscountPercentage->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->DonotPrintBarcode->Visible) { // DonotPrintBarcode ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->DonotPrintBarcode) == "") { ?>
		<th data-name="DonotPrintBarcode" class="<?php echo $pharmacy_products->DonotPrintBarcode->headerCellClass() ?>"><div id="elh_pharmacy_products_DonotPrintBarcode" class="pharmacy_products_DonotPrintBarcode"><div class="ew-table-header-caption"><?php echo $pharmacy_products->DonotPrintBarcode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DonotPrintBarcode" class="<?php echo $pharmacy_products->DonotPrintBarcode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->DonotPrintBarcode) ?>',1);"><div id="elh_pharmacy_products_DonotPrintBarcode" class="pharmacy_products_DonotPrintBarcode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->DonotPrintBarcode->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->DonotPrintBarcode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->DonotPrintBarcode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->ProductLevelDiscount->Visible) { // ProductLevelDiscount ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->ProductLevelDiscount) == "") { ?>
		<th data-name="ProductLevelDiscount" class="<?php echo $pharmacy_products->ProductLevelDiscount->headerCellClass() ?>"><div id="elh_pharmacy_products_ProductLevelDiscount" class="pharmacy_products_ProductLevelDiscount"><div class="ew-table-header-caption"><?php echo $pharmacy_products->ProductLevelDiscount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProductLevelDiscount" class="<?php echo $pharmacy_products->ProductLevelDiscount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->ProductLevelDiscount) ?>',1);"><div id="elh_pharmacy_products_ProductLevelDiscount" class="pharmacy_products_ProductLevelDiscount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->ProductLevelDiscount->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->ProductLevelDiscount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->ProductLevelDiscount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->Markup->Visible) { // Markup ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->Markup) == "") { ?>
		<th data-name="Markup" class="<?php echo $pharmacy_products->Markup->headerCellClass() ?>"><div id="elh_pharmacy_products_Markup" class="pharmacy_products_Markup"><div class="ew-table-header-caption"><?php echo $pharmacy_products->Markup->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Markup" class="<?php echo $pharmacy_products->Markup->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->Markup) ?>',1);"><div id="elh_pharmacy_products_Markup" class="pharmacy_products_Markup">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->Markup->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->Markup->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->Markup->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->MarkDown->Visible) { // MarkDown ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->MarkDown) == "") { ?>
		<th data-name="MarkDown" class="<?php echo $pharmacy_products->MarkDown->headerCellClass() ?>"><div id="elh_pharmacy_products_MarkDown" class="pharmacy_products_MarkDown"><div class="ew-table-header-caption"><?php echo $pharmacy_products->MarkDown->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MarkDown" class="<?php echo $pharmacy_products->MarkDown->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->MarkDown) ?>',1);"><div id="elh_pharmacy_products_MarkDown" class="pharmacy_products_MarkDown">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->MarkDown->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->MarkDown->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->MarkDown->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->ReworkSalePrice->Visible) { // ReworkSalePrice ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->ReworkSalePrice) == "") { ?>
		<th data-name="ReworkSalePrice" class="<?php echo $pharmacy_products->ReworkSalePrice->headerCellClass() ?>"><div id="elh_pharmacy_products_ReworkSalePrice" class="pharmacy_products_ReworkSalePrice"><div class="ew-table-header-caption"><?php echo $pharmacy_products->ReworkSalePrice->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReworkSalePrice" class="<?php echo $pharmacy_products->ReworkSalePrice->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->ReworkSalePrice) ?>',1);"><div id="elh_pharmacy_products_ReworkSalePrice" class="pharmacy_products_ReworkSalePrice">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->ReworkSalePrice->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->ReworkSalePrice->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->ReworkSalePrice->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->MultipleInput->Visible) { // MultipleInput ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->MultipleInput) == "") { ?>
		<th data-name="MultipleInput" class="<?php echo $pharmacy_products->MultipleInput->headerCellClass() ?>"><div id="elh_pharmacy_products_MultipleInput" class="pharmacy_products_MultipleInput"><div class="ew-table-header-caption"><?php echo $pharmacy_products->MultipleInput->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MultipleInput" class="<?php echo $pharmacy_products->MultipleInput->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->MultipleInput) ?>',1);"><div id="elh_pharmacy_products_MultipleInput" class="pharmacy_products_MultipleInput">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->MultipleInput->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->MultipleInput->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->MultipleInput->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->LpPackageInformation->Visible) { // LpPackageInformation ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->LpPackageInformation) == "") { ?>
		<th data-name="LpPackageInformation" class="<?php echo $pharmacy_products->LpPackageInformation->headerCellClass() ?>"><div id="elh_pharmacy_products_LpPackageInformation" class="pharmacy_products_LpPackageInformation"><div class="ew-table-header-caption"><?php echo $pharmacy_products->LpPackageInformation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LpPackageInformation" class="<?php echo $pharmacy_products->LpPackageInformation->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->LpPackageInformation) ?>',1);"><div id="elh_pharmacy_products_LpPackageInformation" class="pharmacy_products_LpPackageInformation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->LpPackageInformation->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->LpPackageInformation->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->LpPackageInformation->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->AllowNegativeStock->Visible) { // AllowNegativeStock ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->AllowNegativeStock) == "") { ?>
		<th data-name="AllowNegativeStock" class="<?php echo $pharmacy_products->AllowNegativeStock->headerCellClass() ?>"><div id="elh_pharmacy_products_AllowNegativeStock" class="pharmacy_products_AllowNegativeStock"><div class="ew-table-header-caption"><?php echo $pharmacy_products->AllowNegativeStock->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AllowNegativeStock" class="<?php echo $pharmacy_products->AllowNegativeStock->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->AllowNegativeStock) ?>',1);"><div id="elh_pharmacy_products_AllowNegativeStock" class="pharmacy_products_AllowNegativeStock">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->AllowNegativeStock->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->AllowNegativeStock->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->AllowNegativeStock->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->OrderDate->Visible) { // OrderDate ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->OrderDate) == "") { ?>
		<th data-name="OrderDate" class="<?php echo $pharmacy_products->OrderDate->headerCellClass() ?>"><div id="elh_pharmacy_products_OrderDate" class="pharmacy_products_OrderDate"><div class="ew-table-header-caption"><?php echo $pharmacy_products->OrderDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OrderDate" class="<?php echo $pharmacy_products->OrderDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->OrderDate) ?>',1);"><div id="elh_pharmacy_products_OrderDate" class="pharmacy_products_OrderDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->OrderDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->OrderDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->OrderDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->OrderTime->Visible) { // OrderTime ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->OrderTime) == "") { ?>
		<th data-name="OrderTime" class="<?php echo $pharmacy_products->OrderTime->headerCellClass() ?>"><div id="elh_pharmacy_products_OrderTime" class="pharmacy_products_OrderTime"><div class="ew-table-header-caption"><?php echo $pharmacy_products->OrderTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OrderTime" class="<?php echo $pharmacy_products->OrderTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->OrderTime) ?>',1);"><div id="elh_pharmacy_products_OrderTime" class="pharmacy_products_OrderTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->OrderTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->OrderTime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->OrderTime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->RateGroupCode->Visible) { // RateGroupCode ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->RateGroupCode) == "") { ?>
		<th data-name="RateGroupCode" class="<?php echo $pharmacy_products->RateGroupCode->headerCellClass() ?>"><div id="elh_pharmacy_products_RateGroupCode" class="pharmacy_products_RateGroupCode"><div class="ew-table-header-caption"><?php echo $pharmacy_products->RateGroupCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RateGroupCode" class="<?php echo $pharmacy_products->RateGroupCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->RateGroupCode) ?>',1);"><div id="elh_pharmacy_products_RateGroupCode" class="pharmacy_products_RateGroupCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->RateGroupCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->RateGroupCode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->RateGroupCode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->ConversionCaseLot->Visible) { // ConversionCaseLot ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->ConversionCaseLot) == "") { ?>
		<th data-name="ConversionCaseLot" class="<?php echo $pharmacy_products->ConversionCaseLot->headerCellClass() ?>"><div id="elh_pharmacy_products_ConversionCaseLot" class="pharmacy_products_ConversionCaseLot"><div class="ew-table-header-caption"><?php echo $pharmacy_products->ConversionCaseLot->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ConversionCaseLot" class="<?php echo $pharmacy_products->ConversionCaseLot->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->ConversionCaseLot) ?>',1);"><div id="elh_pharmacy_products_ConversionCaseLot" class="pharmacy_products_ConversionCaseLot">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->ConversionCaseLot->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->ConversionCaseLot->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->ConversionCaseLot->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->ShippingLot->Visible) { // ShippingLot ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->ShippingLot) == "") { ?>
		<th data-name="ShippingLot" class="<?php echo $pharmacy_products->ShippingLot->headerCellClass() ?>"><div id="elh_pharmacy_products_ShippingLot" class="pharmacy_products_ShippingLot"><div class="ew-table-header-caption"><?php echo $pharmacy_products->ShippingLot->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ShippingLot" class="<?php echo $pharmacy_products->ShippingLot->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->ShippingLot) ?>',1);"><div id="elh_pharmacy_products_ShippingLot" class="pharmacy_products_ShippingLot">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->ShippingLot->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->ShippingLot->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->ShippingLot->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->AllowExpiryReplacement->Visible) { // AllowExpiryReplacement ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->AllowExpiryReplacement) == "") { ?>
		<th data-name="AllowExpiryReplacement" class="<?php echo $pharmacy_products->AllowExpiryReplacement->headerCellClass() ?>"><div id="elh_pharmacy_products_AllowExpiryReplacement" class="pharmacy_products_AllowExpiryReplacement"><div class="ew-table-header-caption"><?php echo $pharmacy_products->AllowExpiryReplacement->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AllowExpiryReplacement" class="<?php echo $pharmacy_products->AllowExpiryReplacement->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->AllowExpiryReplacement) ?>',1);"><div id="elh_pharmacy_products_AllowExpiryReplacement" class="pharmacy_products_AllowExpiryReplacement">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->AllowExpiryReplacement->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->AllowExpiryReplacement->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->AllowExpiryReplacement->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->NoOfMonthExpiryAllowed->Visible) { // NoOfMonthExpiryAllowed ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->NoOfMonthExpiryAllowed) == "") { ?>
		<th data-name="NoOfMonthExpiryAllowed" class="<?php echo $pharmacy_products->NoOfMonthExpiryAllowed->headerCellClass() ?>"><div id="elh_pharmacy_products_NoOfMonthExpiryAllowed" class="pharmacy_products_NoOfMonthExpiryAllowed"><div class="ew-table-header-caption"><?php echo $pharmacy_products->NoOfMonthExpiryAllowed->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoOfMonthExpiryAllowed" class="<?php echo $pharmacy_products->NoOfMonthExpiryAllowed->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->NoOfMonthExpiryAllowed) ?>',1);"><div id="elh_pharmacy_products_NoOfMonthExpiryAllowed" class="pharmacy_products_NoOfMonthExpiryAllowed">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->NoOfMonthExpiryAllowed->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->NoOfMonthExpiryAllowed->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->NoOfMonthExpiryAllowed->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->ProductDiscountEligibility->Visible) { // ProductDiscountEligibility ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->ProductDiscountEligibility) == "") { ?>
		<th data-name="ProductDiscountEligibility" class="<?php echo $pharmacy_products->ProductDiscountEligibility->headerCellClass() ?>"><div id="elh_pharmacy_products_ProductDiscountEligibility" class="pharmacy_products_ProductDiscountEligibility"><div class="ew-table-header-caption"><?php echo $pharmacy_products->ProductDiscountEligibility->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProductDiscountEligibility" class="<?php echo $pharmacy_products->ProductDiscountEligibility->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->ProductDiscountEligibility) ?>',1);"><div id="elh_pharmacy_products_ProductDiscountEligibility" class="pharmacy_products_ProductDiscountEligibility">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->ProductDiscountEligibility->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->ProductDiscountEligibility->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->ProductDiscountEligibility->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->ScheduleTypeCode->Visible) { // ScheduleTypeCode ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->ScheduleTypeCode) == "") { ?>
		<th data-name="ScheduleTypeCode" class="<?php echo $pharmacy_products->ScheduleTypeCode->headerCellClass() ?>"><div id="elh_pharmacy_products_ScheduleTypeCode" class="pharmacy_products_ScheduleTypeCode"><div class="ew-table-header-caption"><?php echo $pharmacy_products->ScheduleTypeCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ScheduleTypeCode" class="<?php echo $pharmacy_products->ScheduleTypeCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->ScheduleTypeCode) ?>',1);"><div id="elh_pharmacy_products_ScheduleTypeCode" class="pharmacy_products_ScheduleTypeCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->ScheduleTypeCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->ScheduleTypeCode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->ScheduleTypeCode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->AIOCDProductCode->Visible) { // AIOCDProductCode ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->AIOCDProductCode) == "") { ?>
		<th data-name="AIOCDProductCode" class="<?php echo $pharmacy_products->AIOCDProductCode->headerCellClass() ?>"><div id="elh_pharmacy_products_AIOCDProductCode" class="pharmacy_products_AIOCDProductCode"><div class="ew-table-header-caption"><?php echo $pharmacy_products->AIOCDProductCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AIOCDProductCode" class="<?php echo $pharmacy_products->AIOCDProductCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->AIOCDProductCode) ?>',1);"><div id="elh_pharmacy_products_AIOCDProductCode" class="pharmacy_products_AIOCDProductCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->AIOCDProductCode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->AIOCDProductCode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->AIOCDProductCode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->FreeQuantity->Visible) { // FreeQuantity ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->FreeQuantity) == "") { ?>
		<th data-name="FreeQuantity" class="<?php echo $pharmacy_products->FreeQuantity->headerCellClass() ?>"><div id="elh_pharmacy_products_FreeQuantity" class="pharmacy_products_FreeQuantity"><div class="ew-table-header-caption"><?php echo $pharmacy_products->FreeQuantity->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FreeQuantity" class="<?php echo $pharmacy_products->FreeQuantity->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->FreeQuantity) ?>',1);"><div id="elh_pharmacy_products_FreeQuantity" class="pharmacy_products_FreeQuantity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->FreeQuantity->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->FreeQuantity->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->FreeQuantity->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->DiscountType->Visible) { // DiscountType ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->DiscountType) == "") { ?>
		<th data-name="DiscountType" class="<?php echo $pharmacy_products->DiscountType->headerCellClass() ?>"><div id="elh_pharmacy_products_DiscountType" class="pharmacy_products_DiscountType"><div class="ew-table-header-caption"><?php echo $pharmacy_products->DiscountType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DiscountType" class="<?php echo $pharmacy_products->DiscountType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->DiscountType) ?>',1);"><div id="elh_pharmacy_products_DiscountType" class="pharmacy_products_DiscountType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->DiscountType->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->DiscountType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->DiscountType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->DiscountValue->Visible) { // DiscountValue ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->DiscountValue) == "") { ?>
		<th data-name="DiscountValue" class="<?php echo $pharmacy_products->DiscountValue->headerCellClass() ?>"><div id="elh_pharmacy_products_DiscountValue" class="pharmacy_products_DiscountValue"><div class="ew-table-header-caption"><?php echo $pharmacy_products->DiscountValue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DiscountValue" class="<?php echo $pharmacy_products->DiscountValue->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->DiscountValue) ?>',1);"><div id="elh_pharmacy_products_DiscountValue" class="pharmacy_products_DiscountValue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->DiscountValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->DiscountValue->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->DiscountValue->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->HasProductOrderAttribute->Visible) { // HasProductOrderAttribute ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->HasProductOrderAttribute) == "") { ?>
		<th data-name="HasProductOrderAttribute" class="<?php echo $pharmacy_products->HasProductOrderAttribute->headerCellClass() ?>"><div id="elh_pharmacy_products_HasProductOrderAttribute" class="pharmacy_products_HasProductOrderAttribute"><div class="ew-table-header-caption"><?php echo $pharmacy_products->HasProductOrderAttribute->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HasProductOrderAttribute" class="<?php echo $pharmacy_products->HasProductOrderAttribute->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->HasProductOrderAttribute) ?>',1);"><div id="elh_pharmacy_products_HasProductOrderAttribute" class="pharmacy_products_HasProductOrderAttribute">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->HasProductOrderAttribute->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->HasProductOrderAttribute->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->HasProductOrderAttribute->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->FirstPODate->Visible) { // FirstPODate ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->FirstPODate) == "") { ?>
		<th data-name="FirstPODate" class="<?php echo $pharmacy_products->FirstPODate->headerCellClass() ?>"><div id="elh_pharmacy_products_FirstPODate" class="pharmacy_products_FirstPODate"><div class="ew-table-header-caption"><?php echo $pharmacy_products->FirstPODate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FirstPODate" class="<?php echo $pharmacy_products->FirstPODate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->FirstPODate) ?>',1);"><div id="elh_pharmacy_products_FirstPODate" class="pharmacy_products_FirstPODate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->FirstPODate->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->FirstPODate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->FirstPODate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->SaleprcieAndMrpCalcPercent->Visible) { // SaleprcieAndMrpCalcPercent ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->SaleprcieAndMrpCalcPercent) == "") { ?>
		<th data-name="SaleprcieAndMrpCalcPercent" class="<?php echo $pharmacy_products->SaleprcieAndMrpCalcPercent->headerCellClass() ?>"><div id="elh_pharmacy_products_SaleprcieAndMrpCalcPercent" class="pharmacy_products_SaleprcieAndMrpCalcPercent"><div class="ew-table-header-caption"><?php echo $pharmacy_products->SaleprcieAndMrpCalcPercent->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SaleprcieAndMrpCalcPercent" class="<?php echo $pharmacy_products->SaleprcieAndMrpCalcPercent->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->SaleprcieAndMrpCalcPercent) ?>',1);"><div id="elh_pharmacy_products_SaleprcieAndMrpCalcPercent" class="pharmacy_products_SaleprcieAndMrpCalcPercent">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->SaleprcieAndMrpCalcPercent->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->SaleprcieAndMrpCalcPercent->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->SaleprcieAndMrpCalcPercent->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->IsGiftVoucherProducts->Visible) { // IsGiftVoucherProducts ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->IsGiftVoucherProducts) == "") { ?>
		<th data-name="IsGiftVoucherProducts" class="<?php echo $pharmacy_products->IsGiftVoucherProducts->headerCellClass() ?>"><div id="elh_pharmacy_products_IsGiftVoucherProducts" class="pharmacy_products_IsGiftVoucherProducts"><div class="ew-table-header-caption"><?php echo $pharmacy_products->IsGiftVoucherProducts->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IsGiftVoucherProducts" class="<?php echo $pharmacy_products->IsGiftVoucherProducts->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->IsGiftVoucherProducts) ?>',1);"><div id="elh_pharmacy_products_IsGiftVoucherProducts" class="pharmacy_products_IsGiftVoucherProducts">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->IsGiftVoucherProducts->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->IsGiftVoucherProducts->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->IsGiftVoucherProducts->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->AcceptRange4SerialNumber->Visible) { // AcceptRange4SerialNumber ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->AcceptRange4SerialNumber) == "") { ?>
		<th data-name="AcceptRange4SerialNumber" class="<?php echo $pharmacy_products->AcceptRange4SerialNumber->headerCellClass() ?>"><div id="elh_pharmacy_products_AcceptRange4SerialNumber" class="pharmacy_products_AcceptRange4SerialNumber"><div class="ew-table-header-caption"><?php echo $pharmacy_products->AcceptRange4SerialNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AcceptRange4SerialNumber" class="<?php echo $pharmacy_products->AcceptRange4SerialNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->AcceptRange4SerialNumber) ?>',1);"><div id="elh_pharmacy_products_AcceptRange4SerialNumber" class="pharmacy_products_AcceptRange4SerialNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->AcceptRange4SerialNumber->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->AcceptRange4SerialNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->AcceptRange4SerialNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->GiftVoucherDenomination->Visible) { // GiftVoucherDenomination ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->GiftVoucherDenomination) == "") { ?>
		<th data-name="GiftVoucherDenomination" class="<?php echo $pharmacy_products->GiftVoucherDenomination->headerCellClass() ?>"><div id="elh_pharmacy_products_GiftVoucherDenomination" class="pharmacy_products_GiftVoucherDenomination"><div class="ew-table-header-caption"><?php echo $pharmacy_products->GiftVoucherDenomination->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GiftVoucherDenomination" class="<?php echo $pharmacy_products->GiftVoucherDenomination->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->GiftVoucherDenomination) ?>',1);"><div id="elh_pharmacy_products_GiftVoucherDenomination" class="pharmacy_products_GiftVoucherDenomination">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->GiftVoucherDenomination->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->GiftVoucherDenomination->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->GiftVoucherDenomination->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->Subclasscode->Visible) { // Subclasscode ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->Subclasscode) == "") { ?>
		<th data-name="Subclasscode" class="<?php echo $pharmacy_products->Subclasscode->headerCellClass() ?>"><div id="elh_pharmacy_products_Subclasscode" class="pharmacy_products_Subclasscode"><div class="ew-table-header-caption"><?php echo $pharmacy_products->Subclasscode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Subclasscode" class="<?php echo $pharmacy_products->Subclasscode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->Subclasscode) ?>',1);"><div id="elh_pharmacy_products_Subclasscode" class="pharmacy_products_Subclasscode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->Subclasscode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->Subclasscode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->Subclasscode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->BarCodeFromWeighingMachine->Visible) { // BarCodeFromWeighingMachine ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->BarCodeFromWeighingMachine) == "") { ?>
		<th data-name="BarCodeFromWeighingMachine" class="<?php echo $pharmacy_products->BarCodeFromWeighingMachine->headerCellClass() ?>"><div id="elh_pharmacy_products_BarCodeFromWeighingMachine" class="pharmacy_products_BarCodeFromWeighingMachine"><div class="ew-table-header-caption"><?php echo $pharmacy_products->BarCodeFromWeighingMachine->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BarCodeFromWeighingMachine" class="<?php echo $pharmacy_products->BarCodeFromWeighingMachine->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->BarCodeFromWeighingMachine) ?>',1);"><div id="elh_pharmacy_products_BarCodeFromWeighingMachine" class="pharmacy_products_BarCodeFromWeighingMachine">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->BarCodeFromWeighingMachine->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->BarCodeFromWeighingMachine->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->BarCodeFromWeighingMachine->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->CheckCostInReturn->Visible) { // CheckCostInReturn ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->CheckCostInReturn) == "") { ?>
		<th data-name="CheckCostInReturn" class="<?php echo $pharmacy_products->CheckCostInReturn->headerCellClass() ?>"><div id="elh_pharmacy_products_CheckCostInReturn" class="pharmacy_products_CheckCostInReturn"><div class="ew-table-header-caption"><?php echo $pharmacy_products->CheckCostInReturn->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CheckCostInReturn" class="<?php echo $pharmacy_products->CheckCostInReturn->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->CheckCostInReturn) ?>',1);"><div id="elh_pharmacy_products_CheckCostInReturn" class="pharmacy_products_CheckCostInReturn">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->CheckCostInReturn->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->CheckCostInReturn->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->CheckCostInReturn->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->FrequentSaleProduct->Visible) { // FrequentSaleProduct ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->FrequentSaleProduct) == "") { ?>
		<th data-name="FrequentSaleProduct" class="<?php echo $pharmacy_products->FrequentSaleProduct->headerCellClass() ?>"><div id="elh_pharmacy_products_FrequentSaleProduct" class="pharmacy_products_FrequentSaleProduct"><div class="ew-table-header-caption"><?php echo $pharmacy_products->FrequentSaleProduct->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FrequentSaleProduct" class="<?php echo $pharmacy_products->FrequentSaleProduct->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->FrequentSaleProduct) ?>',1);"><div id="elh_pharmacy_products_FrequentSaleProduct" class="pharmacy_products_FrequentSaleProduct">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->FrequentSaleProduct->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->FrequentSaleProduct->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->FrequentSaleProduct->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->RateType->Visible) { // RateType ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->RateType) == "") { ?>
		<th data-name="RateType" class="<?php echo $pharmacy_products->RateType->headerCellClass() ?>"><div id="elh_pharmacy_products_RateType" class="pharmacy_products_RateType"><div class="ew-table-header-caption"><?php echo $pharmacy_products->RateType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RateType" class="<?php echo $pharmacy_products->RateType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->RateType) ?>',1);"><div id="elh_pharmacy_products_RateType" class="pharmacy_products_RateType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->RateType->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->RateType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->RateType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->TouchscreenName->Visible) { // TouchscreenName ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->TouchscreenName) == "") { ?>
		<th data-name="TouchscreenName" class="<?php echo $pharmacy_products->TouchscreenName->headerCellClass() ?>"><div id="elh_pharmacy_products_TouchscreenName" class="pharmacy_products_TouchscreenName"><div class="ew-table-header-caption"><?php echo $pharmacy_products->TouchscreenName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TouchscreenName" class="<?php echo $pharmacy_products->TouchscreenName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->TouchscreenName) ?>',1);"><div id="elh_pharmacy_products_TouchscreenName" class="pharmacy_products_TouchscreenName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->TouchscreenName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->TouchscreenName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->TouchscreenName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->FreeType->Visible) { // FreeType ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->FreeType) == "") { ?>
		<th data-name="FreeType" class="<?php echo $pharmacy_products->FreeType->headerCellClass() ?>"><div id="elh_pharmacy_products_FreeType" class="pharmacy_products_FreeType"><div class="ew-table-header-caption"><?php echo $pharmacy_products->FreeType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FreeType" class="<?php echo $pharmacy_products->FreeType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->FreeType) ?>',1);"><div id="elh_pharmacy_products_FreeType" class="pharmacy_products_FreeType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->FreeType->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->FreeType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->FreeType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->LooseQtyasNewBatch->Visible) { // LooseQtyasNewBatch ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->LooseQtyasNewBatch) == "") { ?>
		<th data-name="LooseQtyasNewBatch" class="<?php echo $pharmacy_products->LooseQtyasNewBatch->headerCellClass() ?>"><div id="elh_pharmacy_products_LooseQtyasNewBatch" class="pharmacy_products_LooseQtyasNewBatch"><div class="ew-table-header-caption"><?php echo $pharmacy_products->LooseQtyasNewBatch->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LooseQtyasNewBatch" class="<?php echo $pharmacy_products->LooseQtyasNewBatch->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->LooseQtyasNewBatch) ?>',1);"><div id="elh_pharmacy_products_LooseQtyasNewBatch" class="pharmacy_products_LooseQtyasNewBatch">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->LooseQtyasNewBatch->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->LooseQtyasNewBatch->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->LooseQtyasNewBatch->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->AllowSlabBilling->Visible) { // AllowSlabBilling ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->AllowSlabBilling) == "") { ?>
		<th data-name="AllowSlabBilling" class="<?php echo $pharmacy_products->AllowSlabBilling->headerCellClass() ?>"><div id="elh_pharmacy_products_AllowSlabBilling" class="pharmacy_products_AllowSlabBilling"><div class="ew-table-header-caption"><?php echo $pharmacy_products->AllowSlabBilling->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AllowSlabBilling" class="<?php echo $pharmacy_products->AllowSlabBilling->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->AllowSlabBilling) ?>',1);"><div id="elh_pharmacy_products_AllowSlabBilling" class="pharmacy_products_AllowSlabBilling">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->AllowSlabBilling->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->AllowSlabBilling->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->AllowSlabBilling->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->ProductTypeForProduction->Visible) { // ProductTypeForProduction ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->ProductTypeForProduction) == "") { ?>
		<th data-name="ProductTypeForProduction" class="<?php echo $pharmacy_products->ProductTypeForProduction->headerCellClass() ?>"><div id="elh_pharmacy_products_ProductTypeForProduction" class="pharmacy_products_ProductTypeForProduction"><div class="ew-table-header-caption"><?php echo $pharmacy_products->ProductTypeForProduction->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProductTypeForProduction" class="<?php echo $pharmacy_products->ProductTypeForProduction->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->ProductTypeForProduction) ?>',1);"><div id="elh_pharmacy_products_ProductTypeForProduction" class="pharmacy_products_ProductTypeForProduction">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->ProductTypeForProduction->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->ProductTypeForProduction->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->ProductTypeForProduction->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->RecipeCode->Visible) { // RecipeCode ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->RecipeCode) == "") { ?>
		<th data-name="RecipeCode" class="<?php echo $pharmacy_products->RecipeCode->headerCellClass() ?>"><div id="elh_pharmacy_products_RecipeCode" class="pharmacy_products_RecipeCode"><div class="ew-table-header-caption"><?php echo $pharmacy_products->RecipeCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RecipeCode" class="<?php echo $pharmacy_products->RecipeCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->RecipeCode) ?>',1);"><div id="elh_pharmacy_products_RecipeCode" class="pharmacy_products_RecipeCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->RecipeCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->RecipeCode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->RecipeCode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->DefaultUnitType->Visible) { // DefaultUnitType ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->DefaultUnitType) == "") { ?>
		<th data-name="DefaultUnitType" class="<?php echo $pharmacy_products->DefaultUnitType->headerCellClass() ?>"><div id="elh_pharmacy_products_DefaultUnitType" class="pharmacy_products_DefaultUnitType"><div class="ew-table-header-caption"><?php echo $pharmacy_products->DefaultUnitType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DefaultUnitType" class="<?php echo $pharmacy_products->DefaultUnitType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->DefaultUnitType) ?>',1);"><div id="elh_pharmacy_products_DefaultUnitType" class="pharmacy_products_DefaultUnitType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->DefaultUnitType->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->DefaultUnitType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->DefaultUnitType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->PIstatus->Visible) { // PIstatus ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->PIstatus) == "") { ?>
		<th data-name="PIstatus" class="<?php echo $pharmacy_products->PIstatus->headerCellClass() ?>"><div id="elh_pharmacy_products_PIstatus" class="pharmacy_products_PIstatus"><div class="ew-table-header-caption"><?php echo $pharmacy_products->PIstatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PIstatus" class="<?php echo $pharmacy_products->PIstatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->PIstatus) ?>',1);"><div id="elh_pharmacy_products_PIstatus" class="pharmacy_products_PIstatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->PIstatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->PIstatus->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->PIstatus->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->LastPiConfirmedDate->Visible) { // LastPiConfirmedDate ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->LastPiConfirmedDate) == "") { ?>
		<th data-name="LastPiConfirmedDate" class="<?php echo $pharmacy_products->LastPiConfirmedDate->headerCellClass() ?>"><div id="elh_pharmacy_products_LastPiConfirmedDate" class="pharmacy_products_LastPiConfirmedDate"><div class="ew-table-header-caption"><?php echo $pharmacy_products->LastPiConfirmedDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LastPiConfirmedDate" class="<?php echo $pharmacy_products->LastPiConfirmedDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->LastPiConfirmedDate) ?>',1);"><div id="elh_pharmacy_products_LastPiConfirmedDate" class="pharmacy_products_LastPiConfirmedDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->LastPiConfirmedDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->LastPiConfirmedDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->LastPiConfirmedDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->BarCodeDesign->Visible) { // BarCodeDesign ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->BarCodeDesign) == "") { ?>
		<th data-name="BarCodeDesign" class="<?php echo $pharmacy_products->BarCodeDesign->headerCellClass() ?>"><div id="elh_pharmacy_products_BarCodeDesign" class="pharmacy_products_BarCodeDesign"><div class="ew-table-header-caption"><?php echo $pharmacy_products->BarCodeDesign->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BarCodeDesign" class="<?php echo $pharmacy_products->BarCodeDesign->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->BarCodeDesign) ?>',1);"><div id="elh_pharmacy_products_BarCodeDesign" class="pharmacy_products_BarCodeDesign">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->BarCodeDesign->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->BarCodeDesign->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->BarCodeDesign->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->AcceptRemarksInBill->Visible) { // AcceptRemarksInBill ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->AcceptRemarksInBill) == "") { ?>
		<th data-name="AcceptRemarksInBill" class="<?php echo $pharmacy_products->AcceptRemarksInBill->headerCellClass() ?>"><div id="elh_pharmacy_products_AcceptRemarksInBill" class="pharmacy_products_AcceptRemarksInBill"><div class="ew-table-header-caption"><?php echo $pharmacy_products->AcceptRemarksInBill->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AcceptRemarksInBill" class="<?php echo $pharmacy_products->AcceptRemarksInBill->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->AcceptRemarksInBill) ?>',1);"><div id="elh_pharmacy_products_AcceptRemarksInBill" class="pharmacy_products_AcceptRemarksInBill">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->AcceptRemarksInBill->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->AcceptRemarksInBill->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->AcceptRemarksInBill->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->Classification->Visible) { // Classification ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->Classification) == "") { ?>
		<th data-name="Classification" class="<?php echo $pharmacy_products->Classification->headerCellClass() ?>"><div id="elh_pharmacy_products_Classification" class="pharmacy_products_Classification"><div class="ew-table-header-caption"><?php echo $pharmacy_products->Classification->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Classification" class="<?php echo $pharmacy_products->Classification->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->Classification) ?>',1);"><div id="elh_pharmacy_products_Classification" class="pharmacy_products_Classification">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->Classification->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->Classification->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->Classification->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->TimeSlot->Visible) { // TimeSlot ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->TimeSlot) == "") { ?>
		<th data-name="TimeSlot" class="<?php echo $pharmacy_products->TimeSlot->headerCellClass() ?>"><div id="elh_pharmacy_products_TimeSlot" class="pharmacy_products_TimeSlot"><div class="ew-table-header-caption"><?php echo $pharmacy_products->TimeSlot->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TimeSlot" class="<?php echo $pharmacy_products->TimeSlot->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->TimeSlot) ?>',1);"><div id="elh_pharmacy_products_TimeSlot" class="pharmacy_products_TimeSlot">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->TimeSlot->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->TimeSlot->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->TimeSlot->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->IsBundle->Visible) { // IsBundle ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->IsBundle) == "") { ?>
		<th data-name="IsBundle" class="<?php echo $pharmacy_products->IsBundle->headerCellClass() ?>"><div id="elh_pharmacy_products_IsBundle" class="pharmacy_products_IsBundle"><div class="ew-table-header-caption"><?php echo $pharmacy_products->IsBundle->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IsBundle" class="<?php echo $pharmacy_products->IsBundle->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->IsBundle) ?>',1);"><div id="elh_pharmacy_products_IsBundle" class="pharmacy_products_IsBundle">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->IsBundle->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->IsBundle->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->IsBundle->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->ColorCode->Visible) { // ColorCode ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->ColorCode) == "") { ?>
		<th data-name="ColorCode" class="<?php echo $pharmacy_products->ColorCode->headerCellClass() ?>"><div id="elh_pharmacy_products_ColorCode" class="pharmacy_products_ColorCode"><div class="ew-table-header-caption"><?php echo $pharmacy_products->ColorCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ColorCode" class="<?php echo $pharmacy_products->ColorCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->ColorCode) ?>',1);"><div id="elh_pharmacy_products_ColorCode" class="pharmacy_products_ColorCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->ColorCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->ColorCode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->ColorCode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->GenderCode->Visible) { // GenderCode ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->GenderCode) == "") { ?>
		<th data-name="GenderCode" class="<?php echo $pharmacy_products->GenderCode->headerCellClass() ?>"><div id="elh_pharmacy_products_GenderCode" class="pharmacy_products_GenderCode"><div class="ew-table-header-caption"><?php echo $pharmacy_products->GenderCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GenderCode" class="<?php echo $pharmacy_products->GenderCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->GenderCode) ?>',1);"><div id="elh_pharmacy_products_GenderCode" class="pharmacy_products_GenderCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->GenderCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->GenderCode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->GenderCode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->SizeCode->Visible) { // SizeCode ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->SizeCode) == "") { ?>
		<th data-name="SizeCode" class="<?php echo $pharmacy_products->SizeCode->headerCellClass() ?>"><div id="elh_pharmacy_products_SizeCode" class="pharmacy_products_SizeCode"><div class="ew-table-header-caption"><?php echo $pharmacy_products->SizeCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SizeCode" class="<?php echo $pharmacy_products->SizeCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->SizeCode) ?>',1);"><div id="elh_pharmacy_products_SizeCode" class="pharmacy_products_SizeCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->SizeCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->SizeCode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->SizeCode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->GiftCard->Visible) { // GiftCard ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->GiftCard) == "") { ?>
		<th data-name="GiftCard" class="<?php echo $pharmacy_products->GiftCard->headerCellClass() ?>"><div id="elh_pharmacy_products_GiftCard" class="pharmacy_products_GiftCard"><div class="ew-table-header-caption"><?php echo $pharmacy_products->GiftCard->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GiftCard" class="<?php echo $pharmacy_products->GiftCard->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->GiftCard) ?>',1);"><div id="elh_pharmacy_products_GiftCard" class="pharmacy_products_GiftCard">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->GiftCard->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->GiftCard->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->GiftCard->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->ToonLabel->Visible) { // ToonLabel ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->ToonLabel) == "") { ?>
		<th data-name="ToonLabel" class="<?php echo $pharmacy_products->ToonLabel->headerCellClass() ?>"><div id="elh_pharmacy_products_ToonLabel" class="pharmacy_products_ToonLabel"><div class="ew-table-header-caption"><?php echo $pharmacy_products->ToonLabel->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ToonLabel" class="<?php echo $pharmacy_products->ToonLabel->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->ToonLabel) ?>',1);"><div id="elh_pharmacy_products_ToonLabel" class="pharmacy_products_ToonLabel">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->ToonLabel->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->ToonLabel->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->ToonLabel->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->GarmentType->Visible) { // GarmentType ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->GarmentType) == "") { ?>
		<th data-name="GarmentType" class="<?php echo $pharmacy_products->GarmentType->headerCellClass() ?>"><div id="elh_pharmacy_products_GarmentType" class="pharmacy_products_GarmentType"><div class="ew-table-header-caption"><?php echo $pharmacy_products->GarmentType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GarmentType" class="<?php echo $pharmacy_products->GarmentType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->GarmentType) ?>',1);"><div id="elh_pharmacy_products_GarmentType" class="pharmacy_products_GarmentType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->GarmentType->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->GarmentType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->GarmentType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->AgeGroup->Visible) { // AgeGroup ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->AgeGroup) == "") { ?>
		<th data-name="AgeGroup" class="<?php echo $pharmacy_products->AgeGroup->headerCellClass() ?>"><div id="elh_pharmacy_products_AgeGroup" class="pharmacy_products_AgeGroup"><div class="ew-table-header-caption"><?php echo $pharmacy_products->AgeGroup->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AgeGroup" class="<?php echo $pharmacy_products->AgeGroup->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->AgeGroup) ?>',1);"><div id="elh_pharmacy_products_AgeGroup" class="pharmacy_products_AgeGroup">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->AgeGroup->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->AgeGroup->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->AgeGroup->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->Season->Visible) { // Season ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->Season) == "") { ?>
		<th data-name="Season" class="<?php echo $pharmacy_products->Season->headerCellClass() ?>"><div id="elh_pharmacy_products_Season" class="pharmacy_products_Season"><div class="ew-table-header-caption"><?php echo $pharmacy_products->Season->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Season" class="<?php echo $pharmacy_products->Season->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->Season) ?>',1);"><div id="elh_pharmacy_products_Season" class="pharmacy_products_Season">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->Season->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->Season->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->Season->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->DailyStockEntry->Visible) { // DailyStockEntry ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->DailyStockEntry) == "") { ?>
		<th data-name="DailyStockEntry" class="<?php echo $pharmacy_products->DailyStockEntry->headerCellClass() ?>"><div id="elh_pharmacy_products_DailyStockEntry" class="pharmacy_products_DailyStockEntry"><div class="ew-table-header-caption"><?php echo $pharmacy_products->DailyStockEntry->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DailyStockEntry" class="<?php echo $pharmacy_products->DailyStockEntry->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->DailyStockEntry) ?>',1);"><div id="elh_pharmacy_products_DailyStockEntry" class="pharmacy_products_DailyStockEntry">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->DailyStockEntry->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->DailyStockEntry->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->DailyStockEntry->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->ModifierApplicable->Visible) { // ModifierApplicable ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->ModifierApplicable) == "") { ?>
		<th data-name="ModifierApplicable" class="<?php echo $pharmacy_products->ModifierApplicable->headerCellClass() ?>"><div id="elh_pharmacy_products_ModifierApplicable" class="pharmacy_products_ModifierApplicable"><div class="ew-table-header-caption"><?php echo $pharmacy_products->ModifierApplicable->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModifierApplicable" class="<?php echo $pharmacy_products->ModifierApplicable->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->ModifierApplicable) ?>',1);"><div id="elh_pharmacy_products_ModifierApplicable" class="pharmacy_products_ModifierApplicable">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->ModifierApplicable->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->ModifierApplicable->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->ModifierApplicable->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->ModifierType->Visible) { // ModifierType ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->ModifierType) == "") { ?>
		<th data-name="ModifierType" class="<?php echo $pharmacy_products->ModifierType->headerCellClass() ?>"><div id="elh_pharmacy_products_ModifierType" class="pharmacy_products_ModifierType"><div class="ew-table-header-caption"><?php echo $pharmacy_products->ModifierType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModifierType" class="<?php echo $pharmacy_products->ModifierType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->ModifierType) ?>',1);"><div id="elh_pharmacy_products_ModifierType" class="pharmacy_products_ModifierType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->ModifierType->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->ModifierType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->ModifierType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->AcceptZeroRate->Visible) { // AcceptZeroRate ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->AcceptZeroRate) == "") { ?>
		<th data-name="AcceptZeroRate" class="<?php echo $pharmacy_products->AcceptZeroRate->headerCellClass() ?>"><div id="elh_pharmacy_products_AcceptZeroRate" class="pharmacy_products_AcceptZeroRate"><div class="ew-table-header-caption"><?php echo $pharmacy_products->AcceptZeroRate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AcceptZeroRate" class="<?php echo $pharmacy_products->AcceptZeroRate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->AcceptZeroRate) ?>',1);"><div id="elh_pharmacy_products_AcceptZeroRate" class="pharmacy_products_AcceptZeroRate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->AcceptZeroRate->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->AcceptZeroRate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->AcceptZeroRate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->ExciseDutyCode->Visible) { // ExciseDutyCode ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->ExciseDutyCode) == "") { ?>
		<th data-name="ExciseDutyCode" class="<?php echo $pharmacy_products->ExciseDutyCode->headerCellClass() ?>"><div id="elh_pharmacy_products_ExciseDutyCode" class="pharmacy_products_ExciseDutyCode"><div class="ew-table-header-caption"><?php echo $pharmacy_products->ExciseDutyCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ExciseDutyCode" class="<?php echo $pharmacy_products->ExciseDutyCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->ExciseDutyCode) ?>',1);"><div id="elh_pharmacy_products_ExciseDutyCode" class="pharmacy_products_ExciseDutyCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->ExciseDutyCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->ExciseDutyCode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->ExciseDutyCode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->IndentProductGroupCode->Visible) { // IndentProductGroupCode ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->IndentProductGroupCode) == "") { ?>
		<th data-name="IndentProductGroupCode" class="<?php echo $pharmacy_products->IndentProductGroupCode->headerCellClass() ?>"><div id="elh_pharmacy_products_IndentProductGroupCode" class="pharmacy_products_IndentProductGroupCode"><div class="ew-table-header-caption"><?php echo $pharmacy_products->IndentProductGroupCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IndentProductGroupCode" class="<?php echo $pharmacy_products->IndentProductGroupCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->IndentProductGroupCode) ?>',1);"><div id="elh_pharmacy_products_IndentProductGroupCode" class="pharmacy_products_IndentProductGroupCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->IndentProductGroupCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->IndentProductGroupCode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->IndentProductGroupCode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->IsMultiBatch->Visible) { // IsMultiBatch ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->IsMultiBatch) == "") { ?>
		<th data-name="IsMultiBatch" class="<?php echo $pharmacy_products->IsMultiBatch->headerCellClass() ?>"><div id="elh_pharmacy_products_IsMultiBatch" class="pharmacy_products_IsMultiBatch"><div class="ew-table-header-caption"><?php echo $pharmacy_products->IsMultiBatch->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IsMultiBatch" class="<?php echo $pharmacy_products->IsMultiBatch->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->IsMultiBatch) ?>',1);"><div id="elh_pharmacy_products_IsMultiBatch" class="pharmacy_products_IsMultiBatch">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->IsMultiBatch->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->IsMultiBatch->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->IsMultiBatch->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->IsSingleBatch->Visible) { // IsSingleBatch ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->IsSingleBatch) == "") { ?>
		<th data-name="IsSingleBatch" class="<?php echo $pharmacy_products->IsSingleBatch->headerCellClass() ?>"><div id="elh_pharmacy_products_IsSingleBatch" class="pharmacy_products_IsSingleBatch"><div class="ew-table-header-caption"><?php echo $pharmacy_products->IsSingleBatch->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IsSingleBatch" class="<?php echo $pharmacy_products->IsSingleBatch->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->IsSingleBatch) ?>',1);"><div id="elh_pharmacy_products_IsSingleBatch" class="pharmacy_products_IsSingleBatch">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->IsSingleBatch->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->IsSingleBatch->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->IsSingleBatch->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->MarkUpRate1->Visible) { // MarkUpRate1 ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->MarkUpRate1) == "") { ?>
		<th data-name="MarkUpRate1" class="<?php echo $pharmacy_products->MarkUpRate1->headerCellClass() ?>"><div id="elh_pharmacy_products_MarkUpRate1" class="pharmacy_products_MarkUpRate1"><div class="ew-table-header-caption"><?php echo $pharmacy_products->MarkUpRate1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MarkUpRate1" class="<?php echo $pharmacy_products->MarkUpRate1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->MarkUpRate1) ?>',1);"><div id="elh_pharmacy_products_MarkUpRate1" class="pharmacy_products_MarkUpRate1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->MarkUpRate1->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->MarkUpRate1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->MarkUpRate1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->MarkDownRate1->Visible) { // MarkDownRate1 ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->MarkDownRate1) == "") { ?>
		<th data-name="MarkDownRate1" class="<?php echo $pharmacy_products->MarkDownRate1->headerCellClass() ?>"><div id="elh_pharmacy_products_MarkDownRate1" class="pharmacy_products_MarkDownRate1"><div class="ew-table-header-caption"><?php echo $pharmacy_products->MarkDownRate1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MarkDownRate1" class="<?php echo $pharmacy_products->MarkDownRate1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->MarkDownRate1) ?>',1);"><div id="elh_pharmacy_products_MarkDownRate1" class="pharmacy_products_MarkDownRate1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->MarkDownRate1->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->MarkDownRate1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->MarkDownRate1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->MarkUpRate2->Visible) { // MarkUpRate2 ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->MarkUpRate2) == "") { ?>
		<th data-name="MarkUpRate2" class="<?php echo $pharmacy_products->MarkUpRate2->headerCellClass() ?>"><div id="elh_pharmacy_products_MarkUpRate2" class="pharmacy_products_MarkUpRate2"><div class="ew-table-header-caption"><?php echo $pharmacy_products->MarkUpRate2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MarkUpRate2" class="<?php echo $pharmacy_products->MarkUpRate2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->MarkUpRate2) ?>',1);"><div id="elh_pharmacy_products_MarkUpRate2" class="pharmacy_products_MarkUpRate2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->MarkUpRate2->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->MarkUpRate2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->MarkUpRate2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->MarkDownRate2->Visible) { // MarkDownRate2 ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->MarkDownRate2) == "") { ?>
		<th data-name="MarkDownRate2" class="<?php echo $pharmacy_products->MarkDownRate2->headerCellClass() ?>"><div id="elh_pharmacy_products_MarkDownRate2" class="pharmacy_products_MarkDownRate2"><div class="ew-table-header-caption"><?php echo $pharmacy_products->MarkDownRate2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MarkDownRate2" class="<?php echo $pharmacy_products->MarkDownRate2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->MarkDownRate2) ?>',1);"><div id="elh_pharmacy_products_MarkDownRate2" class="pharmacy_products_MarkDownRate2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->MarkDownRate2->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->MarkDownRate2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->MarkDownRate2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->_Yield->Visible) { // Yield ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->_Yield) == "") { ?>
		<th data-name="_Yield" class="<?php echo $pharmacy_products->_Yield->headerCellClass() ?>"><div id="elh_pharmacy_products__Yield" class="pharmacy_products__Yield"><div class="ew-table-header-caption"><?php echo $pharmacy_products->_Yield->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_Yield" class="<?php echo $pharmacy_products->_Yield->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->_Yield) ?>',1);"><div id="elh_pharmacy_products__Yield" class="pharmacy_products__Yield">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->_Yield->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->_Yield->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->_Yield->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->RefProductCode->Visible) { // RefProductCode ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->RefProductCode) == "") { ?>
		<th data-name="RefProductCode" class="<?php echo $pharmacy_products->RefProductCode->headerCellClass() ?>"><div id="elh_pharmacy_products_RefProductCode" class="pharmacy_products_RefProductCode"><div class="ew-table-header-caption"><?php echo $pharmacy_products->RefProductCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RefProductCode" class="<?php echo $pharmacy_products->RefProductCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->RefProductCode) ?>',1);"><div id="elh_pharmacy_products_RefProductCode" class="pharmacy_products_RefProductCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->RefProductCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->RefProductCode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->RefProductCode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->Volume->Visible) { // Volume ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->Volume) == "") { ?>
		<th data-name="Volume" class="<?php echo $pharmacy_products->Volume->headerCellClass() ?>"><div id="elh_pharmacy_products_Volume" class="pharmacy_products_Volume"><div class="ew-table-header-caption"><?php echo $pharmacy_products->Volume->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Volume" class="<?php echo $pharmacy_products->Volume->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->Volume) ?>',1);"><div id="elh_pharmacy_products_Volume" class="pharmacy_products_Volume">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->Volume->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->Volume->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->Volume->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->MeasurementID->Visible) { // MeasurementID ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->MeasurementID) == "") { ?>
		<th data-name="MeasurementID" class="<?php echo $pharmacy_products->MeasurementID->headerCellClass() ?>"><div id="elh_pharmacy_products_MeasurementID" class="pharmacy_products_MeasurementID"><div class="ew-table-header-caption"><?php echo $pharmacy_products->MeasurementID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MeasurementID" class="<?php echo $pharmacy_products->MeasurementID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->MeasurementID) ?>',1);"><div id="elh_pharmacy_products_MeasurementID" class="pharmacy_products_MeasurementID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->MeasurementID->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->MeasurementID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->MeasurementID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->CountryCode->Visible) { // CountryCode ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->CountryCode) == "") { ?>
		<th data-name="CountryCode" class="<?php echo $pharmacy_products->CountryCode->headerCellClass() ?>"><div id="elh_pharmacy_products_CountryCode" class="pharmacy_products_CountryCode"><div class="ew-table-header-caption"><?php echo $pharmacy_products->CountryCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CountryCode" class="<?php echo $pharmacy_products->CountryCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->CountryCode) ?>',1);"><div id="elh_pharmacy_products_CountryCode" class="pharmacy_products_CountryCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->CountryCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->CountryCode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->CountryCode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->AcceptWMQty->Visible) { // AcceptWMQty ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->AcceptWMQty) == "") { ?>
		<th data-name="AcceptWMQty" class="<?php echo $pharmacy_products->AcceptWMQty->headerCellClass() ?>"><div id="elh_pharmacy_products_AcceptWMQty" class="pharmacy_products_AcceptWMQty"><div class="ew-table-header-caption"><?php echo $pharmacy_products->AcceptWMQty->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AcceptWMQty" class="<?php echo $pharmacy_products->AcceptWMQty->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->AcceptWMQty) ?>',1);"><div id="elh_pharmacy_products_AcceptWMQty" class="pharmacy_products_AcceptWMQty">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->AcceptWMQty->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->AcceptWMQty->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->AcceptWMQty->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->SingleBatchBasedOnRate->Visible) { // SingleBatchBasedOnRate ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->SingleBatchBasedOnRate) == "") { ?>
		<th data-name="SingleBatchBasedOnRate" class="<?php echo $pharmacy_products->SingleBatchBasedOnRate->headerCellClass() ?>"><div id="elh_pharmacy_products_SingleBatchBasedOnRate" class="pharmacy_products_SingleBatchBasedOnRate"><div class="ew-table-header-caption"><?php echo $pharmacy_products->SingleBatchBasedOnRate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SingleBatchBasedOnRate" class="<?php echo $pharmacy_products->SingleBatchBasedOnRate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->SingleBatchBasedOnRate) ?>',1);"><div id="elh_pharmacy_products_SingleBatchBasedOnRate" class="pharmacy_products_SingleBatchBasedOnRate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->SingleBatchBasedOnRate->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->SingleBatchBasedOnRate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->SingleBatchBasedOnRate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->TenderNo->Visible) { // TenderNo ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->TenderNo) == "") { ?>
		<th data-name="TenderNo" class="<?php echo $pharmacy_products->TenderNo->headerCellClass() ?>"><div id="elh_pharmacy_products_TenderNo" class="pharmacy_products_TenderNo"><div class="ew-table-header-caption"><?php echo $pharmacy_products->TenderNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TenderNo" class="<?php echo $pharmacy_products->TenderNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->TenderNo) ?>',1);"><div id="elh_pharmacy_products_TenderNo" class="pharmacy_products_TenderNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->TenderNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->TenderNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->TenderNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->SingleBillMaximumSoldQtyFiled->Visible) { // SingleBillMaximumSoldQtyFiled ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->SingleBillMaximumSoldQtyFiled) == "") { ?>
		<th data-name="SingleBillMaximumSoldQtyFiled" class="<?php echo $pharmacy_products->SingleBillMaximumSoldQtyFiled->headerCellClass() ?>"><div id="elh_pharmacy_products_SingleBillMaximumSoldQtyFiled" class="pharmacy_products_SingleBillMaximumSoldQtyFiled"><div class="ew-table-header-caption"><?php echo $pharmacy_products->SingleBillMaximumSoldQtyFiled->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SingleBillMaximumSoldQtyFiled" class="<?php echo $pharmacy_products->SingleBillMaximumSoldQtyFiled->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->SingleBillMaximumSoldQtyFiled) ?>',1);"><div id="elh_pharmacy_products_SingleBillMaximumSoldQtyFiled" class="pharmacy_products_SingleBillMaximumSoldQtyFiled">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->SingleBillMaximumSoldQtyFiled->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->SingleBillMaximumSoldQtyFiled->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->SingleBillMaximumSoldQtyFiled->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->Strength1->Visible) { // Strength1 ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->Strength1) == "") { ?>
		<th data-name="Strength1" class="<?php echo $pharmacy_products->Strength1->headerCellClass() ?>"><div id="elh_pharmacy_products_Strength1" class="pharmacy_products_Strength1"><div class="ew-table-header-caption"><?php echo $pharmacy_products->Strength1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Strength1" class="<?php echo $pharmacy_products->Strength1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->Strength1) ?>',1);"><div id="elh_pharmacy_products_Strength1" class="pharmacy_products_Strength1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->Strength1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->Strength1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->Strength1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->Strength2->Visible) { // Strength2 ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->Strength2) == "") { ?>
		<th data-name="Strength2" class="<?php echo $pharmacy_products->Strength2->headerCellClass() ?>"><div id="elh_pharmacy_products_Strength2" class="pharmacy_products_Strength2"><div class="ew-table-header-caption"><?php echo $pharmacy_products->Strength2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Strength2" class="<?php echo $pharmacy_products->Strength2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->Strength2) ?>',1);"><div id="elh_pharmacy_products_Strength2" class="pharmacy_products_Strength2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->Strength2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->Strength2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->Strength2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->Strength3->Visible) { // Strength3 ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->Strength3) == "") { ?>
		<th data-name="Strength3" class="<?php echo $pharmacy_products->Strength3->headerCellClass() ?>"><div id="elh_pharmacy_products_Strength3" class="pharmacy_products_Strength3"><div class="ew-table-header-caption"><?php echo $pharmacy_products->Strength3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Strength3" class="<?php echo $pharmacy_products->Strength3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->Strength3) ?>',1);"><div id="elh_pharmacy_products_Strength3" class="pharmacy_products_Strength3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->Strength3->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->Strength3->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->Strength3->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->Strength4->Visible) { // Strength4 ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->Strength4) == "") { ?>
		<th data-name="Strength4" class="<?php echo $pharmacy_products->Strength4->headerCellClass() ?>"><div id="elh_pharmacy_products_Strength4" class="pharmacy_products_Strength4"><div class="ew-table-header-caption"><?php echo $pharmacy_products->Strength4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Strength4" class="<?php echo $pharmacy_products->Strength4->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->Strength4) ?>',1);"><div id="elh_pharmacy_products_Strength4" class="pharmacy_products_Strength4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->Strength4->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->Strength4->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->Strength4->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->Strength5->Visible) { // Strength5 ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->Strength5) == "") { ?>
		<th data-name="Strength5" class="<?php echo $pharmacy_products->Strength5->headerCellClass() ?>"><div id="elh_pharmacy_products_Strength5" class="pharmacy_products_Strength5"><div class="ew-table-header-caption"><?php echo $pharmacy_products->Strength5->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Strength5" class="<?php echo $pharmacy_products->Strength5->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->Strength5) ?>',1);"><div id="elh_pharmacy_products_Strength5" class="pharmacy_products_Strength5">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->Strength5->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->Strength5->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->Strength5->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->IngredientCode1->Visible) { // IngredientCode1 ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->IngredientCode1) == "") { ?>
		<th data-name="IngredientCode1" class="<?php echo $pharmacy_products->IngredientCode1->headerCellClass() ?>"><div id="elh_pharmacy_products_IngredientCode1" class="pharmacy_products_IngredientCode1"><div class="ew-table-header-caption"><?php echo $pharmacy_products->IngredientCode1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IngredientCode1" class="<?php echo $pharmacy_products->IngredientCode1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->IngredientCode1) ?>',1);"><div id="elh_pharmacy_products_IngredientCode1" class="pharmacy_products_IngredientCode1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->IngredientCode1->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->IngredientCode1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->IngredientCode1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->IngredientCode2->Visible) { // IngredientCode2 ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->IngredientCode2) == "") { ?>
		<th data-name="IngredientCode2" class="<?php echo $pharmacy_products->IngredientCode2->headerCellClass() ?>"><div id="elh_pharmacy_products_IngredientCode2" class="pharmacy_products_IngredientCode2"><div class="ew-table-header-caption"><?php echo $pharmacy_products->IngredientCode2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IngredientCode2" class="<?php echo $pharmacy_products->IngredientCode2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->IngredientCode2) ?>',1);"><div id="elh_pharmacy_products_IngredientCode2" class="pharmacy_products_IngredientCode2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->IngredientCode2->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->IngredientCode2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->IngredientCode2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->IngredientCode3->Visible) { // IngredientCode3 ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->IngredientCode3) == "") { ?>
		<th data-name="IngredientCode3" class="<?php echo $pharmacy_products->IngredientCode3->headerCellClass() ?>"><div id="elh_pharmacy_products_IngredientCode3" class="pharmacy_products_IngredientCode3"><div class="ew-table-header-caption"><?php echo $pharmacy_products->IngredientCode3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IngredientCode3" class="<?php echo $pharmacy_products->IngredientCode3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->IngredientCode3) ?>',1);"><div id="elh_pharmacy_products_IngredientCode3" class="pharmacy_products_IngredientCode3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->IngredientCode3->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->IngredientCode3->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->IngredientCode3->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->IngredientCode4->Visible) { // IngredientCode4 ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->IngredientCode4) == "") { ?>
		<th data-name="IngredientCode4" class="<?php echo $pharmacy_products->IngredientCode4->headerCellClass() ?>"><div id="elh_pharmacy_products_IngredientCode4" class="pharmacy_products_IngredientCode4"><div class="ew-table-header-caption"><?php echo $pharmacy_products->IngredientCode4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IngredientCode4" class="<?php echo $pharmacy_products->IngredientCode4->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->IngredientCode4) ?>',1);"><div id="elh_pharmacy_products_IngredientCode4" class="pharmacy_products_IngredientCode4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->IngredientCode4->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->IngredientCode4->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->IngredientCode4->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->IngredientCode5->Visible) { // IngredientCode5 ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->IngredientCode5) == "") { ?>
		<th data-name="IngredientCode5" class="<?php echo $pharmacy_products->IngredientCode5->headerCellClass() ?>"><div id="elh_pharmacy_products_IngredientCode5" class="pharmacy_products_IngredientCode5"><div class="ew-table-header-caption"><?php echo $pharmacy_products->IngredientCode5->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IngredientCode5" class="<?php echo $pharmacy_products->IngredientCode5->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->IngredientCode5) ?>',1);"><div id="elh_pharmacy_products_IngredientCode5" class="pharmacy_products_IngredientCode5">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->IngredientCode5->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->IngredientCode5->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->IngredientCode5->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->OrderType->Visible) { // OrderType ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->OrderType) == "") { ?>
		<th data-name="OrderType" class="<?php echo $pharmacy_products->OrderType->headerCellClass() ?>"><div id="elh_pharmacy_products_OrderType" class="pharmacy_products_OrderType"><div class="ew-table-header-caption"><?php echo $pharmacy_products->OrderType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OrderType" class="<?php echo $pharmacy_products->OrderType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->OrderType) ?>',1);"><div id="elh_pharmacy_products_OrderType" class="pharmacy_products_OrderType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->OrderType->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->OrderType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->OrderType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->StockUOM->Visible) { // StockUOM ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->StockUOM) == "") { ?>
		<th data-name="StockUOM" class="<?php echo $pharmacy_products->StockUOM->headerCellClass() ?>"><div id="elh_pharmacy_products_StockUOM" class="pharmacy_products_StockUOM"><div class="ew-table-header-caption"><?php echo $pharmacy_products->StockUOM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StockUOM" class="<?php echo $pharmacy_products->StockUOM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->StockUOM) ?>',1);"><div id="elh_pharmacy_products_StockUOM" class="pharmacy_products_StockUOM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->StockUOM->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->StockUOM->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->StockUOM->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->PriceUOM->Visible) { // PriceUOM ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->PriceUOM) == "") { ?>
		<th data-name="PriceUOM" class="<?php echo $pharmacy_products->PriceUOM->headerCellClass() ?>"><div id="elh_pharmacy_products_PriceUOM" class="pharmacy_products_PriceUOM"><div class="ew-table-header-caption"><?php echo $pharmacy_products->PriceUOM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PriceUOM" class="<?php echo $pharmacy_products->PriceUOM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->PriceUOM) ?>',1);"><div id="elh_pharmacy_products_PriceUOM" class="pharmacy_products_PriceUOM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->PriceUOM->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->PriceUOM->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->PriceUOM->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->DefaultSaleUOM->Visible) { // DefaultSaleUOM ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->DefaultSaleUOM) == "") { ?>
		<th data-name="DefaultSaleUOM" class="<?php echo $pharmacy_products->DefaultSaleUOM->headerCellClass() ?>"><div id="elh_pharmacy_products_DefaultSaleUOM" class="pharmacy_products_DefaultSaleUOM"><div class="ew-table-header-caption"><?php echo $pharmacy_products->DefaultSaleUOM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DefaultSaleUOM" class="<?php echo $pharmacy_products->DefaultSaleUOM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->DefaultSaleUOM) ?>',1);"><div id="elh_pharmacy_products_DefaultSaleUOM" class="pharmacy_products_DefaultSaleUOM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->DefaultSaleUOM->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->DefaultSaleUOM->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->DefaultSaleUOM->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->DefaultPurchaseUOM->Visible) { // DefaultPurchaseUOM ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->DefaultPurchaseUOM) == "") { ?>
		<th data-name="DefaultPurchaseUOM" class="<?php echo $pharmacy_products->DefaultPurchaseUOM->headerCellClass() ?>"><div id="elh_pharmacy_products_DefaultPurchaseUOM" class="pharmacy_products_DefaultPurchaseUOM"><div class="ew-table-header-caption"><?php echo $pharmacy_products->DefaultPurchaseUOM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DefaultPurchaseUOM" class="<?php echo $pharmacy_products->DefaultPurchaseUOM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->DefaultPurchaseUOM) ?>',1);"><div id="elh_pharmacy_products_DefaultPurchaseUOM" class="pharmacy_products_DefaultPurchaseUOM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->DefaultPurchaseUOM->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->DefaultPurchaseUOM->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->DefaultPurchaseUOM->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->ReportingUOM->Visible) { // ReportingUOM ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->ReportingUOM) == "") { ?>
		<th data-name="ReportingUOM" class="<?php echo $pharmacy_products->ReportingUOM->headerCellClass() ?>"><div id="elh_pharmacy_products_ReportingUOM" class="pharmacy_products_ReportingUOM"><div class="ew-table-header-caption"><?php echo $pharmacy_products->ReportingUOM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReportingUOM" class="<?php echo $pharmacy_products->ReportingUOM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->ReportingUOM) ?>',1);"><div id="elh_pharmacy_products_ReportingUOM" class="pharmacy_products_ReportingUOM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->ReportingUOM->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->ReportingUOM->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->ReportingUOM->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->LastPurchasedUOM->Visible) { // LastPurchasedUOM ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->LastPurchasedUOM) == "") { ?>
		<th data-name="LastPurchasedUOM" class="<?php echo $pharmacy_products->LastPurchasedUOM->headerCellClass() ?>"><div id="elh_pharmacy_products_LastPurchasedUOM" class="pharmacy_products_LastPurchasedUOM"><div class="ew-table-header-caption"><?php echo $pharmacy_products->LastPurchasedUOM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LastPurchasedUOM" class="<?php echo $pharmacy_products->LastPurchasedUOM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->LastPurchasedUOM) ?>',1);"><div id="elh_pharmacy_products_LastPurchasedUOM" class="pharmacy_products_LastPurchasedUOM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->LastPurchasedUOM->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->LastPurchasedUOM->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->LastPurchasedUOM->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->TreatmentCodes->Visible) { // TreatmentCodes ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->TreatmentCodes) == "") { ?>
		<th data-name="TreatmentCodes" class="<?php echo $pharmacy_products->TreatmentCodes->headerCellClass() ?>"><div id="elh_pharmacy_products_TreatmentCodes" class="pharmacy_products_TreatmentCodes"><div class="ew-table-header-caption"><?php echo $pharmacy_products->TreatmentCodes->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TreatmentCodes" class="<?php echo $pharmacy_products->TreatmentCodes->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->TreatmentCodes) ?>',1);"><div id="elh_pharmacy_products_TreatmentCodes" class="pharmacy_products_TreatmentCodes">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->TreatmentCodes->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->TreatmentCodes->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->TreatmentCodes->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->InsuranceType->Visible) { // InsuranceType ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->InsuranceType) == "") { ?>
		<th data-name="InsuranceType" class="<?php echo $pharmacy_products->InsuranceType->headerCellClass() ?>"><div id="elh_pharmacy_products_InsuranceType" class="pharmacy_products_InsuranceType"><div class="ew-table-header-caption"><?php echo $pharmacy_products->InsuranceType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="InsuranceType" class="<?php echo $pharmacy_products->InsuranceType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->InsuranceType) ?>',1);"><div id="elh_pharmacy_products_InsuranceType" class="pharmacy_products_InsuranceType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->InsuranceType->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->InsuranceType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->InsuranceType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->CoverageGroupCodes->Visible) { // CoverageGroupCodes ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->CoverageGroupCodes) == "") { ?>
		<th data-name="CoverageGroupCodes" class="<?php echo $pharmacy_products->CoverageGroupCodes->headerCellClass() ?>"><div id="elh_pharmacy_products_CoverageGroupCodes" class="pharmacy_products_CoverageGroupCodes"><div class="ew-table-header-caption"><?php echo $pharmacy_products->CoverageGroupCodes->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CoverageGroupCodes" class="<?php echo $pharmacy_products->CoverageGroupCodes->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->CoverageGroupCodes) ?>',1);"><div id="elh_pharmacy_products_CoverageGroupCodes" class="pharmacy_products_CoverageGroupCodes">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->CoverageGroupCodes->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->CoverageGroupCodes->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->CoverageGroupCodes->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->MultipleUOM->Visible) { // MultipleUOM ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->MultipleUOM) == "") { ?>
		<th data-name="MultipleUOM" class="<?php echo $pharmacy_products->MultipleUOM->headerCellClass() ?>"><div id="elh_pharmacy_products_MultipleUOM" class="pharmacy_products_MultipleUOM"><div class="ew-table-header-caption"><?php echo $pharmacy_products->MultipleUOM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MultipleUOM" class="<?php echo $pharmacy_products->MultipleUOM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->MultipleUOM) ?>',1);"><div id="elh_pharmacy_products_MultipleUOM" class="pharmacy_products_MultipleUOM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->MultipleUOM->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->MultipleUOM->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->MultipleUOM->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->SalePriceComputation->Visible) { // SalePriceComputation ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->SalePriceComputation) == "") { ?>
		<th data-name="SalePriceComputation" class="<?php echo $pharmacy_products->SalePriceComputation->headerCellClass() ?>"><div id="elh_pharmacy_products_SalePriceComputation" class="pharmacy_products_SalePriceComputation"><div class="ew-table-header-caption"><?php echo $pharmacy_products->SalePriceComputation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SalePriceComputation" class="<?php echo $pharmacy_products->SalePriceComputation->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->SalePriceComputation) ?>',1);"><div id="elh_pharmacy_products_SalePriceComputation" class="pharmacy_products_SalePriceComputation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->SalePriceComputation->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->SalePriceComputation->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->SalePriceComputation->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->StockCorrection->Visible) { // StockCorrection ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->StockCorrection) == "") { ?>
		<th data-name="StockCorrection" class="<?php echo $pharmacy_products->StockCorrection->headerCellClass() ?>"><div id="elh_pharmacy_products_StockCorrection" class="pharmacy_products_StockCorrection"><div class="ew-table-header-caption"><?php echo $pharmacy_products->StockCorrection->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StockCorrection" class="<?php echo $pharmacy_products->StockCorrection->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->StockCorrection) ?>',1);"><div id="elh_pharmacy_products_StockCorrection" class="pharmacy_products_StockCorrection">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->StockCorrection->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->StockCorrection->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->StockCorrection->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->LBTPercentage->Visible) { // LBTPercentage ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->LBTPercentage) == "") { ?>
		<th data-name="LBTPercentage" class="<?php echo $pharmacy_products->LBTPercentage->headerCellClass() ?>"><div id="elh_pharmacy_products_LBTPercentage" class="pharmacy_products_LBTPercentage"><div class="ew-table-header-caption"><?php echo $pharmacy_products->LBTPercentage->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LBTPercentage" class="<?php echo $pharmacy_products->LBTPercentage->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->LBTPercentage) ?>',1);"><div id="elh_pharmacy_products_LBTPercentage" class="pharmacy_products_LBTPercentage">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->LBTPercentage->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->LBTPercentage->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->LBTPercentage->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->SalesCommission->Visible) { // SalesCommission ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->SalesCommission) == "") { ?>
		<th data-name="SalesCommission" class="<?php echo $pharmacy_products->SalesCommission->headerCellClass() ?>"><div id="elh_pharmacy_products_SalesCommission" class="pharmacy_products_SalesCommission"><div class="ew-table-header-caption"><?php echo $pharmacy_products->SalesCommission->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SalesCommission" class="<?php echo $pharmacy_products->SalesCommission->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->SalesCommission) ?>',1);"><div id="elh_pharmacy_products_SalesCommission" class="pharmacy_products_SalesCommission">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->SalesCommission->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->SalesCommission->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->SalesCommission->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->LockedStock->Visible) { // LockedStock ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->LockedStock) == "") { ?>
		<th data-name="LockedStock" class="<?php echo $pharmacy_products->LockedStock->headerCellClass() ?>"><div id="elh_pharmacy_products_LockedStock" class="pharmacy_products_LockedStock"><div class="ew-table-header-caption"><?php echo $pharmacy_products->LockedStock->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LockedStock" class="<?php echo $pharmacy_products->LockedStock->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->LockedStock) ?>',1);"><div id="elh_pharmacy_products_LockedStock" class="pharmacy_products_LockedStock">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->LockedStock->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->LockedStock->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->LockedStock->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->MinMaxUOM->Visible) { // MinMaxUOM ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->MinMaxUOM) == "") { ?>
		<th data-name="MinMaxUOM" class="<?php echo $pharmacy_products->MinMaxUOM->headerCellClass() ?>"><div id="elh_pharmacy_products_MinMaxUOM" class="pharmacy_products_MinMaxUOM"><div class="ew-table-header-caption"><?php echo $pharmacy_products->MinMaxUOM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MinMaxUOM" class="<?php echo $pharmacy_products->MinMaxUOM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->MinMaxUOM) ?>',1);"><div id="elh_pharmacy_products_MinMaxUOM" class="pharmacy_products_MinMaxUOM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->MinMaxUOM->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->MinMaxUOM->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->MinMaxUOM->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->ExpiryMfrDateFormat->Visible) { // ExpiryMfrDateFormat ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->ExpiryMfrDateFormat) == "") { ?>
		<th data-name="ExpiryMfrDateFormat" class="<?php echo $pharmacy_products->ExpiryMfrDateFormat->headerCellClass() ?>"><div id="elh_pharmacy_products_ExpiryMfrDateFormat" class="pharmacy_products_ExpiryMfrDateFormat"><div class="ew-table-header-caption"><?php echo $pharmacy_products->ExpiryMfrDateFormat->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ExpiryMfrDateFormat" class="<?php echo $pharmacy_products->ExpiryMfrDateFormat->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->ExpiryMfrDateFormat) ?>',1);"><div id="elh_pharmacy_products_ExpiryMfrDateFormat" class="pharmacy_products_ExpiryMfrDateFormat">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->ExpiryMfrDateFormat->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->ExpiryMfrDateFormat->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->ExpiryMfrDateFormat->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->ProductLifeTime->Visible) { // ProductLifeTime ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->ProductLifeTime) == "") { ?>
		<th data-name="ProductLifeTime" class="<?php echo $pharmacy_products->ProductLifeTime->headerCellClass() ?>"><div id="elh_pharmacy_products_ProductLifeTime" class="pharmacy_products_ProductLifeTime"><div class="ew-table-header-caption"><?php echo $pharmacy_products->ProductLifeTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProductLifeTime" class="<?php echo $pharmacy_products->ProductLifeTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->ProductLifeTime) ?>',1);"><div id="elh_pharmacy_products_ProductLifeTime" class="pharmacy_products_ProductLifeTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->ProductLifeTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->ProductLifeTime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->ProductLifeTime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->IsCombo->Visible) { // IsCombo ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->IsCombo) == "") { ?>
		<th data-name="IsCombo" class="<?php echo $pharmacy_products->IsCombo->headerCellClass() ?>"><div id="elh_pharmacy_products_IsCombo" class="pharmacy_products_IsCombo"><div class="ew-table-header-caption"><?php echo $pharmacy_products->IsCombo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IsCombo" class="<?php echo $pharmacy_products->IsCombo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->IsCombo) ?>',1);"><div id="elh_pharmacy_products_IsCombo" class="pharmacy_products_IsCombo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->IsCombo->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->IsCombo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->IsCombo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->ComboTypeCode->Visible) { // ComboTypeCode ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->ComboTypeCode) == "") { ?>
		<th data-name="ComboTypeCode" class="<?php echo $pharmacy_products->ComboTypeCode->headerCellClass() ?>"><div id="elh_pharmacy_products_ComboTypeCode" class="pharmacy_products_ComboTypeCode"><div class="ew-table-header-caption"><?php echo $pharmacy_products->ComboTypeCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ComboTypeCode" class="<?php echo $pharmacy_products->ComboTypeCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->ComboTypeCode) ?>',1);"><div id="elh_pharmacy_products_ComboTypeCode" class="pharmacy_products_ComboTypeCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->ComboTypeCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->ComboTypeCode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->ComboTypeCode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->AttributeCount6->Visible) { // AttributeCount6 ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->AttributeCount6) == "") { ?>
		<th data-name="AttributeCount6" class="<?php echo $pharmacy_products->AttributeCount6->headerCellClass() ?>"><div id="elh_pharmacy_products_AttributeCount6" class="pharmacy_products_AttributeCount6"><div class="ew-table-header-caption"><?php echo $pharmacy_products->AttributeCount6->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AttributeCount6" class="<?php echo $pharmacy_products->AttributeCount6->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->AttributeCount6) ?>',1);"><div id="elh_pharmacy_products_AttributeCount6" class="pharmacy_products_AttributeCount6">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->AttributeCount6->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->AttributeCount6->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->AttributeCount6->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->AttributeCount7->Visible) { // AttributeCount7 ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->AttributeCount7) == "") { ?>
		<th data-name="AttributeCount7" class="<?php echo $pharmacy_products->AttributeCount7->headerCellClass() ?>"><div id="elh_pharmacy_products_AttributeCount7" class="pharmacy_products_AttributeCount7"><div class="ew-table-header-caption"><?php echo $pharmacy_products->AttributeCount7->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AttributeCount7" class="<?php echo $pharmacy_products->AttributeCount7->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->AttributeCount7) ?>',1);"><div id="elh_pharmacy_products_AttributeCount7" class="pharmacy_products_AttributeCount7">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->AttributeCount7->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->AttributeCount7->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->AttributeCount7->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->AttributeCount8->Visible) { // AttributeCount8 ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->AttributeCount8) == "") { ?>
		<th data-name="AttributeCount8" class="<?php echo $pharmacy_products->AttributeCount8->headerCellClass() ?>"><div id="elh_pharmacy_products_AttributeCount8" class="pharmacy_products_AttributeCount8"><div class="ew-table-header-caption"><?php echo $pharmacy_products->AttributeCount8->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AttributeCount8" class="<?php echo $pharmacy_products->AttributeCount8->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->AttributeCount8) ?>',1);"><div id="elh_pharmacy_products_AttributeCount8" class="pharmacy_products_AttributeCount8">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->AttributeCount8->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->AttributeCount8->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->AttributeCount8->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->AttributeCount9->Visible) { // AttributeCount9 ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->AttributeCount9) == "") { ?>
		<th data-name="AttributeCount9" class="<?php echo $pharmacy_products->AttributeCount9->headerCellClass() ?>"><div id="elh_pharmacy_products_AttributeCount9" class="pharmacy_products_AttributeCount9"><div class="ew-table-header-caption"><?php echo $pharmacy_products->AttributeCount9->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AttributeCount9" class="<?php echo $pharmacy_products->AttributeCount9->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->AttributeCount9) ?>',1);"><div id="elh_pharmacy_products_AttributeCount9" class="pharmacy_products_AttributeCount9">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->AttributeCount9->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->AttributeCount9->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->AttributeCount9->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->AttributeCount10->Visible) { // AttributeCount10 ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->AttributeCount10) == "") { ?>
		<th data-name="AttributeCount10" class="<?php echo $pharmacy_products->AttributeCount10->headerCellClass() ?>"><div id="elh_pharmacy_products_AttributeCount10" class="pharmacy_products_AttributeCount10"><div class="ew-table-header-caption"><?php echo $pharmacy_products->AttributeCount10->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AttributeCount10" class="<?php echo $pharmacy_products->AttributeCount10->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->AttributeCount10) ?>',1);"><div id="elh_pharmacy_products_AttributeCount10" class="pharmacy_products_AttributeCount10">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->AttributeCount10->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->AttributeCount10->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->AttributeCount10->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->LabourCharge->Visible) { // LabourCharge ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->LabourCharge) == "") { ?>
		<th data-name="LabourCharge" class="<?php echo $pharmacy_products->LabourCharge->headerCellClass() ?>"><div id="elh_pharmacy_products_LabourCharge" class="pharmacy_products_LabourCharge"><div class="ew-table-header-caption"><?php echo $pharmacy_products->LabourCharge->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LabourCharge" class="<?php echo $pharmacy_products->LabourCharge->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->LabourCharge) ?>',1);"><div id="elh_pharmacy_products_LabourCharge" class="pharmacy_products_LabourCharge">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->LabourCharge->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->LabourCharge->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->LabourCharge->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->AffectOtherCharge->Visible) { // AffectOtherCharge ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->AffectOtherCharge) == "") { ?>
		<th data-name="AffectOtherCharge" class="<?php echo $pharmacy_products->AffectOtherCharge->headerCellClass() ?>"><div id="elh_pharmacy_products_AffectOtherCharge" class="pharmacy_products_AffectOtherCharge"><div class="ew-table-header-caption"><?php echo $pharmacy_products->AffectOtherCharge->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AffectOtherCharge" class="<?php echo $pharmacy_products->AffectOtherCharge->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->AffectOtherCharge) ?>',1);"><div id="elh_pharmacy_products_AffectOtherCharge" class="pharmacy_products_AffectOtherCharge">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->AffectOtherCharge->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->AffectOtherCharge->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->AffectOtherCharge->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->DosageInfo->Visible) { // DosageInfo ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->DosageInfo) == "") { ?>
		<th data-name="DosageInfo" class="<?php echo $pharmacy_products->DosageInfo->headerCellClass() ?>"><div id="elh_pharmacy_products_DosageInfo" class="pharmacy_products_DosageInfo"><div class="ew-table-header-caption"><?php echo $pharmacy_products->DosageInfo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DosageInfo" class="<?php echo $pharmacy_products->DosageInfo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->DosageInfo) ?>',1);"><div id="elh_pharmacy_products_DosageInfo" class="pharmacy_products_DosageInfo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->DosageInfo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->DosageInfo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->DosageInfo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->DosageType->Visible) { // DosageType ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->DosageType) == "") { ?>
		<th data-name="DosageType" class="<?php echo $pharmacy_products->DosageType->headerCellClass() ?>"><div id="elh_pharmacy_products_DosageType" class="pharmacy_products_DosageType"><div class="ew-table-header-caption"><?php echo $pharmacy_products->DosageType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DosageType" class="<?php echo $pharmacy_products->DosageType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->DosageType) ?>',1);"><div id="elh_pharmacy_products_DosageType" class="pharmacy_products_DosageType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->DosageType->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->DosageType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->DosageType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->DefaultIndentUOM->Visible) { // DefaultIndentUOM ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->DefaultIndentUOM) == "") { ?>
		<th data-name="DefaultIndentUOM" class="<?php echo $pharmacy_products->DefaultIndentUOM->headerCellClass() ?>"><div id="elh_pharmacy_products_DefaultIndentUOM" class="pharmacy_products_DefaultIndentUOM"><div class="ew-table-header-caption"><?php echo $pharmacy_products->DefaultIndentUOM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DefaultIndentUOM" class="<?php echo $pharmacy_products->DefaultIndentUOM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->DefaultIndentUOM) ?>',1);"><div id="elh_pharmacy_products_DefaultIndentUOM" class="pharmacy_products_DefaultIndentUOM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->DefaultIndentUOM->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->DefaultIndentUOM->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->DefaultIndentUOM->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->PromoTag->Visible) { // PromoTag ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->PromoTag) == "") { ?>
		<th data-name="PromoTag" class="<?php echo $pharmacy_products->PromoTag->headerCellClass() ?>"><div id="elh_pharmacy_products_PromoTag" class="pharmacy_products_PromoTag"><div class="ew-table-header-caption"><?php echo $pharmacy_products->PromoTag->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PromoTag" class="<?php echo $pharmacy_products->PromoTag->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->PromoTag) ?>',1);"><div id="elh_pharmacy_products_PromoTag" class="pharmacy_products_PromoTag">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->PromoTag->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->PromoTag->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->PromoTag->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->BillLevelPromoTag->Visible) { // BillLevelPromoTag ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->BillLevelPromoTag) == "") { ?>
		<th data-name="BillLevelPromoTag" class="<?php echo $pharmacy_products->BillLevelPromoTag->headerCellClass() ?>"><div id="elh_pharmacy_products_BillLevelPromoTag" class="pharmacy_products_BillLevelPromoTag"><div class="ew-table-header-caption"><?php echo $pharmacy_products->BillLevelPromoTag->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillLevelPromoTag" class="<?php echo $pharmacy_products->BillLevelPromoTag->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->BillLevelPromoTag) ?>',1);"><div id="elh_pharmacy_products_BillLevelPromoTag" class="pharmacy_products_BillLevelPromoTag">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->BillLevelPromoTag->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->BillLevelPromoTag->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->BillLevelPromoTag->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->IsMRPProduct->Visible) { // IsMRPProduct ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->IsMRPProduct) == "") { ?>
		<th data-name="IsMRPProduct" class="<?php echo $pharmacy_products->IsMRPProduct->headerCellClass() ?>"><div id="elh_pharmacy_products_IsMRPProduct" class="pharmacy_products_IsMRPProduct"><div class="ew-table-header-caption"><?php echo $pharmacy_products->IsMRPProduct->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IsMRPProduct" class="<?php echo $pharmacy_products->IsMRPProduct->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->IsMRPProduct) ?>',1);"><div id="elh_pharmacy_products_IsMRPProduct" class="pharmacy_products_IsMRPProduct">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->IsMRPProduct->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->IsMRPProduct->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->IsMRPProduct->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->AlternateSaleUOM->Visible) { // AlternateSaleUOM ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->AlternateSaleUOM) == "") { ?>
		<th data-name="AlternateSaleUOM" class="<?php echo $pharmacy_products->AlternateSaleUOM->headerCellClass() ?>"><div id="elh_pharmacy_products_AlternateSaleUOM" class="pharmacy_products_AlternateSaleUOM"><div class="ew-table-header-caption"><?php echo $pharmacy_products->AlternateSaleUOM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AlternateSaleUOM" class="<?php echo $pharmacy_products->AlternateSaleUOM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->AlternateSaleUOM) ?>',1);"><div id="elh_pharmacy_products_AlternateSaleUOM" class="pharmacy_products_AlternateSaleUOM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->AlternateSaleUOM->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->AlternateSaleUOM->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->AlternateSaleUOM->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->FreeUOM->Visible) { // FreeUOM ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->FreeUOM) == "") { ?>
		<th data-name="FreeUOM" class="<?php echo $pharmacy_products->FreeUOM->headerCellClass() ?>"><div id="elh_pharmacy_products_FreeUOM" class="pharmacy_products_FreeUOM"><div class="ew-table-header-caption"><?php echo $pharmacy_products->FreeUOM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FreeUOM" class="<?php echo $pharmacy_products->FreeUOM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->FreeUOM) ?>',1);"><div id="elh_pharmacy_products_FreeUOM" class="pharmacy_products_FreeUOM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->FreeUOM->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->FreeUOM->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->FreeUOM->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->MarketedCode->Visible) { // MarketedCode ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->MarketedCode) == "") { ?>
		<th data-name="MarketedCode" class="<?php echo $pharmacy_products->MarketedCode->headerCellClass() ?>"><div id="elh_pharmacy_products_MarketedCode" class="pharmacy_products_MarketedCode"><div class="ew-table-header-caption"><?php echo $pharmacy_products->MarketedCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MarketedCode" class="<?php echo $pharmacy_products->MarketedCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->MarketedCode) ?>',1);"><div id="elh_pharmacy_products_MarketedCode" class="pharmacy_products_MarketedCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->MarketedCode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->MarketedCode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->MarketedCode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->MinimumSalePrice->Visible) { // MinimumSalePrice ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->MinimumSalePrice) == "") { ?>
		<th data-name="MinimumSalePrice" class="<?php echo $pharmacy_products->MinimumSalePrice->headerCellClass() ?>"><div id="elh_pharmacy_products_MinimumSalePrice" class="pharmacy_products_MinimumSalePrice"><div class="ew-table-header-caption"><?php echo $pharmacy_products->MinimumSalePrice->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MinimumSalePrice" class="<?php echo $pharmacy_products->MinimumSalePrice->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->MinimumSalePrice) ?>',1);"><div id="elh_pharmacy_products_MinimumSalePrice" class="pharmacy_products_MinimumSalePrice">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->MinimumSalePrice->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->MinimumSalePrice->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->MinimumSalePrice->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->PRate1->Visible) { // PRate1 ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->PRate1) == "") { ?>
		<th data-name="PRate1" class="<?php echo $pharmacy_products->PRate1->headerCellClass() ?>"><div id="elh_pharmacy_products_PRate1" class="pharmacy_products_PRate1"><div class="ew-table-header-caption"><?php echo $pharmacy_products->PRate1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRate1" class="<?php echo $pharmacy_products->PRate1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->PRate1) ?>',1);"><div id="elh_pharmacy_products_PRate1" class="pharmacy_products_PRate1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->PRate1->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->PRate1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->PRate1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->PRate2->Visible) { // PRate2 ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->PRate2) == "") { ?>
		<th data-name="PRate2" class="<?php echo $pharmacy_products->PRate2->headerCellClass() ?>"><div id="elh_pharmacy_products_PRate2" class="pharmacy_products_PRate2"><div class="ew-table-header-caption"><?php echo $pharmacy_products->PRate2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRate2" class="<?php echo $pharmacy_products->PRate2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->PRate2) ?>',1);"><div id="elh_pharmacy_products_PRate2" class="pharmacy_products_PRate2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->PRate2->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->PRate2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->PRate2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->LPItemCost->Visible) { // LPItemCost ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->LPItemCost) == "") { ?>
		<th data-name="LPItemCost" class="<?php echo $pharmacy_products->LPItemCost->headerCellClass() ?>"><div id="elh_pharmacy_products_LPItemCost" class="pharmacy_products_LPItemCost"><div class="ew-table-header-caption"><?php echo $pharmacy_products->LPItemCost->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LPItemCost" class="<?php echo $pharmacy_products->LPItemCost->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->LPItemCost) ?>',1);"><div id="elh_pharmacy_products_LPItemCost" class="pharmacy_products_LPItemCost">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->LPItemCost->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->LPItemCost->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->LPItemCost->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->FixedItemCost->Visible) { // FixedItemCost ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->FixedItemCost) == "") { ?>
		<th data-name="FixedItemCost" class="<?php echo $pharmacy_products->FixedItemCost->headerCellClass() ?>"><div id="elh_pharmacy_products_FixedItemCost" class="pharmacy_products_FixedItemCost"><div class="ew-table-header-caption"><?php echo $pharmacy_products->FixedItemCost->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FixedItemCost" class="<?php echo $pharmacy_products->FixedItemCost->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->FixedItemCost) ?>',1);"><div id="elh_pharmacy_products_FixedItemCost" class="pharmacy_products_FixedItemCost">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->FixedItemCost->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->FixedItemCost->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->FixedItemCost->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->HSNId->Visible) { // HSNId ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->HSNId) == "") { ?>
		<th data-name="HSNId" class="<?php echo $pharmacy_products->HSNId->headerCellClass() ?>"><div id="elh_pharmacy_products_HSNId" class="pharmacy_products_HSNId"><div class="ew-table-header-caption"><?php echo $pharmacy_products->HSNId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HSNId" class="<?php echo $pharmacy_products->HSNId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->HSNId) ?>',1);"><div id="elh_pharmacy_products_HSNId" class="pharmacy_products_HSNId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->HSNId->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->HSNId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->HSNId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->TaxInclusive->Visible) { // TaxInclusive ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->TaxInclusive) == "") { ?>
		<th data-name="TaxInclusive" class="<?php echo $pharmacy_products->TaxInclusive->headerCellClass() ?>"><div id="elh_pharmacy_products_TaxInclusive" class="pharmacy_products_TaxInclusive"><div class="ew-table-header-caption"><?php echo $pharmacy_products->TaxInclusive->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TaxInclusive" class="<?php echo $pharmacy_products->TaxInclusive->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->TaxInclusive) ?>',1);"><div id="elh_pharmacy_products_TaxInclusive" class="pharmacy_products_TaxInclusive">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->TaxInclusive->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->TaxInclusive->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->TaxInclusive->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->EligibleforWarranty->Visible) { // EligibleforWarranty ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->EligibleforWarranty) == "") { ?>
		<th data-name="EligibleforWarranty" class="<?php echo $pharmacy_products->EligibleforWarranty->headerCellClass() ?>"><div id="elh_pharmacy_products_EligibleforWarranty" class="pharmacy_products_EligibleforWarranty"><div class="ew-table-header-caption"><?php echo $pharmacy_products->EligibleforWarranty->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EligibleforWarranty" class="<?php echo $pharmacy_products->EligibleforWarranty->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->EligibleforWarranty) ?>',1);"><div id="elh_pharmacy_products_EligibleforWarranty" class="pharmacy_products_EligibleforWarranty">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->EligibleforWarranty->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->EligibleforWarranty->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->EligibleforWarranty->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->NoofMonthsWarranty->Visible) { // NoofMonthsWarranty ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->NoofMonthsWarranty) == "") { ?>
		<th data-name="NoofMonthsWarranty" class="<?php echo $pharmacy_products->NoofMonthsWarranty->headerCellClass() ?>"><div id="elh_pharmacy_products_NoofMonthsWarranty" class="pharmacy_products_NoofMonthsWarranty"><div class="ew-table-header-caption"><?php echo $pharmacy_products->NoofMonthsWarranty->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoofMonthsWarranty" class="<?php echo $pharmacy_products->NoofMonthsWarranty->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->NoofMonthsWarranty) ?>',1);"><div id="elh_pharmacy_products_NoofMonthsWarranty" class="pharmacy_products_NoofMonthsWarranty">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->NoofMonthsWarranty->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->NoofMonthsWarranty->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->NoofMonthsWarranty->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->ComputeTaxonCost->Visible) { // ComputeTaxonCost ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->ComputeTaxonCost) == "") { ?>
		<th data-name="ComputeTaxonCost" class="<?php echo $pharmacy_products->ComputeTaxonCost->headerCellClass() ?>"><div id="elh_pharmacy_products_ComputeTaxonCost" class="pharmacy_products_ComputeTaxonCost"><div class="ew-table-header-caption"><?php echo $pharmacy_products->ComputeTaxonCost->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ComputeTaxonCost" class="<?php echo $pharmacy_products->ComputeTaxonCost->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->ComputeTaxonCost) ?>',1);"><div id="elh_pharmacy_products_ComputeTaxonCost" class="pharmacy_products_ComputeTaxonCost">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->ComputeTaxonCost->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->ComputeTaxonCost->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->ComputeTaxonCost->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->HasEmptyBottleTrack->Visible) { // HasEmptyBottleTrack ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->HasEmptyBottleTrack) == "") { ?>
		<th data-name="HasEmptyBottleTrack" class="<?php echo $pharmacy_products->HasEmptyBottleTrack->headerCellClass() ?>"><div id="elh_pharmacy_products_HasEmptyBottleTrack" class="pharmacy_products_HasEmptyBottleTrack"><div class="ew-table-header-caption"><?php echo $pharmacy_products->HasEmptyBottleTrack->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HasEmptyBottleTrack" class="<?php echo $pharmacy_products->HasEmptyBottleTrack->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->HasEmptyBottleTrack) ?>',1);"><div id="elh_pharmacy_products_HasEmptyBottleTrack" class="pharmacy_products_HasEmptyBottleTrack">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->HasEmptyBottleTrack->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->HasEmptyBottleTrack->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->HasEmptyBottleTrack->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->EmptyBottleReferenceCode->Visible) { // EmptyBottleReferenceCode ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->EmptyBottleReferenceCode) == "") { ?>
		<th data-name="EmptyBottleReferenceCode" class="<?php echo $pharmacy_products->EmptyBottleReferenceCode->headerCellClass() ?>"><div id="elh_pharmacy_products_EmptyBottleReferenceCode" class="pharmacy_products_EmptyBottleReferenceCode"><div class="ew-table-header-caption"><?php echo $pharmacy_products->EmptyBottleReferenceCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EmptyBottleReferenceCode" class="<?php echo $pharmacy_products->EmptyBottleReferenceCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->EmptyBottleReferenceCode) ?>',1);"><div id="elh_pharmacy_products_EmptyBottleReferenceCode" class="pharmacy_products_EmptyBottleReferenceCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->EmptyBottleReferenceCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->EmptyBottleReferenceCode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->EmptyBottleReferenceCode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->AdditionalCESSAmount->Visible) { // AdditionalCESSAmount ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->AdditionalCESSAmount) == "") { ?>
		<th data-name="AdditionalCESSAmount" class="<?php echo $pharmacy_products->AdditionalCESSAmount->headerCellClass() ?>"><div id="elh_pharmacy_products_AdditionalCESSAmount" class="pharmacy_products_AdditionalCESSAmount"><div class="ew-table-header-caption"><?php echo $pharmacy_products->AdditionalCESSAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AdditionalCESSAmount" class="<?php echo $pharmacy_products->AdditionalCESSAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->AdditionalCESSAmount) ?>',1);"><div id="elh_pharmacy_products_AdditionalCESSAmount" class="pharmacy_products_AdditionalCESSAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->AdditionalCESSAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->AdditionalCESSAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->AdditionalCESSAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_products->EmptyBottleRate->Visible) { // EmptyBottleRate ?>
	<?php if ($pharmacy_products->sortUrl($pharmacy_products->EmptyBottleRate) == "") { ?>
		<th data-name="EmptyBottleRate" class="<?php echo $pharmacy_products->EmptyBottleRate->headerCellClass() ?>"><div id="elh_pharmacy_products_EmptyBottleRate" class="pharmacy_products_EmptyBottleRate"><div class="ew-table-header-caption"><?php echo $pharmacy_products->EmptyBottleRate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EmptyBottleRate" class="<?php echo $pharmacy_products->EmptyBottleRate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_products->SortUrl($pharmacy_products->EmptyBottleRate) ?>',1);"><div id="elh_pharmacy_products_EmptyBottleRate" class="pharmacy_products_EmptyBottleRate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_products->EmptyBottleRate->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_products->EmptyBottleRate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_products->EmptyBottleRate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
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
if ($pharmacy_products->ExportAll && $pharmacy_products->isExport()) {
	$pharmacy_products_list->StopRec = $pharmacy_products_list->TotalRecs;
} else {

	// Set the last record to display
	if ($pharmacy_products_list->TotalRecs > $pharmacy_products_list->StartRec + $pharmacy_products_list->DisplayRecs - 1)
		$pharmacy_products_list->StopRec = $pharmacy_products_list->StartRec + $pharmacy_products_list->DisplayRecs - 1;
	else
		$pharmacy_products_list->StopRec = $pharmacy_products_list->TotalRecs;
}
$pharmacy_products_list->RecCnt = $pharmacy_products_list->StartRec - 1;
if ($pharmacy_products_list->Recordset && !$pharmacy_products_list->Recordset->EOF) {
	$pharmacy_products_list->Recordset->moveFirst();
	$selectLimit = $pharmacy_products_list->UseSelectLimit;
	if (!$selectLimit && $pharmacy_products_list->StartRec > 1)
		$pharmacy_products_list->Recordset->move($pharmacy_products_list->StartRec - 1);
} elseif (!$pharmacy_products->AllowAddDeleteRow && $pharmacy_products_list->StopRec == 0) {
	$pharmacy_products_list->StopRec = $pharmacy_products->GridAddRowCount;
}

// Initialize aggregate
$pharmacy_products->RowType = ROWTYPE_AGGREGATEINIT;
$pharmacy_products->resetAttributes();
$pharmacy_products_list->renderRow();
while ($pharmacy_products_list->RecCnt < $pharmacy_products_list->StopRec) {
	$pharmacy_products_list->RecCnt++;
	if ($pharmacy_products_list->RecCnt >= $pharmacy_products_list->StartRec) {
		$pharmacy_products_list->RowCnt++;

		// Set up key count
		$pharmacy_products_list->KeyCount = $pharmacy_products_list->RowIndex;

		// Init row class and style
		$pharmacy_products->resetAttributes();
		$pharmacy_products->CssClass = "";
		if ($pharmacy_products->isGridAdd()) {
		} else {
			$pharmacy_products_list->loadRowValues($pharmacy_products_list->Recordset); // Load row values
		}
		$pharmacy_products->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$pharmacy_products->RowAttrs = array_merge($pharmacy_products->RowAttrs, array('data-rowindex'=>$pharmacy_products_list->RowCnt, 'id'=>'r' . $pharmacy_products_list->RowCnt . '_pharmacy_products', 'data-rowtype'=>$pharmacy_products->RowType));

		// Render row
		$pharmacy_products_list->renderRow();

		// Render list options
		$pharmacy_products_list->renderListOptions();
?>
	<tr<?php echo $pharmacy_products->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_products_list->ListOptions->render("body", "left", $pharmacy_products_list->RowCnt);
?>
	<?php if ($pharmacy_products->ProductCode->Visible) { // ProductCode ?>
		<td data-name="ProductCode"<?php echo $pharmacy_products->ProductCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_ProductCode" class="pharmacy_products_ProductCode">
<span<?php echo $pharmacy_products->ProductCode->viewAttributes() ?>>
<?php echo $pharmacy_products->ProductCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->ProductName->Visible) { // ProductName ?>
		<td data-name="ProductName"<?php echo $pharmacy_products->ProductName->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_ProductName" class="pharmacy_products_ProductName">
<span<?php echo $pharmacy_products->ProductName->viewAttributes() ?>>
<?php echo $pharmacy_products->ProductName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->DivisionCode->Visible) { // DivisionCode ?>
		<td data-name="DivisionCode"<?php echo $pharmacy_products->DivisionCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_DivisionCode" class="pharmacy_products_DivisionCode">
<span<?php echo $pharmacy_products->DivisionCode->viewAttributes() ?>>
<?php echo $pharmacy_products->DivisionCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->ManufacturerCode->Visible) { // ManufacturerCode ?>
		<td data-name="ManufacturerCode"<?php echo $pharmacy_products->ManufacturerCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_ManufacturerCode" class="pharmacy_products_ManufacturerCode">
<span<?php echo $pharmacy_products->ManufacturerCode->viewAttributes() ?>>
<?php echo $pharmacy_products->ManufacturerCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->SupplierCode->Visible) { // SupplierCode ?>
		<td data-name="SupplierCode"<?php echo $pharmacy_products->SupplierCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_SupplierCode" class="pharmacy_products_SupplierCode">
<span<?php echo $pharmacy_products->SupplierCode->viewAttributes() ?>>
<?php echo $pharmacy_products->SupplierCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->AlternateSupplierCodes->Visible) { // AlternateSupplierCodes ?>
		<td data-name="AlternateSupplierCodes"<?php echo $pharmacy_products->AlternateSupplierCodes->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_AlternateSupplierCodes" class="pharmacy_products_AlternateSupplierCodes">
<span<?php echo $pharmacy_products->AlternateSupplierCodes->viewAttributes() ?>>
<?php echo $pharmacy_products->AlternateSupplierCodes->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->AlternateProductCode->Visible) { // AlternateProductCode ?>
		<td data-name="AlternateProductCode"<?php echo $pharmacy_products->AlternateProductCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_AlternateProductCode" class="pharmacy_products_AlternateProductCode">
<span<?php echo $pharmacy_products->AlternateProductCode->viewAttributes() ?>>
<?php echo $pharmacy_products->AlternateProductCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->UniversalProductCode->Visible) { // UniversalProductCode ?>
		<td data-name="UniversalProductCode"<?php echo $pharmacy_products->UniversalProductCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_UniversalProductCode" class="pharmacy_products_UniversalProductCode">
<span<?php echo $pharmacy_products->UniversalProductCode->viewAttributes() ?>>
<?php echo $pharmacy_products->UniversalProductCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->BookProductCode->Visible) { // BookProductCode ?>
		<td data-name="BookProductCode"<?php echo $pharmacy_products->BookProductCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_BookProductCode" class="pharmacy_products_BookProductCode">
<span<?php echo $pharmacy_products->BookProductCode->viewAttributes() ?>>
<?php echo $pharmacy_products->BookProductCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->OldCode->Visible) { // OldCode ?>
		<td data-name="OldCode"<?php echo $pharmacy_products->OldCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_OldCode" class="pharmacy_products_OldCode">
<span<?php echo $pharmacy_products->OldCode->viewAttributes() ?>>
<?php echo $pharmacy_products->OldCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->ProtectedProducts->Visible) { // ProtectedProducts ?>
		<td data-name="ProtectedProducts"<?php echo $pharmacy_products->ProtectedProducts->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_ProtectedProducts" class="pharmacy_products_ProtectedProducts">
<span<?php echo $pharmacy_products->ProtectedProducts->viewAttributes() ?>>
<?php echo $pharmacy_products->ProtectedProducts->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->ProductFullName->Visible) { // ProductFullName ?>
		<td data-name="ProductFullName"<?php echo $pharmacy_products->ProductFullName->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_ProductFullName" class="pharmacy_products_ProductFullName">
<span<?php echo $pharmacy_products->ProductFullName->viewAttributes() ?>>
<?php echo $pharmacy_products->ProductFullName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->UnitOfMeasure->Visible) { // UnitOfMeasure ?>
		<td data-name="UnitOfMeasure"<?php echo $pharmacy_products->UnitOfMeasure->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_UnitOfMeasure" class="pharmacy_products_UnitOfMeasure">
<span<?php echo $pharmacy_products->UnitOfMeasure->viewAttributes() ?>>
<?php echo $pharmacy_products->UnitOfMeasure->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->UnitDescription->Visible) { // UnitDescription ?>
		<td data-name="UnitDescription"<?php echo $pharmacy_products->UnitDescription->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_UnitDescription" class="pharmacy_products_UnitDescription">
<span<?php echo $pharmacy_products->UnitDescription->viewAttributes() ?>>
<?php echo $pharmacy_products->UnitDescription->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->BulkDescription->Visible) { // BulkDescription ?>
		<td data-name="BulkDescription"<?php echo $pharmacy_products->BulkDescription->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_BulkDescription" class="pharmacy_products_BulkDescription">
<span<?php echo $pharmacy_products->BulkDescription->viewAttributes() ?>>
<?php echo $pharmacy_products->BulkDescription->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->BarCodeDescription->Visible) { // BarCodeDescription ?>
		<td data-name="BarCodeDescription"<?php echo $pharmacy_products->BarCodeDescription->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_BarCodeDescription" class="pharmacy_products_BarCodeDescription">
<span<?php echo $pharmacy_products->BarCodeDescription->viewAttributes() ?>>
<?php echo $pharmacy_products->BarCodeDescription->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->PackageInformation->Visible) { // PackageInformation ?>
		<td data-name="PackageInformation"<?php echo $pharmacy_products->PackageInformation->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_PackageInformation" class="pharmacy_products_PackageInformation">
<span<?php echo $pharmacy_products->PackageInformation->viewAttributes() ?>>
<?php echo $pharmacy_products->PackageInformation->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->PackageId->Visible) { // PackageId ?>
		<td data-name="PackageId"<?php echo $pharmacy_products->PackageId->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_PackageId" class="pharmacy_products_PackageId">
<span<?php echo $pharmacy_products->PackageId->viewAttributes() ?>>
<?php echo $pharmacy_products->PackageId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->Weight->Visible) { // Weight ?>
		<td data-name="Weight"<?php echo $pharmacy_products->Weight->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_Weight" class="pharmacy_products_Weight">
<span<?php echo $pharmacy_products->Weight->viewAttributes() ?>>
<?php echo $pharmacy_products->Weight->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->AllowFractions->Visible) { // AllowFractions ?>
		<td data-name="AllowFractions"<?php echo $pharmacy_products->AllowFractions->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_AllowFractions" class="pharmacy_products_AllowFractions">
<span<?php echo $pharmacy_products->AllowFractions->viewAttributes() ?>>
<?php echo $pharmacy_products->AllowFractions->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->MinimumStockLevel->Visible) { // MinimumStockLevel ?>
		<td data-name="MinimumStockLevel"<?php echo $pharmacy_products->MinimumStockLevel->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_MinimumStockLevel" class="pharmacy_products_MinimumStockLevel">
<span<?php echo $pharmacy_products->MinimumStockLevel->viewAttributes() ?>>
<?php echo $pharmacy_products->MinimumStockLevel->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->MaximumStockLevel->Visible) { // MaximumStockLevel ?>
		<td data-name="MaximumStockLevel"<?php echo $pharmacy_products->MaximumStockLevel->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_MaximumStockLevel" class="pharmacy_products_MaximumStockLevel">
<span<?php echo $pharmacy_products->MaximumStockLevel->viewAttributes() ?>>
<?php echo $pharmacy_products->MaximumStockLevel->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->ReorderLevel->Visible) { // ReorderLevel ?>
		<td data-name="ReorderLevel"<?php echo $pharmacy_products->ReorderLevel->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_ReorderLevel" class="pharmacy_products_ReorderLevel">
<span<?php echo $pharmacy_products->ReorderLevel->viewAttributes() ?>>
<?php echo $pharmacy_products->ReorderLevel->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->MinMaxRatio->Visible) { // MinMaxRatio ?>
		<td data-name="MinMaxRatio"<?php echo $pharmacy_products->MinMaxRatio->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_MinMaxRatio" class="pharmacy_products_MinMaxRatio">
<span<?php echo $pharmacy_products->MinMaxRatio->viewAttributes() ?>>
<?php echo $pharmacy_products->MinMaxRatio->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->AutoMinMaxRatio->Visible) { // AutoMinMaxRatio ?>
		<td data-name="AutoMinMaxRatio"<?php echo $pharmacy_products->AutoMinMaxRatio->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_AutoMinMaxRatio" class="pharmacy_products_AutoMinMaxRatio">
<span<?php echo $pharmacy_products->AutoMinMaxRatio->viewAttributes() ?>>
<?php echo $pharmacy_products->AutoMinMaxRatio->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->ScheduleCode->Visible) { // ScheduleCode ?>
		<td data-name="ScheduleCode"<?php echo $pharmacy_products->ScheduleCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_ScheduleCode" class="pharmacy_products_ScheduleCode">
<span<?php echo $pharmacy_products->ScheduleCode->viewAttributes() ?>>
<?php echo $pharmacy_products->ScheduleCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->RopRatio->Visible) { // RopRatio ?>
		<td data-name="RopRatio"<?php echo $pharmacy_products->RopRatio->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_RopRatio" class="pharmacy_products_RopRatio">
<span<?php echo $pharmacy_products->RopRatio->viewAttributes() ?>>
<?php echo $pharmacy_products->RopRatio->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->MRP->Visible) { // MRP ?>
		<td data-name="MRP"<?php echo $pharmacy_products->MRP->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_MRP" class="pharmacy_products_MRP">
<span<?php echo $pharmacy_products->MRP->viewAttributes() ?>>
<?php echo $pharmacy_products->MRP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->PurchasePrice->Visible) { // PurchasePrice ?>
		<td data-name="PurchasePrice"<?php echo $pharmacy_products->PurchasePrice->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_PurchasePrice" class="pharmacy_products_PurchasePrice">
<span<?php echo $pharmacy_products->PurchasePrice->viewAttributes() ?>>
<?php echo $pharmacy_products->PurchasePrice->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->PurchaseUnit->Visible) { // PurchaseUnit ?>
		<td data-name="PurchaseUnit"<?php echo $pharmacy_products->PurchaseUnit->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_PurchaseUnit" class="pharmacy_products_PurchaseUnit">
<span<?php echo $pharmacy_products->PurchaseUnit->viewAttributes() ?>>
<?php echo $pharmacy_products->PurchaseUnit->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->PurchaseTaxCode->Visible) { // PurchaseTaxCode ?>
		<td data-name="PurchaseTaxCode"<?php echo $pharmacy_products->PurchaseTaxCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_PurchaseTaxCode" class="pharmacy_products_PurchaseTaxCode">
<span<?php echo $pharmacy_products->PurchaseTaxCode->viewAttributes() ?>>
<?php echo $pharmacy_products->PurchaseTaxCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->AllowDirectInward->Visible) { // AllowDirectInward ?>
		<td data-name="AllowDirectInward"<?php echo $pharmacy_products->AllowDirectInward->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_AllowDirectInward" class="pharmacy_products_AllowDirectInward">
<span<?php echo $pharmacy_products->AllowDirectInward->viewAttributes() ?>>
<?php echo $pharmacy_products->AllowDirectInward->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->SalePrice->Visible) { // SalePrice ?>
		<td data-name="SalePrice"<?php echo $pharmacy_products->SalePrice->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_SalePrice" class="pharmacy_products_SalePrice">
<span<?php echo $pharmacy_products->SalePrice->viewAttributes() ?>>
<?php echo $pharmacy_products->SalePrice->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->SaleUnit->Visible) { // SaleUnit ?>
		<td data-name="SaleUnit"<?php echo $pharmacy_products->SaleUnit->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_SaleUnit" class="pharmacy_products_SaleUnit">
<span<?php echo $pharmacy_products->SaleUnit->viewAttributes() ?>>
<?php echo $pharmacy_products->SaleUnit->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->SalesTaxCode->Visible) { // SalesTaxCode ?>
		<td data-name="SalesTaxCode"<?php echo $pharmacy_products->SalesTaxCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_SalesTaxCode" class="pharmacy_products_SalesTaxCode">
<span<?php echo $pharmacy_products->SalesTaxCode->viewAttributes() ?>>
<?php echo $pharmacy_products->SalesTaxCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->StockReceived->Visible) { // StockReceived ?>
		<td data-name="StockReceived"<?php echo $pharmacy_products->StockReceived->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_StockReceived" class="pharmacy_products_StockReceived">
<span<?php echo $pharmacy_products->StockReceived->viewAttributes() ?>>
<?php echo $pharmacy_products->StockReceived->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->TotalStock->Visible) { // TotalStock ?>
		<td data-name="TotalStock"<?php echo $pharmacy_products->TotalStock->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_TotalStock" class="pharmacy_products_TotalStock">
<span<?php echo $pharmacy_products->TotalStock->viewAttributes() ?>>
<?php echo $pharmacy_products->TotalStock->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->StockType->Visible) { // StockType ?>
		<td data-name="StockType"<?php echo $pharmacy_products->StockType->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_StockType" class="pharmacy_products_StockType">
<span<?php echo $pharmacy_products->StockType->viewAttributes() ?>>
<?php echo $pharmacy_products->StockType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->StockCheckDate->Visible) { // StockCheckDate ?>
		<td data-name="StockCheckDate"<?php echo $pharmacy_products->StockCheckDate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_StockCheckDate" class="pharmacy_products_StockCheckDate">
<span<?php echo $pharmacy_products->StockCheckDate->viewAttributes() ?>>
<?php echo $pharmacy_products->StockCheckDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->StockAdjustmentDate->Visible) { // StockAdjustmentDate ?>
		<td data-name="StockAdjustmentDate"<?php echo $pharmacy_products->StockAdjustmentDate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_StockAdjustmentDate" class="pharmacy_products_StockAdjustmentDate">
<span<?php echo $pharmacy_products->StockAdjustmentDate->viewAttributes() ?>>
<?php echo $pharmacy_products->StockAdjustmentDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->Remarks->Visible) { // Remarks ?>
		<td data-name="Remarks"<?php echo $pharmacy_products->Remarks->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_Remarks" class="pharmacy_products_Remarks">
<span<?php echo $pharmacy_products->Remarks->viewAttributes() ?>>
<?php echo $pharmacy_products->Remarks->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->CostCentre->Visible) { // CostCentre ?>
		<td data-name="CostCentre"<?php echo $pharmacy_products->CostCentre->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_CostCentre" class="pharmacy_products_CostCentre">
<span<?php echo $pharmacy_products->CostCentre->viewAttributes() ?>>
<?php echo $pharmacy_products->CostCentre->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->ProductType->Visible) { // ProductType ?>
		<td data-name="ProductType"<?php echo $pharmacy_products->ProductType->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_ProductType" class="pharmacy_products_ProductType">
<span<?php echo $pharmacy_products->ProductType->viewAttributes() ?>>
<?php echo $pharmacy_products->ProductType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->TaxAmount->Visible) { // TaxAmount ?>
		<td data-name="TaxAmount"<?php echo $pharmacy_products->TaxAmount->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_TaxAmount" class="pharmacy_products_TaxAmount">
<span<?php echo $pharmacy_products->TaxAmount->viewAttributes() ?>>
<?php echo $pharmacy_products->TaxAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->TaxId->Visible) { // TaxId ?>
		<td data-name="TaxId"<?php echo $pharmacy_products->TaxId->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_TaxId" class="pharmacy_products_TaxId">
<span<?php echo $pharmacy_products->TaxId->viewAttributes() ?>>
<?php echo $pharmacy_products->TaxId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->ResaleTaxApplicable->Visible) { // ResaleTaxApplicable ?>
		<td data-name="ResaleTaxApplicable"<?php echo $pharmacy_products->ResaleTaxApplicable->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_ResaleTaxApplicable" class="pharmacy_products_ResaleTaxApplicable">
<span<?php echo $pharmacy_products->ResaleTaxApplicable->viewAttributes() ?>>
<?php echo $pharmacy_products->ResaleTaxApplicable->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->CstOtherTax->Visible) { // CstOtherTax ?>
		<td data-name="CstOtherTax"<?php echo $pharmacy_products->CstOtherTax->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_CstOtherTax" class="pharmacy_products_CstOtherTax">
<span<?php echo $pharmacy_products->CstOtherTax->viewAttributes() ?>>
<?php echo $pharmacy_products->CstOtherTax->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->TotalTax->Visible) { // TotalTax ?>
		<td data-name="TotalTax"<?php echo $pharmacy_products->TotalTax->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_TotalTax" class="pharmacy_products_TotalTax">
<span<?php echo $pharmacy_products->TotalTax->viewAttributes() ?>>
<?php echo $pharmacy_products->TotalTax->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->ItemCost->Visible) { // ItemCost ?>
		<td data-name="ItemCost"<?php echo $pharmacy_products->ItemCost->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_ItemCost" class="pharmacy_products_ItemCost">
<span<?php echo $pharmacy_products->ItemCost->viewAttributes() ?>>
<?php echo $pharmacy_products->ItemCost->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->ExpiryDate->Visible) { // ExpiryDate ?>
		<td data-name="ExpiryDate"<?php echo $pharmacy_products->ExpiryDate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_ExpiryDate" class="pharmacy_products_ExpiryDate">
<span<?php echo $pharmacy_products->ExpiryDate->viewAttributes() ?>>
<?php echo $pharmacy_products->ExpiryDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->BatchDescription->Visible) { // BatchDescription ?>
		<td data-name="BatchDescription"<?php echo $pharmacy_products->BatchDescription->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_BatchDescription" class="pharmacy_products_BatchDescription">
<span<?php echo $pharmacy_products->BatchDescription->viewAttributes() ?>>
<?php echo $pharmacy_products->BatchDescription->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->FreeScheme->Visible) { // FreeScheme ?>
		<td data-name="FreeScheme"<?php echo $pharmacy_products->FreeScheme->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_FreeScheme" class="pharmacy_products_FreeScheme">
<span<?php echo $pharmacy_products->FreeScheme->viewAttributes() ?>>
<?php echo $pharmacy_products->FreeScheme->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->CashDiscountEligibility->Visible) { // CashDiscountEligibility ?>
		<td data-name="CashDiscountEligibility"<?php echo $pharmacy_products->CashDiscountEligibility->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_CashDiscountEligibility" class="pharmacy_products_CashDiscountEligibility">
<span<?php echo $pharmacy_products->CashDiscountEligibility->viewAttributes() ?>>
<?php echo $pharmacy_products->CashDiscountEligibility->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->DiscountPerAllowInBill->Visible) { // DiscountPerAllowInBill ?>
		<td data-name="DiscountPerAllowInBill"<?php echo $pharmacy_products->DiscountPerAllowInBill->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_DiscountPerAllowInBill" class="pharmacy_products_DiscountPerAllowInBill">
<span<?php echo $pharmacy_products->DiscountPerAllowInBill->viewAttributes() ?>>
<?php echo $pharmacy_products->DiscountPerAllowInBill->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->Discount->Visible) { // Discount ?>
		<td data-name="Discount"<?php echo $pharmacy_products->Discount->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_Discount" class="pharmacy_products_Discount">
<span<?php echo $pharmacy_products->Discount->viewAttributes() ?>>
<?php echo $pharmacy_products->Discount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->TotalAmount->Visible) { // TotalAmount ?>
		<td data-name="TotalAmount"<?php echo $pharmacy_products->TotalAmount->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_TotalAmount" class="pharmacy_products_TotalAmount">
<span<?php echo $pharmacy_products->TotalAmount->viewAttributes() ?>>
<?php echo $pharmacy_products->TotalAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->StandardMargin->Visible) { // StandardMargin ?>
		<td data-name="StandardMargin"<?php echo $pharmacy_products->StandardMargin->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_StandardMargin" class="pharmacy_products_StandardMargin">
<span<?php echo $pharmacy_products->StandardMargin->viewAttributes() ?>>
<?php echo $pharmacy_products->StandardMargin->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->Margin->Visible) { // Margin ?>
		<td data-name="Margin"<?php echo $pharmacy_products->Margin->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_Margin" class="pharmacy_products_Margin">
<span<?php echo $pharmacy_products->Margin->viewAttributes() ?>>
<?php echo $pharmacy_products->Margin->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->MarginId->Visible) { // MarginId ?>
		<td data-name="MarginId"<?php echo $pharmacy_products->MarginId->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_MarginId" class="pharmacy_products_MarginId">
<span<?php echo $pharmacy_products->MarginId->viewAttributes() ?>>
<?php echo $pharmacy_products->MarginId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->ExpectedMargin->Visible) { // ExpectedMargin ?>
		<td data-name="ExpectedMargin"<?php echo $pharmacy_products->ExpectedMargin->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_ExpectedMargin" class="pharmacy_products_ExpectedMargin">
<span<?php echo $pharmacy_products->ExpectedMargin->viewAttributes() ?>>
<?php echo $pharmacy_products->ExpectedMargin->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->SurchargeBeforeTax->Visible) { // SurchargeBeforeTax ?>
		<td data-name="SurchargeBeforeTax"<?php echo $pharmacy_products->SurchargeBeforeTax->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_SurchargeBeforeTax" class="pharmacy_products_SurchargeBeforeTax">
<span<?php echo $pharmacy_products->SurchargeBeforeTax->viewAttributes() ?>>
<?php echo $pharmacy_products->SurchargeBeforeTax->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->SurchargeAfterTax->Visible) { // SurchargeAfterTax ?>
		<td data-name="SurchargeAfterTax"<?php echo $pharmacy_products->SurchargeAfterTax->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_SurchargeAfterTax" class="pharmacy_products_SurchargeAfterTax">
<span<?php echo $pharmacy_products->SurchargeAfterTax->viewAttributes() ?>>
<?php echo $pharmacy_products->SurchargeAfterTax->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->TempOrderNo->Visible) { // TempOrderNo ?>
		<td data-name="TempOrderNo"<?php echo $pharmacy_products->TempOrderNo->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_TempOrderNo" class="pharmacy_products_TempOrderNo">
<span<?php echo $pharmacy_products->TempOrderNo->viewAttributes() ?>>
<?php echo $pharmacy_products->TempOrderNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->TempOrderDate->Visible) { // TempOrderDate ?>
		<td data-name="TempOrderDate"<?php echo $pharmacy_products->TempOrderDate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_TempOrderDate" class="pharmacy_products_TempOrderDate">
<span<?php echo $pharmacy_products->TempOrderDate->viewAttributes() ?>>
<?php echo $pharmacy_products->TempOrderDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->OrderUnit->Visible) { // OrderUnit ?>
		<td data-name="OrderUnit"<?php echo $pharmacy_products->OrderUnit->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_OrderUnit" class="pharmacy_products_OrderUnit">
<span<?php echo $pharmacy_products->OrderUnit->viewAttributes() ?>>
<?php echo $pharmacy_products->OrderUnit->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->OrderQuantity->Visible) { // OrderQuantity ?>
		<td data-name="OrderQuantity"<?php echo $pharmacy_products->OrderQuantity->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_OrderQuantity" class="pharmacy_products_OrderQuantity">
<span<?php echo $pharmacy_products->OrderQuantity->viewAttributes() ?>>
<?php echo $pharmacy_products->OrderQuantity->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->MarkForOrder->Visible) { // MarkForOrder ?>
		<td data-name="MarkForOrder"<?php echo $pharmacy_products->MarkForOrder->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_MarkForOrder" class="pharmacy_products_MarkForOrder">
<span<?php echo $pharmacy_products->MarkForOrder->viewAttributes() ?>>
<?php echo $pharmacy_products->MarkForOrder->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->OrderAllId->Visible) { // OrderAllId ?>
		<td data-name="OrderAllId"<?php echo $pharmacy_products->OrderAllId->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_OrderAllId" class="pharmacy_products_OrderAllId">
<span<?php echo $pharmacy_products->OrderAllId->viewAttributes() ?>>
<?php echo $pharmacy_products->OrderAllId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->CalculateOrderQty->Visible) { // CalculateOrderQty ?>
		<td data-name="CalculateOrderQty"<?php echo $pharmacy_products->CalculateOrderQty->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_CalculateOrderQty" class="pharmacy_products_CalculateOrderQty">
<span<?php echo $pharmacy_products->CalculateOrderQty->viewAttributes() ?>>
<?php echo $pharmacy_products->CalculateOrderQty->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->SubLocation->Visible) { // SubLocation ?>
		<td data-name="SubLocation"<?php echo $pharmacy_products->SubLocation->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_SubLocation" class="pharmacy_products_SubLocation">
<span<?php echo $pharmacy_products->SubLocation->viewAttributes() ?>>
<?php echo $pharmacy_products->SubLocation->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->CategoryCode->Visible) { // CategoryCode ?>
		<td data-name="CategoryCode"<?php echo $pharmacy_products->CategoryCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_CategoryCode" class="pharmacy_products_CategoryCode">
<span<?php echo $pharmacy_products->CategoryCode->viewAttributes() ?>>
<?php echo $pharmacy_products->CategoryCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->SubCategory->Visible) { // SubCategory ?>
		<td data-name="SubCategory"<?php echo $pharmacy_products->SubCategory->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_SubCategory" class="pharmacy_products_SubCategory">
<span<?php echo $pharmacy_products->SubCategory->viewAttributes() ?>>
<?php echo $pharmacy_products->SubCategory->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->FlexCategoryCode->Visible) { // FlexCategoryCode ?>
		<td data-name="FlexCategoryCode"<?php echo $pharmacy_products->FlexCategoryCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_FlexCategoryCode" class="pharmacy_products_FlexCategoryCode">
<span<?php echo $pharmacy_products->FlexCategoryCode->viewAttributes() ?>>
<?php echo $pharmacy_products->FlexCategoryCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->ABCSaleQty->Visible) { // ABCSaleQty ?>
		<td data-name="ABCSaleQty"<?php echo $pharmacy_products->ABCSaleQty->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_ABCSaleQty" class="pharmacy_products_ABCSaleQty">
<span<?php echo $pharmacy_products->ABCSaleQty->viewAttributes() ?>>
<?php echo $pharmacy_products->ABCSaleQty->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->ABCSaleValue->Visible) { // ABCSaleValue ?>
		<td data-name="ABCSaleValue"<?php echo $pharmacy_products->ABCSaleValue->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_ABCSaleValue" class="pharmacy_products_ABCSaleValue">
<span<?php echo $pharmacy_products->ABCSaleValue->viewAttributes() ?>>
<?php echo $pharmacy_products->ABCSaleValue->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->ConvertionFactor->Visible) { // ConvertionFactor ?>
		<td data-name="ConvertionFactor"<?php echo $pharmacy_products->ConvertionFactor->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_ConvertionFactor" class="pharmacy_products_ConvertionFactor">
<span<?php echo $pharmacy_products->ConvertionFactor->viewAttributes() ?>>
<?php echo $pharmacy_products->ConvertionFactor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->ConvertionUnitDesc->Visible) { // ConvertionUnitDesc ?>
		<td data-name="ConvertionUnitDesc"<?php echo $pharmacy_products->ConvertionUnitDesc->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_ConvertionUnitDesc" class="pharmacy_products_ConvertionUnitDesc">
<span<?php echo $pharmacy_products->ConvertionUnitDesc->viewAttributes() ?>>
<?php echo $pharmacy_products->ConvertionUnitDesc->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->TransactionId->Visible) { // TransactionId ?>
		<td data-name="TransactionId"<?php echo $pharmacy_products->TransactionId->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_TransactionId" class="pharmacy_products_TransactionId">
<span<?php echo $pharmacy_products->TransactionId->viewAttributes() ?>>
<?php echo $pharmacy_products->TransactionId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->SoldProductId->Visible) { // SoldProductId ?>
		<td data-name="SoldProductId"<?php echo $pharmacy_products->SoldProductId->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_SoldProductId" class="pharmacy_products_SoldProductId">
<span<?php echo $pharmacy_products->SoldProductId->viewAttributes() ?>>
<?php echo $pharmacy_products->SoldProductId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->WantedBookId->Visible) { // WantedBookId ?>
		<td data-name="WantedBookId"<?php echo $pharmacy_products->WantedBookId->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_WantedBookId" class="pharmacy_products_WantedBookId">
<span<?php echo $pharmacy_products->WantedBookId->viewAttributes() ?>>
<?php echo $pharmacy_products->WantedBookId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->AllId->Visible) { // AllId ?>
		<td data-name="AllId"<?php echo $pharmacy_products->AllId->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_AllId" class="pharmacy_products_AllId">
<span<?php echo $pharmacy_products->AllId->viewAttributes() ?>>
<?php echo $pharmacy_products->AllId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->BatchAndExpiryCompulsory->Visible) { // BatchAndExpiryCompulsory ?>
		<td data-name="BatchAndExpiryCompulsory"<?php echo $pharmacy_products->BatchAndExpiryCompulsory->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_BatchAndExpiryCompulsory" class="pharmacy_products_BatchAndExpiryCompulsory">
<span<?php echo $pharmacy_products->BatchAndExpiryCompulsory->viewAttributes() ?>>
<?php echo $pharmacy_products->BatchAndExpiryCompulsory->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->BatchStockForWantedBook->Visible) { // BatchStockForWantedBook ?>
		<td data-name="BatchStockForWantedBook"<?php echo $pharmacy_products->BatchStockForWantedBook->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_BatchStockForWantedBook" class="pharmacy_products_BatchStockForWantedBook">
<span<?php echo $pharmacy_products->BatchStockForWantedBook->viewAttributes() ?>>
<?php echo $pharmacy_products->BatchStockForWantedBook->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->UnitBasedBilling->Visible) { // UnitBasedBilling ?>
		<td data-name="UnitBasedBilling"<?php echo $pharmacy_products->UnitBasedBilling->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_UnitBasedBilling" class="pharmacy_products_UnitBasedBilling">
<span<?php echo $pharmacy_products->UnitBasedBilling->viewAttributes() ?>>
<?php echo $pharmacy_products->UnitBasedBilling->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->DoNotCheckStock->Visible) { // DoNotCheckStock ?>
		<td data-name="DoNotCheckStock"<?php echo $pharmacy_products->DoNotCheckStock->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_DoNotCheckStock" class="pharmacy_products_DoNotCheckStock">
<span<?php echo $pharmacy_products->DoNotCheckStock->viewAttributes() ?>>
<?php echo $pharmacy_products->DoNotCheckStock->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->AcceptRate->Visible) { // AcceptRate ?>
		<td data-name="AcceptRate"<?php echo $pharmacy_products->AcceptRate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_AcceptRate" class="pharmacy_products_AcceptRate">
<span<?php echo $pharmacy_products->AcceptRate->viewAttributes() ?>>
<?php echo $pharmacy_products->AcceptRate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->PriceLevel->Visible) { // PriceLevel ?>
		<td data-name="PriceLevel"<?php echo $pharmacy_products->PriceLevel->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_PriceLevel" class="pharmacy_products_PriceLevel">
<span<?php echo $pharmacy_products->PriceLevel->viewAttributes() ?>>
<?php echo $pharmacy_products->PriceLevel->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->LastQuotePrice->Visible) { // LastQuotePrice ?>
		<td data-name="LastQuotePrice"<?php echo $pharmacy_products->LastQuotePrice->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_LastQuotePrice" class="pharmacy_products_LastQuotePrice">
<span<?php echo $pharmacy_products->LastQuotePrice->viewAttributes() ?>>
<?php echo $pharmacy_products->LastQuotePrice->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->PriceChange->Visible) { // PriceChange ?>
		<td data-name="PriceChange"<?php echo $pharmacy_products->PriceChange->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_PriceChange" class="pharmacy_products_PriceChange">
<span<?php echo $pharmacy_products->PriceChange->viewAttributes() ?>>
<?php echo $pharmacy_products->PriceChange->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->CommodityCode->Visible) { // CommodityCode ?>
		<td data-name="CommodityCode"<?php echo $pharmacy_products->CommodityCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_CommodityCode" class="pharmacy_products_CommodityCode">
<span<?php echo $pharmacy_products->CommodityCode->viewAttributes() ?>>
<?php echo $pharmacy_products->CommodityCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->InstitutePrice->Visible) { // InstitutePrice ?>
		<td data-name="InstitutePrice"<?php echo $pharmacy_products->InstitutePrice->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_InstitutePrice" class="pharmacy_products_InstitutePrice">
<span<?php echo $pharmacy_products->InstitutePrice->viewAttributes() ?>>
<?php echo $pharmacy_products->InstitutePrice->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->CtrlOrDCtrlProduct->Visible) { // CtrlOrDCtrlProduct ?>
		<td data-name="CtrlOrDCtrlProduct"<?php echo $pharmacy_products->CtrlOrDCtrlProduct->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_CtrlOrDCtrlProduct" class="pharmacy_products_CtrlOrDCtrlProduct">
<span<?php echo $pharmacy_products->CtrlOrDCtrlProduct->viewAttributes() ?>>
<?php echo $pharmacy_products->CtrlOrDCtrlProduct->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->ImportedDate->Visible) { // ImportedDate ?>
		<td data-name="ImportedDate"<?php echo $pharmacy_products->ImportedDate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_ImportedDate" class="pharmacy_products_ImportedDate">
<span<?php echo $pharmacy_products->ImportedDate->viewAttributes() ?>>
<?php echo $pharmacy_products->ImportedDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->IsImported->Visible) { // IsImported ?>
		<td data-name="IsImported"<?php echo $pharmacy_products->IsImported->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_IsImported" class="pharmacy_products_IsImported">
<span<?php echo $pharmacy_products->IsImported->viewAttributes() ?>>
<?php echo $pharmacy_products->IsImported->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->FileName->Visible) { // FileName ?>
		<td data-name="FileName"<?php echo $pharmacy_products->FileName->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_FileName" class="pharmacy_products_FileName">
<span<?php echo $pharmacy_products->FileName->viewAttributes() ?>>
<?php echo $pharmacy_products->FileName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->GodownNumber->Visible) { // GodownNumber ?>
		<td data-name="GodownNumber"<?php echo $pharmacy_products->GodownNumber->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_GodownNumber" class="pharmacy_products_GodownNumber">
<span<?php echo $pharmacy_products->GodownNumber->viewAttributes() ?>>
<?php echo $pharmacy_products->GodownNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->CreationDate->Visible) { // CreationDate ?>
		<td data-name="CreationDate"<?php echo $pharmacy_products->CreationDate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_CreationDate" class="pharmacy_products_CreationDate">
<span<?php echo $pharmacy_products->CreationDate->viewAttributes() ?>>
<?php echo $pharmacy_products->CreationDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->CreatedbyUser->Visible) { // CreatedbyUser ?>
		<td data-name="CreatedbyUser"<?php echo $pharmacy_products->CreatedbyUser->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_CreatedbyUser" class="pharmacy_products_CreatedbyUser">
<span<?php echo $pharmacy_products->CreatedbyUser->viewAttributes() ?>>
<?php echo $pharmacy_products->CreatedbyUser->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->ModifiedDate->Visible) { // ModifiedDate ?>
		<td data-name="ModifiedDate"<?php echo $pharmacy_products->ModifiedDate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_ModifiedDate" class="pharmacy_products_ModifiedDate">
<span<?php echo $pharmacy_products->ModifiedDate->viewAttributes() ?>>
<?php echo $pharmacy_products->ModifiedDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->ModifiedbyUser->Visible) { // ModifiedbyUser ?>
		<td data-name="ModifiedbyUser"<?php echo $pharmacy_products->ModifiedbyUser->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_ModifiedbyUser" class="pharmacy_products_ModifiedbyUser">
<span<?php echo $pharmacy_products->ModifiedbyUser->viewAttributes() ?>>
<?php echo $pharmacy_products->ModifiedbyUser->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->isActive->Visible) { // isActive ?>
		<td data-name="isActive"<?php echo $pharmacy_products->isActive->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_isActive" class="pharmacy_products_isActive">
<span<?php echo $pharmacy_products->isActive->viewAttributes() ?>>
<?php echo $pharmacy_products->isActive->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->AllowExpiryClaim->Visible) { // AllowExpiryClaim ?>
		<td data-name="AllowExpiryClaim"<?php echo $pharmacy_products->AllowExpiryClaim->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_AllowExpiryClaim" class="pharmacy_products_AllowExpiryClaim">
<span<?php echo $pharmacy_products->AllowExpiryClaim->viewAttributes() ?>>
<?php echo $pharmacy_products->AllowExpiryClaim->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->BrandCode->Visible) { // BrandCode ?>
		<td data-name="BrandCode"<?php echo $pharmacy_products->BrandCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_BrandCode" class="pharmacy_products_BrandCode">
<span<?php echo $pharmacy_products->BrandCode->viewAttributes() ?>>
<?php echo $pharmacy_products->BrandCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->FreeSchemeBasedon->Visible) { // FreeSchemeBasedon ?>
		<td data-name="FreeSchemeBasedon"<?php echo $pharmacy_products->FreeSchemeBasedon->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_FreeSchemeBasedon" class="pharmacy_products_FreeSchemeBasedon">
<span<?php echo $pharmacy_products->FreeSchemeBasedon->viewAttributes() ?>>
<?php echo $pharmacy_products->FreeSchemeBasedon->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->DoNotCheckCostInBill->Visible) { // DoNotCheckCostInBill ?>
		<td data-name="DoNotCheckCostInBill"<?php echo $pharmacy_products->DoNotCheckCostInBill->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_DoNotCheckCostInBill" class="pharmacy_products_DoNotCheckCostInBill">
<span<?php echo $pharmacy_products->DoNotCheckCostInBill->viewAttributes() ?>>
<?php echo $pharmacy_products->DoNotCheckCostInBill->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->ProductGroupCode->Visible) { // ProductGroupCode ?>
		<td data-name="ProductGroupCode"<?php echo $pharmacy_products->ProductGroupCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_ProductGroupCode" class="pharmacy_products_ProductGroupCode">
<span<?php echo $pharmacy_products->ProductGroupCode->viewAttributes() ?>>
<?php echo $pharmacy_products->ProductGroupCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->ProductStrengthCode->Visible) { // ProductStrengthCode ?>
		<td data-name="ProductStrengthCode"<?php echo $pharmacy_products->ProductStrengthCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_ProductStrengthCode" class="pharmacy_products_ProductStrengthCode">
<span<?php echo $pharmacy_products->ProductStrengthCode->viewAttributes() ?>>
<?php echo $pharmacy_products->ProductStrengthCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->PackingCode->Visible) { // PackingCode ?>
		<td data-name="PackingCode"<?php echo $pharmacy_products->PackingCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_PackingCode" class="pharmacy_products_PackingCode">
<span<?php echo $pharmacy_products->PackingCode->viewAttributes() ?>>
<?php echo $pharmacy_products->PackingCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->ComputedMinStock->Visible) { // ComputedMinStock ?>
		<td data-name="ComputedMinStock"<?php echo $pharmacy_products->ComputedMinStock->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_ComputedMinStock" class="pharmacy_products_ComputedMinStock">
<span<?php echo $pharmacy_products->ComputedMinStock->viewAttributes() ?>>
<?php echo $pharmacy_products->ComputedMinStock->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->ComputedMaxStock->Visible) { // ComputedMaxStock ?>
		<td data-name="ComputedMaxStock"<?php echo $pharmacy_products->ComputedMaxStock->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_ComputedMaxStock" class="pharmacy_products_ComputedMaxStock">
<span<?php echo $pharmacy_products->ComputedMaxStock->viewAttributes() ?>>
<?php echo $pharmacy_products->ComputedMaxStock->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->ProductRemark->Visible) { // ProductRemark ?>
		<td data-name="ProductRemark"<?php echo $pharmacy_products->ProductRemark->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_ProductRemark" class="pharmacy_products_ProductRemark">
<span<?php echo $pharmacy_products->ProductRemark->viewAttributes() ?>>
<?php echo $pharmacy_products->ProductRemark->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->ProductDrugCode->Visible) { // ProductDrugCode ?>
		<td data-name="ProductDrugCode"<?php echo $pharmacy_products->ProductDrugCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_ProductDrugCode" class="pharmacy_products_ProductDrugCode">
<span<?php echo $pharmacy_products->ProductDrugCode->viewAttributes() ?>>
<?php echo $pharmacy_products->ProductDrugCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->IsMatrixProduct->Visible) { // IsMatrixProduct ?>
		<td data-name="IsMatrixProduct"<?php echo $pharmacy_products->IsMatrixProduct->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_IsMatrixProduct" class="pharmacy_products_IsMatrixProduct">
<span<?php echo $pharmacy_products->IsMatrixProduct->viewAttributes() ?>>
<?php echo $pharmacy_products->IsMatrixProduct->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->AttributeCount1->Visible) { // AttributeCount1 ?>
		<td data-name="AttributeCount1"<?php echo $pharmacy_products->AttributeCount1->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_AttributeCount1" class="pharmacy_products_AttributeCount1">
<span<?php echo $pharmacy_products->AttributeCount1->viewAttributes() ?>>
<?php echo $pharmacy_products->AttributeCount1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->AttributeCount2->Visible) { // AttributeCount2 ?>
		<td data-name="AttributeCount2"<?php echo $pharmacy_products->AttributeCount2->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_AttributeCount2" class="pharmacy_products_AttributeCount2">
<span<?php echo $pharmacy_products->AttributeCount2->viewAttributes() ?>>
<?php echo $pharmacy_products->AttributeCount2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->AttributeCount3->Visible) { // AttributeCount3 ?>
		<td data-name="AttributeCount3"<?php echo $pharmacy_products->AttributeCount3->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_AttributeCount3" class="pharmacy_products_AttributeCount3">
<span<?php echo $pharmacy_products->AttributeCount3->viewAttributes() ?>>
<?php echo $pharmacy_products->AttributeCount3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->AttributeCount4->Visible) { // AttributeCount4 ?>
		<td data-name="AttributeCount4"<?php echo $pharmacy_products->AttributeCount4->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_AttributeCount4" class="pharmacy_products_AttributeCount4">
<span<?php echo $pharmacy_products->AttributeCount4->viewAttributes() ?>>
<?php echo $pharmacy_products->AttributeCount4->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->AttributeCount5->Visible) { // AttributeCount5 ?>
		<td data-name="AttributeCount5"<?php echo $pharmacy_products->AttributeCount5->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_AttributeCount5" class="pharmacy_products_AttributeCount5">
<span<?php echo $pharmacy_products->AttributeCount5->viewAttributes() ?>>
<?php echo $pharmacy_products->AttributeCount5->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->DefaultDiscountPercentage->Visible) { // DefaultDiscountPercentage ?>
		<td data-name="DefaultDiscountPercentage"<?php echo $pharmacy_products->DefaultDiscountPercentage->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_DefaultDiscountPercentage" class="pharmacy_products_DefaultDiscountPercentage">
<span<?php echo $pharmacy_products->DefaultDiscountPercentage->viewAttributes() ?>>
<?php echo $pharmacy_products->DefaultDiscountPercentage->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->DonotPrintBarcode->Visible) { // DonotPrintBarcode ?>
		<td data-name="DonotPrintBarcode"<?php echo $pharmacy_products->DonotPrintBarcode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_DonotPrintBarcode" class="pharmacy_products_DonotPrintBarcode">
<span<?php echo $pharmacy_products->DonotPrintBarcode->viewAttributes() ?>>
<?php echo $pharmacy_products->DonotPrintBarcode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->ProductLevelDiscount->Visible) { // ProductLevelDiscount ?>
		<td data-name="ProductLevelDiscount"<?php echo $pharmacy_products->ProductLevelDiscount->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_ProductLevelDiscount" class="pharmacy_products_ProductLevelDiscount">
<span<?php echo $pharmacy_products->ProductLevelDiscount->viewAttributes() ?>>
<?php echo $pharmacy_products->ProductLevelDiscount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->Markup->Visible) { // Markup ?>
		<td data-name="Markup"<?php echo $pharmacy_products->Markup->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_Markup" class="pharmacy_products_Markup">
<span<?php echo $pharmacy_products->Markup->viewAttributes() ?>>
<?php echo $pharmacy_products->Markup->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->MarkDown->Visible) { // MarkDown ?>
		<td data-name="MarkDown"<?php echo $pharmacy_products->MarkDown->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_MarkDown" class="pharmacy_products_MarkDown">
<span<?php echo $pharmacy_products->MarkDown->viewAttributes() ?>>
<?php echo $pharmacy_products->MarkDown->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->ReworkSalePrice->Visible) { // ReworkSalePrice ?>
		<td data-name="ReworkSalePrice"<?php echo $pharmacy_products->ReworkSalePrice->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_ReworkSalePrice" class="pharmacy_products_ReworkSalePrice">
<span<?php echo $pharmacy_products->ReworkSalePrice->viewAttributes() ?>>
<?php echo $pharmacy_products->ReworkSalePrice->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->MultipleInput->Visible) { // MultipleInput ?>
		<td data-name="MultipleInput"<?php echo $pharmacy_products->MultipleInput->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_MultipleInput" class="pharmacy_products_MultipleInput">
<span<?php echo $pharmacy_products->MultipleInput->viewAttributes() ?>>
<?php echo $pharmacy_products->MultipleInput->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->LpPackageInformation->Visible) { // LpPackageInformation ?>
		<td data-name="LpPackageInformation"<?php echo $pharmacy_products->LpPackageInformation->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_LpPackageInformation" class="pharmacy_products_LpPackageInformation">
<span<?php echo $pharmacy_products->LpPackageInformation->viewAttributes() ?>>
<?php echo $pharmacy_products->LpPackageInformation->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->AllowNegativeStock->Visible) { // AllowNegativeStock ?>
		<td data-name="AllowNegativeStock"<?php echo $pharmacy_products->AllowNegativeStock->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_AllowNegativeStock" class="pharmacy_products_AllowNegativeStock">
<span<?php echo $pharmacy_products->AllowNegativeStock->viewAttributes() ?>>
<?php echo $pharmacy_products->AllowNegativeStock->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->OrderDate->Visible) { // OrderDate ?>
		<td data-name="OrderDate"<?php echo $pharmacy_products->OrderDate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_OrderDate" class="pharmacy_products_OrderDate">
<span<?php echo $pharmacy_products->OrderDate->viewAttributes() ?>>
<?php echo $pharmacy_products->OrderDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->OrderTime->Visible) { // OrderTime ?>
		<td data-name="OrderTime"<?php echo $pharmacy_products->OrderTime->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_OrderTime" class="pharmacy_products_OrderTime">
<span<?php echo $pharmacy_products->OrderTime->viewAttributes() ?>>
<?php echo $pharmacy_products->OrderTime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->RateGroupCode->Visible) { // RateGroupCode ?>
		<td data-name="RateGroupCode"<?php echo $pharmacy_products->RateGroupCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_RateGroupCode" class="pharmacy_products_RateGroupCode">
<span<?php echo $pharmacy_products->RateGroupCode->viewAttributes() ?>>
<?php echo $pharmacy_products->RateGroupCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->ConversionCaseLot->Visible) { // ConversionCaseLot ?>
		<td data-name="ConversionCaseLot"<?php echo $pharmacy_products->ConversionCaseLot->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_ConversionCaseLot" class="pharmacy_products_ConversionCaseLot">
<span<?php echo $pharmacy_products->ConversionCaseLot->viewAttributes() ?>>
<?php echo $pharmacy_products->ConversionCaseLot->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->ShippingLot->Visible) { // ShippingLot ?>
		<td data-name="ShippingLot"<?php echo $pharmacy_products->ShippingLot->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_ShippingLot" class="pharmacy_products_ShippingLot">
<span<?php echo $pharmacy_products->ShippingLot->viewAttributes() ?>>
<?php echo $pharmacy_products->ShippingLot->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->AllowExpiryReplacement->Visible) { // AllowExpiryReplacement ?>
		<td data-name="AllowExpiryReplacement"<?php echo $pharmacy_products->AllowExpiryReplacement->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_AllowExpiryReplacement" class="pharmacy_products_AllowExpiryReplacement">
<span<?php echo $pharmacy_products->AllowExpiryReplacement->viewAttributes() ?>>
<?php echo $pharmacy_products->AllowExpiryReplacement->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->NoOfMonthExpiryAllowed->Visible) { // NoOfMonthExpiryAllowed ?>
		<td data-name="NoOfMonthExpiryAllowed"<?php echo $pharmacy_products->NoOfMonthExpiryAllowed->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_NoOfMonthExpiryAllowed" class="pharmacy_products_NoOfMonthExpiryAllowed">
<span<?php echo $pharmacy_products->NoOfMonthExpiryAllowed->viewAttributes() ?>>
<?php echo $pharmacy_products->NoOfMonthExpiryAllowed->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->ProductDiscountEligibility->Visible) { // ProductDiscountEligibility ?>
		<td data-name="ProductDiscountEligibility"<?php echo $pharmacy_products->ProductDiscountEligibility->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_ProductDiscountEligibility" class="pharmacy_products_ProductDiscountEligibility">
<span<?php echo $pharmacy_products->ProductDiscountEligibility->viewAttributes() ?>>
<?php echo $pharmacy_products->ProductDiscountEligibility->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->ScheduleTypeCode->Visible) { // ScheduleTypeCode ?>
		<td data-name="ScheduleTypeCode"<?php echo $pharmacy_products->ScheduleTypeCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_ScheduleTypeCode" class="pharmacy_products_ScheduleTypeCode">
<span<?php echo $pharmacy_products->ScheduleTypeCode->viewAttributes() ?>>
<?php echo $pharmacy_products->ScheduleTypeCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->AIOCDProductCode->Visible) { // AIOCDProductCode ?>
		<td data-name="AIOCDProductCode"<?php echo $pharmacy_products->AIOCDProductCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_AIOCDProductCode" class="pharmacy_products_AIOCDProductCode">
<span<?php echo $pharmacy_products->AIOCDProductCode->viewAttributes() ?>>
<?php echo $pharmacy_products->AIOCDProductCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->FreeQuantity->Visible) { // FreeQuantity ?>
		<td data-name="FreeQuantity"<?php echo $pharmacy_products->FreeQuantity->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_FreeQuantity" class="pharmacy_products_FreeQuantity">
<span<?php echo $pharmacy_products->FreeQuantity->viewAttributes() ?>>
<?php echo $pharmacy_products->FreeQuantity->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->DiscountType->Visible) { // DiscountType ?>
		<td data-name="DiscountType"<?php echo $pharmacy_products->DiscountType->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_DiscountType" class="pharmacy_products_DiscountType">
<span<?php echo $pharmacy_products->DiscountType->viewAttributes() ?>>
<?php echo $pharmacy_products->DiscountType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->DiscountValue->Visible) { // DiscountValue ?>
		<td data-name="DiscountValue"<?php echo $pharmacy_products->DiscountValue->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_DiscountValue" class="pharmacy_products_DiscountValue">
<span<?php echo $pharmacy_products->DiscountValue->viewAttributes() ?>>
<?php echo $pharmacy_products->DiscountValue->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->HasProductOrderAttribute->Visible) { // HasProductOrderAttribute ?>
		<td data-name="HasProductOrderAttribute"<?php echo $pharmacy_products->HasProductOrderAttribute->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_HasProductOrderAttribute" class="pharmacy_products_HasProductOrderAttribute">
<span<?php echo $pharmacy_products->HasProductOrderAttribute->viewAttributes() ?>>
<?php echo $pharmacy_products->HasProductOrderAttribute->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->FirstPODate->Visible) { // FirstPODate ?>
		<td data-name="FirstPODate"<?php echo $pharmacy_products->FirstPODate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_FirstPODate" class="pharmacy_products_FirstPODate">
<span<?php echo $pharmacy_products->FirstPODate->viewAttributes() ?>>
<?php echo $pharmacy_products->FirstPODate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->SaleprcieAndMrpCalcPercent->Visible) { // SaleprcieAndMrpCalcPercent ?>
		<td data-name="SaleprcieAndMrpCalcPercent"<?php echo $pharmacy_products->SaleprcieAndMrpCalcPercent->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_SaleprcieAndMrpCalcPercent" class="pharmacy_products_SaleprcieAndMrpCalcPercent">
<span<?php echo $pharmacy_products->SaleprcieAndMrpCalcPercent->viewAttributes() ?>>
<?php echo $pharmacy_products->SaleprcieAndMrpCalcPercent->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->IsGiftVoucherProducts->Visible) { // IsGiftVoucherProducts ?>
		<td data-name="IsGiftVoucherProducts"<?php echo $pharmacy_products->IsGiftVoucherProducts->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_IsGiftVoucherProducts" class="pharmacy_products_IsGiftVoucherProducts">
<span<?php echo $pharmacy_products->IsGiftVoucherProducts->viewAttributes() ?>>
<?php echo $pharmacy_products->IsGiftVoucherProducts->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->AcceptRange4SerialNumber->Visible) { // AcceptRange4SerialNumber ?>
		<td data-name="AcceptRange4SerialNumber"<?php echo $pharmacy_products->AcceptRange4SerialNumber->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_AcceptRange4SerialNumber" class="pharmacy_products_AcceptRange4SerialNumber">
<span<?php echo $pharmacy_products->AcceptRange4SerialNumber->viewAttributes() ?>>
<?php echo $pharmacy_products->AcceptRange4SerialNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->GiftVoucherDenomination->Visible) { // GiftVoucherDenomination ?>
		<td data-name="GiftVoucherDenomination"<?php echo $pharmacy_products->GiftVoucherDenomination->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_GiftVoucherDenomination" class="pharmacy_products_GiftVoucherDenomination">
<span<?php echo $pharmacy_products->GiftVoucherDenomination->viewAttributes() ?>>
<?php echo $pharmacy_products->GiftVoucherDenomination->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->Subclasscode->Visible) { // Subclasscode ?>
		<td data-name="Subclasscode"<?php echo $pharmacy_products->Subclasscode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_Subclasscode" class="pharmacy_products_Subclasscode">
<span<?php echo $pharmacy_products->Subclasscode->viewAttributes() ?>>
<?php echo $pharmacy_products->Subclasscode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->BarCodeFromWeighingMachine->Visible) { // BarCodeFromWeighingMachine ?>
		<td data-name="BarCodeFromWeighingMachine"<?php echo $pharmacy_products->BarCodeFromWeighingMachine->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_BarCodeFromWeighingMachine" class="pharmacy_products_BarCodeFromWeighingMachine">
<span<?php echo $pharmacy_products->BarCodeFromWeighingMachine->viewAttributes() ?>>
<?php echo $pharmacy_products->BarCodeFromWeighingMachine->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->CheckCostInReturn->Visible) { // CheckCostInReturn ?>
		<td data-name="CheckCostInReturn"<?php echo $pharmacy_products->CheckCostInReturn->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_CheckCostInReturn" class="pharmacy_products_CheckCostInReturn">
<span<?php echo $pharmacy_products->CheckCostInReturn->viewAttributes() ?>>
<?php echo $pharmacy_products->CheckCostInReturn->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->FrequentSaleProduct->Visible) { // FrequentSaleProduct ?>
		<td data-name="FrequentSaleProduct"<?php echo $pharmacy_products->FrequentSaleProduct->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_FrequentSaleProduct" class="pharmacy_products_FrequentSaleProduct">
<span<?php echo $pharmacy_products->FrequentSaleProduct->viewAttributes() ?>>
<?php echo $pharmacy_products->FrequentSaleProduct->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->RateType->Visible) { // RateType ?>
		<td data-name="RateType"<?php echo $pharmacy_products->RateType->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_RateType" class="pharmacy_products_RateType">
<span<?php echo $pharmacy_products->RateType->viewAttributes() ?>>
<?php echo $pharmacy_products->RateType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->TouchscreenName->Visible) { // TouchscreenName ?>
		<td data-name="TouchscreenName"<?php echo $pharmacy_products->TouchscreenName->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_TouchscreenName" class="pharmacy_products_TouchscreenName">
<span<?php echo $pharmacy_products->TouchscreenName->viewAttributes() ?>>
<?php echo $pharmacy_products->TouchscreenName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->FreeType->Visible) { // FreeType ?>
		<td data-name="FreeType"<?php echo $pharmacy_products->FreeType->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_FreeType" class="pharmacy_products_FreeType">
<span<?php echo $pharmacy_products->FreeType->viewAttributes() ?>>
<?php echo $pharmacy_products->FreeType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->LooseQtyasNewBatch->Visible) { // LooseQtyasNewBatch ?>
		<td data-name="LooseQtyasNewBatch"<?php echo $pharmacy_products->LooseQtyasNewBatch->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_LooseQtyasNewBatch" class="pharmacy_products_LooseQtyasNewBatch">
<span<?php echo $pharmacy_products->LooseQtyasNewBatch->viewAttributes() ?>>
<?php echo $pharmacy_products->LooseQtyasNewBatch->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->AllowSlabBilling->Visible) { // AllowSlabBilling ?>
		<td data-name="AllowSlabBilling"<?php echo $pharmacy_products->AllowSlabBilling->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_AllowSlabBilling" class="pharmacy_products_AllowSlabBilling">
<span<?php echo $pharmacy_products->AllowSlabBilling->viewAttributes() ?>>
<?php echo $pharmacy_products->AllowSlabBilling->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->ProductTypeForProduction->Visible) { // ProductTypeForProduction ?>
		<td data-name="ProductTypeForProduction"<?php echo $pharmacy_products->ProductTypeForProduction->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_ProductTypeForProduction" class="pharmacy_products_ProductTypeForProduction">
<span<?php echo $pharmacy_products->ProductTypeForProduction->viewAttributes() ?>>
<?php echo $pharmacy_products->ProductTypeForProduction->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->RecipeCode->Visible) { // RecipeCode ?>
		<td data-name="RecipeCode"<?php echo $pharmacy_products->RecipeCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_RecipeCode" class="pharmacy_products_RecipeCode">
<span<?php echo $pharmacy_products->RecipeCode->viewAttributes() ?>>
<?php echo $pharmacy_products->RecipeCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->DefaultUnitType->Visible) { // DefaultUnitType ?>
		<td data-name="DefaultUnitType"<?php echo $pharmacy_products->DefaultUnitType->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_DefaultUnitType" class="pharmacy_products_DefaultUnitType">
<span<?php echo $pharmacy_products->DefaultUnitType->viewAttributes() ?>>
<?php echo $pharmacy_products->DefaultUnitType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->PIstatus->Visible) { // PIstatus ?>
		<td data-name="PIstatus"<?php echo $pharmacy_products->PIstatus->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_PIstatus" class="pharmacy_products_PIstatus">
<span<?php echo $pharmacy_products->PIstatus->viewAttributes() ?>>
<?php echo $pharmacy_products->PIstatus->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->LastPiConfirmedDate->Visible) { // LastPiConfirmedDate ?>
		<td data-name="LastPiConfirmedDate"<?php echo $pharmacy_products->LastPiConfirmedDate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_LastPiConfirmedDate" class="pharmacy_products_LastPiConfirmedDate">
<span<?php echo $pharmacy_products->LastPiConfirmedDate->viewAttributes() ?>>
<?php echo $pharmacy_products->LastPiConfirmedDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->BarCodeDesign->Visible) { // BarCodeDesign ?>
		<td data-name="BarCodeDesign"<?php echo $pharmacy_products->BarCodeDesign->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_BarCodeDesign" class="pharmacy_products_BarCodeDesign">
<span<?php echo $pharmacy_products->BarCodeDesign->viewAttributes() ?>>
<?php echo $pharmacy_products->BarCodeDesign->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->AcceptRemarksInBill->Visible) { // AcceptRemarksInBill ?>
		<td data-name="AcceptRemarksInBill"<?php echo $pharmacy_products->AcceptRemarksInBill->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_AcceptRemarksInBill" class="pharmacy_products_AcceptRemarksInBill">
<span<?php echo $pharmacy_products->AcceptRemarksInBill->viewAttributes() ?>>
<?php echo $pharmacy_products->AcceptRemarksInBill->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->Classification->Visible) { // Classification ?>
		<td data-name="Classification"<?php echo $pharmacy_products->Classification->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_Classification" class="pharmacy_products_Classification">
<span<?php echo $pharmacy_products->Classification->viewAttributes() ?>>
<?php echo $pharmacy_products->Classification->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->TimeSlot->Visible) { // TimeSlot ?>
		<td data-name="TimeSlot"<?php echo $pharmacy_products->TimeSlot->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_TimeSlot" class="pharmacy_products_TimeSlot">
<span<?php echo $pharmacy_products->TimeSlot->viewAttributes() ?>>
<?php echo $pharmacy_products->TimeSlot->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->IsBundle->Visible) { // IsBundle ?>
		<td data-name="IsBundle"<?php echo $pharmacy_products->IsBundle->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_IsBundle" class="pharmacy_products_IsBundle">
<span<?php echo $pharmacy_products->IsBundle->viewAttributes() ?>>
<?php echo $pharmacy_products->IsBundle->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->ColorCode->Visible) { // ColorCode ?>
		<td data-name="ColorCode"<?php echo $pharmacy_products->ColorCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_ColorCode" class="pharmacy_products_ColorCode">
<span<?php echo $pharmacy_products->ColorCode->viewAttributes() ?>>
<?php echo $pharmacy_products->ColorCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->GenderCode->Visible) { // GenderCode ?>
		<td data-name="GenderCode"<?php echo $pharmacy_products->GenderCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_GenderCode" class="pharmacy_products_GenderCode">
<span<?php echo $pharmacy_products->GenderCode->viewAttributes() ?>>
<?php echo $pharmacy_products->GenderCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->SizeCode->Visible) { // SizeCode ?>
		<td data-name="SizeCode"<?php echo $pharmacy_products->SizeCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_SizeCode" class="pharmacy_products_SizeCode">
<span<?php echo $pharmacy_products->SizeCode->viewAttributes() ?>>
<?php echo $pharmacy_products->SizeCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->GiftCard->Visible) { // GiftCard ?>
		<td data-name="GiftCard"<?php echo $pharmacy_products->GiftCard->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_GiftCard" class="pharmacy_products_GiftCard">
<span<?php echo $pharmacy_products->GiftCard->viewAttributes() ?>>
<?php echo $pharmacy_products->GiftCard->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->ToonLabel->Visible) { // ToonLabel ?>
		<td data-name="ToonLabel"<?php echo $pharmacy_products->ToonLabel->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_ToonLabel" class="pharmacy_products_ToonLabel">
<span<?php echo $pharmacy_products->ToonLabel->viewAttributes() ?>>
<?php echo $pharmacy_products->ToonLabel->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->GarmentType->Visible) { // GarmentType ?>
		<td data-name="GarmentType"<?php echo $pharmacy_products->GarmentType->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_GarmentType" class="pharmacy_products_GarmentType">
<span<?php echo $pharmacy_products->GarmentType->viewAttributes() ?>>
<?php echo $pharmacy_products->GarmentType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->AgeGroup->Visible) { // AgeGroup ?>
		<td data-name="AgeGroup"<?php echo $pharmacy_products->AgeGroup->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_AgeGroup" class="pharmacy_products_AgeGroup">
<span<?php echo $pharmacy_products->AgeGroup->viewAttributes() ?>>
<?php echo $pharmacy_products->AgeGroup->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->Season->Visible) { // Season ?>
		<td data-name="Season"<?php echo $pharmacy_products->Season->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_Season" class="pharmacy_products_Season">
<span<?php echo $pharmacy_products->Season->viewAttributes() ?>>
<?php echo $pharmacy_products->Season->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->DailyStockEntry->Visible) { // DailyStockEntry ?>
		<td data-name="DailyStockEntry"<?php echo $pharmacy_products->DailyStockEntry->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_DailyStockEntry" class="pharmacy_products_DailyStockEntry">
<span<?php echo $pharmacy_products->DailyStockEntry->viewAttributes() ?>>
<?php echo $pharmacy_products->DailyStockEntry->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->ModifierApplicable->Visible) { // ModifierApplicable ?>
		<td data-name="ModifierApplicable"<?php echo $pharmacy_products->ModifierApplicable->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_ModifierApplicable" class="pharmacy_products_ModifierApplicable">
<span<?php echo $pharmacy_products->ModifierApplicable->viewAttributes() ?>>
<?php echo $pharmacy_products->ModifierApplicable->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->ModifierType->Visible) { // ModifierType ?>
		<td data-name="ModifierType"<?php echo $pharmacy_products->ModifierType->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_ModifierType" class="pharmacy_products_ModifierType">
<span<?php echo $pharmacy_products->ModifierType->viewAttributes() ?>>
<?php echo $pharmacy_products->ModifierType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->AcceptZeroRate->Visible) { // AcceptZeroRate ?>
		<td data-name="AcceptZeroRate"<?php echo $pharmacy_products->AcceptZeroRate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_AcceptZeroRate" class="pharmacy_products_AcceptZeroRate">
<span<?php echo $pharmacy_products->AcceptZeroRate->viewAttributes() ?>>
<?php echo $pharmacy_products->AcceptZeroRate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->ExciseDutyCode->Visible) { // ExciseDutyCode ?>
		<td data-name="ExciseDutyCode"<?php echo $pharmacy_products->ExciseDutyCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_ExciseDutyCode" class="pharmacy_products_ExciseDutyCode">
<span<?php echo $pharmacy_products->ExciseDutyCode->viewAttributes() ?>>
<?php echo $pharmacy_products->ExciseDutyCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->IndentProductGroupCode->Visible) { // IndentProductGroupCode ?>
		<td data-name="IndentProductGroupCode"<?php echo $pharmacy_products->IndentProductGroupCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_IndentProductGroupCode" class="pharmacy_products_IndentProductGroupCode">
<span<?php echo $pharmacy_products->IndentProductGroupCode->viewAttributes() ?>>
<?php echo $pharmacy_products->IndentProductGroupCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->IsMultiBatch->Visible) { // IsMultiBatch ?>
		<td data-name="IsMultiBatch"<?php echo $pharmacy_products->IsMultiBatch->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_IsMultiBatch" class="pharmacy_products_IsMultiBatch">
<span<?php echo $pharmacy_products->IsMultiBatch->viewAttributes() ?>>
<?php echo $pharmacy_products->IsMultiBatch->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->IsSingleBatch->Visible) { // IsSingleBatch ?>
		<td data-name="IsSingleBatch"<?php echo $pharmacy_products->IsSingleBatch->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_IsSingleBatch" class="pharmacy_products_IsSingleBatch">
<span<?php echo $pharmacy_products->IsSingleBatch->viewAttributes() ?>>
<?php echo $pharmacy_products->IsSingleBatch->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->MarkUpRate1->Visible) { // MarkUpRate1 ?>
		<td data-name="MarkUpRate1"<?php echo $pharmacy_products->MarkUpRate1->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_MarkUpRate1" class="pharmacy_products_MarkUpRate1">
<span<?php echo $pharmacy_products->MarkUpRate1->viewAttributes() ?>>
<?php echo $pharmacy_products->MarkUpRate1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->MarkDownRate1->Visible) { // MarkDownRate1 ?>
		<td data-name="MarkDownRate1"<?php echo $pharmacy_products->MarkDownRate1->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_MarkDownRate1" class="pharmacy_products_MarkDownRate1">
<span<?php echo $pharmacy_products->MarkDownRate1->viewAttributes() ?>>
<?php echo $pharmacy_products->MarkDownRate1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->MarkUpRate2->Visible) { // MarkUpRate2 ?>
		<td data-name="MarkUpRate2"<?php echo $pharmacy_products->MarkUpRate2->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_MarkUpRate2" class="pharmacy_products_MarkUpRate2">
<span<?php echo $pharmacy_products->MarkUpRate2->viewAttributes() ?>>
<?php echo $pharmacy_products->MarkUpRate2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->MarkDownRate2->Visible) { // MarkDownRate2 ?>
		<td data-name="MarkDownRate2"<?php echo $pharmacy_products->MarkDownRate2->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_MarkDownRate2" class="pharmacy_products_MarkDownRate2">
<span<?php echo $pharmacy_products->MarkDownRate2->viewAttributes() ?>>
<?php echo $pharmacy_products->MarkDownRate2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->_Yield->Visible) { // Yield ?>
		<td data-name="_Yield"<?php echo $pharmacy_products->_Yield->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products__Yield" class="pharmacy_products__Yield">
<span<?php echo $pharmacy_products->_Yield->viewAttributes() ?>>
<?php echo $pharmacy_products->_Yield->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->RefProductCode->Visible) { // RefProductCode ?>
		<td data-name="RefProductCode"<?php echo $pharmacy_products->RefProductCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_RefProductCode" class="pharmacy_products_RefProductCode">
<span<?php echo $pharmacy_products->RefProductCode->viewAttributes() ?>>
<?php echo $pharmacy_products->RefProductCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->Volume->Visible) { // Volume ?>
		<td data-name="Volume"<?php echo $pharmacy_products->Volume->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_Volume" class="pharmacy_products_Volume">
<span<?php echo $pharmacy_products->Volume->viewAttributes() ?>>
<?php echo $pharmacy_products->Volume->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->MeasurementID->Visible) { // MeasurementID ?>
		<td data-name="MeasurementID"<?php echo $pharmacy_products->MeasurementID->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_MeasurementID" class="pharmacy_products_MeasurementID">
<span<?php echo $pharmacy_products->MeasurementID->viewAttributes() ?>>
<?php echo $pharmacy_products->MeasurementID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->CountryCode->Visible) { // CountryCode ?>
		<td data-name="CountryCode"<?php echo $pharmacy_products->CountryCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_CountryCode" class="pharmacy_products_CountryCode">
<span<?php echo $pharmacy_products->CountryCode->viewAttributes() ?>>
<?php echo $pharmacy_products->CountryCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->AcceptWMQty->Visible) { // AcceptWMQty ?>
		<td data-name="AcceptWMQty"<?php echo $pharmacy_products->AcceptWMQty->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_AcceptWMQty" class="pharmacy_products_AcceptWMQty">
<span<?php echo $pharmacy_products->AcceptWMQty->viewAttributes() ?>>
<?php echo $pharmacy_products->AcceptWMQty->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->SingleBatchBasedOnRate->Visible) { // SingleBatchBasedOnRate ?>
		<td data-name="SingleBatchBasedOnRate"<?php echo $pharmacy_products->SingleBatchBasedOnRate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_SingleBatchBasedOnRate" class="pharmacy_products_SingleBatchBasedOnRate">
<span<?php echo $pharmacy_products->SingleBatchBasedOnRate->viewAttributes() ?>>
<?php echo $pharmacy_products->SingleBatchBasedOnRate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->TenderNo->Visible) { // TenderNo ?>
		<td data-name="TenderNo"<?php echo $pharmacy_products->TenderNo->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_TenderNo" class="pharmacy_products_TenderNo">
<span<?php echo $pharmacy_products->TenderNo->viewAttributes() ?>>
<?php echo $pharmacy_products->TenderNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->SingleBillMaximumSoldQtyFiled->Visible) { // SingleBillMaximumSoldQtyFiled ?>
		<td data-name="SingleBillMaximumSoldQtyFiled"<?php echo $pharmacy_products->SingleBillMaximumSoldQtyFiled->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_SingleBillMaximumSoldQtyFiled" class="pharmacy_products_SingleBillMaximumSoldQtyFiled">
<span<?php echo $pharmacy_products->SingleBillMaximumSoldQtyFiled->viewAttributes() ?>>
<?php echo $pharmacy_products->SingleBillMaximumSoldQtyFiled->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->Strength1->Visible) { // Strength1 ?>
		<td data-name="Strength1"<?php echo $pharmacy_products->Strength1->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_Strength1" class="pharmacy_products_Strength1">
<span<?php echo $pharmacy_products->Strength1->viewAttributes() ?>>
<?php echo $pharmacy_products->Strength1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->Strength2->Visible) { // Strength2 ?>
		<td data-name="Strength2"<?php echo $pharmacy_products->Strength2->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_Strength2" class="pharmacy_products_Strength2">
<span<?php echo $pharmacy_products->Strength2->viewAttributes() ?>>
<?php echo $pharmacy_products->Strength2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->Strength3->Visible) { // Strength3 ?>
		<td data-name="Strength3"<?php echo $pharmacy_products->Strength3->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_Strength3" class="pharmacy_products_Strength3">
<span<?php echo $pharmacy_products->Strength3->viewAttributes() ?>>
<?php echo $pharmacy_products->Strength3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->Strength4->Visible) { // Strength4 ?>
		<td data-name="Strength4"<?php echo $pharmacy_products->Strength4->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_Strength4" class="pharmacy_products_Strength4">
<span<?php echo $pharmacy_products->Strength4->viewAttributes() ?>>
<?php echo $pharmacy_products->Strength4->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->Strength5->Visible) { // Strength5 ?>
		<td data-name="Strength5"<?php echo $pharmacy_products->Strength5->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_Strength5" class="pharmacy_products_Strength5">
<span<?php echo $pharmacy_products->Strength5->viewAttributes() ?>>
<?php echo $pharmacy_products->Strength5->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->IngredientCode1->Visible) { // IngredientCode1 ?>
		<td data-name="IngredientCode1"<?php echo $pharmacy_products->IngredientCode1->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_IngredientCode1" class="pharmacy_products_IngredientCode1">
<span<?php echo $pharmacy_products->IngredientCode1->viewAttributes() ?>>
<?php echo $pharmacy_products->IngredientCode1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->IngredientCode2->Visible) { // IngredientCode2 ?>
		<td data-name="IngredientCode2"<?php echo $pharmacy_products->IngredientCode2->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_IngredientCode2" class="pharmacy_products_IngredientCode2">
<span<?php echo $pharmacy_products->IngredientCode2->viewAttributes() ?>>
<?php echo $pharmacy_products->IngredientCode2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->IngredientCode3->Visible) { // IngredientCode3 ?>
		<td data-name="IngredientCode3"<?php echo $pharmacy_products->IngredientCode3->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_IngredientCode3" class="pharmacy_products_IngredientCode3">
<span<?php echo $pharmacy_products->IngredientCode3->viewAttributes() ?>>
<?php echo $pharmacy_products->IngredientCode3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->IngredientCode4->Visible) { // IngredientCode4 ?>
		<td data-name="IngredientCode4"<?php echo $pharmacy_products->IngredientCode4->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_IngredientCode4" class="pharmacy_products_IngredientCode4">
<span<?php echo $pharmacy_products->IngredientCode4->viewAttributes() ?>>
<?php echo $pharmacy_products->IngredientCode4->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->IngredientCode5->Visible) { // IngredientCode5 ?>
		<td data-name="IngredientCode5"<?php echo $pharmacy_products->IngredientCode5->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_IngredientCode5" class="pharmacy_products_IngredientCode5">
<span<?php echo $pharmacy_products->IngredientCode5->viewAttributes() ?>>
<?php echo $pharmacy_products->IngredientCode5->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->OrderType->Visible) { // OrderType ?>
		<td data-name="OrderType"<?php echo $pharmacy_products->OrderType->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_OrderType" class="pharmacy_products_OrderType">
<span<?php echo $pharmacy_products->OrderType->viewAttributes() ?>>
<?php echo $pharmacy_products->OrderType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->StockUOM->Visible) { // StockUOM ?>
		<td data-name="StockUOM"<?php echo $pharmacy_products->StockUOM->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_StockUOM" class="pharmacy_products_StockUOM">
<span<?php echo $pharmacy_products->StockUOM->viewAttributes() ?>>
<?php echo $pharmacy_products->StockUOM->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->PriceUOM->Visible) { // PriceUOM ?>
		<td data-name="PriceUOM"<?php echo $pharmacy_products->PriceUOM->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_PriceUOM" class="pharmacy_products_PriceUOM">
<span<?php echo $pharmacy_products->PriceUOM->viewAttributes() ?>>
<?php echo $pharmacy_products->PriceUOM->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->DefaultSaleUOM->Visible) { // DefaultSaleUOM ?>
		<td data-name="DefaultSaleUOM"<?php echo $pharmacy_products->DefaultSaleUOM->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_DefaultSaleUOM" class="pharmacy_products_DefaultSaleUOM">
<span<?php echo $pharmacy_products->DefaultSaleUOM->viewAttributes() ?>>
<?php echo $pharmacy_products->DefaultSaleUOM->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->DefaultPurchaseUOM->Visible) { // DefaultPurchaseUOM ?>
		<td data-name="DefaultPurchaseUOM"<?php echo $pharmacy_products->DefaultPurchaseUOM->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_DefaultPurchaseUOM" class="pharmacy_products_DefaultPurchaseUOM">
<span<?php echo $pharmacy_products->DefaultPurchaseUOM->viewAttributes() ?>>
<?php echo $pharmacy_products->DefaultPurchaseUOM->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->ReportingUOM->Visible) { // ReportingUOM ?>
		<td data-name="ReportingUOM"<?php echo $pharmacy_products->ReportingUOM->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_ReportingUOM" class="pharmacy_products_ReportingUOM">
<span<?php echo $pharmacy_products->ReportingUOM->viewAttributes() ?>>
<?php echo $pharmacy_products->ReportingUOM->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->LastPurchasedUOM->Visible) { // LastPurchasedUOM ?>
		<td data-name="LastPurchasedUOM"<?php echo $pharmacy_products->LastPurchasedUOM->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_LastPurchasedUOM" class="pharmacy_products_LastPurchasedUOM">
<span<?php echo $pharmacy_products->LastPurchasedUOM->viewAttributes() ?>>
<?php echo $pharmacy_products->LastPurchasedUOM->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->TreatmentCodes->Visible) { // TreatmentCodes ?>
		<td data-name="TreatmentCodes"<?php echo $pharmacy_products->TreatmentCodes->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_TreatmentCodes" class="pharmacy_products_TreatmentCodes">
<span<?php echo $pharmacy_products->TreatmentCodes->viewAttributes() ?>>
<?php echo $pharmacy_products->TreatmentCodes->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->InsuranceType->Visible) { // InsuranceType ?>
		<td data-name="InsuranceType"<?php echo $pharmacy_products->InsuranceType->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_InsuranceType" class="pharmacy_products_InsuranceType">
<span<?php echo $pharmacy_products->InsuranceType->viewAttributes() ?>>
<?php echo $pharmacy_products->InsuranceType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->CoverageGroupCodes->Visible) { // CoverageGroupCodes ?>
		<td data-name="CoverageGroupCodes"<?php echo $pharmacy_products->CoverageGroupCodes->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_CoverageGroupCodes" class="pharmacy_products_CoverageGroupCodes">
<span<?php echo $pharmacy_products->CoverageGroupCodes->viewAttributes() ?>>
<?php echo $pharmacy_products->CoverageGroupCodes->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->MultipleUOM->Visible) { // MultipleUOM ?>
		<td data-name="MultipleUOM"<?php echo $pharmacy_products->MultipleUOM->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_MultipleUOM" class="pharmacy_products_MultipleUOM">
<span<?php echo $pharmacy_products->MultipleUOM->viewAttributes() ?>>
<?php echo $pharmacy_products->MultipleUOM->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->SalePriceComputation->Visible) { // SalePriceComputation ?>
		<td data-name="SalePriceComputation"<?php echo $pharmacy_products->SalePriceComputation->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_SalePriceComputation" class="pharmacy_products_SalePriceComputation">
<span<?php echo $pharmacy_products->SalePriceComputation->viewAttributes() ?>>
<?php echo $pharmacy_products->SalePriceComputation->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->StockCorrection->Visible) { // StockCorrection ?>
		<td data-name="StockCorrection"<?php echo $pharmacy_products->StockCorrection->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_StockCorrection" class="pharmacy_products_StockCorrection">
<span<?php echo $pharmacy_products->StockCorrection->viewAttributes() ?>>
<?php echo $pharmacy_products->StockCorrection->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->LBTPercentage->Visible) { // LBTPercentage ?>
		<td data-name="LBTPercentage"<?php echo $pharmacy_products->LBTPercentage->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_LBTPercentage" class="pharmacy_products_LBTPercentage">
<span<?php echo $pharmacy_products->LBTPercentage->viewAttributes() ?>>
<?php echo $pharmacy_products->LBTPercentage->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->SalesCommission->Visible) { // SalesCommission ?>
		<td data-name="SalesCommission"<?php echo $pharmacy_products->SalesCommission->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_SalesCommission" class="pharmacy_products_SalesCommission">
<span<?php echo $pharmacy_products->SalesCommission->viewAttributes() ?>>
<?php echo $pharmacy_products->SalesCommission->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->LockedStock->Visible) { // LockedStock ?>
		<td data-name="LockedStock"<?php echo $pharmacy_products->LockedStock->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_LockedStock" class="pharmacy_products_LockedStock">
<span<?php echo $pharmacy_products->LockedStock->viewAttributes() ?>>
<?php echo $pharmacy_products->LockedStock->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->MinMaxUOM->Visible) { // MinMaxUOM ?>
		<td data-name="MinMaxUOM"<?php echo $pharmacy_products->MinMaxUOM->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_MinMaxUOM" class="pharmacy_products_MinMaxUOM">
<span<?php echo $pharmacy_products->MinMaxUOM->viewAttributes() ?>>
<?php echo $pharmacy_products->MinMaxUOM->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->ExpiryMfrDateFormat->Visible) { // ExpiryMfrDateFormat ?>
		<td data-name="ExpiryMfrDateFormat"<?php echo $pharmacy_products->ExpiryMfrDateFormat->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_ExpiryMfrDateFormat" class="pharmacy_products_ExpiryMfrDateFormat">
<span<?php echo $pharmacy_products->ExpiryMfrDateFormat->viewAttributes() ?>>
<?php echo $pharmacy_products->ExpiryMfrDateFormat->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->ProductLifeTime->Visible) { // ProductLifeTime ?>
		<td data-name="ProductLifeTime"<?php echo $pharmacy_products->ProductLifeTime->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_ProductLifeTime" class="pharmacy_products_ProductLifeTime">
<span<?php echo $pharmacy_products->ProductLifeTime->viewAttributes() ?>>
<?php echo $pharmacy_products->ProductLifeTime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->IsCombo->Visible) { // IsCombo ?>
		<td data-name="IsCombo"<?php echo $pharmacy_products->IsCombo->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_IsCombo" class="pharmacy_products_IsCombo">
<span<?php echo $pharmacy_products->IsCombo->viewAttributes() ?>>
<?php echo $pharmacy_products->IsCombo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->ComboTypeCode->Visible) { // ComboTypeCode ?>
		<td data-name="ComboTypeCode"<?php echo $pharmacy_products->ComboTypeCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_ComboTypeCode" class="pharmacy_products_ComboTypeCode">
<span<?php echo $pharmacy_products->ComboTypeCode->viewAttributes() ?>>
<?php echo $pharmacy_products->ComboTypeCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->AttributeCount6->Visible) { // AttributeCount6 ?>
		<td data-name="AttributeCount6"<?php echo $pharmacy_products->AttributeCount6->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_AttributeCount6" class="pharmacy_products_AttributeCount6">
<span<?php echo $pharmacy_products->AttributeCount6->viewAttributes() ?>>
<?php echo $pharmacy_products->AttributeCount6->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->AttributeCount7->Visible) { // AttributeCount7 ?>
		<td data-name="AttributeCount7"<?php echo $pharmacy_products->AttributeCount7->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_AttributeCount7" class="pharmacy_products_AttributeCount7">
<span<?php echo $pharmacy_products->AttributeCount7->viewAttributes() ?>>
<?php echo $pharmacy_products->AttributeCount7->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->AttributeCount8->Visible) { // AttributeCount8 ?>
		<td data-name="AttributeCount8"<?php echo $pharmacy_products->AttributeCount8->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_AttributeCount8" class="pharmacy_products_AttributeCount8">
<span<?php echo $pharmacy_products->AttributeCount8->viewAttributes() ?>>
<?php echo $pharmacy_products->AttributeCount8->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->AttributeCount9->Visible) { // AttributeCount9 ?>
		<td data-name="AttributeCount9"<?php echo $pharmacy_products->AttributeCount9->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_AttributeCount9" class="pharmacy_products_AttributeCount9">
<span<?php echo $pharmacy_products->AttributeCount9->viewAttributes() ?>>
<?php echo $pharmacy_products->AttributeCount9->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->AttributeCount10->Visible) { // AttributeCount10 ?>
		<td data-name="AttributeCount10"<?php echo $pharmacy_products->AttributeCount10->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_AttributeCount10" class="pharmacy_products_AttributeCount10">
<span<?php echo $pharmacy_products->AttributeCount10->viewAttributes() ?>>
<?php echo $pharmacy_products->AttributeCount10->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->LabourCharge->Visible) { // LabourCharge ?>
		<td data-name="LabourCharge"<?php echo $pharmacy_products->LabourCharge->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_LabourCharge" class="pharmacy_products_LabourCharge">
<span<?php echo $pharmacy_products->LabourCharge->viewAttributes() ?>>
<?php echo $pharmacy_products->LabourCharge->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->AffectOtherCharge->Visible) { // AffectOtherCharge ?>
		<td data-name="AffectOtherCharge"<?php echo $pharmacy_products->AffectOtherCharge->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_AffectOtherCharge" class="pharmacy_products_AffectOtherCharge">
<span<?php echo $pharmacy_products->AffectOtherCharge->viewAttributes() ?>>
<?php echo $pharmacy_products->AffectOtherCharge->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->DosageInfo->Visible) { // DosageInfo ?>
		<td data-name="DosageInfo"<?php echo $pharmacy_products->DosageInfo->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_DosageInfo" class="pharmacy_products_DosageInfo">
<span<?php echo $pharmacy_products->DosageInfo->viewAttributes() ?>>
<?php echo $pharmacy_products->DosageInfo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->DosageType->Visible) { // DosageType ?>
		<td data-name="DosageType"<?php echo $pharmacy_products->DosageType->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_DosageType" class="pharmacy_products_DosageType">
<span<?php echo $pharmacy_products->DosageType->viewAttributes() ?>>
<?php echo $pharmacy_products->DosageType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->DefaultIndentUOM->Visible) { // DefaultIndentUOM ?>
		<td data-name="DefaultIndentUOM"<?php echo $pharmacy_products->DefaultIndentUOM->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_DefaultIndentUOM" class="pharmacy_products_DefaultIndentUOM">
<span<?php echo $pharmacy_products->DefaultIndentUOM->viewAttributes() ?>>
<?php echo $pharmacy_products->DefaultIndentUOM->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->PromoTag->Visible) { // PromoTag ?>
		<td data-name="PromoTag"<?php echo $pharmacy_products->PromoTag->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_PromoTag" class="pharmacy_products_PromoTag">
<span<?php echo $pharmacy_products->PromoTag->viewAttributes() ?>>
<?php echo $pharmacy_products->PromoTag->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->BillLevelPromoTag->Visible) { // BillLevelPromoTag ?>
		<td data-name="BillLevelPromoTag"<?php echo $pharmacy_products->BillLevelPromoTag->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_BillLevelPromoTag" class="pharmacy_products_BillLevelPromoTag">
<span<?php echo $pharmacy_products->BillLevelPromoTag->viewAttributes() ?>>
<?php echo $pharmacy_products->BillLevelPromoTag->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->IsMRPProduct->Visible) { // IsMRPProduct ?>
		<td data-name="IsMRPProduct"<?php echo $pharmacy_products->IsMRPProduct->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_IsMRPProduct" class="pharmacy_products_IsMRPProduct">
<span<?php echo $pharmacy_products->IsMRPProduct->viewAttributes() ?>>
<?php echo $pharmacy_products->IsMRPProduct->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->AlternateSaleUOM->Visible) { // AlternateSaleUOM ?>
		<td data-name="AlternateSaleUOM"<?php echo $pharmacy_products->AlternateSaleUOM->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_AlternateSaleUOM" class="pharmacy_products_AlternateSaleUOM">
<span<?php echo $pharmacy_products->AlternateSaleUOM->viewAttributes() ?>>
<?php echo $pharmacy_products->AlternateSaleUOM->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->FreeUOM->Visible) { // FreeUOM ?>
		<td data-name="FreeUOM"<?php echo $pharmacy_products->FreeUOM->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_FreeUOM" class="pharmacy_products_FreeUOM">
<span<?php echo $pharmacy_products->FreeUOM->viewAttributes() ?>>
<?php echo $pharmacy_products->FreeUOM->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->MarketedCode->Visible) { // MarketedCode ?>
		<td data-name="MarketedCode"<?php echo $pharmacy_products->MarketedCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_MarketedCode" class="pharmacy_products_MarketedCode">
<span<?php echo $pharmacy_products->MarketedCode->viewAttributes() ?>>
<?php echo $pharmacy_products->MarketedCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->MinimumSalePrice->Visible) { // MinimumSalePrice ?>
		<td data-name="MinimumSalePrice"<?php echo $pharmacy_products->MinimumSalePrice->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_MinimumSalePrice" class="pharmacy_products_MinimumSalePrice">
<span<?php echo $pharmacy_products->MinimumSalePrice->viewAttributes() ?>>
<?php echo $pharmacy_products->MinimumSalePrice->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->PRate1->Visible) { // PRate1 ?>
		<td data-name="PRate1"<?php echo $pharmacy_products->PRate1->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_PRate1" class="pharmacy_products_PRate1">
<span<?php echo $pharmacy_products->PRate1->viewAttributes() ?>>
<?php echo $pharmacy_products->PRate1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->PRate2->Visible) { // PRate2 ?>
		<td data-name="PRate2"<?php echo $pharmacy_products->PRate2->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_PRate2" class="pharmacy_products_PRate2">
<span<?php echo $pharmacy_products->PRate2->viewAttributes() ?>>
<?php echo $pharmacy_products->PRate2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->LPItemCost->Visible) { // LPItemCost ?>
		<td data-name="LPItemCost"<?php echo $pharmacy_products->LPItemCost->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_LPItemCost" class="pharmacy_products_LPItemCost">
<span<?php echo $pharmacy_products->LPItemCost->viewAttributes() ?>>
<?php echo $pharmacy_products->LPItemCost->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->FixedItemCost->Visible) { // FixedItemCost ?>
		<td data-name="FixedItemCost"<?php echo $pharmacy_products->FixedItemCost->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_FixedItemCost" class="pharmacy_products_FixedItemCost">
<span<?php echo $pharmacy_products->FixedItemCost->viewAttributes() ?>>
<?php echo $pharmacy_products->FixedItemCost->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->HSNId->Visible) { // HSNId ?>
		<td data-name="HSNId"<?php echo $pharmacy_products->HSNId->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_HSNId" class="pharmacy_products_HSNId">
<span<?php echo $pharmacy_products->HSNId->viewAttributes() ?>>
<?php echo $pharmacy_products->HSNId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->TaxInclusive->Visible) { // TaxInclusive ?>
		<td data-name="TaxInclusive"<?php echo $pharmacy_products->TaxInclusive->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_TaxInclusive" class="pharmacy_products_TaxInclusive">
<span<?php echo $pharmacy_products->TaxInclusive->viewAttributes() ?>>
<?php echo $pharmacy_products->TaxInclusive->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->EligibleforWarranty->Visible) { // EligibleforWarranty ?>
		<td data-name="EligibleforWarranty"<?php echo $pharmacy_products->EligibleforWarranty->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_EligibleforWarranty" class="pharmacy_products_EligibleforWarranty">
<span<?php echo $pharmacy_products->EligibleforWarranty->viewAttributes() ?>>
<?php echo $pharmacy_products->EligibleforWarranty->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->NoofMonthsWarranty->Visible) { // NoofMonthsWarranty ?>
		<td data-name="NoofMonthsWarranty"<?php echo $pharmacy_products->NoofMonthsWarranty->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_NoofMonthsWarranty" class="pharmacy_products_NoofMonthsWarranty">
<span<?php echo $pharmacy_products->NoofMonthsWarranty->viewAttributes() ?>>
<?php echo $pharmacy_products->NoofMonthsWarranty->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->ComputeTaxonCost->Visible) { // ComputeTaxonCost ?>
		<td data-name="ComputeTaxonCost"<?php echo $pharmacy_products->ComputeTaxonCost->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_ComputeTaxonCost" class="pharmacy_products_ComputeTaxonCost">
<span<?php echo $pharmacy_products->ComputeTaxonCost->viewAttributes() ?>>
<?php echo $pharmacy_products->ComputeTaxonCost->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->HasEmptyBottleTrack->Visible) { // HasEmptyBottleTrack ?>
		<td data-name="HasEmptyBottleTrack"<?php echo $pharmacy_products->HasEmptyBottleTrack->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_HasEmptyBottleTrack" class="pharmacy_products_HasEmptyBottleTrack">
<span<?php echo $pharmacy_products->HasEmptyBottleTrack->viewAttributes() ?>>
<?php echo $pharmacy_products->HasEmptyBottleTrack->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->EmptyBottleReferenceCode->Visible) { // EmptyBottleReferenceCode ?>
		<td data-name="EmptyBottleReferenceCode"<?php echo $pharmacy_products->EmptyBottleReferenceCode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_EmptyBottleReferenceCode" class="pharmacy_products_EmptyBottleReferenceCode">
<span<?php echo $pharmacy_products->EmptyBottleReferenceCode->viewAttributes() ?>>
<?php echo $pharmacy_products->EmptyBottleReferenceCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->AdditionalCESSAmount->Visible) { // AdditionalCESSAmount ?>
		<td data-name="AdditionalCESSAmount"<?php echo $pharmacy_products->AdditionalCESSAmount->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_AdditionalCESSAmount" class="pharmacy_products_AdditionalCESSAmount">
<span<?php echo $pharmacy_products->AdditionalCESSAmount->viewAttributes() ?>>
<?php echo $pharmacy_products->AdditionalCESSAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_products->EmptyBottleRate->Visible) { // EmptyBottleRate ?>
		<td data-name="EmptyBottleRate"<?php echo $pharmacy_products->EmptyBottleRate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_products_list->RowCnt ?>_pharmacy_products_EmptyBottleRate" class="pharmacy_products_EmptyBottleRate">
<span<?php echo $pharmacy_products->EmptyBottleRate->viewAttributes() ?>>
<?php echo $pharmacy_products->EmptyBottleRate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_products_list->ListOptions->render("body", "right", $pharmacy_products_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$pharmacy_products->isGridAdd())
		$pharmacy_products_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$pharmacy_products->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pharmacy_products_list->Recordset)
	$pharmacy_products_list->Recordset->Close();
?>
<?php if (!$pharmacy_products->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$pharmacy_products->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($pharmacy_products_list->Pager)) $pharmacy_products_list->Pager = new NumericPager($pharmacy_products_list->StartRec, $pharmacy_products_list->DisplayRecs, $pharmacy_products_list->TotalRecs, $pharmacy_products_list->RecRange, $pharmacy_products_list->AutoHidePager) ?>
<?php if ($pharmacy_products_list->Pager->RecordCount > 0 && $pharmacy_products_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($pharmacy_products_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_products_list->pageUrl() ?>start=<?php echo $pharmacy_products_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_products_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_products_list->pageUrl() ?>start=<?php echo $pharmacy_products_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($pharmacy_products_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $pharmacy_products_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_products_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_products_list->pageUrl() ?>start=<?php echo $pharmacy_products_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_products_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_products_list->pageUrl() ?>start=<?php echo $pharmacy_products_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($pharmacy_products_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $pharmacy_products_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $pharmacy_products_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $pharmacy_products_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($pharmacy_products_list->TotalRecs > 0 && (!$pharmacy_products_list->AutoHidePageSizeSelector || $pharmacy_products_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="pharmacy_products">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($pharmacy_products_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($pharmacy_products_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($pharmacy_products_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($pharmacy_products_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($pharmacy_products_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($pharmacy_products_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($pharmacy_products->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
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
<?php if ($pharmacy_products_list->TotalRecs == 0 && !$pharmacy_products->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pharmacy_products_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$pharmacy_products_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_products->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$pharmacy_products->isExport()) { ?>
<script>
ew.scrollableTable("gmp_pharmacy_products", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$pharmacy_products_list->terminate();
?>