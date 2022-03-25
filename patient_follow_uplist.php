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
$patient_follow_up_list = new patient_follow_up_list();

// Run the page
$patient_follow_up_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_follow_up_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$patient_follow_up->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fpatient_follow_uplist = currentForm = new ew.Form("fpatient_follow_uplist", "list");
fpatient_follow_uplist.formKeyCountName = '<?php echo $patient_follow_up_list->FormKeyCountName ?>';

// Form_CustomValidate event
fpatient_follow_uplist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_follow_uplist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fpatient_follow_uplistsrch = currentSearchForm = new ew.Form("fpatient_follow_uplistsrch");

// Filters
fpatient_follow_uplistsrch.filterList = <?php echo $patient_follow_up_list->getFilterList() ?>;
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
<?php if (!$patient_follow_up->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($patient_follow_up_list->TotalRecs > 0 && $patient_follow_up_list->ExportOptions->visible()) { ?>
<?php $patient_follow_up_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($patient_follow_up_list->ImportOptions->visible()) { ?>
<?php $patient_follow_up_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($patient_follow_up_list->SearchOptions->visible()) { ?>
<?php $patient_follow_up_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($patient_follow_up_list->FilterOptions->visible()) { ?>
<?php $patient_follow_up_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$patient_follow_up->isExport() || EXPORT_MASTER_RECORD && $patient_follow_up->isExport("print")) { ?>
<?php
if ($patient_follow_up_list->DbMasterFilter <> "" && $patient_follow_up->getCurrentMasterTable() == "ip_admission") {
	if ($patient_follow_up_list->MasterRecordExists) {
		include_once "ip_admissionmaster.php";
	}
}
?>
<?php } ?>
<?php
$patient_follow_up_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$patient_follow_up->isExport() && !$patient_follow_up->CurrentAction) { ?>
<form name="fpatient_follow_uplistsrch" id="fpatient_follow_uplistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($patient_follow_up_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fpatient_follow_uplistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="patient_follow_up">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($patient_follow_up_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($patient_follow_up_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $patient_follow_up_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($patient_follow_up_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($patient_follow_up_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($patient_follow_up_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($patient_follow_up_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $patient_follow_up_list->showPageHeader(); ?>
<?php
$patient_follow_up_list->showMessage();
?>
<?php if ($patient_follow_up_list->TotalRecs > 0 || $patient_follow_up->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($patient_follow_up_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_follow_up">
<?php if (!$patient_follow_up->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$patient_follow_up->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($patient_follow_up_list->Pager)) $patient_follow_up_list->Pager = new NumericPager($patient_follow_up_list->StartRec, $patient_follow_up_list->DisplayRecs, $patient_follow_up_list->TotalRecs, $patient_follow_up_list->RecRange, $patient_follow_up_list->AutoHidePager) ?>
<?php if ($patient_follow_up_list->Pager->RecordCount > 0 && $patient_follow_up_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($patient_follow_up_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_follow_up_list->pageUrl() ?>start=<?php echo $patient_follow_up_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($patient_follow_up_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_follow_up_list->pageUrl() ?>start=<?php echo $patient_follow_up_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($patient_follow_up_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $patient_follow_up_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($patient_follow_up_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_follow_up_list->pageUrl() ?>start=<?php echo $patient_follow_up_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($patient_follow_up_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_follow_up_list->pageUrl() ?>start=<?php echo $patient_follow_up_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($patient_follow_up_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $patient_follow_up_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $patient_follow_up_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $patient_follow_up_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($patient_follow_up_list->TotalRecs > 0 && (!$patient_follow_up_list->AutoHidePageSizeSelector || $patient_follow_up_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="patient_follow_up">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($patient_follow_up_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($patient_follow_up_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($patient_follow_up_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($patient_follow_up_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($patient_follow_up_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($patient_follow_up_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($patient_follow_up->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $patient_follow_up_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpatient_follow_uplist" id="fpatient_follow_uplist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_follow_up_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_follow_up_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_follow_up">
<?php if ($patient_follow_up->getCurrentMasterTable() == "ip_admission" && $patient_follow_up->CurrentAction) { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="ip_admission">
<input type="hidden" name="fk_id" value="<?php echo $patient_follow_up->Reception->getSessionValue() ?>">
<input type="hidden" name="fk_patient_id" value="<?php echo $patient_follow_up->PatientId->getSessionValue() ?>">
<input type="hidden" name="fk_mrnNo" value="<?php echo $patient_follow_up->mrnno->getSessionValue() ?>">
<?php } ?>
<div id="gmp_patient_follow_up" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($patient_follow_up_list->TotalRecs > 0 || $patient_follow_up->isGridEdit()) { ?>
<table id="tbl_patient_follow_uplist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$patient_follow_up_list->RowType = ROWTYPE_HEADER;

// Render list options
$patient_follow_up_list->renderListOptions();

// Render list options (header, left)
$patient_follow_up_list->ListOptions->render("header", "left");
?>
<?php if ($patient_follow_up->id->Visible) { // id ?>
	<?php if ($patient_follow_up->sortUrl($patient_follow_up->id) == "") { ?>
		<th data-name="id" class="<?php echo $patient_follow_up->id->headerCellClass() ?>"><div id="elh_patient_follow_up_id" class="patient_follow_up_id"><div class="ew-table-header-caption"><?php echo $patient_follow_up->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $patient_follow_up->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_follow_up->SortUrl($patient_follow_up->id) ?>',1);"><div id="elh_patient_follow_up_id" class="patient_follow_up_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_follow_up->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_follow_up->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_follow_up->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_follow_up->PatID->Visible) { // PatID ?>
	<?php if ($patient_follow_up->sortUrl($patient_follow_up->PatID) == "") { ?>
		<th data-name="PatID" class="<?php echo $patient_follow_up->PatID->headerCellClass() ?>"><div id="elh_patient_follow_up_PatID" class="patient_follow_up_PatID"><div class="ew-table-header-caption"><?php echo $patient_follow_up->PatID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatID" class="<?php echo $patient_follow_up->PatID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_follow_up->SortUrl($patient_follow_up->PatID) ?>',1);"><div id="elh_patient_follow_up_PatID" class="patient_follow_up_PatID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_follow_up->PatID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_follow_up->PatID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_follow_up->PatID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_follow_up->PatientName->Visible) { // PatientName ?>
	<?php if ($patient_follow_up->sortUrl($patient_follow_up->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $patient_follow_up->PatientName->headerCellClass() ?>"><div id="elh_patient_follow_up_PatientName" class="patient_follow_up_PatientName"><div class="ew-table-header-caption"><?php echo $patient_follow_up->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $patient_follow_up->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_follow_up->SortUrl($patient_follow_up->PatientName) ?>',1);"><div id="elh_patient_follow_up_PatientName" class="patient_follow_up_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_follow_up->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_follow_up->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_follow_up->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_follow_up->MobileNumber->Visible) { // MobileNumber ?>
	<?php if ($patient_follow_up->sortUrl($patient_follow_up->MobileNumber) == "") { ?>
		<th data-name="MobileNumber" class="<?php echo $patient_follow_up->MobileNumber->headerCellClass() ?>"><div id="elh_patient_follow_up_MobileNumber" class="patient_follow_up_MobileNumber"><div class="ew-table-header-caption"><?php echo $patient_follow_up->MobileNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MobileNumber" class="<?php echo $patient_follow_up->MobileNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_follow_up->SortUrl($patient_follow_up->MobileNumber) ?>',1);"><div id="elh_patient_follow_up_MobileNumber" class="patient_follow_up_MobileNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_follow_up->MobileNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_follow_up->MobileNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_follow_up->MobileNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_follow_up->mrnno->Visible) { // mrnno ?>
	<?php if ($patient_follow_up->sortUrl($patient_follow_up->mrnno) == "") { ?>
		<th data-name="mrnno" class="<?php echo $patient_follow_up->mrnno->headerCellClass() ?>"><div id="elh_patient_follow_up_mrnno" class="patient_follow_up_mrnno"><div class="ew-table-header-caption"><?php echo $patient_follow_up->mrnno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnno" class="<?php echo $patient_follow_up->mrnno->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_follow_up->SortUrl($patient_follow_up->mrnno) ?>',1);"><div id="elh_patient_follow_up_mrnno" class="patient_follow_up_mrnno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_follow_up->mrnno->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_follow_up->mrnno->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_follow_up->mrnno->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_follow_up->BP->Visible) { // BP ?>
	<?php if ($patient_follow_up->sortUrl($patient_follow_up->BP) == "") { ?>
		<th data-name="BP" class="<?php echo $patient_follow_up->BP->headerCellClass() ?>"><div id="elh_patient_follow_up_BP" class="patient_follow_up_BP"><div class="ew-table-header-caption"><?php echo $patient_follow_up->BP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BP" class="<?php echo $patient_follow_up->BP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_follow_up->SortUrl($patient_follow_up->BP) ?>',1);"><div id="elh_patient_follow_up_BP" class="patient_follow_up_BP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_follow_up->BP->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_follow_up->BP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_follow_up->BP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_follow_up->Pulse->Visible) { // Pulse ?>
	<?php if ($patient_follow_up->sortUrl($patient_follow_up->Pulse) == "") { ?>
		<th data-name="Pulse" class="<?php echo $patient_follow_up->Pulse->headerCellClass() ?>"><div id="elh_patient_follow_up_Pulse" class="patient_follow_up_Pulse"><div class="ew-table-header-caption"><?php echo $patient_follow_up->Pulse->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pulse" class="<?php echo $patient_follow_up->Pulse->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_follow_up->SortUrl($patient_follow_up->Pulse) ?>',1);"><div id="elh_patient_follow_up_Pulse" class="patient_follow_up_Pulse">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_follow_up->Pulse->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_follow_up->Pulse->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_follow_up->Pulse->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_follow_up->Resp->Visible) { // Resp ?>
	<?php if ($patient_follow_up->sortUrl($patient_follow_up->Resp) == "") { ?>
		<th data-name="Resp" class="<?php echo $patient_follow_up->Resp->headerCellClass() ?>"><div id="elh_patient_follow_up_Resp" class="patient_follow_up_Resp"><div class="ew-table-header-caption"><?php echo $patient_follow_up->Resp->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Resp" class="<?php echo $patient_follow_up->Resp->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_follow_up->SortUrl($patient_follow_up->Resp) ?>',1);"><div id="elh_patient_follow_up_Resp" class="patient_follow_up_Resp">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_follow_up->Resp->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_follow_up->Resp->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_follow_up->Resp->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_follow_up->SPO2->Visible) { // SPO2 ?>
	<?php if ($patient_follow_up->sortUrl($patient_follow_up->SPO2) == "") { ?>
		<th data-name="SPO2" class="<?php echo $patient_follow_up->SPO2->headerCellClass() ?>"><div id="elh_patient_follow_up_SPO2" class="patient_follow_up_SPO2"><div class="ew-table-header-caption"><?php echo $patient_follow_up->SPO2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SPO2" class="<?php echo $patient_follow_up->SPO2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_follow_up->SortUrl($patient_follow_up->SPO2) ?>',1);"><div id="elh_patient_follow_up_SPO2" class="patient_follow_up_SPO2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_follow_up->SPO2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_follow_up->SPO2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_follow_up->SPO2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_follow_up->NextReviewDate->Visible) { // NextReviewDate ?>
	<?php if ($patient_follow_up->sortUrl($patient_follow_up->NextReviewDate) == "") { ?>
		<th data-name="NextReviewDate" class="<?php echo $patient_follow_up->NextReviewDate->headerCellClass() ?>"><div id="elh_patient_follow_up_NextReviewDate" class="patient_follow_up_NextReviewDate"><div class="ew-table-header-caption"><?php echo $patient_follow_up->NextReviewDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NextReviewDate" class="<?php echo $patient_follow_up->NextReviewDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_follow_up->SortUrl($patient_follow_up->NextReviewDate) ?>',1);"><div id="elh_patient_follow_up_NextReviewDate" class="patient_follow_up_NextReviewDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_follow_up->NextReviewDate->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_follow_up->NextReviewDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_follow_up->NextReviewDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_follow_up->Age->Visible) { // Age ?>
	<?php if ($patient_follow_up->sortUrl($patient_follow_up->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $patient_follow_up->Age->headerCellClass() ?>"><div id="elh_patient_follow_up_Age" class="patient_follow_up_Age"><div class="ew-table-header-caption"><?php echo $patient_follow_up->Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $patient_follow_up->Age->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_follow_up->SortUrl($patient_follow_up->Age) ?>',1);"><div id="elh_patient_follow_up_Age" class="patient_follow_up_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_follow_up->Age->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_follow_up->Age->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_follow_up->Age->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_follow_up->Gender->Visible) { // Gender ?>
	<?php if ($patient_follow_up->sortUrl($patient_follow_up->Gender) == "") { ?>
		<th data-name="Gender" class="<?php echo $patient_follow_up->Gender->headerCellClass() ?>"><div id="elh_patient_follow_up_Gender" class="patient_follow_up_Gender"><div class="ew-table-header-caption"><?php echo $patient_follow_up->Gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gender" class="<?php echo $patient_follow_up->Gender->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_follow_up->SortUrl($patient_follow_up->Gender) ?>',1);"><div id="elh_patient_follow_up_Gender" class="patient_follow_up_Gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_follow_up->Gender->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_follow_up->Gender->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_follow_up->Gender->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_follow_up->HospID->Visible) { // HospID ?>
	<?php if ($patient_follow_up->sortUrl($patient_follow_up->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $patient_follow_up->HospID->headerCellClass() ?>"><div id="elh_patient_follow_up_HospID" class="patient_follow_up_HospID"><div class="ew-table-header-caption"><?php echo $patient_follow_up->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $patient_follow_up->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_follow_up->SortUrl($patient_follow_up->HospID) ?>',1);"><div id="elh_patient_follow_up_HospID" class="patient_follow_up_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_follow_up->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_follow_up->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_follow_up->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_follow_up->Reception->Visible) { // Reception ?>
	<?php if ($patient_follow_up->sortUrl($patient_follow_up->Reception) == "") { ?>
		<th data-name="Reception" class="<?php echo $patient_follow_up->Reception->headerCellClass() ?>"><div id="elh_patient_follow_up_Reception" class="patient_follow_up_Reception"><div class="ew-table-header-caption"><?php echo $patient_follow_up->Reception->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Reception" class="<?php echo $patient_follow_up->Reception->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_follow_up->SortUrl($patient_follow_up->Reception) ?>',1);"><div id="elh_patient_follow_up_Reception" class="patient_follow_up_Reception">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_follow_up->Reception->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_follow_up->Reception->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_follow_up->Reception->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_follow_up->PatientId->Visible) { // PatientId ?>
	<?php if ($patient_follow_up->sortUrl($patient_follow_up->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $patient_follow_up->PatientId->headerCellClass() ?>"><div id="elh_patient_follow_up_PatientId" class="patient_follow_up_PatientId"><div class="ew-table-header-caption"><?php echo $patient_follow_up->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $patient_follow_up->PatientId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_follow_up->SortUrl($patient_follow_up->PatientId) ?>',1);"><div id="elh_patient_follow_up_PatientId" class="patient_follow_up_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_follow_up->PatientId->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_follow_up->PatientId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_follow_up->PatientId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_follow_up_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($patient_follow_up->ExportAll && $patient_follow_up->isExport()) {
	$patient_follow_up_list->StopRec = $patient_follow_up_list->TotalRecs;
} else {

	// Set the last record to display
	if ($patient_follow_up_list->TotalRecs > $patient_follow_up_list->StartRec + $patient_follow_up_list->DisplayRecs - 1)
		$patient_follow_up_list->StopRec = $patient_follow_up_list->StartRec + $patient_follow_up_list->DisplayRecs - 1;
	else
		$patient_follow_up_list->StopRec = $patient_follow_up_list->TotalRecs;
}
$patient_follow_up_list->RecCnt = $patient_follow_up_list->StartRec - 1;
if ($patient_follow_up_list->Recordset && !$patient_follow_up_list->Recordset->EOF) {
	$patient_follow_up_list->Recordset->moveFirst();
	$selectLimit = $patient_follow_up_list->UseSelectLimit;
	if (!$selectLimit && $patient_follow_up_list->StartRec > 1)
		$patient_follow_up_list->Recordset->move($patient_follow_up_list->StartRec - 1);
} elseif (!$patient_follow_up->AllowAddDeleteRow && $patient_follow_up_list->StopRec == 0) {
	$patient_follow_up_list->StopRec = $patient_follow_up->GridAddRowCount;
}

// Initialize aggregate
$patient_follow_up->RowType = ROWTYPE_AGGREGATEINIT;
$patient_follow_up->resetAttributes();
$patient_follow_up_list->renderRow();
while ($patient_follow_up_list->RecCnt < $patient_follow_up_list->StopRec) {
	$patient_follow_up_list->RecCnt++;
	if ($patient_follow_up_list->RecCnt >= $patient_follow_up_list->StartRec) {
		$patient_follow_up_list->RowCnt++;

		// Set up key count
		$patient_follow_up_list->KeyCount = $patient_follow_up_list->RowIndex;

		// Init row class and style
		$patient_follow_up->resetAttributes();
		$patient_follow_up->CssClass = "";
		if ($patient_follow_up->isGridAdd()) {
		} else {
			$patient_follow_up_list->loadRowValues($patient_follow_up_list->Recordset); // Load row values
		}
		$patient_follow_up->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$patient_follow_up->RowAttrs = array_merge($patient_follow_up->RowAttrs, array('data-rowindex'=>$patient_follow_up_list->RowCnt, 'id'=>'r' . $patient_follow_up_list->RowCnt . '_patient_follow_up', 'data-rowtype'=>$patient_follow_up->RowType));

		// Render row
		$patient_follow_up_list->renderRow();

		// Render list options
		$patient_follow_up_list->renderListOptions();
?>
	<tr<?php echo $patient_follow_up->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_follow_up_list->ListOptions->render("body", "left", $patient_follow_up_list->RowCnt);
?>
	<?php if ($patient_follow_up->id->Visible) { // id ?>
		<td data-name="id"<?php echo $patient_follow_up->id->cellAttributes() ?>>
<span id="el<?php echo $patient_follow_up_list->RowCnt ?>_patient_follow_up_id" class="patient_follow_up_id">
<span<?php echo $patient_follow_up->id->viewAttributes() ?>>
<?php echo $patient_follow_up->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_follow_up->PatID->Visible) { // PatID ?>
		<td data-name="PatID"<?php echo $patient_follow_up->PatID->cellAttributes() ?>>
<span id="el<?php echo $patient_follow_up_list->RowCnt ?>_patient_follow_up_PatID" class="patient_follow_up_PatID">
<span<?php echo $patient_follow_up->PatID->viewAttributes() ?>>
<?php echo $patient_follow_up->PatID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_follow_up->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $patient_follow_up->PatientName->cellAttributes() ?>>
<span id="el<?php echo $patient_follow_up_list->RowCnt ?>_patient_follow_up_PatientName" class="patient_follow_up_PatientName">
<span<?php echo $patient_follow_up->PatientName->viewAttributes() ?>>
<?php echo $patient_follow_up->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_follow_up->MobileNumber->Visible) { // MobileNumber ?>
		<td data-name="MobileNumber"<?php echo $patient_follow_up->MobileNumber->cellAttributes() ?>>
<span id="el<?php echo $patient_follow_up_list->RowCnt ?>_patient_follow_up_MobileNumber" class="patient_follow_up_MobileNumber">
<span<?php echo $patient_follow_up->MobileNumber->viewAttributes() ?>>
<?php echo $patient_follow_up->MobileNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_follow_up->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno"<?php echo $patient_follow_up->mrnno->cellAttributes() ?>>
<span id="el<?php echo $patient_follow_up_list->RowCnt ?>_patient_follow_up_mrnno" class="patient_follow_up_mrnno">
<span<?php echo $patient_follow_up->mrnno->viewAttributes() ?>>
<?php echo $patient_follow_up->mrnno->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_follow_up->BP->Visible) { // BP ?>
		<td data-name="BP"<?php echo $patient_follow_up->BP->cellAttributes() ?>>
<span id="el<?php echo $patient_follow_up_list->RowCnt ?>_patient_follow_up_BP" class="patient_follow_up_BP">
<span<?php echo $patient_follow_up->BP->viewAttributes() ?>>
<?php echo $patient_follow_up->BP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_follow_up->Pulse->Visible) { // Pulse ?>
		<td data-name="Pulse"<?php echo $patient_follow_up->Pulse->cellAttributes() ?>>
<span id="el<?php echo $patient_follow_up_list->RowCnt ?>_patient_follow_up_Pulse" class="patient_follow_up_Pulse">
<span<?php echo $patient_follow_up->Pulse->viewAttributes() ?>>
<?php echo $patient_follow_up->Pulse->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_follow_up->Resp->Visible) { // Resp ?>
		<td data-name="Resp"<?php echo $patient_follow_up->Resp->cellAttributes() ?>>
<span id="el<?php echo $patient_follow_up_list->RowCnt ?>_patient_follow_up_Resp" class="patient_follow_up_Resp">
<span<?php echo $patient_follow_up->Resp->viewAttributes() ?>>
<?php echo $patient_follow_up->Resp->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_follow_up->SPO2->Visible) { // SPO2 ?>
		<td data-name="SPO2"<?php echo $patient_follow_up->SPO2->cellAttributes() ?>>
<span id="el<?php echo $patient_follow_up_list->RowCnt ?>_patient_follow_up_SPO2" class="patient_follow_up_SPO2">
<span<?php echo $patient_follow_up->SPO2->viewAttributes() ?>>
<?php echo $patient_follow_up->SPO2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_follow_up->NextReviewDate->Visible) { // NextReviewDate ?>
		<td data-name="NextReviewDate"<?php echo $patient_follow_up->NextReviewDate->cellAttributes() ?>>
<span id="el<?php echo $patient_follow_up_list->RowCnt ?>_patient_follow_up_NextReviewDate" class="patient_follow_up_NextReviewDate">
<span<?php echo $patient_follow_up->NextReviewDate->viewAttributes() ?>>
<?php echo $patient_follow_up->NextReviewDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_follow_up->Age->Visible) { // Age ?>
		<td data-name="Age"<?php echo $patient_follow_up->Age->cellAttributes() ?>>
<span id="el<?php echo $patient_follow_up_list->RowCnt ?>_patient_follow_up_Age" class="patient_follow_up_Age">
<span<?php echo $patient_follow_up->Age->viewAttributes() ?>>
<?php echo $patient_follow_up->Age->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_follow_up->Gender->Visible) { // Gender ?>
		<td data-name="Gender"<?php echo $patient_follow_up->Gender->cellAttributes() ?>>
<span id="el<?php echo $patient_follow_up_list->RowCnt ?>_patient_follow_up_Gender" class="patient_follow_up_Gender">
<span<?php echo $patient_follow_up->Gender->viewAttributes() ?>>
<?php echo $patient_follow_up->Gender->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_follow_up->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $patient_follow_up->HospID->cellAttributes() ?>>
<span id="el<?php echo $patient_follow_up_list->RowCnt ?>_patient_follow_up_HospID" class="patient_follow_up_HospID">
<span<?php echo $patient_follow_up->HospID->viewAttributes() ?>>
<?php echo $patient_follow_up->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_follow_up->Reception->Visible) { // Reception ?>
		<td data-name="Reception"<?php echo $patient_follow_up->Reception->cellAttributes() ?>>
<span id="el<?php echo $patient_follow_up_list->RowCnt ?>_patient_follow_up_Reception" class="patient_follow_up_Reception">
<span<?php echo $patient_follow_up->Reception->viewAttributes() ?>>
<?php echo $patient_follow_up->Reception->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_follow_up->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId"<?php echo $patient_follow_up->PatientId->cellAttributes() ?>>
<span id="el<?php echo $patient_follow_up_list->RowCnt ?>_patient_follow_up_PatientId" class="patient_follow_up_PatientId">
<span<?php echo $patient_follow_up->PatientId->viewAttributes() ?>>
<?php echo $patient_follow_up->PatientId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_follow_up_list->ListOptions->render("body", "right", $patient_follow_up_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$patient_follow_up->isGridAdd())
		$patient_follow_up_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$patient_follow_up->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($patient_follow_up_list->Recordset)
	$patient_follow_up_list->Recordset->Close();
?>
<?php if (!$patient_follow_up->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$patient_follow_up->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($patient_follow_up_list->Pager)) $patient_follow_up_list->Pager = new NumericPager($patient_follow_up_list->StartRec, $patient_follow_up_list->DisplayRecs, $patient_follow_up_list->TotalRecs, $patient_follow_up_list->RecRange, $patient_follow_up_list->AutoHidePager) ?>
<?php if ($patient_follow_up_list->Pager->RecordCount > 0 && $patient_follow_up_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($patient_follow_up_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_follow_up_list->pageUrl() ?>start=<?php echo $patient_follow_up_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($patient_follow_up_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_follow_up_list->pageUrl() ?>start=<?php echo $patient_follow_up_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($patient_follow_up_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $patient_follow_up_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($patient_follow_up_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_follow_up_list->pageUrl() ?>start=<?php echo $patient_follow_up_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($patient_follow_up_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_follow_up_list->pageUrl() ?>start=<?php echo $patient_follow_up_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($patient_follow_up_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $patient_follow_up_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $patient_follow_up_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $patient_follow_up_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($patient_follow_up_list->TotalRecs > 0 && (!$patient_follow_up_list->AutoHidePageSizeSelector || $patient_follow_up_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="patient_follow_up">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($patient_follow_up_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($patient_follow_up_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($patient_follow_up_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($patient_follow_up_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($patient_follow_up_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($patient_follow_up_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($patient_follow_up->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $patient_follow_up_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($patient_follow_up_list->TotalRecs == 0 && !$patient_follow_up->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $patient_follow_up_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$patient_follow_up_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$patient_follow_up->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$patient_follow_up->isExport()) { ?>
<script>
ew.scrollableTable("gmp_patient_follow_up", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$patient_follow_up_list->terminate();
?>