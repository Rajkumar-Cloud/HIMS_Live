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
$lab_test_master_list = new lab_test_master_list();

// Run the page
$lab_test_master_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_test_master_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$lab_test_master_list->isExport()) { ?>
<script>
var flab_test_masterlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	flab_test_masterlist = currentForm = new ew.Form("flab_test_masterlist", "list");
	flab_test_masterlist.formKeyCountName = '<?php echo $lab_test_master_list->FormKeyCountName ?>';
	loadjs.done("flab_test_masterlist");
});
var flab_test_masterlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	flab_test_masterlistsrch = currentSearchForm = new ew.Form("flab_test_masterlistsrch");

	// Dynamic selection lists
	// Filters

	flab_test_masterlistsrch.filterList = <?php echo $lab_test_master_list->getFilterList() ?>;
	loadjs.done("flab_test_masterlistsrch");
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
<?php if (!$lab_test_master_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($lab_test_master_list->TotalRecords > 0 && $lab_test_master_list->ExportOptions->visible()) { ?>
<?php $lab_test_master_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($lab_test_master_list->ImportOptions->visible()) { ?>
<?php $lab_test_master_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($lab_test_master_list->SearchOptions->visible()) { ?>
<?php $lab_test_master_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($lab_test_master_list->FilterOptions->visible()) { ?>
<?php $lab_test_master_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$lab_test_master_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$lab_test_master_list->isExport() && !$lab_test_master->CurrentAction) { ?>
<form name="flab_test_masterlistsrch" id="flab_test_masterlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="flab_test_masterlistsrch-search-panel" class="<?php echo $lab_test_master_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="lab_test_master">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $lab_test_master_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($lab_test_master_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($lab_test_master_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $lab_test_master_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($lab_test_master_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($lab_test_master_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($lab_test_master_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($lab_test_master_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $lab_test_master_list->showPageHeader(); ?>
<?php
$lab_test_master_list->showMessage();
?>
<?php if ($lab_test_master_list->TotalRecords > 0 || $lab_test_master->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($lab_test_master_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> lab_test_master">
<?php if (!$lab_test_master_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$lab_test_master_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $lab_test_master_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $lab_test_master_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="flab_test_masterlist" id="flab_test_masterlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_test_master">
<div id="gmp_lab_test_master" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($lab_test_master_list->TotalRecords > 0 || $lab_test_master_list->isGridEdit()) { ?>
<table id="tbl_lab_test_masterlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$lab_test_master->RowType = ROWTYPE_HEADER;

// Render list options
$lab_test_master_list->renderListOptions();

// Render list options (header, left)
$lab_test_master_list->ListOptions->render("header", "left");
?>
<?php if ($lab_test_master_list->id->Visible) { // id ?>
	<?php if ($lab_test_master_list->SortUrl($lab_test_master_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $lab_test_master_list->id->headerCellClass() ?>"><div id="elh_lab_test_master_id" class="lab_test_master_id"><div class="ew-table-header-caption"><?php echo $lab_test_master_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $lab_test_master_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_master_list->SortUrl($lab_test_master_list->id) ?>', 1);"><div id="elh_lab_test_master_id" class="lab_test_master_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_master_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master_list->MainDeptCd->Visible) { // MainDeptCd ?>
	<?php if ($lab_test_master_list->SortUrl($lab_test_master_list->MainDeptCd) == "") { ?>
		<th data-name="MainDeptCd" class="<?php echo $lab_test_master_list->MainDeptCd->headerCellClass() ?>"><div id="elh_lab_test_master_MainDeptCd" class="lab_test_master_MainDeptCd"><div class="ew-table-header-caption"><?php echo $lab_test_master_list->MainDeptCd->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MainDeptCd" class="<?php echo $lab_test_master_list->MainDeptCd->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_master_list->SortUrl($lab_test_master_list->MainDeptCd) ?>', 1);"><div id="elh_lab_test_master_MainDeptCd" class="lab_test_master_MainDeptCd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master_list->MainDeptCd->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master_list->MainDeptCd->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_master_list->MainDeptCd->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master_list->DeptCd->Visible) { // DeptCd ?>
	<?php if ($lab_test_master_list->SortUrl($lab_test_master_list->DeptCd) == "") { ?>
		<th data-name="DeptCd" class="<?php echo $lab_test_master_list->DeptCd->headerCellClass() ?>"><div id="elh_lab_test_master_DeptCd" class="lab_test_master_DeptCd"><div class="ew-table-header-caption"><?php echo $lab_test_master_list->DeptCd->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DeptCd" class="<?php echo $lab_test_master_list->DeptCd->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_master_list->SortUrl($lab_test_master_list->DeptCd) ?>', 1);"><div id="elh_lab_test_master_DeptCd" class="lab_test_master_DeptCd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master_list->DeptCd->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master_list->DeptCd->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_master_list->DeptCd->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master_list->TestCd->Visible) { // TestCd ?>
	<?php if ($lab_test_master_list->SortUrl($lab_test_master_list->TestCd) == "") { ?>
		<th data-name="TestCd" class="<?php echo $lab_test_master_list->TestCd->headerCellClass() ?>"><div id="elh_lab_test_master_TestCd" class="lab_test_master_TestCd"><div class="ew-table-header-caption"><?php echo $lab_test_master_list->TestCd->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestCd" class="<?php echo $lab_test_master_list->TestCd->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_master_list->SortUrl($lab_test_master_list->TestCd) ?>', 1);"><div id="elh_lab_test_master_TestCd" class="lab_test_master_TestCd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master_list->TestCd->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master_list->TestCd->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_master_list->TestCd->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master_list->TestSubCd->Visible) { // TestSubCd ?>
	<?php if ($lab_test_master_list->SortUrl($lab_test_master_list->TestSubCd) == "") { ?>
		<th data-name="TestSubCd" class="<?php echo $lab_test_master_list->TestSubCd->headerCellClass() ?>"><div id="elh_lab_test_master_TestSubCd" class="lab_test_master_TestSubCd"><div class="ew-table-header-caption"><?php echo $lab_test_master_list->TestSubCd->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestSubCd" class="<?php echo $lab_test_master_list->TestSubCd->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_master_list->SortUrl($lab_test_master_list->TestSubCd) ?>', 1);"><div id="elh_lab_test_master_TestSubCd" class="lab_test_master_TestSubCd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master_list->TestSubCd->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master_list->TestSubCd->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_master_list->TestSubCd->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master_list->TestName->Visible) { // TestName ?>
	<?php if ($lab_test_master_list->SortUrl($lab_test_master_list->TestName) == "") { ?>
		<th data-name="TestName" class="<?php echo $lab_test_master_list->TestName->headerCellClass() ?>"><div id="elh_lab_test_master_TestName" class="lab_test_master_TestName"><div class="ew-table-header-caption"><?php echo $lab_test_master_list->TestName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestName" class="<?php echo $lab_test_master_list->TestName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_master_list->SortUrl($lab_test_master_list->TestName) ?>', 1);"><div id="elh_lab_test_master_TestName" class="lab_test_master_TestName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master_list->TestName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master_list->TestName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_master_list->TestName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master_list->XrayPart->Visible) { // XrayPart ?>
	<?php if ($lab_test_master_list->SortUrl($lab_test_master_list->XrayPart) == "") { ?>
		<th data-name="XrayPart" class="<?php echo $lab_test_master_list->XrayPart->headerCellClass() ?>"><div id="elh_lab_test_master_XrayPart" class="lab_test_master_XrayPart"><div class="ew-table-header-caption"><?php echo $lab_test_master_list->XrayPart->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="XrayPart" class="<?php echo $lab_test_master_list->XrayPart->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_master_list->SortUrl($lab_test_master_list->XrayPart) ?>', 1);"><div id="elh_lab_test_master_XrayPart" class="lab_test_master_XrayPart">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master_list->XrayPart->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master_list->XrayPart->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_master_list->XrayPart->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master_list->Method->Visible) { // Method ?>
	<?php if ($lab_test_master_list->SortUrl($lab_test_master_list->Method) == "") { ?>
		<th data-name="Method" class="<?php echo $lab_test_master_list->Method->headerCellClass() ?>"><div id="elh_lab_test_master_Method" class="lab_test_master_Method"><div class="ew-table-header-caption"><?php echo $lab_test_master_list->Method->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Method" class="<?php echo $lab_test_master_list->Method->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_master_list->SortUrl($lab_test_master_list->Method) ?>', 1);"><div id="elh_lab_test_master_Method" class="lab_test_master_Method">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master_list->Method->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master_list->Method->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_master_list->Method->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master_list->Order->Visible) { // Order ?>
	<?php if ($lab_test_master_list->SortUrl($lab_test_master_list->Order) == "") { ?>
		<th data-name="Order" class="<?php echo $lab_test_master_list->Order->headerCellClass() ?>"><div id="elh_lab_test_master_Order" class="lab_test_master_Order"><div class="ew-table-header-caption"><?php echo $lab_test_master_list->Order->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Order" class="<?php echo $lab_test_master_list->Order->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_master_list->SortUrl($lab_test_master_list->Order) ?>', 1);"><div id="elh_lab_test_master_Order" class="lab_test_master_Order">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master_list->Order->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master_list->Order->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_master_list->Order->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master_list->Form->Visible) { // Form ?>
	<?php if ($lab_test_master_list->SortUrl($lab_test_master_list->Form) == "") { ?>
		<th data-name="Form" class="<?php echo $lab_test_master_list->Form->headerCellClass() ?>"><div id="elh_lab_test_master_Form" class="lab_test_master_Form"><div class="ew-table-header-caption"><?php echo $lab_test_master_list->Form->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Form" class="<?php echo $lab_test_master_list->Form->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_master_list->SortUrl($lab_test_master_list->Form) ?>', 1);"><div id="elh_lab_test_master_Form" class="lab_test_master_Form">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master_list->Form->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master_list->Form->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_master_list->Form->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master_list->Amt->Visible) { // Amt ?>
	<?php if ($lab_test_master_list->SortUrl($lab_test_master_list->Amt) == "") { ?>
		<th data-name="Amt" class="<?php echo $lab_test_master_list->Amt->headerCellClass() ?>"><div id="elh_lab_test_master_Amt" class="lab_test_master_Amt"><div class="ew-table-header-caption"><?php echo $lab_test_master_list->Amt->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Amt" class="<?php echo $lab_test_master_list->Amt->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_master_list->SortUrl($lab_test_master_list->Amt) ?>', 1);"><div id="elh_lab_test_master_Amt" class="lab_test_master_Amt">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master_list->Amt->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master_list->Amt->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_master_list->Amt->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master_list->SplAmt->Visible) { // SplAmt ?>
	<?php if ($lab_test_master_list->SortUrl($lab_test_master_list->SplAmt) == "") { ?>
		<th data-name="SplAmt" class="<?php echo $lab_test_master_list->SplAmt->headerCellClass() ?>"><div id="elh_lab_test_master_SplAmt" class="lab_test_master_SplAmt"><div class="ew-table-header-caption"><?php echo $lab_test_master_list->SplAmt->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SplAmt" class="<?php echo $lab_test_master_list->SplAmt->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_master_list->SortUrl($lab_test_master_list->SplAmt) ?>', 1);"><div id="elh_lab_test_master_SplAmt" class="lab_test_master_SplAmt">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master_list->SplAmt->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master_list->SplAmt->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_master_list->SplAmt->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master_list->ResType->Visible) { // ResType ?>
	<?php if ($lab_test_master_list->SortUrl($lab_test_master_list->ResType) == "") { ?>
		<th data-name="ResType" class="<?php echo $lab_test_master_list->ResType->headerCellClass() ?>"><div id="elh_lab_test_master_ResType" class="lab_test_master_ResType"><div class="ew-table-header-caption"><?php echo $lab_test_master_list->ResType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ResType" class="<?php echo $lab_test_master_list->ResType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_master_list->SortUrl($lab_test_master_list->ResType) ?>', 1);"><div id="elh_lab_test_master_ResType" class="lab_test_master_ResType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master_list->ResType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master_list->ResType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_master_list->ResType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master_list->UnitCD->Visible) { // UnitCD ?>
	<?php if ($lab_test_master_list->SortUrl($lab_test_master_list->UnitCD) == "") { ?>
		<th data-name="UnitCD" class="<?php echo $lab_test_master_list->UnitCD->headerCellClass() ?>"><div id="elh_lab_test_master_UnitCD" class="lab_test_master_UnitCD"><div class="ew-table-header-caption"><?php echo $lab_test_master_list->UnitCD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UnitCD" class="<?php echo $lab_test_master_list->UnitCD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_master_list->SortUrl($lab_test_master_list->UnitCD) ?>', 1);"><div id="elh_lab_test_master_UnitCD" class="lab_test_master_UnitCD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master_list->UnitCD->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master_list->UnitCD->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_master_list->UnitCD->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master_list->Sample->Visible) { // Sample ?>
	<?php if ($lab_test_master_list->SortUrl($lab_test_master_list->Sample) == "") { ?>
		<th data-name="Sample" class="<?php echo $lab_test_master_list->Sample->headerCellClass() ?>"><div id="elh_lab_test_master_Sample" class="lab_test_master_Sample"><div class="ew-table-header-caption"><?php echo $lab_test_master_list->Sample->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Sample" class="<?php echo $lab_test_master_list->Sample->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_master_list->SortUrl($lab_test_master_list->Sample) ?>', 1);"><div id="elh_lab_test_master_Sample" class="lab_test_master_Sample">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master_list->Sample->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master_list->Sample->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_master_list->Sample->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master_list->NoD->Visible) { // NoD ?>
	<?php if ($lab_test_master_list->SortUrl($lab_test_master_list->NoD) == "") { ?>
		<th data-name="NoD" class="<?php echo $lab_test_master_list->NoD->headerCellClass() ?>"><div id="elh_lab_test_master_NoD" class="lab_test_master_NoD"><div class="ew-table-header-caption"><?php echo $lab_test_master_list->NoD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoD" class="<?php echo $lab_test_master_list->NoD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_master_list->SortUrl($lab_test_master_list->NoD) ?>', 1);"><div id="elh_lab_test_master_NoD" class="lab_test_master_NoD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master_list->NoD->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master_list->NoD->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_master_list->NoD->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master_list->BillOrder->Visible) { // BillOrder ?>
	<?php if ($lab_test_master_list->SortUrl($lab_test_master_list->BillOrder) == "") { ?>
		<th data-name="BillOrder" class="<?php echo $lab_test_master_list->BillOrder->headerCellClass() ?>"><div id="elh_lab_test_master_BillOrder" class="lab_test_master_BillOrder"><div class="ew-table-header-caption"><?php echo $lab_test_master_list->BillOrder->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillOrder" class="<?php echo $lab_test_master_list->BillOrder->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_master_list->SortUrl($lab_test_master_list->BillOrder) ?>', 1);"><div id="elh_lab_test_master_BillOrder" class="lab_test_master_BillOrder">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master_list->BillOrder->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master_list->BillOrder->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_master_list->BillOrder->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master_list->Inactive->Visible) { // Inactive ?>
	<?php if ($lab_test_master_list->SortUrl($lab_test_master_list->Inactive) == "") { ?>
		<th data-name="Inactive" class="<?php echo $lab_test_master_list->Inactive->headerCellClass() ?>"><div id="elh_lab_test_master_Inactive" class="lab_test_master_Inactive"><div class="ew-table-header-caption"><?php echo $lab_test_master_list->Inactive->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Inactive" class="<?php echo $lab_test_master_list->Inactive->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_master_list->SortUrl($lab_test_master_list->Inactive) ?>', 1);"><div id="elh_lab_test_master_Inactive" class="lab_test_master_Inactive">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master_list->Inactive->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master_list->Inactive->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_master_list->Inactive->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master_list->ReagentAmt->Visible) { // ReagentAmt ?>
	<?php if ($lab_test_master_list->SortUrl($lab_test_master_list->ReagentAmt) == "") { ?>
		<th data-name="ReagentAmt" class="<?php echo $lab_test_master_list->ReagentAmt->headerCellClass() ?>"><div id="elh_lab_test_master_ReagentAmt" class="lab_test_master_ReagentAmt"><div class="ew-table-header-caption"><?php echo $lab_test_master_list->ReagentAmt->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReagentAmt" class="<?php echo $lab_test_master_list->ReagentAmt->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_master_list->SortUrl($lab_test_master_list->ReagentAmt) ?>', 1);"><div id="elh_lab_test_master_ReagentAmt" class="lab_test_master_ReagentAmt">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master_list->ReagentAmt->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master_list->ReagentAmt->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_master_list->ReagentAmt->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master_list->LabAmt->Visible) { // LabAmt ?>
	<?php if ($lab_test_master_list->SortUrl($lab_test_master_list->LabAmt) == "") { ?>
		<th data-name="LabAmt" class="<?php echo $lab_test_master_list->LabAmt->headerCellClass() ?>"><div id="elh_lab_test_master_LabAmt" class="lab_test_master_LabAmt"><div class="ew-table-header-caption"><?php echo $lab_test_master_list->LabAmt->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LabAmt" class="<?php echo $lab_test_master_list->LabAmt->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_master_list->SortUrl($lab_test_master_list->LabAmt) ?>', 1);"><div id="elh_lab_test_master_LabAmt" class="lab_test_master_LabAmt">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master_list->LabAmt->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master_list->LabAmt->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_master_list->LabAmt->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master_list->RefAmt->Visible) { // RefAmt ?>
	<?php if ($lab_test_master_list->SortUrl($lab_test_master_list->RefAmt) == "") { ?>
		<th data-name="RefAmt" class="<?php echo $lab_test_master_list->RefAmt->headerCellClass() ?>"><div id="elh_lab_test_master_RefAmt" class="lab_test_master_RefAmt"><div class="ew-table-header-caption"><?php echo $lab_test_master_list->RefAmt->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RefAmt" class="<?php echo $lab_test_master_list->RefAmt->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_master_list->SortUrl($lab_test_master_list->RefAmt) ?>', 1);"><div id="elh_lab_test_master_RefAmt" class="lab_test_master_RefAmt">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master_list->RefAmt->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master_list->RefAmt->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_master_list->RefAmt->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master_list->CreFrom->Visible) { // CreFrom ?>
	<?php if ($lab_test_master_list->SortUrl($lab_test_master_list->CreFrom) == "") { ?>
		<th data-name="CreFrom" class="<?php echo $lab_test_master_list->CreFrom->headerCellClass() ?>"><div id="elh_lab_test_master_CreFrom" class="lab_test_master_CreFrom"><div class="ew-table-header-caption"><?php echo $lab_test_master_list->CreFrom->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CreFrom" class="<?php echo $lab_test_master_list->CreFrom->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_master_list->SortUrl($lab_test_master_list->CreFrom) ?>', 1);"><div id="elh_lab_test_master_CreFrom" class="lab_test_master_CreFrom">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master_list->CreFrom->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master_list->CreFrom->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_master_list->CreFrom->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master_list->CreTo->Visible) { // CreTo ?>
	<?php if ($lab_test_master_list->SortUrl($lab_test_master_list->CreTo) == "") { ?>
		<th data-name="CreTo" class="<?php echo $lab_test_master_list->CreTo->headerCellClass() ?>"><div id="elh_lab_test_master_CreTo" class="lab_test_master_CreTo"><div class="ew-table-header-caption"><?php echo $lab_test_master_list->CreTo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CreTo" class="<?php echo $lab_test_master_list->CreTo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_master_list->SortUrl($lab_test_master_list->CreTo) ?>', 1);"><div id="elh_lab_test_master_CreTo" class="lab_test_master_CreTo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master_list->CreTo->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master_list->CreTo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_master_list->CreTo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master_list->Sun->Visible) { // Sun ?>
	<?php if ($lab_test_master_list->SortUrl($lab_test_master_list->Sun) == "") { ?>
		<th data-name="Sun" class="<?php echo $lab_test_master_list->Sun->headerCellClass() ?>"><div id="elh_lab_test_master_Sun" class="lab_test_master_Sun"><div class="ew-table-header-caption"><?php echo $lab_test_master_list->Sun->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Sun" class="<?php echo $lab_test_master_list->Sun->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_master_list->SortUrl($lab_test_master_list->Sun) ?>', 1);"><div id="elh_lab_test_master_Sun" class="lab_test_master_Sun">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master_list->Sun->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master_list->Sun->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_master_list->Sun->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master_list->Mon->Visible) { // Mon ?>
	<?php if ($lab_test_master_list->SortUrl($lab_test_master_list->Mon) == "") { ?>
		<th data-name="Mon" class="<?php echo $lab_test_master_list->Mon->headerCellClass() ?>"><div id="elh_lab_test_master_Mon" class="lab_test_master_Mon"><div class="ew-table-header-caption"><?php echo $lab_test_master_list->Mon->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mon" class="<?php echo $lab_test_master_list->Mon->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_master_list->SortUrl($lab_test_master_list->Mon) ?>', 1);"><div id="elh_lab_test_master_Mon" class="lab_test_master_Mon">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master_list->Mon->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master_list->Mon->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_master_list->Mon->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master_list->Tue->Visible) { // Tue ?>
	<?php if ($lab_test_master_list->SortUrl($lab_test_master_list->Tue) == "") { ?>
		<th data-name="Tue" class="<?php echo $lab_test_master_list->Tue->headerCellClass() ?>"><div id="elh_lab_test_master_Tue" class="lab_test_master_Tue"><div class="ew-table-header-caption"><?php echo $lab_test_master_list->Tue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tue" class="<?php echo $lab_test_master_list->Tue->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_master_list->SortUrl($lab_test_master_list->Tue) ?>', 1);"><div id="elh_lab_test_master_Tue" class="lab_test_master_Tue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master_list->Tue->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master_list->Tue->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_master_list->Tue->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master_list->Wed->Visible) { // Wed ?>
	<?php if ($lab_test_master_list->SortUrl($lab_test_master_list->Wed) == "") { ?>
		<th data-name="Wed" class="<?php echo $lab_test_master_list->Wed->headerCellClass() ?>"><div id="elh_lab_test_master_Wed" class="lab_test_master_Wed"><div class="ew-table-header-caption"><?php echo $lab_test_master_list->Wed->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Wed" class="<?php echo $lab_test_master_list->Wed->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_master_list->SortUrl($lab_test_master_list->Wed) ?>', 1);"><div id="elh_lab_test_master_Wed" class="lab_test_master_Wed">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master_list->Wed->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master_list->Wed->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_master_list->Wed->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master_list->Thi->Visible) { // Thi ?>
	<?php if ($lab_test_master_list->SortUrl($lab_test_master_list->Thi) == "") { ?>
		<th data-name="Thi" class="<?php echo $lab_test_master_list->Thi->headerCellClass() ?>"><div id="elh_lab_test_master_Thi" class="lab_test_master_Thi"><div class="ew-table-header-caption"><?php echo $lab_test_master_list->Thi->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Thi" class="<?php echo $lab_test_master_list->Thi->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_master_list->SortUrl($lab_test_master_list->Thi) ?>', 1);"><div id="elh_lab_test_master_Thi" class="lab_test_master_Thi">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master_list->Thi->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master_list->Thi->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_master_list->Thi->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master_list->Fri->Visible) { // Fri ?>
	<?php if ($lab_test_master_list->SortUrl($lab_test_master_list->Fri) == "") { ?>
		<th data-name="Fri" class="<?php echo $lab_test_master_list->Fri->headerCellClass() ?>"><div id="elh_lab_test_master_Fri" class="lab_test_master_Fri"><div class="ew-table-header-caption"><?php echo $lab_test_master_list->Fri->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Fri" class="<?php echo $lab_test_master_list->Fri->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_master_list->SortUrl($lab_test_master_list->Fri) ?>', 1);"><div id="elh_lab_test_master_Fri" class="lab_test_master_Fri">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master_list->Fri->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master_list->Fri->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_master_list->Fri->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master_list->Sat->Visible) { // Sat ?>
	<?php if ($lab_test_master_list->SortUrl($lab_test_master_list->Sat) == "") { ?>
		<th data-name="Sat" class="<?php echo $lab_test_master_list->Sat->headerCellClass() ?>"><div id="elh_lab_test_master_Sat" class="lab_test_master_Sat"><div class="ew-table-header-caption"><?php echo $lab_test_master_list->Sat->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Sat" class="<?php echo $lab_test_master_list->Sat->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_master_list->SortUrl($lab_test_master_list->Sat) ?>', 1);"><div id="elh_lab_test_master_Sat" class="lab_test_master_Sat">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master_list->Sat->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master_list->Sat->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_master_list->Sat->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master_list->Days->Visible) { // Days ?>
	<?php if ($lab_test_master_list->SortUrl($lab_test_master_list->Days) == "") { ?>
		<th data-name="Days" class="<?php echo $lab_test_master_list->Days->headerCellClass() ?>"><div id="elh_lab_test_master_Days" class="lab_test_master_Days"><div class="ew-table-header-caption"><?php echo $lab_test_master_list->Days->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Days" class="<?php echo $lab_test_master_list->Days->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_master_list->SortUrl($lab_test_master_list->Days) ?>', 1);"><div id="elh_lab_test_master_Days" class="lab_test_master_Days">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master_list->Days->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master_list->Days->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_master_list->Days->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master_list->Cutoff->Visible) { // Cutoff ?>
	<?php if ($lab_test_master_list->SortUrl($lab_test_master_list->Cutoff) == "") { ?>
		<th data-name="Cutoff" class="<?php echo $lab_test_master_list->Cutoff->headerCellClass() ?>"><div id="elh_lab_test_master_Cutoff" class="lab_test_master_Cutoff"><div class="ew-table-header-caption"><?php echo $lab_test_master_list->Cutoff->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Cutoff" class="<?php echo $lab_test_master_list->Cutoff->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_master_list->SortUrl($lab_test_master_list->Cutoff) ?>', 1);"><div id="elh_lab_test_master_Cutoff" class="lab_test_master_Cutoff">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master_list->Cutoff->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master_list->Cutoff->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_master_list->Cutoff->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master_list->FontBold->Visible) { // FontBold ?>
	<?php if ($lab_test_master_list->SortUrl($lab_test_master_list->FontBold) == "") { ?>
		<th data-name="FontBold" class="<?php echo $lab_test_master_list->FontBold->headerCellClass() ?>"><div id="elh_lab_test_master_FontBold" class="lab_test_master_FontBold"><div class="ew-table-header-caption"><?php echo $lab_test_master_list->FontBold->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FontBold" class="<?php echo $lab_test_master_list->FontBold->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_master_list->SortUrl($lab_test_master_list->FontBold) ?>', 1);"><div id="elh_lab_test_master_FontBold" class="lab_test_master_FontBold">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master_list->FontBold->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master_list->FontBold->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_master_list->FontBold->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master_list->TestHeading->Visible) { // TestHeading ?>
	<?php if ($lab_test_master_list->SortUrl($lab_test_master_list->TestHeading) == "") { ?>
		<th data-name="TestHeading" class="<?php echo $lab_test_master_list->TestHeading->headerCellClass() ?>"><div id="elh_lab_test_master_TestHeading" class="lab_test_master_TestHeading"><div class="ew-table-header-caption"><?php echo $lab_test_master_list->TestHeading->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestHeading" class="<?php echo $lab_test_master_list->TestHeading->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_master_list->SortUrl($lab_test_master_list->TestHeading) ?>', 1);"><div id="elh_lab_test_master_TestHeading" class="lab_test_master_TestHeading">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master_list->TestHeading->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master_list->TestHeading->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_master_list->TestHeading->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master_list->Outsource->Visible) { // Outsource ?>
	<?php if ($lab_test_master_list->SortUrl($lab_test_master_list->Outsource) == "") { ?>
		<th data-name="Outsource" class="<?php echo $lab_test_master_list->Outsource->headerCellClass() ?>"><div id="elh_lab_test_master_Outsource" class="lab_test_master_Outsource"><div class="ew-table-header-caption"><?php echo $lab_test_master_list->Outsource->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Outsource" class="<?php echo $lab_test_master_list->Outsource->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_master_list->SortUrl($lab_test_master_list->Outsource) ?>', 1);"><div id="elh_lab_test_master_Outsource" class="lab_test_master_Outsource">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master_list->Outsource->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master_list->Outsource->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_master_list->Outsource->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master_list->NoResult->Visible) { // NoResult ?>
	<?php if ($lab_test_master_list->SortUrl($lab_test_master_list->NoResult) == "") { ?>
		<th data-name="NoResult" class="<?php echo $lab_test_master_list->NoResult->headerCellClass() ?>"><div id="elh_lab_test_master_NoResult" class="lab_test_master_NoResult"><div class="ew-table-header-caption"><?php echo $lab_test_master_list->NoResult->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoResult" class="<?php echo $lab_test_master_list->NoResult->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_master_list->SortUrl($lab_test_master_list->NoResult) ?>', 1);"><div id="elh_lab_test_master_NoResult" class="lab_test_master_NoResult">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master_list->NoResult->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master_list->NoResult->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_master_list->NoResult->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master_list->GraphLow->Visible) { // GraphLow ?>
	<?php if ($lab_test_master_list->SortUrl($lab_test_master_list->GraphLow) == "") { ?>
		<th data-name="GraphLow" class="<?php echo $lab_test_master_list->GraphLow->headerCellClass() ?>"><div id="elh_lab_test_master_GraphLow" class="lab_test_master_GraphLow"><div class="ew-table-header-caption"><?php echo $lab_test_master_list->GraphLow->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GraphLow" class="<?php echo $lab_test_master_list->GraphLow->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_master_list->SortUrl($lab_test_master_list->GraphLow) ?>', 1);"><div id="elh_lab_test_master_GraphLow" class="lab_test_master_GraphLow">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master_list->GraphLow->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master_list->GraphLow->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_master_list->GraphLow->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master_list->GraphHigh->Visible) { // GraphHigh ?>
	<?php if ($lab_test_master_list->SortUrl($lab_test_master_list->GraphHigh) == "") { ?>
		<th data-name="GraphHigh" class="<?php echo $lab_test_master_list->GraphHigh->headerCellClass() ?>"><div id="elh_lab_test_master_GraphHigh" class="lab_test_master_GraphHigh"><div class="ew-table-header-caption"><?php echo $lab_test_master_list->GraphHigh->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GraphHigh" class="<?php echo $lab_test_master_list->GraphHigh->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_master_list->SortUrl($lab_test_master_list->GraphHigh) ?>', 1);"><div id="elh_lab_test_master_GraphHigh" class="lab_test_master_GraphHigh">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master_list->GraphHigh->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master_list->GraphHigh->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_master_list->GraphHigh->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master_list->CollSample->Visible) { // CollSample ?>
	<?php if ($lab_test_master_list->SortUrl($lab_test_master_list->CollSample) == "") { ?>
		<th data-name="CollSample" class="<?php echo $lab_test_master_list->CollSample->headerCellClass() ?>"><div id="elh_lab_test_master_CollSample" class="lab_test_master_CollSample"><div class="ew-table-header-caption"><?php echo $lab_test_master_list->CollSample->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CollSample" class="<?php echo $lab_test_master_list->CollSample->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_master_list->SortUrl($lab_test_master_list->CollSample) ?>', 1);"><div id="elh_lab_test_master_CollSample" class="lab_test_master_CollSample">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master_list->CollSample->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master_list->CollSample->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_master_list->CollSample->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master_list->ProcessTime->Visible) { // ProcessTime ?>
	<?php if ($lab_test_master_list->SortUrl($lab_test_master_list->ProcessTime) == "") { ?>
		<th data-name="ProcessTime" class="<?php echo $lab_test_master_list->ProcessTime->headerCellClass() ?>"><div id="elh_lab_test_master_ProcessTime" class="lab_test_master_ProcessTime"><div class="ew-table-header-caption"><?php echo $lab_test_master_list->ProcessTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProcessTime" class="<?php echo $lab_test_master_list->ProcessTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_master_list->SortUrl($lab_test_master_list->ProcessTime) ?>', 1);"><div id="elh_lab_test_master_ProcessTime" class="lab_test_master_ProcessTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master_list->ProcessTime->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master_list->ProcessTime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_master_list->ProcessTime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master_list->TamilName->Visible) { // TamilName ?>
	<?php if ($lab_test_master_list->SortUrl($lab_test_master_list->TamilName) == "") { ?>
		<th data-name="TamilName" class="<?php echo $lab_test_master_list->TamilName->headerCellClass() ?>"><div id="elh_lab_test_master_TamilName" class="lab_test_master_TamilName"><div class="ew-table-header-caption"><?php echo $lab_test_master_list->TamilName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TamilName" class="<?php echo $lab_test_master_list->TamilName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_master_list->SortUrl($lab_test_master_list->TamilName) ?>', 1);"><div id="elh_lab_test_master_TamilName" class="lab_test_master_TamilName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master_list->TamilName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master_list->TamilName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_master_list->TamilName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master_list->ShortName->Visible) { // ShortName ?>
	<?php if ($lab_test_master_list->SortUrl($lab_test_master_list->ShortName) == "") { ?>
		<th data-name="ShortName" class="<?php echo $lab_test_master_list->ShortName->headerCellClass() ?>"><div id="elh_lab_test_master_ShortName" class="lab_test_master_ShortName"><div class="ew-table-header-caption"><?php echo $lab_test_master_list->ShortName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ShortName" class="<?php echo $lab_test_master_list->ShortName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_master_list->SortUrl($lab_test_master_list->ShortName) ?>', 1);"><div id="elh_lab_test_master_ShortName" class="lab_test_master_ShortName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master_list->ShortName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master_list->ShortName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_master_list->ShortName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master_list->Individual->Visible) { // Individual ?>
	<?php if ($lab_test_master_list->SortUrl($lab_test_master_list->Individual) == "") { ?>
		<th data-name="Individual" class="<?php echo $lab_test_master_list->Individual->headerCellClass() ?>"><div id="elh_lab_test_master_Individual" class="lab_test_master_Individual"><div class="ew-table-header-caption"><?php echo $lab_test_master_list->Individual->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Individual" class="<?php echo $lab_test_master_list->Individual->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_master_list->SortUrl($lab_test_master_list->Individual) ?>', 1);"><div id="elh_lab_test_master_Individual" class="lab_test_master_Individual">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master_list->Individual->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master_list->Individual->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_master_list->Individual->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master_list->PrevAmt->Visible) { // PrevAmt ?>
	<?php if ($lab_test_master_list->SortUrl($lab_test_master_list->PrevAmt) == "") { ?>
		<th data-name="PrevAmt" class="<?php echo $lab_test_master_list->PrevAmt->headerCellClass() ?>"><div id="elh_lab_test_master_PrevAmt" class="lab_test_master_PrevAmt"><div class="ew-table-header-caption"><?php echo $lab_test_master_list->PrevAmt->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrevAmt" class="<?php echo $lab_test_master_list->PrevAmt->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_master_list->SortUrl($lab_test_master_list->PrevAmt) ?>', 1);"><div id="elh_lab_test_master_PrevAmt" class="lab_test_master_PrevAmt">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master_list->PrevAmt->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master_list->PrevAmt->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_master_list->PrevAmt->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master_list->PrevSplAmt->Visible) { // PrevSplAmt ?>
	<?php if ($lab_test_master_list->SortUrl($lab_test_master_list->PrevSplAmt) == "") { ?>
		<th data-name="PrevSplAmt" class="<?php echo $lab_test_master_list->PrevSplAmt->headerCellClass() ?>"><div id="elh_lab_test_master_PrevSplAmt" class="lab_test_master_PrevSplAmt"><div class="ew-table-header-caption"><?php echo $lab_test_master_list->PrevSplAmt->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrevSplAmt" class="<?php echo $lab_test_master_list->PrevSplAmt->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_master_list->SortUrl($lab_test_master_list->PrevSplAmt) ?>', 1);"><div id="elh_lab_test_master_PrevSplAmt" class="lab_test_master_PrevSplAmt">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master_list->PrevSplAmt->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master_list->PrevSplAmt->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_master_list->PrevSplAmt->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master_list->EditDate->Visible) { // EditDate ?>
	<?php if ($lab_test_master_list->SortUrl($lab_test_master_list->EditDate) == "") { ?>
		<th data-name="EditDate" class="<?php echo $lab_test_master_list->EditDate->headerCellClass() ?>"><div id="elh_lab_test_master_EditDate" class="lab_test_master_EditDate"><div class="ew-table-header-caption"><?php echo $lab_test_master_list->EditDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EditDate" class="<?php echo $lab_test_master_list->EditDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_master_list->SortUrl($lab_test_master_list->EditDate) ?>', 1);"><div id="elh_lab_test_master_EditDate" class="lab_test_master_EditDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master_list->EditDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master_list->EditDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_master_list->EditDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master_list->BillName->Visible) { // BillName ?>
	<?php if ($lab_test_master_list->SortUrl($lab_test_master_list->BillName) == "") { ?>
		<th data-name="BillName" class="<?php echo $lab_test_master_list->BillName->headerCellClass() ?>"><div id="elh_lab_test_master_BillName" class="lab_test_master_BillName"><div class="ew-table-header-caption"><?php echo $lab_test_master_list->BillName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillName" class="<?php echo $lab_test_master_list->BillName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_master_list->SortUrl($lab_test_master_list->BillName) ?>', 1);"><div id="elh_lab_test_master_BillName" class="lab_test_master_BillName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master_list->BillName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master_list->BillName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_master_list->BillName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master_list->ActualAmt->Visible) { // ActualAmt ?>
	<?php if ($lab_test_master_list->SortUrl($lab_test_master_list->ActualAmt) == "") { ?>
		<th data-name="ActualAmt" class="<?php echo $lab_test_master_list->ActualAmt->headerCellClass() ?>"><div id="elh_lab_test_master_ActualAmt" class="lab_test_master_ActualAmt"><div class="ew-table-header-caption"><?php echo $lab_test_master_list->ActualAmt->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ActualAmt" class="<?php echo $lab_test_master_list->ActualAmt->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_master_list->SortUrl($lab_test_master_list->ActualAmt) ?>', 1);"><div id="elh_lab_test_master_ActualAmt" class="lab_test_master_ActualAmt">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master_list->ActualAmt->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master_list->ActualAmt->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_master_list->ActualAmt->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master_list->HISCD->Visible) { // HISCD ?>
	<?php if ($lab_test_master_list->SortUrl($lab_test_master_list->HISCD) == "") { ?>
		<th data-name="HISCD" class="<?php echo $lab_test_master_list->HISCD->headerCellClass() ?>"><div id="elh_lab_test_master_HISCD" class="lab_test_master_HISCD"><div class="ew-table-header-caption"><?php echo $lab_test_master_list->HISCD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HISCD" class="<?php echo $lab_test_master_list->HISCD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_master_list->SortUrl($lab_test_master_list->HISCD) ?>', 1);"><div id="elh_lab_test_master_HISCD" class="lab_test_master_HISCD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master_list->HISCD->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master_list->HISCD->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_master_list->HISCD->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master_list->PriceList->Visible) { // PriceList ?>
	<?php if ($lab_test_master_list->SortUrl($lab_test_master_list->PriceList) == "") { ?>
		<th data-name="PriceList" class="<?php echo $lab_test_master_list->PriceList->headerCellClass() ?>"><div id="elh_lab_test_master_PriceList" class="lab_test_master_PriceList"><div class="ew-table-header-caption"><?php echo $lab_test_master_list->PriceList->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PriceList" class="<?php echo $lab_test_master_list->PriceList->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_master_list->SortUrl($lab_test_master_list->PriceList) ?>', 1);"><div id="elh_lab_test_master_PriceList" class="lab_test_master_PriceList">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master_list->PriceList->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master_list->PriceList->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_master_list->PriceList->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master_list->IPAmt->Visible) { // IPAmt ?>
	<?php if ($lab_test_master_list->SortUrl($lab_test_master_list->IPAmt) == "") { ?>
		<th data-name="IPAmt" class="<?php echo $lab_test_master_list->IPAmt->headerCellClass() ?>"><div id="elh_lab_test_master_IPAmt" class="lab_test_master_IPAmt"><div class="ew-table-header-caption"><?php echo $lab_test_master_list->IPAmt->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IPAmt" class="<?php echo $lab_test_master_list->IPAmt->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_master_list->SortUrl($lab_test_master_list->IPAmt) ?>', 1);"><div id="elh_lab_test_master_IPAmt" class="lab_test_master_IPAmt">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master_list->IPAmt->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master_list->IPAmt->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_master_list->IPAmt->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master_list->InsAmt->Visible) { // InsAmt ?>
	<?php if ($lab_test_master_list->SortUrl($lab_test_master_list->InsAmt) == "") { ?>
		<th data-name="InsAmt" class="<?php echo $lab_test_master_list->InsAmt->headerCellClass() ?>"><div id="elh_lab_test_master_InsAmt" class="lab_test_master_InsAmt"><div class="ew-table-header-caption"><?php echo $lab_test_master_list->InsAmt->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="InsAmt" class="<?php echo $lab_test_master_list->InsAmt->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_master_list->SortUrl($lab_test_master_list->InsAmt) ?>', 1);"><div id="elh_lab_test_master_InsAmt" class="lab_test_master_InsAmt">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master_list->InsAmt->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master_list->InsAmt->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_master_list->InsAmt->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master_list->ManualCD->Visible) { // ManualCD ?>
	<?php if ($lab_test_master_list->SortUrl($lab_test_master_list->ManualCD) == "") { ?>
		<th data-name="ManualCD" class="<?php echo $lab_test_master_list->ManualCD->headerCellClass() ?>"><div id="elh_lab_test_master_ManualCD" class="lab_test_master_ManualCD"><div class="ew-table-header-caption"><?php echo $lab_test_master_list->ManualCD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ManualCD" class="<?php echo $lab_test_master_list->ManualCD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_master_list->SortUrl($lab_test_master_list->ManualCD) ?>', 1);"><div id="elh_lab_test_master_ManualCD" class="lab_test_master_ManualCD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master_list->ManualCD->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master_list->ManualCD->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_master_list->ManualCD->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master_list->Free->Visible) { // Free ?>
	<?php if ($lab_test_master_list->SortUrl($lab_test_master_list->Free) == "") { ?>
		<th data-name="Free" class="<?php echo $lab_test_master_list->Free->headerCellClass() ?>"><div id="elh_lab_test_master_Free" class="lab_test_master_Free"><div class="ew-table-header-caption"><?php echo $lab_test_master_list->Free->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Free" class="<?php echo $lab_test_master_list->Free->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_master_list->SortUrl($lab_test_master_list->Free) ?>', 1);"><div id="elh_lab_test_master_Free" class="lab_test_master_Free">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master_list->Free->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master_list->Free->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_master_list->Free->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master_list->AutoAuth->Visible) { // AutoAuth ?>
	<?php if ($lab_test_master_list->SortUrl($lab_test_master_list->AutoAuth) == "") { ?>
		<th data-name="AutoAuth" class="<?php echo $lab_test_master_list->AutoAuth->headerCellClass() ?>"><div id="elh_lab_test_master_AutoAuth" class="lab_test_master_AutoAuth"><div class="ew-table-header-caption"><?php echo $lab_test_master_list->AutoAuth->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AutoAuth" class="<?php echo $lab_test_master_list->AutoAuth->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_master_list->SortUrl($lab_test_master_list->AutoAuth) ?>', 1);"><div id="elh_lab_test_master_AutoAuth" class="lab_test_master_AutoAuth">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master_list->AutoAuth->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master_list->AutoAuth->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_master_list->AutoAuth->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master_list->ProductCD->Visible) { // ProductCD ?>
	<?php if ($lab_test_master_list->SortUrl($lab_test_master_list->ProductCD) == "") { ?>
		<th data-name="ProductCD" class="<?php echo $lab_test_master_list->ProductCD->headerCellClass() ?>"><div id="elh_lab_test_master_ProductCD" class="lab_test_master_ProductCD"><div class="ew-table-header-caption"><?php echo $lab_test_master_list->ProductCD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProductCD" class="<?php echo $lab_test_master_list->ProductCD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_master_list->SortUrl($lab_test_master_list->ProductCD) ?>', 1);"><div id="elh_lab_test_master_ProductCD" class="lab_test_master_ProductCD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master_list->ProductCD->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master_list->ProductCD->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_master_list->ProductCD->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master_list->Inventory->Visible) { // Inventory ?>
	<?php if ($lab_test_master_list->SortUrl($lab_test_master_list->Inventory) == "") { ?>
		<th data-name="Inventory" class="<?php echo $lab_test_master_list->Inventory->headerCellClass() ?>"><div id="elh_lab_test_master_Inventory" class="lab_test_master_Inventory"><div class="ew-table-header-caption"><?php echo $lab_test_master_list->Inventory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Inventory" class="<?php echo $lab_test_master_list->Inventory->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_master_list->SortUrl($lab_test_master_list->Inventory) ?>', 1);"><div id="elh_lab_test_master_Inventory" class="lab_test_master_Inventory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master_list->Inventory->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master_list->Inventory->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_master_list->Inventory->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master_list->IntimateTest->Visible) { // IntimateTest ?>
	<?php if ($lab_test_master_list->SortUrl($lab_test_master_list->IntimateTest) == "") { ?>
		<th data-name="IntimateTest" class="<?php echo $lab_test_master_list->IntimateTest->headerCellClass() ?>"><div id="elh_lab_test_master_IntimateTest" class="lab_test_master_IntimateTest"><div class="ew-table-header-caption"><?php echo $lab_test_master_list->IntimateTest->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IntimateTest" class="<?php echo $lab_test_master_list->IntimateTest->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_master_list->SortUrl($lab_test_master_list->IntimateTest) ?>', 1);"><div id="elh_lab_test_master_IntimateTest" class="lab_test_master_IntimateTest">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master_list->IntimateTest->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master_list->IntimateTest->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_master_list->IntimateTest->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_master_list->Manual->Visible) { // Manual ?>
	<?php if ($lab_test_master_list->SortUrl($lab_test_master_list->Manual) == "") { ?>
		<th data-name="Manual" class="<?php echo $lab_test_master_list->Manual->headerCellClass() ?>"><div id="elh_lab_test_master_Manual" class="lab_test_master_Manual"><div class="ew-table-header-caption"><?php echo $lab_test_master_list->Manual->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Manual" class="<?php echo $lab_test_master_list->Manual->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_master_list->SortUrl($lab_test_master_list->Manual) ?>', 1);"><div id="elh_lab_test_master_Manual" class="lab_test_master_Manual">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_master_list->Manual->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_master_list->Manual->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_master_list->Manual->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$lab_test_master_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($lab_test_master_list->ExportAll && $lab_test_master_list->isExport()) {
	$lab_test_master_list->StopRecord = $lab_test_master_list->TotalRecords;
} else {

	// Set the last record to display
	if ($lab_test_master_list->TotalRecords > $lab_test_master_list->StartRecord + $lab_test_master_list->DisplayRecords - 1)
		$lab_test_master_list->StopRecord = $lab_test_master_list->StartRecord + $lab_test_master_list->DisplayRecords - 1;
	else
		$lab_test_master_list->StopRecord = $lab_test_master_list->TotalRecords;
}
$lab_test_master_list->RecordCount = $lab_test_master_list->StartRecord - 1;
if ($lab_test_master_list->Recordset && !$lab_test_master_list->Recordset->EOF) {
	$lab_test_master_list->Recordset->moveFirst();
	$selectLimit = $lab_test_master_list->UseSelectLimit;
	if (!$selectLimit && $lab_test_master_list->StartRecord > 1)
		$lab_test_master_list->Recordset->move($lab_test_master_list->StartRecord - 1);
} elseif (!$lab_test_master->AllowAddDeleteRow && $lab_test_master_list->StopRecord == 0) {
	$lab_test_master_list->StopRecord = $lab_test_master->GridAddRowCount;
}

// Initialize aggregate
$lab_test_master->RowType = ROWTYPE_AGGREGATEINIT;
$lab_test_master->resetAttributes();
$lab_test_master_list->renderRow();
while ($lab_test_master_list->RecordCount < $lab_test_master_list->StopRecord) {
	$lab_test_master_list->RecordCount++;
	if ($lab_test_master_list->RecordCount >= $lab_test_master_list->StartRecord) {
		$lab_test_master_list->RowCount++;

		// Set up key count
		$lab_test_master_list->KeyCount = $lab_test_master_list->RowIndex;

		// Init row class and style
		$lab_test_master->resetAttributes();
		$lab_test_master->CssClass = "";
		if ($lab_test_master_list->isGridAdd()) {
		} else {
			$lab_test_master_list->loadRowValues($lab_test_master_list->Recordset); // Load row values
		}
		$lab_test_master->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$lab_test_master->RowAttrs->merge(["data-rowindex" => $lab_test_master_list->RowCount, "id" => "r" . $lab_test_master_list->RowCount . "_lab_test_master", "data-rowtype" => $lab_test_master->RowType]);

		// Render row
		$lab_test_master_list->renderRow();

		// Render list options
		$lab_test_master_list->renderListOptions();
?>
	<tr <?php echo $lab_test_master->rowAttributes() ?>>
<?php

// Render list options (body, left)
$lab_test_master_list->ListOptions->render("body", "left", $lab_test_master_list->RowCount);
?>
	<?php if ($lab_test_master_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $lab_test_master_list->id->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCount ?>_lab_test_master_id">
<span<?php echo $lab_test_master_list->id->viewAttributes() ?>><?php echo $lab_test_master_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master_list->MainDeptCd->Visible) { // MainDeptCd ?>
		<td data-name="MainDeptCd" <?php echo $lab_test_master_list->MainDeptCd->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCount ?>_lab_test_master_MainDeptCd">
<span<?php echo $lab_test_master_list->MainDeptCd->viewAttributes() ?>><?php echo $lab_test_master_list->MainDeptCd->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master_list->DeptCd->Visible) { // DeptCd ?>
		<td data-name="DeptCd" <?php echo $lab_test_master_list->DeptCd->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCount ?>_lab_test_master_DeptCd">
<span<?php echo $lab_test_master_list->DeptCd->viewAttributes() ?>><?php echo $lab_test_master_list->DeptCd->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master_list->TestCd->Visible) { // TestCd ?>
		<td data-name="TestCd" <?php echo $lab_test_master_list->TestCd->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCount ?>_lab_test_master_TestCd">
<span<?php echo $lab_test_master_list->TestCd->viewAttributes() ?>><?php echo $lab_test_master_list->TestCd->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master_list->TestSubCd->Visible) { // TestSubCd ?>
		<td data-name="TestSubCd" <?php echo $lab_test_master_list->TestSubCd->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCount ?>_lab_test_master_TestSubCd">
<span<?php echo $lab_test_master_list->TestSubCd->viewAttributes() ?>><?php echo $lab_test_master_list->TestSubCd->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master_list->TestName->Visible) { // TestName ?>
		<td data-name="TestName" <?php echo $lab_test_master_list->TestName->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCount ?>_lab_test_master_TestName">
<span<?php echo $lab_test_master_list->TestName->viewAttributes() ?>><?php echo $lab_test_master_list->TestName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master_list->XrayPart->Visible) { // XrayPart ?>
		<td data-name="XrayPart" <?php echo $lab_test_master_list->XrayPart->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCount ?>_lab_test_master_XrayPart">
<span<?php echo $lab_test_master_list->XrayPart->viewAttributes() ?>><?php echo $lab_test_master_list->XrayPart->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master_list->Method->Visible) { // Method ?>
		<td data-name="Method" <?php echo $lab_test_master_list->Method->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCount ?>_lab_test_master_Method">
<span<?php echo $lab_test_master_list->Method->viewAttributes() ?>><?php echo $lab_test_master_list->Method->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master_list->Order->Visible) { // Order ?>
		<td data-name="Order" <?php echo $lab_test_master_list->Order->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCount ?>_lab_test_master_Order">
<span<?php echo $lab_test_master_list->Order->viewAttributes() ?>><?php echo $lab_test_master_list->Order->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master_list->Form->Visible) { // Form ?>
		<td data-name="Form" <?php echo $lab_test_master_list->Form->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCount ?>_lab_test_master_Form">
<span<?php echo $lab_test_master_list->Form->viewAttributes() ?>><?php echo $lab_test_master_list->Form->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master_list->Amt->Visible) { // Amt ?>
		<td data-name="Amt" <?php echo $lab_test_master_list->Amt->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCount ?>_lab_test_master_Amt">
<span<?php echo $lab_test_master_list->Amt->viewAttributes() ?>><?php echo $lab_test_master_list->Amt->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master_list->SplAmt->Visible) { // SplAmt ?>
		<td data-name="SplAmt" <?php echo $lab_test_master_list->SplAmt->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCount ?>_lab_test_master_SplAmt">
<span<?php echo $lab_test_master_list->SplAmt->viewAttributes() ?>><?php echo $lab_test_master_list->SplAmt->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master_list->ResType->Visible) { // ResType ?>
		<td data-name="ResType" <?php echo $lab_test_master_list->ResType->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCount ?>_lab_test_master_ResType">
<span<?php echo $lab_test_master_list->ResType->viewAttributes() ?>><?php echo $lab_test_master_list->ResType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master_list->UnitCD->Visible) { // UnitCD ?>
		<td data-name="UnitCD" <?php echo $lab_test_master_list->UnitCD->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCount ?>_lab_test_master_UnitCD">
<span<?php echo $lab_test_master_list->UnitCD->viewAttributes() ?>><?php echo $lab_test_master_list->UnitCD->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master_list->Sample->Visible) { // Sample ?>
		<td data-name="Sample" <?php echo $lab_test_master_list->Sample->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCount ?>_lab_test_master_Sample">
<span<?php echo $lab_test_master_list->Sample->viewAttributes() ?>><?php echo $lab_test_master_list->Sample->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master_list->NoD->Visible) { // NoD ?>
		<td data-name="NoD" <?php echo $lab_test_master_list->NoD->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCount ?>_lab_test_master_NoD">
<span<?php echo $lab_test_master_list->NoD->viewAttributes() ?>><?php echo $lab_test_master_list->NoD->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master_list->BillOrder->Visible) { // BillOrder ?>
		<td data-name="BillOrder" <?php echo $lab_test_master_list->BillOrder->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCount ?>_lab_test_master_BillOrder">
<span<?php echo $lab_test_master_list->BillOrder->viewAttributes() ?>><?php echo $lab_test_master_list->BillOrder->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master_list->Inactive->Visible) { // Inactive ?>
		<td data-name="Inactive" <?php echo $lab_test_master_list->Inactive->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCount ?>_lab_test_master_Inactive">
<span<?php echo $lab_test_master_list->Inactive->viewAttributes() ?>><?php echo $lab_test_master_list->Inactive->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master_list->ReagentAmt->Visible) { // ReagentAmt ?>
		<td data-name="ReagentAmt" <?php echo $lab_test_master_list->ReagentAmt->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCount ?>_lab_test_master_ReagentAmt">
<span<?php echo $lab_test_master_list->ReagentAmt->viewAttributes() ?>><?php echo $lab_test_master_list->ReagentAmt->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master_list->LabAmt->Visible) { // LabAmt ?>
		<td data-name="LabAmt" <?php echo $lab_test_master_list->LabAmt->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCount ?>_lab_test_master_LabAmt">
<span<?php echo $lab_test_master_list->LabAmt->viewAttributes() ?>><?php echo $lab_test_master_list->LabAmt->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master_list->RefAmt->Visible) { // RefAmt ?>
		<td data-name="RefAmt" <?php echo $lab_test_master_list->RefAmt->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCount ?>_lab_test_master_RefAmt">
<span<?php echo $lab_test_master_list->RefAmt->viewAttributes() ?>><?php echo $lab_test_master_list->RefAmt->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master_list->CreFrom->Visible) { // CreFrom ?>
		<td data-name="CreFrom" <?php echo $lab_test_master_list->CreFrom->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCount ?>_lab_test_master_CreFrom">
<span<?php echo $lab_test_master_list->CreFrom->viewAttributes() ?>><?php echo $lab_test_master_list->CreFrom->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master_list->CreTo->Visible) { // CreTo ?>
		<td data-name="CreTo" <?php echo $lab_test_master_list->CreTo->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCount ?>_lab_test_master_CreTo">
<span<?php echo $lab_test_master_list->CreTo->viewAttributes() ?>><?php echo $lab_test_master_list->CreTo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master_list->Sun->Visible) { // Sun ?>
		<td data-name="Sun" <?php echo $lab_test_master_list->Sun->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCount ?>_lab_test_master_Sun">
<span<?php echo $lab_test_master_list->Sun->viewAttributes() ?>><?php echo $lab_test_master_list->Sun->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master_list->Mon->Visible) { // Mon ?>
		<td data-name="Mon" <?php echo $lab_test_master_list->Mon->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCount ?>_lab_test_master_Mon">
<span<?php echo $lab_test_master_list->Mon->viewAttributes() ?>><?php echo $lab_test_master_list->Mon->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master_list->Tue->Visible) { // Tue ?>
		<td data-name="Tue" <?php echo $lab_test_master_list->Tue->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCount ?>_lab_test_master_Tue">
<span<?php echo $lab_test_master_list->Tue->viewAttributes() ?>><?php echo $lab_test_master_list->Tue->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master_list->Wed->Visible) { // Wed ?>
		<td data-name="Wed" <?php echo $lab_test_master_list->Wed->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCount ?>_lab_test_master_Wed">
<span<?php echo $lab_test_master_list->Wed->viewAttributes() ?>><?php echo $lab_test_master_list->Wed->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master_list->Thi->Visible) { // Thi ?>
		<td data-name="Thi" <?php echo $lab_test_master_list->Thi->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCount ?>_lab_test_master_Thi">
<span<?php echo $lab_test_master_list->Thi->viewAttributes() ?>><?php echo $lab_test_master_list->Thi->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master_list->Fri->Visible) { // Fri ?>
		<td data-name="Fri" <?php echo $lab_test_master_list->Fri->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCount ?>_lab_test_master_Fri">
<span<?php echo $lab_test_master_list->Fri->viewAttributes() ?>><?php echo $lab_test_master_list->Fri->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master_list->Sat->Visible) { // Sat ?>
		<td data-name="Sat" <?php echo $lab_test_master_list->Sat->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCount ?>_lab_test_master_Sat">
<span<?php echo $lab_test_master_list->Sat->viewAttributes() ?>><?php echo $lab_test_master_list->Sat->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master_list->Days->Visible) { // Days ?>
		<td data-name="Days" <?php echo $lab_test_master_list->Days->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCount ?>_lab_test_master_Days">
<span<?php echo $lab_test_master_list->Days->viewAttributes() ?>><?php echo $lab_test_master_list->Days->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master_list->Cutoff->Visible) { // Cutoff ?>
		<td data-name="Cutoff" <?php echo $lab_test_master_list->Cutoff->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCount ?>_lab_test_master_Cutoff">
<span<?php echo $lab_test_master_list->Cutoff->viewAttributes() ?>><?php echo $lab_test_master_list->Cutoff->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master_list->FontBold->Visible) { // FontBold ?>
		<td data-name="FontBold" <?php echo $lab_test_master_list->FontBold->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCount ?>_lab_test_master_FontBold">
<span<?php echo $lab_test_master_list->FontBold->viewAttributes() ?>><?php echo $lab_test_master_list->FontBold->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master_list->TestHeading->Visible) { // TestHeading ?>
		<td data-name="TestHeading" <?php echo $lab_test_master_list->TestHeading->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCount ?>_lab_test_master_TestHeading">
<span<?php echo $lab_test_master_list->TestHeading->viewAttributes() ?>><?php echo $lab_test_master_list->TestHeading->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master_list->Outsource->Visible) { // Outsource ?>
		<td data-name="Outsource" <?php echo $lab_test_master_list->Outsource->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCount ?>_lab_test_master_Outsource">
<span<?php echo $lab_test_master_list->Outsource->viewAttributes() ?>><?php echo $lab_test_master_list->Outsource->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master_list->NoResult->Visible) { // NoResult ?>
		<td data-name="NoResult" <?php echo $lab_test_master_list->NoResult->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCount ?>_lab_test_master_NoResult">
<span<?php echo $lab_test_master_list->NoResult->viewAttributes() ?>><?php echo $lab_test_master_list->NoResult->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master_list->GraphLow->Visible) { // GraphLow ?>
		<td data-name="GraphLow" <?php echo $lab_test_master_list->GraphLow->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCount ?>_lab_test_master_GraphLow">
<span<?php echo $lab_test_master_list->GraphLow->viewAttributes() ?>><?php echo $lab_test_master_list->GraphLow->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master_list->GraphHigh->Visible) { // GraphHigh ?>
		<td data-name="GraphHigh" <?php echo $lab_test_master_list->GraphHigh->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCount ?>_lab_test_master_GraphHigh">
<span<?php echo $lab_test_master_list->GraphHigh->viewAttributes() ?>><?php echo $lab_test_master_list->GraphHigh->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master_list->CollSample->Visible) { // CollSample ?>
		<td data-name="CollSample" <?php echo $lab_test_master_list->CollSample->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCount ?>_lab_test_master_CollSample">
<span<?php echo $lab_test_master_list->CollSample->viewAttributes() ?>><?php echo $lab_test_master_list->CollSample->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master_list->ProcessTime->Visible) { // ProcessTime ?>
		<td data-name="ProcessTime" <?php echo $lab_test_master_list->ProcessTime->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCount ?>_lab_test_master_ProcessTime">
<span<?php echo $lab_test_master_list->ProcessTime->viewAttributes() ?>><?php echo $lab_test_master_list->ProcessTime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master_list->TamilName->Visible) { // TamilName ?>
		<td data-name="TamilName" <?php echo $lab_test_master_list->TamilName->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCount ?>_lab_test_master_TamilName">
<span<?php echo $lab_test_master_list->TamilName->viewAttributes() ?>><?php echo $lab_test_master_list->TamilName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master_list->ShortName->Visible) { // ShortName ?>
		<td data-name="ShortName" <?php echo $lab_test_master_list->ShortName->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCount ?>_lab_test_master_ShortName">
<span<?php echo $lab_test_master_list->ShortName->viewAttributes() ?>><?php echo $lab_test_master_list->ShortName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master_list->Individual->Visible) { // Individual ?>
		<td data-name="Individual" <?php echo $lab_test_master_list->Individual->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCount ?>_lab_test_master_Individual">
<span<?php echo $lab_test_master_list->Individual->viewAttributes() ?>><?php echo $lab_test_master_list->Individual->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master_list->PrevAmt->Visible) { // PrevAmt ?>
		<td data-name="PrevAmt" <?php echo $lab_test_master_list->PrevAmt->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCount ?>_lab_test_master_PrevAmt">
<span<?php echo $lab_test_master_list->PrevAmt->viewAttributes() ?>><?php echo $lab_test_master_list->PrevAmt->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master_list->PrevSplAmt->Visible) { // PrevSplAmt ?>
		<td data-name="PrevSplAmt" <?php echo $lab_test_master_list->PrevSplAmt->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCount ?>_lab_test_master_PrevSplAmt">
<span<?php echo $lab_test_master_list->PrevSplAmt->viewAttributes() ?>><?php echo $lab_test_master_list->PrevSplAmt->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master_list->EditDate->Visible) { // EditDate ?>
		<td data-name="EditDate" <?php echo $lab_test_master_list->EditDate->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCount ?>_lab_test_master_EditDate">
<span<?php echo $lab_test_master_list->EditDate->viewAttributes() ?>><?php echo $lab_test_master_list->EditDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master_list->BillName->Visible) { // BillName ?>
		<td data-name="BillName" <?php echo $lab_test_master_list->BillName->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCount ?>_lab_test_master_BillName">
<span<?php echo $lab_test_master_list->BillName->viewAttributes() ?>><?php echo $lab_test_master_list->BillName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master_list->ActualAmt->Visible) { // ActualAmt ?>
		<td data-name="ActualAmt" <?php echo $lab_test_master_list->ActualAmt->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCount ?>_lab_test_master_ActualAmt">
<span<?php echo $lab_test_master_list->ActualAmt->viewAttributes() ?>><?php echo $lab_test_master_list->ActualAmt->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master_list->HISCD->Visible) { // HISCD ?>
		<td data-name="HISCD" <?php echo $lab_test_master_list->HISCD->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCount ?>_lab_test_master_HISCD">
<span<?php echo $lab_test_master_list->HISCD->viewAttributes() ?>><?php echo $lab_test_master_list->HISCD->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master_list->PriceList->Visible) { // PriceList ?>
		<td data-name="PriceList" <?php echo $lab_test_master_list->PriceList->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCount ?>_lab_test_master_PriceList">
<span<?php echo $lab_test_master_list->PriceList->viewAttributes() ?>><?php echo $lab_test_master_list->PriceList->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master_list->IPAmt->Visible) { // IPAmt ?>
		<td data-name="IPAmt" <?php echo $lab_test_master_list->IPAmt->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCount ?>_lab_test_master_IPAmt">
<span<?php echo $lab_test_master_list->IPAmt->viewAttributes() ?>><?php echo $lab_test_master_list->IPAmt->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master_list->InsAmt->Visible) { // InsAmt ?>
		<td data-name="InsAmt" <?php echo $lab_test_master_list->InsAmt->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCount ?>_lab_test_master_InsAmt">
<span<?php echo $lab_test_master_list->InsAmt->viewAttributes() ?>><?php echo $lab_test_master_list->InsAmt->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master_list->ManualCD->Visible) { // ManualCD ?>
		<td data-name="ManualCD" <?php echo $lab_test_master_list->ManualCD->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCount ?>_lab_test_master_ManualCD">
<span<?php echo $lab_test_master_list->ManualCD->viewAttributes() ?>><?php echo $lab_test_master_list->ManualCD->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master_list->Free->Visible) { // Free ?>
		<td data-name="Free" <?php echo $lab_test_master_list->Free->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCount ?>_lab_test_master_Free">
<span<?php echo $lab_test_master_list->Free->viewAttributes() ?>><?php echo $lab_test_master_list->Free->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master_list->AutoAuth->Visible) { // AutoAuth ?>
		<td data-name="AutoAuth" <?php echo $lab_test_master_list->AutoAuth->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCount ?>_lab_test_master_AutoAuth">
<span<?php echo $lab_test_master_list->AutoAuth->viewAttributes() ?>><?php echo $lab_test_master_list->AutoAuth->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master_list->ProductCD->Visible) { // ProductCD ?>
		<td data-name="ProductCD" <?php echo $lab_test_master_list->ProductCD->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCount ?>_lab_test_master_ProductCD">
<span<?php echo $lab_test_master_list->ProductCD->viewAttributes() ?>><?php echo $lab_test_master_list->ProductCD->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master_list->Inventory->Visible) { // Inventory ?>
		<td data-name="Inventory" <?php echo $lab_test_master_list->Inventory->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCount ?>_lab_test_master_Inventory">
<span<?php echo $lab_test_master_list->Inventory->viewAttributes() ?>><?php echo $lab_test_master_list->Inventory->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master_list->IntimateTest->Visible) { // IntimateTest ?>
		<td data-name="IntimateTest" <?php echo $lab_test_master_list->IntimateTest->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCount ?>_lab_test_master_IntimateTest">
<span<?php echo $lab_test_master_list->IntimateTest->viewAttributes() ?>><?php echo $lab_test_master_list->IntimateTest->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_test_master_list->Manual->Visible) { // Manual ?>
		<td data-name="Manual" <?php echo $lab_test_master_list->Manual->cellAttributes() ?>>
<span id="el<?php echo $lab_test_master_list->RowCount ?>_lab_test_master_Manual">
<span<?php echo $lab_test_master_list->Manual->viewAttributes() ?>><?php echo $lab_test_master_list->Manual->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$lab_test_master_list->ListOptions->render("body", "right", $lab_test_master_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$lab_test_master_list->isGridAdd())
		$lab_test_master_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$lab_test_master->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($lab_test_master_list->Recordset)
	$lab_test_master_list->Recordset->Close();
?>
<?php if (!$lab_test_master_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$lab_test_master_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $lab_test_master_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $lab_test_master_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($lab_test_master_list->TotalRecords == 0 && !$lab_test_master->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $lab_test_master_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$lab_test_master_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$lab_test_master_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$lab_test_master->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_lab_test_master",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$lab_test_master_list->terminate();
?>