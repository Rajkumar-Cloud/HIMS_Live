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
$view_find_diff_bills_list = new view_find_diff_bills_list();

// Run the page
$view_find_diff_bills_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_find_diff_bills_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$view_find_diff_bills_list->isExport()) { ?>
<script>
var fview_find_diff_billslist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fview_find_diff_billslist = currentForm = new ew.Form("fview_find_diff_billslist", "list");
	fview_find_diff_billslist.formKeyCountName = '<?php echo $view_find_diff_bills_list->FormKeyCountName ?>';
	loadjs.done("fview_find_diff_billslist");
});
var fview_find_diff_billslistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fview_find_diff_billslistsrch = currentSearchForm = new ew.Form("fview_find_diff_billslistsrch");

	// Validate function for search
	fview_find_diff_billslistsrch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_diff");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_find_diff_bills_list->diff->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_createddatetime");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_find_diff_bills_list->createddatetime->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fview_find_diff_billslistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_find_diff_billslistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	// Filters

	fview_find_diff_billslistsrch.filterList = <?php echo $view_find_diff_bills_list->getFilterList() ?>;
	loadjs.done("fview_find_diff_billslistsrch");
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
<?php if (!$view_find_diff_bills_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_find_diff_bills_list->TotalRecords > 0 && $view_find_diff_bills_list->ExportOptions->visible()) { ?>
<?php $view_find_diff_bills_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_find_diff_bills_list->ImportOptions->visible()) { ?>
<?php $view_find_diff_bills_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_find_diff_bills_list->SearchOptions->visible()) { ?>
<?php $view_find_diff_bills_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_find_diff_bills_list->FilterOptions->visible()) { ?>
<?php $view_find_diff_bills_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_find_diff_bills_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_find_diff_bills_list->isExport() && !$view_find_diff_bills->CurrentAction) { ?>
<form name="fview_find_diff_billslistsrch" id="fview_find_diff_billslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fview_find_diff_billslistsrch-search-panel" class="<?php echo $view_find_diff_bills_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_find_diff_bills">
	<div class="ew-extended-search">
<?php

// Render search row
$view_find_diff_bills->RowType = ROWTYPE_SEARCH;
$view_find_diff_bills->resetAttributes();
$view_find_diff_bills_list->renderRow();
?>
<?php if ($view_find_diff_bills_list->diff->Visible) { // diff ?>
	<?php
		$view_find_diff_bills_list->SearchColumnCount++;
		if (($view_find_diff_bills_list->SearchColumnCount - 1) % $view_find_diff_bills_list->SearchFieldsPerRow == 0) {
			$view_find_diff_bills_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_find_diff_bills_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_diff" class="ew-cell form-group">
		<label for="x_diff" class="ew-search-caption ew-label"><?php echo $view_find_diff_bills_list->diff->caption() ?></label>
		<span class="ew-search-operator">
<select name="z_diff" id="z_diff" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?php echo $view_find_diff_bills_list->diff->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?php echo $Language->phrase("EQUAL") ?></option>
<option value="<>"<?php echo $view_find_diff_bills_list->diff->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?php echo $Language->phrase("<>") ?></option>
<option value="<"<?php echo $view_find_diff_bills_list->diff->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?php echo $Language->phrase("<") ?></option>
<option value="<="<?php echo $view_find_diff_bills_list->diff->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?php echo $Language->phrase("<=") ?></option>
<option value=">"<?php echo $view_find_diff_bills_list->diff->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?php echo $Language->phrase(">") ?></option>
<option value=">="<?php echo $view_find_diff_bills_list->diff->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?php echo $Language->phrase(">=") ?></option>
<option value="IS NULL"<?php echo $view_find_diff_bills_list->diff->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?php echo $view_find_diff_bills_list->diff->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?php echo $view_find_diff_bills_list->diff->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?php echo $Language->phrase("BETWEEN") ?></option>
</select>
</span>
		<span id="el_view_find_diff_bills_diff" class="ew-search-field">
<input type="text" data-table="view_find_diff_bills" data-field="x_diff" name="x_diff" id="x_diff" size="30" placeholder="<?php echo HtmlEncode($view_find_diff_bills_list->diff->getPlaceHolder()) ?>" value="<?php echo $view_find_diff_bills_list->diff->EditValue ?>"<?php echo $view_find_diff_bills_list->diff->editAttributes() ?>>
</span>
		<span class="ew-search-and d-none"><label><?php echo $Language->phrase("AND") ?></label></span>
		<span id="el2_view_find_diff_bills_diff" class="ew-search-field2 d-none">
<input type="text" data-table="view_find_diff_bills" data-field="x_diff" name="y_diff" id="y_diff" size="30" placeholder="<?php echo HtmlEncode($view_find_diff_bills_list->diff->getPlaceHolder()) ?>" value="<?php echo $view_find_diff_bills_list->diff->EditValue2 ?>"<?php echo $view_find_diff_bills_list->diff->editAttributes() ?>>
</span>
	</div>
	<?php if ($view_find_diff_bills_list->SearchColumnCount % $view_find_diff_bills_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($view_find_diff_bills_list->createddatetime->Visible) { // createddatetime ?>
	<?php
		$view_find_diff_bills_list->SearchColumnCount++;
		if (($view_find_diff_bills_list->SearchColumnCount - 1) % $view_find_diff_bills_list->SearchFieldsPerRow == 0) {
			$view_find_diff_bills_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $view_find_diff_bills_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_createddatetime" class="ew-cell form-group">
		<label for="x_createddatetime" class="ew-search-caption ew-label"><?php echo $view_find_diff_bills_list->createddatetime->caption() ?></label>
		<span class="ew-search-operator">
<select name="z_createddatetime" id="z_createddatetime" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?php echo $view_find_diff_bills_list->createddatetime->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?php echo $Language->phrase("EQUAL") ?></option>
<option value="<>"<?php echo $view_find_diff_bills_list->createddatetime->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?php echo $Language->phrase("<>") ?></option>
<option value="<"<?php echo $view_find_diff_bills_list->createddatetime->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?php echo $Language->phrase("<") ?></option>
<option value="<="<?php echo $view_find_diff_bills_list->createddatetime->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?php echo $Language->phrase("<=") ?></option>
<option value=">"<?php echo $view_find_diff_bills_list->createddatetime->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?php echo $Language->phrase(">") ?></option>
<option value=">="<?php echo $view_find_diff_bills_list->createddatetime->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?php echo $Language->phrase(">=") ?></option>
<option value="IS NULL"<?php echo $view_find_diff_bills_list->createddatetime->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?php echo $view_find_diff_bills_list->createddatetime->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?php echo $view_find_diff_bills_list->createddatetime->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?php echo $Language->phrase("BETWEEN") ?></option>
</select>
</span>
		<span id="el_view_find_diff_bills_createddatetime" class="ew-search-field">
<input type="text" data-table="view_find_diff_bills" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?php echo HtmlEncode($view_find_diff_bills_list->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_find_diff_bills_list->createddatetime->EditValue ?>"<?php echo $view_find_diff_bills_list->createddatetime->editAttributes() ?>>
<?php if (!$view_find_diff_bills_list->createddatetime->ReadOnly && !$view_find_diff_bills_list->createddatetime->Disabled && !isset($view_find_diff_bills_list->createddatetime->EditAttrs["readonly"]) && !isset($view_find_diff_bills_list->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_find_diff_billslistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_find_diff_billslistsrch", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		<span class="ew-search-and d-none"><label><?php echo $Language->phrase("AND") ?></label></span>
		<span id="el2_view_find_diff_bills_createddatetime" class="ew-search-field2 d-none">
<input type="text" data-table="view_find_diff_bills" data-field="x_createddatetime" name="y_createddatetime" id="y_createddatetime" placeholder="<?php echo HtmlEncode($view_find_diff_bills_list->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_find_diff_bills_list->createddatetime->EditValue2 ?>"<?php echo $view_find_diff_bills_list->createddatetime->editAttributes() ?>>
<?php if (!$view_find_diff_bills_list->createddatetime->ReadOnly && !$view_find_diff_bills_list->createddatetime->Disabled && !isset($view_find_diff_bills_list->createddatetime->EditAttrs["readonly"]) && !isset($view_find_diff_bills_list->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_find_diff_billslistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_find_diff_billslistsrch", "y_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
	</div>
	<?php if ($view_find_diff_bills_list->SearchColumnCount % $view_find_diff_bills_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($view_find_diff_bills_list->SearchColumnCount % $view_find_diff_bills_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $view_find_diff_bills_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($view_find_diff_bills_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($view_find_diff_bills_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_find_diff_bills_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_find_diff_bills_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_find_diff_bills_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_find_diff_bills_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_find_diff_bills_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $view_find_diff_bills_list->showPageHeader(); ?>
<?php
$view_find_diff_bills_list->showMessage();
?>
<?php if ($view_find_diff_bills_list->TotalRecords > 0 || $view_find_diff_bills->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_find_diff_bills_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_find_diff_bills">
<?php if (!$view_find_diff_bills_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_find_diff_bills_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_find_diff_bills_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_find_diff_bills_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_find_diff_billslist" id="fview_find_diff_billslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_find_diff_bills">
<div id="gmp_view_find_diff_bills" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($view_find_diff_bills_list->TotalRecords > 0 || $view_find_diff_bills_list->isGridEdit()) { ?>
<table id="tbl_view_find_diff_billslist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_find_diff_bills->RowType = ROWTYPE_HEADER;

// Render list options
$view_find_diff_bills_list->renderListOptions();

// Render list options (header, left)
$view_find_diff_bills_list->ListOptions->render("header", "left");
?>
<?php if ($view_find_diff_bills_list->PatientId->Visible) { // PatientId ?>
	<?php if ($view_find_diff_bills_list->SortUrl($view_find_diff_bills_list->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $view_find_diff_bills_list->PatientId->headerCellClass() ?>"><div id="elh_view_find_diff_bills_PatientId" class="view_find_diff_bills_PatientId"><div class="ew-table-header-caption"><?php echo $view_find_diff_bills_list->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $view_find_diff_bills_list->PatientId->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_find_diff_bills_list->SortUrl($view_find_diff_bills_list->PatientId) ?>', 1);"><div id="elh_view_find_diff_bills_PatientId" class="view_find_diff_bills_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_find_diff_bills_list->PatientId->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_find_diff_bills_list->PatientId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_find_diff_bills_list->PatientId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_find_diff_bills_list->PatientName->Visible) { // PatientName ?>
	<?php if ($view_find_diff_bills_list->SortUrl($view_find_diff_bills_list->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $view_find_diff_bills_list->PatientName->headerCellClass() ?>"><div id="elh_view_find_diff_bills_PatientName" class="view_find_diff_bills_PatientName"><div class="ew-table-header-caption"><?php echo $view_find_diff_bills_list->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $view_find_diff_bills_list->PatientName->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_find_diff_bills_list->SortUrl($view_find_diff_bills_list->PatientName) ?>', 1);"><div id="elh_view_find_diff_bills_PatientName" class="view_find_diff_bills_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_find_diff_bills_list->PatientName->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_find_diff_bills_list->PatientName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_find_diff_bills_list->PatientName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_find_diff_bills_list->BillNumber->Visible) { // BillNumber ?>
	<?php if ($view_find_diff_bills_list->SortUrl($view_find_diff_bills_list->BillNumber) == "") { ?>
		<th data-name="BillNumber" class="<?php echo $view_find_diff_bills_list->BillNumber->headerCellClass() ?>"><div id="elh_view_find_diff_bills_BillNumber" class="view_find_diff_bills_BillNumber"><div class="ew-table-header-caption"><?php echo $view_find_diff_bills_list->BillNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BillNumber" class="<?php echo $view_find_diff_bills_list->BillNumber->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_find_diff_bills_list->SortUrl($view_find_diff_bills_list->BillNumber) ?>', 1);"><div id="elh_view_find_diff_bills_BillNumber" class="view_find_diff_bills_BillNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_find_diff_bills_list->BillNumber->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_find_diff_bills_list->BillNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_find_diff_bills_list->BillNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_find_diff_bills_list->Amount->Visible) { // Amount ?>
	<?php if ($view_find_diff_bills_list->SortUrl($view_find_diff_bills_list->Amount) == "") { ?>
		<th data-name="Amount" class="<?php echo $view_find_diff_bills_list->Amount->headerCellClass() ?>"><div id="elh_view_find_diff_bills_Amount" class="view_find_diff_bills_Amount"><div class="ew-table-header-caption"><?php echo $view_find_diff_bills_list->Amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Amount" class="<?php echo $view_find_diff_bills_list->Amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_find_diff_bills_list->SortUrl($view_find_diff_bills_list->Amount) ?>', 1);"><div id="elh_view_find_diff_bills_Amount" class="view_find_diff_bills_Amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_find_diff_bills_list->Amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_find_diff_bills_list->Amount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_find_diff_bills_list->Amount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_find_diff_bills_list->sum28b_amount29->Visible) { // sum(b.amount) ?>
	<?php if ($view_find_diff_bills_list->SortUrl($view_find_diff_bills_list->sum28b_amount29) == "") { ?>
		<th data-name="sum28b_amount29" class="<?php echo $view_find_diff_bills_list->sum28b_amount29->headerCellClass() ?>"><div id="elh_view_find_diff_bills_sum28b_amount29" class="view_find_diff_bills_sum28b_amount29"><div class="ew-table-header-caption"><?php echo $view_find_diff_bills_list->sum28b_amount29->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sum28b_amount29" class="<?php echo $view_find_diff_bills_list->sum28b_amount29->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_find_diff_bills_list->SortUrl($view_find_diff_bills_list->sum28b_amount29) ?>', 1);"><div id="elh_view_find_diff_bills_sum28b_amount29" class="view_find_diff_bills_sum28b_amount29">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_find_diff_bills_list->sum28b_amount29->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_find_diff_bills_list->sum28b_amount29->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_find_diff_bills_list->sum28b_amount29->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_find_diff_bills_list->diff->Visible) { // diff ?>
	<?php if ($view_find_diff_bills_list->SortUrl($view_find_diff_bills_list->diff) == "") { ?>
		<th data-name="diff" class="<?php echo $view_find_diff_bills_list->diff->headerCellClass() ?>"><div id="elh_view_find_diff_bills_diff" class="view_find_diff_bills_diff"><div class="ew-table-header-caption"><?php echo $view_find_diff_bills_list->diff->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="diff" class="<?php echo $view_find_diff_bills_list->diff->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_find_diff_bills_list->SortUrl($view_find_diff_bills_list->diff) ?>', 1);"><div id="elh_view_find_diff_bills_diff" class="view_find_diff_bills_diff">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_find_diff_bills_list->diff->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_find_diff_bills_list->diff->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_find_diff_bills_list->diff->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_find_diff_bills_list->HospID->Visible) { // HospID ?>
	<?php if ($view_find_diff_bills_list->SortUrl($view_find_diff_bills_list->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $view_find_diff_bills_list->HospID->headerCellClass() ?>"><div id="elh_view_find_diff_bills_HospID" class="view_find_diff_bills_HospID"><div class="ew-table-header-caption"><?php echo $view_find_diff_bills_list->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $view_find_diff_bills_list->HospID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_find_diff_bills_list->SortUrl($view_find_diff_bills_list->HospID) ?>', 1);"><div id="elh_view_find_diff_bills_HospID" class="view_find_diff_bills_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_find_diff_bills_list->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_find_diff_bills_list->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_find_diff_bills_list->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_find_diff_bills_list->createddatetime->Visible) { // createddatetime ?>
	<?php if ($view_find_diff_bills_list->SortUrl($view_find_diff_bills_list->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $view_find_diff_bills_list->createddatetime->headerCellClass() ?>"><div id="elh_view_find_diff_bills_createddatetime" class="view_find_diff_bills_createddatetime"><div class="ew-table-header-caption"><?php echo $view_find_diff_bills_list->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $view_find_diff_bills_list->createddatetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_find_diff_bills_list->SortUrl($view_find_diff_bills_list->createddatetime) ?>', 1);"><div id="elh_view_find_diff_bills_createddatetime" class="view_find_diff_bills_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_find_diff_bills_list->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_find_diff_bills_list->createddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_find_diff_bills_list->createddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_find_diff_bills_list->createdby->Visible) { // createdby ?>
	<?php if ($view_find_diff_bills_list->SortUrl($view_find_diff_bills_list->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $view_find_diff_bills_list->createdby->headerCellClass() ?>"><div id="elh_view_find_diff_bills_createdby" class="view_find_diff_bills_createdby"><div class="ew-table-header-caption"><?php echo $view_find_diff_bills_list->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $view_find_diff_bills_list->createdby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_find_diff_bills_list->SortUrl($view_find_diff_bills_list->createdby) ?>', 1);"><div id="elh_view_find_diff_bills_createdby" class="view_find_diff_bills_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_find_diff_bills_list->createdby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_find_diff_bills_list->createdby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_find_diff_bills_list->createdby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_find_diff_bills_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_find_diff_bills_list->ExportAll && $view_find_diff_bills_list->isExport()) {
	$view_find_diff_bills_list->StopRecord = $view_find_diff_bills_list->TotalRecords;
} else {

	// Set the last record to display
	if ($view_find_diff_bills_list->TotalRecords > $view_find_diff_bills_list->StartRecord + $view_find_diff_bills_list->DisplayRecords - 1)
		$view_find_diff_bills_list->StopRecord = $view_find_diff_bills_list->StartRecord + $view_find_diff_bills_list->DisplayRecords - 1;
	else
		$view_find_diff_bills_list->StopRecord = $view_find_diff_bills_list->TotalRecords;
}
$view_find_diff_bills_list->RecordCount = $view_find_diff_bills_list->StartRecord - 1;
if ($view_find_diff_bills_list->Recordset && !$view_find_diff_bills_list->Recordset->EOF) {
	$view_find_diff_bills_list->Recordset->moveFirst();
	$selectLimit = $view_find_diff_bills_list->UseSelectLimit;
	if (!$selectLimit && $view_find_diff_bills_list->StartRecord > 1)
		$view_find_diff_bills_list->Recordset->move($view_find_diff_bills_list->StartRecord - 1);
} elseif (!$view_find_diff_bills->AllowAddDeleteRow && $view_find_diff_bills_list->StopRecord == 0) {
	$view_find_diff_bills_list->StopRecord = $view_find_diff_bills->GridAddRowCount;
}

// Initialize aggregate
$view_find_diff_bills->RowType = ROWTYPE_AGGREGATEINIT;
$view_find_diff_bills->resetAttributes();
$view_find_diff_bills_list->renderRow();
while ($view_find_diff_bills_list->RecordCount < $view_find_diff_bills_list->StopRecord) {
	$view_find_diff_bills_list->RecordCount++;
	if ($view_find_diff_bills_list->RecordCount >= $view_find_diff_bills_list->StartRecord) {
		$view_find_diff_bills_list->RowCount++;

		// Set up key count
		$view_find_diff_bills_list->KeyCount = $view_find_diff_bills_list->RowIndex;

		// Init row class and style
		$view_find_diff_bills->resetAttributes();
		$view_find_diff_bills->CssClass = "";
		if ($view_find_diff_bills_list->isGridAdd()) {
		} else {
			$view_find_diff_bills_list->loadRowValues($view_find_diff_bills_list->Recordset); // Load row values
		}
		$view_find_diff_bills->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_find_diff_bills->RowAttrs->merge(["data-rowindex" => $view_find_diff_bills_list->RowCount, "id" => "r" . $view_find_diff_bills_list->RowCount . "_view_find_diff_bills", "data-rowtype" => $view_find_diff_bills->RowType]);

		// Render row
		$view_find_diff_bills_list->renderRow();

		// Render list options
		$view_find_diff_bills_list->renderListOptions();
?>
	<tr <?php echo $view_find_diff_bills->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_find_diff_bills_list->ListOptions->render("body", "left", $view_find_diff_bills_list->RowCount);
?>
	<?php if ($view_find_diff_bills_list->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId" <?php echo $view_find_diff_bills_list->PatientId->cellAttributes() ?>>
<span id="el<?php echo $view_find_diff_bills_list->RowCount ?>_view_find_diff_bills_PatientId">
<span<?php echo $view_find_diff_bills_list->PatientId->viewAttributes() ?>><?php echo $view_find_diff_bills_list->PatientId->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_find_diff_bills_list->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName" <?php echo $view_find_diff_bills_list->PatientName->cellAttributes() ?>>
<span id="el<?php echo $view_find_diff_bills_list->RowCount ?>_view_find_diff_bills_PatientName">
<span<?php echo $view_find_diff_bills_list->PatientName->viewAttributes() ?>><?php echo $view_find_diff_bills_list->PatientName->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_find_diff_bills_list->BillNumber->Visible) { // BillNumber ?>
		<td data-name="BillNumber" <?php echo $view_find_diff_bills_list->BillNumber->cellAttributes() ?>>
<span id="el<?php echo $view_find_diff_bills_list->RowCount ?>_view_find_diff_bills_BillNumber">
<span<?php echo $view_find_diff_bills_list->BillNumber->viewAttributes() ?>><?php echo $view_find_diff_bills_list->BillNumber->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_find_diff_bills_list->Amount->Visible) { // Amount ?>
		<td data-name="Amount" <?php echo $view_find_diff_bills_list->Amount->cellAttributes() ?>>
<span id="el<?php echo $view_find_diff_bills_list->RowCount ?>_view_find_diff_bills_Amount">
<span<?php echo $view_find_diff_bills_list->Amount->viewAttributes() ?>><?php echo $view_find_diff_bills_list->Amount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_find_diff_bills_list->sum28b_amount29->Visible) { // sum(b.amount) ?>
		<td data-name="sum28b_amount29" <?php echo $view_find_diff_bills_list->sum28b_amount29->cellAttributes() ?>>
<span id="el<?php echo $view_find_diff_bills_list->RowCount ?>_view_find_diff_bills_sum28b_amount29">
<span<?php echo $view_find_diff_bills_list->sum28b_amount29->viewAttributes() ?>><?php echo $view_find_diff_bills_list->sum28b_amount29->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_find_diff_bills_list->diff->Visible) { // diff ?>
		<td data-name="diff" <?php echo $view_find_diff_bills_list->diff->cellAttributes() ?>>
<span id="el<?php echo $view_find_diff_bills_list->RowCount ?>_view_find_diff_bills_diff">
<span<?php echo $view_find_diff_bills_list->diff->viewAttributes() ?>><?php echo $view_find_diff_bills_list->diff->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_find_diff_bills_list->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $view_find_diff_bills_list->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_find_diff_bills_list->RowCount ?>_view_find_diff_bills_HospID">
<span<?php echo $view_find_diff_bills_list->HospID->viewAttributes() ?>><?php echo $view_find_diff_bills_list->HospID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_find_diff_bills_list->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" <?php echo $view_find_diff_bills_list->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_find_diff_bills_list->RowCount ?>_view_find_diff_bills_createddatetime">
<span<?php echo $view_find_diff_bills_list->createddatetime->viewAttributes() ?>><?php echo $view_find_diff_bills_list->createddatetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_find_diff_bills_list->createdby->Visible) { // createdby ?>
		<td data-name="createdby" <?php echo $view_find_diff_bills_list->createdby->cellAttributes() ?>>
<span id="el<?php echo $view_find_diff_bills_list->RowCount ?>_view_find_diff_bills_createdby">
<span<?php echo $view_find_diff_bills_list->createdby->viewAttributes() ?>><?php echo $view_find_diff_bills_list->createdby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_find_diff_bills_list->ListOptions->render("body", "right", $view_find_diff_bills_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$view_find_diff_bills_list->isGridAdd())
		$view_find_diff_bills_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$view_find_diff_bills->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_find_diff_bills_list->Recordset)
	$view_find_diff_bills_list->Recordset->Close();
?>
<?php if (!$view_find_diff_bills_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$view_find_diff_bills_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_find_diff_bills_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_find_diff_bills_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_find_diff_bills_list->TotalRecords == 0 && !$view_find_diff_bills->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_find_diff_bills_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_find_diff_bills_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_find_diff_bills_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$view_find_diff_bills->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_view_find_diff_bills",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$view_find_diff_bills_list->terminate();
?>