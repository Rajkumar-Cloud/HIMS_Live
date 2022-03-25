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
$pharmacy_payment_list = new pharmacy_payment_list();

// Run the page
$pharmacy_payment_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_payment_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$pharmacy_payment->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fpharmacy_paymentlist = currentForm = new ew.Form("fpharmacy_paymentlist", "list");
fpharmacy_paymentlist.formKeyCountName = '<?php echo $pharmacy_payment_list->FormKeyCountName ?>';

// Form_CustomValidate event
fpharmacy_paymentlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_paymentlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpharmacy_paymentlist.lists["x_Customername"] = <?php echo $pharmacy_payment_list->Customername->Lookup->toClientList() ?>;
fpharmacy_paymentlist.lists["x_Customername"].options = <?php echo JsonEncode($pharmacy_payment_list->Customername->lookupOptions()) ?>;
fpharmacy_paymentlist.lists["x_pharmacy_pocol"] = <?php echo $pharmacy_payment_list->pharmacy_pocol->Lookup->toClientList() ?>;
fpharmacy_paymentlist.lists["x_pharmacy_pocol"].options = <?php echo JsonEncode($pharmacy_payment_list->pharmacy_pocol->lookupOptions()) ?>;
fpharmacy_paymentlist.lists["x_ModeofPayment"] = <?php echo $pharmacy_payment_list->ModeofPayment->Lookup->toClientList() ?>;
fpharmacy_paymentlist.lists["x_ModeofPayment"].options = <?php echo JsonEncode($pharmacy_payment_list->ModeofPayment->lookupOptions()) ?>;

// Form object for search
var fpharmacy_paymentlistsrch = currentSearchForm = new ew.Form("fpharmacy_paymentlistsrch");

