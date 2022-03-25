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
$ivf_semenanalysisreport_list = new ivf_semenanalysisreport_list();

// Run the page
$ivf_semenanalysisreport_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_semenanalysisreport_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$ivf_semenanalysisreport_list->isExport()) { ?>
<script>
var fivf_semenanalysisreportlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fivf_semenanalysisreportlist = currentForm = new ew.Form("fivf_semenanalysisreportlist", "list");
	fivf_semenanalysisreportlist.formKeyCountName = '<?php echo $ivf_semenanalysisreport_list->FormKeyCountName ?>';
	loadjs.done("fivf_semenanalysisreportlist");
});
var fivf_semenanalysisreportlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fivf_semenanalysisreportlistsrch = currentSearchForm = new ew.Form("fivf_semenanalysisreportlistsrch");

	// Dynamic selection lists
	// Filters

	fivf_semenanalysisreportlistsrch.filterList = <?php echo $ivf_semenanalysisreport_list->getFilterList() ?>;
	loadjs.done("fivf_semenanalysisreportlistsrch");
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
<?php if (!$ivf_semenanalysisreport_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($ivf_semenanalysisreport_list->TotalRecords > 0 && $ivf_semenanalysisreport_list->ExportOptions->visible()) { ?>
<?php $ivf_semenanalysisreport_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->ImportOptions->visible()) { ?>
<?php $ivf_semenanalysisreport_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->SearchOptions->visible()) { ?>
<?php $ivf_semenanalysisreport_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->FilterOptions->visible()) { ?>
<?php $ivf_semenanalysisreport_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$ivf_semenanalysisreport_list->isExport() || Config("EXPORT_MASTER_RECORD") && $ivf_semenanalysisreport_list->isExport("print")) { ?>
<?php
if ($ivf_semenanalysisreport_list->DbMasterFilter != "" && $ivf_semenanalysisreport->getCurrentMasterTable() == "view_ivf_treatment") {
	if ($ivf_semenanalysisreport_list->MasterRecordExists) {
		include_once "view_ivf_treatmentmaster.php";
	}
}
?>
<?php
if ($ivf_semenanalysisreport_list->DbMasterFilter != "" && $ivf_semenanalysisreport->getCurrentMasterTable() == "ivf_treatment_plan") {
	if ($ivf_semenanalysisreport_list->MasterRecordExists) {
		include_once "ivf_treatment_planmaster.php";
	}
}
?>
<?php } ?>
<?php
$ivf_semenanalysisreport_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$ivf_semenanalysisreport_list->isExport() && !$ivf_semenanalysisreport->CurrentAction) { ?>
<form name="fivf_semenanalysisreportlistsrch" id="fivf_semenanalysisreportlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fivf_semenanalysisreportlistsrch-search-panel" class="<?php echo $ivf_semenanalysisreport_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="ivf_semenanalysisreport">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $ivf_semenanalysisreport_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($ivf_semenanalysisreport_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($ivf_semenanalysisreport_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $ivf_semenanalysisreport_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($ivf_semenanalysisreport_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($ivf_semenanalysisreport_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($ivf_semenanalysisreport_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($ivf_semenanalysisreport_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $ivf_semenanalysisreport_list->showPageHeader(); ?>
<?php
$ivf_semenanalysisreport_list->showMessage();
?>
<?php if ($ivf_semenanalysisreport_list->TotalRecords > 0 || $ivf_semenanalysisreport->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($ivf_semenanalysisreport_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf_semenanalysisreport">
<?php if (!$ivf_semenanalysisreport_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$ivf_semenanalysisreport_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $ivf_semenanalysisreport_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ivf_semenanalysisreport_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fivf_semenanalysisreportlist" id="fivf_semenanalysisreportlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_semenanalysisreport">
<?php if ($ivf_semenanalysisreport->getCurrentMasterTable() == "view_ivf_treatment" && $ivf_semenanalysisreport->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="view_ivf_treatment">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($ivf_semenanalysisreport_list->TidNo->getSessionValue()) ?>">
<input type="hidden" name="fk_RIDNO" value="<?php echo HtmlEncode($ivf_semenanalysisreport_list->RIDNo->getSessionValue()) ?>">
<input type="hidden" name="fk_Name" value="<?php echo HtmlEncode($ivf_semenanalysisreport_list->PatientName->getSessionValue()) ?>">
<?php } ?>
<?php if ($ivf_semenanalysisreport->getCurrentMasterTable() == "ivf_treatment_plan" && $ivf_semenanalysisreport->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="ivf_treatment_plan">
<input type="hidden" name="fk_RIDNO" value="<?php echo HtmlEncode($ivf_semenanalysisreport_list->RIDNo->getSessionValue()) ?>">
<input type="hidden" name="fk_Name" value="<?php echo HtmlEncode($ivf_semenanalysisreport_list->PatientName->getSessionValue()) ?>">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($ivf_semenanalysisreport_list->TidNo->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_ivf_semenanalysisreport" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($ivf_semenanalysisreport_list->TotalRecords > 0 || $ivf_semenanalysisreport_list->isGridEdit()) { ?>
<table id="tbl_ivf_semenanalysisreportlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$ivf_semenanalysisreport->RowType = ROWTYPE_HEADER;

// Render list options
$ivf_semenanalysisreport_list->renderListOptions();

// Render list options (header, left)
$ivf_semenanalysisreport_list->ListOptions->render("header", "left");
?>
<?php if ($ivf_semenanalysisreport_list->id->Visible) { // id ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $ivf_semenanalysisreport_list->id->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_id" class="ivf_semenanalysisreport_id"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $ivf_semenanalysisreport_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->id) ?>', 1);"><div id="elh_ivf_semenanalysisreport_id" class="ivf_semenanalysisreport_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->RIDNo->Visible) { // RIDNo ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->RIDNo) == "") { ?>
		<th data-name="RIDNo" class="<?php echo $ivf_semenanalysisreport_list->RIDNo->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_RIDNo" class="ivf_semenanalysisreport_RIDNo"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->RIDNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RIDNo" class="<?php echo $ivf_semenanalysisreport_list->RIDNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->RIDNo) ?>', 1);"><div id="elh_ivf_semenanalysisreport_RIDNo" class="ivf_semenanalysisreport_RIDNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->RIDNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->RIDNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->RIDNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->PatientName->Visible) { // PatientName ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $ivf_semenanalysisreport_list->PatientName->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_PatientName" class="ivf_semenanalysisreport_PatientName"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $ivf_semenanalysisreport_list->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->PatientName) ?>', 1);"><div id="elh_ivf_semenanalysisreport_PatientName" class="ivf_semenanalysisreport_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->PatientName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->PatientName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->HusbandName->Visible) { // HusbandName ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->HusbandName) == "") { ?>
		<th data-name="HusbandName" class="<?php echo $ivf_semenanalysisreport_list->HusbandName->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_HusbandName" class="ivf_semenanalysisreport_HusbandName"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->HusbandName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HusbandName" class="<?php echo $ivf_semenanalysisreport_list->HusbandName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->HusbandName) ?>', 1);"><div id="elh_ivf_semenanalysisreport_HusbandName" class="ivf_semenanalysisreport_HusbandName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->HusbandName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->HusbandName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->HusbandName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->RequestDr->Visible) { // RequestDr ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->RequestDr) == "") { ?>
		<th data-name="RequestDr" class="<?php echo $ivf_semenanalysisreport_list->RequestDr->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_RequestDr" class="ivf_semenanalysisreport_RequestDr"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->RequestDr->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RequestDr" class="<?php echo $ivf_semenanalysisreport_list->RequestDr->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->RequestDr) ?>', 1);"><div id="elh_ivf_semenanalysisreport_RequestDr" class="ivf_semenanalysisreport_RequestDr">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->RequestDr->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->RequestDr->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->RequestDr->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->CollectionDate->Visible) { // CollectionDate ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->CollectionDate) == "") { ?>
		<th data-name="CollectionDate" class="<?php echo $ivf_semenanalysisreport_list->CollectionDate->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_CollectionDate" class="ivf_semenanalysisreport_CollectionDate"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->CollectionDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CollectionDate" class="<?php echo $ivf_semenanalysisreport_list->CollectionDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->CollectionDate) ?>', 1);"><div id="elh_ivf_semenanalysisreport_CollectionDate" class="ivf_semenanalysisreport_CollectionDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->CollectionDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->CollectionDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->CollectionDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->ResultDate->Visible) { // ResultDate ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->ResultDate) == "") { ?>
		<th data-name="ResultDate" class="<?php echo $ivf_semenanalysisreport_list->ResultDate->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_ResultDate" class="ivf_semenanalysisreport_ResultDate"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->ResultDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ResultDate" class="<?php echo $ivf_semenanalysisreport_list->ResultDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->ResultDate) ?>', 1);"><div id="elh_ivf_semenanalysisreport_ResultDate" class="ivf_semenanalysisreport_ResultDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->ResultDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->ResultDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->ResultDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->RequestSample->Visible) { // RequestSample ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->RequestSample) == "") { ?>
		<th data-name="RequestSample" class="<?php echo $ivf_semenanalysisreport_list->RequestSample->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_RequestSample" class="ivf_semenanalysisreport_RequestSample"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->RequestSample->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RequestSample" class="<?php echo $ivf_semenanalysisreport_list->RequestSample->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->RequestSample) ?>', 1);"><div id="elh_ivf_semenanalysisreport_RequestSample" class="ivf_semenanalysisreport_RequestSample">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->RequestSample->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->RequestSample->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->RequestSample->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->CollectionType->Visible) { // CollectionType ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->CollectionType) == "") { ?>
		<th data-name="CollectionType" class="<?php echo $ivf_semenanalysisreport_list->CollectionType->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_CollectionType" class="ivf_semenanalysisreport_CollectionType"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->CollectionType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CollectionType" class="<?php echo $ivf_semenanalysisreport_list->CollectionType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->CollectionType) ?>', 1);"><div id="elh_ivf_semenanalysisreport_CollectionType" class="ivf_semenanalysisreport_CollectionType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->CollectionType->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->CollectionType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->CollectionType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->CollectionMethod->Visible) { // CollectionMethod ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->CollectionMethod) == "") { ?>
		<th data-name="CollectionMethod" class="<?php echo $ivf_semenanalysisreport_list->CollectionMethod->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_CollectionMethod" class="ivf_semenanalysisreport_CollectionMethod"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->CollectionMethod->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CollectionMethod" class="<?php echo $ivf_semenanalysisreport_list->CollectionMethod->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->CollectionMethod) ?>', 1);"><div id="elh_ivf_semenanalysisreport_CollectionMethod" class="ivf_semenanalysisreport_CollectionMethod">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->CollectionMethod->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->CollectionMethod->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->CollectionMethod->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->Medicationused->Visible) { // Medicationused ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Medicationused) == "") { ?>
		<th data-name="Medicationused" class="<?php echo $ivf_semenanalysisreport_list->Medicationused->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Medicationused" class="ivf_semenanalysisreport_Medicationused"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Medicationused->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Medicationused" class="<?php echo $ivf_semenanalysisreport_list->Medicationused->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Medicationused) ?>', 1);"><div id="elh_ivf_semenanalysisreport_Medicationused" class="ivf_semenanalysisreport_Medicationused">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Medicationused->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->Medicationused->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->Medicationused->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->DifficultiesinCollection->Visible) { // DifficultiesinCollection ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->DifficultiesinCollection) == "") { ?>
		<th data-name="DifficultiesinCollection" class="<?php echo $ivf_semenanalysisreport_list->DifficultiesinCollection->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_DifficultiesinCollection" class="ivf_semenanalysisreport_DifficultiesinCollection"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->DifficultiesinCollection->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DifficultiesinCollection" class="<?php echo $ivf_semenanalysisreport_list->DifficultiesinCollection->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->DifficultiesinCollection) ?>', 1);"><div id="elh_ivf_semenanalysisreport_DifficultiesinCollection" class="ivf_semenanalysisreport_DifficultiesinCollection">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->DifficultiesinCollection->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->DifficultiesinCollection->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->DifficultiesinCollection->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->pH->Visible) { // pH ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->pH) == "") { ?>
		<th data-name="pH" class="<?php echo $ivf_semenanalysisreport_list->pH->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_pH" class="ivf_semenanalysisreport_pH"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->pH->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pH" class="<?php echo $ivf_semenanalysisreport_list->pH->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->pH) ?>', 1);"><div id="elh_ivf_semenanalysisreport_pH" class="ivf_semenanalysisreport_pH">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->pH->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->pH->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->pH->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->Timeofcollection->Visible) { // Timeofcollection ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Timeofcollection) == "") { ?>
		<th data-name="Timeofcollection" class="<?php echo $ivf_semenanalysisreport_list->Timeofcollection->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Timeofcollection" class="ivf_semenanalysisreport_Timeofcollection"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Timeofcollection->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Timeofcollection" class="<?php echo $ivf_semenanalysisreport_list->Timeofcollection->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Timeofcollection) ?>', 1);"><div id="elh_ivf_semenanalysisreport_Timeofcollection" class="ivf_semenanalysisreport_Timeofcollection">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Timeofcollection->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->Timeofcollection->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->Timeofcollection->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->Timeofexamination->Visible) { // Timeofexamination ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Timeofexamination) == "") { ?>
		<th data-name="Timeofexamination" class="<?php echo $ivf_semenanalysisreport_list->Timeofexamination->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Timeofexamination" class="ivf_semenanalysisreport_Timeofexamination"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Timeofexamination->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Timeofexamination" class="<?php echo $ivf_semenanalysisreport_list->Timeofexamination->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Timeofexamination) ?>', 1);"><div id="elh_ivf_semenanalysisreport_Timeofexamination" class="ivf_semenanalysisreport_Timeofexamination">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Timeofexamination->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->Timeofexamination->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->Timeofexamination->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->Volume->Visible) { // Volume ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Volume) == "") { ?>
		<th data-name="Volume" class="<?php echo $ivf_semenanalysisreport_list->Volume->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Volume" class="ivf_semenanalysisreport_Volume"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Volume->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Volume" class="<?php echo $ivf_semenanalysisreport_list->Volume->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Volume) ?>', 1);"><div id="elh_ivf_semenanalysisreport_Volume" class="ivf_semenanalysisreport_Volume">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Volume->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->Volume->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->Volume->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->Concentration->Visible) { // Concentration ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Concentration) == "") { ?>
		<th data-name="Concentration" class="<?php echo $ivf_semenanalysisreport_list->Concentration->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Concentration" class="ivf_semenanalysisreport_Concentration"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Concentration->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Concentration" class="<?php echo $ivf_semenanalysisreport_list->Concentration->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Concentration) ?>', 1);"><div id="elh_ivf_semenanalysisreport_Concentration" class="ivf_semenanalysisreport_Concentration">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Concentration->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->Concentration->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->Concentration->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->Total->Visible) { // Total ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Total) == "") { ?>
		<th data-name="Total" class="<?php echo $ivf_semenanalysisreport_list->Total->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Total" class="ivf_semenanalysisreport_Total"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Total->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Total" class="<?php echo $ivf_semenanalysisreport_list->Total->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Total) ?>', 1);"><div id="elh_ivf_semenanalysisreport_Total" class="ivf_semenanalysisreport_Total">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Total->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->Total->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->Total->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->ProgressiveMotility->Visible) { // ProgressiveMotility ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->ProgressiveMotility) == "") { ?>
		<th data-name="ProgressiveMotility" class="<?php echo $ivf_semenanalysisreport_list->ProgressiveMotility->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_ProgressiveMotility" class="ivf_semenanalysisreport_ProgressiveMotility"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->ProgressiveMotility->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProgressiveMotility" class="<?php echo $ivf_semenanalysisreport_list->ProgressiveMotility->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->ProgressiveMotility) ?>', 1);"><div id="elh_ivf_semenanalysisreport_ProgressiveMotility" class="ivf_semenanalysisreport_ProgressiveMotility">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->ProgressiveMotility->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->ProgressiveMotility->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->ProgressiveMotility->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->NonProgrssiveMotile->Visible) { // NonProgrssiveMotile ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->NonProgrssiveMotile) == "") { ?>
		<th data-name="NonProgrssiveMotile" class="<?php echo $ivf_semenanalysisreport_list->NonProgrssiveMotile->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_NonProgrssiveMotile" class="ivf_semenanalysisreport_NonProgrssiveMotile"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->NonProgrssiveMotile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NonProgrssiveMotile" class="<?php echo $ivf_semenanalysisreport_list->NonProgrssiveMotile->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->NonProgrssiveMotile) ?>', 1);"><div id="elh_ivf_semenanalysisreport_NonProgrssiveMotile" class="ivf_semenanalysisreport_NonProgrssiveMotile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->NonProgrssiveMotile->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->NonProgrssiveMotile->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->NonProgrssiveMotile->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->Immotile->Visible) { // Immotile ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Immotile) == "") { ?>
		<th data-name="Immotile" class="<?php echo $ivf_semenanalysisreport_list->Immotile->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Immotile" class="ivf_semenanalysisreport_Immotile"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Immotile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Immotile" class="<?php echo $ivf_semenanalysisreport_list->Immotile->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Immotile) ?>', 1);"><div id="elh_ivf_semenanalysisreport_Immotile" class="ivf_semenanalysisreport_Immotile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Immotile->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->Immotile->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->Immotile->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->TotalProgrssiveMotile->Visible) { // TotalProgrssiveMotile ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->TotalProgrssiveMotile) == "") { ?>
		<th data-name="TotalProgrssiveMotile" class="<?php echo $ivf_semenanalysisreport_list->TotalProgrssiveMotile->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_TotalProgrssiveMotile" class="ivf_semenanalysisreport_TotalProgrssiveMotile"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->TotalProgrssiveMotile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TotalProgrssiveMotile" class="<?php echo $ivf_semenanalysisreport_list->TotalProgrssiveMotile->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->TotalProgrssiveMotile) ?>', 1);"><div id="elh_ivf_semenanalysisreport_TotalProgrssiveMotile" class="ivf_semenanalysisreport_TotalProgrssiveMotile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->TotalProgrssiveMotile->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->TotalProgrssiveMotile->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->TotalProgrssiveMotile->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->Appearance->Visible) { // Appearance ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Appearance) == "") { ?>
		<th data-name="Appearance" class="<?php echo $ivf_semenanalysisreport_list->Appearance->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Appearance" class="ivf_semenanalysisreport_Appearance"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Appearance->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Appearance" class="<?php echo $ivf_semenanalysisreport_list->Appearance->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Appearance) ?>', 1);"><div id="elh_ivf_semenanalysisreport_Appearance" class="ivf_semenanalysisreport_Appearance">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Appearance->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->Appearance->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->Appearance->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->Homogenosity->Visible) { // Homogenosity ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Homogenosity) == "") { ?>
		<th data-name="Homogenosity" class="<?php echo $ivf_semenanalysisreport_list->Homogenosity->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Homogenosity" class="ivf_semenanalysisreport_Homogenosity"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Homogenosity->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Homogenosity" class="<?php echo $ivf_semenanalysisreport_list->Homogenosity->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Homogenosity) ?>', 1);"><div id="elh_ivf_semenanalysisreport_Homogenosity" class="ivf_semenanalysisreport_Homogenosity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Homogenosity->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->Homogenosity->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->Homogenosity->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->CompleteSample->Visible) { // CompleteSample ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->CompleteSample) == "") { ?>
		<th data-name="CompleteSample" class="<?php echo $ivf_semenanalysisreport_list->CompleteSample->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_CompleteSample" class="ivf_semenanalysisreport_CompleteSample"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->CompleteSample->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CompleteSample" class="<?php echo $ivf_semenanalysisreport_list->CompleteSample->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->CompleteSample) ?>', 1);"><div id="elh_ivf_semenanalysisreport_CompleteSample" class="ivf_semenanalysisreport_CompleteSample">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->CompleteSample->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->CompleteSample->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->CompleteSample->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->Liquefactiontime->Visible) { // Liquefactiontime ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Liquefactiontime) == "") { ?>
		<th data-name="Liquefactiontime" class="<?php echo $ivf_semenanalysisreport_list->Liquefactiontime->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Liquefactiontime" class="ivf_semenanalysisreport_Liquefactiontime"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Liquefactiontime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Liquefactiontime" class="<?php echo $ivf_semenanalysisreport_list->Liquefactiontime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Liquefactiontime) ?>', 1);"><div id="elh_ivf_semenanalysisreport_Liquefactiontime" class="ivf_semenanalysisreport_Liquefactiontime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Liquefactiontime->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->Liquefactiontime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->Liquefactiontime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->Normal->Visible) { // Normal ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Normal) == "") { ?>
		<th data-name="Normal" class="<?php echo $ivf_semenanalysisreport_list->Normal->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Normal" class="ivf_semenanalysisreport_Normal"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Normal->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Normal" class="<?php echo $ivf_semenanalysisreport_list->Normal->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Normal) ?>', 1);"><div id="elh_ivf_semenanalysisreport_Normal" class="ivf_semenanalysisreport_Normal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Normal->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->Normal->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->Normal->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->Abnormal->Visible) { // Abnormal ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Abnormal) == "") { ?>
		<th data-name="Abnormal" class="<?php echo $ivf_semenanalysisreport_list->Abnormal->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Abnormal" class="ivf_semenanalysisreport_Abnormal"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Abnormal->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Abnormal" class="<?php echo $ivf_semenanalysisreport_list->Abnormal->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Abnormal) ?>', 1);"><div id="elh_ivf_semenanalysisreport_Abnormal" class="ivf_semenanalysisreport_Abnormal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Abnormal->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->Abnormal->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->Abnormal->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->Headdefects->Visible) { // Headdefects ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Headdefects) == "") { ?>
		<th data-name="Headdefects" class="<?php echo $ivf_semenanalysisreport_list->Headdefects->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Headdefects" class="ivf_semenanalysisreport_Headdefects"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Headdefects->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Headdefects" class="<?php echo $ivf_semenanalysisreport_list->Headdefects->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Headdefects) ?>', 1);"><div id="elh_ivf_semenanalysisreport_Headdefects" class="ivf_semenanalysisreport_Headdefects">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Headdefects->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->Headdefects->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->Headdefects->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->MidpieceDefects->Visible) { // MidpieceDefects ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->MidpieceDefects) == "") { ?>
		<th data-name="MidpieceDefects" class="<?php echo $ivf_semenanalysisreport_list->MidpieceDefects->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_MidpieceDefects" class="ivf_semenanalysisreport_MidpieceDefects"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->MidpieceDefects->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MidpieceDefects" class="<?php echo $ivf_semenanalysisreport_list->MidpieceDefects->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->MidpieceDefects) ?>', 1);"><div id="elh_ivf_semenanalysisreport_MidpieceDefects" class="ivf_semenanalysisreport_MidpieceDefects">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->MidpieceDefects->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->MidpieceDefects->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->MidpieceDefects->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->TailDefects->Visible) { // TailDefects ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->TailDefects) == "") { ?>
		<th data-name="TailDefects" class="<?php echo $ivf_semenanalysisreport_list->TailDefects->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_TailDefects" class="ivf_semenanalysisreport_TailDefects"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->TailDefects->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TailDefects" class="<?php echo $ivf_semenanalysisreport_list->TailDefects->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->TailDefects) ?>', 1);"><div id="elh_ivf_semenanalysisreport_TailDefects" class="ivf_semenanalysisreport_TailDefects">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->TailDefects->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->TailDefects->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->TailDefects->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->NormalProgMotile->Visible) { // NormalProgMotile ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->NormalProgMotile) == "") { ?>
		<th data-name="NormalProgMotile" class="<?php echo $ivf_semenanalysisreport_list->NormalProgMotile->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_NormalProgMotile" class="ivf_semenanalysisreport_NormalProgMotile"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->NormalProgMotile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NormalProgMotile" class="<?php echo $ivf_semenanalysisreport_list->NormalProgMotile->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->NormalProgMotile) ?>', 1);"><div id="elh_ivf_semenanalysisreport_NormalProgMotile" class="ivf_semenanalysisreport_NormalProgMotile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->NormalProgMotile->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->NormalProgMotile->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->NormalProgMotile->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->ImmatureForms->Visible) { // ImmatureForms ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->ImmatureForms) == "") { ?>
		<th data-name="ImmatureForms" class="<?php echo $ivf_semenanalysisreport_list->ImmatureForms->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_ImmatureForms" class="ivf_semenanalysisreport_ImmatureForms"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->ImmatureForms->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ImmatureForms" class="<?php echo $ivf_semenanalysisreport_list->ImmatureForms->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->ImmatureForms) ?>', 1);"><div id="elh_ivf_semenanalysisreport_ImmatureForms" class="ivf_semenanalysisreport_ImmatureForms">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->ImmatureForms->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->ImmatureForms->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->ImmatureForms->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->Leucocytes->Visible) { // Leucocytes ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Leucocytes) == "") { ?>
		<th data-name="Leucocytes" class="<?php echo $ivf_semenanalysisreport_list->Leucocytes->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Leucocytes" class="ivf_semenanalysisreport_Leucocytes"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Leucocytes->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Leucocytes" class="<?php echo $ivf_semenanalysisreport_list->Leucocytes->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Leucocytes) ?>', 1);"><div id="elh_ivf_semenanalysisreport_Leucocytes" class="ivf_semenanalysisreport_Leucocytes">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Leucocytes->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->Leucocytes->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->Leucocytes->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->Agglutination->Visible) { // Agglutination ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Agglutination) == "") { ?>
		<th data-name="Agglutination" class="<?php echo $ivf_semenanalysisreport_list->Agglutination->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Agglutination" class="ivf_semenanalysisreport_Agglutination"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Agglutination->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Agglutination" class="<?php echo $ivf_semenanalysisreport_list->Agglutination->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Agglutination) ?>', 1);"><div id="elh_ivf_semenanalysisreport_Agglutination" class="ivf_semenanalysisreport_Agglutination">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Agglutination->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->Agglutination->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->Agglutination->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->Debris->Visible) { // Debris ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Debris) == "") { ?>
		<th data-name="Debris" class="<?php echo $ivf_semenanalysisreport_list->Debris->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Debris" class="ivf_semenanalysisreport_Debris"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Debris->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Debris" class="<?php echo $ivf_semenanalysisreport_list->Debris->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Debris) ?>', 1);"><div id="elh_ivf_semenanalysisreport_Debris" class="ivf_semenanalysisreport_Debris">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Debris->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->Debris->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->Debris->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->Diagnosis->Visible) { // Diagnosis ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Diagnosis) == "") { ?>
		<th data-name="Diagnosis" class="<?php echo $ivf_semenanalysisreport_list->Diagnosis->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Diagnosis" class="ivf_semenanalysisreport_Diagnosis"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Diagnosis->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Diagnosis" class="<?php echo $ivf_semenanalysisreport_list->Diagnosis->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Diagnosis) ?>', 1);"><div id="elh_ivf_semenanalysisreport_Diagnosis" class="ivf_semenanalysisreport_Diagnosis">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Diagnosis->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->Diagnosis->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->Diagnosis->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->Observations->Visible) { // Observations ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Observations) == "") { ?>
		<th data-name="Observations" class="<?php echo $ivf_semenanalysisreport_list->Observations->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Observations" class="ivf_semenanalysisreport_Observations"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Observations->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Observations" class="<?php echo $ivf_semenanalysisreport_list->Observations->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Observations) ?>', 1);"><div id="elh_ivf_semenanalysisreport_Observations" class="ivf_semenanalysisreport_Observations">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Observations->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->Observations->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->Observations->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->Signature->Visible) { // Signature ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Signature) == "") { ?>
		<th data-name="Signature" class="<?php echo $ivf_semenanalysisreport_list->Signature->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Signature" class="ivf_semenanalysisreport_Signature"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Signature->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Signature" class="<?php echo $ivf_semenanalysisreport_list->Signature->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Signature) ?>', 1);"><div id="elh_ivf_semenanalysisreport_Signature" class="ivf_semenanalysisreport_Signature">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Signature->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->Signature->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->Signature->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->SemenOrgin->Visible) { // SemenOrgin ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->SemenOrgin) == "") { ?>
		<th data-name="SemenOrgin" class="<?php echo $ivf_semenanalysisreport_list->SemenOrgin->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_SemenOrgin" class="ivf_semenanalysisreport_SemenOrgin"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->SemenOrgin->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SemenOrgin" class="<?php echo $ivf_semenanalysisreport_list->SemenOrgin->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->SemenOrgin) ?>', 1);"><div id="elh_ivf_semenanalysisreport_SemenOrgin" class="ivf_semenanalysisreport_SemenOrgin">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->SemenOrgin->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->SemenOrgin->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->SemenOrgin->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->Donor->Visible) { // Donor ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Donor) == "") { ?>
		<th data-name="Donor" class="<?php echo $ivf_semenanalysisreport_list->Donor->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Donor" class="ivf_semenanalysisreport_Donor"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Donor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Donor" class="<?php echo $ivf_semenanalysisreport_list->Donor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Donor) ?>', 1);"><div id="elh_ivf_semenanalysisreport_Donor" class="ivf_semenanalysisreport_Donor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Donor->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->Donor->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->Donor->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->DonorBloodgroup->Visible) { // DonorBloodgroup ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->DonorBloodgroup) == "") { ?>
		<th data-name="DonorBloodgroup" class="<?php echo $ivf_semenanalysisreport_list->DonorBloodgroup->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_DonorBloodgroup" class="ivf_semenanalysisreport_DonorBloodgroup"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->DonorBloodgroup->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DonorBloodgroup" class="<?php echo $ivf_semenanalysisreport_list->DonorBloodgroup->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->DonorBloodgroup) ?>', 1);"><div id="elh_ivf_semenanalysisreport_DonorBloodgroup" class="ivf_semenanalysisreport_DonorBloodgroup">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->DonorBloodgroup->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->DonorBloodgroup->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->DonorBloodgroup->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->Tank->Visible) { // Tank ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Tank) == "") { ?>
		<th data-name="Tank" class="<?php echo $ivf_semenanalysisreport_list->Tank->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Tank" class="ivf_semenanalysisreport_Tank"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Tank->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tank" class="<?php echo $ivf_semenanalysisreport_list->Tank->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Tank) ?>', 1);"><div id="elh_ivf_semenanalysisreport_Tank" class="ivf_semenanalysisreport_Tank">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Tank->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->Tank->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->Tank->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->Location->Visible) { // Location ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Location) == "") { ?>
		<th data-name="Location" class="<?php echo $ivf_semenanalysisreport_list->Location->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Location" class="ivf_semenanalysisreport_Location"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Location->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Location" class="<?php echo $ivf_semenanalysisreport_list->Location->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Location) ?>', 1);"><div id="elh_ivf_semenanalysisreport_Location" class="ivf_semenanalysisreport_Location">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Location->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->Location->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->Location->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->Volume1->Visible) { // Volume1 ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Volume1) == "") { ?>
		<th data-name="Volume1" class="<?php echo $ivf_semenanalysisreport_list->Volume1->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Volume1" class="ivf_semenanalysisreport_Volume1"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Volume1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Volume1" class="<?php echo $ivf_semenanalysisreport_list->Volume1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Volume1) ?>', 1);"><div id="elh_ivf_semenanalysisreport_Volume1" class="ivf_semenanalysisreport_Volume1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Volume1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->Volume1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->Volume1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->Concentration1->Visible) { // Concentration1 ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Concentration1) == "") { ?>
		<th data-name="Concentration1" class="<?php echo $ivf_semenanalysisreport_list->Concentration1->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Concentration1" class="ivf_semenanalysisreport_Concentration1"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Concentration1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Concentration1" class="<?php echo $ivf_semenanalysisreport_list->Concentration1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Concentration1) ?>', 1);"><div id="elh_ivf_semenanalysisreport_Concentration1" class="ivf_semenanalysisreport_Concentration1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Concentration1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->Concentration1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->Concentration1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->Total1->Visible) { // Total1 ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Total1) == "") { ?>
		<th data-name="Total1" class="<?php echo $ivf_semenanalysisreport_list->Total1->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Total1" class="ivf_semenanalysisreport_Total1"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Total1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Total1" class="<?php echo $ivf_semenanalysisreport_list->Total1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Total1) ?>', 1);"><div id="elh_ivf_semenanalysisreport_Total1" class="ivf_semenanalysisreport_Total1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Total1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->Total1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->Total1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->ProgressiveMotility1->Visible) { // ProgressiveMotility1 ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->ProgressiveMotility1) == "") { ?>
		<th data-name="ProgressiveMotility1" class="<?php echo $ivf_semenanalysisreport_list->ProgressiveMotility1->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_ProgressiveMotility1" class="ivf_semenanalysisreport_ProgressiveMotility1"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->ProgressiveMotility1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProgressiveMotility1" class="<?php echo $ivf_semenanalysisreport_list->ProgressiveMotility1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->ProgressiveMotility1) ?>', 1);"><div id="elh_ivf_semenanalysisreport_ProgressiveMotility1" class="ivf_semenanalysisreport_ProgressiveMotility1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->ProgressiveMotility1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->ProgressiveMotility1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->ProgressiveMotility1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->NonProgrssiveMotile1->Visible) { // NonProgrssiveMotile1 ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->NonProgrssiveMotile1) == "") { ?>
		<th data-name="NonProgrssiveMotile1" class="<?php echo $ivf_semenanalysisreport_list->NonProgrssiveMotile1->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_NonProgrssiveMotile1" class="ivf_semenanalysisreport_NonProgrssiveMotile1"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->NonProgrssiveMotile1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NonProgrssiveMotile1" class="<?php echo $ivf_semenanalysisreport_list->NonProgrssiveMotile1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->NonProgrssiveMotile1) ?>', 1);"><div id="elh_ivf_semenanalysisreport_NonProgrssiveMotile1" class="ivf_semenanalysisreport_NonProgrssiveMotile1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->NonProgrssiveMotile1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->NonProgrssiveMotile1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->NonProgrssiveMotile1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->Immotile1->Visible) { // Immotile1 ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Immotile1) == "") { ?>
		<th data-name="Immotile1" class="<?php echo $ivf_semenanalysisreport_list->Immotile1->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Immotile1" class="ivf_semenanalysisreport_Immotile1"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Immotile1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Immotile1" class="<?php echo $ivf_semenanalysisreport_list->Immotile1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Immotile1) ?>', 1);"><div id="elh_ivf_semenanalysisreport_Immotile1" class="ivf_semenanalysisreport_Immotile1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Immotile1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->Immotile1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->Immotile1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->TotalProgrssiveMotile1->Visible) { // TotalProgrssiveMotile1 ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->TotalProgrssiveMotile1) == "") { ?>
		<th data-name="TotalProgrssiveMotile1" class="<?php echo $ivf_semenanalysisreport_list->TotalProgrssiveMotile1->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_TotalProgrssiveMotile1" class="ivf_semenanalysisreport_TotalProgrssiveMotile1"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->TotalProgrssiveMotile1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TotalProgrssiveMotile1" class="<?php echo $ivf_semenanalysisreport_list->TotalProgrssiveMotile1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->TotalProgrssiveMotile1) ?>', 1);"><div id="elh_ivf_semenanalysisreport_TotalProgrssiveMotile1" class="ivf_semenanalysisreport_TotalProgrssiveMotile1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->TotalProgrssiveMotile1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->TotalProgrssiveMotile1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->TotalProgrssiveMotile1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->TidNo->Visible) { // TidNo ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->TidNo) == "") { ?>
		<th data-name="TidNo" class="<?php echo $ivf_semenanalysisreport_list->TidNo->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_TidNo" class="ivf_semenanalysisreport_TidNo"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->TidNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TidNo" class="<?php echo $ivf_semenanalysisreport_list->TidNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->TidNo) ?>', 1);"><div id="elh_ivf_semenanalysisreport_TidNo" class="ivf_semenanalysisreport_TidNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->TidNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->TidNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->TidNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->Color->Visible) { // Color ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Color) == "") { ?>
		<th data-name="Color" class="<?php echo $ivf_semenanalysisreport_list->Color->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Color" class="ivf_semenanalysisreport_Color"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Color->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Color" class="<?php echo $ivf_semenanalysisreport_list->Color->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Color) ?>', 1);"><div id="elh_ivf_semenanalysisreport_Color" class="ivf_semenanalysisreport_Color">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Color->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->Color->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->Color->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->DoneBy->Visible) { // DoneBy ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->DoneBy) == "") { ?>
		<th data-name="DoneBy" class="<?php echo $ivf_semenanalysisreport_list->DoneBy->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_DoneBy" class="ivf_semenanalysisreport_DoneBy"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->DoneBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DoneBy" class="<?php echo $ivf_semenanalysisreport_list->DoneBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->DoneBy) ?>', 1);"><div id="elh_ivf_semenanalysisreport_DoneBy" class="ivf_semenanalysisreport_DoneBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->DoneBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->DoneBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->DoneBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->Method->Visible) { // Method ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Method) == "") { ?>
		<th data-name="Method" class="<?php echo $ivf_semenanalysisreport_list->Method->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Method" class="ivf_semenanalysisreport_Method"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Method->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Method" class="<?php echo $ivf_semenanalysisreport_list->Method->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Method) ?>', 1);"><div id="elh_ivf_semenanalysisreport_Method" class="ivf_semenanalysisreport_Method">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Method->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->Method->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->Method->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->Abstinence->Visible) { // Abstinence ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Abstinence) == "") { ?>
		<th data-name="Abstinence" class="<?php echo $ivf_semenanalysisreport_list->Abstinence->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Abstinence" class="ivf_semenanalysisreport_Abstinence"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Abstinence->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Abstinence" class="<?php echo $ivf_semenanalysisreport_list->Abstinence->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Abstinence) ?>', 1);"><div id="elh_ivf_semenanalysisreport_Abstinence" class="ivf_semenanalysisreport_Abstinence">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Abstinence->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->Abstinence->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->Abstinence->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->ProcessedBy->Visible) { // ProcessedBy ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->ProcessedBy) == "") { ?>
		<th data-name="ProcessedBy" class="<?php echo $ivf_semenanalysisreport_list->ProcessedBy->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_ProcessedBy" class="ivf_semenanalysisreport_ProcessedBy"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->ProcessedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProcessedBy" class="<?php echo $ivf_semenanalysisreport_list->ProcessedBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->ProcessedBy) ?>', 1);"><div id="elh_ivf_semenanalysisreport_ProcessedBy" class="ivf_semenanalysisreport_ProcessedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->ProcessedBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->ProcessedBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->ProcessedBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->InseminationTime->Visible) { // InseminationTime ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->InseminationTime) == "") { ?>
		<th data-name="InseminationTime" class="<?php echo $ivf_semenanalysisreport_list->InseminationTime->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_InseminationTime" class="ivf_semenanalysisreport_InseminationTime"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->InseminationTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="InseminationTime" class="<?php echo $ivf_semenanalysisreport_list->InseminationTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->InseminationTime) ?>', 1);"><div id="elh_ivf_semenanalysisreport_InseminationTime" class="ivf_semenanalysisreport_InseminationTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->InseminationTime->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->InseminationTime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->InseminationTime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->InseminationBy->Visible) { // InseminationBy ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->InseminationBy) == "") { ?>
		<th data-name="InseminationBy" class="<?php echo $ivf_semenanalysisreport_list->InseminationBy->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_InseminationBy" class="ivf_semenanalysisreport_InseminationBy"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->InseminationBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="InseminationBy" class="<?php echo $ivf_semenanalysisreport_list->InseminationBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->InseminationBy) ?>', 1);"><div id="elh_ivf_semenanalysisreport_InseminationBy" class="ivf_semenanalysisreport_InseminationBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->InseminationBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->InseminationBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->InseminationBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->Big->Visible) { // Big ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Big) == "") { ?>
		<th data-name="Big" class="<?php echo $ivf_semenanalysisreport_list->Big->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Big" class="ivf_semenanalysisreport_Big"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Big->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Big" class="<?php echo $ivf_semenanalysisreport_list->Big->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Big) ?>', 1);"><div id="elh_ivf_semenanalysisreport_Big" class="ivf_semenanalysisreport_Big">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Big->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->Big->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->Big->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->Medium->Visible) { // Medium ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Medium) == "") { ?>
		<th data-name="Medium" class="<?php echo $ivf_semenanalysisreport_list->Medium->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Medium" class="ivf_semenanalysisreport_Medium"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Medium->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Medium" class="<?php echo $ivf_semenanalysisreport_list->Medium->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Medium) ?>', 1);"><div id="elh_ivf_semenanalysisreport_Medium" class="ivf_semenanalysisreport_Medium">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Medium->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->Medium->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->Medium->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->Small->Visible) { // Small ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Small) == "") { ?>
		<th data-name="Small" class="<?php echo $ivf_semenanalysisreport_list->Small->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Small" class="ivf_semenanalysisreport_Small"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Small->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Small" class="<?php echo $ivf_semenanalysisreport_list->Small->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Small) ?>', 1);"><div id="elh_ivf_semenanalysisreport_Small" class="ivf_semenanalysisreport_Small">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Small->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->Small->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->Small->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->NoHalo->Visible) { // NoHalo ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->NoHalo) == "") { ?>
		<th data-name="NoHalo" class="<?php echo $ivf_semenanalysisreport_list->NoHalo->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_NoHalo" class="ivf_semenanalysisreport_NoHalo"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->NoHalo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoHalo" class="<?php echo $ivf_semenanalysisreport_list->NoHalo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->NoHalo) ?>', 1);"><div id="elh_ivf_semenanalysisreport_NoHalo" class="ivf_semenanalysisreport_NoHalo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->NoHalo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->NoHalo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->NoHalo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->Fragmented->Visible) { // Fragmented ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Fragmented) == "") { ?>
		<th data-name="Fragmented" class="<?php echo $ivf_semenanalysisreport_list->Fragmented->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Fragmented" class="ivf_semenanalysisreport_Fragmented"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Fragmented->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Fragmented" class="<?php echo $ivf_semenanalysisreport_list->Fragmented->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Fragmented) ?>', 1);"><div id="elh_ivf_semenanalysisreport_Fragmented" class="ivf_semenanalysisreport_Fragmented">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Fragmented->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->Fragmented->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->Fragmented->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->NonFragmented->Visible) { // NonFragmented ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->NonFragmented) == "") { ?>
		<th data-name="NonFragmented" class="<?php echo $ivf_semenanalysisreport_list->NonFragmented->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_NonFragmented" class="ivf_semenanalysisreport_NonFragmented"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->NonFragmented->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NonFragmented" class="<?php echo $ivf_semenanalysisreport_list->NonFragmented->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->NonFragmented) ?>', 1);"><div id="elh_ivf_semenanalysisreport_NonFragmented" class="ivf_semenanalysisreport_NonFragmented">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->NonFragmented->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->NonFragmented->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->NonFragmented->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->DFI->Visible) { // DFI ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->DFI) == "") { ?>
		<th data-name="DFI" class="<?php echo $ivf_semenanalysisreport_list->DFI->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_DFI" class="ivf_semenanalysisreport_DFI"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->DFI->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DFI" class="<?php echo $ivf_semenanalysisreport_list->DFI->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->DFI) ?>', 1);"><div id="elh_ivf_semenanalysisreport_DFI" class="ivf_semenanalysisreport_DFI">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->DFI->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->DFI->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->DFI->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->IsueBy->Visible) { // IsueBy ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->IsueBy) == "") { ?>
		<th data-name="IsueBy" class="<?php echo $ivf_semenanalysisreport_list->IsueBy->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_IsueBy" class="ivf_semenanalysisreport_IsueBy"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->IsueBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IsueBy" class="<?php echo $ivf_semenanalysisreport_list->IsueBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->IsueBy) ?>', 1);"><div id="elh_ivf_semenanalysisreport_IsueBy" class="ivf_semenanalysisreport_IsueBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->IsueBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->IsueBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->IsueBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->Volume2->Visible) { // Volume2 ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Volume2) == "") { ?>
		<th data-name="Volume2" class="<?php echo $ivf_semenanalysisreport_list->Volume2->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Volume2" class="ivf_semenanalysisreport_Volume2"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Volume2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Volume2" class="<?php echo $ivf_semenanalysisreport_list->Volume2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Volume2) ?>', 1);"><div id="elh_ivf_semenanalysisreport_Volume2" class="ivf_semenanalysisreport_Volume2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Volume2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->Volume2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->Volume2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->Concentration2->Visible) { // Concentration2 ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Concentration2) == "") { ?>
		<th data-name="Concentration2" class="<?php echo $ivf_semenanalysisreport_list->Concentration2->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Concentration2" class="ivf_semenanalysisreport_Concentration2"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Concentration2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Concentration2" class="<?php echo $ivf_semenanalysisreport_list->Concentration2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Concentration2) ?>', 1);"><div id="elh_ivf_semenanalysisreport_Concentration2" class="ivf_semenanalysisreport_Concentration2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Concentration2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->Concentration2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->Concentration2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->Total2->Visible) { // Total2 ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Total2) == "") { ?>
		<th data-name="Total2" class="<?php echo $ivf_semenanalysisreport_list->Total2->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Total2" class="ivf_semenanalysisreport_Total2"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Total2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Total2" class="<?php echo $ivf_semenanalysisreport_list->Total2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Total2) ?>', 1);"><div id="elh_ivf_semenanalysisreport_Total2" class="ivf_semenanalysisreport_Total2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Total2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->Total2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->Total2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->ProgressiveMotility2->Visible) { // ProgressiveMotility2 ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->ProgressiveMotility2) == "") { ?>
		<th data-name="ProgressiveMotility2" class="<?php echo $ivf_semenanalysisreport_list->ProgressiveMotility2->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_ProgressiveMotility2" class="ivf_semenanalysisreport_ProgressiveMotility2"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->ProgressiveMotility2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProgressiveMotility2" class="<?php echo $ivf_semenanalysisreport_list->ProgressiveMotility2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->ProgressiveMotility2) ?>', 1);"><div id="elh_ivf_semenanalysisreport_ProgressiveMotility2" class="ivf_semenanalysisreport_ProgressiveMotility2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->ProgressiveMotility2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->ProgressiveMotility2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->ProgressiveMotility2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->NonProgrssiveMotile2->Visible) { // NonProgrssiveMotile2 ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->NonProgrssiveMotile2) == "") { ?>
		<th data-name="NonProgrssiveMotile2" class="<?php echo $ivf_semenanalysisreport_list->NonProgrssiveMotile2->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_NonProgrssiveMotile2" class="ivf_semenanalysisreport_NonProgrssiveMotile2"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->NonProgrssiveMotile2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NonProgrssiveMotile2" class="<?php echo $ivf_semenanalysisreport_list->NonProgrssiveMotile2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->NonProgrssiveMotile2) ?>', 1);"><div id="elh_ivf_semenanalysisreport_NonProgrssiveMotile2" class="ivf_semenanalysisreport_NonProgrssiveMotile2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->NonProgrssiveMotile2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->NonProgrssiveMotile2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->NonProgrssiveMotile2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->Immotile2->Visible) { // Immotile2 ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Immotile2) == "") { ?>
		<th data-name="Immotile2" class="<?php echo $ivf_semenanalysisreport_list->Immotile2->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_Immotile2" class="ivf_semenanalysisreport_Immotile2"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Immotile2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Immotile2" class="<?php echo $ivf_semenanalysisreport_list->Immotile2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->Immotile2) ?>', 1);"><div id="elh_ivf_semenanalysisreport_Immotile2" class="ivf_semenanalysisreport_Immotile2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->Immotile2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->Immotile2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->Immotile2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->TotalProgrssiveMotile2->Visible) { // TotalProgrssiveMotile2 ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->TotalProgrssiveMotile2) == "") { ?>
		<th data-name="TotalProgrssiveMotile2" class="<?php echo $ivf_semenanalysisreport_list->TotalProgrssiveMotile2->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_TotalProgrssiveMotile2" class="ivf_semenanalysisreport_TotalProgrssiveMotile2"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->TotalProgrssiveMotile2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TotalProgrssiveMotile2" class="<?php echo $ivf_semenanalysisreport_list->TotalProgrssiveMotile2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->TotalProgrssiveMotile2) ?>', 1);"><div id="elh_ivf_semenanalysisreport_TotalProgrssiveMotile2" class="ivf_semenanalysisreport_TotalProgrssiveMotile2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->TotalProgrssiveMotile2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->TotalProgrssiveMotile2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->TotalProgrssiveMotile2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->IssuedBy->Visible) { // IssuedBy ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->IssuedBy) == "") { ?>
		<th data-name="IssuedBy" class="<?php echo $ivf_semenanalysisreport_list->IssuedBy->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_IssuedBy" class="ivf_semenanalysisreport_IssuedBy"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->IssuedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IssuedBy" class="<?php echo $ivf_semenanalysisreport_list->IssuedBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->IssuedBy) ?>', 1);"><div id="elh_ivf_semenanalysisreport_IssuedBy" class="ivf_semenanalysisreport_IssuedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->IssuedBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->IssuedBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->IssuedBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->IssuedTo->Visible) { // IssuedTo ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->IssuedTo) == "") { ?>
		<th data-name="IssuedTo" class="<?php echo $ivf_semenanalysisreport_list->IssuedTo->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_IssuedTo" class="ivf_semenanalysisreport_IssuedTo"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->IssuedTo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IssuedTo" class="<?php echo $ivf_semenanalysisreport_list->IssuedTo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->IssuedTo) ?>', 1);"><div id="elh_ivf_semenanalysisreport_IssuedTo" class="ivf_semenanalysisreport_IssuedTo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->IssuedTo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->IssuedTo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->IssuedTo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->PaID->Visible) { // PaID ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->PaID) == "") { ?>
		<th data-name="PaID" class="<?php echo $ivf_semenanalysisreport_list->PaID->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_PaID" class="ivf_semenanalysisreport_PaID"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->PaID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PaID" class="<?php echo $ivf_semenanalysisreport_list->PaID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->PaID) ?>', 1);"><div id="elh_ivf_semenanalysisreport_PaID" class="ivf_semenanalysisreport_PaID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->PaID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->PaID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->PaID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->PaName->Visible) { // PaName ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->PaName) == "") { ?>
		<th data-name="PaName" class="<?php echo $ivf_semenanalysisreport_list->PaName->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_PaName" class="ivf_semenanalysisreport_PaName"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->PaName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PaName" class="<?php echo $ivf_semenanalysisreport_list->PaName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->PaName) ?>', 1);"><div id="elh_ivf_semenanalysisreport_PaName" class="ivf_semenanalysisreport_PaName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->PaName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->PaName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->PaName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->PaMobile->Visible) { // PaMobile ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->PaMobile) == "") { ?>
		<th data-name="PaMobile" class="<?php echo $ivf_semenanalysisreport_list->PaMobile->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_PaMobile" class="ivf_semenanalysisreport_PaMobile"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->PaMobile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PaMobile" class="<?php echo $ivf_semenanalysisreport_list->PaMobile->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->PaMobile) ?>', 1);"><div id="elh_ivf_semenanalysisreport_PaMobile" class="ivf_semenanalysisreport_PaMobile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->PaMobile->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->PaMobile->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->PaMobile->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->PartnerID->Visible) { // PartnerID ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->PartnerID) == "") { ?>
		<th data-name="PartnerID" class="<?php echo $ivf_semenanalysisreport_list->PartnerID->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_PartnerID" class="ivf_semenanalysisreport_PartnerID"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->PartnerID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerID" class="<?php echo $ivf_semenanalysisreport_list->PartnerID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->PartnerID) ?>', 1);"><div id="elh_ivf_semenanalysisreport_PartnerID" class="ivf_semenanalysisreport_PartnerID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->PartnerID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->PartnerID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->PartnerID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->PartnerName->Visible) { // PartnerName ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->PartnerName) == "") { ?>
		<th data-name="PartnerName" class="<?php echo $ivf_semenanalysisreport_list->PartnerName->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_PartnerName" class="ivf_semenanalysisreport_PartnerName"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->PartnerName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerName" class="<?php echo $ivf_semenanalysisreport_list->PartnerName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->PartnerName) ?>', 1);"><div id="elh_ivf_semenanalysisreport_PartnerName" class="ivf_semenanalysisreport_PartnerName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->PartnerName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->PartnerName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->PartnerName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->PartnerMobile->Visible) { // PartnerMobile ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->PartnerMobile) == "") { ?>
		<th data-name="PartnerMobile" class="<?php echo $ivf_semenanalysisreport_list->PartnerMobile->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_PartnerMobile" class="ivf_semenanalysisreport_PartnerMobile"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->PartnerMobile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerMobile" class="<?php echo $ivf_semenanalysisreport_list->PartnerMobile->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->PartnerMobile) ?>', 1);"><div id="elh_ivf_semenanalysisreport_PartnerMobile" class="ivf_semenanalysisreport_PartnerMobile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->PartnerMobile->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->PartnerMobile->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->PartnerMobile->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->PREG_TEST_DATE->Visible) { // PREG_TEST_DATE ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->PREG_TEST_DATE) == "") { ?>
		<th data-name="PREG_TEST_DATE" class="<?php echo $ivf_semenanalysisreport_list->PREG_TEST_DATE->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_PREG_TEST_DATE" class="ivf_semenanalysisreport_PREG_TEST_DATE"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->PREG_TEST_DATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PREG_TEST_DATE" class="<?php echo $ivf_semenanalysisreport_list->PREG_TEST_DATE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->PREG_TEST_DATE) ?>', 1);"><div id="elh_ivf_semenanalysisreport_PREG_TEST_DATE" class="ivf_semenanalysisreport_PREG_TEST_DATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->PREG_TEST_DATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->PREG_TEST_DATE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->PREG_TEST_DATE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->SPECIFIC_PROBLEMS->Visible) { // SPECIFIC_PROBLEMS ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->SPECIFIC_PROBLEMS) == "") { ?>
		<th data-name="SPECIFIC_PROBLEMS" class="<?php echo $ivf_semenanalysisreport_list->SPECIFIC_PROBLEMS->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_SPECIFIC_PROBLEMS" class="ivf_semenanalysisreport_SPECIFIC_PROBLEMS"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->SPECIFIC_PROBLEMS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SPECIFIC_PROBLEMS" class="<?php echo $ivf_semenanalysisreport_list->SPECIFIC_PROBLEMS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->SPECIFIC_PROBLEMS) ?>', 1);"><div id="elh_ivf_semenanalysisreport_SPECIFIC_PROBLEMS" class="ivf_semenanalysisreport_SPECIFIC_PROBLEMS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->SPECIFIC_PROBLEMS->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->SPECIFIC_PROBLEMS->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->SPECIFIC_PROBLEMS->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->IMSC_1->Visible) { // IMSC_1 ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->IMSC_1) == "") { ?>
		<th data-name="IMSC_1" class="<?php echo $ivf_semenanalysisreport_list->IMSC_1->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_IMSC_1" class="ivf_semenanalysisreport_IMSC_1"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->IMSC_1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IMSC_1" class="<?php echo $ivf_semenanalysisreport_list->IMSC_1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->IMSC_1) ?>', 1);"><div id="elh_ivf_semenanalysisreport_IMSC_1" class="ivf_semenanalysisreport_IMSC_1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->IMSC_1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->IMSC_1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->IMSC_1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->IMSC_2->Visible) { // IMSC_2 ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->IMSC_2) == "") { ?>
		<th data-name="IMSC_2" class="<?php echo $ivf_semenanalysisreport_list->IMSC_2->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_IMSC_2" class="ivf_semenanalysisreport_IMSC_2"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->IMSC_2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IMSC_2" class="<?php echo $ivf_semenanalysisreport_list->IMSC_2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->IMSC_2) ?>', 1);"><div id="elh_ivf_semenanalysisreport_IMSC_2" class="ivf_semenanalysisreport_IMSC_2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->IMSC_2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->IMSC_2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->IMSC_2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->LIQUIFACTION_STORAGE->Visible) { // LIQUIFACTION_STORAGE ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->LIQUIFACTION_STORAGE) == "") { ?>
		<th data-name="LIQUIFACTION_STORAGE" class="<?php echo $ivf_semenanalysisreport_list->LIQUIFACTION_STORAGE->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_LIQUIFACTION_STORAGE" class="ivf_semenanalysisreport_LIQUIFACTION_STORAGE"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->LIQUIFACTION_STORAGE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LIQUIFACTION_STORAGE" class="<?php echo $ivf_semenanalysisreport_list->LIQUIFACTION_STORAGE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->LIQUIFACTION_STORAGE) ?>', 1);"><div id="elh_ivf_semenanalysisreport_LIQUIFACTION_STORAGE" class="ivf_semenanalysisreport_LIQUIFACTION_STORAGE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->LIQUIFACTION_STORAGE->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->LIQUIFACTION_STORAGE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->LIQUIFACTION_STORAGE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->IUI_PREP_METHOD->Visible) { // IUI_PREP_METHOD ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->IUI_PREP_METHOD) == "") { ?>
		<th data-name="IUI_PREP_METHOD" class="<?php echo $ivf_semenanalysisreport_list->IUI_PREP_METHOD->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_IUI_PREP_METHOD" class="ivf_semenanalysisreport_IUI_PREP_METHOD"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->IUI_PREP_METHOD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IUI_PREP_METHOD" class="<?php echo $ivf_semenanalysisreport_list->IUI_PREP_METHOD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->IUI_PREP_METHOD) ?>', 1);"><div id="elh_ivf_semenanalysisreport_IUI_PREP_METHOD" class="ivf_semenanalysisreport_IUI_PREP_METHOD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->IUI_PREP_METHOD->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->IUI_PREP_METHOD->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->IUI_PREP_METHOD->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->TIME_FROM_TRIGGER->Visible) { // TIME_FROM_TRIGGER ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->TIME_FROM_TRIGGER) == "") { ?>
		<th data-name="TIME_FROM_TRIGGER" class="<?php echo $ivf_semenanalysisreport_list->TIME_FROM_TRIGGER->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_TIME_FROM_TRIGGER" class="ivf_semenanalysisreport_TIME_FROM_TRIGGER"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->TIME_FROM_TRIGGER->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TIME_FROM_TRIGGER" class="<?php echo $ivf_semenanalysisreport_list->TIME_FROM_TRIGGER->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->TIME_FROM_TRIGGER) ?>', 1);"><div id="elh_ivf_semenanalysisreport_TIME_FROM_TRIGGER" class="ivf_semenanalysisreport_TIME_FROM_TRIGGER">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->TIME_FROM_TRIGGER->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->TIME_FROM_TRIGGER->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->TIME_FROM_TRIGGER->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->COLLECTION_TO_PREPARATION->Visible) { // COLLECTION_TO_PREPARATION ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->COLLECTION_TO_PREPARATION) == "") { ?>
		<th data-name="COLLECTION_TO_PREPARATION" class="<?php echo $ivf_semenanalysisreport_list->COLLECTION_TO_PREPARATION->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_COLLECTION_TO_PREPARATION" class="ivf_semenanalysisreport_COLLECTION_TO_PREPARATION"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->COLLECTION_TO_PREPARATION->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="COLLECTION_TO_PREPARATION" class="<?php echo $ivf_semenanalysisreport_list->COLLECTION_TO_PREPARATION->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->COLLECTION_TO_PREPARATION) ?>', 1);"><div id="elh_ivf_semenanalysisreport_COLLECTION_TO_PREPARATION" class="ivf_semenanalysisreport_COLLECTION_TO_PREPARATION">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->COLLECTION_TO_PREPARATION->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->COLLECTION_TO_PREPARATION->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->COLLECTION_TO_PREPARATION->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->TIME_FROM_PREP_TO_INSEM->Visible) { // TIME_FROM_PREP_TO_INSEM ?>
	<?php if ($ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->TIME_FROM_PREP_TO_INSEM) == "") { ?>
		<th data-name="TIME_FROM_PREP_TO_INSEM" class="<?php echo $ivf_semenanalysisreport_list->TIME_FROM_PREP_TO_INSEM->headerCellClass() ?>"><div id="elh_ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM" class="ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM"><div class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->TIME_FROM_PREP_TO_INSEM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TIME_FROM_PREP_TO_INSEM" class="<?php echo $ivf_semenanalysisreport_list->TIME_FROM_PREP_TO_INSEM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_semenanalysisreport_list->SortUrl($ivf_semenanalysisreport_list->TIME_FROM_PREP_TO_INSEM) ?>', 1);"><div id="elh_ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM" class="ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_semenanalysisreport_list->TIME_FROM_PREP_TO_INSEM->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_semenanalysisreport_list->TIME_FROM_PREP_TO_INSEM->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_semenanalysisreport_list->TIME_FROM_PREP_TO_INSEM->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$ivf_semenanalysisreport_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($ivf_semenanalysisreport_list->ExportAll && $ivf_semenanalysisreport_list->isExport()) {
	$ivf_semenanalysisreport_list->StopRecord = $ivf_semenanalysisreport_list->TotalRecords;
} else {

	// Set the last record to display
	if ($ivf_semenanalysisreport_list->TotalRecords > $ivf_semenanalysisreport_list->StartRecord + $ivf_semenanalysisreport_list->DisplayRecords - 1)
		$ivf_semenanalysisreport_list->StopRecord = $ivf_semenanalysisreport_list->StartRecord + $ivf_semenanalysisreport_list->DisplayRecords - 1;
	else
		$ivf_semenanalysisreport_list->StopRecord = $ivf_semenanalysisreport_list->TotalRecords;
}
$ivf_semenanalysisreport_list->RecordCount = $ivf_semenanalysisreport_list->StartRecord - 1;
if ($ivf_semenanalysisreport_list->Recordset && !$ivf_semenanalysisreport_list->Recordset->EOF) {
	$ivf_semenanalysisreport_list->Recordset->moveFirst();
	$selectLimit = $ivf_semenanalysisreport_list->UseSelectLimit;
	if (!$selectLimit && $ivf_semenanalysisreport_list->StartRecord > 1)
		$ivf_semenanalysisreport_list->Recordset->move($ivf_semenanalysisreport_list->StartRecord - 1);
} elseif (!$ivf_semenanalysisreport->AllowAddDeleteRow && $ivf_semenanalysisreport_list->StopRecord == 0) {
	$ivf_semenanalysisreport_list->StopRecord = $ivf_semenanalysisreport->GridAddRowCount;
}

