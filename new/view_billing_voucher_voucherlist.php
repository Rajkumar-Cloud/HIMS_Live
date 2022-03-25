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
$view_billing_voucher_voucher_list = new view_billing_voucher_voucher_list();

// Run the page
$view_billing_voucher_voucher_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_billing_voucher_voucher_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$view_billing_voucher_voucher_list->isExport()) { ?>
<script>
var fview_billing_voucher_voucherlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fview_billing_voucher_voucherlist = currentForm = new ew.Form("fview_billing_voucher_voucherlist", "list");
	fview_billing_voucher_voucherlist.formKeyCountName = '<?php echo $view_billing_voucher_voucher_list->FormKeyCountName ?>';
	loadjs.done("fview_billing_voucher_voucherlist");
});
var fview_billing_voucher_voucherlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fview_billing_voucher_voucherlistsrch = currentSearchForm = new ew.Form("fview_billing_voucher_voucherlistsrch");

	// Dynamic selection lists
	// Filters

	fview_billing_voucher_voucherlistsrch.filterList = <?php echo $view_billing_voucher_voucher_list->getFilterList() ?>;
	loadjs.done("fview_billing_voucher_voucherlistsrch");
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
<?php if (!$view_billing_voucher_voucher_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_billing_voucher_voucher_list->TotalRecords > 0 && $view_billing_voucher_voucher_list->ExportOptions->visible()) { ?>
<?php $view_billing_voucher_voucher_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_billing_voucher_voucher_list->ImportOptions->visible()) { ?>
<?php $view_billing_voucher_voucher_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_billing_voucher_voucher_list->SearchOptions->visible()) { ?>
<?php $view_billing_voucher_voucher_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_billing_voucher_voucher_list->FilterOptions->visible()) { ?>
<?php $view_billing_voucher_voucher_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_billing_voucher_voucher_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_billing_voucher_voucher_list->isExport() && !$view_billing_voucher_voucher->CurrentAction) { ?>
<form name="fview_billing_voucher_voucherlistsrch" id="fview_billing_voucher_voucherlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fview_billing_voucher_voucherlistsrch-search-panel" class="<?php echo $view_billing_voucher_voucher_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_billing_voucher_voucher">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $view_billing_voucher_voucher_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($view_billing_voucher_voucher_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($view_billing_voucher_voucher_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_billing_voucher_voucher_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_billing_voucher_voucher_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_billing_voucher_voucher_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_billing_voucher_voucher_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_billing_voucher_voucher_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $view_billing_voucher_voucher_list->showPageHeader(); ?>
<?php
$view_billing_voucher_voucher_list->showMessage();
?>
<?php if ($view_billing_voucher_voucher_list->TotalRecords > 0 || $view_billing_voucher_voucher->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_billing_voucher_voucher_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_billing_voucher_voucher">
<?php if (!$view_billing_voucher_voucher_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_billing_voucher_voucher_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_billing_voucher_voucher_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_billing_voucher_voucher_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_billing_voucher_voucherlist" id="fview_billing_voucher_voucherlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_billing_voucher_voucher">
<div id="gmp_view_billing_voucher_voucher" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($view_billing_voucher_voucher_list->TotalRecords > 0 || $view_billing_voucher_voucher_list->isGridEdit()) { ?>
<table id="tbl_view_billing_voucher_voucherlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_billing_voucher_voucher->RowType = ROWTYPE_HEADER;

// Render list options
$view_billing_voucher_voucher_list->renderListOptions();

// Render list options (header, left)
$view_billing_voucher_voucher_list->ListOptions->render("header", "left");
?>
<?php if ($view_billing_voucher_voucher_list->id->Visible) { // id ?>
	<?php if ($view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_billing_voucher_voucher_list->id->headerCellClass() ?>"><div id="elh_view_billing_voucher_voucher_id" class="view_billing_voucher_voucher_id"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_billing_voucher_voucher_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->id) ?>', 1);"><div id="elh_view_billing_voucher_voucher_id" class="view_billing_voucher_voucher_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_voucher_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_voucher_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_voucher_list->Reception->Visible) { // Reception ?>
	<?php if ($view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->Reception) == "") { ?>
		<th data-name="Reception" class="<?php echo $view_billing_voucher_voucher_list->Reception->headerCellClass() ?>"><div id="elh_view_billing_voucher_voucher_Reception" class="view_billing_voucher_voucher_Reception"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->Reception->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Reception" class="<?php echo $view_billing_voucher_voucher_list->Reception->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->Reception) ?>', 1);"><div id="elh_view_billing_voucher_voucher_Reception" class="view_billing_voucher_voucher_Reception">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->Reception->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_voucher_list->Reception->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_voucher_list->Reception->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_voucher_list->PatientId->Visible) { // PatientId ?>
	<?php if ($view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $view_billing_voucher_voucher_list->PatientId->headerCellClass() ?>"><div id="elh_view_billing_voucher_voucher_PatientId" class="view_billing_voucher_voucher_PatientId"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $view_billing_voucher_voucher_list->PatientId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->PatientId) ?>', 1);"><div id="elh_view_billing_voucher_voucher_PatientId" class="view_billing_voucher_voucher_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->PatientId->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_voucher_list->PatientId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_voucher_list->PatientId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_voucher_list->mrnno->Visible) { // mrnno ?>
	<?php if ($view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->mrnno) == "") { ?>
		<th data-name="mrnno" class="<?php echo $view_billing_voucher_voucher_list->mrnno->headerCellClass() ?>"><div id="elh_view_billing_voucher_voucher_mrnno" class="view_billing_voucher_voucher_mrnno"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->mrnno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnno" class="<?php echo $view_billing_voucher_voucher_list->mrnno->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->mrnno) ?>', 1);"><div id="elh_view_billing_voucher_voucher_mrnno" class="view_billing_voucher_voucher_mrnno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->mrnno->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_voucher_list->mrnno->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_voucher_list->mrnno->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_voucher_list->PatientName->Visible) { // PatientName ?>
	<?php if ($view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $view_billing_voucher_voucher_list->PatientName->headerCellClass() ?>"><div id="elh_view_billing_voucher_voucher_PatientName" class="view_billing_voucher_voucher_PatientName"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $view_billing_voucher_voucher_list->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->PatientName) ?>', 1);"><div id="elh_view_billing_voucher_voucher_PatientName" class="view_billing_voucher_voucher_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_voucher_list->PatientName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_voucher_list->PatientName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_voucher_list->Age->Visible) { // Age ?>
	<?php if ($view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $view_billing_voucher_voucher_list->Age->headerCellClass() ?>"><div id="elh_view_billing_voucher_voucher_Age" class="view_billing_voucher_voucher_Age"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $view_billing_voucher_voucher_list->Age->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->Age) ?>', 1);"><div id="elh_view_billing_voucher_voucher_Age" class="view_billing_voucher_voucher_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->Age->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_voucher_list->Age->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_voucher_list->Age->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_voucher_list->Gender->Visible) { // Gender ?>
	<?php if ($view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->Gender) == "") { ?>
		<th data-name="Gender" class="<?php echo $view_billing_voucher_voucher_list->Gender->headerCellClass() ?>"><div id="elh_view_billing_voucher_voucher_Gender" class="view_billing_voucher_voucher_Gender"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->Gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gender" class="<?php echo $view_billing_voucher_voucher_list->Gender->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->Gender) ?>', 1);"><div id="elh_view_billing_voucher_voucher_Gender" class="view_billing_voucher_voucher_Gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->Gender->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_voucher_list->Gender->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_voucher_list->Gender->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_voucher_list->Amount->Visible) { // Amount ?>
	<?php if ($view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->Amount) == "") { ?>
		<th data-name="Amount" class="<?php echo $view_billing_voucher_voucher_list->Amount->headerCellClass() ?>"><div id="elh_view_billing_voucher_voucher_Amount" class="view_billing_voucher_voucher_Amount"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->Amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Amount" class="<?php echo $view_billing_voucher_voucher_list->Amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->Amount) ?>', 1);"><div id="elh_view_billing_voucher_voucher_Amount" class="view_billing_voucher_voucher_Amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->Amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_voucher_list->Amount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_voucher_list->Amount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_voucher_list->Mobile->Visible) { // Mobile ?>
	<?php if ($view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->Mobile) == "") { ?>
		<th data-name="Mobile" class="<?php echo $view_billing_voucher_voucher_list->Mobile->headerCellClass() ?>"><div id="elh_view_billing_voucher_voucher_Mobile" class="view_billing_voucher_voucher_Mobile"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->Mobile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mobile" class="<?php echo $view_billing_voucher_voucher_list->Mobile->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->Mobile) ?>', 1);"><div id="elh_view_billing_voucher_voucher_Mobile" class="view_billing_voucher_voucher_Mobile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->Mobile->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_voucher_list->Mobile->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_voucher_list->Mobile->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_voucher_list->Doctor->Visible) { // Doctor ?>
	<?php if ($view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->Doctor) == "") { ?>
		<th data-name="Doctor" class="<?php echo $view_billing_voucher_voucher_list->Doctor->headerCellClass() ?>"><div id="elh_view_billing_voucher_voucher_Doctor" class="view_billing_voucher_voucher_Doctor"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->Doctor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Doctor" class="<?php echo $view_billing_voucher_voucher_list->Doctor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->Doctor) ?>', 1);"><div id="elh_view_billing_voucher_voucher_Doctor" class="view_billing_voucher_voucher_Doctor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->Doctor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_voucher_list->Doctor->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_voucher_list->Doctor->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_voucher_list->Details->Visible) { // Details ?>
	<?php if ($view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->Details) == "") { ?>
		<th data-name="Details" class="<?php echo $view_billing_voucher_voucher_list->Details->headerCellClass() ?>"><div id="elh_view_billing_voucher_voucher_Details" class="view_billing_voucher_voucher_Details"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->Details->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Details" class="<?php echo $view_billing_voucher_voucher_list->Details->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->Details) ?>', 1);"><div id="elh_view_billing_voucher_voucher_Details" class="view_billing_voucher_voucher_Details">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->Details->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_voucher_list->Details->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_voucher_list->Details->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_voucher_list->ModeofPayment->Visible) { // ModeofPayment ?>
	<?php if ($view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->ModeofPayment) == "") { ?>
		<th data-name="ModeofPayment" class="<?php echo $view_billing_voucher_voucher_list->ModeofPayment->headerCellClass() ?>"><div id="elh_view_billing_voucher_voucher_ModeofPayment" class="view_billing_voucher_voucher_ModeofPayment"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->ModeofPayment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ModeofPayment" class="<?php echo $view_billing_voucher_voucher_list->ModeofPayment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->ModeofPayment) ?>', 1);"><div id="elh_view_billing_voucher_voucher_ModeofPayment" class="view_billing_voucher_voucher_ModeofPayment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->ModeofPayment->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_voucher_list->ModeofPayment->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_voucher_list->ModeofPayment->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_voucher_list->AnyDues->Visible) { // AnyDues ?>
	<?php if ($view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->AnyDues) == "") { ?>
		<th data-name="AnyDues" class="<?php echo $view_billing_voucher_voucher_list->AnyDues->headerCellClass() ?>"><div id="elh_view_billing_voucher_voucher_AnyDues" class="view_billing_voucher_voucher_AnyDues"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->AnyDues->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AnyDues" class="<?php echo $view_billing_voucher_voucher_list->AnyDues->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->AnyDues) ?>', 1);"><div id="elh_view_billing_voucher_voucher_AnyDues" class="view_billing_voucher_voucher_AnyDues">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->AnyDues->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_voucher_list->AnyDues->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_voucher_list->AnyDues->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_voucher_list->createdby->Visible) { // createdby ?>
	<?php if ($view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $view_billing_voucher_voucher_list->createdby->headerCellClass() ?>"><div id="elh_view_billing_voucher_voucher_createdby" class="view_billing_voucher_voucher_createdby"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $view_billing_voucher_voucher_list->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->createdby) ?>', 1);"><div id="elh_view_billing_voucher_voucher_createdby" class="view_billing_voucher_voucher_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->createdby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_voucher_list->createdby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_voucher_list->createdby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_voucher_list->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_billing_voucher_voucher_list->createddatetime->headerCellClass() ?>"><div id="elh_view_billing_voucher_voucher_createddatetime" class="view_billing_voucher_voucher_createddatetime"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_billing_voucher_voucher_list->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->createddatetime) ?>', 1);"><div id="elh_view_billing_voucher_voucher_createddatetime" class="view_billing_voucher_voucher_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_voucher_list->createddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_voucher_list->createddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_voucher_list->modifiedby->Visible) { // modifiedby ?>
	<?php if ($view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $view_billing_voucher_voucher_list->modifiedby->headerCellClass() ?>"><div id="elh_view_billing_voucher_voucher_modifiedby" class="view_billing_voucher_voucher_modifiedby"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $view_billing_voucher_voucher_list->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->modifiedby) ?>', 1);"><div id="elh_view_billing_voucher_voucher_modifiedby" class="view_billing_voucher_voucher_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->modifiedby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_voucher_list->modifiedby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_voucher_list->modifiedby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_voucher_list->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_billing_voucher_voucher_list->modifieddatetime->headerCellClass() ?>"><div id="elh_view_billing_voucher_voucher_modifieddatetime" class="view_billing_voucher_voucher_modifieddatetime"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_billing_voucher_voucher_list->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->modifieddatetime) ?>', 1);"><div id="elh_view_billing_voucher_voucher_modifieddatetime" class="view_billing_voucher_voucher_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_voucher_list->modifieddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_voucher_list->modifieddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_voucher_list->RealizationAmount->Visible) { // RealizationAmount ?>
	<?php if ($view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->RealizationAmount) == "") { ?>
		<th data-name="RealizationAmount" class="<?php echo $view_billing_voucher_voucher_list->RealizationAmount->headerCellClass() ?>"><div id="elh_view_billing_voucher_voucher_RealizationAmount" class="view_billing_voucher_voucher_RealizationAmount"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->RealizationAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RealizationAmount" class="<?php echo $view_billing_voucher_voucher_list->RealizationAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->RealizationAmount) ?>', 1);"><div id="elh_view_billing_voucher_voucher_RealizationAmount" class="view_billing_voucher_voucher_RealizationAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->RealizationAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_voucher_list->RealizationAmount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_voucher_list->RealizationAmount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_voucher_list->RealizationStatus->Visible) { // RealizationStatus ?>
	<?php if ($view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->RealizationStatus) == "") { ?>
		<th data-name="RealizationStatus" class="<?php echo $view_billing_voucher_voucher_list->RealizationStatus->headerCellClass() ?>"><div id="elh_view_billing_voucher_voucher_RealizationStatus" class="view_billing_voucher_voucher_RealizationStatus"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->RealizationStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RealizationStatus" class="<?php echo $view_billing_voucher_voucher_list->RealizationStatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->RealizationStatus) ?>', 1);"><div id="elh_view_billing_voucher_voucher_RealizationStatus" class="view_billing_voucher_voucher_RealizationStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->RealizationStatus->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_voucher_list->RealizationStatus->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_voucher_list->RealizationStatus->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_voucher_list->RealizationRemarks->Visible) { // RealizationRemarks ?>
	<?php if ($view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->RealizationRemarks) == "") { ?>
		<th data-name="RealizationRemarks" class="<?php echo $view_billing_voucher_voucher_list->RealizationRemarks->headerCellClass() ?>"><div id="elh_view_billing_voucher_voucher_RealizationRemarks" class="view_billing_voucher_voucher_RealizationRemarks"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->RealizationRemarks->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RealizationRemarks" class="<?php echo $view_billing_voucher_voucher_list->RealizationRemarks->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->RealizationRemarks) ?>', 1);"><div id="elh_view_billing_voucher_voucher_RealizationRemarks" class="view_billing_voucher_voucher_RealizationRemarks">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->RealizationRemarks->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_voucher_list->RealizationRemarks->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_voucher_list->RealizationRemarks->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_voucher_list->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
	<?php if ($view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->RealizationBatchNo) == "") { ?>
		<th data-name="RealizationBatchNo" class="<?php echo $view_billing_voucher_voucher_list->RealizationBatchNo->headerCellClass() ?>"><div id="elh_view_billing_voucher_voucher_RealizationBatchNo" class="view_billing_voucher_voucher_RealizationBatchNo"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->RealizationBatchNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RealizationBatchNo" class="<?php echo $view_billing_voucher_voucher_list->RealizationBatchNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->RealizationBatchNo) ?>', 1);"><div id="elh_view_billing_voucher_voucher_RealizationBatchNo" class="view_billing_voucher_voucher_RealizationBatchNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->RealizationBatchNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_voucher_list->RealizationBatchNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_voucher_list->RealizationBatchNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_voucher_list->RealizationDate->Visible) { // RealizationDate ?>
	<?php if ($view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->RealizationDate) == "") { ?>
		<th data-name="RealizationDate" class="<?php echo $view_billing_voucher_voucher_list->RealizationDate->headerCellClass() ?>"><div id="elh_view_billing_voucher_voucher_RealizationDate" class="view_billing_voucher_voucher_RealizationDate"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->RealizationDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RealizationDate" class="<?php echo $view_billing_voucher_voucher_list->RealizationDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->RealizationDate) ?>', 1);"><div id="elh_view_billing_voucher_voucher_RealizationDate" class="view_billing_voucher_voucher_RealizationDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->RealizationDate->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_voucher_list->RealizationDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_voucher_list->RealizationDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_voucher_list->HospID->Visible) { // HospID ?>
	<?php if ($view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_billing_voucher_voucher_list->HospID->headerCellClass() ?>"><div id="elh_view_billing_voucher_voucher_HospID" class="view_billing_voucher_voucher_HospID"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_billing_voucher_voucher_list->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->HospID) ?>', 1);"><div id="elh_view_billing_voucher_voucher_HospID" class="view_billing_voucher_voucher_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_voucher_list->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_voucher_list->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_voucher_list->RIDNO->Visible) { // RIDNO ?>
	<?php if ($view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->RIDNO) == "") { ?>
		<th data-name="RIDNO" class="<?php echo $view_billing_voucher_voucher_list->RIDNO->headerCellClass() ?>"><div id="elh_view_billing_voucher_voucher_RIDNO" class="view_billing_voucher_voucher_RIDNO"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->RIDNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RIDNO" class="<?php echo $view_billing_voucher_voucher_list->RIDNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->RIDNO) ?>', 1);"><div id="elh_view_billing_voucher_voucher_RIDNO" class="view_billing_voucher_voucher_RIDNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->RIDNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_voucher_list->RIDNO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_voucher_list->RIDNO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_voucher_list->TidNo->Visible) { // TidNo ?>
	<?php if ($view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->TidNo) == "") { ?>
		<th data-name="TidNo" class="<?php echo $view_billing_voucher_voucher_list->TidNo->headerCellClass() ?>"><div id="elh_view_billing_voucher_voucher_TidNo" class="view_billing_voucher_voucher_TidNo"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->TidNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TidNo" class="<?php echo $view_billing_voucher_voucher_list->TidNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->TidNo) ?>', 1);"><div id="elh_view_billing_voucher_voucher_TidNo" class="view_billing_voucher_voucher_TidNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->TidNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_voucher_list->TidNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_voucher_list->TidNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_voucher_list->CId->Visible) { // CId ?>
	<?php if ($view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->CId) == "") { ?>
		<th data-name="CId" class="<?php echo $view_billing_voucher_voucher_list->CId->headerCellClass() ?>"><div id="elh_view_billing_voucher_voucher_CId" class="view_billing_voucher_voucher_CId"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->CId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CId" class="<?php echo $view_billing_voucher_voucher_list->CId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->CId) ?>', 1);"><div id="elh_view_billing_voucher_voucher_CId" class="view_billing_voucher_voucher_CId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->CId->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_voucher_list->CId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_voucher_list->CId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_voucher_list->PartnerName->Visible) { // PartnerName ?>
	<?php if ($view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->PartnerName) == "") { ?>
		<th data-name="PartnerName" class="<?php echo $view_billing_voucher_voucher_list->PartnerName->headerCellClass() ?>"><div id="elh_view_billing_voucher_voucher_PartnerName" class="view_billing_voucher_voucher_PartnerName"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->PartnerName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerName" class="<?php echo $view_billing_voucher_voucher_list->PartnerName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->PartnerName) ?>', 1);"><div id="elh_view_billing_voucher_voucher_PartnerName" class="view_billing_voucher_voucher_PartnerName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->PartnerName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_voucher_list->PartnerName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_voucher_list->PartnerName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_voucher_list->PayerType->Visible) { // PayerType ?>
	<?php if ($view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->PayerType) == "") { ?>
		<th data-name="PayerType" class="<?php echo $view_billing_voucher_voucher_list->PayerType->headerCellClass() ?>"><div id="elh_view_billing_voucher_voucher_PayerType" class="view_billing_voucher_voucher_PayerType"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->PayerType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PayerType" class="<?php echo $view_billing_voucher_voucher_list->PayerType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->PayerType) ?>', 1);"><div id="elh_view_billing_voucher_voucher_PayerType" class="view_billing_voucher_voucher_PayerType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->PayerType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_voucher_list->PayerType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_voucher_list->PayerType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_voucher_list->Dob->Visible) { // Dob ?>
	<?php if ($view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->Dob) == "") { ?>
		<th data-name="Dob" class="<?php echo $view_billing_voucher_voucher_list->Dob->headerCellClass() ?>"><div id="elh_view_billing_voucher_voucher_Dob" class="view_billing_voucher_voucher_Dob"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->Dob->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Dob" class="<?php echo $view_billing_voucher_voucher_list->Dob->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->Dob) ?>', 1);"><div id="elh_view_billing_voucher_voucher_Dob" class="view_billing_voucher_voucher_Dob">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->Dob->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_voucher_list->Dob->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_voucher_list->Dob->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_voucher_list->Currency->Visible) { // Currency ?>
	<?php if ($view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->Currency) == "") { ?>
		<th data-name="Currency" class="<?php echo $view_billing_voucher_voucher_list->Currency->headerCellClass() ?>"><div id="elh_view_billing_voucher_voucher_Currency" class="view_billing_voucher_voucher_Currency"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->Currency->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Currency" class="<?php echo $view_billing_voucher_voucher_list->Currency->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->Currency) ?>', 1);"><div id="elh_view_billing_voucher_voucher_Currency" class="view_billing_voucher_voucher_Currency">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->Currency->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_voucher_list->Currency->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_voucher_list->Currency->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_voucher_list->DiscountRemarks->Visible) { // DiscountRemarks ?>
	<?php if ($view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->DiscountRemarks) == "") { ?>
		<th data-name="DiscountRemarks" class="<?php echo $view_billing_voucher_voucher_list->DiscountRemarks->headerCellClass() ?>"><div id="elh_view_billing_voucher_voucher_DiscountRemarks" class="view_billing_voucher_voucher_DiscountRemarks"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->DiscountRemarks->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DiscountRemarks" class="<?php echo $view_billing_voucher_voucher_list->DiscountRemarks->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->DiscountRemarks) ?>', 1);"><div id="elh_view_billing_voucher_voucher_DiscountRemarks" class="view_billing_voucher_voucher_DiscountRemarks">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->DiscountRemarks->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_voucher_list->DiscountRemarks->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_voucher_list->DiscountRemarks->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_voucher_list->PatId->Visible) { // PatId ?>
	<?php if ($view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->PatId) == "") { ?>
		<th data-name="PatId" class="<?php echo $view_billing_voucher_voucher_list->PatId->headerCellClass() ?>"><div id="elh_view_billing_voucher_voucher_PatId" class="view_billing_voucher_voucher_PatId"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->PatId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatId" class="<?php echo $view_billing_voucher_voucher_list->PatId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->PatId) ?>', 1);"><div id="elh_view_billing_voucher_voucher_PatId" class="view_billing_voucher_voucher_PatId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->PatId->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_voucher_list->PatId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_voucher_list->PatId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_voucher_list->DrDepartment->Visible) { // DrDepartment ?>
	<?php if ($view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->DrDepartment) == "") { ?>
		<th data-name="DrDepartment" class="<?php echo $view_billing_voucher_voucher_list->DrDepartment->headerCellClass() ?>"><div id="elh_view_billing_voucher_voucher_DrDepartment" class="view_billing_voucher_voucher_DrDepartment"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->DrDepartment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrDepartment" class="<?php echo $view_billing_voucher_voucher_list->DrDepartment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->DrDepartment) ?>', 1);"><div id="elh_view_billing_voucher_voucher_DrDepartment" class="view_billing_voucher_voucher_DrDepartment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->DrDepartment->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_voucher_list->DrDepartment->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_voucher_list->DrDepartment->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_voucher_list->RefferedBy->Visible) { // RefferedBy ?>
	<?php if ($view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->RefferedBy) == "") { ?>
		<th data-name="RefferedBy" class="<?php echo $view_billing_voucher_voucher_list->RefferedBy->headerCellClass() ?>"><div id="elh_view_billing_voucher_voucher_RefferedBy" class="view_billing_voucher_voucher_RefferedBy"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->RefferedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RefferedBy" class="<?php echo $view_billing_voucher_voucher_list->RefferedBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->RefferedBy) ?>', 1);"><div id="elh_view_billing_voucher_voucher_RefferedBy" class="view_billing_voucher_voucher_RefferedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->RefferedBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_voucher_list->RefferedBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_voucher_list->RefferedBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_voucher_list->BillNumber->Visible) { // BillNumber ?>
	<?php if ($view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->BillNumber) == "") { ?>
		<th data-name="BillNumber" class="<?php echo $view_billing_voucher_voucher_list->BillNumber->headerCellClass() ?>"><div id="elh_view_billing_voucher_voucher_BillNumber" class="view_billing_voucher_voucher_BillNumber"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->BillNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillNumber" class="<?php echo $view_billing_voucher_voucher_list->BillNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->BillNumber) ?>', 1);"><div id="elh_view_billing_voucher_voucher_BillNumber" class="view_billing_voucher_voucher_BillNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->BillNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_voucher_list->BillNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_voucher_list->BillNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_voucher_list->CardNumber->Visible) { // CardNumber ?>
	<?php if ($view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->CardNumber) == "") { ?>
		<th data-name="CardNumber" class="<?php echo $view_billing_voucher_voucher_list->CardNumber->headerCellClass() ?>"><div id="elh_view_billing_voucher_voucher_CardNumber" class="view_billing_voucher_voucher_CardNumber"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->CardNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CardNumber" class="<?php echo $view_billing_voucher_voucher_list->CardNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->CardNumber) ?>', 1);"><div id="elh_view_billing_voucher_voucher_CardNumber" class="view_billing_voucher_voucher_CardNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->CardNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_voucher_list->CardNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_voucher_list->CardNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_voucher_list->BankName->Visible) { // BankName ?>
	<?php if ($view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->BankName) == "") { ?>
		<th data-name="BankName" class="<?php echo $view_billing_voucher_voucher_list->BankName->headerCellClass() ?>"><div id="elh_view_billing_voucher_voucher_BankName" class="view_billing_voucher_voucher_BankName"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->BankName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BankName" class="<?php echo $view_billing_voucher_voucher_list->BankName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->BankName) ?>', 1);"><div id="elh_view_billing_voucher_voucher_BankName" class="view_billing_voucher_voucher_BankName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->BankName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_voucher_list->BankName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_voucher_list->BankName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_voucher_list->DrID->Visible) { // DrID ?>
	<?php if ($view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->DrID) == "") { ?>
		<th data-name="DrID" class="<?php echo $view_billing_voucher_voucher_list->DrID->headerCellClass() ?>"><div id="elh_view_billing_voucher_voucher_DrID" class="view_billing_voucher_voucher_DrID"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->DrID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DrID" class="<?php echo $view_billing_voucher_voucher_list->DrID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->DrID) ?>', 1);"><div id="elh_view_billing_voucher_voucher_DrID" class="view_billing_voucher_voucher_DrID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->DrID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_voucher_list->DrID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_voucher_list->DrID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_voucher_list->BillStatus->Visible) { // BillStatus ?>
	<?php if ($view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->BillStatus) == "") { ?>
		<th data-name="BillStatus" class="<?php echo $view_billing_voucher_voucher_list->BillStatus->headerCellClass() ?>"><div id="elh_view_billing_voucher_voucher_BillStatus" class="view_billing_voucher_voucher_BillStatus"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->BillStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillStatus" class="<?php echo $view_billing_voucher_voucher_list->BillStatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->BillStatus) ?>', 1);"><div id="elh_view_billing_voucher_voucher_BillStatus" class="view_billing_voucher_voucher_BillStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->BillStatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_voucher_list->BillStatus->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_voucher_list->BillStatus->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_voucher_list->ReportHeader->Visible) { // ReportHeader ?>
	<?php if ($view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->ReportHeader) == "") { ?>
		<th data-name="ReportHeader" class="<?php echo $view_billing_voucher_voucher_list->ReportHeader->headerCellClass() ?>"><div id="elh_view_billing_voucher_voucher_ReportHeader" class="view_billing_voucher_voucher_ReportHeader"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->ReportHeader->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReportHeader" class="<?php echo $view_billing_voucher_voucher_list->ReportHeader->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->ReportHeader) ?>', 1);"><div id="elh_view_billing_voucher_voucher_ReportHeader" class="view_billing_voucher_voucher_ReportHeader">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->ReportHeader->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_voucher_list->ReportHeader->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_voucher_list->ReportHeader->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_voucher_list->UserName->Visible) { // UserName ?>
	<?php if ($view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->UserName) == "") { ?>
		<th data-name="UserName" class="<?php echo $view_billing_voucher_voucher_list->UserName->headerCellClass() ?>"><div id="elh_view_billing_voucher_voucher_UserName" class="view_billing_voucher_voucher_UserName"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->UserName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UserName" class="<?php echo $view_billing_voucher_voucher_list->UserName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->UserName) ?>', 1);"><div id="elh_view_billing_voucher_voucher_UserName" class="view_billing_voucher_voucher_UserName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->UserName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_voucher_list->UserName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_voucher_list->UserName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_voucher_list->AdjustmentAdvance->Visible) { // AdjustmentAdvance ?>
	<?php if ($view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->AdjustmentAdvance) == "") { ?>
		<th data-name="AdjustmentAdvance" class="<?php echo $view_billing_voucher_voucher_list->AdjustmentAdvance->headerCellClass() ?>"><div id="elh_view_billing_voucher_voucher_AdjustmentAdvance" class="view_billing_voucher_voucher_AdjustmentAdvance"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->AdjustmentAdvance->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AdjustmentAdvance" class="<?php echo $view_billing_voucher_voucher_list->AdjustmentAdvance->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->AdjustmentAdvance) ?>', 1);"><div id="elh_view_billing_voucher_voucher_AdjustmentAdvance" class="view_billing_voucher_voucher_AdjustmentAdvance">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->AdjustmentAdvance->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_voucher_list->AdjustmentAdvance->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_voucher_list->AdjustmentAdvance->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_voucher_list->billing_vouchercol->Visible) { // billing_vouchercol ?>
	<?php if ($view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->billing_vouchercol) == "") { ?>
		<th data-name="billing_vouchercol" class="<?php echo $view_billing_voucher_voucher_list->billing_vouchercol->headerCellClass() ?>"><div id="elh_view_billing_voucher_voucher_billing_vouchercol" class="view_billing_voucher_voucher_billing_vouchercol"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->billing_vouchercol->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="billing_vouchercol" class="<?php echo $view_billing_voucher_voucher_list->billing_vouchercol->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->billing_vouchercol) ?>', 1);"><div id="elh_view_billing_voucher_voucher_billing_vouchercol" class="view_billing_voucher_voucher_billing_vouchercol">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->billing_vouchercol->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_voucher_list->billing_vouchercol->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_voucher_list->billing_vouchercol->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_voucher_list->BillType->Visible) { // BillType ?>
	<?php if ($view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->BillType) == "") { ?>
		<th data-name="BillType" class="<?php echo $view_billing_voucher_voucher_list->BillType->headerCellClass() ?>"><div id="elh_view_billing_voucher_voucher_BillType" class="view_billing_voucher_voucher_BillType"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->BillType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillType" class="<?php echo $view_billing_voucher_voucher_list->BillType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->BillType) ?>', 1);"><div id="elh_view_billing_voucher_voucher_BillType" class="view_billing_voucher_voucher_BillType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->BillType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_voucher_list->BillType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_voucher_list->BillType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_voucher_list->ProcedureName->Visible) { // ProcedureName ?>
	<?php if ($view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->ProcedureName) == "") { ?>
		<th data-name="ProcedureName" class="<?php echo $view_billing_voucher_voucher_list->ProcedureName->headerCellClass() ?>"><div id="elh_view_billing_voucher_voucher_ProcedureName" class="view_billing_voucher_voucher_ProcedureName"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->ProcedureName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProcedureName" class="<?php echo $view_billing_voucher_voucher_list->ProcedureName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->ProcedureName) ?>', 1);"><div id="elh_view_billing_voucher_voucher_ProcedureName" class="view_billing_voucher_voucher_ProcedureName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->ProcedureName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_voucher_list->ProcedureName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_voucher_list->ProcedureName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_voucher_list->ProcedureAmount->Visible) { // ProcedureAmount ?>
	<?php if ($view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->ProcedureAmount) == "") { ?>
		<th data-name="ProcedureAmount" class="<?php echo $view_billing_voucher_voucher_list->ProcedureAmount->headerCellClass() ?>"><div id="elh_view_billing_voucher_voucher_ProcedureAmount" class="view_billing_voucher_voucher_ProcedureAmount"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->ProcedureAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProcedureAmount" class="<?php echo $view_billing_voucher_voucher_list->ProcedureAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->ProcedureAmount) ?>', 1);"><div id="elh_view_billing_voucher_voucher_ProcedureAmount" class="view_billing_voucher_voucher_ProcedureAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->ProcedureAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_voucher_list->ProcedureAmount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_voucher_list->ProcedureAmount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_voucher_list->IncludePackage->Visible) { // IncludePackage ?>
	<?php if ($view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->IncludePackage) == "") { ?>
		<th data-name="IncludePackage" class="<?php echo $view_billing_voucher_voucher_list->IncludePackage->headerCellClass() ?>"><div id="elh_view_billing_voucher_voucher_IncludePackage" class="view_billing_voucher_voucher_IncludePackage"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->IncludePackage->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IncludePackage" class="<?php echo $view_billing_voucher_voucher_list->IncludePackage->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->IncludePackage) ?>', 1);"><div id="elh_view_billing_voucher_voucher_IncludePackage" class="view_billing_voucher_voucher_IncludePackage">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->IncludePackage->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_voucher_list->IncludePackage->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_voucher_list->IncludePackage->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_voucher_list->CancelBill->Visible) { // CancelBill ?>
	<?php if ($view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->CancelBill) == "") { ?>
		<th data-name="CancelBill" class="<?php echo $view_billing_voucher_voucher_list->CancelBill->headerCellClass() ?>"><div id="elh_view_billing_voucher_voucher_CancelBill" class="view_billing_voucher_voucher_CancelBill"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->CancelBill->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CancelBill" class="<?php echo $view_billing_voucher_voucher_list->CancelBill->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->CancelBill) ?>', 1);"><div id="elh_view_billing_voucher_voucher_CancelBill" class="view_billing_voucher_voucher_CancelBill">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->CancelBill->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_voucher_list->CancelBill->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_voucher_list->CancelBill->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_voucher_list->CancelModeOfPayment->Visible) { // CancelModeOfPayment ?>
	<?php if ($view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->CancelModeOfPayment) == "") { ?>
		<th data-name="CancelModeOfPayment" class="<?php echo $view_billing_voucher_voucher_list->CancelModeOfPayment->headerCellClass() ?>"><div id="elh_view_billing_voucher_voucher_CancelModeOfPayment" class="view_billing_voucher_voucher_CancelModeOfPayment"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->CancelModeOfPayment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CancelModeOfPayment" class="<?php echo $view_billing_voucher_voucher_list->CancelModeOfPayment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->CancelModeOfPayment) ?>', 1);"><div id="elh_view_billing_voucher_voucher_CancelModeOfPayment" class="view_billing_voucher_voucher_CancelModeOfPayment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->CancelModeOfPayment->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_voucher_list->CancelModeOfPayment->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_voucher_list->CancelModeOfPayment->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_voucher_list->CancelAmount->Visible) { // CancelAmount ?>
	<?php if ($view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->CancelAmount) == "") { ?>
		<th data-name="CancelAmount" class="<?php echo $view_billing_voucher_voucher_list->CancelAmount->headerCellClass() ?>"><div id="elh_view_billing_voucher_voucher_CancelAmount" class="view_billing_voucher_voucher_CancelAmount"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->CancelAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CancelAmount" class="<?php echo $view_billing_voucher_voucher_list->CancelAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->CancelAmount) ?>', 1);"><div id="elh_view_billing_voucher_voucher_CancelAmount" class="view_billing_voucher_voucher_CancelAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->CancelAmount->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_voucher_list->CancelAmount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_voucher_list->CancelAmount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_voucher_list->CancelBankName->Visible) { // CancelBankName ?>
	<?php if ($view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->CancelBankName) == "") { ?>
		<th data-name="CancelBankName" class="<?php echo $view_billing_voucher_voucher_list->CancelBankName->headerCellClass() ?>"><div id="elh_view_billing_voucher_voucher_CancelBankName" class="view_billing_voucher_voucher_CancelBankName"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->CancelBankName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CancelBankName" class="<?php echo $view_billing_voucher_voucher_list->CancelBankName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->CancelBankName) ?>', 1);"><div id="elh_view_billing_voucher_voucher_CancelBankName" class="view_billing_voucher_voucher_CancelBankName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->CancelBankName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_voucher_list->CancelBankName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_voucher_list->CancelBankName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_voucher_list->CancelTransactionNumber->Visible) { // CancelTransactionNumber ?>
	<?php if ($view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->CancelTransactionNumber) == "") { ?>
		<th data-name="CancelTransactionNumber" class="<?php echo $view_billing_voucher_voucher_list->CancelTransactionNumber->headerCellClass() ?>"><div id="elh_view_billing_voucher_voucher_CancelTransactionNumber" class="view_billing_voucher_voucher_CancelTransactionNumber"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->CancelTransactionNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CancelTransactionNumber" class="<?php echo $view_billing_voucher_voucher_list->CancelTransactionNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->CancelTransactionNumber) ?>', 1);"><div id="elh_view_billing_voucher_voucher_CancelTransactionNumber" class="view_billing_voucher_voucher_CancelTransactionNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->CancelTransactionNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_voucher_list->CancelTransactionNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_voucher_list->CancelTransactionNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_voucher_list->LabTest->Visible) { // LabTest ?>
	<?php if ($view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->LabTest) == "") { ?>
		<th data-name="LabTest" class="<?php echo $view_billing_voucher_voucher_list->LabTest->headerCellClass() ?>"><div id="elh_view_billing_voucher_voucher_LabTest" class="view_billing_voucher_voucher_LabTest"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->LabTest->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LabTest" class="<?php echo $view_billing_voucher_voucher_list->LabTest->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->LabTest) ?>', 1);"><div id="elh_view_billing_voucher_voucher_LabTest" class="view_billing_voucher_voucher_LabTest">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->LabTest->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_voucher_list->LabTest->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_voucher_list->LabTest->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_voucher_list->sid->Visible) { // sid ?>
	<?php if ($view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->sid) == "") { ?>
		<th data-name="sid" class="<?php echo $view_billing_voucher_voucher_list->sid->headerCellClass() ?>"><div id="elh_view_billing_voucher_voucher_sid" class="view_billing_voucher_voucher_sid"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->sid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sid" class="<?php echo $view_billing_voucher_voucher_list->sid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->sid) ?>', 1);"><div id="elh_view_billing_voucher_voucher_sid" class="view_billing_voucher_voucher_sid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->sid->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_voucher_list->sid->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_voucher_list->sid->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_voucher_list->SidNo->Visible) { // SidNo ?>
	<?php if ($view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->SidNo) == "") { ?>
		<th data-name="SidNo" class="<?php echo $view_billing_voucher_voucher_list->SidNo->headerCellClass() ?>"><div id="elh_view_billing_voucher_voucher_SidNo" class="view_billing_voucher_voucher_SidNo"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->SidNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SidNo" class="<?php echo $view_billing_voucher_voucher_list->SidNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->SidNo) ?>', 1);"><div id="elh_view_billing_voucher_voucher_SidNo" class="view_billing_voucher_voucher_SidNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->SidNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_voucher_list->SidNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_voucher_list->SidNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_voucher_list->createdDatettime->Visible) { // createdDatettime ?>
	<?php if ($view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->createdDatettime) == "") { ?>
		<th data-name="createdDatettime" class="<?php echo $view_billing_voucher_voucher_list->createdDatettime->headerCellClass() ?>"><div id="elh_view_billing_voucher_voucher_createdDatettime" class="view_billing_voucher_voucher_createdDatettime"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->createdDatettime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdDatettime" class="<?php echo $view_billing_voucher_voucher_list->createdDatettime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->createdDatettime) ?>', 1);"><div id="elh_view_billing_voucher_voucher_createdDatettime" class="view_billing_voucher_voucher_createdDatettime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->createdDatettime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_voucher_list->createdDatettime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_voucher_list->createdDatettime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_voucher_list->LabTestReleased->Visible) { // LabTestReleased ?>
	<?php if ($view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->LabTestReleased) == "") { ?>
		<th data-name="LabTestReleased" class="<?php echo $view_billing_voucher_voucher_list->LabTestReleased->headerCellClass() ?>"><div id="elh_view_billing_voucher_voucher_LabTestReleased" class="view_billing_voucher_voucher_LabTestReleased"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->LabTestReleased->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LabTestReleased" class="<?php echo $view_billing_voucher_voucher_list->LabTestReleased->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->LabTestReleased) ?>', 1);"><div id="elh_view_billing_voucher_voucher_LabTestReleased" class="view_billing_voucher_voucher_LabTestReleased">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->LabTestReleased->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_voucher_list->LabTestReleased->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_voucher_list->LabTestReleased->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_billing_voucher_voucher_list->GoogleReviewID->Visible) { // GoogleReviewID ?>
	<?php if ($view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->GoogleReviewID) == "") { ?>
		<th data-name="GoogleReviewID" class="<?php echo $view_billing_voucher_voucher_list->GoogleReviewID->headerCellClass() ?>"><div id="elh_view_billing_voucher_voucher_GoogleReviewID" class="view_billing_voucher_voucher_GoogleReviewID"><div class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->GoogleReviewID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GoogleReviewID" class="<?php echo $view_billing_voucher_voucher_list->GoogleReviewID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_billing_voucher_voucher_list->SortUrl($view_billing_voucher_voucher_list->GoogleReviewID) ?>', 1);"><div id="elh_view_billing_voucher_voucher_GoogleReviewID" class="view_billing_voucher_voucher_GoogleReviewID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_billing_voucher_voucher_list->GoogleReviewID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_billing_voucher_voucher_list->GoogleReviewID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_billing_voucher_voucher_list->GoogleReviewID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_billing_voucher_voucher_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_billing_voucher_voucher_list->ExportAll && $view_billing_voucher_voucher_list->isExport()) {
	$view_billing_voucher_voucher_list->StopRecord = $view_billing_voucher_voucher_list->TotalRecords;
} else {

	// Set the last record to display
	if ($view_billing_voucher_voucher_list->TotalRecords > $view_billing_voucher_voucher_list->StartRecord + $view_billing_voucher_voucher_list->DisplayRecords - 1)
		$view_billing_voucher_voucher_list->StopRecord = $view_billing_voucher_voucher_list->StartRecord + $view_billing_voucher_voucher_list->DisplayRecords - 1;
	else
		$view_billing_voucher_voucher_list->StopRecord = $view_billing_voucher_voucher_list->TotalRecords;
}
$view_billing_voucher_voucher_list->RecordCount = $view_billing_voucher_voucher_list->StartRecord - 1;
if ($view_billing_voucher_voucher_list->Recordset && !$view_billing_voucher_voucher_list->Recordset->EOF) {
	$view_billing_voucher_voucher_list->Recordset->moveFirst();
	$selectLimit = $view_billing_voucher_voucher_list->UseSelectLimit;
	if (!$selectLimit && $view_billing_voucher_voucher_list->StartRecord > 1)
		$view_billing_voucher_voucher_list->Recordset->move($view_billing_voucher_voucher_list->StartRecord - 1);
} elseif (!$view_billing_voucher_voucher->AllowAddDeleteRow && $view_billing_voucher_voucher_list->StopRecord == 0) {
	$view_billing_voucher_voucher_list->StopRecord = $view_billing_voucher_voucher->GridAddRowCount;
}

