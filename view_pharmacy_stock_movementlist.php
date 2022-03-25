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
$view_pharmacy_stock_movement_list = new view_pharmacy_stock_movement_list();

// Run the page
$view_pharmacy_stock_movement_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacy_stock_movement_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_pharmacy_stock_movement->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_pharmacy_stock_movementlist = currentForm = new ew.Form("fview_pharmacy_stock_movementlist", "list");
fview_pharmacy_stock_movementlist.formKeyCountName = '<?php echo $view_pharmacy_stock_movement_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_pharmacy_stock_movementlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_pharmacy_stock_movementlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fview_pharmacy_stock_movementlistsrch = currentSearchForm = new ew.Form("fview_pharmacy_stock_movementlistsrch");

// Filters
fview_pharmacy_stock_movementlistsrch.filterList = <?php echo $view_pharmacy_stock_movement_list->getFilterList() ?>;
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
<?php if (!$view_pharmacy_stock_movement->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_pharmacy_stock_movement_list->TotalRecs > 0 && $view_pharmacy_stock_movement_list->ExportOptions->visible()) { ?>
<?php $view_pharmacy_stock_movement_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_stock_movement_list->ImportOptions->visible()) { ?>
<?php $view_pharmacy_stock_movement_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_stock_movement_list->SearchOptions->visible()) { ?>
<?php $view_pharmacy_stock_movement_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_stock_movement_list->FilterOptions->visible()) { ?>
<?php $view_pharmacy_stock_movement_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_pharmacy_stock_movement_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_pharmacy_stock_movement->isExport() && !$view_pharmacy_stock_movement->CurrentAction) { ?>
<form name="fview_pharmacy_stock_movementlistsrch" id="fview_pharmacy_stock_movementlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_pharmacy_stock_movement_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_pharmacy_stock_movementlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_pharmacy_stock_movement">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_pharmacy_stock_movement_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_pharmacy_stock_movement_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_pharmacy_stock_movement_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_pharmacy_stock_movement_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_stock_movement_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_stock_movement_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_stock_movement_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_pharmacy_stock_movement_list->showPageHeader(); ?>
<?php
$view_pharmacy_stock_movement_list->showMessage();
?>
<?php if ($view_pharmacy_stock_movement_list->TotalRecs > 0 || $view_pharmacy_stock_movement->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_pharmacy_stock_movement_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_pharmacy_stock_movement">
<?php if (!$view_pharmacy_stock_movement->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_pharmacy_stock_movement->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_pharmacy_stock_movement_list->Pager)) $view_pharmacy_stock_movement_list->Pager = new NumericPager($view_pharmacy_stock_movement_list->StartRec, $view_pharmacy_stock_movement_list->DisplayRecs, $view_pharmacy_stock_movement_list->TotalRecs, $view_pharmacy_stock_movement_list->RecRange, $view_pharmacy_stock_movement_list->AutoHidePager) ?>
<?php if ($view_pharmacy_stock_movement_list->Pager->RecordCount > 0 && $view_pharmacy_stock_movement_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_pharmacy_stock_movement_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_stock_movement_list->pageUrl() ?>start=<?php echo $view_pharmacy_stock_movement_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_stock_movement_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_stock_movement_list->pageUrl() ?>start=<?php echo $view_pharmacy_stock_movement_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_pharmacy_stock_movement_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_pharmacy_stock_movement_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_stock_movement_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_stock_movement_list->pageUrl() ?>start=<?php echo $view_pharmacy_stock_movement_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_stock_movement_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_stock_movement_list->pageUrl() ?>start=<?php echo $view_pharmacy_stock_movement_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_pharmacy_stock_movement_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_pharmacy_stock_movement_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_pharmacy_stock_movement_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_pharmacy_stock_movement_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_pharmacy_stock_movement_list->TotalRecs > 0 && (!$view_pharmacy_stock_movement_list->AutoHidePageSizeSelector || $view_pharmacy_stock_movement_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_pharmacy_stock_movement">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_pharmacy_stock_movement_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_pharmacy_stock_movement_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_pharmacy_stock_movement_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_pharmacy_stock_movement_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_pharmacy_stock_movement_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_pharmacy_stock_movement_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_pharmacy_stock_movement->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_stock_movement_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_pharmacy_stock_movementlist" id="fview_pharmacy_stock_movementlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_pharmacy_stock_movement_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_pharmacy_stock_movement_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_stock_movement">
<div id="gmp_view_pharmacy_stock_movement" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_pharmacy_stock_movement_list->TotalRecs > 0 || $view_pharmacy_stock_movement->isGridEdit()) { ?>
<table id="tbl_view_pharmacy_stock_movementlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_pharmacy_stock_movement_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_pharmacy_stock_movement_list->renderListOptions();

// Render list options (header, left)
$view_pharmacy_stock_movement_list->ListOptions->render("header", "left");
?>
<?php if ($view_pharmacy_stock_movement->id->Visible) { // id ?>
	<?php if ($view_pharmacy_stock_movement->sortUrl($view_pharmacy_stock_movement->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_pharmacy_stock_movement->id->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_movement_id" class="view_pharmacy_stock_movement_id"><div class="ew-table-header-caption"><?php echo $view_pharmacy_stock_movement->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_pharmacy_stock_movement->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_stock_movement->SortUrl($view_pharmacy_stock_movement->id) ?>',1);"><div id="elh_view_pharmacy_stock_movement_id" class="view_pharmacy_stock_movement_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_stock_movement->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_stock_movement->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_stock_movement->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_stock_movement->PRC->Visible) { // PRC ?>
	<?php if ($view_pharmacy_stock_movement->sortUrl($view_pharmacy_stock_movement->PRC) == "") { ?>
		<th data-name="PRC" class="<?php echo $view_pharmacy_stock_movement->PRC->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_movement_PRC" class="view_pharmacy_stock_movement_PRC"><div class="ew-table-header-caption"><?php echo $view_pharmacy_stock_movement->PRC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRC" class="<?php echo $view_pharmacy_stock_movement->PRC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_stock_movement->SortUrl($view_pharmacy_stock_movement->PRC) ?>',1);"><div id="elh_view_pharmacy_stock_movement_PRC" class="view_pharmacy_stock_movement_PRC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_stock_movement->PRC->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_stock_movement->PRC->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_stock_movement->PRC->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_stock_movement->PrName->Visible) { // PrName ?>
	<?php if ($view_pharmacy_stock_movement->sortUrl($view_pharmacy_stock_movement->PrName) == "") { ?>
		<th data-name="PrName" class="<?php echo $view_pharmacy_stock_movement->PrName->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_movement_PrName" class="view_pharmacy_stock_movement_PrName"><div class="ew-table-header-caption"><?php echo $view_pharmacy_stock_movement->PrName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrName" class="<?php echo $view_pharmacy_stock_movement->PrName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_stock_movement->SortUrl($view_pharmacy_stock_movement->PrName) ?>',1);"><div id="elh_view_pharmacy_stock_movement_PrName" class="view_pharmacy_stock_movement_PrName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_stock_movement->PrName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_stock_movement->PrName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_stock_movement->PrName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_stock_movement->OpeningStk->Visible) { // OpeningStk ?>
	<?php if ($view_pharmacy_stock_movement->sortUrl($view_pharmacy_stock_movement->OpeningStk) == "") { ?>
		<th data-name="OpeningStk" class="<?php echo $view_pharmacy_stock_movement->OpeningStk->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_movement_OpeningStk" class="view_pharmacy_stock_movement_OpeningStk"><div class="ew-table-header-caption"><?php echo $view_pharmacy_stock_movement->OpeningStk->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OpeningStk" class="<?php echo $view_pharmacy_stock_movement->OpeningStk->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_stock_movement->SortUrl($view_pharmacy_stock_movement->OpeningStk) ?>',1);"><div id="elh_view_pharmacy_stock_movement_OpeningStk" class="view_pharmacy_stock_movement_OpeningStk">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_stock_movement->OpeningStk->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_stock_movement->OpeningStk->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_stock_movement->OpeningStk->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_stock_movement->PurchaseQty->Visible) { // PurchaseQty ?>
	<?php if ($view_pharmacy_stock_movement->sortUrl($view_pharmacy_stock_movement->PurchaseQty) == "") { ?>
		<th data-name="PurchaseQty" class="<?php echo $view_pharmacy_stock_movement->PurchaseQty->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_movement_PurchaseQty" class="view_pharmacy_stock_movement_PurchaseQty"><div class="ew-table-header-caption"><?php echo $view_pharmacy_stock_movement->PurchaseQty->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PurchaseQty" class="<?php echo $view_pharmacy_stock_movement->PurchaseQty->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_stock_movement->SortUrl($view_pharmacy_stock_movement->PurchaseQty) ?>',1);"><div id="elh_view_pharmacy_stock_movement_PurchaseQty" class="view_pharmacy_stock_movement_PurchaseQty">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_stock_movement->PurchaseQty->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_stock_movement->PurchaseQty->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_stock_movement->PurchaseQty->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_stock_movement->SalesQty->Visible) { // SalesQty ?>
	<?php if ($view_pharmacy_stock_movement->sortUrl($view_pharmacy_stock_movement->SalesQty) == "") { ?>
		<th data-name="SalesQty" class="<?php echo $view_pharmacy_stock_movement->SalesQty->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_movement_SalesQty" class="view_pharmacy_stock_movement_SalesQty"><div class="ew-table-header-caption"><?php echo $view_pharmacy_stock_movement->SalesQty->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SalesQty" class="<?php echo $view_pharmacy_stock_movement->SalesQty->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_stock_movement->SortUrl($view_pharmacy_stock_movement->SalesQty) ?>',1);"><div id="elh_view_pharmacy_stock_movement_SalesQty" class="view_pharmacy_stock_movement_SalesQty">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_stock_movement->SalesQty->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_stock_movement->SalesQty->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_stock_movement->SalesQty->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_stock_movement->ClosingStk->Visible) { // ClosingStk ?>
	<?php if ($view_pharmacy_stock_movement->sortUrl($view_pharmacy_stock_movement->ClosingStk) == "") { ?>
		<th data-name="ClosingStk" class="<?php echo $view_pharmacy_stock_movement->ClosingStk->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_movement_ClosingStk" class="view_pharmacy_stock_movement_ClosingStk"><div class="ew-table-header-caption"><?php echo $view_pharmacy_stock_movement->ClosingStk->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ClosingStk" class="<?php echo $view_pharmacy_stock_movement->ClosingStk->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_stock_movement->SortUrl($view_pharmacy_stock_movement->ClosingStk) ?>',1);"><div id="elh_view_pharmacy_stock_movement_ClosingStk" class="view_pharmacy_stock_movement_ClosingStk">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_stock_movement->ClosingStk->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_stock_movement->ClosingStk->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_stock_movement->ClosingStk->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_stock_movement->PurchasefreeQty->Visible) { // PurchasefreeQty ?>
	<?php if ($view_pharmacy_stock_movement->sortUrl($view_pharmacy_stock_movement->PurchasefreeQty) == "") { ?>
		<th data-name="PurchasefreeQty" class="<?php echo $view_pharmacy_stock_movement->PurchasefreeQty->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_movement_PurchasefreeQty" class="view_pharmacy_stock_movement_PurchasefreeQty"><div class="ew-table-header-caption"><?php echo $view_pharmacy_stock_movement->PurchasefreeQty->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PurchasefreeQty" class="<?php echo $view_pharmacy_stock_movement->PurchasefreeQty->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_stock_movement->SortUrl($view_pharmacy_stock_movement->PurchasefreeQty) ?>',1);"><div id="elh_view_pharmacy_stock_movement_PurchasefreeQty" class="view_pharmacy_stock_movement_PurchasefreeQty">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_stock_movement->PurchasefreeQty->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_stock_movement->PurchasefreeQty->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_stock_movement->PurchasefreeQty->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_stock_movement->TransferingQty->Visible) { // TransferingQty ?>
	<?php if ($view_pharmacy_stock_movement->sortUrl($view_pharmacy_stock_movement->TransferingQty) == "") { ?>
		<th data-name="TransferingQty" class="<?php echo $view_pharmacy_stock_movement->TransferingQty->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_movement_TransferingQty" class="view_pharmacy_stock_movement_TransferingQty"><div class="ew-table-header-caption"><?php echo $view_pharmacy_stock_movement->TransferingQty->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TransferingQty" class="<?php echo $view_pharmacy_stock_movement->TransferingQty->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_stock_movement->SortUrl($view_pharmacy_stock_movement->TransferingQty) ?>',1);"><div id="elh_view_pharmacy_stock_movement_TransferingQty" class="view_pharmacy_stock_movement_TransferingQty">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_stock_movement->TransferingQty->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_stock_movement->TransferingQty->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_stock_movement->TransferingQty->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_stock_movement->UnitPurchaseRate->Visible) { // UnitPurchaseRate ?>
	<?php if ($view_pharmacy_stock_movement->sortUrl($view_pharmacy_stock_movement->UnitPurchaseRate) == "") { ?>
		<th data-name="UnitPurchaseRate" class="<?php echo $view_pharmacy_stock_movement->UnitPurchaseRate->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_movement_UnitPurchaseRate" class="view_pharmacy_stock_movement_UnitPurchaseRate"><div class="ew-table-header-caption"><?php echo $view_pharmacy_stock_movement->UnitPurchaseRate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UnitPurchaseRate" class="<?php echo $view_pharmacy_stock_movement->UnitPurchaseRate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_stock_movement->SortUrl($view_pharmacy_stock_movement->UnitPurchaseRate) ?>',1);"><div id="elh_view_pharmacy_stock_movement_UnitPurchaseRate" class="view_pharmacy_stock_movement_UnitPurchaseRate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_stock_movement->UnitPurchaseRate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_stock_movement->UnitPurchaseRate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_stock_movement->UnitPurchaseRate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_stock_movement->UnitSaleRate->Visible) { // UnitSaleRate ?>
	<?php if ($view_pharmacy_stock_movement->sortUrl($view_pharmacy_stock_movement->UnitSaleRate) == "") { ?>
		<th data-name="UnitSaleRate" class="<?php echo $view_pharmacy_stock_movement->UnitSaleRate->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_movement_UnitSaleRate" class="view_pharmacy_stock_movement_UnitSaleRate"><div class="ew-table-header-caption"><?php echo $view_pharmacy_stock_movement->UnitSaleRate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UnitSaleRate" class="<?php echo $view_pharmacy_stock_movement->UnitSaleRate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_stock_movement->SortUrl($view_pharmacy_stock_movement->UnitSaleRate) ?>',1);"><div id="elh_view_pharmacy_stock_movement_UnitSaleRate" class="view_pharmacy_stock_movement_UnitSaleRate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_stock_movement->UnitSaleRate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_stock_movement->UnitSaleRate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_stock_movement->UnitSaleRate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_stock_movement->CreatedDate->Visible) { // CreatedDate ?>
	<?php if ($view_pharmacy_stock_movement->sortUrl($view_pharmacy_stock_movement->CreatedDate) == "") { ?>
		<th data-name="CreatedDate" class="<?php echo $view_pharmacy_stock_movement->CreatedDate->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_movement_CreatedDate" class="view_pharmacy_stock_movement_CreatedDate"><div class="ew-table-header-caption"><?php echo $view_pharmacy_stock_movement->CreatedDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CreatedDate" class="<?php echo $view_pharmacy_stock_movement->CreatedDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_stock_movement->SortUrl($view_pharmacy_stock_movement->CreatedDate) ?>',1);"><div id="elh_view_pharmacy_stock_movement_CreatedDate" class="view_pharmacy_stock_movement_CreatedDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_stock_movement->CreatedDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_stock_movement->CreatedDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_stock_movement->CreatedDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_stock_movement->HospID->Visible) { // HospID ?>
	<?php if ($view_pharmacy_stock_movement->sortUrl($view_pharmacy_stock_movement->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_pharmacy_stock_movement->HospID->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_movement_HospID" class="view_pharmacy_stock_movement_HospID"><div class="ew-table-header-caption"><?php echo $view_pharmacy_stock_movement->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_pharmacy_stock_movement->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_stock_movement->SortUrl($view_pharmacy_stock_movement->HospID) ?>',1);"><div id="elh_view_pharmacy_stock_movement_HospID" class="view_pharmacy_stock_movement_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_stock_movement->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_stock_movement->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_stock_movement->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_stock_movement->BRCODE->Visible) { // BRCODE ?>
	<?php if ($view_pharmacy_stock_movement->sortUrl($view_pharmacy_stock_movement->BRCODE) == "") { ?>
		<th data-name="BRCODE" class="<?php echo $view_pharmacy_stock_movement->BRCODE->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_movement_BRCODE" class="view_pharmacy_stock_movement_BRCODE"><div class="ew-table-header-caption"><?php echo $view_pharmacy_stock_movement->BRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BRCODE" class="<?php echo $view_pharmacy_stock_movement->BRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_stock_movement->SortUrl($view_pharmacy_stock_movement->BRCODE) ?>',1);"><div id="elh_view_pharmacy_stock_movement_BRCODE" class="view_pharmacy_stock_movement_BRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_stock_movement->BRCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_stock_movement->BRCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_stock_movement->BRCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_pharmacy_stock_movement_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_pharmacy_stock_movement->ExportAll && $view_pharmacy_stock_movement->isExport()) {
	$view_pharmacy_stock_movement_list->StopRec = $view_pharmacy_stock_movement_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_pharmacy_stock_movement_list->TotalRecs > $view_pharmacy_stock_movement_list->StartRec + $view_pharmacy_stock_movement_list->DisplayRecs - 1)
		$view_pharmacy_stock_movement_list->StopRec = $view_pharmacy_stock_movement_list->StartRec + $view_pharmacy_stock_movement_list->DisplayRecs - 1;
	else
		$view_pharmacy_stock_movement_list->StopRec = $view_pharmacy_stock_movement_list->TotalRecs;
}
$view_pharmacy_stock_movement_list->RecCnt = $view_pharmacy_stock_movement_list->StartRec - 1;
if ($view_pharmacy_stock_movement_list->Recordset && !$view_pharmacy_stock_movement_list->Recordset->EOF) {
	$view_pharmacy_stock_movement_list->Recordset->moveFirst();
	$selectLimit = $view_pharmacy_stock_movement_list->UseSelectLimit;
	if (!$selectLimit && $view_pharmacy_stock_movement_list->StartRec > 1)
		$view_pharmacy_stock_movement_list->Recordset->move($view_pharmacy_stock_movement_list->StartRec - 1);
} elseif (!$view_pharmacy_stock_movement->AllowAddDeleteRow && $view_pharmacy_stock_movement_list->StopRec == 0) {
	$view_pharmacy_stock_movement_list->StopRec = $view_pharmacy_stock_movement->GridAddRowCount;
}

// Initialize aggregate
$view_pharmacy_stock_movement->RowType = ROWTYPE_AGGREGATEINIT;
$view_pharmacy_stock_movement->resetAttributes();
$view_pharmacy_stock_movement_list->renderRow();
while ($view_pharmacy_stock_movement_list->RecCnt < $view_pharmacy_stock_movement_list->StopRec) {
	$view_pharmacy_stock_movement_list->RecCnt++;
	if ($view_pharmacy_stock_movement_list->RecCnt >= $view_pharmacy_stock_movement_list->StartRec) {
		$view_pharmacy_stock_movement_list->RowCnt++;

		// Set up key count
		$view_pharmacy_stock_movement_list->KeyCount = $view_pharmacy_stock_movement_list->RowIndex;

		// Init row class and style
		$view_pharmacy_stock_movement->resetAttributes();
		$view_pharmacy_stock_movement->CssClass = "";
		if ($view_pharmacy_stock_movement->isGridAdd()) {
		} else {
			$view_pharmacy_stock_movement_list->loadRowValues($view_pharmacy_stock_movement_list->Recordset); // Load row values
		}
		$view_pharmacy_stock_movement->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_pharmacy_stock_movement->RowAttrs = array_merge($view_pharmacy_stock_movement->RowAttrs, array('data-rowindex'=>$view_pharmacy_stock_movement_list->RowCnt, 'id'=>'r' . $view_pharmacy_stock_movement_list->RowCnt . '_view_pharmacy_stock_movement', 'data-rowtype'=>$view_pharmacy_stock_movement->RowType));

		// Render row
		$view_pharmacy_stock_movement_list->renderRow();

		// Render list options
		$view_pharmacy_stock_movement_list->renderListOptions();
?>
	<tr<?php echo $view_pharmacy_stock_movement->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_pharmacy_stock_movement_list->ListOptions->render("body", "left", $view_pharmacy_stock_movement_list->RowCnt);
?>
	<?php if ($view_pharmacy_stock_movement->id->Visible) { // id ?>
		<td data-name="id"<?php echo $view_pharmacy_stock_movement->id->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_stock_movement_list->RowCnt ?>_view_pharmacy_stock_movement_id" class="view_pharmacy_stock_movement_id">
<span<?php echo $view_pharmacy_stock_movement->id->viewAttributes() ?>>
<?php echo $view_pharmacy_stock_movement->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_stock_movement->PRC->Visible) { // PRC ?>
		<td data-name="PRC"<?php echo $view_pharmacy_stock_movement->PRC->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_stock_movement_list->RowCnt ?>_view_pharmacy_stock_movement_PRC" class="view_pharmacy_stock_movement_PRC">
<span<?php echo $view_pharmacy_stock_movement->PRC->viewAttributes() ?>>
<?php echo $view_pharmacy_stock_movement->PRC->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_stock_movement->PrName->Visible) { // PrName ?>
		<td data-name="PrName"<?php echo $view_pharmacy_stock_movement->PrName->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_stock_movement_list->RowCnt ?>_view_pharmacy_stock_movement_PrName" class="view_pharmacy_stock_movement_PrName">
<span<?php echo $view_pharmacy_stock_movement->PrName->viewAttributes() ?>>
<?php echo $view_pharmacy_stock_movement->PrName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_stock_movement->OpeningStk->Visible) { // OpeningStk ?>
		<td data-name="OpeningStk"<?php echo $view_pharmacy_stock_movement->OpeningStk->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_stock_movement_list->RowCnt ?>_view_pharmacy_stock_movement_OpeningStk" class="view_pharmacy_stock_movement_OpeningStk">
<span<?php echo $view_pharmacy_stock_movement->OpeningStk->viewAttributes() ?>>
<?php echo $view_pharmacy_stock_movement->OpeningStk->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_stock_movement->PurchaseQty->Visible) { // PurchaseQty ?>
		<td data-name="PurchaseQty"<?php echo $view_pharmacy_stock_movement->PurchaseQty->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_stock_movement_list->RowCnt ?>_view_pharmacy_stock_movement_PurchaseQty" class="view_pharmacy_stock_movement_PurchaseQty">
<span<?php echo $view_pharmacy_stock_movement->PurchaseQty->viewAttributes() ?>>
<?php echo $view_pharmacy_stock_movement->PurchaseQty->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_stock_movement->SalesQty->Visible) { // SalesQty ?>
		<td data-name="SalesQty"<?php echo $view_pharmacy_stock_movement->SalesQty->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_stock_movement_list->RowCnt ?>_view_pharmacy_stock_movement_SalesQty" class="view_pharmacy_stock_movement_SalesQty">
<span<?php echo $view_pharmacy_stock_movement->SalesQty->viewAttributes() ?>>
<?php echo $view_pharmacy_stock_movement->SalesQty->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_stock_movement->ClosingStk->Visible) { // ClosingStk ?>
		<td data-name="ClosingStk"<?php echo $view_pharmacy_stock_movement->ClosingStk->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_stock_movement_list->RowCnt ?>_view_pharmacy_stock_movement_ClosingStk" class="view_pharmacy_stock_movement_ClosingStk">
<span<?php echo $view_pharmacy_stock_movement->ClosingStk->viewAttributes() ?>>
<?php echo $view_pharmacy_stock_movement->ClosingStk->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_stock_movement->PurchasefreeQty->Visible) { // PurchasefreeQty ?>
		<td data-name="PurchasefreeQty"<?php echo $view_pharmacy_stock_movement->PurchasefreeQty->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_stock_movement_list->RowCnt ?>_view_pharmacy_stock_movement_PurchasefreeQty" class="view_pharmacy_stock_movement_PurchasefreeQty">
<span<?php echo $view_pharmacy_stock_movement->PurchasefreeQty->viewAttributes() ?>>
<?php echo $view_pharmacy_stock_movement->PurchasefreeQty->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_stock_movement->TransferingQty->Visible) { // TransferingQty ?>
		<td data-name="TransferingQty"<?php echo $view_pharmacy_stock_movement->TransferingQty->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_stock_movement_list->RowCnt ?>_view_pharmacy_stock_movement_TransferingQty" class="view_pharmacy_stock_movement_TransferingQty">
<span<?php echo $view_pharmacy_stock_movement->TransferingQty->viewAttributes() ?>>
<?php echo $view_pharmacy_stock_movement->TransferingQty->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_stock_movement->UnitPurchaseRate->Visible) { // UnitPurchaseRate ?>
		<td data-name="UnitPurchaseRate"<?php echo $view_pharmacy_stock_movement->UnitPurchaseRate->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_stock_movement_list->RowCnt ?>_view_pharmacy_stock_movement_UnitPurchaseRate" class="view_pharmacy_stock_movement_UnitPurchaseRate">
<span<?php echo $view_pharmacy_stock_movement->UnitPurchaseRate->viewAttributes() ?>>
<?php echo $view_pharmacy_stock_movement->UnitPurchaseRate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_stock_movement->UnitSaleRate->Visible) { // UnitSaleRate ?>
		<td data-name="UnitSaleRate"<?php echo $view_pharmacy_stock_movement->UnitSaleRate->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_stock_movement_list->RowCnt ?>_view_pharmacy_stock_movement_UnitSaleRate" class="view_pharmacy_stock_movement_UnitSaleRate">
<span<?php echo $view_pharmacy_stock_movement->UnitSaleRate->viewAttributes() ?>>
<?php echo $view_pharmacy_stock_movement->UnitSaleRate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_stock_movement->CreatedDate->Visible) { // CreatedDate ?>
		<td data-name="CreatedDate"<?php echo $view_pharmacy_stock_movement->CreatedDate->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_stock_movement_list->RowCnt ?>_view_pharmacy_stock_movement_CreatedDate" class="view_pharmacy_stock_movement_CreatedDate">
<span<?php echo $view_pharmacy_stock_movement->CreatedDate->viewAttributes() ?>>
<?php echo $view_pharmacy_stock_movement->CreatedDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_stock_movement->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_pharmacy_stock_movement->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_stock_movement_list->RowCnt ?>_view_pharmacy_stock_movement_HospID" class="view_pharmacy_stock_movement_HospID">
<span<?php echo $view_pharmacy_stock_movement->HospID->viewAttributes() ?>>
<?php echo $view_pharmacy_stock_movement->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_stock_movement->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE"<?php echo $view_pharmacy_stock_movement->BRCODE->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_stock_movement_list->RowCnt ?>_view_pharmacy_stock_movement_BRCODE" class="view_pharmacy_stock_movement_BRCODE">
<span<?php echo $view_pharmacy_stock_movement->BRCODE->viewAttributes() ?>>
<?php echo $view_pharmacy_stock_movement->BRCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_pharmacy_stock_movement_list->ListOptions->render("body", "right", $view_pharmacy_stock_movement_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_pharmacy_stock_movement->isGridAdd())
		$view_pharmacy_stock_movement_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_pharmacy_stock_movement->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_pharmacy_stock_movement_list->Recordset)
	$view_pharmacy_stock_movement_list->Recordset->Close();
?>
<?php if (!$view_pharmacy_stock_movement->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_pharmacy_stock_movement->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_pharmacy_stock_movement_list->Pager)) $view_pharmacy_stock_movement_list->Pager = new NumericPager($view_pharmacy_stock_movement_list->StartRec, $view_pharmacy_stock_movement_list->DisplayRecs, $view_pharmacy_stock_movement_list->TotalRecs, $view_pharmacy_stock_movement_list->RecRange, $view_pharmacy_stock_movement_list->AutoHidePager) ?>
<?php if ($view_pharmacy_stock_movement_list->Pager->RecordCount > 0 && $view_pharmacy_stock_movement_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_pharmacy_stock_movement_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_stock_movement_list->pageUrl() ?>start=<?php echo $view_pharmacy_stock_movement_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_stock_movement_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_stock_movement_list->pageUrl() ?>start=<?php echo $view_pharmacy_stock_movement_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_pharmacy_stock_movement_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_pharmacy_stock_movement_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_stock_movement_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_stock_movement_list->pageUrl() ?>start=<?php echo $view_pharmacy_stock_movement_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_stock_movement_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_stock_movement_list->pageUrl() ?>start=<?php echo $view_pharmacy_stock_movement_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_pharmacy_stock_movement_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_pharmacy_stock_movement_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_pharmacy_stock_movement_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_pharmacy_stock_movement_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_pharmacy_stock_movement_list->TotalRecs > 0 && (!$view_pharmacy_stock_movement_list->AutoHidePageSizeSelector || $view_pharmacy_stock_movement_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_pharmacy_stock_movement">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_pharmacy_stock_movement_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_pharmacy_stock_movement_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_pharmacy_stock_movement_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_pharmacy_stock_movement_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_pharmacy_stock_movement_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_pharmacy_stock_movement_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_pharmacy_stock_movement->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_stock_movement_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_pharmacy_stock_movement_list->TotalRecs == 0 && !$view_pharmacy_stock_movement->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_stock_movement_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_pharmacy_stock_movement_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_pharmacy_stock_movement->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_pharmacy_stock_movement->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_pharmacy_stock_movement", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_pharmacy_stock_movement_list->terminate();
?>