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
<?php include_once "header.php"; ?>
<?php if (!$patient_follow_up_list->isExport()) { ?>
<script>
var fpatient_follow_uplist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fpatient_follow_uplist = currentForm = new ew.Form("fpatient_follow_uplist", "list");
	fpatient_follow_uplist.formKeyCountName = '<?php echo $patient_follow_up_list->FormKeyCountName ?>';
	loadjs.done("fpatient_follow_uplist");
});
var fpatient_follow_uplistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fpatient_follow_uplistsrch = currentSearchForm = new ew.Form("fpatient_follow_uplistsrch");

	// Dynamic selection lists
	// Filters

	fpatient_follow_uplistsrch.filterList = <?php echo $patient_follow_up_list->getFilterList() ?>;
	loadjs.done("fpatient_follow_uplistsrch");
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
<?php if (!$patient_follow_up_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($patient_follow_up_list->TotalRecords > 0 && $patient_follow_up_list->ExportOptions->visible()) { ?>
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
<?php if (!$patient_follow_up_list->isExport() || Config("EXPORT_MASTER_RECORD") && $patient_follow_up_list->isExport("print")) { ?>
<?php
if ($patient_follow_up_list->DbMasterFilter != "" && $patient_follow_up->getCurrentMasterTable() == "ip_admission") {
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
<?php if (!$patient_follow_up_list->isExport() && !$patient_follow_up->CurrentAction) { ?>
<form name="fpatient_follow_uplistsrch" id="fpatient_follow_uplistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fpatient_follow_uplistsrch-search-panel" class="<?php echo $patient_follow_up_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="patient_follow_up">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $patient_follow_up_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($patient_follow_up_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($patient_follow_up_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $patient_follow_up_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($patient_follow_up_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($patient_follow_up_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($patient_follow_up_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($patient_follow_up_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $patient_follow_up_list->showPageHeader(); ?>
<?php
$patient_follow_up_list->showMessage();
?>
<?php if ($patient_follow_up_list->TotalRecords > 0 || $patient_follow_up->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($patient_follow_up_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_follow_up">
<?php if (!$patient_follow_up_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$patient_follow_up_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $patient_follow_up_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $patient_follow_up_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpatient_follow_uplist" id="fpatient_follow_uplist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_follow_up">
<?php if ($patient_follow_up->getCurrentMasterTable() == "ip_admission" && $patient_follow_up->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="ip_admission">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($patient_follow_up_list->Reception->getSessionValue()) ?>">
<input type="hidden" name="fk_patient_id" value="<?php echo HtmlEncode($patient_follow_up_list->PatientId->getSessionValue()) ?>">
<input type="hidden" name="fk_mrnNo" value="<?php echo HtmlEncode($patient_follow_up_list->mrnno->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_patient_follow_up" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($patient_follow_up_list->TotalRecords > 0 || $patient_follow_up_list->isGridEdit()) { ?>
<table id="tbl_patient_follow_uplist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$patient_follow_up->RowType = ROWTYPE_HEADER;

// Render list options
$patient_follow_up_list->renderListOptions();

// Render list options (header, left)
$patient_follow_up_list->ListOptions->render("header", "left");
?>
<?php if ($patient_follow_up_list->id->Visible) { // id ?>
	<?php if ($patient_follow_up_list->SortUrl($patient_follow_up_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $patient_follow_up_list->id->headerCellClass() ?>"><div id="elh_patient_follow_up_id" class="patient_follow_up_id"><div class="ew-table-header-caption"><?php echo $patient_follow_up_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $patient_follow_up_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_follow_up_list->SortUrl($patient_follow_up_list->id) ?>', 1);"><div id="elh_patient_follow_up_id" class="patient_follow_up_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_follow_up_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_follow_up_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_follow_up_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_follow_up_list->PatID->Visible) { // PatID ?>
	<?php if ($patient_follow_up_list->SortUrl($patient_follow_up_list->PatID) == "") { ?>
		<th data-name="PatID" class="<?php echo $patient_follow_up_list->PatID->headerCellClass() ?>"><div id="elh_patient_follow_up_PatID" class="patient_follow_up_PatID"><div class="ew-table-header-caption"><?php echo $patient_follow_up_list->PatID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatID" class="<?php echo $patient_follow_up_list->PatID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_follow_up_list->SortUrl($patient_follow_up_list->PatID) ?>', 1);"><div id="elh_patient_follow_up_PatID" class="patient_follow_up_PatID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_follow_up_list->PatID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_follow_up_list->PatID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_follow_up_list->PatID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_follow_up_list->PatientName->Visible) { // PatientName ?>
	<?php if ($patient_follow_up_list->SortUrl($patient_follow_up_list->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $patient_follow_up_list->PatientName->headerCellClass() ?>"><div id="elh_patient_follow_up_PatientName" class="patient_follow_up_PatientName"><div class="ew-table-header-caption"><?php echo $patient_follow_up_list->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $patient_follow_up_list->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_follow_up_list->SortUrl($patient_follow_up_list->PatientName) ?>', 1);"><div id="elh_patient_follow_up_PatientName" class="patient_follow_up_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_follow_up_list->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_follow_up_list->PatientName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_follow_up_list->PatientName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_follow_up_list->MobileNumber->Visible) { // MobileNumber ?>
	<?php if ($patient_follow_up_list->SortUrl($patient_follow_up_list->MobileNumber) == "") { ?>
		<th data-name="MobileNumber" class="<?php echo $patient_follow_up_list->MobileNumber->headerCellClass() ?>"><div id="elh_patient_follow_up_MobileNumber" class="patient_follow_up_MobileNumber"><div class="ew-table-header-caption"><?php echo $patient_follow_up_list->MobileNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MobileNumber" class="<?php echo $patient_follow_up_list->MobileNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_follow_up_list->SortUrl($patient_follow_up_list->MobileNumber) ?>', 1);"><div id="elh_patient_follow_up_MobileNumber" class="patient_follow_up_MobileNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_follow_up_list->MobileNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_follow_up_list->MobileNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_follow_up_list->MobileNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_follow_up_list->mrnno->Visible) { // mrnno ?>
	<?php if ($patient_follow_up_list->SortUrl($patient_follow_up_list->mrnno) == "") { ?>
		<th data-name="mrnno" class="<?php echo $patient_follow_up_list->mrnno->headerCellClass() ?>"><div id="elh_patient_follow_up_mrnno" class="patient_follow_up_mrnno"><div class="ew-table-header-caption"><?php echo $patient_follow_up_list->mrnno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnno" class="<?php echo $patient_follow_up_list->mrnno->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_follow_up_list->SortUrl($patient_follow_up_list->mrnno) ?>', 1);"><div id="elh_patient_follow_up_mrnno" class="patient_follow_up_mrnno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_follow_up_list->mrnno->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_follow_up_list->mrnno->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_follow_up_list->mrnno->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_follow_up_list->BP->Visible) { // BP ?>
	<?php if ($patient_follow_up_list->SortUrl($patient_follow_up_list->BP) == "") { ?>
		<th data-name="BP" class="<?php echo $patient_follow_up_list->BP->headerCellClass() ?>"><div id="elh_patient_follow_up_BP" class="patient_follow_up_BP"><div class="ew-table-header-caption"><?php echo $patient_follow_up_list->BP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BP" class="<?php echo $patient_follow_up_list->BP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_follow_up_list->SortUrl($patient_follow_up_list->BP) ?>', 1);"><div id="elh_patient_follow_up_BP" class="patient_follow_up_BP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_follow_up_list->BP->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_follow_up_list->BP->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_follow_up_list->BP->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_follow_up_list->Pulse->Visible) { // Pulse ?>
	<?php if ($patient_follow_up_list->SortUrl($patient_follow_up_list->Pulse) == "") { ?>
		<th data-name="Pulse" class="<?php echo $patient_follow_up_list->Pulse->headerCellClass() ?>"><div id="elh_patient_follow_up_Pulse" class="patient_follow_up_Pulse"><div class="ew-table-header-caption"><?php echo $patient_follow_up_list->Pulse->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pulse" class="<?php echo $patient_follow_up_list->Pulse->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_follow_up_list->SortUrl($patient_follow_up_list->Pulse) ?>', 1);"><div id="elh_patient_follow_up_Pulse" class="patient_follow_up_Pulse">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_follow_up_list->Pulse->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_follow_up_list->Pulse->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_follow_up_list->Pulse->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_follow_up_list->Resp->Visible) { // Resp ?>
	<?php if ($patient_follow_up_list->SortUrl($patient_follow_up_list->Resp) == "") { ?>
		<th data-name="Resp" class="<?php echo $patient_follow_up_list->Resp->headerCellClass() ?>"><div id="elh_patient_follow_up_Resp" class="patient_follow_up_Resp"><div class="ew-table-header-caption"><?php echo $patient_follow_up_list->Resp->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Resp" class="<?php echo $patient_follow_up_list->Resp->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_follow_up_list->SortUrl($patient_follow_up_list->Resp) ?>', 1);"><div id="elh_patient_follow_up_Resp" class="patient_follow_up_Resp">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_follow_up_list->Resp->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_follow_up_list->Resp->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_follow_up_list->Resp->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_follow_up_list->SPO2->Visible) { // SPO2 ?>
	<?php if ($patient_follow_up_list->SortUrl($patient_follow_up_list->SPO2) == "") { ?>
		<th data-name="SPO2" class="<?php echo $patient_follow_up_list->SPO2->headerCellClass() ?>"><div id="elh_patient_follow_up_SPO2" class="patient_follow_up_SPO2"><div class="ew-table-header-caption"><?php echo $patient_follow_up_list->SPO2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SPO2" class="<?php echo $patient_follow_up_list->SPO2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_follow_up_list->SortUrl($patient_follow_up_list->SPO2) ?>', 1);"><div id="elh_patient_follow_up_SPO2" class="patient_follow_up_SPO2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_follow_up_list->SPO2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_follow_up_list->SPO2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_follow_up_list->SPO2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_follow_up_list->NextReviewDate->Visible) { // NextReviewDate ?>
	<?php if ($patient_follow_up_list->SortUrl($patient_follow_up_list->NextReviewDate) == "") { ?>
		<th data-name="NextReviewDate" class="<?php echo $patient_follow_up_list->NextReviewDate->headerCellClass() ?>"><div id="elh_patient_follow_up_NextReviewDate" class="patient_follow_up_NextReviewDate"><div class="ew-table-header-caption"><?php echo $patient_follow_up_list->NextReviewDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NextReviewDate" class="<?php echo $patient_follow_up_list->NextReviewDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_follow_up_list->SortUrl($patient_follow_up_list->NextReviewDate) ?>', 1);"><div id="elh_patient_follow_up_NextReviewDate" class="patient_follow_up_NextReviewDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_follow_up_list->NextReviewDate->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_follow_up_list->NextReviewDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_follow_up_list->NextReviewDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_follow_up_list->Age->Visible) { // Age ?>
	<?php if ($patient_follow_up_list->SortUrl($patient_follow_up_list->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $patient_follow_up_list->Age->headerCellClass() ?>"><div id="elh_patient_follow_up_Age" class="patient_follow_up_Age"><div class="ew-table-header-caption"><?php echo $patient_follow_up_list->Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $patient_follow_up_list->Age->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_follow_up_list->SortUrl($patient_follow_up_list->Age) ?>', 1);"><div id="elh_patient_follow_up_Age" class="patient_follow_up_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_follow_up_list->Age->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_follow_up_list->Age->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_follow_up_list->Age->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_follow_up_list->Gender->Visible) { // Gender ?>
	<?php if ($patient_follow_up_list->SortUrl($patient_follow_up_list->Gender) == "") { ?>
		<th data-name="Gender" class="<?php echo $patient_follow_up_list->Gender->headerCellClass() ?>"><div id="elh_patient_follow_up_Gender" class="patient_follow_up_Gender"><div class="ew-table-header-caption"><?php echo $patient_follow_up_list->Gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gender" class="<?php echo $patient_follow_up_list->Gender->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_follow_up_list->SortUrl($patient_follow_up_list->Gender) ?>', 1);"><div id="elh_patient_follow_up_Gender" class="patient_follow_up_Gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_follow_up_list->Gender->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_follow_up_list->Gender->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_follow_up_list->Gender->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_follow_up_list->HospID->Visible) { // HospID ?>
	<?php if ($patient_follow_up_list->SortUrl($patient_follow_up_list->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $patient_follow_up_list->HospID->headerCellClass() ?>"><div id="elh_patient_follow_up_HospID" class="patient_follow_up_HospID"><div class="ew-table-header-caption"><?php echo $patient_follow_up_list->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $patient_follow_up_list->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_follow_up_list->SortUrl($patient_follow_up_list->HospID) ?>', 1);"><div id="elh_patient_follow_up_HospID" class="patient_follow_up_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_follow_up_list->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_follow_up_list->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_follow_up_list->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_follow_up_list->Reception->Visible) { // Reception ?>
	<?php if ($patient_follow_up_list->SortUrl($patient_follow_up_list->Reception) == "") { ?>
		<th data-name="Reception" class="<?php echo $patient_follow_up_list->Reception->headerCellClass() ?>"><div id="elh_patient_follow_up_Reception" class="patient_follow_up_Reception"><div class="ew-table-header-caption"><?php echo $patient_follow_up_list->Reception->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Reception" class="<?php echo $patient_follow_up_list->Reception->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_follow_up_list->SortUrl($patient_follow_up_list->Reception) ?>', 1);"><div id="elh_patient_follow_up_Reception" class="patient_follow_up_Reception">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_follow_up_list->Reception->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_follow_up_list->Reception->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_follow_up_list->Reception->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_follow_up_list->PatientId->Visible) { // PatientId ?>
	<?php if ($patient_follow_up_list->SortUrl($patient_follow_up_list->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $patient_follow_up_list->PatientId->headerCellClass() ?>"><div id="elh_patient_follow_up_PatientId" class="patient_follow_up_PatientId"><div class="ew-table-header-caption"><?php echo $patient_follow_up_list->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $patient_follow_up_list->PatientId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_follow_up_list->SortUrl($patient_follow_up_list->PatientId) ?>', 1);"><div id="elh_patient_follow_up_PatientId" class="patient_follow_up_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_follow_up_list->PatientId->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_follow_up_list->PatientId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_follow_up_list->PatientId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
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
if ($patient_follow_up_list->ExportAll && $patient_follow_up_list->isExport()) {
	$patient_follow_up_list->StopRecord = $patient_follow_up_list->TotalRecords;
} else {

	// Set the last record to display
	if ($patient_follow_up_list->TotalRecords > $patient_follow_up_list->StartRecord + $patient_follow_up_list->DisplayRecords - 1)
		$patient_follow_up_list->StopRecord = $patient_follow_up_list->StartRecord + $patient_follow_up_list->DisplayRecords - 1;
	else
		$patient_follow_up_list->StopRecord = $patient_follow_up_list->TotalRecords;
}
$patient_follow_up_list->RecordCount = $patient_follow_up_list->StartRecord - 1;
if ($patient_follow_up_list->Recordset && !$patient_follow_up_list->Recordset->EOF) {
	$patient_follow_up_list->Recordset->moveFirst();
	$selectLimit = $patient_follow_up_list->UseSelectLimit;
	if (!$selectLimit && $patient_follow_up_list->StartRecord > 1)
		$patient_follow_up_list->Recordset->move($patient_follow_up_list->StartRecord - 1);
} elseif (!$patient_follow_up->AllowAddDeleteRow && $patient_follow_up_list->StopRecord == 0) {
	$patient_follow_up_list->StopRecord = $patient_follow_up->GridAddRowCount;
}

// Initialize aggregate
$patient_follow_up->RowType = ROWTYPE_AGGREGATEINIT;
$patient_follow_up->resetAttributes();
$patient_follow_up_list->renderRow();
while ($patient_follow_up_list->RecordCount < $patient_follow_up_list->StopRecord) {
	$patient_follow_up_list->RecordCount++;
	if ($patient_follow_up_list->RecordCount >= $patient_follow_up_list->StartRecord) {
		$patient_follow_up_list->RowCount++;

		// Set up key count
		$patient_follow_up_list->KeyCount = $patient_follow_up_list->RowIndex;

		// Init row class and style
		$patient_follow_up->resetAttributes();
		$patient_follow_up->CssClass = "";
		if ($patient_follow_up_list->isGridAdd()) {
		} else {
			$patient_follow_up_list->loadRowValues($patient_follow_up_list->Recordset); // Load row values
		}
		$patient_follow_up->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$patient_follow_up->RowAttrs->merge(["data-rowindex" => $patient_follow_up_list->RowCount, "id" => "r" . $patient_follow_up_list->RowCount . "_patient_follow_up", "data-rowtype" => $patient_follow_up->RowType]);

		// Render row
		$patient_follow_up_list->renderRow();

		// Render list options
		$patient_follow_up_list->renderListOptions();
?>
	<tr <?php echo $patient_follow_up->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_follow_up_list->ListOptions->render("body", "left", $patient_follow_up_list->RowCount);
?>
	<?php if ($patient_follow_up_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $patient_follow_up_list->id->cellAttributes() ?>>
<span id="el<?php echo $patient_follow_up_list->RowCount ?>_patient_follow_up_id">
<span<?php echo $patient_follow_up_list->id->viewAttributes() ?>><?php echo $patient_follow_up_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_follow_up_list->PatID->Visible) { // PatID ?>
		<td data-name="PatID" <?php echo $patient_follow_up_list->PatID->cellAttributes() ?>>
<span id="el<?php echo $patient_follow_up_list->RowCount ?>_patient_follow_up_PatID">
<span<?php echo $patient_follow_up_list->PatID->viewAttributes() ?>><?php echo $patient_follow_up_list->PatID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_follow_up_list->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName" <?php echo $patient_follow_up_list->PatientName->cellAttributes() ?>>
<span id="el<?php echo $patient_follow_up_list->RowCount ?>_patient_follow_up_PatientName">
<span<?php echo $patient_follow_up_list->PatientName->viewAttributes() ?>><?php echo $patient_follow_up_list->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_follow_up_list->MobileNumber->Visible) { // MobileNumber ?>
		<td data-name="MobileNumber" <?php echo $patient_follow_up_list->MobileNumber->cellAttributes() ?>>
<span id="el<?php echo $patient_follow_up_list->RowCount ?>_patient_follow_up_MobileNumber">
<span<?php echo $patient_follow_up_list->MobileNumber->viewAttributes() ?>><?php echo $patient_follow_up_list->MobileNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_follow_up_list->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno" <?php echo $patient_follow_up_list->mrnno->cellAttributes() ?>>
<span id="el<?php echo $patient_follow_up_list->RowCount ?>_patient_follow_up_mrnno">
<span<?php echo $patient_follow_up_list->mrnno->viewAttributes() ?>><?php echo $patient_follow_up_list->mrnno->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_follow_up_list->BP->Visible) { // BP ?>
		<td data-name="BP" <?php echo $patient_follow_up_list->BP->cellAttributes() ?>>
<span id="el<?php echo $patient_follow_up_list->RowCount ?>_patient_follow_up_BP">
<span<?php echo $patient_follow_up_list->BP->viewAttributes() ?>><?php echo $patient_follow_up_list->BP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_follow_up_list->Pulse->Visible) { // Pulse ?>
		<td data-name="Pulse" <?php echo $patient_follow_up_list->Pulse->cellAttributes() ?>>
<span id="el<?php echo $patient_follow_up_list->RowCount ?>_patient_follow_up_Pulse">
<span<?php echo $patient_follow_up_list->Pulse->viewAttributes() ?>><?php echo $patient_follow_up_list->Pulse->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_follow_up_list->Resp->Visible) { // Resp ?>
		<td data-name="Resp" <?php echo $patient_follow_up_list->Resp->cellAttributes() ?>>
<span id="el<?php echo $patient_follow_up_list->RowCount ?>_patient_follow_up_Resp">
<span<?php echo $patient_follow_up_list->Resp->viewAttributes() ?>><?php echo $patient_follow_up_list->Resp->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_follow_up_list->SPO2->Visible) { // SPO2 ?>
		<td data-name="SPO2" <?php echo $patient_follow_up_list->SPO2->cellAttributes() ?>>
<span id="el<?php echo $patient_follow_up_list->RowCount ?>_patient_follow_up_SPO2">
<span<?php echo $patient_follow_up_list->SPO2->viewAttributes() ?>><?php echo $patient_follow_up_list->SPO2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_follow_up_list->NextReviewDate->Visible) { // NextReviewDate ?>
		<td data-name="NextReviewDate" <?php echo $patient_follow_up_list->NextReviewDate->cellAttributes() ?>>
<span id="el<?php echo $patient_follow_up_list->RowCount ?>_patient_follow_up_NextReviewDate">
<span<?php echo $patient_follow_up_list->NextReviewDate->viewAttributes() ?>><?php echo $patient_follow_up_list->NextReviewDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_follow_up_list->Age->Visible) { // Age ?>
		<td data-name="Age" <?php echo $patient_follow_up_list->Age->cellAttributes() ?>>
<span id="el<?php echo $patient_follow_up_list->RowCount ?>_patient_follow_up_Age">
<span<?php echo $patient_follow_up_list->Age->viewAttributes() ?>><?php echo $patient_follow_up_list->Age->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_follow_up_list->Gender->Visible) { // Gender ?>
		<td data-name="Gender" <?php echo $patient_follow_up_list->Gender->cellAttributes() ?>>
<span id="el<?php echo $patient_follow_up_list->RowCount ?>_patient_follow_up_Gender">
<span<?php echo $patient_follow_up_list->Gender->viewAttributes() ?>><?php echo $patient_follow_up_list->Gender->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_follow_up_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $patient_follow_up_list->HospID->cellAttributes() ?>>
<span id="el<?php echo $patient_follow_up_list->RowCount ?>_patient_follow_up_HospID">
<span<?php echo $patient_follow_up_list->HospID->viewAttributes() ?>><?php echo $patient_follow_up_list->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_follow_up_list->Reception->Visible) { // Reception ?>
		<td data-name="Reception" <?php echo $patient_follow_up_list->Reception->cellAttributes() ?>>
<span id="el<?php echo $patient_follow_up_list->RowCount ?>_patient_follow_up_Reception">
<span<?php echo $patient_follow_up_list->Reception->viewAttributes() ?>><?php echo $patient_follow_up_list->Reception->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_follow_up_list->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId" <?php echo $patient_follow_up_list->PatientId->cellAttributes() ?>>
<span id="el<?php echo $patient_follow_up_list->RowCount ?>_patient_follow_up_PatientId">
<span<?php echo $patient_follow_up_list->PatientId->viewAttributes() ?>><?php echo $patient_follow_up_list->PatientId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_follow_up_list->ListOptions->render("body", "right", $patient_follow_up_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$patient_follow_up_list->isGridAdd())
		$patient_follow_up_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$patient_follow_up->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($patient_follow_up_list->Recordset)
	$patient_follow_up_list->Recordset->Close();
?>
<?php if (!$patient_follow_up_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$patient_follow_up_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $patient_follow_up_list->Pager->render() ?>
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
<?php if ($patient_follow_up_list->TotalRecords == 0 && !$patient_follow_up->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $patient_follow_up_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$patient_follow_up_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$patient_follow_up_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$patient_follow_up->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_patient_follow_up",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$patient_follow_up_list->terminate();
?>