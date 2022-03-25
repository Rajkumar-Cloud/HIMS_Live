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
$ivf_art_summary_list = new ivf_art_summary_list();

// Run the page
$ivf_art_summary_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_art_summary_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$ivf_art_summary_list->isExport()) { ?>
<script>
var fivf_art_summarylist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fivf_art_summarylist = currentForm = new ew.Form("fivf_art_summarylist", "list");
	fivf_art_summarylist.formKeyCountName = '<?php echo $ivf_art_summary_list->FormKeyCountName ?>';
	loadjs.done("fivf_art_summarylist");
});
var fivf_art_summarylistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fivf_art_summarylistsrch = currentSearchForm = new ew.Form("fivf_art_summarylistsrch");

	// Dynamic selection lists
	// Filters

	fivf_art_summarylistsrch.filterList = <?php echo $ivf_art_summary_list->getFilterList() ?>;
	loadjs.done("fivf_art_summarylistsrch");
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
<?php if (!$ivf_art_summary_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($ivf_art_summary_list->TotalRecords > 0 && $ivf_art_summary_list->ExportOptions->visible()) { ?>
<?php $ivf_art_summary_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_art_summary_list->ImportOptions->visible()) { ?>
<?php $ivf_art_summary_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_art_summary_list->SearchOptions->visible()) { ?>
<?php $ivf_art_summary_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($ivf_art_summary_list->FilterOptions->visible()) { ?>
<?php $ivf_art_summary_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$ivf_art_summary_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$ivf_art_summary_list->isExport() && !$ivf_art_summary->CurrentAction) { ?>
<form name="fivf_art_summarylistsrch" id="fivf_art_summarylistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fivf_art_summarylistsrch-search-panel" class="<?php echo $ivf_art_summary_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="ivf_art_summary">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $ivf_art_summary_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($ivf_art_summary_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($ivf_art_summary_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $ivf_art_summary_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($ivf_art_summary_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($ivf_art_summary_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($ivf_art_summary_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($ivf_art_summary_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $ivf_art_summary_list->showPageHeader(); ?>
<?php
$ivf_art_summary_list->showMessage();
?>
<?php if ($ivf_art_summary_list->TotalRecords > 0 || $ivf_art_summary->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($ivf_art_summary_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf_art_summary">
<?php if (!$ivf_art_summary_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$ivf_art_summary_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $ivf_art_summary_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ivf_art_summary_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fivf_art_summarylist" id="fivf_art_summarylist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_art_summary">
<div id="gmp_ivf_art_summary" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($ivf_art_summary_list->TotalRecords > 0 || $ivf_art_summary_list->isGridEdit()) { ?>
<table id="tbl_ivf_art_summarylist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$ivf_art_summary->RowType = ROWTYPE_HEADER;

// Render list options
$ivf_art_summary_list->renderListOptions();

// Render list options (header, left)
$ivf_art_summary_list->ListOptions->render("header", "left");
?>
<?php if ($ivf_art_summary_list->id->Visible) { // id ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $ivf_art_summary_list->id->headerCellClass() ?>"><div id="elh_ivf_art_summary_id" class="ivf_art_summary_id"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $ivf_art_summary_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->id) ?>', 1);"><div id="elh_ivf_art_summary_id" class="ivf_art_summary_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->ARTCycle->Visible) { // ARTCycle ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->ARTCycle) == "") { ?>
		<th data-name="ARTCycle" class="<?php echo $ivf_art_summary_list->ARTCycle->headerCellClass() ?>"><div id="elh_ivf_art_summary_ARTCycle" class="ivf_art_summary_ARTCycle"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->ARTCycle->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ARTCycle" class="<?php echo $ivf_art_summary_list->ARTCycle->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->ARTCycle) ?>', 1);"><div id="elh_ivf_art_summary_ARTCycle" class="ivf_art_summary_ARTCycle">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->ARTCycle->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->ARTCycle->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->ARTCycle->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->Spermorigin->Visible) { // Spermorigin ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->Spermorigin) == "") { ?>
		<th data-name="Spermorigin" class="<?php echo $ivf_art_summary_list->Spermorigin->headerCellClass() ?>"><div id="elh_ivf_art_summary_Spermorigin" class="ivf_art_summary_Spermorigin"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Spermorigin->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Spermorigin" class="<?php echo $ivf_art_summary_list->Spermorigin->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->Spermorigin) ?>', 1);"><div id="elh_ivf_art_summary_Spermorigin" class="ivf_art_summary_Spermorigin">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Spermorigin->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->Spermorigin->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->Spermorigin->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->IndicationforART->Visible) { // IndicationforART ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->IndicationforART) == "") { ?>
		<th data-name="IndicationforART" class="<?php echo $ivf_art_summary_list->IndicationforART->headerCellClass() ?>"><div id="elh_ivf_art_summary_IndicationforART" class="ivf_art_summary_IndicationforART"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->IndicationforART->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IndicationforART" class="<?php echo $ivf_art_summary_list->IndicationforART->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->IndicationforART) ?>', 1);"><div id="elh_ivf_art_summary_IndicationforART" class="ivf_art_summary_IndicationforART">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->IndicationforART->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->IndicationforART->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->IndicationforART->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->DateofICSI->Visible) { // DateofICSI ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->DateofICSI) == "") { ?>
		<th data-name="DateofICSI" class="<?php echo $ivf_art_summary_list->DateofICSI->headerCellClass() ?>"><div id="elh_ivf_art_summary_DateofICSI" class="ivf_art_summary_DateofICSI"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->DateofICSI->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DateofICSI" class="<?php echo $ivf_art_summary_list->DateofICSI->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->DateofICSI) ?>', 1);"><div id="elh_ivf_art_summary_DateofICSI" class="ivf_art_summary_DateofICSI">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->DateofICSI->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->DateofICSI->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->DateofICSI->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->Origin->Visible) { // Origin ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->Origin) == "") { ?>
		<th data-name="Origin" class="<?php echo $ivf_art_summary_list->Origin->headerCellClass() ?>"><div id="elh_ivf_art_summary_Origin" class="ivf_art_summary_Origin"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Origin->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Origin" class="<?php echo $ivf_art_summary_list->Origin->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->Origin) ?>', 1);"><div id="elh_ivf_art_summary_Origin" class="ivf_art_summary_Origin">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Origin->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->Origin->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->Origin->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->Status->Visible) { // Status ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->Status) == "") { ?>
		<th data-name="Status" class="<?php echo $ivf_art_summary_list->Status->headerCellClass() ?>"><div id="elh_ivf_art_summary_Status" class="ivf_art_summary_Status"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Status" class="<?php echo $ivf_art_summary_list->Status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->Status) ?>', 1);"><div id="elh_ivf_art_summary_Status" class="ivf_art_summary_Status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Status->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->Status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->Status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->Method->Visible) { // Method ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->Method) == "") { ?>
		<th data-name="Method" class="<?php echo $ivf_art_summary_list->Method->headerCellClass() ?>"><div id="elh_ivf_art_summary_Method" class="ivf_art_summary_Method"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Method->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Method" class="<?php echo $ivf_art_summary_list->Method->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->Method) ?>', 1);"><div id="elh_ivf_art_summary_Method" class="ivf_art_summary_Method">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Method->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->Method->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->Method->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->pre_Concentration->Visible) { // pre_Concentration ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->pre_Concentration) == "") { ?>
		<th data-name="pre_Concentration" class="<?php echo $ivf_art_summary_list->pre_Concentration->headerCellClass() ?>"><div id="elh_ivf_art_summary_pre_Concentration" class="ivf_art_summary_pre_Concentration"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->pre_Concentration->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pre_Concentration" class="<?php echo $ivf_art_summary_list->pre_Concentration->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->pre_Concentration) ?>', 1);"><div id="elh_ivf_art_summary_pre_Concentration" class="ivf_art_summary_pre_Concentration">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->pre_Concentration->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->pre_Concentration->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->pre_Concentration->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->pre_Motility->Visible) { // pre_Motility ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->pre_Motility) == "") { ?>
		<th data-name="pre_Motility" class="<?php echo $ivf_art_summary_list->pre_Motility->headerCellClass() ?>"><div id="elh_ivf_art_summary_pre_Motility" class="ivf_art_summary_pre_Motility"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->pre_Motility->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pre_Motility" class="<?php echo $ivf_art_summary_list->pre_Motility->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->pre_Motility) ?>', 1);"><div id="elh_ivf_art_summary_pre_Motility" class="ivf_art_summary_pre_Motility">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->pre_Motility->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->pre_Motility->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->pre_Motility->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->pre_Morphology->Visible) { // pre_Morphology ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->pre_Morphology) == "") { ?>
		<th data-name="pre_Morphology" class="<?php echo $ivf_art_summary_list->pre_Morphology->headerCellClass() ?>"><div id="elh_ivf_art_summary_pre_Morphology" class="ivf_art_summary_pre_Morphology"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->pre_Morphology->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pre_Morphology" class="<?php echo $ivf_art_summary_list->pre_Morphology->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->pre_Morphology) ?>', 1);"><div id="elh_ivf_art_summary_pre_Morphology" class="ivf_art_summary_pre_Morphology">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->pre_Morphology->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->pre_Morphology->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->pre_Morphology->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->post_Concentration->Visible) { // post_Concentration ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->post_Concentration) == "") { ?>
		<th data-name="post_Concentration" class="<?php echo $ivf_art_summary_list->post_Concentration->headerCellClass() ?>"><div id="elh_ivf_art_summary_post_Concentration" class="ivf_art_summary_post_Concentration"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->post_Concentration->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="post_Concentration" class="<?php echo $ivf_art_summary_list->post_Concentration->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->post_Concentration) ?>', 1);"><div id="elh_ivf_art_summary_post_Concentration" class="ivf_art_summary_post_Concentration">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->post_Concentration->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->post_Concentration->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->post_Concentration->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->post_Motility->Visible) { // post_Motility ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->post_Motility) == "") { ?>
		<th data-name="post_Motility" class="<?php echo $ivf_art_summary_list->post_Motility->headerCellClass() ?>"><div id="elh_ivf_art_summary_post_Motility" class="ivf_art_summary_post_Motility"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->post_Motility->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="post_Motility" class="<?php echo $ivf_art_summary_list->post_Motility->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->post_Motility) ?>', 1);"><div id="elh_ivf_art_summary_post_Motility" class="ivf_art_summary_post_Motility">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->post_Motility->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->post_Motility->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->post_Motility->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->post_Morphology->Visible) { // post_Morphology ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->post_Morphology) == "") { ?>
		<th data-name="post_Morphology" class="<?php echo $ivf_art_summary_list->post_Morphology->headerCellClass() ?>"><div id="elh_ivf_art_summary_post_Morphology" class="ivf_art_summary_post_Morphology"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->post_Morphology->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="post_Morphology" class="<?php echo $ivf_art_summary_list->post_Morphology->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->post_Morphology) ?>', 1);"><div id="elh_ivf_art_summary_post_Morphology" class="ivf_art_summary_post_Morphology">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->post_Morphology->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->post_Morphology->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->post_Morphology->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->NumberofEmbryostransferred->Visible) { // NumberofEmbryostransferred ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->NumberofEmbryostransferred) == "") { ?>
		<th data-name="NumberofEmbryostransferred" class="<?php echo $ivf_art_summary_list->NumberofEmbryostransferred->headerCellClass() ?>"><div id="elh_ivf_art_summary_NumberofEmbryostransferred" class="ivf_art_summary_NumberofEmbryostransferred"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->NumberofEmbryostransferred->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NumberofEmbryostransferred" class="<?php echo $ivf_art_summary_list->NumberofEmbryostransferred->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->NumberofEmbryostransferred) ?>', 1);"><div id="elh_ivf_art_summary_NumberofEmbryostransferred" class="ivf_art_summary_NumberofEmbryostransferred">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->NumberofEmbryostransferred->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->NumberofEmbryostransferred->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->NumberofEmbryostransferred->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->Embryosunderobservation->Visible) { // Embryosunderobservation ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->Embryosunderobservation) == "") { ?>
		<th data-name="Embryosunderobservation" class="<?php echo $ivf_art_summary_list->Embryosunderobservation->headerCellClass() ?>"><div id="elh_ivf_art_summary_Embryosunderobservation" class="ivf_art_summary_Embryosunderobservation"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Embryosunderobservation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Embryosunderobservation" class="<?php echo $ivf_art_summary_list->Embryosunderobservation->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->Embryosunderobservation) ?>', 1);"><div id="elh_ivf_art_summary_Embryosunderobservation" class="ivf_art_summary_Embryosunderobservation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Embryosunderobservation->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->Embryosunderobservation->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->Embryosunderobservation->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->EmbryoDevelopmentSummary->Visible) { // EmbryoDevelopmentSummary ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->EmbryoDevelopmentSummary) == "") { ?>
		<th data-name="EmbryoDevelopmentSummary" class="<?php echo $ivf_art_summary_list->EmbryoDevelopmentSummary->headerCellClass() ?>"><div id="elh_ivf_art_summary_EmbryoDevelopmentSummary" class="ivf_art_summary_EmbryoDevelopmentSummary"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->EmbryoDevelopmentSummary->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EmbryoDevelopmentSummary" class="<?php echo $ivf_art_summary_list->EmbryoDevelopmentSummary->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->EmbryoDevelopmentSummary) ?>', 1);"><div id="elh_ivf_art_summary_EmbryoDevelopmentSummary" class="ivf_art_summary_EmbryoDevelopmentSummary">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->EmbryoDevelopmentSummary->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->EmbryoDevelopmentSummary->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->EmbryoDevelopmentSummary->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->EmbryologistSignature->Visible) { // EmbryologistSignature ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->EmbryologistSignature) == "") { ?>
		<th data-name="EmbryologistSignature" class="<?php echo $ivf_art_summary_list->EmbryologistSignature->headerCellClass() ?>"><div id="elh_ivf_art_summary_EmbryologistSignature" class="ivf_art_summary_EmbryologistSignature"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->EmbryologistSignature->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EmbryologistSignature" class="<?php echo $ivf_art_summary_list->EmbryologistSignature->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->EmbryologistSignature) ?>', 1);"><div id="elh_ivf_art_summary_EmbryologistSignature" class="ivf_art_summary_EmbryologistSignature">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->EmbryologistSignature->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->EmbryologistSignature->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->EmbryologistSignature->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->IVFRegistrationID->Visible) { // IVFRegistrationID ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->IVFRegistrationID) == "") { ?>
		<th data-name="IVFRegistrationID" class="<?php echo $ivf_art_summary_list->IVFRegistrationID->headerCellClass() ?>"><div id="elh_ivf_art_summary_IVFRegistrationID" class="ivf_art_summary_IVFRegistrationID"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->IVFRegistrationID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IVFRegistrationID" class="<?php echo $ivf_art_summary_list->IVFRegistrationID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->IVFRegistrationID) ?>', 1);"><div id="elh_ivf_art_summary_IVFRegistrationID" class="ivf_art_summary_IVFRegistrationID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->IVFRegistrationID->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->IVFRegistrationID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->IVFRegistrationID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->InseminatinTechnique) == "") { ?>
		<th data-name="InseminatinTechnique" class="<?php echo $ivf_art_summary_list->InseminatinTechnique->headerCellClass() ?>"><div id="elh_ivf_art_summary_InseminatinTechnique" class="ivf_art_summary_InseminatinTechnique"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->InseminatinTechnique->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="InseminatinTechnique" class="<?php echo $ivf_art_summary_list->InseminatinTechnique->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->InseminatinTechnique) ?>', 1);"><div id="elh_ivf_art_summary_InseminatinTechnique" class="ivf_art_summary_InseminatinTechnique">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->InseminatinTechnique->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->InseminatinTechnique->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->InseminatinTechnique->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->ICSIDetails->Visible) { // ICSIDetails ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->ICSIDetails) == "") { ?>
		<th data-name="ICSIDetails" class="<?php echo $ivf_art_summary_list->ICSIDetails->headerCellClass() ?>"><div id="elh_ivf_art_summary_ICSIDetails" class="ivf_art_summary_ICSIDetails"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->ICSIDetails->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ICSIDetails" class="<?php echo $ivf_art_summary_list->ICSIDetails->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->ICSIDetails) ?>', 1);"><div id="elh_ivf_art_summary_ICSIDetails" class="ivf_art_summary_ICSIDetails">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->ICSIDetails->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->ICSIDetails->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->ICSIDetails->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->DateofET->Visible) { // DateofET ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->DateofET) == "") { ?>
		<th data-name="DateofET" class="<?php echo $ivf_art_summary_list->DateofET->headerCellClass() ?>"><div id="elh_ivf_art_summary_DateofET" class="ivf_art_summary_DateofET"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->DateofET->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DateofET" class="<?php echo $ivf_art_summary_list->DateofET->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->DateofET) ?>', 1);"><div id="elh_ivf_art_summary_DateofET" class="ivf_art_summary_DateofET">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->DateofET->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->DateofET->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->DateofET->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->Reasonfornotranfer->Visible) { // Reasonfornotranfer ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->Reasonfornotranfer) == "") { ?>
		<th data-name="Reasonfornotranfer" class="<?php echo $ivf_art_summary_list->Reasonfornotranfer->headerCellClass() ?>"><div id="elh_ivf_art_summary_Reasonfornotranfer" class="ivf_art_summary_Reasonfornotranfer"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Reasonfornotranfer->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Reasonfornotranfer" class="<?php echo $ivf_art_summary_list->Reasonfornotranfer->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->Reasonfornotranfer) ?>', 1);"><div id="elh_ivf_art_summary_Reasonfornotranfer" class="ivf_art_summary_Reasonfornotranfer">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Reasonfornotranfer->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->Reasonfornotranfer->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->Reasonfornotranfer->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->EmbryosCryopreserved->Visible) { // EmbryosCryopreserved ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->EmbryosCryopreserved) == "") { ?>
		<th data-name="EmbryosCryopreserved" class="<?php echo $ivf_art_summary_list->EmbryosCryopreserved->headerCellClass() ?>"><div id="elh_ivf_art_summary_EmbryosCryopreserved" class="ivf_art_summary_EmbryosCryopreserved"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->EmbryosCryopreserved->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EmbryosCryopreserved" class="<?php echo $ivf_art_summary_list->EmbryosCryopreserved->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->EmbryosCryopreserved) ?>', 1);"><div id="elh_ivf_art_summary_EmbryosCryopreserved" class="ivf_art_summary_EmbryosCryopreserved">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->EmbryosCryopreserved->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->EmbryosCryopreserved->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->EmbryosCryopreserved->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->LegendCellStage->Visible) { // LegendCellStage ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->LegendCellStage) == "") { ?>
		<th data-name="LegendCellStage" class="<?php echo $ivf_art_summary_list->LegendCellStage->headerCellClass() ?>"><div id="elh_ivf_art_summary_LegendCellStage" class="ivf_art_summary_LegendCellStage"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->LegendCellStage->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LegendCellStage" class="<?php echo $ivf_art_summary_list->LegendCellStage->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->LegendCellStage) ?>', 1);"><div id="elh_ivf_art_summary_LegendCellStage" class="ivf_art_summary_LegendCellStage">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->LegendCellStage->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->LegendCellStage->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->LegendCellStage->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->ConsultantsSignature->Visible) { // ConsultantsSignature ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->ConsultantsSignature) == "") { ?>
		<th data-name="ConsultantsSignature" class="<?php echo $ivf_art_summary_list->ConsultantsSignature->headerCellClass() ?>"><div id="elh_ivf_art_summary_ConsultantsSignature" class="ivf_art_summary_ConsultantsSignature"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->ConsultantsSignature->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ConsultantsSignature" class="<?php echo $ivf_art_summary_list->ConsultantsSignature->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->ConsultantsSignature) ?>', 1);"><div id="elh_ivf_art_summary_ConsultantsSignature" class="ivf_art_summary_ConsultantsSignature">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->ConsultantsSignature->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->ConsultantsSignature->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->ConsultantsSignature->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->Name->Visible) { // Name ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->Name) == "") { ?>
		<th data-name="Name" class="<?php echo $ivf_art_summary_list->Name->headerCellClass() ?>"><div id="elh_ivf_art_summary_Name" class="ivf_art_summary_Name"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Name" class="<?php echo $ivf_art_summary_list->Name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->Name) ?>', 1);"><div id="elh_ivf_art_summary_Name" class="ivf_art_summary_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->Name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->Name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->M2->Visible) { // M2 ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->M2) == "") { ?>
		<th data-name="M2" class="<?php echo $ivf_art_summary_list->M2->headerCellClass() ?>"><div id="elh_ivf_art_summary_M2" class="ivf_art_summary_M2"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->M2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="M2" class="<?php echo $ivf_art_summary_list->M2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->M2) ?>', 1);"><div id="elh_ivf_art_summary_M2" class="ivf_art_summary_M2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->M2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->M2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->M2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->Mi2->Visible) { // Mi2 ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->Mi2) == "") { ?>
		<th data-name="Mi2" class="<?php echo $ivf_art_summary_list->Mi2->headerCellClass() ?>"><div id="elh_ivf_art_summary_Mi2" class="ivf_art_summary_Mi2"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Mi2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mi2" class="<?php echo $ivf_art_summary_list->Mi2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->Mi2) ?>', 1);"><div id="elh_ivf_art_summary_Mi2" class="ivf_art_summary_Mi2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Mi2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->Mi2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->Mi2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->ICSI->Visible) { // ICSI ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->ICSI) == "") { ?>
		<th data-name="ICSI" class="<?php echo $ivf_art_summary_list->ICSI->headerCellClass() ?>"><div id="elh_ivf_art_summary_ICSI" class="ivf_art_summary_ICSI"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->ICSI->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ICSI" class="<?php echo $ivf_art_summary_list->ICSI->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->ICSI) ?>', 1);"><div id="elh_ivf_art_summary_ICSI" class="ivf_art_summary_ICSI">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->ICSI->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->ICSI->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->ICSI->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->IVF->Visible) { // IVF ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->IVF) == "") { ?>
		<th data-name="IVF" class="<?php echo $ivf_art_summary_list->IVF->headerCellClass() ?>"><div id="elh_ivf_art_summary_IVF" class="ivf_art_summary_IVF"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->IVF->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IVF" class="<?php echo $ivf_art_summary_list->IVF->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->IVF) ?>', 1);"><div id="elh_ivf_art_summary_IVF" class="ivf_art_summary_IVF">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->IVF->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->IVF->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->IVF->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->M1->Visible) { // M1 ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->M1) == "") { ?>
		<th data-name="M1" class="<?php echo $ivf_art_summary_list->M1->headerCellClass() ?>"><div id="elh_ivf_art_summary_M1" class="ivf_art_summary_M1"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->M1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="M1" class="<?php echo $ivf_art_summary_list->M1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->M1) ?>', 1);"><div id="elh_ivf_art_summary_M1" class="ivf_art_summary_M1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->M1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->M1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->M1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->GV->Visible) { // GV ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->GV) == "") { ?>
		<th data-name="GV" class="<?php echo $ivf_art_summary_list->GV->headerCellClass() ?>"><div id="elh_ivf_art_summary_GV" class="ivf_art_summary_GV"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->GV->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GV" class="<?php echo $ivf_art_summary_list->GV->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->GV) ?>', 1);"><div id="elh_ivf_art_summary_GV" class="ivf_art_summary_GV">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->GV->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->GV->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->GV->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->Others->Visible) { // Others ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->Others) == "") { ?>
		<th data-name="Others" class="<?php echo $ivf_art_summary_list->Others->headerCellClass() ?>"><div id="elh_ivf_art_summary_Others" class="ivf_art_summary_Others"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Others->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Others" class="<?php echo $ivf_art_summary_list->Others->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->Others) ?>', 1);"><div id="elh_ivf_art_summary_Others" class="ivf_art_summary_Others">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Others->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->Others->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->Others->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->Normal2PN->Visible) { // Normal2PN ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->Normal2PN) == "") { ?>
		<th data-name="Normal2PN" class="<?php echo $ivf_art_summary_list->Normal2PN->headerCellClass() ?>"><div id="elh_ivf_art_summary_Normal2PN" class="ivf_art_summary_Normal2PN"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Normal2PN->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Normal2PN" class="<?php echo $ivf_art_summary_list->Normal2PN->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->Normal2PN) ?>', 1);"><div id="elh_ivf_art_summary_Normal2PN" class="ivf_art_summary_Normal2PN">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Normal2PN->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->Normal2PN->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->Normal2PN->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->Abnormalfertilisation1N->Visible) { // Abnormalfertilisation1N ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->Abnormalfertilisation1N) == "") { ?>
		<th data-name="Abnormalfertilisation1N" class="<?php echo $ivf_art_summary_list->Abnormalfertilisation1N->headerCellClass() ?>"><div id="elh_ivf_art_summary_Abnormalfertilisation1N" class="ivf_art_summary_Abnormalfertilisation1N"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Abnormalfertilisation1N->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Abnormalfertilisation1N" class="<?php echo $ivf_art_summary_list->Abnormalfertilisation1N->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->Abnormalfertilisation1N) ?>', 1);"><div id="elh_ivf_art_summary_Abnormalfertilisation1N" class="ivf_art_summary_Abnormalfertilisation1N">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Abnormalfertilisation1N->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->Abnormalfertilisation1N->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->Abnormalfertilisation1N->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->Abnormalfertilisation3N->Visible) { // Abnormalfertilisation3N ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->Abnormalfertilisation3N) == "") { ?>
		<th data-name="Abnormalfertilisation3N" class="<?php echo $ivf_art_summary_list->Abnormalfertilisation3N->headerCellClass() ?>"><div id="elh_ivf_art_summary_Abnormalfertilisation3N" class="ivf_art_summary_Abnormalfertilisation3N"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Abnormalfertilisation3N->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Abnormalfertilisation3N" class="<?php echo $ivf_art_summary_list->Abnormalfertilisation3N->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->Abnormalfertilisation3N) ?>', 1);"><div id="elh_ivf_art_summary_Abnormalfertilisation3N" class="ivf_art_summary_Abnormalfertilisation3N">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Abnormalfertilisation3N->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->Abnormalfertilisation3N->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->Abnormalfertilisation3N->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->NotFertilized->Visible) { // NotFertilized ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->NotFertilized) == "") { ?>
		<th data-name="NotFertilized" class="<?php echo $ivf_art_summary_list->NotFertilized->headerCellClass() ?>"><div id="elh_ivf_art_summary_NotFertilized" class="ivf_art_summary_NotFertilized"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->NotFertilized->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NotFertilized" class="<?php echo $ivf_art_summary_list->NotFertilized->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->NotFertilized) ?>', 1);"><div id="elh_ivf_art_summary_NotFertilized" class="ivf_art_summary_NotFertilized">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->NotFertilized->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->NotFertilized->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->NotFertilized->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->Degenerated->Visible) { // Degenerated ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->Degenerated) == "") { ?>
		<th data-name="Degenerated" class="<?php echo $ivf_art_summary_list->Degenerated->headerCellClass() ?>"><div id="elh_ivf_art_summary_Degenerated" class="ivf_art_summary_Degenerated"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Degenerated->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Degenerated" class="<?php echo $ivf_art_summary_list->Degenerated->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->Degenerated) ?>', 1);"><div id="elh_ivf_art_summary_Degenerated" class="ivf_art_summary_Degenerated">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Degenerated->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->Degenerated->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->Degenerated->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->SpermDate->Visible) { // SpermDate ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->SpermDate) == "") { ?>
		<th data-name="SpermDate" class="<?php echo $ivf_art_summary_list->SpermDate->headerCellClass() ?>"><div id="elh_ivf_art_summary_SpermDate" class="ivf_art_summary_SpermDate"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->SpermDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SpermDate" class="<?php echo $ivf_art_summary_list->SpermDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->SpermDate) ?>', 1);"><div id="elh_ivf_art_summary_SpermDate" class="ivf_art_summary_SpermDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->SpermDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->SpermDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->SpermDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->Code1->Visible) { // Code1 ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->Code1) == "") { ?>
		<th data-name="Code1" class="<?php echo $ivf_art_summary_list->Code1->headerCellClass() ?>"><div id="elh_ivf_art_summary_Code1" class="ivf_art_summary_Code1"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Code1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Code1" class="<?php echo $ivf_art_summary_list->Code1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->Code1) ?>', 1);"><div id="elh_ivf_art_summary_Code1" class="ivf_art_summary_Code1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Code1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->Code1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->Code1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->Day1->Visible) { // Day1 ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->Day1) == "") { ?>
		<th data-name="Day1" class="<?php echo $ivf_art_summary_list->Day1->headerCellClass() ?>"><div id="elh_ivf_art_summary_Day1" class="ivf_art_summary_Day1"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Day1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day1" class="<?php echo $ivf_art_summary_list->Day1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->Day1) ?>', 1);"><div id="elh_ivf_art_summary_Day1" class="ivf_art_summary_Day1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Day1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->Day1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->Day1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->CellStage1->Visible) { // CellStage1 ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->CellStage1) == "") { ?>
		<th data-name="CellStage1" class="<?php echo $ivf_art_summary_list->CellStage1->headerCellClass() ?>"><div id="elh_ivf_art_summary_CellStage1" class="ivf_art_summary_CellStage1"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->CellStage1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CellStage1" class="<?php echo $ivf_art_summary_list->CellStage1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->CellStage1) ?>', 1);"><div id="elh_ivf_art_summary_CellStage1" class="ivf_art_summary_CellStage1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->CellStage1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->CellStage1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->CellStage1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->Grade1->Visible) { // Grade1 ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->Grade1) == "") { ?>
		<th data-name="Grade1" class="<?php echo $ivf_art_summary_list->Grade1->headerCellClass() ?>"><div id="elh_ivf_art_summary_Grade1" class="ivf_art_summary_Grade1"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Grade1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Grade1" class="<?php echo $ivf_art_summary_list->Grade1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->Grade1) ?>', 1);"><div id="elh_ivf_art_summary_Grade1" class="ivf_art_summary_Grade1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Grade1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->Grade1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->Grade1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->State1->Visible) { // State1 ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->State1) == "") { ?>
		<th data-name="State1" class="<?php echo $ivf_art_summary_list->State1->headerCellClass() ?>"><div id="elh_ivf_art_summary_State1" class="ivf_art_summary_State1"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->State1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="State1" class="<?php echo $ivf_art_summary_list->State1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->State1) ?>', 1);"><div id="elh_ivf_art_summary_State1" class="ivf_art_summary_State1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->State1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->State1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->State1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->Code2->Visible) { // Code2 ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->Code2) == "") { ?>
		<th data-name="Code2" class="<?php echo $ivf_art_summary_list->Code2->headerCellClass() ?>"><div id="elh_ivf_art_summary_Code2" class="ivf_art_summary_Code2"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Code2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Code2" class="<?php echo $ivf_art_summary_list->Code2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->Code2) ?>', 1);"><div id="elh_ivf_art_summary_Code2" class="ivf_art_summary_Code2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Code2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->Code2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->Code2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->Day2->Visible) { // Day2 ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->Day2) == "") { ?>
		<th data-name="Day2" class="<?php echo $ivf_art_summary_list->Day2->headerCellClass() ?>"><div id="elh_ivf_art_summary_Day2" class="ivf_art_summary_Day2"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Day2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day2" class="<?php echo $ivf_art_summary_list->Day2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->Day2) ?>', 1);"><div id="elh_ivf_art_summary_Day2" class="ivf_art_summary_Day2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Day2->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->Day2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->Day2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->CellStage2->Visible) { // CellStage2 ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->CellStage2) == "") { ?>
		<th data-name="CellStage2" class="<?php echo $ivf_art_summary_list->CellStage2->headerCellClass() ?>"><div id="elh_ivf_art_summary_CellStage2" class="ivf_art_summary_CellStage2"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->CellStage2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CellStage2" class="<?php echo $ivf_art_summary_list->CellStage2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->CellStage2) ?>', 1);"><div id="elh_ivf_art_summary_CellStage2" class="ivf_art_summary_CellStage2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->CellStage2->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->CellStage2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->CellStage2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->Grade2->Visible) { // Grade2 ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->Grade2) == "") { ?>
		<th data-name="Grade2" class="<?php echo $ivf_art_summary_list->Grade2->headerCellClass() ?>"><div id="elh_ivf_art_summary_Grade2" class="ivf_art_summary_Grade2"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Grade2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Grade2" class="<?php echo $ivf_art_summary_list->Grade2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->Grade2) ?>', 1);"><div id="elh_ivf_art_summary_Grade2" class="ivf_art_summary_Grade2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Grade2->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->Grade2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->Grade2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->State2->Visible) { // State2 ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->State2) == "") { ?>
		<th data-name="State2" class="<?php echo $ivf_art_summary_list->State2->headerCellClass() ?>"><div id="elh_ivf_art_summary_State2" class="ivf_art_summary_State2"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->State2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="State2" class="<?php echo $ivf_art_summary_list->State2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->State2) ?>', 1);"><div id="elh_ivf_art_summary_State2" class="ivf_art_summary_State2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->State2->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->State2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->State2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->Code3->Visible) { // Code3 ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->Code3) == "") { ?>
		<th data-name="Code3" class="<?php echo $ivf_art_summary_list->Code3->headerCellClass() ?>"><div id="elh_ivf_art_summary_Code3" class="ivf_art_summary_Code3"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Code3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Code3" class="<?php echo $ivf_art_summary_list->Code3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->Code3) ?>', 1);"><div id="elh_ivf_art_summary_Code3" class="ivf_art_summary_Code3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Code3->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->Code3->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->Code3->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->Day3->Visible) { // Day3 ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->Day3) == "") { ?>
		<th data-name="Day3" class="<?php echo $ivf_art_summary_list->Day3->headerCellClass() ?>"><div id="elh_ivf_art_summary_Day3" class="ivf_art_summary_Day3"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Day3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day3" class="<?php echo $ivf_art_summary_list->Day3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->Day3) ?>', 1);"><div id="elh_ivf_art_summary_Day3" class="ivf_art_summary_Day3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Day3->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->Day3->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->Day3->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->CellStage3->Visible) { // CellStage3 ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->CellStage3) == "") { ?>
		<th data-name="CellStage3" class="<?php echo $ivf_art_summary_list->CellStage3->headerCellClass() ?>"><div id="elh_ivf_art_summary_CellStage3" class="ivf_art_summary_CellStage3"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->CellStage3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CellStage3" class="<?php echo $ivf_art_summary_list->CellStage3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->CellStage3) ?>', 1);"><div id="elh_ivf_art_summary_CellStage3" class="ivf_art_summary_CellStage3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->CellStage3->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->CellStage3->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->CellStage3->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->Grade3->Visible) { // Grade3 ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->Grade3) == "") { ?>
		<th data-name="Grade3" class="<?php echo $ivf_art_summary_list->Grade3->headerCellClass() ?>"><div id="elh_ivf_art_summary_Grade3" class="ivf_art_summary_Grade3"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Grade3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Grade3" class="<?php echo $ivf_art_summary_list->Grade3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->Grade3) ?>', 1);"><div id="elh_ivf_art_summary_Grade3" class="ivf_art_summary_Grade3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Grade3->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->Grade3->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->Grade3->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->State3->Visible) { // State3 ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->State3) == "") { ?>
		<th data-name="State3" class="<?php echo $ivf_art_summary_list->State3->headerCellClass() ?>"><div id="elh_ivf_art_summary_State3" class="ivf_art_summary_State3"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->State3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="State3" class="<?php echo $ivf_art_summary_list->State3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->State3) ?>', 1);"><div id="elh_ivf_art_summary_State3" class="ivf_art_summary_State3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->State3->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->State3->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->State3->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->Code4->Visible) { // Code4 ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->Code4) == "") { ?>
		<th data-name="Code4" class="<?php echo $ivf_art_summary_list->Code4->headerCellClass() ?>"><div id="elh_ivf_art_summary_Code4" class="ivf_art_summary_Code4"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Code4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Code4" class="<?php echo $ivf_art_summary_list->Code4->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->Code4) ?>', 1);"><div id="elh_ivf_art_summary_Code4" class="ivf_art_summary_Code4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Code4->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->Code4->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->Code4->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->Day4->Visible) { // Day4 ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->Day4) == "") { ?>
		<th data-name="Day4" class="<?php echo $ivf_art_summary_list->Day4->headerCellClass() ?>"><div id="elh_ivf_art_summary_Day4" class="ivf_art_summary_Day4"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Day4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day4" class="<?php echo $ivf_art_summary_list->Day4->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->Day4) ?>', 1);"><div id="elh_ivf_art_summary_Day4" class="ivf_art_summary_Day4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Day4->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->Day4->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->Day4->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->CellStage4->Visible) { // CellStage4 ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->CellStage4) == "") { ?>
		<th data-name="CellStage4" class="<?php echo $ivf_art_summary_list->CellStage4->headerCellClass() ?>"><div id="elh_ivf_art_summary_CellStage4" class="ivf_art_summary_CellStage4"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->CellStage4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CellStage4" class="<?php echo $ivf_art_summary_list->CellStage4->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->CellStage4) ?>', 1);"><div id="elh_ivf_art_summary_CellStage4" class="ivf_art_summary_CellStage4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->CellStage4->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->CellStage4->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->CellStage4->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->Grade4->Visible) { // Grade4 ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->Grade4) == "") { ?>
		<th data-name="Grade4" class="<?php echo $ivf_art_summary_list->Grade4->headerCellClass() ?>"><div id="elh_ivf_art_summary_Grade4" class="ivf_art_summary_Grade4"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Grade4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Grade4" class="<?php echo $ivf_art_summary_list->Grade4->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->Grade4) ?>', 1);"><div id="elh_ivf_art_summary_Grade4" class="ivf_art_summary_Grade4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Grade4->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->Grade4->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->Grade4->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->State4->Visible) { // State4 ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->State4) == "") { ?>
		<th data-name="State4" class="<?php echo $ivf_art_summary_list->State4->headerCellClass() ?>"><div id="elh_ivf_art_summary_State4" class="ivf_art_summary_State4"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->State4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="State4" class="<?php echo $ivf_art_summary_list->State4->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->State4) ?>', 1);"><div id="elh_ivf_art_summary_State4" class="ivf_art_summary_State4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->State4->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->State4->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->State4->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->Code5->Visible) { // Code5 ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->Code5) == "") { ?>
		<th data-name="Code5" class="<?php echo $ivf_art_summary_list->Code5->headerCellClass() ?>"><div id="elh_ivf_art_summary_Code5" class="ivf_art_summary_Code5"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Code5->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Code5" class="<?php echo $ivf_art_summary_list->Code5->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->Code5) ?>', 1);"><div id="elh_ivf_art_summary_Code5" class="ivf_art_summary_Code5">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Code5->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->Code5->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->Code5->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->Day5->Visible) { // Day5 ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->Day5) == "") { ?>
		<th data-name="Day5" class="<?php echo $ivf_art_summary_list->Day5->headerCellClass() ?>"><div id="elh_ivf_art_summary_Day5" class="ivf_art_summary_Day5"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Day5->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day5" class="<?php echo $ivf_art_summary_list->Day5->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->Day5) ?>', 1);"><div id="elh_ivf_art_summary_Day5" class="ivf_art_summary_Day5">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Day5->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->Day5->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->Day5->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->CellStage5->Visible) { // CellStage5 ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->CellStage5) == "") { ?>
		<th data-name="CellStage5" class="<?php echo $ivf_art_summary_list->CellStage5->headerCellClass() ?>"><div id="elh_ivf_art_summary_CellStage5" class="ivf_art_summary_CellStage5"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->CellStage5->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CellStage5" class="<?php echo $ivf_art_summary_list->CellStage5->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->CellStage5) ?>', 1);"><div id="elh_ivf_art_summary_CellStage5" class="ivf_art_summary_CellStage5">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->CellStage5->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->CellStage5->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->CellStage5->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->Grade5->Visible) { // Grade5 ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->Grade5) == "") { ?>
		<th data-name="Grade5" class="<?php echo $ivf_art_summary_list->Grade5->headerCellClass() ?>"><div id="elh_ivf_art_summary_Grade5" class="ivf_art_summary_Grade5"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Grade5->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Grade5" class="<?php echo $ivf_art_summary_list->Grade5->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->Grade5) ?>', 1);"><div id="elh_ivf_art_summary_Grade5" class="ivf_art_summary_Grade5">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Grade5->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->Grade5->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->Grade5->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->State5->Visible) { // State5 ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->State5) == "") { ?>
		<th data-name="State5" class="<?php echo $ivf_art_summary_list->State5->headerCellClass() ?>"><div id="elh_ivf_art_summary_State5" class="ivf_art_summary_State5"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->State5->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="State5" class="<?php echo $ivf_art_summary_list->State5->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->State5) ?>', 1);"><div id="elh_ivf_art_summary_State5" class="ivf_art_summary_State5">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->State5->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->State5->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->State5->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->TidNo->Visible) { // TidNo ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->TidNo) == "") { ?>
		<th data-name="TidNo" class="<?php echo $ivf_art_summary_list->TidNo->headerCellClass() ?>"><div id="elh_ivf_art_summary_TidNo" class="ivf_art_summary_TidNo"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->TidNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TidNo" class="<?php echo $ivf_art_summary_list->TidNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->TidNo) ?>', 1);"><div id="elh_ivf_art_summary_TidNo" class="ivf_art_summary_TidNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->TidNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->TidNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->TidNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->RIDNo->Visible) { // RIDNo ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->RIDNo) == "") { ?>
		<th data-name="RIDNo" class="<?php echo $ivf_art_summary_list->RIDNo->headerCellClass() ?>"><div id="elh_ivf_art_summary_RIDNo" class="ivf_art_summary_RIDNo"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->RIDNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RIDNo" class="<?php echo $ivf_art_summary_list->RIDNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->RIDNo) ?>', 1);"><div id="elh_ivf_art_summary_RIDNo" class="ivf_art_summary_RIDNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->RIDNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->RIDNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->RIDNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->Volume->Visible) { // Volume ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->Volume) == "") { ?>
		<th data-name="Volume" class="<?php echo $ivf_art_summary_list->Volume->headerCellClass() ?>"><div id="elh_ivf_art_summary_Volume" class="ivf_art_summary_Volume"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Volume->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Volume" class="<?php echo $ivf_art_summary_list->Volume->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->Volume) ?>', 1);"><div id="elh_ivf_art_summary_Volume" class="ivf_art_summary_Volume">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Volume->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->Volume->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->Volume->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->Volume1->Visible) { // Volume1 ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->Volume1) == "") { ?>
		<th data-name="Volume1" class="<?php echo $ivf_art_summary_list->Volume1->headerCellClass() ?>"><div id="elh_ivf_art_summary_Volume1" class="ivf_art_summary_Volume1"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Volume1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Volume1" class="<?php echo $ivf_art_summary_list->Volume1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->Volume1) ?>', 1);"><div id="elh_ivf_art_summary_Volume1" class="ivf_art_summary_Volume1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Volume1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->Volume1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->Volume1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->Volume2->Visible) { // Volume2 ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->Volume2) == "") { ?>
		<th data-name="Volume2" class="<?php echo $ivf_art_summary_list->Volume2->headerCellClass() ?>"><div id="elh_ivf_art_summary_Volume2" class="ivf_art_summary_Volume2"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Volume2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Volume2" class="<?php echo $ivf_art_summary_list->Volume2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->Volume2) ?>', 1);"><div id="elh_ivf_art_summary_Volume2" class="ivf_art_summary_Volume2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Volume2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->Volume2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->Volume2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->Concentration2->Visible) { // Concentration2 ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->Concentration2) == "") { ?>
		<th data-name="Concentration2" class="<?php echo $ivf_art_summary_list->Concentration2->headerCellClass() ?>"><div id="elh_ivf_art_summary_Concentration2" class="ivf_art_summary_Concentration2"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Concentration2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Concentration2" class="<?php echo $ivf_art_summary_list->Concentration2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->Concentration2) ?>', 1);"><div id="elh_ivf_art_summary_Concentration2" class="ivf_art_summary_Concentration2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Concentration2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->Concentration2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->Concentration2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->Total->Visible) { // Total ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->Total) == "") { ?>
		<th data-name="Total" class="<?php echo $ivf_art_summary_list->Total->headerCellClass() ?>"><div id="elh_ivf_art_summary_Total" class="ivf_art_summary_Total"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Total->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Total" class="<?php echo $ivf_art_summary_list->Total->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->Total) ?>', 1);"><div id="elh_ivf_art_summary_Total" class="ivf_art_summary_Total">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Total->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->Total->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->Total->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->Total1->Visible) { // Total1 ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->Total1) == "") { ?>
		<th data-name="Total1" class="<?php echo $ivf_art_summary_list->Total1->headerCellClass() ?>"><div id="elh_ivf_art_summary_Total1" class="ivf_art_summary_Total1"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Total1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Total1" class="<?php echo $ivf_art_summary_list->Total1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->Total1) ?>', 1);"><div id="elh_ivf_art_summary_Total1" class="ivf_art_summary_Total1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Total1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->Total1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->Total1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->Total2->Visible) { // Total2 ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->Total2) == "") { ?>
		<th data-name="Total2" class="<?php echo $ivf_art_summary_list->Total2->headerCellClass() ?>"><div id="elh_ivf_art_summary_Total2" class="ivf_art_summary_Total2"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Total2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Total2" class="<?php echo $ivf_art_summary_list->Total2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->Total2) ?>', 1);"><div id="elh_ivf_art_summary_Total2" class="ivf_art_summary_Total2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Total2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->Total2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->Total2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->Progressive->Visible) { // Progressive ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->Progressive) == "") { ?>
		<th data-name="Progressive" class="<?php echo $ivf_art_summary_list->Progressive->headerCellClass() ?>"><div id="elh_ivf_art_summary_Progressive" class="ivf_art_summary_Progressive"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Progressive->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Progressive" class="<?php echo $ivf_art_summary_list->Progressive->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->Progressive) ?>', 1);"><div id="elh_ivf_art_summary_Progressive" class="ivf_art_summary_Progressive">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Progressive->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->Progressive->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->Progressive->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->Progressive1->Visible) { // Progressive1 ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->Progressive1) == "") { ?>
		<th data-name="Progressive1" class="<?php echo $ivf_art_summary_list->Progressive1->headerCellClass() ?>"><div id="elh_ivf_art_summary_Progressive1" class="ivf_art_summary_Progressive1"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Progressive1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Progressive1" class="<?php echo $ivf_art_summary_list->Progressive1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->Progressive1) ?>', 1);"><div id="elh_ivf_art_summary_Progressive1" class="ivf_art_summary_Progressive1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Progressive1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->Progressive1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->Progressive1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->Progressive2->Visible) { // Progressive2 ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->Progressive2) == "") { ?>
		<th data-name="Progressive2" class="<?php echo $ivf_art_summary_list->Progressive2->headerCellClass() ?>"><div id="elh_ivf_art_summary_Progressive2" class="ivf_art_summary_Progressive2"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Progressive2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Progressive2" class="<?php echo $ivf_art_summary_list->Progressive2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->Progressive2) ?>', 1);"><div id="elh_ivf_art_summary_Progressive2" class="ivf_art_summary_Progressive2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Progressive2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->Progressive2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->Progressive2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->NotProgressive->Visible) { // NotProgressive ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->NotProgressive) == "") { ?>
		<th data-name="NotProgressive" class="<?php echo $ivf_art_summary_list->NotProgressive->headerCellClass() ?>"><div id="elh_ivf_art_summary_NotProgressive" class="ivf_art_summary_NotProgressive"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->NotProgressive->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NotProgressive" class="<?php echo $ivf_art_summary_list->NotProgressive->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->NotProgressive) ?>', 1);"><div id="elh_ivf_art_summary_NotProgressive" class="ivf_art_summary_NotProgressive">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->NotProgressive->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->NotProgressive->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->NotProgressive->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->NotProgressive1->Visible) { // NotProgressive1 ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->NotProgressive1) == "") { ?>
		<th data-name="NotProgressive1" class="<?php echo $ivf_art_summary_list->NotProgressive1->headerCellClass() ?>"><div id="elh_ivf_art_summary_NotProgressive1" class="ivf_art_summary_NotProgressive1"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->NotProgressive1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NotProgressive1" class="<?php echo $ivf_art_summary_list->NotProgressive1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->NotProgressive1) ?>', 1);"><div id="elh_ivf_art_summary_NotProgressive1" class="ivf_art_summary_NotProgressive1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->NotProgressive1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->NotProgressive1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->NotProgressive1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->NotProgressive2->Visible) { // NotProgressive2 ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->NotProgressive2) == "") { ?>
		<th data-name="NotProgressive2" class="<?php echo $ivf_art_summary_list->NotProgressive2->headerCellClass() ?>"><div id="elh_ivf_art_summary_NotProgressive2" class="ivf_art_summary_NotProgressive2"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->NotProgressive2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NotProgressive2" class="<?php echo $ivf_art_summary_list->NotProgressive2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->NotProgressive2) ?>', 1);"><div id="elh_ivf_art_summary_NotProgressive2" class="ivf_art_summary_NotProgressive2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->NotProgressive2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->NotProgressive2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->NotProgressive2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->Motility2->Visible) { // Motility2 ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->Motility2) == "") { ?>
		<th data-name="Motility2" class="<?php echo $ivf_art_summary_list->Motility2->headerCellClass() ?>"><div id="elh_ivf_art_summary_Motility2" class="ivf_art_summary_Motility2"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Motility2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Motility2" class="<?php echo $ivf_art_summary_list->Motility2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->Motility2) ?>', 1);"><div id="elh_ivf_art_summary_Motility2" class="ivf_art_summary_Motility2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Motility2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->Motility2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->Motility2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_art_summary_list->Morphology2->Visible) { // Morphology2 ?>
	<?php if ($ivf_art_summary_list->SortUrl($ivf_art_summary_list->Morphology2) == "") { ?>
		<th data-name="Morphology2" class="<?php echo $ivf_art_summary_list->Morphology2->headerCellClass() ?>"><div id="elh_ivf_art_summary_Morphology2" class="ivf_art_summary_Morphology2"><div class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Morphology2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Morphology2" class="<?php echo $ivf_art_summary_list->Morphology2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $ivf_art_summary_list->SortUrl($ivf_art_summary_list->Morphology2) ?>', 1);"><div id="elh_ivf_art_summary_Morphology2" class="ivf_art_summary_Morphology2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_art_summary_list->Morphology2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($ivf_art_summary_list->Morphology2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_art_summary_list->Morphology2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$ivf_art_summary_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($ivf_art_summary_list->ExportAll && $ivf_art_summary_list->isExport()) {
	$ivf_art_summary_list->StopRecord = $ivf_art_summary_list->TotalRecords;
} else {

	// Set the last record to display
	if ($ivf_art_summary_list->TotalRecords > $ivf_art_summary_list->StartRecord + $ivf_art_summary_list->DisplayRecords - 1)
		$ivf_art_summary_list->StopRecord = $ivf_art_summary_list->StartRecord + $ivf_art_summary_list->DisplayRecords - 1;
	else
		$ivf_art_summary_list->StopRecord = $ivf_art_summary_list->TotalRecords;
}
$ivf_art_summary_list->RecordCount = $ivf_art_summary_list->StartRecord - 1;
if ($ivf_art_summary_list->Recordset && !$ivf_art_summary_list->Recordset->EOF) {
	$ivf_art_summary_list->Recordset->moveFirst();
	$selectLimit = $ivf_art_summary_list->UseSelectLimit;
	if (!$selectLimit && $ivf_art_summary_list->StartRecord > 1)
		$ivf_art_summary_list->Recordset->move($ivf_art_summary_list->StartRecord - 1);
} elseif (!$ivf_art_summary->AllowAddDeleteRow && $ivf_art_summary_list->StopRecord == 0) {
	$ivf_art_summary_list->StopRecord = $ivf_art_summary->GridAddRowCount;
}

