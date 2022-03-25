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
$view_ip_patient_admission_list = new view_ip_patient_admission_list();

// Run the page
$view_ip_patient_admission_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_ip_patient_admission_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_ip_patient_admission->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fview_ip_patient_admissionlist = currentForm = new ew.Form("fview_ip_patient_admissionlist", "list");
fview_ip_patient_admissionlist.formKeyCountName = '<?php echo $view_ip_patient_admission_list->FormKeyCountName ?>';

// Form_CustomValidate event
fview_ip_patient_admissionlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_ip_patient_admissionlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_ip_patient_admissionlist.lists["x_PaymentStatus"] = <?php echo $view_ip_patient_admission_list->PaymentStatus->Lookup->toClientList() ?>;
fview_ip_patient_admissionlist.lists["x_PaymentStatus"].options = <?php echo JsonEncode($view_ip_patient_admission_list->PaymentStatus->lookupOptions()) ?>;
fview_ip_patient_admissionlist.lists["x_HospID"] = <?php echo $view_ip_patient_admission_list->HospID->Lookup->toClientList() ?>;
fview_ip_patient_admissionlist.lists["x_HospID"].options = <?php echo JsonEncode($view_ip_patient_admission_list->HospID->lookupOptions()) ?>;
fview_ip_patient_admissionlist.lists["x_ReferedByDr"] = <?php echo $view_ip_patient_admission_list->ReferedByDr->Lookup->toClientList() ?>;
fview_ip_patient_admissionlist.lists["x_ReferedByDr"].options = <?php echo JsonEncode($view_ip_patient_admission_list->ReferedByDr->lookupOptions()) ?>;
fview_ip_patient_admissionlist.lists["x_BillClosing[]"] = <?php echo $view_ip_patient_admission_list->BillClosing->Lookup->toClientList() ?>;
fview_ip_patient_admissionlist.lists["x_BillClosing[]"].options = <?php echo JsonEncode($view_ip_patient_admission_list->BillClosing->options(FALSE, TRUE)) ?>;
fview_ip_patient_admissionlist.lists["x_Procedure"] = <?php echo $view_ip_patient_admission_list->Procedure->Lookup->toClientList() ?>;
fview_ip_patient_admissionlist.lists["x_Procedure"].options = <?php echo JsonEncode($view_ip_patient_admission_list->Procedure->lookupOptions()) ?>;
fview_ip_patient_admissionlist.lists["x_Consultant"] = <?php echo $view_ip_patient_admission_list->Consultant->Lookup->toClientList() ?>;
fview_ip_patient_admissionlist.lists["x_Consultant"].options = <?php echo JsonEncode($view_ip_patient_admission_list->Consultant->lookupOptions()) ?>;
fview_ip_patient_admissionlist.lists["x_Anesthetist"] = <?php echo $view_ip_patient_admission_list->Anesthetist->Lookup->toClientList() ?>;
fview_ip_patient_admissionlist.lists["x_Anesthetist"].options = <?php echo JsonEncode($view_ip_patient_admission_list->Anesthetist->lookupOptions()) ?>;
fview_ip_patient_admissionlist.lists["x_Cid"] = <?php echo $view_ip_patient_admission_list->Cid->Lookup->toClientList() ?>;
fview_ip_patient_admissionlist.lists["x_Cid"].options = <?php echo JsonEncode($view_ip_patient_admission_list->Cid->lookupOptions()) ?>;
fview_ip_patient_admissionlist.lists["x_AdviceToOtherHospital[]"] = <?php echo $view_ip_patient_admission_list->AdviceToOtherHospital->Lookup->toClientList() ?>;
fview_ip_patient_admissionlist.lists["x_AdviceToOtherHospital[]"].options = <?php echo JsonEncode($view_ip_patient_admission_list->AdviceToOtherHospital->options(FALSE, TRUE)) ?>;

// Form object for search
var fview_ip_patient_admissionlistsrch = currentSearchForm = new ew.Form("fview_ip_patient_admissionlistsrch");

