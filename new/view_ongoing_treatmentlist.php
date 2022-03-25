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
$view_ongoing_treatment_list = new view_ongoing_treatment_list();

// Run the page
$view_ongoing_treatment_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_ongoing_treatment_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$view_ongoing_treatment_list->isExport()) { ?>
<script>
var fview_ongoing_treatmentlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fview_ongoing_treatmentlist = currentForm = new ew.Form("fview_ongoing_treatmentlist", "list");
	fview_ongoing_treatmentlist.formKeyCountName = '<?php echo $view_ongoing_treatment_list->FormKeyCountName ?>';
	loadjs.done("fview_ongoing_treatmentlist");
});
var fview_ongoing_treatmentlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fview_ongoing_treatmentlistsrch = currentSearchForm = new ew.Form("fview_ongoing_treatmentlistsrch");

	// Dynamic selection lists
	// Filters

	fview_ongoing_treatmentlistsrch.filterList = <?php echo $view_ongoing_treatment_list->getFilterList() ?>;
	loadjs.done("fview_ongoing_treatmentlistsrch");
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
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$view_ongoing_treatment_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_ongoing_treatment_list->TotalRecords > 0 && $view_ongoing_treatment_list->ExportOptions->visible()) { ?>
<?php $view_ongoing_treatment_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->ImportOptions->visible()) { ?>
<?php $view_ongoing_treatment_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->SearchOptions->visible()) { ?>
<?php $view_ongoing_treatment_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->FilterOptions->visible()) { ?>
<?php $view_ongoing_treatment_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_ongoing_treatment_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_ongoing_treatment_list->isExport() && !$view_ongoing_treatment->CurrentAction) { ?>
<form name="fview_ongoing_treatmentlistsrch" id="fview_ongoing_treatmentlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fview_ongoing_treatmentlistsrch-search-panel" class="<?php echo $view_ongoing_treatment_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_ongoing_treatment">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $view_ongoing_treatment_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($view_ongoing_treatment_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($view_ongoing_treatment_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_ongoing_treatment_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_ongoing_treatment_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_ongoing_treatment_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_ongoing_treatment_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_ongoing_treatment_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $view_ongoing_treatment_list->showPageHeader(); ?>
<?php
$view_ongoing_treatment_list->showMessage();
?>
<?php if ($view_ongoing_treatment_list->TotalRecords > 0 || $view_ongoing_treatment->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_ongoing_treatment_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_ongoing_treatment">
<?php if (!$view_ongoing_treatment_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_ongoing_treatment_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_ongoing_treatment_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_ongoing_treatment_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_ongoing_treatmentlist" id="fview_ongoing_treatmentlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_ongoing_treatment">
<div id="gmp_view_ongoing_treatment" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($view_ongoing_treatment_list->TotalRecords > 0 || $view_ongoing_treatment_list->isGridEdit()) { ?>
<table id="tbl_view_ongoing_treatmentlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_ongoing_treatment->RowType = ROWTYPE_HEADER;

// Render list options
$view_ongoing_treatment_list->renderListOptions();

// Render list options (header, left)
$view_ongoing_treatment_list->ListOptions->render("header", "left");
?>
<?php if ($view_ongoing_treatment_list->bid->Visible) { // bid ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->bid) == "") { ?>
		<th data-name="bid" class="<?php echo $view_ongoing_treatment_list->bid->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_bid" class="view_ongoing_treatment_bid"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->bid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bid" class="<?php echo $view_ongoing_treatment_list->bid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->bid) ?>', 1);"><div id="elh_view_ongoing_treatment_bid" class="view_ongoing_treatment_bid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->bid->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->bid->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->bid->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->bPatientID->Visible) { // bPatientID ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->bPatientID) == "") { ?>
		<th data-name="bPatientID" class="<?php echo $view_ongoing_treatment_list->bPatientID->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_bPatientID" class="view_ongoing_treatment_bPatientID"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->bPatientID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bPatientID" class="<?php echo $view_ongoing_treatment_list->bPatientID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->bPatientID) ?>', 1);"><div id="elh_view_ongoing_treatment_bPatientID" class="view_ongoing_treatment_bPatientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->bPatientID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->bPatientID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->bPatientID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->title->Visible) { // title ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->title) == "") { ?>
		<th data-name="title" class="<?php echo $view_ongoing_treatment_list->title->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_title" class="view_ongoing_treatment_title"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->title->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="title" class="<?php echo $view_ongoing_treatment_list->title->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->title) ?>', 1);"><div id="elh_view_ongoing_treatment_title" class="view_ongoing_treatment_title">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->title->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->title->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->title->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->first_name->Visible) { // first_name ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->first_name) == "") { ?>
		<th data-name="first_name" class="<?php echo $view_ongoing_treatment_list->first_name->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_first_name" class="view_ongoing_treatment_first_name"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->first_name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="first_name" class="<?php echo $view_ongoing_treatment_list->first_name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->first_name) ?>', 1);"><div id="elh_view_ongoing_treatment_first_name" class="view_ongoing_treatment_first_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->first_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->first_name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->first_name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->middle_name->Visible) { // middle_name ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->middle_name) == "") { ?>
		<th data-name="middle_name" class="<?php echo $view_ongoing_treatment_list->middle_name->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_middle_name" class="view_ongoing_treatment_middle_name"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->middle_name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="middle_name" class="<?php echo $view_ongoing_treatment_list->middle_name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->middle_name) ?>', 1);"><div id="elh_view_ongoing_treatment_middle_name" class="view_ongoing_treatment_middle_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->middle_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->middle_name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->middle_name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->last_name->Visible) { // last_name ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->last_name) == "") { ?>
		<th data-name="last_name" class="<?php echo $view_ongoing_treatment_list->last_name->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_last_name" class="view_ongoing_treatment_last_name"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->last_name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="last_name" class="<?php echo $view_ongoing_treatment_list->last_name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->last_name) ?>', 1);"><div id="elh_view_ongoing_treatment_last_name" class="view_ongoing_treatment_last_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->last_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->last_name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->last_name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->gender->Visible) { // gender ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->gender) == "") { ?>
		<th data-name="gender" class="<?php echo $view_ongoing_treatment_list->gender->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_gender" class="view_ongoing_treatment_gender"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="gender" class="<?php echo $view_ongoing_treatment_list->gender->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->gender) ?>', 1);"><div id="elh_view_ongoing_treatment_gender" class="view_ongoing_treatment_gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->gender->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->gender->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->gender->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->dob->Visible) { // dob ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->dob) == "") { ?>
		<th data-name="dob" class="<?php echo $view_ongoing_treatment_list->dob->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_dob" class="view_ongoing_treatment_dob"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->dob->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="dob" class="<?php echo $view_ongoing_treatment_list->dob->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->dob) ?>', 1);"><div id="elh_view_ongoing_treatment_dob" class="view_ongoing_treatment_dob">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->dob->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->dob->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->dob->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->bAge->Visible) { // bAge ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->bAge) == "") { ?>
		<th data-name="bAge" class="<?php echo $view_ongoing_treatment_list->bAge->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_bAge" class="view_ongoing_treatment_bAge"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->bAge->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bAge" class="<?php echo $view_ongoing_treatment_list->bAge->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->bAge) ?>', 1);"><div id="elh_view_ongoing_treatment_bAge" class="view_ongoing_treatment_bAge">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->bAge->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->bAge->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->bAge->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->blood_group->Visible) { // blood_group ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->blood_group) == "") { ?>
		<th data-name="blood_group" class="<?php echo $view_ongoing_treatment_list->blood_group->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_blood_group" class="view_ongoing_treatment_blood_group"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->blood_group->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="blood_group" class="<?php echo $view_ongoing_treatment_list->blood_group->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->blood_group) ?>', 1);"><div id="elh_view_ongoing_treatment_blood_group" class="view_ongoing_treatment_blood_group">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->blood_group->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->blood_group->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->blood_group->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->mobile_no->Visible) { // mobile_no ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->mobile_no) == "") { ?>
		<th data-name="mobile_no" class="<?php echo $view_ongoing_treatment_list->mobile_no->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_mobile_no" class="view_ongoing_treatment_mobile_no"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->mobile_no->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mobile_no" class="<?php echo $view_ongoing_treatment_list->mobile_no->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->mobile_no) ?>', 1);"><div id="elh_view_ongoing_treatment_mobile_no" class="view_ongoing_treatment_mobile_no">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->mobile_no->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->mobile_no->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->mobile_no->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->IdentificationMark->Visible) { // IdentificationMark ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->IdentificationMark) == "") { ?>
		<th data-name="IdentificationMark" class="<?php echo $view_ongoing_treatment_list->IdentificationMark->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_IdentificationMark" class="view_ongoing_treatment_IdentificationMark"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->IdentificationMark->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IdentificationMark" class="<?php echo $view_ongoing_treatment_list->IdentificationMark->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->IdentificationMark) ?>', 1);"><div id="elh_view_ongoing_treatment_IdentificationMark" class="view_ongoing_treatment_IdentificationMark">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->IdentificationMark->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->IdentificationMark->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->IdentificationMark->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->Religion->Visible) { // Religion ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->Religion) == "") { ?>
		<th data-name="Religion" class="<?php echo $view_ongoing_treatment_list->Religion->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_Religion" class="view_ongoing_treatment_Religion"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->Religion->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Religion" class="<?php echo $view_ongoing_treatment_list->Religion->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->Religion) ?>', 1);"><div id="elh_view_ongoing_treatment_Religion" class="view_ongoing_treatment_Religion">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->Religion->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->Religion->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->Religion->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->Nationality->Visible) { // Nationality ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->Nationality) == "") { ?>
		<th data-name="Nationality" class="<?php echo $view_ongoing_treatment_list->Nationality->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_Nationality" class="view_ongoing_treatment_Nationality"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->Nationality->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Nationality" class="<?php echo $view_ongoing_treatment_list->Nationality->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->Nationality) ?>', 1);"><div id="elh_view_ongoing_treatment_Nationality" class="view_ongoing_treatment_Nationality">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->Nationality->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->Nationality->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->Nationality->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->profilePic->Visible) { // profilePic ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->profilePic) == "") { ?>
		<th data-name="profilePic" class="<?php echo $view_ongoing_treatment_list->profilePic->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_profilePic" class="view_ongoing_treatment_profilePic"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->profilePic->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="profilePic" class="<?php echo $view_ongoing_treatment_list->profilePic->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->profilePic) ?>', 1);"><div id="elh_view_ongoing_treatment_profilePic" class="view_ongoing_treatment_profilePic">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->profilePic->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->profilePic->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->profilePic->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->ReferedByDr->Visible) { // ReferedByDr ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->ReferedByDr) == "") { ?>
		<th data-name="ReferedByDr" class="<?php echo $view_ongoing_treatment_list->ReferedByDr->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_ReferedByDr" class="view_ongoing_treatment_ReferedByDr"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->ReferedByDr->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReferedByDr" class="<?php echo $view_ongoing_treatment_list->ReferedByDr->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->ReferedByDr) ?>', 1);"><div id="elh_view_ongoing_treatment_ReferedByDr" class="view_ongoing_treatment_ReferedByDr">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->ReferedByDr->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->ReferedByDr->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->ReferedByDr->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->ReferClinicname->Visible) { // ReferClinicname ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->ReferClinicname) == "") { ?>
		<th data-name="ReferClinicname" class="<?php echo $view_ongoing_treatment_list->ReferClinicname->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_ReferClinicname" class="view_ongoing_treatment_ReferClinicname"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->ReferClinicname->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReferClinicname" class="<?php echo $view_ongoing_treatment_list->ReferClinicname->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->ReferClinicname) ?>', 1);"><div id="elh_view_ongoing_treatment_ReferClinicname" class="view_ongoing_treatment_ReferClinicname">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->ReferClinicname->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->ReferClinicname->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->ReferClinicname->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->ReferCity->Visible) { // ReferCity ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->ReferCity) == "") { ?>
		<th data-name="ReferCity" class="<?php echo $view_ongoing_treatment_list->ReferCity->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_ReferCity" class="view_ongoing_treatment_ReferCity"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->ReferCity->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReferCity" class="<?php echo $view_ongoing_treatment_list->ReferCity->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->ReferCity) ?>', 1);"><div id="elh_view_ongoing_treatment_ReferCity" class="view_ongoing_treatment_ReferCity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->ReferCity->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->ReferCity->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->ReferCity->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->ReferMobileNo->Visible) { // ReferMobileNo ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->ReferMobileNo) == "") { ?>
		<th data-name="ReferMobileNo" class="<?php echo $view_ongoing_treatment_list->ReferMobileNo->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_ReferMobileNo" class="view_ongoing_treatment_ReferMobileNo"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->ReferMobileNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReferMobileNo" class="<?php echo $view_ongoing_treatment_list->ReferMobileNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->ReferMobileNo) ?>', 1);"><div id="elh_view_ongoing_treatment_ReferMobileNo" class="view_ongoing_treatment_ReferMobileNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->ReferMobileNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->ReferMobileNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->ReferMobileNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->ReferA4TreatingConsultant) == "") { ?>
		<th data-name="ReferA4TreatingConsultant" class="<?php echo $view_ongoing_treatment_list->ReferA4TreatingConsultant->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_ReferA4TreatingConsultant" class="view_ongoing_treatment_ReferA4TreatingConsultant"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->ReferA4TreatingConsultant->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReferA4TreatingConsultant" class="<?php echo $view_ongoing_treatment_list->ReferA4TreatingConsultant->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->ReferA4TreatingConsultant) ?>', 1);"><div id="elh_view_ongoing_treatment_ReferA4TreatingConsultant" class="view_ongoing_treatment_ReferA4TreatingConsultant">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->ReferA4TreatingConsultant->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->ReferA4TreatingConsultant->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->ReferA4TreatingConsultant->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->PurposreReferredfor) == "") { ?>
		<th data-name="PurposreReferredfor" class="<?php echo $view_ongoing_treatment_list->PurposreReferredfor->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_PurposreReferredfor" class="view_ongoing_treatment_PurposreReferredfor"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->PurposreReferredfor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PurposreReferredfor" class="<?php echo $view_ongoing_treatment_list->PurposreReferredfor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->PurposreReferredfor) ?>', 1);"><div id="elh_view_ongoing_treatment_PurposreReferredfor" class="view_ongoing_treatment_PurposreReferredfor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->PurposreReferredfor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->PurposreReferredfor->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->PurposreReferredfor->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->spouse_title->Visible) { // spouse_title ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->spouse_title) == "") { ?>
		<th data-name="spouse_title" class="<?php echo $view_ongoing_treatment_list->spouse_title->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_spouse_title" class="view_ongoing_treatment_spouse_title"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->spouse_title->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="spouse_title" class="<?php echo $view_ongoing_treatment_list->spouse_title->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->spouse_title) ?>', 1);"><div id="elh_view_ongoing_treatment_spouse_title" class="view_ongoing_treatment_spouse_title">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->spouse_title->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->spouse_title->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->spouse_title->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->spouse_first_name->Visible) { // spouse_first_name ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->spouse_first_name) == "") { ?>
		<th data-name="spouse_first_name" class="<?php echo $view_ongoing_treatment_list->spouse_first_name->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_spouse_first_name" class="view_ongoing_treatment_spouse_first_name"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->spouse_first_name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="spouse_first_name" class="<?php echo $view_ongoing_treatment_list->spouse_first_name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->spouse_first_name) ?>', 1);"><div id="elh_view_ongoing_treatment_spouse_first_name" class="view_ongoing_treatment_spouse_first_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->spouse_first_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->spouse_first_name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->spouse_first_name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->spouse_middle_name->Visible) { // spouse_middle_name ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->spouse_middle_name) == "") { ?>
		<th data-name="spouse_middle_name" class="<?php echo $view_ongoing_treatment_list->spouse_middle_name->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_spouse_middle_name" class="view_ongoing_treatment_spouse_middle_name"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->spouse_middle_name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="spouse_middle_name" class="<?php echo $view_ongoing_treatment_list->spouse_middle_name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->spouse_middle_name) ?>', 1);"><div id="elh_view_ongoing_treatment_spouse_middle_name" class="view_ongoing_treatment_spouse_middle_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->spouse_middle_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->spouse_middle_name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->spouse_middle_name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->spouse_last_name->Visible) { // spouse_last_name ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->spouse_last_name) == "") { ?>
		<th data-name="spouse_last_name" class="<?php echo $view_ongoing_treatment_list->spouse_last_name->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_spouse_last_name" class="view_ongoing_treatment_spouse_last_name"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->spouse_last_name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="spouse_last_name" class="<?php echo $view_ongoing_treatment_list->spouse_last_name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->spouse_last_name) ?>', 1);"><div id="elh_view_ongoing_treatment_spouse_last_name" class="view_ongoing_treatment_spouse_last_name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->spouse_last_name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->spouse_last_name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->spouse_last_name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->spouse_gender->Visible) { // spouse_gender ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->spouse_gender) == "") { ?>
		<th data-name="spouse_gender" class="<?php echo $view_ongoing_treatment_list->spouse_gender->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_spouse_gender" class="view_ongoing_treatment_spouse_gender"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->spouse_gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="spouse_gender" class="<?php echo $view_ongoing_treatment_list->spouse_gender->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->spouse_gender) ?>', 1);"><div id="elh_view_ongoing_treatment_spouse_gender" class="view_ongoing_treatment_spouse_gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->spouse_gender->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->spouse_gender->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->spouse_gender->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->spouse_dob->Visible) { // spouse_dob ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->spouse_dob) == "") { ?>
		<th data-name="spouse_dob" class="<?php echo $view_ongoing_treatment_list->spouse_dob->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_spouse_dob" class="view_ongoing_treatment_spouse_dob"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->spouse_dob->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="spouse_dob" class="<?php echo $view_ongoing_treatment_list->spouse_dob->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->spouse_dob) ?>', 1);"><div id="elh_view_ongoing_treatment_spouse_dob" class="view_ongoing_treatment_spouse_dob">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->spouse_dob->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->spouse_dob->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->spouse_dob->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->spouse_Age->Visible) { // spouse_Age ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->spouse_Age) == "") { ?>
		<th data-name="spouse_Age" class="<?php echo $view_ongoing_treatment_list->spouse_Age->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_spouse_Age" class="view_ongoing_treatment_spouse_Age"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->spouse_Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="spouse_Age" class="<?php echo $view_ongoing_treatment_list->spouse_Age->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->spouse_Age) ?>', 1);"><div id="elh_view_ongoing_treatment_spouse_Age" class="view_ongoing_treatment_spouse_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->spouse_Age->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->spouse_Age->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->spouse_Age->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->spouse_blood_group->Visible) { // spouse_blood_group ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->spouse_blood_group) == "") { ?>
		<th data-name="spouse_blood_group" class="<?php echo $view_ongoing_treatment_list->spouse_blood_group->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_spouse_blood_group" class="view_ongoing_treatment_spouse_blood_group"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->spouse_blood_group->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="spouse_blood_group" class="<?php echo $view_ongoing_treatment_list->spouse_blood_group->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->spouse_blood_group) ?>', 1);"><div id="elh_view_ongoing_treatment_spouse_blood_group" class="view_ongoing_treatment_spouse_blood_group">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->spouse_blood_group->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->spouse_blood_group->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->spouse_blood_group->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->spouse_mobile_no->Visible) { // spouse_mobile_no ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->spouse_mobile_no) == "") { ?>
		<th data-name="spouse_mobile_no" class="<?php echo $view_ongoing_treatment_list->spouse_mobile_no->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_spouse_mobile_no" class="view_ongoing_treatment_spouse_mobile_no"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->spouse_mobile_no->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="spouse_mobile_no" class="<?php echo $view_ongoing_treatment_list->spouse_mobile_no->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->spouse_mobile_no) ?>', 1);"><div id="elh_view_ongoing_treatment_spouse_mobile_no" class="view_ongoing_treatment_spouse_mobile_no">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->spouse_mobile_no->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->spouse_mobile_no->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->spouse_mobile_no->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->Maritalstatus->Visible) { // Maritalstatus ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->Maritalstatus) == "") { ?>
		<th data-name="Maritalstatus" class="<?php echo $view_ongoing_treatment_list->Maritalstatus->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_Maritalstatus" class="view_ongoing_treatment_Maritalstatus"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->Maritalstatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Maritalstatus" class="<?php echo $view_ongoing_treatment_list->Maritalstatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->Maritalstatus) ?>', 1);"><div id="elh_view_ongoing_treatment_Maritalstatus" class="view_ongoing_treatment_Maritalstatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->Maritalstatus->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->Maritalstatus->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->Maritalstatus->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->Business->Visible) { // Business ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->Business) == "") { ?>
		<th data-name="Business" class="<?php echo $view_ongoing_treatment_list->Business->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_Business" class="view_ongoing_treatment_Business"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->Business->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Business" class="<?php echo $view_ongoing_treatment_list->Business->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->Business) ?>', 1);"><div id="elh_view_ongoing_treatment_Business" class="view_ongoing_treatment_Business">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->Business->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->Business->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->Business->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->Patient_Language->Visible) { // Patient_Language ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->Patient_Language) == "") { ?>
		<th data-name="Patient_Language" class="<?php echo $view_ongoing_treatment_list->Patient_Language->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_Patient_Language" class="view_ongoing_treatment_Patient_Language"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->Patient_Language->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Patient_Language" class="<?php echo $view_ongoing_treatment_list->Patient_Language->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->Patient_Language) ?>', 1);"><div id="elh_view_ongoing_treatment_Patient_Language" class="view_ongoing_treatment_Patient_Language">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->Patient_Language->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->Patient_Language->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->Patient_Language->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->Passport->Visible) { // Passport ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->Passport) == "") { ?>
		<th data-name="Passport" class="<?php echo $view_ongoing_treatment_list->Passport->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_Passport" class="view_ongoing_treatment_Passport"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->Passport->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Passport" class="<?php echo $view_ongoing_treatment_list->Passport->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->Passport) ?>', 1);"><div id="elh_view_ongoing_treatment_Passport" class="view_ongoing_treatment_Passport">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->Passport->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->Passport->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->Passport->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->VisaNo->Visible) { // VisaNo ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->VisaNo) == "") { ?>
		<th data-name="VisaNo" class="<?php echo $view_ongoing_treatment_list->VisaNo->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_VisaNo" class="view_ongoing_treatment_VisaNo"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->VisaNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="VisaNo" class="<?php echo $view_ongoing_treatment_list->VisaNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->VisaNo) ?>', 1);"><div id="elh_view_ongoing_treatment_VisaNo" class="view_ongoing_treatment_VisaNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->VisaNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->VisaNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->VisaNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->ValidityOfVisa->Visible) { // ValidityOfVisa ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->ValidityOfVisa) == "") { ?>
		<th data-name="ValidityOfVisa" class="<?php echo $view_ongoing_treatment_list->ValidityOfVisa->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_ValidityOfVisa" class="view_ongoing_treatment_ValidityOfVisa"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->ValidityOfVisa->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ValidityOfVisa" class="<?php echo $view_ongoing_treatment_list->ValidityOfVisa->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->ValidityOfVisa) ?>', 1);"><div id="elh_view_ongoing_treatment_ValidityOfVisa" class="view_ongoing_treatment_ValidityOfVisa">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->ValidityOfVisa->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->ValidityOfVisa->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->ValidityOfVisa->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->WhereDidYouHear) == "") { ?>
		<th data-name="WhereDidYouHear" class="<?php echo $view_ongoing_treatment_list->WhereDidYouHear->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_WhereDidYouHear" class="view_ongoing_treatment_WhereDidYouHear"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->WhereDidYouHear->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="WhereDidYouHear" class="<?php echo $view_ongoing_treatment_list->WhereDidYouHear->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->WhereDidYouHear) ?>', 1);"><div id="elh_view_ongoing_treatment_WhereDidYouHear" class="view_ongoing_treatment_WhereDidYouHear">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->WhereDidYouHear->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->WhereDidYouHear->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->WhereDidYouHear->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->HospID->Visible) { // HospID ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_ongoing_treatment_list->HospID->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_HospID" class="view_ongoing_treatment_HospID"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_ongoing_treatment_list->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->HospID) ?>', 1);"><div id="elh_view_ongoing_treatment_HospID" class="view_ongoing_treatment_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->HospID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->street->Visible) { // street ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->street) == "") { ?>
		<th data-name="street" class="<?php echo $view_ongoing_treatment_list->street->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_street" class="view_ongoing_treatment_street"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->street->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="street" class="<?php echo $view_ongoing_treatment_list->street->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->street) ?>', 1);"><div id="elh_view_ongoing_treatment_street" class="view_ongoing_treatment_street">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->street->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->street->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->street->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->town->Visible) { // town ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->town) == "") { ?>
		<th data-name="town" class="<?php echo $view_ongoing_treatment_list->town->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_town" class="view_ongoing_treatment_town"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->town->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="town" class="<?php echo $view_ongoing_treatment_list->town->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->town) ?>', 1);"><div id="elh_view_ongoing_treatment_town" class="view_ongoing_treatment_town">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->town->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->town->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->town->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->province->Visible) { // province ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->province) == "") { ?>
		<th data-name="province" class="<?php echo $view_ongoing_treatment_list->province->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_province" class="view_ongoing_treatment_province"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->province->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="province" class="<?php echo $view_ongoing_treatment_list->province->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->province) ?>', 1);"><div id="elh_view_ongoing_treatment_province" class="view_ongoing_treatment_province">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->province->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->province->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->province->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->country->Visible) { // country ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->country) == "") { ?>
		<th data-name="country" class="<?php echo $view_ongoing_treatment_list->country->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_country" class="view_ongoing_treatment_country"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->country->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="country" class="<?php echo $view_ongoing_treatment_list->country->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->country) ?>', 1);"><div id="elh_view_ongoing_treatment_country" class="view_ongoing_treatment_country">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->country->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->country->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->country->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->postal_code->Visible) { // postal_code ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->postal_code) == "") { ?>
		<th data-name="postal_code" class="<?php echo $view_ongoing_treatment_list->postal_code->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_postal_code" class="view_ongoing_treatment_postal_code"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->postal_code->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="postal_code" class="<?php echo $view_ongoing_treatment_list->postal_code->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->postal_code) ?>', 1);"><div id="elh_view_ongoing_treatment_postal_code" class="view_ongoing_treatment_postal_code">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->postal_code->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->postal_code->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->postal_code->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->PEmail->Visible) { // PEmail ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->PEmail) == "") { ?>
		<th data-name="PEmail" class="<?php echo $view_ongoing_treatment_list->PEmail->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_PEmail" class="view_ongoing_treatment_PEmail"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->PEmail->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PEmail" class="<?php echo $view_ongoing_treatment_list->PEmail->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->PEmail) ?>', 1);"><div id="elh_view_ongoing_treatment_PEmail" class="view_ongoing_treatment_PEmail">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->PEmail->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->PEmail->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->PEmail->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->PEmergencyContact->Visible) { // PEmergencyContact ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->PEmergencyContact) == "") { ?>
		<th data-name="PEmergencyContact" class="<?php echo $view_ongoing_treatment_list->PEmergencyContact->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_PEmergencyContact" class="view_ongoing_treatment_PEmergencyContact"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->PEmergencyContact->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PEmergencyContact" class="<?php echo $view_ongoing_treatment_list->PEmergencyContact->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->PEmergencyContact) ?>', 1);"><div id="elh_view_ongoing_treatment_PEmergencyContact" class="view_ongoing_treatment_PEmergencyContact">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->PEmergencyContact->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->PEmergencyContact->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->PEmergencyContact->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->occupation->Visible) { // occupation ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->occupation) == "") { ?>
		<th data-name="occupation" class="<?php echo $view_ongoing_treatment_list->occupation->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_occupation" class="view_ongoing_treatment_occupation"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->occupation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="occupation" class="<?php echo $view_ongoing_treatment_list->occupation->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->occupation) ?>', 1);"><div id="elh_view_ongoing_treatment_occupation" class="view_ongoing_treatment_occupation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->occupation->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->occupation->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->occupation->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->spouse_occupation->Visible) { // spouse_occupation ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->spouse_occupation) == "") { ?>
		<th data-name="spouse_occupation" class="<?php echo $view_ongoing_treatment_list->spouse_occupation->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_spouse_occupation" class="view_ongoing_treatment_spouse_occupation"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->spouse_occupation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="spouse_occupation" class="<?php echo $view_ongoing_treatment_list->spouse_occupation->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->spouse_occupation) ?>', 1);"><div id="elh_view_ongoing_treatment_spouse_occupation" class="view_ongoing_treatment_spouse_occupation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->spouse_occupation->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->spouse_occupation->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->spouse_occupation->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->WhatsApp->Visible) { // WhatsApp ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->WhatsApp) == "") { ?>
		<th data-name="WhatsApp" class="<?php echo $view_ongoing_treatment_list->WhatsApp->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_WhatsApp" class="view_ongoing_treatment_WhatsApp"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->WhatsApp->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="WhatsApp" class="<?php echo $view_ongoing_treatment_list->WhatsApp->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->WhatsApp) ?>', 1);"><div id="elh_view_ongoing_treatment_WhatsApp" class="view_ongoing_treatment_WhatsApp">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->WhatsApp->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->WhatsApp->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->WhatsApp->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->CouppleID->Visible) { // CouppleID ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->CouppleID) == "") { ?>
		<th data-name="CouppleID" class="<?php echo $view_ongoing_treatment_list->CouppleID->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_CouppleID" class="view_ongoing_treatment_CouppleID"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->CouppleID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CouppleID" class="<?php echo $view_ongoing_treatment_list->CouppleID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->CouppleID) ?>', 1);"><div id="elh_view_ongoing_treatment_CouppleID" class="view_ongoing_treatment_CouppleID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->CouppleID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->CouppleID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->CouppleID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->MaleID->Visible) { // MaleID ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->MaleID) == "") { ?>
		<th data-name="MaleID" class="<?php echo $view_ongoing_treatment_list->MaleID->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_MaleID" class="view_ongoing_treatment_MaleID"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->MaleID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MaleID" class="<?php echo $view_ongoing_treatment_list->MaleID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->MaleID) ?>', 1);"><div id="elh_view_ongoing_treatment_MaleID" class="view_ongoing_treatment_MaleID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->MaleID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->MaleID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->MaleID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->FemaleID->Visible) { // FemaleID ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->FemaleID) == "") { ?>
		<th data-name="FemaleID" class="<?php echo $view_ongoing_treatment_list->FemaleID->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_FemaleID" class="view_ongoing_treatment_FemaleID"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->FemaleID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FemaleID" class="<?php echo $view_ongoing_treatment_list->FemaleID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->FemaleID) ?>', 1);"><div id="elh_view_ongoing_treatment_FemaleID" class="view_ongoing_treatment_FemaleID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->FemaleID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->FemaleID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->FemaleID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->GroupID->Visible) { // GroupID ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->GroupID) == "") { ?>
		<th data-name="GroupID" class="<?php echo $view_ongoing_treatment_list->GroupID->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_GroupID" class="view_ongoing_treatment_GroupID"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->GroupID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GroupID" class="<?php echo $view_ongoing_treatment_list->GroupID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->GroupID) ?>', 1);"><div id="elh_view_ongoing_treatment_GroupID" class="view_ongoing_treatment_GroupID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->GroupID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->GroupID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->GroupID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->Relationship->Visible) { // Relationship ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->Relationship) == "") { ?>
		<th data-name="Relationship" class="<?php echo $view_ongoing_treatment_list->Relationship->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_Relationship" class="view_ongoing_treatment_Relationship"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->Relationship->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Relationship" class="<?php echo $view_ongoing_treatment_list->Relationship->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->Relationship) ?>', 1);"><div id="elh_view_ongoing_treatment_Relationship" class="view_ongoing_treatment_Relationship">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->Relationship->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->Relationship->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->Relationship->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->FacebookID->Visible) { // FacebookID ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->FacebookID) == "") { ?>
		<th data-name="FacebookID" class="<?php echo $view_ongoing_treatment_list->FacebookID->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_FacebookID" class="view_ongoing_treatment_FacebookID"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->FacebookID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FacebookID" class="<?php echo $view_ongoing_treatment_list->FacebookID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->FacebookID) ?>', 1);"><div id="elh_view_ongoing_treatment_FacebookID" class="view_ongoing_treatment_FacebookID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->FacebookID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->FacebookID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->FacebookID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->id->Visible) { // id ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_ongoing_treatment_list->id->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_id" class="view_ongoing_treatment_id"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_ongoing_treatment_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->id) ?>', 1);"><div id="elh_view_ongoing_treatment_id" class="view_ongoing_treatment_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->RIDNO->Visible) { // RIDNO ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->RIDNO) == "") { ?>
		<th data-name="RIDNO" class="<?php echo $view_ongoing_treatment_list->RIDNO->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_RIDNO" class="view_ongoing_treatment_RIDNO"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->RIDNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RIDNO" class="<?php echo $view_ongoing_treatment_list->RIDNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->RIDNO) ?>', 1);"><div id="elh_view_ongoing_treatment_RIDNO" class="view_ongoing_treatment_RIDNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->RIDNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->RIDNO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->RIDNO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->Name->Visible) { // Name ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->Name) == "") { ?>
		<th data-name="Name" class="<?php echo $view_ongoing_treatment_list->Name->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_Name" class="view_ongoing_treatment_Name"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Name" class="<?php echo $view_ongoing_treatment_list->Name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->Name) ?>', 1);"><div id="elh_view_ongoing_treatment_Name" class="view_ongoing_treatment_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->Name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->Name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->Name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->treatment_status->Visible) { // treatment_status ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->treatment_status) == "") { ?>
		<th data-name="treatment_status" class="<?php echo $view_ongoing_treatment_list->treatment_status->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_treatment_status" class="view_ongoing_treatment_treatment_status"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->treatment_status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="treatment_status" class="<?php echo $view_ongoing_treatment_list->treatment_status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->treatment_status) ?>', 1);"><div id="elh_view_ongoing_treatment_treatment_status" class="view_ongoing_treatment_treatment_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->treatment_status->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->treatment_status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->treatment_status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->ARTCYCLE->Visible) { // ARTCYCLE ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->ARTCYCLE) == "") { ?>
		<th data-name="ARTCYCLE" class="<?php echo $view_ongoing_treatment_list->ARTCYCLE->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_ARTCYCLE" class="view_ongoing_treatment_ARTCYCLE"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->ARTCYCLE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ARTCYCLE" class="<?php echo $view_ongoing_treatment_list->ARTCYCLE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->ARTCYCLE) ?>', 1);"><div id="elh_view_ongoing_treatment_ARTCYCLE" class="view_ongoing_treatment_ARTCYCLE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->ARTCYCLE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->ARTCYCLE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->ARTCYCLE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->RESULT->Visible) { // RESULT ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->RESULT) == "") { ?>
		<th data-name="RESULT" class="<?php echo $view_ongoing_treatment_list->RESULT->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_RESULT" class="view_ongoing_treatment_RESULT"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->RESULT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RESULT" class="<?php echo $view_ongoing_treatment_list->RESULT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->RESULT) ?>', 1);"><div id="elh_view_ongoing_treatment_RESULT" class="view_ongoing_treatment_RESULT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->RESULT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->RESULT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->RESULT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->status->Visible) { // status ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->status) == "") { ?>
		<th data-name="status" class="<?php echo $view_ongoing_treatment_list->status->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_status" class="view_ongoing_treatment_status"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $view_ongoing_treatment_list->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->status) ?>', 1);"><div id="elh_view_ongoing_treatment_status" class="view_ongoing_treatment_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->createdby->Visible) { // createdby ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $view_ongoing_treatment_list->createdby->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_createdby" class="view_ongoing_treatment_createdby"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $view_ongoing_treatment_list->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->createdby) ?>', 1);"><div id="elh_view_ongoing_treatment_createdby" class="view_ongoing_treatment_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->createdby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->createdby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_ongoing_treatment_list->createddatetime->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_createddatetime" class="view_ongoing_treatment_createddatetime"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_ongoing_treatment_list->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->createddatetime) ?>', 1);"><div id="elh_view_ongoing_treatment_createddatetime" class="view_ongoing_treatment_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->createddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->createddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->modifiedby->Visible) { // modifiedby ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $view_ongoing_treatment_list->modifiedby->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_modifiedby" class="view_ongoing_treatment_modifiedby"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $view_ongoing_treatment_list->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->modifiedby) ?>', 1);"><div id="elh_view_ongoing_treatment_modifiedby" class="view_ongoing_treatment_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->modifiedby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->modifiedby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_ongoing_treatment_list->modifieddatetime->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_modifieddatetime" class="view_ongoing_treatment_modifieddatetime"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_ongoing_treatment_list->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->modifieddatetime) ?>', 1);"><div id="elh_view_ongoing_treatment_modifieddatetime" class="view_ongoing_treatment_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->modifieddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->modifieddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->TreatmentStartDate->Visible) { // TreatmentStartDate ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->TreatmentStartDate) == "") { ?>
		<th data-name="TreatmentStartDate" class="<?php echo $view_ongoing_treatment_list->TreatmentStartDate->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_TreatmentStartDate" class="view_ongoing_treatment_TreatmentStartDate"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->TreatmentStartDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TreatmentStartDate" class="<?php echo $view_ongoing_treatment_list->TreatmentStartDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->TreatmentStartDate) ?>', 1);"><div id="elh_view_ongoing_treatment_TreatmentStartDate" class="view_ongoing_treatment_TreatmentStartDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->TreatmentStartDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->TreatmentStartDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->TreatmentStartDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->TreatementStopDate->Visible) { // TreatementStopDate ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->TreatementStopDate) == "") { ?>
		<th data-name="TreatementStopDate" class="<?php echo $view_ongoing_treatment_list->TreatementStopDate->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_TreatementStopDate" class="view_ongoing_treatment_TreatementStopDate"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->TreatementStopDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TreatementStopDate" class="<?php echo $view_ongoing_treatment_list->TreatementStopDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->TreatementStopDate) ?>', 1);"><div id="elh_view_ongoing_treatment_TreatementStopDate" class="view_ongoing_treatment_TreatementStopDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->TreatementStopDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->TreatementStopDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->TreatementStopDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->TypePatient->Visible) { // TypePatient ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->TypePatient) == "") { ?>
		<th data-name="TypePatient" class="<?php echo $view_ongoing_treatment_list->TypePatient->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_TypePatient" class="view_ongoing_treatment_TypePatient"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->TypePatient->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TypePatient" class="<?php echo $view_ongoing_treatment_list->TypePatient->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->TypePatient) ?>', 1);"><div id="elh_view_ongoing_treatment_TypePatient" class="view_ongoing_treatment_TypePatient">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->TypePatient->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->TypePatient->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->TypePatient->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->Treatment->Visible) { // Treatment ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->Treatment) == "") { ?>
		<th data-name="Treatment" class="<?php echo $view_ongoing_treatment_list->Treatment->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_Treatment" class="view_ongoing_treatment_Treatment"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->Treatment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Treatment" class="<?php echo $view_ongoing_treatment_list->Treatment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->Treatment) ?>', 1);"><div id="elh_view_ongoing_treatment_Treatment" class="view_ongoing_treatment_Treatment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->Treatment->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->Treatment->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->Treatment->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->TreatmentTec->Visible) { // TreatmentTec ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->TreatmentTec) == "") { ?>
		<th data-name="TreatmentTec" class="<?php echo $view_ongoing_treatment_list->TreatmentTec->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_TreatmentTec" class="view_ongoing_treatment_TreatmentTec"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->TreatmentTec->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TreatmentTec" class="<?php echo $view_ongoing_treatment_list->TreatmentTec->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->TreatmentTec) ?>', 1);"><div id="elh_view_ongoing_treatment_TreatmentTec" class="view_ongoing_treatment_TreatmentTec">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->TreatmentTec->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->TreatmentTec->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->TreatmentTec->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->TypeOfCycle->Visible) { // TypeOfCycle ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->TypeOfCycle) == "") { ?>
		<th data-name="TypeOfCycle" class="<?php echo $view_ongoing_treatment_list->TypeOfCycle->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_TypeOfCycle" class="view_ongoing_treatment_TypeOfCycle"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->TypeOfCycle->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TypeOfCycle" class="<?php echo $view_ongoing_treatment_list->TypeOfCycle->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->TypeOfCycle) ?>', 1);"><div id="elh_view_ongoing_treatment_TypeOfCycle" class="view_ongoing_treatment_TypeOfCycle">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->TypeOfCycle->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->TypeOfCycle->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->TypeOfCycle->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->SpermOrgin->Visible) { // SpermOrgin ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->SpermOrgin) == "") { ?>
		<th data-name="SpermOrgin" class="<?php echo $view_ongoing_treatment_list->SpermOrgin->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_SpermOrgin" class="view_ongoing_treatment_SpermOrgin"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->SpermOrgin->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SpermOrgin" class="<?php echo $view_ongoing_treatment_list->SpermOrgin->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->SpermOrgin) ?>', 1);"><div id="elh_view_ongoing_treatment_SpermOrgin" class="view_ongoing_treatment_SpermOrgin">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->SpermOrgin->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->SpermOrgin->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->SpermOrgin->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->State->Visible) { // State ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->State) == "") { ?>
		<th data-name="State" class="<?php echo $view_ongoing_treatment_list->State->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_State" class="view_ongoing_treatment_State"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->State->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="State" class="<?php echo $view_ongoing_treatment_list->State->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->State) ?>', 1);"><div id="elh_view_ongoing_treatment_State" class="view_ongoing_treatment_State">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->State->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->State->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->State->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->Origin->Visible) { // Origin ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->Origin) == "") { ?>
		<th data-name="Origin" class="<?php echo $view_ongoing_treatment_list->Origin->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_Origin" class="view_ongoing_treatment_Origin"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->Origin->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Origin" class="<?php echo $view_ongoing_treatment_list->Origin->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->Origin) ?>', 1);"><div id="elh_view_ongoing_treatment_Origin" class="view_ongoing_treatment_Origin">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->Origin->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->Origin->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->Origin->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->MACS->Visible) { // MACS ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->MACS) == "") { ?>
		<th data-name="MACS" class="<?php echo $view_ongoing_treatment_list->MACS->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_MACS" class="view_ongoing_treatment_MACS"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->MACS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MACS" class="<?php echo $view_ongoing_treatment_list->MACS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->MACS) ?>', 1);"><div id="elh_view_ongoing_treatment_MACS" class="view_ongoing_treatment_MACS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->MACS->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->MACS->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->MACS->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->Technique->Visible) { // Technique ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->Technique) == "") { ?>
		<th data-name="Technique" class="<?php echo $view_ongoing_treatment_list->Technique->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_Technique" class="view_ongoing_treatment_Technique"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->Technique->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Technique" class="<?php echo $view_ongoing_treatment_list->Technique->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->Technique) ?>', 1);"><div id="elh_view_ongoing_treatment_Technique" class="view_ongoing_treatment_Technique">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->Technique->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->Technique->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->Technique->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->PgdPlanning->Visible) { // PgdPlanning ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->PgdPlanning) == "") { ?>
		<th data-name="PgdPlanning" class="<?php echo $view_ongoing_treatment_list->PgdPlanning->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_PgdPlanning" class="view_ongoing_treatment_PgdPlanning"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->PgdPlanning->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PgdPlanning" class="<?php echo $view_ongoing_treatment_list->PgdPlanning->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->PgdPlanning) ?>', 1);"><div id="elh_view_ongoing_treatment_PgdPlanning" class="view_ongoing_treatment_PgdPlanning">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->PgdPlanning->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->PgdPlanning->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->PgdPlanning->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->IMSI->Visible) { // IMSI ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->IMSI) == "") { ?>
		<th data-name="IMSI" class="<?php echo $view_ongoing_treatment_list->IMSI->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_IMSI" class="view_ongoing_treatment_IMSI"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->IMSI->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IMSI" class="<?php echo $view_ongoing_treatment_list->IMSI->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->IMSI) ?>', 1);"><div id="elh_view_ongoing_treatment_IMSI" class="view_ongoing_treatment_IMSI">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->IMSI->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->IMSI->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->IMSI->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->SequentialCulture->Visible) { // SequentialCulture ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->SequentialCulture) == "") { ?>
		<th data-name="SequentialCulture" class="<?php echo $view_ongoing_treatment_list->SequentialCulture->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_SequentialCulture" class="view_ongoing_treatment_SequentialCulture"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->SequentialCulture->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SequentialCulture" class="<?php echo $view_ongoing_treatment_list->SequentialCulture->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->SequentialCulture) ?>', 1);"><div id="elh_view_ongoing_treatment_SequentialCulture" class="view_ongoing_treatment_SequentialCulture">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->SequentialCulture->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->SequentialCulture->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->SequentialCulture->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->TimeLapse->Visible) { // TimeLapse ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->TimeLapse) == "") { ?>
		<th data-name="TimeLapse" class="<?php echo $view_ongoing_treatment_list->TimeLapse->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_TimeLapse" class="view_ongoing_treatment_TimeLapse"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->TimeLapse->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TimeLapse" class="<?php echo $view_ongoing_treatment_list->TimeLapse->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->TimeLapse) ?>', 1);"><div id="elh_view_ongoing_treatment_TimeLapse" class="view_ongoing_treatment_TimeLapse">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->TimeLapse->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->TimeLapse->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->TimeLapse->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->AH->Visible) { // AH ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->AH) == "") { ?>
		<th data-name="AH" class="<?php echo $view_ongoing_treatment_list->AH->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_AH" class="view_ongoing_treatment_AH"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->AH->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AH" class="<?php echo $view_ongoing_treatment_list->AH->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->AH) ?>', 1);"><div id="elh_view_ongoing_treatment_AH" class="view_ongoing_treatment_AH">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->AH->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->AH->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->AH->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->Weight->Visible) { // Weight ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->Weight) == "") { ?>
		<th data-name="Weight" class="<?php echo $view_ongoing_treatment_list->Weight->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_Weight" class="view_ongoing_treatment_Weight"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->Weight->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Weight" class="<?php echo $view_ongoing_treatment_list->Weight->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->Weight) ?>', 1);"><div id="elh_view_ongoing_treatment_Weight" class="view_ongoing_treatment_Weight">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->Weight->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->Weight->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->Weight->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->BMI->Visible) { // BMI ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->BMI) == "") { ?>
		<th data-name="BMI" class="<?php echo $view_ongoing_treatment_list->BMI->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_BMI" class="view_ongoing_treatment_BMI"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->BMI->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BMI" class="<?php echo $view_ongoing_treatment_list->BMI->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->BMI) ?>', 1);"><div id="elh_view_ongoing_treatment_BMI" class="view_ongoing_treatment_BMI">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->BMI->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->BMI->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->BMI->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->MaleIndications->Visible) { // MaleIndications ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->MaleIndications) == "") { ?>
		<th data-name="MaleIndications" class="<?php echo $view_ongoing_treatment_list->MaleIndications->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_MaleIndications" class="view_ongoing_treatment_MaleIndications"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->MaleIndications->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MaleIndications" class="<?php echo $view_ongoing_treatment_list->MaleIndications->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->MaleIndications) ?>', 1);"><div id="elh_view_ongoing_treatment_MaleIndications" class="view_ongoing_treatment_MaleIndications">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->MaleIndications->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->MaleIndications->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->MaleIndications->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->FemaleIndications->Visible) { // FemaleIndications ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->FemaleIndications) == "") { ?>
		<th data-name="FemaleIndications" class="<?php echo $view_ongoing_treatment_list->FemaleIndications->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_FemaleIndications" class="view_ongoing_treatment_FemaleIndications"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->FemaleIndications->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FemaleIndications" class="<?php echo $view_ongoing_treatment_list->FemaleIndications->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->FemaleIndications) ?>', 1);"><div id="elh_view_ongoing_treatment_FemaleIndications" class="view_ongoing_treatment_FemaleIndications">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->FemaleIndications->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->FemaleIndications->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->FemaleIndications->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->UseOfThe->Visible) { // UseOfThe ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->UseOfThe) == "") { ?>
		<th data-name="UseOfThe" class="<?php echo $view_ongoing_treatment_list->UseOfThe->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_UseOfThe" class="view_ongoing_treatment_UseOfThe"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->UseOfThe->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UseOfThe" class="<?php echo $view_ongoing_treatment_list->UseOfThe->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->UseOfThe) ?>', 1);"><div id="elh_view_ongoing_treatment_UseOfThe" class="view_ongoing_treatment_UseOfThe">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->UseOfThe->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->UseOfThe->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->UseOfThe->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->Ectopic->Visible) { // Ectopic ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->Ectopic) == "") { ?>
		<th data-name="Ectopic" class="<?php echo $view_ongoing_treatment_list->Ectopic->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_Ectopic" class="view_ongoing_treatment_Ectopic"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->Ectopic->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Ectopic" class="<?php echo $view_ongoing_treatment_list->Ectopic->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->Ectopic) ?>', 1);"><div id="elh_view_ongoing_treatment_Ectopic" class="view_ongoing_treatment_Ectopic">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->Ectopic->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->Ectopic->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->Ectopic->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->Heterotopic->Visible) { // Heterotopic ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->Heterotopic) == "") { ?>
		<th data-name="Heterotopic" class="<?php echo $view_ongoing_treatment_list->Heterotopic->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_Heterotopic" class="view_ongoing_treatment_Heterotopic"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->Heterotopic->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Heterotopic" class="<?php echo $view_ongoing_treatment_list->Heterotopic->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->Heterotopic) ?>', 1);"><div id="elh_view_ongoing_treatment_Heterotopic" class="view_ongoing_treatment_Heterotopic">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->Heterotopic->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->Heterotopic->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->Heterotopic->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->TransferDFE->Visible) { // TransferDFE ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->TransferDFE) == "") { ?>
		<th data-name="TransferDFE" class="<?php echo $view_ongoing_treatment_list->TransferDFE->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_TransferDFE" class="view_ongoing_treatment_TransferDFE"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->TransferDFE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TransferDFE" class="<?php echo $view_ongoing_treatment_list->TransferDFE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->TransferDFE) ?>', 1);"><div id="elh_view_ongoing_treatment_TransferDFE" class="view_ongoing_treatment_TransferDFE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->TransferDFE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->TransferDFE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->TransferDFE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->Evolutive->Visible) { // Evolutive ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->Evolutive) == "") { ?>
		<th data-name="Evolutive" class="<?php echo $view_ongoing_treatment_list->Evolutive->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_Evolutive" class="view_ongoing_treatment_Evolutive"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->Evolutive->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Evolutive" class="<?php echo $view_ongoing_treatment_list->Evolutive->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->Evolutive) ?>', 1);"><div id="elh_view_ongoing_treatment_Evolutive" class="view_ongoing_treatment_Evolutive">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->Evolutive->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->Evolutive->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->Evolutive->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->Number->Visible) { // Number ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->Number) == "") { ?>
		<th data-name="Number" class="<?php echo $view_ongoing_treatment_list->Number->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_Number" class="view_ongoing_treatment_Number"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->Number->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Number" class="<?php echo $view_ongoing_treatment_list->Number->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->Number) ?>', 1);"><div id="elh_view_ongoing_treatment_Number" class="view_ongoing_treatment_Number">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->Number->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->Number->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->Number->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->SequentialCult->Visible) { // SequentialCult ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->SequentialCult) == "") { ?>
		<th data-name="SequentialCult" class="<?php echo $view_ongoing_treatment_list->SequentialCult->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_SequentialCult" class="view_ongoing_treatment_SequentialCult"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->SequentialCult->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SequentialCult" class="<?php echo $view_ongoing_treatment_list->SequentialCult->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->SequentialCult) ?>', 1);"><div id="elh_view_ongoing_treatment_SequentialCult" class="view_ongoing_treatment_SequentialCult">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->SequentialCult->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->SequentialCult->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->SequentialCult->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->TineLapse->Visible) { // TineLapse ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->TineLapse) == "") { ?>
		<th data-name="TineLapse" class="<?php echo $view_ongoing_treatment_list->TineLapse->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_TineLapse" class="view_ongoing_treatment_TineLapse"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->TineLapse->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TineLapse" class="<?php echo $view_ongoing_treatment_list->TineLapse->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->TineLapse) ?>', 1);"><div id="elh_view_ongoing_treatment_TineLapse" class="view_ongoing_treatment_TineLapse">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->TineLapse->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->TineLapse->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->TineLapse->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->PatientName->Visible) { // PatientName ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $view_ongoing_treatment_list->PatientName->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_PatientName" class="view_ongoing_treatment_PatientName"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $view_ongoing_treatment_list->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->PatientName) ?>', 1);"><div id="elh_view_ongoing_treatment_PatientName" class="view_ongoing_treatment_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->PatientName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->PatientName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->PatientID->Visible) { // PatientID ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->PatientID) == "") { ?>
		<th data-name="PatientID" class="<?php echo $view_ongoing_treatment_list->PatientID->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_PatientID" class="view_ongoing_treatment_PatientID"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->PatientID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientID" class="<?php echo $view_ongoing_treatment_list->PatientID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->PatientID) ?>', 1);"><div id="elh_view_ongoing_treatment_PatientID" class="view_ongoing_treatment_PatientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->PatientID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->PatientID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->PatientID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->PartnerName->Visible) { // PartnerName ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->PartnerName) == "") { ?>
		<th data-name="PartnerName" class="<?php echo $view_ongoing_treatment_list->PartnerName->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_PartnerName" class="view_ongoing_treatment_PartnerName"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->PartnerName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerName" class="<?php echo $view_ongoing_treatment_list->PartnerName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->PartnerName) ?>', 1);"><div id="elh_view_ongoing_treatment_PartnerName" class="view_ongoing_treatment_PartnerName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->PartnerName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->PartnerName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->PartnerName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->PartnerID->Visible) { // PartnerID ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->PartnerID) == "") { ?>
		<th data-name="PartnerID" class="<?php echo $view_ongoing_treatment_list->PartnerID->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_PartnerID" class="view_ongoing_treatment_PartnerID"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->PartnerID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerID" class="<?php echo $view_ongoing_treatment_list->PartnerID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->PartnerID) ?>', 1);"><div id="elh_view_ongoing_treatment_PartnerID" class="view_ongoing_treatment_PartnerID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->PartnerID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->PartnerID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->PartnerID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->WifeCell->Visible) { // WifeCell ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->WifeCell) == "") { ?>
		<th data-name="WifeCell" class="<?php echo $view_ongoing_treatment_list->WifeCell->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_WifeCell" class="view_ongoing_treatment_WifeCell"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->WifeCell->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="WifeCell" class="<?php echo $view_ongoing_treatment_list->WifeCell->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->WifeCell) ?>', 1);"><div id="elh_view_ongoing_treatment_WifeCell" class="view_ongoing_treatment_WifeCell">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->WifeCell->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->WifeCell->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->WifeCell->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->HusbandCell->Visible) { // HusbandCell ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->HusbandCell) == "") { ?>
		<th data-name="HusbandCell" class="<?php echo $view_ongoing_treatment_list->HusbandCell->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_HusbandCell" class="view_ongoing_treatment_HusbandCell"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->HusbandCell->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HusbandCell" class="<?php echo $view_ongoing_treatment_list->HusbandCell->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->HusbandCell) ?>', 1);"><div id="elh_view_ongoing_treatment_HusbandCell" class="view_ongoing_treatment_HusbandCell">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->HusbandCell->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->HusbandCell->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->HusbandCell->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_ongoing_treatment_list->CoupleID->Visible) { // CoupleID ?>
	<?php if ($view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->CoupleID) == "") { ?>
		<th data-name="CoupleID" class="<?php echo $view_ongoing_treatment_list->CoupleID->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_CoupleID" class="view_ongoing_treatment_CoupleID"><div class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->CoupleID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CoupleID" class="<?php echo $view_ongoing_treatment_list->CoupleID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_ongoing_treatment_list->SortUrl($view_ongoing_treatment_list->CoupleID) ?>', 1);"><div id="elh_view_ongoing_treatment_CoupleID" class="view_ongoing_treatment_CoupleID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_ongoing_treatment_list->CoupleID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_ongoing_treatment_list->CoupleID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_ongoing_treatment_list->CoupleID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_ongoing_treatment_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_ongoing_treatment_list->ExportAll && $view_ongoing_treatment_list->isExport()) {
	$view_ongoing_treatment_list->StopRecord = $view_ongoing_treatment_list->TotalRecords;
} else {

	// Set the last record to display
	if ($view_ongoing_treatment_list->TotalRecords > $view_ongoing_treatment_list->StartRecord + $view_ongoing_treatment_list->DisplayRecords - 1)
		$view_ongoing_treatment_list->StopRecord = $view_ongoing_treatment_list->StartRecord + $view_ongoing_treatment_list->DisplayRecords - 1;
	else
		$view_ongoing_treatment_list->StopRecord = $view_ongoing_treatment_list->TotalRecords;
}
$view_ongoing_treatment_list->RecordCount = $view_ongoing_treatment_list->StartRecord - 1;
if ($view_ongoing_treatment_list->Recordset && !$view_ongoing_treatment_list->Recordset->EOF) {
	$view_ongoing_treatment_list->Recordset->moveFirst();
	$selectLimit = $view_ongoing_treatment_list->UseSelectLimit;
	if (!$selectLimit && $view_ongoing_treatment_list->StartRecord > 1)
		$view_ongoing_treatment_list->Recordset->move($view_ongoing_treatment_list->StartRecord - 1);
} elseif (!$view_ongoing_treatment->AllowAddDeleteRow && $view_ongoing_treatment_list->StopRecord == 0) {
	$view_ongoing_treatment_list->StopRecord = $view_ongoing_treatment->GridAddRowCount;
}

