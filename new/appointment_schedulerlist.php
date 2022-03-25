<?php
namespace PHPMaker2020\HIMS;

// Autoload
include_once "autoload.php";

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	\Delight\Cookie\Session::start(Config("COOKIE_SAMESITE")); // Init session data

// Output buffering
ob_start();
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$appointment_scheduler_list = new appointment_scheduler_list();

// Run the page
$appointment_scheduler_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$appointment_scheduler_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$appointment_scheduler_list->isExport()) { ?>
<script>
var fappointment_schedulerlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fappointment_schedulerlist = currentForm = new ew.Form("fappointment_schedulerlist", "list");
	fappointment_schedulerlist.formKeyCountName = '<?php echo $appointment_scheduler_list->FormKeyCountName ?>';
	loadjs.done("fappointment_schedulerlist");
});
var fappointment_schedulerlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fappointment_schedulerlistsrch = currentSearchForm = new ew.Form("fappointment_schedulerlistsrch");

	// Dynamic selection lists
	// Filters

	fappointment_schedulerlistsrch.filterList = <?php echo $appointment_scheduler_list->getFilterList() ?>;
	loadjs.done("fappointment_schedulerlistsrch");
});
</script>
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
<script>
loadjs.ready("head", function() {
	ew.PREVIEW_PLACEMENT = ew.CSS_FLIP ? "left" : "right";
	ew.PREVIEW_SINGLE_ROW = false;
	ew.PREVIEW_OVERLAY = false;
	loadjs("js/ewpreview.js", "preview");
});
</script>
<script>
ew.ready("head", "js/ewfixedheadertable.js", "fixedheadertable");
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$appointment_scheduler_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($appointment_scheduler_list->TotalRecords > 0 && $appointment_scheduler_list->ExportOptions->visible()) { ?>
<?php $appointment_scheduler_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($appointment_scheduler_list->ImportOptions->visible()) { ?>
<?php $appointment_scheduler_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($appointment_scheduler_list->SearchOptions->visible()) { ?>
<?php $appointment_scheduler_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($appointment_scheduler_list->FilterOptions->visible()) { ?>
<?php $appointment_scheduler_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$appointment_scheduler_list->isExport() || Config("EXPORT_MASTER_RECORD") && $appointment_scheduler_list->isExport("print")) { ?>
<?php
if ($appointment_scheduler_list->DbMasterFilter != "" && $appointment_scheduler->getCurrentMasterTable() == "doctors") {
	if ($appointment_scheduler_list->MasterRecordExists) {
		include_once "doctorsmaster.php";
	}
}
?>
<?php } ?>
<?php
$appointment_scheduler_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$appointment_scheduler_list->isExport() && !$appointment_scheduler->CurrentAction) { ?>
<form name="fappointment_schedulerlistsrch" id="fappointment_schedulerlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fappointment_schedulerlistsrch-search-panel" class="<?php echo $appointment_scheduler_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="appointment_scheduler">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $appointment_scheduler_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($appointment_scheduler_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($appointment_scheduler_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $appointment_scheduler_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($appointment_scheduler_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($appointment_scheduler_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($appointment_scheduler_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($appointment_scheduler_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $appointment_scheduler_list->showPageHeader(); ?>
<?php
$appointment_scheduler_list->showMessage();
?>
<?php if ($appointment_scheduler_list->TotalRecords > 0 || $appointment_scheduler->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($appointment_scheduler_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> appointment_scheduler">
<?php if (!$appointment_scheduler_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$appointment_scheduler_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $appointment_scheduler_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $appointment_scheduler_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fappointment_schedulerlist" id="fappointment_schedulerlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="appointment_scheduler">
<?php if ($appointment_scheduler->getCurrentMasterTable() == "doctors" && $appointment_scheduler->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="doctors">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($appointment_scheduler_list->DoctorID->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_appointment_scheduler" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($appointment_scheduler_list->TotalRecords > 0 || $appointment_scheduler_list->isGridEdit()) { ?>
<table id="tbl_appointment_schedulerlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$appointment_scheduler->RowType = ROWTYPE_HEADER;

// Render list options
$appointment_scheduler_list->renderListOptions();

// Render list options (header, left)
$appointment_scheduler_list->ListOptions->render("header", "left");
?>
<?php if ($appointment_scheduler_list->id->Visible) { // id ?>
	<?php if ($appointment_scheduler_list->SortUrl($appointment_scheduler_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $appointment_scheduler_list->id->headerCellClass() ?>"><div id="elh_appointment_scheduler_id" class="appointment_scheduler_id"><div class="ew-table-header-caption"><?php echo $appointment_scheduler_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $appointment_scheduler_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $appointment_scheduler_list->SortUrl($appointment_scheduler_list->id) ?>', 1);"><div id="elh_appointment_scheduler_id" class="appointment_scheduler_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_scheduler_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($appointment_scheduler_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_scheduler_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_scheduler_list->start_date->Visible) { // start_date ?>
	<?php if ($appointment_scheduler_list->SortUrl($appointment_scheduler_list->start_date) == "") { ?>
		<th data-name="start_date" class="<?php echo $appointment_scheduler_list->start_date->headerCellClass() ?>"><div id="elh_appointment_scheduler_start_date" class="appointment_scheduler_start_date"><div class="ew-table-header-caption"><?php echo $appointment_scheduler_list->start_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="start_date" class="<?php echo $appointment_scheduler_list->start_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $appointment_scheduler_list->SortUrl($appointment_scheduler_list->start_date) ?>', 1);"><div id="elh_appointment_scheduler_start_date" class="appointment_scheduler_start_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_scheduler_list->start_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($appointment_scheduler_list->start_date->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_scheduler_list->start_date->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_scheduler_list->end_date->Visible) { // end_date ?>
	<?php if ($appointment_scheduler_list->SortUrl($appointment_scheduler_list->end_date) == "") { ?>
		<th data-name="end_date" class="<?php echo $appointment_scheduler_list->end_date->headerCellClass() ?>"><div id="elh_appointment_scheduler_end_date" class="appointment_scheduler_end_date"><div class="ew-table-header-caption"><?php echo $appointment_scheduler_list->end_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="end_date" class="<?php echo $appointment_scheduler_list->end_date->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $appointment_scheduler_list->SortUrl($appointment_scheduler_list->end_date) ?>', 1);"><div id="elh_appointment_scheduler_end_date" class="appointment_scheduler_end_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_scheduler_list->end_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($appointment_scheduler_list->end_date->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_scheduler_list->end_date->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_scheduler_list->patientID->Visible) { // patientID ?>
	<?php if ($appointment_scheduler_list->SortUrl($appointment_scheduler_list->patientID) == "") { ?>
		<th data-name="patientID" class="<?php echo $appointment_scheduler_list->patientID->headerCellClass() ?>"><div id="elh_appointment_scheduler_patientID" class="appointment_scheduler_patientID"><div class="ew-table-header-caption"><?php echo $appointment_scheduler_list->patientID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patientID" class="<?php echo $appointment_scheduler_list->patientID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $appointment_scheduler_list->SortUrl($appointment_scheduler_list->patientID) ?>', 1);"><div id="elh_appointment_scheduler_patientID" class="appointment_scheduler_patientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_scheduler_list->patientID->caption() ?></span><span class="ew-table-header-sort"><?php if ($appointment_scheduler_list->patientID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_scheduler_list->patientID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_scheduler_list->patientName->Visible) { // patientName ?>
	<?php if ($appointment_scheduler_list->SortUrl($appointment_scheduler_list->patientName) == "") { ?>
		<th data-name="patientName" class="<?php echo $appointment_scheduler_list->patientName->headerCellClass() ?>"><div id="elh_appointment_scheduler_patientName" class="appointment_scheduler_patientName"><div class="ew-table-header-caption"><?php echo $appointment_scheduler_list->patientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patientName" class="<?php echo $appointment_scheduler_list->patientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $appointment_scheduler_list->SortUrl($appointment_scheduler_list->patientName) ?>', 1);"><div id="elh_appointment_scheduler_patientName" class="appointment_scheduler_patientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_scheduler_list->patientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($appointment_scheduler_list->patientName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_scheduler_list->patientName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_scheduler_list->DoctorID->Visible) { // DoctorID ?>
	<?php if ($appointment_scheduler_list->SortUrl($appointment_scheduler_list->DoctorID) == "") { ?>
		<th data-name="DoctorID" class="<?php echo $appointment_scheduler_list->DoctorID->headerCellClass() ?>"><div id="elh_appointment_scheduler_DoctorID" class="appointment_scheduler_DoctorID"><div class="ew-table-header-caption"><?php echo $appointment_scheduler_list->DoctorID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DoctorID" class="<?php echo $appointment_scheduler_list->DoctorID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $appointment_scheduler_list->SortUrl($appointment_scheduler_list->DoctorID) ?>', 1);"><div id="elh_appointment_scheduler_DoctorID" class="appointment_scheduler_DoctorID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_scheduler_list->DoctorID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($appointment_scheduler_list->DoctorID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_scheduler_list->DoctorID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_scheduler_list->DoctorName->Visible) { // DoctorName ?>
	<?php if ($appointment_scheduler_list->SortUrl($appointment_scheduler_list->DoctorName) == "") { ?>
		<th data-name="DoctorName" class="<?php echo $appointment_scheduler_list->DoctorName->headerCellClass() ?>"><div id="elh_appointment_scheduler_DoctorName" class="appointment_scheduler_DoctorName"><div class="ew-table-header-caption"><?php echo $appointment_scheduler_list->DoctorName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DoctorName" class="<?php echo $appointment_scheduler_list->DoctorName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $appointment_scheduler_list->SortUrl($appointment_scheduler_list->DoctorName) ?>', 1);"><div id="elh_appointment_scheduler_DoctorName" class="appointment_scheduler_DoctorName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_scheduler_list->DoctorName->caption() ?></span><span class="ew-table-header-sort"><?php if ($appointment_scheduler_list->DoctorName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_scheduler_list->DoctorName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_scheduler_list->AppointmentStatus->Visible) { // AppointmentStatus ?>
	<?php if ($appointment_scheduler_list->SortUrl($appointment_scheduler_list->AppointmentStatus) == "") { ?>
		<th data-name="AppointmentStatus" class="<?php echo $appointment_scheduler_list->AppointmentStatus->headerCellClass() ?>"><div id="elh_appointment_scheduler_AppointmentStatus" class="appointment_scheduler_AppointmentStatus"><div class="ew-table-header-caption"><?php echo $appointment_scheduler_list->AppointmentStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AppointmentStatus" class="<?php echo $appointment_scheduler_list->AppointmentStatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $appointment_scheduler_list->SortUrl($appointment_scheduler_list->AppointmentStatus) ?>', 1);"><div id="elh_appointment_scheduler_AppointmentStatus" class="appointment_scheduler_AppointmentStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_scheduler_list->AppointmentStatus->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($appointment_scheduler_list->AppointmentStatus->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_scheduler_list->AppointmentStatus->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_scheduler_list->status->Visible) { // status ?>
	<?php if ($appointment_scheduler_list->SortUrl($appointment_scheduler_list->status) == "") { ?>
		<th data-name="status" class="<?php echo $appointment_scheduler_list->status->headerCellClass() ?>"><div id="elh_appointment_scheduler_status" class="appointment_scheduler_status"><div class="ew-table-header-caption"><?php echo $appointment_scheduler_list->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $appointment_scheduler_list->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $appointment_scheduler_list->SortUrl($appointment_scheduler_list->status) ?>', 1);"><div id="elh_appointment_scheduler_status" class="appointment_scheduler_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_scheduler_list->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($appointment_scheduler_list->status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_scheduler_list->status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_scheduler_list->DoctorCode->Visible) { // DoctorCode ?>
	<?php if ($appointment_scheduler_list->SortUrl($appointment_scheduler_list->DoctorCode) == "") { ?>
		<th data-name="DoctorCode" class="<?php echo $appointment_scheduler_list->DoctorCode->headerCellClass() ?>"><div id="elh_appointment_scheduler_DoctorCode" class="appointment_scheduler_DoctorCode"><div class="ew-table-header-caption"><?php echo $appointment_scheduler_list->DoctorCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DoctorCode" class="<?php echo $appointment_scheduler_list->DoctorCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $appointment_scheduler_list->SortUrl($appointment_scheduler_list->DoctorCode) ?>', 1);"><div id="elh_appointment_scheduler_DoctorCode" class="appointment_scheduler_DoctorCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_scheduler_list->DoctorCode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($appointment_scheduler_list->DoctorCode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_scheduler_list->DoctorCode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_scheduler_list->Department->Visible) { // Department ?>
	<?php if ($appointment_scheduler_list->SortUrl($appointment_scheduler_list->Department) == "") { ?>
		<th data-name="Department" class="<?php echo $appointment_scheduler_list->Department->headerCellClass() ?>"><div id="elh_appointment_scheduler_Department" class="appointment_scheduler_Department"><div class="ew-table-header-caption"><?php echo $appointment_scheduler_list->Department->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Department" class="<?php echo $appointment_scheduler_list->Department->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $appointment_scheduler_list->SortUrl($appointment_scheduler_list->Department) ?>', 1);"><div id="elh_appointment_scheduler_Department" class="appointment_scheduler_Department">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_scheduler_list->Department->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($appointment_scheduler_list->Department->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_scheduler_list->Department->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_scheduler_list->scheduler_id->Visible) { // scheduler_id ?>
	<?php if ($appointment_scheduler_list->SortUrl($appointment_scheduler_list->scheduler_id) == "") { ?>
		<th data-name="scheduler_id" class="<?php echo $appointment_scheduler_list->scheduler_id->headerCellClass() ?>"><div id="elh_appointment_scheduler_scheduler_id" class="appointment_scheduler_scheduler_id"><div class="ew-table-header-caption"><?php echo $appointment_scheduler_list->scheduler_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="scheduler_id" class="<?php echo $appointment_scheduler_list->scheduler_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $appointment_scheduler_list->SortUrl($appointment_scheduler_list->scheduler_id) ?>', 1);"><div id="elh_appointment_scheduler_scheduler_id" class="appointment_scheduler_scheduler_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_scheduler_list->scheduler_id->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($appointment_scheduler_list->scheduler_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_scheduler_list->scheduler_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_scheduler_list->text->Visible) { // text ?>
	<?php if ($appointment_scheduler_list->SortUrl($appointment_scheduler_list->text) == "") { ?>
		<th data-name="text" class="<?php echo $appointment_scheduler_list->text->headerCellClass() ?>"><div id="elh_appointment_scheduler_text" class="appointment_scheduler_text"><div class="ew-table-header-caption"><?php echo $appointment_scheduler_list->text->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="text" class="<?php echo $appointment_scheduler_list->text->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $appointment_scheduler_list->SortUrl($appointment_scheduler_list->text) ?>', 1);"><div id="elh_appointment_scheduler_text" class="appointment_scheduler_text">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_scheduler_list->text->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($appointment_scheduler_list->text->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_scheduler_list->text->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_scheduler_list->appointment_status->Visible) { // appointment_status ?>
	<?php if ($appointment_scheduler_list->SortUrl($appointment_scheduler_list->appointment_status) == "") { ?>
		<th data-name="appointment_status" class="<?php echo $appointment_scheduler_list->appointment_status->headerCellClass() ?>"><div id="elh_appointment_scheduler_appointment_status" class="appointment_scheduler_appointment_status"><div class="ew-table-header-caption"><?php echo $appointment_scheduler_list->appointment_status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="appointment_status" class="<?php echo $appointment_scheduler_list->appointment_status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $appointment_scheduler_list->SortUrl($appointment_scheduler_list->appointment_status) ?>', 1);"><div id="elh_appointment_scheduler_appointment_status" class="appointment_scheduler_appointment_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_scheduler_list->appointment_status->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($appointment_scheduler_list->appointment_status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_scheduler_list->appointment_status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_scheduler_list->PId->Visible) { // PId ?>
	<?php if ($appointment_scheduler_list->SortUrl($appointment_scheduler_list->PId) == "") { ?>
		<th data-name="PId" class="<?php echo $appointment_scheduler_list->PId->headerCellClass() ?>"><div id="elh_appointment_scheduler_PId" class="appointment_scheduler_PId"><div class="ew-table-header-caption"><?php echo $appointment_scheduler_list->PId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PId" class="<?php echo $appointment_scheduler_list->PId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $appointment_scheduler_list->SortUrl($appointment_scheduler_list->PId) ?>', 1);"><div id="elh_appointment_scheduler_PId" class="appointment_scheduler_PId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_scheduler_list->PId->caption() ?></span><span class="ew-table-header-sort"><?php if ($appointment_scheduler_list->PId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_scheduler_list->PId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_scheduler_list->MobileNumber->Visible) { // MobileNumber ?>
	<?php if ($appointment_scheduler_list->SortUrl($appointment_scheduler_list->MobileNumber) == "") { ?>
		<th data-name="MobileNumber" class="<?php echo $appointment_scheduler_list->MobileNumber->headerCellClass() ?>"><div id="elh_appointment_scheduler_MobileNumber" class="appointment_scheduler_MobileNumber"><div class="ew-table-header-caption"><?php echo $appointment_scheduler_list->MobileNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MobileNumber" class="<?php echo $appointment_scheduler_list->MobileNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $appointment_scheduler_list->SortUrl($appointment_scheduler_list->MobileNumber) ?>', 1);"><div id="elh_appointment_scheduler_MobileNumber" class="appointment_scheduler_MobileNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_scheduler_list->MobileNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($appointment_scheduler_list->MobileNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_scheduler_list->MobileNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_scheduler_list->SchEmail->Visible) { // SchEmail ?>
	<?php if ($appointment_scheduler_list->SortUrl($appointment_scheduler_list->SchEmail) == "") { ?>
		<th data-name="SchEmail" class="<?php echo $appointment_scheduler_list->SchEmail->headerCellClass() ?>"><div id="elh_appointment_scheduler_SchEmail" class="appointment_scheduler_SchEmail"><div class="ew-table-header-caption"><?php echo $appointment_scheduler_list->SchEmail->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SchEmail" class="<?php echo $appointment_scheduler_list->SchEmail->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $appointment_scheduler_list->SortUrl($appointment_scheduler_list->SchEmail) ?>', 1);"><div id="elh_appointment_scheduler_SchEmail" class="appointment_scheduler_SchEmail">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_scheduler_list->SchEmail->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($appointment_scheduler_list->SchEmail->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_scheduler_list->SchEmail->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_scheduler_list->appointment_type->Visible) { // appointment_type ?>
	<?php if ($appointment_scheduler_list->SortUrl($appointment_scheduler_list->appointment_type) == "") { ?>
		<th data-name="appointment_type" class="<?php echo $appointment_scheduler_list->appointment_type->headerCellClass() ?>"><div id="elh_appointment_scheduler_appointment_type" class="appointment_scheduler_appointment_type"><div class="ew-table-header-caption"><?php echo $appointment_scheduler_list->appointment_type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="appointment_type" class="<?php echo $appointment_scheduler_list->appointment_type->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $appointment_scheduler_list->SortUrl($appointment_scheduler_list->appointment_type) ?>', 1);"><div id="elh_appointment_scheduler_appointment_type" class="appointment_scheduler_appointment_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_scheduler_list->appointment_type->caption() ?></span><span class="ew-table-header-sort"><?php if ($appointment_scheduler_list->appointment_type->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_scheduler_list->appointment_type->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_scheduler_list->Notified->Visible) { // Notified ?>
	<?php if ($appointment_scheduler_list->SortUrl($appointment_scheduler_list->Notified) == "") { ?>
		<th data-name="Notified" class="<?php echo $appointment_scheduler_list->Notified->headerCellClass() ?>"><div id="elh_appointment_scheduler_Notified" class="appointment_scheduler_Notified"><div class="ew-table-header-caption"><?php echo $appointment_scheduler_list->Notified->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Notified" class="<?php echo $appointment_scheduler_list->Notified->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $appointment_scheduler_list->SortUrl($appointment_scheduler_list->Notified) ?>', 1);"><div id="elh_appointment_scheduler_Notified" class="appointment_scheduler_Notified">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_scheduler_list->Notified->caption() ?></span><span class="ew-table-header-sort"><?php if ($appointment_scheduler_list->Notified->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_scheduler_list->Notified->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_scheduler_list->Purpose->Visible) { // Purpose ?>
	<?php if ($appointment_scheduler_list->SortUrl($appointment_scheduler_list->Purpose) == "") { ?>
		<th data-name="Purpose" class="<?php echo $appointment_scheduler_list->Purpose->headerCellClass() ?>"><div id="elh_appointment_scheduler_Purpose" class="appointment_scheduler_Purpose"><div class="ew-table-header-caption"><?php echo $appointment_scheduler_list->Purpose->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Purpose" class="<?php echo $appointment_scheduler_list->Purpose->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $appointment_scheduler_list->SortUrl($appointment_scheduler_list->Purpose) ?>', 1);"><div id="elh_appointment_scheduler_Purpose" class="appointment_scheduler_Purpose">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_scheduler_list->Purpose->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($appointment_scheduler_list->Purpose->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_scheduler_list->Purpose->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_scheduler_list->Notes->Visible) { // Notes ?>
	<?php if ($appointment_scheduler_list->SortUrl($appointment_scheduler_list->Notes) == "") { ?>
		<th data-name="Notes" class="<?php echo $appointment_scheduler_list->Notes->headerCellClass() ?>"><div id="elh_appointment_scheduler_Notes" class="appointment_scheduler_Notes"><div class="ew-table-header-caption"><?php echo $appointment_scheduler_list->Notes->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Notes" class="<?php echo $appointment_scheduler_list->Notes->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $appointment_scheduler_list->SortUrl($appointment_scheduler_list->Notes) ?>', 1);"><div id="elh_appointment_scheduler_Notes" class="appointment_scheduler_Notes">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_scheduler_list->Notes->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($appointment_scheduler_list->Notes->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_scheduler_list->Notes->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_scheduler_list->PatientType->Visible) { // PatientType ?>
	<?php if ($appointment_scheduler_list->SortUrl($appointment_scheduler_list->PatientType) == "") { ?>
		<th data-name="PatientType" class="<?php echo $appointment_scheduler_list->PatientType->headerCellClass() ?>"><div id="elh_appointment_scheduler_PatientType" class="appointment_scheduler_PatientType"><div class="ew-table-header-caption"><?php echo $appointment_scheduler_list->PatientType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientType" class="<?php echo $appointment_scheduler_list->PatientType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $appointment_scheduler_list->SortUrl($appointment_scheduler_list->PatientType) ?>', 1);"><div id="elh_appointment_scheduler_PatientType" class="appointment_scheduler_PatientType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_scheduler_list->PatientType->caption() ?></span><span class="ew-table-header-sort"><?php if ($appointment_scheduler_list->PatientType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_scheduler_list->PatientType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_scheduler_list->Referal->Visible) { // Referal ?>
	<?php if ($appointment_scheduler_list->SortUrl($appointment_scheduler_list->Referal) == "") { ?>
		<th data-name="Referal" class="<?php echo $appointment_scheduler_list->Referal->headerCellClass() ?>"><div id="elh_appointment_scheduler_Referal" class="appointment_scheduler_Referal"><div class="ew-table-header-caption"><?php echo $appointment_scheduler_list->Referal->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Referal" class="<?php echo $appointment_scheduler_list->Referal->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $appointment_scheduler_list->SortUrl($appointment_scheduler_list->Referal) ?>', 1);"><div id="elh_appointment_scheduler_Referal" class="appointment_scheduler_Referal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_scheduler_list->Referal->caption() ?></span><span class="ew-table-header-sort"><?php if ($appointment_scheduler_list->Referal->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_scheduler_list->Referal->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_scheduler_list->paymentType->Visible) { // paymentType ?>
	<?php if ($appointment_scheduler_list->SortUrl($appointment_scheduler_list->paymentType) == "") { ?>
		<th data-name="paymentType" class="<?php echo $appointment_scheduler_list->paymentType->headerCellClass() ?>"><div id="elh_appointment_scheduler_paymentType" class="appointment_scheduler_paymentType"><div class="ew-table-header-caption"><?php echo $appointment_scheduler_list->paymentType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="paymentType" class="<?php echo $appointment_scheduler_list->paymentType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $appointment_scheduler_list->SortUrl($appointment_scheduler_list->paymentType) ?>', 1);"><div id="elh_appointment_scheduler_paymentType" class="appointment_scheduler_paymentType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_scheduler_list->paymentType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($appointment_scheduler_list->paymentType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_scheduler_list->paymentType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_scheduler_list->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
	<?php if ($appointment_scheduler_list->SortUrl($appointment_scheduler_list->WhereDidYouHear) == "") { ?>
		<th data-name="WhereDidYouHear" class="<?php echo $appointment_scheduler_list->WhereDidYouHear->headerCellClass() ?>"><div id="elh_appointment_scheduler_WhereDidYouHear" class="appointment_scheduler_WhereDidYouHear"><div class="ew-table-header-caption"><?php echo $appointment_scheduler_list->WhereDidYouHear->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="WhereDidYouHear" class="<?php echo $appointment_scheduler_list->WhereDidYouHear->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $appointment_scheduler_list->SortUrl($appointment_scheduler_list->WhereDidYouHear) ?>', 1);"><div id="elh_appointment_scheduler_WhereDidYouHear" class="appointment_scheduler_WhereDidYouHear">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_scheduler_list->WhereDidYouHear->caption() ?></span><span class="ew-table-header-sort"><?php if ($appointment_scheduler_list->WhereDidYouHear->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_scheduler_list->WhereDidYouHear->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_scheduler_list->HospID->Visible) { // HospID ?>
	<?php if ($appointment_scheduler_list->SortUrl($appointment_scheduler_list->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $appointment_scheduler_list->HospID->headerCellClass() ?>"><div id="elh_appointment_scheduler_HospID" class="appointment_scheduler_HospID"><div class="ew-table-header-caption"><?php echo $appointment_scheduler_list->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $appointment_scheduler_list->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $appointment_scheduler_list->SortUrl($appointment_scheduler_list->HospID) ?>', 1);"><div id="elh_appointment_scheduler_HospID" class="appointment_scheduler_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_scheduler_list->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($appointment_scheduler_list->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_scheduler_list->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_scheduler_list->createdBy->Visible) { // createdBy ?>
	<?php if ($appointment_scheduler_list->SortUrl($appointment_scheduler_list->createdBy) == "") { ?>
		<th data-name="createdBy" class="<?php echo $appointment_scheduler_list->createdBy->headerCellClass() ?>"><div id="elh_appointment_scheduler_createdBy" class="appointment_scheduler_createdBy"><div class="ew-table-header-caption"><?php echo $appointment_scheduler_list->createdBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdBy" class="<?php echo $appointment_scheduler_list->createdBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $appointment_scheduler_list->SortUrl($appointment_scheduler_list->createdBy) ?>', 1);"><div id="elh_appointment_scheduler_createdBy" class="appointment_scheduler_createdBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_scheduler_list->createdBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($appointment_scheduler_list->createdBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_scheduler_list->createdBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_scheduler_list->createdDateTime->Visible) { // createdDateTime ?>
	<?php if ($appointment_scheduler_list->SortUrl($appointment_scheduler_list->createdDateTime) == "") { ?>
		<th data-name="createdDateTime" class="<?php echo $appointment_scheduler_list->createdDateTime->headerCellClass() ?>"><div id="elh_appointment_scheduler_createdDateTime" class="appointment_scheduler_createdDateTime"><div class="ew-table-header-caption"><?php echo $appointment_scheduler_list->createdDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdDateTime" class="<?php echo $appointment_scheduler_list->createdDateTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $appointment_scheduler_list->SortUrl($appointment_scheduler_list->createdDateTime) ?>', 1);"><div id="elh_appointment_scheduler_createdDateTime" class="appointment_scheduler_createdDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_scheduler_list->createdDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($appointment_scheduler_list->createdDateTime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_scheduler_list->createdDateTime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($appointment_scheduler_list->PatientTypee->Visible) { // PatientTypee ?>
	<?php if ($appointment_scheduler_list->SortUrl($appointment_scheduler_list->PatientTypee) == "") { ?>
		<th data-name="PatientTypee" class="<?php echo $appointment_scheduler_list->PatientTypee->headerCellClass() ?>"><div id="elh_appointment_scheduler_PatientTypee" class="appointment_scheduler_PatientTypee"><div class="ew-table-header-caption"><?php echo $appointment_scheduler_list->PatientTypee->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientTypee" class="<?php echo $appointment_scheduler_list->PatientTypee->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $appointment_scheduler_list->SortUrl($appointment_scheduler_list->PatientTypee) ?>', 1);"><div id="elh_appointment_scheduler_PatientTypee" class="appointment_scheduler_PatientTypee">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $appointment_scheduler_list->PatientTypee->caption() ?></span><span class="ew-table-header-sort"><?php if ($appointment_scheduler_list->PatientTypee->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($appointment_scheduler_list->PatientTypee->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$appointment_scheduler_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($appointment_scheduler_list->ExportAll && $appointment_scheduler_list->isExport()) {
	$appointment_scheduler_list->StopRecord = $appointment_scheduler_list->TotalRecords;
} else {

	// Set the last record to display
	if ($appointment_scheduler_list->TotalRecords > $appointment_scheduler_list->StartRecord + $appointment_scheduler_list->DisplayRecords - 1)
		$appointment_scheduler_list->StopRecord = $appointment_scheduler_list->StartRecord + $appointment_scheduler_list->DisplayRecords - 1;
	else
		$appointment_scheduler_list->StopRecord = $appointment_scheduler_list->TotalRecords;
}
$appointment_scheduler_list->RecordCount = $appointment_scheduler_list->StartRecord - 1;
if ($appointment_scheduler_list->Recordset && !$appointment_scheduler_list->Recordset->EOF) {
	$appointment_scheduler_list->Recordset->moveFirst();
	$selectLimit = $appointment_scheduler_list->UseSelectLimit;
	if (!$selectLimit && $appointment_scheduler_list->StartRecord > 1)
		$appointment_scheduler_list->Recordset->move($appointment_scheduler_list->StartRecord - 1);
} elseif (!$appointment_scheduler->AllowAddDeleteRow && $appointment_scheduler_list->StopRecord == 0) {
	$appointment_scheduler_list->StopRecord = $appointment_scheduler->GridAddRowCount;
}

// Initialize aggregate
$appointment_scheduler->RowType = ROWTYPE_AGGREGATEINIT;
$appointment_scheduler->resetAttributes();
$appointment_scheduler_list->renderRow();
while ($appointment_scheduler_list->RecordCount < $appointment_scheduler_list->StopRecord) {
	$appointment_scheduler_list->RecordCount++;
	if ($appointment_scheduler_list->RecordCount >= $appointment_scheduler_list->StartRecord) {
		$appointment_scheduler_list->RowCount++;

		// Set up key count
		$appointment_scheduler_list->KeyCount = $appointment_scheduler_list->RowIndex;

		// Init row class and style
		$appointment_scheduler->resetAttributes();
		$appointment_scheduler->CssClass = "";
		if ($appointment_scheduler_list->isGridAdd()) {
		} else {
			$appointment_scheduler_list->loadRowValues($appointment_scheduler_list->Recordset); // Load row values
		}
		$appointment_scheduler->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$appointment_scheduler->RowAttrs->merge(["data-rowindex" => $appointment_scheduler_list->RowCount, "id" => "r" . $appointment_scheduler_list->RowCount . "_appointment_scheduler", "data-rowtype" => $appointment_scheduler->RowType]);

		// Render row
		$appointment_scheduler_list->renderRow();

		// Render list options
		$appointment_scheduler_list->renderListOptions();
?>
	<tr <?php echo $appointment_scheduler->rowAttributes() ?>>
<?php

// Render list options (body, left)
$appointment_scheduler_list->ListOptions->render("body", "left", $appointment_scheduler_list->RowCount);
?>
	<?php if ($appointment_scheduler_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $appointment_scheduler_list->id->cellAttributes() ?>>
<span id="el<?php echo $appointment_scheduler_list->RowCount ?>_appointment_scheduler_id">
<span<?php echo $appointment_scheduler_list->id->viewAttributes() ?>><?php echo $appointment_scheduler_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_list->start_date->Visible) { // start_date ?>
		<td data-name="start_date" <?php echo $appointment_scheduler_list->start_date->cellAttributes() ?>>
<span id="el<?php echo $appointment_scheduler_list->RowCount ?>_appointment_scheduler_start_date">
<span<?php echo $appointment_scheduler_list->start_date->viewAttributes() ?>><?php echo $appointment_scheduler_list->start_date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_list->end_date->Visible) { // end_date ?>
		<td data-name="end_date" <?php echo $appointment_scheduler_list->end_date->cellAttributes() ?>>
<span id="el<?php echo $appointment_scheduler_list->RowCount ?>_appointment_scheduler_end_date">
<span<?php echo $appointment_scheduler_list->end_date->viewAttributes() ?>><?php echo $appointment_scheduler_list->end_date->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_list->patientID->Visible) { // patientID ?>
		<td data-name="patientID" <?php echo $appointment_scheduler_list->patientID->cellAttributes() ?>>
<span id="el<?php echo $appointment_scheduler_list->RowCount ?>_appointment_scheduler_patientID">
<span<?php echo $appointment_scheduler_list->patientID->viewAttributes() ?>><?php echo $appointment_scheduler_list->patientID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_list->patientName->Visible) { // patientName ?>
		<td data-name="patientName" <?php echo $appointment_scheduler_list->patientName->cellAttributes() ?>>
<span id="el<?php echo $appointment_scheduler_list->RowCount ?>_appointment_scheduler_patientName">
<span<?php echo $appointment_scheduler_list->patientName->viewAttributes() ?>><?php echo $appointment_scheduler_list->patientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_list->DoctorID->Visible) { // DoctorID ?>
		<td data-name="DoctorID" <?php echo $appointment_scheduler_list->DoctorID->cellAttributes() ?>>
<span id="el<?php echo $appointment_scheduler_list->RowCount ?>_appointment_scheduler_DoctorID">
<span<?php echo $appointment_scheduler_list->DoctorID->viewAttributes() ?>><?php echo $appointment_scheduler_list->DoctorID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_list->DoctorName->Visible) { // DoctorName ?>
		<td data-name="DoctorName" <?php echo $appointment_scheduler_list->DoctorName->cellAttributes() ?>>
<span id="el<?php echo $appointment_scheduler_list->RowCount ?>_appointment_scheduler_DoctorName">
<span<?php echo $appointment_scheduler_list->DoctorName->viewAttributes() ?>><?php echo $appointment_scheduler_list->DoctorName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_list->AppointmentStatus->Visible) { // AppointmentStatus ?>
		<td data-name="AppointmentStatus" <?php echo $appointment_scheduler_list->AppointmentStatus->cellAttributes() ?>>
<span id="el<?php echo $appointment_scheduler_list->RowCount ?>_appointment_scheduler_AppointmentStatus">
<span<?php echo $appointment_scheduler_list->AppointmentStatus->viewAttributes() ?>><?php echo $appointment_scheduler_list->AppointmentStatus->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_list->status->Visible) { // status ?>
		<td data-name="status" <?php echo $appointment_scheduler_list->status->cellAttributes() ?>>
<span id="el<?php echo $appointment_scheduler_list->RowCount ?>_appointment_scheduler_status">
<span<?php echo $appointment_scheduler_list->status->viewAttributes() ?>><?php echo $appointment_scheduler_list->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_list->DoctorCode->Visible) { // DoctorCode ?>
		<td data-name="DoctorCode" <?php echo $appointment_scheduler_list->DoctorCode->cellAttributes() ?>>
<span id="el<?php echo $appointment_scheduler_list->RowCount ?>_appointment_scheduler_DoctorCode">
<span<?php echo $appointment_scheduler_list->DoctorCode->viewAttributes() ?>><?php echo $appointment_scheduler_list->DoctorCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_list->Department->Visible) { // Department ?>
		<td data-name="Department" <?php echo $appointment_scheduler_list->Department->cellAttributes() ?>>
<span id="el<?php echo $appointment_scheduler_list->RowCount ?>_appointment_scheduler_Department">
<span<?php echo $appointment_scheduler_list->Department->viewAttributes() ?>><?php echo $appointment_scheduler_list->Department->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_list->scheduler_id->Visible) { // scheduler_id ?>
		<td data-name="scheduler_id" <?php echo $appointment_scheduler_list->scheduler_id->cellAttributes() ?>>
<span id="el<?php echo $appointment_scheduler_list->RowCount ?>_appointment_scheduler_scheduler_id">
<span<?php echo $appointment_scheduler_list->scheduler_id->viewAttributes() ?>><?php echo $appointment_scheduler_list->scheduler_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_list->text->Visible) { // text ?>
		<td data-name="text" <?php echo $appointment_scheduler_list->text->cellAttributes() ?>>
<span id="el<?php echo $appointment_scheduler_list->RowCount ?>_appointment_scheduler_text">
<span<?php echo $appointment_scheduler_list->text->viewAttributes() ?>><?php echo $appointment_scheduler_list->text->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_list->appointment_status->Visible) { // appointment_status ?>
		<td data-name="appointment_status" <?php echo $appointment_scheduler_list->appointment_status->cellAttributes() ?>>
<span id="el<?php echo $appointment_scheduler_list->RowCount ?>_appointment_scheduler_appointment_status">
<span<?php echo $appointment_scheduler_list->appointment_status->viewAttributes() ?>><?php echo $appointment_scheduler_list->appointment_status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_list->PId->Visible) { // PId ?>
		<td data-name="PId" <?php echo $appointment_scheduler_list->PId->cellAttributes() ?>>
<span id="el<?php echo $appointment_scheduler_list->RowCount ?>_appointment_scheduler_PId">
<span<?php echo $appointment_scheduler_list->PId->viewAttributes() ?>><?php echo $appointment_scheduler_list->PId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_list->MobileNumber->Visible) { // MobileNumber ?>
		<td data-name="MobileNumber" <?php echo $appointment_scheduler_list->MobileNumber->cellAttributes() ?>>
<span id="el<?php echo $appointment_scheduler_list->RowCount ?>_appointment_scheduler_MobileNumber">
<span<?php echo $appointment_scheduler_list->MobileNumber->viewAttributes() ?>><?php echo $appointment_scheduler_list->MobileNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_list->SchEmail->Visible) { // SchEmail ?>
		<td data-name="SchEmail" <?php echo $appointment_scheduler_list->SchEmail->cellAttributes() ?>>
<span id="el<?php echo $appointment_scheduler_list->RowCount ?>_appointment_scheduler_SchEmail">
<span<?php echo $appointment_scheduler_list->SchEmail->viewAttributes() ?>><?php echo $appointment_scheduler_list->SchEmail->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_list->appointment_type->Visible) { // appointment_type ?>
		<td data-name="appointment_type" <?php echo $appointment_scheduler_list->appointment_type->cellAttributes() ?>>
<span id="el<?php echo $appointment_scheduler_list->RowCount ?>_appointment_scheduler_appointment_type">
<span<?php echo $appointment_scheduler_list->appointment_type->viewAttributes() ?>><?php echo $appointment_scheduler_list->appointment_type->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_list->Notified->Visible) { // Notified ?>
		<td data-name="Notified" <?php echo $appointment_scheduler_list->Notified->cellAttributes() ?>>
<span id="el<?php echo $appointment_scheduler_list->RowCount ?>_appointment_scheduler_Notified">
<span<?php echo $appointment_scheduler_list->Notified->viewAttributes() ?>><?php echo $appointment_scheduler_list->Notified->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_list->Purpose->Visible) { // Purpose ?>
		<td data-name="Purpose" <?php echo $appointment_scheduler_list->Purpose->cellAttributes() ?>>
<span id="el<?php echo $appointment_scheduler_list->RowCount ?>_appointment_scheduler_Purpose">
<span<?php echo $appointment_scheduler_list->Purpose->viewAttributes() ?>><?php echo $appointment_scheduler_list->Purpose->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_list->Notes->Visible) { // Notes ?>
		<td data-name="Notes" <?php echo $appointment_scheduler_list->Notes->cellAttributes() ?>>
<span id="el<?php echo $appointment_scheduler_list->RowCount ?>_appointment_scheduler_Notes">
<span<?php echo $appointment_scheduler_list->Notes->viewAttributes() ?>><?php echo $appointment_scheduler_list->Notes->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_list->PatientType->Visible) { // PatientType ?>
		<td data-name="PatientType" <?php echo $appointment_scheduler_list->PatientType->cellAttributes() ?>>
<span id="el<?php echo $appointment_scheduler_list->RowCount ?>_appointment_scheduler_PatientType">
<span<?php echo $appointment_scheduler_list->PatientType->viewAttributes() ?>><?php echo $appointment_scheduler_list->PatientType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_list->Referal->Visible) { // Referal ?>
		<td data-name="Referal" <?php echo $appointment_scheduler_list->Referal->cellAttributes() ?>>
<span id="el<?php echo $appointment_scheduler_list->RowCount ?>_appointment_scheduler_Referal">
<span<?php echo $appointment_scheduler_list->Referal->viewAttributes() ?>><?php echo $appointment_scheduler_list->Referal->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_list->paymentType->Visible) { // paymentType ?>
		<td data-name="paymentType" <?php echo $appointment_scheduler_list->paymentType->cellAttributes() ?>>
<span id="el<?php echo $appointment_scheduler_list->RowCount ?>_appointment_scheduler_paymentType">
<span<?php echo $appointment_scheduler_list->paymentType->viewAttributes() ?>><?php echo $appointment_scheduler_list->paymentType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_list->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
		<td data-name="WhereDidYouHear" <?php echo $appointment_scheduler_list->WhereDidYouHear->cellAttributes() ?>>
<span id="el<?php echo $appointment_scheduler_list->RowCount ?>_appointment_scheduler_WhereDidYouHear">
<span<?php echo $appointment_scheduler_list->WhereDidYouHear->viewAttributes() ?>><?php echo $appointment_scheduler_list->WhereDidYouHear->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $appointment_scheduler_list->HospID->cellAttributes() ?>>
<span id="el<?php echo $appointment_scheduler_list->RowCount ?>_appointment_scheduler_HospID">
<span<?php echo $appointment_scheduler_list->HospID->viewAttributes() ?>><?php echo $appointment_scheduler_list->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_list->createdBy->Visible) { // createdBy ?>
		<td data-name="createdBy" <?php echo $appointment_scheduler_list->createdBy->cellAttributes() ?>>
<span id="el<?php echo $appointment_scheduler_list->RowCount ?>_appointment_scheduler_createdBy">
<span<?php echo $appointment_scheduler_list->createdBy->viewAttributes() ?>><?php echo $appointment_scheduler_list->createdBy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_list->createdDateTime->Visible) { // createdDateTime ?>
		<td data-name="createdDateTime" <?php echo $appointment_scheduler_list->createdDateTime->cellAttributes() ?>>
<span id="el<?php echo $appointment_scheduler_list->RowCount ?>_appointment_scheduler_createdDateTime">
<span<?php echo $appointment_scheduler_list->createdDateTime->viewAttributes() ?>><?php echo $appointment_scheduler_list->createdDateTime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($appointment_scheduler_list->PatientTypee->Visible) { // PatientTypee ?>
		<td data-name="PatientTypee" <?php echo $appointment_scheduler_list->PatientTypee->cellAttributes() ?>>
<span id="el<?php echo $appointment_scheduler_list->RowCount ?>_appointment_scheduler_PatientTypee">
<span<?php echo $appointment_scheduler_list->PatientTypee->viewAttributes() ?>><?php echo $appointment_scheduler_list->PatientTypee->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$appointment_scheduler_list->ListOptions->render("body", "right", $appointment_scheduler_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$appointment_scheduler_list->isGridAdd())
		$appointment_scheduler_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$appointment_scheduler->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($appointment_scheduler_list->Recordset)
	$appointment_scheduler_list->Recordset->Close();
?>
<?php if (!$appointment_scheduler_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$appointment_scheduler_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $appointment_scheduler_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $appointment_scheduler_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($appointment_scheduler_list->TotalRecords == 0 && !$appointment_scheduler->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $appointment_scheduler_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$appointment_scheduler_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$appointment_scheduler_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$appointment_scheduler->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_appointment_scheduler",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$appointment_scheduler_list->terminate();
?>