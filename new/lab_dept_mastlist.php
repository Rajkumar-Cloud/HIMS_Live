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
$lab_dept_mast_list = new lab_dept_mast_list();

// Run the page
$lab_dept_mast_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_dept_mast_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$lab_dept_mast_list->isExport()) { ?>
<script>
var flab_dept_mastlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	flab_dept_mastlist = currentForm = new ew.Form("flab_dept_mastlist", "list");
	flab_dept_mastlist.formKeyCountName = '<?php echo $lab_dept_mast_list->FormKeyCountName ?>';
	loadjs.done("flab_dept_mastlist");
});
var flab_dept_mastlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	flab_dept_mastlistsrch = currentSearchForm = new ew.Form("flab_dept_mastlistsrch");

	// Dynamic selection lists
	// Filters

	flab_dept_mastlistsrch.filterList = <?php echo $lab_dept_mast_list->getFilterList() ?>;
	loadjs.done("flab_dept_mastlistsrch");
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
<?php if (!$lab_dept_mast_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($lab_dept_mast_list->TotalRecords > 0 && $lab_dept_mast_list->ExportOptions->visible()) { ?>
<?php $lab_dept_mast_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($lab_dept_mast_list->ImportOptions->visible()) { ?>
<?php $lab_dept_mast_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($lab_dept_mast_list->SearchOptions->visible()) { ?>
<?php $lab_dept_mast_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($lab_dept_mast_list->FilterOptions->visible()) { ?>
<?php $lab_dept_mast_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$lab_dept_mast_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$lab_dept_mast_list->isExport() && !$lab_dept_mast->CurrentAction) { ?>
<form name="flab_dept_mastlistsrch" id="flab_dept_mastlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="flab_dept_mastlistsrch-search-panel" class="<?php echo $lab_dept_mast_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="lab_dept_mast">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $lab_dept_mast_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($lab_dept_mast_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($lab_dept_mast_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $lab_dept_mast_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($lab_dept_mast_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($lab_dept_mast_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($lab_dept_mast_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($lab_dept_mast_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $lab_dept_mast_list->showPageHeader(); ?>
<?php
$lab_dept_mast_list->showMessage();
?>
<?php if ($lab_dept_mast_list->TotalRecords > 0 || $lab_dept_mast->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($lab_dept_mast_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> lab_dept_mast">
<?php if (!$lab_dept_mast_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$lab_dept_mast_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $lab_dept_mast_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $lab_dept_mast_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="flab_dept_mastlist" id="flab_dept_mastlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_dept_mast">
<div id="gmp_lab_dept_mast" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($lab_dept_mast_list->TotalRecords > 0 || $lab_dept_mast_list->isGridEdit()) { ?>
<table id="tbl_lab_dept_mastlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$lab_dept_mast->RowType = ROWTYPE_HEADER;

// Render list options
$lab_dept_mast_list->renderListOptions();

// Render list options (header, left)
$lab_dept_mast_list->ListOptions->render("header", "left");
?>
<?php if ($lab_dept_mast_list->MainCD->Visible) { // MainCD ?>
	<?php if ($lab_dept_mast_list->SortUrl($lab_dept_mast_list->MainCD) == "") { ?>
		<th data-name="MainCD" class="<?php echo $lab_dept_mast_list->MainCD->headerCellClass() ?>"><div id="elh_lab_dept_mast_MainCD" class="lab_dept_mast_MainCD"><div class="ew-table-header-caption"><?php echo $lab_dept_mast_list->MainCD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MainCD" class="<?php echo $lab_dept_mast_list->MainCD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_dept_mast_list->SortUrl($lab_dept_mast_list->MainCD) ?>', 1);"><div id="elh_lab_dept_mast_MainCD" class="lab_dept_mast_MainCD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_dept_mast_list->MainCD->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_dept_mast_list->MainCD->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_dept_mast_list->MainCD->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_dept_mast_list->Code->Visible) { // Code ?>
	<?php if ($lab_dept_mast_list->SortUrl($lab_dept_mast_list->Code) == "") { ?>
		<th data-name="Code" class="<?php echo $lab_dept_mast_list->Code->headerCellClass() ?>"><div id="elh_lab_dept_mast_Code" class="lab_dept_mast_Code"><div class="ew-table-header-caption"><?php echo $lab_dept_mast_list->Code->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Code" class="<?php echo $lab_dept_mast_list->Code->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_dept_mast_list->SortUrl($lab_dept_mast_list->Code) ?>', 1);"><div id="elh_lab_dept_mast_Code" class="lab_dept_mast_Code">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_dept_mast_list->Code->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_dept_mast_list->Code->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_dept_mast_list->Code->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_dept_mast_list->Name->Visible) { // Name ?>
	<?php if ($lab_dept_mast_list->SortUrl($lab_dept_mast_list->Name) == "") { ?>
		<th data-name="Name" class="<?php echo $lab_dept_mast_list->Name->headerCellClass() ?>"><div id="elh_lab_dept_mast_Name" class="lab_dept_mast_Name"><div class="ew-table-header-caption"><?php echo $lab_dept_mast_list->Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Name" class="<?php echo $lab_dept_mast_list->Name->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_dept_mast_list->SortUrl($lab_dept_mast_list->Name) ?>', 1);"><div id="elh_lab_dept_mast_Name" class="lab_dept_mast_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_dept_mast_list->Name->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_dept_mast_list->Name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_dept_mast_list->Name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_dept_mast_list->Order->Visible) { // Order ?>
	<?php if ($lab_dept_mast_list->SortUrl($lab_dept_mast_list->Order) == "") { ?>
		<th data-name="Order" class="<?php echo $lab_dept_mast_list->Order->headerCellClass() ?>"><div id="elh_lab_dept_mast_Order" class="lab_dept_mast_Order"><div class="ew-table-header-caption"><?php echo $lab_dept_mast_list->Order->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Order" class="<?php echo $lab_dept_mast_list->Order->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_dept_mast_list->SortUrl($lab_dept_mast_list->Order) ?>', 1);"><div id="elh_lab_dept_mast_Order" class="lab_dept_mast_Order">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_dept_mast_list->Order->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_dept_mast_list->Order->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_dept_mast_list->Order->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_dept_mast_list->SignCD->Visible) { // SignCD ?>
	<?php if ($lab_dept_mast_list->SortUrl($lab_dept_mast_list->SignCD) == "") { ?>
		<th data-name="SignCD" class="<?php echo $lab_dept_mast_list->SignCD->headerCellClass() ?>"><div id="elh_lab_dept_mast_SignCD" class="lab_dept_mast_SignCD"><div class="ew-table-header-caption"><?php echo $lab_dept_mast_list->SignCD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SignCD" class="<?php echo $lab_dept_mast_list->SignCD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_dept_mast_list->SortUrl($lab_dept_mast_list->SignCD) ?>', 1);"><div id="elh_lab_dept_mast_SignCD" class="lab_dept_mast_SignCD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_dept_mast_list->SignCD->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_dept_mast_list->SignCD->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_dept_mast_list->SignCD->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_dept_mast_list->Collection->Visible) { // Collection ?>
	<?php if ($lab_dept_mast_list->SortUrl($lab_dept_mast_list->Collection) == "") { ?>
		<th data-name="Collection" class="<?php echo $lab_dept_mast_list->Collection->headerCellClass() ?>"><div id="elh_lab_dept_mast_Collection" class="lab_dept_mast_Collection"><div class="ew-table-header-caption"><?php echo $lab_dept_mast_list->Collection->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Collection" class="<?php echo $lab_dept_mast_list->Collection->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_dept_mast_list->SortUrl($lab_dept_mast_list->Collection) ?>', 1);"><div id="elh_lab_dept_mast_Collection" class="lab_dept_mast_Collection">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_dept_mast_list->Collection->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_dept_mast_list->Collection->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_dept_mast_list->Collection->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_dept_mast_list->EditDate->Visible) { // EditDate ?>
	<?php if ($lab_dept_mast_list->SortUrl($lab_dept_mast_list->EditDate) == "") { ?>
		<th data-name="EditDate" class="<?php echo $lab_dept_mast_list->EditDate->headerCellClass() ?>"><div id="elh_lab_dept_mast_EditDate" class="lab_dept_mast_EditDate"><div class="ew-table-header-caption"><?php echo $lab_dept_mast_list->EditDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EditDate" class="<?php echo $lab_dept_mast_list->EditDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_dept_mast_list->SortUrl($lab_dept_mast_list->EditDate) ?>', 1);"><div id="elh_lab_dept_mast_EditDate" class="lab_dept_mast_EditDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_dept_mast_list->EditDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_dept_mast_list->EditDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_dept_mast_list->EditDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_dept_mast_list->SMS->Visible) { // SMS ?>
	<?php if ($lab_dept_mast_list->SortUrl($lab_dept_mast_list->SMS) == "") { ?>
		<th data-name="SMS" class="<?php echo $lab_dept_mast_list->SMS->headerCellClass() ?>"><div id="elh_lab_dept_mast_SMS" class="lab_dept_mast_SMS"><div class="ew-table-header-caption"><?php echo $lab_dept_mast_list->SMS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SMS" class="<?php echo $lab_dept_mast_list->SMS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_dept_mast_list->SortUrl($lab_dept_mast_list->SMS) ?>', 1);"><div id="elh_lab_dept_mast_SMS" class="lab_dept_mast_SMS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_dept_mast_list->SMS->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_dept_mast_list->SMS->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_dept_mast_list->SMS->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_dept_mast_list->WorkList->Visible) { // WorkList ?>
	<?php if ($lab_dept_mast_list->SortUrl($lab_dept_mast_list->WorkList) == "") { ?>
		<th data-name="WorkList" class="<?php echo $lab_dept_mast_list->WorkList->headerCellClass() ?>"><div id="elh_lab_dept_mast_WorkList" class="lab_dept_mast_WorkList"><div class="ew-table-header-caption"><?php echo $lab_dept_mast_list->WorkList->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="WorkList" class="<?php echo $lab_dept_mast_list->WorkList->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_dept_mast_list->SortUrl($lab_dept_mast_list->WorkList) ?>', 1);"><div id="elh_lab_dept_mast_WorkList" class="lab_dept_mast_WorkList">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_dept_mast_list->WorkList->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_dept_mast_list->WorkList->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_dept_mast_list->WorkList->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_dept_mast_list->_Page->Visible) { // Page ?>
	<?php if ($lab_dept_mast_list->SortUrl($lab_dept_mast_list->_Page) == "") { ?>
		<th data-name="_Page" class="<?php echo $lab_dept_mast_list->_Page->headerCellClass() ?>"><div id="elh_lab_dept_mast__Page" class="lab_dept_mast__Page"><div class="ew-table-header-caption"><?php echo $lab_dept_mast_list->_Page->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_Page" class="<?php echo $lab_dept_mast_list->_Page->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_dept_mast_list->SortUrl($lab_dept_mast_list->_Page) ?>', 1);"><div id="elh_lab_dept_mast__Page" class="lab_dept_mast__Page">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_dept_mast_list->_Page->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_dept_mast_list->_Page->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_dept_mast_list->_Page->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_dept_mast_list->Incharge->Visible) { // Incharge ?>
	<?php if ($lab_dept_mast_list->SortUrl($lab_dept_mast_list->Incharge) == "") { ?>
		<th data-name="Incharge" class="<?php echo $lab_dept_mast_list->Incharge->headerCellClass() ?>"><div id="elh_lab_dept_mast_Incharge" class="lab_dept_mast_Incharge"><div class="ew-table-header-caption"><?php echo $lab_dept_mast_list->Incharge->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Incharge" class="<?php echo $lab_dept_mast_list->Incharge->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_dept_mast_list->SortUrl($lab_dept_mast_list->Incharge) ?>', 1);"><div id="elh_lab_dept_mast_Incharge" class="lab_dept_mast_Incharge">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_dept_mast_list->Incharge->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_dept_mast_list->Incharge->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_dept_mast_list->Incharge->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_dept_mast_list->AutoNum->Visible) { // AutoNum ?>
	<?php if ($lab_dept_mast_list->SortUrl($lab_dept_mast_list->AutoNum) == "") { ?>
		<th data-name="AutoNum" class="<?php echo $lab_dept_mast_list->AutoNum->headerCellClass() ?>"><div id="elh_lab_dept_mast_AutoNum" class="lab_dept_mast_AutoNum"><div class="ew-table-header-caption"><?php echo $lab_dept_mast_list->AutoNum->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AutoNum" class="<?php echo $lab_dept_mast_list->AutoNum->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_dept_mast_list->SortUrl($lab_dept_mast_list->AutoNum) ?>', 1);"><div id="elh_lab_dept_mast_AutoNum" class="lab_dept_mast_AutoNum">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_dept_mast_list->AutoNum->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_dept_mast_list->AutoNum->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_dept_mast_list->AutoNum->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_dept_mast_list->id->Visible) { // id ?>
	<?php if ($lab_dept_mast_list->SortUrl($lab_dept_mast_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $lab_dept_mast_list->id->headerCellClass() ?>"><div id="elh_lab_dept_mast_id" class="lab_dept_mast_id"><div class="ew-table-header-caption"><?php echo $lab_dept_mast_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $lab_dept_mast_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_dept_mast_list->SortUrl($lab_dept_mast_list->id) ?>', 1);"><div id="elh_lab_dept_mast_id" class="lab_dept_mast_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_dept_mast_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_dept_mast_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_dept_mast_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$lab_dept_mast_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($lab_dept_mast_list->ExportAll && $lab_dept_mast_list->isExport()) {
	$lab_dept_mast_list->StopRecord = $lab_dept_mast_list->TotalRecords;
} else {

	// Set the last record to display
	if ($lab_dept_mast_list->TotalRecords > $lab_dept_mast_list->StartRecord + $lab_dept_mast_list->DisplayRecords - 1)
		$lab_dept_mast_list->StopRecord = $lab_dept_mast_list->StartRecord + $lab_dept_mast_list->DisplayRecords - 1;
	else
		$lab_dept_mast_list->StopRecord = $lab_dept_mast_list->TotalRecords;
}
$lab_dept_mast_list->RecordCount = $lab_dept_mast_list->StartRecord - 1;
if ($lab_dept_mast_list->Recordset && !$lab_dept_mast_list->Recordset->EOF) {
	$lab_dept_mast_list->Recordset->moveFirst();
	$selectLimit = $lab_dept_mast_list->UseSelectLimit;
	if (!$selectLimit && $lab_dept_mast_list->StartRecord > 1)
		$lab_dept_mast_list->Recordset->move($lab_dept_mast_list->StartRecord - 1);
} elseif (!$lab_dept_mast->AllowAddDeleteRow && $lab_dept_mast_list->StopRecord == 0) {
	$lab_dept_mast_list->StopRecord = $lab_dept_mast->GridAddRowCount;
}

// Initialize aggregate
$lab_dept_mast->RowType = ROWTYPE_AGGREGATEINIT;
$lab_dept_mast->resetAttributes();
$lab_dept_mast_list->renderRow();
while ($lab_dept_mast_list->RecordCount < $lab_dept_mast_list->StopRecord) {
	$lab_dept_mast_list->RecordCount++;
	if ($lab_dept_mast_list->RecordCount >= $lab_dept_mast_list->StartRecord) {
		$lab_dept_mast_list->RowCount++;

		// Set up key count
		$lab_dept_mast_list->KeyCount = $lab_dept_mast_list->RowIndex;

		// Init row class and style
		$lab_dept_mast->resetAttributes();
		$lab_dept_mast->CssClass = "";
		if ($lab_dept_mast_list->isGridAdd()) {
		} else {
			$lab_dept_mast_list->loadRowValues($lab_dept_mast_list->Recordset); // Load row values
		}
		$lab_dept_mast->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$lab_dept_mast->RowAttrs->merge(["data-rowindex" => $lab_dept_mast_list->RowCount, "id" => "r" . $lab_dept_mast_list->RowCount . "_lab_dept_mast", "data-rowtype" => $lab_dept_mast->RowType]);

		// Render row
		$lab_dept_mast_list->renderRow();

		// Render list options
		$lab_dept_mast_list->renderListOptions();
?>
	<tr <?php echo $lab_dept_mast->rowAttributes() ?>>
<?php

// Render list options (body, left)
$lab_dept_mast_list->ListOptions->render("body", "left", $lab_dept_mast_list->RowCount);
?>
	<?php if ($lab_dept_mast_list->MainCD->Visible) { // MainCD ?>
		<td data-name="MainCD" <?php echo $lab_dept_mast_list->MainCD->cellAttributes() ?>>
<span id="el<?php echo $lab_dept_mast_list->RowCount ?>_lab_dept_mast_MainCD">
<span<?php echo $lab_dept_mast_list->MainCD->viewAttributes() ?>><?php echo $lab_dept_mast_list->MainCD->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_dept_mast_list->Code->Visible) { // Code ?>
		<td data-name="Code" <?php echo $lab_dept_mast_list->Code->cellAttributes() ?>>
<span id="el<?php echo $lab_dept_mast_list->RowCount ?>_lab_dept_mast_Code">
<span<?php echo $lab_dept_mast_list->Code->viewAttributes() ?>><?php echo $lab_dept_mast_list->Code->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_dept_mast_list->Name->Visible) { // Name ?>
		<td data-name="Name" <?php echo $lab_dept_mast_list->Name->cellAttributes() ?>>
<span id="el<?php echo $lab_dept_mast_list->RowCount ?>_lab_dept_mast_Name">
<span<?php echo $lab_dept_mast_list->Name->viewAttributes() ?>><?php echo $lab_dept_mast_list->Name->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_dept_mast_list->Order->Visible) { // Order ?>
		<td data-name="Order" <?php echo $lab_dept_mast_list->Order->cellAttributes() ?>>
<span id="el<?php echo $lab_dept_mast_list->RowCount ?>_lab_dept_mast_Order">
<span<?php echo $lab_dept_mast_list->Order->viewAttributes() ?>><?php echo $lab_dept_mast_list->Order->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_dept_mast_list->SignCD->Visible) { // SignCD ?>
		<td data-name="SignCD" <?php echo $lab_dept_mast_list->SignCD->cellAttributes() ?>>
<span id="el<?php echo $lab_dept_mast_list->RowCount ?>_lab_dept_mast_SignCD">
<span<?php echo $lab_dept_mast_list->SignCD->viewAttributes() ?>><?php echo $lab_dept_mast_list->SignCD->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_dept_mast_list->Collection->Visible) { // Collection ?>
		<td data-name="Collection" <?php echo $lab_dept_mast_list->Collection->cellAttributes() ?>>
<span id="el<?php echo $lab_dept_mast_list->RowCount ?>_lab_dept_mast_Collection">
<span<?php echo $lab_dept_mast_list->Collection->viewAttributes() ?>><?php echo $lab_dept_mast_list->Collection->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_dept_mast_list->EditDate->Visible) { // EditDate ?>
		<td data-name="EditDate" <?php echo $lab_dept_mast_list->EditDate->cellAttributes() ?>>
<span id="el<?php echo $lab_dept_mast_list->RowCount ?>_lab_dept_mast_EditDate">
<span<?php echo $lab_dept_mast_list->EditDate->viewAttributes() ?>><?php echo $lab_dept_mast_list->EditDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_dept_mast_list->SMS->Visible) { // SMS ?>
		<td data-name="SMS" <?php echo $lab_dept_mast_list->SMS->cellAttributes() ?>>
<span id="el<?php echo $lab_dept_mast_list->RowCount ?>_lab_dept_mast_SMS">
<span<?php echo $lab_dept_mast_list->SMS->viewAttributes() ?>><?php echo $lab_dept_mast_list->SMS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_dept_mast_list->WorkList->Visible) { // WorkList ?>
		<td data-name="WorkList" <?php echo $lab_dept_mast_list->WorkList->cellAttributes() ?>>
<span id="el<?php echo $lab_dept_mast_list->RowCount ?>_lab_dept_mast_WorkList">
<span<?php echo $lab_dept_mast_list->WorkList->viewAttributes() ?>><?php echo $lab_dept_mast_list->WorkList->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_dept_mast_list->_Page->Visible) { // Page ?>
		<td data-name="_Page" <?php echo $lab_dept_mast_list->_Page->cellAttributes() ?>>
<span id="el<?php echo $lab_dept_mast_list->RowCount ?>_lab_dept_mast__Page">
<span<?php echo $lab_dept_mast_list->_Page->viewAttributes() ?>><?php echo $lab_dept_mast_list->_Page->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_dept_mast_list->Incharge->Visible) { // Incharge ?>
		<td data-name="Incharge" <?php echo $lab_dept_mast_list->Incharge->cellAttributes() ?>>
<span id="el<?php echo $lab_dept_mast_list->RowCount ?>_lab_dept_mast_Incharge">
<span<?php echo $lab_dept_mast_list->Incharge->viewAttributes() ?>><?php echo $lab_dept_mast_list->Incharge->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_dept_mast_list->AutoNum->Visible) { // AutoNum ?>
		<td data-name="AutoNum" <?php echo $lab_dept_mast_list->AutoNum->cellAttributes() ?>>
<span id="el<?php echo $lab_dept_mast_list->RowCount ?>_lab_dept_mast_AutoNum">
<span<?php echo $lab_dept_mast_list->AutoNum->viewAttributes() ?>><?php echo $lab_dept_mast_list->AutoNum->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($lab_dept_mast_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $lab_dept_mast_list->id->cellAttributes() ?>>
<span id="el<?php echo $lab_dept_mast_list->RowCount ?>_lab_dept_mast_id">
<span<?php echo $lab_dept_mast_list->id->viewAttributes() ?>><?php echo $lab_dept_mast_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$lab_dept_mast_list->ListOptions->render("body", "right", $lab_dept_mast_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$lab_dept_mast_list->isGridAdd())
		$lab_dept_mast_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$lab_dept_mast->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($lab_dept_mast_list->Recordset)
	$lab_dept_mast_list->Recordset->Close();
?>
<?php if (!$lab_dept_mast_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$lab_dept_mast_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $lab_dept_mast_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $lab_dept_mast_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($lab_dept_mast_list->TotalRecords == 0 && !$lab_dept_mast->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $lab_dept_mast_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$lab_dept_mast_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$lab_dept_mast_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$lab_dept_mast->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_lab_dept_mast",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$lab_dept_mast_list->terminate();
?>