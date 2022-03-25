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
$view_lab_services_list = new view_lab_services_list();

// Run the page
$view_lab_services_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_lab_services_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_lab_services->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_lab_serviceslist = currentForm = new ew.Form("fview_lab_serviceslist", "list");
fview_lab_serviceslist.formKeyCountName = '<?php echo $view_lab_services_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_lab_serviceslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_lab_serviceslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_lab_serviceslist.lists["x_HospID"] = <?php echo $view_lab_services_list->HospID->Lookup->toClientList() ?>;
fview_lab_serviceslist.lists["x_HospID"].options = <?php echo JsonEncode($view_lab_services_list->HospID->lookupOptions()) ?>;

// Form object for search
var fview_lab_serviceslistsrch = currentSearchForm = new ew.Form("fview_lab_serviceslistsrch");

// Validate function for search
fview_lab_serviceslistsrch.validate = function(fobj) {
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
fview_lab_serviceslistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_lab_serviceslistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_lab_serviceslistsrch.lists["x_HospID"] = <?php echo $view_lab_services_list->HospID->Lookup->toClientList() ?>;
fview_lab_serviceslistsrch.lists["x_HospID"].options = <?php echo JsonEncode($view_lab_services_list->HospID->lookupOptions()) ?>;

// Filters
fview_lab_serviceslistsrch.filterList = <?php echo $view_lab_services_list->getFilterList() ?>;
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
<?php if (!$view_lab_services->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_lab_services_list->TotalRecs > 0 && $view_lab_services_list->ExportOptions->visible()) { ?>
<?php $view_lab_services_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_lab_services_list->ImportOptions->visible()) { ?>
<?php $view_lab_services_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_lab_services_list->SearchOptions->visible()) { ?>
<?php $view_lab_services_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_lab_services_list->FilterOptions->visible()) { ?>
<?php $view_lab_services_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_lab_services_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_lab_services->isExport() && !$view_lab_services->CurrentAction) { ?>
<form name="fview_lab_serviceslistsrch" id="fview_lab_serviceslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_lab_services_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_lab_serviceslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_lab_services">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$view_lab_services_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$view_lab_services->RowType = ROWTYPE_SEARCH;

// Render row
$view_lab_services->resetAttributes();
$view_lab_services_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($view_lab_services->PatientId->Visible) { // PatientId ?>
	<div id="xsc_PatientId" class="ew-cell form-group">
		<label for="x_PatientId" class="ew-search-caption ew-label"><?php echo $view_lab_services->PatientId->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientId" id="z_PatientId" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_lab_services" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services->PatientId->getPlaceHolder()) ?>" value="<?php echo $view_lab_services->PatientId->EditValue ?>"<?php echo $view_lab_services->PatientId->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($view_lab_services->PatientName->Visible) { // PatientName ?>
	<div id="xsc_PatientName" class="ew-cell form-group">
		<label for="x_PatientName" class="ew-search-caption ew-label"><?php echo $view_lab_services->PatientName->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_lab_services" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_lab_services->PatientName->EditValue ?>"<?php echo $view_lab_services->PatientName->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($view_lab_services->HospID->Visible) { // HospID ?>
	<div id="xsc_HospID" class="ew-cell form-group">
		<label for="x_HospID" class="ew-search-caption ew-label"><?php echo $view_lab_services->HospID->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_HospID" id="z_HospID" value="="></span>
		<span class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_lab_services" data-field="x_HospID" data-value-separator="<?php echo $view_lab_services->HospID->displayValueSeparatorAttribute() ?>" id="x_HospID" name="x_HospID"<?php echo $view_lab_services->HospID->editAttributes() ?>>
		<?php echo $view_lab_services->HospID->selectOptionListHtml("x_HospID") ?>
	</select>
</div>
<?php echo $view_lab_services->HospID->Lookup->getParamTag("p_x_HospID") ?>
</span>
	</div>
<?php } ?>
<?php if ($view_lab_services->LabTestReleased->Visible) { // LabTestReleased ?>
	<div id="xsc_LabTestReleased" class="ew-cell form-group">
		<label for="x_LabTestReleased" class="ew-search-caption ew-label"><?php echo $view_lab_services->LabTestReleased->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_LabTestReleased" id="z_LabTestReleased" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_lab_services" data-field="x_LabTestReleased" name="x_LabTestReleased" id="x_LabTestReleased" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services->LabTestReleased->getPlaceHolder()) ?>" value="<?php echo $view_lab_services->LabTestReleased->EditValue ?>"<?php echo $view_lab_services->LabTestReleased->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_lab_services_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_lab_services_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_lab_services_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_lab_services_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_lab_services_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_lab_services_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_lab_services_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_lab_services_list->showPageHeader(); ?>
<?php
$view_lab_services_list->showMessage();
?>
<?php if ($view_lab_services_list->TotalRecs > 0 || $view_lab_services->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_lab_services_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_lab_services">
<?php if (!$view_lab_services->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_lab_services->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_lab_services_list->Pager)) $view_lab_services_list->Pager = new NumericPager($view_lab_services_list->StartRec, $view_lab_services_list->DisplayRecs, $view_lab_services_list->TotalRecs, $view_lab_services_list->RecRange, $view_lab_services_list->AutoHidePager) ?>
<?php if ($view_lab_services_list->Pager->RecordCount > 0 && $view_lab_services_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_lab_services_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_lab_services_list->pageUrl() ?>start=<?php echo $view_lab_services_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_lab_services_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_lab_services_list->pageUrl() ?>start=<?php echo $view_lab_services_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_lab_services_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_lab_services_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_lab_services_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_lab_services_list->pageUrl() ?>start=<?php echo $view_lab_services_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_lab_services_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_lab_services_list->pageUrl() ?>start=<?php echo $view_lab_services_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_lab_services_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_lab_services_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_lab_services_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_lab_services_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_lab_services_list->TotalRecs > 0 && (!$view_lab_services_list->AutoHidePageSizeSelector || $view_lab_services_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_lab_services">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_lab_services_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_lab_services_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_lab_services_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_lab_services_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_lab_services_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_lab_services_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_lab_services->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_lab_services_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_lab_serviceslist" id="fview_lab_serviceslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_lab_services_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_lab_services_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_lab_services">
<div id="gmp_view_lab_services" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_lab_services_list->TotalRecs > 0 || $view_lab_services->isGridEdit()) { ?>
<table id="tbl_view_lab_serviceslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_lab_services_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_lab_services_list->renderListOptions();

// Render list options (header, left)
$view_lab_services_list->ListOptions->render("header", "left");
?>
<?php if ($view_lab_services->id->Visible) { // id ?>
	<?php if ($view_lab_services->sortUrl($view_lab_services->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_lab_services->id->headerCellClass() ?>"><div id="elh_view_lab_services_id" class="view_lab_services_id"><div class="ew-table-header-caption"><?php echo $view_lab_services->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_lab_services->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_services->SortUrl($view_lab_services->id) ?>',1);"><div id="elh_view_lab_services_id" class="view_lab_services_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_services->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_services->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_services->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_services->SID->Visible) { // SID ?>
	<?php if ($view_lab_services->sortUrl($view_lab_services->SID) == "") { ?>
		<th data-name="SID" class="<?php echo $view_lab_services->SID->headerCellClass() ?>"><div id="elh_view_lab_services_SID" class="view_lab_services_SID"><div class="ew-table-header-caption"><?php echo $view_lab_services->SID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SID" class="<?php echo $view_lab_services->SID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_services->SortUrl($view_lab_services->SID) ?>',1);"><div id="elh_view_lab_services_SID" class="view_lab_services_SID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_services->SID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_services->SID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_services->SID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_services->PatientId->Visible) { // PatientId ?>
	<?php if ($view_lab_services->sortUrl($view_lab_services->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $view_lab_services->PatientId->headerCellClass() ?>"><div id="elh_view_lab_services_PatientId" class="view_lab_services_PatientId"><div class="ew-table-header-caption"><?php echo $view_lab_services->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $view_lab_services->PatientId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_services->SortUrl($view_lab_services->PatientId) ?>',1);"><div id="elh_view_lab_services_PatientId" class="view_lab_services_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_services->PatientId->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_services->PatientId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_services->PatientId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_services->PatientName->Visible) { // PatientName ?>
	<?php if ($view_lab_services->sortUrl($view_lab_services->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $view_lab_services->PatientName->headerCellClass() ?>"><div id="elh_view_lab_services_PatientName" class="view_lab_services_PatientName"><div class="ew-table-header-caption"><?php echo $view_lab_services->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $view_lab_services->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_services->SortUrl($view_lab_services->PatientName) ?>',1);"><div id="elh_view_lab_services_PatientName" class="view_lab_services_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_services->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_services->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_services->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_services->Gender->Visible) { // Gender ?>
	<?php if ($view_lab_services->sortUrl($view_lab_services->Gender) == "") { ?>
		<th data-name="Gender" class="<?php echo $view_lab_services->Gender->headerCellClass() ?>"><div id="elh_view_lab_services_Gender" class="view_lab_services_Gender"><div class="ew-table-header-caption"><?php echo $view_lab_services->Gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gender" class="<?php echo $view_lab_services->Gender->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_services->SortUrl($view_lab_services->Gender) ?>',1);"><div id="elh_view_lab_services_Gender" class="view_lab_services_Gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_services->Gender->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_services->Gender->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_services->Gender->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_services->Mobile->Visible) { // Mobile ?>
	<?php if ($view_lab_services->sortUrl($view_lab_services->Mobile) == "") { ?>
		<th data-name="Mobile" class="<?php echo $view_lab_services->Mobile->headerCellClass() ?>"><div id="elh_view_lab_services_Mobile" class="view_lab_services_Mobile"><div class="ew-table-header-caption"><?php echo $view_lab_services->Mobile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mobile" class="<?php echo $view_lab_services->Mobile->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_services->SortUrl($view_lab_services->Mobile) ?>',1);"><div id="elh_view_lab_services_Mobile" class="view_lab_services_Mobile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_services->Mobile->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_services->Mobile->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_services->Mobile->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_services->Doctor->Visible) { // Doctor ?>
	<?php if ($view_lab_services->sortUrl($view_lab_services->Doctor) == "") { ?>
		<th data-name="Doctor" class="<?php echo $view_lab_services->Doctor->headerCellClass() ?>"><div id="elh_view_lab_services_Doctor" class="view_lab_services_Doctor"><div class="ew-table-header-caption"><?php echo $view_lab_services->Doctor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Doctor" class="<?php echo $view_lab_services->Doctor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_services->SortUrl($view_lab_services->Doctor) ?>',1);"><div id="elh_view_lab_services_Doctor" class="view_lab_services_Doctor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_services->Doctor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_services->Doctor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_services->Doctor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_services->ModeofPayment->Visible) { // ModeofPayment ?>
	<?php if ($view_lab_services->sortUrl($view_lab_services->ModeofPayment) == "") { ?>
		<th data-name="ModeofPayment" class="<?php echo $view_lab_services->ModeofPayment->headerCellClass() ?>"><div id="elh_view_lab_services_ModeofPayment" class="view_lab_services_ModeofPayment"><div class="ew-table-header-caption"><?php echo $view_lab_services->ModeofPayment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModeofPayment" class="<?php echo $view_lab_services->ModeofPayment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_services->SortUrl($view_lab_services->ModeofPayment) ?>',1);"><div id="elh_view_lab_services_ModeofPayment" class="view_lab_services_ModeofPayment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_services->ModeofPayment->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_services->ModeofPayment->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_services->ModeofPayment->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_services->Amount->Visible) { // Amount ?>
	<?php if ($view_lab_services->sortUrl($view_lab_services->Amount) == "") { ?>
		<th data-name="Amount" class="<?php echo $view_lab_services->Amount->headerCellClass() ?>"><div id="elh_view_lab_services_Amount" class="view_lab_services_Amount"><div class="ew-table-header-caption"><?php echo $view_lab_services->Amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Amount" class="<?php echo $view_lab_services->Amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_services->SortUrl($view_lab_services->Amount) ?>',1);"><div id="elh_view_lab_services_Amount" class="view_lab_services_Amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_services->Amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_services->Amount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_services->Amount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_services->HospID->Visible) { // HospID ?>
	<?php if ($view_lab_services->sortUrl($view_lab_services->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_lab_services->HospID->headerCellClass() ?>"><div id="elh_view_lab_services_HospID" class="view_lab_services_HospID"><div class="ew-table-header-caption"><?php echo $view_lab_services->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_lab_services->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_services->SortUrl($view_lab_services->HospID) ?>',1);"><div id="elh_view_lab_services_HospID" class="view_lab_services_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_services->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_services->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_services->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_services->RIDNO->Visible) { // RIDNO ?>
	<?php if ($view_lab_services->sortUrl($view_lab_services->RIDNO) == "") { ?>
		<th data-name="RIDNO" class="<?php echo $view_lab_services->RIDNO->headerCellClass() ?>"><div id="elh_view_lab_services_RIDNO" class="view_lab_services_RIDNO"><div class="ew-table-header-caption"><?php echo $view_lab_services->RIDNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RIDNO" class="<?php echo $view_lab_services->RIDNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_services->SortUrl($view_lab_services->RIDNO) ?>',1);"><div id="elh_view_lab_services_RIDNO" class="view_lab_services_RIDNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_services->RIDNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_services->RIDNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_services->RIDNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_services->PartnerName->Visible) { // PartnerName ?>
	<?php if ($view_lab_services->sortUrl($view_lab_services->PartnerName) == "") { ?>
		<th data-name="PartnerName" class="<?php echo $view_lab_services->PartnerName->headerCellClass() ?>"><div id="elh_view_lab_services_PartnerName" class="view_lab_services_PartnerName"><div class="ew-table-header-caption"><?php echo $view_lab_services->PartnerName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerName" class="<?php echo $view_lab_services->PartnerName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_services->SortUrl($view_lab_services->PartnerName) ?>',1);"><div id="elh_view_lab_services_PartnerName" class="view_lab_services_PartnerName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_services->PartnerName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_services->PartnerName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_services->PartnerName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_services->PatId->Visible) { // PatId ?>
	<?php if ($view_lab_services->sortUrl($view_lab_services->PatId) == "") { ?>
		<th data-name="PatId" class="<?php echo $view_lab_services->PatId->headerCellClass() ?>"><div id="elh_view_lab_services_PatId" class="view_lab_services_PatId"><div class="ew-table-header-caption"><?php echo $view_lab_services->PatId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatId" class="<?php echo $view_lab_services->PatId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_services->SortUrl($view_lab_services->PatId) ?>',1);"><div id="elh_view_lab_services_PatId" class="view_lab_services_PatId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_services->PatId->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_services->PatId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_services->PatId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_services->DrDepartment->Visible) { // DrDepartment ?>
	<?php if ($view_lab_services->sortUrl($view_lab_services->DrDepartment) == "") { ?>
		<th data-name="DrDepartment" class="<?php echo $view_lab_services->DrDepartment->headerCellClass() ?>"><div id="elh_view_lab_services_DrDepartment" class="view_lab_services_DrDepartment"><div class="ew-table-header-caption"><?php echo $view_lab_services->DrDepartment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrDepartment" class="<?php echo $view_lab_services->DrDepartment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_services->SortUrl($view_lab_services->DrDepartment) ?>',1);"><div id="elh_view_lab_services_DrDepartment" class="view_lab_services_DrDepartment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_services->DrDepartment->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_services->DrDepartment->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_services->DrDepartment->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_services->RefferedBy->Visible) { // RefferedBy ?>
	<?php if ($view_lab_services->sortUrl($view_lab_services->RefferedBy) == "") { ?>
		<th data-name="RefferedBy" class="<?php echo $view_lab_services->RefferedBy->headerCellClass() ?>"><div id="elh_view_lab_services_RefferedBy" class="view_lab_services_RefferedBy"><div class="ew-table-header-caption"><?php echo $view_lab_services->RefferedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RefferedBy" class="<?php echo $view_lab_services->RefferedBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_services->SortUrl($view_lab_services->RefferedBy) ?>',1);"><div id="elh_view_lab_services_RefferedBy" class="view_lab_services_RefferedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_services->RefferedBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_services->RefferedBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_services->RefferedBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_services->BillNumber->Visible) { // BillNumber ?>
	<?php if ($view_lab_services->sortUrl($view_lab_services->BillNumber) == "") { ?>
		<th data-name="BillNumber" class="<?php echo $view_lab_services->BillNumber->headerCellClass() ?>"><div id="elh_view_lab_services_BillNumber" class="view_lab_services_BillNumber"><div class="ew-table-header-caption"><?php echo $view_lab_services->BillNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillNumber" class="<?php echo $view_lab_services->BillNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_services->SortUrl($view_lab_services->BillNumber) ?>',1);"><div id="elh_view_lab_services_BillNumber" class="view_lab_services_BillNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_services->BillNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_services->BillNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_services->BillNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_services->LabTestReleased->Visible) { // LabTestReleased ?>
	<?php if ($view_lab_services->sortUrl($view_lab_services->LabTestReleased) == "") { ?>
		<th data-name="LabTestReleased" class="<?php echo $view_lab_services->LabTestReleased->headerCellClass() ?>"><div id="elh_view_lab_services_LabTestReleased" class="view_lab_services_LabTestReleased"><div class="ew-table-header-caption"><?php echo $view_lab_services->LabTestReleased->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LabTestReleased" class="<?php echo $view_lab_services->LabTestReleased->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_services->SortUrl($view_lab_services->LabTestReleased) ?>',1);"><div id="elh_view_lab_services_LabTestReleased" class="view_lab_services_LabTestReleased">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_services->LabTestReleased->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_services->LabTestReleased->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_services->LabTestReleased->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_lab_services_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_lab_services->ExportAll && $view_lab_services->isExport()) {
	$view_lab_services_list->StopRec = $view_lab_services_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_lab_services_list->TotalRecs > $view_lab_services_list->StartRec + $view_lab_services_list->DisplayRecs - 1)
		$view_lab_services_list->StopRec = $view_lab_services_list->StartRec + $view_lab_services_list->DisplayRecs - 1;
	else
		$view_lab_services_list->StopRec = $view_lab_services_list->TotalRecs;
}
$view_lab_services_list->RecCnt = $view_lab_services_list->StartRec - 1;
if ($view_lab_services_list->Recordset && !$view_lab_services_list->Recordset->EOF) {
	$view_lab_services_list->Recordset->moveFirst();
	$selectLimit = $view_lab_services_list->UseSelectLimit;
	if (!$selectLimit && $view_lab_services_list->StartRec > 1)
		$view_lab_services_list->Recordset->move($view_lab_services_list->StartRec - 1);
} elseif (!$view_lab_services->AllowAddDeleteRow && $view_lab_services_list->StopRec == 0) {
	$view_lab_services_list->StopRec = $view_lab_services->GridAddRowCount;
}

// Initialize aggregate
$view_lab_services->RowType = ROWTYPE_AGGREGATEINIT;
$view_lab_services->resetAttributes();
$view_lab_services_list->renderRow();
while ($view_lab_services_list->RecCnt < $view_lab_services_list->StopRec) {
	$view_lab_services_list->RecCnt++;
	if ($view_lab_services_list->RecCnt >= $view_lab_services_list->StartRec) {
		$view_lab_services_list->RowCnt++;

		// Set up key count
		$view_lab_services_list->KeyCount = $view_lab_services_list->RowIndex;

		// Init row class and style
		$view_lab_services->resetAttributes();
		$view_lab_services->CssClass = "";
		if ($view_lab_services->isGridAdd()) {
		} else {
			$view_lab_services_list->loadRowValues($view_lab_services_list->Recordset); // Load row values
		}
		$view_lab_services->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_lab_services->RowAttrs = array_merge($view_lab_services->RowAttrs, array('data-rowindex'=>$view_lab_services_list->RowCnt, 'id'=>'r' . $view_lab_services_list->RowCnt . '_view_lab_services', 'data-rowtype'=>$view_lab_services->RowType));

		// Render row
		$view_lab_services_list->renderRow();

		// Render list options
		$view_lab_services_list->renderListOptions();
?>
	<tr<?php echo $view_lab_services->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_lab_services_list->ListOptions->render("body", "left", $view_lab_services_list->RowCnt);
?>
	<?php if ($view_lab_services->id->Visible) { // id ?>
		<td data-name="id"<?php echo $view_lab_services->id->cellAttributes() ?>>
<span id="el<?php echo $view_lab_services_list->RowCnt ?>_view_lab_services_id" class="view_lab_services_id">
<span<?php echo $view_lab_services->id->viewAttributes() ?>>
<?php echo $view_lab_services->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_services->SID->Visible) { // SID ?>
		<td data-name="SID"<?php echo $view_lab_services->SID->cellAttributes() ?>>
<span id="el<?php echo $view_lab_services_list->RowCnt ?>_view_lab_services_SID" class="view_lab_services_SID">
<span<?php echo $view_lab_services->SID->viewAttributes() ?>>
<?php echo $view_lab_services->SID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_services->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId"<?php echo $view_lab_services->PatientId->cellAttributes() ?>>
<span id="el<?php echo $view_lab_services_list->RowCnt ?>_view_lab_services_PatientId" class="view_lab_services_PatientId">
<span<?php echo $view_lab_services->PatientId->viewAttributes() ?>>
<?php echo $view_lab_services->PatientId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_services->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $view_lab_services->PatientName->cellAttributes() ?>>
<span id="el<?php echo $view_lab_services_list->RowCnt ?>_view_lab_services_PatientName" class="view_lab_services_PatientName">
<span<?php echo $view_lab_services->PatientName->viewAttributes() ?>>
<?php echo $view_lab_services->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_services->Gender->Visible) { // Gender ?>
		<td data-name="Gender"<?php echo $view_lab_services->Gender->cellAttributes() ?>>
<span id="el<?php echo $view_lab_services_list->RowCnt ?>_view_lab_services_Gender" class="view_lab_services_Gender">
<span<?php echo $view_lab_services->Gender->viewAttributes() ?>>
<?php echo $view_lab_services->Gender->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_services->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile"<?php echo $view_lab_services->Mobile->cellAttributes() ?>>
<span id="el<?php echo $view_lab_services_list->RowCnt ?>_view_lab_services_Mobile" class="view_lab_services_Mobile">
<span<?php echo $view_lab_services->Mobile->viewAttributes() ?>>
<?php echo $view_lab_services->Mobile->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_services->Doctor->Visible) { // Doctor ?>
		<td data-name="Doctor"<?php echo $view_lab_services->Doctor->cellAttributes() ?>>
<span id="el<?php echo $view_lab_services_list->RowCnt ?>_view_lab_services_Doctor" class="view_lab_services_Doctor">
<span<?php echo $view_lab_services->Doctor->viewAttributes() ?>>
<?php echo $view_lab_services->Doctor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_services->ModeofPayment->Visible) { // ModeofPayment ?>
		<td data-name="ModeofPayment"<?php echo $view_lab_services->ModeofPayment->cellAttributes() ?>>
<span id="el<?php echo $view_lab_services_list->RowCnt ?>_view_lab_services_ModeofPayment" class="view_lab_services_ModeofPayment">
<span<?php echo $view_lab_services->ModeofPayment->viewAttributes() ?>>
<?php echo $view_lab_services->ModeofPayment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_services->Amount->Visible) { // Amount ?>
		<td data-name="Amount"<?php echo $view_lab_services->Amount->cellAttributes() ?>>
<span id="el<?php echo $view_lab_services_list->RowCnt ?>_view_lab_services_Amount" class="view_lab_services_Amount">
<span<?php echo $view_lab_services->Amount->viewAttributes() ?>>
<?php echo $view_lab_services->Amount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_services->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_lab_services->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_lab_services_list->RowCnt ?>_view_lab_services_HospID" class="view_lab_services_HospID">
<span<?php echo $view_lab_services->HospID->viewAttributes() ?>>
<?php echo $view_lab_services->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_services->RIDNO->Visible) { // RIDNO ?>
		<td data-name="RIDNO"<?php echo $view_lab_services->RIDNO->cellAttributes() ?>>
<span id="el<?php echo $view_lab_services_list->RowCnt ?>_view_lab_services_RIDNO" class="view_lab_services_RIDNO">
<span<?php echo $view_lab_services->RIDNO->viewAttributes() ?>>
<?php echo $view_lab_services->RIDNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_services->PartnerName->Visible) { // PartnerName ?>
		<td data-name="PartnerName"<?php echo $view_lab_services->PartnerName->cellAttributes() ?>>
<span id="el<?php echo $view_lab_services_list->RowCnt ?>_view_lab_services_PartnerName" class="view_lab_services_PartnerName">
<span<?php echo $view_lab_services->PartnerName->viewAttributes() ?>>
<?php echo $view_lab_services->PartnerName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_services->PatId->Visible) { // PatId ?>
		<td data-name="PatId"<?php echo $view_lab_services->PatId->cellAttributes() ?>>
<span id="el<?php echo $view_lab_services_list->RowCnt ?>_view_lab_services_PatId" class="view_lab_services_PatId">
<span<?php echo $view_lab_services->PatId->viewAttributes() ?>>
<?php echo $view_lab_services->PatId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_services->DrDepartment->Visible) { // DrDepartment ?>
		<td data-name="DrDepartment"<?php echo $view_lab_services->DrDepartment->cellAttributes() ?>>
<span id="el<?php echo $view_lab_services_list->RowCnt ?>_view_lab_services_DrDepartment" class="view_lab_services_DrDepartment">
<span<?php echo $view_lab_services->DrDepartment->viewAttributes() ?>>
<?php echo $view_lab_services->DrDepartment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_services->RefferedBy->Visible) { // RefferedBy ?>
		<td data-name="RefferedBy"<?php echo $view_lab_services->RefferedBy->cellAttributes() ?>>
<span id="el<?php echo $view_lab_services_list->RowCnt ?>_view_lab_services_RefferedBy" class="view_lab_services_RefferedBy">
<span<?php echo $view_lab_services->RefferedBy->viewAttributes() ?>>
<?php echo $view_lab_services->RefferedBy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_services->BillNumber->Visible) { // BillNumber ?>
		<td data-name="BillNumber"<?php echo $view_lab_services->BillNumber->cellAttributes() ?>>
<span id="el<?php echo $view_lab_services_list->RowCnt ?>_view_lab_services_BillNumber" class="view_lab_services_BillNumber">
<span<?php echo $view_lab_services->BillNumber->viewAttributes() ?>>
<?php echo $view_lab_services->BillNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_services->LabTestReleased->Visible) { // LabTestReleased ?>
		<td data-name="LabTestReleased"<?php echo $view_lab_services->LabTestReleased->cellAttributes() ?>>
<span id="el<?php echo $view_lab_services_list->RowCnt ?>_view_lab_services_LabTestReleased" class="view_lab_services_LabTestReleased">
<span<?php echo $view_lab_services->LabTestReleased->viewAttributes() ?>>
<?php echo $view_lab_services->LabTestReleased->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_lab_services_list->ListOptions->render("body", "right", $view_lab_services_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_lab_services->isGridAdd())
		$view_lab_services_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_lab_services->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_lab_services_list->Recordset)
	$view_lab_services_list->Recordset->Close();
?>
<?php if (!$view_lab_services->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_lab_services->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_lab_services_list->Pager)) $view_lab_services_list->Pager = new NumericPager($view_lab_services_list->StartRec, $view_lab_services_list->DisplayRecs, $view_lab_services_list->TotalRecs, $view_lab_services_list->RecRange, $view_lab_services_list->AutoHidePager) ?>
<?php if ($view_lab_services_list->Pager->RecordCount > 0 && $view_lab_services_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_lab_services_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_lab_services_list->pageUrl() ?>start=<?php echo $view_lab_services_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_lab_services_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_lab_services_list->pageUrl() ?>start=<?php echo $view_lab_services_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_lab_services_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_lab_services_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_lab_services_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_lab_services_list->pageUrl() ?>start=<?php echo $view_lab_services_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_lab_services_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_lab_services_list->pageUrl() ?>start=<?php echo $view_lab_services_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_lab_services_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_lab_services_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_lab_services_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_lab_services_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_lab_services_list->TotalRecs > 0 && (!$view_lab_services_list->AutoHidePageSizeSelector || $view_lab_services_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_lab_services">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_lab_services_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_lab_services_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_lab_services_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_lab_services_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_lab_services_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_lab_services_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_lab_services->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_lab_services_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_lab_services_list->TotalRecs == 0 && !$view_lab_services->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_lab_services_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_lab_services_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_lab_services->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_lab_services->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_lab_services", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_lab_services_list->terminate();
?>