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
$view_semenanalysis_list = new view_semenanalysis_list();

// Run the page
$view_semenanalysis_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_semenanalysis_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$view_semenanalysis_list->isExport()) { ?>
<script>
var fview_semenanalysislist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fview_semenanalysislist = currentForm = new ew.Form("fview_semenanalysislist", "list");
	fview_semenanalysislist.formKeyCountName = '<?php echo $view_semenanalysis_list->FormKeyCountName ?>';
	loadjs.done("fview_semenanalysislist");
});
var fview_semenanalysislistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fview_semenanalysislistsrch = currentSearchForm = new ew.Form("fview_semenanalysislistsrch");

	// Validate function for search
	fview_semenanalysislistsrch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_PREG_TEST_DATE");
		if (elm && !ew.checkEuroDate(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_semenanalysis_list->PREG_TEST_DATE->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fview_semenanalysislistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_semenanalysislistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	// Filters

	fview_semenanalysislistsrch.filterList = <?php echo $view_semenanalysis_list->getFilterList() ?>;
	loadjs.done("fview_semenanalysislistsrch");
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
<?php if (!$view_semenanalysis_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_semenanalysis_list->TotalRecords > 0 && $view_semenanalysis_list->ExportOptions->visible()) { ?>
<?php $view_semenanalysis_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_semenanalysis_list->ImportOptions->visible()) { ?>
<?php $view_semenanalysis_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_semenanalysis_list->SearchOptions->visible()) { ?>
<?php $view_semenanalysis_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_semenanalysis_list->FilterOptions->visible()) { ?>
<?php $view_semenanalysis_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_semenanalysis_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_semenanalysis_list->isExport() && !$view_semenanalysis->CurrentAction) { ?>
<form name="fview_semenanalysislistsrch" id="fview_semenanalysislistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fview_semenanalysislistsrch-search-panel" class="<?php echo $view_semenanalysis_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_semenanalysis">
	<div class="ew-extended-search">
<?php

// Render search row
$view_semenanalysis->RowType = ROWTYPE_SEARCH;
$view_semenanalysis->resetAttributes();
$view_semenanalysis_list->renderRow();
?>
<?php if ($view_semenanalysis_list->PaID->Visible) { // PaID ?>
	<?php
		$view_semenanalysis_list->SearchColumnCount++;
		if (($view_semenanalysis_list->SearchColumnCount - 1) % $view_semenanalysis_list->SearchFieldsPerRow == 0) {
			$view_semenanalysis_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_semenanalysis_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_PaID" class="ew-cell form-group">
		<label for="x_PaID" class="ew-search-caption ew-label"><?php echo $view_semenanalysis_list->PaID->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PaID" id="z_PaID" value="LIKE">
</span>
		<span id="el_view_semenanalysis_PaID" class="ew-search-field">
<input type="text" data-table="view_semenanalysis" data-field="x_PaID" name="x_PaID" id="x_PaID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_list->PaID->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_list->PaID->EditValue ?>"<?php echo $view_semenanalysis_list->PaID->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_semenanalysis_list->SearchColumnCount % $view_semenanalysis_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_semenanalysis_list->PaName->Visible) { // PaName ?>
	<?php
		$view_semenanalysis_list->SearchColumnCount++;
		if (($view_semenanalysis_list->SearchColumnCount - 1) % $view_semenanalysis_list->SearchFieldsPerRow == 0) {
			$view_semenanalysis_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_semenanalysis_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_PaName" class="ew-cell form-group">
		<label for="x_PaName" class="ew-search-caption ew-label"><?php echo $view_semenanalysis_list->PaName->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PaName" id="z_PaName" value="LIKE">
</span>
		<span id="el_view_semenanalysis_PaName" class="ew-search-field">
<input type="text" data-table="view_semenanalysis" data-field="x_PaName" name="x_PaName" id="x_PaName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_list->PaName->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_list->PaName->EditValue ?>"<?php echo $view_semenanalysis_list->PaName->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_semenanalysis_list->SearchColumnCount % $view_semenanalysis_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_semenanalysis_list->PaMobile->Visible) { // PaMobile ?>
	<?php
		$view_semenanalysis_list->SearchColumnCount++;
		if (($view_semenanalysis_list->SearchColumnCount - 1) % $view_semenanalysis_list->SearchFieldsPerRow == 0) {
			$view_semenanalysis_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_semenanalysis_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_PaMobile" class="ew-cell form-group">
		<label for="x_PaMobile" class="ew-search-caption ew-label"><?php echo $view_semenanalysis_list->PaMobile->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PaMobile" id="z_PaMobile" value="LIKE">
</span>
		<span id="el_view_semenanalysis_PaMobile" class="ew-search-field">
<input type="text" data-table="view_semenanalysis" data-field="x_PaMobile" name="x_PaMobile" id="x_PaMobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_list->PaMobile->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_list->PaMobile->EditValue ?>"<?php echo $view_semenanalysis_list->PaMobile->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_semenanalysis_list->SearchColumnCount % $view_semenanalysis_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_semenanalysis_list->PartnerID->Visible) { // PartnerID ?>
	<?php
		$view_semenanalysis_list->SearchColumnCount++;
		if (($view_semenanalysis_list->SearchColumnCount - 1) % $view_semenanalysis_list->SearchFieldsPerRow == 0) {
			$view_semenanalysis_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_semenanalysis_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_PartnerID" class="ew-cell form-group">
		<label for="x_PartnerID" class="ew-search-caption ew-label"><?php echo $view_semenanalysis_list->PartnerID->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PartnerID" id="z_PartnerID" value="LIKE">
</span>
		<span id="el_view_semenanalysis_PartnerID" class="ew-search-field">
<input type="text" data-table="view_semenanalysis" data-field="x_PartnerID" name="x_PartnerID" id="x_PartnerID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_list->PartnerID->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_list->PartnerID->EditValue ?>"<?php echo $view_semenanalysis_list->PartnerID->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_semenanalysis_list->SearchColumnCount % $view_semenanalysis_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_semenanalysis_list->PartnerName->Visible) { // PartnerName ?>
	<?php
		$view_semenanalysis_list->SearchColumnCount++;
		if (($view_semenanalysis_list->SearchColumnCount - 1) % $view_semenanalysis_list->SearchFieldsPerRow == 0) {
			$view_semenanalysis_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_semenanalysis_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_PartnerName" class="ew-cell form-group">
		<label for="x_PartnerName" class="ew-search-caption ew-label"><?php echo $view_semenanalysis_list->PartnerName->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PartnerName" id="z_PartnerName" value="LIKE">
</span>
		<span id="el_view_semenanalysis_PartnerName" class="ew-search-field">
<input type="text" data-table="view_semenanalysis" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_list->PartnerName->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_list->PartnerName->EditValue ?>"<?php echo $view_semenanalysis_list->PartnerName->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_semenanalysis_list->SearchColumnCount % $view_semenanalysis_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_semenanalysis_list->PartnerMobile->Visible) { // PartnerMobile ?>
	<?php
		$view_semenanalysis_list->SearchColumnCount++;
		if (($view_semenanalysis_list->SearchColumnCount - 1) % $view_semenanalysis_list->SearchFieldsPerRow == 0) {
			$view_semenanalysis_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_semenanalysis_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_PartnerMobile" class="ew-cell form-group">
		<label for="x_PartnerMobile" class="ew-search-caption ew-label"><?php echo $view_semenanalysis_list->PartnerMobile->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PartnerMobile" id="z_PartnerMobile" value="LIKE">
</span>
		<span id="el_view_semenanalysis_PartnerMobile" class="ew-search-field">
<input type="text" data-table="view_semenanalysis" data-field="x_PartnerMobile" name="x_PartnerMobile" id="x_PartnerMobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis_list->PartnerMobile->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_list->PartnerMobile->EditValue ?>"<?php echo $view_semenanalysis_list->PartnerMobile->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_semenanalysis_list->SearchColumnCount % $view_semenanalysis_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_semenanalysis_list->PREG_TEST_DATE->Visible) { // PREG_TEST_DATE ?>
	<?php
		$view_semenanalysis_list->SearchColumnCount++;
		if (($view_semenanalysis_list->SearchColumnCount - 1) % $view_semenanalysis_list->SearchFieldsPerRow == 0) {
			$view_semenanalysis_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_semenanalysis_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_PREG_TEST_DATE" class="ew-cell form-group">
		<label for="x_PREG_TEST_DATE" class="ew-search-caption ew-label"><?php echo $view_semenanalysis_list->PREG_TEST_DATE->caption() ?></label>
		<span class="ew-search-operator">
<select name="z_PREG_TEST_DATE" id="z_PREG_TEST_DATE" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?php echo $view_semenanalysis_list->PREG_TEST_DATE->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?php echo $Language->phrase("EQUAL") ?></option>
<option value="<>"<?php echo $view_semenanalysis_list->PREG_TEST_DATE->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?php echo $Language->phrase("<>") ?></option>
<option value="<"<?php echo $view_semenanalysis_list->PREG_TEST_DATE->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?php echo $Language->phrase("<") ?></option>
<option value="<="<?php echo $view_semenanalysis_list->PREG_TEST_DATE->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?php echo $Language->phrase("<=") ?></option>
<option value=">"<?php echo $view_semenanalysis_list->PREG_TEST_DATE->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?php echo $Language->phrase(">") ?></option>
<option value=">="<?php echo $view_semenanalysis_list->PREG_TEST_DATE->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?php echo $Language->phrase(">=") ?></option>
<option value="IS NULL"<?php echo $view_semenanalysis_list->PREG_TEST_DATE->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?php echo $view_semenanalysis_list->PREG_TEST_DATE->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?php echo $view_semenanalysis_list->PREG_TEST_DATE->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?php echo $Language->phrase("BETWEEN") ?></option>
</select>
</span>
		<span id="el_view_semenanalysis_PREG_TEST_DATE" class="ew-search-field">
<input type="text" data-table="view_semenanalysis" data-field="x_PREG_TEST_DATE" data-format="7" name="x_PREG_TEST_DATE" id="x_PREG_TEST_DATE" placeholder="<?php echo HtmlEncode($view_semenanalysis_list->PREG_TEST_DATE->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_list->PREG_TEST_DATE->EditValue ?>"<?php echo $view_semenanalysis_list->PREG_TEST_DATE->editAttributes() ?>>
<?php if (!$view_semenanalysis_list->PREG_TEST_DATE->ReadOnly && !$view_semenanalysis_list->PREG_TEST_DATE->Disabled && !isset($view_semenanalysis_list->PREG_TEST_DATE->EditAttrs["readonly"]) && !isset($view_semenanalysis_list->PREG_TEST_DATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_semenanalysislistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_semenanalysislistsrch", "x_PREG_TEST_DATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
		<span class="ew-search-and d-none"><label><?php echo $Language->phrase("AND") ?></label></span>
		<span id="el2_view_semenanalysis_PREG_TEST_DATE" class="ew-search-field2 d-none">
<input type="text" data-table="view_semenanalysis" data-field="x_PREG_TEST_DATE" data-format="7" name="y_PREG_TEST_DATE" id="y_PREG_TEST_DATE" placeholder="<?php echo HtmlEncode($view_semenanalysis_list->PREG_TEST_DATE->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis_list->PREG_TEST_DATE->EditValue2 ?>"<?php echo $view_semenanalysis_list->PREG_TEST_DATE->editAttributes() ?>>
<?php if (!$view_semenanalysis_list->PREG_TEST_DATE->ReadOnly && !$view_semenanalysis_list->PREG_TEST_DATE->Disabled && !isset($view_semenanalysis_list->PREG_TEST_DATE->EditAttrs["readonly"]) && !isset($view_semenanalysis_list->PREG_TEST_DATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_semenanalysislistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_semenanalysislistsrch", "y_PREG_TEST_DATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
	</div>
	<?php if ($view_semenanalysis_list->SearchColumnCount % $view_semenanalysis_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($view_semenanalysis_list->SearchColumnCount % $view_semenanalysis_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $view_semenanalysis_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($view_semenanalysis_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($view_semenanalysis_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_semenanalysis_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_semenanalysis_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_semenanalysis_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_semenanalysis_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_semenanalysis_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $view_semenanalysis_list->showPageHeader(); ?>
<?php
$view_semenanalysis_list->showMessage();
?>
<?php if ($view_semenanalysis_list->TotalRecords > 0 || $view_semenanalysis->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_semenanalysis_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_semenanalysis">
<?php if (!$view_semenanalysis_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_semenanalysis_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_semenanalysis_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_semenanalysis_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_semenanalysislist" id="fview_semenanalysislist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_semenanalysis">
<div id="gmp_view_semenanalysis" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($view_semenanalysis_list->TotalRecords > 0 || $view_semenanalysis_list->isGridEdit()) { ?>
<table id="tbl_view_semenanalysislist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_semenanalysis->RowType = ROWTYPE_HEADER;

// Render list options
$view_semenanalysis_list->renderListOptions();

// Render list options (header, left)
$view_semenanalysis_list->ListOptions->render("header", "left");
?>
<?php if ($view_semenanalysis_list->id->Visible) { // id ?>
	<?php if ($view_semenanalysis_list->SortUrl($view_semenanalysis_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $view_semenanalysis_list->id->headerCellClass() ?>"><div id="elh_view_semenanalysis_id" class="view_semenanalysis_id"><div class="ew-table-header-caption"><?php echo $view_semenanalysis_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $view_semenanalysis_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_semenanalysis_list->SortUrl($view_semenanalysis_list->id) ?>', 1);"><div id="elh_view_semenanalysis_id" class="view_semenanalysis_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_semenanalysis_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_semenanalysis_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_semenanalysis_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_semenanalysis_list->PaID->Visible) { // PaID ?>
	<?php if ($view_semenanalysis_list->SortUrl($view_semenanalysis_list->PaID) == "") { ?>
		<th data-name="PaID" class="<?php echo $view_semenanalysis_list->PaID->headerCellClass() ?>"><div id="elh_view_semenanalysis_PaID" class="view_semenanalysis_PaID"><div class="ew-table-header-caption"><?php echo $view_semenanalysis_list->PaID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PaID" class="<?php echo $view_semenanalysis_list->PaID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_semenanalysis_list->SortUrl($view_semenanalysis_list->PaID) ?>', 1);"><div id="elh_view_semenanalysis_PaID" class="view_semenanalysis_PaID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_semenanalysis_list->PaID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_semenanalysis_list->PaID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_semenanalysis_list->PaID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_semenanalysis_list->PaName->Visible) { // PaName ?>
	<?php if ($view_semenanalysis_list->SortUrl($view_semenanalysis_list->PaName) == "") { ?>
		<th data-name="PaName" class="<?php echo $view_semenanalysis_list->PaName->headerCellClass() ?>"><div id="elh_view_semenanalysis_PaName" class="view_semenanalysis_PaName"><div class="ew-table-header-caption"><?php echo $view_semenanalysis_list->PaName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PaName" class="<?php echo $view_semenanalysis_list->PaName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_semenanalysis_list->SortUrl($view_semenanalysis_list->PaName) ?>', 1);"><div id="elh_view_semenanalysis_PaName" class="view_semenanalysis_PaName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_semenanalysis_list->PaName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_semenanalysis_list->PaName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_semenanalysis_list->PaName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_semenanalysis_list->PaMobile->Visible) { // PaMobile ?>
	<?php if ($view_semenanalysis_list->SortUrl($view_semenanalysis_list->PaMobile) == "") { ?>
		<th data-name="PaMobile" class="<?php echo $view_semenanalysis_list->PaMobile->headerCellClass() ?>"><div id="elh_view_semenanalysis_PaMobile" class="view_semenanalysis_PaMobile"><div class="ew-table-header-caption"><?php echo $view_semenanalysis_list->PaMobile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PaMobile" class="<?php echo $view_semenanalysis_list->PaMobile->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_semenanalysis_list->SortUrl($view_semenanalysis_list->PaMobile) ?>', 1);"><div id="elh_view_semenanalysis_PaMobile" class="view_semenanalysis_PaMobile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_semenanalysis_list->PaMobile->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_semenanalysis_list->PaMobile->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_semenanalysis_list->PaMobile->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_semenanalysis_list->PartnerID->Visible) { // PartnerID ?>
	<?php if ($view_semenanalysis_list->SortUrl($view_semenanalysis_list->PartnerID) == "") { ?>
		<th data-name="PartnerID" class="<?php echo $view_semenanalysis_list->PartnerID->headerCellClass() ?>"><div id="elh_view_semenanalysis_PartnerID" class="view_semenanalysis_PartnerID"><div class="ew-table-header-caption"><?php echo $view_semenanalysis_list->PartnerID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerID" class="<?php echo $view_semenanalysis_list->PartnerID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_semenanalysis_list->SortUrl($view_semenanalysis_list->PartnerID) ?>', 1);"><div id="elh_view_semenanalysis_PartnerID" class="view_semenanalysis_PartnerID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_semenanalysis_list->PartnerID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_semenanalysis_list->PartnerID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_semenanalysis_list->PartnerID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_semenanalysis_list->PartnerName->Visible) { // PartnerName ?>
	<?php if ($view_semenanalysis_list->SortUrl($view_semenanalysis_list->PartnerName) == "") { ?>
		<th data-name="PartnerName" class="<?php echo $view_semenanalysis_list->PartnerName->headerCellClass() ?>"><div id="elh_view_semenanalysis_PartnerName" class="view_semenanalysis_PartnerName"><div class="ew-table-header-caption"><?php echo $view_semenanalysis_list->PartnerName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerName" class="<?php echo $view_semenanalysis_list->PartnerName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_semenanalysis_list->SortUrl($view_semenanalysis_list->PartnerName) ?>', 1);"><div id="elh_view_semenanalysis_PartnerName" class="view_semenanalysis_PartnerName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_semenanalysis_list->PartnerName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_semenanalysis_list->PartnerName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_semenanalysis_list->PartnerName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_semenanalysis_list->PartnerMobile->Visible) { // PartnerMobile ?>
	<?php if ($view_semenanalysis_list->SortUrl($view_semenanalysis_list->PartnerMobile) == "") { ?>
		<th data-name="PartnerMobile" class="<?php echo $view_semenanalysis_list->PartnerMobile->headerCellClass() ?>"><div id="elh_view_semenanalysis_PartnerMobile" class="view_semenanalysis_PartnerMobile"><div class="ew-table-header-caption"><?php echo $view_semenanalysis_list->PartnerMobile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PartnerMobile" class="<?php echo $view_semenanalysis_list->PartnerMobile->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_semenanalysis_list->SortUrl($view_semenanalysis_list->PartnerMobile) ?>', 1);"><div id="elh_view_semenanalysis_PartnerMobile" class="view_semenanalysis_PartnerMobile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_semenanalysis_list->PartnerMobile->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_semenanalysis_list->PartnerMobile->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_semenanalysis_list->PartnerMobile->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_semenanalysis_list->RequestDr->Visible) { // RequestDr ?>
	<?php if ($view_semenanalysis_list->SortUrl($view_semenanalysis_list->RequestDr) == "") { ?>
		<th data-name="RequestDr" class="<?php echo $view_semenanalysis_list->RequestDr->headerCellClass() ?>"><div id="elh_view_semenanalysis_RequestDr" class="view_semenanalysis_RequestDr"><div class="ew-table-header-caption"><?php echo $view_semenanalysis_list->RequestDr->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RequestDr" class="<?php echo $view_semenanalysis_list->RequestDr->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_semenanalysis_list->SortUrl($view_semenanalysis_list->RequestDr) ?>', 1);"><div id="elh_view_semenanalysis_RequestDr" class="view_semenanalysis_RequestDr">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_semenanalysis_list->RequestDr->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_semenanalysis_list->RequestDr->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_semenanalysis_list->RequestDr->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_semenanalysis_list->CollectionDate->Visible) { // CollectionDate ?>
	<?php if ($view_semenanalysis_list->SortUrl($view_semenanalysis_list->CollectionDate) == "") { ?>
		<th data-name="CollectionDate" class="<?php echo $view_semenanalysis_list->CollectionDate->headerCellClass() ?>"><div id="elh_view_semenanalysis_CollectionDate" class="view_semenanalysis_CollectionDate"><div class="ew-table-header-caption"><?php echo $view_semenanalysis_list->CollectionDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CollectionDate" class="<?php echo $view_semenanalysis_list->CollectionDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_semenanalysis_list->SortUrl($view_semenanalysis_list->CollectionDate) ?>', 1);"><div id="elh_view_semenanalysis_CollectionDate" class="view_semenanalysis_CollectionDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_semenanalysis_list->CollectionDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_semenanalysis_list->CollectionDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_semenanalysis_list->CollectionDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_semenanalysis_list->ResultDate->Visible) { // ResultDate ?>
	<?php if ($view_semenanalysis_list->SortUrl($view_semenanalysis_list->ResultDate) == "") { ?>
		<th data-name="ResultDate" class="<?php echo $view_semenanalysis_list->ResultDate->headerCellClass() ?>"><div id="elh_view_semenanalysis_ResultDate" class="view_semenanalysis_ResultDate"><div class="ew-table-header-caption"><?php echo $view_semenanalysis_list->ResultDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ResultDate" class="<?php echo $view_semenanalysis_list->ResultDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_semenanalysis_list->SortUrl($view_semenanalysis_list->ResultDate) ?>', 1);"><div id="elh_view_semenanalysis_ResultDate" class="view_semenanalysis_ResultDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_semenanalysis_list->ResultDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_semenanalysis_list->ResultDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_semenanalysis_list->ResultDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_semenanalysis_list->RequestSample->Visible) { // RequestSample ?>
	<?php if ($view_semenanalysis_list->SortUrl($view_semenanalysis_list->RequestSample) == "") { ?>
		<th data-name="RequestSample" class="<?php echo $view_semenanalysis_list->RequestSample->headerCellClass() ?>"><div id="elh_view_semenanalysis_RequestSample" class="view_semenanalysis_RequestSample"><div class="ew-table-header-caption"><?php echo $view_semenanalysis_list->RequestSample->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RequestSample" class="<?php echo $view_semenanalysis_list->RequestSample->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_semenanalysis_list->SortUrl($view_semenanalysis_list->RequestSample) ?>', 1);"><div id="elh_view_semenanalysis_RequestSample" class="view_semenanalysis_RequestSample">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_semenanalysis_list->RequestSample->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_semenanalysis_list->RequestSample->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_semenanalysis_list->RequestSample->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_semenanalysis_list->TidNo->Visible) { // TidNo ?>
	<?php if ($view_semenanalysis_list->SortUrl($view_semenanalysis_list->TidNo) == "") { ?>
		<th data-name="TidNo" class="<?php echo $view_semenanalysis_list->TidNo->headerCellClass() ?>"><div id="elh_view_semenanalysis_TidNo" class="view_semenanalysis_TidNo"><div class="ew-table-header-caption"><?php echo $view_semenanalysis_list->TidNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TidNo" class="<?php echo $view_semenanalysis_list->TidNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_semenanalysis_list->SortUrl($view_semenanalysis_list->TidNo) ?>', 1);"><div id="elh_view_semenanalysis_TidNo" class="view_semenanalysis_TidNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_semenanalysis_list->TidNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_semenanalysis_list->TidNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_semenanalysis_list->TidNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_semenanalysis_list->PREG_TEST_DATE->Visible) { // PREG_TEST_DATE ?>
	<?php if ($view_semenanalysis_list->SortUrl($view_semenanalysis_list->PREG_TEST_DATE) == "") { ?>
		<th data-name="PREG_TEST_DATE" class="<?php echo $view_semenanalysis_list->PREG_TEST_DATE->headerCellClass() ?>"><div id="elh_view_semenanalysis_PREG_TEST_DATE" class="view_semenanalysis_PREG_TEST_DATE"><div class="ew-table-header-caption"><?php echo $view_semenanalysis_list->PREG_TEST_DATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PREG_TEST_DATE" class="<?php echo $view_semenanalysis_list->PREG_TEST_DATE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_semenanalysis_list->SortUrl($view_semenanalysis_list->PREG_TEST_DATE) ?>', 1);"><div id="elh_view_semenanalysis_PREG_TEST_DATE" class="view_semenanalysis_PREG_TEST_DATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_semenanalysis_list->PREG_TEST_DATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_semenanalysis_list->PREG_TEST_DATE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_semenanalysis_list->PREG_TEST_DATE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_semenanalysis_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_semenanalysis_list->ExportAll && $view_semenanalysis_list->isExport()) {
	$view_semenanalysis_list->StopRecord = $view_semenanalysis_list->TotalRecords;
} else {

	// Set the last record to display
	if ($view_semenanalysis_list->TotalRecords > $view_semenanalysis_list->StartRecord + $view_semenanalysis_list->DisplayRecords - 1)
		$view_semenanalysis_list->StopRecord = $view_semenanalysis_list->StartRecord + $view_semenanalysis_list->DisplayRecords - 1;
	else
		$view_semenanalysis_list->StopRecord = $view_semenanalysis_list->TotalRecords;
}
$view_semenanalysis_list->RecordCount = $view_semenanalysis_list->StartRecord - 1;
if ($view_semenanalysis_list->Recordset && !$view_semenanalysis_list->Recordset->EOF) {
	$view_semenanalysis_list->Recordset->moveFirst();
	$selectLimit = $view_semenanalysis_list->UseSelectLimit;
	if (!$selectLimit && $view_semenanalysis_list->StartRecord > 1)
		$view_semenanalysis_list->Recordset->move($view_semenanalysis_list->StartRecord - 1);
} elseif (!$view_semenanalysis->AllowAddDeleteRow && $view_semenanalysis_list->StopRecord == 0) {
	$view_semenanalysis_list->StopRecord = $view_semenanalysis->GridAddRowCount;
}

// Initialize aggregate
$view_semenanalysis->RowType = ROWTYPE_AGGREGATEINIT;
$view_semenanalysis->resetAttributes();
$view_semenanalysis_list->renderRow();
while ($view_semenanalysis_list->RecordCount < $view_semenanalysis_list->StopRecord) {
	$view_semenanalysis_list->RecordCount++;
	if ($view_semenanalysis_list->RecordCount >= $view_semenanalysis_list->StartRecord) {
		$view_semenanalysis_list->RowCount++;

		// Set up key count
		$view_semenanalysis_list->KeyCount = $view_semenanalysis_list->RowIndex;

		// Init row class and style
		$view_semenanalysis->resetAttributes();
		$view_semenanalysis->CssClass = "";
		if ($view_semenanalysis_list->isGridAdd()) {
		} else {
			$view_semenanalysis_list->loadRowValues($view_semenanalysis_list->Recordset); // Load row values
		}
		$view_semenanalysis->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_semenanalysis->RowAttrs->merge(["data-rowindex" => $view_semenanalysis_list->RowCount, "id" => "r" . $view_semenanalysis_list->RowCount . "_view_semenanalysis", "data-rowtype" => $view_semenanalysis->RowType]);

		// Render row
		$view_semenanalysis_list->renderRow();

		// Render list options
		$view_semenanalysis_list->renderListOptions();
?>
	<tr <?php echo $view_semenanalysis->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_semenanalysis_list->ListOptions->render("body", "left", $view_semenanalysis_list->RowCount);
?>
	<?php if ($view_semenanalysis_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $view_semenanalysis_list->id->cellAttributes() ?>>
<span id="el<?php echo $view_semenanalysis_list->RowCount ?>_view_semenanalysis_id">
<span<?php echo $view_semenanalysis_list->id->viewAttributes() ?>><?php echo $view_semenanalysis_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_semenanalysis_list->PaID->Visible) { // PaID ?>
		<td data-name="PaID" <?php echo $view_semenanalysis_list->PaID->cellAttributes() ?>>
<span id="el<?php echo $view_semenanalysis_list->RowCount ?>_view_semenanalysis_PaID">
<span<?php echo $view_semenanalysis_list->PaID->viewAttributes() ?>><?php echo $view_semenanalysis_list->PaID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_semenanalysis_list->PaName->Visible) { // PaName ?>
		<td data-name="PaName" <?php echo $view_semenanalysis_list->PaName->cellAttributes() ?>>
<span id="el<?php echo $view_semenanalysis_list->RowCount ?>_view_semenanalysis_PaName">
<span<?php echo $view_semenanalysis_list->PaName->viewAttributes() ?>><?php echo $view_semenanalysis_list->PaName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_semenanalysis_list->PaMobile->Visible) { // PaMobile ?>
		<td data-name="PaMobile" <?php echo $view_semenanalysis_list->PaMobile->cellAttributes() ?>>
<span id="el<?php echo $view_semenanalysis_list->RowCount ?>_view_semenanalysis_PaMobile">
<span<?php echo $view_semenanalysis_list->PaMobile->viewAttributes() ?>><?php echo $view_semenanalysis_list->PaMobile->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_semenanalysis_list->PartnerID->Visible) { // PartnerID ?>
		<td data-name="PartnerID" <?php echo $view_semenanalysis_list->PartnerID->cellAttributes() ?>>
<span id="el<?php echo $view_semenanalysis_list->RowCount ?>_view_semenanalysis_PartnerID">
<span<?php echo $view_semenanalysis_list->PartnerID->viewAttributes() ?>><?php echo $view_semenanalysis_list->PartnerID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_semenanalysis_list->PartnerName->Visible) { // PartnerName ?>
		<td data-name="PartnerName" <?php echo $view_semenanalysis_list->PartnerName->cellAttributes() ?>>
<span id="el<?php echo $view_semenanalysis_list->RowCount ?>_view_semenanalysis_PartnerName">
<span<?php echo $view_semenanalysis_list->PartnerName->viewAttributes() ?>><?php echo $view_semenanalysis_list->PartnerName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_semenanalysis_list->PartnerMobile->Visible) { // PartnerMobile ?>
		<td data-name="PartnerMobile" <?php echo $view_semenanalysis_list->PartnerMobile->cellAttributes() ?>>
<span id="el<?php echo $view_semenanalysis_list->RowCount ?>_view_semenanalysis_PartnerMobile">
<span<?php echo $view_semenanalysis_list->PartnerMobile->viewAttributes() ?>><?php echo $view_semenanalysis_list->PartnerMobile->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_semenanalysis_list->RequestDr->Visible) { // RequestDr ?>
		<td data-name="RequestDr" <?php echo $view_semenanalysis_list->RequestDr->cellAttributes() ?>>
<span id="el<?php echo $view_semenanalysis_list->RowCount ?>_view_semenanalysis_RequestDr">
<span<?php echo $view_semenanalysis_list->RequestDr->viewAttributes() ?>><?php echo $view_semenanalysis_list->RequestDr->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_semenanalysis_list->CollectionDate->Visible) { // CollectionDate ?>
		<td data-name="CollectionDate" <?php echo $view_semenanalysis_list->CollectionDate->cellAttributes() ?>>
<span id="el<?php echo $view_semenanalysis_list->RowCount ?>_view_semenanalysis_CollectionDate">
<span<?php echo $view_semenanalysis_list->CollectionDate->viewAttributes() ?>><?php echo $view_semenanalysis_list->CollectionDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_semenanalysis_list->ResultDate->Visible) { // ResultDate ?>
		<td data-name="ResultDate" <?php echo $view_semenanalysis_list->ResultDate->cellAttributes() ?>>
<span id="el<?php echo $view_semenanalysis_list->RowCount ?>_view_semenanalysis_ResultDate">
<span<?php echo $view_semenanalysis_list->ResultDate->viewAttributes() ?>><?php echo $view_semenanalysis_list->ResultDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_semenanalysis_list->RequestSample->Visible) { // RequestSample ?>
		<td data-name="RequestSample" <?php echo $view_semenanalysis_list->RequestSample->cellAttributes() ?>>
<span id="el<?php echo $view_semenanalysis_list->RowCount ?>_view_semenanalysis_RequestSample">
<span<?php echo $view_semenanalysis_list->RequestSample->viewAttributes() ?>><?php echo $view_semenanalysis_list->RequestSample->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_semenanalysis_list->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo" <?php echo $view_semenanalysis_list->TidNo->cellAttributes() ?>>
<span id="el<?php echo $view_semenanalysis_list->RowCount ?>_view_semenanalysis_TidNo">
<span<?php echo $view_semenanalysis_list->TidNo->viewAttributes() ?>><?php echo $view_semenanalysis_list->TidNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_semenanalysis_list->PREG_TEST_DATE->Visible) { // PREG_TEST_DATE ?>
		<td data-name="PREG_TEST_DATE" <?php echo $view_semenanalysis_list->PREG_TEST_DATE->cellAttributes() ?>>
<span id="el<?php echo $view_semenanalysis_list->RowCount ?>_view_semenanalysis_PREG_TEST_DATE">
<span<?php echo $view_semenanalysis_list->PREG_TEST_DATE->viewAttributes() ?>><?php echo $view_semenanalysis_list->PREG_TEST_DATE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_semenanalysis_list->ListOptions->render("body", "right", $view_semenanalysis_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$view_semenanalysis_list->isGridAdd())
		$view_semenanalysis_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$view_semenanalysis->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_semenanalysis_list->Recordset)
	$view_semenanalysis_list->Recordset->Close();
?>
<?php if (!$view_semenanalysis_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_semenanalysis_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_semenanalysis_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_semenanalysis_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_semenanalysis_list->TotalRecords == 0 && !$view_semenanalysis->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_semenanalysis_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_semenanalysis_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_semenanalysis_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$view_semenanalysis->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_view_semenanalysis",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$view_semenanalysis_list->terminate();
?>