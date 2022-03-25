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
$ivf_outcome_list = new ivf_outcome_list();

// Run the page
$ivf_outcome_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_outcome_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$ivf_outcome_list->isExport()) { ?>
<script>
var fivf_outcomelist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fivf_outcomelist = currentForm = new ew.Form("fivf_outcomelist", "list");
	fivf_outcomelist.formKeyCountName = '<?php echo $ivf_outcome_list->FormKeyCountName ?>';
	loadjs.done("fivf_outcomelist");
});
var fivf_outcomelistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fivf_outcomelistsrch = currentSearchForm = new ew.Form("fivf_outcomelistsrch");

	// Dynamic selection lists
	// Filters

	fivf_outcomelistsrch.filterList = <?php echo $ivf_outcome_list->getFilterList() ?>;
	loadjs.done("fivf_outcomelistsrch");
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
<?php if (!$ivf_outcome_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($ivf_outcome_list->TotalRecords > 0 && $ivf_outcome_list->ExportOptions->visible()) { ?>
<?php $ivf_outcome_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_outcome_list->ImportOptions->visible()) { ?>
<?php $ivf_outcome_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_outcome_list->SearchOptions->visible()) { ?>
<?php $ivf_outcome_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_outcome_list->FilterOptions->visible()) { ?>
<?php $ivf_outcome_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$ivf_outcome_list->isExport() || Config("EXPORT_MASTER_RECORD") && $ivf_outcome_list->isExport("print")) { ?>
<?php
if ($ivf_outcome_list->DbMasterFilter != "" && $ivf_outcome->getCurrentMasterTable() == "ivf_treatment_plan") {
	if ($ivf_outcome_list->MasterRecordExists) {
		include_once "ivf_treatment_planmaster.php";
	}
}
?>
<?php } ?>
<?php
$ivf_outcome_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$ivf_outcome_list->isExport() && !$ivf_outcome->CurrentAction) { ?>
<form name="fivf_outcomelistsrch" id="fivf_outcomelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fivf_outcomelistsrch-search-panel" class="<?php echo $ivf_outcome_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="ivf_outcome">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $ivf_outcome_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($ivf_outcome_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($ivf_outcome_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $ivf_outcome_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($ivf_outcome_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($ivf_outcome_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($ivf_outcome_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($ivf_outcome_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $ivf_outcome_list->showPageHeader(); ?>
<?php
$ivf_outcome_list->showMessage();
?>
<?php if ($ivf_outcome_list->TotalRecords > 0 || $ivf_outcome->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($ivf_outcome_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf_outcome">
<?php if (!$ivf_outcome_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$ivf_outcome_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $ivf_outcome_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ivf_outcome_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fivf_outcomelist" id="fivf_outcomelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_outcome">
<?php if ($ivf_outcome->getCurrentMasterTable() == "ivf_treatment_plan" && $ivf_outcome->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="ivf_treatment_plan">
<input type="hidden" name="fk_RIDNO" value="<?php echo HtmlEncode($ivf_outcome_list->RIDNO->getSessionValue()) ?>">
<input type="hidden" name="fk_Name" value="<?php echo HtmlEncode($ivf_outcome_list->Name->getSessionValue()) ?>">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($ivf_outcome_list->TidNo->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_ivf_outcome" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($ivf_outcome_list->TotalRecords > 0 || $ivf_outcome_list->isGridEdit()) { ?>
<table id="tbl_ivf_outcomelist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$ivf_outcome->RowType = ROWTYPE_HEADER;

// Render list options
$ivf_outcome_list->renderListOptions();

// Render list options (header, left)
$ivf_outcome_list->ListOptions->render("header", "left");
?>
<?php if ($ivf_outcome_list->id->Visible) { // id ?>
	<?php if ($ivf_outcome_list->SortUrl($ivf_outcome_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $ivf_outcome_list->id->headerCellClass() ?>"><div id="elh_ivf_outcome_id" class="ivf_outcome_id"><div class="ew-table-header-caption"><?php echo $ivf_outcome_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $ivf_outcome_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_outcome_list->SortUrl($ivf_outcome_list->id) ?>', 1);"><div id="elh_ivf_outcome_id" class="ivf_outcome_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_list->RIDNO->Visible) { // RIDNO ?>
	<?php if ($ivf_outcome_list->SortUrl($ivf_outcome_list->RIDNO) == "") { ?>
		<th data-name="RIDNO" class="<?php echo $ivf_outcome_list->RIDNO->headerCellClass() ?>"><div id="elh_ivf_outcome_RIDNO" class="ivf_outcome_RIDNO"><div class="ew-table-header-caption"><?php echo $ivf_outcome_list->RIDNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RIDNO" class="<?php echo $ivf_outcome_list->RIDNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_outcome_list->SortUrl($ivf_outcome_list->RIDNO) ?>', 1);"><div id="elh_ivf_outcome_RIDNO" class="ivf_outcome_RIDNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_list->RIDNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_list->RIDNO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_list->RIDNO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_list->Name->Visible) { // Name ?>
	<?php if ($ivf_outcome_list->SortUrl($ivf_outcome_list->Name) == "") { ?>
		<th data-name="Name" class="<?php echo $ivf_outcome_list->Name->headerCellClass() ?>"><div id="elh_ivf_outcome_Name" class="ivf_outcome_Name"><div class="ew-table-header-caption"><?php echo $ivf_outcome_list->Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Name" class="<?php echo $ivf_outcome_list->Name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_outcome_list->SortUrl($ivf_outcome_list->Name) ?>', 1);"><div id="elh_ivf_outcome_Name" class="ivf_outcome_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_list->Name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_list->Name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_list->Name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_list->Age->Visible) { // Age ?>
	<?php if ($ivf_outcome_list->SortUrl($ivf_outcome_list->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $ivf_outcome_list->Age->headerCellClass() ?>"><div id="elh_ivf_outcome_Age" class="ivf_outcome_Age"><div class="ew-table-header-caption"><?php echo $ivf_outcome_list->Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $ivf_outcome_list->Age->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_outcome_list->SortUrl($ivf_outcome_list->Age) ?>', 1);"><div id="elh_ivf_outcome_Age" class="ivf_outcome_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_list->Age->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_list->Age->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_list->Age->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_list->treatment_status->Visible) { // treatment_status ?>
	<?php if ($ivf_outcome_list->SortUrl($ivf_outcome_list->treatment_status) == "") { ?>
		<th data-name="treatment_status" class="<?php echo $ivf_outcome_list->treatment_status->headerCellClass() ?>"><div id="elh_ivf_outcome_treatment_status" class="ivf_outcome_treatment_status"><div class="ew-table-header-caption"><?php echo $ivf_outcome_list->treatment_status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="treatment_status" class="<?php echo $ivf_outcome_list->treatment_status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_outcome_list->SortUrl($ivf_outcome_list->treatment_status) ?>', 1);"><div id="elh_ivf_outcome_treatment_status" class="ivf_outcome_treatment_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_list->treatment_status->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_list->treatment_status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_list->treatment_status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_list->ARTCYCLE->Visible) { // ARTCYCLE ?>
	<?php if ($ivf_outcome_list->SortUrl($ivf_outcome_list->ARTCYCLE) == "") { ?>
		<th data-name="ARTCYCLE" class="<?php echo $ivf_outcome_list->ARTCYCLE->headerCellClass() ?>"><div id="elh_ivf_outcome_ARTCYCLE" class="ivf_outcome_ARTCYCLE"><div class="ew-table-header-caption"><?php echo $ivf_outcome_list->ARTCYCLE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ARTCYCLE" class="<?php echo $ivf_outcome_list->ARTCYCLE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_outcome_list->SortUrl($ivf_outcome_list->ARTCYCLE) ?>', 1);"><div id="elh_ivf_outcome_ARTCYCLE" class="ivf_outcome_ARTCYCLE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_list->ARTCYCLE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_list->ARTCYCLE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_list->ARTCYCLE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_list->RESULT->Visible) { // RESULT ?>
	<?php if ($ivf_outcome_list->SortUrl($ivf_outcome_list->RESULT) == "") { ?>
		<th data-name="RESULT" class="<?php echo $ivf_outcome_list->RESULT->headerCellClass() ?>"><div id="elh_ivf_outcome_RESULT" class="ivf_outcome_RESULT"><div class="ew-table-header-caption"><?php echo $ivf_outcome_list->RESULT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RESULT" class="<?php echo $ivf_outcome_list->RESULT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_outcome_list->SortUrl($ivf_outcome_list->RESULT) ?>', 1);"><div id="elh_ivf_outcome_RESULT" class="ivf_outcome_RESULT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_list->RESULT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_list->RESULT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_list->RESULT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_list->status->Visible) { // status ?>
	<?php if ($ivf_outcome_list->SortUrl($ivf_outcome_list->status) == "") { ?>
		<th data-name="status" class="<?php echo $ivf_outcome_list->status->headerCellClass() ?>"><div id="elh_ivf_outcome_status" class="ivf_outcome_status"><div class="ew-table-header-caption"><?php echo $ivf_outcome_list->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $ivf_outcome_list->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_outcome_list->SortUrl($ivf_outcome_list->status) ?>', 1);"><div id="elh_ivf_outcome_status" class="ivf_outcome_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_list->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_list->status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_list->status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_list->createdby->Visible) { // createdby ?>
	<?php if ($ivf_outcome_list->SortUrl($ivf_outcome_list->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $ivf_outcome_list->createdby->headerCellClass() ?>"><div id="elh_ivf_outcome_createdby" class="ivf_outcome_createdby"><div class="ew-table-header-caption"><?php echo $ivf_outcome_list->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $ivf_outcome_list->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_outcome_list->SortUrl($ivf_outcome_list->createdby) ?>', 1);"><div id="elh_ivf_outcome_createdby" class="ivf_outcome_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_list->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_list->createdby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_list->createdby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_list->createddatetime->Visible) { // createddatetime ?>
	<?php if ($ivf_outcome_list->SortUrl($ivf_outcome_list->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $ivf_outcome_list->createddatetime->headerCellClass() ?>"><div id="elh_ivf_outcome_createddatetime" class="ivf_outcome_createddatetime"><div class="ew-table-header-caption"><?php echo $ivf_outcome_list->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $ivf_outcome_list->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_outcome_list->SortUrl($ivf_outcome_list->createddatetime) ?>', 1);"><div id="elh_ivf_outcome_createddatetime" class="ivf_outcome_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_list->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_list->createddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_list->createddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_list->modifiedby->Visible) { // modifiedby ?>
	<?php if ($ivf_outcome_list->SortUrl($ivf_outcome_list->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $ivf_outcome_list->modifiedby->headerCellClass() ?>"><div id="elh_ivf_outcome_modifiedby" class="ivf_outcome_modifiedby"><div class="ew-table-header-caption"><?php echo $ivf_outcome_list->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $ivf_outcome_list->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_outcome_list->SortUrl($ivf_outcome_list->modifiedby) ?>', 1);"><div id="elh_ivf_outcome_modifiedby" class="ivf_outcome_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_list->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_list->modifiedby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_list->modifiedby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_list->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($ivf_outcome_list->SortUrl($ivf_outcome_list->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $ivf_outcome_list->modifieddatetime->headerCellClass() ?>"><div id="elh_ivf_outcome_modifieddatetime" class="ivf_outcome_modifieddatetime"><div class="ew-table-header-caption"><?php echo $ivf_outcome_list->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $ivf_outcome_list->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_outcome_list->SortUrl($ivf_outcome_list->modifieddatetime) ?>', 1);"><div id="elh_ivf_outcome_modifieddatetime" class="ivf_outcome_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_list->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_list->modifieddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_list->modifieddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_list->outcomeDate->Visible) { // outcomeDate ?>
	<?php if ($ivf_outcome_list->SortUrl($ivf_outcome_list->outcomeDate) == "") { ?>
		<th data-name="outcomeDate" class="<?php echo $ivf_outcome_list->outcomeDate->headerCellClass() ?>"><div id="elh_ivf_outcome_outcomeDate" class="ivf_outcome_outcomeDate"><div class="ew-table-header-caption"><?php echo $ivf_outcome_list->outcomeDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="outcomeDate" class="<?php echo $ivf_outcome_list->outcomeDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_outcome_list->SortUrl($ivf_outcome_list->outcomeDate) ?>', 1);"><div id="elh_ivf_outcome_outcomeDate" class="ivf_outcome_outcomeDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_list->outcomeDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_list->outcomeDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_list->outcomeDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_list->outcomeDay->Visible) { // outcomeDay ?>
	<?php if ($ivf_outcome_list->SortUrl($ivf_outcome_list->outcomeDay) == "") { ?>
		<th data-name="outcomeDay" class="<?php echo $ivf_outcome_list->outcomeDay->headerCellClass() ?>"><div id="elh_ivf_outcome_outcomeDay" class="ivf_outcome_outcomeDay"><div class="ew-table-header-caption"><?php echo $ivf_outcome_list->outcomeDay->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="outcomeDay" class="<?php echo $ivf_outcome_list->outcomeDay->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_outcome_list->SortUrl($ivf_outcome_list->outcomeDay) ?>', 1);"><div id="elh_ivf_outcome_outcomeDay" class="ivf_outcome_outcomeDay">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_list->outcomeDay->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_list->outcomeDay->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_list->outcomeDay->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_list->OPResult->Visible) { // OPResult ?>
	<?php if ($ivf_outcome_list->SortUrl($ivf_outcome_list->OPResult) == "") { ?>
		<th data-name="OPResult" class="<?php echo $ivf_outcome_list->OPResult->headerCellClass() ?>"><div id="elh_ivf_outcome_OPResult" class="ivf_outcome_OPResult"><div class="ew-table-header-caption"><?php echo $ivf_outcome_list->OPResult->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OPResult" class="<?php echo $ivf_outcome_list->OPResult->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_outcome_list->SortUrl($ivf_outcome_list->OPResult) ?>', 1);"><div id="elh_ivf_outcome_OPResult" class="ivf_outcome_OPResult">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_list->OPResult->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_list->OPResult->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_list->OPResult->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_list->Gestation->Visible) { // Gestation ?>
	<?php if ($ivf_outcome_list->SortUrl($ivf_outcome_list->Gestation) == "") { ?>
		<th data-name="Gestation" class="<?php echo $ivf_outcome_list->Gestation->headerCellClass() ?>"><div id="elh_ivf_outcome_Gestation" class="ivf_outcome_Gestation"><div class="ew-table-header-caption"><?php echo $ivf_outcome_list->Gestation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gestation" class="<?php echo $ivf_outcome_list->Gestation->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_outcome_list->SortUrl($ivf_outcome_list->Gestation) ?>', 1);"><div id="elh_ivf_outcome_Gestation" class="ivf_outcome_Gestation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_list->Gestation->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_list->Gestation->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_list->Gestation->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_list->TransferdEmbryos->Visible) { // TransferdEmbryos ?>
	<?php if ($ivf_outcome_list->SortUrl($ivf_outcome_list->TransferdEmbryos) == "") { ?>
		<th data-name="TransferdEmbryos" class="<?php echo $ivf_outcome_list->TransferdEmbryos->headerCellClass() ?>"><div id="elh_ivf_outcome_TransferdEmbryos" class="ivf_outcome_TransferdEmbryos"><div class="ew-table-header-caption"><?php echo $ivf_outcome_list->TransferdEmbryos->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TransferdEmbryos" class="<?php echo $ivf_outcome_list->TransferdEmbryos->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_outcome_list->SortUrl($ivf_outcome_list->TransferdEmbryos) ?>', 1);"><div id="elh_ivf_outcome_TransferdEmbryos" class="ivf_outcome_TransferdEmbryos">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_list->TransferdEmbryos->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_list->TransferdEmbryos->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_list->TransferdEmbryos->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_list->InitalOfSacs->Visible) { // InitalOfSacs ?>
	<?php if ($ivf_outcome_list->SortUrl($ivf_outcome_list->InitalOfSacs) == "") { ?>
		<th data-name="InitalOfSacs" class="<?php echo $ivf_outcome_list->InitalOfSacs->headerCellClass() ?>"><div id="elh_ivf_outcome_InitalOfSacs" class="ivf_outcome_InitalOfSacs"><div class="ew-table-header-caption"><?php echo $ivf_outcome_list->InitalOfSacs->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="InitalOfSacs" class="<?php echo $ivf_outcome_list->InitalOfSacs->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_outcome_list->SortUrl($ivf_outcome_list->InitalOfSacs) ?>', 1);"><div id="elh_ivf_outcome_InitalOfSacs" class="ivf_outcome_InitalOfSacs">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_list->InitalOfSacs->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_list->InitalOfSacs->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_list->InitalOfSacs->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_list->ImplimentationRate->Visible) { // ImplimentationRate ?>
	<?php if ($ivf_outcome_list->SortUrl($ivf_outcome_list->ImplimentationRate) == "") { ?>
		<th data-name="ImplimentationRate" class="<?php echo $ivf_outcome_list->ImplimentationRate->headerCellClass() ?>"><div id="elh_ivf_outcome_ImplimentationRate" class="ivf_outcome_ImplimentationRate"><div class="ew-table-header-caption"><?php echo $ivf_outcome_list->ImplimentationRate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ImplimentationRate" class="<?php echo $ivf_outcome_list->ImplimentationRate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_outcome_list->SortUrl($ivf_outcome_list->ImplimentationRate) ?>', 1);"><div id="elh_ivf_outcome_ImplimentationRate" class="ivf_outcome_ImplimentationRate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_list->ImplimentationRate->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_list->ImplimentationRate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_list->ImplimentationRate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_list->EmbryoNo->Visible) { // EmbryoNo ?>
	<?php if ($ivf_outcome_list->SortUrl($ivf_outcome_list->EmbryoNo) == "") { ?>
		<th data-name="EmbryoNo" class="<?php echo $ivf_outcome_list->EmbryoNo->headerCellClass() ?>"><div id="elh_ivf_outcome_EmbryoNo" class="ivf_outcome_EmbryoNo"><div class="ew-table-header-caption"><?php echo $ivf_outcome_list->EmbryoNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EmbryoNo" class="<?php echo $ivf_outcome_list->EmbryoNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_outcome_list->SortUrl($ivf_outcome_list->EmbryoNo) ?>', 1);"><div id="elh_ivf_outcome_EmbryoNo" class="ivf_outcome_EmbryoNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_list->EmbryoNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_list->EmbryoNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_list->EmbryoNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_list->ExtrauterineSac->Visible) { // ExtrauterineSac ?>
	<?php if ($ivf_outcome_list->SortUrl($ivf_outcome_list->ExtrauterineSac) == "") { ?>
		<th data-name="ExtrauterineSac" class="<?php echo $ivf_outcome_list->ExtrauterineSac->headerCellClass() ?>"><div id="elh_ivf_outcome_ExtrauterineSac" class="ivf_outcome_ExtrauterineSac"><div class="ew-table-header-caption"><?php echo $ivf_outcome_list->ExtrauterineSac->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ExtrauterineSac" class="<?php echo $ivf_outcome_list->ExtrauterineSac->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_outcome_list->SortUrl($ivf_outcome_list->ExtrauterineSac) ?>', 1);"><div id="elh_ivf_outcome_ExtrauterineSac" class="ivf_outcome_ExtrauterineSac">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_list->ExtrauterineSac->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_list->ExtrauterineSac->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_list->ExtrauterineSac->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_list->PregnancyMonozygotic->Visible) { // PregnancyMonozygotic ?>
	<?php if ($ivf_outcome_list->SortUrl($ivf_outcome_list->PregnancyMonozygotic) == "") { ?>
		<th data-name="PregnancyMonozygotic" class="<?php echo $ivf_outcome_list->PregnancyMonozygotic->headerCellClass() ?>"><div id="elh_ivf_outcome_PregnancyMonozygotic" class="ivf_outcome_PregnancyMonozygotic"><div class="ew-table-header-caption"><?php echo $ivf_outcome_list->PregnancyMonozygotic->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PregnancyMonozygotic" class="<?php echo $ivf_outcome_list->PregnancyMonozygotic->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_outcome_list->SortUrl($ivf_outcome_list->PregnancyMonozygotic) ?>', 1);"><div id="elh_ivf_outcome_PregnancyMonozygotic" class="ivf_outcome_PregnancyMonozygotic">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_list->PregnancyMonozygotic->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_list->PregnancyMonozygotic->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_list->PregnancyMonozygotic->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_list->TypeGestation->Visible) { // TypeGestation ?>
	<?php if ($ivf_outcome_list->SortUrl($ivf_outcome_list->TypeGestation) == "") { ?>
		<th data-name="TypeGestation" class="<?php echo $ivf_outcome_list->TypeGestation->headerCellClass() ?>"><div id="elh_ivf_outcome_TypeGestation" class="ivf_outcome_TypeGestation"><div class="ew-table-header-caption"><?php echo $ivf_outcome_list->TypeGestation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TypeGestation" class="<?php echo $ivf_outcome_list->TypeGestation->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_outcome_list->SortUrl($ivf_outcome_list->TypeGestation) ?>', 1);"><div id="elh_ivf_outcome_TypeGestation" class="ivf_outcome_TypeGestation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_list->TypeGestation->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_list->TypeGestation->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_list->TypeGestation->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_list->Urine->Visible) { // Urine ?>
	<?php if ($ivf_outcome_list->SortUrl($ivf_outcome_list->Urine) == "") { ?>
		<th data-name="Urine" class="<?php echo $ivf_outcome_list->Urine->headerCellClass() ?>"><div id="elh_ivf_outcome_Urine" class="ivf_outcome_Urine"><div class="ew-table-header-caption"><?php echo $ivf_outcome_list->Urine->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Urine" class="<?php echo $ivf_outcome_list->Urine->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_outcome_list->SortUrl($ivf_outcome_list->Urine) ?>', 1);"><div id="elh_ivf_outcome_Urine" class="ivf_outcome_Urine">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_list->Urine->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_list->Urine->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_list->Urine->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_list->PTdate->Visible) { // PTdate ?>
	<?php if ($ivf_outcome_list->SortUrl($ivf_outcome_list->PTdate) == "") { ?>
		<th data-name="PTdate" class="<?php echo $ivf_outcome_list->PTdate->headerCellClass() ?>"><div id="elh_ivf_outcome_PTdate" class="ivf_outcome_PTdate"><div class="ew-table-header-caption"><?php echo $ivf_outcome_list->PTdate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PTdate" class="<?php echo $ivf_outcome_list->PTdate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_outcome_list->SortUrl($ivf_outcome_list->PTdate) ?>', 1);"><div id="elh_ivf_outcome_PTdate" class="ivf_outcome_PTdate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_list->PTdate->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_list->PTdate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_list->PTdate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_list->Reduced->Visible) { // Reduced ?>
	<?php if ($ivf_outcome_list->SortUrl($ivf_outcome_list->Reduced) == "") { ?>
		<th data-name="Reduced" class="<?php echo $ivf_outcome_list->Reduced->headerCellClass() ?>"><div id="elh_ivf_outcome_Reduced" class="ivf_outcome_Reduced"><div class="ew-table-header-caption"><?php echo $ivf_outcome_list->Reduced->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Reduced" class="<?php echo $ivf_outcome_list->Reduced->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_outcome_list->SortUrl($ivf_outcome_list->Reduced) ?>', 1);"><div id="elh_ivf_outcome_Reduced" class="ivf_outcome_Reduced">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_list->Reduced->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_list->Reduced->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_list->Reduced->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_list->INduced->Visible) { // INduced ?>
	<?php if ($ivf_outcome_list->SortUrl($ivf_outcome_list->INduced) == "") { ?>
		<th data-name="INduced" class="<?php echo $ivf_outcome_list->INduced->headerCellClass() ?>"><div id="elh_ivf_outcome_INduced" class="ivf_outcome_INduced"><div class="ew-table-header-caption"><?php echo $ivf_outcome_list->INduced->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="INduced" class="<?php echo $ivf_outcome_list->INduced->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_outcome_list->SortUrl($ivf_outcome_list->INduced) ?>', 1);"><div id="elh_ivf_outcome_INduced" class="ivf_outcome_INduced">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_list->INduced->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_list->INduced->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_list->INduced->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_list->INducedDate->Visible) { // INducedDate ?>
	<?php if ($ivf_outcome_list->SortUrl($ivf_outcome_list->INducedDate) == "") { ?>
		<th data-name="INducedDate" class="<?php echo $ivf_outcome_list->INducedDate->headerCellClass() ?>"><div id="elh_ivf_outcome_INducedDate" class="ivf_outcome_INducedDate"><div class="ew-table-header-caption"><?php echo $ivf_outcome_list->INducedDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="INducedDate" class="<?php echo $ivf_outcome_list->INducedDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_outcome_list->SortUrl($ivf_outcome_list->INducedDate) ?>', 1);"><div id="elh_ivf_outcome_INducedDate" class="ivf_outcome_INducedDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_list->INducedDate->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_list->INducedDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_list->INducedDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_list->Miscarriage->Visible) { // Miscarriage ?>
	<?php if ($ivf_outcome_list->SortUrl($ivf_outcome_list->Miscarriage) == "") { ?>
		<th data-name="Miscarriage" class="<?php echo $ivf_outcome_list->Miscarriage->headerCellClass() ?>"><div id="elh_ivf_outcome_Miscarriage" class="ivf_outcome_Miscarriage"><div class="ew-table-header-caption"><?php echo $ivf_outcome_list->Miscarriage->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Miscarriage" class="<?php echo $ivf_outcome_list->Miscarriage->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_outcome_list->SortUrl($ivf_outcome_list->Miscarriage) ?>', 1);"><div id="elh_ivf_outcome_Miscarriage" class="ivf_outcome_Miscarriage">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_list->Miscarriage->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_list->Miscarriage->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_list->Miscarriage->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_list->Induced1->Visible) { // Induced1 ?>
	<?php if ($ivf_outcome_list->SortUrl($ivf_outcome_list->Induced1) == "") { ?>
		<th data-name="Induced1" class="<?php echo $ivf_outcome_list->Induced1->headerCellClass() ?>"><div id="elh_ivf_outcome_Induced1" class="ivf_outcome_Induced1"><div class="ew-table-header-caption"><?php echo $ivf_outcome_list->Induced1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Induced1" class="<?php echo $ivf_outcome_list->Induced1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_outcome_list->SortUrl($ivf_outcome_list->Induced1) ?>', 1);"><div id="elh_ivf_outcome_Induced1" class="ivf_outcome_Induced1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_list->Induced1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_list->Induced1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_list->Induced1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_list->Type->Visible) { // Type ?>
	<?php if ($ivf_outcome_list->SortUrl($ivf_outcome_list->Type) == "") { ?>
		<th data-name="Type" class="<?php echo $ivf_outcome_list->Type->headerCellClass() ?>"><div id="elh_ivf_outcome_Type" class="ivf_outcome_Type"><div class="ew-table-header-caption"><?php echo $ivf_outcome_list->Type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Type" class="<?php echo $ivf_outcome_list->Type->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_outcome_list->SortUrl($ivf_outcome_list->Type) ?>', 1);"><div id="elh_ivf_outcome_Type" class="ivf_outcome_Type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_list->Type->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_list->Type->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_list->Type->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_list->IfClinical->Visible) { // IfClinical ?>
	<?php if ($ivf_outcome_list->SortUrl($ivf_outcome_list->IfClinical) == "") { ?>
		<th data-name="IfClinical" class="<?php echo $ivf_outcome_list->IfClinical->headerCellClass() ?>"><div id="elh_ivf_outcome_IfClinical" class="ivf_outcome_IfClinical"><div class="ew-table-header-caption"><?php echo $ivf_outcome_list->IfClinical->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IfClinical" class="<?php echo $ivf_outcome_list->IfClinical->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_outcome_list->SortUrl($ivf_outcome_list->IfClinical) ?>', 1);"><div id="elh_ivf_outcome_IfClinical" class="ivf_outcome_IfClinical">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_list->IfClinical->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_list->IfClinical->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_list->IfClinical->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_list->GADate->Visible) { // GADate ?>
	<?php if ($ivf_outcome_list->SortUrl($ivf_outcome_list->GADate) == "") { ?>
		<th data-name="GADate" class="<?php echo $ivf_outcome_list->GADate->headerCellClass() ?>"><div id="elh_ivf_outcome_GADate" class="ivf_outcome_GADate"><div class="ew-table-header-caption"><?php echo $ivf_outcome_list->GADate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GADate" class="<?php echo $ivf_outcome_list->GADate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_outcome_list->SortUrl($ivf_outcome_list->GADate) ?>', 1);"><div id="elh_ivf_outcome_GADate" class="ivf_outcome_GADate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_list->GADate->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_list->GADate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_list->GADate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_list->GA->Visible) { // GA ?>
	<?php if ($ivf_outcome_list->SortUrl($ivf_outcome_list->GA) == "") { ?>
		<th data-name="GA" class="<?php echo $ivf_outcome_list->GA->headerCellClass() ?>"><div id="elh_ivf_outcome_GA" class="ivf_outcome_GA"><div class="ew-table-header-caption"><?php echo $ivf_outcome_list->GA->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GA" class="<?php echo $ivf_outcome_list->GA->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_outcome_list->SortUrl($ivf_outcome_list->GA) ?>', 1);"><div id="elh_ivf_outcome_GA" class="ivf_outcome_GA">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_list->GA->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_list->GA->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_list->GA->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_list->FoetalDeath->Visible) { // FoetalDeath ?>
	<?php if ($ivf_outcome_list->SortUrl($ivf_outcome_list->FoetalDeath) == "") { ?>
		<th data-name="FoetalDeath" class="<?php echo $ivf_outcome_list->FoetalDeath->headerCellClass() ?>"><div id="elh_ivf_outcome_FoetalDeath" class="ivf_outcome_FoetalDeath"><div class="ew-table-header-caption"><?php echo $ivf_outcome_list->FoetalDeath->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FoetalDeath" class="<?php echo $ivf_outcome_list->FoetalDeath->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_outcome_list->SortUrl($ivf_outcome_list->FoetalDeath) ?>', 1);"><div id="elh_ivf_outcome_FoetalDeath" class="ivf_outcome_FoetalDeath">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_list->FoetalDeath->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_list->FoetalDeath->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_list->FoetalDeath->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_list->FerinatalDeath->Visible) { // FerinatalDeath ?>
	<?php if ($ivf_outcome_list->SortUrl($ivf_outcome_list->FerinatalDeath) == "") { ?>
		<th data-name="FerinatalDeath" class="<?php echo $ivf_outcome_list->FerinatalDeath->headerCellClass() ?>"><div id="elh_ivf_outcome_FerinatalDeath" class="ivf_outcome_FerinatalDeath"><div class="ew-table-header-caption"><?php echo $ivf_outcome_list->FerinatalDeath->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FerinatalDeath" class="<?php echo $ivf_outcome_list->FerinatalDeath->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_outcome_list->SortUrl($ivf_outcome_list->FerinatalDeath) ?>', 1);"><div id="elh_ivf_outcome_FerinatalDeath" class="ivf_outcome_FerinatalDeath">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_list->FerinatalDeath->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_list->FerinatalDeath->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_list->FerinatalDeath->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_list->TidNo->Visible) { // TidNo ?>
	<?php if ($ivf_outcome_list->SortUrl($ivf_outcome_list->TidNo) == "") { ?>
		<th data-name="TidNo" class="<?php echo $ivf_outcome_list->TidNo->headerCellClass() ?>"><div id="elh_ivf_outcome_TidNo" class="ivf_outcome_TidNo"><div class="ew-table-header-caption"><?php echo $ivf_outcome_list->TidNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TidNo" class="<?php echo $ivf_outcome_list->TidNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_outcome_list->SortUrl($ivf_outcome_list->TidNo) ?>', 1);"><div id="elh_ivf_outcome_TidNo" class="ivf_outcome_TidNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_list->TidNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_list->TidNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_list->TidNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_list->Ectopic->Visible) { // Ectopic ?>
	<?php if ($ivf_outcome_list->SortUrl($ivf_outcome_list->Ectopic) == "") { ?>
		<th data-name="Ectopic" class="<?php echo $ivf_outcome_list->Ectopic->headerCellClass() ?>"><div id="elh_ivf_outcome_Ectopic" class="ivf_outcome_Ectopic"><div class="ew-table-header-caption"><?php echo $ivf_outcome_list->Ectopic->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Ectopic" class="<?php echo $ivf_outcome_list->Ectopic->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_outcome_list->SortUrl($ivf_outcome_list->Ectopic) ?>', 1);"><div id="elh_ivf_outcome_Ectopic" class="ivf_outcome_Ectopic">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_list->Ectopic->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_list->Ectopic->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_list->Ectopic->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_outcome_list->Extra->Visible) { // Extra ?>
	<?php if ($ivf_outcome_list->SortUrl($ivf_outcome_list->Extra) == "") { ?>
		<th data-name="Extra" class="<?php echo $ivf_outcome_list->Extra->headerCellClass() ?>"><div id="elh_ivf_outcome_Extra" class="ivf_outcome_Extra"><div class="ew-table-header-caption"><?php echo $ivf_outcome_list->Extra->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Extra" class="<?php echo $ivf_outcome_list->Extra->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_outcome_list->SortUrl($ivf_outcome_list->Extra) ?>', 1);"><div id="elh_ivf_outcome_Extra" class="ivf_outcome_Extra">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_outcome_list->Extra->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_outcome_list->Extra->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_outcome_list->Extra->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$ivf_outcome_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($ivf_outcome_list->ExportAll && $ivf_outcome_list->isExport()) {
	$ivf_outcome_list->StopRecord = $ivf_outcome_list->TotalRecords;
} else {

	// Set the last record to display
	if ($ivf_outcome_list->TotalRecords > $ivf_outcome_list->StartRecord + $ivf_outcome_list->DisplayRecords - 1)
		$ivf_outcome_list->StopRecord = $ivf_outcome_list->StartRecord + $ivf_outcome_list->DisplayRecords - 1;
	else
		$ivf_outcome_list->StopRecord = $ivf_outcome_list->TotalRecords;
}
$ivf_outcome_list->RecordCount = $ivf_outcome_list->StartRecord - 1;
if ($ivf_outcome_list->Recordset && !$ivf_outcome_list->Recordset->EOF) {
	$ivf_outcome_list->Recordset->moveFirst();
	$selectLimit = $ivf_outcome_list->UseSelectLimit;
	if (!$selectLimit && $ivf_outcome_list->StartRecord > 1)
		$ivf_outcome_list->Recordset->move($ivf_outcome_list->StartRecord - 1);
} elseif (!$ivf_outcome->AllowAddDeleteRow && $ivf_outcome_list->StopRecord == 0) {
	$ivf_outcome_list->StopRecord = $ivf_outcome->GridAddRowCount;
}

// Initialize aggregate
$ivf_outcome->RowType = ROWTYPE_AGGREGATEINIT;
$ivf_outcome->resetAttributes();
$ivf_outcome_list->renderRow();
while ($ivf_outcome_list->RecordCount < $ivf_outcome_list->StopRecord) {
	$ivf_outcome_list->RecordCount++;
	if ($ivf_outcome_list->RecordCount >= $ivf_outcome_list->StartRecord) {
		$ivf_outcome_list->RowCount++;

		// Set up key count
		$ivf_outcome_list->KeyCount = $ivf_outcome_list->RowIndex;

		// Init row class and style
		$ivf_outcome->resetAttributes();
		$ivf_outcome->CssClass = "";
		if ($ivf_outcome_list->isGridAdd()) {
		} else {
			$ivf_outcome_list->loadRowValues($ivf_outcome_list->Recordset); // Load row values
		}
		$ivf_outcome->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$ivf_outcome->RowAttrs->merge(["data-rowindex" => $ivf_outcome_list->RowCount, "id" => "r" . $ivf_outcome_list->RowCount . "_ivf_outcome", "data-rowtype" => $ivf_outcome->RowType]);

		// Render row
		$ivf_outcome_list->renderRow();

		// Render list options
		$ivf_outcome_list->renderListOptions();
?>
	<tr <?php echo $ivf_outcome->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_outcome_list->ListOptions->render("body", "left", $ivf_outcome_list->RowCount);
?>
	<?php if ($ivf_outcome_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $ivf_outcome_list->id->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCount ?>_ivf_outcome_id">
<span<?php echo $ivf_outcome_list->id->viewAttributes() ?>><?php echo $ivf_outcome_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_list->RIDNO->Visible) { // RIDNO ?>
		<td data-name="RIDNO" <?php echo $ivf_outcome_list->RIDNO->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCount ?>_ivf_outcome_RIDNO">
<span<?php echo $ivf_outcome_list->RIDNO->viewAttributes() ?>><?php echo $ivf_outcome_list->RIDNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_list->Name->Visible) { // Name ?>
		<td data-name="Name" <?php echo $ivf_outcome_list->Name->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCount ?>_ivf_outcome_Name">
<span<?php echo $ivf_outcome_list->Name->viewAttributes() ?>><?php echo $ivf_outcome_list->Name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_list->Age->Visible) { // Age ?>
		<td data-name="Age" <?php echo $ivf_outcome_list->Age->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCount ?>_ivf_outcome_Age">
<span<?php echo $ivf_outcome_list->Age->viewAttributes() ?>><?php echo $ivf_outcome_list->Age->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_list->treatment_status->Visible) { // treatment_status ?>
		<td data-name="treatment_status" <?php echo $ivf_outcome_list->treatment_status->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCount ?>_ivf_outcome_treatment_status">
<span<?php echo $ivf_outcome_list->treatment_status->viewAttributes() ?>><?php echo $ivf_outcome_list->treatment_status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_list->ARTCYCLE->Visible) { // ARTCYCLE ?>
		<td data-name="ARTCYCLE" <?php echo $ivf_outcome_list->ARTCYCLE->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCount ?>_ivf_outcome_ARTCYCLE">
<span<?php echo $ivf_outcome_list->ARTCYCLE->viewAttributes() ?>><?php echo $ivf_outcome_list->ARTCYCLE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_list->RESULT->Visible) { // RESULT ?>
		<td data-name="RESULT" <?php echo $ivf_outcome_list->RESULT->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCount ?>_ivf_outcome_RESULT">
<span<?php echo $ivf_outcome_list->RESULT->viewAttributes() ?>><?php echo $ivf_outcome_list->RESULT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_list->status->Visible) { // status ?>
		<td data-name="status" <?php echo $ivf_outcome_list->status->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCount ?>_ivf_outcome_status">
<span<?php echo $ivf_outcome_list->status->viewAttributes() ?>><?php echo $ivf_outcome_list->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_list->createdby->Visible) { // createdby ?>
		<td data-name="createdby" <?php echo $ivf_outcome_list->createdby->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCount ?>_ivf_outcome_createdby">
<span<?php echo $ivf_outcome_list->createdby->viewAttributes() ?>><?php echo $ivf_outcome_list->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_list->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" <?php echo $ivf_outcome_list->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCount ?>_ivf_outcome_createddatetime">
<span<?php echo $ivf_outcome_list->createddatetime->viewAttributes() ?>><?php echo $ivf_outcome_list->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_list->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby" <?php echo $ivf_outcome_list->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCount ?>_ivf_outcome_modifiedby">
<span<?php echo $ivf_outcome_list->modifiedby->viewAttributes() ?>><?php echo $ivf_outcome_list->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_list->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime" <?php echo $ivf_outcome_list->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCount ?>_ivf_outcome_modifieddatetime">
<span<?php echo $ivf_outcome_list->modifieddatetime->viewAttributes() ?>><?php echo $ivf_outcome_list->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_list->outcomeDate->Visible) { // outcomeDate ?>
		<td data-name="outcomeDate" <?php echo $ivf_outcome_list->outcomeDate->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCount ?>_ivf_outcome_outcomeDate">
<span<?php echo $ivf_outcome_list->outcomeDate->viewAttributes() ?>><?php echo $ivf_outcome_list->outcomeDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_list->outcomeDay->Visible) { // outcomeDay ?>
		<td data-name="outcomeDay" <?php echo $ivf_outcome_list->outcomeDay->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCount ?>_ivf_outcome_outcomeDay">
<span<?php echo $ivf_outcome_list->outcomeDay->viewAttributes() ?>><?php echo $ivf_outcome_list->outcomeDay->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_list->OPResult->Visible) { // OPResult ?>
		<td data-name="OPResult" <?php echo $ivf_outcome_list->OPResult->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCount ?>_ivf_outcome_OPResult">
<span<?php echo $ivf_outcome_list->OPResult->viewAttributes() ?>><?php echo $ivf_outcome_list->OPResult->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_list->Gestation->Visible) { // Gestation ?>
		<td data-name="Gestation" <?php echo $ivf_outcome_list->Gestation->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCount ?>_ivf_outcome_Gestation">
<span<?php echo $ivf_outcome_list->Gestation->viewAttributes() ?>><?php echo $ivf_outcome_list->Gestation->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_list->TransferdEmbryos->Visible) { // TransferdEmbryos ?>
		<td data-name="TransferdEmbryos" <?php echo $ivf_outcome_list->TransferdEmbryos->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCount ?>_ivf_outcome_TransferdEmbryos">
<span<?php echo $ivf_outcome_list->TransferdEmbryos->viewAttributes() ?>><?php echo $ivf_outcome_list->TransferdEmbryos->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_list->InitalOfSacs->Visible) { // InitalOfSacs ?>
		<td data-name="InitalOfSacs" <?php echo $ivf_outcome_list->InitalOfSacs->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCount ?>_ivf_outcome_InitalOfSacs">
<span<?php echo $ivf_outcome_list->InitalOfSacs->viewAttributes() ?>><?php echo $ivf_outcome_list->InitalOfSacs->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_list->ImplimentationRate->Visible) { // ImplimentationRate ?>
		<td data-name="ImplimentationRate" <?php echo $ivf_outcome_list->ImplimentationRate->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCount ?>_ivf_outcome_ImplimentationRate">
<span<?php echo $ivf_outcome_list->ImplimentationRate->viewAttributes() ?>><?php echo $ivf_outcome_list->ImplimentationRate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_list->EmbryoNo->Visible) { // EmbryoNo ?>
		<td data-name="EmbryoNo" <?php echo $ivf_outcome_list->EmbryoNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCount ?>_ivf_outcome_EmbryoNo">
<span<?php echo $ivf_outcome_list->EmbryoNo->viewAttributes() ?>><?php echo $ivf_outcome_list->EmbryoNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_list->ExtrauterineSac->Visible) { // ExtrauterineSac ?>
		<td data-name="ExtrauterineSac" <?php echo $ivf_outcome_list->ExtrauterineSac->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCount ?>_ivf_outcome_ExtrauterineSac">
<span<?php echo $ivf_outcome_list->ExtrauterineSac->viewAttributes() ?>><?php echo $ivf_outcome_list->ExtrauterineSac->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_list->PregnancyMonozygotic->Visible) { // PregnancyMonozygotic ?>
		<td data-name="PregnancyMonozygotic" <?php echo $ivf_outcome_list->PregnancyMonozygotic->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCount ?>_ivf_outcome_PregnancyMonozygotic">
<span<?php echo $ivf_outcome_list->PregnancyMonozygotic->viewAttributes() ?>><?php echo $ivf_outcome_list->PregnancyMonozygotic->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_list->TypeGestation->Visible) { // TypeGestation ?>
		<td data-name="TypeGestation" <?php echo $ivf_outcome_list->TypeGestation->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCount ?>_ivf_outcome_TypeGestation">
<span<?php echo $ivf_outcome_list->TypeGestation->viewAttributes() ?>><?php echo $ivf_outcome_list->TypeGestation->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_list->Urine->Visible) { // Urine ?>
		<td data-name="Urine" <?php echo $ivf_outcome_list->Urine->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCount ?>_ivf_outcome_Urine">
<span<?php echo $ivf_outcome_list->Urine->viewAttributes() ?>><?php echo $ivf_outcome_list->Urine->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_list->PTdate->Visible) { // PTdate ?>
		<td data-name="PTdate" <?php echo $ivf_outcome_list->PTdate->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCount ?>_ivf_outcome_PTdate">
<span<?php echo $ivf_outcome_list->PTdate->viewAttributes() ?>><?php echo $ivf_outcome_list->PTdate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_list->Reduced->Visible) { // Reduced ?>
		<td data-name="Reduced" <?php echo $ivf_outcome_list->Reduced->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCount ?>_ivf_outcome_Reduced">
<span<?php echo $ivf_outcome_list->Reduced->viewAttributes() ?>><?php echo $ivf_outcome_list->Reduced->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_list->INduced->Visible) { // INduced ?>
		<td data-name="INduced" <?php echo $ivf_outcome_list->INduced->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCount ?>_ivf_outcome_INduced">
<span<?php echo $ivf_outcome_list->INduced->viewAttributes() ?>><?php echo $ivf_outcome_list->INduced->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_list->INducedDate->Visible) { // INducedDate ?>
		<td data-name="INducedDate" <?php echo $ivf_outcome_list->INducedDate->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCount ?>_ivf_outcome_INducedDate">
<span<?php echo $ivf_outcome_list->INducedDate->viewAttributes() ?>><?php echo $ivf_outcome_list->INducedDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_list->Miscarriage->Visible) { // Miscarriage ?>
		<td data-name="Miscarriage" <?php echo $ivf_outcome_list->Miscarriage->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCount ?>_ivf_outcome_Miscarriage">
<span<?php echo $ivf_outcome_list->Miscarriage->viewAttributes() ?>><?php echo $ivf_outcome_list->Miscarriage->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_list->Induced1->Visible) { // Induced1 ?>
		<td data-name="Induced1" <?php echo $ivf_outcome_list->Induced1->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCount ?>_ivf_outcome_Induced1">
<span<?php echo $ivf_outcome_list->Induced1->viewAttributes() ?>><?php echo $ivf_outcome_list->Induced1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_list->Type->Visible) { // Type ?>
		<td data-name="Type" <?php echo $ivf_outcome_list->Type->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCount ?>_ivf_outcome_Type">
<span<?php echo $ivf_outcome_list->Type->viewAttributes() ?>><?php echo $ivf_outcome_list->Type->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_list->IfClinical->Visible) { // IfClinical ?>
		<td data-name="IfClinical" <?php echo $ivf_outcome_list->IfClinical->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCount ?>_ivf_outcome_IfClinical">
<span<?php echo $ivf_outcome_list->IfClinical->viewAttributes() ?>><?php echo $ivf_outcome_list->IfClinical->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_list->GADate->Visible) { // GADate ?>
		<td data-name="GADate" <?php echo $ivf_outcome_list->GADate->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCount ?>_ivf_outcome_GADate">
<span<?php echo $ivf_outcome_list->GADate->viewAttributes() ?>><?php echo $ivf_outcome_list->GADate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_list->GA->Visible) { // GA ?>
		<td data-name="GA" <?php echo $ivf_outcome_list->GA->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCount ?>_ivf_outcome_GA">
<span<?php echo $ivf_outcome_list->GA->viewAttributes() ?>><?php echo $ivf_outcome_list->GA->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_list->FoetalDeath->Visible) { // FoetalDeath ?>
		<td data-name="FoetalDeath" <?php echo $ivf_outcome_list->FoetalDeath->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCount ?>_ivf_outcome_FoetalDeath">
<span<?php echo $ivf_outcome_list->FoetalDeath->viewAttributes() ?>><?php echo $ivf_outcome_list->FoetalDeath->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_list->FerinatalDeath->Visible) { // FerinatalDeath ?>
		<td data-name="FerinatalDeath" <?php echo $ivf_outcome_list->FerinatalDeath->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCount ?>_ivf_outcome_FerinatalDeath">
<span<?php echo $ivf_outcome_list->FerinatalDeath->viewAttributes() ?>><?php echo $ivf_outcome_list->FerinatalDeath->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_list->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo" <?php echo $ivf_outcome_list->TidNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCount ?>_ivf_outcome_TidNo">
<span<?php echo $ivf_outcome_list->TidNo->viewAttributes() ?>><?php echo $ivf_outcome_list->TidNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_list->Ectopic->Visible) { // Ectopic ?>
		<td data-name="Ectopic" <?php echo $ivf_outcome_list->Ectopic->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCount ?>_ivf_outcome_Ectopic">
<span<?php echo $ivf_outcome_list->Ectopic->viewAttributes() ?>><?php echo $ivf_outcome_list->Ectopic->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_outcome_list->Extra->Visible) { // Extra ?>
		<td data-name="Extra" <?php echo $ivf_outcome_list->Extra->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_list->RowCount ?>_ivf_outcome_Extra">
<span<?php echo $ivf_outcome_list->Extra->viewAttributes() ?>><?php echo $ivf_outcome_list->Extra->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_outcome_list->ListOptions->render("body", "right", $ivf_outcome_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$ivf_outcome_list->isGridAdd())
		$ivf_outcome_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$ivf_outcome->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($ivf_outcome_list->Recordset)
	$ivf_outcome_list->Recordset->Close();
?>
<?php if (!$ivf_outcome_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$ivf_outcome_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $ivf_outcome_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ivf_outcome_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($ivf_outcome_list->TotalRecords == 0 && !$ivf_outcome->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $ivf_outcome_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$ivf_outcome_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$ivf_outcome_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$ivf_outcome->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_ivf_outcome",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$ivf_outcome_list->terminate();
?>