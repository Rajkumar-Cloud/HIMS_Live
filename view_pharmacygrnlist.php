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
$view_pharmacygrn_list = new view_pharmacygrn_list();

// Run the page
$view_pharmacygrn_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacygrn_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_pharmacygrn->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_pharmacygrnlist = currentForm = new ew.Form("fview_pharmacygrnlist", "list");
fview_pharmacygrnlist.formKeyCountName = '<?php echo $view_pharmacygrn_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_pharmacygrnlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_pharmacygrnlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_pharmacygrnlist.lists["x_PrName"] = <?php echo $view_pharmacygrn_list->PrName->Lookup->toClientList() ?>;
fview_pharmacygrnlist.lists["x_PrName"].options = <?php echo JsonEncode($view_pharmacygrn_list->PrName->lookupOptions()) ?>;
fview_pharmacygrnlist.autoSuggests["x_PrName"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
var fview_pharmacygrnlistsrch = currentSearchForm = new ew.Form("fview_pharmacygrnlistsrch");

// Filters
fview_pharmacygrnlistsrch.filterList = <?php echo $view_pharmacygrn_list->getFilterList() ?>;
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
<?php if (!$view_pharmacygrn->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_pharmacygrn_list->TotalRecs > 0 && $view_pharmacygrn_list->ExportOptions->visible()) { ?>
<?php $view_pharmacygrn_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacygrn_list->ImportOptions->visible()) { ?>
<?php $view_pharmacygrn_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacygrn_list->SearchOptions->visible()) { ?>
<?php $view_pharmacygrn_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacygrn_list->FilterOptions->visible()) { ?>
<?php $view_pharmacygrn_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$view_pharmacygrn->isExport() || EXPORT_MASTER_RECORD && $view_pharmacygrn->isExport("print")) { ?>
<?php
if ($view_pharmacygrn_list->DbMasterFilter <> "" && $view_pharmacygrn->getCurrentMasterTable() == "pharmacy_grn") {
	if ($view_pharmacygrn_list->MasterRecordExists) {
		include_once "pharmacy_grnmaster.php";
	}
}
?>
<?php } ?>
<?php
$view_pharmacygrn_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_pharmacygrn->isExport() && !$view_pharmacygrn->CurrentAction) { ?>
<form name="fview_pharmacygrnlistsrch" id="fview_pharmacygrnlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_pharmacygrn_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_pharmacygrnlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_pharmacygrn">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_pharmacygrn_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_pharmacygrn_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_pharmacygrn_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_pharmacygrn_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacygrn_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacygrn_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacygrn_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_pharmacygrn_list->showPageHeader(); ?>
<?php
$view_pharmacygrn_list->showMessage();
?>
<?php if ($view_pharmacygrn_list->TotalRecs > 0 || $view_pharmacygrn->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_pharmacygrn_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_pharmacygrn">
<?php if (!$view_pharmacygrn->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_pharmacygrn->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_pharmacygrn_list->Pager)) $view_pharmacygrn_list->Pager = new NumericPager($view_pharmacygrn_list->StartRec, $view_pharmacygrn_list->DisplayRecs, $view_pharmacygrn_list->TotalRecs, $view_pharmacygrn_list->RecRange, $view_pharmacygrn_list->AutoHidePager) ?>
<?php if ($view_pharmacygrn_list->Pager->RecordCount > 0 && $view_pharmacygrn_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_pharmacygrn_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacygrn_list->pageUrl() ?>start=<?php echo $view_pharmacygrn_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacygrn_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacygrn_list->pageUrl() ?>start=<?php echo $view_pharmacygrn_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_pharmacygrn_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_pharmacygrn_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacygrn_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacygrn_list->pageUrl() ?>start=<?php echo $view_pharmacygrn_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacygrn_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacygrn_list->pageUrl() ?>start=<?php echo $view_pharmacygrn_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_pharmacygrn_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_pharmacygrn_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_pharmacygrn_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_pharmacygrn_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_pharmacygrn_list->TotalRecs > 0 && (!$view_pharmacygrn_list->AutoHidePageSizeSelector || $view_pharmacygrn_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_pharmacygrn">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_pharmacygrn_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_pharmacygrn_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_pharmacygrn_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_pharmacygrn_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_pharmacygrn_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_pharmacygrn_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_pharmacygrn->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_pharmacygrn_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_pharmacygrnlist" id="fview_pharmacygrnlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_pharmacygrn_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_pharmacygrn_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_pharmacygrn">
<?php if ($view_pharmacygrn->getCurrentMasterTable() == "pharmacy_grn" && $view_pharmacygrn->CurrentAction) { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="pharmacy_grn">
<input type="hidden" name="fk_id" value="<?php echo $view_pharmacygrn->grnid->getSessionValue() ?>">
<?php } ?>
<div id="gmp_view_pharmacygrn" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_pharmacygrn_list->TotalRecs > 0 || $view_pharmacygrn->isGridEdit()) { ?>
<table id="tbl_view_pharmacygrnlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_pharmacygrn_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_pharmacygrn_list->renderListOptions();

// Render list options (header, left)
$view_pharmacygrn_list->ListOptions->render("header", "left");
?>
<?php if ($view_pharmacygrn->PRC->Visible) { // PRC ?>
	<?php if ($view_pharmacygrn->sortUrl($view_pharmacygrn->PRC) == "") { ?>
		<th data-name="PRC" class="<?php echo $view_pharmacygrn->PRC->headerCellClass() ?>"><div id="elh_view_pharmacygrn_PRC" class="view_pharmacygrn_PRC"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn->PRC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRC" class="<?php echo $view_pharmacygrn->PRC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacygrn->SortUrl($view_pharmacygrn->PRC) ?>',1);"><div id="elh_view_pharmacygrn_PRC" class="view_pharmacygrn_PRC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn->PRC->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn->PRC->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacygrn->PRC->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->PrName->Visible) { // PrName ?>
	<?php if ($view_pharmacygrn->sortUrl($view_pharmacygrn->PrName) == "") { ?>
		<th data-name="PrName" class="<?php echo $view_pharmacygrn->PrName->headerCellClass() ?>"><div id="elh_view_pharmacygrn_PrName" class="view_pharmacygrn_PrName"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn->PrName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrName" class="<?php echo $view_pharmacygrn->PrName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacygrn->SortUrl($view_pharmacygrn->PrName) ?>',1);"><div id="elh_view_pharmacygrn_PrName" class="view_pharmacygrn_PrName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn->PrName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn->PrName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacygrn->PrName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->GrnQuantity->Visible) { // GrnQuantity ?>
	<?php if ($view_pharmacygrn->sortUrl($view_pharmacygrn->GrnQuantity) == "") { ?>
		<th data-name="GrnQuantity" class="<?php echo $view_pharmacygrn->GrnQuantity->headerCellClass() ?>"><div id="elh_view_pharmacygrn_GrnQuantity" class="view_pharmacygrn_GrnQuantity"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn->GrnQuantity->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GrnQuantity" class="<?php echo $view_pharmacygrn->GrnQuantity->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacygrn->SortUrl($view_pharmacygrn->GrnQuantity) ?>',1);"><div id="elh_view_pharmacygrn_GrnQuantity" class="view_pharmacygrn_GrnQuantity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn->GrnQuantity->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn->GrnQuantity->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacygrn->GrnQuantity->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->Quantity->Visible) { // Quantity ?>
	<?php if ($view_pharmacygrn->sortUrl($view_pharmacygrn->Quantity) == "") { ?>
		<th data-name="Quantity" class="<?php echo $view_pharmacygrn->Quantity->headerCellClass() ?>"><div id="elh_view_pharmacygrn_Quantity" class="view_pharmacygrn_Quantity"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn->Quantity->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Quantity" class="<?php echo $view_pharmacygrn->Quantity->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacygrn->SortUrl($view_pharmacygrn->Quantity) ?>',1);"><div id="elh_view_pharmacygrn_Quantity" class="view_pharmacygrn_Quantity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn->Quantity->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn->Quantity->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacygrn->Quantity->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->FreeQty->Visible) { // FreeQty ?>
	<?php if ($view_pharmacygrn->sortUrl($view_pharmacygrn->FreeQty) == "") { ?>
		<th data-name="FreeQty" class="<?php echo $view_pharmacygrn->FreeQty->headerCellClass() ?>"><div id="elh_view_pharmacygrn_FreeQty" class="view_pharmacygrn_FreeQty"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn->FreeQty->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FreeQty" class="<?php echo $view_pharmacygrn->FreeQty->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacygrn->SortUrl($view_pharmacygrn->FreeQty) ?>',1);"><div id="elh_view_pharmacygrn_FreeQty" class="view_pharmacygrn_FreeQty">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn->FreeQty->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn->FreeQty->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacygrn->FreeQty->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->FreeQtyyy->Visible) { // FreeQtyyy ?>
	<?php if ($view_pharmacygrn->sortUrl($view_pharmacygrn->FreeQtyyy) == "") { ?>
		<th data-name="FreeQtyyy" class="<?php echo $view_pharmacygrn->FreeQtyyy->headerCellClass() ?>"><div id="elh_view_pharmacygrn_FreeQtyyy" class="view_pharmacygrn_FreeQtyyy"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn->FreeQtyyy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FreeQtyyy" class="<?php echo $view_pharmacygrn->FreeQtyyy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacygrn->SortUrl($view_pharmacygrn->FreeQtyyy) ?>',1);"><div id="elh_view_pharmacygrn_FreeQtyyy" class="view_pharmacygrn_FreeQtyyy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn->FreeQtyyy->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn->FreeQtyyy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacygrn->FreeQtyyy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->BatchNo->Visible) { // BatchNo ?>
	<?php if ($view_pharmacygrn->sortUrl($view_pharmacygrn->BatchNo) == "") { ?>
		<th data-name="BatchNo" class="<?php echo $view_pharmacygrn->BatchNo->headerCellClass() ?>"><div id="elh_view_pharmacygrn_BatchNo" class="view_pharmacygrn_BatchNo"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn->BatchNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BatchNo" class="<?php echo $view_pharmacygrn->BatchNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacygrn->SortUrl($view_pharmacygrn->BatchNo) ?>',1);"><div id="elh_view_pharmacygrn_BatchNo" class="view_pharmacygrn_BatchNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn->BatchNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn->BatchNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacygrn->BatchNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->ExpDate->Visible) { // ExpDate ?>
	<?php if ($view_pharmacygrn->sortUrl($view_pharmacygrn->ExpDate) == "") { ?>
		<th data-name="ExpDate" class="<?php echo $view_pharmacygrn->ExpDate->headerCellClass() ?>"><div id="elh_view_pharmacygrn_ExpDate" class="view_pharmacygrn_ExpDate"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn->ExpDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ExpDate" class="<?php echo $view_pharmacygrn->ExpDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacygrn->SortUrl($view_pharmacygrn->ExpDate) ?>',1);"><div id="elh_view_pharmacygrn_ExpDate" class="view_pharmacygrn_ExpDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn->ExpDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn->ExpDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacygrn->ExpDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->HSN->Visible) { // HSN ?>
	<?php if ($view_pharmacygrn->sortUrl($view_pharmacygrn->HSN) == "") { ?>
		<th data-name="HSN" class="<?php echo $view_pharmacygrn->HSN->headerCellClass() ?>"><div id="elh_view_pharmacygrn_HSN" class="view_pharmacygrn_HSN"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn->HSN->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HSN" class="<?php echo $view_pharmacygrn->HSN->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacygrn->SortUrl($view_pharmacygrn->HSN) ?>',1);"><div id="elh_view_pharmacygrn_HSN" class="view_pharmacygrn_HSN">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn->HSN->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn->HSN->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacygrn->HSN->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->MFRCODE->Visible) { // MFRCODE ?>
	<?php if ($view_pharmacygrn->sortUrl($view_pharmacygrn->MFRCODE) == "") { ?>
		<th data-name="MFRCODE" class="<?php echo $view_pharmacygrn->MFRCODE->headerCellClass() ?>"><div id="elh_view_pharmacygrn_MFRCODE" class="view_pharmacygrn_MFRCODE"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn->MFRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MFRCODE" class="<?php echo $view_pharmacygrn->MFRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacygrn->SortUrl($view_pharmacygrn->MFRCODE) ?>',1);"><div id="elh_view_pharmacygrn_MFRCODE" class="view_pharmacygrn_MFRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn->MFRCODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn->MFRCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacygrn->MFRCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->PUnit->Visible) { // PUnit ?>
	<?php if ($view_pharmacygrn->sortUrl($view_pharmacygrn->PUnit) == "") { ?>
		<th data-name="PUnit" class="<?php echo $view_pharmacygrn->PUnit->headerCellClass() ?>"><div id="elh_view_pharmacygrn_PUnit" class="view_pharmacygrn_PUnit"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn->PUnit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PUnit" class="<?php echo $view_pharmacygrn->PUnit->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacygrn->SortUrl($view_pharmacygrn->PUnit) ?>',1);"><div id="elh_view_pharmacygrn_PUnit" class="view_pharmacygrn_PUnit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn->PUnit->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn->PUnit->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacygrn->PUnit->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->SUnit->Visible) { // SUnit ?>
	<?php if ($view_pharmacygrn->sortUrl($view_pharmacygrn->SUnit) == "") { ?>
		<th data-name="SUnit" class="<?php echo $view_pharmacygrn->SUnit->headerCellClass() ?>"><div id="elh_view_pharmacygrn_SUnit" class="view_pharmacygrn_SUnit"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn->SUnit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SUnit" class="<?php echo $view_pharmacygrn->SUnit->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacygrn->SortUrl($view_pharmacygrn->SUnit) ?>',1);"><div id="elh_view_pharmacygrn_SUnit" class="view_pharmacygrn_SUnit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn->SUnit->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn->SUnit->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacygrn->SUnit->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->MRP->Visible) { // MRP ?>
	<?php if ($view_pharmacygrn->sortUrl($view_pharmacygrn->MRP) == "") { ?>
		<th data-name="MRP" class="<?php echo $view_pharmacygrn->MRP->headerCellClass() ?>"><div id="elh_view_pharmacygrn_MRP" class="view_pharmacygrn_MRP"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn->MRP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MRP" class="<?php echo $view_pharmacygrn->MRP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacygrn->SortUrl($view_pharmacygrn->MRP) ?>',1);"><div id="elh_view_pharmacygrn_MRP" class="view_pharmacygrn_MRP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn->MRP->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn->MRP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacygrn->MRP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->PurValue->Visible) { // PurValue ?>
	<?php if ($view_pharmacygrn->sortUrl($view_pharmacygrn->PurValue) == "") { ?>
		<th data-name="PurValue" class="<?php echo $view_pharmacygrn->PurValue->headerCellClass() ?>"><div id="elh_view_pharmacygrn_PurValue" class="view_pharmacygrn_PurValue"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn->PurValue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PurValue" class="<?php echo $view_pharmacygrn->PurValue->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacygrn->SortUrl($view_pharmacygrn->PurValue) ?>',1);"><div id="elh_view_pharmacygrn_PurValue" class="view_pharmacygrn_PurValue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn->PurValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn->PurValue->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacygrn->PurValue->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->Disc->Visible) { // Disc ?>
	<?php if ($view_pharmacygrn->sortUrl($view_pharmacygrn->Disc) == "") { ?>
		<th data-name="Disc" class="<?php echo $view_pharmacygrn->Disc->headerCellClass() ?>"><div id="elh_view_pharmacygrn_Disc" class="view_pharmacygrn_Disc"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn->Disc->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Disc" class="<?php echo $view_pharmacygrn->Disc->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacygrn->SortUrl($view_pharmacygrn->Disc) ?>',1);"><div id="elh_view_pharmacygrn_Disc" class="view_pharmacygrn_Disc">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn->Disc->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn->Disc->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacygrn->Disc->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->PSGST->Visible) { // PSGST ?>
	<?php if ($view_pharmacygrn->sortUrl($view_pharmacygrn->PSGST) == "") { ?>
		<th data-name="PSGST" class="<?php echo $view_pharmacygrn->PSGST->headerCellClass() ?>"><div id="elh_view_pharmacygrn_PSGST" class="view_pharmacygrn_PSGST"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn->PSGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PSGST" class="<?php echo $view_pharmacygrn->PSGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacygrn->SortUrl($view_pharmacygrn->PSGST) ?>',1);"><div id="elh_view_pharmacygrn_PSGST" class="view_pharmacygrn_PSGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn->PSGST->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn->PSGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacygrn->PSGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->PCGST->Visible) { // PCGST ?>
	<?php if ($view_pharmacygrn->sortUrl($view_pharmacygrn->PCGST) == "") { ?>
		<th data-name="PCGST" class="<?php echo $view_pharmacygrn->PCGST->headerCellClass() ?>"><div id="elh_view_pharmacygrn_PCGST" class="view_pharmacygrn_PCGST"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn->PCGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PCGST" class="<?php echo $view_pharmacygrn->PCGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacygrn->SortUrl($view_pharmacygrn->PCGST) ?>',1);"><div id="elh_view_pharmacygrn_PCGST" class="view_pharmacygrn_PCGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn->PCGST->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn->PCGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacygrn->PCGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->PTax->Visible) { // PTax ?>
	<?php if ($view_pharmacygrn->sortUrl($view_pharmacygrn->PTax) == "") { ?>
		<th data-name="PTax" class="<?php echo $view_pharmacygrn->PTax->headerCellClass() ?>"><div id="elh_view_pharmacygrn_PTax" class="view_pharmacygrn_PTax"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn->PTax->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PTax" class="<?php echo $view_pharmacygrn->PTax->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacygrn->SortUrl($view_pharmacygrn->PTax) ?>',1);"><div id="elh_view_pharmacygrn_PTax" class="view_pharmacygrn_PTax">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn->PTax->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn->PTax->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacygrn->PTax->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->ItemValue->Visible) { // ItemValue ?>
	<?php if ($view_pharmacygrn->sortUrl($view_pharmacygrn->ItemValue) == "") { ?>
		<th data-name="ItemValue" class="<?php echo $view_pharmacygrn->ItemValue->headerCellClass() ?>"><div id="elh_view_pharmacygrn_ItemValue" class="view_pharmacygrn_ItemValue"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn->ItemValue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ItemValue" class="<?php echo $view_pharmacygrn->ItemValue->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacygrn->SortUrl($view_pharmacygrn->ItemValue) ?>',1);"><div id="elh_view_pharmacygrn_ItemValue" class="view_pharmacygrn_ItemValue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn->ItemValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn->ItemValue->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacygrn->ItemValue->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->SalTax->Visible) { // SalTax ?>
	<?php if ($view_pharmacygrn->sortUrl($view_pharmacygrn->SalTax) == "") { ?>
		<th data-name="SalTax" class="<?php echo $view_pharmacygrn->SalTax->headerCellClass() ?>"><div id="elh_view_pharmacygrn_SalTax" class="view_pharmacygrn_SalTax"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn->SalTax->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SalTax" class="<?php echo $view_pharmacygrn->SalTax->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacygrn->SortUrl($view_pharmacygrn->SalTax) ?>',1);"><div id="elh_view_pharmacygrn_SalTax" class="view_pharmacygrn_SalTax">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn->SalTax->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn->SalTax->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacygrn->SalTax->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->PurRate->Visible) { // PurRate ?>
	<?php if ($view_pharmacygrn->sortUrl($view_pharmacygrn->PurRate) == "") { ?>
		<th data-name="PurRate" class="<?php echo $view_pharmacygrn->PurRate->headerCellClass() ?>"><div id="elh_view_pharmacygrn_PurRate" class="view_pharmacygrn_PurRate"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn->PurRate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PurRate" class="<?php echo $view_pharmacygrn->PurRate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacygrn->SortUrl($view_pharmacygrn->PurRate) ?>',1);"><div id="elh_view_pharmacygrn_PurRate" class="view_pharmacygrn_PurRate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn->PurRate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn->PurRate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacygrn->PurRate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->SalRate->Visible) { // SalRate ?>
	<?php if ($view_pharmacygrn->sortUrl($view_pharmacygrn->SalRate) == "") { ?>
		<th data-name="SalRate" class="<?php echo $view_pharmacygrn->SalRate->headerCellClass() ?>"><div id="elh_view_pharmacygrn_SalRate" class="view_pharmacygrn_SalRate"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn->SalRate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SalRate" class="<?php echo $view_pharmacygrn->SalRate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacygrn->SortUrl($view_pharmacygrn->SalRate) ?>',1);"><div id="elh_view_pharmacygrn_SalRate" class="view_pharmacygrn_SalRate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn->SalRate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn->SalRate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacygrn->SalRate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->SSGST->Visible) { // SSGST ?>
	<?php if ($view_pharmacygrn->sortUrl($view_pharmacygrn->SSGST) == "") { ?>
		<th data-name="SSGST" class="<?php echo $view_pharmacygrn->SSGST->headerCellClass() ?>"><div id="elh_view_pharmacygrn_SSGST" class="view_pharmacygrn_SSGST"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn->SSGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SSGST" class="<?php echo $view_pharmacygrn->SSGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacygrn->SortUrl($view_pharmacygrn->SSGST) ?>',1);"><div id="elh_view_pharmacygrn_SSGST" class="view_pharmacygrn_SSGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn->SSGST->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn->SSGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacygrn->SSGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->SCGST->Visible) { // SCGST ?>
	<?php if ($view_pharmacygrn->sortUrl($view_pharmacygrn->SCGST) == "") { ?>
		<th data-name="SCGST" class="<?php echo $view_pharmacygrn->SCGST->headerCellClass() ?>"><div id="elh_view_pharmacygrn_SCGST" class="view_pharmacygrn_SCGST"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn->SCGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SCGST" class="<?php echo $view_pharmacygrn->SCGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacygrn->SortUrl($view_pharmacygrn->SCGST) ?>',1);"><div id="elh_view_pharmacygrn_SCGST" class="view_pharmacygrn_SCGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn->SCGST->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn->SCGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacygrn->SCGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->BRCODE->Visible) { // BRCODE ?>
	<?php if ($view_pharmacygrn->sortUrl($view_pharmacygrn->BRCODE) == "") { ?>
		<th data-name="BRCODE" class="<?php echo $view_pharmacygrn->BRCODE->headerCellClass() ?>"><div id="elh_view_pharmacygrn_BRCODE" class="view_pharmacygrn_BRCODE"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn->BRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BRCODE" class="<?php echo $view_pharmacygrn->BRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacygrn->SortUrl($view_pharmacygrn->BRCODE) ?>',1);"><div id="elh_view_pharmacygrn_BRCODE" class="view_pharmacygrn_BRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn->BRCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn->BRCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacygrn->BRCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->HospID->Visible) { // HospID ?>
	<?php if ($view_pharmacygrn->sortUrl($view_pharmacygrn->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_pharmacygrn->HospID->headerCellClass() ?>"><div id="elh_view_pharmacygrn_HospID" class="view_pharmacygrn_HospID"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_pharmacygrn->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacygrn->SortUrl($view_pharmacygrn->HospID) ?>',1);"><div id="elh_view_pharmacygrn_HospID" class="view_pharmacygrn_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacygrn->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->grncreatedby->Visible) { // grncreatedby ?>
	<?php if ($view_pharmacygrn->sortUrl($view_pharmacygrn->grncreatedby) == "") { ?>
		<th data-name="grncreatedby" class="<?php echo $view_pharmacygrn->grncreatedby->headerCellClass() ?>"><div id="elh_view_pharmacygrn_grncreatedby" class="view_pharmacygrn_grncreatedby"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn->grncreatedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="grncreatedby" class="<?php echo $view_pharmacygrn->grncreatedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacygrn->SortUrl($view_pharmacygrn->grncreatedby) ?>',1);"><div id="elh_view_pharmacygrn_grncreatedby" class="view_pharmacygrn_grncreatedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn->grncreatedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn->grncreatedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacygrn->grncreatedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
	<?php if ($view_pharmacygrn->sortUrl($view_pharmacygrn->grncreatedDateTime) == "") { ?>
		<th data-name="grncreatedDateTime" class="<?php echo $view_pharmacygrn->grncreatedDateTime->headerCellClass() ?>"><div id="elh_view_pharmacygrn_grncreatedDateTime" class="view_pharmacygrn_grncreatedDateTime"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn->grncreatedDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="grncreatedDateTime" class="<?php echo $view_pharmacygrn->grncreatedDateTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacygrn->SortUrl($view_pharmacygrn->grncreatedDateTime) ?>',1);"><div id="elh_view_pharmacygrn_grncreatedDateTime" class="view_pharmacygrn_grncreatedDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn->grncreatedDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn->grncreatedDateTime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacygrn->grncreatedDateTime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->grnModifiedby->Visible) { // grnModifiedby ?>
	<?php if ($view_pharmacygrn->sortUrl($view_pharmacygrn->grnModifiedby) == "") { ?>
		<th data-name="grnModifiedby" class="<?php echo $view_pharmacygrn->grnModifiedby->headerCellClass() ?>"><div id="elh_view_pharmacygrn_grnModifiedby" class="view_pharmacygrn_grnModifiedby"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn->grnModifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="grnModifiedby" class="<?php echo $view_pharmacygrn->grnModifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacygrn->SortUrl($view_pharmacygrn->grnModifiedby) ?>',1);"><div id="elh_view_pharmacygrn_grnModifiedby" class="view_pharmacygrn_grnModifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn->grnModifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn->grnModifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacygrn->grnModifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
	<?php if ($view_pharmacygrn->sortUrl($view_pharmacygrn->grnModifiedDateTime) == "") { ?>
		<th data-name="grnModifiedDateTime" class="<?php echo $view_pharmacygrn->grnModifiedDateTime->headerCellClass() ?>"><div id="elh_view_pharmacygrn_grnModifiedDateTime" class="view_pharmacygrn_grnModifiedDateTime"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn->grnModifiedDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="grnModifiedDateTime" class="<?php echo $view_pharmacygrn->grnModifiedDateTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacygrn->SortUrl($view_pharmacygrn->grnModifiedDateTime) ?>',1);"><div id="elh_view_pharmacygrn_grnModifiedDateTime" class="view_pharmacygrn_grnModifiedDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn->grnModifiedDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn->grnModifiedDateTime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacygrn->grnModifiedDateTime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->BillDate->Visible) { // BillDate ?>
	<?php if ($view_pharmacygrn->sortUrl($view_pharmacygrn->BillDate) == "") { ?>
		<th data-name="BillDate" class="<?php echo $view_pharmacygrn->BillDate->headerCellClass() ?>"><div id="elh_view_pharmacygrn_BillDate" class="view_pharmacygrn_BillDate"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn->BillDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillDate" class="<?php echo $view_pharmacygrn->BillDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacygrn->SortUrl($view_pharmacygrn->BillDate) ?>',1);"><div id="elh_view_pharmacygrn_BillDate" class="view_pharmacygrn_BillDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn->BillDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn->BillDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacygrn->BillDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->grndate->Visible) { // grndate ?>
	<?php if ($view_pharmacygrn->sortUrl($view_pharmacygrn->grndate) == "") { ?>
		<th data-name="grndate" class="<?php echo $view_pharmacygrn->grndate->headerCellClass() ?>"><div id="elh_view_pharmacygrn_grndate" class="view_pharmacygrn_grndate"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn->grndate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="grndate" class="<?php echo $view_pharmacygrn->grndate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacygrn->SortUrl($view_pharmacygrn->grndate) ?>',1);"><div id="elh_view_pharmacygrn_grndate" class="view_pharmacygrn_grndate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn->grndate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn->grndate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacygrn->grndate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacygrn->grndatetime->Visible) { // grndatetime ?>
	<?php if ($view_pharmacygrn->sortUrl($view_pharmacygrn->grndatetime) == "") { ?>
		<th data-name="grndatetime" class="<?php echo $view_pharmacygrn->grndatetime->headerCellClass() ?>"><div id="elh_view_pharmacygrn_grndatetime" class="view_pharmacygrn_grndatetime"><div class="ew-table-header-caption"><?php echo $view_pharmacygrn->grndatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="grndatetime" class="<?php echo $view_pharmacygrn->grndatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacygrn->SortUrl($view_pharmacygrn->grndatetime) ?>',1);"><div id="elh_view_pharmacygrn_grndatetime" class="view_pharmacygrn_grndatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacygrn->grndatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacygrn->grndatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacygrn->grndatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_pharmacygrn_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_pharmacygrn->ExportAll && $view_pharmacygrn->isExport()) {
	$view_pharmacygrn_list->StopRec = $view_pharmacygrn_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_pharmacygrn_list->TotalRecs > $view_pharmacygrn_list->StartRec + $view_pharmacygrn_list->DisplayRecs - 1)
		$view_pharmacygrn_list->StopRec = $view_pharmacygrn_list->StartRec + $view_pharmacygrn_list->DisplayRecs - 1;
	else
		$view_pharmacygrn_list->StopRec = $view_pharmacygrn_list->TotalRecs;
}
$view_pharmacygrn_list->RecCnt = $view_pharmacygrn_list->StartRec - 1;
if ($view_pharmacygrn_list->Recordset && !$view_pharmacygrn_list->Recordset->EOF) {
	$view_pharmacygrn_list->Recordset->moveFirst();
	$selectLimit = $view_pharmacygrn_list->UseSelectLimit;
	if (!$selectLimit && $view_pharmacygrn_list->StartRec > 1)
		$view_pharmacygrn_list->Recordset->move($view_pharmacygrn_list->StartRec - 1);
} elseif (!$view_pharmacygrn->AllowAddDeleteRow && $view_pharmacygrn_list->StopRec == 0) {
	$view_pharmacygrn_list->StopRec = $view_pharmacygrn->GridAddRowCount;
}

// Initialize aggregate
$view_pharmacygrn->RowType = ROWTYPE_AGGREGATEINIT;
$view_pharmacygrn->resetAttributes();
$view_pharmacygrn_list->renderRow();
while ($view_pharmacygrn_list->RecCnt < $view_pharmacygrn_list->StopRec) {
	$view_pharmacygrn_list->RecCnt++;
	if ($view_pharmacygrn_list->RecCnt >= $view_pharmacygrn_list->StartRec) {
		$view_pharmacygrn_list->RowCnt++;

		// Set up key count
		$view_pharmacygrn_list->KeyCount = $view_pharmacygrn_list->RowIndex;

		// Init row class and style
		$view_pharmacygrn->resetAttributes();
		$view_pharmacygrn->CssClass = "";
		if ($view_pharmacygrn->isGridAdd()) {
		} else {
			$view_pharmacygrn_list->loadRowValues($view_pharmacygrn_list->Recordset); // Load row values
		}
		$view_pharmacygrn->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_pharmacygrn->RowAttrs = array_merge($view_pharmacygrn->RowAttrs, array('data-rowindex'=>$view_pharmacygrn_list->RowCnt, 'id'=>'r' . $view_pharmacygrn_list->RowCnt . '_view_pharmacygrn', 'data-rowtype'=>$view_pharmacygrn->RowType));

		// Render row
		$view_pharmacygrn_list->renderRow();

		// Render list options
		$view_pharmacygrn_list->renderListOptions();
?>
	<tr<?php echo $view_pharmacygrn->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_pharmacygrn_list->ListOptions->render("body", "left", $view_pharmacygrn_list->RowCnt);
?>
	<?php if ($view_pharmacygrn->PRC->Visible) { // PRC ?>
		<td data-name="PRC"<?php echo $view_pharmacygrn->PRC->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacygrn_list->RowCnt ?>_view_pharmacygrn_PRC" class="view_pharmacygrn_PRC">
<span<?php echo $view_pharmacygrn->PRC->viewAttributes() ?>>
<?php echo $view_pharmacygrn->PRC->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->PrName->Visible) { // PrName ?>
		<td data-name="PrName"<?php echo $view_pharmacygrn->PrName->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacygrn_list->RowCnt ?>_view_pharmacygrn_PrName" class="view_pharmacygrn_PrName">
<span<?php echo $view_pharmacygrn->PrName->viewAttributes() ?>>
<?php echo $view_pharmacygrn->PrName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->GrnQuantity->Visible) { // GrnQuantity ?>
		<td data-name="GrnQuantity"<?php echo $view_pharmacygrn->GrnQuantity->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacygrn_list->RowCnt ?>_view_pharmacygrn_GrnQuantity" class="view_pharmacygrn_GrnQuantity">
<span<?php echo $view_pharmacygrn->GrnQuantity->viewAttributes() ?>>
<?php echo $view_pharmacygrn->GrnQuantity->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity"<?php echo $view_pharmacygrn->Quantity->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacygrn_list->RowCnt ?>_view_pharmacygrn_Quantity" class="view_pharmacygrn_Quantity">
<span<?php echo $view_pharmacygrn->Quantity->viewAttributes() ?>>
<?php echo $view_pharmacygrn->Quantity->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->FreeQty->Visible) { // FreeQty ?>
		<td data-name="FreeQty"<?php echo $view_pharmacygrn->FreeQty->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacygrn_list->RowCnt ?>_view_pharmacygrn_FreeQty" class="view_pharmacygrn_FreeQty">
<span<?php echo $view_pharmacygrn->FreeQty->viewAttributes() ?>>
<?php echo $view_pharmacygrn->FreeQty->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->FreeQtyyy->Visible) { // FreeQtyyy ?>
		<td data-name="FreeQtyyy"<?php echo $view_pharmacygrn->FreeQtyyy->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacygrn_list->RowCnt ?>_view_pharmacygrn_FreeQtyyy" class="view_pharmacygrn_FreeQtyyy">
<span<?php echo $view_pharmacygrn->FreeQtyyy->viewAttributes() ?>>
<?php echo $view_pharmacygrn->FreeQtyyy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->BatchNo->Visible) { // BatchNo ?>
		<td data-name="BatchNo"<?php echo $view_pharmacygrn->BatchNo->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacygrn_list->RowCnt ?>_view_pharmacygrn_BatchNo" class="view_pharmacygrn_BatchNo">
<span<?php echo $view_pharmacygrn->BatchNo->viewAttributes() ?>>
<?php echo $view_pharmacygrn->BatchNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->ExpDate->Visible) { // ExpDate ?>
		<td data-name="ExpDate"<?php echo $view_pharmacygrn->ExpDate->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacygrn_list->RowCnt ?>_view_pharmacygrn_ExpDate" class="view_pharmacygrn_ExpDate">
<span<?php echo $view_pharmacygrn->ExpDate->viewAttributes() ?>>
<?php echo $view_pharmacygrn->ExpDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->HSN->Visible) { // HSN ?>
		<td data-name="HSN"<?php echo $view_pharmacygrn->HSN->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacygrn_list->RowCnt ?>_view_pharmacygrn_HSN" class="view_pharmacygrn_HSN">
<span<?php echo $view_pharmacygrn->HSN->viewAttributes() ?>>
<?php echo $view_pharmacygrn->HSN->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->MFRCODE->Visible) { // MFRCODE ?>
		<td data-name="MFRCODE"<?php echo $view_pharmacygrn->MFRCODE->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacygrn_list->RowCnt ?>_view_pharmacygrn_MFRCODE" class="view_pharmacygrn_MFRCODE">
<span<?php echo $view_pharmacygrn->MFRCODE->viewAttributes() ?>>
<?php echo $view_pharmacygrn->MFRCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->PUnit->Visible) { // PUnit ?>
		<td data-name="PUnit"<?php echo $view_pharmacygrn->PUnit->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacygrn_list->RowCnt ?>_view_pharmacygrn_PUnit" class="view_pharmacygrn_PUnit">
<span<?php echo $view_pharmacygrn->PUnit->viewAttributes() ?>>
<?php echo $view_pharmacygrn->PUnit->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->SUnit->Visible) { // SUnit ?>
		<td data-name="SUnit"<?php echo $view_pharmacygrn->SUnit->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacygrn_list->RowCnt ?>_view_pharmacygrn_SUnit" class="view_pharmacygrn_SUnit">
<span<?php echo $view_pharmacygrn->SUnit->viewAttributes() ?>>
<?php echo $view_pharmacygrn->SUnit->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->MRP->Visible) { // MRP ?>
		<td data-name="MRP"<?php echo $view_pharmacygrn->MRP->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacygrn_list->RowCnt ?>_view_pharmacygrn_MRP" class="view_pharmacygrn_MRP">
<span<?php echo $view_pharmacygrn->MRP->viewAttributes() ?>>
<?php echo $view_pharmacygrn->MRP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->PurValue->Visible) { // PurValue ?>
		<td data-name="PurValue"<?php echo $view_pharmacygrn->PurValue->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacygrn_list->RowCnt ?>_view_pharmacygrn_PurValue" class="view_pharmacygrn_PurValue">
<span<?php echo $view_pharmacygrn->PurValue->viewAttributes() ?>>
<?php echo $view_pharmacygrn->PurValue->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->Disc->Visible) { // Disc ?>
		<td data-name="Disc"<?php echo $view_pharmacygrn->Disc->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacygrn_list->RowCnt ?>_view_pharmacygrn_Disc" class="view_pharmacygrn_Disc">
<span<?php echo $view_pharmacygrn->Disc->viewAttributes() ?>>
<?php echo $view_pharmacygrn->Disc->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->PSGST->Visible) { // PSGST ?>
		<td data-name="PSGST"<?php echo $view_pharmacygrn->PSGST->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacygrn_list->RowCnt ?>_view_pharmacygrn_PSGST" class="view_pharmacygrn_PSGST">
<span<?php echo $view_pharmacygrn->PSGST->viewAttributes() ?>>
<?php echo $view_pharmacygrn->PSGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->PCGST->Visible) { // PCGST ?>
		<td data-name="PCGST"<?php echo $view_pharmacygrn->PCGST->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacygrn_list->RowCnt ?>_view_pharmacygrn_PCGST" class="view_pharmacygrn_PCGST">
<span<?php echo $view_pharmacygrn->PCGST->viewAttributes() ?>>
<?php echo $view_pharmacygrn->PCGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->PTax->Visible) { // PTax ?>
		<td data-name="PTax"<?php echo $view_pharmacygrn->PTax->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacygrn_list->RowCnt ?>_view_pharmacygrn_PTax" class="view_pharmacygrn_PTax">
<span<?php echo $view_pharmacygrn->PTax->viewAttributes() ?>>
<?php echo $view_pharmacygrn->PTax->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->ItemValue->Visible) { // ItemValue ?>
		<td data-name="ItemValue"<?php echo $view_pharmacygrn->ItemValue->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacygrn_list->RowCnt ?>_view_pharmacygrn_ItemValue" class="view_pharmacygrn_ItemValue">
<span<?php echo $view_pharmacygrn->ItemValue->viewAttributes() ?>>
<?php echo $view_pharmacygrn->ItemValue->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->SalTax->Visible) { // SalTax ?>
		<td data-name="SalTax"<?php echo $view_pharmacygrn->SalTax->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacygrn_list->RowCnt ?>_view_pharmacygrn_SalTax" class="view_pharmacygrn_SalTax">
<span<?php echo $view_pharmacygrn->SalTax->viewAttributes() ?>>
<?php echo $view_pharmacygrn->SalTax->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->PurRate->Visible) { // PurRate ?>
		<td data-name="PurRate"<?php echo $view_pharmacygrn->PurRate->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacygrn_list->RowCnt ?>_view_pharmacygrn_PurRate" class="view_pharmacygrn_PurRate">
<span<?php echo $view_pharmacygrn->PurRate->viewAttributes() ?>>
<?php echo $view_pharmacygrn->PurRate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->SalRate->Visible) { // SalRate ?>
		<td data-name="SalRate"<?php echo $view_pharmacygrn->SalRate->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacygrn_list->RowCnt ?>_view_pharmacygrn_SalRate" class="view_pharmacygrn_SalRate">
<span<?php echo $view_pharmacygrn->SalRate->viewAttributes() ?>>
<?php echo $view_pharmacygrn->SalRate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->SSGST->Visible) { // SSGST ?>
		<td data-name="SSGST"<?php echo $view_pharmacygrn->SSGST->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacygrn_list->RowCnt ?>_view_pharmacygrn_SSGST" class="view_pharmacygrn_SSGST">
<span<?php echo $view_pharmacygrn->SSGST->viewAttributes() ?>>
<?php echo $view_pharmacygrn->SSGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->SCGST->Visible) { // SCGST ?>
		<td data-name="SCGST"<?php echo $view_pharmacygrn->SCGST->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacygrn_list->RowCnt ?>_view_pharmacygrn_SCGST" class="view_pharmacygrn_SCGST">
<span<?php echo $view_pharmacygrn->SCGST->viewAttributes() ?>>
<?php echo $view_pharmacygrn->SCGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE"<?php echo $view_pharmacygrn->BRCODE->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacygrn_list->RowCnt ?>_view_pharmacygrn_BRCODE" class="view_pharmacygrn_BRCODE">
<span<?php echo $view_pharmacygrn->BRCODE->viewAttributes() ?>>
<?php echo $view_pharmacygrn->BRCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_pharmacygrn->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacygrn_list->RowCnt ?>_view_pharmacygrn_HospID" class="view_pharmacygrn_HospID">
<span<?php echo $view_pharmacygrn->HospID->viewAttributes() ?>>
<?php echo $view_pharmacygrn->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->grncreatedby->Visible) { // grncreatedby ?>
		<td data-name="grncreatedby"<?php echo $view_pharmacygrn->grncreatedby->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacygrn_list->RowCnt ?>_view_pharmacygrn_grncreatedby" class="view_pharmacygrn_grncreatedby">
<span<?php echo $view_pharmacygrn->grncreatedby->viewAttributes() ?>>
<?php echo $view_pharmacygrn->grncreatedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
		<td data-name="grncreatedDateTime"<?php echo $view_pharmacygrn->grncreatedDateTime->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacygrn_list->RowCnt ?>_view_pharmacygrn_grncreatedDateTime" class="view_pharmacygrn_grncreatedDateTime">
<span<?php echo $view_pharmacygrn->grncreatedDateTime->viewAttributes() ?>>
<?php echo $view_pharmacygrn->grncreatedDateTime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->grnModifiedby->Visible) { // grnModifiedby ?>
		<td data-name="grnModifiedby"<?php echo $view_pharmacygrn->grnModifiedby->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacygrn_list->RowCnt ?>_view_pharmacygrn_grnModifiedby" class="view_pharmacygrn_grnModifiedby">
<span<?php echo $view_pharmacygrn->grnModifiedby->viewAttributes() ?>>
<?php echo $view_pharmacygrn->grnModifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
		<td data-name="grnModifiedDateTime"<?php echo $view_pharmacygrn->grnModifiedDateTime->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacygrn_list->RowCnt ?>_view_pharmacygrn_grnModifiedDateTime" class="view_pharmacygrn_grnModifiedDateTime">
<span<?php echo $view_pharmacygrn->grnModifiedDateTime->viewAttributes() ?>>
<?php echo $view_pharmacygrn->grnModifiedDateTime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->BillDate->Visible) { // BillDate ?>
		<td data-name="BillDate"<?php echo $view_pharmacygrn->BillDate->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacygrn_list->RowCnt ?>_view_pharmacygrn_BillDate" class="view_pharmacygrn_BillDate">
<span<?php echo $view_pharmacygrn->BillDate->viewAttributes() ?>>
<?php echo $view_pharmacygrn->BillDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->grndate->Visible) { // grndate ?>
		<td data-name="grndate"<?php echo $view_pharmacygrn->grndate->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacygrn_list->RowCnt ?>_view_pharmacygrn_grndate" class="view_pharmacygrn_grndate">
<span<?php echo $view_pharmacygrn->grndate->viewAttributes() ?>>
<?php echo $view_pharmacygrn->grndate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacygrn->grndatetime->Visible) { // grndatetime ?>
		<td data-name="grndatetime"<?php echo $view_pharmacygrn->grndatetime->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacygrn_list->RowCnt ?>_view_pharmacygrn_grndatetime" class="view_pharmacygrn_grndatetime">
<span<?php echo $view_pharmacygrn->grndatetime->viewAttributes() ?>>
<?php echo $view_pharmacygrn->grndatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_pharmacygrn_list->ListOptions->render("body", "right", $view_pharmacygrn_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_pharmacygrn->isGridAdd())
		$view_pharmacygrn_list->Recordset->moveNext();
}
?>
</tbody>
<?php

// Render aggregate row
$view_pharmacygrn->RowType = ROWTYPE_AGGREGATE;
$view_pharmacygrn->resetAttributes();
$view_pharmacygrn_list->renderRow();
?>
<?php if ($view_pharmacygrn_list->TotalRecs > 0 && !$view_pharmacygrn->isGridAdd() && !$view_pharmacygrn->isGridEdit()) { ?>
<tfoot><!-- Table footer -->
	<tr class="ew-table-footer">
<?php

// Render list options
$view_pharmacygrn_list->renderListOptions();

// Render list options (footer, left)
$view_pharmacygrn_list->ListOptions->render("footer", "left");
?>
	<?php if ($view_pharmacygrn->PRC->Visible) { // PRC ?>
		<td data-name="PRC" class="<?php echo $view_pharmacygrn->PRC->footerCellClass() ?>"><span id="elf_view_pharmacygrn_PRC" class="view_pharmacygrn_PRC">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn->PrName->Visible) { // PrName ?>
		<td data-name="PrName" class="<?php echo $view_pharmacygrn->PrName->footerCellClass() ?>"><span id="elf_view_pharmacygrn_PrName" class="view_pharmacygrn_PrName">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn->GrnQuantity->Visible) { // GrnQuantity ?>
		<td data-name="GrnQuantity" class="<?php echo $view_pharmacygrn->GrnQuantity->footerCellClass() ?>"><span id="elf_view_pharmacygrn_GrnQuantity" class="view_pharmacygrn_GrnQuantity">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity" class="<?php echo $view_pharmacygrn->Quantity->footerCellClass() ?>"><span id="elf_view_pharmacygrn_Quantity" class="view_pharmacygrn_Quantity">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn->FreeQty->Visible) { // FreeQty ?>
		<td data-name="FreeQty" class="<?php echo $view_pharmacygrn->FreeQty->footerCellClass() ?>"><span id="elf_view_pharmacygrn_FreeQty" class="view_pharmacygrn_FreeQty">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn->FreeQtyyy->Visible) { // FreeQtyyy ?>
		<td data-name="FreeQtyyy" class="<?php echo $view_pharmacygrn->FreeQtyyy->footerCellClass() ?>"><span id="elf_view_pharmacygrn_FreeQtyyy" class="view_pharmacygrn_FreeQtyyy">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn->BatchNo->Visible) { // BatchNo ?>
		<td data-name="BatchNo" class="<?php echo $view_pharmacygrn->BatchNo->footerCellClass() ?>"><span id="elf_view_pharmacygrn_BatchNo" class="view_pharmacygrn_BatchNo">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn->ExpDate->Visible) { // ExpDate ?>
		<td data-name="ExpDate" class="<?php echo $view_pharmacygrn->ExpDate->footerCellClass() ?>"><span id="elf_view_pharmacygrn_ExpDate" class="view_pharmacygrn_ExpDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn->HSN->Visible) { // HSN ?>
		<td data-name="HSN" class="<?php echo $view_pharmacygrn->HSN->footerCellClass() ?>"><span id="elf_view_pharmacygrn_HSN" class="view_pharmacygrn_HSN">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn->MFRCODE->Visible) { // MFRCODE ?>
		<td data-name="MFRCODE" class="<?php echo $view_pharmacygrn->MFRCODE->footerCellClass() ?>"><span id="elf_view_pharmacygrn_MFRCODE" class="view_pharmacygrn_MFRCODE">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn->PUnit->Visible) { // PUnit ?>
		<td data-name="PUnit" class="<?php echo $view_pharmacygrn->PUnit->footerCellClass() ?>"><span id="elf_view_pharmacygrn_PUnit" class="view_pharmacygrn_PUnit">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn->SUnit->Visible) { // SUnit ?>
		<td data-name="SUnit" class="<?php echo $view_pharmacygrn->SUnit->footerCellClass() ?>"><span id="elf_view_pharmacygrn_SUnit" class="view_pharmacygrn_SUnit">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn->MRP->Visible) { // MRP ?>
		<td data-name="MRP" class="<?php echo $view_pharmacygrn->MRP->footerCellClass() ?>"><span id="elf_view_pharmacygrn_MRP" class="view_pharmacygrn_MRP">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn->PurValue->Visible) { // PurValue ?>
		<td data-name="PurValue" class="<?php echo $view_pharmacygrn->PurValue->footerCellClass() ?>"><span id="elf_view_pharmacygrn_PurValue" class="view_pharmacygrn_PurValue">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn->Disc->Visible) { // Disc ?>
		<td data-name="Disc" class="<?php echo $view_pharmacygrn->Disc->footerCellClass() ?>"><span id="elf_view_pharmacygrn_Disc" class="view_pharmacygrn_Disc">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn->PSGST->Visible) { // PSGST ?>
		<td data-name="PSGST" class="<?php echo $view_pharmacygrn->PSGST->footerCellClass() ?>"><span id="elf_view_pharmacygrn_PSGST" class="view_pharmacygrn_PSGST">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn->PCGST->Visible) { // PCGST ?>
		<td data-name="PCGST" class="<?php echo $view_pharmacygrn->PCGST->footerCellClass() ?>"><span id="elf_view_pharmacygrn_PCGST" class="view_pharmacygrn_PCGST">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn->PTax->Visible) { // PTax ?>
		<td data-name="PTax" class="<?php echo $view_pharmacygrn->PTax->footerCellClass() ?>"><span id="elf_view_pharmacygrn_PTax" class="view_pharmacygrn_PTax">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_pharmacygrn->PTax->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn->ItemValue->Visible) { // ItemValue ?>
		<td data-name="ItemValue" class="<?php echo $view_pharmacygrn->ItemValue->footerCellClass() ?>"><span id="elf_view_pharmacygrn_ItemValue" class="view_pharmacygrn_ItemValue">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_pharmacygrn->ItemValue->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn->SalTax->Visible) { // SalTax ?>
		<td data-name="SalTax" class="<?php echo $view_pharmacygrn->SalTax->footerCellClass() ?>"><span id="elf_view_pharmacygrn_SalTax" class="view_pharmacygrn_SalTax">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_pharmacygrn->SalTax->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn->PurRate->Visible) { // PurRate ?>
		<td data-name="PurRate" class="<?php echo $view_pharmacygrn->PurRate->footerCellClass() ?>"><span id="elf_view_pharmacygrn_PurRate" class="view_pharmacygrn_PurRate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn->SalRate->Visible) { // SalRate ?>
		<td data-name="SalRate" class="<?php echo $view_pharmacygrn->SalRate->footerCellClass() ?>"><span id="elf_view_pharmacygrn_SalRate" class="view_pharmacygrn_SalRate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn->SSGST->Visible) { // SSGST ?>
		<td data-name="SSGST" class="<?php echo $view_pharmacygrn->SSGST->footerCellClass() ?>"><span id="elf_view_pharmacygrn_SSGST" class="view_pharmacygrn_SSGST">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn->SCGST->Visible) { // SCGST ?>
		<td data-name="SCGST" class="<?php echo $view_pharmacygrn->SCGST->footerCellClass() ?>"><span id="elf_view_pharmacygrn_SCGST" class="view_pharmacygrn_SCGST">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE" class="<?php echo $view_pharmacygrn->BRCODE->footerCellClass() ?>"><span id="elf_view_pharmacygrn_BRCODE" class="view_pharmacygrn_BRCODE">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn->HospID->Visible) { // HospID ?>
		<td data-name="HospID" class="<?php echo $view_pharmacygrn->HospID->footerCellClass() ?>"><span id="elf_view_pharmacygrn_HospID" class="view_pharmacygrn_HospID">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn->grncreatedby->Visible) { // grncreatedby ?>
		<td data-name="grncreatedby" class="<?php echo $view_pharmacygrn->grncreatedby->footerCellClass() ?>"><span id="elf_view_pharmacygrn_grncreatedby" class="view_pharmacygrn_grncreatedby">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
		<td data-name="grncreatedDateTime" class="<?php echo $view_pharmacygrn->grncreatedDateTime->footerCellClass() ?>"><span id="elf_view_pharmacygrn_grncreatedDateTime" class="view_pharmacygrn_grncreatedDateTime">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn->grnModifiedby->Visible) { // grnModifiedby ?>
		<td data-name="grnModifiedby" class="<?php echo $view_pharmacygrn->grnModifiedby->footerCellClass() ?>"><span id="elf_view_pharmacygrn_grnModifiedby" class="view_pharmacygrn_grnModifiedby">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
		<td data-name="grnModifiedDateTime" class="<?php echo $view_pharmacygrn->grnModifiedDateTime->footerCellClass() ?>"><span id="elf_view_pharmacygrn_grnModifiedDateTime" class="view_pharmacygrn_grnModifiedDateTime">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn->BillDate->Visible) { // BillDate ?>
		<td data-name="BillDate" class="<?php echo $view_pharmacygrn->BillDate->footerCellClass() ?>"><span id="elf_view_pharmacygrn_BillDate" class="view_pharmacygrn_BillDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn->grndate->Visible) { // grndate ?>
		<td data-name="grndate" class="<?php echo $view_pharmacygrn->grndate->footerCellClass() ?>"><span id="elf_view_pharmacygrn_grndate" class="view_pharmacygrn_grndate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_pharmacygrn->grndatetime->Visible) { // grndatetime ?>
		<td data-name="grndatetime" class="<?php echo $view_pharmacygrn->grndatetime->footerCellClass() ?>"><span id="elf_view_pharmacygrn_grndatetime" class="view_pharmacygrn_grndatetime">
		&nbsp;
		</span></td>
	<?php } ?>
<?php

// Render list options (footer, right)
$view_pharmacygrn_list->ListOptions->render("footer", "right");
?>
	</tr>
</tfoot>
<?php } ?>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_pharmacygrn->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_pharmacygrn_list->Recordset)
	$view_pharmacygrn_list->Recordset->Close();
?>
<?php if (!$view_pharmacygrn->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_pharmacygrn->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_pharmacygrn_list->Pager)) $view_pharmacygrn_list->Pager = new NumericPager($view_pharmacygrn_list->StartRec, $view_pharmacygrn_list->DisplayRecs, $view_pharmacygrn_list->TotalRecs, $view_pharmacygrn_list->RecRange, $view_pharmacygrn_list->AutoHidePager) ?>
<?php if ($view_pharmacygrn_list->Pager->RecordCount > 0 && $view_pharmacygrn_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_pharmacygrn_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacygrn_list->pageUrl() ?>start=<?php echo $view_pharmacygrn_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacygrn_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacygrn_list->pageUrl() ?>start=<?php echo $view_pharmacygrn_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_pharmacygrn_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_pharmacygrn_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacygrn_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacygrn_list->pageUrl() ?>start=<?php echo $view_pharmacygrn_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacygrn_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacygrn_list->pageUrl() ?>start=<?php echo $view_pharmacygrn_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_pharmacygrn_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_pharmacygrn_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_pharmacygrn_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_pharmacygrn_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_pharmacygrn_list->TotalRecs > 0 && (!$view_pharmacygrn_list->AutoHidePageSizeSelector || $view_pharmacygrn_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_pharmacygrn">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_pharmacygrn_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_pharmacygrn_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_pharmacygrn_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_pharmacygrn_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_pharmacygrn_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_pharmacygrn_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_pharmacygrn->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_pharmacygrn_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_pharmacygrn_list->TotalRecs == 0 && !$view_pharmacygrn->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_pharmacygrn_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_pharmacygrn_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_pharmacygrn->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

$("[data-name='Quantity']").hide();
</script>
<?php if (!$view_pharmacygrn->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_pharmacygrn", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_pharmacygrn_list->terminate();
?>