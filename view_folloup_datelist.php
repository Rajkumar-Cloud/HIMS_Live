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
$view_folloup_date_list = new view_folloup_date_list();

// Run the page
$view_folloup_date_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_folloup_date_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_folloup_date->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_folloup_datelist = currentForm = new ew.Form("fview_folloup_datelist", "list");
fview_folloup_datelist.formKeyCountName = '<?php echo $view_folloup_date_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_folloup_datelist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_folloup_datelist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_folloup_datelist.lists["x_HospID"] = <?php echo $view_folloup_date_list->HospID->Lookup->toClientList() ?>;
fview_folloup_datelist.lists["x_HospID"].options = <?php echo JsonEncode($view_folloup_date_list->HospID->lookupOptions()) ?>;
fview_folloup_datelist.lists["x_physician_id"] = <?php echo $view_folloup_date_list->physician_id->Lookup->toClientList() ?>;
fview_folloup_datelist.lists["x_physician_id"].options = <?php echo JsonEncode($view_folloup_date_list->physician_id->lookupOptions()) ?>;

// Form object for search
var fview_folloup_datelistsrch = currentSearchForm = new ew.Form("fview_folloup_datelistsrch");

// Validate function for search
fview_folloup_datelistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
fview_folloup_datelistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_folloup_datelistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_folloup_datelistsrch.lists["x_physician_id"] = <?php echo $view_folloup_date_list->physician_id->Lookup->toClientList() ?>;
fview_folloup_datelistsrch.lists["x_physician_id"].options = <?php echo JsonEncode($view_folloup_date_list->physician_id->lookupOptions()) ?>;