// Filters
fpharmacy_paymentlistsrch.filterList = <?php echo $pharmacy_payment_list->getFilterList() ?>;
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
<?php if (!$pharmacy_payment->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($pharmacy_payment_list->TotalRecs > 0 && $pharmacy_payment_list->ExportOptions->visible()) { ?>
<?php $pharmacy_payment_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_payment_list->ImportOptions->visible()) { ?>
<?php $pharmacy_payment_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_payment_list->SearchOptions->visible()) { ?>
<?php $pharmacy_payment_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_payment_list->FilterOptions->visible()) { ?>
<?php $pharmacy_payment_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$pharmacy_payment_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$pharmacy_payment->isExport() && !$pharmacy_payment->CurrentAction) { ?>
<form name="fpharmacy_paymentlistsrch" id="fpharmacy_paymentlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($pharmacy_payment_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fpharmacy_paymentlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pharmacy_payment">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($pharmacy_payment_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($pharmacy_payment_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $pharmacy_payment_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($pharmacy_payment_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_payment_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_payment_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_payment_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $pharmacy_payment_list->showPageHeader(); ?>
<?php
$pharmacy_payment_list->showMessage();
?>
<?php if ($pharmacy_payment_list->TotalRecs > 0 || $pharmacy_payment->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pharmacy_payment_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pharmacy_payment">
<?php if (!$pharmacy_payment->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$pharmacy_payment->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($pharmacy_payment_list->Pager)) $pharmacy_payment_list->Pager = new NumericPager($pharmacy_payment_list->StartRec, $pharmacy_payment_list->DisplayRecs, $pharmacy_payment_list->TotalRecs, $pharmacy_payment_list->RecRange, $pharmacy_payment_list->AutoHidePager) ?>
<?php if ($pharmacy_payment_list->Pager->RecordCount > 0 && $pharmacy_payment_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($pharmacy_payment_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_payment_list->pageUrl() ?>start=<?php echo $pharmacy_payment_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_payment_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_payment_list->pageUrl() ?>start=<?php echo $pharmacy_payment_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($pharmacy_payment_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $pharmacy_payment_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_payment_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_payment_list->pageUrl() ?>start=<?php echo $pharmacy_payment_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_payment_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_payment_list->pageUrl() ?>start=<?php echo $pharmacy_payment_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($pharmacy_payment_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $pharmacy_payment_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $pharmacy_payment_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $pharmacy_payment_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($pharmacy_payment_list->TotalRecs > 0 && (!$pharmacy_payment_list->AutoHidePageSizeSelector || $pharmacy_payment_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="pharmacy_payment">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($pharmacy_payment_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($pharmacy_payment_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($pharmacy_payment_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($pharmacy_payment_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($pharmacy_payment_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($pharmacy_payment_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($pharmacy_payment->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_payment_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpharmacy_paymentlist" id="fpharmacy_paymentlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_payment_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_payment_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_payment">
<div id="gmp_pharmacy_payment" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($pharmacy_payment_list->TotalRecs > 0 || $pharmacy_payment->isGridEdit()) { ?>
<table id="tbl_pharmacy_paymentlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pharmacy_payment_list->RowType = ROWTYPE_HEADER;

// Render list options
$pharmacy_payment_list->renderListOptions();

// Render list options (header, left)
$pharmacy_payment_list->ListOptions->render("header", "left");
?>
<?php if ($pharmacy_payment->id->Visible) { // id ?>
	<?php if ($pharmacy_payment->sortUrl($pharmacy_payment->id) == "") { ?>
		<th data-name="id" class="<?php echo $pharmacy_payment->id->headerCellClass() ?>"><div id="elh_pharmacy_payment_id" class="pharmacy_payment_id"><div class="ew-table-header-caption"><?php echo $pharmacy_payment->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $pharmacy_payment->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_payment->SortUrl($pharmacy_payment->id) ?>',1);"><div id="elh_pharmacy_payment_id" class="pharmacy_payment_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_payment->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_payment->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_payment->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_payment->PAYNO->Visible) { // PAYNO ?>
	<?php if ($pharmacy_payment->sortUrl($pharmacy_payment->PAYNO) == "") { ?>
		<th data-name="PAYNO" class="<?php echo $pharmacy_payment->PAYNO->headerCellClass() ?>"><div id="elh_pharmacy_payment_PAYNO" class="pharmacy_payment_PAYNO"><div class="ew-table-header-caption"><?php echo $pharmacy_payment->PAYNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PAYNO" class="<?php echo $pharmacy_payment->PAYNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_payment->SortUrl($pharmacy_payment->PAYNO) ?>',1);"><div id="elh_pharmacy_payment_PAYNO" class="pharmacy_payment_PAYNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_payment->PAYNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_payment->PAYNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_payment->PAYNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_payment->DT->Visible) { // DT ?>
	<?php if ($pharmacy_payment->sortUrl($pharmacy_payment->DT) == "") { ?>
		<th data-name="DT" class="<?php echo $pharmacy_payment->DT->headerCellClass() ?>"><div id="elh_pharmacy_payment_DT" class="pharmacy_payment_DT"><div class="ew-table-header-caption"><?php echo $pharmacy_payment->DT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DT" class="<?php echo $pharmacy_payment->DT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_payment->SortUrl($pharmacy_payment->DT) ?>',1);"><div id="elh_pharmacy_payment_DT" class="pharmacy_payment_DT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_payment->DT->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_payment->DT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_payment->DT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_payment->YM->Visible) { // YM ?>
	<?php if ($pharmacy_payment->sortUrl($pharmacy_payment->YM) == "") { ?>
		<th data-name="YM" class="<?php echo $pharmacy_payment->YM->headerCellClass() ?>"><div id="elh_pharmacy_payment_YM" class="pharmacy_payment_YM"><div class="ew-table-header-caption"><?php echo $pharmacy_payment->YM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="YM" class="<?php echo $pharmacy_payment->YM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_payment->SortUrl($pharmacy_payment->YM) ?>',1);"><div id="elh_pharmacy_payment_YM" class="pharmacy_payment_YM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_payment->YM->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_payment->YM->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_payment->YM->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_payment->PC->Visible) { // PC ?>
	<?php if ($pharmacy_payment->sortUrl($pharmacy_payment->PC) == "") { ?>
		<th data-name="PC" class="<?php echo $pharmacy_payment->PC->headerCellClass() ?>"><div id="elh_pharmacy_payment_PC" class="pharmacy_payment_PC"><div class="ew-table-header-caption"><?php echo $pharmacy_payment->PC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PC" class="<?php echo $pharmacy_payment->PC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_payment->SortUrl($pharmacy_payment->PC) ?>',1);"><div id="elh_pharmacy_payment_PC" class="pharmacy_payment_PC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_payment->PC->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_payment->PC->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_payment->PC->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_payment->Customercode->Visible) { // Customercode ?>
	<?php if ($pharmacy_payment->sortUrl($pharmacy_payment->Customercode) == "") { ?>
		<th data-name="Customercode" class="<?php echo $pharmacy_payment->Customercode->headerCellClass() ?>"><div id="elh_pharmacy_payment_Customercode" class="pharmacy_payment_Customercode"><div class="ew-table-header-caption"><?php echo $pharmacy_payment->Customercode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Customercode" class="<?php echo $pharmacy_payment->Customercode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_payment->SortUrl($pharmacy_payment->Customercode) ?>',1);"><div id="elh_pharmacy_payment_Customercode" class="pharmacy_payment_Customercode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_payment->Customercode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_payment->Customercode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_payment->Customercode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_payment->Customername->Visible) { // Customername ?>
	<?php if ($pharmacy_payment->sortUrl($pharmacy_payment->Customername) == "") { ?>
		<th data-name="Customername" class="<?php echo $pharmacy_payment->Customername->headerCellClass() ?>"><div id="elh_pharmacy_payment_Customername" class="pharmacy_payment_Customername"><div class="ew-table-header-caption"><?php echo $pharmacy_payment->Customername->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Customername" class="<?php echo $pharmacy_payment->Customername->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_payment->SortUrl($pharmacy_payment->Customername) ?>',1);"><div id="elh_pharmacy_payment_Customername" class="pharmacy_payment_Customername">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_payment->Customername->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_payment->Customername->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_payment->Customername->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_payment->pharmacy_pocol->Visible) { // pharmacy_pocol ?>
	<?php if ($pharmacy_payment->sortUrl($pharmacy_payment->pharmacy_pocol) == "") { ?>
		<th data-name="pharmacy_pocol" class="<?php echo $pharmacy_payment->pharmacy_pocol->headerCellClass() ?>"><div id="elh_pharmacy_payment_pharmacy_pocol" class="pharmacy_payment_pharmacy_pocol"><div class="ew-table-header-caption"><?php echo $pharmacy_payment->pharmacy_pocol->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pharmacy_pocol" class="<?php echo $pharmacy_payment->pharmacy_pocol->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_payment->SortUrl($pharmacy_payment->pharmacy_pocol) ?>',1);"><div id="elh_pharmacy_payment_pharmacy_pocol" class="pharmacy_payment_pharmacy_pocol">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_payment->pharmacy_pocol->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_payment->pharmacy_pocol->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_payment->pharmacy_pocol->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_payment->State->Visible) { // State ?>
	<?php if ($pharmacy_payment->sortUrl($pharmacy_payment->State) == "") { ?>
		<th data-name="State" class="<?php echo $pharmacy_payment->State->headerCellClass() ?>"><div id="elh_pharmacy_payment_State" class="pharmacy_payment_State"><div class="ew-table-header-caption"><?php echo $pharmacy_payment->State->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="State" class="<?php echo $pharmacy_payment->State->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_payment->SortUrl($pharmacy_payment->State) ?>',1);"><div id="elh_pharmacy_payment_State" class="pharmacy_payment_State">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_payment->State->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_payment->State->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_payment->State->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_payment->Pincode->Visible) { // Pincode ?>
	<?php if ($pharmacy_payment->sortUrl($pharmacy_payment->Pincode) == "") { ?>
		<th data-name="Pincode" class="<?php echo $pharmacy_payment->Pincode->headerCellClass() ?>"><div id="elh_pharmacy_payment_Pincode" class="pharmacy_payment_Pincode"><div class="ew-table-header-caption"><?php echo $pharmacy_payment->Pincode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pincode" class="<?php echo $pharmacy_payment->Pincode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_payment->SortUrl($pharmacy_payment->Pincode) ?>',1);"><div id="elh_pharmacy_payment_Pincode" class="pharmacy_payment_Pincode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_payment->Pincode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_payment->Pincode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_payment->Pincode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_payment->Phone->Visible) { // Phone ?>
	<?php if ($pharmacy_payment->sortUrl($pharmacy_payment->Phone) == "") { ?>
		<th data-name="Phone" class="<?php echo $pharmacy_payment->Phone->headerCellClass() ?>"><div id="elh_pharmacy_payment_Phone" class="pharmacy_payment_Phone"><div class="ew-table-header-caption"><?php echo $pharmacy_payment->Phone->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Phone" class="<?php echo $pharmacy_payment->Phone->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_payment->SortUrl($pharmacy_payment->Phone) ?>',1);"><div id="elh_pharmacy_payment_Phone" class="pharmacy_payment_Phone">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_payment->Phone->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_payment->Phone->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_payment->Phone->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_payment->Fax->Visible) { // Fax ?>
	<?php if ($pharmacy_payment->sortUrl($pharmacy_payment->Fax) == "") { ?>
		<th data-name="Fax" class="<?php echo $pharmacy_payment->Fax->headerCellClass() ?>"><div id="elh_pharmacy_payment_Fax" class="pharmacy_payment_Fax"><div class="ew-table-header-caption"><?php echo $pharmacy_payment->Fax->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Fax" class="<?php echo $pharmacy_payment->Fax->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_payment->SortUrl($pharmacy_payment->Fax) ?>',1);"><div id="elh_pharmacy_payment_Fax" class="pharmacy_payment_Fax">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_payment->Fax->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_payment->Fax->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_payment->Fax->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_payment->EEmail->Visible) { // EEmail ?>
	<?php if ($pharmacy_payment->sortUrl($pharmacy_payment->EEmail) == "") { ?>
		<th data-name="EEmail" class="<?php echo $pharmacy_payment->EEmail->headerCellClass() ?>"><div id="elh_pharmacy_payment_EEmail" class="pharmacy_payment_EEmail"><div class="ew-table-header-caption"><?php echo $pharmacy_payment->EEmail->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EEmail" class="<?php echo $pharmacy_payment->EEmail->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_payment->SortUrl($pharmacy_payment->EEmail) ?>',1);"><div id="elh_pharmacy_payment_EEmail" class="pharmacy_payment_EEmail">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_payment->EEmail->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_payment->EEmail->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_payment->EEmail->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_payment->HospID->Visible) { // HospID ?>
	<?php if ($pharmacy_payment->sortUrl($pharmacy_payment->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $pharmacy_payment->HospID->headerCellClass() ?>"><div id="elh_pharmacy_payment_HospID" class="pharmacy_payment_HospID"><div class="ew-table-header-caption"><?php echo $pharmacy_payment->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $pharmacy_payment->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_payment->SortUrl($pharmacy_payment->HospID) ?>',1);"><div id="elh_pharmacy_payment_HospID" class="pharmacy_payment_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_payment->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_payment->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_payment->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_payment->createdby->Visible) { // createdby ?>
	<?php if ($pharmacy_payment->sortUrl($pharmacy_payment->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $pharmacy_payment->createdby->headerCellClass() ?>"><div id="elh_pharmacy_payment_createdby" class="pharmacy_payment_createdby"><div class="ew-table-header-caption"><?php echo $pharmacy_payment->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $pharmacy_payment->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_payment->SortUrl($pharmacy_payment->createdby) ?>',1);"><div id="elh_pharmacy_payment_createdby" class="pharmacy_payment_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_payment->createdby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_payment->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_payment->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_payment->createddatetime->Visible) { // createddatetime ?>
	<?php if ($pharmacy_payment->sortUrl($pharmacy_payment->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $pharmacy_payment->createddatetime->headerCellClass() ?>"><div id="elh_pharmacy_payment_createddatetime" class="pharmacy_payment_createddatetime"><div class="ew-table-header-caption"><?php echo $pharmacy_payment->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $pharmacy_payment->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_payment->SortUrl($pharmacy_payment->createddatetime) ?>',1);"><div id="elh_pharmacy_payment_createddatetime" class="pharmacy_payment_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_payment->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_payment->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_payment->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_payment->modifiedby->Visible) { // modifiedby ?>
	<?php if ($pharmacy_payment->sortUrl($pharmacy_payment->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $pharmacy_payment->modifiedby->headerCellClass() ?>"><div id="elh_pharmacy_payment_modifiedby" class="pharmacy_payment_modifiedby"><div class="ew-table-header-caption"><?php echo $pharmacy_payment->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $pharmacy_payment->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_payment->SortUrl($pharmacy_payment->modifiedby) ?>',1);"><div id="elh_pharmacy_payment_modifiedby" class="pharmacy_payment_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_payment->modifiedby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_payment->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_payment->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_payment->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($pharmacy_payment->sortUrl($pharmacy_payment->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $pharmacy_payment->modifieddatetime->headerCellClass() ?>"><div id="elh_pharmacy_payment_modifieddatetime" class="pharmacy_payment_modifieddatetime"><div class="ew-table-header-caption"><?php echo $pharmacy_payment->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $pharmacy_payment->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_payment->SortUrl($pharmacy_payment->modifieddatetime) ?>',1);"><div id="elh_pharmacy_payment_modifieddatetime" class="pharmacy_payment_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_payment->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_payment->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_payment->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_payment->PharmacyID->Visible) { // PharmacyID ?>
	<?php if ($pharmacy_payment->sortUrl($pharmacy_payment->PharmacyID) == "") { ?>
		<th data-name="PharmacyID" class="<?php echo $pharmacy_payment->PharmacyID->headerCellClass() ?>"><div id="elh_pharmacy_payment_PharmacyID" class="pharmacy_payment_PharmacyID"><div class="ew-table-header-caption"><?php echo $pharmacy_payment->PharmacyID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PharmacyID" class="<?php echo $pharmacy_payment->PharmacyID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_payment->SortUrl($pharmacy_payment->PharmacyID) ?>',1);"><div id="elh_pharmacy_payment_PharmacyID" class="pharmacy_payment_PharmacyID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_payment->PharmacyID->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_payment->PharmacyID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_payment->PharmacyID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_payment->BillTotalValue->Visible) { // BillTotalValue ?>
	<?php if ($pharmacy_payment->sortUrl($pharmacy_payment->BillTotalValue) == "") { ?>
		<th data-name="BillTotalValue" class="<?php echo $pharmacy_payment->BillTotalValue->headerCellClass() ?>"><div id="elh_pharmacy_payment_BillTotalValue" class="pharmacy_payment_BillTotalValue"><div class="ew-table-header-caption"><?php echo $pharmacy_payment->BillTotalValue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillTotalValue" class="<?php echo $pharmacy_payment->BillTotalValue->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_payment->SortUrl($pharmacy_payment->BillTotalValue) ?>',1);"><div id="elh_pharmacy_payment_BillTotalValue" class="pharmacy_payment_BillTotalValue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_payment->BillTotalValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_payment->BillTotalValue->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_payment->BillTotalValue->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_payment->GRNTotalValue->Visible) { // GRNTotalValue ?>
	<?php if ($pharmacy_payment->sortUrl($pharmacy_payment->GRNTotalValue) == "") { ?>
		<th data-name="GRNTotalValue" class="<?php echo $pharmacy_payment->GRNTotalValue->headerCellClass() ?>"><div id="elh_pharmacy_payment_GRNTotalValue" class="pharmacy_payment_GRNTotalValue"><div class="ew-table-header-caption"><?php echo $pharmacy_payment->GRNTotalValue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GRNTotalValue" class="<?php echo $pharmacy_payment->GRNTotalValue->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_payment->SortUrl($pharmacy_payment->GRNTotalValue) ?>',1);"><div id="elh_pharmacy_payment_GRNTotalValue" class="pharmacy_payment_GRNTotalValue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_payment->GRNTotalValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_payment->GRNTotalValue->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_payment->GRNTotalValue->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_payment->BillDiscount->Visible) { // BillDiscount ?>
	<?php if ($pharmacy_payment->sortUrl($pharmacy_payment->BillDiscount) == "") { ?>
		<th data-name="BillDiscount" class="<?php echo $pharmacy_payment->BillDiscount->headerCellClass() ?>"><div id="elh_pharmacy_payment_BillDiscount" class="pharmacy_payment_BillDiscount"><div class="ew-table-header-caption"><?php echo $pharmacy_payment->BillDiscount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillDiscount" class="<?php echo $pharmacy_payment->BillDiscount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_payment->SortUrl($pharmacy_payment->BillDiscount) ?>',1);"><div id="elh_pharmacy_payment_BillDiscount" class="pharmacy_payment_BillDiscount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_payment->BillDiscount->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_payment->BillDiscount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_payment->BillDiscount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_payment->TransPort->Visible) { // TransPort ?>
	<?php if ($pharmacy_payment->sortUrl($pharmacy_payment->TransPort) == "") { ?>
		<th data-name="TransPort" class="<?php echo $pharmacy_payment->TransPort->headerCellClass() ?>"><div id="elh_pharmacy_payment_TransPort" class="pharmacy_payment_TransPort"><div class="ew-table-header-caption"><?php echo $pharmacy_payment->TransPort->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TransPort" class="<?php echo $pharmacy_payment->TransPort->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_payment->SortUrl($pharmacy_payment->TransPort) ?>',1);"><div id="elh_pharmacy_payment_TransPort" class="pharmacy_payment_TransPort">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_payment->TransPort->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_payment->TransPort->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_payment->TransPort->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_payment->AnyOther->Visible) { // AnyOther ?>
	<?php if ($pharmacy_payment->sortUrl($pharmacy_payment->AnyOther) == "") { ?>
		<th data-name="AnyOther" class="<?php echo $pharmacy_payment->AnyOther->headerCellClass() ?>"><div id="elh_pharmacy_payment_AnyOther" class="pharmacy_payment_AnyOther"><div class="ew-table-header-caption"><?php echo $pharmacy_payment->AnyOther->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AnyOther" class="<?php echo $pharmacy_payment->AnyOther->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_payment->SortUrl($pharmacy_payment->AnyOther) ?>',1);"><div id="elh_pharmacy_payment_AnyOther" class="pharmacy_payment_AnyOther">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_payment->AnyOther->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_payment->AnyOther->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_payment->AnyOther->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_payment->voucher_type->Visible) { // voucher_type ?>
	<?php if ($pharmacy_payment->sortUrl($pharmacy_payment->voucher_type) == "") { ?>
		<th data-name="voucher_type" class="<?php echo $pharmacy_payment->voucher_type->headerCellClass() ?>"><div id="elh_pharmacy_payment_voucher_type" class="pharmacy_payment_voucher_type"><div class="ew-table-header-caption"><?php echo $pharmacy_payment->voucher_type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="voucher_type" class="<?php echo $pharmacy_payment->voucher_type->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_payment->SortUrl($pharmacy_payment->voucher_type) ?>',1);"><div id="elh_pharmacy_payment_voucher_type" class="pharmacy_payment_voucher_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_payment->voucher_type->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_payment->voucher_type->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_payment->voucher_type->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_payment->Details->Visible) { // Details ?>
	<?php if ($pharmacy_payment->sortUrl($pharmacy_payment->Details) == "") { ?>
		<th data-name="Details" class="<?php echo $pharmacy_payment->Details->headerCellClass() ?>"><div id="elh_pharmacy_payment_Details" class="pharmacy_payment_Details"><div class="ew-table-header-caption"><?php echo $pharmacy_payment->Details->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Details" class="<?php echo $pharmacy_payment->Details->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_payment->SortUrl($pharmacy_payment->Details) ?>',1);"><div id="elh_pharmacy_payment_Details" class="pharmacy_payment_Details">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_payment->Details->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_payment->Details->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_payment->Details->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_payment->ModeofPayment->Visible) { // ModeofPayment ?>
	<?php if ($pharmacy_payment->sortUrl($pharmacy_payment->ModeofPayment) == "") { ?>
		<th data-name="ModeofPayment" class="<?php echo $pharmacy_payment->ModeofPayment->headerCellClass() ?>"><div id="elh_pharmacy_payment_ModeofPayment" class="pharmacy_payment_ModeofPayment"><div class="ew-table-header-caption"><?php echo $pharmacy_payment->ModeofPayment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModeofPayment" class="<?php echo $pharmacy_payment->ModeofPayment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_payment->SortUrl($pharmacy_payment->ModeofPayment) ?>',1);"><div id="elh_pharmacy_payment_ModeofPayment" class="pharmacy_payment_ModeofPayment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_payment->ModeofPayment->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_payment->ModeofPayment->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_payment->ModeofPayment->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_payment->Amount->Visible) { // Amount ?>
	<?php if ($pharmacy_payment->sortUrl($pharmacy_payment->Amount) == "") { ?>
		<th data-name="Amount" class="<?php echo $pharmacy_payment->Amount->headerCellClass() ?>"><div id="elh_pharmacy_payment_Amount" class="pharmacy_payment_Amount"><div class="ew-table-header-caption"><?php echo $pharmacy_payment->Amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Amount" class="<?php echo $pharmacy_payment->Amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_payment->SortUrl($pharmacy_payment->Amount) ?>',1);"><div id="elh_pharmacy_payment_Amount" class="pharmacy_payment_Amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_payment->Amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_payment->Amount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_payment->Amount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_payment->BankName->Visible) { // BankName ?>
	<?php if ($pharmacy_payment->sortUrl($pharmacy_payment->BankName) == "") { ?>
		<th data-name="BankName" class="<?php echo $pharmacy_payment->BankName->headerCellClass() ?>"><div id="elh_pharmacy_payment_BankName" class="pharmacy_payment_BankName"><div class="ew-table-header-caption"><?php echo $pharmacy_payment->BankName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BankName" class="<?php echo $pharmacy_payment->BankName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_payment->SortUrl($pharmacy_payment->BankName) ?>',1);"><div id="elh_pharmacy_payment_BankName" class="pharmacy_payment_BankName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_payment->BankName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_payment->BankName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_payment->BankName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_payment->AccountNumber->Visible) { // AccountNumber ?>
	<?php if ($pharmacy_payment->sortUrl($pharmacy_payment->AccountNumber) == "") { ?>
		<th data-name="AccountNumber" class="<?php echo $pharmacy_payment->AccountNumber->headerCellClass() ?>"><div id="elh_pharmacy_payment_AccountNumber" class="pharmacy_payment_AccountNumber"><div class="ew-table-header-caption"><?php echo $pharmacy_payment->AccountNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AccountNumber" class="<?php echo $pharmacy_payment->AccountNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_payment->SortUrl($pharmacy_payment->AccountNumber) ?>',1);"><div id="elh_pharmacy_payment_AccountNumber" class="pharmacy_payment_AccountNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_payment->AccountNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_payment->AccountNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_payment->AccountNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_payment->chequeNumber->Visible) { // chequeNumber ?>
	<?php if ($pharmacy_payment->sortUrl($pharmacy_payment->chequeNumber) == "") { ?>
		<th data-name="chequeNumber" class="<?php echo $pharmacy_payment->chequeNumber->headerCellClass() ?>"><div id="elh_pharmacy_payment_chequeNumber" class="pharmacy_payment_chequeNumber"><div class="ew-table-header-caption"><?php echo $pharmacy_payment->chequeNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="chequeNumber" class="<?php echo $pharmacy_payment->chequeNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_payment->SortUrl($pharmacy_payment->chequeNumber) ?>',1);"><div id="elh_pharmacy_payment_chequeNumber" class="pharmacy_payment_chequeNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_payment->chequeNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_payment->chequeNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_payment->chequeNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_payment->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
	<?php if ($pharmacy_payment->sortUrl($pharmacy_payment->SeectPaymentMode) == "") { ?>
		<th data-name="SeectPaymentMode" class="<?php echo $pharmacy_payment->SeectPaymentMode->headerCellClass() ?>"><div id="elh_pharmacy_payment_SeectPaymentMode" class="pharmacy_payment_SeectPaymentMode"><div class="ew-table-header-caption"><?php echo $pharmacy_payment->SeectPaymentMode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SeectPaymentMode" class="<?php echo $pharmacy_payment->SeectPaymentMode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_payment->SortUrl($pharmacy_payment->SeectPaymentMode) ?>',1);"><div id="elh_pharmacy_payment_SeectPaymentMode" class="pharmacy_payment_SeectPaymentMode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_payment->SeectPaymentMode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_payment->SeectPaymentMode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_payment->SeectPaymentMode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_payment->PaidAmount->Visible) { // PaidAmount ?>
	<?php if ($pharmacy_payment->sortUrl($pharmacy_payment->PaidAmount) == "") { ?>
		<th data-name="PaidAmount" class="<?php echo $pharmacy_payment->PaidAmount->headerCellClass() ?>"><div id="elh_pharmacy_payment_PaidAmount" class="pharmacy_payment_PaidAmount"><div class="ew-table-header-caption"><?php echo $pharmacy_payment->PaidAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PaidAmount" class="<?php echo $pharmacy_payment->PaidAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_payment->SortUrl($pharmacy_payment->PaidAmount) ?>',1);"><div id="elh_pharmacy_payment_PaidAmount" class="pharmacy_payment_PaidAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_payment->PaidAmount->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_payment->PaidAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_payment->PaidAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_payment->Currency->Visible) { // Currency ?>
	<?php if ($pharmacy_payment->sortUrl($pharmacy_payment->Currency) == "") { ?>
		<th data-name="Currency" class="<?php echo $pharmacy_payment->Currency->headerCellClass() ?>"><div id="elh_pharmacy_payment_Currency" class="pharmacy_payment_Currency"><div class="ew-table-header-caption"><?php echo $pharmacy_payment->Currency->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Currency" class="<?php echo $pharmacy_payment->Currency->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_payment->SortUrl($pharmacy_payment->Currency) ?>',1);"><div id="elh_pharmacy_payment_Currency" class="pharmacy_payment_Currency">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_payment->Currency->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_payment->Currency->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_payment->Currency->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_payment->CardNumber->Visible) { // CardNumber ?>
	<?php if ($pharmacy_payment->sortUrl($pharmacy_payment->CardNumber) == "") { ?>
		<th data-name="CardNumber" class="<?php echo $pharmacy_payment->CardNumber->headerCellClass() ?>"><div id="elh_pharmacy_payment_CardNumber" class="pharmacy_payment_CardNumber"><div class="ew-table-header-caption"><?php echo $pharmacy_payment->CardNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CardNumber" class="<?php echo $pharmacy_payment->CardNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_payment->SortUrl($pharmacy_payment->CardNumber) ?>',1);"><div id="elh_pharmacy_payment_CardNumber" class="pharmacy_payment_CardNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_payment->CardNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_payment->CardNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_payment->CardNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pharmacy_payment_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($pharmacy_payment->ExportAll && $pharmacy_payment->isExport()) {
	$pharmacy_payment_list->StopRec = $pharmacy_payment_list->TotalRecs;
} else {

	// Set the last record to display
	if ($pharmacy_payment_list->TotalRecs > $pharmacy_payment_list->StartRec + $pharmacy_payment_list->DisplayRecs - 1)
		$pharmacy_payment_list->StopRec = $pharmacy_payment_list->StartRec + $pharmacy_payment_list->DisplayRecs - 1;
	else
		$pharmacy_payment_list->StopRec = $pharmacy_payment_list->TotalRecs;
}
$pharmacy_payment_list->RecCnt = $pharmacy_payment_list->StartRec - 1;
if ($pharmacy_payment_list->Recordset && !$pharmacy_payment_list->Recordset->EOF) {
	$pharmacy_payment_list->Recordset->moveFirst();
	$selectLimit = $pharmacy_payment_list->UseSelectLimit;
	if (!$selectLimit && $pharmacy_payment_list->StartRec > 1)
		$pharmacy_payment_list->Recordset->move($pharmacy_payment_list->StartRec - 1);
} elseif (!$pharmacy_payment->AllowAddDeleteRow && $pharmacy_payment_list->StopRec == 0) {
	$pharmacy_payment_list->StopRec = $pharmacy_payment->GridAddRowCount;
}

// Initialize aggregate
$pharmacy_payment->RowType = ROWTYPE_AGGREGATEINIT;
$pharmacy_payment->resetAttributes();
$pharmacy_payment_list->renderRow();
while ($pharmacy_payment_list->RecCnt < $pharmacy_payment_list->StopRec) {
	$pharmacy_payment_list->RecCnt++;
	if ($pharmacy_payment_list->RecCnt >= $pharmacy_payment_list->StartRec) {
		$pharmacy_payment_list->RowCnt++;

		// Set up key count
		$pharmacy_payment_list->KeyCount = $pharmacy_payment_list->RowIndex;

		// Init row class and style
		$pharmacy_payment->resetAttributes();
		$pharmacy_payment->CssClass = "";
		if ($pharmacy_payment->isGridAdd()) {
		} else {
			$pharmacy_payment_list->loadRowValues($pharmacy_payment_list->Recordset); // Load row values
		}
		$pharmacy_payment->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$pharmacy_payment->RowAttrs = array_merge($pharmacy_payment->RowAttrs, array('data-rowindex'=>$pharmacy_payment_list->RowCnt, 'id'=>'r' . $pharmacy_payment_list->RowCnt . '_pharmacy_payment', 'data-rowtype'=>$pharmacy_payment->RowType));

		// Render row
		$pharmacy_payment_list->renderRow();

		// Render list options
		$pharmacy_payment_list->renderListOptions();
?>
	<tr<?php echo $pharmacy_payment->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_payment_list->ListOptions->render("body", "left", $pharmacy_payment_list->RowCnt);
?>
	<?php if ($pharmacy_payment->id->Visible) { // id ?>
		<td data-name="id"<?php echo $pharmacy_payment->id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_list->RowCnt ?>_pharmacy_payment_id" class="pharmacy_payment_id">
<span<?php echo $pharmacy_payment->id->viewAttributes() ?>>
<?php echo $pharmacy_payment->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_payment->PAYNO->Visible) { // PAYNO ?>
		<td data-name="PAYNO"<?php echo $pharmacy_payment->PAYNO->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_list->RowCnt ?>_pharmacy_payment_PAYNO" class="pharmacy_payment_PAYNO">
<span<?php echo $pharmacy_payment->PAYNO->viewAttributes() ?>>
<?php echo $pharmacy_payment->PAYNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_payment->DT->Visible) { // DT ?>
		<td data-name="DT"<?php echo $pharmacy_payment->DT->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_list->RowCnt ?>_pharmacy_payment_DT" class="pharmacy_payment_DT">
<span<?php echo $pharmacy_payment->DT->viewAttributes() ?>>
<?php echo $pharmacy_payment->DT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_payment->YM->Visible) { // YM ?>
		<td data-name="YM"<?php echo $pharmacy_payment->YM->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_list->RowCnt ?>_pharmacy_payment_YM" class="pharmacy_payment_YM">
<span<?php echo $pharmacy_payment->YM->viewAttributes() ?>>
<?php echo $pharmacy_payment->YM->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_payment->PC->Visible) { // PC ?>
		<td data-name="PC"<?php echo $pharmacy_payment->PC->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_list->RowCnt ?>_pharmacy_payment_PC" class="pharmacy_payment_PC">
<span<?php echo $pharmacy_payment->PC->viewAttributes() ?>>
<?php echo $pharmacy_payment->PC->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_payment->Customercode->Visible) { // Customercode ?>
		<td data-name="Customercode"<?php echo $pharmacy_payment->Customercode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_list->RowCnt ?>_pharmacy_payment_Customercode" class="pharmacy_payment_Customercode">
<span<?php echo $pharmacy_payment->Customercode->viewAttributes() ?>>
<?php echo $pharmacy_payment->Customercode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_payment->Customername->Visible) { // Customername ?>
		<td data-name="Customername"<?php echo $pharmacy_payment->Customername->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_list->RowCnt ?>_pharmacy_payment_Customername" class="pharmacy_payment_Customername">
<span<?php echo $pharmacy_payment->Customername->viewAttributes() ?>>
<?php echo $pharmacy_payment->Customername->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_payment->pharmacy_pocol->Visible) { // pharmacy_pocol ?>
		<td data-name="pharmacy_pocol"<?php echo $pharmacy_payment->pharmacy_pocol->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_list->RowCnt ?>_pharmacy_payment_pharmacy_pocol" class="pharmacy_payment_pharmacy_pocol">
<span<?php echo $pharmacy_payment->pharmacy_pocol->viewAttributes() ?>>
<?php echo $pharmacy_payment->pharmacy_pocol->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_payment->State->Visible) { // State ?>
		<td data-name="State"<?php echo $pharmacy_payment->State->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_list->RowCnt ?>_pharmacy_payment_State" class="pharmacy_payment_State">
<span<?php echo $pharmacy_payment->State->viewAttributes() ?>>
<?php echo $pharmacy_payment->State->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_payment->Pincode->Visible) { // Pincode ?>
		<td data-name="Pincode"<?php echo $pharmacy_payment->Pincode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_list->RowCnt ?>_pharmacy_payment_Pincode" class="pharmacy_payment_Pincode">
<span<?php echo $pharmacy_payment->Pincode->viewAttributes() ?>>
<?php echo $pharmacy_payment->Pincode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_payment->Phone->Visible) { // Phone ?>
		<td data-name="Phone"<?php echo $pharmacy_payment->Phone->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_list->RowCnt ?>_pharmacy_payment_Phone" class="pharmacy_payment_Phone">
<span<?php echo $pharmacy_payment->Phone->viewAttributes() ?>>
<?php echo $pharmacy_payment->Phone->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_payment->Fax->Visible) { // Fax ?>
		<td data-name="Fax"<?php echo $pharmacy_payment->Fax->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_list->RowCnt ?>_pharmacy_payment_Fax" class="pharmacy_payment_Fax">
<span<?php echo $pharmacy_payment->Fax->viewAttributes() ?>>
<?php echo $pharmacy_payment->Fax->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_payment->EEmail->Visible) { // EEmail ?>
		<td data-name="EEmail"<?php echo $pharmacy_payment->EEmail->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_list->RowCnt ?>_pharmacy_payment_EEmail" class="pharmacy_payment_EEmail">
<span<?php echo $pharmacy_payment->EEmail->viewAttributes() ?>>
<?php echo $pharmacy_payment->EEmail->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_payment->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $pharmacy_payment->HospID->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_list->RowCnt ?>_pharmacy_payment_HospID" class="pharmacy_payment_HospID">
<span<?php echo $pharmacy_payment->HospID->viewAttributes() ?>>
<?php echo $pharmacy_payment->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_payment->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $pharmacy_payment->createdby->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_list->RowCnt ?>_pharmacy_payment_createdby" class="pharmacy_payment_createdby">
<span<?php echo $pharmacy_payment->createdby->viewAttributes() ?>>
<?php echo $pharmacy_payment->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_payment->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $pharmacy_payment->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_list->RowCnt ?>_pharmacy_payment_createddatetime" class="pharmacy_payment_createddatetime">
<span<?php echo $pharmacy_payment->createddatetime->viewAttributes() ?>>
<?php echo $pharmacy_payment->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_payment->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $pharmacy_payment->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_list->RowCnt ?>_pharmacy_payment_modifiedby" class="pharmacy_payment_modifiedby">
<span<?php echo $pharmacy_payment->modifiedby->viewAttributes() ?>>
<?php echo $pharmacy_payment->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_payment->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $pharmacy_payment->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_list->RowCnt ?>_pharmacy_payment_modifieddatetime" class="pharmacy_payment_modifieddatetime">
<span<?php echo $pharmacy_payment->modifieddatetime->viewAttributes() ?>>
<?php echo $pharmacy_payment->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_payment->PharmacyID->Visible) { // PharmacyID ?>
		<td data-name="PharmacyID"<?php echo $pharmacy_payment->PharmacyID->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_list->RowCnt ?>_pharmacy_payment_PharmacyID" class="pharmacy_payment_PharmacyID">
<span<?php echo $pharmacy_payment->PharmacyID->viewAttributes() ?>>
<?php echo $pharmacy_payment->PharmacyID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_payment->BillTotalValue->Visible) { // BillTotalValue ?>
		<td data-name="BillTotalValue"<?php echo $pharmacy_payment->BillTotalValue->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_list->RowCnt ?>_pharmacy_payment_BillTotalValue" class="pharmacy_payment_BillTotalValue">
<span<?php echo $pharmacy_payment->BillTotalValue->viewAttributes() ?>>
<?php echo $pharmacy_payment->BillTotalValue->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_payment->GRNTotalValue->Visible) { // GRNTotalValue ?>
		<td data-name="GRNTotalValue"<?php echo $pharmacy_payment->GRNTotalValue->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_list->RowCnt ?>_pharmacy_payment_GRNTotalValue" class="pharmacy_payment_GRNTotalValue">
<span<?php echo $pharmacy_payment->GRNTotalValue->viewAttributes() ?>>
<?php echo $pharmacy_payment->GRNTotalValue->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_payment->BillDiscount->Visible) { // BillDiscount ?>
		<td data-name="BillDiscount"<?php echo $pharmacy_payment->BillDiscount->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_list->RowCnt ?>_pharmacy_payment_BillDiscount" class="pharmacy_payment_BillDiscount">
<span<?php echo $pharmacy_payment->BillDiscount->viewAttributes() ?>>
<?php echo $pharmacy_payment->BillDiscount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_payment->TransPort->Visible) { // TransPort ?>
		<td data-name="TransPort"<?php echo $pharmacy_payment->TransPort->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_list->RowCnt ?>_pharmacy_payment_TransPort" class="pharmacy_payment_TransPort">
<span<?php echo $pharmacy_payment->TransPort->viewAttributes() ?>>
<?php echo $pharmacy_payment->TransPort->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_payment->AnyOther->Visible) { // AnyOther ?>
		<td data-name="AnyOther"<?php echo $pharmacy_payment->AnyOther->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_list->RowCnt ?>_pharmacy_payment_AnyOther" class="pharmacy_payment_AnyOther">
<span<?php echo $pharmacy_payment->AnyOther->viewAttributes() ?>>
<?php echo $pharmacy_payment->AnyOther->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_payment->voucher_type->Visible) { // voucher_type ?>
		<td data-name="voucher_type"<?php echo $pharmacy_payment->voucher_type->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_list->RowCnt ?>_pharmacy_payment_voucher_type" class="pharmacy_payment_voucher_type">
<span<?php echo $pharmacy_payment->voucher_type->viewAttributes() ?>>
<?php echo $pharmacy_payment->voucher_type->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_payment->Details->Visible) { // Details ?>
		<td data-name="Details"<?php echo $pharmacy_payment->Details->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_list->RowCnt ?>_pharmacy_payment_Details" class="pharmacy_payment_Details">
<span<?php echo $pharmacy_payment->Details->viewAttributes() ?>>
<?php echo $pharmacy_payment->Details->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_payment->ModeofPayment->Visible) { // ModeofPayment ?>
		<td data-name="ModeofPayment"<?php echo $pharmacy_payment->ModeofPayment->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_list->RowCnt ?>_pharmacy_payment_ModeofPayment" class="pharmacy_payment_ModeofPayment">
<span<?php echo $pharmacy_payment->ModeofPayment->viewAttributes() ?>>
<?php echo $pharmacy_payment->ModeofPayment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_payment->Amount->Visible) { // Amount ?>
		<td data-name="Amount"<?php echo $pharmacy_payment->Amount->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_list->RowCnt ?>_pharmacy_payment_Amount" class="pharmacy_payment_Amount">
<span<?php echo $pharmacy_payment->Amount->viewAttributes() ?>>
<?php echo $pharmacy_payment->Amount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_payment->BankName->Visible) { // BankName ?>
		<td data-name="BankName"<?php echo $pharmacy_payment->BankName->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_list->RowCnt ?>_pharmacy_payment_BankName" class="pharmacy_payment_BankName">
<span<?php echo $pharmacy_payment->BankName->viewAttributes() ?>>
<?php echo $pharmacy_payment->BankName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_payment->AccountNumber->Visible) { // AccountNumber ?>
		<td data-name="AccountNumber"<?php echo $pharmacy_payment->AccountNumber->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_list->RowCnt ?>_pharmacy_payment_AccountNumber" class="pharmacy_payment_AccountNumber">
<span<?php echo $pharmacy_payment->AccountNumber->viewAttributes() ?>>
<?php echo $pharmacy_payment->AccountNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_payment->chequeNumber->Visible) { // chequeNumber ?>
		<td data-name="chequeNumber"<?php echo $pharmacy_payment->chequeNumber->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_list->RowCnt ?>_pharmacy_payment_chequeNumber" class="pharmacy_payment_chequeNumber">
<span<?php echo $pharmacy_payment->chequeNumber->viewAttributes() ?>>
<?php echo $pharmacy_payment->chequeNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_payment->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
		<td data-name="SeectPaymentMode"<?php echo $pharmacy_payment->SeectPaymentMode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_list->RowCnt ?>_pharmacy_payment_SeectPaymentMode" class="pharmacy_payment_SeectPaymentMode">
<span<?php echo $pharmacy_payment->SeectPaymentMode->viewAttributes() ?>>
<?php echo $pharmacy_payment->SeectPaymentMode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_payment->PaidAmount->Visible) { // PaidAmount ?>
		<td data-name="PaidAmount"<?php echo $pharmacy_payment->PaidAmount->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_list->RowCnt ?>_pharmacy_payment_PaidAmount" class="pharmacy_payment_PaidAmount">
<span<?php echo $pharmacy_payment->PaidAmount->viewAttributes() ?>>
<?php echo $pharmacy_payment->PaidAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_payment->Currency->Visible) { // Currency ?>
		<td data-name="Currency"<?php echo $pharmacy_payment->Currency->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_list->RowCnt ?>_pharmacy_payment_Currency" class="pharmacy_payment_Currency">
<span<?php echo $pharmacy_payment->Currency->viewAttributes() ?>>
<?php echo $pharmacy_payment->Currency->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_payment->CardNumber->Visible) { // CardNumber ?>
		<td data-name="CardNumber"<?php echo $pharmacy_payment->CardNumber->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_payment_list->RowCnt ?>_pharmacy_payment_CardNumber" class="pharmacy_payment_CardNumber">
<span<?php echo $pharmacy_payment->CardNumber->viewAttributes() ?>>
<?php echo $pharmacy_payment->CardNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_payment_list->ListOptions->render("body", "right", $pharmacy_payment_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$pharmacy_payment->isGridAdd())
		$pharmacy_payment_list->Recordset->moveNext();
}
?>
</tbody>
<?php

// Render aggregate row
$pharmacy_payment->RowType = ROWTYPE_AGGREGATE;
$pharmacy_payment->resetAttributes();
$pharmacy_payment_list->renderRow();
?>
<?php if ($pharmacy_payment_list->TotalRecs > 0 && !$pharmacy_payment->isGridAdd() && !$pharmacy_payment->isGridEdit()) { ?>
<tfoot><!-- Table footer -->
	<tr class="ew-table-footer">
<?php

// Render list options
$pharmacy_payment_list->renderListOptions();

// Render list options (footer, left)
$pharmacy_payment_list->ListOptions->render("footer", "left");
?>
	<?php if ($pharmacy_payment->id->Visible) { // id ?>
		<td data-name="id" class="<?php echo $pharmacy_payment->id->footerCellClass() ?>"><span id="elf_pharmacy_payment_id" class="pharmacy_payment_id">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_payment->PAYNO->Visible) { // PAYNO ?>
		<td data-name="PAYNO" class="<?php echo $pharmacy_payment->PAYNO->footerCellClass() ?>"><span id="elf_pharmacy_payment_PAYNO" class="pharmacy_payment_PAYNO">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_payment->DT->Visible) { // DT ?>
		<td data-name="DT" class="<?php echo $pharmacy_payment->DT->footerCellClass() ?>"><span id="elf_pharmacy_payment_DT" class="pharmacy_payment_DT">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_payment->YM->Visible) { // YM ?>
		<td data-name="YM" class="<?php echo $pharmacy_payment->YM->footerCellClass() ?>"><span id="elf_pharmacy_payment_YM" class="pharmacy_payment_YM">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_payment->PC->Visible) { // PC ?>
		<td data-name="PC" class="<?php echo $pharmacy_payment->PC->footerCellClass() ?>"><span id="elf_pharmacy_payment_PC" class="pharmacy_payment_PC">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_payment->Customercode->Visible) { // Customercode ?>
		<td data-name="Customercode" class="<?php echo $pharmacy_payment->Customercode->footerCellClass() ?>"><span id="elf_pharmacy_payment_Customercode" class="pharmacy_payment_Customercode">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_payment->Customername->Visible) { // Customername ?>
		<td data-name="Customername" class="<?php echo $pharmacy_payment->Customername->footerCellClass() ?>"><span id="elf_pharmacy_payment_Customername" class="pharmacy_payment_Customername">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_payment->pharmacy_pocol->Visible) { // pharmacy_pocol ?>
		<td data-name="pharmacy_pocol" class="<?php echo $pharmacy_payment->pharmacy_pocol->footerCellClass() ?>"><span id="elf_pharmacy_payment_pharmacy_pocol" class="pharmacy_payment_pharmacy_pocol">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_payment->State->Visible) { // State ?>
		<td data-name="State" class="<?php echo $pharmacy_payment->State->footerCellClass() ?>"><span id="elf_pharmacy_payment_State" class="pharmacy_payment_State">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_payment->Pincode->Visible) { // Pincode ?>
		<td data-name="Pincode" class="<?php echo $pharmacy_payment->Pincode->footerCellClass() ?>"><span id="elf_pharmacy_payment_Pincode" class="pharmacy_payment_Pincode">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_payment->Phone->Visible) { // Phone ?>
		<td data-name="Phone" class="<?php echo $pharmacy_payment->Phone->footerCellClass() ?>"><span id="elf_pharmacy_payment_Phone" class="pharmacy_payment_Phone">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_payment->Fax->Visible) { // Fax ?>
		<td data-name="Fax" class="<?php echo $pharmacy_payment->Fax->footerCellClass() ?>"><span id="elf_pharmacy_payment_Fax" class="pharmacy_payment_Fax">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_payment->EEmail->Visible) { // EEmail ?>
		<td data-name="EEmail" class="<?php echo $pharmacy_payment->EEmail->footerCellClass() ?>"><span id="elf_pharmacy_payment_EEmail" class="pharmacy_payment_EEmail">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_payment->HospID->Visible) { // HospID ?>
		<td data-name="HospID" class="<?php echo $pharmacy_payment->HospID->footerCellClass() ?>"><span id="elf_pharmacy_payment_HospID" class="pharmacy_payment_HospID">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_payment->createdby->Visible) { // createdby ?>
		<td data-name="createdby" class="<?php echo $pharmacy_payment->createdby->footerCellClass() ?>"><span id="elf_pharmacy_payment_createdby" class="pharmacy_payment_createdby">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_payment->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" class="<?php echo $pharmacy_payment->createddatetime->footerCellClass() ?>"><span id="elf_pharmacy_payment_createddatetime" class="pharmacy_payment_createddatetime">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_payment->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby" class="<?php echo $pharmacy_payment->modifiedby->footerCellClass() ?>"><span id="elf_pharmacy_payment_modifiedby" class="pharmacy_payment_modifiedby">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_payment->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime" class="<?php echo $pharmacy_payment->modifieddatetime->footerCellClass() ?>"><span id="elf_pharmacy_payment_modifieddatetime" class="pharmacy_payment_modifieddatetime">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_payment->PharmacyID->Visible) { // PharmacyID ?>
		<td data-name="PharmacyID" class="<?php echo $pharmacy_payment->PharmacyID->footerCellClass() ?>"><span id="elf_pharmacy_payment_PharmacyID" class="pharmacy_payment_PharmacyID">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_payment->BillTotalValue->Visible) { // BillTotalValue ?>
		<td data-name="BillTotalValue" class="<?php echo $pharmacy_payment->BillTotalValue->footerCellClass() ?>"><span id="elf_pharmacy_payment_BillTotalValue" class="pharmacy_payment_BillTotalValue">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_payment->GRNTotalValue->Visible) { // GRNTotalValue ?>
		<td data-name="GRNTotalValue" class="<?php echo $pharmacy_payment->GRNTotalValue->footerCellClass() ?>"><span id="elf_pharmacy_payment_GRNTotalValue" class="pharmacy_payment_GRNTotalValue">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_payment->BillDiscount->Visible) { // BillDiscount ?>
		<td data-name="BillDiscount" class="<?php echo $pharmacy_payment->BillDiscount->footerCellClass() ?>"><span id="elf_pharmacy_payment_BillDiscount" class="pharmacy_payment_BillDiscount">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_payment->TransPort->Visible) { // TransPort ?>
		<td data-name="TransPort" class="<?php echo $pharmacy_payment->TransPort->footerCellClass() ?>"><span id="elf_pharmacy_payment_TransPort" class="pharmacy_payment_TransPort">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_payment->AnyOther->Visible) { // AnyOther ?>
		<td data-name="AnyOther" class="<?php echo $pharmacy_payment->AnyOther->footerCellClass() ?>"><span id="elf_pharmacy_payment_AnyOther" class="pharmacy_payment_AnyOther">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_payment->voucher_type->Visible) { // voucher_type ?>
		<td data-name="voucher_type" class="<?php echo $pharmacy_payment->voucher_type->footerCellClass() ?>"><span id="elf_pharmacy_payment_voucher_type" class="pharmacy_payment_voucher_type">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_payment->Details->Visible) { // Details ?>
		<td data-name="Details" class="<?php echo $pharmacy_payment->Details->footerCellClass() ?>"><span id="elf_pharmacy_payment_Details" class="pharmacy_payment_Details">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_payment->ModeofPayment->Visible) { // ModeofPayment ?>
		<td data-name="ModeofPayment" class="<?php echo $pharmacy_payment->ModeofPayment->footerCellClass() ?>"><span id="elf_pharmacy_payment_ModeofPayment" class="pharmacy_payment_ModeofPayment">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_payment->Amount->Visible) { // Amount ?>
		<td data-name="Amount" class="<?php echo $pharmacy_payment->Amount->footerCellClass() ?>"><span id="elf_pharmacy_payment_Amount" class="pharmacy_payment_Amount">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $pharmacy_payment->Amount->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_payment->BankName->Visible) { // BankName ?>
		<td data-name="BankName" class="<?php echo $pharmacy_payment->BankName->footerCellClass() ?>"><span id="elf_pharmacy_payment_BankName" class="pharmacy_payment_BankName">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_payment->AccountNumber->Visible) { // AccountNumber ?>
		<td data-name="AccountNumber" class="<?php echo $pharmacy_payment->AccountNumber->footerCellClass() ?>"><span id="elf_pharmacy_payment_AccountNumber" class="pharmacy_payment_AccountNumber">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_payment->chequeNumber->Visible) { // chequeNumber ?>
		<td data-name="chequeNumber" class="<?php echo $pharmacy_payment->chequeNumber->footerCellClass() ?>"><span id="elf_pharmacy_payment_chequeNumber" class="pharmacy_payment_chequeNumber">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_payment->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
		<td data-name="SeectPaymentMode" class="<?php echo $pharmacy_payment->SeectPaymentMode->footerCellClass() ?>"><span id="elf_pharmacy_payment_SeectPaymentMode" class="pharmacy_payment_SeectPaymentMode">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_payment->PaidAmount->Visible) { // PaidAmount ?>
		<td data-name="PaidAmount" class="<?php echo $pharmacy_payment->PaidAmount->footerCellClass() ?>"><span id="elf_pharmacy_payment_PaidAmount" class="pharmacy_payment_PaidAmount">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_payment->Currency->Visible) { // Currency ?>
		<td data-name="Currency" class="<?php echo $pharmacy_payment->Currency->footerCellClass() ?>"><span id="elf_pharmacy_payment_Currency" class="pharmacy_payment_Currency">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($pharmacy_payment->CardNumber->Visible) { // CardNumber ?>
		<td data-name="CardNumber" class="<?php echo $pharmacy_payment->CardNumber->footerCellClass() ?>"><span id="elf_pharmacy_payment_CardNumber" class="pharmacy_payment_CardNumber">
		&nbsp;
		</span></td>
	<?php } ?>
<?php

// Render list options (footer, right)
$pharmacy_payment_list->ListOptions->render("footer", "right");
?>
	</tr>
</tfoot>
<?php } ?>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$pharmacy_payment->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pharmacy_payment_list->Recordset)
	$pharmacy_payment_list->Recordset->Close();
?>
<?php if (!$pharmacy_payment->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$pharmacy_payment->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($pharmacy_payment_list->Pager)) $pharmacy_payment_list->Pager = new NumericPager($pharmacy_payment_list->StartRec, $pharmacy_payment_list->DisplayRecs, $pharmacy_payment_list->TotalRecs, $pharmacy_payment_list->RecRange, $pharmacy_payment_list->AutoHidePager) ?>
<?php if ($pharmacy_payment_list->Pager->RecordCount > 0 && $pharmacy_payment_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($pharmacy_payment_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_payment_list->pageUrl() ?>start=<?php echo $pharmacy_payment_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_payment_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_payment_list->pageUrl() ?>start=<?php echo $pharmacy_payment_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($pharmacy_payment_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $pharmacy_payment_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_payment_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_payment_list->pageUrl() ?>start=<?php echo $pharmacy_payment_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_payment_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_payment_list->pageUrl() ?>start=<?php echo $pharmacy_payment_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($pharmacy_payment_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $pharmacy_payment_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $pharmacy_payment_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $pharmacy_payment_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($pharmacy_payment_list->TotalRecs > 0 && (!$pharmacy_payment_list->AutoHidePageSizeSelector || $pharmacy_payment_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="pharmacy_payment">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($pharmacy_payment_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($pharmacy_payment_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($pharmacy_payment_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($pharmacy_payment_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($pharmacy_payment_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($pharmacy_payment_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($pharmacy_payment->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_payment_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pharmacy_payment_list->TotalRecs == 0 && !$pharmacy_payment->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pharmacy_payment_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$pharmacy_payment_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_payment->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$pharmacy_payment->isExport()) { ?>
<script>
ew.scrollableTable("gmp_pharmacy_payment", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$pharmacy_payment_list->terminate();
?>