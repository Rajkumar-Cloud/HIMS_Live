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
$view_pharmacy_purchase_request_purchased_list = new view_pharmacy_purchase_request_purchased_list();

// Run the page
$view_pharmacy_purchase_request_purchased_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacy_purchase_request_purchased_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_pharmacy_purchase_request_purchased->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_pharmacy_purchase_request_purchasedlist = currentForm = new ew.Form("fview_pharmacy_purchase_request_purchasedlist", "list");
fview_pharmacy_purchase_request_purchasedlist.formKeyCountName = '<?php echo $view_pharmacy_purchase_request_purchased_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_pharmacy_purchase_request_purchasedlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_pharmacy_purchase_request_purchasedlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_pharmacy_purchase_request_purchasedlist.lists["x_PurchaseStatus"] = <?php echo $view_pharmacy_purchase_request_purchased_list->PurchaseStatus->Lookup->toClientList() ?>;
fview_pharmacy_purchase_request_purchasedlist.lists["x_PurchaseStatus"].options = <?php echo JsonEncode($view_pharmacy_purchase_request_purchased_list->PurchaseStatus->options(FALSE, TRUE)) ?>;

// Form object for search
var fview_pharmacy_purchase_request_purchasedlistsrch = currentSearchForm = new ew.Form("fview_pharmacy_purchase_request_purchasedlistsrch");

