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
$view_till_search_list = new view_till_search_list();

// Run the page
$view_till_search_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_till_search_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_till_search->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_till_searchlist = currentForm = new ew.Form("fview_till_searchlist", "list");
fview_till_searchlist.formKeyCountName = '<?php echo $view_till_search_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_till_searchlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_till_searchlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fview_till_searchlistsrch = currentSearchForm = new ew.Form("fview_till_searchlistsrch");

// Filters
fview_till_searchlistsrch.filterList = <?php echo $view_till_search_list->getFilterList() ?>;
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
<?php if (!$view_till_search->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_till_search_list->TotalRecs > 0 && $view_till_search_list->ExportOptions->visible()) { ?>
<?php $view_till_search_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_till_search_list->ImportOptions->visible()) { ?>
<?php $view_till_search_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_till_search_list->SearchOptions->visible()) { ?>
<?php $view_till_search_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_till_search_list->FilterOptions->visible()) { ?>
<?php $view_till_search_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_till_search_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_till_search->isExport() && !$view_till_search->CurrentAction) { ?>
<form name="fview_till_searchlistsrch" id="fview_till_searchlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_till_search_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_till_searchlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_till_search">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_till_search_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_till_search_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_till_search_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_till_search_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_till_search_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_till_search_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_till_search_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_till_search_list->showPageHeader(); ?>
<?php
$view_till_search_list->showMessage();
?>
<?php if ($view_till_search_list->TotalRecs > 0 || $view_till_search->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_till_search_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_till_search">
<?php if (!$view_till_search->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_till_search->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_till_search_list->Pager)) $view_till_search_list->Pager = new NumericPager($view_till_search_list->StartRec, $view_till_search_list->DisplayRecs, $view_till_search_list->TotalRecs, $view_till_search_list->RecRange, $view_till_search_list->AutoHidePager) ?>
<?php if ($view_till_search_list->Pager->RecordCount > 0 && $view_till_search_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_till_search_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_till_search_list->pageUrl() ?>start=<?php echo $view_till_search_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_till_search_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_till_search_list->pageUrl() ?>start=<?php echo $view_till_search_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_till_search_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_till_search_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_till_search_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_till_search_list->pageUrl() ?>start=<?php echo $view_till_search_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_till_search_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_till_search_list->pageUrl() ?>start=<?php echo $view_till_search_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_till_search_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_till_search_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_till_search_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_till_search_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_till_search_list->TotalRecs > 0 && (!$view_till_search_list->AutoHidePageSizeSelector || $view_till_search_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_till_search">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_till_search_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_till_search_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_till_search_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_till_search_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_till_search_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_till_search_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_till_search->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_till_search_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_till_searchlist" id="fview_till_searchlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_till_search_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_till_search_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_till_search">
<div id="gmp_view_till_search" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_till_search_list->TotalRecs > 0 || $view_till_search->isGridEdit()) { ?>
<table id="tbl_view_till_searchlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_till_search_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_till_search_list->renderListOptions();

// Render list options (header, left)
$view_till_search_list->ListOptions->render("header", "left");
?>
<?php if ($view_till_search->id->Visible) { // id ?>
	<?php if ($view_till_search->sortUrl($view_till_search->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_till_search->id->headerCellClass() ?>"><div id="elh_view_till_search_id" class="view_till_search_id"><div class="ew-table-header-caption"><?php echo $view_till_search->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_till_search->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_till_search->SortUrl($view_till_search->id) ?>',1);"><div id="elh_view_till_search_id" class="view_till_search_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_till_search->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_till_search->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_till_search->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_till_search->Mobile->Visible) { // Mobile ?>
	<?php if ($view_till_search->sortUrl($view_till_search->Mobile) == "") { ?>
		<th data-name="Mobile" class="<?php echo $view_till_search->Mobile->headerCellClass() ?>"><div id="elh_view_till_search_Mobile" class="view_till_search_Mobile"><div class="ew-table-header-caption"><?php echo $view_till_search->Mobile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mobile" class="<?php echo $view_till_search->Mobile->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_till_search->SortUrl($view_till_search->Mobile) ?>',1);"><div id="elh_view_till_search_Mobile" class="view_till_search_Mobile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_till_search->Mobile->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_till_search->Mobile->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_till_search->Mobile->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_till_search->voucher_type->Visible) { // voucher_type ?>
	<?php if ($view_till_search->sortUrl($view_till_search->voucher_type) == "") { ?>
		<th data-name="voucher_type" class="<?php echo $view_till_search->voucher_type->headerCellClass() ?>"><div id="elh_view_till_search_voucher_type" class="view_till_search_voucher_type"><div class="ew-table-header-caption"><?php echo $view_till_search->voucher_type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="voucher_type" class="<?php echo $view_till_search->voucher_type->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_till_search->SortUrl($view_till_search->voucher_type) ?>',1);"><div id="elh_view_till_search_voucher_type" class="view_till_search_voucher_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_till_search->voucher_type->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_till_search->voucher_type->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_till_search->voucher_type->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_till_search->Details->Visible) { // Details ?>
	<?php if ($view_till_search->sortUrl($view_till_search->Details) == "") { ?>
		<th data-name="Details" class="<?php echo $view_till_search->Details->headerCellClass() ?>"><div id="elh_view_till_search_Details" class="view_till_search_Details"><div class="ew-table-header-caption"><?php echo $view_till_search->Details->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Details" class="<?php echo $view_till_search->Details->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_till_search->SortUrl($view_till_search->Details) ?>',1);"><div id="elh_view_till_search_Details" class="view_till_search_Details">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_till_search->Details->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_till_search->Details->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_till_search->Details->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_till_search->ModeofPayment->Visible) { // ModeofPayment ?>
	<?php if ($view_till_search->sortUrl($view_till_search->ModeofPayment) == "") { ?>
		<th data-name="ModeofPayment" class="<?php echo $view_till_search->ModeofPayment->headerCellClass() ?>"><div id="elh_view_till_search_ModeofPayment" class="view_till_search_ModeofPayment"><div class="ew-table-header-caption"><?php echo $view_till_search->ModeofPayment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModeofPayment" class="<?php echo $view_till_search->ModeofPayment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_till_search->SortUrl($view_till_search->ModeofPayment) ?>',1);"><div id="elh_view_till_search_ModeofPayment" class="view_till_search_ModeofPayment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_till_search->ModeofPayment->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_till_search->ModeofPayment->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_till_search->ModeofPayment->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_till_search->Amount->Visible) { // Amount ?>
	<?php if ($view_till_search->sortUrl($view_till_search->Amount) == "") { ?>
		<th data-name="Amount" class="<?php echo $view_till_search->Amount->headerCellClass() ?>"><div id="elh_view_till_search_Amount" class="view_till_search_Amount"><div class="ew-table-header-caption"><?php echo $view_till_search->Amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Amount" class="<?php echo $view_till_search->Amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_till_search->SortUrl($view_till_search->Amount) ?>',1);"><div id="elh_view_till_search_Amount" class="view_till_search_Amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_till_search->Amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_till_search->Amount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_till_search->Amount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_till_search->AnyDues->Visible) { // AnyDues ?>
	<?php if ($view_till_search->sortUrl($view_till_search->AnyDues) == "") { ?>
		<th data-name="AnyDues" class="<?php echo $view_till_search->AnyDues->headerCellClass() ?>"><div id="elh_view_till_search_AnyDues" class="view_till_search_AnyDues"><div class="ew-table-header-caption"><?php echo $view_till_search->AnyDues->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AnyDues" class="<?php echo $view_till_search->AnyDues->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_till_search->SortUrl($view_till_search->AnyDues) ?>',1);"><div id="elh_view_till_search_AnyDues" class="view_till_search_AnyDues">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_till_search->AnyDues->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_till_search->AnyDues->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_till_search->AnyDues->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_till_search->createdby->Visible) { // createdby ?>
	<?php if ($view_till_search->sortUrl($view_till_search->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $view_till_search->createdby->headerCellClass() ?>"><div id="elh_view_till_search_createdby" class="view_till_search_createdby"><div class="ew-table-header-caption"><?php echo $view_till_search->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $view_till_search->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_till_search->SortUrl($view_till_search->createdby) ?>',1);"><div id="elh_view_till_search_createdby" class="view_till_search_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_till_search->createdby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_till_search->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_till_search->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_till_search->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_till_search->sortUrl($view_till_search->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_till_search->createddatetime->headerCellClass() ?>"><div id="elh_view_till_search_createddatetime" class="view_till_search_createddatetime"><div class="ew-table-header-caption"><?php echo $view_till_search->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_till_search->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_till_search->SortUrl($view_till_search->createddatetime) ?>',1);"><div id="elh_view_till_search_createddatetime" class="view_till_search_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_till_search->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_till_search->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_till_search->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_till_search->modifiedby->Visible) { // modifiedby ?>
	<?php if ($view_till_search->sortUrl($view_till_search->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $view_till_search->modifiedby->headerCellClass() ?>"><div id="elh_view_till_search_modifiedby" class="view_till_search_modifiedby"><div class="ew-table-header-caption"><?php echo $view_till_search->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $view_till_search->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_till_search->SortUrl($view_till_search->modifiedby) ?>',1);"><div id="elh_view_till_search_modifiedby" class="view_till_search_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_till_search->modifiedby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_till_search->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_till_search->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_till_search->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($view_till_search->sortUrl($view_till_search->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_till_search->modifieddatetime->headerCellClass() ?>"><div id="elh_view_till_search_modifieddatetime" class="view_till_search_modifieddatetime"><div class="ew-table-header-caption"><?php echo $view_till_search->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_till_search->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_till_search->SortUrl($view_till_search->modifieddatetime) ?>',1);"><div id="elh_view_till_search_modifieddatetime" class="view_till_search_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_till_search->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_till_search->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_till_search->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_till_search->BillNumber->Visible) { // BillNumber ?>
	<?php if ($view_till_search->sortUrl($view_till_search->BillNumber) == "") { ?>
		<th data-name="BillNumber" class="<?php echo $view_till_search->BillNumber->headerCellClass() ?>"><div id="elh_view_till_search_BillNumber" class="view_till_search_BillNumber"><div class="ew-table-header-caption"><?php echo $view_till_search->BillNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillNumber" class="<?php echo $view_till_search->BillNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_till_search->SortUrl($view_till_search->BillNumber) ?>',1);"><div id="elh_view_till_search_BillNumber" class="view_till_search_BillNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_till_search->BillNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_till_search->BillNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_till_search->BillNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_till_search->PatientID->Visible) { // PatientID ?>
	<?php if ($view_till_search->sortUrl($view_till_search->PatientID) == "") { ?>
		<th data-name="PatientID" class="<?php echo $view_till_search->PatientID->headerCellClass() ?>"><div id="elh_view_till_search_PatientID" class="view_till_search_PatientID"><div class="ew-table-header-caption"><?php echo $view_till_search->PatientID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientID" class="<?php echo $view_till_search->PatientID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_till_search->SortUrl($view_till_search->PatientID) ?>',1);"><div id="elh_view_till_search_PatientID" class="view_till_search_PatientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_till_search->PatientID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_till_search->PatientID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_till_search->PatientID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_till_search->PatientName->Visible) { // PatientName ?>
	<?php if ($view_till_search->sortUrl($view_till_search->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $view_till_search->PatientName->headerCellClass() ?>"><div id="elh_view_till_search_PatientName" class="view_till_search_PatientName"><div class="ew-table-header-caption"><?php echo $view_till_search->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $view_till_search->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_till_search->SortUrl($view_till_search->PatientName) ?>',1);"><div id="elh_view_till_search_PatientName" class="view_till_search_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_till_search->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_till_search->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_till_search->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_till_search->BillType->Visible) { // BillType ?>
	<?php if ($view_till_search->sortUrl($view_till_search->BillType) == "") { ?>
		<th data-name="BillType" class="<?php echo $view_till_search->BillType->headerCellClass() ?>"><div id="elh_view_till_search_BillType" class="view_till_search_BillType"><div class="ew-table-header-caption"><?php echo $view_till_search->BillType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillType" class="<?php echo $view_till_search->BillType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_till_search->SortUrl($view_till_search->BillType) ?>',1);"><div id="elh_view_till_search_BillType" class="view_till_search_BillType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_till_search->BillType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_till_search->BillType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_till_search->BillType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_till_search->HospID->Visible) { // HospID ?>
	<?php if ($view_till_search->sortUrl($view_till_search->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_till_search->HospID->headerCellClass() ?>"><div id="elh_view_till_search_HospID" class="view_till_search_HospID"><div class="ew-table-header-caption"><?php echo $view_till_search->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_till_search->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_till_search->SortUrl($view_till_search->HospID) ?>',1);"><div id="elh_view_till_search_HospID" class="view_till_search_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_till_search->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_till_search->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_till_search->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_till_search->Cash->Visible) { // Cash ?>
	<?php if ($view_till_search->sortUrl($view_till_search->Cash) == "") { ?>
		<th data-name="Cash" class="<?php echo $view_till_search->Cash->headerCellClass() ?>"><div id="elh_view_till_search_Cash" class="view_till_search_Cash"><div class="ew-table-header-caption"><?php echo $view_till_search->Cash->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Cash" class="<?php echo $view_till_search->Cash->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_till_search->SortUrl($view_till_search->Cash) ?>',1);"><div id="elh_view_till_search_Cash" class="view_till_search_Cash">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_till_search->Cash->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_till_search->Cash->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_till_search->Cash->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_till_search->Card->Visible) { // Card ?>
	<?php if ($view_till_search->sortUrl($view_till_search->Card) == "") { ?>
		<th data-name="Card" class="<?php echo $view_till_search->Card->headerCellClass() ?>"><div id="elh_view_till_search_Card" class="view_till_search_Card"><div class="ew-table-header-caption"><?php echo $view_till_search->Card->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Card" class="<?php echo $view_till_search->Card->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_till_search->SortUrl($view_till_search->Card) ?>',1);"><div id="elh_view_till_search_Card" class="view_till_search_Card">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_till_search->Card->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_till_search->Card->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_till_search->Card->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_till_search_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_till_search->ExportAll && $view_till_search->isExport()) {
	$view_till_search_list->StopRec = $view_till_search_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_till_search_list->TotalRecs > $view_till_search_list->StartRec + $view_till_search_list->DisplayRecs - 1)
		$view_till_search_list->StopRec = $view_till_search_list->StartRec + $view_till_search_list->DisplayRecs - 1;
	else
		$view_till_search_list->StopRec = $view_till_search_list->TotalRecs;
}
$view_till_search_list->RecCnt = $view_till_search_list->StartRec - 1;
if ($view_till_search_list->Recordset && !$view_till_search_list->Recordset->EOF) {
	$view_till_search_list->Recordset->moveFirst();
	$selectLimit = $view_till_search_list->UseSelectLimit;
	if (!$selectLimit && $view_till_search_list->StartRec > 1)
		$view_till_search_list->Recordset->move($view_till_search_list->StartRec - 1);
} elseif (!$view_till_search->AllowAddDeleteRow && $view_till_search_list->StopRec == 0) {
	$view_till_search_list->StopRec = $view_till_search->GridAddRowCount;
}

// Initialize aggregate
$view_till_search->RowType = ROWTYPE_AGGREGATEINIT;
$view_till_search->resetAttributes();
$view_till_search_list->renderRow();
while ($view_till_search_list->RecCnt < $view_till_search_list->StopRec) {
	$view_till_search_list->RecCnt++;
	if ($view_till_search_list->RecCnt >= $view_till_search_list->StartRec) {
		$view_till_search_list->RowCnt++;

		// Set up key count
		$view_till_search_list->KeyCount = $view_till_search_list->RowIndex;

		// Init row class and style
		$view_till_search->resetAttributes();
		$view_till_search->CssClass = "";
		if ($view_till_search->isGridAdd()) {
		} else {
			$view_till_search_list->loadRowValues($view_till_search_list->Recordset); // Load row values
		}
		$view_till_search->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_till_search->RowAttrs = array_merge($view_till_search->RowAttrs, array('data-rowindex'=>$view_till_search_list->RowCnt, 'id'=>'r' . $view_till_search_list->RowCnt . '_view_till_search', 'data-rowtype'=>$view_till_search->RowType));

		// Render row
		$view_till_search_list->renderRow();

		// Render list options
		$view_till_search_list->renderListOptions();
?>
	<tr<?php echo $view_till_search->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_till_search_list->ListOptions->render("body", "left", $view_till_search_list->RowCnt);
?>
	<?php if ($view_till_search->id->Visible) { // id ?>
		<td data-name="id"<?php echo $view_till_search->id->cellAttributes() ?>>
<span id="el<?php echo $view_till_search_list->RowCnt ?>_view_till_search_id" class="view_till_search_id">
<span<?php echo $view_till_search->id->viewAttributes() ?>>
<?php echo $view_till_search->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_till_search->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile"<?php echo $view_till_search->Mobile->cellAttributes() ?>>
<span id="el<?php echo $view_till_search_list->RowCnt ?>_view_till_search_Mobile" class="view_till_search_Mobile">
<span<?php echo $view_till_search->Mobile->viewAttributes() ?>>
<?php echo $view_till_search->Mobile->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_till_search->voucher_type->Visible) { // voucher_type ?>
		<td data-name="voucher_type"<?php echo $view_till_search->voucher_type->cellAttributes() ?>>
<span id="el<?php echo $view_till_search_list->RowCnt ?>_view_till_search_voucher_type" class="view_till_search_voucher_type">
<span<?php echo $view_till_search->voucher_type->viewAttributes() ?>>
<?php echo $view_till_search->voucher_type->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_till_search->Details->Visible) { // Details ?>
		<td data-name="Details"<?php echo $view_till_search->Details->cellAttributes() ?>>
<span id="el<?php echo $view_till_search_list->RowCnt ?>_view_till_search_Details" class="view_till_search_Details">
<span<?php echo $view_till_search->Details->viewAttributes() ?>>
<?php echo $view_till_search->Details->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_till_search->ModeofPayment->Visible) { // ModeofPayment ?>
		<td data-name="ModeofPayment"<?php echo $view_till_search->ModeofPayment->cellAttributes() ?>>
<span id="el<?php echo $view_till_search_list->RowCnt ?>_view_till_search_ModeofPayment" class="view_till_search_ModeofPayment">
<span<?php echo $view_till_search->ModeofPayment->viewAttributes() ?>>
<?php echo $view_till_search->ModeofPayment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_till_search->Amount->Visible) { // Amount ?>
		<td data-name="Amount"<?php echo $view_till_search->Amount->cellAttributes() ?>>
<span id="el<?php echo $view_till_search_list->RowCnt ?>_view_till_search_Amount" class="view_till_search_Amount">
<span<?php echo $view_till_search->Amount->viewAttributes() ?>>
<?php echo $view_till_search->Amount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_till_search->AnyDues->Visible) { // AnyDues ?>
		<td data-name="AnyDues"<?php echo $view_till_search->AnyDues->cellAttributes() ?>>
<span id="el<?php echo $view_till_search_list->RowCnt ?>_view_till_search_AnyDues" class="view_till_search_AnyDues">
<span<?php echo $view_till_search->AnyDues->viewAttributes() ?>>
<?php echo $view_till_search->AnyDues->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_till_search->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $view_till_search->createdby->cellAttributes() ?>>
<span id="el<?php echo $view_till_search_list->RowCnt ?>_view_till_search_createdby" class="view_till_search_createdby">
<span<?php echo $view_till_search->createdby->viewAttributes() ?>>
<?php echo $view_till_search->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_till_search->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $view_till_search->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_till_search_list->RowCnt ?>_view_till_search_createddatetime" class="view_till_search_createddatetime">
<span<?php echo $view_till_search->createddatetime->viewAttributes() ?>>
<?php echo $view_till_search->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_till_search->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $view_till_search->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $view_till_search_list->RowCnt ?>_view_till_search_modifiedby" class="view_till_search_modifiedby">
<span<?php echo $view_till_search->modifiedby->viewAttributes() ?>>
<?php echo $view_till_search->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_till_search->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $view_till_search->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_till_search_list->RowCnt ?>_view_till_search_modifieddatetime" class="view_till_search_modifieddatetime">
<span<?php echo $view_till_search->modifieddatetime->viewAttributes() ?>>
<?php echo $view_till_search->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_till_search->BillNumber->Visible) { // BillNumber ?>
		<td data-name="BillNumber"<?php echo $view_till_search->BillNumber->cellAttributes() ?>>
<span id="el<?php echo $view_till_search_list->RowCnt ?>_view_till_search_BillNumber" class="view_till_search_BillNumber">
<span<?php echo $view_till_search->BillNumber->viewAttributes() ?>>
<?php echo $view_till_search->BillNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_till_search->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID"<?php echo $view_till_search->PatientID->cellAttributes() ?>>
<span id="el<?php echo $view_till_search_list->RowCnt ?>_view_till_search_PatientID" class="view_till_search_PatientID">
<span<?php echo $view_till_search->PatientID->viewAttributes() ?>>
<?php echo $view_till_search->PatientID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_till_search->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $view_till_search->PatientName->cellAttributes() ?>>
<span id="el<?php echo $view_till_search_list->RowCnt ?>_view_till_search_PatientName" class="view_till_search_PatientName">
<span<?php echo $view_till_search->PatientName->viewAttributes() ?>>
<?php echo $view_till_search->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_till_search->BillType->Visible) { // BillType ?>
		<td data-name="BillType"<?php echo $view_till_search->BillType->cellAttributes() ?>>
<span id="el<?php echo $view_till_search_list->RowCnt ?>_view_till_search_BillType" class="view_till_search_BillType">
<span<?php echo $view_till_search->BillType->viewAttributes() ?>>
<?php echo $view_till_search->BillType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_till_search->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_till_search->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_till_search_list->RowCnt ?>_view_till_search_HospID" class="view_till_search_HospID">
<span<?php echo $view_till_search->HospID->viewAttributes() ?>>
<?php echo $view_till_search->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_till_search->Cash->Visible) { // Cash ?>
		<td data-name="Cash"<?php echo $view_till_search->Cash->cellAttributes() ?>>
<span id="el<?php echo $view_till_search_list->RowCnt ?>_view_till_search_Cash" class="view_till_search_Cash">
<span<?php echo $view_till_search->Cash->viewAttributes() ?>>
<?php echo $view_till_search->Cash->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_till_search->Card->Visible) { // Card ?>
		<td data-name="Card"<?php echo $view_till_search->Card->cellAttributes() ?>>
<span id="el<?php echo $view_till_search_list->RowCnt ?>_view_till_search_Card" class="view_till_search_Card">
<span<?php echo $view_till_search->Card->viewAttributes() ?>>
<?php echo $view_till_search->Card->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_till_search_list->ListOptions->render("body", "right", $view_till_search_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_till_search->isGridAdd())
		$view_till_search_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_till_search->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_till_search_list->Recordset)
	$view_till_search_list->Recordset->Close();
?>
<?php if (!$view_till_search->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_till_search->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_till_search_list->Pager)) $view_till_search_list->Pager = new NumericPager($view_till_search_list->StartRec, $view_till_search_list->DisplayRecs, $view_till_search_list->TotalRecs, $view_till_search_list->RecRange, $view_till_search_list->AutoHidePager) ?>
<?php if ($view_till_search_list->Pager->RecordCount > 0 && $view_till_search_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_till_search_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_till_search_list->pageUrl() ?>start=<?php echo $view_till_search_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_till_search_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_till_search_list->pageUrl() ?>start=<?php echo $view_till_search_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_till_search_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_till_search_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_till_search_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_till_search_list->pageUrl() ?>start=<?php echo $view_till_search_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_till_search_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_till_search_list->pageUrl() ?>start=<?php echo $view_till_search_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_till_search_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_till_search_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_till_search_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_till_search_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_till_search_list->TotalRecs > 0 && (!$view_till_search_list->AutoHidePageSizeSelector || $view_till_search_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_till_search">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_till_search_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_till_search_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_till_search_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_till_search_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_till_search_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_till_search_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_till_search->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_till_search_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_till_search_list->TotalRecs == 0 && !$view_till_search->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_till_search_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_till_search_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_till_search->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_till_search->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_till_search", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_till_search_list->terminate();
?>