// Initialize aggregate
$ivf_semenanalysisreport->RowType = ROWTYPE_AGGREGATEINIT;
$ivf_semenanalysisreport->resetAttributes();
$ivf_semenanalysisreport_list->renderRow();
while ($ivf_semenanalysisreport_list->RecordCount < $ivf_semenanalysisreport_list->StopRecord) {
	$ivf_semenanalysisreport_list->RecordCount++;
	if ($ivf_semenanalysisreport_list->RecordCount >= $ivf_semenanalysisreport_list->StartRecord) {
		$ivf_semenanalysisreport_list->RowCount++;

		// Set up key count
		$ivf_semenanalysisreport_list->KeyCount = $ivf_semenanalysisreport_list->RowIndex;

		// Init row class and style
		$ivf_semenanalysisreport->resetAttributes();
		$ivf_semenanalysisreport->CssClass = "";
		if ($ivf_semenanalysisreport_list->isGridAdd()) {
		} else {
			$ivf_semenanalysisreport_list->loadRowValues($ivf_semenanalysisreport_list->Recordset); // Load row values
		}
		$ivf_semenanalysisreport->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$ivf_semenanalysisreport->RowAttrs->merge(["data-rowindex" => $ivf_semenanalysisreport_list->RowCount, "id" => "r" . $ivf_semenanalysisreport_list->RowCount . "_ivf_semenanalysisreport", "data-rowtype" => $ivf_semenanalysisreport->RowType]);

		// Render row
		$ivf_semenanalysisreport_list->renderRow();

		// Render list options
		$ivf_semenanalysisreport_list->renderListOptions();
?>
	<tr <?php echo $ivf_semenanalysisreport->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_semenanalysisreport_list->ListOptions->render("body", "left", $ivf_semenanalysisreport_list->RowCount);
?>
	<?php if ($ivf_semenanalysisreport_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $ivf_semenanalysisreport_list->id->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_id">
<span<?php echo $ivf_semenanalysisreport_list->id->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->RIDNo->Visible) { // RIDNo ?>
		<td data-name="RIDNo" <?php echo $ivf_semenanalysisreport_list->RIDNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_RIDNo">
<span<?php echo $ivf_semenanalysisreport_list->RIDNo->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->RIDNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName" <?php echo $ivf_semenanalysisreport_list->PatientName->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_PatientName">
<span<?php echo $ivf_semenanalysisreport_list->PatientName->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->HusbandName->Visible) { // HusbandName ?>
		<td data-name="HusbandName" <?php echo $ivf_semenanalysisreport_list->HusbandName->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_HusbandName">
<span<?php echo $ivf_semenanalysisreport_list->HusbandName->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->HusbandName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->RequestDr->Visible) { // RequestDr ?>
		<td data-name="RequestDr" <?php echo $ivf_semenanalysisreport_list->RequestDr->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_RequestDr">
<span<?php echo $ivf_semenanalysisreport_list->RequestDr->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->RequestDr->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->CollectionDate->Visible) { // CollectionDate ?>
		<td data-name="CollectionDate" <?php echo $ivf_semenanalysisreport_list->CollectionDate->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_CollectionDate">
<span<?php echo $ivf_semenanalysisreport_list->CollectionDate->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->CollectionDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->ResultDate->Visible) { // ResultDate ?>
		<td data-name="ResultDate" <?php echo $ivf_semenanalysisreport_list->ResultDate->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_ResultDate">
<span<?php echo $ivf_semenanalysisreport_list->ResultDate->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->ResultDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->RequestSample->Visible) { // RequestSample ?>
		<td data-name="RequestSample" <?php echo $ivf_semenanalysisreport_list->RequestSample->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_RequestSample">
<span<?php echo $ivf_semenanalysisreport_list->RequestSample->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->RequestSample->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->CollectionType->Visible) { // CollectionType ?>
		<td data-name="CollectionType" <?php echo $ivf_semenanalysisreport_list->CollectionType->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_CollectionType">
<span<?php echo $ivf_semenanalysisreport_list->CollectionType->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->CollectionType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->CollectionMethod->Visible) { // CollectionMethod ?>
		<td data-name="CollectionMethod" <?php echo $ivf_semenanalysisreport_list->CollectionMethod->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_CollectionMethod">
<span<?php echo $ivf_semenanalysisreport_list->CollectionMethod->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->CollectionMethod->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->Medicationused->Visible) { // Medicationused ?>
		<td data-name="Medicationused" <?php echo $ivf_semenanalysisreport_list->Medicationused->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_Medicationused">
<span<?php echo $ivf_semenanalysisreport_list->Medicationused->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->Medicationused->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->DifficultiesinCollection->Visible) { // DifficultiesinCollection ?>
		<td data-name="DifficultiesinCollection" <?php echo $ivf_semenanalysisreport_list->DifficultiesinCollection->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_DifficultiesinCollection">
<span<?php echo $ivf_semenanalysisreport_list->DifficultiesinCollection->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->DifficultiesinCollection->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->pH->Visible) { // pH ?>
		<td data-name="pH" <?php echo $ivf_semenanalysisreport_list->pH->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_pH">
<span<?php echo $ivf_semenanalysisreport_list->pH->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->pH->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->Timeofcollection->Visible) { // Timeofcollection ?>
		<td data-name="Timeofcollection" <?php echo $ivf_semenanalysisreport_list->Timeofcollection->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_Timeofcollection">
<span<?php echo $ivf_semenanalysisreport_list->Timeofcollection->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->Timeofcollection->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->Timeofexamination->Visible) { // Timeofexamination ?>
		<td data-name="Timeofexamination" <?php echo $ivf_semenanalysisreport_list->Timeofexamination->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_Timeofexamination">
<span<?php echo $ivf_semenanalysisreport_list->Timeofexamination->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->Timeofexamination->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->Volume->Visible) { // Volume ?>
		<td data-name="Volume" <?php echo $ivf_semenanalysisreport_list->Volume->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_Volume">
<span<?php echo $ivf_semenanalysisreport_list->Volume->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->Volume->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->Concentration->Visible) { // Concentration ?>
		<td data-name="Concentration" <?php echo $ivf_semenanalysisreport_list->Concentration->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_Concentration">
<span<?php echo $ivf_semenanalysisreport_list->Concentration->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->Concentration->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->Total->Visible) { // Total ?>
		<td data-name="Total" <?php echo $ivf_semenanalysisreport_list->Total->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_Total">
<span<?php echo $ivf_semenanalysisreport_list->Total->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->Total->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->ProgressiveMotility->Visible) { // ProgressiveMotility ?>
		<td data-name="ProgressiveMotility" <?php echo $ivf_semenanalysisreport_list->ProgressiveMotility->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_ProgressiveMotility">
<span<?php echo $ivf_semenanalysisreport_list->ProgressiveMotility->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->ProgressiveMotility->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->NonProgrssiveMotile->Visible) { // NonProgrssiveMotile ?>
		<td data-name="NonProgrssiveMotile" <?php echo $ivf_semenanalysisreport_list->NonProgrssiveMotile->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_NonProgrssiveMotile">
<span<?php echo $ivf_semenanalysisreport_list->NonProgrssiveMotile->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->NonProgrssiveMotile->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->Immotile->Visible) { // Immotile ?>
		<td data-name="Immotile" <?php echo $ivf_semenanalysisreport_list->Immotile->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_Immotile">
<span<?php echo $ivf_semenanalysisreport_list->Immotile->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->Immotile->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->TotalProgrssiveMotile->Visible) { // TotalProgrssiveMotile ?>
		<td data-name="TotalProgrssiveMotile" <?php echo $ivf_semenanalysisreport_list->TotalProgrssiveMotile->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_TotalProgrssiveMotile">
<span<?php echo $ivf_semenanalysisreport_list->TotalProgrssiveMotile->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->TotalProgrssiveMotile->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->Appearance->Visible) { // Appearance ?>
		<td data-name="Appearance" <?php echo $ivf_semenanalysisreport_list->Appearance->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_Appearance">
<span<?php echo $ivf_semenanalysisreport_list->Appearance->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->Appearance->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->Homogenosity->Visible) { // Homogenosity ?>
		<td data-name="Homogenosity" <?php echo $ivf_semenanalysisreport_list->Homogenosity->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_Homogenosity">
<span<?php echo $ivf_semenanalysisreport_list->Homogenosity->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->Homogenosity->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->CompleteSample->Visible) { // CompleteSample ?>
		<td data-name="CompleteSample" <?php echo $ivf_semenanalysisreport_list->CompleteSample->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_CompleteSample">
<span<?php echo $ivf_semenanalysisreport_list->CompleteSample->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->CompleteSample->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->Liquefactiontime->Visible) { // Liquefactiontime ?>
		<td data-name="Liquefactiontime" <?php echo $ivf_semenanalysisreport_list->Liquefactiontime->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_Liquefactiontime">
<span<?php echo $ivf_semenanalysisreport_list->Liquefactiontime->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->Liquefactiontime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->Normal->Visible) { // Normal ?>
		<td data-name="Normal" <?php echo $ivf_semenanalysisreport_list->Normal->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_Normal">
<span<?php echo $ivf_semenanalysisreport_list->Normal->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->Normal->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->Abnormal->Visible) { // Abnormal ?>
		<td data-name="Abnormal" <?php echo $ivf_semenanalysisreport_list->Abnormal->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_Abnormal">
<span<?php echo $ivf_semenanalysisreport_list->Abnormal->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->Abnormal->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->Headdefects->Visible) { // Headdefects ?>
		<td data-name="Headdefects" <?php echo $ivf_semenanalysisreport_list->Headdefects->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_Headdefects">
<span<?php echo $ivf_semenanalysisreport_list->Headdefects->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->Headdefects->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->MidpieceDefects->Visible) { // MidpieceDefects ?>
		<td data-name="MidpieceDefects" <?php echo $ivf_semenanalysisreport_list->MidpieceDefects->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_MidpieceDefects">
<span<?php echo $ivf_semenanalysisreport_list->MidpieceDefects->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->MidpieceDefects->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->TailDefects->Visible) { // TailDefects ?>
		<td data-name="TailDefects" <?php echo $ivf_semenanalysisreport_list->TailDefects->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_TailDefects">
<span<?php echo $ivf_semenanalysisreport_list->TailDefects->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->TailDefects->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->NormalProgMotile->Visible) { // NormalProgMotile ?>
		<td data-name="NormalProgMotile" <?php echo $ivf_semenanalysisreport_list->NormalProgMotile->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_NormalProgMotile">
<span<?php echo $ivf_semenanalysisreport_list->NormalProgMotile->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->NormalProgMotile->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->ImmatureForms->Visible) { // ImmatureForms ?>
		<td data-name="ImmatureForms" <?php echo $ivf_semenanalysisreport_list->ImmatureForms->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_ImmatureForms">
<span<?php echo $ivf_semenanalysisreport_list->ImmatureForms->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->ImmatureForms->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->Leucocytes->Visible) { // Leucocytes ?>
		<td data-name="Leucocytes" <?php echo $ivf_semenanalysisreport_list->Leucocytes->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_Leucocytes">
<span<?php echo $ivf_semenanalysisreport_list->Leucocytes->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->Leucocytes->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->Agglutination->Visible) { // Agglutination ?>
		<td data-name="Agglutination" <?php echo $ivf_semenanalysisreport_list->Agglutination->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_Agglutination">
<span<?php echo $ivf_semenanalysisreport_list->Agglutination->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->Agglutination->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->Debris->Visible) { // Debris ?>
		<td data-name="Debris" <?php echo $ivf_semenanalysisreport_list->Debris->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_Debris">
<span<?php echo $ivf_semenanalysisreport_list->Debris->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->Debris->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->Diagnosis->Visible) { // Diagnosis ?>
		<td data-name="Diagnosis" <?php echo $ivf_semenanalysisreport_list->Diagnosis->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_Diagnosis">
<span<?php echo $ivf_semenanalysisreport_list->Diagnosis->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->Diagnosis->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->Observations->Visible) { // Observations ?>
		<td data-name="Observations" <?php echo $ivf_semenanalysisreport_list->Observations->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_Observations">
<span<?php echo $ivf_semenanalysisreport_list->Observations->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->Observations->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->Signature->Visible) { // Signature ?>
		<td data-name="Signature" <?php echo $ivf_semenanalysisreport_list->Signature->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_Signature">
<span<?php echo $ivf_semenanalysisreport_list->Signature->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->Signature->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->SemenOrgin->Visible) { // SemenOrgin ?>
		<td data-name="SemenOrgin" <?php echo $ivf_semenanalysisreport_list->SemenOrgin->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_SemenOrgin">
<span<?php echo $ivf_semenanalysisreport_list->SemenOrgin->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->SemenOrgin->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->Donor->Visible) { // Donor ?>
		<td data-name="Donor" <?php echo $ivf_semenanalysisreport_list->Donor->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_Donor">
<span<?php echo $ivf_semenanalysisreport_list->Donor->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->Donor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->DonorBloodgroup->Visible) { // DonorBloodgroup ?>
		<td data-name="DonorBloodgroup" <?php echo $ivf_semenanalysisreport_list->DonorBloodgroup->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_DonorBloodgroup">
<span<?php echo $ivf_semenanalysisreport_list->DonorBloodgroup->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->DonorBloodgroup->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->Tank->Visible) { // Tank ?>
		<td data-name="Tank" <?php echo $ivf_semenanalysisreport_list->Tank->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_Tank">
<span<?php echo $ivf_semenanalysisreport_list->Tank->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->Tank->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->Location->Visible) { // Location ?>
		<td data-name="Location" <?php echo $ivf_semenanalysisreport_list->Location->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_Location">
<span<?php echo $ivf_semenanalysisreport_list->Location->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->Location->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->Volume1->Visible) { // Volume1 ?>
		<td data-name="Volume1" <?php echo $ivf_semenanalysisreport_list->Volume1->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_Volume1">
<span<?php echo $ivf_semenanalysisreport_list->Volume1->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->Volume1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->Concentration1->Visible) { // Concentration1 ?>
		<td data-name="Concentration1" <?php echo $ivf_semenanalysisreport_list->Concentration1->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_Concentration1">
<span<?php echo $ivf_semenanalysisreport_list->Concentration1->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->Concentration1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->Total1->Visible) { // Total1 ?>
		<td data-name="Total1" <?php echo $ivf_semenanalysisreport_list->Total1->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_Total1">
<span<?php echo $ivf_semenanalysisreport_list->Total1->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->Total1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->ProgressiveMotility1->Visible) { // ProgressiveMotility1 ?>
		<td data-name="ProgressiveMotility1" <?php echo $ivf_semenanalysisreport_list->ProgressiveMotility1->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_ProgressiveMotility1">
<span<?php echo $ivf_semenanalysisreport_list->ProgressiveMotility1->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->ProgressiveMotility1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->NonProgrssiveMotile1->Visible) { // NonProgrssiveMotile1 ?>
		<td data-name="NonProgrssiveMotile1" <?php echo $ivf_semenanalysisreport_list->NonProgrssiveMotile1->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_NonProgrssiveMotile1">
<span<?php echo $ivf_semenanalysisreport_list->NonProgrssiveMotile1->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->NonProgrssiveMotile1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->Immotile1->Visible) { // Immotile1 ?>
		<td data-name="Immotile1" <?php echo $ivf_semenanalysisreport_list->Immotile1->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_Immotile1">
<span<?php echo $ivf_semenanalysisreport_list->Immotile1->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->Immotile1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->TotalProgrssiveMotile1->Visible) { // TotalProgrssiveMotile1 ?>
		<td data-name="TotalProgrssiveMotile1" <?php echo $ivf_semenanalysisreport_list->TotalProgrssiveMotile1->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_TotalProgrssiveMotile1">
<span<?php echo $ivf_semenanalysisreport_list->TotalProgrssiveMotile1->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->TotalProgrssiveMotile1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo" <?php echo $ivf_semenanalysisreport_list->TidNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_TidNo">
<span<?php echo $ivf_semenanalysisreport_list->TidNo->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->TidNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->Color->Visible) { // Color ?>
		<td data-name="Color" <?php echo $ivf_semenanalysisreport_list->Color->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_Color">
<span<?php echo $ivf_semenanalysisreport_list->Color->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->Color->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->DoneBy->Visible) { // DoneBy ?>
		<td data-name="DoneBy" <?php echo $ivf_semenanalysisreport_list->DoneBy->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_DoneBy">
<span<?php echo $ivf_semenanalysisreport_list->DoneBy->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->DoneBy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->Method->Visible) { // Method ?>
		<td data-name="Method" <?php echo $ivf_semenanalysisreport_list->Method->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_Method">
<span<?php echo $ivf_semenanalysisreport_list->Method->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->Method->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->Abstinence->Visible) { // Abstinence ?>
		<td data-name="Abstinence" <?php echo $ivf_semenanalysisreport_list->Abstinence->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_Abstinence">
<span<?php echo $ivf_semenanalysisreport_list->Abstinence->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->Abstinence->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->ProcessedBy->Visible) { // ProcessedBy ?>
		<td data-name="ProcessedBy" <?php echo $ivf_semenanalysisreport_list->ProcessedBy->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_ProcessedBy">
<span<?php echo $ivf_semenanalysisreport_list->ProcessedBy->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->ProcessedBy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->InseminationTime->Visible) { // InseminationTime ?>
		<td data-name="InseminationTime" <?php echo $ivf_semenanalysisreport_list->InseminationTime->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_InseminationTime">
<span<?php echo $ivf_semenanalysisreport_list->InseminationTime->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->InseminationTime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->InseminationBy->Visible) { // InseminationBy ?>
		<td data-name="InseminationBy" <?php echo $ivf_semenanalysisreport_list->InseminationBy->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_InseminationBy">
<span<?php echo $ivf_semenanalysisreport_list->InseminationBy->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->InseminationBy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->Big->Visible) { // Big ?>
		<td data-name="Big" <?php echo $ivf_semenanalysisreport_list->Big->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_Big">
<span<?php echo $ivf_semenanalysisreport_list->Big->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->Big->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->Medium->Visible) { // Medium ?>
		<td data-name="Medium" <?php echo $ivf_semenanalysisreport_list->Medium->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_Medium">
<span<?php echo $ivf_semenanalysisreport_list->Medium->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->Medium->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->Small->Visible) { // Small ?>
		<td data-name="Small" <?php echo $ivf_semenanalysisreport_list->Small->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_Small">
<span<?php echo $ivf_semenanalysisreport_list->Small->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->Small->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->NoHalo->Visible) { // NoHalo ?>
		<td data-name="NoHalo" <?php echo $ivf_semenanalysisreport_list->NoHalo->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_NoHalo">
<span<?php echo $ivf_semenanalysisreport_list->NoHalo->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->NoHalo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->Fragmented->Visible) { // Fragmented ?>
		<td data-name="Fragmented" <?php echo $ivf_semenanalysisreport_list->Fragmented->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_Fragmented">
<span<?php echo $ivf_semenanalysisreport_list->Fragmented->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->Fragmented->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->NonFragmented->Visible) { // NonFragmented ?>
		<td data-name="NonFragmented" <?php echo $ivf_semenanalysisreport_list->NonFragmented->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_NonFragmented">
<span<?php echo $ivf_semenanalysisreport_list->NonFragmented->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->NonFragmented->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->DFI->Visible) { // DFI ?>
		<td data-name="DFI" <?php echo $ivf_semenanalysisreport_list->DFI->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_DFI">
<span<?php echo $ivf_semenanalysisreport_list->DFI->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->DFI->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->IsueBy->Visible) { // IsueBy ?>
		<td data-name="IsueBy" <?php echo $ivf_semenanalysisreport_list->IsueBy->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_IsueBy">
<span<?php echo $ivf_semenanalysisreport_list->IsueBy->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->IsueBy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->Volume2->Visible) { // Volume2 ?>
		<td data-name="Volume2" <?php echo $ivf_semenanalysisreport_list->Volume2->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_Volume2">
<span<?php echo $ivf_semenanalysisreport_list->Volume2->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->Volume2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->Concentration2->Visible) { // Concentration2 ?>
		<td data-name="Concentration2" <?php echo $ivf_semenanalysisreport_list->Concentration2->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_Concentration2">
<span<?php echo $ivf_semenanalysisreport_list->Concentration2->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->Concentration2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->Total2->Visible) { // Total2 ?>
		<td data-name="Total2" <?php echo $ivf_semenanalysisreport_list->Total2->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_Total2">
<span<?php echo $ivf_semenanalysisreport_list->Total2->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->Total2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->ProgressiveMotility2->Visible) { // ProgressiveMotility2 ?>
		<td data-name="ProgressiveMotility2" <?php echo $ivf_semenanalysisreport_list->ProgressiveMotility2->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_ProgressiveMotility2">
<span<?php echo $ivf_semenanalysisreport_list->ProgressiveMotility2->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->ProgressiveMotility2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->NonProgrssiveMotile2->Visible) { // NonProgrssiveMotile2 ?>
		<td data-name="NonProgrssiveMotile2" <?php echo $ivf_semenanalysisreport_list->NonProgrssiveMotile2->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_NonProgrssiveMotile2">
<span<?php echo $ivf_semenanalysisreport_list->NonProgrssiveMotile2->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->NonProgrssiveMotile2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->Immotile2->Visible) { // Immotile2 ?>
		<td data-name="Immotile2" <?php echo $ivf_semenanalysisreport_list->Immotile2->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_Immotile2">
<span<?php echo $ivf_semenanalysisreport_list->Immotile2->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->Immotile2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->TotalProgrssiveMotile2->Visible) { // TotalProgrssiveMotile2 ?>
		<td data-name="TotalProgrssiveMotile2" <?php echo $ivf_semenanalysisreport_list->TotalProgrssiveMotile2->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_TotalProgrssiveMotile2">
<span<?php echo $ivf_semenanalysisreport_list->TotalProgrssiveMotile2->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->TotalProgrssiveMotile2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->IssuedBy->Visible) { // IssuedBy ?>
		<td data-name="IssuedBy" <?php echo $ivf_semenanalysisreport_list->IssuedBy->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_IssuedBy">
<span<?php echo $ivf_semenanalysisreport_list->IssuedBy->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->IssuedBy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->IssuedTo->Visible) { // IssuedTo ?>
		<td data-name="IssuedTo" <?php echo $ivf_semenanalysisreport_list->IssuedTo->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_IssuedTo">
<span<?php echo $ivf_semenanalysisreport_list->IssuedTo->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->IssuedTo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->PaID->Visible) { // PaID ?>
		<td data-name="PaID" <?php echo $ivf_semenanalysisreport_list->PaID->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_PaID">
<span<?php echo $ivf_semenanalysisreport_list->PaID->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->PaID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->PaName->Visible) { // PaName ?>
		<td data-name="PaName" <?php echo $ivf_semenanalysisreport_list->PaName->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_PaName">
<span<?php echo $ivf_semenanalysisreport_list->PaName->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->PaName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->PaMobile->Visible) { // PaMobile ?>
		<td data-name="PaMobile" <?php echo $ivf_semenanalysisreport_list->PaMobile->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_PaMobile">
<span<?php echo $ivf_semenanalysisreport_list->PaMobile->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->PaMobile->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->PartnerID->Visible) { // PartnerID ?>
		<td data-name="PartnerID" <?php echo $ivf_semenanalysisreport_list->PartnerID->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_PartnerID">
<span<?php echo $ivf_semenanalysisreport_list->PartnerID->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->PartnerID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->PartnerName->Visible) { // PartnerName ?>
		<td data-name="PartnerName" <?php echo $ivf_semenanalysisreport_list->PartnerName->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_PartnerName">
<span<?php echo $ivf_semenanalysisreport_list->PartnerName->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->PartnerName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->PartnerMobile->Visible) { // PartnerMobile ?>
		<td data-name="PartnerMobile" <?php echo $ivf_semenanalysisreport_list->PartnerMobile->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_PartnerMobile">
<span<?php echo $ivf_semenanalysisreport_list->PartnerMobile->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->PartnerMobile->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->PREG_TEST_DATE->Visible) { // PREG_TEST_DATE ?>
		<td data-name="PREG_TEST_DATE" <?php echo $ivf_semenanalysisreport_list->PREG_TEST_DATE->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_PREG_TEST_DATE">
<span<?php echo $ivf_semenanalysisreport_list->PREG_TEST_DATE->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->PREG_TEST_DATE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->SPECIFIC_PROBLEMS->Visible) { // SPECIFIC_PROBLEMS ?>
		<td data-name="SPECIFIC_PROBLEMS" <?php echo $ivf_semenanalysisreport_list->SPECIFIC_PROBLEMS->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_SPECIFIC_PROBLEMS">
<span<?php echo $ivf_semenanalysisreport_list->SPECIFIC_PROBLEMS->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->SPECIFIC_PROBLEMS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->IMSC_1->Visible) { // IMSC_1 ?>
		<td data-name="IMSC_1" <?php echo $ivf_semenanalysisreport_list->IMSC_1->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_IMSC_1">
<span<?php echo $ivf_semenanalysisreport_list->IMSC_1->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->IMSC_1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->IMSC_2->Visible) { // IMSC_2 ?>
		<td data-name="IMSC_2" <?php echo $ivf_semenanalysisreport_list->IMSC_2->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_IMSC_2">
<span<?php echo $ivf_semenanalysisreport_list->IMSC_2->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->IMSC_2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->LIQUIFACTION_STORAGE->Visible) { // LIQUIFACTION_STORAGE ?>
		<td data-name="LIQUIFACTION_STORAGE" <?php echo $ivf_semenanalysisreport_list->LIQUIFACTION_STORAGE->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_LIQUIFACTION_STORAGE">
<span<?php echo $ivf_semenanalysisreport_list->LIQUIFACTION_STORAGE->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->LIQUIFACTION_STORAGE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->IUI_PREP_METHOD->Visible) { // IUI_PREP_METHOD ?>
		<td data-name="IUI_PREP_METHOD" <?php echo $ivf_semenanalysisreport_list->IUI_PREP_METHOD->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_IUI_PREP_METHOD">
<span<?php echo $ivf_semenanalysisreport_list->IUI_PREP_METHOD->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->IUI_PREP_METHOD->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->TIME_FROM_TRIGGER->Visible) { // TIME_FROM_TRIGGER ?>
		<td data-name="TIME_FROM_TRIGGER" <?php echo $ivf_semenanalysisreport_list->TIME_FROM_TRIGGER->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_TIME_FROM_TRIGGER">
<span<?php echo $ivf_semenanalysisreport_list->TIME_FROM_TRIGGER->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->TIME_FROM_TRIGGER->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->COLLECTION_TO_PREPARATION->Visible) { // COLLECTION_TO_PREPARATION ?>
		<td data-name="COLLECTION_TO_PREPARATION" <?php echo $ivf_semenanalysisreport_list->COLLECTION_TO_PREPARATION->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_COLLECTION_TO_PREPARATION">
<span<?php echo $ivf_semenanalysisreport_list->COLLECTION_TO_PREPARATION->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->COLLECTION_TO_PREPARATION->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_semenanalysisreport_list->TIME_FROM_PREP_TO_INSEM->Visible) { // TIME_FROM_PREP_TO_INSEM ?>
		<td data-name="TIME_FROM_PREP_TO_INSEM" <?php echo $ivf_semenanalysisreport_list->TIME_FROM_PREP_TO_INSEM->cellAttributes() ?>>
<span id="el<?php echo $ivf_semenanalysisreport_list->RowCount ?>_ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM">
<span<?php echo $ivf_semenanalysisreport_list->TIME_FROM_PREP_TO_INSEM->viewAttributes() ?>><?php echo $ivf_semenanalysisreport_list->TIME_FROM_PREP_TO_INSEM->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_semenanalysisreport_list->ListOptions->render("body", "right", $ivf_semenanalysisreport_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$ivf_semenanalysisreport_list->isGridAdd())
		$ivf_semenanalysisreport_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$ivf_semenanalysisreport->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($ivf_semenanalysisreport_list->Recordset)
	$ivf_semenanalysisreport_list->Recordset->Close();
?>
<?php if (!$ivf_semenanalysisreport_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$ivf_semenanalysisreport_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $ivf_semenanalysisreport_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ivf_semenanalysisreport_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($ivf_semenanalysisreport_list->TotalRecords == 0 && !$ivf_semenanalysisreport->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $ivf_semenanalysisreport_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$ivf_semenanalysisreport_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$ivf_semenanalysisreport_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$ivf_semenanalysisreport->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_ivf_semenanalysisreport",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$ivf_semenanalysisreport_list->terminate();
?>