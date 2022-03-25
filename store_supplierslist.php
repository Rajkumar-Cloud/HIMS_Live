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
$store_suppliers_list = new store_suppliers_list();

// Run the page
$store_suppliers_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$store_suppliers_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$store_suppliers->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fstore_supplierslist = currentForm = new ew.Form("fstore_supplierslist", "list");
fstore_supplierslist.formKeyCountName = '<?php echo $store_suppliers_list->FormKeyCountName ?>';

// Form_CustomValidate event
fstore_supplierslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fstore_supplierslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fstore_supplierslistsrch = currentSearchForm = new ew.Form("fstore_supplierslistsrch");

// Filters
fstore_supplierslistsrch.filterList = <?php echo $store_suppliers_list->getFilterList() ?>;
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
<?php if (!$store_suppliers->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($store_suppliers_list->TotalRecs > 0 && $store_suppliers_list->ExportOptions->visible()) { ?>
<?php $store_suppliers_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($store_suppliers_list->ImportOptions->visible()) { ?>
<?php $store_suppliers_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($store_suppliers_list->SearchOptions->visible()) { ?>
<?php $store_suppliers_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($store_suppliers_list->FilterOptions->visible()) { ?>
<?php $store_suppliers_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$store_suppliers_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$store_suppliers->isExport() && !$store_suppliers->CurrentAction) { ?>
<form name="fstore_supplierslistsrch" id="fstore_supplierslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($store_suppliers_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fstore_supplierslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="store_suppliers">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($store_suppliers_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($store_suppliers_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $store_suppliers_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($store_suppliers_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($store_suppliers_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($store_suppliers_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($store_suppliers_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $store_suppliers_list->showPageHeader(); ?>
<?php
$store_suppliers_list->showMessage();
?>
<?php if ($store_suppliers_list->TotalRecs > 0 || $store_suppliers->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($store_suppliers_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> store_suppliers">
<?php if (!$store_suppliers->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$store_suppliers->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($store_suppliers_list->Pager)) $store_suppliers_list->Pager = new NumericPager($store_suppliers_list->StartRec, $store_suppliers_list->DisplayRecs, $store_suppliers_list->TotalRecs, $store_suppliers_list->RecRange, $store_suppliers_list->AutoHidePager) ?>
<?php if ($store_suppliers_list->Pager->RecordCount > 0 && $store_suppliers_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($store_suppliers_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $store_suppliers_list->pageUrl() ?>start=<?php echo $store_suppliers_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($store_suppliers_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $store_suppliers_list->pageUrl() ?>start=<?php echo $store_suppliers_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($store_suppliers_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $store_suppliers_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($store_suppliers_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $store_suppliers_list->pageUrl() ?>start=<?php echo $store_suppliers_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($store_suppliers_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $store_suppliers_list->pageUrl() ?>start=<?php echo $store_suppliers_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($store_suppliers_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $store_suppliers_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $store_suppliers_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $store_suppliers_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($store_suppliers_list->TotalRecs > 0 && (!$store_suppliers_list->AutoHidePageSizeSelector || $store_suppliers_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="store_suppliers">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($store_suppliers_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($store_suppliers_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($store_suppliers_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($store_suppliers_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($store_suppliers_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($store_suppliers_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($store_suppliers->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $store_suppliers_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fstore_supplierslist" id="fstore_supplierslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($store_suppliers_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $store_suppliers_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="store_suppliers">
<div id="gmp_store_suppliers" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($store_suppliers_list->TotalRecs > 0 || $store_suppliers->isGridEdit()) { ?>
<table id="tbl_store_supplierslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$store_suppliers_list->RowType = ROWTYPE_HEADER;

// Render list options
$store_suppliers_list->renderListOptions();

// Render list options (header, left)
$store_suppliers_list->ListOptions->render("header", "left");
?>
<?php if ($store_suppliers->Suppliercode->Visible) { // Suppliercode ?>
	<?php if ($store_suppliers->sortUrl($store_suppliers->Suppliercode) == "") { ?>
		<th data-name="Suppliercode" class="<?php echo $store_suppliers->Suppliercode->headerCellClass() ?>"><div id="elh_store_suppliers_Suppliercode" class="store_suppliers_Suppliercode"><div class="ew-table-header-caption"><?php echo $store_suppliers->Suppliercode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Suppliercode" class="<?php echo $store_suppliers->Suppliercode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_suppliers->SortUrl($store_suppliers->Suppliercode) ?>',1);"><div id="elh_store_suppliers_Suppliercode" class="store_suppliers_Suppliercode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_suppliers->Suppliercode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_suppliers->Suppliercode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_suppliers->Suppliercode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_suppliers->Suppliername->Visible) { // Suppliername ?>
	<?php if ($store_suppliers->sortUrl($store_suppliers->Suppliername) == "") { ?>
		<th data-name="Suppliername" class="<?php echo $store_suppliers->Suppliername->headerCellClass() ?>"><div id="elh_store_suppliers_Suppliername" class="store_suppliers_Suppliername"><div class="ew-table-header-caption"><?php echo $store_suppliers->Suppliername->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Suppliername" class="<?php echo $store_suppliers->Suppliername->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_suppliers->SortUrl($store_suppliers->Suppliername) ?>',1);"><div id="elh_store_suppliers_Suppliername" class="store_suppliers_Suppliername">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_suppliers->Suppliername->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_suppliers->Suppliername->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_suppliers->Suppliername->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_suppliers->Abbreviation->Visible) { // Abbreviation ?>
	<?php if ($store_suppliers->sortUrl($store_suppliers->Abbreviation) == "") { ?>
		<th data-name="Abbreviation" class="<?php echo $store_suppliers->Abbreviation->headerCellClass() ?>"><div id="elh_store_suppliers_Abbreviation" class="store_suppliers_Abbreviation"><div class="ew-table-header-caption"><?php echo $store_suppliers->Abbreviation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Abbreviation" class="<?php echo $store_suppliers->Abbreviation->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_suppliers->SortUrl($store_suppliers->Abbreviation) ?>',1);"><div id="elh_store_suppliers_Abbreviation" class="store_suppliers_Abbreviation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_suppliers->Abbreviation->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_suppliers->Abbreviation->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_suppliers->Abbreviation->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_suppliers->Creationdate->Visible) { // Creationdate ?>
	<?php if ($store_suppliers->sortUrl($store_suppliers->Creationdate) == "") { ?>
		<th data-name="Creationdate" class="<?php echo $store_suppliers->Creationdate->headerCellClass() ?>"><div id="elh_store_suppliers_Creationdate" class="store_suppliers_Creationdate"><div class="ew-table-header-caption"><?php echo $store_suppliers->Creationdate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Creationdate" class="<?php echo $store_suppliers->Creationdate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_suppliers->SortUrl($store_suppliers->Creationdate) ?>',1);"><div id="elh_store_suppliers_Creationdate" class="store_suppliers_Creationdate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_suppliers->Creationdate->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_suppliers->Creationdate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_suppliers->Creationdate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_suppliers->Address1->Visible) { // Address1 ?>
	<?php if ($store_suppliers->sortUrl($store_suppliers->Address1) == "") { ?>
		<th data-name="Address1" class="<?php echo $store_suppliers->Address1->headerCellClass() ?>"><div id="elh_store_suppliers_Address1" class="store_suppliers_Address1"><div class="ew-table-header-caption"><?php echo $store_suppliers->Address1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Address1" class="<?php echo $store_suppliers->Address1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_suppliers->SortUrl($store_suppliers->Address1) ?>',1);"><div id="elh_store_suppliers_Address1" class="store_suppliers_Address1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_suppliers->Address1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_suppliers->Address1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_suppliers->Address1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_suppliers->Address2->Visible) { // Address2 ?>
	<?php if ($store_suppliers->sortUrl($store_suppliers->Address2) == "") { ?>
		<th data-name="Address2" class="<?php echo $store_suppliers->Address2->headerCellClass() ?>"><div id="elh_store_suppliers_Address2" class="store_suppliers_Address2"><div class="ew-table-header-caption"><?php echo $store_suppliers->Address2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Address2" class="<?php echo $store_suppliers->Address2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_suppliers->SortUrl($store_suppliers->Address2) ?>',1);"><div id="elh_store_suppliers_Address2" class="store_suppliers_Address2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_suppliers->Address2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_suppliers->Address2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_suppliers->Address2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_suppliers->Address3->Visible) { // Address3 ?>
	<?php if ($store_suppliers->sortUrl($store_suppliers->Address3) == "") { ?>
		<th data-name="Address3" class="<?php echo $store_suppliers->Address3->headerCellClass() ?>"><div id="elh_store_suppliers_Address3" class="store_suppliers_Address3"><div class="ew-table-header-caption"><?php echo $store_suppliers->Address3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Address3" class="<?php echo $store_suppliers->Address3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_suppliers->SortUrl($store_suppliers->Address3) ?>',1);"><div id="elh_store_suppliers_Address3" class="store_suppliers_Address3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_suppliers->Address3->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_suppliers->Address3->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_suppliers->Address3->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_suppliers->Citycode->Visible) { // Citycode ?>
	<?php if ($store_suppliers->sortUrl($store_suppliers->Citycode) == "") { ?>
		<th data-name="Citycode" class="<?php echo $store_suppliers->Citycode->headerCellClass() ?>"><div id="elh_store_suppliers_Citycode" class="store_suppliers_Citycode"><div class="ew-table-header-caption"><?php echo $store_suppliers->Citycode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Citycode" class="<?php echo $store_suppliers->Citycode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_suppliers->SortUrl($store_suppliers->Citycode) ?>',1);"><div id="elh_store_suppliers_Citycode" class="store_suppliers_Citycode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_suppliers->Citycode->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_suppliers->Citycode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_suppliers->Citycode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_suppliers->State->Visible) { // State ?>
	<?php if ($store_suppliers->sortUrl($store_suppliers->State) == "") { ?>
		<th data-name="State" class="<?php echo $store_suppliers->State->headerCellClass() ?>"><div id="elh_store_suppliers_State" class="store_suppliers_State"><div class="ew-table-header-caption"><?php echo $store_suppliers->State->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="State" class="<?php echo $store_suppliers->State->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_suppliers->SortUrl($store_suppliers->State) ?>',1);"><div id="elh_store_suppliers_State" class="store_suppliers_State">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_suppliers->State->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_suppliers->State->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_suppliers->State->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_suppliers->Pincode->Visible) { // Pincode ?>
	<?php if ($store_suppliers->sortUrl($store_suppliers->Pincode) == "") { ?>
		<th data-name="Pincode" class="<?php echo $store_suppliers->Pincode->headerCellClass() ?>"><div id="elh_store_suppliers_Pincode" class="store_suppliers_Pincode"><div class="ew-table-header-caption"><?php echo $store_suppliers->Pincode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pincode" class="<?php echo $store_suppliers->Pincode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_suppliers->SortUrl($store_suppliers->Pincode) ?>',1);"><div id="elh_store_suppliers_Pincode" class="store_suppliers_Pincode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_suppliers->Pincode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_suppliers->Pincode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_suppliers->Pincode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_suppliers->Tngstnumber->Visible) { // Tngstnumber ?>
	<?php if ($store_suppliers->sortUrl($store_suppliers->Tngstnumber) == "") { ?>
		<th data-name="Tngstnumber" class="<?php echo $store_suppliers->Tngstnumber->headerCellClass() ?>"><div id="elh_store_suppliers_Tngstnumber" class="store_suppliers_Tngstnumber"><div class="ew-table-header-caption"><?php echo $store_suppliers->Tngstnumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tngstnumber" class="<?php echo $store_suppliers->Tngstnumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_suppliers->SortUrl($store_suppliers->Tngstnumber) ?>',1);"><div id="elh_store_suppliers_Tngstnumber" class="store_suppliers_Tngstnumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_suppliers->Tngstnumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_suppliers->Tngstnumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_suppliers->Tngstnumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_suppliers->Phone->Visible) { // Phone ?>
	<?php if ($store_suppliers->sortUrl($store_suppliers->Phone) == "") { ?>
		<th data-name="Phone" class="<?php echo $store_suppliers->Phone->headerCellClass() ?>"><div id="elh_store_suppliers_Phone" class="store_suppliers_Phone"><div class="ew-table-header-caption"><?php echo $store_suppliers->Phone->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Phone" class="<?php echo $store_suppliers->Phone->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_suppliers->SortUrl($store_suppliers->Phone) ?>',1);"><div id="elh_store_suppliers_Phone" class="store_suppliers_Phone">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_suppliers->Phone->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_suppliers->Phone->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_suppliers->Phone->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_suppliers->Fax->Visible) { // Fax ?>
	<?php if ($store_suppliers->sortUrl($store_suppliers->Fax) == "") { ?>
		<th data-name="Fax" class="<?php echo $store_suppliers->Fax->headerCellClass() ?>"><div id="elh_store_suppliers_Fax" class="store_suppliers_Fax"><div class="ew-table-header-caption"><?php echo $store_suppliers->Fax->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Fax" class="<?php echo $store_suppliers->Fax->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_suppliers->SortUrl($store_suppliers->Fax) ?>',1);"><div id="elh_store_suppliers_Fax" class="store_suppliers_Fax">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_suppliers->Fax->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_suppliers->Fax->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_suppliers->Fax->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_suppliers->_Email->Visible) { // Email ?>
	<?php if ($store_suppliers->sortUrl($store_suppliers->_Email) == "") { ?>
		<th data-name="_Email" class="<?php echo $store_suppliers->_Email->headerCellClass() ?>"><div id="elh_store_suppliers__Email" class="store_suppliers__Email"><div class="ew-table-header-caption"><?php echo $store_suppliers->_Email->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_Email" class="<?php echo $store_suppliers->_Email->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_suppliers->SortUrl($store_suppliers->_Email) ?>',1);"><div id="elh_store_suppliers__Email" class="store_suppliers__Email">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_suppliers->_Email->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_suppliers->_Email->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_suppliers->_Email->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_suppliers->Paymentmode->Visible) { // Paymentmode ?>
	<?php if ($store_suppliers->sortUrl($store_suppliers->Paymentmode) == "") { ?>
		<th data-name="Paymentmode" class="<?php echo $store_suppliers->Paymentmode->headerCellClass() ?>"><div id="elh_store_suppliers_Paymentmode" class="store_suppliers_Paymentmode"><div class="ew-table-header-caption"><?php echo $store_suppliers->Paymentmode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Paymentmode" class="<?php echo $store_suppliers->Paymentmode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_suppliers->SortUrl($store_suppliers->Paymentmode) ?>',1);"><div id="elh_store_suppliers_Paymentmode" class="store_suppliers_Paymentmode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_suppliers->Paymentmode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_suppliers->Paymentmode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_suppliers->Paymentmode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_suppliers->Contactperson1->Visible) { // Contactperson1 ?>
	<?php if ($store_suppliers->sortUrl($store_suppliers->Contactperson1) == "") { ?>
		<th data-name="Contactperson1" class="<?php echo $store_suppliers->Contactperson1->headerCellClass() ?>"><div id="elh_store_suppliers_Contactperson1" class="store_suppliers_Contactperson1"><div class="ew-table-header-caption"><?php echo $store_suppliers->Contactperson1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Contactperson1" class="<?php echo $store_suppliers->Contactperson1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_suppliers->SortUrl($store_suppliers->Contactperson1) ?>',1);"><div id="elh_store_suppliers_Contactperson1" class="store_suppliers_Contactperson1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_suppliers->Contactperson1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_suppliers->Contactperson1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_suppliers->Contactperson1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_suppliers->CP1Address1->Visible) { // CP1Address1 ?>
	<?php if ($store_suppliers->sortUrl($store_suppliers->CP1Address1) == "") { ?>
		<th data-name="CP1Address1" class="<?php echo $store_suppliers->CP1Address1->headerCellClass() ?>"><div id="elh_store_suppliers_CP1Address1" class="store_suppliers_CP1Address1"><div class="ew-table-header-caption"><?php echo $store_suppliers->CP1Address1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CP1Address1" class="<?php echo $store_suppliers->CP1Address1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_suppliers->SortUrl($store_suppliers->CP1Address1) ?>',1);"><div id="elh_store_suppliers_CP1Address1" class="store_suppliers_CP1Address1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_suppliers->CP1Address1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_suppliers->CP1Address1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_suppliers->CP1Address1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_suppliers->CP1Address2->Visible) { // CP1Address2 ?>
	<?php if ($store_suppliers->sortUrl($store_suppliers->CP1Address2) == "") { ?>
		<th data-name="CP1Address2" class="<?php echo $store_suppliers->CP1Address2->headerCellClass() ?>"><div id="elh_store_suppliers_CP1Address2" class="store_suppliers_CP1Address2"><div class="ew-table-header-caption"><?php echo $store_suppliers->CP1Address2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CP1Address2" class="<?php echo $store_suppliers->CP1Address2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_suppliers->SortUrl($store_suppliers->CP1Address2) ?>',1);"><div id="elh_store_suppliers_CP1Address2" class="store_suppliers_CP1Address2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_suppliers->CP1Address2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_suppliers->CP1Address2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_suppliers->CP1Address2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_suppliers->CP1Address3->Visible) { // CP1Address3 ?>
	<?php if ($store_suppliers->sortUrl($store_suppliers->CP1Address3) == "") { ?>
		<th data-name="CP1Address3" class="<?php echo $store_suppliers->CP1Address3->headerCellClass() ?>"><div id="elh_store_suppliers_CP1Address3" class="store_suppliers_CP1Address3"><div class="ew-table-header-caption"><?php echo $store_suppliers->CP1Address3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CP1Address3" class="<?php echo $store_suppliers->CP1Address3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_suppliers->SortUrl($store_suppliers->CP1Address3) ?>',1);"><div id="elh_store_suppliers_CP1Address3" class="store_suppliers_CP1Address3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_suppliers->CP1Address3->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_suppliers->CP1Address3->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_suppliers->CP1Address3->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_suppliers->CP1Citycode->Visible) { // CP1Citycode ?>
	<?php if ($store_suppliers->sortUrl($store_suppliers->CP1Citycode) == "") { ?>
		<th data-name="CP1Citycode" class="<?php echo $store_suppliers->CP1Citycode->headerCellClass() ?>"><div id="elh_store_suppliers_CP1Citycode" class="store_suppliers_CP1Citycode"><div class="ew-table-header-caption"><?php echo $store_suppliers->CP1Citycode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CP1Citycode" class="<?php echo $store_suppliers->CP1Citycode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_suppliers->SortUrl($store_suppliers->CP1Citycode) ?>',1);"><div id="elh_store_suppliers_CP1Citycode" class="store_suppliers_CP1Citycode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_suppliers->CP1Citycode->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_suppliers->CP1Citycode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_suppliers->CP1Citycode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_suppliers->CP1State->Visible) { // CP1State ?>
	<?php if ($store_suppliers->sortUrl($store_suppliers->CP1State) == "") { ?>
		<th data-name="CP1State" class="<?php echo $store_suppliers->CP1State->headerCellClass() ?>"><div id="elh_store_suppliers_CP1State" class="store_suppliers_CP1State"><div class="ew-table-header-caption"><?php echo $store_suppliers->CP1State->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CP1State" class="<?php echo $store_suppliers->CP1State->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_suppliers->SortUrl($store_suppliers->CP1State) ?>',1);"><div id="elh_store_suppliers_CP1State" class="store_suppliers_CP1State">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_suppliers->CP1State->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_suppliers->CP1State->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_suppliers->CP1State->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_suppliers->CP1Pincode->Visible) { // CP1Pincode ?>
	<?php if ($store_suppliers->sortUrl($store_suppliers->CP1Pincode) == "") { ?>
		<th data-name="CP1Pincode" class="<?php echo $store_suppliers->CP1Pincode->headerCellClass() ?>"><div id="elh_store_suppliers_CP1Pincode" class="store_suppliers_CP1Pincode"><div class="ew-table-header-caption"><?php echo $store_suppliers->CP1Pincode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CP1Pincode" class="<?php echo $store_suppliers->CP1Pincode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_suppliers->SortUrl($store_suppliers->CP1Pincode) ?>',1);"><div id="elh_store_suppliers_CP1Pincode" class="store_suppliers_CP1Pincode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_suppliers->CP1Pincode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_suppliers->CP1Pincode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_suppliers->CP1Pincode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_suppliers->CP1Designation->Visible) { // CP1Designation ?>
	<?php if ($store_suppliers->sortUrl($store_suppliers->CP1Designation) == "") { ?>
		<th data-name="CP1Designation" class="<?php echo $store_suppliers->CP1Designation->headerCellClass() ?>"><div id="elh_store_suppliers_CP1Designation" class="store_suppliers_CP1Designation"><div class="ew-table-header-caption"><?php echo $store_suppliers->CP1Designation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CP1Designation" class="<?php echo $store_suppliers->CP1Designation->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_suppliers->SortUrl($store_suppliers->CP1Designation) ?>',1);"><div id="elh_store_suppliers_CP1Designation" class="store_suppliers_CP1Designation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_suppliers->CP1Designation->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_suppliers->CP1Designation->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_suppliers->CP1Designation->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_suppliers->CP1Phone->Visible) { // CP1Phone ?>
	<?php if ($store_suppliers->sortUrl($store_suppliers->CP1Phone) == "") { ?>
		<th data-name="CP1Phone" class="<?php echo $store_suppliers->CP1Phone->headerCellClass() ?>"><div id="elh_store_suppliers_CP1Phone" class="store_suppliers_CP1Phone"><div class="ew-table-header-caption"><?php echo $store_suppliers->CP1Phone->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CP1Phone" class="<?php echo $store_suppliers->CP1Phone->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_suppliers->SortUrl($store_suppliers->CP1Phone) ?>',1);"><div id="elh_store_suppliers_CP1Phone" class="store_suppliers_CP1Phone">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_suppliers->CP1Phone->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_suppliers->CP1Phone->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_suppliers->CP1Phone->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_suppliers->CP1MobileNo->Visible) { // CP1MobileNo ?>
	<?php if ($store_suppliers->sortUrl($store_suppliers->CP1MobileNo) == "") { ?>
		<th data-name="CP1MobileNo" class="<?php echo $store_suppliers->CP1MobileNo->headerCellClass() ?>"><div id="elh_store_suppliers_CP1MobileNo" class="store_suppliers_CP1MobileNo"><div class="ew-table-header-caption"><?php echo $store_suppliers->CP1MobileNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CP1MobileNo" class="<?php echo $store_suppliers->CP1MobileNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_suppliers->SortUrl($store_suppliers->CP1MobileNo) ?>',1);"><div id="elh_store_suppliers_CP1MobileNo" class="store_suppliers_CP1MobileNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_suppliers->CP1MobileNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_suppliers->CP1MobileNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_suppliers->CP1MobileNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_suppliers->CP1Fax->Visible) { // CP1Fax ?>
	<?php if ($store_suppliers->sortUrl($store_suppliers->CP1Fax) == "") { ?>
		<th data-name="CP1Fax" class="<?php echo $store_suppliers->CP1Fax->headerCellClass() ?>"><div id="elh_store_suppliers_CP1Fax" class="store_suppliers_CP1Fax"><div class="ew-table-header-caption"><?php echo $store_suppliers->CP1Fax->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CP1Fax" class="<?php echo $store_suppliers->CP1Fax->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_suppliers->SortUrl($store_suppliers->CP1Fax) ?>',1);"><div id="elh_store_suppliers_CP1Fax" class="store_suppliers_CP1Fax">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_suppliers->CP1Fax->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_suppliers->CP1Fax->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_suppliers->CP1Fax->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_suppliers->CP1Email->Visible) { // CP1Email ?>
	<?php if ($store_suppliers->sortUrl($store_suppliers->CP1Email) == "") { ?>
		<th data-name="CP1Email" class="<?php echo $store_suppliers->CP1Email->headerCellClass() ?>"><div id="elh_store_suppliers_CP1Email" class="store_suppliers_CP1Email"><div class="ew-table-header-caption"><?php echo $store_suppliers->CP1Email->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CP1Email" class="<?php echo $store_suppliers->CP1Email->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_suppliers->SortUrl($store_suppliers->CP1Email) ?>',1);"><div id="elh_store_suppliers_CP1Email" class="store_suppliers_CP1Email">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_suppliers->CP1Email->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_suppliers->CP1Email->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_suppliers->CP1Email->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_suppliers->Contactperson2->Visible) { // Contactperson2 ?>
	<?php if ($store_suppliers->sortUrl($store_suppliers->Contactperson2) == "") { ?>
		<th data-name="Contactperson2" class="<?php echo $store_suppliers->Contactperson2->headerCellClass() ?>"><div id="elh_store_suppliers_Contactperson2" class="store_suppliers_Contactperson2"><div class="ew-table-header-caption"><?php echo $store_suppliers->Contactperson2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Contactperson2" class="<?php echo $store_suppliers->Contactperson2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_suppliers->SortUrl($store_suppliers->Contactperson2) ?>',1);"><div id="elh_store_suppliers_Contactperson2" class="store_suppliers_Contactperson2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_suppliers->Contactperson2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_suppliers->Contactperson2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_suppliers->Contactperson2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_suppliers->CP2Address1->Visible) { // CP2Address1 ?>
	<?php if ($store_suppliers->sortUrl($store_suppliers->CP2Address1) == "") { ?>
		<th data-name="CP2Address1" class="<?php echo $store_suppliers->CP2Address1->headerCellClass() ?>"><div id="elh_store_suppliers_CP2Address1" class="store_suppliers_CP2Address1"><div class="ew-table-header-caption"><?php echo $store_suppliers->CP2Address1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CP2Address1" class="<?php echo $store_suppliers->CP2Address1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_suppliers->SortUrl($store_suppliers->CP2Address1) ?>',1);"><div id="elh_store_suppliers_CP2Address1" class="store_suppliers_CP2Address1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_suppliers->CP2Address1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_suppliers->CP2Address1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_suppliers->CP2Address1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_suppliers->CP2Address2->Visible) { // CP2Address2 ?>
	<?php if ($store_suppliers->sortUrl($store_suppliers->CP2Address2) == "") { ?>
		<th data-name="CP2Address2" class="<?php echo $store_suppliers->CP2Address2->headerCellClass() ?>"><div id="elh_store_suppliers_CP2Address2" class="store_suppliers_CP2Address2"><div class="ew-table-header-caption"><?php echo $store_suppliers->CP2Address2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CP2Address2" class="<?php echo $store_suppliers->CP2Address2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_suppliers->SortUrl($store_suppliers->CP2Address2) ?>',1);"><div id="elh_store_suppliers_CP2Address2" class="store_suppliers_CP2Address2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_suppliers->CP2Address2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_suppliers->CP2Address2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_suppliers->CP2Address2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_suppliers->CP2Address3->Visible) { // CP2Address3 ?>
	<?php if ($store_suppliers->sortUrl($store_suppliers->CP2Address3) == "") { ?>
		<th data-name="CP2Address3" class="<?php echo $store_suppliers->CP2Address3->headerCellClass() ?>"><div id="elh_store_suppliers_CP2Address3" class="store_suppliers_CP2Address3"><div class="ew-table-header-caption"><?php echo $store_suppliers->CP2Address3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CP2Address3" class="<?php echo $store_suppliers->CP2Address3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_suppliers->SortUrl($store_suppliers->CP2Address3) ?>',1);"><div id="elh_store_suppliers_CP2Address3" class="store_suppliers_CP2Address3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_suppliers->CP2Address3->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_suppliers->CP2Address3->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_suppliers->CP2Address3->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_suppliers->CP2Citycode->Visible) { // CP2Citycode ?>
	<?php if ($store_suppliers->sortUrl($store_suppliers->CP2Citycode) == "") { ?>
		<th data-name="CP2Citycode" class="<?php echo $store_suppliers->CP2Citycode->headerCellClass() ?>"><div id="elh_store_suppliers_CP2Citycode" class="store_suppliers_CP2Citycode"><div class="ew-table-header-caption"><?php echo $store_suppliers->CP2Citycode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CP2Citycode" class="<?php echo $store_suppliers->CP2Citycode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_suppliers->SortUrl($store_suppliers->CP2Citycode) ?>',1);"><div id="elh_store_suppliers_CP2Citycode" class="store_suppliers_CP2Citycode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_suppliers->CP2Citycode->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_suppliers->CP2Citycode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_suppliers->CP2Citycode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_suppliers->CP2State->Visible) { // CP2State ?>
	<?php if ($store_suppliers->sortUrl($store_suppliers->CP2State) == "") { ?>
		<th data-name="CP2State" class="<?php echo $store_suppliers->CP2State->headerCellClass() ?>"><div id="elh_store_suppliers_CP2State" class="store_suppliers_CP2State"><div class="ew-table-header-caption"><?php echo $store_suppliers->CP2State->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CP2State" class="<?php echo $store_suppliers->CP2State->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_suppliers->SortUrl($store_suppliers->CP2State) ?>',1);"><div id="elh_store_suppliers_CP2State" class="store_suppliers_CP2State">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_suppliers->CP2State->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_suppliers->CP2State->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_suppliers->CP2State->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_suppliers->CP2Pincode->Visible) { // CP2Pincode ?>
	<?php if ($store_suppliers->sortUrl($store_suppliers->CP2Pincode) == "") { ?>
		<th data-name="CP2Pincode" class="<?php echo $store_suppliers->CP2Pincode->headerCellClass() ?>"><div id="elh_store_suppliers_CP2Pincode" class="store_suppliers_CP2Pincode"><div class="ew-table-header-caption"><?php echo $store_suppliers->CP2Pincode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CP2Pincode" class="<?php echo $store_suppliers->CP2Pincode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_suppliers->SortUrl($store_suppliers->CP2Pincode) ?>',1);"><div id="elh_store_suppliers_CP2Pincode" class="store_suppliers_CP2Pincode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_suppliers->CP2Pincode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_suppliers->CP2Pincode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_suppliers->CP2Pincode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_suppliers->CP2Designation->Visible) { // CP2Designation ?>
	<?php if ($store_suppliers->sortUrl($store_suppliers->CP2Designation) == "") { ?>
		<th data-name="CP2Designation" class="<?php echo $store_suppliers->CP2Designation->headerCellClass() ?>"><div id="elh_store_suppliers_CP2Designation" class="store_suppliers_CP2Designation"><div class="ew-table-header-caption"><?php echo $store_suppliers->CP2Designation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CP2Designation" class="<?php echo $store_suppliers->CP2Designation->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_suppliers->SortUrl($store_suppliers->CP2Designation) ?>',1);"><div id="elh_store_suppliers_CP2Designation" class="store_suppliers_CP2Designation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_suppliers->CP2Designation->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_suppliers->CP2Designation->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_suppliers->CP2Designation->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_suppliers->CP2Phone->Visible) { // CP2Phone ?>
	<?php if ($store_suppliers->sortUrl($store_suppliers->CP2Phone) == "") { ?>
		<th data-name="CP2Phone" class="<?php echo $store_suppliers->CP2Phone->headerCellClass() ?>"><div id="elh_store_suppliers_CP2Phone" class="store_suppliers_CP2Phone"><div class="ew-table-header-caption"><?php echo $store_suppliers->CP2Phone->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CP2Phone" class="<?php echo $store_suppliers->CP2Phone->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_suppliers->SortUrl($store_suppliers->CP2Phone) ?>',1);"><div id="elh_store_suppliers_CP2Phone" class="store_suppliers_CP2Phone">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_suppliers->CP2Phone->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_suppliers->CP2Phone->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_suppliers->CP2Phone->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_suppliers->CP2MobileNo->Visible) { // CP2MobileNo ?>
	<?php if ($store_suppliers->sortUrl($store_suppliers->CP2MobileNo) == "") { ?>
		<th data-name="CP2MobileNo" class="<?php echo $store_suppliers->CP2MobileNo->headerCellClass() ?>"><div id="elh_store_suppliers_CP2MobileNo" class="store_suppliers_CP2MobileNo"><div class="ew-table-header-caption"><?php echo $store_suppliers->CP2MobileNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CP2MobileNo" class="<?php echo $store_suppliers->CP2MobileNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_suppliers->SortUrl($store_suppliers->CP2MobileNo) ?>',1);"><div id="elh_store_suppliers_CP2MobileNo" class="store_suppliers_CP2MobileNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_suppliers->CP2MobileNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_suppliers->CP2MobileNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_suppliers->CP2MobileNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_suppliers->CP2Fax->Visible) { // CP2Fax ?>
	<?php if ($store_suppliers->sortUrl($store_suppliers->CP2Fax) == "") { ?>
		<th data-name="CP2Fax" class="<?php echo $store_suppliers->CP2Fax->headerCellClass() ?>"><div id="elh_store_suppliers_CP2Fax" class="store_suppliers_CP2Fax"><div class="ew-table-header-caption"><?php echo $store_suppliers->CP2Fax->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CP2Fax" class="<?php echo $store_suppliers->CP2Fax->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_suppliers->SortUrl($store_suppliers->CP2Fax) ?>',1);"><div id="elh_store_suppliers_CP2Fax" class="store_suppliers_CP2Fax">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_suppliers->CP2Fax->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_suppliers->CP2Fax->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_suppliers->CP2Fax->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_suppliers->CP2Email->Visible) { // CP2Email ?>
	<?php if ($store_suppliers->sortUrl($store_suppliers->CP2Email) == "") { ?>
		<th data-name="CP2Email" class="<?php echo $store_suppliers->CP2Email->headerCellClass() ?>"><div id="elh_store_suppliers_CP2Email" class="store_suppliers_CP2Email"><div class="ew-table-header-caption"><?php echo $store_suppliers->CP2Email->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CP2Email" class="<?php echo $store_suppliers->CP2Email->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_suppliers->SortUrl($store_suppliers->CP2Email) ?>',1);"><div id="elh_store_suppliers_CP2Email" class="store_suppliers_CP2Email">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_suppliers->CP2Email->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_suppliers->CP2Email->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_suppliers->CP2Email->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_suppliers->Type->Visible) { // Type ?>
	<?php if ($store_suppliers->sortUrl($store_suppliers->Type) == "") { ?>
		<th data-name="Type" class="<?php echo $store_suppliers->Type->headerCellClass() ?>"><div id="elh_store_suppliers_Type" class="store_suppliers_Type"><div class="ew-table-header-caption"><?php echo $store_suppliers->Type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Type" class="<?php echo $store_suppliers->Type->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_suppliers->SortUrl($store_suppliers->Type) ?>',1);"><div id="elh_store_suppliers_Type" class="store_suppliers_Type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_suppliers->Type->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_suppliers->Type->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_suppliers->Type->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_suppliers->Creditterms->Visible) { // Creditterms ?>
	<?php if ($store_suppliers->sortUrl($store_suppliers->Creditterms) == "") { ?>
		<th data-name="Creditterms" class="<?php echo $store_suppliers->Creditterms->headerCellClass() ?>"><div id="elh_store_suppliers_Creditterms" class="store_suppliers_Creditterms"><div class="ew-table-header-caption"><?php echo $store_suppliers->Creditterms->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Creditterms" class="<?php echo $store_suppliers->Creditterms->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_suppliers->SortUrl($store_suppliers->Creditterms) ?>',1);"><div id="elh_store_suppliers_Creditterms" class="store_suppliers_Creditterms">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_suppliers->Creditterms->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_suppliers->Creditterms->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_suppliers->Creditterms->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_suppliers->Remarks->Visible) { // Remarks ?>
	<?php if ($store_suppliers->sortUrl($store_suppliers->Remarks) == "") { ?>
		<th data-name="Remarks" class="<?php echo $store_suppliers->Remarks->headerCellClass() ?>"><div id="elh_store_suppliers_Remarks" class="store_suppliers_Remarks"><div class="ew-table-header-caption"><?php echo $store_suppliers->Remarks->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Remarks" class="<?php echo $store_suppliers->Remarks->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_suppliers->SortUrl($store_suppliers->Remarks) ?>',1);"><div id="elh_store_suppliers_Remarks" class="store_suppliers_Remarks">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_suppliers->Remarks->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_suppliers->Remarks->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_suppliers->Remarks->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_suppliers->Tinnumber->Visible) { // Tinnumber ?>
	<?php if ($store_suppliers->sortUrl($store_suppliers->Tinnumber) == "") { ?>
		<th data-name="Tinnumber" class="<?php echo $store_suppliers->Tinnumber->headerCellClass() ?>"><div id="elh_store_suppliers_Tinnumber" class="store_suppliers_Tinnumber"><div class="ew-table-header-caption"><?php echo $store_suppliers->Tinnumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tinnumber" class="<?php echo $store_suppliers->Tinnumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_suppliers->SortUrl($store_suppliers->Tinnumber) ?>',1);"><div id="elh_store_suppliers_Tinnumber" class="store_suppliers_Tinnumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_suppliers->Tinnumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_suppliers->Tinnumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_suppliers->Tinnumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_suppliers->Universalsuppliercode->Visible) { // Universalsuppliercode ?>
	<?php if ($store_suppliers->sortUrl($store_suppliers->Universalsuppliercode) == "") { ?>
		<th data-name="Universalsuppliercode" class="<?php echo $store_suppliers->Universalsuppliercode->headerCellClass() ?>"><div id="elh_store_suppliers_Universalsuppliercode" class="store_suppliers_Universalsuppliercode"><div class="ew-table-header-caption"><?php echo $store_suppliers->Universalsuppliercode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Universalsuppliercode" class="<?php echo $store_suppliers->Universalsuppliercode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_suppliers->SortUrl($store_suppliers->Universalsuppliercode) ?>',1);"><div id="elh_store_suppliers_Universalsuppliercode" class="store_suppliers_Universalsuppliercode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_suppliers->Universalsuppliercode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_suppliers->Universalsuppliercode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_suppliers->Universalsuppliercode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_suppliers->Mobilenumber->Visible) { // Mobilenumber ?>
	<?php if ($store_suppliers->sortUrl($store_suppliers->Mobilenumber) == "") { ?>
		<th data-name="Mobilenumber" class="<?php echo $store_suppliers->Mobilenumber->headerCellClass() ?>"><div id="elh_store_suppliers_Mobilenumber" class="store_suppliers_Mobilenumber"><div class="ew-table-header-caption"><?php echo $store_suppliers->Mobilenumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mobilenumber" class="<?php echo $store_suppliers->Mobilenumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_suppliers->SortUrl($store_suppliers->Mobilenumber) ?>',1);"><div id="elh_store_suppliers_Mobilenumber" class="store_suppliers_Mobilenumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_suppliers->Mobilenumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_suppliers->Mobilenumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_suppliers->Mobilenumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_suppliers->PANNumber->Visible) { // PANNumber ?>
	<?php if ($store_suppliers->sortUrl($store_suppliers->PANNumber) == "") { ?>
		<th data-name="PANNumber" class="<?php echo $store_suppliers->PANNumber->headerCellClass() ?>"><div id="elh_store_suppliers_PANNumber" class="store_suppliers_PANNumber"><div class="ew-table-header-caption"><?php echo $store_suppliers->PANNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PANNumber" class="<?php echo $store_suppliers->PANNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_suppliers->SortUrl($store_suppliers->PANNumber) ?>',1);"><div id="elh_store_suppliers_PANNumber" class="store_suppliers_PANNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_suppliers->PANNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_suppliers->PANNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_suppliers->PANNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_suppliers->SalesRepMobileNo->Visible) { // SalesRepMobileNo ?>
	<?php if ($store_suppliers->sortUrl($store_suppliers->SalesRepMobileNo) == "") { ?>
		<th data-name="SalesRepMobileNo" class="<?php echo $store_suppliers->SalesRepMobileNo->headerCellClass() ?>"><div id="elh_store_suppliers_SalesRepMobileNo" class="store_suppliers_SalesRepMobileNo"><div class="ew-table-header-caption"><?php echo $store_suppliers->SalesRepMobileNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SalesRepMobileNo" class="<?php echo $store_suppliers->SalesRepMobileNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_suppliers->SortUrl($store_suppliers->SalesRepMobileNo) ?>',1);"><div id="elh_store_suppliers_SalesRepMobileNo" class="store_suppliers_SalesRepMobileNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_suppliers->SalesRepMobileNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_suppliers->SalesRepMobileNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_suppliers->SalesRepMobileNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_suppliers->GSTNumber->Visible) { // GSTNumber ?>
	<?php if ($store_suppliers->sortUrl($store_suppliers->GSTNumber) == "") { ?>
		<th data-name="GSTNumber" class="<?php echo $store_suppliers->GSTNumber->headerCellClass() ?>"><div id="elh_store_suppliers_GSTNumber" class="store_suppliers_GSTNumber"><div class="ew-table-header-caption"><?php echo $store_suppliers->GSTNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GSTNumber" class="<?php echo $store_suppliers->GSTNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_suppliers->SortUrl($store_suppliers->GSTNumber) ?>',1);"><div id="elh_store_suppliers_GSTNumber" class="store_suppliers_GSTNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_suppliers->GSTNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_suppliers->GSTNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_suppliers->GSTNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_suppliers->TANNumber->Visible) { // TANNumber ?>
	<?php if ($store_suppliers->sortUrl($store_suppliers->TANNumber) == "") { ?>
		<th data-name="TANNumber" class="<?php echo $store_suppliers->TANNumber->headerCellClass() ?>"><div id="elh_store_suppliers_TANNumber" class="store_suppliers_TANNumber"><div class="ew-table-header-caption"><?php echo $store_suppliers->TANNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TANNumber" class="<?php echo $store_suppliers->TANNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_suppliers->SortUrl($store_suppliers->TANNumber) ?>',1);"><div id="elh_store_suppliers_TANNumber" class="store_suppliers_TANNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_suppliers->TANNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_suppliers->TANNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_suppliers->TANNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_suppliers->id->Visible) { // id ?>
	<?php if ($store_suppliers->sortUrl($store_suppliers->id) == "") { ?>
		<th data-name="id" class="<?php echo $store_suppliers->id->headerCellClass() ?>"><div id="elh_store_suppliers_id" class="store_suppliers_id"><div class="ew-table-header-caption"><?php echo $store_suppliers->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $store_suppliers->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_suppliers->SortUrl($store_suppliers->id) ?>',1);"><div id="elh_store_suppliers_id" class="store_suppliers_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_suppliers->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_suppliers->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_suppliers->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_suppliers->HospID->Visible) { // HospID ?>
	<?php if ($store_suppliers->sortUrl($store_suppliers->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $store_suppliers->HospID->headerCellClass() ?>"><div id="elh_store_suppliers_HospID" class="store_suppliers_HospID"><div class="ew-table-header-caption"><?php echo $store_suppliers->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $store_suppliers->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_suppliers->SortUrl($store_suppliers->HospID) ?>',1);"><div id="elh_store_suppliers_HospID" class="store_suppliers_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_suppliers->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_suppliers->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_suppliers->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_suppliers->BranchID->Visible) { // BranchID ?>
	<?php if ($store_suppliers->sortUrl($store_suppliers->BranchID) == "") { ?>
		<th data-name="BranchID" class="<?php echo $store_suppliers->BranchID->headerCellClass() ?>"><div id="elh_store_suppliers_BranchID" class="store_suppliers_BranchID"><div class="ew-table-header-caption"><?php echo $store_suppliers->BranchID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BranchID" class="<?php echo $store_suppliers->BranchID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_suppliers->SortUrl($store_suppliers->BranchID) ?>',1);"><div id="elh_store_suppliers_BranchID" class="store_suppliers_BranchID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_suppliers->BranchID->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_suppliers->BranchID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_suppliers->BranchID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_suppliers->StoreID->Visible) { // StoreID ?>
	<?php if ($store_suppliers->sortUrl($store_suppliers->StoreID) == "") { ?>
		<th data-name="StoreID" class="<?php echo $store_suppliers->StoreID->headerCellClass() ?>"><div id="elh_store_suppliers_StoreID" class="store_suppliers_StoreID"><div class="ew-table-header-caption"><?php echo $store_suppliers->StoreID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StoreID" class="<?php echo $store_suppliers->StoreID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_suppliers->SortUrl($store_suppliers->StoreID) ?>',1);"><div id="elh_store_suppliers_StoreID" class="store_suppliers_StoreID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_suppliers->StoreID->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_suppliers->StoreID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_suppliers->StoreID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$store_suppliers_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($store_suppliers->ExportAll && $store_suppliers->isExport()) {
	$store_suppliers_list->StopRec = $store_suppliers_list->TotalRecs;
} else {

	// Set the last record to display
	if ($store_suppliers_list->TotalRecs > $store_suppliers_list->StartRec + $store_suppliers_list->DisplayRecs - 1)
		$store_suppliers_list->StopRec = $store_suppliers_list->StartRec + $store_suppliers_list->DisplayRecs - 1;
	else
		$store_suppliers_list->StopRec = $store_suppliers_list->TotalRecs;
}
$store_suppliers_list->RecCnt = $store_suppliers_list->StartRec - 1;
if ($store_suppliers_list->Recordset && !$store_suppliers_list->Recordset->EOF) {
	$store_suppliers_list->Recordset->moveFirst();
	$selectLimit = $store_suppliers_list->UseSelectLimit;
	if (!$selectLimit && $store_suppliers_list->StartRec > 1)
		$store_suppliers_list->Recordset->move($store_suppliers_list->StartRec - 1);
} elseif (!$store_suppliers->AllowAddDeleteRow && $store_suppliers_list->StopRec == 0) {
	$store_suppliers_list->StopRec = $store_suppliers->GridAddRowCount;
}

// Initialize aggregate
$store_suppliers->RowType = ROWTYPE_AGGREGATEINIT;
$store_suppliers->resetAttributes();
$store_suppliers_list->renderRow();
while ($store_suppliers_list->RecCnt < $store_suppliers_list->StopRec) {
	$store_suppliers_list->RecCnt++;
	if ($store_suppliers_list->RecCnt >= $store_suppliers_list->StartRec) {
		$store_suppliers_list->RowCnt++;

		// Set up key count
		$store_suppliers_list->KeyCount = $store_suppliers_list->RowIndex;

		// Init row class and style
		$store_suppliers->resetAttributes();
		$store_suppliers->CssClass = "";
		if ($store_suppliers->isGridAdd()) {
		} else {
			$store_suppliers_list->loadRowValues($store_suppliers_list->Recordset); // Load row values
		}
		$store_suppliers->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$store_suppliers->RowAttrs = array_merge($store_suppliers->RowAttrs, array('data-rowindex'=>$store_suppliers_list->RowCnt, 'id'=>'r' . $store_suppliers_list->RowCnt . '_store_suppliers', 'data-rowtype'=>$store_suppliers->RowType));

		// Render row
		$store_suppliers_list->renderRow();

		// Render list options
		$store_suppliers_list->renderListOptions();
?>
	<tr<?php echo $store_suppliers->rowAttributes() ?>>
<?php

// Render list options (body, left)
$store_suppliers_list->ListOptions->render("body", "left", $store_suppliers_list->RowCnt);
?>
	<?php if ($store_suppliers->Suppliercode->Visible) { // Suppliercode ?>
		<td data-name="Suppliercode"<?php echo $store_suppliers->Suppliercode->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_list->RowCnt ?>_store_suppliers_Suppliercode" class="store_suppliers_Suppliercode">
<span<?php echo $store_suppliers->Suppliercode->viewAttributes() ?>>
<?php echo $store_suppliers->Suppliercode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_suppliers->Suppliername->Visible) { // Suppliername ?>
		<td data-name="Suppliername"<?php echo $store_suppliers->Suppliername->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_list->RowCnt ?>_store_suppliers_Suppliername" class="store_suppliers_Suppliername">
<span<?php echo $store_suppliers->Suppliername->viewAttributes() ?>>
<?php echo $store_suppliers->Suppliername->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_suppliers->Abbreviation->Visible) { // Abbreviation ?>
		<td data-name="Abbreviation"<?php echo $store_suppliers->Abbreviation->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_list->RowCnt ?>_store_suppliers_Abbreviation" class="store_suppliers_Abbreviation">
<span<?php echo $store_suppliers->Abbreviation->viewAttributes() ?>>
<?php echo $store_suppliers->Abbreviation->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_suppliers->Creationdate->Visible) { // Creationdate ?>
		<td data-name="Creationdate"<?php echo $store_suppliers->Creationdate->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_list->RowCnt ?>_store_suppliers_Creationdate" class="store_suppliers_Creationdate">
<span<?php echo $store_suppliers->Creationdate->viewAttributes() ?>>
<?php echo $store_suppliers->Creationdate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_suppliers->Address1->Visible) { // Address1 ?>
		<td data-name="Address1"<?php echo $store_suppliers->Address1->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_list->RowCnt ?>_store_suppliers_Address1" class="store_suppliers_Address1">
<span<?php echo $store_suppliers->Address1->viewAttributes() ?>>
<?php echo $store_suppliers->Address1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_suppliers->Address2->Visible) { // Address2 ?>
		<td data-name="Address2"<?php echo $store_suppliers->Address2->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_list->RowCnt ?>_store_suppliers_Address2" class="store_suppliers_Address2">
<span<?php echo $store_suppliers->Address2->viewAttributes() ?>>
<?php echo $store_suppliers->Address2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_suppliers->Address3->Visible) { // Address3 ?>
		<td data-name="Address3"<?php echo $store_suppliers->Address3->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_list->RowCnt ?>_store_suppliers_Address3" class="store_suppliers_Address3">
<span<?php echo $store_suppliers->Address3->viewAttributes() ?>>
<?php echo $store_suppliers->Address3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_suppliers->Citycode->Visible) { // Citycode ?>
		<td data-name="Citycode"<?php echo $store_suppliers->Citycode->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_list->RowCnt ?>_store_suppliers_Citycode" class="store_suppliers_Citycode">
<span<?php echo $store_suppliers->Citycode->viewAttributes() ?>>
<?php echo $store_suppliers->Citycode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_suppliers->State->Visible) { // State ?>
		<td data-name="State"<?php echo $store_suppliers->State->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_list->RowCnt ?>_store_suppliers_State" class="store_suppliers_State">
<span<?php echo $store_suppliers->State->viewAttributes() ?>>
<?php echo $store_suppliers->State->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_suppliers->Pincode->Visible) { // Pincode ?>
		<td data-name="Pincode"<?php echo $store_suppliers->Pincode->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_list->RowCnt ?>_store_suppliers_Pincode" class="store_suppliers_Pincode">
<span<?php echo $store_suppliers->Pincode->viewAttributes() ?>>
<?php echo $store_suppliers->Pincode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_suppliers->Tngstnumber->Visible) { // Tngstnumber ?>
		<td data-name="Tngstnumber"<?php echo $store_suppliers->Tngstnumber->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_list->RowCnt ?>_store_suppliers_Tngstnumber" class="store_suppliers_Tngstnumber">
<span<?php echo $store_suppliers->Tngstnumber->viewAttributes() ?>>
<?php echo $store_suppliers->Tngstnumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_suppliers->Phone->Visible) { // Phone ?>
		<td data-name="Phone"<?php echo $store_suppliers->Phone->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_list->RowCnt ?>_store_suppliers_Phone" class="store_suppliers_Phone">
<span<?php echo $store_suppliers->Phone->viewAttributes() ?>>
<?php echo $store_suppliers->Phone->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_suppliers->Fax->Visible) { // Fax ?>
		<td data-name="Fax"<?php echo $store_suppliers->Fax->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_list->RowCnt ?>_store_suppliers_Fax" class="store_suppliers_Fax">
<span<?php echo $store_suppliers->Fax->viewAttributes() ?>>
<?php echo $store_suppliers->Fax->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_suppliers->_Email->Visible) { // Email ?>
		<td data-name="_Email"<?php echo $store_suppliers->_Email->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_list->RowCnt ?>_store_suppliers__Email" class="store_suppliers__Email">
<span<?php echo $store_suppliers->_Email->viewAttributes() ?>>
<?php echo $store_suppliers->_Email->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_suppliers->Paymentmode->Visible) { // Paymentmode ?>
		<td data-name="Paymentmode"<?php echo $store_suppliers->Paymentmode->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_list->RowCnt ?>_store_suppliers_Paymentmode" class="store_suppliers_Paymentmode">
<span<?php echo $store_suppliers->Paymentmode->viewAttributes() ?>>
<?php echo $store_suppliers->Paymentmode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_suppliers->Contactperson1->Visible) { // Contactperson1 ?>
		<td data-name="Contactperson1"<?php echo $store_suppliers->Contactperson1->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_list->RowCnt ?>_store_suppliers_Contactperson1" class="store_suppliers_Contactperson1">
<span<?php echo $store_suppliers->Contactperson1->viewAttributes() ?>>
<?php echo $store_suppliers->Contactperson1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_suppliers->CP1Address1->Visible) { // CP1Address1 ?>
		<td data-name="CP1Address1"<?php echo $store_suppliers->CP1Address1->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_list->RowCnt ?>_store_suppliers_CP1Address1" class="store_suppliers_CP1Address1">
<span<?php echo $store_suppliers->CP1Address1->viewAttributes() ?>>
<?php echo $store_suppliers->CP1Address1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_suppliers->CP1Address2->Visible) { // CP1Address2 ?>
		<td data-name="CP1Address2"<?php echo $store_suppliers->CP1Address2->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_list->RowCnt ?>_store_suppliers_CP1Address2" class="store_suppliers_CP1Address2">
<span<?php echo $store_suppliers->CP1Address2->viewAttributes() ?>>
<?php echo $store_suppliers->CP1Address2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_suppliers->CP1Address3->Visible) { // CP1Address3 ?>
		<td data-name="CP1Address3"<?php echo $store_suppliers->CP1Address3->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_list->RowCnt ?>_store_suppliers_CP1Address3" class="store_suppliers_CP1Address3">
<span<?php echo $store_suppliers->CP1Address3->viewAttributes() ?>>
<?php echo $store_suppliers->CP1Address3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_suppliers->CP1Citycode->Visible) { // CP1Citycode ?>
		<td data-name="CP1Citycode"<?php echo $store_suppliers->CP1Citycode->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_list->RowCnt ?>_store_suppliers_CP1Citycode" class="store_suppliers_CP1Citycode">
<span<?php echo $store_suppliers->CP1Citycode->viewAttributes() ?>>
<?php echo $store_suppliers->CP1Citycode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_suppliers->CP1State->Visible) { // CP1State ?>
		<td data-name="CP1State"<?php echo $store_suppliers->CP1State->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_list->RowCnt ?>_store_suppliers_CP1State" class="store_suppliers_CP1State">
<span<?php echo $store_suppliers->CP1State->viewAttributes() ?>>
<?php echo $store_suppliers->CP1State->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_suppliers->CP1Pincode->Visible) { // CP1Pincode ?>
		<td data-name="CP1Pincode"<?php echo $store_suppliers->CP1Pincode->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_list->RowCnt ?>_store_suppliers_CP1Pincode" class="store_suppliers_CP1Pincode">
<span<?php echo $store_suppliers->CP1Pincode->viewAttributes() ?>>
<?php echo $store_suppliers->CP1Pincode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_suppliers->CP1Designation->Visible) { // CP1Designation ?>
		<td data-name="CP1Designation"<?php echo $store_suppliers->CP1Designation->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_list->RowCnt ?>_store_suppliers_CP1Designation" class="store_suppliers_CP1Designation">
<span<?php echo $store_suppliers->CP1Designation->viewAttributes() ?>>
<?php echo $store_suppliers->CP1Designation->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_suppliers->CP1Phone->Visible) { // CP1Phone ?>
		<td data-name="CP1Phone"<?php echo $store_suppliers->CP1Phone->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_list->RowCnt ?>_store_suppliers_CP1Phone" class="store_suppliers_CP1Phone">
<span<?php echo $store_suppliers->CP1Phone->viewAttributes() ?>>
<?php echo $store_suppliers->CP1Phone->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_suppliers->CP1MobileNo->Visible) { // CP1MobileNo ?>
		<td data-name="CP1MobileNo"<?php echo $store_suppliers->CP1MobileNo->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_list->RowCnt ?>_store_suppliers_CP1MobileNo" class="store_suppliers_CP1MobileNo">
<span<?php echo $store_suppliers->CP1MobileNo->viewAttributes() ?>>
<?php echo $store_suppliers->CP1MobileNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_suppliers->CP1Fax->Visible) { // CP1Fax ?>
		<td data-name="CP1Fax"<?php echo $store_suppliers->CP1Fax->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_list->RowCnt ?>_store_suppliers_CP1Fax" class="store_suppliers_CP1Fax">
<span<?php echo $store_suppliers->CP1Fax->viewAttributes() ?>>
<?php echo $store_suppliers->CP1Fax->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_suppliers->CP1Email->Visible) { // CP1Email ?>
		<td data-name="CP1Email"<?php echo $store_suppliers->CP1Email->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_list->RowCnt ?>_store_suppliers_CP1Email" class="store_suppliers_CP1Email">
<span<?php echo $store_suppliers->CP1Email->viewAttributes() ?>>
<?php echo $store_suppliers->CP1Email->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_suppliers->Contactperson2->Visible) { // Contactperson2 ?>
		<td data-name="Contactperson2"<?php echo $store_suppliers->Contactperson2->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_list->RowCnt ?>_store_suppliers_Contactperson2" class="store_suppliers_Contactperson2">
<span<?php echo $store_suppliers->Contactperson2->viewAttributes() ?>>
<?php echo $store_suppliers->Contactperson2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_suppliers->CP2Address1->Visible) { // CP2Address1 ?>
		<td data-name="CP2Address1"<?php echo $store_suppliers->CP2Address1->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_list->RowCnt ?>_store_suppliers_CP2Address1" class="store_suppliers_CP2Address1">
<span<?php echo $store_suppliers->CP2Address1->viewAttributes() ?>>
<?php echo $store_suppliers->CP2Address1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_suppliers->CP2Address2->Visible) { // CP2Address2 ?>
		<td data-name="CP2Address2"<?php echo $store_suppliers->CP2Address2->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_list->RowCnt ?>_store_suppliers_CP2Address2" class="store_suppliers_CP2Address2">
<span<?php echo $store_suppliers->CP2Address2->viewAttributes() ?>>
<?php echo $store_suppliers->CP2Address2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_suppliers->CP2Address3->Visible) { // CP2Address3 ?>
		<td data-name="CP2Address3"<?php echo $store_suppliers->CP2Address3->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_list->RowCnt ?>_store_suppliers_CP2Address3" class="store_suppliers_CP2Address3">
<span<?php echo $store_suppliers->CP2Address3->viewAttributes() ?>>
<?php echo $store_suppliers->CP2Address3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_suppliers->CP2Citycode->Visible) { // CP2Citycode ?>
		<td data-name="CP2Citycode"<?php echo $store_suppliers->CP2Citycode->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_list->RowCnt ?>_store_suppliers_CP2Citycode" class="store_suppliers_CP2Citycode">
<span<?php echo $store_suppliers->CP2Citycode->viewAttributes() ?>>
<?php echo $store_suppliers->CP2Citycode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_suppliers->CP2State->Visible) { // CP2State ?>
		<td data-name="CP2State"<?php echo $store_suppliers->CP2State->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_list->RowCnt ?>_store_suppliers_CP2State" class="store_suppliers_CP2State">
<span<?php echo $store_suppliers->CP2State->viewAttributes() ?>>
<?php echo $store_suppliers->CP2State->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_suppliers->CP2Pincode->Visible) { // CP2Pincode ?>
		<td data-name="CP2Pincode"<?php echo $store_suppliers->CP2Pincode->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_list->RowCnt ?>_store_suppliers_CP2Pincode" class="store_suppliers_CP2Pincode">
<span<?php echo $store_suppliers->CP2Pincode->viewAttributes() ?>>
<?php echo $store_suppliers->CP2Pincode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_suppliers->CP2Designation->Visible) { // CP2Designation ?>
		<td data-name="CP2Designation"<?php echo $store_suppliers->CP2Designation->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_list->RowCnt ?>_store_suppliers_CP2Designation" class="store_suppliers_CP2Designation">
<span<?php echo $store_suppliers->CP2Designation->viewAttributes() ?>>
<?php echo $store_suppliers->CP2Designation->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_suppliers->CP2Phone->Visible) { // CP2Phone ?>
		<td data-name="CP2Phone"<?php echo $store_suppliers->CP2Phone->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_list->RowCnt ?>_store_suppliers_CP2Phone" class="store_suppliers_CP2Phone">
<span<?php echo $store_suppliers->CP2Phone->viewAttributes() ?>>
<?php echo $store_suppliers->CP2Phone->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_suppliers->CP2MobileNo->Visible) { // CP2MobileNo ?>
		<td data-name="CP2MobileNo"<?php echo $store_suppliers->CP2MobileNo->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_list->RowCnt ?>_store_suppliers_CP2MobileNo" class="store_suppliers_CP2MobileNo">
<span<?php echo $store_suppliers->CP2MobileNo->viewAttributes() ?>>
<?php echo $store_suppliers->CP2MobileNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_suppliers->CP2Fax->Visible) { // CP2Fax ?>
		<td data-name="CP2Fax"<?php echo $store_suppliers->CP2Fax->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_list->RowCnt ?>_store_suppliers_CP2Fax" class="store_suppliers_CP2Fax">
<span<?php echo $store_suppliers->CP2Fax->viewAttributes() ?>>
<?php echo $store_suppliers->CP2Fax->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_suppliers->CP2Email->Visible) { // CP2Email ?>
		<td data-name="CP2Email"<?php echo $store_suppliers->CP2Email->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_list->RowCnt ?>_store_suppliers_CP2Email" class="store_suppliers_CP2Email">
<span<?php echo $store_suppliers->CP2Email->viewAttributes() ?>>
<?php echo $store_suppliers->CP2Email->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_suppliers->Type->Visible) { // Type ?>
		<td data-name="Type"<?php echo $store_suppliers->Type->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_list->RowCnt ?>_store_suppliers_Type" class="store_suppliers_Type">
<span<?php echo $store_suppliers->Type->viewAttributes() ?>>
<?php echo $store_suppliers->Type->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_suppliers->Creditterms->Visible) { // Creditterms ?>
		<td data-name="Creditterms"<?php echo $store_suppliers->Creditterms->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_list->RowCnt ?>_store_suppliers_Creditterms" class="store_suppliers_Creditterms">
<span<?php echo $store_suppliers->Creditterms->viewAttributes() ?>>
<?php echo $store_suppliers->Creditterms->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_suppliers->Remarks->Visible) { // Remarks ?>
		<td data-name="Remarks"<?php echo $store_suppliers->Remarks->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_list->RowCnt ?>_store_suppliers_Remarks" class="store_suppliers_Remarks">
<span<?php echo $store_suppliers->Remarks->viewAttributes() ?>>
<?php echo $store_suppliers->Remarks->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_suppliers->Tinnumber->Visible) { // Tinnumber ?>
		<td data-name="Tinnumber"<?php echo $store_suppliers->Tinnumber->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_list->RowCnt ?>_store_suppliers_Tinnumber" class="store_suppliers_Tinnumber">
<span<?php echo $store_suppliers->Tinnumber->viewAttributes() ?>>
<?php echo $store_suppliers->Tinnumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_suppliers->Universalsuppliercode->Visible) { // Universalsuppliercode ?>
		<td data-name="Universalsuppliercode"<?php echo $store_suppliers->Universalsuppliercode->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_list->RowCnt ?>_store_suppliers_Universalsuppliercode" class="store_suppliers_Universalsuppliercode">
<span<?php echo $store_suppliers->Universalsuppliercode->viewAttributes() ?>>
<?php echo $store_suppliers->Universalsuppliercode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_suppliers->Mobilenumber->Visible) { // Mobilenumber ?>
		<td data-name="Mobilenumber"<?php echo $store_suppliers->Mobilenumber->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_list->RowCnt ?>_store_suppliers_Mobilenumber" class="store_suppliers_Mobilenumber">
<span<?php echo $store_suppliers->Mobilenumber->viewAttributes() ?>>
<?php echo $store_suppliers->Mobilenumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_suppliers->PANNumber->Visible) { // PANNumber ?>
		<td data-name="PANNumber"<?php echo $store_suppliers->PANNumber->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_list->RowCnt ?>_store_suppliers_PANNumber" class="store_suppliers_PANNumber">
<span<?php echo $store_suppliers->PANNumber->viewAttributes() ?>>
<?php echo $store_suppliers->PANNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_suppliers->SalesRepMobileNo->Visible) { // SalesRepMobileNo ?>
		<td data-name="SalesRepMobileNo"<?php echo $store_suppliers->SalesRepMobileNo->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_list->RowCnt ?>_store_suppliers_SalesRepMobileNo" class="store_suppliers_SalesRepMobileNo">
<span<?php echo $store_suppliers->SalesRepMobileNo->viewAttributes() ?>>
<?php echo $store_suppliers->SalesRepMobileNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_suppliers->GSTNumber->Visible) { // GSTNumber ?>
		<td data-name="GSTNumber"<?php echo $store_suppliers->GSTNumber->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_list->RowCnt ?>_store_suppliers_GSTNumber" class="store_suppliers_GSTNumber">
<span<?php echo $store_suppliers->GSTNumber->viewAttributes() ?>>
<?php echo $store_suppliers->GSTNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_suppliers->TANNumber->Visible) { // TANNumber ?>
		<td data-name="TANNumber"<?php echo $store_suppliers->TANNumber->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_list->RowCnt ?>_store_suppliers_TANNumber" class="store_suppliers_TANNumber">
<span<?php echo $store_suppliers->TANNumber->viewAttributes() ?>>
<?php echo $store_suppliers->TANNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_suppliers->id->Visible) { // id ?>
		<td data-name="id"<?php echo $store_suppliers->id->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_list->RowCnt ?>_store_suppliers_id" class="store_suppliers_id">
<span<?php echo $store_suppliers->id->viewAttributes() ?>>
<?php echo $store_suppliers->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_suppliers->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $store_suppliers->HospID->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_list->RowCnt ?>_store_suppliers_HospID" class="store_suppliers_HospID">
<span<?php echo $store_suppliers->HospID->viewAttributes() ?>>
<?php echo $store_suppliers->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_suppliers->BranchID->Visible) { // BranchID ?>
		<td data-name="BranchID"<?php echo $store_suppliers->BranchID->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_list->RowCnt ?>_store_suppliers_BranchID" class="store_suppliers_BranchID">
<span<?php echo $store_suppliers->BranchID->viewAttributes() ?>>
<?php echo $store_suppliers->BranchID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_suppliers->StoreID->Visible) { // StoreID ?>
		<td data-name="StoreID"<?php echo $store_suppliers->StoreID->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_list->RowCnt ?>_store_suppliers_StoreID" class="store_suppliers_StoreID">
<span<?php echo $store_suppliers->StoreID->viewAttributes() ?>>
<?php echo $store_suppliers->StoreID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$store_suppliers_list->ListOptions->render("body", "right", $store_suppliers_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$store_suppliers->isGridAdd())
		$store_suppliers_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$store_suppliers->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($store_suppliers_list->Recordset)
	$store_suppliers_list->Recordset->Close();
?>
<?php if (!$store_suppliers->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$store_suppliers->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($store_suppliers_list->Pager)) $store_suppliers_list->Pager = new NumericPager($store_suppliers_list->StartRec, $store_suppliers_list->DisplayRecs, $store_suppliers_list->TotalRecs, $store_suppliers_list->RecRange, $store_suppliers_list->AutoHidePager) ?>
<?php if ($store_suppliers_list->Pager->RecordCount > 0 && $store_suppliers_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($store_suppliers_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $store_suppliers_list->pageUrl() ?>start=<?php echo $store_suppliers_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($store_suppliers_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $store_suppliers_list->pageUrl() ?>start=<?php echo $store_suppliers_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($store_suppliers_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $store_suppliers_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($store_suppliers_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $store_suppliers_list->pageUrl() ?>start=<?php echo $store_suppliers_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($store_suppliers_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $store_suppliers_list->pageUrl() ?>start=<?php echo $store_suppliers_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($store_suppliers_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $store_suppliers_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $store_suppliers_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $store_suppliers_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($store_suppliers_list->TotalRecs > 0 && (!$store_suppliers_list->AutoHidePageSizeSelector || $store_suppliers_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="store_suppliers">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($store_suppliers_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($store_suppliers_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($store_suppliers_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($store_suppliers_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($store_suppliers_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($store_suppliers_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($store_suppliers->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $store_suppliers_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($store_suppliers_list->TotalRecs == 0 && !$store_suppliers->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $store_suppliers_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$store_suppliers_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$store_suppliers->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$store_suppliers->isExport()) { ?>
<script>
ew.scrollableTable("gmp_store_suppliers", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$store_suppliers_list->terminate();
?>