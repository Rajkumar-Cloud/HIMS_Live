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
$view_ip_af_billing_list = new view_ip_af_billing_list();

// Run the page
$view_ip_af_billing_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_ip_af_billing_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_ip_af_billing->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_ip_af_billinglist = currentForm = new ew.Form("fview_ip_af_billinglist", "list");
fview_ip_af_billinglist.formKeyCountName = '<?php echo $view_ip_af_billing_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_ip_af_billinglist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_ip_af_billinglist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fview_ip_af_billinglistsrch = currentSearchForm = new ew.Form("fview_ip_af_billinglistsrch");

// Filters
fview_ip_af_billinglistsrch.filterList = <?php echo $view_ip_af_billing_list->getFilterList() ?>;
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
<?php if (!$view_ip_af_billing->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_ip_af_billing_list->TotalRecs > 0 && $view_ip_af_billing_list->ExportOptions->visible()) { ?>
<?php $view_ip_af_billing_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_ip_af_billing_list->ImportOptions->visible()) { ?>
<?php $view_ip_af_billing_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_ip_af_billing_list->SearchOptions->visible()) { ?>
<?php $view_ip_af_billing_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_ip_af_billing_list->FilterOptions->visible()) { ?>
<?php $view_ip_af_billing_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_ip_af_billing_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_ip_af_billing->isExport() && !$view_ip_af_billing->CurrentAction) { ?>
<form name="fview_ip_af_billinglistsrch" id="fview_ip_af_billinglistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_ip_af_billing_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_ip_af_billinglistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_ip_af_billing">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_ip_af_billing_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_ip_af_billing_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_ip_af_billing_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_ip_af_billing_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_ip_af_billing_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_ip_af_billing_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_ip_af_billing_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_ip_af_billing_list->showPageHeader(); ?>
<?php
$view_ip_af_billing_list->showMessage();
?>
<?php if ($view_ip_af_billing_list->TotalRecs > 0 || $view_ip_af_billing->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_ip_af_billing_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_ip_af_billing">
<?php if (!$view_ip_af_billing->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_ip_af_billing->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_ip_af_billing_list->Pager)) $view_ip_af_billing_list->Pager = new NumericPager($view_ip_af_billing_list->StartRec, $view_ip_af_billing_list->DisplayRecs, $view_ip_af_billing_list->TotalRecs, $view_ip_af_billing_list->RecRange, $view_ip_af_billing_list->AutoHidePager) ?>
<?php if ($view_ip_af_billing_list->Pager->RecordCount > 0 && $view_ip_af_billing_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_ip_af_billing_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ip_af_billing_list->pageUrl() ?>start=<?php echo $view_ip_af_billing_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_ip_af_billing_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ip_af_billing_list->pageUrl() ?>start=<?php echo $view_ip_af_billing_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_ip_af_billing_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_ip_af_billing_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_ip_af_billing_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ip_af_billing_list->pageUrl() ?>start=<?php echo $view_ip_af_billing_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_ip_af_billing_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ip_af_billing_list->pageUrl() ?>start=<?php echo $view_ip_af_billing_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_ip_af_billing_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_ip_af_billing_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_ip_af_billing_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_ip_af_billing_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_ip_af_billing_list->TotalRecs > 0 && (!$view_ip_af_billing_list->AutoHidePageSizeSelector || $view_ip_af_billing_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_ip_af_billing">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_ip_af_billing_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_ip_af_billing_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_ip_af_billing_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_ip_af_billing_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_ip_af_billing_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_ip_af_billing_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_ip_af_billing->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_ip_af_billing_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_ip_af_billinglist" id="fview_ip_af_billinglist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_ip_af_billing_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_ip_af_billing_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_ip_af_billing">
<div id="gmp_view_ip_af_billing" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_ip_af_billing_list->TotalRecs > 0 || $view_ip_af_billing->isGridEdit()) { ?>
<table id="tbl_view_ip_af_billinglist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_ip_af_billing_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_ip_af_billing_list->renderListOptions();

// Render list options (header, left)
$view_ip_af_billing_list->ListOptions->render("header", "left");
?>
<?php if ($view_ip_af_billing->id->Visible) { // id ?>
	<?php if ($view_ip_af_billing->sortUrl($view_ip_af_billing->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_ip_af_billing->id->headerCellClass() ?>"><div id="elh_view_ip_af_billing_id" class="view_ip_af_billing_id"><div class="ew-table-header-caption"><?php echo $view_ip_af_billing->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_ip_af_billing->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_af_billing->SortUrl($view_ip_af_billing->id) ?>',1);"><div id="elh_view_ip_af_billing_id" class="view_ip_af_billing_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_af_billing->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_af_billing->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_af_billing->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_af_billing->mrnno->Visible) { // mrnno ?>
	<?php if ($view_ip_af_billing->sortUrl($view_ip_af_billing->mrnno) == "") { ?>
		<th data-name="mrnno" class="<?php echo $view_ip_af_billing->mrnno->headerCellClass() ?>"><div id="elh_view_ip_af_billing_mrnno" class="view_ip_af_billing_mrnno"><div class="ew-table-header-caption"><?php echo $view_ip_af_billing->mrnno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnno" class="<?php echo $view_ip_af_billing->mrnno->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_af_billing->SortUrl($view_ip_af_billing->mrnno) ?>',1);"><div id="elh_view_ip_af_billing_mrnno" class="view_ip_af_billing_mrnno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_af_billing->mrnno->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_af_billing->mrnno->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_af_billing->mrnno->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_af_billing->Gender->Visible) { // Gender ?>
	<?php if ($view_ip_af_billing->sortUrl($view_ip_af_billing->Gender) == "") { ?>
		<th data-name="Gender" class="<?php echo $view_ip_af_billing->Gender->headerCellClass() ?>"><div id="elh_view_ip_af_billing_Gender" class="view_ip_af_billing_Gender"><div class="ew-table-header-caption"><?php echo $view_ip_af_billing->Gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gender" class="<?php echo $view_ip_af_billing->Gender->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_af_billing->SortUrl($view_ip_af_billing->Gender) ?>',1);"><div id="elh_view_ip_af_billing_Gender" class="view_ip_af_billing_Gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_af_billing->Gender->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_af_billing->Gender->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_af_billing->Gender->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_af_billing->Age->Visible) { // Age ?>
	<?php if ($view_ip_af_billing->sortUrl($view_ip_af_billing->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $view_ip_af_billing->Age->headerCellClass() ?>"><div id="elh_view_ip_af_billing_Age" class="view_ip_af_billing_Age"><div class="ew-table-header-caption"><?php echo $view_ip_af_billing->Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $view_ip_af_billing->Age->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_af_billing->SortUrl($view_ip_af_billing->Age) ?>',1);"><div id="elh_view_ip_af_billing_Age" class="view_ip_af_billing_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_af_billing->Age->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_af_billing->Age->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_af_billing->Age->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_af_billing->createdby->Visible) { // createdby ?>
	<?php if ($view_ip_af_billing->sortUrl($view_ip_af_billing->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $view_ip_af_billing->createdby->headerCellClass() ?>"><div id="elh_view_ip_af_billing_createdby" class="view_ip_af_billing_createdby"><div class="ew-table-header-caption"><?php echo $view_ip_af_billing->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $view_ip_af_billing->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_af_billing->SortUrl($view_ip_af_billing->createdby) ?>',1);"><div id="elh_view_ip_af_billing_createdby" class="view_ip_af_billing_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_af_billing->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_af_billing->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_af_billing->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_af_billing->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_ip_af_billing->sortUrl($view_ip_af_billing->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_ip_af_billing->createddatetime->headerCellClass() ?>"><div id="elh_view_ip_af_billing_createddatetime" class="view_ip_af_billing_createddatetime"><div class="ew-table-header-caption"><?php echo $view_ip_af_billing->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_ip_af_billing->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_af_billing->SortUrl($view_ip_af_billing->createddatetime) ?>',1);"><div id="elh_view_ip_af_billing_createddatetime" class="view_ip_af_billing_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_af_billing->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_af_billing->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_af_billing->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_af_billing->modifiedby->Visible) { // modifiedby ?>
	<?php if ($view_ip_af_billing->sortUrl($view_ip_af_billing->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $view_ip_af_billing->modifiedby->headerCellClass() ?>"><div id="elh_view_ip_af_billing_modifiedby" class="view_ip_af_billing_modifiedby"><div class="ew-table-header-caption"><?php echo $view_ip_af_billing->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $view_ip_af_billing->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_af_billing->SortUrl($view_ip_af_billing->modifiedby) ?>',1);"><div id="elh_view_ip_af_billing_modifiedby" class="view_ip_af_billing_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_af_billing->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_af_billing->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_af_billing->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_af_billing->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($view_ip_af_billing->sortUrl($view_ip_af_billing->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_ip_af_billing->modifieddatetime->headerCellClass() ?>"><div id="elh_view_ip_af_billing_modifieddatetime" class="view_ip_af_billing_modifieddatetime"><div class="ew-table-header-caption"><?php echo $view_ip_af_billing->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_ip_af_billing->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_af_billing->SortUrl($view_ip_af_billing->modifieddatetime) ?>',1);"><div id="elh_view_ip_af_billing_modifieddatetime" class="view_ip_af_billing_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_af_billing->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_af_billing->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_af_billing->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_af_billing->PatientId->Visible) { // PatientId ?>
	<?php if ($view_ip_af_billing->sortUrl($view_ip_af_billing->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $view_ip_af_billing->PatientId->headerCellClass() ?>"><div id="elh_view_ip_af_billing_PatientId" class="view_ip_af_billing_PatientId"><div class="ew-table-header-caption"><?php echo $view_ip_af_billing->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $view_ip_af_billing->PatientId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_af_billing->SortUrl($view_ip_af_billing->PatientId) ?>',1);"><div id="elh_view_ip_af_billing_PatientId" class="view_ip_af_billing_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_af_billing->PatientId->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_af_billing->PatientId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_af_billing->PatientId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_af_billing->HospID->Visible) { // HospID ?>
	<?php if ($view_ip_af_billing->sortUrl($view_ip_af_billing->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_ip_af_billing->HospID->headerCellClass() ?>"><div id="elh_view_ip_af_billing_HospID" class="view_ip_af_billing_HospID"><div class="ew-table-header-caption"><?php echo $view_ip_af_billing->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_ip_af_billing->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_af_billing->SortUrl($view_ip_af_billing->HospID) ?>',1);"><div id="elh_view_ip_af_billing_HospID" class="view_ip_af_billing_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_af_billing->HospID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_af_billing->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_af_billing->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_af_billing->BillNumber->Visible) { // BillNumber ?>
	<?php if ($view_ip_af_billing->sortUrl($view_ip_af_billing->BillNumber) == "") { ?>
		<th data-name="BillNumber" class="<?php echo $view_ip_af_billing->BillNumber->headerCellClass() ?>"><div id="elh_view_ip_af_billing_BillNumber" class="view_ip_af_billing_BillNumber"><div class="ew-table-header-caption"><?php echo $view_ip_af_billing->BillNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillNumber" class="<?php echo $view_ip_af_billing->BillNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_af_billing->SortUrl($view_ip_af_billing->BillNumber) ?>',1);"><div id="elh_view_ip_af_billing_BillNumber" class="view_ip_af_billing_BillNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_af_billing->BillNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_af_billing->BillNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_af_billing->BillNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_af_billing->ReportHeader->Visible) { // ReportHeader ?>
	<?php if ($view_ip_af_billing->sortUrl($view_ip_af_billing->ReportHeader) == "") { ?>
		<th data-name="ReportHeader" class="<?php echo $view_ip_af_billing->ReportHeader->headerCellClass() ?>"><div id="elh_view_ip_af_billing_ReportHeader" class="view_ip_af_billing_ReportHeader"><div class="ew-table-header-caption"><?php echo $view_ip_af_billing->ReportHeader->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReportHeader" class="<?php echo $view_ip_af_billing->ReportHeader->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_af_billing->SortUrl($view_ip_af_billing->ReportHeader) ?>',1);"><div id="elh_view_ip_af_billing_ReportHeader" class="view_ip_af_billing_ReportHeader">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_af_billing->ReportHeader->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_af_billing->ReportHeader->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_af_billing->ReportHeader->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_af_billing->Reception->Visible) { // Reception ?>
	<?php if ($view_ip_af_billing->sortUrl($view_ip_af_billing->Reception) == "") { ?>
		<th data-name="Reception" class="<?php echo $view_ip_af_billing->Reception->headerCellClass() ?>"><div id="elh_view_ip_af_billing_Reception" class="view_ip_af_billing_Reception"><div class="ew-table-header-caption"><?php echo $view_ip_af_billing->Reception->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Reception" class="<?php echo $view_ip_af_billing->Reception->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_af_billing->SortUrl($view_ip_af_billing->Reception) ?>',1);"><div id="elh_view_ip_af_billing_Reception" class="view_ip_af_billing_Reception">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_af_billing->Reception->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_af_billing->Reception->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_af_billing->Reception->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_af_billing->PatientName->Visible) { // PatientName ?>
	<?php if ($view_ip_af_billing->sortUrl($view_ip_af_billing->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $view_ip_af_billing->PatientName->headerCellClass() ?>"><div id="elh_view_ip_af_billing_PatientName" class="view_ip_af_billing_PatientName"><div class="ew-table-header-caption"><?php echo $view_ip_af_billing->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $view_ip_af_billing->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_af_billing->SortUrl($view_ip_af_billing->PatientName) ?>',1);"><div id="elh_view_ip_af_billing_PatientName" class="view_ip_af_billing_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_af_billing->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_af_billing->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_af_billing->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_af_billing->Mobile->Visible) { // Mobile ?>
	<?php if ($view_ip_af_billing->sortUrl($view_ip_af_billing->Mobile) == "") { ?>
		<th data-name="Mobile" class="<?php echo $view_ip_af_billing->Mobile->headerCellClass() ?>"><div id="elh_view_ip_af_billing_Mobile" class="view_ip_af_billing_Mobile"><div class="ew-table-header-caption"><?php echo $view_ip_af_billing->Mobile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mobile" class="<?php echo $view_ip_af_billing->Mobile->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_af_billing->SortUrl($view_ip_af_billing->Mobile) ?>',1);"><div id="elh_view_ip_af_billing_Mobile" class="view_ip_af_billing_Mobile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_af_billing->Mobile->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_af_billing->Mobile->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_af_billing->Mobile->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_af_billing->IP_OP->Visible) { // IP_OP ?>
	<?php if ($view_ip_af_billing->sortUrl($view_ip_af_billing->IP_OP) == "") { ?>
		<th data-name="IP_OP" class="<?php echo $view_ip_af_billing->IP_OP->headerCellClass() ?>"><div id="elh_view_ip_af_billing_IP_OP" class="view_ip_af_billing_IP_OP"><div class="ew-table-header-caption"><?php echo $view_ip_af_billing->IP_OP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IP_OP" class="<?php echo $view_ip_af_billing->IP_OP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_af_billing->SortUrl($view_ip_af_billing->IP_OP) ?>',1);"><div id="elh_view_ip_af_billing_IP_OP" class="view_ip_af_billing_IP_OP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_af_billing->IP_OP->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_af_billing->IP_OP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_af_billing->IP_OP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_af_billing->Doctor->Visible) { // Doctor ?>
	<?php if ($view_ip_af_billing->sortUrl($view_ip_af_billing->Doctor) == "") { ?>
		<th data-name="Doctor" class="<?php echo $view_ip_af_billing->Doctor->headerCellClass() ?>"><div id="elh_view_ip_af_billing_Doctor" class="view_ip_af_billing_Doctor"><div class="ew-table-header-caption"><?php echo $view_ip_af_billing->Doctor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Doctor" class="<?php echo $view_ip_af_billing->Doctor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_af_billing->SortUrl($view_ip_af_billing->Doctor) ?>',1);"><div id="elh_view_ip_af_billing_Doctor" class="view_ip_af_billing_Doctor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_af_billing->Doctor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_af_billing->Doctor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_af_billing->Doctor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_af_billing->voucher_type->Visible) { // voucher_type ?>
	<?php if ($view_ip_af_billing->sortUrl($view_ip_af_billing->voucher_type) == "") { ?>
		<th data-name="voucher_type" class="<?php echo $view_ip_af_billing->voucher_type->headerCellClass() ?>"><div id="elh_view_ip_af_billing_voucher_type" class="view_ip_af_billing_voucher_type"><div class="ew-table-header-caption"><?php echo $view_ip_af_billing->voucher_type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="voucher_type" class="<?php echo $view_ip_af_billing->voucher_type->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_af_billing->SortUrl($view_ip_af_billing->voucher_type) ?>',1);"><div id="elh_view_ip_af_billing_voucher_type" class="view_ip_af_billing_voucher_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_af_billing->voucher_type->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_af_billing->voucher_type->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_af_billing->voucher_type->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_af_billing->Details->Visible) { // Details ?>
	<?php if ($view_ip_af_billing->sortUrl($view_ip_af_billing->Details) == "") { ?>
		<th data-name="Details" class="<?php echo $view_ip_af_billing->Details->headerCellClass() ?>"><div id="elh_view_ip_af_billing_Details" class="view_ip_af_billing_Details"><div class="ew-table-header-caption"><?php echo $view_ip_af_billing->Details->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Details" class="<?php echo $view_ip_af_billing->Details->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_af_billing->SortUrl($view_ip_af_billing->Details) ?>',1);"><div id="elh_view_ip_af_billing_Details" class="view_ip_af_billing_Details">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_af_billing->Details->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_af_billing->Details->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_af_billing->Details->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_af_billing->ModeofPayment->Visible) { // ModeofPayment ?>
	<?php if ($view_ip_af_billing->sortUrl($view_ip_af_billing->ModeofPayment) == "") { ?>
		<th data-name="ModeofPayment" class="<?php echo $view_ip_af_billing->ModeofPayment->headerCellClass() ?>"><div id="elh_view_ip_af_billing_ModeofPayment" class="view_ip_af_billing_ModeofPayment"><div class="ew-table-header-caption"><?php echo $view_ip_af_billing->ModeofPayment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModeofPayment" class="<?php echo $view_ip_af_billing->ModeofPayment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_af_billing->SortUrl($view_ip_af_billing->ModeofPayment) ?>',1);"><div id="elh_view_ip_af_billing_ModeofPayment" class="view_ip_af_billing_ModeofPayment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_af_billing->ModeofPayment->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_af_billing->ModeofPayment->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_af_billing->ModeofPayment->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_af_billing->Amount->Visible) { // Amount ?>
	<?php if ($view_ip_af_billing->sortUrl($view_ip_af_billing->Amount) == "") { ?>
		<th data-name="Amount" class="<?php echo $view_ip_af_billing->Amount->headerCellClass() ?>"><div id="elh_view_ip_af_billing_Amount" class="view_ip_af_billing_Amount"><div class="ew-table-header-caption"><?php echo $view_ip_af_billing->Amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Amount" class="<?php echo $view_ip_af_billing->Amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_af_billing->SortUrl($view_ip_af_billing->Amount) ?>',1);"><div id="elh_view_ip_af_billing_Amount" class="view_ip_af_billing_Amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_af_billing->Amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_af_billing->Amount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_af_billing->Amount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_af_billing->AnyDues->Visible) { // AnyDues ?>
	<?php if ($view_ip_af_billing->sortUrl($view_ip_af_billing->AnyDues) == "") { ?>
		<th data-name="AnyDues" class="<?php echo $view_ip_af_billing->AnyDues->headerCellClass() ?>"><div id="elh_view_ip_af_billing_AnyDues" class="view_ip_af_billing_AnyDues"><div class="ew-table-header-caption"><?php echo $view_ip_af_billing->AnyDues->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AnyDues" class="<?php echo $view_ip_af_billing->AnyDues->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_af_billing->SortUrl($view_ip_af_billing->AnyDues) ?>',1);"><div id="elh_view_ip_af_billing_AnyDues" class="view_ip_af_billing_AnyDues">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_af_billing->AnyDues->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_af_billing->AnyDues->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_af_billing->AnyDues->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_af_billing->RealizationAmount->Visible) { // RealizationAmount ?>
	<?php if ($view_ip_af_billing->sortUrl($view_ip_af_billing->RealizationAmount) == "") { ?>
		<th data-name="RealizationAmount" class="<?php echo $view_ip_af_billing->RealizationAmount->headerCellClass() ?>"><div id="elh_view_ip_af_billing_RealizationAmount" class="view_ip_af_billing_RealizationAmount"><div class="ew-table-header-caption"><?php echo $view_ip_af_billing->RealizationAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RealizationAmount" class="<?php echo $view_ip_af_billing->RealizationAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_af_billing->SortUrl($view_ip_af_billing->RealizationAmount) ?>',1);"><div id="elh_view_ip_af_billing_RealizationAmount" class="view_ip_af_billing_RealizationAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_af_billing->RealizationAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_af_billing->RealizationAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_af_billing->RealizationAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_af_billing->RealizationStatus->Visible) { // RealizationStatus ?>
	<?php if ($view_ip_af_billing->sortUrl($view_ip_af_billing->RealizationStatus) == "") { ?>
		<th data-name="RealizationStatus" class="<?php echo $view_ip_af_billing->RealizationStatus->headerCellClass() ?>"><div id="elh_view_ip_af_billing_RealizationStatus" class="view_ip_af_billing_RealizationStatus"><div class="ew-table-header-caption"><?php echo $view_ip_af_billing->RealizationStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RealizationStatus" class="<?php echo $view_ip_af_billing->RealizationStatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_af_billing->SortUrl($view_ip_af_billing->RealizationStatus) ?>',1);"><div id="elh_view_ip_af_billing_RealizationStatus" class="view_ip_af_billing_RealizationStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_af_billing->RealizationStatus->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_af_billing->RealizationStatus->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_af_billing->RealizationStatus->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_af_billing->RealizationRemarks->Visible) { // RealizationRemarks ?>
	<?php if ($view_ip_af_billing->sortUrl($view_ip_af_billing->RealizationRemarks) == "") { ?>
		<th data-name="RealizationRemarks" class="<?php echo $view_ip_af_billing->RealizationRemarks->headerCellClass() ?>"><div id="elh_view_ip_af_billing_RealizationRemarks" class="view_ip_af_billing_RealizationRemarks"><div class="ew-table-header-caption"><?php echo $view_ip_af_billing->RealizationRemarks->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RealizationRemarks" class="<?php echo $view_ip_af_billing->RealizationRemarks->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_af_billing->SortUrl($view_ip_af_billing->RealizationRemarks) ?>',1);"><div id="elh_view_ip_af_billing_RealizationRemarks" class="view_ip_af_billing_RealizationRemarks">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_af_billing->RealizationRemarks->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_af_billing->RealizationRemarks->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_af_billing->RealizationRemarks->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_af_billing->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
	<?php if ($view_ip_af_billing->sortUrl($view_ip_af_billing->RealizationBatchNo) == "") { ?>
		<th data-name="RealizationBatchNo" class="<?php echo $view_ip_af_billing->RealizationBatchNo->headerCellClass() ?>"><div id="elh_view_ip_af_billing_RealizationBatchNo" class="view_ip_af_billing_RealizationBatchNo"><div class="ew-table-header-caption"><?php echo $view_ip_af_billing->RealizationBatchNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RealizationBatchNo" class="<?php echo $view_ip_af_billing->RealizationBatchNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_af_billing->SortUrl($view_ip_af_billing->RealizationBatchNo) ?>',1);"><div id="elh_view_ip_af_billing_RealizationBatchNo" class="view_ip_af_billing_RealizationBatchNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_af_billing->RealizationBatchNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_af_billing->RealizationBatchNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_af_billing->RealizationBatchNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_af_billing->RealizationDate->Visible) { // RealizationDate ?>
	<?php if ($view_ip_af_billing->sortUrl($view_ip_af_billing->RealizationDate) == "") { ?>
		<th data-name="RealizationDate" class="<?php echo $view_ip_af_billing->RealizationDate->headerCellClass() ?>"><div id="elh_view_ip_af_billing_RealizationDate" class="view_ip_af_billing_RealizationDate"><div class="ew-table-header-caption"><?php echo $view_ip_af_billing->RealizationDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RealizationDate" class="<?php echo $view_ip_af_billing->RealizationDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_af_billing->SortUrl($view_ip_af_billing->RealizationDate) ?>',1);"><div id="elh_view_ip_af_billing_RealizationDate" class="view_ip_af_billing_RealizationDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_af_billing->RealizationDate->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_af_billing->RealizationDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_af_billing->RealizationDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_af_billing->RIDNO->Visible) { // RIDNO ?>
	<?php if ($view_ip_af_billing->sortUrl($view_ip_af_billing->RIDNO) == "") { ?>
		<th data-name="RIDNO" class="<?php echo $view_ip_af_billing->RIDNO->headerCellClass() ?>"><div id="elh_view_ip_af_billing_RIDNO" class="view_ip_af_billing_RIDNO"><div class="ew-table-header-caption"><?php echo $view_ip_af_billing->RIDNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RIDNO" class="<?php echo $view_ip_af_billing->RIDNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_af_billing->SortUrl($view_ip_af_billing->RIDNO) ?>',1);"><div id="elh_view_ip_af_billing_RIDNO" class="view_ip_af_billing_RIDNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_af_billing->RIDNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_af_billing->RIDNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_af_billing->RIDNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_af_billing->TidNo->Visible) { // TidNo ?>
	<?php if ($view_ip_af_billing->sortUrl($view_ip_af_billing->TidNo) == "") { ?>
		<th data-name="TidNo" class="<?php echo $view_ip_af_billing->TidNo->headerCellClass() ?>"><div id="elh_view_ip_af_billing_TidNo" class="view_ip_af_billing_TidNo"><div class="ew-table-header-caption"><?php echo $view_ip_af_billing->TidNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TidNo" class="<?php echo $view_ip_af_billing->TidNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_af_billing->SortUrl($view_ip_af_billing->TidNo) ?>',1);"><div id="elh_view_ip_af_billing_TidNo" class="view_ip_af_billing_TidNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_af_billing->TidNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_af_billing->TidNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_af_billing->TidNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_af_billing->CId->Visible) { // CId ?>
	<?php if ($view_ip_af_billing->sortUrl($view_ip_af_billing->CId) == "") { ?>
		<th data-name="CId" class="<?php echo $view_ip_af_billing->CId->headerCellClass() ?>"><div id="elh_view_ip_af_billing_CId" class="view_ip_af_billing_CId"><div class="ew-table-header-caption"><?php echo $view_ip_af_billing->CId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CId" class="<?php echo $view_ip_af_billing->CId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_af_billing->SortUrl($view_ip_af_billing->CId) ?>',1);"><div id="elh_view_ip_af_billing_CId" class="view_ip_af_billing_CId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_af_billing->CId->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_af_billing->CId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_af_billing->CId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_af_billing->PartnerName->Visible) { // PartnerName ?>
	<?php if ($view_ip_af_billing->sortUrl($view_ip_af_billing->PartnerName) == "") { ?>
		<th data-name="PartnerName" class="<?php echo $view_ip_af_billing->PartnerName->headerCellClass() ?>"><div id="elh_view_ip_af_billing_PartnerName" class="view_ip_af_billing_PartnerName"><div class="ew-table-header-caption"><?php echo $view_ip_af_billing->PartnerName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerName" class="<?php echo $view_ip_af_billing->PartnerName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_af_billing->SortUrl($view_ip_af_billing->PartnerName) ?>',1);"><div id="elh_view_ip_af_billing_PartnerName" class="view_ip_af_billing_PartnerName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_af_billing->PartnerName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_af_billing->PartnerName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_af_billing->PartnerName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_af_billing->PayerType->Visible) { // PayerType ?>
	<?php if ($view_ip_af_billing->sortUrl($view_ip_af_billing->PayerType) == "") { ?>
		<th data-name="PayerType" class="<?php echo $view_ip_af_billing->PayerType->headerCellClass() ?>"><div id="elh_view_ip_af_billing_PayerType" class="view_ip_af_billing_PayerType"><div class="ew-table-header-caption"><?php echo $view_ip_af_billing->PayerType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PayerType" class="<?php echo $view_ip_af_billing->PayerType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_af_billing->SortUrl($view_ip_af_billing->PayerType) ?>',1);"><div id="elh_view_ip_af_billing_PayerType" class="view_ip_af_billing_PayerType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_af_billing->PayerType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_af_billing->PayerType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_af_billing->PayerType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_af_billing->Dob->Visible) { // Dob ?>
	<?php if ($view_ip_af_billing->sortUrl($view_ip_af_billing->Dob) == "") { ?>
		<th data-name="Dob" class="<?php echo $view_ip_af_billing->Dob->headerCellClass() ?>"><div id="elh_view_ip_af_billing_Dob" class="view_ip_af_billing_Dob"><div class="ew-table-header-caption"><?php echo $view_ip_af_billing->Dob->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Dob" class="<?php echo $view_ip_af_billing->Dob->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_af_billing->SortUrl($view_ip_af_billing->Dob) ?>',1);"><div id="elh_view_ip_af_billing_Dob" class="view_ip_af_billing_Dob">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_af_billing->Dob->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_af_billing->Dob->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_af_billing->Dob->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_af_billing->Currency->Visible) { // Currency ?>
	<?php if ($view_ip_af_billing->sortUrl($view_ip_af_billing->Currency) == "") { ?>
		<th data-name="Currency" class="<?php echo $view_ip_af_billing->Currency->headerCellClass() ?>"><div id="elh_view_ip_af_billing_Currency" class="view_ip_af_billing_Currency"><div class="ew-table-header-caption"><?php echo $view_ip_af_billing->Currency->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Currency" class="<?php echo $view_ip_af_billing->Currency->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_af_billing->SortUrl($view_ip_af_billing->Currency) ?>',1);"><div id="elh_view_ip_af_billing_Currency" class="view_ip_af_billing_Currency">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_af_billing->Currency->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_af_billing->Currency->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_af_billing->Currency->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_af_billing->PatId->Visible) { // PatId ?>
	<?php if ($view_ip_af_billing->sortUrl($view_ip_af_billing->PatId) == "") { ?>
		<th data-name="PatId" class="<?php echo $view_ip_af_billing->PatId->headerCellClass() ?>"><div id="elh_view_ip_af_billing_PatId" class="view_ip_af_billing_PatId"><div class="ew-table-header-caption"><?php echo $view_ip_af_billing->PatId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatId" class="<?php echo $view_ip_af_billing->PatId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_af_billing->SortUrl($view_ip_af_billing->PatId) ?>',1);"><div id="elh_view_ip_af_billing_PatId" class="view_ip_af_billing_PatId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_af_billing->PatId->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_af_billing->PatId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_af_billing->PatId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_af_billing->DrDepartment->Visible) { // DrDepartment ?>
	<?php if ($view_ip_af_billing->sortUrl($view_ip_af_billing->DrDepartment) == "") { ?>
		<th data-name="DrDepartment" class="<?php echo $view_ip_af_billing->DrDepartment->headerCellClass() ?>"><div id="elh_view_ip_af_billing_DrDepartment" class="view_ip_af_billing_DrDepartment"><div class="ew-table-header-caption"><?php echo $view_ip_af_billing->DrDepartment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrDepartment" class="<?php echo $view_ip_af_billing->DrDepartment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_af_billing->SortUrl($view_ip_af_billing->DrDepartment) ?>',1);"><div id="elh_view_ip_af_billing_DrDepartment" class="view_ip_af_billing_DrDepartment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_af_billing->DrDepartment->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_af_billing->DrDepartment->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_af_billing->DrDepartment->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_af_billing->RefferedBy->Visible) { // RefferedBy ?>
	<?php if ($view_ip_af_billing->sortUrl($view_ip_af_billing->RefferedBy) == "") { ?>
		<th data-name="RefferedBy" class="<?php echo $view_ip_af_billing->RefferedBy->headerCellClass() ?>"><div id="elh_view_ip_af_billing_RefferedBy" class="view_ip_af_billing_RefferedBy"><div class="ew-table-header-caption"><?php echo $view_ip_af_billing->RefferedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RefferedBy" class="<?php echo $view_ip_af_billing->RefferedBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_af_billing->SortUrl($view_ip_af_billing->RefferedBy) ?>',1);"><div id="elh_view_ip_af_billing_RefferedBy" class="view_ip_af_billing_RefferedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_af_billing->RefferedBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_af_billing->RefferedBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_af_billing->RefferedBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_af_billing->CardNumber->Visible) { // CardNumber ?>
	<?php if ($view_ip_af_billing->sortUrl($view_ip_af_billing->CardNumber) == "") { ?>
		<th data-name="CardNumber" class="<?php echo $view_ip_af_billing->CardNumber->headerCellClass() ?>"><div id="elh_view_ip_af_billing_CardNumber" class="view_ip_af_billing_CardNumber"><div class="ew-table-header-caption"><?php echo $view_ip_af_billing->CardNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CardNumber" class="<?php echo $view_ip_af_billing->CardNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_af_billing->SortUrl($view_ip_af_billing->CardNumber) ?>',1);"><div id="elh_view_ip_af_billing_CardNumber" class="view_ip_af_billing_CardNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_af_billing->CardNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_af_billing->CardNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_af_billing->CardNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_af_billing->BankName->Visible) { // BankName ?>
	<?php if ($view_ip_af_billing->sortUrl($view_ip_af_billing->BankName) == "") { ?>
		<th data-name="BankName" class="<?php echo $view_ip_af_billing->BankName->headerCellClass() ?>"><div id="elh_view_ip_af_billing_BankName" class="view_ip_af_billing_BankName"><div class="ew-table-header-caption"><?php echo $view_ip_af_billing->BankName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BankName" class="<?php echo $view_ip_af_billing->BankName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_af_billing->SortUrl($view_ip_af_billing->BankName) ?>',1);"><div id="elh_view_ip_af_billing_BankName" class="view_ip_af_billing_BankName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_af_billing->BankName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_af_billing->BankName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_af_billing->BankName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_af_billing->DrID->Visible) { // DrID ?>
	<?php if ($view_ip_af_billing->sortUrl($view_ip_af_billing->DrID) == "") { ?>
		<th data-name="DrID" class="<?php echo $view_ip_af_billing->DrID->headerCellClass() ?>"><div id="elh_view_ip_af_billing_DrID" class="view_ip_af_billing_DrID"><div class="ew-table-header-caption"><?php echo $view_ip_af_billing->DrID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrID" class="<?php echo $view_ip_af_billing->DrID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_af_billing->SortUrl($view_ip_af_billing->DrID) ?>',1);"><div id="elh_view_ip_af_billing_DrID" class="view_ip_af_billing_DrID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_af_billing->DrID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_af_billing->DrID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_af_billing->DrID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_af_billing->BillStatus->Visible) { // BillStatus ?>
	<?php if ($view_ip_af_billing->sortUrl($view_ip_af_billing->BillStatus) == "") { ?>
		<th data-name="BillStatus" class="<?php echo $view_ip_af_billing->BillStatus->headerCellClass() ?>"><div id="elh_view_ip_af_billing_BillStatus" class="view_ip_af_billing_BillStatus"><div class="ew-table-header-caption"><?php echo $view_ip_af_billing->BillStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillStatus" class="<?php echo $view_ip_af_billing->BillStatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_af_billing->SortUrl($view_ip_af_billing->BillStatus) ?>',1);"><div id="elh_view_ip_af_billing_BillStatus" class="view_ip_af_billing_BillStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_af_billing->BillStatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_af_billing->BillStatus->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_af_billing->BillStatus->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_af_billing->UserName->Visible) { // UserName ?>
	<?php if ($view_ip_af_billing->sortUrl($view_ip_af_billing->UserName) == "") { ?>
		<th data-name="UserName" class="<?php echo $view_ip_af_billing->UserName->headerCellClass() ?>"><div id="elh_view_ip_af_billing_UserName" class="view_ip_af_billing_UserName"><div class="ew-table-header-caption"><?php echo $view_ip_af_billing->UserName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UserName" class="<?php echo $view_ip_af_billing->UserName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_af_billing->SortUrl($view_ip_af_billing->UserName) ?>',1);"><div id="elh_view_ip_af_billing_UserName" class="view_ip_af_billing_UserName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_af_billing->UserName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_af_billing->UserName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_af_billing->UserName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_af_billing->AdjustmentAdvance->Visible) { // AdjustmentAdvance ?>
	<?php if ($view_ip_af_billing->sortUrl($view_ip_af_billing->AdjustmentAdvance) == "") { ?>
		<th data-name="AdjustmentAdvance" class="<?php echo $view_ip_af_billing->AdjustmentAdvance->headerCellClass() ?>"><div id="elh_view_ip_af_billing_AdjustmentAdvance" class="view_ip_af_billing_AdjustmentAdvance"><div class="ew-table-header-caption"><?php echo $view_ip_af_billing->AdjustmentAdvance->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AdjustmentAdvance" class="<?php echo $view_ip_af_billing->AdjustmentAdvance->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_af_billing->SortUrl($view_ip_af_billing->AdjustmentAdvance) ?>',1);"><div id="elh_view_ip_af_billing_AdjustmentAdvance" class="view_ip_af_billing_AdjustmentAdvance">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_af_billing->AdjustmentAdvance->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_af_billing->AdjustmentAdvance->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_af_billing->AdjustmentAdvance->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_af_billing->billing_vouchercol->Visible) { // billing_vouchercol ?>
	<?php if ($view_ip_af_billing->sortUrl($view_ip_af_billing->billing_vouchercol) == "") { ?>
		<th data-name="billing_vouchercol" class="<?php echo $view_ip_af_billing->billing_vouchercol->headerCellClass() ?>"><div id="elh_view_ip_af_billing_billing_vouchercol" class="view_ip_af_billing_billing_vouchercol"><div class="ew-table-header-caption"><?php echo $view_ip_af_billing->billing_vouchercol->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="billing_vouchercol" class="<?php echo $view_ip_af_billing->billing_vouchercol->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_af_billing->SortUrl($view_ip_af_billing->billing_vouchercol) ?>',1);"><div id="elh_view_ip_af_billing_billing_vouchercol" class="view_ip_af_billing_billing_vouchercol">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_af_billing->billing_vouchercol->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_af_billing->billing_vouchercol->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_af_billing->billing_vouchercol->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_af_billing->BillType->Visible) { // BillType ?>
	<?php if ($view_ip_af_billing->sortUrl($view_ip_af_billing->BillType) == "") { ?>
		<th data-name="BillType" class="<?php echo $view_ip_af_billing->BillType->headerCellClass() ?>"><div id="elh_view_ip_af_billing_BillType" class="view_ip_af_billing_BillType"><div class="ew-table-header-caption"><?php echo $view_ip_af_billing->BillType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillType" class="<?php echo $view_ip_af_billing->BillType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_af_billing->SortUrl($view_ip_af_billing->BillType) ?>',1);"><div id="elh_view_ip_af_billing_BillType" class="view_ip_af_billing_BillType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_af_billing->BillType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_af_billing->BillType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_af_billing->BillType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_af_billing->ProcedureName->Visible) { // ProcedureName ?>
	<?php if ($view_ip_af_billing->sortUrl($view_ip_af_billing->ProcedureName) == "") { ?>
		<th data-name="ProcedureName" class="<?php echo $view_ip_af_billing->ProcedureName->headerCellClass() ?>"><div id="elh_view_ip_af_billing_ProcedureName" class="view_ip_af_billing_ProcedureName"><div class="ew-table-header-caption"><?php echo $view_ip_af_billing->ProcedureName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProcedureName" class="<?php echo $view_ip_af_billing->ProcedureName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_af_billing->SortUrl($view_ip_af_billing->ProcedureName) ?>',1);"><div id="elh_view_ip_af_billing_ProcedureName" class="view_ip_af_billing_ProcedureName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_af_billing->ProcedureName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_af_billing->ProcedureName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_af_billing->ProcedureName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_af_billing->ProcedureAmount->Visible) { // ProcedureAmount ?>
	<?php if ($view_ip_af_billing->sortUrl($view_ip_af_billing->ProcedureAmount) == "") { ?>
		<th data-name="ProcedureAmount" class="<?php echo $view_ip_af_billing->ProcedureAmount->headerCellClass() ?>"><div id="elh_view_ip_af_billing_ProcedureAmount" class="view_ip_af_billing_ProcedureAmount"><div class="ew-table-header-caption"><?php echo $view_ip_af_billing->ProcedureAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProcedureAmount" class="<?php echo $view_ip_af_billing->ProcedureAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_af_billing->SortUrl($view_ip_af_billing->ProcedureAmount) ?>',1);"><div id="elh_view_ip_af_billing_ProcedureAmount" class="view_ip_af_billing_ProcedureAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_af_billing->ProcedureAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_af_billing->ProcedureAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_af_billing->ProcedureAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_af_billing->IncludePackage->Visible) { // IncludePackage ?>
	<?php if ($view_ip_af_billing->sortUrl($view_ip_af_billing->IncludePackage) == "") { ?>
		<th data-name="IncludePackage" class="<?php echo $view_ip_af_billing->IncludePackage->headerCellClass() ?>"><div id="elh_view_ip_af_billing_IncludePackage" class="view_ip_af_billing_IncludePackage"><div class="ew-table-header-caption"><?php echo $view_ip_af_billing->IncludePackage->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IncludePackage" class="<?php echo $view_ip_af_billing->IncludePackage->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_af_billing->SortUrl($view_ip_af_billing->IncludePackage) ?>',1);"><div id="elh_view_ip_af_billing_IncludePackage" class="view_ip_af_billing_IncludePackage">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_af_billing->IncludePackage->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_af_billing->IncludePackage->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_af_billing->IncludePackage->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_af_billing->CancelBill->Visible) { // CancelBill ?>
	<?php if ($view_ip_af_billing->sortUrl($view_ip_af_billing->CancelBill) == "") { ?>
		<th data-name="CancelBill" class="<?php echo $view_ip_af_billing->CancelBill->headerCellClass() ?>"><div id="elh_view_ip_af_billing_CancelBill" class="view_ip_af_billing_CancelBill"><div class="ew-table-header-caption"><?php echo $view_ip_af_billing->CancelBill->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CancelBill" class="<?php echo $view_ip_af_billing->CancelBill->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_af_billing->SortUrl($view_ip_af_billing->CancelBill) ?>',1);"><div id="elh_view_ip_af_billing_CancelBill" class="view_ip_af_billing_CancelBill">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_af_billing->CancelBill->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_af_billing->CancelBill->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_af_billing->CancelBill->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_af_billing->CancelModeOfPayment->Visible) { // CancelModeOfPayment ?>
	<?php if ($view_ip_af_billing->sortUrl($view_ip_af_billing->CancelModeOfPayment) == "") { ?>
		<th data-name="CancelModeOfPayment" class="<?php echo $view_ip_af_billing->CancelModeOfPayment->headerCellClass() ?>"><div id="elh_view_ip_af_billing_CancelModeOfPayment" class="view_ip_af_billing_CancelModeOfPayment"><div class="ew-table-header-caption"><?php echo $view_ip_af_billing->CancelModeOfPayment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CancelModeOfPayment" class="<?php echo $view_ip_af_billing->CancelModeOfPayment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_af_billing->SortUrl($view_ip_af_billing->CancelModeOfPayment) ?>',1);"><div id="elh_view_ip_af_billing_CancelModeOfPayment" class="view_ip_af_billing_CancelModeOfPayment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_af_billing->CancelModeOfPayment->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_af_billing->CancelModeOfPayment->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_af_billing->CancelModeOfPayment->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_af_billing->CancelAmount->Visible) { // CancelAmount ?>
	<?php if ($view_ip_af_billing->sortUrl($view_ip_af_billing->CancelAmount) == "") { ?>
		<th data-name="CancelAmount" class="<?php echo $view_ip_af_billing->CancelAmount->headerCellClass() ?>"><div id="elh_view_ip_af_billing_CancelAmount" class="view_ip_af_billing_CancelAmount"><div class="ew-table-header-caption"><?php echo $view_ip_af_billing->CancelAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CancelAmount" class="<?php echo $view_ip_af_billing->CancelAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_af_billing->SortUrl($view_ip_af_billing->CancelAmount) ?>',1);"><div id="elh_view_ip_af_billing_CancelAmount" class="view_ip_af_billing_CancelAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_af_billing->CancelAmount->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_af_billing->CancelAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_af_billing->CancelAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_af_billing->CancelBankName->Visible) { // CancelBankName ?>
	<?php if ($view_ip_af_billing->sortUrl($view_ip_af_billing->CancelBankName) == "") { ?>
		<th data-name="CancelBankName" class="<?php echo $view_ip_af_billing->CancelBankName->headerCellClass() ?>"><div id="elh_view_ip_af_billing_CancelBankName" class="view_ip_af_billing_CancelBankName"><div class="ew-table-header-caption"><?php echo $view_ip_af_billing->CancelBankName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CancelBankName" class="<?php echo $view_ip_af_billing->CancelBankName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_af_billing->SortUrl($view_ip_af_billing->CancelBankName) ?>',1);"><div id="elh_view_ip_af_billing_CancelBankName" class="view_ip_af_billing_CancelBankName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_af_billing->CancelBankName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_af_billing->CancelBankName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_af_billing->CancelBankName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_af_billing->CancelTransactionNumber->Visible) { // CancelTransactionNumber ?>
	<?php if ($view_ip_af_billing->sortUrl($view_ip_af_billing->CancelTransactionNumber) == "") { ?>
		<th data-name="CancelTransactionNumber" class="<?php echo $view_ip_af_billing->CancelTransactionNumber->headerCellClass() ?>"><div id="elh_view_ip_af_billing_CancelTransactionNumber" class="view_ip_af_billing_CancelTransactionNumber"><div class="ew-table-header-caption"><?php echo $view_ip_af_billing->CancelTransactionNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CancelTransactionNumber" class="<?php echo $view_ip_af_billing->CancelTransactionNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_af_billing->SortUrl($view_ip_af_billing->CancelTransactionNumber) ?>',1);"><div id="elh_view_ip_af_billing_CancelTransactionNumber" class="view_ip_af_billing_CancelTransactionNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_af_billing->CancelTransactionNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_af_billing->CancelTransactionNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_af_billing->CancelTransactionNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_af_billing->LabTest->Visible) { // LabTest ?>
	<?php if ($view_ip_af_billing->sortUrl($view_ip_af_billing->LabTest) == "") { ?>
		<th data-name="LabTest" class="<?php echo $view_ip_af_billing->LabTest->headerCellClass() ?>"><div id="elh_view_ip_af_billing_LabTest" class="view_ip_af_billing_LabTest"><div class="ew-table-header-caption"><?php echo $view_ip_af_billing->LabTest->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LabTest" class="<?php echo $view_ip_af_billing->LabTest->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_af_billing->SortUrl($view_ip_af_billing->LabTest) ?>',1);"><div id="elh_view_ip_af_billing_LabTest" class="view_ip_af_billing_LabTest">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_af_billing->LabTest->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_af_billing->LabTest->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_af_billing->LabTest->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_af_billing->sid->Visible) { // sid ?>
	<?php if ($view_ip_af_billing->sortUrl($view_ip_af_billing->sid) == "") { ?>
		<th data-name="sid" class="<?php echo $view_ip_af_billing->sid->headerCellClass() ?>"><div id="elh_view_ip_af_billing_sid" class="view_ip_af_billing_sid"><div class="ew-table-header-caption"><?php echo $view_ip_af_billing->sid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sid" class="<?php echo $view_ip_af_billing->sid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_af_billing->SortUrl($view_ip_af_billing->sid) ?>',1);"><div id="elh_view_ip_af_billing_sid" class="view_ip_af_billing_sid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_af_billing->sid->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_af_billing->sid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_af_billing->sid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_af_billing->SidNo->Visible) { // SidNo ?>
	<?php if ($view_ip_af_billing->sortUrl($view_ip_af_billing->SidNo) == "") { ?>
		<th data-name="SidNo" class="<?php echo $view_ip_af_billing->SidNo->headerCellClass() ?>"><div id="elh_view_ip_af_billing_SidNo" class="view_ip_af_billing_SidNo"><div class="ew-table-header-caption"><?php echo $view_ip_af_billing->SidNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SidNo" class="<?php echo $view_ip_af_billing->SidNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_af_billing->SortUrl($view_ip_af_billing->SidNo) ?>',1);"><div id="elh_view_ip_af_billing_SidNo" class="view_ip_af_billing_SidNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_af_billing->SidNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_af_billing->SidNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_af_billing->SidNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_af_billing->createdDatettime->Visible) { // createdDatettime ?>
	<?php if ($view_ip_af_billing->sortUrl($view_ip_af_billing->createdDatettime) == "") { ?>
		<th data-name="createdDatettime" class="<?php echo $view_ip_af_billing->createdDatettime->headerCellClass() ?>"><div id="elh_view_ip_af_billing_createdDatettime" class="view_ip_af_billing_createdDatettime"><div class="ew-table-header-caption"><?php echo $view_ip_af_billing->createdDatettime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdDatettime" class="<?php echo $view_ip_af_billing->createdDatettime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_af_billing->SortUrl($view_ip_af_billing->createdDatettime) ?>',1);"><div id="elh_view_ip_af_billing_createdDatettime" class="view_ip_af_billing_createdDatettime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_af_billing->createdDatettime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_af_billing->createdDatettime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_af_billing->createdDatettime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_af_billing->LabTestReleased->Visible) { // LabTestReleased ?>
	<?php if ($view_ip_af_billing->sortUrl($view_ip_af_billing->LabTestReleased) == "") { ?>
		<th data-name="LabTestReleased" class="<?php echo $view_ip_af_billing->LabTestReleased->headerCellClass() ?>"><div id="elh_view_ip_af_billing_LabTestReleased" class="view_ip_af_billing_LabTestReleased"><div class="ew-table-header-caption"><?php echo $view_ip_af_billing->LabTestReleased->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LabTestReleased" class="<?php echo $view_ip_af_billing->LabTestReleased->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_af_billing->SortUrl($view_ip_af_billing->LabTestReleased) ?>',1);"><div id="elh_view_ip_af_billing_LabTestReleased" class="view_ip_af_billing_LabTestReleased">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_af_billing->LabTestReleased->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_af_billing->LabTestReleased->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_af_billing->LabTestReleased->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_af_billing->GoogleReviewID->Visible) { // GoogleReviewID ?>
	<?php if ($view_ip_af_billing->sortUrl($view_ip_af_billing->GoogleReviewID) == "") { ?>
		<th data-name="GoogleReviewID" class="<?php echo $view_ip_af_billing->GoogleReviewID->headerCellClass() ?>"><div id="elh_view_ip_af_billing_GoogleReviewID" class="view_ip_af_billing_GoogleReviewID"><div class="ew-table-header-caption"><?php echo $view_ip_af_billing->GoogleReviewID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GoogleReviewID" class="<?php echo $view_ip_af_billing->GoogleReviewID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_af_billing->SortUrl($view_ip_af_billing->GoogleReviewID) ?>',1);"><div id="elh_view_ip_af_billing_GoogleReviewID" class="view_ip_af_billing_GoogleReviewID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_af_billing->GoogleReviewID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_af_billing->GoogleReviewID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_af_billing->GoogleReviewID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_af_billing->CardType->Visible) { // CardType ?>
	<?php if ($view_ip_af_billing->sortUrl($view_ip_af_billing->CardType) == "") { ?>
		<th data-name="CardType" class="<?php echo $view_ip_af_billing->CardType->headerCellClass() ?>"><div id="elh_view_ip_af_billing_CardType" class="view_ip_af_billing_CardType"><div class="ew-table-header-caption"><?php echo $view_ip_af_billing->CardType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CardType" class="<?php echo $view_ip_af_billing->CardType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_af_billing->SortUrl($view_ip_af_billing->CardType) ?>',1);"><div id="elh_view_ip_af_billing_CardType" class="view_ip_af_billing_CardType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_af_billing->CardType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_af_billing->CardType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_af_billing->CardType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_af_billing->PharmacyBill->Visible) { // PharmacyBill ?>
	<?php if ($view_ip_af_billing->sortUrl($view_ip_af_billing->PharmacyBill) == "") { ?>
		<th data-name="PharmacyBill" class="<?php echo $view_ip_af_billing->PharmacyBill->headerCellClass() ?>"><div id="elh_view_ip_af_billing_PharmacyBill" class="view_ip_af_billing_PharmacyBill"><div class="ew-table-header-caption"><?php echo $view_ip_af_billing->PharmacyBill->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PharmacyBill" class="<?php echo $view_ip_af_billing->PharmacyBill->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_af_billing->SortUrl($view_ip_af_billing->PharmacyBill) ?>',1);"><div id="elh_view_ip_af_billing_PharmacyBill" class="view_ip_af_billing_PharmacyBill">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_af_billing->PharmacyBill->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_af_billing->PharmacyBill->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_af_billing->PharmacyBill->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_af_billing->DiscountAmount->Visible) { // DiscountAmount ?>
	<?php if ($view_ip_af_billing->sortUrl($view_ip_af_billing->DiscountAmount) == "") { ?>
		<th data-name="DiscountAmount" class="<?php echo $view_ip_af_billing->DiscountAmount->headerCellClass() ?>"><div id="elh_view_ip_af_billing_DiscountAmount" class="view_ip_af_billing_DiscountAmount"><div class="ew-table-header-caption"><?php echo $view_ip_af_billing->DiscountAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DiscountAmount" class="<?php echo $view_ip_af_billing->DiscountAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_af_billing->SortUrl($view_ip_af_billing->DiscountAmount) ?>',1);"><div id="elh_view_ip_af_billing_DiscountAmount" class="view_ip_af_billing_DiscountAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_af_billing->DiscountAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_af_billing->DiscountAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_af_billing->DiscountAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_af_billing->Cash->Visible) { // Cash ?>
	<?php if ($view_ip_af_billing->sortUrl($view_ip_af_billing->Cash) == "") { ?>
		<th data-name="Cash" class="<?php echo $view_ip_af_billing->Cash->headerCellClass() ?>"><div id="elh_view_ip_af_billing_Cash" class="view_ip_af_billing_Cash"><div class="ew-table-header-caption"><?php echo $view_ip_af_billing->Cash->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Cash" class="<?php echo $view_ip_af_billing->Cash->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_af_billing->SortUrl($view_ip_af_billing->Cash) ?>',1);"><div id="elh_view_ip_af_billing_Cash" class="view_ip_af_billing_Cash">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_af_billing->Cash->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_af_billing->Cash->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_af_billing->Cash->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_af_billing->Card->Visible) { // Card ?>
	<?php if ($view_ip_af_billing->sortUrl($view_ip_af_billing->Card) == "") { ?>
		<th data-name="Card" class="<?php echo $view_ip_af_billing->Card->headerCellClass() ?>"><div id="elh_view_ip_af_billing_Card" class="view_ip_af_billing_Card"><div class="ew-table-header-caption"><?php echo $view_ip_af_billing->Card->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Card" class="<?php echo $view_ip_af_billing->Card->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_af_billing->SortUrl($view_ip_af_billing->Card) ?>',1);"><div id="elh_view_ip_af_billing_Card" class="view_ip_af_billing_Card">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_af_billing->Card->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_af_billing->Card->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_af_billing->Card->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_ip_af_billing_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_ip_af_billing->ExportAll && $view_ip_af_billing->isExport()) {
	$view_ip_af_billing_list->StopRec = $view_ip_af_billing_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_ip_af_billing_list->TotalRecs > $view_ip_af_billing_list->StartRec + $view_ip_af_billing_list->DisplayRecs - 1)
		$view_ip_af_billing_list->StopRec = $view_ip_af_billing_list->StartRec + $view_ip_af_billing_list->DisplayRecs - 1;
	else
		$view_ip_af_billing_list->StopRec = $view_ip_af_billing_list->TotalRecs;
}
$view_ip_af_billing_list->RecCnt = $view_ip_af_billing_list->StartRec - 1;
if ($view_ip_af_billing_list->Recordset && !$view_ip_af_billing_list->Recordset->EOF) {
	$view_ip_af_billing_list->Recordset->moveFirst();
	$selectLimit = $view_ip_af_billing_list->UseSelectLimit;
	if (!$selectLimit && $view_ip_af_billing_list->StartRec > 1)
		$view_ip_af_billing_list->Recordset->move($view_ip_af_billing_list->StartRec - 1);
} elseif (!$view_ip_af_billing->AllowAddDeleteRow && $view_ip_af_billing_list->StopRec == 0) {
	$view_ip_af_billing_list->StopRec = $view_ip_af_billing->GridAddRowCount;
}

// Initialize aggregate
$view_ip_af_billing->RowType = ROWTYPE_AGGREGATEINIT;
$view_ip_af_billing->resetAttributes();
$view_ip_af_billing_list->renderRow();
while ($view_ip_af_billing_list->RecCnt < $view_ip_af_billing_list->StopRec) {
	$view_ip_af_billing_list->RecCnt++;
	if ($view_ip_af_billing_list->RecCnt >= $view_ip_af_billing_list->StartRec) {
		$view_ip_af_billing_list->RowCnt++;

		// Set up key count
		$view_ip_af_billing_list->KeyCount = $view_ip_af_billing_list->RowIndex;

		// Init row class and style
		$view_ip_af_billing->resetAttributes();
		$view_ip_af_billing->CssClass = "";
		if ($view_ip_af_billing->isGridAdd()) {
		} else {
			$view_ip_af_billing_list->loadRowValues($view_ip_af_billing_list->Recordset); // Load row values
		}
		$view_ip_af_billing->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_ip_af_billing->RowAttrs = array_merge($view_ip_af_billing->RowAttrs, array('data-rowindex'=>$view_ip_af_billing_list->RowCnt, 'id'=>'r' . $view_ip_af_billing_list->RowCnt . '_view_ip_af_billing', 'data-rowtype'=>$view_ip_af_billing->RowType));

		// Render row
		$view_ip_af_billing_list->renderRow();

		// Render list options
		$view_ip_af_billing_list->renderListOptions();
?>
	<tr<?php echo $view_ip_af_billing->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_ip_af_billing_list->ListOptions->render("body", "left", $view_ip_af_billing_list->RowCnt);
?>
	<?php if ($view_ip_af_billing->id->Visible) { // id ?>
		<td data-name="id"<?php echo $view_ip_af_billing->id->cellAttributes() ?>>
<span id="el<?php echo $view_ip_af_billing_list->RowCnt ?>_view_ip_af_billing_id" class="view_ip_af_billing_id">
<span<?php echo $view_ip_af_billing->id->viewAttributes() ?>>
<?php echo $view_ip_af_billing->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_af_billing->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno"<?php echo $view_ip_af_billing->mrnno->cellAttributes() ?>>
<span id="el<?php echo $view_ip_af_billing_list->RowCnt ?>_view_ip_af_billing_mrnno" class="view_ip_af_billing_mrnno">
<span<?php echo $view_ip_af_billing->mrnno->viewAttributes() ?>>
<?php echo $view_ip_af_billing->mrnno->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_af_billing->Gender->Visible) { // Gender ?>
		<td data-name="Gender"<?php echo $view_ip_af_billing->Gender->cellAttributes() ?>>
<span id="el<?php echo $view_ip_af_billing_list->RowCnt ?>_view_ip_af_billing_Gender" class="view_ip_af_billing_Gender">
<span<?php echo $view_ip_af_billing->Gender->viewAttributes() ?>>
<?php echo $view_ip_af_billing->Gender->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_af_billing->Age->Visible) { // Age ?>
		<td data-name="Age"<?php echo $view_ip_af_billing->Age->cellAttributes() ?>>
<span id="el<?php echo $view_ip_af_billing_list->RowCnt ?>_view_ip_af_billing_Age" class="view_ip_af_billing_Age">
<span<?php echo $view_ip_af_billing->Age->viewAttributes() ?>>
<?php echo $view_ip_af_billing->Age->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_af_billing->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $view_ip_af_billing->createdby->cellAttributes() ?>>
<span id="el<?php echo $view_ip_af_billing_list->RowCnt ?>_view_ip_af_billing_createdby" class="view_ip_af_billing_createdby">
<span<?php echo $view_ip_af_billing->createdby->viewAttributes() ?>>
<?php echo $view_ip_af_billing->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_af_billing->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $view_ip_af_billing->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_ip_af_billing_list->RowCnt ?>_view_ip_af_billing_createddatetime" class="view_ip_af_billing_createddatetime">
<span<?php echo $view_ip_af_billing->createddatetime->viewAttributes() ?>>
<?php echo $view_ip_af_billing->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_af_billing->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $view_ip_af_billing->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $view_ip_af_billing_list->RowCnt ?>_view_ip_af_billing_modifiedby" class="view_ip_af_billing_modifiedby">
<span<?php echo $view_ip_af_billing->modifiedby->viewAttributes() ?>>
<?php echo $view_ip_af_billing->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_af_billing->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $view_ip_af_billing->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_ip_af_billing_list->RowCnt ?>_view_ip_af_billing_modifieddatetime" class="view_ip_af_billing_modifieddatetime">
<span<?php echo $view_ip_af_billing->modifieddatetime->viewAttributes() ?>>
<?php echo $view_ip_af_billing->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_af_billing->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId"<?php echo $view_ip_af_billing->PatientId->cellAttributes() ?>>
<span id="el<?php echo $view_ip_af_billing_list->RowCnt ?>_view_ip_af_billing_PatientId" class="view_ip_af_billing_PatientId">
<span<?php echo $view_ip_af_billing->PatientId->viewAttributes() ?>>
<?php echo $view_ip_af_billing->PatientId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_af_billing->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_ip_af_billing->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_ip_af_billing_list->RowCnt ?>_view_ip_af_billing_HospID" class="view_ip_af_billing_HospID">
<span<?php echo $view_ip_af_billing->HospID->viewAttributes() ?>>
<?php echo $view_ip_af_billing->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_af_billing->BillNumber->Visible) { // BillNumber ?>
		<td data-name="BillNumber"<?php echo $view_ip_af_billing->BillNumber->cellAttributes() ?>>
<span id="el<?php echo $view_ip_af_billing_list->RowCnt ?>_view_ip_af_billing_BillNumber" class="view_ip_af_billing_BillNumber">
<span<?php echo $view_ip_af_billing->BillNumber->viewAttributes() ?>>
<?php echo $view_ip_af_billing->BillNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_af_billing->ReportHeader->Visible) { // ReportHeader ?>
		<td data-name="ReportHeader"<?php echo $view_ip_af_billing->ReportHeader->cellAttributes() ?>>
<span id="el<?php echo $view_ip_af_billing_list->RowCnt ?>_view_ip_af_billing_ReportHeader" class="view_ip_af_billing_ReportHeader">
<span<?php echo $view_ip_af_billing->ReportHeader->viewAttributes() ?>>
<?php echo $view_ip_af_billing->ReportHeader->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_af_billing->Reception->Visible) { // Reception ?>
		<td data-name="Reception"<?php echo $view_ip_af_billing->Reception->cellAttributes() ?>>
<span id="el<?php echo $view_ip_af_billing_list->RowCnt ?>_view_ip_af_billing_Reception" class="view_ip_af_billing_Reception">
<span<?php echo $view_ip_af_billing->Reception->viewAttributes() ?>>
<?php echo $view_ip_af_billing->Reception->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_af_billing->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $view_ip_af_billing->PatientName->cellAttributes() ?>>
<span id="el<?php echo $view_ip_af_billing_list->RowCnt ?>_view_ip_af_billing_PatientName" class="view_ip_af_billing_PatientName">
<span<?php echo $view_ip_af_billing->PatientName->viewAttributes() ?>>
<?php echo $view_ip_af_billing->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_af_billing->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile"<?php echo $view_ip_af_billing->Mobile->cellAttributes() ?>>
<span id="el<?php echo $view_ip_af_billing_list->RowCnt ?>_view_ip_af_billing_Mobile" class="view_ip_af_billing_Mobile">
<span<?php echo $view_ip_af_billing->Mobile->viewAttributes() ?>>
<?php echo $view_ip_af_billing->Mobile->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_af_billing->IP_OP->Visible) { // IP_OP ?>
		<td data-name="IP_OP"<?php echo $view_ip_af_billing->IP_OP->cellAttributes() ?>>
<span id="el<?php echo $view_ip_af_billing_list->RowCnt ?>_view_ip_af_billing_IP_OP" class="view_ip_af_billing_IP_OP">
<span<?php echo $view_ip_af_billing->IP_OP->viewAttributes() ?>>
<?php echo $view_ip_af_billing->IP_OP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_af_billing->Doctor->Visible) { // Doctor ?>
		<td data-name="Doctor"<?php echo $view_ip_af_billing->Doctor->cellAttributes() ?>>
<span id="el<?php echo $view_ip_af_billing_list->RowCnt ?>_view_ip_af_billing_Doctor" class="view_ip_af_billing_Doctor">
<span<?php echo $view_ip_af_billing->Doctor->viewAttributes() ?>>
<?php echo $view_ip_af_billing->Doctor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_af_billing->voucher_type->Visible) { // voucher_type ?>
		<td data-name="voucher_type"<?php echo $view_ip_af_billing->voucher_type->cellAttributes() ?>>
<span id="el<?php echo $view_ip_af_billing_list->RowCnt ?>_view_ip_af_billing_voucher_type" class="view_ip_af_billing_voucher_type">
<span<?php echo $view_ip_af_billing->voucher_type->viewAttributes() ?>>
<?php echo $view_ip_af_billing->voucher_type->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_af_billing->Details->Visible) { // Details ?>
		<td data-name="Details"<?php echo $view_ip_af_billing->Details->cellAttributes() ?>>
<span id="el<?php echo $view_ip_af_billing_list->RowCnt ?>_view_ip_af_billing_Details" class="view_ip_af_billing_Details">
<span<?php echo $view_ip_af_billing->Details->viewAttributes() ?>>
<?php echo $view_ip_af_billing->Details->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_af_billing->ModeofPayment->Visible) { // ModeofPayment ?>
		<td data-name="ModeofPayment"<?php echo $view_ip_af_billing->ModeofPayment->cellAttributes() ?>>
<span id="el<?php echo $view_ip_af_billing_list->RowCnt ?>_view_ip_af_billing_ModeofPayment" class="view_ip_af_billing_ModeofPayment">
<span<?php echo $view_ip_af_billing->ModeofPayment->viewAttributes() ?>>
<?php echo $view_ip_af_billing->ModeofPayment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_af_billing->Amount->Visible) { // Amount ?>
		<td data-name="Amount"<?php echo $view_ip_af_billing->Amount->cellAttributes() ?>>
<span id="el<?php echo $view_ip_af_billing_list->RowCnt ?>_view_ip_af_billing_Amount" class="view_ip_af_billing_Amount">
<span<?php echo $view_ip_af_billing->Amount->viewAttributes() ?>>
<?php echo $view_ip_af_billing->Amount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_af_billing->AnyDues->Visible) { // AnyDues ?>
		<td data-name="AnyDues"<?php echo $view_ip_af_billing->AnyDues->cellAttributes() ?>>
<span id="el<?php echo $view_ip_af_billing_list->RowCnt ?>_view_ip_af_billing_AnyDues" class="view_ip_af_billing_AnyDues">
<span<?php echo $view_ip_af_billing->AnyDues->viewAttributes() ?>>
<?php echo $view_ip_af_billing->AnyDues->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_af_billing->RealizationAmount->Visible) { // RealizationAmount ?>
		<td data-name="RealizationAmount"<?php echo $view_ip_af_billing->RealizationAmount->cellAttributes() ?>>
<span id="el<?php echo $view_ip_af_billing_list->RowCnt ?>_view_ip_af_billing_RealizationAmount" class="view_ip_af_billing_RealizationAmount">
<span<?php echo $view_ip_af_billing->RealizationAmount->viewAttributes() ?>>
<?php echo $view_ip_af_billing->RealizationAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_af_billing->RealizationStatus->Visible) { // RealizationStatus ?>
		<td data-name="RealizationStatus"<?php echo $view_ip_af_billing->RealizationStatus->cellAttributes() ?>>
<span id="el<?php echo $view_ip_af_billing_list->RowCnt ?>_view_ip_af_billing_RealizationStatus" class="view_ip_af_billing_RealizationStatus">
<span<?php echo $view_ip_af_billing->RealizationStatus->viewAttributes() ?>>
<?php echo $view_ip_af_billing->RealizationStatus->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_af_billing->RealizationRemarks->Visible) { // RealizationRemarks ?>
		<td data-name="RealizationRemarks"<?php echo $view_ip_af_billing->RealizationRemarks->cellAttributes() ?>>
<span id="el<?php echo $view_ip_af_billing_list->RowCnt ?>_view_ip_af_billing_RealizationRemarks" class="view_ip_af_billing_RealizationRemarks">
<span<?php echo $view_ip_af_billing->RealizationRemarks->viewAttributes() ?>>
<?php echo $view_ip_af_billing->RealizationRemarks->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_af_billing->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
		<td data-name="RealizationBatchNo"<?php echo $view_ip_af_billing->RealizationBatchNo->cellAttributes() ?>>
<span id="el<?php echo $view_ip_af_billing_list->RowCnt ?>_view_ip_af_billing_RealizationBatchNo" class="view_ip_af_billing_RealizationBatchNo">
<span<?php echo $view_ip_af_billing->RealizationBatchNo->viewAttributes() ?>>
<?php echo $view_ip_af_billing->RealizationBatchNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_af_billing->RealizationDate->Visible) { // RealizationDate ?>
		<td data-name="RealizationDate"<?php echo $view_ip_af_billing->RealizationDate->cellAttributes() ?>>
<span id="el<?php echo $view_ip_af_billing_list->RowCnt ?>_view_ip_af_billing_RealizationDate" class="view_ip_af_billing_RealizationDate">
<span<?php echo $view_ip_af_billing->RealizationDate->viewAttributes() ?>>
<?php echo $view_ip_af_billing->RealizationDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_af_billing->RIDNO->Visible) { // RIDNO ?>
		<td data-name="RIDNO"<?php echo $view_ip_af_billing->RIDNO->cellAttributes() ?>>
<span id="el<?php echo $view_ip_af_billing_list->RowCnt ?>_view_ip_af_billing_RIDNO" class="view_ip_af_billing_RIDNO">
<span<?php echo $view_ip_af_billing->RIDNO->viewAttributes() ?>>
<?php echo $view_ip_af_billing->RIDNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_af_billing->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo"<?php echo $view_ip_af_billing->TidNo->cellAttributes() ?>>
<span id="el<?php echo $view_ip_af_billing_list->RowCnt ?>_view_ip_af_billing_TidNo" class="view_ip_af_billing_TidNo">
<span<?php echo $view_ip_af_billing->TidNo->viewAttributes() ?>>
<?php echo $view_ip_af_billing->TidNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_af_billing->CId->Visible) { // CId ?>
		<td data-name="CId"<?php echo $view_ip_af_billing->CId->cellAttributes() ?>>
<span id="el<?php echo $view_ip_af_billing_list->RowCnt ?>_view_ip_af_billing_CId" class="view_ip_af_billing_CId">
<span<?php echo $view_ip_af_billing->CId->viewAttributes() ?>>
<?php echo $view_ip_af_billing->CId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_af_billing->PartnerName->Visible) { // PartnerName ?>
		<td data-name="PartnerName"<?php echo $view_ip_af_billing->PartnerName->cellAttributes() ?>>
<span id="el<?php echo $view_ip_af_billing_list->RowCnt ?>_view_ip_af_billing_PartnerName" class="view_ip_af_billing_PartnerName">
<span<?php echo $view_ip_af_billing->PartnerName->viewAttributes() ?>>
<?php echo $view_ip_af_billing->PartnerName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_af_billing->PayerType->Visible) { // PayerType ?>
		<td data-name="PayerType"<?php echo $view_ip_af_billing->PayerType->cellAttributes() ?>>
<span id="el<?php echo $view_ip_af_billing_list->RowCnt ?>_view_ip_af_billing_PayerType" class="view_ip_af_billing_PayerType">
<span<?php echo $view_ip_af_billing->PayerType->viewAttributes() ?>>
<?php echo $view_ip_af_billing->PayerType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_af_billing->Dob->Visible) { // Dob ?>
		<td data-name="Dob"<?php echo $view_ip_af_billing->Dob->cellAttributes() ?>>
<span id="el<?php echo $view_ip_af_billing_list->RowCnt ?>_view_ip_af_billing_Dob" class="view_ip_af_billing_Dob">
<span<?php echo $view_ip_af_billing->Dob->viewAttributes() ?>>
<?php echo $view_ip_af_billing->Dob->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_af_billing->Currency->Visible) { // Currency ?>
		<td data-name="Currency"<?php echo $view_ip_af_billing->Currency->cellAttributes() ?>>
<span id="el<?php echo $view_ip_af_billing_list->RowCnt ?>_view_ip_af_billing_Currency" class="view_ip_af_billing_Currency">
<span<?php echo $view_ip_af_billing->Currency->viewAttributes() ?>>
<?php echo $view_ip_af_billing->Currency->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_af_billing->PatId->Visible) { // PatId ?>
		<td data-name="PatId"<?php echo $view_ip_af_billing->PatId->cellAttributes() ?>>
<span id="el<?php echo $view_ip_af_billing_list->RowCnt ?>_view_ip_af_billing_PatId" class="view_ip_af_billing_PatId">
<span<?php echo $view_ip_af_billing->PatId->viewAttributes() ?>>
<?php echo $view_ip_af_billing->PatId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_af_billing->DrDepartment->Visible) { // DrDepartment ?>
		<td data-name="DrDepartment"<?php echo $view_ip_af_billing->DrDepartment->cellAttributes() ?>>
<span id="el<?php echo $view_ip_af_billing_list->RowCnt ?>_view_ip_af_billing_DrDepartment" class="view_ip_af_billing_DrDepartment">
<span<?php echo $view_ip_af_billing->DrDepartment->viewAttributes() ?>>
<?php echo $view_ip_af_billing->DrDepartment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_af_billing->RefferedBy->Visible) { // RefferedBy ?>
		<td data-name="RefferedBy"<?php echo $view_ip_af_billing->RefferedBy->cellAttributes() ?>>
<span id="el<?php echo $view_ip_af_billing_list->RowCnt ?>_view_ip_af_billing_RefferedBy" class="view_ip_af_billing_RefferedBy">
<span<?php echo $view_ip_af_billing->RefferedBy->viewAttributes() ?>>
<?php echo $view_ip_af_billing->RefferedBy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_af_billing->CardNumber->Visible) { // CardNumber ?>
		<td data-name="CardNumber"<?php echo $view_ip_af_billing->CardNumber->cellAttributes() ?>>
<span id="el<?php echo $view_ip_af_billing_list->RowCnt ?>_view_ip_af_billing_CardNumber" class="view_ip_af_billing_CardNumber">
<span<?php echo $view_ip_af_billing->CardNumber->viewAttributes() ?>>
<?php echo $view_ip_af_billing->CardNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_af_billing->BankName->Visible) { // BankName ?>
		<td data-name="BankName"<?php echo $view_ip_af_billing->BankName->cellAttributes() ?>>
<span id="el<?php echo $view_ip_af_billing_list->RowCnt ?>_view_ip_af_billing_BankName" class="view_ip_af_billing_BankName">
<span<?php echo $view_ip_af_billing->BankName->viewAttributes() ?>>
<?php echo $view_ip_af_billing->BankName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_af_billing->DrID->Visible) { // DrID ?>
		<td data-name="DrID"<?php echo $view_ip_af_billing->DrID->cellAttributes() ?>>
<span id="el<?php echo $view_ip_af_billing_list->RowCnt ?>_view_ip_af_billing_DrID" class="view_ip_af_billing_DrID">
<span<?php echo $view_ip_af_billing->DrID->viewAttributes() ?>>
<?php echo $view_ip_af_billing->DrID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_af_billing->BillStatus->Visible) { // BillStatus ?>
		<td data-name="BillStatus"<?php echo $view_ip_af_billing->BillStatus->cellAttributes() ?>>
<span id="el<?php echo $view_ip_af_billing_list->RowCnt ?>_view_ip_af_billing_BillStatus" class="view_ip_af_billing_BillStatus">
<span<?php echo $view_ip_af_billing->BillStatus->viewAttributes() ?>>
<?php echo $view_ip_af_billing->BillStatus->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_af_billing->UserName->Visible) { // UserName ?>
		<td data-name="UserName"<?php echo $view_ip_af_billing->UserName->cellAttributes() ?>>
<span id="el<?php echo $view_ip_af_billing_list->RowCnt ?>_view_ip_af_billing_UserName" class="view_ip_af_billing_UserName">
<span<?php echo $view_ip_af_billing->UserName->viewAttributes() ?>>
<?php echo $view_ip_af_billing->UserName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_af_billing->AdjustmentAdvance->Visible) { // AdjustmentAdvance ?>
		<td data-name="AdjustmentAdvance"<?php echo $view_ip_af_billing->AdjustmentAdvance->cellAttributes() ?>>
<span id="el<?php echo $view_ip_af_billing_list->RowCnt ?>_view_ip_af_billing_AdjustmentAdvance" class="view_ip_af_billing_AdjustmentAdvance">
<span<?php echo $view_ip_af_billing->AdjustmentAdvance->viewAttributes() ?>>
<?php echo $view_ip_af_billing->AdjustmentAdvance->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_af_billing->billing_vouchercol->Visible) { // billing_vouchercol ?>
		<td data-name="billing_vouchercol"<?php echo $view_ip_af_billing->billing_vouchercol->cellAttributes() ?>>
<span id="el<?php echo $view_ip_af_billing_list->RowCnt ?>_view_ip_af_billing_billing_vouchercol" class="view_ip_af_billing_billing_vouchercol">
<span<?php echo $view_ip_af_billing->billing_vouchercol->viewAttributes() ?>>
<?php echo $view_ip_af_billing->billing_vouchercol->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_af_billing->BillType->Visible) { // BillType ?>
		<td data-name="BillType"<?php echo $view_ip_af_billing->BillType->cellAttributes() ?>>
<span id="el<?php echo $view_ip_af_billing_list->RowCnt ?>_view_ip_af_billing_BillType" class="view_ip_af_billing_BillType">
<span<?php echo $view_ip_af_billing->BillType->viewAttributes() ?>>
<?php echo $view_ip_af_billing->BillType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_af_billing->ProcedureName->Visible) { // ProcedureName ?>
		<td data-name="ProcedureName"<?php echo $view_ip_af_billing->ProcedureName->cellAttributes() ?>>
<span id="el<?php echo $view_ip_af_billing_list->RowCnt ?>_view_ip_af_billing_ProcedureName" class="view_ip_af_billing_ProcedureName">
<span<?php echo $view_ip_af_billing->ProcedureName->viewAttributes() ?>>
<?php echo $view_ip_af_billing->ProcedureName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_af_billing->ProcedureAmount->Visible) { // ProcedureAmount ?>
		<td data-name="ProcedureAmount"<?php echo $view_ip_af_billing->ProcedureAmount->cellAttributes() ?>>
<span id="el<?php echo $view_ip_af_billing_list->RowCnt ?>_view_ip_af_billing_ProcedureAmount" class="view_ip_af_billing_ProcedureAmount">
<span<?php echo $view_ip_af_billing->ProcedureAmount->viewAttributes() ?>>
<?php echo $view_ip_af_billing->ProcedureAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_af_billing->IncludePackage->Visible) { // IncludePackage ?>
		<td data-name="IncludePackage"<?php echo $view_ip_af_billing->IncludePackage->cellAttributes() ?>>
<span id="el<?php echo $view_ip_af_billing_list->RowCnt ?>_view_ip_af_billing_IncludePackage" class="view_ip_af_billing_IncludePackage">
<span<?php echo $view_ip_af_billing->IncludePackage->viewAttributes() ?>>
<?php echo $view_ip_af_billing->IncludePackage->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_af_billing->CancelBill->Visible) { // CancelBill ?>
		<td data-name="CancelBill"<?php echo $view_ip_af_billing->CancelBill->cellAttributes() ?>>
<span id="el<?php echo $view_ip_af_billing_list->RowCnt ?>_view_ip_af_billing_CancelBill" class="view_ip_af_billing_CancelBill">
<span<?php echo $view_ip_af_billing->CancelBill->viewAttributes() ?>>
<?php echo $view_ip_af_billing->CancelBill->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_af_billing->CancelModeOfPayment->Visible) { // CancelModeOfPayment ?>
		<td data-name="CancelModeOfPayment"<?php echo $view_ip_af_billing->CancelModeOfPayment->cellAttributes() ?>>
<span id="el<?php echo $view_ip_af_billing_list->RowCnt ?>_view_ip_af_billing_CancelModeOfPayment" class="view_ip_af_billing_CancelModeOfPayment">
<span<?php echo $view_ip_af_billing->CancelModeOfPayment->viewAttributes() ?>>
<?php echo $view_ip_af_billing->CancelModeOfPayment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_af_billing->CancelAmount->Visible) { // CancelAmount ?>
		<td data-name="CancelAmount"<?php echo $view_ip_af_billing->CancelAmount->cellAttributes() ?>>
<span id="el<?php echo $view_ip_af_billing_list->RowCnt ?>_view_ip_af_billing_CancelAmount" class="view_ip_af_billing_CancelAmount">
<span<?php echo $view_ip_af_billing->CancelAmount->viewAttributes() ?>>
<?php echo $view_ip_af_billing->CancelAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_af_billing->CancelBankName->Visible) { // CancelBankName ?>
		<td data-name="CancelBankName"<?php echo $view_ip_af_billing->CancelBankName->cellAttributes() ?>>
<span id="el<?php echo $view_ip_af_billing_list->RowCnt ?>_view_ip_af_billing_CancelBankName" class="view_ip_af_billing_CancelBankName">
<span<?php echo $view_ip_af_billing->CancelBankName->viewAttributes() ?>>
<?php echo $view_ip_af_billing->CancelBankName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_af_billing->CancelTransactionNumber->Visible) { // CancelTransactionNumber ?>
		<td data-name="CancelTransactionNumber"<?php echo $view_ip_af_billing->CancelTransactionNumber->cellAttributes() ?>>
<span id="el<?php echo $view_ip_af_billing_list->RowCnt ?>_view_ip_af_billing_CancelTransactionNumber" class="view_ip_af_billing_CancelTransactionNumber">
<span<?php echo $view_ip_af_billing->CancelTransactionNumber->viewAttributes() ?>>
<?php echo $view_ip_af_billing->CancelTransactionNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_af_billing->LabTest->Visible) { // LabTest ?>
		<td data-name="LabTest"<?php echo $view_ip_af_billing->LabTest->cellAttributes() ?>>
<span id="el<?php echo $view_ip_af_billing_list->RowCnt ?>_view_ip_af_billing_LabTest" class="view_ip_af_billing_LabTest">
<span<?php echo $view_ip_af_billing->LabTest->viewAttributes() ?>>
<?php echo $view_ip_af_billing->LabTest->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_af_billing->sid->Visible) { // sid ?>
		<td data-name="sid"<?php echo $view_ip_af_billing->sid->cellAttributes() ?>>
<span id="el<?php echo $view_ip_af_billing_list->RowCnt ?>_view_ip_af_billing_sid" class="view_ip_af_billing_sid">
<span<?php echo $view_ip_af_billing->sid->viewAttributes() ?>>
<?php echo $view_ip_af_billing->sid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_af_billing->SidNo->Visible) { // SidNo ?>
		<td data-name="SidNo"<?php echo $view_ip_af_billing->SidNo->cellAttributes() ?>>
<span id="el<?php echo $view_ip_af_billing_list->RowCnt ?>_view_ip_af_billing_SidNo" class="view_ip_af_billing_SidNo">
<span<?php echo $view_ip_af_billing->SidNo->viewAttributes() ?>>
<?php echo $view_ip_af_billing->SidNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_af_billing->createdDatettime->Visible) { // createdDatettime ?>
		<td data-name="createdDatettime"<?php echo $view_ip_af_billing->createdDatettime->cellAttributes() ?>>
<span id="el<?php echo $view_ip_af_billing_list->RowCnt ?>_view_ip_af_billing_createdDatettime" class="view_ip_af_billing_createdDatettime">
<span<?php echo $view_ip_af_billing->createdDatettime->viewAttributes() ?>>
<?php echo $view_ip_af_billing->createdDatettime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_af_billing->LabTestReleased->Visible) { // LabTestReleased ?>
		<td data-name="LabTestReleased"<?php echo $view_ip_af_billing->LabTestReleased->cellAttributes() ?>>
<span id="el<?php echo $view_ip_af_billing_list->RowCnt ?>_view_ip_af_billing_LabTestReleased" class="view_ip_af_billing_LabTestReleased">
<span<?php echo $view_ip_af_billing->LabTestReleased->viewAttributes() ?>>
<?php echo $view_ip_af_billing->LabTestReleased->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_af_billing->GoogleReviewID->Visible) { // GoogleReviewID ?>
		<td data-name="GoogleReviewID"<?php echo $view_ip_af_billing->GoogleReviewID->cellAttributes() ?>>
<span id="el<?php echo $view_ip_af_billing_list->RowCnt ?>_view_ip_af_billing_GoogleReviewID" class="view_ip_af_billing_GoogleReviewID">
<span<?php echo $view_ip_af_billing->GoogleReviewID->viewAttributes() ?>>
<?php echo $view_ip_af_billing->GoogleReviewID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_af_billing->CardType->Visible) { // CardType ?>
		<td data-name="CardType"<?php echo $view_ip_af_billing->CardType->cellAttributes() ?>>
<span id="el<?php echo $view_ip_af_billing_list->RowCnt ?>_view_ip_af_billing_CardType" class="view_ip_af_billing_CardType">
<span<?php echo $view_ip_af_billing->CardType->viewAttributes() ?>>
<?php echo $view_ip_af_billing->CardType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_af_billing->PharmacyBill->Visible) { // PharmacyBill ?>
		<td data-name="PharmacyBill"<?php echo $view_ip_af_billing->PharmacyBill->cellAttributes() ?>>
<span id="el<?php echo $view_ip_af_billing_list->RowCnt ?>_view_ip_af_billing_PharmacyBill" class="view_ip_af_billing_PharmacyBill">
<span<?php echo $view_ip_af_billing->PharmacyBill->viewAttributes() ?>>
<?php echo $view_ip_af_billing->PharmacyBill->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_af_billing->DiscountAmount->Visible) { // DiscountAmount ?>
		<td data-name="DiscountAmount"<?php echo $view_ip_af_billing->DiscountAmount->cellAttributes() ?>>
<span id="el<?php echo $view_ip_af_billing_list->RowCnt ?>_view_ip_af_billing_DiscountAmount" class="view_ip_af_billing_DiscountAmount">
<span<?php echo $view_ip_af_billing->DiscountAmount->viewAttributes() ?>>
<?php echo $view_ip_af_billing->DiscountAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_af_billing->Cash->Visible) { // Cash ?>
		<td data-name="Cash"<?php echo $view_ip_af_billing->Cash->cellAttributes() ?>>
<span id="el<?php echo $view_ip_af_billing_list->RowCnt ?>_view_ip_af_billing_Cash" class="view_ip_af_billing_Cash">
<span<?php echo $view_ip_af_billing->Cash->viewAttributes() ?>>
<?php echo $view_ip_af_billing->Cash->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_af_billing->Card->Visible) { // Card ?>
		<td data-name="Card"<?php echo $view_ip_af_billing->Card->cellAttributes() ?>>
<span id="el<?php echo $view_ip_af_billing_list->RowCnt ?>_view_ip_af_billing_Card" class="view_ip_af_billing_Card">
<span<?php echo $view_ip_af_billing->Card->viewAttributes() ?>>
<?php echo $view_ip_af_billing->Card->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_ip_af_billing_list->ListOptions->render("body", "right", $view_ip_af_billing_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_ip_af_billing->isGridAdd())
		$view_ip_af_billing_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_ip_af_billing->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_ip_af_billing_list->Recordset)
	$view_ip_af_billing_list->Recordset->Close();
?>
<?php if (!$view_ip_af_billing->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_ip_af_billing->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_ip_af_billing_list->Pager)) $view_ip_af_billing_list->Pager = new NumericPager($view_ip_af_billing_list->StartRec, $view_ip_af_billing_list->DisplayRecs, $view_ip_af_billing_list->TotalRecs, $view_ip_af_billing_list->RecRange, $view_ip_af_billing_list->AutoHidePager) ?>
<?php if ($view_ip_af_billing_list->Pager->RecordCount > 0 && $view_ip_af_billing_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_ip_af_billing_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ip_af_billing_list->pageUrl() ?>start=<?php echo $view_ip_af_billing_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_ip_af_billing_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ip_af_billing_list->pageUrl() ?>start=<?php echo $view_ip_af_billing_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_ip_af_billing_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_ip_af_billing_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_ip_af_billing_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ip_af_billing_list->pageUrl() ?>start=<?php echo $view_ip_af_billing_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_ip_af_billing_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ip_af_billing_list->pageUrl() ?>start=<?php echo $view_ip_af_billing_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_ip_af_billing_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_ip_af_billing_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_ip_af_billing_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_ip_af_billing_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_ip_af_billing_list->TotalRecs > 0 && (!$view_ip_af_billing_list->AutoHidePageSizeSelector || $view_ip_af_billing_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_ip_af_billing">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_ip_af_billing_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_ip_af_billing_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_ip_af_billing_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_ip_af_billing_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_ip_af_billing_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_ip_af_billing_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_ip_af_billing->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_ip_af_billing_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_ip_af_billing_list->TotalRecs == 0 && !$view_ip_af_billing->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_ip_af_billing_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_ip_af_billing_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_ip_af_billing->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_ip_af_billing->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_ip_af_billing", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_ip_af_billing_list->terminate();
?>