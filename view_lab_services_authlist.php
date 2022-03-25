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
$view_lab_services_auth_list = new view_lab_services_auth_list();

// Run the page
$view_lab_services_auth_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_lab_services_auth_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_lab_services_auth->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_lab_services_authlist = currentForm = new ew.Form("fview_lab_services_authlist", "list");
fview_lab_services_authlist.formKeyCountName = '<?php echo $view_lab_services_auth_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_lab_services_authlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_lab_services_authlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_lab_services_authlist.lists["x_HospID"] = <?php echo $view_lab_services_auth_list->HospID->Lookup->toClientList() ?>;
fview_lab_services_authlist.lists["x_HospID"].options = <?php echo JsonEncode($view_lab_services_auth_list->HospID->lookupOptions()) ?>;

// Form object for search
var fview_lab_services_authlistsrch = currentSearchForm = new ew.Form("fview_lab_services_authlistsrch");

// Validate function for search
fview_lab_services_authlistsrch.validate = function(fobj) {
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
fview_lab_services_authlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_lab_services_authlistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_lab_services_authlistsrch.lists["x_HospID"] = <?php echo $view_lab_services_auth_list->HospID->Lookup->toClientList() ?>;
fview_lab_services_authlistsrch.lists["x_HospID"].options = <?php echo JsonEncode($view_lab_services_auth_list->HospID->lookupOptions()) ?>;

// Filters
fview_lab_services_authlistsrch.filterList = <?php echo $view_lab_services_auth_list->getFilterList() ?>;
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
<?php if (!$view_lab_services_auth->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_lab_services_auth_list->TotalRecs > 0 && $view_lab_services_auth_list->ExportOptions->visible()) { ?>
<?php $view_lab_services_auth_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_lab_services_auth_list->ImportOptions->visible()) { ?>
<?php $view_lab_services_auth_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_lab_services_auth_list->SearchOptions->visible()) { ?>
<?php $view_lab_services_auth_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_lab_services_auth_list->FilterOptions->visible()) { ?>
<?php $view_lab_services_auth_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_lab_services_auth_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_lab_services_auth->isExport() && !$view_lab_services_auth->CurrentAction) { ?>
<form name="fview_lab_services_authlistsrch" id="fview_lab_services_authlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_lab_services_auth_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_lab_services_authlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_lab_services_auth">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$view_lab_services_auth_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$view_lab_services_auth->RowType = ROWTYPE_SEARCH;

// Render row
$view_lab_services_auth->resetAttributes();
$view_lab_services_auth_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($view_lab_services_auth->PatientId->Visible) { // PatientId ?>
	<div id="xsc_PatientId" class="ew-cell form-group">
		<label for="x_PatientId" class="ew-search-caption ew-label"><?php echo $view_lab_services_auth->PatientId->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientId" id="z_PatientId" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_lab_services_auth" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services_auth->PatientId->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_auth->PatientId->EditValue ?>"<?php echo $view_lab_services_auth->PatientId->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($view_lab_services_auth->PatientName->Visible) { // PatientName ?>
	<div id="xsc_PatientName" class="ew-cell form-group">
		<label for="x_PatientName" class="ew-search-caption ew-label"><?php echo $view_lab_services_auth->PatientName->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_lab_services_auth" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services_auth->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_auth->PatientName->EditValue ?>"<?php echo $view_lab_services_auth->PatientName->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($view_lab_services_auth->HospID->Visible) { // HospID ?>
	<div id="xsc_HospID" class="ew-cell form-group">
		<label for="x_HospID" class="ew-search-caption ew-label"><?php echo $view_lab_services_auth->HospID->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_HospID" id="z_HospID" value="="></span>
		<span class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_lab_services_auth" data-field="x_HospID" data-value-separator="<?php echo $view_lab_services_auth->HospID->displayValueSeparatorAttribute() ?>" id="x_HospID" name="x_HospID"<?php echo $view_lab_services_auth->HospID->editAttributes() ?>>
		<?php echo $view_lab_services_auth->HospID->selectOptionListHtml("x_HospID") ?>
	</select>
</div>
<?php echo $view_lab_services_auth->HospID->Lookup->getParamTag("p_x_HospID") ?>
</span>
	</div>
<?php } ?>
<?php if ($view_lab_services_auth->LabTestReleased->Visible) { // LabTestReleased ?>
	<div id="xsc_LabTestReleased" class="ew-cell form-group">
		<label for="x_LabTestReleased" class="ew-search-caption ew-label"><?php echo $view_lab_services_auth->LabTestReleased->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_LabTestReleased" id="z_LabTestReleased" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_lab_services_auth" data-field="x_LabTestReleased" name="x_LabTestReleased" id="x_LabTestReleased" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services_auth->LabTestReleased->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_auth->LabTestReleased->EditValue ?>"<?php echo $view_lab_services_auth->LabTestReleased->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_lab_services_auth_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_lab_services_auth_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_lab_services_auth_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_lab_services_auth_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_lab_services_auth_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_lab_services_auth_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_lab_services_auth_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_lab_services_auth_list->showPageHeader(); ?>
<?php
$view_lab_services_auth_list->showMessage();
?>
<?php if ($view_lab_services_auth_list->TotalRecs > 0 || $view_lab_services_auth->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_lab_services_auth_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_lab_services_auth">
<?php if (!$view_lab_services_auth->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_lab_services_auth->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_lab_services_auth_list->Pager)) $view_lab_services_auth_list->Pager = new NumericPager($view_lab_services_auth_list->StartRec, $view_lab_services_auth_list->DisplayRecs, $view_lab_services_auth_list->TotalRecs, $view_lab_services_auth_list->RecRange, $view_lab_services_auth_list->AutoHidePager) ?>
<?php if ($view_lab_services_auth_list->Pager->RecordCount > 0 && $view_lab_services_auth_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_lab_services_auth_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_lab_services_auth_list->pageUrl() ?>start=<?php echo $view_lab_services_auth_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_lab_services_auth_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_lab_services_auth_list->pageUrl() ?>start=<?php echo $view_lab_services_auth_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_lab_services_auth_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_lab_services_auth_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_lab_services_auth_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_lab_services_auth_list->pageUrl() ?>start=<?php echo $view_lab_services_auth_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_lab_services_auth_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_lab_services_auth_list->pageUrl() ?>start=<?php echo $view_lab_services_auth_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_lab_services_auth_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_lab_services_auth_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_lab_services_auth_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_lab_services_auth_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_lab_services_auth_list->TotalRecs > 0 && (!$view_lab_services_auth_list->AutoHidePageSizeSelector || $view_lab_services_auth_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_lab_services_auth">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_lab_services_auth_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_lab_services_auth_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_lab_services_auth_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_lab_services_auth_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_lab_services_auth_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_lab_services_auth_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_lab_services_auth->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_lab_services_auth_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_lab_services_authlist" id="fview_lab_services_authlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_lab_services_auth_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_lab_services_auth_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_lab_services_auth">
<div id="gmp_view_lab_services_auth" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_lab_services_auth_list->TotalRecs > 0 || $view_lab_services_auth->isGridEdit()) { ?>
<table id="tbl_view_lab_services_authlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_lab_services_auth_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_lab_services_auth_list->renderListOptions();

// Render list options (header, left)
$view_lab_services_auth_list->ListOptions->render("header", "left");
?>
<?php if ($view_lab_services_auth->id->Visible) { // id ?>
	<?php if ($view_lab_services_auth->sortUrl($view_lab_services_auth->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_lab_services_auth->id->headerCellClass() ?>"><div id="elh_view_lab_services_auth_id" class="view_lab_services_auth_id"><div class="ew-table-header-caption"><?php echo $view_lab_services_auth->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_lab_services_auth->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_services_auth->SortUrl($view_lab_services_auth->id) ?>',1);"><div id="elh_view_lab_services_auth_id" class="view_lab_services_auth_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_services_auth->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_services_auth->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_services_auth->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_services_auth->SID->Visible) { // SID ?>
	<?php if ($view_lab_services_auth->sortUrl($view_lab_services_auth->SID) == "") { ?>
		<th data-name="SID" class="<?php echo $view_lab_services_auth->SID->headerCellClass() ?>"><div id="elh_view_lab_services_auth_SID" class="view_lab_services_auth_SID"><div class="ew-table-header-caption"><?php echo $view_lab_services_auth->SID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SID" class="<?php echo $view_lab_services_auth->SID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_services_auth->SortUrl($view_lab_services_auth->SID) ?>',1);"><div id="elh_view_lab_services_auth_SID" class="view_lab_services_auth_SID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_services_auth->SID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_services_auth->SID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_services_auth->SID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_services_auth->PatientId->Visible) { // PatientId ?>
	<?php if ($view_lab_services_auth->sortUrl($view_lab_services_auth->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $view_lab_services_auth->PatientId->headerCellClass() ?>"><div id="elh_view_lab_services_auth_PatientId" class="view_lab_services_auth_PatientId"><div class="ew-table-header-caption"><?php echo $view_lab_services_auth->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $view_lab_services_auth->PatientId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_services_auth->SortUrl($view_lab_services_auth->PatientId) ?>',1);"><div id="elh_view_lab_services_auth_PatientId" class="view_lab_services_auth_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_services_auth->PatientId->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_services_auth->PatientId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_services_auth->PatientId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_services_auth->PatientName->Visible) { // PatientName ?>
	<?php if ($view_lab_services_auth->sortUrl($view_lab_services_auth->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $view_lab_services_auth->PatientName->headerCellClass() ?>"><div id="elh_view_lab_services_auth_PatientName" class="view_lab_services_auth_PatientName"><div class="ew-table-header-caption"><?php echo $view_lab_services_auth->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $view_lab_services_auth->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_services_auth->SortUrl($view_lab_services_auth->PatientName) ?>',1);"><div id="elh_view_lab_services_auth_PatientName" class="view_lab_services_auth_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_services_auth->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_services_auth->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_services_auth->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_services_auth->Gender->Visible) { // Gender ?>
	<?php if ($view_lab_services_auth->sortUrl($view_lab_services_auth->Gender) == "") { ?>
		<th data-name="Gender" class="<?php echo $view_lab_services_auth->Gender->headerCellClass() ?>"><div id="elh_view_lab_services_auth_Gender" class="view_lab_services_auth_Gender"><div class="ew-table-header-caption"><?php echo $view_lab_services_auth->Gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gender" class="<?php echo $view_lab_services_auth->Gender->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_services_auth->SortUrl($view_lab_services_auth->Gender) ?>',1);"><div id="elh_view_lab_services_auth_Gender" class="view_lab_services_auth_Gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_services_auth->Gender->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_services_auth->Gender->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_services_auth->Gender->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_services_auth->Mobile->Visible) { // Mobile ?>
	<?php if ($view_lab_services_auth->sortUrl($view_lab_services_auth->Mobile) == "") { ?>
		<th data-name="Mobile" class="<?php echo $view_lab_services_auth->Mobile->headerCellClass() ?>"><div id="elh_view_lab_services_auth_Mobile" class="view_lab_services_auth_Mobile"><div class="ew-table-header-caption"><?php echo $view_lab_services_auth->Mobile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mobile" class="<?php echo $view_lab_services_auth->Mobile->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_services_auth->SortUrl($view_lab_services_auth->Mobile) ?>',1);"><div id="elh_view_lab_services_auth_Mobile" class="view_lab_services_auth_Mobile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_services_auth->Mobile->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_services_auth->Mobile->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_services_auth->Mobile->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_services_auth->Doctor->Visible) { // Doctor ?>
	<?php if ($view_lab_services_auth->sortUrl($view_lab_services_auth->Doctor) == "") { ?>
		<th data-name="Doctor" class="<?php echo $view_lab_services_auth->Doctor->headerCellClass() ?>"><div id="elh_view_lab_services_auth_Doctor" class="view_lab_services_auth_Doctor"><div class="ew-table-header-caption"><?php echo $view_lab_services_auth->Doctor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Doctor" class="<?php echo $view_lab_services_auth->Doctor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_services_auth->SortUrl($view_lab_services_auth->Doctor) ?>',1);"><div id="elh_view_lab_services_auth_Doctor" class="view_lab_services_auth_Doctor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_services_auth->Doctor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_services_auth->Doctor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_services_auth->Doctor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_services_auth->ModeofPayment->Visible) { // ModeofPayment ?>
	<?php if ($view_lab_services_auth->sortUrl($view_lab_services_auth->ModeofPayment) == "") { ?>
		<th data-name="ModeofPayment" class="<?php echo $view_lab_services_auth->ModeofPayment->headerCellClass() ?>"><div id="elh_view_lab_services_auth_ModeofPayment" class="view_lab_services_auth_ModeofPayment"><div class="ew-table-header-caption"><?php echo $view_lab_services_auth->ModeofPayment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModeofPayment" class="<?php echo $view_lab_services_auth->ModeofPayment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_services_auth->SortUrl($view_lab_services_auth->ModeofPayment) ?>',1);"><div id="elh_view_lab_services_auth_ModeofPayment" class="view_lab_services_auth_ModeofPayment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_services_auth->ModeofPayment->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_services_auth->ModeofPayment->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_services_auth->ModeofPayment->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_services_auth->Amount->Visible) { // Amount ?>
	<?php if ($view_lab_services_auth->sortUrl($view_lab_services_auth->Amount) == "") { ?>
		<th data-name="Amount" class="<?php echo $view_lab_services_auth->Amount->headerCellClass() ?>"><div id="elh_view_lab_services_auth_Amount" class="view_lab_services_auth_Amount"><div class="ew-table-header-caption"><?php echo $view_lab_services_auth->Amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Amount" class="<?php echo $view_lab_services_auth->Amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_services_auth->SortUrl($view_lab_services_auth->Amount) ?>',1);"><div id="elh_view_lab_services_auth_Amount" class="view_lab_services_auth_Amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_services_auth->Amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_services_auth->Amount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_services_auth->Amount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_services_auth->HospID->Visible) { // HospID ?>
	<?php if ($view_lab_services_auth->sortUrl($view_lab_services_auth->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_lab_services_auth->HospID->headerCellClass() ?>"><div id="elh_view_lab_services_auth_HospID" class="view_lab_services_auth_HospID"><div class="ew-table-header-caption"><?php echo $view_lab_services_auth->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_lab_services_auth->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_services_auth->SortUrl($view_lab_services_auth->HospID) ?>',1);"><div id="elh_view_lab_services_auth_HospID" class="view_lab_services_auth_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_services_auth->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_services_auth->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_services_auth->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_services_auth->RIDNO->Visible) { // RIDNO ?>
	<?php if ($view_lab_services_auth->sortUrl($view_lab_services_auth->RIDNO) == "") { ?>
		<th data-name="RIDNO" class="<?php echo $view_lab_services_auth->RIDNO->headerCellClass() ?>"><div id="elh_view_lab_services_auth_RIDNO" class="view_lab_services_auth_RIDNO"><div class="ew-table-header-caption"><?php echo $view_lab_services_auth->RIDNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RIDNO" class="<?php echo $view_lab_services_auth->RIDNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_services_auth->SortUrl($view_lab_services_auth->RIDNO) ?>',1);"><div id="elh_view_lab_services_auth_RIDNO" class="view_lab_services_auth_RIDNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_services_auth->RIDNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_services_auth->RIDNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_services_auth->RIDNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_services_auth->PartnerName->Visible) { // PartnerName ?>
	<?php if ($view_lab_services_auth->sortUrl($view_lab_services_auth->PartnerName) == "") { ?>
		<th data-name="PartnerName" class="<?php echo $view_lab_services_auth->PartnerName->headerCellClass() ?>"><div id="elh_view_lab_services_auth_PartnerName" class="view_lab_services_auth_PartnerName"><div class="ew-table-header-caption"><?php echo $view_lab_services_auth->PartnerName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerName" class="<?php echo $view_lab_services_auth->PartnerName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_services_auth->SortUrl($view_lab_services_auth->PartnerName) ?>',1);"><div id="elh_view_lab_services_auth_PartnerName" class="view_lab_services_auth_PartnerName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_services_auth->PartnerName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_services_auth->PartnerName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_services_auth->PartnerName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_services_auth->PatId->Visible) { // PatId ?>
	<?php if ($view_lab_services_auth->sortUrl($view_lab_services_auth->PatId) == "") { ?>
		<th data-name="PatId" class="<?php echo $view_lab_services_auth->PatId->headerCellClass() ?>"><div id="elh_view_lab_services_auth_PatId" class="view_lab_services_auth_PatId"><div class="ew-table-header-caption"><?php echo $view_lab_services_auth->PatId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatId" class="<?php echo $view_lab_services_auth->PatId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_services_auth->SortUrl($view_lab_services_auth->PatId) ?>',1);"><div id="elh_view_lab_services_auth_PatId" class="view_lab_services_auth_PatId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_services_auth->PatId->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_services_auth->PatId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_services_auth->PatId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_services_auth->DrDepartment->Visible) { // DrDepartment ?>
	<?php if ($view_lab_services_auth->sortUrl($view_lab_services_auth->DrDepartment) == "") { ?>
		<th data-name="DrDepartment" class="<?php echo $view_lab_services_auth->DrDepartment->headerCellClass() ?>"><div id="elh_view_lab_services_auth_DrDepartment" class="view_lab_services_auth_DrDepartment"><div class="ew-table-header-caption"><?php echo $view_lab_services_auth->DrDepartment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrDepartment" class="<?php echo $view_lab_services_auth->DrDepartment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_services_auth->SortUrl($view_lab_services_auth->DrDepartment) ?>',1);"><div id="elh_view_lab_services_auth_DrDepartment" class="view_lab_services_auth_DrDepartment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_services_auth->DrDepartment->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_services_auth->DrDepartment->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_services_auth->DrDepartment->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_services_auth->RefferedBy->Visible) { // RefferedBy ?>
	<?php if ($view_lab_services_auth->sortUrl($view_lab_services_auth->RefferedBy) == "") { ?>
		<th data-name="RefferedBy" class="<?php echo $view_lab_services_auth->RefferedBy->headerCellClass() ?>"><div id="elh_view_lab_services_auth_RefferedBy" class="view_lab_services_auth_RefferedBy"><div class="ew-table-header-caption"><?php echo $view_lab_services_auth->RefferedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RefferedBy" class="<?php echo $view_lab_services_auth->RefferedBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_services_auth->SortUrl($view_lab_services_auth->RefferedBy) ?>',1);"><div id="elh_view_lab_services_auth_RefferedBy" class="view_lab_services_auth_RefferedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_services_auth->RefferedBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_services_auth->RefferedBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_services_auth->RefferedBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_services_auth->BillNumber->Visible) { // BillNumber ?>
	<?php if ($view_lab_services_auth->sortUrl($view_lab_services_auth->BillNumber) == "") { ?>
		<th data-name="BillNumber" class="<?php echo $view_lab_services_auth->BillNumber->headerCellClass() ?>"><div id="elh_view_lab_services_auth_BillNumber" class="view_lab_services_auth_BillNumber"><div class="ew-table-header-caption"><?php echo $view_lab_services_auth->BillNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillNumber" class="<?php echo $view_lab_services_auth->BillNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_services_auth->SortUrl($view_lab_services_auth->BillNumber) ?>',1);"><div id="elh_view_lab_services_auth_BillNumber" class="view_lab_services_auth_BillNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_services_auth->BillNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_services_auth->BillNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_services_auth->BillNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_services_auth->LabTestReleased->Visible) { // LabTestReleased ?>
	<?php if ($view_lab_services_auth->sortUrl($view_lab_services_auth->LabTestReleased) == "") { ?>
		<th data-name="LabTestReleased" class="<?php echo $view_lab_services_auth->LabTestReleased->headerCellClass() ?>"><div id="elh_view_lab_services_auth_LabTestReleased" class="view_lab_services_auth_LabTestReleased"><div class="ew-table-header-caption"><?php echo $view_lab_services_auth->LabTestReleased->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LabTestReleased" class="<?php echo $view_lab_services_auth->LabTestReleased->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_lab_services_auth->SortUrl($view_lab_services_auth->LabTestReleased) ?>',1);"><div id="elh_view_lab_services_auth_LabTestReleased" class="view_lab_services_auth_LabTestReleased">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_services_auth->LabTestReleased->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_services_auth->LabTestReleased->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_lab_services_auth->LabTestReleased->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_lab_services_auth_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_lab_services_auth->ExportAll && $view_lab_services_auth->isExport()) {
	$view_lab_services_auth_list->StopRec = $view_lab_services_auth_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_lab_services_auth_list->TotalRecs > $view_lab_services_auth_list->StartRec + $view_lab_services_auth_list->DisplayRecs - 1)
		$view_lab_services_auth_list->StopRec = $view_lab_services_auth_list->StartRec + $view_lab_services_auth_list->DisplayRecs - 1;
	else
		$view_lab_services_auth_list->StopRec = $view_lab_services_auth_list->TotalRecs;
}
$view_lab_services_auth_list->RecCnt = $view_lab_services_auth_list->StartRec - 1;
if ($view_lab_services_auth_list->Recordset && !$view_lab_services_auth_list->Recordset->EOF) {
	$view_lab_services_auth_list->Recordset->moveFirst();
	$selectLimit = $view_lab_services_auth_list->UseSelectLimit;
	if (!$selectLimit && $view_lab_services_auth_list->StartRec > 1)
		$view_lab_services_auth_list->Recordset->move($view_lab_services_auth_list->StartRec - 1);
} elseif (!$view_lab_services_auth->AllowAddDeleteRow && $view_lab_services_auth_list->StopRec == 0) {
	$view_lab_services_auth_list->StopRec = $view_lab_services_auth->GridAddRowCount;
}

// Initialize aggregate
$view_lab_services_auth->RowType = ROWTYPE_AGGREGATEINIT;
$view_lab_services_auth->resetAttributes();
$view_lab_services_auth_list->renderRow();
while ($view_lab_services_auth_list->RecCnt < $view_lab_services_auth_list->StopRec) {
	$view_lab_services_auth_list->RecCnt++;
	if ($view_lab_services_auth_list->RecCnt >= $view_lab_services_auth_list->StartRec) {
		$view_lab_services_auth_list->RowCnt++;

		// Set up key count
		$view_lab_services_auth_list->KeyCount = $view_lab_services_auth_list->RowIndex;

		// Init row class and style
		$view_lab_services_auth->resetAttributes();
		$view_lab_services_auth->CssClass = "";
		if ($view_lab_services_auth->isGridAdd()) {
		} else {
			$view_lab_services_auth_list->loadRowValues($view_lab_services_auth_list->Recordset); // Load row values
		}
		$view_lab_services_auth->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_lab_services_auth->RowAttrs = array_merge($view_lab_services_auth->RowAttrs, array('data-rowindex'=>$view_lab_services_auth_list->RowCnt, 'id'=>'r' . $view_lab_services_auth_list->RowCnt . '_view_lab_services_auth', 'data-rowtype'=>$view_lab_services_auth->RowType));

		// Render row
		$view_lab_services_auth_list->renderRow();

		// Render list options
		$view_lab_services_auth_list->renderListOptions();
?>
	<tr<?php echo $view_lab_services_auth->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_lab_services_auth_list->ListOptions->render("body", "left", $view_lab_services_auth_list->RowCnt);
?>
	<?php if ($view_lab_services_auth->id->Visible) { // id ?>
		<td data-name="id"<?php echo $view_lab_services_auth->id->cellAttributes() ?>>
<span id="el<?php echo $view_lab_services_auth_list->RowCnt ?>_view_lab_services_auth_id" class="view_lab_services_auth_id">
<span<?php echo $view_lab_services_auth->id->viewAttributes() ?>>
<?php echo $view_lab_services_auth->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_services_auth->SID->Visible) { // SID ?>
		<td data-name="SID"<?php echo $view_lab_services_auth->SID->cellAttributes() ?>>
<span id="el<?php echo $view_lab_services_auth_list->RowCnt ?>_view_lab_services_auth_SID" class="view_lab_services_auth_SID">
<span<?php echo $view_lab_services_auth->SID->viewAttributes() ?>>
<?php echo $view_lab_services_auth->SID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_services_auth->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId"<?php echo $view_lab_services_auth->PatientId->cellAttributes() ?>>
<span id="el<?php echo $view_lab_services_auth_list->RowCnt ?>_view_lab_services_auth_PatientId" class="view_lab_services_auth_PatientId">
<span<?php echo $view_lab_services_auth->PatientId->viewAttributes() ?>>
<?php echo $view_lab_services_auth->PatientId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_services_auth->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $view_lab_services_auth->PatientName->cellAttributes() ?>>
<span id="el<?php echo $view_lab_services_auth_list->RowCnt ?>_view_lab_services_auth_PatientName" class="view_lab_services_auth_PatientName">
<span<?php echo $view_lab_services_auth->PatientName->viewAttributes() ?>>
<?php echo $view_lab_services_auth->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_services_auth->Gender->Visible) { // Gender ?>
		<td data-name="Gender"<?php echo $view_lab_services_auth->Gender->cellAttributes() ?>>
<span id="el<?php echo $view_lab_services_auth_list->RowCnt ?>_view_lab_services_auth_Gender" class="view_lab_services_auth_Gender">
<span<?php echo $view_lab_services_auth->Gender->viewAttributes() ?>>
<?php echo $view_lab_services_auth->Gender->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_services_auth->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile"<?php echo $view_lab_services_auth->Mobile->cellAttributes() ?>>
<span id="el<?php echo $view_lab_services_auth_list->RowCnt ?>_view_lab_services_auth_Mobile" class="view_lab_services_auth_Mobile">
<span<?php echo $view_lab_services_auth->Mobile->viewAttributes() ?>>
<?php echo $view_lab_services_auth->Mobile->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_services_auth->Doctor->Visible) { // Doctor ?>
		<td data-name="Doctor"<?php echo $view_lab_services_auth->Doctor->cellAttributes() ?>>
<span id="el<?php echo $view_lab_services_auth_list->RowCnt ?>_view_lab_services_auth_Doctor" class="view_lab_services_auth_Doctor">
<span<?php echo $view_lab_services_auth->Doctor->viewAttributes() ?>>
<?php echo $view_lab_services_auth->Doctor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_services_auth->ModeofPayment->Visible) { // ModeofPayment ?>
		<td data-name="ModeofPayment"<?php echo $view_lab_services_auth->ModeofPayment->cellAttributes() ?>>
<span id="el<?php echo $view_lab_services_auth_list->RowCnt ?>_view_lab_services_auth_ModeofPayment" class="view_lab_services_auth_ModeofPayment">
<span<?php echo $view_lab_services_auth->ModeofPayment->viewAttributes() ?>>
<?php echo $view_lab_services_auth->ModeofPayment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_services_auth->Amount->Visible) { // Amount ?>
		<td data-name="Amount"<?php echo $view_lab_services_auth->Amount->cellAttributes() ?>>
<span id="el<?php echo $view_lab_services_auth_list->RowCnt ?>_view_lab_services_auth_Amount" class="view_lab_services_auth_Amount">
<span<?php echo $view_lab_services_auth->Amount->viewAttributes() ?>>
<?php echo $view_lab_services_auth->Amount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_services_auth->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_lab_services_auth->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_lab_services_auth_list->RowCnt ?>_view_lab_services_auth_HospID" class="view_lab_services_auth_HospID">
<span<?php echo $view_lab_services_auth->HospID->viewAttributes() ?>>
<?php echo $view_lab_services_auth->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_services_auth->RIDNO->Visible) { // RIDNO ?>
		<td data-name="RIDNO"<?php echo $view_lab_services_auth->RIDNO->cellAttributes() ?>>
<span id="el<?php echo $view_lab_services_auth_list->RowCnt ?>_view_lab_services_auth_RIDNO" class="view_lab_services_auth_RIDNO">
<span<?php echo $view_lab_services_auth->RIDNO->viewAttributes() ?>>
<?php echo $view_lab_services_auth->RIDNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_services_auth->PartnerName->Visible) { // PartnerName ?>
		<td data-name="PartnerName"<?php echo $view_lab_services_auth->PartnerName->cellAttributes() ?>>
<span id="el<?php echo $view_lab_services_auth_list->RowCnt ?>_view_lab_services_auth_PartnerName" class="view_lab_services_auth_PartnerName">
<span<?php echo $view_lab_services_auth->PartnerName->viewAttributes() ?>>
<?php echo $view_lab_services_auth->PartnerName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_services_auth->PatId->Visible) { // PatId ?>
		<td data-name="PatId"<?php echo $view_lab_services_auth->PatId->cellAttributes() ?>>
<span id="el<?php echo $view_lab_services_auth_list->RowCnt ?>_view_lab_services_auth_PatId" class="view_lab_services_auth_PatId">
<span<?php echo $view_lab_services_auth->PatId->viewAttributes() ?>>
<?php echo $view_lab_services_auth->PatId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_services_auth->DrDepartment->Visible) { // DrDepartment ?>
		<td data-name="DrDepartment"<?php echo $view_lab_services_auth->DrDepartment->cellAttributes() ?>>
<span id="el<?php echo $view_lab_services_auth_list->RowCnt ?>_view_lab_services_auth_DrDepartment" class="view_lab_services_auth_DrDepartment">
<span<?php echo $view_lab_services_auth->DrDepartment->viewAttributes() ?>>
<?php echo $view_lab_services_auth->DrDepartment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_services_auth->RefferedBy->Visible) { // RefferedBy ?>
		<td data-name="RefferedBy"<?php echo $view_lab_services_auth->RefferedBy->cellAttributes() ?>>
<span id="el<?php echo $view_lab_services_auth_list->RowCnt ?>_view_lab_services_auth_RefferedBy" class="view_lab_services_auth_RefferedBy">
<span<?php echo $view_lab_services_auth->RefferedBy->viewAttributes() ?>>
<?php echo $view_lab_services_auth->RefferedBy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_services_auth->BillNumber->Visible) { // BillNumber ?>
		<td data-name="BillNumber"<?php echo $view_lab_services_auth->BillNumber->cellAttributes() ?>>
<span id="el<?php echo $view_lab_services_auth_list->RowCnt ?>_view_lab_services_auth_BillNumber" class="view_lab_services_auth_BillNumber">
<span<?php echo $view_lab_services_auth->BillNumber->viewAttributes() ?>>
<?php echo $view_lab_services_auth->BillNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_services_auth->LabTestReleased->Visible) { // LabTestReleased ?>
		<td data-name="LabTestReleased"<?php echo $view_lab_services_auth->LabTestReleased->cellAttributes() ?>>
<span id="el<?php echo $view_lab_services_auth_list->RowCnt ?>_view_lab_services_auth_LabTestReleased" class="view_lab_services_auth_LabTestReleased">
<span<?php echo $view_lab_services_auth->LabTestReleased->viewAttributes() ?>>
<?php echo $view_lab_services_auth->LabTestReleased->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_lab_services_auth_list->ListOptions->render("body", "right", $view_lab_services_auth_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_lab_services_auth->isGridAdd())
		$view_lab_services_auth_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_lab_services_auth->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_lab_services_auth_list->Recordset)
	$view_lab_services_auth_list->Recordset->Close();
?>
<?php if (!$view_lab_services_auth->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_lab_services_auth->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_lab_services_auth_list->Pager)) $view_lab_services_auth_list->Pager = new NumericPager($view_lab_services_auth_list->StartRec, $view_lab_services_auth_list->DisplayRecs, $view_lab_services_auth_list->TotalRecs, $view_lab_services_auth_list->RecRange, $view_lab_services_auth_list->AutoHidePager) ?>
<?php if ($view_lab_services_auth_list->Pager->RecordCount > 0 && $view_lab_services_auth_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_lab_services_auth_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_lab_services_auth_list->pageUrl() ?>start=<?php echo $view_lab_services_auth_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_lab_services_auth_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_lab_services_auth_list->pageUrl() ?>start=<?php echo $view_lab_services_auth_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_lab_services_auth_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_lab_services_auth_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_lab_services_auth_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_lab_services_auth_list->pageUrl() ?>start=<?php echo $view_lab_services_auth_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_lab_services_auth_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_lab_services_auth_list->pageUrl() ?>start=<?php echo $view_lab_services_auth_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_lab_services_auth_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_lab_services_auth_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_lab_services_auth_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_lab_services_auth_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_lab_services_auth_list->TotalRecs > 0 && (!$view_lab_services_auth_list->AutoHidePageSizeSelector || $view_lab_services_auth_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_lab_services_auth">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_lab_services_auth_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_lab_services_auth_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_lab_services_auth_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_lab_services_auth_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_lab_services_auth_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_lab_services_auth_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_lab_services_auth->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_lab_services_auth_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_lab_services_auth_list->TotalRecs == 0 && !$view_lab_services_auth->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_lab_services_auth_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_lab_services_auth_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_lab_services_auth->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_lab_services_auth->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_lab_services_auth", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_lab_services_auth_list->terminate();
?>