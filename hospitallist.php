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
$hospital_list = new hospital_list();

// Run the page
$hospital_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hospital_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$hospital->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fhospitallist = currentForm = new ew.Form("fhospitallist", "list");
fhospitallist.formKeyCountName = '<?php echo $hospital_list->FormKeyCountName ?>';

// Form_CustomValidate event
fhospitallist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhospitallist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fhospitallist.lists["x_status"] = <?php echo $hospital_list->status->Lookup->toClientList() ?>;
fhospitallist.lists["x_status"].options = <?php echo JsonEncode($hospital_list->status->lookupOptions()) ?>;

// Form object for search
var fhospitallistsrch = currentSearchForm = new ew.Form("fhospitallistsrch");

// Filters
fhospitallistsrch.filterList = <?php echo $hospital_list->getFilterList() ?>;
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
<?php if (!$hospital->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($hospital_list->TotalRecs > 0 && $hospital_list->ExportOptions->visible()) { ?>
<?php $hospital_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($hospital_list->ImportOptions->visible()) { ?>
<?php $hospital_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($hospital_list->SearchOptions->visible()) { ?>
<?php $hospital_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($hospital_list->FilterOptions->visible()) { ?>
<?php $hospital_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$hospital_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$hospital->isExport() && !$hospital->CurrentAction) { ?>
<form name="fhospitallistsrch" id="fhospitallistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($hospital_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fhospitallistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="hospital">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($hospital_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($hospital_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $hospital_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($hospital_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($hospital_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($hospital_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($hospital_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $hospital_list->showPageHeader(); ?>
<?php
$hospital_list->showMessage();
?>
<?php if ($hospital_list->TotalRecs > 0 || $hospital->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($hospital_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> hospital">
<?php if (!$hospital->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$hospital->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($hospital_list->Pager)) $hospital_list->Pager = new NumericPager($hospital_list->StartRec, $hospital_list->DisplayRecs, $hospital_list->TotalRecs, $hospital_list->RecRange, $hospital_list->AutoHidePager) ?>
<?php if ($hospital_list->Pager->RecordCount > 0 && $hospital_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($hospital_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hospital_list->pageUrl() ?>start=<?php echo $hospital_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($hospital_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hospital_list->pageUrl() ?>start=<?php echo $hospital_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($hospital_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $hospital_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($hospital_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hospital_list->pageUrl() ?>start=<?php echo $hospital_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($hospital_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hospital_list->pageUrl() ?>start=<?php echo $hospital_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($hospital_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $hospital_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $hospital_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $hospital_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($hospital_list->TotalRecs > 0 && (!$hospital_list->AutoHidePageSizeSelector || $hospital_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="hospital">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($hospital_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($hospital_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($hospital_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($hospital_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($hospital_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($hospital_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($hospital->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $hospital_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fhospitallist" id="fhospitallist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hospital_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hospital_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hospital">
<div id="gmp_hospital" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($hospital_list->TotalRecs > 0 || $hospital->isGridEdit()) { ?>
<table id="tbl_hospitallist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$hospital_list->RowType = ROWTYPE_HEADER;

// Render list options
$hospital_list->renderListOptions();

// Render list options (header, left)
$hospital_list->ListOptions->render("header", "left");
?>
<?php if ($hospital->id->Visible) { // id ?>
	<?php if ($hospital->sortUrl($hospital->id) == "") { ?>
		<th data-name="id" class="<?php echo $hospital->id->headerCellClass() ?>"><div id="elh_hospital_id" class="hospital_id"><div class="ew-table-header-caption"><?php echo $hospital->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $hospital->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hospital->SortUrl($hospital->id) ?>',1);"><div id="elh_hospital_id" class="hospital_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($hospital->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hospital->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospital->hospital->Visible) { // hospital ?>
	<?php if ($hospital->sortUrl($hospital->hospital) == "") { ?>
		<th data-name="hospital" class="<?php echo $hospital->hospital->headerCellClass() ?>"><div id="elh_hospital_hospital" class="hospital_hospital"><div class="ew-table-header-caption"><?php echo $hospital->hospital->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="hospital" class="<?php echo $hospital->hospital->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hospital->SortUrl($hospital->hospital) ?>',1);"><div id="elh_hospital_hospital" class="hospital_hospital">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital->hospital->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hospital->hospital->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hospital->hospital->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospital->street->Visible) { // street ?>
	<?php if ($hospital->sortUrl($hospital->street) == "") { ?>
		<th data-name="street" class="<?php echo $hospital->street->headerCellClass() ?>"><div id="elh_hospital_street" class="hospital_street"><div class="ew-table-header-caption"><?php echo $hospital->street->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="street" class="<?php echo $hospital->street->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hospital->SortUrl($hospital->street) ?>',1);"><div id="elh_hospital_street" class="hospital_street">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital->street->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hospital->street->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hospital->street->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospital->area->Visible) { // area ?>
	<?php if ($hospital->sortUrl($hospital->area) == "") { ?>
		<th data-name="area" class="<?php echo $hospital->area->headerCellClass() ?>"><div id="elh_hospital_area" class="hospital_area"><div class="ew-table-header-caption"><?php echo $hospital->area->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="area" class="<?php echo $hospital->area->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hospital->SortUrl($hospital->area) ?>',1);"><div id="elh_hospital_area" class="hospital_area">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital->area->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hospital->area->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hospital->area->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospital->town->Visible) { // town ?>
	<?php if ($hospital->sortUrl($hospital->town) == "") { ?>
		<th data-name="town" class="<?php echo $hospital->town->headerCellClass() ?>"><div id="elh_hospital_town" class="hospital_town"><div class="ew-table-header-caption"><?php echo $hospital->town->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="town" class="<?php echo $hospital->town->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hospital->SortUrl($hospital->town) ?>',1);"><div id="elh_hospital_town" class="hospital_town">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital->town->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hospital->town->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hospital->town->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospital->province->Visible) { // province ?>
	<?php if ($hospital->sortUrl($hospital->province) == "") { ?>
		<th data-name="province" class="<?php echo $hospital->province->headerCellClass() ?>"><div id="elh_hospital_province" class="hospital_province"><div class="ew-table-header-caption"><?php echo $hospital->province->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="province" class="<?php echo $hospital->province->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hospital->SortUrl($hospital->province) ?>',1);"><div id="elh_hospital_province" class="hospital_province">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital->province->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hospital->province->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hospital->province->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospital->postal_code->Visible) { // postal_code ?>
	<?php if ($hospital->sortUrl($hospital->postal_code) == "") { ?>
		<th data-name="postal_code" class="<?php echo $hospital->postal_code->headerCellClass() ?>"><div id="elh_hospital_postal_code" class="hospital_postal_code"><div class="ew-table-header-caption"><?php echo $hospital->postal_code->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="postal_code" class="<?php echo $hospital->postal_code->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hospital->SortUrl($hospital->postal_code) ?>',1);"><div id="elh_hospital_postal_code" class="hospital_postal_code">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital->postal_code->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hospital->postal_code->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hospital->postal_code->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospital->phone_no->Visible) { // phone_no ?>
	<?php if ($hospital->sortUrl($hospital->phone_no) == "") { ?>
		<th data-name="phone_no" class="<?php echo $hospital->phone_no->headerCellClass() ?>"><div id="elh_hospital_phone_no" class="hospital_phone_no"><div class="ew-table-header-caption"><?php echo $hospital->phone_no->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="phone_no" class="<?php echo $hospital->phone_no->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hospital->SortUrl($hospital->phone_no) ?>',1);"><div id="elh_hospital_phone_no" class="hospital_phone_no">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital->phone_no->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hospital->phone_no->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hospital->phone_no->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospital->status->Visible) { // status ?>
	<?php if ($hospital->sortUrl($hospital->status) == "") { ?>
		<th data-name="status" class="<?php echo $hospital->status->headerCellClass() ?>"><div id="elh_hospital_status" class="hospital_status"><div class="ew-table-header-caption"><?php echo $hospital->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $hospital->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hospital->SortUrl($hospital->status) ?>',1);"><div id="elh_hospital_status" class="hospital_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($hospital->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hospital->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospital->PreFixCode->Visible) { // PreFixCode ?>
	<?php if ($hospital->sortUrl($hospital->PreFixCode) == "") { ?>
		<th data-name="PreFixCode" class="<?php echo $hospital->PreFixCode->headerCellClass() ?>"><div id="elh_hospital_PreFixCode" class="hospital_PreFixCode"><div class="ew-table-header-caption"><?php echo $hospital->PreFixCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PreFixCode" class="<?php echo $hospital->PreFixCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hospital->SortUrl($hospital->PreFixCode) ?>',1);"><div id="elh_hospital_PreFixCode" class="hospital_PreFixCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital->PreFixCode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hospital->PreFixCode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hospital->PreFixCode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospital->BillingGST->Visible) { // BillingGST ?>
	<?php if ($hospital->sortUrl($hospital->BillingGST) == "") { ?>
		<th data-name="BillingGST" class="<?php echo $hospital->BillingGST->headerCellClass() ?>"><div id="elh_hospital_BillingGST" class="hospital_BillingGST"><div class="ew-table-header-caption"><?php echo $hospital->BillingGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillingGST" class="<?php echo $hospital->BillingGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hospital->SortUrl($hospital->BillingGST) ?>',1);"><div id="elh_hospital_BillingGST" class="hospital_BillingGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital->BillingGST->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hospital->BillingGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hospital->BillingGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospital->pharmacyGST->Visible) { // pharmacyGST ?>
	<?php if ($hospital->sortUrl($hospital->pharmacyGST) == "") { ?>
		<th data-name="pharmacyGST" class="<?php echo $hospital->pharmacyGST->headerCellClass() ?>"><div id="elh_hospital_pharmacyGST" class="hospital_pharmacyGST"><div class="ew-table-header-caption"><?php echo $hospital->pharmacyGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pharmacyGST" class="<?php echo $hospital->pharmacyGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hospital->SortUrl($hospital->pharmacyGST) ?>',1);"><div id="elh_hospital_pharmacyGST" class="hospital_pharmacyGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital->pharmacyGST->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hospital->pharmacyGST->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hospital->pharmacyGST->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($hospital->Country->Visible) { // Country ?>
	<?php if ($hospital->sortUrl($hospital->Country) == "") { ?>
		<th data-name="Country" class="<?php echo $hospital->Country->headerCellClass() ?>"><div id="elh_hospital_Country" class="hospital_Country"><div class="ew-table-header-caption"><?php echo $hospital->Country->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Country" class="<?php echo $hospital->Country->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $hospital->SortUrl($hospital->Country) ?>',1);"><div id="elh_hospital_Country" class="hospital_Country">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $hospital->Country->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($hospital->Country->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($hospital->Country->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$hospital_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($hospital->ExportAll && $hospital->isExport()) {
	$hospital_list->StopRec = $hospital_list->TotalRecs;
} else {

	// Set the last record to display
	if ($hospital_list->TotalRecs > $hospital_list->StartRec + $hospital_list->DisplayRecs - 1)
		$hospital_list->StopRec = $hospital_list->StartRec + $hospital_list->DisplayRecs - 1;
	else
		$hospital_list->StopRec = $hospital_list->TotalRecs;
}
$hospital_list->RecCnt = $hospital_list->StartRec - 1;
if ($hospital_list->Recordset && !$hospital_list->Recordset->EOF) {
	$hospital_list->Recordset->moveFirst();
	$selectLimit = $hospital_list->UseSelectLimit;
	if (!$selectLimit && $hospital_list->StartRec > 1)
		$hospital_list->Recordset->move($hospital_list->StartRec - 1);
} elseif (!$hospital->AllowAddDeleteRow && $hospital_list->StopRec == 0) {
	$hospital_list->StopRec = $hospital->GridAddRowCount;
}

// Initialize aggregate
$hospital->RowType = ROWTYPE_AGGREGATEINIT;
$hospital->resetAttributes();
$hospital_list->renderRow();
while ($hospital_list->RecCnt < $hospital_list->StopRec) {
	$hospital_list->RecCnt++;
	if ($hospital_list->RecCnt >= $hospital_list->StartRec) {
		$hospital_list->RowCnt++;

		// Set up key count
		$hospital_list->KeyCount = $hospital_list->RowIndex;

		// Init row class and style
		$hospital->resetAttributes();
		$hospital->CssClass = "";
		if ($hospital->isGridAdd()) {
		} else {
			$hospital_list->loadRowValues($hospital_list->Recordset); // Load row values
		}
		$hospital->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$hospital->RowAttrs = array_merge($hospital->RowAttrs, array('data-rowindex'=>$hospital_list->RowCnt, 'id'=>'r' . $hospital_list->RowCnt . '_hospital', 'data-rowtype'=>$hospital->RowType));

		// Render row
		$hospital_list->renderRow();

		// Render list options
		$hospital_list->renderListOptions();
?>
	<tr<?php echo $hospital->rowAttributes() ?>>
<?php

// Render list options (body, left)
$hospital_list->ListOptions->render("body", "left", $hospital_list->RowCnt);
?>
	<?php if ($hospital->id->Visible) { // id ?>
		<td data-name="id"<?php echo $hospital->id->cellAttributes() ?>>
<span id="el<?php echo $hospital_list->RowCnt ?>_hospital_id" class="hospital_id">
<span<?php echo $hospital->id->viewAttributes() ?>>
<?php echo $hospital->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospital->hospital->Visible) { // hospital ?>
		<td data-name="hospital"<?php echo $hospital->hospital->cellAttributes() ?>>
<span id="el<?php echo $hospital_list->RowCnt ?>_hospital_hospital" class="hospital_hospital">
<span<?php echo $hospital->hospital->viewAttributes() ?>>
<?php echo $hospital->hospital->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospital->street->Visible) { // street ?>
		<td data-name="street"<?php echo $hospital->street->cellAttributes() ?>>
<span id="el<?php echo $hospital_list->RowCnt ?>_hospital_street" class="hospital_street">
<span<?php echo $hospital->street->viewAttributes() ?>>
<?php echo $hospital->street->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospital->area->Visible) { // area ?>
		<td data-name="area"<?php echo $hospital->area->cellAttributes() ?>>
<span id="el<?php echo $hospital_list->RowCnt ?>_hospital_area" class="hospital_area">
<span<?php echo $hospital->area->viewAttributes() ?>>
<?php echo $hospital->area->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospital->town->Visible) { // town ?>
		<td data-name="town"<?php echo $hospital->town->cellAttributes() ?>>
<span id="el<?php echo $hospital_list->RowCnt ?>_hospital_town" class="hospital_town">
<span<?php echo $hospital->town->viewAttributes() ?>>
<?php echo $hospital->town->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospital->province->Visible) { // province ?>
		<td data-name="province"<?php echo $hospital->province->cellAttributes() ?>>
<span id="el<?php echo $hospital_list->RowCnt ?>_hospital_province" class="hospital_province">
<span<?php echo $hospital->province->viewAttributes() ?>>
<?php echo $hospital->province->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospital->postal_code->Visible) { // postal_code ?>
		<td data-name="postal_code"<?php echo $hospital->postal_code->cellAttributes() ?>>
<span id="el<?php echo $hospital_list->RowCnt ?>_hospital_postal_code" class="hospital_postal_code">
<span<?php echo $hospital->postal_code->viewAttributes() ?>>
<?php echo $hospital->postal_code->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospital->phone_no->Visible) { // phone_no ?>
		<td data-name="phone_no"<?php echo $hospital->phone_no->cellAttributes() ?>>
<span id="el<?php echo $hospital_list->RowCnt ?>_hospital_phone_no" class="hospital_phone_no">
<span<?php echo $hospital->phone_no->viewAttributes() ?>>
<?php echo $hospital->phone_no->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospital->status->Visible) { // status ?>
		<td data-name="status"<?php echo $hospital->status->cellAttributes() ?>>
<span id="el<?php echo $hospital_list->RowCnt ?>_hospital_status" class="hospital_status">
<span<?php echo $hospital->status->viewAttributes() ?>>
<?php echo $hospital->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospital->PreFixCode->Visible) { // PreFixCode ?>
		<td data-name="PreFixCode"<?php echo $hospital->PreFixCode->cellAttributes() ?>>
<span id="el<?php echo $hospital_list->RowCnt ?>_hospital_PreFixCode" class="hospital_PreFixCode">
<span<?php echo $hospital->PreFixCode->viewAttributes() ?>>
<?php echo $hospital->PreFixCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospital->BillingGST->Visible) { // BillingGST ?>
		<td data-name="BillingGST"<?php echo $hospital->BillingGST->cellAttributes() ?>>
<span id="el<?php echo $hospital_list->RowCnt ?>_hospital_BillingGST" class="hospital_BillingGST">
<span<?php echo $hospital->BillingGST->viewAttributes() ?>>
<?php echo $hospital->BillingGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospital->pharmacyGST->Visible) { // pharmacyGST ?>
		<td data-name="pharmacyGST"<?php echo $hospital->pharmacyGST->cellAttributes() ?>>
<span id="el<?php echo $hospital_list->RowCnt ?>_hospital_pharmacyGST" class="hospital_pharmacyGST">
<span<?php echo $hospital->pharmacyGST->viewAttributes() ?>>
<?php echo $hospital->pharmacyGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($hospital->Country->Visible) { // Country ?>
		<td data-name="Country"<?php echo $hospital->Country->cellAttributes() ?>>
<span id="el<?php echo $hospital_list->RowCnt ?>_hospital_Country" class="hospital_Country">
<span<?php echo $hospital->Country->viewAttributes() ?>>
<?php echo $hospital->Country->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$hospital_list->ListOptions->render("body", "right", $hospital_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$hospital->isGridAdd())
		$hospital_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$hospital->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($hospital_list->Recordset)
	$hospital_list->Recordset->Close();
?>
<?php if (!$hospital->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$hospital->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($hospital_list->Pager)) $hospital_list->Pager = new NumericPager($hospital_list->StartRec, $hospital_list->DisplayRecs, $hospital_list->TotalRecs, $hospital_list->RecRange, $hospital_list->AutoHidePager) ?>
<?php if ($hospital_list->Pager->RecordCount > 0 && $hospital_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($hospital_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hospital_list->pageUrl() ?>start=<?php echo $hospital_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($hospital_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hospital_list->pageUrl() ?>start=<?php echo $hospital_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($hospital_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $hospital_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($hospital_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hospital_list->pageUrl() ?>start=<?php echo $hospital_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($hospital_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $hospital_list->pageUrl() ?>start=<?php echo $hospital_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($hospital_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $hospital_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $hospital_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $hospital_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($hospital_list->TotalRecs > 0 && (!$hospital_list->AutoHidePageSizeSelector || $hospital_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="hospital">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($hospital_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($hospital_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($hospital_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($hospital_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($hospital_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($hospital_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($hospital->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $hospital_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($hospital_list->TotalRecs == 0 && !$hospital->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $hospital_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$hospital_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$hospital->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$hospital->isExport()) { ?>
<script>
ew.scrollableTable("gmp_hospital", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$hospital_list->terminate();
?>