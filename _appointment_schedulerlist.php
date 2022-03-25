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
$_appointment_scheduler_list = new _appointment_scheduler_list();

// Run the page
$_appointment_scheduler_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$_appointment_scheduler_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$_appointment_scheduler->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var f_appointment_schedulerlist = currentForm = new ew.Form("f_appointment_schedulerlist", "list");
f_appointment_schedulerlist.formKeyCountName = '<?php echo $_appointment_scheduler_list->FormKeyCountName ?>';

// Form_CustomValidate event
f_appointment_schedulerlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
f_appointment_schedulerlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
f_appointment_schedulerlist.lists["x_patientID"] = <?php echo $_appointment_scheduler_list->patientID->Lookup->toClientList() ?>;
f_appointment_schedulerlist.lists["x_patientID"].options = <?php echo JsonEncode($_appointment_scheduler_list->patientID->lookupOptions()) ?>;
f_appointment_schedulerlist.lists["x_DoctorName"] = <?php echo $_appointment_scheduler_list->DoctorName->Lookup->toClientList() ?>;
f_appointment_schedulerlist.lists["x_DoctorName"].options = <?php echo JsonEncode($_appointment_scheduler_list->DoctorName->lookupOptions()) ?>;
f_appointment_schedulerlist.lists["x_status[]"] = <?php echo $_appointment_scheduler_list->status->Lookup->toClientList() ?>;
f_appointment_schedulerlist.lists["x_status[]"].options = <?php echo JsonEncode($_appointment_scheduler_list->status->options(FALSE, TRUE)) ?>;
f_appointment_schedulerlist.lists["x_appointment_type"] = <?php echo $_appointment_scheduler_list->appointment_type->Lookup->toClientList() ?>;
f_appointment_schedulerlist.lists["x_appointment_type"].options = <?php echo JsonEncode($_appointment_scheduler_list->appointment_type->options(FALSE, TRUE)) ?>;
f_appointment_schedulerlist.lists["x_Notified[]"] = <?php echo $_appointment_scheduler_list->Notified->Lookup->toClientList() ?>;
f_appointment_schedulerlist.lists["x_Notified[]"].options = <?php echo JsonEncode($_appointment_scheduler_list->Notified->options(FALSE, TRUE)) ?>;
f_appointment_schedulerlist.lists["x_PatientType"] = <?php echo $_appointment_scheduler_list->PatientType->Lookup->toClientList() ?>;
f_appointment_schedulerlist.lists["x_PatientType"].options = <?php echo JsonEncode($_appointment_scheduler_list->PatientType->options(FALSE, TRUE)) ?>;
f_appointment_schedulerlist.lists["x_Referal"] = <?php echo $_appointment_scheduler_list->Referal->Lookup->toClientList() ?>;
f_appointment_schedulerlist.lists["x_Referal"].options = <?php echo JsonEncode($_appointment_scheduler_list->Referal->lookupOptions()) ?>;
f_appointment_schedulerlist.lists["x_WhereDidYouHear[]"] = <?php echo $_appointment_scheduler_list->WhereDidYouHear->Lookup->toClientList() ?>;
f_appointment_schedulerlist.lists["x_WhereDidYouHear[]"].options = <?php echo JsonEncode($_appointment_scheduler_list->WhereDidYouHear->lookupOptions()) ?>;
f_appointment_schedulerlist.lists["x_PatientTypee"] = <?php echo $_appointment_scheduler_list->PatientTypee->Lookup->toClientList() ?>;
f_appointment_schedulerlist.lists["x_PatientTypee"].options = <?php echo JsonEncode($_appointment_scheduler_list->PatientTypee->lookupOptions()) ?>;

// Form object for search
var f_appointment_schedulerlistsrch = currentSearchForm = new ew.Form("f_appointment_schedulerlistsrch");

