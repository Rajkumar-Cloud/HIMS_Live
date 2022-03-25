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
$view_patient_discharge_summary_group_list = new view_patient_discharge_summary_group_list();

// Run the page
$view_patient_discharge_summary_group_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_patient_discharge_summary_group_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_patient_discharge_summary_group->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_patient_discharge_summary_grouplist = currentForm = new ew.Form("fview_patient_discharge_summary_grouplist", "list");
fview_patient_discharge_summary_grouplist.formKeyCountName = '<?php echo $view_patient_discharge_summary_group_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_patient_discharge_summary_grouplist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_patient_discharge_summary_grouplist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_patient_discharge_summary_grouplist.lists["x_physician_id"] = <?php echo $view_patient_discharge_summary_group_list->physician_id->Lookup->toClientList() ?>;
fview_patient_discharge_summary_grouplist.lists["x_physician_id"].options = <?php echo JsonEncode($view_patient_discharge_summary_group_list->physician_id->lookupOptions()) ?>;

// Form object for search
var fview_patient_discharge_summary_grouplistsrch = currentSearchForm = new ew.Form("fview_patient_discharge_summary_grouplistsrch");

// Validate function for search
fview_patient_discharge_summary_grouplistsrch.validate = function(fobj) {
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
fview_patient_discharge_summary_grouplistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_patient_discharge_summary_grouplistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_patient_discharge_summary_grouplistsrch.lists["x_physician_id"] = <?php echo $view_patient_discharge_summary_group_list->physician_id->Lookup->toClientList() ?>;
fview_patient_discharge_summary_grouplistsrch.lists["x_physician_id"].options = <?php echo JsonEncode($view_patient_discharge_summary_group_list->physician_id->lookupOptions()) ?>;

// Filters
fview_patient_discharge_summary_grouplistsrch.filterList = <?php echo $view_patient_discharge_summary_group_list->getFilterList() ?>;
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
<?php if (!$view_patient_discharge_summary_group->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_patient_discharge_summary_group_list->TotalRecs > 0 && $view_patient_discharge_summary_group_list->ExportOptions->visible()) { ?>
<?php $view_patient_discharge_summary_group_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_patient_discharge_summary_group_list->ImportOptions->visible()) { ?>
<?php $view_patient_discharge_summary_group_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_patient_discharge_summary_group_list->SearchOptions->visible()) { ?>
<?php $view_patient_discharge_summary_group_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_patient_discharge_summary_group_list->FilterOptions->visible()) { ?>
<?php $view_patient_discharge_summary_group_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_patient_discharge_summary_group_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_patient_discharge_summary_group->isExport() && !$view_patient_discharge_summary_group->CurrentAction) { ?>
<form name="fview_patient_discharge_summary_grouplistsrch" id="fview_patient_discharge_summary_grouplistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_patient_discharge_summary_group_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_patient_discharge_summary_grouplistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_patient_discharge_summary_group">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$view_patient_discharge_summary_group_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$view_patient_discharge_summary_group->RowType = ROWTYPE_SEARCH;

// Render row
$view_patient_discharge_summary_group->resetAttributes();
$view_patient_discharge_summary_group_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($view_patient_discharge_summary_group->patient_name->Visible) { // patient_name ?>
	<div id="xsc_patient_name" class="ew-cell form-group">
		<label for="x_patient_name" class="ew-search-caption ew-label"><?php echo $view_patient_discharge_summary_group->patient_name->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_patient_name" id="z_patient_name" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_patient_discharge_summary_group" data-field="x_patient_name" name="x_patient_name" id="x_patient_name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_discharge_summary_group->patient_name->getPlaceHolder()) ?>" value="<?php echo $view_patient_discharge_summary_group->patient_name->EditValue ?>"<?php echo $view_patient_discharge_summary_group->patient_name->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($view_patient_discharge_summary_group->PatientID->Visible) { // PatientID ?>
	<div id="xsc_PatientID" class="ew-cell form-group">
		<label for="x_PatientID" class="ew-search-caption ew-label"><?php echo $view_patient_discharge_summary_group->PatientID->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientID" id="z_PatientID" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_patient_discharge_summary_group" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_discharge_summary_group->PatientID->getPlaceHolder()) ?>" value="<?php echo $view_patient_discharge_summary_group->PatientID->EditValue ?>"<?php echo $view_patient_discharge_summary_group->PatientID->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($view_patient_discharge_summary_group->physician_id->Visible) { // physician_id ?>
	<div id="xsc_physician_id" class="ew-cell form-group">
		<label for="x_physician_id" class="ew-search-caption ew-label"><?php echo $view_patient_discharge_summary_group->physician_id->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_physician_id" id="z_physician_id" value="="></span>
		<span class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_patient_discharge_summary_group" data-field="x_physician_id" data-value-separator="<?php echo $view_patient_discharge_summary_group->physician_id->displayValueSeparatorAttribute() ?>" id="x_physician_id" name="x_physician_id"<?php echo $view_patient_discharge_summary_group->physician_id->editAttributes() ?>>
		<?php echo $view_patient_discharge_summary_group->physician_id->selectOptionListHtml("x_physician_id") ?>
	</select>
</div>
<?php echo $view_patient_discharge_summary_group->physician_id->Lookup->getParamTag("p_x_physician_id") ?>
</span>
	</div>
<?php } ?>
<?php if ($view_patient_discharge_summary_group->typeRegsisteration->Visible) { // typeRegsisteration ?>
	<div id="xsc_typeRegsisteration" class="ew-cell form-group">
		<label for="x_typeRegsisteration" class="ew-search-caption ew-label"><?php echo $view_patient_discharge_summary_group->typeRegsisteration->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_typeRegsisteration" id="z_typeRegsisteration" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_patient_discharge_summary_group" data-field="x_typeRegsisteration" name="x_typeRegsisteration" id="x_typeRegsisteration" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_discharge_summary_group->typeRegsisteration->getPlaceHolder()) ?>" value="<?php echo $view_patient_discharge_summary_group->typeRegsisteration->EditValue ?>"<?php echo $view_patient_discharge_summary_group->typeRegsisteration->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_patient_discharge_summary_group_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_patient_discharge_summary_group_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_patient_discharge_summary_group_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_patient_discharge_summary_group_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_patient_discharge_summary_group_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_patient_discharge_summary_group_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_patient_discharge_summary_group_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_patient_discharge_summary_group_list->showPageHeader(); ?>
<?php
$view_patient_discharge_summary_group_list->showMessage();
?>
<?php if ($view_patient_discharge_summary_group_list->TotalRecs > 0 || $view_patient_discharge_summary_group->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_patient_discharge_summary_group_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_patient_discharge_summary_group">
<?php if (!$view_patient_discharge_summary_group->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_patient_discharge_summary_group->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_patient_discharge_summary_group_list->Pager)) $view_patient_discharge_summary_group_list->Pager = new NumericPager($view_patient_discharge_summary_group_list->StartRec, $view_patient_discharge_summary_group_list->DisplayRecs, $view_patient_discharge_summary_group_list->TotalRecs, $view_patient_discharge_summary_group_list->RecRange, $view_patient_discharge_summary_group_list->AutoHidePager) ?>
<?php if ($view_patient_discharge_summary_group_list->Pager->RecordCount > 0 && $view_patient_discharge_summary_group_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_patient_discharge_summary_group_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_patient_discharge_summary_group_list->pageUrl() ?>start=<?php echo $view_patient_discharge_summary_group_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_patient_discharge_summary_group_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_patient_discharge_summary_group_list->pageUrl() ?>start=<?php echo $view_patient_discharge_summary_group_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_patient_discharge_summary_group_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_patient_discharge_summary_group_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_patient_discharge_summary_group_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_patient_discharge_summary_group_list->pageUrl() ?>start=<?php echo $view_patient_discharge_summary_group_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_patient_discharge_summary_group_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_patient_discharge_summary_group_list->pageUrl() ?>start=<?php echo $view_patient_discharge_summary_group_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_patient_discharge_summary_group_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_patient_discharge_summary_group_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_patient_discharge_summary_group_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_patient_discharge_summary_group_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_patient_discharge_summary_group_list->TotalRecs > 0 && (!$view_patient_discharge_summary_group_list->AutoHidePageSizeSelector || $view_patient_discharge_summary_group_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_patient_discharge_summary_group">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_patient_discharge_summary_group_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_patient_discharge_summary_group_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_patient_discharge_summary_group_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_patient_discharge_summary_group_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_patient_discharge_summary_group_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_patient_discharge_summary_group_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_patient_discharge_summary_group->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_patient_discharge_summary_group_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_patient_discharge_summary_grouplist" id="fview_patient_discharge_summary_grouplist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_patient_discharge_summary_group_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_patient_discharge_summary_group_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_patient_discharge_summary_group">
<div id="gmp_view_patient_discharge_summary_group" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_patient_discharge_summary_group_list->TotalRecs > 0 || $view_patient_discharge_summary_group->isGridEdit()) { ?>
<table id="tbl_view_patient_discharge_summary_grouplist" class="table ew-table d-none"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_patient_discharge_summary_group_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_patient_discharge_summary_group_list->renderListOptions();

// Render list options (header, left)
$view_patient_discharge_summary_group_list->ListOptions->render("header", "left", "", "block", $view_patient_discharge_summary_group->TableVar, "view_patient_discharge_summary_grouplist");
?>
<?php if ($view_patient_discharge_summary_group->id->Visible) { // id ?>
	<?php if ($view_patient_discharge_summary_group->sortUrl($view_patient_discharge_summary_group->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_patient_discharge_summary_group->id->headerCellClass() ?>"><div id="elh_view_patient_discharge_summary_group_id" class="view_patient_discharge_summary_group_id"><div class="ew-table-header-caption"><script id="tpc_view_patient_discharge_summary_group_id" class="view_patient_discharge_summary_grouplist" type="text/html"><span><?php echo $view_patient_discharge_summary_group->id->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_patient_discharge_summary_group->id->headerCellClass() ?>"><script id="tpc_view_patient_discharge_summary_group_id" class="view_patient_discharge_summary_grouplist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_discharge_summary_group->SortUrl($view_patient_discharge_summary_group->id) ?>',1);"><div id="elh_view_patient_discharge_summary_group_id" class="view_patient_discharge_summary_group_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_discharge_summary_group->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_discharge_summary_group->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_discharge_summary_group->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_discharge_summary_group->patient_id->Visible) { // patient_id ?>
	<?php if ($view_patient_discharge_summary_group->sortUrl($view_patient_discharge_summary_group->patient_id) == "") { ?>
		<th data-name="patient_id" class="<?php echo $view_patient_discharge_summary_group->patient_id->headerCellClass() ?>"><div id="elh_view_patient_discharge_summary_group_patient_id" class="view_patient_discharge_summary_group_patient_id"><div class="ew-table-header-caption"><script id="tpc_view_patient_discharge_summary_group_patient_id" class="view_patient_discharge_summary_grouplist" type="text/html"><span><?php echo $view_patient_discharge_summary_group->patient_id->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="patient_id" class="<?php echo $view_patient_discharge_summary_group->patient_id->headerCellClass() ?>"><script id="tpc_view_patient_discharge_summary_group_patient_id" class="view_patient_discharge_summary_grouplist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_discharge_summary_group->SortUrl($view_patient_discharge_summary_group->patient_id) ?>',1);"><div id="elh_view_patient_discharge_summary_group_patient_id" class="view_patient_discharge_summary_group_patient_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_discharge_summary_group->patient_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_discharge_summary_group->patient_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_discharge_summary_group->patient_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_discharge_summary_group->patient_name->Visible) { // patient_name ?>
	<?php if ($view_patient_discharge_summary_group->sortUrl($view_patient_discharge_summary_group->patient_name) == "") { ?>
		<th data-name="patient_name" class="<?php echo $view_patient_discharge_summary_group->patient_name->headerCellClass() ?>"><div id="elh_view_patient_discharge_summary_group_patient_name" class="view_patient_discharge_summary_group_patient_name"><div class="ew-table-header-caption"><script id="tpc_view_patient_discharge_summary_group_patient_name" class="view_patient_discharge_summary_grouplist" type="text/html"><span><?php echo $view_patient_discharge_summary_group->patient_name->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="patient_name" class="<?php echo $view_patient_discharge_summary_group->patient_name->headerCellClass() ?>"><script id="tpc_view_patient_discharge_summary_group_patient_name" class="view_patient_discharge_summary_grouplist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_discharge_summary_group->SortUrl($view_patient_discharge_summary_group->patient_name) ?>',1);"><div id="elh_view_patient_discharge_summary_group_patient_name" class="view_patient_discharge_summary_group_patient_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_discharge_summary_group->patient_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_discharge_summary_group->patient_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_discharge_summary_group->patient_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_discharge_summary_group->PatientID->Visible) { // PatientID ?>
	<?php if ($view_patient_discharge_summary_group->sortUrl($view_patient_discharge_summary_group->PatientID) == "") { ?>
		<th data-name="PatientID" class="<?php echo $view_patient_discharge_summary_group->PatientID->headerCellClass() ?>"><div id="elh_view_patient_discharge_summary_group_PatientID" class="view_patient_discharge_summary_group_PatientID"><div class="ew-table-header-caption"><script id="tpc_view_patient_discharge_summary_group_PatientID" class="view_patient_discharge_summary_grouplist" type="text/html"><span><?php echo $view_patient_discharge_summary_group->PatientID->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="PatientID" class="<?php echo $view_patient_discharge_summary_group->PatientID->headerCellClass() ?>"><script id="tpc_view_patient_discharge_summary_group_PatientID" class="view_patient_discharge_summary_grouplist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_discharge_summary_group->SortUrl($view_patient_discharge_summary_group->PatientID) ?>',1);"><div id="elh_view_patient_discharge_summary_group_PatientID" class="view_patient_discharge_summary_group_PatientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_discharge_summary_group->PatientID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_discharge_summary_group->PatientID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_discharge_summary_group->PatientID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_discharge_summary_group->mrnNo->Visible) { // mrnNo ?>
	<?php if ($view_patient_discharge_summary_group->sortUrl($view_patient_discharge_summary_group->mrnNo) == "") { ?>
		<th data-name="mrnNo" class="<?php echo $view_patient_discharge_summary_group->mrnNo->headerCellClass() ?>"><div id="elh_view_patient_discharge_summary_group_mrnNo" class="view_patient_discharge_summary_group_mrnNo"><div class="ew-table-header-caption"><script id="tpc_view_patient_discharge_summary_group_mrnNo" class="view_patient_discharge_summary_grouplist" type="text/html"><span><?php echo $view_patient_discharge_summary_group->mrnNo->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="mrnNo" class="<?php echo $view_patient_discharge_summary_group->mrnNo->headerCellClass() ?>"><script id="tpc_view_patient_discharge_summary_group_mrnNo" class="view_patient_discharge_summary_grouplist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_discharge_summary_group->SortUrl($view_patient_discharge_summary_group->mrnNo) ?>',1);"><div id="elh_view_patient_discharge_summary_group_mrnNo" class="view_patient_discharge_summary_group_mrnNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_discharge_summary_group->mrnNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_discharge_summary_group->mrnNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_discharge_summary_group->mrnNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_discharge_summary_group->profilePic->Visible) { // profilePic ?>
	<?php if ($view_patient_discharge_summary_group->sortUrl($view_patient_discharge_summary_group->profilePic) == "") { ?>
		<th data-name="profilePic" class="<?php echo $view_patient_discharge_summary_group->profilePic->headerCellClass() ?>"><div id="elh_view_patient_discharge_summary_group_profilePic" class="view_patient_discharge_summary_group_profilePic"><div class="ew-table-header-caption"><script id="tpc_view_patient_discharge_summary_group_profilePic" class="view_patient_discharge_summary_grouplist" type="text/html"><span><?php echo $view_patient_discharge_summary_group->profilePic->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="profilePic" class="<?php echo $view_patient_discharge_summary_group->profilePic->headerCellClass() ?>"><script id="tpc_view_patient_discharge_summary_group_profilePic" class="view_patient_discharge_summary_grouplist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_discharge_summary_group->SortUrl($view_patient_discharge_summary_group->profilePic) ?>',1);"><div id="elh_view_patient_discharge_summary_group_profilePic" class="view_patient_discharge_summary_group_profilePic">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_discharge_summary_group->profilePic->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_discharge_summary_group->profilePic->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_discharge_summary_group->profilePic->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_discharge_summary_group->gender->Visible) { // gender ?>
	<?php if ($view_patient_discharge_summary_group->sortUrl($view_patient_discharge_summary_group->gender) == "") { ?>
		<th data-name="gender" class="<?php echo $view_patient_discharge_summary_group->gender->headerCellClass() ?>"><div id="elh_view_patient_discharge_summary_group_gender" class="view_patient_discharge_summary_group_gender"><div class="ew-table-header-caption"><script id="tpc_view_patient_discharge_summary_group_gender" class="view_patient_discharge_summary_grouplist" type="text/html"><span><?php echo $view_patient_discharge_summary_group->gender->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="gender" class="<?php echo $view_patient_discharge_summary_group->gender->headerCellClass() ?>"><script id="tpc_view_patient_discharge_summary_group_gender" class="view_patient_discharge_summary_grouplist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_discharge_summary_group->SortUrl($view_patient_discharge_summary_group->gender) ?>',1);"><div id="elh_view_patient_discharge_summary_group_gender" class="view_patient_discharge_summary_group_gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_discharge_summary_group->gender->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_discharge_summary_group->gender->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_discharge_summary_group->gender->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_discharge_summary_group->physician_id->Visible) { // physician_id ?>
	<?php if ($view_patient_discharge_summary_group->sortUrl($view_patient_discharge_summary_group->physician_id) == "") { ?>
		<th data-name="physician_id" class="<?php echo $view_patient_discharge_summary_group->physician_id->headerCellClass() ?>"><div id="elh_view_patient_discharge_summary_group_physician_id" class="view_patient_discharge_summary_group_physician_id"><div class="ew-table-header-caption"><script id="tpc_view_patient_discharge_summary_group_physician_id" class="view_patient_discharge_summary_grouplist" type="text/html"><span><?php echo $view_patient_discharge_summary_group->physician_id->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="physician_id" class="<?php echo $view_patient_discharge_summary_group->physician_id->headerCellClass() ?>"><script id="tpc_view_patient_discharge_summary_group_physician_id" class="view_patient_discharge_summary_grouplist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_discharge_summary_group->SortUrl($view_patient_discharge_summary_group->physician_id) ?>',1);"><div id="elh_view_patient_discharge_summary_group_physician_id" class="view_patient_discharge_summary_group_physician_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_discharge_summary_group->physician_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_discharge_summary_group->physician_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_discharge_summary_group->physician_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_discharge_summary_group->typeRegsisteration->Visible) { // typeRegsisteration ?>
	<?php if ($view_patient_discharge_summary_group->sortUrl($view_patient_discharge_summary_group->typeRegsisteration) == "") { ?>
		<th data-name="typeRegsisteration" class="<?php echo $view_patient_discharge_summary_group->typeRegsisteration->headerCellClass() ?>"><div id="elh_view_patient_discharge_summary_group_typeRegsisteration" class="view_patient_discharge_summary_group_typeRegsisteration"><div class="ew-table-header-caption"><script id="tpc_view_patient_discharge_summary_group_typeRegsisteration" class="view_patient_discharge_summary_grouplist" type="text/html"><span><?php echo $view_patient_discharge_summary_group->typeRegsisteration->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="typeRegsisteration" class="<?php echo $view_patient_discharge_summary_group->typeRegsisteration->headerCellClass() ?>"><script id="tpc_view_patient_discharge_summary_group_typeRegsisteration" class="view_patient_discharge_summary_grouplist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_discharge_summary_group->SortUrl($view_patient_discharge_summary_group->typeRegsisteration) ?>',1);"><div id="elh_view_patient_discharge_summary_group_typeRegsisteration" class="view_patient_discharge_summary_group_typeRegsisteration">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_discharge_summary_group->typeRegsisteration->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_discharge_summary_group->typeRegsisteration->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_discharge_summary_group->typeRegsisteration->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_discharge_summary_group->HospID->Visible) { // HospID ?>
	<?php if ($view_patient_discharge_summary_group->sortUrl($view_patient_discharge_summary_group->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_patient_discharge_summary_group->HospID->headerCellClass() ?>"><div id="elh_view_patient_discharge_summary_group_HospID" class="view_patient_discharge_summary_group_HospID"><div class="ew-table-header-caption"><script id="tpc_view_patient_discharge_summary_group_HospID" class="view_patient_discharge_summary_grouplist" type="text/html"><span><?php echo $view_patient_discharge_summary_group->HospID->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_patient_discharge_summary_group->HospID->headerCellClass() ?>"><script id="tpc_view_patient_discharge_summary_group_HospID" class="view_patient_discharge_summary_grouplist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_discharge_summary_group->SortUrl($view_patient_discharge_summary_group->HospID) ?>',1);"><div id="elh_view_patient_discharge_summary_group_HospID" class="view_patient_discharge_summary_group_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_discharge_summary_group->HospID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_discharge_summary_group->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_discharge_summary_group->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_discharge_summary_group->AdviceToOtherHospital->Visible) { // AdviceToOtherHospital ?>
	<?php if ($view_patient_discharge_summary_group->sortUrl($view_patient_discharge_summary_group->AdviceToOtherHospital) == "") { ?>
		<th data-name="AdviceToOtherHospital" class="<?php echo $view_patient_discharge_summary_group->AdviceToOtherHospital->headerCellClass() ?>"><div id="elh_view_patient_discharge_summary_group_AdviceToOtherHospital" class="view_patient_discharge_summary_group_AdviceToOtherHospital"><div class="ew-table-header-caption"><script id="tpc_view_patient_discharge_summary_group_AdviceToOtherHospital" class="view_patient_discharge_summary_grouplist" type="text/html"><span><?php echo $view_patient_discharge_summary_group->AdviceToOtherHospital->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="AdviceToOtherHospital" class="<?php echo $view_patient_discharge_summary_group->AdviceToOtherHospital->headerCellClass() ?>"><script id="tpc_view_patient_discharge_summary_group_AdviceToOtherHospital" class="view_patient_discharge_summary_grouplist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_discharge_summary_group->SortUrl($view_patient_discharge_summary_group->AdviceToOtherHospital) ?>',1);"><div id="elh_view_patient_discharge_summary_group_AdviceToOtherHospital" class="view_patient_discharge_summary_group_AdviceToOtherHospital">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_discharge_summary_group->AdviceToOtherHospital->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_discharge_summary_group->AdviceToOtherHospital->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_discharge_summary_group->AdviceToOtherHospital->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_discharge_summary_group->vid->Visible) { // vid ?>
	<?php if ($view_patient_discharge_summary_group->sortUrl($view_patient_discharge_summary_group->vid) == "") { ?>
		<th data-name="vid" class="<?php echo $view_patient_discharge_summary_group->vid->headerCellClass() ?>"><div id="elh_view_patient_discharge_summary_group_vid" class="view_patient_discharge_summary_group_vid"><div class="ew-table-header-caption"><script id="tpc_view_patient_discharge_summary_group_vid" class="view_patient_discharge_summary_grouplist" type="text/html"><span><?php echo $view_patient_discharge_summary_group->vid->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="vid" class="<?php echo $view_patient_discharge_summary_group->vid->headerCellClass() ?>"><script id="tpc_view_patient_discharge_summary_group_vid" class="view_patient_discharge_summary_grouplist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_discharge_summary_group->SortUrl($view_patient_discharge_summary_group->vid) ?>',1);"><div id="elh_view_patient_discharge_summary_group_vid" class="view_patient_discharge_summary_group_vid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_discharge_summary_group->vid->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_discharge_summary_group->vid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_discharge_summary_group->vid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_patient_discharge_summary_group_list->ListOptions->render("header", "right", "", "block", $view_patient_discharge_summary_group->TableVar, "view_patient_discharge_summary_grouplist");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_patient_discharge_summary_group->ExportAll && $view_patient_discharge_summary_group->isExport()) {
	$view_patient_discharge_summary_group_list->StopRec = $view_patient_discharge_summary_group_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_patient_discharge_summary_group_list->TotalRecs > $view_patient_discharge_summary_group_list->StartRec + $view_patient_discharge_summary_group_list->DisplayRecs - 1)
		$view_patient_discharge_summary_group_list->StopRec = $view_patient_discharge_summary_group_list->StartRec + $view_patient_discharge_summary_group_list->DisplayRecs - 1;
	else
		$view_patient_discharge_summary_group_list->StopRec = $view_patient_discharge_summary_group_list->TotalRecs;
}
$view_patient_discharge_summary_group_list->RecCnt = $view_patient_discharge_summary_group_list->StartRec - 1;
if ($view_patient_discharge_summary_group_list->Recordset && !$view_patient_discharge_summary_group_list->Recordset->EOF) {
	$view_patient_discharge_summary_group_list->Recordset->moveFirst();
	$selectLimit = $view_patient_discharge_summary_group_list->UseSelectLimit;
	if (!$selectLimit && $view_patient_discharge_summary_group_list->StartRec > 1)
		$view_patient_discharge_summary_group_list->Recordset->move($view_patient_discharge_summary_group_list->StartRec - 1);
} elseif (!$view_patient_discharge_summary_group->AllowAddDeleteRow && $view_patient_discharge_summary_group_list->StopRec == 0) {
	$view_patient_discharge_summary_group_list->StopRec = $view_patient_discharge_summary_group->GridAddRowCount;
}

// Initialize aggregate
$view_patient_discharge_summary_group->RowType = ROWTYPE_AGGREGATEINIT;
$view_patient_discharge_summary_group->resetAttributes();
$view_patient_discharge_summary_group_list->renderRow();
while ($view_patient_discharge_summary_group_list->RecCnt < $view_patient_discharge_summary_group_list->StopRec) {
	$view_patient_discharge_summary_group_list->RecCnt++;
	if ($view_patient_discharge_summary_group_list->RecCnt >= $view_patient_discharge_summary_group_list->StartRec) {
		$view_patient_discharge_summary_group_list->RowCnt++;

		// Set up key count
		$view_patient_discharge_summary_group_list->KeyCount = $view_patient_discharge_summary_group_list->RowIndex;

		// Init row class and style
		$view_patient_discharge_summary_group->resetAttributes();
		$view_patient_discharge_summary_group->CssClass = "";
		if ($view_patient_discharge_summary_group->isGridAdd()) {
		} else {
			$view_patient_discharge_summary_group_list->loadRowValues($view_patient_discharge_summary_group_list->Recordset); // Load row values
		}
		$view_patient_discharge_summary_group->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_patient_discharge_summary_group->RowAttrs = array_merge($view_patient_discharge_summary_group->RowAttrs, array('data-rowindex'=>$view_patient_discharge_summary_group_list->RowCnt, 'id'=>'r' . $view_patient_discharge_summary_group_list->RowCnt . '_view_patient_discharge_summary_group', 'data-rowtype'=>$view_patient_discharge_summary_group->RowType));

		// Render row
		$view_patient_discharge_summary_group_list->renderRow();

		// Render list options
		$view_patient_discharge_summary_group_list->renderListOptions();

		// Save row and cell attributes
		$view_patient_discharge_summary_group_list->Attrs[$view_patient_discharge_summary_group_list->RowCnt] = array("row_attrs" => $view_patient_discharge_summary_group->rowAttributes(), "cell_attrs" => array());
		$view_patient_discharge_summary_group_list->Attrs[$view_patient_discharge_summary_group_list->RowCnt]["cell_attrs"] = $view_patient_discharge_summary_group->fieldCellAttributes();
?>
	<tr<?php echo $view_patient_discharge_summary_group->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_patient_discharge_summary_group_list->ListOptions->render("body", "left", $view_patient_discharge_summary_group_list->RowCnt, "block", $view_patient_discharge_summary_group->TableVar, "view_patient_discharge_summary_grouplist");
?>
	<?php if ($view_patient_discharge_summary_group->id->Visible) { // id ?>
		<td data-name="id"<?php echo $view_patient_discharge_summary_group->id->cellAttributes() ?>>
<script id="tpx<?php echo $view_patient_discharge_summary_group_list->RowCnt ?>_view_patient_discharge_summary_group_id" class="view_patient_discharge_summary_grouplist" type="text/html">
<span id="el<?php echo $view_patient_discharge_summary_group_list->RowCnt ?>_view_patient_discharge_summary_group_id" class="view_patient_discharge_summary_group_id">
<span<?php echo $view_patient_discharge_summary_group->id->viewAttributes() ?>>
<?php echo $view_patient_discharge_summary_group->id->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_patient_discharge_summary_group->patient_id->Visible) { // patient_id ?>
		<td data-name="patient_id"<?php echo $view_patient_discharge_summary_group->patient_id->cellAttributes() ?>>
<script id="tpx<?php echo $view_patient_discharge_summary_group_list->RowCnt ?>_view_patient_discharge_summary_group_patient_id" class="view_patient_discharge_summary_grouplist" type="text/html">
<span id="el<?php echo $view_patient_discharge_summary_group_list->RowCnt ?>_view_patient_discharge_summary_group_patient_id" class="view_patient_discharge_summary_group_patient_id">
<span<?php echo $view_patient_discharge_summary_group->patient_id->viewAttributes() ?>>
<?php echo $view_patient_discharge_summary_group->patient_id->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_patient_discharge_summary_group->patient_name->Visible) { // patient_name ?>
		<td data-name="patient_name"<?php echo $view_patient_discharge_summary_group->patient_name->cellAttributes() ?>>
<script id="tpx<?php echo $view_patient_discharge_summary_group_list->RowCnt ?>_view_patient_discharge_summary_group_patient_name" class="view_patient_discharge_summary_grouplist" type="text/html">
<span id="el<?php echo $view_patient_discharge_summary_group_list->RowCnt ?>_view_patient_discharge_summary_group_patient_name" class="view_patient_discharge_summary_group_patient_name">
<span<?php echo $view_patient_discharge_summary_group->patient_name->viewAttributes() ?>>
<?php echo $view_patient_discharge_summary_group->patient_name->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_patient_discharge_summary_group->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID"<?php echo $view_patient_discharge_summary_group->PatientID->cellAttributes() ?>>
<script id="tpx<?php echo $view_patient_discharge_summary_group_list->RowCnt ?>_view_patient_discharge_summary_group_PatientID" class="view_patient_discharge_summary_grouplist" type="text/html">
<span id="el<?php echo $view_patient_discharge_summary_group_list->RowCnt ?>_view_patient_discharge_summary_group_PatientID" class="view_patient_discharge_summary_group_PatientID">
<span<?php echo $view_patient_discharge_summary_group->PatientID->viewAttributes() ?>>
<?php echo $view_patient_discharge_summary_group->PatientID->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_patient_discharge_summary_group->mrnNo->Visible) { // mrnNo ?>
		<td data-name="mrnNo"<?php echo $view_patient_discharge_summary_group->mrnNo->cellAttributes() ?>>
<script id="tpx<?php echo $view_patient_discharge_summary_group_list->RowCnt ?>_view_patient_discharge_summary_group_mrnNo" class="view_patient_discharge_summary_grouplist" type="text/html">
<span id="el<?php echo $view_patient_discharge_summary_group_list->RowCnt ?>_view_patient_discharge_summary_group_mrnNo" class="view_patient_discharge_summary_group_mrnNo">
<span<?php echo $view_patient_discharge_summary_group->mrnNo->viewAttributes() ?>>
<?php echo $view_patient_discharge_summary_group->mrnNo->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_patient_discharge_summary_group->profilePic->Visible) { // profilePic ?>
		<td data-name="profilePic"<?php echo $view_patient_discharge_summary_group->profilePic->cellAttributes() ?>>
<script id="tpx<?php echo $view_patient_discharge_summary_group_list->RowCnt ?>_view_patient_discharge_summary_group_profilePic" class="view_patient_discharge_summary_grouplist" type="text/html">
<span id="el<?php echo $view_patient_discharge_summary_group_list->RowCnt ?>_view_patient_discharge_summary_group_profilePic" class="view_patient_discharge_summary_group_profilePic">
<span<?php echo $view_patient_discharge_summary_group->profilePic->viewAttributes() ?>>
<?php echo $view_patient_discharge_summary_group->profilePic->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_patient_discharge_summary_group->gender->Visible) { // gender ?>
		<td data-name="gender"<?php echo $view_patient_discharge_summary_group->gender->cellAttributes() ?>>
<script id="tpx<?php echo $view_patient_discharge_summary_group_list->RowCnt ?>_view_patient_discharge_summary_group_gender" class="view_patient_discharge_summary_grouplist" type="text/html">
<span id="el<?php echo $view_patient_discharge_summary_group_list->RowCnt ?>_view_patient_discharge_summary_group_gender" class="view_patient_discharge_summary_group_gender">
<span<?php echo $view_patient_discharge_summary_group->gender->viewAttributes() ?>>
<?php echo $view_patient_discharge_summary_group->gender->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_patient_discharge_summary_group->physician_id->Visible) { // physician_id ?>
		<td data-name="physician_id"<?php echo $view_patient_discharge_summary_group->physician_id->cellAttributes() ?>>
<script id="tpx<?php echo $view_patient_discharge_summary_group_list->RowCnt ?>_view_patient_discharge_summary_group_physician_id" class="view_patient_discharge_summary_grouplist" type="text/html">
<span id="el<?php echo $view_patient_discharge_summary_group_list->RowCnt ?>_view_patient_discharge_summary_group_physician_id" class="view_patient_discharge_summary_group_physician_id">
<span<?php echo $view_patient_discharge_summary_group->physician_id->viewAttributes() ?>>
<?php echo $view_patient_discharge_summary_group->physician_id->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_patient_discharge_summary_group->typeRegsisteration->Visible) { // typeRegsisteration ?>
		<td data-name="typeRegsisteration"<?php echo $view_patient_discharge_summary_group->typeRegsisteration->cellAttributes() ?>>
<script id="tpx<?php echo $view_patient_discharge_summary_group_list->RowCnt ?>_view_patient_discharge_summary_group_typeRegsisteration" class="view_patient_discharge_summary_grouplist" type="text/html">
<span id="el<?php echo $view_patient_discharge_summary_group_list->RowCnt ?>_view_patient_discharge_summary_group_typeRegsisteration" class="view_patient_discharge_summary_group_typeRegsisteration">
<span<?php echo $view_patient_discharge_summary_group->typeRegsisteration->viewAttributes() ?>>
<?php echo $view_patient_discharge_summary_group->typeRegsisteration->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_patient_discharge_summary_group->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_patient_discharge_summary_group->HospID->cellAttributes() ?>>
<script id="tpx<?php echo $view_patient_discharge_summary_group_list->RowCnt ?>_view_patient_discharge_summary_group_HospID" class="view_patient_discharge_summary_grouplist" type="text/html">
<span id="el<?php echo $view_patient_discharge_summary_group_list->RowCnt ?>_view_patient_discharge_summary_group_HospID" class="view_patient_discharge_summary_group_HospID">
<span<?php echo $view_patient_discharge_summary_group->HospID->viewAttributes() ?>>
<?php echo $view_patient_discharge_summary_group->HospID->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_patient_discharge_summary_group->AdviceToOtherHospital->Visible) { // AdviceToOtherHospital ?>
		<td data-name="AdviceToOtherHospital"<?php echo $view_patient_discharge_summary_group->AdviceToOtherHospital->cellAttributes() ?>>
<script id="tpx<?php echo $view_patient_discharge_summary_group_list->RowCnt ?>_view_patient_discharge_summary_group_AdviceToOtherHospital" class="view_patient_discharge_summary_grouplist" type="text/html">
<span id="el<?php echo $view_patient_discharge_summary_group_list->RowCnt ?>_view_patient_discharge_summary_group_AdviceToOtherHospital" class="view_patient_discharge_summary_group_AdviceToOtherHospital">
<span<?php echo $view_patient_discharge_summary_group->AdviceToOtherHospital->viewAttributes() ?>>
<?php echo $view_patient_discharge_summary_group->AdviceToOtherHospital->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_patient_discharge_summary_group->vid->Visible) { // vid ?>
		<td data-name="vid"<?php echo $view_patient_discharge_summary_group->vid->cellAttributes() ?>>
<script id="tpx<?php echo $view_patient_discharge_summary_group_list->RowCnt ?>_view_patient_discharge_summary_group_vid" class="view_patient_discharge_summary_grouplist" type="text/html">
<span id="el<?php echo $view_patient_discharge_summary_group_list->RowCnt ?>_view_patient_discharge_summary_group_vid" class="view_patient_discharge_summary_group_vid">
<span<?php echo $view_patient_discharge_summary_group->vid->viewAttributes() ?>>
<?php echo $view_patient_discharge_summary_group->vid->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_patient_discharge_summary_group_list->ListOptions->render("body", "right", $view_patient_discharge_summary_group_list->RowCnt, "block", $view_patient_discharge_summary_group->TableVar, "view_patient_discharge_summary_grouplist");
?>
	</tr>
<?php
	}
	if (!$view_patient_discharge_summary_group->isGridAdd())
		$view_patient_discharge_summary_group_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_patient_discharge_summary_group->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<div id="tpd_view_patient_discharge_summary_grouplist" class="ew-custom-template"></div>
<script id="tpm_view_patient_discharge_summary_grouplist" type="text/html">
<div id="ct_view_patient_discharge_summary_group_list"><?php if ($view_patient_discharge_summary_group_list->RowCnt > 0) { ?>
<table cellspacing="0" class="ew-table ew-table-separate">
	<thead>
		<tr class="ew-table-header">
			{{include tmpl="#tpoh_view_patient_discharge_summary_group"/}}
			<td rowspan="2">Print</td>
				<td rowspan="2">Edit</td>
			<td rowspan="2">{{include tmpl="#tpc_view_patient_discharge_summary_group_profilePic"/}}</td>
			<td>{{include tmpl="#tpc_view_patient_discharge_summary_group_PatientID"/}}</td><td>{{include tmpl="#tpc_view_patient_discharge_summary_group_patient_name"/}}</td> <td>{{include tmpl="#tpc_view_patient_discharge_summary_group_gender"/}}</td> 
		</tr>
		<tr class="ew-table-header">
			<td>{{include tmpl="#tpc_view_patient_discharge_summary_group_physician_id"/}}</td><td>{{include tmpl="#tpc_view_patient_discharge_summary_group_typeRegsisteration"/}}</td><td>{{include tmpl="#tpc_view_patient_discharge_summary_group_mrnNo"/}}</td>
		</tr> 
	</thead>
	<tbody> 
<?php for ($i = $view_patient_discharge_summary_group_list->StartRowCnt; $i <= $view_patient_discharge_summary_group_list->RowCnt; $i++) { ?>
<tr<?php echo @$view_patient_discharge_summary_group_list->Attrs[$i]['row_attrs'] ?>>
	{{include tmpl="#tpob<?php echo $i ?>_view_patient_discharge_summary_group"/}}
<td rowspan="2">
<a id="ggh{{: ~root.rows[<?php echo $i - 1 ?>].id }}"  href=""  onload= class="faa-parent animated-hover">
				<i  id="bbbg{{: ~root.rows[<?php echo $i - 1 ?>].id }}"   class="fa fa-print faa-tada fa-2x" style="color:green"></i>
 </a>
<img hidden src="ff" onerror=" var mmk = document.getElementById('ggh{{: ~root.rows[<?php echo $i - 1 ?>].id }}'); var kkkl = document.getElementById('bbbg{{: ~root.rows[<?php echo $i - 1 ?>].id }}'); var ad='{{: ~root.rows[<?php echo $i - 1 ?>].AdviceToOtherHospital }}'; if(ad == 'Yes'){ mmk.href = 'view_patient_clinical_summaryview.php?showdetail=&id={{: ~root.rows[<?php echo $i - 1 ?>].id }}';  kkkl.style.color = '#ff0000'; } else {  mmk.href = 'view_patient_discharge_summaryview.php?showdetail=&id={{: ~root.rows[<?php echo $i - 1 ?>].id }}'  }  a" > 
</td>
	<td rowspan="2">
				<a class="btn btn-app" href="patient_vitalsedit.php?showmaster=ip_admission&amp;fk_id={{: ~root.rows[<?php echo $i - 1 ?>].id }}&amp;fk_patient_id={{: ~root.rows[<?php echo $i - 1 ?>].patient_id }}&amp;fk_mrnNo={{: ~root.rows[<?php echo $i - 1 ?>].mrnNo }}&amp;id={{: ~root.rows[<?php echo $i - 1 ?>].vid }}">
				 <i class="fas fa-edit fa-2x" style="color:purple"></i> Edit
				</a>
	</td>
	<td rowspan="2">
<div class="image">
		  <img  style="height: auto;width: 4rem;" src='uploads/<?php echo $view_patient_discharge_summary_group->profilePic->getViewValue() ?>'  class="img-circle elevation-2" alt="User Image">
</div>
	</td>
	<td>{{include tmpl="#tpx<?php echo $i ?>_view_patient_discharge_summary_group_PatientID"/}}</td><td>{{include tmpl="#tpx<?php echo $i ?>_view_patient_discharge_summary_group_patient_name"/}}</td> <td>{{include tmpl="#tpx<?php echo $i ?>_view_patient_discharge_summary_group_gender"/}}</td> 
 </tr>
 <tr<?php echo @$view_patient_discharge_summary_group_list->Attrs[$i]['row_attrs'] ?>> 
	 <td>{{include tmpl="#tpx<?php echo $i ?>_view_patient_discharge_summary_group_physician_id"/}}</td><td>{{include tmpl="#tpx<?php echo $i ?>_view_patient_discharge_summary_group_typeRegsisteration"/}}</td><td>{{include tmpl="#tpx<?php echo $i ?>_view_patient_discharge_summary_group_mrnNo"/}}</td>
 </tr> 
<?php } ?>
</tbody></table>
<?php } ?>
</div>
</script>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_patient_discharge_summary_group_list->Recordset)
	$view_patient_discharge_summary_group_list->Recordset->Close();
?>
<?php if (!$view_patient_discharge_summary_group->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_patient_discharge_summary_group->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_patient_discharge_summary_group_list->Pager)) $view_patient_discharge_summary_group_list->Pager = new NumericPager($view_patient_discharge_summary_group_list->StartRec, $view_patient_discharge_summary_group_list->DisplayRecs, $view_patient_discharge_summary_group_list->TotalRecs, $view_patient_discharge_summary_group_list->RecRange, $view_patient_discharge_summary_group_list->AutoHidePager) ?>
<?php if ($view_patient_discharge_summary_group_list->Pager->RecordCount > 0 && $view_patient_discharge_summary_group_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_patient_discharge_summary_group_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_patient_discharge_summary_group_list->pageUrl() ?>start=<?php echo $view_patient_discharge_summary_group_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_patient_discharge_summary_group_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_patient_discharge_summary_group_list->pageUrl() ?>start=<?php echo $view_patient_discharge_summary_group_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_patient_discharge_summary_group_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_patient_discharge_summary_group_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_patient_discharge_summary_group_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_patient_discharge_summary_group_list->pageUrl() ?>start=<?php echo $view_patient_discharge_summary_group_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_patient_discharge_summary_group_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_patient_discharge_summary_group_list->pageUrl() ?>start=<?php echo $view_patient_discharge_summary_group_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_patient_discharge_summary_group_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_patient_discharge_summary_group_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_patient_discharge_summary_group_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_patient_discharge_summary_group_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_patient_discharge_summary_group_list->TotalRecs > 0 && (!$view_patient_discharge_summary_group_list->AutoHidePageSizeSelector || $view_patient_discharge_summary_group_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_patient_discharge_summary_group">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_patient_discharge_summary_group_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_patient_discharge_summary_group_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_patient_discharge_summary_group_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_patient_discharge_summary_group_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_patient_discharge_summary_group_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_patient_discharge_summary_group_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_patient_discharge_summary_group->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_patient_discharge_summary_group_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_patient_discharge_summary_group_list->TotalRecs == 0 && !$view_patient_discharge_summary_group->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_patient_discharge_summary_group_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($view_patient_discharge_summary_group->Rows) ?> };
ew.applyTemplate("tpd_view_patient_discharge_summary_grouplist", "tpm_view_patient_discharge_summary_grouplist", "view_patient_discharge_summary_grouplist", "<?php echo $view_patient_discharge_summary_group->CustomExport ?>", ew.vars.templateData);
jQuery("#tpd_view_patient_discharge_summary_grouplist th.ew-list-option-header").each(function() {this.rowSpan = 2});
jQuery("#tpd_view_patient_discharge_summary_grouplist td.ew-list-option-body").each(function() {this.rowSpan = 2});
jQuery("script.view_patient_discharge_summary_grouplist_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$view_patient_discharge_summary_group_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_patient_discharge_summary_group->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_patient_discharge_summary_group->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_patient_discharge_summary_group", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_patient_discharge_summary_group_list->terminate();
?>