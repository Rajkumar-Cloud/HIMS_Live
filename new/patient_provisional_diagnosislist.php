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
$patient_provisional_diagnosis_list = new patient_provisional_diagnosis_list();

// Run the page
$patient_provisional_diagnosis_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_provisional_diagnosis_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$patient_provisional_diagnosis_list->isExport()) { ?>
<script>
var fpatient_provisional_diagnosislist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fpatient_provisional_diagnosislist = currentForm = new ew.Form("fpatient_provisional_diagnosislist", "list");
	fpatient_provisional_diagnosislist.formKeyCountName = '<?php echo $patient_provisional_diagnosis_list->FormKeyCountName ?>';
	loadjs.done("fpatient_provisional_diagnosislist");
});
var fpatient_provisional_diagnosislistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fpatient_provisional_diagnosislistsrch = currentSearchForm = new ew.Form("fpatient_provisional_diagnosislistsrch");

	// Dynamic selection lists
	// Filters

	fpatient_provisional_diagnosislistsrch.filterList = <?php echo $patient_provisional_diagnosis_list->getFilterList() ?>;
	loadjs.done("fpatient_provisional_diagnosislistsrch");
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
<?php if (!$patient_provisional_diagnosis_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($patient_provisional_diagnosis_list->TotalRecords > 0 && $patient_provisional_diagnosis_list->ExportOptions->visible()) { ?>
<?php $patient_provisional_diagnosis_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($patient_provisional_diagnosis_list->ImportOptions->visible()) { ?>
<?php $patient_provisional_diagnosis_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($patient_provisional_diagnosis_list->SearchOptions->visible()) { ?>
<?php $patient_provisional_diagnosis_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($patient_provisional_diagnosis_list->FilterOptions->visible()) { ?>
<?php $patient_provisional_diagnosis_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$patient_provisional_diagnosis_list->isExport() || Config("EXPORT_MASTER_RECORD") && $patient_provisional_diagnosis_list->isExport("print")) { ?>
<?php
if ($patient_provisional_diagnosis_list->DbMasterFilter != "" && $patient_provisional_diagnosis->getCurrentMasterTable() == "ip_admission") {
	if ($patient_provisional_diagnosis_list->MasterRecordExists) {
		include_once "ip_admissionmaster.php";
	}
}
?>
<?php } ?>
<?php
$patient_provisional_diagnosis_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$patient_provisional_diagnosis_list->isExport() && !$patient_provisional_diagnosis->CurrentAction) { ?>
<form name="fpatient_provisional_diagnosislistsrch" id="fpatient_provisional_diagnosislistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fpatient_provisional_diagnosislistsrch-search-panel" class="<?php echo $patient_provisional_diagnosis_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="patient_provisional_diagnosis">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $patient_provisional_diagnosis_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($patient_provisional_diagnosis_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($patient_provisional_diagnosis_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $patient_provisional_diagnosis_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($patient_provisional_diagnosis_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($patient_provisional_diagnosis_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($patient_provisional_diagnosis_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($patient_provisional_diagnosis_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $patient_provisional_diagnosis_list->showPageHeader(); ?>
<?php
$patient_provisional_diagnosis_list->showMessage();
?>
<?php if ($patient_provisional_diagnosis_list->TotalRecords > 0 || $patient_provisional_diagnosis->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($patient_provisional_diagnosis_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_provisional_diagnosis">
<?php if (!$patient_provisional_diagnosis_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$patient_provisional_diagnosis_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $patient_provisional_diagnosis_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $patient_provisional_diagnosis_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpatient_provisional_diagnosislist" id="fpatient_provisional_diagnosislist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_provisional_diagnosis">
<?php if ($patient_provisional_diagnosis->getCurrentMasterTable() == "ip_admission" && $patient_provisional_diagnosis->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="ip_admission">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($patient_provisional_diagnosis_list->Reception->getSessionValue()) ?>">
<input type="hidden" name="fk_patient_id" value="<?php echo HtmlEncode($patient_provisional_diagnosis_list->PatientId->getSessionValue()) ?>">
<input type="hidden" name="fk_mrnNo" value="<?php echo HtmlEncode($patient_provisional_diagnosis_list->mrnno->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_patient_provisional_diagnosis" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($patient_provisional_diagnosis_list->TotalRecords > 0 || $patient_provisional_diagnosis_list->isGridEdit()) { ?>
<table id="tbl_patient_provisional_diagnosislist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$patient_provisional_diagnosis->RowType = ROWTYPE_HEADER;

// Render list options
$patient_provisional_diagnosis_list->renderListOptions();

// Render list options (header, left)
$patient_provisional_diagnosis_list->ListOptions->render("header", "left");
?>
<?php if ($patient_provisional_diagnosis_list->id->Visible) { // id ?>
	<?php if ($patient_provisional_diagnosis_list->SortUrl($patient_provisional_diagnosis_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $patient_provisional_diagnosis_list->id->headerCellClass() ?>"><div id="elh_patient_provisional_diagnosis_id" class="patient_provisional_diagnosis_id"><div class="ew-table-header-caption"><?php echo $patient_provisional_diagnosis_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $patient_provisional_diagnosis_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_provisional_diagnosis_list->SortUrl($patient_provisional_diagnosis_list->id) ?>', 1);"><div id="elh_patient_provisional_diagnosis_id" class="patient_provisional_diagnosis_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_provisional_diagnosis_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_provisional_diagnosis_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_provisional_diagnosis_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_provisional_diagnosis_list->mrnno->Visible) { // mrnno ?>
	<?php if ($patient_provisional_diagnosis_list->SortUrl($patient_provisional_diagnosis_list->mrnno) == "") { ?>
		<th data-name="mrnno" class="<?php echo $patient_provisional_diagnosis_list->mrnno->headerCellClass() ?>"><div id="elh_patient_provisional_diagnosis_mrnno" class="patient_provisional_diagnosis_mrnno"><div class="ew-table-header-caption"><?php echo $patient_provisional_diagnosis_list->mrnno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnno" class="<?php echo $patient_provisional_diagnosis_list->mrnno->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_provisional_diagnosis_list->SortUrl($patient_provisional_diagnosis_list->mrnno) ?>', 1);"><div id="elh_patient_provisional_diagnosis_mrnno" class="patient_provisional_diagnosis_mrnno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_provisional_diagnosis_list->mrnno->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_provisional_diagnosis_list->mrnno->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_provisional_diagnosis_list->mrnno->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_provisional_diagnosis_list->PatientName->Visible) { // PatientName ?>
	<?php if ($patient_provisional_diagnosis_list->SortUrl($patient_provisional_diagnosis_list->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $patient_provisional_diagnosis_list->PatientName->headerCellClass() ?>"><div id="elh_patient_provisional_diagnosis_PatientName" class="patient_provisional_diagnosis_PatientName"><div class="ew-table-header-caption"><?php echo $patient_provisional_diagnosis_list->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $patient_provisional_diagnosis_list->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_provisional_diagnosis_list->SortUrl($patient_provisional_diagnosis_list->PatientName) ?>', 1);"><div id="elh_patient_provisional_diagnosis_PatientName" class="patient_provisional_diagnosis_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_provisional_diagnosis_list->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_provisional_diagnosis_list->PatientName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_provisional_diagnosis_list->PatientName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_provisional_diagnosis_list->PatID->Visible) { // PatID ?>
	<?php if ($patient_provisional_diagnosis_list->SortUrl($patient_provisional_diagnosis_list->PatID) == "") { ?>
		<th data-name="PatID" class="<?php echo $patient_provisional_diagnosis_list->PatID->headerCellClass() ?>"><div id="elh_patient_provisional_diagnosis_PatID" class="patient_provisional_diagnosis_PatID"><div class="ew-table-header-caption"><?php echo $patient_provisional_diagnosis_list->PatID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatID" class="<?php echo $patient_provisional_diagnosis_list->PatID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_provisional_diagnosis_list->SortUrl($patient_provisional_diagnosis_list->PatID) ?>', 1);"><div id="elh_patient_provisional_diagnosis_PatID" class="patient_provisional_diagnosis_PatID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_provisional_diagnosis_list->PatID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_provisional_diagnosis_list->PatID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_provisional_diagnosis_list->PatID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_provisional_diagnosis_list->MobileNumber->Visible) { // MobileNumber ?>
	<?php if ($patient_provisional_diagnosis_list->SortUrl($patient_provisional_diagnosis_list->MobileNumber) == "") { ?>
		<th data-name="MobileNumber" class="<?php echo $patient_provisional_diagnosis_list->MobileNumber->headerCellClass() ?>"><div id="elh_patient_provisional_diagnosis_MobileNumber" class="patient_provisional_diagnosis_MobileNumber"><div class="ew-table-header-caption"><?php echo $patient_provisional_diagnosis_list->MobileNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MobileNumber" class="<?php echo $patient_provisional_diagnosis_list->MobileNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_provisional_diagnosis_list->SortUrl($patient_provisional_diagnosis_list->MobileNumber) ?>', 1);"><div id="elh_patient_provisional_diagnosis_MobileNumber" class="patient_provisional_diagnosis_MobileNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_provisional_diagnosis_list->MobileNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_provisional_diagnosis_list->MobileNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_provisional_diagnosis_list->MobileNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_provisional_diagnosis_list->Reception->Visible) { // Reception ?>
	<?php if ($patient_provisional_diagnosis_list->SortUrl($patient_provisional_diagnosis_list->Reception) == "") { ?>
		<th data-name="Reception" class="<?php echo $patient_provisional_diagnosis_list->Reception->headerCellClass() ?>"><div id="elh_patient_provisional_diagnosis_Reception" class="patient_provisional_diagnosis_Reception"><div class="ew-table-header-caption"><?php echo $patient_provisional_diagnosis_list->Reception->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Reception" class="<?php echo $patient_provisional_diagnosis_list->Reception->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_provisional_diagnosis_list->SortUrl($patient_provisional_diagnosis_list->Reception) ?>', 1);"><div id="elh_patient_provisional_diagnosis_Reception" class="patient_provisional_diagnosis_Reception">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_provisional_diagnosis_list->Reception->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_provisional_diagnosis_list->Reception->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_provisional_diagnosis_list->Reception->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_provisional_diagnosis_list->PatientId->Visible) { // PatientId ?>
	<?php if ($patient_provisional_diagnosis_list->SortUrl($patient_provisional_diagnosis_list->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $patient_provisional_diagnosis_list->PatientId->headerCellClass() ?>"><div id="elh_patient_provisional_diagnosis_PatientId" class="patient_provisional_diagnosis_PatientId"><div class="ew-table-header-caption"><?php echo $patient_provisional_diagnosis_list->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $patient_provisional_diagnosis_list->PatientId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_provisional_diagnosis_list->SortUrl($patient_provisional_diagnosis_list->PatientId) ?>', 1);"><div id="elh_patient_provisional_diagnosis_PatientId" class="patient_provisional_diagnosis_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_provisional_diagnosis_list->PatientId->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_provisional_diagnosis_list->PatientId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_provisional_diagnosis_list->PatientId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_provisional_diagnosis_list->Age->Visible) { // Age ?>
	<?php if ($patient_provisional_diagnosis_list->SortUrl($patient_provisional_diagnosis_list->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $patient_provisional_diagnosis_list->Age->headerCellClass() ?>"><div id="elh_patient_provisional_diagnosis_Age" class="patient_provisional_diagnosis_Age"><div class="ew-table-header-caption"><?php echo $patient_provisional_diagnosis_list->Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $patient_provisional_diagnosis_list->Age->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_provisional_diagnosis_list->SortUrl($patient_provisional_diagnosis_list->Age) ?>', 1);"><div id="elh_patient_provisional_diagnosis_Age" class="patient_provisional_diagnosis_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_provisional_diagnosis_list->Age->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_provisional_diagnosis_list->Age->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_provisional_diagnosis_list->Age->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_provisional_diagnosis_list->Gender->Visible) { // Gender ?>
	<?php if ($patient_provisional_diagnosis_list->SortUrl($patient_provisional_diagnosis_list->Gender) == "") { ?>
		<th data-name="Gender" class="<?php echo $patient_provisional_diagnosis_list->Gender->headerCellClass() ?>"><div id="elh_patient_provisional_diagnosis_Gender" class="patient_provisional_diagnosis_Gender"><div class="ew-table-header-caption"><?php echo $patient_provisional_diagnosis_list->Gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gender" class="<?php echo $patient_provisional_diagnosis_list->Gender->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_provisional_diagnosis_list->SortUrl($patient_provisional_diagnosis_list->Gender) ?>', 1);"><div id="elh_patient_provisional_diagnosis_Gender" class="patient_provisional_diagnosis_Gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_provisional_diagnosis_list->Gender->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_provisional_diagnosis_list->Gender->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_provisional_diagnosis_list->Gender->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_provisional_diagnosis_list->HospID->Visible) { // HospID ?>
	<?php if ($patient_provisional_diagnosis_list->SortUrl($patient_provisional_diagnosis_list->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $patient_provisional_diagnosis_list->HospID->headerCellClass() ?>"><div id="elh_patient_provisional_diagnosis_HospID" class="patient_provisional_diagnosis_HospID"><div class="ew-table-header-caption"><?php echo $patient_provisional_diagnosis_list->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $patient_provisional_diagnosis_list->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_provisional_diagnosis_list->SortUrl($patient_provisional_diagnosis_list->HospID) ?>', 1);"><div id="elh_patient_provisional_diagnosis_HospID" class="patient_provisional_diagnosis_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_provisional_diagnosis_list->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_provisional_diagnosis_list->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_provisional_diagnosis_list->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_provisional_diagnosis_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($patient_provisional_diagnosis_list->ExportAll && $patient_provisional_diagnosis_list->isExport()) {
	$patient_provisional_diagnosis_list->StopRecord = $patient_provisional_diagnosis_list->TotalRecords;
} else {

	// Set the last record to display
	if ($patient_provisional_diagnosis_list->TotalRecords > $patient_provisional_diagnosis_list->StartRecord + $patient_provisional_diagnosis_list->DisplayRecords - 1)
		$patient_provisional_diagnosis_list->StopRecord = $patient_provisional_diagnosis_list->StartRecord + $patient_provisional_diagnosis_list->DisplayRecords - 1;
	else
		$patient_provisional_diagnosis_list->StopRecord = $patient_provisional_diagnosis_list->TotalRecords;
}
$patient_provisional_diagnosis_list->RecordCount = $patient_provisional_diagnosis_list->StartRecord - 1;
if ($patient_provisional_diagnosis_list->Recordset && !$patient_provisional_diagnosis_list->Recordset->EOF) {
	$patient_provisional_diagnosis_list->Recordset->moveFirst();
	$selectLimit = $patient_provisional_diagnosis_list->UseSelectLimit;
	if (!$selectLimit && $patient_provisional_diagnosis_list->StartRecord > 1)
		$patient_provisional_diagnosis_list->Recordset->move($patient_provisional_diagnosis_list->StartRecord - 1);
} elseif (!$patient_provisional_diagnosis->AllowAddDeleteRow && $patient_provisional_diagnosis_list->StopRecord == 0) {
	$patient_provisional_diagnosis_list->StopRecord = $patient_provisional_diagnosis->GridAddRowCount;
}

// Initialize aggregate
$patient_provisional_diagnosis->RowType = ROWTYPE_AGGREGATEINIT;
$patient_provisional_diagnosis->resetAttributes();
$patient_provisional_diagnosis_list->renderRow();
while ($patient_provisional_diagnosis_list->RecordCount < $patient_provisional_diagnosis_list->StopRecord) {
	$patient_provisional_diagnosis_list->RecordCount++;
	if ($patient_provisional_diagnosis_list->RecordCount >= $patient_provisional_diagnosis_list->StartRecord) {
		$patient_provisional_diagnosis_list->RowCount++;

		// Set up key count
		$patient_provisional_diagnosis_list->KeyCount = $patient_provisional_diagnosis_list->RowIndex;

		// Init row class and style
		$patient_provisional_diagnosis->resetAttributes();
		$patient_provisional_diagnosis->CssClass = "";
		if ($patient_provisional_diagnosis_list->isGridAdd()) {
		} else {
			$patient_provisional_diagnosis_list->loadRowValues($patient_provisional_diagnosis_list->Recordset); // Load row values
		}
		$patient_provisional_diagnosis->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$patient_provisional_diagnosis->RowAttrs->merge(["data-rowindex" => $patient_provisional_diagnosis_list->RowCount, "id" => "r" . $patient_provisional_diagnosis_list->RowCount . "_patient_provisional_diagnosis", "data-rowtype" => $patient_provisional_diagnosis->RowType]);

		// Render row
		$patient_provisional_diagnosis_list->renderRow();

		// Render list options
		$patient_provisional_diagnosis_list->renderListOptions();
?>
	<tr <?php echo $patient_provisional_diagnosis->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_provisional_diagnosis_list->ListOptions->render("body", "left", $patient_provisional_diagnosis_list->RowCount);
?>
	<?php if ($patient_provisional_diagnosis_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $patient_provisional_diagnosis_list->id->cellAttributes() ?>>
<span id="el<?php echo $patient_provisional_diagnosis_list->RowCount ?>_patient_provisional_diagnosis_id">
<span<?php echo $patient_provisional_diagnosis_list->id->viewAttributes() ?>><?php echo $patient_provisional_diagnosis_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_provisional_diagnosis_list->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno" <?php echo $patient_provisional_diagnosis_list->mrnno->cellAttributes() ?>>
<span id="el<?php echo $patient_provisional_diagnosis_list->RowCount ?>_patient_provisional_diagnosis_mrnno">
<span<?php echo $patient_provisional_diagnosis_list->mrnno->viewAttributes() ?>><?php echo $patient_provisional_diagnosis_list->mrnno->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_provisional_diagnosis_list->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName" <?php echo $patient_provisional_diagnosis_list->PatientName->cellAttributes() ?>>
<span id="el<?php echo $patient_provisional_diagnosis_list->RowCount ?>_patient_provisional_diagnosis_PatientName">
<span<?php echo $patient_provisional_diagnosis_list->PatientName->viewAttributes() ?>><?php echo $patient_provisional_diagnosis_list->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_provisional_diagnosis_list->PatID->Visible) { // PatID ?>
		<td data-name="PatID" <?php echo $patient_provisional_diagnosis_list->PatID->cellAttributes() ?>>
<span id="el<?php echo $patient_provisional_diagnosis_list->RowCount ?>_patient_provisional_diagnosis_PatID">
<span<?php echo $patient_provisional_diagnosis_list->PatID->viewAttributes() ?>><?php echo $patient_provisional_diagnosis_list->PatID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_provisional_diagnosis_list->MobileNumber->Visible) { // MobileNumber ?>
		<td data-name="MobileNumber" <?php echo $patient_provisional_diagnosis_list->MobileNumber->cellAttributes() ?>>
<span id="el<?php echo $patient_provisional_diagnosis_list->RowCount ?>_patient_provisional_diagnosis_MobileNumber">
<span<?php echo $patient_provisional_diagnosis_list->MobileNumber->viewAttributes() ?>><?php echo $patient_provisional_diagnosis_list->MobileNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_provisional_diagnosis_list->Reception->Visible) { // Reception ?>
		<td data-name="Reception" <?php echo $patient_provisional_diagnosis_list->Reception->cellAttributes() ?>>
<span id="el<?php echo $patient_provisional_diagnosis_list->RowCount ?>_patient_provisional_diagnosis_Reception">
<span<?php echo $patient_provisional_diagnosis_list->Reception->viewAttributes() ?>><?php echo $patient_provisional_diagnosis_list->Reception->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_provisional_diagnosis_list->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId" <?php echo $patient_provisional_diagnosis_list->PatientId->cellAttributes() ?>>
<span id="el<?php echo $patient_provisional_diagnosis_list->RowCount ?>_patient_provisional_diagnosis_PatientId">
<span<?php echo $patient_provisional_diagnosis_list->PatientId->viewAttributes() ?>><?php echo $patient_provisional_diagnosis_list->PatientId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_provisional_diagnosis_list->Age->Visible) { // Age ?>
		<td data-name="Age" <?php echo $patient_provisional_diagnosis_list->Age->cellAttributes() ?>>
<span id="el<?php echo $patient_provisional_diagnosis_list->RowCount ?>_patient_provisional_diagnosis_Age">
<span<?php echo $patient_provisional_diagnosis_list->Age->viewAttributes() ?>><?php echo $patient_provisional_diagnosis_list->Age->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_provisional_diagnosis_list->Gender->Visible) { // Gender ?>
		<td data-name="Gender" <?php echo $patient_provisional_diagnosis_list->Gender->cellAttributes() ?>>
<span id="el<?php echo $patient_provisional_diagnosis_list->RowCount ?>_patient_provisional_diagnosis_Gender">
<span<?php echo $patient_provisional_diagnosis_list->Gender->viewAttributes() ?>><?php echo $patient_provisional_diagnosis_list->Gender->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_provisional_diagnosis_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $patient_provisional_diagnosis_list->HospID->cellAttributes() ?>>
<span id="el<?php echo $patient_provisional_diagnosis_list->RowCount ?>_patient_provisional_diagnosis_HospID">
<span<?php echo $patient_provisional_diagnosis_list->HospID->viewAttributes() ?>><?php echo $patient_provisional_diagnosis_list->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_provisional_diagnosis_list->ListOptions->render("body", "right", $patient_provisional_diagnosis_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$patient_provisional_diagnosis_list->isGridAdd())
		$patient_provisional_diagnosis_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$patient_provisional_diagnosis->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($patient_provisional_diagnosis_list->Recordset)
	$patient_provisional_diagnosis_list->Recordset->Close();
?>
<?php if (!$patient_provisional_diagnosis_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$patient_provisional_diagnosis_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $patient_provisional_diagnosis_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $patient_provisional_diagnosis_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($patient_provisional_diagnosis_list->TotalRecords == 0 && !$patient_provisional_diagnosis->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $patient_provisional_diagnosis_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$patient_provisional_diagnosis_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$patient_provisional_diagnosis_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$patient_provisional_diagnosis->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_patient_provisional_diagnosis",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$patient_provisional_diagnosis_list->terminate();
?>