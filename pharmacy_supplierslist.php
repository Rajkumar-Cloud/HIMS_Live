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
<?php include_once "header.php" ?>
<?php if (!$pharmacy_suppliers->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fpharmacy_supplierslist = currentForm = new ew.Form("fpharmacy_supplierslist", "list");
fpharmacy_supplierslist.formKeyCountName = '<?php echo $pharmacy_suppliers_list->FormKeyCountName ?>';

// Form_CustomValidate event
fpharmacy_supplierslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_supplierslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fpharmacy_supplierslistsrch = currentSearchForm = new ew.Form("fpharmacy_supplierslistsrch");

// Filters
fpharmacy_supplierslistsrch.filterList = <?php echo $pharmacy_suppliers_list->getFilterList() ?>;
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
<?php if (!$pharmacy_suppliers->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($pharmacy_suppliers_list->TotalRecs > 0 && $pharmacy_suppliers_list->ExportOptions->visible()) { ?>
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
<?php if (!$pharmacy_suppliers->isExport() && !$pharmacy_suppliers->CurrentAction) { ?>
<form name="fpharmacy_supplierslistsrch" id="fpharmacy_supplierslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($pharmacy_suppliers_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fpharmacy_supplierslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pharmacy_suppliers">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($pharmacy_suppliers_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($pharmacy_suppliers_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $pharmacy_suppliers_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($pharmacy_suppliers_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_suppliers_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_suppliers_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_suppliers_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $pharmacy_suppliers_list->showPageHeader(); ?>
<?php
$pharmacy_suppliers_list->showMessage();
?>
<?php if ($pharmacy_suppliers_list->TotalRecs > 0 || $pharmacy_suppliers->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pharmacy_suppliers_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pharmacy_suppliers">
<?php if (!$pharmacy_suppliers->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$pharmacy_suppliers->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($pharmacy_suppliers_list->Pager)) $pharmacy_suppliers_list->Pager = new NumericPager($pharmacy_suppliers_list->StartRec, $pharmacy_suppliers_list->DisplayRecs, $pharmacy_suppliers_list->TotalRecs, $pharmacy_suppliers_list->RecRange, $pharmacy_suppliers_list->AutoHidePager) ?>
<?php if ($pharmacy_suppliers_list->Pager->RecordCount > 0 && $pharmacy_suppliers_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($pharmacy_suppliers_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_suppliers_list->pageUrl() ?>start=<?php echo $pharmacy_suppliers_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_suppliers_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_suppliers_list->pageUrl() ?>start=<?php echo $pharmacy_suppliers_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($pharmacy_suppliers_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $pharmacy_suppliers_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_suppliers_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_suppliers_list->pageUrl() ?>start=<?php echo $pharmacy_suppliers_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_suppliers_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_suppliers_list->pageUrl() ?>start=<?php echo $pharmacy_suppliers_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($pharmacy_suppliers_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $pharmacy_suppliers_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $pharmacy_suppliers_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $pharmacy_suppliers_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($pharmacy_suppliers_list->TotalRecs > 0 && (!$pharmacy_suppliers_list->AutoHidePageSizeSelector || $pharmacy_suppliers_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="pharmacy_suppliers">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($pharmacy_suppliers_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($pharmacy_suppliers_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($pharmacy_suppliers_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($pharmacy_suppliers_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($pharmacy_suppliers_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($pharmacy_suppliers_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($pharmacy_suppliers->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_suppliers_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpharmacy_supplierslist" id="fpharmacy_supplierslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_suppliers_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_suppliers_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_suppliers">
<div id="gmp_pharmacy_suppliers" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($pharmacy_suppliers_list->TotalRecs > 0 || $pharmacy_suppliers->isGridEdit()) { ?>
<table id="tbl_pharmacy_supplierslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pharmacy_suppliers_list->RowType = ROWTYPE_HEADER;

// Render list options
$pharmacy_suppliers_list->renderListOptions();

// Render list options (header, left)
$pharmacy_suppliers_list->ListOptions->render("header", "left");
?>
<?php if ($pharmacy_suppliers->Suppliercode->Visible) { // Suppliercode ?>
	<?php if ($pharmacy_suppliers->sortUrl($pharmacy_suppliers->Suppliercode) == "") { ?>
		<th data-name="Suppliercode" class="<?php echo $pharmacy_suppliers->Suppliercode->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_Suppliercode" class="pharmacy_suppliers_Suppliercode"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers->Suppliercode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Suppliercode" class="<?php echo $pharmacy_suppliers->Suppliercode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_suppliers->SortUrl($pharmacy_suppliers->Suppliercode) ?>',1);"><div id="elh_pharmacy_suppliers_Suppliercode" class="pharmacy_suppliers_Suppliercode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers->Suppliercode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers->Suppliercode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_suppliers->Suppliercode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers->Suppliername->Visible) { // Suppliername ?>
	<?php if ($pharmacy_suppliers->sortUrl($pharmacy_suppliers->Suppliername) == "") { ?>
		<th data-name="Suppliername" class="<?php echo $pharmacy_suppliers->Suppliername->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_Suppliername" class="pharmacy_suppliers_Suppliername"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers->Suppliername->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Suppliername" class="<?php echo $pharmacy_suppliers->Suppliername->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_suppliers->SortUrl($pharmacy_suppliers->Suppliername) ?>',1);"><div id="elh_pharmacy_suppliers_Suppliername" class="pharmacy_suppliers_Suppliername">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers->Suppliername->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers->Suppliername->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_suppliers->Suppliername->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers->Abbreviation->Visible) { // Abbreviation ?>
	<?php if ($pharmacy_suppliers->sortUrl($pharmacy_suppliers->Abbreviation) == "") { ?>
		<th data-name="Abbreviation" class="<?php echo $pharmacy_suppliers->Abbreviation->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_Abbreviation" class="pharmacy_suppliers_Abbreviation"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers->Abbreviation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Abbreviation" class="<?php echo $pharmacy_suppliers->Abbreviation->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_suppliers->SortUrl($pharmacy_suppliers->Abbreviation) ?>',1);"><div id="elh_pharmacy_suppliers_Abbreviation" class="pharmacy_suppliers_Abbreviation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers->Abbreviation->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers->Abbreviation->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_suppliers->Abbreviation->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers->Creationdate->Visible) { // Creationdate ?>
	<?php if ($pharmacy_suppliers->sortUrl($pharmacy_suppliers->Creationdate) == "") { ?>
		<th data-name="Creationdate" class="<?php echo $pharmacy_suppliers->Creationdate->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_Creationdate" class="pharmacy_suppliers_Creationdate"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers->Creationdate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Creationdate" class="<?php echo $pharmacy_suppliers->Creationdate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_suppliers->SortUrl($pharmacy_suppliers->Creationdate) ?>',1);"><div id="elh_pharmacy_suppliers_Creationdate" class="pharmacy_suppliers_Creationdate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers->Creationdate->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers->Creationdate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_suppliers->Creationdate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers->Address1->Visible) { // Address1 ?>
	<?php if ($pharmacy_suppliers->sortUrl($pharmacy_suppliers->Address1) == "") { ?>
		<th data-name="Address1" class="<?php echo $pharmacy_suppliers->Address1->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_Address1" class="pharmacy_suppliers_Address1"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers->Address1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Address1" class="<?php echo $pharmacy_suppliers->Address1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_suppliers->SortUrl($pharmacy_suppliers->Address1) ?>',1);"><div id="elh_pharmacy_suppliers_Address1" class="pharmacy_suppliers_Address1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers->Address1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers->Address1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_suppliers->Address1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers->Address2->Visible) { // Address2 ?>
	<?php if ($pharmacy_suppliers->sortUrl($pharmacy_suppliers->Address2) == "") { ?>
		<th data-name="Address2" class="<?php echo $pharmacy_suppliers->Address2->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_Address2" class="pharmacy_suppliers_Address2"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers->Address2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Address2" class="<?php echo $pharmacy_suppliers->Address2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_suppliers->SortUrl($pharmacy_suppliers->Address2) ?>',1);"><div id="elh_pharmacy_suppliers_Address2" class="pharmacy_suppliers_Address2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers->Address2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers->Address2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_suppliers->Address2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers->Address3->Visible) { // Address3 ?>
	<?php if ($pharmacy_suppliers->sortUrl($pharmacy_suppliers->Address3) == "") { ?>
		<th data-name="Address3" class="<?php echo $pharmacy_suppliers->Address3->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_Address3" class="pharmacy_suppliers_Address3"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers->Address3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Address3" class="<?php echo $pharmacy_suppliers->Address3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_suppliers->SortUrl($pharmacy_suppliers->Address3) ?>',1);"><div id="elh_pharmacy_suppliers_Address3" class="pharmacy_suppliers_Address3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers->Address3->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers->Address3->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_suppliers->Address3->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers->Citycode->Visible) { // Citycode ?>
	<?php if ($pharmacy_suppliers->sortUrl($pharmacy_suppliers->Citycode) == "") { ?>
		<th data-name="Citycode" class="<?php echo $pharmacy_suppliers->Citycode->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_Citycode" class="pharmacy_suppliers_Citycode"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers->Citycode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Citycode" class="<?php echo $pharmacy_suppliers->Citycode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_suppliers->SortUrl($pharmacy_suppliers->Citycode) ?>',1);"><div id="elh_pharmacy_suppliers_Citycode" class="pharmacy_suppliers_Citycode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers->Citycode->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers->Citycode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_suppliers->Citycode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers->State->Visible) { // State ?>
	<?php if ($pharmacy_suppliers->sortUrl($pharmacy_suppliers->State) == "") { ?>
		<th data-name="State" class="<?php echo $pharmacy_suppliers->State->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_State" class="pharmacy_suppliers_State"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers->State->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="State" class="<?php echo $pharmacy_suppliers->State->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_suppliers->SortUrl($pharmacy_suppliers->State) ?>',1);"><div id="elh_pharmacy_suppliers_State" class="pharmacy_suppliers_State">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers->State->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers->State->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_suppliers->State->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers->Pincode->Visible) { // Pincode ?>
	<?php if ($pharmacy_suppliers->sortUrl($pharmacy_suppliers->Pincode) == "") { ?>
		<th data-name="Pincode" class="<?php echo $pharmacy_suppliers->Pincode->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_Pincode" class="pharmacy_suppliers_Pincode"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers->Pincode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pincode" class="<?php echo $pharmacy_suppliers->Pincode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_suppliers->SortUrl($pharmacy_suppliers->Pincode) ?>',1);"><div id="elh_pharmacy_suppliers_Pincode" class="pharmacy_suppliers_Pincode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers->Pincode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers->Pincode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_suppliers->Pincode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers->Tngstnumber->Visible) { // Tngstnumber ?>
	<?php if ($pharmacy_suppliers->sortUrl($pharmacy_suppliers->Tngstnumber) == "") { ?>
		<th data-name="Tngstnumber" class="<?php echo $pharmacy_suppliers->Tngstnumber->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_Tngstnumber" class="pharmacy_suppliers_Tngstnumber"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers->Tngstnumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tngstnumber" class="<?php echo $pharmacy_suppliers->Tngstnumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_suppliers->SortUrl($pharmacy_suppliers->Tngstnumber) ?>',1);"><div id="elh_pharmacy_suppliers_Tngstnumber" class="pharmacy_suppliers_Tngstnumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers->Tngstnumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers->Tngstnumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_suppliers->Tngstnumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers->Phone->Visible) { // Phone ?>
	<?php if ($pharmacy_suppliers->sortUrl($pharmacy_suppliers->Phone) == "") { ?>
		<th data-name="Phone" class="<?php echo $pharmacy_suppliers->Phone->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_Phone" class="pharmacy_suppliers_Phone"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers->Phone->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Phone" class="<?php echo $pharmacy_suppliers->Phone->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_suppliers->SortUrl($pharmacy_suppliers->Phone) ?>',1);"><div id="elh_pharmacy_suppliers_Phone" class="pharmacy_suppliers_Phone">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers->Phone->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers->Phone->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_suppliers->Phone->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers->Fax->Visible) { // Fax ?>
	<?php if ($pharmacy_suppliers->sortUrl($pharmacy_suppliers->Fax) == "") { ?>
		<th data-name="Fax" class="<?php echo $pharmacy_suppliers->Fax->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_Fax" class="pharmacy_suppliers_Fax"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers->Fax->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Fax" class="<?php echo $pharmacy_suppliers->Fax->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_suppliers->SortUrl($pharmacy_suppliers->Fax) ?>',1);"><div id="elh_pharmacy_suppliers_Fax" class="pharmacy_suppliers_Fax">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers->Fax->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers->Fax->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_suppliers->Fax->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers->_Email->Visible) { // Email ?>
	<?php if ($pharmacy_suppliers->sortUrl($pharmacy_suppliers->_Email) == "") { ?>
		<th data-name="_Email" class="<?php echo $pharmacy_suppliers->_Email->headerCellClass() ?>"><div id="elh_pharmacy_suppliers__Email" class="pharmacy_suppliers__Email"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers->_Email->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_Email" class="<?php echo $pharmacy_suppliers->_Email->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_suppliers->SortUrl($pharmacy_suppliers->_Email) ?>',1);"><div id="elh_pharmacy_suppliers__Email" class="pharmacy_suppliers__Email">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers->_Email->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers->_Email->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_suppliers->_Email->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers->Paymentmode->Visible) { // Paymentmode ?>
	<?php if ($pharmacy_suppliers->sortUrl($pharmacy_suppliers->Paymentmode) == "") { ?>
		<th data-name="Paymentmode" class="<?php echo $pharmacy_suppliers->Paymentmode->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_Paymentmode" class="pharmacy_suppliers_Paymentmode"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers->Paymentmode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Paymentmode" class="<?php echo $pharmacy_suppliers->Paymentmode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_suppliers->SortUrl($pharmacy_suppliers->Paymentmode) ?>',1);"><div id="elh_pharmacy_suppliers_Paymentmode" class="pharmacy_suppliers_Paymentmode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers->Paymentmode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers->Paymentmode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_suppliers->Paymentmode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers->Contactperson1->Visible) { // Contactperson1 ?>
	<?php if ($pharmacy_suppliers->sortUrl($pharmacy_suppliers->Contactperson1) == "") { ?>
		<th data-name="Contactperson1" class="<?php echo $pharmacy_suppliers->Contactperson1->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_Contactperson1" class="pharmacy_suppliers_Contactperson1"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers->Contactperson1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Contactperson1" class="<?php echo $pharmacy_suppliers->Contactperson1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_suppliers->SortUrl($pharmacy_suppliers->Contactperson1) ?>',1);"><div id="elh_pharmacy_suppliers_Contactperson1" class="pharmacy_suppliers_Contactperson1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers->Contactperson1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers->Contactperson1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_suppliers->Contactperson1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers->CP1Address1->Visible) { // CP1Address1 ?>
	<?php if ($pharmacy_suppliers->sortUrl($pharmacy_suppliers->CP1Address1) == "") { ?>
		<th data-name="CP1Address1" class="<?php echo $pharmacy_suppliers->CP1Address1->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_CP1Address1" class="pharmacy_suppliers_CP1Address1"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers->CP1Address1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CP1Address1" class="<?php echo $pharmacy_suppliers->CP1Address1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_suppliers->SortUrl($pharmacy_suppliers->CP1Address1) ?>',1);"><div id="elh_pharmacy_suppliers_CP1Address1" class="pharmacy_suppliers_CP1Address1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers->CP1Address1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers->CP1Address1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_suppliers->CP1Address1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers->CP1Address2->Visible) { // CP1Address2 ?>
	<?php if ($pharmacy_suppliers->sortUrl($pharmacy_suppliers->CP1Address2) == "") { ?>
		<th data-name="CP1Address2" class="<?php echo $pharmacy_suppliers->CP1Address2->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_CP1Address2" class="pharmacy_suppliers_CP1Address2"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers->CP1Address2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CP1Address2" class="<?php echo $pharmacy_suppliers->CP1Address2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_suppliers->SortUrl($pharmacy_suppliers->CP1Address2) ?>',1);"><div id="elh_pharmacy_suppliers_CP1Address2" class="pharmacy_suppliers_CP1Address2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers->CP1Address2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers->CP1Address2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_suppliers->CP1Address2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers->CP1Address3->Visible) { // CP1Address3 ?>
	<?php if ($pharmacy_suppliers->sortUrl($pharmacy_suppliers->CP1Address3) == "") { ?>
		<th data-name="CP1Address3" class="<?php echo $pharmacy_suppliers->CP1Address3->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_CP1Address3" class="pharmacy_suppliers_CP1Address3"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers->CP1Address3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CP1Address3" class="<?php echo $pharmacy_suppliers->CP1Address3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_suppliers->SortUrl($pharmacy_suppliers->CP1Address3) ?>',1);"><div id="elh_pharmacy_suppliers_CP1Address3" class="pharmacy_suppliers_CP1Address3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers->CP1Address3->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers->CP1Address3->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_suppliers->CP1Address3->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers->CP1Citycode->Visible) { // CP1Citycode ?>
	<?php if ($pharmacy_suppliers->sortUrl($pharmacy_suppliers->CP1Citycode) == "") { ?>
		<th data-name="CP1Citycode" class="<?php echo $pharmacy_suppliers->CP1Citycode->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_CP1Citycode" class="pharmacy_suppliers_CP1Citycode"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers->CP1Citycode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CP1Citycode" class="<?php echo $pharmacy_suppliers->CP1Citycode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_suppliers->SortUrl($pharmacy_suppliers->CP1Citycode) ?>',1);"><div id="elh_pharmacy_suppliers_CP1Citycode" class="pharmacy_suppliers_CP1Citycode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers->CP1Citycode->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers->CP1Citycode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_suppliers->CP1Citycode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers->CP1State->Visible) { // CP1State ?>
	<?php if ($pharmacy_suppliers->sortUrl($pharmacy_suppliers->CP1State) == "") { ?>
		<th data-name="CP1State" class="<?php echo $pharmacy_suppliers->CP1State->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_CP1State" class="pharmacy_suppliers_CP1State"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers->CP1State->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CP1State" class="<?php echo $pharmacy_suppliers->CP1State->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_suppliers->SortUrl($pharmacy_suppliers->CP1State) ?>',1);"><div id="elh_pharmacy_suppliers_CP1State" class="pharmacy_suppliers_CP1State">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers->CP1State->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers->CP1State->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_suppliers->CP1State->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers->CP1Pincode->Visible) { // CP1Pincode ?>
	<?php if ($pharmacy_suppliers->sortUrl($pharmacy_suppliers->CP1Pincode) == "") { ?>
		<th data-name="CP1Pincode" class="<?php echo $pharmacy_suppliers->CP1Pincode->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_CP1Pincode" class="pharmacy_suppliers_CP1Pincode"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers->CP1Pincode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CP1Pincode" class="<?php echo $pharmacy_suppliers->CP1Pincode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_suppliers->SortUrl($pharmacy_suppliers->CP1Pincode) ?>',1);"><div id="elh_pharmacy_suppliers_CP1Pincode" class="pharmacy_suppliers_CP1Pincode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers->CP1Pincode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers->CP1Pincode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_suppliers->CP1Pincode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers->CP1Designation->Visible) { // CP1Designation ?>
	<?php if ($pharmacy_suppliers->sortUrl($pharmacy_suppliers->CP1Designation) == "") { ?>
		<th data-name="CP1Designation" class="<?php echo $pharmacy_suppliers->CP1Designation->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_CP1Designation" class="pharmacy_suppliers_CP1Designation"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers->CP1Designation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CP1Designation" class="<?php echo $pharmacy_suppliers->CP1Designation->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_suppliers->SortUrl($pharmacy_suppliers->CP1Designation) ?>',1);"><div id="elh_pharmacy_suppliers_CP1Designation" class="pharmacy_suppliers_CP1Designation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers->CP1Designation->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers->CP1Designation->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_suppliers->CP1Designation->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers->CP1Phone->Visible) { // CP1Phone ?>
	<?php if ($pharmacy_suppliers->sortUrl($pharmacy_suppliers->CP1Phone) == "") { ?>
		<th data-name="CP1Phone" class="<?php echo $pharmacy_suppliers->CP1Phone->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_CP1Phone" class="pharmacy_suppliers_CP1Phone"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers->CP1Phone->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CP1Phone" class="<?php echo $pharmacy_suppliers->CP1Phone->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_suppliers->SortUrl($pharmacy_suppliers->CP1Phone) ?>',1);"><div id="elh_pharmacy_suppliers_CP1Phone" class="pharmacy_suppliers_CP1Phone">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers->CP1Phone->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers->CP1Phone->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_suppliers->CP1Phone->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers->CP1MobileNo->Visible) { // CP1MobileNo ?>
	<?php if ($pharmacy_suppliers->sortUrl($pharmacy_suppliers->CP1MobileNo) == "") { ?>
		<th data-name="CP1MobileNo" class="<?php echo $pharmacy_suppliers->CP1MobileNo->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_CP1MobileNo" class="pharmacy_suppliers_CP1MobileNo"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers->CP1MobileNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CP1MobileNo" class="<?php echo $pharmacy_suppliers->CP1MobileNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_suppliers->SortUrl($pharmacy_suppliers->CP1MobileNo) ?>',1);"><div id="elh_pharmacy_suppliers_CP1MobileNo" class="pharmacy_suppliers_CP1MobileNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers->CP1MobileNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers->CP1MobileNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_suppliers->CP1MobileNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers->CP1Fax->Visible) { // CP1Fax ?>
	<?php if ($pharmacy_suppliers->sortUrl($pharmacy_suppliers->CP1Fax) == "") { ?>
		<th data-name="CP1Fax" class="<?php echo $pharmacy_suppliers->CP1Fax->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_CP1Fax" class="pharmacy_suppliers_CP1Fax"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers->CP1Fax->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CP1Fax" class="<?php echo $pharmacy_suppliers->CP1Fax->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_suppliers->SortUrl($pharmacy_suppliers->CP1Fax) ?>',1);"><div id="elh_pharmacy_suppliers_CP1Fax" class="pharmacy_suppliers_CP1Fax">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers->CP1Fax->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers->CP1Fax->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_suppliers->CP1Fax->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers->CP1Email->Visible) { // CP1Email ?>
	<?php if ($pharmacy_suppliers->sortUrl($pharmacy_suppliers->CP1Email) == "") { ?>
		<th data-name="CP1Email" class="<?php echo $pharmacy_suppliers->CP1Email->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_CP1Email" class="pharmacy_suppliers_CP1Email"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers->CP1Email->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CP1Email" class="<?php echo $pharmacy_suppliers->CP1Email->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_suppliers->SortUrl($pharmacy_suppliers->CP1Email) ?>',1);"><div id="elh_pharmacy_suppliers_CP1Email" class="pharmacy_suppliers_CP1Email">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers->CP1Email->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers->CP1Email->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_suppliers->CP1Email->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers->Contactperson2->Visible) { // Contactperson2 ?>
	<?php if ($pharmacy_suppliers->sortUrl($pharmacy_suppliers->Contactperson2) == "") { ?>
		<th data-name="Contactperson2" class="<?php echo $pharmacy_suppliers->Contactperson2->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_Contactperson2" class="pharmacy_suppliers_Contactperson2"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers->Contactperson2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Contactperson2" class="<?php echo $pharmacy_suppliers->Contactperson2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_suppliers->SortUrl($pharmacy_suppliers->Contactperson2) ?>',1);"><div id="elh_pharmacy_suppliers_Contactperson2" class="pharmacy_suppliers_Contactperson2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers->Contactperson2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers->Contactperson2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_suppliers->Contactperson2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers->CP2Address1->Visible) { // CP2Address1 ?>
	<?php if ($pharmacy_suppliers->sortUrl($pharmacy_suppliers->CP2Address1) == "") { ?>
		<th data-name="CP2Address1" class="<?php echo $pharmacy_suppliers->CP2Address1->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_CP2Address1" class="pharmacy_suppliers_CP2Address1"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers->CP2Address1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CP2Address1" class="<?php echo $pharmacy_suppliers->CP2Address1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_suppliers->SortUrl($pharmacy_suppliers->CP2Address1) ?>',1);"><div id="elh_pharmacy_suppliers_CP2Address1" class="pharmacy_suppliers_CP2Address1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers->CP2Address1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers->CP2Address1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_suppliers->CP2Address1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers->CP2Address2->Visible) { // CP2Address2 ?>
	<?php if ($pharmacy_suppliers->sortUrl($pharmacy_suppliers->CP2Address2) == "") { ?>
		<th data-name="CP2Address2" class="<?php echo $pharmacy_suppliers->CP2Address2->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_CP2Address2" class="pharmacy_suppliers_CP2Address2"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers->CP2Address2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CP2Address2" class="<?php echo $pharmacy_suppliers->CP2Address2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_suppliers->SortUrl($pharmacy_suppliers->CP2Address2) ?>',1);"><div id="elh_pharmacy_suppliers_CP2Address2" class="pharmacy_suppliers_CP2Address2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers->CP2Address2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers->CP2Address2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_suppliers->CP2Address2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers->CP2Address3->Visible) { // CP2Address3 ?>
	<?php if ($pharmacy_suppliers->sortUrl($pharmacy_suppliers->CP2Address3) == "") { ?>
		<th data-name="CP2Address3" class="<?php echo $pharmacy_suppliers->CP2Address3->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_CP2Address3" class="pharmacy_suppliers_CP2Address3"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers->CP2Address3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CP2Address3" class="<?php echo $pharmacy_suppliers->CP2Address3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_suppliers->SortUrl($pharmacy_suppliers->CP2Address3) ?>',1);"><div id="elh_pharmacy_suppliers_CP2Address3" class="pharmacy_suppliers_CP2Address3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers->CP2Address3->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers->CP2Address3->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_suppliers->CP2Address3->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers->CP2Citycode->Visible) { // CP2Citycode ?>
	<?php if ($pharmacy_suppliers->sortUrl($pharmacy_suppliers->CP2Citycode) == "") { ?>
		<th data-name="CP2Citycode" class="<?php echo $pharmacy_suppliers->CP2Citycode->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_CP2Citycode" class="pharmacy_suppliers_CP2Citycode"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers->CP2Citycode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CP2Citycode" class="<?php echo $pharmacy_suppliers->CP2Citycode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_suppliers->SortUrl($pharmacy_suppliers->CP2Citycode) ?>',1);"><div id="elh_pharmacy_suppliers_CP2Citycode" class="pharmacy_suppliers_CP2Citycode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers->CP2Citycode->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers->CP2Citycode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_suppliers->CP2Citycode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers->CP2State->Visible) { // CP2State ?>
	<?php if ($pharmacy_suppliers->sortUrl($pharmacy_suppliers->CP2State) == "") { ?>
		<th data-name="CP2State" class="<?php echo $pharmacy_suppliers->CP2State->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_CP2State" class="pharmacy_suppliers_CP2State"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers->CP2State->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CP2State" class="<?php echo $pharmacy_suppliers->CP2State->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_suppliers->SortUrl($pharmacy_suppliers->CP2State) ?>',1);"><div id="elh_pharmacy_suppliers_CP2State" class="pharmacy_suppliers_CP2State">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers->CP2State->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers->CP2State->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_suppliers->CP2State->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers->CP2Pincode->Visible) { // CP2Pincode ?>
	<?php if ($pharmacy_suppliers->sortUrl($pharmacy_suppliers->CP2Pincode) == "") { ?>
		<th data-name="CP2Pincode" class="<?php echo $pharmacy_suppliers->CP2Pincode->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_CP2Pincode" class="pharmacy_suppliers_CP2Pincode"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers->CP2Pincode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CP2Pincode" class="<?php echo $pharmacy_suppliers->CP2Pincode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_suppliers->SortUrl($pharmacy_suppliers->CP2Pincode) ?>',1);"><div id="elh_pharmacy_suppliers_CP2Pincode" class="pharmacy_suppliers_CP2Pincode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers->CP2Pincode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers->CP2Pincode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_suppliers->CP2Pincode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers->CP2Designation->Visible) { // CP2Designation ?>
	<?php if ($pharmacy_suppliers->sortUrl($pharmacy_suppliers->CP2Designation) == "") { ?>
		<th data-name="CP2Designation" class="<?php echo $pharmacy_suppliers->CP2Designation->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_CP2Designation" class="pharmacy_suppliers_CP2Designation"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers->CP2Designation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CP2Designation" class="<?php echo $pharmacy_suppliers->CP2Designation->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_suppliers->SortUrl($pharmacy_suppliers->CP2Designation) ?>',1);"><div id="elh_pharmacy_suppliers_CP2Designation" class="pharmacy_suppliers_CP2Designation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers->CP2Designation->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers->CP2Designation->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_suppliers->CP2Designation->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers->CP2Phone->Visible) { // CP2Phone ?>
	<?php if ($pharmacy_suppliers->sortUrl($pharmacy_suppliers->CP2Phone) == "") { ?>
		<th data-name="CP2Phone" class="<?php echo $pharmacy_suppliers->CP2Phone->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_CP2Phone" class="pharmacy_suppliers_CP2Phone"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers->CP2Phone->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CP2Phone" class="<?php echo $pharmacy_suppliers->CP2Phone->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_suppliers->SortUrl($pharmacy_suppliers->CP2Phone) ?>',1);"><div id="elh_pharmacy_suppliers_CP2Phone" class="pharmacy_suppliers_CP2Phone">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers->CP2Phone->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers->CP2Phone->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_suppliers->CP2Phone->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers->CP2MobileNo->Visible) { // CP2MobileNo ?>
	<?php if ($pharmacy_suppliers->sortUrl($pharmacy_suppliers->CP2MobileNo) == "") { ?>
		<th data-name="CP2MobileNo" class="<?php echo $pharmacy_suppliers->CP2MobileNo->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_CP2MobileNo" class="pharmacy_suppliers_CP2MobileNo"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers->CP2MobileNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CP2MobileNo" class="<?php echo $pharmacy_suppliers->CP2MobileNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_suppliers->SortUrl($pharmacy_suppliers->CP2MobileNo) ?>',1);"><div id="elh_pharmacy_suppliers_CP2MobileNo" class="pharmacy_suppliers_CP2MobileNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers->CP2MobileNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers->CP2MobileNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_suppliers->CP2MobileNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers->CP2Fax->Visible) { // CP2Fax ?>
	<?php if ($pharmacy_suppliers->sortUrl($pharmacy_suppliers->CP2Fax) == "") { ?>
		<th data-name="CP2Fax" class="<?php echo $pharmacy_suppliers->CP2Fax->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_CP2Fax" class="pharmacy_suppliers_CP2Fax"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers->CP2Fax->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CP2Fax" class="<?php echo $pharmacy_suppliers->CP2Fax->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_suppliers->SortUrl($pharmacy_suppliers->CP2Fax) ?>',1);"><div id="elh_pharmacy_suppliers_CP2Fax" class="pharmacy_suppliers_CP2Fax">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers->CP2Fax->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers->CP2Fax->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_suppliers->CP2Fax->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers->CP2Email->Visible) { // CP2Email ?>
	<?php if ($pharmacy_suppliers->sortUrl($pharmacy_suppliers->CP2Email) == "") { ?>
		<th data-name="CP2Email" class="<?php echo $pharmacy_suppliers->CP2Email->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_CP2Email" class="pharmacy_suppliers_CP2Email"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers->CP2Email->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CP2Email" class="<?php echo $pharmacy_suppliers->CP2Email->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_suppliers->SortUrl($pharmacy_suppliers->CP2Email) ?>',1);"><div id="elh_pharmacy_suppliers_CP2Email" class="pharmacy_suppliers_CP2Email">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers->CP2Email->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers->CP2Email->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_suppliers->CP2Email->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers->Type->Visible) { // Type ?>
	<?php if ($pharmacy_suppliers->sortUrl($pharmacy_suppliers->Type) == "") { ?>
		<th data-name="Type" class="<?php echo $pharmacy_suppliers->Type->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_Type" class="pharmacy_suppliers_Type"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers->Type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Type" class="<?php echo $pharmacy_suppliers->Type->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_suppliers->SortUrl($pharmacy_suppliers->Type) ?>',1);"><div id="elh_pharmacy_suppliers_Type" class="pharmacy_suppliers_Type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers->Type->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers->Type->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_suppliers->Type->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers->Creditterms->Visible) { // Creditterms ?>
	<?php if ($pharmacy_suppliers->sortUrl($pharmacy_suppliers->Creditterms) == "") { ?>
		<th data-name="Creditterms" class="<?php echo $pharmacy_suppliers->Creditterms->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_Creditterms" class="pharmacy_suppliers_Creditterms"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers->Creditterms->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Creditterms" class="<?php echo $pharmacy_suppliers->Creditterms->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_suppliers->SortUrl($pharmacy_suppliers->Creditterms) ?>',1);"><div id="elh_pharmacy_suppliers_Creditterms" class="pharmacy_suppliers_Creditterms">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers->Creditterms->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers->Creditterms->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_suppliers->Creditterms->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers->Remarks->Visible) { // Remarks ?>
	<?php if ($pharmacy_suppliers->sortUrl($pharmacy_suppliers->Remarks) == "") { ?>
		<th data-name="Remarks" class="<?php echo $pharmacy_suppliers->Remarks->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_Remarks" class="pharmacy_suppliers_Remarks"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers->Remarks->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Remarks" class="<?php echo $pharmacy_suppliers->Remarks->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_suppliers->SortUrl($pharmacy_suppliers->Remarks) ?>',1);"><div id="elh_pharmacy_suppliers_Remarks" class="pharmacy_suppliers_Remarks">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers->Remarks->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers->Remarks->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_suppliers->Remarks->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers->Tinnumber->Visible) { // Tinnumber ?>
	<?php if ($pharmacy_suppliers->sortUrl($pharmacy_suppliers->Tinnumber) == "") { ?>
		<th data-name="Tinnumber" class="<?php echo $pharmacy_suppliers->Tinnumber->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_Tinnumber" class="pharmacy_suppliers_Tinnumber"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers->Tinnumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tinnumber" class="<?php echo $pharmacy_suppliers->Tinnumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_suppliers->SortUrl($pharmacy_suppliers->Tinnumber) ?>',1);"><div id="elh_pharmacy_suppliers_Tinnumber" class="pharmacy_suppliers_Tinnumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers->Tinnumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers->Tinnumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_suppliers->Tinnumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers->Universalsuppliercode->Visible) { // Universalsuppliercode ?>
	<?php if ($pharmacy_suppliers->sortUrl($pharmacy_suppliers->Universalsuppliercode) == "") { ?>
		<th data-name="Universalsuppliercode" class="<?php echo $pharmacy_suppliers->Universalsuppliercode->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_Universalsuppliercode" class="pharmacy_suppliers_Universalsuppliercode"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers->Universalsuppliercode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Universalsuppliercode" class="<?php echo $pharmacy_suppliers->Universalsuppliercode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_suppliers->SortUrl($pharmacy_suppliers->Universalsuppliercode) ?>',1);"><div id="elh_pharmacy_suppliers_Universalsuppliercode" class="pharmacy_suppliers_Universalsuppliercode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers->Universalsuppliercode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers->Universalsuppliercode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_suppliers->Universalsuppliercode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers->Mobilenumber->Visible) { // Mobilenumber ?>
	<?php if ($pharmacy_suppliers->sortUrl($pharmacy_suppliers->Mobilenumber) == "") { ?>
		<th data-name="Mobilenumber" class="<?php echo $pharmacy_suppliers->Mobilenumber->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_Mobilenumber" class="pharmacy_suppliers_Mobilenumber"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers->Mobilenumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mobilenumber" class="<?php echo $pharmacy_suppliers->Mobilenumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_suppliers->SortUrl($pharmacy_suppliers->Mobilenumber) ?>',1);"><div id="elh_pharmacy_suppliers_Mobilenumber" class="pharmacy_suppliers_Mobilenumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers->Mobilenumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers->Mobilenumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_suppliers->Mobilenumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers->PANNumber->Visible) { // PANNumber ?>
	<?php if ($pharmacy_suppliers->sortUrl($pharmacy_suppliers->PANNumber) == "") { ?>
		<th data-name="PANNumber" class="<?php echo $pharmacy_suppliers->PANNumber->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_PANNumber" class="pharmacy_suppliers_PANNumber"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers->PANNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PANNumber" class="<?php echo $pharmacy_suppliers->PANNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_suppliers->SortUrl($pharmacy_suppliers->PANNumber) ?>',1);"><div id="elh_pharmacy_suppliers_PANNumber" class="pharmacy_suppliers_PANNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers->PANNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers->PANNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_suppliers->PANNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers->SalesRepMobileNo->Visible) { // SalesRepMobileNo ?>
	<?php if ($pharmacy_suppliers->sortUrl($pharmacy_suppliers->SalesRepMobileNo) == "") { ?>
		<th data-name="SalesRepMobileNo" class="<?php echo $pharmacy_suppliers->SalesRepMobileNo->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_SalesRepMobileNo" class="pharmacy_suppliers_SalesRepMobileNo"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers->SalesRepMobileNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SalesRepMobileNo" class="<?php echo $pharmacy_suppliers->SalesRepMobileNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_suppliers->SortUrl($pharmacy_suppliers->SalesRepMobileNo) ?>',1);"><div id="elh_pharmacy_suppliers_SalesRepMobileNo" class="pharmacy_suppliers_SalesRepMobileNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers->SalesRepMobileNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers->SalesRepMobileNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_suppliers->SalesRepMobileNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers->GSTNumber->Visible) { // GSTNumber ?>
	<?php if ($pharmacy_suppliers->sortUrl($pharmacy_suppliers->GSTNumber) == "") { ?>
		<th data-name="GSTNumber" class="<?php echo $pharmacy_suppliers->GSTNumber->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_GSTNumber" class="pharmacy_suppliers_GSTNumber"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers->GSTNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GSTNumber" class="<?php echo $pharmacy_suppliers->GSTNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_suppliers->SortUrl($pharmacy_suppliers->GSTNumber) ?>',1);"><div id="elh_pharmacy_suppliers_GSTNumber" class="pharmacy_suppliers_GSTNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers->GSTNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers->GSTNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_suppliers->GSTNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers->TANNumber->Visible) { // TANNumber ?>
	<?php if ($pharmacy_suppliers->sortUrl($pharmacy_suppliers->TANNumber) == "") { ?>
		<th data-name="TANNumber" class="<?php echo $pharmacy_suppliers->TANNumber->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_TANNumber" class="pharmacy_suppliers_TANNumber"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers->TANNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TANNumber" class="<?php echo $pharmacy_suppliers->TANNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_suppliers->SortUrl($pharmacy_suppliers->TANNumber) ?>',1);"><div id="elh_pharmacy_suppliers_TANNumber" class="pharmacy_suppliers_TANNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers->TANNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers->TANNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_suppliers->TANNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_suppliers->id->Visible) { // id ?>
	<?php if ($pharmacy_suppliers->sortUrl($pharmacy_suppliers->id) == "") { ?>
		<th data-name="id" class="<?php echo $pharmacy_suppliers->id->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_id" class="pharmacy_suppliers_id"><div class="ew-table-header-caption"><?php echo $pharmacy_suppliers->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $pharmacy_suppliers->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_suppliers->SortUrl($pharmacy_suppliers->id) ?>',1);"><div id="elh_pharmacy_suppliers_id" class="pharmacy_suppliers_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_suppliers->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_suppliers->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_suppliers->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
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
if ($pharmacy_suppliers->ExportAll && $pharmacy_suppliers->isExport()) {
	$pharmacy_suppliers_list->StopRec = $pharmacy_suppliers_list->TotalRecs;
} else {

	// Set the last record to display
	if ($pharmacy_suppliers_list->TotalRecs > $pharmacy_suppliers_list->StartRec + $pharmacy_suppliers_list->DisplayRecs - 1)
		$pharmacy_suppliers_list->StopRec = $pharmacy_suppliers_list->StartRec + $pharmacy_suppliers_list->DisplayRecs - 1;
	else
		$pharmacy_suppliers_list->StopRec = $pharmacy_suppliers_list->TotalRecs;
}
$pharmacy_suppliers_list->RecCnt = $pharmacy_suppliers_list->StartRec - 1;
if ($pharmacy_suppliers_list->Recordset && !$pharmacy_suppliers_list->Recordset->EOF) {
	$pharmacy_suppliers_list->Recordset->moveFirst();
	$selectLimit = $pharmacy_suppliers_list->UseSelectLimit;
	if (!$selectLimit && $pharmacy_suppliers_list->StartRec > 1)
		$pharmacy_suppliers_list->Recordset->move($pharmacy_suppliers_list->StartRec - 1);
} elseif (!$pharmacy_suppliers->AllowAddDeleteRow && $pharmacy_suppliers_list->StopRec == 0) {
	$pharmacy_suppliers_list->StopRec = $pharmacy_suppliers->GridAddRowCount;
}

// Initialize aggregate
$pharmacy_suppliers->RowType = ROWTYPE_AGGREGATEINIT;
$pharmacy_suppliers->resetAttributes();
$pharmacy_suppliers_list->renderRow();
while ($pharmacy_suppliers_list->RecCnt < $pharmacy_suppliers_list->StopRec) {
	$pharmacy_suppliers_list->RecCnt++;
	if ($pharmacy_suppliers_list->RecCnt >= $pharmacy_suppliers_list->StartRec) {
		$pharmacy_suppliers_list->RowCnt++;

		// Set up key count
		$pharmacy_suppliers_list->KeyCount = $pharmacy_suppliers_list->RowIndex;

		// Init row class and style
		$pharmacy_suppliers->resetAttributes();
		$pharmacy_suppliers->CssClass = "";
		if ($pharmacy_suppliers->isGridAdd()) {
		} else {
			$pharmacy_suppliers_list->loadRowValues($pharmacy_suppliers_list->Recordset); // Load row values
		}
		$pharmacy_suppliers->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$pharmacy_suppliers->RowAttrs = array_merge($pharmacy_suppliers->RowAttrs, array('data-rowindex'=>$pharmacy_suppliers_list->RowCnt, 'id'=>'r' . $pharmacy_suppliers_list->RowCnt . '_pharmacy_suppliers', 'data-rowtype'=>$pharmacy_suppliers->RowType));

		// Render row
		$pharmacy_suppliers_list->renderRow();

		// Render list options
		$pharmacy_suppliers_list->renderListOptions();
?>
	<tr<?php echo $pharmacy_suppliers->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_suppliers_list->ListOptions->render("body", "left", $pharmacy_suppliers_list->RowCnt);
?>
	<?php if ($pharmacy_suppliers->Suppliercode->Visible) { // Suppliercode ?>
		<td data-name="Suppliercode"<?php echo $pharmacy_suppliers->Suppliercode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCnt ?>_pharmacy_suppliers_Suppliercode" class="pharmacy_suppliers_Suppliercode">
<span<?php echo $pharmacy_suppliers->Suppliercode->viewAttributes() ?>>
<?php echo $pharmacy_suppliers->Suppliercode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers->Suppliername->Visible) { // Suppliername ?>
		<td data-name="Suppliername"<?php echo $pharmacy_suppliers->Suppliername->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCnt ?>_pharmacy_suppliers_Suppliername" class="pharmacy_suppliers_Suppliername">
<span<?php echo $pharmacy_suppliers->Suppliername->viewAttributes() ?>>
<?php echo $pharmacy_suppliers->Suppliername->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers->Abbreviation->Visible) { // Abbreviation ?>
		<td data-name="Abbreviation"<?php echo $pharmacy_suppliers->Abbreviation->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCnt ?>_pharmacy_suppliers_Abbreviation" class="pharmacy_suppliers_Abbreviation">
<span<?php echo $pharmacy_suppliers->Abbreviation->viewAttributes() ?>>
<?php echo $pharmacy_suppliers->Abbreviation->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers->Creationdate->Visible) { // Creationdate ?>
		<td data-name="Creationdate"<?php echo $pharmacy_suppliers->Creationdate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCnt ?>_pharmacy_suppliers_Creationdate" class="pharmacy_suppliers_Creationdate">
<span<?php echo $pharmacy_suppliers->Creationdate->viewAttributes() ?>>
<?php echo $pharmacy_suppliers->Creationdate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers->Address1->Visible) { // Address1 ?>
		<td data-name="Address1"<?php echo $pharmacy_suppliers->Address1->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCnt ?>_pharmacy_suppliers_Address1" class="pharmacy_suppliers_Address1">
<span<?php echo $pharmacy_suppliers->Address1->viewAttributes() ?>>
<?php echo $pharmacy_suppliers->Address1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers->Address2->Visible) { // Address2 ?>
		<td data-name="Address2"<?php echo $pharmacy_suppliers->Address2->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCnt ?>_pharmacy_suppliers_Address2" class="pharmacy_suppliers_Address2">
<span<?php echo $pharmacy_suppliers->Address2->viewAttributes() ?>>
<?php echo $pharmacy_suppliers->Address2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers->Address3->Visible) { // Address3 ?>
		<td data-name="Address3"<?php echo $pharmacy_suppliers->Address3->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCnt ?>_pharmacy_suppliers_Address3" class="pharmacy_suppliers_Address3">
<span<?php echo $pharmacy_suppliers->Address3->viewAttributes() ?>>
<?php echo $pharmacy_suppliers->Address3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers->Citycode->Visible) { // Citycode ?>
		<td data-name="Citycode"<?php echo $pharmacy_suppliers->Citycode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCnt ?>_pharmacy_suppliers_Citycode" class="pharmacy_suppliers_Citycode">
<span<?php echo $pharmacy_suppliers->Citycode->viewAttributes() ?>>
<?php echo $pharmacy_suppliers->Citycode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers->State->Visible) { // State ?>
		<td data-name="State"<?php echo $pharmacy_suppliers->State->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCnt ?>_pharmacy_suppliers_State" class="pharmacy_suppliers_State">
<span<?php echo $pharmacy_suppliers->State->viewAttributes() ?>>
<?php echo $pharmacy_suppliers->State->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers->Pincode->Visible) { // Pincode ?>
		<td data-name="Pincode"<?php echo $pharmacy_suppliers->Pincode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCnt ?>_pharmacy_suppliers_Pincode" class="pharmacy_suppliers_Pincode">
<span<?php echo $pharmacy_suppliers->Pincode->viewAttributes() ?>>
<?php echo $pharmacy_suppliers->Pincode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers->Tngstnumber->Visible) { // Tngstnumber ?>
		<td data-name="Tngstnumber"<?php echo $pharmacy_suppliers->Tngstnumber->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCnt ?>_pharmacy_suppliers_Tngstnumber" class="pharmacy_suppliers_Tngstnumber">
<span<?php echo $pharmacy_suppliers->Tngstnumber->viewAttributes() ?>>
<?php echo $pharmacy_suppliers->Tngstnumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers->Phone->Visible) { // Phone ?>
		<td data-name="Phone"<?php echo $pharmacy_suppliers->Phone->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCnt ?>_pharmacy_suppliers_Phone" class="pharmacy_suppliers_Phone">
<span<?php echo $pharmacy_suppliers->Phone->viewAttributes() ?>>
<?php echo $pharmacy_suppliers->Phone->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers->Fax->Visible) { // Fax ?>
		<td data-name="Fax"<?php echo $pharmacy_suppliers->Fax->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCnt ?>_pharmacy_suppliers_Fax" class="pharmacy_suppliers_Fax">
<span<?php echo $pharmacy_suppliers->Fax->viewAttributes() ?>>
<?php echo $pharmacy_suppliers->Fax->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers->_Email->Visible) { // Email ?>
		<td data-name="_Email"<?php echo $pharmacy_suppliers->_Email->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCnt ?>_pharmacy_suppliers__Email" class="pharmacy_suppliers__Email">
<span<?php echo $pharmacy_suppliers->_Email->viewAttributes() ?>>
<?php echo $pharmacy_suppliers->_Email->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers->Paymentmode->Visible) { // Paymentmode ?>
		<td data-name="Paymentmode"<?php echo $pharmacy_suppliers->Paymentmode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCnt ?>_pharmacy_suppliers_Paymentmode" class="pharmacy_suppliers_Paymentmode">
<span<?php echo $pharmacy_suppliers->Paymentmode->viewAttributes() ?>>
<?php echo $pharmacy_suppliers->Paymentmode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers->Contactperson1->Visible) { // Contactperson1 ?>
		<td data-name="Contactperson1"<?php echo $pharmacy_suppliers->Contactperson1->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCnt ?>_pharmacy_suppliers_Contactperson1" class="pharmacy_suppliers_Contactperson1">
<span<?php echo $pharmacy_suppliers->Contactperson1->viewAttributes() ?>>
<?php echo $pharmacy_suppliers->Contactperson1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers->CP1Address1->Visible) { // CP1Address1 ?>
		<td data-name="CP1Address1"<?php echo $pharmacy_suppliers->CP1Address1->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCnt ?>_pharmacy_suppliers_CP1Address1" class="pharmacy_suppliers_CP1Address1">
<span<?php echo $pharmacy_suppliers->CP1Address1->viewAttributes() ?>>
<?php echo $pharmacy_suppliers->CP1Address1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers->CP1Address2->Visible) { // CP1Address2 ?>
		<td data-name="CP1Address2"<?php echo $pharmacy_suppliers->CP1Address2->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCnt ?>_pharmacy_suppliers_CP1Address2" class="pharmacy_suppliers_CP1Address2">
<span<?php echo $pharmacy_suppliers->CP1Address2->viewAttributes() ?>>
<?php echo $pharmacy_suppliers->CP1Address2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers->CP1Address3->Visible) { // CP1Address3 ?>
		<td data-name="CP1Address3"<?php echo $pharmacy_suppliers->CP1Address3->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCnt ?>_pharmacy_suppliers_CP1Address3" class="pharmacy_suppliers_CP1Address3">
<span<?php echo $pharmacy_suppliers->CP1Address3->viewAttributes() ?>>
<?php echo $pharmacy_suppliers->CP1Address3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers->CP1Citycode->Visible) { // CP1Citycode ?>
		<td data-name="CP1Citycode"<?php echo $pharmacy_suppliers->CP1Citycode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCnt ?>_pharmacy_suppliers_CP1Citycode" class="pharmacy_suppliers_CP1Citycode">
<span<?php echo $pharmacy_suppliers->CP1Citycode->viewAttributes() ?>>
<?php echo $pharmacy_suppliers->CP1Citycode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers->CP1State->Visible) { // CP1State ?>
		<td data-name="CP1State"<?php echo $pharmacy_suppliers->CP1State->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCnt ?>_pharmacy_suppliers_CP1State" class="pharmacy_suppliers_CP1State">
<span<?php echo $pharmacy_suppliers->CP1State->viewAttributes() ?>>
<?php echo $pharmacy_suppliers->CP1State->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers->CP1Pincode->Visible) { // CP1Pincode ?>
		<td data-name="CP1Pincode"<?php echo $pharmacy_suppliers->CP1Pincode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCnt ?>_pharmacy_suppliers_CP1Pincode" class="pharmacy_suppliers_CP1Pincode">
<span<?php echo $pharmacy_suppliers->CP1Pincode->viewAttributes() ?>>
<?php echo $pharmacy_suppliers->CP1Pincode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers->CP1Designation->Visible) { // CP1Designation ?>
		<td data-name="CP1Designation"<?php echo $pharmacy_suppliers->CP1Designation->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCnt ?>_pharmacy_suppliers_CP1Designation" class="pharmacy_suppliers_CP1Designation">
<span<?php echo $pharmacy_suppliers->CP1Designation->viewAttributes() ?>>
<?php echo $pharmacy_suppliers->CP1Designation->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers->CP1Phone->Visible) { // CP1Phone ?>
		<td data-name="CP1Phone"<?php echo $pharmacy_suppliers->CP1Phone->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCnt ?>_pharmacy_suppliers_CP1Phone" class="pharmacy_suppliers_CP1Phone">
<span<?php echo $pharmacy_suppliers->CP1Phone->viewAttributes() ?>>
<?php echo $pharmacy_suppliers->CP1Phone->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers->CP1MobileNo->Visible) { // CP1MobileNo ?>
		<td data-name="CP1MobileNo"<?php echo $pharmacy_suppliers->CP1MobileNo->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCnt ?>_pharmacy_suppliers_CP1MobileNo" class="pharmacy_suppliers_CP1MobileNo">
<span<?php echo $pharmacy_suppliers->CP1MobileNo->viewAttributes() ?>>
<?php echo $pharmacy_suppliers->CP1MobileNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers->CP1Fax->Visible) { // CP1Fax ?>
		<td data-name="CP1Fax"<?php echo $pharmacy_suppliers->CP1Fax->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCnt ?>_pharmacy_suppliers_CP1Fax" class="pharmacy_suppliers_CP1Fax">
<span<?php echo $pharmacy_suppliers->CP1Fax->viewAttributes() ?>>
<?php echo $pharmacy_suppliers->CP1Fax->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers->CP1Email->Visible) { // CP1Email ?>
		<td data-name="CP1Email"<?php echo $pharmacy_suppliers->CP1Email->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCnt ?>_pharmacy_suppliers_CP1Email" class="pharmacy_suppliers_CP1Email">
<span<?php echo $pharmacy_suppliers->CP1Email->viewAttributes() ?>>
<?php echo $pharmacy_suppliers->CP1Email->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers->Contactperson2->Visible) { // Contactperson2 ?>
		<td data-name="Contactperson2"<?php echo $pharmacy_suppliers->Contactperson2->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCnt ?>_pharmacy_suppliers_Contactperson2" class="pharmacy_suppliers_Contactperson2">
<span<?php echo $pharmacy_suppliers->Contactperson2->viewAttributes() ?>>
<?php echo $pharmacy_suppliers->Contactperson2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers->CP2Address1->Visible) { // CP2Address1 ?>
		<td data-name="CP2Address1"<?php echo $pharmacy_suppliers->CP2Address1->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCnt ?>_pharmacy_suppliers_CP2Address1" class="pharmacy_suppliers_CP2Address1">
<span<?php echo $pharmacy_suppliers->CP2Address1->viewAttributes() ?>>
<?php echo $pharmacy_suppliers->CP2Address1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers->CP2Address2->Visible) { // CP2Address2 ?>
		<td data-name="CP2Address2"<?php echo $pharmacy_suppliers->CP2Address2->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCnt ?>_pharmacy_suppliers_CP2Address2" class="pharmacy_suppliers_CP2Address2">
<span<?php echo $pharmacy_suppliers->CP2Address2->viewAttributes() ?>>
<?php echo $pharmacy_suppliers->CP2Address2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers->CP2Address3->Visible) { // CP2Address3 ?>
		<td data-name="CP2Address3"<?php echo $pharmacy_suppliers->CP2Address3->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCnt ?>_pharmacy_suppliers_CP2Address3" class="pharmacy_suppliers_CP2Address3">
<span<?php echo $pharmacy_suppliers->CP2Address3->viewAttributes() ?>>
<?php echo $pharmacy_suppliers->CP2Address3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers->CP2Citycode->Visible) { // CP2Citycode ?>
		<td data-name="CP2Citycode"<?php echo $pharmacy_suppliers->CP2Citycode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCnt ?>_pharmacy_suppliers_CP2Citycode" class="pharmacy_suppliers_CP2Citycode">
<span<?php echo $pharmacy_suppliers->CP2Citycode->viewAttributes() ?>>
<?php echo $pharmacy_suppliers->CP2Citycode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers->CP2State->Visible) { // CP2State ?>
		<td data-name="CP2State"<?php echo $pharmacy_suppliers->CP2State->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCnt ?>_pharmacy_suppliers_CP2State" class="pharmacy_suppliers_CP2State">
<span<?php echo $pharmacy_suppliers->CP2State->viewAttributes() ?>>
<?php echo $pharmacy_suppliers->CP2State->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers->CP2Pincode->Visible) { // CP2Pincode ?>
		<td data-name="CP2Pincode"<?php echo $pharmacy_suppliers->CP2Pincode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCnt ?>_pharmacy_suppliers_CP2Pincode" class="pharmacy_suppliers_CP2Pincode">
<span<?php echo $pharmacy_suppliers->CP2Pincode->viewAttributes() ?>>
<?php echo $pharmacy_suppliers->CP2Pincode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers->CP2Designation->Visible) { // CP2Designation ?>
		<td data-name="CP2Designation"<?php echo $pharmacy_suppliers->CP2Designation->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCnt ?>_pharmacy_suppliers_CP2Designation" class="pharmacy_suppliers_CP2Designation">
<span<?php echo $pharmacy_suppliers->CP2Designation->viewAttributes() ?>>
<?php echo $pharmacy_suppliers->CP2Designation->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers->CP2Phone->Visible) { // CP2Phone ?>
		<td data-name="CP2Phone"<?php echo $pharmacy_suppliers->CP2Phone->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCnt ?>_pharmacy_suppliers_CP2Phone" class="pharmacy_suppliers_CP2Phone">
<span<?php echo $pharmacy_suppliers->CP2Phone->viewAttributes() ?>>
<?php echo $pharmacy_suppliers->CP2Phone->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers->CP2MobileNo->Visible) { // CP2MobileNo ?>
		<td data-name="CP2MobileNo"<?php echo $pharmacy_suppliers->CP2MobileNo->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCnt ?>_pharmacy_suppliers_CP2MobileNo" class="pharmacy_suppliers_CP2MobileNo">
<span<?php echo $pharmacy_suppliers->CP2MobileNo->viewAttributes() ?>>
<?php echo $pharmacy_suppliers->CP2MobileNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers->CP2Fax->Visible) { // CP2Fax ?>
		<td data-name="CP2Fax"<?php echo $pharmacy_suppliers->CP2Fax->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCnt ?>_pharmacy_suppliers_CP2Fax" class="pharmacy_suppliers_CP2Fax">
<span<?php echo $pharmacy_suppliers->CP2Fax->viewAttributes() ?>>
<?php echo $pharmacy_suppliers->CP2Fax->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers->CP2Email->Visible) { // CP2Email ?>
		<td data-name="CP2Email"<?php echo $pharmacy_suppliers->CP2Email->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCnt ?>_pharmacy_suppliers_CP2Email" class="pharmacy_suppliers_CP2Email">
<span<?php echo $pharmacy_suppliers->CP2Email->viewAttributes() ?>>
<?php echo $pharmacy_suppliers->CP2Email->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers->Type->Visible) { // Type ?>
		<td data-name="Type"<?php echo $pharmacy_suppliers->Type->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCnt ?>_pharmacy_suppliers_Type" class="pharmacy_suppliers_Type">
<span<?php echo $pharmacy_suppliers->Type->viewAttributes() ?>>
<?php echo $pharmacy_suppliers->Type->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers->Creditterms->Visible) { // Creditterms ?>
		<td data-name="Creditterms"<?php echo $pharmacy_suppliers->Creditterms->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCnt ?>_pharmacy_suppliers_Creditterms" class="pharmacy_suppliers_Creditterms">
<span<?php echo $pharmacy_suppliers->Creditterms->viewAttributes() ?>>
<?php echo $pharmacy_suppliers->Creditterms->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers->Remarks->Visible) { // Remarks ?>
		<td data-name="Remarks"<?php echo $pharmacy_suppliers->Remarks->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCnt ?>_pharmacy_suppliers_Remarks" class="pharmacy_suppliers_Remarks">
<span<?php echo $pharmacy_suppliers->Remarks->viewAttributes() ?>>
<?php echo $pharmacy_suppliers->Remarks->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers->Tinnumber->Visible) { // Tinnumber ?>
		<td data-name="Tinnumber"<?php echo $pharmacy_suppliers->Tinnumber->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCnt ?>_pharmacy_suppliers_Tinnumber" class="pharmacy_suppliers_Tinnumber">
<span<?php echo $pharmacy_suppliers->Tinnumber->viewAttributes() ?>>
<?php echo $pharmacy_suppliers->Tinnumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers->Universalsuppliercode->Visible) { // Universalsuppliercode ?>
		<td data-name="Universalsuppliercode"<?php echo $pharmacy_suppliers->Universalsuppliercode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCnt ?>_pharmacy_suppliers_Universalsuppliercode" class="pharmacy_suppliers_Universalsuppliercode">
<span<?php echo $pharmacy_suppliers->Universalsuppliercode->viewAttributes() ?>>
<?php echo $pharmacy_suppliers->Universalsuppliercode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers->Mobilenumber->Visible) { // Mobilenumber ?>
		<td data-name="Mobilenumber"<?php echo $pharmacy_suppliers->Mobilenumber->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCnt ?>_pharmacy_suppliers_Mobilenumber" class="pharmacy_suppliers_Mobilenumber">
<span<?php echo $pharmacy_suppliers->Mobilenumber->viewAttributes() ?>>
<?php echo $pharmacy_suppliers->Mobilenumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers->PANNumber->Visible) { // PANNumber ?>
		<td data-name="PANNumber"<?php echo $pharmacy_suppliers->PANNumber->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCnt ?>_pharmacy_suppliers_PANNumber" class="pharmacy_suppliers_PANNumber">
<span<?php echo $pharmacy_suppliers->PANNumber->viewAttributes() ?>>
<?php echo $pharmacy_suppliers->PANNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers->SalesRepMobileNo->Visible) { // SalesRepMobileNo ?>
		<td data-name="SalesRepMobileNo"<?php echo $pharmacy_suppliers->SalesRepMobileNo->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCnt ?>_pharmacy_suppliers_SalesRepMobileNo" class="pharmacy_suppliers_SalesRepMobileNo">
<span<?php echo $pharmacy_suppliers->SalesRepMobileNo->viewAttributes() ?>>
<?php echo $pharmacy_suppliers->SalesRepMobileNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers->GSTNumber->Visible) { // GSTNumber ?>
		<td data-name="GSTNumber"<?php echo $pharmacy_suppliers->GSTNumber->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCnt ?>_pharmacy_suppliers_GSTNumber" class="pharmacy_suppliers_GSTNumber">
<span<?php echo $pharmacy_suppliers->GSTNumber->viewAttributes() ?>>
<?php echo $pharmacy_suppliers->GSTNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers->TANNumber->Visible) { // TANNumber ?>
		<td data-name="TANNumber"<?php echo $pharmacy_suppliers->TANNumber->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCnt ?>_pharmacy_suppliers_TANNumber" class="pharmacy_suppliers_TANNumber">
<span<?php echo $pharmacy_suppliers->TANNumber->viewAttributes() ?>>
<?php echo $pharmacy_suppliers->TANNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_suppliers->id->Visible) { // id ?>
		<td data-name="id"<?php echo $pharmacy_suppliers->id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_list->RowCnt ?>_pharmacy_suppliers_id" class="pharmacy_suppliers_id">
<span<?php echo $pharmacy_suppliers->id->viewAttributes() ?>>
<?php echo $pharmacy_suppliers->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_suppliers_list->ListOptions->render("body", "right", $pharmacy_suppliers_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$pharmacy_suppliers->isGridAdd())
		$pharmacy_suppliers_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$pharmacy_suppliers->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pharmacy_suppliers_list->Recordset)
	$pharmacy_suppliers_list->Recordset->Close();
?>
<?php if (!$pharmacy_suppliers->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$pharmacy_suppliers->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($pharmacy_suppliers_list->Pager)) $pharmacy_suppliers_list->Pager = new NumericPager($pharmacy_suppliers_list->StartRec, $pharmacy_suppliers_list->DisplayRecs, $pharmacy_suppliers_list->TotalRecs, $pharmacy_suppliers_list->RecRange, $pharmacy_suppliers_list->AutoHidePager) ?>
<?php if ($pharmacy_suppliers_list->Pager->RecordCount > 0 && $pharmacy_suppliers_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($pharmacy_suppliers_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_suppliers_list->pageUrl() ?>start=<?php echo $pharmacy_suppliers_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_suppliers_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_suppliers_list->pageUrl() ?>start=<?php echo $pharmacy_suppliers_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($pharmacy_suppliers_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $pharmacy_suppliers_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_suppliers_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_suppliers_list->pageUrl() ?>start=<?php echo $pharmacy_suppliers_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_suppliers_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_suppliers_list->pageUrl() ?>start=<?php echo $pharmacy_suppliers_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($pharmacy_suppliers_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $pharmacy_suppliers_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $pharmacy_suppliers_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $pharmacy_suppliers_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($pharmacy_suppliers_list->TotalRecs > 0 && (!$pharmacy_suppliers_list->AutoHidePageSizeSelector || $pharmacy_suppliers_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="pharmacy_suppliers">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($pharmacy_suppliers_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($pharmacy_suppliers_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($pharmacy_suppliers_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($pharmacy_suppliers_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($pharmacy_suppliers_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($pharmacy_suppliers_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($pharmacy_suppliers->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
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
<?php if ($pharmacy_suppliers_list->TotalRecs == 0 && !$pharmacy_suppliers->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pharmacy_suppliers_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$pharmacy_suppliers_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_suppliers->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$pharmacy_suppliers->isExport()) { ?>
<script>
ew.scrollableTable("gmp_pharmacy_suppliers", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$pharmacy_suppliers_list->terminate();
?>