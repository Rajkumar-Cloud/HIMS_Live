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
$pharmacy_po_list = new pharmacy_po_list();

// Run the page
$pharmacy_po_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_po_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$pharmacy_po->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fpharmacy_polist = currentForm = new ew.Form("fpharmacy_polist", "list");
fpharmacy_polist.formKeyCountName = '<?php echo $pharmacy_po_list->FormKeyCountName ?>';

// Form_CustomValidate event
fpharmacy_polist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_polist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpharmacy_polist.lists["x_PC"] = <?php echo $pharmacy_po_list->PC->Lookup->toClientList() ?>;
fpharmacy_polist.lists["x_PC"].options = <?php echo JsonEncode($pharmacy_po_list->PC->lookupOptions()) ?>;
fpharmacy_polist.lists["x_BRCODE"] = <?php echo $pharmacy_po_list->BRCODE->Lookup->toClientList() ?>;
fpharmacy_polist.lists["x_BRCODE"].options = <?php echo JsonEncode($pharmacy_po_list->BRCODE->lookupOptions()) ?>;

// Form object for search
var fpharmacy_polistsrch = currentSearchForm = new ew.Form("fpharmacy_polistsrch");

// Filters
fpharmacy_polistsrch.filterList = <?php echo $pharmacy_po_list->getFilterList() ?>;
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
<?php if (!$pharmacy_po->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($pharmacy_po_list->TotalRecs > 0 && $pharmacy_po_list->ExportOptions->visible()) { ?>
<?php $pharmacy_po_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_po_list->ImportOptions->visible()) { ?>
<?php $pharmacy_po_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_po_list->SearchOptions->visible()) { ?>
<?php $pharmacy_po_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_po_list->FilterOptions->visible()) { ?>
<?php $pharmacy_po_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$pharmacy_po_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$pharmacy_po->isExport() && !$pharmacy_po->CurrentAction) { ?>
<form name="fpharmacy_polistsrch" id="fpharmacy_polistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($pharmacy_po_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fpharmacy_polistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pharmacy_po">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($pharmacy_po_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($pharmacy_po_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $pharmacy_po_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($pharmacy_po_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_po_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_po_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_po_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $pharmacy_po_list->showPageHeader(); ?>
<?php
$pharmacy_po_list->showMessage();
?>
<?php if ($pharmacy_po_list->TotalRecs > 0 || $pharmacy_po->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pharmacy_po_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pharmacy_po">
<?php if (!$pharmacy_po->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$pharmacy_po->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($pharmacy_po_list->Pager)) $pharmacy_po_list->Pager = new NumericPager($pharmacy_po_list->StartRec, $pharmacy_po_list->DisplayRecs, $pharmacy_po_list->TotalRecs, $pharmacy_po_list->RecRange, $pharmacy_po_list->AutoHidePager) ?>
<?php if ($pharmacy_po_list->Pager->RecordCount > 0 && $pharmacy_po_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($pharmacy_po_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_po_list->pageUrl() ?>start=<?php echo $pharmacy_po_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_po_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_po_list->pageUrl() ?>start=<?php echo $pharmacy_po_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($pharmacy_po_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $pharmacy_po_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_po_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_po_list->pageUrl() ?>start=<?php echo $pharmacy_po_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_po_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_po_list->pageUrl() ?>start=<?php echo $pharmacy_po_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($pharmacy_po_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $pharmacy_po_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $pharmacy_po_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $pharmacy_po_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($pharmacy_po_list->TotalRecs > 0 && (!$pharmacy_po_list->AutoHidePageSizeSelector || $pharmacy_po_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="pharmacy_po">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($pharmacy_po_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($pharmacy_po_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($pharmacy_po_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($pharmacy_po_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($pharmacy_po_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($pharmacy_po_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($pharmacy_po->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_po_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpharmacy_polist" id="fpharmacy_polist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_po_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_po_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_po">
<div id="gmp_pharmacy_po" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($pharmacy_po_list->TotalRecs > 0 || $pharmacy_po->isGridEdit()) { ?>
<table id="tbl_pharmacy_polist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pharmacy_po_list->RowType = ROWTYPE_HEADER;

// Render list options
$pharmacy_po_list->renderListOptions();

// Render list options (header, left)
$pharmacy_po_list->ListOptions->render("header", "left");
?>
<?php if ($pharmacy_po->id->Visible) { // id ?>
	<?php if ($pharmacy_po->sortUrl($pharmacy_po->id) == "") { ?>
		<th data-name="id" class="<?php echo $pharmacy_po->id->headerCellClass() ?>"><div id="elh_pharmacy_po_id" class="pharmacy_po_id"><div class="ew-table-header-caption"><?php echo $pharmacy_po->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $pharmacy_po->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_po->SortUrl($pharmacy_po->id) ?>',1);"><div id="elh_pharmacy_po_id" class="pharmacy_po_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_po->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_po->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_po->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_po->ORDNO->Visible) { // ORDNO ?>
	<?php if ($pharmacy_po->sortUrl($pharmacy_po->ORDNO) == "") { ?>
		<th data-name="ORDNO" class="<?php echo $pharmacy_po->ORDNO->headerCellClass() ?>"><div id="elh_pharmacy_po_ORDNO" class="pharmacy_po_ORDNO"><div class="ew-table-header-caption"><?php echo $pharmacy_po->ORDNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ORDNO" class="<?php echo $pharmacy_po->ORDNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_po->SortUrl($pharmacy_po->ORDNO) ?>',1);"><div id="elh_pharmacy_po_ORDNO" class="pharmacy_po_ORDNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_po->ORDNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_po->ORDNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_po->ORDNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_po->DT->Visible) { // DT ?>
	<?php if ($pharmacy_po->sortUrl($pharmacy_po->DT) == "") { ?>
		<th data-name="DT" class="<?php echo $pharmacy_po->DT->headerCellClass() ?>"><div id="elh_pharmacy_po_DT" class="pharmacy_po_DT"><div class="ew-table-header-caption"><?php echo $pharmacy_po->DT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DT" class="<?php echo $pharmacy_po->DT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_po->SortUrl($pharmacy_po->DT) ?>',1);"><div id="elh_pharmacy_po_DT" class="pharmacy_po_DT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_po->DT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_po->DT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_po->DT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_po->YM->Visible) { // YM ?>
	<?php if ($pharmacy_po->sortUrl($pharmacy_po->YM) == "") { ?>
		<th data-name="YM" class="<?php echo $pharmacy_po->YM->headerCellClass() ?>"><div id="elh_pharmacy_po_YM" class="pharmacy_po_YM"><div class="ew-table-header-caption"><?php echo $pharmacy_po->YM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="YM" class="<?php echo $pharmacy_po->YM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_po->SortUrl($pharmacy_po->YM) ?>',1);"><div id="elh_pharmacy_po_YM" class="pharmacy_po_YM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_po->YM->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_po->YM->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_po->YM->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_po->PC->Visible) { // PC ?>
	<?php if ($pharmacy_po->sortUrl($pharmacy_po->PC) == "") { ?>
		<th data-name="PC" class="<?php echo $pharmacy_po->PC->headerCellClass() ?>"><div id="elh_pharmacy_po_PC" class="pharmacy_po_PC"><div class="ew-table-header-caption"><?php echo $pharmacy_po->PC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PC" class="<?php echo $pharmacy_po->PC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_po->SortUrl($pharmacy_po->PC) ?>',1);"><div id="elh_pharmacy_po_PC" class="pharmacy_po_PC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_po->PC->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_po->PC->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_po->PC->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_po->Customercode->Visible) { // Customercode ?>
	<?php if ($pharmacy_po->sortUrl($pharmacy_po->Customercode) == "") { ?>
		<th data-name="Customercode" class="<?php echo $pharmacy_po->Customercode->headerCellClass() ?>"><div id="elh_pharmacy_po_Customercode" class="pharmacy_po_Customercode"><div class="ew-table-header-caption"><?php echo $pharmacy_po->Customercode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Customercode" class="<?php echo $pharmacy_po->Customercode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_po->SortUrl($pharmacy_po->Customercode) ?>',1);"><div id="elh_pharmacy_po_Customercode" class="pharmacy_po_Customercode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_po->Customercode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_po->Customercode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_po->Customercode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_po->Customername->Visible) { // Customername ?>
	<?php if ($pharmacy_po->sortUrl($pharmacy_po->Customername) == "") { ?>
		<th data-name="Customername" class="<?php echo $pharmacy_po->Customername->headerCellClass() ?>"><div id="elh_pharmacy_po_Customername" class="pharmacy_po_Customername"><div class="ew-table-header-caption"><?php echo $pharmacy_po->Customername->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Customername" class="<?php echo $pharmacy_po->Customername->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_po->SortUrl($pharmacy_po->Customername) ?>',1);"><div id="elh_pharmacy_po_Customername" class="pharmacy_po_Customername">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_po->Customername->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_po->Customername->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_po->Customername->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_po->pharmacy_pocol->Visible) { // pharmacy_pocol ?>
	<?php if ($pharmacy_po->sortUrl($pharmacy_po->pharmacy_pocol) == "") { ?>
		<th data-name="pharmacy_pocol" class="<?php echo $pharmacy_po->pharmacy_pocol->headerCellClass() ?>"><div id="elh_pharmacy_po_pharmacy_pocol" class="pharmacy_po_pharmacy_pocol"><div class="ew-table-header-caption"><?php echo $pharmacy_po->pharmacy_pocol->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pharmacy_pocol" class="<?php echo $pharmacy_po->pharmacy_pocol->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_po->SortUrl($pharmacy_po->pharmacy_pocol) ?>',1);"><div id="elh_pharmacy_po_pharmacy_pocol" class="pharmacy_po_pharmacy_pocol">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_po->pharmacy_pocol->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_po->pharmacy_pocol->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_po->pharmacy_pocol->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_po->Address1->Visible) { // Address1 ?>
	<?php if ($pharmacy_po->sortUrl($pharmacy_po->Address1) == "") { ?>
		<th data-name="Address1" class="<?php echo $pharmacy_po->Address1->headerCellClass() ?>"><div id="elh_pharmacy_po_Address1" class="pharmacy_po_Address1"><div class="ew-table-header-caption"><?php echo $pharmacy_po->Address1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Address1" class="<?php echo $pharmacy_po->Address1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_po->SortUrl($pharmacy_po->Address1) ?>',1);"><div id="elh_pharmacy_po_Address1" class="pharmacy_po_Address1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_po->Address1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_po->Address1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_po->Address1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_po->Address2->Visible) { // Address2 ?>
	<?php if ($pharmacy_po->sortUrl($pharmacy_po->Address2) == "") { ?>
		<th data-name="Address2" class="<?php echo $pharmacy_po->Address2->headerCellClass() ?>"><div id="elh_pharmacy_po_Address2" class="pharmacy_po_Address2"><div class="ew-table-header-caption"><?php echo $pharmacy_po->Address2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Address2" class="<?php echo $pharmacy_po->Address2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_po->SortUrl($pharmacy_po->Address2) ?>',1);"><div id="elh_pharmacy_po_Address2" class="pharmacy_po_Address2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_po->Address2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_po->Address2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_po->Address2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_po->Address3->Visible) { // Address3 ?>
	<?php if ($pharmacy_po->sortUrl($pharmacy_po->Address3) == "") { ?>
		<th data-name="Address3" class="<?php echo $pharmacy_po->Address3->headerCellClass() ?>"><div id="elh_pharmacy_po_Address3" class="pharmacy_po_Address3"><div class="ew-table-header-caption"><?php echo $pharmacy_po->Address3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Address3" class="<?php echo $pharmacy_po->Address3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_po->SortUrl($pharmacy_po->Address3) ?>',1);"><div id="elh_pharmacy_po_Address3" class="pharmacy_po_Address3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_po->Address3->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_po->Address3->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_po->Address3->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_po->State->Visible) { // State ?>
	<?php if ($pharmacy_po->sortUrl($pharmacy_po->State) == "") { ?>
		<th data-name="State" class="<?php echo $pharmacy_po->State->headerCellClass() ?>"><div id="elh_pharmacy_po_State" class="pharmacy_po_State"><div class="ew-table-header-caption"><?php echo $pharmacy_po->State->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="State" class="<?php echo $pharmacy_po->State->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_po->SortUrl($pharmacy_po->State) ?>',1);"><div id="elh_pharmacy_po_State" class="pharmacy_po_State">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_po->State->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_po->State->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_po->State->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_po->Pincode->Visible) { // Pincode ?>
	<?php if ($pharmacy_po->sortUrl($pharmacy_po->Pincode) == "") { ?>
		<th data-name="Pincode" class="<?php echo $pharmacy_po->Pincode->headerCellClass() ?>"><div id="elh_pharmacy_po_Pincode" class="pharmacy_po_Pincode"><div class="ew-table-header-caption"><?php echo $pharmacy_po->Pincode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pincode" class="<?php echo $pharmacy_po->Pincode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_po->SortUrl($pharmacy_po->Pincode) ?>',1);"><div id="elh_pharmacy_po_Pincode" class="pharmacy_po_Pincode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_po->Pincode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_po->Pincode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_po->Pincode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_po->Phone->Visible) { // Phone ?>
	<?php if ($pharmacy_po->sortUrl($pharmacy_po->Phone) == "") { ?>
		<th data-name="Phone" class="<?php echo $pharmacy_po->Phone->headerCellClass() ?>"><div id="elh_pharmacy_po_Phone" class="pharmacy_po_Phone"><div class="ew-table-header-caption"><?php echo $pharmacy_po->Phone->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Phone" class="<?php echo $pharmacy_po->Phone->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_po->SortUrl($pharmacy_po->Phone) ?>',1);"><div id="elh_pharmacy_po_Phone" class="pharmacy_po_Phone">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_po->Phone->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_po->Phone->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_po->Phone->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_po->Fax->Visible) { // Fax ?>
	<?php if ($pharmacy_po->sortUrl($pharmacy_po->Fax) == "") { ?>
		<th data-name="Fax" class="<?php echo $pharmacy_po->Fax->headerCellClass() ?>"><div id="elh_pharmacy_po_Fax" class="pharmacy_po_Fax"><div class="ew-table-header-caption"><?php echo $pharmacy_po->Fax->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Fax" class="<?php echo $pharmacy_po->Fax->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_po->SortUrl($pharmacy_po->Fax) ?>',1);"><div id="elh_pharmacy_po_Fax" class="pharmacy_po_Fax">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_po->Fax->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_po->Fax->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_po->Fax->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_po->EEmail->Visible) { // EEmail ?>
	<?php if ($pharmacy_po->sortUrl($pharmacy_po->EEmail) == "") { ?>
		<th data-name="EEmail" class="<?php echo $pharmacy_po->EEmail->headerCellClass() ?>"><div id="elh_pharmacy_po_EEmail" class="pharmacy_po_EEmail"><div class="ew-table-header-caption"><?php echo $pharmacy_po->EEmail->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EEmail" class="<?php echo $pharmacy_po->EEmail->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_po->SortUrl($pharmacy_po->EEmail) ?>',1);"><div id="elh_pharmacy_po_EEmail" class="pharmacy_po_EEmail">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_po->EEmail->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_po->EEmail->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_po->EEmail->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_po->HospID->Visible) { // HospID ?>
	<?php if ($pharmacy_po->sortUrl($pharmacy_po->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $pharmacy_po->HospID->headerCellClass() ?>"><div id="elh_pharmacy_po_HospID" class="pharmacy_po_HospID"><div class="ew-table-header-caption"><?php echo $pharmacy_po->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $pharmacy_po->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_po->SortUrl($pharmacy_po->HospID) ?>',1);"><div id="elh_pharmacy_po_HospID" class="pharmacy_po_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_po->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_po->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_po->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_po->createdby->Visible) { // createdby ?>
	<?php if ($pharmacy_po->sortUrl($pharmacy_po->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $pharmacy_po->createdby->headerCellClass() ?>"><div id="elh_pharmacy_po_createdby" class="pharmacy_po_createdby"><div class="ew-table-header-caption"><?php echo $pharmacy_po->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $pharmacy_po->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_po->SortUrl($pharmacy_po->createdby) ?>',1);"><div id="elh_pharmacy_po_createdby" class="pharmacy_po_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_po->createdby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_po->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_po->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_po->createddatetime->Visible) { // createddatetime ?>
	<?php if ($pharmacy_po->sortUrl($pharmacy_po->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $pharmacy_po->createddatetime->headerCellClass() ?>"><div id="elh_pharmacy_po_createddatetime" class="pharmacy_po_createddatetime"><div class="ew-table-header-caption"><?php echo $pharmacy_po->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $pharmacy_po->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_po->SortUrl($pharmacy_po->createddatetime) ?>',1);"><div id="elh_pharmacy_po_createddatetime" class="pharmacy_po_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_po->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_po->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_po->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_po->modifiedby->Visible) { // modifiedby ?>
	<?php if ($pharmacy_po->sortUrl($pharmacy_po->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $pharmacy_po->modifiedby->headerCellClass() ?>"><div id="elh_pharmacy_po_modifiedby" class="pharmacy_po_modifiedby"><div class="ew-table-header-caption"><?php echo $pharmacy_po->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $pharmacy_po->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_po->SortUrl($pharmacy_po->modifiedby) ?>',1);"><div id="elh_pharmacy_po_modifiedby" class="pharmacy_po_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_po->modifiedby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_po->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_po->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_po->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($pharmacy_po->sortUrl($pharmacy_po->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $pharmacy_po->modifieddatetime->headerCellClass() ?>"><div id="elh_pharmacy_po_modifieddatetime" class="pharmacy_po_modifieddatetime"><div class="ew-table-header-caption"><?php echo $pharmacy_po->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $pharmacy_po->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_po->SortUrl($pharmacy_po->modifieddatetime) ?>',1);"><div id="elh_pharmacy_po_modifieddatetime" class="pharmacy_po_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_po->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_po->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_po->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_po->BRCODE->Visible) { // BRCODE ?>
	<?php if ($pharmacy_po->sortUrl($pharmacy_po->BRCODE) == "") { ?>
		<th data-name="BRCODE" class="<?php echo $pharmacy_po->BRCODE->headerCellClass() ?>"><div id="elh_pharmacy_po_BRCODE" class="pharmacy_po_BRCODE"><div class="ew-table-header-caption"><?php echo $pharmacy_po->BRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BRCODE" class="<?php echo $pharmacy_po->BRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_po->SortUrl($pharmacy_po->BRCODE) ?>',1);"><div id="elh_pharmacy_po_BRCODE" class="pharmacy_po_BRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_po->BRCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_po->BRCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_po->BRCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pharmacy_po_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($pharmacy_po->ExportAll && $pharmacy_po->isExport()) {
	$pharmacy_po_list->StopRec = $pharmacy_po_list->TotalRecs;
} else {

	// Set the last record to display
	if ($pharmacy_po_list->TotalRecs > $pharmacy_po_list->StartRec + $pharmacy_po_list->DisplayRecs - 1)
		$pharmacy_po_list->StopRec = $pharmacy_po_list->StartRec + $pharmacy_po_list->DisplayRecs - 1;
	else
		$pharmacy_po_list->StopRec = $pharmacy_po_list->TotalRecs;
}
$pharmacy_po_list->RecCnt = $pharmacy_po_list->StartRec - 1;
if ($pharmacy_po_list->Recordset && !$pharmacy_po_list->Recordset->EOF) {
	$pharmacy_po_list->Recordset->moveFirst();
	$selectLimit = $pharmacy_po_list->UseSelectLimit;
	if (!$selectLimit && $pharmacy_po_list->StartRec > 1)
		$pharmacy_po_list->Recordset->move($pharmacy_po_list->StartRec - 1);
} elseif (!$pharmacy_po->AllowAddDeleteRow && $pharmacy_po_list->StopRec == 0) {
	$pharmacy_po_list->StopRec = $pharmacy_po->GridAddRowCount;
}

// Initialize aggregate
$pharmacy_po->RowType = ROWTYPE_AGGREGATEINIT;
$pharmacy_po->resetAttributes();
$pharmacy_po_list->renderRow();
while ($pharmacy_po_list->RecCnt < $pharmacy_po_list->StopRec) {
	$pharmacy_po_list->RecCnt++;
	if ($pharmacy_po_list->RecCnt >= $pharmacy_po_list->StartRec) {
		$pharmacy_po_list->RowCnt++;

		// Set up key count
		$pharmacy_po_list->KeyCount = $pharmacy_po_list->RowIndex;

		// Init row class and style
		$pharmacy_po->resetAttributes();
		$pharmacy_po->CssClass = "";
		if ($pharmacy_po->isGridAdd()) {
		} else {
			$pharmacy_po_list->loadRowValues($pharmacy_po_list->Recordset); // Load row values
		}
		$pharmacy_po->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$pharmacy_po->RowAttrs = array_merge($pharmacy_po->RowAttrs, array('data-rowindex'=>$pharmacy_po_list->RowCnt, 'id'=>'r' . $pharmacy_po_list->RowCnt . '_pharmacy_po', 'data-rowtype'=>$pharmacy_po->RowType));

		// Render row
		$pharmacy_po_list->renderRow();

		// Render list options
		$pharmacy_po_list->renderListOptions();
?>
	<tr<?php echo $pharmacy_po->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_po_list->ListOptions->render("body", "left", $pharmacy_po_list->RowCnt);
?>
	<?php if ($pharmacy_po->id->Visible) { // id ?>
		<td data-name="id"<?php echo $pharmacy_po->id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_list->RowCnt ?>_pharmacy_po_id" class="pharmacy_po_id">
<span<?php echo $pharmacy_po->id->viewAttributes() ?>>
<?php echo $pharmacy_po->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_po->ORDNO->Visible) { // ORDNO ?>
		<td data-name="ORDNO"<?php echo $pharmacy_po->ORDNO->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_list->RowCnt ?>_pharmacy_po_ORDNO" class="pharmacy_po_ORDNO">
<span<?php echo $pharmacy_po->ORDNO->viewAttributes() ?>>
<?php echo $pharmacy_po->ORDNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_po->DT->Visible) { // DT ?>
		<td data-name="DT"<?php echo $pharmacy_po->DT->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_list->RowCnt ?>_pharmacy_po_DT" class="pharmacy_po_DT">
<span<?php echo $pharmacy_po->DT->viewAttributes() ?>>
<?php echo $pharmacy_po->DT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_po->YM->Visible) { // YM ?>
		<td data-name="YM"<?php echo $pharmacy_po->YM->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_list->RowCnt ?>_pharmacy_po_YM" class="pharmacy_po_YM">
<span<?php echo $pharmacy_po->YM->viewAttributes() ?>>
<?php echo $pharmacy_po->YM->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_po->PC->Visible) { // PC ?>
		<td data-name="PC"<?php echo $pharmacy_po->PC->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_list->RowCnt ?>_pharmacy_po_PC" class="pharmacy_po_PC">
<span<?php echo $pharmacy_po->PC->viewAttributes() ?>>
<?php echo $pharmacy_po->PC->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_po->Customercode->Visible) { // Customercode ?>
		<td data-name="Customercode"<?php echo $pharmacy_po->Customercode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_list->RowCnt ?>_pharmacy_po_Customercode" class="pharmacy_po_Customercode">
<span<?php echo $pharmacy_po->Customercode->viewAttributes() ?>>
<?php echo $pharmacy_po->Customercode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_po->Customername->Visible) { // Customername ?>
		<td data-name="Customername"<?php echo $pharmacy_po->Customername->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_list->RowCnt ?>_pharmacy_po_Customername" class="pharmacy_po_Customername">
<span<?php echo $pharmacy_po->Customername->viewAttributes() ?>>
<?php echo $pharmacy_po->Customername->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_po->pharmacy_pocol->Visible) { // pharmacy_pocol ?>
		<td data-name="pharmacy_pocol"<?php echo $pharmacy_po->pharmacy_pocol->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_list->RowCnt ?>_pharmacy_po_pharmacy_pocol" class="pharmacy_po_pharmacy_pocol">
<span<?php echo $pharmacy_po->pharmacy_pocol->viewAttributes() ?>>
<?php echo $pharmacy_po->pharmacy_pocol->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_po->Address1->Visible) { // Address1 ?>
		<td data-name="Address1"<?php echo $pharmacy_po->Address1->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_list->RowCnt ?>_pharmacy_po_Address1" class="pharmacy_po_Address1">
<span<?php echo $pharmacy_po->Address1->viewAttributes() ?>>
<?php echo $pharmacy_po->Address1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_po->Address2->Visible) { // Address2 ?>
		<td data-name="Address2"<?php echo $pharmacy_po->Address2->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_list->RowCnt ?>_pharmacy_po_Address2" class="pharmacy_po_Address2">
<span<?php echo $pharmacy_po->Address2->viewAttributes() ?>>
<?php echo $pharmacy_po->Address2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_po->Address3->Visible) { // Address3 ?>
		<td data-name="Address3"<?php echo $pharmacy_po->Address3->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_list->RowCnt ?>_pharmacy_po_Address3" class="pharmacy_po_Address3">
<span<?php echo $pharmacy_po->Address3->viewAttributes() ?>>
<?php echo $pharmacy_po->Address3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_po->State->Visible) { // State ?>
		<td data-name="State"<?php echo $pharmacy_po->State->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_list->RowCnt ?>_pharmacy_po_State" class="pharmacy_po_State">
<span<?php echo $pharmacy_po->State->viewAttributes() ?>>
<?php echo $pharmacy_po->State->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_po->Pincode->Visible) { // Pincode ?>
		<td data-name="Pincode"<?php echo $pharmacy_po->Pincode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_list->RowCnt ?>_pharmacy_po_Pincode" class="pharmacy_po_Pincode">
<span<?php echo $pharmacy_po->Pincode->viewAttributes() ?>>
<?php echo $pharmacy_po->Pincode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_po->Phone->Visible) { // Phone ?>
		<td data-name="Phone"<?php echo $pharmacy_po->Phone->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_list->RowCnt ?>_pharmacy_po_Phone" class="pharmacy_po_Phone">
<span<?php echo $pharmacy_po->Phone->viewAttributes() ?>>
<?php echo $pharmacy_po->Phone->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_po->Fax->Visible) { // Fax ?>
		<td data-name="Fax"<?php echo $pharmacy_po->Fax->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_list->RowCnt ?>_pharmacy_po_Fax" class="pharmacy_po_Fax">
<span<?php echo $pharmacy_po->Fax->viewAttributes() ?>>
<?php echo $pharmacy_po->Fax->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_po->EEmail->Visible) { // EEmail ?>
		<td data-name="EEmail"<?php echo $pharmacy_po->EEmail->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_list->RowCnt ?>_pharmacy_po_EEmail" class="pharmacy_po_EEmail">
<span<?php echo $pharmacy_po->EEmail->viewAttributes() ?>>
<?php echo $pharmacy_po->EEmail->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_po->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $pharmacy_po->HospID->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_list->RowCnt ?>_pharmacy_po_HospID" class="pharmacy_po_HospID">
<span<?php echo $pharmacy_po->HospID->viewAttributes() ?>>
<?php echo $pharmacy_po->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_po->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $pharmacy_po->createdby->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_list->RowCnt ?>_pharmacy_po_createdby" class="pharmacy_po_createdby">
<span<?php echo $pharmacy_po->createdby->viewAttributes() ?>>
<?php echo $pharmacy_po->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_po->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $pharmacy_po->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_list->RowCnt ?>_pharmacy_po_createddatetime" class="pharmacy_po_createddatetime">
<span<?php echo $pharmacy_po->createddatetime->viewAttributes() ?>>
<?php echo $pharmacy_po->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_po->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $pharmacy_po->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_list->RowCnt ?>_pharmacy_po_modifiedby" class="pharmacy_po_modifiedby">
<span<?php echo $pharmacy_po->modifiedby->viewAttributes() ?>>
<?php echo $pharmacy_po->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_po->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $pharmacy_po->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_list->RowCnt ?>_pharmacy_po_modifieddatetime" class="pharmacy_po_modifieddatetime">
<span<?php echo $pharmacy_po->modifieddatetime->viewAttributes() ?>>
<?php echo $pharmacy_po->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_po->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE"<?php echo $pharmacy_po->BRCODE->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_po_list->RowCnt ?>_pharmacy_po_BRCODE" class="pharmacy_po_BRCODE">
<span<?php echo $pharmacy_po->BRCODE->viewAttributes() ?>>
<?php echo $pharmacy_po->BRCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_po_list->ListOptions->render("body", "right", $pharmacy_po_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$pharmacy_po->isGridAdd())
		$pharmacy_po_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$pharmacy_po->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pharmacy_po_list->Recordset)
	$pharmacy_po_list->Recordset->Close();
?>
<?php if (!$pharmacy_po->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$pharmacy_po->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($pharmacy_po_list->Pager)) $pharmacy_po_list->Pager = new NumericPager($pharmacy_po_list->StartRec, $pharmacy_po_list->DisplayRecs, $pharmacy_po_list->TotalRecs, $pharmacy_po_list->RecRange, $pharmacy_po_list->AutoHidePager) ?>
<?php if ($pharmacy_po_list->Pager->RecordCount > 0 && $pharmacy_po_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($pharmacy_po_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_po_list->pageUrl() ?>start=<?php echo $pharmacy_po_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_po_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_po_list->pageUrl() ?>start=<?php echo $pharmacy_po_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($pharmacy_po_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $pharmacy_po_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_po_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_po_list->pageUrl() ?>start=<?php echo $pharmacy_po_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_po_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_po_list->pageUrl() ?>start=<?php echo $pharmacy_po_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($pharmacy_po_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $pharmacy_po_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $pharmacy_po_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $pharmacy_po_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($pharmacy_po_list->TotalRecs > 0 && (!$pharmacy_po_list->AutoHidePageSizeSelector || $pharmacy_po_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="pharmacy_po">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($pharmacy_po_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($pharmacy_po_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($pharmacy_po_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($pharmacy_po_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($pharmacy_po_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($pharmacy_po_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($pharmacy_po->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_po_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pharmacy_po_list->TotalRecs == 0 && !$pharmacy_po->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pharmacy_po_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$pharmacy_po_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_po->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$pharmacy_po->isExport()) { ?>
<script>
ew.scrollableTable("gmp_pharmacy_po", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$pharmacy_po_list->terminate();
?>