// Initialize aggregate
$ivf_art_summary->RowType = ROWTYPE_AGGREGATEINIT;
$ivf_art_summary->resetAttributes();
$ivf_art_summary_list->renderRow();
while ($ivf_art_summary_list->RecordCount < $ivf_art_summary_list->StopRecord) {
	$ivf_art_summary_list->RecordCount++;
	if ($ivf_art_summary_list->RecordCount >= $ivf_art_summary_list->StartRecord) {
		$ivf_art_summary_list->RowCount++;

		// Set up key count
		$ivf_art_summary_list->KeyCount = $ivf_art_summary_list->RowIndex;

		// Init row class and style
		$ivf_art_summary->resetAttributes();
		$ivf_art_summary->CssClass = "";
		if ($ivf_art_summary_list->isGridAdd()) {
		} else {
			$ivf_art_summary_list->loadRowValues($ivf_art_summary_list->Recordset); // Load row values
		}
		$ivf_art_summary->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$ivf_art_summary->RowAttrs->merge(["data-rowindex" => $ivf_art_summary_list->RowCount, "id" => "r" . $ivf_art_summary_list->RowCount . "_ivf_art_summary", "data-rowtype" => $ivf_art_summary->RowType]);

		// Render row
		$ivf_art_summary_list->renderRow();

		// Render list options
		$ivf_art_summary_list->renderListOptions();
?>
	<tr <?php echo $ivf_art_summary->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_art_summary_list->ListOptions->render("body", "left", $ivf_art_summary_list->RowCount);
?>
	<?php if ($ivf_art_summary_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $ivf_art_summary_list->id->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_id">
<span<?php echo $ivf_art_summary_list->id->viewAttributes() ?>><?php echo $ivf_art_summary_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->ARTCycle->Visible) { // ARTCycle ?>
		<td data-name="ARTCycle" <?php echo $ivf_art_summary_list->ARTCycle->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_ARTCycle">
<span<?php echo $ivf_art_summary_list->ARTCycle->viewAttributes() ?>><?php echo $ivf_art_summary_list->ARTCycle->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->Spermorigin->Visible) { // Spermorigin ?>
		<td data-name="Spermorigin" <?php echo $ivf_art_summary_list->Spermorigin->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_Spermorigin">
<span<?php echo $ivf_art_summary_list->Spermorigin->viewAttributes() ?>><?php echo $ivf_art_summary_list->Spermorigin->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->IndicationforART->Visible) { // IndicationforART ?>
		<td data-name="IndicationforART" <?php echo $ivf_art_summary_list->IndicationforART->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_IndicationforART">
<span<?php echo $ivf_art_summary_list->IndicationforART->viewAttributes() ?>><?php echo $ivf_art_summary_list->IndicationforART->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->DateofICSI->Visible) { // DateofICSI ?>
		<td data-name="DateofICSI" <?php echo $ivf_art_summary_list->DateofICSI->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_DateofICSI">
<span<?php echo $ivf_art_summary_list->DateofICSI->viewAttributes() ?>><?php echo $ivf_art_summary_list->DateofICSI->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->Origin->Visible) { // Origin ?>
		<td data-name="Origin" <?php echo $ivf_art_summary_list->Origin->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_Origin">
<span<?php echo $ivf_art_summary_list->Origin->viewAttributes() ?>><?php echo $ivf_art_summary_list->Origin->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->Status->Visible) { // Status ?>
		<td data-name="Status" <?php echo $ivf_art_summary_list->Status->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_Status">
<span<?php echo $ivf_art_summary_list->Status->viewAttributes() ?>><?php echo $ivf_art_summary_list->Status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->Method->Visible) { // Method ?>
		<td data-name="Method" <?php echo $ivf_art_summary_list->Method->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_Method">
<span<?php echo $ivf_art_summary_list->Method->viewAttributes() ?>><?php echo $ivf_art_summary_list->Method->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->pre_Concentration->Visible) { // pre_Concentration ?>
		<td data-name="pre_Concentration" <?php echo $ivf_art_summary_list->pre_Concentration->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_pre_Concentration">
<span<?php echo $ivf_art_summary_list->pre_Concentration->viewAttributes() ?>><?php echo $ivf_art_summary_list->pre_Concentration->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->pre_Motility->Visible) { // pre_Motility ?>
		<td data-name="pre_Motility" <?php echo $ivf_art_summary_list->pre_Motility->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_pre_Motility">
<span<?php echo $ivf_art_summary_list->pre_Motility->viewAttributes() ?>><?php echo $ivf_art_summary_list->pre_Motility->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->pre_Morphology->Visible) { // pre_Morphology ?>
		<td data-name="pre_Morphology" <?php echo $ivf_art_summary_list->pre_Morphology->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_pre_Morphology">
<span<?php echo $ivf_art_summary_list->pre_Morphology->viewAttributes() ?>><?php echo $ivf_art_summary_list->pre_Morphology->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->post_Concentration->Visible) { // post_Concentration ?>
		<td data-name="post_Concentration" <?php echo $ivf_art_summary_list->post_Concentration->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_post_Concentration">
<span<?php echo $ivf_art_summary_list->post_Concentration->viewAttributes() ?>><?php echo $ivf_art_summary_list->post_Concentration->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->post_Motility->Visible) { // post_Motility ?>
		<td data-name="post_Motility" <?php echo $ivf_art_summary_list->post_Motility->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_post_Motility">
<span<?php echo $ivf_art_summary_list->post_Motility->viewAttributes() ?>><?php echo $ivf_art_summary_list->post_Motility->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->post_Morphology->Visible) { // post_Morphology ?>
		<td data-name="post_Morphology" <?php echo $ivf_art_summary_list->post_Morphology->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_post_Morphology">
<span<?php echo $ivf_art_summary_list->post_Morphology->viewAttributes() ?>><?php echo $ivf_art_summary_list->post_Morphology->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->NumberofEmbryostransferred->Visible) { // NumberofEmbryostransferred ?>
		<td data-name="NumberofEmbryostransferred" <?php echo $ivf_art_summary_list->NumberofEmbryostransferred->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_NumberofEmbryostransferred">
<span<?php echo $ivf_art_summary_list->NumberofEmbryostransferred->viewAttributes() ?>><?php echo $ivf_art_summary_list->NumberofEmbryostransferred->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->Embryosunderobservation->Visible) { // Embryosunderobservation ?>
		<td data-name="Embryosunderobservation" <?php echo $ivf_art_summary_list->Embryosunderobservation->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_Embryosunderobservation">
<span<?php echo $ivf_art_summary_list->Embryosunderobservation->viewAttributes() ?>><?php echo $ivf_art_summary_list->Embryosunderobservation->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->EmbryoDevelopmentSummary->Visible) { // EmbryoDevelopmentSummary ?>
		<td data-name="EmbryoDevelopmentSummary" <?php echo $ivf_art_summary_list->EmbryoDevelopmentSummary->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_EmbryoDevelopmentSummary">
<span<?php echo $ivf_art_summary_list->EmbryoDevelopmentSummary->viewAttributes() ?>><?php echo $ivf_art_summary_list->EmbryoDevelopmentSummary->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->EmbryologistSignature->Visible) { // EmbryologistSignature ?>
		<td data-name="EmbryologistSignature" <?php echo $ivf_art_summary_list->EmbryologistSignature->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_EmbryologistSignature">
<span<?php echo $ivf_art_summary_list->EmbryologistSignature->viewAttributes() ?>><?php echo $ivf_art_summary_list->EmbryologistSignature->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->IVFRegistrationID->Visible) { // IVFRegistrationID ?>
		<td data-name="IVFRegistrationID" <?php echo $ivf_art_summary_list->IVFRegistrationID->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_IVFRegistrationID">
<span<?php echo $ivf_art_summary_list->IVFRegistrationID->viewAttributes() ?>><?php echo $ivf_art_summary_list->IVFRegistrationID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
		<td data-name="InseminatinTechnique" <?php echo $ivf_art_summary_list->InseminatinTechnique->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_InseminatinTechnique">
<span<?php echo $ivf_art_summary_list->InseminatinTechnique->viewAttributes() ?>><?php echo $ivf_art_summary_list->InseminatinTechnique->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->ICSIDetails->Visible) { // ICSIDetails ?>
		<td data-name="ICSIDetails" <?php echo $ivf_art_summary_list->ICSIDetails->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_ICSIDetails">
<span<?php echo $ivf_art_summary_list->ICSIDetails->viewAttributes() ?>><?php echo $ivf_art_summary_list->ICSIDetails->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->DateofET->Visible) { // DateofET ?>
		<td data-name="DateofET" <?php echo $ivf_art_summary_list->DateofET->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_DateofET">
<span<?php echo $ivf_art_summary_list->DateofET->viewAttributes() ?>><?php echo $ivf_art_summary_list->DateofET->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->Reasonfornotranfer->Visible) { // Reasonfornotranfer ?>
		<td data-name="Reasonfornotranfer" <?php echo $ivf_art_summary_list->Reasonfornotranfer->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_Reasonfornotranfer">
<span<?php echo $ivf_art_summary_list->Reasonfornotranfer->viewAttributes() ?>><?php echo $ivf_art_summary_list->Reasonfornotranfer->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->EmbryosCryopreserved->Visible) { // EmbryosCryopreserved ?>
		<td data-name="EmbryosCryopreserved" <?php echo $ivf_art_summary_list->EmbryosCryopreserved->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_EmbryosCryopreserved">
<span<?php echo $ivf_art_summary_list->EmbryosCryopreserved->viewAttributes() ?>><?php echo $ivf_art_summary_list->EmbryosCryopreserved->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->LegendCellStage->Visible) { // LegendCellStage ?>
		<td data-name="LegendCellStage" <?php echo $ivf_art_summary_list->LegendCellStage->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_LegendCellStage">
<span<?php echo $ivf_art_summary_list->LegendCellStage->viewAttributes() ?>><?php echo $ivf_art_summary_list->LegendCellStage->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->ConsultantsSignature->Visible) { // ConsultantsSignature ?>
		<td data-name="ConsultantsSignature" <?php echo $ivf_art_summary_list->ConsultantsSignature->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_ConsultantsSignature">
<span<?php echo $ivf_art_summary_list->ConsultantsSignature->viewAttributes() ?>><?php echo $ivf_art_summary_list->ConsultantsSignature->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->Name->Visible) { // Name ?>
		<td data-name="Name" <?php echo $ivf_art_summary_list->Name->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_Name">
<span<?php echo $ivf_art_summary_list->Name->viewAttributes() ?>><?php echo $ivf_art_summary_list->Name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->M2->Visible) { // M2 ?>
		<td data-name="M2" <?php echo $ivf_art_summary_list->M2->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_M2">
<span<?php echo $ivf_art_summary_list->M2->viewAttributes() ?>><?php echo $ivf_art_summary_list->M2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->Mi2->Visible) { // Mi2 ?>
		<td data-name="Mi2" <?php echo $ivf_art_summary_list->Mi2->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_Mi2">
<span<?php echo $ivf_art_summary_list->Mi2->viewAttributes() ?>><?php echo $ivf_art_summary_list->Mi2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->ICSI->Visible) { // ICSI ?>
		<td data-name="ICSI" <?php echo $ivf_art_summary_list->ICSI->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_ICSI">
<span<?php echo $ivf_art_summary_list->ICSI->viewAttributes() ?>><?php echo $ivf_art_summary_list->ICSI->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->IVF->Visible) { // IVF ?>
		<td data-name="IVF" <?php echo $ivf_art_summary_list->IVF->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_IVF">
<span<?php echo $ivf_art_summary_list->IVF->viewAttributes() ?>><?php echo $ivf_art_summary_list->IVF->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->M1->Visible) { // M1 ?>
		<td data-name="M1" <?php echo $ivf_art_summary_list->M1->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_M1">
<span<?php echo $ivf_art_summary_list->M1->viewAttributes() ?>><?php echo $ivf_art_summary_list->M1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->GV->Visible) { // GV ?>
		<td data-name="GV" <?php echo $ivf_art_summary_list->GV->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_GV">
<span<?php echo $ivf_art_summary_list->GV->viewAttributes() ?>><?php echo $ivf_art_summary_list->GV->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->Others->Visible) { // Others ?>
		<td data-name="Others" <?php echo $ivf_art_summary_list->Others->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_Others">
<span<?php echo $ivf_art_summary_list->Others->viewAttributes() ?>><?php echo $ivf_art_summary_list->Others->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->Normal2PN->Visible) { // Normal2PN ?>
		<td data-name="Normal2PN" <?php echo $ivf_art_summary_list->Normal2PN->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_Normal2PN">
<span<?php echo $ivf_art_summary_list->Normal2PN->viewAttributes() ?>><?php echo $ivf_art_summary_list->Normal2PN->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->Abnormalfertilisation1N->Visible) { // Abnormalfertilisation1N ?>
		<td data-name="Abnormalfertilisation1N" <?php echo $ivf_art_summary_list->Abnormalfertilisation1N->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_Abnormalfertilisation1N">
<span<?php echo $ivf_art_summary_list->Abnormalfertilisation1N->viewAttributes() ?>><?php echo $ivf_art_summary_list->Abnormalfertilisation1N->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->Abnormalfertilisation3N->Visible) { // Abnormalfertilisation3N ?>
		<td data-name="Abnormalfertilisation3N" <?php echo $ivf_art_summary_list->Abnormalfertilisation3N->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_Abnormalfertilisation3N">
<span<?php echo $ivf_art_summary_list->Abnormalfertilisation3N->viewAttributes() ?>><?php echo $ivf_art_summary_list->Abnormalfertilisation3N->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->NotFertilized->Visible) { // NotFertilized ?>
		<td data-name="NotFertilized" <?php echo $ivf_art_summary_list->NotFertilized->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_NotFertilized">
<span<?php echo $ivf_art_summary_list->NotFertilized->viewAttributes() ?>><?php echo $ivf_art_summary_list->NotFertilized->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->Degenerated->Visible) { // Degenerated ?>
		<td data-name="Degenerated" <?php echo $ivf_art_summary_list->Degenerated->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_Degenerated">
<span<?php echo $ivf_art_summary_list->Degenerated->viewAttributes() ?>><?php echo $ivf_art_summary_list->Degenerated->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->SpermDate->Visible) { // SpermDate ?>
		<td data-name="SpermDate" <?php echo $ivf_art_summary_list->SpermDate->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_SpermDate">
<span<?php echo $ivf_art_summary_list->SpermDate->viewAttributes() ?>><?php echo $ivf_art_summary_list->SpermDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->Code1->Visible) { // Code1 ?>
		<td data-name="Code1" <?php echo $ivf_art_summary_list->Code1->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_Code1">
<span<?php echo $ivf_art_summary_list->Code1->viewAttributes() ?>><?php echo $ivf_art_summary_list->Code1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->Day1->Visible) { // Day1 ?>
		<td data-name="Day1" <?php echo $ivf_art_summary_list->Day1->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_Day1">
<span<?php echo $ivf_art_summary_list->Day1->viewAttributes() ?>><?php echo $ivf_art_summary_list->Day1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->CellStage1->Visible) { // CellStage1 ?>
		<td data-name="CellStage1" <?php echo $ivf_art_summary_list->CellStage1->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_CellStage1">
<span<?php echo $ivf_art_summary_list->CellStage1->viewAttributes() ?>><?php echo $ivf_art_summary_list->CellStage1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->Grade1->Visible) { // Grade1 ?>
		<td data-name="Grade1" <?php echo $ivf_art_summary_list->Grade1->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_Grade1">
<span<?php echo $ivf_art_summary_list->Grade1->viewAttributes() ?>><?php echo $ivf_art_summary_list->Grade1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->State1->Visible) { // State1 ?>
		<td data-name="State1" <?php echo $ivf_art_summary_list->State1->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_State1">
<span<?php echo $ivf_art_summary_list->State1->viewAttributes() ?>><?php echo $ivf_art_summary_list->State1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->Code2->Visible) { // Code2 ?>
		<td data-name="Code2" <?php echo $ivf_art_summary_list->Code2->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_Code2">
<span<?php echo $ivf_art_summary_list->Code2->viewAttributes() ?>><?php echo $ivf_art_summary_list->Code2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->Day2->Visible) { // Day2 ?>
		<td data-name="Day2" <?php echo $ivf_art_summary_list->Day2->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_Day2">
<span<?php echo $ivf_art_summary_list->Day2->viewAttributes() ?>><?php echo $ivf_art_summary_list->Day2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->CellStage2->Visible) { // CellStage2 ?>
		<td data-name="CellStage2" <?php echo $ivf_art_summary_list->CellStage2->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_CellStage2">
<span<?php echo $ivf_art_summary_list->CellStage2->viewAttributes() ?>><?php echo $ivf_art_summary_list->CellStage2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->Grade2->Visible) { // Grade2 ?>
		<td data-name="Grade2" <?php echo $ivf_art_summary_list->Grade2->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_Grade2">
<span<?php echo $ivf_art_summary_list->Grade2->viewAttributes() ?>><?php echo $ivf_art_summary_list->Grade2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->State2->Visible) { // State2 ?>
		<td data-name="State2" <?php echo $ivf_art_summary_list->State2->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_State2">
<span<?php echo $ivf_art_summary_list->State2->viewAttributes() ?>><?php echo $ivf_art_summary_list->State2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->Code3->Visible) { // Code3 ?>
		<td data-name="Code3" <?php echo $ivf_art_summary_list->Code3->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_Code3">
<span<?php echo $ivf_art_summary_list->Code3->viewAttributes() ?>><?php echo $ivf_art_summary_list->Code3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->Day3->Visible) { // Day3 ?>
		<td data-name="Day3" <?php echo $ivf_art_summary_list->Day3->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_Day3">
<span<?php echo $ivf_art_summary_list->Day3->viewAttributes() ?>><?php echo $ivf_art_summary_list->Day3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->CellStage3->Visible) { // CellStage3 ?>
		<td data-name="CellStage3" <?php echo $ivf_art_summary_list->CellStage3->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_CellStage3">
<span<?php echo $ivf_art_summary_list->CellStage3->viewAttributes() ?>><?php echo $ivf_art_summary_list->CellStage3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->Grade3->Visible) { // Grade3 ?>
		<td data-name="Grade3" <?php echo $ivf_art_summary_list->Grade3->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_Grade3">
<span<?php echo $ivf_art_summary_list->Grade3->viewAttributes() ?>><?php echo $ivf_art_summary_list->Grade3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->State3->Visible) { // State3 ?>
		<td data-name="State3" <?php echo $ivf_art_summary_list->State3->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_State3">
<span<?php echo $ivf_art_summary_list->State3->viewAttributes() ?>><?php echo $ivf_art_summary_list->State3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->Code4->Visible) { // Code4 ?>
		<td data-name="Code4" <?php echo $ivf_art_summary_list->Code4->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_Code4">
<span<?php echo $ivf_art_summary_list->Code4->viewAttributes() ?>><?php echo $ivf_art_summary_list->Code4->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->Day4->Visible) { // Day4 ?>
		<td data-name="Day4" <?php echo $ivf_art_summary_list->Day4->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_Day4">
<span<?php echo $ivf_art_summary_list->Day4->viewAttributes() ?>><?php echo $ivf_art_summary_list->Day4->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->CellStage4->Visible) { // CellStage4 ?>
		<td data-name="CellStage4" <?php echo $ivf_art_summary_list->CellStage4->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_CellStage4">
<span<?php echo $ivf_art_summary_list->CellStage4->viewAttributes() ?>><?php echo $ivf_art_summary_list->CellStage4->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->Grade4->Visible) { // Grade4 ?>
		<td data-name="Grade4" <?php echo $ivf_art_summary_list->Grade4->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_Grade4">
<span<?php echo $ivf_art_summary_list->Grade4->viewAttributes() ?>><?php echo $ivf_art_summary_list->Grade4->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->State4->Visible) { // State4 ?>
		<td data-name="State4" <?php echo $ivf_art_summary_list->State4->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_State4">
<span<?php echo $ivf_art_summary_list->State4->viewAttributes() ?>><?php echo $ivf_art_summary_list->State4->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->Code5->Visible) { // Code5 ?>
		<td data-name="Code5" <?php echo $ivf_art_summary_list->Code5->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_Code5">
<span<?php echo $ivf_art_summary_list->Code5->viewAttributes() ?>><?php echo $ivf_art_summary_list->Code5->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->Day5->Visible) { // Day5 ?>
		<td data-name="Day5" <?php echo $ivf_art_summary_list->Day5->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_Day5">
<span<?php echo $ivf_art_summary_list->Day5->viewAttributes() ?>><?php echo $ivf_art_summary_list->Day5->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->CellStage5->Visible) { // CellStage5 ?>
		<td data-name="CellStage5" <?php echo $ivf_art_summary_list->CellStage5->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_CellStage5">
<span<?php echo $ivf_art_summary_list->CellStage5->viewAttributes() ?>><?php echo $ivf_art_summary_list->CellStage5->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->Grade5->Visible) { // Grade5 ?>
		<td data-name="Grade5" <?php echo $ivf_art_summary_list->Grade5->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_Grade5">
<span<?php echo $ivf_art_summary_list->Grade5->viewAttributes() ?>><?php echo $ivf_art_summary_list->Grade5->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->State5->Visible) { // State5 ?>
		<td data-name="State5" <?php echo $ivf_art_summary_list->State5->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_State5">
<span<?php echo $ivf_art_summary_list->State5->viewAttributes() ?>><?php echo $ivf_art_summary_list->State5->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo" <?php echo $ivf_art_summary_list->TidNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_TidNo">
<span<?php echo $ivf_art_summary_list->TidNo->viewAttributes() ?>><?php echo $ivf_art_summary_list->TidNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->RIDNo->Visible) { // RIDNo ?>
		<td data-name="RIDNo" <?php echo $ivf_art_summary_list->RIDNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_RIDNo">
<span<?php echo $ivf_art_summary_list->RIDNo->viewAttributes() ?>><?php echo $ivf_art_summary_list->RIDNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->Volume->Visible) { // Volume ?>
		<td data-name="Volume" <?php echo $ivf_art_summary_list->Volume->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_Volume">
<span<?php echo $ivf_art_summary_list->Volume->viewAttributes() ?>><?php echo $ivf_art_summary_list->Volume->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->Volume1->Visible) { // Volume1 ?>
		<td data-name="Volume1" <?php echo $ivf_art_summary_list->Volume1->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_Volume1">
<span<?php echo $ivf_art_summary_list->Volume1->viewAttributes() ?>><?php echo $ivf_art_summary_list->Volume1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->Volume2->Visible) { // Volume2 ?>
		<td data-name="Volume2" <?php echo $ivf_art_summary_list->Volume2->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_Volume2">
<span<?php echo $ivf_art_summary_list->Volume2->viewAttributes() ?>><?php echo $ivf_art_summary_list->Volume2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->Concentration2->Visible) { // Concentration2 ?>
		<td data-name="Concentration2" <?php echo $ivf_art_summary_list->Concentration2->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_Concentration2">
<span<?php echo $ivf_art_summary_list->Concentration2->viewAttributes() ?>><?php echo $ivf_art_summary_list->Concentration2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->Total->Visible) { // Total ?>
		<td data-name="Total" <?php echo $ivf_art_summary_list->Total->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_Total">
<span<?php echo $ivf_art_summary_list->Total->viewAttributes() ?>><?php echo $ivf_art_summary_list->Total->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->Total1->Visible) { // Total1 ?>
		<td data-name="Total1" <?php echo $ivf_art_summary_list->Total1->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_Total1">
<span<?php echo $ivf_art_summary_list->Total1->viewAttributes() ?>><?php echo $ivf_art_summary_list->Total1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->Total2->Visible) { // Total2 ?>
		<td data-name="Total2" <?php echo $ivf_art_summary_list->Total2->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_Total2">
<span<?php echo $ivf_art_summary_list->Total2->viewAttributes() ?>><?php echo $ivf_art_summary_list->Total2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->Progressive->Visible) { // Progressive ?>
		<td data-name="Progressive" <?php echo $ivf_art_summary_list->Progressive->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_Progressive">
<span<?php echo $ivf_art_summary_list->Progressive->viewAttributes() ?>><?php echo $ivf_art_summary_list->Progressive->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->Progressive1->Visible) { // Progressive1 ?>
		<td data-name="Progressive1" <?php echo $ivf_art_summary_list->Progressive1->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_Progressive1">
<span<?php echo $ivf_art_summary_list->Progressive1->viewAttributes() ?>><?php echo $ivf_art_summary_list->Progressive1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->Progressive2->Visible) { // Progressive2 ?>
		<td data-name="Progressive2" <?php echo $ivf_art_summary_list->Progressive2->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_Progressive2">
<span<?php echo $ivf_art_summary_list->Progressive2->viewAttributes() ?>><?php echo $ivf_art_summary_list->Progressive2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->NotProgressive->Visible) { // NotProgressive ?>
		<td data-name="NotProgressive" <?php echo $ivf_art_summary_list->NotProgressive->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_NotProgressive">
<span<?php echo $ivf_art_summary_list->NotProgressive->viewAttributes() ?>><?php echo $ivf_art_summary_list->NotProgressive->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->NotProgressive1->Visible) { // NotProgressive1 ?>
		<td data-name="NotProgressive1" <?php echo $ivf_art_summary_list->NotProgressive1->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_NotProgressive1">
<span<?php echo $ivf_art_summary_list->NotProgressive1->viewAttributes() ?>><?php echo $ivf_art_summary_list->NotProgressive1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->NotProgressive2->Visible) { // NotProgressive2 ?>
		<td data-name="NotProgressive2" <?php echo $ivf_art_summary_list->NotProgressive2->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_NotProgressive2">
<span<?php echo $ivf_art_summary_list->NotProgressive2->viewAttributes() ?>><?php echo $ivf_art_summary_list->NotProgressive2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->Motility2->Visible) { // Motility2 ?>
		<td data-name="Motility2" <?php echo $ivf_art_summary_list->Motility2->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_Motility2">
<span<?php echo $ivf_art_summary_list->Motility2->viewAttributes() ?>><?php echo $ivf_art_summary_list->Motility2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($ivf_art_summary_list->Morphology2->Visible) { // Morphology2 ?>
		<td data-name="Morphology2" <?php echo $ivf_art_summary_list->Morphology2->cellAttributes() ?>>
<span id="el<?php echo $ivf_art_summary_list->RowCount ?>_ivf_art_summary_Morphology2">
<span<?php echo $ivf_art_summary_list->Morphology2->viewAttributes() ?>><?php echo $ivf_art_summary_list->Morphology2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_art_summary_list->ListOptions->render("body", "right", $ivf_art_summary_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$ivf_art_summary_list->isGridAdd())
		$ivf_art_summary_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$ivf_art_summary->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($ivf_art_summary_list->Recordset)
	$ivf_art_summary_list->Recordset->Close();
?>
<?php if (!$ivf_art_summary_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$ivf_art_summary_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $ivf_art_summary_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $ivf_art_summary_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($ivf_art_summary_list->TotalRecords == 0 && !$ivf_art_summary->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $ivf_art_summary_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$ivf_art_summary_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$ivf_art_summary_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$ivf_art_summary->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_ivf_art_summary",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$ivf_art_summary_list->terminate();
?>