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
$hospital_pharmacy_list = new hospital_pharmacy_list();

// Run the page
$hospital_pharmacy_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hospital_pharmacy_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$hospital_pharmacy->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fhospital_pharmacylist = currentForm = new ew.Form("fhospital_pharmacylist", "list");
fhospital_pharmacylist.formKeyCountName = '<?php echo $hospital_pharmacy_list->FormKeyCountName ?>';

// Form_CustomValidate event
fhospital_pharmacylist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhospital_pharmacylist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fhospital_pharmacylist.lists["x_status"] = <?php echo $hospital_pharmacy_list->status->Lookup->toClientList() ?>;
fhospital_pharmacylist.lists["x_status"].options = <?php echo JsonEncode($hospital_pharmacy_list->status->lookupOptions()) ?>;
fhospital_pharmacylist.lists["x_HospId"] = <?php echo $hospital_pharmacy_list->HospId->Lookup->toClientList() ?>;
fhospital_pharmacylist.lists["x_HospId"].options = <?php echo JsonEncode($hospital_pharmacy_list->HospId->lookupOptions()) ?>;

// Form object for search
var fhospital_pharmacylistsrch = currentSearchForm = new ew.Form("fhospital_pharmacylistsrch");

// Filters
fhospital_pharmacylistsrch.filterList = <?php echo $hospital_pharmacy_list->getFilterList() ?>;
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
<?php if (!$hospital_pharmacy->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($hospital_pharmacy_list->TotalRecs > 0 && $hospital_pharmacy_list->ExportOptions->visible()) { ?>
<?php $hospital_pharmacy_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($hospital_pharmacy_list->ImportOptions->visible()) { ?>
<?php $hospital_pharmacy_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($hospital_pharmacy_list->SearchOptions->visible()) { ?>
<?php $hospital_pharmacy_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($hospital_pharmacy_list->FilterOptions->visible()) { ?>
<?php $hospital_pharmacy_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$hospital_pharmacy_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$hospital_pharmacy->isExport() && !$hospital_pharmacy->CurrentAction) { ?>
<form name="fhospital_pharmacylistsrch" id="fhospital_pharmacylistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($hospital_pharmacy_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fhospital_pharmacylistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="hospital_pharmacy">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($hospital_pharmacy_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($hospital_pharmacy_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $hospital_pharmacy_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($hospital_pharmacy_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($hospital_pharmacy_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($hospital_pharmacy_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($hospital_pharmacy_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $hospital_pharmacy_list->showPageHeader(); ?>
<?php
$hospital_pharmacy_list->showMessage();
?>
<?php if ($hospital_pharmacy_list->TotalRecs > 0 || $hospital_pharmacy->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($hospital_pharmacy_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> hospital_pharmacy">
<?php if (!$hospital_pharmacy->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$hospital_pharmacy->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($hospital_pharmacy_list->Pager)) $hospital_pharmacy_list->Pager = new NumericPager($hospital_pharmacy_list->StartRec, $hospital_pharmacy_list->DisplayRecs, $hospital_pharmacy_list->TotalRecs, $hospital_pharmacy_list->RecRange, $hospital_pharmacy_list->AutoHidePager) ?>
<?php if ($hospital_pharmacy_list->Pager->RecordCount > 0 && $hospital_pharmacy_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($hospital_pharmacy_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hospital_pharmacy_list->pageUrl() ?>start=<?php echo $hospital_pharmacy_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($hospital_pharmacy_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hospital_pharmacy_list->pageUrl() ?>start=<?php echo $hospital_pharmacy_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($hospital_pharmacy_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $hospital_pharmacy_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($hospital_pharmacy_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hospital_pharmacy_list->pageUrl() ?>start=<?php echo $hospital_pharmacy_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($hospital_pharmacy_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hospital_pharmacy_list->pageUrl() ?>start=<?php echo $hospital_pharmacy_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($hospital_pharmacy_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $hospital_pharmacy_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $hospital_pharmacy_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $hospital_pharmacy_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($hospital_pharmacy_list->TotalRecs > 0 && (!$hospital_pharmacy_list->AutoHidePageSizeSelector || $hospital_pharmacy_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="hospital_pharmacy">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($hospital_pharmacy_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($hospital_pharmacy_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($hospital_pharmacy_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($hospital_pharmacy_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($hospital_pharmacy_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($hospital_pharmacy_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($hospital_pharmacy->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $hospital_pharmacy_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fhospital_pharmacylist" id="fhospital_pharmacylist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hospital_pharmacy_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hospital_pharmacy_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hospital_pharmacy">
<div id="gmp_hospital_pharmacy" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($hospital_pharmacy_list->TotalRecs > 0 || $hospital_pharmacy->isGridEdit()) { ?>
<table id="tbl_hospital_pharmacylist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$hospital_pharmacy_list->RowType = ROWTYPE_HEADER;

// Render list options
$hospital_pharmacy_list->renderListOptions();

// Render list options (header, left)
$hospital_pharmacy_list->ListOptions->render("header", "left");
?>
<?php if ($hospital_pharmacy->id->Visible) { // id ?>
	<?php if ($hospital_pharmacy->sortUrl($hospital_pharmacy->id) == "") { ?>
		<th data-name="id" class="<?php echo $hospital_pharmacy->id->headerCellClass() ?>"><div id="elh_hospital_pharmacy_id" class="hospital_pharmacy_id"><div class="ew-table-header-caption"><?php echo $hospital_pharmacy->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $hospital_pharmacy->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hospital_pharmacy->SortUrl($hospital_pharmacy->id) ?>',1);"><div id="elh_hospital_pharmacy_id" class="hospital_pharmacy_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital_pharmacy->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($hospital_pharmacy->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hospital_pharmacy->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospital_pharmacy->pharmacy->Visible) { // pharmacy ?>
	<?php if ($hospital_pharmacy->sortUrl($hospital_pharmacy->pharmacy) == "") { ?>
		<th data-name="pharmacy" class="<?php echo $hospital_pharmacy->pharmacy->headerCellClass() ?>"><div id="elh_hospital_pharmacy_pharmacy" class="hospital_pharmacy_pharmacy"><div class="ew-table-header-caption"><?php echo $hospital_pharmacy->pharmacy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pharmacy" class="<?php echo $hospital_pharmacy->pharmacy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hospital_pharmacy->SortUrl($hospital_pharmacy->pharmacy) ?>',1);"><div id="elh_hospital_pharmacy_pharmacy" class="hospital_pharmacy_pharmacy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital_pharmacy->pharmacy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hospital_pharmacy->pharmacy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hospital_pharmacy->pharmacy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospital_pharmacy->street->Visible) { // street ?>
	<?php if ($hospital_pharmacy->sortUrl($hospital_pharmacy->street) == "") { ?>
		<th data-name="street" class="<?php echo $hospital_pharmacy->street->headerCellClass() ?>"><div id="elh_hospital_pharmacy_street" class="hospital_pharmacy_street"><div class="ew-table-header-caption"><?php echo $hospital_pharmacy->street->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="street" class="<?php echo $hospital_pharmacy->street->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hospital_pharmacy->SortUrl($hospital_pharmacy->street) ?>',1);"><div id="elh_hospital_pharmacy_street" class="hospital_pharmacy_street">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital_pharmacy->street->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hospital_pharmacy->street->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hospital_pharmacy->street->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospital_pharmacy->area->Visible) { // area ?>
	<?php if ($hospital_pharmacy->sortUrl($hospital_pharmacy->area) == "") { ?>
		<th data-name="area" class="<?php echo $hospital_pharmacy->area->headerCellClass() ?>"><div id="elh_hospital_pharmacy_area" class="hospital_pharmacy_area"><div class="ew-table-header-caption"><?php echo $hospital_pharmacy->area->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="area" class="<?php echo $hospital_pharmacy->area->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hospital_pharmacy->SortUrl($hospital_pharmacy->area) ?>',1);"><div id="elh_hospital_pharmacy_area" class="hospital_pharmacy_area">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital_pharmacy->area->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hospital_pharmacy->area->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hospital_pharmacy->area->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospital_pharmacy->town->Visible) { // town ?>
	<?php if ($hospital_pharmacy->sortUrl($hospital_pharmacy->town) == "") { ?>
		<th data-name="town" class="<?php echo $hospital_pharmacy->town->headerCellClass() ?>"><div id="elh_hospital_pharmacy_town" class="hospital_pharmacy_town"><div class="ew-table-header-caption"><?php echo $hospital_pharmacy->town->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="town" class="<?php echo $hospital_pharmacy->town->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hospital_pharmacy->SortUrl($hospital_pharmacy->town) ?>',1);"><div id="elh_hospital_pharmacy_town" class="hospital_pharmacy_town">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital_pharmacy->town->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hospital_pharmacy->town->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hospital_pharmacy->town->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospital_pharmacy->province->Visible) { // province ?>
	<?php if ($hospital_pharmacy->sortUrl($hospital_pharmacy->province) == "") { ?>
		<th data-name="province" class="<?php echo $hospital_pharmacy->province->headerCellClass() ?>"><div id="elh_hospital_pharmacy_province" class="hospital_pharmacy_province"><div class="ew-table-header-caption"><?php echo $hospital_pharmacy->province->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="province" class="<?php echo $hospital_pharmacy->province->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hospital_pharmacy->SortUrl($hospital_pharmacy->province) ?>',1);"><div id="elh_hospital_pharmacy_province" class="hospital_pharmacy_province">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital_pharmacy->province->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hospital_pharmacy->province->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hospital_pharmacy->province->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospital_pharmacy->postal_code->Visible) { // postal_code ?>
	<?php if ($hospital_pharmacy->sortUrl($hospital_pharmacy->postal_code) == "") { ?>
		<th data-name="postal_code" class="<?php echo $hospital_pharmacy->postal_code->headerCellClass() ?>"><div id="elh_hospital_pharmacy_postal_code" class="hospital_pharmacy_postal_code"><div class="ew-table-header-caption"><?php echo $hospital_pharmacy->postal_code->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="postal_code" class="<?php echo $hospital_pharmacy->postal_code->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hospital_pharmacy->SortUrl($hospital_pharmacy->postal_code) ?>',1);"><div id="elh_hospital_pharmacy_postal_code" class="hospital_pharmacy_postal_code">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital_pharmacy->postal_code->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hospital_pharmacy->postal_code->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hospital_pharmacy->postal_code->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospital_pharmacy->phone_no->Visible) { // phone_no ?>
	<?php if ($hospital_pharmacy->sortUrl($hospital_pharmacy->phone_no) == "") { ?>
		<th data-name="phone_no" class="<?php echo $hospital_pharmacy->phone_no->headerCellClass() ?>"><div id="elh_hospital_pharmacy_phone_no" class="hospital_pharmacy_phone_no"><div class="ew-table-header-caption"><?php echo $hospital_pharmacy->phone_no->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="phone_no" class="<?php echo $hospital_pharmacy->phone_no->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hospital_pharmacy->SortUrl($hospital_pharmacy->phone_no) ?>',1);"><div id="elh_hospital_pharmacy_phone_no" class="hospital_pharmacy_phone_no">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital_pharmacy->phone_no->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hospital_pharmacy->phone_no->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hospital_pharmacy->phone_no->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospital_pharmacy->PreFixCode->Visible) { // PreFixCode ?>
	<?php if ($hospital_pharmacy->sortUrl($hospital_pharmacy->PreFixCode) == "") { ?>
		<th data-name="PreFixCode" class="<?php echo $hospital_pharmacy->PreFixCode->headerCellClass() ?>"><div id="elh_hospital_pharmacy_PreFixCode" class="hospital_pharmacy_PreFixCode"><div class="ew-table-header-caption"><?php echo $hospital_pharmacy->PreFixCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PreFixCode" class="<?php echo $hospital_pharmacy->PreFixCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hospital_pharmacy->SortUrl($hospital_pharmacy->PreFixCode) ?>',1);"><div id="elh_hospital_pharmacy_PreFixCode" class="hospital_pharmacy_PreFixCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital_pharmacy->PreFixCode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hospital_pharmacy->PreFixCode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hospital_pharmacy->PreFixCode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospital_pharmacy->status->Visible) { // status ?>
	<?php if ($hospital_pharmacy->sortUrl($hospital_pharmacy->status) == "") { ?>
		<th data-name="status" class="<?php echo $hospital_pharmacy->status->headerCellClass() ?>"><div id="elh_hospital_pharmacy_status" class="hospital_pharmacy_status"><div class="ew-table-header-caption"><?php echo $hospital_pharmacy->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $hospital_pharmacy->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hospital_pharmacy->SortUrl($hospital_pharmacy->status) ?>',1);"><div id="elh_hospital_pharmacy_status" class="hospital_pharmacy_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital_pharmacy->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($hospital_pharmacy->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hospital_pharmacy->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospital_pharmacy->createdby->Visible) { // createdby ?>
	<?php if ($hospital_pharmacy->sortUrl($hospital_pharmacy->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $hospital_pharmacy->createdby->headerCellClass() ?>"><div id="elh_hospital_pharmacy_createdby" class="hospital_pharmacy_createdby"><div class="ew-table-header-caption"><?php echo $hospital_pharmacy->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $hospital_pharmacy->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hospital_pharmacy->SortUrl($hospital_pharmacy->createdby) ?>',1);"><div id="elh_hospital_pharmacy_createdby" class="hospital_pharmacy_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital_pharmacy->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($hospital_pharmacy->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hospital_pharmacy->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospital_pharmacy->createddatetime->Visible) { // createddatetime ?>
	<?php if ($hospital_pharmacy->sortUrl($hospital_pharmacy->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $hospital_pharmacy->createddatetime->headerCellClass() ?>"><div id="elh_hospital_pharmacy_createddatetime" class="hospital_pharmacy_createddatetime"><div class="ew-table-header-caption"><?php echo $hospital_pharmacy->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $hospital_pharmacy->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hospital_pharmacy->SortUrl($hospital_pharmacy->createddatetime) ?>',1);"><div id="elh_hospital_pharmacy_createddatetime" class="hospital_pharmacy_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital_pharmacy->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($hospital_pharmacy->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hospital_pharmacy->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospital_pharmacy->modifiedby->Visible) { // modifiedby ?>
	<?php if ($hospital_pharmacy->sortUrl($hospital_pharmacy->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $hospital_pharmacy->modifiedby->headerCellClass() ?>"><div id="elh_hospital_pharmacy_modifiedby" class="hospital_pharmacy_modifiedby"><div class="ew-table-header-caption"><?php echo $hospital_pharmacy->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $hospital_pharmacy->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hospital_pharmacy->SortUrl($hospital_pharmacy->modifiedby) ?>',1);"><div id="elh_hospital_pharmacy_modifiedby" class="hospital_pharmacy_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital_pharmacy->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($hospital_pharmacy->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hospital_pharmacy->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospital_pharmacy->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($hospital_pharmacy->sortUrl($hospital_pharmacy->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $hospital_pharmacy->modifieddatetime->headerCellClass() ?>"><div id="elh_hospital_pharmacy_modifieddatetime" class="hospital_pharmacy_modifieddatetime"><div class="ew-table-header-caption"><?php echo $hospital_pharmacy->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $hospital_pharmacy->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hospital_pharmacy->SortUrl($hospital_pharmacy->modifieddatetime) ?>',1);"><div id="elh_hospital_pharmacy_modifieddatetime" class="hospital_pharmacy_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital_pharmacy->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($hospital_pharmacy->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hospital_pharmacy->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospital_pharmacy->pharmacyGST->Visible) { // pharmacyGST ?>
	<?php if ($hospital_pharmacy->sortUrl($hospital_pharmacy->pharmacyGST) == "") { ?>
		<th data-name="pharmacyGST" class="<?php echo $hospital_pharmacy->pharmacyGST->headerCellClass() ?>"><div id="elh_hospital_pharmacy_pharmacyGST" class="hospital_pharmacy_pharmacyGST"><div class="ew-table-header-caption"><?php echo $hospital_pharmacy->pharmacyGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pharmacyGST" class="<?php echo $hospital_pharmacy->pharmacyGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hospital_pharmacy->SortUrl($hospital_pharmacy->pharmacyGST) ?>',1);"><div id="elh_hospital_pharmacy_pharmacyGST" class="hospital_pharmacy_pharmacyGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital_pharmacy->pharmacyGST->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hospital_pharmacy->pharmacyGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hospital_pharmacy->pharmacyGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospital_pharmacy->HospId->Visible) { // HospId ?>
	<?php if ($hospital_pharmacy->sortUrl($hospital_pharmacy->HospId) == "") { ?>
		<th data-name="HospId" class="<?php echo $hospital_pharmacy->HospId->headerCellClass() ?>"><div id="elh_hospital_pharmacy_HospId" class="hospital_pharmacy_HospId"><div class="ew-table-header-caption"><?php echo $hospital_pharmacy->HospId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospId" class="<?php echo $hospital_pharmacy->HospId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hospital_pharmacy->SortUrl($hospital_pharmacy->HospId) ?>',1);"><div id="elh_hospital_pharmacy_HospId" class="hospital_pharmacy_HospId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital_pharmacy->HospId->caption() ?></span><span class="ew-table-header-sort"><?php if ($hospital_pharmacy->HospId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hospital_pharmacy->HospId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospital_pharmacy->BranchID->Visible) { // BranchID ?>
	<?php if ($hospital_pharmacy->sortUrl($hospital_pharmacy->BranchID) == "") { ?>
		<th data-name="BranchID" class="<?php echo $hospital_pharmacy->BranchID->headerCellClass() ?>"><div id="elh_hospital_pharmacy_BranchID" class="hospital_pharmacy_BranchID"><div class="ew-table-header-caption"><?php echo $hospital_pharmacy->BranchID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BranchID" class="<?php echo $hospital_pharmacy->BranchID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hospital_pharmacy->SortUrl($hospital_pharmacy->BranchID) ?>',1);"><div id="elh_hospital_pharmacy_BranchID" class="hospital_pharmacy_BranchID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital_pharmacy->BranchID->caption() ?></span><span class="ew-table-header-sort"><?php if ($hospital_pharmacy->BranchID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hospital_pharmacy->BranchID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$hospital_pharmacy_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($hospital_pharmacy->ExportAll && $hospital_pharmacy->isExport()) {
	$hospital_pharmacy_list->StopRec = $hospital_pharmacy_list->TotalRecs;
} else {

	// Set the last record to display
	if ($hospital_pharmacy_list->TotalRecs > $hospital_pharmacy_list->StartRec + $hospital_pharmacy_list->DisplayRecs - 1)
		$hospital_pharmacy_list->StopRec = $hospital_pharmacy_list->StartRec + $hospital_pharmacy_list->DisplayRecs - 1;
	else
		$hospital_pharmacy_list->StopRec = $hospital_pharmacy_list->TotalRecs;
}
$hospital_pharmacy_list->RecCnt = $hospital_pharmacy_list->StartRec - 1;
if ($hospital_pharmacy_list->Recordset && !$hospital_pharmacy_list->Recordset->EOF) {
	$hospital_pharmacy_list->Recordset->moveFirst();
	$selectLimit = $hospital_pharmacy_list->UseSelectLimit;
	if (!$selectLimit && $hospital_pharmacy_list->StartRec > 1)
		$hospital_pharmacy_list->Recordset->move($hospital_pharmacy_list->StartRec - 1);
} elseif (!$hospital_pharmacy->AllowAddDeleteRow && $hospital_pharmacy_list->StopRec == 0) {
	$hospital_pharmacy_list->StopRec = $hospital_pharmacy->GridAddRowCount;
}

// Initialize aggregate
$hospital_pharmacy->RowType = ROWTYPE_AGGREGATEINIT;
$hospital_pharmacy->resetAttributes();
$hospital_pharmacy_list->renderRow();
while ($hospital_pharmacy_list->RecCnt < $hospital_pharmacy_list->StopRec) {
	$hospital_pharmacy_list->RecCnt++;
	if ($hospital_pharmacy_list->RecCnt >= $hospital_pharmacy_list->StartRec) {
		$hospital_pharmacy_list->RowCnt++;

		// Set up key count
		$hospital_pharmacy_list->KeyCount = $hospital_pharmacy_list->RowIndex;

		// Init row class and style
		$hospital_pharmacy->resetAttributes();
		$hospital_pharmacy->CssClass = "";
		if ($hospital_pharmacy->isGridAdd()) {
		} else {
			$hospital_pharmacy_list->loadRowValues($hospital_pharmacy_list->Recordset); // Load row values
		}
		$hospital_pharmacy->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$hospital_pharmacy->RowAttrs = array_merge($hospital_pharmacy->RowAttrs, array('data-rowindex'=>$hospital_pharmacy_list->RowCnt, 'id'=>'r' . $hospital_pharmacy_list->RowCnt . '_hospital_pharmacy', 'data-rowtype'=>$hospital_pharmacy->RowType));

		// Render row
		$hospital_pharmacy_list->renderRow();

		// Render list options
		$hospital_pharmacy_list->renderListOptions();
?>
	<tr<?php echo $hospital_pharmacy->rowAttributes() ?>>
<?php

// Render list options (body, left)
$hospital_pharmacy_list->ListOptions->render("body", "left", $hospital_pharmacy_list->RowCnt);
?>
	<?php if ($hospital_pharmacy->id->Visible) { // id ?>
		<td data-name="id"<?php echo $hospital_pharmacy->id->cellAttributes() ?>>
<span id="el<?php echo $hospital_pharmacy_list->RowCnt ?>_hospital_pharmacy_id" class="hospital_pharmacy_id">
<span<?php echo $hospital_pharmacy->id->viewAttributes() ?>>
<?php echo $hospital_pharmacy->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospital_pharmacy->pharmacy->Visible) { // pharmacy ?>
		<td data-name="pharmacy"<?php echo $hospital_pharmacy->pharmacy->cellAttributes() ?>>
<span id="el<?php echo $hospital_pharmacy_list->RowCnt ?>_hospital_pharmacy_pharmacy" class="hospital_pharmacy_pharmacy">
<span<?php echo $hospital_pharmacy->pharmacy->viewAttributes() ?>>
<?php echo $hospital_pharmacy->pharmacy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospital_pharmacy->street->Visible) { // street ?>
		<td data-name="street"<?php echo $hospital_pharmacy->street->cellAttributes() ?>>
<span id="el<?php echo $hospital_pharmacy_list->RowCnt ?>_hospital_pharmacy_street" class="hospital_pharmacy_street">
<span<?php echo $hospital_pharmacy->street->viewAttributes() ?>>
<?php echo $hospital_pharmacy->street->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospital_pharmacy->area->Visible) { // area ?>
		<td data-name="area"<?php echo $hospital_pharmacy->area->cellAttributes() ?>>
<span id="el<?php echo $hospital_pharmacy_list->RowCnt ?>_hospital_pharmacy_area" class="hospital_pharmacy_area">
<span<?php echo $hospital_pharmacy->area->viewAttributes() ?>>
<?php echo $hospital_pharmacy->area->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospital_pharmacy->town->Visible) { // town ?>
		<td data-name="town"<?php echo $hospital_pharmacy->town->cellAttributes() ?>>
<span id="el<?php echo $hospital_pharmacy_list->RowCnt ?>_hospital_pharmacy_town" class="hospital_pharmacy_town">
<span<?php echo $hospital_pharmacy->town->viewAttributes() ?>>
<?php echo $hospital_pharmacy->town->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospital_pharmacy->province->Visible) { // province ?>
		<td data-name="province"<?php echo $hospital_pharmacy->province->cellAttributes() ?>>
<span id="el<?php echo $hospital_pharmacy_list->RowCnt ?>_hospital_pharmacy_province" class="hospital_pharmacy_province">
<span<?php echo $hospital_pharmacy->province->viewAttributes() ?>>
<?php echo $hospital_pharmacy->province->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospital_pharmacy->postal_code->Visible) { // postal_code ?>
		<td data-name="postal_code"<?php echo $hospital_pharmacy->postal_code->cellAttributes() ?>>
<span id="el<?php echo $hospital_pharmacy_list->RowCnt ?>_hospital_pharmacy_postal_code" class="hospital_pharmacy_postal_code">
<span<?php echo $hospital_pharmacy->postal_code->viewAttributes() ?>>
<?php echo $hospital_pharmacy->postal_code->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospital_pharmacy->phone_no->Visible) { // phone_no ?>
		<td data-name="phone_no"<?php echo $hospital_pharmacy->phone_no->cellAttributes() ?>>
<span id="el<?php echo $hospital_pharmacy_list->RowCnt ?>_hospital_pharmacy_phone_no" class="hospital_pharmacy_phone_no">
<span<?php echo $hospital_pharmacy->phone_no->viewAttributes() ?>>
<?php echo $hospital_pharmacy->phone_no->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospital_pharmacy->PreFixCode->Visible) { // PreFixCode ?>
		<td data-name="PreFixCode"<?php echo $hospital_pharmacy->PreFixCode->cellAttributes() ?>>
<span id="el<?php echo $hospital_pharmacy_list->RowCnt ?>_hospital_pharmacy_PreFixCode" class="hospital_pharmacy_PreFixCode">
<span<?php echo $hospital_pharmacy->PreFixCode->viewAttributes() ?>>
<?php echo $hospital_pharmacy->PreFixCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospital_pharmacy->status->Visible) { // status ?>
		<td data-name="status"<?php echo $hospital_pharmacy->status->cellAttributes() ?>>
<span id="el<?php echo $hospital_pharmacy_list->RowCnt ?>_hospital_pharmacy_status" class="hospital_pharmacy_status">
<span<?php echo $hospital_pharmacy->status->viewAttributes() ?>>
<?php echo $hospital_pharmacy->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospital_pharmacy->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $hospital_pharmacy->createdby->cellAttributes() ?>>
<span id="el<?php echo $hospital_pharmacy_list->RowCnt ?>_hospital_pharmacy_createdby" class="hospital_pharmacy_createdby">
<span<?php echo $hospital_pharmacy->createdby->viewAttributes() ?>>
<?php echo $hospital_pharmacy->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospital_pharmacy->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $hospital_pharmacy->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $hospital_pharmacy_list->RowCnt ?>_hospital_pharmacy_createddatetime" class="hospital_pharmacy_createddatetime">
<span<?php echo $hospital_pharmacy->createddatetime->viewAttributes() ?>>
<?php echo $hospital_pharmacy->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospital_pharmacy->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $hospital_pharmacy->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $hospital_pharmacy_list->RowCnt ?>_hospital_pharmacy_modifiedby" class="hospital_pharmacy_modifiedby">
<span<?php echo $hospital_pharmacy->modifiedby->viewAttributes() ?>>
<?php echo $hospital_pharmacy->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospital_pharmacy->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $hospital_pharmacy->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $hospital_pharmacy_list->RowCnt ?>_hospital_pharmacy_modifieddatetime" class="hospital_pharmacy_modifieddatetime">
<span<?php echo $hospital_pharmacy->modifieddatetime->viewAttributes() ?>>
<?php echo $hospital_pharmacy->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospital_pharmacy->pharmacyGST->Visible) { // pharmacyGST ?>
		<td data-name="pharmacyGST"<?php echo $hospital_pharmacy->pharmacyGST->cellAttributes() ?>>
<span id="el<?php echo $hospital_pharmacy_list->RowCnt ?>_hospital_pharmacy_pharmacyGST" class="hospital_pharmacy_pharmacyGST">
<span<?php echo $hospital_pharmacy->pharmacyGST->viewAttributes() ?>>
<?php echo $hospital_pharmacy->pharmacyGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospital_pharmacy->HospId->Visible) { // HospId ?>
		<td data-name="HospId"<?php echo $hospital_pharmacy->HospId->cellAttributes() ?>>
<span id="el<?php echo $hospital_pharmacy_list->RowCnt ?>_hospital_pharmacy_HospId" class="hospital_pharmacy_HospId">
<span<?php echo $hospital_pharmacy->HospId->viewAttributes() ?>>
<?php echo $hospital_pharmacy->HospId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospital_pharmacy->BranchID->Visible) { // BranchID ?>
		<td data-name="BranchID"<?php echo $hospital_pharmacy->BranchID->cellAttributes() ?>>
<span id="el<?php echo $hospital_pharmacy_list->RowCnt ?>_hospital_pharmacy_BranchID" class="hospital_pharmacy_BranchID">
<span<?php echo $hospital_pharmacy->BranchID->viewAttributes() ?>>
<?php echo $hospital_pharmacy->BranchID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$hospital_pharmacy_list->ListOptions->render("body", "right", $hospital_pharmacy_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$hospital_pharmacy->isGridAdd())
		$hospital_pharmacy_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$hospital_pharmacy->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($hospital_pharmacy_list->Recordset)
	$hospital_pharmacy_list->Recordset->Close();
?>
<?php if (!$hospital_pharmacy->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$hospital_pharmacy->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($hospital_pharmacy_list->Pager)) $hospital_pharmacy_list->Pager = new NumericPager($hospital_pharmacy_list->StartRec, $hospital_pharmacy_list->DisplayRecs, $hospital_pharmacy_list->TotalRecs, $hospital_pharmacy_list->RecRange, $hospital_pharmacy_list->AutoHidePager) ?>
<?php if ($hospital_pharmacy_list->Pager->RecordCount > 0 && $hospital_pharmacy_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($hospital_pharmacy_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hospital_pharmacy_list->pageUrl() ?>start=<?php echo $hospital_pharmacy_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($hospital_pharmacy_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hospital_pharmacy_list->pageUrl() ?>start=<?php echo $hospital_pharmacy_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($hospital_pharmacy_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $hospital_pharmacy_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($hospital_pharmacy_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hospital_pharmacy_list->pageUrl() ?>start=<?php echo $hospital_pharmacy_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($hospital_pharmacy_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hospital_pharmacy_list->pageUrl() ?>start=<?php echo $hospital_pharmacy_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($hospital_pharmacy_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $hospital_pharmacy_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $hospital_pharmacy_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $hospital_pharmacy_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($hospital_pharmacy_list->TotalRecs > 0 && (!$hospital_pharmacy_list->AutoHidePageSizeSelector || $hospital_pharmacy_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="hospital_pharmacy">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($hospital_pharmacy_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($hospital_pharmacy_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($hospital_pharmacy_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($hospital_pharmacy_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($hospital_pharmacy_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($hospital_pharmacy_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($hospital_pharmacy->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $hospital_pharmacy_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($hospital_pharmacy_list->TotalRecs == 0 && !$hospital_pharmacy->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $hospital_pharmacy_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$hospital_pharmacy_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$hospital_pharmacy->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$hospital_pharmacy->isExport()) { ?>
<script>
ew.scrollableTable("gmp_hospital_pharmacy", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$hospital_pharmacy_list->terminate();
?>