// Validate function for search
fview_ip_patient_admissionlistsrch.validate = function(fobj) {
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
fview_ip_patient_admissionlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_ip_patient_admissionlistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

fview_ip_patient_admissionlistsrch.filterList = <?php echo $view_ip_patient_admission_list->getFilterList() ?>;
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
<?php if (!$view_ip_patient_admission->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_ip_patient_admission_list->TotalRecs > 0 && $view_ip_patient_admission_list->ExportOptions->visible()) { ?>
<?php $view_ip_patient_admission_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_ip_patient_admission_list->ImportOptions->visible()) { ?>
<?php $view_ip_patient_admission_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_ip_patient_admission_list->SearchOptions->visible()) { ?>
<?php $view_ip_patient_admission_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_ip_patient_admission_list->FilterOptions->visible()) { ?>
<?php $view_ip_patient_admission_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_ip_patient_admission_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_ip_patient_admission->isExport() && !$view_ip_patient_admission->CurrentAction) { ?>
<form name="fview_ip_patient_admissionlistsrch" id="fview_ip_patient_admissionlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($view_ip_patient_admission_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fview_ip_patient_admissionlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_ip_patient_admission">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$view_ip_patient_admission_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$view_ip_patient_admission->RowType = ROWTYPE_SEARCH;

// Render row
$view_ip_patient_admission->resetAttributes();
$view_ip_patient_admission_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($view_ip_patient_admission->mrnNo->Visible) { // mrnNo ?>
	<div id="xsc_mrnNo" class="ew-cell form-group">
		<label for="x_mrnNo" class="ew-search-caption ew-label"><?php echo $view_ip_patient_admission->mrnNo->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_mrnNo" id="z_mrnNo" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_ip_patient_admission" data-field="x_mrnNo" name="x_mrnNo" id="x_mrnNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->mrnNo->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->mrnNo->EditValue ?>"<?php echo $view_ip_patient_admission->mrnNo->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->PatientID->Visible) { // PatientID ?>
	<div id="xsc_PatientID" class="ew-cell form-group">
		<label for="x_PatientID" class="ew-search-caption ew-label"><?php echo $view_ip_patient_admission->PatientID->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientID" id="z_PatientID" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_ip_patient_admission" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->PatientID->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->PatientID->EditValue ?>"<?php echo $view_ip_patient_admission->PatientID->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($view_ip_patient_admission->patient_name->Visible) { // patient_name ?>
	<div id="xsc_patient_name" class="ew-cell form-group">
		<label for="x_patient_name" class="ew-search-caption ew-label"><?php echo $view_ip_patient_admission->patient_name->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_patient_name" id="z_patient_name" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_ip_patient_admission" data-field="x_patient_name" name="x_patient_name" id="x_patient_name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->patient_name->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->patient_name->EditValue ?>"<?php echo $view_ip_patient_admission->patient_name->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->mobileno->Visible) { // mobileno ?>
	<div id="xsc_mobileno" class="ew-cell form-group">
		<label for="x_mobileno" class="ew-search-caption ew-label"><?php echo $view_ip_patient_admission->mobileno->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_mobileno" id="z_mobileno" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="view_ip_patient_admission" data-field="x_mobileno" name="x_mobileno" id="x_mobileno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->mobileno->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->mobileno->EditValue ?>"<?php echo $view_ip_patient_admission->mobileno->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($view_ip_patient_admission_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($view_ip_patient_admission_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_ip_patient_admission_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_ip_patient_admission_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_ip_patient_admission_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_ip_patient_admission_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_ip_patient_admission_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $view_ip_patient_admission_list->showPageHeader(); ?>
<?php
$view_ip_patient_admission_list->showMessage();
?>
<?php if ($view_ip_patient_admission_list->TotalRecs > 0 || $view_ip_patient_admission->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_ip_patient_admission_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_ip_patient_admission">
<?php if (!$view_ip_patient_admission->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_ip_patient_admission->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_ip_patient_admission_list->Pager)) $view_ip_patient_admission_list->Pager = new NumericPager($view_ip_patient_admission_list->StartRec, $view_ip_patient_admission_list->DisplayRecs, $view_ip_patient_admission_list->TotalRecs, $view_ip_patient_admission_list->RecRange, $view_ip_patient_admission_list->AutoHidePager) ?>
<?php if ($view_ip_patient_admission_list->Pager->RecordCount > 0 && $view_ip_patient_admission_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_ip_patient_admission_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ip_patient_admission_list->pageUrl() ?>start=<?php echo $view_ip_patient_admission_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_ip_patient_admission_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ip_patient_admission_list->pageUrl() ?>start=<?php echo $view_ip_patient_admission_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_ip_patient_admission_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_ip_patient_admission_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_ip_patient_admission_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ip_patient_admission_list->pageUrl() ?>start=<?php echo $view_ip_patient_admission_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_ip_patient_admission_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ip_patient_admission_list->pageUrl() ?>start=<?php echo $view_ip_patient_admission_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_ip_patient_admission_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_ip_patient_admission_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_ip_patient_admission_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_ip_patient_admission_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_ip_patient_admission_list->TotalRecs > 0 && (!$view_ip_patient_admission_list->AutoHidePageSizeSelector || $view_ip_patient_admission_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_ip_patient_admission">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="10"<?php if ($view_ip_patient_admission_list->DisplayRecs == 10) { ?> selected<?php } ?>>10</option>
<option value="20"<?php if ($view_ip_patient_admission_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_ip_patient_admission_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_ip_patient_admission_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_ip_patient_admission_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_ip_patient_admission_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_ip_patient_admission_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_ip_patient_admission->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_ip_patient_admission_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_ip_patient_admissionlist" id="fview_ip_patient_admissionlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_ip_patient_admission_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_ip_patient_admission_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_ip_patient_admission">
<div id="gmp_view_ip_patient_admission" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($view_ip_patient_admission_list->TotalRecs > 0 || $view_ip_patient_admission->isGridEdit()) { ?>
<table id="tbl_view_ip_patient_admissionlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_ip_patient_admission_list->RowType = ROWTYPE_HEADER;

// Render list options
$view_ip_patient_admission_list->renderListOptions();

// Render list options (header, left)
$view_ip_patient_admission_list->ListOptions->render("header", "left");
?>
<?php if ($view_ip_patient_admission->id->Visible) { // id ?>
	<?php if ($view_ip_patient_admission->sortUrl($view_ip_patient_admission->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_ip_patient_admission->id->headerCellClass() ?>"><div id="elh_view_ip_patient_admission_id" class="view_ip_patient_admission_id"><div class="ew-table-header-caption"><?php echo $view_ip_patient_admission->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_ip_patient_admission->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_patient_admission->SortUrl($view_ip_patient_admission->id) ?>',1);"><div id="elh_view_ip_patient_admission_id" class="view_ip_patient_admission_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_patient_admission->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_patient_admission->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_patient_admission->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_patient_admission->mrnNo->Visible) { // mrnNo ?>
	<?php if ($view_ip_patient_admission->sortUrl($view_ip_patient_admission->mrnNo) == "") { ?>
		<th data-name="mrnNo" class="<?php echo $view_ip_patient_admission->mrnNo->headerCellClass() ?>"><div id="elh_view_ip_patient_admission_mrnNo" class="view_ip_patient_admission_mrnNo"><div class="ew-table-header-caption"><?php echo $view_ip_patient_admission->mrnNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnNo" class="<?php echo $view_ip_patient_admission->mrnNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_patient_admission->SortUrl($view_ip_patient_admission->mrnNo) ?>',1);"><div id="elh_view_ip_patient_admission_mrnNo" class="view_ip_patient_admission_mrnNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_patient_admission->mrnNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_patient_admission->mrnNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_patient_admission->mrnNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_patient_admission->PatientID->Visible) { // PatientID ?>
	<?php if ($view_ip_patient_admission->sortUrl($view_ip_patient_admission->PatientID) == "") { ?>
		<th data-name="PatientID" class="<?php echo $view_ip_patient_admission->PatientID->headerCellClass() ?>"><div id="elh_view_ip_patient_admission_PatientID" class="view_ip_patient_admission_PatientID"><div class="ew-table-header-caption"><?php echo $view_ip_patient_admission->PatientID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientID" class="<?php echo $view_ip_patient_admission->PatientID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_patient_admission->SortUrl($view_ip_patient_admission->PatientID) ?>',1);"><div id="elh_view_ip_patient_admission_PatientID" class="view_ip_patient_admission_PatientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_patient_admission->PatientID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_patient_admission->PatientID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_patient_admission->PatientID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_patient_admission->patient_name->Visible) { // patient_name ?>
	<?php if ($view_ip_patient_admission->sortUrl($view_ip_patient_admission->patient_name) == "") { ?>
		<th data-name="patient_name" class="<?php echo $view_ip_patient_admission->patient_name->headerCellClass() ?>"><div id="elh_view_ip_patient_admission_patient_name" class="view_ip_patient_admission_patient_name"><div class="ew-table-header-caption"><?php echo $view_ip_patient_admission->patient_name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patient_name" class="<?php echo $view_ip_patient_admission->patient_name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_patient_admission->SortUrl($view_ip_patient_admission->patient_name) ?>',1);"><div id="elh_view_ip_patient_admission_patient_name" class="view_ip_patient_admission_patient_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_patient_admission->patient_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_patient_admission->patient_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_patient_admission->patient_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_patient_admission->mobileno->Visible) { // mobileno ?>
	<?php if ($view_ip_patient_admission->sortUrl($view_ip_patient_admission->mobileno) == "") { ?>
		<th data-name="mobileno" class="<?php echo $view_ip_patient_admission->mobileno->headerCellClass() ?>"><div id="elh_view_ip_patient_admission_mobileno" class="view_ip_patient_admission_mobileno"><div class="ew-table-header-caption"><?php echo $view_ip_patient_admission->mobileno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mobileno" class="<?php echo $view_ip_patient_admission->mobileno->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_patient_admission->SortUrl($view_ip_patient_admission->mobileno) ?>',1);"><div id="elh_view_ip_patient_admission_mobileno" class="view_ip_patient_admission_mobileno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_patient_admission->mobileno->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_patient_admission->mobileno->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_patient_admission->mobileno->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_patient_admission->admission_date->Visible) { // admission_date ?>
	<?php if ($view_ip_patient_admission->sortUrl($view_ip_patient_admission->admission_date) == "") { ?>
		<th data-name="admission_date" class="<?php echo $view_ip_patient_admission->admission_date->headerCellClass() ?>"><div id="elh_view_ip_patient_admission_admission_date" class="view_ip_patient_admission_admission_date"><div class="ew-table-header-caption"><?php echo $view_ip_patient_admission->admission_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="admission_date" class="<?php echo $view_ip_patient_admission->admission_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_patient_admission->SortUrl($view_ip_patient_admission->admission_date) ?>',1);"><div id="elh_view_ip_patient_admission_admission_date" class="view_ip_patient_admission_admission_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_patient_admission->admission_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_patient_admission->admission_date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_patient_admission->admission_date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_patient_admission->release_date->Visible) { // release_date ?>
	<?php if ($view_ip_patient_admission->sortUrl($view_ip_patient_admission->release_date) == "") { ?>
		<th data-name="release_date" class="<?php echo $view_ip_patient_admission->release_date->headerCellClass() ?>"><div id="elh_view_ip_patient_admission_release_date" class="view_ip_patient_admission_release_date"><div class="ew-table-header-caption"><?php echo $view_ip_patient_admission->release_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="release_date" class="<?php echo $view_ip_patient_admission->release_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_patient_admission->SortUrl($view_ip_patient_admission->release_date) ?>',1);"><div id="elh_view_ip_patient_admission_release_date" class="view_ip_patient_admission_release_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_patient_admission->release_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_patient_admission->release_date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_patient_admission->release_date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_patient_admission->PaymentStatus->Visible) { // PaymentStatus ?>
	<?php if ($view_ip_patient_admission->sortUrl($view_ip_patient_admission->PaymentStatus) == "") { ?>
		<th data-name="PaymentStatus" class="<?php echo $view_ip_patient_admission->PaymentStatus->headerCellClass() ?>"><div id="elh_view_ip_patient_admission_PaymentStatus" class="view_ip_patient_admission_PaymentStatus"><div class="ew-table-header-caption"><?php echo $view_ip_patient_admission->PaymentStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PaymentStatus" class="<?php echo $view_ip_patient_admission->PaymentStatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_patient_admission->SortUrl($view_ip_patient_admission->PaymentStatus) ?>',1);"><div id="elh_view_ip_patient_admission_PaymentStatus" class="view_ip_patient_admission_PaymentStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_patient_admission->PaymentStatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_patient_admission->PaymentStatus->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_patient_admission->PaymentStatus->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_patient_admission->HospID->Visible) { // HospID ?>
	<?php if ($view_ip_patient_admission->sortUrl($view_ip_patient_admission->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_ip_patient_admission->HospID->headerCellClass() ?>"><div id="elh_view_ip_patient_admission_HospID" class="view_ip_patient_admission_HospID"><div class="ew-table-header-caption"><?php echo $view_ip_patient_admission->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_ip_patient_admission->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_patient_admission->SortUrl($view_ip_patient_admission->HospID) ?>',1);"><div id="elh_view_ip_patient_admission_HospID" class="view_ip_patient_admission_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_patient_admission->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_patient_admission->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_patient_admission->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_patient_admission->ReferedByDr->Visible) { // ReferedByDr ?>
	<?php if ($view_ip_patient_admission->sortUrl($view_ip_patient_admission->ReferedByDr) == "") { ?>
		<th data-name="ReferedByDr" class="<?php echo $view_ip_patient_admission->ReferedByDr->headerCellClass() ?>"><div id="elh_view_ip_patient_admission_ReferedByDr" class="view_ip_patient_admission_ReferedByDr"><div class="ew-table-header-caption"><?php echo $view_ip_patient_admission->ReferedByDr->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReferedByDr" class="<?php echo $view_ip_patient_admission->ReferedByDr->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_patient_admission->SortUrl($view_ip_patient_admission->ReferedByDr) ?>',1);"><div id="elh_view_ip_patient_admission_ReferedByDr" class="view_ip_patient_admission_ReferedByDr">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_patient_admission->ReferedByDr->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_patient_admission->ReferedByDr->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_patient_admission->ReferedByDr->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_patient_admission->BillClosing->Visible) { // BillClosing ?>
	<?php if ($view_ip_patient_admission->sortUrl($view_ip_patient_admission->BillClosing) == "") { ?>
		<th data-name="BillClosing" class="<?php echo $view_ip_patient_admission->BillClosing->headerCellClass() ?>"><div id="elh_view_ip_patient_admission_BillClosing" class="view_ip_patient_admission_BillClosing"><div class="ew-table-header-caption"><?php echo $view_ip_patient_admission->BillClosing->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillClosing" class="<?php echo $view_ip_patient_admission->BillClosing->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_patient_admission->SortUrl($view_ip_patient_admission->BillClosing) ?>',1);"><div id="elh_view_ip_patient_admission_BillClosing" class="view_ip_patient_admission_BillClosing">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_patient_admission->BillClosing->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_patient_admission->BillClosing->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_patient_admission->BillClosing->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_patient_admission->BillClosingDate->Visible) { // BillClosingDate ?>
	<?php if ($view_ip_patient_admission->sortUrl($view_ip_patient_admission->BillClosingDate) == "") { ?>
		<th data-name="BillClosingDate" class="<?php echo $view_ip_patient_admission->BillClosingDate->headerCellClass() ?>"><div id="elh_view_ip_patient_admission_BillClosingDate" class="view_ip_patient_admission_BillClosingDate"><div class="ew-table-header-caption"><?php echo $view_ip_patient_admission->BillClosingDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillClosingDate" class="<?php echo $view_ip_patient_admission->BillClosingDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_patient_admission->SortUrl($view_ip_patient_admission->BillClosingDate) ?>',1);"><div id="elh_view_ip_patient_admission_BillClosingDate" class="view_ip_patient_admission_BillClosingDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_patient_admission->BillClosingDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_patient_admission->BillClosingDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_patient_admission->BillClosingDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_patient_admission->BillNumber->Visible) { // BillNumber ?>
	<?php if ($view_ip_patient_admission->sortUrl($view_ip_patient_admission->BillNumber) == "") { ?>
		<th data-name="BillNumber" class="<?php echo $view_ip_patient_admission->BillNumber->headerCellClass() ?>"><div id="elh_view_ip_patient_admission_BillNumber" class="view_ip_patient_admission_BillNumber"><div class="ew-table-header-caption"><?php echo $view_ip_patient_admission->BillNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillNumber" class="<?php echo $view_ip_patient_admission->BillNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_patient_admission->SortUrl($view_ip_patient_admission->BillNumber) ?>',1);"><div id="elh_view_ip_patient_admission_BillNumber" class="view_ip_patient_admission_BillNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_patient_admission->BillNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_patient_admission->BillNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_patient_admission->BillNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_patient_admission->Procedure->Visible) { // Procedure ?>
	<?php if ($view_ip_patient_admission->sortUrl($view_ip_patient_admission->Procedure) == "") { ?>
		<th data-name="Procedure" class="<?php echo $view_ip_patient_admission->Procedure->headerCellClass() ?>"><div id="elh_view_ip_patient_admission_Procedure" class="view_ip_patient_admission_Procedure"><div class="ew-table-header-caption"><?php echo $view_ip_patient_admission->Procedure->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Procedure" class="<?php echo $view_ip_patient_admission->Procedure->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_patient_admission->SortUrl($view_ip_patient_admission->Procedure) ?>',1);"><div id="elh_view_ip_patient_admission_Procedure" class="view_ip_patient_admission_Procedure">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_patient_admission->Procedure->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_patient_admission->Procedure->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_patient_admission->Procedure->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_patient_admission->Consultant->Visible) { // Consultant ?>
	<?php if ($view_ip_patient_admission->sortUrl($view_ip_patient_admission->Consultant) == "") { ?>
		<th data-name="Consultant" class="<?php echo $view_ip_patient_admission->Consultant->headerCellClass() ?>"><div id="elh_view_ip_patient_admission_Consultant" class="view_ip_patient_admission_Consultant"><div class="ew-table-header-caption"><?php echo $view_ip_patient_admission->Consultant->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Consultant" class="<?php echo $view_ip_patient_admission->Consultant->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_patient_admission->SortUrl($view_ip_patient_admission->Consultant) ?>',1);"><div id="elh_view_ip_patient_admission_Consultant" class="view_ip_patient_admission_Consultant">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_patient_admission->Consultant->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_patient_admission->Consultant->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_patient_admission->Consultant->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_patient_admission->Anesthetist->Visible) { // Anesthetist ?>
	<?php if ($view_ip_patient_admission->sortUrl($view_ip_patient_admission->Anesthetist) == "") { ?>
		<th data-name="Anesthetist" class="<?php echo $view_ip_patient_admission->Anesthetist->headerCellClass() ?>"><div id="elh_view_ip_patient_admission_Anesthetist" class="view_ip_patient_admission_Anesthetist"><div class="ew-table-header-caption"><?php echo $view_ip_patient_admission->Anesthetist->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Anesthetist" class="<?php echo $view_ip_patient_admission->Anesthetist->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_patient_admission->SortUrl($view_ip_patient_admission->Anesthetist) ?>',1);"><div id="elh_view_ip_patient_admission_Anesthetist" class="view_ip_patient_admission_Anesthetist">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_patient_admission->Anesthetist->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_patient_admission->Anesthetist->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_patient_admission->Anesthetist->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_patient_admission->Amound->Visible) { // Amound ?>
	<?php if ($view_ip_patient_admission->sortUrl($view_ip_patient_admission->Amound) == "") { ?>
		<th data-name="Amound" class="<?php echo $view_ip_patient_admission->Amound->headerCellClass() ?>"><div id="elh_view_ip_patient_admission_Amound" class="view_ip_patient_admission_Amound"><div class="ew-table-header-caption"><?php echo $view_ip_patient_admission->Amound->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Amound" class="<?php echo $view_ip_patient_admission->Amound->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_patient_admission->SortUrl($view_ip_patient_admission->Amound) ?>',1);"><div id="elh_view_ip_patient_admission_Amound" class="view_ip_patient_admission_Amound">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_patient_admission->Amound->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_patient_admission->Amound->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_patient_admission->Amound->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_patient_admission->PartnerID->Visible) { // PartnerID ?>
	<?php if ($view_ip_patient_admission->sortUrl($view_ip_patient_admission->PartnerID) == "") { ?>
		<th data-name="PartnerID" class="<?php echo $view_ip_patient_admission->PartnerID->headerCellClass() ?>"><div id="elh_view_ip_patient_admission_PartnerID" class="view_ip_patient_admission_PartnerID"><div class="ew-table-header-caption"><?php echo $view_ip_patient_admission->PartnerID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerID" class="<?php echo $view_ip_patient_admission->PartnerID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_patient_admission->SortUrl($view_ip_patient_admission->PartnerID) ?>',1);"><div id="elh_view_ip_patient_admission_PartnerID" class="view_ip_patient_admission_PartnerID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_patient_admission->PartnerID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_patient_admission->PartnerID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_patient_admission->PartnerID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_patient_admission->PartnerName->Visible) { // PartnerName ?>
	<?php if ($view_ip_patient_admission->sortUrl($view_ip_patient_admission->PartnerName) == "") { ?>
		<th data-name="PartnerName" class="<?php echo $view_ip_patient_admission->PartnerName->headerCellClass() ?>"><div id="elh_view_ip_patient_admission_PartnerName" class="view_ip_patient_admission_PartnerName"><div class="ew-table-header-caption"><?php echo $view_ip_patient_admission->PartnerName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerName" class="<?php echo $view_ip_patient_admission->PartnerName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_patient_admission->SortUrl($view_ip_patient_admission->PartnerName) ?>',1);"><div id="elh_view_ip_patient_admission_PartnerName" class="view_ip_patient_admission_PartnerName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_patient_admission->PartnerName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_patient_admission->PartnerName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_patient_admission->PartnerName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_patient_admission->PartnerMobile->Visible) { // PartnerMobile ?>
	<?php if ($view_ip_patient_admission->sortUrl($view_ip_patient_admission->PartnerMobile) == "") { ?>
		<th data-name="PartnerMobile" class="<?php echo $view_ip_patient_admission->PartnerMobile->headerCellClass() ?>"><div id="elh_view_ip_patient_admission_PartnerMobile" class="view_ip_patient_admission_PartnerMobile"><div class="ew-table-header-caption"><?php echo $view_ip_patient_admission->PartnerMobile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerMobile" class="<?php echo $view_ip_patient_admission->PartnerMobile->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_patient_admission->SortUrl($view_ip_patient_admission->PartnerMobile) ?>',1);"><div id="elh_view_ip_patient_admission_PartnerMobile" class="view_ip_patient_admission_PartnerMobile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_patient_admission->PartnerMobile->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_patient_admission->PartnerMobile->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_patient_admission->PartnerMobile->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_patient_admission->Cid->Visible) { // Cid ?>
	<?php if ($view_ip_patient_admission->sortUrl($view_ip_patient_admission->Cid) == "") { ?>
		<th data-name="Cid" class="<?php echo $view_ip_patient_admission->Cid->headerCellClass() ?>"><div id="elh_view_ip_patient_admission_Cid" class="view_ip_patient_admission_Cid"><div class="ew-table-header-caption"><?php echo $view_ip_patient_admission->Cid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Cid" class="<?php echo $view_ip_patient_admission->Cid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_patient_admission->SortUrl($view_ip_patient_admission->Cid) ?>',1);"><div id="elh_view_ip_patient_admission_Cid" class="view_ip_patient_admission_Cid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_patient_admission->Cid->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_patient_admission->Cid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_patient_admission->Cid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_patient_admission->PartId->Visible) { // PartId ?>
	<?php if ($view_ip_patient_admission->sortUrl($view_ip_patient_admission->PartId) == "") { ?>
		<th data-name="PartId" class="<?php echo $view_ip_patient_admission->PartId->headerCellClass() ?>"><div id="elh_view_ip_patient_admission_PartId" class="view_ip_patient_admission_PartId"><div class="ew-table-header-caption"><?php echo $view_ip_patient_admission->PartId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PartId" class="<?php echo $view_ip_patient_admission->PartId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_patient_admission->SortUrl($view_ip_patient_admission->PartId) ?>',1);"><div id="elh_view_ip_patient_admission_PartId" class="view_ip_patient_admission_PartId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_patient_admission->PartId->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_patient_admission->PartId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_patient_admission->PartId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_patient_admission->IDProof->Visible) { // IDProof ?>
	<?php if ($view_ip_patient_admission->sortUrl($view_ip_patient_admission->IDProof) == "") { ?>
		<th data-name="IDProof" class="<?php echo $view_ip_patient_admission->IDProof->headerCellClass() ?>"><div id="elh_view_ip_patient_admission_IDProof" class="view_ip_patient_admission_IDProof"><div class="ew-table-header-caption"><?php echo $view_ip_patient_admission->IDProof->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IDProof" class="<?php echo $view_ip_patient_admission->IDProof->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_patient_admission->SortUrl($view_ip_patient_admission->IDProof) ?>',1);"><div id="elh_view_ip_patient_admission_IDProof" class="view_ip_patient_admission_IDProof">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_patient_admission->IDProof->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ip_patient_admission->IDProof->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_patient_admission->IDProof->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ip_patient_admission->AdviceToOtherHospital->Visible) { // AdviceToOtherHospital ?>
	<?php if ($view_ip_patient_admission->sortUrl($view_ip_patient_admission->AdviceToOtherHospital) == "") { ?>
		<th data-name="AdviceToOtherHospital" class="<?php echo $view_ip_patient_admission->AdviceToOtherHospital->headerCellClass() ?>"><div id="elh_view_ip_patient_admission_AdviceToOtherHospital" class="view_ip_patient_admission_AdviceToOtherHospital"><div class="ew-table-header-caption"><?php echo $view_ip_patient_admission->AdviceToOtherHospital->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AdviceToOtherHospital" class="<?php echo $view_ip_patient_admission->AdviceToOtherHospital->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $view_ip_patient_admission->SortUrl($view_ip_patient_admission->AdviceToOtherHospital) ?>',1);"><div id="elh_view_ip_patient_admission_AdviceToOtherHospital" class="view_ip_patient_admission_AdviceToOtherHospital">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ip_patient_admission->AdviceToOtherHospital->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ip_patient_admission->AdviceToOtherHospital->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($view_ip_patient_admission->AdviceToOtherHospital->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_ip_patient_admission_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_ip_patient_admission->ExportAll && $view_ip_patient_admission->isExport()) {
	$view_ip_patient_admission_list->StopRec = $view_ip_patient_admission_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_ip_patient_admission_list->TotalRecs > $view_ip_patient_admission_list->StartRec + $view_ip_patient_admission_list->DisplayRecs - 1)
		$view_ip_patient_admission_list->StopRec = $view_ip_patient_admission_list->StartRec + $view_ip_patient_admission_list->DisplayRecs - 1;
	else
		$view_ip_patient_admission_list->StopRec = $view_ip_patient_admission_list->TotalRecs;
}
$view_ip_patient_admission_list->RecCnt = $view_ip_patient_admission_list->StartRec - 1;
if ($view_ip_patient_admission_list->Recordset && !$view_ip_patient_admission_list->Recordset->EOF) {
	$view_ip_patient_admission_list->Recordset->moveFirst();
	$selectLimit = $view_ip_patient_admission_list->UseSelectLimit;
	if (!$selectLimit && $view_ip_patient_admission_list->StartRec > 1)
		$view_ip_patient_admission_list->Recordset->move($view_ip_patient_admission_list->StartRec - 1);
} elseif (!$view_ip_patient_admission->AllowAddDeleteRow && $view_ip_patient_admission_list->StopRec == 0) {
	$view_ip_patient_admission_list->StopRec = $view_ip_patient_admission->GridAddRowCount;
}

// Initialize aggregate
$view_ip_patient_admission->RowType = ROWTYPE_AGGREGATEINIT;
$view_ip_patient_admission->resetAttributes();
$view_ip_patient_admission_list->renderRow();
while ($view_ip_patient_admission_list->RecCnt < $view_ip_patient_admission_list->StopRec) {
	$view_ip_patient_admission_list->RecCnt++;
	if ($view_ip_patient_admission_list->RecCnt >= $view_ip_patient_admission_list->StartRec) {
		$view_ip_patient_admission_list->RowCnt++;

		// Set up key count
		$view_ip_patient_admission_list->KeyCount = $view_ip_patient_admission_list->RowIndex;

		// Init row class and style
		$view_ip_patient_admission->resetAttributes();
		$view_ip_patient_admission->CssClass = "";
		if ($view_ip_patient_admission->isGridAdd()) {
		} else {
			$view_ip_patient_admission_list->loadRowValues($view_ip_patient_admission_list->Recordset); // Load row values
		}
		$view_ip_patient_admission->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_ip_patient_admission->RowAttrs = array_merge($view_ip_patient_admission->RowAttrs, array('data-rowindex'=>$view_ip_patient_admission_list->RowCnt, 'id'=>'r' . $view_ip_patient_admission_list->RowCnt . '_view_ip_patient_admission', 'data-rowtype'=>$view_ip_patient_admission->RowType));

		// Render row
		$view_ip_patient_admission_list->renderRow();

		// Render list options
		$view_ip_patient_admission_list->renderListOptions();
?>
	<tr<?php echo $view_ip_patient_admission->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_ip_patient_admission_list->ListOptions->render("body", "left", $view_ip_patient_admission_list->RowCnt);
?>
	<?php if ($view_ip_patient_admission->id->Visible) { // id ?>
		<td data-name="id"<?php echo $view_ip_patient_admission->id->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_list->RowCnt ?>_view_ip_patient_admission_id" class="view_ip_patient_admission_id">
<span<?php echo $view_ip_patient_admission->id->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_patient_admission->mrnNo->Visible) { // mrnNo ?>
		<td data-name="mrnNo"<?php echo $view_ip_patient_admission->mrnNo->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_list->RowCnt ?>_view_ip_patient_admission_mrnNo" class="view_ip_patient_admission_mrnNo">
<span<?php echo $view_ip_patient_admission->mrnNo->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->mrnNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_patient_admission->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID"<?php echo $view_ip_patient_admission->PatientID->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_list->RowCnt ?>_view_ip_patient_admission_PatientID" class="view_ip_patient_admission_PatientID">
<span<?php echo $view_ip_patient_admission->PatientID->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->PatientID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_patient_admission->patient_name->Visible) { // patient_name ?>
		<td data-name="patient_name"<?php echo $view_ip_patient_admission->patient_name->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_list->RowCnt ?>_view_ip_patient_admission_patient_name" class="view_ip_patient_admission_patient_name">
<span<?php echo $view_ip_patient_admission->patient_name->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->patient_name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_patient_admission->mobileno->Visible) { // mobileno ?>
		<td data-name="mobileno"<?php echo $view_ip_patient_admission->mobileno->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_list->RowCnt ?>_view_ip_patient_admission_mobileno" class="view_ip_patient_admission_mobileno">
<span<?php echo $view_ip_patient_admission->mobileno->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->mobileno->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_patient_admission->admission_date->Visible) { // admission_date ?>
		<td data-name="admission_date"<?php echo $view_ip_patient_admission->admission_date->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_list->RowCnt ?>_view_ip_patient_admission_admission_date" class="view_ip_patient_admission_admission_date">
<span<?php echo $view_ip_patient_admission->admission_date->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->admission_date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_patient_admission->release_date->Visible) { // release_date ?>
		<td data-name="release_date"<?php echo $view_ip_patient_admission->release_date->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_list->RowCnt ?>_view_ip_patient_admission_release_date" class="view_ip_patient_admission_release_date">
<span<?php echo $view_ip_patient_admission->release_date->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->release_date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_patient_admission->PaymentStatus->Visible) { // PaymentStatus ?>
		<td data-name="PaymentStatus"<?php echo $view_ip_patient_admission->PaymentStatus->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_list->RowCnt ?>_view_ip_patient_admission_PaymentStatus" class="view_ip_patient_admission_PaymentStatus">
<span<?php echo $view_ip_patient_admission->PaymentStatus->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->PaymentStatus->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_patient_admission->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $view_ip_patient_admission->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_list->RowCnt ?>_view_ip_patient_admission_HospID" class="view_ip_patient_admission_HospID">
<span<?php echo $view_ip_patient_admission->HospID->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_patient_admission->ReferedByDr->Visible) { // ReferedByDr ?>
		<td data-name="ReferedByDr"<?php echo $view_ip_patient_admission->ReferedByDr->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_list->RowCnt ?>_view_ip_patient_admission_ReferedByDr" class="view_ip_patient_admission_ReferedByDr">
<span<?php echo $view_ip_patient_admission->ReferedByDr->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->ReferedByDr->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_patient_admission->BillClosing->Visible) { // BillClosing ?>
		<td data-name="BillClosing"<?php echo $view_ip_patient_admission->BillClosing->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_list->RowCnt ?>_view_ip_patient_admission_BillClosing" class="view_ip_patient_admission_BillClosing">
<span<?php echo $view_ip_patient_admission->BillClosing->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->BillClosing->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_patient_admission->BillClosingDate->Visible) { // BillClosingDate ?>
		<td data-name="BillClosingDate"<?php echo $view_ip_patient_admission->BillClosingDate->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_list->RowCnt ?>_view_ip_patient_admission_BillClosingDate" class="view_ip_patient_admission_BillClosingDate">
<span<?php echo $view_ip_patient_admission->BillClosingDate->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->BillClosingDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_patient_admission->BillNumber->Visible) { // BillNumber ?>
		<td data-name="BillNumber"<?php echo $view_ip_patient_admission->BillNumber->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_list->RowCnt ?>_view_ip_patient_admission_BillNumber" class="view_ip_patient_admission_BillNumber">
<span<?php echo $view_ip_patient_admission->BillNumber->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->BillNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_patient_admission->Procedure->Visible) { // Procedure ?>
		<td data-name="Procedure"<?php echo $view_ip_patient_admission->Procedure->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_list->RowCnt ?>_view_ip_patient_admission_Procedure" class="view_ip_patient_admission_Procedure">
<span<?php echo $view_ip_patient_admission->Procedure->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->Procedure->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_patient_admission->Consultant->Visible) { // Consultant ?>
		<td data-name="Consultant"<?php echo $view_ip_patient_admission->Consultant->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_list->RowCnt ?>_view_ip_patient_admission_Consultant" class="view_ip_patient_admission_Consultant">
<span<?php echo $view_ip_patient_admission->Consultant->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->Consultant->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_patient_admission->Anesthetist->Visible) { // Anesthetist ?>
		<td data-name="Anesthetist"<?php echo $view_ip_patient_admission->Anesthetist->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_list->RowCnt ?>_view_ip_patient_admission_Anesthetist" class="view_ip_patient_admission_Anesthetist">
<span<?php echo $view_ip_patient_admission->Anesthetist->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->Anesthetist->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_patient_admission->Amound->Visible) { // Amound ?>
		<td data-name="Amound"<?php echo $view_ip_patient_admission->Amound->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_list->RowCnt ?>_view_ip_patient_admission_Amound" class="view_ip_patient_admission_Amound">
<span<?php echo $view_ip_patient_admission->Amound->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->Amound->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_patient_admission->PartnerID->Visible) { // PartnerID ?>
		<td data-name="PartnerID"<?php echo $view_ip_patient_admission->PartnerID->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_list->RowCnt ?>_view_ip_patient_admission_PartnerID" class="view_ip_patient_admission_PartnerID">
<span<?php echo $view_ip_patient_admission->PartnerID->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->PartnerID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_patient_admission->PartnerName->Visible) { // PartnerName ?>
		<td data-name="PartnerName"<?php echo $view_ip_patient_admission->PartnerName->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_list->RowCnt ?>_view_ip_patient_admission_PartnerName" class="view_ip_patient_admission_PartnerName">
<span<?php echo $view_ip_patient_admission->PartnerName->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->PartnerName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_patient_admission->PartnerMobile->Visible) { // PartnerMobile ?>
		<td data-name="PartnerMobile"<?php echo $view_ip_patient_admission->PartnerMobile->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_list->RowCnt ?>_view_ip_patient_admission_PartnerMobile" class="view_ip_patient_admission_PartnerMobile">
<span<?php echo $view_ip_patient_admission->PartnerMobile->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->PartnerMobile->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_patient_admission->Cid->Visible) { // Cid ?>
		<td data-name="Cid"<?php echo $view_ip_patient_admission->Cid->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_list->RowCnt ?>_view_ip_patient_admission_Cid" class="view_ip_patient_admission_Cid">
<span<?php echo $view_ip_patient_admission->Cid->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->Cid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_patient_admission->PartId->Visible) { // PartId ?>
		<td data-name="PartId"<?php echo $view_ip_patient_admission->PartId->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_list->RowCnt ?>_view_ip_patient_admission_PartId" class="view_ip_patient_admission_PartId">
<span<?php echo $view_ip_patient_admission->PartId->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->PartId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_patient_admission->IDProof->Visible) { // IDProof ?>
		<td data-name="IDProof"<?php echo $view_ip_patient_admission->IDProof->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_list->RowCnt ?>_view_ip_patient_admission_IDProof" class="view_ip_patient_admission_IDProof">
<span<?php echo $view_ip_patient_admission->IDProof->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->IDProof->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ip_patient_admission->AdviceToOtherHospital->Visible) { // AdviceToOtherHospital ?>
		<td data-name="AdviceToOtherHospital"<?php echo $view_ip_patient_admission->AdviceToOtherHospital->cellAttributes() ?>>
<span id="el<?php echo $view_ip_patient_admission_list->RowCnt ?>_view_ip_patient_admission_AdviceToOtherHospital" class="view_ip_patient_admission_AdviceToOtherHospital">
<span<?php echo $view_ip_patient_admission->AdviceToOtherHospital->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->AdviceToOtherHospital->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_ip_patient_admission_list->ListOptions->render("body", "right", $view_ip_patient_admission_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$view_ip_patient_admission->isGridAdd())
		$view_ip_patient_admission_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$view_ip_patient_admission->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_ip_patient_admission_list->Recordset)
	$view_ip_patient_admission_list->Recordset->Close();
?>
<?php if (!$view_ip_patient_admission->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_ip_patient_admission->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($view_ip_patient_admission_list->Pager)) $view_ip_patient_admission_list->Pager = new NumericPager($view_ip_patient_admission_list->StartRec, $view_ip_patient_admission_list->DisplayRecs, $view_ip_patient_admission_list->TotalRecs, $view_ip_patient_admission_list->RecRange, $view_ip_patient_admission_list->AutoHidePager) ?>
<?php if ($view_ip_patient_admission_list->Pager->RecordCount > 0 && $view_ip_patient_admission_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($view_ip_patient_admission_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ip_patient_admission_list->pageUrl() ?>start=<?php echo $view_ip_patient_admission_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($view_ip_patient_admission_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ip_patient_admission_list->pageUrl() ?>start=<?php echo $view_ip_patient_admission_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($view_ip_patient_admission_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $view_ip_patient_admission_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($view_ip_patient_admission_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ip_patient_admission_list->pageUrl() ?>start=<?php echo $view_ip_patient_admission_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($view_ip_patient_admission_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $view_ip_patient_admission_list->pageUrl() ?>start=<?php echo $view_ip_patient_admission_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($view_ip_patient_admission_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_ip_patient_admission_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_ip_patient_admission_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_ip_patient_admission_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($view_ip_patient_admission_list->TotalRecs > 0 && (!$view_ip_patient_admission_list->AutoHidePageSizeSelector || $view_ip_patient_admission_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="view_ip_patient_admission">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="10"<?php if ($view_ip_patient_admission_list->DisplayRecs == 10) { ?> selected<?php } ?>>10</option>
<option value="20"<?php if ($view_ip_patient_admission_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($view_ip_patient_admission_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($view_ip_patient_admission_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($view_ip_patient_admission_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($view_ip_patient_admission_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($view_ip_patient_admission_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($view_ip_patient_admission->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_ip_patient_admission_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_ip_patient_admission_list->TotalRecs == 0 && !$view_ip_patient_admission->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_ip_patient_admission_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_ip_patient_admission_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_ip_patient_admission->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$view_ip_patient_admission->isExport()) { ?>
<script>
ew.scrollableTable("gmp_view_ip_patient_admission", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_ip_patient_admission_list->terminate();
?>