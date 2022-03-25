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
$view_pharmacy_movement_item_list = new view_pharmacy_movement_item_list();

// Run the page
$view_pharmacy_movement_item_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacy_movement_item_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$view_pharmacy_movement_item_list->isExport()) { ?>
<script>
var fview_pharmacy_movement_itemlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fview_pharmacy_movement_itemlist = currentForm = new ew.Form("fview_pharmacy_movement_itemlist", "list");
	fview_pharmacy_movement_itemlist.formKeyCountName = '<?php echo $view_pharmacy_movement_item_list->FormKeyCountName ?>';
	loadjs.done("fview_pharmacy_movement_itemlist");
});
var fview_pharmacy_movement_itemlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fview_pharmacy_movement_itemlistsrch = currentSearchForm = new ew.Form("fview_pharmacy_movement_itemlistsrch");

	// Validate function for search
	fview_pharmacy_movement_itemlistsrch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_ExpDate");
		if (elm && !ew.checkEuroDate(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacy_movement_item_list->ExpDate->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fview_pharmacy_movement_itemlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_pharmacy_movement_itemlistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	// Filters

	fview_pharmacy_movement_itemlistsrch.filterList = <?php echo $view_pharmacy_movement_item_list->getFilterList() ?>;
	loadjs.done("fview_pharmacy_movement_itemlistsrch");
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
<?php if (!$view_pharmacy_movement_item_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_pharmacy_movement_item_list->TotalRecords > 0 && $view_pharmacy_movement_item_list->ExportOptions->visible()) { ?>
<?php $view_pharmacy_movement_item_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_list->ImportOptions->visible()) { ?>
<?php $view_pharmacy_movement_item_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_list->SearchOptions->visible()) { ?>
<?php $view_pharmacy_movement_item_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_list->FilterOptions->visible()) { ?>
<?php $view_pharmacy_movement_item_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$view_pharmacy_movement_item_list->isExport() || Config("EXPORT_MASTER_RECORD") && $view_pharmacy_movement_item_list->isExport("print")) { ?>
<?php
if ($view_pharmacy_movement_item_list->DbMasterFilter != "" && $view_pharmacy_movement_item->getCurrentMasterTable() == "view_pharmacy_movement") {
	if ($view_pharmacy_movement_item_list->MasterRecordExists) {
		include_once "view_pharmacy_movementmaster.php";
	}
}
?>
<?php } ?>
<?php
$view_pharmacy_movement_item_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_pharmacy_movement_item_list->isExport() && !$view_pharmacy_movement_item->CurrentAction) { ?>
<form name="fview_pharmacy_movement_itemlistsrch" id="fview_pharmacy_movement_itemlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fview_pharmacy_movement_itemlistsrch-search-panel" class="<?php echo $view_pharmacy_movement_item_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_pharmacy_movement_item">
	<div class="ew-extended-search">
<?php

// Render search row
$view_pharmacy_movement_item->RowType = ROWTYPE_SEARCH;
$view_pharmacy_movement_item->resetAttributes();
$view_pharmacy_movement_item_list->renderRow();
?>
<?php if ($view_pharmacy_movement_item_list->prc->Visible) { // prc ?>
	<?php
		$view_pharmacy_movement_item_list->SearchColumnCount++;
		if (($view_pharmacy_movement_item_list->SearchColumnCount - 1) % $view_pharmacy_movement_item_list->SearchFieldsPerRow == 0) {
			$view_pharmacy_movement_item_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_pharmacy_movement_item_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_prc" class="ew-cell form-group">
		<label for="x_prc" class="ew-search-caption ew-label"><?php echo $view_pharmacy_movement_item_list->prc->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_prc" id="z_prc" value="LIKE">
</span>
		<span id="el_view_pharmacy_movement_item_prc" class="ew-search-field">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_prc" name="x_prc" id="x_prc" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_list->prc->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_list->prc->EditValue ?>"<?php echo $view_pharmacy_movement_item_list->prc->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_pharmacy_movement_item_list->SearchColumnCount % $view_pharmacy_movement_item_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_list->PrName->Visible) { // PrName ?>
	<?php
		$view_pharmacy_movement_item_list->SearchColumnCount++;
		if (($view_pharmacy_movement_item_list->SearchColumnCount - 1) % $view_pharmacy_movement_item_list->SearchFieldsPerRow == 0) {
			$view_pharmacy_movement_item_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_pharmacy_movement_item_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_PrName" class="ew-cell form-group">
		<label for="x_PrName" class="ew-search-caption ew-label"><?php echo $view_pharmacy_movement_item_list->PrName->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PrName" id="z_PrName" value="LIKE">
</span>
		<span id="el_view_pharmacy_movement_item_PrName" class="ew-search-field">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_PrName" name="x_PrName" id="x_PrName" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_list->PrName->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_list->PrName->EditValue ?>"<?php echo $view_pharmacy_movement_item_list->PrName->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_pharmacy_movement_item_list->SearchColumnCount % $view_pharmacy_movement_item_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_list->ExpDate->Visible) { // ExpDate ?>
	<?php
		$view_pharmacy_movement_item_list->SearchColumnCount++;
		if (($view_pharmacy_movement_item_list->SearchColumnCount - 1) % $view_pharmacy_movement_item_list->SearchFieldsPerRow == 0) {
			$view_pharmacy_movement_item_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_pharmacy_movement_item_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_ExpDate" class="ew-cell form-group">
		<label for="x_ExpDate" class="ew-search-caption ew-label"><?php echo $view_pharmacy_movement_item_list->ExpDate->caption() ?></label>
		<span class="ew-search-operator">
<select name="z_ExpDate" id="z_ExpDate" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?php echo $view_pharmacy_movement_item_list->ExpDate->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?php echo $Language->phrase("EQUAL") ?></option>
<option value="<>"<?php echo $view_pharmacy_movement_item_list->ExpDate->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?php echo $Language->phrase("<>") ?></option>
<option value="<"<?php echo $view_pharmacy_movement_item_list->ExpDate->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?php echo $Language->phrase("<") ?></option>
<option value="<="<?php echo $view_pharmacy_movement_item_list->ExpDate->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?php echo $Language->phrase("<=") ?></option>
<option value=">"<?php echo $view_pharmacy_movement_item_list->ExpDate->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?php echo $Language->phrase(">") ?></option>
<option value=">="<?php echo $view_pharmacy_movement_item_list->ExpDate->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?php echo $Language->phrase(">=") ?></option>
<option value="IS NULL"<?php echo $view_pharmacy_movement_item_list->ExpDate->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?php echo $view_pharmacy_movement_item_list->ExpDate->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?php echo $view_pharmacy_movement_item_list->ExpDate->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?php echo $Language->phrase("BETWEEN") ?></option>
</select>
</span>
		<span id="el_view_pharmacy_movement_item_ExpDate" class="ew-search-field">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_ExpDate" data-format="7" name="x_ExpDate" id="x_ExpDate" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_list->ExpDate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_list->ExpDate->EditValue ?>"<?php echo $view_pharmacy_movement_item_list->ExpDate->editAttributes() ?>>
<?php if (!$view_pharmacy_movement_item_list->ExpDate->ReadOnly && !$view_pharmacy_movement_item_list->ExpDate->Disabled && !isset($view_pharmacy_movement_item_list->ExpDate->EditAttrs["readonly"]) && !isset($view_pharmacy_movement_item_list->ExpDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_movement_itemlistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacy_movement_itemlistsrch", "x_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
		<span class="ew-search-and d-none"><label><?php echo $Language->phrase("AND") ?></label></span>
		<span id="el2_view_pharmacy_movement_item_ExpDate" class="ew-search-field2 d-none">
<input type="text" data-table="view_pharmacy_movement_item" data-field="x_ExpDate" data-format="7" name="y_ExpDate" id="y_ExpDate" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_item_list->ExpDate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_item_list->ExpDate->EditValue2 ?>"<?php echo $view_pharmacy_movement_item_list->ExpDate->editAttributes() ?>>
<?php if (!$view_pharmacy_movement_item_list->ExpDate->ReadOnly && !$view_pharmacy_movement_item_list->ExpDate->Disabled && !isset($view_pharmacy_movement_item_list->ExpDate->EditAttrs["readonly"]) && !isset($view_pharmacy_movement_item_list->ExpDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_movement_itemlistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacy_movement_itemlistsrch", "y_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
	</div>
	<?php if ($view_pharmacy_movement_item_list->SearchColumnCount % $view_pharmacy_movement_item_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($view_pharmacy_movement_item_list->SearchColumnCount % $view_pharmacy_movement_item_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $view_pharmacy_movement_item_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($view_pharmacy_movement_item_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($view_pharmacy_movement_item_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_pharmacy_movement_item_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_pharmacy_movement_item_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_movement_item_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_movement_item_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_movement_item_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $view_pharmacy_movement_item_list->showPageHeader(); ?>
<?php
$view_pharmacy_movement_item_list->showMessage();
?>
<?php if ($view_pharmacy_movement_item_list->TotalRecords > 0 || $view_pharmacy_movement_item->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_pharmacy_movement_item_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_pharmacy_movement_item">
<?php if (!$view_pharmacy_movement_item_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_pharmacy_movement_item_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_pharmacy_movement_item_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_movement_item_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_pharmacy_movement_itemlist" id="fview_pharmacy_movement_itemlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_movement_item">
<?php if ($view_pharmacy_movement_item->getCurrentMasterTable() == "view_pharmacy_movement" && $view_pharmacy_movement_item->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="view_pharmacy_movement">
<input type="hidden" name="fk_prc" value="<?php echo HtmlEncode($view_pharmacy_movement_item_list->prc->getSessionValue()) ?>">
<input type="hidden" name="fk_BatchNo" value="<?php echo HtmlEncode($view_pharmacy_movement_item_list->BatchNo->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_view_pharmacy_movement_item" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($view_pharmacy_movement_item_list->TotalRecords > 0 || $view_pharmacy_movement_item_list->isGridEdit()) { ?>
<table id="tbl_view_pharmacy_movement_itemlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_pharmacy_movement_item->RowType = ROWTYPE_HEADER;

// Render list options
$view_pharmacy_movement_item_list->renderListOptions();

// Render list options (header, left)
$view_pharmacy_movement_item_list->ListOptions->render("header", "left");
?>
<?php if ($view_pharmacy_movement_item_list->ProductFrom->Visible) { // ProductFrom ?>
	<?php if ($view_pharmacy_movement_item_list->SortUrl($view_pharmacy_movement_item_list->ProductFrom) == "") { ?>
		<th data-name="ProductFrom" class="<?php echo $view_pharmacy_movement_item_list->ProductFrom->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_ProductFrom" class="view_pharmacy_movement_item_ProductFrom"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_list->ProductFrom->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProductFrom" class="<?php echo $view_pharmacy_movement_item_list->ProductFrom->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_movement_item_list->SortUrl($view_pharmacy_movement_item_list->ProductFrom) ?>', 1);"><div id="elh_view_pharmacy_movement_item_ProductFrom" class="view_pharmacy_movement_item_ProductFrom">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_list->ProductFrom->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_list->ProductFrom->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_list->ProductFrom->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_list->Quantity->Visible) { // Quantity ?>
	<?php if ($view_pharmacy_movement_item_list->SortUrl($view_pharmacy_movement_item_list->Quantity) == "") { ?>
		<th data-name="Quantity" class="<?php echo $view_pharmacy_movement_item_list->Quantity->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_Quantity" class="view_pharmacy_movement_item_Quantity"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_list->Quantity->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Quantity" class="<?php echo $view_pharmacy_movement_item_list->Quantity->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_movement_item_list->SortUrl($view_pharmacy_movement_item_list->Quantity) ?>', 1);"><div id="elh_view_pharmacy_movement_item_Quantity" class="view_pharmacy_movement_item_Quantity">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_list->Quantity->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_list->Quantity->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_list->Quantity->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_list->FreeQty->Visible) { // FreeQty ?>
	<?php if ($view_pharmacy_movement_item_list->SortUrl($view_pharmacy_movement_item_list->FreeQty) == "") { ?>
		<th data-name="FreeQty" class="<?php echo $view_pharmacy_movement_item_list->FreeQty->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_FreeQty" class="view_pharmacy_movement_item_FreeQty"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_list->FreeQty->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FreeQty" class="<?php echo $view_pharmacy_movement_item_list->FreeQty->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_movement_item_list->SortUrl($view_pharmacy_movement_item_list->FreeQty) ?>', 1);"><div id="elh_view_pharmacy_movement_item_FreeQty" class="view_pharmacy_movement_item_FreeQty">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_list->FreeQty->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_list->FreeQty->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_list->FreeQty->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_list->IQ->Visible) { // IQ ?>
	<?php if ($view_pharmacy_movement_item_list->SortUrl($view_pharmacy_movement_item_list->IQ) == "") { ?>
		<th data-name="IQ" class="<?php echo $view_pharmacy_movement_item_list->IQ->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_IQ" class="view_pharmacy_movement_item_IQ"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_list->IQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IQ" class="<?php echo $view_pharmacy_movement_item_list->IQ->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_movement_item_list->SortUrl($view_pharmacy_movement_item_list->IQ) ?>', 1);"><div id="elh_view_pharmacy_movement_item_IQ" class="view_pharmacy_movement_item_IQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_list->IQ->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_list->IQ->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_list->IQ->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_list->MRQ->Visible) { // MRQ ?>
	<?php if ($view_pharmacy_movement_item_list->SortUrl($view_pharmacy_movement_item_list->MRQ) == "") { ?>
		<th data-name="MRQ" class="<?php echo $view_pharmacy_movement_item_list->MRQ->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_MRQ" class="view_pharmacy_movement_item_MRQ"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_list->MRQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MRQ" class="<?php echo $view_pharmacy_movement_item_list->MRQ->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_movement_item_list->SortUrl($view_pharmacy_movement_item_list->MRQ) ?>', 1);"><div id="elh_view_pharmacy_movement_item_MRQ" class="view_pharmacy_movement_item_MRQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_list->MRQ->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_list->MRQ->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_list->MRQ->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_list->BRCODE->Visible) { // BRCODE ?>
	<?php if ($view_pharmacy_movement_item_list->SortUrl($view_pharmacy_movement_item_list->BRCODE) == "") { ?>
		<th data-name="BRCODE" class="<?php echo $view_pharmacy_movement_item_list->BRCODE->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_BRCODE" class="view_pharmacy_movement_item_BRCODE"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_list->BRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BRCODE" class="<?php echo $view_pharmacy_movement_item_list->BRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_movement_item_list->SortUrl($view_pharmacy_movement_item_list->BRCODE) ?>', 1);"><div id="elh_view_pharmacy_movement_item_BRCODE" class="view_pharmacy_movement_item_BRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_list->BRCODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_list->BRCODE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_list->BRCODE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_list->OPNO->Visible) { // OPNO ?>
	<?php if ($view_pharmacy_movement_item_list->SortUrl($view_pharmacy_movement_item_list->OPNO) == "") { ?>
		<th data-name="OPNO" class="<?php echo $view_pharmacy_movement_item_list->OPNO->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_OPNO" class="view_pharmacy_movement_item_OPNO"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_list->OPNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OPNO" class="<?php echo $view_pharmacy_movement_item_list->OPNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_movement_item_list->SortUrl($view_pharmacy_movement_item_list->OPNO) ?>', 1);"><div id="elh_view_pharmacy_movement_item_OPNO" class="view_pharmacy_movement_item_OPNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_list->OPNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_list->OPNO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_list->OPNO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_list->IPNO->Visible) { // IPNO ?>
	<?php if ($view_pharmacy_movement_item_list->SortUrl($view_pharmacy_movement_item_list->IPNO) == "") { ?>
		<th data-name="IPNO" class="<?php echo $view_pharmacy_movement_item_list->IPNO->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_IPNO" class="view_pharmacy_movement_item_IPNO"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_list->IPNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IPNO" class="<?php echo $view_pharmacy_movement_item_list->IPNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_movement_item_list->SortUrl($view_pharmacy_movement_item_list->IPNO) ?>', 1);"><div id="elh_view_pharmacy_movement_item_IPNO" class="view_pharmacy_movement_item_IPNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_list->IPNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_list->IPNO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_list->IPNO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_list->PatientBILLNO->Visible) { // PatientBILLNO ?>
	<?php if ($view_pharmacy_movement_item_list->SortUrl($view_pharmacy_movement_item_list->PatientBILLNO) == "") { ?>
		<th data-name="PatientBILLNO" class="<?php echo $view_pharmacy_movement_item_list->PatientBILLNO->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_PatientBILLNO" class="view_pharmacy_movement_item_PatientBILLNO"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_list->PatientBILLNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientBILLNO" class="<?php echo $view_pharmacy_movement_item_list->PatientBILLNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_movement_item_list->SortUrl($view_pharmacy_movement_item_list->PatientBILLNO) ?>', 1);"><div id="elh_view_pharmacy_movement_item_PatientBILLNO" class="view_pharmacy_movement_item_PatientBILLNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_list->PatientBILLNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_list->PatientBILLNO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_list->PatientBILLNO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_list->BILLDT->Visible) { // BILLDT ?>
	<?php if ($view_pharmacy_movement_item_list->SortUrl($view_pharmacy_movement_item_list->BILLDT) == "") { ?>
		<th data-name="BILLDT" class="<?php echo $view_pharmacy_movement_item_list->BILLDT->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_BILLDT" class="view_pharmacy_movement_item_BILLDT"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_list->BILLDT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BILLDT" class="<?php echo $view_pharmacy_movement_item_list->BILLDT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_movement_item_list->SortUrl($view_pharmacy_movement_item_list->BILLDT) ?>', 1);"><div id="elh_view_pharmacy_movement_item_BILLDT" class="view_pharmacy_movement_item_BILLDT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_list->BILLDT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_list->BILLDT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_list->BILLDT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_list->GRNNO->Visible) { // GRNNO ?>
	<?php if ($view_pharmacy_movement_item_list->SortUrl($view_pharmacy_movement_item_list->GRNNO) == "") { ?>
		<th data-name="GRNNO" class="<?php echo $view_pharmacy_movement_item_list->GRNNO->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_GRNNO" class="view_pharmacy_movement_item_GRNNO"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_list->GRNNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GRNNO" class="<?php echo $view_pharmacy_movement_item_list->GRNNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_movement_item_list->SortUrl($view_pharmacy_movement_item_list->GRNNO) ?>', 1);"><div id="elh_view_pharmacy_movement_item_GRNNO" class="view_pharmacy_movement_item_GRNNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_list->GRNNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_list->GRNNO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_list->GRNNO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_list->DT->Visible) { // DT ?>
	<?php if ($view_pharmacy_movement_item_list->SortUrl($view_pharmacy_movement_item_list->DT) == "") { ?>
		<th data-name="DT" class="<?php echo $view_pharmacy_movement_item_list->DT->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_DT" class="view_pharmacy_movement_item_DT"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_list->DT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DT" class="<?php echo $view_pharmacy_movement_item_list->DT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_movement_item_list->SortUrl($view_pharmacy_movement_item_list->DT) ?>', 1);"><div id="elh_view_pharmacy_movement_item_DT" class="view_pharmacy_movement_item_DT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_list->DT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_list->DT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_list->DT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_list->Customername->Visible) { // Customername ?>
	<?php if ($view_pharmacy_movement_item_list->SortUrl($view_pharmacy_movement_item_list->Customername) == "") { ?>
		<th data-name="Customername" class="<?php echo $view_pharmacy_movement_item_list->Customername->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_Customername" class="view_pharmacy_movement_item_Customername"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_list->Customername->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Customername" class="<?php echo $view_pharmacy_movement_item_list->Customername->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_movement_item_list->SortUrl($view_pharmacy_movement_item_list->Customername) ?>', 1);"><div id="elh_view_pharmacy_movement_item_Customername" class="view_pharmacy_movement_item_Customername">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_list->Customername->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_list->Customername->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_list->Customername->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_list->createdby->Visible) { // createdby ?>
	<?php if ($view_pharmacy_movement_item_list->SortUrl($view_pharmacy_movement_item_list->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $view_pharmacy_movement_item_list->createdby->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_createdby" class="view_pharmacy_movement_item_createdby"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_list->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $view_pharmacy_movement_item_list->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_movement_item_list->SortUrl($view_pharmacy_movement_item_list->createdby) ?>', 1);"><div id="elh_view_pharmacy_movement_item_createdby" class="view_pharmacy_movement_item_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_list->createdby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_list->createdby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_list->createdby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_list->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_pharmacy_movement_item_list->SortUrl($view_pharmacy_movement_item_list->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_pharmacy_movement_item_list->createddatetime->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_createddatetime" class="view_pharmacy_movement_item_createddatetime"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_list->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_pharmacy_movement_item_list->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_movement_item_list->SortUrl($view_pharmacy_movement_item_list->createddatetime) ?>', 1);"><div id="elh_view_pharmacy_movement_item_createddatetime" class="view_pharmacy_movement_item_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_list->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_list->createddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_list->createddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_list->modifiedby->Visible) { // modifiedby ?>
	<?php if ($view_pharmacy_movement_item_list->SortUrl($view_pharmacy_movement_item_list->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $view_pharmacy_movement_item_list->modifiedby->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_modifiedby" class="view_pharmacy_movement_item_modifiedby"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_list->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $view_pharmacy_movement_item_list->modifiedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_movement_item_list->SortUrl($view_pharmacy_movement_item_list->modifiedby) ?>', 1);"><div id="elh_view_pharmacy_movement_item_modifiedby" class="view_pharmacy_movement_item_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_list->modifiedby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_list->modifiedby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_list->modifiedby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_list->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($view_pharmacy_movement_item_list->SortUrl($view_pharmacy_movement_item_list->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_pharmacy_movement_item_list->modifieddatetime->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_modifieddatetime" class="view_pharmacy_movement_item_modifieddatetime"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_list->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $view_pharmacy_movement_item_list->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_movement_item_list->SortUrl($view_pharmacy_movement_item_list->modifieddatetime) ?>', 1);"><div id="elh_view_pharmacy_movement_item_modifieddatetime" class="view_pharmacy_movement_item_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_list->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_list->modifieddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_list->modifieddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_list->BILLNO->Visible) { // BILLNO ?>
	<?php if ($view_pharmacy_movement_item_list->SortUrl($view_pharmacy_movement_item_list->BILLNO) == "") { ?>
		<th data-name="BILLNO" class="<?php echo $view_pharmacy_movement_item_list->BILLNO->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_BILLNO" class="view_pharmacy_movement_item_BILLNO"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_list->BILLNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BILLNO" class="<?php echo $view_pharmacy_movement_item_list->BILLNO->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_movement_item_list->SortUrl($view_pharmacy_movement_item_list->BILLNO) ?>', 1);"><div id="elh_view_pharmacy_movement_item_BILLNO" class="view_pharmacy_movement_item_BILLNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_list->BILLNO->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_list->BILLNO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_list->BILLNO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_list->prc->Visible) { // prc ?>
	<?php if ($view_pharmacy_movement_item_list->SortUrl($view_pharmacy_movement_item_list->prc) == "") { ?>
		<th data-name="prc" class="<?php echo $view_pharmacy_movement_item_list->prc->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_prc" class="view_pharmacy_movement_item_prc"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_list->prc->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="prc" class="<?php echo $view_pharmacy_movement_item_list->prc->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_movement_item_list->SortUrl($view_pharmacy_movement_item_list->prc) ?>', 1);"><div id="elh_view_pharmacy_movement_item_prc" class="view_pharmacy_movement_item_prc">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_list->prc->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_list->prc->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_list->prc->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_list->PrName->Visible) { // PrName ?>
	<?php if ($view_pharmacy_movement_item_list->SortUrl($view_pharmacy_movement_item_list->PrName) == "") { ?>
		<th data-name="PrName" class="<?php echo $view_pharmacy_movement_item_list->PrName->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_PrName" class="view_pharmacy_movement_item_PrName"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_list->PrName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrName" class="<?php echo $view_pharmacy_movement_item_list->PrName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_movement_item_list->SortUrl($view_pharmacy_movement_item_list->PrName) ?>', 1);"><div id="elh_view_pharmacy_movement_item_PrName" class="view_pharmacy_movement_item_PrName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_list->PrName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_list->PrName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_list->PrName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_list->BatchNo->Visible) { // BatchNo ?>
	<?php if ($view_pharmacy_movement_item_list->SortUrl($view_pharmacy_movement_item_list->BatchNo) == "") { ?>
		<th data-name="BatchNo" class="<?php echo $view_pharmacy_movement_item_list->BatchNo->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_BatchNo" class="view_pharmacy_movement_item_BatchNo"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_list->BatchNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BatchNo" class="<?php echo $view_pharmacy_movement_item_list->BatchNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_movement_item_list->SortUrl($view_pharmacy_movement_item_list->BatchNo) ?>', 1);"><div id="elh_view_pharmacy_movement_item_BatchNo" class="view_pharmacy_movement_item_BatchNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_list->BatchNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_list->BatchNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_list->BatchNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_list->ExpDate->Visible) { // ExpDate ?>
	<?php if ($view_pharmacy_movement_item_list->SortUrl($view_pharmacy_movement_item_list->ExpDate) == "") { ?>
		<th data-name="ExpDate" class="<?php echo $view_pharmacy_movement_item_list->ExpDate->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_ExpDate" class="view_pharmacy_movement_item_ExpDate"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_list->ExpDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ExpDate" class="<?php echo $view_pharmacy_movement_item_list->ExpDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_movement_item_list->SortUrl($view_pharmacy_movement_item_list->ExpDate) ?>', 1);"><div id="elh_view_pharmacy_movement_item_ExpDate" class="view_pharmacy_movement_item_ExpDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_list->ExpDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_list->ExpDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_list->ExpDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_list->MFRCODE->Visible) { // MFRCODE ?>
	<?php if ($view_pharmacy_movement_item_list->SortUrl($view_pharmacy_movement_item_list->MFRCODE) == "") { ?>
		<th data-name="MFRCODE" class="<?php echo $view_pharmacy_movement_item_list->MFRCODE->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_MFRCODE" class="view_pharmacy_movement_item_MFRCODE"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_list->MFRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MFRCODE" class="<?php echo $view_pharmacy_movement_item_list->MFRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_movement_item_list->SortUrl($view_pharmacy_movement_item_list->MFRCODE) ?>', 1);"><div id="elh_view_pharmacy_movement_item_MFRCODE" class="view_pharmacy_movement_item_MFRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_list->MFRCODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_list->MFRCODE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_list->MFRCODE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_list->hsn->Visible) { // hsn ?>
	<?php if ($view_pharmacy_movement_item_list->SortUrl($view_pharmacy_movement_item_list->hsn) == "") { ?>
		<th data-name="hsn" class="<?php echo $view_pharmacy_movement_item_list->hsn->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_hsn" class="view_pharmacy_movement_item_hsn"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_list->hsn->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="hsn" class="<?php echo $view_pharmacy_movement_item_list->hsn->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_movement_item_list->SortUrl($view_pharmacy_movement_item_list->hsn) ?>', 1);"><div id="elh_view_pharmacy_movement_item_hsn" class="view_pharmacy_movement_item_hsn">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_list->hsn->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_list->hsn->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_list->hsn->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_item_list->HospID->Visible) { // HospID ?>
	<?php if ($view_pharmacy_movement_item_list->SortUrl($view_pharmacy_movement_item_list->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_pharmacy_movement_item_list->HospID->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_HospID" class="view_pharmacy_movement_item_HospID"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_list->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_pharmacy_movement_item_list->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_movement_item_list->SortUrl($view_pharmacy_movement_item_list->HospID) ?>', 1);"><div id="elh_view_pharmacy_movement_item_HospID" class="view_pharmacy_movement_item_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_item_list->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_item_list->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_item_list->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_pharmacy_movement_item_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_pharmacy_movement_item_list->ExportAll && $view_pharmacy_movement_item_list->isExport()) {
	$view_pharmacy_movement_item_list->StopRecord = $view_pharmacy_movement_item_list->TotalRecords;
} else {

	// Set the last record to display
	if ($view_pharmacy_movement_item_list->TotalRecords > $view_pharmacy_movement_item_list->StartRecord + $view_pharmacy_movement_item_list->DisplayRecords - 1)
		$view_pharmacy_movement_item_list->StopRecord = $view_pharmacy_movement_item_list->StartRecord + $view_pharmacy_movement_item_list->DisplayRecords - 1;
	else
		$view_pharmacy_movement_item_list->StopRecord = $view_pharmacy_movement_item_list->TotalRecords;
}
$view_pharmacy_movement_item_list->RecordCount = $view_pharmacy_movement_item_list->StartRecord - 1;
if ($view_pharmacy_movement_item_list->Recordset && !$view_pharmacy_movement_item_list->Recordset->EOF) {
	$view_pharmacy_movement_item_list->Recordset->moveFirst();
	$selectLimit = $view_pharmacy_movement_item_list->UseSelectLimit;
	if (!$selectLimit && $view_pharmacy_movement_item_list->StartRecord > 1)
		$view_pharmacy_movement_item_list->Recordset->move($view_pharmacy_movement_item_list->StartRecord - 1);
} elseif (!$view_pharmacy_movement_item->AllowAddDeleteRow && $view_pharmacy_movement_item_list->StopRecord == 0) {
	$view_pharmacy_movement_item_list->StopRecord = $view_pharmacy_movement_item->GridAddRowCount;
}

// Initialize aggregate
$view_pharmacy_movement_item->RowType = ROWTYPE_AGGREGATEINIT;
$view_pharmacy_movement_item->resetAttributes();
$view_pharmacy_movement_item_list->renderRow();
while ($view_pharmacy_movement_item_list->RecordCount < $view_pharmacy_movement_item_list->StopRecord) {
	$view_pharmacy_movement_item_list->RecordCount++;
	if ($view_pharmacy_movement_item_list->RecordCount >= $view_pharmacy_movement_item_list->StartRecord) {
		$view_pharmacy_movement_item_list->RowCount++;

		// Set up key count
		$view_pharmacy_movement_item_list->KeyCount = $view_pharmacy_movement_item_list->RowIndex;

		// Init row class and style
		$view_pharmacy_movement_item->resetAttributes();
		$view_pharmacy_movement_item->CssClass = "";
		if ($view_pharmacy_movement_item_list->isGridAdd()) {
		} else {
			$view_pharmacy_movement_item_list->loadRowValues($view_pharmacy_movement_item_list->Recordset); // Load row values
		}
		$view_pharmacy_movement_item->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_pharmacy_movement_item->RowAttrs->merge(["data-rowindex" => $view_pharmacy_movement_item_list->RowCount, "id" => "r" . $view_pharmacy_movement_item_list->RowCount . "_view_pharmacy_movement_item", "data-rowtype" => $view_pharmacy_movement_item->RowType]);

		// Render row
		$view_pharmacy_movement_item_list->renderRow();

		// Render list options
		$view_pharmacy_movement_item_list->renderListOptions();
?>
	<tr <?php echo $view_pharmacy_movement_item->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_pharmacy_movement_item_list->ListOptions->render("body", "left", $view_pharmacy_movement_item_list->RowCount);
?>
	<?php if ($view_pharmacy_movement_item_list->ProductFrom->Visible) { // ProductFrom ?>
		<td data-name="ProductFrom" <?php echo $view_pharmacy_movement_item_list->ProductFrom->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_movement_item_list->RowCount ?>_view_pharmacy_movement_item_ProductFrom">
<span<?php echo $view_pharmacy_movement_item_list->ProductFrom->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_list->ProductFrom->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_list->Quantity->Visible) { // Quantity ?>
		<td data-name="Quantity" <?php echo $view_pharmacy_movement_item_list->Quantity->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_movement_item_list->RowCount ?>_view_pharmacy_movement_item_Quantity">
<span<?php echo $view_pharmacy_movement_item_list->Quantity->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_list->Quantity->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_list->FreeQty->Visible) { // FreeQty ?>
		<td data-name="FreeQty" <?php echo $view_pharmacy_movement_item_list->FreeQty->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_movement_item_list->RowCount ?>_view_pharmacy_movement_item_FreeQty">
<span<?php echo $view_pharmacy_movement_item_list->FreeQty->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_list->FreeQty->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_list->IQ->Visible) { // IQ ?>
		<td data-name="IQ" <?php echo $view_pharmacy_movement_item_list->IQ->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_movement_item_list->RowCount ?>_view_pharmacy_movement_item_IQ">
<span<?php echo $view_pharmacy_movement_item_list->IQ->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_list->IQ->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_list->MRQ->Visible) { // MRQ ?>
		<td data-name="MRQ" <?php echo $view_pharmacy_movement_item_list->MRQ->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_movement_item_list->RowCount ?>_view_pharmacy_movement_item_MRQ">
<span<?php echo $view_pharmacy_movement_item_list->MRQ->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_list->MRQ->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_list->BRCODE->Visible) { // BRCODE ?>
		<td data-name="BRCODE" <?php echo $view_pharmacy_movement_item_list->BRCODE->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_movement_item_list->RowCount ?>_view_pharmacy_movement_item_BRCODE">
<span<?php echo $view_pharmacy_movement_item_list->BRCODE->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_list->BRCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_list->OPNO->Visible) { // OPNO ?>
		<td data-name="OPNO" <?php echo $view_pharmacy_movement_item_list->OPNO->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_movement_item_list->RowCount ?>_view_pharmacy_movement_item_OPNO">
<span<?php echo $view_pharmacy_movement_item_list->OPNO->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_list->OPNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_list->IPNO->Visible) { // IPNO ?>
		<td data-name="IPNO" <?php echo $view_pharmacy_movement_item_list->IPNO->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_movement_item_list->RowCount ?>_view_pharmacy_movement_item_IPNO">
<span<?php echo $view_pharmacy_movement_item_list->IPNO->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_list->IPNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_list->PatientBILLNO->Visible) { // PatientBILLNO ?>
		<td data-name="PatientBILLNO" <?php echo $view_pharmacy_movement_item_list->PatientBILLNO->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_movement_item_list->RowCount ?>_view_pharmacy_movement_item_PatientBILLNO">
<span<?php echo $view_pharmacy_movement_item_list->PatientBILLNO->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_list->PatientBILLNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_list->BILLDT->Visible) { // BILLDT ?>
		<td data-name="BILLDT" <?php echo $view_pharmacy_movement_item_list->BILLDT->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_movement_item_list->RowCount ?>_view_pharmacy_movement_item_BILLDT">
<span<?php echo $view_pharmacy_movement_item_list->BILLDT->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_list->BILLDT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_list->GRNNO->Visible) { // GRNNO ?>
		<td data-name="GRNNO" <?php echo $view_pharmacy_movement_item_list->GRNNO->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_movement_item_list->RowCount ?>_view_pharmacy_movement_item_GRNNO">
<span<?php echo $view_pharmacy_movement_item_list->GRNNO->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_list->GRNNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_list->DT->Visible) { // DT ?>
		<td data-name="DT" <?php echo $view_pharmacy_movement_item_list->DT->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_movement_item_list->RowCount ?>_view_pharmacy_movement_item_DT">
<span<?php echo $view_pharmacy_movement_item_list->DT->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_list->DT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_list->Customername->Visible) { // Customername ?>
		<td data-name="Customername" <?php echo $view_pharmacy_movement_item_list->Customername->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_movement_item_list->RowCount ?>_view_pharmacy_movement_item_Customername">
<span<?php echo $view_pharmacy_movement_item_list->Customername->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_list->Customername->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_list->createdby->Visible) { // createdby ?>
		<td data-name="createdby" <?php echo $view_pharmacy_movement_item_list->createdby->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_movement_item_list->RowCount ?>_view_pharmacy_movement_item_createdby">
<span<?php echo $view_pharmacy_movement_item_list->createdby->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_list->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_list->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" <?php echo $view_pharmacy_movement_item_list->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_movement_item_list->RowCount ?>_view_pharmacy_movement_item_createddatetime">
<span<?php echo $view_pharmacy_movement_item_list->createddatetime->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_list->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_list->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby" <?php echo $view_pharmacy_movement_item_list->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_movement_item_list->RowCount ?>_view_pharmacy_movement_item_modifiedby">
<span<?php echo $view_pharmacy_movement_item_list->modifiedby->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_list->modifiedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_list->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime" <?php echo $view_pharmacy_movement_item_list->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_movement_item_list->RowCount ?>_view_pharmacy_movement_item_modifieddatetime">
<span<?php echo $view_pharmacy_movement_item_list->modifieddatetime->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_list->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_list->BILLNO->Visible) { // BILLNO ?>
		<td data-name="BILLNO" <?php echo $view_pharmacy_movement_item_list->BILLNO->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_movement_item_list->RowCount ?>_view_pharmacy_movement_item_BILLNO">
<span<?php echo $view_pharmacy_movement_item_list->BILLNO->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_list->BILLNO->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_list->prc->Visible) { // prc ?>
		<td data-name="prc" <?php echo $view_pharmacy_movement_item_list->prc->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_movement_item_list->RowCount ?>_view_pharmacy_movement_item_prc">
<span<?php echo $view_pharmacy_movement_item_list->prc->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_list->prc->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_list->PrName->Visible) { // PrName ?>
		<td data-name="PrName" <?php echo $view_pharmacy_movement_item_list->PrName->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_movement_item_list->RowCount ?>_view_pharmacy_movement_item_PrName">
<span<?php echo $view_pharmacy_movement_item_list->PrName->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_list->PrName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_list->BatchNo->Visible) { // BatchNo ?>
		<td data-name="BatchNo" <?php echo $view_pharmacy_movement_item_list->BatchNo->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_movement_item_list->RowCount ?>_view_pharmacy_movement_item_BatchNo">
<span<?php echo $view_pharmacy_movement_item_list->BatchNo->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_list->BatchNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_list->ExpDate->Visible) { // ExpDate ?>
		<td data-name="ExpDate" <?php echo $view_pharmacy_movement_item_list->ExpDate->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_movement_item_list->RowCount ?>_view_pharmacy_movement_item_ExpDate">
<span<?php echo $view_pharmacy_movement_item_list->ExpDate->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_list->ExpDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_list->MFRCODE->Visible) { // MFRCODE ?>
		<td data-name="MFRCODE" <?php echo $view_pharmacy_movement_item_list->MFRCODE->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_movement_item_list->RowCount ?>_view_pharmacy_movement_item_MFRCODE">
<span<?php echo $view_pharmacy_movement_item_list->MFRCODE->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_list->MFRCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_list->hsn->Visible) { // hsn ?>
		<td data-name="hsn" <?php echo $view_pharmacy_movement_item_list->hsn->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_movement_item_list->RowCount ?>_view_pharmacy_movement_item_hsn">
<span<?php echo $view_pharmacy_movement_item_list->hsn->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_list->hsn->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_item_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $view_pharmacy_movement_item_list->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_movement_item_list->RowCount ?>_view_pharmacy_movement_item_HospID">
<span<?php echo $view_pharmacy_movement_item_list->HospID->viewAttributes() ?>><?php echo $view_pharmacy_movement_item_list->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_pharmacy_movement_item_list->ListOptions->render("body", "right", $view_pharmacy_movement_item_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$view_pharmacy_movement_item_list->isGridAdd())
		$view_pharmacy_movement_item_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$view_pharmacy_movement_item->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_pharmacy_movement_item_list->Recordset)
	$view_pharmacy_movement_item_list->Recordset->Close();
?>
<?php if (!$view_pharmacy_movement_item_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_pharmacy_movement_item_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_pharmacy_movement_item_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_movement_item_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_pharmacy_movement_item_list->TotalRecords == 0 && !$view_pharmacy_movement_item->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_movement_item_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_pharmacy_movement_item_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_pharmacy_movement_item_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$view_pharmacy_movement_item->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_view_pharmacy_movement_item",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$view_pharmacy_movement_item_list->terminate();
?>