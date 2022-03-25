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
$view_pharmacy_movement_list = new view_pharmacy_movement_list();

// Run the page
$view_pharmacy_movement_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacy_movement_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$view_pharmacy_movement_list->isExport()) { ?>
<script>
var fview_pharmacy_movementlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fview_pharmacy_movementlist = currentForm = new ew.Form("fview_pharmacy_movementlist", "list");
	fview_pharmacy_movementlist.formKeyCountName = '<?php echo $view_pharmacy_movement_list->FormKeyCountName ?>';
	loadjs.done("fview_pharmacy_movementlist");
});
var fview_pharmacy_movementlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fview_pharmacy_movementlistsrch = currentSearchForm = new ew.Form("fview_pharmacy_movementlistsrch");

	// Validate function for search
	fview_pharmacy_movementlistsrch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_ExpDate");
		if (elm && !ew.checkEuroDate(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacy_movement_list->ExpDate->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fview_pharmacy_movementlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_pharmacy_movementlistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	// Filters

	fview_pharmacy_movementlistsrch.filterList = <?php echo $view_pharmacy_movement_list->getFilterList() ?>;
	loadjs.done("fview_pharmacy_movementlistsrch");
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
<?php if (!$view_pharmacy_movement_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_pharmacy_movement_list->TotalRecords > 0 && $view_pharmacy_movement_list->ExportOptions->visible()) { ?>
<?php $view_pharmacy_movement_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_movement_list->ImportOptions->visible()) { ?>
<?php $view_pharmacy_movement_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_movement_list->SearchOptions->visible()) { ?>
<?php $view_pharmacy_movement_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_movement_list->FilterOptions->visible()) { ?>
<?php $view_pharmacy_movement_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_pharmacy_movement_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_pharmacy_movement_list->isExport() && !$view_pharmacy_movement->CurrentAction) { ?>
<form name="fview_pharmacy_movementlistsrch" id="fview_pharmacy_movementlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fview_pharmacy_movementlistsrch-search-panel" class="<?php echo $view_pharmacy_movement_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_pharmacy_movement">
	<div class="ew-extended-search">
<?php

// Render search row
$view_pharmacy_movement->RowType = ROWTYPE_SEARCH;
$view_pharmacy_movement->resetAttributes();
$view_pharmacy_movement_list->renderRow();
?>
<?php if ($view_pharmacy_movement_list->prc->Visible) { // prc ?>
	<?php
		$view_pharmacy_movement_list->SearchColumnCount++;
		if (($view_pharmacy_movement_list->SearchColumnCount - 1) % $view_pharmacy_movement_list->SearchFieldsPerRow == 0) {
			$view_pharmacy_movement_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_pharmacy_movement_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_prc" class="ew-cell form-group">
		<label for="x_prc" class="ew-search-caption ew-label"><?php echo $view_pharmacy_movement_list->prc->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_prc" id="z_prc" value="LIKE">
</span>
		<span id="el_view_pharmacy_movement_prc" class="ew-search-field">
<input type="text" data-table="view_pharmacy_movement" data-field="x_prc" name="x_prc" id="x_prc" size="30" maxlength="9" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_list->prc->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_list->prc->EditValue ?>"<?php echo $view_pharmacy_movement_list->prc->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_pharmacy_movement_list->SearchColumnCount % $view_pharmacy_movement_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_list->PrName->Visible) { // PrName ?>
	<?php
		$view_pharmacy_movement_list->SearchColumnCount++;
		if (($view_pharmacy_movement_list->SearchColumnCount - 1) % $view_pharmacy_movement_list->SearchFieldsPerRow == 0) {
			$view_pharmacy_movement_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_pharmacy_movement_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_PrName" class="ew-cell form-group">
		<label for="x_PrName" class="ew-search-caption ew-label"><?php echo $view_pharmacy_movement_list->PrName->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PrName" id="z_PrName" value="LIKE">
</span>
		<span id="el_view_pharmacy_movement_PrName" class="ew-search-field">
<input type="text" data-table="view_pharmacy_movement" data-field="x_PrName" name="x_PrName" id="x_PrName" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_list->PrName->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_list->PrName->EditValue ?>"<?php echo $view_pharmacy_movement_list->PrName->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_pharmacy_movement_list->SearchColumnCount % $view_pharmacy_movement_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_list->ExpDate->Visible) { // ExpDate ?>
	<?php
		$view_pharmacy_movement_list->SearchColumnCount++;
		if (($view_pharmacy_movement_list->SearchColumnCount - 1) % $view_pharmacy_movement_list->SearchFieldsPerRow == 0) {
			$view_pharmacy_movement_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_pharmacy_movement_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_ExpDate" class="ew-cell form-group">
		<label for="x_ExpDate" class="ew-search-caption ew-label"><?php echo $view_pharmacy_movement_list->ExpDate->caption() ?></label>
		<span class="ew-search-operator">
<select name="z_ExpDate" id="z_ExpDate" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?php echo $view_pharmacy_movement_list->ExpDate->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?php echo $Language->phrase("EQUAL") ?></option>
<option value="<>"<?php echo $view_pharmacy_movement_list->ExpDate->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?php echo $Language->phrase("<>") ?></option>
<option value="<"<?php echo $view_pharmacy_movement_list->ExpDate->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?php echo $Language->phrase("<") ?></option>
<option value="<="<?php echo $view_pharmacy_movement_list->ExpDate->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?php echo $Language->phrase("<=") ?></option>
<option value=">"<?php echo $view_pharmacy_movement_list->ExpDate->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?php echo $Language->phrase(">") ?></option>
<option value=">="<?php echo $view_pharmacy_movement_list->ExpDate->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?php echo $Language->phrase(">=") ?></option>
<option value="IS NULL"<?php echo $view_pharmacy_movement_list->ExpDate->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?php echo $view_pharmacy_movement_list->ExpDate->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?php echo $view_pharmacy_movement_list->ExpDate->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?php echo $Language->phrase("BETWEEN") ?></option>
</select>
</span>
		<span id="el_view_pharmacy_movement_ExpDate" class="ew-search-field">
<input type="text" data-table="view_pharmacy_movement" data-field="x_ExpDate" data-format="7" name="x_ExpDate" id="x_ExpDate" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_list->ExpDate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_list->ExpDate->EditValue ?>"<?php echo $view_pharmacy_movement_list->ExpDate->editAttributes() ?>>
<?php if (!$view_pharmacy_movement_list->ExpDate->ReadOnly && !$view_pharmacy_movement_list->ExpDate->Disabled && !isset($view_pharmacy_movement_list->ExpDate->EditAttrs["readonly"]) && !isset($view_pharmacy_movement_list->ExpDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_movementlistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacy_movementlistsrch", "x_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
		<span class="ew-search-and d-none"><label><?php echo $Language->phrase("AND") ?></label></span>
		<span id="el2_view_pharmacy_movement_ExpDate" class="ew-search-field2 d-none">
<input type="text" data-table="view_pharmacy_movement" data-field="x_ExpDate" data-format="7" name="y_ExpDate" id="y_ExpDate" placeholder="<?php echo HtmlEncode($view_pharmacy_movement_list->ExpDate->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_movement_list->ExpDate->EditValue2 ?>"<?php echo $view_pharmacy_movement_list->ExpDate->editAttributes() ?>>
<?php if (!$view_pharmacy_movement_list->ExpDate->ReadOnly && !$view_pharmacy_movement_list->ExpDate->Disabled && !isset($view_pharmacy_movement_list->ExpDate->EditAttrs["readonly"]) && !isset($view_pharmacy_movement_list->ExpDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_movementlistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacy_movementlistsrch", "y_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
	</div>
	<?php if ($view_pharmacy_movement_list->SearchColumnCount % $view_pharmacy_movement_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($view_pharmacy_movement_list->SearchColumnCount % $view_pharmacy_movement_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $view_pharmacy_movement_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($view_pharmacy_movement_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($view_pharmacy_movement_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_pharmacy_movement_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_pharmacy_movement_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_movement_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_movement_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_movement_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $view_pharmacy_movement_list->showPageHeader(); ?>
<?php
$view_pharmacy_movement_list->showMessage();
?>
<?php if ($view_pharmacy_movement_list->TotalRecords > 0 || $view_pharmacy_movement->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_pharmacy_movement_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_pharmacy_movement">
<?php if (!$view_pharmacy_movement_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_pharmacy_movement_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_pharmacy_movement_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_movement_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_pharmacy_movementlist" id="fview_pharmacy_movementlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_movement">
<div id="gmp_view_pharmacy_movement" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($view_pharmacy_movement_list->TotalRecords > 0 || $view_pharmacy_movement_list->isGridEdit()) { ?>
<table id="tbl_view_pharmacy_movementlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_pharmacy_movement->RowType = ROWTYPE_HEADER;

// Render list options
$view_pharmacy_movement_list->renderListOptions();

// Render list options (header, left)
$view_pharmacy_movement_list->ListOptions->render("header", "left");
?>
<?php if ($view_pharmacy_movement_list->prc->Visible) { // prc ?>
	<?php if ($view_pharmacy_movement_list->SortUrl($view_pharmacy_movement_list->prc) == "") { ?>
		<th data-name="prc" class="<?php echo $view_pharmacy_movement_list->prc->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_prc" class="view_pharmacy_movement_prc"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_list->prc->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="prc" class="<?php echo $view_pharmacy_movement_list->prc->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_movement_list->SortUrl($view_pharmacy_movement_list->prc) ?>', 1);"><div id="elh_view_pharmacy_movement_prc" class="view_pharmacy_movement_prc">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_list->prc->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_list->prc->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_list->prc->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_list->PrName->Visible) { // PrName ?>
	<?php if ($view_pharmacy_movement_list->SortUrl($view_pharmacy_movement_list->PrName) == "") { ?>
		<th data-name="PrName" class="<?php echo $view_pharmacy_movement_list->PrName->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_PrName" class="view_pharmacy_movement_PrName"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_list->PrName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrName" class="<?php echo $view_pharmacy_movement_list->PrName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_movement_list->SortUrl($view_pharmacy_movement_list->PrName) ?>', 1);"><div id="elh_view_pharmacy_movement_PrName" class="view_pharmacy_movement_PrName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_list->PrName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_list->PrName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_list->PrName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_list->BatchNo->Visible) { // BatchNo ?>
	<?php if ($view_pharmacy_movement_list->SortUrl($view_pharmacy_movement_list->BatchNo) == "") { ?>
		<th data-name="BatchNo" class="<?php echo $view_pharmacy_movement_list->BatchNo->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_BatchNo" class="view_pharmacy_movement_BatchNo"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_list->BatchNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BatchNo" class="<?php echo $view_pharmacy_movement_list->BatchNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_movement_list->SortUrl($view_pharmacy_movement_list->BatchNo) ?>', 1);"><div id="elh_view_pharmacy_movement_BatchNo" class="view_pharmacy_movement_BatchNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_list->BatchNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_list->BatchNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_list->BatchNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_list->ExpDate->Visible) { // ExpDate ?>
	<?php if ($view_pharmacy_movement_list->SortUrl($view_pharmacy_movement_list->ExpDate) == "") { ?>
		<th data-name="ExpDate" class="<?php echo $view_pharmacy_movement_list->ExpDate->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_ExpDate" class="view_pharmacy_movement_ExpDate"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_list->ExpDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ExpDate" class="<?php echo $view_pharmacy_movement_list->ExpDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_movement_list->SortUrl($view_pharmacy_movement_list->ExpDate) ?>', 1);"><div id="elh_view_pharmacy_movement_ExpDate" class="view_pharmacy_movement_ExpDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_list->ExpDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_list->ExpDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_list->ExpDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_list->MFRCODE->Visible) { // MFRCODE ?>
	<?php if ($view_pharmacy_movement_list->SortUrl($view_pharmacy_movement_list->MFRCODE) == "") { ?>
		<th data-name="MFRCODE" class="<?php echo $view_pharmacy_movement_list->MFRCODE->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_MFRCODE" class="view_pharmacy_movement_MFRCODE"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_list->MFRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MFRCODE" class="<?php echo $view_pharmacy_movement_list->MFRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_movement_list->SortUrl($view_pharmacy_movement_list->MFRCODE) ?>', 1);"><div id="elh_view_pharmacy_movement_MFRCODE" class="view_pharmacy_movement_MFRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_list->MFRCODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_list->MFRCODE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_list->MFRCODE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_list->hsn->Visible) { // hsn ?>
	<?php if ($view_pharmacy_movement_list->SortUrl($view_pharmacy_movement_list->hsn) == "") { ?>
		<th data-name="hsn" class="<?php echo $view_pharmacy_movement_list->hsn->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_hsn" class="view_pharmacy_movement_hsn"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_list->hsn->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="hsn" class="<?php echo $view_pharmacy_movement_list->hsn->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_movement_list->SortUrl($view_pharmacy_movement_list->hsn) ?>', 1);"><div id="elh_view_pharmacy_movement_hsn" class="view_pharmacy_movement_hsn">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_list->hsn->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_list->hsn->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_list->hsn->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_movement_list->HospID->Visible) { // HospID ?>
	<?php if ($view_pharmacy_movement_list->SortUrl($view_pharmacy_movement_list->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_pharmacy_movement_list->HospID->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_HospID" class="view_pharmacy_movement_HospID"><div class="ew-table-header-caption"><?php echo $view_pharmacy_movement_list->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_pharmacy_movement_list->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_movement_list->SortUrl($view_pharmacy_movement_list->HospID) ?>', 1);"><div id="elh_view_pharmacy_movement_HospID" class="view_pharmacy_movement_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_movement_list->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_movement_list->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_movement_list->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_pharmacy_movement_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_pharmacy_movement_list->ExportAll && $view_pharmacy_movement_list->isExport()) {
	$view_pharmacy_movement_list->StopRecord = $view_pharmacy_movement_list->TotalRecords;
} else {

	// Set the last record to display
	if ($view_pharmacy_movement_list->TotalRecords > $view_pharmacy_movement_list->StartRecord + $view_pharmacy_movement_list->DisplayRecords - 1)
		$view_pharmacy_movement_list->StopRecord = $view_pharmacy_movement_list->StartRecord + $view_pharmacy_movement_list->DisplayRecords - 1;
	else
		$view_pharmacy_movement_list->StopRecord = $view_pharmacy_movement_list->TotalRecords;
}
$view_pharmacy_movement_list->RecordCount = $view_pharmacy_movement_list->StartRecord - 1;
if ($view_pharmacy_movement_list->Recordset && !$view_pharmacy_movement_list->Recordset->EOF) {
	$view_pharmacy_movement_list->Recordset->moveFirst();
	$selectLimit = $view_pharmacy_movement_list->UseSelectLimit;
	if (!$selectLimit && $view_pharmacy_movement_list->StartRecord > 1)
		$view_pharmacy_movement_list->Recordset->move($view_pharmacy_movement_list->StartRecord - 1);
} elseif (!$view_pharmacy_movement->AllowAddDeleteRow && $view_pharmacy_movement_list->StopRecord == 0) {
	$view_pharmacy_movement_list->StopRecord = $view_pharmacy_movement->GridAddRowCount;
}

// Initialize aggregate
$view_pharmacy_movement->RowType = ROWTYPE_AGGREGATEINIT;
$view_pharmacy_movement->resetAttributes();
$view_pharmacy_movement_list->renderRow();
while ($view_pharmacy_movement_list->RecordCount < $view_pharmacy_movement_list->StopRecord) {
	$view_pharmacy_movement_list->RecordCount++;
	if ($view_pharmacy_movement_list->RecordCount >= $view_pharmacy_movement_list->StartRecord) {
		$view_pharmacy_movement_list->RowCount++;

		// Set up key count
		$view_pharmacy_movement_list->KeyCount = $view_pharmacy_movement_list->RowIndex;

		// Init row class and style
		$view_pharmacy_movement->resetAttributes();
		$view_pharmacy_movement->CssClass = "";
		if ($view_pharmacy_movement_list->isGridAdd()) {
		} else {
			$view_pharmacy_movement_list->loadRowValues($view_pharmacy_movement_list->Recordset); // Load row values
		}
		$view_pharmacy_movement->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_pharmacy_movement->RowAttrs->merge(["data-rowindex" => $view_pharmacy_movement_list->RowCount, "id" => "r" . $view_pharmacy_movement_list->RowCount . "_view_pharmacy_movement", "data-rowtype" => $view_pharmacy_movement->RowType]);

		// Render row
		$view_pharmacy_movement_list->renderRow();

		// Render list options
		$view_pharmacy_movement_list->renderListOptions();
?>
	<tr <?php echo $view_pharmacy_movement->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_pharmacy_movement_list->ListOptions->render("body", "left", $view_pharmacy_movement_list->RowCount);
?>
	<?php if ($view_pharmacy_movement_list->prc->Visible) { // prc ?>
		<td data-name="prc" <?php echo $view_pharmacy_movement_list->prc->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_movement_list->RowCount ?>_view_pharmacy_movement_prc">
<span<?php echo $view_pharmacy_movement_list->prc->viewAttributes() ?>><?php echo $view_pharmacy_movement_list->prc->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_list->PrName->Visible) { // PrName ?>
		<td data-name="PrName" <?php echo $view_pharmacy_movement_list->PrName->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_movement_list->RowCount ?>_view_pharmacy_movement_PrName">
<span<?php echo $view_pharmacy_movement_list->PrName->viewAttributes() ?>><?php echo $view_pharmacy_movement_list->PrName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_list->BatchNo->Visible) { // BatchNo ?>
		<td data-name="BatchNo" <?php echo $view_pharmacy_movement_list->BatchNo->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_movement_list->RowCount ?>_view_pharmacy_movement_BatchNo">
<span<?php echo $view_pharmacy_movement_list->BatchNo->viewAttributes() ?>><?php echo $view_pharmacy_movement_list->BatchNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_list->ExpDate->Visible) { // ExpDate ?>
		<td data-name="ExpDate" <?php echo $view_pharmacy_movement_list->ExpDate->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_movement_list->RowCount ?>_view_pharmacy_movement_ExpDate">
<span<?php echo $view_pharmacy_movement_list->ExpDate->viewAttributes() ?>><?php echo $view_pharmacy_movement_list->ExpDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_list->MFRCODE->Visible) { // MFRCODE ?>
		<td data-name="MFRCODE" <?php echo $view_pharmacy_movement_list->MFRCODE->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_movement_list->RowCount ?>_view_pharmacy_movement_MFRCODE">
<span<?php echo $view_pharmacy_movement_list->MFRCODE->viewAttributes() ?>><?php echo $view_pharmacy_movement_list->MFRCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_list->hsn->Visible) { // hsn ?>
		<td data-name="hsn" <?php echo $view_pharmacy_movement_list->hsn->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_movement_list->RowCount ?>_view_pharmacy_movement_hsn">
<span<?php echo $view_pharmacy_movement_list->hsn->viewAttributes() ?>><?php echo $view_pharmacy_movement_list->hsn->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_movement_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $view_pharmacy_movement_list->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_movement_list->RowCount ?>_view_pharmacy_movement_HospID">
<span<?php echo $view_pharmacy_movement_list->HospID->viewAttributes() ?>><?php echo $view_pharmacy_movement_list->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_pharmacy_movement_list->ListOptions->render("body", "right", $view_pharmacy_movement_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$view_pharmacy_movement_list->isGridAdd())
		$view_pharmacy_movement_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$view_pharmacy_movement->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_pharmacy_movement_list->Recordset)
	$view_pharmacy_movement_list->Recordset->Close();
?>
<?php if (!$view_pharmacy_movement_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_pharmacy_movement_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_pharmacy_movement_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_movement_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_pharmacy_movement_list->TotalRecords == 0 && !$view_pharmacy_movement->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_movement_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_pharmacy_movement_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_pharmacy_movement_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$view_pharmacy_movement->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_view_pharmacy_movement",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$view_pharmacy_movement_list->terminate();
?>