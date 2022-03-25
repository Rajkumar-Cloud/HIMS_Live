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
<?php include_once "header.php"; ?>
<?php if (!$patient_an_registration_list->isExport()) { ?>
<script>
var fpatient_an_registrationlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fpatient_an_registrationlist = currentForm = new ew.Form("fpatient_an_registrationlist", "list");
	fpatient_an_registrationlist.formKeyCountName = '<?php echo $patient_an_registration_list->FormKeyCountName ?>';
	loadjs.done("fpatient_an_registrationlist");
});
var fpatient_an_registrationlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fpatient_an_registrationlistsrch = currentSearchForm = new ew.Form("fpatient_an_registrationlistsrch");

	// Dynamic selection lists
	// Filters

	fpatient_an_registrationlistsrch.filterList = <?php echo $patient_an_registration_list->getFilterList() ?>;
	loadjs.done("fpatient_an_registrationlistsrch");
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
<?php if (!$patient_an_registration_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($patient_an_registration_list->TotalRecords > 0 && $patient_an_registration_list->ExportOptions->visible()) { ?>
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
<?php if (!$patient_an_registration_list->isExport() || Config("EXPORT_MASTER_RECORD") && $patient_an_registration_list->isExport("print")) { ?>
<?php
if ($patient_an_registration_list->DbMasterFilter != "" && $patient_an_registration->getCurrentMasterTable() == "patient_opd_follow_up") {
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
<?php if (!$patient_an_registration_list->isExport() && !$patient_an_registration->CurrentAction) { ?>
<form name="fpatient_an_registrationlistsrch" id="fpatient_an_registrationlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fpatient_an_registrationlistsrch-search-panel" class="<?php echo $patient_an_registration_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="patient_an_registration">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $patient_an_registration_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($patient_an_registration_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($patient_an_registration_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $patient_an_registration_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($patient_an_registration_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($patient_an_registration_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($patient_an_registration_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($patient_an_registration_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $patient_an_registration_list->showPageHeader(); ?>
<?php
$patient_an_registration_list->showMessage();
?>
<?php if ($patient_an_registration_list->TotalRecords > 0 || $patient_an_registration->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($patient_an_registration_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_an_registration">
<?php if (!$patient_an_registration_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$patient_an_registration_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $patient_an_registration_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $patient_an_registration_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fpatient_an_registrationlist" id="fpatient_an_registrationlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_an_registration">
<?php if ($patient_an_registration->getCurrentMasterTable() == "patient_opd_follow_up" && $patient_an_registration->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="patient_opd_follow_up">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($patient_an_registration_list->fid->getSessionValue()) ?>">
<input type="hidden" name="fk_PatientId" value="<?php echo HtmlEncode($patient_an_registration_list->pid->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_patient_an_registration" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($patient_an_registration_list->TotalRecords > 0 || $patient_an_registration_list->isGridEdit()) { ?>
<table id="tbl_patient_an_registrationlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$patient_an_registration->RowType = ROWTYPE_HEADER;

// Render list options
$patient_an_registration_list->renderListOptions();

// Render list options (header, left)
$patient_an_registration_list->ListOptions->render("header", "left");
?>
<?php if ($patient_an_registration_list->id->Visible) { // id ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $patient_an_registration_list->id->headerCellClass() ?>"><div id="elh_patient_an_registration_id" class="patient_an_registration_id"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $patient_an_registration_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->id) ?>', 1);"><div id="elh_patient_an_registration_id" class="patient_an_registration_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->pid->Visible) { // pid ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->pid) == "") { ?>
		<th data-name="pid" class="<?php echo $patient_an_registration_list->pid->headerCellClass() ?>"><div id="elh_patient_an_registration_pid" class="patient_an_registration_pid"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->pid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pid" class="<?php echo $patient_an_registration_list->pid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->pid) ?>', 1);"><div id="elh_patient_an_registration_pid" class="patient_an_registration_pid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->pid->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->pid->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->pid->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->fid->Visible) { // fid ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->fid) == "") { ?>
		<th data-name="fid" class="<?php echo $patient_an_registration_list->fid->headerCellClass() ?>"><div id="elh_patient_an_registration_fid" class="patient_an_registration_fid"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->fid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="fid" class="<?php echo $patient_an_registration_list->fid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->fid) ?>', 1);"><div id="elh_patient_an_registration_fid" class="patient_an_registration_fid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->fid->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->fid->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->fid->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->G->Visible) { // G ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->G) == "") { ?>
		<th data-name="G" class="<?php echo $patient_an_registration_list->G->headerCellClass() ?>"><div id="elh_patient_an_registration_G" class="patient_an_registration_G"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->G->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="G" class="<?php echo $patient_an_registration_list->G->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->G) ?>', 1);"><div id="elh_patient_an_registration_G" class="patient_an_registration_G">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->G->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->G->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->G->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->P->Visible) { // P ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->P) == "") { ?>
		<th data-name="P" class="<?php echo $patient_an_registration_list->P->headerCellClass() ?>"><div id="elh_patient_an_registration_P" class="patient_an_registration_P"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->P->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="P" class="<?php echo $patient_an_registration_list->P->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->P) ?>', 1);"><div id="elh_patient_an_registration_P" class="patient_an_registration_P">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->P->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->P->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->P->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->L->Visible) { // L ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->L) == "") { ?>
		<th data-name="L" class="<?php echo $patient_an_registration_list->L->headerCellClass() ?>"><div id="elh_patient_an_registration_L" class="patient_an_registration_L"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->L->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="L" class="<?php echo $patient_an_registration_list->L->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->L) ?>', 1);"><div id="elh_patient_an_registration_L" class="patient_an_registration_L">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->L->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->L->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->L->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->A->Visible) { // A ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->A) == "") { ?>
		<th data-name="A" class="<?php echo $patient_an_registration_list->A->headerCellClass() ?>"><div id="elh_patient_an_registration_A" class="patient_an_registration_A"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->A->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="A" class="<?php echo $patient_an_registration_list->A->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->A) ?>', 1);"><div id="elh_patient_an_registration_A" class="patient_an_registration_A">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->A->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->A->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->A->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->E->Visible) { // E ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->E) == "") { ?>
		<th data-name="E" class="<?php echo $patient_an_registration_list->E->headerCellClass() ?>"><div id="elh_patient_an_registration_E" class="patient_an_registration_E"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->E->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="E" class="<?php echo $patient_an_registration_list->E->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->E) ?>', 1);"><div id="elh_patient_an_registration_E" class="patient_an_registration_E">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->E->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->E->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->E->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->M->Visible) { // M ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->M) == "") { ?>
		<th data-name="M" class="<?php echo $patient_an_registration_list->M->headerCellClass() ?>"><div id="elh_patient_an_registration_M" class="patient_an_registration_M"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->M->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="M" class="<?php echo $patient_an_registration_list->M->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->M) ?>', 1);"><div id="elh_patient_an_registration_M" class="patient_an_registration_M">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->M->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->M->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->M->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->LMP->Visible) { // LMP ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->LMP) == "") { ?>
		<th data-name="LMP" class="<?php echo $patient_an_registration_list->LMP->headerCellClass() ?>"><div id="elh_patient_an_registration_LMP" class="patient_an_registration_LMP"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->LMP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LMP" class="<?php echo $patient_an_registration_list->LMP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->LMP) ?>', 1);"><div id="elh_patient_an_registration_LMP" class="patient_an_registration_LMP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->LMP->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->LMP->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->LMP->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->EDO->Visible) { // EDO ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->EDO) == "") { ?>
		<th data-name="EDO" class="<?php echo $patient_an_registration_list->EDO->headerCellClass() ?>"><div id="elh_patient_an_registration_EDO" class="patient_an_registration_EDO"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->EDO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EDO" class="<?php echo $patient_an_registration_list->EDO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->EDO) ?>', 1);"><div id="elh_patient_an_registration_EDO" class="patient_an_registration_EDO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->EDO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->EDO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->EDO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->MenstrualHistory->Visible) { // MenstrualHistory ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->MenstrualHistory) == "") { ?>
		<th data-name="MenstrualHistory" class="<?php echo $patient_an_registration_list->MenstrualHistory->headerCellClass() ?>"><div id="elh_patient_an_registration_MenstrualHistory" class="patient_an_registration_MenstrualHistory"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->MenstrualHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MenstrualHistory" class="<?php echo $patient_an_registration_list->MenstrualHistory->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->MenstrualHistory) ?>', 1);"><div id="elh_patient_an_registration_MenstrualHistory" class="patient_an_registration_MenstrualHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->MenstrualHistory->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->MenstrualHistory->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->MenstrualHistory->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->MaritalHistory->Visible) { // MaritalHistory ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->MaritalHistory) == "") { ?>
		<th data-name="MaritalHistory" class="<?php echo $patient_an_registration_list->MaritalHistory->headerCellClass() ?>"><div id="elh_patient_an_registration_MaritalHistory" class="patient_an_registration_MaritalHistory"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->MaritalHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MaritalHistory" class="<?php echo $patient_an_registration_list->MaritalHistory->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->MaritalHistory) ?>', 1);"><div id="elh_patient_an_registration_MaritalHistory" class="patient_an_registration_MaritalHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->MaritalHistory->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->MaritalHistory->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->MaritalHistory->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->ObstetricHistory->Visible) { // ObstetricHistory ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->ObstetricHistory) == "") { ?>
		<th data-name="ObstetricHistory" class="<?php echo $patient_an_registration_list->ObstetricHistory->headerCellClass() ?>"><div id="elh_patient_an_registration_ObstetricHistory" class="patient_an_registration_ObstetricHistory"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->ObstetricHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ObstetricHistory" class="<?php echo $patient_an_registration_list->ObstetricHistory->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->ObstetricHistory) ?>', 1);"><div id="elh_patient_an_registration_ObstetricHistory" class="patient_an_registration_ObstetricHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->ObstetricHistory->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->ObstetricHistory->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->ObstetricHistory->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->PreviousHistoryofGDM->Visible) { // PreviousHistoryofGDM ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->PreviousHistoryofGDM) == "") { ?>
		<th data-name="PreviousHistoryofGDM" class="<?php echo $patient_an_registration_list->PreviousHistoryofGDM->headerCellClass() ?>"><div id="elh_patient_an_registration_PreviousHistoryofGDM" class="patient_an_registration_PreviousHistoryofGDM"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->PreviousHistoryofGDM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PreviousHistoryofGDM" class="<?php echo $patient_an_registration_list->PreviousHistoryofGDM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->PreviousHistoryofGDM) ?>', 1);"><div id="elh_patient_an_registration_PreviousHistoryofGDM" class="patient_an_registration_PreviousHistoryofGDM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->PreviousHistoryofGDM->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->PreviousHistoryofGDM->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->PreviousHistoryofGDM->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->PreviousHistorofPIH->Visible) { // PreviousHistorofPIH ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->PreviousHistorofPIH) == "") { ?>
		<th data-name="PreviousHistorofPIH" class="<?php echo $patient_an_registration_list->PreviousHistorofPIH->headerCellClass() ?>"><div id="elh_patient_an_registration_PreviousHistorofPIH" class="patient_an_registration_PreviousHistorofPIH"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->PreviousHistorofPIH->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PreviousHistorofPIH" class="<?php echo $patient_an_registration_list->PreviousHistorofPIH->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->PreviousHistorofPIH) ?>', 1);"><div id="elh_patient_an_registration_PreviousHistorofPIH" class="patient_an_registration_PreviousHistorofPIH">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->PreviousHistorofPIH->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->PreviousHistorofPIH->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->PreviousHistorofPIH->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->PreviousHistoryofIUGR->Visible) { // PreviousHistoryofIUGR ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->PreviousHistoryofIUGR) == "") { ?>
		<th data-name="PreviousHistoryofIUGR" class="<?php echo $patient_an_registration_list->PreviousHistoryofIUGR->headerCellClass() ?>"><div id="elh_patient_an_registration_PreviousHistoryofIUGR" class="patient_an_registration_PreviousHistoryofIUGR"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->PreviousHistoryofIUGR->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PreviousHistoryofIUGR" class="<?php echo $patient_an_registration_list->PreviousHistoryofIUGR->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->PreviousHistoryofIUGR) ?>', 1);"><div id="elh_patient_an_registration_PreviousHistoryofIUGR" class="patient_an_registration_PreviousHistoryofIUGR">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->PreviousHistoryofIUGR->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->PreviousHistoryofIUGR->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->PreviousHistoryofIUGR->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->PreviousHistoryofOligohydramnios->Visible) { // PreviousHistoryofOligohydramnios ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->PreviousHistoryofOligohydramnios) == "") { ?>
		<th data-name="PreviousHistoryofOligohydramnios" class="<?php echo $patient_an_registration_list->PreviousHistoryofOligohydramnios->headerCellClass() ?>"><div id="elh_patient_an_registration_PreviousHistoryofOligohydramnios" class="patient_an_registration_PreviousHistoryofOligohydramnios"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->PreviousHistoryofOligohydramnios->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PreviousHistoryofOligohydramnios" class="<?php echo $patient_an_registration_list->PreviousHistoryofOligohydramnios->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->PreviousHistoryofOligohydramnios) ?>', 1);"><div id="elh_patient_an_registration_PreviousHistoryofOligohydramnios" class="patient_an_registration_PreviousHistoryofOligohydramnios">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->PreviousHistoryofOligohydramnios->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->PreviousHistoryofOligohydramnios->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->PreviousHistoryofOligohydramnios->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->PreviousHistoryofPreterm->Visible) { // PreviousHistoryofPreterm ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->PreviousHistoryofPreterm) == "") { ?>
		<th data-name="PreviousHistoryofPreterm" class="<?php echo $patient_an_registration_list->PreviousHistoryofPreterm->headerCellClass() ?>"><div id="elh_patient_an_registration_PreviousHistoryofPreterm" class="patient_an_registration_PreviousHistoryofPreterm"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->PreviousHistoryofPreterm->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PreviousHistoryofPreterm" class="<?php echo $patient_an_registration_list->PreviousHistoryofPreterm->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->PreviousHistoryofPreterm) ?>', 1);"><div id="elh_patient_an_registration_PreviousHistoryofPreterm" class="patient_an_registration_PreviousHistoryofPreterm">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->PreviousHistoryofPreterm->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->PreviousHistoryofPreterm->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->PreviousHistoryofPreterm->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->G1->Visible) { // G1 ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->G1) == "") { ?>
		<th data-name="G1" class="<?php echo $patient_an_registration_list->G1->headerCellClass() ?>"><div id="elh_patient_an_registration_G1" class="patient_an_registration_G1"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->G1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="G1" class="<?php echo $patient_an_registration_list->G1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->G1) ?>', 1);"><div id="elh_patient_an_registration_G1" class="patient_an_registration_G1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->G1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->G1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->G1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->G2->Visible) { // G2 ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->G2) == "") { ?>
		<th data-name="G2" class="<?php echo $patient_an_registration_list->G2->headerCellClass() ?>"><div id="elh_patient_an_registration_G2" class="patient_an_registration_G2"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->G2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="G2" class="<?php echo $patient_an_registration_list->G2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->G2) ?>', 1);"><div id="elh_patient_an_registration_G2" class="patient_an_registration_G2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->G2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->G2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->G2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->G3->Visible) { // G3 ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->G3) == "") { ?>
		<th data-name="G3" class="<?php echo $patient_an_registration_list->G3->headerCellClass() ?>"><div id="elh_patient_an_registration_G3" class="patient_an_registration_G3"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->G3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="G3" class="<?php echo $patient_an_registration_list->G3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->G3) ?>', 1);"><div id="elh_patient_an_registration_G3" class="patient_an_registration_G3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->G3->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->G3->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->G3->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->DeliveryNDLSCS1->Visible) { // DeliveryNDLSCS1 ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->DeliveryNDLSCS1) == "") { ?>
		<th data-name="DeliveryNDLSCS1" class="<?php echo $patient_an_registration_list->DeliveryNDLSCS1->headerCellClass() ?>"><div id="elh_patient_an_registration_DeliveryNDLSCS1" class="patient_an_registration_DeliveryNDLSCS1"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->DeliveryNDLSCS1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DeliveryNDLSCS1" class="<?php echo $patient_an_registration_list->DeliveryNDLSCS1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->DeliveryNDLSCS1) ?>', 1);"><div id="elh_patient_an_registration_DeliveryNDLSCS1" class="patient_an_registration_DeliveryNDLSCS1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->DeliveryNDLSCS1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->DeliveryNDLSCS1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->DeliveryNDLSCS1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->DeliveryNDLSCS2->Visible) { // DeliveryNDLSCS2 ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->DeliveryNDLSCS2) == "") { ?>
		<th data-name="DeliveryNDLSCS2" class="<?php echo $patient_an_registration_list->DeliveryNDLSCS2->headerCellClass() ?>"><div id="elh_patient_an_registration_DeliveryNDLSCS2" class="patient_an_registration_DeliveryNDLSCS2"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->DeliveryNDLSCS2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DeliveryNDLSCS2" class="<?php echo $patient_an_registration_list->DeliveryNDLSCS2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->DeliveryNDLSCS2) ?>', 1);"><div id="elh_patient_an_registration_DeliveryNDLSCS2" class="patient_an_registration_DeliveryNDLSCS2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->DeliveryNDLSCS2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->DeliveryNDLSCS2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->DeliveryNDLSCS2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->DeliveryNDLSCS3->Visible) { // DeliveryNDLSCS3 ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->DeliveryNDLSCS3) == "") { ?>
		<th data-name="DeliveryNDLSCS3" class="<?php echo $patient_an_registration_list->DeliveryNDLSCS3->headerCellClass() ?>"><div id="elh_patient_an_registration_DeliveryNDLSCS3" class="patient_an_registration_DeliveryNDLSCS3"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->DeliveryNDLSCS3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DeliveryNDLSCS3" class="<?php echo $patient_an_registration_list->DeliveryNDLSCS3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->DeliveryNDLSCS3) ?>', 1);"><div id="elh_patient_an_registration_DeliveryNDLSCS3" class="patient_an_registration_DeliveryNDLSCS3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->DeliveryNDLSCS3->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->DeliveryNDLSCS3->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->DeliveryNDLSCS3->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->BabySexweight1->Visible) { // BabySexweight1 ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->BabySexweight1) == "") { ?>
		<th data-name="BabySexweight1" class="<?php echo $patient_an_registration_list->BabySexweight1->headerCellClass() ?>"><div id="elh_patient_an_registration_BabySexweight1" class="patient_an_registration_BabySexweight1"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->BabySexweight1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BabySexweight1" class="<?php echo $patient_an_registration_list->BabySexweight1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->BabySexweight1) ?>', 1);"><div id="elh_patient_an_registration_BabySexweight1" class="patient_an_registration_BabySexweight1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->BabySexweight1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->BabySexweight1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->BabySexweight1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->BabySexweight2->Visible) { // BabySexweight2 ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->BabySexweight2) == "") { ?>
		<th data-name="BabySexweight2" class="<?php echo $patient_an_registration_list->BabySexweight2->headerCellClass() ?>"><div id="elh_patient_an_registration_BabySexweight2" class="patient_an_registration_BabySexweight2"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->BabySexweight2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BabySexweight2" class="<?php echo $patient_an_registration_list->BabySexweight2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->BabySexweight2) ?>', 1);"><div id="elh_patient_an_registration_BabySexweight2" class="patient_an_registration_BabySexweight2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->BabySexweight2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->BabySexweight2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->BabySexweight2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->BabySexweight3->Visible) { // BabySexweight3 ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->BabySexweight3) == "") { ?>
		<th data-name="BabySexweight3" class="<?php echo $patient_an_registration_list->BabySexweight3->headerCellClass() ?>"><div id="elh_patient_an_registration_BabySexweight3" class="patient_an_registration_BabySexweight3"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->BabySexweight3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BabySexweight3" class="<?php echo $patient_an_registration_list->BabySexweight3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->BabySexweight3) ?>', 1);"><div id="elh_patient_an_registration_BabySexweight3" class="patient_an_registration_BabySexweight3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->BabySexweight3->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->BabySexweight3->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->BabySexweight3->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->PastMedicalHistory->Visible) { // PastMedicalHistory ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->PastMedicalHistory) == "") { ?>
		<th data-name="PastMedicalHistory" class="<?php echo $patient_an_registration_list->PastMedicalHistory->headerCellClass() ?>"><div id="elh_patient_an_registration_PastMedicalHistory" class="patient_an_registration_PastMedicalHistory"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->PastMedicalHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PastMedicalHistory" class="<?php echo $patient_an_registration_list->PastMedicalHistory->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->PastMedicalHistory) ?>', 1);"><div id="elh_patient_an_registration_PastMedicalHistory" class="patient_an_registration_PastMedicalHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->PastMedicalHistory->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->PastMedicalHistory->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->PastMedicalHistory->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->PastSurgicalHistory->Visible) { // PastSurgicalHistory ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->PastSurgicalHistory) == "") { ?>
		<th data-name="PastSurgicalHistory" class="<?php echo $patient_an_registration_list->PastSurgicalHistory->headerCellClass() ?>"><div id="elh_patient_an_registration_PastSurgicalHistory" class="patient_an_registration_PastSurgicalHistory"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->PastSurgicalHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PastSurgicalHistory" class="<?php echo $patient_an_registration_list->PastSurgicalHistory->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->PastSurgicalHistory) ?>', 1);"><div id="elh_patient_an_registration_PastSurgicalHistory" class="patient_an_registration_PastSurgicalHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->PastSurgicalHistory->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->PastSurgicalHistory->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->PastSurgicalHistory->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->FamilyHistory->Visible) { // FamilyHistory ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->FamilyHistory) == "") { ?>
		<th data-name="FamilyHistory" class="<?php echo $patient_an_registration_list->FamilyHistory->headerCellClass() ?>"><div id="elh_patient_an_registration_FamilyHistory" class="patient_an_registration_FamilyHistory"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->FamilyHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FamilyHistory" class="<?php echo $patient_an_registration_list->FamilyHistory->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->FamilyHistory) ?>', 1);"><div id="elh_patient_an_registration_FamilyHistory" class="patient_an_registration_FamilyHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->FamilyHistory->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->FamilyHistory->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->FamilyHistory->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->Viability->Visible) { // Viability ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->Viability) == "") { ?>
		<th data-name="Viability" class="<?php echo $patient_an_registration_list->Viability->headerCellClass() ?>"><div id="elh_patient_an_registration_Viability" class="patient_an_registration_Viability"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->Viability->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Viability" class="<?php echo $patient_an_registration_list->Viability->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->Viability) ?>', 1);"><div id="elh_patient_an_registration_Viability" class="patient_an_registration_Viability">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->Viability->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->Viability->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->Viability->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->ViabilityDATE->Visible) { // ViabilityDATE ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->ViabilityDATE) == "") { ?>
		<th data-name="ViabilityDATE" class="<?php echo $patient_an_registration_list->ViabilityDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_ViabilityDATE" class="patient_an_registration_ViabilityDATE"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->ViabilityDATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ViabilityDATE" class="<?php echo $patient_an_registration_list->ViabilityDATE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->ViabilityDATE) ?>', 1);"><div id="elh_patient_an_registration_ViabilityDATE" class="patient_an_registration_ViabilityDATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->ViabilityDATE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->ViabilityDATE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->ViabilityDATE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->ViabilityREPORT->Visible) { // ViabilityREPORT ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->ViabilityREPORT) == "") { ?>
		<th data-name="ViabilityREPORT" class="<?php echo $patient_an_registration_list->ViabilityREPORT->headerCellClass() ?>"><div id="elh_patient_an_registration_ViabilityREPORT" class="patient_an_registration_ViabilityREPORT"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->ViabilityREPORT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ViabilityREPORT" class="<?php echo $patient_an_registration_list->ViabilityREPORT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->ViabilityREPORT) ?>', 1);"><div id="elh_patient_an_registration_ViabilityREPORT" class="patient_an_registration_ViabilityREPORT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->ViabilityREPORT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->ViabilityREPORT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->ViabilityREPORT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->Viability2->Visible) { // Viability2 ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->Viability2) == "") { ?>
		<th data-name="Viability2" class="<?php echo $patient_an_registration_list->Viability2->headerCellClass() ?>"><div id="elh_patient_an_registration_Viability2" class="patient_an_registration_Viability2"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->Viability2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Viability2" class="<?php echo $patient_an_registration_list->Viability2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->Viability2) ?>', 1);"><div id="elh_patient_an_registration_Viability2" class="patient_an_registration_Viability2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->Viability2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->Viability2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->Viability2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->Viability2DATE->Visible) { // Viability2DATE ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->Viability2DATE) == "") { ?>
		<th data-name="Viability2DATE" class="<?php echo $patient_an_registration_list->Viability2DATE->headerCellClass() ?>"><div id="elh_patient_an_registration_Viability2DATE" class="patient_an_registration_Viability2DATE"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->Viability2DATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Viability2DATE" class="<?php echo $patient_an_registration_list->Viability2DATE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->Viability2DATE) ?>', 1);"><div id="elh_patient_an_registration_Viability2DATE" class="patient_an_registration_Viability2DATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->Viability2DATE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->Viability2DATE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->Viability2DATE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->Viability2REPORT->Visible) { // Viability2REPORT ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->Viability2REPORT) == "") { ?>
		<th data-name="Viability2REPORT" class="<?php echo $patient_an_registration_list->Viability2REPORT->headerCellClass() ?>"><div id="elh_patient_an_registration_Viability2REPORT" class="patient_an_registration_Viability2REPORT"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->Viability2REPORT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Viability2REPORT" class="<?php echo $patient_an_registration_list->Viability2REPORT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->Viability2REPORT) ?>', 1);"><div id="elh_patient_an_registration_Viability2REPORT" class="patient_an_registration_Viability2REPORT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->Viability2REPORT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->Viability2REPORT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->Viability2REPORT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->NTscan->Visible) { // NTscan ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->NTscan) == "") { ?>
		<th data-name="NTscan" class="<?php echo $patient_an_registration_list->NTscan->headerCellClass() ?>"><div id="elh_patient_an_registration_NTscan" class="patient_an_registration_NTscan"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->NTscan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NTscan" class="<?php echo $patient_an_registration_list->NTscan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->NTscan) ?>', 1);"><div id="elh_patient_an_registration_NTscan" class="patient_an_registration_NTscan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->NTscan->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->NTscan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->NTscan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->NTscanDATE->Visible) { // NTscanDATE ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->NTscanDATE) == "") { ?>
		<th data-name="NTscanDATE" class="<?php echo $patient_an_registration_list->NTscanDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_NTscanDATE" class="patient_an_registration_NTscanDATE"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->NTscanDATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NTscanDATE" class="<?php echo $patient_an_registration_list->NTscanDATE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->NTscanDATE) ?>', 1);"><div id="elh_patient_an_registration_NTscanDATE" class="patient_an_registration_NTscanDATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->NTscanDATE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->NTscanDATE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->NTscanDATE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->NTscanREPORT->Visible) { // NTscanREPORT ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->NTscanREPORT) == "") { ?>
		<th data-name="NTscanREPORT" class="<?php echo $patient_an_registration_list->NTscanREPORT->headerCellClass() ?>"><div id="elh_patient_an_registration_NTscanREPORT" class="patient_an_registration_NTscanREPORT"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->NTscanREPORT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NTscanREPORT" class="<?php echo $patient_an_registration_list->NTscanREPORT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->NTscanREPORT) ?>', 1);"><div id="elh_patient_an_registration_NTscanREPORT" class="patient_an_registration_NTscanREPORT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->NTscanREPORT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->NTscanREPORT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->NTscanREPORT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->EarlyTarget->Visible) { // EarlyTarget ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->EarlyTarget) == "") { ?>
		<th data-name="EarlyTarget" class="<?php echo $patient_an_registration_list->EarlyTarget->headerCellClass() ?>"><div id="elh_patient_an_registration_EarlyTarget" class="patient_an_registration_EarlyTarget"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->EarlyTarget->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EarlyTarget" class="<?php echo $patient_an_registration_list->EarlyTarget->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->EarlyTarget) ?>', 1);"><div id="elh_patient_an_registration_EarlyTarget" class="patient_an_registration_EarlyTarget">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->EarlyTarget->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->EarlyTarget->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->EarlyTarget->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->EarlyTargetDATE->Visible) { // EarlyTargetDATE ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->EarlyTargetDATE) == "") { ?>
		<th data-name="EarlyTargetDATE" class="<?php echo $patient_an_registration_list->EarlyTargetDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_EarlyTargetDATE" class="patient_an_registration_EarlyTargetDATE"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->EarlyTargetDATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EarlyTargetDATE" class="<?php echo $patient_an_registration_list->EarlyTargetDATE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->EarlyTargetDATE) ?>', 1);"><div id="elh_patient_an_registration_EarlyTargetDATE" class="patient_an_registration_EarlyTargetDATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->EarlyTargetDATE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->EarlyTargetDATE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->EarlyTargetDATE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->EarlyTargetREPORT->Visible) { // EarlyTargetREPORT ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->EarlyTargetREPORT) == "") { ?>
		<th data-name="EarlyTargetREPORT" class="<?php echo $patient_an_registration_list->EarlyTargetREPORT->headerCellClass() ?>"><div id="elh_patient_an_registration_EarlyTargetREPORT" class="patient_an_registration_EarlyTargetREPORT"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->EarlyTargetREPORT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EarlyTargetREPORT" class="<?php echo $patient_an_registration_list->EarlyTargetREPORT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->EarlyTargetREPORT) ?>', 1);"><div id="elh_patient_an_registration_EarlyTargetREPORT" class="patient_an_registration_EarlyTargetREPORT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->EarlyTargetREPORT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->EarlyTargetREPORT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->EarlyTargetREPORT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->Anomaly->Visible) { // Anomaly ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->Anomaly) == "") { ?>
		<th data-name="Anomaly" class="<?php echo $patient_an_registration_list->Anomaly->headerCellClass() ?>"><div id="elh_patient_an_registration_Anomaly" class="patient_an_registration_Anomaly"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->Anomaly->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Anomaly" class="<?php echo $patient_an_registration_list->Anomaly->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->Anomaly) ?>', 1);"><div id="elh_patient_an_registration_Anomaly" class="patient_an_registration_Anomaly">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->Anomaly->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->Anomaly->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->Anomaly->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->AnomalyDATE->Visible) { // AnomalyDATE ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->AnomalyDATE) == "") { ?>
		<th data-name="AnomalyDATE" class="<?php echo $patient_an_registration_list->AnomalyDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_AnomalyDATE" class="patient_an_registration_AnomalyDATE"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->AnomalyDATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AnomalyDATE" class="<?php echo $patient_an_registration_list->AnomalyDATE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->AnomalyDATE) ?>', 1);"><div id="elh_patient_an_registration_AnomalyDATE" class="patient_an_registration_AnomalyDATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->AnomalyDATE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->AnomalyDATE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->AnomalyDATE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->AnomalyREPORT->Visible) { // AnomalyREPORT ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->AnomalyREPORT) == "") { ?>
		<th data-name="AnomalyREPORT" class="<?php echo $patient_an_registration_list->AnomalyREPORT->headerCellClass() ?>"><div id="elh_patient_an_registration_AnomalyREPORT" class="patient_an_registration_AnomalyREPORT"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->AnomalyREPORT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AnomalyREPORT" class="<?php echo $patient_an_registration_list->AnomalyREPORT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->AnomalyREPORT) ?>', 1);"><div id="elh_patient_an_registration_AnomalyREPORT" class="patient_an_registration_AnomalyREPORT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->AnomalyREPORT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->AnomalyREPORT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->AnomalyREPORT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->Growth->Visible) { // Growth ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->Growth) == "") { ?>
		<th data-name="Growth" class="<?php echo $patient_an_registration_list->Growth->headerCellClass() ?>"><div id="elh_patient_an_registration_Growth" class="patient_an_registration_Growth"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->Growth->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Growth" class="<?php echo $patient_an_registration_list->Growth->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->Growth) ?>', 1);"><div id="elh_patient_an_registration_Growth" class="patient_an_registration_Growth">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->Growth->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->Growth->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->Growth->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->GrowthDATE->Visible) { // GrowthDATE ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->GrowthDATE) == "") { ?>
		<th data-name="GrowthDATE" class="<?php echo $patient_an_registration_list->GrowthDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_GrowthDATE" class="patient_an_registration_GrowthDATE"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->GrowthDATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GrowthDATE" class="<?php echo $patient_an_registration_list->GrowthDATE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->GrowthDATE) ?>', 1);"><div id="elh_patient_an_registration_GrowthDATE" class="patient_an_registration_GrowthDATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->GrowthDATE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->GrowthDATE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->GrowthDATE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->GrowthREPORT->Visible) { // GrowthREPORT ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->GrowthREPORT) == "") { ?>
		<th data-name="GrowthREPORT" class="<?php echo $patient_an_registration_list->GrowthREPORT->headerCellClass() ?>"><div id="elh_patient_an_registration_GrowthREPORT" class="patient_an_registration_GrowthREPORT"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->GrowthREPORT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GrowthREPORT" class="<?php echo $patient_an_registration_list->GrowthREPORT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->GrowthREPORT) ?>', 1);"><div id="elh_patient_an_registration_GrowthREPORT" class="patient_an_registration_GrowthREPORT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->GrowthREPORT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->GrowthREPORT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->GrowthREPORT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->Growth1->Visible) { // Growth1 ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->Growth1) == "") { ?>
		<th data-name="Growth1" class="<?php echo $patient_an_registration_list->Growth1->headerCellClass() ?>"><div id="elh_patient_an_registration_Growth1" class="patient_an_registration_Growth1"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->Growth1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Growth1" class="<?php echo $patient_an_registration_list->Growth1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->Growth1) ?>', 1);"><div id="elh_patient_an_registration_Growth1" class="patient_an_registration_Growth1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->Growth1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->Growth1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->Growth1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->Growth1DATE->Visible) { // Growth1DATE ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->Growth1DATE) == "") { ?>
		<th data-name="Growth1DATE" class="<?php echo $patient_an_registration_list->Growth1DATE->headerCellClass() ?>"><div id="elh_patient_an_registration_Growth1DATE" class="patient_an_registration_Growth1DATE"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->Growth1DATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Growth1DATE" class="<?php echo $patient_an_registration_list->Growth1DATE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->Growth1DATE) ?>', 1);"><div id="elh_patient_an_registration_Growth1DATE" class="patient_an_registration_Growth1DATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->Growth1DATE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->Growth1DATE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->Growth1DATE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->Growth1REPORT->Visible) { // Growth1REPORT ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->Growth1REPORT) == "") { ?>
		<th data-name="Growth1REPORT" class="<?php echo $patient_an_registration_list->Growth1REPORT->headerCellClass() ?>"><div id="elh_patient_an_registration_Growth1REPORT" class="patient_an_registration_Growth1REPORT"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->Growth1REPORT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Growth1REPORT" class="<?php echo $patient_an_registration_list->Growth1REPORT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->Growth1REPORT) ?>', 1);"><div id="elh_patient_an_registration_Growth1REPORT" class="patient_an_registration_Growth1REPORT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->Growth1REPORT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->Growth1REPORT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->Growth1REPORT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->ANProfile->Visible) { // ANProfile ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->ANProfile) == "") { ?>
		<th data-name="ANProfile" class="<?php echo $patient_an_registration_list->ANProfile->headerCellClass() ?>"><div id="elh_patient_an_registration_ANProfile" class="patient_an_registration_ANProfile"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->ANProfile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ANProfile" class="<?php echo $patient_an_registration_list->ANProfile->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->ANProfile) ?>', 1);"><div id="elh_patient_an_registration_ANProfile" class="patient_an_registration_ANProfile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->ANProfile->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->ANProfile->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->ANProfile->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->ANProfileDATE->Visible) { // ANProfileDATE ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->ANProfileDATE) == "") { ?>
		<th data-name="ANProfileDATE" class="<?php echo $patient_an_registration_list->ANProfileDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_ANProfileDATE" class="patient_an_registration_ANProfileDATE"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->ANProfileDATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ANProfileDATE" class="<?php echo $patient_an_registration_list->ANProfileDATE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->ANProfileDATE) ?>', 1);"><div id="elh_patient_an_registration_ANProfileDATE" class="patient_an_registration_ANProfileDATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->ANProfileDATE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->ANProfileDATE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->ANProfileDATE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->ANProfileINHOUSE->Visible) { // ANProfileINHOUSE ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->ANProfileINHOUSE) == "") { ?>
		<th data-name="ANProfileINHOUSE" class="<?php echo $patient_an_registration_list->ANProfileINHOUSE->headerCellClass() ?>"><div id="elh_patient_an_registration_ANProfileINHOUSE" class="patient_an_registration_ANProfileINHOUSE"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->ANProfileINHOUSE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ANProfileINHOUSE" class="<?php echo $patient_an_registration_list->ANProfileINHOUSE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->ANProfileINHOUSE) ?>', 1);"><div id="elh_patient_an_registration_ANProfileINHOUSE" class="patient_an_registration_ANProfileINHOUSE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->ANProfileINHOUSE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->ANProfileINHOUSE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->ANProfileINHOUSE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->ANProfileREPORT->Visible) { // ANProfileREPORT ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->ANProfileREPORT) == "") { ?>
		<th data-name="ANProfileREPORT" class="<?php echo $patient_an_registration_list->ANProfileREPORT->headerCellClass() ?>"><div id="elh_patient_an_registration_ANProfileREPORT" class="patient_an_registration_ANProfileREPORT"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->ANProfileREPORT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ANProfileREPORT" class="<?php echo $patient_an_registration_list->ANProfileREPORT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->ANProfileREPORT) ?>', 1);"><div id="elh_patient_an_registration_ANProfileREPORT" class="patient_an_registration_ANProfileREPORT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->ANProfileREPORT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->ANProfileREPORT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->ANProfileREPORT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->DualMarker->Visible) { // DualMarker ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->DualMarker) == "") { ?>
		<th data-name="DualMarker" class="<?php echo $patient_an_registration_list->DualMarker->headerCellClass() ?>"><div id="elh_patient_an_registration_DualMarker" class="patient_an_registration_DualMarker"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->DualMarker->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DualMarker" class="<?php echo $patient_an_registration_list->DualMarker->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->DualMarker) ?>', 1);"><div id="elh_patient_an_registration_DualMarker" class="patient_an_registration_DualMarker">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->DualMarker->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->DualMarker->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->DualMarker->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->DualMarkerDATE->Visible) { // DualMarkerDATE ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->DualMarkerDATE) == "") { ?>
		<th data-name="DualMarkerDATE" class="<?php echo $patient_an_registration_list->DualMarkerDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_DualMarkerDATE" class="patient_an_registration_DualMarkerDATE"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->DualMarkerDATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DualMarkerDATE" class="<?php echo $patient_an_registration_list->DualMarkerDATE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->DualMarkerDATE) ?>', 1);"><div id="elh_patient_an_registration_DualMarkerDATE" class="patient_an_registration_DualMarkerDATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->DualMarkerDATE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->DualMarkerDATE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->DualMarkerDATE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->DualMarkerINHOUSE->Visible) { // DualMarkerINHOUSE ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->DualMarkerINHOUSE) == "") { ?>
		<th data-name="DualMarkerINHOUSE" class="<?php echo $patient_an_registration_list->DualMarkerINHOUSE->headerCellClass() ?>"><div id="elh_patient_an_registration_DualMarkerINHOUSE" class="patient_an_registration_DualMarkerINHOUSE"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->DualMarkerINHOUSE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DualMarkerINHOUSE" class="<?php echo $patient_an_registration_list->DualMarkerINHOUSE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->DualMarkerINHOUSE) ?>', 1);"><div id="elh_patient_an_registration_DualMarkerINHOUSE" class="patient_an_registration_DualMarkerINHOUSE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->DualMarkerINHOUSE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->DualMarkerINHOUSE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->DualMarkerINHOUSE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->DualMarkerREPORT->Visible) { // DualMarkerREPORT ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->DualMarkerREPORT) == "") { ?>
		<th data-name="DualMarkerREPORT" class="<?php echo $patient_an_registration_list->DualMarkerREPORT->headerCellClass() ?>"><div id="elh_patient_an_registration_DualMarkerREPORT" class="patient_an_registration_DualMarkerREPORT"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->DualMarkerREPORT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DualMarkerREPORT" class="<?php echo $patient_an_registration_list->DualMarkerREPORT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->DualMarkerREPORT) ?>', 1);"><div id="elh_patient_an_registration_DualMarkerREPORT" class="patient_an_registration_DualMarkerREPORT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->DualMarkerREPORT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->DualMarkerREPORT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->DualMarkerREPORT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->Quadruple->Visible) { // Quadruple ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->Quadruple) == "") { ?>
		<th data-name="Quadruple" class="<?php echo $patient_an_registration_list->Quadruple->headerCellClass() ?>"><div id="elh_patient_an_registration_Quadruple" class="patient_an_registration_Quadruple"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->Quadruple->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Quadruple" class="<?php echo $patient_an_registration_list->Quadruple->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->Quadruple) ?>', 1);"><div id="elh_patient_an_registration_Quadruple" class="patient_an_registration_Quadruple">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->Quadruple->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->Quadruple->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->Quadruple->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->QuadrupleDATE->Visible) { // QuadrupleDATE ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->QuadrupleDATE) == "") { ?>
		<th data-name="QuadrupleDATE" class="<?php echo $patient_an_registration_list->QuadrupleDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_QuadrupleDATE" class="patient_an_registration_QuadrupleDATE"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->QuadrupleDATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="QuadrupleDATE" class="<?php echo $patient_an_registration_list->QuadrupleDATE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->QuadrupleDATE) ?>', 1);"><div id="elh_patient_an_registration_QuadrupleDATE" class="patient_an_registration_QuadrupleDATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->QuadrupleDATE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->QuadrupleDATE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->QuadrupleDATE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->QuadrupleINHOUSE->Visible) { // QuadrupleINHOUSE ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->QuadrupleINHOUSE) == "") { ?>
		<th data-name="QuadrupleINHOUSE" class="<?php echo $patient_an_registration_list->QuadrupleINHOUSE->headerCellClass() ?>"><div id="elh_patient_an_registration_QuadrupleINHOUSE" class="patient_an_registration_QuadrupleINHOUSE"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->QuadrupleINHOUSE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="QuadrupleINHOUSE" class="<?php echo $patient_an_registration_list->QuadrupleINHOUSE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->QuadrupleINHOUSE) ?>', 1);"><div id="elh_patient_an_registration_QuadrupleINHOUSE" class="patient_an_registration_QuadrupleINHOUSE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->QuadrupleINHOUSE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->QuadrupleINHOUSE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->QuadrupleINHOUSE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->QuadrupleREPORT->Visible) { // QuadrupleREPORT ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->QuadrupleREPORT) == "") { ?>
		<th data-name="QuadrupleREPORT" class="<?php echo $patient_an_registration_list->QuadrupleREPORT->headerCellClass() ?>"><div id="elh_patient_an_registration_QuadrupleREPORT" class="patient_an_registration_QuadrupleREPORT"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->QuadrupleREPORT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="QuadrupleREPORT" class="<?php echo $patient_an_registration_list->QuadrupleREPORT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->QuadrupleREPORT) ?>', 1);"><div id="elh_patient_an_registration_QuadrupleREPORT" class="patient_an_registration_QuadrupleREPORT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->QuadrupleREPORT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->QuadrupleREPORT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->QuadrupleREPORT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->A5month->Visible) { // A5month ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->A5month) == "") { ?>
		<th data-name="A5month" class="<?php echo $patient_an_registration_list->A5month->headerCellClass() ?>"><div id="elh_patient_an_registration_A5month" class="patient_an_registration_A5month"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->A5month->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="A5month" class="<?php echo $patient_an_registration_list->A5month->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->A5month) ?>', 1);"><div id="elh_patient_an_registration_A5month" class="patient_an_registration_A5month">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->A5month->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->A5month->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->A5month->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->A5monthDATE->Visible) { // A5monthDATE ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->A5monthDATE) == "") { ?>
		<th data-name="A5monthDATE" class="<?php echo $patient_an_registration_list->A5monthDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_A5monthDATE" class="patient_an_registration_A5monthDATE"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->A5monthDATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="A5monthDATE" class="<?php echo $patient_an_registration_list->A5monthDATE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->A5monthDATE) ?>', 1);"><div id="elh_patient_an_registration_A5monthDATE" class="patient_an_registration_A5monthDATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->A5monthDATE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->A5monthDATE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->A5monthDATE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->A5monthINHOUSE->Visible) { // A5monthINHOUSE ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->A5monthINHOUSE) == "") { ?>
		<th data-name="A5monthINHOUSE" class="<?php echo $patient_an_registration_list->A5monthINHOUSE->headerCellClass() ?>"><div id="elh_patient_an_registration_A5monthINHOUSE" class="patient_an_registration_A5monthINHOUSE"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->A5monthINHOUSE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="A5monthINHOUSE" class="<?php echo $patient_an_registration_list->A5monthINHOUSE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->A5monthINHOUSE) ?>', 1);"><div id="elh_patient_an_registration_A5monthINHOUSE" class="patient_an_registration_A5monthINHOUSE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->A5monthINHOUSE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->A5monthINHOUSE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->A5monthINHOUSE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->A5monthREPORT->Visible) { // A5monthREPORT ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->A5monthREPORT) == "") { ?>
		<th data-name="A5monthREPORT" class="<?php echo $patient_an_registration_list->A5monthREPORT->headerCellClass() ?>"><div id="elh_patient_an_registration_A5monthREPORT" class="patient_an_registration_A5monthREPORT"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->A5monthREPORT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="A5monthREPORT" class="<?php echo $patient_an_registration_list->A5monthREPORT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->A5monthREPORT) ?>', 1);"><div id="elh_patient_an_registration_A5monthREPORT" class="patient_an_registration_A5monthREPORT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->A5monthREPORT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->A5monthREPORT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->A5monthREPORT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->A7month->Visible) { // A7month ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->A7month) == "") { ?>
		<th data-name="A7month" class="<?php echo $patient_an_registration_list->A7month->headerCellClass() ?>"><div id="elh_patient_an_registration_A7month" class="patient_an_registration_A7month"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->A7month->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="A7month" class="<?php echo $patient_an_registration_list->A7month->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->A7month) ?>', 1);"><div id="elh_patient_an_registration_A7month" class="patient_an_registration_A7month">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->A7month->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->A7month->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->A7month->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->A7monthDATE->Visible) { // A7monthDATE ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->A7monthDATE) == "") { ?>
		<th data-name="A7monthDATE" class="<?php echo $patient_an_registration_list->A7monthDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_A7monthDATE" class="patient_an_registration_A7monthDATE"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->A7monthDATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="A7monthDATE" class="<?php echo $patient_an_registration_list->A7monthDATE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->A7monthDATE) ?>', 1);"><div id="elh_patient_an_registration_A7monthDATE" class="patient_an_registration_A7monthDATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->A7monthDATE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->A7monthDATE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->A7monthDATE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->A7monthINHOUSE->Visible) { // A7monthINHOUSE ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->A7monthINHOUSE) == "") { ?>
		<th data-name="A7monthINHOUSE" class="<?php echo $patient_an_registration_list->A7monthINHOUSE->headerCellClass() ?>"><div id="elh_patient_an_registration_A7monthINHOUSE" class="patient_an_registration_A7monthINHOUSE"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->A7monthINHOUSE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="A7monthINHOUSE" class="<?php echo $patient_an_registration_list->A7monthINHOUSE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->A7monthINHOUSE) ?>', 1);"><div id="elh_patient_an_registration_A7monthINHOUSE" class="patient_an_registration_A7monthINHOUSE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->A7monthINHOUSE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->A7monthINHOUSE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->A7monthINHOUSE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->A7monthREPORT->Visible) { // A7monthREPORT ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->A7monthREPORT) == "") { ?>
		<th data-name="A7monthREPORT" class="<?php echo $patient_an_registration_list->A7monthREPORT->headerCellClass() ?>"><div id="elh_patient_an_registration_A7monthREPORT" class="patient_an_registration_A7monthREPORT"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->A7monthREPORT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="A7monthREPORT" class="<?php echo $patient_an_registration_list->A7monthREPORT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->A7monthREPORT) ?>', 1);"><div id="elh_patient_an_registration_A7monthREPORT" class="patient_an_registration_A7monthREPORT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->A7monthREPORT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->A7monthREPORT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->A7monthREPORT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->A9month->Visible) { // A9month ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->A9month) == "") { ?>
		<th data-name="A9month" class="<?php echo $patient_an_registration_list->A9month->headerCellClass() ?>"><div id="elh_patient_an_registration_A9month" class="patient_an_registration_A9month"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->A9month->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="A9month" class="<?php echo $patient_an_registration_list->A9month->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->A9month) ?>', 1);"><div id="elh_patient_an_registration_A9month" class="patient_an_registration_A9month">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->A9month->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->A9month->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->A9month->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->A9monthDATE->Visible) { // A9monthDATE ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->A9monthDATE) == "") { ?>
		<th data-name="A9monthDATE" class="<?php echo $patient_an_registration_list->A9monthDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_A9monthDATE" class="patient_an_registration_A9monthDATE"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->A9monthDATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="A9monthDATE" class="<?php echo $patient_an_registration_list->A9monthDATE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->A9monthDATE) ?>', 1);"><div id="elh_patient_an_registration_A9monthDATE" class="patient_an_registration_A9monthDATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->A9monthDATE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->A9monthDATE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->A9monthDATE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->A9monthINHOUSE->Visible) { // A9monthINHOUSE ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->A9monthINHOUSE) == "") { ?>
		<th data-name="A9monthINHOUSE" class="<?php echo $patient_an_registration_list->A9monthINHOUSE->headerCellClass() ?>"><div id="elh_patient_an_registration_A9monthINHOUSE" class="patient_an_registration_A9monthINHOUSE"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->A9monthINHOUSE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="A9monthINHOUSE" class="<?php echo $patient_an_registration_list->A9monthINHOUSE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->A9monthINHOUSE) ?>', 1);"><div id="elh_patient_an_registration_A9monthINHOUSE" class="patient_an_registration_A9monthINHOUSE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->A9monthINHOUSE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->A9monthINHOUSE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->A9monthINHOUSE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->A9monthREPORT->Visible) { // A9monthREPORT ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->A9monthREPORT) == "") { ?>
		<th data-name="A9monthREPORT" class="<?php echo $patient_an_registration_list->A9monthREPORT->headerCellClass() ?>"><div id="elh_patient_an_registration_A9monthREPORT" class="patient_an_registration_A9monthREPORT"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->A9monthREPORT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="A9monthREPORT" class="<?php echo $patient_an_registration_list->A9monthREPORT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->A9monthREPORT) ?>', 1);"><div id="elh_patient_an_registration_A9monthREPORT" class="patient_an_registration_A9monthREPORT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->A9monthREPORT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->A9monthREPORT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->A9monthREPORT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->INJ->Visible) { // INJ ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->INJ) == "") { ?>
		<th data-name="INJ" class="<?php echo $patient_an_registration_list->INJ->headerCellClass() ?>"><div id="elh_patient_an_registration_INJ" class="patient_an_registration_INJ"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->INJ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="INJ" class="<?php echo $patient_an_registration_list->INJ->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->INJ) ?>', 1);"><div id="elh_patient_an_registration_INJ" class="patient_an_registration_INJ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->INJ->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->INJ->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->INJ->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->INJDATE->Visible) { // INJDATE ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->INJDATE) == "") { ?>
		<th data-name="INJDATE" class="<?php echo $patient_an_registration_list->INJDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_INJDATE" class="patient_an_registration_INJDATE"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->INJDATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="INJDATE" class="<?php echo $patient_an_registration_list->INJDATE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->INJDATE) ?>', 1);"><div id="elh_patient_an_registration_INJDATE" class="patient_an_registration_INJDATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->INJDATE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->INJDATE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->INJDATE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->INJINHOUSE->Visible) { // INJINHOUSE ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->INJINHOUSE) == "") { ?>
		<th data-name="INJINHOUSE" class="<?php echo $patient_an_registration_list->INJINHOUSE->headerCellClass() ?>"><div id="elh_patient_an_registration_INJINHOUSE" class="patient_an_registration_INJINHOUSE"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->INJINHOUSE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="INJINHOUSE" class="<?php echo $patient_an_registration_list->INJINHOUSE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->INJINHOUSE) ?>', 1);"><div id="elh_patient_an_registration_INJINHOUSE" class="patient_an_registration_INJINHOUSE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->INJINHOUSE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->INJINHOUSE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->INJINHOUSE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->INJREPORT->Visible) { // INJREPORT ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->INJREPORT) == "") { ?>
		<th data-name="INJREPORT" class="<?php echo $patient_an_registration_list->INJREPORT->headerCellClass() ?>"><div id="elh_patient_an_registration_INJREPORT" class="patient_an_registration_INJREPORT"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->INJREPORT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="INJREPORT" class="<?php echo $patient_an_registration_list->INJREPORT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->INJREPORT) ?>', 1);"><div id="elh_patient_an_registration_INJREPORT" class="patient_an_registration_INJREPORT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->INJREPORT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->INJREPORT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->INJREPORT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->Bleeding->Visible) { // Bleeding ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->Bleeding) == "") { ?>
		<th data-name="Bleeding" class="<?php echo $patient_an_registration_list->Bleeding->headerCellClass() ?>"><div id="elh_patient_an_registration_Bleeding" class="patient_an_registration_Bleeding"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->Bleeding->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Bleeding" class="<?php echo $patient_an_registration_list->Bleeding->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->Bleeding) ?>', 1);"><div id="elh_patient_an_registration_Bleeding" class="patient_an_registration_Bleeding">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->Bleeding->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->Bleeding->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->Bleeding->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->Hypothyroidism->Visible) { // Hypothyroidism ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->Hypothyroidism) == "") { ?>
		<th data-name="Hypothyroidism" class="<?php echo $patient_an_registration_list->Hypothyroidism->headerCellClass() ?>"><div id="elh_patient_an_registration_Hypothyroidism" class="patient_an_registration_Hypothyroidism"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->Hypothyroidism->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Hypothyroidism" class="<?php echo $patient_an_registration_list->Hypothyroidism->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->Hypothyroidism) ?>', 1);"><div id="elh_patient_an_registration_Hypothyroidism" class="patient_an_registration_Hypothyroidism">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->Hypothyroidism->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->Hypothyroidism->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->Hypothyroidism->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->PICMENumber->Visible) { // PICMENumber ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->PICMENumber) == "") { ?>
		<th data-name="PICMENumber" class="<?php echo $patient_an_registration_list->PICMENumber->headerCellClass() ?>"><div id="elh_patient_an_registration_PICMENumber" class="patient_an_registration_PICMENumber"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->PICMENumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PICMENumber" class="<?php echo $patient_an_registration_list->PICMENumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->PICMENumber) ?>', 1);"><div id="elh_patient_an_registration_PICMENumber" class="patient_an_registration_PICMENumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->PICMENumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->PICMENumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->PICMENumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->Outcome->Visible) { // Outcome ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->Outcome) == "") { ?>
		<th data-name="Outcome" class="<?php echo $patient_an_registration_list->Outcome->headerCellClass() ?>"><div id="elh_patient_an_registration_Outcome" class="patient_an_registration_Outcome"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->Outcome->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Outcome" class="<?php echo $patient_an_registration_list->Outcome->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->Outcome) ?>', 1);"><div id="elh_patient_an_registration_Outcome" class="patient_an_registration_Outcome">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->Outcome->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->Outcome->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->Outcome->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->DateofAdmission->Visible) { // DateofAdmission ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->DateofAdmission) == "") { ?>
		<th data-name="DateofAdmission" class="<?php echo $patient_an_registration_list->DateofAdmission->headerCellClass() ?>"><div id="elh_patient_an_registration_DateofAdmission" class="patient_an_registration_DateofAdmission"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->DateofAdmission->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DateofAdmission" class="<?php echo $patient_an_registration_list->DateofAdmission->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->DateofAdmission) ?>', 1);"><div id="elh_patient_an_registration_DateofAdmission" class="patient_an_registration_DateofAdmission">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->DateofAdmission->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->DateofAdmission->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->DateofAdmission->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->DateodProcedure->Visible) { // DateodProcedure ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->DateodProcedure) == "") { ?>
		<th data-name="DateodProcedure" class="<?php echo $patient_an_registration_list->DateodProcedure->headerCellClass() ?>"><div id="elh_patient_an_registration_DateodProcedure" class="patient_an_registration_DateodProcedure"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->DateodProcedure->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DateodProcedure" class="<?php echo $patient_an_registration_list->DateodProcedure->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->DateodProcedure) ?>', 1);"><div id="elh_patient_an_registration_DateodProcedure" class="patient_an_registration_DateodProcedure">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->DateodProcedure->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->DateodProcedure->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->DateodProcedure->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->Miscarriage->Visible) { // Miscarriage ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->Miscarriage) == "") { ?>
		<th data-name="Miscarriage" class="<?php echo $patient_an_registration_list->Miscarriage->headerCellClass() ?>"><div id="elh_patient_an_registration_Miscarriage" class="patient_an_registration_Miscarriage"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->Miscarriage->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Miscarriage" class="<?php echo $patient_an_registration_list->Miscarriage->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->Miscarriage) ?>', 1);"><div id="elh_patient_an_registration_Miscarriage" class="patient_an_registration_Miscarriage">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->Miscarriage->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->Miscarriage->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->Miscarriage->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->ModeOfDelivery->Visible) { // ModeOfDelivery ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->ModeOfDelivery) == "") { ?>
		<th data-name="ModeOfDelivery" class="<?php echo $patient_an_registration_list->ModeOfDelivery->headerCellClass() ?>"><div id="elh_patient_an_registration_ModeOfDelivery" class="patient_an_registration_ModeOfDelivery"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->ModeOfDelivery->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModeOfDelivery" class="<?php echo $patient_an_registration_list->ModeOfDelivery->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->ModeOfDelivery) ?>', 1);"><div id="elh_patient_an_registration_ModeOfDelivery" class="patient_an_registration_ModeOfDelivery">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->ModeOfDelivery->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->ModeOfDelivery->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->ModeOfDelivery->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->ND->Visible) { // ND ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->ND) == "") { ?>
		<th data-name="ND" class="<?php echo $patient_an_registration_list->ND->headerCellClass() ?>"><div id="elh_patient_an_registration_ND" class="patient_an_registration_ND"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->ND->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ND" class="<?php echo $patient_an_registration_list->ND->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->ND) ?>', 1);"><div id="elh_patient_an_registration_ND" class="patient_an_registration_ND">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->ND->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->ND->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->ND->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->NDS->Visible) { // NDS ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->NDS) == "") { ?>
		<th data-name="NDS" class="<?php echo $patient_an_registration_list->NDS->headerCellClass() ?>"><div id="elh_patient_an_registration_NDS" class="patient_an_registration_NDS"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->NDS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NDS" class="<?php echo $patient_an_registration_list->NDS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->NDS) ?>', 1);"><div id="elh_patient_an_registration_NDS" class="patient_an_registration_NDS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->NDS->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->NDS->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->NDS->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->NDP->Visible) { // NDP ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->NDP) == "") { ?>
		<th data-name="NDP" class="<?php echo $patient_an_registration_list->NDP->headerCellClass() ?>"><div id="elh_patient_an_registration_NDP" class="patient_an_registration_NDP"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->NDP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NDP" class="<?php echo $patient_an_registration_list->NDP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->NDP) ?>', 1);"><div id="elh_patient_an_registration_NDP" class="patient_an_registration_NDP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->NDP->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->NDP->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->NDP->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->Vaccum->Visible) { // Vaccum ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->Vaccum) == "") { ?>
		<th data-name="Vaccum" class="<?php echo $patient_an_registration_list->Vaccum->headerCellClass() ?>"><div id="elh_patient_an_registration_Vaccum" class="patient_an_registration_Vaccum"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->Vaccum->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Vaccum" class="<?php echo $patient_an_registration_list->Vaccum->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->Vaccum) ?>', 1);"><div id="elh_patient_an_registration_Vaccum" class="patient_an_registration_Vaccum">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->Vaccum->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->Vaccum->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->Vaccum->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->VaccumS->Visible) { // VaccumS ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->VaccumS) == "") { ?>
		<th data-name="VaccumS" class="<?php echo $patient_an_registration_list->VaccumS->headerCellClass() ?>"><div id="elh_patient_an_registration_VaccumS" class="patient_an_registration_VaccumS"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->VaccumS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="VaccumS" class="<?php echo $patient_an_registration_list->VaccumS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->VaccumS) ?>', 1);"><div id="elh_patient_an_registration_VaccumS" class="patient_an_registration_VaccumS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->VaccumS->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->VaccumS->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->VaccumS->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->VaccumP->Visible) { // VaccumP ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->VaccumP) == "") { ?>
		<th data-name="VaccumP" class="<?php echo $patient_an_registration_list->VaccumP->headerCellClass() ?>"><div id="elh_patient_an_registration_VaccumP" class="patient_an_registration_VaccumP"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->VaccumP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="VaccumP" class="<?php echo $patient_an_registration_list->VaccumP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->VaccumP) ?>', 1);"><div id="elh_patient_an_registration_VaccumP" class="patient_an_registration_VaccumP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->VaccumP->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->VaccumP->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->VaccumP->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->Forceps->Visible) { // Forceps ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->Forceps) == "") { ?>
		<th data-name="Forceps" class="<?php echo $patient_an_registration_list->Forceps->headerCellClass() ?>"><div id="elh_patient_an_registration_Forceps" class="patient_an_registration_Forceps"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->Forceps->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Forceps" class="<?php echo $patient_an_registration_list->Forceps->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->Forceps) ?>', 1);"><div id="elh_patient_an_registration_Forceps" class="patient_an_registration_Forceps">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->Forceps->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->Forceps->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->Forceps->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->ForcepsS->Visible) { // ForcepsS ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->ForcepsS) == "") { ?>
		<th data-name="ForcepsS" class="<?php echo $patient_an_registration_list->ForcepsS->headerCellClass() ?>"><div id="elh_patient_an_registration_ForcepsS" class="patient_an_registration_ForcepsS"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->ForcepsS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ForcepsS" class="<?php echo $patient_an_registration_list->ForcepsS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->ForcepsS) ?>', 1);"><div id="elh_patient_an_registration_ForcepsS" class="patient_an_registration_ForcepsS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->ForcepsS->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->ForcepsS->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->ForcepsS->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->ForcepsP->Visible) { // ForcepsP ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->ForcepsP) == "") { ?>
		<th data-name="ForcepsP" class="<?php echo $patient_an_registration_list->ForcepsP->headerCellClass() ?>"><div id="elh_patient_an_registration_ForcepsP" class="patient_an_registration_ForcepsP"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->ForcepsP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ForcepsP" class="<?php echo $patient_an_registration_list->ForcepsP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->ForcepsP) ?>', 1);"><div id="elh_patient_an_registration_ForcepsP" class="patient_an_registration_ForcepsP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->ForcepsP->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->ForcepsP->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->ForcepsP->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->Elective->Visible) { // Elective ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->Elective) == "") { ?>
		<th data-name="Elective" class="<?php echo $patient_an_registration_list->Elective->headerCellClass() ?>"><div id="elh_patient_an_registration_Elective" class="patient_an_registration_Elective"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->Elective->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Elective" class="<?php echo $patient_an_registration_list->Elective->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->Elective) ?>', 1);"><div id="elh_patient_an_registration_Elective" class="patient_an_registration_Elective">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->Elective->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->Elective->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->Elective->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->ElectiveS->Visible) { // ElectiveS ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->ElectiveS) == "") { ?>
		<th data-name="ElectiveS" class="<?php echo $patient_an_registration_list->ElectiveS->headerCellClass() ?>"><div id="elh_patient_an_registration_ElectiveS" class="patient_an_registration_ElectiveS"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->ElectiveS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ElectiveS" class="<?php echo $patient_an_registration_list->ElectiveS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->ElectiveS) ?>', 1);"><div id="elh_patient_an_registration_ElectiveS" class="patient_an_registration_ElectiveS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->ElectiveS->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->ElectiveS->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->ElectiveS->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->ElectiveP->Visible) { // ElectiveP ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->ElectiveP) == "") { ?>
		<th data-name="ElectiveP" class="<?php echo $patient_an_registration_list->ElectiveP->headerCellClass() ?>"><div id="elh_patient_an_registration_ElectiveP" class="patient_an_registration_ElectiveP"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->ElectiveP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ElectiveP" class="<?php echo $patient_an_registration_list->ElectiveP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->ElectiveP) ?>', 1);"><div id="elh_patient_an_registration_ElectiveP" class="patient_an_registration_ElectiveP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->ElectiveP->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->ElectiveP->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->ElectiveP->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->Emergency->Visible) { // Emergency ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->Emergency) == "") { ?>
		<th data-name="Emergency" class="<?php echo $patient_an_registration_list->Emergency->headerCellClass() ?>"><div id="elh_patient_an_registration_Emergency" class="patient_an_registration_Emergency"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->Emergency->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Emergency" class="<?php echo $patient_an_registration_list->Emergency->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->Emergency) ?>', 1);"><div id="elh_patient_an_registration_Emergency" class="patient_an_registration_Emergency">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->Emergency->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->Emergency->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->Emergency->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->EmergencyS->Visible) { // EmergencyS ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->EmergencyS) == "") { ?>
		<th data-name="EmergencyS" class="<?php echo $patient_an_registration_list->EmergencyS->headerCellClass() ?>"><div id="elh_patient_an_registration_EmergencyS" class="patient_an_registration_EmergencyS"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->EmergencyS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EmergencyS" class="<?php echo $patient_an_registration_list->EmergencyS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->EmergencyS) ?>', 1);"><div id="elh_patient_an_registration_EmergencyS" class="patient_an_registration_EmergencyS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->EmergencyS->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->EmergencyS->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->EmergencyS->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->EmergencyP->Visible) { // EmergencyP ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->EmergencyP) == "") { ?>
		<th data-name="EmergencyP" class="<?php echo $patient_an_registration_list->EmergencyP->headerCellClass() ?>"><div id="elh_patient_an_registration_EmergencyP" class="patient_an_registration_EmergencyP"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->EmergencyP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EmergencyP" class="<?php echo $patient_an_registration_list->EmergencyP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->EmergencyP) ?>', 1);"><div id="elh_patient_an_registration_EmergencyP" class="patient_an_registration_EmergencyP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->EmergencyP->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->EmergencyP->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->EmergencyP->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->Maturity->Visible) { // Maturity ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->Maturity) == "") { ?>
		<th data-name="Maturity" class="<?php echo $patient_an_registration_list->Maturity->headerCellClass() ?>"><div id="elh_patient_an_registration_Maturity" class="patient_an_registration_Maturity"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->Maturity->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Maturity" class="<?php echo $patient_an_registration_list->Maturity->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->Maturity) ?>', 1);"><div id="elh_patient_an_registration_Maturity" class="patient_an_registration_Maturity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->Maturity->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->Maturity->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->Maturity->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->Baby1->Visible) { // Baby1 ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->Baby1) == "") { ?>
		<th data-name="Baby1" class="<?php echo $patient_an_registration_list->Baby1->headerCellClass() ?>"><div id="elh_patient_an_registration_Baby1" class="patient_an_registration_Baby1"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->Baby1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Baby1" class="<?php echo $patient_an_registration_list->Baby1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->Baby1) ?>', 1);"><div id="elh_patient_an_registration_Baby1" class="patient_an_registration_Baby1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->Baby1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->Baby1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->Baby1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->Baby2->Visible) { // Baby2 ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->Baby2) == "") { ?>
		<th data-name="Baby2" class="<?php echo $patient_an_registration_list->Baby2->headerCellClass() ?>"><div id="elh_patient_an_registration_Baby2" class="patient_an_registration_Baby2"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->Baby2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Baby2" class="<?php echo $patient_an_registration_list->Baby2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->Baby2) ?>', 1);"><div id="elh_patient_an_registration_Baby2" class="patient_an_registration_Baby2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->Baby2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->Baby2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->Baby2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->sex1->Visible) { // sex1 ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->sex1) == "") { ?>
		<th data-name="sex1" class="<?php echo $patient_an_registration_list->sex1->headerCellClass() ?>"><div id="elh_patient_an_registration_sex1" class="patient_an_registration_sex1"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->sex1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sex1" class="<?php echo $patient_an_registration_list->sex1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->sex1) ?>', 1);"><div id="elh_patient_an_registration_sex1" class="patient_an_registration_sex1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->sex1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->sex1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->sex1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->sex2->Visible) { // sex2 ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->sex2) == "") { ?>
		<th data-name="sex2" class="<?php echo $patient_an_registration_list->sex2->headerCellClass() ?>"><div id="elh_patient_an_registration_sex2" class="patient_an_registration_sex2"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->sex2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sex2" class="<?php echo $patient_an_registration_list->sex2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->sex2) ?>', 1);"><div id="elh_patient_an_registration_sex2" class="patient_an_registration_sex2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->sex2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->sex2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->sex2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->weight1->Visible) { // weight1 ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->weight1) == "") { ?>
		<th data-name="weight1" class="<?php echo $patient_an_registration_list->weight1->headerCellClass() ?>"><div id="elh_patient_an_registration_weight1" class="patient_an_registration_weight1"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->weight1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="weight1" class="<?php echo $patient_an_registration_list->weight1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->weight1) ?>', 1);"><div id="elh_patient_an_registration_weight1" class="patient_an_registration_weight1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->weight1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->weight1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->weight1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->weight2->Visible) { // weight2 ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->weight2) == "") { ?>
		<th data-name="weight2" class="<?php echo $patient_an_registration_list->weight2->headerCellClass() ?>"><div id="elh_patient_an_registration_weight2" class="patient_an_registration_weight2"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->weight2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="weight2" class="<?php echo $patient_an_registration_list->weight2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->weight2) ?>', 1);"><div id="elh_patient_an_registration_weight2" class="patient_an_registration_weight2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->weight2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->weight2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->weight2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->NICU1->Visible) { // NICU1 ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->NICU1) == "") { ?>
		<th data-name="NICU1" class="<?php echo $patient_an_registration_list->NICU1->headerCellClass() ?>"><div id="elh_patient_an_registration_NICU1" class="patient_an_registration_NICU1"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->NICU1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NICU1" class="<?php echo $patient_an_registration_list->NICU1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->NICU1) ?>', 1);"><div id="elh_patient_an_registration_NICU1" class="patient_an_registration_NICU1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->NICU1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->NICU1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->NICU1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->NICU2->Visible) { // NICU2 ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->NICU2) == "") { ?>
		<th data-name="NICU2" class="<?php echo $patient_an_registration_list->NICU2->headerCellClass() ?>"><div id="elh_patient_an_registration_NICU2" class="patient_an_registration_NICU2"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->NICU2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NICU2" class="<?php echo $patient_an_registration_list->NICU2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->NICU2) ?>', 1);"><div id="elh_patient_an_registration_NICU2" class="patient_an_registration_NICU2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->NICU2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->NICU2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->NICU2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->Jaundice1->Visible) { // Jaundice1 ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->Jaundice1) == "") { ?>
		<th data-name="Jaundice1" class="<?php echo $patient_an_registration_list->Jaundice1->headerCellClass() ?>"><div id="elh_patient_an_registration_Jaundice1" class="patient_an_registration_Jaundice1"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->Jaundice1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Jaundice1" class="<?php echo $patient_an_registration_list->Jaundice1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->Jaundice1) ?>', 1);"><div id="elh_patient_an_registration_Jaundice1" class="patient_an_registration_Jaundice1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->Jaundice1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->Jaundice1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->Jaundice1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->Jaundice2->Visible) { // Jaundice2 ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->Jaundice2) == "") { ?>
		<th data-name="Jaundice2" class="<?php echo $patient_an_registration_list->Jaundice2->headerCellClass() ?>"><div id="elh_patient_an_registration_Jaundice2" class="patient_an_registration_Jaundice2"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->Jaundice2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Jaundice2" class="<?php echo $patient_an_registration_list->Jaundice2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->Jaundice2) ?>', 1);"><div id="elh_patient_an_registration_Jaundice2" class="patient_an_registration_Jaundice2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->Jaundice2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->Jaundice2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->Jaundice2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->Others1->Visible) { // Others1 ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->Others1) == "") { ?>
		<th data-name="Others1" class="<?php echo $patient_an_registration_list->Others1->headerCellClass() ?>"><div id="elh_patient_an_registration_Others1" class="patient_an_registration_Others1"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->Others1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Others1" class="<?php echo $patient_an_registration_list->Others1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->Others1) ?>', 1);"><div id="elh_patient_an_registration_Others1" class="patient_an_registration_Others1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->Others1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->Others1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->Others1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->Others2->Visible) { // Others2 ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->Others2) == "") { ?>
		<th data-name="Others2" class="<?php echo $patient_an_registration_list->Others2->headerCellClass() ?>"><div id="elh_patient_an_registration_Others2" class="patient_an_registration_Others2"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->Others2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Others2" class="<?php echo $patient_an_registration_list->Others2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->Others2) ?>', 1);"><div id="elh_patient_an_registration_Others2" class="patient_an_registration_Others2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->Others2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->Others2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->Others2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->SpillOverReasons->Visible) { // SpillOverReasons ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->SpillOverReasons) == "") { ?>
		<th data-name="SpillOverReasons" class="<?php echo $patient_an_registration_list->SpillOverReasons->headerCellClass() ?>"><div id="elh_patient_an_registration_SpillOverReasons" class="patient_an_registration_SpillOverReasons"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->SpillOverReasons->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SpillOverReasons" class="<?php echo $patient_an_registration_list->SpillOverReasons->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->SpillOverReasons) ?>', 1);"><div id="elh_patient_an_registration_SpillOverReasons" class="patient_an_registration_SpillOverReasons">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->SpillOverReasons->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->SpillOverReasons->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->SpillOverReasons->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->ANClosed->Visible) { // ANClosed ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->ANClosed) == "") { ?>
		<th data-name="ANClosed" class="<?php echo $patient_an_registration_list->ANClosed->headerCellClass() ?>"><div id="elh_patient_an_registration_ANClosed" class="patient_an_registration_ANClosed"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->ANClosed->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ANClosed" class="<?php echo $patient_an_registration_list->ANClosed->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->ANClosed) ?>', 1);"><div id="elh_patient_an_registration_ANClosed" class="patient_an_registration_ANClosed">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->ANClosed->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->ANClosed->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->ANClosed->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->ANClosedDATE->Visible) { // ANClosedDATE ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->ANClosedDATE) == "") { ?>
		<th data-name="ANClosedDATE" class="<?php echo $patient_an_registration_list->ANClosedDATE->headerCellClass() ?>"><div id="elh_patient_an_registration_ANClosedDATE" class="patient_an_registration_ANClosedDATE"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->ANClosedDATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ANClosedDATE" class="<?php echo $patient_an_registration_list->ANClosedDATE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->ANClosedDATE) ?>', 1);"><div id="elh_patient_an_registration_ANClosedDATE" class="patient_an_registration_ANClosedDATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->ANClosedDATE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->ANClosedDATE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->ANClosedDATE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->PastMedicalHistoryOthers->Visible) { // PastMedicalHistoryOthers ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->PastMedicalHistoryOthers) == "") { ?>
		<th data-name="PastMedicalHistoryOthers" class="<?php echo $patient_an_registration_list->PastMedicalHistoryOthers->headerCellClass() ?>"><div id="elh_patient_an_registration_PastMedicalHistoryOthers" class="patient_an_registration_PastMedicalHistoryOthers"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->PastMedicalHistoryOthers->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PastMedicalHistoryOthers" class="<?php echo $patient_an_registration_list->PastMedicalHistoryOthers->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->PastMedicalHistoryOthers) ?>', 1);"><div id="elh_patient_an_registration_PastMedicalHistoryOthers" class="patient_an_registration_PastMedicalHistoryOthers">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->PastMedicalHistoryOthers->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->PastMedicalHistoryOthers->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->PastMedicalHistoryOthers->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->PastSurgicalHistoryOthers->Visible) { // PastSurgicalHistoryOthers ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->PastSurgicalHistoryOthers) == "") { ?>
		<th data-name="PastSurgicalHistoryOthers" class="<?php echo $patient_an_registration_list->PastSurgicalHistoryOthers->headerCellClass() ?>"><div id="elh_patient_an_registration_PastSurgicalHistoryOthers" class="patient_an_registration_PastSurgicalHistoryOthers"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->PastSurgicalHistoryOthers->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PastSurgicalHistoryOthers" class="<?php echo $patient_an_registration_list->PastSurgicalHistoryOthers->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->PastSurgicalHistoryOthers) ?>', 1);"><div id="elh_patient_an_registration_PastSurgicalHistoryOthers" class="patient_an_registration_PastSurgicalHistoryOthers">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->PastSurgicalHistoryOthers->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->PastSurgicalHistoryOthers->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->PastSurgicalHistoryOthers->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->FamilyHistoryOthers->Visible) { // FamilyHistoryOthers ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->FamilyHistoryOthers) == "") { ?>
		<th data-name="FamilyHistoryOthers" class="<?php echo $patient_an_registration_list->FamilyHistoryOthers->headerCellClass() ?>"><div id="elh_patient_an_registration_FamilyHistoryOthers" class="patient_an_registration_FamilyHistoryOthers"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->FamilyHistoryOthers->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FamilyHistoryOthers" class="<?php echo $patient_an_registration_list->FamilyHistoryOthers->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->FamilyHistoryOthers) ?>', 1);"><div id="elh_patient_an_registration_FamilyHistoryOthers" class="patient_an_registration_FamilyHistoryOthers">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->FamilyHistoryOthers->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->FamilyHistoryOthers->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->FamilyHistoryOthers->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->PresentPregnancyComplicationsOthers->Visible) { // PresentPregnancyComplicationsOthers ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->PresentPregnancyComplicationsOthers) == "") { ?>
		<th data-name="PresentPregnancyComplicationsOthers" class="<?php echo $patient_an_registration_list->PresentPregnancyComplicationsOthers->headerCellClass() ?>"><div id="elh_patient_an_registration_PresentPregnancyComplicationsOthers" class="patient_an_registration_PresentPregnancyComplicationsOthers"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->PresentPregnancyComplicationsOthers->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PresentPregnancyComplicationsOthers" class="<?php echo $patient_an_registration_list->PresentPregnancyComplicationsOthers->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->PresentPregnancyComplicationsOthers) ?>', 1);"><div id="elh_patient_an_registration_PresentPregnancyComplicationsOthers" class="patient_an_registration_PresentPregnancyComplicationsOthers">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->PresentPregnancyComplicationsOthers->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->PresentPregnancyComplicationsOthers->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->PresentPregnancyComplicationsOthers->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_an_registration_list->ETdate->Visible) { // ETdate ?>
	<?php if ($patient_an_registration_list->SortUrl($patient_an_registration_list->ETdate) == "") { ?>
		<th data-name="ETdate" class="<?php echo $patient_an_registration_list->ETdate->headerCellClass() ?>"><div id="elh_patient_an_registration_ETdate" class="patient_an_registration_ETdate"><div class="ew-table-header-caption"><?php echo $patient_an_registration_list->ETdate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ETdate" class="<?php echo $patient_an_registration_list->ETdate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $patient_an_registration_list->SortUrl($patient_an_registration_list->ETdate) ?>', 1);"><div id="elh_patient_an_registration_ETdate" class="patient_an_registration_ETdate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_an_registration_list->ETdate->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($patient_an_registration_list->ETdate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_an_registration_list->ETdate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
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
if ($patient_an_registration_list->ExportAll && $patient_an_registration_list->isExport()) {
	$patient_an_registration_list->StopRecord = $patient_an_registration_list->TotalRecords;
} else {

	// Set the last record to display
	if ($patient_an_registration_list->TotalRecords > $patient_an_registration_list->StartRecord + $patient_an_registration_list->DisplayRecords - 1)
		$patient_an_registration_list->StopRecord = $patient_an_registration_list->StartRecord + $patient_an_registration_list->DisplayRecords - 1;
	else
		$patient_an_registration_list->StopRecord = $patient_an_registration_list->TotalRecords;
}
$patient_an_registration_list->RecordCount = $patient_an_registration_list->StartRecord - 1;
if ($patient_an_registration_list->Recordset && !$patient_an_registration_list->Recordset->EOF) {
	$patient_an_registration_list->Recordset->moveFirst();
	$selectLimit = $patient_an_registration_list->UseSelectLimit;
	if (!$selectLimit && $patient_an_registration_list->StartRecord > 1)
		$patient_an_registration_list->Recordset->move($patient_an_registration_list->StartRecord - 1);
} elseif (!$patient_an_registration->AllowAddDeleteRow && $patient_an_registration_list->StopRecord == 0) {
	$patient_an_registration_list->StopRecord = $patient_an_registration->GridAddRowCount;
}

// Initialize aggregate
$patient_an_registration->RowType = ROWTYPE_AGGREGATEINIT;
$patient_an_registration->resetAttributes();
$patient_an_registration_list->renderRow();
while ($patient_an_registration_list->RecordCount < $patient_an_registration_list->StopRecord) {
	$patient_an_registration_list->RecordCount++;
	if ($patient_an_registration_list->RecordCount >= $patient_an_registration_list->StartRecord) {
		$patient_an_registration_list->RowCount++;

		// Set up key count
		$patient_an_registration_list->KeyCount = $patient_an_registration_list->RowIndex;

		// Init row class and style
		$patient_an_registration->resetAttributes();
		$patient_an_registration->CssClass = "";
		if ($patient_an_registration_list->isGridAdd()) {
		} else {
			$patient_an_registration_list->loadRowValues($patient_an_registration_list->Recordset); // Load row values
		}
		$patient_an_registration->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$patient_an_registration->RowAttrs->merge(["data-rowindex" => $patient_an_registration_list->RowCount, "id" => "r" . $patient_an_registration_list->RowCount . "_patient_an_registration", "data-rowtype" => $patient_an_registration->RowType]);

		// Render row
		$patient_an_registration_list->renderRow();

		// Render list options
		$patient_an_registration_list->renderListOptions();
?>
	<tr <?php echo $patient_an_registration->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_an_registration_list->ListOptions->render("body", "left", $patient_an_registration_list->RowCount);
?>
	<?php if ($patient_an_registration_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $patient_an_registration_list->id->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_id">
<span<?php echo $patient_an_registration_list->id->viewAttributes() ?>><?php echo $patient_an_registration_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->pid->Visible) { // pid ?>
		<td data-name="pid" <?php echo $patient_an_registration_list->pid->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_pid">
<span<?php echo $patient_an_registration_list->pid->viewAttributes() ?>><?php echo $patient_an_registration_list->pid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->fid->Visible) { // fid ?>
		<td data-name="fid" <?php echo $patient_an_registration_list->fid->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_fid">
<span<?php echo $patient_an_registration_list->fid->viewAttributes() ?>><?php echo $patient_an_registration_list->fid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->G->Visible) { // G ?>
		<td data-name="G" <?php echo $patient_an_registration_list->G->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_G">
<span<?php echo $patient_an_registration_list->G->viewAttributes() ?>><?php echo $patient_an_registration_list->G->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->P->Visible) { // P ?>
		<td data-name="P" <?php echo $patient_an_registration_list->P->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_P">
<span<?php echo $patient_an_registration_list->P->viewAttributes() ?>><?php echo $patient_an_registration_list->P->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->L->Visible) { // L ?>
		<td data-name="L" <?php echo $patient_an_registration_list->L->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_L">
<span<?php echo $patient_an_registration_list->L->viewAttributes() ?>><?php echo $patient_an_registration_list->L->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->A->Visible) { // A ?>
		<td data-name="A" <?php echo $patient_an_registration_list->A->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_A">
<span<?php echo $patient_an_registration_list->A->viewAttributes() ?>><?php echo $patient_an_registration_list->A->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->E->Visible) { // E ?>
		<td data-name="E" <?php echo $patient_an_registration_list->E->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_E">
<span<?php echo $patient_an_registration_list->E->viewAttributes() ?>><?php echo $patient_an_registration_list->E->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->M->Visible) { // M ?>
		<td data-name="M" <?php echo $patient_an_registration_list->M->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_M">
<span<?php echo $patient_an_registration_list->M->viewAttributes() ?>><?php echo $patient_an_registration_list->M->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->LMP->Visible) { // LMP ?>
		<td data-name="LMP" <?php echo $patient_an_registration_list->LMP->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_LMP">
<span<?php echo $patient_an_registration_list->LMP->viewAttributes() ?>><?php echo $patient_an_registration_list->LMP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->EDO->Visible) { // EDO ?>
		<td data-name="EDO" <?php echo $patient_an_registration_list->EDO->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_EDO">
<span<?php echo $patient_an_registration_list->EDO->viewAttributes() ?>><?php echo $patient_an_registration_list->EDO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->MenstrualHistory->Visible) { // MenstrualHistory ?>
		<td data-name="MenstrualHistory" <?php echo $patient_an_registration_list->MenstrualHistory->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_MenstrualHistory">
<span<?php echo $patient_an_registration_list->MenstrualHistory->viewAttributes() ?>><?php echo $patient_an_registration_list->MenstrualHistory->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->MaritalHistory->Visible) { // MaritalHistory ?>
		<td data-name="MaritalHistory" <?php echo $patient_an_registration_list->MaritalHistory->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_MaritalHistory">
<span<?php echo $patient_an_registration_list->MaritalHistory->viewAttributes() ?>><?php echo $patient_an_registration_list->MaritalHistory->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->ObstetricHistory->Visible) { // ObstetricHistory ?>
		<td data-name="ObstetricHistory" <?php echo $patient_an_registration_list->ObstetricHistory->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_ObstetricHistory">
<span<?php echo $patient_an_registration_list->ObstetricHistory->viewAttributes() ?>><?php echo $patient_an_registration_list->ObstetricHistory->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->PreviousHistoryofGDM->Visible) { // PreviousHistoryofGDM ?>
		<td data-name="PreviousHistoryofGDM" <?php echo $patient_an_registration_list->PreviousHistoryofGDM->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_PreviousHistoryofGDM">
<span<?php echo $patient_an_registration_list->PreviousHistoryofGDM->viewAttributes() ?>><?php echo $patient_an_registration_list->PreviousHistoryofGDM->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->PreviousHistorofPIH->Visible) { // PreviousHistorofPIH ?>
		<td data-name="PreviousHistorofPIH" <?php echo $patient_an_registration_list->PreviousHistorofPIH->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_PreviousHistorofPIH">
<span<?php echo $patient_an_registration_list->PreviousHistorofPIH->viewAttributes() ?>><?php echo $patient_an_registration_list->PreviousHistorofPIH->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->PreviousHistoryofIUGR->Visible) { // PreviousHistoryofIUGR ?>
		<td data-name="PreviousHistoryofIUGR" <?php echo $patient_an_registration_list->PreviousHistoryofIUGR->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_PreviousHistoryofIUGR">
<span<?php echo $patient_an_registration_list->PreviousHistoryofIUGR->viewAttributes() ?>><?php echo $patient_an_registration_list->PreviousHistoryofIUGR->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->PreviousHistoryofOligohydramnios->Visible) { // PreviousHistoryofOligohydramnios ?>
		<td data-name="PreviousHistoryofOligohydramnios" <?php echo $patient_an_registration_list->PreviousHistoryofOligohydramnios->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_PreviousHistoryofOligohydramnios">
<span<?php echo $patient_an_registration_list->PreviousHistoryofOligohydramnios->viewAttributes() ?>><?php echo $patient_an_registration_list->PreviousHistoryofOligohydramnios->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->PreviousHistoryofPreterm->Visible) { // PreviousHistoryofPreterm ?>
		<td data-name="PreviousHistoryofPreterm" <?php echo $patient_an_registration_list->PreviousHistoryofPreterm->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_PreviousHistoryofPreterm">
<span<?php echo $patient_an_registration_list->PreviousHistoryofPreterm->viewAttributes() ?>><?php echo $patient_an_registration_list->PreviousHistoryofPreterm->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->G1->Visible) { // G1 ?>
		<td data-name="G1" <?php echo $patient_an_registration_list->G1->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_G1">
<span<?php echo $patient_an_registration_list->G1->viewAttributes() ?>><?php echo $patient_an_registration_list->G1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->G2->Visible) { // G2 ?>
		<td data-name="G2" <?php echo $patient_an_registration_list->G2->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_G2">
<span<?php echo $patient_an_registration_list->G2->viewAttributes() ?>><?php echo $patient_an_registration_list->G2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->G3->Visible) { // G3 ?>
		<td data-name="G3" <?php echo $patient_an_registration_list->G3->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_G3">
<span<?php echo $patient_an_registration_list->G3->viewAttributes() ?>><?php echo $patient_an_registration_list->G3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->DeliveryNDLSCS1->Visible) { // DeliveryNDLSCS1 ?>
		<td data-name="DeliveryNDLSCS1" <?php echo $patient_an_registration_list->DeliveryNDLSCS1->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_DeliveryNDLSCS1">
<span<?php echo $patient_an_registration_list->DeliveryNDLSCS1->viewAttributes() ?>><?php echo $patient_an_registration_list->DeliveryNDLSCS1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->DeliveryNDLSCS2->Visible) { // DeliveryNDLSCS2 ?>
		<td data-name="DeliveryNDLSCS2" <?php echo $patient_an_registration_list->DeliveryNDLSCS2->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_DeliveryNDLSCS2">
<span<?php echo $patient_an_registration_list->DeliveryNDLSCS2->viewAttributes() ?>><?php echo $patient_an_registration_list->DeliveryNDLSCS2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->DeliveryNDLSCS3->Visible) { // DeliveryNDLSCS3 ?>
		<td data-name="DeliveryNDLSCS3" <?php echo $patient_an_registration_list->DeliveryNDLSCS3->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_DeliveryNDLSCS3">
<span<?php echo $patient_an_registration_list->DeliveryNDLSCS3->viewAttributes() ?>><?php echo $patient_an_registration_list->DeliveryNDLSCS3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->BabySexweight1->Visible) { // BabySexweight1 ?>
		<td data-name="BabySexweight1" <?php echo $patient_an_registration_list->BabySexweight1->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_BabySexweight1">
<span<?php echo $patient_an_registration_list->BabySexweight1->viewAttributes() ?>><?php echo $patient_an_registration_list->BabySexweight1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->BabySexweight2->Visible) { // BabySexweight2 ?>
		<td data-name="BabySexweight2" <?php echo $patient_an_registration_list->BabySexweight2->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_BabySexweight2">
<span<?php echo $patient_an_registration_list->BabySexweight2->viewAttributes() ?>><?php echo $patient_an_registration_list->BabySexweight2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->BabySexweight3->Visible) { // BabySexweight3 ?>
		<td data-name="BabySexweight3" <?php echo $patient_an_registration_list->BabySexweight3->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_BabySexweight3">
<span<?php echo $patient_an_registration_list->BabySexweight3->viewAttributes() ?>><?php echo $patient_an_registration_list->BabySexweight3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->PastMedicalHistory->Visible) { // PastMedicalHistory ?>
		<td data-name="PastMedicalHistory" <?php echo $patient_an_registration_list->PastMedicalHistory->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_PastMedicalHistory">
<span<?php echo $patient_an_registration_list->PastMedicalHistory->viewAttributes() ?>><?php echo $patient_an_registration_list->PastMedicalHistory->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->PastSurgicalHistory->Visible) { // PastSurgicalHistory ?>
		<td data-name="PastSurgicalHistory" <?php echo $patient_an_registration_list->PastSurgicalHistory->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_PastSurgicalHistory">
<span<?php echo $patient_an_registration_list->PastSurgicalHistory->viewAttributes() ?>><?php echo $patient_an_registration_list->PastSurgicalHistory->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->FamilyHistory->Visible) { // FamilyHistory ?>
		<td data-name="FamilyHistory" <?php echo $patient_an_registration_list->FamilyHistory->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_FamilyHistory">
<span<?php echo $patient_an_registration_list->FamilyHistory->viewAttributes() ?>><?php echo $patient_an_registration_list->FamilyHistory->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->Viability->Visible) { // Viability ?>
		<td data-name="Viability" <?php echo $patient_an_registration_list->Viability->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_Viability">
<span<?php echo $patient_an_registration_list->Viability->viewAttributes() ?>><?php echo $patient_an_registration_list->Viability->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->ViabilityDATE->Visible) { // ViabilityDATE ?>
		<td data-name="ViabilityDATE" <?php echo $patient_an_registration_list->ViabilityDATE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_ViabilityDATE">
<span<?php echo $patient_an_registration_list->ViabilityDATE->viewAttributes() ?>><?php echo $patient_an_registration_list->ViabilityDATE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->ViabilityREPORT->Visible) { // ViabilityREPORT ?>
		<td data-name="ViabilityREPORT" <?php echo $patient_an_registration_list->ViabilityREPORT->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_ViabilityREPORT">
<span<?php echo $patient_an_registration_list->ViabilityREPORT->viewAttributes() ?>><?php echo $patient_an_registration_list->ViabilityREPORT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->Viability2->Visible) { // Viability2 ?>
		<td data-name="Viability2" <?php echo $patient_an_registration_list->Viability2->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_Viability2">
<span<?php echo $patient_an_registration_list->Viability2->viewAttributes() ?>><?php echo $patient_an_registration_list->Viability2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->Viability2DATE->Visible) { // Viability2DATE ?>
		<td data-name="Viability2DATE" <?php echo $patient_an_registration_list->Viability2DATE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_Viability2DATE">
<span<?php echo $patient_an_registration_list->Viability2DATE->viewAttributes() ?>><?php echo $patient_an_registration_list->Viability2DATE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->Viability2REPORT->Visible) { // Viability2REPORT ?>
		<td data-name="Viability2REPORT" <?php echo $patient_an_registration_list->Viability2REPORT->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_Viability2REPORT">
<span<?php echo $patient_an_registration_list->Viability2REPORT->viewAttributes() ?>><?php echo $patient_an_registration_list->Viability2REPORT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->NTscan->Visible) { // NTscan ?>
		<td data-name="NTscan" <?php echo $patient_an_registration_list->NTscan->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_NTscan">
<span<?php echo $patient_an_registration_list->NTscan->viewAttributes() ?>><?php echo $patient_an_registration_list->NTscan->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->NTscanDATE->Visible) { // NTscanDATE ?>
		<td data-name="NTscanDATE" <?php echo $patient_an_registration_list->NTscanDATE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_NTscanDATE">
<span<?php echo $patient_an_registration_list->NTscanDATE->viewAttributes() ?>><?php echo $patient_an_registration_list->NTscanDATE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->NTscanREPORT->Visible) { // NTscanREPORT ?>
		<td data-name="NTscanREPORT" <?php echo $patient_an_registration_list->NTscanREPORT->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_NTscanREPORT">
<span<?php echo $patient_an_registration_list->NTscanREPORT->viewAttributes() ?>><?php echo $patient_an_registration_list->NTscanREPORT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->EarlyTarget->Visible) { // EarlyTarget ?>
		<td data-name="EarlyTarget" <?php echo $patient_an_registration_list->EarlyTarget->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_EarlyTarget">
<span<?php echo $patient_an_registration_list->EarlyTarget->viewAttributes() ?>><?php echo $patient_an_registration_list->EarlyTarget->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->EarlyTargetDATE->Visible) { // EarlyTargetDATE ?>
		<td data-name="EarlyTargetDATE" <?php echo $patient_an_registration_list->EarlyTargetDATE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_EarlyTargetDATE">
<span<?php echo $patient_an_registration_list->EarlyTargetDATE->viewAttributes() ?>><?php echo $patient_an_registration_list->EarlyTargetDATE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->EarlyTargetREPORT->Visible) { // EarlyTargetREPORT ?>
		<td data-name="EarlyTargetREPORT" <?php echo $patient_an_registration_list->EarlyTargetREPORT->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_EarlyTargetREPORT">
<span<?php echo $patient_an_registration_list->EarlyTargetREPORT->viewAttributes() ?>><?php echo $patient_an_registration_list->EarlyTargetREPORT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->Anomaly->Visible) { // Anomaly ?>
		<td data-name="Anomaly" <?php echo $patient_an_registration_list->Anomaly->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_Anomaly">
<span<?php echo $patient_an_registration_list->Anomaly->viewAttributes() ?>><?php echo $patient_an_registration_list->Anomaly->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->AnomalyDATE->Visible) { // AnomalyDATE ?>
		<td data-name="AnomalyDATE" <?php echo $patient_an_registration_list->AnomalyDATE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_AnomalyDATE">
<span<?php echo $patient_an_registration_list->AnomalyDATE->viewAttributes() ?>><?php echo $patient_an_registration_list->AnomalyDATE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->AnomalyREPORT->Visible) { // AnomalyREPORT ?>
		<td data-name="AnomalyREPORT" <?php echo $patient_an_registration_list->AnomalyREPORT->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_AnomalyREPORT">
<span<?php echo $patient_an_registration_list->AnomalyREPORT->viewAttributes() ?>><?php echo $patient_an_registration_list->AnomalyREPORT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->Growth->Visible) { // Growth ?>
		<td data-name="Growth" <?php echo $patient_an_registration_list->Growth->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_Growth">
<span<?php echo $patient_an_registration_list->Growth->viewAttributes() ?>><?php echo $patient_an_registration_list->Growth->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->GrowthDATE->Visible) { // GrowthDATE ?>
		<td data-name="GrowthDATE" <?php echo $patient_an_registration_list->GrowthDATE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_GrowthDATE">
<span<?php echo $patient_an_registration_list->GrowthDATE->viewAttributes() ?>><?php echo $patient_an_registration_list->GrowthDATE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->GrowthREPORT->Visible) { // GrowthREPORT ?>
		<td data-name="GrowthREPORT" <?php echo $patient_an_registration_list->GrowthREPORT->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_GrowthREPORT">
<span<?php echo $patient_an_registration_list->GrowthREPORT->viewAttributes() ?>><?php echo $patient_an_registration_list->GrowthREPORT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->Growth1->Visible) { // Growth1 ?>
		<td data-name="Growth1" <?php echo $patient_an_registration_list->Growth1->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_Growth1">
<span<?php echo $patient_an_registration_list->Growth1->viewAttributes() ?>><?php echo $patient_an_registration_list->Growth1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->Growth1DATE->Visible) { // Growth1DATE ?>
		<td data-name="Growth1DATE" <?php echo $patient_an_registration_list->Growth1DATE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_Growth1DATE">
<span<?php echo $patient_an_registration_list->Growth1DATE->viewAttributes() ?>><?php echo $patient_an_registration_list->Growth1DATE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->Growth1REPORT->Visible) { // Growth1REPORT ?>
		<td data-name="Growth1REPORT" <?php echo $patient_an_registration_list->Growth1REPORT->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_Growth1REPORT">
<span<?php echo $patient_an_registration_list->Growth1REPORT->viewAttributes() ?>><?php echo $patient_an_registration_list->Growth1REPORT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->ANProfile->Visible) { // ANProfile ?>
		<td data-name="ANProfile" <?php echo $patient_an_registration_list->ANProfile->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_ANProfile">
<span<?php echo $patient_an_registration_list->ANProfile->viewAttributes() ?>><?php echo $patient_an_registration_list->ANProfile->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->ANProfileDATE->Visible) { // ANProfileDATE ?>
		<td data-name="ANProfileDATE" <?php echo $patient_an_registration_list->ANProfileDATE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_ANProfileDATE">
<span<?php echo $patient_an_registration_list->ANProfileDATE->viewAttributes() ?>><?php echo $patient_an_registration_list->ANProfileDATE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->ANProfileINHOUSE->Visible) { // ANProfileINHOUSE ?>
		<td data-name="ANProfileINHOUSE" <?php echo $patient_an_registration_list->ANProfileINHOUSE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_ANProfileINHOUSE">
<span<?php echo $patient_an_registration_list->ANProfileINHOUSE->viewAttributes() ?>><?php echo $patient_an_registration_list->ANProfileINHOUSE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->ANProfileREPORT->Visible) { // ANProfileREPORT ?>
		<td data-name="ANProfileREPORT" <?php echo $patient_an_registration_list->ANProfileREPORT->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_ANProfileREPORT">
<span<?php echo $patient_an_registration_list->ANProfileREPORT->viewAttributes() ?>><?php echo $patient_an_registration_list->ANProfileREPORT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->DualMarker->Visible) { // DualMarker ?>
		<td data-name="DualMarker" <?php echo $patient_an_registration_list->DualMarker->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_DualMarker">
<span<?php echo $patient_an_registration_list->DualMarker->viewAttributes() ?>><?php echo $patient_an_registration_list->DualMarker->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->DualMarkerDATE->Visible) { // DualMarkerDATE ?>
		<td data-name="DualMarkerDATE" <?php echo $patient_an_registration_list->DualMarkerDATE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_DualMarkerDATE">
<span<?php echo $patient_an_registration_list->DualMarkerDATE->viewAttributes() ?>><?php echo $patient_an_registration_list->DualMarkerDATE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->DualMarkerINHOUSE->Visible) { // DualMarkerINHOUSE ?>
		<td data-name="DualMarkerINHOUSE" <?php echo $patient_an_registration_list->DualMarkerINHOUSE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_DualMarkerINHOUSE">
<span<?php echo $patient_an_registration_list->DualMarkerINHOUSE->viewAttributes() ?>><?php echo $patient_an_registration_list->DualMarkerINHOUSE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->DualMarkerREPORT->Visible) { // DualMarkerREPORT ?>
		<td data-name="DualMarkerREPORT" <?php echo $patient_an_registration_list->DualMarkerREPORT->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_DualMarkerREPORT">
<span<?php echo $patient_an_registration_list->DualMarkerREPORT->viewAttributes() ?>><?php echo $patient_an_registration_list->DualMarkerREPORT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->Quadruple->Visible) { // Quadruple ?>
		<td data-name="Quadruple" <?php echo $patient_an_registration_list->Quadruple->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_Quadruple">
<span<?php echo $patient_an_registration_list->Quadruple->viewAttributes() ?>><?php echo $patient_an_registration_list->Quadruple->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->QuadrupleDATE->Visible) { // QuadrupleDATE ?>
		<td data-name="QuadrupleDATE" <?php echo $patient_an_registration_list->QuadrupleDATE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_QuadrupleDATE">
<span<?php echo $patient_an_registration_list->QuadrupleDATE->viewAttributes() ?>><?php echo $patient_an_registration_list->QuadrupleDATE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->QuadrupleINHOUSE->Visible) { // QuadrupleINHOUSE ?>
		<td data-name="QuadrupleINHOUSE" <?php echo $patient_an_registration_list->QuadrupleINHOUSE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_QuadrupleINHOUSE">
<span<?php echo $patient_an_registration_list->QuadrupleINHOUSE->viewAttributes() ?>><?php echo $patient_an_registration_list->QuadrupleINHOUSE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->QuadrupleREPORT->Visible) { // QuadrupleREPORT ?>
		<td data-name="QuadrupleREPORT" <?php echo $patient_an_registration_list->QuadrupleREPORT->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_QuadrupleREPORT">
<span<?php echo $patient_an_registration_list->QuadrupleREPORT->viewAttributes() ?>><?php echo $patient_an_registration_list->QuadrupleREPORT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->A5month->Visible) { // A5month ?>
		<td data-name="A5month" <?php echo $patient_an_registration_list->A5month->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_A5month">
<span<?php echo $patient_an_registration_list->A5month->viewAttributes() ?>><?php echo $patient_an_registration_list->A5month->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->A5monthDATE->Visible) { // A5monthDATE ?>
		<td data-name="A5monthDATE" <?php echo $patient_an_registration_list->A5monthDATE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_A5monthDATE">
<span<?php echo $patient_an_registration_list->A5monthDATE->viewAttributes() ?>><?php echo $patient_an_registration_list->A5monthDATE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->A5monthINHOUSE->Visible) { // A5monthINHOUSE ?>
		<td data-name="A5monthINHOUSE" <?php echo $patient_an_registration_list->A5monthINHOUSE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_A5monthINHOUSE">
<span<?php echo $patient_an_registration_list->A5monthINHOUSE->viewAttributes() ?>><?php echo $patient_an_registration_list->A5monthINHOUSE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->A5monthREPORT->Visible) { // A5monthREPORT ?>
		<td data-name="A5monthREPORT" <?php echo $patient_an_registration_list->A5monthREPORT->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_A5monthREPORT">
<span<?php echo $patient_an_registration_list->A5monthREPORT->viewAttributes() ?>><?php echo $patient_an_registration_list->A5monthREPORT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->A7month->Visible) { // A7month ?>
		<td data-name="A7month" <?php echo $patient_an_registration_list->A7month->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_A7month">
<span<?php echo $patient_an_registration_list->A7month->viewAttributes() ?>><?php echo $patient_an_registration_list->A7month->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->A7monthDATE->Visible) { // A7monthDATE ?>
		<td data-name="A7monthDATE" <?php echo $patient_an_registration_list->A7monthDATE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_A7monthDATE">
<span<?php echo $patient_an_registration_list->A7monthDATE->viewAttributes() ?>><?php echo $patient_an_registration_list->A7monthDATE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->A7monthINHOUSE->Visible) { // A7monthINHOUSE ?>
		<td data-name="A7monthINHOUSE" <?php echo $patient_an_registration_list->A7monthINHOUSE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_A7monthINHOUSE">
<span<?php echo $patient_an_registration_list->A7monthINHOUSE->viewAttributes() ?>><?php echo $patient_an_registration_list->A7monthINHOUSE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->A7monthREPORT->Visible) { // A7monthREPORT ?>
		<td data-name="A7monthREPORT" <?php echo $patient_an_registration_list->A7monthREPORT->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_A7monthREPORT">
<span<?php echo $patient_an_registration_list->A7monthREPORT->viewAttributes() ?>><?php echo $patient_an_registration_list->A7monthREPORT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->A9month->Visible) { // A9month ?>
		<td data-name="A9month" <?php echo $patient_an_registration_list->A9month->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_A9month">
<span<?php echo $patient_an_registration_list->A9month->viewAttributes() ?>><?php echo $patient_an_registration_list->A9month->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->A9monthDATE->Visible) { // A9monthDATE ?>
		<td data-name="A9monthDATE" <?php echo $patient_an_registration_list->A9monthDATE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_A9monthDATE">
<span<?php echo $patient_an_registration_list->A9monthDATE->viewAttributes() ?>><?php echo $patient_an_registration_list->A9monthDATE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->A9monthINHOUSE->Visible) { // A9monthINHOUSE ?>
		<td data-name="A9monthINHOUSE" <?php echo $patient_an_registration_list->A9monthINHOUSE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_A9monthINHOUSE">
<span<?php echo $patient_an_registration_list->A9monthINHOUSE->viewAttributes() ?>><?php echo $patient_an_registration_list->A9monthINHOUSE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->A9monthREPORT->Visible) { // A9monthREPORT ?>
		<td data-name="A9monthREPORT" <?php echo $patient_an_registration_list->A9monthREPORT->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_A9monthREPORT">
<span<?php echo $patient_an_registration_list->A9monthREPORT->viewAttributes() ?>><?php echo $patient_an_registration_list->A9monthREPORT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->INJ->Visible) { // INJ ?>
		<td data-name="INJ" <?php echo $patient_an_registration_list->INJ->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_INJ">
<span<?php echo $patient_an_registration_list->INJ->viewAttributes() ?>><?php echo $patient_an_registration_list->INJ->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->INJDATE->Visible) { // INJDATE ?>
		<td data-name="INJDATE" <?php echo $patient_an_registration_list->INJDATE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_INJDATE">
<span<?php echo $patient_an_registration_list->INJDATE->viewAttributes() ?>><?php echo $patient_an_registration_list->INJDATE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->INJINHOUSE->Visible) { // INJINHOUSE ?>
		<td data-name="INJINHOUSE" <?php echo $patient_an_registration_list->INJINHOUSE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_INJINHOUSE">
<span<?php echo $patient_an_registration_list->INJINHOUSE->viewAttributes() ?>><?php echo $patient_an_registration_list->INJINHOUSE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->INJREPORT->Visible) { // INJREPORT ?>
		<td data-name="INJREPORT" <?php echo $patient_an_registration_list->INJREPORT->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_INJREPORT">
<span<?php echo $patient_an_registration_list->INJREPORT->viewAttributes() ?>><?php echo $patient_an_registration_list->INJREPORT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->Bleeding->Visible) { // Bleeding ?>
		<td data-name="Bleeding" <?php echo $patient_an_registration_list->Bleeding->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_Bleeding">
<span<?php echo $patient_an_registration_list->Bleeding->viewAttributes() ?>><?php echo $patient_an_registration_list->Bleeding->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->Hypothyroidism->Visible) { // Hypothyroidism ?>
		<td data-name="Hypothyroidism" <?php echo $patient_an_registration_list->Hypothyroidism->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_Hypothyroidism">
<span<?php echo $patient_an_registration_list->Hypothyroidism->viewAttributes() ?>><?php echo $patient_an_registration_list->Hypothyroidism->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->PICMENumber->Visible) { // PICMENumber ?>
		<td data-name="PICMENumber" <?php echo $patient_an_registration_list->PICMENumber->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_PICMENumber">
<span<?php echo $patient_an_registration_list->PICMENumber->viewAttributes() ?>><?php echo $patient_an_registration_list->PICMENumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->Outcome->Visible) { // Outcome ?>
		<td data-name="Outcome" <?php echo $patient_an_registration_list->Outcome->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_Outcome">
<span<?php echo $patient_an_registration_list->Outcome->viewAttributes() ?>><?php echo $patient_an_registration_list->Outcome->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->DateofAdmission->Visible) { // DateofAdmission ?>
		<td data-name="DateofAdmission" <?php echo $patient_an_registration_list->DateofAdmission->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_DateofAdmission">
<span<?php echo $patient_an_registration_list->DateofAdmission->viewAttributes() ?>><?php echo $patient_an_registration_list->DateofAdmission->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->DateodProcedure->Visible) { // DateodProcedure ?>
		<td data-name="DateodProcedure" <?php echo $patient_an_registration_list->DateodProcedure->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_DateodProcedure">
<span<?php echo $patient_an_registration_list->DateodProcedure->viewAttributes() ?>><?php echo $patient_an_registration_list->DateodProcedure->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->Miscarriage->Visible) { // Miscarriage ?>
		<td data-name="Miscarriage" <?php echo $patient_an_registration_list->Miscarriage->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_Miscarriage">
<span<?php echo $patient_an_registration_list->Miscarriage->viewAttributes() ?>><?php echo $patient_an_registration_list->Miscarriage->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->ModeOfDelivery->Visible) { // ModeOfDelivery ?>
		<td data-name="ModeOfDelivery" <?php echo $patient_an_registration_list->ModeOfDelivery->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_ModeOfDelivery">
<span<?php echo $patient_an_registration_list->ModeOfDelivery->viewAttributes() ?>><?php echo $patient_an_registration_list->ModeOfDelivery->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->ND->Visible) { // ND ?>
		<td data-name="ND" <?php echo $patient_an_registration_list->ND->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_ND">
<span<?php echo $patient_an_registration_list->ND->viewAttributes() ?>><?php echo $patient_an_registration_list->ND->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->NDS->Visible) { // NDS ?>
		<td data-name="NDS" <?php echo $patient_an_registration_list->NDS->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_NDS">
<span<?php echo $patient_an_registration_list->NDS->viewAttributes() ?>><?php echo $patient_an_registration_list->NDS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->NDP->Visible) { // NDP ?>
		<td data-name="NDP" <?php echo $patient_an_registration_list->NDP->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_NDP">
<span<?php echo $patient_an_registration_list->NDP->viewAttributes() ?>><?php echo $patient_an_registration_list->NDP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->Vaccum->Visible) { // Vaccum ?>
		<td data-name="Vaccum" <?php echo $patient_an_registration_list->Vaccum->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_Vaccum">
<span<?php echo $patient_an_registration_list->Vaccum->viewAttributes() ?>><?php echo $patient_an_registration_list->Vaccum->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->VaccumS->Visible) { // VaccumS ?>
		<td data-name="VaccumS" <?php echo $patient_an_registration_list->VaccumS->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_VaccumS">
<span<?php echo $patient_an_registration_list->VaccumS->viewAttributes() ?>><?php echo $patient_an_registration_list->VaccumS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->VaccumP->Visible) { // VaccumP ?>
		<td data-name="VaccumP" <?php echo $patient_an_registration_list->VaccumP->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_VaccumP">
<span<?php echo $patient_an_registration_list->VaccumP->viewAttributes() ?>><?php echo $patient_an_registration_list->VaccumP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->Forceps->Visible) { // Forceps ?>
		<td data-name="Forceps" <?php echo $patient_an_registration_list->Forceps->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_Forceps">
<span<?php echo $patient_an_registration_list->Forceps->viewAttributes() ?>><?php echo $patient_an_registration_list->Forceps->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->ForcepsS->Visible) { // ForcepsS ?>
		<td data-name="ForcepsS" <?php echo $patient_an_registration_list->ForcepsS->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_ForcepsS">
<span<?php echo $patient_an_registration_list->ForcepsS->viewAttributes() ?>><?php echo $patient_an_registration_list->ForcepsS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->ForcepsP->Visible) { // ForcepsP ?>
		<td data-name="ForcepsP" <?php echo $patient_an_registration_list->ForcepsP->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_ForcepsP">
<span<?php echo $patient_an_registration_list->ForcepsP->viewAttributes() ?>><?php echo $patient_an_registration_list->ForcepsP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->Elective->Visible) { // Elective ?>
		<td data-name="Elective" <?php echo $patient_an_registration_list->Elective->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_Elective">
<span<?php echo $patient_an_registration_list->Elective->viewAttributes() ?>><?php echo $patient_an_registration_list->Elective->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->ElectiveS->Visible) { // ElectiveS ?>
		<td data-name="ElectiveS" <?php echo $patient_an_registration_list->ElectiveS->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_ElectiveS">
<span<?php echo $patient_an_registration_list->ElectiveS->viewAttributes() ?>><?php echo $patient_an_registration_list->ElectiveS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->ElectiveP->Visible) { // ElectiveP ?>
		<td data-name="ElectiveP" <?php echo $patient_an_registration_list->ElectiveP->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_ElectiveP">
<span<?php echo $patient_an_registration_list->ElectiveP->viewAttributes() ?>><?php echo $patient_an_registration_list->ElectiveP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->Emergency->Visible) { // Emergency ?>
		<td data-name="Emergency" <?php echo $patient_an_registration_list->Emergency->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_Emergency">
<span<?php echo $patient_an_registration_list->Emergency->viewAttributes() ?>><?php echo $patient_an_registration_list->Emergency->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->EmergencyS->Visible) { // EmergencyS ?>
		<td data-name="EmergencyS" <?php echo $patient_an_registration_list->EmergencyS->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_EmergencyS">
<span<?php echo $patient_an_registration_list->EmergencyS->viewAttributes() ?>><?php echo $patient_an_registration_list->EmergencyS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->EmergencyP->Visible) { // EmergencyP ?>
		<td data-name="EmergencyP" <?php echo $patient_an_registration_list->EmergencyP->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_EmergencyP">
<span<?php echo $patient_an_registration_list->EmergencyP->viewAttributes() ?>><?php echo $patient_an_registration_list->EmergencyP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->Maturity->Visible) { // Maturity ?>
		<td data-name="Maturity" <?php echo $patient_an_registration_list->Maturity->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_Maturity">
<span<?php echo $patient_an_registration_list->Maturity->viewAttributes() ?>><?php echo $patient_an_registration_list->Maturity->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->Baby1->Visible) { // Baby1 ?>
		<td data-name="Baby1" <?php echo $patient_an_registration_list->Baby1->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_Baby1">
<span<?php echo $patient_an_registration_list->Baby1->viewAttributes() ?>><?php echo $patient_an_registration_list->Baby1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->Baby2->Visible) { // Baby2 ?>
		<td data-name="Baby2" <?php echo $patient_an_registration_list->Baby2->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_Baby2">
<span<?php echo $patient_an_registration_list->Baby2->viewAttributes() ?>><?php echo $patient_an_registration_list->Baby2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->sex1->Visible) { // sex1 ?>
		<td data-name="sex1" <?php echo $patient_an_registration_list->sex1->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_sex1">
<span<?php echo $patient_an_registration_list->sex1->viewAttributes() ?>><?php echo $patient_an_registration_list->sex1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->sex2->Visible) { // sex2 ?>
		<td data-name="sex2" <?php echo $patient_an_registration_list->sex2->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_sex2">
<span<?php echo $patient_an_registration_list->sex2->viewAttributes() ?>><?php echo $patient_an_registration_list->sex2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->weight1->Visible) { // weight1 ?>
		<td data-name="weight1" <?php echo $patient_an_registration_list->weight1->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_weight1">
<span<?php echo $patient_an_registration_list->weight1->viewAttributes() ?>><?php echo $patient_an_registration_list->weight1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->weight2->Visible) { // weight2 ?>
		<td data-name="weight2" <?php echo $patient_an_registration_list->weight2->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_weight2">
<span<?php echo $patient_an_registration_list->weight2->viewAttributes() ?>><?php echo $patient_an_registration_list->weight2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->NICU1->Visible) { // NICU1 ?>
		<td data-name="NICU1" <?php echo $patient_an_registration_list->NICU1->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_NICU1">
<span<?php echo $patient_an_registration_list->NICU1->viewAttributes() ?>><?php echo $patient_an_registration_list->NICU1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->NICU2->Visible) { // NICU2 ?>
		<td data-name="NICU2" <?php echo $patient_an_registration_list->NICU2->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_NICU2">
<span<?php echo $patient_an_registration_list->NICU2->viewAttributes() ?>><?php echo $patient_an_registration_list->NICU2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->Jaundice1->Visible) { // Jaundice1 ?>
		<td data-name="Jaundice1" <?php echo $patient_an_registration_list->Jaundice1->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_Jaundice1">
<span<?php echo $patient_an_registration_list->Jaundice1->viewAttributes() ?>><?php echo $patient_an_registration_list->Jaundice1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->Jaundice2->Visible) { // Jaundice2 ?>
		<td data-name="Jaundice2" <?php echo $patient_an_registration_list->Jaundice2->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_Jaundice2">
<span<?php echo $patient_an_registration_list->Jaundice2->viewAttributes() ?>><?php echo $patient_an_registration_list->Jaundice2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->Others1->Visible) { // Others1 ?>
		<td data-name="Others1" <?php echo $patient_an_registration_list->Others1->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_Others1">
<span<?php echo $patient_an_registration_list->Others1->viewAttributes() ?>><?php echo $patient_an_registration_list->Others1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->Others2->Visible) { // Others2 ?>
		<td data-name="Others2" <?php echo $patient_an_registration_list->Others2->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_Others2">
<span<?php echo $patient_an_registration_list->Others2->viewAttributes() ?>><?php echo $patient_an_registration_list->Others2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->SpillOverReasons->Visible) { // SpillOverReasons ?>
		<td data-name="SpillOverReasons" <?php echo $patient_an_registration_list->SpillOverReasons->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_SpillOverReasons">
<span<?php echo $patient_an_registration_list->SpillOverReasons->viewAttributes() ?>><?php echo $patient_an_registration_list->SpillOverReasons->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->ANClosed->Visible) { // ANClosed ?>
		<td data-name="ANClosed" <?php echo $patient_an_registration_list->ANClosed->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_ANClosed">
<span<?php echo $patient_an_registration_list->ANClosed->viewAttributes() ?>><?php echo $patient_an_registration_list->ANClosed->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->ANClosedDATE->Visible) { // ANClosedDATE ?>
		<td data-name="ANClosedDATE" <?php echo $patient_an_registration_list->ANClosedDATE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_ANClosedDATE">
<span<?php echo $patient_an_registration_list->ANClosedDATE->viewAttributes() ?>><?php echo $patient_an_registration_list->ANClosedDATE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->PastMedicalHistoryOthers->Visible) { // PastMedicalHistoryOthers ?>
		<td data-name="PastMedicalHistoryOthers" <?php echo $patient_an_registration_list->PastMedicalHistoryOthers->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_PastMedicalHistoryOthers">
<span<?php echo $patient_an_registration_list->PastMedicalHistoryOthers->viewAttributes() ?>><?php echo $patient_an_registration_list->PastMedicalHistoryOthers->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->PastSurgicalHistoryOthers->Visible) { // PastSurgicalHistoryOthers ?>
		<td data-name="PastSurgicalHistoryOthers" <?php echo $patient_an_registration_list->PastSurgicalHistoryOthers->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_PastSurgicalHistoryOthers">
<span<?php echo $patient_an_registration_list->PastSurgicalHistoryOthers->viewAttributes() ?>><?php echo $patient_an_registration_list->PastSurgicalHistoryOthers->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->FamilyHistoryOthers->Visible) { // FamilyHistoryOthers ?>
		<td data-name="FamilyHistoryOthers" <?php echo $patient_an_registration_list->FamilyHistoryOthers->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_FamilyHistoryOthers">
<span<?php echo $patient_an_registration_list->FamilyHistoryOthers->viewAttributes() ?>><?php echo $patient_an_registration_list->FamilyHistoryOthers->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->PresentPregnancyComplicationsOthers->Visible) { // PresentPregnancyComplicationsOthers ?>
		<td data-name="PresentPregnancyComplicationsOthers" <?php echo $patient_an_registration_list->PresentPregnancyComplicationsOthers->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_PresentPregnancyComplicationsOthers">
<span<?php echo $patient_an_registration_list->PresentPregnancyComplicationsOthers->viewAttributes() ?>><?php echo $patient_an_registration_list->PresentPregnancyComplicationsOthers->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($patient_an_registration_list->ETdate->Visible) { // ETdate ?>
		<td data-name="ETdate" <?php echo $patient_an_registration_list->ETdate->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_list->RowCount ?>_patient_an_registration_ETdate">
<span<?php echo $patient_an_registration_list->ETdate->viewAttributes() ?>><?php echo $patient_an_registration_list->ETdate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_an_registration_list->ListOptions->render("body", "right", $patient_an_registration_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$patient_an_registration_list->isGridAdd())
		$patient_an_registration_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$patient_an_registration->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($patient_an_registration_list->Recordset)
	$patient_an_registration_list->Recordset->Close();
?>
<?php if (!$patient_an_registration_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$patient_an_registration_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $patient_an_registration_list->Pager->render() ?>
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
<?php if ($patient_an_registration_list->TotalRecords == 0 && !$patient_an_registration->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $patient_an_registration_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$patient_an_registration_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$patient_an_registration_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$patient_an_registration->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_patient_an_registration",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$patient_an_registration_list->terminate();
?>