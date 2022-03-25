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
$view_ip_admission_list = new view_ip_admission_list();

// Run the page
$view_ip_admission_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_ip_admission_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_ip_admission->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_ip_admissionlist = currentForm = new ew.Form("fview_ip_admissionlist", "list");
fview_ip_admissionlist.formKeyCountName = '<?php echo $view_ip_admission_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_ip_admissionlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_ip_admissionlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fview_ip_admissionlistsrch = currentSearchForm = new ew.Form("fview_ip_admissionlistsrch");

// Validate function for search
fview_ip_admissionlistsrch.validate = function(fobj) {
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
fview_ip_admissionlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_ip_admissionlistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

fview_ip_admissionlistsrch.filterList = <?php echo $view_ip_admission_list->getFilterList() ?>;
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
<?php if (!$view_ip_admission->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_ip_admission_list->TotalRecs > 0 && $view_ip_admission_list->ExportOptions->visible()) { ?>
<?php $view_ip_admission_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_ip_admission_list->ImportOptions->visible()) { ?>
<?php $view_ip_admission_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_ip_admission_list->SearchOptions->visible()) { ?>
<?php $view_ip_admission_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_ip_admission_list->FilterOptions->visible()) { ?>
<?php $view_ip_admission_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_ip_admission_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_ip_admission->isExport() && !$view_ip_admission->CurrentAction) { ?>
<form name="fview_ip_admissionlistsrch" id="fview_ip_admissionlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_ip_admission_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_ip_admissionlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_ip_admission">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$view_ip_admission_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$view_ip_admission->RowType = ROWTYPE_SEARCH;

// Render row
$view_ip_admission->resetAttributes();
$view_ip_admission_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($view_ip_admission->mrnNo->Visible) { // mrnNo ?>
	<div id="xsc_mrnNo" class="ew-cell form-group">
		<label for="x_mrnNo" class="ew-search-caption ew-label"><?php echo $view_ip_admission->mrnNo->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_mrnNo" id="z_mrnNo" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_ip_admission" data-field="x_mrnNo" name="x_mrnNo" id="x_mrnNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_admission->mrnNo->getPlaceHolder()) ?>" value="<?php echo $view_ip_admission->mrnNo->EditValue ?>"<?php echo $view_ip_admission->mrnNo->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($view_ip_admission->patient_name->Visible) { // patient_name ?>
	<div id="xsc_patient_name" class="ew-cell form-group">
		<label for="x_patient_name" class="ew-search-caption ew-label"><?php echo $view_ip_admission->patient_name->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_patient_name" id="z_patient_name" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_ip_admission" data-field="x_patient_name" name="x_patient_name" id="x_patient_name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_admission->patient_name->getPlaceHolder()) ?>" value="<?php echo $view_ip_admission->patient_name->EditValue ?>"<?php echo $view_ip_admission->patient_name->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($view_ip_admission->PatientID->Visible) { // PatientID ?>
	<div id="xsc_PatientID" class="ew-cell form-group">
		<label for="x_PatientID" class="ew-search-caption ew-label"><?php echo $view_ip_admission->PatientID->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientID" id="z_PatientID" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_ip_admission" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_admission->PatientID->getPlaceHolder()) ?>" value="<?php echo $view_ip_admission->PatientID->EditValue ?>"<?php echo $view_ip_admission->PatientID->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($view_ip_admission->mobileno->Visible) { // mobileno ?>
	<div id="xsc_mobileno" class="ew-cell form-group">
		<label for="x_mobileno" class="ew-search-caption ew-label"><?php echo $view_ip_admission->mobileno->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_mobileno" id="z_mobileno" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_ip_admission" data-field="x_mobileno" name="x_mobileno" id="x_mobileno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_admission->mobileno->getPlaceHolder()) ?>" value="<?php echo $view_ip_admission->mobileno->EditValue ?>"<?php echo $view_ip_admission->mobileno->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_ip_admission_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_ip_admission_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_ip_admission_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_ip_admission_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_ip_admission_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_ip_admission_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_ip_admission_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_ip_admission_list->showPageHeader(); ?>
<?php
$view_ip_admission_list->showMessage();
?>
<?php if ($view_ip_admission_list->TotalRecs > 0 || $view_ip_admission->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_ip_admission_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_ip_admission">
<?php if (!$view_ip_admission->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_ip_admission->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_ip_admission_list->Pager)) $view_ip_admission_list->Pager = new NumericPager($view_ip_admission_list->StartRec, $view_ip_admission_list->DisplayRecs, $view_ip_admission_list->TotalRecs, $view_ip_admission_list->RecRange, $view_ip_admission_list->AutoHidePager) ?>
<?php if ($view_ip_admission_list->Pager->RecordCount > 0 && $view_ip_admission_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_ip_admission_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ip_admission_list->pageUrl() ?>start=<?php echo $view_ip_admission_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_ip_admission_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ip_admission_list->pageUrl() ?>start=<?php echo $view_ip_admission_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_ip_admission_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_ip_admission_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_ip_admission_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ip_admission_list->pageUrl() ?>start=<?php echo $view_ip_admission_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_ip_admission_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ip_admission_list->pageUrl() ?>start=<?php echo $view_ip_admission_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_ip_admission_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_ip_admission_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_ip_admission_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_ip_admission_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_ip_admission_list->TotalRecs > 0 && (!$view_ip_admission_list->AutoHidePageSizeSelector || $view_ip_admission_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_ip_admission">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_ip_admission_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_ip_admission_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_ip_admission_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_ip_admission_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_ip_admission_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_ip_admission_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_ip_admission->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_ip_admission_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_ip_admissionlist" id="fview_ip_admissionlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_ip_admission_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_ip_admission_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_ip_admission">
<div id="gmp_view_ip_admission" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_ip_admission_list->TotalRecs > 0 || $view_ip_admission->isGridEdit()) { ?>
<table id="tbl_view_ip_admissionlist" class="table ew-table d-none"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_ip_admission_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_ip_admission_list->renderListOptions();

// Render list options (header, left)
$view_ip_admission_list->ListOptions->render("header", "left", "", "block", $view_ip_admission->TableVar, "view_ip_admissionlist");
?>
<?php if ($view_ip_admission->id->Visible) { // id ?>
	<?php if ($view_ip_admission->sortUrl($view_ip_admission->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_ip_admission->id->headerCellClass() ?>"><div id="elh_view_ip_admission_id" class="view_ip_admission_id"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_id" class="view_ip_admissionlist" type="text/html"><span><?php echo $view_ip_admission->id->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_ip_admission->id->headerCellClass() ?>"><script id="tpc_view_ip_admission_id" class="view_ip_admissionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission->SortUrl($view_ip_admission->id) ?>',1);"><div id="elh_view_ip_admission_id" class="view_ip_admission_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission->mrnNo->Visible) { // mrnNo ?>
	<?php if ($view_ip_admission->sortUrl($view_ip_admission->mrnNo) == "") { ?>
		<th data-name="mrnNo" class="<?php echo $view_ip_admission->mrnNo->headerCellClass() ?>"><div id="elh_view_ip_admission_mrnNo" class="view_ip_admission_mrnNo"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_mrnNo" class="view_ip_admissionlist" type="text/html"><span><?php echo $view_ip_admission->mrnNo->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="mrnNo" class="<?php echo $view_ip_admission->mrnNo->headerCellClass() ?>"><script id="tpc_view_ip_admission_mrnNo" class="view_ip_admissionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission->SortUrl($view_ip_admission->mrnNo) ?>',1);"><div id="elh_view_ip_admission_mrnNo" class="view_ip_admission_mrnNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission->mrnNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission->mrnNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission->mrnNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission->patient_id->Visible) { // patient_id ?>
	<?php if ($view_ip_admission->sortUrl($view_ip_admission->patient_id) == "") { ?>
		<th data-name="patient_id" class="<?php echo $view_ip_admission->patient_id->headerCellClass() ?>"><div id="elh_view_ip_admission_patient_id" class="view_ip_admission_patient_id"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_patient_id" class="view_ip_admissionlist" type="text/html"><span><?php echo $view_ip_admission->patient_id->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="patient_id" class="<?php echo $view_ip_admission->patient_id->headerCellClass() ?>"><script id="tpc_view_ip_admission_patient_id" class="view_ip_admissionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission->SortUrl($view_ip_admission->patient_id) ?>',1);"><div id="elh_view_ip_admission_patient_id" class="view_ip_admission_patient_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission->patient_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission->patient_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission->patient_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission->patient_name->Visible) { // patient_name ?>
	<?php if ($view_ip_admission->sortUrl($view_ip_admission->patient_name) == "") { ?>
		<th data-name="patient_name" class="<?php echo $view_ip_admission->patient_name->headerCellClass() ?>"><div id="elh_view_ip_admission_patient_name" class="view_ip_admission_patient_name"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_patient_name" class="view_ip_admissionlist" type="text/html"><span><?php echo $view_ip_admission->patient_name->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="patient_name" class="<?php echo $view_ip_admission->patient_name->headerCellClass() ?>"><script id="tpc_view_ip_admission_patient_name" class="view_ip_admissionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission->SortUrl($view_ip_admission->patient_name) ?>',1);"><div id="elh_view_ip_admission_patient_name" class="view_ip_admission_patient_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission->patient_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission->patient_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission->patient_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission->gender->Visible) { // gender ?>
	<?php if ($view_ip_admission->sortUrl($view_ip_admission->gender) == "") { ?>
		<th data-name="gender" class="<?php echo $view_ip_admission->gender->headerCellClass() ?>"><div id="elh_view_ip_admission_gender" class="view_ip_admission_gender"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_gender" class="view_ip_admissionlist" type="text/html"><span><?php echo $view_ip_admission->gender->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="gender" class="<?php echo $view_ip_admission->gender->headerCellClass() ?>"><script id="tpc_view_ip_admission_gender" class="view_ip_admissionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission->SortUrl($view_ip_admission->gender) ?>',1);"><div id="elh_view_ip_admission_gender" class="view_ip_admission_gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission->gender->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission->gender->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission->gender->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission->age->Visible) { // age ?>
	<?php if ($view_ip_admission->sortUrl($view_ip_admission->age) == "") { ?>
		<th data-name="age" class="<?php echo $view_ip_admission->age->headerCellClass() ?>"><div id="elh_view_ip_admission_age" class="view_ip_admission_age"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_age" class="view_ip_admissionlist" type="text/html"><span><?php echo $view_ip_admission->age->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="age" class="<?php echo $view_ip_admission->age->headerCellClass() ?>"><script id="tpc_view_ip_admission_age" class="view_ip_admissionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission->SortUrl($view_ip_admission->age) ?>',1);"><div id="elh_view_ip_admission_age" class="view_ip_admission_age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission->age->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission->age->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission->age->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission->physician_id->Visible) { // physician_id ?>
	<?php if ($view_ip_admission->sortUrl($view_ip_admission->physician_id) == "") { ?>
		<th data-name="physician_id" class="<?php echo $view_ip_admission->physician_id->headerCellClass() ?>"><div id="elh_view_ip_admission_physician_id" class="view_ip_admission_physician_id"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_physician_id" class="view_ip_admissionlist" type="text/html"><span><?php echo $view_ip_admission->physician_id->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="physician_id" class="<?php echo $view_ip_admission->physician_id->headerCellClass() ?>"><script id="tpc_view_ip_admission_physician_id" class="view_ip_admissionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission->SortUrl($view_ip_admission->physician_id) ?>',1);"><div id="elh_view_ip_admission_physician_id" class="view_ip_admission_physician_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission->physician_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission->physician_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission->physician_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission->typeRegsisteration->Visible) { // typeRegsisteration ?>
	<?php if ($view_ip_admission->sortUrl($view_ip_admission->typeRegsisteration) == "") { ?>
		<th data-name="typeRegsisteration" class="<?php echo $view_ip_admission->typeRegsisteration->headerCellClass() ?>"><div id="elh_view_ip_admission_typeRegsisteration" class="view_ip_admission_typeRegsisteration"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_typeRegsisteration" class="view_ip_admissionlist" type="text/html"><span><?php echo $view_ip_admission->typeRegsisteration->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="typeRegsisteration" class="<?php echo $view_ip_admission->typeRegsisteration->headerCellClass() ?>"><script id="tpc_view_ip_admission_typeRegsisteration" class="view_ip_admissionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission->SortUrl($view_ip_admission->typeRegsisteration) ?>',1);"><div id="elh_view_ip_admission_typeRegsisteration" class="view_ip_admission_typeRegsisteration">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission->typeRegsisteration->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission->typeRegsisteration->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission->typeRegsisteration->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission->PaymentCategory->Visible) { // PaymentCategory ?>
	<?php if ($view_ip_admission->sortUrl($view_ip_admission->PaymentCategory) == "") { ?>
		<th data-name="PaymentCategory" class="<?php echo $view_ip_admission->PaymentCategory->headerCellClass() ?>"><div id="elh_view_ip_admission_PaymentCategory" class="view_ip_admission_PaymentCategory"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_PaymentCategory" class="view_ip_admissionlist" type="text/html"><span><?php echo $view_ip_admission->PaymentCategory->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="PaymentCategory" class="<?php echo $view_ip_admission->PaymentCategory->headerCellClass() ?>"><script id="tpc_view_ip_admission_PaymentCategory" class="view_ip_admissionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission->SortUrl($view_ip_admission->PaymentCategory) ?>',1);"><div id="elh_view_ip_admission_PaymentCategory" class="view_ip_admission_PaymentCategory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission->PaymentCategory->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission->PaymentCategory->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission->PaymentCategory->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission->admission_consultant_id->Visible) { // admission_consultant_id ?>
	<?php if ($view_ip_admission->sortUrl($view_ip_admission->admission_consultant_id) == "") { ?>
		<th data-name="admission_consultant_id" class="<?php echo $view_ip_admission->admission_consultant_id->headerCellClass() ?>"><div id="elh_view_ip_admission_admission_consultant_id" class="view_ip_admission_admission_consultant_id"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_admission_consultant_id" class="view_ip_admissionlist" type="text/html"><span><?php echo $view_ip_admission->admission_consultant_id->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="admission_consultant_id" class="<?php echo $view_ip_admission->admission_consultant_id->headerCellClass() ?>"><script id="tpc_view_ip_admission_admission_consultant_id" class="view_ip_admissionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission->SortUrl($view_ip_admission->admission_consultant_id) ?>',1);"><div id="elh_view_ip_admission_admission_consultant_id" class="view_ip_admission_admission_consultant_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission->admission_consultant_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission->admission_consultant_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission->admission_consultant_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission->leading_consultant_id->Visible) { // leading_consultant_id ?>
	<?php if ($view_ip_admission->sortUrl($view_ip_admission->leading_consultant_id) == "") { ?>
		<th data-name="leading_consultant_id" class="<?php echo $view_ip_admission->leading_consultant_id->headerCellClass() ?>"><div id="elh_view_ip_admission_leading_consultant_id" class="view_ip_admission_leading_consultant_id"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_leading_consultant_id" class="view_ip_admissionlist" type="text/html"><span><?php echo $view_ip_admission->leading_consultant_id->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="leading_consultant_id" class="<?php echo $view_ip_admission->leading_consultant_id->headerCellClass() ?>"><script id="tpc_view_ip_admission_leading_consultant_id" class="view_ip_admissionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission->SortUrl($view_ip_admission->leading_consultant_id) ?>',1);"><div id="elh_view_ip_admission_leading_consultant_id" class="view_ip_admission_leading_consultant_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission->leading_consultant_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission->leading_consultant_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission->leading_consultant_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission->admission_date->Visible) { // admission_date ?>
	<?php if ($view_ip_admission->sortUrl($view_ip_admission->admission_date) == "") { ?>
		<th data-name="admission_date" class="<?php echo $view_ip_admission->admission_date->headerCellClass() ?>"><div id="elh_view_ip_admission_admission_date" class="view_ip_admission_admission_date"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_admission_date" class="view_ip_admissionlist" type="text/html"><span><?php echo $view_ip_admission->admission_date->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="admission_date" class="<?php echo $view_ip_admission->admission_date->headerCellClass() ?>"><script id="tpc_view_ip_admission_admission_date" class="view_ip_admissionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission->SortUrl($view_ip_admission->admission_date) ?>',1);"><div id="elh_view_ip_admission_admission_date" class="view_ip_admission_admission_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission->admission_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission->admission_date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission->admission_date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission->release_date->Visible) { // release_date ?>
	<?php if ($view_ip_admission->sortUrl($view_ip_admission->release_date) == "") { ?>
		<th data-name="release_date" class="<?php echo $view_ip_admission->release_date->headerCellClass() ?>"><div id="elh_view_ip_admission_release_date" class="view_ip_admission_release_date"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_release_date" class="view_ip_admissionlist" type="text/html"><span><?php echo $view_ip_admission->release_date->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="release_date" class="<?php echo $view_ip_admission->release_date->headerCellClass() ?>"><script id="tpc_view_ip_admission_release_date" class="view_ip_admissionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission->SortUrl($view_ip_admission->release_date) ?>',1);"><div id="elh_view_ip_admission_release_date" class="view_ip_admission_release_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission->release_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission->release_date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission->release_date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission->PaymentStatus->Visible) { // PaymentStatus ?>
	<?php if ($view_ip_admission->sortUrl($view_ip_admission->PaymentStatus) == "") { ?>
		<th data-name="PaymentStatus" class="<?php echo $view_ip_admission->PaymentStatus->headerCellClass() ?>"><div id="elh_view_ip_admission_PaymentStatus" class="view_ip_admission_PaymentStatus"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_PaymentStatus" class="view_ip_admissionlist" type="text/html"><span><?php echo $view_ip_admission->PaymentStatus->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="PaymentStatus" class="<?php echo $view_ip_admission->PaymentStatus->headerCellClass() ?>"><script id="tpc_view_ip_admission_PaymentStatus" class="view_ip_admissionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission->SortUrl($view_ip_admission->PaymentStatus) ?>',1);"><div id="elh_view_ip_admission_PaymentStatus" class="view_ip_admission_PaymentStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission->PaymentStatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission->PaymentStatus->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission->PaymentStatus->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission->status->Visible) { // status ?>
	<?php if ($view_ip_admission->sortUrl($view_ip_admission->status) == "") { ?>
		<th data-name="status" class="<?php echo $view_ip_admission->status->headerCellClass() ?>"><div id="elh_view_ip_admission_status" class="view_ip_admission_status"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_status" class="view_ip_admissionlist" type="text/html"><span><?php echo $view_ip_admission->status->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $view_ip_admission->status->headerCellClass() ?>"><script id="tpc_view_ip_admission_status" class="view_ip_admissionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission->SortUrl($view_ip_admission->status) ?>',1);"><div id="elh_view_ip_admission_status" class="view_ip_admission_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission->createdby->Visible) { // createdby ?>
	<?php if ($view_ip_admission->sortUrl($view_ip_admission->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $view_ip_admission->createdby->headerCellClass() ?>"><div id="elh_view_ip_admission_createdby" class="view_ip_admission_createdby"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_createdby" class="view_ip_admissionlist" type="text/html"><span><?php echo $view_ip_admission->createdby->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $view_ip_admission->createdby->headerCellClass() ?>"><script id="tpc_view_ip_admission_createdby" class="view_ip_admissionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission->SortUrl($view_ip_admission->createdby) ?>',1);"><div id="elh_view_ip_admission_createdby" class="view_ip_admission_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_ip_admission->sortUrl($view_ip_admission->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_ip_admission->createddatetime->headerCellClass() ?>"><div id="elh_view_ip_admission_createddatetime" class="view_ip_admission_createddatetime"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_createddatetime" class="view_ip_admissionlist" type="text/html"><span><?php echo $view_ip_admission->createddatetime->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_ip_admission->createddatetime->headerCellClass() ?>"><script id="tpc_view_ip_admission_createddatetime" class="view_ip_admissionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission->SortUrl($view_ip_admission->createddatetime) ?>',1);"><div id="elh_view_ip_admission_createddatetime" class="view_ip_admission_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission->modifiedby->Visible) { // modifiedby ?>
	<?php if ($view_ip_admission->sortUrl($view_ip_admission->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $view_ip_admission->modifiedby->headerCellClass() ?>"><div id="elh_view_ip_admission_modifiedby" class="view_ip_admission_modifiedby"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_modifiedby" class="view_ip_admissionlist" type="text/html"><span><?php echo $view_ip_admission->modifiedby->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $view_ip_admission->modifiedby->headerCellClass() ?>"><script id="tpc_view_ip_admission_modifiedby" class="view_ip_admissionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission->SortUrl($view_ip_admission->modifiedby) ?>',1);"><div id="elh_view_ip_admission_modifiedby" class="view_ip_admission_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($view_ip_admission->sortUrl($view_ip_admission->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_ip_admission->modifieddatetime->headerCellClass() ?>"><div id="elh_view_ip_admission_modifieddatetime" class="view_ip_admission_modifieddatetime"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_modifieddatetime" class="view_ip_admissionlist" type="text/html"><span><?php echo $view_ip_admission->modifieddatetime->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_ip_admission->modifieddatetime->headerCellClass() ?>"><script id="tpc_view_ip_admission_modifieddatetime" class="view_ip_admissionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission->SortUrl($view_ip_admission->modifieddatetime) ?>',1);"><div id="elh_view_ip_admission_modifieddatetime" class="view_ip_admission_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission->PatientID->Visible) { // PatientID ?>
	<?php if ($view_ip_admission->sortUrl($view_ip_admission->PatientID) == "") { ?>
		<th data-name="PatientID" class="<?php echo $view_ip_admission->PatientID->headerCellClass() ?>"><div id="elh_view_ip_admission_PatientID" class="view_ip_admission_PatientID"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_PatientID" class="view_ip_admissionlist" type="text/html"><span><?php echo $view_ip_admission->PatientID->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="PatientID" class="<?php echo $view_ip_admission->PatientID->headerCellClass() ?>"><script id="tpc_view_ip_admission_PatientID" class="view_ip_admissionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission->SortUrl($view_ip_admission->PatientID) ?>',1);"><div id="elh_view_ip_admission_PatientID" class="view_ip_admission_PatientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission->PatientID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission->PatientID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission->PatientID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission->HospID->Visible) { // HospID ?>
	<?php if ($view_ip_admission->sortUrl($view_ip_admission->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_ip_admission->HospID->headerCellClass() ?>"><div id="elh_view_ip_admission_HospID" class="view_ip_admission_HospID"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_HospID" class="view_ip_admissionlist" type="text/html"><span><?php echo $view_ip_admission->HospID->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_ip_admission->HospID->headerCellClass() ?>"><script id="tpc_view_ip_admission_HospID" class="view_ip_admissionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission->SortUrl($view_ip_admission->HospID) ?>',1);"><div id="elh_view_ip_admission_HospID" class="view_ip_admission_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission->HospID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission->ReferedByDr->Visible) { // ReferedByDr ?>
	<?php if ($view_ip_admission->sortUrl($view_ip_admission->ReferedByDr) == "") { ?>
		<th data-name="ReferedByDr" class="<?php echo $view_ip_admission->ReferedByDr->headerCellClass() ?>"><div id="elh_view_ip_admission_ReferedByDr" class="view_ip_admission_ReferedByDr"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_ReferedByDr" class="view_ip_admissionlist" type="text/html"><span><?php echo $view_ip_admission->ReferedByDr->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="ReferedByDr" class="<?php echo $view_ip_admission->ReferedByDr->headerCellClass() ?>"><script id="tpc_view_ip_admission_ReferedByDr" class="view_ip_admissionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission->SortUrl($view_ip_admission->ReferedByDr) ?>',1);"><div id="elh_view_ip_admission_ReferedByDr" class="view_ip_admission_ReferedByDr">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission->ReferedByDr->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission->ReferedByDr->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission->ReferedByDr->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission->ReferClinicname->Visible) { // ReferClinicname ?>
	<?php if ($view_ip_admission->sortUrl($view_ip_admission->ReferClinicname) == "") { ?>
		<th data-name="ReferClinicname" class="<?php echo $view_ip_admission->ReferClinicname->headerCellClass() ?>"><div id="elh_view_ip_admission_ReferClinicname" class="view_ip_admission_ReferClinicname"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_ReferClinicname" class="view_ip_admissionlist" type="text/html"><span><?php echo $view_ip_admission->ReferClinicname->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="ReferClinicname" class="<?php echo $view_ip_admission->ReferClinicname->headerCellClass() ?>"><script id="tpc_view_ip_admission_ReferClinicname" class="view_ip_admissionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission->SortUrl($view_ip_admission->ReferClinicname) ?>',1);"><div id="elh_view_ip_admission_ReferClinicname" class="view_ip_admission_ReferClinicname">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission->ReferClinicname->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission->ReferClinicname->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission->ReferClinicname->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission->ReferCity->Visible) { // ReferCity ?>
	<?php if ($view_ip_admission->sortUrl($view_ip_admission->ReferCity) == "") { ?>
		<th data-name="ReferCity" class="<?php echo $view_ip_admission->ReferCity->headerCellClass() ?>"><div id="elh_view_ip_admission_ReferCity" class="view_ip_admission_ReferCity"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_ReferCity" class="view_ip_admissionlist" type="text/html"><span><?php echo $view_ip_admission->ReferCity->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="ReferCity" class="<?php echo $view_ip_admission->ReferCity->headerCellClass() ?>"><script id="tpc_view_ip_admission_ReferCity" class="view_ip_admissionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission->SortUrl($view_ip_admission->ReferCity) ?>',1);"><div id="elh_view_ip_admission_ReferCity" class="view_ip_admission_ReferCity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission->ReferCity->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission->ReferCity->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission->ReferCity->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission->ReferMobileNo->Visible) { // ReferMobileNo ?>
	<?php if ($view_ip_admission->sortUrl($view_ip_admission->ReferMobileNo) == "") { ?>
		<th data-name="ReferMobileNo" class="<?php echo $view_ip_admission->ReferMobileNo->headerCellClass() ?>"><div id="elh_view_ip_admission_ReferMobileNo" class="view_ip_admission_ReferMobileNo"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_ReferMobileNo" class="view_ip_admissionlist" type="text/html"><span><?php echo $view_ip_admission->ReferMobileNo->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="ReferMobileNo" class="<?php echo $view_ip_admission->ReferMobileNo->headerCellClass() ?>"><script id="tpc_view_ip_admission_ReferMobileNo" class="view_ip_admissionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission->SortUrl($view_ip_admission->ReferMobileNo) ?>',1);"><div id="elh_view_ip_admission_ReferMobileNo" class="view_ip_admission_ReferMobileNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission->ReferMobileNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission->ReferMobileNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission->ReferMobileNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
	<?php if ($view_ip_admission->sortUrl($view_ip_admission->ReferA4TreatingConsultant) == "") { ?>
		<th data-name="ReferA4TreatingConsultant" class="<?php echo $view_ip_admission->ReferA4TreatingConsultant->headerCellClass() ?>"><div id="elh_view_ip_admission_ReferA4TreatingConsultant" class="view_ip_admission_ReferA4TreatingConsultant"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_ReferA4TreatingConsultant" class="view_ip_admissionlist" type="text/html"><span><?php echo $view_ip_admission->ReferA4TreatingConsultant->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="ReferA4TreatingConsultant" class="<?php echo $view_ip_admission->ReferA4TreatingConsultant->headerCellClass() ?>"><script id="tpc_view_ip_admission_ReferA4TreatingConsultant" class="view_ip_admissionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission->SortUrl($view_ip_admission->ReferA4TreatingConsultant) ?>',1);"><div id="elh_view_ip_admission_ReferA4TreatingConsultant" class="view_ip_admission_ReferA4TreatingConsultant">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission->ReferA4TreatingConsultant->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission->ReferA4TreatingConsultant->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission->ReferA4TreatingConsultant->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
	<?php if ($view_ip_admission->sortUrl($view_ip_admission->PurposreReferredfor) == "") { ?>
		<th data-name="PurposreReferredfor" class="<?php echo $view_ip_admission->PurposreReferredfor->headerCellClass() ?>"><div id="elh_view_ip_admission_PurposreReferredfor" class="view_ip_admission_PurposreReferredfor"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_PurposreReferredfor" class="view_ip_admissionlist" type="text/html"><span><?php echo $view_ip_admission->PurposreReferredfor->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="PurposreReferredfor" class="<?php echo $view_ip_admission->PurposreReferredfor->headerCellClass() ?>"><script id="tpc_view_ip_admission_PurposreReferredfor" class="view_ip_admissionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission->SortUrl($view_ip_admission->PurposreReferredfor) ?>',1);"><div id="elh_view_ip_admission_PurposreReferredfor" class="view_ip_admission_PurposreReferredfor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission->PurposreReferredfor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission->PurposreReferredfor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission->PurposreReferredfor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission->mobileno->Visible) { // mobileno ?>
	<?php if ($view_ip_admission->sortUrl($view_ip_admission->mobileno) == "") { ?>
		<th data-name="mobileno" class="<?php echo $view_ip_admission->mobileno->headerCellClass() ?>"><div id="elh_view_ip_admission_mobileno" class="view_ip_admission_mobileno"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_mobileno" class="view_ip_admissionlist" type="text/html"><span><?php echo $view_ip_admission->mobileno->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="mobileno" class="<?php echo $view_ip_admission->mobileno->headerCellClass() ?>"><script id="tpc_view_ip_admission_mobileno" class="view_ip_admissionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission->SortUrl($view_ip_admission->mobileno) ?>',1);"><div id="elh_view_ip_admission_mobileno" class="view_ip_admission_mobileno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission->mobileno->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission->mobileno->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission->mobileno->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission->BillClosing->Visible) { // BillClosing ?>
	<?php if ($view_ip_admission->sortUrl($view_ip_admission->BillClosing) == "") { ?>
		<th data-name="BillClosing" class="<?php echo $view_ip_admission->BillClosing->headerCellClass() ?>"><div id="elh_view_ip_admission_BillClosing" class="view_ip_admission_BillClosing"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_BillClosing" class="view_ip_admissionlist" type="text/html"><span><?php echo $view_ip_admission->BillClosing->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="BillClosing" class="<?php echo $view_ip_admission->BillClosing->headerCellClass() ?>"><script id="tpc_view_ip_admission_BillClosing" class="view_ip_admissionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission->SortUrl($view_ip_admission->BillClosing) ?>',1);"><div id="elh_view_ip_admission_BillClosing" class="view_ip_admission_BillClosing">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission->BillClosing->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission->BillClosing->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission->BillClosing->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission->BillClosingDate->Visible) { // BillClosingDate ?>
	<?php if ($view_ip_admission->sortUrl($view_ip_admission->BillClosingDate) == "") { ?>
		<th data-name="BillClosingDate" class="<?php echo $view_ip_admission->BillClosingDate->headerCellClass() ?>"><div id="elh_view_ip_admission_BillClosingDate" class="view_ip_admission_BillClosingDate"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_BillClosingDate" class="view_ip_admissionlist" type="text/html"><span><?php echo $view_ip_admission->BillClosingDate->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="BillClosingDate" class="<?php echo $view_ip_admission->BillClosingDate->headerCellClass() ?>"><script id="tpc_view_ip_admission_BillClosingDate" class="view_ip_admissionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission->SortUrl($view_ip_admission->BillClosingDate) ?>',1);"><div id="elh_view_ip_admission_BillClosingDate" class="view_ip_admission_BillClosingDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission->BillClosingDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission->BillClosingDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission->BillClosingDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission->BillNumber->Visible) { // BillNumber ?>
	<?php if ($view_ip_admission->sortUrl($view_ip_admission->BillNumber) == "") { ?>
		<th data-name="BillNumber" class="<?php echo $view_ip_admission->BillNumber->headerCellClass() ?>"><div id="elh_view_ip_admission_BillNumber" class="view_ip_admission_BillNumber"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_BillNumber" class="view_ip_admissionlist" type="text/html"><span><?php echo $view_ip_admission->BillNumber->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="BillNumber" class="<?php echo $view_ip_admission->BillNumber->headerCellClass() ?>"><script id="tpc_view_ip_admission_BillNumber" class="view_ip_admissionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission->SortUrl($view_ip_admission->BillNumber) ?>',1);"><div id="elh_view_ip_admission_BillNumber" class="view_ip_admission_BillNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission->BillNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission->BillNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission->BillNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission->ClosingAmount->Visible) { // ClosingAmount ?>
	<?php if ($view_ip_admission->sortUrl($view_ip_admission->ClosingAmount) == "") { ?>
		<th data-name="ClosingAmount" class="<?php echo $view_ip_admission->ClosingAmount->headerCellClass() ?>"><div id="elh_view_ip_admission_ClosingAmount" class="view_ip_admission_ClosingAmount"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_ClosingAmount" class="view_ip_admissionlist" type="text/html"><span><?php echo $view_ip_admission->ClosingAmount->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="ClosingAmount" class="<?php echo $view_ip_admission->ClosingAmount->headerCellClass() ?>"><script id="tpc_view_ip_admission_ClosingAmount" class="view_ip_admissionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission->SortUrl($view_ip_admission->ClosingAmount) ?>',1);"><div id="elh_view_ip_admission_ClosingAmount" class="view_ip_admission_ClosingAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission->ClosingAmount->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission->ClosingAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission->ClosingAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission->ClosingType->Visible) { // ClosingType ?>
	<?php if ($view_ip_admission->sortUrl($view_ip_admission->ClosingType) == "") { ?>
		<th data-name="ClosingType" class="<?php echo $view_ip_admission->ClosingType->headerCellClass() ?>"><div id="elh_view_ip_admission_ClosingType" class="view_ip_admission_ClosingType"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_ClosingType" class="view_ip_admissionlist" type="text/html"><span><?php echo $view_ip_admission->ClosingType->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="ClosingType" class="<?php echo $view_ip_admission->ClosingType->headerCellClass() ?>"><script id="tpc_view_ip_admission_ClosingType" class="view_ip_admissionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission->SortUrl($view_ip_admission->ClosingType) ?>',1);"><div id="elh_view_ip_admission_ClosingType" class="view_ip_admission_ClosingType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission->ClosingType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission->ClosingType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission->ClosingType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission->BillAmount->Visible) { // BillAmount ?>
	<?php if ($view_ip_admission->sortUrl($view_ip_admission->BillAmount) == "") { ?>
		<th data-name="BillAmount" class="<?php echo $view_ip_admission->BillAmount->headerCellClass() ?>"><div id="elh_view_ip_admission_BillAmount" class="view_ip_admission_BillAmount"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_BillAmount" class="view_ip_admissionlist" type="text/html"><span><?php echo $view_ip_admission->BillAmount->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="BillAmount" class="<?php echo $view_ip_admission->BillAmount->headerCellClass() ?>"><script id="tpc_view_ip_admission_BillAmount" class="view_ip_admissionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission->SortUrl($view_ip_admission->BillAmount) ?>',1);"><div id="elh_view_ip_admission_BillAmount" class="view_ip_admission_BillAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission->BillAmount->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission->BillAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission->BillAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission->billclosedBy->Visible) { // billclosedBy ?>
	<?php if ($view_ip_admission->sortUrl($view_ip_admission->billclosedBy) == "") { ?>
		<th data-name="billclosedBy" class="<?php echo $view_ip_admission->billclosedBy->headerCellClass() ?>"><div id="elh_view_ip_admission_billclosedBy" class="view_ip_admission_billclosedBy"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_billclosedBy" class="view_ip_admissionlist" type="text/html"><span><?php echo $view_ip_admission->billclosedBy->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="billclosedBy" class="<?php echo $view_ip_admission->billclosedBy->headerCellClass() ?>"><script id="tpc_view_ip_admission_billclosedBy" class="view_ip_admissionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission->SortUrl($view_ip_admission->billclosedBy) ?>',1);"><div id="elh_view_ip_admission_billclosedBy" class="view_ip_admission_billclosedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission->billclosedBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission->billclosedBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission->billclosedBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission->bllcloseByDate->Visible) { // bllcloseByDate ?>
	<?php if ($view_ip_admission->sortUrl($view_ip_admission->bllcloseByDate) == "") { ?>
		<th data-name="bllcloseByDate" class="<?php echo $view_ip_admission->bllcloseByDate->headerCellClass() ?>"><div id="elh_view_ip_admission_bllcloseByDate" class="view_ip_admission_bllcloseByDate"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_bllcloseByDate" class="view_ip_admissionlist" type="text/html"><span><?php echo $view_ip_admission->bllcloseByDate->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="bllcloseByDate" class="<?php echo $view_ip_admission->bllcloseByDate->headerCellClass() ?>"><script id="tpc_view_ip_admission_bllcloseByDate" class="view_ip_admissionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission->SortUrl($view_ip_admission->bllcloseByDate) ?>',1);"><div id="elh_view_ip_admission_bllcloseByDate" class="view_ip_admission_bllcloseByDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission->bllcloseByDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission->bllcloseByDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission->bllcloseByDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission->ReportHeader->Visible) { // ReportHeader ?>
	<?php if ($view_ip_admission->sortUrl($view_ip_admission->ReportHeader) == "") { ?>
		<th data-name="ReportHeader" class="<?php echo $view_ip_admission->ReportHeader->headerCellClass() ?>"><div id="elh_view_ip_admission_ReportHeader" class="view_ip_admission_ReportHeader"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_ReportHeader" class="view_ip_admissionlist" type="text/html"><span><?php echo $view_ip_admission->ReportHeader->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="ReportHeader" class="<?php echo $view_ip_admission->ReportHeader->headerCellClass() ?>"><script id="tpc_view_ip_admission_ReportHeader" class="view_ip_admissionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission->SortUrl($view_ip_admission->ReportHeader) ?>',1);"><div id="elh_view_ip_admission_ReportHeader" class="view_ip_admission_ReportHeader">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission->ReportHeader->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission->ReportHeader->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission->ReportHeader->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission->Procedure->Visible) { // Procedure ?>
	<?php if ($view_ip_admission->sortUrl($view_ip_admission->Procedure) == "") { ?>
		<th data-name="Procedure" class="<?php echo $view_ip_admission->Procedure->headerCellClass() ?>"><div id="elh_view_ip_admission_Procedure" class="view_ip_admission_Procedure"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_Procedure" class="view_ip_admissionlist" type="text/html"><span><?php echo $view_ip_admission->Procedure->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Procedure" class="<?php echo $view_ip_admission->Procedure->headerCellClass() ?>"><script id="tpc_view_ip_admission_Procedure" class="view_ip_admissionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission->SortUrl($view_ip_admission->Procedure) ?>',1);"><div id="elh_view_ip_admission_Procedure" class="view_ip_admission_Procedure">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission->Procedure->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission->Procedure->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission->Procedure->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission->Consultant->Visible) { // Consultant ?>
	<?php if ($view_ip_admission->sortUrl($view_ip_admission->Consultant) == "") { ?>
		<th data-name="Consultant" class="<?php echo $view_ip_admission->Consultant->headerCellClass() ?>"><div id="elh_view_ip_admission_Consultant" class="view_ip_admission_Consultant"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_Consultant" class="view_ip_admissionlist" type="text/html"><span><?php echo $view_ip_admission->Consultant->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Consultant" class="<?php echo $view_ip_admission->Consultant->headerCellClass() ?>"><script id="tpc_view_ip_admission_Consultant" class="view_ip_admissionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission->SortUrl($view_ip_admission->Consultant) ?>',1);"><div id="elh_view_ip_admission_Consultant" class="view_ip_admission_Consultant">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission->Consultant->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission->Consultant->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission->Consultant->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission->Anesthetist->Visible) { // Anesthetist ?>
	<?php if ($view_ip_admission->sortUrl($view_ip_admission->Anesthetist) == "") { ?>
		<th data-name="Anesthetist" class="<?php echo $view_ip_admission->Anesthetist->headerCellClass() ?>"><div id="elh_view_ip_admission_Anesthetist" class="view_ip_admission_Anesthetist"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_Anesthetist" class="view_ip_admissionlist" type="text/html"><span><?php echo $view_ip_admission->Anesthetist->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Anesthetist" class="<?php echo $view_ip_admission->Anesthetist->headerCellClass() ?>"><script id="tpc_view_ip_admission_Anesthetist" class="view_ip_admissionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission->SortUrl($view_ip_admission->Anesthetist) ?>',1);"><div id="elh_view_ip_admission_Anesthetist" class="view_ip_admission_Anesthetist">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission->Anesthetist->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission->Anesthetist->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission->Anesthetist->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission->Amound->Visible) { // Amound ?>
	<?php if ($view_ip_admission->sortUrl($view_ip_admission->Amound) == "") { ?>
		<th data-name="Amound" class="<?php echo $view_ip_admission->Amound->headerCellClass() ?>"><div id="elh_view_ip_admission_Amound" class="view_ip_admission_Amound"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_Amound" class="view_ip_admissionlist" type="text/html"><span><?php echo $view_ip_admission->Amound->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Amound" class="<?php echo $view_ip_admission->Amound->headerCellClass() ?>"><script id="tpc_view_ip_admission_Amound" class="view_ip_admissionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission->SortUrl($view_ip_admission->Amound) ?>',1);"><div id="elh_view_ip_admission_Amound" class="view_ip_admission_Amound">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission->Amound->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission->Amound->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission->Amound->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission->Package->Visible) { // Package ?>
	<?php if ($view_ip_admission->sortUrl($view_ip_admission->Package) == "") { ?>
		<th data-name="Package" class="<?php echo $view_ip_admission->Package->headerCellClass() ?>"><div id="elh_view_ip_admission_Package" class="view_ip_admission_Package"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_Package" class="view_ip_admissionlist" type="text/html"><span><?php echo $view_ip_admission->Package->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Package" class="<?php echo $view_ip_admission->Package->headerCellClass() ?>"><script id="tpc_view_ip_admission_Package" class="view_ip_admissionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission->SortUrl($view_ip_admission->Package) ?>',1);"><div id="elh_view_ip_admission_Package" class="view_ip_admission_Package">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission->Package->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission->Package->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission->Package->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission->PartnerID->Visible) { // PartnerID ?>
	<?php if ($view_ip_admission->sortUrl($view_ip_admission->PartnerID) == "") { ?>
		<th data-name="PartnerID" class="<?php echo $view_ip_admission->PartnerID->headerCellClass() ?>"><div id="elh_view_ip_admission_PartnerID" class="view_ip_admission_PartnerID"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_PartnerID" class="view_ip_admissionlist" type="text/html"><span><?php echo $view_ip_admission->PartnerID->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerID" class="<?php echo $view_ip_admission->PartnerID->headerCellClass() ?>"><script id="tpc_view_ip_admission_PartnerID" class="view_ip_admissionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission->SortUrl($view_ip_admission->PartnerID) ?>',1);"><div id="elh_view_ip_admission_PartnerID" class="view_ip_admission_PartnerID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission->PartnerID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission->PartnerID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission->PartnerID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission->PartnerName->Visible) { // PartnerName ?>
	<?php if ($view_ip_admission->sortUrl($view_ip_admission->PartnerName) == "") { ?>
		<th data-name="PartnerName" class="<?php echo $view_ip_admission->PartnerName->headerCellClass() ?>"><div id="elh_view_ip_admission_PartnerName" class="view_ip_admission_PartnerName"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_PartnerName" class="view_ip_admissionlist" type="text/html"><span><?php echo $view_ip_admission->PartnerName->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerName" class="<?php echo $view_ip_admission->PartnerName->headerCellClass() ?>"><script id="tpc_view_ip_admission_PartnerName" class="view_ip_admissionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission->SortUrl($view_ip_admission->PartnerName) ?>',1);"><div id="elh_view_ip_admission_PartnerName" class="view_ip_admission_PartnerName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission->PartnerName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission->PartnerName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission->PartnerName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission->PartnerMobile->Visible) { // PartnerMobile ?>
	<?php if ($view_ip_admission->sortUrl($view_ip_admission->PartnerMobile) == "") { ?>
		<th data-name="PartnerMobile" class="<?php echo $view_ip_admission->PartnerMobile->headerCellClass() ?>"><div id="elh_view_ip_admission_PartnerMobile" class="view_ip_admission_PartnerMobile"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_PartnerMobile" class="view_ip_admissionlist" type="text/html"><span><?php echo $view_ip_admission->PartnerMobile->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerMobile" class="<?php echo $view_ip_admission->PartnerMobile->headerCellClass() ?>"><script id="tpc_view_ip_admission_PartnerMobile" class="view_ip_admissionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission->SortUrl($view_ip_admission->PartnerMobile) ?>',1);"><div id="elh_view_ip_admission_PartnerMobile" class="view_ip_admission_PartnerMobile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission->PartnerMobile->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission->PartnerMobile->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission->PartnerMobile->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission->Cid->Visible) { // Cid ?>
	<?php if ($view_ip_admission->sortUrl($view_ip_admission->Cid) == "") { ?>
		<th data-name="Cid" class="<?php echo $view_ip_admission->Cid->headerCellClass() ?>"><div id="elh_view_ip_admission_Cid" class="view_ip_admission_Cid"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_Cid" class="view_ip_admissionlist" type="text/html"><span><?php echo $view_ip_admission->Cid->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="Cid" class="<?php echo $view_ip_admission->Cid->headerCellClass() ?>"><script id="tpc_view_ip_admission_Cid" class="view_ip_admissionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission->SortUrl($view_ip_admission->Cid) ?>',1);"><div id="elh_view_ip_admission_Cid" class="view_ip_admission_Cid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission->Cid->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission->Cid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission->Cid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission->PartId->Visible) { // PartId ?>
	<?php if ($view_ip_admission->sortUrl($view_ip_admission->PartId) == "") { ?>
		<th data-name="PartId" class="<?php echo $view_ip_admission->PartId->headerCellClass() ?>"><div id="elh_view_ip_admission_PartId" class="view_ip_admission_PartId"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_PartId" class="view_ip_admissionlist" type="text/html"><span><?php echo $view_ip_admission->PartId->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="PartId" class="<?php echo $view_ip_admission->PartId->headerCellClass() ?>"><script id="tpc_view_ip_admission_PartId" class="view_ip_admissionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission->SortUrl($view_ip_admission->PartId) ?>',1);"><div id="elh_view_ip_admission_PartId" class="view_ip_admission_PartId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission->PartId->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission->PartId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission->PartId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_admission->IDProof->Visible) { // IDProof ?>
	<?php if ($view_ip_admission->sortUrl($view_ip_admission->IDProof) == "") { ?>
		<th data-name="IDProof" class="<?php echo $view_ip_admission->IDProof->headerCellClass() ?>"><div id="elh_view_ip_admission_IDProof" class="view_ip_admission_IDProof"><div class="ew-table-header-caption"><script id="tpc_view_ip_admission_IDProof" class="view_ip_admissionlist" type="text/html"><span><?php echo $view_ip_admission->IDProof->caption() ?></span></script></div></div></th>
	<?php } else { ?>
		<th data-name="IDProof" class="<?php echo $view_ip_admission->IDProof->headerCellClass() ?>"><script id="tpc_view_ip_admission_IDProof" class="view_ip_admissionlist" type="text/html"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_admission->SortUrl($view_ip_admission->IDProof) ?>',1);"><div id="elh_view_ip_admission_IDProof" class="view_ip_admission_IDProof">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_admission->IDProof->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_admission->IDProof->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_admission->IDProof->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></script></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_ip_admission_list->ListOptions->render("header", "right", "", "block", $view_ip_admission->TableVar, "view_ip_admissionlist");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_ip_admission->ExportAll && $view_ip_admission->isExport()) {
	$view_ip_admission_list->StopRec = $view_ip_admission_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_ip_admission_list->TotalRecs > $view_ip_admission_list->StartRec + $view_ip_admission_list->DisplayRecs - 1)
		$view_ip_admission_list->StopRec = $view_ip_admission_list->StartRec + $view_ip_admission_list->DisplayRecs - 1;
	else
		$view_ip_admission_list->StopRec = $view_ip_admission_list->TotalRecs;
}
$view_ip_admission_list->RecCnt = $view_ip_admission_list->StartRec - 1;
if ($view_ip_admission_list->Recordset && !$view_ip_admission_list->Recordset->EOF) {
	$view_ip_admission_list->Recordset->moveFirst();
	$selectLimit = $view_ip_admission_list->UseSelectLimit;
	if (!$selectLimit && $view_ip_admission_list->StartRec > 1)
		$view_ip_admission_list->Recordset->move($view_ip_admission_list->StartRec - 1);
} elseif (!$view_ip_admission->AllowAddDeleteRow && $view_ip_admission_list->StopRec == 0) {
	$view_ip_admission_list->StopRec = $view_ip_admission->GridAddRowCount;
}

// Initialize aggregate
$view_ip_admission->RowType = ROWTYPE_AGGREGATEINIT;
$view_ip_admission->resetAttributes();
$view_ip_admission_list->renderRow();
while ($view_ip_admission_list->RecCnt < $view_ip_admission_list->StopRec) {
	$view_ip_admission_list->RecCnt++;
	if ($view_ip_admission_list->RecCnt >= $view_ip_admission_list->StartRec) {
		$view_ip_admission_list->RowCnt++;

		// Set up key count
		$view_ip_admission_list->KeyCount = $view_ip_admission_list->RowIndex;

		// Init row class and style
		$view_ip_admission->resetAttributes();
		$view_ip_admission->CssClass = "";
		if ($view_ip_admission->isGridAdd()) {
		} else {
			$view_ip_admission_list->loadRowValues($view_ip_admission_list->Recordset); // Load row values
		}
		$view_ip_admission->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_ip_admission->RowAttrs = array_merge($view_ip_admission->RowAttrs, array('data-rowindex'=>$view_ip_admission_list->RowCnt, 'id'=>'r' . $view_ip_admission_list->RowCnt . '_view_ip_admission', 'data-rowtype'=>$view_ip_admission->RowType));

		// Render row
		$view_ip_admission_list->renderRow();

		// Render list options
		$view_ip_admission_list->renderListOptions();

		// Save row and cell attributes
		$view_ip_admission_list->Attrs[$view_ip_admission_list->RowCnt] = array("row_attrs" => $view_ip_admission->rowAttributes(), "cell_attrs" => array());
		$view_ip_admission_list->Attrs[$view_ip_admission_list->RowCnt]["cell_attrs"] = $view_ip_admission->fieldCellAttributes();
?>
	<tr<?php echo $view_ip_admission->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_ip_admission_list->ListOptions->render("body", "left", $view_ip_admission_list->RowCnt, "block", $view_ip_admission->TableVar, "view_ip_admissionlist");
?>
	<?php if ($view_ip_admission->id->Visible) { // id ?>
		<td data-name="id"<?php echo $view_ip_admission->id->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_id" class="view_ip_admissionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_id" class="view_ip_admission_id">
<span<?php echo $view_ip_admission->id->viewAttributes() ?>>
<?php echo $view_ip_admission->id->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission->mrnNo->Visible) { // mrnNo ?>
		<td data-name="mrnNo"<?php echo $view_ip_admission->mrnNo->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_mrnNo" class="view_ip_admissionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_mrnNo" class="view_ip_admission_mrnNo">
<span<?php echo $view_ip_admission->mrnNo->viewAttributes() ?>>
<?php echo $view_ip_admission->mrnNo->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission->patient_id->Visible) { // patient_id ?>
		<td data-name="patient_id"<?php echo $view_ip_admission->patient_id->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_patient_id" class="view_ip_admissionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_patient_id" class="view_ip_admission_patient_id">
<span<?php echo $view_ip_admission->patient_id->viewAttributes() ?>>
<?php echo $view_ip_admission->patient_id->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission->patient_name->Visible) { // patient_name ?>
		<td data-name="patient_name"<?php echo $view_ip_admission->patient_name->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_patient_name" class="view_ip_admissionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_patient_name" class="view_ip_admission_patient_name">
<span<?php echo $view_ip_admission->patient_name->viewAttributes() ?>>
<?php echo $view_ip_admission->patient_name->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission->gender->Visible) { // gender ?>
		<td data-name="gender"<?php echo $view_ip_admission->gender->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_gender" class="view_ip_admissionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_gender" class="view_ip_admission_gender">
<span<?php echo $view_ip_admission->gender->viewAttributes() ?>>
<?php echo $view_ip_admission->gender->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission->age->Visible) { // age ?>
		<td data-name="age"<?php echo $view_ip_admission->age->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_age" class="view_ip_admissionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_age" class="view_ip_admission_age">
<span<?php echo $view_ip_admission->age->viewAttributes() ?>>
<?php echo $view_ip_admission->age->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission->physician_id->Visible) { // physician_id ?>
		<td data-name="physician_id"<?php echo $view_ip_admission->physician_id->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_physician_id" class="view_ip_admissionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_physician_id" class="view_ip_admission_physician_id">
<span<?php echo $view_ip_admission->physician_id->viewAttributes() ?>>
<?php echo $view_ip_admission->physician_id->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission->typeRegsisteration->Visible) { // typeRegsisteration ?>
		<td data-name="typeRegsisteration"<?php echo $view_ip_admission->typeRegsisteration->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_typeRegsisteration" class="view_ip_admissionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_typeRegsisteration" class="view_ip_admission_typeRegsisteration">
<span<?php echo $view_ip_admission->typeRegsisteration->viewAttributes() ?>>
<?php echo $view_ip_admission->typeRegsisteration->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission->PaymentCategory->Visible) { // PaymentCategory ?>
		<td data-name="PaymentCategory"<?php echo $view_ip_admission->PaymentCategory->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_PaymentCategory" class="view_ip_admissionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_PaymentCategory" class="view_ip_admission_PaymentCategory">
<span<?php echo $view_ip_admission->PaymentCategory->viewAttributes() ?>>
<?php echo $view_ip_admission->PaymentCategory->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission->admission_consultant_id->Visible) { // admission_consultant_id ?>
		<td data-name="admission_consultant_id"<?php echo $view_ip_admission->admission_consultant_id->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_admission_consultant_id" class="view_ip_admissionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_admission_consultant_id" class="view_ip_admission_admission_consultant_id">
<span<?php echo $view_ip_admission->admission_consultant_id->viewAttributes() ?>>
<?php echo $view_ip_admission->admission_consultant_id->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission->leading_consultant_id->Visible) { // leading_consultant_id ?>
		<td data-name="leading_consultant_id"<?php echo $view_ip_admission->leading_consultant_id->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_leading_consultant_id" class="view_ip_admissionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_leading_consultant_id" class="view_ip_admission_leading_consultant_id">
<span<?php echo $view_ip_admission->leading_consultant_id->viewAttributes() ?>>
<?php echo $view_ip_admission->leading_consultant_id->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission->admission_date->Visible) { // admission_date ?>
		<td data-name="admission_date"<?php echo $view_ip_admission->admission_date->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_admission_date" class="view_ip_admissionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_admission_date" class="view_ip_admission_admission_date">
<span<?php echo $view_ip_admission->admission_date->viewAttributes() ?>>
<?php echo $view_ip_admission->admission_date->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission->release_date->Visible) { // release_date ?>
		<td data-name="release_date"<?php echo $view_ip_admission->release_date->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_release_date" class="view_ip_admissionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_release_date" class="view_ip_admission_release_date">
<span<?php echo $view_ip_admission->release_date->viewAttributes() ?>>
<?php echo $view_ip_admission->release_date->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission->PaymentStatus->Visible) { // PaymentStatus ?>
		<td data-name="PaymentStatus"<?php echo $view_ip_admission->PaymentStatus->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_PaymentStatus" class="view_ip_admissionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_PaymentStatus" class="view_ip_admission_PaymentStatus">
<span<?php echo $view_ip_admission->PaymentStatus->viewAttributes() ?>>
<?php echo $view_ip_admission->PaymentStatus->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission->status->Visible) { // status ?>
		<td data-name="status"<?php echo $view_ip_admission->status->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_status" class="view_ip_admissionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_status" class="view_ip_admission_status">
<span<?php echo $view_ip_admission->status->viewAttributes() ?>>
<?php echo $view_ip_admission->status->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $view_ip_admission->createdby->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_createdby" class="view_ip_admissionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_createdby" class="view_ip_admission_createdby">
<span<?php echo $view_ip_admission->createdby->viewAttributes() ?>>
<?php echo $view_ip_admission->createdby->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $view_ip_admission->createddatetime->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_createddatetime" class="view_ip_admissionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_createddatetime" class="view_ip_admission_createddatetime">
<span<?php echo $view_ip_admission->createddatetime->viewAttributes() ?>>
<?php echo $view_ip_admission->createddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $view_ip_admission->modifiedby->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_modifiedby" class="view_ip_admissionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_modifiedby" class="view_ip_admission_modifiedby">
<span<?php echo $view_ip_admission->modifiedby->viewAttributes() ?>>
<?php echo $view_ip_admission->modifiedby->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $view_ip_admission->modifieddatetime->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_modifieddatetime" class="view_ip_admissionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_modifieddatetime" class="view_ip_admission_modifieddatetime">
<span<?php echo $view_ip_admission->modifieddatetime->viewAttributes() ?>>
<?php echo $view_ip_admission->modifieddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID"<?php echo $view_ip_admission->PatientID->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_PatientID" class="view_ip_admissionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_PatientID" class="view_ip_admission_PatientID">
<span<?php echo $view_ip_admission->PatientID->viewAttributes() ?>>
<?php echo $view_ip_admission->PatientID->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_ip_admission->HospID->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_HospID" class="view_ip_admissionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_HospID" class="view_ip_admission_HospID">
<span<?php echo $view_ip_admission->HospID->viewAttributes() ?>>
<?php echo $view_ip_admission->HospID->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission->ReferedByDr->Visible) { // ReferedByDr ?>
		<td data-name="ReferedByDr"<?php echo $view_ip_admission->ReferedByDr->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_ReferedByDr" class="view_ip_admissionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_ReferedByDr" class="view_ip_admission_ReferedByDr">
<span<?php echo $view_ip_admission->ReferedByDr->viewAttributes() ?>>
<?php echo $view_ip_admission->ReferedByDr->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission->ReferClinicname->Visible) { // ReferClinicname ?>
		<td data-name="ReferClinicname"<?php echo $view_ip_admission->ReferClinicname->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_ReferClinicname" class="view_ip_admissionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_ReferClinicname" class="view_ip_admission_ReferClinicname">
<span<?php echo $view_ip_admission->ReferClinicname->viewAttributes() ?>>
<?php echo $view_ip_admission->ReferClinicname->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission->ReferCity->Visible) { // ReferCity ?>
		<td data-name="ReferCity"<?php echo $view_ip_admission->ReferCity->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_ReferCity" class="view_ip_admissionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_ReferCity" class="view_ip_admission_ReferCity">
<span<?php echo $view_ip_admission->ReferCity->viewAttributes() ?>>
<?php echo $view_ip_admission->ReferCity->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission->ReferMobileNo->Visible) { // ReferMobileNo ?>
		<td data-name="ReferMobileNo"<?php echo $view_ip_admission->ReferMobileNo->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_ReferMobileNo" class="view_ip_admissionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_ReferMobileNo" class="view_ip_admission_ReferMobileNo">
<span<?php echo $view_ip_admission->ReferMobileNo->viewAttributes() ?>>
<?php echo $view_ip_admission->ReferMobileNo->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
		<td data-name="ReferA4TreatingConsultant"<?php echo $view_ip_admission->ReferA4TreatingConsultant->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_ReferA4TreatingConsultant" class="view_ip_admissionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_ReferA4TreatingConsultant" class="view_ip_admission_ReferA4TreatingConsultant">
<span<?php echo $view_ip_admission->ReferA4TreatingConsultant->viewAttributes() ?>>
<?php echo $view_ip_admission->ReferA4TreatingConsultant->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
		<td data-name="PurposreReferredfor"<?php echo $view_ip_admission->PurposreReferredfor->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_PurposreReferredfor" class="view_ip_admissionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_PurposreReferredfor" class="view_ip_admission_PurposreReferredfor">
<span<?php echo $view_ip_admission->PurposreReferredfor->viewAttributes() ?>>
<?php echo $view_ip_admission->PurposreReferredfor->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission->mobileno->Visible) { // mobileno ?>
		<td data-name="mobileno"<?php echo $view_ip_admission->mobileno->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_mobileno" class="view_ip_admissionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_mobileno" class="view_ip_admission_mobileno">
<span<?php echo $view_ip_admission->mobileno->viewAttributes() ?>>
<?php echo $view_ip_admission->mobileno->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission->BillClosing->Visible) { // BillClosing ?>
		<td data-name="BillClosing"<?php echo $view_ip_admission->BillClosing->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_BillClosing" class="view_ip_admissionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_BillClosing" class="view_ip_admission_BillClosing">
<span<?php echo $view_ip_admission->BillClosing->viewAttributes() ?>>
<?php echo $view_ip_admission->BillClosing->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission->BillClosingDate->Visible) { // BillClosingDate ?>
		<td data-name="BillClosingDate"<?php echo $view_ip_admission->BillClosingDate->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_BillClosingDate" class="view_ip_admissionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_BillClosingDate" class="view_ip_admission_BillClosingDate">
<span<?php echo $view_ip_admission->BillClosingDate->viewAttributes() ?>>
<?php echo $view_ip_admission->BillClosingDate->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission->BillNumber->Visible) { // BillNumber ?>
		<td data-name="BillNumber"<?php echo $view_ip_admission->BillNumber->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_BillNumber" class="view_ip_admissionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_BillNumber" class="view_ip_admission_BillNumber">
<span<?php echo $view_ip_admission->BillNumber->viewAttributes() ?>>
<?php echo $view_ip_admission->BillNumber->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission->ClosingAmount->Visible) { // ClosingAmount ?>
		<td data-name="ClosingAmount"<?php echo $view_ip_admission->ClosingAmount->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_ClosingAmount" class="view_ip_admissionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_ClosingAmount" class="view_ip_admission_ClosingAmount">
<span<?php echo $view_ip_admission->ClosingAmount->viewAttributes() ?>>
<?php echo $view_ip_admission->ClosingAmount->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission->ClosingType->Visible) { // ClosingType ?>
		<td data-name="ClosingType"<?php echo $view_ip_admission->ClosingType->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_ClosingType" class="view_ip_admissionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_ClosingType" class="view_ip_admission_ClosingType">
<span<?php echo $view_ip_admission->ClosingType->viewAttributes() ?>>
<?php echo $view_ip_admission->ClosingType->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission->BillAmount->Visible) { // BillAmount ?>
		<td data-name="BillAmount"<?php echo $view_ip_admission->BillAmount->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_BillAmount" class="view_ip_admissionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_BillAmount" class="view_ip_admission_BillAmount">
<span<?php echo $view_ip_admission->BillAmount->viewAttributes() ?>>
<?php echo $view_ip_admission->BillAmount->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission->billclosedBy->Visible) { // billclosedBy ?>
		<td data-name="billclosedBy"<?php echo $view_ip_admission->billclosedBy->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_billclosedBy" class="view_ip_admissionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_billclosedBy" class="view_ip_admission_billclosedBy">
<span<?php echo $view_ip_admission->billclosedBy->viewAttributes() ?>>
<?php echo $view_ip_admission->billclosedBy->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission->bllcloseByDate->Visible) { // bllcloseByDate ?>
		<td data-name="bllcloseByDate"<?php echo $view_ip_admission->bllcloseByDate->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_bllcloseByDate" class="view_ip_admissionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_bllcloseByDate" class="view_ip_admission_bllcloseByDate">
<span<?php echo $view_ip_admission->bllcloseByDate->viewAttributes() ?>>
<?php echo $view_ip_admission->bllcloseByDate->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission->ReportHeader->Visible) { // ReportHeader ?>
		<td data-name="ReportHeader"<?php echo $view_ip_admission->ReportHeader->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_ReportHeader" class="view_ip_admissionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_ReportHeader" class="view_ip_admission_ReportHeader">
<span<?php echo $view_ip_admission->ReportHeader->viewAttributes() ?>>
<?php echo $view_ip_admission->ReportHeader->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission->Procedure->Visible) { // Procedure ?>
		<td data-name="Procedure"<?php echo $view_ip_admission->Procedure->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_Procedure" class="view_ip_admissionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_Procedure" class="view_ip_admission_Procedure">
<span<?php echo $view_ip_admission->Procedure->viewAttributes() ?>>
<?php echo $view_ip_admission->Procedure->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission->Consultant->Visible) { // Consultant ?>
		<td data-name="Consultant"<?php echo $view_ip_admission->Consultant->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_Consultant" class="view_ip_admissionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_Consultant" class="view_ip_admission_Consultant">
<span<?php echo $view_ip_admission->Consultant->viewAttributes() ?>>
<?php echo $view_ip_admission->Consultant->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission->Anesthetist->Visible) { // Anesthetist ?>
		<td data-name="Anesthetist"<?php echo $view_ip_admission->Anesthetist->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_Anesthetist" class="view_ip_admissionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_Anesthetist" class="view_ip_admission_Anesthetist">
<span<?php echo $view_ip_admission->Anesthetist->viewAttributes() ?>>
<?php echo $view_ip_admission->Anesthetist->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission->Amound->Visible) { // Amound ?>
		<td data-name="Amound"<?php echo $view_ip_admission->Amound->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_Amound" class="view_ip_admissionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_Amound" class="view_ip_admission_Amound">
<span<?php echo $view_ip_admission->Amound->viewAttributes() ?>>
<?php echo $view_ip_admission->Amound->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission->Package->Visible) { // Package ?>
		<td data-name="Package"<?php echo $view_ip_admission->Package->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_Package" class="view_ip_admissionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_Package" class="view_ip_admission_Package">
<span<?php echo $view_ip_admission->Package->viewAttributes() ?>>
<?php echo $view_ip_admission->Package->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission->PartnerID->Visible) { // PartnerID ?>
		<td data-name="PartnerID"<?php echo $view_ip_admission->PartnerID->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_PartnerID" class="view_ip_admissionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_PartnerID" class="view_ip_admission_PartnerID">
<span<?php echo $view_ip_admission->PartnerID->viewAttributes() ?>>
<?php echo $view_ip_admission->PartnerID->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission->PartnerName->Visible) { // PartnerName ?>
		<td data-name="PartnerName"<?php echo $view_ip_admission->PartnerName->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_PartnerName" class="view_ip_admissionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_PartnerName" class="view_ip_admission_PartnerName">
<span<?php echo $view_ip_admission->PartnerName->viewAttributes() ?>>
<?php echo $view_ip_admission->PartnerName->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission->PartnerMobile->Visible) { // PartnerMobile ?>
		<td data-name="PartnerMobile"<?php echo $view_ip_admission->PartnerMobile->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_PartnerMobile" class="view_ip_admissionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_PartnerMobile" class="view_ip_admission_PartnerMobile">
<span<?php echo $view_ip_admission->PartnerMobile->viewAttributes() ?>>
<?php echo $view_ip_admission->PartnerMobile->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission->Cid->Visible) { // Cid ?>
		<td data-name="Cid"<?php echo $view_ip_admission->Cid->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_Cid" class="view_ip_admissionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_Cid" class="view_ip_admission_Cid">
<span<?php echo $view_ip_admission->Cid->viewAttributes() ?>>
<?php echo $view_ip_admission->Cid->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission->PartId->Visible) { // PartId ?>
		<td data-name="PartId"<?php echo $view_ip_admission->PartId->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_PartId" class="view_ip_admissionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_PartId" class="view_ip_admission_PartId">
<span<?php echo $view_ip_admission->PartId->viewAttributes() ?>>
<?php echo $view_ip_admission->PartId->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
	<?php if ($view_ip_admission->IDProof->Visible) { // IDProof ?>
		<td data-name="IDProof"<?php echo $view_ip_admission->IDProof->cellAttributes() ?>>
<script id="tpx<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_IDProof" class="view_ip_admissionlist" type="text/html">
<span id="el<?php echo $view_ip_admission_list->RowCnt ?>_view_ip_admission_IDProof" class="view_ip_admission_IDProof">
<span<?php echo $view_ip_admission->IDProof->viewAttributes() ?>>
<?php echo $view_ip_admission->IDProof->getViewValue() ?></span>
</span>
</script>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_ip_admission_list->ListOptions->render("body", "right", $view_ip_admission_list->RowCnt, "block", $view_ip_admission->TableVar, "view_ip_admissionlist");
?>
	</tr>
<?php
	}
	if (!$view_ip_admission->isGridAdd())
		$view_ip_admission_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_ip_admission->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<div id="tpd_view_ip_admissionlist" class="ew-custom-template"></div>
<script id="tpm_view_ip_admissionlist" type="text/html">
<div id="ct_view_ip_admission_list"><?php if ($view_ip_admission_list->RowCnt > 0) { ?>
<table cellspacing="0" class="ew-table ew-table-separate">
	<thead>
		<tr class="ew-table-header">
			<td>{{include tmpl="#tpc_view_ip_admission_PatientID"/}}</td><td>{{include tmpl="#tpc_view_ip_admission_patient_name"/}}</td>
			<td>{{include tmpl="#tpc_view_ip_admission_mrnNo"/}}</td><td>{{include tmpl="#tpc_view_ip_admission_mobileno"/}}</td>
			<td>Prescription</td>
			<td>Services</td><td>Drug</td>
		</tr> 
	</thead>
	<tbody> 
<?php for ($i = $view_ip_admission_list->StartRowCnt; $i <= $view_ip_admission_list->RowCnt; $i++) { ?>
 <tr<?php echo @$view_ip_admission_list->Attrs[$i]['row_attrs'] ?>>
	 <td>{{include tmpl="#tpx<?php echo $i ?>_view_ip_admission_PatientID"/}}</td><td>{{include tmpl="#tpx<?php echo $i ?>_view_ip_admission_patient_name"/}}</td>
	 	 <td>{{include tmpl="#tpx<?php echo $i ?>_view_ip_admission_mrnNo"/}}</td><td>{{include tmpl="#tpx<?php echo $i ?>_view_ip_admission_mobileno"/}}</td>
	 	 	<td align="center">
<a href='patient_prescriptionlist.php?showmaster=ip_admission&id={{: ~root.rows[<?php echo $i - 1 ?>].id }}&fk_id={{: ~root.rows[<?php echo $i - 1 ?>].id }}&fk_patient_id={{: ~root.rows[<?php echo $i - 1 ?>].patient_id }}&fk_mrnNo={{: ~root.rows[<?php echo $i - 1 ?>].mrnNo }}' class="faa-parent animated-hover">
				<i class="fas fa-pills fa-2x" style="color:blue"></i>
 </a>
&nbsp;&nbsp;
	 <a href='patient_prescriptionlist.php?action=gridadd&showmaster=ip_admission&id={{: ~root.rows[<?php echo $i - 1 ?>].id }}&fk_id={{: ~root.rows[<?php echo $i - 1 ?>].id }}&fk_patient_id={{: ~root.rows[<?php echo $i - 1 ?>].patient_id }}&fk_mrnNo={{: ~root.rows[<?php echo $i - 1 ?>].mrnNo }}' class="faa-parent animated-hover">
				<i class="fas fa-prescription-bottle-alt fa-2x" style="color:pink"></i>
 </a>
	 	 	</td>
	 	 	<td align="center">
<a href='patient_serviceslist.php?showmaster=ip_admission&id={{: ~root.rows[<?php echo $i - 1 ?>].id }}&fk_id={{: ~root.rows[<?php echo $i - 1 ?>].id }}&fk_patient_id={{: ~root.rows[<?php echo $i - 1 ?>].patient_id }}&fk_mrnNo={{: ~root.rows[<?php echo $i - 1 ?>].mrnNo }}' class="faa-parent animated-hover">
				<i class="fas fa-user-md fa-2x" style="color:blue"></i>
 </a>
&nbsp;&nbsp;
	 <a href='patient_serviceslist.php?action=gridadd&showmaster=ip_admission&id={{: ~root.rows[<?php echo $i - 1 ?>].id }}&fk_id={{: ~root.rows[<?php echo $i - 1 ?>].id }}&fk_patient_id={{: ~root.rows[<?php echo $i - 1 ?>].patient_id }}&fk_mrnNo={{: ~root.rows[<?php echo $i - 1 ?>].mrnNo }}' class="faa-parent animated-hover">
				<i class="fas fa-user-nurse fa-2x" style="color:pink"></i>
 </a>
	 	 	</td>
		<td align="center">
<a href='pharmacy_pharledlist.php?showmaster=ip_admission&id={{: ~root.rows[<?php echo $i - 1 ?>].id }}&fk_id={{: ~root.rows[<?php echo $i - 1 ?>].id }}&fk_patient_id={{: ~root.rows[<?php echo $i - 1 ?>].patient_id }}&fk_mrnNo={{: ~root.rows[<?php echo $i - 1 ?>].mrnNo }}' class="faa-parent animated-hover">
				<i class="fas fa-syringe fa-2x" style="color:blue"></i>
 </a>
&nbsp;&nbsp;
	 <a href='pharmacy_pharledlist.php?action=gridadd&showmaster=ip_admission&id={{: ~root.rows[<?php echo $i - 1 ?>].id }}&fk_id={{: ~root.rows[<?php echo $i - 1 ?>].id }}&fk_patient_id={{: ~root.rows[<?php echo $i - 1 ?>].patient_id }}&fk_mrnNo={{: ~root.rows[<?php echo $i - 1 ?>].mrnNo }}' class="faa-parent animated-hover">
				<i class="fas fa-prescription-bottle fa-2x" style="color:pink"></i>
 </a>
	 	 	</td>
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
if ($view_ip_admission_list->Recordset)
	$view_ip_admission_list->Recordset->Close();
?>
<?php if (!$view_ip_admission->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_ip_admission->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_ip_admission_list->Pager)) $view_ip_admission_list->Pager = new NumericPager($view_ip_admission_list->StartRec, $view_ip_admission_list->DisplayRecs, $view_ip_admission_list->TotalRecs, $view_ip_admission_list->RecRange, $view_ip_admission_list->AutoHidePager) ?>
<?php if ($view_ip_admission_list->Pager->RecordCount > 0 && $view_ip_admission_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_ip_admission_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ip_admission_list->pageUrl() ?>start=<?php echo $view_ip_admission_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_ip_admission_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ip_admission_list->pageUrl() ?>start=<?php echo $view_ip_admission_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_ip_admission_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_ip_admission_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_ip_admission_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ip_admission_list->pageUrl() ?>start=<?php echo $view_ip_admission_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_ip_admission_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ip_admission_list->pageUrl() ?>start=<?php echo $view_ip_admission_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_ip_admission_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_ip_admission_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_ip_admission_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_ip_admission_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_ip_admission_list->TotalRecs > 0 && (!$view_ip_admission_list->AutoHidePageSizeSelector || $view_ip_admission_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_ip_admission">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($view_ip_admission_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_ip_admission_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_ip_admission_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_ip_admission_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_ip_admission_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_ip_admission_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_ip_admission->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_ip_admission_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_ip_admission_list->TotalRecs == 0 && !$view_ip_admission->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_ip_admission_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($view_ip_admission->Rows) ?> };
ew.applyTemplate("tpd_view_ip_admissionlist", "tpm_view_ip_admissionlist", "view_ip_admissionlist", "<?php echo $view_ip_admission->CustomExport ?>", ew.vars.templateData);
jQuery("#tpd_view_ip_admissionlist th.ew-list-option-header").each(function() {this.rowSpan = 2});
jQuery("#tpd_view_ip_admissionlist td.ew-list-option-body").each(function() {this.rowSpan = 2});
jQuery("script.view_ip_admissionlist_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$view_ip_admission_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_ip_admission->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_ip_admission->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_ip_admission", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_ip_admission_list->terminate();
?>