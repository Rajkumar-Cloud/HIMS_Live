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
$patient_insurance_list = new patient_insurance_list();

// Run the page
$patient_insurance_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_insurance_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$patient_insurance->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fpatient_insurancelist = currentForm = new ew.Form("fpatient_insurancelist", "list");
fpatient_insurancelist.formKeyCountName = '<?php echo $patient_insurance_list->FormKeyCountName ?>';

// Form_CustomValidate event
fpatient_insurancelist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_insurancelist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fpatient_insurancelistsrch = currentSearchForm = new ew.Form("fpatient_insurancelistsrch");

// Filters
fpatient_insurancelistsrch.filterList = <?php echo $patient_insurance_list->getFilterList() ?>;
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
<?php if (!$patient_insurance->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($patient_insurance_list->TotalRecs > 0 && $patient_insurance_list->ExportOptions->visible()) { ?>
<?php $patient_insurance_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($patient_insurance_list->ImportOptions->visible()) { ?>
<?php $patient_insurance_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($patient_insurance_list->SearchOptions->visible()) { ?>
<?php $patient_insurance_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($patient_insurance_list->FilterOptions->visible()) { ?>
<?php $patient_insurance_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$patient_insurance->isExport() || EXPORT_MASTER_RECORD && $patient_insurance->isExport("print")) { ?>
<?php
if ($patient_insurance_list->DbMasterFilter <> "" && $patient_insurance->getCurrentMasterTable() == "ip_admission") {
	if ($patient_insurance_list->MasterRecordExists) {
		include_once "ip_admissionmaster.php";
	}
}
?>
<?php } ?>
<?php
$patient_insurance_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$patient_insurance->isExport() && !$patient_insurance->CurrentAction) { ?>
<form name="fpatient_insurancelistsrch" id="fpatient_insurancelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($patient_insurance_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fpatient_insurancelistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="patient_insurance">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($patient_insurance_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($patient_insurance_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $patient_insurance_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($patient_insurance_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($patient_insurance_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($patient_insurance_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($patient_insurance_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $patient_insurance_list->showPageHeader(); ?>
<?php
$patient_insurance_list->showMessage();
?>
<?php if ($patient_insurance_list->TotalRecs > 0 || $patient_insurance->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($patient_insurance_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_insurance">
<?php if (!$patient_insurance->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$patient_insurance->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($patient_insurance_list->Pager)) $patient_insurance_list->Pager = new NumericPager($patient_insurance_list->StartRec, $patient_insurance_list->DisplayRecs, $patient_insurance_list->TotalRecs, $patient_insurance_list->RecRange, $patient_insurance_list->AutoHidePager) ?>
<?php if ($patient_insurance_list->Pager->RecordCount > 0 && $patient_insurance_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($patient_insurance_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_insurance_list->pageUrl() ?>start=<?php echo $patient_insurance_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($patient_insurance_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_insurance_list->pageUrl() ?>start=<?php echo $patient_insurance_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($patient_insurance_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $patient_insurance_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($patient_insurance_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_insurance_list->pageUrl() ?>start=<?php echo $patient_insurance_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($patient_insurance_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_insurance_list->pageUrl() ?>start=<?php echo $patient_insurance_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($patient_insurance_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $patient_insurance_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $patient_insurance_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $patient_insurance_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($patient_insurance_list->TotalRecs > 0 && (!$patient_insurance_list->AutoHidePageSizeSelector || $patient_insurance_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="patient_insurance">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($patient_insurance_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($patient_insurance_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($patient_insurance_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($patient_insurance_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($patient_insurance_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($patient_insurance_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($patient_insurance->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $patient_insurance_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpatient_insurancelist" id="fpatient_insurancelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_insurance_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_insurance_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_insurance">
<?php if ($patient_insurance->getCurrentMasterTable() == "ip_admission" && $patient_insurance->CurrentAction) { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="ip_admission">
<input type="hidden" name="fk_id" value="<?php echo $patient_insurance->Reception->getSessionValue() ?>">
<input type="hidden" name="fk_patient_id" value="<?php echo $patient_insurance->PatientId->getSessionValue() ?>">
<input type="hidden" name="fk_mrnNo" value="<?php echo $patient_insurance->mrnno->getSessionValue() ?>">
<?php } ?>
<div id="gmp_patient_insurance" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($patient_insurance_list->TotalRecs > 0 || $patient_insurance->isGridEdit()) { ?>
<table id="tbl_patient_insurancelist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$patient_insurance_list->RowType = ROWTYPE_HEADER;

// Render list options
$patient_insurance_list->renderListOptions();

// Render list options (header, left)
$patient_insurance_list->ListOptions->render("header", "left");
?>
<?php if ($patient_insurance->id->Visible) { // id ?>
	<?php if ($patient_insurance->sortUrl($patient_insurance->id) == "") { ?>
		<th data-name="id" class="<?php echo $patient_insurance->id->headerCellClass() ?>"><div id="elh_patient_insurance_id" class="patient_insurance_id"><div class="ew-table-header-caption"><?php echo $patient_insurance->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $patient_insurance->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_insurance->SortUrl($patient_insurance->id) ?>',1);"><div id="elh_patient_insurance_id" class="patient_insurance_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_insurance->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance->Reception->Visible) { // Reception ?>
	<?php if ($patient_insurance->sortUrl($patient_insurance->Reception) == "") { ?>
		<th data-name="Reception" class="<?php echo $patient_insurance->Reception->headerCellClass() ?>"><div id="elh_patient_insurance_Reception" class="patient_insurance_Reception"><div class="ew-table-header-caption"><?php echo $patient_insurance->Reception->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Reception" class="<?php echo $patient_insurance->Reception->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_insurance->SortUrl($patient_insurance->Reception) ?>',1);"><div id="elh_patient_insurance_Reception" class="patient_insurance_Reception">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance->Reception->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance->Reception->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_insurance->Reception->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance->PatientId->Visible) { // PatientId ?>
	<?php if ($patient_insurance->sortUrl($patient_insurance->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $patient_insurance->PatientId->headerCellClass() ?>"><div id="elh_patient_insurance_PatientId" class="patient_insurance_PatientId"><div class="ew-table-header-caption"><?php echo $patient_insurance->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $patient_insurance->PatientId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_insurance->SortUrl($patient_insurance->PatientId) ?>',1);"><div id="elh_patient_insurance_PatientId" class="patient_insurance_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance->PatientId->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance->PatientId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_insurance->PatientId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance->PatientName->Visible) { // PatientName ?>
	<?php if ($patient_insurance->sortUrl($patient_insurance->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $patient_insurance->PatientName->headerCellClass() ?>"><div id="elh_patient_insurance_PatientName" class="patient_insurance_PatientName"><div class="ew-table-header-caption"><?php echo $patient_insurance->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $patient_insurance->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_insurance->SortUrl($patient_insurance->PatientName) ?>',1);"><div id="elh_patient_insurance_PatientName" class="patient_insurance_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_insurance->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance->Company->Visible) { // Company ?>
	<?php if ($patient_insurance->sortUrl($patient_insurance->Company) == "") { ?>
		<th data-name="Company" class="<?php echo $patient_insurance->Company->headerCellClass() ?>"><div id="elh_patient_insurance_Company" class="patient_insurance_Company"><div class="ew-table-header-caption"><?php echo $patient_insurance->Company->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Company" class="<?php echo $patient_insurance->Company->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_insurance->SortUrl($patient_insurance->Company) ?>',1);"><div id="elh_patient_insurance_Company" class="patient_insurance_Company">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance->Company->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance->Company->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_insurance->Company->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance->AddressInsuranceCarierName->Visible) { // AddressInsuranceCarierName ?>
	<?php if ($patient_insurance->sortUrl($patient_insurance->AddressInsuranceCarierName) == "") { ?>
		<th data-name="AddressInsuranceCarierName" class="<?php echo $patient_insurance->AddressInsuranceCarierName->headerCellClass() ?>"><div id="elh_patient_insurance_AddressInsuranceCarierName" class="patient_insurance_AddressInsuranceCarierName"><div class="ew-table-header-caption"><?php echo $patient_insurance->AddressInsuranceCarierName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AddressInsuranceCarierName" class="<?php echo $patient_insurance->AddressInsuranceCarierName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_insurance->SortUrl($patient_insurance->AddressInsuranceCarierName) ?>',1);"><div id="elh_patient_insurance_AddressInsuranceCarierName" class="patient_insurance_AddressInsuranceCarierName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance->AddressInsuranceCarierName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance->AddressInsuranceCarierName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_insurance->AddressInsuranceCarierName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance->ContactName->Visible) { // ContactName ?>
	<?php if ($patient_insurance->sortUrl($patient_insurance->ContactName) == "") { ?>
		<th data-name="ContactName" class="<?php echo $patient_insurance->ContactName->headerCellClass() ?>"><div id="elh_patient_insurance_ContactName" class="patient_insurance_ContactName"><div class="ew-table-header-caption"><?php echo $patient_insurance->ContactName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ContactName" class="<?php echo $patient_insurance->ContactName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_insurance->SortUrl($patient_insurance->ContactName) ?>',1);"><div id="elh_patient_insurance_ContactName" class="patient_insurance_ContactName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance->ContactName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance->ContactName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_insurance->ContactName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance->ContactMobile->Visible) { // ContactMobile ?>
	<?php if ($patient_insurance->sortUrl($patient_insurance->ContactMobile) == "") { ?>
		<th data-name="ContactMobile" class="<?php echo $patient_insurance->ContactMobile->headerCellClass() ?>"><div id="elh_patient_insurance_ContactMobile" class="patient_insurance_ContactMobile"><div class="ew-table-header-caption"><?php echo $patient_insurance->ContactMobile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ContactMobile" class="<?php echo $patient_insurance->ContactMobile->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_insurance->SortUrl($patient_insurance->ContactMobile) ?>',1);"><div id="elh_patient_insurance_ContactMobile" class="patient_insurance_ContactMobile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance->ContactMobile->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance->ContactMobile->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_insurance->ContactMobile->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance->PolicyType->Visible) { // PolicyType ?>
	<?php if ($patient_insurance->sortUrl($patient_insurance->PolicyType) == "") { ?>
		<th data-name="PolicyType" class="<?php echo $patient_insurance->PolicyType->headerCellClass() ?>"><div id="elh_patient_insurance_PolicyType" class="patient_insurance_PolicyType"><div class="ew-table-header-caption"><?php echo $patient_insurance->PolicyType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PolicyType" class="<?php echo $patient_insurance->PolicyType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_insurance->SortUrl($patient_insurance->PolicyType) ?>',1);"><div id="elh_patient_insurance_PolicyType" class="patient_insurance_PolicyType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance->PolicyType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance->PolicyType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_insurance->PolicyType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance->PolicyName->Visible) { // PolicyName ?>
	<?php if ($patient_insurance->sortUrl($patient_insurance->PolicyName) == "") { ?>
		<th data-name="PolicyName" class="<?php echo $patient_insurance->PolicyName->headerCellClass() ?>"><div id="elh_patient_insurance_PolicyName" class="patient_insurance_PolicyName"><div class="ew-table-header-caption"><?php echo $patient_insurance->PolicyName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PolicyName" class="<?php echo $patient_insurance->PolicyName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_insurance->SortUrl($patient_insurance->PolicyName) ?>',1);"><div id="elh_patient_insurance_PolicyName" class="patient_insurance_PolicyName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance->PolicyName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance->PolicyName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_insurance->PolicyName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance->PolicyNo->Visible) { // PolicyNo ?>
	<?php if ($patient_insurance->sortUrl($patient_insurance->PolicyNo) == "") { ?>
		<th data-name="PolicyNo" class="<?php echo $patient_insurance->PolicyNo->headerCellClass() ?>"><div id="elh_patient_insurance_PolicyNo" class="patient_insurance_PolicyNo"><div class="ew-table-header-caption"><?php echo $patient_insurance->PolicyNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PolicyNo" class="<?php echo $patient_insurance->PolicyNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_insurance->SortUrl($patient_insurance->PolicyNo) ?>',1);"><div id="elh_patient_insurance_PolicyNo" class="patient_insurance_PolicyNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance->PolicyNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance->PolicyNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_insurance->PolicyNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance->PolicyAmount->Visible) { // PolicyAmount ?>
	<?php if ($patient_insurance->sortUrl($patient_insurance->PolicyAmount) == "") { ?>
		<th data-name="PolicyAmount" class="<?php echo $patient_insurance->PolicyAmount->headerCellClass() ?>"><div id="elh_patient_insurance_PolicyAmount" class="patient_insurance_PolicyAmount"><div class="ew-table-header-caption"><?php echo $patient_insurance->PolicyAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PolicyAmount" class="<?php echo $patient_insurance->PolicyAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_insurance->SortUrl($patient_insurance->PolicyAmount) ?>',1);"><div id="elh_patient_insurance_PolicyAmount" class="patient_insurance_PolicyAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance->PolicyAmount->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance->PolicyAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_insurance->PolicyAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance->RefLetterNo->Visible) { // RefLetterNo ?>
	<?php if ($patient_insurance->sortUrl($patient_insurance->RefLetterNo) == "") { ?>
		<th data-name="RefLetterNo" class="<?php echo $patient_insurance->RefLetterNo->headerCellClass() ?>"><div id="elh_patient_insurance_RefLetterNo" class="patient_insurance_RefLetterNo"><div class="ew-table-header-caption"><?php echo $patient_insurance->RefLetterNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RefLetterNo" class="<?php echo $patient_insurance->RefLetterNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_insurance->SortUrl($patient_insurance->RefLetterNo) ?>',1);"><div id="elh_patient_insurance_RefLetterNo" class="patient_insurance_RefLetterNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance->RefLetterNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance->RefLetterNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_insurance->RefLetterNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance->ReferenceBy->Visible) { // ReferenceBy ?>
	<?php if ($patient_insurance->sortUrl($patient_insurance->ReferenceBy) == "") { ?>
		<th data-name="ReferenceBy" class="<?php echo $patient_insurance->ReferenceBy->headerCellClass() ?>"><div id="elh_patient_insurance_ReferenceBy" class="patient_insurance_ReferenceBy"><div class="ew-table-header-caption"><?php echo $patient_insurance->ReferenceBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReferenceBy" class="<?php echo $patient_insurance->ReferenceBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_insurance->SortUrl($patient_insurance->ReferenceBy) ?>',1);"><div id="elh_patient_insurance_ReferenceBy" class="patient_insurance_ReferenceBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance->ReferenceBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance->ReferenceBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_insurance->ReferenceBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance->ReferenceDate->Visible) { // ReferenceDate ?>
	<?php if ($patient_insurance->sortUrl($patient_insurance->ReferenceDate) == "") { ?>
		<th data-name="ReferenceDate" class="<?php echo $patient_insurance->ReferenceDate->headerCellClass() ?>"><div id="elh_patient_insurance_ReferenceDate" class="patient_insurance_ReferenceDate"><div class="ew-table-header-caption"><?php echo $patient_insurance->ReferenceDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReferenceDate" class="<?php echo $patient_insurance->ReferenceDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_insurance->SortUrl($patient_insurance->ReferenceDate) ?>',1);"><div id="elh_patient_insurance_ReferenceDate" class="patient_insurance_ReferenceDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance->ReferenceDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance->ReferenceDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_insurance->ReferenceDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance->createdby->Visible) { // createdby ?>
	<?php if ($patient_insurance->sortUrl($patient_insurance->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $patient_insurance->createdby->headerCellClass() ?>"><div id="elh_patient_insurance_createdby" class="patient_insurance_createdby"><div class="ew-table-header-caption"><?php echo $patient_insurance->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $patient_insurance->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_insurance->SortUrl($patient_insurance->createdby) ?>',1);"><div id="elh_patient_insurance_createdby" class="patient_insurance_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance->createdby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_insurance->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance->createddatetime->Visible) { // createddatetime ?>
	<?php if ($patient_insurance->sortUrl($patient_insurance->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $patient_insurance->createddatetime->headerCellClass() ?>"><div id="elh_patient_insurance_createddatetime" class="patient_insurance_createddatetime"><div class="ew-table-header-caption"><?php echo $patient_insurance->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $patient_insurance->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_insurance->SortUrl($patient_insurance->createddatetime) ?>',1);"><div id="elh_patient_insurance_createddatetime" class="patient_insurance_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_insurance->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance->modifiedby->Visible) { // modifiedby ?>
	<?php if ($patient_insurance->sortUrl($patient_insurance->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $patient_insurance->modifiedby->headerCellClass() ?>"><div id="elh_patient_insurance_modifiedby" class="patient_insurance_modifiedby"><div class="ew-table-header-caption"><?php echo $patient_insurance->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $patient_insurance->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_insurance->SortUrl($patient_insurance->modifiedby) ?>',1);"><div id="elh_patient_insurance_modifiedby" class="patient_insurance_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance->modifiedby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_insurance->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($patient_insurance->sortUrl($patient_insurance->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $patient_insurance->modifieddatetime->headerCellClass() ?>"><div id="elh_patient_insurance_modifieddatetime" class="patient_insurance_modifieddatetime"><div class="ew-table-header-caption"><?php echo $patient_insurance->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $patient_insurance->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_insurance->SortUrl($patient_insurance->modifieddatetime) ?>',1);"><div id="elh_patient_insurance_modifieddatetime" class="patient_insurance_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_insurance->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_insurance->mrnno->Visible) { // mrnno ?>
	<?php if ($patient_insurance->sortUrl($patient_insurance->mrnno) == "") { ?>
		<th data-name="mrnno" class="<?php echo $patient_insurance->mrnno->headerCellClass() ?>"><div id="elh_patient_insurance_mrnno" class="patient_insurance_mrnno"><div class="ew-table-header-caption"><?php echo $patient_insurance->mrnno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnno" class="<?php echo $patient_insurance->mrnno->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_insurance->SortUrl($patient_insurance->mrnno) ?>',1);"><div id="elh_patient_insurance_mrnno" class="patient_insurance_mrnno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_insurance->mrnno->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_insurance->mrnno->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_insurance->mrnno->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_insurance_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($patient_insurance->ExportAll && $patient_insurance->isExport()) {
	$patient_insurance_list->StopRec = $patient_insurance_list->TotalRecs;
} else {

	// Set the last record to display
	if ($patient_insurance_list->TotalRecs > $patient_insurance_list->StartRec + $patient_insurance_list->DisplayRecs - 1)
		$patient_insurance_list->StopRec = $patient_insurance_list->StartRec + $patient_insurance_list->DisplayRecs - 1;
	else
		$patient_insurance_list->StopRec = $patient_insurance_list->TotalRecs;
}
$patient_insurance_list->RecCnt = $patient_insurance_list->StartRec - 1;
if ($patient_insurance_list->Recordset && !$patient_insurance_list->Recordset->EOF) {
	$patient_insurance_list->Recordset->moveFirst();
	$selectLimit = $patient_insurance_list->UseSelectLimit;
	if (!$selectLimit && $patient_insurance_list->StartRec > 1)
		$patient_insurance_list->Recordset->move($patient_insurance_list->StartRec - 1);
} elseif (!$patient_insurance->AllowAddDeleteRow && $patient_insurance_list->StopRec == 0) {
	$patient_insurance_list->StopRec = $patient_insurance->GridAddRowCount;
}

// Initialize aggregate
$patient_insurance->RowType = ROWTYPE_AGGREGATEINIT;
$patient_insurance->resetAttributes();
$patient_insurance_list->renderRow();
while ($patient_insurance_list->RecCnt < $patient_insurance_list->StopRec) {
	$patient_insurance_list->RecCnt++;
	if ($patient_insurance_list->RecCnt >= $patient_insurance_list->StartRec) {
		$patient_insurance_list->RowCnt++;

		// Set up key count
		$patient_insurance_list->KeyCount = $patient_insurance_list->RowIndex;

		// Init row class and style
		$patient_insurance->resetAttributes();
		$patient_insurance->CssClass = "";
		if ($patient_insurance->isGridAdd()) {
		} else {
			$patient_insurance_list->loadRowValues($patient_insurance_list->Recordset); // Load row values
		}
		$patient_insurance->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$patient_insurance->RowAttrs = array_merge($patient_insurance->RowAttrs, array('data-rowindex'=>$patient_insurance_list->RowCnt, 'id'=>'r' . $patient_insurance_list->RowCnt . '_patient_insurance', 'data-rowtype'=>$patient_insurance->RowType));

		// Render row
		$patient_insurance_list->renderRow();

		// Render list options
		$patient_insurance_list->renderListOptions();
?>
	<tr<?php echo $patient_insurance->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_insurance_list->ListOptions->render("body", "left", $patient_insurance_list->RowCnt);
?>
	<?php if ($patient_insurance->id->Visible) { // id ?>
		<td data-name="id"<?php echo $patient_insurance->id->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_list->RowCnt ?>_patient_insurance_id" class="patient_insurance_id">
<span<?php echo $patient_insurance->id->viewAttributes() ?>>
<?php echo $patient_insurance->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_insurance->Reception->Visible) { // Reception ?>
		<td data-name="Reception"<?php echo $patient_insurance->Reception->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_list->RowCnt ?>_patient_insurance_Reception" class="patient_insurance_Reception">
<span<?php echo $patient_insurance->Reception->viewAttributes() ?>>
<?php echo $patient_insurance->Reception->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_insurance->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId"<?php echo $patient_insurance->PatientId->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_list->RowCnt ?>_patient_insurance_PatientId" class="patient_insurance_PatientId">
<span<?php echo $patient_insurance->PatientId->viewAttributes() ?>>
<?php echo $patient_insurance->PatientId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_insurance->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $patient_insurance->PatientName->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_list->RowCnt ?>_patient_insurance_PatientName" class="patient_insurance_PatientName">
<span<?php echo $patient_insurance->PatientName->viewAttributes() ?>>
<?php echo $patient_insurance->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_insurance->Company->Visible) { // Company ?>
		<td data-name="Company"<?php echo $patient_insurance->Company->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_list->RowCnt ?>_patient_insurance_Company" class="patient_insurance_Company">
<span<?php echo $patient_insurance->Company->viewAttributes() ?>>
<?php echo $patient_insurance->Company->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_insurance->AddressInsuranceCarierName->Visible) { // AddressInsuranceCarierName ?>
		<td data-name="AddressInsuranceCarierName"<?php echo $patient_insurance->AddressInsuranceCarierName->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_list->RowCnt ?>_patient_insurance_AddressInsuranceCarierName" class="patient_insurance_AddressInsuranceCarierName">
<span<?php echo $patient_insurance->AddressInsuranceCarierName->viewAttributes() ?>>
<?php echo $patient_insurance->AddressInsuranceCarierName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_insurance->ContactName->Visible) { // ContactName ?>
		<td data-name="ContactName"<?php echo $patient_insurance->ContactName->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_list->RowCnt ?>_patient_insurance_ContactName" class="patient_insurance_ContactName">
<span<?php echo $patient_insurance->ContactName->viewAttributes() ?>>
<?php echo $patient_insurance->ContactName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_insurance->ContactMobile->Visible) { // ContactMobile ?>
		<td data-name="ContactMobile"<?php echo $patient_insurance->ContactMobile->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_list->RowCnt ?>_patient_insurance_ContactMobile" class="patient_insurance_ContactMobile">
<span<?php echo $patient_insurance->ContactMobile->viewAttributes() ?>>
<?php echo $patient_insurance->ContactMobile->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_insurance->PolicyType->Visible) { // PolicyType ?>
		<td data-name="PolicyType"<?php echo $patient_insurance->PolicyType->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_list->RowCnt ?>_patient_insurance_PolicyType" class="patient_insurance_PolicyType">
<span<?php echo $patient_insurance->PolicyType->viewAttributes() ?>>
<?php echo $patient_insurance->PolicyType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_insurance->PolicyName->Visible) { // PolicyName ?>
		<td data-name="PolicyName"<?php echo $patient_insurance->PolicyName->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_list->RowCnt ?>_patient_insurance_PolicyName" class="patient_insurance_PolicyName">
<span<?php echo $patient_insurance->PolicyName->viewAttributes() ?>>
<?php echo $patient_insurance->PolicyName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_insurance->PolicyNo->Visible) { // PolicyNo ?>
		<td data-name="PolicyNo"<?php echo $patient_insurance->PolicyNo->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_list->RowCnt ?>_patient_insurance_PolicyNo" class="patient_insurance_PolicyNo">
<span<?php echo $patient_insurance->PolicyNo->viewAttributes() ?>>
<?php echo $patient_insurance->PolicyNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_insurance->PolicyAmount->Visible) { // PolicyAmount ?>
		<td data-name="PolicyAmount"<?php echo $patient_insurance->PolicyAmount->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_list->RowCnt ?>_patient_insurance_PolicyAmount" class="patient_insurance_PolicyAmount">
<span<?php echo $patient_insurance->PolicyAmount->viewAttributes() ?>>
<?php echo $patient_insurance->PolicyAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_insurance->RefLetterNo->Visible) { // RefLetterNo ?>
		<td data-name="RefLetterNo"<?php echo $patient_insurance->RefLetterNo->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_list->RowCnt ?>_patient_insurance_RefLetterNo" class="patient_insurance_RefLetterNo">
<span<?php echo $patient_insurance->RefLetterNo->viewAttributes() ?>>
<?php echo $patient_insurance->RefLetterNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_insurance->ReferenceBy->Visible) { // ReferenceBy ?>
		<td data-name="ReferenceBy"<?php echo $patient_insurance->ReferenceBy->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_list->RowCnt ?>_patient_insurance_ReferenceBy" class="patient_insurance_ReferenceBy">
<span<?php echo $patient_insurance->ReferenceBy->viewAttributes() ?>>
<?php echo $patient_insurance->ReferenceBy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_insurance->ReferenceDate->Visible) { // ReferenceDate ?>
		<td data-name="ReferenceDate"<?php echo $patient_insurance->ReferenceDate->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_list->RowCnt ?>_patient_insurance_ReferenceDate" class="patient_insurance_ReferenceDate">
<span<?php echo $patient_insurance->ReferenceDate->viewAttributes() ?>>
<?php echo $patient_insurance->ReferenceDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_insurance->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $patient_insurance->createdby->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_list->RowCnt ?>_patient_insurance_createdby" class="patient_insurance_createdby">
<span<?php echo $patient_insurance->createdby->viewAttributes() ?>>
<?php echo $patient_insurance->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_insurance->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $patient_insurance->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_list->RowCnt ?>_patient_insurance_createddatetime" class="patient_insurance_createddatetime">
<span<?php echo $patient_insurance->createddatetime->viewAttributes() ?>>
<?php echo $patient_insurance->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_insurance->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $patient_insurance->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_list->RowCnt ?>_patient_insurance_modifiedby" class="patient_insurance_modifiedby">
<span<?php echo $patient_insurance->modifiedby->viewAttributes() ?>>
<?php echo $patient_insurance->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_insurance->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $patient_insurance->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_list->RowCnt ?>_patient_insurance_modifieddatetime" class="patient_insurance_modifieddatetime">
<span<?php echo $patient_insurance->modifieddatetime->viewAttributes() ?>>
<?php echo $patient_insurance->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_insurance->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno"<?php echo $patient_insurance->mrnno->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_list->RowCnt ?>_patient_insurance_mrnno" class="patient_insurance_mrnno">
<span<?php echo $patient_insurance->mrnno->viewAttributes() ?>>
<?php echo $patient_insurance->mrnno->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_insurance_list->ListOptions->render("body", "right", $patient_insurance_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$patient_insurance->isGridAdd())
		$patient_insurance_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$patient_insurance->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($patient_insurance_list->Recordset)
	$patient_insurance_list->Recordset->Close();
?>
<?php if (!$patient_insurance->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$patient_insurance->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($patient_insurance_list->Pager)) $patient_insurance_list->Pager = new NumericPager($patient_insurance_list->StartRec, $patient_insurance_list->DisplayRecs, $patient_insurance_list->TotalRecs, $patient_insurance_list->RecRange, $patient_insurance_list->AutoHidePager) ?>
<?php if ($patient_insurance_list->Pager->RecordCount > 0 && $patient_insurance_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($patient_insurance_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_insurance_list->pageUrl() ?>start=<?php echo $patient_insurance_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($patient_insurance_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_insurance_list->pageUrl() ?>start=<?php echo $patient_insurance_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($patient_insurance_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $patient_insurance_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($patient_insurance_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_insurance_list->pageUrl() ?>start=<?php echo $patient_insurance_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($patient_insurance_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_insurance_list->pageUrl() ?>start=<?php echo $patient_insurance_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($patient_insurance_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $patient_insurance_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $patient_insurance_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $patient_insurance_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($patient_insurance_list->TotalRecs > 0 && (!$patient_insurance_list->AutoHidePageSizeSelector || $patient_insurance_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="patient_insurance">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($patient_insurance_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($patient_insurance_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($patient_insurance_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($patient_insurance_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($patient_insurance_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($patient_insurance_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($patient_insurance->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $patient_insurance_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($patient_insurance_list->TotalRecs == 0 && !$patient_insurance->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $patient_insurance_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$patient_insurance_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$patient_insurance->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$patient_insurance->isExport()) { ?>
<script>
ew.scrollableTable("gmp_patient_insurance", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$patient_insurance_list->terminate();
?>