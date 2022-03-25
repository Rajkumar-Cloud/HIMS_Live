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
$pharmacy_purchase_request_list = new pharmacy_purchase_request_list();

// Run the page
$pharmacy_purchase_request_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_purchase_request_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$pharmacy_purchase_request->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fpharmacy_purchase_requestlist = currentForm = new ew.Form("fpharmacy_purchase_requestlist", "list");
fpharmacy_purchase_requestlist.formKeyCountName = '<?php echo $pharmacy_purchase_request_list->FormKeyCountName ?>';

// Form_CustomValidate event
fpharmacy_purchase_requestlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_purchase_requestlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fpharmacy_purchase_requestlistsrch = currentSearchForm = new ew.Form("fpharmacy_purchase_requestlistsrch");

// Filters
fpharmacy_purchase_requestlistsrch.filterList = <?php echo $pharmacy_purchase_request_list->getFilterList() ?>;
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
<?php if (!$pharmacy_purchase_request->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($pharmacy_purchase_request_list->TotalRecs > 0 && $pharmacy_purchase_request_list->ExportOptions->visible()) { ?>
<?php $pharmacy_purchase_request_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_list->ImportOptions->visible()) { ?>
<?php $pharmacy_purchase_request_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_list->SearchOptions->visible()) { ?>
<?php $pharmacy_purchase_request_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($pharmacy_purchase_request_list->FilterOptions->visible()) { ?>
<?php $pharmacy_purchase_request_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$pharmacy_purchase_request_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$pharmacy_purchase_request->isExport() && !$pharmacy_purchase_request->CurrentAction) { ?>
<form name="fpharmacy_purchase_requestlistsrch" id="fpharmacy_purchase_requestlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($pharmacy_purchase_request_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fpharmacy_purchase_requestlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pharmacy_purchase_request">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($pharmacy_purchase_request_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($pharmacy_purchase_request_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $pharmacy_purchase_request_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($pharmacy_purchase_request_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_purchase_request_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_purchase_request_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($pharmacy_purchase_request_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $pharmacy_purchase_request_list->showPageHeader(); ?>
<?php
$pharmacy_purchase_request_list->showMessage();
?>
<?php if ($pharmacy_purchase_request_list->TotalRecs > 0 || $pharmacy_purchase_request->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pharmacy_purchase_request_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pharmacy_purchase_request">
<?php if (!$pharmacy_purchase_request->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$pharmacy_purchase_request->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($pharmacy_purchase_request_list->Pager)) $pharmacy_purchase_request_list->Pager = new NumericPager($pharmacy_purchase_request_list->StartRec, $pharmacy_purchase_request_list->DisplayRecs, $pharmacy_purchase_request_list->TotalRecs, $pharmacy_purchase_request_list->RecRange, $pharmacy_purchase_request_list->AutoHidePager) ?>
<?php if ($pharmacy_purchase_request_list->Pager->RecordCount > 0 && $pharmacy_purchase_request_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($pharmacy_purchase_request_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_purchase_request_list->pageUrl() ?>start=<?php echo $pharmacy_purchase_request_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_purchase_request_list->pageUrl() ?>start=<?php echo $pharmacy_purchase_request_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($pharmacy_purchase_request_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $pharmacy_purchase_request_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_purchase_request_list->pageUrl() ?>start=<?php echo $pharmacy_purchase_request_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_purchase_request_list->pageUrl() ?>start=<?php echo $pharmacy_purchase_request_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($pharmacy_purchase_request_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $pharmacy_purchase_request_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $pharmacy_purchase_request_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $pharmacy_purchase_request_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($pharmacy_purchase_request_list->TotalRecs > 0 && (!$pharmacy_purchase_request_list->AutoHidePageSizeSelector || $pharmacy_purchase_request_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="pharmacy_purchase_request">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($pharmacy_purchase_request_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($pharmacy_purchase_request_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($pharmacy_purchase_request_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($pharmacy_purchase_request_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($pharmacy_purchase_request_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($pharmacy_purchase_request_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($pharmacy_purchase_request->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_purchase_request_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpharmacy_purchase_requestlist" id="fpharmacy_purchase_requestlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_purchase_request_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_purchase_request_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_purchase_request">
<div id="gmp_pharmacy_purchase_request" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($pharmacy_purchase_request_list->TotalRecs > 0 || $pharmacy_purchase_request->isGridEdit()) { ?>
<table id="tbl_pharmacy_purchase_requestlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pharmacy_purchase_request_list->RowType = ROWTYPE_HEADER;

// Render list options
$pharmacy_purchase_request_list->renderListOptions();

// Render list options (header, left)
$pharmacy_purchase_request_list->ListOptions->render("header", "left");
?>
<?php if ($pharmacy_purchase_request->id->Visible) { // id ?>
	<?php if ($pharmacy_purchase_request->sortUrl($pharmacy_purchase_request->id) == "") { ?>
		<th data-name="id" class="<?php echo $pharmacy_purchase_request->id->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_id" class="pharmacy_purchase_request_id"><div class="ew-table-header-caption"><?php echo $pharmacy_purchase_request->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $pharmacy_purchase_request->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_purchase_request->SortUrl($pharmacy_purchase_request->id) ?>',1);"><div id="elh_pharmacy_purchase_request_id" class="pharmacy_purchase_request_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_purchase_request->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request->DT->Visible) { // DT ?>
	<?php if ($pharmacy_purchase_request->sortUrl($pharmacy_purchase_request->DT) == "") { ?>
		<th data-name="DT" class="<?php echo $pharmacy_purchase_request->DT->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_DT" class="pharmacy_purchase_request_DT"><div class="ew-table-header-caption"><?php echo $pharmacy_purchase_request->DT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DT" class="<?php echo $pharmacy_purchase_request->DT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_purchase_request->SortUrl($pharmacy_purchase_request->DT) ?>',1);"><div id="elh_pharmacy_purchase_request_DT" class="pharmacy_purchase_request_DT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request->DT->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request->DT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_purchase_request->DT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request->EmployeeName->Visible) { // EmployeeName ?>
	<?php if ($pharmacy_purchase_request->sortUrl($pharmacy_purchase_request->EmployeeName) == "") { ?>
		<th data-name="EmployeeName" class="<?php echo $pharmacy_purchase_request->EmployeeName->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_EmployeeName" class="pharmacy_purchase_request_EmployeeName"><div class="ew-table-header-caption"><?php echo $pharmacy_purchase_request->EmployeeName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EmployeeName" class="<?php echo $pharmacy_purchase_request->EmployeeName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_purchase_request->SortUrl($pharmacy_purchase_request->EmployeeName) ?>',1);"><div id="elh_pharmacy_purchase_request_EmployeeName" class="pharmacy_purchase_request_EmployeeName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request->EmployeeName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request->EmployeeName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_purchase_request->EmployeeName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request->Department->Visible) { // Department ?>
	<?php if ($pharmacy_purchase_request->sortUrl($pharmacy_purchase_request->Department) == "") { ?>
		<th data-name="Department" class="<?php echo $pharmacy_purchase_request->Department->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_Department" class="pharmacy_purchase_request_Department"><div class="ew-table-header-caption"><?php echo $pharmacy_purchase_request->Department->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Department" class="<?php echo $pharmacy_purchase_request->Department->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_purchase_request->SortUrl($pharmacy_purchase_request->Department) ?>',1);"><div id="elh_pharmacy_purchase_request_Department" class="pharmacy_purchase_request_Department">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request->Department->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request->Department->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_purchase_request->Department->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request->ApprovedStatus->Visible) { // ApprovedStatus ?>
	<?php if ($pharmacy_purchase_request->sortUrl($pharmacy_purchase_request->ApprovedStatus) == "") { ?>
		<th data-name="ApprovedStatus" class="<?php echo $pharmacy_purchase_request->ApprovedStatus->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_ApprovedStatus" class="pharmacy_purchase_request_ApprovedStatus"><div class="ew-table-header-caption"><?php echo $pharmacy_purchase_request->ApprovedStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ApprovedStatus" class="<?php echo $pharmacy_purchase_request->ApprovedStatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_purchase_request->SortUrl($pharmacy_purchase_request->ApprovedStatus) ?>',1);"><div id="elh_pharmacy_purchase_request_ApprovedStatus" class="pharmacy_purchase_request_ApprovedStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request->ApprovedStatus->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request->ApprovedStatus->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_purchase_request->ApprovedStatus->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request->PurchaseStatus->Visible) { // PurchaseStatus ?>
	<?php if ($pharmacy_purchase_request->sortUrl($pharmacy_purchase_request->PurchaseStatus) == "") { ?>
		<th data-name="PurchaseStatus" class="<?php echo $pharmacy_purchase_request->PurchaseStatus->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_PurchaseStatus" class="pharmacy_purchase_request_PurchaseStatus"><div class="ew-table-header-caption"><?php echo $pharmacy_purchase_request->PurchaseStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PurchaseStatus" class="<?php echo $pharmacy_purchase_request->PurchaseStatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_purchase_request->SortUrl($pharmacy_purchase_request->PurchaseStatus) ?>',1);"><div id="elh_pharmacy_purchase_request_PurchaseStatus" class="pharmacy_purchase_request_PurchaseStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request->PurchaseStatus->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request->PurchaseStatus->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_purchase_request->PurchaseStatus->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request->HospID->Visible) { // HospID ?>
	<?php if ($pharmacy_purchase_request->sortUrl($pharmacy_purchase_request->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $pharmacy_purchase_request->HospID->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_HospID" class="pharmacy_purchase_request_HospID"><div class="ew-table-header-caption"><?php echo $pharmacy_purchase_request->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $pharmacy_purchase_request->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_purchase_request->SortUrl($pharmacy_purchase_request->HospID) ?>',1);"><div id="elh_pharmacy_purchase_request_HospID" class="pharmacy_purchase_request_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_purchase_request->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request->createdby->Visible) { // createdby ?>
	<?php if ($pharmacy_purchase_request->sortUrl($pharmacy_purchase_request->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $pharmacy_purchase_request->createdby->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_createdby" class="pharmacy_purchase_request_createdby"><div class="ew-table-header-caption"><?php echo $pharmacy_purchase_request->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $pharmacy_purchase_request->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_purchase_request->SortUrl($pharmacy_purchase_request->createdby) ?>',1);"><div id="elh_pharmacy_purchase_request_createdby" class="pharmacy_purchase_request_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request->createdby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_purchase_request->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request->createddatetime->Visible) { // createddatetime ?>
	<?php if ($pharmacy_purchase_request->sortUrl($pharmacy_purchase_request->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $pharmacy_purchase_request->createddatetime->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_createddatetime" class="pharmacy_purchase_request_createddatetime"><div class="ew-table-header-caption"><?php echo $pharmacy_purchase_request->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $pharmacy_purchase_request->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_purchase_request->SortUrl($pharmacy_purchase_request->createddatetime) ?>',1);"><div id="elh_pharmacy_purchase_request_createddatetime" class="pharmacy_purchase_request_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_purchase_request->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request->modifiedby->Visible) { // modifiedby ?>
	<?php if ($pharmacy_purchase_request->sortUrl($pharmacy_purchase_request->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $pharmacy_purchase_request->modifiedby->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_modifiedby" class="pharmacy_purchase_request_modifiedby"><div class="ew-table-header-caption"><?php echo $pharmacy_purchase_request->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $pharmacy_purchase_request->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_purchase_request->SortUrl($pharmacy_purchase_request->modifiedby) ?>',1);"><div id="elh_pharmacy_purchase_request_modifiedby" class="pharmacy_purchase_request_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request->modifiedby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_purchase_request->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($pharmacy_purchase_request->sortUrl($pharmacy_purchase_request->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $pharmacy_purchase_request->modifieddatetime->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_modifieddatetime" class="pharmacy_purchase_request_modifieddatetime"><div class="ew-table-header-caption"><?php echo $pharmacy_purchase_request->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $pharmacy_purchase_request->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_purchase_request->SortUrl($pharmacy_purchase_request->modifieddatetime) ?>',1);"><div id="elh_pharmacy_purchase_request_modifieddatetime" class="pharmacy_purchase_request_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_purchase_request->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pharmacy_purchase_request->BRCODE->Visible) { // BRCODE ?>
	<?php if ($pharmacy_purchase_request->sortUrl($pharmacy_purchase_request->BRCODE) == "") { ?>
		<th data-name="BRCODE" class="<?php echo $pharmacy_purchase_request->BRCODE->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_BRCODE" class="pharmacy_purchase_request_BRCODE"><div class="ew-table-header-caption"><?php echo $pharmacy_purchase_request->BRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BRCODE" class="<?php echo $pharmacy_purchase_request->BRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $pharmacy_purchase_request->SortUrl($pharmacy_purchase_request->BRCODE) ?>',1);"><div id="elh_pharmacy_purchase_request_BRCODE" class="pharmacy_purchase_request_BRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pharmacy_purchase_request->BRCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($pharmacy_purchase_request->BRCODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($pharmacy_purchase_request->BRCODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pharmacy_purchase_request_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($pharmacy_purchase_request->ExportAll && $pharmacy_purchase_request->isExport()) {
	$pharmacy_purchase_request_list->StopRec = $pharmacy_purchase_request_list->TotalRecs;
} else {

	// Set the last record to display
	if ($pharmacy_purchase_request_list->TotalRecs > $pharmacy_purchase_request_list->StartRec + $pharmacy_purchase_request_list->DisplayRecs - 1)
		$pharmacy_purchase_request_list->StopRec = $pharmacy_purchase_request_list->StartRec + $pharmacy_purchase_request_list->DisplayRecs - 1;
	else
		$pharmacy_purchase_request_list->StopRec = $pharmacy_purchase_request_list->TotalRecs;
}
$pharmacy_purchase_request_list->RecCnt = $pharmacy_purchase_request_list->StartRec - 1;
if ($pharmacy_purchase_request_list->Recordset && !$pharmacy_purchase_request_list->Recordset->EOF) {
	$pharmacy_purchase_request_list->Recordset->moveFirst();
	$selectLimit = $pharmacy_purchase_request_list->UseSelectLimit;
	if (!$selectLimit && $pharmacy_purchase_request_list->StartRec > 1)
		$pharmacy_purchase_request_list->Recordset->move($pharmacy_purchase_request_list->StartRec - 1);
} elseif (!$pharmacy_purchase_request->AllowAddDeleteRow && $pharmacy_purchase_request_list->StopRec == 0) {
	$pharmacy_purchase_request_list->StopRec = $pharmacy_purchase_request->GridAddRowCount;
}

// Initialize aggregate
$pharmacy_purchase_request->RowType = ROWTYPE_AGGREGATEINIT;
$pharmacy_purchase_request->resetAttributes();
$pharmacy_purchase_request_list->renderRow();
while ($pharmacy_purchase_request_list->RecCnt < $pharmacy_purchase_request_list->StopRec) {
	$pharmacy_purchase_request_list->RecCnt++;
	if ($pharmacy_purchase_request_list->RecCnt >= $pharmacy_purchase_request_list->StartRec) {
		$pharmacy_purchase_request_list->RowCnt++;

		// Set up key count
		$pharmacy_purchase_request_list->KeyCount = $pharmacy_purchase_request_list->RowIndex;

		// Init row class and style
		$pharmacy_purchase_request->resetAttributes();
		$pharmacy_purchase_request->CssClass = "";
		if ($pharmacy_purchase_request->isGridAdd()) {
		} else {
			$pharmacy_purchase_request_list->loadRowValues($pharmacy_purchase_request_list->Recordset); // Load row values
		}
		$pharmacy_purchase_request->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$pharmacy_purchase_request->RowAttrs = array_merge($pharmacy_purchase_request->RowAttrs, array('data-rowindex'=>$pharmacy_purchase_request_list->RowCnt, 'id'=>'r' . $pharmacy_purchase_request_list->RowCnt . '_pharmacy_purchase_request', 'data-rowtype'=>$pharmacy_purchase_request->RowType));

		// Render row
		$pharmacy_purchase_request_list->renderRow();

		// Render list options
		$pharmacy_purchase_request_list->renderListOptions();
?>
	<tr<?php echo $pharmacy_purchase_request->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pharmacy_purchase_request_list->ListOptions->render("body", "left", $pharmacy_purchase_request_list->RowCnt);
?>
	<?php if ($pharmacy_purchase_request->id->Visible) { // id ?>
		<td data-name="id"<?php echo $pharmacy_purchase_request->id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchase_request_list->RowCnt ?>_pharmacy_purchase_request_id" class="pharmacy_purchase_request_id">
<span<?php echo $pharmacy_purchase_request->id->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request->DT->Visible) { // DT ?>
		<td data-name="DT"<?php echo $pharmacy_purchase_request->DT->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchase_request_list->RowCnt ?>_pharmacy_purchase_request_DT" class="pharmacy_purchase_request_DT">
<span<?php echo $pharmacy_purchase_request->DT->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request->DT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request->EmployeeName->Visible) { // EmployeeName ?>
		<td data-name="EmployeeName"<?php echo $pharmacy_purchase_request->EmployeeName->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchase_request_list->RowCnt ?>_pharmacy_purchase_request_EmployeeName" class="pharmacy_purchase_request_EmployeeName">
<span<?php echo $pharmacy_purchase_request->EmployeeName->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request->EmployeeName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request->Department->Visible) { // Department ?>
		<td data-name="Department"<?php echo $pharmacy_purchase_request->Department->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchase_request_list->RowCnt ?>_pharmacy_purchase_request_Department" class="pharmacy_purchase_request_Department">
<span<?php echo $pharmacy_purchase_request->Department->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request->Department->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request->ApprovedStatus->Visible) { // ApprovedStatus ?>
		<td data-name="ApprovedStatus"<?php echo $pharmacy_purchase_request->ApprovedStatus->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchase_request_list->RowCnt ?>_pharmacy_purchase_request_ApprovedStatus" class="pharmacy_purchase_request_ApprovedStatus">
<span<?php echo $pharmacy_purchase_request->ApprovedStatus->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request->ApprovedStatus->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request->PurchaseStatus->Visible) { // PurchaseStatus ?>
		<td data-name="PurchaseStatus"<?php echo $pharmacy_purchase_request->PurchaseStatus->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchase_request_list->RowCnt ?>_pharmacy_purchase_request_PurchaseStatus" class="pharmacy_purchase_request_PurchaseStatus">
<span<?php echo $pharmacy_purchase_request->PurchaseStatus->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request->PurchaseStatus->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $pharmacy_purchase_request->HospID->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchase_request_list->RowCnt ?>_pharmacy_purchase_request_HospID" class="pharmacy_purchase_request_HospID">
<span<?php echo $pharmacy_purchase_request->HospID->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $pharmacy_purchase_request->createdby->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchase_request_list->RowCnt ?>_pharmacy_purchase_request_createdby" class="pharmacy_purchase_request_createdby">
<span<?php echo $pharmacy_purchase_request->createdby->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $pharmacy_purchase_request->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchase_request_list->RowCnt ?>_pharmacy_purchase_request_createddatetime" class="pharmacy_purchase_request_createddatetime">
<span<?php echo $pharmacy_purchase_request->createddatetime->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $pharmacy_purchase_request->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchase_request_list->RowCnt ?>_pharmacy_purchase_request_modifiedby" class="pharmacy_purchase_request_modifiedby">
<span<?php echo $pharmacy_purchase_request->modifiedby->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $pharmacy_purchase_request->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchase_request_list->RowCnt ?>_pharmacy_purchase_request_modifieddatetime" class="pharmacy_purchase_request_modifieddatetime">
<span<?php echo $pharmacy_purchase_request->modifieddatetime->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pharmacy_purchase_request->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE"<?php echo $pharmacy_purchase_request->BRCODE->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchase_request_list->RowCnt ?>_pharmacy_purchase_request_BRCODE" class="pharmacy_purchase_request_BRCODE">
<span<?php echo $pharmacy_purchase_request->BRCODE->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request->BRCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pharmacy_purchase_request_list->ListOptions->render("body", "right", $pharmacy_purchase_request_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$pharmacy_purchase_request->isGridAdd())
		$pharmacy_purchase_request_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$pharmacy_purchase_request->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pharmacy_purchase_request_list->Recordset)
	$pharmacy_purchase_request_list->Recordset->Close();
?>
<?php if (!$pharmacy_purchase_request->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$pharmacy_purchase_request->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($pharmacy_purchase_request_list->Pager)) $pharmacy_purchase_request_list->Pager = new NumericPager($pharmacy_purchase_request_list->StartRec, $pharmacy_purchase_request_list->DisplayRecs, $pharmacy_purchase_request_list->TotalRecs, $pharmacy_purchase_request_list->RecRange, $pharmacy_purchase_request_list->AutoHidePager) ?>
<?php if ($pharmacy_purchase_request_list->Pager->RecordCount > 0 && $pharmacy_purchase_request_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($pharmacy_purchase_request_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_purchase_request_list->pageUrl() ?>start=<?php echo $pharmacy_purchase_request_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_purchase_request_list->pageUrl() ?>start=<?php echo $pharmacy_purchase_request_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($pharmacy_purchase_request_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $pharmacy_purchase_request_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_purchase_request_list->pageUrl() ?>start=<?php echo $pharmacy_purchase_request_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($pharmacy_purchase_request_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $pharmacy_purchase_request_list->pageUrl() ?>start=<?php echo $pharmacy_purchase_request_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($pharmacy_purchase_request_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $pharmacy_purchase_request_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $pharmacy_purchase_request_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $pharmacy_purchase_request_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($pharmacy_purchase_request_list->TotalRecs > 0 && (!$pharmacy_purchase_request_list->AutoHidePageSizeSelector || $pharmacy_purchase_request_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="pharmacy_purchase_request">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($pharmacy_purchase_request_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($pharmacy_purchase_request_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($pharmacy_purchase_request_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($pharmacy_purchase_request_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($pharmacy_purchase_request_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($pharmacy_purchase_request_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($pharmacy_purchase_request->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pharmacy_purchase_request_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pharmacy_purchase_request_list->TotalRecs == 0 && !$pharmacy_purchase_request->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pharmacy_purchase_request_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$pharmacy_purchase_request_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_purchase_request->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$pharmacy_purchase_request->isExport()) { ?>
<script>
ew.scrollableTable("gmp_pharmacy_purchase_request", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$pharmacy_purchase_request_list->terminate();
?>