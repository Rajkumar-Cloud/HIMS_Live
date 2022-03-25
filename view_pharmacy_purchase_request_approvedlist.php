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
$view_pharmacy_purchase_request_approved_list = new view_pharmacy_purchase_request_approved_list();

// Run the page
$view_pharmacy_purchase_request_approved_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacy_purchase_request_approved_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_pharmacy_purchase_request_approved->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_pharmacy_purchase_request_approvedlist = currentForm = new ew.Form("fview_pharmacy_purchase_request_approvedlist", "list");
fview_pharmacy_purchase_request_approvedlist.formKeyCountName = '<?php echo $view_pharmacy_purchase_request_approved_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_pharmacy_purchase_request_approvedlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_pharmacy_purchase_request_approvedlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_pharmacy_purchase_request_approvedlist.lists["x_ApprovedStatus"] = <?php echo $view_pharmacy_purchase_request_approved_list->ApprovedStatus->Lookup->toClientList() ?>;
fview_pharmacy_purchase_request_approvedlist.lists["x_ApprovedStatus"].options = <?php echo JsonEncode($view_pharmacy_purchase_request_approved_list->ApprovedStatus->options(FALSE, TRUE)) ?>;

// Form object for search
var fview_pharmacy_purchase_request_approvedlistsrch = currentSearchForm = new ew.Form("fview_pharmacy_purchase_request_approvedlistsrch");

