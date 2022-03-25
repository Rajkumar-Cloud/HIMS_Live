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
$patient_vitals_list = new patient_vitals_list();

// Run the page
$patient_vitals_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_vitals_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$patient_vitals->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fpatient_vitalslist = currentForm = new ew.Form("fpatient_vitalslist", "list");
fpatient_vitalslist.formKeyCountName = '<?php echo $patient_vitals_list->FormKeyCountName ?>';

// Form_CustomValidate event
fpatient_vitalslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_vitalslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatient_vitalslist.lists["x_AnticoagulantifAny"] = <?php echo $patient_vitals_list->AnticoagulantifAny->Lookup->toClientList() ?>;
fpatient_vitalslist.lists["x_AnticoagulantifAny"].options = <?php echo JsonEncode($patient_vitals_list->AnticoagulantifAny->lookupOptions()) ?>;
fpatient_vitalslist.autoSuggests["x_AnticoagulantifAny"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpatient_vitalslist.lists["x_GenericAllergies[]"] = <?php echo $patient_vitals_list->GenericAllergies->Lookup->toClientList() ?>;
fpatient_vitalslist.lists["x_GenericAllergies[]"].options = <?php echo JsonEncode($patient_vitals_list->GenericAllergies->lookupOptions()) ?>;
fpatient_vitalslist.lists["x_GroupAllergies[]"] = <?php echo $patient_vitals_list->GroupAllergies->Lookup->toClientList() ?>;
fpatient_vitalslist.lists["x_GroupAllergies[]"].options = <?php echo JsonEncode($patient_vitals_list->GroupAllergies->lookupOptions()) ?>;
fpatient_vitalslist.lists["x_clinicaldetails[]"] = <?php echo $patient_vitals_list->clinicaldetails->Lookup->toClientList() ?>;
fpatient_vitalslist.lists["x_clinicaldetails[]"].options = <?php echo JsonEncode($patient_vitals_list->clinicaldetails->lookupOptions()) ?>;
fpatient_vitalslist.lists["x_status"] = <?php echo $patient_vitals_list->status->Lookup->toClientList() ?>;
fpatient_vitalslist.lists["x_status"].options = <?php echo JsonEncode($patient_vitals_list->status->lookupOptions()) ?>;

// Form object for search
var fpatient_vitalslistsrch = currentSearchForm = new ew.Form("fpatient_vitalslistsrch");

// Validate function for search
fpatient_vitalslistsrch.validate = function(fobj) {
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
fpatient_vitalslistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_vitalslistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

fpatient_vitalslistsrch.filterList = <?php echo $patient_vitals_list->getFilterList() ?>;
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
<?php if (!$patient_vitals->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($patient_vitals_list->TotalRecs > 0 && $patient_vitals_list->ExportOptions->visible()) { ?>
<?php $patient_vitals_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($patient_vitals_list->ImportOptions->visible()) { ?>
<?php $patient_vitals_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($patient_vitals_list->SearchOptions->visible()) { ?>
<?php $patient_vitals_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($patient_vitals_list->FilterOptions->visible()) { ?>
<?php $patient_vitals_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$patient_vitals->isExport() || EXPORT_MASTER_RECORD && $patient_vitals->isExport("print")) { ?>
<?php
if ($patient_vitals_list->DbMasterFilter <> "" && $patient_vitals->getCurrentMasterTable() == "ip_admission") {
	if ($patient_vitals_list->MasterRecordExists) {
		include_once "ip_admissionmaster.php";
	}
}
?>
<?php } ?>
<?php
$patient_vitals_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$patient_vitals->isExport() && !$patient_vitals->CurrentAction) { ?>
<form name="fpatient_vitalslistsrch" id="fpatient_vitalslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($patient_vitals_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fpatient_vitalslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="patient_vitals">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$patient_vitals_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$patient_vitals->RowType = ROWTYPE_SEARCH;

// Render row
$patient_vitals->resetAttributes();
$patient_vitals_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($patient_vitals->mrnno->Visible) { // mrnno ?>
	<div id="xsc_mrnno" class="ew-cell form-group">
		<label for="x_mrnno" class="ew-search-caption ew-label"><?php echo $patient_vitals->mrnno->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_mrnno" id="z_mrnno" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="patient_vitals" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->mrnno->EditValue ?>"<?php echo $patient_vitals->mrnno->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($patient_vitals->PatientName->Visible) { // PatientName ?>
	<div id="xsc_PatientName" class="ew-cell form-group">
		<label for="x_PatientName" class="ew-search-caption ew-label"><?php echo $patient_vitals->PatientName->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="patient_vitals" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->PatientName->EditValue ?>"<?php echo $patient_vitals->PatientName->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($patient_vitals->PatID->Visible) { // PatID ?>
	<div id="xsc_PatID" class="ew-cell form-group">
		<label for="x_PatID" class="ew-search-caption ew-label"><?php echo $patient_vitals->PatID->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatID" id="z_PatID" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="patient_vitals" data-field="x_PatID" name="x_PatID" id="x_PatID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->PatID->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->PatID->EditValue ?>"<?php echo $patient_vitals->PatID->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($patient_vitals->MobileNumber->Visible) { // MobileNumber ?>
	<div id="xsc_MobileNumber" class="ew-cell form-group">
		<label for="x_MobileNumber" class="ew-search-caption ew-label"><?php echo $patient_vitals->MobileNumber->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_MobileNumber" id="z_MobileNumber" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="patient_vitals" data-field="x_MobileNumber" name="x_MobileNumber" id="x_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $patient_vitals->MobileNumber->EditValue ?>"<?php echo $patient_vitals->MobileNumber->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($patient_vitals_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($patient_vitals_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $patient_vitals_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($patient_vitals_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($patient_vitals_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($patient_vitals_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($patient_vitals_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $patient_vitals_list->showPageHeader(); ?>
<?php
$patient_vitals_list->showMessage();
?>
<?php if ($patient_vitals_list->TotalRecs > 0 || $patient_vitals->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($patient_vitals_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_vitals">
<?php if (!$patient_vitals->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$patient_vitals->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($patient_vitals_list->Pager)) $patient_vitals_list->Pager = new NumericPager($patient_vitals_list->StartRec, $patient_vitals_list->DisplayRecs, $patient_vitals_list->TotalRecs, $patient_vitals_list->RecRange, $patient_vitals_list->AutoHidePager) ?>
<?php if ($patient_vitals_list->Pager->RecordCount > 0 && $patient_vitals_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($patient_vitals_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_vitals_list->pageUrl() ?>start=<?php echo $patient_vitals_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($patient_vitals_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_vitals_list->pageUrl() ?>start=<?php echo $patient_vitals_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($patient_vitals_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $patient_vitals_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($patient_vitals_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_vitals_list->pageUrl() ?>start=<?php echo $patient_vitals_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($patient_vitals_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_vitals_list->pageUrl() ?>start=<?php echo $patient_vitals_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($patient_vitals_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $patient_vitals_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $patient_vitals_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $patient_vitals_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($patient_vitals_list->TotalRecs > 0 && (!$patient_vitals_list->AutoHidePageSizeSelector || $patient_vitals_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="patient_vitals">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($patient_vitals_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($patient_vitals_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($patient_vitals_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($patient_vitals_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($patient_vitals_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($patient_vitals_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($patient_vitals->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $patient_vitals_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpatient_vitalslist" id="fpatient_vitalslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_vitals_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_vitals_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_vitals">
<?php if ($patient_vitals->getCurrentMasterTable() == "ip_admission" && $patient_vitals->CurrentAction) { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="ip_admission">
<input type="hidden" name="fk_id" value="<?php echo $patient_vitals->Reception->getSessionValue() ?>">
<input type="hidden" name="fk_patient_id" value="<?php echo $patient_vitals->PatientId->getSessionValue() ?>">
<input type="hidden" name="fk_mrnNo" value="<?php echo $patient_vitals->mrnno->getSessionValue() ?>">
<?php } ?>
<div id="gmp_patient_vitals" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($patient_vitals_list->TotalRecs > 0 || $patient_vitals->isGridEdit()) { ?>
<table id="tbl_patient_vitalslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$patient_vitals_list->RowType = ROWTYPE_HEADER;

// Render list options
$patient_vitals_list->renderListOptions();

// Render list options (header, left)
$patient_vitals_list->ListOptions->render("header", "left");
?>
<?php if ($patient_vitals->id->Visible) { // id ?>
	<?php if ($patient_vitals->sortUrl($patient_vitals->id) == "") { ?>
		<th data-name="id" class="<?php echo $patient_vitals->id->headerCellClass() ?>"><div id="elh_patient_vitals_id" class="patient_vitals_id"><div class="ew-table-header-caption"><?php echo $patient_vitals->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $patient_vitals->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_vitals->SortUrl($patient_vitals->id) ?>',1);"><div id="elh_patient_vitals_id" class="patient_vitals_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_vitals->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->mrnno->Visible) { // mrnno ?>
	<?php if ($patient_vitals->sortUrl($patient_vitals->mrnno) == "") { ?>
		<th data-name="mrnno" class="<?php echo $patient_vitals->mrnno->headerCellClass() ?>"><div id="elh_patient_vitals_mrnno" class="patient_vitals_mrnno"><div class="ew-table-header-caption"><?php echo $patient_vitals->mrnno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnno" class="<?php echo $patient_vitals->mrnno->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_vitals->SortUrl($patient_vitals->mrnno) ?>',1);"><div id="elh_patient_vitals_mrnno" class="patient_vitals_mrnno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals->mrnno->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals->mrnno->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_vitals->mrnno->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->PatientName->Visible) { // PatientName ?>
	<?php if ($patient_vitals->sortUrl($patient_vitals->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $patient_vitals->PatientName->headerCellClass() ?>"><div id="elh_patient_vitals_PatientName" class="patient_vitals_PatientName"><div class="ew-table-header-caption"><?php echo $patient_vitals->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $patient_vitals->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_vitals->SortUrl($patient_vitals->PatientName) ?>',1);"><div id="elh_patient_vitals_PatientName" class="patient_vitals_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_vitals->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->PatID->Visible) { // PatID ?>
	<?php if ($patient_vitals->sortUrl($patient_vitals->PatID) == "") { ?>
		<th data-name="PatID" class="<?php echo $patient_vitals->PatID->headerCellClass() ?>"><div id="elh_patient_vitals_PatID" class="patient_vitals_PatID"><div class="ew-table-header-caption"><?php echo $patient_vitals->PatID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatID" class="<?php echo $patient_vitals->PatID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_vitals->SortUrl($patient_vitals->PatID) ?>',1);"><div id="elh_patient_vitals_PatID" class="patient_vitals_PatID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals->PatID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals->PatID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_vitals->PatID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->MobileNumber->Visible) { // MobileNumber ?>
	<?php if ($patient_vitals->sortUrl($patient_vitals->MobileNumber) == "") { ?>
		<th data-name="MobileNumber" class="<?php echo $patient_vitals->MobileNumber->headerCellClass() ?>"><div id="elh_patient_vitals_MobileNumber" class="patient_vitals_MobileNumber"><div class="ew-table-header-caption"><?php echo $patient_vitals->MobileNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MobileNumber" class="<?php echo $patient_vitals->MobileNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_vitals->SortUrl($patient_vitals->MobileNumber) ?>',1);"><div id="elh_patient_vitals_MobileNumber" class="patient_vitals_MobileNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals->MobileNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals->MobileNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_vitals->MobileNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->HT->Visible) { // HT ?>
	<?php if ($patient_vitals->sortUrl($patient_vitals->HT) == "") { ?>
		<th data-name="HT" class="<?php echo $patient_vitals->HT->headerCellClass() ?>"><div id="elh_patient_vitals_HT" class="patient_vitals_HT"><div class="ew-table-header-caption"><?php echo $patient_vitals->HT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HT" class="<?php echo $patient_vitals->HT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_vitals->SortUrl($patient_vitals->HT) ?>',1);"><div id="elh_patient_vitals_HT" class="patient_vitals_HT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals->HT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals->HT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_vitals->HT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->WT->Visible) { // WT ?>
	<?php if ($patient_vitals->sortUrl($patient_vitals->WT) == "") { ?>
		<th data-name="WT" class="<?php echo $patient_vitals->WT->headerCellClass() ?>"><div id="elh_patient_vitals_WT" class="patient_vitals_WT"><div class="ew-table-header-caption"><?php echo $patient_vitals->WT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="WT" class="<?php echo $patient_vitals->WT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_vitals->SortUrl($patient_vitals->WT) ?>',1);"><div id="elh_patient_vitals_WT" class="patient_vitals_WT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals->WT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals->WT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_vitals->WT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->SurfaceArea->Visible) { // SurfaceArea ?>
	<?php if ($patient_vitals->sortUrl($patient_vitals->SurfaceArea) == "") { ?>
		<th data-name="SurfaceArea" class="<?php echo $patient_vitals->SurfaceArea->headerCellClass() ?>"><div id="elh_patient_vitals_SurfaceArea" class="patient_vitals_SurfaceArea"><div class="ew-table-header-caption"><?php echo $patient_vitals->SurfaceArea->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SurfaceArea" class="<?php echo $patient_vitals->SurfaceArea->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_vitals->SortUrl($patient_vitals->SurfaceArea) ?>',1);"><div id="elh_patient_vitals_SurfaceArea" class="patient_vitals_SurfaceArea">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals->SurfaceArea->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals->SurfaceArea->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_vitals->SurfaceArea->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->BodyMassIndex->Visible) { // BodyMassIndex ?>
	<?php if ($patient_vitals->sortUrl($patient_vitals->BodyMassIndex) == "") { ?>
		<th data-name="BodyMassIndex" class="<?php echo $patient_vitals->BodyMassIndex->headerCellClass() ?>"><div id="elh_patient_vitals_BodyMassIndex" class="patient_vitals_BodyMassIndex"><div class="ew-table-header-caption"><?php echo $patient_vitals->BodyMassIndex->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BodyMassIndex" class="<?php echo $patient_vitals->BodyMassIndex->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_vitals->SortUrl($patient_vitals->BodyMassIndex) ?>',1);"><div id="elh_patient_vitals_BodyMassIndex" class="patient_vitals_BodyMassIndex">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals->BodyMassIndex->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals->BodyMassIndex->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_vitals->BodyMassIndex->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->AnticoagulantifAny->Visible) { // AnticoagulantifAny ?>
	<?php if ($patient_vitals->sortUrl($patient_vitals->AnticoagulantifAny) == "") { ?>
		<th data-name="AnticoagulantifAny" class="<?php echo $patient_vitals->AnticoagulantifAny->headerCellClass() ?>"><div id="elh_patient_vitals_AnticoagulantifAny" class="patient_vitals_AnticoagulantifAny"><div class="ew-table-header-caption"><?php echo $patient_vitals->AnticoagulantifAny->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AnticoagulantifAny" class="<?php echo $patient_vitals->AnticoagulantifAny->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_vitals->SortUrl($patient_vitals->AnticoagulantifAny) ?>',1);"><div id="elh_patient_vitals_AnticoagulantifAny" class="patient_vitals_AnticoagulantifAny">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals->AnticoagulantifAny->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals->AnticoagulantifAny->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_vitals->AnticoagulantifAny->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->FoodAllergies->Visible) { // FoodAllergies ?>
	<?php if ($patient_vitals->sortUrl($patient_vitals->FoodAllergies) == "") { ?>
		<th data-name="FoodAllergies" class="<?php echo $patient_vitals->FoodAllergies->headerCellClass() ?>"><div id="elh_patient_vitals_FoodAllergies" class="patient_vitals_FoodAllergies"><div class="ew-table-header-caption"><?php echo $patient_vitals->FoodAllergies->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FoodAllergies" class="<?php echo $patient_vitals->FoodAllergies->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_vitals->SortUrl($patient_vitals->FoodAllergies) ?>',1);"><div id="elh_patient_vitals_FoodAllergies" class="patient_vitals_FoodAllergies">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals->FoodAllergies->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals->FoodAllergies->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_vitals->FoodAllergies->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->GenericAllergies->Visible) { // GenericAllergies ?>
	<?php if ($patient_vitals->sortUrl($patient_vitals->GenericAllergies) == "") { ?>
		<th data-name="GenericAllergies" class="<?php echo $patient_vitals->GenericAllergies->headerCellClass() ?>"><div id="elh_patient_vitals_GenericAllergies" class="patient_vitals_GenericAllergies"><div class="ew-table-header-caption"><?php echo $patient_vitals->GenericAllergies->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GenericAllergies" class="<?php echo $patient_vitals->GenericAllergies->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_vitals->SortUrl($patient_vitals->GenericAllergies) ?>',1);"><div id="elh_patient_vitals_GenericAllergies" class="patient_vitals_GenericAllergies">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals->GenericAllergies->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals->GenericAllergies->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_vitals->GenericAllergies->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->GroupAllergies->Visible) { // GroupAllergies ?>
	<?php if ($patient_vitals->sortUrl($patient_vitals->GroupAllergies) == "") { ?>
		<th data-name="GroupAllergies" class="<?php echo $patient_vitals->GroupAllergies->headerCellClass() ?>"><div id="elh_patient_vitals_GroupAllergies" class="patient_vitals_GroupAllergies"><div class="ew-table-header-caption"><?php echo $patient_vitals->GroupAllergies->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GroupAllergies" class="<?php echo $patient_vitals->GroupAllergies->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_vitals->SortUrl($patient_vitals->GroupAllergies) ?>',1);"><div id="elh_patient_vitals_GroupAllergies" class="patient_vitals_GroupAllergies">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals->GroupAllergies->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals->GroupAllergies->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_vitals->GroupAllergies->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->Temp->Visible) { // Temp ?>
	<?php if ($patient_vitals->sortUrl($patient_vitals->Temp) == "") { ?>
		<th data-name="Temp" class="<?php echo $patient_vitals->Temp->headerCellClass() ?>"><div id="elh_patient_vitals_Temp" class="patient_vitals_Temp"><div class="ew-table-header-caption"><?php echo $patient_vitals->Temp->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Temp" class="<?php echo $patient_vitals->Temp->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_vitals->SortUrl($patient_vitals->Temp) ?>',1);"><div id="elh_patient_vitals_Temp" class="patient_vitals_Temp">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals->Temp->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals->Temp->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_vitals->Temp->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->Pulse->Visible) { // Pulse ?>
	<?php if ($patient_vitals->sortUrl($patient_vitals->Pulse) == "") { ?>
		<th data-name="Pulse" class="<?php echo $patient_vitals->Pulse->headerCellClass() ?>"><div id="elh_patient_vitals_Pulse" class="patient_vitals_Pulse"><div class="ew-table-header-caption"><?php echo $patient_vitals->Pulse->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pulse" class="<?php echo $patient_vitals->Pulse->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_vitals->SortUrl($patient_vitals->Pulse) ?>',1);"><div id="elh_patient_vitals_Pulse" class="patient_vitals_Pulse">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals->Pulse->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals->Pulse->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_vitals->Pulse->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->BP->Visible) { // BP ?>
	<?php if ($patient_vitals->sortUrl($patient_vitals->BP) == "") { ?>
		<th data-name="BP" class="<?php echo $patient_vitals->BP->headerCellClass() ?>"><div id="elh_patient_vitals_BP" class="patient_vitals_BP"><div class="ew-table-header-caption"><?php echo $patient_vitals->BP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BP" class="<?php echo $patient_vitals->BP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_vitals->SortUrl($patient_vitals->BP) ?>',1);"><div id="elh_patient_vitals_BP" class="patient_vitals_BP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals->BP->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals->BP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_vitals->BP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->PR->Visible) { // PR ?>
	<?php if ($patient_vitals->sortUrl($patient_vitals->PR) == "") { ?>
		<th data-name="PR" class="<?php echo $patient_vitals->PR->headerCellClass() ?>"><div id="elh_patient_vitals_PR" class="patient_vitals_PR"><div class="ew-table-header-caption"><?php echo $patient_vitals->PR->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PR" class="<?php echo $patient_vitals->PR->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_vitals->SortUrl($patient_vitals->PR) ?>',1);"><div id="elh_patient_vitals_PR" class="patient_vitals_PR">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals->PR->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals->PR->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_vitals->PR->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->CNS->Visible) { // CNS ?>
	<?php if ($patient_vitals->sortUrl($patient_vitals->CNS) == "") { ?>
		<th data-name="CNS" class="<?php echo $patient_vitals->CNS->headerCellClass() ?>"><div id="elh_patient_vitals_CNS" class="patient_vitals_CNS"><div class="ew-table-header-caption"><?php echo $patient_vitals->CNS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CNS" class="<?php echo $patient_vitals->CNS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_vitals->SortUrl($patient_vitals->CNS) ?>',1);"><div id="elh_patient_vitals_CNS" class="patient_vitals_CNS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals->CNS->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals->CNS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_vitals->CNS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->RSA->Visible) { // RSA ?>
	<?php if ($patient_vitals->sortUrl($patient_vitals->RSA) == "") { ?>
		<th data-name="RSA" class="<?php echo $patient_vitals->RSA->headerCellClass() ?>"><div id="elh_patient_vitals_RSA" class="patient_vitals_RSA"><div class="ew-table-header-caption"><?php echo $patient_vitals->RSA->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RSA" class="<?php echo $patient_vitals->RSA->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_vitals->SortUrl($patient_vitals->RSA) ?>',1);"><div id="elh_patient_vitals_RSA" class="patient_vitals_RSA">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals->RSA->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals->RSA->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_vitals->RSA->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->CVS->Visible) { // CVS ?>
	<?php if ($patient_vitals->sortUrl($patient_vitals->CVS) == "") { ?>
		<th data-name="CVS" class="<?php echo $patient_vitals->CVS->headerCellClass() ?>"><div id="elh_patient_vitals_CVS" class="patient_vitals_CVS"><div class="ew-table-header-caption"><?php echo $patient_vitals->CVS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CVS" class="<?php echo $patient_vitals->CVS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_vitals->SortUrl($patient_vitals->CVS) ?>',1);"><div id="elh_patient_vitals_CVS" class="patient_vitals_CVS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals->CVS->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals->CVS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_vitals->CVS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->PA->Visible) { // PA ?>
	<?php if ($patient_vitals->sortUrl($patient_vitals->PA) == "") { ?>
		<th data-name="PA" class="<?php echo $patient_vitals->PA->headerCellClass() ?>"><div id="elh_patient_vitals_PA" class="patient_vitals_PA"><div class="ew-table-header-caption"><?php echo $patient_vitals->PA->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PA" class="<?php echo $patient_vitals->PA->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_vitals->SortUrl($patient_vitals->PA) ?>',1);"><div id="elh_patient_vitals_PA" class="patient_vitals_PA">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals->PA->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals->PA->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_vitals->PA->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->PS->Visible) { // PS ?>
	<?php if ($patient_vitals->sortUrl($patient_vitals->PS) == "") { ?>
		<th data-name="PS" class="<?php echo $patient_vitals->PS->headerCellClass() ?>"><div id="elh_patient_vitals_PS" class="patient_vitals_PS"><div class="ew-table-header-caption"><?php echo $patient_vitals->PS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PS" class="<?php echo $patient_vitals->PS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_vitals->SortUrl($patient_vitals->PS) ?>',1);"><div id="elh_patient_vitals_PS" class="patient_vitals_PS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals->PS->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals->PS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_vitals->PS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->PV->Visible) { // PV ?>
	<?php if ($patient_vitals->sortUrl($patient_vitals->PV) == "") { ?>
		<th data-name="PV" class="<?php echo $patient_vitals->PV->headerCellClass() ?>"><div id="elh_patient_vitals_PV" class="patient_vitals_PV"><div class="ew-table-header-caption"><?php echo $patient_vitals->PV->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PV" class="<?php echo $patient_vitals->PV->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_vitals->SortUrl($patient_vitals->PV) ?>',1);"><div id="elh_patient_vitals_PV" class="patient_vitals_PV">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals->PV->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals->PV->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_vitals->PV->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->clinicaldetails->Visible) { // clinicaldetails ?>
	<?php if ($patient_vitals->sortUrl($patient_vitals->clinicaldetails) == "") { ?>
		<th data-name="clinicaldetails" class="<?php echo $patient_vitals->clinicaldetails->headerCellClass() ?>"><div id="elh_patient_vitals_clinicaldetails" class="patient_vitals_clinicaldetails"><div class="ew-table-header-caption"><?php echo $patient_vitals->clinicaldetails->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="clinicaldetails" class="<?php echo $patient_vitals->clinicaldetails->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_vitals->SortUrl($patient_vitals->clinicaldetails) ?>',1);"><div id="elh_patient_vitals_clinicaldetails" class="patient_vitals_clinicaldetails">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals->clinicaldetails->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals->clinicaldetails->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_vitals->clinicaldetails->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->status->Visible) { // status ?>
	<?php if ($patient_vitals->sortUrl($patient_vitals->status) == "") { ?>
		<th data-name="status" class="<?php echo $patient_vitals->status->headerCellClass() ?>"><div id="elh_patient_vitals_status" class="patient_vitals_status"><div class="ew-table-header-caption"><?php echo $patient_vitals->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $patient_vitals->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_vitals->SortUrl($patient_vitals->status) ?>',1);"><div id="elh_patient_vitals_status" class="patient_vitals_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_vitals->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->createdby->Visible) { // createdby ?>
	<?php if ($patient_vitals->sortUrl($patient_vitals->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $patient_vitals->createdby->headerCellClass() ?>"><div id="elh_patient_vitals_createdby" class="patient_vitals_createdby"><div class="ew-table-header-caption"><?php echo $patient_vitals->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $patient_vitals->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_vitals->SortUrl($patient_vitals->createdby) ?>',1);"><div id="elh_patient_vitals_createdby" class="patient_vitals_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals->createdby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_vitals->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->createddatetime->Visible) { // createddatetime ?>
	<?php if ($patient_vitals->sortUrl($patient_vitals->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $patient_vitals->createddatetime->headerCellClass() ?>"><div id="elh_patient_vitals_createddatetime" class="patient_vitals_createddatetime"><div class="ew-table-header-caption"><?php echo $patient_vitals->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $patient_vitals->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_vitals->SortUrl($patient_vitals->createddatetime) ?>',1);"><div id="elh_patient_vitals_createddatetime" class="patient_vitals_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_vitals->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->modifiedby->Visible) { // modifiedby ?>
	<?php if ($patient_vitals->sortUrl($patient_vitals->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $patient_vitals->modifiedby->headerCellClass() ?>"><div id="elh_patient_vitals_modifiedby" class="patient_vitals_modifiedby"><div class="ew-table-header-caption"><?php echo $patient_vitals->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $patient_vitals->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_vitals->SortUrl($patient_vitals->modifiedby) ?>',1);"><div id="elh_patient_vitals_modifiedby" class="patient_vitals_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals->modifiedby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_vitals->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($patient_vitals->sortUrl($patient_vitals->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $patient_vitals->modifieddatetime->headerCellClass() ?>"><div id="elh_patient_vitals_modifieddatetime" class="patient_vitals_modifieddatetime"><div class="ew-table-header-caption"><?php echo $patient_vitals->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $patient_vitals->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_vitals->SortUrl($patient_vitals->modifieddatetime) ?>',1);"><div id="elh_patient_vitals_modifieddatetime" class="patient_vitals_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_vitals->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->Age->Visible) { // Age ?>
	<?php if ($patient_vitals->sortUrl($patient_vitals->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $patient_vitals->Age->headerCellClass() ?>"><div id="elh_patient_vitals_Age" class="patient_vitals_Age"><div class="ew-table-header-caption"><?php echo $patient_vitals->Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $patient_vitals->Age->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_vitals->SortUrl($patient_vitals->Age) ?>',1);"><div id="elh_patient_vitals_Age" class="patient_vitals_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals->Age->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals->Age->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_vitals->Age->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->Gender->Visible) { // Gender ?>
	<?php if ($patient_vitals->sortUrl($patient_vitals->Gender) == "") { ?>
		<th data-name="Gender" class="<?php echo $patient_vitals->Gender->headerCellClass() ?>"><div id="elh_patient_vitals_Gender" class="patient_vitals_Gender"><div class="ew-table-header-caption"><?php echo $patient_vitals->Gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gender" class="<?php echo $patient_vitals->Gender->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_vitals->SortUrl($patient_vitals->Gender) ?>',1);"><div id="elh_patient_vitals_Gender" class="patient_vitals_Gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals->Gender->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals->Gender->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_vitals->Gender->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->PatientId->Visible) { // PatientId ?>
	<?php if ($patient_vitals->sortUrl($patient_vitals->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $patient_vitals->PatientId->headerCellClass() ?>"><div id="elh_patient_vitals_PatientId" class="patient_vitals_PatientId"><div class="ew-table-header-caption"><?php echo $patient_vitals->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $patient_vitals->PatientId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_vitals->SortUrl($patient_vitals->PatientId) ?>',1);"><div id="elh_patient_vitals_PatientId" class="patient_vitals_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals->PatientId->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals->PatientId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_vitals->PatientId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->Reception->Visible) { // Reception ?>
	<?php if ($patient_vitals->sortUrl($patient_vitals->Reception) == "") { ?>
		<th data-name="Reception" class="<?php echo $patient_vitals->Reception->headerCellClass() ?>"><div id="elh_patient_vitals_Reception" class="patient_vitals_Reception"><div class="ew-table-header-caption"><?php echo $patient_vitals->Reception->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Reception" class="<?php echo $patient_vitals->Reception->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_vitals->SortUrl($patient_vitals->Reception) ?>',1);"><div id="elh_patient_vitals_Reception" class="patient_vitals_Reception">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals->Reception->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals->Reception->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_vitals->Reception->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals->HospID->Visible) { // HospID ?>
	<?php if ($patient_vitals->sortUrl($patient_vitals->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $patient_vitals->HospID->headerCellClass() ?>"><div id="elh_patient_vitals_HospID" class="patient_vitals_HospID"><div class="ew-table-header-caption"><?php echo $patient_vitals->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $patient_vitals->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_vitals->SortUrl($patient_vitals->HospID) ?>',1);"><div id="elh_patient_vitals_HospID" class="patient_vitals_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_vitals->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_vitals_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($patient_vitals->ExportAll && $patient_vitals->isExport()) {
	$patient_vitals_list->StopRec = $patient_vitals_list->TotalRecs;
} else {

	// Set the last record to display
	if ($patient_vitals_list->TotalRecs > $patient_vitals_list->StartRec + $patient_vitals_list->DisplayRecs - 1)
		$patient_vitals_list->StopRec = $patient_vitals_list->StartRec + $patient_vitals_list->DisplayRecs - 1;
	else
		$patient_vitals_list->StopRec = $patient_vitals_list->TotalRecs;
}
$patient_vitals_list->RecCnt = $patient_vitals_list->StartRec - 1;
if ($patient_vitals_list->Recordset && !$patient_vitals_list->Recordset->EOF) {
	$patient_vitals_list->Recordset->moveFirst();
	$selectLimit = $patient_vitals_list->UseSelectLimit;
	if (!$selectLimit && $patient_vitals_list->StartRec > 1)
		$patient_vitals_list->Recordset->move($patient_vitals_list->StartRec - 1);
} elseif (!$patient_vitals->AllowAddDeleteRow && $patient_vitals_list->StopRec == 0) {
	$patient_vitals_list->StopRec = $patient_vitals->GridAddRowCount;
}

// Initialize aggregate
$patient_vitals->RowType = ROWTYPE_AGGREGATEINIT;
$patient_vitals->resetAttributes();
$patient_vitals_list->renderRow();
while ($patient_vitals_list->RecCnt < $patient_vitals_list->StopRec) {
	$patient_vitals_list->RecCnt++;
	if ($patient_vitals_list->RecCnt >= $patient_vitals_list->StartRec) {
		$patient_vitals_list->RowCnt++;

		// Set up key count
		$patient_vitals_list->KeyCount = $patient_vitals_list->RowIndex;

		// Init row class and style
		$patient_vitals->resetAttributes();
		$patient_vitals->CssClass = "";
		if ($patient_vitals->isGridAdd()) {
		} else {
			$patient_vitals_list->loadRowValues($patient_vitals_list->Recordset); // Load row values
		}
		$patient_vitals->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$patient_vitals->RowAttrs = array_merge($patient_vitals->RowAttrs, array('data-rowindex'=>$patient_vitals_list->RowCnt, 'id'=>'r' . $patient_vitals_list->RowCnt . '_patient_vitals', 'data-rowtype'=>$patient_vitals->RowType));

		// Render row
		$patient_vitals_list->renderRow();

		// Render list options
		$patient_vitals_list->renderListOptions();
?>
	<tr<?php echo $patient_vitals->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_vitals_list->ListOptions->render("body", "left", $patient_vitals_list->RowCnt);
?>
	<?php if ($patient_vitals->id->Visible) { // id ?>
		<td data-name="id"<?php echo $patient_vitals->id->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_list->RowCnt ?>_patient_vitals_id" class="patient_vitals_id">
<span<?php echo $patient_vitals->id->viewAttributes() ?>>
<?php echo $patient_vitals->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_vitals->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno"<?php echo $patient_vitals->mrnno->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_list->RowCnt ?>_patient_vitals_mrnno" class="patient_vitals_mrnno">
<span<?php echo $patient_vitals->mrnno->viewAttributes() ?>>
<?php echo $patient_vitals->mrnno->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_vitals->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $patient_vitals->PatientName->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_list->RowCnt ?>_patient_vitals_PatientName" class="patient_vitals_PatientName">
<span<?php echo $patient_vitals->PatientName->viewAttributes() ?>>
<?php echo $patient_vitals->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_vitals->PatID->Visible) { // PatID ?>
		<td data-name="PatID"<?php echo $patient_vitals->PatID->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_list->RowCnt ?>_patient_vitals_PatID" class="patient_vitals_PatID">
<span<?php echo $patient_vitals->PatID->viewAttributes() ?>>
<?php echo $patient_vitals->PatID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_vitals->MobileNumber->Visible) { // MobileNumber ?>
		<td data-name="MobileNumber"<?php echo $patient_vitals->MobileNumber->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_list->RowCnt ?>_patient_vitals_MobileNumber" class="patient_vitals_MobileNumber">
<span<?php echo $patient_vitals->MobileNumber->viewAttributes() ?>>
<?php echo $patient_vitals->MobileNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_vitals->HT->Visible) { // HT ?>
		<td data-name="HT"<?php echo $patient_vitals->HT->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_list->RowCnt ?>_patient_vitals_HT" class="patient_vitals_HT">
<span<?php echo $patient_vitals->HT->viewAttributes() ?>>
<?php echo $patient_vitals->HT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_vitals->WT->Visible) { // WT ?>
		<td data-name="WT"<?php echo $patient_vitals->WT->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_list->RowCnt ?>_patient_vitals_WT" class="patient_vitals_WT">
<span<?php echo $patient_vitals->WT->viewAttributes() ?>>
<?php echo $patient_vitals->WT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_vitals->SurfaceArea->Visible) { // SurfaceArea ?>
		<td data-name="SurfaceArea"<?php echo $patient_vitals->SurfaceArea->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_list->RowCnt ?>_patient_vitals_SurfaceArea" class="patient_vitals_SurfaceArea">
<span<?php echo $patient_vitals->SurfaceArea->viewAttributes() ?>>
<?php echo $patient_vitals->SurfaceArea->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_vitals->BodyMassIndex->Visible) { // BodyMassIndex ?>
		<td data-name="BodyMassIndex"<?php echo $patient_vitals->BodyMassIndex->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_list->RowCnt ?>_patient_vitals_BodyMassIndex" class="patient_vitals_BodyMassIndex">
<span<?php echo $patient_vitals->BodyMassIndex->viewAttributes() ?>>
<?php echo $patient_vitals->BodyMassIndex->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_vitals->AnticoagulantifAny->Visible) { // AnticoagulantifAny ?>
		<td data-name="AnticoagulantifAny"<?php echo $patient_vitals->AnticoagulantifAny->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_list->RowCnt ?>_patient_vitals_AnticoagulantifAny" class="patient_vitals_AnticoagulantifAny">
<span<?php echo $patient_vitals->AnticoagulantifAny->viewAttributes() ?>>
<?php echo $patient_vitals->AnticoagulantifAny->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_vitals->FoodAllergies->Visible) { // FoodAllergies ?>
		<td data-name="FoodAllergies"<?php echo $patient_vitals->FoodAllergies->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_list->RowCnt ?>_patient_vitals_FoodAllergies" class="patient_vitals_FoodAllergies">
<span<?php echo $patient_vitals->FoodAllergies->viewAttributes() ?>>
<?php echo $patient_vitals->FoodAllergies->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_vitals->GenericAllergies->Visible) { // GenericAllergies ?>
		<td data-name="GenericAllergies"<?php echo $patient_vitals->GenericAllergies->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_list->RowCnt ?>_patient_vitals_GenericAllergies" class="patient_vitals_GenericAllergies">
<span<?php echo $patient_vitals->GenericAllergies->viewAttributes() ?>>
<?php echo $patient_vitals->GenericAllergies->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_vitals->GroupAllergies->Visible) { // GroupAllergies ?>
		<td data-name="GroupAllergies"<?php echo $patient_vitals->GroupAllergies->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_list->RowCnt ?>_patient_vitals_GroupAllergies" class="patient_vitals_GroupAllergies">
<span<?php echo $patient_vitals->GroupAllergies->viewAttributes() ?>>
<?php echo $patient_vitals->GroupAllergies->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_vitals->Temp->Visible) { // Temp ?>
		<td data-name="Temp"<?php echo $patient_vitals->Temp->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_list->RowCnt ?>_patient_vitals_Temp" class="patient_vitals_Temp">
<span<?php echo $patient_vitals->Temp->viewAttributes() ?>>
<?php echo $patient_vitals->Temp->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_vitals->Pulse->Visible) { // Pulse ?>
		<td data-name="Pulse"<?php echo $patient_vitals->Pulse->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_list->RowCnt ?>_patient_vitals_Pulse" class="patient_vitals_Pulse">
<span<?php echo $patient_vitals->Pulse->viewAttributes() ?>>
<?php echo $patient_vitals->Pulse->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_vitals->BP->Visible) { // BP ?>
		<td data-name="BP"<?php echo $patient_vitals->BP->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_list->RowCnt ?>_patient_vitals_BP" class="patient_vitals_BP">
<span<?php echo $patient_vitals->BP->viewAttributes() ?>>
<?php echo $patient_vitals->BP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_vitals->PR->Visible) { // PR ?>
		<td data-name="PR"<?php echo $patient_vitals->PR->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_list->RowCnt ?>_patient_vitals_PR" class="patient_vitals_PR">
<span<?php echo $patient_vitals->PR->viewAttributes() ?>>
<?php echo $patient_vitals->PR->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_vitals->CNS->Visible) { // CNS ?>
		<td data-name="CNS"<?php echo $patient_vitals->CNS->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_list->RowCnt ?>_patient_vitals_CNS" class="patient_vitals_CNS">
<span<?php echo $patient_vitals->CNS->viewAttributes() ?>>
<?php echo $patient_vitals->CNS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_vitals->RSA->Visible) { // RSA ?>
		<td data-name="RSA"<?php echo $patient_vitals->RSA->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_list->RowCnt ?>_patient_vitals_RSA" class="patient_vitals_RSA">
<span<?php echo $patient_vitals->RSA->viewAttributes() ?>>
<?php echo $patient_vitals->RSA->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_vitals->CVS->Visible) { // CVS ?>
		<td data-name="CVS"<?php echo $patient_vitals->CVS->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_list->RowCnt ?>_patient_vitals_CVS" class="patient_vitals_CVS">
<span<?php echo $patient_vitals->CVS->viewAttributes() ?>>
<?php echo $patient_vitals->CVS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_vitals->PA->Visible) { // PA ?>
		<td data-name="PA"<?php echo $patient_vitals->PA->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_list->RowCnt ?>_patient_vitals_PA" class="patient_vitals_PA">
<span<?php echo $patient_vitals->PA->viewAttributes() ?>>
<?php echo $patient_vitals->PA->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_vitals->PS->Visible) { // PS ?>
		<td data-name="PS"<?php echo $patient_vitals->PS->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_list->RowCnt ?>_patient_vitals_PS" class="patient_vitals_PS">
<span<?php echo $patient_vitals->PS->viewAttributes() ?>>
<?php echo $patient_vitals->PS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_vitals->PV->Visible) { // PV ?>
		<td data-name="PV"<?php echo $patient_vitals->PV->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_list->RowCnt ?>_patient_vitals_PV" class="patient_vitals_PV">
<span<?php echo $patient_vitals->PV->viewAttributes() ?>>
<?php echo $patient_vitals->PV->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_vitals->clinicaldetails->Visible) { // clinicaldetails ?>
		<td data-name="clinicaldetails"<?php echo $patient_vitals->clinicaldetails->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_list->RowCnt ?>_patient_vitals_clinicaldetails" class="patient_vitals_clinicaldetails">
<span<?php echo $patient_vitals->clinicaldetails->viewAttributes() ?>>
<?php echo $patient_vitals->clinicaldetails->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_vitals->status->Visible) { // status ?>
		<td data-name="status"<?php echo $patient_vitals->status->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_list->RowCnt ?>_patient_vitals_status" class="patient_vitals_status">
<span<?php echo $patient_vitals->status->viewAttributes() ?>>
<?php echo $patient_vitals->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_vitals->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $patient_vitals->createdby->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_list->RowCnt ?>_patient_vitals_createdby" class="patient_vitals_createdby">
<span<?php echo $patient_vitals->createdby->viewAttributes() ?>>
<?php echo $patient_vitals->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_vitals->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $patient_vitals->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_list->RowCnt ?>_patient_vitals_createddatetime" class="patient_vitals_createddatetime">
<span<?php echo $patient_vitals->createddatetime->viewAttributes() ?>>
<?php echo $patient_vitals->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_vitals->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $patient_vitals->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_list->RowCnt ?>_patient_vitals_modifiedby" class="patient_vitals_modifiedby">
<span<?php echo $patient_vitals->modifiedby->viewAttributes() ?>>
<?php echo $patient_vitals->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_vitals->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $patient_vitals->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_list->RowCnt ?>_patient_vitals_modifieddatetime" class="patient_vitals_modifieddatetime">
<span<?php echo $patient_vitals->modifieddatetime->viewAttributes() ?>>
<?php echo $patient_vitals->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_vitals->Age->Visible) { // Age ?>
		<td data-name="Age"<?php echo $patient_vitals->Age->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_list->RowCnt ?>_patient_vitals_Age" class="patient_vitals_Age">
<span<?php echo $patient_vitals->Age->viewAttributes() ?>>
<?php echo $patient_vitals->Age->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_vitals->Gender->Visible) { // Gender ?>
		<td data-name="Gender"<?php echo $patient_vitals->Gender->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_list->RowCnt ?>_patient_vitals_Gender" class="patient_vitals_Gender">
<span<?php echo $patient_vitals->Gender->viewAttributes() ?>>
<?php echo $patient_vitals->Gender->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_vitals->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId"<?php echo $patient_vitals->PatientId->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_list->RowCnt ?>_patient_vitals_PatientId" class="patient_vitals_PatientId">
<span<?php echo $patient_vitals->PatientId->viewAttributes() ?>>
<?php echo $patient_vitals->PatientId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_vitals->Reception->Visible) { // Reception ?>
		<td data-name="Reception"<?php echo $patient_vitals->Reception->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_list->RowCnt ?>_patient_vitals_Reception" class="patient_vitals_Reception">
<span<?php echo $patient_vitals->Reception->viewAttributes() ?>>
<?php echo $patient_vitals->Reception->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_vitals->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $patient_vitals->HospID->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_list->RowCnt ?>_patient_vitals_HospID" class="patient_vitals_HospID">
<span<?php echo $patient_vitals->HospID->viewAttributes() ?>>
<?php echo $patient_vitals->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_vitals_list->ListOptions->render("body", "right", $patient_vitals_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$patient_vitals->isGridAdd())
		$patient_vitals_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$patient_vitals->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($patient_vitals_list->Recordset)
	$patient_vitals_list->Recordset->Close();
?>
<?php if (!$patient_vitals->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$patient_vitals->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($patient_vitals_list->Pager)) $patient_vitals_list->Pager = new NumericPager($patient_vitals_list->StartRec, $patient_vitals_list->DisplayRecs, $patient_vitals_list->TotalRecs, $patient_vitals_list->RecRange, $patient_vitals_list->AutoHidePager) ?>
<?php if ($patient_vitals_list->Pager->RecordCount > 0 && $patient_vitals_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($patient_vitals_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_vitals_list->pageUrl() ?>start=<?php echo $patient_vitals_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($patient_vitals_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_vitals_list->pageUrl() ?>start=<?php echo $patient_vitals_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($patient_vitals_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $patient_vitals_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($patient_vitals_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_vitals_list->pageUrl() ?>start=<?php echo $patient_vitals_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($patient_vitals_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_vitals_list->pageUrl() ?>start=<?php echo $patient_vitals_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($patient_vitals_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $patient_vitals_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $patient_vitals_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $patient_vitals_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($patient_vitals_list->TotalRecs > 0 && (!$patient_vitals_list->AutoHidePageSizeSelector || $patient_vitals_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="patient_vitals">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($patient_vitals_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($patient_vitals_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($patient_vitals_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($patient_vitals_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($patient_vitals_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($patient_vitals_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($patient_vitals->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $patient_vitals_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($patient_vitals_list->TotalRecs == 0 && !$patient_vitals->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $patient_vitals_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$patient_vitals_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$patient_vitals->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$patient_vitals->isExport()) { ?>
<script>
ew.scrollableTable("gmp_patient_vitals", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$patient_vitals_list->terminate();
?>