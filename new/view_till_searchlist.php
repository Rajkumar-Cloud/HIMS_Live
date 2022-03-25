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
$view_till_search_list = new view_till_search_list();

// Run the page
$view_till_search_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_till_search_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$view_till_search_list->isExport()) { ?>
<script>
var fview_till_searchlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fview_till_searchlist = currentForm = new ew.Form("fview_till_searchlist", "list");
	fview_till_searchlist.formKeyCountName = '<?php echo $view_till_search_list->FormKeyCountName ?>';
	loadjs.done("fview_till_searchlist");
});
var fview_till_searchlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fview_till_searchlistsrch = currentSearchForm = new ew.Form("fview_till_searchlistsrch");

	// Dynamic selection lists
	// Filters

	fview_till_searchlistsrch.filterList = <?php echo $view_till_search_list->getFilterList() ?>;
	loadjs.done("fview_till_searchlistsrch");
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
<?php if (!$view_till_search_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_till_search_list->TotalRecords > 0 && $view_till_search_list->ExportOptions->visible()) { ?>
<?php $view_till_search_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_till_search_list->ImportOptions->visible()) { ?>
<?php $view_till_search_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_till_search_list->SearchOptions->visible()) { ?>
<?php $view_till_search_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_till_search_list->FilterOptions->visible()) { ?>
<?php $view_till_search_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_till_search_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_till_search_list->isExport() && !$view_till_search->CurrentAction) { ?>
<form name="fview_till_searchlistsrch" id="fview_till_searchlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fview_till_searchlistsrch-search-panel" class="<?php echo $view_till_search_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_till_search">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $view_till_search_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($view_till_search_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($view_till_search_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_till_search_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_till_search_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_till_search_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_till_search_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_till_search_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $view_till_search_list->showPageHeader(); ?>
<?php
$view_till_search_list->showMessage();
?>
<?php if ($view_till_search_list->TotalRecords > 0 || $view_till_search->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_till_search_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_till_search">
<?php if (!$view_till_search_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_till_search_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_till_search_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_till_search_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_till_searchlist" id="fview_till_searchlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_till_search">
<div id="gmp_view_till_search" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($view_till_search_list->TotalRecords > 0 || $view_till_search_list->isGridEdit()) { ?>
<table id="tbl_view_till_searchlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_till_search->RowType = ROWTYPE_HEADER;

// Render list options
$view_till_search_list->renderListOptions();

// Render list options (header, left)
$view_till_search_list->ListOptions->render("header", "left");
?>
<?php if ($view_till_search_list->id->Visible) { // id ?>
	<?php if ($view_till_search_list->SortUrl($view_till_search_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_till_search_list->id->headerCellClass() ?>"><div id="elh_view_till_search_id" class="view_till_search_id"><div class="ew-table-header-caption"><?php echo $view_till_search_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_till_search_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_till_search_list->SortUrl($view_till_search_list->id) ?>', 1);"><div id="elh_view_till_search_id" class="view_till_search_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_till_search_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_till_search_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_till_search_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_till_search_list->Mobile->Visible) { // Mobile ?>
	<?php if ($view_till_search_list->SortUrl($view_till_search_list->Mobile) == "") { ?>
		<th data-name="Mobile" class="<?php echo $view_till_search_list->Mobile->headerCellClass() ?>"><div id="elh_view_till_search_Mobile" class="view_till_search_Mobile"><div class="ew-table-header-caption"><?php echo $view_till_search_list->Mobile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mobile" class="<?php echo $view_till_search_list->Mobile->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_till_search_list->SortUrl($view_till_search_list->Mobile) ?>', 1);"><div id="elh_view_till_search_Mobile" class="view_till_search_Mobile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_till_search_list->Mobile->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_till_search_list->Mobile->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_till_search_list->Mobile->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_till_search_list->voucher_type->Visible) { // voucher_type ?>
	<?php if ($view_till_search_list->SortUrl($view_till_search_list->voucher_type) == "") { ?>
		<th data-name="voucher_type" class="<?php echo $view_till_search_list->voucher_type->headerCellClass() ?>"><div id="elh_view_till_search_voucher_type" class="view_till_search_voucher_type"><div class="ew-table-header-caption"><?php echo $view_till_search_list->voucher_type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="voucher_type" class="<?php echo $view_till_search_list->voucher_type->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_till_search_list->SortUrl($view_till_search_list->voucher_type) ?>', 1);"><div id="elh_view_till_search_voucher_type" class="view_till_search_voucher_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_till_search_list->voucher_type->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_till_search_list->voucher_type->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_till_search_list->voucher_type->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_till_search_list->Details->Visible) { // Details ?>
	<?php if ($view_till_search_list->SortUrl($view_till_search_list->Details) == "") { ?>
		<th data-name="Details" class="<?php echo $view_till_search_list->Details->headerCellClass() ?>"><div id="elh_view_till_search_Details" class="view_till_search_Details"><div class="ew-table-header-caption"><?php echo $view_till_search_list->Details->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Details" class="<?php echo $view_till_search_list->Details->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_till_search_list->SortUrl($view_till_search_list->Details) ?>', 1);"><div id="elh_view_till_search_Details" class="view_till_search_Details">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_till_search_list->Details->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_till_search_list->Details->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_till_search_list->Details->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_till_search_list->ModeofPayment->Visible) { // ModeofPayment ?>
	<?php if ($view_till_search_list->SortUrl($view_till_search_list->ModeofPayment) == "") { ?>
		<th data-name="ModeofPayment" class="<?php echo $view_till_search_list->ModeofPayment->headerCellClass() ?>"><div id="elh_view_till_search_ModeofPayment" class="view_till_search_ModeofPayment"><div class="ew-table-header-caption"><?php echo $view_till_search_list->ModeofPayment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModeofPayment" class="<?php echo $view_till_search_list->ModeofPayment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_till_search_list->SortUrl($view_till_search_list->ModeofPayment) ?>', 1);"><div id="elh_view_till_search_ModeofPayment" class="view_till_search_ModeofPayment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_till_search_list->ModeofPayment->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_till_search_list->ModeofPayment->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_till_search_list->ModeofPayment->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_till_search_list->Amount->Visible) { // Amount ?>
	<?php if ($view_till_search_list->SortUrl($view_till_search_list->Amount) == "") { ?>
		<th data-name="Amount" class="<?php echo $view_till_search_list->Amount->headerCellClass() ?>"><div id="elh_view_till_search_Amount" class="view_till_search_Amount"><div class="ew-table-header-caption"><?php echo $view_till_search_list->Amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Amount" class="<?php echo $view_till_search_list->Amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_till_search_list->SortUrl($view_till_search_list->Amount) ?>', 1);"><div id="elh_view_till_search_Amount" class="view_till_search_Amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_till_search_list->Amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_till_search_list->Amount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_till_search_list->Amount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_till_search_list->AnyDues->Visible) { // AnyDues ?>
	<?php if ($view_till_search_list->SortUrl($view_till_search_list->AnyDues) == "") { ?>
		<th data-name="AnyDues" class="<?php echo $view_till_search_list->AnyDues->headerCellClass() ?>"><div id="elh_view_till_search_AnyDues" class="view_till_search_AnyDues"><div class="ew-table-header-caption"><?php echo $view_till_search_list->AnyDues->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AnyDues" class="<?php echo $view_till_search_list->AnyDues->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_till_search_list->SortUrl($view_till_search_list->AnyDues) ?>', 1);"><div id="elh_view_till_search_AnyDues" class="view_till_search_AnyDues">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_till_search_list->AnyDues->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_till_search_list->AnyDues->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_till_search_list->AnyDues->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_till_search_list->createdby->Visible) { // createdby ?>
	<?php if ($view_till_search_list->SortUrl($view_till_search_list->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $view_till_search_list->createdby->headerCellClass() ?>"><div id="elh_view_till_search_createdby" class="view_till_search_createdby"><div class="ew-table-header-caption"><?php echo $view_till_search_list->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $view_till_search_list->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_till_search_list->SortUrl($view_till_search_list->createdby) ?>', 1);"><div id="elh_view_till_search_createdby" class="view_till_search_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_till_search_list->createdby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_till_search_list->createdby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_till_search_list->createdby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_till_search_list->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_till_search_list->SortUrl($view_till_search_list->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_till_search_list->createddatetime->headerCellClass() ?>"><div id="elh_view_till_search_createddatetime" class="view_till_search_createddatetime"><div class="ew-table-header-caption"><?php echo $view_till_search_list->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_till_search_list->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_till_search_list->SortUrl($view_till_search_list->createddatetime) ?>', 1);"><div id="elh_view_till_search_createddatetime" class="view_till_search_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_till_search_list->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_till_search_list->createddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_till_search_list->createddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_till_search_list->modifiedby->Visible) { // modifiedby ?>
	<?php if ($view_till_search_list->SortUrl($view_till_search_list->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $view_till_search_list->modifiedby->headerCellClass() ?>"><div id="elh_view_till_search_modifiedby" class="view_till_search_modifiedby"><div class="ew-table-header-caption"><?php echo $view_till_search_list->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $view_till_search_list->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_till_search_list->SortUrl($view_till_search_list->modifiedby) ?>', 1);"><div id="elh_view_till_search_modifiedby" class="view_till_search_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_till_search_list->modifiedby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_till_search_list->modifiedby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_till_search_list->modifiedby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_till_search_list->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($view_till_search_list->SortUrl($view_till_search_list->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_till_search_list->modifieddatetime->headerCellClass() ?>"><div id="elh_view_till_search_modifieddatetime" class="view_till_search_modifieddatetime"><div class="ew-table-header-caption"><?php echo $view_till_search_list->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_till_search_list->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_till_search_list->SortUrl($view_till_search_list->modifieddatetime) ?>', 1);"><div id="elh_view_till_search_modifieddatetime" class="view_till_search_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_till_search_list->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_till_search_list->modifieddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_till_search_list->modifieddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_till_search_list->BillNumber->Visible) { // BillNumber ?>
	<?php if ($view_till_search_list->SortUrl($view_till_search_list->BillNumber) == "") { ?>
		<th data-name="BillNumber" class="<?php echo $view_till_search_list->BillNumber->headerCellClass() ?>"><div id="elh_view_till_search_BillNumber" class="view_till_search_BillNumber"><div class="ew-table-header-caption"><?php echo $view_till_search_list->BillNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillNumber" class="<?php echo $view_till_search_list->BillNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_till_search_list->SortUrl($view_till_search_list->BillNumber) ?>', 1);"><div id="elh_view_till_search_BillNumber" class="view_till_search_BillNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_till_search_list->BillNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_till_search_list->BillNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_till_search_list->BillNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_till_search_list->PatientID->Visible) { // PatientID ?>
	<?php if ($view_till_search_list->SortUrl($view_till_search_list->PatientID) == "") { ?>
		<th data-name="PatientID" class="<?php echo $view_till_search_list->PatientID->headerCellClass() ?>"><div id="elh_view_till_search_PatientID" class="view_till_search_PatientID"><div class="ew-table-header-caption"><?php echo $view_till_search_list->PatientID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientID" class="<?php echo $view_till_search_list->PatientID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_till_search_list->SortUrl($view_till_search_list->PatientID) ?>', 1);"><div id="elh_view_till_search_PatientID" class="view_till_search_PatientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_till_search_list->PatientID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_till_search_list->PatientID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_till_search_list->PatientID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_till_search_list->PatientName->Visible) { // PatientName ?>
	<?php if ($view_till_search_list->SortUrl($view_till_search_list->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $view_till_search_list->PatientName->headerCellClass() ?>"><div id="elh_view_till_search_PatientName" class="view_till_search_PatientName"><div class="ew-table-header-caption"><?php echo $view_till_search_list->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $view_till_search_list->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_till_search_list->SortUrl($view_till_search_list->PatientName) ?>', 1);"><div id="elh_view_till_search_PatientName" class="view_till_search_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_till_search_list->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_till_search_list->PatientName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_till_search_list->PatientName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_till_search_list->BillType->Visible) { // BillType ?>
	<?php if ($view_till_search_list->SortUrl($view_till_search_list->BillType) == "") { ?>
		<th data-name="BillType" class="<?php echo $view_till_search_list->BillType->headerCellClass() ?>"><div id="elh_view_till_search_BillType" class="view_till_search_BillType"><div class="ew-table-header-caption"><?php echo $view_till_search_list->BillType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillType" class="<?php echo $view_till_search_list->BillType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_till_search_list->SortUrl($view_till_search_list->BillType) ?>', 1);"><div id="elh_view_till_search_BillType" class="view_till_search_BillType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_till_search_list->BillType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_till_search_list->BillType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_till_search_list->BillType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_till_search_list->HospID->Visible) { // HospID ?>
	<?php if ($view_till_search_list->SortUrl($view_till_search_list->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_till_search_list->HospID->headerCellClass() ?>"><div id="elh_view_till_search_HospID" class="view_till_search_HospID"><div class="ew-table-header-caption"><?php echo $view_till_search_list->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_till_search_list->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_till_search_list->SortUrl($view_till_search_list->HospID) ?>', 1);"><div id="elh_view_till_search_HospID" class="view_till_search_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_till_search_list->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_till_search_list->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_till_search_list->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_till_search_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_till_search_list->ExportAll && $view_till_search_list->isExport()) {
	$view_till_search_list->StopRecord = $view_till_search_list->TotalRecords;
} else {

	// Set the last record to display
	if ($view_till_search_list->TotalRecords > $view_till_search_list->StartRecord + $view_till_search_list->DisplayRecords - 1)
		$view_till_search_list->StopRecord = $view_till_search_list->StartRecord + $view_till_search_list->DisplayRecords - 1;
	else
		$view_till_search_list->StopRecord = $view_till_search_list->TotalRecords;
}
$view_till_search_list->RecordCount = $view_till_search_list->StartRecord - 1;
if ($view_till_search_list->Recordset && !$view_till_search_list->Recordset->EOF) {
	$view_till_search_list->Recordset->moveFirst();
	$selectLimit = $view_till_search_list->UseSelectLimit;
	if (!$selectLimit && $view_till_search_list->StartRecord > 1)
		$view_till_search_list->Recordset->move($view_till_search_list->StartRecord - 1);
} elseif (!$view_till_search->AllowAddDeleteRow && $view_till_search_list->StopRecord == 0) {
	$view_till_search_list->StopRecord = $view_till_search->GridAddRowCount;
}

// Initialize aggregate
$view_till_search->RowType = ROWTYPE_AGGREGATEINIT;
$view_till_search->resetAttributes();
$view_till_search_list->renderRow();
while ($view_till_search_list->RecordCount < $view_till_search_list->StopRecord) {
	$view_till_search_list->RecordCount++;
	if ($view_till_search_list->RecordCount >= $view_till_search_list->StartRecord) {
		$view_till_search_list->RowCount++;

		// Set up key count
		$view_till_search_list->KeyCount = $view_till_search_list->RowIndex;

		// Init row class and style
		$view_till_search->resetAttributes();
		$view_till_search->CssClass = "";
		if ($view_till_search_list->isGridAdd()) {
		} else {
			$view_till_search_list->loadRowValues($view_till_search_list->Recordset); // Load row values
		}
		$view_till_search->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_till_search->RowAttrs->merge(["data-rowindex" => $view_till_search_list->RowCount, "id" => "r" . $view_till_search_list->RowCount . "_view_till_search", "data-rowtype" => $view_till_search->RowType]);

		// Render row
		$view_till_search_list->renderRow();

		// Render list options
		$view_till_search_list->renderListOptions();
?>
	<tr <?php echo $view_till_search->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_till_search_list->ListOptions->render("body", "left", $view_till_search_list->RowCount);
?>
	<?php if ($view_till_search_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $view_till_search_list->id->cellAttributes() ?>>
<span id="el<?php echo $view_till_search_list->RowCount ?>_view_till_search_id">
<span<?php echo $view_till_search_list->id->viewAttributes() ?>><?php echo $view_till_search_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_till_search_list->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile" <?php echo $view_till_search_list->Mobile->cellAttributes() ?>>
<span id="el<?php echo $view_till_search_list->RowCount ?>_view_till_search_Mobile">
<span<?php echo $view_till_search_list->Mobile->viewAttributes() ?>><?php echo $view_till_search_list->Mobile->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_till_search_list->voucher_type->Visible) { // voucher_type ?>
		<td data-name="voucher_type" <?php echo $view_till_search_list->voucher_type->cellAttributes() ?>>
<span id="el<?php echo $view_till_search_list->RowCount ?>_view_till_search_voucher_type">
<span<?php echo $view_till_search_list->voucher_type->viewAttributes() ?>><?php echo $view_till_search_list->voucher_type->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_till_search_list->Details->Visible) { // Details ?>
		<td data-name="Details" <?php echo $view_till_search_list->Details->cellAttributes() ?>>
<span id="el<?php echo $view_till_search_list->RowCount ?>_view_till_search_Details">
<span<?php echo $view_till_search_list->Details->viewAttributes() ?>><?php echo $view_till_search_list->Details->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_till_search_list->ModeofPayment->Visible) { // ModeofPayment ?>
		<td data-name="ModeofPayment" <?php echo $view_till_search_list->ModeofPayment->cellAttributes() ?>>
<span id="el<?php echo $view_till_search_list->RowCount ?>_view_till_search_ModeofPayment">
<span<?php echo $view_till_search_list->ModeofPayment->viewAttributes() ?>><?php echo $view_till_search_list->ModeofPayment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_till_search_list->Amount->Visible) { // Amount ?>
		<td data-name="Amount" <?php echo $view_till_search_list->Amount->cellAttributes() ?>>
<span id="el<?php echo $view_till_search_list->RowCount ?>_view_till_search_Amount">
<span<?php echo $view_till_search_list->Amount->viewAttributes() ?>><?php echo $view_till_search_list->Amount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_till_search_list->AnyDues->Visible) { // AnyDues ?>
		<td data-name="AnyDues" <?php echo $view_till_search_list->AnyDues->cellAttributes() ?>>
<span id="el<?php echo $view_till_search_list->RowCount ?>_view_till_search_AnyDues">
<span<?php echo $view_till_search_list->AnyDues->viewAttributes() ?>><?php echo $view_till_search_list->AnyDues->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_till_search_list->createdby->Visible) { // createdby ?>
		<td data-name="createdby" <?php echo $view_till_search_list->createdby->cellAttributes() ?>>
<span id="el<?php echo $view_till_search_list->RowCount ?>_view_till_search_createdby">
<span<?php echo $view_till_search_list->createdby->viewAttributes() ?>><?php echo $view_till_search_list->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_till_search_list->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" <?php echo $view_till_search_list->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_till_search_list->RowCount ?>_view_till_search_createddatetime">
<span<?php echo $view_till_search_list->createddatetime->viewAttributes() ?>><?php echo $view_till_search_list->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_till_search_list->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby" <?php echo $view_till_search_list->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $view_till_search_list->RowCount ?>_view_till_search_modifiedby">
<span<?php echo $view_till_search_list->modifiedby->viewAttributes() ?>><?php echo $view_till_search_list->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_till_search_list->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime" <?php echo $view_till_search_list->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_till_search_list->RowCount ?>_view_till_search_modifieddatetime">
<span<?php echo $view_till_search_list->modifieddatetime->viewAttributes() ?>><?php echo $view_till_search_list->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_till_search_list->BillNumber->Visible) { // BillNumber ?>
		<td data-name="BillNumber" <?php echo $view_till_search_list->BillNumber->cellAttributes() ?>>
<span id="el<?php echo $view_till_search_list->RowCount ?>_view_till_search_BillNumber">
<span<?php echo $view_till_search_list->BillNumber->viewAttributes() ?>><?php echo $view_till_search_list->BillNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_till_search_list->PatientID->Visible) { // PatientID ?>
		<td data-name="PatientID" <?php echo $view_till_search_list->PatientID->cellAttributes() ?>>
<span id="el<?php echo $view_till_search_list->RowCount ?>_view_till_search_PatientID">
<span<?php echo $view_till_search_list->PatientID->viewAttributes() ?>><?php echo $view_till_search_list->PatientID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_till_search_list->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName" <?php echo $view_till_search_list->PatientName->cellAttributes() ?>>
<span id="el<?php echo $view_till_search_list->RowCount ?>_view_till_search_PatientName">
<span<?php echo $view_till_search_list->PatientName->viewAttributes() ?>><?php echo $view_till_search_list->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_till_search_list->BillType->Visible) { // BillType ?>
		<td data-name="BillType" <?php echo $view_till_search_list->BillType->cellAttributes() ?>>
<span id="el<?php echo $view_till_search_list->RowCount ?>_view_till_search_BillType">
<span<?php echo $view_till_search_list->BillType->viewAttributes() ?>><?php echo $view_till_search_list->BillType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_till_search_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $view_till_search_list->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_till_search_list->RowCount ?>_view_till_search_HospID">
<span<?php echo $view_till_search_list->HospID->viewAttributes() ?>><?php echo $view_till_search_list->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_till_search_list->ListOptions->render("body", "right", $view_till_search_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$view_till_search_list->isGridAdd())
		$view_till_search_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$view_till_search->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_till_search_list->Recordset)
	$view_till_search_list->Recordset->Close();
?>
<?php if (!$view_till_search_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_till_search_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_till_search_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_till_search_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_till_search_list->TotalRecords == 0 && !$view_till_search->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_till_search_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_till_search_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_till_search_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$view_till_search->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_view_till_search",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$view_till_search_list->terminate();
?>