// Initialize aggregate
$view_ongoing_treatment->RowType = ROWTYPE_AGGREGATEINIT;
$view_ongoing_treatment->resetAttributes();
$view_ongoing_treatment_list->renderRow();
while ($view_ongoing_treatment_list->RecordCount < $view_ongoing_treatment_list->StopRecord) {
	$view_ongoing_treatment_list->RecordCount++;
	if ($view_ongoing_treatment_list->RecordCount >= $view_ongoing_treatment_list->StartRecord) {
		$view_ongoing_treatment_list->RowCount++;

		// Set up key count
		$view_ongoing_treatment_list->KeyCount = $view_ongoing_treatment_list->RowIndex;

		// Init row class and style
		$view_ongoing_treatment->resetAttributes();
		$view_ongoing_treatment->CssClass = "";
		if ($view_ongoing_treatment_list->isGridAdd()) {
		} else {
			$view_ongoing_treatment_list->loadRowValues($view_ongoing_treatment_list->Recordset); // Load row values
		}
		$view_ongoing_treatment->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_ongoing_treatment->RowAttrs->merge(["data-rowindex" => $view_ongoing_treatment_list->RowCount, "id" => "r" . $view_ongoing_treatment_list->RowCount . "_view_ongoing_treatment", "data-rowtype" => $view_ongoing_treatment->RowType]);

		// Render row
		$view_ongoing_treatment_list->renderRow();

		// Render list options
		$view_ongoing_treatment_list->renderListOptions();
?>
	<tr <?php echo $view_ongoing_treatment->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_ongoing_treatment_list->ListOptions->render("body", "left", $view_ongoing_treatment_list->RowCount);
?>
	<?php if ($view_ongoing_treatment_list->bid->Visible) { // bid ?>
		<td data-name="bid" <?php echo $view_ongoing_treatment_list->bid->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_bid">
<span<?php echo $view_ongoing_treatment_list->bid->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->bid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->bPatientID->Visible) { // bPatientID ?>
		<td data-name="bPatientID" <?php echo $view_ongoing_treatment_list->bPatientID->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_bPatientID">
<span<?php echo $view_ongoing_treatment_list->bPatientID->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->bPatientID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->title->Visible) { // title ?>
		<td data-name="title" <?php echo $view_ongoing_treatment_list->title->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_title">
<span<?php echo $view_ongoing_treatment_list->title->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->title->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->first_name->Visible) { // first_name ?>
		<td data-name="first_name" <?php echo $view_ongoing_treatment_list->first_name->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_first_name">
<span<?php echo $view_ongoing_treatment_list->first_name->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->first_name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->middle_name->Visible) { // middle_name ?>
		<td data-name="middle_name" <?php echo $view_ongoing_treatment_list->middle_name->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_middle_name">
<span<?php echo $view_ongoing_treatment_list->middle_name->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->middle_name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->last_name->Visible) { // last_name ?>
		<td data-name="last_name" <?php echo $view_ongoing_treatment_list->last_name->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_last_name">
<span<?php echo $view_ongoing_treatment_list->last_name->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->last_name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->gender->Visible) { // gender ?>
		<td data-name="gender" <?php echo $view_ongoing_treatment_list->gender->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_gender">
<span<?php echo $view_ongoing_treatment_list->gender->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->gender->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->dob->Visible) { // dob ?>
		<td data-name="dob" <?php echo $view_ongoing_treatment_list->dob->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_dob">
<span<?php echo $view_ongoing_treatment_list->dob->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->dob->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->bAge->Visible) { // bAge ?>
		<td data-name="bAge" <?php echo $view_ongoing_treatment_list->bAge->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_bAge">
<span<?php echo $view_ongoing_treatment_list->bAge->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->bAge->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->blood_group->Visible) { // blood_group ?>
		<td data-name="blood_group" <?php echo $view_ongoing_treatment_list->blood_group->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_blood_group">
<span<?php echo $view_ongoing_treatment_list->blood_group->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->blood_group->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->mobile_no->Visible) { // mobile_no ?>
		<td data-name="mobile_no" <?php echo $view_ongoing_treatment_list->mobile_no->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_mobile_no">
<span<?php echo $view_ongoing_treatment_list->mobile_no->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->mobile_no->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->IdentificationMark->Visible) { // IdentificationMark ?>
		<td data-name="IdentificationMark" <?php echo $view_ongoing_treatment_list->IdentificationMark->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_IdentificationMark">
<span<?php echo $view_ongoing_treatment_list->IdentificationMark->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->IdentificationMark->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->Religion->Visible) { // Religion ?>
		<td data-name="Religion" <?php echo $view_ongoing_treatment_list->Religion->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_Religion">
<span<?php echo $view_ongoing_treatment_list->Religion->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->Religion->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->Nationality->Visible) { // Nationality ?>
		<td data-name="Nationality" <?php echo $view_ongoing_treatment_list->Nationality->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_Nationality">
<span<?php echo $view_ongoing_treatment_list->Nationality->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->Nationality->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->profilePic->Visible) { // profilePic ?>
		<td data-name="profilePic" <?php echo $view_ongoing_treatment_list->profilePic->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_profilePic">
<span<?php echo $view_ongoing_treatment_list->profilePic->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->profilePic->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->ReferedByDr->Visible) { // ReferedByDr ?>
		<td data-name="ReferedByDr" <?php echo $view_ongoing_treatment_list->ReferedByDr->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_ReferedByDr">
<span<?php echo $view_ongoing_treatment_list->ReferedByDr->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->ReferedByDr->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->ReferClinicname->Visible) { // ReferClinicname ?>
		<td data-name="ReferClinicname" <?php echo $view_ongoing_treatment_list->ReferClinicname->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_ReferClinicname">
<span<?php echo $view_ongoing_treatment_list->ReferClinicname->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->ReferClinicname->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->ReferCity->Visible) { // ReferCity ?>
		<td data-name="ReferCity" <?php echo $view_ongoing_treatment_list->ReferCity->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_ReferCity">
<span<?php echo $view_ongoing_treatment_list->ReferCity->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->ReferCity->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->ReferMobileNo->Visible) { // ReferMobileNo ?>
		<td data-name="ReferMobileNo" <?php echo $view_ongoing_treatment_list->ReferMobileNo->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_ReferMobileNo">
<span<?php echo $view_ongoing_treatment_list->ReferMobileNo->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->ReferMobileNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
		<td data-name="ReferA4TreatingConsultant" <?php echo $view_ongoing_treatment_list->ReferA4TreatingConsultant->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_ReferA4TreatingConsultant">
<span<?php echo $view_ongoing_treatment_list->ReferA4TreatingConsultant->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->ReferA4TreatingConsultant->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
		<td data-name="PurposreReferredfor" <?php echo $view_ongoing_treatment_list->PurposreReferredfor->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_PurposreReferredfor">
<span<?php echo $view_ongoing_treatment_list->PurposreReferredfor->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->PurposreReferredfor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->spouse_title->Visible) { // spouse_title ?>
		<td data-name="spouse_title" <?php echo $view_ongoing_treatment_list->spouse_title->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_spouse_title">
<span<?php echo $view_ongoing_treatment_list->spouse_title->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->spouse_title->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->spouse_first_name->Visible) { // spouse_first_name ?>
		<td data-name="spouse_first_name" <?php echo $view_ongoing_treatment_list->spouse_first_name->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_spouse_first_name">
<span<?php echo $view_ongoing_treatment_list->spouse_first_name->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->spouse_first_name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->spouse_middle_name->Visible) { // spouse_middle_name ?>
		<td data-name="spouse_middle_name" <?php echo $view_ongoing_treatment_list->spouse_middle_name->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_spouse_middle_name">
<span<?php echo $view_ongoing_treatment_list->spouse_middle_name->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->spouse_middle_name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->spouse_last_name->Visible) { // spouse_last_name ?>
		<td data-name="spouse_last_name" <?php echo $view_ongoing_treatment_list->spouse_last_name->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_spouse_last_name">
<span<?php echo $view_ongoing_treatment_list->spouse_last_name->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->spouse_last_name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->spouse_gender->Visible) { // spouse_gender ?>
		<td data-name="spouse_gender" <?php echo $view_ongoing_treatment_list->spouse_gender->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_spouse_gender">
<span<?php echo $view_ongoing_treatment_list->spouse_gender->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->spouse_gender->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->spouse_dob->Visible) { // spouse_dob ?>
		<td data-name="spouse_dob" <?php echo $view_ongoing_treatment_list->spouse_dob->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_spouse_dob">
<span<?php echo $view_ongoing_treatment_list->spouse_dob->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->spouse_dob->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->spouse_Age->Visible) { // spouse_Age ?>
		<td data-name="spouse_Age" <?php echo $view_ongoing_treatment_list->spouse_Age->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_spouse_Age">
<span<?php echo $view_ongoing_treatment_list->spouse_Age->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->spouse_Age->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->spouse_blood_group->Visible) { // spouse_blood_group ?>
		<td data-name="spouse_blood_group" <?php echo $view_ongoing_treatment_list->spouse_blood_group->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_spouse_blood_group">
<span<?php echo $view_ongoing_treatment_list->spouse_blood_group->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->spouse_blood_group->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->spouse_mobile_no->Visible) { // spouse_mobile_no ?>
		<td data-name="spouse_mobile_no" <?php echo $view_ongoing_treatment_list->spouse_mobile_no->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_spouse_mobile_no">
<span<?php echo $view_ongoing_treatment_list->spouse_mobile_no->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->spouse_mobile_no->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->Maritalstatus->Visible) { // Maritalstatus ?>
		<td data-name="Maritalstatus" <?php echo $view_ongoing_treatment_list->Maritalstatus->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_Maritalstatus">
<span<?php echo $view_ongoing_treatment_list->Maritalstatus->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->Maritalstatus->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->Business->Visible) { // Business ?>
		<td data-name="Business" <?php echo $view_ongoing_treatment_list->Business->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_Business">
<span<?php echo $view_ongoing_treatment_list->Business->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->Business->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->Patient_Language->Visible) { // Patient_Language ?>
		<td data-name="Patient_Language" <?php echo $view_ongoing_treatment_list->Patient_Language->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_Patient_Language">
<span<?php echo $view_ongoing_treatment_list->Patient_Language->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->Patient_Language->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->Passport->Visible) { // Passport ?>
		<td data-name="Passport" <?php echo $view_ongoing_treatment_list->Passport->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_Passport">
<span<?php echo $view_ongoing_treatment_list->Passport->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->Passport->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->VisaNo->Visible) { // VisaNo ?>
		<td data-name="VisaNo" <?php echo $view_ongoing_treatment_list->VisaNo->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_VisaNo">
<span<?php echo $view_ongoing_treatment_list->VisaNo->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->VisaNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->ValidityOfVisa->Visible) { // ValidityOfVisa ?>
		<td data-name="ValidityOfVisa" <?php echo $view_ongoing_treatment_list->ValidityOfVisa->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_ValidityOfVisa">
<span<?php echo $view_ongoing_treatment_list->ValidityOfVisa->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->ValidityOfVisa->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
		<td data-name="WhereDidYouHear" <?php echo $view_ongoing_treatment_list->WhereDidYouHear->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_WhereDidYouHear">
<span<?php echo $view_ongoing_treatment_list->WhereDidYouHear->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->WhereDidYouHear->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $view_ongoing_treatment_list->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_HospID">
<span<?php echo $view_ongoing_treatment_list->HospID->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->street->Visible) { // street ?>
		<td data-name="street" <?php echo $view_ongoing_treatment_list->street->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_street">
<span<?php echo $view_ongoing_treatment_list->street->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->street->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->town->Visible) { // town ?>
		<td data-name="town" <?php echo $view_ongoing_treatment_list->town->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_town">
<span<?php echo $view_ongoing_treatment_list->town->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->town->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->province->Visible) { // province ?>
		<td data-name="province" <?php echo $view_ongoing_treatment_list->province->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_province">
<span<?php echo $view_ongoing_treatment_list->province->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->province->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->country->Visible) { // country ?>
		<td data-name="country" <?php echo $view_ongoing_treatment_list->country->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_country">
<span<?php echo $view_ongoing_treatment_list->country->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->country->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->postal_code->Visible) { // postal_code ?>
		<td data-name="postal_code" <?php echo $view_ongoing_treatment_list->postal_code->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_postal_code">
<span<?php echo $view_ongoing_treatment_list->postal_code->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->postal_code->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->PEmail->Visible) { // PEmail ?>
		<td data-name="PEmail" <?php echo $view_ongoing_treatment_list->PEmail->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_PEmail">
<span<?php echo $view_ongoing_treatment_list->PEmail->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->PEmail->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->PEmergencyContact->Visible) { // PEmergencyContact ?>
		<td data-name="PEmergencyContact" <?php echo $view_ongoing_treatment_list->PEmergencyContact->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_PEmergencyContact">
<span<?php echo $view_ongoing_treatment_list->PEmergencyContact->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->PEmergencyContact->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->occupation->Visible) { // occupation ?>
		<td data-name="occupation" <?php echo $view_ongoing_treatment_list->occupation->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_occupation">
<span<?php echo $view_ongoing_treatment_list->occupation->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->occupation->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->spouse_occupation->Visible) { // spouse_occupation ?>
		<td data-name="spouse_occupation" <?php echo $view_ongoing_treatment_list->spouse_occupation->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_spouse_occupation">
<span<?php echo $view_ongoing_treatment_list->spouse_occupation->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->spouse_occupation->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->WhatsApp->Visible) { // WhatsApp ?>
		<td data-name="WhatsApp" <?php echo $view_ongoing_treatment_list->WhatsApp->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_WhatsApp">
<span<?php echo $view_ongoing_treatment_list->WhatsApp->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->WhatsApp->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->CouppleID->Visible) { // CouppleID ?>
		<td data-name="CouppleID" <?php echo $view_ongoing_treatment_list->CouppleID->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_CouppleID">
<span<?php echo $view_ongoing_treatment_list->CouppleID->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->CouppleID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->MaleID->Visible) { // MaleID ?>
		<td data-name="MaleID" <?php echo $view_ongoing_treatment_list->MaleID->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_MaleID">
<span<?php echo $view_ongoing_treatment_list->MaleID->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->MaleID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->FemaleID->Visible) { // FemaleID ?>
		<td data-name="FemaleID" <?php echo $view_ongoing_treatment_list->FemaleID->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_FemaleID">
<span<?php echo $view_ongoing_treatment_list->FemaleID->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->FemaleID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->GroupID->Visible) { // GroupID ?>
		<td data-name="GroupID" <?php echo $view_ongoing_treatment_list->GroupID->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_GroupID">
<span<?php echo $view_ongoing_treatment_list->GroupID->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->GroupID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->Relationship->Visible) { // Relationship ?>
		<td data-name="Relationship" <?php echo $view_ongoing_treatment_list->Relationship->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_Relationship">
<span<?php echo $view_ongoing_treatment_list->Relationship->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->Relationship->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->FacebookID->Visible) { // FacebookID ?>
		<td data-name="FacebookID" <?php echo $view_ongoing_treatment_list->FacebookID->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_FacebookID">
<span<?php echo $view_ongoing_treatment_list->FacebookID->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->FacebookID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $view_ongoing_treatment_list->id->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_id">
<span<?php echo $view_ongoing_treatment_list->id->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->RIDNO->Visible) { // RIDNO ?>
		<td data-name="RIDNO" <?php echo $view_ongoing_treatment_list->RIDNO->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_RIDNO">
<span<?php echo $view_ongoing_treatment_list->RIDNO->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->RIDNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->Name->Visible) { // Name ?>
		<td data-name="Name" <?php echo $view_ongoing_treatment_list->Name->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_Name">
<span<?php echo $view_ongoing_treatment_list->Name->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->Name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->treatment_status->Visible) { // treatment_status ?>
		<td data-name="treatment_status" <?php echo $view_ongoing_treatment_list->treatment_status->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_treatment_status">
<span<?php echo $view_ongoing_treatment_list->treatment_status->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->treatment_status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->ARTCYCLE->Visible) { // ARTCYCLE ?>
		<td data-name="ARTCYCLE" <?php echo $view_ongoing_treatment_list->ARTCYCLE->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_ARTCYCLE">
<span<?php echo $view_ongoing_treatment_list->ARTCYCLE->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->ARTCYCLE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->RESULT->Visible) { // RESULT ?>
		<td data-name="RESULT" <?php echo $view_ongoing_treatment_list->RESULT->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_RESULT">
<span<?php echo $view_ongoing_treatment_list->RESULT->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->RESULT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->status->Visible) { // status ?>
		<td data-name="status" <?php echo $view_ongoing_treatment_list->status->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_status">
<span<?php echo $view_ongoing_treatment_list->status->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->createdby->Visible) { // createdby ?>
		<td data-name="createdby" <?php echo $view_ongoing_treatment_list->createdby->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_createdby">
<span<?php echo $view_ongoing_treatment_list->createdby->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" <?php echo $view_ongoing_treatment_list->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_createddatetime">
<span<?php echo $view_ongoing_treatment_list->createddatetime->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby" <?php echo $view_ongoing_treatment_list->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_modifiedby">
<span<?php echo $view_ongoing_treatment_list->modifiedby->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime" <?php echo $view_ongoing_treatment_list->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_modifieddatetime">
<span<?php echo $view_ongoing_treatment_list->modifieddatetime->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->TreatmentStartDate->Visible) { // TreatmentStartDate ?>
		<td data-name="TreatmentStartDate" <?php echo $view_ongoing_treatment_list->TreatmentStartDate->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_TreatmentStartDate">
<span<?php echo $view_ongoing_treatment_list->TreatmentStartDate->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->TreatmentStartDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->TreatementStopDate->Visible) { // TreatementStopDate ?>
		<td data-name="TreatementStopDate" <?php echo $view_ongoing_treatment_list->TreatementStopDate->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_TreatementStopDate">
<span<?php echo $view_ongoing_treatment_list->TreatementStopDate->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->TreatementStopDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->TypePatient->Visible) { // TypePatient ?>
		<td data-name="TypePatient" <?php echo $view_ongoing_treatment_list->TypePatient->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_TypePatient">
<span<?php echo $view_ongoing_treatment_list->TypePatient->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->TypePatient->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->Treatment->Visible) { // Treatment ?>
		<td data-name="Treatment" <?php echo $view_ongoing_treatment_list->Treatment->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_Treatment">
<span<?php echo $view_ongoing_treatment_list->Treatment->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->Treatment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->TreatmentTec->Visible) { // TreatmentTec ?>
		<td data-name="TreatmentTec" <?php echo $view_ongoing_treatment_list->TreatmentTec->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_TreatmentTec">
<span<?php echo $view_ongoing_treatment_list->TreatmentTec->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->TreatmentTec->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->TypeOfCycle->Visible) { // TypeOfCycle ?>
		<td data-name="TypeOfCycle" <?php echo $view_ongoing_treatment_list->TypeOfCycle->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_TypeOfCycle">
<span<?php echo $view_ongoing_treatment_list->TypeOfCycle->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->TypeOfCycle->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->SpermOrgin->Visible) { // SpermOrgin ?>
		<td data-name="SpermOrgin" <?php echo $view_ongoing_treatment_list->SpermOrgin->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_SpermOrgin">
<span<?php echo $view_ongoing_treatment_list->SpermOrgin->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->SpermOrgin->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->State->Visible) { // State ?>
		<td data-name="State" <?php echo $view_ongoing_treatment_list->State->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_State">
<span<?php echo $view_ongoing_treatment_list->State->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->State->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->Origin->Visible) { // Origin ?>
		<td data-name="Origin" <?php echo $view_ongoing_treatment_list->Origin->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_Origin">
<span<?php echo $view_ongoing_treatment_list->Origin->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->Origin->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->MACS->Visible) { // MACS ?>
		<td data-name="MACS" <?php echo $view_ongoing_treatment_list->MACS->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_MACS">
<span<?php echo $view_ongoing_treatment_list->MACS->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->MACS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->Technique->Visible) { // Technique ?>
		<td data-name="Technique" <?php echo $view_ongoing_treatment_list->Technique->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_Technique">
<span<?php echo $view_ongoing_treatment_list->Technique->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->Technique->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->PgdPlanning->Visible) { // PgdPlanning ?>
		<td data-name="PgdPlanning" <?php echo $view_ongoing_treatment_list->PgdPlanning->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_PgdPlanning">
<span<?php echo $view_ongoing_treatment_list->PgdPlanning->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->PgdPlanning->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->IMSI->Visible) { // IMSI ?>
		<td data-name="IMSI" <?php echo $view_ongoing_treatment_list->IMSI->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_IMSI">
<span<?php echo $view_ongoing_treatment_list->IMSI->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->IMSI->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->SequentialCulture->Visible) { // SequentialCulture ?>
		<td data-name="SequentialCulture" <?php echo $view_ongoing_treatment_list->SequentialCulture->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_SequentialCulture">
<span<?php echo $view_ongoing_treatment_list->SequentialCulture->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->SequentialCulture->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->TimeLapse->Visible) { // TimeLapse ?>
		<td data-name="TimeLapse" <?php echo $view_ongoing_treatment_list->TimeLapse->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_TimeLapse">
<span<?php echo $view_ongoing_treatment_list->TimeLapse->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->TimeLapse->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->AH->Visible) { // AH ?>
		<td data-name="AH" <?php echo $view_ongoing_treatment_list->AH->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_AH">
<span<?php echo $view_ongoing_treatment_list->AH->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->AH->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->Weight->Visible) { // Weight ?>
		<td data-name="Weight" <?php echo $view_ongoing_treatment_list->Weight->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_Weight">
<span<?php echo $view_ongoing_treatment_list->Weight->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->Weight->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->BMI->Visible) { // BMI ?>
		<td data-name="BMI" <?php echo $view_ongoing_treatment_list->BMI->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_BMI">
<span<?php echo $view_ongoing_treatment_list->BMI->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->BMI->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->MaleIndications->Visible) { // MaleIndications ?>
		<td data-name="MaleIndications" <?php echo $view_ongoing_treatment_list->MaleIndications->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_MaleIndications">
<span<?php echo $view_ongoing_treatment_list->MaleIndications->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->MaleIndications->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->FemaleIndications->Visible) { // FemaleIndications ?>
		<td data-name="FemaleIndications" <?php echo $view_ongoing_treatment_list->FemaleIndications->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_FemaleIndications">
<span<?php echo $view_ongoing_treatment_list->FemaleIndications->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->FemaleIndications->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->UseOfThe->Visible) { // UseOfThe ?>
		<td data-name="UseOfThe" <?php echo $view_ongoing_treatment_list->UseOfThe->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_UseOfThe">
<span<?php echo $view_ongoing_treatment_list->UseOfThe->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->UseOfThe->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->Ectopic->Visible) { // Ectopic ?>
		<td data-name="Ectopic" <?php echo $view_ongoing_treatment_list->Ectopic->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_Ectopic">
<span<?php echo $view_ongoing_treatment_list->Ectopic->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->Ectopic->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->Heterotopic->Visible) { // Heterotopic ?>
		<td data-name="Heterotopic" <?php echo $view_ongoing_treatment_list->Heterotopic->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_Heterotopic">
<span<?php echo $view_ongoing_treatment_list->Heterotopic->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->Heterotopic->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->TransferDFE->Visible) { // TransferDFE ?>
		<td data-name="TransferDFE" <?php echo $view_ongoing_treatment_list->TransferDFE->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_TransferDFE">
<span<?php echo $view_ongoing_treatment_list->TransferDFE->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->TransferDFE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->Evolutive->Visible) { // Evolutive ?>
		<td data-name="Evolutive" <?php echo $view_ongoing_treatment_list->Evolutive->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_Evolutive">
<span<?php echo $view_ongoing_treatment_list->Evolutive->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->Evolutive->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->Number->Visible) { // Number ?>
		<td data-name="Number" <?php echo $view_ongoing_treatment_list->Number->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_Number">
<span<?php echo $view_ongoing_treatment_list->Number->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->Number->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->SequentialCult->Visible) { // SequentialCult ?>
		<td data-name="SequentialCult" <?php echo $view_ongoing_treatment_list->SequentialCult->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_SequentialCult">
<span<?php echo $view_ongoing_treatment_list->SequentialCult->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->SequentialCult->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->TineLapse->Visible) { // TineLapse ?>
		<td data-name="TineLapse" <?php echo $view_ongoing_treatment_list->TineLapse->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_TineLapse">
<span<?php echo $view_ongoing_treatment_list->TineLapse->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->TineLapse->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName" <?php echo $view_ongoing_treatment_list->PatientName->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_PatientName">
<span<?php echo $view_ongoing_treatment_list->PatientName->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID" <?php echo $view_ongoing_treatment_list->PatientID->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_PatientID">
<span<?php echo $view_ongoing_treatment_list->PatientID->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->PatientID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->PartnerName->Visible) { // PartnerName ?>
		<td data-name="PartnerName" <?php echo $view_ongoing_treatment_list->PartnerName->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_PartnerName">
<span<?php echo $view_ongoing_treatment_list->PartnerName->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->PartnerName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->PartnerID->Visible) { // PartnerID ?>
		<td data-name="PartnerID" <?php echo $view_ongoing_treatment_list->PartnerID->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_PartnerID">
<span<?php echo $view_ongoing_treatment_list->PartnerID->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->PartnerID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->WifeCell->Visible) { // WifeCell ?>
		<td data-name="WifeCell" <?php echo $view_ongoing_treatment_list->WifeCell->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_WifeCell">
<span<?php echo $view_ongoing_treatment_list->WifeCell->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->WifeCell->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->HusbandCell->Visible) { // HusbandCell ?>
		<td data-name="HusbandCell" <?php echo $view_ongoing_treatment_list->HusbandCell->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_HusbandCell">
<span<?php echo $view_ongoing_treatment_list->HusbandCell->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->HusbandCell->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_ongoing_treatment_list->CoupleID->Visible) { // CoupleID ?>
		<td data-name="CoupleID" <?php echo $view_ongoing_treatment_list->CoupleID->cellAttributes() ?>>
<span id="el<?php echo $view_ongoing_treatment_list->RowCount ?>_view_ongoing_treatment_CoupleID">
<span<?php echo $view_ongoing_treatment_list->CoupleID->viewAttributes() ?>><?php echo $view_ongoing_treatment_list->CoupleID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_ongoing_treatment_list->ListOptions->render("body", "right", $view_ongoing_treatment_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$view_ongoing_treatment_list->isGridAdd())
		$view_ongoing_treatment_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$view_ongoing_treatment->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_ongoing_treatment_list->Recordset)
	$view_ongoing_treatment_list->Recordset->Close();
?>
<?php if (!$view_ongoing_treatment_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_ongoing_treatment_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_ongoing_treatment_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_ongoing_treatment_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_ongoing_treatment_list->TotalRecords == 0 && !$view_ongoing_treatment->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_ongoing_treatment_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_ongoing_treatment_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_ongoing_treatment_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$view_ongoing_treatment_list->terminate();
?>