// Filters
fview_pharmacy_purchase_request_approvedlistsrch.filterList = <?php echo $view_pharmacy_purchase_request_approved_list->getFilterList() ?>;
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
<?php if (!$view_pharmacy_purchase_request_approved->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_pharmacy_purchase_request_approved_list->TotalRecs > 0 && $view_pharmacy_purchase_request_approved_list->ExportOptions->visible()) { ?>
<?php $view_pharmacy_purchase_request_approved_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved_list->ImportOptions->visible()) { ?>
<?php $view_pharmacy_purchase_request_approved_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved_list->SearchOptions->visible()) { ?>
<?php $view_pharmacy_purchase_request_approved_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved_list->FilterOptions->visible()) { ?>
<?php $view_pharmacy_purchase_request_approved_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_pharmacy_purchase_request_approved_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_pharmacy_purchase_request_approved->isExport() && !$view_pharmacy_purchase_request_approved->CurrentAction) { ?>
<form name="fview_pharmacy_purchase_request_approvedlistsrch" id="fview_pharmacy_purchase_request_approvedlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_pharmacy_purchase_request_approved_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_pharmacy_purchase_request_approvedlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_pharmacy_purchase_request_approved">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_approved_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_approved_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_pharmacy_purchase_request_approved_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_pharmacy_purchase_request_approved_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_purchase_request_approved_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_purchase_request_approved_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_purchase_request_approved_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_pharmacy_purchase_request_approved_list->showPageHeader(); ?>
<?php
$view_pharmacy_purchase_request_approved_list->showMessage();
?>
<?php if ($view_pharmacy_purchase_request_approved_list->TotalRecs > 0 || $view_pharmacy_purchase_request_approved->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_pharmacy_purchase_request_approved_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_pharmacy_purchase_request_approved">
<?php if (!$view_pharmacy_purchase_request_approved->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_pharmacy_purchase_request_approved->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_pharmacy_purchase_request_approved_list->Pager)) $view_pharmacy_purchase_request_approved_list->Pager = new NumericPager($view_pharmacy_purchase_request_approved_list->StartRec, $view_pharmacy_purchase_request_approved_list->DisplayRecs, $view_pharmacy_purchase_request_approved_list->TotalRecs, $view_pharmacy_purchase_request_approved_list->RecRange, $view_pharmacy_purchase_request_approved_list->AutoHidePager) ?>
<?php if ($view_pharmacy_purchase_request_approved_list->Pager->RecordCount > 0 && $view_pharmacy_purchase_request_approved_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_pharmacy_purchase_request_approved_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_purchase_request_approved_list->pageUrl() ?>start=<?php echo $view_pharmacy_purchase_request_approved_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_approved_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_purchase_request_approved_list->pageUrl() ?>start=<?php echo $view_pharmacy_purchase_request_approved_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_pharmacy_purchase_request_approved_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_pharmacy_purchase_request_approved_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_approved_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_purchase_request_approved_list->pageUrl() ?>start=<?php echo $view_pharmacy_purchase_request_approved_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_approved_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_purchase_request_approved_list->pageUrl() ?>start=<?php echo $view_pharmacy_purchase_request_approved_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_pharmacy_purchase_request_approved_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_pharmacy_purchase_request_approved_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_pharmacy_purchase_request_approved_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved_list->TotalRecs > 0 && (!$view_pharmacy_purchase_request_approved_list->AutoHidePageSizeSelector || $view_pharmacy_purchase_request_approved_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_pharmacy_purchase_request_approved">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_pharmacy_purchase_request_approved_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_pharmacy_purchase_request_approved_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_pharmacy_purchase_request_approved_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_pharmacy_purchase_request_approved_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_pharmacy_purchase_request_approved_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_pharmacy_purchase_request_approved_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_pharmacy_purchase_request_approved->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_purchase_request_approved_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_pharmacy_purchase_request_approvedlist" id="fview_pharmacy_purchase_request_approvedlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_pharmacy_purchase_request_approved_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_pharmacy_purchase_request_approved_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_purchase_request_approved">
<div id="gmp_view_pharmacy_purchase_request_approved" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_pharmacy_purchase_request_approved_list->TotalRecs > 0 || $view_pharmacy_purchase_request_approved->isGridEdit()) { ?>
<table id="tbl_view_pharmacy_purchase_request_approvedlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_pharmacy_purchase_request_approved_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_pharmacy_purchase_request_approved_list->renderListOptions();

// Render list options (header, left)
$view_pharmacy_purchase_request_approved_list->ListOptions->render("header", "left");
?>
<?php if ($view_pharmacy_purchase_request_approved->id->Visible) { // id ?>
	<?php if ($view_pharmacy_purchase_request_approved->sortUrl($view_pharmacy_purchase_request_approved->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_pharmacy_purchase_request_approved->id->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_approved_id" class="view_pharmacy_purchase_request_approved_id"><div class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_approved->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_pharmacy_purchase_request_approved->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_purchase_request_approved->SortUrl($view_pharmacy_purchase_request_approved->id) ?>',1);"><div id="elh_view_pharmacy_purchase_request_approved_id" class="view_pharmacy_purchase_request_approved_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_approved->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_approved->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_purchase_request_approved->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved->DT->Visible) { // DT ?>
	<?php if ($view_pharmacy_purchase_request_approved->sortUrl($view_pharmacy_purchase_request_approved->DT) == "") { ?>
		<th data-name="DT" class="<?php echo $view_pharmacy_purchase_request_approved->DT->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_approved_DT" class="view_pharmacy_purchase_request_approved_DT"><div class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_approved->DT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DT" class="<?php echo $view_pharmacy_purchase_request_approved->DT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_purchase_request_approved->SortUrl($view_pharmacy_purchase_request_approved->DT) ?>',1);"><div id="elh_view_pharmacy_purchase_request_approved_DT" class="view_pharmacy_purchase_request_approved_DT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_approved->DT->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_approved->DT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_purchase_request_approved->DT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved->EmployeeName->Visible) { // EmployeeName ?>
	<?php if ($view_pharmacy_purchase_request_approved->sortUrl($view_pharmacy_purchase_request_approved->EmployeeName) == "") { ?>
		<th data-name="EmployeeName" class="<?php echo $view_pharmacy_purchase_request_approved->EmployeeName->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_approved_EmployeeName" class="view_pharmacy_purchase_request_approved_EmployeeName"><div class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_approved->EmployeeName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EmployeeName" class="<?php echo $view_pharmacy_purchase_request_approved->EmployeeName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_purchase_request_approved->SortUrl($view_pharmacy_purchase_request_approved->EmployeeName) ?>',1);"><div id="elh_view_pharmacy_purchase_request_approved_EmployeeName" class="view_pharmacy_purchase_request_approved_EmployeeName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_approved->EmployeeName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_approved->EmployeeName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_purchase_request_approved->EmployeeName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved->Department->Visible) { // Department ?>
	<?php if ($view_pharmacy_purchase_request_approved->sortUrl($view_pharmacy_purchase_request_approved->Department) == "") { ?>
		<th data-name="Department" class="<?php echo $view_pharmacy_purchase_request_approved->Department->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_approved_Department" class="view_pharmacy_purchase_request_approved_Department"><div class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_approved->Department->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Department" class="<?php echo $view_pharmacy_purchase_request_approved->Department->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_purchase_request_approved->SortUrl($view_pharmacy_purchase_request_approved->Department) ?>',1);"><div id="elh_view_pharmacy_purchase_request_approved_Department" class="view_pharmacy_purchase_request_approved_Department">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_approved->Department->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_approved->Department->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_purchase_request_approved->Department->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved->ApprovedStatus->Visible) { // ApprovedStatus ?>
	<?php if ($view_pharmacy_purchase_request_approved->sortUrl($view_pharmacy_purchase_request_approved->ApprovedStatus) == "") { ?>
		<th data-name="ApprovedStatus" class="<?php echo $view_pharmacy_purchase_request_approved->ApprovedStatus->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_approved_ApprovedStatus" class="view_pharmacy_purchase_request_approved_ApprovedStatus"><div class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_approved->ApprovedStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ApprovedStatus" class="<?php echo $view_pharmacy_purchase_request_approved->ApprovedStatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_purchase_request_approved->SortUrl($view_pharmacy_purchase_request_approved->ApprovedStatus) ?>',1);"><div id="elh_view_pharmacy_purchase_request_approved_ApprovedStatus" class="view_pharmacy_purchase_request_approved_ApprovedStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_approved->ApprovedStatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_approved->ApprovedStatus->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_purchase_request_approved->ApprovedStatus->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved->PurchaseStatus->Visible) { // PurchaseStatus ?>
	<?php if ($view_pharmacy_purchase_request_approved->sortUrl($view_pharmacy_purchase_request_approved->PurchaseStatus) == "") { ?>
		<th data-name="PurchaseStatus" class="<?php echo $view_pharmacy_purchase_request_approved->PurchaseStatus->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_approved_PurchaseStatus" class="view_pharmacy_purchase_request_approved_PurchaseStatus"><div class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_approved->PurchaseStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PurchaseStatus" class="<?php echo $view_pharmacy_purchase_request_approved->PurchaseStatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_purchase_request_approved->SortUrl($view_pharmacy_purchase_request_approved->PurchaseStatus) ?>',1);"><div id="elh_view_pharmacy_purchase_request_approved_PurchaseStatus" class="view_pharmacy_purchase_request_approved_PurchaseStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_approved->PurchaseStatus->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_approved->PurchaseStatus->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_purchase_request_approved->PurchaseStatus->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved->HospID->Visible) { // HospID ?>
	<?php if ($view_pharmacy_purchase_request_approved->sortUrl($view_pharmacy_purchase_request_approved->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_pharmacy_purchase_request_approved->HospID->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_approved_HospID" class="view_pharmacy_purchase_request_approved_HospID"><div class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_approved->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_pharmacy_purchase_request_approved->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_purchase_request_approved->SortUrl($view_pharmacy_purchase_request_approved->HospID) ?>',1);"><div id="elh_view_pharmacy_purchase_request_approved_HospID" class="view_pharmacy_purchase_request_approved_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_approved->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_approved->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_purchase_request_approved->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved->createdby->Visible) { // createdby ?>
	<?php if ($view_pharmacy_purchase_request_approved->sortUrl($view_pharmacy_purchase_request_approved->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $view_pharmacy_purchase_request_approved->createdby->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_approved_createdby" class="view_pharmacy_purchase_request_approved_createdby"><div class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_approved->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $view_pharmacy_purchase_request_approved->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_purchase_request_approved->SortUrl($view_pharmacy_purchase_request_approved->createdby) ?>',1);"><div id="elh_view_pharmacy_purchase_request_approved_createdby" class="view_pharmacy_purchase_request_approved_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_approved->createdby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_approved->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_purchase_request_approved->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_pharmacy_purchase_request_approved->sortUrl($view_pharmacy_purchase_request_approved->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_pharmacy_purchase_request_approved->createddatetime->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_approved_createddatetime" class="view_pharmacy_purchase_request_approved_createddatetime"><div class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_approved->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_pharmacy_purchase_request_approved->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_purchase_request_approved->SortUrl($view_pharmacy_purchase_request_approved->createddatetime) ?>',1);"><div id="elh_view_pharmacy_purchase_request_approved_createddatetime" class="view_pharmacy_purchase_request_approved_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_approved->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_approved->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_purchase_request_approved->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved->modifiedby->Visible) { // modifiedby ?>
	<?php if ($view_pharmacy_purchase_request_approved->sortUrl($view_pharmacy_purchase_request_approved->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $view_pharmacy_purchase_request_approved->modifiedby->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_approved_modifiedby" class="view_pharmacy_purchase_request_approved_modifiedby"><div class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_approved->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $view_pharmacy_purchase_request_approved->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_purchase_request_approved->SortUrl($view_pharmacy_purchase_request_approved->modifiedby) ?>',1);"><div id="elh_view_pharmacy_purchase_request_approved_modifiedby" class="view_pharmacy_purchase_request_approved_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_approved->modifiedby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_approved->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_purchase_request_approved->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($view_pharmacy_purchase_request_approved->sortUrl($view_pharmacy_purchase_request_approved->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_pharmacy_purchase_request_approved->modifieddatetime->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_approved_modifieddatetime" class="view_pharmacy_purchase_request_approved_modifieddatetime"><div class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_approved->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_pharmacy_purchase_request_approved->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_purchase_request_approved->SortUrl($view_pharmacy_purchase_request_approved->modifieddatetime) ?>',1);"><div id="elh_view_pharmacy_purchase_request_approved_modifieddatetime" class="view_pharmacy_purchase_request_approved_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_approved->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_approved->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_purchase_request_approved->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved->BRCODE->Visible) { // BRCODE ?>
	<?php if ($view_pharmacy_purchase_request_approved->sortUrl($view_pharmacy_purchase_request_approved->BRCODE) == "") { ?>
		<th data-name="BRCODE" class="<?php echo $view_pharmacy_purchase_request_approved->BRCODE->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_approved_BRCODE" class="view_pharmacy_purchase_request_approved_BRCODE"><div class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_approved->BRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BRCODE" class="<?php echo $view_pharmacy_purchase_request_approved->BRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_purchase_request_approved->SortUrl($view_pharmacy_purchase_request_approved->BRCODE) ?>',1);"><div id="elh_view_pharmacy_purchase_request_approved_BRCODE" class="view_pharmacy_purchase_request_approved_BRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_approved->BRCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_approved->BRCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_purchase_request_approved->BRCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_pharmacy_purchase_request_approved_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_pharmacy_purchase_request_approved->ExportAll && $view_pharmacy_purchase_request_approved->isExport()) {
	$view_pharmacy_purchase_request_approved_list->StopRec = $view_pharmacy_purchase_request_approved_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_pharmacy_purchase_request_approved_list->TotalRecs > $view_pharmacy_purchase_request_approved_list->StartRec + $view_pharmacy_purchase_request_approved_list->DisplayRecs - 1)
		$view_pharmacy_purchase_request_approved_list->StopRec = $view_pharmacy_purchase_request_approved_list->StartRec + $view_pharmacy_purchase_request_approved_list->DisplayRecs - 1;
	else
		$view_pharmacy_purchase_request_approved_list->StopRec = $view_pharmacy_purchase_request_approved_list->TotalRecs;
}
$view_pharmacy_purchase_request_approved_list->RecCnt = $view_pharmacy_purchase_request_approved_list->StartRec - 1;
if ($view_pharmacy_purchase_request_approved_list->Recordset && !$view_pharmacy_purchase_request_approved_list->Recordset->EOF) {
	$view_pharmacy_purchase_request_approved_list->Recordset->moveFirst();
	$selectLimit = $view_pharmacy_purchase_request_approved_list->UseSelectLimit;
	if (!$selectLimit && $view_pharmacy_purchase_request_approved_list->StartRec > 1)
		$view_pharmacy_purchase_request_approved_list->Recordset->move($view_pharmacy_purchase_request_approved_list->StartRec - 1);
} elseif (!$view_pharmacy_purchase_request_approved->AllowAddDeleteRow && $view_pharmacy_purchase_request_approved_list->StopRec == 0) {
	$view_pharmacy_purchase_request_approved_list->StopRec = $view_pharmacy_purchase_request_approved->GridAddRowCount;
}

// Initialize aggregate
$view_pharmacy_purchase_request_approved->RowType = ROWTYPE_AGGREGATEINIT;
$view_pharmacy_purchase_request_approved->resetAttributes();
$view_pharmacy_purchase_request_approved_list->renderRow();
while ($view_pharmacy_purchase_request_approved_list->RecCnt < $view_pharmacy_purchase_request_approved_list->StopRec) {
	$view_pharmacy_purchase_request_approved_list->RecCnt++;
	if ($view_pharmacy_purchase_request_approved_list->RecCnt >= $view_pharmacy_purchase_request_approved_list->StartRec) {
		$view_pharmacy_purchase_request_approved_list->RowCnt++;

		// Set up key count
		$view_pharmacy_purchase_request_approved_list->KeyCount = $view_pharmacy_purchase_request_approved_list->RowIndex;

		// Init row class and style
		$view_pharmacy_purchase_request_approved->resetAttributes();
		$view_pharmacy_purchase_request_approved->CssClass = "";
		if ($view_pharmacy_purchase_request_approved->isGridAdd()) {
		} else {
			$view_pharmacy_purchase_request_approved_list->loadRowValues($view_pharmacy_purchase_request_approved_list->Recordset); // Load row values
		}
		$view_pharmacy_purchase_request_approved->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_pharmacy_purchase_request_approved->RowAttrs = array_merge($view_pharmacy_purchase_request_approved->RowAttrs, array('data-rowindex'=>$view_pharmacy_purchase_request_approved_list->RowCnt, 'id'=>'r' . $view_pharmacy_purchase_request_approved_list->RowCnt . '_view_pharmacy_purchase_request_approved', 'data-rowtype'=>$view_pharmacy_purchase_request_approved->RowType));

		// Render row
		$view_pharmacy_purchase_request_approved_list->renderRow();

		// Render list options
		$view_pharmacy_purchase_request_approved_list->renderListOptions();
?>
	<tr<?php echo $view_pharmacy_purchase_request_approved->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_pharmacy_purchase_request_approved_list->ListOptions->render("body", "left", $view_pharmacy_purchase_request_approved_list->RowCnt);
?>
	<?php if ($view_pharmacy_purchase_request_approved->id->Visible) { // id ?>
		<td data-name="id"<?php echo $view_pharmacy_purchase_request_approved->id->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_purchase_request_approved_list->RowCnt ?>_view_pharmacy_purchase_request_approved_id" class="view_pharmacy_purchase_request_approved_id">
<span<?php echo $view_pharmacy_purchase_request_approved->id->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_approved->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_approved->DT->Visible) { // DT ?>
		<td data-name="DT"<?php echo $view_pharmacy_purchase_request_approved->DT->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_purchase_request_approved_list->RowCnt ?>_view_pharmacy_purchase_request_approved_DT" class="view_pharmacy_purchase_request_approved_DT">
<span<?php echo $view_pharmacy_purchase_request_approved->DT->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_approved->DT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_approved->EmployeeName->Visible) { // EmployeeName ?>
		<td data-name="EmployeeName"<?php echo $view_pharmacy_purchase_request_approved->EmployeeName->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_purchase_request_approved_list->RowCnt ?>_view_pharmacy_purchase_request_approved_EmployeeName" class="view_pharmacy_purchase_request_approved_EmployeeName">
<span<?php echo $view_pharmacy_purchase_request_approved->EmployeeName->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_approved->EmployeeName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_approved->Department->Visible) { // Department ?>
		<td data-name="Department"<?php echo $view_pharmacy_purchase_request_approved->Department->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_purchase_request_approved_list->RowCnt ?>_view_pharmacy_purchase_request_approved_Department" class="view_pharmacy_purchase_request_approved_Department">
<span<?php echo $view_pharmacy_purchase_request_approved->Department->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_approved->Department->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_approved->ApprovedStatus->Visible) { // ApprovedStatus ?>
		<td data-name="ApprovedStatus"<?php echo $view_pharmacy_purchase_request_approved->ApprovedStatus->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_purchase_request_approved_list->RowCnt ?>_view_pharmacy_purchase_request_approved_ApprovedStatus" class="view_pharmacy_purchase_request_approved_ApprovedStatus">
<span<?php echo $view_pharmacy_purchase_request_approved->ApprovedStatus->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_approved->ApprovedStatus->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_approved->PurchaseStatus->Visible) { // PurchaseStatus ?>
		<td data-name="PurchaseStatus"<?php echo $view_pharmacy_purchase_request_approved->PurchaseStatus->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_purchase_request_approved_list->RowCnt ?>_view_pharmacy_purchase_request_approved_PurchaseStatus" class="view_pharmacy_purchase_request_approved_PurchaseStatus">
<span<?php echo $view_pharmacy_purchase_request_approved->PurchaseStatus->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_approved->PurchaseStatus->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_approved->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_pharmacy_purchase_request_approved->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_purchase_request_approved_list->RowCnt ?>_view_pharmacy_purchase_request_approved_HospID" class="view_pharmacy_purchase_request_approved_HospID">
<span<?php echo $view_pharmacy_purchase_request_approved->HospID->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_approved->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_approved->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $view_pharmacy_purchase_request_approved->createdby->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_purchase_request_approved_list->RowCnt ?>_view_pharmacy_purchase_request_approved_createdby" class="view_pharmacy_purchase_request_approved_createdby">
<span<?php echo $view_pharmacy_purchase_request_approved->createdby->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_approved->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_approved->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $view_pharmacy_purchase_request_approved->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_purchase_request_approved_list->RowCnt ?>_view_pharmacy_purchase_request_approved_createddatetime" class="view_pharmacy_purchase_request_approved_createddatetime">
<span<?php echo $view_pharmacy_purchase_request_approved->createddatetime->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_approved->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_approved->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $view_pharmacy_purchase_request_approved->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_purchase_request_approved_list->RowCnt ?>_view_pharmacy_purchase_request_approved_modifiedby" class="view_pharmacy_purchase_request_approved_modifiedby">
<span<?php echo $view_pharmacy_purchase_request_approved->modifiedby->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_approved->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_approved->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $view_pharmacy_purchase_request_approved->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_purchase_request_approved_list->RowCnt ?>_view_pharmacy_purchase_request_approved_modifieddatetime" class="view_pharmacy_purchase_request_approved_modifieddatetime">
<span<?php echo $view_pharmacy_purchase_request_approved->modifieddatetime->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_approved->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_approved->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE"<?php echo $view_pharmacy_purchase_request_approved->BRCODE->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_purchase_request_approved_list->RowCnt ?>_view_pharmacy_purchase_request_approved_BRCODE" class="view_pharmacy_purchase_request_approved_BRCODE">
<span<?php echo $view_pharmacy_purchase_request_approved->BRCODE->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_approved->BRCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_pharmacy_purchase_request_approved_list->ListOptions->render("body", "right", $view_pharmacy_purchase_request_approved_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_pharmacy_purchase_request_approved->isGridAdd())
		$view_pharmacy_purchase_request_approved_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_pharmacy_purchase_request_approved->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_pharmacy_purchase_request_approved_list->Recordset)
	$view_pharmacy_purchase_request_approved_list->Recordset->Close();
?>
<?php if (!$view_pharmacy_purchase_request_approved->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_pharmacy_purchase_request_approved->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_pharmacy_purchase_request_approved_list->Pager)) $view_pharmacy_purchase_request_approved_list->Pager = new NumericPager($view_pharmacy_purchase_request_approved_list->StartRec, $view_pharmacy_purchase_request_approved_list->DisplayRecs, $view_pharmacy_purchase_request_approved_list->TotalRecs, $view_pharmacy_purchase_request_approved_list->RecRange, $view_pharmacy_purchase_request_approved_list->AutoHidePager) ?>
<?php if ($view_pharmacy_purchase_request_approved_list->Pager->RecordCount > 0 && $view_pharmacy_purchase_request_approved_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_pharmacy_purchase_request_approved_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_purchase_request_approved_list->pageUrl() ?>start=<?php echo $view_pharmacy_purchase_request_approved_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_approved_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_purchase_request_approved_list->pageUrl() ?>start=<?php echo $view_pharmacy_purchase_request_approved_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_pharmacy_purchase_request_approved_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_pharmacy_purchase_request_approved_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_approved_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_purchase_request_approved_list->pageUrl() ?>start=<?php echo $view_pharmacy_purchase_request_approved_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_approved_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_purchase_request_approved_list->pageUrl() ?>start=<?php echo $view_pharmacy_purchase_request_approved_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_pharmacy_purchase_request_approved_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_pharmacy_purchase_request_approved_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_pharmacy_purchase_request_approved_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved_list->TotalRecs > 0 && (!$view_pharmacy_purchase_request_approved_list->AutoHidePageSizeSelector || $view_pharmacy_purchase_request_approved_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_pharmacy_purchase_request_approved">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_pharmacy_purchase_request_approved_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_pharmacy_purchase_request_approved_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_pharmacy_purchase_request_approved_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_pharmacy_purchase_request_approved_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_pharmacy_purchase_request_approved_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_pharmacy_purchase_request_approved_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_pharmacy_purchase_request_approved->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_purchase_request_approved_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved_list->TotalRecs == 0 && !$view_pharmacy_purchase_request_approved->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_purchase_request_approved_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_pharmacy_purchase_request_approved_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_pharmacy_purchase_request_approved->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_pharmacy_purchase_request_approved->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_pharmacy_purchase_request_approved", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_pharmacy_purchase_request_approved_list->terminate();
?>