// Filters
fview_folloup_datelistsrch.filterList = <?php echo $view_folloup_date_list->getFilterList() ?>;
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
<?php if (!$view_folloup_date->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_folloup_date_list->TotalRecs > 0 && $view_folloup_date_list->ExportOptions->visible()) { ?>
<?php $view_folloup_date_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_folloup_date_list->ImportOptions->visible()) { ?>
<?php $view_folloup_date_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_folloup_date_list->SearchOptions->visible()) { ?>
<?php $view_folloup_date_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_folloup_date_list->FilterOptions->visible()) { ?>
<?php $view_folloup_date_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_folloup_date_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_folloup_date->isExport() && !$view_folloup_date->CurrentAction) { ?>
<form name="fview_folloup_datelistsrch" id="fview_folloup_datelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_folloup_date_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_folloup_datelistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_folloup_date">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$view_folloup_date_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$view_folloup_date->RowType = ROWTYPE_SEARCH;

// Render row
$view_folloup_date->resetAttributes();
$view_folloup_date_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($view_folloup_date->physician_id->Visible) { // physician_id ?>
	<div id="xsc_physician_id" class="ew-cell form-group">
		<label for="x_physician_id" class="ew-search-caption ew-label"><?php echo $view_folloup_date->physician_id->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_physician_id" id="z_physician_id" value="="></span>
		<span class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_folloup_date" data-field="x_physician_id" data-value-separator="<?php echo $view_folloup_date->physician_id->displayValueSeparatorAttribute() ?>" id="x_physician_id" name="x_physician_id"<?php echo $view_folloup_date->physician_id->editAttributes() ?>>
		<?php echo $view_folloup_date->physician_id->selectOptionListHtml("x_physician_id") ?>
	</select>
</div>
<?php echo $view_folloup_date->physician_id->Lookup->getParamTag("p_x_physician_id") ?>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($view_folloup_date->mobile_no->Visible) { // mobile_no ?>
	<div id="xsc_mobile_no" class="ew-cell form-group">
		<label for="x_mobile_no" class="ew-search-caption ew-label"><?php echo $view_folloup_date->mobile_no->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_mobile_no" id="z_mobile_no" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_folloup_date" data-field="x_mobile_no" name="x_mobile_no" id="x_mobile_no" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_folloup_date->mobile_no->getPlaceHolder()) ?>" value="<?php echo $view_folloup_date->mobile_no->EditValue ?>"<?php echo $view_folloup_date->mobile_no->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_folloup_date_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_folloup_date_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_folloup_date_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_folloup_date_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_folloup_date_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_folloup_date_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_folloup_date_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_folloup_date_list->showPageHeader(); ?>
<?php
$view_folloup_date_list->showMessage();
?>
<?php if ($view_folloup_date_list->TotalRecs > 0 || $view_folloup_date->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_folloup_date_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_folloup_date">
<?php if (!$view_folloup_date->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_folloup_date->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_folloup_date_list->Pager)) $view_folloup_date_list->Pager = new NumericPager($view_folloup_date_list->StartRec, $view_folloup_date_list->DisplayRecs, $view_folloup_date_list->TotalRecs, $view_folloup_date_list->RecRange, $view_folloup_date_list->AutoHidePager) ?>
<?php if ($view_folloup_date_list->Pager->RecordCount > 0 && $view_folloup_date_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_folloup_date_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_folloup_date_list->pageUrl() ?>start=<?php echo $view_folloup_date_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_folloup_date_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_folloup_date_list->pageUrl() ?>start=<?php echo $view_folloup_date_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_folloup_date_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_folloup_date_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_folloup_date_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_folloup_date_list->pageUrl() ?>start=<?php echo $view_folloup_date_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_folloup_date_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_folloup_date_list->pageUrl() ?>start=<?php echo $view_folloup_date_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_folloup_date_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_folloup_date_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_folloup_date_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_folloup_date_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_folloup_date_list->TotalRecs > 0 && (!$view_folloup_date_list->AutoHidePageSizeSelector || $view_folloup_date_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_folloup_date">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_folloup_date_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_folloup_date_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_folloup_date_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_folloup_date_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_folloup_date_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_folloup_date_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_folloup_date->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_folloup_date_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_folloup_datelist" id="fview_folloup_datelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_folloup_date_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_folloup_date_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_folloup_date">
<div id="gmp_view_folloup_date" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_folloup_date_list->TotalRecs > 0 || $view_folloup_date->isGridEdit()) { ?>
<table id="tbl_view_folloup_datelist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_folloup_date_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_folloup_date_list->renderListOptions();

// Render list options (header, left)
$view_folloup_date_list->ListOptions->render("header", "left");
?>
<?php if ($view_folloup_date->NextReviewDate->Visible) { // NextReviewDate ?>
	<?php if ($view_folloup_date->sortUrl($view_folloup_date->NextReviewDate) == "") { ?>
		<th data-name="NextReviewDate" class="<?php echo $view_folloup_date->NextReviewDate->headerCellClass() ?>"><div id="elh_view_folloup_date_NextReviewDate" class="view_folloup_date_NextReviewDate"><div class="ew-table-header-caption"><?php echo $view_folloup_date->NextReviewDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NextReviewDate" class="<?php echo $view_folloup_date->NextReviewDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_folloup_date->SortUrl($view_folloup_date->NextReviewDate) ?>',1);"><div id="elh_view_folloup_date_NextReviewDate" class="view_folloup_date_NextReviewDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_folloup_date->NextReviewDate->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_folloup_date->NextReviewDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_folloup_date->NextReviewDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_folloup_date->id->Visible) { // id ?>
	<?php if ($view_folloup_date->sortUrl($view_folloup_date->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_folloup_date->id->headerCellClass() ?>"><div id="elh_view_folloup_date_id" class="view_folloup_date_id"><div class="ew-table-header-caption"><?php echo $view_folloup_date->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_folloup_date->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_folloup_date->SortUrl($view_folloup_date->id) ?>',1);"><div id="elh_view_folloup_date_id" class="view_folloup_date_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_folloup_date->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_folloup_date->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_folloup_date->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_folloup_date->Reception->Visible) { // Reception ?>
	<?php if ($view_folloup_date->sortUrl($view_folloup_date->Reception) == "") { ?>
		<th data-name="Reception" class="<?php echo $view_folloup_date->Reception->headerCellClass() ?>"><div id="elh_view_folloup_date_Reception" class="view_folloup_date_Reception"><div class="ew-table-header-caption"><?php echo $view_folloup_date->Reception->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Reception" class="<?php echo $view_folloup_date->Reception->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_folloup_date->SortUrl($view_folloup_date->Reception) ?>',1);"><div id="elh_view_folloup_date_Reception" class="view_folloup_date_Reception">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_folloup_date->Reception->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_folloup_date->Reception->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_folloup_date->Reception->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_folloup_date->PatientId->Visible) { // PatientId ?>
	<?php if ($view_folloup_date->sortUrl($view_folloup_date->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $view_folloup_date->PatientId->headerCellClass() ?>"><div id="elh_view_folloup_date_PatientId" class="view_folloup_date_PatientId"><div class="ew-table-header-caption"><?php echo $view_folloup_date->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $view_folloup_date->PatientId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_folloup_date->SortUrl($view_folloup_date->PatientId) ?>',1);"><div id="elh_view_folloup_date_PatientId" class="view_folloup_date_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_folloup_date->PatientId->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_folloup_date->PatientId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_folloup_date->PatientId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_folloup_date->PatientName->Visible) { // PatientName ?>
	<?php if ($view_folloup_date->sortUrl($view_folloup_date->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $view_folloup_date->PatientName->headerCellClass() ?>"><div id="elh_view_folloup_date_PatientName" class="view_folloup_date_PatientName"><div class="ew-table-header-caption"><?php echo $view_folloup_date->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $view_folloup_date->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_folloup_date->SortUrl($view_folloup_date->PatientName) ?>',1);"><div id="elh_view_folloup_date_PatientName" class="view_folloup_date_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_folloup_date->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_folloup_date->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_folloup_date->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_folloup_date->mrnno->Visible) { // mrnno ?>
	<?php if ($view_folloup_date->sortUrl($view_folloup_date->mrnno) == "") { ?>
		<th data-name="mrnno" class="<?php echo $view_folloup_date->mrnno->headerCellClass() ?>"><div id="elh_view_folloup_date_mrnno" class="view_folloup_date_mrnno"><div class="ew-table-header-caption"><?php echo $view_folloup_date->mrnno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnno" class="<?php echo $view_folloup_date->mrnno->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_folloup_date->SortUrl($view_folloup_date->mrnno) ?>',1);"><div id="elh_view_folloup_date_mrnno" class="view_folloup_date_mrnno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_folloup_date->mrnno->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_folloup_date->mrnno->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_folloup_date->mrnno->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_folloup_date->Age->Visible) { // Age ?>
	<?php if ($view_folloup_date->sortUrl($view_folloup_date->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $view_folloup_date->Age->headerCellClass() ?>"><div id="elh_view_folloup_date_Age" class="view_folloup_date_Age"><div class="ew-table-header-caption"><?php echo $view_folloup_date->Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $view_folloup_date->Age->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_folloup_date->SortUrl($view_folloup_date->Age) ?>',1);"><div id="elh_view_folloup_date_Age" class="view_folloup_date_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_folloup_date->Age->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_folloup_date->Age->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_folloup_date->Age->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_folloup_date->Gender->Visible) { // Gender ?>
	<?php if ($view_folloup_date->sortUrl($view_folloup_date->Gender) == "") { ?>
		<th data-name="Gender" class="<?php echo $view_folloup_date->Gender->headerCellClass() ?>"><div id="elh_view_folloup_date_Gender" class="view_folloup_date_Gender"><div class="ew-table-header-caption"><?php echo $view_folloup_date->Gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gender" class="<?php echo $view_folloup_date->Gender->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_folloup_date->SortUrl($view_folloup_date->Gender) ?>',1);"><div id="elh_view_folloup_date_Gender" class="view_folloup_date_Gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_folloup_date->Gender->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_folloup_date->Gender->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_folloup_date->Gender->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_folloup_date->HospID->Visible) { // HospID ?>
	<?php if ($view_folloup_date->sortUrl($view_folloup_date->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_folloup_date->HospID->headerCellClass() ?>"><div id="elh_view_folloup_date_HospID" class="view_folloup_date_HospID"><div class="ew-table-header-caption"><?php echo $view_folloup_date->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_folloup_date->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_folloup_date->SortUrl($view_folloup_date->HospID) ?>',1);"><div id="elh_view_folloup_date_HospID" class="view_folloup_date_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_folloup_date->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_folloup_date->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_folloup_date->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_folloup_date->PatientID1->Visible) { // PatientID1 ?>
	<?php if ($view_folloup_date->sortUrl($view_folloup_date->PatientID1) == "") { ?>
		<th data-name="PatientID1" class="<?php echo $view_folloup_date->PatientID1->headerCellClass() ?>"><div id="elh_view_folloup_date_PatientID1" class="view_folloup_date_PatientID1"><div class="ew-table-header-caption"><?php echo $view_folloup_date->PatientID1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientID1" class="<?php echo $view_folloup_date->PatientID1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_folloup_date->SortUrl($view_folloup_date->PatientID1) ?>',1);"><div id="elh_view_folloup_date_PatientID1" class="view_folloup_date_PatientID1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_folloup_date->PatientID1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_folloup_date->PatientID1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_folloup_date->PatientID1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_folloup_date->physician_id->Visible) { // physician_id ?>
	<?php if ($view_folloup_date->sortUrl($view_folloup_date->physician_id) == "") { ?>
		<th data-name="physician_id" class="<?php echo $view_folloup_date->physician_id->headerCellClass() ?>"><div id="elh_view_folloup_date_physician_id" class="view_folloup_date_physician_id"><div class="ew-table-header-caption"><?php echo $view_folloup_date->physician_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="physician_id" class="<?php echo $view_folloup_date->physician_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_folloup_date->SortUrl($view_folloup_date->physician_id) ?>',1);"><div id="elh_view_folloup_date_physician_id" class="view_folloup_date_physician_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_folloup_date->physician_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_folloup_date->physician_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_folloup_date->physician_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_folloup_date->mobile_no->Visible) { // mobile_no ?>
	<?php if ($view_folloup_date->sortUrl($view_folloup_date->mobile_no) == "") { ?>
		<th data-name="mobile_no" class="<?php echo $view_folloup_date->mobile_no->headerCellClass() ?>"><div id="elh_view_folloup_date_mobile_no" class="view_folloup_date_mobile_no"><div class="ew-table-header-caption"><?php echo $view_folloup_date->mobile_no->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mobile_no" class="<?php echo $view_folloup_date->mobile_no->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_folloup_date->SortUrl($view_folloup_date->mobile_no) ?>',1);"><div id="elh_view_folloup_date_mobile_no" class="view_folloup_date_mobile_no">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_folloup_date->mobile_no->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_folloup_date->mobile_no->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_folloup_date->mobile_no->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_folloup_date->spouse_mobile_no->Visible) { // spouse_mobile_no ?>
	<?php if ($view_folloup_date->sortUrl($view_folloup_date->spouse_mobile_no) == "") { ?>
		<th data-name="spouse_mobile_no" class="<?php echo $view_folloup_date->spouse_mobile_no->headerCellClass() ?>"><div id="elh_view_folloup_date_spouse_mobile_no" class="view_folloup_date_spouse_mobile_no"><div class="ew-table-header-caption"><?php echo $view_folloup_date->spouse_mobile_no->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="spouse_mobile_no" class="<?php echo $view_folloup_date->spouse_mobile_no->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_folloup_date->SortUrl($view_folloup_date->spouse_mobile_no) ?>',1);"><div id="elh_view_folloup_date_spouse_mobile_no" class="view_folloup_date_spouse_mobile_no">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_folloup_date->spouse_mobile_no->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_folloup_date->spouse_mobile_no->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_folloup_date->spouse_mobile_no->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_folloup_date->PEmail->Visible) { // PEmail ?>
	<?php if ($view_folloup_date->sortUrl($view_folloup_date->PEmail) == "") { ?>
		<th data-name="PEmail" class="<?php echo $view_folloup_date->PEmail->headerCellClass() ?>"><div id="elh_view_folloup_date_PEmail" class="view_folloup_date_PEmail"><div class="ew-table-header-caption"><?php echo $view_folloup_date->PEmail->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PEmail" class="<?php echo $view_folloup_date->PEmail->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_folloup_date->SortUrl($view_folloup_date->PEmail) ?>',1);"><div id="elh_view_folloup_date_PEmail" class="view_folloup_date_PEmail">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_folloup_date->PEmail->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_folloup_date->PEmail->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_folloup_date->PEmail->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_folloup_date->PEmergencyContact->Visible) { // PEmergencyContact ?>
	<?php if ($view_folloup_date->sortUrl($view_folloup_date->PEmergencyContact) == "") { ?>
		<th data-name="PEmergencyContact" class="<?php echo $view_folloup_date->PEmergencyContact->headerCellClass() ?>"><div id="elh_view_folloup_date_PEmergencyContact" class="view_folloup_date_PEmergencyContact"><div class="ew-table-header-caption"><?php echo $view_folloup_date->PEmergencyContact->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PEmergencyContact" class="<?php echo $view_folloup_date->PEmergencyContact->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_folloup_date->SortUrl($view_folloup_date->PEmergencyContact) ?>',1);"><div id="elh_view_folloup_date_PEmergencyContact" class="view_folloup_date_PEmergencyContact">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_folloup_date->PEmergencyContact->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_folloup_date->PEmergencyContact->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_folloup_date->PEmergencyContact->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_folloup_date->CODE->Visible) { // CODE ?>
	<?php if ($view_folloup_date->sortUrl($view_folloup_date->CODE) == "") { ?>
		<th data-name="CODE" class="<?php echo $view_folloup_date->CODE->headerCellClass() ?>"><div id="elh_view_folloup_date_CODE" class="view_folloup_date_CODE"><div class="ew-table-header-caption"><?php echo $view_folloup_date->CODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CODE" class="<?php echo $view_folloup_date->CODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_folloup_date->SortUrl($view_folloup_date->CODE) ?>',1);"><div id="elh_view_folloup_date_CODE" class="view_folloup_date_CODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_folloup_date->CODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_folloup_date->CODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_folloup_date->CODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_folloup_date->NAME->Visible) { // NAME ?>
	<?php if ($view_folloup_date->sortUrl($view_folloup_date->NAME) == "") { ?>
		<th data-name="NAME" class="<?php echo $view_folloup_date->NAME->headerCellClass() ?>"><div id="elh_view_folloup_date_NAME" class="view_folloup_date_NAME"><div class="ew-table-header-caption"><?php echo $view_folloup_date->NAME->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NAME" class="<?php echo $view_folloup_date->NAME->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_folloup_date->SortUrl($view_folloup_date->NAME) ?>',1);"><div id="elh_view_folloup_date_NAME" class="view_folloup_date_NAME">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_folloup_date->NAME->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_folloup_date->NAME->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_folloup_date->NAME->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_folloup_date->DEPARTMENT->Visible) { // DEPARTMENT ?>
	<?php if ($view_folloup_date->sortUrl($view_folloup_date->DEPARTMENT) == "") { ?>
		<th data-name="DEPARTMENT" class="<?php echo $view_folloup_date->DEPARTMENT->headerCellClass() ?>"><div id="elh_view_folloup_date_DEPARTMENT" class="view_folloup_date_DEPARTMENT"><div class="ew-table-header-caption"><?php echo $view_folloup_date->DEPARTMENT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DEPARTMENT" class="<?php echo $view_folloup_date->DEPARTMENT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_folloup_date->SortUrl($view_folloup_date->DEPARTMENT) ?>',1);"><div id="elh_view_folloup_date_DEPARTMENT" class="view_folloup_date_DEPARTMENT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_folloup_date->DEPARTMENT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_folloup_date->DEPARTMENT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_folloup_date->DEPARTMENT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_folloup_date->start_time->Visible) { // start_time ?>
	<?php if ($view_folloup_date->sortUrl($view_folloup_date->start_time) == "") { ?>
		<th data-name="start_time" class="<?php echo $view_folloup_date->start_time->headerCellClass() ?>"><div id="elh_view_folloup_date_start_time" class="view_folloup_date_start_time"><div class="ew-table-header-caption"><?php echo $view_folloup_date->start_time->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="start_time" class="<?php echo $view_folloup_date->start_time->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_folloup_date->SortUrl($view_folloup_date->start_time) ?>',1);"><div id="elh_view_folloup_date_start_time" class="view_folloup_date_start_time">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_folloup_date->start_time->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_folloup_date->start_time->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_folloup_date->start_time->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_folloup_date->end_time->Visible) { // end_time ?>
	<?php if ($view_folloup_date->sortUrl($view_folloup_date->end_time) == "") { ?>
		<th data-name="end_time" class="<?php echo $view_folloup_date->end_time->headerCellClass() ?>"><div id="elh_view_folloup_date_end_time" class="view_folloup_date_end_time"><div class="ew-table-header-caption"><?php echo $view_folloup_date->end_time->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="end_time" class="<?php echo $view_folloup_date->end_time->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_folloup_date->SortUrl($view_folloup_date->end_time) ?>',1);"><div id="elh_view_folloup_date_end_time" class="view_folloup_date_end_time">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_folloup_date->end_time->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_folloup_date->end_time->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_folloup_date->end_time->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_folloup_date->slot_time->Visible) { // slot_time ?>
	<?php if ($view_folloup_date->sortUrl($view_folloup_date->slot_time) == "") { ?>
		<th data-name="slot_time" class="<?php echo $view_folloup_date->slot_time->headerCellClass() ?>"><div id="elh_view_folloup_date_slot_time" class="view_folloup_date_slot_time"><div class="ew-table-header-caption"><?php echo $view_folloup_date->slot_time->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="slot_time" class="<?php echo $view_folloup_date->slot_time->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_folloup_date->SortUrl($view_folloup_date->slot_time) ?>',1);"><div id="elh_view_folloup_date_slot_time" class="view_folloup_date_slot_time">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_folloup_date->slot_time->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_folloup_date->slot_time->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_folloup_date->slot_time->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_folloup_date->scheduler_id->Visible) { // scheduler_id ?>
	<?php if ($view_folloup_date->sortUrl($view_folloup_date->scheduler_id) == "") { ?>
		<th data-name="scheduler_id" class="<?php echo $view_folloup_date->scheduler_id->headerCellClass() ?>"><div id="elh_view_folloup_date_scheduler_id" class="view_folloup_date_scheduler_id"><div class="ew-table-header-caption"><?php echo $view_folloup_date->scheduler_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="scheduler_id" class="<?php echo $view_folloup_date->scheduler_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_folloup_date->SortUrl($view_folloup_date->scheduler_id) ?>',1);"><div id="elh_view_folloup_date_scheduler_id" class="view_folloup_date_scheduler_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_folloup_date->scheduler_id->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_folloup_date->scheduler_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_folloup_date->scheduler_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_folloup_date_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_folloup_date->ExportAll && $view_folloup_date->isExport()) {
	$view_folloup_date_list->StopRec = $view_folloup_date_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_folloup_date_list->TotalRecs > $view_folloup_date_list->StartRec + $view_folloup_date_list->DisplayRecs - 1)
		$view_folloup_date_list->StopRec = $view_folloup_date_list->StartRec + $view_folloup_date_list->DisplayRecs - 1;
	else
		$view_folloup_date_list->StopRec = $view_folloup_date_list->TotalRecs;
}
$view_folloup_date_list->RecCnt = $view_folloup_date_list->StartRec - 1;
if ($view_folloup_date_list->Recordset && !$view_folloup_date_list->Recordset->EOF) {
	$view_folloup_date_list->Recordset->moveFirst();
	$selectLimit = $view_folloup_date_list->UseSelectLimit;
	if (!$selectLimit && $view_folloup_date_list->StartRec > 1)
		$view_folloup_date_list->Recordset->move($view_folloup_date_list->StartRec - 1);
} elseif (!$view_folloup_date->AllowAddDeleteRow && $view_folloup_date_list->StopRec == 0) {
	$view_folloup_date_list->StopRec = $view_folloup_date->GridAddRowCount;
}

// Initialize aggregate
$view_folloup_date->RowType = ROWTYPE_AGGREGATEINIT;
$view_folloup_date->resetAttributes();
$view_folloup_date_list->renderRow();
while ($view_folloup_date_list->RecCnt < $view_folloup_date_list->StopRec) {
	$view_folloup_date_list->RecCnt++;
	if ($view_folloup_date_list->RecCnt >= $view_folloup_date_list->StartRec) {
		$view_folloup_date_list->RowCnt++;

		// Set up key count
		$view_folloup_date_list->KeyCount = $view_folloup_date_list->RowIndex;

		// Init row class and style
		$view_folloup_date->resetAttributes();
		$view_folloup_date->CssClass = "";
		if ($view_folloup_date->isGridAdd()) {
		} else {
			$view_folloup_date_list->loadRowValues($view_folloup_date_list->Recordset); // Load row values
		}
		$view_folloup_date->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_folloup_date->RowAttrs = array_merge($view_folloup_date->RowAttrs, array('data-rowindex'=>$view_folloup_date_list->RowCnt, 'id'=>'r' . $view_folloup_date_list->RowCnt . '_view_folloup_date', 'data-rowtype'=>$view_folloup_date->RowType));

		// Render row
		$view_folloup_date_list->renderRow();

		// Render list options
		$view_folloup_date_list->renderListOptions();
?>
	<tr<?php echo $view_folloup_date->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_folloup_date_list->ListOptions->render("body", "left", $view_folloup_date_list->RowCnt);
?>
	<?php if ($view_folloup_date->NextReviewDate->Visible) { // NextReviewDate ?>
		<td data-name="NextReviewDate"<?php echo $view_folloup_date->NextReviewDate->cellAttributes() ?>>
<span id="el<?php echo $view_folloup_date_list->RowCnt ?>_view_folloup_date_NextReviewDate" class="view_folloup_date_NextReviewDate">
<span<?php echo $view_folloup_date->NextReviewDate->viewAttributes() ?>>
<?php echo $view_folloup_date->NextReviewDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_folloup_date->id->Visible) { // id ?>
		<td data-name="id"<?php echo $view_folloup_date->id->cellAttributes() ?>>
<span id="el<?php echo $view_folloup_date_list->RowCnt ?>_view_folloup_date_id" class="view_folloup_date_id">
<span<?php echo $view_folloup_date->id->viewAttributes() ?>>
<?php echo $view_folloup_date->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_folloup_date->Reception->Visible) { // Reception ?>
		<td data-name="Reception"<?php echo $view_folloup_date->Reception->cellAttributes() ?>>
<span id="el<?php echo $view_folloup_date_list->RowCnt ?>_view_folloup_date_Reception" class="view_folloup_date_Reception">
<span<?php echo $view_folloup_date->Reception->viewAttributes() ?>>
<?php echo $view_folloup_date->Reception->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_folloup_date->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId"<?php echo $view_folloup_date->PatientId->cellAttributes() ?>>
<span id="el<?php echo $view_folloup_date_list->RowCnt ?>_view_folloup_date_PatientId" class="view_folloup_date_PatientId">
<span<?php echo $view_folloup_date->PatientId->viewAttributes() ?>>
<?php echo $view_folloup_date->PatientId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_folloup_date->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $view_folloup_date->PatientName->cellAttributes() ?>>
<span id="el<?php echo $view_folloup_date_list->RowCnt ?>_view_folloup_date_PatientName" class="view_folloup_date_PatientName">
<span<?php echo $view_folloup_date->PatientName->viewAttributes() ?>>
<?php echo $view_folloup_date->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_folloup_date->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno"<?php echo $view_folloup_date->mrnno->cellAttributes() ?>>
<span id="el<?php echo $view_folloup_date_list->RowCnt ?>_view_folloup_date_mrnno" class="view_folloup_date_mrnno">
<span<?php echo $view_folloup_date->mrnno->viewAttributes() ?>>
<?php echo $view_folloup_date->mrnno->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_folloup_date->Age->Visible) { // Age ?>
		<td data-name="Age"<?php echo $view_folloup_date->Age->cellAttributes() ?>>
<span id="el<?php echo $view_folloup_date_list->RowCnt ?>_view_folloup_date_Age" class="view_folloup_date_Age">
<span<?php echo $view_folloup_date->Age->viewAttributes() ?>>
<?php echo $view_folloup_date->Age->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_folloup_date->Gender->Visible) { // Gender ?>
		<td data-name="Gender"<?php echo $view_folloup_date->Gender->cellAttributes() ?>>
<span id="el<?php echo $view_folloup_date_list->RowCnt ?>_view_folloup_date_Gender" class="view_folloup_date_Gender">
<span<?php echo $view_folloup_date->Gender->viewAttributes() ?>>
<?php echo $view_folloup_date->Gender->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_folloup_date->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_folloup_date->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_folloup_date_list->RowCnt ?>_view_folloup_date_HospID" class="view_folloup_date_HospID">
<span<?php echo $view_folloup_date->HospID->viewAttributes() ?>>
<?php echo $view_folloup_date->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_folloup_date->PatientID1->Visible) { // PatientID1 ?>
		<td data-name="PatientID1"<?php echo $view_folloup_date->PatientID1->cellAttributes() ?>>
<span id="el<?php echo $view_folloup_date_list->RowCnt ?>_view_folloup_date_PatientID1" class="view_folloup_date_PatientID1">
<span<?php echo $view_folloup_date->PatientID1->viewAttributes() ?>>
<?php echo $view_folloup_date->PatientID1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_folloup_date->physician_id->Visible) { // physician_id ?>
		<td data-name="physician_id"<?php echo $view_folloup_date->physician_id->cellAttributes() ?>>
<span id="el<?php echo $view_folloup_date_list->RowCnt ?>_view_folloup_date_physician_id" class="view_folloup_date_physician_id">
<span<?php echo $view_folloup_date->physician_id->viewAttributes() ?>>
<?php echo $view_folloup_date->physician_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_folloup_date->mobile_no->Visible) { // mobile_no ?>
		<td data-name="mobile_no"<?php echo $view_folloup_date->mobile_no->cellAttributes() ?>>
<span id="el<?php echo $view_folloup_date_list->RowCnt ?>_view_folloup_date_mobile_no" class="view_folloup_date_mobile_no">
<span<?php echo $view_folloup_date->mobile_no->viewAttributes() ?>>
<?php echo $view_folloup_date->mobile_no->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_folloup_date->spouse_mobile_no->Visible) { // spouse_mobile_no ?>
		<td data-name="spouse_mobile_no"<?php echo $view_folloup_date->spouse_mobile_no->cellAttributes() ?>>
<span id="el<?php echo $view_folloup_date_list->RowCnt ?>_view_folloup_date_spouse_mobile_no" class="view_folloup_date_spouse_mobile_no">
<span<?php echo $view_folloup_date->spouse_mobile_no->viewAttributes() ?>>
<?php echo $view_folloup_date->spouse_mobile_no->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_folloup_date->PEmail->Visible) { // PEmail ?>
		<td data-name="PEmail"<?php echo $view_folloup_date->PEmail->cellAttributes() ?>>
<span id="el<?php echo $view_folloup_date_list->RowCnt ?>_view_folloup_date_PEmail" class="view_folloup_date_PEmail">
<span<?php echo $view_folloup_date->PEmail->viewAttributes() ?>>
<?php echo $view_folloup_date->PEmail->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_folloup_date->PEmergencyContact->Visible) { // PEmergencyContact ?>
		<td data-name="PEmergencyContact"<?php echo $view_folloup_date->PEmergencyContact->cellAttributes() ?>>
<span id="el<?php echo $view_folloup_date_list->RowCnt ?>_view_folloup_date_PEmergencyContact" class="view_folloup_date_PEmergencyContact">
<span<?php echo $view_folloup_date->PEmergencyContact->viewAttributes() ?>>
<?php echo $view_folloup_date->PEmergencyContact->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_folloup_date->CODE->Visible) { // CODE ?>
		<td data-name="CODE"<?php echo $view_folloup_date->CODE->cellAttributes() ?>>
<span id="el<?php echo $view_folloup_date_list->RowCnt ?>_view_folloup_date_CODE" class="view_folloup_date_CODE">
<span<?php echo $view_folloup_date->CODE->viewAttributes() ?>>
<?php echo $view_folloup_date->CODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_folloup_date->NAME->Visible) { // NAME ?>
		<td data-name="NAME"<?php echo $view_folloup_date->NAME->cellAttributes() ?>>
<span id="el<?php echo $view_folloup_date_list->RowCnt ?>_view_folloup_date_NAME" class="view_folloup_date_NAME">
<span<?php echo $view_folloup_date->NAME->viewAttributes() ?>>
<?php echo $view_folloup_date->NAME->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_folloup_date->DEPARTMENT->Visible) { // DEPARTMENT ?>
		<td data-name="DEPARTMENT"<?php echo $view_folloup_date->DEPARTMENT->cellAttributes() ?>>
<span id="el<?php echo $view_folloup_date_list->RowCnt ?>_view_folloup_date_DEPARTMENT" class="view_folloup_date_DEPARTMENT">
<span<?php echo $view_folloup_date->DEPARTMENT->viewAttributes() ?>>
<?php echo $view_folloup_date->DEPARTMENT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_folloup_date->start_time->Visible) { // start_time ?>
		<td data-name="start_time"<?php echo $view_folloup_date->start_time->cellAttributes() ?>>
<span id="el<?php echo $view_folloup_date_list->RowCnt ?>_view_folloup_date_start_time" class="view_folloup_date_start_time">
<span<?php echo $view_folloup_date->start_time->viewAttributes() ?>>
<?php echo $view_folloup_date->start_time->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_folloup_date->end_time->Visible) { // end_time ?>
		<td data-name="end_time"<?php echo $view_folloup_date->end_time->cellAttributes() ?>>
<span id="el<?php echo $view_folloup_date_list->RowCnt ?>_view_folloup_date_end_time" class="view_folloup_date_end_time">
<span<?php echo $view_folloup_date->end_time->viewAttributes() ?>>
<?php echo $view_folloup_date->end_time->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_folloup_date->slot_time->Visible) { // slot_time ?>
		<td data-name="slot_time"<?php echo $view_folloup_date->slot_time->cellAttributes() ?>>
<span id="el<?php echo $view_folloup_date_list->RowCnt ?>_view_folloup_date_slot_time" class="view_folloup_date_slot_time">
<span<?php echo $view_folloup_date->slot_time->viewAttributes() ?>>
<?php echo $view_folloup_date->slot_time->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_folloup_date->scheduler_id->Visible) { // scheduler_id ?>
		<td data-name="scheduler_id"<?php echo $view_folloup_date->scheduler_id->cellAttributes() ?>>
<span id="el<?php echo $view_folloup_date_list->RowCnt ?>_view_folloup_date_scheduler_id" class="view_folloup_date_scheduler_id">
<span<?php echo $view_folloup_date->scheduler_id->viewAttributes() ?>>
<?php echo $view_folloup_date->scheduler_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_folloup_date_list->ListOptions->render("body", "right", $view_folloup_date_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_folloup_date->isGridAdd())
		$view_folloup_date_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_folloup_date->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_folloup_date_list->Recordset)
	$view_folloup_date_list->Recordset->Close();
?>
<?php if (!$view_folloup_date->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_folloup_date->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_folloup_date_list->Pager)) $view_folloup_date_list->Pager = new NumericPager($view_folloup_date_list->StartRec, $view_folloup_date_list->DisplayRecs, $view_folloup_date_list->TotalRecs, $view_folloup_date_list->RecRange, $view_folloup_date_list->AutoHidePager) ?>
<?php if ($view_folloup_date_list->Pager->RecordCount > 0 && $view_folloup_date_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_folloup_date_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_folloup_date_list->pageUrl() ?>start=<?php echo $view_folloup_date_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_folloup_date_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_folloup_date_list->pageUrl() ?>start=<?php echo $view_folloup_date_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_folloup_date_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_folloup_date_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_folloup_date_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_folloup_date_list->pageUrl() ?>start=<?php echo $view_folloup_date_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_folloup_date_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_folloup_date_list->pageUrl() ?>start=<?php echo $view_folloup_date_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_folloup_date_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_folloup_date_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_folloup_date_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_folloup_date_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_folloup_date_list->TotalRecs > 0 && (!$view_folloup_date_list->AutoHidePageSizeSelector || $view_folloup_date_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_folloup_date">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_folloup_date_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_folloup_date_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_folloup_date_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_folloup_date_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_folloup_date_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_folloup_date_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_folloup_date->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_folloup_date_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_folloup_date_list->TotalRecs == 0 && !$view_folloup_date->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_folloup_date_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_folloup_date_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_folloup_date->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_folloup_date->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_folloup_date", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_folloup_date_list->terminate();
?>