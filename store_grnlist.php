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
$store_grn_list = new store_grn_list();

// Run the page
$store_grn_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$store_grn_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$store_grn->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fstore_grnlist = currentForm = new ew.Form("fstore_grnlist", "list");
fstore_grnlist.formKeyCountName = '<?php echo $store_grn_list->FormKeyCountName ?>';

// Form_CustomValidate event
fstore_grnlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fstore_grnlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fstore_grnlistsrch = currentSearchForm = new ew.Form("fstore_grnlistsrch");

// Filters
fstore_grnlistsrch.filterList = <?php echo $store_grn_list->getFilterList() ?>;
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
<?php if (!$store_grn->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($store_grn_list->TotalRecs > 0 && $store_grn_list->ExportOptions->visible()) { ?>
<?php $store_grn_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($store_grn_list->ImportOptions->visible()) { ?>
<?php $store_grn_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($store_grn_list->SearchOptions->visible()) { ?>
<?php $store_grn_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($store_grn_list->FilterOptions->visible()) { ?>
<?php $store_grn_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$store_grn->isExport() || EXPORT_MASTER_RECORD && $store_grn->isExport("print")) { ?>
<?php
if ($store_grn_list->DbMasterFilter <> "" && $store_grn->getCurrentMasterTable() == "store_payment") {
	if ($store_grn_list->MasterRecordExists) {
		include_once "store_paymentmaster.php";
	}
}
?>
<?php } ?>
<?php
$store_grn_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$store_grn->isExport() && !$store_grn->CurrentAction) { ?>
<form name="fstore_grnlistsrch" id="fstore_grnlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($store_grn_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fstore_grnlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="store_grn">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($store_grn_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($store_grn_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $store_grn_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($store_grn_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($store_grn_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($store_grn_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($store_grn_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $store_grn_list->showPageHeader(); ?>
<?php
$store_grn_list->showMessage();
?>
<?php if ($store_grn_list->TotalRecs > 0 || $store_grn->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($store_grn_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> store_grn">
<?php if (!$store_grn->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$store_grn->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($store_grn_list->Pager)) $store_grn_list->Pager = new NumericPager($store_grn_list->StartRec, $store_grn_list->DisplayRecs, $store_grn_list->TotalRecs, $store_grn_list->RecRange, $store_grn_list->AutoHidePager) ?>
<?php if ($store_grn_list->Pager->RecordCount > 0 && $store_grn_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($store_grn_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $store_grn_list->pageUrl() ?>start=<?php echo $store_grn_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($store_grn_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $store_grn_list->pageUrl() ?>start=<?php echo $store_grn_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($store_grn_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $store_grn_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($store_grn_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $store_grn_list->pageUrl() ?>start=<?php echo $store_grn_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($store_grn_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $store_grn_list->pageUrl() ?>start=<?php echo $store_grn_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($store_grn_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $store_grn_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $store_grn_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $store_grn_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($store_grn_list->TotalRecs > 0 && (!$store_grn_list->AutoHidePageSizeSelector || $store_grn_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="store_grn">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="5"<?php if ($store_grn_list->DisplayRecs == 5) { ?> selected<?php } ?>>5</option>
<option value="8"<?php if ($store_grn_list->DisplayRecs == 8) { ?> selected<?php } ?>>8</option>
<option value="10"<?php if ($store_grn_list->DisplayRecs == 10) { ?> selected<?php } ?>>10</option>
<option value="20"<?php if ($store_grn_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($store_grn_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($store_grn_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($store_grn_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($store_grn_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($store_grn_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($store_grn->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $store_grn_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fstore_grnlist" id="fstore_grnlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($store_grn_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $store_grn_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="store_grn">
<?php if ($store_grn->getCurrentMasterTable() == "store_payment" && $store_grn->CurrentAction) { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="store_payment">
<input type="hidden" name="fk_id" value="<?php echo $store_grn->Pid->getSessionValue() ?>">
<?php } ?>
<div id="gmp_store_grn" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($store_grn_list->TotalRecs > 0 || $store_grn->isGridEdit()) { ?>
<table id="tbl_store_grnlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$store_grn_list->RowType = ROWTYPE_HEADER;

// Render list options
$store_grn_list->renderListOptions();

// Render list options (header, left)
$store_grn_list->ListOptions->render("header", "left");
?>
<?php if ($store_grn->id->Visible) { // id ?>
	<?php if ($store_grn->sortUrl($store_grn->id) == "") { ?>
		<th data-name="id" class="<?php echo $store_grn->id->headerCellClass() ?>"><div id="elh_store_grn_id" class="store_grn_id"><div class="ew-table-header-caption"><?php echo $store_grn->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $store_grn->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_grn->SortUrl($store_grn->id) ?>',1);"><div id="elh_store_grn_id" class="store_grn_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_grn->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_grn->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_grn->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_grn->GRNNO->Visible) { // GRNNO ?>
	<?php if ($store_grn->sortUrl($store_grn->GRNNO) == "") { ?>
		<th data-name="GRNNO" class="<?php echo $store_grn->GRNNO->headerCellClass() ?>"><div id="elh_store_grn_GRNNO" class="store_grn_GRNNO"><div class="ew-table-header-caption"><?php echo $store_grn->GRNNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GRNNO" class="<?php echo $store_grn->GRNNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_grn->SortUrl($store_grn->GRNNO) ?>',1);"><div id="elh_store_grn_GRNNO" class="store_grn_GRNNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_grn->GRNNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_grn->GRNNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_grn->GRNNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_grn->DT->Visible) { // DT ?>
	<?php if ($store_grn->sortUrl($store_grn->DT) == "") { ?>
		<th data-name="DT" class="<?php echo $store_grn->DT->headerCellClass() ?>"><div id="elh_store_grn_DT" class="store_grn_DT"><div class="ew-table-header-caption"><?php echo $store_grn->DT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DT" class="<?php echo $store_grn->DT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_grn->SortUrl($store_grn->DT) ?>',1);"><div id="elh_store_grn_DT" class="store_grn_DT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_grn->DT->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_grn->DT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_grn->DT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_grn->Customername->Visible) { // Customername ?>
	<?php if ($store_grn->sortUrl($store_grn->Customername) == "") { ?>
		<th data-name="Customername" class="<?php echo $store_grn->Customername->headerCellClass() ?>"><div id="elh_store_grn_Customername" class="store_grn_Customername"><div class="ew-table-header-caption"><?php echo $store_grn->Customername->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Customername" class="<?php echo $store_grn->Customername->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_grn->SortUrl($store_grn->Customername) ?>',1);"><div id="elh_store_grn_Customername" class="store_grn_Customername">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_grn->Customername->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_grn->Customername->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_grn->Customername->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_grn->State->Visible) { // State ?>
	<?php if ($store_grn->sortUrl($store_grn->State) == "") { ?>
		<th data-name="State" class="<?php echo $store_grn->State->headerCellClass() ?>"><div id="elh_store_grn_State" class="store_grn_State"><div class="ew-table-header-caption"><?php echo $store_grn->State->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="State" class="<?php echo $store_grn->State->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_grn->SortUrl($store_grn->State) ?>',1);"><div id="elh_store_grn_State" class="store_grn_State">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_grn->State->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_grn->State->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_grn->State->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_grn->Pincode->Visible) { // Pincode ?>
	<?php if ($store_grn->sortUrl($store_grn->Pincode) == "") { ?>
		<th data-name="Pincode" class="<?php echo $store_grn->Pincode->headerCellClass() ?>"><div id="elh_store_grn_Pincode" class="store_grn_Pincode"><div class="ew-table-header-caption"><?php echo $store_grn->Pincode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pincode" class="<?php echo $store_grn->Pincode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_grn->SortUrl($store_grn->Pincode) ?>',1);"><div id="elh_store_grn_Pincode" class="store_grn_Pincode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_grn->Pincode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_grn->Pincode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_grn->Pincode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_grn->Phone->Visible) { // Phone ?>
	<?php if ($store_grn->sortUrl($store_grn->Phone) == "") { ?>
		<th data-name="Phone" class="<?php echo $store_grn->Phone->headerCellClass() ?>"><div id="elh_store_grn_Phone" class="store_grn_Phone"><div class="ew-table-header-caption"><?php echo $store_grn->Phone->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Phone" class="<?php echo $store_grn->Phone->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_grn->SortUrl($store_grn->Phone) ?>',1);"><div id="elh_store_grn_Phone" class="store_grn_Phone">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_grn->Phone->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_grn->Phone->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_grn->Phone->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_grn->BILLNO->Visible) { // BILLNO ?>
	<?php if ($store_grn->sortUrl($store_grn->BILLNO) == "") { ?>
		<th data-name="BILLNO" class="<?php echo $store_grn->BILLNO->headerCellClass() ?>"><div id="elh_store_grn_BILLNO" class="store_grn_BILLNO"><div class="ew-table-header-caption"><?php echo $store_grn->BILLNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BILLNO" class="<?php echo $store_grn->BILLNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_grn->SortUrl($store_grn->BILLNO) ?>',1);"><div id="elh_store_grn_BILLNO" class="store_grn_BILLNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_grn->BILLNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_grn->BILLNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_grn->BILLNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_grn->BILLDT->Visible) { // BILLDT ?>
	<?php if ($store_grn->sortUrl($store_grn->BILLDT) == "") { ?>
		<th data-name="BILLDT" class="<?php echo $store_grn->BILLDT->headerCellClass() ?>"><div id="elh_store_grn_BILLDT" class="store_grn_BILLDT"><div class="ew-table-header-caption"><?php echo $store_grn->BILLDT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BILLDT" class="<?php echo $store_grn->BILLDT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_grn->SortUrl($store_grn->BILLDT) ?>',1);"><div id="elh_store_grn_BILLDT" class="store_grn_BILLDT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_grn->BILLDT->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_grn->BILLDT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_grn->BILLDT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_grn->BillTotalValue->Visible) { // BillTotalValue ?>
	<?php if ($store_grn->sortUrl($store_grn->BillTotalValue) == "") { ?>
		<th data-name="BillTotalValue" class="<?php echo $store_grn->BillTotalValue->headerCellClass() ?>"><div id="elh_store_grn_BillTotalValue" class="store_grn_BillTotalValue"><div class="ew-table-header-caption"><?php echo $store_grn->BillTotalValue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillTotalValue" class="<?php echo $store_grn->BillTotalValue->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_grn->SortUrl($store_grn->BillTotalValue) ?>',1);"><div id="elh_store_grn_BillTotalValue" class="store_grn_BillTotalValue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_grn->BillTotalValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_grn->BillTotalValue->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_grn->BillTotalValue->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_grn->GRNTotalValue->Visible) { // GRNTotalValue ?>
	<?php if ($store_grn->sortUrl($store_grn->GRNTotalValue) == "") { ?>
		<th data-name="GRNTotalValue" class="<?php echo $store_grn->GRNTotalValue->headerCellClass() ?>"><div id="elh_store_grn_GRNTotalValue" class="store_grn_GRNTotalValue"><div class="ew-table-header-caption"><?php echo $store_grn->GRNTotalValue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GRNTotalValue" class="<?php echo $store_grn->GRNTotalValue->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_grn->SortUrl($store_grn->GRNTotalValue) ?>',1);"><div id="elh_store_grn_GRNTotalValue" class="store_grn_GRNTotalValue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_grn->GRNTotalValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_grn->GRNTotalValue->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_grn->GRNTotalValue->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_grn->BillDiscount->Visible) { // BillDiscount ?>
	<?php if ($store_grn->sortUrl($store_grn->BillDiscount) == "") { ?>
		<th data-name="BillDiscount" class="<?php echo $store_grn->BillDiscount->headerCellClass() ?>"><div id="elh_store_grn_BillDiscount" class="store_grn_BillDiscount"><div class="ew-table-header-caption"><?php echo $store_grn->BillDiscount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillDiscount" class="<?php echo $store_grn->BillDiscount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_grn->SortUrl($store_grn->BillDiscount) ?>',1);"><div id="elh_store_grn_BillDiscount" class="store_grn_BillDiscount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_grn->BillDiscount->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_grn->BillDiscount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_grn->BillDiscount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_grn->GrnValue->Visible) { // GrnValue ?>
	<?php if ($store_grn->sortUrl($store_grn->GrnValue) == "") { ?>
		<th data-name="GrnValue" class="<?php echo $store_grn->GrnValue->headerCellClass() ?>"><div id="elh_store_grn_GrnValue" class="store_grn_GrnValue"><div class="ew-table-header-caption"><?php echo $store_grn->GrnValue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GrnValue" class="<?php echo $store_grn->GrnValue->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_grn->SortUrl($store_grn->GrnValue) ?>',1);"><div id="elh_store_grn_GrnValue" class="store_grn_GrnValue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_grn->GrnValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_grn->GrnValue->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_grn->GrnValue->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_grn->Pid->Visible) { // Pid ?>
	<?php if ($store_grn->sortUrl($store_grn->Pid) == "") { ?>
		<th data-name="Pid" class="<?php echo $store_grn->Pid->headerCellClass() ?>"><div id="elh_store_grn_Pid" class="store_grn_Pid"><div class="ew-table-header-caption"><?php echo $store_grn->Pid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pid" class="<?php echo $store_grn->Pid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_grn->SortUrl($store_grn->Pid) ?>',1);"><div id="elh_store_grn_Pid" class="store_grn_Pid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_grn->Pid->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_grn->Pid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_grn->Pid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_grn->PaymentNo->Visible) { // PaymentNo ?>
	<?php if ($store_grn->sortUrl($store_grn->PaymentNo) == "") { ?>
		<th data-name="PaymentNo" class="<?php echo $store_grn->PaymentNo->headerCellClass() ?>"><div id="elh_store_grn_PaymentNo" class="store_grn_PaymentNo"><div class="ew-table-header-caption"><?php echo $store_grn->PaymentNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PaymentNo" class="<?php echo $store_grn->PaymentNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_grn->SortUrl($store_grn->PaymentNo) ?>',1);"><div id="elh_store_grn_PaymentNo" class="store_grn_PaymentNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_grn->PaymentNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_grn->PaymentNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_grn->PaymentNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_grn->PaymentStatus->Visible) { // PaymentStatus ?>
	<?php if ($store_grn->sortUrl($store_grn->PaymentStatus) == "") { ?>
		<th data-name="PaymentStatus" class="<?php echo $store_grn->PaymentStatus->headerCellClass() ?>"><div id="elh_store_grn_PaymentStatus" class="store_grn_PaymentStatus"><div class="ew-table-header-caption"><?php echo $store_grn->PaymentStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PaymentStatus" class="<?php echo $store_grn->PaymentStatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_grn->SortUrl($store_grn->PaymentStatus) ?>',1);"><div id="elh_store_grn_PaymentStatus" class="store_grn_PaymentStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_grn->PaymentStatus->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_grn->PaymentStatus->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_grn->PaymentStatus->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_grn->PaidAmount->Visible) { // PaidAmount ?>
	<?php if ($store_grn->sortUrl($store_grn->PaidAmount) == "") { ?>
		<th data-name="PaidAmount" class="<?php echo $store_grn->PaidAmount->headerCellClass() ?>"><div id="elh_store_grn_PaidAmount" class="store_grn_PaidAmount"><div class="ew-table-header-caption"><?php echo $store_grn->PaidAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PaidAmount" class="<?php echo $store_grn->PaidAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_grn->SortUrl($store_grn->PaidAmount) ?>',1);"><div id="elh_store_grn_PaidAmount" class="store_grn_PaidAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_grn->PaidAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_grn->PaidAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_grn->PaidAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_grn->StoreID->Visible) { // StoreID ?>
	<?php if ($store_grn->sortUrl($store_grn->StoreID) == "") { ?>
		<th data-name="StoreID" class="<?php echo $store_grn->StoreID->headerCellClass() ?>"><div id="elh_store_grn_StoreID" class="store_grn_StoreID"><div class="ew-table-header-caption"><?php echo $store_grn->StoreID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StoreID" class="<?php echo $store_grn->StoreID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_grn->SortUrl($store_grn->StoreID) ?>',1);"><div id="elh_store_grn_StoreID" class="store_grn_StoreID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_grn->StoreID->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_grn->StoreID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_grn->StoreID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$store_grn_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($store_grn->ExportAll && $store_grn->isExport()) {
	$store_grn_list->StopRec = $store_grn_list->TotalRecs;
} else {

	// Set the last record to display
	if ($store_grn_list->TotalRecs > $store_grn_list->StartRec + $store_grn_list->DisplayRecs - 1)
		$store_grn_list->StopRec = $store_grn_list->StartRec + $store_grn_list->DisplayRecs - 1;
	else
		$store_grn_list->StopRec = $store_grn_list->TotalRecs;
}
$store_grn_list->RecCnt = $store_grn_list->StartRec - 1;
if ($store_grn_list->Recordset && !$store_grn_list->Recordset->EOF) {
	$store_grn_list->Recordset->moveFirst();
	$selectLimit = $store_grn_list->UseSelectLimit;
	if (!$selectLimit && $store_grn_list->StartRec > 1)
		$store_grn_list->Recordset->move($store_grn_list->StartRec - 1);
} elseif (!$store_grn->AllowAddDeleteRow && $store_grn_list->StopRec == 0) {
	$store_grn_list->StopRec = $store_grn->GridAddRowCount;
}

// Initialize aggregate
$store_grn->RowType = ROWTYPE_AGGREGATEINIT;
$store_grn->resetAttributes();
$store_grn_list->renderRow();
while ($store_grn_list->RecCnt < $store_grn_list->StopRec) {
	$store_grn_list->RecCnt++;
	if ($store_grn_list->RecCnt >= $store_grn_list->StartRec) {
		$store_grn_list->RowCnt++;

		// Set up key count
		$store_grn_list->KeyCount = $store_grn_list->RowIndex;

		// Init row class and style
		$store_grn->resetAttributes();
		$store_grn->CssClass = "";
		if ($store_grn->isGridAdd()) {
		} else {
			$store_grn_list->loadRowValues($store_grn_list->Recordset); // Load row values
		}
		$store_grn->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$store_grn->RowAttrs = array_merge($store_grn->RowAttrs, array('data-rowindex'=>$store_grn_list->RowCnt, 'id'=>'r' . $store_grn_list->RowCnt . '_store_grn', 'data-rowtype'=>$store_grn->RowType));

		// Render row
		$store_grn_list->renderRow();

		// Render list options
		$store_grn_list->renderListOptions();
?>
	<tr<?php echo $store_grn->rowAttributes() ?>>
<?php

// Render list options (body, left)
$store_grn_list->ListOptions->render("body", "left", $store_grn_list->RowCnt);
?>
	<?php if ($store_grn->id->Visible) { // id ?>
		<td data-name="id"<?php echo $store_grn->id->cellAttributes() ?>>
<span id="el<?php echo $store_grn_list->RowCnt ?>_store_grn_id" class="store_grn_id">
<span<?php echo $store_grn->id->viewAttributes() ?>>
<?php echo $store_grn->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_grn->GRNNO->Visible) { // GRNNO ?>
		<td data-name="GRNNO"<?php echo $store_grn->GRNNO->cellAttributes() ?>>
<span id="el<?php echo $store_grn_list->RowCnt ?>_store_grn_GRNNO" class="store_grn_GRNNO">
<span<?php echo $store_grn->GRNNO->viewAttributes() ?>>
<?php echo $store_grn->GRNNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_grn->DT->Visible) { // DT ?>
		<td data-name="DT"<?php echo $store_grn->DT->cellAttributes() ?>>
<span id="el<?php echo $store_grn_list->RowCnt ?>_store_grn_DT" class="store_grn_DT">
<span<?php echo $store_grn->DT->viewAttributes() ?>>
<?php echo $store_grn->DT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_grn->Customername->Visible) { // Customername ?>
		<td data-name="Customername"<?php echo $store_grn->Customername->cellAttributes() ?>>
<span id="el<?php echo $store_grn_list->RowCnt ?>_store_grn_Customername" class="store_grn_Customername">
<span<?php echo $store_grn->Customername->viewAttributes() ?>>
<?php echo $store_grn->Customername->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_grn->State->Visible) { // State ?>
		<td data-name="State"<?php echo $store_grn->State->cellAttributes() ?>>
<span id="el<?php echo $store_grn_list->RowCnt ?>_store_grn_State" class="store_grn_State">
<span<?php echo $store_grn->State->viewAttributes() ?>>
<?php echo $store_grn->State->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_grn->Pincode->Visible) { // Pincode ?>
		<td data-name="Pincode"<?php echo $store_grn->Pincode->cellAttributes() ?>>
<span id="el<?php echo $store_grn_list->RowCnt ?>_store_grn_Pincode" class="store_grn_Pincode">
<span<?php echo $store_grn->Pincode->viewAttributes() ?>>
<?php echo $store_grn->Pincode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_grn->Phone->Visible) { // Phone ?>
		<td data-name="Phone"<?php echo $store_grn->Phone->cellAttributes() ?>>
<span id="el<?php echo $store_grn_list->RowCnt ?>_store_grn_Phone" class="store_grn_Phone">
<span<?php echo $store_grn->Phone->viewAttributes() ?>>
<?php echo $store_grn->Phone->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_grn->BILLNO->Visible) { // BILLNO ?>
		<td data-name="BILLNO"<?php echo $store_grn->BILLNO->cellAttributes() ?>>
<span id="el<?php echo $store_grn_list->RowCnt ?>_store_grn_BILLNO" class="store_grn_BILLNO">
<span<?php echo $store_grn->BILLNO->viewAttributes() ?>>
<?php echo $store_grn->BILLNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_grn->BILLDT->Visible) { // BILLDT ?>
		<td data-name="BILLDT"<?php echo $store_grn->BILLDT->cellAttributes() ?>>
<span id="el<?php echo $store_grn_list->RowCnt ?>_store_grn_BILLDT" class="store_grn_BILLDT">
<span<?php echo $store_grn->BILLDT->viewAttributes() ?>>
<?php echo $store_grn->BILLDT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_grn->BillTotalValue->Visible) { // BillTotalValue ?>
		<td data-name="BillTotalValue"<?php echo $store_grn->BillTotalValue->cellAttributes() ?>>
<span id="el<?php echo $store_grn_list->RowCnt ?>_store_grn_BillTotalValue" class="store_grn_BillTotalValue">
<span<?php echo $store_grn->BillTotalValue->viewAttributes() ?>>
<?php echo $store_grn->BillTotalValue->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_grn->GRNTotalValue->Visible) { // GRNTotalValue ?>
		<td data-name="GRNTotalValue"<?php echo $store_grn->GRNTotalValue->cellAttributes() ?>>
<span id="el<?php echo $store_grn_list->RowCnt ?>_store_grn_GRNTotalValue" class="store_grn_GRNTotalValue">
<span<?php echo $store_grn->GRNTotalValue->viewAttributes() ?>>
<?php echo $store_grn->GRNTotalValue->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_grn->BillDiscount->Visible) { // BillDiscount ?>
		<td data-name="BillDiscount"<?php echo $store_grn->BillDiscount->cellAttributes() ?>>
<span id="el<?php echo $store_grn_list->RowCnt ?>_store_grn_BillDiscount" class="store_grn_BillDiscount">
<span<?php echo $store_grn->BillDiscount->viewAttributes() ?>>
<?php echo $store_grn->BillDiscount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_grn->GrnValue->Visible) { // GrnValue ?>
		<td data-name="GrnValue"<?php echo $store_grn->GrnValue->cellAttributes() ?>>
<span id="el<?php echo $store_grn_list->RowCnt ?>_store_grn_GrnValue" class="store_grn_GrnValue">
<span<?php echo $store_grn->GrnValue->viewAttributes() ?>>
<?php echo $store_grn->GrnValue->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_grn->Pid->Visible) { // Pid ?>
		<td data-name="Pid"<?php echo $store_grn->Pid->cellAttributes() ?>>
<span id="el<?php echo $store_grn_list->RowCnt ?>_store_grn_Pid" class="store_grn_Pid">
<span<?php echo $store_grn->Pid->viewAttributes() ?>>
<?php echo $store_grn->Pid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_grn->PaymentNo->Visible) { // PaymentNo ?>
		<td data-name="PaymentNo"<?php echo $store_grn->PaymentNo->cellAttributes() ?>>
<span id="el<?php echo $store_grn_list->RowCnt ?>_store_grn_PaymentNo" class="store_grn_PaymentNo">
<span<?php echo $store_grn->PaymentNo->viewAttributes() ?>>
<?php echo $store_grn->PaymentNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_grn->PaymentStatus->Visible) { // PaymentStatus ?>
		<td data-name="PaymentStatus"<?php echo $store_grn->PaymentStatus->cellAttributes() ?>>
<span id="el<?php echo $store_grn_list->RowCnt ?>_store_grn_PaymentStatus" class="store_grn_PaymentStatus">
<span<?php echo $store_grn->PaymentStatus->viewAttributes() ?>>
<?php echo $store_grn->PaymentStatus->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_grn->PaidAmount->Visible) { // PaidAmount ?>
		<td data-name="PaidAmount"<?php echo $store_grn->PaidAmount->cellAttributes() ?>>
<span id="el<?php echo $store_grn_list->RowCnt ?>_store_grn_PaidAmount" class="store_grn_PaidAmount">
<span<?php echo $store_grn->PaidAmount->viewAttributes() ?>>
<?php echo $store_grn->PaidAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_grn->StoreID->Visible) { // StoreID ?>
		<td data-name="StoreID"<?php echo $store_grn->StoreID->cellAttributes() ?>>
<span id="el<?php echo $store_grn_list->RowCnt ?>_store_grn_StoreID" class="store_grn_StoreID">
<span<?php echo $store_grn->StoreID->viewAttributes() ?>>
<?php echo $store_grn->StoreID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$store_grn_list->ListOptions->render("body", "right", $store_grn_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$store_grn->isGridAdd())
		$store_grn_list->Recordset->moveNext();
}
?>
</tbody>
<?php

// Render aggregate row
$store_grn->RowType = ROWTYPE_AGGREGATE;
$store_grn->resetAttributes();
$store_grn_list->renderRow();
?>
<?php if ($store_grn_list->TotalRecs > 0 && !$store_grn->isGridAdd() && !$store_grn->isGridEdit()) { ?>
<tfoot><!-- Table footer -->
	<tr class="ew-table-footer">
<?php

// Render list options
$store_grn_list->renderListOptions();

// Render list options (footer, left)
$store_grn_list->ListOptions->render("footer", "left");
?>
	<?php if ($store_grn->id->Visible) { // id ?>
		<td data-name="id" class="<?php echo $store_grn->id->footerCellClass() ?>"><span id="elf_store_grn_id" class="store_grn_id">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($store_grn->GRNNO->Visible) { // GRNNO ?>
		<td data-name="GRNNO" class="<?php echo $store_grn->GRNNO->footerCellClass() ?>"><span id="elf_store_grn_GRNNO" class="store_grn_GRNNO">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($store_grn->DT->Visible) { // DT ?>
		<td data-name="DT" class="<?php echo $store_grn->DT->footerCellClass() ?>"><span id="elf_store_grn_DT" class="store_grn_DT">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($store_grn->Customername->Visible) { // Customername ?>
		<td data-name="Customername" class="<?php echo $store_grn->Customername->footerCellClass() ?>"><span id="elf_store_grn_Customername" class="store_grn_Customername">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($store_grn->State->Visible) { // State ?>
		<td data-name="State" class="<?php echo $store_grn->State->footerCellClass() ?>"><span id="elf_store_grn_State" class="store_grn_State">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($store_grn->Pincode->Visible) { // Pincode ?>
		<td data-name="Pincode" class="<?php echo $store_grn->Pincode->footerCellClass() ?>"><span id="elf_store_grn_Pincode" class="store_grn_Pincode">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($store_grn->Phone->Visible) { // Phone ?>
		<td data-name="Phone" class="<?php echo $store_grn->Phone->footerCellClass() ?>"><span id="elf_store_grn_Phone" class="store_grn_Phone">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($store_grn->BILLNO->Visible) { // BILLNO ?>
		<td data-name="BILLNO" class="<?php echo $store_grn->BILLNO->footerCellClass() ?>"><span id="elf_store_grn_BILLNO" class="store_grn_BILLNO">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($store_grn->BILLDT->Visible) { // BILLDT ?>
		<td data-name="BILLDT" class="<?php echo $store_grn->BILLDT->footerCellClass() ?>"><span id="elf_store_grn_BILLDT" class="store_grn_BILLDT">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($store_grn->BillTotalValue->Visible) { // BillTotalValue ?>
		<td data-name="BillTotalValue" class="<?php echo $store_grn->BillTotalValue->footerCellClass() ?>"><span id="elf_store_grn_BillTotalValue" class="store_grn_BillTotalValue">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $store_grn->BillTotalValue->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($store_grn->GRNTotalValue->Visible) { // GRNTotalValue ?>
		<td data-name="GRNTotalValue" class="<?php echo $store_grn->GRNTotalValue->footerCellClass() ?>"><span id="elf_store_grn_GRNTotalValue" class="store_grn_GRNTotalValue">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $store_grn->GRNTotalValue->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($store_grn->BillDiscount->Visible) { // BillDiscount ?>
		<td data-name="BillDiscount" class="<?php echo $store_grn->BillDiscount->footerCellClass() ?>"><span id="elf_store_grn_BillDiscount" class="store_grn_BillDiscount">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $store_grn->BillDiscount->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($store_grn->GrnValue->Visible) { // GrnValue ?>
		<td data-name="GrnValue" class="<?php echo $store_grn->GrnValue->footerCellClass() ?>"><span id="elf_store_grn_GrnValue" class="store_grn_GrnValue">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($store_grn->Pid->Visible) { // Pid ?>
		<td data-name="Pid" class="<?php echo $store_grn->Pid->footerCellClass() ?>"><span id="elf_store_grn_Pid" class="store_grn_Pid">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($store_grn->PaymentNo->Visible) { // PaymentNo ?>
		<td data-name="PaymentNo" class="<?php echo $store_grn->PaymentNo->footerCellClass() ?>"><span id="elf_store_grn_PaymentNo" class="store_grn_PaymentNo">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($store_grn->PaymentStatus->Visible) { // PaymentStatus ?>
		<td data-name="PaymentStatus" class="<?php echo $store_grn->PaymentStatus->footerCellClass() ?>"><span id="elf_store_grn_PaymentStatus" class="store_grn_PaymentStatus">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($store_grn->PaidAmount->Visible) { // PaidAmount ?>
		<td data-name="PaidAmount" class="<?php echo $store_grn->PaidAmount->footerCellClass() ?>"><span id="elf_store_grn_PaidAmount" class="store_grn_PaidAmount">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($store_grn->StoreID->Visible) { // StoreID ?>
		<td data-name="StoreID" class="<?php echo $store_grn->StoreID->footerCellClass() ?>"><span id="elf_store_grn_StoreID" class="store_grn_StoreID">
		&nbsp;
		</span></td>
	<?php } ?>
<?php

// Render list options (footer, right)
$store_grn_list->ListOptions->render("footer", "right");
?>
	</tr>
</tfoot>
<?php } ?>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$store_grn->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($store_grn_list->Recordset)
	$store_grn_list->Recordset->Close();
?>
<?php if (!$store_grn->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$store_grn->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($store_grn_list->Pager)) $store_grn_list->Pager = new NumericPager($store_grn_list->StartRec, $store_grn_list->DisplayRecs, $store_grn_list->TotalRecs, $store_grn_list->RecRange, $store_grn_list->AutoHidePager) ?>
<?php if ($store_grn_list->Pager->RecordCount > 0 && $store_grn_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($store_grn_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $store_grn_list->pageUrl() ?>start=<?php echo $store_grn_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($store_grn_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $store_grn_list->pageUrl() ?>start=<?php echo $store_grn_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($store_grn_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $store_grn_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($store_grn_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $store_grn_list->pageUrl() ?>start=<?php echo $store_grn_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($store_grn_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $store_grn_list->pageUrl() ?>start=<?php echo $store_grn_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($store_grn_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $store_grn_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $store_grn_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $store_grn_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($store_grn_list->TotalRecs > 0 && (!$store_grn_list->AutoHidePageSizeSelector || $store_grn_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="store_grn">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="5"<?php if ($store_grn_list->DisplayRecs == 5) { ?> selected<?php } ?>>5</option>
<option value="8"<?php if ($store_grn_list->DisplayRecs == 8) { ?> selected<?php } ?>>8</option>
<option value="10"<?php if ($store_grn_list->DisplayRecs == 10) { ?> selected<?php } ?>>10</option>
<option value="20"<?php if ($store_grn_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($store_grn_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($store_grn_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($store_grn_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($store_grn_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($store_grn_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($store_grn->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $store_grn_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($store_grn_list->TotalRecs == 0 && !$store_grn->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $store_grn_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$store_grn_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$store_grn->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");
// Write your table-specific startup script here
// document.write("page loaded");
// Write your table-specific startup script here
// document.write("page loaded");

</script>
<style>
.input-group>.form-control.ew-lookup-text {
	width: 35em;
}
.input-group {
	position: relative;
	display: flex;
	flex-wrap: nowrap;
	align-items: stretch;
	width: 100%;
}
.ew-grid .ew-table, .ew-grid .ew-grid-middle-panel {
	border: 0;
	padding: 0;
	margin-bottom: 0;
	overflow-x: scroll;
}
</style>
<script>
$("[data-name='Quantity']").hide();
$("[data-name='BillDate']").hide();
</script>
<?php if (!$store_grn->isExport()) { ?>
<script>
ew.scrollableTable("gmp_store_grn", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$store_grn_list->terminate();
?>