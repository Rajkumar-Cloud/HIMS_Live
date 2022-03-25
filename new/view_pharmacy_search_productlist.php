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
$view_pharmacy_search_product_list = new view_pharmacy_search_product_list();

// Run the page
$view_pharmacy_search_product_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacy_search_product_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$view_pharmacy_search_product_list->isExport()) { ?>
<script>
var fview_pharmacy_search_productlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fview_pharmacy_search_productlist = currentForm = new ew.Form("fview_pharmacy_search_productlist", "list");
	fview_pharmacy_search_productlist.formKeyCountName = '<?php echo $view_pharmacy_search_product_list->FormKeyCountName ?>';
	loadjs.done("fview_pharmacy_search_productlist");
});
var fview_pharmacy_search_productlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fview_pharmacy_search_productlistsrch = currentSearchForm = new ew.Form("fview_pharmacy_search_productlistsrch");

	// Validate function for search
	fview_pharmacy_search_productlistsrch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_Stock");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacy_search_product_list->Stock->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_EXPDT");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacy_search_product_list->EXPDT->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_BILLDATE");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_pharmacy_search_product_list->BILLDATE->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fview_pharmacy_search_productlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_pharmacy_search_productlistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	// Filters

	fview_pharmacy_search_productlistsrch.filterList = <?php echo $view_pharmacy_search_product_list->getFilterList() ?>;
	loadjs.done("fview_pharmacy_search_productlistsrch");
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
<?php if (!$view_pharmacy_search_product_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_pharmacy_search_product_list->TotalRecords > 0 && $view_pharmacy_search_product_list->ExportOptions->visible()) { ?>
<?php $view_pharmacy_search_product_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_search_product_list->ImportOptions->visible()) { ?>
<?php $view_pharmacy_search_product_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_search_product_list->SearchOptions->visible()) { ?>
<?php $view_pharmacy_search_product_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_pharmacy_search_product_list->FilterOptions->visible()) { ?>
<?php $view_pharmacy_search_product_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_pharmacy_search_product_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_pharmacy_search_product_list->isExport() && !$view_pharmacy_search_product->CurrentAction) { ?>
<form name="fview_pharmacy_search_productlistsrch" id="fview_pharmacy_search_productlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fview_pharmacy_search_productlistsrch-search-panel" class="<?php echo $view_pharmacy_search_product_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_pharmacy_search_product">
	<div class="ew-extended-search">
<?php

// Render search row
$view_pharmacy_search_product->RowType = ROWTYPE_SEARCH;
$view_pharmacy_search_product->resetAttributes();
$view_pharmacy_search_product_list->renderRow();
?>
<?php if ($view_pharmacy_search_product_list->DES->Visible) { // DES ?>
	<?php
		$view_pharmacy_search_product_list->SearchColumnCount++;
		if (($view_pharmacy_search_product_list->SearchColumnCount - 1) % $view_pharmacy_search_product_list->SearchFieldsPerRow == 0) {
			$view_pharmacy_search_product_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_pharmacy_search_product_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_DES" class="ew-cell form-group">
		<label for="x_DES" class="ew-search-caption ew-label"><?php echo $view_pharmacy_search_product_list->DES->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DES" id="z_DES" value="LIKE">
</span>
		<span id="el_view_pharmacy_search_product_DES" class="ew-search-field">
<input type="text" data-table="view_pharmacy_search_product" data-field="x_DES" name="x_DES" id="x_DES" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_pharmacy_search_product_list->DES->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_search_product_list->DES->EditValue ?>"<?php echo $view_pharmacy_search_product_list->DES->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_pharmacy_search_product_list->SearchColumnCount % $view_pharmacy_search_product_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_search_product_list->Stock->Visible) { // Stock ?>
	<?php
		$view_pharmacy_search_product_list->SearchColumnCount++;
		if (($view_pharmacy_search_product_list->SearchColumnCount - 1) % $view_pharmacy_search_product_list->SearchFieldsPerRow == 0) {
			$view_pharmacy_search_product_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_pharmacy_search_product_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_Stock" class="ew-cell form-group">
		<label for="x_Stock" class="ew-search-caption ew-label"><?php echo $view_pharmacy_search_product_list->Stock->caption() ?></label>
		<span class="ew-search-operator">
<select name="z_Stock" id="z_Stock" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?php echo $view_pharmacy_search_product_list->Stock->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?php echo $Language->phrase("EQUAL") ?></option>
<option value="<>"<?php echo $view_pharmacy_search_product_list->Stock->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?php echo $Language->phrase("<>") ?></option>
<option value="<"<?php echo $view_pharmacy_search_product_list->Stock->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?php echo $Language->phrase("<") ?></option>
<option value="<="<?php echo $view_pharmacy_search_product_list->Stock->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?php echo $Language->phrase("<=") ?></option>
<option value=">"<?php echo $view_pharmacy_search_product_list->Stock->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?php echo $Language->phrase(">") ?></option>
<option value=">="<?php echo $view_pharmacy_search_product_list->Stock->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?php echo $Language->phrase(">=") ?></option>
<option value="IS NULL"<?php echo $view_pharmacy_search_product_list->Stock->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?php echo $view_pharmacy_search_product_list->Stock->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?php echo $view_pharmacy_search_product_list->Stock->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?php echo $Language->phrase("BETWEEN") ?></option>
</select>
</span>
		<span id="el_view_pharmacy_search_product_Stock" class="ew-search-field">
<input type="text" data-table="view_pharmacy_search_product" data-field="x_Stock" name="x_Stock" id="x_Stock" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_search_product_list->Stock->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_search_product_list->Stock->EditValue ?>"<?php echo $view_pharmacy_search_product_list->Stock->editAttributes() ?>>
</span>
		<span class="ew-search-and d-none"><label><?php echo $Language->phrase("AND") ?></label></span>
		<span id="el2_view_pharmacy_search_product_Stock" class="ew-search-field2 d-none">
<input type="text" data-table="view_pharmacy_search_product" data-field="x_Stock" name="y_Stock" id="y_Stock" size="30" placeholder="<?php echo HtmlEncode($view_pharmacy_search_product_list->Stock->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_search_product_list->Stock->EditValue2 ?>"<?php echo $view_pharmacy_search_product_list->Stock->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_pharmacy_search_product_list->SearchColumnCount % $view_pharmacy_search_product_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_search_product_list->EXPDT->Visible) { // EXPDT ?>
	<?php
		$view_pharmacy_search_product_list->SearchColumnCount++;
		if (($view_pharmacy_search_product_list->SearchColumnCount - 1) % $view_pharmacy_search_product_list->SearchFieldsPerRow == 0) {
			$view_pharmacy_search_product_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_pharmacy_search_product_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_EXPDT" class="ew-cell form-group">
		<label for="x_EXPDT" class="ew-search-caption ew-label"><?php echo $view_pharmacy_search_product_list->EXPDT->caption() ?></label>
		<span class="ew-search-operator">
<select name="z_EXPDT" id="z_EXPDT" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?php echo $view_pharmacy_search_product_list->EXPDT->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?php echo $Language->phrase("EQUAL") ?></option>
<option value="<>"<?php echo $view_pharmacy_search_product_list->EXPDT->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?php echo $Language->phrase("<>") ?></option>
<option value="<"<?php echo $view_pharmacy_search_product_list->EXPDT->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?php echo $Language->phrase("<") ?></option>
<option value="<="<?php echo $view_pharmacy_search_product_list->EXPDT->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?php echo $Language->phrase("<=") ?></option>
<option value=">"<?php echo $view_pharmacy_search_product_list->EXPDT->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?php echo $Language->phrase(">") ?></option>
<option value=">="<?php echo $view_pharmacy_search_product_list->EXPDT->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?php echo $Language->phrase(">=") ?></option>
<option value="IS NULL"<?php echo $view_pharmacy_search_product_list->EXPDT->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?php echo $view_pharmacy_search_product_list->EXPDT->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?php echo $view_pharmacy_search_product_list->EXPDT->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?php echo $Language->phrase("BETWEEN") ?></option>
</select>
</span>
		<span id="el_view_pharmacy_search_product_EXPDT" class="ew-search-field">
<input type="text" data-table="view_pharmacy_search_product" data-field="x_EXPDT" name="x_EXPDT" id="x_EXPDT" placeholder="<?php echo HtmlEncode($view_pharmacy_search_product_list->EXPDT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_search_product_list->EXPDT->EditValue ?>"<?php echo $view_pharmacy_search_product_list->EXPDT->editAttributes() ?>>
<?php if (!$view_pharmacy_search_product_list->EXPDT->ReadOnly && !$view_pharmacy_search_product_list->EXPDT->Disabled && !isset($view_pharmacy_search_product_list->EXPDT->EditAttrs["readonly"]) && !isset($view_pharmacy_search_product_list->EXPDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_search_productlistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacy_search_productlistsrch", "x_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		<span class="ew-search-and d-none"><label><?php echo $Language->phrase("AND") ?></label></span>
		<span id="el2_view_pharmacy_search_product_EXPDT" class="ew-search-field2 d-none">
<input type="text" data-table="view_pharmacy_search_product" data-field="x_EXPDT" name="y_EXPDT" id="y_EXPDT" placeholder="<?php echo HtmlEncode($view_pharmacy_search_product_list->EXPDT->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_search_product_list->EXPDT->EditValue2 ?>"<?php echo $view_pharmacy_search_product_list->EXPDT->editAttributes() ?>>
<?php if (!$view_pharmacy_search_product_list->EXPDT->ReadOnly && !$view_pharmacy_search_product_list->EXPDT->Disabled && !isset($view_pharmacy_search_product_list->EXPDT->EditAttrs["readonly"]) && !isset($view_pharmacy_search_product_list->EXPDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_search_productlistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacy_search_productlistsrch", "y_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
	</div>
	<?php if ($view_pharmacy_search_product_list->SearchColumnCount % $view_pharmacy_search_product_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_search_product_list->BILLDATE->Visible) { // BILLDATE ?>
	<?php
		$view_pharmacy_search_product_list->SearchColumnCount++;
		if (($view_pharmacy_search_product_list->SearchColumnCount - 1) % $view_pharmacy_search_product_list->SearchFieldsPerRow == 0) {
			$view_pharmacy_search_product_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_pharmacy_search_product_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_BILLDATE" class="ew-cell form-group">
		<label for="x_BILLDATE" class="ew-search-caption ew-label"><?php echo $view_pharmacy_search_product_list->BILLDATE->caption() ?></label>
		<span class="ew-search-operator">
<select name="z_BILLDATE" id="z_BILLDATE" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?php echo $view_pharmacy_search_product_list->BILLDATE->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?php echo $Language->phrase("EQUAL") ?></option>
<option value="<>"<?php echo $view_pharmacy_search_product_list->BILLDATE->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?php echo $Language->phrase("<>") ?></option>
<option value="<"<?php echo $view_pharmacy_search_product_list->BILLDATE->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?php echo $Language->phrase("<") ?></option>
<option value="<="<?php echo $view_pharmacy_search_product_list->BILLDATE->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?php echo $Language->phrase("<=") ?></option>
<option value=">"<?php echo $view_pharmacy_search_product_list->BILLDATE->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?php echo $Language->phrase(">") ?></option>
<option value=">="<?php echo $view_pharmacy_search_product_list->BILLDATE->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?php echo $Language->phrase(">=") ?></option>
<option value="IS NULL"<?php echo $view_pharmacy_search_product_list->BILLDATE->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?php echo $view_pharmacy_search_product_list->BILLDATE->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?php echo $view_pharmacy_search_product_list->BILLDATE->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?php echo $Language->phrase("BETWEEN") ?></option>
</select>
</span>
		<span id="el_view_pharmacy_search_product_BILLDATE" class="ew-search-field">
<input type="text" data-table="view_pharmacy_search_product" data-field="x_BILLDATE" name="x_BILLDATE" id="x_BILLDATE" placeholder="<?php echo HtmlEncode($view_pharmacy_search_product_list->BILLDATE->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_search_product_list->BILLDATE->EditValue ?>"<?php echo $view_pharmacy_search_product_list->BILLDATE->editAttributes() ?>>
<?php if (!$view_pharmacy_search_product_list->BILLDATE->ReadOnly && !$view_pharmacy_search_product_list->BILLDATE->Disabled && !isset($view_pharmacy_search_product_list->BILLDATE->EditAttrs["readonly"]) && !isset($view_pharmacy_search_product_list->BILLDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_search_productlistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacy_search_productlistsrch", "x_BILLDATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		<span class="ew-search-and d-none"><label><?php echo $Language->phrase("AND") ?></label></span>
		<span id="el2_view_pharmacy_search_product_BILLDATE" class="ew-search-field2 d-none">
<input type="text" data-table="view_pharmacy_search_product" data-field="x_BILLDATE" name="y_BILLDATE" id="y_BILLDATE" placeholder="<?php echo HtmlEncode($view_pharmacy_search_product_list->BILLDATE->getPlaceHolder()) ?>" value="<?php echo $view_pharmacy_search_product_list->BILLDATE->EditValue2 ?>"<?php echo $view_pharmacy_search_product_list->BILLDATE->editAttributes() ?>>
<?php if (!$view_pharmacy_search_product_list->BILLDATE->ReadOnly && !$view_pharmacy_search_product_list->BILLDATE->Disabled && !isset($view_pharmacy_search_product_list->BILLDATE->EditAttrs["readonly"]) && !isset($view_pharmacy_search_product_list->BILLDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_search_productlistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_pharmacy_search_productlistsrch", "y_BILLDATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
	</div>
	<?php if ($view_pharmacy_search_product_list->SearchColumnCount % $view_pharmacy_search_product_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($view_pharmacy_search_product_list->SearchColumnCount % $view_pharmacy_search_product_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $view_pharmacy_search_product_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($view_pharmacy_search_product_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($view_pharmacy_search_product_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_pharmacy_search_product_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_pharmacy_search_product_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_search_product_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_search_product_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_pharmacy_search_product_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $view_pharmacy_search_product_list->showPageHeader(); ?>
<?php
$view_pharmacy_search_product_list->showMessage();
?>
<?php if ($view_pharmacy_search_product_list->TotalRecords > 0 || $view_pharmacy_search_product->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_pharmacy_search_product_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_pharmacy_search_product">
<?php if (!$view_pharmacy_search_product_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_pharmacy_search_product_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_pharmacy_search_product_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_search_product_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_pharmacy_search_productlist" id="fview_pharmacy_search_productlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_search_product">
<div id="gmp_view_pharmacy_search_product" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($view_pharmacy_search_product_list->TotalRecords > 0 || $view_pharmacy_search_product_list->isGridEdit()) { ?>
<table id="tbl_view_pharmacy_search_productlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_pharmacy_search_product->RowType = ROWTYPE_HEADER;

// Render list options
$view_pharmacy_search_product_list->renderListOptions();

// Render list options (header, left)
$view_pharmacy_search_product_list->ListOptions->render("header", "left");
?>
<?php if ($view_pharmacy_search_product_list->PRC->Visible) { // PRC ?>
	<?php if ($view_pharmacy_search_product_list->SortUrl($view_pharmacy_search_product_list->PRC) == "") { ?>
		<th data-name="PRC" class="<?php echo $view_pharmacy_search_product_list->PRC->headerCellClass() ?>"><div id="elh_view_pharmacy_search_product_PRC" class="view_pharmacy_search_product_PRC"><div class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_list->PRC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PRC" class="<?php echo $view_pharmacy_search_product_list->PRC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_search_product_list->SortUrl($view_pharmacy_search_product_list->PRC) ?>', 1);"><div id="elh_view_pharmacy_search_product_PRC" class="view_pharmacy_search_product_PRC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_list->PRC->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_search_product_list->PRC->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_search_product_list->PRC->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_search_product_list->DES->Visible) { // DES ?>
	<?php if ($view_pharmacy_search_product_list->SortUrl($view_pharmacy_search_product_list->DES) == "") { ?>
		<th data-name="DES" class="<?php echo $view_pharmacy_search_product_list->DES->headerCellClass() ?>"><div id="elh_view_pharmacy_search_product_DES" class="view_pharmacy_search_product_DES"><div class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_list->DES->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DES" class="<?php echo $view_pharmacy_search_product_list->DES->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_search_product_list->SortUrl($view_pharmacy_search_product_list->DES) ?>', 1);"><div id="elh_view_pharmacy_search_product_DES" class="view_pharmacy_search_product_DES">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_list->DES->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_search_product_list->DES->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_search_product_list->DES->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_search_product_list->BATCH->Visible) { // BATCH ?>
	<?php if ($view_pharmacy_search_product_list->SortUrl($view_pharmacy_search_product_list->BATCH) == "") { ?>
		<th data-name="BATCH" class="<?php echo $view_pharmacy_search_product_list->BATCH->headerCellClass() ?>"><div id="elh_view_pharmacy_search_product_BATCH" class="view_pharmacy_search_product_BATCH"><div class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_list->BATCH->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BATCH" class="<?php echo $view_pharmacy_search_product_list->BATCH->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_search_product_list->SortUrl($view_pharmacy_search_product_list->BATCH) ?>', 1);"><div id="elh_view_pharmacy_search_product_BATCH" class="view_pharmacy_search_product_BATCH">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_list->BATCH->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_search_product_list->BATCH->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_search_product_list->BATCH->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_search_product_list->Stock->Visible) { // Stock ?>
	<?php if ($view_pharmacy_search_product_list->SortUrl($view_pharmacy_search_product_list->Stock) == "") { ?>
		<th data-name="Stock" class="<?php echo $view_pharmacy_search_product_list->Stock->headerCellClass() ?>"><div id="elh_view_pharmacy_search_product_Stock" class="view_pharmacy_search_product_Stock"><div class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_list->Stock->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Stock" class="<?php echo $view_pharmacy_search_product_list->Stock->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_search_product_list->SortUrl($view_pharmacy_search_product_list->Stock) ?>', 1);"><div id="elh_view_pharmacy_search_product_Stock" class="view_pharmacy_search_product_Stock">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_list->Stock->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_search_product_list->Stock->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_search_product_list->Stock->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_search_product_list->EXPDT->Visible) { // EXPDT ?>
	<?php if ($view_pharmacy_search_product_list->SortUrl($view_pharmacy_search_product_list->EXPDT) == "") { ?>
		<th data-name="EXPDT" class="<?php echo $view_pharmacy_search_product_list->EXPDT->headerCellClass() ?>"><div id="elh_view_pharmacy_search_product_EXPDT" class="view_pharmacy_search_product_EXPDT"><div class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_list->EXPDT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EXPDT" class="<?php echo $view_pharmacy_search_product_list->EXPDT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_search_product_list->SortUrl($view_pharmacy_search_product_list->EXPDT) ?>', 1);"><div id="elh_view_pharmacy_search_product_EXPDT" class="view_pharmacy_search_product_EXPDT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_list->EXPDT->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_search_product_list->EXPDT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_search_product_list->EXPDT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_search_product_list->UNIT->Visible) { // UNIT ?>
	<?php if ($view_pharmacy_search_product_list->SortUrl($view_pharmacy_search_product_list->UNIT) == "") { ?>
		<th data-name="UNIT" class="<?php echo $view_pharmacy_search_product_list->UNIT->headerCellClass() ?>"><div id="elh_view_pharmacy_search_product_UNIT" class="view_pharmacy_search_product_UNIT"><div class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_list->UNIT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UNIT" class="<?php echo $view_pharmacy_search_product_list->UNIT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_search_product_list->SortUrl($view_pharmacy_search_product_list->UNIT) ?>', 1);"><div id="elh_view_pharmacy_search_product_UNIT" class="view_pharmacy_search_product_UNIT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_list->UNIT->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_search_product_list->UNIT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_search_product_list->UNIT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_search_product_list->RT->Visible) { // RT ?>
	<?php if ($view_pharmacy_search_product_list->SortUrl($view_pharmacy_search_product_list->RT) == "") { ?>
		<th data-name="RT" class="<?php echo $view_pharmacy_search_product_list->RT->headerCellClass() ?>"><div id="elh_view_pharmacy_search_product_RT" class="view_pharmacy_search_product_RT"><div class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_list->RT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RT" class="<?php echo $view_pharmacy_search_product_list->RT->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_search_product_list->SortUrl($view_pharmacy_search_product_list->RT) ?>', 1);"><div id="elh_view_pharmacy_search_product_RT" class="view_pharmacy_search_product_RT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_list->RT->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_search_product_list->RT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_search_product_list->RT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_search_product_list->OQ->Visible) { // OQ ?>
	<?php if ($view_pharmacy_search_product_list->SortUrl($view_pharmacy_search_product_list->OQ) == "") { ?>
		<th data-name="OQ" class="<?php echo $view_pharmacy_search_product_list->OQ->headerCellClass() ?>"><div id="elh_view_pharmacy_search_product_OQ" class="view_pharmacy_search_product_OQ"><div class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_list->OQ->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OQ" class="<?php echo $view_pharmacy_search_product_list->OQ->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_search_product_list->SortUrl($view_pharmacy_search_product_list->OQ) ?>', 1);"><div id="elh_view_pharmacy_search_product_OQ" class="view_pharmacy_search_product_OQ">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_list->OQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_search_product_list->OQ->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_search_product_list->OQ->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_search_product_list->GENNAME->Visible) { // GENNAME ?>
	<?php if ($view_pharmacy_search_product_list->SortUrl($view_pharmacy_search_product_list->GENNAME) == "") { ?>
		<th data-name="GENNAME" class="<?php echo $view_pharmacy_search_product_list->GENNAME->headerCellClass() ?>"><div id="elh_view_pharmacy_search_product_GENNAME" class="view_pharmacy_search_product_GENNAME"><div class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_list->GENNAME->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GENNAME" class="<?php echo $view_pharmacy_search_product_list->GENNAME->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_search_product_list->SortUrl($view_pharmacy_search_product_list->GENNAME) ?>', 1);"><div id="elh_view_pharmacy_search_product_GENNAME" class="view_pharmacy_search_product_GENNAME">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_list->GENNAME->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_search_product_list->GENNAME->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_search_product_list->GENNAME->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_search_product_list->SSGST->Visible) { // SSGST ?>
	<?php if ($view_pharmacy_search_product_list->SortUrl($view_pharmacy_search_product_list->SSGST) == "") { ?>
		<th data-name="SSGST" class="<?php echo $view_pharmacy_search_product_list->SSGST->headerCellClass() ?>"><div id="elh_view_pharmacy_search_product_SSGST" class="view_pharmacy_search_product_SSGST"><div class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_list->SSGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SSGST" class="<?php echo $view_pharmacy_search_product_list->SSGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_search_product_list->SortUrl($view_pharmacy_search_product_list->SSGST) ?>', 1);"><div id="elh_view_pharmacy_search_product_SSGST" class="view_pharmacy_search_product_SSGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_list->SSGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_search_product_list->SSGST->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_search_product_list->SSGST->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_search_product_list->SCGST->Visible) { // SCGST ?>
	<?php if ($view_pharmacy_search_product_list->SortUrl($view_pharmacy_search_product_list->SCGST) == "") { ?>
		<th data-name="SCGST" class="<?php echo $view_pharmacy_search_product_list->SCGST->headerCellClass() ?>"><div id="elh_view_pharmacy_search_product_SCGST" class="view_pharmacy_search_product_SCGST"><div class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_list->SCGST->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SCGST" class="<?php echo $view_pharmacy_search_product_list->SCGST->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_search_product_list->SortUrl($view_pharmacy_search_product_list->SCGST) ?>', 1);"><div id="elh_view_pharmacy_search_product_SCGST" class="view_pharmacy_search_product_SCGST">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_list->SCGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_search_product_list->SCGST->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_search_product_list->SCGST->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_search_product_list->MFRCODE->Visible) { // MFRCODE ?>
	<?php if ($view_pharmacy_search_product_list->SortUrl($view_pharmacy_search_product_list->MFRCODE) == "") { ?>
		<th data-name="MFRCODE" class="<?php echo $view_pharmacy_search_product_list->MFRCODE->headerCellClass() ?>"><div id="elh_view_pharmacy_search_product_MFRCODE" class="view_pharmacy_search_product_MFRCODE"><div class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_list->MFRCODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MFRCODE" class="<?php echo $view_pharmacy_search_product_list->MFRCODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_search_product_list->SortUrl($view_pharmacy_search_product_list->MFRCODE) ?>', 1);"><div id="elh_view_pharmacy_search_product_MFRCODE" class="view_pharmacy_search_product_MFRCODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_list->MFRCODE->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_search_product_list->MFRCODE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_search_product_list->MFRCODE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_search_product_list->BILLDATE->Visible) { // BILLDATE ?>
	<?php if ($view_pharmacy_search_product_list->SortUrl($view_pharmacy_search_product_list->BILLDATE) == "") { ?>
		<th data-name="BILLDATE" class="<?php echo $view_pharmacy_search_product_list->BILLDATE->headerCellClass() ?>"><div id="elh_view_pharmacy_search_product_BILLDATE" class="view_pharmacy_search_product_BILLDATE"><div class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_list->BILLDATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BILLDATE" class="<?php echo $view_pharmacy_search_product_list->BILLDATE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_search_product_list->SortUrl($view_pharmacy_search_product_list->BILLDATE) ?>', 1);"><div id="elh_view_pharmacy_search_product_BILLDATE" class="view_pharmacy_search_product_BILLDATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_list->BILLDATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_search_product_list->BILLDATE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_search_product_list->BILLDATE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_pharmacy_search_product_list->id->Visible) { // id ?>
	<?php if ($view_pharmacy_search_product_list->SortUrl($view_pharmacy_search_product_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_pharmacy_search_product_list->id->headerCellClass() ?>"><div id="elh_view_pharmacy_search_product_id" class="view_pharmacy_search_product_id"><div class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_pharmacy_search_product_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_pharmacy_search_product_list->SortUrl($view_pharmacy_search_product_list->id) ?>', 1);"><div id="elh_view_pharmacy_search_product_id" class="view_pharmacy_search_product_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_pharmacy_search_product_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_pharmacy_search_product_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_pharmacy_search_product_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_pharmacy_search_product_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_pharmacy_search_product_list->ExportAll && $view_pharmacy_search_product_list->isExport()) {
	$view_pharmacy_search_product_list->StopRecord = $view_pharmacy_search_product_list->TotalRecords;
} else {

	// Set the last record to display
	if ($view_pharmacy_search_product_list->TotalRecords > $view_pharmacy_search_product_list->StartRecord + $view_pharmacy_search_product_list->DisplayRecords - 1)
		$view_pharmacy_search_product_list->StopRecord = $view_pharmacy_search_product_list->StartRecord + $view_pharmacy_search_product_list->DisplayRecords - 1;
	else
		$view_pharmacy_search_product_list->StopRecord = $view_pharmacy_search_product_list->TotalRecords;
}
$view_pharmacy_search_product_list->RecordCount = $view_pharmacy_search_product_list->StartRecord - 1;
if ($view_pharmacy_search_product_list->Recordset && !$view_pharmacy_search_product_list->Recordset->EOF) {
	$view_pharmacy_search_product_list->Recordset->moveFirst();
	$selectLimit = $view_pharmacy_search_product_list->UseSelectLimit;
	if (!$selectLimit && $view_pharmacy_search_product_list->StartRecord > 1)
		$view_pharmacy_search_product_list->Recordset->move($view_pharmacy_search_product_list->StartRecord - 1);
} elseif (!$view_pharmacy_search_product->AllowAddDeleteRow && $view_pharmacy_search_product_list->StopRecord == 0) {
	$view_pharmacy_search_product_list->StopRecord = $view_pharmacy_search_product->GridAddRowCount;
}

// Initialize aggregate
$view_pharmacy_search_product->RowType = ROWTYPE_AGGREGATEINIT;
$view_pharmacy_search_product->resetAttributes();
$view_pharmacy_search_product_list->renderRow();
while ($view_pharmacy_search_product_list->RecordCount < $view_pharmacy_search_product_list->StopRecord) {
	$view_pharmacy_search_product_list->RecordCount++;
	if ($view_pharmacy_search_product_list->RecordCount >= $view_pharmacy_search_product_list->StartRecord) {
		$view_pharmacy_search_product_list->RowCount++;

		// Set up key count
		$view_pharmacy_search_product_list->KeyCount = $view_pharmacy_search_product_list->RowIndex;

		// Init row class and style
		$view_pharmacy_search_product->resetAttributes();
		$view_pharmacy_search_product->CssClass = "";
		if ($view_pharmacy_search_product_list->isGridAdd()) {
		} else {
			$view_pharmacy_search_product_list->loadRowValues($view_pharmacy_search_product_list->Recordset); // Load row values
		}
		$view_pharmacy_search_product->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_pharmacy_search_product->RowAttrs->merge(["data-rowindex" => $view_pharmacy_search_product_list->RowCount, "id" => "r" . $view_pharmacy_search_product_list->RowCount . "_view_pharmacy_search_product", "data-rowtype" => $view_pharmacy_search_product->RowType]);

		// Render row
		$view_pharmacy_search_product_list->renderRow();

		// Render list options
		$view_pharmacy_search_product_list->renderListOptions();
?>
	<tr <?php echo $view_pharmacy_search_product->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_pharmacy_search_product_list->ListOptions->render("body", "left", $view_pharmacy_search_product_list->RowCount);
?>
	<?php if ($view_pharmacy_search_product_list->PRC->Visible) { // PRC ?>
		<td data-name="PRC" <?php echo $view_pharmacy_search_product_list->PRC->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_search_product_list->RowCount ?>_view_pharmacy_search_product_PRC">
<span<?php echo $view_pharmacy_search_product_list->PRC->viewAttributes() ?>><?php echo $view_pharmacy_search_product_list->PRC->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_search_product_list->DES->Visible) { // DES ?>
		<td data-name="DES" <?php echo $view_pharmacy_search_product_list->DES->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_search_product_list->RowCount ?>_view_pharmacy_search_product_DES">
<span<?php echo $view_pharmacy_search_product_list->DES->viewAttributes() ?>><?php echo $view_pharmacy_search_product_list->DES->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_search_product_list->BATCH->Visible) { // BATCH ?>
		<td data-name="BATCH" <?php echo $view_pharmacy_search_product_list->BATCH->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_search_product_list->RowCount ?>_view_pharmacy_search_product_BATCH">
<span<?php echo $view_pharmacy_search_product_list->BATCH->viewAttributes() ?>><?php echo $view_pharmacy_search_product_list->BATCH->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_search_product_list->Stock->Visible) { // Stock ?>
		<td data-name="Stock" <?php echo $view_pharmacy_search_product_list->Stock->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_search_product_list->RowCount ?>_view_pharmacy_search_product_Stock">
<span<?php echo $view_pharmacy_search_product_list->Stock->viewAttributes() ?>><?php echo $view_pharmacy_search_product_list->Stock->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_search_product_list->EXPDT->Visible) { // EXPDT ?>
		<td data-name="EXPDT" <?php echo $view_pharmacy_search_product_list->EXPDT->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_search_product_list->RowCount ?>_view_pharmacy_search_product_EXPDT">
<span<?php echo $view_pharmacy_search_product_list->EXPDT->viewAttributes() ?>><?php echo $view_pharmacy_search_product_list->EXPDT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_search_product_list->UNIT->Visible) { // UNIT ?>
		<td data-name="UNIT" <?php echo $view_pharmacy_search_product_list->UNIT->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_search_product_list->RowCount ?>_view_pharmacy_search_product_UNIT">
<span<?php echo $view_pharmacy_search_product_list->UNIT->viewAttributes() ?>><?php echo $view_pharmacy_search_product_list->UNIT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_search_product_list->RT->Visible) { // RT ?>
		<td data-name="RT" <?php echo $view_pharmacy_search_product_list->RT->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_search_product_list->RowCount ?>_view_pharmacy_search_product_RT">
<span<?php echo $view_pharmacy_search_product_list->RT->viewAttributes() ?>><?php echo $view_pharmacy_search_product_list->RT->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_search_product_list->OQ->Visible) { // OQ ?>
		<td data-name="OQ" <?php echo $view_pharmacy_search_product_list->OQ->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_search_product_list->RowCount ?>_view_pharmacy_search_product_OQ">
<span<?php echo $view_pharmacy_search_product_list->OQ->viewAttributes() ?>><?php echo $view_pharmacy_search_product_list->OQ->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_search_product_list->GENNAME->Visible) { // GENNAME ?>
		<td data-name="GENNAME" <?php echo $view_pharmacy_search_product_list->GENNAME->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_search_product_list->RowCount ?>_view_pharmacy_search_product_GENNAME">
<span<?php echo $view_pharmacy_search_product_list->GENNAME->viewAttributes() ?>><?php echo $view_pharmacy_search_product_list->GENNAME->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_search_product_list->SSGST->Visible) { // SSGST ?>
		<td data-name="SSGST" <?php echo $view_pharmacy_search_product_list->SSGST->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_search_product_list->RowCount ?>_view_pharmacy_search_product_SSGST">
<span<?php echo $view_pharmacy_search_product_list->SSGST->viewAttributes() ?>><?php echo $view_pharmacy_search_product_list->SSGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_search_product_list->SCGST->Visible) { // SCGST ?>
		<td data-name="SCGST" <?php echo $view_pharmacy_search_product_list->SCGST->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_search_product_list->RowCount ?>_view_pharmacy_search_product_SCGST">
<span<?php echo $view_pharmacy_search_product_list->SCGST->viewAttributes() ?>><?php echo $view_pharmacy_search_product_list->SCGST->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_search_product_list->MFRCODE->Visible) { // MFRCODE ?>
		<td data-name="MFRCODE" <?php echo $view_pharmacy_search_product_list->MFRCODE->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_search_product_list->RowCount ?>_view_pharmacy_search_product_MFRCODE">
<span<?php echo $view_pharmacy_search_product_list->MFRCODE->viewAttributes() ?>><?php echo $view_pharmacy_search_product_list->MFRCODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_search_product_list->BILLDATE->Visible) { // BILLDATE ?>
		<td data-name="BILLDATE" <?php echo $view_pharmacy_search_product_list->BILLDATE->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_search_product_list->RowCount ?>_view_pharmacy_search_product_BILLDATE">
<span<?php echo $view_pharmacy_search_product_list->BILLDATE->viewAttributes() ?>><?php echo $view_pharmacy_search_product_list->BILLDATE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_pharmacy_search_product_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $view_pharmacy_search_product_list->id->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_search_product_list->RowCount ?>_view_pharmacy_search_product_id">
<span<?php echo $view_pharmacy_search_product_list->id->viewAttributes() ?>><?php echo $view_pharmacy_search_product_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_pharmacy_search_product_list->ListOptions->render("body", "right", $view_pharmacy_search_product_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$view_pharmacy_search_product_list->isGridAdd())
		$view_pharmacy_search_product_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$view_pharmacy_search_product->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_pharmacy_search_product_list->Recordset)
	$view_pharmacy_search_product_list->Recordset->Close();
?>
<?php if (!$view_pharmacy_search_product_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_pharmacy_search_product_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_pharmacy_search_product_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_search_product_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_pharmacy_search_product_list->TotalRecords == 0 && !$view_pharmacy_search_product->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_pharmacy_search_product_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_pharmacy_search_product_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_pharmacy_search_product_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$view_pharmacy_search_product->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_view_pharmacy_search_product",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$view_pharmacy_search_product_list->terminate();
?>