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
$ivf_oocytedenudation_list = new ivf_oocytedenudation_list();

// Run the page
$ivf_oocytedenudation_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_oocytedenudation_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$ivf_oocytedenudation_list->isExport()) { ?>
<script>
var fivf_oocytedenudationlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fivf_oocytedenudationlist = currentForm = new ew.Form("fivf_oocytedenudationlist", "list");
	fivf_oocytedenudationlist.formKeyCountName = '<?php echo $ivf_oocytedenudation_list->FormKeyCountName ?>';
	loadjs.done("fivf_oocytedenudationlist");
});
var fivf_oocytedenudationlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fivf_oocytedenudationlistsrch = currentSearchForm = new ew.Form("fivf_oocytedenudationlistsrch");

	// Dynamic selection lists
	// Filters

	fivf_oocytedenudationlistsrch.filterList = <?php echo $ivf_oocytedenudation_list->getFilterList() ?>;
	loadjs.done("fivf_oocytedenudationlistsrch");
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
<?php if (!$ivf_oocytedenudation_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($ivf_oocytedenudation_list->TotalRecords > 0 && $ivf_oocytedenudation_list->ExportOptions->visible()) { ?>
<?php $ivf_oocytedenudation_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_list->ImportOptions->visible()) { ?>
<?php $ivf_oocytedenudation_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_list->SearchOptions->visible()) { ?>
<?php $ivf_oocytedenudation_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_list->FilterOptions->visible()) { ?>
<?php $ivf_oocytedenudation_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$ivf_oocytedenudation_list->isExport() || Config("EXPORT_MASTER_RECORD") && $ivf_oocytedenudation_list->isExport("print")) { ?>
<?php
if ($ivf_oocytedenudation_list->DbMasterFilter != "" && $ivf_oocytedenudation->getCurrentMasterTable() == "view_ivf_treatment") {
	if ($ivf_oocytedenudation_list->MasterRecordExists) {
		include_once "view_ivf_treatmentmaster.php";
	}
}
?>
<?php } ?>
<?php
$ivf_oocytedenudation_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$ivf_oocytedenudation_list->isExport() && !$ivf_oocytedenudation->CurrentAction) { ?>
<form name="fivf_oocytedenudationlistsrch" id="fivf_oocytedenudationlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fivf_oocytedenudationlistsrch-search-panel" class="<?php echo $ivf_oocytedenudation_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="ivf_oocytedenudation">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $ivf_oocytedenudation_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($ivf_oocytedenudation_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($ivf_oocytedenudation_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $ivf_oocytedenudation_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($ivf_oocytedenudation_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($ivf_oocytedenudation_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($ivf_oocytedenudation_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($ivf_oocytedenudation_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $ivf_oocytedenudation_list->showPageHeader(); ?>
<?php
$ivf_oocytedenudation_list->showMessage();
?>
<?php if ($ivf_oocytedenudation_list->TotalRecords > 0 || $ivf_oocytedenudation->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($ivf_oocytedenudation_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf_oocytedenudation">
<?php if (!$ivf_oocytedenudation_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$ivf_oocytedenudation_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $ivf_oocytedenudation_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ivf_oocytedenudation_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fivf_oocytedenudationlist" id="fivf_oocytedenudationlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_oocytedenudation">
<?php if ($ivf_oocytedenudation->getCurrentMasterTable() == "view_ivf_treatment" && $ivf_oocytedenudation->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="view_ivf_treatment">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($ivf_oocytedenudation_list->TidNo->getSessionValue()) ?>">
<input type="hidden" name="fk_RIDNO" value="<?php echo HtmlEncode($ivf_oocytedenudation_list->RIDNo->getSessionValue()) ?>">
<input type="hidden" name="fk_Name" value="<?php echo HtmlEncode($ivf_oocytedenudation_list->Name->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_ivf_oocytedenudation" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($ivf_oocytedenudation_list->TotalRecords > 0 || $ivf_oocytedenudation_list->isGridEdit()) { ?>
<table id="tbl_ivf_oocytedenudationlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$ivf_oocytedenudation->RowType = ROWTYPE_HEADER;

// Render list options
$ivf_oocytedenudation_list->renderListOptions();

// Render list options (header, left)
$ivf_oocytedenudation_list->ListOptions->render("header", "left");
?>
<?php if ($ivf_oocytedenudation_list->id->Visible) { // id ?>
	<?php if ($ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $ivf_oocytedenudation_list->id->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_id" class="ivf_oocytedenudation_id"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $ivf_oocytedenudation_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->id) ?>', 1);"><div id="elh_ivf_oocytedenudation_id" class="ivf_oocytedenudation_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_list->RIDNo->Visible) { // RIDNo ?>
	<?php if ($ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->RIDNo) == "") { ?>
		<th data-name="RIDNo" class="<?php echo $ivf_oocytedenudation_list->RIDNo->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_RIDNo" class="ivf_oocytedenudation_RIDNo"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->RIDNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RIDNo" class="<?php echo $ivf_oocytedenudation_list->RIDNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->RIDNo) ?>', 1);"><div id="elh_ivf_oocytedenudation_RIDNo" class="ivf_oocytedenudation_RIDNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->RIDNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_list->RIDNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_list->RIDNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_list->Name->Visible) { // Name ?>
	<?php if ($ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->Name) == "") { ?>
		<th data-name="Name" class="<?php echo $ivf_oocytedenudation_list->Name->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_Name" class="ivf_oocytedenudation_Name"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Name" class="<?php echo $ivf_oocytedenudation_list->Name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->Name) ?>', 1);"><div id="elh_ivf_oocytedenudation_Name" class="ivf_oocytedenudation_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->Name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_list->Name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_list->Name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_list->ResultDate->Visible) { // ResultDate ?>
	<?php if ($ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->ResultDate) == "") { ?>
		<th data-name="ResultDate" class="<?php echo $ivf_oocytedenudation_list->ResultDate->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_ResultDate" class="ivf_oocytedenudation_ResultDate"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->ResultDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ResultDate" class="<?php echo $ivf_oocytedenudation_list->ResultDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->ResultDate) ?>', 1);"><div id="elh_ivf_oocytedenudation_ResultDate" class="ivf_oocytedenudation_ResultDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->ResultDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_list->ResultDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_list->ResultDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_list->Surgeon->Visible) { // Surgeon ?>
	<?php if ($ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->Surgeon) == "") { ?>
		<th data-name="Surgeon" class="<?php echo $ivf_oocytedenudation_list->Surgeon->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_Surgeon" class="ivf_oocytedenudation_Surgeon"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->Surgeon->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Surgeon" class="<?php echo $ivf_oocytedenudation_list->Surgeon->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->Surgeon) ?>', 1);"><div id="elh_ivf_oocytedenudation_Surgeon" class="ivf_oocytedenudation_Surgeon">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->Surgeon->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_list->Surgeon->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_list->Surgeon->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_list->AsstSurgeon->Visible) { // AsstSurgeon ?>
	<?php if ($ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->AsstSurgeon) == "") { ?>
		<th data-name="AsstSurgeon" class="<?php echo $ivf_oocytedenudation_list->AsstSurgeon->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_AsstSurgeon" class="ivf_oocytedenudation_AsstSurgeon"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->AsstSurgeon->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AsstSurgeon" class="<?php echo $ivf_oocytedenudation_list->AsstSurgeon->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->AsstSurgeon) ?>', 1);"><div id="elh_ivf_oocytedenudation_AsstSurgeon" class="ivf_oocytedenudation_AsstSurgeon">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->AsstSurgeon->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_list->AsstSurgeon->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_list->AsstSurgeon->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_list->Anaesthetist->Visible) { // Anaesthetist ?>
	<?php if ($ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->Anaesthetist) == "") { ?>
		<th data-name="Anaesthetist" class="<?php echo $ivf_oocytedenudation_list->Anaesthetist->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_Anaesthetist" class="ivf_oocytedenudation_Anaesthetist"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->Anaesthetist->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Anaesthetist" class="<?php echo $ivf_oocytedenudation_list->Anaesthetist->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->Anaesthetist) ?>', 1);"><div id="elh_ivf_oocytedenudation_Anaesthetist" class="ivf_oocytedenudation_Anaesthetist">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->Anaesthetist->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_list->Anaesthetist->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_list->Anaesthetist->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_list->AnaestheiaType->Visible) { // AnaestheiaType ?>
	<?php if ($ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->AnaestheiaType) == "") { ?>
		<th data-name="AnaestheiaType" class="<?php echo $ivf_oocytedenudation_list->AnaestheiaType->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_AnaestheiaType" class="ivf_oocytedenudation_AnaestheiaType"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->AnaestheiaType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AnaestheiaType" class="<?php echo $ivf_oocytedenudation_list->AnaestheiaType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->AnaestheiaType) ?>', 1);"><div id="elh_ivf_oocytedenudation_AnaestheiaType" class="ivf_oocytedenudation_AnaestheiaType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->AnaestheiaType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_list->AnaestheiaType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_list->AnaestheiaType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_list->PrimaryEmbryologist->Visible) { // PrimaryEmbryologist ?>
	<?php if ($ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->PrimaryEmbryologist) == "") { ?>
		<th data-name="PrimaryEmbryologist" class="<?php echo $ivf_oocytedenudation_list->PrimaryEmbryologist->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_PrimaryEmbryologist" class="ivf_oocytedenudation_PrimaryEmbryologist"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->PrimaryEmbryologist->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrimaryEmbryologist" class="<?php echo $ivf_oocytedenudation_list->PrimaryEmbryologist->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->PrimaryEmbryologist) ?>', 1);"><div id="elh_ivf_oocytedenudation_PrimaryEmbryologist" class="ivf_oocytedenudation_PrimaryEmbryologist">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->PrimaryEmbryologist->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_list->PrimaryEmbryologist->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_list->PrimaryEmbryologist->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_list->SecondaryEmbryologist->Visible) { // SecondaryEmbryologist ?>
	<?php if ($ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->SecondaryEmbryologist) == "") { ?>
		<th data-name="SecondaryEmbryologist" class="<?php echo $ivf_oocytedenudation_list->SecondaryEmbryologist->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_SecondaryEmbryologist" class="ivf_oocytedenudation_SecondaryEmbryologist"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->SecondaryEmbryologist->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SecondaryEmbryologist" class="<?php echo $ivf_oocytedenudation_list->SecondaryEmbryologist->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->SecondaryEmbryologist) ?>', 1);"><div id="elh_ivf_oocytedenudation_SecondaryEmbryologist" class="ivf_oocytedenudation_SecondaryEmbryologist">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->SecondaryEmbryologist->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_list->SecondaryEmbryologist->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_list->SecondaryEmbryologist->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_list->NoOfFolliclesRight->Visible) { // NoOfFolliclesRight ?>
	<?php if ($ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->NoOfFolliclesRight) == "") { ?>
		<th data-name="NoOfFolliclesRight" class="<?php echo $ivf_oocytedenudation_list->NoOfFolliclesRight->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_NoOfFolliclesRight" class="ivf_oocytedenudation_NoOfFolliclesRight"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->NoOfFolliclesRight->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoOfFolliclesRight" class="<?php echo $ivf_oocytedenudation_list->NoOfFolliclesRight->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->NoOfFolliclesRight) ?>', 1);"><div id="elh_ivf_oocytedenudation_NoOfFolliclesRight" class="ivf_oocytedenudation_NoOfFolliclesRight">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->NoOfFolliclesRight->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_list->NoOfFolliclesRight->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_list->NoOfFolliclesRight->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_list->NoOfFolliclesLeft->Visible) { // NoOfFolliclesLeft ?>
	<?php if ($ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->NoOfFolliclesLeft) == "") { ?>
		<th data-name="NoOfFolliclesLeft" class="<?php echo $ivf_oocytedenudation_list->NoOfFolliclesLeft->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_NoOfFolliclesLeft" class="ivf_oocytedenudation_NoOfFolliclesLeft"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->NoOfFolliclesLeft->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoOfFolliclesLeft" class="<?php echo $ivf_oocytedenudation_list->NoOfFolliclesLeft->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->NoOfFolliclesLeft) ?>', 1);"><div id="elh_ivf_oocytedenudation_NoOfFolliclesLeft" class="ivf_oocytedenudation_NoOfFolliclesLeft">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->NoOfFolliclesLeft->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_list->NoOfFolliclesLeft->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_list->NoOfFolliclesLeft->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_list->NoOfOocytes->Visible) { // NoOfOocytes ?>
	<?php if ($ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->NoOfOocytes) == "") { ?>
		<th data-name="NoOfOocytes" class="<?php echo $ivf_oocytedenudation_list->NoOfOocytes->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_NoOfOocytes" class="ivf_oocytedenudation_NoOfOocytes"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->NoOfOocytes->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoOfOocytes" class="<?php echo $ivf_oocytedenudation_list->NoOfOocytes->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->NoOfOocytes) ?>', 1);"><div id="elh_ivf_oocytedenudation_NoOfOocytes" class="ivf_oocytedenudation_NoOfOocytes">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->NoOfOocytes->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_list->NoOfOocytes->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_list->NoOfOocytes->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_list->RecordOocyteDenudation->Visible) { // RecordOocyteDenudation ?>
	<?php if ($ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->RecordOocyteDenudation) == "") { ?>
		<th data-name="RecordOocyteDenudation" class="<?php echo $ivf_oocytedenudation_list->RecordOocyteDenudation->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_RecordOocyteDenudation" class="ivf_oocytedenudation_RecordOocyteDenudation"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->RecordOocyteDenudation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RecordOocyteDenudation" class="<?php echo $ivf_oocytedenudation_list->RecordOocyteDenudation->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->RecordOocyteDenudation) ?>', 1);"><div id="elh_ivf_oocytedenudation_RecordOocyteDenudation" class="ivf_oocytedenudation_RecordOocyteDenudation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->RecordOocyteDenudation->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_list->RecordOocyteDenudation->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_list->RecordOocyteDenudation->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_list->DateOfDenudation->Visible) { // DateOfDenudation ?>
	<?php if ($ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->DateOfDenudation) == "") { ?>
		<th data-name="DateOfDenudation" class="<?php echo $ivf_oocytedenudation_list->DateOfDenudation->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_DateOfDenudation" class="ivf_oocytedenudation_DateOfDenudation"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->DateOfDenudation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DateOfDenudation" class="<?php echo $ivf_oocytedenudation_list->DateOfDenudation->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->DateOfDenudation) ?>', 1);"><div id="elh_ivf_oocytedenudation_DateOfDenudation" class="ivf_oocytedenudation_DateOfDenudation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->DateOfDenudation->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_list->DateOfDenudation->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_list->DateOfDenudation->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_list->DenudationDoneBy->Visible) { // DenudationDoneBy ?>
	<?php if ($ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->DenudationDoneBy) == "") { ?>
		<th data-name="DenudationDoneBy" class="<?php echo $ivf_oocytedenudation_list->DenudationDoneBy->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_DenudationDoneBy" class="ivf_oocytedenudation_DenudationDoneBy"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->DenudationDoneBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DenudationDoneBy" class="<?php echo $ivf_oocytedenudation_list->DenudationDoneBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->DenudationDoneBy) ?>', 1);"><div id="elh_ivf_oocytedenudation_DenudationDoneBy" class="ivf_oocytedenudation_DenudationDoneBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->DenudationDoneBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_list->DenudationDoneBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_list->DenudationDoneBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_list->status->Visible) { // status ?>
	<?php if ($ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->status) == "") { ?>
		<th data-name="status" class="<?php echo $ivf_oocytedenudation_list->status->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_status" class="ivf_oocytedenudation_status"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $ivf_oocytedenudation_list->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->status) ?>', 1);"><div id="elh_ivf_oocytedenudation_status" class="ivf_oocytedenudation_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_list->status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_list->status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_list->createdby->Visible) { // createdby ?>
	<?php if ($ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $ivf_oocytedenudation_list->createdby->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_createdby" class="ivf_oocytedenudation_createdby"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $ivf_oocytedenudation_list->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->createdby) ?>', 1);"><div id="elh_ivf_oocytedenudation_createdby" class="ivf_oocytedenudation_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_list->createdby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_list->createdby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_list->createddatetime->Visible) { // createddatetime ?>
	<?php if ($ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $ivf_oocytedenudation_list->createddatetime->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_createddatetime" class="ivf_oocytedenudation_createddatetime"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $ivf_oocytedenudation_list->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->createddatetime) ?>', 1);"><div id="elh_ivf_oocytedenudation_createddatetime" class="ivf_oocytedenudation_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_list->createddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_list->createddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_list->modifiedby->Visible) { // modifiedby ?>
	<?php if ($ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $ivf_oocytedenudation_list->modifiedby->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_modifiedby" class="ivf_oocytedenudation_modifiedby"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $ivf_oocytedenudation_list->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->modifiedby) ?>', 1);"><div id="elh_ivf_oocytedenudation_modifiedby" class="ivf_oocytedenudation_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_list->modifiedby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_list->modifiedby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_list->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $ivf_oocytedenudation_list->modifieddatetime->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_modifieddatetime" class="ivf_oocytedenudation_modifieddatetime"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $ivf_oocytedenudation_list->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->modifieddatetime) ?>', 1);"><div id="elh_ivf_oocytedenudation_modifieddatetime" class="ivf_oocytedenudation_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_list->modifieddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_list->modifieddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_list->TidNo->Visible) { // TidNo ?>
	<?php if ($ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->TidNo) == "") { ?>
		<th data-name="TidNo" class="<?php echo $ivf_oocytedenudation_list->TidNo->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_TidNo" class="ivf_oocytedenudation_TidNo"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->TidNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TidNo" class="<?php echo $ivf_oocytedenudation_list->TidNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->TidNo) ?>', 1);"><div id="elh_ivf_oocytedenudation_TidNo" class="ivf_oocytedenudation_TidNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->TidNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_list->TidNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_list->TidNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_list->ExpFollicles->Visible) { // ExpFollicles ?>
	<?php if ($ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->ExpFollicles) == "") { ?>
		<th data-name="ExpFollicles" class="<?php echo $ivf_oocytedenudation_list->ExpFollicles->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_ExpFollicles" class="ivf_oocytedenudation_ExpFollicles"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->ExpFollicles->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ExpFollicles" class="<?php echo $ivf_oocytedenudation_list->ExpFollicles->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->ExpFollicles) ?>', 1);"><div id="elh_ivf_oocytedenudation_ExpFollicles" class="ivf_oocytedenudation_ExpFollicles">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->ExpFollicles->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_list->ExpFollicles->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_list->ExpFollicles->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_list->SecondaryDenudationDoneBy->Visible) { // SecondaryDenudationDoneBy ?>
	<?php if ($ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->SecondaryDenudationDoneBy) == "") { ?>
		<th data-name="SecondaryDenudationDoneBy" class="<?php echo $ivf_oocytedenudation_list->SecondaryDenudationDoneBy->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_SecondaryDenudationDoneBy" class="ivf_oocytedenudation_SecondaryDenudationDoneBy"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->SecondaryDenudationDoneBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SecondaryDenudationDoneBy" class="<?php echo $ivf_oocytedenudation_list->SecondaryDenudationDoneBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->SecondaryDenudationDoneBy) ?>', 1);"><div id="elh_ivf_oocytedenudation_SecondaryDenudationDoneBy" class="ivf_oocytedenudation_SecondaryDenudationDoneBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->SecondaryDenudationDoneBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_list->SecondaryDenudationDoneBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_list->SecondaryDenudationDoneBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_list->OocyteOrgin->Visible) { // OocyteOrgin ?>
	<?php if ($ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->OocyteOrgin) == "") { ?>
		<th data-name="OocyteOrgin" class="<?php echo $ivf_oocytedenudation_list->OocyteOrgin->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_OocyteOrgin" class="ivf_oocytedenudation_OocyteOrgin"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->OocyteOrgin->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OocyteOrgin" class="<?php echo $ivf_oocytedenudation_list->OocyteOrgin->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->OocyteOrgin) ?>', 1);"><div id="elh_ivf_oocytedenudation_OocyteOrgin" class="ivf_oocytedenudation_OocyteOrgin">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->OocyteOrgin->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_list->OocyteOrgin->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_list->OocyteOrgin->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_list->patient1->Visible) { // patient1 ?>
	<?php if ($ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->patient1) == "") { ?>
		<th data-name="patient1" class="<?php echo $ivf_oocytedenudation_list->patient1->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_patient1" class="ivf_oocytedenudation_patient1"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->patient1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patient1" class="<?php echo $ivf_oocytedenudation_list->patient1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->patient1) ?>', 1);"><div id="elh_ivf_oocytedenudation_patient1" class="ivf_oocytedenudation_patient1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->patient1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_list->patient1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_list->patient1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_list->OocyteType->Visible) { // OocyteType ?>
	<?php if ($ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->OocyteType) == "") { ?>
		<th data-name="OocyteType" class="<?php echo $ivf_oocytedenudation_list->OocyteType->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_OocyteType" class="ivf_oocytedenudation_OocyteType"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->OocyteType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OocyteType" class="<?php echo $ivf_oocytedenudation_list->OocyteType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->OocyteType) ?>', 1);"><div id="elh_ivf_oocytedenudation_OocyteType" class="ivf_oocytedenudation_OocyteType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->OocyteType->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_list->OocyteType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_list->OocyteType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_list->MIOocytesDonate1->Visible) { // MIOocytesDonate1 ?>
	<?php if ($ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->MIOocytesDonate1) == "") { ?>
		<th data-name="MIOocytesDonate1" class="<?php echo $ivf_oocytedenudation_list->MIOocytesDonate1->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_MIOocytesDonate1" class="ivf_oocytedenudation_MIOocytesDonate1"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->MIOocytesDonate1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MIOocytesDonate1" class="<?php echo $ivf_oocytedenudation_list->MIOocytesDonate1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->MIOocytesDonate1) ?>', 1);"><div id="elh_ivf_oocytedenudation_MIOocytesDonate1" class="ivf_oocytedenudation_MIOocytesDonate1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->MIOocytesDonate1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_list->MIOocytesDonate1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_list->MIOocytesDonate1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_list->MIOocytesDonate2->Visible) { // MIOocytesDonate2 ?>
	<?php if ($ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->MIOocytesDonate2) == "") { ?>
		<th data-name="MIOocytesDonate2" class="<?php echo $ivf_oocytedenudation_list->MIOocytesDonate2->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_MIOocytesDonate2" class="ivf_oocytedenudation_MIOocytesDonate2"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->MIOocytesDonate2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MIOocytesDonate2" class="<?php echo $ivf_oocytedenudation_list->MIOocytesDonate2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->MIOocytesDonate2) ?>', 1);"><div id="elh_ivf_oocytedenudation_MIOocytesDonate2" class="ivf_oocytedenudation_MIOocytesDonate2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->MIOocytesDonate2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_list->MIOocytesDonate2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_list->MIOocytesDonate2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_list->SelfMI->Visible) { // SelfMI ?>
	<?php if ($ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->SelfMI) == "") { ?>
		<th data-name="SelfMI" class="<?php echo $ivf_oocytedenudation_list->SelfMI->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_SelfMI" class="ivf_oocytedenudation_SelfMI"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->SelfMI->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SelfMI" class="<?php echo $ivf_oocytedenudation_list->SelfMI->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->SelfMI) ?>', 1);"><div id="elh_ivf_oocytedenudation_SelfMI" class="ivf_oocytedenudation_SelfMI">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->SelfMI->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_list->SelfMI->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_list->SelfMI->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_list->SelfMII->Visible) { // SelfMII ?>
	<?php if ($ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->SelfMII) == "") { ?>
		<th data-name="SelfMII" class="<?php echo $ivf_oocytedenudation_list->SelfMII->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_SelfMII" class="ivf_oocytedenudation_SelfMII"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->SelfMII->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SelfMII" class="<?php echo $ivf_oocytedenudation_list->SelfMII->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->SelfMII) ?>', 1);"><div id="elh_ivf_oocytedenudation_SelfMII" class="ivf_oocytedenudation_SelfMII">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->SelfMII->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_list->SelfMII->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_list->SelfMII->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_list->patient3->Visible) { // patient3 ?>
	<?php if ($ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->patient3) == "") { ?>
		<th data-name="patient3" class="<?php echo $ivf_oocytedenudation_list->patient3->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_patient3" class="ivf_oocytedenudation_patient3"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->patient3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patient3" class="<?php echo $ivf_oocytedenudation_list->patient3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->patient3) ?>', 1);"><div id="elh_ivf_oocytedenudation_patient3" class="ivf_oocytedenudation_patient3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->patient3->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_list->patient3->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_list->patient3->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_list->patient4->Visible) { // patient4 ?>
	<?php if ($ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->patient4) == "") { ?>
		<th data-name="patient4" class="<?php echo $ivf_oocytedenudation_list->patient4->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_patient4" class="ivf_oocytedenudation_patient4"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->patient4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patient4" class="<?php echo $ivf_oocytedenudation_list->patient4->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->patient4) ?>', 1);"><div id="elh_ivf_oocytedenudation_patient4" class="ivf_oocytedenudation_patient4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->patient4->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_list->patient4->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_list->patient4->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_list->OocytesDonate3->Visible) { // OocytesDonate3 ?>
	<?php if ($ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->OocytesDonate3) == "") { ?>
		<th data-name="OocytesDonate3" class="<?php echo $ivf_oocytedenudation_list->OocytesDonate3->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_OocytesDonate3" class="ivf_oocytedenudation_OocytesDonate3"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->OocytesDonate3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OocytesDonate3" class="<?php echo $ivf_oocytedenudation_list->OocytesDonate3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->OocytesDonate3) ?>', 1);"><div id="elh_ivf_oocytedenudation_OocytesDonate3" class="ivf_oocytedenudation_OocytesDonate3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->OocytesDonate3->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_list->OocytesDonate3->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_list->OocytesDonate3->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_list->OocytesDonate4->Visible) { // OocytesDonate4 ?>
	<?php if ($ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->OocytesDonate4) == "") { ?>
		<th data-name="OocytesDonate4" class="<?php echo $ivf_oocytedenudation_list->OocytesDonate4->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_OocytesDonate4" class="ivf_oocytedenudation_OocytesDonate4"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->OocytesDonate4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OocytesDonate4" class="<?php echo $ivf_oocytedenudation_list->OocytesDonate4->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->OocytesDonate4) ?>', 1);"><div id="elh_ivf_oocytedenudation_OocytesDonate4" class="ivf_oocytedenudation_OocytesDonate4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->OocytesDonate4->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_list->OocytesDonate4->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_list->OocytesDonate4->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_list->MIOocytesDonate3->Visible) { // MIOocytesDonate3 ?>
	<?php if ($ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->MIOocytesDonate3) == "") { ?>
		<th data-name="MIOocytesDonate3" class="<?php echo $ivf_oocytedenudation_list->MIOocytesDonate3->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_MIOocytesDonate3" class="ivf_oocytedenudation_MIOocytesDonate3"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->MIOocytesDonate3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MIOocytesDonate3" class="<?php echo $ivf_oocytedenudation_list->MIOocytesDonate3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->MIOocytesDonate3) ?>', 1);"><div id="elh_ivf_oocytedenudation_MIOocytesDonate3" class="ivf_oocytedenudation_MIOocytesDonate3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->MIOocytesDonate3->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_list->MIOocytesDonate3->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_list->MIOocytesDonate3->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_list->MIOocytesDonate4->Visible) { // MIOocytesDonate4 ?>
	<?php if ($ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->MIOocytesDonate4) == "") { ?>
		<th data-name="MIOocytesDonate4" class="<?php echo $ivf_oocytedenudation_list->MIOocytesDonate4->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_MIOocytesDonate4" class="ivf_oocytedenudation_MIOocytesDonate4"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->MIOocytesDonate4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MIOocytesDonate4" class="<?php echo $ivf_oocytedenudation_list->MIOocytesDonate4->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->MIOocytesDonate4) ?>', 1);"><div id="elh_ivf_oocytedenudation_MIOocytesDonate4" class="ivf_oocytedenudation_MIOocytesDonate4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->MIOocytesDonate4->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_list->MIOocytesDonate4->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_list->MIOocytesDonate4->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_list->SelfOocytesMI->Visible) { // SelfOocytesMI ?>
	<?php if ($ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->SelfOocytesMI) == "") { ?>
		<th data-name="SelfOocytesMI" class="<?php echo $ivf_oocytedenudation_list->SelfOocytesMI->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_SelfOocytesMI" class="ivf_oocytedenudation_SelfOocytesMI"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->SelfOocytesMI->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SelfOocytesMI" class="<?php echo $ivf_oocytedenudation_list->SelfOocytesMI->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->SelfOocytesMI) ?>', 1);"><div id="elh_ivf_oocytedenudation_SelfOocytesMI" class="ivf_oocytedenudation_SelfOocytesMI">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->SelfOocytesMI->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_list->SelfOocytesMI->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_list->SelfOocytesMI->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_list->SelfOocytesMII->Visible) { // SelfOocytesMII ?>
	<?php if ($ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->SelfOocytesMII) == "") { ?>
		<th data-name="SelfOocytesMII" class="<?php echo $ivf_oocytedenudation_list->SelfOocytesMII->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_SelfOocytesMII" class="ivf_oocytedenudation_SelfOocytesMII"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->SelfOocytesMII->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SelfOocytesMII" class="<?php echo $ivf_oocytedenudation_list->SelfOocytesMII->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_oocytedenudation_list->SortUrl($ivf_oocytedenudation_list->SelfOocytesMII) ?>', 1);"><div id="elh_ivf_oocytedenudation_SelfOocytesMII" class="ivf_oocytedenudation_SelfOocytesMII">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_list->SelfOocytesMII->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_list->SelfOocytesMII->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_list->SelfOocytesMII->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$ivf_oocytedenudation_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($ivf_oocytedenudation_list->ExportAll && $ivf_oocytedenudation_list->isExport()) {
	$ivf_oocytedenudation_list->StopRecord = $ivf_oocytedenudation_list->TotalRecords;
} else {

	// Set the last record to display
	if ($ivf_oocytedenudation_list->TotalRecords > $ivf_oocytedenudation_list->StartRecord + $ivf_oocytedenudation_list->DisplayRecords - 1)
		$ivf_oocytedenudation_list->StopRecord = $ivf_oocytedenudation_list->StartRecord + $ivf_oocytedenudation_list->DisplayRecords - 1;
	else
		$ivf_oocytedenudation_list->StopRecord = $ivf_oocytedenudation_list->TotalRecords;
}
$ivf_oocytedenudation_list->RecordCount = $ivf_oocytedenudation_list->StartRecord - 1;
if ($ivf_oocytedenudation_list->Recordset && !$ivf_oocytedenudation_list->Recordset->EOF) {
	$ivf_oocytedenudation_list->Recordset->moveFirst();
	$selectLimit = $ivf_oocytedenudation_list->UseSelectLimit;
	if (!$selectLimit && $ivf_oocytedenudation_list->StartRecord > 1)
		$ivf_oocytedenudation_list->Recordset->move($ivf_oocytedenudation_list->StartRecord - 1);
} elseif (!$ivf_oocytedenudation->AllowAddDeleteRow && $ivf_oocytedenudation_list->StopRecord == 0) {
	$ivf_oocytedenudation_list->StopRecord = $ivf_oocytedenudation->GridAddRowCount;
}

