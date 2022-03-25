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
$store_payment_list = new store_payment_list();

// Run the page
$store_payment_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$store_payment_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$store_payment->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fstore_paymentlist = currentForm = new ew.Form("fstore_paymentlist", "list");
fstore_paymentlist.formKeyCountName = '<?php echo $store_payment_list->FormKeyCountName ?>';

// Form_CustomValidate event
fstore_paymentlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fstore_paymentlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fstore_paymentlist.lists["x_Customername[]"] = <?php echo $store_payment_list->Customername->Lookup->toClientList() ?>;
fstore_paymentlist.lists["x_Customername[]"].options = <?php echo JsonEncode($store_payment_list->Customername->lookupOptions()) ?>;
fstore_paymentlist.lists["x_pharmacy_pocol"] = <?php echo $store_payment_list->pharmacy_pocol->Lookup->toClientList() ?>;
fstore_paymentlist.lists["x_pharmacy_pocol"].options = <?php echo JsonEncode($store_payment_list->pharmacy_pocol->lookupOptions()) ?>;
fstore_paymentlist.lists["x_ModeofPayment"] = <?php echo $store_payment_list->ModeofPayment->Lookup->toClientList() ?>;
fstore_paymentlist.lists["x_ModeofPayment"].options = <?php echo JsonEncode($store_payment_list->ModeofPayment->lookupOptions()) ?>;

// Form object for search
var fstore_paymentlistsrch = currentSearchForm = new ew.Form("fstore_paymentlistsrch");

