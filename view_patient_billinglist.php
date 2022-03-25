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
$view_patient_billing_list = new view_patient_billing_list();

// Run the page
$view_patient_billing_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_patient_billing_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_patient_billing->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_patient_billinglist = currentForm = new ew.Form("fview_patient_billinglist", "list");
fview_patient_billinglist.formKeyCountName = '<?php echo $view_patient_billing_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_patient_billinglist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_patient_billinglist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fview_patient_billinglistsrch = currentSearchForm = new ew.Form("fview_patient_billinglistsrch");

// Filters
fview_patient_billinglistsrch.filterList = <?php echo $view_patient_billing_list->getFilterList() ?>;
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
<?php if (!$view_patient_billing->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_patient_billing_list->TotalRecs > 0 && $view_patient_billing_list->ExportOptions->visible()) { ?>
<?php $view_patient_billing_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_patient_billing_list->ImportOptions->visible()) { ?>
<?php $view_patient_billing_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_patient_billing_list->SearchOptions->visible()) { ?>
<?php $view_patient_billing_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_patient_billing_list->FilterOptions->visible()) { ?>
<?php $view_patient_billing_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_patient_billing_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_patient_billing->isExport() && !$view_patient_billing->CurrentAction) { ?>
<form name="fview_patient_billinglistsrch" id="fview_patient_billinglistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_patient_billing_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_patient_billinglistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_patient_billing">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_patient_billing_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_patient_billing_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_patient_billing_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_patient_billing_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_patient_billing_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_patient_billing_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_patient_billing_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_patient_billing_list->showPageHeader(); ?>
<?php
$view_patient_billing_list->showMessage();
?>
<?php if ($view_patient_billing_list->TotalRecs > 0 || $view_patient_billing->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_patient_billing_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_patient_billing">
<?php if (!$view_patient_billing->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_patient_billing->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_patient_billing_list->Pager)) $view_patient_billing_list->Pager = new NumericPager($view_patient_billing_list->StartRec, $view_patient_billing_list->DisplayRecs, $view_patient_billing_list->TotalRecs, $view_patient_billing_list->RecRange, $view_patient_billing_list->AutoHidePager) ?>
<?php if ($view_patient_billing_list->Pager->RecordCount > 0 && $view_patient_billing_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_patient_billing_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_patient_billing_list->pageUrl() ?>start=<?php echo $view_patient_billing_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_patient_billing_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_patient_billing_list->pageUrl() ?>start=<?php echo $view_patient_billing_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_patient_billing_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_patient_billing_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_patient_billing_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_patient_billing_list->pageUrl() ?>start=<?php echo $view_patient_billing_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_patient_billing_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_patient_billing_list->pageUrl() ?>start=<?php echo $view_patient_billing_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_patient_billing_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_patient_billing_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_patient_billing_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_patient_billing_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_patient_billing_list->TotalRecs > 0 && (!$view_patient_billing_list->AutoHidePageSizeSelector || $view_patient_billing_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_patient_billing">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_patient_billing_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_patient_billing_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_patient_billing_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_patient_billing_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_patient_billing_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_patient_billing_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_patient_billing->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_patient_billing_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_patient_billinglist" id="fview_patient_billinglist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_patient_billing_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_patient_billing_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_patient_billing">
<div id="gmp_view_patient_billing" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_patient_billing_list->TotalRecs > 0 || $view_patient_billing->isGridEdit()) { ?>
<table id="tbl_view_patient_billinglist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_patient_billing_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_patient_billing_list->renderListOptions();

// Render list options (header, left)
$view_patient_billing_list->ListOptions->render("header", "left");
?>
<?php if ($view_patient_billing->id->Visible) { // id ?>
	<?php if ($view_patient_billing->sortUrl($view_patient_billing->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_patient_billing->id->headerCellClass() ?>"><div id="elh_view_patient_billing_id" class="view_patient_billing_id"><div class="ew-table-header-caption"><?php echo $view_patient_billing->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_patient_billing->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_billing->SortUrl($view_patient_billing->id) ?>',1);"><div id="elh_view_patient_billing_id" class="view_patient_billing_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_billing->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_billing->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_billing->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_billing->mrnno->Visible) { // mrnno ?>
	<?php if ($view_patient_billing->sortUrl($view_patient_billing->mrnno) == "") { ?>
		<th data-name="mrnno" class="<?php echo $view_patient_billing->mrnno->headerCellClass() ?>"><div id="elh_view_patient_billing_mrnno" class="view_patient_billing_mrnno"><div class="ew-table-header-caption"><?php echo $view_patient_billing->mrnno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnno" class="<?php echo $view_patient_billing->mrnno->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_billing->SortUrl($view_patient_billing->mrnno) ?>',1);"><div id="elh_view_patient_billing_mrnno" class="view_patient_billing_mrnno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_billing->mrnno->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_billing->mrnno->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_billing->mrnno->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_billing->Gender->Visible) { // Gender ?>
	<?php if ($view_patient_billing->sortUrl($view_patient_billing->Gender) == "") { ?>
		<th data-name="Gender" class="<?php echo $view_patient_billing->Gender->headerCellClass() ?>"><div id="elh_view_patient_billing_Gender" class="view_patient_billing_Gender"><div class="ew-table-header-caption"><?php echo $view_patient_billing->Gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gender" class="<?php echo $view_patient_billing->Gender->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_billing->SortUrl($view_patient_billing->Gender) ?>',1);"><div id="elh_view_patient_billing_Gender" class="view_patient_billing_Gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_billing->Gender->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_billing->Gender->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_billing->Gender->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_billing->Age->Visible) { // Age ?>
	<?php if ($view_patient_billing->sortUrl($view_patient_billing->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $view_patient_billing->Age->headerCellClass() ?>"><div id="elh_view_patient_billing_Age" class="view_patient_billing_Age"><div class="ew-table-header-caption"><?php echo $view_patient_billing->Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $view_patient_billing->Age->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_billing->SortUrl($view_patient_billing->Age) ?>',1);"><div id="elh_view_patient_billing_Age" class="view_patient_billing_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_billing->Age->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_billing->Age->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_billing->Age->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_billing->createdby->Visible) { // createdby ?>
	<?php if ($view_patient_billing->sortUrl($view_patient_billing->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $view_patient_billing->createdby->headerCellClass() ?>"><div id="elh_view_patient_billing_createdby" class="view_patient_billing_createdby"><div class="ew-table-header-caption"><?php echo $view_patient_billing->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $view_patient_billing->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_billing->SortUrl($view_patient_billing->createdby) ?>',1);"><div id="elh_view_patient_billing_createdby" class="view_patient_billing_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_billing->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_billing->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_billing->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_billing->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_patient_billing->sortUrl($view_patient_billing->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_patient_billing->createddatetime->headerCellClass() ?>"><div id="elh_view_patient_billing_createddatetime" class="view_patient_billing_createddatetime"><div class="ew-table-header-caption"><?php echo $view_patient_billing->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_patient_billing->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_billing->SortUrl($view_patient_billing->createddatetime) ?>',1);"><div id="elh_view_patient_billing_createddatetime" class="view_patient_billing_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_billing->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_billing->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_billing->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_billing->modifiedby->Visible) { // modifiedby ?>
	<?php if ($view_patient_billing->sortUrl($view_patient_billing->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $view_patient_billing->modifiedby->headerCellClass() ?>"><div id="elh_view_patient_billing_modifiedby" class="view_patient_billing_modifiedby"><div class="ew-table-header-caption"><?php echo $view_patient_billing->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $view_patient_billing->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_billing->SortUrl($view_patient_billing->modifiedby) ?>',1);"><div id="elh_view_patient_billing_modifiedby" class="view_patient_billing_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_billing->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_billing->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_billing->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_billing->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($view_patient_billing->sortUrl($view_patient_billing->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_patient_billing->modifieddatetime->headerCellClass() ?>"><div id="elh_view_patient_billing_modifieddatetime" class="view_patient_billing_modifieddatetime"><div class="ew-table-header-caption"><?php echo $view_patient_billing->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_patient_billing->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_billing->SortUrl($view_patient_billing->modifieddatetime) ?>',1);"><div id="elh_view_patient_billing_modifieddatetime" class="view_patient_billing_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_billing->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_billing->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_billing->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_billing->PatientId->Visible) { // PatientId ?>
	<?php if ($view_patient_billing->sortUrl($view_patient_billing->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $view_patient_billing->PatientId->headerCellClass() ?>"><div id="elh_view_patient_billing_PatientId" class="view_patient_billing_PatientId"><div class="ew-table-header-caption"><?php echo $view_patient_billing->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $view_patient_billing->PatientId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_billing->SortUrl($view_patient_billing->PatientId) ?>',1);"><div id="elh_view_patient_billing_PatientId" class="view_patient_billing_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_billing->PatientId->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_billing->PatientId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_billing->PatientId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_billing->HospID->Visible) { // HospID ?>
	<?php if ($view_patient_billing->sortUrl($view_patient_billing->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_patient_billing->HospID->headerCellClass() ?>"><div id="elh_view_patient_billing_HospID" class="view_patient_billing_HospID"><div class="ew-table-header-caption"><?php echo $view_patient_billing->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_patient_billing->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_billing->SortUrl($view_patient_billing->HospID) ?>',1);"><div id="elh_view_patient_billing_HospID" class="view_patient_billing_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_billing->HospID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_billing->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_billing->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_billing->Reception->Visible) { // Reception ?>
	<?php if ($view_patient_billing->sortUrl($view_patient_billing->Reception) == "") { ?>
		<th data-name="Reception" class="<?php echo $view_patient_billing->Reception->headerCellClass() ?>"><div id="elh_view_patient_billing_Reception" class="view_patient_billing_Reception"><div class="ew-table-header-caption"><?php echo $view_patient_billing->Reception->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Reception" class="<?php echo $view_patient_billing->Reception->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_billing->SortUrl($view_patient_billing->Reception) ?>',1);"><div id="elh_view_patient_billing_Reception" class="view_patient_billing_Reception">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_billing->Reception->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_billing->Reception->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_billing->Reception->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_billing->PatientName->Visible) { // PatientName ?>
	<?php if ($view_patient_billing->sortUrl($view_patient_billing->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $view_patient_billing->PatientName->headerCellClass() ?>"><div id="elh_view_patient_billing_PatientName" class="view_patient_billing_PatientName"><div class="ew-table-header-caption"><?php echo $view_patient_billing->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $view_patient_billing->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_billing->SortUrl($view_patient_billing->PatientName) ?>',1);"><div id="elh_view_patient_billing_PatientName" class="view_patient_billing_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_billing->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_billing->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_billing->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_billing->Mobile->Visible) { // Mobile ?>
	<?php if ($view_patient_billing->sortUrl($view_patient_billing->Mobile) == "") { ?>
		<th data-name="Mobile" class="<?php echo $view_patient_billing->Mobile->headerCellClass() ?>"><div id="elh_view_patient_billing_Mobile" class="view_patient_billing_Mobile"><div class="ew-table-header-caption"><?php echo $view_patient_billing->Mobile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mobile" class="<?php echo $view_patient_billing->Mobile->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_billing->SortUrl($view_patient_billing->Mobile) ?>',1);"><div id="elh_view_patient_billing_Mobile" class="view_patient_billing_Mobile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_billing->Mobile->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_billing->Mobile->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_billing->Mobile->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_billing->IP_OP->Visible) { // IP_OP ?>
	<?php if ($view_patient_billing->sortUrl($view_patient_billing->IP_OP) == "") { ?>
		<th data-name="IP_OP" class="<?php echo $view_patient_billing->IP_OP->headerCellClass() ?>"><div id="elh_view_patient_billing_IP_OP" class="view_patient_billing_IP_OP"><div class="ew-table-header-caption"><?php echo $view_patient_billing->IP_OP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IP_OP" class="<?php echo $view_patient_billing->IP_OP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_billing->SortUrl($view_patient_billing->IP_OP) ?>',1);"><div id="elh_view_patient_billing_IP_OP" class="view_patient_billing_IP_OP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_billing->IP_OP->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_billing->IP_OP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_billing->IP_OP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_billing->Doctor->Visible) { // Doctor ?>
	<?php if ($view_patient_billing->sortUrl($view_patient_billing->Doctor) == "") { ?>
		<th data-name="Doctor" class="<?php echo $view_patient_billing->Doctor->headerCellClass() ?>"><div id="elh_view_patient_billing_Doctor" class="view_patient_billing_Doctor"><div class="ew-table-header-caption"><?php echo $view_patient_billing->Doctor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Doctor" class="<?php echo $view_patient_billing->Doctor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_billing->SortUrl($view_patient_billing->Doctor) ?>',1);"><div id="elh_view_patient_billing_Doctor" class="view_patient_billing_Doctor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_billing->Doctor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_billing->Doctor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_billing->Doctor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_billing->voucher_type->Visible) { // voucher_type ?>
	<?php if ($view_patient_billing->sortUrl($view_patient_billing->voucher_type) == "") { ?>
		<th data-name="voucher_type" class="<?php echo $view_patient_billing->voucher_type->headerCellClass() ?>"><div id="elh_view_patient_billing_voucher_type" class="view_patient_billing_voucher_type"><div class="ew-table-header-caption"><?php echo $view_patient_billing->voucher_type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="voucher_type" class="<?php echo $view_patient_billing->voucher_type->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_billing->SortUrl($view_patient_billing->voucher_type) ?>',1);"><div id="elh_view_patient_billing_voucher_type" class="view_patient_billing_voucher_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_billing->voucher_type->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_billing->voucher_type->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_billing->voucher_type->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_billing->Details->Visible) { // Details ?>
	<?php if ($view_patient_billing->sortUrl($view_patient_billing->Details) == "") { ?>
		<th data-name="Details" class="<?php echo $view_patient_billing->Details->headerCellClass() ?>"><div id="elh_view_patient_billing_Details" class="view_patient_billing_Details"><div class="ew-table-header-caption"><?php echo $view_patient_billing->Details->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Details" class="<?php echo $view_patient_billing->Details->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_billing->SortUrl($view_patient_billing->Details) ?>',1);"><div id="elh_view_patient_billing_Details" class="view_patient_billing_Details">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_billing->Details->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_billing->Details->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_billing->Details->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_billing->ModeofPayment->Visible) { // ModeofPayment ?>
	<?php if ($view_patient_billing->sortUrl($view_patient_billing->ModeofPayment) == "") { ?>
		<th data-name="ModeofPayment" class="<?php echo $view_patient_billing->ModeofPayment->headerCellClass() ?>"><div id="elh_view_patient_billing_ModeofPayment" class="view_patient_billing_ModeofPayment"><div class="ew-table-header-caption"><?php echo $view_patient_billing->ModeofPayment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModeofPayment" class="<?php echo $view_patient_billing->ModeofPayment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_billing->SortUrl($view_patient_billing->ModeofPayment) ?>',1);"><div id="elh_view_patient_billing_ModeofPayment" class="view_patient_billing_ModeofPayment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_billing->ModeofPayment->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_billing->ModeofPayment->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_billing->ModeofPayment->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_billing->Amount->Visible) { // Amount ?>
	<?php if ($view_patient_billing->sortUrl($view_patient_billing->Amount) == "") { ?>
		<th data-name="Amount" class="<?php echo $view_patient_billing->Amount->headerCellClass() ?>"><div id="elh_view_patient_billing_Amount" class="view_patient_billing_Amount"><div class="ew-table-header-caption"><?php echo $view_patient_billing->Amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Amount" class="<?php echo $view_patient_billing->Amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_billing->SortUrl($view_patient_billing->Amount) ?>',1);"><div id="elh_view_patient_billing_Amount" class="view_patient_billing_Amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_billing->Amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_billing->Amount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_billing->Amount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_billing->AnyDues->Visible) { // AnyDues ?>
	<?php if ($view_patient_billing->sortUrl($view_patient_billing->AnyDues) == "") { ?>
		<th data-name="AnyDues" class="<?php echo $view_patient_billing->AnyDues->headerCellClass() ?>"><div id="elh_view_patient_billing_AnyDues" class="view_patient_billing_AnyDues"><div class="ew-table-header-caption"><?php echo $view_patient_billing->AnyDues->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AnyDues" class="<?php echo $view_patient_billing->AnyDues->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_billing->SortUrl($view_patient_billing->AnyDues) ?>',1);"><div id="elh_view_patient_billing_AnyDues" class="view_patient_billing_AnyDues">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_billing->AnyDues->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_billing->AnyDues->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_billing->AnyDues->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_billing->RealizationAmount->Visible) { // RealizationAmount ?>
	<?php if ($view_patient_billing->sortUrl($view_patient_billing->RealizationAmount) == "") { ?>
		<th data-name="RealizationAmount" class="<?php echo $view_patient_billing->RealizationAmount->headerCellClass() ?>"><div id="elh_view_patient_billing_RealizationAmount" class="view_patient_billing_RealizationAmount"><div class="ew-table-header-caption"><?php echo $view_patient_billing->RealizationAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RealizationAmount" class="<?php echo $view_patient_billing->RealizationAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_billing->SortUrl($view_patient_billing->RealizationAmount) ?>',1);"><div id="elh_view_patient_billing_RealizationAmount" class="view_patient_billing_RealizationAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_billing->RealizationAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_billing->RealizationAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_billing->RealizationAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_billing->RealizationStatus->Visible) { // RealizationStatus ?>
	<?php if ($view_patient_billing->sortUrl($view_patient_billing->RealizationStatus) == "") { ?>
		<th data-name="RealizationStatus" class="<?php echo $view_patient_billing->RealizationStatus->headerCellClass() ?>"><div id="elh_view_patient_billing_RealizationStatus" class="view_patient_billing_RealizationStatus"><div class="ew-table-header-caption"><?php echo $view_patient_billing->RealizationStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RealizationStatus" class="<?php echo $view_patient_billing->RealizationStatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_billing->SortUrl($view_patient_billing->RealizationStatus) ?>',1);"><div id="elh_view_patient_billing_RealizationStatus" class="view_patient_billing_RealizationStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_billing->RealizationStatus->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_billing->RealizationStatus->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_billing->RealizationStatus->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_billing->RealizationRemarks->Visible) { // RealizationRemarks ?>
	<?php if ($view_patient_billing->sortUrl($view_patient_billing->RealizationRemarks) == "") { ?>
		<th data-name="RealizationRemarks" class="<?php echo $view_patient_billing->RealizationRemarks->headerCellClass() ?>"><div id="elh_view_patient_billing_RealizationRemarks" class="view_patient_billing_RealizationRemarks"><div class="ew-table-header-caption"><?php echo $view_patient_billing->RealizationRemarks->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RealizationRemarks" class="<?php echo $view_patient_billing->RealizationRemarks->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_billing->SortUrl($view_patient_billing->RealizationRemarks) ?>',1);"><div id="elh_view_patient_billing_RealizationRemarks" class="view_patient_billing_RealizationRemarks">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_billing->RealizationRemarks->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_billing->RealizationRemarks->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_billing->RealizationRemarks->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_billing->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
	<?php if ($view_patient_billing->sortUrl($view_patient_billing->RealizationBatchNo) == "") { ?>
		<th data-name="RealizationBatchNo" class="<?php echo $view_patient_billing->RealizationBatchNo->headerCellClass() ?>"><div id="elh_view_patient_billing_RealizationBatchNo" class="view_patient_billing_RealizationBatchNo"><div class="ew-table-header-caption"><?php echo $view_patient_billing->RealizationBatchNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RealizationBatchNo" class="<?php echo $view_patient_billing->RealizationBatchNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_billing->SortUrl($view_patient_billing->RealizationBatchNo) ?>',1);"><div id="elh_view_patient_billing_RealizationBatchNo" class="view_patient_billing_RealizationBatchNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_billing->RealizationBatchNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_billing->RealizationBatchNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_billing->RealizationBatchNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_billing->RealizationDate->Visible) { // RealizationDate ?>
	<?php if ($view_patient_billing->sortUrl($view_patient_billing->RealizationDate) == "") { ?>
		<th data-name="RealizationDate" class="<?php echo $view_patient_billing->RealizationDate->headerCellClass() ?>"><div id="elh_view_patient_billing_RealizationDate" class="view_patient_billing_RealizationDate"><div class="ew-table-header-caption"><?php echo $view_patient_billing->RealizationDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RealizationDate" class="<?php echo $view_patient_billing->RealizationDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_billing->SortUrl($view_patient_billing->RealizationDate) ?>',1);"><div id="elh_view_patient_billing_RealizationDate" class="view_patient_billing_RealizationDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_billing->RealizationDate->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_billing->RealizationDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_billing->RealizationDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_billing->RIDNO->Visible) { // RIDNO ?>
	<?php if ($view_patient_billing->sortUrl($view_patient_billing->RIDNO) == "") { ?>
		<th data-name="RIDNO" class="<?php echo $view_patient_billing->RIDNO->headerCellClass() ?>"><div id="elh_view_patient_billing_RIDNO" class="view_patient_billing_RIDNO"><div class="ew-table-header-caption"><?php echo $view_patient_billing->RIDNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RIDNO" class="<?php echo $view_patient_billing->RIDNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_billing->SortUrl($view_patient_billing->RIDNO) ?>',1);"><div id="elh_view_patient_billing_RIDNO" class="view_patient_billing_RIDNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_billing->RIDNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_billing->RIDNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_billing->RIDNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_billing->TidNo->Visible) { // TidNo ?>
	<?php if ($view_patient_billing->sortUrl($view_patient_billing->TidNo) == "") { ?>
		<th data-name="TidNo" class="<?php echo $view_patient_billing->TidNo->headerCellClass() ?>"><div id="elh_view_patient_billing_TidNo" class="view_patient_billing_TidNo"><div class="ew-table-header-caption"><?php echo $view_patient_billing->TidNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TidNo" class="<?php echo $view_patient_billing->TidNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_billing->SortUrl($view_patient_billing->TidNo) ?>',1);"><div id="elh_view_patient_billing_TidNo" class="view_patient_billing_TidNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_billing->TidNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_billing->TidNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_billing->TidNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_billing->CId->Visible) { // CId ?>
	<?php if ($view_patient_billing->sortUrl($view_patient_billing->CId) == "") { ?>
		<th data-name="CId" class="<?php echo $view_patient_billing->CId->headerCellClass() ?>"><div id="elh_view_patient_billing_CId" class="view_patient_billing_CId"><div class="ew-table-header-caption"><?php echo $view_patient_billing->CId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CId" class="<?php echo $view_patient_billing->CId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_billing->SortUrl($view_patient_billing->CId) ?>',1);"><div id="elh_view_patient_billing_CId" class="view_patient_billing_CId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_billing->CId->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_billing->CId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_billing->CId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_billing->PartnerName->Visible) { // PartnerName ?>
	<?php if ($view_patient_billing->sortUrl($view_patient_billing->PartnerName) == "") { ?>
		<th data-name="PartnerName" class="<?php echo $view_patient_billing->PartnerName->headerCellClass() ?>"><div id="elh_view_patient_billing_PartnerName" class="view_patient_billing_PartnerName"><div class="ew-table-header-caption"><?php echo $view_patient_billing->PartnerName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerName" class="<?php echo $view_patient_billing->PartnerName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_billing->SortUrl($view_patient_billing->PartnerName) ?>',1);"><div id="elh_view_patient_billing_PartnerName" class="view_patient_billing_PartnerName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_billing->PartnerName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_billing->PartnerName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_billing->PartnerName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_billing->PayerType->Visible) { // PayerType ?>
	<?php if ($view_patient_billing->sortUrl($view_patient_billing->PayerType) == "") { ?>
		<th data-name="PayerType" class="<?php echo $view_patient_billing->PayerType->headerCellClass() ?>"><div id="elh_view_patient_billing_PayerType" class="view_patient_billing_PayerType"><div class="ew-table-header-caption"><?php echo $view_patient_billing->PayerType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PayerType" class="<?php echo $view_patient_billing->PayerType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_billing->SortUrl($view_patient_billing->PayerType) ?>',1);"><div id="elh_view_patient_billing_PayerType" class="view_patient_billing_PayerType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_billing->PayerType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_billing->PayerType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_billing->PayerType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_billing->Dob->Visible) { // Dob ?>
	<?php if ($view_patient_billing->sortUrl($view_patient_billing->Dob) == "") { ?>
		<th data-name="Dob" class="<?php echo $view_patient_billing->Dob->headerCellClass() ?>"><div id="elh_view_patient_billing_Dob" class="view_patient_billing_Dob"><div class="ew-table-header-caption"><?php echo $view_patient_billing->Dob->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Dob" class="<?php echo $view_patient_billing->Dob->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_billing->SortUrl($view_patient_billing->Dob) ?>',1);"><div id="elh_view_patient_billing_Dob" class="view_patient_billing_Dob">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_billing->Dob->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_billing->Dob->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_billing->Dob->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_billing->Currency->Visible) { // Currency ?>
	<?php if ($view_patient_billing->sortUrl($view_patient_billing->Currency) == "") { ?>
		<th data-name="Currency" class="<?php echo $view_patient_billing->Currency->headerCellClass() ?>"><div id="elh_view_patient_billing_Currency" class="view_patient_billing_Currency"><div class="ew-table-header-caption"><?php echo $view_patient_billing->Currency->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Currency" class="<?php echo $view_patient_billing->Currency->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_billing->SortUrl($view_patient_billing->Currency) ?>',1);"><div id="elh_view_patient_billing_Currency" class="view_patient_billing_Currency">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_billing->Currency->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_billing->Currency->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_billing->Currency->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_billing->DiscountRemarks->Visible) { // DiscountRemarks ?>
	<?php if ($view_patient_billing->sortUrl($view_patient_billing->DiscountRemarks) == "") { ?>
		<th data-name="DiscountRemarks" class="<?php echo $view_patient_billing->DiscountRemarks->headerCellClass() ?>"><div id="elh_view_patient_billing_DiscountRemarks" class="view_patient_billing_DiscountRemarks"><div class="ew-table-header-caption"><?php echo $view_patient_billing->DiscountRemarks->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DiscountRemarks" class="<?php echo $view_patient_billing->DiscountRemarks->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_billing->SortUrl($view_patient_billing->DiscountRemarks) ?>',1);"><div id="elh_view_patient_billing_DiscountRemarks" class="view_patient_billing_DiscountRemarks">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_billing->DiscountRemarks->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_billing->DiscountRemarks->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_billing->DiscountRemarks->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_billing->Remarks->Visible) { // Remarks ?>
	<?php if ($view_patient_billing->sortUrl($view_patient_billing->Remarks) == "") { ?>
		<th data-name="Remarks" class="<?php echo $view_patient_billing->Remarks->headerCellClass() ?>"><div id="elh_view_patient_billing_Remarks" class="view_patient_billing_Remarks"><div class="ew-table-header-caption"><?php echo $view_patient_billing->Remarks->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Remarks" class="<?php echo $view_patient_billing->Remarks->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_billing->SortUrl($view_patient_billing->Remarks) ?>',1);"><div id="elh_view_patient_billing_Remarks" class="view_patient_billing_Remarks">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_billing->Remarks->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_billing->Remarks->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_billing->Remarks->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_billing->PatId->Visible) { // PatId ?>
	<?php if ($view_patient_billing->sortUrl($view_patient_billing->PatId) == "") { ?>
		<th data-name="PatId" class="<?php echo $view_patient_billing->PatId->headerCellClass() ?>"><div id="elh_view_patient_billing_PatId" class="view_patient_billing_PatId"><div class="ew-table-header-caption"><?php echo $view_patient_billing->PatId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatId" class="<?php echo $view_patient_billing->PatId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_billing->SortUrl($view_patient_billing->PatId) ?>',1);"><div id="elh_view_patient_billing_PatId" class="view_patient_billing_PatId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_billing->PatId->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_billing->PatId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_billing->PatId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_patient_billing_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_patient_billing->ExportAll && $view_patient_billing->isExport()) {
	$view_patient_billing_list->StopRec = $view_patient_billing_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_patient_billing_list->TotalRecs > $view_patient_billing_list->StartRec + $view_patient_billing_list->DisplayRecs - 1)
		$view_patient_billing_list->StopRec = $view_patient_billing_list->StartRec + $view_patient_billing_list->DisplayRecs - 1;
	else
		$view_patient_billing_list->StopRec = $view_patient_billing_list->TotalRecs;
}
$view_patient_billing_list->RecCnt = $view_patient_billing_list->StartRec - 1;
if ($view_patient_billing_list->Recordset && !$view_patient_billing_list->Recordset->EOF) {
	$view_patient_billing_list->Recordset->moveFirst();
	$selectLimit = $view_patient_billing_list->UseSelectLimit;
	if (!$selectLimit && $view_patient_billing_list->StartRec > 1)
		$view_patient_billing_list->Recordset->move($view_patient_billing_list->StartRec - 1);
} elseif (!$view_patient_billing->AllowAddDeleteRow && $view_patient_billing_list->StopRec == 0) {
	$view_patient_billing_list->StopRec = $view_patient_billing->GridAddRowCount;
}

// Initialize aggregate
$view_patient_billing->RowType = ROWTYPE_AGGREGATEINIT;
$view_patient_billing->resetAttributes();
$view_patient_billing_list->renderRow();
while ($view_patient_billing_list->RecCnt < $view_patient_billing_list->StopRec) {
	$view_patient_billing_list->RecCnt++;
	if ($view_patient_billing_list->RecCnt >= $view_patient_billing_list->StartRec) {
		$view_patient_billing_list->RowCnt++;

		// Set up key count
		$view_patient_billing_list->KeyCount = $view_patient_billing_list->RowIndex;

		// Init row class and style
		$view_patient_billing->resetAttributes();
		$view_patient_billing->CssClass = "";
		if ($view_patient_billing->isGridAdd()) {
		} else {
			$view_patient_billing_list->loadRowValues($view_patient_billing_list->Recordset); // Load row values
		}
		$view_patient_billing->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_patient_billing->RowAttrs = array_merge($view_patient_billing->RowAttrs, array('data-rowindex'=>$view_patient_billing_list->RowCnt, 'id'=>'r' . $view_patient_billing_list->RowCnt . '_view_patient_billing', 'data-rowtype'=>$view_patient_billing->RowType));

		// Render row
		$view_patient_billing_list->renderRow();

		// Render list options
		$view_patient_billing_list->renderListOptions();
?>
	<tr<?php echo $view_patient_billing->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_patient_billing_list->ListOptions->render("body", "left", $view_patient_billing_list->RowCnt);
?>
	<?php if ($view_patient_billing->id->Visible) { // id ?>
		<td data-name="id"<?php echo $view_patient_billing->id->cellAttributes() ?>>
<span id="el<?php echo $view_patient_billing_list->RowCnt ?>_view_patient_billing_id" class="view_patient_billing_id">
<span<?php echo $view_patient_billing->id->viewAttributes() ?>>
<?php echo $view_patient_billing->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_billing->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno"<?php echo $view_patient_billing->mrnno->cellAttributes() ?>>
<span id="el<?php echo $view_patient_billing_list->RowCnt ?>_view_patient_billing_mrnno" class="view_patient_billing_mrnno">
<span<?php echo $view_patient_billing->mrnno->viewAttributes() ?>>
<?php echo $view_patient_billing->mrnno->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_billing->Gender->Visible) { // Gender ?>
		<td data-name="Gender"<?php echo $view_patient_billing->Gender->cellAttributes() ?>>
<span id="el<?php echo $view_patient_billing_list->RowCnt ?>_view_patient_billing_Gender" class="view_patient_billing_Gender">
<span<?php echo $view_patient_billing->Gender->viewAttributes() ?>>
<?php echo $view_patient_billing->Gender->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_billing->Age->Visible) { // Age ?>
		<td data-name="Age"<?php echo $view_patient_billing->Age->cellAttributes() ?>>
<span id="el<?php echo $view_patient_billing_list->RowCnt ?>_view_patient_billing_Age" class="view_patient_billing_Age">
<span<?php echo $view_patient_billing->Age->viewAttributes() ?>>
<?php echo $view_patient_billing->Age->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_billing->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $view_patient_billing->createdby->cellAttributes() ?>>
<span id="el<?php echo $view_patient_billing_list->RowCnt ?>_view_patient_billing_createdby" class="view_patient_billing_createdby">
<span<?php echo $view_patient_billing->createdby->viewAttributes() ?>>
<?php echo $view_patient_billing->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_billing->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $view_patient_billing->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_patient_billing_list->RowCnt ?>_view_patient_billing_createddatetime" class="view_patient_billing_createddatetime">
<span<?php echo $view_patient_billing->createddatetime->viewAttributes() ?>>
<?php echo $view_patient_billing->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_billing->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $view_patient_billing->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $view_patient_billing_list->RowCnt ?>_view_patient_billing_modifiedby" class="view_patient_billing_modifiedby">
<span<?php echo $view_patient_billing->modifiedby->viewAttributes() ?>>
<?php echo $view_patient_billing->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_billing->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $view_patient_billing->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_patient_billing_list->RowCnt ?>_view_patient_billing_modifieddatetime" class="view_patient_billing_modifieddatetime">
<span<?php echo $view_patient_billing->modifieddatetime->viewAttributes() ?>>
<?php echo $view_patient_billing->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_billing->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId"<?php echo $view_patient_billing->PatientId->cellAttributes() ?>>
<span id="el<?php echo $view_patient_billing_list->RowCnt ?>_view_patient_billing_PatientId" class="view_patient_billing_PatientId">
<span<?php echo $view_patient_billing->PatientId->viewAttributes() ?>>
<?php echo $view_patient_billing->PatientId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_billing->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_patient_billing->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_patient_billing_list->RowCnt ?>_view_patient_billing_HospID" class="view_patient_billing_HospID">
<span<?php echo $view_patient_billing->HospID->viewAttributes() ?>>
<?php echo $view_patient_billing->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_billing->Reception->Visible) { // Reception ?>
		<td data-name="Reception"<?php echo $view_patient_billing->Reception->cellAttributes() ?>>
<span id="el<?php echo $view_patient_billing_list->RowCnt ?>_view_patient_billing_Reception" class="view_patient_billing_Reception">
<span<?php echo $view_patient_billing->Reception->viewAttributes() ?>>
<?php echo $view_patient_billing->Reception->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_billing->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $view_patient_billing->PatientName->cellAttributes() ?>>
<span id="el<?php echo $view_patient_billing_list->RowCnt ?>_view_patient_billing_PatientName" class="view_patient_billing_PatientName">
<span<?php echo $view_patient_billing->PatientName->viewAttributes() ?>>
<?php echo $view_patient_billing->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_billing->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile"<?php echo $view_patient_billing->Mobile->cellAttributes() ?>>
<span id="el<?php echo $view_patient_billing_list->RowCnt ?>_view_patient_billing_Mobile" class="view_patient_billing_Mobile">
<span<?php echo $view_patient_billing->Mobile->viewAttributes() ?>>
<?php echo $view_patient_billing->Mobile->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_billing->IP_OP->Visible) { // IP_OP ?>
		<td data-name="IP_OP"<?php echo $view_patient_billing->IP_OP->cellAttributes() ?>>
<span id="el<?php echo $view_patient_billing_list->RowCnt ?>_view_patient_billing_IP_OP" class="view_patient_billing_IP_OP">
<span<?php echo $view_patient_billing->IP_OP->viewAttributes() ?>>
<?php echo $view_patient_billing->IP_OP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_billing->Doctor->Visible) { // Doctor ?>
		<td data-name="Doctor"<?php echo $view_patient_billing->Doctor->cellAttributes() ?>>
<span id="el<?php echo $view_patient_billing_list->RowCnt ?>_view_patient_billing_Doctor" class="view_patient_billing_Doctor">
<span<?php echo $view_patient_billing->Doctor->viewAttributes() ?>>
<?php echo $view_patient_billing->Doctor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_billing->voucher_type->Visible) { // voucher_type ?>
		<td data-name="voucher_type"<?php echo $view_patient_billing->voucher_type->cellAttributes() ?>>
<span id="el<?php echo $view_patient_billing_list->RowCnt ?>_view_patient_billing_voucher_type" class="view_patient_billing_voucher_type">
<span<?php echo $view_patient_billing->voucher_type->viewAttributes() ?>>
<?php echo $view_patient_billing->voucher_type->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_billing->Details->Visible) { // Details ?>
		<td data-name="Details"<?php echo $view_patient_billing->Details->cellAttributes() ?>>
<span id="el<?php echo $view_patient_billing_list->RowCnt ?>_view_patient_billing_Details" class="view_patient_billing_Details">
<span<?php echo $view_patient_billing->Details->viewAttributes() ?>>
<?php echo $view_patient_billing->Details->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_billing->ModeofPayment->Visible) { // ModeofPayment ?>
		<td data-name="ModeofPayment"<?php echo $view_patient_billing->ModeofPayment->cellAttributes() ?>>
<span id="el<?php echo $view_patient_billing_list->RowCnt ?>_view_patient_billing_ModeofPayment" class="view_patient_billing_ModeofPayment">
<span<?php echo $view_patient_billing->ModeofPayment->viewAttributes() ?>>
<?php echo $view_patient_billing->ModeofPayment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_billing->Amount->Visible) { // Amount ?>
		<td data-name="Amount"<?php echo $view_patient_billing->Amount->cellAttributes() ?>>
<span id="el<?php echo $view_patient_billing_list->RowCnt ?>_view_patient_billing_Amount" class="view_patient_billing_Amount">
<span<?php echo $view_patient_billing->Amount->viewAttributes() ?>>
<?php echo $view_patient_billing->Amount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_billing->AnyDues->Visible) { // AnyDues ?>
		<td data-name="AnyDues"<?php echo $view_patient_billing->AnyDues->cellAttributes() ?>>
<span id="el<?php echo $view_patient_billing_list->RowCnt ?>_view_patient_billing_AnyDues" class="view_patient_billing_AnyDues">
<span<?php echo $view_patient_billing->AnyDues->viewAttributes() ?>>
<?php echo $view_patient_billing->AnyDues->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_billing->RealizationAmount->Visible) { // RealizationAmount ?>
		<td data-name="RealizationAmount"<?php echo $view_patient_billing->RealizationAmount->cellAttributes() ?>>
<span id="el<?php echo $view_patient_billing_list->RowCnt ?>_view_patient_billing_RealizationAmount" class="view_patient_billing_RealizationAmount">
<span<?php echo $view_patient_billing->RealizationAmount->viewAttributes() ?>>
<?php echo $view_patient_billing->RealizationAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_billing->RealizationStatus->Visible) { // RealizationStatus ?>
		<td data-name="RealizationStatus"<?php echo $view_patient_billing->RealizationStatus->cellAttributes() ?>>
<span id="el<?php echo $view_patient_billing_list->RowCnt ?>_view_patient_billing_RealizationStatus" class="view_patient_billing_RealizationStatus">
<span<?php echo $view_patient_billing->RealizationStatus->viewAttributes() ?>>
<?php echo $view_patient_billing->RealizationStatus->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_billing->RealizationRemarks->Visible) { // RealizationRemarks ?>
		<td data-name="RealizationRemarks"<?php echo $view_patient_billing->RealizationRemarks->cellAttributes() ?>>
<span id="el<?php echo $view_patient_billing_list->RowCnt ?>_view_patient_billing_RealizationRemarks" class="view_patient_billing_RealizationRemarks">
<span<?php echo $view_patient_billing->RealizationRemarks->viewAttributes() ?>>
<?php echo $view_patient_billing->RealizationRemarks->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_billing->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
		<td data-name="RealizationBatchNo"<?php echo $view_patient_billing->RealizationBatchNo->cellAttributes() ?>>
<span id="el<?php echo $view_patient_billing_list->RowCnt ?>_view_patient_billing_RealizationBatchNo" class="view_patient_billing_RealizationBatchNo">
<span<?php echo $view_patient_billing->RealizationBatchNo->viewAttributes() ?>>
<?php echo $view_patient_billing->RealizationBatchNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_billing->RealizationDate->Visible) { // RealizationDate ?>
		<td data-name="RealizationDate"<?php echo $view_patient_billing->RealizationDate->cellAttributes() ?>>
<span id="el<?php echo $view_patient_billing_list->RowCnt ?>_view_patient_billing_RealizationDate" class="view_patient_billing_RealizationDate">
<span<?php echo $view_patient_billing->RealizationDate->viewAttributes() ?>>
<?php echo $view_patient_billing->RealizationDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_billing->RIDNO->Visible) { // RIDNO ?>
		<td data-name="RIDNO"<?php echo $view_patient_billing->RIDNO->cellAttributes() ?>>
<span id="el<?php echo $view_patient_billing_list->RowCnt ?>_view_patient_billing_RIDNO" class="view_patient_billing_RIDNO">
<span<?php echo $view_patient_billing->RIDNO->viewAttributes() ?>>
<?php echo $view_patient_billing->RIDNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_billing->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo"<?php echo $view_patient_billing->TidNo->cellAttributes() ?>>
<span id="el<?php echo $view_patient_billing_list->RowCnt ?>_view_patient_billing_TidNo" class="view_patient_billing_TidNo">
<span<?php echo $view_patient_billing->TidNo->viewAttributes() ?>>
<?php echo $view_patient_billing->TidNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_billing->CId->Visible) { // CId ?>
		<td data-name="CId"<?php echo $view_patient_billing->CId->cellAttributes() ?>>
<span id="el<?php echo $view_patient_billing_list->RowCnt ?>_view_patient_billing_CId" class="view_patient_billing_CId">
<span<?php echo $view_patient_billing->CId->viewAttributes() ?>>
<?php echo $view_patient_billing->CId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_billing->PartnerName->Visible) { // PartnerName ?>
		<td data-name="PartnerName"<?php echo $view_patient_billing->PartnerName->cellAttributes() ?>>
<span id="el<?php echo $view_patient_billing_list->RowCnt ?>_view_patient_billing_PartnerName" class="view_patient_billing_PartnerName">
<span<?php echo $view_patient_billing->PartnerName->viewAttributes() ?>>
<?php echo $view_patient_billing->PartnerName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_billing->PayerType->Visible) { // PayerType ?>
		<td data-name="PayerType"<?php echo $view_patient_billing->PayerType->cellAttributes() ?>>
<span id="el<?php echo $view_patient_billing_list->RowCnt ?>_view_patient_billing_PayerType" class="view_patient_billing_PayerType">
<span<?php echo $view_patient_billing->PayerType->viewAttributes() ?>>
<?php echo $view_patient_billing->PayerType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_billing->Dob->Visible) { // Dob ?>
		<td data-name="Dob"<?php echo $view_patient_billing->Dob->cellAttributes() ?>>
<span id="el<?php echo $view_patient_billing_list->RowCnt ?>_view_patient_billing_Dob" class="view_patient_billing_Dob">
<span<?php echo $view_patient_billing->Dob->viewAttributes() ?>>
<?php echo $view_patient_billing->Dob->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_billing->Currency->Visible) { // Currency ?>
		<td data-name="Currency"<?php echo $view_patient_billing->Currency->cellAttributes() ?>>
<span id="el<?php echo $view_patient_billing_list->RowCnt ?>_view_patient_billing_Currency" class="view_patient_billing_Currency">
<span<?php echo $view_patient_billing->Currency->viewAttributes() ?>>
<?php echo $view_patient_billing->Currency->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_billing->DiscountRemarks->Visible) { // DiscountRemarks ?>
		<td data-name="DiscountRemarks"<?php echo $view_patient_billing->DiscountRemarks->cellAttributes() ?>>
<span id="el<?php echo $view_patient_billing_list->RowCnt ?>_view_patient_billing_DiscountRemarks" class="view_patient_billing_DiscountRemarks">
<span<?php echo $view_patient_billing->DiscountRemarks->viewAttributes() ?>>
<?php echo $view_patient_billing->DiscountRemarks->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_billing->Remarks->Visible) { // Remarks ?>
		<td data-name="Remarks"<?php echo $view_patient_billing->Remarks->cellAttributes() ?>>
<span id="el<?php echo $view_patient_billing_list->RowCnt ?>_view_patient_billing_Remarks" class="view_patient_billing_Remarks">
<span<?php echo $view_patient_billing->Remarks->viewAttributes() ?>>
<?php echo $view_patient_billing->Remarks->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_billing->PatId->Visible) { // PatId ?>
		<td data-name="PatId"<?php echo $view_patient_billing->PatId->cellAttributes() ?>>
<span id="el<?php echo $view_patient_billing_list->RowCnt ?>_view_patient_billing_PatId" class="view_patient_billing_PatId">
<span<?php echo $view_patient_billing->PatId->viewAttributes() ?>>
<?php echo $view_patient_billing->PatId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_patient_billing_list->ListOptions->render("body", "right", $view_patient_billing_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_patient_billing->isGridAdd())
		$view_patient_billing_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_patient_billing->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_patient_billing_list->Recordset)
	$view_patient_billing_list->Recordset->Close();
?>
<?php if (!$view_patient_billing->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_patient_billing->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_patient_billing_list->Pager)) $view_patient_billing_list->Pager = new NumericPager($view_patient_billing_list->StartRec, $view_patient_billing_list->DisplayRecs, $view_patient_billing_list->TotalRecs, $view_patient_billing_list->RecRange, $view_patient_billing_list->AutoHidePager) ?>
<?php if ($view_patient_billing_list->Pager->RecordCount > 0 && $view_patient_billing_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_patient_billing_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_patient_billing_list->pageUrl() ?>start=<?php echo $view_patient_billing_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_patient_billing_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_patient_billing_list->pageUrl() ?>start=<?php echo $view_patient_billing_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_patient_billing_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_patient_billing_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_patient_billing_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_patient_billing_list->pageUrl() ?>start=<?php echo $view_patient_billing_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_patient_billing_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_patient_billing_list->pageUrl() ?>start=<?php echo $view_patient_billing_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_patient_billing_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_patient_billing_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_patient_billing_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_patient_billing_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_patient_billing_list->TotalRecs > 0 && (!$view_patient_billing_list->AutoHidePageSizeSelector || $view_patient_billing_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_patient_billing">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_patient_billing_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_patient_billing_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_patient_billing_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_patient_billing_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_patient_billing_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_patient_billing_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_patient_billing->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_patient_billing_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_patient_billing_list->TotalRecs == 0 && !$view_patient_billing->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_patient_billing_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_patient_billing_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_patient_billing->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_patient_billing->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_patient_billing", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_patient_billing_list->terminate();
?>