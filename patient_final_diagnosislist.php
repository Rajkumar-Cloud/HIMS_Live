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
$patient_final_diagnosis_list = new patient_final_diagnosis_list();

// Run the page
$patient_final_diagnosis_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_final_diagnosis_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$patient_final_diagnosis->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fpatient_final_diagnosislist = currentForm = new ew.Form("fpatient_final_diagnosislist", "list");
fpatient_final_diagnosislist.formKeyCountName = '<?php echo $patient_final_diagnosis_list->FormKeyCountName ?>';

// Form_CustomValidate event
fpatient_final_diagnosislist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_final_diagnosislist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fpatient_final_diagnosislistsrch = currentSearchForm = new ew.Form("fpatient_final_diagnosislistsrch");

// Filters
fpatient_final_diagnosislistsrch.filterList = <?php echo $patient_final_diagnosis_list->getFilterList() ?>;
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
<?php if (!$patient_final_diagnosis->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($patient_final_diagnosis_list->TotalRecs > 0 && $patient_final_diagnosis_list->ExportOptions->visible()) { ?>
<?php $patient_final_diagnosis_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($patient_final_diagnosis_list->ImportOptions->visible()) { ?>
<?php $patient_final_diagnosis_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($patient_final_diagnosis_list->SearchOptions->visible()) { ?>
<?php $patient_final_diagnosis_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($patient_final_diagnosis_list->FilterOptions->visible()) { ?>
<?php $patient_final_diagnosis_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$patient_final_diagnosis->isExport() || EXPORT_MASTER_RECORD && $patient_final_diagnosis->isExport("print")) { ?>
<?php
if ($patient_final_diagnosis_list->DbMasterFilter <> "" && $patient_final_diagnosis->getCurrentMasterTable() == "ip_admission") {
	if ($patient_final_diagnosis_list->MasterRecordExists) {
		include_once "ip_admissionmaster.php";
	}
}
?>
<?php } ?>
<?php
$patient_final_diagnosis_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$patient_final_diagnosis->isExport() && !$patient_final_diagnosis->CurrentAction) { ?>
<form name="fpatient_final_diagnosislistsrch" id="fpatient_final_diagnosislistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($patient_final_diagnosis_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fpatient_final_diagnosislistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="patient_final_diagnosis">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($patient_final_diagnosis_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($patient_final_diagnosis_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $patient_final_diagnosis_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($patient_final_diagnosis_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($patient_final_diagnosis_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($patient_final_diagnosis_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($patient_final_diagnosis_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $patient_final_diagnosis_list->showPageHeader(); ?>
<?php
$patient_final_diagnosis_list->showMessage();
?>
<?php if ($patient_final_diagnosis_list->TotalRecs > 0 || $patient_final_diagnosis->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($patient_final_diagnosis_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_final_diagnosis">
<?php if (!$patient_final_diagnosis->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$patient_final_diagnosis->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($patient_final_diagnosis_list->Pager)) $patient_final_diagnosis_list->Pager = new NumericPager($patient_final_diagnosis_list->StartRec, $patient_final_diagnosis_list->DisplayRecs, $patient_final_diagnosis_list->TotalRecs, $patient_final_diagnosis_list->RecRange, $patient_final_diagnosis_list->AutoHidePager) ?>
<?php if ($patient_final_diagnosis_list->Pager->RecordCount > 0 && $patient_final_diagnosis_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($patient_final_diagnosis_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_final_diagnosis_list->pageUrl() ?>start=<?php echo $patient_final_diagnosis_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($patient_final_diagnosis_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_final_diagnosis_list->pageUrl() ?>start=<?php echo $patient_final_diagnosis_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($patient_final_diagnosis_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $patient_final_diagnosis_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($patient_final_diagnosis_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_final_diagnosis_list->pageUrl() ?>start=<?php echo $patient_final_diagnosis_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($patient_final_diagnosis_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_final_diagnosis_list->pageUrl() ?>start=<?php echo $patient_final_diagnosis_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($patient_final_diagnosis_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $patient_final_diagnosis_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $patient_final_diagnosis_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $patient_final_diagnosis_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($patient_final_diagnosis_list->TotalRecs > 0 && (!$patient_final_diagnosis_list->AutoHidePageSizeSelector || $patient_final_diagnosis_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="patient_final_diagnosis">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($patient_final_diagnosis_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($patient_final_diagnosis_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($patient_final_diagnosis_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($patient_final_diagnosis_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($patient_final_diagnosis_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($patient_final_diagnosis_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($patient_final_diagnosis->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $patient_final_diagnosis_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpatient_final_diagnosislist" id="fpatient_final_diagnosislist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_final_diagnosis_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_final_diagnosis_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_final_diagnosis">
<?php if ($patient_final_diagnosis->getCurrentMasterTable() == "ip_admission" && $patient_final_diagnosis->CurrentAction) { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="ip_admission">
<input type="hidden" name="fk_id" value="<?php echo $patient_final_diagnosis->Reception->getSessionValue() ?>">
<input type="hidden" name="fk_patient_id" value="<?php echo $patient_final_diagnosis->PatientId->getSessionValue() ?>">
<input type="hidden" name="fk_mrnNo" value="<?php echo $patient_final_diagnosis->mrnno->getSessionValue() ?>">
<?php } ?>
<div id="gmp_patient_final_diagnosis" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($patient_final_diagnosis_list->TotalRecs > 0 || $patient_final_diagnosis->isGridEdit()) { ?>
<table id="tbl_patient_final_diagnosislist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$patient_final_diagnosis_list->RowType = ROWTYPE_HEADER;

// Render list options
$patient_final_diagnosis_list->renderListOptions();

// Render list options (header, left)
$patient_final_diagnosis_list->ListOptions->render("header", "left");
?>
<?php if ($patient_final_diagnosis->id->Visible) { // id ?>
	<?php if ($patient_final_diagnosis->sortUrl($patient_final_diagnosis->id) == "") { ?>
		<th data-name="id" class="<?php echo $patient_final_diagnosis->id->headerCellClass() ?>"><div id="elh_patient_final_diagnosis_id" class="patient_final_diagnosis_id"><div class="ew-table-header-caption"><?php echo $patient_final_diagnosis->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $patient_final_diagnosis->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_final_diagnosis->SortUrl($patient_final_diagnosis->id) ?>',1);"><div id="elh_patient_final_diagnosis_id" class="patient_final_diagnosis_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_final_diagnosis->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_final_diagnosis->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_final_diagnosis->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_final_diagnosis->PatID->Visible) { // PatID ?>
	<?php if ($patient_final_diagnosis->sortUrl($patient_final_diagnosis->PatID) == "") { ?>
		<th data-name="PatID" class="<?php echo $patient_final_diagnosis->PatID->headerCellClass() ?>"><div id="elh_patient_final_diagnosis_PatID" class="patient_final_diagnosis_PatID"><div class="ew-table-header-caption"><?php echo $patient_final_diagnosis->PatID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatID" class="<?php echo $patient_final_diagnosis->PatID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_final_diagnosis->SortUrl($patient_final_diagnosis->PatID) ?>',1);"><div id="elh_patient_final_diagnosis_PatID" class="patient_final_diagnosis_PatID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_final_diagnosis->PatID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_final_diagnosis->PatID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_final_diagnosis->PatID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_final_diagnosis->PatientName->Visible) { // PatientName ?>
	<?php if ($patient_final_diagnosis->sortUrl($patient_final_diagnosis->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $patient_final_diagnosis->PatientName->headerCellClass() ?>"><div id="elh_patient_final_diagnosis_PatientName" class="patient_final_diagnosis_PatientName"><div class="ew-table-header-caption"><?php echo $patient_final_diagnosis->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $patient_final_diagnosis->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_final_diagnosis->SortUrl($patient_final_diagnosis->PatientName) ?>',1);"><div id="elh_patient_final_diagnosis_PatientName" class="patient_final_diagnosis_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_final_diagnosis->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_final_diagnosis->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_final_diagnosis->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_final_diagnosis->mrnno->Visible) { // mrnno ?>
	<?php if ($patient_final_diagnosis->sortUrl($patient_final_diagnosis->mrnno) == "") { ?>
		<th data-name="mrnno" class="<?php echo $patient_final_diagnosis->mrnno->headerCellClass() ?>"><div id="elh_patient_final_diagnosis_mrnno" class="patient_final_diagnosis_mrnno"><div class="ew-table-header-caption"><?php echo $patient_final_diagnosis->mrnno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnno" class="<?php echo $patient_final_diagnosis->mrnno->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_final_diagnosis->SortUrl($patient_final_diagnosis->mrnno) ?>',1);"><div id="elh_patient_final_diagnosis_mrnno" class="patient_final_diagnosis_mrnno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_final_diagnosis->mrnno->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_final_diagnosis->mrnno->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_final_diagnosis->mrnno->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_final_diagnosis->MobileNumber->Visible) { // MobileNumber ?>
	<?php if ($patient_final_diagnosis->sortUrl($patient_final_diagnosis->MobileNumber) == "") { ?>
		<th data-name="MobileNumber" class="<?php echo $patient_final_diagnosis->MobileNumber->headerCellClass() ?>"><div id="elh_patient_final_diagnosis_MobileNumber" class="patient_final_diagnosis_MobileNumber"><div class="ew-table-header-caption"><?php echo $patient_final_diagnosis->MobileNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MobileNumber" class="<?php echo $patient_final_diagnosis->MobileNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_final_diagnosis->SortUrl($patient_final_diagnosis->MobileNumber) ?>',1);"><div id="elh_patient_final_diagnosis_MobileNumber" class="patient_final_diagnosis_MobileNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_final_diagnosis->MobileNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_final_diagnosis->MobileNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_final_diagnosis->MobileNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_final_diagnosis->Age->Visible) { // Age ?>
	<?php if ($patient_final_diagnosis->sortUrl($patient_final_diagnosis->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $patient_final_diagnosis->Age->headerCellClass() ?>"><div id="elh_patient_final_diagnosis_Age" class="patient_final_diagnosis_Age"><div class="ew-table-header-caption"><?php echo $patient_final_diagnosis->Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $patient_final_diagnosis->Age->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_final_diagnosis->SortUrl($patient_final_diagnosis->Age) ?>',1);"><div id="elh_patient_final_diagnosis_Age" class="patient_final_diagnosis_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_final_diagnosis->Age->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_final_diagnosis->Age->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_final_diagnosis->Age->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_final_diagnosis->Gender->Visible) { // Gender ?>
	<?php if ($patient_final_diagnosis->sortUrl($patient_final_diagnosis->Gender) == "") { ?>
		<th data-name="Gender" class="<?php echo $patient_final_diagnosis->Gender->headerCellClass() ?>"><div id="elh_patient_final_diagnosis_Gender" class="patient_final_diagnosis_Gender"><div class="ew-table-header-caption"><?php echo $patient_final_diagnosis->Gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gender" class="<?php echo $patient_final_diagnosis->Gender->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_final_diagnosis->SortUrl($patient_final_diagnosis->Gender) ?>',1);"><div id="elh_patient_final_diagnosis_Gender" class="patient_final_diagnosis_Gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_final_diagnosis->Gender->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_final_diagnosis->Gender->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_final_diagnosis->Gender->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_final_diagnosis->PatientId->Visible) { // PatientId ?>
	<?php if ($patient_final_diagnosis->sortUrl($patient_final_diagnosis->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $patient_final_diagnosis->PatientId->headerCellClass() ?>"><div id="elh_patient_final_diagnosis_PatientId" class="patient_final_diagnosis_PatientId"><div class="ew-table-header-caption"><?php echo $patient_final_diagnosis->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $patient_final_diagnosis->PatientId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_final_diagnosis->SortUrl($patient_final_diagnosis->PatientId) ?>',1);"><div id="elh_patient_final_diagnosis_PatientId" class="patient_final_diagnosis_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_final_diagnosis->PatientId->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_final_diagnosis->PatientId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_final_diagnosis->PatientId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_final_diagnosis->Reception->Visible) { // Reception ?>
	<?php if ($patient_final_diagnosis->sortUrl($patient_final_diagnosis->Reception) == "") { ?>
		<th data-name="Reception" class="<?php echo $patient_final_diagnosis->Reception->headerCellClass() ?>"><div id="elh_patient_final_diagnosis_Reception" class="patient_final_diagnosis_Reception"><div class="ew-table-header-caption"><?php echo $patient_final_diagnosis->Reception->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Reception" class="<?php echo $patient_final_diagnosis->Reception->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_final_diagnosis->SortUrl($patient_final_diagnosis->Reception) ?>',1);"><div id="elh_patient_final_diagnosis_Reception" class="patient_final_diagnosis_Reception">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_final_diagnosis->Reception->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_final_diagnosis->Reception->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_final_diagnosis->Reception->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_final_diagnosis->HospID->Visible) { // HospID ?>
	<?php if ($patient_final_diagnosis->sortUrl($patient_final_diagnosis->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $patient_final_diagnosis->HospID->headerCellClass() ?>"><div id="elh_patient_final_diagnosis_HospID" class="patient_final_diagnosis_HospID"><div class="ew-table-header-caption"><?php echo $patient_final_diagnosis->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $patient_final_diagnosis->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_final_diagnosis->SortUrl($patient_final_diagnosis->HospID) ?>',1);"><div id="elh_patient_final_diagnosis_HospID" class="patient_final_diagnosis_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_final_diagnosis->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_final_diagnosis->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_final_diagnosis->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_final_diagnosis_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($patient_final_diagnosis->ExportAll && $patient_final_diagnosis->isExport()) {
	$patient_final_diagnosis_list->StopRec = $patient_final_diagnosis_list->TotalRecs;
} else {

	// Set the last record to display
	if ($patient_final_diagnosis_list->TotalRecs > $patient_final_diagnosis_list->StartRec + $patient_final_diagnosis_list->DisplayRecs - 1)
		$patient_final_diagnosis_list->StopRec = $patient_final_diagnosis_list->StartRec + $patient_final_diagnosis_list->DisplayRecs - 1;
	else
		$patient_final_diagnosis_list->StopRec = $patient_final_diagnosis_list->TotalRecs;
}
$patient_final_diagnosis_list->RecCnt = $patient_final_diagnosis_list->StartRec - 1;
if ($patient_final_diagnosis_list->Recordset && !$patient_final_diagnosis_list->Recordset->EOF) {
	$patient_final_diagnosis_list->Recordset->moveFirst();
	$selectLimit = $patient_final_diagnosis_list->UseSelectLimit;
	if (!$selectLimit && $patient_final_diagnosis_list->StartRec > 1)
		$patient_final_diagnosis_list->Recordset->move($patient_final_diagnosis_list->StartRec - 1);
} elseif (!$patient_final_diagnosis->AllowAddDeleteRow && $patient_final_diagnosis_list->StopRec == 0) {
	$patient_final_diagnosis_list->StopRec = $patient_final_diagnosis->GridAddRowCount;
}

// Initialize aggregate
$patient_final_diagnosis->RowType = ROWTYPE_AGGREGATEINIT;
$patient_final_diagnosis->resetAttributes();
$patient_final_diagnosis_list->renderRow();
while ($patient_final_diagnosis_list->RecCnt < $patient_final_diagnosis_list->StopRec) {
	$patient_final_diagnosis_list->RecCnt++;
	if ($patient_final_diagnosis_list->RecCnt >= $patient_final_diagnosis_list->StartRec) {
		$patient_final_diagnosis_list->RowCnt++;

		// Set up key count
		$patient_final_diagnosis_list->KeyCount = $patient_final_diagnosis_list->RowIndex;

		// Init row class and style
		$patient_final_diagnosis->resetAttributes();
		$patient_final_diagnosis->CssClass = "";
		if ($patient_final_diagnosis->isGridAdd()) {
		} else {
			$patient_final_diagnosis_list->loadRowValues($patient_final_diagnosis_list->Recordset); // Load row values
		}
		$patient_final_diagnosis->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$patient_final_diagnosis->RowAttrs = array_merge($patient_final_diagnosis->RowAttrs, array('data-rowindex'=>$patient_final_diagnosis_list->RowCnt, 'id'=>'r' . $patient_final_diagnosis_list->RowCnt . '_patient_final_diagnosis', 'data-rowtype'=>$patient_final_diagnosis->RowType));

		// Render row
		$patient_final_diagnosis_list->renderRow();

		// Render list options
		$patient_final_diagnosis_list->renderListOptions();
?>
	<tr<?php echo $patient_final_diagnosis->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_final_diagnosis_list->ListOptions->render("body", "left", $patient_final_diagnosis_list->RowCnt);
?>
	<?php if ($patient_final_diagnosis->id->Visible) { // id ?>
		<td data-name="id"<?php echo $patient_final_diagnosis->id->cellAttributes() ?>>
<span id="el<?php echo $patient_final_diagnosis_list->RowCnt ?>_patient_final_diagnosis_id" class="patient_final_diagnosis_id">
<span<?php echo $patient_final_diagnosis->id->viewAttributes() ?>>
<?php echo $patient_final_diagnosis->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_final_diagnosis->PatID->Visible) { // PatID ?>
		<td data-name="PatID"<?php echo $patient_final_diagnosis->PatID->cellAttributes() ?>>
<span id="el<?php echo $patient_final_diagnosis_list->RowCnt ?>_patient_final_diagnosis_PatID" class="patient_final_diagnosis_PatID">
<span<?php echo $patient_final_diagnosis->PatID->viewAttributes() ?>>
<?php echo $patient_final_diagnosis->PatID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_final_diagnosis->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $patient_final_diagnosis->PatientName->cellAttributes() ?>>
<span id="el<?php echo $patient_final_diagnosis_list->RowCnt ?>_patient_final_diagnosis_PatientName" class="patient_final_diagnosis_PatientName">
<span<?php echo $patient_final_diagnosis->PatientName->viewAttributes() ?>>
<?php echo $patient_final_diagnosis->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_final_diagnosis->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno"<?php echo $patient_final_diagnosis->mrnno->cellAttributes() ?>>
<span id="el<?php echo $patient_final_diagnosis_list->RowCnt ?>_patient_final_diagnosis_mrnno" class="patient_final_diagnosis_mrnno">
<span<?php echo $patient_final_diagnosis->mrnno->viewAttributes() ?>>
<?php echo $patient_final_diagnosis->mrnno->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_final_diagnosis->MobileNumber->Visible) { // MobileNumber ?>
		<td data-name="MobileNumber"<?php echo $patient_final_diagnosis->MobileNumber->cellAttributes() ?>>
<span id="el<?php echo $patient_final_diagnosis_list->RowCnt ?>_patient_final_diagnosis_MobileNumber" class="patient_final_diagnosis_MobileNumber">
<span<?php echo $patient_final_diagnosis->MobileNumber->viewAttributes() ?>>
<?php echo $patient_final_diagnosis->MobileNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_final_diagnosis->Age->Visible) { // Age ?>
		<td data-name="Age"<?php echo $patient_final_diagnosis->Age->cellAttributes() ?>>
<span id="el<?php echo $patient_final_diagnosis_list->RowCnt ?>_patient_final_diagnosis_Age" class="patient_final_diagnosis_Age">
<span<?php echo $patient_final_diagnosis->Age->viewAttributes() ?>>
<?php echo $patient_final_diagnosis->Age->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_final_diagnosis->Gender->Visible) { // Gender ?>
		<td data-name="Gender"<?php echo $patient_final_diagnosis->Gender->cellAttributes() ?>>
<span id="el<?php echo $patient_final_diagnosis_list->RowCnt ?>_patient_final_diagnosis_Gender" class="patient_final_diagnosis_Gender">
<span<?php echo $patient_final_diagnosis->Gender->viewAttributes() ?>>
<?php echo $patient_final_diagnosis->Gender->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_final_diagnosis->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId"<?php echo $patient_final_diagnosis->PatientId->cellAttributes() ?>>
<span id="el<?php echo $patient_final_diagnosis_list->RowCnt ?>_patient_final_diagnosis_PatientId" class="patient_final_diagnosis_PatientId">
<span<?php echo $patient_final_diagnosis->PatientId->viewAttributes() ?>>
<?php echo $patient_final_diagnosis->PatientId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_final_diagnosis->Reception->Visible) { // Reception ?>
		<td data-name="Reception"<?php echo $patient_final_diagnosis->Reception->cellAttributes() ?>>
<span id="el<?php echo $patient_final_diagnosis_list->RowCnt ?>_patient_final_diagnosis_Reception" class="patient_final_diagnosis_Reception">
<span<?php echo $patient_final_diagnosis->Reception->viewAttributes() ?>>
<?php echo $patient_final_diagnosis->Reception->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_final_diagnosis->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $patient_final_diagnosis->HospID->cellAttributes() ?>>
<span id="el<?php echo $patient_final_diagnosis_list->RowCnt ?>_patient_final_diagnosis_HospID" class="patient_final_diagnosis_HospID">
<span<?php echo $patient_final_diagnosis->HospID->viewAttributes() ?>>
<?php echo $patient_final_diagnosis->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_final_diagnosis_list->ListOptions->render("body", "right", $patient_final_diagnosis_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$patient_final_diagnosis->isGridAdd())
		$patient_final_diagnosis_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$patient_final_diagnosis->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($patient_final_diagnosis_list->Recordset)
	$patient_final_diagnosis_list->Recordset->Close();
?>
<?php if (!$patient_final_diagnosis->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$patient_final_diagnosis->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($patient_final_diagnosis_list->Pager)) $patient_final_diagnosis_list->Pager = new NumericPager($patient_final_diagnosis_list->StartRec, $patient_final_diagnosis_list->DisplayRecs, $patient_final_diagnosis_list->TotalRecs, $patient_final_diagnosis_list->RecRange, $patient_final_diagnosis_list->AutoHidePager) ?>
<?php if ($patient_final_diagnosis_list->Pager->RecordCount > 0 && $patient_final_diagnosis_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($patient_final_diagnosis_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_final_diagnosis_list->pageUrl() ?>start=<?php echo $patient_final_diagnosis_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($patient_final_diagnosis_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_final_diagnosis_list->pageUrl() ?>start=<?php echo $patient_final_diagnosis_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($patient_final_diagnosis_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $patient_final_diagnosis_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($patient_final_diagnosis_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_final_diagnosis_list->pageUrl() ?>start=<?php echo $patient_final_diagnosis_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($patient_final_diagnosis_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_final_diagnosis_list->pageUrl() ?>start=<?php echo $patient_final_diagnosis_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($patient_final_diagnosis_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $patient_final_diagnosis_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $patient_final_diagnosis_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $patient_final_diagnosis_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($patient_final_diagnosis_list->TotalRecs > 0 && (!$patient_final_diagnosis_list->AutoHidePageSizeSelector || $patient_final_diagnosis_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="patient_final_diagnosis">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($patient_final_diagnosis_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($patient_final_diagnosis_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($patient_final_diagnosis_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($patient_final_diagnosis_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($patient_final_diagnosis_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($patient_final_diagnosis_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($patient_final_diagnosis->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $patient_final_diagnosis_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($patient_final_diagnosis_list->TotalRecs == 0 && !$patient_final_diagnosis->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $patient_final_diagnosis_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$patient_final_diagnosis_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$patient_final_diagnosis->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$patient_final_diagnosis->isExport()) { ?>
<script>
ew.scrollableTable("gmp_patient_final_diagnosis", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$patient_final_diagnosis_list->terminate();
?>