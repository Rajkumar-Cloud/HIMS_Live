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
$patient_an_registration_list = new patient_an_registration_list();

// Run the page
$patient_an_registration_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_an_registration_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$patient_an_registration->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fpatient_an_registrationlist = currentForm = new ew.Form("fpatient_an_registrationlist", "list");
fpatient_an_registrationlist.formKeyCountName = '<?php echo $patient_an_registration_list->FormKeyCountName ?>';

// Form_CustomValidate event
fpatient_an_registrationlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_an_registrationlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatient_an_registrationlist.lists["x_MenstrualHistory"] = <?php echo $patient_an_registration_list->MenstrualHistory->Lookup->toClientList() ?>;
fpatient_an_registrationlist.lists["x_MenstrualHistory"].options = <?php echo JsonEncode($patient_an_registration_list->MenstrualHistory->options(FALSE, TRUE)) ?>;
fpatient_an_registrationlist.lists["x_PreviousHistoryofGDM"] = <?php echo $patient_an_registration_list->PreviousHistoryofGDM->Lookup->toClientList() ?>;
fpatient_an_registrationlist.lists["x_PreviousHistoryofGDM"].options = <?php echo JsonEncode($patient_an_registration_list->PreviousHistoryofGDM->options(FALSE, TRUE)) ?>;
fpatient_an_registrationlist.lists["x_PreviousHistorofPIH"] = <?php echo $patient_an_registration_list->PreviousHistorofPIH->Lookup->toClientList() ?>;
fpatient_an_registrationlist.lists["x_PreviousHistorofPIH"].options = <?php echo JsonEncode($patient_an_registration_list->PreviousHistorofPIH->options(FALSE, TRUE)) ?>;
fpatient_an_registrationlist.lists["x_PreviousHistoryofIUGR"] = <?php echo $patient_an_registration_list->PreviousHistoryofIUGR->Lookup->toClientList() ?>;
fpatient_an_registrationlist.lists["x_PreviousHistoryofIUGR"].options = <?php echo JsonEncode($patient_an_registration_list->PreviousHistoryofIUGR->options(FALSE, TRUE)) ?>;
fpatient_an_registrationlist.lists["x_PreviousHistoryofOligohydramnios"] = <?php echo $patient_an_registration_list->PreviousHistoryofOligohydramnios->Lookup->toClientList() ?>;
fpatient_an_registrationlist.lists["x_PreviousHistoryofOligohydramnios"].options = <?php echo JsonEncode($patient_an_registration_list->PreviousHistoryofOligohydramnios->options(FALSE, TRUE)) ?>;
fpatient_an_registrationlist.lists["x_PreviousHistoryofPreterm"] = <?php echo $patient_an_registration_list->PreviousHistoryofPreterm->Lookup->toClientList() ?>;
fpatient_an_registrationlist.lists["x_PreviousHistoryofPreterm"].options = <?php echo JsonEncode($patient_an_registration_list->PreviousHistoryofPreterm->options(FALSE, TRUE)) ?>;
fpatient_an_registrationlist.lists["x_PastMedicalHistory[]"] = <?php echo $patient_an_registration_list->PastMedicalHistory->Lookup->toClientList() ?>;
fpatient_an_registrationlist.lists["x_PastMedicalHistory[]"].options = <?php echo JsonEncode($patient_an_registration_list->PastMedicalHistory->options(FALSE, TRUE)) ?>;
fpatient_an_registrationlist.lists["x_PastSurgicalHistory[]"] = <?php echo $patient_an_registration_list->PastSurgicalHistory->Lookup->toClientList() ?>;
fpatient_an_registrationlist.lists["x_PastSurgicalHistory[]"].options = <?php echo JsonEncode($patient_an_registration_list->PastSurgicalHistory->options(FALSE, TRUE)) ?>;
fpatient_an_registrationlist.lists["x_FamilyHistory[]"] = <?php echo $patient_an_registration_list->FamilyHistory->Lookup->toClientList() ?>;
fpatient_an_registrationlist.lists["x_FamilyHistory[]"].options = <?php echo JsonEncode($patient_an_registration_list->FamilyHistory->options(FALSE, TRUE)) ?>;
fpatient_an_registrationlist.lists["x_Bleeding[]"] = <?php echo $patient_an_registration_list->Bleeding->Lookup->toClientList() ?>;
fpatient_an_registrationlist.lists["x_Bleeding[]"].options = <?php echo JsonEncode($patient_an_registration_list->Bleeding->options(FALSE, TRUE)) ?>;
fpatient_an_registrationlist.lists["x_Miscarriage"] = <?php echo $patient_an_registration_list->Miscarriage->Lookup->toClientList() ?>;
fpatient_an_registrationlist.lists["x_Miscarriage"].options = <?php echo JsonEncode($patient_an_registration_list->Miscarriage->options(FALSE, TRUE)) ?>;
fpatient_an_registrationlist.lists["x_ModeOfDelivery"] = <?php echo $patient_an_registration_list->ModeOfDelivery->Lookup->toClientList() ?>;
fpatient_an_registrationlist.lists["x_ModeOfDelivery"].options = <?php echo JsonEncode($patient_an_registration_list->ModeOfDelivery->options(FALSE, TRUE)) ?>;
fpatient_an_registrationlist.lists["x_NDS"] = <?php echo $patient_an_registration_list->NDS->Lookup->toClientList() ?>;
fpatient_an_registrationlist.lists["x_NDS"].options = <?php echo JsonEncode($patient_an_registration_list->NDS->options(FALSE, TRUE)) ?>;
fpatient_an_registrationlist.lists["x_NDP"] = <?php echo $patient_an_registration_list->NDP->Lookup->toClientList() ?>;
fpatient_an_registrationlist.lists["x_NDP"].options = <?php echo JsonEncode($patient_an_registration_list->NDP->options(FALSE, TRUE)) ?>;
fpatient_an_registrationlist.lists["x_VaccumS"] = <?php echo $patient_an_registration_list->VaccumS->Lookup->toClientList() ?>;
fpatient_an_registrationlist.lists["x_VaccumS"].options = <?php echo JsonEncode($patient_an_registration_list->VaccumS->options(FALSE, TRUE)) ?>;
fpatient_an_registrationlist.lists["x_VaccumP"] = <?php echo $patient_an_registration_list->VaccumP->Lookup->toClientList() ?>;
fpatient_an_registrationlist.lists["x_VaccumP"].options = <?php echo JsonEncode($patient_an_registration_list->VaccumP->options(FALSE, TRUE)) ?>;
fpatient_an_registrationlist.lists["x_ForcepsS"] = <?php echo $patient_an_registration_list->ForcepsS->Lookup->toClientList() ?>;
fpatient_an_registrationlist.lists["x_ForcepsS"].options = <?php echo JsonEncode($patient_an_registration_list->ForcepsS->options(FALSE, TRUE)) ?>;
fpatient_an_registrationlist.lists["x_ForcepsP"] = <?php echo $patient_an_registration_list->ForcepsP->Lookup->toClientList() ?>;
fpatient_an_registrationlist.lists["x_ForcepsP"].options = <?php echo JsonEncode($patient_an_registration_list->ForcepsP->options(FALSE, TRUE)) ?>;
fpatient_an_registrationlist.lists["x_ElectiveS"] = <?php echo $patient_an_registration_list->ElectiveS->Lookup->toClientList() ?>;
fpatient_an_registrationlist.lists["x_ElectiveS"].options = <?php echo JsonEncode($patient_an_registration_list->ElectiveS->options(FALSE, TRUE)) ?>;
fpatient_an_registrationlist.lists["x_ElectiveP"] = <?php echo $patient_an_registration_list->ElectiveP->Lookup->toClientList() ?>;
fpatient_an_registrationlist.lists["x_ElectiveP"].options = <?php echo JsonEncode($patient_an_registration_list->ElectiveP->options(FALSE, TRUE)) ?>;
fpatient_an_registrationlist.lists["x_EmergencyS"] = <?php echo $patient_an_registration_list->EmergencyS->Lookup->toClientList() ?>;
fpatient_an_registrationlist.lists["x_EmergencyS"].options = <?php echo JsonEncode($patient_an_registration_list->EmergencyS->options(FALSE, TRUE)) ?>;
fpatient_an_registrationlist.lists["x_EmergencyP"] = <?php echo $patient_an_registration_list->EmergencyP->Lookup->toClientList() ?>;
fpatient_an_registrationlist.lists["x_EmergencyP"].options = <?php echo JsonEncode($patient_an_registration_list->EmergencyP->options(FALSE, TRUE)) ?>;
fpatient_an_registrationlist.lists["x_Maturity"] = <?php echo $patient_an_registration_list->Maturity->Lookup->toClientList() ?>;
fpatient_an_registrationlist.lists["x_Maturity"].options = <?php echo JsonEncode($patient_an_registration_list->Maturity->options(FALSE, TRUE)) ?>;
fpatient_an_registrationlist.lists["x_SpillOverReasons"] = <?php echo $patient_an_registration_list->SpillOverReasons->Lookup->toClientList() ?>;
fpatient_an_registrationlist.lists["x_SpillOverReasons"].options = <?php echo JsonEncode($patient_an_registration_list->SpillOverReasons->options(FALSE, TRUE)) ?>;
fpatient_an_registrationlist.lists["x_ANClosed[]"] = <?php echo $patient_an_registration_list->ANClosed->Lookup->toClientList() ?>;
fpatient_an_registrationlist.lists["x_ANClosed[]"].options = <?php echo JsonEncode($patient_an_registration_list->ANClosed->options(FALSE, TRUE)) ?>;

// Form object for search
var fpatient_an_registrationlistsrch = currentSearchForm = new ew.Form("fpatient_an_registrationlistsrch");

