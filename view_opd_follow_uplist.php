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
$view_opd_follow_up_list = new view_opd_follow_up_list();

// Run the page
$view_opd_follow_up_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_opd_follow_up_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_opd_follow_up->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_opd_follow_uplist = currentForm = new ew.Form("fview_opd_follow_uplist", "list");
fview_opd_follow_uplist.formKeyCountName = '<?php echo $view_opd_follow_up_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_opd_follow_uplist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_opd_follow_uplist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_opd_follow_uplist.lists["x_ICSIAdvised[]"] = <?php echo $view_opd_follow_up_list->ICSIAdvised->Lookup->toClientList() ?>;
fview_opd_follow_uplist.lists["x_ICSIAdvised[]"].options = <?php echo JsonEncode($view_opd_follow_up_list->ICSIAdvised->options(FALSE, TRUE)) ?>;
fview_opd_follow_uplist.lists["x_DeliveryRegistered[]"] = <?php echo $view_opd_follow_up_list->DeliveryRegistered->Lookup->toClientList() ?>;
fview_opd_follow_uplist.lists["x_DeliveryRegistered[]"].options = <?php echo JsonEncode($view_opd_follow_up_list->DeliveryRegistered->options(FALSE, TRUE)) ?>;
fview_opd_follow_uplist.lists["x_SerologyPositive[]"] = <?php echo $view_opd_follow_up_list->SerologyPositive->Lookup->toClientList() ?>;
fview_opd_follow_uplist.lists["x_SerologyPositive[]"].options = <?php echo JsonEncode($view_opd_follow_up_list->SerologyPositive->options(FALSE, TRUE)) ?>;
fview_opd_follow_uplist.lists["x_Allergy"] = <?php echo $view_opd_follow_up_list->Allergy->Lookup->toClientList() ?>;
fview_opd_follow_uplist.lists["x_Allergy"].options = <?php echo JsonEncode($view_opd_follow_up_list->Allergy->lookupOptions()) ?>;

// Form object for search
var fview_opd_follow_uplistsrch = currentSearchForm = new ew.Form("fview_opd_follow_uplistsrch");

