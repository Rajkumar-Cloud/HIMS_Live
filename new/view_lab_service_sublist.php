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
$view_lab_service_sub_list = new view_lab_service_sub_list();

// Run the page
$view_lab_service_sub_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_lab_service_sub_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$view_lab_service_sub_list->isExport()) { ?>
<script>
var fview_lab_service_sublist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fview_lab_service_sublist = currentForm = new ew.Form("fview_lab_service_sublist", "list");
	fview_lab_service_sublist.formKeyCountName = '<?php echo $view_lab_service_sub_list->FormKeyCountName ?>';
	loadjs.done("fview_lab_service_sublist");
});
var fview_lab_service_sublistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fview_lab_service_sublistsrch = currentSearchForm = new ew.Form("fview_lab_service_sublistsrch");

	// Validate function for search
	fview_lab_service_sublistsrch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fview_lab_service_sublistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_lab_service_sublistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	// Filters

	fview_lab_service_sublistsrch.filterList = <?php echo $view_lab_service_sub_list->getFilterList() ?>;
	loadjs.done("fview_lab_service_sublistsrch");
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
<?php if (!$view_lab_service_sub_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_lab_service_sub_list->TotalRecords > 0 && $view_lab_service_sub_list->ExportOptions->visible()) { ?>
<?php $view_lab_service_sub_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_lab_service_sub_list->ImportOptions->visible()) { ?>
<?php $view_lab_service_sub_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_lab_service_sub_list->SearchOptions->visible()) { ?>
<?php $view_lab_service_sub_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_lab_service_sub_list->FilterOptions->visible()) { ?>
<?php $view_lab_service_sub_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$view_lab_service_sub_list->isExport() || Config("EXPORT_MASTER_RECORD") && $view_lab_service_sub_list->isExport("print")) { ?>
<?php
if ($view_lab_service_sub_list->DbMasterFilter != "" && $view_lab_service_sub->getCurrentMasterTable() == "view_lab_service") {
	if ($view_lab_service_sub_list->MasterRecordExists) {
		include_once "view_lab_servicemaster.php";
	}
}
?>
<?php } ?>
<?php
$view_lab_service_sub_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_lab_service_sub_list->isExport() && !$view_lab_service_sub->CurrentAction) { ?>
<form name="fview_lab_service_sublistsrch" id="fview_lab_service_sublistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fview_lab_service_sublistsrch-search-panel" class="<?php echo $view_lab_service_sub_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_lab_service_sub">
	<div class="ew-extended-search">
<?php

// Render search row
$view_lab_service_sub->RowType = ROWTYPE_SEARCH;
$view_lab_service_sub->resetAttributes();
$view_lab_service_sub_list->renderRow();
?>
<?php if ($view_lab_service_sub_list->SERVICE->Visible) { // SERVICE ?>
	<?php
		$view_lab_service_sub_list->SearchColumnCount++;
		if (($view_lab_service_sub_list->SearchColumnCount - 1) % $view_lab_service_sub_list->SearchFieldsPerRow == 0) {
			$view_lab_service_sub_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_lab_service_sub_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_SERVICE" class="ew-cell form-group">
		<label for="x_SERVICE" class="ew-search-caption ew-label"><?php echo $view_lab_service_sub_list->SERVICE->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_SERVICE" id="z_SERVICE" value="LIKE">
</span>
		<span id="el_view_lab_service_sub_SERVICE" class="ew-search-field">
<input type="text" data-table="view_lab_service_sub" data-field="x_SERVICE" name="x_SERVICE" id="x_SERVICE" size="25" maxlength="50" placeholder="<?php echo HtmlEncode($view_lab_service_sub_list->SERVICE->getPlaceHolder()) ?>" value="<?php echo $view_lab_service_sub_list->SERVICE->EditValue ?>"<?php echo $view_lab_service_sub_list->SERVICE->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_lab_service_sub_list->SearchColumnCount % $view_lab_service_sub_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($view_lab_service_sub_list->SearchColumnCount % $view_lab_service_sub_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $view_lab_service_sub_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($view_lab_service_sub_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($view_lab_service_sub_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_lab_service_sub_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_lab_service_sub_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_lab_service_sub_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_lab_service_sub_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_lab_service_sub_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $view_lab_service_sub_list->showPageHeader(); ?>
<?php
$view_lab_service_sub_list->showMessage();
?>
<?php if ($view_lab_service_sub_list->TotalRecords > 0 || $view_lab_service_sub->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_lab_service_sub_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_lab_service_sub">
<?php if (!$view_lab_service_sub_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_lab_service_sub_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_lab_service_sub_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_lab_service_sub_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_lab_service_sublist" id="fview_lab_service_sublist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_lab_service_sub">
<?php if ($view_lab_service_sub->getCurrentMasterTable() == "view_lab_service" && $view_lab_service_sub->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="view_lab_service">
<input type="hidden" name="fk_CODE" value="<?php echo HtmlEncode($view_lab_service_sub_list->CODE->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_view_lab_service_sub" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($view_lab_service_sub_list->TotalRecords > 0 || $view_lab_service_sub_list->isGridEdit()) { ?>
<table id="tbl_view_lab_service_sublist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_lab_service_sub->RowType = ROWTYPE_HEADER;

// Render list options
$view_lab_service_sub_list->renderListOptions();

// Render list options (header, left)
$view_lab_service_sub_list->ListOptions->render("header", "left");
?>
<?php if ($view_lab_service_sub_list->Id->Visible) { // Id ?>
	<?php if ($view_lab_service_sub_list->SortUrl($view_lab_service_sub_list->Id) == "") { ?>
		<th data-name="Id" class="<?php echo $view_lab_service_sub_list->Id->headerCellClass() ?>"><div id="elh_view_lab_service_sub_Id" class="view_lab_service_sub_Id"><div class="ew-table-header-caption"><?php echo $view_lab_service_sub_list->Id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Id" class="<?php echo $view_lab_service_sub_list->Id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_service_sub_list->SortUrl($view_lab_service_sub_list->Id) ?>', 1);"><div id="elh_view_lab_service_sub_Id" class="view_lab_service_sub_Id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub_list->Id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub_list->Id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_sub_list->Id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub_list->CODE->Visible) { // CODE ?>
	<?php if ($view_lab_service_sub_list->SortUrl($view_lab_service_sub_list->CODE) == "") { ?>
		<th data-name="CODE" class="<?php echo $view_lab_service_sub_list->CODE->headerCellClass() ?>"><div id="elh_view_lab_service_sub_CODE" class="view_lab_service_sub_CODE"><div class="ew-table-header-caption"><?php echo $view_lab_service_sub_list->CODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CODE" class="<?php echo $view_lab_service_sub_list->CODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_service_sub_list->SortUrl($view_lab_service_sub_list->CODE) ?>', 1);"><div id="elh_view_lab_service_sub_CODE" class="view_lab_service_sub_CODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub_list->CODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub_list->CODE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_sub_list->CODE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub_list->SERVICE->Visible) { // SERVICE ?>
	<?php if ($view_lab_service_sub_list->SortUrl($view_lab_service_sub_list->SERVICE) == "") { ?>
		<th data-name="SERVICE" class="<?php echo $view_lab_service_sub_list->SERVICE->headerCellClass() ?>"><div id="elh_view_lab_service_sub_SERVICE" class="view_lab_service_sub_SERVICE"><div class="ew-table-header-caption"><?php echo $view_lab_service_sub_list->SERVICE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SERVICE" class="<?php echo $view_lab_service_sub_list->SERVICE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_service_sub_list->SortUrl($view_lab_service_sub_list->SERVICE) ?>', 1);"><div id="elh_view_lab_service_sub_SERVICE" class="view_lab_service_sub_SERVICE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub_list->SERVICE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub_list->SERVICE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_sub_list->SERVICE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub_list->UNITS->Visible) { // UNITS ?>
	<?php if ($view_lab_service_sub_list->SortUrl($view_lab_service_sub_list->UNITS) == "") { ?>
		<th data-name="UNITS" class="<?php echo $view_lab_service_sub_list->UNITS->headerCellClass() ?>"><div id="elh_view_lab_service_sub_UNITS" class="view_lab_service_sub_UNITS"><div class="ew-table-header-caption"><?php echo $view_lab_service_sub_list->UNITS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UNITS" class="<?php echo $view_lab_service_sub_list->UNITS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_service_sub_list->SortUrl($view_lab_service_sub_list->UNITS) ?>', 1);"><div id="elh_view_lab_service_sub_UNITS" class="view_lab_service_sub_UNITS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub_list->UNITS->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub_list->UNITS->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_sub_list->UNITS->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub_list->HospID->Visible) { // HospID ?>
	<?php if ($view_lab_service_sub_list->SortUrl($view_lab_service_sub_list->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_lab_service_sub_list->HospID->headerCellClass() ?>"><div id="elh_view_lab_service_sub_HospID" class="view_lab_service_sub_HospID"><div class="ew-table-header-caption"><?php echo $view_lab_service_sub_list->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_lab_service_sub_list->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_service_sub_list->SortUrl($view_lab_service_sub_list->HospID) ?>', 1);"><div id="elh_view_lab_service_sub_HospID" class="view_lab_service_sub_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub_list->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub_list->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_sub_list->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub_list->TestSubCd->Visible) { // TestSubCd ?>
	<?php if ($view_lab_service_sub_list->SortUrl($view_lab_service_sub_list->TestSubCd) == "") { ?>
		<th data-name="TestSubCd" class="<?php echo $view_lab_service_sub_list->TestSubCd->headerCellClass() ?>"><div id="elh_view_lab_service_sub_TestSubCd" class="view_lab_service_sub_TestSubCd"><div class="ew-table-header-caption"><?php echo $view_lab_service_sub_list->TestSubCd->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestSubCd" class="<?php echo $view_lab_service_sub_list->TestSubCd->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_service_sub_list->SortUrl($view_lab_service_sub_list->TestSubCd) ?>', 1);"><div id="elh_view_lab_service_sub_TestSubCd" class="view_lab_service_sub_TestSubCd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub_list->TestSubCd->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub_list->TestSubCd->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_sub_list->TestSubCd->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub_list->Method->Visible) { // Method ?>
	<?php if ($view_lab_service_sub_list->SortUrl($view_lab_service_sub_list->Method) == "") { ?>
		<th data-name="Method" class="<?php echo $view_lab_service_sub_list->Method->headerCellClass() ?>"><div id="elh_view_lab_service_sub_Method" class="view_lab_service_sub_Method"><div class="ew-table-header-caption"><?php echo $view_lab_service_sub_list->Method->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Method" class="<?php echo $view_lab_service_sub_list->Method->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_service_sub_list->SortUrl($view_lab_service_sub_list->Method) ?>', 1);"><div id="elh_view_lab_service_sub_Method" class="view_lab_service_sub_Method">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub_list->Method->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub_list->Method->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_sub_list->Method->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub_list->Order->Visible) { // Order ?>
	<?php if ($view_lab_service_sub_list->SortUrl($view_lab_service_sub_list->Order) == "") { ?>
		<th data-name="Order" class="<?php echo $view_lab_service_sub_list->Order->headerCellClass() ?>"><div id="elh_view_lab_service_sub_Order" class="view_lab_service_sub_Order"><div class="ew-table-header-caption"><?php echo $view_lab_service_sub_list->Order->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Order" class="<?php echo $view_lab_service_sub_list->Order->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_service_sub_list->SortUrl($view_lab_service_sub_list->Order) ?>', 1);"><div id="elh_view_lab_service_sub_Order" class="view_lab_service_sub_Order">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub_list->Order->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub_list->Order->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_sub_list->Order->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub_list->ResType->Visible) { // ResType ?>
	<?php if ($view_lab_service_sub_list->SortUrl($view_lab_service_sub_list->ResType) == "") { ?>
		<th data-name="ResType" class="<?php echo $view_lab_service_sub_list->ResType->headerCellClass() ?>"><div id="elh_view_lab_service_sub_ResType" class="view_lab_service_sub_ResType"><div class="ew-table-header-caption"><?php echo $view_lab_service_sub_list->ResType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ResType" class="<?php echo $view_lab_service_sub_list->ResType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_service_sub_list->SortUrl($view_lab_service_sub_list->ResType) ?>', 1);"><div id="elh_view_lab_service_sub_ResType" class="view_lab_service_sub_ResType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub_list->ResType->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub_list->ResType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_sub_list->ResType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub_list->UnitCD->Visible) { // UnitCD ?>
	<?php if ($view_lab_service_sub_list->SortUrl($view_lab_service_sub_list->UnitCD) == "") { ?>
		<th data-name="UnitCD" class="<?php echo $view_lab_service_sub_list->UnitCD->headerCellClass() ?>"><div id="elh_view_lab_service_sub_UnitCD" class="view_lab_service_sub_UnitCD"><div class="ew-table-header-caption"><?php echo $view_lab_service_sub_list->UnitCD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UnitCD" class="<?php echo $view_lab_service_sub_list->UnitCD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_service_sub_list->SortUrl($view_lab_service_sub_list->UnitCD) ?>', 1);"><div id="elh_view_lab_service_sub_UnitCD" class="view_lab_service_sub_UnitCD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub_list->UnitCD->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub_list->UnitCD->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_sub_list->UnitCD->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub_list->Sample->Visible) { // Sample ?>
	<?php if ($view_lab_service_sub_list->SortUrl($view_lab_service_sub_list->Sample) == "") { ?>
		<th data-name="Sample" class="<?php echo $view_lab_service_sub_list->Sample->headerCellClass() ?>"><div id="elh_view_lab_service_sub_Sample" class="view_lab_service_sub_Sample"><div class="ew-table-header-caption"><?php echo $view_lab_service_sub_list->Sample->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Sample" class="<?php echo $view_lab_service_sub_list->Sample->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_service_sub_list->SortUrl($view_lab_service_sub_list->Sample) ?>', 1);"><div id="elh_view_lab_service_sub_Sample" class="view_lab_service_sub_Sample">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub_list->Sample->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub_list->Sample->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_sub_list->Sample->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub_list->NoD->Visible) { // NoD ?>
	<?php if ($view_lab_service_sub_list->SortUrl($view_lab_service_sub_list->NoD) == "") { ?>
		<th data-name="NoD" class="<?php echo $view_lab_service_sub_list->NoD->headerCellClass() ?>"><div id="elh_view_lab_service_sub_NoD" class="view_lab_service_sub_NoD"><div class="ew-table-header-caption"><?php echo $view_lab_service_sub_list->NoD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoD" class="<?php echo $view_lab_service_sub_list->NoD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_service_sub_list->SortUrl($view_lab_service_sub_list->NoD) ?>', 1);"><div id="elh_view_lab_service_sub_NoD" class="view_lab_service_sub_NoD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub_list->NoD->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub_list->NoD->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_sub_list->NoD->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub_list->BillOrder->Visible) { // BillOrder ?>
	<?php if ($view_lab_service_sub_list->SortUrl($view_lab_service_sub_list->BillOrder) == "") { ?>
		<th data-name="BillOrder" class="<?php echo $view_lab_service_sub_list->BillOrder->headerCellClass() ?>"><div id="elh_view_lab_service_sub_BillOrder" class="view_lab_service_sub_BillOrder"><div class="ew-table-header-caption"><?php echo $view_lab_service_sub_list->BillOrder->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillOrder" class="<?php echo $view_lab_service_sub_list->BillOrder->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_service_sub_list->SortUrl($view_lab_service_sub_list->BillOrder) ?>', 1);"><div id="elh_view_lab_service_sub_BillOrder" class="view_lab_service_sub_BillOrder">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub_list->BillOrder->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub_list->BillOrder->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_sub_list->BillOrder->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub_list->Formula->Visible) { // Formula ?>
	<?php if ($view_lab_service_sub_list->SortUrl($view_lab_service_sub_list->Formula) == "") { ?>
		<th data-name="Formula" class="<?php echo $view_lab_service_sub_list->Formula->headerCellClass() ?>"><div id="elh_view_lab_service_sub_Formula" class="view_lab_service_sub_Formula"><div class="ew-table-header-caption"><?php echo $view_lab_service_sub_list->Formula->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Formula" class="<?php echo $view_lab_service_sub_list->Formula->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_service_sub_list->SortUrl($view_lab_service_sub_list->Formula) ?>', 1);"><div id="elh_view_lab_service_sub_Formula" class="view_lab_service_sub_Formula">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub_list->Formula->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub_list->Formula->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_sub_list->Formula->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub_list->Inactive->Visible) { // Inactive ?>
	<?php if ($view_lab_service_sub_list->SortUrl($view_lab_service_sub_list->Inactive) == "") { ?>
		<th data-name="Inactive" class="<?php echo $view_lab_service_sub_list->Inactive->headerCellClass() ?>"><div id="elh_view_lab_service_sub_Inactive" class="view_lab_service_sub_Inactive"><div class="ew-table-header-caption"><?php echo $view_lab_service_sub_list->Inactive->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Inactive" class="<?php echo $view_lab_service_sub_list->Inactive->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_service_sub_list->SortUrl($view_lab_service_sub_list->Inactive) ?>', 1);"><div id="elh_view_lab_service_sub_Inactive" class="view_lab_service_sub_Inactive">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub_list->Inactive->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub_list->Inactive->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_sub_list->Inactive->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub_list->Outsource->Visible) { // Outsource ?>
	<?php if ($view_lab_service_sub_list->SortUrl($view_lab_service_sub_list->Outsource) == "") { ?>
		<th data-name="Outsource" class="<?php echo $view_lab_service_sub_list->Outsource->headerCellClass() ?>"><div id="elh_view_lab_service_sub_Outsource" class="view_lab_service_sub_Outsource"><div class="ew-table-header-caption"><?php echo $view_lab_service_sub_list->Outsource->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Outsource" class="<?php echo $view_lab_service_sub_list->Outsource->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_service_sub_list->SortUrl($view_lab_service_sub_list->Outsource) ?>', 1);"><div id="elh_view_lab_service_sub_Outsource" class="view_lab_service_sub_Outsource">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub_list->Outsource->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub_list->Outsource->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_sub_list->Outsource->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_lab_service_sub_list->CollSample->Visible) { // CollSample ?>
	<?php if ($view_lab_service_sub_list->SortUrl($view_lab_service_sub_list->CollSample) == "") { ?>
		<th data-name="CollSample" class="<?php echo $view_lab_service_sub_list->CollSample->headerCellClass() ?>"><div id="elh_view_lab_service_sub_CollSample" class="view_lab_service_sub_CollSample"><div class="ew-table-header-caption"><?php echo $view_lab_service_sub_list->CollSample->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CollSample" class="<?php echo $view_lab_service_sub_list->CollSample->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_lab_service_sub_list->SortUrl($view_lab_service_sub_list->CollSample) ?>', 1);"><div id="elh_view_lab_service_sub_CollSample" class="view_lab_service_sub_CollSample">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_lab_service_sub_list->CollSample->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_lab_service_sub_list->CollSample->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_lab_service_sub_list->CollSample->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_lab_service_sub_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_lab_service_sub_list->ExportAll && $view_lab_service_sub_list->isExport()) {
	$view_lab_service_sub_list->StopRecord = $view_lab_service_sub_list->TotalRecords;
} else {

	// Set the last record to display
	if ($view_lab_service_sub_list->TotalRecords > $view_lab_service_sub_list->StartRecord + $view_lab_service_sub_list->DisplayRecords - 1)
		$view_lab_service_sub_list->StopRecord = $view_lab_service_sub_list->StartRecord + $view_lab_service_sub_list->DisplayRecords - 1;
	else
		$view_lab_service_sub_list->StopRecord = $view_lab_service_sub_list->TotalRecords;
}
$view_lab_service_sub_list->RecordCount = $view_lab_service_sub_list->StartRecord - 1;
if ($view_lab_service_sub_list->Recordset && !$view_lab_service_sub_list->Recordset->EOF) {
	$view_lab_service_sub_list->Recordset->moveFirst();
	$selectLimit = $view_lab_service_sub_list->UseSelectLimit;
	if (!$selectLimit && $view_lab_service_sub_list->StartRecord > 1)
		$view_lab_service_sub_list->Recordset->move($view_lab_service_sub_list->StartRecord - 1);
} elseif (!$view_lab_service_sub->AllowAddDeleteRow && $view_lab_service_sub_list->StopRecord == 0) {
	$view_lab_service_sub_list->StopRecord = $view_lab_service_sub->GridAddRowCount;
}

// Initialize aggregate
$view_lab_service_sub->RowType = ROWTYPE_AGGREGATEINIT;
$view_lab_service_sub->resetAttributes();
$view_lab_service_sub_list->renderRow();
while ($view_lab_service_sub_list->RecordCount < $view_lab_service_sub_list->StopRecord) {
	$view_lab_service_sub_list->RecordCount++;
	if ($view_lab_service_sub_list->RecordCount >= $view_lab_service_sub_list->StartRecord) {
		$view_lab_service_sub_list->RowCount++;

		// Set up key count
		$view_lab_service_sub_list->KeyCount = $view_lab_service_sub_list->RowIndex;

		// Init row class and style
		$view_lab_service_sub->resetAttributes();
		$view_lab_service_sub->CssClass = "";
		if ($view_lab_service_sub_list->isGridAdd()) {
		} else {
			$view_lab_service_sub_list->loadRowValues($view_lab_service_sub_list->Recordset); // Load row values
		}
		$view_lab_service_sub->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_lab_service_sub->RowAttrs->merge(["data-rowindex" => $view_lab_service_sub_list->RowCount, "id" => "r" . $view_lab_service_sub_list->RowCount . "_view_lab_service_sub", "data-rowtype" => $view_lab_service_sub->RowType]);

		// Render row
		$view_lab_service_sub_list->renderRow();

		// Render list options
		$view_lab_service_sub_list->renderListOptions();
?>
	<tr <?php echo $view_lab_service_sub->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_lab_service_sub_list->ListOptions->render("body", "left", $view_lab_service_sub_list->RowCount);
?>
	<?php if ($view_lab_service_sub_list->Id->Visible) { // Id ?>
		<td data-name="Id" <?php echo $view_lab_service_sub_list->Id->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_sub_list->RowCount ?>_view_lab_service_sub_Id">
<span<?php echo $view_lab_service_sub_list->Id->viewAttributes() ?>><?php echo $view_lab_service_sub_list->Id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub_list->CODE->Visible) { // CODE ?>
		<td data-name="CODE" <?php echo $view_lab_service_sub_list->CODE->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_sub_list->RowCount ?>_view_lab_service_sub_CODE">
<span<?php echo $view_lab_service_sub_list->CODE->viewAttributes() ?>><?php echo $view_lab_service_sub_list->CODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub_list->SERVICE->Visible) { // SERVICE ?>
		<td data-name="SERVICE" <?php echo $view_lab_service_sub_list->SERVICE->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_sub_list->RowCount ?>_view_lab_service_sub_SERVICE">
<span<?php echo $view_lab_service_sub_list->SERVICE->viewAttributes() ?>><?php echo $view_lab_service_sub_list->SERVICE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub_list->UNITS->Visible) { // UNITS ?>
		<td data-name="UNITS" <?php echo $view_lab_service_sub_list->UNITS->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_sub_list->RowCount ?>_view_lab_service_sub_UNITS">
<span<?php echo $view_lab_service_sub_list->UNITS->viewAttributes() ?>><?php echo $view_lab_service_sub_list->UNITS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $view_lab_service_sub_list->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_sub_list->RowCount ?>_view_lab_service_sub_HospID">
<span<?php echo $view_lab_service_sub_list->HospID->viewAttributes() ?>><?php echo $view_lab_service_sub_list->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub_list->TestSubCd->Visible) { // TestSubCd ?>
		<td data-name="TestSubCd" <?php echo $view_lab_service_sub_list->TestSubCd->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_sub_list->RowCount ?>_view_lab_service_sub_TestSubCd">
<span<?php echo $view_lab_service_sub_list->TestSubCd->viewAttributes() ?>><?php echo $view_lab_service_sub_list->TestSubCd->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub_list->Method->Visible) { // Method ?>
		<td data-name="Method" <?php echo $view_lab_service_sub_list->Method->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_sub_list->RowCount ?>_view_lab_service_sub_Method">
<span<?php echo $view_lab_service_sub_list->Method->viewAttributes() ?>><?php echo $view_lab_service_sub_list->Method->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub_list->Order->Visible) { // Order ?>
		<td data-name="Order" <?php echo $view_lab_service_sub_list->Order->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_sub_list->RowCount ?>_view_lab_service_sub_Order">
<span<?php echo $view_lab_service_sub_list->Order->viewAttributes() ?>><?php echo $view_lab_service_sub_list->Order->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub_list->ResType->Visible) { // ResType ?>
		<td data-name="ResType" <?php echo $view_lab_service_sub_list->ResType->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_sub_list->RowCount ?>_view_lab_service_sub_ResType">
<span<?php echo $view_lab_service_sub_list->ResType->viewAttributes() ?>><?php echo $view_lab_service_sub_list->ResType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub_list->UnitCD->Visible) { // UnitCD ?>
		<td data-name="UnitCD" <?php echo $view_lab_service_sub_list->UnitCD->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_sub_list->RowCount ?>_view_lab_service_sub_UnitCD">
<span<?php echo $view_lab_service_sub_list->UnitCD->viewAttributes() ?>><?php echo $view_lab_service_sub_list->UnitCD->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub_list->Sample->Visible) { // Sample ?>
		<td data-name="Sample" <?php echo $view_lab_service_sub_list->Sample->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_sub_list->RowCount ?>_view_lab_service_sub_Sample">
<span<?php echo $view_lab_service_sub_list->Sample->viewAttributes() ?>><?php echo $view_lab_service_sub_list->Sample->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub_list->NoD->Visible) { // NoD ?>
		<td data-name="NoD" <?php echo $view_lab_service_sub_list->NoD->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_sub_list->RowCount ?>_view_lab_service_sub_NoD">
<span<?php echo $view_lab_service_sub_list->NoD->viewAttributes() ?>><?php echo $view_lab_service_sub_list->NoD->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub_list->BillOrder->Visible) { // BillOrder ?>
		<td data-name="BillOrder" <?php echo $view_lab_service_sub_list->BillOrder->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_sub_list->RowCount ?>_view_lab_service_sub_BillOrder">
<span<?php echo $view_lab_service_sub_list->BillOrder->viewAttributes() ?>><?php echo $view_lab_service_sub_list->BillOrder->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub_list->Formula->Visible) { // Formula ?>
		<td data-name="Formula" <?php echo $view_lab_service_sub_list->Formula->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_sub_list->RowCount ?>_view_lab_service_sub_Formula">
<span<?php echo $view_lab_service_sub_list->Formula->viewAttributes() ?>><?php echo $view_lab_service_sub_list->Formula->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub_list->Inactive->Visible) { // Inactive ?>
		<td data-name="Inactive" <?php echo $view_lab_service_sub_list->Inactive->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_sub_list->RowCount ?>_view_lab_service_sub_Inactive">
<span<?php echo $view_lab_service_sub_list->Inactive->viewAttributes() ?>><?php echo $view_lab_service_sub_list->Inactive->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub_list->Outsource->Visible) { // Outsource ?>
		<td data-name="Outsource" <?php echo $view_lab_service_sub_list->Outsource->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_sub_list->RowCount ?>_view_lab_service_sub_Outsource">
<span<?php echo $view_lab_service_sub_list->Outsource->viewAttributes() ?>><?php echo $view_lab_service_sub_list->Outsource->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_lab_service_sub_list->CollSample->Visible) { // CollSample ?>
		<td data-name="CollSample" <?php echo $view_lab_service_sub_list->CollSample->cellAttributes() ?>>
<span id="el<?php echo $view_lab_service_sub_list->RowCount ?>_view_lab_service_sub_CollSample">
<span<?php echo $view_lab_service_sub_list->CollSample->viewAttributes() ?>><?php echo $view_lab_service_sub_list->CollSample->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_lab_service_sub_list->ListOptions->render("body", "right", $view_lab_service_sub_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$view_lab_service_sub_list->isGridAdd())
		$view_lab_service_sub_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$view_lab_service_sub->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_lab_service_sub_list->Recordset)
	$view_lab_service_sub_list->Recordset->Close();
?>
<?php if (!$view_lab_service_sub_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_lab_service_sub_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_lab_service_sub_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_lab_service_sub_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_lab_service_sub_list->TotalRecords == 0 && !$view_lab_service_sub->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_lab_service_sub_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_lab_service_sub_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_lab_service_sub_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	$("[data-name='id']").hide(),$("[data-name='id']").width("8px"),$("[data-name='UNITS']").width("8px"),$("[data-name='TestSubCd']").width("8px"),$("[data-name='Method']").width("8px"),$("[data-name='Order']").width("8px"),$("[data-name='ResType']").width("8px"),$("[data-name='UnitCD']").width("8px"),$("[data-name='Sample']").width("8px"),$("[data-name='NoD']").width("8px"),$("[data-name='BillOrder']").width("8px"),$("[data-name='Formula']").width("8px"),$("[data-name='Inactive']").width("8px"),$("[data-name='Outsource']").width("8px"),$("[data-name='CollSample']").width("8px");
});
</script>
<?php if (!$view_lab_service_sub->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_view_lab_service_sub",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$view_lab_service_sub_list->terminate();
?>