// Filters
fpatient_an_registrationlistsrch.filterList = <?php echo $patient_an_registration_list->getFilterList() ?>;
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
<?php if (!$patient_an_registration->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($patient_an_registration_list->TotalRecs > 0 && $patient_an_registration_list->ExportOptions->visible()) { ?>
<?php $patient_an_registration_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($patient_an_registration_list->ImportOptions->visible()) { ?>
<?php $patient_an_registration_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($patient_an_registration_list->SearchOptions->visible()) { ?>
<?php $patient_an_registration_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($patient_an_registration_list->FilterOptions->visible()) { ?>
<?php $patient_an_registration_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$patient_an_registration->isExport() || EXPORT_MASTER_RECORD && $patient_an_registration->isExport("print")) { ?>
<?php
if ($patient_an_registration_list->DbMasterFilter <> "" && $patient_an_registration->getCurrentMasterTable() == "patient_opd_follow_up") {
	if ($patient_an_registration_list->MasterRecordExists) {
		include_once "patient_opd_follow_upmaster.php";
	}
}
?>
<?php } ?>
<?php
$patient_an_registration_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$patient_an_registration->isExport() && !$patient_an_registration->CurrentAction) { ?>
<form name="fpatient_an_registrationlistsrch" id="fpatient_an_registrationlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($patient_an_registration_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fpatient_an_registrationlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="patient_an_registration">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($patient_an_registration_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($patient_an_registration_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $patient_an_registration_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($patient_an_registration_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($patient_an_registration_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($patient_an_registration_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($patient_an_registration_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $patient_an_registration_list->showPageHeader(); ?>
<?php
$patient_an_registration_list->showMessage();
?>
<?php if ($patient_an_registration_list->TotalRecs > 0 || $patient_an_registration->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($patient_an_registration_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_an_registration">
<?php if (!$patient_an_registration->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$patient_an_registration->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($patient_an_registration_list->Pager)) $patient_an_registration_list->Pager = new NumericPager($patient_an_registration_list->StartRec, $patient_an_registration_list->DisplayRecs, $patient_an_registration_list->TotalRecs, $patient_an_registration_list->RecRange, $patient_an_registration_list->AutoHidePager) ?>
<?php if ($patient_an_registration_list->Pager->RecordCount > 0 && $patient_an_registration_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($patient_an_registration_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_an_registration_list->pageUrl() ?>start=<?php echo $patient_an_registration_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($patient_an_registration_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_an_registration_list->pageUrl() ?>start=<?php echo $patient_an_registration_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($patient_an_registration_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $patient_an_registration_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($patient_an_registration_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_an_registration_list->pageUrl() ?>start=<?php echo $patient_an_registration_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($patient_an_registration_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_an_registration_list->pageUrl() ?>start=<?php echo $patient_an_registration_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($patient_an_registration_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $patient_an_registration_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $patient_an_registration_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $patient_an_registration_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($patient_an_registration_list->TotalRecs > 0 && (!$patient_an_registration_list->AutoHidePageSizeSelector || $patient_an_registration_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="patient_an_registration">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($patient_an_registration_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($patient_an_registration_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($patient_an_registration_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($patient_an_registration_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($patient_an_registration_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($patient_an_registration_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($patient_an_registration->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $patient_an_registration_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpatient_an_registrationlist" id="fpatient_an_registrationlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_an_registration_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_an_registration_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_an_registration">
<?php if ($patient_an_registration->getCurrentMasterTable() == "patient_opd_follow_up" && $patient_an_registration->CurrentAction) { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="patient_opd_follow_up">
<input type="hidden" name="fk_PatientId" value="<?php echo $patient_an_registration->pid->getSessionValue() ?>">
<input type="hidden" name="fk_id" value="<?php echo $patient_an_registration->fid->getSessionValue() ?>">
<?php } ?>
<div id="gmp_patient_an_registration" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($patient_an_registration_list->TotalRecs > 0 || $patient_an_registration->isGridEdit()) { ?>
<table id="tbl_patient_an_registrationlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$patient_an_registration_list->RowType = ROWTYPE_HEADER;

// Render list options
$patient_an_registration_list->renderListOptions();

// Render list options (header, left)
$patient_an_registration_list->ListOptions->render("header", "left");
?>
<?php if ($patient_an_registration->id->Visible) { // id ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->id) == "") { ?>
		<th data-name="id" class="<?php echo $patient_an_registration->id->headerCellClass() ?>"><div id="elh_patient_an_registration_id" class="patient_an_registration_id"><div class="ew-table-header-caption"><?php echo $patient_an_registration->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $patient_an_registration->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->id) ?>',1);"><div id="elh_patient_an_registration_id" class="patient_an_registration_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->pid->Visible) { // pid ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->pid) == "") { ?>
		<th data-name="pid" class="<?php echo $patient_an_registration->pid->headerCellClass() ?>"><div id="elh_patient_an_registration_pid" class="patient_an_registration_pid"><div class="ew-table-header-caption"><?php echo $patient_an_registration->pid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pid" class="<?php echo $patient_an_registration->pid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->pid) ?>',1);"><div id="elh_patient_an_registration_pid" class="patient_an_registration_pid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->pid->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->pid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->pid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->fid->Visible) { // fid ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->fid) == "") { ?>
		<th data-name="fid" class="<?php echo $patient_an_registration->fid->headerCellClass() ?>"><div id="elh_patient_an_registration_fid" class="patient_an_registration_fid"><div class="ew-table-header-caption"><?php echo $patient_an_registration->fid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="fid" class="<?php echo $patient_an_registration->fid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->fid) ?>',1);"><div id="elh_patient_an_registration_fid" class="patient_an_registration_fid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->fid->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->fid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->fid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->G->Visible) { // G ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->G) == "") { ?>
		<th data-name="G" class="<?php echo $patient_an_registration->G->headerCellClass() ?>"><div id="elh_patient_an_registration_G" class="patient_an_registration_G"><div class="ew-table-header-caption"><?php echo $patient_an_registration->G->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="G" class="<?php echo $patient_an_registration->G->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->G) ?>',1);"><div id="elh_patient_an_registration_G" class="patient_an_registration_G">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->G->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->G->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->G->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->P->Visible) { // P ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->P) == "") { ?>
		<th data-name="P" class="<?php echo $patient_an_registration->P->headerCellClass() ?>"><div id="elh_patient_an_registration_P" class="patient_an_registration_P"><div class="ew-table-header-caption"><?php echo $patient_an_registration->P->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="P" class="<?php echo $patient_an_registration->P->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->P) ?>',1);"><div id="elh_patient_an_registration_P" class="patient_an_registration_P">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->P->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->P->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->P->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->L->Visible) { // L ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->L) == "") { ?>
		<th data-name="L" class="<?php echo $patient_an_registration->L->headerCellClass() ?>"><div id="elh_patient_an_registration_L" class="patient_an_registration_L"><div class="ew-table-header-caption"><?php echo $patient_an_registration->L->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="L" class="<?php echo $patient_an_registration->L->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->L) ?>',1);"><div id="elh_patient_an_registration_L" class="patient_an_registration_L">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->L->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->L->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->L->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->A->Visible) { // A ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->A) == "") { ?>
		<th data-name="A" class="<?php echo $patient_an_registration->A->headerCellClass() ?>"><div id="elh_patient_an_registration_A" class="patient_an_registration_A"><div class="ew-table-header-caption"><?php echo $patient_an_registration->A->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="A" class="<?php echo $patient_an_registration->A->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->A) ?>',1);"><div id="elh_patient_an_registration_A" class="patient_an_registration_A">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->A->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->A->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->A->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->E->Visible) { // E ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->E) == "") { ?>
		<th data-name="E" class="<?php echo $patient_an_registration->E->headerCellClass() ?>"><div id="elh_patient_an_registration_E" class="patient_an_registration_E"><div class="ew-table-header-caption"><?php echo $patient_an_registration->E->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="E" class="<?php echo $patient_an_registration->E->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->E) ?>',1);"><div id="elh_patient_an_registration_E" class="patient_an_registration_E">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->E->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->E->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->E->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->M->Visible) { // M ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->M) == "") { ?>
		<th data-name="M" class="<?php echo $patient_an_registration->M->headerCellClass() ?>"><div id="elh_patient_an_registration_M" class="patient_an_registration_M"><div class="ew-table-header-caption"><?php echo $patient_an_registration->M->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="M" class="<?php echo $patient_an_registration->M->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->M) ?>',1);"><div id="elh_patient_an_registration_M" class="patient_an_registration_M">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->M->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->M->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->M->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->LMP->Visible) { // LMP ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->LMP) == "") { ?>
		<th data-name="LMP" class="<?php echo $patient_an_registration->LMP->headerCellClass() ?>"><div id="elh_patient_an_registration_LMP" class="patient_an_registration_LMP"><div class="ew-table-header-caption"><?php echo $patient_an_registration->LMP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LMP" class="<?php echo $patient_an_registration->LMP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->LMP) ?>',1);"><div id="elh_patient_an_registration_LMP" class="patient_an_registration_LMP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->LMP->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->LMP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->LMP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->EDO->Visible) { // EDO ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->EDO) == "") { ?>
		<th data-name="EDO" class="<?php echo $patient_an_registration->EDO->headerCellClass() ?>"><div id="elh_patient_an_registration_EDO" class="patient_an_registration_EDO"><div class="ew-table-header-caption"><?php echo $patient_an_registration->EDO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EDO" class="<?php echo $patient_an_registration->EDO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->EDO) ?>',1);"><div id="elh_patient_an_registration_EDO" class="patient_an_registration_EDO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->EDO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->EDO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->EDO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->MenstrualHistory->Visible) { // MenstrualHistory ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->MenstrualHistory) == "") { ?>
		<th data-name="MenstrualHistory" class="<?php echo $patient_an_registration->MenstrualHistory->headerCellClass() ?>"><div id="elh_patient_an_registration_MenstrualHistory" class="patient_an_registration_MenstrualHistory"><div class="ew-table-header-caption"><?php echo $patient_an_registration->MenstrualHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MenstrualHistory" class="<?php echo $patient_an_registration->MenstrualHistory->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->MenstrualHistory) ?>',1);"><div id="elh_patient_an_registration_MenstrualHistory" class="patient_an_registration_MenstrualHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->MenstrualHistory->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->MenstrualHistory->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->MenstrualHistory->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->MaritalHistory->Visible) { // MaritalHistory ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->MaritalHistory) == "") { ?>
		<th data-name="MaritalHistory" class="<?php echo $patient_an_registration->MaritalHistory->headerCellClass() ?>"><div id="elh_patient_an_registration_MaritalHistory" class="patient_an_registration_MaritalHistory"><div class="ew-table-header-caption"><?php echo $patient_an_registration->MaritalHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MaritalHistory" class="<?php echo $patient_an_registration->MaritalHistory->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->MaritalHistory) ?>',1);"><div id="elh_patient_an_registration_MaritalHistory" class="patient_an_registration_MaritalHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->MaritalHistory->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->MaritalHistory->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->MaritalHistory->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->ObstetricHistory->Visible) { // ObstetricHistory ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->ObstetricHistory) == "") { ?>
		<th data-name="ObstetricHistory" class="<?php echo $patient_an_registration->ObstetricHistory->headerCellClass() ?>"><div id="elh_patient_an_registration_ObstetricHistory" class="patient_an_registration_ObstetricHistory"><div class="ew-table-header-caption"><?php echo $patient_an_registration->ObstetricHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ObstetricHistory" class="<?php echo $patient_an_registration->ObstetricHistory->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->ObstetricHistory) ?>',1);"><div id="elh_patient_an_registration_ObstetricHistory" class="patient_an_registration_ObstetricHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->ObstetricHistory->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->ObstetricHistory->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->ObstetricHistory->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->PreviousHistoryofGDM->Visible) { // PreviousHistoryofGDM ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->PreviousHistoryofGDM) == "") { ?>
		<th data-name="PreviousHistoryofGDM" class="<?php echo $patient_an_registration->PreviousHistoryofGDM->headerCellClass() ?>"><div id="elh_patient_an_registration_PreviousHistoryofGDM" class="patient_an_registration_PreviousHistoryofGDM"><div class="ew-table-header-caption"><?php echo $patient_an_registration->PreviousHistoryofGDM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PreviousHistoryofGDM" class="<?php echo $patient_an_registration->PreviousHistoryofGDM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->PreviousHistoryofGDM) ?>',1);"><div id="elh_patient_an_registration_PreviousHistoryofGDM" class="patient_an_registration_PreviousHistoryofGDM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->PreviousHistoryofGDM->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->PreviousHistoryofGDM->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->PreviousHistoryofGDM->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->PreviousHistorofPIH->Visible) { // PreviousHistorofPIH ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->PreviousHistorofPIH) == "") { ?>
		<th data-name="PreviousHistorofPIH" class="<?php echo $patient_an_registration->PreviousHistorofPIH->headerCellClass() ?>"><div id="elh_patient_an_registration_PreviousHistorofPIH" class="patient_an_registration_PreviousHistorofPIH"><div class="ew-table-header-caption"><?php echo $patient_an_registration->PreviousHistorofPIH->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PreviousHistorofPIH" class="<?php echo $patient_an_registration->PreviousHistorofPIH->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->PreviousHistorofPIH) ?>',1);"><div id="elh_patient_an_registration_PreviousHistorofPIH" class="patient_an_registration_PreviousHistorofPIH">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->PreviousHistorofPIH->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->PreviousHistorofPIH->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->PreviousHistorofPIH->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->PreviousHistoryofIUGR->Visible) { // PreviousHistoryofIUGR ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->PreviousHistoryofIUGR) == "") { ?>
		<th data-name="PreviousHistoryofIUGR" class="<?php echo $patient_an_registration->PreviousHistoryofIUGR->headerCellClass() ?>"><div id="elh_patient_an_registration_PreviousHistoryofIUGR" class="patient_an_registration_PreviousHistoryofIUGR"><div class="ew-table-header-caption"><?php echo $patient_an_registration->PreviousHistoryofIUGR->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PreviousHistoryofIUGR" class="<?php echo $patient_an_registration->PreviousHistoryofIUGR->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->PreviousHistoryofIUGR) ?>',1);"><div id="elh_patient_an_registration_PreviousHistoryofIUGR" class="patient_an_registration_PreviousHistoryofIUGR">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->PreviousHistoryofIUGR->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->PreviousHistoryofIUGR->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->PreviousHistoryofIUGR->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->PreviousHistoryofOligohydramnios->Visible) { // PreviousHistoryofOligohydramnios ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->PreviousHistoryofOligohydramnios) == "") { ?>
		<th data-name="PreviousHistoryofOligohydramnios" class="<?php echo $patient_an_registration->PreviousHistoryofOligohydramnios->headerCellClass() ?>"><div id="elh_patient_an_registration_PreviousHistoryofOligohydramnios" class="patient_an_registration_PreviousHistoryofOligohydramnios"><div class="ew-table-header-caption"><?php echo $patient_an_registration->PreviousHistoryofOligohydramnios->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PreviousHistoryofOligohydramnios" class="<?php echo $patient_an_registration->PreviousHistoryofOligohydramnios->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->PreviousHistoryofOligohydramnios) ?>',1);"><div id="elh_patient_an_registration_PreviousHistoryofOligohydramnios" class="patient_an_registration_PreviousHistoryofOligohydramnios">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->PreviousHistoryofOligohydramnios->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->PreviousHistoryofOligohydramnios->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->PreviousHistoryofOligohydramnios->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->PreviousHistoryofPreterm->Visible) { // PreviousHistoryofPreterm ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->PreviousHistoryofPreterm) == "") { ?>
		<th data-name="PreviousHistoryofPreterm" class="<?php echo $patient_an_registration->PreviousHistoryofPreterm->headerCellClass() ?>"><div id="elh_patient_an_registration_PreviousHistoryofPreterm" class="patient_an_registration_PreviousHistoryofPreterm"><div class="ew-table-header-caption"><?php echo $patient_an_registration->PreviousHistoryofPreterm->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PreviousHistoryofPreterm" class="<?php echo $patient_an_registration->PreviousHistoryofPreterm->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->PreviousHistoryofPreterm) ?>',1);"><div id="elh_patient_an_registration_PreviousHistoryofPreterm" class="patient_an_registration_PreviousHistoryofPreterm">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->PreviousHistoryofPreterm->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->PreviousHistoryofPreterm->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->PreviousHistoryofPreterm->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->G1->Visible) { // G1 ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->G1) == "") { ?>
		<th data-name="G1" class="<?php echo $patient_an_registration->G1->headerCellClass() ?>"><div id="elh_patient_an_registration_G1" class="patient_an_registration_G1"><div class="ew-table-header-caption"><?php echo $patient_an_registration->G1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="G1" class="<?php echo $patient_an_registration->G1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->G1) ?>',1);"><div id="elh_patient_an_registration_G1" class="patient_an_registration_G1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->G1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->G1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->G1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->G2->Visible) { // G2 ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->G2) == "") { ?>
		<th data-name="G2" class="<?php echo $patient_an_registration->G2->headerCellClass() ?>"><div id="elh_patient_an_registration_G2" class="patient_an_registration_G2"><div class="ew-table-header-caption"><?php echo $patient_an_registration->G2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="G2" class="<?php echo $patient_an_registration->G2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->G2) ?>',1);"><div id="elh_patient_an_registration_G2" class="patient_an_registration_G2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->G2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->G2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->G2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->G3->Visible) { // G3 ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->G3) == "") { ?>
		<th data-name="G3" class="<?php echo $patient_an_registration->G3->headerCellClass() ?>"><div id="elh_patient_an_registration_G3" class="patient_an_registration_G3"><div class="ew-table-header-caption"><?php echo $patient_an_registration->G3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="G3" class="<?php echo $patient_an_registration->G3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->G3) ?>',1);"><div id="elh_patient_an_registration_G3" class="patient_an_registration_G3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->G3->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->G3->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->G3->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->DeliveryNDLSCS1->Visible) { // DeliveryNDLSCS1 ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->DeliveryNDLSCS1) == "") { ?>
		<th data-name="DeliveryNDLSCS1" class="<?php echo $patient_an_registration->DeliveryNDLSCS1->headerCellClass() ?>"><div id="elh_patient_an_registration_DeliveryNDLSCS1" class="patient_an_registration_DeliveryNDLSCS1"><div class="ew-table-header-caption"><?php echo $patient_an_registration->DeliveryNDLSCS1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DeliveryNDLSCS1" class="<?php echo $patient_an_registration->DeliveryNDLSCS1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->DeliveryNDLSCS1) ?>',1);"><div id="elh_patient_an_registration_DeliveryNDLSCS1" class="patient_an_registration_DeliveryNDLSCS1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->DeliveryNDLSCS1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->DeliveryNDLSCS1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->DeliveryNDLSCS1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->DeliveryNDLSCS2->Visible) { // DeliveryNDLSCS2 ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->DeliveryNDLSCS2) == "") { ?>
		<th data-name="DeliveryNDLSCS2" class="<?php echo $patient_an_registration->DeliveryNDLSCS2->headerCellClass() ?>"><div id="elh_patient_an_registration_DeliveryNDLSCS2" class="patient_an_registration_DeliveryNDLSCS2"><div class="ew-table-header-caption"><?php echo $patient_an_registration->DeliveryNDLSCS2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DeliveryNDLSCS2" class="<?php echo $patient_an_registration->DeliveryNDLSCS2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->DeliveryNDLSCS2) ?>',1);"><div id="elh_patient_an_registration_DeliveryNDLSCS2" class="patient_an_registration_DeliveryNDLSCS2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->DeliveryNDLSCS2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->DeliveryNDLSCS2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->DeliveryNDLSCS2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->DeliveryNDLSCS3->Visible) { // DeliveryNDLSCS3 ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->DeliveryNDLSCS3) == "") { ?>
		<th data-name="DeliveryNDLSCS3" class="<?php echo $patient_an_registration->DeliveryNDLSCS3->headerCellClass() ?>"><div id="elh_patient_an_registration_DeliveryNDLSCS3" class="patient_an_registration_DeliveryNDLSCS3"><div class="ew-table-header-caption"><?php echo $patient_an_registration->DeliveryNDLSCS3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DeliveryNDLSCS3" class="<?php echo $patient_an_registration->DeliveryNDLSCS3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->DeliveryNDLSCS3) ?>',1);"><div id="elh_patient_an_registration_DeliveryNDLSCS3" class="patient_an_registration_DeliveryNDLSCS3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->DeliveryNDLSCS3->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->DeliveryNDLSCS3->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->DeliveryNDLSCS3->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->BabySexweight1->Visible) { // BabySexweight1 ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->BabySexweight1) == "") { ?>
		<th data-name="BabySexweight1" class="<?php echo $patient_an_registration->BabySexweight1->headerCellClass() ?>"><div id="elh_patient_an_registration_BabySexweight1" class="patient_an_registration_BabySexweight1"><div class="ew-table-header-caption"><?php echo $patient_an_registration->BabySexweight1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BabySexweight1" class="<?php echo $patient_an_registration->BabySexweight1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->BabySexweight1) ?>',1);"><div id="elh_patient_an_registration_BabySexweight1" class="patient_an_registration_BabySexweight1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->BabySexweight1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->BabySexweight1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->BabySexweight1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->BabySexweight2->Visible) { // BabySexweight2 ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->BabySexweight2) == "") { ?>
		<th data-name="BabySexweight2" class="<?php echo $patient_an_registration->BabySexweight2->headerCellClass() ?>"><div id="elh_patient_an_registration_BabySexweight2" class="patient_an_registration_BabySexweight2"><div class="ew-table-header-caption"><?php echo $patient_an_registration->BabySexweight2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BabySexweight2" class="<?php echo $patient_an_registration->BabySexweight2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->BabySexweight2) ?>',1);"><div id="elh_patient_an_registration_BabySexweight2" class="patient_an_registration_BabySexweight2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->BabySexweight2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->BabySexweight2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->BabySexweight2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->BabySexweight3->Visible) { // BabySexweight3 ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->BabySexweight3) == "") { ?>
		<th data-name="BabySexweight3" class="<?php echo $patient_an_registration->BabySexweight3->headerCellClass() ?>"><div id="elh_patient_an_registration_BabySexweight3" class="patient_an_registration_BabySexweight3"><div class="ew-table-header-caption"><?php echo $patient_an_registration->BabySexweight3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BabySexweight3" class="<?php echo $patient_an_registration->BabySexweight3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->BabySexweight3) ?>',1);"><div id="elh_patient_an_registration_BabySexweight3" class="patient_an_registration_BabySexweight3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->BabySexweight3->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->BabySexweight3->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->BabySexweight3->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->PastMedicalHistory->Visible) { // PastMedicalHistory ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->PastMedicalHistory) == "") { ?>
		<th data-name="PastMedicalHistory" class="<?php echo $patient_an_registration->PastMedicalHistory->headerCellClass() ?>"><div id="elh_patient_an_registration_PastMedicalHistory" class="patient_an_registration_PastMedicalHistory"><div class="ew-table-header-caption"><?php echo $patient_an_registration->PastMedicalHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PastMedicalHistory" class="<?php echo $patient_an_registration->PastMedicalHistory->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->PastMedicalHistory) ?>',1);"><div id="elh_patient_an_registration_PastMedicalHistory" class="patient_an_registration_PastMedicalHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->PastMedicalHistory->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->PastMedicalHistory->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->PastMedicalHistory->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->PastSurgicalHistory->Visible) { // PastSurgicalHistory ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->PastSurgicalHistory) == "") { ?>
		<th data-name="PastSurgicalHistory" class="<?php echo $patient_an_registration->PastSurgicalHistory->headerCellClass() ?>"><div id="elh_patient_an_registration_PastSurgicalHistory" class="patient_an_registration_PastSurgicalHistory"><div class="ew-table-header-caption"><?php echo $patient_an_registration->PastSurgicalHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PastSurgicalHistory" class="<?php echo $patient_an_registration->PastSurgicalHistory->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->PastSurgicalHistory) ?>',1);"><div id="elh_patient_an_registration_PastSurgicalHistory" class="patient_an_registration_PastSurgicalHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->PastSurgicalHistory->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->PastSurgicalHistory->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->PastSurgicalHistory->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->FamilyHistory->Visible) { // FamilyHistory ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->FamilyHistory) == "") { ?>
		<th data-name="FamilyHistory" class="<?php echo $patient_an_registration->FamilyHistory->headerCellClass() ?>"><div id="elh_patient_an_registration_FamilyHistory" class="patient_an_registration_FamilyHistory"><div class="ew-table-header-caption"><?php echo $patient_an_registration->FamilyHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FamilyHistory" class="<?php echo $patient_an_registration->FamilyHistory->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->FamilyHistory) ?>',1);"><div id="elh_patient_an_registration_FamilyHistory" class="patient_an_registration_FamilyHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->FamilyHistory->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->FamilyHistory->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->FamilyHistory->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Viability->Visible) { // Viability ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->Viability) == "") { ?>
		<th data-name="Viability" class="<?php echo $patient_an_registration->Viability->headerCellClass() ?>"><div id="elh_patient_an_registration_Viability" class="patient_an_registration_Viability"><div class="ew-table-header-caption"><?php echo $patient_an_registration->Viability->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Viability" class="<?php echo $patient_an_registration->Viability->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->Viability) ?>',1);"><div id="elh_patient_an_registration_Viability" class="patient_an_registration_Viability">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->Viability->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->Viability->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->Viability->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->ViabilityDATE->Visible) { // ViabilityDATE ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->ViabilityDATE) == "") { ?>
		<th data-name="ViabilityDATE" class="<?php echo $patient_an_registration->ViabilityDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_ViabilityDATE" class="patient_an_registration_ViabilityDATE"><div class="ew-table-header-caption"><?php echo $patient_an_registration->ViabilityDATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ViabilityDATE" class="<?php echo $patient_an_registration->ViabilityDATE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->ViabilityDATE) ?>',1);"><div id="elh_patient_an_registration_ViabilityDATE" class="patient_an_registration_ViabilityDATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->ViabilityDATE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->ViabilityDATE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->ViabilityDATE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->ViabilityREPORT->Visible) { // ViabilityREPORT ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->ViabilityREPORT) == "") { ?>
		<th data-name="ViabilityREPORT" class="<?php echo $patient_an_registration->ViabilityREPORT->headerCellClass() ?>"><div id="elh_patient_an_registration_ViabilityREPORT" class="patient_an_registration_ViabilityREPORT"><div class="ew-table-header-caption"><?php echo $patient_an_registration->ViabilityREPORT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ViabilityREPORT" class="<?php echo $patient_an_registration->ViabilityREPORT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->ViabilityREPORT) ?>',1);"><div id="elh_patient_an_registration_ViabilityREPORT" class="patient_an_registration_ViabilityREPORT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->ViabilityREPORT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->ViabilityREPORT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->ViabilityREPORT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Viability2->Visible) { // Viability2 ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->Viability2) == "") { ?>
		<th data-name="Viability2" class="<?php echo $patient_an_registration->Viability2->headerCellClass() ?>"><div id="elh_patient_an_registration_Viability2" class="patient_an_registration_Viability2"><div class="ew-table-header-caption"><?php echo $patient_an_registration->Viability2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Viability2" class="<?php echo $patient_an_registration->Viability2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->Viability2) ?>',1);"><div id="elh_patient_an_registration_Viability2" class="patient_an_registration_Viability2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->Viability2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->Viability2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->Viability2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Viability2DATE->Visible) { // Viability2DATE ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->Viability2DATE) == "") { ?>
		<th data-name="Viability2DATE" class="<?php echo $patient_an_registration->Viability2DATE->headerCellClass() ?>"><div id="elh_patient_an_registration_Viability2DATE" class="patient_an_registration_Viability2DATE"><div class="ew-table-header-caption"><?php echo $patient_an_registration->Viability2DATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Viability2DATE" class="<?php echo $patient_an_registration->Viability2DATE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->Viability2DATE) ?>',1);"><div id="elh_patient_an_registration_Viability2DATE" class="patient_an_registration_Viability2DATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->Viability2DATE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->Viability2DATE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->Viability2DATE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Viability2REPORT->Visible) { // Viability2REPORT ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->Viability2REPORT) == "") { ?>
		<th data-name="Viability2REPORT" class="<?php echo $patient_an_registration->Viability2REPORT->headerCellClass() ?>"><div id="elh_patient_an_registration_Viability2REPORT" class="patient_an_registration_Viability2REPORT"><div class="ew-table-header-caption"><?php echo $patient_an_registration->Viability2REPORT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Viability2REPORT" class="<?php echo $patient_an_registration->Viability2REPORT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->Viability2REPORT) ?>',1);"><div id="elh_patient_an_registration_Viability2REPORT" class="patient_an_registration_Viability2REPORT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->Viability2REPORT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->Viability2REPORT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->Viability2REPORT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->NTscan->Visible) { // NTscan ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->NTscan) == "") { ?>
		<th data-name="NTscan" class="<?php echo $patient_an_registration->NTscan->headerCellClass() ?>"><div id="elh_patient_an_registration_NTscan" class="patient_an_registration_NTscan"><div class="ew-table-header-caption"><?php echo $patient_an_registration->NTscan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NTscan" class="<?php echo $patient_an_registration->NTscan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->NTscan) ?>',1);"><div id="elh_patient_an_registration_NTscan" class="patient_an_registration_NTscan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->NTscan->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->NTscan->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->NTscan->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->NTscanDATE->Visible) { // NTscanDATE ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->NTscanDATE) == "") { ?>
		<th data-name="NTscanDATE" class="<?php echo $patient_an_registration->NTscanDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_NTscanDATE" class="patient_an_registration_NTscanDATE"><div class="ew-table-header-caption"><?php echo $patient_an_registration->NTscanDATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NTscanDATE" class="<?php echo $patient_an_registration->NTscanDATE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->NTscanDATE) ?>',1);"><div id="elh_patient_an_registration_NTscanDATE" class="patient_an_registration_NTscanDATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->NTscanDATE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->NTscanDATE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->NTscanDATE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->NTscanREPORT->Visible) { // NTscanREPORT ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->NTscanREPORT) == "") { ?>
		<th data-name="NTscanREPORT" class="<?php echo $patient_an_registration->NTscanREPORT->headerCellClass() ?>"><div id="elh_patient_an_registration_NTscanREPORT" class="patient_an_registration_NTscanREPORT"><div class="ew-table-header-caption"><?php echo $patient_an_registration->NTscanREPORT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NTscanREPORT" class="<?php echo $patient_an_registration->NTscanREPORT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->NTscanREPORT) ?>',1);"><div id="elh_patient_an_registration_NTscanREPORT" class="patient_an_registration_NTscanREPORT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->NTscanREPORT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->NTscanREPORT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->NTscanREPORT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->EarlyTarget->Visible) { // EarlyTarget ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->EarlyTarget) == "") { ?>
		<th data-name="EarlyTarget" class="<?php echo $patient_an_registration->EarlyTarget->headerCellClass() ?>"><div id="elh_patient_an_registration_EarlyTarget" class="patient_an_registration_EarlyTarget"><div class="ew-table-header-caption"><?php echo $patient_an_registration->EarlyTarget->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EarlyTarget" class="<?php echo $patient_an_registration->EarlyTarget->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->EarlyTarget) ?>',1);"><div id="elh_patient_an_registration_EarlyTarget" class="patient_an_registration_EarlyTarget">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->EarlyTarget->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->EarlyTarget->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->EarlyTarget->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->EarlyTargetDATE->Visible) { // EarlyTargetDATE ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->EarlyTargetDATE) == "") { ?>
		<th data-name="EarlyTargetDATE" class="<?php echo $patient_an_registration->EarlyTargetDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_EarlyTargetDATE" class="patient_an_registration_EarlyTargetDATE"><div class="ew-table-header-caption"><?php echo $patient_an_registration->EarlyTargetDATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EarlyTargetDATE" class="<?php echo $patient_an_registration->EarlyTargetDATE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->EarlyTargetDATE) ?>',1);"><div id="elh_patient_an_registration_EarlyTargetDATE" class="patient_an_registration_EarlyTargetDATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->EarlyTargetDATE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->EarlyTargetDATE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->EarlyTargetDATE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->EarlyTargetREPORT->Visible) { // EarlyTargetREPORT ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->EarlyTargetREPORT) == "") { ?>
		<th data-name="EarlyTargetREPORT" class="<?php echo $patient_an_registration->EarlyTargetREPORT->headerCellClass() ?>"><div id="elh_patient_an_registration_EarlyTargetREPORT" class="patient_an_registration_EarlyTargetREPORT"><div class="ew-table-header-caption"><?php echo $patient_an_registration->EarlyTargetREPORT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EarlyTargetREPORT" class="<?php echo $patient_an_registration->EarlyTargetREPORT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->EarlyTargetREPORT) ?>',1);"><div id="elh_patient_an_registration_EarlyTargetREPORT" class="patient_an_registration_EarlyTargetREPORT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->EarlyTargetREPORT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->EarlyTargetREPORT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->EarlyTargetREPORT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Anomaly->Visible) { // Anomaly ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->Anomaly) == "") { ?>
		<th data-name="Anomaly" class="<?php echo $patient_an_registration->Anomaly->headerCellClass() ?>"><div id="elh_patient_an_registration_Anomaly" class="patient_an_registration_Anomaly"><div class="ew-table-header-caption"><?php echo $patient_an_registration->Anomaly->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Anomaly" class="<?php echo $patient_an_registration->Anomaly->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->Anomaly) ?>',1);"><div id="elh_patient_an_registration_Anomaly" class="patient_an_registration_Anomaly">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->Anomaly->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->Anomaly->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->Anomaly->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->AnomalyDATE->Visible) { // AnomalyDATE ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->AnomalyDATE) == "") { ?>
		<th data-name="AnomalyDATE" class="<?php echo $patient_an_registration->AnomalyDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_AnomalyDATE" class="patient_an_registration_AnomalyDATE"><div class="ew-table-header-caption"><?php echo $patient_an_registration->AnomalyDATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AnomalyDATE" class="<?php echo $patient_an_registration->AnomalyDATE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->AnomalyDATE) ?>',1);"><div id="elh_patient_an_registration_AnomalyDATE" class="patient_an_registration_AnomalyDATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->AnomalyDATE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->AnomalyDATE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->AnomalyDATE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->AnomalyREPORT->Visible) { // AnomalyREPORT ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->AnomalyREPORT) == "") { ?>
		<th data-name="AnomalyREPORT" class="<?php echo $patient_an_registration->AnomalyREPORT->headerCellClass() ?>"><div id="elh_patient_an_registration_AnomalyREPORT" class="patient_an_registration_AnomalyREPORT"><div class="ew-table-header-caption"><?php echo $patient_an_registration->AnomalyREPORT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AnomalyREPORT" class="<?php echo $patient_an_registration->AnomalyREPORT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->AnomalyREPORT) ?>',1);"><div id="elh_patient_an_registration_AnomalyREPORT" class="patient_an_registration_AnomalyREPORT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->AnomalyREPORT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->AnomalyREPORT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->AnomalyREPORT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Growth->Visible) { // Growth ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->Growth) == "") { ?>
		<th data-name="Growth" class="<?php echo $patient_an_registration->Growth->headerCellClass() ?>"><div id="elh_patient_an_registration_Growth" class="patient_an_registration_Growth"><div class="ew-table-header-caption"><?php echo $patient_an_registration->Growth->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Growth" class="<?php echo $patient_an_registration->Growth->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->Growth) ?>',1);"><div id="elh_patient_an_registration_Growth" class="patient_an_registration_Growth">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->Growth->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->Growth->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->Growth->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->GrowthDATE->Visible) { // GrowthDATE ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->GrowthDATE) == "") { ?>
		<th data-name="GrowthDATE" class="<?php echo $patient_an_registration->GrowthDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_GrowthDATE" class="patient_an_registration_GrowthDATE"><div class="ew-table-header-caption"><?php echo $patient_an_registration->GrowthDATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GrowthDATE" class="<?php echo $patient_an_registration->GrowthDATE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->GrowthDATE) ?>',1);"><div id="elh_patient_an_registration_GrowthDATE" class="patient_an_registration_GrowthDATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->GrowthDATE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->GrowthDATE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->GrowthDATE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->GrowthREPORT->Visible) { // GrowthREPORT ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->GrowthREPORT) == "") { ?>
		<th data-name="GrowthREPORT" class="<?php echo $patient_an_registration->GrowthREPORT->headerCellClass() ?>"><div id="elh_patient_an_registration_GrowthREPORT" class="patient_an_registration_GrowthREPORT"><div class="ew-table-header-caption"><?php echo $patient_an_registration->GrowthREPORT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GrowthREPORT" class="<?php echo $patient_an_registration->GrowthREPORT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->GrowthREPORT) ?>',1);"><div id="elh_patient_an_registration_GrowthREPORT" class="patient_an_registration_GrowthREPORT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->GrowthREPORT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->GrowthREPORT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->GrowthREPORT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Growth1->Visible) { // Growth1 ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->Growth1) == "") { ?>
		<th data-name="Growth1" class="<?php echo $patient_an_registration->Growth1->headerCellClass() ?>"><div id="elh_patient_an_registration_Growth1" class="patient_an_registration_Growth1"><div class="ew-table-header-caption"><?php echo $patient_an_registration->Growth1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Growth1" class="<?php echo $patient_an_registration->Growth1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->Growth1) ?>',1);"><div id="elh_patient_an_registration_Growth1" class="patient_an_registration_Growth1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->Growth1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->Growth1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->Growth1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Growth1DATE->Visible) { // Growth1DATE ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->Growth1DATE) == "") { ?>
		<th data-name="Growth1DATE" class="<?php echo $patient_an_registration->Growth1DATE->headerCellClass() ?>"><div id="elh_patient_an_registration_Growth1DATE" class="patient_an_registration_Growth1DATE"><div class="ew-table-header-caption"><?php echo $patient_an_registration->Growth1DATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Growth1DATE" class="<?php echo $patient_an_registration->Growth1DATE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->Growth1DATE) ?>',1);"><div id="elh_patient_an_registration_Growth1DATE" class="patient_an_registration_Growth1DATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->Growth1DATE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->Growth1DATE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->Growth1DATE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Growth1REPORT->Visible) { // Growth1REPORT ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->Growth1REPORT) == "") { ?>
		<th data-name="Growth1REPORT" class="<?php echo $patient_an_registration->Growth1REPORT->headerCellClass() ?>"><div id="elh_patient_an_registration_Growth1REPORT" class="patient_an_registration_Growth1REPORT"><div class="ew-table-header-caption"><?php echo $patient_an_registration->Growth1REPORT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Growth1REPORT" class="<?php echo $patient_an_registration->Growth1REPORT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->Growth1REPORT) ?>',1);"><div id="elh_patient_an_registration_Growth1REPORT" class="patient_an_registration_Growth1REPORT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->Growth1REPORT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->Growth1REPORT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->Growth1REPORT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->ANProfile->Visible) { // ANProfile ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->ANProfile) == "") { ?>
		<th data-name="ANProfile" class="<?php echo $patient_an_registration->ANProfile->headerCellClass() ?>"><div id="elh_patient_an_registration_ANProfile" class="patient_an_registration_ANProfile"><div class="ew-table-header-caption"><?php echo $patient_an_registration->ANProfile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ANProfile" class="<?php echo $patient_an_registration->ANProfile->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->ANProfile) ?>',1);"><div id="elh_patient_an_registration_ANProfile" class="patient_an_registration_ANProfile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->ANProfile->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->ANProfile->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->ANProfile->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->ANProfileDATE->Visible) { // ANProfileDATE ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->ANProfileDATE) == "") { ?>
		<th data-name="ANProfileDATE" class="<?php echo $patient_an_registration->ANProfileDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_ANProfileDATE" class="patient_an_registration_ANProfileDATE"><div class="ew-table-header-caption"><?php echo $patient_an_registration->ANProfileDATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ANProfileDATE" class="<?php echo $patient_an_registration->ANProfileDATE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->ANProfileDATE) ?>',1);"><div id="elh_patient_an_registration_ANProfileDATE" class="patient_an_registration_ANProfileDATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->ANProfileDATE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->ANProfileDATE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->ANProfileDATE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->ANProfileINHOUSE->Visible) { // ANProfileINHOUSE ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->ANProfileINHOUSE) == "") { ?>
		<th data-name="ANProfileINHOUSE" class="<?php echo $patient_an_registration->ANProfileINHOUSE->headerCellClass() ?>"><div id="elh_patient_an_registration_ANProfileINHOUSE" class="patient_an_registration_ANProfileINHOUSE"><div class="ew-table-header-caption"><?php echo $patient_an_registration->ANProfileINHOUSE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ANProfileINHOUSE" class="<?php echo $patient_an_registration->ANProfileINHOUSE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->ANProfileINHOUSE) ?>',1);"><div id="elh_patient_an_registration_ANProfileINHOUSE" class="patient_an_registration_ANProfileINHOUSE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->ANProfileINHOUSE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->ANProfileINHOUSE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->ANProfileINHOUSE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->ANProfileREPORT->Visible) { // ANProfileREPORT ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->ANProfileREPORT) == "") { ?>
		<th data-name="ANProfileREPORT" class="<?php echo $patient_an_registration->ANProfileREPORT->headerCellClass() ?>"><div id="elh_patient_an_registration_ANProfileREPORT" class="patient_an_registration_ANProfileREPORT"><div class="ew-table-header-caption"><?php echo $patient_an_registration->ANProfileREPORT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ANProfileREPORT" class="<?php echo $patient_an_registration->ANProfileREPORT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->ANProfileREPORT) ?>',1);"><div id="elh_patient_an_registration_ANProfileREPORT" class="patient_an_registration_ANProfileREPORT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->ANProfileREPORT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->ANProfileREPORT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->ANProfileREPORT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->DualMarker->Visible) { // DualMarker ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->DualMarker) == "") { ?>
		<th data-name="DualMarker" class="<?php echo $patient_an_registration->DualMarker->headerCellClass() ?>"><div id="elh_patient_an_registration_DualMarker" class="patient_an_registration_DualMarker"><div class="ew-table-header-caption"><?php echo $patient_an_registration->DualMarker->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DualMarker" class="<?php echo $patient_an_registration->DualMarker->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->DualMarker) ?>',1);"><div id="elh_patient_an_registration_DualMarker" class="patient_an_registration_DualMarker">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->DualMarker->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->DualMarker->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->DualMarker->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->DualMarkerDATE->Visible) { // DualMarkerDATE ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->DualMarkerDATE) == "") { ?>
		<th data-name="DualMarkerDATE" class="<?php echo $patient_an_registration->DualMarkerDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_DualMarkerDATE" class="patient_an_registration_DualMarkerDATE"><div class="ew-table-header-caption"><?php echo $patient_an_registration->DualMarkerDATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DualMarkerDATE" class="<?php echo $patient_an_registration->DualMarkerDATE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->DualMarkerDATE) ?>',1);"><div id="elh_patient_an_registration_DualMarkerDATE" class="patient_an_registration_DualMarkerDATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->DualMarkerDATE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->DualMarkerDATE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->DualMarkerDATE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->DualMarkerINHOUSE->Visible) { // DualMarkerINHOUSE ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->DualMarkerINHOUSE) == "") { ?>
		<th data-name="DualMarkerINHOUSE" class="<?php echo $patient_an_registration->DualMarkerINHOUSE->headerCellClass() ?>"><div id="elh_patient_an_registration_DualMarkerINHOUSE" class="patient_an_registration_DualMarkerINHOUSE"><div class="ew-table-header-caption"><?php echo $patient_an_registration->DualMarkerINHOUSE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DualMarkerINHOUSE" class="<?php echo $patient_an_registration->DualMarkerINHOUSE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->DualMarkerINHOUSE) ?>',1);"><div id="elh_patient_an_registration_DualMarkerINHOUSE" class="patient_an_registration_DualMarkerINHOUSE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->DualMarkerINHOUSE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->DualMarkerINHOUSE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->DualMarkerINHOUSE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->DualMarkerREPORT->Visible) { // DualMarkerREPORT ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->DualMarkerREPORT) == "") { ?>
		<th data-name="DualMarkerREPORT" class="<?php echo $patient_an_registration->DualMarkerREPORT->headerCellClass() ?>"><div id="elh_patient_an_registration_DualMarkerREPORT" class="patient_an_registration_DualMarkerREPORT"><div class="ew-table-header-caption"><?php echo $patient_an_registration->DualMarkerREPORT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DualMarkerREPORT" class="<?php echo $patient_an_registration->DualMarkerREPORT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->DualMarkerREPORT) ?>',1);"><div id="elh_patient_an_registration_DualMarkerREPORT" class="patient_an_registration_DualMarkerREPORT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->DualMarkerREPORT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->DualMarkerREPORT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->DualMarkerREPORT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Quadruple->Visible) { // Quadruple ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->Quadruple) == "") { ?>
		<th data-name="Quadruple" class="<?php echo $patient_an_registration->Quadruple->headerCellClass() ?>"><div id="elh_patient_an_registration_Quadruple" class="patient_an_registration_Quadruple"><div class="ew-table-header-caption"><?php echo $patient_an_registration->Quadruple->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Quadruple" class="<?php echo $patient_an_registration->Quadruple->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->Quadruple) ?>',1);"><div id="elh_patient_an_registration_Quadruple" class="patient_an_registration_Quadruple">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->Quadruple->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->Quadruple->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->Quadruple->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->QuadrupleDATE->Visible) { // QuadrupleDATE ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->QuadrupleDATE) == "") { ?>
		<th data-name="QuadrupleDATE" class="<?php echo $patient_an_registration->QuadrupleDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_QuadrupleDATE" class="patient_an_registration_QuadrupleDATE"><div class="ew-table-header-caption"><?php echo $patient_an_registration->QuadrupleDATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="QuadrupleDATE" class="<?php echo $patient_an_registration->QuadrupleDATE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->QuadrupleDATE) ?>',1);"><div id="elh_patient_an_registration_QuadrupleDATE" class="patient_an_registration_QuadrupleDATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->QuadrupleDATE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->QuadrupleDATE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->QuadrupleDATE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->QuadrupleINHOUSE->Visible) { // QuadrupleINHOUSE ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->QuadrupleINHOUSE) == "") { ?>
		<th data-name="QuadrupleINHOUSE" class="<?php echo $patient_an_registration->QuadrupleINHOUSE->headerCellClass() ?>"><div id="elh_patient_an_registration_QuadrupleINHOUSE" class="patient_an_registration_QuadrupleINHOUSE"><div class="ew-table-header-caption"><?php echo $patient_an_registration->QuadrupleINHOUSE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="QuadrupleINHOUSE" class="<?php echo $patient_an_registration->QuadrupleINHOUSE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->QuadrupleINHOUSE) ?>',1);"><div id="elh_patient_an_registration_QuadrupleINHOUSE" class="patient_an_registration_QuadrupleINHOUSE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->QuadrupleINHOUSE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->QuadrupleINHOUSE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->QuadrupleINHOUSE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->QuadrupleREPORT->Visible) { // QuadrupleREPORT ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->QuadrupleREPORT) == "") { ?>
		<th data-name="QuadrupleREPORT" class="<?php echo $patient_an_registration->QuadrupleREPORT->headerCellClass() ?>"><div id="elh_patient_an_registration_QuadrupleREPORT" class="patient_an_registration_QuadrupleREPORT"><div class="ew-table-header-caption"><?php echo $patient_an_registration->QuadrupleREPORT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="QuadrupleREPORT" class="<?php echo $patient_an_registration->QuadrupleREPORT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->QuadrupleREPORT) ?>',1);"><div id="elh_patient_an_registration_QuadrupleREPORT" class="patient_an_registration_QuadrupleREPORT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->QuadrupleREPORT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->QuadrupleREPORT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->QuadrupleREPORT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->A5month->Visible) { // A5month ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->A5month) == "") { ?>
		<th data-name="A5month" class="<?php echo $patient_an_registration->A5month->headerCellClass() ?>"><div id="elh_patient_an_registration_A5month" class="patient_an_registration_A5month"><div class="ew-table-header-caption"><?php echo $patient_an_registration->A5month->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="A5month" class="<?php echo $patient_an_registration->A5month->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->A5month) ?>',1);"><div id="elh_patient_an_registration_A5month" class="patient_an_registration_A5month">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->A5month->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->A5month->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->A5month->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->A5monthDATE->Visible) { // A5monthDATE ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->A5monthDATE) == "") { ?>
		<th data-name="A5monthDATE" class="<?php echo $patient_an_registration->A5monthDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_A5monthDATE" class="patient_an_registration_A5monthDATE"><div class="ew-table-header-caption"><?php echo $patient_an_registration->A5monthDATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="A5monthDATE" class="<?php echo $patient_an_registration->A5monthDATE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->A5monthDATE) ?>',1);"><div id="elh_patient_an_registration_A5monthDATE" class="patient_an_registration_A5monthDATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->A5monthDATE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->A5monthDATE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->A5monthDATE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->A5monthINHOUSE->Visible) { // A5monthINHOUSE ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->A5monthINHOUSE) == "") { ?>
		<th data-name="A5monthINHOUSE" class="<?php echo $patient_an_registration->A5monthINHOUSE->headerCellClass() ?>"><div id="elh_patient_an_registration_A5monthINHOUSE" class="patient_an_registration_A5monthINHOUSE"><div class="ew-table-header-caption"><?php echo $patient_an_registration->A5monthINHOUSE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="A5monthINHOUSE" class="<?php echo $patient_an_registration->A5monthINHOUSE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->A5monthINHOUSE) ?>',1);"><div id="elh_patient_an_registration_A5monthINHOUSE" class="patient_an_registration_A5monthINHOUSE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->A5monthINHOUSE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->A5monthINHOUSE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->A5monthINHOUSE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->A5monthREPORT->Visible) { // A5monthREPORT ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->A5monthREPORT) == "") { ?>
		<th data-name="A5monthREPORT" class="<?php echo $patient_an_registration->A5monthREPORT->headerCellClass() ?>"><div id="elh_patient_an_registration_A5monthREPORT" class="patient_an_registration_A5monthREPORT"><div class="ew-table-header-caption"><?php echo $patient_an_registration->A5monthREPORT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="A5monthREPORT" class="<?php echo $patient_an_registration->A5monthREPORT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->A5monthREPORT) ?>',1);"><div id="elh_patient_an_registration_A5monthREPORT" class="patient_an_registration_A5monthREPORT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->A5monthREPORT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->A5monthREPORT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->A5monthREPORT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->A7month->Visible) { // A7month ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->A7month) == "") { ?>
		<th data-name="A7month" class="<?php echo $patient_an_registration->A7month->headerCellClass() ?>"><div id="elh_patient_an_registration_A7month" class="patient_an_registration_A7month"><div class="ew-table-header-caption"><?php echo $patient_an_registration->A7month->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="A7month" class="<?php echo $patient_an_registration->A7month->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->A7month) ?>',1);"><div id="elh_patient_an_registration_A7month" class="patient_an_registration_A7month">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->A7month->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->A7month->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->A7month->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->A7monthDATE->Visible) { // A7monthDATE ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->A7monthDATE) == "") { ?>
		<th data-name="A7monthDATE" class="<?php echo $patient_an_registration->A7monthDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_A7monthDATE" class="patient_an_registration_A7monthDATE"><div class="ew-table-header-caption"><?php echo $patient_an_registration->A7monthDATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="A7monthDATE" class="<?php echo $patient_an_registration->A7monthDATE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->A7monthDATE) ?>',1);"><div id="elh_patient_an_registration_A7monthDATE" class="patient_an_registration_A7monthDATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->A7monthDATE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->A7monthDATE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->A7monthDATE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->A7monthINHOUSE->Visible) { // A7monthINHOUSE ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->A7monthINHOUSE) == "") { ?>
		<th data-name="A7monthINHOUSE" class="<?php echo $patient_an_registration->A7monthINHOUSE->headerCellClass() ?>"><div id="elh_patient_an_registration_A7monthINHOUSE" class="patient_an_registration_A7monthINHOUSE"><div class="ew-table-header-caption"><?php echo $patient_an_registration->A7monthINHOUSE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="A7monthINHOUSE" class="<?php echo $patient_an_registration->A7monthINHOUSE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->A7monthINHOUSE) ?>',1);"><div id="elh_patient_an_registration_A7monthINHOUSE" class="patient_an_registration_A7monthINHOUSE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->A7monthINHOUSE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->A7monthINHOUSE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->A7monthINHOUSE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->A7monthREPORT->Visible) { // A7monthREPORT ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->A7monthREPORT) == "") { ?>
		<th data-name="A7monthREPORT" class="<?php echo $patient_an_registration->A7monthREPORT->headerCellClass() ?>"><div id="elh_patient_an_registration_A7monthREPORT" class="patient_an_registration_A7monthREPORT"><div class="ew-table-header-caption"><?php echo $patient_an_registration->A7monthREPORT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="A7monthREPORT" class="<?php echo $patient_an_registration->A7monthREPORT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->A7monthREPORT) ?>',1);"><div id="elh_patient_an_registration_A7monthREPORT" class="patient_an_registration_A7monthREPORT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->A7monthREPORT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->A7monthREPORT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->A7monthREPORT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->A9month->Visible) { // A9month ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->A9month) == "") { ?>
		<th data-name="A9month" class="<?php echo $patient_an_registration->A9month->headerCellClass() ?>"><div id="elh_patient_an_registration_A9month" class="patient_an_registration_A9month"><div class="ew-table-header-caption"><?php echo $patient_an_registration->A9month->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="A9month" class="<?php echo $patient_an_registration->A9month->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->A9month) ?>',1);"><div id="elh_patient_an_registration_A9month" class="patient_an_registration_A9month">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->A9month->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->A9month->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->A9month->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->A9monthDATE->Visible) { // A9monthDATE ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->A9monthDATE) == "") { ?>
		<th data-name="A9monthDATE" class="<?php echo $patient_an_registration->A9monthDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_A9monthDATE" class="patient_an_registration_A9monthDATE"><div class="ew-table-header-caption"><?php echo $patient_an_registration->A9monthDATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="A9monthDATE" class="<?php echo $patient_an_registration->A9monthDATE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->A9monthDATE) ?>',1);"><div id="elh_patient_an_registration_A9monthDATE" class="patient_an_registration_A9monthDATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->A9monthDATE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->A9monthDATE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->A9monthDATE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->A9monthINHOUSE->Visible) { // A9monthINHOUSE ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->A9monthINHOUSE) == "") { ?>
		<th data-name="A9monthINHOUSE" class="<?php echo $patient_an_registration->A9monthINHOUSE->headerCellClass() ?>"><div id="elh_patient_an_registration_A9monthINHOUSE" class="patient_an_registration_A9monthINHOUSE"><div class="ew-table-header-caption"><?php echo $patient_an_registration->A9monthINHOUSE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="A9monthINHOUSE" class="<?php echo $patient_an_registration->A9monthINHOUSE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->A9monthINHOUSE) ?>',1);"><div id="elh_patient_an_registration_A9monthINHOUSE" class="patient_an_registration_A9monthINHOUSE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->A9monthINHOUSE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->A9monthINHOUSE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->A9monthINHOUSE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->A9monthREPORT->Visible) { // A9monthREPORT ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->A9monthREPORT) == "") { ?>
		<th data-name="A9monthREPORT" class="<?php echo $patient_an_registration->A9monthREPORT->headerCellClass() ?>"><div id="elh_patient_an_registration_A9monthREPORT" class="patient_an_registration_A9monthREPORT"><div class="ew-table-header-caption"><?php echo $patient_an_registration->A9monthREPORT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="A9monthREPORT" class="<?php echo $patient_an_registration->A9monthREPORT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->A9monthREPORT) ?>',1);"><div id="elh_patient_an_registration_A9monthREPORT" class="patient_an_registration_A9monthREPORT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->A9monthREPORT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->A9monthREPORT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->A9monthREPORT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->INJ->Visible) { // INJ ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->INJ) == "") { ?>
		<th data-name="INJ" class="<?php echo $patient_an_registration->INJ->headerCellClass() ?>"><div id="elh_patient_an_registration_INJ" class="patient_an_registration_INJ"><div class="ew-table-header-caption"><?php echo $patient_an_registration->INJ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="INJ" class="<?php echo $patient_an_registration->INJ->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->INJ) ?>',1);"><div id="elh_patient_an_registration_INJ" class="patient_an_registration_INJ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->INJ->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->INJ->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->INJ->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->INJDATE->Visible) { // INJDATE ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->INJDATE) == "") { ?>
		<th data-name="INJDATE" class="<?php echo $patient_an_registration->INJDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_INJDATE" class="patient_an_registration_INJDATE"><div class="ew-table-header-caption"><?php echo $patient_an_registration->INJDATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="INJDATE" class="<?php echo $patient_an_registration->INJDATE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->INJDATE) ?>',1);"><div id="elh_patient_an_registration_INJDATE" class="patient_an_registration_INJDATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->INJDATE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->INJDATE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->INJDATE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->INJINHOUSE->Visible) { // INJINHOUSE ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->INJINHOUSE) == "") { ?>
		<th data-name="INJINHOUSE" class="<?php echo $patient_an_registration->INJINHOUSE->headerCellClass() ?>"><div id="elh_patient_an_registration_INJINHOUSE" class="patient_an_registration_INJINHOUSE"><div class="ew-table-header-caption"><?php echo $patient_an_registration->INJINHOUSE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="INJINHOUSE" class="<?php echo $patient_an_registration->INJINHOUSE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->INJINHOUSE) ?>',1);"><div id="elh_patient_an_registration_INJINHOUSE" class="patient_an_registration_INJINHOUSE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->INJINHOUSE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->INJINHOUSE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->INJINHOUSE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->INJREPORT->Visible) { // INJREPORT ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->INJREPORT) == "") { ?>
		<th data-name="INJREPORT" class="<?php echo $patient_an_registration->INJREPORT->headerCellClass() ?>"><div id="elh_patient_an_registration_INJREPORT" class="patient_an_registration_INJREPORT"><div class="ew-table-header-caption"><?php echo $patient_an_registration->INJREPORT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="INJREPORT" class="<?php echo $patient_an_registration->INJREPORT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->INJREPORT) ?>',1);"><div id="elh_patient_an_registration_INJREPORT" class="patient_an_registration_INJREPORT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->INJREPORT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->INJREPORT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->INJREPORT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Bleeding->Visible) { // Bleeding ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->Bleeding) == "") { ?>
		<th data-name="Bleeding" class="<?php echo $patient_an_registration->Bleeding->headerCellClass() ?>"><div id="elh_patient_an_registration_Bleeding" class="patient_an_registration_Bleeding"><div class="ew-table-header-caption"><?php echo $patient_an_registration->Bleeding->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Bleeding" class="<?php echo $patient_an_registration->Bleeding->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->Bleeding) ?>',1);"><div id="elh_patient_an_registration_Bleeding" class="patient_an_registration_Bleeding">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->Bleeding->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->Bleeding->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->Bleeding->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Hypothyroidism->Visible) { // Hypothyroidism ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->Hypothyroidism) == "") { ?>
		<th data-name="Hypothyroidism" class="<?php echo $patient_an_registration->Hypothyroidism->headerCellClass() ?>"><div id="elh_patient_an_registration_Hypothyroidism" class="patient_an_registration_Hypothyroidism"><div class="ew-table-header-caption"><?php echo $patient_an_registration->Hypothyroidism->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Hypothyroidism" class="<?php echo $patient_an_registration->Hypothyroidism->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->Hypothyroidism) ?>',1);"><div id="elh_patient_an_registration_Hypothyroidism" class="patient_an_registration_Hypothyroidism">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->Hypothyroidism->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->Hypothyroidism->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->Hypothyroidism->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->PICMENumber->Visible) { // PICMENumber ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->PICMENumber) == "") { ?>
		<th data-name="PICMENumber" class="<?php echo $patient_an_registration->PICMENumber->headerCellClass() ?>"><div id="elh_patient_an_registration_PICMENumber" class="patient_an_registration_PICMENumber"><div class="ew-table-header-caption"><?php echo $patient_an_registration->PICMENumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PICMENumber" class="<?php echo $patient_an_registration->PICMENumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->PICMENumber) ?>',1);"><div id="elh_patient_an_registration_PICMENumber" class="patient_an_registration_PICMENumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->PICMENumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->PICMENumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->PICMENumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Outcome->Visible) { // Outcome ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->Outcome) == "") { ?>
		<th data-name="Outcome" class="<?php echo $patient_an_registration->Outcome->headerCellClass() ?>"><div id="elh_patient_an_registration_Outcome" class="patient_an_registration_Outcome"><div class="ew-table-header-caption"><?php echo $patient_an_registration->Outcome->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Outcome" class="<?php echo $patient_an_registration->Outcome->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->Outcome) ?>',1);"><div id="elh_patient_an_registration_Outcome" class="patient_an_registration_Outcome">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->Outcome->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->Outcome->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->Outcome->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->DateofAdmission->Visible) { // DateofAdmission ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->DateofAdmission) == "") { ?>
		<th data-name="DateofAdmission" class="<?php echo $patient_an_registration->DateofAdmission->headerCellClass() ?>"><div id="elh_patient_an_registration_DateofAdmission" class="patient_an_registration_DateofAdmission"><div class="ew-table-header-caption"><?php echo $patient_an_registration->DateofAdmission->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DateofAdmission" class="<?php echo $patient_an_registration->DateofAdmission->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->DateofAdmission) ?>',1);"><div id="elh_patient_an_registration_DateofAdmission" class="patient_an_registration_DateofAdmission">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->DateofAdmission->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->DateofAdmission->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->DateofAdmission->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->DateodProcedure->Visible) { // DateodProcedure ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->DateodProcedure) == "") { ?>
		<th data-name="DateodProcedure" class="<?php echo $patient_an_registration->DateodProcedure->headerCellClass() ?>"><div id="elh_patient_an_registration_DateodProcedure" class="patient_an_registration_DateodProcedure"><div class="ew-table-header-caption"><?php echo $patient_an_registration->DateodProcedure->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DateodProcedure" class="<?php echo $patient_an_registration->DateodProcedure->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->DateodProcedure) ?>',1);"><div id="elh_patient_an_registration_DateodProcedure" class="patient_an_registration_DateodProcedure">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->DateodProcedure->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->DateodProcedure->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->DateodProcedure->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Miscarriage->Visible) { // Miscarriage ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->Miscarriage) == "") { ?>
		<th data-name="Miscarriage" class="<?php echo $patient_an_registration->Miscarriage->headerCellClass() ?>"><div id="elh_patient_an_registration_Miscarriage" class="patient_an_registration_Miscarriage"><div class="ew-table-header-caption"><?php echo $patient_an_registration->Miscarriage->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Miscarriage" class="<?php echo $patient_an_registration->Miscarriage->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->Miscarriage) ?>',1);"><div id="elh_patient_an_registration_Miscarriage" class="patient_an_registration_Miscarriage">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->Miscarriage->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->Miscarriage->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->Miscarriage->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->ModeOfDelivery->Visible) { // ModeOfDelivery ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->ModeOfDelivery) == "") { ?>
		<th data-name="ModeOfDelivery" class="<?php echo $patient_an_registration->ModeOfDelivery->headerCellClass() ?>"><div id="elh_patient_an_registration_ModeOfDelivery" class="patient_an_registration_ModeOfDelivery"><div class="ew-table-header-caption"><?php echo $patient_an_registration->ModeOfDelivery->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModeOfDelivery" class="<?php echo $patient_an_registration->ModeOfDelivery->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->ModeOfDelivery) ?>',1);"><div id="elh_patient_an_registration_ModeOfDelivery" class="patient_an_registration_ModeOfDelivery">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->ModeOfDelivery->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->ModeOfDelivery->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->ModeOfDelivery->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->ND->Visible) { // ND ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->ND) == "") { ?>
		<th data-name="ND" class="<?php echo $patient_an_registration->ND->headerCellClass() ?>"><div id="elh_patient_an_registration_ND" class="patient_an_registration_ND"><div class="ew-table-header-caption"><?php echo $patient_an_registration->ND->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ND" class="<?php echo $patient_an_registration->ND->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->ND) ?>',1);"><div id="elh_patient_an_registration_ND" class="patient_an_registration_ND">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->ND->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->ND->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->ND->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->NDS->Visible) { // NDS ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->NDS) == "") { ?>
		<th data-name="NDS" class="<?php echo $patient_an_registration->NDS->headerCellClass() ?>"><div id="elh_patient_an_registration_NDS" class="patient_an_registration_NDS"><div class="ew-table-header-caption"><?php echo $patient_an_registration->NDS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NDS" class="<?php echo $patient_an_registration->NDS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->NDS) ?>',1);"><div id="elh_patient_an_registration_NDS" class="patient_an_registration_NDS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->NDS->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->NDS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->NDS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->NDP->Visible) { // NDP ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->NDP) == "") { ?>
		<th data-name="NDP" class="<?php echo $patient_an_registration->NDP->headerCellClass() ?>"><div id="elh_patient_an_registration_NDP" class="patient_an_registration_NDP"><div class="ew-table-header-caption"><?php echo $patient_an_registration->NDP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NDP" class="<?php echo $patient_an_registration->NDP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->NDP) ?>',1);"><div id="elh_patient_an_registration_NDP" class="patient_an_registration_NDP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->NDP->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->NDP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->NDP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Vaccum->Visible) { // Vaccum ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->Vaccum) == "") { ?>
		<th data-name="Vaccum" class="<?php echo $patient_an_registration->Vaccum->headerCellClass() ?>"><div id="elh_patient_an_registration_Vaccum" class="patient_an_registration_Vaccum"><div class="ew-table-header-caption"><?php echo $patient_an_registration->Vaccum->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Vaccum" class="<?php echo $patient_an_registration->Vaccum->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->Vaccum) ?>',1);"><div id="elh_patient_an_registration_Vaccum" class="patient_an_registration_Vaccum">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->Vaccum->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->Vaccum->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->Vaccum->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->VaccumS->Visible) { // VaccumS ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->VaccumS) == "") { ?>
		<th data-name="VaccumS" class="<?php echo $patient_an_registration->VaccumS->headerCellClass() ?>"><div id="elh_patient_an_registration_VaccumS" class="patient_an_registration_VaccumS"><div class="ew-table-header-caption"><?php echo $patient_an_registration->VaccumS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="VaccumS" class="<?php echo $patient_an_registration->VaccumS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->VaccumS) ?>',1);"><div id="elh_patient_an_registration_VaccumS" class="patient_an_registration_VaccumS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->VaccumS->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->VaccumS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->VaccumS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->VaccumP->Visible) { // VaccumP ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->VaccumP) == "") { ?>
		<th data-name="VaccumP" class="<?php echo $patient_an_registration->VaccumP->headerCellClass() ?>"><div id="elh_patient_an_registration_VaccumP" class="patient_an_registration_VaccumP"><div class="ew-table-header-caption"><?php echo $patient_an_registration->VaccumP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="VaccumP" class="<?php echo $patient_an_registration->VaccumP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->VaccumP) ?>',1);"><div id="elh_patient_an_registration_VaccumP" class="patient_an_registration_VaccumP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->VaccumP->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->VaccumP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->VaccumP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Forceps->Visible) { // Forceps ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->Forceps) == "") { ?>
		<th data-name="Forceps" class="<?php echo $patient_an_registration->Forceps->headerCellClass() ?>"><div id="elh_patient_an_registration_Forceps" class="patient_an_registration_Forceps"><div class="ew-table-header-caption"><?php echo $patient_an_registration->Forceps->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Forceps" class="<?php echo $patient_an_registration->Forceps->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->Forceps) ?>',1);"><div id="elh_patient_an_registration_Forceps" class="patient_an_registration_Forceps">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->Forceps->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->Forceps->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->Forceps->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->ForcepsS->Visible) { // ForcepsS ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->ForcepsS) == "") { ?>
		<th data-name="ForcepsS" class="<?php echo $patient_an_registration->ForcepsS->headerCellClass() ?>"><div id="elh_patient_an_registration_ForcepsS" class="patient_an_registration_ForcepsS"><div class="ew-table-header-caption"><?php echo $patient_an_registration->ForcepsS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ForcepsS" class="<?php echo $patient_an_registration->ForcepsS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->ForcepsS) ?>',1);"><div id="elh_patient_an_registration_ForcepsS" class="patient_an_registration_ForcepsS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->ForcepsS->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->ForcepsS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->ForcepsS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->ForcepsP->Visible) { // ForcepsP ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->ForcepsP) == "") { ?>
		<th data-name="ForcepsP" class="<?php echo $patient_an_registration->ForcepsP->headerCellClass() ?>"><div id="elh_patient_an_registration_ForcepsP" class="patient_an_registration_ForcepsP"><div class="ew-table-header-caption"><?php echo $patient_an_registration->ForcepsP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ForcepsP" class="<?php echo $patient_an_registration->ForcepsP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->ForcepsP) ?>',1);"><div id="elh_patient_an_registration_ForcepsP" class="patient_an_registration_ForcepsP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->ForcepsP->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->ForcepsP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->ForcepsP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Elective->Visible) { // Elective ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->Elective) == "") { ?>
		<th data-name="Elective" class="<?php echo $patient_an_registration->Elective->headerCellClass() ?>"><div id="elh_patient_an_registration_Elective" class="patient_an_registration_Elective"><div class="ew-table-header-caption"><?php echo $patient_an_registration->Elective->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Elective" class="<?php echo $patient_an_registration->Elective->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->Elective) ?>',1);"><div id="elh_patient_an_registration_Elective" class="patient_an_registration_Elective">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->Elective->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->Elective->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->Elective->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->ElectiveS->Visible) { // ElectiveS ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->ElectiveS) == "") { ?>
		<th data-name="ElectiveS" class="<?php echo $patient_an_registration->ElectiveS->headerCellClass() ?>"><div id="elh_patient_an_registration_ElectiveS" class="patient_an_registration_ElectiveS"><div class="ew-table-header-caption"><?php echo $patient_an_registration->ElectiveS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ElectiveS" class="<?php echo $patient_an_registration->ElectiveS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->ElectiveS) ?>',1);"><div id="elh_patient_an_registration_ElectiveS" class="patient_an_registration_ElectiveS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->ElectiveS->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->ElectiveS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->ElectiveS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->ElectiveP->Visible) { // ElectiveP ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->ElectiveP) == "") { ?>
		<th data-name="ElectiveP" class="<?php echo $patient_an_registration->ElectiveP->headerCellClass() ?>"><div id="elh_patient_an_registration_ElectiveP" class="patient_an_registration_ElectiveP"><div class="ew-table-header-caption"><?php echo $patient_an_registration->ElectiveP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ElectiveP" class="<?php echo $patient_an_registration->ElectiveP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->ElectiveP) ?>',1);"><div id="elh_patient_an_registration_ElectiveP" class="patient_an_registration_ElectiveP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->ElectiveP->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->ElectiveP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->ElectiveP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Emergency->Visible) { // Emergency ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->Emergency) == "") { ?>
		<th data-name="Emergency" class="<?php echo $patient_an_registration->Emergency->headerCellClass() ?>"><div id="elh_patient_an_registration_Emergency" class="patient_an_registration_Emergency"><div class="ew-table-header-caption"><?php echo $patient_an_registration->Emergency->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Emergency" class="<?php echo $patient_an_registration->Emergency->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->Emergency) ?>',1);"><div id="elh_patient_an_registration_Emergency" class="patient_an_registration_Emergency">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->Emergency->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->Emergency->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->Emergency->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->EmergencyS->Visible) { // EmergencyS ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->EmergencyS) == "") { ?>
		<th data-name="EmergencyS" class="<?php echo $patient_an_registration->EmergencyS->headerCellClass() ?>"><div id="elh_patient_an_registration_EmergencyS" class="patient_an_registration_EmergencyS"><div class="ew-table-header-caption"><?php echo $patient_an_registration->EmergencyS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EmergencyS" class="<?php echo $patient_an_registration->EmergencyS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->EmergencyS) ?>',1);"><div id="elh_patient_an_registration_EmergencyS" class="patient_an_registration_EmergencyS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->EmergencyS->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->EmergencyS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->EmergencyS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->EmergencyP->Visible) { // EmergencyP ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->EmergencyP) == "") { ?>
		<th data-name="EmergencyP" class="<?php echo $patient_an_registration->EmergencyP->headerCellClass() ?>"><div id="elh_patient_an_registration_EmergencyP" class="patient_an_registration_EmergencyP"><div class="ew-table-header-caption"><?php echo $patient_an_registration->EmergencyP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EmergencyP" class="<?php echo $patient_an_registration->EmergencyP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->EmergencyP) ?>',1);"><div id="elh_patient_an_registration_EmergencyP" class="patient_an_registration_EmergencyP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->EmergencyP->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->EmergencyP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->EmergencyP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Maturity->Visible) { // Maturity ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->Maturity) == "") { ?>
		<th data-name="Maturity" class="<?php echo $patient_an_registration->Maturity->headerCellClass() ?>"><div id="elh_patient_an_registration_Maturity" class="patient_an_registration_Maturity"><div class="ew-table-header-caption"><?php echo $patient_an_registration->Maturity->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Maturity" class="<?php echo $patient_an_registration->Maturity->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->Maturity) ?>',1);"><div id="elh_patient_an_registration_Maturity" class="patient_an_registration_Maturity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->Maturity->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->Maturity->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->Maturity->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Baby1->Visible) { // Baby1 ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->Baby1) == "") { ?>
		<th data-name="Baby1" class="<?php echo $patient_an_registration->Baby1->headerCellClass() ?>"><div id="elh_patient_an_registration_Baby1" class="patient_an_registration_Baby1"><div class="ew-table-header-caption"><?php echo $patient_an_registration->Baby1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Baby1" class="<?php echo $patient_an_registration->Baby1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->Baby1) ?>',1);"><div id="elh_patient_an_registration_Baby1" class="patient_an_registration_Baby1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->Baby1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->Baby1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->Baby1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Baby2->Visible) { // Baby2 ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->Baby2) == "") { ?>
		<th data-name="Baby2" class="<?php echo $patient_an_registration->Baby2->headerCellClass() ?>"><div id="elh_patient_an_registration_Baby2" class="patient_an_registration_Baby2"><div class="ew-table-header-caption"><?php echo $patient_an_registration->Baby2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Baby2" class="<?php echo $patient_an_registration->Baby2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->Baby2) ?>',1);"><div id="elh_patient_an_registration_Baby2" class="patient_an_registration_Baby2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->Baby2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->Baby2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->Baby2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->sex1->Visible) { // sex1 ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->sex1) == "") { ?>
		<th data-name="sex1" class="<?php echo $patient_an_registration->sex1->headerCellClass() ?>"><div id="elh_patient_an_registration_sex1" class="patient_an_registration_sex1"><div class="ew-table-header-caption"><?php echo $patient_an_registration->sex1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sex1" class="<?php echo $patient_an_registration->sex1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->sex1) ?>',1);"><div id="elh_patient_an_registration_sex1" class="patient_an_registration_sex1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->sex1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->sex1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->sex1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->sex2->Visible) { // sex2 ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->sex2) == "") { ?>
		<th data-name="sex2" class="<?php echo $patient_an_registration->sex2->headerCellClass() ?>"><div id="elh_patient_an_registration_sex2" class="patient_an_registration_sex2"><div class="ew-table-header-caption"><?php echo $patient_an_registration->sex2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sex2" class="<?php echo $patient_an_registration->sex2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->sex2) ?>',1);"><div id="elh_patient_an_registration_sex2" class="patient_an_registration_sex2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->sex2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->sex2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->sex2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->weight1->Visible) { // weight1 ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->weight1) == "") { ?>
		<th data-name="weight1" class="<?php echo $patient_an_registration->weight1->headerCellClass() ?>"><div id="elh_patient_an_registration_weight1" class="patient_an_registration_weight1"><div class="ew-table-header-caption"><?php echo $patient_an_registration->weight1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="weight1" class="<?php echo $patient_an_registration->weight1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->weight1) ?>',1);"><div id="elh_patient_an_registration_weight1" class="patient_an_registration_weight1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->weight1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->weight1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->weight1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->weight2->Visible) { // weight2 ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->weight2) == "") { ?>
		<th data-name="weight2" class="<?php echo $patient_an_registration->weight2->headerCellClass() ?>"><div id="elh_patient_an_registration_weight2" class="patient_an_registration_weight2"><div class="ew-table-header-caption"><?php echo $patient_an_registration->weight2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="weight2" class="<?php echo $patient_an_registration->weight2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->weight2) ?>',1);"><div id="elh_patient_an_registration_weight2" class="patient_an_registration_weight2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->weight2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->weight2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->weight2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->NICU1->Visible) { // NICU1 ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->NICU1) == "") { ?>
		<th data-name="NICU1" class="<?php echo $patient_an_registration->NICU1->headerCellClass() ?>"><div id="elh_patient_an_registration_NICU1" class="patient_an_registration_NICU1"><div class="ew-table-header-caption"><?php echo $patient_an_registration->NICU1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NICU1" class="<?php echo $patient_an_registration->NICU1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->NICU1) ?>',1);"><div id="elh_patient_an_registration_NICU1" class="patient_an_registration_NICU1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->NICU1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->NICU1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->NICU1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->NICU2->Visible) { // NICU2 ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->NICU2) == "") { ?>
		<th data-name="NICU2" class="<?php echo $patient_an_registration->NICU2->headerCellClass() ?>"><div id="elh_patient_an_registration_NICU2" class="patient_an_registration_NICU2"><div class="ew-table-header-caption"><?php echo $patient_an_registration->NICU2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NICU2" class="<?php echo $patient_an_registration->NICU2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->NICU2) ?>',1);"><div id="elh_patient_an_registration_NICU2" class="patient_an_registration_NICU2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->NICU2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->NICU2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->NICU2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Jaundice1->Visible) { // Jaundice1 ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->Jaundice1) == "") { ?>
		<th data-name="Jaundice1" class="<?php echo $patient_an_registration->Jaundice1->headerCellClass() ?>"><div id="elh_patient_an_registration_Jaundice1" class="patient_an_registration_Jaundice1"><div class="ew-table-header-caption"><?php echo $patient_an_registration->Jaundice1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Jaundice1" class="<?php echo $patient_an_registration->Jaundice1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->Jaundice1) ?>',1);"><div id="elh_patient_an_registration_Jaundice1" class="patient_an_registration_Jaundice1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->Jaundice1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->Jaundice1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->Jaundice1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Jaundice2->Visible) { // Jaundice2 ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->Jaundice2) == "") { ?>
		<th data-name="Jaundice2" class="<?php echo $patient_an_registration->Jaundice2->headerCellClass() ?>"><div id="elh_patient_an_registration_Jaundice2" class="patient_an_registration_Jaundice2"><div class="ew-table-header-caption"><?php echo $patient_an_registration->Jaundice2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Jaundice2" class="<?php echo $patient_an_registration->Jaundice2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->Jaundice2) ?>',1);"><div id="elh_patient_an_registration_Jaundice2" class="patient_an_registration_Jaundice2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->Jaundice2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->Jaundice2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->Jaundice2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Others1->Visible) { // Others1 ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->Others1) == "") { ?>
		<th data-name="Others1" class="<?php echo $patient_an_registration->Others1->headerCellClass() ?>"><div id="elh_patient_an_registration_Others1" class="patient_an_registration_Others1"><div class="ew-table-header-caption"><?php echo $patient_an_registration->Others1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Others1" class="<?php echo $patient_an_registration->Others1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->Others1) ?>',1);"><div id="elh_patient_an_registration_Others1" class="patient_an_registration_Others1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->Others1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->Others1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->Others1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->Others2->Visible) { // Others2 ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->Others2) == "") { ?>
		<th data-name="Others2" class="<?php echo $patient_an_registration->Others2->headerCellClass() ?>"><div id="elh_patient_an_registration_Others2" class="patient_an_registration_Others2"><div class="ew-table-header-caption"><?php echo $patient_an_registration->Others2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Others2" class="<?php echo $patient_an_registration->Others2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->Others2) ?>',1);"><div id="elh_patient_an_registration_Others2" class="patient_an_registration_Others2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->Others2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->Others2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->Others2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->SpillOverReasons->Visible) { // SpillOverReasons ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->SpillOverReasons) == "") { ?>
		<th data-name="SpillOverReasons" class="<?php echo $patient_an_registration->SpillOverReasons->headerCellClass() ?>"><div id="elh_patient_an_registration_SpillOverReasons" class="patient_an_registration_SpillOverReasons"><div class="ew-table-header-caption"><?php echo $patient_an_registration->SpillOverReasons->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SpillOverReasons" class="<?php echo $patient_an_registration->SpillOverReasons->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->SpillOverReasons) ?>',1);"><div id="elh_patient_an_registration_SpillOverReasons" class="patient_an_registration_SpillOverReasons">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->SpillOverReasons->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->SpillOverReasons->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->SpillOverReasons->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->ANClosed->Visible) { // ANClosed ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->ANClosed) == "") { ?>
		<th data-name="ANClosed" class="<?php echo $patient_an_registration->ANClosed->headerCellClass() ?>"><div id="elh_patient_an_registration_ANClosed" class="patient_an_registration_ANClosed"><div class="ew-table-header-caption"><?php echo $patient_an_registration->ANClosed->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ANClosed" class="<?php echo $patient_an_registration->ANClosed->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->ANClosed) ?>',1);"><div id="elh_patient_an_registration_ANClosed" class="patient_an_registration_ANClosed">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->ANClosed->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->ANClosed->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->ANClosed->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->ANClosedDATE->Visible) { // ANClosedDATE ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->ANClosedDATE) == "") { ?>
		<th data-name="ANClosedDATE" class="<?php echo $patient_an_registration->ANClosedDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_ANClosedDATE" class="patient_an_registration_ANClosedDATE"><div class="ew-table-header-caption"><?php echo $patient_an_registration->ANClosedDATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ANClosedDATE" class="<?php echo $patient_an_registration->ANClosedDATE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->ANClosedDATE) ?>',1);"><div id="elh_patient_an_registration_ANClosedDATE" class="patient_an_registration_ANClosedDATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->ANClosedDATE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->ANClosedDATE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->ANClosedDATE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->PastMedicalHistoryOthers->Visible) { // PastMedicalHistoryOthers ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->PastMedicalHistoryOthers) == "") { ?>
		<th data-name="PastMedicalHistoryOthers" class="<?php echo $patient_an_registration->PastMedicalHistoryOthers->headerCellClass() ?>"><div id="elh_patient_an_registration_PastMedicalHistoryOthers" class="patient_an_registration_PastMedicalHistoryOthers"><div class="ew-table-header-caption"><?php echo $patient_an_registration->PastMedicalHistoryOthers->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PastMedicalHistoryOthers" class="<?php echo $patient_an_registration->PastMedicalHistoryOthers->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->PastMedicalHistoryOthers) ?>',1);"><div id="elh_patient_an_registration_PastMedicalHistoryOthers" class="patient_an_registration_PastMedicalHistoryOthers">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->PastMedicalHistoryOthers->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->PastMedicalHistoryOthers->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->PastMedicalHistoryOthers->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->PastSurgicalHistoryOthers->Visible) { // PastSurgicalHistoryOthers ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->PastSurgicalHistoryOthers) == "") { ?>
		<th data-name="PastSurgicalHistoryOthers" class="<?php echo $patient_an_registration->PastSurgicalHistoryOthers->headerCellClass() ?>"><div id="elh_patient_an_registration_PastSurgicalHistoryOthers" class="patient_an_registration_PastSurgicalHistoryOthers"><div class="ew-table-header-caption"><?php echo $patient_an_registration->PastSurgicalHistoryOthers->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PastSurgicalHistoryOthers" class="<?php echo $patient_an_registration->PastSurgicalHistoryOthers->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->PastSurgicalHistoryOthers) ?>',1);"><div id="elh_patient_an_registration_PastSurgicalHistoryOthers" class="patient_an_registration_PastSurgicalHistoryOthers">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->PastSurgicalHistoryOthers->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->PastSurgicalHistoryOthers->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->PastSurgicalHistoryOthers->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->FamilyHistoryOthers->Visible) { // FamilyHistoryOthers ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->FamilyHistoryOthers) == "") { ?>
		<th data-name="FamilyHistoryOthers" class="<?php echo $patient_an_registration->FamilyHistoryOthers->headerCellClass() ?>"><div id="elh_patient_an_registration_FamilyHistoryOthers" class="patient_an_registration_FamilyHistoryOthers"><div class="ew-table-header-caption"><?php echo $patient_an_registration->FamilyHistoryOthers->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FamilyHistoryOthers" class="<?php echo $patient_an_registration->FamilyHistoryOthers->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->FamilyHistoryOthers) ?>',1);"><div id="elh_patient_an_registration_FamilyHistoryOthers" class="patient_an_registration_FamilyHistoryOthers">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->FamilyHistoryOthers->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->FamilyHistoryOthers->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->FamilyHistoryOthers->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->PresentPregnancyComplicationsOthers->Visible) { // PresentPregnancyComplicationsOthers ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->PresentPregnancyComplicationsOthers) == "") { ?>
		<th data-name="PresentPregnancyComplicationsOthers" class="<?php echo $patient_an_registration->PresentPregnancyComplicationsOthers->headerCellClass() ?>"><div id="elh_patient_an_registration_PresentPregnancyComplicationsOthers" class="patient_an_registration_PresentPregnancyComplicationsOthers"><div class="ew-table-header-caption"><?php echo $patient_an_registration->PresentPregnancyComplicationsOthers->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PresentPregnancyComplicationsOthers" class="<?php echo $patient_an_registration->PresentPregnancyComplicationsOthers->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->PresentPregnancyComplicationsOthers) ?>',1);"><div id="elh_patient_an_registration_PresentPregnancyComplicationsOthers" class="patient_an_registration_PresentPregnancyComplicationsOthers">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->PresentPregnancyComplicationsOthers->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->PresentPregnancyComplicationsOthers->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->PresentPregnancyComplicationsOthers->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration->ETdate->Visible) { // ETdate ?>
	<?php if ($patient_an_registration->sortUrl($patient_an_registration->ETdate) == "") { ?>
		<th data-name="ETdate" class="<?php echo $patient_an_registration->ETdate->headerCellClass() ?>"><div id="elh_patient_an_registration_ETdate" class="patient_an_registration_ETdate"><div class="ew-table-header-caption"><?php echo $patient_an_registration->ETdate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ETdate" class="<?php echo $patient_an_registration->ETdate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $patient_an_registration->SortUrl($patient_an_registration->ETdate) ?>',1);"><div id="elh_patient_an_registration_ETdate" class="patient_an_registration_ETdate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration->ETdate->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration->ETdate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_an_registration->ETdate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_an_registration_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($patient_an_registration->ExportAll && $patient_an_registration->isExport()) {
	$patient_an_registration_list->StopRec = $patient_an_registration_list->TotalRecs;
} else {

	// Set the last record to display
	if ($patient_an_registration_list->TotalRecs > $patient_an_registration_list->StartRec + $patient_an_registration_list->DisplayRecs - 1)
		$patient_an_registration_list->StopRec = $patient_an_registration_list->StartRec + $patient_an_registration_list->DisplayRecs - 1;
	else
		$patient_an_registration_list->StopRec = $patient_an_registration_list->TotalRecs;
}
$patient_an_registration_list->RecCnt = $patient_an_registration_list->StartRec - 1;
if ($patient_an_registration_list->Recordset && !$patient_an_registration_list->Recordset->EOF) {
	$patient_an_registration_list->Recordset->moveFirst();
	$selectLimit = $patient_an_registration_list->UseSelectLimit;
	if (!$selectLimit && $patient_an_registration_list->StartRec > 1)
		$patient_an_registration_list->Recordset->move($patient_an_registration_list->StartRec - 1);
} elseif (!$patient_an_registration->AllowAddDeleteRow && $patient_an_registration_list->StopRec == 0) {
	$patient_an_registration_list->StopRec = $patient_an_registration->GridAddRowCount;
}

