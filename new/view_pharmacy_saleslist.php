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
$view_pharmacy_sales_list = new view_pharmacy_sales_list();

// Run the page
$view_pharmacy_sales_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacy_sales_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$view_pharmacy_sales_list->isExport()) { ?>
<script>
var fview_pharmacy_saleslist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fview_pharmacy_saleslist = currentForm = new ew.Form("fview_pharmacy_saleslist", "list");
	fview_pharmacy_saleslist.formKeyCountName = '<?php echo $view_pharmacy_sales_list->FormKeyCountName ?>';
	loadjs.done("fview_pharmacy_saleslist");
});
var fview_pharmacy_saleslistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fview_pharmacy_saleslistsrch = currentSearchForm = new ew.Form("fview_pharmacy_saleslistsrch");

	// Validate function for search
	fview_pharmacy_saleslistsrch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_BillDate");
		if (elm && !ew.checkEuroDate(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacy_sales_list->BillDate->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fview_pharmacy_saleslistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_pharmacy_saleslistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	// Filters

	fview_pharmacy_saleslistsrch.filterList = <?php echo $view_pharmacy_sales_list->getFilterList() ?>;
	loadjs.done("fview_pharmacy_saleslistsrch");
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
<?php if (!$view_pharmacy_sales_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_pharmacy_sales_list->TotalRecords > 0 && $view_pharmacy_sales_list->ExportOptions->visible()) { ?>
<?php $view_pharmacy_sales_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_sales_list->ImportOptions->visible()) { ?>
<?php $view_pharmacy_sales_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_sales_list->SearchOptions->visible()) { ?>
<?php $view_pharmacy_sales_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_sales_list->FilterOptions->visible()) { ?>
<?php $view_pharmacy_sales_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_pharmacy_sales_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_pharmacy_sales_list->isExport() && !$view_pharmacy_sales->CurrentAction) { ?>
<form name="fview_pharmacy_saleslistsrch" id="fview_pharmacy_saleslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fview_pharmacy_saleslistsrch-search-panel" class="<?php echo $view_pharmacy_sales_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_pharmacy_sales">
	<div class="ew-extended-search">
<?php

// Render search row
$view_pharmacy_sales->RowType = ROWTYPE_SEARCH;
$view_pharmacy_sales->resetAttributes();
$view_pharmacy_sales_list->renderRow();
?>
<?php if ($view_pharmacy_sales_list->BillDate->Visible) { // BillDate ?>
	<?php
		$view_pharmacy_sales_list->SearchColumnCount++;
		if (($view_pharmacy_sales_list->SearchColumnCount - 1) % $view_pharmacy_sales_list->SearchFieldsPerRow == 0) {
			$view_pharmacy_sales_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_pharmacy_sales_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_BillDate" class="ew-cell form-group">
		<label for="x_BillDate" class="ew-search-caption ew-label"><?php echo $view_pharmacy_sales_list->BillDate->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_BillDate" id="z_BillDate" value="=">
</span>
		<span id="el_view_pharmacy_sales_BillDate" class="ew-search-field">
<input type="text" data-table="view_pharmacy_sales" data-field="x_BillDate" data-format="7" name="x_BillDate" id="x_BillDate" placeholder="<?php echo HtmlEncode($view_pharmacy_sales_list->BillDate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_sales_list->BillDate->EditValue ?>"<?php echo $view_pharmacy_sales_list->BillDate->editAttributes() ?>>
<?php if (!$view_pharmacy_sales_list->BillDate->ReadOnly && !$view_pharmacy_sales_list->BillDate->Disabled && !isset($view_pharmacy_sales_list->BillDate->EditAttrs["readonly"]) && !isset($view_pharmacy_sales_list->BillDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_saleslistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacy_saleslistsrch", "x_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
	</div>
	<?php if ($view_pharmacy_sales_list->SearchColumnCount % $view_pharmacy_sales_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_sales_list->PRC->Visible) { // PRC ?>
	<?php
		$view_pharmacy_sales_list->SearchColumnCount++;
		if (($view_pharmacy_sales_list->SearchColumnCount - 1) % $view_pharmacy_sales_list->SearchFieldsPerRow == 0) {
			$view_pharmacy_sales_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_pharmacy_sales_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_PRC" class="ew-cell form-group">
		<label for="x_PRC" class="ew-search-caption ew-label"><?php echo $view_pharmacy_sales_list->PRC->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PRC" id="z_PRC" value="LIKE">
</span>
		<span id="el_view_pharmacy_sales_PRC" class="ew-search-field">
<input type="text" data-table="view_pharmacy_sales" data-field="x_PRC" name="x_PRC" id="x_PRC" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($view_pharmacy_sales_list->PRC->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_sales_list->PRC->EditValue ?>"<?php echo $view_pharmacy_sales_list->PRC->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_pharmacy_sales_list->SearchColumnCount % $view_pharmacy_sales_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_sales_list->Product->Visible) { // Product ?>
	<?php
		$view_pharmacy_sales_list->SearchColumnCount++;
		if (($view_pharmacy_sales_list->SearchColumnCount - 1) % $view_pharmacy_sales_list->SearchFieldsPerRow == 0) {
			$view_pharmacy_sales_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_pharmacy_sales_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_Product" class="ew-cell form-group">
		<label for="x_Product" class="ew-search-caption ew-label"><?php echo $view_pharmacy_sales_list->Product->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Product" id="z_Product" value="LIKE">
</span>
		<span id="el_view_pharmacy_sales_Product" class="ew-search-field">
<input type="text" data-table="view_pharmacy_sales" data-field="x_Product" name="x_Product" id="x_Product" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($view_pharmacy_sales_list->Product->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_sales_list->Product->EditValue ?>"<?php echo $view_pharmacy_sales_list->Product->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_pharmacy_sales_list->SearchColumnCount % $view_pharmacy_sales_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_sales_list->BATCHNO->Visible) { // BATCHNO ?>
	<?php
		$view_pharmacy_sales_list->SearchColumnCount++;
		if (($view_pharmacy_sales_list->SearchColumnCount - 1) % $view_pharmacy_sales_list->SearchFieldsPerRow == 0) {
			$view_pharmacy_sales_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_pharmacy_sales_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_BATCHNO" class="ew-cell form-group">
		<label for="x_BATCHNO" class="ew-search-caption ew-label"><?php echo $view_pharmacy_sales_list->BATCHNO->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_BATCHNO" id="z_BATCHNO" value="LIKE">
</span>
		<span id="el_view_pharmacy_sales_BATCHNO" class="ew-search-field">
<input type="text" data-table="view_pharmacy_sales" data-field="x_BATCHNO" name="x_BATCHNO" id="x_BATCHNO" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($view_pharmacy_sales_list->BATCHNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_sales_list->BATCHNO->EditValue ?>"<?php echo $view_pharmacy_sales_list->BATCHNO->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_pharmacy_sales_list->SearchColumnCount % $view_pharmacy_sales_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_sales_list->IPNO->Visible) { // IPNO ?>
	<?php
		$view_pharmacy_sales_list->SearchColumnCount++;
		if (($view_pharmacy_sales_list->SearchColumnCount - 1) % $view_pharmacy_sales_list->SearchFieldsPerRow == 0) {
			$view_pharmacy_sales_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_pharmacy_sales_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_IPNO" class="ew-cell form-group">
		<label for="x_IPNO" class="ew-search-caption ew-label"><?php echo $view_pharmacy_sales_list->IPNO->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_IPNO" id="z_IPNO" value="LIKE">
</span>
		<span id="el_view_pharmacy_sales_IPNO" class="ew-search-field">
<input type="text" data-table="view_pharmacy_sales" data-field="x_IPNO" name="x_IPNO" id="x_IPNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_sales_list->IPNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_sales_list->IPNO->EditValue ?>"<?php echo $view_pharmacy_sales_list->IPNO->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_pharmacy_sales_list->SearchColumnCount % $view_pharmacy_sales_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_sales_list->OPNO->Visible) { // OPNO ?>
	<?php
		$view_pharmacy_sales_list->SearchColumnCount++;
		if (($view_pharmacy_sales_list->SearchColumnCount - 1) % $view_pharmacy_sales_list->SearchFieldsPerRow == 0) {
			$view_pharmacy_sales_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_pharmacy_sales_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_OPNO" class="ew-cell form-group">
		<label for="x_OPNO" class="ew-search-caption ew-label"><?php echo $view_pharmacy_sales_list->OPNO->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_OPNO" id="z_OPNO" value="LIKE">
</span>
		<span id="el_view_pharmacy_sales_OPNO" class="ew-search-field">
<input type="text" data-table="view_pharmacy_sales" data-field="x_OPNO" name="x_OPNO" id="x_OPNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_pharmacy_sales_list->OPNO->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_sales_list->OPNO->EditValue ?>"<?php echo $view_pharmacy_sales_list->OPNO->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_pharmacy_sales_list->SearchColumnCount % $view_pharmacy_sales_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($view_pharmacy_sales_list->SearchColumnCount % $view_pharmacy_sales_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $view_pharmacy_sales_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($view_pharmacy_sales_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($view_pharmacy_sales_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_pharmacy_sales_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_pharmacy_sales_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_sales_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_sales_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_sales_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $view_pharmacy_sales_list->showPageHeader(); ?>
<?php
$view_pharmacy_sales_list->showMessage();
?>
<?php if ($view_pharmacy_sales_list->TotalRecords > 0 || $view_pharmacy_sales->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_pharmacy_sales_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_pharmacy_sales">
<?php if (!$view_pharmacy_sales_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_pharmacy_sales_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_pharmacy_sales_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_sales_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_pharmacy_saleslist" id="fview_pharmacy_saleslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_sales">
<div id="gmp_view_pharmacy_sales" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($view_pharmacy_sales_list->TotalRecords > 0 || $view_pharmacy_sales_list->isGridEdit()) { ?>
<table id="tbl_view_pharmacy_saleslist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_pharmacy_sales->RowType = ROWTYPE_HEADER;

// Render list options
$view_pharmacy_sales_list->renderListOptions();

// Render list options (header, left)
$view_pharmacy_sales_list->ListOptions->render("header", "left");
?>
<?php if ($view_pharmacy_sales_list->BillDate->Visible) { // BillDate ?>
	<?php if ($view_pharmacy_sales_list->SortUrl($view_pharmacy_sales_list->BillDate) == "") { ?>
		<th data-name="BillDate" class="<?php echo $view_pharmacy_sales_list->BillDate->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_BillDate" class="view_pharmacy_sales_BillDate"><div class="ew-table-header-caption"><?php echo $view_pharmacy_sales_list->BillDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillDate" class="<?php echo $view_pharmacy_sales_list->BillDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_sales_list->SortUrl($view_pharmacy_sales_list->BillDate) ?>', 1);"><div id="elh_view_pharmacy_sales_BillDate" class="view_pharmacy_sales_BillDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_sales_list->BillDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_sales_list->BillDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_sales_list->BillDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_sales_list->SiNo->Visible) { // SiNo ?>
	<?php if ($view_pharmacy_sales_list->SortUrl($view_pharmacy_sales_list->SiNo) == "") { ?>
		<th data-name="SiNo" class="<?php echo $view_pharmacy_sales_list->SiNo->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_SiNo" class="view_pharmacy_sales_SiNo"><div class="ew-table-header-caption"><?php echo $view_pharmacy_sales_list->SiNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SiNo" class="<?php echo $view_pharmacy_sales_list->SiNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_sales_list->SortUrl($view_pharmacy_sales_list->SiNo) ?>', 1);"><div id="elh_view_pharmacy_sales_SiNo" class="view_pharmacy_sales_SiNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_sales_list->SiNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_sales_list->SiNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_sales_list->SiNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_sales_list->PRC->Visible) { // PRC ?>
	<?php if ($view_pharmacy_sales_list->SortUrl($view_pharmacy_sales_list->PRC) == "") { ?>
		<th data-name="PRC" class="<?php echo $view_pharmacy_sales_list->PRC->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_PRC" class="view_pharmacy_sales_PRC"><div class="ew-table-header-caption"><?php echo $view_pharmacy_sales_list->PRC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRC" class="<?php echo $view_pharmacy_sales_list->PRC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_sales_list->SortUrl($view_pharmacy_sales_list->PRC) ?>', 1);"><div id="elh_view_pharmacy_sales_PRC" class="view_pharmacy_sales_PRC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_sales_list->PRC->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_sales_list->PRC->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_sales_list->PRC->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_sales_list->Product->Visible) { // Product ?>
	<?php if ($view_pharmacy_sales_list->SortUrl($view_pharmacy_sales_list->Product) == "") { ?>
		<th data-name="Product" class="<?php echo $view_pharmacy_sales_list->Product->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_Product" class="view_pharmacy_sales_Product"><div class="ew-table-header-caption"><?php echo $view_pharmacy_sales_list->Product->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Product" class="<?php echo $view_pharmacy_sales_list->Product->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_sales_list->SortUrl($view_pharmacy_sales_list->Product) ?>', 1);"><div id="elh_view_pharmacy_sales_Product" class="view_pharmacy_sales_Product">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_sales_list->Product->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_sales_list->Product->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_sales_list->Product->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_sales_list->BATCHNO->Visible) { // BATCHNO ?>
	<?php if ($view_pharmacy_sales_list->SortUrl($view_pharmacy_sales_list->BATCHNO) == "") { ?>
		<th data-name="BATCHNO" class="<?php echo $view_pharmacy_sales_list->BATCHNO->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_BATCHNO" class="view_pharmacy_sales_BATCHNO"><div class="ew-table-header-caption"><?php echo $view_pharmacy_sales_list->BATCHNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BATCHNO" class="<?php echo $view_pharmacy_sales_list->BATCHNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_sales_list->SortUrl($view_pharmacy_sales_list->BATCHNO) ?>', 1);"><div id="elh_view_pharmacy_sales_BATCHNO" class="view_pharmacy_sales_BATCHNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_sales_list->BATCHNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_sales_list->BATCHNO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_sales_list->BATCHNO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_sales_list->EXPDT->Visible) { // EXPDT ?>
	<?php if ($view_pharmacy_sales_list->SortUrl($view_pharmacy_sales_list->EXPDT) == "") { ?>
		<th data-name="EXPDT" class="<?php echo $view_pharmacy_sales_list->EXPDT->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_EXPDT" class="view_pharmacy_sales_EXPDT"><div class="ew-table-header-caption"><?php echo $view_pharmacy_sales_list->EXPDT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EXPDT" class="<?php echo $view_pharmacy_sales_list->EXPDT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_sales_list->SortUrl($view_pharmacy_sales_list->EXPDT) ?>', 1);"><div id="elh_view_pharmacy_sales_EXPDT" class="view_pharmacy_sales_EXPDT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_sales_list->EXPDT->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_sales_list->EXPDT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_sales_list->EXPDT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_sales_list->Mfg->Visible) { // Mfg ?>
	<?php if ($view_pharmacy_sales_list->SortUrl($view_pharmacy_sales_list->Mfg) == "") { ?>
		<th data-name="Mfg" class="<?php echo $view_pharmacy_sales_list->Mfg->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_Mfg" class="view_pharmacy_sales_Mfg"><div class="ew-table-header-caption"><?php echo $view_pharmacy_sales_list->Mfg->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Mfg" class="<?php echo $view_pharmacy_sales_list->Mfg->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_sales_list->SortUrl($view_pharmacy_sales_list->Mfg) ?>', 1);"><div id="elh_view_pharmacy_sales_Mfg" class="view_pharmacy_sales_Mfg">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_sales_list->Mfg->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_sales_list->Mfg->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_sales_list->Mfg->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_sales_list->HSN->Visible) { // HSN ?>
	<?php if ($view_pharmacy_sales_list->SortUrl($view_pharmacy_sales_list->HSN) == "") { ?>
		<th data-name="HSN" class="<?php echo $view_pharmacy_sales_list->HSN->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_HSN" class="view_pharmacy_sales_HSN"><div class="ew-table-header-caption"><?php echo $view_pharmacy_sales_list->HSN->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HSN" class="<?php echo $view_pharmacy_sales_list->HSN->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_sales_list->SortUrl($view_pharmacy_sales_list->HSN) ?>', 1);"><div id="elh_view_pharmacy_sales_HSN" class="view_pharmacy_sales_HSN">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_sales_list->HSN->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_sales_list->HSN->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_sales_list->HSN->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_sales_list->IPNO->Visible) { // IPNO ?>
	<?php if ($view_pharmacy_sales_list->SortUrl($view_pharmacy_sales_list->IPNO) == "") { ?>
		<th data-name="IPNO" class="<?php echo $view_pharmacy_sales_list->IPNO->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_IPNO" class="view_pharmacy_sales_IPNO"><div class="ew-table-header-caption"><?php echo $view_pharmacy_sales_list->IPNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IPNO" class="<?php echo $view_pharmacy_sales_list->IPNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_sales_list->SortUrl($view_pharmacy_sales_list->IPNO) ?>', 1);"><div id="elh_view_pharmacy_sales_IPNO" class="view_pharmacy_sales_IPNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_sales_list->IPNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_sales_list->IPNO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_sales_list->IPNO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_sales_list->OPNO->Visible) { // OPNO ?>
	<?php if ($view_pharmacy_sales_list->SortUrl($view_pharmacy_sales_list->OPNO) == "") { ?>
		<th data-name="OPNO" class="<?php echo $view_pharmacy_sales_list->OPNO->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_OPNO" class="view_pharmacy_sales_OPNO"><div class="ew-table-header-caption"><?php echo $view_pharmacy_sales_list->OPNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OPNO" class="<?php echo $view_pharmacy_sales_list->OPNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_sales_list->SortUrl($view_pharmacy_sales_list->OPNO) ?>', 1);"><div id="elh_view_pharmacy_sales_OPNO" class="view_pharmacy_sales_OPNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_sales_list->OPNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_sales_list->OPNO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_sales_list->OPNO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_sales_list->IQ->Visible) { // IQ ?>
	<?php if ($view_pharmacy_sales_list->SortUrl($view_pharmacy_sales_list->IQ) == "") { ?>
		<th data-name="IQ" class="<?php echo $view_pharmacy_sales_list->IQ->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_IQ" class="view_pharmacy_sales_IQ"><div class="ew-table-header-caption"><?php echo $view_pharmacy_sales_list->IQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IQ" class="<?php echo $view_pharmacy_sales_list->IQ->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_sales_list->SortUrl($view_pharmacy_sales_list->IQ) ?>', 1);"><div id="elh_view_pharmacy_sales_IQ" class="view_pharmacy_sales_IQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_sales_list->IQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_sales_list->IQ->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_sales_list->IQ->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_sales_list->RT->Visible) { // RT ?>
	<?php if ($view_pharmacy_sales_list->SortUrl($view_pharmacy_sales_list->RT) == "") { ?>
		<th data-name="RT" class="<?php echo $view_pharmacy_sales_list->RT->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_RT" class="view_pharmacy_sales_RT"><div class="ew-table-header-caption"><?php echo $view_pharmacy_sales_list->RT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RT" class="<?php echo $view_pharmacy_sales_list->RT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_sales_list->SortUrl($view_pharmacy_sales_list->RT) ?>', 1);"><div id="elh_view_pharmacy_sales_RT" class="view_pharmacy_sales_RT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_sales_list->RT->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_sales_list->RT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_sales_list->RT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_sales_list->DAMT->Visible) { // DAMT ?>
	<?php if ($view_pharmacy_sales_list->SortUrl($view_pharmacy_sales_list->DAMT) == "") { ?>
		<th data-name="DAMT" class="<?php echo $view_pharmacy_sales_list->DAMT->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_DAMT" class="view_pharmacy_sales_DAMT"><div class="ew-table-header-caption"><?php echo $view_pharmacy_sales_list->DAMT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DAMT" class="<?php echo $view_pharmacy_sales_list->DAMT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_sales_list->SortUrl($view_pharmacy_sales_list->DAMT) ?>', 1);"><div id="elh_view_pharmacy_sales_DAMT" class="view_pharmacy_sales_DAMT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_sales_list->DAMT->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_sales_list->DAMT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_sales_list->DAMT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_sales_list->BILLDT->Visible) { // BILLDT ?>
	<?php if ($view_pharmacy_sales_list->SortUrl($view_pharmacy_sales_list->BILLDT) == "") { ?>
		<th data-name="BILLDT" class="<?php echo $view_pharmacy_sales_list->BILLDT->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_BILLDT" class="view_pharmacy_sales_BILLDT"><div class="ew-table-header-caption"><?php echo $view_pharmacy_sales_list->BILLDT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BILLDT" class="<?php echo $view_pharmacy_sales_list->BILLDT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_sales_list->SortUrl($view_pharmacy_sales_list->BILLDT) ?>', 1);"><div id="elh_view_pharmacy_sales_BILLDT" class="view_pharmacy_sales_BILLDT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_sales_list->BILLDT->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_sales_list->BILLDT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_sales_list->BILLDT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_sales_list->BRCODE->Visible) { // BRCODE ?>
	<?php if ($view_pharmacy_sales_list->SortUrl($view_pharmacy_sales_list->BRCODE) == "") { ?>
		<th data-name="BRCODE" class="<?php echo $view_pharmacy_sales_list->BRCODE->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_BRCODE" class="view_pharmacy_sales_BRCODE"><div class="ew-table-header-caption"><?php echo $view_pharmacy_sales_list->BRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BRCODE" class="<?php echo $view_pharmacy_sales_list->BRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_sales_list->SortUrl($view_pharmacy_sales_list->BRCODE) ?>', 1);"><div id="elh_view_pharmacy_sales_BRCODE" class="view_pharmacy_sales_BRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_sales_list->BRCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_sales_list->BRCODE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_sales_list->BRCODE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_sales_list->PSGST->Visible) { // PSGST ?>
	<?php if ($view_pharmacy_sales_list->SortUrl($view_pharmacy_sales_list->PSGST) == "") { ?>
		<th data-name="PSGST" class="<?php echo $view_pharmacy_sales_list->PSGST->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_PSGST" class="view_pharmacy_sales_PSGST"><div class="ew-table-header-caption"><?php echo $view_pharmacy_sales_list->PSGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PSGST" class="<?php echo $view_pharmacy_sales_list->PSGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_sales_list->SortUrl($view_pharmacy_sales_list->PSGST) ?>', 1);"><div id="elh_view_pharmacy_sales_PSGST" class="view_pharmacy_sales_PSGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_sales_list->PSGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_sales_list->PSGST->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_sales_list->PSGST->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_sales_list->PCGST->Visible) { // PCGST ?>
	<?php if ($view_pharmacy_sales_list->SortUrl($view_pharmacy_sales_list->PCGST) == "") { ?>
		<th data-name="PCGST" class="<?php echo $view_pharmacy_sales_list->PCGST->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_PCGST" class="view_pharmacy_sales_PCGST"><div class="ew-table-header-caption"><?php echo $view_pharmacy_sales_list->PCGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PCGST" class="<?php echo $view_pharmacy_sales_list->PCGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_sales_list->SortUrl($view_pharmacy_sales_list->PCGST) ?>', 1);"><div id="elh_view_pharmacy_sales_PCGST" class="view_pharmacy_sales_PCGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_sales_list->PCGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_sales_list->PCGST->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_sales_list->PCGST->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_sales_list->SSGST->Visible) { // SSGST ?>
	<?php if ($view_pharmacy_sales_list->SortUrl($view_pharmacy_sales_list->SSGST) == "") { ?>
		<th data-name="SSGST" class="<?php echo $view_pharmacy_sales_list->SSGST->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_SSGST" class="view_pharmacy_sales_SSGST"><div class="ew-table-header-caption"><?php echo $view_pharmacy_sales_list->SSGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SSGST" class="<?php echo $view_pharmacy_sales_list->SSGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_sales_list->SortUrl($view_pharmacy_sales_list->SSGST) ?>', 1);"><div id="elh_view_pharmacy_sales_SSGST" class="view_pharmacy_sales_SSGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_sales_list->SSGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_sales_list->SSGST->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_sales_list->SSGST->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_sales_list->SCGST->Visible) { // SCGST ?>
	<?php if ($view_pharmacy_sales_list->SortUrl($view_pharmacy_sales_list->SCGST) == "") { ?>
		<th data-name="SCGST" class="<?php echo $view_pharmacy_sales_list->SCGST->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_SCGST" class="view_pharmacy_sales_SCGST"><div class="ew-table-header-caption"><?php echo $view_pharmacy_sales_list->SCGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SCGST" class="<?php echo $view_pharmacy_sales_list->SCGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_sales_list->SortUrl($view_pharmacy_sales_list->SCGST) ?>', 1);"><div id="elh_view_pharmacy_sales_SCGST" class="view_pharmacy_sales_SCGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_sales_list->SCGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_sales_list->SCGST->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_sales_list->SCGST->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_sales_list->PurValue->Visible) { // PurValue ?>
	<?php if ($view_pharmacy_sales_list->SortUrl($view_pharmacy_sales_list->PurValue) == "") { ?>
		<th data-name="PurValue" class="<?php echo $view_pharmacy_sales_list->PurValue->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_PurValue" class="view_pharmacy_sales_PurValue"><div class="ew-table-header-caption"><?php echo $view_pharmacy_sales_list->PurValue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PurValue" class="<?php echo $view_pharmacy_sales_list->PurValue->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_sales_list->SortUrl($view_pharmacy_sales_list->PurValue) ?>', 1);"><div id="elh_view_pharmacy_sales_PurValue" class="view_pharmacy_sales_PurValue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_sales_list->PurValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_sales_list->PurValue->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_sales_list->PurValue->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_sales_list->SalRate->Visible) { // SalRate ?>
	<?php if ($view_pharmacy_sales_list->SortUrl($view_pharmacy_sales_list->SalRate) == "") { ?>
		<th data-name="SalRate" class="<?php echo $view_pharmacy_sales_list->SalRate->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_SalRate" class="view_pharmacy_sales_SalRate"><div class="ew-table-header-caption"><?php echo $view_pharmacy_sales_list->SalRate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SalRate" class="<?php echo $view_pharmacy_sales_list->SalRate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_sales_list->SortUrl($view_pharmacy_sales_list->SalRate) ?>', 1);"><div id="elh_view_pharmacy_sales_SalRate" class="view_pharmacy_sales_SalRate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_sales_list->SalRate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_sales_list->SalRate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_sales_list->SalRate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_sales_list->PurRate->Visible) { // PurRate ?>
	<?php if ($view_pharmacy_sales_list->SortUrl($view_pharmacy_sales_list->PurRate) == "") { ?>
		<th data-name="PurRate" class="<?php echo $view_pharmacy_sales_list->PurRate->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_PurRate" class="view_pharmacy_sales_PurRate"><div class="ew-table-header-caption"><?php echo $view_pharmacy_sales_list->PurRate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PurRate" class="<?php echo $view_pharmacy_sales_list->PurRate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_sales_list->SortUrl($view_pharmacy_sales_list->PurRate) ?>', 1);"><div id="elh_view_pharmacy_sales_PurRate" class="view_pharmacy_sales_PurRate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_sales_list->PurRate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_sales_list->PurRate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_sales_list->PurRate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_sales_list->PAMT->Visible) { // PAMT ?>
	<?php if ($view_pharmacy_sales_list->SortUrl($view_pharmacy_sales_list->PAMT) == "") { ?>
		<th data-name="PAMT" class="<?php echo $view_pharmacy_sales_list->PAMT->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_PAMT" class="view_pharmacy_sales_PAMT"><div class="ew-table-header-caption"><?php echo $view_pharmacy_sales_list->PAMT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PAMT" class="<?php echo $view_pharmacy_sales_list->PAMT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_sales_list->SortUrl($view_pharmacy_sales_list->PAMT) ?>', 1);"><div id="elh_view_pharmacy_sales_PAMT" class="view_pharmacy_sales_PAMT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_sales_list->PAMT->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_sales_list->PAMT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_sales_list->PAMT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_sales_list->PSGSTAmount->Visible) { // PSGSTAmount ?>
	<?php if ($view_pharmacy_sales_list->SortUrl($view_pharmacy_sales_list->PSGSTAmount) == "") { ?>
		<th data-name="PSGSTAmount" class="<?php echo $view_pharmacy_sales_list->PSGSTAmount->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_PSGSTAmount" class="view_pharmacy_sales_PSGSTAmount"><div class="ew-table-header-caption"><?php echo $view_pharmacy_sales_list->PSGSTAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PSGSTAmount" class="<?php echo $view_pharmacy_sales_list->PSGSTAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_sales_list->SortUrl($view_pharmacy_sales_list->PSGSTAmount) ?>', 1);"><div id="elh_view_pharmacy_sales_PSGSTAmount" class="view_pharmacy_sales_PSGSTAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_sales_list->PSGSTAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_sales_list->PSGSTAmount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_sales_list->PSGSTAmount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_sales_list->PCGSTAmount->Visible) { // PCGSTAmount ?>
	<?php if ($view_pharmacy_sales_list->SortUrl($view_pharmacy_sales_list->PCGSTAmount) == "") { ?>
		<th data-name="PCGSTAmount" class="<?php echo $view_pharmacy_sales_list->PCGSTAmount->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_PCGSTAmount" class="view_pharmacy_sales_PCGSTAmount"><div class="ew-table-header-caption"><?php echo $view_pharmacy_sales_list->PCGSTAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PCGSTAmount" class="<?php echo $view_pharmacy_sales_list->PCGSTAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_sales_list->SortUrl($view_pharmacy_sales_list->PCGSTAmount) ?>', 1);"><div id="elh_view_pharmacy_sales_PCGSTAmount" class="view_pharmacy_sales_PCGSTAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_sales_list->PCGSTAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_sales_list->PCGSTAmount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_sales_list->PCGSTAmount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_sales_list->SSGSTAmount->Visible) { // SSGSTAmount ?>
	<?php if ($view_pharmacy_sales_list->SortUrl($view_pharmacy_sales_list->SSGSTAmount) == "") { ?>
		<th data-name="SSGSTAmount" class="<?php echo $view_pharmacy_sales_list->SSGSTAmount->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_SSGSTAmount" class="view_pharmacy_sales_SSGSTAmount"><div class="ew-table-header-caption"><?php echo $view_pharmacy_sales_list->SSGSTAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SSGSTAmount" class="<?php echo $view_pharmacy_sales_list->SSGSTAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_sales_list->SortUrl($view_pharmacy_sales_list->SSGSTAmount) ?>', 1);"><div id="elh_view_pharmacy_sales_SSGSTAmount" class="view_pharmacy_sales_SSGSTAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_sales_list->SSGSTAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_sales_list->SSGSTAmount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_sales_list->SSGSTAmount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_sales_list->SCGSTAmount->Visible) { // SCGSTAmount ?>
	<?php if ($view_pharmacy_sales_list->SortUrl($view_pharmacy_sales_list->SCGSTAmount) == "") { ?>
		<th data-name="SCGSTAmount" class="<?php echo $view_pharmacy_sales_list->SCGSTAmount->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_SCGSTAmount" class="view_pharmacy_sales_SCGSTAmount"><div class="ew-table-header-caption"><?php echo $view_pharmacy_sales_list->SCGSTAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SCGSTAmount" class="<?php echo $view_pharmacy_sales_list->SCGSTAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_sales_list->SortUrl($view_pharmacy_sales_list->SCGSTAmount) ?>', 1);"><div id="elh_view_pharmacy_sales_SCGSTAmount" class="view_pharmacy_sales_SCGSTAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_sales_list->SCGSTAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_sales_list->SCGSTAmount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_sales_list->SCGSTAmount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_sales_list->HosoID->Visible) { // HosoID ?>
	<?php if ($view_pharmacy_sales_list->SortUrl($view_pharmacy_sales_list->HosoID) == "") { ?>
		<th data-name="HosoID" class="<?php echo $view_pharmacy_sales_list->HosoID->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_HosoID" class="view_pharmacy_sales_HosoID"><div class="ew-table-header-caption"><?php echo $view_pharmacy_sales_list->HosoID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HosoID" class="<?php echo $view_pharmacy_sales_list->HosoID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_sales_list->SortUrl($view_pharmacy_sales_list->HosoID) ?>', 1);"><div id="elh_view_pharmacy_sales_HosoID" class="view_pharmacy_sales_HosoID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_sales_list->HosoID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_sales_list->HosoID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_sales_list->HosoID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_pharmacy_sales_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_pharmacy_sales_list->ExportAll && $view_pharmacy_sales_list->isExport()) {
	$view_pharmacy_sales_list->StopRecord = $view_pharmacy_sales_list->TotalRecords;
} else {

	// Set the last record to display
	if ($view_pharmacy_sales_list->TotalRecords > $view_pharmacy_sales_list->StartRecord + $view_pharmacy_sales_list->DisplayRecords - 1)
		$view_pharmacy_sales_list->StopRecord = $view_pharmacy_sales_list->StartRecord + $view_pharmacy_sales_list->DisplayRecords - 1;
	else
		$view_pharmacy_sales_list->StopRecord = $view_pharmacy_sales_list->TotalRecords;
}
$view_pharmacy_sales_list->RecordCount = $view_pharmacy_sales_list->StartRecord - 1;
if ($view_pharmacy_sales_list->Recordset && !$view_pharmacy_sales_list->Recordset->EOF) {
	$view_pharmacy_sales_list->Recordset->moveFirst();
	$selectLimit = $view_pharmacy_sales_list->UseSelectLimit;
	if (!$selectLimit && $view_pharmacy_sales_list->StartRecord > 1)
		$view_pharmacy_sales_list->Recordset->move($view_pharmacy_sales_list->StartRecord - 1);
} elseif (!$view_pharmacy_sales->AllowAddDeleteRow && $view_pharmacy_sales_list->StopRecord == 0) {
	$view_pharmacy_sales_list->StopRecord = $view_pharmacy_sales->GridAddRowCount;
}

// Initialize aggregate
$view_pharmacy_sales->RowType = ROWTYPE_AGGREGATEINIT;
$view_pharmacy_sales->resetAttributes();
$view_pharmacy_sales_list->renderRow();
while ($view_pharmacy_sales_list->RecordCount < $view_pharmacy_sales_list->StopRecord) {
	$view_pharmacy_sales_list->RecordCount++;
	if ($view_pharmacy_sales_list->RecordCount >= $view_pharmacy_sales_list->StartRecord) {
		$view_pharmacy_sales_list->RowCount++;

		// Set up key count
		$view_pharmacy_sales_list->KeyCount = $view_pharmacy_sales_list->RowIndex;

		// Init row class and style
		$view_pharmacy_sales->resetAttributes();
		$view_pharmacy_sales->CssClass = "";
		if ($view_pharmacy_sales_list->isGridAdd()) {
		} else {
			$view_pharmacy_sales_list->loadRowValues($view_pharmacy_sales_list->Recordset); // Load row values
		}
		$view_pharmacy_sales->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_pharmacy_sales->RowAttrs->merge(["data-rowindex" => $view_pharmacy_sales_list->RowCount, "id" => "r" . $view_pharmacy_sales_list->RowCount . "_view_pharmacy_sales", "data-rowtype" => $view_pharmacy_sales->RowType]);

		// Render row
		$view_pharmacy_sales_list->renderRow();

		// Render list options
		$view_pharmacy_sales_list->renderListOptions();
?>
	<tr <?php echo $view_pharmacy_sales->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_pharmacy_sales_list->ListOptions->render("body", "left", $view_pharmacy_sales_list->RowCount);
?>
	<?php if ($view_pharmacy_sales_list->BillDate->Visible) { // BillDate ?>
		<td data-name="BillDate" <?php echo $view_pharmacy_sales_list->BillDate->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_sales_list->RowCount ?>_view_pharmacy_sales_BillDate">
<span<?php echo $view_pharmacy_sales_list->BillDate->viewAttributes() ?>><?php echo $view_pharmacy_sales_list->BillDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_sales_list->SiNo->Visible) { // SiNo ?>
		<td data-name="SiNo" <?php echo $view_pharmacy_sales_list->SiNo->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_sales_list->RowCount ?>_view_pharmacy_sales_SiNo">
<span<?php echo $view_pharmacy_sales_list->SiNo->viewAttributes() ?>><?php echo $view_pharmacy_sales_list->SiNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_sales_list->PRC->Visible) { // PRC ?>
		<td data-name="PRC" <?php echo $view_pharmacy_sales_list->PRC->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_sales_list->RowCount ?>_view_pharmacy_sales_PRC">
<span<?php echo $view_pharmacy_sales_list->PRC->viewAttributes() ?>><?php echo $view_pharmacy_sales_list->PRC->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_sales_list->Product->Visible) { // Product ?>
		<td data-name="Product" <?php echo $view_pharmacy_sales_list->Product->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_sales_list->RowCount ?>_view_pharmacy_sales_Product">
<span<?php echo $view_pharmacy_sales_list->Product->viewAttributes() ?>><?php echo $view_pharmacy_sales_list->Product->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_sales_list->BATCHNO->Visible) { // BATCHNO ?>
		<td data-name="BATCHNO" <?php echo $view_pharmacy_sales_list->BATCHNO->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_sales_list->RowCount ?>_view_pharmacy_sales_BATCHNO">
<span<?php echo $view_pharmacy_sales_list->BATCHNO->viewAttributes() ?>><?php echo $view_pharmacy_sales_list->BATCHNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_sales_list->EXPDT->Visible) { // EXPDT ?>
		<td data-name="EXPDT" <?php echo $view_pharmacy_sales_list->EXPDT->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_sales_list->RowCount ?>_view_pharmacy_sales_EXPDT">
<span<?php echo $view_pharmacy_sales_list->EXPDT->viewAttributes() ?>><?php echo $view_pharmacy_sales_list->EXPDT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_sales_list->Mfg->Visible) { // Mfg ?>
		<td data-name="Mfg" <?php echo $view_pharmacy_sales_list->Mfg->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_sales_list->RowCount ?>_view_pharmacy_sales_Mfg">
<span<?php echo $view_pharmacy_sales_list->Mfg->viewAttributes() ?>><?php echo $view_pharmacy_sales_list->Mfg->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_sales_list->HSN->Visible) { // HSN ?>
		<td data-name="HSN" <?php echo $view_pharmacy_sales_list->HSN->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_sales_list->RowCount ?>_view_pharmacy_sales_HSN">
<span<?php echo $view_pharmacy_sales_list->HSN->viewAttributes() ?>><?php echo $view_pharmacy_sales_list->HSN->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_sales_list->IPNO->Visible) { // IPNO ?>
		<td data-name="IPNO" <?php echo $view_pharmacy_sales_list->IPNO->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_sales_list->RowCount ?>_view_pharmacy_sales_IPNO">
<span<?php echo $view_pharmacy_sales_list->IPNO->viewAttributes() ?>><?php echo $view_pharmacy_sales_list->IPNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_sales_list->OPNO->Visible) { // OPNO ?>
		<td data-name="OPNO" <?php echo $view_pharmacy_sales_list->OPNO->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_sales_list->RowCount ?>_view_pharmacy_sales_OPNO">
<span<?php echo $view_pharmacy_sales_list->OPNO->viewAttributes() ?>><?php echo $view_pharmacy_sales_list->OPNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_sales_list->IQ->Visible) { // IQ ?>
		<td data-name="IQ" <?php echo $view_pharmacy_sales_list->IQ->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_sales_list->RowCount ?>_view_pharmacy_sales_IQ">
<span<?php echo $view_pharmacy_sales_list->IQ->viewAttributes() ?>><?php echo $view_pharmacy_sales_list->IQ->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_sales_list->RT->Visible) { // RT ?>
		<td data-name="RT" <?php echo $view_pharmacy_sales_list->RT->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_sales_list->RowCount ?>_view_pharmacy_sales_RT">
<span<?php echo $view_pharmacy_sales_list->RT->viewAttributes() ?>><?php echo $view_pharmacy_sales_list->RT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_sales_list->DAMT->Visible) { // DAMT ?>
		<td data-name="DAMT" <?php echo $view_pharmacy_sales_list->DAMT->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_sales_list->RowCount ?>_view_pharmacy_sales_DAMT">
<span<?php echo $view_pharmacy_sales_list->DAMT->viewAttributes() ?>><?php echo $view_pharmacy_sales_list->DAMT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_sales_list->BILLDT->Visible) { // BILLDT ?>
		<td data-name="BILLDT" <?php echo $view_pharmacy_sales_list->BILLDT->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_sales_list->RowCount ?>_view_pharmacy_sales_BILLDT">
<span<?php echo $view_pharmacy_sales_list->BILLDT->viewAttributes() ?>><?php echo $view_pharmacy_sales_list->BILLDT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_sales_list->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE" <?php echo $view_pharmacy_sales_list->BRCODE->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_sales_list->RowCount ?>_view_pharmacy_sales_BRCODE">
<span<?php echo $view_pharmacy_sales_list->BRCODE->viewAttributes() ?>><?php echo $view_pharmacy_sales_list->BRCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_sales_list->PSGST->Visible) { // PSGST ?>
		<td data-name="PSGST" <?php echo $view_pharmacy_sales_list->PSGST->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_sales_list->RowCount ?>_view_pharmacy_sales_PSGST">
<span<?php echo $view_pharmacy_sales_list->PSGST->viewAttributes() ?>><?php echo $view_pharmacy_sales_list->PSGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_sales_list->PCGST->Visible) { // PCGST ?>
		<td data-name="PCGST" <?php echo $view_pharmacy_sales_list->PCGST->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_sales_list->RowCount ?>_view_pharmacy_sales_PCGST">
<span<?php echo $view_pharmacy_sales_list->PCGST->viewAttributes() ?>><?php echo $view_pharmacy_sales_list->PCGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_sales_list->SSGST->Visible) { // SSGST ?>
		<td data-name="SSGST" <?php echo $view_pharmacy_sales_list->SSGST->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_sales_list->RowCount ?>_view_pharmacy_sales_SSGST">
<span<?php echo $view_pharmacy_sales_list->SSGST->viewAttributes() ?>><?php echo $view_pharmacy_sales_list->SSGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_sales_list->SCGST->Visible) { // SCGST ?>
		<td data-name="SCGST" <?php echo $view_pharmacy_sales_list->SCGST->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_sales_list->RowCount ?>_view_pharmacy_sales_SCGST">
<span<?php echo $view_pharmacy_sales_list->SCGST->viewAttributes() ?>><?php echo $view_pharmacy_sales_list->SCGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_sales_list->PurValue->Visible) { // PurValue ?>
		<td data-name="PurValue" <?php echo $view_pharmacy_sales_list->PurValue->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_sales_list->RowCount ?>_view_pharmacy_sales_PurValue">
<span<?php echo $view_pharmacy_sales_list->PurValue->viewAttributes() ?>><?php echo $view_pharmacy_sales_list->PurValue->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_sales_list->SalRate->Visible) { // SalRate ?>
		<td data-name="SalRate" <?php echo $view_pharmacy_sales_list->SalRate->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_sales_list->RowCount ?>_view_pharmacy_sales_SalRate">
<span<?php echo $view_pharmacy_sales_list->SalRate->viewAttributes() ?>><?php echo $view_pharmacy_sales_list->SalRate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_sales_list->PurRate->Visible) { // PurRate ?>
		<td data-name="PurRate" <?php echo $view_pharmacy_sales_list->PurRate->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_sales_list->RowCount ?>_view_pharmacy_sales_PurRate">
<span<?php echo $view_pharmacy_sales_list->PurRate->viewAttributes() ?>><?php echo $view_pharmacy_sales_list->PurRate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_sales_list->PAMT->Visible) { // PAMT ?>
		<td data-name="PAMT" <?php echo $view_pharmacy_sales_list->PAMT->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_sales_list->RowCount ?>_view_pharmacy_sales_PAMT">
<span<?php echo $view_pharmacy_sales_list->PAMT->viewAttributes() ?>><?php echo $view_pharmacy_sales_list->PAMT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_sales_list->PSGSTAmount->Visible) { // PSGSTAmount ?>
		<td data-name="PSGSTAmount" <?php echo $view_pharmacy_sales_list->PSGSTAmount->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_sales_list->RowCount ?>_view_pharmacy_sales_PSGSTAmount">
<span<?php echo $view_pharmacy_sales_list->PSGSTAmount->viewAttributes() ?>><?php echo $view_pharmacy_sales_list->PSGSTAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_sales_list->PCGSTAmount->Visible) { // PCGSTAmount ?>
		<td data-name="PCGSTAmount" <?php echo $view_pharmacy_sales_list->PCGSTAmount->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_sales_list->RowCount ?>_view_pharmacy_sales_PCGSTAmount">
<span<?php echo $view_pharmacy_sales_list->PCGSTAmount->viewAttributes() ?>><?php echo $view_pharmacy_sales_list->PCGSTAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_sales_list->SSGSTAmount->Visible) { // SSGSTAmount ?>
		<td data-name="SSGSTAmount" <?php echo $view_pharmacy_sales_list->SSGSTAmount->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_sales_list->RowCount ?>_view_pharmacy_sales_SSGSTAmount">
<span<?php echo $view_pharmacy_sales_list->SSGSTAmount->viewAttributes() ?>><?php echo $view_pharmacy_sales_list->SSGSTAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_sales_list->SCGSTAmount->Visible) { // SCGSTAmount ?>
		<td data-name="SCGSTAmount" <?php echo $view_pharmacy_sales_list->SCGSTAmount->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_sales_list->RowCount ?>_view_pharmacy_sales_SCGSTAmount">
<span<?php echo $view_pharmacy_sales_list->SCGSTAmount->viewAttributes() ?>><?php echo $view_pharmacy_sales_list->SCGSTAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_sales_list->HosoID->Visible) { // HosoID ?>
		<td data-name="HosoID" <?php echo $view_pharmacy_sales_list->HosoID->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_sales_list->RowCount ?>_view_pharmacy_sales_HosoID">
<span<?php echo $view_pharmacy_sales_list->HosoID->viewAttributes() ?>><?php echo $view_pharmacy_sales_list->HosoID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_pharmacy_sales_list->ListOptions->render("body", "right", $view_pharmacy_sales_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$view_pharmacy_sales_list->isGridAdd())
		$view_pharmacy_sales_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$view_pharmacy_sales->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_pharmacy_sales_list->Recordset)
	$view_pharmacy_sales_list->Recordset->Close();
?>
<?php if (!$view_pharmacy_sales_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_pharmacy_sales_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_pharmacy_sales_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_sales_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_pharmacy_sales_list->TotalRecords == 0 && !$view_pharmacy_sales->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_sales_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_pharmacy_sales_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_pharmacy_sales_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$view_pharmacy_sales->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_view_pharmacy_sales",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$view_pharmacy_sales_list->terminate();
?>