// Filters
fstore_paymentlistsrch.filterList = <?php echo $store_payment_list->getFilterList() ?>;
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
<?php if (!$store_payment->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($store_payment_list->TotalRecs > 0 && $store_payment_list->ExportOptions->visible()) { ?>
<?php $store_payment_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($store_payment_list->ImportOptions->visible()) { ?>
<?php $store_payment_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($store_payment_list->SearchOptions->visible()) { ?>
<?php $store_payment_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($store_payment_list->FilterOptions->visible()) { ?>
<?php $store_payment_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$store_payment_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$store_payment->isExport() && !$store_payment->CurrentAction) { ?>
<form name="fstore_paymentlistsrch" id="fstore_paymentlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($store_payment_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fstore_paymentlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="store_payment">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($store_payment_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($store_payment_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $store_payment_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($store_payment_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($store_payment_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($store_payment_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($store_payment_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $store_payment_list->showPageHeader(); ?>
<?php
$store_payment_list->showMessage();
?>
<?php if ($store_payment_list->TotalRecs > 0 || $store_payment->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($store_payment_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> store_payment">
<?php if (!$store_payment->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$store_payment->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($store_payment_list->Pager)) $store_payment_list->Pager = new NumericPager($store_payment_list->StartRec, $store_payment_list->DisplayRecs, $store_payment_list->TotalRecs, $store_payment_list->RecRange, $store_payment_list->AutoHidePager) ?>
<?php if ($store_payment_list->Pager->RecordCount > 0 && $store_payment_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($store_payment_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $store_payment_list->pageUrl() ?>start=<?php echo $store_payment_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($store_payment_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $store_payment_list->pageUrl() ?>start=<?php echo $store_payment_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($store_payment_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $store_payment_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($store_payment_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $store_payment_list->pageUrl() ?>start=<?php echo $store_payment_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($store_payment_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $store_payment_list->pageUrl() ?>start=<?php echo $store_payment_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($store_payment_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $store_payment_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $store_payment_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $store_payment_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($store_payment_list->TotalRecs > 0 && (!$store_payment_list->AutoHidePageSizeSelector || $store_payment_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="store_payment">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($store_payment_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($store_payment_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($store_payment_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($store_payment_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($store_payment_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($store_payment_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($store_payment->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $store_payment_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fstore_paymentlist" id="fstore_paymentlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($store_payment_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $store_payment_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="store_payment">
<div id="gmp_store_payment" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($store_payment_list->TotalRecs > 0 || $store_payment->isGridEdit()) { ?>
<table id="tbl_store_paymentlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$store_payment_list->RowType = ROWTYPE_HEADER;

// Render list options
$store_payment_list->renderListOptions();

// Render list options (header, left)
$store_payment_list->ListOptions->render("header", "left");
?>
<?php if ($store_payment->id->Visible) { // id ?>
	<?php if ($store_payment->sortUrl($store_payment->id) == "") { ?>
		<th data-name="id" class="<?php echo $store_payment->id->headerCellClass() ?>"><div id="elh_store_payment_id" class="store_payment_id"><div class="ew-table-header-caption"><?php echo $store_payment->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $store_payment->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_payment->SortUrl($store_payment->id) ?>',1);"><div id="elh_store_payment_id" class="store_payment_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_payment->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_payment->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_payment->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_payment->PAYNO->Visible) { // PAYNO ?>
	<?php if ($store_payment->sortUrl($store_payment->PAYNO) == "") { ?>
		<th data-name="PAYNO" class="<?php echo $store_payment->PAYNO->headerCellClass() ?>"><div id="elh_store_payment_PAYNO" class="store_payment_PAYNO"><div class="ew-table-header-caption"><?php echo $store_payment->PAYNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PAYNO" class="<?php echo $store_payment->PAYNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_payment->SortUrl($store_payment->PAYNO) ?>',1);"><div id="elh_store_payment_PAYNO" class="store_payment_PAYNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_payment->PAYNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_payment->PAYNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_payment->PAYNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_payment->DT->Visible) { // DT ?>
	<?php if ($store_payment->sortUrl($store_payment->DT) == "") { ?>
		<th data-name="DT" class="<?php echo $store_payment->DT->headerCellClass() ?>"><div id="elh_store_payment_DT" class="store_payment_DT"><div class="ew-table-header-caption"><?php echo $store_payment->DT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DT" class="<?php echo $store_payment->DT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_payment->SortUrl($store_payment->DT) ?>',1);"><div id="elh_store_payment_DT" class="store_payment_DT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_payment->DT->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_payment->DT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_payment->DT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_payment->YM->Visible) { // YM ?>
	<?php if ($store_payment->sortUrl($store_payment->YM) == "") { ?>
		<th data-name="YM" class="<?php echo $store_payment->YM->headerCellClass() ?>"><div id="elh_store_payment_YM" class="store_payment_YM"><div class="ew-table-header-caption"><?php echo $store_payment->YM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="YM" class="<?php echo $store_payment->YM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_payment->SortUrl($store_payment->YM) ?>',1);"><div id="elh_store_payment_YM" class="store_payment_YM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_payment->YM->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_payment->YM->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_payment->YM->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_payment->PC->Visible) { // PC ?>
	<?php if ($store_payment->sortUrl($store_payment->PC) == "") { ?>
		<th data-name="PC" class="<?php echo $store_payment->PC->headerCellClass() ?>"><div id="elh_store_payment_PC" class="store_payment_PC"><div class="ew-table-header-caption"><?php echo $store_payment->PC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PC" class="<?php echo $store_payment->PC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_payment->SortUrl($store_payment->PC) ?>',1);"><div id="elh_store_payment_PC" class="store_payment_PC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_payment->PC->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_payment->PC->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_payment->PC->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_payment->Customercode->Visible) { // Customercode ?>
	<?php if ($store_payment->sortUrl($store_payment->Customercode) == "") { ?>
		<th data-name="Customercode" class="<?php echo $store_payment->Customercode->headerCellClass() ?>"><div id="elh_store_payment_Customercode" class="store_payment_Customercode"><div class="ew-table-header-caption"><?php echo $store_payment->Customercode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Customercode" class="<?php echo $store_payment->Customercode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_payment->SortUrl($store_payment->Customercode) ?>',1);"><div id="elh_store_payment_Customercode" class="store_payment_Customercode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_payment->Customercode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_payment->Customercode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_payment->Customercode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_payment->Customername->Visible) { // Customername ?>
	<?php if ($store_payment->sortUrl($store_payment->Customername) == "") { ?>
		<th data-name="Customername" class="<?php echo $store_payment->Customername->headerCellClass() ?>"><div id="elh_store_payment_Customername" class="store_payment_Customername"><div class="ew-table-header-caption"><?php echo $store_payment->Customername->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Customername" class="<?php echo $store_payment->Customername->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_payment->SortUrl($store_payment->Customername) ?>',1);"><div id="elh_store_payment_Customername" class="store_payment_Customername">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_payment->Customername->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_payment->Customername->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_payment->Customername->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_payment->pharmacy_pocol->Visible) { // pharmacy_pocol ?>
	<?php if ($store_payment->sortUrl($store_payment->pharmacy_pocol) == "") { ?>
		<th data-name="pharmacy_pocol" class="<?php echo $store_payment->pharmacy_pocol->headerCellClass() ?>"><div id="elh_store_payment_pharmacy_pocol" class="store_payment_pharmacy_pocol"><div class="ew-table-header-caption"><?php echo $store_payment->pharmacy_pocol->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pharmacy_pocol" class="<?php echo $store_payment->pharmacy_pocol->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_payment->SortUrl($store_payment->pharmacy_pocol) ?>',1);"><div id="elh_store_payment_pharmacy_pocol" class="store_payment_pharmacy_pocol">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_payment->pharmacy_pocol->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_payment->pharmacy_pocol->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_payment->pharmacy_pocol->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_payment->State->Visible) { // State ?>
	<?php if ($store_payment->sortUrl($store_payment->State) == "") { ?>
		<th data-name="State" class="<?php echo $store_payment->State->headerCellClass() ?>"><div id="elh_store_payment_State" class="store_payment_State"><div class="ew-table-header-caption"><?php echo $store_payment->State->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="State" class="<?php echo $store_payment->State->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_payment->SortUrl($store_payment->State) ?>',1);"><div id="elh_store_payment_State" class="store_payment_State">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_payment->State->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_payment->State->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_payment->State->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_payment->Pincode->Visible) { // Pincode ?>
	<?php if ($store_payment->sortUrl($store_payment->Pincode) == "") { ?>
		<th data-name="Pincode" class="<?php echo $store_payment->Pincode->headerCellClass() ?>"><div id="elh_store_payment_Pincode" class="store_payment_Pincode"><div class="ew-table-header-caption"><?php echo $store_payment->Pincode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pincode" class="<?php echo $store_payment->Pincode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_payment->SortUrl($store_payment->Pincode) ?>',1);"><div id="elh_store_payment_Pincode" class="store_payment_Pincode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_payment->Pincode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_payment->Pincode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_payment->Pincode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_payment->Phone->Visible) { // Phone ?>
	<?php if ($store_payment->sortUrl($store_payment->Phone) == "") { ?>
		<th data-name="Phone" class="<?php echo $store_payment->Phone->headerCellClass() ?>"><div id="elh_store_payment_Phone" class="store_payment_Phone"><div class="ew-table-header-caption"><?php echo $store_payment->Phone->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Phone" class="<?php echo $store_payment->Phone->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_payment->SortUrl($store_payment->Phone) ?>',1);"><div id="elh_store_payment_Phone" class="store_payment_Phone">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_payment->Phone->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_payment->Phone->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_payment->Phone->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_payment->Fax->Visible) { // Fax ?>
	<?php if ($store_payment->sortUrl($store_payment->Fax) == "") { ?>
		<th data-name="Fax" class="<?php echo $store_payment->Fax->headerCellClass() ?>"><div id="elh_store_payment_Fax" class="store_payment_Fax"><div class="ew-table-header-caption"><?php echo $store_payment->Fax->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Fax" class="<?php echo $store_payment->Fax->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_payment->SortUrl($store_payment->Fax) ?>',1);"><div id="elh_store_payment_Fax" class="store_payment_Fax">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_payment->Fax->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_payment->Fax->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_payment->Fax->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_payment->EEmail->Visible) { // EEmail ?>
	<?php if ($store_payment->sortUrl($store_payment->EEmail) == "") { ?>
		<th data-name="EEmail" class="<?php echo $store_payment->EEmail->headerCellClass() ?>"><div id="elh_store_payment_EEmail" class="store_payment_EEmail"><div class="ew-table-header-caption"><?php echo $store_payment->EEmail->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EEmail" class="<?php echo $store_payment->EEmail->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_payment->SortUrl($store_payment->EEmail) ?>',1);"><div id="elh_store_payment_EEmail" class="store_payment_EEmail">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_payment->EEmail->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_payment->EEmail->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_payment->EEmail->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_payment->HospID->Visible) { // HospID ?>
	<?php if ($store_payment->sortUrl($store_payment->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $store_payment->HospID->headerCellClass() ?>"><div id="elh_store_payment_HospID" class="store_payment_HospID"><div class="ew-table-header-caption"><?php echo $store_payment->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $store_payment->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_payment->SortUrl($store_payment->HospID) ?>',1);"><div id="elh_store_payment_HospID" class="store_payment_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_payment->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_payment->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_payment->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_payment->createdby->Visible) { // createdby ?>
	<?php if ($store_payment->sortUrl($store_payment->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $store_payment->createdby->headerCellClass() ?>"><div id="elh_store_payment_createdby" class="store_payment_createdby"><div class="ew-table-header-caption"><?php echo $store_payment->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $store_payment->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_payment->SortUrl($store_payment->createdby) ?>',1);"><div id="elh_store_payment_createdby" class="store_payment_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_payment->createdby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_payment->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_payment->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_payment->createddatetime->Visible) { // createddatetime ?>
	<?php if ($store_payment->sortUrl($store_payment->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $store_payment->createddatetime->headerCellClass() ?>"><div id="elh_store_payment_createddatetime" class="store_payment_createddatetime"><div class="ew-table-header-caption"><?php echo $store_payment->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $store_payment->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_payment->SortUrl($store_payment->createddatetime) ?>',1);"><div id="elh_store_payment_createddatetime" class="store_payment_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_payment->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_payment->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_payment->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_payment->modifiedby->Visible) { // modifiedby ?>
	<?php if ($store_payment->sortUrl($store_payment->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $store_payment->modifiedby->headerCellClass() ?>"><div id="elh_store_payment_modifiedby" class="store_payment_modifiedby"><div class="ew-table-header-caption"><?php echo $store_payment->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $store_payment->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_payment->SortUrl($store_payment->modifiedby) ?>',1);"><div id="elh_store_payment_modifiedby" class="store_payment_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_payment->modifiedby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_payment->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_payment->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_payment->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($store_payment->sortUrl($store_payment->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $store_payment->modifieddatetime->headerCellClass() ?>"><div id="elh_store_payment_modifieddatetime" class="store_payment_modifieddatetime"><div class="ew-table-header-caption"><?php echo $store_payment->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $store_payment->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_payment->SortUrl($store_payment->modifieddatetime) ?>',1);"><div id="elh_store_payment_modifieddatetime" class="store_payment_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_payment->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_payment->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_payment->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_payment->PharmacyID->Visible) { // PharmacyID ?>
	<?php if ($store_payment->sortUrl($store_payment->PharmacyID) == "") { ?>
		<th data-name="PharmacyID" class="<?php echo $store_payment->PharmacyID->headerCellClass() ?>"><div id="elh_store_payment_PharmacyID" class="store_payment_PharmacyID"><div class="ew-table-header-caption"><?php echo $store_payment->PharmacyID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PharmacyID" class="<?php echo $store_payment->PharmacyID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_payment->SortUrl($store_payment->PharmacyID) ?>',1);"><div id="elh_store_payment_PharmacyID" class="store_payment_PharmacyID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_payment->PharmacyID->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_payment->PharmacyID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_payment->PharmacyID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_payment->BillTotalValue->Visible) { // BillTotalValue ?>
	<?php if ($store_payment->sortUrl($store_payment->BillTotalValue) == "") { ?>
		<th data-name="BillTotalValue" class="<?php echo $store_payment->BillTotalValue->headerCellClass() ?>"><div id="elh_store_payment_BillTotalValue" class="store_payment_BillTotalValue"><div class="ew-table-header-caption"><?php echo $store_payment->BillTotalValue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillTotalValue" class="<?php echo $store_payment->BillTotalValue->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_payment->SortUrl($store_payment->BillTotalValue) ?>',1);"><div id="elh_store_payment_BillTotalValue" class="store_payment_BillTotalValue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_payment->BillTotalValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_payment->BillTotalValue->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_payment->BillTotalValue->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_payment->GRNTotalValue->Visible) { // GRNTotalValue ?>
	<?php if ($store_payment->sortUrl($store_payment->GRNTotalValue) == "") { ?>
		<th data-name="GRNTotalValue" class="<?php echo $store_payment->GRNTotalValue->headerCellClass() ?>"><div id="elh_store_payment_GRNTotalValue" class="store_payment_GRNTotalValue"><div class="ew-table-header-caption"><?php echo $store_payment->GRNTotalValue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GRNTotalValue" class="<?php echo $store_payment->GRNTotalValue->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_payment->SortUrl($store_payment->GRNTotalValue) ?>',1);"><div id="elh_store_payment_GRNTotalValue" class="store_payment_GRNTotalValue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_payment->GRNTotalValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_payment->GRNTotalValue->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_payment->GRNTotalValue->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_payment->BillDiscount->Visible) { // BillDiscount ?>
	<?php if ($store_payment->sortUrl($store_payment->BillDiscount) == "") { ?>
		<th data-name="BillDiscount" class="<?php echo $store_payment->BillDiscount->headerCellClass() ?>"><div id="elh_store_payment_BillDiscount" class="store_payment_BillDiscount"><div class="ew-table-header-caption"><?php echo $store_payment->BillDiscount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillDiscount" class="<?php echo $store_payment->BillDiscount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_payment->SortUrl($store_payment->BillDiscount) ?>',1);"><div id="elh_store_payment_BillDiscount" class="store_payment_BillDiscount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_payment->BillDiscount->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_payment->BillDiscount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_payment->BillDiscount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_payment->TransPort->Visible) { // TransPort ?>
	<?php if ($store_payment->sortUrl($store_payment->TransPort) == "") { ?>
		<th data-name="TransPort" class="<?php echo $store_payment->TransPort->headerCellClass() ?>"><div id="elh_store_payment_TransPort" class="store_payment_TransPort"><div class="ew-table-header-caption"><?php echo $store_payment->TransPort->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TransPort" class="<?php echo $store_payment->TransPort->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_payment->SortUrl($store_payment->TransPort) ?>',1);"><div id="elh_store_payment_TransPort" class="store_payment_TransPort">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_payment->TransPort->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_payment->TransPort->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_payment->TransPort->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_payment->AnyOther->Visible) { // AnyOther ?>
	<?php if ($store_payment->sortUrl($store_payment->AnyOther) == "") { ?>
		<th data-name="AnyOther" class="<?php echo $store_payment->AnyOther->headerCellClass() ?>"><div id="elh_store_payment_AnyOther" class="store_payment_AnyOther"><div class="ew-table-header-caption"><?php echo $store_payment->AnyOther->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AnyOther" class="<?php echo $store_payment->AnyOther->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_payment->SortUrl($store_payment->AnyOther) ?>',1);"><div id="elh_store_payment_AnyOther" class="store_payment_AnyOther">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_payment->AnyOther->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_payment->AnyOther->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_payment->AnyOther->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_payment->voucher_type->Visible) { // voucher_type ?>
	<?php if ($store_payment->sortUrl($store_payment->voucher_type) == "") { ?>
		<th data-name="voucher_type" class="<?php echo $store_payment->voucher_type->headerCellClass() ?>"><div id="elh_store_payment_voucher_type" class="store_payment_voucher_type"><div class="ew-table-header-caption"><?php echo $store_payment->voucher_type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="voucher_type" class="<?php echo $store_payment->voucher_type->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_payment->SortUrl($store_payment->voucher_type) ?>',1);"><div id="elh_store_payment_voucher_type" class="store_payment_voucher_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_payment->voucher_type->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_payment->voucher_type->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_payment->voucher_type->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_payment->Details->Visible) { // Details ?>
	<?php if ($store_payment->sortUrl($store_payment->Details) == "") { ?>
		<th data-name="Details" class="<?php echo $store_payment->Details->headerCellClass() ?>"><div id="elh_store_payment_Details" class="store_payment_Details"><div class="ew-table-header-caption"><?php echo $store_payment->Details->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Details" class="<?php echo $store_payment->Details->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_payment->SortUrl($store_payment->Details) ?>',1);"><div id="elh_store_payment_Details" class="store_payment_Details">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_payment->Details->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_payment->Details->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_payment->Details->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_payment->ModeofPayment->Visible) { // ModeofPayment ?>
	<?php if ($store_payment->sortUrl($store_payment->ModeofPayment) == "") { ?>
		<th data-name="ModeofPayment" class="<?php echo $store_payment->ModeofPayment->headerCellClass() ?>"><div id="elh_store_payment_ModeofPayment" class="store_payment_ModeofPayment"><div class="ew-table-header-caption"><?php echo $store_payment->ModeofPayment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModeofPayment" class="<?php echo $store_payment->ModeofPayment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_payment->SortUrl($store_payment->ModeofPayment) ?>',1);"><div id="elh_store_payment_ModeofPayment" class="store_payment_ModeofPayment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_payment->ModeofPayment->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_payment->ModeofPayment->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_payment->ModeofPayment->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_payment->Amount->Visible) { // Amount ?>
	<?php if ($store_payment->sortUrl($store_payment->Amount) == "") { ?>
		<th data-name="Amount" class="<?php echo $store_payment->Amount->headerCellClass() ?>"><div id="elh_store_payment_Amount" class="store_payment_Amount"><div class="ew-table-header-caption"><?php echo $store_payment->Amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Amount" class="<?php echo $store_payment->Amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_payment->SortUrl($store_payment->Amount) ?>',1);"><div id="elh_store_payment_Amount" class="store_payment_Amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_payment->Amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_payment->Amount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_payment->Amount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_payment->BankName->Visible) { // BankName ?>
	<?php if ($store_payment->sortUrl($store_payment->BankName) == "") { ?>
		<th data-name="BankName" class="<?php echo $store_payment->BankName->headerCellClass() ?>"><div id="elh_store_payment_BankName" class="store_payment_BankName"><div class="ew-table-header-caption"><?php echo $store_payment->BankName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BankName" class="<?php echo $store_payment->BankName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_payment->SortUrl($store_payment->BankName) ?>',1);"><div id="elh_store_payment_BankName" class="store_payment_BankName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_payment->BankName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_payment->BankName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_payment->BankName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_payment->AccountNumber->Visible) { // AccountNumber ?>
	<?php if ($store_payment->sortUrl($store_payment->AccountNumber) == "") { ?>
		<th data-name="AccountNumber" class="<?php echo $store_payment->AccountNumber->headerCellClass() ?>"><div id="elh_store_payment_AccountNumber" class="store_payment_AccountNumber"><div class="ew-table-header-caption"><?php echo $store_payment->AccountNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AccountNumber" class="<?php echo $store_payment->AccountNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_payment->SortUrl($store_payment->AccountNumber) ?>',1);"><div id="elh_store_payment_AccountNumber" class="store_payment_AccountNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_payment->AccountNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_payment->AccountNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_payment->AccountNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_payment->chequeNumber->Visible) { // chequeNumber ?>
	<?php if ($store_payment->sortUrl($store_payment->chequeNumber) == "") { ?>
		<th data-name="chequeNumber" class="<?php echo $store_payment->chequeNumber->headerCellClass() ?>"><div id="elh_store_payment_chequeNumber" class="store_payment_chequeNumber"><div class="ew-table-header-caption"><?php echo $store_payment->chequeNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="chequeNumber" class="<?php echo $store_payment->chequeNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_payment->SortUrl($store_payment->chequeNumber) ?>',1);"><div id="elh_store_payment_chequeNumber" class="store_payment_chequeNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_payment->chequeNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_payment->chequeNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_payment->chequeNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_payment->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
	<?php if ($store_payment->sortUrl($store_payment->SeectPaymentMode) == "") { ?>
		<th data-name="SeectPaymentMode" class="<?php echo $store_payment->SeectPaymentMode->headerCellClass() ?>"><div id="elh_store_payment_SeectPaymentMode" class="store_payment_SeectPaymentMode"><div class="ew-table-header-caption"><?php echo $store_payment->SeectPaymentMode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SeectPaymentMode" class="<?php echo $store_payment->SeectPaymentMode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_payment->SortUrl($store_payment->SeectPaymentMode) ?>',1);"><div id="elh_store_payment_SeectPaymentMode" class="store_payment_SeectPaymentMode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_payment->SeectPaymentMode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_payment->SeectPaymentMode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_payment->SeectPaymentMode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_payment->PaidAmount->Visible) { // PaidAmount ?>
	<?php if ($store_payment->sortUrl($store_payment->PaidAmount) == "") { ?>
		<th data-name="PaidAmount" class="<?php echo $store_payment->PaidAmount->headerCellClass() ?>"><div id="elh_store_payment_PaidAmount" class="store_payment_PaidAmount"><div class="ew-table-header-caption"><?php echo $store_payment->PaidAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PaidAmount" class="<?php echo $store_payment->PaidAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_payment->SortUrl($store_payment->PaidAmount) ?>',1);"><div id="elh_store_payment_PaidAmount" class="store_payment_PaidAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_payment->PaidAmount->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_payment->PaidAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_payment->PaidAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_payment->Currency->Visible) { // Currency ?>
	<?php if ($store_payment->sortUrl($store_payment->Currency) == "") { ?>
		<th data-name="Currency" class="<?php echo $store_payment->Currency->headerCellClass() ?>"><div id="elh_store_payment_Currency" class="store_payment_Currency"><div class="ew-table-header-caption"><?php echo $store_payment->Currency->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Currency" class="<?php echo $store_payment->Currency->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_payment->SortUrl($store_payment->Currency) ?>',1);"><div id="elh_store_payment_Currency" class="store_payment_Currency">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_payment->Currency->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_payment->Currency->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_payment->Currency->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_payment->CardNumber->Visible) { // CardNumber ?>
	<?php if ($store_payment->sortUrl($store_payment->CardNumber) == "") { ?>
		<th data-name="CardNumber" class="<?php echo $store_payment->CardNumber->headerCellClass() ?>"><div id="elh_store_payment_CardNumber" class="store_payment_CardNumber"><div class="ew-table-header-caption"><?php echo $store_payment->CardNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CardNumber" class="<?php echo $store_payment->CardNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_payment->SortUrl($store_payment->CardNumber) ?>',1);"><div id="elh_store_payment_CardNumber" class="store_payment_CardNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_payment->CardNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($store_payment->CardNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_payment->CardNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_payment->BranchID->Visible) { // BranchID ?>
	<?php if ($store_payment->sortUrl($store_payment->BranchID) == "") { ?>
		<th data-name="BranchID" class="<?php echo $store_payment->BranchID->headerCellClass() ?>"><div id="elh_store_payment_BranchID" class="store_payment_BranchID"><div class="ew-table-header-caption"><?php echo $store_payment->BranchID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BranchID" class="<?php echo $store_payment->BranchID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_payment->SortUrl($store_payment->BranchID) ?>',1);"><div id="elh_store_payment_BranchID" class="store_payment_BranchID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_payment->BranchID->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_payment->BranchID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_payment->BranchID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($store_payment->StoreID->Visible) { // StoreID ?>
	<?php if ($store_payment->sortUrl($store_payment->StoreID) == "") { ?>
		<th data-name="StoreID" class="<?php echo $store_payment->StoreID->headerCellClass() ?>"><div id="elh_store_payment_StoreID" class="store_payment_StoreID"><div class="ew-table-header-caption"><?php echo $store_payment->StoreID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="StoreID" class="<?php echo $store_payment->StoreID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $store_payment->SortUrl($store_payment->StoreID) ?>',1);"><div id="elh_store_payment_StoreID" class="store_payment_StoreID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $store_payment->StoreID->caption() ?></span><span class="ew-table-header-sort"><?php if ($store_payment->StoreID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($store_payment->StoreID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$store_payment_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($store_payment->ExportAll && $store_payment->isExport()) {
	$store_payment_list->StopRec = $store_payment_list->TotalRecs;
} else {

	// Set the last record to display
	if ($store_payment_list->TotalRecs > $store_payment_list->StartRec + $store_payment_list->DisplayRecs - 1)
		$store_payment_list->StopRec = $store_payment_list->StartRec + $store_payment_list->DisplayRecs - 1;
	else
		$store_payment_list->StopRec = $store_payment_list->TotalRecs;
}
$store_payment_list->RecCnt = $store_payment_list->StartRec - 1;
if ($store_payment_list->Recordset && !$store_payment_list->Recordset->EOF) {
	$store_payment_list->Recordset->moveFirst();
	$selectLimit = $store_payment_list->UseSelectLimit;
	if (!$selectLimit && $store_payment_list->StartRec > 1)
		$store_payment_list->Recordset->move($store_payment_list->StartRec - 1);
} elseif (!$store_payment->AllowAddDeleteRow && $store_payment_list->StopRec == 0) {
	$store_payment_list->StopRec = $store_payment->GridAddRowCount;
}

// Initialize aggregate
$store_payment->RowType = ROWTYPE_AGGREGATEINIT;
$store_payment->resetAttributes();
$store_payment_list->renderRow();
while ($store_payment_list->RecCnt < $store_payment_list->StopRec) {
	$store_payment_list->RecCnt++;
	if ($store_payment_list->RecCnt >= $store_payment_list->StartRec) {
		$store_payment_list->RowCnt++;

		// Set up key count
		$store_payment_list->KeyCount = $store_payment_list->RowIndex;

		// Init row class and style
		$store_payment->resetAttributes();
		$store_payment->CssClass = "";
		if ($store_payment->isGridAdd()) {
		} else {
			$store_payment_list->loadRowValues($store_payment_list->Recordset); // Load row values
		}
		$store_payment->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$store_payment->RowAttrs = array_merge($store_payment->RowAttrs, array('data-rowindex'=>$store_payment_list->RowCnt, 'id'=>'r' . $store_payment_list->RowCnt . '_store_payment', 'data-rowtype'=>$store_payment->RowType));

		// Render row
		$store_payment_list->renderRow();

		// Render list options
		$store_payment_list->renderListOptions();
?>
	<tr<?php echo $store_payment->rowAttributes() ?>>
<?php

// Render list options (body, left)
$store_payment_list->ListOptions->render("body", "left", $store_payment_list->RowCnt);
?>
	<?php if ($store_payment->id->Visible) { // id ?>
		<td data-name="id"<?php echo $store_payment->id->cellAttributes() ?>>
<span id="el<?php echo $store_payment_list->RowCnt ?>_store_payment_id" class="store_payment_id">
<span<?php echo $store_payment->id->viewAttributes() ?>>
<?php echo $store_payment->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_payment->PAYNO->Visible) { // PAYNO ?>
		<td data-name="PAYNO"<?php echo $store_payment->PAYNO->cellAttributes() ?>>
<span id="el<?php echo $store_payment_list->RowCnt ?>_store_payment_PAYNO" class="store_payment_PAYNO">
<span<?php echo $store_payment->PAYNO->viewAttributes() ?>>
<?php echo $store_payment->PAYNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_payment->DT->Visible) { // DT ?>
		<td data-name="DT"<?php echo $store_payment->DT->cellAttributes() ?>>
<span id="el<?php echo $store_payment_list->RowCnt ?>_store_payment_DT" class="store_payment_DT">
<span<?php echo $store_payment->DT->viewAttributes() ?>>
<?php echo $store_payment->DT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_payment->YM->Visible) { // YM ?>
		<td data-name="YM"<?php echo $store_payment->YM->cellAttributes() ?>>
<span id="el<?php echo $store_payment_list->RowCnt ?>_store_payment_YM" class="store_payment_YM">
<span<?php echo $store_payment->YM->viewAttributes() ?>>
<?php echo $store_payment->YM->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_payment->PC->Visible) { // PC ?>
		<td data-name="PC"<?php echo $store_payment->PC->cellAttributes() ?>>
<span id="el<?php echo $store_payment_list->RowCnt ?>_store_payment_PC" class="store_payment_PC">
<span<?php echo $store_payment->PC->viewAttributes() ?>>
<?php echo $store_payment->PC->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_payment->Customercode->Visible) { // Customercode ?>
		<td data-name="Customercode"<?php echo $store_payment->Customercode->cellAttributes() ?>>
<span id="el<?php echo $store_payment_list->RowCnt ?>_store_payment_Customercode" class="store_payment_Customercode">
<span<?php echo $store_payment->Customercode->viewAttributes() ?>>
<?php echo $store_payment->Customercode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_payment->Customername->Visible) { // Customername ?>
		<td data-name="Customername"<?php echo $store_payment->Customername->cellAttributes() ?>>
<span id="el<?php echo $store_payment_list->RowCnt ?>_store_payment_Customername" class="store_payment_Customername">
<span<?php echo $store_payment->Customername->viewAttributes() ?>>
<?php echo $store_payment->Customername->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_payment->pharmacy_pocol->Visible) { // pharmacy_pocol ?>
		<td data-name="pharmacy_pocol"<?php echo $store_payment->pharmacy_pocol->cellAttributes() ?>>
<span id="el<?php echo $store_payment_list->RowCnt ?>_store_payment_pharmacy_pocol" class="store_payment_pharmacy_pocol">
<span<?php echo $store_payment->pharmacy_pocol->viewAttributes() ?>>
<?php echo $store_payment->pharmacy_pocol->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_payment->State->Visible) { // State ?>
		<td data-name="State"<?php echo $store_payment->State->cellAttributes() ?>>
<span id="el<?php echo $store_payment_list->RowCnt ?>_store_payment_State" class="store_payment_State">
<span<?php echo $store_payment->State->viewAttributes() ?>>
<?php echo $store_payment->State->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_payment->Pincode->Visible) { // Pincode ?>
		<td data-name="Pincode"<?php echo $store_payment->Pincode->cellAttributes() ?>>
<span id="el<?php echo $store_payment_list->RowCnt ?>_store_payment_Pincode" class="store_payment_Pincode">
<span<?php echo $store_payment->Pincode->viewAttributes() ?>>
<?php echo $store_payment->Pincode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_payment->Phone->Visible) { // Phone ?>
		<td data-name="Phone"<?php echo $store_payment->Phone->cellAttributes() ?>>
<span id="el<?php echo $store_payment_list->RowCnt ?>_store_payment_Phone" class="store_payment_Phone">
<span<?php echo $store_payment->Phone->viewAttributes() ?>>
<?php echo $store_payment->Phone->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_payment->Fax->Visible) { // Fax ?>
		<td data-name="Fax"<?php echo $store_payment->Fax->cellAttributes() ?>>
<span id="el<?php echo $store_payment_list->RowCnt ?>_store_payment_Fax" class="store_payment_Fax">
<span<?php echo $store_payment->Fax->viewAttributes() ?>>
<?php echo $store_payment->Fax->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_payment->EEmail->Visible) { // EEmail ?>
		<td data-name="EEmail"<?php echo $store_payment->EEmail->cellAttributes() ?>>
<span id="el<?php echo $store_payment_list->RowCnt ?>_store_payment_EEmail" class="store_payment_EEmail">
<span<?php echo $store_payment->EEmail->viewAttributes() ?>>
<?php echo $store_payment->EEmail->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_payment->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $store_payment->HospID->cellAttributes() ?>>
<span id="el<?php echo $store_payment_list->RowCnt ?>_store_payment_HospID" class="store_payment_HospID">
<span<?php echo $store_payment->HospID->viewAttributes() ?>>
<?php echo $store_payment->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_payment->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $store_payment->createdby->cellAttributes() ?>>
<span id="el<?php echo $store_payment_list->RowCnt ?>_store_payment_createdby" class="store_payment_createdby">
<span<?php echo $store_payment->createdby->viewAttributes() ?>>
<?php echo $store_payment->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_payment->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $store_payment->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $store_payment_list->RowCnt ?>_store_payment_createddatetime" class="store_payment_createddatetime">
<span<?php echo $store_payment->createddatetime->viewAttributes() ?>>
<?php echo $store_payment->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_payment->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $store_payment->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $store_payment_list->RowCnt ?>_store_payment_modifiedby" class="store_payment_modifiedby">
<span<?php echo $store_payment->modifiedby->viewAttributes() ?>>
<?php echo $store_payment->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_payment->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $store_payment->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $store_payment_list->RowCnt ?>_store_payment_modifieddatetime" class="store_payment_modifieddatetime">
<span<?php echo $store_payment->modifieddatetime->viewAttributes() ?>>
<?php echo $store_payment->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_payment->PharmacyID->Visible) { // PharmacyID ?>
		<td data-name="PharmacyID"<?php echo $store_payment->PharmacyID->cellAttributes() ?>>
<span id="el<?php echo $store_payment_list->RowCnt ?>_store_payment_PharmacyID" class="store_payment_PharmacyID">
<span<?php echo $store_payment->PharmacyID->viewAttributes() ?>>
<?php echo $store_payment->PharmacyID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_payment->BillTotalValue->Visible) { // BillTotalValue ?>
		<td data-name="BillTotalValue"<?php echo $store_payment->BillTotalValue->cellAttributes() ?>>
<span id="el<?php echo $store_payment_list->RowCnt ?>_store_payment_BillTotalValue" class="store_payment_BillTotalValue">
<span<?php echo $store_payment->BillTotalValue->viewAttributes() ?>>
<?php echo $store_payment->BillTotalValue->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_payment->GRNTotalValue->Visible) { // GRNTotalValue ?>
		<td data-name="GRNTotalValue"<?php echo $store_payment->GRNTotalValue->cellAttributes() ?>>
<span id="el<?php echo $store_payment_list->RowCnt ?>_store_payment_GRNTotalValue" class="store_payment_GRNTotalValue">
<span<?php echo $store_payment->GRNTotalValue->viewAttributes() ?>>
<?php echo $store_payment->GRNTotalValue->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_payment->BillDiscount->Visible) { // BillDiscount ?>
		<td data-name="BillDiscount"<?php echo $store_payment->BillDiscount->cellAttributes() ?>>
<span id="el<?php echo $store_payment_list->RowCnt ?>_store_payment_BillDiscount" class="store_payment_BillDiscount">
<span<?php echo $store_payment->BillDiscount->viewAttributes() ?>>
<?php echo $store_payment->BillDiscount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_payment->TransPort->Visible) { // TransPort ?>
		<td data-name="TransPort"<?php echo $store_payment->TransPort->cellAttributes() ?>>
<span id="el<?php echo $store_payment_list->RowCnt ?>_store_payment_TransPort" class="store_payment_TransPort">
<span<?php echo $store_payment->TransPort->viewAttributes() ?>>
<?php echo $store_payment->TransPort->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_payment->AnyOther->Visible) { // AnyOther ?>
		<td data-name="AnyOther"<?php echo $store_payment->AnyOther->cellAttributes() ?>>
<span id="el<?php echo $store_payment_list->RowCnt ?>_store_payment_AnyOther" class="store_payment_AnyOther">
<span<?php echo $store_payment->AnyOther->viewAttributes() ?>>
<?php echo $store_payment->AnyOther->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_payment->voucher_type->Visible) { // voucher_type ?>
		<td data-name="voucher_type"<?php echo $store_payment->voucher_type->cellAttributes() ?>>
<span id="el<?php echo $store_payment_list->RowCnt ?>_store_payment_voucher_type" class="store_payment_voucher_type">
<span<?php echo $store_payment->voucher_type->viewAttributes() ?>>
<?php echo $store_payment->voucher_type->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_payment->Details->Visible) { // Details ?>
		<td data-name="Details"<?php echo $store_payment->Details->cellAttributes() ?>>
<span id="el<?php echo $store_payment_list->RowCnt ?>_store_payment_Details" class="store_payment_Details">
<span<?php echo $store_payment->Details->viewAttributes() ?>>
<?php echo $store_payment->Details->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_payment->ModeofPayment->Visible) { // ModeofPayment ?>
		<td data-name="ModeofPayment"<?php echo $store_payment->ModeofPayment->cellAttributes() ?>>
<span id="el<?php echo $store_payment_list->RowCnt ?>_store_payment_ModeofPayment" class="store_payment_ModeofPayment">
<span<?php echo $store_payment->ModeofPayment->viewAttributes() ?>>
<?php echo $store_payment->ModeofPayment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_payment->Amount->Visible) { // Amount ?>
		<td data-name="Amount"<?php echo $store_payment->Amount->cellAttributes() ?>>
<span id="el<?php echo $store_payment_list->RowCnt ?>_store_payment_Amount" class="store_payment_Amount">
<span<?php echo $store_payment->Amount->viewAttributes() ?>>
<?php echo $store_payment->Amount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_payment->BankName->Visible) { // BankName ?>
		<td data-name="BankName"<?php echo $store_payment->BankName->cellAttributes() ?>>
<span id="el<?php echo $store_payment_list->RowCnt ?>_store_payment_BankName" class="store_payment_BankName">
<span<?php echo $store_payment->BankName->viewAttributes() ?>>
<?php echo $store_payment->BankName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_payment->AccountNumber->Visible) { // AccountNumber ?>
		<td data-name="AccountNumber"<?php echo $store_payment->AccountNumber->cellAttributes() ?>>
<span id="el<?php echo $store_payment_list->RowCnt ?>_store_payment_AccountNumber" class="store_payment_AccountNumber">
<span<?php echo $store_payment->AccountNumber->viewAttributes() ?>>
<?php echo $store_payment->AccountNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_payment->chequeNumber->Visible) { // chequeNumber ?>
		<td data-name="chequeNumber"<?php echo $store_payment->chequeNumber->cellAttributes() ?>>
<span id="el<?php echo $store_payment_list->RowCnt ?>_store_payment_chequeNumber" class="store_payment_chequeNumber">
<span<?php echo $store_payment->chequeNumber->viewAttributes() ?>>
<?php echo $store_payment->chequeNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_payment->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
		<td data-name="SeectPaymentMode"<?php echo $store_payment->SeectPaymentMode->cellAttributes() ?>>
<span id="el<?php echo $store_payment_list->RowCnt ?>_store_payment_SeectPaymentMode" class="store_payment_SeectPaymentMode">
<span<?php echo $store_payment->SeectPaymentMode->viewAttributes() ?>>
<?php echo $store_payment->SeectPaymentMode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_payment->PaidAmount->Visible) { // PaidAmount ?>
		<td data-name="PaidAmount"<?php echo $store_payment->PaidAmount->cellAttributes() ?>>
<span id="el<?php echo $store_payment_list->RowCnt ?>_store_payment_PaidAmount" class="store_payment_PaidAmount">
<span<?php echo $store_payment->PaidAmount->viewAttributes() ?>>
<?php echo $store_payment->PaidAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_payment->Currency->Visible) { // Currency ?>
		<td data-name="Currency"<?php echo $store_payment->Currency->cellAttributes() ?>>
<span id="el<?php echo $store_payment_list->RowCnt ?>_store_payment_Currency" class="store_payment_Currency">
<span<?php echo $store_payment->Currency->viewAttributes() ?>>
<?php echo $store_payment->Currency->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_payment->CardNumber->Visible) { // CardNumber ?>
		<td data-name="CardNumber"<?php echo $store_payment->CardNumber->cellAttributes() ?>>
<span id="el<?php echo $store_payment_list->RowCnt ?>_store_payment_CardNumber" class="store_payment_CardNumber">
<span<?php echo $store_payment->CardNumber->viewAttributes() ?>>
<?php echo $store_payment->CardNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_payment->BranchID->Visible) { // BranchID ?>
		<td data-name="BranchID"<?php echo $store_payment->BranchID->cellAttributes() ?>>
<span id="el<?php echo $store_payment_list->RowCnt ?>_store_payment_BranchID" class="store_payment_BranchID">
<span<?php echo $store_payment->BranchID->viewAttributes() ?>>
<?php echo $store_payment->BranchID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($store_payment->StoreID->Visible) { // StoreID ?>
		<td data-name="StoreID"<?php echo $store_payment->StoreID->cellAttributes() ?>>
<span id="el<?php echo $store_payment_list->RowCnt ?>_store_payment_StoreID" class="store_payment_StoreID">
<span<?php echo $store_payment->StoreID->viewAttributes() ?>>
<?php echo $store_payment->StoreID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$store_payment_list->ListOptions->render("body", "right", $store_payment_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$store_payment->isGridAdd())
		$store_payment_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$store_payment->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($store_payment_list->Recordset)
	$store_payment_list->Recordset->Close();
?>
<?php if (!$store_payment->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$store_payment->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($store_payment_list->Pager)) $store_payment_list->Pager = new NumericPager($store_payment_list->StartRec, $store_payment_list->DisplayRecs, $store_payment_list->TotalRecs, $store_payment_list->RecRange, $store_payment_list->AutoHidePager) ?>
<?php if ($store_payment_list->Pager->RecordCount > 0 && $store_payment_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($store_payment_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $store_payment_list->pageUrl() ?>start=<?php echo $store_payment_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($store_payment_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $store_payment_list->pageUrl() ?>start=<?php echo $store_payment_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($store_payment_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $store_payment_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($store_payment_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $store_payment_list->pageUrl() ?>start=<?php echo $store_payment_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($store_payment_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $store_payment_list->pageUrl() ?>start=<?php echo $store_payment_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($store_payment_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $store_payment_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $store_payment_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $store_payment_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($store_payment_list->TotalRecs > 0 && (!$store_payment_list->AutoHidePageSizeSelector || $store_payment_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="store_payment">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($store_payment_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($store_payment_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($store_payment_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($store_payment_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($store_payment_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($store_payment_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($store_payment->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $store_payment_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($store_payment_list->TotalRecs == 0 && !$store_payment->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $store_payment_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$store_payment_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$store_payment->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$store_payment->isExport()) { ?>
<script>
ew.scrollableTable("gmp_store_payment", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$store_payment_list->terminate();
?>