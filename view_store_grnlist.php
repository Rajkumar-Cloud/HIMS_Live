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
$view_store_grn_list = new view_store_grn_list();

// Run the page
$view_store_grn_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_store_grn_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_store_grn->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_store_grnlist = currentForm = new ew.Form("fview_store_grnlist", "list");
fview_store_grnlist.formKeyCountName = '<?php echo $view_store_grn_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_store_grnlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_store_grnlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_store_grnlist.lists["x_PrName"] = <?php echo $view_store_grn_list->PrName->Lookup->toClientList() ?>;
fview_store_grnlist.lists["x_PrName"].options = <?php echo JsonEncode($view_store_grn_list->PrName->lookupOptions()) ?>;
fview_store_grnlist.autoSuggests["x_PrName"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
var fview_store_grnlistsrch = currentSearchForm = new ew.Form("fview_store_grnlistsrch");

// Filters
fview_store_grnlistsrch.filterList = <?php echo $view_store_grn_list->getFilterList() ?>;
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
<?php if (!$view_store_grn->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_store_grn_list->TotalRecs > 0 && $view_store_grn_list->ExportOptions->visible()) { ?>
<?php $view_store_grn_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_store_grn_list->ImportOptions->visible()) { ?>
<?php $view_store_grn_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_store_grn_list->SearchOptions->visible()) { ?>
<?php $view_store_grn_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_store_grn_list->FilterOptions->visible()) { ?>
<?php $view_store_grn_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$view_store_grn->isExport() || EXPORT_MASTER_RECORD && $view_store_grn->isExport("print")) { ?>
<?php
if ($view_store_grn_list->DbMasterFilter <> "" && $view_store_grn->getCurrentMasterTable() == "store_grn") {
	if ($view_store_grn_list->MasterRecordExists) {
		include_once "store_grnmaster.php";
	}
}
?>
<?php } ?>
<?php
$view_store_grn_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_store_grn->isExport() && !$view_store_grn->CurrentAction) { ?>
<form name="fview_store_grnlistsrch" id="fview_store_grnlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_store_grn_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_store_grnlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_store_grn">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_store_grn_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_store_grn_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_store_grn_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_store_grn_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_store_grn_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_store_grn_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_store_grn_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_store_grn_list->showPageHeader(); ?>
<?php
$view_store_grn_list->showMessage();
?>
<?php if ($view_store_grn_list->TotalRecs > 0 || $view_store_grn->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_store_grn_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_store_grn">
<?php if (!$view_store_grn->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_store_grn->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_store_grn_list->Pager)) $view_store_grn_list->Pager = new NumericPager($view_store_grn_list->StartRec, $view_store_grn_list->DisplayRecs, $view_store_grn_list->TotalRecs, $view_store_grn_list->RecRange, $view_store_grn_list->AutoHidePager) ?>
<?php if ($view_store_grn_list->Pager->RecordCount > 0 && $view_store_grn_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_store_grn_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_store_grn_list->pageUrl() ?>start=<?php echo $view_store_grn_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_store_grn_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_store_grn_list->pageUrl() ?>start=<?php echo $view_store_grn_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_store_grn_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_store_grn_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_store_grn_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_store_grn_list->pageUrl() ?>start=<?php echo $view_store_grn_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_store_grn_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_store_grn_list->pageUrl() ?>start=<?php echo $view_store_grn_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_store_grn_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_store_grn_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_store_grn_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_store_grn_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_store_grn_list->TotalRecs > 0 && (!$view_store_grn_list->AutoHidePageSizeSelector || $view_store_grn_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_store_grn">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_store_grn_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_store_grn_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_store_grn_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_store_grn_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_store_grn_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_store_grn_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_store_grn->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_store_grn_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_store_grnlist" id="fview_store_grnlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_store_grn_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_store_grn_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_store_grn">
<?php if ($view_store_grn->getCurrentMasterTable() == "store_grn" && $view_store_grn->CurrentAction) { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="store_grn">
<input type="hidden" name="fk_id" value="<?php echo $view_store_grn->grnid->getSessionValue() ?>">
<?php } ?>
<div id="gmp_view_store_grn" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_store_grn_list->TotalRecs > 0 || $view_store_grn->isGridEdit()) { ?>
<table id="tbl_view_store_grnlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_store_grn_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_store_grn_list->renderListOptions();

// Render list options (header, left)
$view_store_grn_list->ListOptions->render("header", "left");
?>
<?php if ($view_store_grn->PRC->Visible) { // PRC ?>
	<?php if ($view_store_grn->sortUrl($view_store_grn->PRC) == "") { ?>
		<th data-name="PRC" class="<?php echo $view_store_grn->PRC->headerCellClass() ?>"><div id="elh_view_store_grn_PRC" class="view_store_grn_PRC"><div class="ew-table-header-caption"><?php echo $view_store_grn->PRC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRC" class="<?php echo $view_store_grn->PRC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_store_grn->SortUrl($view_store_grn->PRC) ?>',1);"><div id="elh_view_store_grn_PRC" class="view_store_grn_PRC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_grn->PRC->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_store_grn->PRC->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_grn->PRC->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->PrName->Visible) { // PrName ?>
	<?php if ($view_store_grn->sortUrl($view_store_grn->PrName) == "") { ?>
		<th data-name="PrName" class="<?php echo $view_store_grn->PrName->headerCellClass() ?>"><div id="elh_view_store_grn_PrName" class="view_store_grn_PrName"><div class="ew-table-header-caption"><?php echo $view_store_grn->PrName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrName" class="<?php echo $view_store_grn->PrName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_store_grn->SortUrl($view_store_grn->PrName) ?>',1);"><div id="elh_view_store_grn_PrName" class="view_store_grn_PrName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_grn->PrName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_store_grn->PrName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_grn->PrName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->GrnQuantity->Visible) { // GrnQuantity ?>
	<?php if ($view_store_grn->sortUrl($view_store_grn->GrnQuantity) == "") { ?>
		<th data-name="GrnQuantity" class="<?php echo $view_store_grn->GrnQuantity->headerCellClass() ?>"><div id="elh_view_store_grn_GrnQuantity" class="view_store_grn_GrnQuantity"><div class="ew-table-header-caption"><?php echo $view_store_grn->GrnQuantity->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GrnQuantity" class="<?php echo $view_store_grn->GrnQuantity->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_store_grn->SortUrl($view_store_grn->GrnQuantity) ?>',1);"><div id="elh_view_store_grn_GrnQuantity" class="view_store_grn_GrnQuantity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_grn->GrnQuantity->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_grn->GrnQuantity->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_grn->GrnQuantity->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->FreeQty->Visible) { // FreeQty ?>
	<?php if ($view_store_grn->sortUrl($view_store_grn->FreeQty) == "") { ?>
		<th data-name="FreeQty" class="<?php echo $view_store_grn->FreeQty->headerCellClass() ?>"><div id="elh_view_store_grn_FreeQty" class="view_store_grn_FreeQty"><div class="ew-table-header-caption"><?php echo $view_store_grn->FreeQty->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FreeQty" class="<?php echo $view_store_grn->FreeQty->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_store_grn->SortUrl($view_store_grn->FreeQty) ?>',1);"><div id="elh_view_store_grn_FreeQty" class="view_store_grn_FreeQty">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_grn->FreeQty->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_grn->FreeQty->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_grn->FreeQty->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->MFRCODE->Visible) { // MFRCODE ?>
	<?php if ($view_store_grn->sortUrl($view_store_grn->MFRCODE) == "") { ?>
		<th data-name="MFRCODE" class="<?php echo $view_store_grn->MFRCODE->headerCellClass() ?>"><div id="elh_view_store_grn_MFRCODE" class="view_store_grn_MFRCODE"><div class="ew-table-header-caption"><?php echo $view_store_grn->MFRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MFRCODE" class="<?php echo $view_store_grn->MFRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_store_grn->SortUrl($view_store_grn->MFRCODE) ?>',1);"><div id="elh_view_store_grn_MFRCODE" class="view_store_grn_MFRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_grn->MFRCODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_store_grn->MFRCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_grn->MFRCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->PUnit->Visible) { // PUnit ?>
	<?php if ($view_store_grn->sortUrl($view_store_grn->PUnit) == "") { ?>
		<th data-name="PUnit" class="<?php echo $view_store_grn->PUnit->headerCellClass() ?>"><div id="elh_view_store_grn_PUnit" class="view_store_grn_PUnit"><div class="ew-table-header-caption"><?php echo $view_store_grn->PUnit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PUnit" class="<?php echo $view_store_grn->PUnit->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_store_grn->SortUrl($view_store_grn->PUnit) ?>',1);"><div id="elh_view_store_grn_PUnit" class="view_store_grn_PUnit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_grn->PUnit->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_grn->PUnit->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_grn->PUnit->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->SUnit->Visible) { // SUnit ?>
	<?php if ($view_store_grn->sortUrl($view_store_grn->SUnit) == "") { ?>
		<th data-name="SUnit" class="<?php echo $view_store_grn->SUnit->headerCellClass() ?>"><div id="elh_view_store_grn_SUnit" class="view_store_grn_SUnit"><div class="ew-table-header-caption"><?php echo $view_store_grn->SUnit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SUnit" class="<?php echo $view_store_grn->SUnit->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_store_grn->SortUrl($view_store_grn->SUnit) ?>',1);"><div id="elh_view_store_grn_SUnit" class="view_store_grn_SUnit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_grn->SUnit->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_grn->SUnit->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_grn->SUnit->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->MRP->Visible) { // MRP ?>
	<?php if ($view_store_grn->sortUrl($view_store_grn->MRP) == "") { ?>
		<th data-name="MRP" class="<?php echo $view_store_grn->MRP->headerCellClass() ?>"><div id="elh_view_store_grn_MRP" class="view_store_grn_MRP"><div class="ew-table-header-caption"><?php echo $view_store_grn->MRP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MRP" class="<?php echo $view_store_grn->MRP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_store_grn->SortUrl($view_store_grn->MRP) ?>',1);"><div id="elh_view_store_grn_MRP" class="view_store_grn_MRP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_grn->MRP->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_grn->MRP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_grn->MRP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->PurValue->Visible) { // PurValue ?>
	<?php if ($view_store_grn->sortUrl($view_store_grn->PurValue) == "") { ?>
		<th data-name="PurValue" class="<?php echo $view_store_grn->PurValue->headerCellClass() ?>"><div id="elh_view_store_grn_PurValue" class="view_store_grn_PurValue"><div class="ew-table-header-caption"><?php echo $view_store_grn->PurValue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PurValue" class="<?php echo $view_store_grn->PurValue->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_store_grn->SortUrl($view_store_grn->PurValue) ?>',1);"><div id="elh_view_store_grn_PurValue" class="view_store_grn_PurValue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_grn->PurValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_grn->PurValue->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_grn->PurValue->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->Disc->Visible) { // Disc ?>
	<?php if ($view_store_grn->sortUrl($view_store_grn->Disc) == "") { ?>
		<th data-name="Disc" class="<?php echo $view_store_grn->Disc->headerCellClass() ?>"><div id="elh_view_store_grn_Disc" class="view_store_grn_Disc"><div class="ew-table-header-caption"><?php echo $view_store_grn->Disc->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Disc" class="<?php echo $view_store_grn->Disc->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_store_grn->SortUrl($view_store_grn->Disc) ?>',1);"><div id="elh_view_store_grn_Disc" class="view_store_grn_Disc">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_grn->Disc->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_grn->Disc->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_grn->Disc->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->PSGST->Visible) { // PSGST ?>
	<?php if ($view_store_grn->sortUrl($view_store_grn->PSGST) == "") { ?>
		<th data-name="PSGST" class="<?php echo $view_store_grn->PSGST->headerCellClass() ?>"><div id="elh_view_store_grn_PSGST" class="view_store_grn_PSGST"><div class="ew-table-header-caption"><?php echo $view_store_grn->PSGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PSGST" class="<?php echo $view_store_grn->PSGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_store_grn->SortUrl($view_store_grn->PSGST) ?>',1);"><div id="elh_view_store_grn_PSGST" class="view_store_grn_PSGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_grn->PSGST->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_store_grn->PSGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_grn->PSGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->PCGST->Visible) { // PCGST ?>
	<?php if ($view_store_grn->sortUrl($view_store_grn->PCGST) == "") { ?>
		<th data-name="PCGST" class="<?php echo $view_store_grn->PCGST->headerCellClass() ?>"><div id="elh_view_store_grn_PCGST" class="view_store_grn_PCGST"><div class="ew-table-header-caption"><?php echo $view_store_grn->PCGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PCGST" class="<?php echo $view_store_grn->PCGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_store_grn->SortUrl($view_store_grn->PCGST) ?>',1);"><div id="elh_view_store_grn_PCGST" class="view_store_grn_PCGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_grn->PCGST->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_store_grn->PCGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_grn->PCGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->PTax->Visible) { // PTax ?>
	<?php if ($view_store_grn->sortUrl($view_store_grn->PTax) == "") { ?>
		<th data-name="PTax" class="<?php echo $view_store_grn->PTax->headerCellClass() ?>"><div id="elh_view_store_grn_PTax" class="view_store_grn_PTax"><div class="ew-table-header-caption"><?php echo $view_store_grn->PTax->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PTax" class="<?php echo $view_store_grn->PTax->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_store_grn->SortUrl($view_store_grn->PTax) ?>',1);"><div id="elh_view_store_grn_PTax" class="view_store_grn_PTax">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_grn->PTax->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_grn->PTax->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_grn->PTax->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->ItemValue->Visible) { // ItemValue ?>
	<?php if ($view_store_grn->sortUrl($view_store_grn->ItemValue) == "") { ?>
		<th data-name="ItemValue" class="<?php echo $view_store_grn->ItemValue->headerCellClass() ?>"><div id="elh_view_store_grn_ItemValue" class="view_store_grn_ItemValue"><div class="ew-table-header-caption"><?php echo $view_store_grn->ItemValue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ItemValue" class="<?php echo $view_store_grn->ItemValue->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_store_grn->SortUrl($view_store_grn->ItemValue) ?>',1);"><div id="elh_view_store_grn_ItemValue" class="view_store_grn_ItemValue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_grn->ItemValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_grn->ItemValue->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_grn->ItemValue->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->SalTax->Visible) { // SalTax ?>
	<?php if ($view_store_grn->sortUrl($view_store_grn->SalTax) == "") { ?>
		<th data-name="SalTax" class="<?php echo $view_store_grn->SalTax->headerCellClass() ?>"><div id="elh_view_store_grn_SalTax" class="view_store_grn_SalTax"><div class="ew-table-header-caption"><?php echo $view_store_grn->SalTax->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SalTax" class="<?php echo $view_store_grn->SalTax->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_store_grn->SortUrl($view_store_grn->SalTax) ?>',1);"><div id="elh_view_store_grn_SalTax" class="view_store_grn_SalTax">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_grn->SalTax->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_grn->SalTax->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_grn->SalTax->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->BatchNo->Visible) { // BatchNo ?>
	<?php if ($view_store_grn->sortUrl($view_store_grn->BatchNo) == "") { ?>
		<th data-name="BatchNo" class="<?php echo $view_store_grn->BatchNo->headerCellClass() ?>"><div id="elh_view_store_grn_BatchNo" class="view_store_grn_BatchNo"><div class="ew-table-header-caption"><?php echo $view_store_grn->BatchNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BatchNo" class="<?php echo $view_store_grn->BatchNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_store_grn->SortUrl($view_store_grn->BatchNo) ?>',1);"><div id="elh_view_store_grn_BatchNo" class="view_store_grn_BatchNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_grn->BatchNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_store_grn->BatchNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_grn->BatchNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->ExpDate->Visible) { // ExpDate ?>
	<?php if ($view_store_grn->sortUrl($view_store_grn->ExpDate) == "") { ?>
		<th data-name="ExpDate" class="<?php echo $view_store_grn->ExpDate->headerCellClass() ?>"><div id="elh_view_store_grn_ExpDate" class="view_store_grn_ExpDate"><div class="ew-table-header-caption"><?php echo $view_store_grn->ExpDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ExpDate" class="<?php echo $view_store_grn->ExpDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_store_grn->SortUrl($view_store_grn->ExpDate) ?>',1);"><div id="elh_view_store_grn_ExpDate" class="view_store_grn_ExpDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_grn->ExpDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_grn->ExpDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_grn->ExpDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->Quantity->Visible) { // Quantity ?>
	<?php if ($view_store_grn->sortUrl($view_store_grn->Quantity) == "") { ?>
		<th data-name="Quantity" class="<?php echo $view_store_grn->Quantity->headerCellClass() ?>"><div id="elh_view_store_grn_Quantity" class="view_store_grn_Quantity"><div class="ew-table-header-caption"><?php echo $view_store_grn->Quantity->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Quantity" class="<?php echo $view_store_grn->Quantity->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_store_grn->SortUrl($view_store_grn->Quantity) ?>',1);"><div id="elh_view_store_grn_Quantity" class="view_store_grn_Quantity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_grn->Quantity->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_grn->Quantity->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_grn->Quantity->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->SalRate->Visible) { // SalRate ?>
	<?php if ($view_store_grn->sortUrl($view_store_grn->SalRate) == "") { ?>
		<th data-name="SalRate" class="<?php echo $view_store_grn->SalRate->headerCellClass() ?>"><div id="elh_view_store_grn_SalRate" class="view_store_grn_SalRate"><div class="ew-table-header-caption"><?php echo $view_store_grn->SalRate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SalRate" class="<?php echo $view_store_grn->SalRate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_store_grn->SortUrl($view_store_grn->SalRate) ?>',1);"><div id="elh_view_store_grn_SalRate" class="view_store_grn_SalRate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_grn->SalRate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_grn->SalRate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_grn->SalRate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->SSGST->Visible) { // SSGST ?>
	<?php if ($view_store_grn->sortUrl($view_store_grn->SSGST) == "") { ?>
		<th data-name="SSGST" class="<?php echo $view_store_grn->SSGST->headerCellClass() ?>"><div id="elh_view_store_grn_SSGST" class="view_store_grn_SSGST"><div class="ew-table-header-caption"><?php echo $view_store_grn->SSGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SSGST" class="<?php echo $view_store_grn->SSGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_store_grn->SortUrl($view_store_grn->SSGST) ?>',1);"><div id="elh_view_store_grn_SSGST" class="view_store_grn_SSGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_grn->SSGST->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_store_grn->SSGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_grn->SSGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->SCGST->Visible) { // SCGST ?>
	<?php if ($view_store_grn->sortUrl($view_store_grn->SCGST) == "") { ?>
		<th data-name="SCGST" class="<?php echo $view_store_grn->SCGST->headerCellClass() ?>"><div id="elh_view_store_grn_SCGST" class="view_store_grn_SCGST"><div class="ew-table-header-caption"><?php echo $view_store_grn->SCGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SCGST" class="<?php echo $view_store_grn->SCGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_store_grn->SortUrl($view_store_grn->SCGST) ?>',1);"><div id="elh_view_store_grn_SCGST" class="view_store_grn_SCGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_grn->SCGST->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_store_grn->SCGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_grn->SCGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->BRCODE->Visible) { // BRCODE ?>
	<?php if ($view_store_grn->sortUrl($view_store_grn->BRCODE) == "") { ?>
		<th data-name="BRCODE" class="<?php echo $view_store_grn->BRCODE->headerCellClass() ?>"><div id="elh_view_store_grn_BRCODE" class="view_store_grn_BRCODE"><div class="ew-table-header-caption"><?php echo $view_store_grn->BRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BRCODE" class="<?php echo $view_store_grn->BRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_store_grn->SortUrl($view_store_grn->BRCODE) ?>',1);"><div id="elh_view_store_grn_BRCODE" class="view_store_grn_BRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_grn->BRCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_grn->BRCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_grn->BRCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->HSN->Visible) { // HSN ?>
	<?php if ($view_store_grn->sortUrl($view_store_grn->HSN) == "") { ?>
		<th data-name="HSN" class="<?php echo $view_store_grn->HSN->headerCellClass() ?>"><div id="elh_view_store_grn_HSN" class="view_store_grn_HSN"><div class="ew-table-header-caption"><?php echo $view_store_grn->HSN->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HSN" class="<?php echo $view_store_grn->HSN->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_store_grn->SortUrl($view_store_grn->HSN) ?>',1);"><div id="elh_view_store_grn_HSN" class="view_store_grn_HSN">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_grn->HSN->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_store_grn->HSN->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_grn->HSN->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->HospID->Visible) { // HospID ?>
	<?php if ($view_store_grn->sortUrl($view_store_grn->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_store_grn->HospID->headerCellClass() ?>"><div id="elh_view_store_grn_HospID" class="view_store_grn_HospID"><div class="ew-table-header-caption"><?php echo $view_store_grn->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_store_grn->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_store_grn->SortUrl($view_store_grn->HospID) ?>',1);"><div id="elh_view_store_grn_HospID" class="view_store_grn_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_grn->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_grn->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_grn->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->grncreatedby->Visible) { // grncreatedby ?>
	<?php if ($view_store_grn->sortUrl($view_store_grn->grncreatedby) == "") { ?>
		<th data-name="grncreatedby" class="<?php echo $view_store_grn->grncreatedby->headerCellClass() ?>"><div id="elh_view_store_grn_grncreatedby" class="view_store_grn_grncreatedby"><div class="ew-table-header-caption"><?php echo $view_store_grn->grncreatedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="grncreatedby" class="<?php echo $view_store_grn->grncreatedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_store_grn->SortUrl($view_store_grn->grncreatedby) ?>',1);"><div id="elh_view_store_grn_grncreatedby" class="view_store_grn_grncreatedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_grn->grncreatedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_grn->grncreatedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_grn->grncreatedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
	<?php if ($view_store_grn->sortUrl($view_store_grn->grncreatedDateTime) == "") { ?>
		<th data-name="grncreatedDateTime" class="<?php echo $view_store_grn->grncreatedDateTime->headerCellClass() ?>"><div id="elh_view_store_grn_grncreatedDateTime" class="view_store_grn_grncreatedDateTime"><div class="ew-table-header-caption"><?php echo $view_store_grn->grncreatedDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="grncreatedDateTime" class="<?php echo $view_store_grn->grncreatedDateTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_store_grn->SortUrl($view_store_grn->grncreatedDateTime) ?>',1);"><div id="elh_view_store_grn_grncreatedDateTime" class="view_store_grn_grncreatedDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_grn->grncreatedDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_grn->grncreatedDateTime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_grn->grncreatedDateTime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->grnModifiedby->Visible) { // grnModifiedby ?>
	<?php if ($view_store_grn->sortUrl($view_store_grn->grnModifiedby) == "") { ?>
		<th data-name="grnModifiedby" class="<?php echo $view_store_grn->grnModifiedby->headerCellClass() ?>"><div id="elh_view_store_grn_grnModifiedby" class="view_store_grn_grnModifiedby"><div class="ew-table-header-caption"><?php echo $view_store_grn->grnModifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="grnModifiedby" class="<?php echo $view_store_grn->grnModifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_store_grn->SortUrl($view_store_grn->grnModifiedby) ?>',1);"><div id="elh_view_store_grn_grnModifiedby" class="view_store_grn_grnModifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_grn->grnModifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_grn->grnModifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_grn->grnModifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
	<?php if ($view_store_grn->sortUrl($view_store_grn->grnModifiedDateTime) == "") { ?>
		<th data-name="grnModifiedDateTime" class="<?php echo $view_store_grn->grnModifiedDateTime->headerCellClass() ?>"><div id="elh_view_store_grn_grnModifiedDateTime" class="view_store_grn_grnModifiedDateTime"><div class="ew-table-header-caption"><?php echo $view_store_grn->grnModifiedDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="grnModifiedDateTime" class="<?php echo $view_store_grn->grnModifiedDateTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_store_grn->SortUrl($view_store_grn->grnModifiedDateTime) ?>',1);"><div id="elh_view_store_grn_grnModifiedDateTime" class="view_store_grn_grnModifiedDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_grn->grnModifiedDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_grn->grnModifiedDateTime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_grn->grnModifiedDateTime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->BillDate->Visible) { // BillDate ?>
	<?php if ($view_store_grn->sortUrl($view_store_grn->BillDate) == "") { ?>
		<th data-name="BillDate" class="<?php echo $view_store_grn->BillDate->headerCellClass() ?>"><div id="elh_view_store_grn_BillDate" class="view_store_grn_BillDate"><div class="ew-table-header-caption"><?php echo $view_store_grn->BillDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillDate" class="<?php echo $view_store_grn->BillDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_store_grn->SortUrl($view_store_grn->BillDate) ?>',1);"><div id="elh_view_store_grn_BillDate" class="view_store_grn_BillDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_grn->BillDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_grn->BillDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_grn->BillDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->CurStock->Visible) { // CurStock ?>
	<?php if ($view_store_grn->sortUrl($view_store_grn->CurStock) == "") { ?>
		<th data-name="CurStock" class="<?php echo $view_store_grn->CurStock->headerCellClass() ?>"><div id="elh_view_store_grn_CurStock" class="view_store_grn_CurStock"><div class="ew-table-header-caption"><?php echo $view_store_grn->CurStock->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CurStock" class="<?php echo $view_store_grn->CurStock->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_store_grn->SortUrl($view_store_grn->CurStock) ?>',1);"><div id="elh_view_store_grn_CurStock" class="view_store_grn_CurStock">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_grn->CurStock->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_grn->CurStock->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_grn->CurStock->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->FreeQtyyy->Visible) { // FreeQtyyy ?>
	<?php if ($view_store_grn->sortUrl($view_store_grn->FreeQtyyy) == "") { ?>
		<th data-name="FreeQtyyy" class="<?php echo $view_store_grn->FreeQtyyy->headerCellClass() ?>"><div id="elh_view_store_grn_FreeQtyyy" class="view_store_grn_FreeQtyyy"><div class="ew-table-header-caption"><?php echo $view_store_grn->FreeQtyyy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FreeQtyyy" class="<?php echo $view_store_grn->FreeQtyyy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_store_grn->SortUrl($view_store_grn->FreeQtyyy) ?>',1);"><div id="elh_view_store_grn_FreeQtyyy" class="view_store_grn_FreeQtyyy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_grn->FreeQtyyy->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_grn->FreeQtyyy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_grn->FreeQtyyy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->grndate->Visible) { // grndate ?>
	<?php if ($view_store_grn->sortUrl($view_store_grn->grndate) == "") { ?>
		<th data-name="grndate" class="<?php echo $view_store_grn->grndate->headerCellClass() ?>"><div id="elh_view_store_grn_grndate" class="view_store_grn_grndate"><div class="ew-table-header-caption"><?php echo $view_store_grn->grndate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="grndate" class="<?php echo $view_store_grn->grndate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_store_grn->SortUrl($view_store_grn->grndate) ?>',1);"><div id="elh_view_store_grn_grndate" class="view_store_grn_grndate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_grn->grndate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_grn->grndate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_grn->grndate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->grndatetime->Visible) { // grndatetime ?>
	<?php if ($view_store_grn->sortUrl($view_store_grn->grndatetime) == "") { ?>
		<th data-name="grndatetime" class="<?php echo $view_store_grn->grndatetime->headerCellClass() ?>"><div id="elh_view_store_grn_grndatetime" class="view_store_grn_grndatetime"><div class="ew-table-header-caption"><?php echo $view_store_grn->grndatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="grndatetime" class="<?php echo $view_store_grn->grndatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_store_grn->SortUrl($view_store_grn->grndatetime) ?>',1);"><div id="elh_view_store_grn_grndatetime" class="view_store_grn_grndatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_grn->grndatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_grn->grndatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_grn->grndatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->strid->Visible) { // strid ?>
	<?php if ($view_store_grn->sortUrl($view_store_grn->strid) == "") { ?>
		<th data-name="strid" class="<?php echo $view_store_grn->strid->headerCellClass() ?>"><div id="elh_view_store_grn_strid" class="view_store_grn_strid"><div class="ew-table-header-caption"><?php echo $view_store_grn->strid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="strid" class="<?php echo $view_store_grn->strid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_store_grn->SortUrl($view_store_grn->strid) ?>',1);"><div id="elh_view_store_grn_strid" class="view_store_grn_strid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_grn->strid->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_grn->strid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_grn->strid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_store_grn->GRNPer->Visible) { // GRNPer ?>
	<?php if ($view_store_grn->sortUrl($view_store_grn->GRNPer) == "") { ?>
		<th data-name="GRNPer" class="<?php echo $view_store_grn->GRNPer->headerCellClass() ?>"><div id="elh_view_store_grn_GRNPer" class="view_store_grn_GRNPer"><div class="ew-table-header-caption"><?php echo $view_store_grn->GRNPer->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GRNPer" class="<?php echo $view_store_grn->GRNPer->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_store_grn->SortUrl($view_store_grn->GRNPer) ?>',1);"><div id="elh_view_store_grn_GRNPer" class="view_store_grn_GRNPer">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_store_grn->GRNPer->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_store_grn->GRNPer->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_store_grn->GRNPer->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_store_grn_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_store_grn->ExportAll && $view_store_grn->isExport()) {
	$view_store_grn_list->StopRec = $view_store_grn_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_store_grn_list->TotalRecs > $view_store_grn_list->StartRec + $view_store_grn_list->DisplayRecs - 1)
		$view_store_grn_list->StopRec = $view_store_grn_list->StartRec + $view_store_grn_list->DisplayRecs - 1;
	else
		$view_store_grn_list->StopRec = $view_store_grn_list->TotalRecs;
}
$view_store_grn_list->RecCnt = $view_store_grn_list->StartRec - 1;
if ($view_store_grn_list->Recordset && !$view_store_grn_list->Recordset->EOF) {
	$view_store_grn_list->Recordset->moveFirst();
	$selectLimit = $view_store_grn_list->UseSelectLimit;
	if (!$selectLimit && $view_store_grn_list->StartRec > 1)
		$view_store_grn_list->Recordset->move($view_store_grn_list->StartRec - 1);
} elseif (!$view_store_grn->AllowAddDeleteRow && $view_store_grn_list->StopRec == 0) {
	$view_store_grn_list->StopRec = $view_store_grn->GridAddRowCount;
}

// Initialize aggregate
$view_store_grn->RowType = ROWTYPE_AGGREGATEINIT;
$view_store_grn->resetAttributes();
$view_store_grn_list->renderRow();
while ($view_store_grn_list->RecCnt < $view_store_grn_list->StopRec) {
	$view_store_grn_list->RecCnt++;
	if ($view_store_grn_list->RecCnt >= $view_store_grn_list->StartRec) {
		$view_store_grn_list->RowCnt++;

		// Set up key count
		$view_store_grn_list->KeyCount = $view_store_grn_list->RowIndex;

		// Init row class and style
		$view_store_grn->resetAttributes();
		$view_store_grn->CssClass = "";
		if ($view_store_grn->isGridAdd()) {
		} else {
			$view_store_grn_list->loadRowValues($view_store_grn_list->Recordset); // Load row values
		}
		$view_store_grn->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_store_grn->RowAttrs = array_merge($view_store_grn->RowAttrs, array('data-rowindex'=>$view_store_grn_list->RowCnt, 'id'=>'r' . $view_store_grn_list->RowCnt . '_view_store_grn', 'data-rowtype'=>$view_store_grn->RowType));

		// Render row
		$view_store_grn_list->renderRow();

		// Render list options
		$view_store_grn_list->renderListOptions();
?>
	<tr<?php echo $view_store_grn->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_store_grn_list->ListOptions->render("body", "left", $view_store_grn_list->RowCnt);
?>
	<?php if ($view_store_grn->PRC->Visible) { // PRC ?>
		<td data-name="PRC"<?php echo $view_store_grn->PRC->cellAttributes() ?>>
<span id="el<?php echo $view_store_grn_list->RowCnt ?>_view_store_grn_PRC" class="view_store_grn_PRC">
<span<?php echo $view_store_grn->PRC->viewAttributes() ?>>
<?php echo $view_store_grn->PRC->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_store_grn->PrName->Visible) { // PrName ?>
		<td data-name="PrName"<?php echo $view_store_grn->PrName->cellAttributes() ?>>
<span id="el<?php echo $view_store_grn_list->RowCnt ?>_view_store_grn_PrName" class="view_store_grn_PrName">
<span<?php echo $view_store_grn->PrName->viewAttributes() ?>>
<?php echo $view_store_grn->PrName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_store_grn->GrnQuantity->Visible) { // GrnQuantity ?>
		<td data-name="GrnQuantity"<?php echo $view_store_grn->GrnQuantity->cellAttributes() ?>>
<span id="el<?php echo $view_store_grn_list->RowCnt ?>_view_store_grn_GrnQuantity" class="view_store_grn_GrnQuantity">
<span<?php echo $view_store_grn->GrnQuantity->viewAttributes() ?>>
<?php echo $view_store_grn->GrnQuantity->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_store_grn->FreeQty->Visible) { // FreeQty ?>
		<td data-name="FreeQty"<?php echo $view_store_grn->FreeQty->cellAttributes() ?>>
<span id="el<?php echo $view_store_grn_list->RowCnt ?>_view_store_grn_FreeQty" class="view_store_grn_FreeQty">
<span<?php echo $view_store_grn->FreeQty->viewAttributes() ?>>
<?php echo $view_store_grn->FreeQty->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_store_grn->MFRCODE->Visible) { // MFRCODE ?>
		<td data-name="MFRCODE"<?php echo $view_store_grn->MFRCODE->cellAttributes() ?>>
<span id="el<?php echo $view_store_grn_list->RowCnt ?>_view_store_grn_MFRCODE" class="view_store_grn_MFRCODE">
<span<?php echo $view_store_grn->MFRCODE->viewAttributes() ?>>
<?php echo $view_store_grn->MFRCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_store_grn->PUnit->Visible) { // PUnit ?>
		<td data-name="PUnit"<?php echo $view_store_grn->PUnit->cellAttributes() ?>>
<span id="el<?php echo $view_store_grn_list->RowCnt ?>_view_store_grn_PUnit" class="view_store_grn_PUnit">
<span<?php echo $view_store_grn->PUnit->viewAttributes() ?>>
<?php echo $view_store_grn->PUnit->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_store_grn->SUnit->Visible) { // SUnit ?>
		<td data-name="SUnit"<?php echo $view_store_grn->SUnit->cellAttributes() ?>>
<span id="el<?php echo $view_store_grn_list->RowCnt ?>_view_store_grn_SUnit" class="view_store_grn_SUnit">
<span<?php echo $view_store_grn->SUnit->viewAttributes() ?>>
<?php echo $view_store_grn->SUnit->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_store_grn->MRP->Visible) { // MRP ?>
		<td data-name="MRP"<?php echo $view_store_grn->MRP->cellAttributes() ?>>
<span id="el<?php echo $view_store_grn_list->RowCnt ?>_view_store_grn_MRP" class="view_store_grn_MRP">
<span<?php echo $view_store_grn->MRP->viewAttributes() ?>>
<?php echo $view_store_grn->MRP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_store_grn->PurValue->Visible) { // PurValue ?>
		<td data-name="PurValue"<?php echo $view_store_grn->PurValue->cellAttributes() ?>>
<span id="el<?php echo $view_store_grn_list->RowCnt ?>_view_store_grn_PurValue" class="view_store_grn_PurValue">
<span<?php echo $view_store_grn->PurValue->viewAttributes() ?>>
<?php echo $view_store_grn->PurValue->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_store_grn->Disc->Visible) { // Disc ?>
		<td data-name="Disc"<?php echo $view_store_grn->Disc->cellAttributes() ?>>
<span id="el<?php echo $view_store_grn_list->RowCnt ?>_view_store_grn_Disc" class="view_store_grn_Disc">
<span<?php echo $view_store_grn->Disc->viewAttributes() ?>>
<?php echo $view_store_grn->Disc->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_store_grn->PSGST->Visible) { // PSGST ?>
		<td data-name="PSGST"<?php echo $view_store_grn->PSGST->cellAttributes() ?>>
<span id="el<?php echo $view_store_grn_list->RowCnt ?>_view_store_grn_PSGST" class="view_store_grn_PSGST">
<span<?php echo $view_store_grn->PSGST->viewAttributes() ?>>
<?php echo $view_store_grn->PSGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_store_grn->PCGST->Visible) { // PCGST ?>
		<td data-name="PCGST"<?php echo $view_store_grn->PCGST->cellAttributes() ?>>
<span id="el<?php echo $view_store_grn_list->RowCnt ?>_view_store_grn_PCGST" class="view_store_grn_PCGST">
<span<?php echo $view_store_grn->PCGST->viewAttributes() ?>>
<?php echo $view_store_grn->PCGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_store_grn->PTax->Visible) { // PTax ?>
		<td data-name="PTax"<?php echo $view_store_grn->PTax->cellAttributes() ?>>
<span id="el<?php echo $view_store_grn_list->RowCnt ?>_view_store_grn_PTax" class="view_store_grn_PTax">
<span<?php echo $view_store_grn->PTax->viewAttributes() ?>>
<?php echo $view_store_grn->PTax->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_store_grn->ItemValue->Visible) { // ItemValue ?>
		<td data-name="ItemValue"<?php echo $view_store_grn->ItemValue->cellAttributes() ?>>
<span id="el<?php echo $view_store_grn_list->RowCnt ?>_view_store_grn_ItemValue" class="view_store_grn_ItemValue">
<span<?php echo $view_store_grn->ItemValue->viewAttributes() ?>>
<?php echo $view_store_grn->ItemValue->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_store_grn->SalTax->Visible) { // SalTax ?>
		<td data-name="SalTax"<?php echo $view_store_grn->SalTax->cellAttributes() ?>>
<span id="el<?php echo $view_store_grn_list->RowCnt ?>_view_store_grn_SalTax" class="view_store_grn_SalTax">
<span<?php echo $view_store_grn->SalTax->viewAttributes() ?>>
<?php echo $view_store_grn->SalTax->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_store_grn->BatchNo->Visible) { // BatchNo ?>
		<td data-name="BatchNo"<?php echo $view_store_grn->BatchNo->cellAttributes() ?>>
<span id="el<?php echo $view_store_grn_list->RowCnt ?>_view_store_grn_BatchNo" class="view_store_grn_BatchNo">
<span<?php echo $view_store_grn->BatchNo->viewAttributes() ?>>
<?php echo $view_store_grn->BatchNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_store_grn->ExpDate->Visible) { // ExpDate ?>
		<td data-name="ExpDate"<?php echo $view_store_grn->ExpDate->cellAttributes() ?>>
<span id="el<?php echo $view_store_grn_list->RowCnt ?>_view_store_grn_ExpDate" class="view_store_grn_ExpDate">
<span<?php echo $view_store_grn->ExpDate->viewAttributes() ?>>
<?php echo $view_store_grn->ExpDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_store_grn->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity"<?php echo $view_store_grn->Quantity->cellAttributes() ?>>
<span id="el<?php echo $view_store_grn_list->RowCnt ?>_view_store_grn_Quantity" class="view_store_grn_Quantity">
<span<?php echo $view_store_grn->Quantity->viewAttributes() ?>>
<?php echo $view_store_grn->Quantity->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_store_grn->SalRate->Visible) { // SalRate ?>
		<td data-name="SalRate"<?php echo $view_store_grn->SalRate->cellAttributes() ?>>
<span id="el<?php echo $view_store_grn_list->RowCnt ?>_view_store_grn_SalRate" class="view_store_grn_SalRate">
<span<?php echo $view_store_grn->SalRate->viewAttributes() ?>>
<?php echo $view_store_grn->SalRate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_store_grn->SSGST->Visible) { // SSGST ?>
		<td data-name="SSGST"<?php echo $view_store_grn->SSGST->cellAttributes() ?>>
<span id="el<?php echo $view_store_grn_list->RowCnt ?>_view_store_grn_SSGST" class="view_store_grn_SSGST">
<span<?php echo $view_store_grn->SSGST->viewAttributes() ?>>
<?php echo $view_store_grn->SSGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_store_grn->SCGST->Visible) { // SCGST ?>
		<td data-name="SCGST"<?php echo $view_store_grn->SCGST->cellAttributes() ?>>
<span id="el<?php echo $view_store_grn_list->RowCnt ?>_view_store_grn_SCGST" class="view_store_grn_SCGST">
<span<?php echo $view_store_grn->SCGST->viewAttributes() ?>>
<?php echo $view_store_grn->SCGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_store_grn->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE"<?php echo $view_store_grn->BRCODE->cellAttributes() ?>>
<span id="el<?php echo $view_store_grn_list->RowCnt ?>_view_store_grn_BRCODE" class="view_store_grn_BRCODE">
<span<?php echo $view_store_grn->BRCODE->viewAttributes() ?>>
<?php echo $view_store_grn->BRCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_store_grn->HSN->Visible) { // HSN ?>
		<td data-name="HSN"<?php echo $view_store_grn->HSN->cellAttributes() ?>>
<span id="el<?php echo $view_store_grn_list->RowCnt ?>_view_store_grn_HSN" class="view_store_grn_HSN">
<span<?php echo $view_store_grn->HSN->viewAttributes() ?>>
<?php echo $view_store_grn->HSN->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_store_grn->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_store_grn->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_store_grn_list->RowCnt ?>_view_store_grn_HospID" class="view_store_grn_HospID">
<span<?php echo $view_store_grn->HospID->viewAttributes() ?>>
<?php echo $view_store_grn->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_store_grn->grncreatedby->Visible) { // grncreatedby ?>
		<td data-name="grncreatedby"<?php echo $view_store_grn->grncreatedby->cellAttributes() ?>>
<span id="el<?php echo $view_store_grn_list->RowCnt ?>_view_store_grn_grncreatedby" class="view_store_grn_grncreatedby">
<span<?php echo $view_store_grn->grncreatedby->viewAttributes() ?>>
<?php echo $view_store_grn->grncreatedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_store_grn->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
		<td data-name="grncreatedDateTime"<?php echo $view_store_grn->grncreatedDateTime->cellAttributes() ?>>
<span id="el<?php echo $view_store_grn_list->RowCnt ?>_view_store_grn_grncreatedDateTime" class="view_store_grn_grncreatedDateTime">
<span<?php echo $view_store_grn->grncreatedDateTime->viewAttributes() ?>>
<?php echo $view_store_grn->grncreatedDateTime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_store_grn->grnModifiedby->Visible) { // grnModifiedby ?>
		<td data-name="grnModifiedby"<?php echo $view_store_grn->grnModifiedby->cellAttributes() ?>>
<span id="el<?php echo $view_store_grn_list->RowCnt ?>_view_store_grn_grnModifiedby" class="view_store_grn_grnModifiedby">
<span<?php echo $view_store_grn->grnModifiedby->viewAttributes() ?>>
<?php echo $view_store_grn->grnModifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_store_grn->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
		<td data-name="grnModifiedDateTime"<?php echo $view_store_grn->grnModifiedDateTime->cellAttributes() ?>>
<span id="el<?php echo $view_store_grn_list->RowCnt ?>_view_store_grn_grnModifiedDateTime" class="view_store_grn_grnModifiedDateTime">
<span<?php echo $view_store_grn->grnModifiedDateTime->viewAttributes() ?>>
<?php echo $view_store_grn->grnModifiedDateTime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_store_grn->BillDate->Visible) { // BillDate ?>
		<td data-name="BillDate"<?php echo $view_store_grn->BillDate->cellAttributes() ?>>
<span id="el<?php echo $view_store_grn_list->RowCnt ?>_view_store_grn_BillDate" class="view_store_grn_BillDate">
<span<?php echo $view_store_grn->BillDate->viewAttributes() ?>>
<?php echo $view_store_grn->BillDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_store_grn->CurStock->Visible) { // CurStock ?>
		<td data-name="CurStock"<?php echo $view_store_grn->CurStock->cellAttributes() ?>>
<span id="el<?php echo $view_store_grn_list->RowCnt ?>_view_store_grn_CurStock" class="view_store_grn_CurStock">
<span<?php echo $view_store_grn->CurStock->viewAttributes() ?>>
<?php echo $view_store_grn->CurStock->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_store_grn->FreeQtyyy->Visible) { // FreeQtyyy ?>
		<td data-name="FreeQtyyy"<?php echo $view_store_grn->FreeQtyyy->cellAttributes() ?>>
<span id="el<?php echo $view_store_grn_list->RowCnt ?>_view_store_grn_FreeQtyyy" class="view_store_grn_FreeQtyyy">
<span<?php echo $view_store_grn->FreeQtyyy->viewAttributes() ?>>
<?php echo $view_store_grn->FreeQtyyy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_store_grn->grndate->Visible) { // grndate ?>
		<td data-name="grndate"<?php echo $view_store_grn->grndate->cellAttributes() ?>>
<span id="el<?php echo $view_store_grn_list->RowCnt ?>_view_store_grn_grndate" class="view_store_grn_grndate">
<span<?php echo $view_store_grn->grndate->viewAttributes() ?>>
<?php echo $view_store_grn->grndate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_store_grn->grndatetime->Visible) { // grndatetime ?>
		<td data-name="grndatetime"<?php echo $view_store_grn->grndatetime->cellAttributes() ?>>
<span id="el<?php echo $view_store_grn_list->RowCnt ?>_view_store_grn_grndatetime" class="view_store_grn_grndatetime">
<span<?php echo $view_store_grn->grndatetime->viewAttributes() ?>>
<?php echo $view_store_grn->grndatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_store_grn->strid->Visible) { // strid ?>
		<td data-name="strid"<?php echo $view_store_grn->strid->cellAttributes() ?>>
<span id="el<?php echo $view_store_grn_list->RowCnt ?>_view_store_grn_strid" class="view_store_grn_strid">
<span<?php echo $view_store_grn->strid->viewAttributes() ?>>
<?php echo $view_store_grn->strid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_store_grn->GRNPer->Visible) { // GRNPer ?>
		<td data-name="GRNPer"<?php echo $view_store_grn->GRNPer->cellAttributes() ?>>
<span id="el<?php echo $view_store_grn_list->RowCnt ?>_view_store_grn_GRNPer" class="view_store_grn_GRNPer">
<span<?php echo $view_store_grn->GRNPer->viewAttributes() ?>>
<?php echo $view_store_grn->GRNPer->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_store_grn_list->ListOptions->render("body", "right", $view_store_grn_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_store_grn->isGridAdd())
		$view_store_grn_list->Recordset->moveNext();
}
?>
</tbody>
<?php

// Render aggregate row
$view_store_grn->RowType = ROWTYPE_AGGREGATE;
$view_store_grn->resetAttributes();
$view_store_grn_list->renderRow();
?>
<?php if ($view_store_grn_list->TotalRecs > 0 && !$view_store_grn->isGridAdd() && !$view_store_grn->isGridEdit()) { ?>
<tfoot><!-- Table footer -->
	<tr class="ew-table-footer">
<?php

// Render list options
$view_store_grn_list->renderListOptions();

// Render list options (footer, left)
$view_store_grn_list->ListOptions->render("footer", "left");
?>
	<?php if ($view_store_grn->PRC->Visible) { // PRC ?>
		<td data-name="PRC" class="<?php echo $view_store_grn->PRC->footerCellClass() ?>"><span id="elf_view_store_grn_PRC" class="view_store_grn_PRC">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_store_grn->PrName->Visible) { // PrName ?>
		<td data-name="PrName" class="<?php echo $view_store_grn->PrName->footerCellClass() ?>"><span id="elf_view_store_grn_PrName" class="view_store_grn_PrName">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_store_grn->GrnQuantity->Visible) { // GrnQuantity ?>
		<td data-name="GrnQuantity" class="<?php echo $view_store_grn->GrnQuantity->footerCellClass() ?>"><span id="elf_view_store_grn_GrnQuantity" class="view_store_grn_GrnQuantity">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_store_grn->FreeQty->Visible) { // FreeQty ?>
		<td data-name="FreeQty" class="<?php echo $view_store_grn->FreeQty->footerCellClass() ?>"><span id="elf_view_store_grn_FreeQty" class="view_store_grn_FreeQty">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_store_grn->MFRCODE->Visible) { // MFRCODE ?>
		<td data-name="MFRCODE" class="<?php echo $view_store_grn->MFRCODE->footerCellClass() ?>"><span id="elf_view_store_grn_MFRCODE" class="view_store_grn_MFRCODE">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_store_grn->PUnit->Visible) { // PUnit ?>
		<td data-name="PUnit" class="<?php echo $view_store_grn->PUnit->footerCellClass() ?>"><span id="elf_view_store_grn_PUnit" class="view_store_grn_PUnit">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_store_grn->SUnit->Visible) { // SUnit ?>
		<td data-name="SUnit" class="<?php echo $view_store_grn->SUnit->footerCellClass() ?>"><span id="elf_view_store_grn_SUnit" class="view_store_grn_SUnit">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_store_grn->MRP->Visible) { // MRP ?>
		<td data-name="MRP" class="<?php echo $view_store_grn->MRP->footerCellClass() ?>"><span id="elf_view_store_grn_MRP" class="view_store_grn_MRP">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_store_grn->PurValue->Visible) { // PurValue ?>
		<td data-name="PurValue" class="<?php echo $view_store_grn->PurValue->footerCellClass() ?>"><span id="elf_view_store_grn_PurValue" class="view_store_grn_PurValue">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_store_grn->Disc->Visible) { // Disc ?>
		<td data-name="Disc" class="<?php echo $view_store_grn->Disc->footerCellClass() ?>"><span id="elf_view_store_grn_Disc" class="view_store_grn_Disc">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_store_grn->PSGST->Visible) { // PSGST ?>
		<td data-name="PSGST" class="<?php echo $view_store_grn->PSGST->footerCellClass() ?>"><span id="elf_view_store_grn_PSGST" class="view_store_grn_PSGST">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_store_grn->PCGST->Visible) { // PCGST ?>
		<td data-name="PCGST" class="<?php echo $view_store_grn->PCGST->footerCellClass() ?>"><span id="elf_view_store_grn_PCGST" class="view_store_grn_PCGST">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_store_grn->PTax->Visible) { // PTax ?>
		<td data-name="PTax" class="<?php echo $view_store_grn->PTax->footerCellClass() ?>"><span id="elf_view_store_grn_PTax" class="view_store_grn_PTax">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_store_grn->PTax->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($view_store_grn->ItemValue->Visible) { // ItemValue ?>
		<td data-name="ItemValue" class="<?php echo $view_store_grn->ItemValue->footerCellClass() ?>"><span id="elf_view_store_grn_ItemValue" class="view_store_grn_ItemValue">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_store_grn->ItemValue->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($view_store_grn->SalTax->Visible) { // SalTax ?>
		<td data-name="SalTax" class="<?php echo $view_store_grn->SalTax->footerCellClass() ?>"><span id="elf_view_store_grn_SalTax" class="view_store_grn_SalTax">
		<span class="ew-aggregate"><?php echo $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
		<?php echo $view_store_grn->SalTax->ViewValue ?></span>
		</span></td>
	<?php } ?>
	<?php if ($view_store_grn->BatchNo->Visible) { // BatchNo ?>
		<td data-name="BatchNo" class="<?php echo $view_store_grn->BatchNo->footerCellClass() ?>"><span id="elf_view_store_grn_BatchNo" class="view_store_grn_BatchNo">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_store_grn->ExpDate->Visible) { // ExpDate ?>
		<td data-name="ExpDate" class="<?php echo $view_store_grn->ExpDate->footerCellClass() ?>"><span id="elf_view_store_grn_ExpDate" class="view_store_grn_ExpDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_store_grn->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity" class="<?php echo $view_store_grn->Quantity->footerCellClass() ?>"><span id="elf_view_store_grn_Quantity" class="view_store_grn_Quantity">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_store_grn->SalRate->Visible) { // SalRate ?>
		<td data-name="SalRate" class="<?php echo $view_store_grn->SalRate->footerCellClass() ?>"><span id="elf_view_store_grn_SalRate" class="view_store_grn_SalRate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_store_grn->SSGST->Visible) { // SSGST ?>
		<td data-name="SSGST" class="<?php echo $view_store_grn->SSGST->footerCellClass() ?>"><span id="elf_view_store_grn_SSGST" class="view_store_grn_SSGST">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_store_grn->SCGST->Visible) { // SCGST ?>
		<td data-name="SCGST" class="<?php echo $view_store_grn->SCGST->footerCellClass() ?>"><span id="elf_view_store_grn_SCGST" class="view_store_grn_SCGST">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_store_grn->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE" class="<?php echo $view_store_grn->BRCODE->footerCellClass() ?>"><span id="elf_view_store_grn_BRCODE" class="view_store_grn_BRCODE">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_store_grn->HSN->Visible) { // HSN ?>
		<td data-name="HSN" class="<?php echo $view_store_grn->HSN->footerCellClass() ?>"><span id="elf_view_store_grn_HSN" class="view_store_grn_HSN">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_store_grn->HospID->Visible) { // HospID ?>
		<td data-name="HospID" class="<?php echo $view_store_grn->HospID->footerCellClass() ?>"><span id="elf_view_store_grn_HospID" class="view_store_grn_HospID">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_store_grn->grncreatedby->Visible) { // grncreatedby ?>
		<td data-name="grncreatedby" class="<?php echo $view_store_grn->grncreatedby->footerCellClass() ?>"><span id="elf_view_store_grn_grncreatedby" class="view_store_grn_grncreatedby">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_store_grn->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
		<td data-name="grncreatedDateTime" class="<?php echo $view_store_grn->grncreatedDateTime->footerCellClass() ?>"><span id="elf_view_store_grn_grncreatedDateTime" class="view_store_grn_grncreatedDateTime">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_store_grn->grnModifiedby->Visible) { // grnModifiedby ?>
		<td data-name="grnModifiedby" class="<?php echo $view_store_grn->grnModifiedby->footerCellClass() ?>"><span id="elf_view_store_grn_grnModifiedby" class="view_store_grn_grnModifiedby">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_store_grn->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
		<td data-name="grnModifiedDateTime" class="<?php echo $view_store_grn->grnModifiedDateTime->footerCellClass() ?>"><span id="elf_view_store_grn_grnModifiedDateTime" class="view_store_grn_grnModifiedDateTime">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_store_grn->BillDate->Visible) { // BillDate ?>
		<td data-name="BillDate" class="<?php echo $view_store_grn->BillDate->footerCellClass() ?>"><span id="elf_view_store_grn_BillDate" class="view_store_grn_BillDate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_store_grn->CurStock->Visible) { // CurStock ?>
		<td data-name="CurStock" class="<?php echo $view_store_grn->CurStock->footerCellClass() ?>"><span id="elf_view_store_grn_CurStock" class="view_store_grn_CurStock">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_store_grn->FreeQtyyy->Visible) { // FreeQtyyy ?>
		<td data-name="FreeQtyyy" class="<?php echo $view_store_grn->FreeQtyyy->footerCellClass() ?>"><span id="elf_view_store_grn_FreeQtyyy" class="view_store_grn_FreeQtyyy">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_store_grn->grndate->Visible) { // grndate ?>
		<td data-name="grndate" class="<?php echo $view_store_grn->grndate->footerCellClass() ?>"><span id="elf_view_store_grn_grndate" class="view_store_grn_grndate">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_store_grn->grndatetime->Visible) { // grndatetime ?>
		<td data-name="grndatetime" class="<?php echo $view_store_grn->grndatetime->footerCellClass() ?>"><span id="elf_view_store_grn_grndatetime" class="view_store_grn_grndatetime">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_store_grn->strid->Visible) { // strid ?>
		<td data-name="strid" class="<?php echo $view_store_grn->strid->footerCellClass() ?>"><span id="elf_view_store_grn_strid" class="view_store_grn_strid">
		&nbsp;
		</span></td>
	<?php } ?>
	<?php if ($view_store_grn->GRNPer->Visible) { // GRNPer ?>
		<td data-name="GRNPer" class="<?php echo $view_store_grn->GRNPer->footerCellClass() ?>"><span id="elf_view_store_grn_GRNPer" class="view_store_grn_GRNPer">
		&nbsp;
		</span></td>
	<?php } ?>
<?php

// Render list options (footer, right)
$view_store_grn_list->ListOptions->render("footer", "right");
?>
	</tr>
</tfoot>
<?php } ?>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_store_grn->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_store_grn_list->Recordset)
	$view_store_grn_list->Recordset->Close();
?>
<?php if (!$view_store_grn->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_store_grn->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_store_grn_list->Pager)) $view_store_grn_list->Pager = new NumericPager($view_store_grn_list->StartRec, $view_store_grn_list->DisplayRecs, $view_store_grn_list->TotalRecs, $view_store_grn_list->RecRange, $view_store_grn_list->AutoHidePager) ?>
<?php if ($view_store_grn_list->Pager->RecordCount > 0 && $view_store_grn_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_store_grn_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_store_grn_list->pageUrl() ?>start=<?php echo $view_store_grn_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_store_grn_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_store_grn_list->pageUrl() ?>start=<?php echo $view_store_grn_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_store_grn_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_store_grn_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_store_grn_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_store_grn_list->pageUrl() ?>start=<?php echo $view_store_grn_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_store_grn_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_store_grn_list->pageUrl() ?>start=<?php echo $view_store_grn_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_store_grn_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_store_grn_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_store_grn_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_store_grn_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_store_grn_list->TotalRecs > 0 && (!$view_store_grn_list->AutoHidePageSizeSelector || $view_store_grn_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_store_grn">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_store_grn_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_store_grn_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_store_grn_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_store_grn_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_store_grn_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_store_grn_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_store_grn->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_store_grn_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_store_grn_list->TotalRecs == 0 && !$view_store_grn->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_store_grn_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_store_grn_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_store_grn->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

$("[data-name='Quantity']").hide();
</script>
<?php if (!$view_store_grn->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_store_grn", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_store_grn_list->terminate();
?>