// Initialize aggregate
$patient_an_registration->RowType = ROWTYPE_AGGREGATEINIT;
$patient_an_registration->resetAttributes();
$patient_an_registration_list->renderRow();
while ($patient_an_registration_list->RecCnt < $patient_an_registration_list->StopRec) {
	$patient_an_registration_list->RecCnt++;
	if ($patient_an_registration_list->RecCnt >= $patient_an_registration_list->StartRec) {
		$patient_an_registration_list->RowCnt++;

		// Set up key count
		$patient_an_registration_list->KeyCount = $patient_an_registration_list->RowIndex;

		// Init row class and style
		$patient_an_registration->resetAttributes();
		$patient_an_registration->CssClass = "";
		if ($patient_an_registration->isGridAdd()) {
		} else {
			$patient_an_registration_list->loadRowValues($patient_an_registration_list->Recordset); // Load row values
		}
		$patient_an_registration->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$patient_an_registration->RowAttrs = array_merge($patient_an_registration->RowAttrs, array('data-rowindex'=>$patient_an_registration_list->RowCnt, 'id'=>'r' . $patient_an_registration_list->RowCnt . '_patient_an_registration', 'data-rowtype'=>$patient_an_registration->RowType));

		// Render row
		$patient_an_registration_list->renderRow();

		// Render list options
		$patient_an_registration_list->renderListOptions();
?>
	<tr<?php echo $patient_an_registration->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_an_registration_list->ListOptions->render("body", "left", $patient_an_registration_list->RowCnt);
?>
	<?php if ($patient_an_registration->id->Visible) { // id ?>
		<td data-name="id"<?php echo $patient_an_registration->id->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_id" class="patient_an_registration_id">
<span<?php echo $patient_an_registration->id->viewAttributes() ?>>
<?php echo $patient_an_registration->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->pid->Visible) { // pid ?>
		<td data-name="pid"<?php echo $patient_an_registration->pid->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_pid" class="patient_an_registration_pid">
<span<?php echo $patient_an_registration->pid->viewAttributes() ?>>
<?php echo $patient_an_registration->pid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->fid->Visible) { // fid ?>
		<td data-name="fid"<?php echo $patient_an_registration->fid->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_fid" class="patient_an_registration_fid">
<span<?php echo $patient_an_registration->fid->viewAttributes() ?>>
<?php echo $patient_an_registration->fid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->G->Visible) { // G ?>
		<td data-name="G"<?php echo $patient_an_registration->G->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_G" class="patient_an_registration_G">
<span<?php echo $patient_an_registration->G->viewAttributes() ?>>
<?php echo $patient_an_registration->G->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->P->Visible) { // P ?>
		<td data-name="P"<?php echo $patient_an_registration->P->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_P" class="patient_an_registration_P">
<span<?php echo $patient_an_registration->P->viewAttributes() ?>>
<?php echo $patient_an_registration->P->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->L->Visible) { // L ?>
		<td data-name="L"<?php echo $patient_an_registration->L->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_L" class="patient_an_registration_L">
<span<?php echo $patient_an_registration->L->viewAttributes() ?>>
<?php echo $patient_an_registration->L->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->A->Visible) { // A ?>
		<td data-name="A"<?php echo $patient_an_registration->A->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_A" class="patient_an_registration_A">
<span<?php echo $patient_an_registration->A->viewAttributes() ?>>
<?php echo $patient_an_registration->A->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->E->Visible) { // E ?>
		<td data-name="E"<?php echo $patient_an_registration->E->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_E" class="patient_an_registration_E">
<span<?php echo $patient_an_registration->E->viewAttributes() ?>>
<?php echo $patient_an_registration->E->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->M->Visible) { // M ?>
		<td data-name="M"<?php echo $patient_an_registration->M->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_M" class="patient_an_registration_M">
<span<?php echo $patient_an_registration->M->viewAttributes() ?>>
<?php echo $patient_an_registration->M->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->LMP->Visible) { // LMP ?>
		<td data-name="LMP"<?php echo $patient_an_registration->LMP->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_LMP" class="patient_an_registration_LMP">
<span<?php echo $patient_an_registration->LMP->viewAttributes() ?>>
<?php echo $patient_an_registration->LMP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->EDO->Visible) { // EDO ?>
		<td data-name="EDO"<?php echo $patient_an_registration->EDO->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_EDO" class="patient_an_registration_EDO">
<span<?php echo $patient_an_registration->EDO->viewAttributes() ?>>
<?php echo $patient_an_registration->EDO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->MenstrualHistory->Visible) { // MenstrualHistory ?>
		<td data-name="MenstrualHistory"<?php echo $patient_an_registration->MenstrualHistory->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_MenstrualHistory" class="patient_an_registration_MenstrualHistory">
<span<?php echo $patient_an_registration->MenstrualHistory->viewAttributes() ?>>
<?php echo $patient_an_registration->MenstrualHistory->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->MaritalHistory->Visible) { // MaritalHistory ?>
		<td data-name="MaritalHistory"<?php echo $patient_an_registration->MaritalHistory->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_MaritalHistory" class="patient_an_registration_MaritalHistory">
<span<?php echo $patient_an_registration->MaritalHistory->viewAttributes() ?>>
<?php echo $patient_an_registration->MaritalHistory->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->ObstetricHistory->Visible) { // ObstetricHistory ?>
		<td data-name="ObstetricHistory"<?php echo $patient_an_registration->ObstetricHistory->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_ObstetricHistory" class="patient_an_registration_ObstetricHistory">
<span<?php echo $patient_an_registration->ObstetricHistory->viewAttributes() ?>>
<?php echo $patient_an_registration->ObstetricHistory->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->PreviousHistoryofGDM->Visible) { // PreviousHistoryofGDM ?>
		<td data-name="PreviousHistoryofGDM"<?php echo $patient_an_registration->PreviousHistoryofGDM->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_PreviousHistoryofGDM" class="patient_an_registration_PreviousHistoryofGDM">
<span<?php echo $patient_an_registration->PreviousHistoryofGDM->viewAttributes() ?>>
<?php echo $patient_an_registration->PreviousHistoryofGDM->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->PreviousHistorofPIH->Visible) { // PreviousHistorofPIH ?>
		<td data-name="PreviousHistorofPIH"<?php echo $patient_an_registration->PreviousHistorofPIH->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_PreviousHistorofPIH" class="patient_an_registration_PreviousHistorofPIH">
<span<?php echo $patient_an_registration->PreviousHistorofPIH->viewAttributes() ?>>
<?php echo $patient_an_registration->PreviousHistorofPIH->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->PreviousHistoryofIUGR->Visible) { // PreviousHistoryofIUGR ?>
		<td data-name="PreviousHistoryofIUGR"<?php echo $patient_an_registration->PreviousHistoryofIUGR->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_PreviousHistoryofIUGR" class="patient_an_registration_PreviousHistoryofIUGR">
<span<?php echo $patient_an_registration->PreviousHistoryofIUGR->viewAttributes() ?>>
<?php echo $patient_an_registration->PreviousHistoryofIUGR->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->PreviousHistoryofOligohydramnios->Visible) { // PreviousHistoryofOligohydramnios ?>
		<td data-name="PreviousHistoryofOligohydramnios"<?php echo $patient_an_registration->PreviousHistoryofOligohydramnios->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_PreviousHistoryofOligohydramnios" class="patient_an_registration_PreviousHistoryofOligohydramnios">
<span<?php echo $patient_an_registration->PreviousHistoryofOligohydramnios->viewAttributes() ?>>
<?php echo $patient_an_registration->PreviousHistoryofOligohydramnios->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->PreviousHistoryofPreterm->Visible) { // PreviousHistoryofPreterm ?>
		<td data-name="PreviousHistoryofPreterm"<?php echo $patient_an_registration->PreviousHistoryofPreterm->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_PreviousHistoryofPreterm" class="patient_an_registration_PreviousHistoryofPreterm">
<span<?php echo $patient_an_registration->PreviousHistoryofPreterm->viewAttributes() ?>>
<?php echo $patient_an_registration->PreviousHistoryofPreterm->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->G1->Visible) { // G1 ?>
		<td data-name="G1"<?php echo $patient_an_registration->G1->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_G1" class="patient_an_registration_G1">
<span<?php echo $patient_an_registration->G1->viewAttributes() ?>>
<?php echo $patient_an_registration->G1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->G2->Visible) { // G2 ?>
		<td data-name="G2"<?php echo $patient_an_registration->G2->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_G2" class="patient_an_registration_G2">
<span<?php echo $patient_an_registration->G2->viewAttributes() ?>>
<?php echo $patient_an_registration->G2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->G3->Visible) { // G3 ?>
		<td data-name="G3"<?php echo $patient_an_registration->G3->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_G3" class="patient_an_registration_G3">
<span<?php echo $patient_an_registration->G3->viewAttributes() ?>>
<?php echo $patient_an_registration->G3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->DeliveryNDLSCS1->Visible) { // DeliveryNDLSCS1 ?>
		<td data-name="DeliveryNDLSCS1"<?php echo $patient_an_registration->DeliveryNDLSCS1->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_DeliveryNDLSCS1" class="patient_an_registration_DeliveryNDLSCS1">
<span<?php echo $patient_an_registration->DeliveryNDLSCS1->viewAttributes() ?>>
<?php echo $patient_an_registration->DeliveryNDLSCS1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->DeliveryNDLSCS2->Visible) { // DeliveryNDLSCS2 ?>
		<td data-name="DeliveryNDLSCS2"<?php echo $patient_an_registration->DeliveryNDLSCS2->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_DeliveryNDLSCS2" class="patient_an_registration_DeliveryNDLSCS2">
<span<?php echo $patient_an_registration->DeliveryNDLSCS2->viewAttributes() ?>>
<?php echo $patient_an_registration->DeliveryNDLSCS2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->DeliveryNDLSCS3->Visible) { // DeliveryNDLSCS3 ?>
		<td data-name="DeliveryNDLSCS3"<?php echo $patient_an_registration->DeliveryNDLSCS3->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_DeliveryNDLSCS3" class="patient_an_registration_DeliveryNDLSCS3">
<span<?php echo $patient_an_registration->DeliveryNDLSCS3->viewAttributes() ?>>
<?php echo $patient_an_registration->DeliveryNDLSCS3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->BabySexweight1->Visible) { // BabySexweight1 ?>
		<td data-name="BabySexweight1"<?php echo $patient_an_registration->BabySexweight1->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_BabySexweight1" class="patient_an_registration_BabySexweight1">
<span<?php echo $patient_an_registration->BabySexweight1->viewAttributes() ?>>
<?php echo $patient_an_registration->BabySexweight1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->BabySexweight2->Visible) { // BabySexweight2 ?>
		<td data-name="BabySexweight2"<?php echo $patient_an_registration->BabySexweight2->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_BabySexweight2" class="patient_an_registration_BabySexweight2">
<span<?php echo $patient_an_registration->BabySexweight2->viewAttributes() ?>>
<?php echo $patient_an_registration->BabySexweight2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->BabySexweight3->Visible) { // BabySexweight3 ?>
		<td data-name="BabySexweight3"<?php echo $patient_an_registration->BabySexweight3->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_BabySexweight3" class="patient_an_registration_BabySexweight3">
<span<?php echo $patient_an_registration->BabySexweight3->viewAttributes() ?>>
<?php echo $patient_an_registration->BabySexweight3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->PastMedicalHistory->Visible) { // PastMedicalHistory ?>
		<td data-name="PastMedicalHistory"<?php echo $patient_an_registration->PastMedicalHistory->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_PastMedicalHistory" class="patient_an_registration_PastMedicalHistory">
<span<?php echo $patient_an_registration->PastMedicalHistory->viewAttributes() ?>>
<?php echo $patient_an_registration->PastMedicalHistory->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->PastSurgicalHistory->Visible) { // PastSurgicalHistory ?>
		<td data-name="PastSurgicalHistory"<?php echo $patient_an_registration->PastSurgicalHistory->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_PastSurgicalHistory" class="patient_an_registration_PastSurgicalHistory">
<span<?php echo $patient_an_registration->PastSurgicalHistory->viewAttributes() ?>>
<?php echo $patient_an_registration->PastSurgicalHistory->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->FamilyHistory->Visible) { // FamilyHistory ?>
		<td data-name="FamilyHistory"<?php echo $patient_an_registration->FamilyHistory->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_FamilyHistory" class="patient_an_registration_FamilyHistory">
<span<?php echo $patient_an_registration->FamilyHistory->viewAttributes() ?>>
<?php echo $patient_an_registration->FamilyHistory->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Viability->Visible) { // Viability ?>
		<td data-name="Viability"<?php echo $patient_an_registration->Viability->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_Viability" class="patient_an_registration_Viability">
<span<?php echo $patient_an_registration->Viability->viewAttributes() ?>>
<?php echo $patient_an_registration->Viability->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->ViabilityDATE->Visible) { // ViabilityDATE ?>
		<td data-name="ViabilityDATE"<?php echo $patient_an_registration->ViabilityDATE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_ViabilityDATE" class="patient_an_registration_ViabilityDATE">
<span<?php echo $patient_an_registration->ViabilityDATE->viewAttributes() ?>>
<?php echo $patient_an_registration->ViabilityDATE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->ViabilityREPORT->Visible) { // ViabilityREPORT ?>
		<td data-name="ViabilityREPORT"<?php echo $patient_an_registration->ViabilityREPORT->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_ViabilityREPORT" class="patient_an_registration_ViabilityREPORT">
<span<?php echo $patient_an_registration->ViabilityREPORT->viewAttributes() ?>>
<?php echo $patient_an_registration->ViabilityREPORT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Viability2->Visible) { // Viability2 ?>
		<td data-name="Viability2"<?php echo $patient_an_registration->Viability2->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_Viability2" class="patient_an_registration_Viability2">
<span<?php echo $patient_an_registration->Viability2->viewAttributes() ?>>
<?php echo $patient_an_registration->Viability2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Viability2DATE->Visible) { // Viability2DATE ?>
		<td data-name="Viability2DATE"<?php echo $patient_an_registration->Viability2DATE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_Viability2DATE" class="patient_an_registration_Viability2DATE">
<span<?php echo $patient_an_registration->Viability2DATE->viewAttributes() ?>>
<?php echo $patient_an_registration->Viability2DATE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Viability2REPORT->Visible) { // Viability2REPORT ?>
		<td data-name="Viability2REPORT"<?php echo $patient_an_registration->Viability2REPORT->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_Viability2REPORT" class="patient_an_registration_Viability2REPORT">
<span<?php echo $patient_an_registration->Viability2REPORT->viewAttributes() ?>>
<?php echo $patient_an_registration->Viability2REPORT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->NTscan->Visible) { // NTscan ?>
		<td data-name="NTscan"<?php echo $patient_an_registration->NTscan->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_NTscan" class="patient_an_registration_NTscan">
<span<?php echo $patient_an_registration->NTscan->viewAttributes() ?>>
<?php echo $patient_an_registration->NTscan->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->NTscanDATE->Visible) { // NTscanDATE ?>
		<td data-name="NTscanDATE"<?php echo $patient_an_registration->NTscanDATE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_NTscanDATE" class="patient_an_registration_NTscanDATE">
<span<?php echo $patient_an_registration->NTscanDATE->viewAttributes() ?>>
<?php echo $patient_an_registration->NTscanDATE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->NTscanREPORT->Visible) { // NTscanREPORT ?>
		<td data-name="NTscanREPORT"<?php echo $patient_an_registration->NTscanREPORT->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_NTscanREPORT" class="patient_an_registration_NTscanREPORT">
<span<?php echo $patient_an_registration->NTscanREPORT->viewAttributes() ?>>
<?php echo $patient_an_registration->NTscanREPORT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->EarlyTarget->Visible) { // EarlyTarget ?>
		<td data-name="EarlyTarget"<?php echo $patient_an_registration->EarlyTarget->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_EarlyTarget" class="patient_an_registration_EarlyTarget">
<span<?php echo $patient_an_registration->EarlyTarget->viewAttributes() ?>>
<?php echo $patient_an_registration->EarlyTarget->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->EarlyTargetDATE->Visible) { // EarlyTargetDATE ?>
		<td data-name="EarlyTargetDATE"<?php echo $patient_an_registration->EarlyTargetDATE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_EarlyTargetDATE" class="patient_an_registration_EarlyTargetDATE">
<span<?php echo $patient_an_registration->EarlyTargetDATE->viewAttributes() ?>>
<?php echo $patient_an_registration->EarlyTargetDATE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->EarlyTargetREPORT->Visible) { // EarlyTargetREPORT ?>
		<td data-name="EarlyTargetREPORT"<?php echo $patient_an_registration->EarlyTargetREPORT->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_EarlyTargetREPORT" class="patient_an_registration_EarlyTargetREPORT">
<span<?php echo $patient_an_registration->EarlyTargetREPORT->viewAttributes() ?>>
<?php echo $patient_an_registration->EarlyTargetREPORT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Anomaly->Visible) { // Anomaly ?>
		<td data-name="Anomaly"<?php echo $patient_an_registration->Anomaly->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_Anomaly" class="patient_an_registration_Anomaly">
<span<?php echo $patient_an_registration->Anomaly->viewAttributes() ?>>
<?php echo $patient_an_registration->Anomaly->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->AnomalyDATE->Visible) { // AnomalyDATE ?>
		<td data-name="AnomalyDATE"<?php echo $patient_an_registration->AnomalyDATE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_AnomalyDATE" class="patient_an_registration_AnomalyDATE">
<span<?php echo $patient_an_registration->AnomalyDATE->viewAttributes() ?>>
<?php echo $patient_an_registration->AnomalyDATE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->AnomalyREPORT->Visible) { // AnomalyREPORT ?>
		<td data-name="AnomalyREPORT"<?php echo $patient_an_registration->AnomalyREPORT->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_AnomalyREPORT" class="patient_an_registration_AnomalyREPORT">
<span<?php echo $patient_an_registration->AnomalyREPORT->viewAttributes() ?>>
<?php echo $patient_an_registration->AnomalyREPORT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Growth->Visible) { // Growth ?>
		<td data-name="Growth"<?php echo $patient_an_registration->Growth->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_Growth" class="patient_an_registration_Growth">
<span<?php echo $patient_an_registration->Growth->viewAttributes() ?>>
<?php echo $patient_an_registration->Growth->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->GrowthDATE->Visible) { // GrowthDATE ?>
		<td data-name="GrowthDATE"<?php echo $patient_an_registration->GrowthDATE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_GrowthDATE" class="patient_an_registration_GrowthDATE">
<span<?php echo $patient_an_registration->GrowthDATE->viewAttributes() ?>>
<?php echo $patient_an_registration->GrowthDATE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->GrowthREPORT->Visible) { // GrowthREPORT ?>
		<td data-name="GrowthREPORT"<?php echo $patient_an_registration->GrowthREPORT->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_GrowthREPORT" class="patient_an_registration_GrowthREPORT">
<span<?php echo $patient_an_registration->GrowthREPORT->viewAttributes() ?>>
<?php echo $patient_an_registration->GrowthREPORT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Growth1->Visible) { // Growth1 ?>
		<td data-name="Growth1"<?php echo $patient_an_registration->Growth1->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_Growth1" class="patient_an_registration_Growth1">
<span<?php echo $patient_an_registration->Growth1->viewAttributes() ?>>
<?php echo $patient_an_registration->Growth1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Growth1DATE->Visible) { // Growth1DATE ?>
		<td data-name="Growth1DATE"<?php echo $patient_an_registration->Growth1DATE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_Growth1DATE" class="patient_an_registration_Growth1DATE">
<span<?php echo $patient_an_registration->Growth1DATE->viewAttributes() ?>>
<?php echo $patient_an_registration->Growth1DATE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Growth1REPORT->Visible) { // Growth1REPORT ?>
		<td data-name="Growth1REPORT"<?php echo $patient_an_registration->Growth1REPORT->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_Growth1REPORT" class="patient_an_registration_Growth1REPORT">
<span<?php echo $patient_an_registration->Growth1REPORT->viewAttributes() ?>>
<?php echo $patient_an_registration->Growth1REPORT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->ANProfile->Visible) { // ANProfile ?>
		<td data-name="ANProfile"<?php echo $patient_an_registration->ANProfile->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_ANProfile" class="patient_an_registration_ANProfile">
<span<?php echo $patient_an_registration->ANProfile->viewAttributes() ?>>
<?php echo $patient_an_registration->ANProfile->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->ANProfileDATE->Visible) { // ANProfileDATE ?>
		<td data-name="ANProfileDATE"<?php echo $patient_an_registration->ANProfileDATE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_ANProfileDATE" class="patient_an_registration_ANProfileDATE">
<span<?php echo $patient_an_registration->ANProfileDATE->viewAttributes() ?>>
<?php echo $patient_an_registration->ANProfileDATE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->ANProfileINHOUSE->Visible) { // ANProfileINHOUSE ?>
		<td data-name="ANProfileINHOUSE"<?php echo $patient_an_registration->ANProfileINHOUSE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_ANProfileINHOUSE" class="patient_an_registration_ANProfileINHOUSE">
<span<?php echo $patient_an_registration->ANProfileINHOUSE->viewAttributes() ?>>
<?php echo $patient_an_registration->ANProfileINHOUSE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->ANProfileREPORT->Visible) { // ANProfileREPORT ?>
		<td data-name="ANProfileREPORT"<?php echo $patient_an_registration->ANProfileREPORT->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_ANProfileREPORT" class="patient_an_registration_ANProfileREPORT">
<span<?php echo $patient_an_registration->ANProfileREPORT->viewAttributes() ?>>
<?php echo $patient_an_registration->ANProfileREPORT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->DualMarker->Visible) { // DualMarker ?>
		<td data-name="DualMarker"<?php echo $patient_an_registration->DualMarker->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_DualMarker" class="patient_an_registration_DualMarker">
<span<?php echo $patient_an_registration->DualMarker->viewAttributes() ?>>
<?php echo $patient_an_registration->DualMarker->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->DualMarkerDATE->Visible) { // DualMarkerDATE ?>
		<td data-name="DualMarkerDATE"<?php echo $patient_an_registration->DualMarkerDATE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_DualMarkerDATE" class="patient_an_registration_DualMarkerDATE">
<span<?php echo $patient_an_registration->DualMarkerDATE->viewAttributes() ?>>
<?php echo $patient_an_registration->DualMarkerDATE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->DualMarkerINHOUSE->Visible) { // DualMarkerINHOUSE ?>
		<td data-name="DualMarkerINHOUSE"<?php echo $patient_an_registration->DualMarkerINHOUSE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_DualMarkerINHOUSE" class="patient_an_registration_DualMarkerINHOUSE">
<span<?php echo $patient_an_registration->DualMarkerINHOUSE->viewAttributes() ?>>
<?php echo $patient_an_registration->DualMarkerINHOUSE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->DualMarkerREPORT->Visible) { // DualMarkerREPORT ?>
		<td data-name="DualMarkerREPORT"<?php echo $patient_an_registration->DualMarkerREPORT->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_DualMarkerREPORT" class="patient_an_registration_DualMarkerREPORT">
<span<?php echo $patient_an_registration->DualMarkerREPORT->viewAttributes() ?>>
<?php echo $patient_an_registration->DualMarkerREPORT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Quadruple->Visible) { // Quadruple ?>
		<td data-name="Quadruple"<?php echo $patient_an_registration->Quadruple->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_Quadruple" class="patient_an_registration_Quadruple">
<span<?php echo $patient_an_registration->Quadruple->viewAttributes() ?>>
<?php echo $patient_an_registration->Quadruple->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->QuadrupleDATE->Visible) { // QuadrupleDATE ?>
		<td data-name="QuadrupleDATE"<?php echo $patient_an_registration->QuadrupleDATE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_QuadrupleDATE" class="patient_an_registration_QuadrupleDATE">
<span<?php echo $patient_an_registration->QuadrupleDATE->viewAttributes() ?>>
<?php echo $patient_an_registration->QuadrupleDATE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->QuadrupleINHOUSE->Visible) { // QuadrupleINHOUSE ?>
		<td data-name="QuadrupleINHOUSE"<?php echo $patient_an_registration->QuadrupleINHOUSE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_QuadrupleINHOUSE" class="patient_an_registration_QuadrupleINHOUSE">
<span<?php echo $patient_an_registration->QuadrupleINHOUSE->viewAttributes() ?>>
<?php echo $patient_an_registration->QuadrupleINHOUSE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->QuadrupleREPORT->Visible) { // QuadrupleREPORT ?>
		<td data-name="QuadrupleREPORT"<?php echo $patient_an_registration->QuadrupleREPORT->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_QuadrupleREPORT" class="patient_an_registration_QuadrupleREPORT">
<span<?php echo $patient_an_registration->QuadrupleREPORT->viewAttributes() ?>>
<?php echo $patient_an_registration->QuadrupleREPORT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->A5month->Visible) { // A5month ?>
		<td data-name="A5month"<?php echo $patient_an_registration->A5month->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_A5month" class="patient_an_registration_A5month">
<span<?php echo $patient_an_registration->A5month->viewAttributes() ?>>
<?php echo $patient_an_registration->A5month->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->A5monthDATE->Visible) { // A5monthDATE ?>
		<td data-name="A5monthDATE"<?php echo $patient_an_registration->A5monthDATE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_A5monthDATE" class="patient_an_registration_A5monthDATE">
<span<?php echo $patient_an_registration->A5monthDATE->viewAttributes() ?>>
<?php echo $patient_an_registration->A5monthDATE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->A5monthINHOUSE->Visible) { // A5monthINHOUSE ?>
		<td data-name="A5monthINHOUSE"<?php echo $patient_an_registration->A5monthINHOUSE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_A5monthINHOUSE" class="patient_an_registration_A5monthINHOUSE">
<span<?php echo $patient_an_registration->A5monthINHOUSE->viewAttributes() ?>>
<?php echo $patient_an_registration->A5monthINHOUSE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->A5monthREPORT->Visible) { // A5monthREPORT ?>
		<td data-name="A5monthREPORT"<?php echo $patient_an_registration->A5monthREPORT->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_A5monthREPORT" class="patient_an_registration_A5monthREPORT">
<span<?php echo $patient_an_registration->A5monthREPORT->viewAttributes() ?>>
<?php echo $patient_an_registration->A5monthREPORT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->A7month->Visible) { // A7month ?>
		<td data-name="A7month"<?php echo $patient_an_registration->A7month->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_A7month" class="patient_an_registration_A7month">
<span<?php echo $patient_an_registration->A7month->viewAttributes() ?>>
<?php echo $patient_an_registration->A7month->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->A7monthDATE->Visible) { // A7monthDATE ?>
		<td data-name="A7monthDATE"<?php echo $patient_an_registration->A7monthDATE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_A7monthDATE" class="patient_an_registration_A7monthDATE">
<span<?php echo $patient_an_registration->A7monthDATE->viewAttributes() ?>>
<?php echo $patient_an_registration->A7monthDATE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->A7monthINHOUSE->Visible) { // A7monthINHOUSE ?>
		<td data-name="A7monthINHOUSE"<?php echo $patient_an_registration->A7monthINHOUSE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_A7monthINHOUSE" class="patient_an_registration_A7monthINHOUSE">
<span<?php echo $patient_an_registration->A7monthINHOUSE->viewAttributes() ?>>
<?php echo $patient_an_registration->A7monthINHOUSE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->A7monthREPORT->Visible) { // A7monthREPORT ?>
		<td data-name="A7monthREPORT"<?php echo $patient_an_registration->A7monthREPORT->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_A7monthREPORT" class="patient_an_registration_A7monthREPORT">
<span<?php echo $patient_an_registration->A7monthREPORT->viewAttributes() ?>>
<?php echo $patient_an_registration->A7monthREPORT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->A9month->Visible) { // A9month ?>
		<td data-name="A9month"<?php echo $patient_an_registration->A9month->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_A9month" class="patient_an_registration_A9month">
<span<?php echo $patient_an_registration->A9month->viewAttributes() ?>>
<?php echo $patient_an_registration->A9month->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->A9monthDATE->Visible) { // A9monthDATE ?>
		<td data-name="A9monthDATE"<?php echo $patient_an_registration->A9monthDATE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_A9monthDATE" class="patient_an_registration_A9monthDATE">
<span<?php echo $patient_an_registration->A9monthDATE->viewAttributes() ?>>
<?php echo $patient_an_registration->A9monthDATE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->A9monthINHOUSE->Visible) { // A9monthINHOUSE ?>
		<td data-name="A9monthINHOUSE"<?php echo $patient_an_registration->A9monthINHOUSE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_A9monthINHOUSE" class="patient_an_registration_A9monthINHOUSE">
<span<?php echo $patient_an_registration->A9monthINHOUSE->viewAttributes() ?>>
<?php echo $patient_an_registration->A9monthINHOUSE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->A9monthREPORT->Visible) { // A9monthREPORT ?>
		<td data-name="A9monthREPORT"<?php echo $patient_an_registration->A9monthREPORT->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_A9monthREPORT" class="patient_an_registration_A9monthREPORT">
<span<?php echo $patient_an_registration->A9monthREPORT->viewAttributes() ?>>
<?php echo $patient_an_registration->A9monthREPORT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->INJ->Visible) { // INJ ?>
		<td data-name="INJ"<?php echo $patient_an_registration->INJ->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_INJ" class="patient_an_registration_INJ">
<span<?php echo $patient_an_registration->INJ->viewAttributes() ?>>
<?php echo $patient_an_registration->INJ->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->INJDATE->Visible) { // INJDATE ?>
		<td data-name="INJDATE"<?php echo $patient_an_registration->INJDATE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_INJDATE" class="patient_an_registration_INJDATE">
<span<?php echo $patient_an_registration->INJDATE->viewAttributes() ?>>
<?php echo $patient_an_registration->INJDATE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->INJINHOUSE->Visible) { // INJINHOUSE ?>
		<td data-name="INJINHOUSE"<?php echo $patient_an_registration->INJINHOUSE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_INJINHOUSE" class="patient_an_registration_INJINHOUSE">
<span<?php echo $patient_an_registration->INJINHOUSE->viewAttributes() ?>>
<?php echo $patient_an_registration->INJINHOUSE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->INJREPORT->Visible) { // INJREPORT ?>
		<td data-name="INJREPORT"<?php echo $patient_an_registration->INJREPORT->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_INJREPORT" class="patient_an_registration_INJREPORT">
<span<?php echo $patient_an_registration->INJREPORT->viewAttributes() ?>>
<?php echo $patient_an_registration->INJREPORT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Bleeding->Visible) { // Bleeding ?>
		<td data-name="Bleeding"<?php echo $patient_an_registration->Bleeding->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_Bleeding" class="patient_an_registration_Bleeding">
<span<?php echo $patient_an_registration->Bleeding->viewAttributes() ?>>
<?php echo $patient_an_registration->Bleeding->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Hypothyroidism->Visible) { // Hypothyroidism ?>
		<td data-name="Hypothyroidism"<?php echo $patient_an_registration->Hypothyroidism->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_Hypothyroidism" class="patient_an_registration_Hypothyroidism">
<span<?php echo $patient_an_registration->Hypothyroidism->viewAttributes() ?>>
<?php echo $patient_an_registration->Hypothyroidism->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->PICMENumber->Visible) { // PICMENumber ?>
		<td data-name="PICMENumber"<?php echo $patient_an_registration->PICMENumber->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_PICMENumber" class="patient_an_registration_PICMENumber">
<span<?php echo $patient_an_registration->PICMENumber->viewAttributes() ?>>
<?php echo $patient_an_registration->PICMENumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Outcome->Visible) { // Outcome ?>
		<td data-name="Outcome"<?php echo $patient_an_registration->Outcome->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_Outcome" class="patient_an_registration_Outcome">
<span<?php echo $patient_an_registration->Outcome->viewAttributes() ?>>
<?php echo $patient_an_registration->Outcome->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->DateofAdmission->Visible) { // DateofAdmission ?>
		<td data-name="DateofAdmission"<?php echo $patient_an_registration->DateofAdmission->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_DateofAdmission" class="patient_an_registration_DateofAdmission">
<span<?php echo $patient_an_registration->DateofAdmission->viewAttributes() ?>>
<?php echo $patient_an_registration->DateofAdmission->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->DateodProcedure->Visible) { // DateodProcedure ?>
		<td data-name="DateodProcedure"<?php echo $patient_an_registration->DateodProcedure->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_DateodProcedure" class="patient_an_registration_DateodProcedure">
<span<?php echo $patient_an_registration->DateodProcedure->viewAttributes() ?>>
<?php echo $patient_an_registration->DateodProcedure->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Miscarriage->Visible) { // Miscarriage ?>
		<td data-name="Miscarriage"<?php echo $patient_an_registration->Miscarriage->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_Miscarriage" class="patient_an_registration_Miscarriage">
<span<?php echo $patient_an_registration->Miscarriage->viewAttributes() ?>>
<?php echo $patient_an_registration->Miscarriage->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->ModeOfDelivery->Visible) { // ModeOfDelivery ?>
		<td data-name="ModeOfDelivery"<?php echo $patient_an_registration->ModeOfDelivery->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_ModeOfDelivery" class="patient_an_registration_ModeOfDelivery">
<span<?php echo $patient_an_registration->ModeOfDelivery->viewAttributes() ?>>
<?php echo $patient_an_registration->ModeOfDelivery->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->ND->Visible) { // ND ?>
		<td data-name="ND"<?php echo $patient_an_registration->ND->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_ND" class="patient_an_registration_ND">
<span<?php echo $patient_an_registration->ND->viewAttributes() ?>>
<?php echo $patient_an_registration->ND->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->NDS->Visible) { // NDS ?>
		<td data-name="NDS"<?php echo $patient_an_registration->NDS->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_NDS" class="patient_an_registration_NDS">
<span<?php echo $patient_an_registration->NDS->viewAttributes() ?>>
<?php echo $patient_an_registration->NDS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->NDP->Visible) { // NDP ?>
		<td data-name="NDP"<?php echo $patient_an_registration->NDP->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_NDP" class="patient_an_registration_NDP">
<span<?php echo $patient_an_registration->NDP->viewAttributes() ?>>
<?php echo $patient_an_registration->NDP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Vaccum->Visible) { // Vaccum ?>
		<td data-name="Vaccum"<?php echo $patient_an_registration->Vaccum->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_Vaccum" class="patient_an_registration_Vaccum">
<span<?php echo $patient_an_registration->Vaccum->viewAttributes() ?>>
<?php echo $patient_an_registration->Vaccum->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->VaccumS->Visible) { // VaccumS ?>
		<td data-name="VaccumS"<?php echo $patient_an_registration->VaccumS->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_VaccumS" class="patient_an_registration_VaccumS">
<span<?php echo $patient_an_registration->VaccumS->viewAttributes() ?>>
<?php echo $patient_an_registration->VaccumS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->VaccumP->Visible) { // VaccumP ?>
		<td data-name="VaccumP"<?php echo $patient_an_registration->VaccumP->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_VaccumP" class="patient_an_registration_VaccumP">
<span<?php echo $patient_an_registration->VaccumP->viewAttributes() ?>>
<?php echo $patient_an_registration->VaccumP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Forceps->Visible) { // Forceps ?>
		<td data-name="Forceps"<?php echo $patient_an_registration->Forceps->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_Forceps" class="patient_an_registration_Forceps">
<span<?php echo $patient_an_registration->Forceps->viewAttributes() ?>>
<?php echo $patient_an_registration->Forceps->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->ForcepsS->Visible) { // ForcepsS ?>
		<td data-name="ForcepsS"<?php echo $patient_an_registration->ForcepsS->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_ForcepsS" class="patient_an_registration_ForcepsS">
<span<?php echo $patient_an_registration->ForcepsS->viewAttributes() ?>>
<?php echo $patient_an_registration->ForcepsS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->ForcepsP->Visible) { // ForcepsP ?>
		<td data-name="ForcepsP"<?php echo $patient_an_registration->ForcepsP->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_ForcepsP" class="patient_an_registration_ForcepsP">
<span<?php echo $patient_an_registration->ForcepsP->viewAttributes() ?>>
<?php echo $patient_an_registration->ForcepsP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Elective->Visible) { // Elective ?>
		<td data-name="Elective"<?php echo $patient_an_registration->Elective->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_Elective" class="patient_an_registration_Elective">
<span<?php echo $patient_an_registration->Elective->viewAttributes() ?>>
<?php echo $patient_an_registration->Elective->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->ElectiveS->Visible) { // ElectiveS ?>
		<td data-name="ElectiveS"<?php echo $patient_an_registration->ElectiveS->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_ElectiveS" class="patient_an_registration_ElectiveS">
<span<?php echo $patient_an_registration->ElectiveS->viewAttributes() ?>>
<?php echo $patient_an_registration->ElectiveS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->ElectiveP->Visible) { // ElectiveP ?>
		<td data-name="ElectiveP"<?php echo $patient_an_registration->ElectiveP->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_ElectiveP" class="patient_an_registration_ElectiveP">
<span<?php echo $patient_an_registration->ElectiveP->viewAttributes() ?>>
<?php echo $patient_an_registration->ElectiveP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Emergency->Visible) { // Emergency ?>
		<td data-name="Emergency"<?php echo $patient_an_registration->Emergency->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_Emergency" class="patient_an_registration_Emergency">
<span<?php echo $patient_an_registration->Emergency->viewAttributes() ?>>
<?php echo $patient_an_registration->Emergency->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->EmergencyS->Visible) { // EmergencyS ?>
		<td data-name="EmergencyS"<?php echo $patient_an_registration->EmergencyS->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_EmergencyS" class="patient_an_registration_EmergencyS">
<span<?php echo $patient_an_registration->EmergencyS->viewAttributes() ?>>
<?php echo $patient_an_registration->EmergencyS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->EmergencyP->Visible) { // EmergencyP ?>
		<td data-name="EmergencyP"<?php echo $patient_an_registration->EmergencyP->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_EmergencyP" class="patient_an_registration_EmergencyP">
<span<?php echo $patient_an_registration->EmergencyP->viewAttributes() ?>>
<?php echo $patient_an_registration->EmergencyP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Maturity->Visible) { // Maturity ?>
		<td data-name="Maturity"<?php echo $patient_an_registration->Maturity->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_Maturity" class="patient_an_registration_Maturity">
<span<?php echo $patient_an_registration->Maturity->viewAttributes() ?>>
<?php echo $patient_an_registration->Maturity->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Baby1->Visible) { // Baby1 ?>
		<td data-name="Baby1"<?php echo $patient_an_registration->Baby1->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_Baby1" class="patient_an_registration_Baby1">
<span<?php echo $patient_an_registration->Baby1->viewAttributes() ?>>
<?php echo $patient_an_registration->Baby1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Baby2->Visible) { // Baby2 ?>
		<td data-name="Baby2"<?php echo $patient_an_registration->Baby2->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_Baby2" class="patient_an_registration_Baby2">
<span<?php echo $patient_an_registration->Baby2->viewAttributes() ?>>
<?php echo $patient_an_registration->Baby2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->sex1->Visible) { // sex1 ?>
		<td data-name="sex1"<?php echo $patient_an_registration->sex1->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_sex1" class="patient_an_registration_sex1">
<span<?php echo $patient_an_registration->sex1->viewAttributes() ?>>
<?php echo $patient_an_registration->sex1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->sex2->Visible) { // sex2 ?>
		<td data-name="sex2"<?php echo $patient_an_registration->sex2->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_sex2" class="patient_an_registration_sex2">
<span<?php echo $patient_an_registration->sex2->viewAttributes() ?>>
<?php echo $patient_an_registration->sex2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->weight1->Visible) { // weight1 ?>
		<td data-name="weight1"<?php echo $patient_an_registration->weight1->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_weight1" class="patient_an_registration_weight1">
<span<?php echo $patient_an_registration->weight1->viewAttributes() ?>>
<?php echo $patient_an_registration->weight1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->weight2->Visible) { // weight2 ?>
		<td data-name="weight2"<?php echo $patient_an_registration->weight2->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_weight2" class="patient_an_registration_weight2">
<span<?php echo $patient_an_registration->weight2->viewAttributes() ?>>
<?php echo $patient_an_registration->weight2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->NICU1->Visible) { // NICU1 ?>
		<td data-name="NICU1"<?php echo $patient_an_registration->NICU1->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_NICU1" class="patient_an_registration_NICU1">
<span<?php echo $patient_an_registration->NICU1->viewAttributes() ?>>
<?php echo $patient_an_registration->NICU1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->NICU2->Visible) { // NICU2 ?>
		<td data-name="NICU2"<?php echo $patient_an_registration->NICU2->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_NICU2" class="patient_an_registration_NICU2">
<span<?php echo $patient_an_registration->NICU2->viewAttributes() ?>>
<?php echo $patient_an_registration->NICU2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Jaundice1->Visible) { // Jaundice1 ?>
		<td data-name="Jaundice1"<?php echo $patient_an_registration->Jaundice1->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_Jaundice1" class="patient_an_registration_Jaundice1">
<span<?php echo $patient_an_registration->Jaundice1->viewAttributes() ?>>
<?php echo $patient_an_registration->Jaundice1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Jaundice2->Visible) { // Jaundice2 ?>
		<td data-name="Jaundice2"<?php echo $patient_an_registration->Jaundice2->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_Jaundice2" class="patient_an_registration_Jaundice2">
<span<?php echo $patient_an_registration->Jaundice2->viewAttributes() ?>>
<?php echo $patient_an_registration->Jaundice2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Others1->Visible) { // Others1 ?>
		<td data-name="Others1"<?php echo $patient_an_registration->Others1->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_Others1" class="patient_an_registration_Others1">
<span<?php echo $patient_an_registration->Others1->viewAttributes() ?>>
<?php echo $patient_an_registration->Others1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->Others2->Visible) { // Others2 ?>
		<td data-name="Others2"<?php echo $patient_an_registration->Others2->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_Others2" class="patient_an_registration_Others2">
<span<?php echo $patient_an_registration->Others2->viewAttributes() ?>>
<?php echo $patient_an_registration->Others2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->SpillOverReasons->Visible) { // SpillOverReasons ?>
		<td data-name="SpillOverReasons"<?php echo $patient_an_registration->SpillOverReasons->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_SpillOverReasons" class="patient_an_registration_SpillOverReasons">
<span<?php echo $patient_an_registration->SpillOverReasons->viewAttributes() ?>>
<?php echo $patient_an_registration->SpillOverReasons->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->ANClosed->Visible) { // ANClosed ?>
		<td data-name="ANClosed"<?php echo $patient_an_registration->ANClosed->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_ANClosed" class="patient_an_registration_ANClosed">
<span<?php echo $patient_an_registration->ANClosed->viewAttributes() ?>>
<?php echo $patient_an_registration->ANClosed->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->ANClosedDATE->Visible) { // ANClosedDATE ?>
		<td data-name="ANClosedDATE"<?php echo $patient_an_registration->ANClosedDATE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_ANClosedDATE" class="patient_an_registration_ANClosedDATE">
<span<?php echo $patient_an_registration->ANClosedDATE->viewAttributes() ?>>
<?php echo $patient_an_registration->ANClosedDATE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->PastMedicalHistoryOthers->Visible) { // PastMedicalHistoryOthers ?>
		<td data-name="PastMedicalHistoryOthers"<?php echo $patient_an_registration->PastMedicalHistoryOthers->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_PastMedicalHistoryOthers" class="patient_an_registration_PastMedicalHistoryOthers">
<span<?php echo $patient_an_registration->PastMedicalHistoryOthers->viewAttributes() ?>>
<?php echo $patient_an_registration->PastMedicalHistoryOthers->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->PastSurgicalHistoryOthers->Visible) { // PastSurgicalHistoryOthers ?>
		<td data-name="PastSurgicalHistoryOthers"<?php echo $patient_an_registration->PastSurgicalHistoryOthers->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_PastSurgicalHistoryOthers" class="patient_an_registration_PastSurgicalHistoryOthers">
<span<?php echo $patient_an_registration->PastSurgicalHistoryOthers->viewAttributes() ?>>
<?php echo $patient_an_registration->PastSurgicalHistoryOthers->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->FamilyHistoryOthers->Visible) { // FamilyHistoryOthers ?>
		<td data-name="FamilyHistoryOthers"<?php echo $patient_an_registration->FamilyHistoryOthers->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_FamilyHistoryOthers" class="patient_an_registration_FamilyHistoryOthers">
<span<?php echo $patient_an_registration->FamilyHistoryOthers->viewAttributes() ?>>
<?php echo $patient_an_registration->FamilyHistoryOthers->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->PresentPregnancyComplicationsOthers->Visible) { // PresentPregnancyComplicationsOthers ?>
		<td data-name="PresentPregnancyComplicationsOthers"<?php echo $patient_an_registration->PresentPregnancyComplicationsOthers->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_PresentPregnancyComplicationsOthers" class="patient_an_registration_PresentPregnancyComplicationsOthers">
<span<?php echo $patient_an_registration->PresentPregnancyComplicationsOthers->viewAttributes() ?>>
<?php echo $patient_an_registration->PresentPregnancyComplicationsOthers->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration->ETdate->Visible) { // ETdate ?>
		<td data-name="ETdate"<?php echo $patient_an_registration->ETdate->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCnt ?>_patient_an_registration_ETdate" class="patient_an_registration_ETdate">
<span<?php echo $patient_an_registration->ETdate->viewAttributes() ?>>
<?php echo $patient_an_registration->ETdate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_an_registration_list->ListOptions->render("body", "right", $patient_an_registration_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$patient_an_registration->isGridAdd())
		$patient_an_registration_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$patient_an_registration->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($patient_an_registration_list->Recordset)
	$patient_an_registration_list->Recordset->Close();
?>
<?php if (!$patient_an_registration->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$patient_an_registration->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($patient_an_registration_list->Pager)) $patient_an_registration_list->Pager = new NumericPager($patient_an_registration_list->StartRec, $patient_an_registration_list->DisplayRecs, $patient_an_registration_list->TotalRecs, $patient_an_registration_list->RecRange, $patient_an_registration_list->AutoHidePager) ?>
<?php if ($patient_an_registration_list->Pager->RecordCount > 0 && $patient_an_registration_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($patient_an_registration_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_an_registration_list->pageUrl() ?>start=<?php echo $patient_an_registration_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($patient_an_registration_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_an_registration_list->pageUrl() ?>start=<?php echo $patient_an_registration_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($patient_an_registration_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $patient_an_registration_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($patient_an_registration_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_an_registration_list->pageUrl() ?>start=<?php echo $patient_an_registration_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($patient_an_registration_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $patient_an_registration_list->pageUrl() ?>start=<?php echo $patient_an_registration_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($patient_an_registration_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $patient_an_registration_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $patient_an_registration_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $patient_an_registration_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($patient_an_registration_list->TotalRecs > 0 && (!$patient_an_registration_list->AutoHidePageSizeSelector || $patient_an_registration_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="patient_an_registration">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($patient_an_registration_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($patient_an_registration_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($patient_an_registration_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($patient_an_registration_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($patient_an_registration_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($patient_an_registration_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($patient_an_registration->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $patient_an_registration_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($patient_an_registration_list->TotalRecs == 0 && !$patient_an_registration->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $patient_an_registration_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$patient_an_registration_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$patient_an_registration->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$patient_an_registration->isExport()) { ?>
<script>
ew.scrollableTable("gmp_patient_an_registration", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$patient_an_registration_list->terminate();
?>