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
$view_pharmacy_purchase_request_purchased_list = new view_pharmacy_purchase_request_purchased_list();

// Run the page
$view_pharmacy_purchase_request_purchased_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacy_purchase_request_purchased_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$view_pharmacy_purchase_request_purchased_list->isExport()) { ?>
<script>
var fview_pharmacy_purchase_request_purchasedlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fview_pharmacy_purchase_request_purchasedlist = currentForm = new ew.Form("fview_pharmacy_purchase_request_purchasedlist", "list");
	fview_pharmacy_purchase_request_purchasedlist.formKeyCountName = '<?php echo $view_pharmacy_purchase_request_purchased_list->FormKeyCountName ?>';
	loadjs.done("fview_pharmacy_purchase_request_purchasedlist");
});
var fview_pharmacy_purchase_request_purchasedlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fview_pharmacy_purchase_request_purchasedlistsrch = currentSearchForm = new ew.Form("fview_pharmacy_purchase_request_purchasedlistsrch");

	// Dynamic selection lists
	// Filters

	fview_pharmacy_purchase_request_purchasedlistsrch.filterList = <?php echo $view_pharmacy_purchase_request_purchased_list->getFilterList() ?>;
	loadjs.done("fview_pharmacy_purchase_request_purchasedlistsrch");
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
<?php if (!$view_pharmacy_purchase_request_purchased_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_pharmacy_purchase_request_purchased_list->TotalRecords > 0 && $view_pharmacy_purchase_request_purchased_list->ExportOptions->visible()) { ?>
<?php $view_pharmacy_purchase_request_purchased_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased_list->ImportOptions->visible()) { ?>
<?php $view_pharmacy_purchase_request_purchased_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased_list->SearchOptions->visible()) { ?>
<?php $view_pharmacy_purchase_request_purchased_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased_list->FilterOptions->visible()) { ?>
<?php $view_pharmacy_purchase_request_purchased_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_pharmacy_purchase_request_purchased_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_pharmacy_purchase_request_purchased_list->isExport() && !$view_pharmacy_purchase_request_purchased->CurrentAction) { ?>
<form name="fview_pharmacy_purchase_request_purchasedlistsrch" id="fview_pharmacy_purchase_request_purchasedlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fview_pharmacy_purchase_request_purchasedlistsrch-search-panel" class="<?php echo $view_pharmacy_purchase_request_purchased_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_pharmacy_purchase_request_purchased">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $view_pharmacy_purchase_request_purchased_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_purchased_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($view_pharmacy_purchase_request_purchased_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_pharmacy_purchase_request_purchased_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_pharmacy_purchase_request_purchased_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_purchase_request_purchased_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_purchase_request_purchased_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_purchase_request_purchased_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $view_pharmacy_purchase_request_purchased_list->showPageHeader(); ?>
<?php
$view_pharmacy_purchase_request_purchased_list->showMessage();
?>
<?php if ($view_pharmacy_purchase_request_purchased_list->TotalRecords > 0 || $view_pharmacy_purchase_request_purchased->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_pharmacy_purchase_request_purchased_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_pharmacy_purchase_request_purchased">
<?php if (!$view_pharmacy_purchase_request_purchased_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_pharmacy_purchase_request_purchased_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_pharmacy_purchase_request_purchased_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_purchase_request_purchased_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_pharmacy_purchase_request_purchasedlist" id="fview_pharmacy_purchase_request_purchasedlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_purchase_request_purchased">
<div id="gmp_view_pharmacy_purchase_request_purchased" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($view_pharmacy_purchase_request_purchased_list->TotalRecords > 0 || $view_pharmacy_purchase_request_purchased_list->isGridEdit()) { ?>
<table id="tbl_view_pharmacy_purchase_request_purchasedlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_pharmacy_purchase_request_purchased->RowType = ROWTYPE_HEADER;

// Render list options
$view_pharmacy_purchase_request_purchased_list->renderListOptions();

// Render list options (header, left)
$view_pharmacy_purchase_request_purchased_list->ListOptions->render("header", "left");
?>
<?php if ($view_pharmacy_purchase_request_purchased_list->id->Visible) { // id ?>
	<?php if ($view_pharmacy_purchase_request_purchased_list->SortUrl($view_pharmacy_purchase_request_purchased_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_pharmacy_purchase_request_purchased_list->id->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_purchased_id" class="view_pharmacy_purchase_request_purchased_id"><div class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_purchased_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_pharmacy_purchase_request_purchased_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_purchase_request_purchased_list->SortUrl($view_pharmacy_purchase_request_purchased_list->id) ?>', 1);"><div id="elh_view_pharmacy_purchase_request_purchased_id" class="view_pharmacy_purchase_request_purchased_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_purchased_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_purchased_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_purchase_request_purchased_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased_list->DT->Visible) { // DT ?>
	<?php if ($view_pharmacy_purchase_request_purchased_list->SortUrl($view_pharmacy_purchase_request_purchased_list->DT) == "") { ?>
		<th data-name="DT" class="<?php echo $view_pharmacy_purchase_request_purchased_list->DT->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_purchased_DT" class="view_pharmacy_purchase_request_purchased_DT"><div class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_purchased_list->DT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DT" class="<?php echo $view_pharmacy_purchase_request_purchased_list->DT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_purchase_request_purchased_list->SortUrl($view_pharmacy_purchase_request_purchased_list->DT) ?>', 1);"><div id="elh_view_pharmacy_purchase_request_purchased_DT" class="view_pharmacy_purchase_request_purchased_DT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_purchased_list->DT->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_purchased_list->DT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_purchase_request_purchased_list->DT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased_list->EmployeeName->Visible) { // EmployeeName ?>
	<?php if ($view_pharmacy_purchase_request_purchased_list->SortUrl($view_pharmacy_purchase_request_purchased_list->EmployeeName) == "") { ?>
		<th data-name="EmployeeName" class="<?php echo $view_pharmacy_purchase_request_purchased_list->EmployeeName->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_purchased_EmployeeName" class="view_pharmacy_purchase_request_purchased_EmployeeName"><div class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_purchased_list->EmployeeName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EmployeeName" class="<?php echo $view_pharmacy_purchase_request_purchased_list->EmployeeName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_purchase_request_purchased_list->SortUrl($view_pharmacy_purchase_request_purchased_list->EmployeeName) ?>', 1);"><div id="elh_view_pharmacy_purchase_request_purchased_EmployeeName" class="view_pharmacy_purchase_request_purchased_EmployeeName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_purchased_list->EmployeeName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_purchased_list->EmployeeName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_purchase_request_purchased_list->EmployeeName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased_list->Department->Visible) { // Department ?>
	<?php if ($view_pharmacy_purchase_request_purchased_list->SortUrl($view_pharmacy_purchase_request_purchased_list->Department) == "") { ?>
		<th data-name="Department" class="<?php echo $view_pharmacy_purchase_request_purchased_list->Department->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_purchased_Department" class="view_pharmacy_purchase_request_purchased_Department"><div class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_purchased_list->Department->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Department" class="<?php echo $view_pharmacy_purchase_request_purchased_list->Department->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_purchase_request_purchased_list->SortUrl($view_pharmacy_purchase_request_purchased_list->Department) ?>', 1);"><div id="elh_view_pharmacy_purchase_request_purchased_Department" class="view_pharmacy_purchase_request_purchased_Department">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_purchased_list->Department->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_purchased_list->Department->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_purchase_request_purchased_list->Department->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased_list->ApprovedStatus->Visible) { // ApprovedStatus ?>
	<?php if ($view_pharmacy_purchase_request_purchased_list->SortUrl($view_pharmacy_purchase_request_purchased_list->ApprovedStatus) == "") { ?>
		<th data-name="ApprovedStatus" class="<?php echo $view_pharmacy_purchase_request_purchased_list->ApprovedStatus->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_purchased_ApprovedStatus" class="view_pharmacy_purchase_request_purchased_ApprovedStatus"><div class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_purchased_list->ApprovedStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ApprovedStatus" class="<?php echo $view_pharmacy_purchase_request_purchased_list->ApprovedStatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_purchase_request_purchased_list->SortUrl($view_pharmacy_purchase_request_purchased_list->ApprovedStatus) ?>', 1);"><div id="elh_view_pharmacy_purchase_request_purchased_ApprovedStatus" class="view_pharmacy_purchase_request_purchased_ApprovedStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_purchased_list->ApprovedStatus->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_purchased_list->ApprovedStatus->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_purchase_request_purchased_list->ApprovedStatus->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased_list->PurchaseStatus->Visible) { // PurchaseStatus ?>
	<?php if ($view_pharmacy_purchase_request_purchased_list->SortUrl($view_pharmacy_purchase_request_purchased_list->PurchaseStatus) == "") { ?>
		<th data-name="PurchaseStatus" class="<?php echo $view_pharmacy_purchase_request_purchased_list->PurchaseStatus->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_purchased_PurchaseStatus" class="view_pharmacy_purchase_request_purchased_PurchaseStatus"><div class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_purchased_list->PurchaseStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PurchaseStatus" class="<?php echo $view_pharmacy_purchase_request_purchased_list->PurchaseStatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_purchase_request_purchased_list->SortUrl($view_pharmacy_purchase_request_purchased_list->PurchaseStatus) ?>', 1);"><div id="elh_view_pharmacy_purchase_request_purchased_PurchaseStatus" class="view_pharmacy_purchase_request_purchased_PurchaseStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_purchased_list->PurchaseStatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_purchased_list->PurchaseStatus->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_purchase_request_purchased_list->PurchaseStatus->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased_list->HospID->Visible) { // HospID ?>
	<?php if ($view_pharmacy_purchase_request_purchased_list->SortUrl($view_pharmacy_purchase_request_purchased_list->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_pharmacy_purchase_request_purchased_list->HospID->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_purchased_HospID" class="view_pharmacy_purchase_request_purchased_HospID"><div class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_purchased_list->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_pharmacy_purchase_request_purchased_list->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_purchase_request_purchased_list->SortUrl($view_pharmacy_purchase_request_purchased_list->HospID) ?>', 1);"><div id="elh_view_pharmacy_purchase_request_purchased_HospID" class="view_pharmacy_purchase_request_purchased_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_purchased_list->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_purchased_list->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_purchase_request_purchased_list->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased_list->createdby->Visible) { // createdby ?>
	<?php if ($view_pharmacy_purchase_request_purchased_list->SortUrl($view_pharmacy_purchase_request_purchased_list->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $view_pharmacy_purchase_request_purchased_list->createdby->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_purchased_createdby" class="view_pharmacy_purchase_request_purchased_createdby"><div class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_purchased_list->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $view_pharmacy_purchase_request_purchased_list->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_purchase_request_purchased_list->SortUrl($view_pharmacy_purchase_request_purchased_list->createdby) ?>', 1);"><div id="elh_view_pharmacy_purchase_request_purchased_createdby" class="view_pharmacy_purchase_request_purchased_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_purchased_list->createdby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_purchased_list->createdby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_purchase_request_purchased_list->createdby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased_list->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_pharmacy_purchase_request_purchased_list->SortUrl($view_pharmacy_purchase_request_purchased_list->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_pharmacy_purchase_request_purchased_list->createddatetime->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_purchased_createddatetime" class="view_pharmacy_purchase_request_purchased_createddatetime"><div class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_purchased_list->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_pharmacy_purchase_request_purchased_list->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_purchase_request_purchased_list->SortUrl($view_pharmacy_purchase_request_purchased_list->createddatetime) ?>', 1);"><div id="elh_view_pharmacy_purchase_request_purchased_createddatetime" class="view_pharmacy_purchase_request_purchased_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_purchased_list->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_purchased_list->createddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_purchase_request_purchased_list->createddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased_list->modifiedby->Visible) { // modifiedby ?>
	<?php if ($view_pharmacy_purchase_request_purchased_list->SortUrl($view_pharmacy_purchase_request_purchased_list->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $view_pharmacy_purchase_request_purchased_list->modifiedby->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_purchased_modifiedby" class="view_pharmacy_purchase_request_purchased_modifiedby"><div class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_purchased_list->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $view_pharmacy_purchase_request_purchased_list->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_purchase_request_purchased_list->SortUrl($view_pharmacy_purchase_request_purchased_list->modifiedby) ?>', 1);"><div id="elh_view_pharmacy_purchase_request_purchased_modifiedby" class="view_pharmacy_purchase_request_purchased_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_purchased_list->modifiedby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_purchased_list->modifiedby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_purchase_request_purchased_list->modifiedby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased_list->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($view_pharmacy_purchase_request_purchased_list->SortUrl($view_pharmacy_purchase_request_purchased_list->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_pharmacy_purchase_request_purchased_list->modifieddatetime->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_purchased_modifieddatetime" class="view_pharmacy_purchase_request_purchased_modifieddatetime"><div class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_purchased_list->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_pharmacy_purchase_request_purchased_list->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_purchase_request_purchased_list->SortUrl($view_pharmacy_purchase_request_purchased_list->modifieddatetime) ?>', 1);"><div id="elh_view_pharmacy_purchase_request_purchased_modifieddatetime" class="view_pharmacy_purchase_request_purchased_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_purchased_list->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_purchased_list->modifieddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_purchase_request_purchased_list->modifieddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased_list->BRCODE->Visible) { // BRCODE ?>
	<?php if ($view_pharmacy_purchase_request_purchased_list->SortUrl($view_pharmacy_purchase_request_purchased_list->BRCODE) == "") { ?>
		<th data-name="BRCODE" class="<?php echo $view_pharmacy_purchase_request_purchased_list->BRCODE->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_purchased_BRCODE" class="view_pharmacy_purchase_request_purchased_BRCODE"><div class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_purchased_list->BRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BRCODE" class="<?php echo $view_pharmacy_purchase_request_purchased_list->BRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_purchase_request_purchased_list->SortUrl($view_pharmacy_purchase_request_purchased_list->BRCODE) ?>', 1);"><div id="elh_view_pharmacy_purchase_request_purchased_BRCODE" class="view_pharmacy_purchase_request_purchased_BRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_purchase_request_purchased_list->BRCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_purchase_request_purchased_list->BRCODE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_purchase_request_purchased_list->BRCODE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_pharmacy_purchase_request_purchased_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_pharmacy_purchase_request_purchased_list->ExportAll && $view_pharmacy_purchase_request_purchased_list->isExport()) {
	$view_pharmacy_purchase_request_purchased_list->StopRecord = $view_pharmacy_purchase_request_purchased_list->TotalRecords;
} else {

	// Set the last record to display
	if ($view_pharmacy_purchase_request_purchased_list->TotalRecords > $view_pharmacy_purchase_request_purchased_list->StartRecord + $view_pharmacy_purchase_request_purchased_list->DisplayRecords - 1)
		$view_pharmacy_purchase_request_purchased_list->StopRecord = $view_pharmacy_purchase_request_purchased_list->StartRecord + $view_pharmacy_purchase_request_purchased_list->DisplayRecords - 1;
	else
		$view_pharmacy_purchase_request_purchased_list->StopRecord = $view_pharmacy_purchase_request_purchased_list->TotalRecords;
}
$view_pharmacy_purchase_request_purchased_list->RecordCount = $view_pharmacy_purchase_request_purchased_list->StartRecord - 1;
if ($view_pharmacy_purchase_request_purchased_list->Recordset && !$view_pharmacy_purchase_request_purchased_list->Recordset->EOF) {
	$view_pharmacy_purchase_request_purchased_list->Recordset->moveFirst();
	$selectLimit = $view_pharmacy_purchase_request_purchased_list->UseSelectLimit;
	if (!$selectLimit && $view_pharmacy_purchase_request_purchased_list->StartRecord > 1)
		$view_pharmacy_purchase_request_purchased_list->Recordset->move($view_pharmacy_purchase_request_purchased_list->StartRecord - 1);
} elseif (!$view_pharmacy_purchase_request_purchased->AllowAddDeleteRow && $view_pharmacy_purchase_request_purchased_list->StopRecord == 0) {
	$view_pharmacy_purchase_request_purchased_list->StopRecord = $view_pharmacy_purchase_request_purchased->GridAddRowCount;
}

// Initialize aggregate
$view_pharmacy_purchase_request_purchased->RowType = ROWTYPE_AGGREGATEINIT;
$view_pharmacy_purchase_request_purchased->resetAttributes();
$view_pharmacy_purchase_request_purchased_list->renderRow();
while ($view_pharmacy_purchase_request_purchased_list->RecordCount < $view_pharmacy_purchase_request_purchased_list->StopRecord) {
	$view_pharmacy_purchase_request_purchased_list->RecordCount++;
	if ($view_pharmacy_purchase_request_purchased_list->RecordCount >= $view_pharmacy_purchase_request_purchased_list->StartRecord) {
		$view_pharmacy_purchase_request_purchased_list->RowCount++;

		// Set up key count
		$view_pharmacy_purchase_request_purchased_list->KeyCount = $view_pharmacy_purchase_request_purchased_list->RowIndex;

		// Init row class and style
		$view_pharmacy_purchase_request_purchased->resetAttributes();
		$view_pharmacy_purchase_request_purchased->CssClass = "";
		if ($view_pharmacy_purchase_request_purchased_list->isGridAdd()) {
		} else {
			$view_pharmacy_purchase_request_purchased_list->loadRowValues($view_pharmacy_purchase_request_purchased_list->Recordset); // Load row values
		}
		$view_pharmacy_purchase_request_purchased->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_pharmacy_purchase_request_purchased->RowAttrs->merge(["data-rowindex" => $view_pharmacy_purchase_request_purchased_list->RowCount, "id" => "r" . $view_pharmacy_purchase_request_purchased_list->RowCount . "_view_pharmacy_purchase_request_purchased", "data-rowtype" => $view_pharmacy_purchase_request_purchased->RowType]);

		// Render row
		$view_pharmacy_purchase_request_purchased_list->renderRow();

		// Render list options
		$view_pharmacy_purchase_request_purchased_list->renderListOptions();
?>
	<tr <?php echo $view_pharmacy_purchase_request_purchased->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_pharmacy_purchase_request_purchased_list->ListOptions->render("body", "left", $view_pharmacy_purchase_request_purchased_list->RowCount);
?>
	<?php if ($view_pharmacy_purchase_request_purchased_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $view_pharmacy_purchase_request_purchased_list->id->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_purchase_request_purchased_list->RowCount ?>_view_pharmacy_purchase_request_purchased_id">
<span<?php echo $view_pharmacy_purchase_request_purchased_list->id->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_purchased_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_purchased_list->DT->Visible) { // DT ?>
		<td data-name="DT" <?php echo $view_pharmacy_purchase_request_purchased_list->DT->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_purchase_request_purchased_list->RowCount ?>_view_pharmacy_purchase_request_purchased_DT">
<span<?php echo $view_pharmacy_purchase_request_purchased_list->DT->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_purchased_list->DT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_purchased_list->EmployeeName->Visible) { // EmployeeName ?>
		<td data-name="EmployeeName" <?php echo $view_pharmacy_purchase_request_purchased_list->EmployeeName->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_purchase_request_purchased_list->RowCount ?>_view_pharmacy_purchase_request_purchased_EmployeeName">
<span<?php echo $view_pharmacy_purchase_request_purchased_list->EmployeeName->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_purchased_list->EmployeeName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_purchased_list->Department->Visible) { // Department ?>
		<td data-name="Department" <?php echo $view_pharmacy_purchase_request_purchased_list->Department->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_purchase_request_purchased_list->RowCount ?>_view_pharmacy_purchase_request_purchased_Department">
<span<?php echo $view_pharmacy_purchase_request_purchased_list->Department->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_purchased_list->Department->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_purchased_list->ApprovedStatus->Visible) { // ApprovedStatus ?>
		<td data-name="ApprovedStatus" <?php echo $view_pharmacy_purchase_request_purchased_list->ApprovedStatus->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_purchase_request_purchased_list->RowCount ?>_view_pharmacy_purchase_request_purchased_ApprovedStatus">
<span<?php echo $view_pharmacy_purchase_request_purchased_list->ApprovedStatus->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_purchased_list->ApprovedStatus->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_purchased_list->PurchaseStatus->Visible) { // PurchaseStatus ?>
		<td data-name="PurchaseStatus" <?php echo $view_pharmacy_purchase_request_purchased_list->PurchaseStatus->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_purchase_request_purchased_list->RowCount ?>_view_pharmacy_purchase_request_purchased_PurchaseStatus">
<span<?php echo $view_pharmacy_purchase_request_purchased_list->PurchaseStatus->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_purchased_list->PurchaseStatus->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_purchased_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $view_pharmacy_purchase_request_purchased_list->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_purchase_request_purchased_list->RowCount ?>_view_pharmacy_purchase_request_purchased_HospID">
<span<?php echo $view_pharmacy_purchase_request_purchased_list->HospID->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_purchased_list->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_purchased_list->createdby->Visible) { // createdby ?>
		<td data-name="createdby" <?php echo $view_pharmacy_purchase_request_purchased_list->createdby->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_purchase_request_purchased_list->RowCount ?>_view_pharmacy_purchase_request_purchased_createdby">
<span<?php echo $view_pharmacy_purchase_request_purchased_list->createdby->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_purchased_list->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_purchased_list->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" <?php echo $view_pharmacy_purchase_request_purchased_list->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_purchase_request_purchased_list->RowCount ?>_view_pharmacy_purchase_request_purchased_createddatetime">
<span<?php echo $view_pharmacy_purchase_request_purchased_list->createddatetime->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_purchased_list->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_purchased_list->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby" <?php echo $view_pharmacy_purchase_request_purchased_list->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_purchase_request_purchased_list->RowCount ?>_view_pharmacy_purchase_request_purchased_modifiedby">
<span<?php echo $view_pharmacy_purchase_request_purchased_list->modifiedby->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_purchased_list->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_purchased_list->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime" <?php echo $view_pharmacy_purchase_request_purchased_list->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_purchase_request_purchased_list->RowCount ?>_view_pharmacy_purchase_request_purchased_modifieddatetime">
<span<?php echo $view_pharmacy_purchase_request_purchased_list->modifieddatetime->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_purchased_list->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_purchase_request_purchased_list->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE" <?php echo $view_pharmacy_purchase_request_purchased_list->BRCODE->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_purchase_request_purchased_list->RowCount ?>_view_pharmacy_purchase_request_purchased_BRCODE">
<span<?php echo $view_pharmacy_purchase_request_purchased_list->BRCODE->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_purchased_list->BRCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_pharmacy_purchase_request_purchased_list->ListOptions->render("body", "right", $view_pharmacy_purchase_request_purchased_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$view_pharmacy_purchase_request_purchased_list->isGridAdd())
		$view_pharmacy_purchase_request_purchased_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$view_pharmacy_purchase_request_purchased->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_pharmacy_purchase_request_purchased_list->Recordset)
	$view_pharmacy_purchase_request_purchased_list->Recordset->Close();
?>
<?php if (!$view_pharmacy_purchase_request_purchased_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_pharmacy_purchase_request_purchased_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_pharmacy_purchase_request_purchased_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_purchase_request_purchased_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased_list->TotalRecords == 0 && !$view_pharmacy_purchase_request_purchased->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_purchase_request_purchased_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_pharmacy_purchase_request_purchased_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_pharmacy_purchase_request_purchased_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$view_pharmacy_purchase_request_purchased->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_view_pharmacy_purchase_request_purchased",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$view_pharmacy_purchase_request_purchased_list->terminate();
?>