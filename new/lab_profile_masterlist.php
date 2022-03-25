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
$lab_profile_master_list = new lab_profile_master_list();

// Run the page
$lab_profile_master_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_profile_master_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$lab_profile_master_list->isExport()) { ?>
<script>
var flab_profile_masterlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	flab_profile_masterlist = currentForm = new ew.Form("flab_profile_masterlist", "list");
	flab_profile_masterlist.formKeyCountName = '<?php echo $lab_profile_master_list->FormKeyCountName ?>';
	loadjs.done("flab_profile_masterlist");
});
var flab_profile_masterlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	flab_profile_masterlistsrch = currentSearchForm = new ew.Form("flab_profile_masterlistsrch");

	// Dynamic selection lists
	// Filters

	flab_profile_masterlistsrch.filterList = <?php echo $lab_profile_master_list->getFilterList() ?>;
	loadjs.done("flab_profile_masterlistsrch");
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
<?php if (!$lab_profile_master_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($lab_profile_master_list->TotalRecords > 0 && $lab_profile_master_list->ExportOptions->visible()) { ?>
<?php $lab_profile_master_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($lab_profile_master_list->ImportOptions->visible()) { ?>
<?php $lab_profile_master_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($lab_profile_master_list->SearchOptions->visible()) { ?>
<?php $lab_profile_master_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($lab_profile_master_list->FilterOptions->visible()) { ?>
<?php $lab_profile_master_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$lab_profile_master_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$lab_profile_master_list->isExport() && !$lab_profile_master->CurrentAction) { ?>
<form name="flab_profile_masterlistsrch" id="flab_profile_masterlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="flab_profile_masterlistsrch-search-panel" class="<?php echo $lab_profile_master_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="lab_profile_master">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $lab_profile_master_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($lab_profile_master_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($lab_profile_master_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $lab_profile_master_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($lab_profile_master_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($lab_profile_master_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($lab_profile_master_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($lab_profile_master_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $lab_profile_master_list->showPageHeader(); ?>
<?php
$lab_profile_master_list->showMessage();
?>
<?php if ($lab_profile_master_list->TotalRecords > 0 || $lab_profile_master->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($lab_profile_master_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> lab_profile_master">
<?php if (!$lab_profile_master_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$lab_profile_master_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $lab_profile_master_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $lab_profile_master_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="flab_profile_masterlist" id="flab_profile_masterlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_profile_master">
<div id="gmp_lab_profile_master" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($lab_profile_master_list->TotalRecords > 0 || $lab_profile_master_list->isGridEdit()) { ?>
<table id="tbl_lab_profile_masterlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$lab_profile_master->RowType = ROWTYPE_HEADER;

// Render list options
$lab_profile_master_list->renderListOptions();

// Render list options (header, left)
$lab_profile_master_list->ListOptions->render("header", "left");
?>
<?php if ($lab_profile_master_list->id->Visible) { // id ?>
	<?php if ($lab_profile_master_list->SortUrl($lab_profile_master_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $lab_profile_master_list->id->headerCellClass() ?>"><div id="elh_lab_profile_master_id" class="lab_profile_master_id"><div class="ew-table-header-caption"><?php echo $lab_profile_master_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $lab_profile_master_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_profile_master_list->SortUrl($lab_profile_master_list->id) ?>', 1);"><div id="elh_lab_profile_master_id" class="lab_profile_master_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_master_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_master_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_profile_master_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_master_list->ProfileCode->Visible) { // ProfileCode ?>
	<?php if ($lab_profile_master_list->SortUrl($lab_profile_master_list->ProfileCode) == "") { ?>
		<th data-name="ProfileCode" class="<?php echo $lab_profile_master_list->ProfileCode->headerCellClass() ?>"><div id="elh_lab_profile_master_ProfileCode" class="lab_profile_master_ProfileCode"><div class="ew-table-header-caption"><?php echo $lab_profile_master_list->ProfileCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProfileCode" class="<?php echo $lab_profile_master_list->ProfileCode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_profile_master_list->SortUrl($lab_profile_master_list->ProfileCode) ?>', 1);"><div id="elh_lab_profile_master_ProfileCode" class="lab_profile_master_ProfileCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_master_list->ProfileCode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_master_list->ProfileCode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_profile_master_list->ProfileCode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_master_list->ProfileName->Visible) { // ProfileName ?>
	<?php if ($lab_profile_master_list->SortUrl($lab_profile_master_list->ProfileName) == "") { ?>
		<th data-name="ProfileName" class="<?php echo $lab_profile_master_list->ProfileName->headerCellClass() ?>"><div id="elh_lab_profile_master_ProfileName" class="lab_profile_master_ProfileName"><div class="ew-table-header-caption"><?php echo $lab_profile_master_list->ProfileName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProfileName" class="<?php echo $lab_profile_master_list->ProfileName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_profile_master_list->SortUrl($lab_profile_master_list->ProfileName) ?>', 1);"><div id="elh_lab_profile_master_ProfileName" class="lab_profile_master_ProfileName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_master_list->ProfileName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_master_list->ProfileName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_profile_master_list->ProfileName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_master_list->ProfileAmount->Visible) { // ProfileAmount ?>
	<?php if ($lab_profile_master_list->SortUrl($lab_profile_master_list->ProfileAmount) == "") { ?>
		<th data-name="ProfileAmount" class="<?php echo $lab_profile_master_list->ProfileAmount->headerCellClass() ?>"><div id="elh_lab_profile_master_ProfileAmount" class="lab_profile_master_ProfileAmount"><div class="ew-table-header-caption"><?php echo $lab_profile_master_list->ProfileAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProfileAmount" class="<?php echo $lab_profile_master_list->ProfileAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_profile_master_list->SortUrl($lab_profile_master_list->ProfileAmount) ?>', 1);"><div id="elh_lab_profile_master_ProfileAmount" class="lab_profile_master_ProfileAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_master_list->ProfileAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_master_list->ProfileAmount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_profile_master_list->ProfileAmount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_master_list->ProfileSpecialAmount->Visible) { // ProfileSpecialAmount ?>
	<?php if ($lab_profile_master_list->SortUrl($lab_profile_master_list->ProfileSpecialAmount) == "") { ?>
		<th data-name="ProfileSpecialAmount" class="<?php echo $lab_profile_master_list->ProfileSpecialAmount->headerCellClass() ?>"><div id="elh_lab_profile_master_ProfileSpecialAmount" class="lab_profile_master_ProfileSpecialAmount"><div class="ew-table-header-caption"><?php echo $lab_profile_master_list->ProfileSpecialAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProfileSpecialAmount" class="<?php echo $lab_profile_master_list->ProfileSpecialAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_profile_master_list->SortUrl($lab_profile_master_list->ProfileSpecialAmount) ?>', 1);"><div id="elh_lab_profile_master_ProfileSpecialAmount" class="lab_profile_master_ProfileSpecialAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_master_list->ProfileSpecialAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_master_list->ProfileSpecialAmount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_profile_master_list->ProfileSpecialAmount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_master_list->ProfileMasterInactive->Visible) { // ProfileMasterInactive ?>
	<?php if ($lab_profile_master_list->SortUrl($lab_profile_master_list->ProfileMasterInactive) == "") { ?>
		<th data-name="ProfileMasterInactive" class="<?php echo $lab_profile_master_list->ProfileMasterInactive->headerCellClass() ?>"><div id="elh_lab_profile_master_ProfileMasterInactive" class="lab_profile_master_ProfileMasterInactive"><div class="ew-table-header-caption"><?php echo $lab_profile_master_list->ProfileMasterInactive->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProfileMasterInactive" class="<?php echo $lab_profile_master_list->ProfileMasterInactive->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_profile_master_list->SortUrl($lab_profile_master_list->ProfileMasterInactive) ?>', 1);"><div id="elh_lab_profile_master_ProfileMasterInactive" class="lab_profile_master_ProfileMasterInactive">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_master_list->ProfileMasterInactive->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_master_list->ProfileMasterInactive->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_profile_master_list->ProfileMasterInactive->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_master_list->ReagentAmt->Visible) { // ReagentAmt ?>
	<?php if ($lab_profile_master_list->SortUrl($lab_profile_master_list->ReagentAmt) == "") { ?>
		<th data-name="ReagentAmt" class="<?php echo $lab_profile_master_list->ReagentAmt->headerCellClass() ?>"><div id="elh_lab_profile_master_ReagentAmt" class="lab_profile_master_ReagentAmt"><div class="ew-table-header-caption"><?php echo $lab_profile_master_list->ReagentAmt->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReagentAmt" class="<?php echo $lab_profile_master_list->ReagentAmt->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_profile_master_list->SortUrl($lab_profile_master_list->ReagentAmt) ?>', 1);"><div id="elh_lab_profile_master_ReagentAmt" class="lab_profile_master_ReagentAmt">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_master_list->ReagentAmt->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_master_list->ReagentAmt->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_profile_master_list->ReagentAmt->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_master_list->LabAmt->Visible) { // LabAmt ?>
	<?php if ($lab_profile_master_list->SortUrl($lab_profile_master_list->LabAmt) == "") { ?>
		<th data-name="LabAmt" class="<?php echo $lab_profile_master_list->LabAmt->headerCellClass() ?>"><div id="elh_lab_profile_master_LabAmt" class="lab_profile_master_LabAmt"><div class="ew-table-header-caption"><?php echo $lab_profile_master_list->LabAmt->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LabAmt" class="<?php echo $lab_profile_master_list->LabAmt->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_profile_master_list->SortUrl($lab_profile_master_list->LabAmt) ?>', 1);"><div id="elh_lab_profile_master_LabAmt" class="lab_profile_master_LabAmt">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_master_list->LabAmt->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_master_list->LabAmt->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_profile_master_list->LabAmt->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_master_list->RefAmt->Visible) { // RefAmt ?>
	<?php if ($lab_profile_master_list->SortUrl($lab_profile_master_list->RefAmt) == "") { ?>
		<th data-name="RefAmt" class="<?php echo $lab_profile_master_list->RefAmt->headerCellClass() ?>"><div id="elh_lab_profile_master_RefAmt" class="lab_profile_master_RefAmt"><div class="ew-table-header-caption"><?php echo $lab_profile_master_list->RefAmt->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RefAmt" class="<?php echo $lab_profile_master_list->RefAmt->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_profile_master_list->SortUrl($lab_profile_master_list->RefAmt) ?>', 1);"><div id="elh_lab_profile_master_RefAmt" class="lab_profile_master_RefAmt">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_master_list->RefAmt->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_master_list->RefAmt->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_profile_master_list->RefAmt->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_master_list->MainDeptCD->Visible) { // MainDeptCD ?>
	<?php if ($lab_profile_master_list->SortUrl($lab_profile_master_list->MainDeptCD) == "") { ?>
		<th data-name="MainDeptCD" class="<?php echo $lab_profile_master_list->MainDeptCD->headerCellClass() ?>"><div id="elh_lab_profile_master_MainDeptCD" class="lab_profile_master_MainDeptCD"><div class="ew-table-header-caption"><?php echo $lab_profile_master_list->MainDeptCD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MainDeptCD" class="<?php echo $lab_profile_master_list->MainDeptCD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_profile_master_list->SortUrl($lab_profile_master_list->MainDeptCD) ?>', 1);"><div id="elh_lab_profile_master_MainDeptCD" class="lab_profile_master_MainDeptCD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_master_list->MainDeptCD->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_master_list->MainDeptCD->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_profile_master_list->MainDeptCD->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_master_list->Individual->Visible) { // Individual ?>
	<?php if ($lab_profile_master_list->SortUrl($lab_profile_master_list->Individual) == "") { ?>
		<th data-name="Individual" class="<?php echo $lab_profile_master_list->Individual->headerCellClass() ?>"><div id="elh_lab_profile_master_Individual" class="lab_profile_master_Individual"><div class="ew-table-header-caption"><?php echo $lab_profile_master_list->Individual->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Individual" class="<?php echo $lab_profile_master_list->Individual->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_profile_master_list->SortUrl($lab_profile_master_list->Individual) ?>', 1);"><div id="elh_lab_profile_master_Individual" class="lab_profile_master_Individual">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_master_list->Individual->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_master_list->Individual->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_profile_master_list->Individual->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_master_list->ShortName->Visible) { // ShortName ?>
	<?php if ($lab_profile_master_list->SortUrl($lab_profile_master_list->ShortName) == "") { ?>
		<th data-name="ShortName" class="<?php echo $lab_profile_master_list->ShortName->headerCellClass() ?>"><div id="elh_lab_profile_master_ShortName" class="lab_profile_master_ShortName"><div class="ew-table-header-caption"><?php echo $lab_profile_master_list->ShortName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ShortName" class="<?php echo $lab_profile_master_list->ShortName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_profile_master_list->SortUrl($lab_profile_master_list->ShortName) ?>', 1);"><div id="elh_lab_profile_master_ShortName" class="lab_profile_master_ShortName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_master_list->ShortName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_master_list->ShortName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_profile_master_list->ShortName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_master_list->PrevAmt->Visible) { // PrevAmt ?>
	<?php if ($lab_profile_master_list->SortUrl($lab_profile_master_list->PrevAmt) == "") { ?>
		<th data-name="PrevAmt" class="<?php echo $lab_profile_master_list->PrevAmt->headerCellClass() ?>"><div id="elh_lab_profile_master_PrevAmt" class="lab_profile_master_PrevAmt"><div class="ew-table-header-caption"><?php echo $lab_profile_master_list->PrevAmt->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrevAmt" class="<?php echo $lab_profile_master_list->PrevAmt->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_profile_master_list->SortUrl($lab_profile_master_list->PrevAmt) ?>', 1);"><div id="elh_lab_profile_master_PrevAmt" class="lab_profile_master_PrevAmt">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_master_list->PrevAmt->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_master_list->PrevAmt->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_profile_master_list->PrevAmt->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_master_list->BillName->Visible) { // BillName ?>
	<?php if ($lab_profile_master_list->SortUrl($lab_profile_master_list->BillName) == "") { ?>
		<th data-name="BillName" class="<?php echo $lab_profile_master_list->BillName->headerCellClass() ?>"><div id="elh_lab_profile_master_BillName" class="lab_profile_master_BillName"><div class="ew-table-header-caption"><?php echo $lab_profile_master_list->BillName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillName" class="<?php echo $lab_profile_master_list->BillName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_profile_master_list->SortUrl($lab_profile_master_list->BillName) ?>', 1);"><div id="elh_lab_profile_master_BillName" class="lab_profile_master_BillName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_master_list->BillName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_master_list->BillName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_profile_master_list->BillName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_master_list->ActualAmt->Visible) { // ActualAmt ?>
	<?php if ($lab_profile_master_list->SortUrl($lab_profile_master_list->ActualAmt) == "") { ?>
		<th data-name="ActualAmt" class="<?php echo $lab_profile_master_list->ActualAmt->headerCellClass() ?>"><div id="elh_lab_profile_master_ActualAmt" class="lab_profile_master_ActualAmt"><div class="ew-table-header-caption"><?php echo $lab_profile_master_list->ActualAmt->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ActualAmt" class="<?php echo $lab_profile_master_list->ActualAmt->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_profile_master_list->SortUrl($lab_profile_master_list->ActualAmt) ?>', 1);"><div id="elh_lab_profile_master_ActualAmt" class="lab_profile_master_ActualAmt">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_master_list->ActualAmt->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_master_list->ActualAmt->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_profile_master_list->ActualAmt->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_master_list->NoHeading->Visible) { // NoHeading ?>
	<?php if ($lab_profile_master_list->SortUrl($lab_profile_master_list->NoHeading) == "") { ?>
		<th data-name="NoHeading" class="<?php echo $lab_profile_master_list->NoHeading->headerCellClass() ?>"><div id="elh_lab_profile_master_NoHeading" class="lab_profile_master_NoHeading"><div class="ew-table-header-caption"><?php echo $lab_profile_master_list->NoHeading->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoHeading" class="<?php echo $lab_profile_master_list->NoHeading->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_profile_master_list->SortUrl($lab_profile_master_list->NoHeading) ?>', 1);"><div id="elh_lab_profile_master_NoHeading" class="lab_profile_master_NoHeading">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_master_list->NoHeading->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_master_list->NoHeading->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_profile_master_list->NoHeading->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_master_list->EditDate->Visible) { // EditDate ?>
	<?php if ($lab_profile_master_list->SortUrl($lab_profile_master_list->EditDate) == "") { ?>
		<th data-name="EditDate" class="<?php echo $lab_profile_master_list->EditDate->headerCellClass() ?>"><div id="elh_lab_profile_master_EditDate" class="lab_profile_master_EditDate"><div class="ew-table-header-caption"><?php echo $lab_profile_master_list->EditDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EditDate" class="<?php echo $lab_profile_master_list->EditDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_profile_master_list->SortUrl($lab_profile_master_list->EditDate) ?>', 1);"><div id="elh_lab_profile_master_EditDate" class="lab_profile_master_EditDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_master_list->EditDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_master_list->EditDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_profile_master_list->EditDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_master_list->EditUser->Visible) { // EditUser ?>
	<?php if ($lab_profile_master_list->SortUrl($lab_profile_master_list->EditUser) == "") { ?>
		<th data-name="EditUser" class="<?php echo $lab_profile_master_list->EditUser->headerCellClass() ?>"><div id="elh_lab_profile_master_EditUser" class="lab_profile_master_EditUser"><div class="ew-table-header-caption"><?php echo $lab_profile_master_list->EditUser->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EditUser" class="<?php echo $lab_profile_master_list->EditUser->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_profile_master_list->SortUrl($lab_profile_master_list->EditUser) ?>', 1);"><div id="elh_lab_profile_master_EditUser" class="lab_profile_master_EditUser">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_master_list->EditUser->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_master_list->EditUser->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_profile_master_list->EditUser->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_master_list->HISCD->Visible) { // HISCD ?>
	<?php if ($lab_profile_master_list->SortUrl($lab_profile_master_list->HISCD) == "") { ?>
		<th data-name="HISCD" class="<?php echo $lab_profile_master_list->HISCD->headerCellClass() ?>"><div id="elh_lab_profile_master_HISCD" class="lab_profile_master_HISCD"><div class="ew-table-header-caption"><?php echo $lab_profile_master_list->HISCD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HISCD" class="<?php echo $lab_profile_master_list->HISCD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_profile_master_list->SortUrl($lab_profile_master_list->HISCD) ?>', 1);"><div id="elh_lab_profile_master_HISCD" class="lab_profile_master_HISCD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_master_list->HISCD->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_master_list->HISCD->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_profile_master_list->HISCD->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_master_list->PriceList->Visible) { // PriceList ?>
	<?php if ($lab_profile_master_list->SortUrl($lab_profile_master_list->PriceList) == "") { ?>
		<th data-name="PriceList" class="<?php echo $lab_profile_master_list->PriceList->headerCellClass() ?>"><div id="elh_lab_profile_master_PriceList" class="lab_profile_master_PriceList"><div class="ew-table-header-caption"><?php echo $lab_profile_master_list->PriceList->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PriceList" class="<?php echo $lab_profile_master_list->PriceList->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_profile_master_list->SortUrl($lab_profile_master_list->PriceList) ?>', 1);"><div id="elh_lab_profile_master_PriceList" class="lab_profile_master_PriceList">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_master_list->PriceList->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_master_list->PriceList->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_profile_master_list->PriceList->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_master_list->IPAmt->Visible) { // IPAmt ?>
	<?php if ($lab_profile_master_list->SortUrl($lab_profile_master_list->IPAmt) == "") { ?>
		<th data-name="IPAmt" class="<?php echo $lab_profile_master_list->IPAmt->headerCellClass() ?>"><div id="elh_lab_profile_master_IPAmt" class="lab_profile_master_IPAmt"><div class="ew-table-header-caption"><?php echo $lab_profile_master_list->IPAmt->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IPAmt" class="<?php echo $lab_profile_master_list->IPAmt->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_profile_master_list->SortUrl($lab_profile_master_list->IPAmt) ?>', 1);"><div id="elh_lab_profile_master_IPAmt" class="lab_profile_master_IPAmt">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_master_list->IPAmt->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_master_list->IPAmt->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_profile_master_list->IPAmt->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_master_list->IInsAmt->Visible) { // IInsAmt ?>
	<?php if ($lab_profile_master_list->SortUrl($lab_profile_master_list->IInsAmt) == "") { ?>
		<th data-name="IInsAmt" class="<?php echo $lab_profile_master_list->IInsAmt->headerCellClass() ?>"><div id="elh_lab_profile_master_IInsAmt" class="lab_profile_master_IInsAmt"><div class="ew-table-header-caption"><?php echo $lab_profile_master_list->IInsAmt->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IInsAmt" class="<?php echo $lab_profile_master_list->IInsAmt->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_profile_master_list->SortUrl($lab_profile_master_list->IInsAmt) ?>', 1);"><div id="elh_lab_profile_master_IInsAmt" class="lab_profile_master_IInsAmt">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_master_list->IInsAmt->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_master_list->IInsAmt->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_profile_master_list->IInsAmt->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_master_list->ManualCD->Visible) { // ManualCD ?>
	<?php if ($lab_profile_master_list->SortUrl($lab_profile_master_list->ManualCD) == "") { ?>
		<th data-name="ManualCD" class="<?php echo $lab_profile_master_list->ManualCD->headerCellClass() ?>"><div id="elh_lab_profile_master_ManualCD" class="lab_profile_master_ManualCD"><div class="ew-table-header-caption"><?php echo $lab_profile_master_list->ManualCD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ManualCD" class="<?php echo $lab_profile_master_list->ManualCD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_profile_master_list->SortUrl($lab_profile_master_list->ManualCD) ?>', 1);"><div id="elh_lab_profile_master_ManualCD" class="lab_profile_master_ManualCD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_master_list->ManualCD->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_master_list->ManualCD->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_profile_master_list->ManualCD->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_master_list->Free->Visible) { // Free ?>
	<?php if ($lab_profile_master_list->SortUrl($lab_profile_master_list->Free) == "") { ?>
		<th data-name="Free" class="<?php echo $lab_profile_master_list->Free->headerCellClass() ?>"><div id="elh_lab_profile_master_Free" class="lab_profile_master_Free"><div class="ew-table-header-caption"><?php echo $lab_profile_master_list->Free->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Free" class="<?php echo $lab_profile_master_list->Free->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_profile_master_list->SortUrl($lab_profile_master_list->Free) ?>', 1);"><div id="elh_lab_profile_master_Free" class="lab_profile_master_Free">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_master_list->Free->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_master_list->Free->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_profile_master_list->Free->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_master_list->IIpAmt->Visible) { // IIpAmt ?>
	<?php if ($lab_profile_master_list->SortUrl($lab_profile_master_list->IIpAmt) == "") { ?>
		<th data-name="IIpAmt" class="<?php echo $lab_profile_master_list->IIpAmt->headerCellClass() ?>"><div id="elh_lab_profile_master_IIpAmt" class="lab_profile_master_IIpAmt"><div class="ew-table-header-caption"><?php echo $lab_profile_master_list->IIpAmt->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IIpAmt" class="<?php echo $lab_profile_master_list->IIpAmt->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_profile_master_list->SortUrl($lab_profile_master_list->IIpAmt) ?>', 1);"><div id="elh_lab_profile_master_IIpAmt" class="lab_profile_master_IIpAmt">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_master_list->IIpAmt->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_master_list->IIpAmt->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_profile_master_list->IIpAmt->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_master_list->InsAmt->Visible) { // InsAmt ?>
	<?php if ($lab_profile_master_list->SortUrl($lab_profile_master_list->InsAmt) == "") { ?>
		<th data-name="InsAmt" class="<?php echo $lab_profile_master_list->InsAmt->headerCellClass() ?>"><div id="elh_lab_profile_master_InsAmt" class="lab_profile_master_InsAmt"><div class="ew-table-header-caption"><?php echo $lab_profile_master_list->InsAmt->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="InsAmt" class="<?php echo $lab_profile_master_list->InsAmt->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_profile_master_list->SortUrl($lab_profile_master_list->InsAmt) ?>', 1);"><div id="elh_lab_profile_master_InsAmt" class="lab_profile_master_InsAmt">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_master_list->InsAmt->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_master_list->InsAmt->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_profile_master_list->InsAmt->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_profile_master_list->OutSource->Visible) { // OutSource ?>
	<?php if ($lab_profile_master_list->SortUrl($lab_profile_master_list->OutSource) == "") { ?>
		<th data-name="OutSource" class="<?php echo $lab_profile_master_list->OutSource->headerCellClass() ?>"><div id="elh_lab_profile_master_OutSource" class="lab_profile_master_OutSource"><div class="ew-table-header-caption"><?php echo $lab_profile_master_list->OutSource->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OutSource" class="<?php echo $lab_profile_master_list->OutSource->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_profile_master_list->SortUrl($lab_profile_master_list->OutSource) ?>', 1);"><div id="elh_lab_profile_master_OutSource" class="lab_profile_master_OutSource">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_profile_master_list->OutSource->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_profile_master_list->OutSource->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_profile_master_list->OutSource->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$lab_profile_master_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($lab_profile_master_list->ExportAll && $lab_profile_master_list->isExport()) {
	$lab_profile_master_list->StopRecord = $lab_profile_master_list->TotalRecords;
} else {

	// Set the last record to display
	if ($lab_profile_master_list->TotalRecords > $lab_profile_master_list->StartRecord + $lab_profile_master_list->DisplayRecords - 1)
		$lab_profile_master_list->StopRecord = $lab_profile_master_list->StartRecord + $lab_profile_master_list->DisplayRecords - 1;
	else
		$lab_profile_master_list->StopRecord = $lab_profile_master_list->TotalRecords;
}
$lab_profile_master_list->RecordCount = $lab_profile_master_list->StartRecord - 1;
if ($lab_profile_master_list->Recordset && !$lab_profile_master_list->Recordset->EOF) {
	$lab_profile_master_list->Recordset->moveFirst();
	$selectLimit = $lab_profile_master_list->UseSelectLimit;
	if (!$selectLimit && $lab_profile_master_list->StartRecord > 1)
		$lab_profile_master_list->Recordset->move($lab_profile_master_list->StartRecord - 1);
} elseif (!$lab_profile_master->AllowAddDeleteRow && $lab_profile_master_list->StopRecord == 0) {
	$lab_profile_master_list->StopRecord = $lab_profile_master->GridAddRowCount;
}

// Initialize aggregate
$lab_profile_master->RowType = ROWTYPE_AGGREGATEINIT;
$lab_profile_master->resetAttributes();
$lab_profile_master_list->renderRow();
while ($lab_profile_master_list->RecordCount < $lab_profile_master_list->StopRecord) {
	$lab_profile_master_list->RecordCount++;
	if ($lab_profile_master_list->RecordCount >= $lab_profile_master_list->StartRecord) {
		$lab_profile_master_list->RowCount++;

		// Set up key count
		$lab_profile_master_list->KeyCount = $lab_profile_master_list->RowIndex;

		// Init row class and style
		$lab_profile_master->resetAttributes();
		$lab_profile_master->CssClass = "";
		if ($lab_profile_master_list->isGridAdd()) {
		} else {
			$lab_profile_master_list->loadRowValues($lab_profile_master_list->Recordset); // Load row values
		}
		$lab_profile_master->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$lab_profile_master->RowAttrs->merge(["data-rowindex" => $lab_profile_master_list->RowCount, "id" => "r" . $lab_profile_master_list->RowCount . "_lab_profile_master", "data-rowtype" => $lab_profile_master->RowType]);

		// Render row
		$lab_profile_master_list->renderRow();

		// Render list options
		$lab_profile_master_list->renderListOptions();
?>
	<tr <?php echo $lab_profile_master->rowAttributes() ?>>
<?php

// Render list options (body, left)
$lab_profile_master_list->ListOptions->render("body", "left", $lab_profile_master_list->RowCount);
?>
	<?php if ($lab_profile_master_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $lab_profile_master_list->id->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_list->RowCount ?>_lab_profile_master_id">
<span<?php echo $lab_profile_master_list->id->viewAttributes() ?>><?php echo $lab_profile_master_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_profile_master_list->ProfileCode->Visible) { // ProfileCode ?>
		<td data-name="ProfileCode" <?php echo $lab_profile_master_list->ProfileCode->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_list->RowCount ?>_lab_profile_master_ProfileCode">
<span<?php echo $lab_profile_master_list->ProfileCode->viewAttributes() ?>><?php echo $lab_profile_master_list->ProfileCode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_profile_master_list->ProfileName->Visible) { // ProfileName ?>
		<td data-name="ProfileName" <?php echo $lab_profile_master_list->ProfileName->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_list->RowCount ?>_lab_profile_master_ProfileName">
<span<?php echo $lab_profile_master_list->ProfileName->viewAttributes() ?>><?php echo $lab_profile_master_list->ProfileName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_profile_master_list->ProfileAmount->Visible) { // ProfileAmount ?>
		<td data-name="ProfileAmount" <?php echo $lab_profile_master_list->ProfileAmount->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_list->RowCount ?>_lab_profile_master_ProfileAmount">
<span<?php echo $lab_profile_master_list->ProfileAmount->viewAttributes() ?>><?php echo $lab_profile_master_list->ProfileAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_profile_master_list->ProfileSpecialAmount->Visible) { // ProfileSpecialAmount ?>
		<td data-name="ProfileSpecialAmount" <?php echo $lab_profile_master_list->ProfileSpecialAmount->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_list->RowCount ?>_lab_profile_master_ProfileSpecialAmount">
<span<?php echo $lab_profile_master_list->ProfileSpecialAmount->viewAttributes() ?>><?php echo $lab_profile_master_list->ProfileSpecialAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_profile_master_list->ProfileMasterInactive->Visible) { // ProfileMasterInactive ?>
		<td data-name="ProfileMasterInactive" <?php echo $lab_profile_master_list->ProfileMasterInactive->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_list->RowCount ?>_lab_profile_master_ProfileMasterInactive">
<span<?php echo $lab_profile_master_list->ProfileMasterInactive->viewAttributes() ?>><?php echo $lab_profile_master_list->ProfileMasterInactive->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_profile_master_list->ReagentAmt->Visible) { // ReagentAmt ?>
		<td data-name="ReagentAmt" <?php echo $lab_profile_master_list->ReagentAmt->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_list->RowCount ?>_lab_profile_master_ReagentAmt">
<span<?php echo $lab_profile_master_list->ReagentAmt->viewAttributes() ?>><?php echo $lab_profile_master_list->ReagentAmt->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_profile_master_list->LabAmt->Visible) { // LabAmt ?>
		<td data-name="LabAmt" <?php echo $lab_profile_master_list->LabAmt->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_list->RowCount ?>_lab_profile_master_LabAmt">
<span<?php echo $lab_profile_master_list->LabAmt->viewAttributes() ?>><?php echo $lab_profile_master_list->LabAmt->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_profile_master_list->RefAmt->Visible) { // RefAmt ?>
		<td data-name="RefAmt" <?php echo $lab_profile_master_list->RefAmt->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_list->RowCount ?>_lab_profile_master_RefAmt">
<span<?php echo $lab_profile_master_list->RefAmt->viewAttributes() ?>><?php echo $lab_profile_master_list->RefAmt->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_profile_master_list->MainDeptCD->Visible) { // MainDeptCD ?>
		<td data-name="MainDeptCD" <?php echo $lab_profile_master_list->MainDeptCD->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_list->RowCount ?>_lab_profile_master_MainDeptCD">
<span<?php echo $lab_profile_master_list->MainDeptCD->viewAttributes() ?>><?php echo $lab_profile_master_list->MainDeptCD->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_profile_master_list->Individual->Visible) { // Individual ?>
		<td data-name="Individual" <?php echo $lab_profile_master_list->Individual->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_list->RowCount ?>_lab_profile_master_Individual">
<span<?php echo $lab_profile_master_list->Individual->viewAttributes() ?>><?php echo $lab_profile_master_list->Individual->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_profile_master_list->ShortName->Visible) { // ShortName ?>
		<td data-name="ShortName" <?php echo $lab_profile_master_list->ShortName->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_list->RowCount ?>_lab_profile_master_ShortName">
<span<?php echo $lab_profile_master_list->ShortName->viewAttributes() ?>><?php echo $lab_profile_master_list->ShortName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_profile_master_list->PrevAmt->Visible) { // PrevAmt ?>
		<td data-name="PrevAmt" <?php echo $lab_profile_master_list->PrevAmt->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_list->RowCount ?>_lab_profile_master_PrevAmt">
<span<?php echo $lab_profile_master_list->PrevAmt->viewAttributes() ?>><?php echo $lab_profile_master_list->PrevAmt->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_profile_master_list->BillName->Visible) { // BillName ?>
		<td data-name="BillName" <?php echo $lab_profile_master_list->BillName->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_list->RowCount ?>_lab_profile_master_BillName">
<span<?php echo $lab_profile_master_list->BillName->viewAttributes() ?>><?php echo $lab_profile_master_list->BillName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_profile_master_list->ActualAmt->Visible) { // ActualAmt ?>
		<td data-name="ActualAmt" <?php echo $lab_profile_master_list->ActualAmt->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_list->RowCount ?>_lab_profile_master_ActualAmt">
<span<?php echo $lab_profile_master_list->ActualAmt->viewAttributes() ?>><?php echo $lab_profile_master_list->ActualAmt->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_profile_master_list->NoHeading->Visible) { // NoHeading ?>
		<td data-name="NoHeading" <?php echo $lab_profile_master_list->NoHeading->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_list->RowCount ?>_lab_profile_master_NoHeading">
<span<?php echo $lab_profile_master_list->NoHeading->viewAttributes() ?>><?php echo $lab_profile_master_list->NoHeading->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_profile_master_list->EditDate->Visible) { // EditDate ?>
		<td data-name="EditDate" <?php echo $lab_profile_master_list->EditDate->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_list->RowCount ?>_lab_profile_master_EditDate">
<span<?php echo $lab_profile_master_list->EditDate->viewAttributes() ?>><?php echo $lab_profile_master_list->EditDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_profile_master_list->EditUser->Visible) { // EditUser ?>
		<td data-name="EditUser" <?php echo $lab_profile_master_list->EditUser->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_list->RowCount ?>_lab_profile_master_EditUser">
<span<?php echo $lab_profile_master_list->EditUser->viewAttributes() ?>><?php echo $lab_profile_master_list->EditUser->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_profile_master_list->HISCD->Visible) { // HISCD ?>
		<td data-name="HISCD" <?php echo $lab_profile_master_list->HISCD->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_list->RowCount ?>_lab_profile_master_HISCD">
<span<?php echo $lab_profile_master_list->HISCD->viewAttributes() ?>><?php echo $lab_profile_master_list->HISCD->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_profile_master_list->PriceList->Visible) { // PriceList ?>
		<td data-name="PriceList" <?php echo $lab_profile_master_list->PriceList->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_list->RowCount ?>_lab_profile_master_PriceList">
<span<?php echo $lab_profile_master_list->PriceList->viewAttributes() ?>><?php echo $lab_profile_master_list->PriceList->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_profile_master_list->IPAmt->Visible) { // IPAmt ?>
		<td data-name="IPAmt" <?php echo $lab_profile_master_list->IPAmt->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_list->RowCount ?>_lab_profile_master_IPAmt">
<span<?php echo $lab_profile_master_list->IPAmt->viewAttributes() ?>><?php echo $lab_profile_master_list->IPAmt->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_profile_master_list->IInsAmt->Visible) { // IInsAmt ?>
		<td data-name="IInsAmt" <?php echo $lab_profile_master_list->IInsAmt->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_list->RowCount ?>_lab_profile_master_IInsAmt">
<span<?php echo $lab_profile_master_list->IInsAmt->viewAttributes() ?>><?php echo $lab_profile_master_list->IInsAmt->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_profile_master_list->ManualCD->Visible) { // ManualCD ?>
		<td data-name="ManualCD" <?php echo $lab_profile_master_list->ManualCD->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_list->RowCount ?>_lab_profile_master_ManualCD">
<span<?php echo $lab_profile_master_list->ManualCD->viewAttributes() ?>><?php echo $lab_profile_master_list->ManualCD->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_profile_master_list->Free->Visible) { // Free ?>
		<td data-name="Free" <?php echo $lab_profile_master_list->Free->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_list->RowCount ?>_lab_profile_master_Free">
<span<?php echo $lab_profile_master_list->Free->viewAttributes() ?>><?php echo $lab_profile_master_list->Free->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_profile_master_list->IIpAmt->Visible) { // IIpAmt ?>
		<td data-name="IIpAmt" <?php echo $lab_profile_master_list->IIpAmt->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_list->RowCount ?>_lab_profile_master_IIpAmt">
<span<?php echo $lab_profile_master_list->IIpAmt->viewAttributes() ?>><?php echo $lab_profile_master_list->IIpAmt->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_profile_master_list->InsAmt->Visible) { // InsAmt ?>
		<td data-name="InsAmt" <?php echo $lab_profile_master_list->InsAmt->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_list->RowCount ?>_lab_profile_master_InsAmt">
<span<?php echo $lab_profile_master_list->InsAmt->viewAttributes() ?>><?php echo $lab_profile_master_list->InsAmt->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_profile_master_list->OutSource->Visible) { // OutSource ?>
		<td data-name="OutSource" <?php echo $lab_profile_master_list->OutSource->cellAttributes() ?>>
<span id="el<?php echo $lab_profile_master_list->RowCount ?>_lab_profile_master_OutSource">
<span<?php echo $lab_profile_master_list->OutSource->viewAttributes() ?>><?php echo $lab_profile_master_list->OutSource->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$lab_profile_master_list->ListOptions->render("body", "right", $lab_profile_master_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$lab_profile_master_list->isGridAdd())
		$lab_profile_master_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$lab_profile_master->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($lab_profile_master_list->Recordset)
	$lab_profile_master_list->Recordset->Close();
?>
<?php if (!$lab_profile_master_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$lab_profile_master_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $lab_profile_master_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $lab_profile_master_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($lab_profile_master_list->TotalRecords == 0 && !$lab_profile_master->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $lab_profile_master_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$lab_profile_master_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$lab_profile_master_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$lab_profile_master->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_lab_profile_master",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$lab_profile_master_list->terminate();
?>