// Initialize aggregate
$view_billing_voucher_voucher->RowType = ROWTYPE_AGGREGATEINIT;
$view_billing_voucher_voucher->resetAttributes();
$view_billing_voucher_voucher_list->renderRow();
while ($view_billing_voucher_voucher_list->RecordCount < $view_billing_voucher_voucher_list->StopRecord) {
	$view_billing_voucher_voucher_list->RecordCount++;
	if ($view_billing_voucher_voucher_list->RecordCount >= $view_billing_voucher_voucher_list->StartRecord) {
		$view_billing_voucher_voucher_list->RowCount++;

		// Set up key count
		$view_billing_voucher_voucher_list->KeyCount = $view_billing_voucher_voucher_list->RowIndex;

		// Init row class and style
		$view_billing_voucher_voucher->resetAttributes();
		$view_billing_voucher_voucher->CssClass = "";
		if ($view_billing_voucher_voucher_list->isGridAdd()) {
		} else {
			$view_billing_voucher_voucher_list->loadRowValues($view_billing_voucher_voucher_list->Recordset); // Load row values
		}
		$view_billing_voucher_voucher->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_billing_voucher_voucher->RowAttrs->merge(["data-rowindex" => $view_billing_voucher_voucher_list->RowCount, "id" => "r" . $view_billing_voucher_voucher_list->RowCount . "_view_billing_voucher_voucher", "data-rowtype" => $view_billing_voucher_voucher->RowType]);

		// Render row
		$view_billing_voucher_voucher_list->renderRow();

		// Render list options
		$view_billing_voucher_voucher_list->renderListOptions();
?>
	<tr <?php echo $view_billing_voucher_voucher->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_billing_voucher_voucher_list->ListOptions->render("body", "left", $view_billing_voucher_voucher_list->RowCount);
?>
	<?php if ($view_billing_voucher_voucher_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $view_billing_voucher_voucher_list->id->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_voucher_list->RowCount ?>_view_billing_voucher_voucher_id">
<span<?php echo $view_billing_voucher_voucher_list->id->viewAttributes() ?>><?php echo $view_billing_voucher_voucher_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_voucher_list->Reception->Visible) { // Reception ?>
		<td data-name="Reception" <?php echo $view_billing_voucher_voucher_list->Reception->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_voucher_list->RowCount ?>_view_billing_voucher_voucher_Reception">
<span<?php echo $view_billing_voucher_voucher_list->Reception->viewAttributes() ?>><?php echo $view_billing_voucher_voucher_list->Reception->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_voucher_list->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId" <?php echo $view_billing_voucher_voucher_list->PatientId->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_voucher_list->RowCount ?>_view_billing_voucher_voucher_PatientId">
<span<?php echo $view_billing_voucher_voucher_list->PatientId->viewAttributes() ?>><?php echo $view_billing_voucher_voucher_list->PatientId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_voucher_list->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno" <?php echo $view_billing_voucher_voucher_list->mrnno->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_voucher_list->RowCount ?>_view_billing_voucher_voucher_mrnno">
<span<?php echo $view_billing_voucher_voucher_list->mrnno->viewAttributes() ?>><?php echo $view_billing_voucher_voucher_list->mrnno->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_voucher_list->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName" <?php echo $view_billing_voucher_voucher_list->PatientName->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_voucher_list->RowCount ?>_view_billing_voucher_voucher_PatientName">
<span<?php echo $view_billing_voucher_voucher_list->PatientName->viewAttributes() ?>><?php echo $view_billing_voucher_voucher_list->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_voucher_list->Age->Visible) { // Age ?>
		<td data-name="Age" <?php echo $view_billing_voucher_voucher_list->Age->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_voucher_list->RowCount ?>_view_billing_voucher_voucher_Age">
<span<?php echo $view_billing_voucher_voucher_list->Age->viewAttributes() ?>><?php echo $view_billing_voucher_voucher_list->Age->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_voucher_list->Gender->Visible) { // Gender ?>
		<td data-name="Gender" <?php echo $view_billing_voucher_voucher_list->Gender->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_voucher_list->RowCount ?>_view_billing_voucher_voucher_Gender">
<span<?php echo $view_billing_voucher_voucher_list->Gender->viewAttributes() ?>><?php echo $view_billing_voucher_voucher_list->Gender->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_voucher_list->Amount->Visible) { // Amount ?>
		<td data-name="Amount" <?php echo $view_billing_voucher_voucher_list->Amount->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_voucher_list->RowCount ?>_view_billing_voucher_voucher_Amount">
<span<?php echo $view_billing_voucher_voucher_list->Amount->viewAttributes() ?>><?php echo $view_billing_voucher_voucher_list->Amount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_voucher_list->Mobile->Visible) { // Mobile ?>
		<td data-name="Mobile" <?php echo $view_billing_voucher_voucher_list->Mobile->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_voucher_list->RowCount ?>_view_billing_voucher_voucher_Mobile">
<span<?php echo $view_billing_voucher_voucher_list->Mobile->viewAttributes() ?>><?php echo $view_billing_voucher_voucher_list->Mobile->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_voucher_list->Doctor->Visible) { // Doctor ?>
		<td data-name="Doctor" <?php echo $view_billing_voucher_voucher_list->Doctor->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_voucher_list->RowCount ?>_view_billing_voucher_voucher_Doctor">
<span<?php echo $view_billing_voucher_voucher_list->Doctor->viewAttributes() ?>><?php echo $view_billing_voucher_voucher_list->Doctor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_voucher_list->Details->Visible) { // Details ?>
		<td data-name="Details" <?php echo $view_billing_voucher_voucher_list->Details->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_voucher_list->RowCount ?>_view_billing_voucher_voucher_Details">
<span<?php echo $view_billing_voucher_voucher_list->Details->viewAttributes() ?>><?php echo $view_billing_voucher_voucher_list->Details->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_voucher_list->ModeofPayment->Visible) { // ModeofPayment ?>
		<td data-name="ModeofPayment" <?php echo $view_billing_voucher_voucher_list->ModeofPayment->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_voucher_list->RowCount ?>_view_billing_voucher_voucher_ModeofPayment">
<span<?php echo $view_billing_voucher_voucher_list->ModeofPayment->viewAttributes() ?>><?php echo $view_billing_voucher_voucher_list->ModeofPayment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_voucher_list->AnyDues->Visible) { // AnyDues ?>
		<td data-name="AnyDues" <?php echo $view_billing_voucher_voucher_list->AnyDues->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_voucher_list->RowCount ?>_view_billing_voucher_voucher_AnyDues">
<span<?php echo $view_billing_voucher_voucher_list->AnyDues->viewAttributes() ?>><?php echo $view_billing_voucher_voucher_list->AnyDues->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_voucher_list->createdby->Visible) { // createdby ?>
		<td data-name="createdby" <?php echo $view_billing_voucher_voucher_list->createdby->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_voucher_list->RowCount ?>_view_billing_voucher_voucher_createdby">
<span<?php echo $view_billing_voucher_voucher_list->createdby->viewAttributes() ?>><?php echo $view_billing_voucher_voucher_list->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_voucher_list->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" <?php echo $view_billing_voucher_voucher_list->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_voucher_list->RowCount ?>_view_billing_voucher_voucher_createddatetime">
<span<?php echo $view_billing_voucher_voucher_list->createddatetime->viewAttributes() ?>><?php echo $view_billing_voucher_voucher_list->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_voucher_list->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby" <?php echo $view_billing_voucher_voucher_list->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_voucher_list->RowCount ?>_view_billing_voucher_voucher_modifiedby">
<span<?php echo $view_billing_voucher_voucher_list->modifiedby->viewAttributes() ?>><?php echo $view_billing_voucher_voucher_list->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_voucher_list->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime" <?php echo $view_billing_voucher_voucher_list->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_voucher_list->RowCount ?>_view_billing_voucher_voucher_modifieddatetime">
<span<?php echo $view_billing_voucher_voucher_list->modifieddatetime->viewAttributes() ?>><?php echo $view_billing_voucher_voucher_list->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_voucher_list->RealizationAmount->Visible) { // RealizationAmount ?>
		<td data-name="RealizationAmount" <?php echo $view_billing_voucher_voucher_list->RealizationAmount->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_voucher_list->RowCount ?>_view_billing_voucher_voucher_RealizationAmount">
<span<?php echo $view_billing_voucher_voucher_list->RealizationAmount->viewAttributes() ?>><?php echo $view_billing_voucher_voucher_list->RealizationAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_voucher_list->RealizationStatus->Visible) { // RealizationStatus ?>
		<td data-name="RealizationStatus" <?php echo $view_billing_voucher_voucher_list->RealizationStatus->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_voucher_list->RowCount ?>_view_billing_voucher_voucher_RealizationStatus">
<span<?php echo $view_billing_voucher_voucher_list->RealizationStatus->viewAttributes() ?>><?php echo $view_billing_voucher_voucher_list->RealizationStatus->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_voucher_list->RealizationRemarks->Visible) { // RealizationRemarks ?>
		<td data-name="RealizationRemarks" <?php echo $view_billing_voucher_voucher_list->RealizationRemarks->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_voucher_list->RowCount ?>_view_billing_voucher_voucher_RealizationRemarks">
<span<?php echo $view_billing_voucher_voucher_list->RealizationRemarks->viewAttributes() ?>><?php echo $view_billing_voucher_voucher_list->RealizationRemarks->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_voucher_list->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
		<td data-name="RealizationBatchNo" <?php echo $view_billing_voucher_voucher_list->RealizationBatchNo->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_voucher_list->RowCount ?>_view_billing_voucher_voucher_RealizationBatchNo">
<span<?php echo $view_billing_voucher_voucher_list->RealizationBatchNo->viewAttributes() ?>><?php echo $view_billing_voucher_voucher_list->RealizationBatchNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_voucher_list->RealizationDate->Visible) { // RealizationDate ?>
		<td data-name="RealizationDate" <?php echo $view_billing_voucher_voucher_list->RealizationDate->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_voucher_list->RowCount ?>_view_billing_voucher_voucher_RealizationDate">
<span<?php echo $view_billing_voucher_voucher_list->RealizationDate->viewAttributes() ?>><?php echo $view_billing_voucher_voucher_list->RealizationDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_voucher_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $view_billing_voucher_voucher_list->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_voucher_list->RowCount ?>_view_billing_voucher_voucher_HospID">
<span<?php echo $view_billing_voucher_voucher_list->HospID->viewAttributes() ?>><?php echo $view_billing_voucher_voucher_list->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_voucher_list->RIDNO->Visible) { // RIDNO ?>
		<td data-name="RIDNO" <?php echo $view_billing_voucher_voucher_list->RIDNO->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_voucher_list->RowCount ?>_view_billing_voucher_voucher_RIDNO">
<span<?php echo $view_billing_voucher_voucher_list->RIDNO->viewAttributes() ?>><?php echo $view_billing_voucher_voucher_list->RIDNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_voucher_list->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo" <?php echo $view_billing_voucher_voucher_list->TidNo->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_voucher_list->RowCount ?>_view_billing_voucher_voucher_TidNo">
<span<?php echo $view_billing_voucher_voucher_list->TidNo->viewAttributes() ?>><?php echo $view_billing_voucher_voucher_list->TidNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_voucher_list->CId->Visible) { // CId ?>
		<td data-name="CId" <?php echo $view_billing_voucher_voucher_list->CId->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_voucher_list->RowCount ?>_view_billing_voucher_voucher_CId">
<span<?php echo $view_billing_voucher_voucher_list->CId->viewAttributes() ?>><?php echo $view_billing_voucher_voucher_list->CId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_voucher_list->PartnerName->Visible) { // PartnerName ?>
		<td data-name="PartnerName" <?php echo $view_billing_voucher_voucher_list->PartnerName->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_voucher_list->RowCount ?>_view_billing_voucher_voucher_PartnerName">
<span<?php echo $view_billing_voucher_voucher_list->PartnerName->viewAttributes() ?>><?php echo $view_billing_voucher_voucher_list->PartnerName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_voucher_list->PayerType->Visible) { // PayerType ?>
		<td data-name="PayerType" <?php echo $view_billing_voucher_voucher_list->PayerType->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_voucher_list->RowCount ?>_view_billing_voucher_voucher_PayerType">
<span<?php echo $view_billing_voucher_voucher_list->PayerType->viewAttributes() ?>><?php echo $view_billing_voucher_voucher_list->PayerType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_voucher_list->Dob->Visible) { // Dob ?>
		<td data-name="Dob" <?php echo $view_billing_voucher_voucher_list->Dob->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_voucher_list->RowCount ?>_view_billing_voucher_voucher_Dob">
<span<?php echo $view_billing_voucher_voucher_list->Dob->viewAttributes() ?>><?php echo $view_billing_voucher_voucher_list->Dob->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_voucher_list->Currency->Visible) { // Currency ?>
		<td data-name="Currency" <?php echo $view_billing_voucher_voucher_list->Currency->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_voucher_list->RowCount ?>_view_billing_voucher_voucher_Currency">
<span<?php echo $view_billing_voucher_voucher_list->Currency->viewAttributes() ?>><?php echo $view_billing_voucher_voucher_list->Currency->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_voucher_list->DiscountRemarks->Visible) { // DiscountRemarks ?>
		<td data-name="DiscountRemarks" <?php echo $view_billing_voucher_voucher_list->DiscountRemarks->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_voucher_list->RowCount ?>_view_billing_voucher_voucher_DiscountRemarks">
<span<?php echo $view_billing_voucher_voucher_list->DiscountRemarks->viewAttributes() ?>><?php echo $view_billing_voucher_voucher_list->DiscountRemarks->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_voucher_list->PatId->Visible) { // PatId ?>
		<td data-name="PatId" <?php echo $view_billing_voucher_voucher_list->PatId->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_voucher_list->RowCount ?>_view_billing_voucher_voucher_PatId">
<span<?php echo $view_billing_voucher_voucher_list->PatId->viewAttributes() ?>><?php echo $view_billing_voucher_voucher_list->PatId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_voucher_list->DrDepartment->Visible) { // DrDepartment ?>
		<td data-name="DrDepartment" <?php echo $view_billing_voucher_voucher_list->DrDepartment->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_voucher_list->RowCount ?>_view_billing_voucher_voucher_DrDepartment">
<span<?php echo $view_billing_voucher_voucher_list->DrDepartment->viewAttributes() ?>><?php echo $view_billing_voucher_voucher_list->DrDepartment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_voucher_list->RefferedBy->Visible) { // RefferedBy ?>
		<td data-name="RefferedBy" <?php echo $view_billing_voucher_voucher_list->RefferedBy->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_voucher_list->RowCount ?>_view_billing_voucher_voucher_RefferedBy">
<span<?php echo $view_billing_voucher_voucher_list->RefferedBy->viewAttributes() ?>><?php echo $view_billing_voucher_voucher_list->RefferedBy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_voucher_list->BillNumber->Visible) { // BillNumber ?>
		<td data-name="BillNumber" <?php echo $view_billing_voucher_voucher_list->BillNumber->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_voucher_list->RowCount ?>_view_billing_voucher_voucher_BillNumber">
<span<?php echo $view_billing_voucher_voucher_list->BillNumber->viewAttributes() ?>><?php echo $view_billing_voucher_voucher_list->BillNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_voucher_list->CardNumber->Visible) { // CardNumber ?>
		<td data-name="CardNumber" <?php echo $view_billing_voucher_voucher_list->CardNumber->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_voucher_list->RowCount ?>_view_billing_voucher_voucher_CardNumber">
<span<?php echo $view_billing_voucher_voucher_list->CardNumber->viewAttributes() ?>><?php echo $view_billing_voucher_voucher_list->CardNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_voucher_list->BankName->Visible) { // BankName ?>
		<td data-name="BankName" <?php echo $view_billing_voucher_voucher_list->BankName->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_voucher_list->RowCount ?>_view_billing_voucher_voucher_BankName">
<span<?php echo $view_billing_voucher_voucher_list->BankName->viewAttributes() ?>><?php echo $view_billing_voucher_voucher_list->BankName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_voucher_list->DrID->Visible) { // DrID ?>
		<td data-name="DrID" <?php echo $view_billing_voucher_voucher_list->DrID->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_voucher_list->RowCount ?>_view_billing_voucher_voucher_DrID">
<span<?php echo $view_billing_voucher_voucher_list->DrID->viewAttributes() ?>><?php echo $view_billing_voucher_voucher_list->DrID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_voucher_list->BillStatus->Visible) { // BillStatus ?>
		<td data-name="BillStatus" <?php echo $view_billing_voucher_voucher_list->BillStatus->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_voucher_list->RowCount ?>_view_billing_voucher_voucher_BillStatus">
<span<?php echo $view_billing_voucher_voucher_list->BillStatus->viewAttributes() ?>><?php echo $view_billing_voucher_voucher_list->BillStatus->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_voucher_list->ReportHeader->Visible) { // ReportHeader ?>
		<td data-name="ReportHeader" <?php echo $view_billing_voucher_voucher_list->ReportHeader->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_voucher_list->RowCount ?>_view_billing_voucher_voucher_ReportHeader">
<span<?php echo $view_billing_voucher_voucher_list->ReportHeader->viewAttributes() ?>><?php echo $view_billing_voucher_voucher_list->ReportHeader->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_voucher_list->UserName->Visible) { // UserName ?>
		<td data-name="UserName" <?php echo $view_billing_voucher_voucher_list->UserName->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_voucher_list->RowCount ?>_view_billing_voucher_voucher_UserName">
<span<?php echo $view_billing_voucher_voucher_list->UserName->viewAttributes() ?>><?php echo $view_billing_voucher_voucher_list->UserName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_voucher_list->AdjustmentAdvance->Visible) { // AdjustmentAdvance ?>
		<td data-name="AdjustmentAdvance" <?php echo $view_billing_voucher_voucher_list->AdjustmentAdvance->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_voucher_list->RowCount ?>_view_billing_voucher_voucher_AdjustmentAdvance">
<span<?php echo $view_billing_voucher_voucher_list->AdjustmentAdvance->viewAttributes() ?>><?php echo $view_billing_voucher_voucher_list->AdjustmentAdvance->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_voucher_list->billing_vouchercol->Visible) { // billing_vouchercol ?>
		<td data-name="billing_vouchercol" <?php echo $view_billing_voucher_voucher_list->billing_vouchercol->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_voucher_list->RowCount ?>_view_billing_voucher_voucher_billing_vouchercol">
<span<?php echo $view_billing_voucher_voucher_list->billing_vouchercol->viewAttributes() ?>><?php echo $view_billing_voucher_voucher_list->billing_vouchercol->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_voucher_list->BillType->Visible) { // BillType ?>
		<td data-name="BillType" <?php echo $view_billing_voucher_voucher_list->BillType->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_voucher_list->RowCount ?>_view_billing_voucher_voucher_BillType">
<span<?php echo $view_billing_voucher_voucher_list->BillType->viewAttributes() ?>><?php echo $view_billing_voucher_voucher_list->BillType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_voucher_list->ProcedureName->Visible) { // ProcedureName ?>
		<td data-name="ProcedureName" <?php echo $view_billing_voucher_voucher_list->ProcedureName->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_voucher_list->RowCount ?>_view_billing_voucher_voucher_ProcedureName">
<span<?php echo $view_billing_voucher_voucher_list->ProcedureName->viewAttributes() ?>><?php echo $view_billing_voucher_voucher_list->ProcedureName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_voucher_list->ProcedureAmount->Visible) { // ProcedureAmount ?>
		<td data-name="ProcedureAmount" <?php echo $view_billing_voucher_voucher_list->ProcedureAmount->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_voucher_list->RowCount ?>_view_billing_voucher_voucher_ProcedureAmount">
<span<?php echo $view_billing_voucher_voucher_list->ProcedureAmount->viewAttributes() ?>><?php echo $view_billing_voucher_voucher_list->ProcedureAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_voucher_list->IncludePackage->Visible) { // IncludePackage ?>
		<td data-name="IncludePackage" <?php echo $view_billing_voucher_voucher_list->IncludePackage->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_voucher_list->RowCount ?>_view_billing_voucher_voucher_IncludePackage">
<span<?php echo $view_billing_voucher_voucher_list->IncludePackage->viewAttributes() ?>><?php echo $view_billing_voucher_voucher_list->IncludePackage->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_voucher_list->CancelBill->Visible) { // CancelBill ?>
		<td data-name="CancelBill" <?php echo $view_billing_voucher_voucher_list->CancelBill->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_voucher_list->RowCount ?>_view_billing_voucher_voucher_CancelBill">
<span<?php echo $view_billing_voucher_voucher_list->CancelBill->viewAttributes() ?>><?php echo $view_billing_voucher_voucher_list->CancelBill->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_voucher_list->CancelModeOfPayment->Visible) { // CancelModeOfPayment ?>
		<td data-name="CancelModeOfPayment" <?php echo $view_billing_voucher_voucher_list->CancelModeOfPayment->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_voucher_list->RowCount ?>_view_billing_voucher_voucher_CancelModeOfPayment">
<span<?php echo $view_billing_voucher_voucher_list->CancelModeOfPayment->viewAttributes() ?>><?php echo $view_billing_voucher_voucher_list->CancelModeOfPayment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_voucher_list->CancelAmount->Visible) { // CancelAmount ?>
		<td data-name="CancelAmount" <?php echo $view_billing_voucher_voucher_list->CancelAmount->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_voucher_list->RowCount ?>_view_billing_voucher_voucher_CancelAmount">
<span<?php echo $view_billing_voucher_voucher_list->CancelAmount->viewAttributes() ?>><?php echo $view_billing_voucher_voucher_list->CancelAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_voucher_list->CancelBankName->Visible) { // CancelBankName ?>
		<td data-name="CancelBankName" <?php echo $view_billing_voucher_voucher_list->CancelBankName->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_voucher_list->RowCount ?>_view_billing_voucher_voucher_CancelBankName">
<span<?php echo $view_billing_voucher_voucher_list->CancelBankName->viewAttributes() ?>><?php echo $view_billing_voucher_voucher_list->CancelBankName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_voucher_list->CancelTransactionNumber->Visible) { // CancelTransactionNumber ?>
		<td data-name="CancelTransactionNumber" <?php echo $view_billing_voucher_voucher_list->CancelTransactionNumber->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_voucher_list->RowCount ?>_view_billing_voucher_voucher_CancelTransactionNumber">
<span<?php echo $view_billing_voucher_voucher_list->CancelTransactionNumber->viewAttributes() ?>><?php echo $view_billing_voucher_voucher_list->CancelTransactionNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_voucher_list->LabTest->Visible) { // LabTest ?>
		<td data-name="LabTest" <?php echo $view_billing_voucher_voucher_list->LabTest->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_voucher_list->RowCount ?>_view_billing_voucher_voucher_LabTest">
<span<?php echo $view_billing_voucher_voucher_list->LabTest->viewAttributes() ?>><?php echo $view_billing_voucher_voucher_list->LabTest->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_voucher_list->sid->Visible) { // sid ?>
		<td data-name="sid" <?php echo $view_billing_voucher_voucher_list->sid->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_voucher_list->RowCount ?>_view_billing_voucher_voucher_sid">
<span<?php echo $view_billing_voucher_voucher_list->sid->viewAttributes() ?>><?php echo $view_billing_voucher_voucher_list->sid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_voucher_list->SidNo->Visible) { // SidNo ?>
		<td data-name="SidNo" <?php echo $view_billing_voucher_voucher_list->SidNo->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_voucher_list->RowCount ?>_view_billing_voucher_voucher_SidNo">
<span<?php echo $view_billing_voucher_voucher_list->SidNo->viewAttributes() ?>><?php echo $view_billing_voucher_voucher_list->SidNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_voucher_list->createdDatettime->Visible) { // createdDatettime ?>
		<td data-name="createdDatettime" <?php echo $view_billing_voucher_voucher_list->createdDatettime->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_voucher_list->RowCount ?>_view_billing_voucher_voucher_createdDatettime">
<span<?php echo $view_billing_voucher_voucher_list->createdDatettime->viewAttributes() ?>><?php echo $view_billing_voucher_voucher_list->createdDatettime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_voucher_list->LabTestReleased->Visible) { // LabTestReleased ?>
		<td data-name="LabTestReleased" <?php echo $view_billing_voucher_voucher_list->LabTestReleased->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_voucher_list->RowCount ?>_view_billing_voucher_voucher_LabTestReleased">
<span<?php echo $view_billing_voucher_voucher_list->LabTestReleased->viewAttributes() ?>><?php echo $view_billing_voucher_voucher_list->LabTestReleased->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_billing_voucher_voucher_list->GoogleReviewID->Visible) { // GoogleReviewID ?>
		<td data-name="GoogleReviewID" <?php echo $view_billing_voucher_voucher_list->GoogleReviewID->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_voucher_list->RowCount ?>_view_billing_voucher_voucher_GoogleReviewID">
<span<?php echo $view_billing_voucher_voucher_list->GoogleReviewID->viewAttributes() ?>><?php echo $view_billing_voucher_voucher_list->GoogleReviewID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_billing_voucher_voucher_list->ListOptions->render("body", "right", $view_billing_voucher_voucher_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$view_billing_voucher_voucher_list->isGridAdd())
		$view_billing_voucher_voucher_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$view_billing_voucher_voucher->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_billing_voucher_voucher_list->Recordset)
	$view_billing_voucher_voucher_list->Recordset->Close();
?>
<?php if (!$view_billing_voucher_voucher_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_billing_voucher_voucher_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_billing_voucher_voucher_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_billing_voucher_voucher_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_billing_voucher_voucher_list->TotalRecords == 0 && !$view_billing_voucher_voucher->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_billing_voucher_voucher_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_billing_voucher_voucher_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_billing_voucher_voucher_list->isExport()) { ?>
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
$view_billing_voucher_voucher_list->terminate();
?>