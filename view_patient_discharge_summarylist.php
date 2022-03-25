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
$view_patient_discharge_summary_list = new view_patient_discharge_summary_list();

// Run the page
$view_patient_discharge_summary_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_patient_discharge_summary_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_patient_discharge_summary->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_patient_discharge_summarylist = currentForm = new ew.Form("fview_patient_discharge_summarylist", "list");
fview_patient_discharge_summarylist.formKeyCountName = '<?php echo $view_patient_discharge_summary_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_patient_discharge_summarylist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_patient_discharge_summarylist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_patient_discharge_summarylist.lists["x_physician_id"] = <?php echo $view_patient_discharge_summary_list->physician_id->Lookup->toClientList() ?>;
fview_patient_discharge_summarylist.lists["x_physician_id"].options = <?php echo JsonEncode($view_patient_discharge_summary_list->physician_id->lookupOptions()) ?>;

// Form object for search
var fview_patient_discharge_summarylistsrch = currentSearchForm = new ew.Form("fview_patient_discharge_summarylistsrch");

// Validate function for search
fview_patient_discharge_summarylistsrch.validate = function(fobj) {
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
fview_patient_discharge_summarylistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_patient_discharge_summarylistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

fview_patient_discharge_summarylistsrch.filterList = <?php echo $view_patient_discharge_summary_list->getFilterList() ?>;
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
<?php if (!$view_patient_discharge_summary->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_patient_discharge_summary_list->TotalRecs > 0 && $view_patient_discharge_summary_list->ExportOptions->visible()) { ?>
<?php $view_patient_discharge_summary_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_patient_discharge_summary_list->ImportOptions->visible()) { ?>
<?php $view_patient_discharge_summary_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_patient_discharge_summary_list->SearchOptions->visible()) { ?>
<?php $view_patient_discharge_summary_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_patient_discharge_summary_list->FilterOptions->visible()) { ?>
<?php $view_patient_discharge_summary_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_patient_discharge_summary_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_patient_discharge_summary->isExport() && !$view_patient_discharge_summary->CurrentAction) { ?>
<form name="fview_patient_discharge_summarylistsrch" id="fview_patient_discharge_summarylistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_patient_discharge_summary_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_patient_discharge_summarylistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_patient_discharge_summary">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$view_patient_discharge_summary_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$view_patient_discharge_summary->RowType = ROWTYPE_SEARCH;

// Render row
$view_patient_discharge_summary->resetAttributes();
$view_patient_discharge_summary_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($view_patient_discharge_summary->PatientID->Visible) { // PatientID ?>
	<div id="xsc_PatientID" class="ew-cell form-group">
		<label for="x_PatientID" class="ew-search-caption ew-label"><?php echo $view_patient_discharge_summary->PatientID->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientID" id="z_PatientID" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_patient_discharge_summary" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="40" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_discharge_summary->PatientID->getPlaceHolder()) ?>" value="<?php echo $view_patient_discharge_summary->PatientID->EditValue ?>"<?php echo $view_patient_discharge_summary->PatientID->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($view_patient_discharge_summary->patient_name->Visible) { // patient_name ?>
	<div id="xsc_patient_name" class="ew-cell form-group">
		<label for="x_patient_name" class="ew-search-caption ew-label"><?php echo $view_patient_discharge_summary->patient_name->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_patient_name" id="z_patient_name" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_patient_discharge_summary" data-field="x_patient_name" name="x_patient_name" id="x_patient_name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_patient_discharge_summary->patient_name->getPlaceHolder()) ?>" value="<?php echo $view_patient_discharge_summary->patient_name->EditValue ?>"<?php echo $view_patient_discharge_summary->patient_name->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_patient_discharge_summary_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_patient_discharge_summary_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_patient_discharge_summary_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_patient_discharge_summary_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_patient_discharge_summary_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_patient_discharge_summary_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_patient_discharge_summary_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_patient_discharge_summary_list->showPageHeader(); ?>
<?php
$view_patient_discharge_summary_list->showMessage();
?>
<?php if ($view_patient_discharge_summary_list->TotalRecs > 0 || $view_patient_discharge_summary->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_patient_discharge_summary_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_patient_discharge_summary">
<?php if (!$view_patient_discharge_summary->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_patient_discharge_summary->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_patient_discharge_summary_list->Pager)) $view_patient_discharge_summary_list->Pager = new NumericPager($view_patient_discharge_summary_list->StartRec, $view_patient_discharge_summary_list->DisplayRecs, $view_patient_discharge_summary_list->TotalRecs, $view_patient_discharge_summary_list->RecRange, $view_patient_discharge_summary_list->AutoHidePager) ?>
<?php if ($view_patient_discharge_summary_list->Pager->RecordCount > 0 && $view_patient_discharge_summary_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_patient_discharge_summary_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_patient_discharge_summary_list->pageUrl() ?>start=<?php echo $view_patient_discharge_summary_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_patient_discharge_summary_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_patient_discharge_summary_list->pageUrl() ?>start=<?php echo $view_patient_discharge_summary_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_patient_discharge_summary_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_patient_discharge_summary_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_patient_discharge_summary_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_patient_discharge_summary_list->pageUrl() ?>start=<?php echo $view_patient_discharge_summary_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_patient_discharge_summary_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_patient_discharge_summary_list->pageUrl() ?>start=<?php echo $view_patient_discharge_summary_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_patient_discharge_summary_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_patient_discharge_summary_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_patient_discharge_summary_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_patient_discharge_summary_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_patient_discharge_summary_list->TotalRecs > 0 && (!$view_patient_discharge_summary_list->AutoHidePageSizeSelector || $view_patient_discharge_summary_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_patient_discharge_summary">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_patient_discharge_summary_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_patient_discharge_summary_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_patient_discharge_summary_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_patient_discharge_summary_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_patient_discharge_summary_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_patient_discharge_summary_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_patient_discharge_summary->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_patient_discharge_summary_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_patient_discharge_summarylist" id="fview_patient_discharge_summarylist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_patient_discharge_summary_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_patient_discharge_summary_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_patient_discharge_summary">
<div id="gmp_view_patient_discharge_summary" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_patient_discharge_summary_list->TotalRecs > 0 || $view_patient_discharge_summary->isGridEdit()) { ?>
<table id="tbl_view_patient_discharge_summarylist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_patient_discharge_summary_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_patient_discharge_summary_list->renderListOptions();

// Render list options (header, left)
$view_patient_discharge_summary_list->ListOptions->render("header", "left");
?>
<?php if ($view_patient_discharge_summary->id->Visible) { // id ?>
	<?php if ($view_patient_discharge_summary->sortUrl($view_patient_discharge_summary->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_patient_discharge_summary->id->headerCellClass() ?>"><div id="elh_view_patient_discharge_summary_id" class="view_patient_discharge_summary_id"><div class="ew-table-header-caption"><?php echo $view_patient_discharge_summary->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_patient_discharge_summary->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_discharge_summary->SortUrl($view_patient_discharge_summary->id) ?>',1);"><div id="elh_view_patient_discharge_summary_id" class="view_patient_discharge_summary_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_discharge_summary->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_discharge_summary->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_discharge_summary->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_discharge_summary->PatientID->Visible) { // PatientID ?>
	<?php if ($view_patient_discharge_summary->sortUrl($view_patient_discharge_summary->PatientID) == "") { ?>
		<th data-name="PatientID" class="<?php echo $view_patient_discharge_summary->PatientID->headerCellClass() ?>"><div id="elh_view_patient_discharge_summary_PatientID" class="view_patient_discharge_summary_PatientID"><div class="ew-table-header-caption"><?php echo $view_patient_discharge_summary->PatientID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientID" class="<?php echo $view_patient_discharge_summary->PatientID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_discharge_summary->SortUrl($view_patient_discharge_summary->PatientID) ?>',1);"><div id="elh_view_patient_discharge_summary_PatientID" class="view_patient_discharge_summary_PatientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_discharge_summary->PatientID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_discharge_summary->PatientID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_discharge_summary->PatientID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_discharge_summary->patient_name->Visible) { // patient_name ?>
	<?php if ($view_patient_discharge_summary->sortUrl($view_patient_discharge_summary->patient_name) == "") { ?>
		<th data-name="patient_name" class="<?php echo $view_patient_discharge_summary->patient_name->headerCellClass() ?>"><div id="elh_view_patient_discharge_summary_patient_name" class="view_patient_discharge_summary_patient_name"><div class="ew-table-header-caption"><?php echo $view_patient_discharge_summary->patient_name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patient_name" class="<?php echo $view_patient_discharge_summary->patient_name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_discharge_summary->SortUrl($view_patient_discharge_summary->patient_name) ?>',1);"><div id="elh_view_patient_discharge_summary_patient_name" class="view_patient_discharge_summary_patient_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_discharge_summary->patient_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_discharge_summary->patient_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_discharge_summary->patient_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_discharge_summary->gender->Visible) { // gender ?>
	<?php if ($view_patient_discharge_summary->sortUrl($view_patient_discharge_summary->gender) == "") { ?>
		<th data-name="gender" class="<?php echo $view_patient_discharge_summary->gender->headerCellClass() ?>"><div id="elh_view_patient_discharge_summary_gender" class="view_patient_discharge_summary_gender"><div class="ew-table-header-caption"><?php echo $view_patient_discharge_summary->gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="gender" class="<?php echo $view_patient_discharge_summary->gender->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_discharge_summary->SortUrl($view_patient_discharge_summary->gender) ?>',1);"><div id="elh_view_patient_discharge_summary_gender" class="view_patient_discharge_summary_gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_discharge_summary->gender->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_discharge_summary->gender->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_discharge_summary->gender->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_discharge_summary->physician_id->Visible) { // physician_id ?>
	<?php if ($view_patient_discharge_summary->sortUrl($view_patient_discharge_summary->physician_id) == "") { ?>
		<th data-name="physician_id" class="<?php echo $view_patient_discharge_summary->physician_id->headerCellClass() ?>"><div id="elh_view_patient_discharge_summary_physician_id" class="view_patient_discharge_summary_physician_id"><div class="ew-table-header-caption"><?php echo $view_patient_discharge_summary->physician_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="physician_id" class="<?php echo $view_patient_discharge_summary->physician_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_discharge_summary->SortUrl($view_patient_discharge_summary->physician_id) ?>',1);"><div id="elh_view_patient_discharge_summary_physician_id" class="view_patient_discharge_summary_physician_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_discharge_summary->physician_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_discharge_summary->physician_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_discharge_summary->physician_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_discharge_summary->typeRegsisteration->Visible) { // typeRegsisteration ?>
	<?php if ($view_patient_discharge_summary->sortUrl($view_patient_discharge_summary->typeRegsisteration) == "") { ?>
		<th data-name="typeRegsisteration" class="<?php echo $view_patient_discharge_summary->typeRegsisteration->headerCellClass() ?>"><div id="elh_view_patient_discharge_summary_typeRegsisteration" class="view_patient_discharge_summary_typeRegsisteration"><div class="ew-table-header-caption"><?php echo $view_patient_discharge_summary->typeRegsisteration->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="typeRegsisteration" class="<?php echo $view_patient_discharge_summary->typeRegsisteration->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_discharge_summary->SortUrl($view_patient_discharge_summary->typeRegsisteration) ?>',1);"><div id="elh_view_patient_discharge_summary_typeRegsisteration" class="view_patient_discharge_summary_typeRegsisteration">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_discharge_summary->typeRegsisteration->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_discharge_summary->typeRegsisteration->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_discharge_summary->typeRegsisteration->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_discharge_summary->PaymentCategory->Visible) { // PaymentCategory ?>
	<?php if ($view_patient_discharge_summary->sortUrl($view_patient_discharge_summary->PaymentCategory) == "") { ?>
		<th data-name="PaymentCategory" class="<?php echo $view_patient_discharge_summary->PaymentCategory->headerCellClass() ?>"><div id="elh_view_patient_discharge_summary_PaymentCategory" class="view_patient_discharge_summary_PaymentCategory"><div class="ew-table-header-caption"><?php echo $view_patient_discharge_summary->PaymentCategory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PaymentCategory" class="<?php echo $view_patient_discharge_summary->PaymentCategory->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_discharge_summary->SortUrl($view_patient_discharge_summary->PaymentCategory) ?>',1);"><div id="elh_view_patient_discharge_summary_PaymentCategory" class="view_patient_discharge_summary_PaymentCategory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_discharge_summary->PaymentCategory->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_discharge_summary->PaymentCategory->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_discharge_summary->PaymentCategory->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_discharge_summary->admission_date->Visible) { // admission_date ?>
	<?php if ($view_patient_discharge_summary->sortUrl($view_patient_discharge_summary->admission_date) == "") { ?>
		<th data-name="admission_date" class="<?php echo $view_patient_discharge_summary->admission_date->headerCellClass() ?>"><div id="elh_view_patient_discharge_summary_admission_date" class="view_patient_discharge_summary_admission_date"><div class="ew-table-header-caption"><?php echo $view_patient_discharge_summary->admission_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="admission_date" class="<?php echo $view_patient_discharge_summary->admission_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_discharge_summary->SortUrl($view_patient_discharge_summary->admission_date) ?>',1);"><div id="elh_view_patient_discharge_summary_admission_date" class="view_patient_discharge_summary_admission_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_discharge_summary->admission_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_discharge_summary->admission_date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_discharge_summary->admission_date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_discharge_summary->release_date->Visible) { // release_date ?>
	<?php if ($view_patient_discharge_summary->sortUrl($view_patient_discharge_summary->release_date) == "") { ?>
		<th data-name="release_date" class="<?php echo $view_patient_discharge_summary->release_date->headerCellClass() ?>"><div id="elh_view_patient_discharge_summary_release_date" class="view_patient_discharge_summary_release_date"><div class="ew-table-header-caption"><?php echo $view_patient_discharge_summary->release_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="release_date" class="<?php echo $view_patient_discharge_summary->release_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_discharge_summary->SortUrl($view_patient_discharge_summary->release_date) ?>',1);"><div id="elh_view_patient_discharge_summary_release_date" class="view_patient_discharge_summary_release_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_discharge_summary->release_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_discharge_summary->release_date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_discharge_summary->release_date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_discharge_summary->PaymentStatus->Visible) { // PaymentStatus ?>
	<?php if ($view_patient_discharge_summary->sortUrl($view_patient_discharge_summary->PaymentStatus) == "") { ?>
		<th data-name="PaymentStatus" class="<?php echo $view_patient_discharge_summary->PaymentStatus->headerCellClass() ?>"><div id="elh_view_patient_discharge_summary_PaymentStatus" class="view_patient_discharge_summary_PaymentStatus"><div class="ew-table-header-caption"><?php echo $view_patient_discharge_summary->PaymentStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PaymentStatus" class="<?php echo $view_patient_discharge_summary->PaymentStatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_discharge_summary->SortUrl($view_patient_discharge_summary->PaymentStatus) ?>',1);"><div id="elh_view_patient_discharge_summary_PaymentStatus" class="view_patient_discharge_summary_PaymentStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_discharge_summary->PaymentStatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_discharge_summary->PaymentStatus->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_discharge_summary->PaymentStatus->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_discharge_summary->HospID->Visible) { // HospID ?>
	<?php if ($view_patient_discharge_summary->sortUrl($view_patient_discharge_summary->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_patient_discharge_summary->HospID->headerCellClass() ?>"><div id="elh_view_patient_discharge_summary_HospID" class="view_patient_discharge_summary_HospID"><div class="ew-table-header-caption"><?php echo $view_patient_discharge_summary->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_patient_discharge_summary->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_discharge_summary->SortUrl($view_patient_discharge_summary->HospID) ?>',1);"><div id="elh_view_patient_discharge_summary_HospID" class="view_patient_discharge_summary_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_discharge_summary->HospID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_discharge_summary->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_discharge_summary->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_discharge_summary->AdviceToOtherHospital->Visible) { // AdviceToOtherHospital ?>
	<?php if ($view_patient_discharge_summary->sortUrl($view_patient_discharge_summary->AdviceToOtherHospital) == "") { ?>
		<th data-name="AdviceToOtherHospital" class="<?php echo $view_patient_discharge_summary->AdviceToOtherHospital->headerCellClass() ?>"><div id="elh_view_patient_discharge_summary_AdviceToOtherHospital" class="view_patient_discharge_summary_AdviceToOtherHospital"><div class="ew-table-header-caption"><?php echo $view_patient_discharge_summary->AdviceToOtherHospital->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AdviceToOtherHospital" class="<?php echo $view_patient_discharge_summary->AdviceToOtherHospital->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_discharge_summary->SortUrl($view_patient_discharge_summary->AdviceToOtherHospital) ?>',1);"><div id="elh_view_patient_discharge_summary_AdviceToOtherHospital" class="view_patient_discharge_summary_AdviceToOtherHospital">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_discharge_summary->AdviceToOtherHospital->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_discharge_summary->AdviceToOtherHospital->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_discharge_summary->AdviceToOtherHospital->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_discharge_summary->ReferedByDr->Visible) { // ReferedByDr ?>
	<?php if ($view_patient_discharge_summary->sortUrl($view_patient_discharge_summary->ReferedByDr) == "") { ?>
		<th data-name="ReferedByDr" class="<?php echo $view_patient_discharge_summary->ReferedByDr->headerCellClass() ?>"><div id="elh_view_patient_discharge_summary_ReferedByDr" class="view_patient_discharge_summary_ReferedByDr"><div class="ew-table-header-caption"><?php echo $view_patient_discharge_summary->ReferedByDr->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReferedByDr" class="<?php echo $view_patient_discharge_summary->ReferedByDr->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_discharge_summary->SortUrl($view_patient_discharge_summary->ReferedByDr) ?>',1);"><div id="elh_view_patient_discharge_summary_ReferedByDr" class="view_patient_discharge_summary_ReferedByDr">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_discharge_summary->ReferedByDr->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_patient_discharge_summary->ReferedByDr->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_discharge_summary->ReferedByDr->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_patient_discharge_summary->vid->Visible) { // vid ?>
	<?php if ($view_patient_discharge_summary->sortUrl($view_patient_discharge_summary->vid) == "") { ?>
		<th data-name="vid" class="<?php echo $view_patient_discharge_summary->vid->headerCellClass() ?>"><div id="elh_view_patient_discharge_summary_vid" class="view_patient_discharge_summary_vid"><div class="ew-table-header-caption"><?php echo $view_patient_discharge_summary->vid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="vid" class="<?php echo $view_patient_discharge_summary->vid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_patient_discharge_summary->SortUrl($view_patient_discharge_summary->vid) ?>',1);"><div id="elh_view_patient_discharge_summary_vid" class="view_patient_discharge_summary_vid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_patient_discharge_summary->vid->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_patient_discharge_summary->vid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_patient_discharge_summary->vid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_patient_discharge_summary_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_patient_discharge_summary->ExportAll && $view_patient_discharge_summary->isExport()) {
	$view_patient_discharge_summary_list->StopRec = $view_patient_discharge_summary_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_patient_discharge_summary_list->TotalRecs > $view_patient_discharge_summary_list->StartRec + $view_patient_discharge_summary_list->DisplayRecs - 1)
		$view_patient_discharge_summary_list->StopRec = $view_patient_discharge_summary_list->StartRec + $view_patient_discharge_summary_list->DisplayRecs - 1;
	else
		$view_patient_discharge_summary_list->StopRec = $view_patient_discharge_summary_list->TotalRecs;
}
$view_patient_discharge_summary_list->RecCnt = $view_patient_discharge_summary_list->StartRec - 1;
if ($view_patient_discharge_summary_list->Recordset && !$view_patient_discharge_summary_list->Recordset->EOF) {
	$view_patient_discharge_summary_list->Recordset->moveFirst();
	$selectLimit = $view_patient_discharge_summary_list->UseSelectLimit;
	if (!$selectLimit && $view_patient_discharge_summary_list->StartRec > 1)
		$view_patient_discharge_summary_list->Recordset->move($view_patient_discharge_summary_list->StartRec - 1);
} elseif (!$view_patient_discharge_summary->AllowAddDeleteRow && $view_patient_discharge_summary_list->StopRec == 0) {
	$view_patient_discharge_summary_list->StopRec = $view_patient_discharge_summary->GridAddRowCount;
}

// Initialize aggregate
$view_patient_discharge_summary->RowType = ROWTYPE_AGGREGATEINIT;
$view_patient_discharge_summary->resetAttributes();
$view_patient_discharge_summary_list->renderRow();
while ($view_patient_discharge_summary_list->RecCnt < $view_patient_discharge_summary_list->StopRec) {
	$view_patient_discharge_summary_list->RecCnt++;
	if ($view_patient_discharge_summary_list->RecCnt >= $view_patient_discharge_summary_list->StartRec) {
		$view_patient_discharge_summary_list->RowCnt++;

		// Set up key count
		$view_patient_discharge_summary_list->KeyCount = $view_patient_discharge_summary_list->RowIndex;

		// Init row class and style
		$view_patient_discharge_summary->resetAttributes();
		$view_patient_discharge_summary->CssClass = "";
		if ($view_patient_discharge_summary->isGridAdd()) {
		} else {
			$view_patient_discharge_summary_list->loadRowValues($view_patient_discharge_summary_list->Recordset); // Load row values
		}
		$view_patient_discharge_summary->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_patient_discharge_summary->RowAttrs = array_merge($view_patient_discharge_summary->RowAttrs, array('data-rowindex'=>$view_patient_discharge_summary_list->RowCnt, 'id'=>'r' . $view_patient_discharge_summary_list->RowCnt . '_view_patient_discharge_summary', 'data-rowtype'=>$view_patient_discharge_summary->RowType));

		// Render row
		$view_patient_discharge_summary_list->renderRow();

		// Render list options
		$view_patient_discharge_summary_list->renderListOptions();
?>
	<tr<?php echo $view_patient_discharge_summary->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_patient_discharge_summary_list->ListOptions->render("body", "left", $view_patient_discharge_summary_list->RowCnt);
?>
	<?php if ($view_patient_discharge_summary->id->Visible) { // id ?>
		<td data-name="id"<?php echo $view_patient_discharge_summary->id->cellAttributes() ?>>
<span id="el<?php echo $view_patient_discharge_summary_list->RowCnt ?>_view_patient_discharge_summary_id" class="view_patient_discharge_summary_id">
<span<?php echo $view_patient_discharge_summary->id->viewAttributes() ?>>
<?php echo $view_patient_discharge_summary->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_discharge_summary->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID"<?php echo $view_patient_discharge_summary->PatientID->cellAttributes() ?>>
<span id="el<?php echo $view_patient_discharge_summary_list->RowCnt ?>_view_patient_discharge_summary_PatientID" class="view_patient_discharge_summary_PatientID">
<span<?php echo $view_patient_discharge_summary->PatientID->viewAttributes() ?>>
<?php if ((!EmptyString($view_patient_discharge_summary->PatientID->getViewValue())) && $view_patient_discharge_summary->PatientID->linkAttributes() <> "") { ?>
<a<?php echo $view_patient_discharge_summary->PatientID->linkAttributes() ?>><?php echo $view_patient_discharge_summary->PatientID->getViewValue() ?></a>
<?php } else { ?>
<?php echo $view_patient_discharge_summary->PatientID->getViewValue() ?>
<?php } ?>
</span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_discharge_summary->patient_name->Visible) { // patient_name ?>
		<td data-name="patient_name"<?php echo $view_patient_discharge_summary->patient_name->cellAttributes() ?>>
<span id="el<?php echo $view_patient_discharge_summary_list->RowCnt ?>_view_patient_discharge_summary_patient_name" class="view_patient_discharge_summary_patient_name">
<span<?php echo $view_patient_discharge_summary->patient_name->viewAttributes() ?>>
<?php echo $view_patient_discharge_summary->patient_name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_discharge_summary->gender->Visible) { // gender ?>
		<td data-name="gender"<?php echo $view_patient_discharge_summary->gender->cellAttributes() ?>>
<span id="el<?php echo $view_patient_discharge_summary_list->RowCnt ?>_view_patient_discharge_summary_gender" class="view_patient_discharge_summary_gender">
<span<?php echo $view_patient_discharge_summary->gender->viewAttributes() ?>>
<?php echo $view_patient_discharge_summary->gender->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_discharge_summary->physician_id->Visible) { // physician_id ?>
		<td data-name="physician_id"<?php echo $view_patient_discharge_summary->physician_id->cellAttributes() ?>>
<span id="el<?php echo $view_patient_discharge_summary_list->RowCnt ?>_view_patient_discharge_summary_physician_id" class="view_patient_discharge_summary_physician_id">
<span<?php echo $view_patient_discharge_summary->physician_id->viewAttributes() ?>>
<?php echo $view_patient_discharge_summary->physician_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_discharge_summary->typeRegsisteration->Visible) { // typeRegsisteration ?>
		<td data-name="typeRegsisteration"<?php echo $view_patient_discharge_summary->typeRegsisteration->cellAttributes() ?>>
<span id="el<?php echo $view_patient_discharge_summary_list->RowCnt ?>_view_patient_discharge_summary_typeRegsisteration" class="view_patient_discharge_summary_typeRegsisteration">
<span<?php echo $view_patient_discharge_summary->typeRegsisteration->viewAttributes() ?>>
<?php echo $view_patient_discharge_summary->typeRegsisteration->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_discharge_summary->PaymentCategory->Visible) { // PaymentCategory ?>
		<td data-name="PaymentCategory"<?php echo $view_patient_discharge_summary->PaymentCategory->cellAttributes() ?>>
<span id="el<?php echo $view_patient_discharge_summary_list->RowCnt ?>_view_patient_discharge_summary_PaymentCategory" class="view_patient_discharge_summary_PaymentCategory">
<span<?php echo $view_patient_discharge_summary->PaymentCategory->viewAttributes() ?>>
<?php echo $view_patient_discharge_summary->PaymentCategory->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_discharge_summary->admission_date->Visible) { // admission_date ?>
		<td data-name="admission_date"<?php echo $view_patient_discharge_summary->admission_date->cellAttributes() ?>>
<span id="el<?php echo $view_patient_discharge_summary_list->RowCnt ?>_view_patient_discharge_summary_admission_date" class="view_patient_discharge_summary_admission_date">
<span<?php echo $view_patient_discharge_summary->admission_date->viewAttributes() ?>>
<?php echo $view_patient_discharge_summary->admission_date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_discharge_summary->release_date->Visible) { // release_date ?>
		<td data-name="release_date"<?php echo $view_patient_discharge_summary->release_date->cellAttributes() ?>>
<span id="el<?php echo $view_patient_discharge_summary_list->RowCnt ?>_view_patient_discharge_summary_release_date" class="view_patient_discharge_summary_release_date">
<span<?php echo $view_patient_discharge_summary->release_date->viewAttributes() ?>>
<?php echo $view_patient_discharge_summary->release_date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_discharge_summary->PaymentStatus->Visible) { // PaymentStatus ?>
		<td data-name="PaymentStatus"<?php echo $view_patient_discharge_summary->PaymentStatus->cellAttributes() ?>>
<span id="el<?php echo $view_patient_discharge_summary_list->RowCnt ?>_view_patient_discharge_summary_PaymentStatus" class="view_patient_discharge_summary_PaymentStatus">
<span<?php echo $view_patient_discharge_summary->PaymentStatus->viewAttributes() ?>>
<?php echo $view_patient_discharge_summary->PaymentStatus->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_discharge_summary->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_patient_discharge_summary->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_patient_discharge_summary_list->RowCnt ?>_view_patient_discharge_summary_HospID" class="view_patient_discharge_summary_HospID">
<span<?php echo $view_patient_discharge_summary->HospID->viewAttributes() ?>>
<?php echo $view_patient_discharge_summary->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_discharge_summary->AdviceToOtherHospital->Visible) { // AdviceToOtherHospital ?>
		<td data-name="AdviceToOtherHospital"<?php echo $view_patient_discharge_summary->AdviceToOtherHospital->cellAttributes() ?>>
<span id="el<?php echo $view_patient_discharge_summary_list->RowCnt ?>_view_patient_discharge_summary_AdviceToOtherHospital" class="view_patient_discharge_summary_AdviceToOtherHospital">
<span<?php echo $view_patient_discharge_summary->AdviceToOtherHospital->viewAttributes() ?>>
<?php echo $view_patient_discharge_summary->AdviceToOtherHospital->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_discharge_summary->ReferedByDr->Visible) { // ReferedByDr ?>
		<td data-name="ReferedByDr"<?php echo $view_patient_discharge_summary->ReferedByDr->cellAttributes() ?>>
<span id="el<?php echo $view_patient_discharge_summary_list->RowCnt ?>_view_patient_discharge_summary_ReferedByDr" class="view_patient_discharge_summary_ReferedByDr">
<span<?php echo $view_patient_discharge_summary->ReferedByDr->viewAttributes() ?>>
<?php echo $view_patient_discharge_summary->ReferedByDr->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_patient_discharge_summary->vid->Visible) { // vid ?>
		<td data-name="vid"<?php echo $view_patient_discharge_summary->vid->cellAttributes() ?>>
<span id="el<?php echo $view_patient_discharge_summary_list->RowCnt ?>_view_patient_discharge_summary_vid" class="view_patient_discharge_summary_vid">
<span<?php echo $view_patient_discharge_summary->vid->viewAttributes() ?>>
<?php echo $view_patient_discharge_summary->vid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_patient_discharge_summary_list->ListOptions->render("body", "right", $view_patient_discharge_summary_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_patient_discharge_summary->isGridAdd())
		$view_patient_discharge_summary_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_patient_discharge_summary->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_patient_discharge_summary_list->Recordset)
	$view_patient_discharge_summary_list->Recordset->Close();
?>
<?php if (!$view_patient_discharge_summary->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_patient_discharge_summary->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_patient_discharge_summary_list->Pager)) $view_patient_discharge_summary_list->Pager = new NumericPager($view_patient_discharge_summary_list->StartRec, $view_patient_discharge_summary_list->DisplayRecs, $view_patient_discharge_summary_list->TotalRecs, $view_patient_discharge_summary_list->RecRange, $view_patient_discharge_summary_list->AutoHidePager) ?>
<?php if ($view_patient_discharge_summary_list->Pager->RecordCount > 0 && $view_patient_discharge_summary_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_patient_discharge_summary_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_patient_discharge_summary_list->pageUrl() ?>start=<?php echo $view_patient_discharge_summary_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_patient_discharge_summary_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_patient_discharge_summary_list->pageUrl() ?>start=<?php echo $view_patient_discharge_summary_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_patient_discharge_summary_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_patient_discharge_summary_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_patient_discharge_summary_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_patient_discharge_summary_list->pageUrl() ?>start=<?php echo $view_patient_discharge_summary_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_patient_discharge_summary_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_patient_discharge_summary_list->pageUrl() ?>start=<?php echo $view_patient_discharge_summary_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_patient_discharge_summary_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_patient_discharge_summary_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_patient_discharge_summary_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_patient_discharge_summary_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_patient_discharge_summary_list->TotalRecs > 0 && (!$view_patient_discharge_summary_list->AutoHidePageSizeSelector || $view_patient_discharge_summary_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_patient_discharge_summary">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_patient_discharge_summary_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_patient_discharge_summary_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_patient_discharge_summary_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_patient_discharge_summary_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_patient_discharge_summary_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_patient_discharge_summary_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_patient_discharge_summary->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_patient_discharge_summary_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_patient_discharge_summary_list->TotalRecs == 0 && !$view_patient_discharge_summary->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_patient_discharge_summary_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_patient_discharge_summary_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_patient_discharge_summary->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_patient_discharge_summary->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_patient_discharge_summary", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_patient_discharge_summary_list->terminate();
?>