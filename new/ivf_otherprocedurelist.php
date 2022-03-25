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
$ivf_otherprocedure_list = new ivf_otherprocedure_list();

// Run the page
$ivf_otherprocedure_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_otherprocedure_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$ivf_otherprocedure_list->isExport()) { ?>
<script>
var fivf_otherprocedurelist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fivf_otherprocedurelist = currentForm = new ew.Form("fivf_otherprocedurelist", "list");
	fivf_otherprocedurelist.formKeyCountName = '<?php echo $ivf_otherprocedure_list->FormKeyCountName ?>';
	loadjs.done("fivf_otherprocedurelist");
});
var fivf_otherprocedurelistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fivf_otherprocedurelistsrch = currentSearchForm = new ew.Form("fivf_otherprocedurelistsrch");

	// Dynamic selection lists
	// Filters

	fivf_otherprocedurelistsrch.filterList = <?php echo $ivf_otherprocedure_list->getFilterList() ?>;
	loadjs.done("fivf_otherprocedurelistsrch");
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
<?php if (!$ivf_otherprocedure_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($ivf_otherprocedure_list->TotalRecords > 0 && $ivf_otherprocedure_list->ExportOptions->visible()) { ?>
<?php $ivf_otherprocedure_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_otherprocedure_list->ImportOptions->visible()) { ?>
<?php $ivf_otherprocedure_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_otherprocedure_list->SearchOptions->visible()) { ?>
<?php $ivf_otherprocedure_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_otherprocedure_list->FilterOptions->visible()) { ?>
<?php $ivf_otherprocedure_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$ivf_otherprocedure_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$ivf_otherprocedure_list->isExport() && !$ivf_otherprocedure->CurrentAction) { ?>
<form name="fivf_otherprocedurelistsrch" id="fivf_otherprocedurelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fivf_otherprocedurelistsrch-search-panel" class="<?php echo $ivf_otherprocedure_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="ivf_otherprocedure">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $ivf_otherprocedure_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($ivf_otherprocedure_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($ivf_otherprocedure_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $ivf_otherprocedure_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($ivf_otherprocedure_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($ivf_otherprocedure_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($ivf_otherprocedure_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($ivf_otherprocedure_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $ivf_otherprocedure_list->showPageHeader(); ?>
<?php
$ivf_otherprocedure_list->showMessage();
?>
<?php if ($ivf_otherprocedure_list->TotalRecords > 0 || $ivf_otherprocedure->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($ivf_otherprocedure_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf_otherprocedure">
<?php if (!$ivf_otherprocedure_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$ivf_otherprocedure_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $ivf_otherprocedure_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ivf_otherprocedure_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fivf_otherprocedurelist" id="fivf_otherprocedurelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_otherprocedure">
<div id="gmp_ivf_otherprocedure" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($ivf_otherprocedure_list->TotalRecords > 0 || $ivf_otherprocedure_list->isGridEdit()) { ?>
<table id="tbl_ivf_otherprocedurelist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$ivf_otherprocedure->RowType = ROWTYPE_HEADER;

// Render list options
$ivf_otherprocedure_list->renderListOptions();

// Render list options (header, left)
$ivf_otherprocedure_list->ListOptions->render("header", "left");
?>
<?php if ($ivf_otherprocedure_list->id->Visible) { // id ?>
	<?php if ($ivf_otherprocedure_list->SortUrl($ivf_otherprocedure_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $ivf_otherprocedure_list->id->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_id" class="ivf_otherprocedure_id"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $ivf_otherprocedure_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_otherprocedure_list->SortUrl($ivf_otherprocedure_list->id) ?>', 1);"><div id="elh_ivf_otherprocedure_id" class="ivf_otherprocedure_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_otherprocedure_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure_list->RIDNO->Visible) { // RIDNO ?>
	<?php if ($ivf_otherprocedure_list->SortUrl($ivf_otherprocedure_list->RIDNO) == "") { ?>
		<th data-name="RIDNO" class="<?php echo $ivf_otherprocedure_list->RIDNO->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_RIDNO" class="ivf_otherprocedure_RIDNO"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure_list->RIDNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RIDNO" class="<?php echo $ivf_otherprocedure_list->RIDNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_otherprocedure_list->SortUrl($ivf_otherprocedure_list->RIDNO) ?>', 1);"><div id="elh_ivf_otherprocedure_RIDNO" class="ivf_otherprocedure_RIDNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure_list->RIDNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure_list->RIDNO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_otherprocedure_list->RIDNO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure_list->Name->Visible) { // Name ?>
	<?php if ($ivf_otherprocedure_list->SortUrl($ivf_otherprocedure_list->Name) == "") { ?>
		<th data-name="Name" class="<?php echo $ivf_otherprocedure_list->Name->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_Name" class="ivf_otherprocedure_Name"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure_list->Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Name" class="<?php echo $ivf_otherprocedure_list->Name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_otherprocedure_list->SortUrl($ivf_otherprocedure_list->Name) ?>', 1);"><div id="elh_ivf_otherprocedure_Name" class="ivf_otherprocedure_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure_list->Name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure_list->Name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_otherprocedure_list->Name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure_list->DateofAdmission->Visible) { // DateofAdmission ?>
	<?php if ($ivf_otherprocedure_list->SortUrl($ivf_otherprocedure_list->DateofAdmission) == "") { ?>
		<th data-name="DateofAdmission" class="<?php echo $ivf_otherprocedure_list->DateofAdmission->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_DateofAdmission" class="ivf_otherprocedure_DateofAdmission"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure_list->DateofAdmission->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DateofAdmission" class="<?php echo $ivf_otherprocedure_list->DateofAdmission->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_otherprocedure_list->SortUrl($ivf_otherprocedure_list->DateofAdmission) ?>', 1);"><div id="elh_ivf_otherprocedure_DateofAdmission" class="ivf_otherprocedure_DateofAdmission">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure_list->DateofAdmission->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure_list->DateofAdmission->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_otherprocedure_list->DateofAdmission->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure_list->DateofProcedure->Visible) { // DateofProcedure ?>
	<?php if ($ivf_otherprocedure_list->SortUrl($ivf_otherprocedure_list->DateofProcedure) == "") { ?>
		<th data-name="DateofProcedure" class="<?php echo $ivf_otherprocedure_list->DateofProcedure->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_DateofProcedure" class="ivf_otherprocedure_DateofProcedure"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure_list->DateofProcedure->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DateofProcedure" class="<?php echo $ivf_otherprocedure_list->DateofProcedure->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_otherprocedure_list->SortUrl($ivf_otherprocedure_list->DateofProcedure) ?>', 1);"><div id="elh_ivf_otherprocedure_DateofProcedure" class="ivf_otherprocedure_DateofProcedure">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure_list->DateofProcedure->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure_list->DateofProcedure->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_otherprocedure_list->DateofProcedure->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure_list->DateofDischarge->Visible) { // DateofDischarge ?>
	<?php if ($ivf_otherprocedure_list->SortUrl($ivf_otherprocedure_list->DateofDischarge) == "") { ?>
		<th data-name="DateofDischarge" class="<?php echo $ivf_otherprocedure_list->DateofDischarge->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_DateofDischarge" class="ivf_otherprocedure_DateofDischarge"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure_list->DateofDischarge->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DateofDischarge" class="<?php echo $ivf_otherprocedure_list->DateofDischarge->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_otherprocedure_list->SortUrl($ivf_otherprocedure_list->DateofDischarge) ?>', 1);"><div id="elh_ivf_otherprocedure_DateofDischarge" class="ivf_otherprocedure_DateofDischarge">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure_list->DateofDischarge->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure_list->DateofDischarge->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_otherprocedure_list->DateofDischarge->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure_list->Consultant->Visible) { // Consultant ?>
	<?php if ($ivf_otherprocedure_list->SortUrl($ivf_otherprocedure_list->Consultant) == "") { ?>
		<th data-name="Consultant" class="<?php echo $ivf_otherprocedure_list->Consultant->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_Consultant" class="ivf_otherprocedure_Consultant"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure_list->Consultant->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Consultant" class="<?php echo $ivf_otherprocedure_list->Consultant->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_otherprocedure_list->SortUrl($ivf_otherprocedure_list->Consultant) ?>', 1);"><div id="elh_ivf_otherprocedure_Consultant" class="ivf_otherprocedure_Consultant">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure_list->Consultant->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure_list->Consultant->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_otherprocedure_list->Consultant->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure_list->Surgeon->Visible) { // Surgeon ?>
	<?php if ($ivf_otherprocedure_list->SortUrl($ivf_otherprocedure_list->Surgeon) == "") { ?>
		<th data-name="Surgeon" class="<?php echo $ivf_otherprocedure_list->Surgeon->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_Surgeon" class="ivf_otherprocedure_Surgeon"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure_list->Surgeon->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Surgeon" class="<?php echo $ivf_otherprocedure_list->Surgeon->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_otherprocedure_list->SortUrl($ivf_otherprocedure_list->Surgeon) ?>', 1);"><div id="elh_ivf_otherprocedure_Surgeon" class="ivf_otherprocedure_Surgeon">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure_list->Surgeon->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure_list->Surgeon->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_otherprocedure_list->Surgeon->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure_list->Anesthetist->Visible) { // Anesthetist ?>
	<?php if ($ivf_otherprocedure_list->SortUrl($ivf_otherprocedure_list->Anesthetist) == "") { ?>
		<th data-name="Anesthetist" class="<?php echo $ivf_otherprocedure_list->Anesthetist->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_Anesthetist" class="ivf_otherprocedure_Anesthetist"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure_list->Anesthetist->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Anesthetist" class="<?php echo $ivf_otherprocedure_list->Anesthetist->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_otherprocedure_list->SortUrl($ivf_otherprocedure_list->Anesthetist) ?>', 1);"><div id="elh_ivf_otherprocedure_Anesthetist" class="ivf_otherprocedure_Anesthetist">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure_list->Anesthetist->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure_list->Anesthetist->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_otherprocedure_list->Anesthetist->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure_list->IdentificationMark->Visible) { // IdentificationMark ?>
	<?php if ($ivf_otherprocedure_list->SortUrl($ivf_otherprocedure_list->IdentificationMark) == "") { ?>
		<th data-name="IdentificationMark" class="<?php echo $ivf_otherprocedure_list->IdentificationMark->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_IdentificationMark" class="ivf_otherprocedure_IdentificationMark"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure_list->IdentificationMark->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IdentificationMark" class="<?php echo $ivf_otherprocedure_list->IdentificationMark->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_otherprocedure_list->SortUrl($ivf_otherprocedure_list->IdentificationMark) ?>', 1);"><div id="elh_ivf_otherprocedure_IdentificationMark" class="ivf_otherprocedure_IdentificationMark">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure_list->IdentificationMark->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure_list->IdentificationMark->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_otherprocedure_list->IdentificationMark->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure_list->ProcedureDone->Visible) { // ProcedureDone ?>
	<?php if ($ivf_otherprocedure_list->SortUrl($ivf_otherprocedure_list->ProcedureDone) == "") { ?>
		<th data-name="ProcedureDone" class="<?php echo $ivf_otherprocedure_list->ProcedureDone->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_ProcedureDone" class="ivf_otherprocedure_ProcedureDone"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure_list->ProcedureDone->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProcedureDone" class="<?php echo $ivf_otherprocedure_list->ProcedureDone->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_otherprocedure_list->SortUrl($ivf_otherprocedure_list->ProcedureDone) ?>', 1);"><div id="elh_ivf_otherprocedure_ProcedureDone" class="ivf_otherprocedure_ProcedureDone">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure_list->ProcedureDone->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure_list->ProcedureDone->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_otherprocedure_list->ProcedureDone->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure_list->PROVISIONALDIAGNOSIS->Visible) { // PROVISIONALDIAGNOSIS ?>
	<?php if ($ivf_otherprocedure_list->SortUrl($ivf_otherprocedure_list->PROVISIONALDIAGNOSIS) == "") { ?>
		<th data-name="PROVISIONALDIAGNOSIS" class="<?php echo $ivf_otherprocedure_list->PROVISIONALDIAGNOSIS->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_PROVISIONALDIAGNOSIS" class="ivf_otherprocedure_PROVISIONALDIAGNOSIS"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure_list->PROVISIONALDIAGNOSIS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PROVISIONALDIAGNOSIS" class="<?php echo $ivf_otherprocedure_list->PROVISIONALDIAGNOSIS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_otherprocedure_list->SortUrl($ivf_otherprocedure_list->PROVISIONALDIAGNOSIS) ?>', 1);"><div id="elh_ivf_otherprocedure_PROVISIONALDIAGNOSIS" class="ivf_otherprocedure_PROVISIONALDIAGNOSIS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure_list->PROVISIONALDIAGNOSIS->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure_list->PROVISIONALDIAGNOSIS->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_otherprocedure_list->PROVISIONALDIAGNOSIS->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure_list->Chiefcomplaints->Visible) { // Chiefcomplaints ?>
	<?php if ($ivf_otherprocedure_list->SortUrl($ivf_otherprocedure_list->Chiefcomplaints) == "") { ?>
		<th data-name="Chiefcomplaints" class="<?php echo $ivf_otherprocedure_list->Chiefcomplaints->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_Chiefcomplaints" class="ivf_otherprocedure_Chiefcomplaints"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure_list->Chiefcomplaints->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Chiefcomplaints" class="<?php echo $ivf_otherprocedure_list->Chiefcomplaints->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_otherprocedure_list->SortUrl($ivf_otherprocedure_list->Chiefcomplaints) ?>', 1);"><div id="elh_ivf_otherprocedure_Chiefcomplaints" class="ivf_otherprocedure_Chiefcomplaints">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure_list->Chiefcomplaints->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure_list->Chiefcomplaints->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_otherprocedure_list->Chiefcomplaints->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure_list->MaritallHistory->Visible) { // MaritallHistory ?>
	<?php if ($ivf_otherprocedure_list->SortUrl($ivf_otherprocedure_list->MaritallHistory) == "") { ?>
		<th data-name="MaritallHistory" class="<?php echo $ivf_otherprocedure_list->MaritallHistory->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_MaritallHistory" class="ivf_otherprocedure_MaritallHistory"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure_list->MaritallHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MaritallHistory" class="<?php echo $ivf_otherprocedure_list->MaritallHistory->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_otherprocedure_list->SortUrl($ivf_otherprocedure_list->MaritallHistory) ?>', 1);"><div id="elh_ivf_otherprocedure_MaritallHistory" class="ivf_otherprocedure_MaritallHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure_list->MaritallHistory->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure_list->MaritallHistory->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_otherprocedure_list->MaritallHistory->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure_list->MenstrualHistory->Visible) { // MenstrualHistory ?>
	<?php if ($ivf_otherprocedure_list->SortUrl($ivf_otherprocedure_list->MenstrualHistory) == "") { ?>
		<th data-name="MenstrualHistory" class="<?php echo $ivf_otherprocedure_list->MenstrualHistory->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_MenstrualHistory" class="ivf_otherprocedure_MenstrualHistory"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure_list->MenstrualHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MenstrualHistory" class="<?php echo $ivf_otherprocedure_list->MenstrualHistory->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_otherprocedure_list->SortUrl($ivf_otherprocedure_list->MenstrualHistory) ?>', 1);"><div id="elh_ivf_otherprocedure_MenstrualHistory" class="ivf_otherprocedure_MenstrualHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure_list->MenstrualHistory->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure_list->MenstrualHistory->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_otherprocedure_list->MenstrualHistory->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure_list->SurgicalHistory->Visible) { // SurgicalHistory ?>
	<?php if ($ivf_otherprocedure_list->SortUrl($ivf_otherprocedure_list->SurgicalHistory) == "") { ?>
		<th data-name="SurgicalHistory" class="<?php echo $ivf_otherprocedure_list->SurgicalHistory->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_SurgicalHistory" class="ivf_otherprocedure_SurgicalHistory"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure_list->SurgicalHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SurgicalHistory" class="<?php echo $ivf_otherprocedure_list->SurgicalHistory->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_otherprocedure_list->SortUrl($ivf_otherprocedure_list->SurgicalHistory) ?>', 1);"><div id="elh_ivf_otherprocedure_SurgicalHistory" class="ivf_otherprocedure_SurgicalHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure_list->SurgicalHistory->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure_list->SurgicalHistory->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_otherprocedure_list->SurgicalHistory->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure_list->PastHistory->Visible) { // PastHistory ?>
	<?php if ($ivf_otherprocedure_list->SortUrl($ivf_otherprocedure_list->PastHistory) == "") { ?>
		<th data-name="PastHistory" class="<?php echo $ivf_otherprocedure_list->PastHistory->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_PastHistory" class="ivf_otherprocedure_PastHistory"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure_list->PastHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PastHistory" class="<?php echo $ivf_otherprocedure_list->PastHistory->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_otherprocedure_list->SortUrl($ivf_otherprocedure_list->PastHistory) ?>', 1);"><div id="elh_ivf_otherprocedure_PastHistory" class="ivf_otherprocedure_PastHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure_list->PastHistory->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure_list->PastHistory->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_otherprocedure_list->PastHistory->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure_list->FamilyHistory->Visible) { // FamilyHistory ?>
	<?php if ($ivf_otherprocedure_list->SortUrl($ivf_otherprocedure_list->FamilyHistory) == "") { ?>
		<th data-name="FamilyHistory" class="<?php echo $ivf_otherprocedure_list->FamilyHistory->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_FamilyHistory" class="ivf_otherprocedure_FamilyHistory"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure_list->FamilyHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FamilyHistory" class="<?php echo $ivf_otherprocedure_list->FamilyHistory->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_otherprocedure_list->SortUrl($ivf_otherprocedure_list->FamilyHistory) ?>', 1);"><div id="elh_ivf_otherprocedure_FamilyHistory" class="ivf_otherprocedure_FamilyHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure_list->FamilyHistory->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure_list->FamilyHistory->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_otherprocedure_list->FamilyHistory->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure_list->Temp->Visible) { // Temp ?>
	<?php if ($ivf_otherprocedure_list->SortUrl($ivf_otherprocedure_list->Temp) == "") { ?>
		<th data-name="Temp" class="<?php echo $ivf_otherprocedure_list->Temp->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_Temp" class="ivf_otherprocedure_Temp"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure_list->Temp->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Temp" class="<?php echo $ivf_otherprocedure_list->Temp->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_otherprocedure_list->SortUrl($ivf_otherprocedure_list->Temp) ?>', 1);"><div id="elh_ivf_otherprocedure_Temp" class="ivf_otherprocedure_Temp">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure_list->Temp->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure_list->Temp->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_otherprocedure_list->Temp->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure_list->Pulse->Visible) { // Pulse ?>
	<?php if ($ivf_otherprocedure_list->SortUrl($ivf_otherprocedure_list->Pulse) == "") { ?>
		<th data-name="Pulse" class="<?php echo $ivf_otherprocedure_list->Pulse->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_Pulse" class="ivf_otherprocedure_Pulse"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure_list->Pulse->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pulse" class="<?php echo $ivf_otherprocedure_list->Pulse->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_otherprocedure_list->SortUrl($ivf_otherprocedure_list->Pulse) ?>', 1);"><div id="elh_ivf_otherprocedure_Pulse" class="ivf_otherprocedure_Pulse">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure_list->Pulse->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure_list->Pulse->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_otherprocedure_list->Pulse->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure_list->BP->Visible) { // BP ?>
	<?php if ($ivf_otherprocedure_list->SortUrl($ivf_otherprocedure_list->BP) == "") { ?>
		<th data-name="BP" class="<?php echo $ivf_otherprocedure_list->BP->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_BP" class="ivf_otherprocedure_BP"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure_list->BP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BP" class="<?php echo $ivf_otherprocedure_list->BP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_otherprocedure_list->SortUrl($ivf_otherprocedure_list->BP) ?>', 1);"><div id="elh_ivf_otherprocedure_BP" class="ivf_otherprocedure_BP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure_list->BP->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure_list->BP->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_otherprocedure_list->BP->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure_list->CNS->Visible) { // CNS ?>
	<?php if ($ivf_otherprocedure_list->SortUrl($ivf_otherprocedure_list->CNS) == "") { ?>
		<th data-name="CNS" class="<?php echo $ivf_otherprocedure_list->CNS->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_CNS" class="ivf_otherprocedure_CNS"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure_list->CNS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CNS" class="<?php echo $ivf_otherprocedure_list->CNS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_otherprocedure_list->SortUrl($ivf_otherprocedure_list->CNS) ?>', 1);"><div id="elh_ivf_otherprocedure_CNS" class="ivf_otherprocedure_CNS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure_list->CNS->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure_list->CNS->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_otherprocedure_list->CNS->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure_list->_RS->Visible) { // RS ?>
	<?php if ($ivf_otherprocedure_list->SortUrl($ivf_otherprocedure_list->_RS) == "") { ?>
		<th data-name="_RS" class="<?php echo $ivf_otherprocedure_list->_RS->headerCellClass() ?>"><div id="elh_ivf_otherprocedure__RS" class="ivf_otherprocedure__RS"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure_list->_RS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_RS" class="<?php echo $ivf_otherprocedure_list->_RS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_otherprocedure_list->SortUrl($ivf_otherprocedure_list->_RS) ?>', 1);"><div id="elh_ivf_otherprocedure__RS" class="ivf_otherprocedure__RS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure_list->_RS->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure_list->_RS->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_otherprocedure_list->_RS->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure_list->CVS->Visible) { // CVS ?>
	<?php if ($ivf_otherprocedure_list->SortUrl($ivf_otherprocedure_list->CVS) == "") { ?>
		<th data-name="CVS" class="<?php echo $ivf_otherprocedure_list->CVS->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_CVS" class="ivf_otherprocedure_CVS"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure_list->CVS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CVS" class="<?php echo $ivf_otherprocedure_list->CVS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_otherprocedure_list->SortUrl($ivf_otherprocedure_list->CVS) ?>', 1);"><div id="elh_ivf_otherprocedure_CVS" class="ivf_otherprocedure_CVS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure_list->CVS->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure_list->CVS->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_otherprocedure_list->CVS->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure_list->PA->Visible) { // PA ?>
	<?php if ($ivf_otherprocedure_list->SortUrl($ivf_otherprocedure_list->PA) == "") { ?>
		<th data-name="PA" class="<?php echo $ivf_otherprocedure_list->PA->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_PA" class="ivf_otherprocedure_PA"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure_list->PA->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PA" class="<?php echo $ivf_otherprocedure_list->PA->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_otherprocedure_list->SortUrl($ivf_otherprocedure_list->PA) ?>', 1);"><div id="elh_ivf_otherprocedure_PA" class="ivf_otherprocedure_PA">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure_list->PA->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure_list->PA->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_otherprocedure_list->PA->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure_list->InvestigationReport->Visible) { // InvestigationReport ?>
	<?php if ($ivf_otherprocedure_list->SortUrl($ivf_otherprocedure_list->InvestigationReport) == "") { ?>
		<th data-name="InvestigationReport" class="<?php echo $ivf_otherprocedure_list->InvestigationReport->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_InvestigationReport" class="ivf_otherprocedure_InvestigationReport"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure_list->InvestigationReport->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="InvestigationReport" class="<?php echo $ivf_otherprocedure_list->InvestigationReport->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_otherprocedure_list->SortUrl($ivf_otherprocedure_list->InvestigationReport) ?>', 1);"><div id="elh_ivf_otherprocedure_InvestigationReport" class="ivf_otherprocedure_InvestigationReport">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure_list->InvestigationReport->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure_list->InvestigationReport->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_otherprocedure_list->InvestigationReport->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure_list->TidNo->Visible) { // TidNo ?>
	<?php if ($ivf_otherprocedure_list->SortUrl($ivf_otherprocedure_list->TidNo) == "") { ?>
		<th data-name="TidNo" class="<?php echo $ivf_otherprocedure_list->TidNo->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_TidNo" class="ivf_otherprocedure_TidNo"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure_list->TidNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TidNo" class="<?php echo $ivf_otherprocedure_list->TidNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_otherprocedure_list->SortUrl($ivf_otherprocedure_list->TidNo) ?>', 1);"><div id="elh_ivf_otherprocedure_TidNo" class="ivf_otherprocedure_TidNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure_list->TidNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure_list->TidNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_otherprocedure_list->TidNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$ivf_otherprocedure_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($ivf_otherprocedure_list->ExportAll && $ivf_otherprocedure_list->isExport()) {
	$ivf_otherprocedure_list->StopRecord = $ivf_otherprocedure_list->TotalRecords;
} else {

	// Set the last record to display
	if ($ivf_otherprocedure_list->TotalRecords > $ivf_otherprocedure_list->StartRecord + $ivf_otherprocedure_list->DisplayRecords - 1)
		$ivf_otherprocedure_list->StopRecord = $ivf_otherprocedure_list->StartRecord + $ivf_otherprocedure_list->DisplayRecords - 1;
	else
		$ivf_otherprocedure_list->StopRecord = $ivf_otherprocedure_list->TotalRecords;
}
$ivf_otherprocedure_list->RecordCount = $ivf_otherprocedure_list->StartRecord - 1;
if ($ivf_otherprocedure_list->Recordset && !$ivf_otherprocedure_list->Recordset->EOF) {
	$ivf_otherprocedure_list->Recordset->moveFirst();
	$selectLimit = $ivf_otherprocedure_list->UseSelectLimit;
	if (!$selectLimit && $ivf_otherprocedure_list->StartRecord > 1)
		$ivf_otherprocedure_list->Recordset->move($ivf_otherprocedure_list->StartRecord - 1);
} elseif (!$ivf_otherprocedure->AllowAddDeleteRow && $ivf_otherprocedure_list->StopRecord == 0) {
	$ivf_otherprocedure_list->StopRecord = $ivf_otherprocedure->GridAddRowCount;
}

// Initialize aggregate
$ivf_otherprocedure->RowType = ROWTYPE_AGGREGATEINIT;
$ivf_otherprocedure->resetAttributes();
$ivf_otherprocedure_list->renderRow();
while ($ivf_otherprocedure_list->RecordCount < $ivf_otherprocedure_list->StopRecord) {
	$ivf_otherprocedure_list->RecordCount++;
	if ($ivf_otherprocedure_list->RecordCount >= $ivf_otherprocedure_list->StartRecord) {
		$ivf_otherprocedure_list->RowCount++;

		// Set up key count
		$ivf_otherprocedure_list->KeyCount = $ivf_otherprocedure_list->RowIndex;

		// Init row class and style
		$ivf_otherprocedure->resetAttributes();
		$ivf_otherprocedure->CssClass = "";
		if ($ivf_otherprocedure_list->isGridAdd()) {
		} else {
			$ivf_otherprocedure_list->loadRowValues($ivf_otherprocedure_list->Recordset); // Load row values
		}
		$ivf_otherprocedure->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$ivf_otherprocedure->RowAttrs->merge(["data-rowindex" => $ivf_otherprocedure_list->RowCount, "id" => "r" . $ivf_otherprocedure_list->RowCount . "_ivf_otherprocedure", "data-rowtype" => $ivf_otherprocedure->RowType]);

		// Render row
		$ivf_otherprocedure_list->renderRow();

		// Render list options
		$ivf_otherprocedure_list->renderListOptions();
?>
	<tr <?php echo $ivf_otherprocedure->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_otherprocedure_list->ListOptions->render("body", "left", $ivf_otherprocedure_list->RowCount);
?>
	<?php if ($ivf_otherprocedure_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $ivf_otherprocedure_list->id->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_list->RowCount ?>_ivf_otherprocedure_id">
<span<?php echo $ivf_otherprocedure_list->id->viewAttributes() ?>><?php echo $ivf_otherprocedure_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure_list->RIDNO->Visible) { // RIDNO ?>
		<td data-name="RIDNO" <?php echo $ivf_otherprocedure_list->RIDNO->cellAttributes() ?>>
<script id="orig<?php echo $ivf_otherprocedure_list->RowCount ?>_ivf_otherprocedure_RIDNO" class="ivf_art_summaryedit" type="text/html">
<?php echo $ivf_otherprocedure_list->RIDNO->getViewValue() ?>
</script>
<span id="el<?php echo $ivf_otherprocedure_list->RowCount ?>_ivf_otherprocedure_RIDNO">
<span<?php echo $ivf_otherprocedure_list->RIDNO->viewAttributes() ?>><?php echo Barcode()->show($ivf_otherprocedure_list->RIDNO->CurrentValue, 'EAN-13', 60) ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure_list->Name->Visible) { // Name ?>
		<td data-name="Name" <?php echo $ivf_otherprocedure_list->Name->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_list->RowCount ?>_ivf_otherprocedure_Name">
<span<?php echo $ivf_otherprocedure_list->Name->viewAttributes() ?>><?php echo $ivf_otherprocedure_list->Name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure_list->DateofAdmission->Visible) { // DateofAdmission ?>
		<td data-name="DateofAdmission" <?php echo $ivf_otherprocedure_list->DateofAdmission->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_list->RowCount ?>_ivf_otherprocedure_DateofAdmission">
<span<?php echo $ivf_otherprocedure_list->DateofAdmission->viewAttributes() ?>><?php echo $ivf_otherprocedure_list->DateofAdmission->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure_list->DateofProcedure->Visible) { // DateofProcedure ?>
		<td data-name="DateofProcedure" <?php echo $ivf_otherprocedure_list->DateofProcedure->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_list->RowCount ?>_ivf_otherprocedure_DateofProcedure">
<span<?php echo $ivf_otherprocedure_list->DateofProcedure->viewAttributes() ?>><?php echo $ivf_otherprocedure_list->DateofProcedure->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure_list->DateofDischarge->Visible) { // DateofDischarge ?>
		<td data-name="DateofDischarge" <?php echo $ivf_otherprocedure_list->DateofDischarge->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_list->RowCount ?>_ivf_otherprocedure_DateofDischarge">
<span<?php echo $ivf_otherprocedure_list->DateofDischarge->viewAttributes() ?>><?php echo $ivf_otherprocedure_list->DateofDischarge->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure_list->Consultant->Visible) { // Consultant ?>
		<td data-name="Consultant" <?php echo $ivf_otherprocedure_list->Consultant->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_list->RowCount ?>_ivf_otherprocedure_Consultant">
<span<?php echo $ivf_otherprocedure_list->Consultant->viewAttributes() ?>><?php echo $ivf_otherprocedure_list->Consultant->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure_list->Surgeon->Visible) { // Surgeon ?>
		<td data-name="Surgeon" <?php echo $ivf_otherprocedure_list->Surgeon->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_list->RowCount ?>_ivf_otherprocedure_Surgeon">
<span<?php echo $ivf_otherprocedure_list->Surgeon->viewAttributes() ?>><?php echo $ivf_otherprocedure_list->Surgeon->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure_list->Anesthetist->Visible) { // Anesthetist ?>
		<td data-name="Anesthetist" <?php echo $ivf_otherprocedure_list->Anesthetist->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_list->RowCount ?>_ivf_otherprocedure_Anesthetist">
<span<?php echo $ivf_otherprocedure_list->Anesthetist->viewAttributes() ?>><?php echo $ivf_otherprocedure_list->Anesthetist->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure_list->IdentificationMark->Visible) { // IdentificationMark ?>
		<td data-name="IdentificationMark" <?php echo $ivf_otherprocedure_list->IdentificationMark->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_list->RowCount ?>_ivf_otherprocedure_IdentificationMark">
<span<?php echo $ivf_otherprocedure_list->IdentificationMark->viewAttributes() ?>><?php echo $ivf_otherprocedure_list->IdentificationMark->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure_list->ProcedureDone->Visible) { // ProcedureDone ?>
		<td data-name="ProcedureDone" <?php echo $ivf_otherprocedure_list->ProcedureDone->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_list->RowCount ?>_ivf_otherprocedure_ProcedureDone">
<span<?php echo $ivf_otherprocedure_list->ProcedureDone->viewAttributes() ?>><?php echo $ivf_otherprocedure_list->ProcedureDone->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure_list->PROVISIONALDIAGNOSIS->Visible) { // PROVISIONALDIAGNOSIS ?>
		<td data-name="PROVISIONALDIAGNOSIS" <?php echo $ivf_otherprocedure_list->PROVISIONALDIAGNOSIS->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_list->RowCount ?>_ivf_otherprocedure_PROVISIONALDIAGNOSIS">
<span<?php echo $ivf_otherprocedure_list->PROVISIONALDIAGNOSIS->viewAttributes() ?>><?php echo $ivf_otherprocedure_list->PROVISIONALDIAGNOSIS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure_list->Chiefcomplaints->Visible) { // Chiefcomplaints ?>
		<td data-name="Chiefcomplaints" <?php echo $ivf_otherprocedure_list->Chiefcomplaints->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_list->RowCount ?>_ivf_otherprocedure_Chiefcomplaints">
<span<?php echo $ivf_otherprocedure_list->Chiefcomplaints->viewAttributes() ?>><?php echo $ivf_otherprocedure_list->Chiefcomplaints->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure_list->MaritallHistory->Visible) { // MaritallHistory ?>
		<td data-name="MaritallHistory" <?php echo $ivf_otherprocedure_list->MaritallHistory->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_list->RowCount ?>_ivf_otherprocedure_MaritallHistory">
<span<?php echo $ivf_otherprocedure_list->MaritallHistory->viewAttributes() ?>><?php echo $ivf_otherprocedure_list->MaritallHistory->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure_list->MenstrualHistory->Visible) { // MenstrualHistory ?>
		<td data-name="MenstrualHistory" <?php echo $ivf_otherprocedure_list->MenstrualHistory->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_list->RowCount ?>_ivf_otherprocedure_MenstrualHistory">
<span<?php echo $ivf_otherprocedure_list->MenstrualHistory->viewAttributes() ?>><?php echo $ivf_otherprocedure_list->MenstrualHistory->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure_list->SurgicalHistory->Visible) { // SurgicalHistory ?>
		<td data-name="SurgicalHistory" <?php echo $ivf_otherprocedure_list->SurgicalHistory->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_list->RowCount ?>_ivf_otherprocedure_SurgicalHistory">
<span<?php echo $ivf_otherprocedure_list->SurgicalHistory->viewAttributes() ?>><?php echo $ivf_otherprocedure_list->SurgicalHistory->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure_list->PastHistory->Visible) { // PastHistory ?>
		<td data-name="PastHistory" <?php echo $ivf_otherprocedure_list->PastHistory->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_list->RowCount ?>_ivf_otherprocedure_PastHistory">
<span<?php echo $ivf_otherprocedure_list->PastHistory->viewAttributes() ?>><?php echo $ivf_otherprocedure_list->PastHistory->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure_list->FamilyHistory->Visible) { // FamilyHistory ?>
		<td data-name="FamilyHistory" <?php echo $ivf_otherprocedure_list->FamilyHistory->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_list->RowCount ?>_ivf_otherprocedure_FamilyHistory">
<span<?php echo $ivf_otherprocedure_list->FamilyHistory->viewAttributes() ?>><?php echo $ivf_otherprocedure_list->FamilyHistory->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure_list->Temp->Visible) { // Temp ?>
		<td data-name="Temp" <?php echo $ivf_otherprocedure_list->Temp->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_list->RowCount ?>_ivf_otherprocedure_Temp">
<span<?php echo $ivf_otherprocedure_list->Temp->viewAttributes() ?>><?php echo $ivf_otherprocedure_list->Temp->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure_list->Pulse->Visible) { // Pulse ?>
		<td data-name="Pulse" <?php echo $ivf_otherprocedure_list->Pulse->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_list->RowCount ?>_ivf_otherprocedure_Pulse">
<span<?php echo $ivf_otherprocedure_list->Pulse->viewAttributes() ?>><?php echo $ivf_otherprocedure_list->Pulse->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure_list->BP->Visible) { // BP ?>
		<td data-name="BP" <?php echo $ivf_otherprocedure_list->BP->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_list->RowCount ?>_ivf_otherprocedure_BP">
<span<?php echo $ivf_otherprocedure_list->BP->viewAttributes() ?>><?php echo $ivf_otherprocedure_list->BP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure_list->CNS->Visible) { // CNS ?>
		<td data-name="CNS" <?php echo $ivf_otherprocedure_list->CNS->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_list->RowCount ?>_ivf_otherprocedure_CNS">
<span<?php echo $ivf_otherprocedure_list->CNS->viewAttributes() ?>><?php echo $ivf_otherprocedure_list->CNS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure_list->_RS->Visible) { // RS ?>
		<td data-name="_RS" <?php echo $ivf_otherprocedure_list->_RS->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_list->RowCount ?>_ivf_otherprocedure__RS">
<span<?php echo $ivf_otherprocedure_list->_RS->viewAttributes() ?>><?php echo $ivf_otherprocedure_list->_RS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure_list->CVS->Visible) { // CVS ?>
		<td data-name="CVS" <?php echo $ivf_otherprocedure_list->CVS->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_list->RowCount ?>_ivf_otherprocedure_CVS">
<span<?php echo $ivf_otherprocedure_list->CVS->viewAttributes() ?>><?php echo $ivf_otherprocedure_list->CVS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure_list->PA->Visible) { // PA ?>
		<td data-name="PA" <?php echo $ivf_otherprocedure_list->PA->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_list->RowCount ?>_ivf_otherprocedure_PA">
<span<?php echo $ivf_otherprocedure_list->PA->viewAttributes() ?>><?php echo $ivf_otherprocedure_list->PA->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure_list->InvestigationReport->Visible) { // InvestigationReport ?>
		<td data-name="InvestigationReport" <?php echo $ivf_otherprocedure_list->InvestigationReport->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_list->RowCount ?>_ivf_otherprocedure_InvestigationReport">
<span<?php echo $ivf_otherprocedure_list->InvestigationReport->viewAttributes() ?>><?php echo $ivf_otherprocedure_list->InvestigationReport->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure_list->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo" <?php echo $ivf_otherprocedure_list->TidNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_otherprocedure_list->RowCount ?>_ivf_otherprocedure_TidNo">
<span<?php echo $ivf_otherprocedure_list->TidNo->viewAttributes() ?>><?php echo $ivf_otherprocedure_list->TidNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_otherprocedure_list->ListOptions->render("body", "right", $ivf_otherprocedure_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$ivf_otherprocedure_list->isGridAdd())
		$ivf_otherprocedure_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$ivf_otherprocedure->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($ivf_otherprocedure_list->Recordset)
	$ivf_otherprocedure_list->Recordset->Close();
?>
<?php if (!$ivf_otherprocedure_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$ivf_otherprocedure_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $ivf_otherprocedure_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ivf_otherprocedure_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($ivf_otherprocedure_list->TotalRecords == 0 && !$ivf_otherprocedure->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $ivf_otherprocedure_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$ivf_otherprocedure_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$ivf_otherprocedure_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$ivf_otherprocedure->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_ivf_otherprocedure",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$ivf_otherprocedure_list->terminate();
?>