// Filters
fview_pharmacy_purchase_request_purchasedlistsrch.filterList = <?php echo $view_pharmacy_purchase_request_purchased_list->getFilterList() ?>;
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
<?php if (!$view_pharmacy_purchase_request_purchased->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_pharmacy_purchase_request_purchased_list->TotalRecs > 0 && $view_pharmacy_purchase_request_purchased_list->ExportOptions->visible()) { ?>
<?php $view_pharmacy_purchase_request_purchased_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased_list->ImportOptions->visible()) { ?>
<?php $view_pharmacy_purchase_request_purchased_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased_list->SearchOptions->visible()) { ?>
<?php $view_pharmacy_purchase_request_purchased_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased_list->FilterOptions->visible()) { ?>
<?php $view_pharmacy_purchase_request_purchased_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_pharmacy_purchase_request_purchased_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_pharmacy_purchase_request_purchased->isExport() && !$view_pharmacy_purchase_request_purchased->CurrentAction) { ?>
<form name="fview_pharmacy_purchase_request_purchasedlistsrch" id="fview_pharmacy_purchase_request_purchasedlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_pharmacy_purchase_request_purchased_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_pharmacy_purchase_request_purchasedlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_pharmacy_purchase_request_purchased">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_purchased_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_purchased_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_pharmacy_purchase_request_purchased_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_pharmacy_purchase_request_purchased_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_purchase_request_purchased_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_purchase_request_purchased_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_purchase_request_purchased_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_pharmacy_purchase_request_purchased_list->showPageHeader(); ?>
<?php
$view_pharmacy_purchase_request_purchased_list->showMessage();
?>
<?php if ($view_pharmacy_purchase_request_purchased_list->TotalRecs > 0 || $view_pharmacy_purchase_request_purchased->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_pharmacy_purchase_request_purchased_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_pharmacy_purchase_request_purchased">
<?php if (!$view_pharmacy_purchase_request_purchased->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_pharmacy_purchase_request_purchased->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_pharmacy_purchase_request_purchased_list->Pager)) $view_pharmacy_purchase_request_purchased_list->Pager = new NumericPager($view_pharmacy_purchase_request_purchased_list->StartRec, $view_pharmacy_purchase_request_purchased_list->DisplayRecs, $view_pharmacy_purchase_request_purchased_list->TotalRecs, $view_pharmacy_purchase_request_purchased_list->RecRange, $view_pharmacy_purchase_request_purchased_list->AutoHidePager) ?>
<?php if ($view_pharmacy_purchase_request_purchased_list->Pager->RecordCount > 0 && $view_pharmacy_purchase_request_purchased_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_pharmacy_purchase_request_purchased_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_purchase_request_purchased_list->pageUrl() ?>start=<?php echo $view_pharmacy_purchase_request_purchased_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_purchased_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_purchase_request_purchased_list->pageUrl() ?>start=<?php echo $view_pharmacy_purchase_request_purchased_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_pharmacy_purchase_request_purchased_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_pharmacy_purchase_request_purchased_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_purchased_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_purchase_request_purchased_list->pageUrl() ?>start=<?php echo $view_pharmacy_purchase_request_purchased_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_purchased_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_purchase_request_purchased_list->pageUrl() ?>start=<?php echo $view_pharmacy_purchase_request_purchased_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_pharmacy_purchase_request_purchased_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_pharmacy_purchase_request_purchased_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_pharmacy_purchase_request_purchased_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased_list->TotalRecs > 0 && (!$view_pharmacy_purchase_request_purchased_list->AutoHidePageSizeSelector || $view_pharmacy_purchase_request_purchased_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_pharmacy_purchase_request_purchased">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_pharmacy_purchase_request_purchased_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_pharmacy_purchase_request_purchased_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_pharmacy_purchase_request_purchased_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_pharmacy_purchase_request_purchased_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_pharmacy_purchase_request_purchased_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_pharmacy_purchase_request_purchased_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_pharmacy_purchase_request_purchased->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_purchase_request_purchased_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_pharmacy_purchase_request_purchasedlist" id="fview_pharmacy_purchase_request_purchasedlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_pharmacy_purchase_request_purchased_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_pharmacy_purchase_request_purchased_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_purchase_request_purchased">
<div id="gmp_view_pharmacy_purchase_request_purchased" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_pharmacy_purchase_request_purchased_list->TotalRecs > 0 || $view_pharmacy_purchase_request_purchased->isGridEdit()) { ?>
<table id="tbl_view_pharmacy_purchase_request_purchasedlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_pharmacy_purchase_request_purchased_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_pharmacy_purchase_request_purchased_list->renderListOptions();

// Render list options (header, left)
$view_pharmacy_purchase_request_purchased_list->ListOptions->render("header", "left");
?>
<?php if ($view_pharmacy_purchase_request_purchased->id->Visible) { // id ?>
	<?php if ($view_pharmacy_purchase_request_purchased->sortUrl($view_pharmacy_purchase_request_purchased->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_pharmacy_purchase_request_purchased->id->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_purchased_id" class="view_pharmacy_purchase_request_purchased_id"><div class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_purchased->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_pharmacy_purchase_request_purchased->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_purchase_request_purchased->SortUrl($view_pharmacy_purchase_request_purchased->id) ?>',1);"><div id="elh_view_pharmacy_purchase_request_purchased_id" class="view_pharmacy_purchase_request_purchased_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_purchased->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_purchased->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_purchase_request_purchased->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased->DT->Visible) { // DT ?>
	<?php if ($view_pharmacy_purchase_request_purchased->sortUrl($view_pharmacy_purchase_request_purchased->DT) == "") { ?>
		<th data-name="DT" class="<?php echo $view_pharmacy_purchase_request_purchased->DT->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_purchased_DT" class="view_pharmacy_purchase_request_purchased_DT"><div class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_purchased->DT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DT" class="<?php echo $view_pharmacy_purchase_request_purchased->DT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_purchase_request_purchased->SortUrl($view_pharmacy_purchase_request_purchased->DT) ?>',1);"><div id="elh_view_pharmacy_purchase_request_purchased_DT" class="view_pharmacy_purchase_request_purchased_DT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_purchased->DT->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_purchased->DT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_purchase_request_purchased->DT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased->EmployeeName->Visible) { // EmployeeName ?>
	<?php if ($view_pharmacy_purchase_request_purchased->sortUrl($view_pharmacy_purchase_request_purchased->EmployeeName) == "") { ?>
		<th data-name="EmployeeName" class="<?php echo $view_pharmacy_purchase_request_purchased->EmployeeName->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_purchased_EmployeeName" class="view_pharmacy_purchase_request_purchased_EmployeeName"><div class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_purchased->EmployeeName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EmployeeName" class="<?php echo $view_pharmacy_purchase_request_purchased->EmployeeName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_purchase_request_purchased->SortUrl($view_pharmacy_purchase_request_purchased->EmployeeName) ?>',1);"><div id="elh_view_pharmacy_purchase_request_purchased_EmployeeName" class="view_pharmacy_purchase_request_purchased_EmployeeName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_purchased->EmployeeName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_purchased->EmployeeName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_purchase_request_purchased->EmployeeName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased->Department->Visible) { // Department ?>
	<?php if ($view_pharmacy_purchase_request_purchased->sortUrl($view_pharmacy_purchase_request_purchased->Department) == "") { ?>
		<th data-name="Department" class="<?php echo $view_pharmacy_purchase_request_purchased->Department->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_purchased_Department" class="view_pharmacy_purchase_request_purchased_Department"><div class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_purchased->Department->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Department" class="<?php echo $view_pharmacy_purchase_request_purchased->Department->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_purchase_request_purchased->SortUrl($view_pharmacy_purchase_request_purchased->Department) ?>',1);"><div id="elh_view_pharmacy_purchase_request_purchased_Department" class="view_pharmacy_purchase_request_purchased_Department">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_purchased->Department->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_purchased->Department->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_purchase_request_purchased->Department->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased->ApprovedStatus->Visible) { // ApprovedStatus ?>
	<?php if ($view_pharmacy_purchase_request_purchased->sortUrl($view_pharmacy_purchase_request_purchased->ApprovedStatus) == "") { ?>
		<th data-name="ApprovedStatus" class="<?php echo $view_pharmacy_purchase_request_purchased->ApprovedStatus->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_purchased_ApprovedStatus" class="view_pharmacy_purchase_request_purchased_ApprovedStatus"><div class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_purchased->ApprovedStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ApprovedStatus" class="<?php echo $view_pharmacy_purchase_request_purchased->ApprovedStatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_purchase_request_purchased->SortUrl($view_pharmacy_purchase_request_purchased->ApprovedStatus) ?>',1);"><div id="elh_view_pharmacy_purchase_request_purchased_ApprovedStatus" class="view_pharmacy_purchase_request_purchased_ApprovedStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_purchased->ApprovedStatus->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_purchased->ApprovedStatus->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_purchase_request_purchased->ApprovedStatus->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased->PurchaseStatus->Visible) { // PurchaseStatus ?>
	<?php if ($view_pharmacy_purchase_request_purchased->sortUrl($view_pharmacy_purchase_request_purchased->PurchaseStatus) == "") { ?>
		<th data-name="PurchaseStatus" class="<?php echo $view_pharmacy_purchase_request_purchased->PurchaseStatus->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_purchased_PurchaseStatus" class="view_pharmacy_purchase_request_purchased_PurchaseStatus"><div class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_purchased->PurchaseStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PurchaseStatus" class="<?php echo $view_pharmacy_purchase_request_purchased->PurchaseStatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_purchase_request_purchased->SortUrl($view_pharmacy_purchase_request_purchased->PurchaseStatus) ?>',1);"><div id="elh_view_pharmacy_purchase_request_purchased_PurchaseStatus" class="view_pharmacy_purchase_request_purchased_PurchaseStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_purchased->PurchaseStatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_purchased->PurchaseStatus->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_purchase_request_purchased->PurchaseStatus->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased->HospID->Visible) { // HospID ?>
	<?php if ($view_pharmacy_purchase_request_purchased->sortUrl($view_pharmacy_purchase_request_purchased->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_pharmacy_purchase_request_purchased->HospID->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_purchased_HospID" class="view_pharmacy_purchase_request_purchased_HospID"><div class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_purchased->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_pharmacy_purchase_request_purchased->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_purchase_request_purchased->SortUrl($view_pharmacy_purchase_request_purchased->HospID) ?>',1);"><div id="elh_view_pharmacy_purchase_request_purchased_HospID" class="view_pharmacy_purchase_request_purchased_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_purchased->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_purchased->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_purchase_request_purchased->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased->createdby->Visible) { // createdby ?>
	<?php if ($view_pharmacy_purchase_request_purchased->sortUrl($view_pharmacy_purchase_request_purchased->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $view_pharmacy_purchase_request_purchased->createdby->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_purchased_createdby" class="view_pharmacy_purchase_request_purchased_createdby"><div class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_purchased->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $view_pharmacy_purchase_request_purchased->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_purchase_request_purchased->SortUrl($view_pharmacy_purchase_request_purchased->createdby) ?>',1);"><div id="elh_view_pharmacy_purchase_request_purchased_createdby" class="view_pharmacy_purchase_request_purchased_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_purchased->createdby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_purchased->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_purchase_request_purchased->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_pharmacy_purchase_request_purchased->sortUrl($view_pharmacy_purchase_request_purchased->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_pharmacy_purchase_request_purchased->createddatetime->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_purchased_createddatetime" class="view_pharmacy_purchase_request_purchased_createddatetime"><div class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_purchased->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_pharmacy_purchase_request_purchased->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_purchase_request_purchased->SortUrl($view_pharmacy_purchase_request_purchased->createddatetime) ?>',1);"><div id="elh_view_pharmacy_purchase_request_purchased_createddatetime" class="view_pharmacy_purchase_request_purchased_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_purchased->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_purchased->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_purchase_request_purchased->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased->modifiedby->Visible) { // modifiedby ?>
	<?php if ($view_pharmacy_purchase_request_purchased->sortUrl($view_pharmacy_purchase_request_purchased->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $view_pharmacy_purchase_request_purchased->modifiedby->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_purchased_modifiedby" class="view_pharmacy_purchase_request_purchased_modifiedby"><div class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_purchased->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $view_pharmacy_purchase_request_purchased->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_purchase_request_purchased->SortUrl($view_pharmacy_purchase_request_purchased->modifiedby) ?>',1);"><div id="elh_view_pharmacy_purchase_request_purchased_modifiedby" class="view_pharmacy_purchase_request_purchased_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_purchased->modifiedby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_purchased->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_purchase_request_purchased->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($view_pharmacy_purchase_request_purchased->sortUrl($view_pharmacy_purchase_request_purchased->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_pharmacy_purchase_request_purchased->modifieddatetime->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_purchased_modifieddatetime" class="view_pharmacy_purchase_request_purchased_modifieddatetime"><div class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_purchased->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_pharmacy_purchase_request_purchased->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_purchase_request_purchased->SortUrl($view_pharmacy_purchase_request_purchased->modifieddatetime) ?>',1);"><div id="elh_view_pharmacy_purchase_request_purchased_modifieddatetime" class="view_pharmacy_purchase_request_purchased_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_purchased->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_purchased->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_purchase_request_purchased->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased->BRCODE->Visible) { // BRCODE ?>
	<?php if ($view_pharmacy_purchase_request_purchased->sortUrl($view_pharmacy_purchase_request_purchased->BRCODE) == "") { ?>
		<th data-name="BRCODE" class="<?php echo $view_pharmacy_purchase_request_purchased->BRCODE->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_purchased_BRCODE" class="view_pharmacy_purchase_request_purchased_BRCODE"><div class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_purchased->BRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BRCODE" class="<?php echo $view_pharmacy_purchase_request_purchased->BRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_pharmacy_purchase_request_purchased->SortUrl($view_pharmacy_purchase_request_purchased->BRCODE) ?>',1);"><div id="elh_view_pharmacy_purchase_request_purchased_BRCODE" class="view_pharmacy_purchase_request_purchased_BRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_purchased->BRCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_purchased->BRCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_pharmacy_purchase_request_purchased->BRCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_pharmacy_purchase_request_purchased_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_pharmacy_purchase_request_purchased->ExportAll && $view_pharmacy_purchase_request_purchased->isExport()) {
	$view_pharmacy_purchase_request_purchased_list->StopRec = $view_pharmacy_purchase_request_purchased_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_pharmacy_purchase_request_purchased_list->TotalRecs > $view_pharmacy_purchase_request_purchased_list->StartRec + $view_pharmacy_purchase_request_purchased_list->DisplayRecs - 1)
		$view_pharmacy_purchase_request_purchased_list->StopRec = $view_pharmacy_purchase_request_purchased_list->StartRec + $view_pharmacy_purchase_request_purchased_list->DisplayRecs - 1;
	else
		$view_pharmacy_purchase_request_purchased_list->StopRec = $view_pharmacy_purchase_request_purchased_list->TotalRecs;
}
$view_pharmacy_purchase_request_purchased_list->RecCnt = $view_pharmacy_purchase_request_purchased_list->StartRec - 1;
if ($view_pharmacy_purchase_request_purchased_list->Recordset && !$view_pharmacy_purchase_request_purchased_list->Recordset->EOF) {
	$view_pharmacy_purchase_request_purchased_list->Recordset->moveFirst();
	$selectLimit = $view_pharmacy_purchase_request_purchased_list->UseSelectLimit;
	if (!$selectLimit && $view_pharmacy_purchase_request_purchased_list->StartRec > 1)
		$view_pharmacy_purchase_request_purchased_list->Recordset->move($view_pharmacy_purchase_request_purchased_list->StartRec - 1);
} elseif (!$view_pharmacy_purchase_request_purchased->AllowAddDeleteRow && $view_pharmacy_purchase_request_purchased_list->StopRec == 0) {
	$view_pharmacy_purchase_request_purchased_list->StopRec = $view_pharmacy_purchase_request_purchased->GridAddRowCount;
}

// Initialize aggregate
$view_pharmacy_purchase_request_purchased->RowType = ROWTYPE_AGGREGATEINIT;
$view_pharmacy_purchase_request_purchased->resetAttributes();
$view_pharmacy_purchase_request_purchased_list->renderRow();
while ($view_pharmacy_purchase_request_purchased_list->RecCnt < $view_pharmacy_purchase_request_purchased_list->StopRec) {
	$view_pharmacy_purchase_request_purchased_list->RecCnt++;
	if ($view_pharmacy_purchase_request_purchased_list->RecCnt >= $view_pharmacy_purchase_request_purchased_list->StartRec) {
		$view_pharmacy_purchase_request_purchased_list->RowCnt++;

		// Set up key count
		$view_pharmacy_purchase_request_purchased_list->KeyCount = $view_pharmacy_purchase_request_purchased_list->RowIndex;

		// Init row class and style
		$view_pharmacy_purchase_request_purchased->resetAttributes();
		$view_pharmacy_purchase_request_purchased->CssClass = "";
		if ($view_pharmacy_purchase_request_purchased->isGridAdd()) {
		} else {
			$view_pharmacy_purchase_request_purchased_list->loadRowValues($view_pharmacy_purchase_request_purchased_list->Recordset); // Load row values
		}
		$view_pharmacy_purchase_request_purchased->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_pharmacy_purchase_request_purchased->RowAttrs = array_merge($view_pharmacy_purchase_request_purchased->RowAttrs, array('data-rowindex'=>$view_pharmacy_purchase_request_purchased_list->RowCnt, 'id'=>'r' . $view_pharmacy_purchase_request_purchased_list->RowCnt . '_view_pharmacy_purchase_request_purchased', 'data-rowtype'=>$view_pharmacy_purchase_request_purchased->RowType));

		// Render row
		$view_pharmacy_purchase_request_purchased_list->renderRow();

		// Render list options
		$view_pharmacy_purchase_request_purchased_list->renderListOptions();
?>
	<tr<?php echo $view_pharmacy_purchase_request_purchased->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_pharmacy_purchase_request_purchased_list->ListOptions->render("body", "left", $view_pharmacy_purchase_request_purchased_list->RowCnt);
?>
	<?php if ($view_pharmacy_purchase_request_purchased->id->Visible) { // id ?>
		<td data-name="id"<?php echo $view_pharmacy_purchase_request_purchased->id->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_purchase_request_purchased_list->RowCnt ?>_view_pharmacy_purchase_request_purchased_id" class="view_pharmacy_purchase_request_purchased_id">
<span<?php echo $view_pharmacy_purchase_request_purchased->id->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_purchased->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_purchased->DT->Visible) { // DT ?>
		<td data-name="DT"<?php echo $view_pharmacy_purchase_request_purchased->DT->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_purchase_request_purchased_list->RowCnt ?>_view_pharmacy_purchase_request_purchased_DT" class="view_pharmacy_purchase_request_purchased_DT">
<span<?php echo $view_pharmacy_purchase_request_purchased->DT->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_purchased->DT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_purchased->EmployeeName->Visible) { // EmployeeName ?>
		<td data-name="EmployeeName"<?php echo $view_pharmacy_purchase_request_purchased->EmployeeName->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_purchase_request_purchased_list->RowCnt ?>_view_pharmacy_purchase_request_purchased_EmployeeName" class="view_pharmacy_purchase_request_purchased_EmployeeName">
<span<?php echo $view_pharmacy_purchase_request_purchased->EmployeeName->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_purchased->EmployeeName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_purchased->Department->Visible) { // Department ?>
		<td data-name="Department"<?php echo $view_pharmacy_purchase_request_purchased->Department->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_purchase_request_purchased_list->RowCnt ?>_view_pharmacy_purchase_request_purchased_Department" class="view_pharmacy_purchase_request_purchased_Department">
<span<?php echo $view_pharmacy_purchase_request_purchased->Department->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_purchased->Department->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_purchased->ApprovedStatus->Visible) { // ApprovedStatus ?>
		<td data-name="ApprovedStatus"<?php echo $view_pharmacy_purchase_request_purchased->ApprovedStatus->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_purchase_request_purchased_list->RowCnt ?>_view_pharmacy_purchase_request_purchased_ApprovedStatus" class="view_pharmacy_purchase_request_purchased_ApprovedStatus">
<span<?php echo $view_pharmacy_purchase_request_purchased->ApprovedStatus->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_purchased->ApprovedStatus->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_purchased->PurchaseStatus->Visible) { // PurchaseStatus ?>
		<td data-name="PurchaseStatus"<?php echo $view_pharmacy_purchase_request_purchased->PurchaseStatus->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_purchase_request_purchased_list->RowCnt ?>_view_pharmacy_purchase_request_purchased_PurchaseStatus" class="view_pharmacy_purchase_request_purchased_PurchaseStatus">
<span<?php echo $view_pharmacy_purchase_request_purchased->PurchaseStatus->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_purchased->PurchaseStatus->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_purchased->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_pharmacy_purchase_request_purchased->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_purchase_request_purchased_list->RowCnt ?>_view_pharmacy_purchase_request_purchased_HospID" class="view_pharmacy_purchase_request_purchased_HospID">
<span<?php echo $view_pharmacy_purchase_request_purchased->HospID->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_purchased->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_purchased->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $view_pharmacy_purchase_request_purchased->createdby->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_purchase_request_purchased_list->RowCnt ?>_view_pharmacy_purchase_request_purchased_createdby" class="view_pharmacy_purchase_request_purchased_createdby">
<span<?php echo $view_pharmacy_purchase_request_purchased->createdby->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_purchased->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_purchased->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $view_pharmacy_purchase_request_purchased->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_purchase_request_purchased_list->RowCnt ?>_view_pharmacy_purchase_request_purchased_createddatetime" class="view_pharmacy_purchase_request_purchased_createddatetime">
<span<?php echo $view_pharmacy_purchase_request_purchased->createddatetime->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_purchased->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_purchased->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $view_pharmacy_purchase_request_purchased->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_purchase_request_purchased_list->RowCnt ?>_view_pharmacy_purchase_request_purchased_modifiedby" class="view_pharmacy_purchase_request_purchased_modifiedby">
<span<?php echo $view_pharmacy_purchase_request_purchased->modifiedby->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_purchased->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_purchased->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $view_pharmacy_purchase_request_purchased->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_purchase_request_purchased_list->RowCnt ?>_view_pharmacy_purchase_request_purchased_modifieddatetime" class="view_pharmacy_purchase_request_purchased_modifieddatetime">
<span<?php echo $view_pharmacy_purchase_request_purchased->modifieddatetime->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_purchased->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_purchased->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE"<?php echo $view_pharmacy_purchase_request_purchased->BRCODE->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_purchase_request_purchased_list->RowCnt ?>_view_pharmacy_purchase_request_purchased_BRCODE" class="view_pharmacy_purchase_request_purchased_BRCODE">
<span<?php echo $view_pharmacy_purchase_request_purchased->BRCODE->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_purchased->BRCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_pharmacy_purchase_request_purchased_list->ListOptions->render("body", "right", $view_pharmacy_purchase_request_purchased_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_pharmacy_purchase_request_purchased->isGridAdd())
		$view_pharmacy_purchase_request_purchased_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_pharmacy_purchase_request_purchased->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_pharmacy_purchase_request_purchased_list->Recordset)
	$view_pharmacy_purchase_request_purchased_list->Recordset->Close();
?>
<?php if (!$view_pharmacy_purchase_request_purchased->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_pharmacy_purchase_request_purchased->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_pharmacy_purchase_request_purchased_list->Pager)) $view_pharmacy_purchase_request_purchased_list->Pager = new NumericPager($view_pharmacy_purchase_request_purchased_list->StartRec, $view_pharmacy_purchase_request_purchased_list->DisplayRecs, $view_pharmacy_purchase_request_purchased_list->TotalRecs, $view_pharmacy_purchase_request_purchased_list->RecRange, $view_pharmacy_purchase_request_purchased_list->AutoHidePager) ?>
<?php if ($view_pharmacy_purchase_request_purchased_list->Pager->RecordCount > 0 && $view_pharmacy_purchase_request_purchased_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_pharmacy_purchase_request_purchased_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_purchase_request_purchased_list->pageUrl() ?>start=<?php echo $view_pharmacy_purchase_request_purchased_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_purchased_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_purchase_request_purchased_list->pageUrl() ?>start=<?php echo $view_pharmacy_purchase_request_purchased_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_pharmacy_purchase_request_purchased_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_pharmacy_purchase_request_purchased_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_purchased_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_purchase_request_purchased_list->pageUrl() ?>start=<?php echo $view_pharmacy_purchase_request_purchased_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_purchased_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_pharmacy_purchase_request_purchased_list->pageUrl() ?>start=<?php echo $view_pharmacy_purchase_request_purchased_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_pharmacy_purchase_request_purchased_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_pharmacy_purchase_request_purchased_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_pharmacy_purchase_request_purchased_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased_list->TotalRecs > 0 && (!$view_pharmacy_purchase_request_purchased_list->AutoHidePageSizeSelector || $view_pharmacy_purchase_request_purchased_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_pharmacy_purchase_request_purchased">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_pharmacy_purchase_request_purchased_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_pharmacy_purchase_request_purchased_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_pharmacy_purchase_request_purchased_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_pharmacy_purchase_request_purchased_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_pharmacy_purchase_request_purchased_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_pharmacy_purchase_request_purchased_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_pharmacy_purchase_request_purchased->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_purchase_request_purchased_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased_list->TotalRecs == 0 && !$view_pharmacy_purchase_request_purchased->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_purchase_request_purchased_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_pharmacy_purchase_request_purchased_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_pharmacy_purchase_request_purchased->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_pharmacy_purchase_request_purchased->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_pharmacy_purchase_request_purchased", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_pharmacy_purchase_request_purchased_list->terminate();
?>