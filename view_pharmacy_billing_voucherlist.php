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
$view_pharmacy_billing_voucher_list = new view_pharmacy_billing_voucher_list();

// Run the page
$view_pharmacy_billing_voucher_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacy_billing_voucher_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_pharmacy_billing_voucher->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_pharmacy_billing_voucherlist = currentForm = new ew.Form("fview_pharmacy_billing_voucherlist", "list");
fview_pharmacy_billing_voucherlist.formKeyCountName = '<?php echo $view_pharmacy_billing_voucher_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_pharmacy_billing_voucherlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_pharmacy_billing_voucherlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fview_pharmacy_billing_voucherlistsrch = currentSearchForm = new ew.Form("fview_pharmacy_billing_voucherlistsrch");

// Filters
fview_pharmacy_billing_voucherlistsrch.filterList = <?php echo $view_pharmacy_billing_voucher_list->getFilterList() ?>;
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
<?php if (!$view_pharmacy_billing_voucher->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_pharmacy_billing_voucher_list->TotalRecs > 0 && $view_pharmacy_billing_voucher_list->ExportOptions->visible()) { ?>
<?php $view_pharmacy_billing_voucher_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_billing_voucher_list->ImportOptions->visible()) { ?>
<?php $view_pharmacy_billing_voucher_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_billing_voucher_list->SearchOptions->visible()) { ?>
<?php $view_pharmacy_billing_voucher_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_billing_voucher_list->FilterOptions->visible()) { ?>
<?php $view_pharmacy_billing_voucher_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_pharmacy_billing_voucher_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_pharmacy_billing_voucher->isExport() && !$view_pharmacy_billing_voucher->CurrentAction) { ?>
<form name="fview_pharmacy_billing_voucherlistsrch" id="fview_pharmacy_billing_voucherlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_pharmacy_billing_voucher_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_pharmacy_billing_voucherlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_pharmacy_billing_voucher">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_pharmacy_billing_voucher_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_pharmacy_billing_voucher_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_pharmacy_billing_voucher_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_pharmacy_billing_voucher_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_billing_voucher_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_billing_voucher_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_billing_voucher_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_pharmacy_billing_voucher_list->showPageHeader(); ?>
<?php
$view_pharmacy_billing_voucher_list->showMessage();
?>
<?php if ($view_pharmacy_billing_voucher_list->TotalRecs > 0 || $view_pharmacy_billing_voucher->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_pharmacy_billing_voucher_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_pharmacy_billing_voucher">
<?php if (!$view_pharmacy_billing_voucher->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_pharmacy_billing_voucher->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_pharmacy_billing_voucher_list->Pager)) $view_pharmacy_billing_voucher_list->Pager = new NumericPager($view_pharmacy_billing_voucher_list->StartRec, $view_pharmacy_billing_voucher_list->DisplayRecs, $view_pharmacy_billing_voucher_list->TotalRecs, $view_pharmacy_billing_voucher_list->RecRange, $view_pharmacy_billing_voucher_list->AutoHidePager) ?>
<?php if ($view_pharmacy_billing_voucher_list->Pager->RecordCount > 0 && $view_pharmacy_billing_voucher_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_pharmacy_billing_voucher_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_billing_voucher_list->pageUrl() ?>start=<?php echo $view_pharmacy_billing_voucher_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_billing_voucher_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_billing_voucher_list->pageUrl() ?>start=<?php echo $view_pharmacy_billing_voucher_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_pharmacy_billing_voucher_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_pharmacy_billing_voucher_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_billing_voucher_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_billing_voucher_list->pageUrl() ?>start=<?php echo $view_pharmacy_billing_voucher_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_billing_voucher_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_billing_voucher_list->pageUrl() ?>start=<?php echo $view_pharmacy_billing_voucher_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_pharmacy_billing_voucher_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_pharmacy_billing_voucher_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_pharmacy_billing_voucher_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_pharmacy_billing_voucher_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_pharmacy_billing_voucher_list->TotalRecs > 0 && (!$view_pharmacy_billing_voucher_list->AutoHidePageSizeSelector || $view_pharmacy_billing_voucher_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_pharmacy_billing_voucher">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_pharmacy_billing_voucher_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_pharmacy_billing_voucher_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_pharmacy_billing_voucher_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_pharmacy_billing_voucher_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_pharmacy_billing_voucher_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_pharmacy_billing_voucher_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_pharmacy_billing_voucher->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_billing_voucher_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_pharmacy_billing_voucherlist" id="fview_pharmacy_billing_voucherlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_pharmacy_billing_voucher_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_pharmacy_billing_voucher_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_billing_voucher">
<div id="gmp_view_pharmacy_billing_voucher" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_pharmacy_billing_voucher_list->TotalRecs > 0 || $view_pharmacy_billing_voucher->isGridEdit()) { ?>
<table id="tbl_view_pharmacy_billing_voucherlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_pharmacy_billing_voucher_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_pharmacy_billing_voucher_list->renderListOptions();

// Render list options (header, left)
$view_pharmacy_billing_voucher_list->ListOptions->render("header", "left");
?>
<?php if ($view_pharmacy_billing_voucher->id->Visible) { // id ?>
	<?php if ($view_pharmacy_billing_voucher->sortUrl($view_pharmacy_billing_voucher->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_pharmacy_billing_voucher->id->headerCellClass() ?>"><div id="elh_view_pharmacy_billing_voucher_id" class="view_pharmacy_billing_voucher_id"><div class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_pharmacy_billing_voucher->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_billing_voucher->SortUrl($view_pharmacy_billing_voucher->id) ?>',1);"><div id="elh_view_pharmacy_billing_voucher_id" class="view_pharmacy_billing_voucher_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_billing_voucher->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_billing_voucher->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_billing_voucher->Reception->Visible) { // Reception ?>
	<?php if ($view_pharmacy_billing_voucher->sortUrl($view_pharmacy_billing_voucher->Reception) == "") { ?>
		<th data-name="Reception" class="<?php echo $view_pharmacy_billing_voucher->Reception->headerCellClass() ?>"><div id="elh_view_pharmacy_billing_voucher_Reception" class="view_pharmacy_billing_voucher_Reception"><div class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->Reception->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Reception" class="<?php echo $view_pharmacy_billing_voucher->Reception->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_billing_voucher->SortUrl($view_pharmacy_billing_voucher->Reception) ?>',1);"><div id="elh_view_pharmacy_billing_voucher_Reception" class="view_pharmacy_billing_voucher_Reception">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->Reception->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_billing_voucher->Reception->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_billing_voucher->Reception->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_billing_voucher->PatientId->Visible) { // PatientId ?>
	<?php if ($view_pharmacy_billing_voucher->sortUrl($view_pharmacy_billing_voucher->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $view_pharmacy_billing_voucher->PatientId->headerCellClass() ?>"><div id="elh_view_pharmacy_billing_voucher_PatientId" class="view_pharmacy_billing_voucher_PatientId"><div class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $view_pharmacy_billing_voucher->PatientId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_billing_voucher->SortUrl($view_pharmacy_billing_voucher->PatientId) ?>',1);"><div id="elh_view_pharmacy_billing_voucher_PatientId" class="view_pharmacy_billing_voucher_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->PatientId->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_billing_voucher->PatientId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_billing_voucher->PatientId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_billing_voucher->mrnno->Visible) { // mrnno ?>
	<?php if ($view_pharmacy_billing_voucher->sortUrl($view_pharmacy_billing_voucher->mrnno) == "") { ?>
		<th data-name="mrnno" class="<?php echo $view_pharmacy_billing_voucher->mrnno->headerCellClass() ?>"><div id="elh_view_pharmacy_billing_voucher_mrnno" class="view_pharmacy_billing_voucher_mrnno"><div class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->mrnno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnno" class="<?php echo $view_pharmacy_billing_voucher->mrnno->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_billing_voucher->SortUrl($view_pharmacy_billing_voucher->mrnno) ?>',1);"><div id="elh_view_pharmacy_billing_voucher_mrnno" class="view_pharmacy_billing_voucher_mrnno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->mrnno->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_billing_voucher->mrnno->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_billing_voucher->mrnno->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_billing_voucher->PatientName->Visible) { // PatientName ?>
	<?php if ($view_pharmacy_billing_voucher->sortUrl($view_pharmacy_billing_voucher->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $view_pharmacy_billing_voucher->PatientName->headerCellClass() ?>"><div id="elh_view_pharmacy_billing_voucher_PatientName" class="view_pharmacy_billing_voucher_PatientName"><div class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $view_pharmacy_billing_voucher->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_billing_voucher->SortUrl($view_pharmacy_billing_voucher->PatientName) ?>',1);"><div id="elh_view_pharmacy_billing_voucher_PatientName" class="view_pharmacy_billing_voucher_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_billing_voucher->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_billing_voucher->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_billing_voucher->Age->Visible) { // Age ?>
	<?php if ($view_pharmacy_billing_voucher->sortUrl($view_pharmacy_billing_voucher->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $view_pharmacy_billing_voucher->Age->headerCellClass() ?>"><div id="elh_view_pharmacy_billing_voucher_Age" class="view_pharmacy_billing_voucher_Age"><div class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $view_pharmacy_billing_voucher->Age->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_billing_voucher->SortUrl($view_pharmacy_billing_voucher->Age) ?>',1);"><div id="elh_view_pharmacy_billing_voucher_Age" class="view_pharmacy_billing_voucher_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->Age->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_billing_voucher->Age->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_billing_voucher->Age->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_billing_voucher->Gender->Visible) { // Gender ?>
	<?php if ($view_pharmacy_billing_voucher->sortUrl($view_pharmacy_billing_voucher->Gender) == "") { ?>
		<th data-name="Gender" class="<?php echo $view_pharmacy_billing_voucher->Gender->headerCellClass() ?>"><div id="elh_view_pharmacy_billing_voucher_Gender" class="view_pharmacy_billing_voucher_Gender"><div class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->Gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gender" class="<?php echo $view_pharmacy_billing_voucher->Gender->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_billing_voucher->SortUrl($view_pharmacy_billing_voucher->Gender) ?>',1);"><div id="elh_view_pharmacy_billing_voucher_Gender" class="view_pharmacy_billing_voucher_Gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->Gender->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_billing_voucher->Gender->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_billing_voucher->Gender->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_billing_voucher->Mobile->Visible) { // Mobile ?>
	<?php if ($view_pharmacy_billing_voucher->sortUrl($view_pharmacy_billing_voucher->Mobile) == "") { ?>
		<th data-name="Mobile" class="<?php echo $view_pharmacy_billing_voucher->Mobile->headerCellClass() ?>"><div id="elh_view_pharmacy_billing_voucher_Mobile" class="view_pharmacy_billing_voucher_Mobile"><div class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->Mobile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mobile" class="<?php echo $view_pharmacy_billing_voucher->Mobile->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_billing_voucher->SortUrl($view_pharmacy_billing_voucher->Mobile) ?>',1);"><div id="elh_view_pharmacy_billing_voucher_Mobile" class="view_pharmacy_billing_voucher_Mobile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->Mobile->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_billing_voucher->Mobile->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_billing_voucher->Mobile->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_billing_voucher->IP_OP->Visible) { // IP_OP ?>
	<?php if ($view_pharmacy_billing_voucher->sortUrl($view_pharmacy_billing_voucher->IP_OP) == "") { ?>
		<th data-name="IP_OP" class="<?php echo $view_pharmacy_billing_voucher->IP_OP->headerCellClass() ?>"><div id="elh_view_pharmacy_billing_voucher_IP_OP" class="view_pharmacy_billing_voucher_IP_OP"><div class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->IP_OP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IP_OP" class="<?php echo $view_pharmacy_billing_voucher->IP_OP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_billing_voucher->SortUrl($view_pharmacy_billing_voucher->IP_OP) ?>',1);"><div id="elh_view_pharmacy_billing_voucher_IP_OP" class="view_pharmacy_billing_voucher_IP_OP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->IP_OP->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_billing_voucher->IP_OP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_billing_voucher->IP_OP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_billing_voucher->Doctor->Visible) { // Doctor ?>
	<?php if ($view_pharmacy_billing_voucher->sortUrl($view_pharmacy_billing_voucher->Doctor) == "") { ?>
		<th data-name="Doctor" class="<?php echo $view_pharmacy_billing_voucher->Doctor->headerCellClass() ?>"><div id="elh_view_pharmacy_billing_voucher_Doctor" class="view_pharmacy_billing_voucher_Doctor"><div class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->Doctor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Doctor" class="<?php echo $view_pharmacy_billing_voucher->Doctor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_billing_voucher->SortUrl($view_pharmacy_billing_voucher->Doctor) ?>',1);"><div id="elh_view_pharmacy_billing_voucher_Doctor" class="view_pharmacy_billing_voucher_Doctor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->Doctor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_billing_voucher->Doctor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_billing_voucher->Doctor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_billing_voucher->voucher_type->Visible) { // voucher_type ?>
	<?php if ($view_pharmacy_billing_voucher->sortUrl($view_pharmacy_billing_voucher->voucher_type) == "") { ?>
		<th data-name="voucher_type" class="<?php echo $view_pharmacy_billing_voucher->voucher_type->headerCellClass() ?>"><div id="elh_view_pharmacy_billing_voucher_voucher_type" class="view_pharmacy_billing_voucher_voucher_type"><div class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->voucher_type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="voucher_type" class="<?php echo $view_pharmacy_billing_voucher->voucher_type->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_billing_voucher->SortUrl($view_pharmacy_billing_voucher->voucher_type) ?>',1);"><div id="elh_view_pharmacy_billing_voucher_voucher_type" class="view_pharmacy_billing_voucher_voucher_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->voucher_type->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_billing_voucher->voucher_type->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_billing_voucher->voucher_type->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_billing_voucher->Details->Visible) { // Details ?>
	<?php if ($view_pharmacy_billing_voucher->sortUrl($view_pharmacy_billing_voucher->Details) == "") { ?>
		<th data-name="Details" class="<?php echo $view_pharmacy_billing_voucher->Details->headerCellClass() ?>"><div id="elh_view_pharmacy_billing_voucher_Details" class="view_pharmacy_billing_voucher_Details"><div class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->Details->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Details" class="<?php echo $view_pharmacy_billing_voucher->Details->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_billing_voucher->SortUrl($view_pharmacy_billing_voucher->Details) ?>',1);"><div id="elh_view_pharmacy_billing_voucher_Details" class="view_pharmacy_billing_voucher_Details">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->Details->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_billing_voucher->Details->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_billing_voucher->Details->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_billing_voucher->ModeofPayment->Visible) { // ModeofPayment ?>
	<?php if ($view_pharmacy_billing_voucher->sortUrl($view_pharmacy_billing_voucher->ModeofPayment) == "") { ?>
		<th data-name="ModeofPayment" class="<?php echo $view_pharmacy_billing_voucher->ModeofPayment->headerCellClass() ?>"><div id="elh_view_pharmacy_billing_voucher_ModeofPayment" class="view_pharmacy_billing_voucher_ModeofPayment"><div class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->ModeofPayment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModeofPayment" class="<?php echo $view_pharmacy_billing_voucher->ModeofPayment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_billing_voucher->SortUrl($view_pharmacy_billing_voucher->ModeofPayment) ?>',1);"><div id="elh_view_pharmacy_billing_voucher_ModeofPayment" class="view_pharmacy_billing_voucher_ModeofPayment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->ModeofPayment->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_billing_voucher->ModeofPayment->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_billing_voucher->ModeofPayment->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_billing_voucher->Amount->Visible) { // Amount ?>
	<?php if ($view_pharmacy_billing_voucher->sortUrl($view_pharmacy_billing_voucher->Amount) == "") { ?>
		<th data-name="Amount" class="<?php echo $view_pharmacy_billing_voucher->Amount->headerCellClass() ?>"><div id="elh_view_pharmacy_billing_voucher_Amount" class="view_pharmacy_billing_voucher_Amount"><div class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->Amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Amount" class="<?php echo $view_pharmacy_billing_voucher->Amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_billing_voucher->SortUrl($view_pharmacy_billing_voucher->Amount) ?>',1);"><div id="elh_view_pharmacy_billing_voucher_Amount" class="view_pharmacy_billing_voucher_Amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->Amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_billing_voucher->Amount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_billing_voucher->Amount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_billing_voucher->AnyDues->Visible) { // AnyDues ?>
	<?php if ($view_pharmacy_billing_voucher->sortUrl($view_pharmacy_billing_voucher->AnyDues) == "") { ?>
		<th data-name="AnyDues" class="<?php echo $view_pharmacy_billing_voucher->AnyDues->headerCellClass() ?>"><div id="elh_view_pharmacy_billing_voucher_AnyDues" class="view_pharmacy_billing_voucher_AnyDues"><div class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->AnyDues->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AnyDues" class="<?php echo $view_pharmacy_billing_voucher->AnyDues->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_billing_voucher->SortUrl($view_pharmacy_billing_voucher->AnyDues) ?>',1);"><div id="elh_view_pharmacy_billing_voucher_AnyDues" class="view_pharmacy_billing_voucher_AnyDues">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->AnyDues->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_billing_voucher->AnyDues->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_billing_voucher->AnyDues->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_billing_voucher->createdby->Visible) { // createdby ?>
	<?php if ($view_pharmacy_billing_voucher->sortUrl($view_pharmacy_billing_voucher->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $view_pharmacy_billing_voucher->createdby->headerCellClass() ?>"><div id="elh_view_pharmacy_billing_voucher_createdby" class="view_pharmacy_billing_voucher_createdby"><div class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $view_pharmacy_billing_voucher->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_billing_voucher->SortUrl($view_pharmacy_billing_voucher->createdby) ?>',1);"><div id="elh_view_pharmacy_billing_voucher_createdby" class="view_pharmacy_billing_voucher_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->createdby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_billing_voucher->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_billing_voucher->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_billing_voucher->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_pharmacy_billing_voucher->sortUrl($view_pharmacy_billing_voucher->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_pharmacy_billing_voucher->createddatetime->headerCellClass() ?>"><div id="elh_view_pharmacy_billing_voucher_createddatetime" class="view_pharmacy_billing_voucher_createddatetime"><div class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_pharmacy_billing_voucher->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_billing_voucher->SortUrl($view_pharmacy_billing_voucher->createddatetime) ?>',1);"><div id="elh_view_pharmacy_billing_voucher_createddatetime" class="view_pharmacy_billing_voucher_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_billing_voucher->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_billing_voucher->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_billing_voucher->modifiedby->Visible) { // modifiedby ?>
	<?php if ($view_pharmacy_billing_voucher->sortUrl($view_pharmacy_billing_voucher->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $view_pharmacy_billing_voucher->modifiedby->headerCellClass() ?>"><div id="elh_view_pharmacy_billing_voucher_modifiedby" class="view_pharmacy_billing_voucher_modifiedby"><div class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $view_pharmacy_billing_voucher->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_billing_voucher->SortUrl($view_pharmacy_billing_voucher->modifiedby) ?>',1);"><div id="elh_view_pharmacy_billing_voucher_modifiedby" class="view_pharmacy_billing_voucher_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->modifiedby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_billing_voucher->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_billing_voucher->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_billing_voucher->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($view_pharmacy_billing_voucher->sortUrl($view_pharmacy_billing_voucher->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_pharmacy_billing_voucher->modifieddatetime->headerCellClass() ?>"><div id="elh_view_pharmacy_billing_voucher_modifieddatetime" class="view_pharmacy_billing_voucher_modifieddatetime"><div class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_pharmacy_billing_voucher->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_billing_voucher->SortUrl($view_pharmacy_billing_voucher->modifieddatetime) ?>',1);"><div id="elh_view_pharmacy_billing_voucher_modifieddatetime" class="view_pharmacy_billing_voucher_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_billing_voucher->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_billing_voucher->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_billing_voucher->RealizationAmount->Visible) { // RealizationAmount ?>
	<?php if ($view_pharmacy_billing_voucher->sortUrl($view_pharmacy_billing_voucher->RealizationAmount) == "") { ?>
		<th data-name="RealizationAmount" class="<?php echo $view_pharmacy_billing_voucher->RealizationAmount->headerCellClass() ?>"><div id="elh_view_pharmacy_billing_voucher_RealizationAmount" class="view_pharmacy_billing_voucher_RealizationAmount"><div class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->RealizationAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RealizationAmount" class="<?php echo $view_pharmacy_billing_voucher->RealizationAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_billing_voucher->SortUrl($view_pharmacy_billing_voucher->RealizationAmount) ?>',1);"><div id="elh_view_pharmacy_billing_voucher_RealizationAmount" class="view_pharmacy_billing_voucher_RealizationAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->RealizationAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_billing_voucher->RealizationAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_billing_voucher->RealizationAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_billing_voucher->RealizationStatus->Visible) { // RealizationStatus ?>
	<?php if ($view_pharmacy_billing_voucher->sortUrl($view_pharmacy_billing_voucher->RealizationStatus) == "") { ?>
		<th data-name="RealizationStatus" class="<?php echo $view_pharmacy_billing_voucher->RealizationStatus->headerCellClass() ?>"><div id="elh_view_pharmacy_billing_voucher_RealizationStatus" class="view_pharmacy_billing_voucher_RealizationStatus"><div class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->RealizationStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RealizationStatus" class="<?php echo $view_pharmacy_billing_voucher->RealizationStatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_billing_voucher->SortUrl($view_pharmacy_billing_voucher->RealizationStatus) ?>',1);"><div id="elh_view_pharmacy_billing_voucher_RealizationStatus" class="view_pharmacy_billing_voucher_RealizationStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->RealizationStatus->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_billing_voucher->RealizationStatus->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_billing_voucher->RealizationStatus->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_billing_voucher->RealizationRemarks->Visible) { // RealizationRemarks ?>
	<?php if ($view_pharmacy_billing_voucher->sortUrl($view_pharmacy_billing_voucher->RealizationRemarks) == "") { ?>
		<th data-name="RealizationRemarks" class="<?php echo $view_pharmacy_billing_voucher->RealizationRemarks->headerCellClass() ?>"><div id="elh_view_pharmacy_billing_voucher_RealizationRemarks" class="view_pharmacy_billing_voucher_RealizationRemarks"><div class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->RealizationRemarks->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RealizationRemarks" class="<?php echo $view_pharmacy_billing_voucher->RealizationRemarks->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_billing_voucher->SortUrl($view_pharmacy_billing_voucher->RealizationRemarks) ?>',1);"><div id="elh_view_pharmacy_billing_voucher_RealizationRemarks" class="view_pharmacy_billing_voucher_RealizationRemarks">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->RealizationRemarks->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_billing_voucher->RealizationRemarks->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_billing_voucher->RealizationRemarks->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_billing_voucher->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
	<?php if ($view_pharmacy_billing_voucher->sortUrl($view_pharmacy_billing_voucher->RealizationBatchNo) == "") { ?>
		<th data-name="RealizationBatchNo" class="<?php echo $view_pharmacy_billing_voucher->RealizationBatchNo->headerCellClass() ?>"><div id="elh_view_pharmacy_billing_voucher_RealizationBatchNo" class="view_pharmacy_billing_voucher_RealizationBatchNo"><div class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->RealizationBatchNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RealizationBatchNo" class="<?php echo $view_pharmacy_billing_voucher->RealizationBatchNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_billing_voucher->SortUrl($view_pharmacy_billing_voucher->RealizationBatchNo) ?>',1);"><div id="elh_view_pharmacy_billing_voucher_RealizationBatchNo" class="view_pharmacy_billing_voucher_RealizationBatchNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->RealizationBatchNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_billing_voucher->RealizationBatchNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_billing_voucher->RealizationBatchNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_billing_voucher->RealizationDate->Visible) { // RealizationDate ?>
	<?php if ($view_pharmacy_billing_voucher->sortUrl($view_pharmacy_billing_voucher->RealizationDate) == "") { ?>
		<th data-name="RealizationDate" class="<?php echo $view_pharmacy_billing_voucher->RealizationDate->headerCellClass() ?>"><div id="elh_view_pharmacy_billing_voucher_RealizationDate" class="view_pharmacy_billing_voucher_RealizationDate"><div class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->RealizationDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RealizationDate" class="<?php echo $view_pharmacy_billing_voucher->RealizationDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_billing_voucher->SortUrl($view_pharmacy_billing_voucher->RealizationDate) ?>',1);"><div id="elh_view_pharmacy_billing_voucher_RealizationDate" class="view_pharmacy_billing_voucher_RealizationDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->RealizationDate->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_billing_voucher->RealizationDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_billing_voucher->RealizationDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_billing_voucher->HospID->Visible) { // HospID ?>
	<?php if ($view_pharmacy_billing_voucher->sortUrl($view_pharmacy_billing_voucher->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_pharmacy_billing_voucher->HospID->headerCellClass() ?>"><div id="elh_view_pharmacy_billing_voucher_HospID" class="view_pharmacy_billing_voucher_HospID"><div class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_pharmacy_billing_voucher->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_billing_voucher->SortUrl($view_pharmacy_billing_voucher->HospID) ?>',1);"><div id="elh_view_pharmacy_billing_voucher_HospID" class="view_pharmacy_billing_voucher_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_billing_voucher->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_billing_voucher->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_billing_voucher->RIDNO->Visible) { // RIDNO ?>
	<?php if ($view_pharmacy_billing_voucher->sortUrl($view_pharmacy_billing_voucher->RIDNO) == "") { ?>
		<th data-name="RIDNO" class="<?php echo $view_pharmacy_billing_voucher->RIDNO->headerCellClass() ?>"><div id="elh_view_pharmacy_billing_voucher_RIDNO" class="view_pharmacy_billing_voucher_RIDNO"><div class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->RIDNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RIDNO" class="<?php echo $view_pharmacy_billing_voucher->RIDNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_billing_voucher->SortUrl($view_pharmacy_billing_voucher->RIDNO) ?>',1);"><div id="elh_view_pharmacy_billing_voucher_RIDNO" class="view_pharmacy_billing_voucher_RIDNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->RIDNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_billing_voucher->RIDNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_billing_voucher->RIDNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_billing_voucher->TidNo->Visible) { // TidNo ?>
	<?php if ($view_pharmacy_billing_voucher->sortUrl($view_pharmacy_billing_voucher->TidNo) == "") { ?>
		<th data-name="TidNo" class="<?php echo $view_pharmacy_billing_voucher->TidNo->headerCellClass() ?>"><div id="elh_view_pharmacy_billing_voucher_TidNo" class="view_pharmacy_billing_voucher_TidNo"><div class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->TidNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TidNo" class="<?php echo $view_pharmacy_billing_voucher->TidNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_billing_voucher->SortUrl($view_pharmacy_billing_voucher->TidNo) ?>',1);"><div id="elh_view_pharmacy_billing_voucher_TidNo" class="view_pharmacy_billing_voucher_TidNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->TidNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_billing_voucher->TidNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_billing_voucher->TidNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_billing_voucher->CId->Visible) { // CId ?>
	<?php if ($view_pharmacy_billing_voucher->sortUrl($view_pharmacy_billing_voucher->CId) == "") { ?>
		<th data-name="CId" class="<?php echo $view_pharmacy_billing_voucher->CId->headerCellClass() ?>"><div id="elh_view_pharmacy_billing_voucher_CId" class="view_pharmacy_billing_voucher_CId"><div class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->CId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CId" class="<?php echo $view_pharmacy_billing_voucher->CId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_billing_voucher->SortUrl($view_pharmacy_billing_voucher->CId) ?>',1);"><div id="elh_view_pharmacy_billing_voucher_CId" class="view_pharmacy_billing_voucher_CId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->CId->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_billing_voucher->CId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_billing_voucher->CId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_billing_voucher->PartnerName->Visible) { // PartnerName ?>
	<?php if ($view_pharmacy_billing_voucher->sortUrl($view_pharmacy_billing_voucher->PartnerName) == "") { ?>
		<th data-name="PartnerName" class="<?php echo $view_pharmacy_billing_voucher->PartnerName->headerCellClass() ?>"><div id="elh_view_pharmacy_billing_voucher_PartnerName" class="view_pharmacy_billing_voucher_PartnerName"><div class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->PartnerName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerName" class="<?php echo $view_pharmacy_billing_voucher->PartnerName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_billing_voucher->SortUrl($view_pharmacy_billing_voucher->PartnerName) ?>',1);"><div id="elh_view_pharmacy_billing_voucher_PartnerName" class="view_pharmacy_billing_voucher_PartnerName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->PartnerName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_billing_voucher->PartnerName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_billing_voucher->PartnerName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_billing_voucher->PayerType->Visible) { // PayerType ?>
	<?php if ($view_pharmacy_billing_voucher->sortUrl($view_pharmacy_billing_voucher->PayerType) == "") { ?>
		<th data-name="PayerType" class="<?php echo $view_pharmacy_billing_voucher->PayerType->headerCellClass() ?>"><div id="elh_view_pharmacy_billing_voucher_PayerType" class="view_pharmacy_billing_voucher_PayerType"><div class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->PayerType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PayerType" class="<?php echo $view_pharmacy_billing_voucher->PayerType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_billing_voucher->SortUrl($view_pharmacy_billing_voucher->PayerType) ?>',1);"><div id="elh_view_pharmacy_billing_voucher_PayerType" class="view_pharmacy_billing_voucher_PayerType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->PayerType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_billing_voucher->PayerType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_billing_voucher->PayerType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_billing_voucher->Dob->Visible) { // Dob ?>
	<?php if ($view_pharmacy_billing_voucher->sortUrl($view_pharmacy_billing_voucher->Dob) == "") { ?>
		<th data-name="Dob" class="<?php echo $view_pharmacy_billing_voucher->Dob->headerCellClass() ?>"><div id="elh_view_pharmacy_billing_voucher_Dob" class="view_pharmacy_billing_voucher_Dob"><div class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->Dob->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Dob" class="<?php echo $view_pharmacy_billing_voucher->Dob->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_billing_voucher->SortUrl($view_pharmacy_billing_voucher->Dob) ?>',1);"><div id="elh_view_pharmacy_billing_voucher_Dob" class="view_pharmacy_billing_voucher_Dob">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->Dob->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_billing_voucher->Dob->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_billing_voucher->Dob->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_billing_voucher->Currency->Visible) { // Currency ?>
	<?php if ($view_pharmacy_billing_voucher->sortUrl($view_pharmacy_billing_voucher->Currency) == "") { ?>
		<th data-name="Currency" class="<?php echo $view_pharmacy_billing_voucher->Currency->headerCellClass() ?>"><div id="elh_view_pharmacy_billing_voucher_Currency" class="view_pharmacy_billing_voucher_Currency"><div class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->Currency->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Currency" class="<?php echo $view_pharmacy_billing_voucher->Currency->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_billing_voucher->SortUrl($view_pharmacy_billing_voucher->Currency) ?>',1);"><div id="elh_view_pharmacy_billing_voucher_Currency" class="view_pharmacy_billing_voucher_Currency">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->Currency->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_billing_voucher->Currency->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_billing_voucher->Currency->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_billing_voucher->DiscountRemarks->Visible) { // DiscountRemarks ?>
	<?php if ($view_pharmacy_billing_voucher->sortUrl($view_pharmacy_billing_voucher->DiscountRemarks) == "") { ?>
		<th data-name="DiscountRemarks" class="<?php echo $view_pharmacy_billing_voucher->DiscountRemarks->headerCellClass() ?>"><div id="elh_view_pharmacy_billing_voucher_DiscountRemarks" class="view_pharmacy_billing_voucher_DiscountRemarks"><div class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->DiscountRemarks->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DiscountRemarks" class="<?php echo $view_pharmacy_billing_voucher->DiscountRemarks->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_billing_voucher->SortUrl($view_pharmacy_billing_voucher->DiscountRemarks) ?>',1);"><div id="elh_view_pharmacy_billing_voucher_DiscountRemarks" class="view_pharmacy_billing_voucher_DiscountRemarks">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->DiscountRemarks->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_billing_voucher->DiscountRemarks->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_billing_voucher->DiscountRemarks->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_billing_voucher->Remarks->Visible) { // Remarks ?>
	<?php if ($view_pharmacy_billing_voucher->sortUrl($view_pharmacy_billing_voucher->Remarks) == "") { ?>
		<th data-name="Remarks" class="<?php echo $view_pharmacy_billing_voucher->Remarks->headerCellClass() ?>"><div id="elh_view_pharmacy_billing_voucher_Remarks" class="view_pharmacy_billing_voucher_Remarks"><div class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->Remarks->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Remarks" class="<?php echo $view_pharmacy_billing_voucher->Remarks->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_billing_voucher->SortUrl($view_pharmacy_billing_voucher->Remarks) ?>',1);"><div id="elh_view_pharmacy_billing_voucher_Remarks" class="view_pharmacy_billing_voucher_Remarks">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->Remarks->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_billing_voucher->Remarks->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_billing_voucher->Remarks->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_billing_voucher->PatId->Visible) { // PatId ?>
	<?php if ($view_pharmacy_billing_voucher->sortUrl($view_pharmacy_billing_voucher->PatId) == "") { ?>
		<th data-name="PatId" class="<?php echo $view_pharmacy_billing_voucher->PatId->headerCellClass() ?>"><div id="elh_view_pharmacy_billing_voucher_PatId" class="view_pharmacy_billing_voucher_PatId"><div class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->PatId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatId" class="<?php echo $view_pharmacy_billing_voucher->PatId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_billing_voucher->SortUrl($view_pharmacy_billing_voucher->PatId) ?>',1);"><div id="elh_view_pharmacy_billing_voucher_PatId" class="view_pharmacy_billing_voucher_PatId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->PatId->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_billing_voucher->PatId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_billing_voucher->PatId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_billing_voucher->DrDepartment->Visible) { // DrDepartment ?>
	<?php if ($view_pharmacy_billing_voucher->sortUrl($view_pharmacy_billing_voucher->DrDepartment) == "") { ?>
		<th data-name="DrDepartment" class="<?php echo $view_pharmacy_billing_voucher->DrDepartment->headerCellClass() ?>"><div id="elh_view_pharmacy_billing_voucher_DrDepartment" class="view_pharmacy_billing_voucher_DrDepartment"><div class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->DrDepartment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrDepartment" class="<?php echo $view_pharmacy_billing_voucher->DrDepartment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_billing_voucher->SortUrl($view_pharmacy_billing_voucher->DrDepartment) ?>',1);"><div id="elh_view_pharmacy_billing_voucher_DrDepartment" class="view_pharmacy_billing_voucher_DrDepartment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->DrDepartment->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_billing_voucher->DrDepartment->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_billing_voucher->DrDepartment->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_billing_voucher->RefferedBy->Visible) { // RefferedBy ?>
	<?php if ($view_pharmacy_billing_voucher->sortUrl($view_pharmacy_billing_voucher->RefferedBy) == "") { ?>
		<th data-name="RefferedBy" class="<?php echo $view_pharmacy_billing_voucher->RefferedBy->headerCellClass() ?>"><div id="elh_view_pharmacy_billing_voucher_RefferedBy" class="view_pharmacy_billing_voucher_RefferedBy"><div class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->RefferedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RefferedBy" class="<?php echo $view_pharmacy_billing_voucher->RefferedBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_billing_voucher->SortUrl($view_pharmacy_billing_voucher->RefferedBy) ?>',1);"><div id="elh_view_pharmacy_billing_voucher_RefferedBy" class="view_pharmacy_billing_voucher_RefferedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->RefferedBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_billing_voucher->RefferedBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_billing_voucher->RefferedBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_billing_voucher->BillNumber->Visible) { // BillNumber ?>
	<?php if ($view_pharmacy_billing_voucher->sortUrl($view_pharmacy_billing_voucher->BillNumber) == "") { ?>
		<th data-name="BillNumber" class="<?php echo $view_pharmacy_billing_voucher->BillNumber->headerCellClass() ?>"><div id="elh_view_pharmacy_billing_voucher_BillNumber" class="view_pharmacy_billing_voucher_BillNumber"><div class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->BillNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillNumber" class="<?php echo $view_pharmacy_billing_voucher->BillNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_billing_voucher->SortUrl($view_pharmacy_billing_voucher->BillNumber) ?>',1);"><div id="elh_view_pharmacy_billing_voucher_BillNumber" class="view_pharmacy_billing_voucher_BillNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->BillNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_billing_voucher->BillNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_billing_voucher->BillNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_billing_voucher->CardNumber->Visible) { // CardNumber ?>
	<?php if ($view_pharmacy_billing_voucher->sortUrl($view_pharmacy_billing_voucher->CardNumber) == "") { ?>
		<th data-name="CardNumber" class="<?php echo $view_pharmacy_billing_voucher->CardNumber->headerCellClass() ?>"><div id="elh_view_pharmacy_billing_voucher_CardNumber" class="view_pharmacy_billing_voucher_CardNumber"><div class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->CardNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CardNumber" class="<?php echo $view_pharmacy_billing_voucher->CardNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_billing_voucher->SortUrl($view_pharmacy_billing_voucher->CardNumber) ?>',1);"><div id="elh_view_pharmacy_billing_voucher_CardNumber" class="view_pharmacy_billing_voucher_CardNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->CardNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_billing_voucher->CardNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_billing_voucher->CardNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_billing_voucher->BankName->Visible) { // BankName ?>
	<?php if ($view_pharmacy_billing_voucher->sortUrl($view_pharmacy_billing_voucher->BankName) == "") { ?>
		<th data-name="BankName" class="<?php echo $view_pharmacy_billing_voucher->BankName->headerCellClass() ?>"><div id="elh_view_pharmacy_billing_voucher_BankName" class="view_pharmacy_billing_voucher_BankName"><div class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->BankName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BankName" class="<?php echo $view_pharmacy_billing_voucher->BankName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_billing_voucher->SortUrl($view_pharmacy_billing_voucher->BankName) ?>',1);"><div id="elh_view_pharmacy_billing_voucher_BankName" class="view_pharmacy_billing_voucher_BankName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->BankName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_billing_voucher->BankName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_billing_voucher->BankName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_billing_voucher->DrID->Visible) { // DrID ?>
	<?php if ($view_pharmacy_billing_voucher->sortUrl($view_pharmacy_billing_voucher->DrID) == "") { ?>
		<th data-name="DrID" class="<?php echo $view_pharmacy_billing_voucher->DrID->headerCellClass() ?>"><div id="elh_view_pharmacy_billing_voucher_DrID" class="view_pharmacy_billing_voucher_DrID"><div class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->DrID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrID" class="<?php echo $view_pharmacy_billing_voucher->DrID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_billing_voucher->SortUrl($view_pharmacy_billing_voucher->DrID) ?>',1);"><div id="elh_view_pharmacy_billing_voucher_DrID" class="view_pharmacy_billing_voucher_DrID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->DrID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_billing_voucher->DrID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_billing_voucher->DrID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_billing_voucher->BillStatus->Visible) { // BillStatus ?>
	<?php if ($view_pharmacy_billing_voucher->sortUrl($view_pharmacy_billing_voucher->BillStatus) == "") { ?>
		<th data-name="BillStatus" class="<?php echo $view_pharmacy_billing_voucher->BillStatus->headerCellClass() ?>"><div id="elh_view_pharmacy_billing_voucher_BillStatus" class="view_pharmacy_billing_voucher_BillStatus"><div class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->BillStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillStatus" class="<?php echo $view_pharmacy_billing_voucher->BillStatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_billing_voucher->SortUrl($view_pharmacy_billing_voucher->BillStatus) ?>',1);"><div id="elh_view_pharmacy_billing_voucher_BillStatus" class="view_pharmacy_billing_voucher_BillStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->BillStatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_billing_voucher->BillStatus->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_billing_voucher->BillStatus->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_billing_voucher->ReportHeader->Visible) { // ReportHeader ?>
	<?php if ($view_pharmacy_billing_voucher->sortUrl($view_pharmacy_billing_voucher->ReportHeader) == "") { ?>
		<th data-name="ReportHeader" class="<?php echo $view_pharmacy_billing_voucher->ReportHeader->headerCellClass() ?>"><div id="elh_view_pharmacy_billing_voucher_ReportHeader" class="view_pharmacy_billing_voucher_ReportHeader"><div class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->ReportHeader->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReportHeader" class="<?php echo $view_pharmacy_billing_voucher->ReportHeader->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_billing_voucher->SortUrl($view_pharmacy_billing_voucher->ReportHeader) ?>',1);"><div id="elh_view_pharmacy_billing_voucher_ReportHeader" class="view_pharmacy_billing_voucher_ReportHeader">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->ReportHeader->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_billing_voucher->ReportHeader->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_billing_voucher->ReportHeader->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_billing_voucher->PharID->Visible) { // PharID ?>
	<?php if ($view_pharmacy_billing_voucher->sortUrl($view_pharmacy_billing_voucher->PharID) == "") { ?>
		<th data-name="PharID" class="<?php echo $view_pharmacy_billing_voucher->PharID->headerCellClass() ?>"><div id="elh_view_pharmacy_billing_voucher_PharID" class="view_pharmacy_billing_voucher_PharID"><div class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->PharID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PharID" class="<?php echo $view_pharmacy_billing_voucher->PharID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_billing_voucher->SortUrl($view_pharmacy_billing_voucher->PharID) ?>',1);"><div id="elh_view_pharmacy_billing_voucher_PharID" class="view_pharmacy_billing_voucher_PharID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->PharID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_billing_voucher->PharID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_billing_voucher->PharID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_billing_voucher->UserName->Visible) { // UserName ?>
	<?php if ($view_pharmacy_billing_voucher->sortUrl($view_pharmacy_billing_voucher->UserName) == "") { ?>
		<th data-name="UserName" class="<?php echo $view_pharmacy_billing_voucher->UserName->headerCellClass() ?>"><div id="elh_view_pharmacy_billing_voucher_UserName" class="view_pharmacy_billing_voucher_UserName"><div class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->UserName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UserName" class="<?php echo $view_pharmacy_billing_voucher->UserName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_billing_voucher->SortUrl($view_pharmacy_billing_voucher->UserName) ?>',1);"><div id="elh_view_pharmacy_billing_voucher_UserName" class="view_pharmacy_billing_voucher_UserName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->UserName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_billing_voucher->UserName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_billing_voucher->UserName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_billing_voucher->CardType->Visible) { // CardType ?>
	<?php if ($view_pharmacy_billing_voucher->sortUrl($view_pharmacy_billing_voucher->CardType) == "") { ?>
		<th data-name="CardType" class="<?php echo $view_pharmacy_billing_voucher->CardType->headerCellClass() ?>"><div id="elh_view_pharmacy_billing_voucher_CardType" class="view_pharmacy_billing_voucher_CardType"><div class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->CardType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CardType" class="<?php echo $view_pharmacy_billing_voucher->CardType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_billing_voucher->SortUrl($view_pharmacy_billing_voucher->CardType) ?>',1);"><div id="elh_view_pharmacy_billing_voucher_CardType" class="view_pharmacy_billing_voucher_CardType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->CardType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_billing_voucher->CardType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_billing_voucher->CardType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_billing_voucher->DiscountAmount->Visible) { // DiscountAmount ?>
	<?php if ($view_pharmacy_billing_voucher->sortUrl($view_pharmacy_billing_voucher->DiscountAmount) == "") { ?>
		<th data-name="DiscountAmount" class="<?php echo $view_pharmacy_billing_voucher->DiscountAmount->headerCellClass() ?>"><div id="elh_view_pharmacy_billing_voucher_DiscountAmount" class="view_pharmacy_billing_voucher_DiscountAmount"><div class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->DiscountAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DiscountAmount" class="<?php echo $view_pharmacy_billing_voucher->DiscountAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_billing_voucher->SortUrl($view_pharmacy_billing_voucher->DiscountAmount) ?>',1);"><div id="elh_view_pharmacy_billing_voucher_DiscountAmount" class="view_pharmacy_billing_voucher_DiscountAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->DiscountAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_billing_voucher->DiscountAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_billing_voucher->DiscountAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_billing_voucher->ApprovalNumber->Visible) { // ApprovalNumber ?>
	<?php if ($view_pharmacy_billing_voucher->sortUrl($view_pharmacy_billing_voucher->ApprovalNumber) == "") { ?>
		<th data-name="ApprovalNumber" class="<?php echo $view_pharmacy_billing_voucher->ApprovalNumber->headerCellClass() ?>"><div id="elh_view_pharmacy_billing_voucher_ApprovalNumber" class="view_pharmacy_billing_voucher_ApprovalNumber"><div class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->ApprovalNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ApprovalNumber" class="<?php echo $view_pharmacy_billing_voucher->ApprovalNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_billing_voucher->SortUrl($view_pharmacy_billing_voucher->ApprovalNumber) ?>',1);"><div id="elh_view_pharmacy_billing_voucher_ApprovalNumber" class="view_pharmacy_billing_voucher_ApprovalNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->ApprovalNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_billing_voucher->ApprovalNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_billing_voucher->ApprovalNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_billing_voucher->Cash->Visible) { // Cash ?>
	<?php if ($view_pharmacy_billing_voucher->sortUrl($view_pharmacy_billing_voucher->Cash) == "") { ?>
		<th data-name="Cash" class="<?php echo $view_pharmacy_billing_voucher->Cash->headerCellClass() ?>"><div id="elh_view_pharmacy_billing_voucher_Cash" class="view_pharmacy_billing_voucher_Cash"><div class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->Cash->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Cash" class="<?php echo $view_pharmacy_billing_voucher->Cash->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_billing_voucher->SortUrl($view_pharmacy_billing_voucher->Cash) ?>',1);"><div id="elh_view_pharmacy_billing_voucher_Cash" class="view_pharmacy_billing_voucher_Cash">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->Cash->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_billing_voucher->Cash->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_billing_voucher->Cash->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_billing_voucher->Card->Visible) { // Card ?>
	<?php if ($view_pharmacy_billing_voucher->sortUrl($view_pharmacy_billing_voucher->Card) == "") { ?>
		<th data-name="Card" class="<?php echo $view_pharmacy_billing_voucher->Card->headerCellClass() ?>"><div id="elh_view_pharmacy_billing_voucher_Card" class="view_pharmacy_billing_voucher_Card"><div class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->Card->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Card" class="<?php echo $view_pharmacy_billing_voucher->Card->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_billing_voucher->SortUrl($view_pharmacy_billing_voucher->Card) ?>',1);"><div id="elh_view_pharmacy_billing_voucher_Card" class="view_pharmacy_billing_voucher_Card">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->Card->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_billing_voucher->Card->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_billing_voucher->Card->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_billing_voucher->createddate->Visible) { // createddate ?>
	<?php if ($view_pharmacy_billing_voucher->sortUrl($view_pharmacy_billing_voucher->createddate) == "") { ?>
		<th data-name="createddate" class="<?php echo $view_pharmacy_billing_voucher->createddate->headerCellClass() ?>"><div id="elh_view_pharmacy_billing_voucher_createddate" class="view_pharmacy_billing_voucher_createddate"><div class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->createddate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddate" class="<?php echo $view_pharmacy_billing_voucher->createddate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_billing_voucher->SortUrl($view_pharmacy_billing_voucher->createddate) ?>',1);"><div id="elh_view_pharmacy_billing_voucher_createddate" class="view_pharmacy_billing_voucher_createddate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_billing_voucher->createddate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_billing_voucher->createddate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_billing_voucher->createddate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_pharmacy_billing_voucher_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_pharmacy_billing_voucher->ExportAll && $view_pharmacy_billing_voucher->isExport()) {
	$view_pharmacy_billing_voucher_list->StopRec = $view_pharmacy_billing_voucher_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_pharmacy_billing_voucher_list->TotalRecs > $view_pharmacy_billing_voucher_list->StartRec + $view_pharmacy_billing_voucher_list->DisplayRecs - 1)
		$view_pharmacy_billing_voucher_list->StopRec = $view_pharmacy_billing_voucher_list->StartRec + $view_pharmacy_billing_voucher_list->DisplayRecs - 1;
	else
		$view_pharmacy_billing_voucher_list->StopRec = $view_pharmacy_billing_voucher_list->TotalRecs;
}
$view_pharmacy_billing_voucher_list->RecCnt = $view_pharmacy_billing_voucher_list->StartRec - 1;
if ($view_pharmacy_billing_voucher_list->Recordset && !$view_pharmacy_billing_voucher_list->Recordset->EOF) {
	$view_pharmacy_billing_voucher_list->Recordset->moveFirst();
	$selectLimit = $view_pharmacy_billing_voucher_list->UseSelectLimit;
	if (!$selectLimit && $view_pharmacy_billing_voucher_list->StartRec > 1)
		$view_pharmacy_billing_voucher_list->Recordset->move($view_pharmacy_billing_voucher_list->StartRec - 1);
} elseif (!$view_pharmacy_billing_voucher->AllowAddDeleteRow && $view_pharmacy_billing_voucher_list->StopRec == 0) {
	$view_pharmacy_billing_voucher_list->StopRec = $view_pharmacy_billing_voucher->GridAddRowCount;
}

// Initialize aggregate
$view_pharmacy_billing_voucher->RowType = ROWTYPE_AGGREGATEINIT;
$view_pharmacy_billing_voucher->resetAttributes();
$view_pharmacy_billing_voucher_list->renderRow();
while ($view_pharmacy_billing_voucher_list->RecCnt < $view_pharmacy_billing_voucher_list->StopRec) {
	$view_pharmacy_billing_voucher_list->RecCnt++;
	if ($view_pharmacy_billing_voucher_list->RecCnt >= $view_pharmacy_billing_voucher_list->StartRec) {
		$view_pharmacy_billing_voucher_list->RowCnt++;

		// Set up key count
		$view_pharmacy_billing_voucher_list->KeyCount = $view_pharmacy_billing_voucher_list->RowIndex;

		// Init row class and style
		$view_pharmacy_billing_voucher->resetAttributes();
		$view_pharmacy_billing_voucher->CssClass = "";
		if ($view_pharmacy_billing_voucher->isGridAdd()) {
		} else {
			$view_pharmacy_billing_voucher_list->loadRowValues($view_pharmacy_billing_voucher_list->Recordset); // Load row values
		}
		$view_pharmacy_billing_voucher->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_pharmacy_billing_voucher->RowAttrs = array_merge($view_pharmacy_billing_voucher->RowAttrs, array('data-rowindex'=>$view_pharmacy_billing_voucher_list->RowCnt, 'id'=>'r' . $view_pharmacy_billing_voucher_list->RowCnt . '_view_pharmacy_billing_voucher', 'data-rowtype'=>$view_pharmacy_billing_voucher->RowType));

		// Render row
		$view_pharmacy_billing_voucher_list->renderRow();

		// Render list options
		$view_pharmacy_billing_voucher_list->renderListOptions();
?>
	<tr<?php echo $view_pharmacy_billing_voucher->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_pharmacy_billing_voucher_list->ListOptions->render("body", "left", $view_pharmacy_billing_voucher_list->RowCnt);
?>
	<?php if ($view_pharmacy_billing_voucher->id->Visible) { // id ?>
		<td data-name="id"<?php echo $view_pharmacy_billing_voucher->id->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_billing_voucher_list->RowCnt ?>_view_pharmacy_billing_voucher_id" class="view_pharmacy_billing_voucher_id">
<span<?php echo $view_pharmacy_billing_voucher->id->viewAttributes() ?>>
<?php echo $view_pharmacy_billing_voucher->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_billing_voucher->Reception->Visible) { // Reception ?>
		<td data-name="Reception"<?php echo $view_pharmacy_billing_voucher->Reception->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_billing_voucher_list->RowCnt ?>_view_pharmacy_billing_voucher_Reception" class="view_pharmacy_billing_voucher_Reception">
<span<?php echo $view_pharmacy_billing_voucher->Reception->viewAttributes() ?>>
<?php echo $view_pharmacy_billing_voucher->Reception->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_billing_voucher->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId"<?php echo $view_pharmacy_billing_voucher->PatientId->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_billing_voucher_list->RowCnt ?>_view_pharmacy_billing_voucher_PatientId" class="view_pharmacy_billing_voucher_PatientId">
<span<?php echo $view_pharmacy_billing_voucher->PatientId->viewAttributes() ?>>
<?php echo $view_pharmacy_billing_voucher->PatientId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_billing_voucher->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno"<?php echo $view_pharmacy_billing_voucher->mrnno->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_billing_voucher_list->RowCnt ?>_view_pharmacy_billing_voucher_mrnno" class="view_pharmacy_billing_voucher_mrnno">
<span<?php echo $view_pharmacy_billing_voucher->mrnno->viewAttributes() ?>>
<?php echo $view_pharmacy_billing_voucher->mrnno->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_billing_voucher->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $view_pharmacy_billing_voucher->PatientName->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_billing_voucher_list->RowCnt ?>_view_pharmacy_billing_voucher_PatientName" class="view_pharmacy_billing_voucher_PatientName">
<span<?php echo $view_pharmacy_billing_voucher->PatientName->viewAttributes() ?>>
<?php echo $view_pharmacy_billing_voucher->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_billing_voucher->Age->Visible) { // Age ?>
		<td data-name="Age"<?php echo $view_pharmacy_billing_voucher->Age->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_billing_voucher_list->RowCnt ?>_view_pharmacy_billing_voucher_Age" class="view_pharmacy_billing_voucher_Age">
<span<?php echo $view_pharmacy_billing_voucher->Age->viewAttributes() ?>>
<?php echo $view_pharmacy_billing_voucher->Age->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_billing_voucher->Gender->Visible) { // Gender ?>
		<td data-name="Gender"<?php echo $view_pharmacy_billing_voucher->Gender->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_billing_voucher_list->RowCnt ?>_view_pharmacy_billing_voucher_Gender" class="view_pharmacy_billing_voucher_Gender">
<span<?php echo $view_pharmacy_billing_voucher->Gender->viewAttributes() ?>>
<?php echo $view_pharmacy_billing_voucher->Gender->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_billing_voucher->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile"<?php echo $view_pharmacy_billing_voucher->Mobile->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_billing_voucher_list->RowCnt ?>_view_pharmacy_billing_voucher_Mobile" class="view_pharmacy_billing_voucher_Mobile">
<span<?php echo $view_pharmacy_billing_voucher->Mobile->viewAttributes() ?>>
<?php echo $view_pharmacy_billing_voucher->Mobile->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_billing_voucher->IP_OP->Visible) { // IP_OP ?>
		<td data-name="IP_OP"<?php echo $view_pharmacy_billing_voucher->IP_OP->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_billing_voucher_list->RowCnt ?>_view_pharmacy_billing_voucher_IP_OP" class="view_pharmacy_billing_voucher_IP_OP">
<span<?php echo $view_pharmacy_billing_voucher->IP_OP->viewAttributes() ?>>
<?php echo $view_pharmacy_billing_voucher->IP_OP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_billing_voucher->Doctor->Visible) { // Doctor ?>
		<td data-name="Doctor"<?php echo $view_pharmacy_billing_voucher->Doctor->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_billing_voucher_list->RowCnt ?>_view_pharmacy_billing_voucher_Doctor" class="view_pharmacy_billing_voucher_Doctor">
<span<?php echo $view_pharmacy_billing_voucher->Doctor->viewAttributes() ?>>
<?php echo $view_pharmacy_billing_voucher->Doctor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_billing_voucher->voucher_type->Visible) { // voucher_type ?>
		<td data-name="voucher_type"<?php echo $view_pharmacy_billing_voucher->voucher_type->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_billing_voucher_list->RowCnt ?>_view_pharmacy_billing_voucher_voucher_type" class="view_pharmacy_billing_voucher_voucher_type">
<span<?php echo $view_pharmacy_billing_voucher->voucher_type->viewAttributes() ?>>
<?php echo $view_pharmacy_billing_voucher->voucher_type->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_billing_voucher->Details->Visible) { // Details ?>
		<td data-name="Details"<?php echo $view_pharmacy_billing_voucher->Details->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_billing_voucher_list->RowCnt ?>_view_pharmacy_billing_voucher_Details" class="view_pharmacy_billing_voucher_Details">
<span<?php echo $view_pharmacy_billing_voucher->Details->viewAttributes() ?>>
<?php echo $view_pharmacy_billing_voucher->Details->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_billing_voucher->ModeofPayment->Visible) { // ModeofPayment ?>
		<td data-name="ModeofPayment"<?php echo $view_pharmacy_billing_voucher->ModeofPayment->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_billing_voucher_list->RowCnt ?>_view_pharmacy_billing_voucher_ModeofPayment" class="view_pharmacy_billing_voucher_ModeofPayment">
<span<?php echo $view_pharmacy_billing_voucher->ModeofPayment->viewAttributes() ?>>
<?php echo $view_pharmacy_billing_voucher->ModeofPayment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_billing_voucher->Amount->Visible) { // Amount ?>
		<td data-name="Amount"<?php echo $view_pharmacy_billing_voucher->Amount->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_billing_voucher_list->RowCnt ?>_view_pharmacy_billing_voucher_Amount" class="view_pharmacy_billing_voucher_Amount">
<span<?php echo $view_pharmacy_billing_voucher->Amount->viewAttributes() ?>>
<?php echo $view_pharmacy_billing_voucher->Amount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_billing_voucher->AnyDues->Visible) { // AnyDues ?>
		<td data-name="AnyDues"<?php echo $view_pharmacy_billing_voucher->AnyDues->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_billing_voucher_list->RowCnt ?>_view_pharmacy_billing_voucher_AnyDues" class="view_pharmacy_billing_voucher_AnyDues">
<span<?php echo $view_pharmacy_billing_voucher->AnyDues->viewAttributes() ?>>
<?php echo $view_pharmacy_billing_voucher->AnyDues->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_billing_voucher->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $view_pharmacy_billing_voucher->createdby->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_billing_voucher_list->RowCnt ?>_view_pharmacy_billing_voucher_createdby" class="view_pharmacy_billing_voucher_createdby">
<span<?php echo $view_pharmacy_billing_voucher->createdby->viewAttributes() ?>>
<?php echo $view_pharmacy_billing_voucher->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_billing_voucher->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $view_pharmacy_billing_voucher->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_billing_voucher_list->RowCnt ?>_view_pharmacy_billing_voucher_createddatetime" class="view_pharmacy_billing_voucher_createddatetime">
<span<?php echo $view_pharmacy_billing_voucher->createddatetime->viewAttributes() ?>>
<?php echo $view_pharmacy_billing_voucher->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_billing_voucher->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $view_pharmacy_billing_voucher->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_billing_voucher_list->RowCnt ?>_view_pharmacy_billing_voucher_modifiedby" class="view_pharmacy_billing_voucher_modifiedby">
<span<?php echo $view_pharmacy_billing_voucher->modifiedby->viewAttributes() ?>>
<?php echo $view_pharmacy_billing_voucher->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_billing_voucher->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $view_pharmacy_billing_voucher->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_billing_voucher_list->RowCnt ?>_view_pharmacy_billing_voucher_modifieddatetime" class="view_pharmacy_billing_voucher_modifieddatetime">
<span<?php echo $view_pharmacy_billing_voucher->modifieddatetime->viewAttributes() ?>>
<?php echo $view_pharmacy_billing_voucher->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_billing_voucher->RealizationAmount->Visible) { // RealizationAmount ?>
		<td data-name="RealizationAmount"<?php echo $view_pharmacy_billing_voucher->RealizationAmount->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_billing_voucher_list->RowCnt ?>_view_pharmacy_billing_voucher_RealizationAmount" class="view_pharmacy_billing_voucher_RealizationAmount">
<span<?php echo $view_pharmacy_billing_voucher->RealizationAmount->viewAttributes() ?>>
<?php echo $view_pharmacy_billing_voucher->RealizationAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_billing_voucher->RealizationStatus->Visible) { // RealizationStatus ?>
		<td data-name="RealizationStatus"<?php echo $view_pharmacy_billing_voucher->RealizationStatus->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_billing_voucher_list->RowCnt ?>_view_pharmacy_billing_voucher_RealizationStatus" class="view_pharmacy_billing_voucher_RealizationStatus">
<span<?php echo $view_pharmacy_billing_voucher->RealizationStatus->viewAttributes() ?>>
<?php echo $view_pharmacy_billing_voucher->RealizationStatus->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_billing_voucher->RealizationRemarks->Visible) { // RealizationRemarks ?>
		<td data-name="RealizationRemarks"<?php echo $view_pharmacy_billing_voucher->RealizationRemarks->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_billing_voucher_list->RowCnt ?>_view_pharmacy_billing_voucher_RealizationRemarks" class="view_pharmacy_billing_voucher_RealizationRemarks">
<span<?php echo $view_pharmacy_billing_voucher->RealizationRemarks->viewAttributes() ?>>
<?php echo $view_pharmacy_billing_voucher->RealizationRemarks->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_billing_voucher->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
		<td data-name="RealizationBatchNo"<?php echo $view_pharmacy_billing_voucher->RealizationBatchNo->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_billing_voucher_list->RowCnt ?>_view_pharmacy_billing_voucher_RealizationBatchNo" class="view_pharmacy_billing_voucher_RealizationBatchNo">
<span<?php echo $view_pharmacy_billing_voucher->RealizationBatchNo->viewAttributes() ?>>
<?php echo $view_pharmacy_billing_voucher->RealizationBatchNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_billing_voucher->RealizationDate->Visible) { // RealizationDate ?>
		<td data-name="RealizationDate"<?php echo $view_pharmacy_billing_voucher->RealizationDate->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_billing_voucher_list->RowCnt ?>_view_pharmacy_billing_voucher_RealizationDate" class="view_pharmacy_billing_voucher_RealizationDate">
<span<?php echo $view_pharmacy_billing_voucher->RealizationDate->viewAttributes() ?>>
<?php echo $view_pharmacy_billing_voucher->RealizationDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_billing_voucher->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_pharmacy_billing_voucher->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_billing_voucher_list->RowCnt ?>_view_pharmacy_billing_voucher_HospID" class="view_pharmacy_billing_voucher_HospID">
<span<?php echo $view_pharmacy_billing_voucher->HospID->viewAttributes() ?>>
<?php echo $view_pharmacy_billing_voucher->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_billing_voucher->RIDNO->Visible) { // RIDNO ?>
		<td data-name="RIDNO"<?php echo $view_pharmacy_billing_voucher->RIDNO->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_billing_voucher_list->RowCnt ?>_view_pharmacy_billing_voucher_RIDNO" class="view_pharmacy_billing_voucher_RIDNO">
<span<?php echo $view_pharmacy_billing_voucher->RIDNO->viewAttributes() ?>>
<?php echo $view_pharmacy_billing_voucher->RIDNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_billing_voucher->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo"<?php echo $view_pharmacy_billing_voucher->TidNo->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_billing_voucher_list->RowCnt ?>_view_pharmacy_billing_voucher_TidNo" class="view_pharmacy_billing_voucher_TidNo">
<span<?php echo $view_pharmacy_billing_voucher->TidNo->viewAttributes() ?>>
<?php echo $view_pharmacy_billing_voucher->TidNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_billing_voucher->CId->Visible) { // CId ?>
		<td data-name="CId"<?php echo $view_pharmacy_billing_voucher->CId->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_billing_voucher_list->RowCnt ?>_view_pharmacy_billing_voucher_CId" class="view_pharmacy_billing_voucher_CId">
<span<?php echo $view_pharmacy_billing_voucher->CId->viewAttributes() ?>>
<?php echo $view_pharmacy_billing_voucher->CId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_billing_voucher->PartnerName->Visible) { // PartnerName ?>
		<td data-name="PartnerName"<?php echo $view_pharmacy_billing_voucher->PartnerName->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_billing_voucher_list->RowCnt ?>_view_pharmacy_billing_voucher_PartnerName" class="view_pharmacy_billing_voucher_PartnerName">
<span<?php echo $view_pharmacy_billing_voucher->PartnerName->viewAttributes() ?>>
<?php echo $view_pharmacy_billing_voucher->PartnerName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_billing_voucher->PayerType->Visible) { // PayerType ?>
		<td data-name="PayerType"<?php echo $view_pharmacy_billing_voucher->PayerType->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_billing_voucher_list->RowCnt ?>_view_pharmacy_billing_voucher_PayerType" class="view_pharmacy_billing_voucher_PayerType">
<span<?php echo $view_pharmacy_billing_voucher->PayerType->viewAttributes() ?>>
<?php echo $view_pharmacy_billing_voucher->PayerType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_billing_voucher->Dob->Visible) { // Dob ?>
		<td data-name="Dob"<?php echo $view_pharmacy_billing_voucher->Dob->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_billing_voucher_list->RowCnt ?>_view_pharmacy_billing_voucher_Dob" class="view_pharmacy_billing_voucher_Dob">
<span<?php echo $view_pharmacy_billing_voucher->Dob->viewAttributes() ?>>
<?php echo $view_pharmacy_billing_voucher->Dob->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_billing_voucher->Currency->Visible) { // Currency ?>
		<td data-name="Currency"<?php echo $view_pharmacy_billing_voucher->Currency->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_billing_voucher_list->RowCnt ?>_view_pharmacy_billing_voucher_Currency" class="view_pharmacy_billing_voucher_Currency">
<span<?php echo $view_pharmacy_billing_voucher->Currency->viewAttributes() ?>>
<?php echo $view_pharmacy_billing_voucher->Currency->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_billing_voucher->DiscountRemarks->Visible) { // DiscountRemarks ?>
		<td data-name="DiscountRemarks"<?php echo $view_pharmacy_billing_voucher->DiscountRemarks->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_billing_voucher_list->RowCnt ?>_view_pharmacy_billing_voucher_DiscountRemarks" class="view_pharmacy_billing_voucher_DiscountRemarks">
<span<?php echo $view_pharmacy_billing_voucher->DiscountRemarks->viewAttributes() ?>>
<?php echo $view_pharmacy_billing_voucher->DiscountRemarks->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_billing_voucher->Remarks->Visible) { // Remarks ?>
		<td data-name="Remarks"<?php echo $view_pharmacy_billing_voucher->Remarks->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_billing_voucher_list->RowCnt ?>_view_pharmacy_billing_voucher_Remarks" class="view_pharmacy_billing_voucher_Remarks">
<span<?php echo $view_pharmacy_billing_voucher->Remarks->viewAttributes() ?>>
<?php echo $view_pharmacy_billing_voucher->Remarks->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_billing_voucher->PatId->Visible) { // PatId ?>
		<td data-name="PatId"<?php echo $view_pharmacy_billing_voucher->PatId->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_billing_voucher_list->RowCnt ?>_view_pharmacy_billing_voucher_PatId" class="view_pharmacy_billing_voucher_PatId">
<span<?php echo $view_pharmacy_billing_voucher->PatId->viewAttributes() ?>>
<?php echo $view_pharmacy_billing_voucher->PatId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_billing_voucher->DrDepartment->Visible) { // DrDepartment ?>
		<td data-name="DrDepartment"<?php echo $view_pharmacy_billing_voucher->DrDepartment->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_billing_voucher_list->RowCnt ?>_view_pharmacy_billing_voucher_DrDepartment" class="view_pharmacy_billing_voucher_DrDepartment">
<span<?php echo $view_pharmacy_billing_voucher->DrDepartment->viewAttributes() ?>>
<?php echo $view_pharmacy_billing_voucher->DrDepartment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_billing_voucher->RefferedBy->Visible) { // RefferedBy ?>
		<td data-name="RefferedBy"<?php echo $view_pharmacy_billing_voucher->RefferedBy->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_billing_voucher_list->RowCnt ?>_view_pharmacy_billing_voucher_RefferedBy" class="view_pharmacy_billing_voucher_RefferedBy">
<span<?php echo $view_pharmacy_billing_voucher->RefferedBy->viewAttributes() ?>>
<?php echo $view_pharmacy_billing_voucher->RefferedBy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_billing_voucher->BillNumber->Visible) { // BillNumber ?>
		<td data-name="BillNumber"<?php echo $view_pharmacy_billing_voucher->BillNumber->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_billing_voucher_list->RowCnt ?>_view_pharmacy_billing_voucher_BillNumber" class="view_pharmacy_billing_voucher_BillNumber">
<span<?php echo $view_pharmacy_billing_voucher->BillNumber->viewAttributes() ?>>
<?php echo $view_pharmacy_billing_voucher->BillNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_billing_voucher->CardNumber->Visible) { // CardNumber ?>
		<td data-name="CardNumber"<?php echo $view_pharmacy_billing_voucher->CardNumber->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_billing_voucher_list->RowCnt ?>_view_pharmacy_billing_voucher_CardNumber" class="view_pharmacy_billing_voucher_CardNumber">
<span<?php echo $view_pharmacy_billing_voucher->CardNumber->viewAttributes() ?>>
<?php echo $view_pharmacy_billing_voucher->CardNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_billing_voucher->BankName->Visible) { // BankName ?>
		<td data-name="BankName"<?php echo $view_pharmacy_billing_voucher->BankName->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_billing_voucher_list->RowCnt ?>_view_pharmacy_billing_voucher_BankName" class="view_pharmacy_billing_voucher_BankName">
<span<?php echo $view_pharmacy_billing_voucher->BankName->viewAttributes() ?>>
<?php echo $view_pharmacy_billing_voucher->BankName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_billing_voucher->DrID->Visible) { // DrID ?>
		<td data-name="DrID"<?php echo $view_pharmacy_billing_voucher->DrID->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_billing_voucher_list->RowCnt ?>_view_pharmacy_billing_voucher_DrID" class="view_pharmacy_billing_voucher_DrID">
<span<?php echo $view_pharmacy_billing_voucher->DrID->viewAttributes() ?>>
<?php echo $view_pharmacy_billing_voucher->DrID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_billing_voucher->BillStatus->Visible) { // BillStatus ?>
		<td data-name="BillStatus"<?php echo $view_pharmacy_billing_voucher->BillStatus->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_billing_voucher_list->RowCnt ?>_view_pharmacy_billing_voucher_BillStatus" class="view_pharmacy_billing_voucher_BillStatus">
<span<?php echo $view_pharmacy_billing_voucher->BillStatus->viewAttributes() ?>>
<?php echo $view_pharmacy_billing_voucher->BillStatus->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_billing_voucher->ReportHeader->Visible) { // ReportHeader ?>
		<td data-name="ReportHeader"<?php echo $view_pharmacy_billing_voucher->ReportHeader->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_billing_voucher_list->RowCnt ?>_view_pharmacy_billing_voucher_ReportHeader" class="view_pharmacy_billing_voucher_ReportHeader">
<span<?php echo $view_pharmacy_billing_voucher->ReportHeader->viewAttributes() ?>>
<?php echo $view_pharmacy_billing_voucher->ReportHeader->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_billing_voucher->PharID->Visible) { // PharID ?>
		<td data-name="PharID"<?php echo $view_pharmacy_billing_voucher->PharID->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_billing_voucher_list->RowCnt ?>_view_pharmacy_billing_voucher_PharID" class="view_pharmacy_billing_voucher_PharID">
<span<?php echo $view_pharmacy_billing_voucher->PharID->viewAttributes() ?>>
<?php echo $view_pharmacy_billing_voucher->PharID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_billing_voucher->UserName->Visible) { // UserName ?>
		<td data-name="UserName"<?php echo $view_pharmacy_billing_voucher->UserName->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_billing_voucher_list->RowCnt ?>_view_pharmacy_billing_voucher_UserName" class="view_pharmacy_billing_voucher_UserName">
<span<?php echo $view_pharmacy_billing_voucher->UserName->viewAttributes() ?>>
<?php echo $view_pharmacy_billing_voucher->UserName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_billing_voucher->CardType->Visible) { // CardType ?>
		<td data-name="CardType"<?php echo $view_pharmacy_billing_voucher->CardType->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_billing_voucher_list->RowCnt ?>_view_pharmacy_billing_voucher_CardType" class="view_pharmacy_billing_voucher_CardType">
<span<?php echo $view_pharmacy_billing_voucher->CardType->viewAttributes() ?>>
<?php echo $view_pharmacy_billing_voucher->CardType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_billing_voucher->DiscountAmount->Visible) { // DiscountAmount ?>
		<td data-name="DiscountAmount"<?php echo $view_pharmacy_billing_voucher->DiscountAmount->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_billing_voucher_list->RowCnt ?>_view_pharmacy_billing_voucher_DiscountAmount" class="view_pharmacy_billing_voucher_DiscountAmount">
<span<?php echo $view_pharmacy_billing_voucher->DiscountAmount->viewAttributes() ?>>
<?php echo $view_pharmacy_billing_voucher->DiscountAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_billing_voucher->ApprovalNumber->Visible) { // ApprovalNumber ?>
		<td data-name="ApprovalNumber"<?php echo $view_pharmacy_billing_voucher->ApprovalNumber->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_billing_voucher_list->RowCnt ?>_view_pharmacy_billing_voucher_ApprovalNumber" class="view_pharmacy_billing_voucher_ApprovalNumber">
<span<?php echo $view_pharmacy_billing_voucher->ApprovalNumber->viewAttributes() ?>>
<?php echo $view_pharmacy_billing_voucher->ApprovalNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_billing_voucher->Cash->Visible) { // Cash ?>
		<td data-name="Cash"<?php echo $view_pharmacy_billing_voucher->Cash->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_billing_voucher_list->RowCnt ?>_view_pharmacy_billing_voucher_Cash" class="view_pharmacy_billing_voucher_Cash">
<span<?php echo $view_pharmacy_billing_voucher->Cash->viewAttributes() ?>>
<?php echo $view_pharmacy_billing_voucher->Cash->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_billing_voucher->Card->Visible) { // Card ?>
		<td data-name="Card"<?php echo $view_pharmacy_billing_voucher->Card->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_billing_voucher_list->RowCnt ?>_view_pharmacy_billing_voucher_Card" class="view_pharmacy_billing_voucher_Card">
<span<?php echo $view_pharmacy_billing_voucher->Card->viewAttributes() ?>>
<?php echo $view_pharmacy_billing_voucher->Card->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_billing_voucher->createddate->Visible) { // createddate ?>
		<td data-name="createddate"<?php echo $view_pharmacy_billing_voucher->createddate->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_billing_voucher_list->RowCnt ?>_view_pharmacy_billing_voucher_createddate" class="view_pharmacy_billing_voucher_createddate">
<span<?php echo $view_pharmacy_billing_voucher->createddate->viewAttributes() ?>>
<?php echo $view_pharmacy_billing_voucher->createddate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_pharmacy_billing_voucher_list->ListOptions->render("body", "right", $view_pharmacy_billing_voucher_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_pharmacy_billing_voucher->isGridAdd())
		$view_pharmacy_billing_voucher_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_pharmacy_billing_voucher->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_pharmacy_billing_voucher_list->Recordset)
	$view_pharmacy_billing_voucher_list->Recordset->Close();
?>
<?php if (!$view_pharmacy_billing_voucher->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_pharmacy_billing_voucher->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_pharmacy_billing_voucher_list->Pager)) $view_pharmacy_billing_voucher_list->Pager = new NumericPager($view_pharmacy_billing_voucher_list->StartRec, $view_pharmacy_billing_voucher_list->DisplayRecs, $view_pharmacy_billing_voucher_list->TotalRecs, $view_pharmacy_billing_voucher_list->RecRange, $view_pharmacy_billing_voucher_list->AutoHidePager) ?>
<?php if ($view_pharmacy_billing_voucher_list->Pager->RecordCount > 0 && $view_pharmacy_billing_voucher_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_pharmacy_billing_voucher_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_billing_voucher_list->pageUrl() ?>start=<?php echo $view_pharmacy_billing_voucher_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_billing_voucher_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_billing_voucher_list->pageUrl() ?>start=<?php echo $view_pharmacy_billing_voucher_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_pharmacy_billing_voucher_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_pharmacy_billing_voucher_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_billing_voucher_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_billing_voucher_list->pageUrl() ?>start=<?php echo $view_pharmacy_billing_voucher_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_billing_voucher_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_billing_voucher_list->pageUrl() ?>start=<?php echo $view_pharmacy_billing_voucher_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_pharmacy_billing_voucher_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_pharmacy_billing_voucher_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_pharmacy_billing_voucher_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_pharmacy_billing_voucher_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_pharmacy_billing_voucher_list->TotalRecs > 0 && (!$view_pharmacy_billing_voucher_list->AutoHidePageSizeSelector || $view_pharmacy_billing_voucher_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_pharmacy_billing_voucher">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_pharmacy_billing_voucher_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_pharmacy_billing_voucher_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_pharmacy_billing_voucher_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_pharmacy_billing_voucher_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_pharmacy_billing_voucher_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_pharmacy_billing_voucher_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_pharmacy_billing_voucher->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_billing_voucher_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_pharmacy_billing_voucher_list->TotalRecs == 0 && !$view_pharmacy_billing_voucher->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_billing_voucher_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_pharmacy_billing_voucher_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_pharmacy_billing_voucher->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_pharmacy_billing_voucher->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_pharmacy_billing_voucher", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_pharmacy_billing_voucher_list->terminate();
?>