// Filters
fview_opd_follow_uplistsrch.filterList = <?php echo $view_opd_follow_up_list->getFilterList() ?>;
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
<?php if (!$view_opd_follow_up->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_opd_follow_up_list->TotalRecs > 0 && $view_opd_follow_up_list->ExportOptions->visible()) { ?>
<?php $view_opd_follow_up_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_opd_follow_up_list->ImportOptions->visible()) { ?>
<?php $view_opd_follow_up_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_opd_follow_up_list->SearchOptions->visible()) { ?>
<?php $view_opd_follow_up_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_opd_follow_up_list->FilterOptions->visible()) { ?>
<?php $view_opd_follow_up_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_opd_follow_up_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_opd_follow_up->isExport() && !$view_opd_follow_up->CurrentAction) { ?>
<form name="fview_opd_follow_uplistsrch" id="fview_opd_follow_uplistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_opd_follow_up_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_opd_follow_uplistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_opd_follow_up">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_opd_follow_up_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_opd_follow_up_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_opd_follow_up_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_opd_follow_up_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_opd_follow_up_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_opd_follow_up_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_opd_follow_up_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_opd_follow_up_list->showPageHeader(); ?>
<?php
$view_opd_follow_up_list->showMessage();
?>
<?php if ($view_opd_follow_up_list->TotalRecs > 0 || $view_opd_follow_up->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_opd_follow_up_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_opd_follow_up">
<?php if (!$view_opd_follow_up->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_opd_follow_up->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_opd_follow_up_list->Pager)) $view_opd_follow_up_list->Pager = new NumericPager($view_opd_follow_up_list->StartRec, $view_opd_follow_up_list->DisplayRecs, $view_opd_follow_up_list->TotalRecs, $view_opd_follow_up_list->RecRange, $view_opd_follow_up_list->AutoHidePager) ?>
<?php if ($view_opd_follow_up_list->Pager->RecordCount > 0 && $view_opd_follow_up_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_opd_follow_up_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_opd_follow_up_list->pageUrl() ?>start=<?php echo $view_opd_follow_up_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_opd_follow_up_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_opd_follow_up_list->pageUrl() ?>start=<?php echo $view_opd_follow_up_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_opd_follow_up_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_opd_follow_up_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_opd_follow_up_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_opd_follow_up_list->pageUrl() ?>start=<?php echo $view_opd_follow_up_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_opd_follow_up_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_opd_follow_up_list->pageUrl() ?>start=<?php echo $view_opd_follow_up_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_opd_follow_up_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_opd_follow_up_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_opd_follow_up_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_opd_follow_up_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_opd_follow_up_list->TotalRecs > 0 && (!$view_opd_follow_up_list->AutoHidePageSizeSelector || $view_opd_follow_up_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_opd_follow_up">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_opd_follow_up_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_opd_follow_up_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_opd_follow_up_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_opd_follow_up_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_opd_follow_up_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_opd_follow_up_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_opd_follow_up->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_opd_follow_up_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_opd_follow_uplist" id="fview_opd_follow_uplist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_opd_follow_up_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_opd_follow_up_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_opd_follow_up">
<div id="gmp_view_opd_follow_up" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_opd_follow_up_list->TotalRecs > 0 || $view_opd_follow_up->isGridEdit()) { ?>
<table id="tbl_view_opd_follow_uplist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_opd_follow_up_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_opd_follow_up_list->renderListOptions();

// Render list options (header, left)
$view_opd_follow_up_list->ListOptions->render("header", "left");
?>
<?php if ($view_opd_follow_up->id->Visible) { // id ?>
	<?php if ($view_opd_follow_up->sortUrl($view_opd_follow_up->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_opd_follow_up->id->headerCellClass() ?>"><div id="elh_view_opd_follow_up_id" class="view_opd_follow_up_id"><div class="ew-table-header-caption"><?php echo $view_opd_follow_up->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_opd_follow_up->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_opd_follow_up->SortUrl($view_opd_follow_up->id) ?>',1);"><div id="elh_view_opd_follow_up_id" class="view_opd_follow_up_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_opd_follow_up->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_opd_follow_up->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_opd_follow_up->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_opd_follow_up->Reception->Visible) { // Reception ?>
	<?php if ($view_opd_follow_up->sortUrl($view_opd_follow_up->Reception) == "") { ?>
		<th data-name="Reception" class="<?php echo $view_opd_follow_up->Reception->headerCellClass() ?>"><div id="elh_view_opd_follow_up_Reception" class="view_opd_follow_up_Reception"><div class="ew-table-header-caption"><?php echo $view_opd_follow_up->Reception->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Reception" class="<?php echo $view_opd_follow_up->Reception->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_opd_follow_up->SortUrl($view_opd_follow_up->Reception) ?>',1);"><div id="elh_view_opd_follow_up_Reception" class="view_opd_follow_up_Reception">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_opd_follow_up->Reception->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_opd_follow_up->Reception->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_opd_follow_up->Reception->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_opd_follow_up->PatientId->Visible) { // PatientId ?>
	<?php if ($view_opd_follow_up->sortUrl($view_opd_follow_up->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $view_opd_follow_up->PatientId->headerCellClass() ?>"><div id="elh_view_opd_follow_up_PatientId" class="view_opd_follow_up_PatientId"><div class="ew-table-header-caption"><?php echo $view_opd_follow_up->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $view_opd_follow_up->PatientId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_opd_follow_up->SortUrl($view_opd_follow_up->PatientId) ?>',1);"><div id="elh_view_opd_follow_up_PatientId" class="view_opd_follow_up_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_opd_follow_up->PatientId->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_opd_follow_up->PatientId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_opd_follow_up->PatientId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_opd_follow_up->mrnno->Visible) { // mrnno ?>
	<?php if ($view_opd_follow_up->sortUrl($view_opd_follow_up->mrnno) == "") { ?>
		<th data-name="mrnno" class="<?php echo $view_opd_follow_up->mrnno->headerCellClass() ?>"><div id="elh_view_opd_follow_up_mrnno" class="view_opd_follow_up_mrnno"><div class="ew-table-header-caption"><?php echo $view_opd_follow_up->mrnno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnno" class="<?php echo $view_opd_follow_up->mrnno->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_opd_follow_up->SortUrl($view_opd_follow_up->mrnno) ?>',1);"><div id="elh_view_opd_follow_up_mrnno" class="view_opd_follow_up_mrnno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_opd_follow_up->mrnno->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_opd_follow_up->mrnno->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_opd_follow_up->mrnno->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_opd_follow_up->PatientName->Visible) { // PatientName ?>
	<?php if ($view_opd_follow_up->sortUrl($view_opd_follow_up->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $view_opd_follow_up->PatientName->headerCellClass() ?>"><div id="elh_view_opd_follow_up_PatientName" class="view_opd_follow_up_PatientName"><div class="ew-table-header-caption"><?php echo $view_opd_follow_up->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $view_opd_follow_up->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_opd_follow_up->SortUrl($view_opd_follow_up->PatientName) ?>',1);"><div id="elh_view_opd_follow_up_PatientName" class="view_opd_follow_up_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_opd_follow_up->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_opd_follow_up->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_opd_follow_up->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_opd_follow_up->Telephone->Visible) { // Telephone ?>
	<?php if ($view_opd_follow_up->sortUrl($view_opd_follow_up->Telephone) == "") { ?>
		<th data-name="Telephone" class="<?php echo $view_opd_follow_up->Telephone->headerCellClass() ?>"><div id="elh_view_opd_follow_up_Telephone" class="view_opd_follow_up_Telephone"><div class="ew-table-header-caption"><?php echo $view_opd_follow_up->Telephone->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Telephone" class="<?php echo $view_opd_follow_up->Telephone->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_opd_follow_up->SortUrl($view_opd_follow_up->Telephone) ?>',1);"><div id="elh_view_opd_follow_up_Telephone" class="view_opd_follow_up_Telephone">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_opd_follow_up->Telephone->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_opd_follow_up->Telephone->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_opd_follow_up->Telephone->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_opd_follow_up->Age->Visible) { // Age ?>
	<?php if ($view_opd_follow_up->sortUrl($view_opd_follow_up->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $view_opd_follow_up->Age->headerCellClass() ?>"><div id="elh_view_opd_follow_up_Age" class="view_opd_follow_up_Age"><div class="ew-table-header-caption"><?php echo $view_opd_follow_up->Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $view_opd_follow_up->Age->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_opd_follow_up->SortUrl($view_opd_follow_up->Age) ?>',1);"><div id="elh_view_opd_follow_up_Age" class="view_opd_follow_up_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_opd_follow_up->Age->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_opd_follow_up->Age->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_opd_follow_up->Age->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_opd_follow_up->Gender->Visible) { // Gender ?>
	<?php if ($view_opd_follow_up->sortUrl($view_opd_follow_up->Gender) == "") { ?>
		<th data-name="Gender" class="<?php echo $view_opd_follow_up->Gender->headerCellClass() ?>"><div id="elh_view_opd_follow_up_Gender" class="view_opd_follow_up_Gender"><div class="ew-table-header-caption"><?php echo $view_opd_follow_up->Gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gender" class="<?php echo $view_opd_follow_up->Gender->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_opd_follow_up->SortUrl($view_opd_follow_up->Gender) ?>',1);"><div id="elh_view_opd_follow_up_Gender" class="view_opd_follow_up_Gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_opd_follow_up->Gender->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_opd_follow_up->Gender->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_opd_follow_up->Gender->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_opd_follow_up->NextReviewDate->Visible) { // NextReviewDate ?>
	<?php if ($view_opd_follow_up->sortUrl($view_opd_follow_up->NextReviewDate) == "") { ?>
		<th data-name="NextReviewDate" class="<?php echo $view_opd_follow_up->NextReviewDate->headerCellClass() ?>"><div id="elh_view_opd_follow_up_NextReviewDate" class="view_opd_follow_up_NextReviewDate"><div class="ew-table-header-caption"><?php echo $view_opd_follow_up->NextReviewDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NextReviewDate" class="<?php echo $view_opd_follow_up->NextReviewDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_opd_follow_up->SortUrl($view_opd_follow_up->NextReviewDate) ?>',1);"><div id="elh_view_opd_follow_up_NextReviewDate" class="view_opd_follow_up_NextReviewDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_opd_follow_up->NextReviewDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_opd_follow_up->NextReviewDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_opd_follow_up->NextReviewDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_opd_follow_up->ICSIAdvised->Visible) { // ICSIAdvised ?>
	<?php if ($view_opd_follow_up->sortUrl($view_opd_follow_up->ICSIAdvised) == "") { ?>
		<th data-name="ICSIAdvised" class="<?php echo $view_opd_follow_up->ICSIAdvised->headerCellClass() ?>"><div id="elh_view_opd_follow_up_ICSIAdvised" class="view_opd_follow_up_ICSIAdvised"><div class="ew-table-header-caption"><?php echo $view_opd_follow_up->ICSIAdvised->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ICSIAdvised" class="<?php echo $view_opd_follow_up->ICSIAdvised->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_opd_follow_up->SortUrl($view_opd_follow_up->ICSIAdvised) ?>',1);"><div id="elh_view_opd_follow_up_ICSIAdvised" class="view_opd_follow_up_ICSIAdvised">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_opd_follow_up->ICSIAdvised->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_opd_follow_up->ICSIAdvised->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_opd_follow_up->ICSIAdvised->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_opd_follow_up->DeliveryRegistered->Visible) { // DeliveryRegistered ?>
	<?php if ($view_opd_follow_up->sortUrl($view_opd_follow_up->DeliveryRegistered) == "") { ?>
		<th data-name="DeliveryRegistered" class="<?php echo $view_opd_follow_up->DeliveryRegistered->headerCellClass() ?>"><div id="elh_view_opd_follow_up_DeliveryRegistered" class="view_opd_follow_up_DeliveryRegistered"><div class="ew-table-header-caption"><?php echo $view_opd_follow_up->DeliveryRegistered->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DeliveryRegistered" class="<?php echo $view_opd_follow_up->DeliveryRegistered->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_opd_follow_up->SortUrl($view_opd_follow_up->DeliveryRegistered) ?>',1);"><div id="elh_view_opd_follow_up_DeliveryRegistered" class="view_opd_follow_up_DeliveryRegistered">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_opd_follow_up->DeliveryRegistered->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_opd_follow_up->DeliveryRegistered->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_opd_follow_up->DeliveryRegistered->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_opd_follow_up->EDD->Visible) { // EDD ?>
	<?php if ($view_opd_follow_up->sortUrl($view_opd_follow_up->EDD) == "") { ?>
		<th data-name="EDD" class="<?php echo $view_opd_follow_up->EDD->headerCellClass() ?>"><div id="elh_view_opd_follow_up_EDD" class="view_opd_follow_up_EDD"><div class="ew-table-header-caption"><?php echo $view_opd_follow_up->EDD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EDD" class="<?php echo $view_opd_follow_up->EDD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_opd_follow_up->SortUrl($view_opd_follow_up->EDD) ?>',1);"><div id="elh_view_opd_follow_up_EDD" class="view_opd_follow_up_EDD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_opd_follow_up->EDD->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_opd_follow_up->EDD->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_opd_follow_up->EDD->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_opd_follow_up->SerologyPositive->Visible) { // SerologyPositive ?>
	<?php if ($view_opd_follow_up->sortUrl($view_opd_follow_up->SerologyPositive) == "") { ?>
		<th data-name="SerologyPositive" class="<?php echo $view_opd_follow_up->SerologyPositive->headerCellClass() ?>"><div id="elh_view_opd_follow_up_SerologyPositive" class="view_opd_follow_up_SerologyPositive"><div class="ew-table-header-caption"><?php echo $view_opd_follow_up->SerologyPositive->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SerologyPositive" class="<?php echo $view_opd_follow_up->SerologyPositive->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_opd_follow_up->SortUrl($view_opd_follow_up->SerologyPositive) ?>',1);"><div id="elh_view_opd_follow_up_SerologyPositive" class="view_opd_follow_up_SerologyPositive">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_opd_follow_up->SerologyPositive->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_opd_follow_up->SerologyPositive->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_opd_follow_up->SerologyPositive->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_opd_follow_up->Allergy->Visible) { // Allergy ?>
	<?php if ($view_opd_follow_up->sortUrl($view_opd_follow_up->Allergy) == "") { ?>
		<th data-name="Allergy" class="<?php echo $view_opd_follow_up->Allergy->headerCellClass() ?>"><div id="elh_view_opd_follow_up_Allergy" class="view_opd_follow_up_Allergy"><div class="ew-table-header-caption"><?php echo $view_opd_follow_up->Allergy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Allergy" class="<?php echo $view_opd_follow_up->Allergy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_opd_follow_up->SortUrl($view_opd_follow_up->Allergy) ?>',1);"><div id="elh_view_opd_follow_up_Allergy" class="view_opd_follow_up_Allergy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_opd_follow_up->Allergy->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_opd_follow_up->Allergy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_opd_follow_up->Allergy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_opd_follow_up->status->Visible) { // status ?>
	<?php if ($view_opd_follow_up->sortUrl($view_opd_follow_up->status) == "") { ?>
		<th data-name="status" class="<?php echo $view_opd_follow_up->status->headerCellClass() ?>"><div id="elh_view_opd_follow_up_status" class="view_opd_follow_up_status"><div class="ew-table-header-caption"><?php echo $view_opd_follow_up->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $view_opd_follow_up->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_opd_follow_up->SortUrl($view_opd_follow_up->status) ?>',1);"><div id="elh_view_opd_follow_up_status" class="view_opd_follow_up_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_opd_follow_up->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_opd_follow_up->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_opd_follow_up->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_opd_follow_up->createdby->Visible) { // createdby ?>
	<?php if ($view_opd_follow_up->sortUrl($view_opd_follow_up->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $view_opd_follow_up->createdby->headerCellClass() ?>"><div id="elh_view_opd_follow_up_createdby" class="view_opd_follow_up_createdby"><div class="ew-table-header-caption"><?php echo $view_opd_follow_up->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $view_opd_follow_up->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_opd_follow_up->SortUrl($view_opd_follow_up->createdby) ?>',1);"><div id="elh_view_opd_follow_up_createdby" class="view_opd_follow_up_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_opd_follow_up->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_opd_follow_up->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_opd_follow_up->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_opd_follow_up->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_opd_follow_up->sortUrl($view_opd_follow_up->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_opd_follow_up->createddatetime->headerCellClass() ?>"><div id="elh_view_opd_follow_up_createddatetime" class="view_opd_follow_up_createddatetime"><div class="ew-table-header-caption"><?php echo $view_opd_follow_up->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_opd_follow_up->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_opd_follow_up->SortUrl($view_opd_follow_up->createddatetime) ?>',1);"><div id="elh_view_opd_follow_up_createddatetime" class="view_opd_follow_up_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_opd_follow_up->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_opd_follow_up->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_opd_follow_up->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_opd_follow_up->modifiedby->Visible) { // modifiedby ?>
	<?php if ($view_opd_follow_up->sortUrl($view_opd_follow_up->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $view_opd_follow_up->modifiedby->headerCellClass() ?>"><div id="elh_view_opd_follow_up_modifiedby" class="view_opd_follow_up_modifiedby"><div class="ew-table-header-caption"><?php echo $view_opd_follow_up->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $view_opd_follow_up->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_opd_follow_up->SortUrl($view_opd_follow_up->modifiedby) ?>',1);"><div id="elh_view_opd_follow_up_modifiedby" class="view_opd_follow_up_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_opd_follow_up->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_opd_follow_up->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_opd_follow_up->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_opd_follow_up->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($view_opd_follow_up->sortUrl($view_opd_follow_up->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_opd_follow_up->modifieddatetime->headerCellClass() ?>"><div id="elh_view_opd_follow_up_modifieddatetime" class="view_opd_follow_up_modifieddatetime"><div class="ew-table-header-caption"><?php echo $view_opd_follow_up->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_opd_follow_up->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_opd_follow_up->SortUrl($view_opd_follow_up->modifieddatetime) ?>',1);"><div id="elh_view_opd_follow_up_modifieddatetime" class="view_opd_follow_up_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_opd_follow_up->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_opd_follow_up->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_opd_follow_up->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_opd_follow_up->LMP->Visible) { // LMP ?>
	<?php if ($view_opd_follow_up->sortUrl($view_opd_follow_up->LMP) == "") { ?>
		<th data-name="LMP" class="<?php echo $view_opd_follow_up->LMP->headerCellClass() ?>"><div id="elh_view_opd_follow_up_LMP" class="view_opd_follow_up_LMP"><div class="ew-table-header-caption"><?php echo $view_opd_follow_up->LMP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LMP" class="<?php echo $view_opd_follow_up->LMP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_opd_follow_up->SortUrl($view_opd_follow_up->LMP) ?>',1);"><div id="elh_view_opd_follow_up_LMP" class="view_opd_follow_up_LMP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_opd_follow_up->LMP->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_opd_follow_up->LMP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_opd_follow_up->LMP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_opd_follow_up->ProcedureDateTime->Visible) { // ProcedureDateTime ?>
	<?php if ($view_opd_follow_up->sortUrl($view_opd_follow_up->ProcedureDateTime) == "") { ?>
		<th data-name="ProcedureDateTime" class="<?php echo $view_opd_follow_up->ProcedureDateTime->headerCellClass() ?>"><div id="elh_view_opd_follow_up_ProcedureDateTime" class="view_opd_follow_up_ProcedureDateTime"><div class="ew-table-header-caption"><?php echo $view_opd_follow_up->ProcedureDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProcedureDateTime" class="<?php echo $view_opd_follow_up->ProcedureDateTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_opd_follow_up->SortUrl($view_opd_follow_up->ProcedureDateTime) ?>',1);"><div id="elh_view_opd_follow_up_ProcedureDateTime" class="view_opd_follow_up_ProcedureDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_opd_follow_up->ProcedureDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_opd_follow_up->ProcedureDateTime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_opd_follow_up->ProcedureDateTime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_opd_follow_up->ICSIDate->Visible) { // ICSIDate ?>
	<?php if ($view_opd_follow_up->sortUrl($view_opd_follow_up->ICSIDate) == "") { ?>
		<th data-name="ICSIDate" class="<?php echo $view_opd_follow_up->ICSIDate->headerCellClass() ?>"><div id="elh_view_opd_follow_up_ICSIDate" class="view_opd_follow_up_ICSIDate"><div class="ew-table-header-caption"><?php echo $view_opd_follow_up->ICSIDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ICSIDate" class="<?php echo $view_opd_follow_up->ICSIDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_opd_follow_up->SortUrl($view_opd_follow_up->ICSIDate) ?>',1);"><div id="elh_view_opd_follow_up_ICSIDate" class="view_opd_follow_up_ICSIDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_opd_follow_up->ICSIDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_opd_follow_up->ICSIDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_opd_follow_up->ICSIDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_opd_follow_up_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_opd_follow_up->ExportAll && $view_opd_follow_up->isExport()) {
	$view_opd_follow_up_list->StopRec = $view_opd_follow_up_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_opd_follow_up_list->TotalRecs > $view_opd_follow_up_list->StartRec + $view_opd_follow_up_list->DisplayRecs - 1)
		$view_opd_follow_up_list->StopRec = $view_opd_follow_up_list->StartRec + $view_opd_follow_up_list->DisplayRecs - 1;
	else
		$view_opd_follow_up_list->StopRec = $view_opd_follow_up_list->TotalRecs;
}
$view_opd_follow_up_list->RecCnt = $view_opd_follow_up_list->StartRec - 1;
if ($view_opd_follow_up_list->Recordset && !$view_opd_follow_up_list->Recordset->EOF) {
	$view_opd_follow_up_list->Recordset->moveFirst();
	$selectLimit = $view_opd_follow_up_list->UseSelectLimit;
	if (!$selectLimit && $view_opd_follow_up_list->StartRec > 1)
		$view_opd_follow_up_list->Recordset->move($view_opd_follow_up_list->StartRec - 1);
} elseif (!$view_opd_follow_up->AllowAddDeleteRow && $view_opd_follow_up_list->StopRec == 0) {
	$view_opd_follow_up_list->StopRec = $view_opd_follow_up->GridAddRowCount;
}

// Initialize aggregate
$view_opd_follow_up->RowType = ROWTYPE_AGGREGATEINIT;
$view_opd_follow_up->resetAttributes();
$view_opd_follow_up_list->renderRow();
while ($view_opd_follow_up_list->RecCnt < $view_opd_follow_up_list->StopRec) {
	$view_opd_follow_up_list->RecCnt++;
	if ($view_opd_follow_up_list->RecCnt >= $view_opd_follow_up_list->StartRec) {
		$view_opd_follow_up_list->RowCnt++;

		// Set up key count
		$view_opd_follow_up_list->KeyCount = $view_opd_follow_up_list->RowIndex;

		// Init row class and style
		$view_opd_follow_up->resetAttributes();
		$view_opd_follow_up->CssClass = "";
		if ($view_opd_follow_up->isGridAdd()) {
		} else {
			$view_opd_follow_up_list->loadRowValues($view_opd_follow_up_list->Recordset); // Load row values
		}
		$view_opd_follow_up->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_opd_follow_up->RowAttrs = array_merge($view_opd_follow_up->RowAttrs, array('data-rowindex'=>$view_opd_follow_up_list->RowCnt, 'id'=>'r' . $view_opd_follow_up_list->RowCnt . '_view_opd_follow_up', 'data-rowtype'=>$view_opd_follow_up->RowType));

		// Render row
		$view_opd_follow_up_list->renderRow();

		// Render list options
		$view_opd_follow_up_list->renderListOptions();
?>
	<tr<?php echo $view_opd_follow_up->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_opd_follow_up_list->ListOptions->render("body", "left", $view_opd_follow_up_list->RowCnt);
?>
	<?php if ($view_opd_follow_up->id->Visible) { // id ?>
		<td data-name="id"<?php echo $view_opd_follow_up->id->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_list->RowCnt ?>_view_opd_follow_up_id" class="view_opd_follow_up_id">
<span<?php echo $view_opd_follow_up->id->viewAttributes() ?>>
<?php echo $view_opd_follow_up->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_opd_follow_up->Reception->Visible) { // Reception ?>
		<td data-name="Reception"<?php echo $view_opd_follow_up->Reception->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_list->RowCnt ?>_view_opd_follow_up_Reception" class="view_opd_follow_up_Reception">
<span<?php echo $view_opd_follow_up->Reception->viewAttributes() ?>>
<?php echo $view_opd_follow_up->Reception->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_opd_follow_up->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId"<?php echo $view_opd_follow_up->PatientId->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_list->RowCnt ?>_view_opd_follow_up_PatientId" class="view_opd_follow_up_PatientId">
<span<?php echo $view_opd_follow_up->PatientId->viewAttributes() ?>>
<?php echo $view_opd_follow_up->PatientId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_opd_follow_up->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno"<?php echo $view_opd_follow_up->mrnno->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_list->RowCnt ?>_view_opd_follow_up_mrnno" class="view_opd_follow_up_mrnno">
<span<?php echo $view_opd_follow_up->mrnno->viewAttributes() ?>>
<?php echo $view_opd_follow_up->mrnno->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_opd_follow_up->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $view_opd_follow_up->PatientName->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_list->RowCnt ?>_view_opd_follow_up_PatientName" class="view_opd_follow_up_PatientName">
<span<?php echo $view_opd_follow_up->PatientName->viewAttributes() ?>>
<?php echo $view_opd_follow_up->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_opd_follow_up->Telephone->Visible) { // Telephone ?>
		<td data-name="Telephone"<?php echo $view_opd_follow_up->Telephone->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_list->RowCnt ?>_view_opd_follow_up_Telephone" class="view_opd_follow_up_Telephone">
<span<?php echo $view_opd_follow_up->Telephone->viewAttributes() ?>>
<?php echo $view_opd_follow_up->Telephone->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_opd_follow_up->Age->Visible) { // Age ?>
		<td data-name="Age"<?php echo $view_opd_follow_up->Age->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_list->RowCnt ?>_view_opd_follow_up_Age" class="view_opd_follow_up_Age">
<span<?php echo $view_opd_follow_up->Age->viewAttributes() ?>>
<?php echo $view_opd_follow_up->Age->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_opd_follow_up->Gender->Visible) { // Gender ?>
		<td data-name="Gender"<?php echo $view_opd_follow_up->Gender->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_list->RowCnt ?>_view_opd_follow_up_Gender" class="view_opd_follow_up_Gender">
<span<?php echo $view_opd_follow_up->Gender->viewAttributes() ?>>
<?php echo $view_opd_follow_up->Gender->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_opd_follow_up->NextReviewDate->Visible) { // NextReviewDate ?>
		<td data-name="NextReviewDate"<?php echo $view_opd_follow_up->NextReviewDate->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_list->RowCnt ?>_view_opd_follow_up_NextReviewDate" class="view_opd_follow_up_NextReviewDate">
<span<?php echo $view_opd_follow_up->NextReviewDate->viewAttributes() ?>>
<?php echo $view_opd_follow_up->NextReviewDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_opd_follow_up->ICSIAdvised->Visible) { // ICSIAdvised ?>
		<td data-name="ICSIAdvised"<?php echo $view_opd_follow_up->ICSIAdvised->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_list->RowCnt ?>_view_opd_follow_up_ICSIAdvised" class="view_opd_follow_up_ICSIAdvised">
<span<?php echo $view_opd_follow_up->ICSIAdvised->viewAttributes() ?>>
<?php echo $view_opd_follow_up->ICSIAdvised->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_opd_follow_up->DeliveryRegistered->Visible) { // DeliveryRegistered ?>
		<td data-name="DeliveryRegistered"<?php echo $view_opd_follow_up->DeliveryRegistered->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_list->RowCnt ?>_view_opd_follow_up_DeliveryRegistered" class="view_opd_follow_up_DeliveryRegistered">
<span<?php echo $view_opd_follow_up->DeliveryRegistered->viewAttributes() ?>>
<?php echo $view_opd_follow_up->DeliveryRegistered->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_opd_follow_up->EDD->Visible) { // EDD ?>
		<td data-name="EDD"<?php echo $view_opd_follow_up->EDD->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_list->RowCnt ?>_view_opd_follow_up_EDD" class="view_opd_follow_up_EDD">
<span<?php echo $view_opd_follow_up->EDD->viewAttributes() ?>>
<?php echo $view_opd_follow_up->EDD->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_opd_follow_up->SerologyPositive->Visible) { // SerologyPositive ?>
		<td data-name="SerologyPositive"<?php echo $view_opd_follow_up->SerologyPositive->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_list->RowCnt ?>_view_opd_follow_up_SerologyPositive" class="view_opd_follow_up_SerologyPositive">
<span<?php echo $view_opd_follow_up->SerologyPositive->viewAttributes() ?>>
<?php echo $view_opd_follow_up->SerologyPositive->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_opd_follow_up->Allergy->Visible) { // Allergy ?>
		<td data-name="Allergy"<?php echo $view_opd_follow_up->Allergy->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_list->RowCnt ?>_view_opd_follow_up_Allergy" class="view_opd_follow_up_Allergy">
<span<?php echo $view_opd_follow_up->Allergy->viewAttributes() ?>>
<?php echo $view_opd_follow_up->Allergy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_opd_follow_up->status->Visible) { // status ?>
		<td data-name="status"<?php echo $view_opd_follow_up->status->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_list->RowCnt ?>_view_opd_follow_up_status" class="view_opd_follow_up_status">
<span<?php echo $view_opd_follow_up->status->viewAttributes() ?>>
<?php echo $view_opd_follow_up->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_opd_follow_up->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $view_opd_follow_up->createdby->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_list->RowCnt ?>_view_opd_follow_up_createdby" class="view_opd_follow_up_createdby">
<span<?php echo $view_opd_follow_up->createdby->viewAttributes() ?>>
<?php echo $view_opd_follow_up->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_opd_follow_up->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $view_opd_follow_up->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_list->RowCnt ?>_view_opd_follow_up_createddatetime" class="view_opd_follow_up_createddatetime">
<span<?php echo $view_opd_follow_up->createddatetime->viewAttributes() ?>>
<?php echo $view_opd_follow_up->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_opd_follow_up->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $view_opd_follow_up->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_list->RowCnt ?>_view_opd_follow_up_modifiedby" class="view_opd_follow_up_modifiedby">
<span<?php echo $view_opd_follow_up->modifiedby->viewAttributes() ?>>
<?php echo $view_opd_follow_up->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_opd_follow_up->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $view_opd_follow_up->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_list->RowCnt ?>_view_opd_follow_up_modifieddatetime" class="view_opd_follow_up_modifieddatetime">
<span<?php echo $view_opd_follow_up->modifieddatetime->viewAttributes() ?>>
<?php echo $view_opd_follow_up->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_opd_follow_up->LMP->Visible) { // LMP ?>
		<td data-name="LMP"<?php echo $view_opd_follow_up->LMP->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_list->RowCnt ?>_view_opd_follow_up_LMP" class="view_opd_follow_up_LMP">
<span<?php echo $view_opd_follow_up->LMP->viewAttributes() ?>>
<?php echo $view_opd_follow_up->LMP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_opd_follow_up->ProcedureDateTime->Visible) { // ProcedureDateTime ?>
		<td data-name="ProcedureDateTime"<?php echo $view_opd_follow_up->ProcedureDateTime->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_list->RowCnt ?>_view_opd_follow_up_ProcedureDateTime" class="view_opd_follow_up_ProcedureDateTime">
<span<?php echo $view_opd_follow_up->ProcedureDateTime->viewAttributes() ?>>
<?php echo $view_opd_follow_up->ProcedureDateTime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_opd_follow_up->ICSIDate->Visible) { // ICSIDate ?>
		<td data-name="ICSIDate"<?php echo $view_opd_follow_up->ICSIDate->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_list->RowCnt ?>_view_opd_follow_up_ICSIDate" class="view_opd_follow_up_ICSIDate">
<span<?php echo $view_opd_follow_up->ICSIDate->viewAttributes() ?>>
<?php echo $view_opd_follow_up->ICSIDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_opd_follow_up_list->ListOptions->render("body", "right", $view_opd_follow_up_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_opd_follow_up->isGridAdd())
		$view_opd_follow_up_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_opd_follow_up->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_opd_follow_up_list->Recordset)
	$view_opd_follow_up_list->Recordset->Close();
?>
<?php if (!$view_opd_follow_up->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_opd_follow_up->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_opd_follow_up_list->Pager)) $view_opd_follow_up_list->Pager = new NumericPager($view_opd_follow_up_list->StartRec, $view_opd_follow_up_list->DisplayRecs, $view_opd_follow_up_list->TotalRecs, $view_opd_follow_up_list->RecRange, $view_opd_follow_up_list->AutoHidePager) ?>
<?php if ($view_opd_follow_up_list->Pager->RecordCount > 0 && $view_opd_follow_up_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_opd_follow_up_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_opd_follow_up_list->pageUrl() ?>start=<?php echo $view_opd_follow_up_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_opd_follow_up_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_opd_follow_up_list->pageUrl() ?>start=<?php echo $view_opd_follow_up_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_opd_follow_up_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_opd_follow_up_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_opd_follow_up_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_opd_follow_up_list->pageUrl() ?>start=<?php echo $view_opd_follow_up_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_opd_follow_up_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_opd_follow_up_list->pageUrl() ?>start=<?php echo $view_opd_follow_up_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_opd_follow_up_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_opd_follow_up_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_opd_follow_up_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_opd_follow_up_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_opd_follow_up_list->TotalRecs > 0 && (!$view_opd_follow_up_list->AutoHidePageSizeSelector || $view_opd_follow_up_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_opd_follow_up">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_opd_follow_up_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_opd_follow_up_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_opd_follow_up_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_opd_follow_up_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_opd_follow_up_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_opd_follow_up_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_opd_follow_up->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_opd_follow_up_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_opd_follow_up_list->TotalRecs == 0 && !$view_opd_follow_up->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_opd_follow_up_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_opd_follow_up_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_opd_follow_up->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_opd_follow_up->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_opd_follow_up", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_opd_follow_up_list->terminate();
?>