// Initialize aggregate
$ivf_oocytedenudation->RowType = ROWTYPE_AGGREGATEINIT;
$ivf_oocytedenudation->resetAttributes();
$ivf_oocytedenudation_list->renderRow();
while ($ivf_oocytedenudation_list->RecordCount < $ivf_oocytedenudation_list->StopRecord) {
	$ivf_oocytedenudation_list->RecordCount++;
	if ($ivf_oocytedenudation_list->RecordCount >= $ivf_oocytedenudation_list->StartRecord) {
		$ivf_oocytedenudation_list->RowCount++;

		// Set up key count
		$ivf_oocytedenudation_list->KeyCount = $ivf_oocytedenudation_list->RowIndex;

		// Init row class and style
		$ivf_oocytedenudation->resetAttributes();
		$ivf_oocytedenudation->CssClass = "";
		if ($ivf_oocytedenudation_list->isGridAdd()) {
		} else {
			$ivf_oocytedenudation_list->loadRowValues($ivf_oocytedenudation_list->Recordset); // Load row values
		}
		$ivf_oocytedenudation->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$ivf_oocytedenudation->RowAttrs->merge(["data-rowindex" => $ivf_oocytedenudation_list->RowCount, "id" => "r" . $ivf_oocytedenudation_list->RowCount . "_ivf_oocytedenudation", "data-rowtype" => $ivf_oocytedenudation->RowType]);

		// Render row
		$ivf_oocytedenudation_list->renderRow();

		// Render list options
		$ivf_oocytedenudation_list->renderListOptions();
?>
	<tr <?php echo $ivf_oocytedenudation->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_oocytedenudation_list->ListOptions->render("body", "left", $ivf_oocytedenudation_list->RowCount);
?>
	<?php if ($ivf_oocytedenudation_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $ivf_oocytedenudation_list->id->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCount ?>_ivf_oocytedenudation_id">
<span<?php echo $ivf_oocytedenudation_list->id->viewAttributes() ?>><?php echo $ivf_oocytedenudation_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_list->RIDNo->Visible) { // RIDNo ?>
		<td data-name="RIDNo" <?php echo $ivf_oocytedenudation_list->RIDNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCount ?>_ivf_oocytedenudation_RIDNo">
<span<?php echo $ivf_oocytedenudation_list->RIDNo->viewAttributes() ?>><?php echo $ivf_oocytedenudation_list->RIDNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_list->Name->Visible) { // Name ?>
		<td data-name="Name" <?php echo $ivf_oocytedenudation_list->Name->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCount ?>_ivf_oocytedenudation_Name">
<span<?php echo $ivf_oocytedenudation_list->Name->viewAttributes() ?>><?php echo $ivf_oocytedenudation_list->Name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_list->ResultDate->Visible) { // ResultDate ?>
		<td data-name="ResultDate" <?php echo $ivf_oocytedenudation_list->ResultDate->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCount ?>_ivf_oocytedenudation_ResultDate">
<span<?php echo $ivf_oocytedenudation_list->ResultDate->viewAttributes() ?>><?php echo $ivf_oocytedenudation_list->ResultDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_list->Surgeon->Visible) { // Surgeon ?>
		<td data-name="Surgeon" <?php echo $ivf_oocytedenudation_list->Surgeon->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCount ?>_ivf_oocytedenudation_Surgeon">
<span<?php echo $ivf_oocytedenudation_list->Surgeon->viewAttributes() ?>><?php echo $ivf_oocytedenudation_list->Surgeon->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_list->AsstSurgeon->Visible) { // AsstSurgeon ?>
		<td data-name="AsstSurgeon" <?php echo $ivf_oocytedenudation_list->AsstSurgeon->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCount ?>_ivf_oocytedenudation_AsstSurgeon">
<span<?php echo $ivf_oocytedenudation_list->AsstSurgeon->viewAttributes() ?>><?php echo $ivf_oocytedenudation_list->AsstSurgeon->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_list->Anaesthetist->Visible) { // Anaesthetist ?>
		<td data-name="Anaesthetist" <?php echo $ivf_oocytedenudation_list->Anaesthetist->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCount ?>_ivf_oocytedenudation_Anaesthetist">
<span<?php echo $ivf_oocytedenudation_list->Anaesthetist->viewAttributes() ?>><?php echo $ivf_oocytedenudation_list->Anaesthetist->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_list->AnaestheiaType->Visible) { // AnaestheiaType ?>
		<td data-name="AnaestheiaType" <?php echo $ivf_oocytedenudation_list->AnaestheiaType->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCount ?>_ivf_oocytedenudation_AnaestheiaType">
<span<?php echo $ivf_oocytedenudation_list->AnaestheiaType->viewAttributes() ?>><?php echo $ivf_oocytedenudation_list->AnaestheiaType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_list->PrimaryEmbryologist->Visible) { // PrimaryEmbryologist ?>
		<td data-name="PrimaryEmbryologist" <?php echo $ivf_oocytedenudation_list->PrimaryEmbryologist->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCount ?>_ivf_oocytedenudation_PrimaryEmbryologist">
<span<?php echo $ivf_oocytedenudation_list->PrimaryEmbryologist->viewAttributes() ?>><?php echo $ivf_oocytedenudation_list->PrimaryEmbryologist->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_list->SecondaryEmbryologist->Visible) { // SecondaryEmbryologist ?>
		<td data-name="SecondaryEmbryologist" <?php echo $ivf_oocytedenudation_list->SecondaryEmbryologist->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCount ?>_ivf_oocytedenudation_SecondaryEmbryologist">
<span<?php echo $ivf_oocytedenudation_list->SecondaryEmbryologist->viewAttributes() ?>><?php echo $ivf_oocytedenudation_list->SecondaryEmbryologist->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_list->NoOfFolliclesRight->Visible) { // NoOfFolliclesRight ?>
		<td data-name="NoOfFolliclesRight" <?php echo $ivf_oocytedenudation_list->NoOfFolliclesRight->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCount ?>_ivf_oocytedenudation_NoOfFolliclesRight">
<span<?php echo $ivf_oocytedenudation_list->NoOfFolliclesRight->viewAttributes() ?>><?php echo $ivf_oocytedenudation_list->NoOfFolliclesRight->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_list->NoOfFolliclesLeft->Visible) { // NoOfFolliclesLeft ?>
		<td data-name="NoOfFolliclesLeft" <?php echo $ivf_oocytedenudation_list->NoOfFolliclesLeft->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCount ?>_ivf_oocytedenudation_NoOfFolliclesLeft">
<span<?php echo $ivf_oocytedenudation_list->NoOfFolliclesLeft->viewAttributes() ?>><?php echo $ivf_oocytedenudation_list->NoOfFolliclesLeft->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_list->NoOfOocytes->Visible) { // NoOfOocytes ?>
		<td data-name="NoOfOocytes" <?php echo $ivf_oocytedenudation_list->NoOfOocytes->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCount ?>_ivf_oocytedenudation_NoOfOocytes">
<span<?php echo $ivf_oocytedenudation_list->NoOfOocytes->viewAttributes() ?>><?php echo $ivf_oocytedenudation_list->NoOfOocytes->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_list->RecordOocyteDenudation->Visible) { // RecordOocyteDenudation ?>
		<td data-name="RecordOocyteDenudation" <?php echo $ivf_oocytedenudation_list->RecordOocyteDenudation->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCount ?>_ivf_oocytedenudation_RecordOocyteDenudation">
<span<?php echo $ivf_oocytedenudation_list->RecordOocyteDenudation->viewAttributes() ?>><?php echo $ivf_oocytedenudation_list->RecordOocyteDenudation->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_list->DateOfDenudation->Visible) { // DateOfDenudation ?>
		<td data-name="DateOfDenudation" <?php echo $ivf_oocytedenudation_list->DateOfDenudation->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCount ?>_ivf_oocytedenudation_DateOfDenudation">
<span<?php echo $ivf_oocytedenudation_list->DateOfDenudation->viewAttributes() ?>><?php echo $ivf_oocytedenudation_list->DateOfDenudation->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_list->DenudationDoneBy->Visible) { // DenudationDoneBy ?>
		<td data-name="DenudationDoneBy" <?php echo $ivf_oocytedenudation_list->DenudationDoneBy->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCount ?>_ivf_oocytedenudation_DenudationDoneBy">
<span<?php echo $ivf_oocytedenudation_list->DenudationDoneBy->viewAttributes() ?>><?php echo $ivf_oocytedenudation_list->DenudationDoneBy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_list->status->Visible) { // status ?>
		<td data-name="status" <?php echo $ivf_oocytedenudation_list->status->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCount ?>_ivf_oocytedenudation_status">
<span<?php echo $ivf_oocytedenudation_list->status->viewAttributes() ?>><?php echo $ivf_oocytedenudation_list->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_list->createdby->Visible) { // createdby ?>
		<td data-name="createdby" <?php echo $ivf_oocytedenudation_list->createdby->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCount ?>_ivf_oocytedenudation_createdby">
<span<?php echo $ivf_oocytedenudation_list->createdby->viewAttributes() ?>><?php echo $ivf_oocytedenudation_list->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_list->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" <?php echo $ivf_oocytedenudation_list->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCount ?>_ivf_oocytedenudation_createddatetime">
<span<?php echo $ivf_oocytedenudation_list->createddatetime->viewAttributes() ?>><?php echo $ivf_oocytedenudation_list->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_list->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby" <?php echo $ivf_oocytedenudation_list->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCount ?>_ivf_oocytedenudation_modifiedby">
<span<?php echo $ivf_oocytedenudation_list->modifiedby->viewAttributes() ?>><?php echo $ivf_oocytedenudation_list->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_list->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime" <?php echo $ivf_oocytedenudation_list->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCount ?>_ivf_oocytedenudation_modifieddatetime">
<span<?php echo $ivf_oocytedenudation_list->modifieddatetime->viewAttributes() ?>><?php echo $ivf_oocytedenudation_list->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_list->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo" <?php echo $ivf_oocytedenudation_list->TidNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCount ?>_ivf_oocytedenudation_TidNo">
<span<?php echo $ivf_oocytedenudation_list->TidNo->viewAttributes() ?>><?php echo $ivf_oocytedenudation_list->TidNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_list->ExpFollicles->Visible) { // ExpFollicles ?>
		<td data-name="ExpFollicles" <?php echo $ivf_oocytedenudation_list->ExpFollicles->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCount ?>_ivf_oocytedenudation_ExpFollicles">
<span<?php echo $ivf_oocytedenudation_list->ExpFollicles->viewAttributes() ?>><?php echo $ivf_oocytedenudation_list->ExpFollicles->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_list->SecondaryDenudationDoneBy->Visible) { // SecondaryDenudationDoneBy ?>
		<td data-name="SecondaryDenudationDoneBy" <?php echo $ivf_oocytedenudation_list->SecondaryDenudationDoneBy->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCount ?>_ivf_oocytedenudation_SecondaryDenudationDoneBy">
<span<?php echo $ivf_oocytedenudation_list->SecondaryDenudationDoneBy->viewAttributes() ?>><?php echo $ivf_oocytedenudation_list->SecondaryDenudationDoneBy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_list->OocyteOrgin->Visible) { // OocyteOrgin ?>
		<td data-name="OocyteOrgin" <?php echo $ivf_oocytedenudation_list->OocyteOrgin->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCount ?>_ivf_oocytedenudation_OocyteOrgin">
<span<?php echo $ivf_oocytedenudation_list->OocyteOrgin->viewAttributes() ?>><?php echo $ivf_oocytedenudation_list->OocyteOrgin->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_list->patient1->Visible) { // patient1 ?>
		<td data-name="patient1" <?php echo $ivf_oocytedenudation_list->patient1->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCount ?>_ivf_oocytedenudation_patient1">
<span<?php echo $ivf_oocytedenudation_list->patient1->viewAttributes() ?>><?php echo $ivf_oocytedenudation_list->patient1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_list->OocyteType->Visible) { // OocyteType ?>
		<td data-name="OocyteType" <?php echo $ivf_oocytedenudation_list->OocyteType->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCount ?>_ivf_oocytedenudation_OocyteType">
<span<?php echo $ivf_oocytedenudation_list->OocyteType->viewAttributes() ?>><?php echo $ivf_oocytedenudation_list->OocyteType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_list->MIOocytesDonate1->Visible) { // MIOocytesDonate1 ?>
		<td data-name="MIOocytesDonate1" <?php echo $ivf_oocytedenudation_list->MIOocytesDonate1->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCount ?>_ivf_oocytedenudation_MIOocytesDonate1">
<span<?php echo $ivf_oocytedenudation_list->MIOocytesDonate1->viewAttributes() ?>><?php echo $ivf_oocytedenudation_list->MIOocytesDonate1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_list->MIOocytesDonate2->Visible) { // MIOocytesDonate2 ?>
		<td data-name="MIOocytesDonate2" <?php echo $ivf_oocytedenudation_list->MIOocytesDonate2->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCount ?>_ivf_oocytedenudation_MIOocytesDonate2">
<span<?php echo $ivf_oocytedenudation_list->MIOocytesDonate2->viewAttributes() ?>><?php echo $ivf_oocytedenudation_list->MIOocytesDonate2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_list->SelfMI->Visible) { // SelfMI ?>
		<td data-name="SelfMI" <?php echo $ivf_oocytedenudation_list->SelfMI->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCount ?>_ivf_oocytedenudation_SelfMI">
<span<?php echo $ivf_oocytedenudation_list->SelfMI->viewAttributes() ?>><?php echo $ivf_oocytedenudation_list->SelfMI->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_list->SelfMII->Visible) { // SelfMII ?>
		<td data-name="SelfMII" <?php echo $ivf_oocytedenudation_list->SelfMII->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCount ?>_ivf_oocytedenudation_SelfMII">
<span<?php echo $ivf_oocytedenudation_list->SelfMII->viewAttributes() ?>><?php echo $ivf_oocytedenudation_list->SelfMII->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_list->patient3->Visible) { // patient3 ?>
		<td data-name="patient3" <?php echo $ivf_oocytedenudation_list->patient3->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCount ?>_ivf_oocytedenudation_patient3">
<span<?php echo $ivf_oocytedenudation_list->patient3->viewAttributes() ?>><?php echo $ivf_oocytedenudation_list->patient3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_list->patient4->Visible) { // patient4 ?>
		<td data-name="patient4" <?php echo $ivf_oocytedenudation_list->patient4->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCount ?>_ivf_oocytedenudation_patient4">
<span<?php echo $ivf_oocytedenudation_list->patient4->viewAttributes() ?>><?php echo $ivf_oocytedenudation_list->patient4->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_list->OocytesDonate3->Visible) { // OocytesDonate3 ?>
		<td data-name="OocytesDonate3" <?php echo $ivf_oocytedenudation_list->OocytesDonate3->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCount ?>_ivf_oocytedenudation_OocytesDonate3">
<span<?php echo $ivf_oocytedenudation_list->OocytesDonate3->viewAttributes() ?>><?php echo $ivf_oocytedenudation_list->OocytesDonate3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_list->OocytesDonate4->Visible) { // OocytesDonate4 ?>
		<td data-name="OocytesDonate4" <?php echo $ivf_oocytedenudation_list->OocytesDonate4->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCount ?>_ivf_oocytedenudation_OocytesDonate4">
<span<?php echo $ivf_oocytedenudation_list->OocytesDonate4->viewAttributes() ?>><?php echo $ivf_oocytedenudation_list->OocytesDonate4->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_list->MIOocytesDonate3->Visible) { // MIOocytesDonate3 ?>
		<td data-name="MIOocytesDonate3" <?php echo $ivf_oocytedenudation_list->MIOocytesDonate3->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCount ?>_ivf_oocytedenudation_MIOocytesDonate3">
<span<?php echo $ivf_oocytedenudation_list->MIOocytesDonate3->viewAttributes() ?>><?php echo $ivf_oocytedenudation_list->MIOocytesDonate3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_list->MIOocytesDonate4->Visible) { // MIOocytesDonate4 ?>
		<td data-name="MIOocytesDonate4" <?php echo $ivf_oocytedenudation_list->MIOocytesDonate4->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCount ?>_ivf_oocytedenudation_MIOocytesDonate4">
<span<?php echo $ivf_oocytedenudation_list->MIOocytesDonate4->viewAttributes() ?>><?php echo $ivf_oocytedenudation_list->MIOocytesDonate4->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_list->SelfOocytesMI->Visible) { // SelfOocytesMI ?>
		<td data-name="SelfOocytesMI" <?php echo $ivf_oocytedenudation_list->SelfOocytesMI->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCount ?>_ivf_oocytedenudation_SelfOocytesMI">
<span<?php echo $ivf_oocytedenudation_list->SelfOocytesMI->viewAttributes() ?>><?php echo $ivf_oocytedenudation_list->SelfOocytesMI->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_list->SelfOocytesMII->Visible) { // SelfOocytesMII ?>
		<td data-name="SelfOocytesMII" <?php echo $ivf_oocytedenudation_list->SelfOocytesMII->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_list->RowCount ?>_ivf_oocytedenudation_SelfOocytesMII">
<span<?php echo $ivf_oocytedenudation_list->SelfOocytesMII->viewAttributes() ?>><?php echo $ivf_oocytedenudation_list->SelfOocytesMII->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_oocytedenudation_list->ListOptions->render("body", "right", $ivf_oocytedenudation_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$ivf_oocytedenudation_list->isGridAdd())
		$ivf_oocytedenudation_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$ivf_oocytedenudation->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($ivf_oocytedenudation_list->Recordset)
	$ivf_oocytedenudation_list->Recordset->Close();
?>
<?php if (!$ivf_oocytedenudation_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$ivf_oocytedenudation_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $ivf_oocytedenudation_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ivf_oocytedenudation_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($ivf_oocytedenudation_list->TotalRecords == 0 && !$ivf_oocytedenudation->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $ivf_oocytedenudation_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$ivf_oocytedenudation_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$ivf_oocytedenudation_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$ivf_oocytedenudation->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_ivf_oocytedenudation",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$ivf_oocytedenudation_list->terminate();
?>