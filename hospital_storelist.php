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
$hospital_store_list = new hospital_store_list();

// Run the page
$hospital_store_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hospital_store_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$hospital_store->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fhospital_storelist = currentForm = new ew.Form("fhospital_storelist", "list");
fhospital_storelist.formKeyCountName = '<?php echo $hospital_store_list->FormKeyCountName ?>';

// Form_CustomValidate event
fhospital_storelist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhospital_storelist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fhospital_storelist.lists["x_status"] = <?php echo $hospital_store_list->status->Lookup->toClientList() ?>;
fhospital_storelist.lists["x_status"].options = <?php echo JsonEncode($hospital_store_list->status->lookupOptions()) ?>;
fhospital_storelist.lists["x_HospId"] = <?php echo $hospital_store_list->HospId->Lookup->toClientList() ?>;
fhospital_storelist.lists["x_HospId"].options = <?php echo JsonEncode($hospital_store_list->HospId->lookupOptions()) ?>;

// Form object for search
var fhospital_storelistsrch = currentSearchForm = new ew.Form("fhospital_storelistsrch");

// Filters
fhospital_storelistsrch.filterList = <?php echo $hospital_store_list->getFilterList() ?>;
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
<?php if (!$hospital_store->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($hospital_store_list->TotalRecs > 0 && $hospital_store_list->ExportOptions->visible()) { ?>
<?php $hospital_store_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($hospital_store_list->ImportOptions->visible()) { ?>
<?php $hospital_store_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($hospital_store_list->SearchOptions->visible()) { ?>
<?php $hospital_store_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($hospital_store_list->FilterOptions->visible()) { ?>
<?php $hospital_store_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$hospital_store_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$hospital_store->isExport() && !$hospital_store->CurrentAction) { ?>
<form name="fhospital_storelistsrch" id="fhospital_storelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($hospital_store_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fhospital_storelistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="hospital_store">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($hospital_store_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($hospital_store_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $hospital_store_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($hospital_store_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($hospital_store_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($hospital_store_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($hospital_store_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $hospital_store_list->showPageHeader(); ?>
<?php
$hospital_store_list->showMessage();
?>
<?php if ($hospital_store_list->TotalRecs > 0 || $hospital_store->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($hospital_store_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> hospital_store">
<?php if (!$hospital_store->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$hospital_store->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($hospital_store_list->Pager)) $hospital_store_list->Pager = new NumericPager($hospital_store_list->StartRec, $hospital_store_list->DisplayRecs, $hospital_store_list->TotalRecs, $hospital_store_list->RecRange, $hospital_store_list->AutoHidePager) ?>
<?php if ($hospital_store_list->Pager->RecordCount > 0 && $hospital_store_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($hospital_store_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hospital_store_list->pageUrl() ?>start=<?php echo $hospital_store_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($hospital_store_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hospital_store_list->pageUrl() ?>start=<?php echo $hospital_store_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($hospital_store_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $hospital_store_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($hospital_store_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hospital_store_list->pageUrl() ?>start=<?php echo $hospital_store_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($hospital_store_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hospital_store_list->pageUrl() ?>start=<?php echo $hospital_store_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($hospital_store_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $hospital_store_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $hospital_store_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $hospital_store_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($hospital_store_list->TotalRecs > 0 && (!$hospital_store_list->AutoHidePageSizeSelector || $hospital_store_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="hospital_store">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($hospital_store_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($hospital_store_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($hospital_store_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($hospital_store_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($hospital_store_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($hospital_store_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($hospital_store->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $hospital_store_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fhospital_storelist" id="fhospital_storelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hospital_store_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hospital_store_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hospital_store">
<div id="gmp_hospital_store" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($hospital_store_list->TotalRecs > 0 || $hospital_store->isGridEdit()) { ?>
<table id="tbl_hospital_storelist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$hospital_store_list->RowType = ROWTYPE_HEADER;

// Render list options
$hospital_store_list->renderListOptions();

// Render list options (header, left)
$hospital_store_list->ListOptions->render("header", "left");
?>
<?php if ($hospital_store->id->Visible) { // id ?>
	<?php if ($hospital_store->sortUrl($hospital_store->id) == "") { ?>
		<th data-name="id" class="<?php echo $hospital_store->id->headerCellClass() ?>"><div id="elh_hospital_store_id" class="hospital_store_id"><div class="ew-table-header-caption"><?php echo $hospital_store->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $hospital_store->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hospital_store->SortUrl($hospital_store->id) ?>',1);"><div id="elh_hospital_store_id" class="hospital_store_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital_store->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($hospital_store->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hospital_store->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospital_store->pharmacy->Visible) { // pharmacy ?>
	<?php if ($hospital_store->sortUrl($hospital_store->pharmacy) == "") { ?>
		<th data-name="pharmacy" class="<?php echo $hospital_store->pharmacy->headerCellClass() ?>"><div id="elh_hospital_store_pharmacy" class="hospital_store_pharmacy"><div class="ew-table-header-caption"><?php echo $hospital_store->pharmacy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pharmacy" class="<?php echo $hospital_store->pharmacy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hospital_store->SortUrl($hospital_store->pharmacy) ?>',1);"><div id="elh_hospital_store_pharmacy" class="hospital_store_pharmacy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital_store->pharmacy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hospital_store->pharmacy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hospital_store->pharmacy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospital_store->street->Visible) { // street ?>
	<?php if ($hospital_store->sortUrl($hospital_store->street) == "") { ?>
		<th data-name="street" class="<?php echo $hospital_store->street->headerCellClass() ?>"><div id="elh_hospital_store_street" class="hospital_store_street"><div class="ew-table-header-caption"><?php echo $hospital_store->street->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="street" class="<?php echo $hospital_store->street->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hospital_store->SortUrl($hospital_store->street) ?>',1);"><div id="elh_hospital_store_street" class="hospital_store_street">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital_store->street->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hospital_store->street->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hospital_store->street->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospital_store->area->Visible) { // area ?>
	<?php if ($hospital_store->sortUrl($hospital_store->area) == "") { ?>
		<th data-name="area" class="<?php echo $hospital_store->area->headerCellClass() ?>"><div id="elh_hospital_store_area" class="hospital_store_area"><div class="ew-table-header-caption"><?php echo $hospital_store->area->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="area" class="<?php echo $hospital_store->area->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hospital_store->SortUrl($hospital_store->area) ?>',1);"><div id="elh_hospital_store_area" class="hospital_store_area">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital_store->area->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hospital_store->area->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hospital_store->area->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospital_store->town->Visible) { // town ?>
	<?php if ($hospital_store->sortUrl($hospital_store->town) == "") { ?>
		<th data-name="town" class="<?php echo $hospital_store->town->headerCellClass() ?>"><div id="elh_hospital_store_town" class="hospital_store_town"><div class="ew-table-header-caption"><?php echo $hospital_store->town->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="town" class="<?php echo $hospital_store->town->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hospital_store->SortUrl($hospital_store->town) ?>',1);"><div id="elh_hospital_store_town" class="hospital_store_town">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital_store->town->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hospital_store->town->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hospital_store->town->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospital_store->province->Visible) { // province ?>
	<?php if ($hospital_store->sortUrl($hospital_store->province) == "") { ?>
		<th data-name="province" class="<?php echo $hospital_store->province->headerCellClass() ?>"><div id="elh_hospital_store_province" class="hospital_store_province"><div class="ew-table-header-caption"><?php echo $hospital_store->province->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="province" class="<?php echo $hospital_store->province->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hospital_store->SortUrl($hospital_store->province) ?>',1);"><div id="elh_hospital_store_province" class="hospital_store_province">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital_store->province->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hospital_store->province->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hospital_store->province->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospital_store->postal_code->Visible) { // postal_code ?>
	<?php if ($hospital_store->sortUrl($hospital_store->postal_code) == "") { ?>
		<th data-name="postal_code" class="<?php echo $hospital_store->postal_code->headerCellClass() ?>"><div id="elh_hospital_store_postal_code" class="hospital_store_postal_code"><div class="ew-table-header-caption"><?php echo $hospital_store->postal_code->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="postal_code" class="<?php echo $hospital_store->postal_code->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hospital_store->SortUrl($hospital_store->postal_code) ?>',1);"><div id="elh_hospital_store_postal_code" class="hospital_store_postal_code">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital_store->postal_code->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hospital_store->postal_code->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hospital_store->postal_code->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospital_store->phone_no->Visible) { // phone_no ?>
	<?php if ($hospital_store->sortUrl($hospital_store->phone_no) == "") { ?>
		<th data-name="phone_no" class="<?php echo $hospital_store->phone_no->headerCellClass() ?>"><div id="elh_hospital_store_phone_no" class="hospital_store_phone_no"><div class="ew-table-header-caption"><?php echo $hospital_store->phone_no->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="phone_no" class="<?php echo $hospital_store->phone_no->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hospital_store->SortUrl($hospital_store->phone_no) ?>',1);"><div id="elh_hospital_store_phone_no" class="hospital_store_phone_no">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital_store->phone_no->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hospital_store->phone_no->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hospital_store->phone_no->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospital_store->PreFixCode->Visible) { // PreFixCode ?>
	<?php if ($hospital_store->sortUrl($hospital_store->PreFixCode) == "") { ?>
		<th data-name="PreFixCode" class="<?php echo $hospital_store->PreFixCode->headerCellClass() ?>"><div id="elh_hospital_store_PreFixCode" class="hospital_store_PreFixCode"><div class="ew-table-header-caption"><?php echo $hospital_store->PreFixCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PreFixCode" class="<?php echo $hospital_store->PreFixCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hospital_store->SortUrl($hospital_store->PreFixCode) ?>',1);"><div id="elh_hospital_store_PreFixCode" class="hospital_store_PreFixCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital_store->PreFixCode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hospital_store->PreFixCode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hospital_store->PreFixCode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospital_store->status->Visible) { // status ?>
	<?php if ($hospital_store->sortUrl($hospital_store->status) == "") { ?>
		<th data-name="status" class="<?php echo $hospital_store->status->headerCellClass() ?>"><div id="elh_hospital_store_status" class="hospital_store_status"><div class="ew-table-header-caption"><?php echo $hospital_store->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $hospital_store->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hospital_store->SortUrl($hospital_store->status) ?>',1);"><div id="elh_hospital_store_status" class="hospital_store_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital_store->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($hospital_store->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hospital_store->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospital_store->createdby->Visible) { // createdby ?>
	<?php if ($hospital_store->sortUrl($hospital_store->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $hospital_store->createdby->headerCellClass() ?>"><div id="elh_hospital_store_createdby" class="hospital_store_createdby"><div class="ew-table-header-caption"><?php echo $hospital_store->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $hospital_store->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hospital_store->SortUrl($hospital_store->createdby) ?>',1);"><div id="elh_hospital_store_createdby" class="hospital_store_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital_store->createdby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hospital_store->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hospital_store->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospital_store->createddatetime->Visible) { // createddatetime ?>
	<?php if ($hospital_store->sortUrl($hospital_store->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $hospital_store->createddatetime->headerCellClass() ?>"><div id="elh_hospital_store_createddatetime" class="hospital_store_createddatetime"><div class="ew-table-header-caption"><?php echo $hospital_store->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $hospital_store->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hospital_store->SortUrl($hospital_store->createddatetime) ?>',1);"><div id="elh_hospital_store_createddatetime" class="hospital_store_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital_store->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($hospital_store->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hospital_store->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospital_store->modifiedby->Visible) { // modifiedby ?>
	<?php if ($hospital_store->sortUrl($hospital_store->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $hospital_store->modifiedby->headerCellClass() ?>"><div id="elh_hospital_store_modifiedby" class="hospital_store_modifiedby"><div class="ew-table-header-caption"><?php echo $hospital_store->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $hospital_store->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hospital_store->SortUrl($hospital_store->modifiedby) ?>',1);"><div id="elh_hospital_store_modifiedby" class="hospital_store_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital_store->modifiedby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hospital_store->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hospital_store->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospital_store->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($hospital_store->sortUrl($hospital_store->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $hospital_store->modifieddatetime->headerCellClass() ?>"><div id="elh_hospital_store_modifieddatetime" class="hospital_store_modifieddatetime"><div class="ew-table-header-caption"><?php echo $hospital_store->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $hospital_store->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hospital_store->SortUrl($hospital_store->modifieddatetime) ?>',1);"><div id="elh_hospital_store_modifieddatetime" class="hospital_store_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital_store->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($hospital_store->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hospital_store->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospital_store->pharmacyGST->Visible) { // pharmacyGST ?>
	<?php if ($hospital_store->sortUrl($hospital_store->pharmacyGST) == "") { ?>
		<th data-name="pharmacyGST" class="<?php echo $hospital_store->pharmacyGST->headerCellClass() ?>"><div id="elh_hospital_store_pharmacyGST" class="hospital_store_pharmacyGST"><div class="ew-table-header-caption"><?php echo $hospital_store->pharmacyGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pharmacyGST" class="<?php echo $hospital_store->pharmacyGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hospital_store->SortUrl($hospital_store->pharmacyGST) ?>',1);"><div id="elh_hospital_store_pharmacyGST" class="hospital_store_pharmacyGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital_store->pharmacyGST->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hospital_store->pharmacyGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hospital_store->pharmacyGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospital_store->HospId->Visible) { // HospId ?>
	<?php if ($hospital_store->sortUrl($hospital_store->HospId) == "") { ?>
		<th data-name="HospId" class="<?php echo $hospital_store->HospId->headerCellClass() ?>"><div id="elh_hospital_store_HospId" class="hospital_store_HospId"><div class="ew-table-header-caption"><?php echo $hospital_store->HospId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospId" class="<?php echo $hospital_store->HospId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hospital_store->SortUrl($hospital_store->HospId) ?>',1);"><div id="elh_hospital_store_HospId" class="hospital_store_HospId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital_store->HospId->caption() ?></span><span class="ew-table-header-sort"><?php if ($hospital_store->HospId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hospital_store->HospId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospital_store->BranchID->Visible) { // BranchID ?>
	<?php if ($hospital_store->sortUrl($hospital_store->BranchID) == "") { ?>
		<th data-name="BranchID" class="<?php echo $hospital_store->BranchID->headerCellClass() ?>"><div id="elh_hospital_store_BranchID" class="hospital_store_BranchID"><div class="ew-table-header-caption"><?php echo $hospital_store->BranchID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BranchID" class="<?php echo $hospital_store->BranchID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hospital_store->SortUrl($hospital_store->BranchID) ?>',1);"><div id="elh_hospital_store_BranchID" class="hospital_store_BranchID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital_store->BranchID->caption() ?></span><span class="ew-table-header-sort"><?php if ($hospital_store->BranchID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hospital_store->BranchID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$hospital_store_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($hospital_store->ExportAll && $hospital_store->isExport()) {
	$hospital_store_list->StopRec = $hospital_store_list->TotalRecs;
} else {

	// Set the last record to display
	if ($hospital_store_list->TotalRecs > $hospital_store_list->StartRec + $hospital_store_list->DisplayRecs - 1)
		$hospital_store_list->StopRec = $hospital_store_list->StartRec + $hospital_store_list->DisplayRecs - 1;
	else
		$hospital_store_list->StopRec = $hospital_store_list->TotalRecs;
}
$hospital_store_list->RecCnt = $hospital_store_list->StartRec - 1;
if ($hospital_store_list->Recordset && !$hospital_store_list->Recordset->EOF) {
	$hospital_store_list->Recordset->moveFirst();
	$selectLimit = $hospital_store_list->UseSelectLimit;
	if (!$selectLimit && $hospital_store_list->StartRec > 1)
		$hospital_store_list->Recordset->move($hospital_store_list->StartRec - 1);
} elseif (!$hospital_store->AllowAddDeleteRow && $hospital_store_list->StopRec == 0) {
	$hospital_store_list->StopRec = $hospital_store->GridAddRowCount;
}

// Initialize aggregate
$hospital_store->RowType = ROWTYPE_AGGREGATEINIT;
$hospital_store->resetAttributes();
$hospital_store_list->renderRow();
while ($hospital_store_list->RecCnt < $hospital_store_list->StopRec) {
	$hospital_store_list->RecCnt++;
	if ($hospital_store_list->RecCnt >= $hospital_store_list->StartRec) {
		$hospital_store_list->RowCnt++;

		// Set up key count
		$hospital_store_list->KeyCount = $hospital_store_list->RowIndex;

		// Init row class and style
		$hospital_store->resetAttributes();
		$hospital_store->CssClass = "";
		if ($hospital_store->isGridAdd()) {
		} else {
			$hospital_store_list->loadRowValues($hospital_store_list->Recordset); // Load row values
		}
		$hospital_store->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$hospital_store->RowAttrs = array_merge($hospital_store->RowAttrs, array('data-rowindex'=>$hospital_store_list->RowCnt, 'id'=>'r' . $hospital_store_list->RowCnt . '_hospital_store', 'data-rowtype'=>$hospital_store->RowType));

		// Render row
		$hospital_store_list->renderRow();

		// Render list options
		$hospital_store_list->renderListOptions();
?>
	<tr<?php echo $hospital_store->rowAttributes() ?>>
<?php

// Render list options (body, left)
$hospital_store_list->ListOptions->render("body", "left", $hospital_store_list->RowCnt);
?>
	<?php if ($hospital_store->id->Visible) { // id ?>
		<td data-name="id"<?php echo $hospital_store->id->cellAttributes() ?>>
<span id="el<?php echo $hospital_store_list->RowCnt ?>_hospital_store_id" class="hospital_store_id">
<span<?php echo $hospital_store->id->viewAttributes() ?>>
<?php echo $hospital_store->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospital_store->pharmacy->Visible) { // pharmacy ?>
		<td data-name="pharmacy"<?php echo $hospital_store->pharmacy->cellAttributes() ?>>
<span id="el<?php echo $hospital_store_list->RowCnt ?>_hospital_store_pharmacy" class="hospital_store_pharmacy">
<span<?php echo $hospital_store->pharmacy->viewAttributes() ?>>
<?php echo $hospital_store->pharmacy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospital_store->street->Visible) { // street ?>
		<td data-name="street"<?php echo $hospital_store->street->cellAttributes() ?>>
<span id="el<?php echo $hospital_store_list->RowCnt ?>_hospital_store_street" class="hospital_store_street">
<span<?php echo $hospital_store->street->viewAttributes() ?>>
<?php echo $hospital_store->street->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospital_store->area->Visible) { // area ?>
		<td data-name="area"<?php echo $hospital_store->area->cellAttributes() ?>>
<span id="el<?php echo $hospital_store_list->RowCnt ?>_hospital_store_area" class="hospital_store_area">
<span<?php echo $hospital_store->area->viewAttributes() ?>>
<?php echo $hospital_store->area->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospital_store->town->Visible) { // town ?>
		<td data-name="town"<?php echo $hospital_store->town->cellAttributes() ?>>
<span id="el<?php echo $hospital_store_list->RowCnt ?>_hospital_store_town" class="hospital_store_town">
<span<?php echo $hospital_store->town->viewAttributes() ?>>
<?php echo $hospital_store->town->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospital_store->province->Visible) { // province ?>
		<td data-name="province"<?php echo $hospital_store->province->cellAttributes() ?>>
<span id="el<?php echo $hospital_store_list->RowCnt ?>_hospital_store_province" class="hospital_store_province">
<span<?php echo $hospital_store->province->viewAttributes() ?>>
<?php echo $hospital_store->province->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospital_store->postal_code->Visible) { // postal_code ?>
		<td data-name="postal_code"<?php echo $hospital_store->postal_code->cellAttributes() ?>>
<span id="el<?php echo $hospital_store_list->RowCnt ?>_hospital_store_postal_code" class="hospital_store_postal_code">
<span<?php echo $hospital_store->postal_code->viewAttributes() ?>>
<?php echo $hospital_store->postal_code->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospital_store->phone_no->Visible) { // phone_no ?>
		<td data-name="phone_no"<?php echo $hospital_store->phone_no->cellAttributes() ?>>
<span id="el<?php echo $hospital_store_list->RowCnt ?>_hospital_store_phone_no" class="hospital_store_phone_no">
<span<?php echo $hospital_store->phone_no->viewAttributes() ?>>
<?php echo $hospital_store->phone_no->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospital_store->PreFixCode->Visible) { // PreFixCode ?>
		<td data-name="PreFixCode"<?php echo $hospital_store->PreFixCode->cellAttributes() ?>>
<span id="el<?php echo $hospital_store_list->RowCnt ?>_hospital_store_PreFixCode" class="hospital_store_PreFixCode">
<span<?php echo $hospital_store->PreFixCode->viewAttributes() ?>>
<?php echo $hospital_store->PreFixCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospital_store->status->Visible) { // status ?>
		<td data-name="status"<?php echo $hospital_store->status->cellAttributes() ?>>
<span id="el<?php echo $hospital_store_list->RowCnt ?>_hospital_store_status" class="hospital_store_status">
<span<?php echo $hospital_store->status->viewAttributes() ?>>
<?php echo $hospital_store->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospital_store->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $hospital_store->createdby->cellAttributes() ?>>
<span id="el<?php echo $hospital_store_list->RowCnt ?>_hospital_store_createdby" class="hospital_store_createdby">
<span<?php echo $hospital_store->createdby->viewAttributes() ?>>
<?php echo $hospital_store->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospital_store->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $hospital_store->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $hospital_store_list->RowCnt ?>_hospital_store_createddatetime" class="hospital_store_createddatetime">
<span<?php echo $hospital_store->createddatetime->viewAttributes() ?>>
<?php echo $hospital_store->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospital_store->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $hospital_store->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $hospital_store_list->RowCnt ?>_hospital_store_modifiedby" class="hospital_store_modifiedby">
<span<?php echo $hospital_store->modifiedby->viewAttributes() ?>>
<?php echo $hospital_store->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospital_store->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $hospital_store->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $hospital_store_list->RowCnt ?>_hospital_store_modifieddatetime" class="hospital_store_modifieddatetime">
<span<?php echo $hospital_store->modifieddatetime->viewAttributes() ?>>
<?php echo $hospital_store->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospital_store->pharmacyGST->Visible) { // pharmacyGST ?>
		<td data-name="pharmacyGST"<?php echo $hospital_store->pharmacyGST->cellAttributes() ?>>
<span id="el<?php echo $hospital_store_list->RowCnt ?>_hospital_store_pharmacyGST" class="hospital_store_pharmacyGST">
<span<?php echo $hospital_store->pharmacyGST->viewAttributes() ?>>
<?php echo $hospital_store->pharmacyGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospital_store->HospId->Visible) { // HospId ?>
		<td data-name="HospId"<?php echo $hospital_store->HospId->cellAttributes() ?>>
<span id="el<?php echo $hospital_store_list->RowCnt ?>_hospital_store_HospId" class="hospital_store_HospId">
<span<?php echo $hospital_store->HospId->viewAttributes() ?>>
<?php echo $hospital_store->HospId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospital_store->BranchID->Visible) { // BranchID ?>
		<td data-name="BranchID"<?php echo $hospital_store->BranchID->cellAttributes() ?>>
<span id="el<?php echo $hospital_store_list->RowCnt ?>_hospital_store_BranchID" class="hospital_store_BranchID">
<span<?php echo $hospital_store->BranchID->viewAttributes() ?>>
<?php echo $hospital_store->BranchID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$hospital_store_list->ListOptions->render("body", "right", $hospital_store_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$hospital_store->isGridAdd())
		$hospital_store_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$hospital_store->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($hospital_store_list->Recordset)
	$hospital_store_list->Recordset->Close();
?>
<?php if (!$hospital_store->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$hospital_store->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($hospital_store_list->Pager)) $hospital_store_list->Pager = new NumericPager($hospital_store_list->StartRec, $hospital_store_list->DisplayRecs, $hospital_store_list->TotalRecs, $hospital_store_list->RecRange, $hospital_store_list->AutoHidePager) ?>
<?php if ($hospital_store_list->Pager->RecordCount > 0 && $hospital_store_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($hospital_store_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hospital_store_list->pageUrl() ?>start=<?php echo $hospital_store_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($hospital_store_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hospital_store_list->pageUrl() ?>start=<?php echo $hospital_store_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($hospital_store_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $hospital_store_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($hospital_store_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hospital_store_list->pageUrl() ?>start=<?php echo $hospital_store_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($hospital_store_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hospital_store_list->pageUrl() ?>start=<?php echo $hospital_store_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($hospital_store_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $hospital_store_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $hospital_store_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $hospital_store_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($hospital_store_list->TotalRecs > 0 && (!$hospital_store_list->AutoHidePageSizeSelector || $hospital_store_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="hospital_store">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($hospital_store_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($hospital_store_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($hospital_store_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($hospital_store_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($hospital_store_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($hospital_store_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($hospital_store->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $hospital_store_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($hospital_store_list->TotalRecs == 0 && !$hospital_store->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $hospital_store_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$hospital_store_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$hospital_store->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$hospital_store->isExport()) { ?>
<script>
ew.scrollableTable("gmp_hospital_store", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$hospital_store_list->terminate();
?>