// Filters
f_appointment_schedulerlistsrch.filterList = <?php echo $_appointment_scheduler_list->getFilterList() ?>;
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
<?php if (!$_appointment_scheduler->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($_appointment_scheduler_list->TotalRecs > 0 && $_appointment_scheduler_list->ExportOptions->visible()) { ?>
<?php $_appointment_scheduler_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($_appointment_scheduler_list->ImportOptions->visible()) { ?>
<?php $_appointment_scheduler_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($_appointment_scheduler_list->SearchOptions->visible()) { ?>
<?php $_appointment_scheduler_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($_appointment_scheduler_list->FilterOptions->visible()) { ?>
<?php $_appointment_scheduler_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$_appointment_scheduler->isExport() || EXPORT_MASTER_RECORD && $_appointment_scheduler->isExport("print")) { ?>
<?php
if ($_appointment_scheduler_list->DbMasterFilter <> "" && $_appointment_scheduler->getCurrentMasterTable() == "doctors") {
	if ($_appointment_scheduler_list->MasterRecordExists) {
		include_once "doctorsmaster.php";
	}
}
?>
<?php } ?>
<?php
$_appointment_scheduler_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$_appointment_scheduler->isExport() && !$_appointment_scheduler->CurrentAction) { ?>
<form name="f_appointment_schedulerlistsrch" id="f_appointment_schedulerlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($_appointment_scheduler_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="f_appointment_schedulerlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="_appointment_scheduler">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($_appointment_scheduler_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($_appointment_scheduler_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $_appointment_scheduler_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($_appointment_scheduler_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($_appointment_scheduler_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($_appointment_scheduler_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($_appointment_scheduler_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $_appointment_scheduler_list->showPageHeader(); ?>
<?php
$_appointment_scheduler_list->showMessage();
?>
<?php if ($_appointment_scheduler_list->TotalRecs > 0 || $_appointment_scheduler->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($_appointment_scheduler_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> _appointment_scheduler">
<?php if (!$_appointment_scheduler->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$_appointment_scheduler->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($_appointment_scheduler_list->Pager)) $_appointment_scheduler_list->Pager = new NumericPager($_appointment_scheduler_list->StartRec, $_appointment_scheduler_list->DisplayRecs, $_appointment_scheduler_list->TotalRecs, $_appointment_scheduler_list->RecRange, $_appointment_scheduler_list->AutoHidePager) ?>
<?php if ($_appointment_scheduler_list->Pager->RecordCount > 0 && $_appointment_scheduler_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($_appointment_scheduler_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $_appointment_scheduler_list->pageUrl() ?>start=<?php echo $_appointment_scheduler_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($_appointment_scheduler_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $_appointment_scheduler_list->pageUrl() ?>start=<?php echo $_appointment_scheduler_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($_appointment_scheduler_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $_appointment_scheduler_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($_appointment_scheduler_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $_appointment_scheduler_list->pageUrl() ?>start=<?php echo $_appointment_scheduler_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($_appointment_scheduler_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $_appointment_scheduler_list->pageUrl() ?>start=<?php echo $_appointment_scheduler_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($_appointment_scheduler_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $_appointment_scheduler_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $_appointment_scheduler_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $_appointment_scheduler_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($_appointment_scheduler_list->TotalRecs > 0 && (!$_appointment_scheduler_list->AutoHidePageSizeSelector || $_appointment_scheduler_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="_appointment_scheduler">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($_appointment_scheduler_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($_appointment_scheduler_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($_appointment_scheduler_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($_appointment_scheduler_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($_appointment_scheduler_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($_appointment_scheduler_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($_appointment_scheduler->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $_appointment_scheduler_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="f_appointment_schedulerlist" id="f_appointment_schedulerlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($_appointment_scheduler_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $_appointment_scheduler_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="_appointment_scheduler">
<?php if ($_appointment_scheduler->getCurrentMasterTable() == "doctors" && $_appointment_scheduler->CurrentAction) { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="doctors">
<input type="hidden" name="fk_id" value="<?php echo $_appointment_scheduler->DoctorID->getSessionValue() ?>">
<?php } ?>
<div id="gmp__appointment_scheduler" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($_appointment_scheduler_list->TotalRecs > 0 || $_appointment_scheduler->isGridEdit()) { ?>
<table id="tbl__appointment_schedulerlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$_appointment_scheduler_list->RowType = ROWTYPE_HEADER;

// Render list options
$_appointment_scheduler_list->renderListOptions();

// Render list options (header, left)
$_appointment_scheduler_list->ListOptions->render("header", "left");
?>
<?php if ($_appointment_scheduler->id->Visible) { // id ?>
	<?php if ($_appointment_scheduler->sortUrl($_appointment_scheduler->id) == "") { ?>
		<th data-name="id" class="<?php echo $_appointment_scheduler->id->headerCellClass() ?>"><div id="elh__appointment_scheduler_id" class="_appointment_scheduler_id"><div class="ew-table-header-caption"><?php echo $_appointment_scheduler->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $_appointment_scheduler->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $_appointment_scheduler->SortUrl($_appointment_scheduler->id) ?>',1);"><div id="elh__appointment_scheduler_id" class="_appointment_scheduler_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_appointment_scheduler->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($_appointment_scheduler->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_appointment_scheduler->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->start_date->Visible) { // start_date ?>
	<?php if ($_appointment_scheduler->sortUrl($_appointment_scheduler->start_date) == "") { ?>
		<th data-name="start_date" class="<?php echo $_appointment_scheduler->start_date->headerCellClass() ?>"><div id="elh__appointment_scheduler_start_date" class="_appointment_scheduler_start_date"><div class="ew-table-header-caption"><?php echo $_appointment_scheduler->start_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="start_date" class="<?php echo $_appointment_scheduler->start_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $_appointment_scheduler->SortUrl($_appointment_scheduler->start_date) ?>',1);"><div id="elh__appointment_scheduler_start_date" class="_appointment_scheduler_start_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_appointment_scheduler->start_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($_appointment_scheduler->start_date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_appointment_scheduler->start_date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->end_date->Visible) { // end_date ?>
	<?php if ($_appointment_scheduler->sortUrl($_appointment_scheduler->end_date) == "") { ?>
		<th data-name="end_date" class="<?php echo $_appointment_scheduler->end_date->headerCellClass() ?>"><div id="elh__appointment_scheduler_end_date" class="_appointment_scheduler_end_date"><div class="ew-table-header-caption"><?php echo $_appointment_scheduler->end_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="end_date" class="<?php echo $_appointment_scheduler->end_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $_appointment_scheduler->SortUrl($_appointment_scheduler->end_date) ?>',1);"><div id="elh__appointment_scheduler_end_date" class="_appointment_scheduler_end_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_appointment_scheduler->end_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($_appointment_scheduler->end_date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_appointment_scheduler->end_date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->patientID->Visible) { // patientID ?>
	<?php if ($_appointment_scheduler->sortUrl($_appointment_scheduler->patientID) == "") { ?>
		<th data-name="patientID" class="<?php echo $_appointment_scheduler->patientID->headerCellClass() ?>"><div id="elh__appointment_scheduler_patientID" class="_appointment_scheduler_patientID"><div class="ew-table-header-caption"><?php echo $_appointment_scheduler->patientID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patientID" class="<?php echo $_appointment_scheduler->patientID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $_appointment_scheduler->SortUrl($_appointment_scheduler->patientID) ?>',1);"><div id="elh__appointment_scheduler_patientID" class="_appointment_scheduler_patientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_appointment_scheduler->patientID->caption() ?></span><span class="ew-table-header-sort"><?php if ($_appointment_scheduler->patientID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_appointment_scheduler->patientID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->patientName->Visible) { // patientName ?>
	<?php if ($_appointment_scheduler->sortUrl($_appointment_scheduler->patientName) == "") { ?>
		<th data-name="patientName" class="<?php echo $_appointment_scheduler->patientName->headerCellClass() ?>"><div id="elh__appointment_scheduler_patientName" class="_appointment_scheduler_patientName"><div class="ew-table-header-caption"><?php echo $_appointment_scheduler->patientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patientName" class="<?php echo $_appointment_scheduler->patientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $_appointment_scheduler->SortUrl($_appointment_scheduler->patientName) ?>',1);"><div id="elh__appointment_scheduler_patientName" class="_appointment_scheduler_patientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_appointment_scheduler->patientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_appointment_scheduler->patientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_appointment_scheduler->patientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->DoctorID->Visible) { // DoctorID ?>
	<?php if ($_appointment_scheduler->sortUrl($_appointment_scheduler->DoctorID) == "") { ?>
		<th data-name="DoctorID" class="<?php echo $_appointment_scheduler->DoctorID->headerCellClass() ?>"><div id="elh__appointment_scheduler_DoctorID" class="_appointment_scheduler_DoctorID"><div class="ew-table-header-caption"><?php echo $_appointment_scheduler->DoctorID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DoctorID" class="<?php echo $_appointment_scheduler->DoctorID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $_appointment_scheduler->SortUrl($_appointment_scheduler->DoctorID) ?>',1);"><div id="elh__appointment_scheduler_DoctorID" class="_appointment_scheduler_DoctorID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_appointment_scheduler->DoctorID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_appointment_scheduler->DoctorID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_appointment_scheduler->DoctorID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->DoctorName->Visible) { // DoctorName ?>
	<?php if ($_appointment_scheduler->sortUrl($_appointment_scheduler->DoctorName) == "") { ?>
		<th data-name="DoctorName" class="<?php echo $_appointment_scheduler->DoctorName->headerCellClass() ?>"><div id="elh__appointment_scheduler_DoctorName" class="_appointment_scheduler_DoctorName"><div class="ew-table-header-caption"><?php echo $_appointment_scheduler->DoctorName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DoctorName" class="<?php echo $_appointment_scheduler->DoctorName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $_appointment_scheduler->SortUrl($_appointment_scheduler->DoctorName) ?>',1);"><div id="elh__appointment_scheduler_DoctorName" class="_appointment_scheduler_DoctorName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_appointment_scheduler->DoctorName->caption() ?></span><span class="ew-table-header-sort"><?php if ($_appointment_scheduler->DoctorName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_appointment_scheduler->DoctorName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->AppointmentStatus->Visible) { // AppointmentStatus ?>
	<?php if ($_appointment_scheduler->sortUrl($_appointment_scheduler->AppointmentStatus) == "") { ?>
		<th data-name="AppointmentStatus" class="<?php echo $_appointment_scheduler->AppointmentStatus->headerCellClass() ?>"><div id="elh__appointment_scheduler_AppointmentStatus" class="_appointment_scheduler_AppointmentStatus"><div class="ew-table-header-caption"><?php echo $_appointment_scheduler->AppointmentStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AppointmentStatus" class="<?php echo $_appointment_scheduler->AppointmentStatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $_appointment_scheduler->SortUrl($_appointment_scheduler->AppointmentStatus) ?>',1);"><div id="elh__appointment_scheduler_AppointmentStatus" class="_appointment_scheduler_AppointmentStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_appointment_scheduler->AppointmentStatus->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_appointment_scheduler->AppointmentStatus->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_appointment_scheduler->AppointmentStatus->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->status->Visible) { // status ?>
	<?php if ($_appointment_scheduler->sortUrl($_appointment_scheduler->status) == "") { ?>
		<th data-name="status" class="<?php echo $_appointment_scheduler->status->headerCellClass() ?>"><div id="elh__appointment_scheduler_status" class="_appointment_scheduler_status"><div class="ew-table-header-caption"><?php echo $_appointment_scheduler->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $_appointment_scheduler->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $_appointment_scheduler->SortUrl($_appointment_scheduler->status) ?>',1);"><div id="elh__appointment_scheduler_status" class="_appointment_scheduler_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_appointment_scheduler->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($_appointment_scheduler->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_appointment_scheduler->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->DoctorCode->Visible) { // DoctorCode ?>
	<?php if ($_appointment_scheduler->sortUrl($_appointment_scheduler->DoctorCode) == "") { ?>
		<th data-name="DoctorCode" class="<?php echo $_appointment_scheduler->DoctorCode->headerCellClass() ?>"><div id="elh__appointment_scheduler_DoctorCode" class="_appointment_scheduler_DoctorCode"><div class="ew-table-header-caption"><?php echo $_appointment_scheduler->DoctorCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DoctorCode" class="<?php echo $_appointment_scheduler->DoctorCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $_appointment_scheduler->SortUrl($_appointment_scheduler->DoctorCode) ?>',1);"><div id="elh__appointment_scheduler_DoctorCode" class="_appointment_scheduler_DoctorCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_appointment_scheduler->DoctorCode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_appointment_scheduler->DoctorCode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_appointment_scheduler->DoctorCode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->Department->Visible) { // Department ?>
	<?php if ($_appointment_scheduler->sortUrl($_appointment_scheduler->Department) == "") { ?>
		<th data-name="Department" class="<?php echo $_appointment_scheduler->Department->headerCellClass() ?>"><div id="elh__appointment_scheduler_Department" class="_appointment_scheduler_Department"><div class="ew-table-header-caption"><?php echo $_appointment_scheduler->Department->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Department" class="<?php echo $_appointment_scheduler->Department->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $_appointment_scheduler->SortUrl($_appointment_scheduler->Department) ?>',1);"><div id="elh__appointment_scheduler_Department" class="_appointment_scheduler_Department">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_appointment_scheduler->Department->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_appointment_scheduler->Department->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_appointment_scheduler->Department->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->scheduler_id->Visible) { // scheduler_id ?>
	<?php if ($_appointment_scheduler->sortUrl($_appointment_scheduler->scheduler_id) == "") { ?>
		<th data-name="scheduler_id" class="<?php echo $_appointment_scheduler->scheduler_id->headerCellClass() ?>"><div id="elh__appointment_scheduler_scheduler_id" class="_appointment_scheduler_scheduler_id"><div class="ew-table-header-caption"><?php echo $_appointment_scheduler->scheduler_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="scheduler_id" class="<?php echo $_appointment_scheduler->scheduler_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $_appointment_scheduler->SortUrl($_appointment_scheduler->scheduler_id) ?>',1);"><div id="elh__appointment_scheduler_scheduler_id" class="_appointment_scheduler_scheduler_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_appointment_scheduler->scheduler_id->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_appointment_scheduler->scheduler_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_appointment_scheduler->scheduler_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->text->Visible) { // text ?>
	<?php if ($_appointment_scheduler->sortUrl($_appointment_scheduler->text) == "") { ?>
		<th data-name="text" class="<?php echo $_appointment_scheduler->text->headerCellClass() ?>"><div id="elh__appointment_scheduler_text" class="_appointment_scheduler_text"><div class="ew-table-header-caption"><?php echo $_appointment_scheduler->text->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="text" class="<?php echo $_appointment_scheduler->text->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $_appointment_scheduler->SortUrl($_appointment_scheduler->text) ?>',1);"><div id="elh__appointment_scheduler_text" class="_appointment_scheduler_text">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_appointment_scheduler->text->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_appointment_scheduler->text->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_appointment_scheduler->text->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->appointment_status->Visible) { // appointment_status ?>
	<?php if ($_appointment_scheduler->sortUrl($_appointment_scheduler->appointment_status) == "") { ?>
		<th data-name="appointment_status" class="<?php echo $_appointment_scheduler->appointment_status->headerCellClass() ?>"><div id="elh__appointment_scheduler_appointment_status" class="_appointment_scheduler_appointment_status"><div class="ew-table-header-caption"><?php echo $_appointment_scheduler->appointment_status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="appointment_status" class="<?php echo $_appointment_scheduler->appointment_status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $_appointment_scheduler->SortUrl($_appointment_scheduler->appointment_status) ?>',1);"><div id="elh__appointment_scheduler_appointment_status" class="_appointment_scheduler_appointment_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_appointment_scheduler->appointment_status->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_appointment_scheduler->appointment_status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_appointment_scheduler->appointment_status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->PId->Visible) { // PId ?>
	<?php if ($_appointment_scheduler->sortUrl($_appointment_scheduler->PId) == "") { ?>
		<th data-name="PId" class="<?php echo $_appointment_scheduler->PId->headerCellClass() ?>"><div id="elh__appointment_scheduler_PId" class="_appointment_scheduler_PId"><div class="ew-table-header-caption"><?php echo $_appointment_scheduler->PId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PId" class="<?php echo $_appointment_scheduler->PId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $_appointment_scheduler->SortUrl($_appointment_scheduler->PId) ?>',1);"><div id="elh__appointment_scheduler_PId" class="_appointment_scheduler_PId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_appointment_scheduler->PId->caption() ?></span><span class="ew-table-header-sort"><?php if ($_appointment_scheduler->PId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_appointment_scheduler->PId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->MobileNumber->Visible) { // MobileNumber ?>
	<?php if ($_appointment_scheduler->sortUrl($_appointment_scheduler->MobileNumber) == "") { ?>
		<th data-name="MobileNumber" class="<?php echo $_appointment_scheduler->MobileNumber->headerCellClass() ?>"><div id="elh__appointment_scheduler_MobileNumber" class="_appointment_scheduler_MobileNumber"><div class="ew-table-header-caption"><?php echo $_appointment_scheduler->MobileNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MobileNumber" class="<?php echo $_appointment_scheduler->MobileNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $_appointment_scheduler->SortUrl($_appointment_scheduler->MobileNumber) ?>',1);"><div id="elh__appointment_scheduler_MobileNumber" class="_appointment_scheduler_MobileNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_appointment_scheduler->MobileNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_appointment_scheduler->MobileNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_appointment_scheduler->MobileNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->SchEmail->Visible) { // SchEmail ?>
	<?php if ($_appointment_scheduler->sortUrl($_appointment_scheduler->SchEmail) == "") { ?>
		<th data-name="SchEmail" class="<?php echo $_appointment_scheduler->SchEmail->headerCellClass() ?>"><div id="elh__appointment_scheduler_SchEmail" class="_appointment_scheduler_SchEmail"><div class="ew-table-header-caption"><?php echo $_appointment_scheduler->SchEmail->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SchEmail" class="<?php echo $_appointment_scheduler->SchEmail->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $_appointment_scheduler->SortUrl($_appointment_scheduler->SchEmail) ?>',1);"><div id="elh__appointment_scheduler_SchEmail" class="_appointment_scheduler_SchEmail">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_appointment_scheduler->SchEmail->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_appointment_scheduler->SchEmail->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_appointment_scheduler->SchEmail->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->appointment_type->Visible) { // appointment_type ?>
	<?php if ($_appointment_scheduler->sortUrl($_appointment_scheduler->appointment_type) == "") { ?>
		<th data-name="appointment_type" class="<?php echo $_appointment_scheduler->appointment_type->headerCellClass() ?>"><div id="elh__appointment_scheduler_appointment_type" class="_appointment_scheduler_appointment_type"><div class="ew-table-header-caption"><?php echo $_appointment_scheduler->appointment_type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="appointment_type" class="<?php echo $_appointment_scheduler->appointment_type->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $_appointment_scheduler->SortUrl($_appointment_scheduler->appointment_type) ?>',1);"><div id="elh__appointment_scheduler_appointment_type" class="_appointment_scheduler_appointment_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_appointment_scheduler->appointment_type->caption() ?></span><span class="ew-table-header-sort"><?php if ($_appointment_scheduler->appointment_type->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_appointment_scheduler->appointment_type->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->Notified->Visible) { // Notified ?>
	<?php if ($_appointment_scheduler->sortUrl($_appointment_scheduler->Notified) == "") { ?>
		<th data-name="Notified" class="<?php echo $_appointment_scheduler->Notified->headerCellClass() ?>"><div id="elh__appointment_scheduler_Notified" class="_appointment_scheduler_Notified"><div class="ew-table-header-caption"><?php echo $_appointment_scheduler->Notified->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Notified" class="<?php echo $_appointment_scheduler->Notified->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $_appointment_scheduler->SortUrl($_appointment_scheduler->Notified) ?>',1);"><div id="elh__appointment_scheduler_Notified" class="_appointment_scheduler_Notified">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_appointment_scheduler->Notified->caption() ?></span><span class="ew-table-header-sort"><?php if ($_appointment_scheduler->Notified->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_appointment_scheduler->Notified->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->Purpose->Visible) { // Purpose ?>
	<?php if ($_appointment_scheduler->sortUrl($_appointment_scheduler->Purpose) == "") { ?>
		<th data-name="Purpose" class="<?php echo $_appointment_scheduler->Purpose->headerCellClass() ?>"><div id="elh__appointment_scheduler_Purpose" class="_appointment_scheduler_Purpose"><div class="ew-table-header-caption"><?php echo $_appointment_scheduler->Purpose->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Purpose" class="<?php echo $_appointment_scheduler->Purpose->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $_appointment_scheduler->SortUrl($_appointment_scheduler->Purpose) ?>',1);"><div id="elh__appointment_scheduler_Purpose" class="_appointment_scheduler_Purpose">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_appointment_scheduler->Purpose->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_appointment_scheduler->Purpose->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_appointment_scheduler->Purpose->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->Notes->Visible) { // Notes ?>
	<?php if ($_appointment_scheduler->sortUrl($_appointment_scheduler->Notes) == "") { ?>
		<th data-name="Notes" class="<?php echo $_appointment_scheduler->Notes->headerCellClass() ?>"><div id="elh__appointment_scheduler_Notes" class="_appointment_scheduler_Notes"><div class="ew-table-header-caption"><?php echo $_appointment_scheduler->Notes->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Notes" class="<?php echo $_appointment_scheduler->Notes->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $_appointment_scheduler->SortUrl($_appointment_scheduler->Notes) ?>',1);"><div id="elh__appointment_scheduler_Notes" class="_appointment_scheduler_Notes">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_appointment_scheduler->Notes->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_appointment_scheduler->Notes->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_appointment_scheduler->Notes->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->PatientType->Visible) { // PatientType ?>
	<?php if ($_appointment_scheduler->sortUrl($_appointment_scheduler->PatientType) == "") { ?>
		<th data-name="PatientType" class="<?php echo $_appointment_scheduler->PatientType->headerCellClass() ?>"><div id="elh__appointment_scheduler_PatientType" class="_appointment_scheduler_PatientType"><div class="ew-table-header-caption"><?php echo $_appointment_scheduler->PatientType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientType" class="<?php echo $_appointment_scheduler->PatientType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $_appointment_scheduler->SortUrl($_appointment_scheduler->PatientType) ?>',1);"><div id="elh__appointment_scheduler_PatientType" class="_appointment_scheduler_PatientType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_appointment_scheduler->PatientType->caption() ?></span><span class="ew-table-header-sort"><?php if ($_appointment_scheduler->PatientType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_appointment_scheduler->PatientType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->Referal->Visible) { // Referal ?>
	<?php if ($_appointment_scheduler->sortUrl($_appointment_scheduler->Referal) == "") { ?>
		<th data-name="Referal" class="<?php echo $_appointment_scheduler->Referal->headerCellClass() ?>"><div id="elh__appointment_scheduler_Referal" class="_appointment_scheduler_Referal"><div class="ew-table-header-caption"><?php echo $_appointment_scheduler->Referal->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Referal" class="<?php echo $_appointment_scheduler->Referal->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $_appointment_scheduler->SortUrl($_appointment_scheduler->Referal) ?>',1);"><div id="elh__appointment_scheduler_Referal" class="_appointment_scheduler_Referal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_appointment_scheduler->Referal->caption() ?></span><span class="ew-table-header-sort"><?php if ($_appointment_scheduler->Referal->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_appointment_scheduler->Referal->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->paymentType->Visible) { // paymentType ?>
	<?php if ($_appointment_scheduler->sortUrl($_appointment_scheduler->paymentType) == "") { ?>
		<th data-name="paymentType" class="<?php echo $_appointment_scheduler->paymentType->headerCellClass() ?>"><div id="elh__appointment_scheduler_paymentType" class="_appointment_scheduler_paymentType"><div class="ew-table-header-caption"><?php echo $_appointment_scheduler->paymentType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="paymentType" class="<?php echo $_appointment_scheduler->paymentType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $_appointment_scheduler->SortUrl($_appointment_scheduler->paymentType) ?>',1);"><div id="elh__appointment_scheduler_paymentType" class="_appointment_scheduler_paymentType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_appointment_scheduler->paymentType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_appointment_scheduler->paymentType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_appointment_scheduler->paymentType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
	<?php if ($_appointment_scheduler->sortUrl($_appointment_scheduler->WhereDidYouHear) == "") { ?>
		<th data-name="WhereDidYouHear" class="<?php echo $_appointment_scheduler->WhereDidYouHear->headerCellClass() ?>"><div id="elh__appointment_scheduler_WhereDidYouHear" class="_appointment_scheduler_WhereDidYouHear"><div class="ew-table-header-caption"><?php echo $_appointment_scheduler->WhereDidYouHear->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="WhereDidYouHear" class="<?php echo $_appointment_scheduler->WhereDidYouHear->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $_appointment_scheduler->SortUrl($_appointment_scheduler->WhereDidYouHear) ?>',1);"><div id="elh__appointment_scheduler_WhereDidYouHear" class="_appointment_scheduler_WhereDidYouHear">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_appointment_scheduler->WhereDidYouHear->caption() ?></span><span class="ew-table-header-sort"><?php if ($_appointment_scheduler->WhereDidYouHear->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_appointment_scheduler->WhereDidYouHear->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->HospID->Visible) { // HospID ?>
	<?php if ($_appointment_scheduler->sortUrl($_appointment_scheduler->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $_appointment_scheduler->HospID->headerCellClass() ?>"><div id="elh__appointment_scheduler_HospID" class="_appointment_scheduler_HospID"><div class="ew-table-header-caption"><?php echo $_appointment_scheduler->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $_appointment_scheduler->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $_appointment_scheduler->SortUrl($_appointment_scheduler->HospID) ?>',1);"><div id="elh__appointment_scheduler_HospID" class="_appointment_scheduler_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_appointment_scheduler->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($_appointment_scheduler->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_appointment_scheduler->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->createdBy->Visible) { // createdBy ?>
	<?php if ($_appointment_scheduler->sortUrl($_appointment_scheduler->createdBy) == "") { ?>
		<th data-name="createdBy" class="<?php echo $_appointment_scheduler->createdBy->headerCellClass() ?>"><div id="elh__appointment_scheduler_createdBy" class="_appointment_scheduler_createdBy"><div class="ew-table-header-caption"><?php echo $_appointment_scheduler->createdBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdBy" class="<?php echo $_appointment_scheduler->createdBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $_appointment_scheduler->SortUrl($_appointment_scheduler->createdBy) ?>',1);"><div id="elh__appointment_scheduler_createdBy" class="_appointment_scheduler_createdBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_appointment_scheduler->createdBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_appointment_scheduler->createdBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_appointment_scheduler->createdBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->createdDateTime->Visible) { // createdDateTime ?>
	<?php if ($_appointment_scheduler->sortUrl($_appointment_scheduler->createdDateTime) == "") { ?>
		<th data-name="createdDateTime" class="<?php echo $_appointment_scheduler->createdDateTime->headerCellClass() ?>"><div id="elh__appointment_scheduler_createdDateTime" class="_appointment_scheduler_createdDateTime"><div class="ew-table-header-caption"><?php echo $_appointment_scheduler->createdDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdDateTime" class="<?php echo $_appointment_scheduler->createdDateTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $_appointment_scheduler->SortUrl($_appointment_scheduler->createdDateTime) ?>',1);"><div id="elh__appointment_scheduler_createdDateTime" class="_appointment_scheduler_createdDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_appointment_scheduler->createdDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($_appointment_scheduler->createdDateTime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_appointment_scheduler->createdDateTime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->PatientTypee->Visible) { // PatientTypee ?>
	<?php if ($_appointment_scheduler->sortUrl($_appointment_scheduler->PatientTypee) == "") { ?>
		<th data-name="PatientTypee" class="<?php echo $_appointment_scheduler->PatientTypee->headerCellClass() ?>"><div id="elh__appointment_scheduler_PatientTypee" class="_appointment_scheduler_PatientTypee"><div class="ew-table-header-caption"><?php echo $_appointment_scheduler->PatientTypee->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientTypee" class="<?php echo $_appointment_scheduler->PatientTypee->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $_appointment_scheduler->SortUrl($_appointment_scheduler->PatientTypee) ?>',1);"><div id="elh__appointment_scheduler_PatientTypee" class="_appointment_scheduler_PatientTypee">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_appointment_scheduler->PatientTypee->caption() ?></span><span class="ew-table-header-sort"><?php if ($_appointment_scheduler->PatientTypee->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_appointment_scheduler->PatientTypee->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$_appointment_scheduler_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($_appointment_scheduler->ExportAll && $_appointment_scheduler->isExport()) {
	$_appointment_scheduler_list->StopRec = $_appointment_scheduler_list->TotalRecs;
} else {

	// Set the last record to display
	if ($_appointment_scheduler_list->TotalRecs > $_appointment_scheduler_list->StartRec + $_appointment_scheduler_list->DisplayRecs - 1)
		$_appointment_scheduler_list->StopRec = $_appointment_scheduler_list->StartRec + $_appointment_scheduler_list->DisplayRecs - 1;
	else
		$_appointment_scheduler_list->StopRec = $_appointment_scheduler_list->TotalRecs;
}
$_appointment_scheduler_list->RecCnt = $_appointment_scheduler_list->StartRec - 1;
if ($_appointment_scheduler_list->Recordset && !$_appointment_scheduler_list->Recordset->EOF) {
	$_appointment_scheduler_list->Recordset->moveFirst();
	$selectLimit = $_appointment_scheduler_list->UseSelectLimit;
	if (!$selectLimit && $_appointment_scheduler_list->StartRec > 1)
		$_appointment_scheduler_list->Recordset->move($_appointment_scheduler_list->StartRec - 1);
} elseif (!$_appointment_scheduler->AllowAddDeleteRow && $_appointment_scheduler_list->StopRec == 0) {
	$_appointment_scheduler_list->StopRec = $_appointment_scheduler->GridAddRowCount;
}

// Initialize aggregate
$_appointment_scheduler->RowType = ROWTYPE_AGGREGATEINIT;
$_appointment_scheduler->resetAttributes();
$_appointment_scheduler_list->renderRow();
while ($_appointment_scheduler_list->RecCnt < $_appointment_scheduler_list->StopRec) {
	$_appointment_scheduler_list->RecCnt++;
	if ($_appointment_scheduler_list->RecCnt >= $_appointment_scheduler_list->StartRec) {
		$_appointment_scheduler_list->RowCnt++;

		// Set up key count
		$_appointment_scheduler_list->KeyCount = $_appointment_scheduler_list->RowIndex;

		// Init row class and style
		$_appointment_scheduler->resetAttributes();
		$_appointment_scheduler->CssClass = "";
		if ($_appointment_scheduler->isGridAdd()) {
		} else {
			$_appointment_scheduler_list->loadRowValues($_appointment_scheduler_list->Recordset); // Load row values
		}
		$_appointment_scheduler->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$_appointment_scheduler->RowAttrs = array_merge($_appointment_scheduler->RowAttrs, array('data-rowindex'=>$_appointment_scheduler_list->RowCnt, 'id'=>'r' . $_appointment_scheduler_list->RowCnt . '__appointment_scheduler', 'data-rowtype'=>$_appointment_scheduler->RowType));

		// Render row
		$_appointment_scheduler_list->renderRow();

		// Render list options
		$_appointment_scheduler_list->renderListOptions();
?>
	<tr<?php echo $_appointment_scheduler->rowAttributes() ?>>
<?php

// Render list options (body, left)
$_appointment_scheduler_list->ListOptions->render("body", "left", $_appointment_scheduler_list->RowCnt);
?>
	<?php if ($_appointment_scheduler->id->Visible) { // id ?>
		<td data-name="id"<?php echo $_appointment_scheduler->id->cellAttributes() ?>>
<span id="el<?php echo $_appointment_scheduler_list->RowCnt ?>__appointment_scheduler_id" class="_appointment_scheduler_id">
<span<?php echo $_appointment_scheduler->id->viewAttributes() ?>>
<?php echo $_appointment_scheduler->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->start_date->Visible) { // start_date ?>
		<td data-name="start_date"<?php echo $_appointment_scheduler->start_date->cellAttributes() ?>>
<span id="el<?php echo $_appointment_scheduler_list->RowCnt ?>__appointment_scheduler_start_date" class="_appointment_scheduler_start_date">
<span<?php echo $_appointment_scheduler->start_date->viewAttributes() ?>>
<?php echo $_appointment_scheduler->start_date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->end_date->Visible) { // end_date ?>
		<td data-name="end_date"<?php echo $_appointment_scheduler->end_date->cellAttributes() ?>>
<span id="el<?php echo $_appointment_scheduler_list->RowCnt ?>__appointment_scheduler_end_date" class="_appointment_scheduler_end_date">
<span<?php echo $_appointment_scheduler->end_date->viewAttributes() ?>>
<?php echo $_appointment_scheduler->end_date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->patientID->Visible) { // patientID ?>
		<td data-name="patientID"<?php echo $_appointment_scheduler->patientID->cellAttributes() ?>>
<span id="el<?php echo $_appointment_scheduler_list->RowCnt ?>__appointment_scheduler_patientID" class="_appointment_scheduler_patientID">
<span<?php echo $_appointment_scheduler->patientID->viewAttributes() ?>>
<?php echo $_appointment_scheduler->patientID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->patientName->Visible) { // patientName ?>
		<td data-name="patientName"<?php echo $_appointment_scheduler->patientName->cellAttributes() ?>>
<span id="el<?php echo $_appointment_scheduler_list->RowCnt ?>__appointment_scheduler_patientName" class="_appointment_scheduler_patientName">
<span<?php echo $_appointment_scheduler->patientName->viewAttributes() ?>>
<?php echo $_appointment_scheduler->patientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->DoctorID->Visible) { // DoctorID ?>
		<td data-name="DoctorID"<?php echo $_appointment_scheduler->DoctorID->cellAttributes() ?>>
<span id="el<?php echo $_appointment_scheduler_list->RowCnt ?>__appointment_scheduler_DoctorID" class="_appointment_scheduler_DoctorID">
<span<?php echo $_appointment_scheduler->DoctorID->viewAttributes() ?>>
<?php echo $_appointment_scheduler->DoctorID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->DoctorName->Visible) { // DoctorName ?>
		<td data-name="DoctorName"<?php echo $_appointment_scheduler->DoctorName->cellAttributes() ?>>
<span id="el<?php echo $_appointment_scheduler_list->RowCnt ?>__appointment_scheduler_DoctorName" class="_appointment_scheduler_DoctorName">
<span<?php echo $_appointment_scheduler->DoctorName->viewAttributes() ?>>
<?php echo $_appointment_scheduler->DoctorName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->AppointmentStatus->Visible) { // AppointmentStatus ?>
		<td data-name="AppointmentStatus"<?php echo $_appointment_scheduler->AppointmentStatus->cellAttributes() ?>>
<span id="el<?php echo $_appointment_scheduler_list->RowCnt ?>__appointment_scheduler_AppointmentStatus" class="_appointment_scheduler_AppointmentStatus">
<span<?php echo $_appointment_scheduler->AppointmentStatus->viewAttributes() ?>>
<?php echo $_appointment_scheduler->AppointmentStatus->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->status->Visible) { // status ?>
		<td data-name="status"<?php echo $_appointment_scheduler->status->cellAttributes() ?>>
<span id="el<?php echo $_appointment_scheduler_list->RowCnt ?>__appointment_scheduler_status" class="_appointment_scheduler_status">
<span<?php echo $_appointment_scheduler->status->viewAttributes() ?>>
<?php echo $_appointment_scheduler->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->DoctorCode->Visible) { // DoctorCode ?>
		<td data-name="DoctorCode"<?php echo $_appointment_scheduler->DoctorCode->cellAttributes() ?>>
<span id="el<?php echo $_appointment_scheduler_list->RowCnt ?>__appointment_scheduler_DoctorCode" class="_appointment_scheduler_DoctorCode">
<span<?php echo $_appointment_scheduler->DoctorCode->viewAttributes() ?>>
<?php echo $_appointment_scheduler->DoctorCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->Department->Visible) { // Department ?>
		<td data-name="Department"<?php echo $_appointment_scheduler->Department->cellAttributes() ?>>
<span id="el<?php echo $_appointment_scheduler_list->RowCnt ?>__appointment_scheduler_Department" class="_appointment_scheduler_Department">
<span<?php echo $_appointment_scheduler->Department->viewAttributes() ?>>
<?php echo $_appointment_scheduler->Department->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->scheduler_id->Visible) { // scheduler_id ?>
		<td data-name="scheduler_id"<?php echo $_appointment_scheduler->scheduler_id->cellAttributes() ?>>
<span id="el<?php echo $_appointment_scheduler_list->RowCnt ?>__appointment_scheduler_scheduler_id" class="_appointment_scheduler_scheduler_id">
<span<?php echo $_appointment_scheduler->scheduler_id->viewAttributes() ?>>
<?php echo $_appointment_scheduler->scheduler_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->text->Visible) { // text ?>
		<td data-name="text"<?php echo $_appointment_scheduler->text->cellAttributes() ?>>
<span id="el<?php echo $_appointment_scheduler_list->RowCnt ?>__appointment_scheduler_text" class="_appointment_scheduler_text">
<span<?php echo $_appointment_scheduler->text->viewAttributes() ?>>
<?php echo $_appointment_scheduler->text->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->appointment_status->Visible) { // appointment_status ?>
		<td data-name="appointment_status"<?php echo $_appointment_scheduler->appointment_status->cellAttributes() ?>>
<span id="el<?php echo $_appointment_scheduler_list->RowCnt ?>__appointment_scheduler_appointment_status" class="_appointment_scheduler_appointment_status">
<span<?php echo $_appointment_scheduler->appointment_status->viewAttributes() ?>>
<?php echo $_appointment_scheduler->appointment_status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->PId->Visible) { // PId ?>
		<td data-name="PId"<?php echo $_appointment_scheduler->PId->cellAttributes() ?>>
<span id="el<?php echo $_appointment_scheduler_list->RowCnt ?>__appointment_scheduler_PId" class="_appointment_scheduler_PId">
<span<?php echo $_appointment_scheduler->PId->viewAttributes() ?>>
<?php echo $_appointment_scheduler->PId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->MobileNumber->Visible) { // MobileNumber ?>
		<td data-name="MobileNumber"<?php echo $_appointment_scheduler->MobileNumber->cellAttributes() ?>>
<span id="el<?php echo $_appointment_scheduler_list->RowCnt ?>__appointment_scheduler_MobileNumber" class="_appointment_scheduler_MobileNumber">
<span<?php echo $_appointment_scheduler->MobileNumber->viewAttributes() ?>>
<?php echo $_appointment_scheduler->MobileNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->SchEmail->Visible) { // SchEmail ?>
		<td data-name="SchEmail"<?php echo $_appointment_scheduler->SchEmail->cellAttributes() ?>>
<span id="el<?php echo $_appointment_scheduler_list->RowCnt ?>__appointment_scheduler_SchEmail" class="_appointment_scheduler_SchEmail">
<span<?php echo $_appointment_scheduler->SchEmail->viewAttributes() ?>>
<?php echo $_appointment_scheduler->SchEmail->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->appointment_type->Visible) { // appointment_type ?>
		<td data-name="appointment_type"<?php echo $_appointment_scheduler->appointment_type->cellAttributes() ?>>
<span id="el<?php echo $_appointment_scheduler_list->RowCnt ?>__appointment_scheduler_appointment_type" class="_appointment_scheduler_appointment_type">
<span<?php echo $_appointment_scheduler->appointment_type->viewAttributes() ?>>
<?php echo $_appointment_scheduler->appointment_type->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->Notified->Visible) { // Notified ?>
		<td data-name="Notified"<?php echo $_appointment_scheduler->Notified->cellAttributes() ?>>
<span id="el<?php echo $_appointment_scheduler_list->RowCnt ?>__appointment_scheduler_Notified" class="_appointment_scheduler_Notified">
<span<?php echo $_appointment_scheduler->Notified->viewAttributes() ?>>
<?php echo $_appointment_scheduler->Notified->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->Purpose->Visible) { // Purpose ?>
		<td data-name="Purpose"<?php echo $_appointment_scheduler->Purpose->cellAttributes() ?>>
<span id="el<?php echo $_appointment_scheduler_list->RowCnt ?>__appointment_scheduler_Purpose" class="_appointment_scheduler_Purpose">
<span<?php echo $_appointment_scheduler->Purpose->viewAttributes() ?>>
<?php echo $_appointment_scheduler->Purpose->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->Notes->Visible) { // Notes ?>
		<td data-name="Notes"<?php echo $_appointment_scheduler->Notes->cellAttributes() ?>>
<span id="el<?php echo $_appointment_scheduler_list->RowCnt ?>__appointment_scheduler_Notes" class="_appointment_scheduler_Notes">
<span<?php echo $_appointment_scheduler->Notes->viewAttributes() ?>>
<?php echo $_appointment_scheduler->Notes->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->PatientType->Visible) { // PatientType ?>
		<td data-name="PatientType"<?php echo $_appointment_scheduler->PatientType->cellAttributes() ?>>
<span id="el<?php echo $_appointment_scheduler_list->RowCnt ?>__appointment_scheduler_PatientType" class="_appointment_scheduler_PatientType">
<span<?php echo $_appointment_scheduler->PatientType->viewAttributes() ?>>
<?php echo $_appointment_scheduler->PatientType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->Referal->Visible) { // Referal ?>
		<td data-name="Referal"<?php echo $_appointment_scheduler->Referal->cellAttributes() ?>>
<span id="el<?php echo $_appointment_scheduler_list->RowCnt ?>__appointment_scheduler_Referal" class="_appointment_scheduler_Referal">
<span<?php echo $_appointment_scheduler->Referal->viewAttributes() ?>>
<?php echo $_appointment_scheduler->Referal->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->paymentType->Visible) { // paymentType ?>
		<td data-name="paymentType"<?php echo $_appointment_scheduler->paymentType->cellAttributes() ?>>
<span id="el<?php echo $_appointment_scheduler_list->RowCnt ?>__appointment_scheduler_paymentType" class="_appointment_scheduler_paymentType">
<span<?php echo $_appointment_scheduler->paymentType->viewAttributes() ?>>
<?php echo $_appointment_scheduler->paymentType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
		<td data-name="WhereDidYouHear"<?php echo $_appointment_scheduler->WhereDidYouHear->cellAttributes() ?>>
<span id="el<?php echo $_appointment_scheduler_list->RowCnt ?>__appointment_scheduler_WhereDidYouHear" class="_appointment_scheduler_WhereDidYouHear">
<span<?php echo $_appointment_scheduler->WhereDidYouHear->viewAttributes() ?>>
<?php echo $_appointment_scheduler->WhereDidYouHear->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $_appointment_scheduler->HospID->cellAttributes() ?>>
<span id="el<?php echo $_appointment_scheduler_list->RowCnt ?>__appointment_scheduler_HospID" class="_appointment_scheduler_HospID">
<span<?php echo $_appointment_scheduler->HospID->viewAttributes() ?>>
<?php echo $_appointment_scheduler->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->createdBy->Visible) { // createdBy ?>
		<td data-name="createdBy"<?php echo $_appointment_scheduler->createdBy->cellAttributes() ?>>
<span id="el<?php echo $_appointment_scheduler_list->RowCnt ?>__appointment_scheduler_createdBy" class="_appointment_scheduler_createdBy">
<span<?php echo $_appointment_scheduler->createdBy->viewAttributes() ?>>
<?php echo $_appointment_scheduler->createdBy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->createdDateTime->Visible) { // createdDateTime ?>
		<td data-name="createdDateTime"<?php echo $_appointment_scheduler->createdDateTime->cellAttributes() ?>>
<span id="el<?php echo $_appointment_scheduler_list->RowCnt ?>__appointment_scheduler_createdDateTime" class="_appointment_scheduler_createdDateTime">
<span<?php echo $_appointment_scheduler->createdDateTime->viewAttributes() ?>>
<?php echo $_appointment_scheduler->createdDateTime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->PatientTypee->Visible) { // PatientTypee ?>
		<td data-name="PatientTypee"<?php echo $_appointment_scheduler->PatientTypee->cellAttributes() ?>>
<span id="el<?php echo $_appointment_scheduler_list->RowCnt ?>__appointment_scheduler_PatientTypee" class="_appointment_scheduler_PatientTypee">
<span<?php echo $_appointment_scheduler->PatientTypee->viewAttributes() ?>>
<?php echo $_appointment_scheduler->PatientTypee->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$_appointment_scheduler_list->ListOptions->render("body", "right", $_appointment_scheduler_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$_appointment_scheduler->isGridAdd())
		$_appointment_scheduler_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$_appointment_scheduler->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($_appointment_scheduler_list->Recordset)
	$_appointment_scheduler_list->Recordset->Close();
?>
<?php if (!$_appointment_scheduler->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$_appointment_scheduler->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($_appointment_scheduler_list->Pager)) $_appointment_scheduler_list->Pager = new NumericPager($_appointment_scheduler_list->StartRec, $_appointment_scheduler_list->DisplayRecs, $_appointment_scheduler_list->TotalRecs, $_appointment_scheduler_list->RecRange, $_appointment_scheduler_list->AutoHidePager) ?>
<?php if ($_appointment_scheduler_list->Pager->RecordCount > 0 && $_appointment_scheduler_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($_appointment_scheduler_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $_appointment_scheduler_list->pageUrl() ?>start=<?php echo $_appointment_scheduler_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($_appointment_scheduler_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $_appointment_scheduler_list->pageUrl() ?>start=<?php echo $_appointment_scheduler_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($_appointment_scheduler_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $_appointment_scheduler_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($_appointment_scheduler_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $_appointment_scheduler_list->pageUrl() ?>start=<?php echo $_appointment_scheduler_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($_appointment_scheduler_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $_appointment_scheduler_list->pageUrl() ?>start=<?php echo $_appointment_scheduler_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($_appointment_scheduler_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $_appointment_scheduler_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $_appointment_scheduler_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $_appointment_scheduler_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($_appointment_scheduler_list->TotalRecs > 0 && (!$_appointment_scheduler_list->AutoHidePageSizeSelector || $_appointment_scheduler_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="_appointment_scheduler">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($_appointment_scheduler_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($_appointment_scheduler_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($_appointment_scheduler_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($_appointment_scheduler_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($_appointment_scheduler_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($_appointment_scheduler_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($_appointment_scheduler->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $_appointment_scheduler_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($_appointment_scheduler_list->TotalRecs == 0 && !$_appointment_scheduler->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $_appointment_scheduler_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$_appointment_scheduler_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$_appointment_scheduler->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$_appointment_scheduler->isExport()) { ?>
<script>
ew.scrollableTable("gmp__appointment_scheduler", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$_appointment_scheduler_list->terminate();
?>