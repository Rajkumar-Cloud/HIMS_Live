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
$view_opd_follow_up_list = new view_opd_follow_up_list();

// Run the page
$view_opd_follow_up_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_opd_follow_up_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$view_opd_follow_up_list->isExport()) { ?>
<script>
var fview_opd_follow_uplist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fview_opd_follow_uplist = currentForm = new ew.Form("fview_opd_follow_uplist", "list");
	fview_opd_follow_uplist.formKeyCountName = '<?php echo $view_opd_follow_up_list->FormKeyCountName ?>';
	loadjs.done("fview_opd_follow_uplist");
});
var fview_opd_follow_uplistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fview_opd_follow_uplistsrch = currentSearchForm = new ew.Form("fview_opd_follow_uplistsrch");

	// Dynamic selection lists
	// Filters

	fview_opd_follow_uplistsrch.filterList = <?php echo $view_opd_follow_up_list->getFilterList() ?>;
	loadjs.done("fview_opd_follow_uplistsrch");
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
<?php if (!$view_opd_follow_up_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_opd_follow_up_list->TotalRecords > 0 && $view_opd_follow_up_list->ExportOptions->visible()) { ?>
<?php $view_opd_follow_up_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_opd_follow_up_list->ImportOptions->visible()) { ?>
<?php $view_opd_follow_up_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_opd_follow_up_list->SearchOptions->visible()) { ?>
<?php $view_opd_follow_up_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_opd_follow_up_list->FilterOptions->visible()) { ?>
<?php $view_opd_follow_up_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_opd_follow_up_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_opd_follow_up_list->isExport() && !$view_opd_follow_up->CurrentAction) { ?>
<form name="fview_opd_follow_uplistsrch" id="fview_opd_follow_uplistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fview_opd_follow_uplistsrch-search-panel" class="<?php echo $view_opd_follow_up_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_opd_follow_up">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $view_opd_follow_up_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($view_opd_follow_up_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($view_opd_follow_up_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_opd_follow_up_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_opd_follow_up_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_opd_follow_up_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_opd_follow_up_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_opd_follow_up_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $view_opd_follow_up_list->showPageHeader(); ?>
<?php
$view_opd_follow_up_list->showMessage();
?>
<?php if ($view_opd_follow_up_list->TotalRecords > 0 || $view_opd_follow_up->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_opd_follow_up_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_opd_follow_up">
<?php if (!$view_opd_follow_up_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_opd_follow_up_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_opd_follow_up_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_opd_follow_up_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_opd_follow_uplist" id="fview_opd_follow_uplist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_opd_follow_up">
<div id="gmp_view_opd_follow_up" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($view_opd_follow_up_list->TotalRecords > 0 || $view_opd_follow_up_list->isGridEdit()) { ?>
<table id="tbl_view_opd_follow_uplist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_opd_follow_up->RowType = ROWTYPE_HEADER;

// Render list options
$view_opd_follow_up_list->renderListOptions();

// Render list options (header, left)
$view_opd_follow_up_list->ListOptions->render("header", "left");
?>
<?php if ($view_opd_follow_up_list->id->Visible) { // id ?>
	<?php if ($view_opd_follow_up_list->SortUrl($view_opd_follow_up_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_opd_follow_up_list->id->headerCellClass() ?>"><div id="elh_view_opd_follow_up_id" class="view_opd_follow_up_id"><div class="ew-table-header-caption"><?php echo $view_opd_follow_up_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_opd_follow_up_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_opd_follow_up_list->SortUrl($view_opd_follow_up_list->id) ?>', 1);"><div id="elh_view_opd_follow_up_id" class="view_opd_follow_up_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_opd_follow_up_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_opd_follow_up_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_opd_follow_up_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_opd_follow_up_list->Reception->Visible) { // Reception ?>
	<?php if ($view_opd_follow_up_list->SortUrl($view_opd_follow_up_list->Reception) == "") { ?>
		<th data-name="Reception" class="<?php echo $view_opd_follow_up_list->Reception->headerCellClass() ?>"><div id="elh_view_opd_follow_up_Reception" class="view_opd_follow_up_Reception"><div class="ew-table-header-caption"><?php echo $view_opd_follow_up_list->Reception->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Reception" class="<?php echo $view_opd_follow_up_list->Reception->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_opd_follow_up_list->SortUrl($view_opd_follow_up_list->Reception) ?>', 1);"><div id="elh_view_opd_follow_up_Reception" class="view_opd_follow_up_Reception">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_opd_follow_up_list->Reception->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_opd_follow_up_list->Reception->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_opd_follow_up_list->Reception->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_opd_follow_up_list->PatientId->Visible) { // PatientId ?>
	<?php if ($view_opd_follow_up_list->SortUrl($view_opd_follow_up_list->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $view_opd_follow_up_list->PatientId->headerCellClass() ?>"><div id="elh_view_opd_follow_up_PatientId" class="view_opd_follow_up_PatientId"><div class="ew-table-header-caption"><?php echo $view_opd_follow_up_list->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $view_opd_follow_up_list->PatientId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_opd_follow_up_list->SortUrl($view_opd_follow_up_list->PatientId) ?>', 1);"><div id="elh_view_opd_follow_up_PatientId" class="view_opd_follow_up_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_opd_follow_up_list->PatientId->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_opd_follow_up_list->PatientId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_opd_follow_up_list->PatientId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_opd_follow_up_list->mrnno->Visible) { // mrnno ?>
	<?php if ($view_opd_follow_up_list->SortUrl($view_opd_follow_up_list->mrnno) == "") { ?>
		<th data-name="mrnno" class="<?php echo $view_opd_follow_up_list->mrnno->headerCellClass() ?>"><div id="elh_view_opd_follow_up_mrnno" class="view_opd_follow_up_mrnno"><div class="ew-table-header-caption"><?php echo $view_opd_follow_up_list->mrnno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnno" class="<?php echo $view_opd_follow_up_list->mrnno->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_opd_follow_up_list->SortUrl($view_opd_follow_up_list->mrnno) ?>', 1);"><div id="elh_view_opd_follow_up_mrnno" class="view_opd_follow_up_mrnno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_opd_follow_up_list->mrnno->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_opd_follow_up_list->mrnno->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_opd_follow_up_list->mrnno->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_opd_follow_up_list->PatientName->Visible) { // PatientName ?>
	<?php if ($view_opd_follow_up_list->SortUrl($view_opd_follow_up_list->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $view_opd_follow_up_list->PatientName->headerCellClass() ?>"><div id="elh_view_opd_follow_up_PatientName" class="view_opd_follow_up_PatientName"><div class="ew-table-header-caption"><?php echo $view_opd_follow_up_list->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $view_opd_follow_up_list->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_opd_follow_up_list->SortUrl($view_opd_follow_up_list->PatientName) ?>', 1);"><div id="elh_view_opd_follow_up_PatientName" class="view_opd_follow_up_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_opd_follow_up_list->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_opd_follow_up_list->PatientName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_opd_follow_up_list->PatientName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_opd_follow_up_list->Telephone->Visible) { // Telephone ?>
	<?php if ($view_opd_follow_up_list->SortUrl($view_opd_follow_up_list->Telephone) == "") { ?>
		<th data-name="Telephone" class="<?php echo $view_opd_follow_up_list->Telephone->headerCellClass() ?>"><div id="elh_view_opd_follow_up_Telephone" class="view_opd_follow_up_Telephone"><div class="ew-table-header-caption"><?php echo $view_opd_follow_up_list->Telephone->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Telephone" class="<?php echo $view_opd_follow_up_list->Telephone->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_opd_follow_up_list->SortUrl($view_opd_follow_up_list->Telephone) ?>', 1);"><div id="elh_view_opd_follow_up_Telephone" class="view_opd_follow_up_Telephone">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_opd_follow_up_list->Telephone->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_opd_follow_up_list->Telephone->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_opd_follow_up_list->Telephone->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_opd_follow_up_list->Age->Visible) { // Age ?>
	<?php if ($view_opd_follow_up_list->SortUrl($view_opd_follow_up_list->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $view_opd_follow_up_list->Age->headerCellClass() ?>"><div id="elh_view_opd_follow_up_Age" class="view_opd_follow_up_Age"><div class="ew-table-header-caption"><?php echo $view_opd_follow_up_list->Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $view_opd_follow_up_list->Age->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_opd_follow_up_list->SortUrl($view_opd_follow_up_list->Age) ?>', 1);"><div id="elh_view_opd_follow_up_Age" class="view_opd_follow_up_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_opd_follow_up_list->Age->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_opd_follow_up_list->Age->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_opd_follow_up_list->Age->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_opd_follow_up_list->Gender->Visible) { // Gender ?>
	<?php if ($view_opd_follow_up_list->SortUrl($view_opd_follow_up_list->Gender) == "") { ?>
		<th data-name="Gender" class="<?php echo $view_opd_follow_up_list->Gender->headerCellClass() ?>"><div id="elh_view_opd_follow_up_Gender" class="view_opd_follow_up_Gender"><div class="ew-table-header-caption"><?php echo $view_opd_follow_up_list->Gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gender" class="<?php echo $view_opd_follow_up_list->Gender->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_opd_follow_up_list->SortUrl($view_opd_follow_up_list->Gender) ?>', 1);"><div id="elh_view_opd_follow_up_Gender" class="view_opd_follow_up_Gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_opd_follow_up_list->Gender->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_opd_follow_up_list->Gender->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_opd_follow_up_list->Gender->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_opd_follow_up_list->NextReviewDate->Visible) { // NextReviewDate ?>
	<?php if ($view_opd_follow_up_list->SortUrl($view_opd_follow_up_list->NextReviewDate) == "") { ?>
		<th data-name="NextReviewDate" class="<?php echo $view_opd_follow_up_list->NextReviewDate->headerCellClass() ?>"><div id="elh_view_opd_follow_up_NextReviewDate" class="view_opd_follow_up_NextReviewDate"><div class="ew-table-header-caption"><?php echo $view_opd_follow_up_list->NextReviewDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NextReviewDate" class="<?php echo $view_opd_follow_up_list->NextReviewDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_opd_follow_up_list->SortUrl($view_opd_follow_up_list->NextReviewDate) ?>', 1);"><div id="elh_view_opd_follow_up_NextReviewDate" class="view_opd_follow_up_NextReviewDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_opd_follow_up_list->NextReviewDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_opd_follow_up_list->NextReviewDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_opd_follow_up_list->NextReviewDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_opd_follow_up_list->ICSIAdvised->Visible) { // ICSIAdvised ?>
	<?php if ($view_opd_follow_up_list->SortUrl($view_opd_follow_up_list->ICSIAdvised) == "") { ?>
		<th data-name="ICSIAdvised" class="<?php echo $view_opd_follow_up_list->ICSIAdvised->headerCellClass() ?>"><div id="elh_view_opd_follow_up_ICSIAdvised" class="view_opd_follow_up_ICSIAdvised"><div class="ew-table-header-caption"><?php echo $view_opd_follow_up_list->ICSIAdvised->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ICSIAdvised" class="<?php echo $view_opd_follow_up_list->ICSIAdvised->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_opd_follow_up_list->SortUrl($view_opd_follow_up_list->ICSIAdvised) ?>', 1);"><div id="elh_view_opd_follow_up_ICSIAdvised" class="view_opd_follow_up_ICSIAdvised">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_opd_follow_up_list->ICSIAdvised->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_opd_follow_up_list->ICSIAdvised->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_opd_follow_up_list->ICSIAdvised->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_opd_follow_up_list->DeliveryRegistered->Visible) { // DeliveryRegistered ?>
	<?php if ($view_opd_follow_up_list->SortUrl($view_opd_follow_up_list->DeliveryRegistered) == "") { ?>
		<th data-name="DeliveryRegistered" class="<?php echo $view_opd_follow_up_list->DeliveryRegistered->headerCellClass() ?>"><div id="elh_view_opd_follow_up_DeliveryRegistered" class="view_opd_follow_up_DeliveryRegistered"><div class="ew-table-header-caption"><?php echo $view_opd_follow_up_list->DeliveryRegistered->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DeliveryRegistered" class="<?php echo $view_opd_follow_up_list->DeliveryRegistered->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_opd_follow_up_list->SortUrl($view_opd_follow_up_list->DeliveryRegistered) ?>', 1);"><div id="elh_view_opd_follow_up_DeliveryRegistered" class="view_opd_follow_up_DeliveryRegistered">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_opd_follow_up_list->DeliveryRegistered->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_opd_follow_up_list->DeliveryRegistered->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_opd_follow_up_list->DeliveryRegistered->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_opd_follow_up_list->EDD->Visible) { // EDD ?>
	<?php if ($view_opd_follow_up_list->SortUrl($view_opd_follow_up_list->EDD) == "") { ?>
		<th data-name="EDD" class="<?php echo $view_opd_follow_up_list->EDD->headerCellClass() ?>"><div id="elh_view_opd_follow_up_EDD" class="view_opd_follow_up_EDD"><div class="ew-table-header-caption"><?php echo $view_opd_follow_up_list->EDD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EDD" class="<?php echo $view_opd_follow_up_list->EDD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_opd_follow_up_list->SortUrl($view_opd_follow_up_list->EDD) ?>', 1);"><div id="elh_view_opd_follow_up_EDD" class="view_opd_follow_up_EDD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_opd_follow_up_list->EDD->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_opd_follow_up_list->EDD->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_opd_follow_up_list->EDD->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_opd_follow_up_list->SerologyPositive->Visible) { // SerologyPositive ?>
	<?php if ($view_opd_follow_up_list->SortUrl($view_opd_follow_up_list->SerologyPositive) == "") { ?>
		<th data-name="SerologyPositive" class="<?php echo $view_opd_follow_up_list->SerologyPositive->headerCellClass() ?>"><div id="elh_view_opd_follow_up_SerologyPositive" class="view_opd_follow_up_SerologyPositive"><div class="ew-table-header-caption"><?php echo $view_opd_follow_up_list->SerologyPositive->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SerologyPositive" class="<?php echo $view_opd_follow_up_list->SerologyPositive->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_opd_follow_up_list->SortUrl($view_opd_follow_up_list->SerologyPositive) ?>', 1);"><div id="elh_view_opd_follow_up_SerologyPositive" class="view_opd_follow_up_SerologyPositive">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_opd_follow_up_list->SerologyPositive->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_opd_follow_up_list->SerologyPositive->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_opd_follow_up_list->SerologyPositive->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_opd_follow_up_list->Allergy->Visible) { // Allergy ?>
	<?php if ($view_opd_follow_up_list->SortUrl($view_opd_follow_up_list->Allergy) == "") { ?>
		<th data-name="Allergy" class="<?php echo $view_opd_follow_up_list->Allergy->headerCellClass() ?>"><div id="elh_view_opd_follow_up_Allergy" class="view_opd_follow_up_Allergy"><div class="ew-table-header-caption"><?php echo $view_opd_follow_up_list->Allergy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Allergy" class="<?php echo $view_opd_follow_up_list->Allergy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_opd_follow_up_list->SortUrl($view_opd_follow_up_list->Allergy) ?>', 1);"><div id="elh_view_opd_follow_up_Allergy" class="view_opd_follow_up_Allergy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_opd_follow_up_list->Allergy->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_opd_follow_up_list->Allergy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_opd_follow_up_list->Allergy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_opd_follow_up_list->status->Visible) { // status ?>
	<?php if ($view_opd_follow_up_list->SortUrl($view_opd_follow_up_list->status) == "") { ?>
		<th data-name="status" class="<?php echo $view_opd_follow_up_list->status->headerCellClass() ?>"><div id="elh_view_opd_follow_up_status" class="view_opd_follow_up_status"><div class="ew-table-header-caption"><?php echo $view_opd_follow_up_list->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $view_opd_follow_up_list->status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_opd_follow_up_list->SortUrl($view_opd_follow_up_list->status) ?>', 1);"><div id="elh_view_opd_follow_up_status" class="view_opd_follow_up_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_opd_follow_up_list->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_opd_follow_up_list->status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_opd_follow_up_list->status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_opd_follow_up_list->createdby->Visible) { // createdby ?>
	<?php if ($view_opd_follow_up_list->SortUrl($view_opd_follow_up_list->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $view_opd_follow_up_list->createdby->headerCellClass() ?>"><div id="elh_view_opd_follow_up_createdby" class="view_opd_follow_up_createdby"><div class="ew-table-header-caption"><?php echo $view_opd_follow_up_list->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $view_opd_follow_up_list->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_opd_follow_up_list->SortUrl($view_opd_follow_up_list->createdby) ?>', 1);"><div id="elh_view_opd_follow_up_createdby" class="view_opd_follow_up_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_opd_follow_up_list->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_opd_follow_up_list->createdby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_opd_follow_up_list->createdby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_opd_follow_up_list->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_opd_follow_up_list->SortUrl($view_opd_follow_up_list->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_opd_follow_up_list->createddatetime->headerCellClass() ?>"><div id="elh_view_opd_follow_up_createddatetime" class="view_opd_follow_up_createddatetime"><div class="ew-table-header-caption"><?php echo $view_opd_follow_up_list->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_opd_follow_up_list->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_opd_follow_up_list->SortUrl($view_opd_follow_up_list->createddatetime) ?>', 1);"><div id="elh_view_opd_follow_up_createddatetime" class="view_opd_follow_up_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_opd_follow_up_list->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_opd_follow_up_list->createddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_opd_follow_up_list->createddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_opd_follow_up_list->modifiedby->Visible) { // modifiedby ?>
	<?php if ($view_opd_follow_up_list->SortUrl($view_opd_follow_up_list->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $view_opd_follow_up_list->modifiedby->headerCellClass() ?>"><div id="elh_view_opd_follow_up_modifiedby" class="view_opd_follow_up_modifiedby"><div class="ew-table-header-caption"><?php echo $view_opd_follow_up_list->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $view_opd_follow_up_list->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_opd_follow_up_list->SortUrl($view_opd_follow_up_list->modifiedby) ?>', 1);"><div id="elh_view_opd_follow_up_modifiedby" class="view_opd_follow_up_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_opd_follow_up_list->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_opd_follow_up_list->modifiedby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_opd_follow_up_list->modifiedby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_opd_follow_up_list->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($view_opd_follow_up_list->SortUrl($view_opd_follow_up_list->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_opd_follow_up_list->modifieddatetime->headerCellClass() ?>"><div id="elh_view_opd_follow_up_modifieddatetime" class="view_opd_follow_up_modifieddatetime"><div class="ew-table-header-caption"><?php echo $view_opd_follow_up_list->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_opd_follow_up_list->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_opd_follow_up_list->SortUrl($view_opd_follow_up_list->modifieddatetime) ?>', 1);"><div id="elh_view_opd_follow_up_modifieddatetime" class="view_opd_follow_up_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_opd_follow_up_list->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_opd_follow_up_list->modifieddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_opd_follow_up_list->modifieddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_opd_follow_up_list->LMP->Visible) { // LMP ?>
	<?php if ($view_opd_follow_up_list->SortUrl($view_opd_follow_up_list->LMP) == "") { ?>
		<th data-name="LMP" class="<?php echo $view_opd_follow_up_list->LMP->headerCellClass() ?>"><div id="elh_view_opd_follow_up_LMP" class="view_opd_follow_up_LMP"><div class="ew-table-header-caption"><?php echo $view_opd_follow_up_list->LMP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LMP" class="<?php echo $view_opd_follow_up_list->LMP->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_opd_follow_up_list->SortUrl($view_opd_follow_up_list->LMP) ?>', 1);"><div id="elh_view_opd_follow_up_LMP" class="view_opd_follow_up_LMP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_opd_follow_up_list->LMP->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_opd_follow_up_list->LMP->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_opd_follow_up_list->LMP->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_opd_follow_up_list->ProcedureDateTime->Visible) { // ProcedureDateTime ?>
	<?php if ($view_opd_follow_up_list->SortUrl($view_opd_follow_up_list->ProcedureDateTime) == "") { ?>
		<th data-name="ProcedureDateTime" class="<?php echo $view_opd_follow_up_list->ProcedureDateTime->headerCellClass() ?>"><div id="elh_view_opd_follow_up_ProcedureDateTime" class="view_opd_follow_up_ProcedureDateTime"><div class="ew-table-header-caption"><?php echo $view_opd_follow_up_list->ProcedureDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProcedureDateTime" class="<?php echo $view_opd_follow_up_list->ProcedureDateTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_opd_follow_up_list->SortUrl($view_opd_follow_up_list->ProcedureDateTime) ?>', 1);"><div id="elh_view_opd_follow_up_ProcedureDateTime" class="view_opd_follow_up_ProcedureDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_opd_follow_up_list->ProcedureDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_opd_follow_up_list->ProcedureDateTime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_opd_follow_up_list->ProcedureDateTime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_opd_follow_up_list->ICSIDate->Visible) { // ICSIDate ?>
	<?php if ($view_opd_follow_up_list->SortUrl($view_opd_follow_up_list->ICSIDate) == "") { ?>
		<th data-name="ICSIDate" class="<?php echo $view_opd_follow_up_list->ICSIDate->headerCellClass() ?>"><div id="elh_view_opd_follow_up_ICSIDate" class="view_opd_follow_up_ICSIDate"><div class="ew-table-header-caption"><?php echo $view_opd_follow_up_list->ICSIDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ICSIDate" class="<?php echo $view_opd_follow_up_list->ICSIDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_opd_follow_up_list->SortUrl($view_opd_follow_up_list->ICSIDate) ?>', 1);"><div id="elh_view_opd_follow_up_ICSIDate" class="view_opd_follow_up_ICSIDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_opd_follow_up_list->ICSIDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_opd_follow_up_list->ICSIDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_opd_follow_up_list->ICSIDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_opd_follow_up_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_opd_follow_up_list->ExportAll && $view_opd_follow_up_list->isExport()) {
	$view_opd_follow_up_list->StopRecord = $view_opd_follow_up_list->TotalRecords;
} else {

	// Set the last record to display
	if ($view_opd_follow_up_list->TotalRecords > $view_opd_follow_up_list->StartRecord + $view_opd_follow_up_list->DisplayRecords - 1)
		$view_opd_follow_up_list->StopRecord = $view_opd_follow_up_list->StartRecord + $view_opd_follow_up_list->DisplayRecords - 1;
	else
		$view_opd_follow_up_list->StopRecord = $view_opd_follow_up_list->TotalRecords;
}
$view_opd_follow_up_list->RecordCount = $view_opd_follow_up_list->StartRecord - 1;
if ($view_opd_follow_up_list->Recordset && !$view_opd_follow_up_list->Recordset->EOF) {
	$view_opd_follow_up_list->Recordset->moveFirst();
	$selectLimit = $view_opd_follow_up_list->UseSelectLimit;
	if (!$selectLimit && $view_opd_follow_up_list->StartRecord > 1)
		$view_opd_follow_up_list->Recordset->move($view_opd_follow_up_list->StartRecord - 1);
} elseif (!$view_opd_follow_up->AllowAddDeleteRow && $view_opd_follow_up_list->StopRecord == 0) {
	$view_opd_follow_up_list->StopRecord = $view_opd_follow_up->GridAddRowCount;
}

// Initialize aggregate
$view_opd_follow_up->RowType = ROWTYPE_AGGREGATEINIT;
$view_opd_follow_up->resetAttributes();
$view_opd_follow_up_list->renderRow();
while ($view_opd_follow_up_list->RecordCount < $view_opd_follow_up_list->StopRecord) {
	$view_opd_follow_up_list->RecordCount++;
	if ($view_opd_follow_up_list->RecordCount >= $view_opd_follow_up_list->StartRecord) {
		$view_opd_follow_up_list->RowCount++;

		// Set up key count
		$view_opd_follow_up_list->KeyCount = $view_opd_follow_up_list->RowIndex;

		// Init row class and style
		$view_opd_follow_up->resetAttributes();
		$view_opd_follow_up->CssClass = "";
		if ($view_opd_follow_up_list->isGridAdd()) {
		} else {
			$view_opd_follow_up_list->loadRowValues($view_opd_follow_up_list->Recordset); // Load row values
		}
		$view_opd_follow_up->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_opd_follow_up->RowAttrs->merge(["data-rowindex" => $view_opd_follow_up_list->RowCount, "id" => "r" . $view_opd_follow_up_list->RowCount . "_view_opd_follow_up", "data-rowtype" => $view_opd_follow_up->RowType]);

		// Render row
		$view_opd_follow_up_list->renderRow();

		// Render list options
		$view_opd_follow_up_list->renderListOptions();
?>
	<tr <?php echo $view_opd_follow_up->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_opd_follow_up_list->ListOptions->render("body", "left", $view_opd_follow_up_list->RowCount);
?>
	<?php if ($view_opd_follow_up_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $view_opd_follow_up_list->id->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_list->RowCount ?>_view_opd_follow_up_id">
<span<?php echo $view_opd_follow_up_list->id->viewAttributes() ?>><?php echo $view_opd_follow_up_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_opd_follow_up_list->Reception->Visible) { // Reception ?>
		<td data-name="Reception" <?php echo $view_opd_follow_up_list->Reception->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_list->RowCount ?>_view_opd_follow_up_Reception">
<span<?php echo $view_opd_follow_up_list->Reception->viewAttributes() ?>><?php echo $view_opd_follow_up_list->Reception->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_opd_follow_up_list->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId" <?php echo $view_opd_follow_up_list->PatientId->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_list->RowCount ?>_view_opd_follow_up_PatientId">
<span<?php echo $view_opd_follow_up_list->PatientId->viewAttributes() ?>><?php echo $view_opd_follow_up_list->PatientId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_opd_follow_up_list->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno" <?php echo $view_opd_follow_up_list->mrnno->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_list->RowCount ?>_view_opd_follow_up_mrnno">
<span<?php echo $view_opd_follow_up_list->mrnno->viewAttributes() ?>><?php echo $view_opd_follow_up_list->mrnno->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_opd_follow_up_list->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName" <?php echo $view_opd_follow_up_list->PatientName->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_list->RowCount ?>_view_opd_follow_up_PatientName">
<span<?php echo $view_opd_follow_up_list->PatientName->viewAttributes() ?>><?php echo $view_opd_follow_up_list->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_opd_follow_up_list->Telephone->Visible) { // Telephone ?>
		<td data-name="Telephone" <?php echo $view_opd_follow_up_list->Telephone->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_list->RowCount ?>_view_opd_follow_up_Telephone">
<span<?php echo $view_opd_follow_up_list->Telephone->viewAttributes() ?>><?php echo $view_opd_follow_up_list->Telephone->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_opd_follow_up_list->Age->Visible) { // Age ?>
		<td data-name="Age" <?php echo $view_opd_follow_up_list->Age->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_list->RowCount ?>_view_opd_follow_up_Age">
<span<?php echo $view_opd_follow_up_list->Age->viewAttributes() ?>><?php echo $view_opd_follow_up_list->Age->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_opd_follow_up_list->Gender->Visible) { // Gender ?>
		<td data-name="Gender" <?php echo $view_opd_follow_up_list->Gender->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_list->RowCount ?>_view_opd_follow_up_Gender">
<span<?php echo $view_opd_follow_up_list->Gender->viewAttributes() ?>><?php echo $view_opd_follow_up_list->Gender->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_opd_follow_up_list->NextReviewDate->Visible) { // NextReviewDate ?>
		<td data-name="NextReviewDate" <?php echo $view_opd_follow_up_list->NextReviewDate->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_list->RowCount ?>_view_opd_follow_up_NextReviewDate">
<span<?php echo $view_opd_follow_up_list->NextReviewDate->viewAttributes() ?>><?php echo $view_opd_follow_up_list->NextReviewDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_opd_follow_up_list->ICSIAdvised->Visible) { // ICSIAdvised ?>
		<td data-name="ICSIAdvised" <?php echo $view_opd_follow_up_list->ICSIAdvised->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_list->RowCount ?>_view_opd_follow_up_ICSIAdvised">
<span<?php echo $view_opd_follow_up_list->ICSIAdvised->viewAttributes() ?>><?php echo $view_opd_follow_up_list->ICSIAdvised->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_opd_follow_up_list->DeliveryRegistered->Visible) { // DeliveryRegistered ?>
		<td data-name="DeliveryRegistered" <?php echo $view_opd_follow_up_list->DeliveryRegistered->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_list->RowCount ?>_view_opd_follow_up_DeliveryRegistered">
<span<?php echo $view_opd_follow_up_list->DeliveryRegistered->viewAttributes() ?>><?php echo $view_opd_follow_up_list->DeliveryRegistered->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_opd_follow_up_list->EDD->Visible) { // EDD ?>
		<td data-name="EDD" <?php echo $view_opd_follow_up_list->EDD->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_list->RowCount ?>_view_opd_follow_up_EDD">
<span<?php echo $view_opd_follow_up_list->EDD->viewAttributes() ?>><?php echo $view_opd_follow_up_list->EDD->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_opd_follow_up_list->SerologyPositive->Visible) { // SerologyPositive ?>
		<td data-name="SerologyPositive" <?php echo $view_opd_follow_up_list->SerologyPositive->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_list->RowCount ?>_view_opd_follow_up_SerologyPositive">
<span<?php echo $view_opd_follow_up_list->SerologyPositive->viewAttributes() ?>><?php echo $view_opd_follow_up_list->SerologyPositive->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_opd_follow_up_list->Allergy->Visible) { // Allergy ?>
		<td data-name="Allergy" <?php echo $view_opd_follow_up_list->Allergy->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_list->RowCount ?>_view_opd_follow_up_Allergy">
<span<?php echo $view_opd_follow_up_list->Allergy->viewAttributes() ?>><?php echo $view_opd_follow_up_list->Allergy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_opd_follow_up_list->status->Visible) { // status ?>
		<td data-name="status" <?php echo $view_opd_follow_up_list->status->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_list->RowCount ?>_view_opd_follow_up_status">
<span<?php echo $view_opd_follow_up_list->status->viewAttributes() ?>><?php echo $view_opd_follow_up_list->status->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_opd_follow_up_list->createdby->Visible) { // createdby ?>
		<td data-name="createdby" <?php echo $view_opd_follow_up_list->createdby->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_list->RowCount ?>_view_opd_follow_up_createdby">
<span<?php echo $view_opd_follow_up_list->createdby->viewAttributes() ?>><?php echo $view_opd_follow_up_list->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_opd_follow_up_list->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" <?php echo $view_opd_follow_up_list->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_list->RowCount ?>_view_opd_follow_up_createddatetime">
<span<?php echo $view_opd_follow_up_list->createddatetime->viewAttributes() ?>><?php echo $view_opd_follow_up_list->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_opd_follow_up_list->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby" <?php echo $view_opd_follow_up_list->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_list->RowCount ?>_view_opd_follow_up_modifiedby">
<span<?php echo $view_opd_follow_up_list->modifiedby->viewAttributes() ?>><?php echo $view_opd_follow_up_list->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_opd_follow_up_list->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime" <?php echo $view_opd_follow_up_list->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_list->RowCount ?>_view_opd_follow_up_modifieddatetime">
<span<?php echo $view_opd_follow_up_list->modifieddatetime->viewAttributes() ?>><?php echo $view_opd_follow_up_list->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_opd_follow_up_list->LMP->Visible) { // LMP ?>
		<td data-name="LMP" <?php echo $view_opd_follow_up_list->LMP->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_list->RowCount ?>_view_opd_follow_up_LMP">
<span<?php echo $view_opd_follow_up_list->LMP->viewAttributes() ?>><?php echo $view_opd_follow_up_list->LMP->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_opd_follow_up_list->ProcedureDateTime->Visible) { // ProcedureDateTime ?>
		<td data-name="ProcedureDateTime" <?php echo $view_opd_follow_up_list->ProcedureDateTime->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_list->RowCount ?>_view_opd_follow_up_ProcedureDateTime">
<span<?php echo $view_opd_follow_up_list->ProcedureDateTime->viewAttributes() ?>><?php echo $view_opd_follow_up_list->ProcedureDateTime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_opd_follow_up_list->ICSIDate->Visible) { // ICSIDate ?>
		<td data-name="ICSIDate" <?php echo $view_opd_follow_up_list->ICSIDate->cellAttributes() ?>>
<span id="el<?php echo $view_opd_follow_up_list->RowCount ?>_view_opd_follow_up_ICSIDate">
<span<?php echo $view_opd_follow_up_list->ICSIDate->viewAttributes() ?>><?php echo $view_opd_follow_up_list->ICSIDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_opd_follow_up_list->ListOptions->render("body", "right", $view_opd_follow_up_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$view_opd_follow_up_list->isGridAdd())
		$view_opd_follow_up_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$view_opd_follow_up->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_opd_follow_up_list->Recordset)
	$view_opd_follow_up_list->Recordset->Close();
?>
<?php if (!$view_opd_follow_up_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_opd_follow_up_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_opd_follow_up_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_opd_follow_up_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_opd_follow_up_list->TotalRecords == 0 && !$view_opd_follow_up->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_opd_follow_up_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_opd_follow_up_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_opd_follow_up_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$view_opd_follow_up->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_view_opd_follow_up",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$view_opd_follow_up_list->terminate();
?>